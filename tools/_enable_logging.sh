#!/bin/bash
# =====================================================================
# HELPER SCRIPT: _enable_logging.sh
# Location: ~/ModusPromethean/repo/tools/_enable_logging.sh
# Purpose: SOURCED by other tools to enable auto-logging to results/.
# DO NOT RUN DIRECTLY.
# =====================================================================

# --- SAFETY CHECK: ENSURE SOURCING ---
# Check if the script is being executed directly.
# If BASH_SOURCE[0] (this file) is the same as $0 (the executing command),
# it means it was run directly, not sourced.
if [[ "${BASH_SOURCE[0]}" == "${0}" ]]; then
    echo "[ERROR] _enable_logging.sh must be sourced by another script, not executed directly." >&2
    exit 1
fi

# --- 1. IDENTIFY CALLER AND PATHS ---
# Index [1] is the script that sourced this file.
CALLER_PATH="${BASH_SOURCE[1]}"

# Determine paths based on the caller's location
CALLER_DIR="$(cd "$(dirname "$CALLER_PATH")" && pwd)"
CALLER_BASENAME="$(basename "$CALLER_PATH" .sh)"

# Assume standard structure: caller is in repo/tools/, so repo root is one up.
REPO_DIR="$(dirname "$CALLER_DIR")"
RESULTS_DIR="${REPO_DIR}/results"
LOG_FILE="${RESULTS_DIR}/${CALLER_BASENAME}.log"

# --- 2. SETUP RESULTS DIRECTORY ---
if [ ! -d "$RESULTS_DIR" ]; then
    mkdir -p "$RESULTS_DIR" || {
        echo "[ERROR] Could not create results directory at $RESULTS_DIR" >&2
        # Return instead of exit so we don't kill the calling shell if sourced incorrectly
        return 1 
    }
fi

# --- 3. ENABLE LOGGING REDIRECTION ---
# Mark start time in the log file specifically
echo "--- Execution Started: $(date) ---" >> "$LOG_FILE"

# Redirect stdout (1) and stderr (2) into tee.
# tee writes to the console AND appends (-a) to the log file.
# Using exec ensures this applies to the rest of the calling script's execution.
exec > >(tee -a "$LOG_FILE") 2>&1

# Confirmation
echo "[LOGGING ENABLED] Output is being captured to: $LOG_FILE"