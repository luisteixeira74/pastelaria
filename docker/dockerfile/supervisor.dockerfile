FROM php:8-fpm

RUN apt-get update && apt-get install -y libpq-dev libpng-dev libzip-dev zip unzip curl
RUN docker-php-ext-install pgsql pdo_pgsql gd zip\
  && docker-php-ext-enable opcache

# Install redis
RUN pecl install -o -f redis \
  &&  rm -rf /tmp/pear \
  &&  docker-php-ext-enable redis

# Install Supervisor
RUN apt-get install -y supervisor

RUN mkdir -p "/etc/supervisor/logs"

CMD ["/usr/bin/supervisord", "-n", "-c",  "/etc/supervisor/supervisord.conf"]