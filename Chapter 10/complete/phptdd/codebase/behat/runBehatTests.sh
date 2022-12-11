#!/bin/bash
export XDEBUG_CONFIG="idekey=PHPSTORM"
export PHP_IDE_CONFIG="serverName=behat"
export XDEBUG_MODE="off"

XDEBUGOPT=
if [ "x$NODEBUG" = "x" ]; then
    XDEBUGOPT="-d xdebug.start_with_request=yes"
fi

php $XDEBUGOPT /var/www/html/behat/vendor/bin/behat --config=/var/www/html/behat/behat.yml --colors $@
