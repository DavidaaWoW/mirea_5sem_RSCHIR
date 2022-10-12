FROM php:7.2-apache
COPY . /var/www/html/
RUN apt-get update -y && apt-get install -y libpng-dev zlib1g-dev 
RUN docker-php-ext-install gd