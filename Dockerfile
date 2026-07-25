# ---- Frontend assets (Vite) ----
FROM node:22-alpine AS frontend
WORKDIR /app
COPY package.json package-lock.json ./
RUN npm ci
COPY vite.config.js ./
COPY resources ./resources
COPY public ./public
RUN npm run build

# ---- Laravel (PHP 8.3) ----
FROM php:8.3-cli-bookworm

RUN apt-get update && apt-get install -y --no-install-recommends \
        git unzip libzip-dev libsqlite3-dev \
    && docker-php-ext-install pdo_sqlite zip \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

ENV APP_KEY=base64:rZWM2jlnL9P2jky+g1wHbPygurTzWwHVwVmejHjjK8M=
ENV APP_ENV=production

COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist --no-interaction

COPY . .
COPY --from=frontend /app/public/build ./public/build

RUN composer dump-autoload --optimize --no-dev \
    && php artisan package:discover --ansi \
    && mkdir -p storage/framework/cache storage/framework/sessions storage/framework/views storage/logs bootstrap/cache database \
    && chmod -R 775 storage bootstrap/cache database

COPY docker/start.sh /usr/local/bin/start.sh
RUN sed -i 's/\r$//' /usr/local/bin/start.sh && chmod +x /usr/local/bin/start.sh

EXPOSE 8000
CMD ["start.sh"]
