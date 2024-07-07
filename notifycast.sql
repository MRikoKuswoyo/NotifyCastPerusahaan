-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2024 at 02:45 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notifycast`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `nama_lengkap`, `username`, `password`, `level`) VALUES
(5, 'muhammad riko kuswoyo', 'koko', 'admin', 'admin'),
(6, 'rosmida', 'mida', 'admin', 'admin'),
(7, 'nurul anita abdul hanan', 'anita', 'user', 'user'),
(8, 'alwi hasyimi', 'alwi', 'user', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_pengumuman` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `komentar` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_pengumuman`, `nama`, `komentar`, `created_at`) VALUES
(10, 17, 'mida', 'Selamat Tahun Baru islam semuaaa', '2024-07-07 12:32:38'),
(13, 17, 'anita', 'Terimakasih banyak miminn kuuu', '2024-07-07 12:34:12');

-- --------------------------------------------------------

--
-- Table structure for table `kritiksaran`
--

CREATE TABLE `kritiksaran` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `critic` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kritiksaran`
--

INSERT INTO `kritiksaran` (`id`, `name`, `email`, `critic`, `created_at`) VALUES
(1, 'Lazark', 'dhias313@gmail.com', 'mantap slurrrrrrrr', '2023-05-21 14:23:24'),
(2, 'Lazark', 'dhias313@gmail.com', 'MANTAPP CUY!', '2023-05-23 03:39:58'),
(3, 'FIKRI', 'dhias314@gmail.com', 'Kebijakan yang anda buat merupakan kekeliruan terbesaer bagi perusahaan dan saya tidak dapat menerima sebagai pegawai disini', '2023-05-23 03:46:45'),
(6, 'arqam syahputra', 'arqamspc@gmail.com', 'viva spectre', '2023-05-28 03:37:45'),
(8, 'midaa', 'mida@gmail.com', 'Membantu sekali , semoga bisa leboh berkembang yaaa', '2024-07-03 16:35:49');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `message`, `created_at`) VALUES
(14, 'Lazark', 'haloo', '2023-05-23 08:41:39'),
(15, 'Lazark', 'halo nama saya Lazark', '2023-05-24 03:19:29'),
(17, 'Lazark', 'arqam tolong buat fitur baru', '2023-05-26 14:51:37'),
(19, 'Lazark', 'halo nama saya dhias', '2023-05-26 15:59:14'),
(20, 'anita', 'halo min', '2024-07-03 07:04:26'),
(21, 'anita', 'halo min', '2024-07-03 07:07:32'),
(22, 'koko', 'hbyttt', '2024-07-03 07:07:38'),
(23, 'koko', 'halo min', '2024-07-03 07:08:30'),
(24, 'anita', 'halo min', '2024-07-03 07:08:44');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi_pengumuman` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `judul`, `isi_pengumuman`, `gambar`, `created_at`) VALUES
(17, 'Libur Nasional Tahun Baru Islam dan Akhir Pekan: Minggu 7 Juli 2024 ', 'Kata-kata terbaik adalah doa. Dan, tiada doa yang lebih baik ketika diiringi dengan ikhtiar. Semoga tahun barumu dijalani dengan kegiatan positif.\r\n\r\nSelamat Tahun Baru Islam', 'TAHUN-BARU-ISLAM-Berikut-ini-kumpulan-ucapan-Tahun-Baru-Islam-2024-y.jpg', '2024-07-07 11:37:48'),
(18, 'Selasa 9 Juli 2024: Hari Satelit Palapa ', 'Kalian Harus tau ternyata tanggal 9 Juli 1976 pukul 06.31 WIB, Indonesia berhasil meluncurkan satelit pertamanya, Palapa A1, dari Cape Canaveral Kennedy Space Centre, Florida, Amerika Serikat?\r\nSelain itu, nama Palapa sendiri diambil dari Sumpah Palapa Majapatih Gajah Mada yang merupakan sumpah pemersatu nusantara. Seperti filosofi Sumpah Palapa, Satelit Palapa ini memiliki peranan untuk mempersatukan nusantara melalui jaringan satelit.\r\nSatelit Palapa dibangun pada masa pemerintahan Presiden Soeharto karena menyadari pentingnya distribusi komunikasi di Indonesia.\r\nPrestasi ini patut kita banggakan karena pada saat itu Indonesia adalah negara pertama di Asia dan negara ketiga di dunia yang sudah bisa mengoperasikan Sistem Komunikasi Satelit Domestik (SKSD) menggunakan satelit geostasioner, setelah Amerika Serikat dan Kanada.\r\nDan Hal ini menjadi momentum era baru telekomunikasi Indonesia, nah Satelit Palapa juga memegang peran penting karena memperlancar komunikasi di seluruh Indonesia. Dan juga memperlancar komunikasi kamu pada saat ini', 'syn78z6m.png', '2024-07-07 11:57:51'),
(21, 'Jumat 12 Juli 2024: Hari Koperasi Indonesia', 'Hari Koperasi Nasional (Harkopnas) diperingati setiap tahun pada tanggal 12 Juli. Peringatan tersebut merupakan momentum memperingati gerakan Koperasi dalam mewujudkan tujuan utamanya, yakni memberikan kesejahteraan bagi seluruh anggotanya dan masyarakat pada umumnya.\r\n', 'OIP.jpeg', '2024-07-07 12:11:22'),
(22, 'Selasa 23 Juli 2024: Hari Anak Nasional 2024', 'Anak-anak adalah harapan dan masa depan bangsa. Semoga kalian selalu bersemangat untuk mencapai impian dan mewujudkan cita-cita. Selamat Hari Anak Nasional! Hari ini adalah hari kalian, anak-anak Indonesia! Jadilah generasi yang cerdas, kreatif, dan penuh cinta kasih untuk negeri ini. Selamat merayakan Hari Anak Nasional!', '57egtoat.png', '2024-07-07 12:15:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_pengumuman` (`id_pengumuman`);

--
-- Indexes for table `kritiksaran`
--
ALTER TABLE `kritiksaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kritiksaran`
--
ALTER TABLE `kritiksaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_pengumuman`) REFERENCES `pengumuman` (`id_pengumuman`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
