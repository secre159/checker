# Use the official PHP image as the base image
FROM php:7.4-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Copy the contents of the current directory into the container at /var/www/html
COPY . /var/www/html

# Install PHP extensions and other dependencies
RUN apt-get update && \
    apt-get install -y \
        libpng-dev \
        && \
    docker-php-ext-install \
        mysqli \
        pdo_mysql \
        gd \
        && \
    rm -rf /var/lib/apt/lists/*

# Expose port 80 to allow incoming traffic
EXPOSE 80

# Start the Apache web server when the container starts
CMD ["apache2-foreground"]
