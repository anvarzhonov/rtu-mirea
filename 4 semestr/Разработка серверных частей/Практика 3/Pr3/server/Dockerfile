FROM php:7.4-apache
RUN apt-get update
RUN docker-php-ext-install mysqli
ENV APACHE_DOCUMENT_ROOT /home/public_html

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# vinhjaxt
RUN sed -i -E 's/Listen\s+80([^0-9]|$)/Listen 8001\1/g' /etc/apache2/ports.conf /etc/apache2/sites-available/*.conf /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf /etc/apache2/sites-enabled/*.conf

RUN sed -i -E 's/(VirtualHost\s+.+)\:80([^0-9]|$)/\1:8001\2/g' /etc/apache2/ports.conf /etc/apache2/sites-available/*.conf /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf /etc/apache2/sites-enabled/*.conf

RUN a2enmod authn_dbd
RUN a2enmod authn_socache
RUN apt-get update
RUN apt-get install -y apache2-utils
RUN apt-get install -y libaprutil1-dbd-mysql
RUN service apache2 restart

COPY append.conf append.conf
RUN cat append.conf >> /etc/apache2/apache2.conf
