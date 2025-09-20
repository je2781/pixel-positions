#!/bin/sh
# wait-for-pgsql.sh

set -e

host="postgres"
port="5432"

until nc -z "$host" "$port"; do
  echo "Waiting for postgres at $host:$port..."
  sleep 2
done

echo "postgres is up! Running migrations"
php artisan migrate:fresh

echo "Running seeders..."
php artisan db:seed

echo "Postgres is up. Starting services..."

# Start PHP-FPM
service php8.2-fpm start

# Start Nginx in background
nginx -g "daemon off;" &

# Clean up Supervisor socket and start Supervisor
rm -f /run/supervisord.sock
exec /usr/bin/supervisord -c /etc/supervisord.conf
