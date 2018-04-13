-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 08, 2015 at 10:59 
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
('B03', 'Mayonette Bryan Sling Bag - Cokelat', 28990, 20, 'image/jpeg', 'P01', 'Spesifikasi\r\nSling\r\nTutup Magnet\r\nPanjang tali dapat disesuaikan\r\nCocok untuk kegiatan sehari hari\r\n\r\nDetail Produk\r\nMayonette, brand lokal yang menyediakan beragam produk fashion yang terbaik.Mayonette Bryan Sling - Coklat terbuat dari bahan berkualitas, desain dengan model yang simple, namun Anda akan tetap terlihat fashionable dan terlihat lebih menarik ketika memakainya. Sangat cocok bagi Anda yang mempunyai segudang aktivitas, baik itu aktivitas yang dilakukan di dalam ruangan maupun di luar ruangan. Desain yang praktis dan simple, membuat Mayonette Bryan Sling - Coklat menjadi pilihan bagi banyak orang, khususnya bagi kalangan yang berjiwa muda yang menyukai hidup yang mengingkan kemudahan.Mayonette Bryan Sling - Coklat memiliki warna menarik pada tampilan luar dan lapisan dalam tas ransel tersebut, membuat Anda mudah dalam mencari peralatan yang ukurannya sangat kecil. Tas Mayonette terbuat dan dilapisi dengan bahan berkualitas, yaitu terbuat dari bahan kulit sintetis yang dapat membuat Anda lebih nyaman saat sedang menggunakan dan membuat tas ini menjadi lebih tahan lama.\r\n', '2015-05-07'),
('P1', 'asas', 19000, 100, 'image/jpeg', 'P01', 'asasa', '2015-05-08'),
('w1', 'JersiClothing Hoodie Chicago White Sox - Abu-Abu', 230000, 88, 'image/jpeg', 'P01', 'Spesifikasi\r\nSporty, Trendy & Casual\r\nCocok di segala suasana\r\n100% cotton fleece\r\nVelvet/flock printing\r\nCustom-Made\r\n\r\n\r\nDetail produk\r\n\r\nProduk ini  menggunakan bahan dari kualitas terbaik. Merupakan produk asli Indonesia, dengan desain yang sangat fashionable dan modis. Menggunakan bahan berkualitas baik dengan harga yang sangat terjangkau. Sangat cocok dipadupadankan dengan produk fashion lainnya. Cocok digunakan dalam berbagai acara dan aktivitas. Dapat digunakan oleh pria maupun wanita. Bahan sweater terbuat dari cotton fleece 100% berkualitas tinggi. Tebal, lembut, halus, nyaman dan menghangatkan. Bahan sablon terbuat dari velvet/flock timbul yang lentur, tebal, timbul, fleksibel, dan tidak akan pecah/rusak/luntur meski dicuci/disetrika berkali-kali. Tersedia dalam ukuran S, M, L, XL, XXL.\r\n\r\nESTIMASI SIZE:\r\nS (Lebar Dada 46 cm; Tinggi 56 cm); M (Lebar Dada 50 cm; Tinggi 60 cm); L (Lebar Dada 54 cm; Tinggi 64 cm); XL (Lebar Dada 58cm; Tinggi 68cm) ; XXL (Lebar Dada 62 cm; Tinggi 72 cm)\r\n', '2015-05-08');

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
  `nm_pembeli` varchar(50) NOT NULL,
  `email_pembeli` varchar(50) NOT NULL,
  `nm_penerima` varchar(50) NOT NULL,
  `alamat_penerima` text NOT NULL,
  `bank` char(10) NOT NULL,
  `no_rek` char(12) NOT NULL,
  `jml` int(11) NOT NULL,
  `jumlah_harga` float NOT NULL,
  `ttgl` date NOT NULL,
  KEY `uid` (`uid`),
  KEY `kd_brg` (`kd_brg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`uid`, `kd_brg`, `nm_pembeli`, `email_pembeli`, `nm_penerima`, `alamat_penerima`, `bank`, `no_rek`, `jml`, `jumlah_harga`, `ttgl`) VALUES
('12', 'B03', 'wew', 'wew', 'wew', 'wew', 'BCA', '123123', 1, 28990, '2015-05-08'),
('999', 'w1', 'ada', 'asa', 'asa', 'asa', 'BNI', '123123', 12, 347880, '2015-05-08');

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
('1', 'Admin', '827ccb0eea8a706c4c34a16891f84e7b', 1, '', '', ''),
('111', 'testttt', '02b1be0d48924c327124732726097157', 2, 'test111', 'sasa', '12121'),
('12', 'asa', '3847820138564525205299f1f444c5ec', 2, 'wew', 'wew', '2'),
('123', 'Admin2', '900150983cd24fb0d6963f7d28e17f72', 1, '', '', ''),
('291', 'test', '098f6bcd4621d373cade4e832627b4f6', 2, 'test', 'test', '1212'),
('999', 'test', '202cb962ac59075b964b07152d234b70', 2, 'test', 'test', '08888888');

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
