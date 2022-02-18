#!/bin/bash

echo "[] This will clear the Git stash, and is not for development environments."

Slam () {
    echo "[] *bang* *bang* bang*"
    git stash push --include-untracked &> /dev/null
    echo "[] Alright, see if it works now."
}

while true; do
    read -p "[] Continue?" yn
    case $yn in
        [Yy]* ) Slam; break;;
        [Nn]* ) exit;;
        * ) echo " [] What? It's either Y or N.";;
    esac
done
