#!/usr/bin/env bash
# epi_extract_and_probe.sh
# Extract addr/priv pairs from messy stuckcoins JSON-like file, protect privs,
# probe address balances (blockchain.info rawaddr). Safe-run under safe_run_ephemeral.sh.
set -euo pipefail
export LC_ALL=C

TS=$(date +%Y%m%d_%H%M%S)
OUTDIR="$HOME/aipg/run_match_$TS"
LOG="$HOME/aipg/logs/ep_extract_probe_$TS.log"
mkdir -p "$OUTDIR" "$(dirname "$LOG")"
echo "Log: $LOG" >&2

# candidate paths (priority under aipg)
CAND=(
  "$HOME/aipg/old_btc/BlockChainAltWallet_20140213_stuckcoins.txt"
  "$HOME/aipg/data/old_btc/BlockChainAltWallet_20140213_stuckcoins.txt"
  "$HOME/aipg/playground/data/old_btc/BlockChainAltWallet_20140213_stuckcoins.txt"
  "$HOME/Documents/old_btc/BlockChainAltWallet_20140213_stuckcoins.txt"
  "$HOME/Downloads/BlockChainAltWallet_20140213_stuckcoins.txt"
  "/mnt/data/BlockChainAltWallet_20140213_stuckcoins.txt"
)

SRC=""
for p in "${CAND[@]}"; do
  if [ -f "$p" ]; then SRC="$p"; break; fi
done

if [ -z "$SRC" ]; then
  echo "ERROR: stuckcoins file not found in candidates. Look under ~/Documents or ~/Downloads." | tee -a "$LOG" >&2
  exit 1
fi

echo "Source JSON-ish file: $SRC" | tee -a "$LOG"

# Python: extract addr/priv/(label?) from sloppy JSON text.
PAIRS="$OUTDIR/pairs.csv"
PRIVS_RAW="$OUTDIR/privs_raw.json"
PRIVS_ENC="$OUTDIR/privs.json.enc"
BAL="$OUTDIR/balances.csv"

python3 - "$SRC" "$PAIRS" "$PRIVS_RAW" <<'PY' 2>>"$LOG"
import sys, re, json
src, out_pairs, out_privs = sys.argv[1:]
txt = open(src, 'rb').read().decode('utf-8','replace')

# attempt to find keys objects: look for patterns with addr and priv in same block
# two-direction regex to catch either order
pattern = re.compile(r'\{[^}]{0,1200}?"addr"\s*:\s*"([^"]+)"[^}]{0,1200}?"priv"\s*:\s*"([^"]+)"(?:[^}]*?"label"\s*:\s*"([^"]*)")?[^}]*\}', re.S|re.I)
pairs = []
privs = []
for m in pattern.finditer(txt):
    addr = m.group(1).strip()
    priv = m.group(2).strip()
    label = (m.group(3) or "").strip()
    pairs.append((addr,label))
    privs.append({"addr": addr, "priv": priv, "label": label})

# fallback: if nothing found, try looser "addr" and "priv" matches line-adjacent
if not pairs:
    # find all addrs and privs and pair by proximity
    addrs = [(m.start(),m.group(1)) for m in re.finditer(r'"addr"\s*:\s*"([^"]+)"', txt, re.I)]
    privs_raw = [(m.start(),m.group(1)) for m in re.finditer(r'"priv"\s*:\s*"([^"]+)"', txt, re.I)]
    # for each addr, pick nearest priv by index order
    for i,(apos,a) in enumerate(addrs):
        if i < len(privs_raw):
            p = privs_raw[i][1]
            pairs.append((a,""))
            privs.append({"addr":a,"priv":p,"label":""})

# write pairs (no privs)
with open(out_pairs,'w') as f:
    f.write("addr,label\n")
    for a,l in pairs:
        f.write(f"{a},{l}\n")

with open(out_privs,'w') as f:
    json.dump(privs, f, indent=2)

print(f"EXTRACTED {len(pairs)} pairs", file=sys.stderr)
PY

echo "Pairs -> $PAIRS" | tee -a "$LOG"
echo "Raw privs (sensitive) -> $PRIVS_RAW" | tee -a "$LOG"

# Protect privs: if AIPG_PRIV_PW is set, encrypt with openssl aes-256-cbc (pbkdf2).
if [ -n "${AIPG_PRIV_PW:-}" ]; then
  echo "Encrypting privs with AIPG_PRIV_PW (AES-256 PBKDF2)..." | tee -a "$LOG"
  openssl enc -aes-256-cbc -pbkdf2 -iter 100000 -salt -in "$PRIVS_RAW" -out "$PRIVS_ENC" -pass pass:"$AIPG_PRIV_PW"
  chmod 600 "$PRIVS_ENC"
  shred -u "$PRIVS_RAW" || true
  echo "Encrypted: $PRIVS_ENC" | tee -a "$LOG"
else
  echo "WARNING: AIPG_PRIV_PW not set. Privs stored UNENCRYPTED at $PRIVS_RAW (chmod 600) -- set AIPG_PRIV_PW to encrypt on next run." | tee -a "$LOG"
  chmod 600 "$PRIVS_RAW"
fi

# If no pairs found, exit cleanly
if [ ! -s "$PAIRS" ]; then
  echo "No address pairs extracted. Check source and rerun." | tee -a "$LOG"
  exit 0
fi

# Probe balances: per-address queries (blockchain.info rawaddr). store satoshi & btc.
echo "addr,balance_sats,balance_btc,n_tx" > "$BAL"
while IFS=, read -r addr label; do
  # skip header line
  if [ "$addr" = "addr" ]; then continue; fi
  # small sleep to be polite
  sleep 0.8
  if ! out=$(curl -sS -m 15 "https://blockchain.info/rawaddr/$addr" -A "aipg/1.0" 2>/dev/null); then
    echo "$addr,ERROR,ERROR,ERROR" >> "$BAL"
    continue
  fi
  # parse final_balance and n_tx using python to avoid jq dependency
  vals=$(python3 - <<PY2
import sys, json
try:
    j=json.loads(sys.stdin.read())
    fb=j.get('final_balance', None)
    ntx=j.get('n_tx', None)
    print(f"{fb or ''},{(fb/1e8) if fb is not None else ''},{ntx or ''}")
except Exception as e:
    print(",,")
PY2
  <<<"$out")
  fb=$(echo "$vals" | cut -d, -f1)
  fb_btc=$(echo "$vals" | cut -d, -f2)
  ntx=$(echo "$vals" | cut -d, -f3)
  # if empty, mark ERROR
  if [ -z "$fb" ]; then fb="ERROR"; fb_btc="ERROR"; fi
  echo "$addr,$fb,$fb_btc,$ntx" >> "$BAL"
done < "$PAIRS"

echo "Balances -> $BAL" | tee -a "$LOG"
echo "Finished. Output dir: $OUTDIR" | tee -a "$LOG"
