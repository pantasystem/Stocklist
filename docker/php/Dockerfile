FROM php:7.3-fpm
COPY php.ini /usr/local/etc/php/

RUN apt-get update \
    && apt-get install -y zlib1g-dev libzip-dev mariadb-client \
    && docker-php-ext-install zip pdo_mysql

# composer install
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# authority
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
# composer pass
ENV PATH $PATH:/composer/vendor/bin
# laravel install
RUN composer global require "laravel/installer"

WORKDIR /var/www/