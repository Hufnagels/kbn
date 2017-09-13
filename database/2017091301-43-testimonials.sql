# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.18)
# Database: kvn_blog
# Generation Time: 2017-09-12 23:43:23 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table testimonials
# ------------------------------------------------------------

DROP TABLE IF EXISTS `testimonials`;

CREATE TABLE `testimonials` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `testi_text` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `testi_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `testi_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` int(10) unsigned NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `testimonials_slug_unique` (`slug`),
  KEY `testimonials_author_id_foreign` (`author_id`),
  CONSTRAINT `testimonials_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;

INSERT INTO `testimonials` (`id`, `testi_text`, `slug`, `testi_name`, `testi_title`, `author_id`, `published_at`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'testi_ti tletesti_titletesti_titletesti_ titletesti_titletesti_titletest i_titletesti_titl etesti_titletesti_titlete sti_title testi_titletesti_titletesti_ titletesti_t itletesti_titletesti_tit letesti_title testi_titletesti_titlet esti_titletest i_titletesti_titlete','testi_title1','testi_title','testi_title',1,'2017-09-13 00:33:44','2017-09-13 00:33:49','2017-09-13 00:33:49',NULL),
	(2,'valami vak szöveg','testi_title2','Dr. Prof. Vak Egér','Veszprém, ny. egyetemi tanár',1,'2017-09-13 00:52:27','2017-09-13 00:52:31','2017-09-13 00:52:31',NULL),
	(3,'Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet aenean sollicitudin, lorem quis bibendum auctor.','testi_title3','Kiborostyai János','újságíró',1,'2017-09-13 00:53:25','2017-09-13 00:53:28','2017-09-13 00:53:28',NULL),
	(4,'Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet aenean sollicitudin, lorem quis bibendum auctor. Proin gravida nibh vel velit auctor aliquet.','testi_title4','Dr. Prof. Habil. Hablonyicska Géza','Veszprémi Egyetem Informatika Kar',1,'2017-09-13 00:54:18','2017-09-13 00:54:23','2017-09-13 00:54:23',NULL),
	(5,'Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet aenean sollicitudin, lorem quis bibendum auctor.  Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet aenean sollicitudin, lorem quis bibendum auctor. Proin gravida nibh vel velit auctor aliqu.','testi_title5','Szekeres Imre','szülő',1,'2017-09-13 01:01:52','2017-09-13 00:56:40','2017-09-13 01:37:27',NULL);

/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
