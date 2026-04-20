FROM php:8.2-fpm-alpine

# Install packages and PHP extensions
RUN apk update && apk add --no-cache \
    nginx \
    git \
    unzip \
    libzip-dev \
    zip \
    sqlite-dev \
    bash \
    && docker-php-ext-install \
        pdo \
        pdo_sqlite \
        zip \
    && rm -rf /var/cache/apk/*

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy app
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# SQLite database file for demo deployment
RUN mkdir -p database && touch database/database.sqlite

# Permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 storage bootstrap/cache \
    && chmod 664 database/database.sqlite

# Nginx config
COPY nginx.conf /etc/nginx/http.d/default.conf

# Startup script
COPY start.sh /start.sh
RUN chmod +x /start.sh

# Redirect Nginx logs
RUN ln -sf /dev/stdout /var/log/nginx/access.log \
    && ln -sf /dev/stderr /var/log/nginx/error.log

EXPOSE 10000

CMD ["/start.sh"]