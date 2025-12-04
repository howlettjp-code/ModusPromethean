import sys
import json

def flatten_plan(plan_node, flattened_list=None):
    """
    Recursively flattens a hierarchical plan into a linear sequence.
    Depth-first traversal ensures dependencies (subtasks) are done before the parent task is marked complete.
    """
    if flattened_list is None:
        flattened_list = []

    # If this node has subtasks, process them first (dependencies)
    if "subtasks" in plan_node and plan_node["subtasks"]:
        for subtask in plan_node["subtasks"]:
            flatten_plan(subtask, flattened_list)
    
    # If this node is atomic (executable), add it to the list
    if plan_node.get("is_atomic", False):
        flattened_list.append({
            "name": plan_node.get("name", "Unnamed Task"),
            "instruction": plan_node.get("instruction", ""),
            "type": plan_node.get("type", "UNKNOWN"),
            "target_path": plan_node.get("target_path", None) # Optional file target
        })
        
    return flattened_list

if __name__ == "__main__":
    # CLI Usage: cat plan.json | python sequencer.py
    
    try:
        # Read JSON from stdin
        if not sys.stdin.isatty():
            input_data = sys.stdin.read()
            plan_json = json.loads(input_data)
        else:
            print("Error: Please pipe a JSON plan into this script.")
            sys.exit(1)
            
        # Flatten
        sequence = flatten_plan(plan_json)
        
        # Output linear list as JSON
        print(json.dumps(sequence, indent=2))
        
    except json.JSONDecodeError:
        print("Error: Invalid JSON input.", file=sys.stderr)
        sys.exit(1)
    except Exception as e:
        print(f"Error during sequencing: {str(e)}", file=sys.stderr)
        sys.exit(1)