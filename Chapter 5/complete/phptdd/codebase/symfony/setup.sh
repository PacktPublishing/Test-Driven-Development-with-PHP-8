#!/bin/bash
composer install -d /var/www/html/symfony/

# Test DB
php /var/www/html/symfony/bin/console doctrine:database:create -n --env=test
php /var/www/html/symfony/bin/console doctrine:migrations:migrate -n --env=test

# Main DB
php /var/www/html/symfony/bin/console doctrine:database:create -n
php /var/www/html/symfony/bin/console doctrine:migrations:migrate -n