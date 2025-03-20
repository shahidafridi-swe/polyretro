#!/bin/bash

set -e

#chmod -R 777 storage bootstrap/cache
#chown -R www-data:www-data storage bootstrap/cache

#php artisan migrate --force

npm run dev $

exec php-fpm
