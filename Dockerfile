# ---- Frontend assets (Vite) ----
FROM node:22-alpine AS frontend
WORKDIR /app
COPY package.json package-lock.json ./
RUN npm ci
COPY vite.config.js ./
COPY resources ./resources
COPY public ./public
RUN npm run build

# ---- Laravel on Render (nginx + php-fpm) ----
FROM richarvey/nginx-php-fpm:3.1.6

COPY . /var/www/html
COPY --from=frontend /app/public/build /var/www/html/public/build

# Image / server config
ENV SKIP_COMPOSER=1
ENV WEBROOT=/var/www/html/public
ENV PHP_ERRORS_STDERR=1
ENV RUN_SCRIPTS=1
ENV REAL_IP_HEADER=1
ENV COMPOSER_ALLOW_SUPERUSER=1

# Laravel defaults (overridden by Render env vars when set)
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV LOG_CHANNEL=stderr

WORKDIR /var/www/html

RUN composer install --no-dev --prefer-dist --no-interaction --optimize-autoloader \
    && mkdir -p storage/framework/cache storage/framework/sessions storage/framework/views storage/logs bootstrap/cache database \
    && chmod -R 775 storage bootstrap/cache database \
    && chown -R nginx:nginx storage bootstrap/cache database \
    && sed -i 's/\r$//' /var/www/html/scripts/*.sh || true

CMD ["/start.sh"]
