#!/bin/sh
set -e

cd /var/www/html

mkdir -p database
touch database/database.sqlite

php artisan config:clear || true
php artisan cache:clear || true
php artisan route:clear || true
php artisan view:clear || true

php artisan storage:link || true
php artisan migrate --force --no-interaction || true

php-fpm -D
exec nginx -g 'daemon off;'