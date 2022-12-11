#!/bin/bash
docker "kill $(docker ps -q)"
docker-compose -f ./phptdd/docker/docker-compose.yml build
docker-compose -f ./phptdd/docker/docker-compose.yml up -d
docker ps