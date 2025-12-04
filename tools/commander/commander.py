#!/usr/bin/env python3
import json
import subprocess
from pathlib import Path
from datetime import datetime

ROOT = Path(__file__).resolve().parents[2]  # .../ModusPromethean/repo
TASKS_PATH = ROOT / "tools" / "commander" / "tasks.json"

def sh(cmd: str, use_sudo: bool = False) -> tuple[int, str]:
    """Run a shell command locally on aphrodite."""
    if use_sudo:
        cmd = f"sudo -S -p '' {cmd}"
    print(f"\n[CMD] {cmd}")
    proc = subprocess.run(
        cmd,
        shell=True,
        text=True,
        input=None if not use_sudo else "",
        capture_output=True,
    )
    out = proc.stdout + proc.stderr
    print(out.strip())
    return proc.returncode, out

def ssh_sh(host: str, user: str, remote_cmd: str) -> tuple[int, str]:
    """Run a shell command on remote host as given user (no sudo there)."""
    cmd = f"ssh {user}@{host} '{remote_cmd}'"
    print(f"\n[SSH CMD] {cmd}")
    proc = subprocess.run(
        cmd,
        shell=True,
        text=True,
        capture_output=True,
    )
    out = proc.stdout + proc.stderr
    print(out.strip())
    return proc.returncode, out

def load_tasks():
    if not TASKS_PATH.exists():
        return []
    return json.loads(TASKS_PATH.read_text())

def save_tasks(tasks):
    TASKS_PATH.write_text(json.dumps(tasks, indent=2))

def append_history(task, action: str, output: str, ok: bool):
    ts = datetime.utcnow().isoformat() + "Z"
    task.setdefault("history", []).append({
        "ts": ts,
        "action": action,
        "ok": ok,
        "output": output[:4000],
    })

def run_php82_task(task):
    host = task.get("host", "jphowlett")
    user = task.get("remote_user", "root")

    steps = [
        "add-apt-repository -y ppa:ondrej/php && apt update",
        "apt install -y php8.2 php8.2-cli php8.2-common php8.2-mbstring php8.2-xml php8.2-curl php8.2-zip php8.2-mysql libapache2-mod-php8.2",
        "a2dismod php8.1 || true && a2enmod php8.2 && systemctl restart apache2",
        "command -v php8.2 >/dev/null 2>&1 && update-alternatives --set php /usr/bin/php8.2 || true",
        "php -v",
        "curl -vkI https://moduspromethean.com || true",
        "tail -n 10 /var/log/apache2/mp-prod-error.log || true",
    ]

    for cmd in steps:
        rc, out = ssh_sh(host, user, cmd)
        append_history(task, f"{host}: {cmd}", out, rc == 0)
        if rc != 0:
            task["status"] = "failed"
            return

    task["status"] = "completed"

def main():
    tasks = load_tasks()
    changed = False

    for task in tasks:
        if task.get("status") != "pending":
            continue

        goal = task.get("goal", "")
        print(f"\n=== Running task {task.get('id')} ===")
        print(f"Goal: {goal}")

        if "php82" in task.get("id", ""):
            run_php82_task(task)
            changed = True
        else:
            task["status"] = "skipped"
            append_history(task, "skip", "No handler for this task id", False)
            changed = True

    if changed:
        save_tasks(tasks)

if __name__ == "__main__":
    main()
