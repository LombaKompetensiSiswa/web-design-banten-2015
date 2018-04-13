-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 08, 2015 at 10:34 
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `transaksi`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE IF NOT EXISTS `author` (
  `id_author` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `foto` text NOT NULL,
  `ket` varchar(255) NOT NULL,
  `konfirmasi` varchar(255) NOT NULL,
  PRIMARY KEY (`id_author`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id_author`, `nama`, `email`, `pass`, `foto`, `ket`, `konfirmasi`) VALUES
(1, 'ADMIN', 'admin@yahoo.com', '123', 'img/Penguins.jpg', 'Tidak Aktif', 'Yes'),
(2, 'USER', 'user@yahoo.com', '07', 'img/Jellyfish.jpg', 'Tidak Aktif', 'Yes'),
(3, 'GUEST', 'guest@yahoo.com', '123', 'img/Desert.jpg', 'Tidak Aktif', 'Yes'),
(4, 'Pengunjung', 'julio@yahoo.com', '98', 'img/Tulips.jpg', 'Tidak Aktif', 'Yes'),
(5, 'a', 'a@yahoo.com', 'a', 'img/Hydrangeas.jpg', 'Tidak Aktif', 'No'),
(6, 'USER', 'user@yahoo.com', '17', 'img/Tulips.jpg', 'Tidak Aktif', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `spesifikasi` varchar(255) NOT NULL,
  `suka` int(11) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_kategori`, `nama_barang`, `harga`, `gambar`, `spesifikasi`, `suka`) VALUES
(1, 3, 'Kereta Bayi', 80000, 'img/kereta-dorong-bayi.jpg', 'Kereta Bayi', 0),
(2, 3, 'Popok Bayi', 10000, 'img/mamypoko-popok-pants.jpg', 'Popok Bayi', 0),
(3, 1, 'Printer', 100000, 'img/canon_printer.jpg', 'Printer', 1),
(4, 1, 'Laptop Asus', 500000, 'img/asus_laptop.jpg', 'Laptop Asus', 5),
(5, 2, 'Jacket', 50000, 'img/switer-hoddie.jpg', 'Jacket', 3),
(6, 2, 'Ransel', 70000, 'img/polo-ransel.jpg', 'Ransel', 2),
(7, 4, 'asdsad', 213123123, 'img/Hydrangeas.jpg', 'asdasdasdasdasdasdasdasd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `categori` varchar(255) NOT NULL,
  `sampul` text NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `categori`, `sampul`) VALUES
(1, 'Peralatan Komputer', 'img/apple_imac.jpg'),
(2, 'Pakaian', 'img/keep-doing-good.jpg'),
(3, 'Perlengakapan Bayi', 'img/kiddy-baby-set.jpg'),
(4, 'asdasd', 'img/Jellyfish.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
  `id_pembelian` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) NOT NULL,
  `id_author` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  PRIMARY KEY (`id_pembelian`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_barang`, `id_author`, `id_status`, `tanggal`) VALUES
(1, 4, 2, 2, '08-05-2015'),
(2, 5, 2, 2, '08-05-2015'),
(4, 4, 3, 2, '08-05-2015'),
(5, 5, 3, 2, '08-05-2015'),
(6, 4, 4, 2, '08-05-2015'),
(7, 6, 3, 1, '08-05-2015'),
(8, 6, 3, 1, '08-05-2015'),
(9, 3, 3, 0, '08-05-2015');
