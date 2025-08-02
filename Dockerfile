FROM php:8.2-apache

# Copy files from /kycdeals in your repo to the web root
COPY kycdeals/ /var/www/html/

# Enable Apache Rewrite if needed (for .htaccess)
RUN a2enmod rewrite
