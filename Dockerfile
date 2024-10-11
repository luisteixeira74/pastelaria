FROM php:8-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install dependencies
RUN apt-get update && apt-get install -y \
supervisor

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/app

COPY --chmod=775 --chown=www-data:www-data . /var/www/html

#RUN chown -R www-data: /var/www/app
#RUN chown -R www-data:www-data /var/www/app
#RUN chmod -R 777 /var/www/html/storage

#RUN cd /var/wwww/app && php artisan queue:listen

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
