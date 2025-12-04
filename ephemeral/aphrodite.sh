#!/usr/bin/env bash
# runeph_php82_mp.sh
# Fix "Composer requires PHP >= 8.2.0" for moduspromethean.com
# Behavior:
#   - On local box (not jphowlett): requires sudo, then ssh root@jphowlett and run the remote block.
#   - On jphowlett: runs the remote block directly, NO sudo used.

set -euo pipefail

REMOTE_HOST="jphowlett"
REMOTE_USER="root"

short_host="$(hostname -s 2>/dev/null || hostname)"

run_remote_block() {
  echo "[*] Running PHP 8.2 upgrade block on $(hostname -f 2>/dev/null || hostname)..."

  # Safety: make sure we are on the intended web server
  if [ "$short_host" != "$REMOTE_HOST" ]; then
    echo "[!] Refusing to run directly: this host is '$short_host', expected '$REMOTE_HOST'."
    echo "    This function should only be executed on $REMOTE_HOST."
    exit 1
  fi

  if [ "$EUID" -ne 0 ]; then
    echo "[!] Must be root on $REMOTE_HOST (login as root, do NOT use sudo)."
    exit 1
  fi

  echo "[*] Current PHP version:"
  php -v || true

  echo "[*] Adding Ondřej PHP PPA (idempotent)..."
  add-apt-repository -y ppa:ondrej/php
  apt update

  echo "[*] Installing PHP 8.2 + common extensions..."
  apt install -y \
    php8.2 php8.2-cli php8.2-common \
    php8.2-mbstring php8.2-xml php8.2-curl \
    php8.2-zip php8.2-mysql libapache2-mod-php8.2

  echo "[*] Switching Apache from php8.1 to php8.2 (ignore errors if 8.1 not enabled)..."
  a2dismod php8.1 || true
  a2enmod php8.2

  echo "[*] Restarting Apache..."
  systemctl restart apache2

  echo "[*] Pointing CLI 'php' to php8.2 (for composer / artisan)..."
  if command -v php8.2 >/dev/null 2>&1; then
    update-alternatives --set php /usr/bin/php8.2 || true
  fi

  echo "[*] New PHP version:"
  php -v || true

  echo "[*] Hitting site from localhost:"
  curl -vkI https://moduspromethean.com || true

  echo "[*] Tail of mp-prod-error.log (last 10 lines):"
  tail -n 10 /var/log/apache2/mp-prod-error.log || true

  echo "[*] Done. If you still see Composer whining about PHP version, something is lying."
}

if [ "$short_host" = "$REMOTE_HOST" ]; then
  # We are already on the remote web server (root@jphowlett).
  run_remote_block
else
  # Local box path: must be run with sudo, then ssh into remote as root.
  if [ "$EUID" -ne 0 ]; then
    echo "[!] Run this on the local box with sudo, e.g.:"
    echo "    sudo $(basename "$0")"
    exit 1
  fi

  echo "[*] Local host: $short_host (running as root via sudo)."
  echo "[*] Executing remote block on ${REMOTE_USER}@${REMOTE_HOST} (no sudo there)..."

  ssh -o BatchMode=no -t "${REMOTE_USER}@${REMOTE_HOST}" 'bash -s' << 'EOF'
set -euo pipefail

REMOTE_HOST="jphowlett"
short_host="$(hostname -s 2>/dev/null || hostname)"

if [ "$short_host" != "$REMOTE_HOST" ]; then
  echo "[!] Remote safety check failed: expected host '$REMOTE_HOST', got '$short_host'."
  exit 1
fi

if [ "$EUID" -ne 0 ]; then
  echo "[!] On remote we expect to be root, not using sudo."
  exit 1
fi

echo "[*] Remote host: $short_host (root)."

echo "[*] Current PHP version:"
php -v || true

echo "[*] Adding Ondřej PHP PPA (idempotent)..."
add-apt-repository -y ppa:ondrej/php
apt update

echo "[*] Installing PHP 8.2 + common extensions..."
apt install -y \
  php8.2 php8.2-cli php8.2-common \
  php8.2-mbstring php8.2-xml php8.2-curl \
  php8.2-zip php8.2-mysql libapache2-mod-php8.2

echo "[*] Switching Apache from php8.1 to php8.2 (ignore errors if 8.1 not enabled)..."
a2dismod php8.1 || true
a2enmod php8.2

echo "[*] Restarting Apache..."
systemctl restart apache2

echo "[*] Pointing CLI 'php' to php8.2 (for composer / artisan)..."
if command -v php8.2 >/div/null 2>&1; then
  update-alternatives --set php /usr/bin/php8.2 || true
fi

echo "[*] New PHP version:"
php -v || true

echo "[*] Hitting site from localhost:"
curl -vkI https://moduspromethean.com || true

echo "[*] Tail of mp-prod-error.log (last 10 lines):"
tail -n 10 /var/log/apache2/mp-prod-error.log || true

echo "[*] Remote PHP 8.2 upgrade block complete."
EOF

  echo "[*] Finished remote run."
fi
