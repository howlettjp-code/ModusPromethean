#!/usr/bin/env bash
set -e

# === CONFIGURATION ===
SHARE_USER="diana"
# Detect the real user (you), not root, for file ownership mapping
REAL_USER=${SUDO_USER:-$(whoami)}
REAL_HOME=$(getent passwd "$REAL_USER" | cut -d: -f6)
SHARE_PATH="$REAL_HOME/ModusPromethean/diana"
SMB_CONF="/etc/samba/smb.conf"

# 1. PRE-FLIGHT CHECKS
if [[ $EUID -ne 0 ]]; then
   echo "This script must be run as root. Try: sudo $0" 
   exit 1
fi

if [[ ! -d "$SHARE_PATH" ]]; then
    echo "Creating directory: $SHARE_PATH"
    mkdir -p "$SHARE_PATH"
    chown "$REAL_USER":"$REAL_USER" "$SHARE_PATH"
fi

# 2. INSTALL SAMBA (If missing)
if ! command -v smbd &> /dev/null; then
    echo "Installing Samba..."
    apt-get update && apt-get install -y samba
fi

# 3. CREATE LINUX USER (System user, no login shell)
if id "$SHARE_USER" &>/dev/null; then
    echo "Linux user '$SHARE_USER' already exists."
else
    echo "Creating Linux system user '$SHARE_USER'..."
    useradd -r -s /usr/sbin/nologin "$SHARE_USER"
fi

# 4. CREATE SAMBA USER & PASSWORD
echo ""
echo "=== SET PASSWORD FOR DIANA ==="
echo "You will need this password inside the VM to mount the share."
smbpasswd -a "$SHARE_USER"
echo "Samba user '$SHARE_USER' enabled."

# 5. CONFIGURE SMB.CONF
# We check if the share is already defined to avoid duplicate appending
if grep -q "\[$SHARE_USER\]" "$SMB_CONF"; then
    echo "Share [$SHARE_USER] already exists in $SMB_CONF. Skipping append."
else
    echo "Appending share configuration to $SMB_CONF..."
    
    # Backup first
    cp "$SMB_CONF" "$SMB_CONF.bak_$(date +%F_%T)"

    cat >> "$SMB_CONF" <<EOF

# --- MODUS PROMETHEAN: DIANA SHARE ---
[$SHARE_USER]
   path = $SHARE_PATH
   valid users = $SHARE_USER
   read only = no
   browsable = yes
   # THE TRICK: Authenticate as 'diana', but write files as '$REAL_USER' (you)
   # This prevents permission errors in your home directory.
   force user = $REAL_USER
   create mask = 0664
   directory mask = 0775
EOF
fi

# 6. RESTART SAMBA
echo "Restarting Samba services..."
systemctl restart smbd nmbd

echo ""
echo "=== DONE ==="
echo "Share Path: $SHARE_PATH"
echo "User:       $SHARE_USER"
echo "Status:     Ready."