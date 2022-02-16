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
	echo "[] Checking for updates..."
	BRNCH="Intro-to-SE-lab-Spring-22/Group-8" # Our GitHub Branch
	LOCAL=$(git rev-parse HEAD)
	REPOS=$( # Find the SHA hash of the latest commit on GitHub.
		curl -s "https://api.github.com/repos/$BRNCH/branches/main" |
		jq -r ".commit.sha"
	)
	SHORT=${REPOS::7} # The first 7 characters of REPOS for its short hash.
	HTTPS="\e]8;;https://github.com/$BRNCH/commit/$REPOS\a$SHORT\e]8;;\a"
	if [ "$LOCAL" == "$REPOS" ]; then
		# 1a. Do nothing, and link to the latest commit in the repo for info.
		echo -e "[] Already up to date. ($HTTPS)"
		exit
	else
		# 1b. Update repository from GitHub
		echo "[] Update ready! Pulling from GitHub..."
		git pull
		chmod +x $BASH_SOURCE
	fi

	# 2. Composer updates and deploys all dependencies/requirements
	echo "[] Deploying project..."
	composer install

	# 3. Complete!
	echo "[] Spyke has been updated and deployed!"
fi