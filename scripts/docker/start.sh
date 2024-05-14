#!/usr/bin/env bash
set -ex
NGINX_CONF=/etc/nginx/nginx.conf
LANG=en_US.UTF-8

echo "$(date):  start.sh started"

## Run the laravel config file through erubis to variable substitution
erubis /var/www/config_templates/env.erb > /var/www/trucks-app/.env

cd /var/www/trucks-app

## Make sure we have the latest packages installed
composer install --no-dev

## Generate the App key
php artisan key:generate

## Run the database migrations
php artisan migrate

erubis /var/www/config_templates/nginx.conf.erb > /etc/nginx/sites-available/default

chown -R www-data:www-data /var/www/

/usr/sbin/php-fpm8.3 --fpm-config /etc/php/8.3/fpm/php-fpm.conf -c /etc/php/8.3/fpm/php.ini --nodaemonize &
pids=$!


/usr/sbin/nginx -c $NGINX_CONF -t && \
/usr/sbin/nginx -c $NGINX_CONF &
pids="$pids $!"

trap "kill -TERM $pids" SIGTERM
echo "$(date): start.sh completed"

wait
