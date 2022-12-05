#!/bin/bash
docker kill "$(docker ps -q)"
docker-compose -f ./docker/docker-compose.yml build
docker-compose -f ./docker/docker-compose.yml up -d
docker ps