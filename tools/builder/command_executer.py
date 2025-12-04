import subprocess
import sys
import shlex

def execute_shell_command(command_str):
    """
    Executes a shell command and returns the output (stdout + stderr).
    SECURITY WARNING: This executes arbitrary shell commands.
    """
    try:
        # Using shell=True to allow complex pipes and redirects, 
        # which fits the 'letting out of the cage' requirement.
        result = subprocess.run(
            command_str,
            shell=True,
            text=True,
            stdout=subprocess.PIPE,
            stderr=subprocess.PIPE
        )
        
        output = result.stdout
        if result.stderr:
            output += f"\n[STDERR]\n{result.stderr}"
            
        return result.returncode, output.strip()
        
    except Exception as e:
        return -1, f"Execution failed: {str(e)}"

if __name__ == "__main__":
    # CLI Usage: python command_executer.py "ls -la"
    if len(sys.argv) < 2:
        print("Usage: python command_executer.py <command_string>")
        sys.exit(1)
        
    # Join args in case they weren't quoted properly, though quoting is preferred
    cmd = " ".join(sys.argv[1:])
    code, out = execute_shell_command(cmd)
    
    if code == 0:
        print(out)
    else:
        print(f"Error (Code {code}):\n{out}", file=sys.stderr)
        sys.exit(code)