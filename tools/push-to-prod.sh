#!/bin/bash

# =====================================================================
# TOOL SCRIPT: push-to-prod.sh
# Location: ~/ModusPromethean/repo/tools/push-to-prod.sh
# Purpose: Rsync sites AND deploy Apache configs to Vultr VPS.
# =====================================================================

# --- 1. INITIALIZE LOGGING ---
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
source "${SCRIPT_DIR}/_enable_logging.sh"

# --- 2. CONFIGURATION ---
SERVER_HOSTNAME="modpx.dev"
SERVER_USER="root"
REMOTE_WEB_ROOT="/var/www/"
REMOTE_CONFIG_DIR="/etc/apache2/sites-available/"
SOURCE_BASE_DIR="${REPO_DIR}/www"

echo "[START] Deployment task initiated."
echo "Target Server: $SERVER_HOSTNAME"
echo "--------------------------------------------"

# Pre-flight checks
if [ ! -d "$SOURCE_BASE_DIR" ]; then
    echo "[CRITICAL] Source base directory not found at: $SOURCE_BASE_DIR"
    exit 1
fi

if ! command -v rsync &> /dev/null; then
    echo "[CRITICAL] rsync not found. Deployment aborted."
    exit 1
fi

# --- DEPLOYMENT FUNCTION ---
deploy_site() {
    local site_dir_name=$1
    local full_source_path="${SOURCE_BASE_DIR}/${site_dir_name}"
    # Assume config file is named exactly same as directory + .conf
    local config_file="${site_dir_name}.conf"

    echo "[DEPLOYING] Processing site: $site_dir_name"
    
    if [ -d "$full_source_path" ]; then
        # 1. Push Files (Content + Config)
        rsync -av --delete -e ssh "$full_source_path" "$SERVER_USER@$SERVER_HOSTNAME:$REMOTE_WEB_ROOT"
        
        if [ $? -eq 0 ]; then
            echo "[SUCCESS] Files synced."
            
            # 2. Remote Operations: Move Config & Enable Site
            # We chain these commands over one SSH connection for speed
            echo "[CONFIG] Updating Apache configuration for $site_dir_name..."
            
            ssh "$SERVER_USER@$SERVER_HOSTNAME" "
                # Copy config from web root to apache dir
                cp ${REMOTE_WEB_ROOT}${site_dir_name}/${config_file} ${REMOTE_CONFIG_DIR}
                # Ensure the site is enabled
                a2ensite ${config_file}
            "
            
            if [ $? -eq 0 ]; then
                echo "[SUCCESS] Config updated and site enabled."
            else
                echo "[ERROR] Failed to update remote Apache config."
                DEPLOY_ERRORS=true
            fi
        else
             echo "[ERROR] rsync failed. Exit code: $?"
             DEPLOY_ERRORS=true
        fi
    else
        echo "[ERROR] Source directory '$full_source_path' not found. Skipping."
        DEPLOY_ERRORS=true
    fi
    echo "--------------------------------------------"
}

# --- EXECUTE ---
DEPLOY_ERRORS=false

deploy_site "moduspromethean.com"
deploy_site "modpx.dev"

# --- FINAL APACHE RELOAD ---
if [ "$DEPLOY_ERRORS" = false ]; then
    echo "[APACHE] Testing configuration and reloading..."
    # Run configtest first. Only reload if Syntax is OK.
    ssh "$SERVER_USER@$SERVER_HOSTNAME" "apache2ctl configtest && systemctl reload apache2"
    
    if [ $? -eq 0 ]; then
        echo "[SUCCESS] Apache reloaded. Deployment Complete."
        exit 0
    else
        echo "[CRITICAL] Apache config test failed! Server not reloaded."
        exit 1
    fi
else
    echo "[FINISHED] Task completed with ERRORS. Apache NOT reloaded."
    exit 1
fi