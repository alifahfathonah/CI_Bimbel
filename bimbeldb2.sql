-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2020 at 06:39 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bimbeldb2`
--

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` mediumint(8) UNSIGNED NOT NULL,
  `nama_mapel` tinytext NOT NULL,
  `kelas` int(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`, `kelas`) VALUES
(1, 'Metematika', 7),
(3, 'Fisika', 10),
(5, 'Biologi', 9),
(7, 'Kimia', 11),
(8, 'Bahasa Indonesia', 9);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_evaluasi`
--

CREATE TABLE `nilai_evaluasi` (
  `id_evaluasi` mediumint(16) UNSIGNED NOT NULL,
  `id_mapel` mediumint(8) UNSIGNED NOT NULL,
  `id_siswa` mediumint(12) UNSIGNED NOT NULL,
  `nilai` int(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nilai_evaluasi`
--

INSERT INTO `nilai_evaluasi` (`id_evaluasi`, `id_mapel`, `id_siswa`, `nilai`) VALUES
(1, 7, 1, 80),
(3, 5, 1, 70);

-- --------------------------------------------------------

--
-- Table structure for table `pengajar`
--

CREATE TABLE `pengajar` (
  `id_pengajar` mediumint(8) UNSIGNED NOT NULL,
  `nama_pengajar` tinytext NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `umur` int(16) UNSIGNED NOT NULL,
  `id_mapel` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengajar`
--

INSERT INTO `pengajar` (`id_pengajar`, `nama_pengajar`, `jenis_kelamin`, `umur`, `id_mapel`) VALUES
(1, 'Budi', 'L', 30, 1),
(2, 'Bambang', 'L', 25, 7),
(4, 'Rahmat', 'L', 35, 3),
(5, 'Markonah', 'P', 35, 5),
(6, 'Maemunah', 'P', 30, 8),
(7, 'Taufiq', 'L', 32, 1);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` mediumint(12) UNSIGNED NOT NULL,
  `nama_siswa` tinytext NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `umur` int(16) UNSIGNED NOT NULL,
  `sekolah_asal` tinytext NOT NULL,
  `kelas` int(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama_siswa`, `jenis_kelamin`, `umur`, `sekolah_asal`, `kelas`) VALUES
(1, 'Mahmudin', 'P', 14, 'SMAN Swasta', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `nilai_evaluasi`
--
ALTER TABLE `nilai_evaluasi`
  ADD PRIMARY KEY (`id_evaluasi`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`id_pengajar`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nilai_evaluasi`
--
ALTER TABLE `nilai_evaluasi`
  MODIFY `id_evaluasi` mediumint(16) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `id_pengajar` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` mediumint(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nilai_evaluasi`
--
ALTER TABLE `nilai_evaluasi`
  ADD CONSTRAINT `nilai_evaluasi_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`),
  ADD CONSTRAINT `nilai_evaluasi_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`);

--
-- Constraints for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD CONSTRAINT `pengajar_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
