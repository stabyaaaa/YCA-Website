FROM php:8.2-cli

WORKDIR /app

COPY . .

RUN apt-get update && apt-get install -y \
    git unzip zip libzip-dev \
    sqlite3 libsqlite3-dev pkg-config \
    && docker-php-ext-install pdo pdo_sqlite zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN composer install --no-dev --optimize-autoloader

# create sqlite database
RUN mkdir -p database && touch database/database.sqlite

# fix permissions
RUN chmod -R 777 storage bootstrap/cache database

# clear caches
RUN php artisan config:clear || true
RUN php artisan cache:clear || true
RUN php artisan route:clear || true
RUN php artisan view:clear || true

# run migrations
RUN php artisan migrate --force || true

CMD php artisan serve --host=0.0.0.0 --port=${PORT:-8000}