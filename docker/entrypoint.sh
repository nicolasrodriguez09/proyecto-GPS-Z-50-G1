#!/bin/sh
set -e

echo "==> Generando APP_KEY si no existe..."
php artisan key:generate --no-interaction --force 2>/dev/null || true

echo "==> Ejecutando migraciones..."
php artisan migrate --force --no-interaction

echo "==> Limpiando caché de configuración..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "==> Iniciando Apache..."
exec apache2-foreground