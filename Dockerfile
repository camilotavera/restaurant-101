FROM php:8.4-fpm-alpine

# Install necessary extensions (example: mysqli and pdo_mysql)
RUN docker-php-ext-install mysqli pdo_mysql

# Copy your application code into the container
COPY . /var/www/html

# Set the working directory
WORKDIR /var/www/html

# Expose port 9000 for FPM
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]