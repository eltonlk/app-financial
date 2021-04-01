#!/bin/bash
set -e

# Install dependencies
bundle install

# Create the Rails production DB on first run
bundle exec rake db:create

# Make sure we are using the most up to date database schema
bundle exec rake db:migrate

# Run the api service
PORT=$BACKEND_PORT bundle exec puma
