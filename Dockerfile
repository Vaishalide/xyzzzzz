# Use official PHP image with Apache
FROM php:8.2-apache

# Copy project files to the Apache web root
COPY public/ /var/www/html/

# Enable Apache mod_rewrite (optional but common)
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html/

# Expose the default Apache port
EXPOSE 80
