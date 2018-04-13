-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 08, 2015 at 11:17 
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vancomp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(1, 'laptop'),
(2, 'pheriperal'),
(3, 'PC'),
(5, 'Printer');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_produk` (`id_produk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `id_user`, `id_produk`, `tanggal`, `status`) VALUES
(1, 4, 2, '2015-05-08', 0),
(6, 5, 1, '2015-05-08', 0),
(8, 5, 2, '2015-05-08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `kategori` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kategori` (`kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `harga`, `stok`, `kategori`, `deskripsi`, `gambar`) VALUES
(1, 'Apple iMac MD094ZA/A Desktop - 21.5', '2500000', 10, 3, 'Spesifikasi\r\nQuad Core i5 2.9ghz (Turbo Boost up to 3.6GHz)\r\n8 GB RAM\r\n1 TB Hard-Drive\r\nNVIDIA GeForce GT650M Graphics with 512MB Dedicated Memory\r\n\r\nDetail  Produk\r\nHadirkan mesin komputasi dengan kemampuan dan kinerja tinggi namun sekaligus bisa mempercantik nilai estetika ruang kerja Anda. Produk komputer desktop produksi Apple ini mampu memenuhi kebutuhan Anda yaitu Apple iMac. Dengan spesifikasi terkini yang mampu mengimbangi kebutuhan komputasi dan hiburan Anda. Menggunakan prosesor Intel Core generasi ketiga, kinerja grafis yang lebih cepat, Thunderbolt, dan port koneksi yang beragam. Semuanya dikemas dalam bentuk yang tipis, memiliki tepi berukuran 5 mm.\r\n\r\nDesain\r\niMac MD094ZA/A memiliki ukuran diagonal layar sebesar 21.5 inci dengan teknologi LED-backlit IPS. Memiliki resolusi 1920 x 1080 piksel. Layar terbaru iMac ini mampu mengurangi 75% refleksi sehingga tampilan menjadi sangat jelas tanpa mengorbankan kualitas warna. Dipersenjatai dengan prosesor Inter Core i5 quad-core dan NVIDIA GeForce GT650M 512 MB GDDR5 mampu menampilkan kualitas grafis yang luar biasa. Pada bagian belakang dilengkapi dengan berbagai port konektivitas seperti port headphone, slot power supply, port Gigabit Ethernet, 2 buah port Thunderbolt, 4 buah port USB 3.0, dan sebuah slot pembaca kartu SD.\r\n\r\nOS X Mountain Lion\r\nMac Mini telah terpasang sistem operasi Apple terbaru yaitu OS X Mountain Lion yang merupakan sistem operasi yang canggih untuk komputer desktop. OS X dirancang kompatibel dengan prosesor Intel terbaru yang mampu memberikan kinerja maksimal. OS X Mountain Lion memiliki aplikasi unggulan yang memberikan pengalaman menarik untuk Anda seperti Mac App Store, Safari, Mail, Messages, Calendar, Contacts, Reminders, Notes, Time Machine, FaceTime, Photo Booth, Game Center, iTunes dan lainnya.\r\n', '1.jpg'),
(2, 'Asus P453MA-WX326B - 2GB RAM - Intel Quad-Core N3540 - 14', '3999000', 5, 1, 'Spesifikasi\r\nProsesor Intel Quad-Core N3540 (2M Cache, 2.16GHz up to 2.66 GHz)\r\nRAM 2GB DDR3\r\nHardisk 500GB; 5400 RPM\r\nLayar LCD 14" HD\r\n\r\n\r\nDetail produk\r\nAsus P453MA-WX326B hadir dengan desain yang kompak dan dikemas dengan layar berukuran 14". Dengan bobot sekitar 2 kg, Asus menyertakan berbagai teknologi yang hanya terdapat pada produknya seperti SonicMaster, Instant On dan juga Ice Cool.\r\n\r\nKinerja Optimal\r\nLaptop ini didukung dengan prosesor Intel Quad-Core N3540 berkecepatan 2.16GHz yang dapat bekerja hingga 2.66GHz, memori RAM 2 GB akan memberikan kemudahan bagi Anda dalam mengerjakan pekerjaan multitasking. Dengan kapasitas penyimpanan 500 GB, Anda memiliki ruang penyimpanan yang cukup besar untuk menyimpan berbagai data berharga Anda.\r\n\r\nAsus SonicMaster\r\nTeknologi terbaru dari Asus yaitu Asus SonicMaster yang digabungkan dengan AudioWizard ASUS yang ekslusif memberikan pengalaman hiburan audio yang menakjubkan. Suara yang lebih besar dan bass yang lebih kaya melalui speaker terintegrasinya menyediakan pengalaman audio yang terbaik dikelasnya.\r\n\r\nInstant On\r\nDibekali dengan kemampuan Instant On dari Asus, Anda tidak perlu menunggu lama saat menghidupkan laptop. Instant On adalah mode Sleep yang dapat langsung menya dalam waktu 3 detik walaupun dalam keadaan Sleep selama lebih dari 21 hari dalam mode baterai.\r\n\r\nTeknologi IceCool\r\nDengan rancangan motherboard dua sisi penghasil panas, jauh dari jangakauan Anda. Dengan heat pipe dan kipas suhu palm rest dan area pengetikan sehingga suhu laptop akan terasa lebih dingin, walaupun digunakan dengan waktu yang lama.\r\n', '2.jpg'),
(3, 'TP-LINK 300Mbps Wireless N Router TL-WR841N - Putih', '270000', 0, 3, 'Spesifikasi\r\n300Mbps\r\n4 port LAN\r\nQoS\r\nMudah digunakan\r\n\r\n\r\nDetail produk\r\n\r\n300Mbps Wireless N Router TL-WR841N adalah gabungan jaringan kabel / nirkabel yang dirancang khusus untuk usaha kecil dan kebutuhan kantor rumah jaringan. Dengan Teknologi MIMO 2T2R, TL-WR841N menciptakan kinerja nirkabel yang luar biasa dan canggih, sehingga ideal untuk streaming video HD, membuat VoIP dan game online. Tombol Quick Setup Security (QSS) pada eksterior yang ramping dan modis memastikan enkripsi WPA2, mencegah jaringan dari intrusi luar.\r\n\r\nKecepatan dan Jangkauan Wireless N\r\nMematuhi standar IEEE 802.11n, TL-WR841N dapat membuat jaringan nirkabel dan mendapatkan hingga 15x kecepatan dan 5X jangkauan produk biasa 11g. Selain itu, dengan tingkat transmisi sampai dengan 300Mbps.\r\nIni menunjukkan kemampuan lebih baik mengurangi kehilangan data pada jarak jauh dan melalui rintangan di kantor kecil atau apartemen besar, bahkan dalam bangunan baja dan beton. Di atas semua, Anda dapat dengan mudah mengambil jaringan nirkabel saat koneksi jarak jauh di mana warisan produk 11g mungkin tidak! Yang juga berarti, router memiliki kecepatan untuk bekerja dengan lancar dengan hampir semua aplikasi bandwidth intensif termasuk VoIP, HD streaming, atau game online, tanpa lag.\r\n\r\nCCA Teknologi - Sinyal Stabil Nirkabel\r\nClear Channel Assessment (CCA) secara otomatis menghindari konflik saluran menggunakan fitur saluran yang jelas pilihan dan sepenuhnya menyadari keuntungan dari saluran yang mengikat, sangat meningkatkan kinerja nirkabel\r\n\r\nWPA / WPA2 Encryptions - Advanced Security\r\nDengan keamanan koneksi WI-FI, enkripsi WEP saat ini bukanlah enkripsi yang terbaik dan paling aman. TL-WR841N menyediakan enkripsi WPA/WPA2 yang dibuat oleh kelompok industri Aliansi WI-FI, mempromosikan interpretabilities dan keamanan untuk WLAN\r\n', '4.jpg'),
(4, 'Seagate Expansion 500GB USB 3.0 2.5" External Harddisk', '665000', 0, 2, 'Spesifikasi<br />\r\n500GB<br />\r\nUsb 3.0 dan usb 2.0<br />\r\n2.5"<br />\r\nPlug and Play<br />\r\n<br />\r\nDetail produk<br />\r\n<br />\r\nPenyimpanan tambahan yang mudah dan dapat dibawa ke mana saja. Hard disk Portabel Seagate Expansion menawarkan solusi yang mudah digunakan ketika Anda ingin menambah penyimpanan seketika pada komputer Anda dan membawa file saat bepergian. Yang Anda lakukan hanyalah cukup menarik file dari desktop ataupun tempat file Anda dan kemudian lepaskanlah di area Hard disk ini. Didayai USB, membuat Hard Disk ini dapat mentransfer data yang cepat dengan konektivitas USB 3.0. Berguna untuk menambah kapasitas penyimpanan Anda seketika.File foto digital, video dan file musik dapat membebani penyimpanan komputer Anda, menyebabkan kinerja menurun karena hard disk internalnya memenuhi kapasitas.<br />\r\n', '554c5ab752d05.jpg'),
(5, 'Canon Printer Pixma MX397 All-in-One - Hitam', '200000', 10, 2, 'Spesifikasi<br />\r\nKecepatan Cetak 8.7ipm<br />\r\n4800 x 1200 dpi<br />\r\nCetak, Fax, Copy, & Scan<br />\r\n<br />\r\nDetail produk<br />\r\nHadir dengan bentuk yang kompak dan kaya fitur, Canon Printer Pixma MX397 All-in-One meningkatkan produktivitas Anda dengan kemampuannya untuk Scan, Copy, Fax, PC Fax dalam satu perangkat. Dengan fitur-fitur mutakhirnya, Canon Printer Pixma MX397 All-in-One menjadi pilihan yang tepat bagi Anda yang membutuhkan printer untuk mendukung produktivitas tinggi Anda.<br />\r\n <br />\r\nKualitas Cetak Optimal<br />\r\nCanon Printer Pixma MX397 All-in-One didukung dengan resolusi 4800 x 1200 dpi untuk memastikan cetakan dengan kualitas yang optimal. Untuk kemampuan cetakannya, printer ini mampu mencetak cepat dengan 8.7ipm untuk dokumen hitam putih dan 5ipm untuk berwarna. Anda juga dapat mencetak foto tanpa tepi ukuran 4 x 6 dengan waktu hanya 46 detik saja.<br />\r\n<br />\r\nTeknologi FINE<br />\r\nCanon Printer Pixma MX397 All-in-One memiliki teknologi FINE (Full-photolithography Inkjet Nozzle) yang meningkatkan produksi warna yang lebih bervariasi. Tak hanya itu, teknologi ini mampu membuat tetesan tinta mikroskopis sekecil 2pl untuk mencetak gambar berkualitas tinggi.<br />\r\n<br />\r\nFitur Fast Front<br />\r\nDengan fitur ini mempermudah Anda saat penggantian tinta dan mempercepat pengisian kertas saat mencetak. Dengan desain inovatif, permasalahan tersebut dapat diatasi dengan Fast Front di mana letak kartrid yang biasanya agak tersembunyi pada printer multifungi dan paper tray yang mudah dijangkau.<br />\r\n<br />\r\nFitur ADF<br />\r\nDengan fitur Automatic Document Feeder (ADF) memungkinkan Anda untuk membuat proses scan, dan menyalin puluhan halaman (hingga 35 halaman) menjadi lebih mudah dan cepat tanpa perlu menunggu.<br />\r\n', '554c7e630aa83.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `Hp` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `email`, `alamat`, `Hp`) VALUES
(1, 'ihvanmp', '15b01bf712fd50fd23c3d313cf3a1cd7', 'Ihvan Mulya Pradana', 'ihvan@gmail.com', 'Graha Walantaka', '089990272580'),
(4, 'Jamal', '55c22f487cbfd97f0a1f2126d5da127b', 'Jamaludin', 'jamal@gmail.com', 'asasas', '086465'),
(5, 'user', '5f4dcc3b5aa765d61d8327deb882cf99', 'Ihvan Mulya PRadan', 'ihvana@gmail.com', 'Graha Walantaka', '08990272580');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
