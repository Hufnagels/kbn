# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.18)
# Database: kvn_blog
# Generation Time: 2017-09-01 18:04:38 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`)
VALUES
	(1,'crud-news','crud news','( CRUD ) on news table','2017-06-20 09:00:00','2017-08-18 04:50:42'),
	(2,'update-others-news','update others news','( Update others news too ) on news table','2017-06-20 09:00:00','2017-08-18 04:50:42'),
	(3,'delete-others-news','delete others news','( Delete others news too ) on news table','2017-06-20 09:00:00','2017-08-18 04:50:42'),
	(4,'crud-event','crud event','( CRUD ) on events table','2017-06-20 09:00:00','2017-08-18 04:50:42'),
	(5,'update-others-event','update others event','( Update others event too ) on event table','2017-06-20 09:00:00','2017-08-18 04:50:42'),
	(6,'delete-others-event','delete others event','( Delete others event too ) on event table','2017-06-20 09:00:00','2017-08-18 04:50:42'),
	(7,'crud-category','crud category','( CRUD ) on categories table','2017-06-20 09:00:00','2017-08-18 04:50:42'),
	(8,'crud-user','crud user','( CRUD ) on users table','2017-06-20 09:00:00','2017-08-18 04:50:42'),
	(9,'edit-profile','edit profile','Edit own profile','2017-06-20 09:00:00','2017-08-18 04:50:42'),
	(10,'crud-tag','crud tag','( CRUD ) on tags table','2017-06-20 09:00:00','2017-09-01 00:44:36'),
	(11,'crud-files','crud files','( CRUD ) on Filemanager',NULL,'2017-09-01 20:04:03');

/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
