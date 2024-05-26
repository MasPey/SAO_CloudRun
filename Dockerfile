# Gunakan base image PHP yang mendukung aplikasi PHP
FROM php:7.4-apache

# Mengatur working directory ke dalam container
WORKDIR /var/www/html

# Copy semua file PHP ke dalam folder /var/www/html/ di container
COPY . /var/www/html/

# Install ekstensi mysqli yang diperlukan
RUN docker-php-ext-install mysqli

# Set port yang akan digunakan oleh server Apache PHP
EXPOSE 8080

# CMD to run the PHP application
CMD ["php", "-S", "0.0.0.0:8080", "-t", "/var/www/html"]
