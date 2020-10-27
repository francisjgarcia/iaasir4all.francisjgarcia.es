FROM php:7.2-apache-buster

LABEL version="1.0"

LABEL maintainer Francis J. Garcia <francisjgarcia94@gmail.com>

RUN ln -fs /usr/share/zoneinfo/Europe/Madrid /etc/localtime && \
    dpkg-reconfigure -f noninteractive tzdata

RUN docker-php-ext-install mysqli

RUN a2enmod rewrite

EXPOSE 80

CMD ["apachectl", "-D", "FOREGROUND"]
