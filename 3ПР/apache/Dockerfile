FROM php:7.2-apache
RUN docker-php-ext-install mysqli && a2enmod rewrite
COPY .htpasswd /etc/apache2