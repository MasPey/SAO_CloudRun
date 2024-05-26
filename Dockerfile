# Gunakan base image PHP yang mendukung aplikasi PHP
FROM php:7.4-apache

# Mengatur working directory ke dalam container
WORKDIR /var/www/html

# Copy semua file PHP ke dalam folder /var/www/html/ di container
COPY . /var/www/html/

# Install ekstensi mysqli yang diperlukan
RUN docker-php-ext-install mysqli

# Aktifkan modul mod_autoindex untuk menampilkan dir
RUN a2enmod autoindex

# Tambahkan konfigurasi untuk mengatur opsi Indexes pada direktori root
RUN echo "<Directory /var/www/html/>\n\tOptions Indexes FollowSymLinks\n\tAllowOverride All\n\tRequire all granted\n</Directory>" >> /etc/apache2/apache2.conf

# Set port yang akan digunakan oleh server Apache PHP
EXPOSE 3000

# CMD to run the PHP application
CMD ["php", "-S", "0.0.0.0:8080", "-t", "/var/www/html"]
