FROM php:8.3-apache

# ADD --chmod=0755 https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

# RUN install-php-extensions fileinfo pdo_pgsql pgsql

RUN apt-get update && apt-get install -y \
   libpq-dev \
   libfreetype6-dev \
   libjpeg62-turbo-dev \
   libpng-dev \
   libssl-dev

RUN docker-php-ext-install -j$(nproc) \
   fileinfo \
   pdo_pgsql \
   pgsql

COPY ./config/php.ini /usr/local/etc/php/

# COPY . /var/www/html/

WORKDIR /var/www/html/