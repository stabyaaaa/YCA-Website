# ---------- Frontend build stage ----------
FROM node:20-alpine AS frontend

WORKDIR /app

COPY package*.json ./
RUN npm install

COPY resources ./resources
COPY public ./public
COPY vite.config.* ./
COPY postcss.config.* ./
COPY tailwind.config.* ./

RUN npm run build
RUN ls -la public/build && test -f public/build/manifest.json

# ---------- PHP / Laravel stage ----------
FROM php:8.2-fpm-alpine

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

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

COPY --from=frontend /app/public/build /var/www/html/public/build

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