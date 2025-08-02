# Use official PHP Apache image
FROM php:8.2-apache

# Copy all your app files to the container
COPY . /var/www/html/

# Enable Apache rewrite module
RUN a2enmod rewrite

# Set correct permissions (optional)
RUN chown -R www-data:www-data /var/www/html

# Expose port 80
EXPOSE 80
