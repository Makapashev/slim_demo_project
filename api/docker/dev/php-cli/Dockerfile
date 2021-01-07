FROM php:7.4-cli-alpine

RUN mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini

RUN apk add --no-cache bash \
    && docker-php-ext-install pdo_mysql

COPY ./.env /var/www

WORKDIR /var/www/demo_bank1
