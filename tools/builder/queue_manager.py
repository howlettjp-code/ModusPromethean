import sys
import json
import subprocess
import os

# Define paths to tools relative to this script
SCRIPT_DIR = os.path.dirname(os.path.abspath(__file__))
CONSTRUCTOR_TOOL = os.path.join(SCRIPT_DIR, "constructor.py")
FILE_WRITER_TOOL = os.path.join(SCRIPT_DIR, "file_writer.py")
COMMAND_EXECUTER_TOOL = os.path.join(SCRIPT_DIR, "command_executer.py")

def run_constructor(instruction, context):
    """Calls constructor.py to generate content."""
    # We pass the instruction as argument.
    # In a real system, we might need a way to pass large context securely (e.g. env var or temp file).
    # For now, we'll pass a combined string for simplicity.
    combined_prompt = f"CONTEXT: {context}\n\nINSTRUCTION: {instruction}"
    
    result = subprocess.run(
        [sys.executable, CONSTRUCTOR_TOOL, combined_prompt],
        capture_output=True, text=True
    )
    if result.returncode != 0:
        raise Exception(f"Constructor failed: {result.stderr}")
    return result.stdout.strip()

def run_file_writer(path, content):
    """Calls file_writer.py to save content."""
    # Pipe content to stdin to handle large payloads safely
    process = subprocess.Popen(
        [sys.executable, FILE_WRITER_TOOL, path],
        stdin=subprocess.PIPE,
        stdout=subprocess.PIPE,
        stderr=subprocess.PIPE,
        text=True
    )
    stdout, stderr = process.communicate(input=content)
    
    if process.returncode != 0:
        raise Exception(f"File Writer failed: {stderr}")
    return stdout.strip()

def run_command_executer(command):
    """Calls command_executer.py."""
    result = subprocess.run(
        [sys.executable, COMMAND_EXECUTER_TOOL, command],
        capture_output=True, text=True
    )
    # Note: command_executer returns non-zero if the command fails, handle accordingly
    return result.returncode, result.stdout.strip()

def process_queue(queue):
    global_context = "Project Root: ~/ModusPromethean/repo/www/moduspromethean.com\n"
    
    print(f"=== QUEUE MANAGER STARTED: {len(queue)} Tasks ===")
    
    for i, task in enumerate(queue):
        print(f"\n[TASK {i+1}/{len(queue)}] {task['name']} ({task['type']})")
        
        try:
            if task['type'] == 'FILE_WRITE':
                # 1. Construct Content
                instruction = task['instruction']
                print(f"  -> Constructing content...")
                content = run_constructor(instruction, global_context)
                
                # 2. Write File
                target = task.get('target_path')
                if not target:
                    print("  !! Error: No target_path for FILE_WRITE task.")
                    continue
                    
                print(f"  -> Writing to {target}...")
                msg = run_file_writer(target, content)
                print(f"  -> {msg}")
                
                # 3. Update Context
                global_context += f"\n[COMPLETED] Wrote file: {target}"

            elif task['type'] == 'COMMAND_EXEC':
                # 1. Execute Command
                cmd = task['instruction']
                print(f"  -> Executing: {cmd}")
                code, output = run_command_executer(cmd)
                
                if code == 0:
                    print(f"  -> Success.")
                    global_context += f"\n[COMPLETED] Command: {cmd}"
                else:
                    print(f"  !! Command Failed (Code {code}):\n{output}")
                    # Decide whether to halt or continue based on severity
            
            elif task['type'] == 'LOGIC' or task['type'] == 'UNKNOWN':
                 # Pure reasoning task? Maybe just update context.
                 print(f"  -> Logic task processed (Context updated).")
                 global_context += f"\n[NOTE] {task['instruction']}"

        except Exception as e:
            print(f"!! CRITICAL ERROR processing task: {e}")
            break
            
    print("\n=== QUEUE EXECUTION COMPLETE ===")

if __name__ == "__main__":
    # CLI Usage: cat sequence.json | python queue_manager.py
    
    try:
        if not sys.stdin.isatty():
            input_data = sys.stdin.read()
            queue = json.loads(input_data)
            process_queue(queue)
        else:
            print("Error: Please pipe a JSON sequence into this script.")
            sys.exit(1)
            
    except json.JSONDecodeError:
        print("Error: Invalid JSON input.", file=sys.stderr)
        sys.exit(1)