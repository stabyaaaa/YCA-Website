FROM php:8.2-cli

WORKDIR /app

COPY . .

RUN apt-get update && apt-get install -y \
    git unzip libzip-dev zip \
    && docker-php-ext-install pdo pdo_sqlite zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN composer install --no-dev --optimize-autoloader

# Create sqlite database
RUN mkdir -p database && touch database/database.sqlite

# Fix permissions
RUN chmod -R 777 storage bootstrap/cache

# Laravel optimizations
RUN php artisan config:clear || true
RUN php artisan cache:clear || true
RUN php artisan route:clear || true

# Run migrations automatically
RUN php artisan migrate --force || true

CMD php artisan serve --host=0.0.0.0 --port=$PORT