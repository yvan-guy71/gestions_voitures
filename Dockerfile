FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
    nginx git unzip curl libpng-dev libonig-dev libxml2-dev libzip-dev zip procps \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Install composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy application files
COPY . /var/www/html

# Set permissions and install PHP dependencies
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache || true \
    && if [ -f composer.json ]; then composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist; fi

# Nginx config and start script
COPY docker/nginx.conf /etc/nginx/sites-available/default
COPY docker/start.sh /start.sh
RUN chmod +x /start.sh

ENV PORT=8080
EXPOSE 8080

CMD ["/start.sh"]
