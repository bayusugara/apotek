-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2017 at 10:31 PM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek`
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
  `foto` varchar(50) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `tgl_lahir` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama`, `alamat`, `no_tlp`, `user_login_id`, `status`, `foto`, `jk`, `tgl_lahir`) VALUES
(0000000001, 'Krisna2', 'jalan baladewa2', '12038209d', 12, 1, '', '', '0000-00-00'),
(0000000004, 'testing', '2701 S Bayshore Dr, Miami, FL', '138u13098', 15, 1, '15.png', '', '0000-00-00'),
(0000000006, 'Testing', 'askkasdl', '10923890', 0, 1, '', 'l', '1995-05-04');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE IF NOT EXISTS `detail_transaksi` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `jumlah_bayar` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id`, `id_transaksi`, `id_obat`, `total`, `jumlah_bayar`) VALUES
(1, 'TRX00000123', 1, 2, 3000),
(2, 'TRX00000123', 2, 2, 3000),
(5, 'TRX024738', 1, 3, 4500),
(6, 'TRX024738', 2, 2, 3000),
(7, 'TRX033533', 1, 2, 3000),
(8, 'TRX033848', 1, 3, 4500),
(9, 'TRX034341', 1, 500, 750000),
(10, 'TRX034453', 2, 500, 750000);

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
-- Table structure for table `obat`
--

CREATE TABLE IF NOT EXISTS `obat` (
  `id_obat` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` varchar(250) NOT NULL,
  `stok` int(11) NOT NULL,
  `produsen` int(5) NOT NULL,
  `kategori` int(11) NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama`, `deskripsi`, `stok`, `produsen`, `kategori`, `harga`) VALUES
(1, 'Paracetamol', 'obat panas', 1497, 2, 2, 1500),
(2, 'Ranitidin', 'Obat Maag', 1500, 2, 3, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `id_pegawai` int(11) unsigned zerofill NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `no_hp` varchar(16) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jabatan` int(11) NOT NULL,
  `user_login_id` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `jk` varchar(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `alamat`, `no_hp`, `email`, `jabatan`, `user_login_id`, `status`, `jk`) VALUES
(00000000001, 'krisna', 'tesiting', '123809238', 'kfebrianto2015@gmail.com', 2, 25, 1, 'l'),
(00000000002, 'apoteker', 'jalan apoteker', '09123823', 'kfebrianto2017@gmail.com', 3, 26, 1, 'l'),
(00000000003, 'pemilik', 'pemilik ', '12938910238', 'kfebrianto2018@gmail.com', 1, 27, 1, 'l');

-- --------------------------------------------------------

--
-- Table structure for table `produsen`
--

CREATE TABLE IF NOT EXISTS `produsen` (
  `id_produsen` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produsen`
--

INSERT INTO `produsen` (`id_produsen`, `nama`, `alamat`) VALUES
(2, 'Sanbe', 'Jln . Leuwi Gajah no 50 cimahi selatan');

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
  `provinsi_id` int(11) NOT NULL,
  `jam_buka` tinyint(2) DEFAULT '8',
  `jam_tutup` tinyint(2) DEFAULT NULL,
  `no_rek` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`id_provider`, `nama`, `lokasi`, `user_login_id`, `status`, `longitude`, `latitude`, `provinsi_id`, `jam_buka`, `jam_tutup`, `no_rek`) VALUES
(1, 'Krisna Futsal', 'jalan baladwa gang 2 no i30B', 2, 1, 0, 0, 1, 8, 22, ''),
(8, 'testing2', 'bandung2', 11, 1, 0, 0, 2, 8, 22, ''),
(10, 'adsads', 'jlkjklj', 19, 1, 5345650, 6786880, 1, 8, 21, '');

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
(7, 'close_blue.png', 8, 1),
(8, 'lapang-futsal.png', 1, 0),
(12, 'usaha-lapangan-futsal.png', 10, 1),
(16, 'lapangan futsal.png', 1, 1),
(17, '86d71b26214bd5005ff3ca692c3cde94.png', 1, 0),
(19, '86d71b26214bd5005ff3ca692c3cde94.png', 1, 0);

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
  `kode_transaksi` varchar(50) NOT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `tgl_sewa` date NOT NULL,
  `tgl_main` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selsai` time NOT NULL,
  `total_bayar` int(11) NOT NULL DEFAULT '0',
  `id_lapang` int(10) unsigned NOT NULL,
  `id_customer` int(10) unsigned zerofill NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`kode_transaksi`, `tgl_transaksi`, `tgl_sewa`, `tgl_main`, `jam_mulai`, `jam_selsai`, `total_bayar`, `id_lapang`, `id_customer`, `status`) VALUES
('TR001', '2016-11-11', '2016-12-23', '2016-12-23', '08:00:00', '10:00:00', 0, 4, 0000000001, 0),
('TR002', '2016-11-09', '2016-12-25', '2016-12-25', '08:00:00', '10:00:00', 0, 5, 0000000001, 0),
('TR003', '2016-11-09', '2016-12-24', '2016-12-24', '11:00:00', '12:00:00', 0, 4, 0000000001, 0),
('TRX000000000111846', NULL, '2016-12-28', '2016-12-28', '08:00:00', '09:00:00', 0, 11, 0000000001, 0),
('TRX00000000014210', NULL, '2016-12-25', '2016-12-25', '14:00:00', '16:00:00', 0, 4, 0000000001, 0),
('TRX00000000014613', NULL, '2016-12-27', '2016-12-28', '08:00:00', '10:00:00', 0, 4, 0000000001, 0),
('TRX00000000014852', NULL, '2016-12-25', '2016-12-25', '19:00:00', '21:00:00', 0, 4, 0000000001, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_obat`
--

CREATE TABLE IF NOT EXISTS `transaksi_obat` (
  `id` varchar(11) NOT NULL,
  `id_pegawai` int(11) unsigned zerofill NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `tipe` int(11) NOT NULL,
  `id_pembeli` int(11) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `pengirim` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_obat`
--

INSERT INTO `transaksi_obat` (`id`, `id_pegawai`, `tgl_transaksi`, `tipe`, `id_pembeli`, `jumlah`, `pengirim`) VALUES
('TRX00000123', 00000000001, '2017-01-12', 1, NULL, 6000, NULL),
('TRX024738', 00000000001, '2017-01-05', 1, 0, 7500, NULL),
('TRX033533', 00000000001, '2017-01-05', 1, 0, 3000, NULL),
('TRX033848', 00000000001, '2017-01-05', 1, 0, 4500, NULL),
('TRX034341', 00000000001, '2017-01-05', 2, NULL, 750000, 'Ujang'),
('TRX034453', 00000000001, '2017-01-05', 2, NULL, 750000, 'Juni');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(1) NOT NULL,
  `jabatan` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `username`, `email`, `password`, `role`, `jabatan`) VALUES
(1, 'krisna', 'kfebrianto96@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', 1, 0),
(2, 'febraintop', 'kfebrianto98@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', 2, 0),
(11, 'testing2', 'kfebrianto2016@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', 2, 0),
(12, 'testing2', 'kfebrianto2@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', 3, 0),
(15, 'testing', 'admin@gie-art.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, 0),
(19, 'adsa', 'dasa@ads', 'a8f5f167f44f4964e6c998dee827110c', 2, 0),
(20, 'testing', 'kfebrianto22@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', 2, 0),
(21, 'alskdmakd', 'asd@asd', 'a8f5f167f44f4964e6c998dee827110c', 2, 0),
(22, 'asdasd', 'asdasd@asdasd', 'a8f5f167f44f4964e6c998dee827110c', 2, 0),
(24, 'asdasd', 'asddsa@asddas', 'a8f5f167f44f4964e6c998dee827110c', 1, 0),
(25, 'krisna', 'kfebrianto2015@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', 1, 2),
(26, 'kasir', 'kfebrianto2017@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', 1, 3),
(27, 'testing', 'kfebrianto2018@gmail.com', 'ae2b1fca515949e5d54fb22b8ed95575', 1, 1);

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
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_obat` (`id_obat`);

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
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `produsen`
--
ALTER TABLE `produsen`
  ADD PRIMARY KEY (`id_produsen`);

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
-- Indexes for table `transaksi_obat`
--
ALTER TABLE `transaksi_obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pegawai` (`id_pegawai`);

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
  MODIFY `id_customer` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
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
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `produsen`
--
ALTER TABLE `produsen`
  MODIFY `id_produsen` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
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
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `fk_detail_trans_obat` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transkaksi` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi_obat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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

--
-- Constraints for table `transaksi_obat`
--
ALTER TABLE `transaksi_obat`
  ADD CONSTRAINT `fk_pegawai_transaksi` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
