FROM php:7.0-fpm
MAINTAINER Andy Ecca <andy.ecca@gmail.com>
ENV VERSION 1.0

RUN apt-get update && apt-get install -y \
	git-core \
	coreutils \
	libssl-dev \
	libz-dev

## Install opcache
RUN docker-php-ext-enable opcache