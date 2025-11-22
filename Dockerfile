# -----------------------------
#  BUILD STAGE
# -----------------------------
FROM php:8.3-fpm-bullseye AS build

# Dependencias sistema necesarias
RUN apt-get update && apt-get install -y \
    git unzip zip curl libpng-dev libzip-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql zip gd

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Node.js LTS
RUN curl -fsSL https://deb.nodesource.com/setup_lts.x | bash - \
    && apt-get install -y nodejs

# Trabajar en el directorio del proyecto
WORKDIR /var/www/html
COPY . .

# Instalar dependencias PHP
RUN composer install --no-dev --optimize-autoloader \
    && php artisan key:generate

# Instalar dependencias del front-end y construir (Vite/Tailwind)
RUN npm install && npm run build

# -----------------------------
#  PRODUCTION STAGE
# -----------------------------
FROM php:8.3-fpm-bullseye AS production

RUN apt-get update && apt-get install -y \
    libpng-dev libzip-dev unzip \
    && docker-php-ext-install pdo_mysql zip gd

WORKDIR /var/www/html

# Copiar desde build
COPY --from=build /var/www/html /var/www/html

# Crear los directorios necesarios y permisos
RUN mkdir -p storage/framework/{sessions,views,cache} bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

ENV APP_ENV=production \
    APP_DEBUG=false \
    APP_URL=https://tu-dominio-prod.com

# Exponer el puerto de PHP-FPM
EXPOSE 9000

CMD ["php-fpm"]
