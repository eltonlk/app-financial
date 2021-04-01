#!/bin/bash
set -e

# Install dependencies
npm install

# Run the web service
PORT=$FRONTEND_PORT npm run serve
