-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.8-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for coba
CREATE DATABASE IF NOT EXISTS `coba` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `coba`;


-- Dumping structure for table coba.biodata
CREATE TABLE IF NOT EXISTS `biodata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `point` int(11) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `password` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table coba.biodata: ~4 rows (approximately)
/*!40000 ALTER TABLE `biodata` DISABLE KEYS */;
REPLACE INTO `biodata` (`id`, `nama`, `point`, `tgl_lahir`, `password`) VALUES
	(1, 'ABC', 10, '2016-04-01', NULL),
	(2, 'BCD', 8, '2016-05-26', NULL),
	(3, 'EFG', 7, '2016-05-02', NULL),
	(4, 'HIJA', 6, '2016-05-30', NULL);
/*!40000 ALTER TABLE `biodata` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
