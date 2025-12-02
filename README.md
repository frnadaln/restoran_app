# Sistem Manajemen Restoran

Aplikasi manajemen restoran berbasis WEB untuk mengelola pelanggan, meja, dan reservasi.

## Deskripsi

Restoran App adalah sebuah sistem pemesanan restoran yang digunakan untuk mengelola data pelanggan, meja, dan pesanan secara terstruktur. Admin dapat menambah pelanggan, mengatur ketersediaan meja, serta membuat dan mengedit pesanan dengan mudah. Admin dapat memperbarui status meja yang sudah dipesan agar tidak ada dipesan lagi (terjadi duplikasi). Sistem dibangun menggunakan Laravel dan MySQL, sehingga proses pengelolaan reservasi menjadi lebih cepat, rapi, dan efisien.

## Fitur
### Manajemen Pelanggan
- Menambahkan pelanggan baru dengan nama dan nomor telepon
- Melihat daftar semua pelanggan
- Mengedit informasi pelanggan
- Menghapus data pelanggan

### Manajemen Meja

- Menambahkan meja baru dengan nomor meja, kapasitas, status, dan minimum spent
- Melihat daftar semua meja
- Mengedit informasi meja
- Menghapus data meja

### Manajemen Pesanan

- Menambahkan pesanan baru dengan memilih pelanggan, meja, tanggal/waktu, dan total DP
- Melihat daftar semua pesanan
- Mengedit informasi pesanan
- Menghapus data pesanan

## Teknologi
 - PHP
 - Laravel - Framework PHP
 - MySQL - Database

## Instalasi

1. Clone Repository
   git clone https://github.com/frnadaln/restoran_app.git
   
2. Install dependensi: 
   composer install

3. Buat file environment: 
   cp .env.example .env
   
4. Generate key: 
   php artisan key:generate

5. Jalankan server: 
    php artisan serve

6. Migrasi database:
    php artisan migrate


## Menjalankan Test

Menjalankan semua test: php artisan test

## Dokumentasi File

Dokumen Pengembangan Sistem: https://drive.google.com/file/d/17xMseogqYBT9FAissivSjAT0O-k_x2_s/view?usp=sharing
Slide Presentasi: https://drive.google.com/file/d/1fap7vg3xym9NUeGHLbozPoX9xFpKb11M/view?usp=sharing
