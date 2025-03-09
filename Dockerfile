# Use a imagem oficial do PHP com Apache
FROM php:8.1-apache

# Instalações necessárias para o PHP
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

# Habilita mod_rewrite para o Apache
RUN a2enmod rewrite

# Configura o diretório onde o código será copiado
WORKDIR /var/www/html

# Copia o código do projeto para dentro do contêiner
COPY . /var/www/html/

# Define permissões adequadas para os arquivos
RUN chown -R www-data:www-data /var/www/html

# Instala o Composer (gerenciador de dependências do PHP)
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

# Instala as dependências do PHP com o Composer
RUN composer install --no-interaction --prefer-dist

# Expõe a porta 80 para o Apache
EXPOSE 80

# Inicia o Apache no contêiner
CMD ["apache2-foreground"]
