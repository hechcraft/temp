FROM php:8.1.9-cli

RUN apt-get update

RUN apt-get install -y \
    zip \
    unzip

WORKDIR /var/www/html

RUN docker-php-ext-install pcntl pdo pdo_mysql

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . /var/www/html
COPY .env.prod /var/www/html/.env

ARG env_file

RUN useradd -G www-data -u 1000 -d /home/devuser devuser
RUN mkdir -p /home/devuser/.composer && \
    chown -R devuser:devuser /home/devuser && \
    chown -R devuser:devuser /var/www

CMD ["php", "artisan", "schedule:run"]
