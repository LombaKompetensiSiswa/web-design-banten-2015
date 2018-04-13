-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 07, 2015 at 11:29 
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `onlineshop`
--
CREATE DATABASE `onlineshop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `onlineshop`;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `kd_brg` char(5) NOT NULL,
  `nm_brg` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `foto` char(10) NOT NULL,
  `kd_kategori` char(5) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl` date NOT NULL,
  PRIMARY KEY (`kd_brg`),
  KEY `kd_kategori` (`kd_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_brg`, `nm_brg`, `harga`, `jumlah`, `foto`, `kd_kategori`, `deskripsi`, `tgl`) VALUES
('B01', 'Mayonette Bryan Sling Bag - Cokelat', 28990, 64, 'image/jpeg', 'P01', 'Spesifikasi\r\nSling\r\nTutup Magnet\r\nPanjang tali dapat disesuaikan\r\nCocok untuk kegiatan sehari hari\r\n\r\nDetail Produk\r\nMayonette, brand lokal yang menyediakan beragam produk fashion yang terbaik.Mayonette Bryan Sling - Coklat terbuat dari bahan berkualitas, desain dengan model yang simple, namun Anda akan tetap terlihat fashionable dan terlihat lebih menarik ketika memakainya. Sangat cocok bagi Anda yang mempunyai segudang aktivitas, baik itu aktivitas yang dilakukan di dalam ruangan maupun di luar ruangan. Desain yang praktis dan simple, membuat Mayonette Bryan Sling - Coklat menjadi pilihan bagi banyak orang, khususnya bagi kalangan yang berjiwa muda yang menyukai hidup yang mengingkan kemudahan.Mayonette Bryan Sling - Coklat memiliki warna menarik pada tampilan luar dan lapisan dalam tas ransel tersebut, membuat Anda mudah dalam mencari peralatan yang ukurannya sangat kecil. Tas Mayonette terbuat dan dilapisi dengan bahan berkualitas, yaitu terbuat dari bahan kulit sintetis yang dapat membuat Anda lebih nyaman saat sedang menggunakan dan membuat tas ini menjadi lebih tahan lama.\r\n', '2015-05-07'),
('S01', 'bla', 230000, 64, 'image/jpeg', 'P01', 'sasa', '2015-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `kd_kategori` char(5) NOT NULL,
  `nm_kategori` varchar(50) NOT NULL,
  PRIMARY KEY (`kd_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kd_kategori`, `nm_kategori`) VALUES
('P01', 'Pakaian');

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE IF NOT EXISTS `pembeli` (
  `ktp` char(11) NOT NULL,
  `nm_pembeli` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` char(12) NOT NULL,
  `kd_brg` char(5) NOT NULL,
  KEY `kd_brg` (`kd_brg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pembeli`
--


-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `uid` char(5) NOT NULL,
  `kd_brg` char(5) NOT NULL,
  `jml` int(11) NOT NULL,
  KEY `uid` (`uid`),
  KEY `kd_brg` (`kd_brg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`uid`, `kd_brg`, `jml`) VALUES
('291', 'B01', 11),
('291', 'S01', 12),
('12', 'B01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` char(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usergroup` int(1) NOT NULL,
  `nm_lengkap` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` char(12) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `username`, `password`, `usergroup`, `nm_lengkap`, `alamat`, `no_tlp`) VALUES
('1', 'Admin', '900150983cd24fb0d6963f7d28e17f72', 1, '', '', ''),
('12', 'asa', '3847820138564525205299f1f444c5ec', 2, 'wew', 'wew', '2'),
('291', 'test', '098f6bcd4621d373cade4e832627b4f6', 2, 'test', 'test', '1212');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`kd_kategori`) REFERENCES `kategori` (`kd_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`kd_brg`) REFERENCES `barang` (`kd_brg`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;
