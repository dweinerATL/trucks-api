FROM ubuntu:latest
LABEL maintainer="Dave Weiner"

ENV DEBIAN_FRONTEND noninteractive

## Allow root to use composer plugins
ENV COMPOSER_ALLOW_SUPERUSER=1

## Install the packages we need
RUN apt-get update \
    && apt-get install -y php8.3-cli php8.3-dev \
           php8.3-sqlite3 php8.3-gd php8.3-curl \
           php8.3-mysql php8.3-mbstring \
           php8.3-xml php8.3-zip php8.3-bcmath php8.3-intl \
           php8.3-readline php8.3-igbinary php8.3-redis \
           php8.3-memcached php8.3-pcov php8.3-imagick php8.3-xdebug \
           php8.3-fpm ruby-erubis nginx systemd less mariadb-client \
    && curl -sLS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin/ --filename=composer

ADD . /var/www

CMD ["/var/www/scripts/docker/start.sh"]
