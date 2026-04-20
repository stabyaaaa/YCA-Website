FROM php:8.2-fpm-alpine

RUN apk update && apk add --no-cache \
    nginx \
    git \
    unzip \
    libzip-dev \
    zip \
    sqlite-dev \
    bash \
    nodejs \
    npm \
    && docker-php-ext-install \
        pdo \
        pdo_sqlite \
        zip \
    && rm -rf /var/cache/apk/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

RUN npm install
RUN npm run build
RUN test -f public/build/manifest.json

RUN mkdir -p database && touch database/database.sqlite

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 storage bootstrap/cache \
    && chmod 664 database/database.sqlite

COPY nginx.conf /etc/nginx/http.d/default.conf
COPY start.sh /start.sh
RUN chmod +x /start.sh

RUN ln -sf /dev/stdout /var/log/nginx/access.log \
    && ln -sf /dev/stderr /var/log/nginx/error.log

EXPOSE 10000

CMD ["/start.sh"]