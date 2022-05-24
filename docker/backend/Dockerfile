# windows用のdockerfile

FROM php:8.1-fpm

# COPY php.ini
COPY ./docker/backend/php.ini /usr/local/etc/php/php.ini

# Composer install
COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer

ARG GID
ARG UID
ARG GROUPNAME
ARG USERNAME

# install packages including Node.js
RUN apt-get update && \
    curl -fsSL https://deb.nodesource.com/setup_16.x | bash - && \
    apt-get -y install \
    nodejs\
    git \
    zip \
    unzip \
    vim \
    cron \
    procps \
    && docker-php-ext-install pdo_mysql bcmath

# cron
RUN service cron start
RUN echo '* * * * * root cd /api && php artisan schedule:run >> /dev/null 2>&1' >> /etc/crontab

WORKDIR /

RUN mkdir /api

RUN chmod -R 777 /api

RUN groupadd -g $GID $GROUPNAME
RUN useradd -m -s /bin/bash -u $UID -g $GID -G sudo $USERNAME
RUN echo $USERNAME:passwd | chpasswd
USER $USERNAME

WORKDIR /api