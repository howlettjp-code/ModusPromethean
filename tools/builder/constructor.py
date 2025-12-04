import os
import sys
import openai

# Configuration
API_KEY = os.getenv("OPENAI_API_KEY")
MODEL = "gpt-4o" 

if not API_KEY:
    print("Error: OPENAI_API_KEY not set.")
    sys.exit(1)

client = openai.OpenAI(api_key=API_KEY)

def construct_payload(instruction, context=""):
    """
    Generates the actual content (code, text) for a task.
    """
    system_prompt = """
    You are an expert AI Developer. 
    Your goal is to generate high-quality, production-ready content based on the instruction.
    
    IMPORTANT:
    - Output ONLY the requested content. 
    - Do NOT include markdown blocks (```) unless specifically asked for documentation.
    - If writing code, include comments but no conversational filler.
    """
    
    user_prompt = f"""
    CONTEXT: {context}
    
    INSTRUCTION: {instruction}
    """
    
    print(f"--> [CONSTRUCTOR] Building payload for: {instruction[:50]}...", file=sys.stderr)
    
    response = client.chat.completions.create(
        model=MODEL,
        messages=[
            {"role": "system", "content": system_prompt},
            {"role": "user", "content": user_prompt}
        ],
        temperature=0.1
    )
    
    # Clean output logic (strip fences if present)
    content = response.choices[0].message.content.strip()
    if content.startswith("```"):
        content = "\n".join(content.split("\n")[1:])
    if content.endswith("```"):
        content = "\n".join(content.split("\n")[:-1])
        
    return content

if __name__ == "__main__":
    # CLI Usage: python constructor.py "Write a PHP class for User"
    if len(sys.argv) < 2:
        print("Usage: python constructor.py \"Instruction\"")
        sys.exit(1)
        
    instruction = " ".join(sys.argv[1:])
    
    # In a real pipeline, we would read context from a file or DB.
    # For now, we assume simple atomic tasks.
    result = construct_payload(instruction)
    
    # Output to stdout so it can be piped to file_writer.py
    print(result)