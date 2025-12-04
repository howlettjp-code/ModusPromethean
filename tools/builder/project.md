PROJECT ABSTRACT: AUTONOMOUS RECURSIVE BUILDER SWARM (V0.1)

1. ABSTRACT

The Recursive Builder is a local-first, autonomous agent architecture designed to convert high-level architectural intent into verifiable, production-ready code. Unlike standard "chat-to-code" interfaces, it employs a Recursive Decomposition/Construction cognitive model. It breaks complex objectives down into atomic units ("Decomposition") or builds vague objectives up with necessary context ("Construction") before execution.

The system operates on a Hub-and-Spoke model: the Intelligence (LLM) and Control Logic live locally (on "Aphrodite"), while the Execution targets the local filesystem or remote servers via secure SSH tunnels. This ensures that sensitive credentials and architectural IP never leave the local control plane.

2. SCOPE (V0.1 "STEEL THREAD")

The immediate scope is to automate the construction of the Modus Promethean V0.x backend (Laravel 11, Postgres, Apache).

Capabilities:

Atomic Execution: Generating single files or running single commands.

Complex Planning: Breaking down "Build Auth System" into migration, model, and controller tasks.

Ambiguity Resolution: Detecting vague prompts and engaging the user for clarification before burning tokens.

State Management: Maintaining a "Context Ledger" that passes the output of Task A as the input context for Task B.

3. COMPONENT ARCHITECTURE & INTERFACES

A. The Master Controller (agent.py)

Role: The Brain / Router.
Function: The single entry point. It receives the User Prompt, sends it to the LLM for assessment, and routes execution to the appropriate pipeline.

Input: User Prompt (String)

Logic:

If Atomic: -> Wraps in single-item queue -> Queue Manager

If Complex: -> Decomposer -> Sequencer -> Queue Manager

If Ambiguous: -> Prompts User -> Recurses to self.

Output: Execution Status (Success/Fail).

B. The Decomposer (decomposer.py)

Role: The Architect.
Function: Recursively analyzes a task to determine its constituent parts or missing context.

Input: Task Description (String)

Output: Plan Object (JSON)

{
  "classification": "COMPLEX",
  "subtasks": [
    { "name": "Task 1", "instruction": "...", "type": "FILE_WRITE" }
  ]
}


C. The Sequencer (sequencer.py)

Role: The Project Manager.
Function: Flattens the hierarchical (nested) JSON tree from the Decomposer into a linear, dependency-safe execution list.

Input: Plan Object (JSON Tree)

Output: Execution Queue (JSON List) [Task 1, Task 2, Task 3...]

D. The Queue Manager (queue_manager.py)

Role: The Dispatcher.
Function: Iterates through the linear queue. It manages the Global Context string, appending the result of each completed task so subsequent tasks are context-aware.

Input: Execution Queue (JSON List)

Logic:

Updates Context.

Calls Constructor to generate payload.

Calls Response Parser to clean payload.

Calls Tool (File Writer/Command Exec) to apply payload.

Output: Execution Log (Console/File).

E. The Constructor (constructor.py)

Role: The Worker.
Function: A specialized LLM wrapper that takes a specific instruction and context, generating the raw asset (code or command).

Input: Instruction (String) + Global Context (String)

Output: Raw LLM Response (String)

F. The Response Parser (response_parser.py)

Role: The Sanitizer.
Function: Removes conversational fluff ("Here is your code:") and extracts the actual payload using Regex logic.

Input: Raw LLM Response (String)

Output: Clean Payload (String/Code Block)

G. The Tools (The Hands)

Role: Effectors.
Function: Physical interaction with the environment.

File Writer (file_writer.py):

Input: Target Path + Content

Action: Creates directories, writes files.

Command Executer (command_executer.py):

Input: Shell Command

Action: Executes via subprocess, captures stdout/stderr.

4. DATA FLOW SUMMARY

User -> Agent -> Decomposer -> Sequencer -> Queue Manager -> Constructor -> Parser -> Tools -> Disk/Server