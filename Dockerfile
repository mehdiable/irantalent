FROM php:7.4-apache
RUN apt-get update && apt-get install -y zlib1g-dev libzip-dev libpng-dev
RUN docker-php-ext-install pdo_mysql
RUN a2enmod rewrite
RUN service apache2 restart
