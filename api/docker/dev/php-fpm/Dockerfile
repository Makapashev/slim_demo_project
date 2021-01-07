FROM php:7.4-fpm-alpine

RUN mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini

COPY ./.env /var/www

WORKDIR /var/www/demo_bank1
