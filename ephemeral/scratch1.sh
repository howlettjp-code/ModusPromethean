#!/bin/bash

# Define the output directory and file name based on the script name
OUTPUT_DIR=~/modpx/results
OUTPUT_FILE="$OUTPUT_DIR/scratch1.txt"

# List all files and directories and save to the output file
echo "$OUTPUT_FILE"
echo "modpx:" > "$OUTPUT_FILE"
ls -Rlah ~/modpx/ >> "$OUTPUT_FILE"

# You can add more cleanup commands here if needed
