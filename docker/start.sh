#!/bin/bash

# Generar .env desde variables de entorno
php artisan config:clear
php artisan migrate --force

apache2-foreground