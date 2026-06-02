#!/bin/bash

# Generar .env desde variables de entorno
cat > /var/www/html/.env << EOF
APP_NAME="${APP_NAME}"
APP_ENV="${APP_ENV}"
APP_KEY="${APP_KEY}"
APP_DEBUG="${APP_DEBUG}"
APP_URL="${APP_URL}"
DB_CONNECTION="${DB_CONNECTION}"
DB_HOST="${DB_HOST}"
DB_PORT="${DB_PORT}"
DB_DATABASE="${DB_DATABASE}"
DB_USERNAME="${DB_USERNAME}"
DB_PASSWORD="${DB_PASSWORD}"
SESSION_DRIVER="${SESSION_DRIVER}"
SESSION_LIFETIME="${SESSION_LIFETIME}"
CACHE_STORE="${CACHE_STORE}"
EOF

chown www-data:www-data /var/www/html/.env
chmod 644 /var/www/html/.env
chown -R www-data:www-data /var/www/html/storage
chmod -R ug+rwx /var/www/html/storage

php artisan config:clear
php artisan migrate --force
php artisan config:cache

apache2-foreground