FROM php:7.4-fpm

RUN apt-get update
RUN apt-get install -y zlib1g-dev
RUN apt-get install -y libpng-dev
RUN apt-get install -y libzip-dev

RUN docker-php-ext-install pdo
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install gd
RUN docker-php-ext-install zip

RUN chown -R www-data:www-data /var/www
RUN chmod 755 /var/www

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer