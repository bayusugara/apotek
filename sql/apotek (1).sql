-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2017 at 10:38 PM
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
-- Constraints for table `transaksi_obat`
--
ALTER TABLE `transaksi_obat`
  ADD CONSTRAINT `fk_pegawai_transaksi` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
