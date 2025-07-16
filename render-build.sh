#!/usr/bin/env bash
# Exit on error
set -o errexit

# Install system dependencies
apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    libpq-dev

# Install PHP extensions
docker-php-ext-install pdo pdo_pgsql pgsql zip gd mbstring exif pcntl bcmath

# Install Composer
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install PHP dependencies
composer install --no-interaction --optimize-autoloader --no-dev

# Optimize the application
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Set permissions
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache
