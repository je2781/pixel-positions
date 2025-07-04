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

exec "$@"
