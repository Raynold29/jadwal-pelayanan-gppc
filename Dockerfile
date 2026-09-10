# Gunakan image PHP versi 8.2 (sesuaikan jika Anda pakai versi lain)
FROM php:8.2-cli

# Install ekstensi yang dibutuhkan (termasuk PostgreSQL untuk Supabase)
RUN apt-get update && apt-get install -y libpq-dev unzip git \
    && docker-php-ext-install pdo pdo_pgsql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Pindah ke direktori aplikasi
WORKDIR /app

# Salin semua file proyek ke dalam server Docker
COPY . .

# Install dependensi Laravel
RUN composer install --optimize-autoloader --no-dev

# Jalankan server Laravel menggunakan port dari Render
CMD php artisan serve --host=0.0.0.0 --port=$PORT