FROM php:7.4-fpm-alpine

RUN docker-php-ext-install pdo pdo_mysql

RUN chown -R www-data:www-data /var/www
RUN chmod -R 775 /var/www
