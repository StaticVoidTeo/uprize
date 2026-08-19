#!/bin/bash

set -e

export LOG_CHANNEL=stderr

if [ "$IS_LARAVEL" = "true" ]; then
    if [ "$RAILPACK_SKIP_MIGRATIONS" != "true" ]; then
        echo "Running migrations ..."
        php artisan migrate --force
    fi

    php artisan storage:link --force
    php artisan optimize:clear
    php artisan optimize

    echo "Starting Laravel server ..."
fi

docker-php-entrypoint --config /Caddyfile --adapter caddyfile 2>&1
