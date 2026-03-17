# Build stage
FROM php:8.2-fpm AS builder

WORKDIR /app

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev zip libpq-dev libsqlite3-dev sqlite3 pkg-config \
    && docker-php-ext-install pdo pdo_sqlite zip pdo_pgsql pgsql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy application code
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# Create SQLite database file (if using SQLite)
RUN mkdir -p database && touch database/database.sqlite

# Set proper permissions
RUN chown -R www-data:www-data /app \
    && chmod -R 775 storage bootstrap/cache \
    && chmod 664 database/database.sqlite

# Run Laravel commands as www-data
USER www-data

# Generate app key if not set (safe to run)
RUN php artisan key:generate --force || true

# Run migrations (fails gracefully if DB not ready yet)
RUN php artisan migrate --force --no-interaction || true

# Create storage symlink
RUN php artisan storage:link || true

# Cache everything for production
RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache \
    && php artisan optimize

# Final stage - Nginx + PHP-FPM
FROM nginx:alpine

# Copy built application from builder
COPY --from=builder --chown=nginx:nginx /app /var/www/html

# Copy custom Nginx configuration
COPY nginx.conf /etc/nginx/conf.d/default.conf

# Expose port (Render uses $PORT environment variable)
EXPOSE 80

# Start PHP-FPM and Nginx
CMD php-fpm && nginx -g 'daemon off;'