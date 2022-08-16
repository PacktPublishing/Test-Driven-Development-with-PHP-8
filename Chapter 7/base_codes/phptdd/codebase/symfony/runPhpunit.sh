#!/bin/bash
export XDEBUG_CONFIG="idekey=PHPSTORM"
export PHP_IDE_CONFIG="serverName=phptdd"

DEBUGOPT=
if [ "x$NODEBUG" = "x" ]; then
    DEBUGOPT="-d xdebug.start_with_request=yes"
fi

PROFILEOPT=

if ! [ "x$PROFILE" = "x" ]; then
    PROFILEOPT="-d xdebug.profiler_enable=1"
fi

COVERAGE="XDEBUG_MODE=coverage"


php $DEBUGOPT $PROFILEOPT bin/phpunit --color $@
