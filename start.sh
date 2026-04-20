#!/bin/sh
set -e

cd /var/www/html

# optional but useful for demo deploys
php artisan storage:link || true
php artisan migrate --force --no-interaction || true

php-fpm -D
exec nginx -g 'daemon off;'