FROM php:7.4-cli

RUN pecl install -o -f redis \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis

RUN apt-get update && apt-get install -y libpq-dev libzip-dev unzip zlib1g-dev zip libpng-dev libsodium-dev \
    && docker-php-ext-install gd mysqli pdo pdo_mysql zip sodium exif \
    && docker-php-ext-enable exif

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/bin --filename=composer --quiet

ENV COMPOSER_ALLOW_SUPERUSER 1

WORKDIR /app
