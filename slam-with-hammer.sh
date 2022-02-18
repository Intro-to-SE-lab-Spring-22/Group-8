#!/bin/bash

echo "[] This will clear the Git stash, and is not for development environments."

while true; do
    read -p "[] Continue?" yn
    case $yn in
        [Yy]* ) make install; break;;
        [Nn]* ) exit;;
        * ) echo " [] What? It's either Y or N.";;
    esac
done

echo "[] *bang* *bang* bang*"
git stash push --include-untracked
echo "[] Alright, see if it works now."