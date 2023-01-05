# FROM php:8.1

# RUN apt-get update && apt-get install -y \
#         libfreetype6-dev \
#         libjpeg62-turbo-dev \
#         libmcrypt-dev \
#         libpng-dev \
#         zlib1g-dev \
#         libxml2-dev \
#         libzip-dev \
#         libonig-dev \
#         graphviz \
        
#         && docker-php-ext-configure gd \
#         && docker-php-ext-install -j$(nproc) gd \
#         && docker-php-ext-install pdo_mysql \
#         && docker-php-ext-install mysqli \
#         && docker-php-ext-install zip \
#         && docker-php-ext-install sockets \
#         && docker-php-source delete \
#         && curl -sS https://getcomposer.org/installer | php -- \
#         --install-dir=/usr/local/bin --filename=composer

# WORKDIR /app
# COPY . .
# RUN composer install

# # run command to server
# CMD php artisan serve --host=0.0.0.0

# # expose port
# EXPOSE 8000
FROM php:8.1-fpm-alpine

RUN docker-php-ext-install pdo pdo_mysql sockets
RUN curl -sS https://getcomposer.org/installer | php -- \
     --install-dir=/usr/local/bin --filename=composer

WORKDIR /app
COPY . .
RUN composer install