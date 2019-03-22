FROM webdevops/php-nginx:7.2

COPY . /app/

RUN ls -la

WORKDIR /app/

RUN ls -la

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

RUN composer install --no-scripts --no-autoloader

RUN composer dump-autoload --optimize

RUN php artisan migrate --seed

RUN php artisan vost:retrieve-ocurrences
