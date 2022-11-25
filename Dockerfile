#Dockerfile para el build del server WEB
FROM php:8.0.0-apache
ARG DEBIAN_FRONTEND=noninteractive
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo pdo_mysql
RUN apt-get update  && apt-get install -y libzip-dev  \
    && docker-php-ext-install zip


RUN a2enmod rewrite -y zlib1g-dev 



