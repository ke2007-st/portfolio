#!/usr/bin/env bash
set -e

cd /var/www/html

echo ">> Preparing SQLite database..."
mkdir -p database
touch database/database.sqlite
chmod 775 database database/database.sqlite || true

if [ -n "$RENDER_EXTERNAL_URL" ]; then
  export APP_URL="$RENDER_EXTERNAL_URL"
fi

echo ">> Caching config..."
php artisan config:cache

echo ">> Caching routes..."
php artisan route:cache

echo ">> Caching views..."
php artisan view:cache

echo ">> Running migrations..."
php artisan migrate --force

echo ">> Seeding portfolio data..."
php artisan db:seed --force --class=PortfolioSeeder

echo ">> Deploy scripts complete."
