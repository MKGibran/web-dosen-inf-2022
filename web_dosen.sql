-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2022 at 03:57 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_dosen`
--

-- --------------------------------------------------------

--
-- Table structure for table `datadosen`
--

CREATE TABLE `datadosen` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nidn` varchar(25) NOT NULL,
  `ptn` varchar(100) NOT NULL,
  `prodi` varchar(70) NOT NULL,
  `jk` int(1) NOT NULL,
  `jabatan_fungsional` varchar(100) NOT NULL,
  `pendidikan_tertinggi` varchar(5) NOT NULL,
  `status_aktivitas` varchar(10) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `datadosen`
--

INSERT INTO `datadosen` (`id`, `nama`, `nidn`, `ptn`, `prodi`, `jk`, `jabatan_fungsional`, `pendidikan_tertinggi`, `status_aktivitas`, `foto`) VALUES
(1, 'Muhammad Kahlil Gibran', '1030303119084', 'IPB University', 'Manajemen Informatika', 0, 'Mahasiswa', 'S1', 'Aktif', '1649745402_d4be6eec5053758f89d7.jpeg'),
(4, 'Meisy Eka Friosa', '1030303119085', 'IPB University', 'Manajemen Informatika', 0, 'Mahasiswa', 'S1', 'Aktif', '1650104209_864c15073d5fa24c23bd.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `karyadosen`
--

CREATE TABLE `karyadosen` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_karya` varchar(150) NOT NULL,
  `tahun` date NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `jenis_bukti` varchar(50) NOT NULL,
  `bukti` varchar(100) NOT NULL,
  `nomor` varchar(100) NOT NULL,
  `tautan` varchar(255) NOT NULL,
  `sitasi` int(25) NOT NULL,
  `dosen_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `karyadosen`
--

INSERT INTO `karyadosen` (`id`, `nama_karya`, `tahun`, `jenis`, `jenis_bukti`, `bukti`, `nomor`, `tautan`, `sitasi`, `dosen_id`) VALUES
(2, 'Contoh', '2022-05-26', 'Contoh', 'Contoh', '1653572656_fcaa5abcd4f1cf9f0e8a.pdf', 'Contoh', 'Contoh', 1, 1),
(3, 'Contoh', '2022-05-26', 'Contoh', 'Contoh', '1653573647_14a5611e6e9bd94a8384.pdf', '', '', 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(11, '2022-04-10-120332', 'App\\Database\\Migrations\\Auth', 'default', 'App', 1649697537, 1),
(12, '2022-04-10-165513', 'App\\Database\\Migrations\\DataDosen', 'default', 'App', 1649697537, 1),
(13, '2022-04-10-191328', 'App\\Database\\Migrations\\CreateDB', 'default', 'App', 1649697538, 1),
(14, '2022-04-11-162535', 'App\\Database\\Migrations\\Riwayatpendidikan', 'default', 'App', 1649698130, 2),
(20, '2022-04-11-162553', 'App\\Database\\Migrations\\Riwayatmengajar', 'default', 'App', 1649698625, 3),
(21, '2022-04-11-173811', 'App\\Database\\Migrations\\RiwayatPendidikan', 'default', 'App', 1649698948, 4),
(22, '2022-04-11-174501', 'App\\Database\\Migrations\\RiwayatMengajar', 'default', 'App', 1649699260, 5),
(25, '2022-04-13-023555', 'App\\Database\\Migrations\\SertifikatPelatihan', 'default', 'App', 1649817657, 6),
(26, '2022-04-13-023607', 'App\\Database\\Migrations\\SertifikatPendidik', 'default', 'App', 1649817657, 6),
(27, '2022-04-13-023607', 'App\\Database\\Migrations\\SertifikatKompetensi', 'default', 'App', 1649911911, 7),
(28, '2022-04-14-051556', 'App\\Database\\Migrations\\Auth', 'default', 'App', 1649913374, 8),
(33, '2022-04-15-175245', 'App\\Database\\Migrations\\SertifikatSeminar', 'default', 'App', 1650046319, 9),
(34, '2022-04-15-175257', 'App\\Database\\Migrations\\SertifikatWorkshop', 'default', 'App', 1650046319, 9),
(35, '2022-05-15-071107', 'App\\Database\\Migrations\\KaryaDosen', 'default', 'App', 1652599056, 10);

-- --------------------------------------------------------

--
-- Table structure for table `riwayatmengajar`
--

CREATE TABLE `riwayatmengajar` (
  `id` int(10) UNSIGNED NOT NULL,
  `semester` varchar(25) NOT NULL,
  `kode_matkul` varchar(20) NOT NULL,
  `nama_matkul` varchar(100) NOT NULL,
  `kode_kelas` varchar(15) NOT NULL,
  `ptn` varchar(150) NOT NULL,
  `dosen_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `riwayatmengajar`
--

INSERT INTO `riwayatmengajar` (`id`, `semester`, `kode_matkul`, `nama_matkul`, `kode_kelas`, `ptn`, `dosen_id`) VALUES
(3, 'Ganjil 2022', 'INF108', 'Aplikasi Komputer', 'A', 'IPB University', 1),
(4, 'Genap 2018', 'INF301', 'Struktur Data', 'B', 'IPB University', 1),
(5, 'Ganjil 2021', 'INF108', 'Aplikasi Komputer', 'A', 'IPB University', 1);

-- --------------------------------------------------------

--
-- Table structure for table `riwayatpendidikan`
--

CREATE TABLE `riwayatpendidikan` (
  `id` int(10) UNSIGNED NOT NULL,
  `perguruan_tinggi` varchar(150) NOT NULL,
  `gelar_akademik` varchar(10) NOT NULL,
  `tanggal_ijazah` date NOT NULL,
  `jenjang` varchar(5) NOT NULL,
  `ijazah` varchar(100) NOT NULL,
  `dosen_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `riwayatpendidikan`
--

INSERT INTO `riwayatpendidikan` (`id`, `perguruan_tinggi`, `gelar_akademik`, `tanggal_ijazah`, `jenjang`, `ijazah`, `dosen_id`) VALUES
(12, 'IPB University', 'S. Kom.', '2022-04-13', 'S1', '1649818471_09a4bb659f6407644195.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sertifikatkompetensi`
--

CREATE TABLE `sertifikatkompetensi` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kompetensi` varchar(255) NOT NULL,
  `tahun_perolehan` date NOT NULL,
  `sertifikat` varchar(100) NOT NULL,
  `dosen_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sertifikatkompetensi`
--

INSERT INTO `sertifikatkompetensi` (`id`, `nama_kompetensi`, `tahun_perolehan`, `sertifikat`, `dosen_id`) VALUES
(3, 'Dart Programming', '2022-04-16', '1650103418_5690ba8a0217c9a1347c.pdf', 1),
(4, 'PHP OOP', '2022-04-16', '1650104244_c5bd79a29800f437b1b1.pdf', 4);

-- --------------------------------------------------------

--
-- Table structure for table `sertifikatpelatihan`
--

CREATE TABLE `sertifikatpelatihan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `tanggal_perolehan` date NOT NULL,
  `sertifikat` varchar(100) NOT NULL,
  `dosen_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sertifikatpelatihan`
--

INSERT INTO `sertifikatpelatihan` (`id`, `nama_kegiatan`, `tanggal_perolehan`, `sertifikat`, `dosen_id`) VALUES
(1, 'Pelatihan 1', '2022-04-16', '1650104286_608f81f7f9d9fdbdef5f.pdf', 4);

-- --------------------------------------------------------

--
-- Table structure for table `sertifikatpendidik`
--

CREATE TABLE `sertifikatpendidik` (
  `id` int(10) UNSIGNED NOT NULL,
  `nomor_registrasi` int(100) NOT NULL,
  `tanggal_perolehan` date NOT NULL,
  `sertifikat` varchar(100) NOT NULL,
  `dosen_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sertifikatseminar`
--

CREATE TABLE `sertifikatseminar` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `tanggal_perolehan` date NOT NULL,
  `sertifikat` varchar(100) NOT NULL,
  `dosen_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sertifikatseminar`
--

INSERT INTO `sertifikatseminar` (`id`, `nama_kegiatan`, `tanggal_perolehan`, `sertifikat`, `dosen_id`) VALUES
(1, 'Seminar 1', '2022-04-16', '1650104309_6c8130f5cc1d6424222d.pdf', 4);

-- --------------------------------------------------------

--
-- Table structure for table `sertifikatworkshop`
--

CREATE TABLE `sertifikatworkshop` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `tanggal_perolehan` date NOT NULL,
  `sertifikat` varchar(100) NOT NULL,
  `dosen_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sertifikatworkshop`
--

INSERT INTO `sertifikatworkshop` (`id`, `nama_kegiatan`, `tanggal_perolehan`, `sertifikat`, `dosen_id`) VALUES
(1, 'Workshop 1', '2022-04-16', '1650104380_561ea243dc508771f3ac.pdf', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(2) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`) VALUES
(1, 'J3C119084', '$2y$10$LKhAvN2PNUBHGU/urQkbrOG/Sv0SRHuq1PijG5vhFoeNHC0TKfnBG', 'Gibran'),
(9, 'pro123', '$2y$10$3Vl0reWnR6CgykMRPDrTAuqujXkN1FudkBT.1zTtwrrcQvLm9Sc.O', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datadosen`
--
ALTER TABLE `datadosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyadosen`
--
ALTER TABLE `karyadosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayatmengajar`
--
ALTER TABLE `riwayatmengajar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayatpendidikan`
--
ALTER TABLE `riwayatpendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sertifikatkompetensi`
--
ALTER TABLE `sertifikatkompetensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sertifikatpelatihan`
--
ALTER TABLE `sertifikatpelatihan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sertifikatpendidik`
--
ALTER TABLE `sertifikatpendidik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sertifikatseminar`
--
ALTER TABLE `sertifikatseminar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sertifikatworkshop`
--
ALTER TABLE `sertifikatworkshop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datadosen`
--
ALTER TABLE `datadosen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `karyadosen`
--
ALTER TABLE `karyadosen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `riwayatmengajar`
--
ALTER TABLE `riwayatmengajar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `riwayatpendidikan`
--
ALTER TABLE `riwayatpendidikan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sertifikatkompetensi`
--
ALTER TABLE `sertifikatkompetensi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sertifikatpelatihan`
--
ALTER TABLE `sertifikatpelatihan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sertifikatpendidik`
--
ALTER TABLE `sertifikatpendidik`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sertifikatseminar`
--
ALTER TABLE `sertifikatseminar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sertifikatworkshop`
--
ALTER TABLE `sertifikatworkshop`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
