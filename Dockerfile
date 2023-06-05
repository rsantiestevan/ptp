FROM php:8.1.19-fpm-alpine
WORKDIR /app
#apk add --no-cache autoconf automake make gcc g++ icu-dev rabbitmq-c rabbitmq-c-dev \
#    && pecl install amqp-1.9.4 \
RUN apk --update upgrade \
    && docker-php-ext-install -j$(nproc) \
    pdo_mysql

# Install Composer
#COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN apk add --no-cache bash
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY etc/infrastructure/php/ /usr/local/etc/php/

