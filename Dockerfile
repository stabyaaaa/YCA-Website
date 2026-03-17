FROM php:8.2-fpm-alpine

# Install runtime + build deps for extensions (no virtual pkg needed for these simple ones)
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
    # Optional: clean apk cache (safe, no virtual pkg issue)
    && rm -rf /var/cache/apk/*

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy app code
COPY . .

# Install Composer deps
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# Create SQLite DB file (if using SQLite; harmless otherwise)
RUN mkdir -p database && touch database/database.sqlite

# Set permissions (PHP-FPM runs as www-data)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 storage bootstrap/cache \
    && chmod 664 database/database.sqlite

# Run Laravel setup commands
USER www-data

RUN php artisan key:generate --force || true \
    && php artisan migrate --force --no-interaction || true \
    && php artisan storage:link || true \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache \
    && php artisan optimize

# Back to root for starting services
USER root

# Copy Nginx config
COPY nginx.conf /etc/nginx/http.d/default.conf

# Symlink logs to stdout/stderr for Render visibility
RUN ln -sf /dev/stdout /var/log/nginx/access.log \
    && ln -sf /dev/stderr /var/log/nginx/error.log \
    && ln -sf /dev/stdout /proc/1/fd/1 \
    && ln -sf /dev/stderr /proc/1/fd/2

# Expose Render's port (Nginx listens on $PORT or 80)
EXPOSE 80

# Start PHP-FPM in background, Nginx in foreground
CMD php-fpm -D && exec nginx -g 'daemon off;'