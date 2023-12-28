FROM php:8.1-fpm as backend

RUN \
    apt-get update \
    && apt-get install -y nodejs npm \
    && apt-get install -y libpq-dev libxml2-dev libzip-dev

RUN \
    docker-php-ext-install bcmath zip \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --version=2.4.3 --filename=composer

RUN \
    npm install -g dotenv @soketi/soketi

COPY . /var/www
WORKDIR /var/www

RUN \
    npm install --silent \
    && npm run production
