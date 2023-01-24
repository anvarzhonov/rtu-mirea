FROM php:7.2-apache
RUN docker-php-ext-install mysqli pdo pdo_mysql

COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
COPY apache2.conf /etc/apache2/apache2.conf