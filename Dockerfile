FROM php:8.2-fpm-alpine

# Install system dependencies + Nginx
RUN apk update && apk add --no-cache \
    nginx \
    git \
    unzip \
    libzip-dev \
    zip \
    libpq-dev \
    sqlite-dev \
    && docker-php-ext-install pdo pdo_sqlite zip pdo_pgsql pgsql \
    && apk del --no-cache .build-deps  # optional: clean up if you added build deps

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy application code
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# Create SQLite file (if using)
RUN mkdir -p database && touch database/database.sqlite

# Permissions - critical for www-data (PHP-FPM user)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 storage bootstrap/cache \
    && chmod 664 database/database.sqlite

# Laravel commands (run as www-data)
USER www-data

RUN php artisan key:generate --force || true \
    && php artisan migrate --force --no-interaction || true \
    && php artisan storage:link || true \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache \
    && php artisan optimize

# Switch back to root for Nginx/PHP-FPM startup
USER root

# Copy custom Nginx config
COPY nginx.conf /etc/nginx/http.d/default.conf

# Forward logs to stdout (good for Render)
RUN ln -sf /dev/stdout /var/log/nginx/access.log \
    && ln -sf /dev/stderr /var/log/nginx/error.log

# Expose port (Render uses $PORT, but we bind to 80 internally)
EXPOSE 80

# Start both services: PHP-FPM first, then Nginx in foreground
CMD php-fpm -D && nginx -g 'daemon off;'