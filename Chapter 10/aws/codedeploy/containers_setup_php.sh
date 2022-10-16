#!/bin/bash

# Build and run containers (PHP, MySQL)
docker-compose -f ~/phptdd/docker/docker-compose-production.yml down
docker-compose -f ~/phptdd/docker/docker-compose-production.yml build
docker-compose -f ~/phptdd/docker/docker-compose-production.yml up -d

# Setup the PHP Applications inside the containers (install composer packages, setup db, etc).
docker-compose -f ~/phptdd/docker/docker-compose-production.yml exec server-web php --version
docker-compose -f ~/phptdd/docker/docker-compose-production.yml exec server-web /var/www/html/symfony/setup.sh
docker-compose -f ~/phptdd/docker/docker-compose-production.yml exec server-web /var/www/html/behat/setup.sh