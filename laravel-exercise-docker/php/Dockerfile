FROM php:8.1.8-apache
# ENV http_proxy http://host.docker.internal:10809
# ENV https_proxy http://host.docker.internal:10809

# Use the default production configuration
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# config
ARG TZ=Asia/Shanghai

RUN sed -i "s/deb.debian.org/mirrors.aliyun.com/" /etc/apt/sources.list && \
    sed -i "s/security.debian.org/mirrors.aliyun.com/" /etc/apt/sources.list

RUN apt-get clean
RUN apt-get update
RUN apt-get upgrade -y
RUN apt-get install -y \
    apt-utils \
    wget \
    curl \
    git \
    htop

RUN apt-get install -y \ 
    libzip-dev \
    zip \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    zlib1g-dev \
    libpng-dev \
    libwebp-dev

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer


RUN docker-php-ext-install pdo pdo_mysql && \
    a2enmod rewrite && \
    composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/

RUN yes | docker-php-ext-install mysqli && \
    docker-php-ext-configure gd --with-jpeg=/usr/include/ --with-freetype=/usr/include/ && \
    docker-php-ext-install gd zip && \
    docker-php-ext-enable opcache
