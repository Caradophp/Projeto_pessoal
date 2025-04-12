# Imagem base com PHP e Apache
FROM php:8.1-apache

# Instalar dependências necessárias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libxml2-dev \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql mysqli

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar composer.json e composer.lock para instalar dependências primeiro (melhor pro cache)
COPY composer.json composer.lock ./
COPY vendor ./

# Instalar as dependências
RUN composer install

# Copiar o restante do projeto (inclusive pasta public e vendor)
COPY . /var/www/html/

# Ativar mod_rewrite do Apache
RUN a2enmod rewrite

# Definir o diretório de trabalho
WORKDIR /var/www/html

# Expor a porta 80
EXPOSE 80
