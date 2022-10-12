FROM php:7.2-apache
RUN docker-php-ext-install mysqli && a2enmod rewrite
RUN pecl install redis-5.3.7 \
	&& pecl install xdebug-2.8.1 \
	&& docker-php-ext-enable redis xdebug
COPY .htpasswd /etc/apache2