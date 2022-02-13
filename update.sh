#!/bin/bash
# ┌──────────────────────┐
# │  Spyke Self-Updater  │
# │ by Wolfgang de Groot │
# └──────────────────────┘

# 1. Update repository from GitHub
echo "[] Updating from GitHub..."
git pull

# 2. Composer updates and deploys all dependencies/requirements
echo "[] Deploying project..."
composer install

# 3. Complete!
echo "[] Spyke has been updated and deployed!"