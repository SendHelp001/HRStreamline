# Use PHP 8.2 with FPM (FastCGI Process Manager)
FROM php:8.2-fpm

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    libzip-dev \
    libpq-dev \
    python3 \
    make \
    g++ \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql mbstring zip exif pcntl bcmath gd \
    && rm -rf /var/lib/apt/lists/*  # Clean up APT cache to reduce image size

# Install Node.js (needed for Vite) - Version 20.x
RUN curl -sL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && rm -rf /var/lib/apt/lists/*  # Clean up APT cache

# Install Composer (from the official Composer image)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory inside the container
WORKDIR /var/www

# Copy the entire application code to the container
COPY . .

# Install PHP dependencies using Composer
RUN composer install --no-dev --optimize-autoloader

# Install Node.js dependencies and run Vite build with verbose logging
RUN npm install --verbose && npm run build --verbose

# Ensure proper permissions for Laravel's storage and cache directories
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Expose port 8000 for the Laravel application
EXPOSE 8000

# Run Laravel commands and start the PHP built-in server
CMD php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache && \
    php artisan migrate --force && \
    php artisan db:seed --force && \
    php artisan serve --host=0.0.0.0 --port=8000