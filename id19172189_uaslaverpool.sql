-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 26, 2022 at 09:21 AM
-- Server version: 10.5.12-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id19172189_uaslaverpool`
--

-- --------------------------------------------------------

--
-- Table structure for table `drinks`
--

CREATE TABLE `drinks` (
  `id_drink` int(11) NOT NULL,
  `nama_drink` varchar(100) NOT NULL,
  `harga_drink` int(11) NOT NULL,
  `stok_drink` int(11) NOT NULL,
  `jml_pesanan` int(11) NOT NULL,
  `desc_drink` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drinks`
--

INSERT INTO `drinks` (`id_drink`, `nama_drink`, `harga_drink`, `stok_drink`, `jml_pesanan`, `desc_drink`) VALUES
(222, 'Coffee', 15000, 10, 1, 'coffee merupakan minuman...'),
(223, 'Magic Cup', 15000, 10, 5, 'magic cup merupakan minuman...'),
(224, 'Jus Alpukat', 7000, 25, 5, 'jus alpukat merupakan minuman...');

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id_food` int(11) NOT NULL,
  `nama_food` varchar(100) NOT NULL,
  `harga_food` int(11) NOT NULL,
  `stok_food` int(11) NOT NULL,
  `jml_pesanan` int(11) NOT NULL,
  `desc_food` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id_food`, `nama_food`, `harga_food`, `stok_food`, `jml_pesanan`, `desc_food`) VALUES
(111, 'Soto Ayam', 10000, 10, 1, 'soto merupakan makanan...'),
(112, 'Minas', 10000, 5, 1, 'minas merupakan makanan...'),
(113, 'Nasi Goreng', 11, 10, 2, 'nasi goreng merupakan makanan...');

-- --------------------------------------------------------

--
-- Table structure for table `hasils`
--

CREATE TABLE `hasils` (
  `id_pemesanan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `id_food` int(11) NOT NULL,
  `id_drink` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasils`
--

INSERT INTO `hasils` (`id_pemesanan`, `id_pelanggan`, `nama_pelanggan`, `id_food`, `id_drink`) VALUES
(445, 333, 'Muhammad Erdiansyah', 112, 222),
(446, 334, 'Syarifah Aisyah', 113, 223);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggans`
--

CREATE TABLE `pelanggans` (
  `id_pelanggan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `no_hp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggans`
--

INSERT INTO `pelanggans` (`id_pelanggan`, `nama`, `email`, `alamat`, `jenis_kelamin`, `no_hp`) VALUES
(333, 'Muhammad Erdiansyah', 'ianmuhammad27@gmail.com', 'Jl. yang lurus', 'Laki-laki', 628137801),
(334, 'Syarifah Aisyah', 'syarifah@gmail.com', 'Jl. yang belok', 'Perempuan', 628228823);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drinks`
--
ALTER TABLE `drinks`
  ADD PRIMARY KEY (`id_drink`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id_food`);

--
-- Indexes for table `hasils`
--
ALTER TABLE `hasils`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`,`id_food`,`id_drink`),
  ADD KEY `id_drink` (`id_drink`),
  ADD KEY `id_food` (`id_food`);

--
-- Indexes for table `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasils`
--
ALTER TABLE `hasils`
  ADD CONSTRAINT `hasils_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggans` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasils_ibfk_2` FOREIGN KEY (`id_drink`) REFERENCES `drinks` (`id_drink`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasils_ibfk_3` FOREIGN KEY (`id_food`) REFERENCES `foods` (`id_food`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
