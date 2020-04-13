-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2020 at 04:38 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uts-pbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `datapoint`
--

CREATE TABLE `datapoint` (
  `id` int(11) NOT NULL,
  `nama_spbu` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `latitude` varchar(11) DEFAULT NULL,
  `longitude` varchar(11) DEFAULT NULL,
  `warna` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datapoint`
--

INSERT INTO `datapoint` (`id`, `nama_spbu`, `keterangan`, `latitude`, `longitude`, `warna`) VALUES
(1, 'Monumen Nasional', NULL, '-6.1749344', '106.8217092', 'red'),
(2, 'Istana Merdeka', NULL, '-6.1701238', '106.8219881', 'yellow'),
(3, 'Badan Pajak', NULL, '-6.1757131', '106.8208509', 'white'),
(4, 'Kementrian BUMN', NULL, '-6.1779104', '106.8213766', 'white'),
(5, 'asd', 'asd', '-6.66460756', '106.9736981', NULL),
(6, 'asdasda', 'asd1', '-6.17546764', '106.8271602', NULL),
(7, 'asdasda', 'asdasd', '-6.17946759', '106.8941418', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `setting_id` int(11) NOT NULL,
  `namaweb` varchar(16) DEFAULT NULL,
  `icon` varchar(16) DEFAULT NULL,
  `logo` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`setting_id`, `namaweb`, `icon`, `logo`) VALUES
(1, 'UTS-PBD-GIS', 'irfan.jpg', 'Arya.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(132) NOT NULL,
  `image` varchar(132) DEFAULT NULL,
  `akses_level` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `image`, `akses_level`) VALUES
(1, 'Admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Irfan_Blue.jpg', 'admin'),
(2, 'Operator', 'fe96dd39756ac41b74283a9292652d366d73931f', 'irfan.jpg', 'operator'),
(3, 'User', '12dea96fec20593566ab75692c9949596833adc9', 'Arya1.jpg', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datapoint`
--
ALTER TABLE `datapoint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datapoint`
--
ALTER TABLE `datapoint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
