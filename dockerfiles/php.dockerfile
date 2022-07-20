FROM php:8.1-fpm

MAINTAINER Chandan Sharma <chandan.sharma@introcept.co>

RUN addgroup --system www-data; exit 0
RUN adduser --system -G www-data -s /bin/sh -D www-data; exit 0

WORKDIR /var/www/talent

RUN sed -i "s/user = www-data/user = www-data/g" /usr/local/etc/php-fpm.d/www.conf
RUN sed -i "s/group = www-data/group = www-data/g" /usr/local/etc/php-fpm.d/www.conf

RUN apt-get update && apt-get install -y \
    curl \
    git \
    zip \
    libzip-dev \
    unzip \
    libxml2-dev \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo pdo_mysql zip pcntl xml dom

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer; \
    chmod +x /usr/local/bin/composer; \
    rm -rf /var/cache/apk/*;


WORKDIR /var/www/talent

CMD ["php-fpm", "-y", "/usr/local/etc/php-fpm.conf", "-R"]
