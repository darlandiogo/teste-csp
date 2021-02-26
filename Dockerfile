FROM php:alpine

RUN apk update && apk add --update nodejs npm

RUN docker-php-ext-install pdo_mysql

COPY . .

RUN composer dump-autoload

RUN npm install

RUN php artisan key:generate --force
