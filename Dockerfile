FROM webdevops/php-nginx:7.2

WORKDIR /app

RUN curl -sS https://getcomposer.org/installer | \
    php -- --install-dir=/usr/bin/ --filename=composer

RUN composer install --no-scripts --no-autoloader

RUN composer dump-autoload --optimize && composer run-scripts post-install-cmd

RUN php artisan migrate --seed

RUN php artisan vost:retrieve-ocurrences
