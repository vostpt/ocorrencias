FROM php:7.2-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    git \
    libzip-dev \
    zip \
    unzip \
    cron

RUN docker-php-ext-configure zip --with-libzip
RUN docker-php-ext-install pdo_mysql zip

ADD . /var/www

RUN chown -R www-data:www-data /var/www
RUN chmod -R ug+rwx storage bootstrap/cache
RUN chgrp -R www-data storage bootstrap/cache

RUN curl --silent --show-error https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

COPY .docker/crontab /etc/cron.d/scheduler

RUN chmod 0644 /etc/cron.d/scheduler

RUN service cron start

RUN composer install --no-dev --quiet

EXPOSE 9000