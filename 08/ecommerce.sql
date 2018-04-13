-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 08, 2015 at 11:26 
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `idadmin` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `nama`, `email`, `username`, `password`) VALUES
(1, 'M Supian Sauri ET', 'rakasauri135@gmail.com', 'Sauri', 's');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `idbarang` int(11) NOT NULL AUTO_INCREMENT,
  `namabarang` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `harga` double NOT NULL,
  `deskripsi` text NOT NULL,
  `idtoko` int(11) NOT NULL,
  `idkategori` int(11) NOT NULL,
  `stok` varchar(50) NOT NULL,
  PRIMARY KEY (`idbarang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`idbarang`, `namabarang`, `gambar`, `harga`, `deskripsi`, `idtoko`, `idkategori`, `stok`) VALUES
(1, 'Asus X450CA', 'gambar/Asus X450CA.jpg', 4000000, 'Laptop Asus Dijual Bisa Nego Seken', 1, 2, '4'),
(2, 'Ransel Hitam', 'gambar/Ransel Hitam.jpg', 200000, 'Tas Ransel Hitam Dijual ', 1, 1, '8'),
(3, 'DSLR', 'gambar/DSLR.jpg', 3000000, 'Kamera DSLR Canon ', 1, 3, '7');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `idkategori` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(50) NOT NULL,
  PRIMARY KEY (`idkategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idkategori`, `kategori`) VALUES
(1, 'Pakaian'),
(2, 'Peralatan Komputer'),
(3, 'Kamera Dan Video');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `idmember` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(40) NOT NULL,
  `jk` char(1) NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`idmember`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`idmember`, `nama`, `jk`, `alamat`, `tlp`, `email`, `username`, `password`) VALUES
(1, 'zidan', 'L', 'kdbanen ', '087773904884', 'zidan@zidan.com', 'Zidan', 'z');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
  `idpembelian` int(11) NOT NULL AUTO_INCREMENT,
  `idbarang` int(11) NOT NULL,
  `idtoko` int(11) NOT NULL,
  `idmember` int(11) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `tgl` date NOT NULL,
  PRIMARY KEY (`idpembelian`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`idpembelian`, `idbarang`, `idtoko`, `idmember`, `jumlah`, `tgl`) VALUES
(1, 0, 1, 1, 0, '2015-05-08'),
(2, 0, 1, 1, 4, '2015-05-08'),
(3, 0, 1, 1, 5, '2015-05-08');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE IF NOT EXISTS `toko` (
  `idtoko` int(11) NOT NULL AUTO_INCREMENT,
  `namatoko` varchar(50) NOT NULL,
  `namapemilik` varchar(50) NOT NULL,
  `alamattoko` text NOT NULL,
  `alamatpemilik` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`idtoko`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`idtoko`, `namatoko`, `namapemilik`, `alamattoko`, `alamatpemilik`, `email`, `username`, `password`) VALUES
(1, 'PT Nusantara', 'Himawari Bolt', 'jln Amd km 04 kadubanen Pandeglang ', 'Rangkasbitung', 'hima@info.com', 'Himawari', 'h'),
(2, 'PT Kembang Gula', 'zainal', 'jln merak', 'jln Merak', 'zainal@gmail.com', 'zainal', 'l');
