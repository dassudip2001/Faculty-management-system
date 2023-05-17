# Use the official Ubuntu 18.04 LTS image as the base image
FROM ubuntu:18.04

# Install necessary packages
RUN apt-get update && apt-get install -y \
    curl \
    git \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    && rm -rf /var/lib/apt/lists/*

# Install PHP and necessary extensions
RUN apt-get update && apt-get install -y \
    php8.1-cli \
    php8.1-fpm \
   
    php8.1-pdo \
    php8.1-mysql \
    php8.1-zip \
    php8.1-gd \
    php8.1-mbstring \
    php8.1-curl \
    php8.1-xml \
    php8.1-bcmath

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Install dependencies
RUN composer install --no-interaction --no-scripts --no-plugins

# Generate key
RUN php artisan key:generate

# Expose port 80
EXPOSE 80

# Start the PHP FPM server
CMD ["php-fpm8.1"]
