# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.18)
# Database: kvn_blog
# Generation Time: 2017-08-18 00:01:01 +0000
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
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'news',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `title`, `slug`, `type`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'Uncategorized','uncategorized','news','2016-06-20 09:00:00','2017-08-16 16:53:43',NULL),
	(2,'Microbit intermediate','microbit-intermediate','news','2016-06-20 09:00:00','2017-08-17 17:59:46',NULL),
	(3,'Oktatás','oktatas','news','2016-06-20 09:00:00','2017-08-17 17:49:43',NULL),
	(4,'Interesting codes','interesting-codes','news','2016-06-20 09:00:00',NULL,NULL),
	(5,'Konferencia','konferencia','news','2016-06-20 09:00:00',NULL,NULL),
	(6,'Kiállítás','kiallitas','news','2016-06-20 09:00:00',NULL,NULL),
	(7,'Tábor','tabor','events','2016-06-20 09:00:00','2017-08-17 18:03:20',NULL),
	(8,'Padagógus képzés','pedagogus-kepzes','events','2016-06-20 09:00:00','2017-08-17 17:49:45',NULL),
	(11,'Microbit beginner','microbit-beginner','news','2017-08-16 17:54:23','2017-08-16 17:54:23',NULL);

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
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
	(177,'2017_08_17_170048_alter_users_add_deleted_at_column',10);

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
	(2,'Voluptatum numquam ea et et nemo odit rerum doloremque rerum.','molestiae-autem-nisi-consequatur-sunt-inventore-voluptates-accusamus','Omnis vitae quia non quia ea sed consequatur.','Mollitia aut sed officia sit. Dolore ducimus aut et consequuntur sit tempore. Delectus adipisci rerum minus aut ipsa et qui. Eius id voluptatem necessitatibus qui hic corrupti iure. Repudiandae cumque at et maxime.','Repellendus est et facere esse amet omnis cumque quisquam. Ut dolores voluptates molestiae officia qui quaerat. Ut nihil non veniam quam. Dolorum facilis fugit facere dolor quo et quia cum. Labore voluptatem deserunt qui asperiores ea voluptatem.\n\nAb nam sed occaecati doloremque necessitatibus maxime. Et dolores voluptates animi. Et ea ad provident incidunt quia.\n\nEst est ut tenetur maiores omnis reiciendis sed. Qui consequatur consequuntur fuga molestiae. Error ducimus excepturi pariatur id beatae nam dolor exercitationem. Voluptate optio a minus aut quam.\n\nEt in ad sit odio deserunt accusantium tempora. Tempore iure reiciendis omnis rerum sapiente. Aspernatur omnis aut dolor ut.\n\nEx vel quia id ea dolorem. Sit eligendi saepe laboriosam dolores itaque nihil rerum. Necessitatibus unde sint necessitatibus id et.\n\nQuis excepturi voluptatem sint dolore ipsam repudiandae et. Distinctio magni quia natus corporis mollitia et corporis deserunt. Ut velit dignissimos voluptas sit omnis unde fuga. Ut ut porro quis dolore quae.\n\nQuam repellat nostrum eligendi explicabo quibusdam repellat. Molestias porro repellat earum est.\n\nExpedita quo quibusdam cupiditate culpa et. Voluptatibus quidem saepe sapiente voluptatem ut. Voluptas magnam velit et reprehenderit et commodi quidem. Accusantium dolor et odio similique cumque suscipit inventore.\n\nEveniet pariatur consequatur rerum sint consequatur iusto esse omnis. Eos eius quam quia. Eum sit rerum cum veniam possimus similique. Porro quasi dicta dolor earum assumenda aut et facilis.\n\nRerum qui inventore ratione accusamus quos fugit et libero. Aliquam vero aspernatur ab cupiditate voluptatem assumenda quam. Est sint et ratione quo unde architecto.\n\nPorro quod esse vel iure enim id. Quia qui sed ducimus ab quis iure. Autem fugit magnam occaecati officia aut.','Post_Image_1.png',3,0,'2016-06-23 09:00:00','2017-08-17 15:59:01','2016-06-23 09:00:00',5,23,NULL),
	(3,'Eum aut quia sapiente laudantium atque saepe enim rerum est dolores.','et-nam-ut-reiciendis-ut-rem-omnis-recusandae-mollitia','Impedit modi non qui nulla consequatur repellat.','Voluptatem velit dicta recusandae aut suscipit. Architecto esse doloremque ullam pariatur voluptates iste. Facilis magni distinctio et sed iste et. Velit magnam iste et omnis aut.','Aut necessitatibus sit eveniet aut similique fuga. Facere voluptas dolor velit quis. Vero est architecto laboriosam culpa voluptatibus. Autem neque dolor sint beatae voluptas eligendi.\n\nUt unde harum assumenda neque facilis amet hic. Aut facere ut libero eos voluptas. Fugit qui aut voluptas voluptatem inventore aut officia. Nesciunt repellendus aut vero consequatur labore nisi explicabo.\n\nEum est molestiae dolores dolores eligendi cupiditate doloribus. Eveniet non nihil non provident iure quibusdam. Eligendi optio accusamus voluptate dolor et neque aut dolorem.\n\nMolestias fugiat consequatur eos in voluptatibus. Nobis placeat minus mollitia maxime dolor error.\n\nVitae suscipit accusamus rerum nemo ab officiis eveniet et. Sed praesentium minima et consequatur distinctio dolor iure. Natus sed voluptatem laudantium non iusto quia quas.\n\nOdio maiores et recusandae exercitationem tenetur doloremque. Facilis et culpa suscipit omnis dolores hic tempora. Ipsum quas enim animi dolorem quisquam. Et ullam quia tempore id.\n\nIn ea totam inventore. Adipisci et hic eos quisquam voluptates quod. Eos unde molestiae dolorum eaque libero ad vero. Modi nemo vitae vitae.\n\nCorrupti et qui quis voluptas temporibus harum voluptatem. Ducimus quos ex officia pariatur et. Eum eos reprehenderit qui. Dolor molestiae non velit.\n\nEa sit aut rerum architecto corporis tempore. Dolorem assumenda sequi aut.\n\nMolestiae debitis optio suscipit itaque eos. Et optio a ut aut. Illum soluta nemo aut nemo mollitia a quas. Quae nihil tempore et et a totam quo.\n\nVoluptatibus vel rerum sunt ad quidem totam. Tenetur at sequi dolorum est illum. Id perferendis voluptatum quam et. Maxime distinctio quo dolorum porro est omnis ut. Sit consequuntur consequuntur at quam quam magnam reiciendis.\n\nEveniet pariatur dolor cumque nulla nihil aut fuga. Et aut incidunt omnis. Possimus deserunt sit vel dolore et accusantium.\n\nAt aut corporis et dolores. Ab est et dolorem nesciunt impedit. Distinctio qui temporibus incidunt neque sed fuga deserunt.\n\nOccaecati voluptas sapiente non ipsam labore accusamus quas. Eveniet vel velit consequatur nobis dolore eum quis omnis. Error non repudiandae dolores itaque aliquam optio officiis.','Post_Image_1.png',3,0,'2016-06-26 09:00:00','2017-08-17 17:49:38','2016-06-26 09:00:00',1,63,NULL),
	(5,'Exercitationem alias magnam consequatur accusantium sequi et non sapiente.','occaecati-ipsam-minus-quo-distinctio','Corrupti et saepe libero.','Corrupti cumque occaecati aut nulla quibusdam ea et. Neque quidem aliquid quos deleniti repudiandae voluptas. Dolorum molestias distinctio inventore earum numquam.\nVoluptas et beatae ea deserunt. Expedita vel et dolorem aut et.','Sed ipsam sit ex architecto dolorum earum eligendi. Est vitae corporis sunt voluptas quae accusamus. Quos ullam maiores quibusdam soluta ut optio et. Velit quisquam reiciendis iure qui assumenda ut nihil est.\n\nAut quo doloremque doloremque ex qui voluptas et. Et delectus blanditiis hic. Rerum error dignissimos officia distinctio. Consequuntur incidunt sequi ut sint nisi autem.\n\nOfficiis optio dolorum eveniet sint vel atque laboriosam ea. Sunt quia nobis incidunt. Corporis vel exercitationem repellat qui.\n\nIure qui vero voluptates in aut. Error error omnis qui similique et nesciunt soluta ipsam. Vitae rerum harum labore perspiciatis error possimus. Qui praesentium et vel non et eius.\n\nItaque quod quae quidem doloremque aperiam vero. Consequuntur repudiandae vel nostrum facere et et dolorem quod. Aut dolorum totam incidunt deleniti labore sit et.\n\nQuo repellat et placeat veritatis. Eos et praesentium repellendus maxime consequatur numquam perferendis molestiae. Non veritatis expedita ea sequi modi amet.\n\nLaboriosam perspiciatis laudantium eos asperiores architecto autem. Quae vel ut et eos. Rerum omnis et natus quaerat et.\n\nVelit deleniti rerum sequi. Dolore nam eum doloribus cum. Sed enim deleniti quae excepturi tempore optio. Illo quo voluptas et ea dicta necessitatibus.\n\nMolestiae voluptatem et voluptatum at. Praesentium quasi ipsum ipsam recusandae. Illo sunt necessitatibus error dolores et voluptas sed nostrum.\n\nDolores rerum quidem natus quia quia et expedita. Qui laborum expedita rem eligendi nisi ducimus.\n\nAut eius sunt at placeat. Veritatis magnam voluptatem dolore totam. Nesciunt voluptas et hic esse. Quis ad est repellendus. Itaque fuga quasi aut ut numquam dolorum inventore eos.\n\nSit modi quis nihil debitis minus. Mollitia repellendus cupiditate voluptatem doloremque earum vitae. Sed consequatur dolores maiores porro quia. Repellat eveniet tempora optio aut.\n\nNulla fugiat ratione sunt eveniet. Iusto ut quam deleniti quod ea facere. Perspiciatis modi adipisci ab laborum. Laboriosam quia eius suscipit excepturi rerum omnis eum quidem.',NULL,3,0,'2016-07-05 09:00:00','2017-08-16 12:25:09','2016-07-05 09:00:00',6,85,NULL),
	(7,'Labore et similique velit ipsam vel eaque est iusto quis enim.','explicabo-quos-repellat-est-et-esse-deserunt','Voluptatem molestiae quo similique sed nemo dolor qui alias illo alias eum.','Ratione temporibus dignissimos aperiam. Nisi quasi voluptatem sunt. Id omnis id reiciendis unde blanditiis sunt.','Dignissimos quisquam blanditiis vel sit libero. Amet et exercitationem qui eaque sit. Atque accusantium eius qui velit deleniti.\n\nDoloribus molestiae neque non nemo enim eligendi saepe. Eum nisi esse eum quam aliquid dicta. Ut sed qui similique aspernatur quas sed. Assumenda officia enim ab a.\n\nEius nihil soluta dolorum assumenda corporis error quo. Aut nam est eius qui neque aliquam vitae rerum. Beatae totam magnam aut iste. Facilis debitis ipsam esse hic.\n\nNemo voluptas assumenda ullam quaerat enim consequatur voluptatem. Unde veritatis qui sit ex rerum rerum.\n\nEveniet laudantium aliquam et dolore. Aspernatur et qui voluptatem ut veniam optio labore. Delectus debitis quibusdam dolorem aut. Molestiae deleniti aut accusamus.\n\nItaque atque fuga quia perferendis. Ut voluptatem adipisci culpa. Dolores et quod dolorem quibusdam qui est rem. At repellendus qui autem assumenda doloribus qui perspiciatis.\n\nOccaecati aut in suscipit aperiam ullam. Aut ipsum quo numquam dolorum ea odio. Aut aut qui in unde libero. Harum voluptatem harum reiciendis nihil.\n\nEx non sit et enim quibusdam repellat. Odio maxime minima possimus ullam nobis. Dolores eos non veritatis labore nemo. Necessitatibus quia et dolorem ipsa.\n\nQui at voluptatum assumenda nemo quis ratione. Consequatur porro placeat necessitatibus laudantium. Ratione quis eos est quos. Veniam explicabo et mollitia fugiat omnis nesciunt nam. Libero ut aut porro.\n\nIllo ullam adipisci sit dolorem occaecati. Odit at omnis dicta et ut quaerat. Ipsam nostrum nisi earum. Unde qui sunt sequi laudantium sed molestias.\n\nNobis incidunt dolor quae non dolorum praesentium molestiae dicta. Veritatis distinctio corrupti aut id debitis eveniet aut numquam. Molestiae perspiciatis sunt sunt enim facilis quia.\n\nEt eius ipsam distinctio ipsam aut quos earum eveniet. Et voluptas dolorum velit vero magnam id optio tenetur. Molestias vel itaque quo quaerat ut architecto maiores ratione. Totam possimus et quia possimus hic voluptatum fuga.\n\nRerum inventore odit explicabo qui perspiciatis. Perferendis voluptas nostrum enim corporis cupiditate consequatur. Tenetur eos harum autem excepturi. Nostrum delectus ea vero est.\n\nIn eaque enim delectus. Quis est dignissimos repudiandae rerum. Vel minus laudantium nihil in.',NULL,3,0,'2016-07-18 09:00:00','2017-08-17 17:49:38','2016-07-18 09:00:00',1,87,NULL),
	(12,'Architecto laborum ut odit delectus aut excepturi sunt minus ut.','veniam-ad-necessitatibus-non-laudantium','Laudantium et ipsum commodi soluta molestiae nihil eveniet.','Consequatur occaecati rerum vitae eius expedita in. Maxime architecto quia quia distinctio. Eum et voluptatem vel quia dignissimos ducimus in. Ut in delectus totam dolorem rem assumenda.','Omnis veritatis illum libero. Voluptatem vitae adipisci labore alias explicabo consequatur temporibus. Dicta vero eveniet iusto quis enim modi ex.\n\nQuis facere quia hic est possimus nemo iste. Et quod sed vero doloribus sapiente non.\n\nVoluptas et nulla non velit corrupti eius. Animi quaerat quisquam incidunt nihil nihil. Nisi sint sequi nihil laborum. Nemo tempora nostrum voluptatum quisquam fuga.\n\nEum magni ut et. Nihil nam quaerat molestiae voluptates natus. Inventore et temporibus sunt eos. A est occaecati sunt non magnam architecto.\n\nAtque nostrum alias eligendi rerum ea ut. Quis illo dignissimos quia velit veniam. Earum voluptatem deleniti quia dolor.\n\nMinima illum pariatur aliquid magni sint. Vero et necessitatibus reprehenderit omnis consectetur error. Aliquid modi neque provident labore praesentium amet. In dolores ut ut quibusdam.\n\nCorrupti fugiat sunt corrupti delectus id et suscipit. Expedita illo impedit tenetur numquam eaque.\n\nEt sit nam qui soluta sit. Consequatur omnis adipisci labore asperiores dolor. Id cumque sint consequatur earum eos voluptatem nisi.\n\nEst ut soluta velit. Dolorum dolor animi dolorem enim voluptatem vitae sed aut. Ullam delectus optio sit eum deleniti commodi.\n\nIncidunt qui provident in sunt eaque. Placeat enim voluptatum sed.\n\nDeleniti porro nam corrupti in eum. Iste tempore hic ut voluptatem. Qui asperiores et sed aut consequatur itaque repudiandae. Sint sint tempora necessitatibus aut.',NULL,3,0,'2016-09-06 09:00:00','2017-08-16 12:24:54',NULL,5,22,NULL),
	(13,'Esse nihil nobis dolor dolore provident quidem.','doloremque-autem-numquam-veritatis-velit','Labore cumque cum optio enim reiciendis ut voluptate.','Quis sunt dolor et eius. Minima enim perspiciatis in non magni harum veniam sint. Rem eveniet et quas totam consequatur corrupti similique.','Ipsum quis dolorem eum cupiditate sit. Esse ea ipsa mollitia. Qui et ut cumque laboriosam nulla autem nam. Ipsum sequi veniam qui voluptatem distinctio placeat quam.\n\nAtque maxime nulla et modi in labore sunt sit. Unde et suscipit hic sit repudiandae consequatur repellat. Necessitatibus molestias sunt quas nihil. Quia quo et sit repellat. Maiores expedita fuga rerum exercitationem et.\n\nIn facere aut illo ratione. Magnam accusamus eum et rem eligendi suscipit odio. Odit at officia ea nihil nulla et dignissimos. Saepe voluptatem deleniti magni autem ullam.\n\nFuga sed nulla molestiae nobis laborum earum. Molestiae enim illum ut voluptatem sequi et ut voluptas.\n\nQui impedit hic ratione quia sed. Natus vero eum doloremque enim nihil optio quia. Amet iusto hic voluptas iusto.\n\nAliquid sit sapiente nisi impedit. Incidunt voluptatem aliquid cum nobis voluptate earum consequatur distinctio. Molestiae repellendus natus unde corporis ut voluptates aliquid.\n\nEa alias et eius. Qui fugiat veritatis repellat voluptatum nemo. Consequatur corporis nulla voluptatibus excepturi architecto dolores autem. Sequi molestias quos ad consequuntur necessitatibus officia.\n\nPerferendis suscipit officia nisi odio quasi temporibus. Magni sit et eveniet atque. Accusamus quasi repellendus illo dicta dolorem dolorem.\n\nAssumenda inventore rerum expedita quisquam. Maiores reiciendis qui ab voluptatibus quidem itaque aliquid repellat. Atque dolorem ipsum vel enim aut voluptate. Vero laudantium autem quia veniam quaerat mollitia.\n\nLaboriosam repellendus dicta id dolorem eum ipsum tempora. Omnis ut reiciendis architecto aut ex. Esse consectetur qui doloribus numquam.','Post_Image_2.png',3,0,'2016-09-19 09:00:00','2016-09-19 09:00:00','2016-09-23 09:00:00',6,53,NULL),
	(14,'Ullam voluptatem qui repellendus et.','optio-consequuntur-aut-suscipit-odio-accusamus-temporibus-quia','Odio eum voluptas corrupti sapiente voluptas.','Ab aut eligendi consequuntur velit aperiam autem perspiciatis. Suscipit et qui eaque similique eum. Ea et velit nemo magnam laudantium non est.','Sed quis doloribus repellat porro molestiae. Vel facilis dicta omnis et non facilis. Cum totam nihil voluptates expedita.\n\nQuia odio veritatis porro minus labore nulla qui et. Necessitatibus quos perferendis est placeat inventore illo. Rerum iusto velit vel quo.\n\nOmnis consequatur nam quis earum. Qui ratione vel nobis dolore beatae alias quam. Nobis saepe recusandae nemo numquam dolorum aut est.\n\nNon fugit qui voluptatem omnis. Nobis nihil rerum est.\n\nVelit animi inventore in cupiditate incidunt laboriosam. Hic et optio eum omnis ut vel nobis ipsam. Debitis voluptatem eum a voluptatem iusto ipsa est voluptatem. Rem enim natus libero maxime.\n\nSunt laudantium quis provident fugiat ab cumque. Esse qui hic qui suscipit totam. In impedit voluptas eaque ut. Debitis est officia et corrupti voluptatem sunt veniam.\n\nLibero possimus laudantium earum pariatur reiciendis qui. Dolor quae hic sed aut voluptatem placeat. Est nisi ut harum et dolorem neque illum.\n\nQuo cumque nesciunt eligendi ratione et dolor. Enim delectus quo libero quidem. Mollitia nisi facere natus maiores qui.\n\nDeserunt quis natus reprehenderit molestiae fuga. Suscipit pariatur quis placeat perspiciatis dignissimos nihil rerum. Debitis et possimus autem quia eius dicta.\n\nNesciunt id similique deleniti eos fugit recusandae velit. Est iste sed incidunt et aliquid voluptatum. Fugiat alias in eaque hic dolores velit atque vel. Totam consectetur eos facilis facilis.\n\nUnde sit iste adipisci saepe ab. Ex rem id doloremque et rerum repellendus rem.\n\nError et similique perspiciatis ut asperiores. Ex quod reprehenderit veritatis ab officia id. Voluptatum doloribus quia quia dolor quis sed. Sit necessitatibus nulla earum in sed suscipit dolores.\n\nQui accusamus ex qui tempore veniam fugiat unde. Sint dicta aspernatur repellendus quisquam sunt quo. Est nisi ut ipsa ab. Dolores eum dolor aliquam rem quasi quos vero.',NULL,3,0,'2016-10-03 09:00:00','2017-08-16 12:25:00',NULL,4,94,NULL),
	(15,'Delectus quidem amet perspiciatis autem.','quia-recusandae-facilis-aliquam-magnam','Iure voluptatem facere veniam.','Qui alias nesciunt ipsam quia autem. Pariatur sunt eaque maxime. Ut cupiditate praesentium et asperiores culpa sapiente. Ducimus sunt ut eum itaque maiores.','Totam quod ut debitis et ut distinctio odio. Libero harum quis quos dolores. Non quos et repudiandae explicabo voluptatem et nulla. Fugit provident quis est vel.\n\nVelit magnam expedita non aut vitae quo dolor. Numquam ducimus ut optio.\n\nSed vero velit eaque voluptas omnis ab ex. Vel magni quam deleniti. Natus eum corrupti tempore qui voluptas tempore. Voluptas est sequi accusantium qui.\n\nNon quam sunt accusamus mollitia eveniet sed. Fuga assumenda rerum nisi. Fugiat aut totam sed qui enim rerum.\n\nQuae enim aspernatur quo omnis ut. Et modi sapiente eum quis consequatur modi et animi.\n\nFacilis sit aut maiores eligendi aut qui. Et consectetur sit animi eaque excepturi quo necessitatibus. Perferendis facere maiores eos exercitationem numquam cumque ut.\n\nOptio blanditiis sequi incidunt voluptate accusamus magnam est. Consectetur ut ut ut est ut sed aliquam. Perspiciatis quo sit voluptatem aut maxime. Aut ea qui doloribus accusamus excepturi quis ea.\n\nRerum in facere quidem quae. Excepturi voluptatem rerum et impedit suscipit vero similique. Voluptatem eligendi deserunt sequi deleniti. Quidem dolor nihil ad ab et.\n\nAccusantium officia rerum voluptatum a rem. Nihil id voluptas quia delectus. Nihil et accusamus ea molestiae. Ex quia qui aliquid totam voluptate. Et inventore sit culpa soluta amet.\n\nAt autem consequatur ipsam nihil hic. Architecto tempora harum rerum nisi possimus reiciendis. Quia qui assumenda sunt sunt perferendis.','Post_Image_2.png',3,0,'2016-10-18 09:00:00','2017-08-17 17:59:36','2016-10-22 09:00:00',1,55,NULL),
	(16,'Aut dolorem sit tenetur ipsa alias dicta.','alias-veritatis-perspiciatis-laudantium-reiciendis-est-voluptatum-est','Esse qui voluptas aliquid libero quia blanditiis tempore.','Qui expedita non est odit quos. Et in et soluta minus eos id. Velit molestiae quo necessitatibus reiciendis blanditiis animi ut. Recusandae libero deserunt quis rerum tempora atque.','Et itaque omnis qui et in sit hic. Tempore quidem saepe reprehenderit et id veniam maxime. Sunt veniam possimus deserunt dolorem est.\n\nTemporibus temporibus ut eum rerum quis. Accusantium ullam illum consectetur atque. Aut dignissimos omnis adipisci ex.\n\nIllo neque quos sapiente quas vel perferendis. Corporis magni id eius fugiat similique. Excepturi magnam architecto molestiae illum molestiae consequatur. Sed repudiandae odio voluptatum et.\n\nVero commodi qui soluta sed quos incidunt autem. Velit rerum sit pariatur porro et at. Et non eligendi fugit quia maxime eaque rerum laudantium.\n\nIusto architecto quisquam et repellendus excepturi ea sit. Quae aut et iusto et.\n\nEt adipisci sint sit explicabo ut assumenda. Totam ut molestiae harum reiciendis quia.\n\nDoloribus aliquid minima sapiente ea. Ut non facere ad omnis nostrum impedit odit corrupti. Reprehenderit in nemo omnis sunt eum sed. Quia debitis sint nostrum aliquid. Perferendis consequuntur rem non debitis quaerat delectus.\n\nAut suscipit rerum voluptas qui. Vitae quae et cumque veritatis modi.\n\nUt est voluptatibus ex doloremque distinctio sequi perspiciatis optio. Vero aut quo reprehenderit omnis dignissimos rerum.\n\nFuga sint aspernatur culpa dolore corporis quam deleniti. Iusto modi molestiae praesentium blanditiis veniam. Dolorum vitae nam ut omnis.','Post_Image_1.png',3,0,'2016-11-03 09:00:00','2016-11-03 09:00:00','2016-11-07 09:00:00',6,36,NULL),
	(20,'Est accusamus eum aut consequatur sit iure error laboriosam.','velit-suscipit-iure-voluptatem-dolorem-id-quo','Aut fugiat nemo maxime est provident.','Eius aperiam magnam quos praesentium. Dolorem fugiat unde incidunt nobis odit eos beatae. Omnis sint expedita deserunt labore aliquam. In perferendis fuga qui repudiandae optio et qui iste.','Modi eaque fugit odio nulla enim ab quia. Laboriosam minus magnam culpa qui saepe. Eum quam dolore error nesciunt facilis qui asperiores.\n\nDolore sunt velit impedit qui. Voluptate nemo et rem et doloremque temporibus mollitia. Id consectetur hic veniam ut molestiae illo.\n\nSit molestiae totam et est. Consequuntur sequi aspernatur eum ipsam in expedita. Esse voluptatem doloribus deserunt esse. Corrupti nihil unde et esse ut.\n\nFugiat a optio quas aut repellat aut. Perspiciatis esse odio ab et. Quia eligendi expedita voluptatem ex.\n\nAliquid soluta voluptates consectetur veritatis pariatur. Occaecati quod hic perspiciatis maxime. Assumenda eos aut beatae et hic soluta placeat.\n\nVel inventore laboriosam atque earum. Fugiat esse voluptatem repellendus est aliquam sunt dolore. A aspernatur qui omnis consequuntur enim iure est. Omnis ab ut ipsa excepturi sit.\n\nIusto sunt vero dolores aliquam vitae ab dolorem. Doloremque repellat molestiae non. Debitis esse distinctio officia nisi.\n\nSunt sequi quis rerum dolorem laboriosam. Molestiae aspernatur pariatur laboriosam dolorum.\n\nSint dolores itaque aperiam et iste. Minima eligendi et veniam eveniet. Quia voluptatem sapiente consequatur et ut sed hic. Ea eligendi recusandae illum ad aut officia iusto voluptatem.\n\nPlaceat nostrum accusantium dicta dignissimos. Reiciendis laboriosam consequatur ipsum ad dolor. Similique id possimus provident dolores. Earum architecto est facere corrupti voluptates. Voluptatem aliquam est id voluptas eligendi expedita voluptatem hic.\n\nQuis maxime id molestiae. Voluptas sapiente corporis corrupti ut. Qui dolores minima eos similique sit dolores recusandae in.\n\nVoluptas blanditiis molestiae asperiores sunt. Non suscipit qui id placeat et et. Architecto ullam iste itaque consectetur tenetur dicta aut. Rem soluta sed aut perspiciatis.\n\nEa alias necessitatibus sint voluptates laboriosam est. Sed nihil porro ex libero suscipit pariatur reprehenderit et. Qui quod amet debitis.','Post_Image_2.png',3,0,'2017-01-16 09:00:00','2017-08-17 17:59:36',NULL,1,50,NULL);

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
	(1,2),
	(2,2),
	(3,2),
	(4,2),
	(9,2),
	(10,2),
	(9,3),
	(10,3),
	(9,4),
	(10,4),
	(9,5),
	(10,5),
	(9,6),
	(10,6);

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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`)
VALUES
	(1,'create-users','Create Users','Create Users','2017-08-13 14:05:13','2017-08-13 14:05:13'),
	(2,'read-users','Read Users','Read Users','2017-08-13 14:05:13','2017-08-13 14:05:13'),
	(3,'update-users','Update Users','Update Users','2017-08-13 14:05:13','2017-08-13 14:05:13'),
	(4,'delete-users','Delete Users','Delete Users','2017-08-13 14:05:13','2017-08-13 14:05:13'),
	(5,'create-acl','Create Acl','Create Acl','2017-08-13 14:05:13','2017-08-13 14:05:13'),
	(6,'read-acl','Read Acl','Read Acl','2017-08-13 14:05:14','2017-08-13 14:05:14'),
	(7,'update-acl','Update Acl','Update Acl','2017-08-13 14:05:14','2017-08-13 14:05:14'),
	(8,'delete-acl','Delete Acl','Delete Acl','2017-08-13 14:05:14','2017-08-13 14:05:14'),
	(9,'read-profile','Read Profile','Read Profile','2017-08-13 14:05:14','2017-08-13 14:05:14'),
	(10,'update-profile','Update Profile','Update Profile','2017-08-13 14:05:14','2017-08-13 14:05:14'),
	(11,'create-profile','Create Profile','Create Profile','2017-08-13 14:05:14','2017-08-13 14:05:14'),
	(12,'create-category','Create Category','Allows a user to CREATE a Category','2017-08-17 11:24:36','2017-08-17 11:24:36'),
	(13,'read-category','Read Category','Allows a user to READ a Category','2017-08-17 11:24:36','2017-08-17 11:24:36'),
	(14,'update-category','Update Category','Allows a user to UPDATE a Category','2017-08-17 11:24:36','2017-08-17 11:24:36'),
	(15,'delete-category','Delete Category','Allows a user to DELETE a Category','2017-08-17 11:24:36','2017-08-17 11:24:36');

/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;


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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`)
VALUES
	(1,'superadministrator','Superadministrator','Superadministrator','2017-08-13 14:05:13','2017-08-13 14:05:13'),
	(2,'administrator','Administrator','Administrator','2017-08-13 14:05:14','2017-08-13 14:05:14'),
	(3,'editor','Editor','Editor','2017-08-13 14:05:14','2017-08-13 14:05:14'),
	(4,'author','Author','Author','2017-08-13 14:05:14','2017-08-13 14:05:14'),
	(5,'contributor','Contributor','Contributor','2017-08-13 14:05:14','2017-08-13 14:05:14'),
	(6,'subscriber','Subscriber','Subscriber','2017-08-13 14:05:14','2017-08-13 14:05:14');

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
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
	(1,'Superadministrator','superadministrator','superadministrator@app.com','$2y$10$H2ZYCH.JdjhQf4VBHpEeQu8DN13NVdrXYi/FldtEc26lqRXRLl4QO','Hic atque natus reprehenderit eum. Consequatur vitae et cumque itaque tempore et nam. Excepturi vero sed facilis non quibusdam.\n\nEt ad doloribus odit qui omnis veritatis expedita. Consequatur fuga accusamus tenetur vel molestiae ex. Culpa eos harum nihil nobis voluptates. Consequatur veniam nostrum magnam voluptatum ipsa a commodi.\n\nQuam repellendus officiis harum reprehenderit. Impedit ut qui odit quibusdam. Necessitatibus praesentium in dolor facere libero. Pariatur quae hic repellat natus esse magnam veritatis voluptas.\n\nAutem consequuntur nemo sequi doloribus quas fugiat porro expedita. Quo natus explicabo nobis veniam ut sed eos aperiam. Aperiam odit illo illo et soluta rerum placeat. Architecto aut quis quae et.','Nl11JINTBepFT1GnS25bUjfpEJTWGbyvnUVtmI4Jrgy5IrxbVsUYjXEndq1t','2017-08-13 14:05:14','2017-08-13 14:05:14',NULL),
	(2,'Administrator','administrator','administrator@app.com','$2y$10$DVTifVb7GWoAk7GVqv5m6u/lG6.Os63QDa2pNLoBlonjYVDlxFXiu','Voluptatibus alias officia ullam. Itaque et minima adipisci ab dolor qui eaque. Quis consequatur sunt eos minima corporis. Id illo et id quia sit et.\n\nIllum sunt inventore qui cupiditate doloremque consequatur quod. Fuga dolores quia ut quas.\n\nQuia provident est occaecati. Dolor saepe inventore saepe beatae ducimus odio at.\n\nVeniam quis minima ipsum ad odio soluta cupiditate blanditiis. Dolores magni alias laboriosam nostrum ea dolores. Voluptas libero aliquam consequatur fugiat. Natus tempora quod labore aliquam provident voluptas sint.',NULL,'2017-08-13 14:05:14','2017-08-18 00:33:36','2017-08-18 00:33:36'),
	(3,'Editor','editor','editor@app.com','$2y$10$/4mUHduaWytbbOlBKEFzT.Ekl3v2aBZxIQ9OdUoKetta7Z6tRK2z2','Labore voluptate perspiciatis quia reiciendis voluptatum provident provident. Non distinctio totam consequatur temporibus. Eveniet accusantium temporibus iure repellendus incidunt quaerat non. Qui ut quia possimus quo suscipit.\n\nVoluptatem animi sit minima incidunt eligendi debitis. Magni blanditiis corrupti autem labore tempore sequi eligendi voluptate. Repellendus et saepe dolores occaecati voluptas architecto ullam.\n\nQuidem odit minima reiciendis. Quasi maxime exercitationem nam. Et aspernatur enim dolores quibusdam dolorem ut nostrum.\n\nLaborum ut ut magnam tempore voluptates pariatur. Magni consequatur enim molestiae repudiandae rerum incidunt. Minus enim id est error labore.\n\nAut qui minus provident vero est. Tempora qui voluptatem libero est.','q9xH7m2KAQ0mAR6K7ndnzn7NjmqLkRpMreAlcjqKQmGuuiu1LVha8CRGKqK3','2017-08-13 14:05:14','2017-08-13 14:05:14',NULL),
	(9,'Várkonyi István','v-rkonyi-istv-n','kbvconsulting@gmail.com','$2y$10$GdTzoeD44XLNX4DbizI5j.De8tW0L7CoMCrxYuBRH6O83EDvsewFm',NULL,NULL,'2017-08-17 19:59:39','2017-08-17 20:08:33',NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
