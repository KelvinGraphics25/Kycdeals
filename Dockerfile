FROM php:8.2-apache

# Copy everything from the root of the repo into Apache's web root
COPY . /var/www/html/

# Enable Apache's rewrite module (optional but common)
RUN a2enmod rewrite
