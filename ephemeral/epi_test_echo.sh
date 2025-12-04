#!/usr/bin/env bash
set -euo pipefail
export LC_ALL=C
echo "TEST EPI START $(date -u +%Y-%m-%dT%H:%M:%SZ)"
sleep 1
echo "ENV HOME: $HOME"
ls -1A "$HOME" | head -n 10
echo "TEST EPI DONE $(date -u +%Y-%m-%dT%H:%M:%SZ)"
