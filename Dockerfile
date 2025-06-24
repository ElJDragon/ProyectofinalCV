# Imagen base de PHP con servidor Apache
FROM php:8.2-apache

# Copia el contenido del proyecto a la carpeta pública del servidor web
COPY . /var/www/html/

# Habilita el módulo de reescritura de Apache (útil si usas rutas amigables)
RUN a2enmod rewrite

# Ajusta permisos
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Exponer el puerto estándar de Apache
EXPOSE 80

#uso de mysqli
RUN docker-php-ext-install mysqli
