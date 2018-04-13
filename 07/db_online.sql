-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 08, 2015 at 11:21 
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE IF NOT EXISTS `alamat` (
  `id_alamat` int(11) NOT NULL AUTO_INCREMENT,
  `id_pesan` int(11) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  PRIMARY KEY (`id_alamat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`id_alamat`, `id_pesan`, `no_hp`, `provinsi`, `kota`, `kecamatan`, `alamat`) VALUES
(2, 2, '+62857234922', 'Banten', 'tangerang selatan', 'ciputat', 'jl. palapa');

-- --------------------------------------------------------

--
-- Table structure for table `label`
--

CREATE TABLE IF NOT EXISTS `label` (
  `id_label` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(50) NOT NULL,
  PRIMARY KEY (`id_label`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `label`
--

INSERT INTO `label` (`id_label`, `label`) VALUES
(1, 'camera & video'),
(2, 'Pakaian'),
(3, 'Peralatan Komputer'),
(4, 'Perlengkapan Bayi');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_pesan` int(11) NOT NULL,
  `nama_pengirim` varchar(50) NOT NULL,
  `no_rek` varchar(50) NOT NULL,
  `nominal` varchar(50) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `status` enum('belum cek','sudah cek') NOT NULL,
  `struk` varchar(200) NOT NULL,
  PRIMARY KEY (`id_pembayaran`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_user`, `id_pesan`, `nama_pengirim`, `no_rek`, `nominal`, `bank`, `status`, `struk`) VALUES
(2, 2, 2, 'rano muhamad', '14123471', '3000000', 'Bank Central Asia (BCA)', 'sudah cek', 'struk/kategori_banner.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
  `id_pesan` int(11) NOT NULL AUTO_INCREMENT,
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `status` enum('belum cek','sudah cek') NOT NULL,
  `ris` varchar(14) NOT NULL,
  PRIMARY KEY (`id_pesan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_produk`, `id_user`, `jumlah`, `total`, `tgl_pesan`, `status`, `ris`) VALUES
(2, 7, 2, 1, 2534534, '2015-05-08', 'sudah cek', '08052015044800');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(100) NOT NULL,
  `foto_produk` varchar(200) NOT NULL,
  `id_label` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `tgl_input` int(11) NOT NULL,
  `best_produk` enum('ya','tidak') NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `foto_produk`, `id_label`, `stok`, `harga`, `tgl_input`, `best_produk`, `deskripsi`) VALUES
(7, 'GoPro Hero 4 Silver Edition - 12 MP', 'gambar/nikon.jpg', 1, 23, 400000, 2015, 'ya', 'Spesifikasi\r\n12 MP\r\nFeatures 1080p60 and 720p120 video\r\nBuilt-in Wi-Fi and BluetoothÂ®, and Protuneâ„¢ for photos and video\r\nWaterproof to 131â€™ (40m)\r\nTouchscreen\r\n\r\nDetail produk\r\n\r\nGOPRO kembali memperkenalkan produk terbaru ActionCam dengan menghadirkan GOPRO HERO 4 SILVER. ActionCam ini merupakan produk GOPRO pertama yang memiliki fitur layar sentuh. Mengubah pengaturan kamera, membidik gambar, hingga memutar kembali video yang Anda rekam kini akan lebih mudah karena Anda hanya perlu melakukan tap atau swipe pada layarnya. GOPRO HERO 4 SILVER dapat merekam video dengan kualitas HD 1080p dan 720p dan ketajaman gambar yang luar biasa. Ditambah lagi dengan dibenamkannya kamera 12 Megapixel, ActionCam ini dapat mengambil gambar dengan kecepatan tinggi hingga 30 fps. Fitur lainnya yang ikut mendampingi ActionCam ini adalah fitur HiLight Tag yang memudahkan Anda untuk menandai momen terbaik dalam seluruh durasi video Anda. Selain tangguh digunakan di darat, GOPRO HERO 4 SILVER juga cukup tangguh digunakan di dalam air. ActionCam ini dapat Anda gunakan di dalam air pada kedalaman hingga 40 meter.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `name`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'john cena', 'super admin'),
(2, 'rano', 'e0ef6defcf8b8a0869df7e068cd100f0', 'rano muhamad', 'member'),
(3, 'adi', 'c46335eb267e2e1cde5b017acb4cd799', 'adi', 'member'),
(4, 'ea', '5b344ac52a0192941b46a8bf252c859c', 'ea', 'member'),
(5, 'admin2', 'c84258e9c39059a89ab77d846ddab909', 'mysterio', 'admin'),
(6, 'yoo', 'a95b429d7a93263081a83b9bf7c9f7e3', 'yohanes tri putra', 'admin');
