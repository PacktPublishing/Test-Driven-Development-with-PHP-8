#!/bin/bash
export XDEBUG_CONFIG="idekey=PHPSTORM"
export PHP_IDE_CONFIG="serverName=phptdd"
export XDEBUG_MODE="OFF"

php bin/phpunit --color $@
