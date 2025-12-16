# One Library

One Library adalah sebuah sistem perpustakaan SATU University yang dikembangkan untuk memenuhi tugas mata kuliah Teknologi Database. Sistem ini dirancang dari sisi admin, dengan kemampuan untuk mengelola data buku, anggota perpustakaan, serta transaksi peminjaman dan pengembalian buku. Aplikasi ini memanfaatkan PHP sebagai bahasa pemrograman sisi server, MySQL sebagai basis data relasional, serta Tailwind CSS untuk styling antarmuka pengguna.

## Getting Started

Panduan ini akan membantu menjalankan dan memahami sistem One Library di lingkungan lokal untuk keperluan pembelajaran, pengembangan, dan pengujian.


### Prerequisites

Sebelum menjalankan aplikasi ini, pastikan telah terpasang:

* Web server lokal (XAMPP / WAMP / Laragon)
* PHP versi 7.x atau lebih baru
* MySQL / MariaDB
* Web browser modern (Chrome, Firefox, Edge, dll)



### Installing

Ikuti langkah-langkah berikut untuk menjalankan project secara lokal:

1. Clone repository

   ```bash
   git clone https://github.com/<username>/one-library.git
   ```

2. Masuk ke direktori project

   ```bash
   cd one-library
   ```

3. Pindahkan folder project ke direktori server lokal

   * Contoh (XAMPP): `C:/xampp/htdocs/one-library`

4. Import database

   * Buka phpMyAdmin
   * Buat database baru dengan nama `one_library`
   * Import file SQL yang tersedia di folder `database/`

5. Konfigurasi koneksi database

   * Buka file konfigurasi (misalnya `config.php`)
   * Sesuaikan host, username, password, dan nama database

6. Jalankan aplikasi

   * Aktifkan Apache dan MySQL
   * Akses melalui browser: `http://localhost/one-library`



## Running the tests

Project ini tidak menggunakan *automated testing*. Pengujian dilakukan secara manual dengan cara:

* Login sebagai admin
* Menambahkan data anggota
* Menambahkan data buku
* Melakukan transaksi peminjaman
* Melakukan pengembalian buku
* Memastikan stok dan histori transaksi diperbarui dengan benar



### Break down into end to end tests

Pengujian dilakukan berdasarkan alur sistem secara menyeluruh, meliputi:

* Validasi input data
* Relasi antar tabel database
* Konsistensi data transaksi
* Pembaruan status buku dan anggota



### And coding style tests

Penulisan kode mengikuti standar dasar pemrograman web yang dipelajari di perkuliahan:

* Struktur folder yang terorganisir
* Pemisahan logika PHP dan tampilan
* Penamaan variabel yang jelas
* Penggunaan Tailwind CSS secara konsisten


## Deployment

Aplikasi One Library ditujukan untuk penggunaan lokal dan keperluan akademik.

Untuk deployment ke server produksi, dibutuhkan:

* Hosting yang mendukung PHP
* Database MySQL
* Konfigurasi keamanan tambahan (authentication & sanitasi input)



## Built With

Teknologi yang digunakan dalam pengembangan sistem ini:

* **PHP** – Backend logic
* **MySQL** – Relational database
* **Tailwind CSS** – Styling UI
* **HTML** – Struktur halaman
* **JavaScript** – Interaksi dasar



## Contributing

Repository ini dibuat sebagai proyek tugas kuliah. Kontribusi bersifat terbatas, namun saran dan masukan sangat diapresiasi.

Langkah kontribusi:

1. Fork repository
2. Buat branch baru (`feature/nama-fitur`)
3. Commit perubahan
4. Ajukan Pull Request



## Versioning

Versioning belum diterapkan secara formal. Riwayat perubahan dapat dilihat melalui commit Git.



## License

Project ini dibuat untuk keperluan pembelajaran dan akademik.


## Acknowledgments

* Dosen pengampu mata kuliah Teknologi Database
* Dokumentasi resmi PHP
* Tailwind CSS Documentation
* MySQL Reference Manual
