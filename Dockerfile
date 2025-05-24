# Base Image
FROM php:8.3-apache AS base

# This helps keep our Dockerfiles DRY -> https://bit.ly/dry-code
# You can see a list of required extensions for Laravel here: https://laravel.com/docs/11.x/deployment#server-requirements

# Define the build arguments with default values
ARG PHPIZE_DEPS="libpng-dev libjpeg-dev libfreetype6-dev libicu-dev libzip-dev vim git zip unzip jq"
ARG PHP_EXTS="pdo pdo_mysql mysqli zip ftp"
ARG PHP_PECL_EXTS=""
ARG APP_ENV="local"
ARG WWWGROUP=1000

# Set Environment Variables
ENV APP_ENV=${APP_ENV} \
    COMPOSER_ALLOW_SUPERUSER=1 \
    PATH="${PATH}:/var/www/html/vendor/bin"

# Set Working Directory
WORKDIR /var/www/html/

# Enable Apache modules
RUN a2enmod rewrite

# Install System Dependencies & PHP Extensions
RUN apt-get update && apt-get install -y --no-install-recommends ${PHPIZE_DEPS} ca-certificates
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-configure intl
RUN if [ -n "$PHP_EXTS" ]; then \
        docker-php-ext-install -j$(nproc) ${PHP_EXTS}; \
    fi
RUN if [ -n "$PHP_PECL_EXTS" ]; then \
        pecl install ${PHP_PECL_EXTS} && docker-php-ext-enable ${PHP_PECL_EXTS}; \
    fi

# Install Node.js (includes npm)
RUN curl -fsSL https://deb.nodesource.com/setup_current.x | bash - && \
    apt-get install -y nodejs

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Copy Source Code
COPY . .

################################
# Configurations
################################
RUN php -r "file_exists('php.ini') && copy('php.ini', '/usr/local/etc/php/php.ini');"

# .env -  Conditional copying based on build argument
RUN if [ "$APP_ENV" = "local-dev" ]; then \
        cp .env.dev .env; \
    elif [ "$APP_ENV" = "local-prod" ]; then \
        cp .env.prod .env; \
    fi

################################
# Dependencies
################################
# Install PHP & JS Dependencies
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs && \
    npm install && npm run build

################################
# Laravel - App Setup
################################
RUN php artisan key:generate && \
    php artisan storage:link --force && \
    php artisan view:clear && \
    php artisan vendor:publish --tag=telescope-assets --force && \
    chown -R www-data:www-data /var/www/html/

################################
# Path Permissions
################################
RUN if [ "$APP_ENV" = "local" ]; then \
        groupadd --force -g ${WWWGROUP:-1000} sail && \
        useradd -ms /bin/bash --no-user-group -g ${WWWGROUP:-1000} -u 1337 sail; \
    fi
