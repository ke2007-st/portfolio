#!/bin/sh
set -e

cd /app

if [ -n "$RENDER_EXTERNAL_URL" ]; then
  export APP_URL="$RENDER_EXTERNAL_URL"
fi

if [ "${DB_CONNECTION:-sqlite}" = "sqlite" ]; then
  DB_PATH="${DB_DATABASE:-/app/database/database.sqlite}"
  mkdir -p "$(dirname "$DB_PATH")"
  touch "$DB_PATH"
  export DB_DATABASE="$DB_PATH"
fi

php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate --force
php artisan db:seed --force --class=PortfolioSeeder

exec php artisan serve --host=0.0.0.0 --port="${PORT:-8000}"
