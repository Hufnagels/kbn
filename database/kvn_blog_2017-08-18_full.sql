# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.18)
# Database: kvn_blog
# Generation Time: 2017-08-18 10:08:51 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `slug`, `email`, `password`, `bio`, `remember_token`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'Várkonyi István','istvanvarkonyi','kbvconsulting@gmail.com','$2y$10$YkiQ/lSAof1ou1qrFR07HOiLNy0i1gGqHxflWUD48r3MtaqddZcIq','Officia quis aliquid corporis non et consectetur. Et magni autem dolores placeat fugit amet voluptate fugiat. Soluta debitis cumque dolores. Distinctio rerum impedit ducimus.\n\nFugit perspiciatis quod perferendis. Ullam nemo quae saepe sint ab. Earum et sint ex exercitationem officia. In nobis iusto pariatur eligendi fugiat quia et.\n\nConsequuntur ut sit vitae. Voluptate rem unde omnis voluptate fugiat quia sed.\n\nIncidunt reprehenderit et nihil. Facere pariatur in ipsa. Et et earum culpa velit consectetur sunt.','CkjKToHVTqhvZDrUyawfpCN9YhL0rg7SPgHHT1LOm0Ol8lfAgFGNDHd96qpv','2016-06-20 09:00:00',NULL,NULL),
	(2,'Szakmáry Ákos','akosszakmary','akos.szakmary@gmail.com','$2y$10$oECzvpMbB08yn7jA2KusP.kF41pv03W6Sh7na11hRarHs.KgWPj.W','Ratione autem itaque voluptatem cum pariatur quia corrupti. Repudiandae velit sed nihil et accusantium. Eos ducimus qui incidunt quis repellendus ipsam quo repellendus.\n\nEt iste velit veniam. Fuga quia provident autem suscipit quia eum. Omnis qui illo tenetur rerum maxime enim qui exercitationem. Repudiandae non laboriosam minus molestiae at officia dolores.\n\nQuia sed odio consequatur unde. Dolor qui est et nemo reiciendis corrupti. Nam quo et harum temporibus.\n\nBeatae tempore aut et dolor velit sit. Ut ut qui similique saepe quis doloribus temporibus. Ducimus vero sit ab voluptatem rerum sit atque. Rerum temporibus dolores assumenda praesentium et consequuntur iusto est.','64sL0KNxzUavtFb2jn9hqwp0OaB1kCV4jVoXouv6M2LEJ9yT1fRGsOOEDu6p','2016-06-20 09:00:00',NULL,NULL),
	(3,'Pálmai Zita','zitapalmai','zsiraf21@gmail.com','$2y$10$uGWr8Dz9JZA63sDabCsGrugfRVDu7s6mdv8vxUlgJurcSjAvyZ2Nu','Qui vel odio praesentium ipsam. Inventore eveniet architecto ad commodi qui autem. Totam quo eum ab natus. Maiores deleniti aut omnis illo tempora quia excepturi. Eligendi corrupti et rerum alias consequatur in amet et.\n\nDolorum asperiores dolores est sit ad sed. Rerum deleniti ullam eveniet ea. Eveniet totam eligendi qui. Est est et ea alias nam consequatur excepturi commodi. Rerum ut aliquam voluptates totam.\n\nTemporibus quas et vel illo unde eos. Alias qui accusantium molestiae culpa occaecati quisquam ducimus. Sapiente necessitatibus dolor nulla quia mollitia perferendis.\n\nDolor eius ab vel laborum reprehenderit maxime et. Dolores blanditiis est commodi fugit. Itaque sed in sunt totam sit ut deserunt quod.\n\nQuia repellat et quia harum nobis veritatis. Odit dignissimos quae facere fuga recusandae sint non. Aliquam ratione eius fuga cumque minus sunt voluptas at.','08KdQh4IKLU8FdQhvxHrf4L560rfsMSwWtrNBkkrdxYgRMMetIdWZyOmZeOX','2016-06-20 09:00:00',NULL,NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
