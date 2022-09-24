FROM php:8.1.9-apache-buster

RUN apt-get update

RUN apt-get install -y \
    zip \
    unzip

WORKDIR /var/www/html

RUN a2enmod rewrite headers

RUN docker-php-ext-install pcntl pdo pdo_mysql

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY ./docker/php/sites/*.conf /etc/apache2/sites-enabled/
COPY . /var/www/html
COPY .env.prod /var/www/html/.env

RUN composer install

RUN useradd -G www-data -u 1000 -d /home/devuser devuser
RUN mkdir -p /home/devuser/.composer && \
    chown -R devuser:devuser /home/devuser && \
    chown -R devuser:devuser /var/www

RUN chmod 777 -R /var/www/html
