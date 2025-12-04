#!/usr/bin/env bash
#
# ff-trip-col.sh
#
# Open three Firefox windows (optionally with URLs) and tile them
# into three vertical columns on the current screen.
#
# Usage:
#   ff-trip-col.sh
#   ff-trip-col.sh URL1
#   ff-trip-col.sh URL1 URL2
#   ff-trip-col.sh URL1 URL2 URL3
#

set -u

# ---- Configurable sleep to give Firefox time to create windows ----
STARTUP_SLEEP=5

# ---- Check dependencies ----
for cmd in xdotool xdpyinfo firefox; do
    if ! command -v "$cmd" >/dev/null 2>&1; then
        echo "Error: required command '$cmd' not found in PATH." >&2
        exit 1
    fi
done

# ---- Capture existing Firefox window IDs (before launching new ones) ----
# This lets us distinguish the three new windows from any existing ones.
mapfile -t OLD_WINS < <(xdotool search --class "Firefox" 2>/dev/null || true)

# ---- Launch up to three new Firefox windows ----
URL1="${1:-}"
URL2="${2:-}"
URL3="${3:-}"

# Launch each window; if URL is empty, just open a blank/whatever default.
firefox --new-window ${URL1:+"$URL1"} &>/dev/null &
firefox --new-window ${URL2:+"$URL2"} &>/dev/null &
firefox --new-window ${URL3:+"$URL3"} &>/dev/null &

# Give Firefox time to spin up and create the windows
sleep "$STARTUP_SLEEP"

# ---- Get all Firefox windows after launch ----
mapfile -t ALL_WINS < <(xdotool search --class "Firefox" 2>/dev/null || true)

# ---- Compute the set of *new* windows = ALL_WINS - OLD_WINS ----
is_old() {
    local id="$1"
    for old in "${OLD_WINS[@]}"; do
        if [[ "$old" == "$id" ]]; then
            return 0
        fi
    done
    return 1
}

NEW_WINS=()
for win in "${ALL_WINS[@]}"; do
    if ! is_old "$win"; then
        NEW_WINS+=("$win")
    fi
done

# ---- If we didn't reliably capture 3 new windows, fall back to last 3 visible ----
if (( ${#NEW_WINS[@]} < 3 )); then
    # Last 3 visible Firefox windows on current workspace
    mapfile -t NEW_WINS < <(xdotool search --onlyvisible --class "Firefox" | tail -n 3 || true)
fi

if (( ${#NEW_WINS[@]} < 3 )); then
    echo "Error: could not find three Firefox windows to tile." >&2
    exit 1
fi

# We only need the first three
WIN1="${NEW_WINS[0]}"
WIN2="${NEW_WINS[1]}"
WIN3="${NEW_WINS[2]}"

# ---- Get screen resolution ----
read SCREEN_W SCREEN_H <<< "$(xdpyinfo | awk '/dimensions/{split($2,a,"x");print a[1],a[2]}')"

if [[ -z "$SCREEN_W" || -z "$SCREEN_H" ]]; then
    echo "Error: could not determine screen dimensions." >&2
    exit 1
fi

COL_W=$(( SCREEN_W / 3 ))

# ---- Tile the three windows into columns ----
# Left column
xdotool windowactivate "$WIN1"
xdotool windowmove    "$WIN1" 0 0
xdotool windowsize    "$WIN1" "$COL_W" "$SCREEN_H"

# Middle column
xdotool windowactivate "$WIN2"
xdotool windowmove     "$WIN2" "$COL_W" 0
xdotool windowsize     "$WIN2" "$COL_W" "$SCREEN_H"

# Right column
xdotool windowactivate "$WIN3"
xdotool windowmove     "$WIN3" $((2 * COL_W)) 0
xdotool windowsize     "$WIN3" "$COL_W" "$SCREEN_H"

exit 0
