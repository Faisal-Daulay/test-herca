# Laravel 11 REST API Project Test PT.Herca

Ini adalah project uji coba backend menggunakan **Laravel 11** di mana saya membuat sebuah **REST API** sesuai dengan soal yang diberikan.

## Fitur
- API untuk manajemen data marketing dan cargo
- Database menggunakan **PostgreSQL**
- Disertai dengan Postman Collection untuk pengujian endpoint

## Cara Menjalankan Project Secara Lokal

1. **Clone Repository**  
   ```bash
   git clone <repository-url>
   cd <nama-folder-project>
   ```

2. **Install Dependency**  
   Jalankan perintah berikut untuk menginstal dependency:
   ```bash
   composer update
   ```

3. **Konfigurasi Environment**  
   Salin file `.env.example` menjadi `.env`:
   ```bash
   cp .env.example .env
   ```
   Lalu, atur konfigurasi database sesuai kebutuhan. Project ini menggunakan **PostgreSQL**.

4. **Generate Application Key**  
   ```bash
   php artisan key:generate
   ```

5. **Migrasi Database dan Seeder**  
   Jalankan perintah berikut untuk membuat tabel dan mengisi data awal khusus untuk tabel **marketing** dan **cargo**:
   ```bash
   php artisan migrate --seed
   ```

6. **Menjalankan Server Lokal**  
   ```bash
   php artisan serve
   ```
   Aplikasi akan berjalan di `http://localhost:8000` secara default.

7. **Pengujian API dengan Postman**  
   Project ini dilengkapi dengan **Postman Collection** yang bisa Anda impor ke Postman untuk mencoba berbagai endpoint yang telah dibuat.

8. **Menjalankan Pengujian dengan PHPUnit**  
   Laravel menyediakan fitur pengujian bawaan menggunakan PHPUnit. Jalankan perintah berikut untuk menjalankan seluruh pengujian:
   ```bash
   php artisan test
   ```
   Jika ingin menjalankan pengujian secara spesifik pada file tertentu, gunakan:
   ```bash
   php artisan test --filter NamaTest
   ```

## Teknologi yang Digunakan
- Laravel 11
- PostgreSQL
- Composer
- Postman (untuk testing API)
- PHPUnit (untuk pengujian otomatis)

## Catatan
- Pastikan PostgreSQL sudah terinstal dan berjalan di sistem Anda.
- Gunakan PHP versi yang sesuai dengan kebutuhan Laravel 11.

---

Selamat mencoba! 🚀

