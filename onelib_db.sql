-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:8080
-- Generation Time: Jan 07, 2026 at 03:25 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onelib_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `password`) VALUES
(1, 'Administrator', 'admin@kampus.id', '$2a$12$IvdAcGKkP/jPAJnuZBxO8uCR1zX.5NorZFG85vDr1XhCJIrwD1Fqa');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT 'default.png',
  `nim_nip` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `prodi` varchar(100) DEFAULT NULL,
  `status` enum('aktif','nonaktif') DEFAULT 'aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `foto`, `nim_nip`, `nama`, `prodi`, `status`) VALUES
(10, '1767700795_2810010733.jpg', '2810010733', 'Frisco Thioris', 'Sistem Informasi', 'aktif'),
(11, '1767751984_2810011654.jpg', '2810011654', 'Aisyah Nur Fadilah', 'Informatika', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `cover_url` varchar(255) DEFAULT 'default_cover.jpg',
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `tahun_terbit` int(4) DEFAULT NULL,
  `penerbit` varchar(100) DEFAULT NULL,
  `stok` int(11) DEFAULT 0,
  `sinopsis` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `cover_url`, `judul`, `penulis`, `isbn`, `kategori`, `tahun_terbit`, `penerbit`, `stok`, `sinopsis`, `created_at`) VALUES
(32, '1767724655_9780735211292.jpg', 'Atomic Habits', 'James Clear', '9780735211292', 'Self-Improvement', 2018, 'Penguin Publishing Group', 11, 'Atomic Habits menjelaskan bahwa perubahan besar dalam hidup tidak datang dari keputusan besar yang dilakukan sekali saja, melainkan dari akumulasi ratusan kebiasaan kecil yang disebut atom. James Clear memberikan kerangka kerja empat langkah sederhana: menjadikannya terlihat, menarik, mudah, dan memuaskan untuk membangun rutinitas baru yang positif.\r\n\r\nBuku ini juga menekankan pentingnya berfokus pada sistem daripada tujuan semata. Dengan memperbaiki sistem harian sebanyak satu persen saja setiap harinya, seseorang dapat mencapai transformasi identitas yang permanen dan hasil yang luar biasa dalam jangka panjang.', '2025-12-26 22:02:46'),
(33, '1767724627_9780132350884.jpg', 'Clean Code', 'Robert C. Martin', '9780132350884', 'Teknologi', 2008, 'Prentice Hall', 5, 'Clean Code adalah kitab suci bagi para pengembang perangkat lunak yang ingin meningkatkan kualitas koding mereka. Robert C. Martin menjelaskan perbedaan antara kode yang sekadar jalan dengan kode yang berkualitas, di mana kode yang buruk dapat menghambat perkembangan proyek dan merugikan tim dalam jangka waktu lama.\r\n\r\nBuku ini mengajarkan prinsip-prinsip krusial seperti penamaan variabel yang bermakna, fungsi yang ringkas, serta pentingnya pengujian (testing). Melalui buku ini, pembaca diajak untuk menulis kode yang tidak hanya dimengerti oleh mesin, tetapi juga mudah dibaca dan dipelihara oleh manusia.', '2025-12-26 22:02:46'),
(34, '1767724552_9789799731235.jpg', 'Bumi Manusia', 'Pramoedya Ananta Toer', '9789799731235', 'Fiksi', 1980, 'Lentera Dipantara', 8, 'Berlatar di akhir masa kolonial Belanda, Bumi Manusia mengisahkan perjalanan hidup Minke, seorang pemuda pribumi yang berkesempatan mengenyam pendidikan di sekolah Belanda (HBS). Di tengah diskriminasi rasial, Minke terpukau oleh kecantikan dan kecerdasan Annelies serta karakter kuat ibunya, Nyai Ontosoroh, yang berani melawan ketidakadilan hukum kolonial.\r\n\r\nNovel ini bukan sekadar kisah cinta biasa, melainkan potret perlawanan pemikiran dan pencarian jati diri bangsa Indonesia yang mulai menggeliat.', '2025-12-26 22:02:46'),
(35, '1767724480_9780062316097.jpg', 'Sapiens', 'Yuval Noah Harari', '9780062316097', 'Sejarah', 2011, 'Harper', 10, 'Sapiens membawa pembaca menelusuri sejarah luar biasa umat manusia, mulai dari kemunculan Homo Sapiens di Afrika hingga peran dominan mereka di bumi. Harari menjelaskan bagaimana tiga revolusi besar—Kognitif, Pertanian, dan Saintifik—telah mengubah cara manusia berpikir, bersosialisasi, dan mendominasi spesies lain di planet ini.\r\n\r\nBuku ini menantang pandangan konvensional kita tentang apa artinya menjadi manusia dan ke mana arah masa depan spesies kita.', '2025-12-26 22:02:46'),
(36, '1767723637_9786024125189.jpg', 'Filosofi Teras', 'Henry Manampiring', '9786024125189', 'Psikologi', 2019, 'Penerbit Buku Kompas', 15, 'Filosofi Teras mengenalkan ajaran Stoisisme sebagai solusi praktis untuk menghadapi kecemasan dan stres di era modern. Pembaca diajak membedakan hal yang bisa dikendalikan dan yang tidak, sehingga dapat mencapai ketenangan batin.\r\n\r\nDengan bahasa yang santai dan relevan, buku ini mengajarkan cara mengelola emosi dan tetap tangguh menghadapi tantangan hidup.', '2025-12-26 22:02:46');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status_pinjam` enum('dipinjam','kembali','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_anggota`, `id_buku`, `tgl_pinjam`, `tgl_kembali`, `status_pinjam`) VALUES
(9, 11, 32, '2026-01-07', '2026-01-14', 'dipinjam'),
(10, 11, 36, '2026-01-07', '2026-01-14', 'kembali');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD UNIQUE KEY `nim_nip` (`nim_nip`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_buku` (`id_buku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
