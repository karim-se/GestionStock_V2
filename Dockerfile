FROM php:8.3-fpm

# Installation des dépendances système
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nodejs \
    npm

# Installation des extensions PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Installation de Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Création de l'utilisateur
RUN useradd -G www-data,root -u 1000 -d /home/laravel laravel
RUN mkdir -p /home/laravel/.composer && \
    chown -R laravel:laravel /home/laravel

# Configuration du répertoire de travail
WORKDIR /var/www

# --- AJOUT POUR LA PRODUCTION ---
# On copie tout le contenu de votre dossier actuel dans /var/www du conteneur
COPY . /var/www

# On s'assure que l'utilisateur 'laravel' possède les fichiers copiés
RUN chown -R laravel:laravel /var/www
# --------------------------------

USER laravel