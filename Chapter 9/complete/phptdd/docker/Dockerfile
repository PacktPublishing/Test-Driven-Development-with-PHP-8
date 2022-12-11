FROM php:8.1.3RC1-apache-buster

# Install MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql && a2enmod rewrite

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Git
RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y git

# Install Xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host = host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini