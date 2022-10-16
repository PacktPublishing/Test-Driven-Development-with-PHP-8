#!/bin/bash
export XDEBUG_CONFIG="idekey=PHPSTORM"
export PHP_IDE_CONFIG="serverName=phptdd"
export XDEBUG_MODE="coverage"

php /var/www/html/symfony/bin/phpunit --configuration /var/www/html/symfony/phpunit.xml --color=always --coverage-text $@
