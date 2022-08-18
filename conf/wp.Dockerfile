FROM wordpress:6.0.1-php8.0

RUN pecl install "xdebug" \
    && docker-php-ext-enable xdebug
