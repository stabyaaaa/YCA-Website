FROM php:8.2-fpm-alpine

# Install runtime deps + extensions
RUN apk update && apk add --no-cache \
    nginx \
    git \
    unzip \
    libzip-dev \
    zip \
    libpq-dev \
    sqlite-dev \
    && docker-php-ext-install \
        pdo \
        pdo_sqlite \
        zip \
        pdo_pgsql \
        pgsql \
    && rm -rf /var/cache/apk/*

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# SQLite setup (if used)
RUN mkdir -p database && touch database/database.sqlite

# Permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 storage bootstrap/cache \
    && chmod 664 database/database.sqlite

# Laravel commands
USER www-data

RUN php artisan key:generate --force || true \
    && php artisan migrate --force --no-interaction || true \
    && php artisan storage:link || true \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache \
    && php artisan optimize

USER root

# Nginx config
COPY nginx.conf /etc/nginx/http.d/default.conf

# Redirect Nginx logs → stdout/stderr (this works!)
RUN ln -sf /dev/stdout /var/log/nginx/access.log \
    && ln -sf /dev/stderr /var/log/nginx/error.log

EXPOSE 80

CMD php-fpm -D && exec nginx -g 'daemon off;'