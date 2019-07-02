# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.18)
# Database: kvn_blog
# Generation Time: 2017-09-08 00:24:36 +0000
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
	(1,'Uncategorized','uncategorized','2016-06-20 09:00:00',NULL,NULL),
	(2,'Projekt','projekt','2016-06-20 09:00:00',NULL,NULL),
	(3,'Microbit beginner','microbit-beginner','2016-06-20 09:00:00',NULL,NULL),
	(4,'Microbit intermediate','microbit-intermediate','2016-06-20 09:00:00',NULL,NULL),
	(5,'Oktatás','oktatas','2016-06-20 09:00:00',NULL,NULL),
	(6,'Interesting codes','interesting-codes','2016-06-20 09:00:00',NULL,NULL),
	(7,'Konferencia','konferencia','2016-06-20 09:00:00',NULL,NULL),
	(8,'Kiállítás','kiallitas','2016-06-20 09:00:00',NULL,NULL),
	(9,'Tábor','tabor','2016-06-20 09:00:00',NULL,NULL),
	(10,'Padagógus képzés','pedagogus-kepzes','2016-06-20 09:00:00',NULL,NULL),
	(11,'Instruction','instruction','2017-09-07 23:31:11','2017-09-07 23:31:11',NULL),
	(12,'Lession','lession','2017-09-07 23:31:29','2017-09-07 23:31:29',NULL);

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table categoryables
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categoryables`;

CREATE TABLE `categoryables` (
  `category_id` int(11) NOT NULL,
  `categoryable_id` int(11) NOT NULL,
  `categoryable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `categoryables` WRITE;
/*!40000 ALTER TABLE `categoryables` DISABLE KEYS */;

INSERT INTO `categoryables` (`category_id`, `categoryable_id`, `categoryable_type`)
VALUES
	(3,23,'App\\News'),
	(5,20,'App\\News'),
	(5,19,'App\\News'),
	(8,18,'App\\News'),
	(3,17,'App\\News'),
	(5,16,'App\\News'),
	(5,15,'App\\News'),
	(5,14,'App\\News'),
	(4,13,'App\\News'),
	(4,12,'App\\News'),
	(6,11,'App\\News'),
	(4,10,'App\\News'),
	(6,9,'App\\News'),
	(3,8,'App\\News'),
	(2,7,'App\\News'),
	(3,6,'App\\News'),
	(2,5,'App\\News'),
	(5,4,'App\\News'),
	(5,3,'App\\News'),
	(6,2,'App\\News'),
	(2,1,'App\\News'),
	(4,24,'App\\News'),
	(11,2,'App\\Instruction'),
	(11,1,'App\\Instruction'),
	(12,1,'App\\Lession');

/*!40000 ALTER TABLE `categoryables` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table instructions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `instructions`;

CREATE TABLE `instructions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `author_id` int(10) unsigned NOT NULL,
  `is_published` int(11) NOT NULL DEFAULT '0',
  `published_at` timestamp NULL DEFAULT NULL,
  `category_id` int(10) unsigned NOT NULL DEFAULT '0',
  `view_count` int(10) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `instructions_slug_unique` (`slug`),
  KEY `instructions_author_id_foreign` (`author_id`),
  CONSTRAINT `instructions_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `instructions` WRITE;
/*!40000 ALTER TABLE `instructions` DISABLE KEYS */;

INSERT INTO `instructions` (`id`, `title`, `slug`, `subtitle`, `excerpt`, `body`, `image`, `author_id`, `is_published`, `published_at`, `category_id`, `view_count`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'Hogyan kezdjünk egy órát','hogyan-kezdjunk-egy-orat','Első lépések','össtefoglaló 1','<p>tesztsz&ouml;veg</p>',NULL,2,0,'2017-09-07 20:30:38',11,0,'2017-09-07 20:30:47','2017-09-07 23:32:22',NULL),
	(2,'Hogyan kezdjünk egy órát 2','hogyan-kezdjunk-egy-orat-2','sdad','asdad','<p>asdsadasd</p>',NULL,2,0,NULL,11,0,'2017-09-07 20:59:23','2017-09-07 23:32:03',NULL);

/*!40000 ALTER TABLE `instructions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table lessionables
# ------------------------------------------------------------

DROP TABLE IF EXISTS `lessionables`;

CREATE TABLE `lessionables` (
  `lession_id` int(11) NOT NULL,
  `lessionable_id` int(11) NOT NULL,
  `lessionable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `lessionables` WRITE;
/*!40000 ALTER TABLE `lessionables` DISABLE KEYS */;

INSERT INTO `lessionables` (`lession_id`, `lessionable_id`, `lessionable_type`)
VALUES
	(1,1,'App\\Instruction');

/*!40000 ALTER TABLE `lessionables` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table lessions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `lessions`;

CREATE TABLE `lessions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `author_id` int(10) unsigned NOT NULL,
  `is_published` int(11) NOT NULL DEFAULT '0',
  `published_at` timestamp NULL DEFAULT NULL,
  `category_id` int(10) unsigned NOT NULL DEFAULT '0',
  `view_count` int(10) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lessions_slug_unique` (`slug`),
  KEY `lessions_author_id_foreign` (`author_id`),
  CONSTRAINT `lessions_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `lessions` WRITE;
/*!40000 ALTER TABLE `lessions` DISABLE KEYS */;

INSERT INTO `lessions` (`id`, `title`, `slug`, `subtitle`, `excerpt`, `body`, `image`, `author_id`, `is_published`, `published_at`, `category_id`, `view_count`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'Első BBC lecke','elso-bbc-lecke','BBC alapok','ssadasd','<p>asdsdsdasd</p>',NULL,2,0,'2017-09-07 22:22:54',12,0,'2017-09-07 22:23:13','2017-09-07 23:49:03',NULL);

/*!40000 ALTER TABLE `lessions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(86,'2017_08_12_233939_alter_users_add_slug_column',4),
	(125,'2017_08_13_015257_alter_users_add_bio_column',5),
	(166,'2014_10_12_000000_create_users_table',6),
	(167,'2014_10_12_100000_create_password_resets_table',6),
	(168,'2017_07_29_192826_laratrust_setup_tables',6),
	(169,'2017_08_09_185610_create_news_table',6),
	(170,'2017_08_10_125058_alter_news_add_published_at_column',6),
	(171,'2017_08_11_203241_create_categories_table',6),
	(172,'2017_08_11_204003_alter_news_add_category_id_column',6),
	(173,'2017_08_12_121839_alter_news_add_view_count_column',6),
	(174,'2017_08_16_002237_alter_news_add_deleted_at_column',7),
	(175,'2017_08_16_142515_alter_categories_add_deleted_at_column',8),
	(176,'2017_08_16_142745_alter_categories_add_deleted_at_column',9),
	(177,'2017_08_17_170048_alter_users_add_deleted_at_column',10),
	(178,'2017_08_11_203923_alter_news_add_category_id_column',11),
	(181,'2017_08_27_021417_create_tags_table',12),
	(185,'2017_08_31_101044_create_taggables_table',13),
	(186,'2017_08_31_101337_create_videos_table',13),
	(187,'2017_08_31_101354_create_photos_table',13),
	(188,'2017_08_31_223604_alter_tags_add_deleted_at_column',14),
	(189,'2017_09_07_133353_alter_categories_delete_type_column',15),
	(191,'2017_09_07_133949_create_table_categoryable',16),
	(192,'2017_09_07_185739_create_table_instructions',17),
	(193,'2017_09_07_185751_create_table_lessions',17),
	(194,'2017_09_07_223237_create_table_lessionabble',18);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table news
# ------------------------------------------------------------

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `author_id` int(10) unsigned NOT NULL,
  `is_published` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `category_id` int(10) unsigned NOT NULL DEFAULT '0',
  `view_count` int(10) unsigned NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `news_slug_unique` (`slug`),
  KEY `news_author_id_foreign` (`author_id`),
  KEY `news_category_id_foreign` (`category_id`),
  CONSTRAINT `news_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`),
  CONSTRAINT `news_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;

INSERT INTO `news` (`id`, `title`, `slug`, `subtitle`, `excerpt`, `body`, `image`, `author_id`, `is_published`, `created_at`, `updated_at`, `published_at`, `category_id`, `view_count`, `deleted_at`)
VALUES
	(1,'Projekt3','projekt3','Laudantium dignissimos veritatis ex in illum rem.','Iure repellat ducimus qui sint aspernatur pariatur ipsam aut. Est culpa a hic pariatur rem aperiam. Non enim in molestiae et aut dolores.','<p>Voluptas impedit dolore aliquam labore. Doloremque laborum at consequatur. Ut rerum et aut aut tempore quia. Et non non veniam maxime. Minima expedita est quia fugiat voluptatem aut et. Autem a quia velit eum nisi. Consequatur ipsam id sit vel. Nam minus voluptatem eos ipsa aperiam vel. Dolores non et illo dolores architecto quo velit. In quos aut odio sed saepe voluptatem reiciendis. Non architecto et hic veniam nostrum aliquid beatae. Inventore in voluptatem soluta expedita impedit natus ratione aliquam. Repellendus velit ut libero iusto. Veniam officiis sunt et animi. Officiis omnis et repellat perspiciatis minima necessitatibus saepe. Ut non expedita quisquam vel enim. Qui libero et ratione atque. Necessitatibus commodi quae qui sint consequatur. Quia a earum aut quo nulla magni tenetur. Eius quae sunt quia aut excepturi. Nihil eos sed beatae et officiis perferendis libero. Voluptas non consequuntur laborum ex at non atque doloremque. Ratione corporis dolores modi eligendi aut eaque sed. Aut natus beatae mollitia sint. Nesciunt sit eveniet ab dolores culpa qui odit est. Provident cupiditate non et nulla ut aut aperiam. Et impedit culpa tenetur ut nobis esse. Aliquam vero et autem assumenda dolorum. Et minus neque aspernatur quis et. Debitis incidunt et consequatur. Dolor est autem provident soluta natus sit voluptate. Deleniti ab sed asperiores odio aut. Cupiditate cum excepturi unde quam eos odio dolores. Facilis officiis sequi beatae nisi et aut et. Voluptatum consequatur aspernatur dolorem eum. In earum fugiat velit tempora. Sint accusamus optio ipsum nemo. Harum blanditiis facere voluptas sed sunt sunt illum. Facilis quaerat earum voluptatem molestiae sint doloremque qui. Natus architecto ut nemo quo adipisci eum animi. Eius tempore velit ea delectus. Autem accusantium sed et deleniti provident dolor est optio. Quia id pariatur totam beatae nemo dicta. Id suscipit expedita necessitatibus tempora et reprehenderit velit. Nisi et in et soluta quia explicabo molestiae non. Quis numquam cumque consequuntur dolores. Et nulla incidunt rerum et. Nihil optio et eos quia exercitationem fuga quos. Quos explicabo qui nobis. Iste et voluptatem et officiis non repellendus laudantium. Eius debitis expedita et dolore et excepturi. Quos voluptatibus pariatur sit incidunt.</p>','Post_Image_3.png',2,0,'2016-06-21 09:00:00','2017-09-05 22:36:26','2016-06-21 09:00:00',2,23,NULL),
	(2,'Consectetur repellat sint sunt sapiente sequi illo.','nisi-dolor-placeat-possimus-et-sunt-ipsum-nam','Pariatur temporibus dolorem impedit quo necessitatibus esse atque.','Quis et blanditiis nesciunt expedita inventore molestiae aut. Ipsa enim eos rerum beatae. Quam deleniti corrupti iure. Quis accusamus rerum sit repellendus. Velit quis et repudiandae id fugiat dicta.','<p>Ut amet odio maiores officiis et. Molestiae qui illo deleniti iure et ullam. Porro commodi error impedit quod assumenda ipsum quas soluta. Vitae recusandae eveniet necessitatibus consequuntur omnis quaerat dolorum. Harum atque ut ut. Qui vel doloribus ipsam omnis. Deserunt blanditiis et saepe deleniti possimus reprehenderit. Molestiae accusantium et perspiciatis vero dolor non minima. Assumenda dolorem omnis aut est doloremque fuga adipisci. Dolor omnis ratione vel sunt sit. Consequatur et rerum aut. Et repellat a iusto eaque iste velit aspernatur. Vero est temporibus odit quod dignissimos voluptate et omnis. Earum similique molestias voluptas dolores. Culpa voluptatem sapiente sed cumque quia. Et ipsa ut veritatis exercitationem est qui. Nulla eaque quod itaque perferendis quas omnis excepturi. In tenetur suscipit et et a explicabo. Velit dolorem ut odit qui ut ipsam maiores placeat. Et id laboriosam dolores magnam laborum et. Et dolor facilis nihil nisi. Exercitationem in sequi magnam. Aliquid saepe ut rerum error est. Tempore aut aut impedit maxime id. Deleniti vero dignissimos in ab. Cupiditate amet velit nemo reiciendis enim. Enim suscipit voluptatem dolorem et sunt non provident. Enim ut enim voluptatem. Rem et cum fuga et et. Voluptatem facere velit sit atque. Iste qui minus sapiente consequuntur labore dolorum. Id totam quis vitae at aperiam molestias. Odio ut ipsum repellendus in et quae quod. Rerum beatae rem ea enim. Provident incidunt quas ducimus enim eaque odio voluptatibus. Eaque possimus sint repellendus quae architecto nemo quia eum. Beatae adipisci quaerat et aliquam. Quibusdam rerum quod dolore necessitatibus dolorem doloribus. Consequuntur eaque ad ipsa et dolorem sint magni. Aut facilis qui nihil quos dicta. Aspernatur quia numquam dolorem enim sunt repudiandae. Consequatur nisi architecto voluptatem tenetur recusandae consequatur et. Vitae magnam odit impedit molestias est nihil. Sit ut cupiditate qui nisi et. Tempora rerum autem dolorem doloremque expedita quis ut aut. Dolorum suscipit aut possimus aliquid et dicta.</p>',NULL,1,0,'2016-06-23 09:00:00','2017-09-07 14:27:39','2016-06-23 09:00:00',6,42,NULL),
	(3,'Ullam incidunt eos eius eum omnis quam ducimus.','vel-quod-pariatur-neque-repellendus-voluptatum','Excepturi et dolore eum dolor fugiat animi sunt non iure.','Quibusdam neque illo voluptatum. Illo exercitationem amet non. Soluta voluptatibus praesentium ex enim.','<p>Est est adipisci voluptatem voluptatibus ut delectus quod. Ut debitis deserunt officiis. Dolorem ex omnis occaecati aspernatur ullam sit quo. Harum minus aut quas. Ratione nihil omnis aut voluptatem sit ut nam. Sit ratione ratione et debitis sit consequatur ea. Consectetur consectetur libero est voluptatum reprehenderit voluptatum occaecati. Nam cum pariatur numquam est sint. Atque corrupti iusto vel. Enim ut quo nisi dicta. Aut alias ab exercitationem quaerat quam reiciendis. Sint quod velit asperiores soluta voluptas animi. Aut incidunt autem voluptatem qui sit. Earum magnam explicabo aut fuga aut et. Temporibus quo rerum ad vel omnis architecto. Aliquam ut sapiente earum assumenda dolorum. Modi natus vel alias dolores atque eligendi blanditiis rerum. Tempora sed nostrum nemo magni repellendus necessitatibus et. Sequi qui deleniti dolore reiciendis ipsum aut. Totam nulla autem necessitatibus incidunt sed. Sunt odit et natus voluptatem rerum tempora. Consequatur eveniet architecto ipsam totam voluptates est. Hic numquam modi expedita id qui facilis nobis dolor. Animi aliquam quaerat esse. Id aut eos id praesentium. Maiores nemo eum et et. Soluta dolore temporibus magni quod modi libero. Recusandae corrupti labore fugiat dolores. Accusantium sit sequi possimus modi molestiae. Rem ut ipsam velit atque dignissimos assumenda. Ratione et temporibus perspiciatis commodi. Et ut quaerat optio accusantium consequatur aperiam. Voluptate deserunt excepturi quia alias. Soluta voluptas explicabo dolor voluptatem eligendi qui. Laborum reprehenderit est sint quo nesciunt quia dignissimos. Repellendus voluptas earum doloribus explicabo. Nobis sit possimus deleniti tempora. Voluptas quia est eum et suscipit molestiae est aut. Ducimus placeat ut eveniet aliquam. Iusto dolorum veritatis sint ab ullam illum. Dolorem est ut consequatur error. Quia repudiandae officia porro libero totam. Quod est voluptas dolorem sapiente. Quisquam asperiores ratione assumenda aperiam. Ut illo repellendus cum. Rerum accusamus facere vel unde deleniti qui. Ipsa eveniet dolores fugit vero et debitis. Quaerat veniam dolor molestiae quia ex eveniet. Nemo omnis numquam consequuntur aperiam minus est velit. Nihil quisquam cum eius dignissimos rem aspernatur praesentium. Quos iusto voluptatem quis aut. Qui sit dolorem nihil et magni quod sunt. Ipsa quia laborum explicabo commodi sit.</p>',NULL,1,0,'2016-06-26 09:00:00','2017-09-07 14:27:32','2016-06-26 09:00:00',5,33,NULL),
	(4,'Architecto eius ut quam repudiandae soluta.','et-illum-non-eum-est-iste-cumque-ullam-cupiditate','Vitae voluptas reprehenderit rerum cum aliquid.','Voluptas exercitationem earum optio magnam. Et voluptatum in sint et asperiores sapiente commodi. Molestiae nam ut et et.','<p>Quam autem perspiciatis eaque temporibus placeat similique. Voluptas in atque mollitia occaecati quo. Tempora rerum numquam dolor dolore esse ipsum et. Molestias maxime quidem facere eaque ipsa autem doloribus qui. Est unde cumque expedita maxime soluta accusantium. Est aperiam eligendi debitis voluptatem qui. Iusto rerum eum vel neque. Aliquid sit ut numquam id. Perferendis dolorum et amet sit. Eveniet dolor sit assumenda omnis praesentium. Nisi consequuntur ut nulla adipisci impedit quasi. Debitis quis quo odio esse sit hic exercitationem. Molestiae doloremque expedita placeat iure consectetur. Excepturi accusantium velit amet expedita illum. Sit recusandae incidunt est sequi. Quia quia ducimus nobis cupiditate. Sed qui maxime repellat ea esse earum et. Quasi rerum quam quo repellat. Velit consequuntur aperiam impedit. Hic velit eaque architecto. Et similique ut quos aut voluptas veritatis. Odio voluptas beatae maiores consectetur sapiente unde fugiat. Cum repellat quia facere in quas ut. Eos vel illo odit tempora. Et magni alias et aspernatur laborum distinctio sapiente et. Facere deserunt omnis occaecati qui perspiciatis. Suscipit modi minus quisquam pariatur culpa repellendus. Natus blanditiis ut incidunt officia non et necessitatibus. Itaque occaecati maiores eaque molestias doloremque. Optio beatae tenetur facere voluptatem distinctio pariatur. Sit blanditiis quibusdam nostrum ipsum ea animi dolorem. Laboriosam enim blanditiis laboriosam. Ea asperiores nostrum dolor id possimus a. Qui sed dignissimos sapiente nisi libero suscipit. Deserunt debitis doloribus vel.</p>','Post_Image_1.jpg',1,0,'2016-06-30 09:00:00','2017-09-07 14:55:44','2016-06-30 09:00:00',5,75,NULL),
	(5,'Projekt2','projekt2','Mollitia fugiat velit blanditiis autem et assumenda rerum nihil dicta.','Atque consequuntur nam odit nisi. Modi et repellat temporibus harum. Quis natus et voluptate occaecati.','<p>Itaque doloremque natus voluptas. Quos molestiae veritatis reiciendis ut. Rerum non earum possimus aut molestiae accusamus possimus. Est et recusandae non illum. Architecto perspiciatis alias dolor qui atque. Eligendi rem est enim velit aspernatur consequatur. Excepturi quia ut soluta omnis. Veniam ut quidem quam voluptatem delectus unde enim. Nemo id quod voluptatem eius eveniet nisi. Ducimus consequuntur ut quis aut et porro. Deleniti dolor rem placeat iste dignissimos ea. Atque aut voluptate ex quo iusto. Rem omnis officia est ut culpa nihil voluptas ut. Quas fuga non enim dolorem eveniet sapiente qui. Aliquam perspiciatis quo molestias magnam. Autem nulla dolore fugit sed. Et natus vel quis. Veritatis enim aut sint reiciendis. Quia non error fugiat et odit ducimus ratione. Dolores consequatur sit natus qui. Dolor expedita mollitia facere et. Dicta et sint dolorum. Corrupti consectetur cupiditate sed quos. Aut rerum ullam nesciunt voluptatem esse. Nam facere laudantium saepe est. Facilis quis sit et neque. Iusto molestias fuga sed accusantium. Necessitatibus vel et est dolorem. Illum est ab ut quod. Repellat quam et architecto praesentium corrupti veritatis. Molestiae est dolores et quam sapiente commodi. Cupiditate laboriosam occaecati ut. Quidem in nihil pariatur. Eum saepe at velit similique harum ut est. Accusantium fugit eos itaque rem corporis ullam sequi aspernatur. Officia beatae nam ut perspiciatis.</p>','Post_Image_2.png',2,0,'2016-07-05 09:00:00','2017-09-05 22:36:06','2016-07-05 09:00:00',2,45,NULL),
	(6,'Aut odit et reiciendis.','doloremque-recusandae-nemo-corrupti','Sed aut molestiae possimus sed illo quo.','Tenetur aut architecto itaque hic amet et quia officiis. Quasi numquam voluptatem consequatur autem et. Nostrum eos magnam qui eligendi provident repellendus modi non.','<p>Ea in eaque possimus rerum nostrum. Molestias sit qui aut recusandae fugit dignissimos error. Ut ipsa facere quasi dolorem placeat porro. Ut qui officia eos omnis molestias ut est. Ut est reiciendis deserunt qui. Quibusdam repellendus blanditiis repudiandae nesciunt ab. Vero est velit sapiente. Voluptatum minus et excepturi repellendus ut. Dolor sapiente recusandae ipsam repellat eaque quia. Ipsum deserunt doloribus officia. Harum hic rerum aperiam molestiae qui deserunt. Quidem explicabo incidunt culpa recusandae aliquid. Aut libero sit consequuntur qui occaecati. Autem veniam aut odit vel nostrum ducimus. Tempora expedita harum non delectus. Expedita et et consectetur delectus est. Quia nam ipsa sint architecto exercitationem labore impedit. Beatae ea vero a velit velit fugiat sed. Consequuntur et magnam architecto voluptatem. Itaque maiores est et officiis cupiditate. Quos aliquid repellendus et nihil qui ut. Omnis et suscipit aut eum accusamus molestiae incidunt. Reiciendis eum corporis eligendi. Ratione nam possimus at earum quia ea. Consequatur sed quasi necessitatibus. Qui libero est dolores dolorem. Numquam eius cum vel ex nihil aut perspiciatis. Perferendis doloremque voluptatem numquam accusantium non. Quo tempora natus vel et fuga. Sint voluptas ut qui veritatis eaque explicabo. Et tenetur ipsa sed libero voluptas est. Nulla et ipsam quisquam dolorum repellendus iusto qui. Nemo cumque voluptatibus est enim eligendi optio. Ut exercitationem voluptatem est alias mollitia quae laudantium nobis. Veniam fuga dolorum labore non. Asperiores minus porro suscipit pariatur veniam earum nobis. Recusandae minus autem sapiente temporibus numquam. Nam officiis impedit maiores voluptas sint delectus. Dolores provident cumque sapiente et dolorum. Voluptatem rerum consequatur sapiente voluptatem reiciendis ipsum. Quisquam sed commodi et voluptates sed maxime placeat. Magni id ut consequatur ut qui facilis. Explicabo eos inventore commodi nemo. Repellendus quaerat ullam ullam vero rem expedita aut. Rerum voluptatum soluta consequatur eius exercitationem. Error enim qui fugit dolores sit enim ducimus consequuntur. Error et aut et architecto. Animi vel laudantium delectus vitae. Impedit magnam iure rerum. Impedit saepe rerum enim sint sapiente ea. Eius illum dolorum consectetur omnis aut ut fuga.</p>',NULL,3,0,'2016-07-11 09:00:00','2017-09-07 14:27:03','2016-07-11 09:00:00',3,57,NULL),
	(7,'Projekt1','projekt1','Eveniet voluptatem sequi velit odit aut id.','Debitis nobis repellendus ad quasi. Quidem ea adipisci ut provident tempore facilis pariatur. Quidem et voluptatem facilis eos sequi maxime.','<p>Itaque dolores voluptatem molestias maxime. Ipsum dignissimos eveniet culpa velit sequi. Est aperiam corporis et ut. Ipsa et omnis distinctio doloribus ducimus molestias. Aliquid tenetur maiores minus assumenda. Ipsa sequi aliquid eum et veritatis dolorum nulla. Dolore vel quae officia. Ut vero velit blanditiis officiis harum quis qui. Eaque corporis rem perspiciatis aperiam adipisci veniam temporibus. Laboriosam illo perspiciatis facilis est. Eos repudiandae quos alias sit aut repellendus. Voluptatibus laudantium dignissimos assumenda et quae reprehenderit. Magnam soluta recusandae qui qui at rem vitae. Eos quis qui enim eos iste. Sed nobis praesentium totam explicabo. Sint quia ipsam omnis sit quaerat illum et. Atque perferendis minima ut. Sequi vel reprehenderit ex modi hic saepe. Quod eius quo odit similique. Libero rerum maxime fugiat sit. Est omnis libero quia minus fuga provident tempore. Pariatur nam aut exercitationem ut. Deserunt eos veritatis soluta repudiandae dicta veniam molestiae. Consequatur amet numquam voluptate eaque. Quae sit magnam cum iusto. Eveniet voluptatem quos quibusdam laudantium. Sunt eligendi dolor nihil omnis. Dolorem id est repellendus et aut sed. Quibusdam autem eius voluptatum quam aut recusandae. Veritatis perferendis omnis possimus non similique ipsa. Libero ducimus ut porro iste laboriosam mollitia. Consequatur sequi aliquam sit ut. Aperiam tempora eos temporibus provident excepturi. Ab quasi commodi voluptatem autem tempore molestias. Temporibus iste quisquam suscipit molestiae eveniet. Maxime non aspernatur sed nulla. Quis officia voluptas molestiae vel porro consequatur architecto. Rerum ad consequatur optio rem reiciendis. Ullam qui dolor quia et. Id natus excepturi labore quisquam voluptatem officiis. Tempora et deserunt reprehenderit voluptatem atque. Eum tenetur molestias quia. Fugit similique molestias accusantium id voluptatem itaque dignissimos. At dolor accusamus nihil ad autem. In tempora omnis consequatur sint quo eius in. Eius quis consequatur officiis facilis sunt possimus aut minus.</p>','Post_Image_4.png',1,0,'2016-07-18 09:00:00','2017-09-05 22:35:31','2016-07-18 09:00:00',2,38,NULL),
	(8,'Maiores deserunt magnam aperiam nisi.','illo-ab-id-non-est-possimus','Autem autem debitis perspiciatis exercitationem.','Expedita nesciunt vero cum praesentium. Ex quibusdam minima consequatur perspiciatis sed. Provident ipsum quos culpa aliquid eveniet sunt.','<p>Ipsam aut autem tempore aut ut dolorum quia. Sapiente rerum corporis non dolor reprehenderit. Non quo nesciunt maxime eius voluptas blanditiis facilis. Fugiat beatae nemo nisi optio error. Alias laboriosam suscipit nemo ducimus. Qui voluptatem facere id dolores. Architecto mollitia sequi tempora. Porro sequi reiciendis ab nihil. Fugit hic et occaecati fugiat enim eum officia. Iusto voluptas sit ea. Et voluptatibus quidem quis temporibus at deserunt. Temporibus minus maiores dolorum ad. Neque enim velit molestiae consectetur. Dolores explicabo eum quo et pariatur. Iure totam et voluptas perferendis fugiat minus. Tenetur consequuntur consequatur minus vero esse minus. Mollitia officia quis nulla dolores. Quis sed nihil officia et sunt at aut qui. Architecto ipsam nisi qui consequatur voluptatum magni deleniti. Exercitationem eveniet temporibus temporibus minima reprehenderit laudantium eum quo. Recusandae illo quo voluptate et maxime. Eius non et ab occaecati. Quo mollitia neque dolores aspernatur voluptatem. Et molestiae molestiae dolore a ab suscipit. Nam blanditiis delectus qui labore autem. Ab est culpa omnis incidunt ut. Ea officiis aut et molestiae. Eaque laboriosam laborum cumque dolorem vero odit nemo. Autem quae omnis vel numquam. Eius aliquam a eum vero illo ea. Voluptatibus odio nihil odit quia hic magnam. Harum voluptate libero aut. Adipisci quia quia laborum adipisci sint. Quisquam temporibus expedita minus voluptatum voluptatem aspernatur saepe. Facilis omnis impedit vitae sit quidem incidunt voluptatum accusantium. Commodi laboriosam voluptate rem libero. Cupiditate nisi architecto et voluptatum perspiciatis est. Rerum et rerum sed a. Quibusdam sequi enim nulla veniam. Neque ut qui quia dolorem natus aut. Modi eum omnis alias eligendi nemo aliquam quia. Qui incidunt vel est quis excepturi. Sed aperiam quod optio recusandae quia. Quae quae officia dolor autem et quod. Reprehenderit et molestias dolore nihil vel.</p>',NULL,1,0,'2016-07-26 09:00:00','2017-09-07 14:26:47','2016-07-26 09:00:00',3,109,NULL),
	(9,'A nemo non error ut.','sed-non-provident-beatae-aut-autem-dolorem','Hic modi maiores consequatur voluptatem minus autem necessitatibus qui perferendis.','Ut molestiae doloribus est quibusdam. Labore nihil nihil atque. Reiciendis minima inventore sit sint nostrum.','<p>Eos quis laboriosam ab vero nemo. Eos harum libero praesentium veritatis aliquid velit. Nisi saepe sint eius blanditiis est. Consectetur nulla rerum in consectetur fuga id. Autem porro ea quia dolores molestiae enim cumque velit. Optio aut atque rerum aut eius nihil. Odio ipsa quam enim voluptas dolorem unde quasi minima. Non amet dignissimos autem dignissimos voluptatem. A hic praesentium in. Voluptas quod voluptates cumque distinctio rerum cupiditate incidunt. Cumque illum aperiam dolorum non est. Ratione laborum dolorem ut voluptatibus asperiores. Delectus debitis enim nostrum ipsa ut maiores. Sit est qui dolor similique esse quo. Animi eaque cum nemo sapiente. Laboriosam neque ad nostrum sint numquam nulla. Voluptatem iste qui ut alias nemo et voluptas qui. Voluptatem vel sapiente corrupti ea et ut. Aut ipsa ratione nobis omnis aperiam odit modi. Optio quae voluptatem et aut quis accusantium magni. Iure consectetur dolorum reprehenderit ut quia. Aut consequatur optio ut id aut est sint. Earum explicabo nam numquam iusto aut et aliquam. Voluptatem ut praesentium ut officiis. Quod beatae iusto molestiae. Inventore molestias quis corporis ut qui et dolore nulla. Ex dignissimos eos est odio. Architecto est suscipit ipsa fugiat blanditiis ducimus qui. Sed quia illum dolorem eligendi. Vitae in consectetur in ipsam. Ipsam commodi nihil accusantium. Laudantium fugit dolore expedita perferendis quibusdam laborum. Esse consequatur voluptatem vel repellat et. Quia incidunt veritatis quam expedita expedita laborum magnam. Ea tempora voluptates et itaque voluptatem enim facilis odio. Ut harum suscipit cum reprehenderit. Aut aliquam exercitationem cumque. Voluptas sit totam assumenda saepe possimus sit nisi. Culpa magnam laboriosam tempore ut. Quaerat optio nisi quo suscipit. Alias libero dolores nihil repudiandae dolor ullam perferendis. Qui enim minima ipsa eos. Sint doloremque animi consequatur iure perferendis neque. Cum ab et possimus velit dicta. Expedita ut a magni voluptatibus. Debitis ratione omnis distinctio in cum asperiores. Commodi non sit sint veritatis quibusdam repellat placeat non. Quis nam iste voluptate officiis assumenda consequatur dolorum. Assumenda illum accusantium dignissimos distinctio ullam. Et a aut quos nulla voluptatem et quia vitae. Hic dolor rerum voluptatem nisi aliquid. Numquam rem distinctio quod molestiae dolorum deserunt.</p>','Post_Image_2.png',1,0,'2016-08-04 09:00:00','2017-09-07 14:26:43','2016-08-04 09:00:00',6,30,NULL),
	(10,'Nemo quod veniam aut sed aut fugit placeat.','voluptatibus-tenetur-molestias-reprehenderit-iste-nihil-qui-et-alias','Voluptatem sint aliquam culpa assumenda aspernatur occaecati aut architecto sapiente illum soluta.','Eaque rerum nisi quibusdam ut. Ullam officiis illum aut libero ex. Ipsum maiores qui quo dolores aliquam et aut.','<p>In vel ad fuga dolorem iusto. Vitae voluptas voluptas nihil magnam. Facere praesentium ut molestiae repudiandae consequatur velit. Vel dolor expedita alias deserunt. In omnis et est et recusandae sed odio. Distinctio voluptas assumenda molestiae accusantium. Sit mollitia et blanditiis est architecto deserunt mollitia. Eos omnis sint cupiditate amet. Dolore reprehenderit alias consequuntur. Quia nobis labore est explicabo enim nostrum fuga. Quidem autem quas qui qui placeat voluptatum velit delectus. Modi qui sed autem id dolor. Eum ut eum placeat voluptatum. Iusto est excepturi quia porro. Sequi vitae reprehenderit voluptatem cumque accusamus libero quisquam. Laudantium at totam est at. Velit quidem cum laudantium distinctio voluptatem repudiandae maiores. Eius nemo debitis earum voluptatem est omnis dignissimos. Non et tempora perferendis hic distinctio soluta. Odit saepe quos excepturi vitae sapiente praesentium enim. Aut et at libero. Voluptatem enim perferendis et perspiciatis qui qui quis. Dignissimos aut porro perferendis velit porro iusto voluptatibus velit. Voluptatibus mollitia omnis est qui sunt culpa. Et non ab ex maiores sit velit ut minima. Ut ab unde excepturi quia nisi alias earum aspernatur. Doloribus aperiam sit praesentium suscipit recusandae dolorum. Aut consectetur similique quo vero officiis aut. Accusantium repellendus et odio dolor architecto suscipit dolorum quo. Sequi odit molestiae beatae repudiandae corrupti. Sint eum aut ipsam et possimus qui. Dolorem esse sint qui. Modi aspernatur magnam sunt aut. Quia eveniet ut natus enim. Inventore exercitationem quod delectus. Enim possimus laborum aut aut voluptatem. Esse ipsum et modi nemo nam odit. Voluptatum ratione dolorem doloremque nihil culpa amet officia quos. Molestias debitis est voluptatum excepturi eos ut optio. Aut quaerat aspernatur exercitationem reprehenderit reprehenderit alias. Itaque cumque consequatur est sapiente. Debitis saepe sit ipsum. Ex culpa quas at sit commodi accusamus qui. Numquam et consequatur voluptates repudiandae illo id.</p>','Post_Image_3.png',3,0,'2016-08-14 09:00:00','2017-09-07 14:26:35',NULL,4,100,NULL),
	(11,'A ea magnam temporibus sunt ut at voluptatem facere.','et-quis-labore-doloribus-ipsum-minus-dolor-ad','Exercitationem quis reprehenderit quidem voluptates.','Aut autem esse velit qui quibusdam qui et. Mollitia vel ea totam aut. Nihil voluptatibus quis velit est voluptatem doloribus eveniet.','<p>Sed ut suscipit quia modi. Rerum alias hic facilis consequatur et neque. Soluta tempore omnis et accusamus. Beatae dolores velit veritatis ea et qui repudiandae. Et earum aliquid quis praesentium quas. Laudantium ex pariatur soluta. Harum quos odit pariatur officiis dignissimos ab et. Dolore sit ut incidunt. Quia sed vero qui pariatur necessitatibus perspiciatis et. Aspernatur et sit enim quo. Atque voluptatum vel sit et adipisci eius. Tempore perferendis est voluptas et ut exercitationem qui. Aut quam totam et fugit aliquam cumque. A voluptatem voluptatum nulla. Vero distinctio sunt ratione iusto. Tenetur consequatur fugit minima vitae. Cumque voluptas praesentium ut. Et omnis id dolorem est. Possimus nam itaque omnis. Alias eaque voluptatem magni iure sed sunt. Harum voluptas optio autem nulla in modi. Ab ea deserunt qui totam aliquam quasi. Optio quidem laboriosam aut explicabo voluptas ducimus totam. At delectus at autem voluptatibus omnis repellat sunt accusamus. Praesentium quae commodi suscipit dolores cupiditate harum voluptas. Ad aut placeat temporibus aut voluptas at voluptas. Reiciendis qui dolorem dolore est non officiis repellendus. Velit sed dolorem maxime optio. Sunt pariatur aut quos consequuntur quia occaecati voluptates. Ipsum harum libero voluptatem quasi repellendus dolores. Molestias doloribus porro consequatur animi quo molestiae. Beatae modi architecto adipisci dolor recusandae quaerat. Provident velit sint enim optio. Cum corrupti ut quas quia nostrum ut. Quae enim et nemo sed non illo. Iusto natus asperiores qui facere. Non ipsum nihil eum placeat ex sed. Accusamus ut quas aut nihil. Provident rerum ipsa porro fuga. Dolor ipsa quam amet sit molestias quibusdam. Eius similique corrupti incidunt deserunt ut dolore. Velit officiis enim voluptas sint quia. Et expedita similique molestiae. Maxime dolorum minima et omnis et repellat id. Recusandae eum quis aspernatur totam. Nobis quia tenetur minus eos neque pariatur. Est soluta ducimus labore et quo. Autem molestiae libero aperiam laboriosam et ex. Est sunt fugit in dolorum a. Non nam assumenda quae error. Perferendis autem quae quis voluptatem aspernatur ut. Nam commodi pariatur maxime labore in quis. Voluptas velit est aut et velit dolorem. Possimus voluptatem eaque velit eum dicta dolores.</p>','Post_Image_3.png',3,0,'2016-08-25 09:00:00','2017-09-07 14:26:26',NULL,6,101,NULL),
	(12,'Expedita sit velit aut perspiciatis vel dolore.','esse-qui-quia-possimus-rerum-rerum-facere-aut','Incidunt autem ipsum aut voluptatem perferendis dolor ducimus asperiores a.','Perferendis commodi qui iusto illum sed perspiciatis. Et consequatur quidem eligendi dolores. Possimus dolorem excepturi aut nisi incidunt voluptas. Non ut quod quae.','<p>Accusantium atque velit voluptatem voluptates. Voluptatem sed sit modi magni quia assumenda esse. Vitae aut magni deserunt ullam. Nisi vero sit quaerat qui vitae. In et soluta voluptatem voluptas corrupti voluptatem voluptatum. Earum minus nulla ratione voluptatem et. Est omnis sunt et laudantium magnam porro modi. Possimus dolores non nam aut. Harum sit in eum numquam. Sed eius molestias aut et magni est quia. Dignissimos totam enim id ipsam praesentium deserunt quia. Recusandae et illo natus sed sed ab deleniti. Necessitatibus repellat sit voluptas et molestias rem. Est blanditiis et ullam rem eos provident. Et debitis asperiores exercitationem quibusdam molestias et. Voluptatem optio commodi modi illum nostrum recusandae qui excepturi. Similique mollitia possimus eaque ut rerum et repellendus. Aut velit provident quos et maiores ipsum. Qui excepturi quasi qui accusamus sed. Ab perspiciatis beatae laboriosam quam quisquam. Nihil minima iusto exercitationem esse quas quas dolores. Ut ipsam a enim sit debitis cumque. Inventore hic recusandae ipsam ipsum. Voluptatem aut omnis sequi debitis provident. Vel distinctio aliquid voluptatem et dolores similique. Et rerum esse et tenetur. Sunt ut nemo tempore magni. Eaque earum dolore vero earum debitis et earum. Odit sunt ut dicta sint officiis molestias omnis. Odit sint animi animi reprehenderit sunt commodi. Omnis sapiente vel et hic libero ipsum ipsam. Veniam distinctio quis id. Voluptates distinctio numquam aliquid tempore mollitia iusto. Itaque numquam qui dolores eos sit ut. Eos et in quam ad aspernatur amet. Iure inventore fuga numquam vitae. Repellat voluptas quibusdam accusantium a repudiandae provident.</p>',NULL,2,0,'2016-09-06 09:00:00','2017-09-07 14:26:22',NULL,4,112,NULL),
	(13,'Asperiores laborum cum dolor cupiditate dolorum.','est-exercitationem-placeat-similique-consequatur-sequi-est-dolores','Similique ea perspiciatis et consequatur saepe.','Ut consequatur magni cupiditate esse qui maxime. Nobis aut occaecati dolores consectetur nihil. Dolores dolor vero eos magni. Provident aliquid omnis optio optio quidem aliquid.','<p>Vitae provident porro est inventore velit error. Necessitatibus iure voluptatem saepe quo omnis omnis consequatur voluptatem. In dolor facilis qui numquam. Et quos consectetur quo temporibus mollitia eum. Veniam sapiente ex earum aut. Aut deleniti unde voluptatem sint voluptates delectus quia. Illo quidem consequatur voluptatem qui non. Aut omnis doloribus dolorem voluptatem quia. Vel reiciendis distinctio sed quae. Amet rerum quia vitae consequatur sed ab sed molestiae. Voluptates perspiciatis voluptates nihil nisi. Cupiditate cupiditate inventore dolorum fugiat qui deserunt. Accusantium inventore alias ut reprehenderit veritatis. Exercitationem atque laboriosam et omnis. Nostrum harum sit iste quo rem ut. Facere officia et dolor dolor dolores. Debitis quos nesciunt recusandae quos. Qui illum blanditiis possimus id ipsa. Corrupti cupiditate fugit ratione iste quia esse eos. Veniam reiciendis nostrum soluta iusto quidem asperiores deserunt. Iure dolorem voluptas libero quaerat libero quisquam dolorum nobis. Sed tenetur doloribus omnis. Dolor voluptatum inventore odit. Consequatur quis in excepturi a aperiam laborum magni. Aliquid exercitationem aliquid sapiente rem natus accusantium provident eaque. Sint est repellendus ut odio autem voluptate. Est animi aut numquam itaque ullam quo. Voluptatem officiis quia voluptatem ab a doloribus eos. A modi aut eum. Quidem quo sunt voluptatem architecto doloremque quibusdam iusto quidem. Qui repudiandae nobis aliquid. Laudantium neque aut illo deleniti facilis. Culpa et maxime sed maxime ipsum. Qui aliquid fuga nihil excepturi. Autem beatae est in reiciendis dolores. Magni iure eligendi velit aliquam officia et. Ut ducimus eum natus nulla similique. Eaque accusamus quia excepturi atque ipsum esse porro. Aut rerum autem necessitatibus animi fugit. Voluptatum sequi saepe porro. Autem non illo sed ut rerum modi dolorum. Eum veritatis distinctio distinctio ipsum rerum. Doloremque vitae est dicta sequi corporis similique voluptatem. Est repellendus voluptas vitae. Quaerat illum sunt et quasi vel qui est. Eveniet aspernatur praesentium veniam. Aut voluptatum non molestiae id et tenetur. Vel consequatur et aut asperiores error est. Qui cum et ut autem facilis sint officia. Reiciendis reprehenderit est fugiat exercitationem.</p>',NULL,2,0,'2016-09-19 09:00:00','2017-09-07 14:26:20',NULL,4,93,NULL),
	(14,'Quisquam fuga recusandae placeat cumque.','quibusdam-maiores-nemo-atque-repellendus-ratione-quaerat-et','Omnis necessitatibus ut et dicta similique non est quis.','Vero harum eligendi blanditiis aut molestias. Aut nihil ducimus ea in quia nostrum consequuntur. Laborum autem quo ea quae fugit occaecati. Fuga dolore expedita modi corporis. Repellendus vitae eaque ut molestiae.','<p>Aut exercitationem dignissimos et modi est id totam. Reiciendis delectus iusto architecto pariatur. Voluptatum sit quisquam temporibus recusandae. Maiores et ut sed distinctio iusto ad vel dolor. Cupiditate soluta nulla sint pariatur. Nobis aspernatur est error accusantium qui. Quia ut modi sunt animi excepturi et dolor incidunt. Doloribus asperiores ipsum autem sequi. Ut error ad voluptas eius rerum est nemo. Aut soluta incidunt nihil ut saepe a aut. Quia quibusdam et magnam est. Fuga impedit maiores eum maxime necessitatibus quo. Quia architecto consequuntur corporis impedit ipsum magnam. In ratione a ipsum saepe voluptatibus amet molestias. Cupiditate quis assumenda quas et explicabo unde eveniet dicta. Ipsam natus vero sunt eos quo nulla. Quod perferendis odit sit officia maiores. Delectus unde aut veritatis similique libero nemo eveniet veniam. Eveniet numquam ea mollitia est sed ipsum. Ipsa earum a a. Iusto deleniti praesentium id soluta sunt enim ex. Eaque similique laborum ut quia sit vero sit. Consequatur veniam sed nulla quo. Quia ut doloremque aut et sed. Quasi ex ullam illum atque. Ea sed nostrum magnam illum animi. Rerum consequuntur et tempore omnis et rerum nostrum. Sit et totam aut nesciunt. Hic voluptatem quos est ratione voluptates explicabo. Error dolorem incidunt laborum asperiores aut. Rerum non ut molestiae consectetur minima. Omnis incidunt sint aut nobis rerum natus quia. In voluptas ipsa aspernatur. Veniam tenetur voluptatem esse veniam tenetur. Perspiciatis eveniet dolores sapiente. Aut sit alias mollitia in eos voluptate ea qui. Dolore est et ut saepe. Laudantium sequi est illo voluptas eos qui dolor. Porro quaerat omnis perspiciatis rerum. Fugiat maxime dolorum sapiente harum earum. Dicta adipisci iure saepe rerum fugit. Laudantium earum explicabo ut quaerat. Qui officiis pariatur dicta omnis et magnam.</p>','Post_Image_3.png',1,0,'2016-10-03 09:00:00','2017-09-07 14:26:17','2016-10-07 09:00:00',5,76,NULL),
	(15,'Dignissimos accusamus optio aut repellendus ex dolor.','exercitationem-adipisci-aspernatur-exercitationem-dolorem-blanditiis','Et qui autem est et et mollitia.','Qui consectetur laudantium repudiandae architecto id voluptas non. Id excepturi eos et quas.','<p>Hic sed a ab quo. Maxime beatae at doloribus dolor ratione. Quos esse voluptate minus voluptatum. Maiores eos cumque rerum. Sapiente saepe voluptatem incidunt maxime possimus fuga consequatur tempore. Labore ea nihil quia quia. Accusamus facilis reiciendis ullam aliquid deleniti. Qui quae non velit unde sed ut corrupti sint. Blanditiis vitae animi aut assumenda corporis commodi tenetur ut. In ut qui ab laboriosam. Quia ducimus ea ipsa quis exercitationem rem beatae. Cum ea quaerat nemo dolore tempora consequatur totam sequi. Ut perspiciatis quia deserunt quo qui. Est consequatur enim illo similique sint. Quas distinctio sed a et qui id id. Culpa minima temporibus distinctio dolorum sunt occaecati eius. Perferendis ut deleniti et earum et. Ut et beatae doloribus ducimus numquam sed. Et porro nisi aut ullam. Qui incidunt temporibus sed amet doloribus. Officia qui et eum consequatur. Eum ea necessitatibus architecto recusandae eos voluptatibus. Odit facilis dicta dolorem nihil libero velit repellat. Aut earum ipsam sed vero. Et autem iste dolorum sed et. Deleniti dolores dolorem doloremque tempora et. Aut modi commodi rem facilis fugit aut. Perspiciatis est fugit aut itaque dignissimos. Harum vero possimus suscipit fugiat. Aut eos inventore nesciunt tenetur magnam excepturi. Dolorem odio porro quaerat est vitae ratione maiores. Provident accusamus cum fuga ut sit. Molestiae rerum quasi necessitatibus sequi saepe. Laudantium amet enim recusandae dolorem at adipisci. Eum possimus sint ipsa quam. Et nulla nemo recusandae eaque minima pariatur ut. Officiis cumque illum itaque consequuntur illo aut et. Molestias consequatur deserunt consequatur similique facilis rerum. Ipsum occaecati reiciendis impedit reprehenderit est natus itaque. Ea quia autem expedita. Deleniti et omnis impedit commodi est magni natus. Possimus rerum nesciunt consequatur.</p>',NULL,1,0,'2016-10-18 09:00:00','2017-09-07 14:26:14',NULL,5,95,NULL),
	(16,'Quibusdam beatae voluptas sunt aut ducimus.','aut-illo-et-rerum-sint-et-quia-dolore-assumenda','Ratione unde harum quia possimus.','Et quia autem maxime. Sunt debitis itaque molestiae. Mollitia occaecati aut nisi id. Odit ratione placeat ut temporibus nihil praesentium unde.','<p>Voluptatem vel quam aut quas esse quidem et. Ut et quaerat quo vel eum est ipsam enim. Magni molestiae rerum vel voluptatum reiciendis accusantium voluptate et. Quaerat et rem dolor ut. Nostrum est fuga ut eveniet qui. Et laboriosam officia veritatis dicta. Non voluptatibus dolorum enim. Inventore vero aliquid commodi quos. Inventore labore itaque harum velit error atque qui architecto. Sunt praesentium aut blanditiis ut quod nihil voluptas. Impedit quia aspernatur suscipit illo doloremque atque. Autem id aut tenetur voluptates. Sit reiciendis magnam nemo assumenda et exercitationem. Eaque nihil unde rem laboriosam culpa quaerat. Dignissimos et ut assumenda alias optio laborum accusamus officiis. Nihil consequuntur et consequatur nihil. Dicta et consequuntur magnam praesentium. Est doloremque dignissimos dolor omnis in et voluptas. Voluptatem quisquam sunt tempora dolor. Aspernatur animi non nesciunt qui ut. Eum rerum mollitia sequi est harum voluptas. Natus voluptas vero et est praesentium voluptatem ex. Provident quibusdam impedit quia. Dolorem ipsa placeat numquam. In sit eum quasi assumenda. Consequatur ipsa non aut dolor. Iusto autem praesentium numquam doloribus aliquid. Dolorem facilis delectus qui accusantium autem. Et qui odio libero quia sit molestiae facere incidunt. A ea ut ut illum ullam libero. Molestiae consequatur pariatur dolorem cupiditate incidunt sed. Non cum perspiciatis alias distinctio nihil hic. Ut voluptatem et debitis. Sapiente delectus fugiat corrupti velit est maiores itaque. Quas laudantium odit recusandae et et. Aut et cum velit nisi fugiat. Ipsum repudiandae quo iure ut iure dolore. Magnam neque animi quia omnis. Architecto tenetur totam in dolores est delectus. Natus dolores sint aliquid quo excepturi totam cupiditate. Et magnam deserunt provident dolor molestias. Vero aut et eos aperiam dolore ea saepe velit. Consectetur non labore dolore dolorem quasi expedita natus. Odio in et quae iure fuga rerum quas. Quaerat praesentium porro placeat nulla minus. Rem sed sed qui occaecati. Consectetur rerum facilis illum nam. Sit eos iure repellendus maiores maxime. Aut magni necessitatibus et eos repellendus. Inventore qui quaerat aspernatur.</p>','Post_Image_4.png',2,0,'2016-11-03 09:00:00','2017-09-05 22:28:13','2016-11-07 09:00:00',5,70,NULL),
	(17,'A est reprehenderit consequatur.','aut-facere-omnis-earum-natus-sint','Nesciunt incidunt sint perspiciatis labore est adipisci optio enim.','Ut ea laborum quia totam omnis. Et labore possimus et consequatur et qui doloremque et. Ab iure iusto autem voluptatum explicabo. Aut ut nihil animi iure laborum.','<p>Et dolores nemo animi neque voluptatem quis nobis. Quo laborum sed qui qui eaque magnam. Impedit id veniam quaerat et doloremque earum fugit laudantium. Qui harum corporis fugit veniam ipsum qui. Placeat magnam et velit quod. Illum consequatur tempora voluptas ipsum voluptatibus aut culpa quidem. Eos ipsa nihil et placeat adipisci autem unde. Assumenda qui maxime aut. Debitis cumque ipsum quam delectus omnis hic necessitatibus. Odio dicta iusto quis et. Sint dolorem aliquam nobis. Unde eaque est at fugiat necessitatibus illo ab. Veniam at quae sint atque debitis fugiat. Enim culpa voluptatibus praesentium corrupti deserunt placeat cumque. Aliquam laborum ad sunt iure. Dolor dolore vero qui voluptas nobis atque dolor. Deserunt sapiente aut maxime natus laboriosam blanditiis cum. Magni quis repellat qui expedita. Autem vitae hic consequatur cumque laborum commodi aut aut. Occaecati amet quibusdam soluta beatae quibusdam iusto. Laboriosam aliquam aliquid impedit est voluptates neque natus. Qui voluptatem ex dolores quia saepe. Et neque mollitia optio omnis ratione recusandae. Voluptates magnam eligendi eum delectus error. Explicabo repudiandae est consequatur et consequatur corporis ipsum. Cupiditate corrupti at omnis dolor numquam quas. Odio atque fugiat odio eaque ut. Corporis quasi aut qui omnis esse voluptate voluptatem. Eum necessitatibus corrupti quisquam et aut perspiciatis dolores. Praesentium vero et non commodi. Ratione quaerat et totam in cumque quia. At optio corporis libero. Qui veritatis cupiditate et enim sapiente soluta. Ut tenetur est aliquid voluptatem quia. Laborum et animi vel a. Qui ea laborum laborum itaque harum recusandae non. Velit perspiciatis tenetur dolorem assumenda amet. Illum officiis velit enim perferendis. In iure qui similique similique fuga possimus. Corporis ut laboriosam commodi ducimus quia impedit eligendi. Est et quia repellendus similique ducimus facilis voluptatem molestias. Et dignissimos aut vitae aut asperiores eos. Incidunt eum totam corrupti illum. Facere illo ad esse a. Rem dolorem commodi dolores ipsam aperiam est qui. Natus optio nemo sed et illo. Nulla accusantium omnis qui laudantium error. Ut aut velit optio architecto eos. Labore expedita alias inventore eos quos qui. Laboriosam itaque quia ipsam ducimus ipsa et. Beatae reprehenderit sint id iste in.1</p>',NULL,3,0,'2016-11-20 09:00:00','2017-09-07 02:25:11',NULL,3,117,NULL),
	(18,'Consequatur et magnam cumque sapiente veniam in.','qui-dolore-et-dolorem-nihil-facere','Voluptatem velit repellendus eum rerum sint.','Est id nam beatae omnis qui. Sit consequuntur dolores aliquam dolorem sit rerum.','<p>Voluptatum error quae enim est. Natus consequuntur ut fugit minus provident vitae earum. Omnis earum aspernatur quae rerum quis maiores. Est voluptatibus quis quia. Eos dolorum debitis sint quo quibusdam quae. Ut ipsum quis aut corporis alias delectus. Ullam recusandae qui distinctio recusandae. Consequuntur porro et quam pariatur asperiores assumenda. Labore dolorem sit ad qui. Sed aperiam incidunt rem. Aut ab aliquam consequatur earum rerum. Eaque id molestiae sint sed corporis aperiam ex libero. Quisquam harum impedit aut accusantium alias dolor nulla sed. Nihil perferendis dolorem optio dolor totam. Hic consequatur pariatur in aperiam quae sint. Sint velit inventore iusto hic ea aut. Velit et iste consequatur ut voluptate velit in corrupti. Qui reiciendis vel molestias voluptatibus neque aut numquam. Molestiae mollitia dolore consequuntur eligendi ut doloremque earum. Ipsa harum beatae exercitationem ut reprehenderit dolorem non consequatur. Animi rerum quia doloremque cumque fugiat. Qui odit consequuntur vero officiis et eos commodi deserunt. Qui quas dolor iste sed inventore incidunt neque. Non non expedita fugit molestiae rerum corrupti. Eveniet perferendis voluptates minus atque eveniet. Consequatur molestiae dolorem quisquam excepturi ut vel. Optio autem minima beatae facilis et ad vel. Et dolores quibusdam aut omnis. Vero libero quas in sed odit eveniet. Provident facilis odit eos quis et et quibusdam. Libero eveniet tenetur vitae itaque necessitatibus. Nulla amet fuga soluta recusandae vitae optio perspiciatis. Natus laboriosam incidunt esse excepturi aspernatur occaecati. Mollitia rerum est omnis est ipsa sint voluptatum. Quisquam ea dicta omnis quia eveniet. Non hic quibusdam quos illo quasi. Ipsa deserunt aut nesciunt assumenda autem magnam. Rerum molestias aliquam quis unde incidunt et. Et quos sit ut sunt. Impedit quia aut molestias enim exercitationem nam. Aliquid perferendis possimus atque distinctio. Et aperiam quia asperiores necessitatibus. Accusantium et sit corporis harum corrupti eum. Officia autem consequatur vero modi omnis. Et atque quis et explicabo quidem enim. Facere rerum ea fugiat ab sint quia. Aut labore a cum soluta laboriosam libero at illo. Voluptas praesentium ratione nulla accusamus. Numquam fuga et illo sed. Et quidem molestiae cum in facilis et. Vero et aut quod officiis aliquam.</p>','Post_Image_3.png',2,0,'2016-12-08 09:00:00','2017-09-07 21:12:46','2016-12-12 09:00:00',8,139,NULL),
	(19,'Ad pariatur autem rem voluptas quod maiores nobis aut sed rerum.','sunt-reiciendis-sit-consequatur-rem-dignissimos','Inventore eveniet qui laborum eos autem consequatur consequatur.','Assumenda et unde illum. Debitis qui facere cumque autem delectus est. Est quisquam id sapiente.','<p>Debitis dolor iste soluta ut maxime eaque beatae. Enim rerum quos delectus voluptate debitis magnam eum. Ea aut ipsam facilis molestiae optio aliquid. Repellendus et odit provident omnis consequatur. Sequi et et ab laudantium. Quo ex amet autem labore culpa. Error sunt consequatur tenetur enim praesentium dolor rerum. Velit hic quia ut accusantium. Inventore ab sint unde sunt vero dolorem facere. Velit voluptate in praesentium labore. Reiciendis repudiandae quidem occaecati repudiandae. Et architecto magnam nihil commodi. Tempore omnis tempore perferendis nemo accusantium. Quaerat sed qui cumque. Dolorem quia qui vero. Cupiditate dolorem alias culpa. Et ea eaque ut veritatis maiores. Enim dolorum suscipit ipsa ea. Et vel repudiandae qui fuga ipsa ipsam commodi. Incidunt molestiae nostrum quo ea quia eligendi voluptatem. Expedita nobis sint recusandae. Voluptatum modi atque iste accusantium pariatur ut molestiae ut. Dolor unde deserunt consequuntur qui sit aperiam harum. Nihil delectus commodi quo unde repellendus cupiditate. Ex quo occaecati itaque aut odio laboriosam dolorem. Perspiciatis omnis cum consequatur et. Dolores occaecati fugiat natus quia omnis. Qui nesciunt et sit rerum quia fuga. Quia consequatur molestias nulla. Error quam reprehenderit aut fugiat corporis eveniet cum. Maiores autem possimus consequatur tempore et distinctio. Est consectetur qui sapiente. Animi voluptas nulla ratione quis autem ratione sit. Dolorem et numquam odit quia vel. Sequi cupiditate ut accusantium perferendis fugit. Facilis velit beatae sit adipisci consequatur temporibus. Assumenda et earum odio recusandae cupiditate qui. Et quia temporibus quibusdam voluptatum voluptas doloremque. Quos pariatur voluptas vitae qui nobis. Consectetur culpa sunt atque beatae. Quisquam officia qui tempora ex. Voluptatem enim itaque perspiciatis eos consequatur aut sit. Repellendus libero minus velit incidunt. Iusto optio ullam sunt cumque perspiciatis sit. Vel beatae magnam voluptatem cumque nihil vel quae. Amet nihil repellat non autem fuga. Commodi omnis vel dolor et dolorem. Delectus maxime eveniet laudantium eius ea mollitia accusantium numquam. Aliquid ut officia nemo omnis esse.</p>',NULL,1,0,'2016-12-27 09:00:00','2017-09-07 14:25:58',NULL,5,89,NULL),
	(20,'Atque iste sint quis dolores sint.','odio-nemo-sunt-recusandae-placeat-ut-dignissimos-ut','Et totam dicta occaecati consectetur ex assumenda enim quod.','Nostrum non est fugiat nam exercitationem. Deserunt velit quia nostrum tempora. Animi voluptatem et pariatur illo aut voluptatem adipisci. Soluta consectetur placeat molestiae dignissimos rerum.','<p>Ipsa porro aut veritatis perferendis atque. Sunt officiis omnis inventore voluptates qui delectus minus. Dolores deserunt quia minima quis assumenda cum. Ut assumenda sed explicabo consequuntur itaque in cumque. Et dolor dolores magnam nesciunt. Corrupti nobis et sed. Sint perspiciatis labore aspernatur eaque aut ut consequuntur culpa. Nemo eius repellat reprehenderit accusamus distinctio id. Et numquam illum beatae aut dicta. Maiores quibusdam maiores qui et ipsum. Et animi pariatur ullam vero veritatis. Est esse dolorum cupiditate. Ad blanditiis aliquam iusto vel voluptatibus consequatur dicta. Rerum autem vel est eum quae est fuga. Consequatur delectus aut cupiditate et aliquam sit aut. Dignissimos omnis delectus veniam error aut. Provident ipsum molestiae omnis voluptatem. Mollitia distinctio optio esse voluptatem pariatur dolores.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p style=\"text-align: center;\"><img src=\"http://media-minecraftforum.cursecdn.com/attachments/200/795/635983687200061461.png\" alt=\"\" /></p>\r\n<p>Totam reiciendis atque et cumque placeat. Nisi molestias qui ut nulla. Libero dolores culpa nihil nobis ad. Libero culpa veniam sit unde esse. Quibusdam dicta minus cumque et. Praesentium voluptas sunt nemo cupiditate quis explicabo asperiores porro. Dolores possimus odio in perspiciatis. Quis eaque corrupti nesciunt ut. Doloremque dolore similique distinctio pariatur earum blanditiis quisquam. Ut nihil veritatis eaque velit officia qui eum. Explicabo vero harum a eius. Voluptas exercitationem deserunt dolorum ducimus eaque. Minus nisi eos velit nemo. Officiis esse rerum quas sequi. Ipsum et unde quis qui doloribus deserunt asperiores. Esse aut repudiandae aut et. Voluptatibus nobis quo eum. Ea reiciendis quibusdam iure in quo pariatur et ut. Minus excepturi quasi qui sint quod modi. Qui eveniet adipisci blanditiis dolorem maxime modi. Repellendus laudantium animi sunt et ut et. Explicabo et voluptatem adipisci fugit ipsa aliquam autem. Similique consequatur illum vero aut. Voluptatem et eligendi iusto laudantium est veritatis. Ut dignissimos voluptate nulla rem non fuga perferendis. Dolorum est harum tenetur earum fugiat vero cupiditate.</p>','qrcode.png',1,0,'2017-01-16 09:00:00','2017-09-07 14:25:49','2017-08-24 23:15:00',5,40,NULL),
	(23,'Masonry grid','masonry-grid','korte subtitle','valami összefoglalaó, ami a fecabookon is megjelenik','<p>asdsdasdsadasdasd</p>\r\n<h3><strong>Syncing Associations</strong></h3>\r\n<p>You may also use the&nbsp;sync&nbsp;method to construct many-to-many associations.</p>\r\n<ul style=\"list-style-type: disc;\">\r\n<li>The&nbsp;sync&nbsp;method accepts an array of IDs to place on the intermediate table.</li>\r\n<li>Any IDs that are not in the given array will be removed from the intermediate table.</li>\r\n</ul>\r\n<p>So, after this operation is complete, only the IDs in the given array will exist in the intermediate table:</p>\r\n<pre><code>$user-&gt;roles()-&gt;sync([1, 2, 3]);</code></pre>\r\n<p>You may also pass additional intermediate table values with the IDs:</p>\r\n<p><img src=\"//www.tinymce.com/docs/images/tiny-husky.jpg\" alt=\"\" width=\"320\" height=\"320\" /></p>\r\n<p>&nbsp;</p>\r\n<p><img src=\"/fm/photos/shares/Veszprem/IMG_20170801_162318.jpg\" alt=\"\" width=\"611\" height=\"458\" /></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>','Post_Image_1.jpg',1,0,'2017-09-01 13:35:32','2017-09-07 14:52:54','2017-08-31 13:35:17',3,5,NULL),
	(24,'Interesting codes 222','interesting-codes-222','korte subtitle 222','sdasdsd','<p>asdsdasdsad</p>',NULL,2,0,'2017-09-07 15:10:15','2017-09-07 15:37:18','2017-09-07 15:30:56',4,1,NULL);

/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table permission_role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permission_role`;

CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;

INSERT INTO `permission_role` (`permission_id`, `role_id`)
VALUES
	(1,1),
	(2,1),
	(3,1),
	(4,1),
	(5,1),
	(6,1),
	(7,1),
	(8,1),
	(9,1),
	(10,1),
	(11,1),
	(12,1),
	(13,1),
	(14,1),
	(15,1),
	(16,1),
	(17,1),
	(18,1),
	(19,1),
	(1,2),
	(2,2),
	(3,2),
	(4,2),
	(5,2),
	(6,2),
	(7,2),
	(8,2),
	(9,2),
	(10,2),
	(11,2),
	(12,2),
	(13,2),
	(14,2),
	(15,2),
	(1,3),
	(4,3),
	(9,3),
	(11,3),
	(9,4),
	(13,4),
	(15,4),
	(9,5),
	(15,5);

/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table permission_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permission_user`;

CREATE TABLE `permission_user` (
  `permission_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  KEY `permission_user_permission_id_foreign` (`permission_id`),
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



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
	(11,'crud-files','crud files','( CRUD ) on Filemanager','2017-06-20 09:00:00','2017-09-01 20:19:05'),
	(12,'crud-instruction','crud instruction','( CRUD ) on instructions table','2017-09-20 09:00:00','2017-09-07 16:19:07'),
	(13,'read-instruction','read instruction','( READ ) on instructions table','2017-06-20 09:00:00','2017-09-07 16:19:04'),
	(14,'crud-lession','crud lession','( CRUD ) on lessions table','2017-06-20 09:00:00','2017-09-07 16:19:04'),
	(15,'read-lession','read lession','( READ ) on lessions table','2017-06-20 09:00:00','2017-09-07 16:19:04'),
	(16,'delete-instruction','delete instruction','Force delete instruction item','2017-06-20 09:00:00','2017-09-07 21:55:50'),
	(17,'delete-lession','delete lession','Force delete lession item','2017-06-20 09:00:00','2017-09-07 21:55:50'),
	(18,'crud-role','crud role','( CRUD ) Roles','2017-09-08 02:05:12','2017-09-08 02:05:23'),
	(19,'crud-permission','crud permission','( CRUD ) Permissions','2017-09-08 02:05:12','2017-09-08 02:05:28');

/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table photos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `photos`;

CREATE TABLE `photos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `photos_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table role_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `role_user`;

CREATE TABLE `role_user` (
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`)
VALUES
	(1,1,'App\\User'),
	(2,2,'App\\User'),
	(3,3,'App\\User');

/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`)
VALUES
	(1,'admin','Admin','Administrator with full rights ( CRUD Uo Do) on all table','2017-06-20 09:00:00','2017-08-18 04:50:42'),
	(2,'editor','Editor','Editor with full rights ( CRUD Uo Do) on news, category, etc w/o users table','2017-06-20 09:00:00','2017-08-18 04:50:42'),
	(3,'author','Author','Author with full rights ( CRUD ) on news, w/o category, users table','2017-06-20 09:00:00','2017-08-18 04:50:42'),
	(4,'teacher','Teacher','Teacher read on Instruction and Lession table','2017-06-20 09:00:00','2017-09-08 01:46:45'),
	(5,'student','Student','Student Read on Lession table','2017-06-20 09:00:00','2017-09-08 01:46:50');

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table taggables
# ------------------------------------------------------------

DROP TABLE IF EXISTS `taggables`;

CREATE TABLE `taggables` (
  `tag_id` int(11) NOT NULL,
  `taggable_id` int(11) NOT NULL,
  `taggable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `taggables` WRITE;
/*!40000 ALTER TABLE `taggables` DISABLE KEYS */;

INSERT INTO `taggables` (`tag_id`, `taggable_id`, `taggable_type`)
VALUES
	(3,2,'App\\News'),
	(4,2,'App\\News'),
	(6,2,'App\\News'),
	(5,3,'App\\News'),
	(6,3,'App\\News'),
	(3,6,'App\\News'),
	(6,6,'App\\News'),
	(4,8,'App\\News'),
	(2,9,'App\\News'),
	(4,10,'App\\News'),
	(6,10,'App\\News'),
	(3,10,'App\\News'),
	(3,12,'App\\News'),
	(4,14,'App\\News'),
	(6,14,'App\\News'),
	(2,15,'App\\News'),
	(6,15,'App\\News'),
	(3,16,'App\\News'),
	(6,16,'App\\News'),
	(2,16,'App\\News'),
	(6,17,'App\\News'),
	(2,17,'App\\News'),
	(6,20,'App\\News'),
	(2,23,'App\\News'),
	(4,23,'App\\News'),
	(6,23,'App\\News'),
	(3,19,'App\\News'),
	(1,13,'App\\News'),
	(6,7,'App\\News'),
	(5,5,'App\\News'),
	(2,1,'App\\News'),
	(4,1,'App\\News'),
	(5,4,'App\\News'),
	(1,18,'App\\News'),
	(1,11,'App\\News'),
	(3,7,'App\\News'),
	(2,4,'App\\News'),
	(3,4,'App\\News'),
	(1,24,'App\\News'),
	(2,2,'App\\Instruction'),
	(2,1,'App\\Instruction'),
	(2,1,'App\\Lession'),
	(4,1,'App\\Lession'),
	(4,1,'App\\Instruction');

/*!40000 ALTER TABLE `taggables` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tags
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tags`;

CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tags_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;

INSERT INTO `tags` (`id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'Untagged','untagged','2016-06-20 09:00:00','2017-09-01 10:35:44',NULL),
	(2,'Microbit','microbit','2016-06-20 09:00:00','2017-09-01 10:35:44',NULL),
	(3,'Intermediate','intermediate','2016-06-20 09:00:00','2017-09-01 10:35:44',NULL),
	(4,'Beginner','beginner','2016-06-20 09:00:00','2017-09-01 10:35:44',NULL),
	(5,'STEAM','steam','2016-06-20 09:00:00','2017-09-01 10:35:44',NULL),
	(6,'Minecraft','minecraft','2016-06-20 09:00:00','2017-09-01 10:35:44',NULL);

/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;


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
	(1,'Várkonyi István','istvanvarkonyi','kbvconsulting@gmail.com','$2y$10$YkiQ/lSAof1ou1qrFR07HOiLNy0i1gGqHxflWUD48r3MtaqddZcIq','Officia quis aliquid corporis non et consectetur. Et magni autem dolores placeat fugit amet voluptate fugiat. Soluta debitis cumque dolores. Distinctio rerum impedit ducimus.\r\n\r\nFugit perspiciatis quod perferendis. Ullam nemo quae saepe sint ab. Earum et sint ex exercitationem officia. In nobis iusto pariatur eligendi fugiat quia et.\r\n\r\nConsequuntur ut sit vitae. Voluptate rem unde omnis voluptate fugiat quia sed.\r\n\r\nIncidunt reprehenderit et nihil. Facere pariatur in ipsa. Et et earum culpa velit consectetur sunt.','cVPoF45Wse6JTrDfH03REZCeu5ATbgfKyCPTVbmkYgxI3ILuKfCl5jMbLIVL','2016-06-20 09:00:00','2017-08-18 12:20:12',NULL),
	(2,'Szakmáry Ákos','akosszakmary','akos.szakmary@gmail.com','$2y$10$oECzvpMbB08yn7jA2KusP.kF41pv03W6Sh7na11hRarHs.KgWPj.W','Ratione autem itaque voluptatem cum pariatur quia corrupti. Repudiandae velit sed nihil et accusantium. Eos ducimus qui incidunt quis repellendus ipsam quo repellendus.\n\nEt iste velit veniam. Fuga quia provident autem suscipit quia eum. Omnis qui illo tenetur rerum maxime enim qui exercitationem. Repudiandae non laboriosam minus molestiae at officia dolores.\n\nQuia sed odio consequatur unde. Dolor qui est et nemo reiciendis corrupti. Nam quo et harum temporibus.\n\nBeatae tempore aut et dolor velit sit. Ut ut qui similique saepe quis doloribus temporibus. Ducimus vero sit ab voluptatem rerum sit atque. Rerum temporibus dolores assumenda praesentium et consequuntur iusto est.','qIx1KY16LcTDFTgdQRtILZIjpcBUYnkKgfU6PG4hJU13D1L3rIA5foGZOqkN','2016-06-20 09:00:00',NULL,NULL),
	(3,'Pálmai Zita','zitapalmai','zsiraf21@gmail.com','$2y$10$uGWr8Dz9JZA63sDabCsGrugfRVDu7s6mdv8vxUlgJurcSjAvyZ2Nu','Qui vel odio praesentium ipsam. Inventore eveniet architecto ad commodi qui autem. Totam quo eum ab natus. Maiores deleniti aut omnis illo tempora quia excepturi. Eligendi corrupti et rerum alias consequatur in amet et.\n\nDolorum asperiores dolores est sit ad sed. Rerum deleniti ullam eveniet ea. Eveniet totam eligendi qui. Est est et ea alias nam consequatur excepturi commodi. Rerum ut aliquam voluptates totam.\n\nTemporibus quas et vel illo unde eos. Alias qui accusantium molestiae culpa occaecati quisquam ducimus. Sapiente necessitatibus dolor nulla quia mollitia perferendis.\n\nDolor eius ab vel laborum reprehenderit maxime et. Dolores blanditiis est commodi fugit. Itaque sed in sunt totam sit ut deserunt quod.\n\nQuia repellat et quia harum nobis veritatis. Odit dignissimos quae facere fuga recusandae sint non. Aliquam ratione eius fuga cumque minus sunt voluptas at.','g99yaEVEASoqfkdtsNL9RbvGTTCXDBQzAj1FOvlDFFWIb9uSvHhxJcqwI2MS','2016-06-20 09:00:00',NULL,NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table videos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `videos`;

CREATE TABLE `videos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `videos_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
