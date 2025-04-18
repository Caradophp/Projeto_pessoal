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

# Definir o diretório de trabalho
WORKDIR /var/www/html

# Copiar o projeto completo (inclusive vendor, se ela existir no host)
COPY . .

# Instalar as dependências (se a vendor não existir no host, isso vai criá-la)
RUN composer install

# Ativar mod_rewrite do Apache
RUN a2enmod rewrite

# Expor a porta 80
EXPOSE 80
