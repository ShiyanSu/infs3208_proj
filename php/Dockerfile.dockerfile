FROM php:7.0-apache
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN apt-get update && apt-get upgrade -y
COPY src/myProj/uploads src/myProj/uploads
