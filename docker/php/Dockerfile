FROM php:8.3-fpm

# Системные зависимости
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libicu-dev

# PHP расширения
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd intl

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
