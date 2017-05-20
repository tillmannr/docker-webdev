FROM php:7-fpm

RUN docker-php-ext-install pdo pdo_mysql

COPY code/php.ini /usr/local/etc/php/
COPY code/ /var/www/html/