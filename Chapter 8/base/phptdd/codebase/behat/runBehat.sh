#!/bin/bash
export XDEBUG_CONFIG="idekey=PHPSTORM"
export PHP_IDE_CONFIG="serverName=behat"
export XDEBUG_MODE="debug"

XDEBUGOPT=
if [ "x$NODEBUG" = "x" ]; then
    XDEBUGOPT="-d xdebug.start_with_request=yes"
fi

php $XDEBUGOPT vendor/bin/behat $@
