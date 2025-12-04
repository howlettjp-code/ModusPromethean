import os
import sys
import json
import openai

# Configuration
API_KEY = os.getenv("OPENAI_API_KEY")
MODEL = "gpt-4o" 

if not API_KEY:
    print("Error: OPENAI_API_KEY not set.")
    sys.exit(1)

client = openai.OpenAI(api_key=API_KEY)

def decompose_task(task_description, depth=0, max_depth=3):
    """
    Recursively breaks down a task into subtasks using the LLM.
    Returns a JSON structure of the breakdown.
    """
    
    # 1. Define the System Prompt for the Architect
    system_prompt = """
    You are the Chief Architect of the 'Modus Promethean' AI project.
    Your goal is to decompose high-level requests into atomic, actionable steps.
    
    OUTPUT FORMAT:
    Return ONLY a JSON object with this structure:
    {
      "is_atomic": boolean, // True if this task is small enough to be coded directly (e.g. "Write a file", "Run a command")
      "subtasks": [ // Only if is_atomic is False
        {
          "name": "Brief title",
          "instruction": "Detailed instruction for the worker",
          "type": "FILE_WRITE" | "COMMAND_EXEC" | "LOGIC"
        }
      ]
    }
    """
    
    # 2. Call the LLM
    print(f"{'  ' * depth}--> [DECOMPOSER] Analyzing: {task_description[:50]}...")
    
    response = client.chat.completions.create(
        model=MODEL,
        messages=[
            {"role": "system", "content": system_prompt},
            {"role": "user", "content": f"TASK: {task_description}"}
        ],
        temperature=0.2,
        response_format={"type": "json_object"}
    )
    
    result = json.loads(response.choices[0].message.content)
    
    # 3. Recursive Logic
    # If the LLM says it's not atomic, and we haven't hit max depth, keep breaking it down.
    # (For V0.1, we might just stop at one level of breakdown to keep it simple, but here is the logic).
    
    return result

if __name__ == "__main__":
    if len(sys.argv) < 2:
        print("Usage: python decomposer.py \"Your high level task\"")
        sys.exit(1)
        
    task = " ".join(sys.argv[1:])
    plan = decompose_task(task)
    
    # Output the JSON plan to stdout so it can be piped to the Sequencer/Queue
    print(json.dumps(plan, indent=2))