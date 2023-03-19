FROM php:apache

WORKDIR /var/www/html

RUN docker-php-ext-install pdo_mysql && \
    docker-php-ext-enable pdo_mysql

# instalação do driver do MySQL
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Instala o pacote do driver do MariaDB
RUN apt-get update && apt-get install -y \
    default-mysql-client \
    libmariadb-dev \
    && docker-php-ext-install mysqli pdo_mysql

# Habilita a extensão mysqli
RUN docker-php-ext-enable mysqli
