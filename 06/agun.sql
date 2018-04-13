-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 07, 2015 at 11:42 
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `agun`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namabarang` varchar(200) DEFAULT NULL,
  `pembeli` varchar(100) DEFAULT NULL,
  `harga` varchar(100) DEFAULT NULL,
  `banyak` int(10) DEFAULT NULL,
  `Konfirmasi` varchar(10) DEFAULT NULL,
  `pada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `namabarang`, `pembeli`, `harga`, `banyak`, `Konfirmasi`, `pada`) VALUES
(8, 'Asus P453MA-WX326B - 2GB RAM - Intel Quad-Core N3540 - 14', 'agun@gmail.com', 'RP 3.999.000', 1, NULL, '2015-05-08 04:27:48'),
(9, 'Nikon D5300 Kit 18-55 VR II - Hitam', 'agun@gmail.com', 'RP 6.975.000', 2, NULL, '2015-05-08 04:28:08');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE IF NOT EXISTS `kontak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pengirim` varchar(100) DEFAULT NULL,
  `isi` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `kontak`
--


-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `id` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  `namadepan` varchar(100) DEFAULT NULL,
  `namabelakang` varchar(100) DEFAULT NULL,
  `jeniskelamin` varchar(10) DEFAULT NULL,
  `tanggal` varchar(20) DEFAULT NULL,
  `bulan` varchar(20) DEFAULT NULL,
  `tahun` varchar(20) DEFAULT NULL,
  `alamat` text,
  `terdaftar` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `email`, `password`, `level`, `namadepan`, `namabelakang`, `jeniskelamin`, `tanggal`, `bulan`, `tahun`, `alamat`, `terdaftar`) VALUES
(0001, 'agun', 'agun1879', 'admin', 'Agun', 'Buhori', 'Laki-laki', '31 Maret 1998', NULL, NULL, 'Serang', '2015-05-07 02:11:23'),
(0003, 'adha@yahoo.com', 'adha123', 'user', 'muhamad', 'adha', 'Laki-laki', NULL, NULL, NULL, NULL, '2015-05-07 03:39:34'),
(0004, 'rafiudin@yahoo.com', 'rafi123', 'user', 'Rafi', 'udin', 'Laki-laki', NULL, NULL, NULL, NULL, '2015-05-07 03:41:59'),
(0005, 'mastur@gmail.com', 'mastur79', 'user', NULL, 'mastur', 'Laki-laki', NULL, NULL, NULL, 'Sinday CImarga', '2015-05-07 03:49:25'),
(0007, 'agunfold@gmail.com', 'agun1879', 'user', 'agun', 'buhori', 'Laki-laki', NULL, NULL, NULL, 'Cikande', '2015-05-07 04:18:36'),
(0008, 'muhammad.adha@gmail.com', 'adha5533', 'user', 'Muhamad', 'Adha', 'Laki-laki', '17', 'April', '1997', 'Tunjungteja serang', '2015-05-08 04:22:54');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `namabarang` varchar(100) DEFAULT NULL,
  `spesifikasi` text,
  `kategori` varchar(100) DEFAULT NULL,
  `harga` varchar(100) DEFAULT NULL,
  `foto` varchar(111) DEFAULT NULL,
  `pada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `namabarang`, `spesifikasi`, `kategori`, `harga`, `foto`, `pada`) VALUES
(16, 'Apple iMac MD094ZA/A Desktop - 21.5" - Silver', 'Spesifikasi\r\nQuad Core i5 2.9ghz (Turbo Boost up to 3.6GHz)\r\n8 GB RAM\r\n1 TB Hard-Drive\r\nNVIDIA GeForce GT650M Graphics with 512MB Dedicated Memory\r\n\r\nDetail  Produk\r\nHadirkan mesin komputasi dengan kemampuan dan kinerja tinggi namun sekaligus bisa mempercantik nilai estetika ruang kerja Anda. Produk komputer desktop produksi Apple ini mampu memenuhi kebutuhan Anda yaitu Apple iMac. Dengan spesifikasi terkini yang mampu mengimbangi kebutuhan komputasi dan hiburan Anda. Menggunakan prosesor Intel Core generasi ketiga, kinerja grafis yang lebih cepat, Thunderbolt, dan port koneksi yang beragam. Semuanya dikemas dalam bentuk yang tipis, memiliki tepi berukuran 5 mm.\r\n\r\nDesain\r\niMac MD094ZA/A memiliki ukuran diagonal layar sebesar 21.5 inci dengan teknologi LED-backlit IPS. Memiliki resolusi 1920 x 1080 piksel. Layar terbaru iMac ini mampu mengurangi 75% refleksi sehingga tampilan menjadi sangat jelas tanpa mengorbankan kualitas warna. Dipersenjatai dengan prosesor Inter Core i5 quad-core dan NVIDIA GeForce GT650M 512 MB GDDR5 mampu menampilkan kualitas grafis yang luar biasa. Pada bagian belakang dilengkapi dengan berbagai port konektivitas seperti port headphone, slot power supply, port Gigabit Ethernet, 2 buah port Thunderbolt, 4 buah port USB 3.0, dan sebuah slot pembaca kartu SD.\r\n\r\nOS X Mountain Lion\r\nMac Mini telah terpasang sistem operasi Apple terbaru yaitu OS X Mountain Lion yang merupakan sistem operasi yang canggih untuk komputer desktop. OS X dirancang kompatibel dengan prosesor Intel terbaru yang mampu memberikan kinerja maksimal. OS X Mountain Lion memiliki aplikasi unggulan yang memberikan pengalaman menarik untuk Anda seperti Mac App Store, Safari, Mail, Messages, Calendar, Contacts, Reminders, Notes, Time Machine, FaceTime, Photo Booth, Game Center, iTunes dan lainnya.\r\n', 'Peralatan Komputer', 'RP 1.399.000', NULL, '2015-05-07 21:45:35'),
(17, 'Asus P453MA-WX326B - 2GB RAM - Intel Quad-Core N3540 - 14" - Hitam', 'Spesifikasi\r\nProsesor Intel Quad-Core N3540 (2M Cache, 2.16GHz up to 2.66 GHz)\r\nRAM 2GB DDR3\r\nHardisk 500GB; 5400 RPM\r\nLayar LCD 14" HD\r\n\r\n\r\nDetail produk\r\nAsus P453MA-WX326B hadir dengan desain yang kompak dan dikemas dengan layar berukuran 14". Dengan bobot sekitar 2 kg, Asus menyertakan berbagai teknologi yang hanya terdapat pada produknya seperti SonicMaster, Instant On dan juga Ice Cool.\r\n\r\nKinerja Optimal\r\nLaptop ini didukung dengan prosesor Intel Quad-Core N3540 berkecepatan 2.16GHz yang dapat bekerja hingga 2.66GHz, memori RAM 2 GB akan memberikan kemudahan bagi Anda dalam mengerjakan pekerjaan multitasking. Dengan kapasitas penyimpanan 500 GB, Anda memiliki ruang penyimpanan yang cukup besar untuk menyimpan berbagai data berharga Anda.\r\n\r\nAsus SonicMaster\r\nTeknologi terbaru dari Asus yaitu Asus SonicMaster yang digabungkan dengan AudioWizard ASUS yang ekslusif memberikan pengalaman hiburan audio yang menakjubkan. Suara yang lebih besar dan bass yang lebih kaya melalui speaker terintegrasinya menyediakan pengalaman audio yang terbaik dikelasnya.\r\n\r\nInstant On\r\nDibekali dengan kemampuan Instant On dari Asus, Anda tidak perlu menunggu lama saat menghidupkan laptop. Instant On adalah mode Sleep yang dapat langsung menya dalam waktu 3 detik walaupun dalam keadaan Sleep selama lebih dari 21 hari dalam mode baterai.\r\n\r\nTeknologi IceCool\r\nDengan rancangan motherboard dua sisi penghasil panas, jauh dari jangakauan Anda. Dengan heat pipe dan kipas suhu palm rest dan area pengetikan sehingga suhu laptop akan terasa lebih dingin, walaupun digunakan dengan waktu yang lama.\r\n', 'Peralatan Komputer', 'RP 3.999.000', NULL, '2015-05-07 22:11:34'),
(18, 'Seagate Expansion 500GB USB 3.0 2.5" External Harddisk', 'Spesifikasi\r\n500GB\r\nUsb 3.0 dan usb 2.0\r\n2.5"\r\nPlug and Play\r\n\r\nDetail produk\r\n\r\nPenyimpanan tambahan yang mudah dan dapat dibawa ke mana saja. Hard disk Portabel Seagate Expansion menawarkan solusi yang mudah digunakan ketika Anda ingin menambah penyimpanan seketika pada komputer Anda dan membawa file saat bepergian. Yang Anda lakukan hanyalah cukup menarik file dari desktop ataupun tempat file Anda dan kemudian lepaskanlah di area Hard disk ini. Didayai USB, membuat Hard Disk ini dapat mentransfer data yang cepat dengan konektivitas USB 3.0. Berguna untuk menambah kapasitas penyimpanan Anda seketika.File foto digital, video dan file musik dapat membebani penyimpanan komputer Anda, menyebabkan kinerja menurun karena hard disk internalnya memenuhi kapasitas.\r\n', 'Peralatan Komputer', 'RP 665.000', NULL, '2015-05-07 22:14:07'),
(19, 'Nikon D5300 Kit 18-55 VR II - Hitam', 'Spesifikasi\r\n24.2 Megapiksel\r\nISO 100-12800\r\nKoneksi WiFi\r\nFull HD Video\r\nDesain Kompak\r\n\r\nDetail produk\r\n\r\nMemperkenalkan kamera DSLR besutan Nikon yang dilengkapi dengan koneksi WiFi, D5300. Dengan koneksi WiFi yang dimilikinya, Anda dapat dengan mudah dan cepat melakukan transfer foto ke berbagai gadget yang Anda miliki seperti smartphone atau pun tablet tanpa harus repot menggunakan sambungan kabel. Didukung pula dengan sensor image sebesar 24.2 megapiksel, D5300 mampu menghasilkan gambar berkualitas tinggi yang tak pernah Anda bayangkan sebelumnya.Kualitas Foto Jernih\r\nDengan sensor image 24.2 megapiksel DX Format CMOS miliknya, kamera DSLR ini mampu menghasilkan kualitas foto yang jernih. Meski pun pada tahap editing Anda harus membesarkan atau bahkan memotong gambar tersebut, tidak akan mengurangi ketajaman serta detail foto sehingga kualitas gambar tetap terjaga.\r\n\r\nDesain Kompak\r\nJangan tertipu dengan bentuk body dari D5300 ini karena kamera DSLR ini hadir dengan spesifikasi yang luar biasa tanpa harus\r\nmemerlukan body besar dan berat. Dengan begitu, kamera ini menjadi sangat mudah untuk dibawa kemana pun Anda pergi. Ditambah lagi dengan penempatan tombol-tombol menu yang baik membuat kamera ini menjadi nyaman dan mudah saat\r\ndioperasikan.\r\n\r\nFokus Kecepatan Tinggi\r\nApa pun jenis foto yang akan Anda buat, entah itu foto dengan objek diam, foto candid, foto high-speed action atau bahkan merekam video dalam bentuk HD, kamera ini akan tetap memberikan fokus yang baik. Dilengkapi 39 titik fokus, D5300 mampu dengan cepat menagkap fokus pada objek yang sedang Anda bidik.\r\n', 'Camera & Video', 'RP 6.975.000', NULL, '2015-05-07 22:34:59'),
(21, 'Apple iMac MD094ZA/A Desktop - 21.5" - Silver', 'Spesifikasi\r\nQuad Core i5 2.9ghz (Turbo Boost up to 3.6GHz)\r\n8 GB RAM\r\n1 TB Hard-Drive\r\nNVIDIA GeForce GT650M Graphics with 512MB Dedicated Memory\r\n\r\nDetail  Produk\r\nHadirkan mesin komputasi dengan kemampuan dan kinerja tinggi namun sekaligus bisa mempercantik nilai estetika ruang kerja Anda. Produk komputer desktop produksi Apple ini mampu memenuhi kebutuhan Anda yaitu Apple iMac. Dengan spesifikasi terkini yang mampu mengimbangi kebutuhan komputasi dan hiburan Anda. Menggunakan prosesor Intel Core generasi ketiga, kinerja grafis yang lebih cepat, Thunderbolt, dan port koneksi yang beragam. Semuanya dikemas dalam bentuk yang tipis, memiliki tepi berukuran 5 mm.\r\n\r\nDesain\r\niMac MD094ZA/A memiliki ukuran diagonal layar sebesar 21.5 inci dengan teknologi LED-backlit IPS. Memiliki resolusi 1920 x 1080 piksel. Layar terbaru iMac ini mampu mengurangi 75% refleksi sehingga tampilan menjadi sangat jelas tanpa mengorbankan kualitas warna. Dipersenjatai dengan prosesor Inter Core i5 quad-core dan NVIDIA GeForce GT650M 512 MB GDDR5 mampu menampilkan kualitas grafis yang luar biasa. Pada bagian belakang dilengkapi dengan berbagai port konektivitas seperti port headphone, slot power supply, port Gigabit Ethernet, 2 buah port Thunderbolt, 4 buah port USB 3.0, dan sebuah slot pembaca kartu SD.\r\n\r\nOS X Mountain Lion\r\nMac Mini telah terpasang sistem operasi Apple terbaru yaitu OS X Mountain Lion yang merupakan sistem operasi yang canggih untuk komputer desktop. OS X dirancang kompatibel dengan prosesor Intel terbaru yang mampu memberikan kinerja maksimal. OS X Mountain Lion memiliki aplikasi unggulan yang memberikan pengalaman menarik untuk Anda seperti Mac App Store, Safari, Mail, Messages, Calendar, Contacts, Reminders, Notes, Time Machine, FaceTime, Photo Booth, Game Center, iTunes dan lainnya.\r\n', 'Peralatan Komputer', 'RP 1.399.000', NULL, '2015-05-08 04:32:44');
