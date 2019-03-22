FROM webdevops/php-nginx:7.2

ENV WEB_DOCUMENT_ROOT=/app/public \
    WEB_DOCUMENT_INDEX=index.php

COPY . /app/

WORKDIR /app/

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

RUN composer install --no-scripts --no-autoloader --quiet

RUN composer dump-autoload --optimize

EXPOSE 80