-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:8080
-- Generation Time: Jan 06, 2026 at 02:43 PM
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
(10, '1767700795_2810010733.jpg', '2810010733', 'Frisco Thioris', 'SI', 'aktif');

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
(1, '1766680233_1203943984932849.png', 'Test', 'Aisyah', '1203943984932849', 'Teknologi', 2025, 'Aisyah', 0, 'ini dia', '2025-12-25 16:30:33'),
(2, '1766680681_12323213123212.png', 'Test', 'Aisyah lagi deh', '12323213123212', 'Sains', 2020, 'Aisyah', 100, 'hola', '2025-12-25 16:38:01'),
(3, '1766729824_12345555.jpg', 'Ini dia', 'Ini dia', '12345555', 'Teknologi', 2023, 'Aisyah', 0, 'test', '2025-12-26 06:17:04'),
(4, '1766729891_12324234141.png', 'Ini apeu', 'Rafli Maul', '12324234141', 'Teknologi', 0, '', 48, 'ini dia sinopsisnya\r\n', '2025-12-26 06:18:11'),
(7, '1766741883_12324234141.jpg', 'Test', 'Rafli', '12324234141', 'Teknologi', 0, '', 1, 'r', '2025-12-26 09:08:44'),
(10, '1766740537_12324234141.png', 'a', 'a', '12324234141', 'Teknologi', 2000, 'a', 1, 's', '2025-12-26 09:15:37'),
(11, '1766741006_1203943984932849.jpg', 'Informasi Test', 'Informasi Test', '1203943984932849', 'Teknologi', 0, '', 1, 'Informasi Test', '2025-12-26 09:18:13'),
(12, '1766741153_12323213123212.png', 'Menyapa mu tak berani', 'Aisyah', '12323213123212', 'Teknologi', 0, '', 1, 'Menyapa mu tak berani', '2025-12-26 09:25:24'),
(13, '1766741380_1203943984932849.jpg', 'Ini dia', 'Rafli', '1203943984932849', 'Teknologi', 0, '', 10, '$upload_path = __DIR__ . \"/../assets/img/covers/\";', '2025-12-26 09:28:58'),
(14, '1766741908_12324234141.jpg', 'Test', 'Rafli', '12324234141', 'Teknologi', 2007, 'Test', 1, 'd', '2025-12-26 09:38:28'),
(25, 'https://images.unsplash.com/photo-1589998059171-988d887df646?q=80&w=800', 'Atomic Habits', 'James Clear', '9780735211292', 'Self-Improvement', 2018, 'Penguin Publishing Group', 12, 'Atomic Habits menjelaskan bahwa perubahan besar dalam hidup tidak datang dari keputusan besar yang dilakukan sekali saja, melainkan dari akumulasi ratusan kebiasaan kecil yang disebut atom. James Clear memberikan kerangka kerja empat langkah sederhana: menjadikannya terlihat, menarik, mudah, dan memuaskan untuk membangun rutinitas baru yang positif.\n\nBuku ini juga menekankan pentingnya berfokus pada sistem daripada tujuan semata. Dengan memperbaiki sistem harian sebanyak satu persen saja setiap harinya, seseorang dapat mencapai transformasi identitas yang permanen dan hasil yang luar biasa dalam jangka panjang.', '2025-12-27 05:02:46'),
(26, 'https://images.unsplash.com/photo-1516116216624-53e697fedbea?q=80&w=800', 'Clean Code', 'Robert C. Martin', '9780132350884', 'Teknologi', 2008, 'Prentice Hall', 5, 'Clean Code adalah kitab suci bagi para pengembang perangkat lunak yang ingin meningkatkan kualitas koding mereka. Robert C. Martin menjelaskan perbedaan antara kode yang sekadar jalan dengan kode yang berkualitas, di mana kode yang buruk dapat menghambat perkembangan proyek dan merugikan tim dalam jangka waktu lama.\n\nBuku ini mengajarkan prinsip-prinsip krusial seperti penamaan variabel yang bermakna, fungsi yang ringkas, serta pentingnya pengujian (testing). Melalui buku ini, pembaca diajak untuk menulis kode yang tidak hanya dimengerti oleh mesin, tetapi juga mudah dibaca dan dipelihara oleh manusia.', '2025-12-27 05:02:46'),
(27, 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?q=80&w=800', 'Bumi Manusia', 'Pramoedya Ananta Toer', '9789799731235', 'Fiksi', 1980, 'Lentera Dipantara', 8, 'Berlatar di akhir masa kolonial Belanda, Bumi Manusia mengisahkan perjalanan hidup Minke, seorang pemuda pribumi yang berkesempatan mengenyam pendidikan di sekolah Belanda (HBS). Di tengah diskriminasi rasial, Minke terpukau oleh kecantikan dan kecerdasan Annelies serta karakter kuat ibunya, Nyai Ontosoroh, yang berani melawan ketidakadilan hukum kolonial.\n\nNovel ini bukan sekadar kisah cinta biasa, melainkan potret perlawanan pemikiran dan pencarian jati diri bangsa Indonesia yang mulai menggeliat. Pramoedya menggambarkan dengan sangat apik bagaimana ilmu pengetahuan dan sastra menjadi senjata utama dalam melawan penindasan dan membangkitkan harga diri kaum pribumi.', '2025-12-27 05:02:46'),
(28, 'https://images.unsplash.com/photo-1512820790803-83ca734da794?q=80&w=800', 'Sapiens', 'Yuval Noah Harari', '9780062316097', 'Sejarah', 2011, 'Harper', 10, 'Sapiens membawa pembaca menelusuri sejarah luar biasa umat manusia, mulai dari kemunculan Homo Sapiens di Afrika hingga peran dominan mereka di bumi. Harari menjelaskan bagaimana tiga revolusi besar—Kognitif, Pertanian, dan Saintifik—telah mengubah cara manusia berpikir, bersosialisasi, dan mendominasi spesies lain di planet ini.\n\nPenulis menggali pertanyaan-pertanyaan mendalam tentang agama, politik, dan uang yang dianggap sebagai \"fiksi bersama\" yang menyatukan miliaran manusia. Buku ini menantang pandangan konvensional kita tentang apa artinya menjadi manusia dan ke mana arah masa depan spesies kita di tengah kemajuan teknologi biologi dan kecerdasan buatan.', '2025-12-27 05:02:46'),
(29, 'https://images.unsplash.com/photo-1531988042231-d39a9cc12a9a?q=80&w=800', 'Filosofi Teras', 'Henry Manampiring', '9786024125189', 'Psikologi', 2019, 'Penerbit Buku Kompas', 15, 'Filosofi Teras mengenalkan ajaran Stoisisme, sebuah filsafat Yunani-Romawi kuno, sebagai solusi praktis untuk menghadapi kecemasan dan stres di era modern. Henry Manampiring menjelaskan cara kerja pikiran kita untuk membedakan hal-hal yang bisa kita kendalikan dan hal-hal yang berada di luar kendali kita, sehingga kita bisa mencapai kedamaian batin.\n\nBuku ini ditulis dengan bahasa yang santai dan relevan bagi masyarakat urban Indonesia saat ini. Melalui latihan-latihan mental yang sederhana, pembaca diajarkan untuk tidak mudah baper, mengelola emosi negatif secara bijak, dan tetap tangguh dalam menghadapi berbagai tantangan hidup yang datang silih berganti.', '2025-12-27 05:02:46'),
(30, '1767320450_9786024125189.png', 'asasa', 'Fr', '9786024125189', 'Pilih Kategori', 2025, 'ccs', 1, 'sasa', '2026-01-02 02:20:50');

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
(1, 10, 4, '2026-01-06', '2026-01-13', 'dipinjam'),
(2, 10, 4, '2026-01-06', '2026-01-13', 'dipinjam');

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
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
