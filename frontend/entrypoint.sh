#!/bin/bash
set -e

# Install dependencies
npm install

# Run the web service
PORT=$FRONTEND_PORT NODE_ENV=development npm run serve
