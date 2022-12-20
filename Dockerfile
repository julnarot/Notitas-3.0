FROM php:7.4-apache

COPY setup.sh /mysql/setup.sh
COPY app/DB_Notitas.sql /mysql/setup.sql
RUN /mysql/setup.sh

RUN docker-php-ext-install mysqli