FROM php:8.2-cli

# Dependencias
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libzip-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql zip gd

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copiamos SÓLO lo necesario
COPY . .

# Instalar dependencias PHP
RUN composer install --no-dev --optimize-autoloader

# Cachear Laravel
RUN php artisan config:cache && php artisan route:cache && php artisan view:cache

# Exponer puerto HTTP (Laravel CLI)
EXPOSE 8080

CMD ["php", "-S", "0.0.0.0:8080", "-t", "public"]
