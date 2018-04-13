-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 08, 2015 at 10:16 
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
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `banner`
--


-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_product` int(4) NOT NULL,
  `code_access` int(4) NOT NULL,
  `total` int(4) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `code_product`, `code_access`, `total`, `date`) VALUES
(35, 6, 591, 2, '2015-05-08 14:59:32'),
(36, 5, 591, 1, '2015-05-08 14:59:23');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `link` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `description`, `link`) VALUES
(1, 'Camera & Video', 'This category for camera items', 'camera'),
(3, 'Shirt', 'For shirt item', 'shirt'),
(4, 'Sweetshirt', 'for sweetshirt item', 'sweetshirt'),
(5, 'bag', 'for bag item', 'bag'),
(6, 'add', 'title', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id_product` int(4) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `stok` int(4) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `id_category` int(4) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `title`, `stok`, `description`, `price`, `image`, `id_category`, `date`) VALUES
(1, 'Nikon D5300 Kit 18-55 VR II - Hitam', 100, 'Nikon D5300 Kit 18-55 VR II - Hitamlorem ipsum', '6975000', 'nikon.jpg', 1, '2015-05-08 15:04:14'),
(2, 'Nike GS Slim Polo League 652447-032', 105, 'Nike GS Slim Polo League 652447-032', '379050', 'nike-slim-polo.jpg', 3, '2015-05-08 09:58:21'),
(3, 'Fujifilm Camera', 108, 'Fujifilm Camera', '500000', 'fujifilm.jpg', 1, '2015-05-08 09:58:28'),
(4, 'Tas baru', 50, 'blabla', '340000', 'sling-bag-cokelat.jpg', 5, '2015-05-08 11:22:29'),
(5, 'tes baju', 44, 'Maecenas odio dolor, vulputate vel, auctor ac, accumsan id, felis. Pellentesque cursus sagittis felis. Pellentesque porttitor, velit lacinia egestas auctor, diam eros tempus arcu, nec vulputate augue magna vel risus. Cras non magna vel ante adipiscing rhoncus. Vivamus a mi. Morbi neque. Aliquam erat volutpat.', '345000', 'keep-doing-good.jpg', 3, '2015-05-08 11:22:58'),
(6, 'jaket', 6, 'Maecenas odio dolor, vulputate vel, auctor ac, accumsan id, felis. Pellentesque cursus sagittis felis. Pellentesque porttitor, velit lacinia egestas auctor, diam eros tempus arcu, nec vulputate augue magna vel risus. Cras non magna vel ante adipiscing rhoncus. Vivamus a mi. Morbi neque. Aliquam erat volutpat.', '500000', 'switer-hoddie.jpg', 4, '2015-05-08 11:23:14');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_product` int(4) NOT NULL,
  `kode_transaksi` int(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `code_product`, `kode_transaksi`, `name`, `email`, `method`, `address`, `date`) VALUES
(5, 0, 233, 'abi fauzan', 'abay@gmail.com', 'cash', 'di tangerang', '2015-05-08 14:17:56'),
(6, 6, 345, 'q', 'abay@gmail.com', 'cash', 'aas', '2015-05-08 14:18:11'),
(7, 0, 290, 'abi', 'abay@gmail.com', 'cash', 'tes', '2015-05-08 14:59:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `password_real` varchar(100) NOT NULL,
  `fullname` text NOT NULL,
  `level` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `password_real`, `fullname`, `level`) VALUES
(1, 'admin', '60eb0f73e33ce3ffd4e51d974447db53', 'admi', 'admin ganteng', 'admin'),
(2, 'abi', '19a9228dbbbe3b613190002e54dc3429', 'abi', 'abi fauzan', 'member'),
(5, 'aaabbb', '6547436690a26a399603a7096e876a2d', 'aaabbb', 'aaabbb', 'member'),
(10, 'abai', '2cf2588ddb822839cde47243d8e29b4a', '1', 'abai f', 'member'),
(13, 'tes', '28b662d883b6d76fd96e4ddc5e9ba780', 'tes', 'testing', 'member'),
(14, 'a', '0cc175b9c0f1b6a831c399e269772661', 'b', 'dfg', 'member'),
(15, 'abi', '202cb962ac59075b964b07152d234b70', '123', 'abi f', 'admin');
