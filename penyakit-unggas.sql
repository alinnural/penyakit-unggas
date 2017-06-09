-- phpMyAdmin SQL Dump
-- version 4.3.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jun 08, 2017 at 11:52 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `penyakit-unggas`
--

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id` int(11) NOT NULL,
  `kelompok_gejala_id` int(11) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id`, `kelompok_gejala_id`, `kode`, `keterangan`) VALUES
(1, 1, 'G001', 'Napsu makan berkurang'),
(2, 1, 'G002', 'Ngorok'),
(3, 1, 'G003', 'Sesak napas'),
(4, 1, 'G004', 'Ayam mengantuk'),
(5, 1, 'G005', 'Terdapat kerak dihidung'),
(6, 1, 'G006', 'Ayam mengeleng-geleng kepala'),
(7, 2, 'G007', 'Mencret'),
(8, 1, 'G008', 'Jengger kebiruan'),
(9, 2, 'G009', 'Kotoran berwarna kuning/biru'),
(10, 2, 'G010', 'Kotoran berwarna merah/ada darah'),
(11, 2, 'G011', 'Sekitar pantat kotoran putih'),
(12, 2, 'G012', 'Kotoran putih');

-- --------------------------------------------------------

--
-- Table structure for table `gejala_penyakit`
--

CREATE TABLE `gejala_penyakit` (
  `id` int(11) NOT NULL,
  `gejala_id` int(11) NOT NULL,
  `penyakit_id` int(11) NOT NULL,
  `md` float NOT NULL,
  `mb` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala_penyakit`
--

INSERT INTO `gejala_penyakit` (`id`, `gejala_id`, `penyakit_id`, `md`, `mb`) VALUES
(1, 1, 1, 0.7, 0.3),
(2, 2, 1, 0.7, 0.3),
(3, 3, 1, 0.7, 0.3),
(4, 8, 1, 0.1, 0.9),
(5, 9, 1, 0.4, 0.6),
(6, 1, 2, 0.7, 0.3),
(7, 2, 2, 0.7, 0.3),
(8, 3, 2, 0.6, 0.4),
(9, 7, 2, 0.4, 0.6),
(10, 8, 2, 0.75, 0.25),
(11, 9, 2, 0.1, 0.9),
(12, 10, 2, 0.5, 0.5),
(13, 1, 3, 0.8, 0.2),
(14, 2, 3, 0.8, 0.2),
(15, 3, 3, 0.75, 0.25),
(16, 7, 3, 0.4, 0.6),
(17, 8, 3, 0.6, 0.4),
(18, 9, 3, 0.6, 0.4),
(19, 1, 4, 0.8, 0.2),
(20, 2, 4, 0.9, 0.1),
(21, 3, 4, 0.8, 0.2),
(22, 4, 4, 0.9, 0.1),
(23, 7, 4, 0.55, 0.45),
(24, 11, 4, 0.2, 0.8),
(25, 12, 4, 0.1, 0.9),
(26, 1, 5, 0.8, 0.2),
(27, 2, 5, 0.3, 0.7),
(28, 3, 5, 0.2, 0.8),
(29, 4, 5, 0.4, 0.6),
(30, 5, 5, 0.9, 0.1);

-- --------------------------------------------------------

--
-- Table structure for table `kelompok_gejala`
--

CREATE TABLE `kelompok_gejala` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelompok_gejala`
--

INSERT INTO `kelompok_gejala` (`id`, `nama`, `keterangan`) VALUES
(1, 'Gejala Fisik', '-'),
(2, 'Gejala Pencernaan', '-');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id` int(11) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id`, `kode`, `keterangan`) VALUES
(1, 'P001', 'Terelo/ND'),
(2, 'P002', 'Corela'),
(3, 'P003', 'Colibacilus'),
(4, 'P004', 'Pullorum/Berak Kapus'),
(5, 'P005', 'Coriza/Snot');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`) VALUES
(1, 'expert', '25D55AD283AA400AF464C76D713C07AD', 'Expert');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id`), ADD KEY `kelompok_gejala_id` (`kelompok_gejala_id`);

--
-- Indexes for table `gejala_penyakit`
--
ALTER TABLE `gejala_penyakit`
  ADD PRIMARY KEY (`id`), ADD KEY `gejala_id` (`gejala_id`), ADD KEY `penyakit_id` (`penyakit_id`);

--
-- Indexes for table `kelompok_gejala`
--
ALTER TABLE `kelompok_gejala`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `gejala_penyakit`
--
ALTER TABLE `gejala_penyakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `kelompok_gejala`
--
ALTER TABLE `kelompok_gejala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `gejala`
--
ALTER TABLE `gejala`
ADD CONSTRAINT `gejala_ibfk_1` FOREIGN KEY (`kelompok_gejala_id`) REFERENCES `kelompok_gejala` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gejala_penyakit`
--
ALTER TABLE `gejala_penyakit`
ADD CONSTRAINT `gejala_penyakit_ibfk_1` FOREIGN KEY (`gejala_id`) REFERENCES `gejala` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `gejala_penyakit_ibfk_2` FOREIGN KEY (`penyakit_id`) REFERENCES `penyakit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
