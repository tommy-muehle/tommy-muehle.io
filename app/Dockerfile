FROM php:7.0-alpine
ADD . /app
WORKDIR /app
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && /usr/local/bin/composer install --no-dev --optimize-autoloader
