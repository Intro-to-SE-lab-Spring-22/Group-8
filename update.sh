#!/bin/bash
# ┌──────────────────────┐
# │  Spyke Self-Updater  │
# │ by Wolfgang de Groot │
# └──────────────────────┘

# 0. Do we have jq?
if ! command -v jq &> /dev/null
then
	echo "[] ERROR!"
    echo "[] jq is required for the self-updater to check GitHub."
    echo "[] sudo apt install jq"
	exit 127 # Throws a 'command not found' code specifically
else
    # 1. Check if an update is needed
    LOCAL=$(git rev-parse HEAD)
    REPOS=$(curl -s "https://api.github.com/repos/Intro-to-SE-lab-Spring-22/Group-8/branches/main" | jq -r ".commit.sha")

    if [ "$LOCAL" == "$REPOS" ]; then
        # 1a. Do nothing.
        echo "[] Already up to date."
        exit
    else
        # 1b. Update repository from GitHub
        echo "[] Updating from GitHub..."
        git pull
    fi

    # 2. Composer updates and deploys all dependencies/requirements
    echo "[] Deploying project..."
    composer install

    # 3. Complete!
    echo "[] Spyke has been updated and deployed!"
fi