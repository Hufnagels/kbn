# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.18)
# Database: kvn_blog
# Generation Time: 2017-09-21 17:57:52 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `title`, `slug`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'Uncategorized','uncategorized','2016-06-20 09:00:00','2016-06-20 09:00:00',NULL),
	(2,'Projekt','projekt','2016-06-20 09:00:00','2016-06-20 09:00:00',NULL),
	(3,'Instruction','instruction','2016-06-20 09:00:00','2017-09-13 20:55:05',NULL),
	(4,'Lession','lession','2016-06-20 09:00:00','2016-06-20 09:00:00',NULL),
	(5,'Microbit beginner','microbit-beginner','2016-06-20 09:00:00','2016-06-20 09:00:00',NULL),
	(6,'Microbit intermediate','microbit-intermediate','2016-06-20 09:00:00','2016-06-20 09:00:00',NULL),
	(7,'Oktatás','oktatas','2016-06-20 09:00:00','2016-06-20 09:00:00',NULL),
	(8,'Interesting codes','interesting-codes','2016-06-20 09:00:00','2016-06-20 09:00:00',NULL),
	(9,'Konferencia','konferencia','2016-06-20 09:00:00','2017-09-16 10:56:19',NULL),
	(10,'Kiállítás','kiallitas','2016-06-20 09:00:00','2016-06-20 09:00:00',NULL),
	(11,'Tábor','tabor','2016-06-20 09:00:00','2016-06-20 09:00:00',NULL),
	(12,'Padagógus képzés','pedagogus-kepzes','2016-06-20 09:00:00','2016-06-20 09:00:00',NULL),
	(13,'Újabb kategória','ujabb-kategoria','2017-09-13 20:52:26','2017-09-13 20:52:26',NULL);

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
