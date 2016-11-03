FROM php:7.0-fpm
MAINTAINER Andy Ecca <andy.ecca@gmail.com>
ENV VERSION 1.0

RUN apt-get update && apt-get install -y \
	git-core \
	coreutils \
	libssl-dev \
	libz-dev

ARG APCU_VERSION=5.1.5
ARG APCU_BC_VERSION=1.0.3

RUN pecl install apcu-$APCU_VERSION \
  && docker-php-ext-enable apcu \
  && pecl install apcu_bc-$APCU_BC_VERSION \
  && docker-php-ext-enable apc \
  && rm -f /usr/local/etc/php/conf.d/docker-php-ext-apc.ini \
  && rm -f /usr/local/etc/php/conf.d/docker-php-ext-apcu.ini

RUN  pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && sed -i -e "s/zend_extension/#zend_extension/g" /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini


## Install opcache
RUN docker-php-ext-enable opcache