-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for prodavnica
CREATE DATABASE IF NOT EXISTS `prodavnica` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `prodavnica`;

-- Dumping structure for table prodavnica.potrosuvaci
CREATE TABLE IF NOT EXISTS `potrosuvaci` (
  `potrosuvac_id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `ime` char(50) NOT NULL,
  `adresa` char(50) NOT NULL,
  `telefon` int(10) unsigned DEFAULT NULL,
  `email` varchar(50) DEFAULT '0',
  PRIMARY KEY (`potrosuvac_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table prodavnica.potrosuvaci: ~7 rows (approximately)
/*!40000 ALTER TABLE `potrosuvaci` DISABLE KEYS */;
INSERT INTO `potrosuvaci` (`potrosuvac_id`, `ime`, `adresa`, `telefon`, `email`) VALUES
	(1, 'Oliver Gligorovski', 'ul 12 br 19 Bitola', 70867113, 'oli_gligorovski@hotmail.com'),
	(2, 'Pece Pecovski', 'Dalbegovci', 77123321, '0'),
	(3, 'Stojan', 'Car Samoil 91', 222555, 'mile@panika.com'),
	(4, 'Mile Panika', 'Capari', 223305, 'mile@panika.com'),
	(6, 'Toso Malerot', 'Bulevar', 333555, ''),
	(7, 'Трајан Трајановски', 'Кај веро горе', 123654, '');
/*!40000 ALTER TABLE `potrosuvaci` ENABLE KEYS */;


-- Dumping structure for table prodavnica.proizvodi
CREATE TABLE IF NOT EXISTS `proizvodi` (
  `proizvod_id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `imeProizvod` char(50) NOT NULL,
  `opis` char(150) NOT NULL,
  `cena` int(6) unsigned NOT NULL,
  `popust` int(6) unsigned DEFAULT NULL,
  PRIMARY KEY (`proizvod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table prodavnica.proizvodi: ~6 rows (approximately)
/*!40000 ALTER TABLE `proizvodi` DISABLE KEYS */;
INSERT INTO `proizvodi` (`proizvod_id`, `imeProizvod`, `opis`, `cena`, `popust`) VALUES
	(1, 'Telefon', 'Huawei Y6', 7000, 500),
	(2, 'Televizor', 'Philips 51', 30000, 1000),
	(3, 'Laptop', 'asus sshh', 12000, 1000),
	(4, 'Tablet', 'samsung', 7800, 500),
	(5, 'Laptop', 'hp', 18000, 1500),
	(7, 'Procesor', 'Intel pentium i7', 8500, 0);
/*!40000 ALTER TABLE `proizvodi` ENABLE KEYS */;

-- Dumping structure for table prodavnica.prodazba
CREATE TABLE IF NOT EXISTS `prodazba` (
  `prodazba_id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `potrosuvac_id` int(3) unsigned NOT NULL,
  `proizvod_id` int(3) unsigned NOT NULL,
  `kolicina` tinyint(3) unsigned NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`prodazba_id`),
  KEY `FK1_potrosuvac` (`potrosuvac_id`),
  KEY `FK2_proizvod` (`proizvod_id`),
  CONSTRAINT `FK1_potrosuvac` FOREIGN KEY (`potrosuvac_id`) REFERENCES `potrosuvaci` (`potrosuvac_id`) ON UPDATE CASCADE,
  CONSTRAINT `FK2_proizvod` FOREIGN KEY (`proizvod_id`) REFERENCES `proizvodi` (`proizvod_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table prodavnica.prodazba: ~4 rows (approximately)
/*!40000 ALTER TABLE `prodazba` DISABLE KEYS */;
INSERT INTO `prodazba` (`prodazba_id`, `potrosuvac_id`, `proizvod_id`, `kolicina`, `data`) VALUES
	(1, 1, 1, 1, '2020-02-17'),
	(2, 2, 2, 1, '2020-02-17'),
	(3, 1, 3, 1, '2019-12-21'),
	(4, 2, 4, 1, '2019-11-21');
/*!40000 ALTER TABLE `prodazba` ENABLE KEYS */;



/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
