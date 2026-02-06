#!/bin/bash
set -e

# Replace nginx listen port with PORT env if provided
if [ -n "${PORT}" ]; then
  sed -i "s/listen 8080;/listen ${PORT};/" /etc/nginx/sites-available/default || true
fi

# Ensure permissions
chown -R www-data:www-data /var/www/html || true
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache || true

# Start php-fpm in background then nginx
php-fpm -D
nginx -g 'daemon off;'
