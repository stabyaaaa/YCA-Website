FROM php:8.2-cli

WORKDIR /app

COPY . .

RUN apt-get update && apt-get install -y \
    git unzip libzip-dev zip libsqlite3-dev sqlite3 \
    && docker-php-ext-install pdo pdo_sqlite zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN composer install --no-dev --optimize-autoloader

# create sqlite database
RUN mkdir -p database && touch database/database.sqlite

# fix permissions
RUN chmod -R 777 storage bootstrap/cache

RUN php artisan config:clear || true
RUN php artisan cache:clear || true
RUN php artisan route:clear || true
RUN php artisan migrate --force || true

CMD php artisan serve --host=0.0.0.0 --port=$PORT