-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2016 at 04:41 PM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `efutsal`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id_customer` int(10) unsigned zerofill NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(13) NOT NULL,
  `user_login_id` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama`, `alamat`, `no_tlp`, `user_login_id`, `status`, `foto`) VALUES
(0000000001, 'Krisna2', 'jalan baladewa2', '12038209d', 12, 1, ''),
(0000000004, 'testing', '2701 S Bayshore Dr, Miami, FL', '138u13098', 15, 1, '15.png');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE IF NOT EXISTS `fasilitas` (
  `id_fasilitas` int(10) unsigned NOT NULL,
  `nama_fasilitas` varchar(50) NOT NULL,
  `deskripsi` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `nama_fasilitas`, `deskripsi`) VALUES
(123, 'Tempat parkir', 'Ketersediaan tempat parkir di tempat futsal'),
(124, 'Kamar ganti', 'Ketersediaan kamar ganti di tempat futsal'),
(126, 'Papan Skor', ''),
(127, 'Shower air dingin', ''),
(128, 'Team T-shirt', ''),
(129, 'Canteen', ''),
(130, 'Bar', ''),
(131, 'Musik', '');

-- --------------------------------------------------------

--
-- Table structure for table `lapang`
--

CREATE TABLE IF NOT EXISTS `lapang` (
  `id_lapang` int(10) unsigned NOT NULL,
  `kode_lapang` varchar(10) NOT NULL,
  `harga` double NOT NULL,
  `ukuran` varchar(20) NOT NULL,
  `id_provider` int(10) unsigned NOT NULL,
  `jenis` smallint(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lapang`
--

INSERT INTO `lapang` (`id_lapang`, `kode_lapang`, `harga`, `ukuran`, `id_provider`, `jenis`) VALUES
(4, 'A', 60000, '25 X 14', 8, 2),
(5, 'B', 50000, '25 X 14', 8, 3),
(7, 'C', 150000, '25 X 14', 8, 1),
(8, 'D', 120000, '25 X 14', 8, 0),
(9, 'A', 50000, '25 X 15', 1, 0),
(10, 'B', 70000, '25 X 14', 1, 2),
(11, 'C', 70000, '25 X 14', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE IF NOT EXISTS `provider` (
  `id_provider` int(10) unsigned NOT NULL,
  `nama` varchar(50) NOT NULL,
  `lokasi` text NOT NULL,
  `user_login_id` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL,
  `longitude` float DEFAULT '0',
  `latitude` float DEFAULT '0',
  `provinsi_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`id_provider`, `nama`, `lokasi`, `user_login_id`, `status`, `longitude`, `latitude`, `provinsi_id`) VALUES
(1, 'Krisna Futsal', 'jalan baladwa gang 2 no i30B', 2, 1, 0, 0, 1),
(8, 'testing2', 'bandung2', 11, 1, 0, 0, 2),
(10, 'adsads', 'jlkjklj', 19, 1, 5345650, 6786880, 1);

-- --------------------------------------------------------

--
-- Table structure for table `provider_fasilitas`
--

CREATE TABLE IF NOT EXISTS `provider_fasilitas` (
  `id` int(11) NOT NULL,
  `id_provider` int(10) unsigned NOT NULL,
  `id_fasilitas` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provider_fasilitas`
--

INSERT INTO `provider_fasilitas` (`id`, `id_provider`, `id_fasilitas`) VALUES
(1, 8, 123),
(2, 8, 124),
(3, 8, 126),
(8, 10, 127),
(9, 1, 123),
(10, 1, 124),
(11, 1, 126);

-- --------------------------------------------------------

--
-- Table structure for table `provider_gallery`
--

CREATE TABLE IF NOT EXISTS `provider_gallery` (
  `id` int(10) unsigned NOT NULL,
  `foto` varchar(100) NOT NULL,
  `id_provider` int(10) unsigned NOT NULL,
  `is_display_picture` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provider_gallery`
--

INSERT INTO `provider_gallery` (`id`, `foto`, `id_provider`, `is_display_picture`) VALUES
(4, 'add-icon.png', 8, 0),
(5, 'book.png', 8, 0),
(7, 'close_blue.png', 8, 0),
(8, 'add-icon.png', 1, 0),
(12, 'file_add.png', 10, 0),
(16, '067861-3d-glossy-blue-orb-icon-alphanumeric-crossing.png', 1, 1),
(17, 'book.png', 1, 0),
(19, 'file_add.png', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE IF NOT EXISTS `provinsi` (
  `provinsi_id` int(10) NOT NULL,
  `provinsi_nama` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`provinsi_id`, `provinsi_nama`) VALUES
(1, 'Nanggroe Aceh Darussalam'),
(2, 'Sumatera Utara'),
(3, 'Sumatera Barat'),
(4, 'Riau'),
(5, 'Kepulauan Riau'),
(6, 'Kepulauan Bangka-Belitung'),
(7, 'Jambi'),
(8, 'Bengkulu'),
(9, 'Sumatera Selatan'),
(10, 'Lampung'),
(11, 'Banten'),
(12, 'DKI Jakarta'),
(13, 'Jawa Barat'),
(14, 'Jawa Tengah'),
(15, 'Daerah Istimewa Yogyakarta  '),
(16, 'Jawa Timur'),
(17, 'Bali'),
(18, 'Nusa Tenggara Barat'),
(19, 'Nusa Tenggara Timur'),
(20, 'Kalimantan Barat'),
(21, 'Kalimantan Tengah'),
(22, 'Kalimantan Selatan'),
(23, 'Kalimantan Timur'),
(24, 'Gorontalo'),
(25, 'Sulawesi Selatan'),
(26, 'Sulawesi Tenggara'),
(27, 'Sulawesi Tengah'),
(28, 'Sulawesi Utara'),
(29, 'Sulawesi Barat'),
(30, 'Maluku'),
(31, 'Maluku Utara'),
(32, 'Papua Barat'),
(33, 'Papua'),
(34, 'Kalimantan Utara');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `kode_transaksi` varchar(10) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `tgl_sewa` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selsai` time NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `id_lapang` int(10) unsigned NOT NULL,
  `id_customer` int(10) unsigned zerofill NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'krisna', 'kfebrianto96@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', 1),
(2, 'febraintop', 'kfebrianto98@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', 2),
(11, 'testing2', 'kfebrianto2016@gmail.com', '938b4263f09b8b1dae8f027d06681ec9', 2),
(12, 'testing2', 'kfebrianto2@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', 3),
(15, 'testing', 'admin@gie-art.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3),
(19, 'adsa', 'dasa@ads', 'a8f5f167f44f4964e6c998dee827110c', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `user_login_id` (`user_login_id`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `lapang`
--
ALTER TABLE `lapang`
  ADD PRIMARY KEY (`id_lapang`),
  ADD UNIQUE KEY `id_lapang` (`id_lapang`),
  ADD KEY `id_provider` (`id_provider`);

--
-- Indexes for table `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`id_provider`),
  ADD KEY `user_login_id` (`user_login_id`),
  ADD KEY `provinsi_id` (`provinsi_id`);

--
-- Indexes for table `provider_fasilitas`
--
ALTER TABLE `provider_fasilitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_provider` (`id_provider`),
  ADD KEY `id_fasilitas` (`id_fasilitas`);

--
-- Indexes for table `provider_gallery`
--
ALTER TABLE `provider_gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_provider` (`id_provider`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`provinsi_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kode_transaksi`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_lapang` (`id_lapang`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=132;
--
-- AUTO_INCREMENT for table `lapang`
--
ALTER TABLE `lapang`
  MODIFY `id_lapang` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `provider`
--
ALTER TABLE `provider`
  MODIFY `id_provider` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `provider_fasilitas`
--
ALTER TABLE `provider_fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `provider_gallery`
--
ALTER TABLE `provider_gallery`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `provinsi_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk_user_login_id` FOREIGN KEY (`user_login_id`) REFERENCES `user_login` (`id`);

--
-- Constraints for table `lapang`
--
ALTER TABLE `lapang`
  ADD CONSTRAINT `fk_lapang_provider` FOREIGN KEY (`id_provider`) REFERENCES `provider` (`id_provider`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `provider`
--
ALTER TABLE `provider`
  ADD CONSTRAINT `fk_provider_user_login` FOREIGN KEY (`user_login_id`) REFERENCES `user_login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_provinsi_id` FOREIGN KEY (`provinsi_id`) REFERENCES `provinsi` (`provinsi_id`);

--
-- Constraints for table `provider_fasilitas`
--
ALTER TABLE `provider_fasilitas`
  ADD CONSTRAINT `fk_fasilitas` FOREIGN KEY (`id_fasilitas`) REFERENCES `fasilitas` (`id_fasilitas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fasilitas_provider` FOREIGN KEY (`id_provider`) REFERENCES `provider` (`id_provider`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `provider_gallery`
--
ALTER TABLE `provider_gallery`
  ADD CONSTRAINT `fk_provider_gallery` FOREIGN KEY (`id_provider`) REFERENCES `provider` (`id_provider`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_transaksi_customer` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transaksi_lapang` FOREIGN KEY (`id_lapang`) REFERENCES `lapang` (`id_lapang`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
