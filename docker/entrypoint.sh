#!/bin/sh
set -e

# Escribir variables de entorno de Render al .env del contenedor
php -r "
\$env = file_get_contents('/var/www/html/.env');
\$vars = ['APP_KEY', 'APP_URL', 'APP_ENV', 'APP_DEBUG',
          'DB_CONNECTION', 'DB_HOST', 'DB_PORT', 'DB_DATABASE', 'DB_USERNAME', 'DB_PASSWORD',
          'CLOUDINARY_URL', 'CLOUDINARY_CLOUD_NAME', 'CLOUDINARY_API_KEY', 'CLOUDINARY_API_SECRET',
          'SESSION_DRIVER', 'CACHE_STORE', 'QUEUE_CONNECTION', 'LOG_CHANNEL', 'LOG_LEVEL'];
foreach (\$vars as \$var) {
    \$val = getenv(\$var);
    if (\$val !== false) {
        \$env = preg_replace('/^' . \$var . '=.*/m', \$var . '=' . \$val, \$env);
    }
}
file_put_contents('/var/www/html/.env', \$env);
"

php artisan config:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate --force
php artisan storage:link || true

apache2-foreground