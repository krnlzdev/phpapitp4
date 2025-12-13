FROM php:8.2-apache

# 1. Active le module rewrite pour que le .htaccess fonctionne
RUN a2enmod rewrite

# 2. Installe les extensions
RUN docker-php-ext-install pdo pdo_mysql mysqli

# 3. Copie les fichiers
COPY . /var/www/html/

# 4. Permissions
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

CMD ["apache2-foreground"]