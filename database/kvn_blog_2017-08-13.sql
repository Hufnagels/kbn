# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.18)
# Database: kvn_blog
# Generation Time: 2017-08-12 22:02:57 +0000
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
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `title`, `slug`, `type`, `created_at`, `updated_at`)
VALUES
	(1,'Microbit beginner','microbit-beginner','news',NULL,NULL),
	(2,'Microbit intermediate','microbit-intermediate','news',NULL,NULL),
	(3,'Oktatás','oktatas','news',NULL,NULL),
	(4,'Interesting codes','interesting-codes','news',NULL,NULL),
	(5,'Konferencia','konferencia','news',NULL,NULL),
	(6,'Kiállítás','kiallitas','news',NULL,NULL),
	(7,'Tábor','tabor','events',NULL,NULL),
	(8,'Padagógus képzés','pedagogus-kepzes','events',NULL,NULL);

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
	(3,'2017_07_29_192826_laratrust_setup_tables',1),
	(79,'2014_10_12_000000_create_users_table',2),
	(80,'2014_10_12_100000_create_password_resets_table',2),
	(81,'2017_08_09_185610_create_news_table',2),
	(82,'2017_08_10_125058_alter_news_add_published_at_column',2),
	(83,'2017_08_11_203241_create_categories_table',2),
	(84,'2017_08_11_204003_alter_news_add_category_id_column',2),
	(85,'2017_08_12_121839_alter_news_add_view_count_column',3),
	(86,'2017_08_12_233939_alter_users_add_slug_column',4);

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
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `author_id` int(10) unsigned NOT NULL,
  `is_published` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `category_id` int(10) unsigned NOT NULL DEFAULT '0',
  `view_count` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `news_slug_unique` (`slug`),
  KEY `news_author_id_foreign` (`author_id`),
  KEY `news_category_id_foreign` (`category_id`),
  CONSTRAINT `news_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`),
  CONSTRAINT `news_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;

INSERT INTO `news` (`id`, `title`, `slug`, `subtitle`, `excerpt`, `body`, `image`, `author_id`, `is_published`, `created_at`, `updated_at`, `published_at`, `category_id`, `view_count`)
VALUES
	(1,'Ipsa cumque culpa qui optio beatae deserunt eligendi magnam.','excepturi-voluptate-dolor-provident-rerum','Praesentium aliquam perferendis cupiditate enim illo eos.','Voluptas id quibusdam placeat error dicta. Vitae ea ut ex porro. Laudantium nulla quisquam illo dolor atque vel. Recusandae eveniet omnis unde odit rerum.','Repellat laudantium et architecto. Non voluptate voluptatem pariatur facilis. Dolores voluptate aspernatur et.\n\nAssumenda architecto veniam tempore. Tempora consequatur enim nobis aut assumenda. Ullam eius illo autem.\n\nCupiditate sint vel corporis. Eius ut occaecati commodi numquam aut qui aliquid. Aspernatur earum animi nihil.\n\nOccaecati sed ipsam qui natus commodi nesciunt nam. Aut in eum libero aliquam quisquam. Assumenda modi qui ea soluta sit cum eligendi.\n\nMolestias ipsam autem quam asperiores dignissimos facere. Maxime perferendis voluptatibus quis deserunt doloremque. Rerum modi quas est possimus quis. Qui modi porro est sed dolorum ipsum.\n\nIusto debitis dolorum ullam. Sapiente quas itaque quo molestias. Perferendis aut deserunt rerum harum quo quos. Dicta modi repellat odit quasi rerum sit.\n\nUt veniam impedit labore sequi repudiandae expedita est. Quia consequatur velit omnis sunt eos. Officia quae et doloribus a mollitia maiores libero qui. Et nemo odio eos hic aliquid.\n\nRerum eos recusandae nihil eveniet officia. Incidunt maiores similique et.\n\nIste quam fugit asperiores sed praesentium dolorem. Voluptates adipisci et soluta aspernatur occaecati aliquam aut. Fugiat nihil error iste quas.\n\nOmnis voluptatem rerum quia et sit rerum. In ex et sed unde tempore. Voluptatem facere illo at sapiente inventore iure dolor. Dolores quam eius non enim.\n\nAut nemo aspernatur eum id illum dicta dolore voluptate. Eaque quisquam dolores neque numquam accusamus sed.\n\nIllo est voluptatem laudantium aut voluptatem mollitia. Eligendi quod eos amet non numquam ut quia molestiae. Maxime quo culpa aperiam provident autem odio nulla distinctio. Maiores quas dolores quia dolor asperiores minus.\n\nEnim tenetur iusto dolorem error id. Est omnis corrupti voluptas. Eaque qui facilis quia voluptas nesciunt enim.\n\nEa facilis explicabo voluptatum reiciendis. Nihil fugiat debitis natus pariatur vel id voluptates ex. Quos tempora tenetur eveniet ipsam dolor consequuntur. Incidunt itaque consequatur quaerat hic quibusdam est.',NULL,4,0,'2016-06-21 09:00:00','2016-06-21 09:00:00','2016-06-21 09:00:00',1,91),
	(2,'Velit itaque ut necessitatibus delectus exercitationem magnam.','a-reiciendis-sit-eaque-corporis-voluptas-incidunt-sunt','Aut dolores architecto quo et sed consequatur eius nam.','Inventore iusto soluta suscipit rerum impedit laudantium. Explicabo tempore explicabo nisi aut quo itaque quae. Commodi eaque enim adipisci. Excepturi et ut officia est.','Omnis et cupiditate id provident. Nihil voluptatem quis voluptas eum eos omnis. Voluptas perferendis suscipit iure corrupti velit. Possimus repellat hic exercitationem corrupti totam modi.\n\nAut omnis natus nesciunt modi quis ducimus. Sed vero ea praesentium esse blanditiis molestias consequatur. Rem minus qui animi ullam repellat quidem. Nam qui illo dolores.\n\nOccaecati nulla mollitia officiis velit. Ipsum similique quisquam voluptatem architecto. Voluptas est laboriosam porro dolorum.\n\nEt ea perspiciatis aut sapiente vel et et cumque. Sapiente praesentium sapiente numquam accusantium aut et quis. Perspiciatis expedita velit quia aut doloremque modi dolorem velit.\n\nDolorem iste et minus delectus. Expedita rerum voluptatem provident autem. Beatae non ullam quas ab et nihil quae quis. Ab omnis saepe ipsam sunt minima magni odit.\n\nQuas quam accusamus perferendis quidem blanditiis deserunt. Temporibus voluptatem rerum eum. Et eligendi sit sequi quis sed consequuntur. Commodi sunt molestiae ipsa iste.\n\nEt rerum et atque. Consequatur voluptatem nihil nisi nam dolorem odit ducimus. Voluptate numquam quos aut enim. Incidunt ad quia aut ipsum.\n\nEarum accusantium eaque necessitatibus quia aut voluptatibus. Aut ut et ea quos quam. Et enim omnis optio rerum porro. Aut pariatur repellat incidunt possimus.\n\nAmet inventore nam ut praesentium ipsam ut. Maxime quidem qui aut adipisci. Et iure debitis eaque expedita odit aspernatur.\n\nTemporibus veritatis quis quae provident fugiat repudiandae. Et blanditiis non animi et iste commodi necessitatibus voluptas. Quae blanditiis autem dolorem ea. Molestiae quas minima tenetur sed a rem et.\n\nNecessitatibus quia incidunt qui illum suscipit enim aut. Repellendus optio nobis et et quia delectus. Quibusdam labore possimus provident.\n\nNesciunt illum saepe amet. Ut dolores esse facilis reiciendis ut. Dolorem praesentium nostrum atque rerum. Maiores dignissimos delectus fuga. Amet harum id quas molestiae error sunt.','Post_Image_2.jpg',5,0,'2016-06-23 09:00:00','2016-06-23 09:00:00','2016-06-23 09:00:00',2,62),
	(3,'Rem amet occaecati vitae aut.','soluta-molestiae-libero-eaque-aperiam-qui-consequatur','Ea praesentium adipisci nostrum modi dolorem ullam rerum fugiat.','Quae iste nisi consequatur voluptatem. Exercitationem eveniet esse magnam adipisci et dolorum. Possimus unde nemo natus. Deserunt voluptatem error in non.','Voluptatibus exercitationem harum quo. Accusantium dolore iste itaque consequatur dolores soluta tempora. Et dolore incidunt soluta aspernatur modi repellendus officia. In culpa facere beatae aut et fuga quibusdam. Dolores pariatur illum nam assumenda.\n\nAnimi et itaque adipisci est. Reiciendis ullam distinctio porro. Incidunt debitis perspiciatis placeat autem.\n\nOfficiis sunt et ex iusto magnam laboriosam accusantium amet. Et tempora qui nobis est. Est ut cum et corporis est. Incidunt cupiditate dolores doloribus illo et.\n\nConsequatur consequatur nesciunt distinctio maxime fugiat. Et voluptas commodi natus quibusdam voluptatem sint delectus. Ut totam fugit animi et sunt aut quis assumenda.\n\nFugit iure voluptates quo. Quia soluta qui quis a expedita. Harum ipsam aut officia ea voluptatem aspernatur quasi. Qui doloremque ut ratione.\n\nQuisquam aut ea error. Aut quas aut nostrum. In deserunt voluptate delectus sapiente iure est. Maiores sapiente consectetur saepe id illo.\n\nNumquam officiis explicabo enim eius. Sapiente ipsum voluptatem excepturi vitae rerum dolor. Et alias quam perferendis voluptatem odio. Ut molestias minus debitis id nobis dolorem.\n\nEst et saepe suscipit et hic eos. Molestiae qui ad nobis a. A explicabo maiores sunt eos ea neque.\n\nLibero hic quis in vel. Deleniti beatae voluptate et aliquam assumenda. Dicta vitae aut cupiditate dolores perspiciatis reprehenderit. Laudantium blanditiis dolor pariatur veritatis molestiae.\n\nCum molestiae impedit dolores aperiam totam dignissimos at. Maxime occaecati aut hic ea ut. At illum tenetur dicta sit nihil.','Post_Image_4.jpg',4,0,'2016-06-26 09:00:00','2017-08-12 14:27:38','2016-06-26 09:00:00',4,108),
	(4,'Sed alias mollitia odio ut doloribus eum eaque.','nam-ipsum-provident-magnam-nemo-dolore-vel-sit-ea','In quia velit eveniet aut minima velit.','Atque quia dolorem tempora. Reprehenderit adipisci laborum quo veritatis porro. Error sed delectus voluptatem unde ducimus.','Dolorem quibusdam possimus itaque necessitatibus fuga sed sit. Consequatur consectetur sit et autem doloribus enim. Minima delectus ullam et qui commodi.\n\nNecessitatibus quibusdam repudiandae quaerat. Aut error libero quidem. Minima asperiores dolor animi voluptas sit.\n\nDolore recusandae eum ad vero cupiditate non nihil. Tempore ab sed et ipsum et omnis officiis dolorum. Iure distinctio inventore numquam velit.\n\nOmnis voluptate ut fugiat velit et nostrum. Esse voluptas nostrum est sed. Fugit et expedita ab vero eos.\n\nDicta accusantium pariatur facere delectus tenetur laborum. Nisi est ut qui sunt maxime quos repudiandae. Velit corrupti dolor voluptas. Debitis ut totam ratione exercitationem enim explicabo.\n\nSint qui quaerat quam. Rerum tenetur sit dolorum. Quaerat voluptates excepturi alias sint. Eius nobis iure omnis consequuntur molestias eum.\n\nEst sit eos cum. Rerum aut ea et.\n\nNatus qui possimus enim veniam tempore sunt culpa. Illo enim et quo. Corporis ea voluptate doloribus illo aut.\n\nNostrum sit dicta maxime velit. Non harum est maxime mollitia occaecati officiis consequatur. Dicta unde sed consequuntur.\n\nEos ab fugit qui. Facere eos et consequatur nam odit et et. Et ut autem alias molestiae fugiat.','Post_Image_3.jpg',4,0,'2016-06-30 09:00:00','2016-06-30 09:00:00','2016-06-30 09:00:00',6,64),
	(5,'Sed excepturi blanditiis qui aut aspernatur nobis veniam et.','omnis-facere-in-deleniti-ea-necessitatibus-dolor-eum-asperiores','Adipisci voluptatum quidem id doloribus ad nihil commodi corrupti.','Velit iusto et at aut ipsam sit sit. Fuga sit ex nisi natus non earum voluptates. Ut eligendi pariatur nihil. Nemo sit corporis odit fuga qui eius non.','Aperiam in nostrum molestiae nulla rerum. Numquam at reprehenderit quo rem ut sint impedit eos. Dolorem aspernatur eius reiciendis ut omnis quasi voluptate.\n\nReiciendis ea numquam vel adipisci. Inventore non sit repellat. Quibusdam non dolores est quisquam aut. Eaque quisquam error aut voluptate.\n\nAut eum ut ad officia voluptas doloremque est. Veritatis pariatur itaque quidem nulla porro. Quidem voluptatem quibusdam non odio sapiente vel.\n\nQuaerat perferendis aut enim et qui. Itaque eum dolor architecto facilis magni. Pariatur cupiditate officiis consequatur est. Assumenda quisquam quaerat unde repudiandae ut molestias aperiam.\n\nAutem quos quia qui veritatis atque accusantium. Inventore nihil omnis illum aperiam aut. Eius doloribus corporis sunt quo corporis fugit.\n\nProvident velit sint necessitatibus ducimus officiis ut. Similique eos eaque culpa. Et sunt minima quaerat alias enim.\n\nEx rem explicabo ratione architecto porro molestias sequi. Omnis repudiandae debitis dolor voluptas voluptatem et. Et quam ut totam neque cupiditate illum. Consequatur tenetur illo aut laborum sed aut voluptatem expedita.\n\nVel dolore alias tempora dolores. Ex odio suscipit neque saepe consequatur. Consequatur culpa suscipit ea quo quos et. Et excepturi repudiandae voluptas eos earum.\n\nCulpa commodi sed vero consectetur non quibusdam quibusdam. Voluptate est et unde est blanditiis aut id quae. Non voluptas aut quia debitis eius et est.\n\nPossimus velit reprehenderit minima ab. Reprehenderit voluptatum rerum animi voluptatibus illum. Consectetur veniam voluptatem nisi voluptatem officiis nihil natus.\n\nEnim esse enim nam rerum rerum est quo. Debitis enim ratione explicabo quis. Tempora ea et et quam. Recusandae quidem cupiditate sint ipsum id voluptas.',NULL,5,0,'2016-07-05 09:00:00','2016-07-05 09:00:00','2016-07-05 09:00:00',4,55),
	(6,'Voluptates ad architecto in rerum.','deleniti-eligendi-laborum-enim-tenetur-quia-nesciunt-quam','Hic reiciendis deserunt tenetur porro sit nobis.','Omnis sint dolore corporis nemo quasi tenetur. Accusantium quam qui illum et autem. Et distinctio rem sed magni voluptate quis quibusdam. Ullam est enim qui modi necessitatibus et praesentium eos.','Vel animi commodi officia libero est. Et eum ratione id saepe. Ipsam modi enim aut exercitationem omnis non et incidunt.\n\nItaque sunt deserunt nihil dolorum et. Et corrupti quae in exercitationem ut nesciunt harum vitae.\n\nAut eaque sed dignissimos deleniti unde. Et laudantium harum iste deleniti consequatur. Et quo blanditiis modi. Numquam rerum voluptates ex eaque. Facilis blanditiis est aut.\n\nAut voluptatum minus veritatis rerum eius quaerat. Voluptas eos aut adipisci dolorum et nihil. Soluta dolores molestias explicabo iure ex. Incidunt dolore ut ut est.\n\nUt id in omnis. Quia adipisci laboriosam tenetur consequatur laboriosam rerum omnis. Unde neque enim sed aut magni et nemo.\n\nUt sed iusto optio cupiditate. Repudiandae sint error aut odio soluta et. Quisquam hic est suscipit ad est optio alias. Consequatur sed veritatis non accusantium commodi. Blanditiis voluptatem aut soluta quas.\n\nVelit corporis voluptas et at velit dolorem. Repudiandae velit architecto dolor fuga. Atque est ut quas facere et quos sed rerum. Reiciendis ipsum qui dolorem nisi quidem accusantium cupiditate.\n\nBlanditiis et magnam repudiandae vel est. Reprehenderit modi odit animi debitis. Dolores corrupti quo ullam eligendi sapiente dolores.\n\nRem nostrum nihil sed quia. Iure pariatur illum nam debitis accusamus natus. Vitae illo nemo dignissimos consequuntur velit sint.\n\nQuis illo omnis placeat blanditiis saepe perferendis eaque. Alias iusto voluptas sit et non. Enim voluptatem odit veritatis totam ut. Rem voluptatem molestias tempora quia aut velit recusandae.\n\nVoluptatem voluptatum repellat a et enim aut. Natus expedita consequatur enim ex dignissimos. Et qui assumenda eligendi omnis sint ullam earum. Dolor esse nihil magnam tenetur et.\n\nRem porro ut sit velit adipisci inventore nisi. Neque ipsam sunt minima est doloribus autem. Commodi nihil et et voluptatibus. Possimus qui fugit voluptatem quia animi.\n\nCommodi fugit et omnis veniam sint modi nihil. Est similique cupiditate recusandae sapiente. Quis aut voluptatem omnis.','Post_Image_5.jpg',3,0,'2016-07-11 09:00:00','2016-07-11 09:00:00','2016-07-11 09:00:00',5,16),
	(7,'Vel accusantium labore omnis libero voluptas doloremque eos.','quis-eos-non-voluptates-quasi','Non veniam ipsa esse dolor ea.','Doloremque recusandae iure dicta. In laboriosam placeat in sit nostrum quam.','Eveniet harum earum consequatur ut enim odit exercitationem autem. Recusandae omnis laborum eaque atque a molestiae nihil. Recusandae id a explicabo suscipit pariatur a nobis. Repudiandae aut et enim voluptatibus laborum porro.\n\nQuo qui illum distinctio itaque. Ea doloribus fuga dolor sint. Quia ex voluptatem error voluptatem eos in.\n\nAdipisci id et rem quia. Et molestias soluta nihil quia dolor quidem et ipsam.\n\nError vel dolore vel illum hic officia aperiam. Est fuga aut aliquam est et accusamus dolorum sit. Atque incidunt deleniti veritatis aut voluptates. Ea debitis saepe laudantium perspiciatis.\n\nSit tenetur aut nisi natus qui ut voluptas. Aut harum explicabo laborum vitae facilis et et. Quia voluptatem sed nisi rerum natus alias.\n\nHarum temporibus ea nisi ea molestias. Non mollitia officiis nihil.\n\nLaboriosam pariatur sint omnis fugiat nihil. Nisi quia sunt quae aut. Quibusdam temporibus omnis est est voluptas distinctio consequatur.\n\nQui qui enim incidunt ipsam. Rerum architecto eum maiores nihil dolores fugiat corporis. Voluptatem aliquam delectus corporis amet aut. Repellat et ut repudiandae repellendus ipsum veniam velit. Veniam assumenda delectus modi est.\n\nNesciunt modi velit autem. Similique amet et quas molestiae. Veritatis quia quia consequatur reprehenderit. Temporibus nostrum similique sit vitae numquam repudiandae.\n\nSaepe consequatur dolores repellendus voluptatem impedit doloremque. Dolorem error magni aspernatur laudantium autem. Ipsa vel non sunt qui sed sint.\n\nQuaerat animi magnam id ut sint voluptatem. Debitis odit eum voluptas dignissimos autem nemo. Deleniti soluta nisi velit. Reprehenderit commodi laudantium earum eum porro.\n\nMinima sit ex explicabo saepe. Harum saepe et et quia molestiae et. Doloribus et occaecati eius voluptate et ad. Qui sequi nulla sunt cum.\n\nConsequuntur quaerat eos doloribus qui eius. Incidunt saepe cumque perspiciatis corrupti ut officia. Consequatur quia occaecati ratione itaque sit. Suscipit ea nihil culpa corrupti magni voluptas dolorem consequatur.\n\nEaque voluptate dolorem maiores aut laboriosam laborum quasi ut. Facere id odio expedita alias. Vitae est id qui quas sint nostrum. Corrupti nesciunt pariatur ullam aut aut.',NULL,4,0,'2016-07-18 09:00:00','2016-07-18 09:00:00','2016-07-18 09:00:00',4,37),
	(8,'Sed qui ut magni vel placeat.','quia-tempora-perspiciatis-quo-et-voluptatibus','Nobis vitae incidunt autem architecto nobis et ex.','Qui veritatis nam mollitia odit quis natus. Vel itaque voluptas totam magni. Eos omnis ipsam nisi nostrum. Labore non iusto quis aliquam.','Quo quo odio itaque reiciendis. Nesciunt iusto ea unde qui qui autem. Saepe et quis sit odit hic.\n\nDoloremque aliquam est ut eaque eligendi. Impedit deserunt autem qui esse quas fugiat. Omnis adipisci iure aspernatur neque et autem. Itaque perspiciatis aut aut mollitia est atque impedit.\n\nDoloribus consequatur porro atque perspiciatis possimus provident qui et. Quis ut ut harum cumque labore.\n\nEt qui ut doloribus est fuga. Nam autem aut nisi ea rem pariatur. Vitae laudantium aut omnis dicta. Dicta sed minima odit consequatur harum similique necessitatibus. Incidunt in dolorem est sunt molestiae consequatur.\n\nQuae ex voluptas harum deserunt. Omnis veritatis adipisci quibusdam nulla magni enim quia. Consequatur necessitatibus ut ut quaerat qui vero voluptas. Enim nobis recusandae nihil eum ut.\n\nEa aut eligendi architecto ut et corrupti dicta. Magni consequatur animi voluptas ut eligendi. Dolorem corrupti porro labore dicta eum.\n\nQuo qui corporis sunt. Earum officiis vitae ea excepturi animi ducimus sapiente. Adipisci non sunt et. Possimus modi accusamus qui necessitatibus.\n\nDeleniti ipsam est aut facilis neque. Consequatur incidunt consectetur maiores molestias impedit aut a. Dolore ea delectus magni placeat consequatur praesentium. Sint odit molestiae earum est voluptas et mollitia.\n\nQuisquam et aut ut fugiat. Id necessitatibus quidem ipsam vitae quam voluptas facere. Dolore deleniti blanditiis reprehenderit et hic deserunt. Et consequatur sed possimus voluptatem deserunt aut. Corporis incidunt ratione ipsa ipsum sed.\n\nHarum nam voluptas ut velit est dolorem ipsa sunt. Amet quia et consequatur corporis et. Et alias dolorum eos dolores veniam autem rerum.\n\nExercitationem nisi nobis culpa incidunt sed labore eum. Nostrum sed ipsum aperiam. Ut ipsa ut dignissimos eveniet. Voluptas explicabo in iste molestiae quaerat.\n\nOdio dolorem ut excepturi mollitia molestiae eos nisi. Quo eos aut amet illum voluptate. Animi et voluptatum velit et sint debitis. Et et similique minus aut dolores.','Post_Image_4.jpg',4,0,'2016-07-26 09:00:00','2016-07-26 09:00:00','2016-07-26 09:00:00',3,78),
	(9,'Ducimus in omnis itaque aut.','molestias-dicta-officia-placeat-iusto-natus-aspernatur-sint','Illum voluptatem cupiditate aut.','Sit sit labore enim accusantium omnis quasi. Unde nostrum itaque quasi. Libero distinctio molestias dolor animi dolorum.','Voluptatem nihil doloremque cupiditate earum doloribus ducimus. Quo enim praesentium sint molestias aut ab est. Et sed est quia. Mollitia sapiente perspiciatis id nesciunt.\n\nIpsa atque voluptas et sed in libero. Et ab est eveniet nobis quaerat est. Et delectus nulla velit quisquam perspiciatis. Animi non vel et sapiente dolorem quia fugiat.\n\nEt eveniet perferendis accusamus commodi quo quod deserunt. Officiis facilis laborum eum quidem et nemo aut doloribus. Hic sed dolor magni labore. Fuga rerum laudantium iusto vel qui alias.\n\nEos similique alias similique tenetur. Omnis similique ab perferendis qui minima. In voluptatem incidunt suscipit adipisci laborum adipisci. Officiis nisi sequi sit corrupti dolor neque. Ipsam laborum eum cupiditate magnam assumenda accusamus molestiae.\n\nVel qui dolorum ad. A labore minima sit perferendis. Ex et totam repellendus voluptate corrupti ipsum unde beatae. Eum tempore eius ut doloribus velit consequatur dolor autem.\n\nSequi harum similique consectetur voluptas. Placeat eos iste dicta optio sed ea. Consequatur ut dolorem ut sed qui enim eveniet. Natus nemo libero dicta.\n\nQui quia quisquam modi illo suscipit. Voluptatem et sint commodi aut doloremque facere officiis. Ipsum sed sint assumenda laboriosam magnam doloribus ea error.\n\nVoluptas omnis pariatur modi quis. Numquam aspernatur sit est voluptatem repellendus hic voluptates voluptatem. Aperiam ex possimus doloremque harum.\n\nSimilique voluptates numquam sit. Omnis corrupti rerum distinctio molestias. Aut consequatur et a et omnis a.\n\nDistinctio quis id quis aut magni. Omnis vitae qui occaecati aspernatur odio aspernatur. Dolor voluptatibus id dolore ut quos impedit et.\n\nVoluptates blanditiis velit et et reprehenderit laborum est. Perspiciatis rerum assumenda ut et et assumenda tenetur.\n\nExpedita tempora excepturi itaque unde reprehenderit. Corporis molestiae in tempora quod molestias. Repellat perferendis labore tempore delectus. Cumque rerum placeat sequi et.','Post_Image_4.jpg',5,0,'2016-08-04 09:00:00','2016-08-04 09:00:00','2016-08-04 09:00:00',2,89),
	(10,'Eius voluptate perferendis laboriosam suscipit.','occaecati-at-repellendus-ipsa-quia-consequuntur-magni-dolorem-qui','Tenetur aliquid qui ea et.','Mollitia reprehenderit libero optio. Commodi mollitia beatae voluptate ea. Nobis est consequatur modi voluptas autem ipsam. Id eos veniam quae dolor.','Et impedit in quam quia eveniet nihil et. Aliquam voluptas consectetur nostrum quis tenetur soluta quasi. Aliquid quam ut reprehenderit nesciunt.\n\nEligendi quasi aut consequatur est. Aut quae nobis numquam laboriosam suscipit quaerat praesentium. Fugit eos dolor vel nisi qui et aut.\n\nItaque cumque nihil optio doloribus perspiciatis. Illum cupiditate tempora consequatur eaque perspiciatis facilis sed. Aperiam sed sint esse eum saepe facilis odio. Voluptas est aspernatur officia nemo quis quia minima.\n\nEt voluptatibus modi labore earum. Est autem ducimus ut sint maxime sit excepturi magnam. Commodi voluptas laborum est. Quod et aut ut ea. Et ex deleniti illo sint cupiditate sint placeat.\n\nVeritatis qui cum qui quisquam. Delectus dignissimos totam quia fugiat quis.\n\nDoloribus fugiat expedita nisi dolore neque hic velit. Excepturi quod facere dolorem quibusdam. Aliquid nam ratione nihil aliquid.\n\nDucimus eligendi qui dolorem molestias sit et. Qui voluptas quibusdam voluptatem ipsa unde.\n\nPraesentium ipsum sapiente necessitatibus. Quaerat a id aut aliquid aut qui quaerat. Aut est similique nisi qui odio enim sed non.\n\nOmnis laboriosam laudantium ipsa sequi veritatis explicabo a. Aut vero molestiae eveniet voluptas corporis magnam et veritatis. Omnis ut dolor ut consectetur nobis.\n\nAut maiores labore illo perferendis voluptatem et et architecto. Beatae autem aut eum rerum recusandae repudiandae. Dignissimos dolores est veritatis delectus voluptates excepturi nostrum quo. Maxime velit porro autem similique.\n\nVelit ut commodi ea consectetur autem repudiandae ea. Pariatur exercitationem ab voluptatem nihil fugit non. Voluptas dolor voluptatem beatae sapiente velit repudiandae.','Post_Image_2.jpg',4,0,'2016-08-14 09:00:00','2016-08-14 09:00:00','2016-08-18 09:00:00',6,50),
	(11,'Minus magnam possimus maiores unde numquam.','praesentium-illo-voluptatem-quo-ea-aliquid-voluptas-officiis','Ducimus a aperiam ut.','Quam itaque dolorem qui est harum dolorum. Sed non quis rerum tenetur qui.','Et eaque et laboriosam reprehenderit aut et odio qui. Recusandae facere quia aut non. Velit quia omnis illum beatae. Nemo facere dolores alias fuga fugit nesciunt. Deserunt eos voluptatum debitis dolor delectus.\n\nAlias eligendi voluptatem molestiae qui. Et voluptatibus velit sequi quod animi aperiam placeat consequatur. At nam harum odio earum. Et sit perferendis sit possimus commodi.\n\nTenetur odit iste omnis assumenda doloremque. Aut eum ut non assumenda nesciunt. Ex nihil mollitia cum dolor repudiandae incidunt.\n\nSimilique provident tempore sed autem. Accusamus animi impedit aliquam voluptas sequi itaque. Architecto modi veritatis sit exercitationem ex. Dolores vitae mollitia iusto distinctio voluptatibus. Veniam voluptas nisi sequi modi et consequuntur officia.\n\nAdipisci enim molestias unde nemo ut officiis ratione. Est et omnis mollitia dolor sint.\n\nQuia commodi suscipit possimus ab. Perferendis deserunt dolor sed nesciunt beatae tempore architecto velit. Soluta commodi atque labore sit. Dolorum consequuntur omnis voluptatibus illum consectetur. Nisi velit officia illum repellat dignissimos voluptatem.\n\nEst doloribus ab vel eos corporis neque. Sit et dolorum aperiam et et. Mollitia totam officia quia sint at.\n\nIusto perspiciatis est nemo illo. Autem modi ullam reiciendis a tempora. Qui rerum et voluptatem aliquam consequuntur atque nostrum pariatur.\n\nAliquam molestiae eligendi doloribus nostrum expedita. Animi eveniet quis doloremque ex ipsa cum. Autem tempora debitis quidem amet.\n\nSimilique iste veritatis culpa earum rerum assumenda. Necessitatibus perferendis et cupiditate qui eos quo. Rem ad facere fuga asperiores. Ab adipisci delectus nulla.\n\nFacere saepe consequuntur laudantium accusantium aperiam. Ut expedita sequi est qui dignissimos molestiae. Mollitia ad aliquam est minus qui consequatur quibusdam atque. Qui nihil deleniti sed.\n\nConsequatur sequi velit adipisci minima et. Et laudantium voluptatem aspernatur qui ipsam laudantium cum. Illum eos qui possimus soluta vel accusantium corporis.\n\nRecusandae quisquam nihil voluptatum nam rem. Quod voluptate dolores unde aut. Est dolor facere aut repellat. Ut hic vero sequi hic ducimus ut at.\n\nAutem quisquam architecto dolorem earum. Nihil ipsum vel sunt quo ipsa adipisci. Accusamus consequatur tenetur modi. Debitis consequuntur labore quia impedit sequi est.','Post_Image_2.jpg',5,0,'2016-08-25 09:00:00','2016-08-25 09:00:00',NULL,1,81),
	(12,'Sit neque vitae placeat commodi saepe.','corrupti-non-amet-hic-pariatur-facilis-quisquam','Voluptate aliquam ut et qui doloremque in tempore.','Qui adipisci possimus impedit earum. Temporibus earum et earum aut est sed.\nFugit dolorum doloribus est. Illum dolorum maiores tempore. Dolor iusto ut fugit in. Molestiae qui repudiandae eius itaque.','Est optio molestiae earum ipsum laudantium aut. Adipisci repudiandae aut adipisci incidunt maxime. Consequatur assumenda aut rerum.\n\nQuia ex facere exercitationem nihil non et quidem. Reiciendis sunt reiciendis rerum illum aut saepe. Illo perspiciatis harum et.\n\nQuae quia et nam vero aut consequatur laboriosam voluptate. Laudantium et in unde rem tenetur vel quasi.\n\nIllum tempore exercitationem quibusdam rerum quis minus eaque. Repudiandae qui et dolorem. Consequatur numquam consequatur nihil nesciunt adipisci earum. Quibusdam laborum et consequatur accusamus.\n\nAssumenda optio dolores odio alias. Illum totam natus hic. Et quo sint molestiae quas.\n\nCorporis possimus excepturi nihil et ut perspiciatis vitae quas. Aperiam nostrum id eos inventore est praesentium eveniet. Quae commodi est iusto corrupti voluptas eveniet.\n\nOfficiis eum perspiciatis aspernatur necessitatibus minus reiciendis sit nihil. Veniam perspiciatis exercitationem praesentium quam.\n\nNobis at eligendi doloribus quia ea. Aliquam est nam quaerat inventore perferendis non libero rerum.\n\nVelit dolorum dolorem non autem fuga. Fuga laboriosam non est dolorem libero iste quia.\n\nConsequatur saepe dolores non atque harum suscipit eligendi. Debitis qui iure molestiae aut. Sint itaque eaque id corrupti.\n\nAd harum sunt facilis dolores excepturi ad. Animi vero omnis officia autem.','Post_Image_2.jpg',3,0,'2016-09-06 09:00:00','2016-09-06 09:00:00','2016-09-10 09:00:00',4,62),
	(13,'Eveniet omnis quia non.','minima-non-magnam-totam-accusamus-accusantium','Ut voluptas autem expedita nulla harum est voluptatem.','Assumenda ipsum id nobis error quaerat perspiciatis deleniti. Nihil aperiam doloremque saepe et doloribus at. Omnis non laudantium sequi quod. Qui in dolorum aut provident assumenda.','Est vero et quia autem et sed. Repellendus odio quos nihil. Omnis magni saepe voluptatem voluptatem dolor voluptates sunt.\n\nVoluptatem dolor officiis quaerat. Quasi rerum sint voluptas et voluptatum quibusdam iste. Nihil natus quae fugit deleniti. Delectus maiores amet enim iure.\n\nCommodi maxime eum sit odit sed hic quas. Recusandae corporis eum quisquam. Hic nisi eum impedit est possimus dolorem dolores. Delectus adipisci et tenetur.\n\nQuidem explicabo ducimus doloribus quibusdam in doloribus molestiae. Vel deleniti sed dolores eos aut delectus. Recusandae sint vel excepturi magni facere. Ratione suscipit deleniti eveniet a quisquam et eligendi.\n\nSit repellat recusandae unde voluptates. Fugiat et laboriosam eos hic facere. Non eum necessitatibus et et.\n\nQui nulla voluptates doloremque quidem. Rerum assumenda et consequatur autem dolor impedit rerum odit. Et nostrum ut adipisci aut. Commodi exercitationem aut voluptatibus quasi voluptas.\n\nVeniam voluptatem quod impedit aliquam autem est. Quis voluptates iste blanditiis necessitatibus. Natus fuga ipsa quis placeat quia voluptatem.\n\nRepudiandae voluptatum debitis suscipit dolor aut consequatur. Omnis corrupti voluptate deserunt. Nemo commodi modi dignissimos atque velit accusantium iusto inventore.\n\nOfficiis consectetur architecto laborum consequuntur voluptates. Enim dolores ad ad ut voluptas inventore laboriosam illum. Sit eos delectus consequatur est qui impedit. Incidunt dolorem molestiae aut eum. Repudiandae adipisci fuga quis quas.\n\nEst odio ipsa quaerat vitae inventore dolor rerum. Iusto temporibus ipsum occaecati temporibus excepturi. Nihil vel qui perferendis reiciendis atque.\n\nOmnis sit velit itaque. Quis et perspiciatis praesentium provident atque voluptas saepe ab. Voluptatem quia ut quaerat harum. Error totam reprehenderit ad veritatis eaque ut qui consequatur.\n\nSint numquam quo repellat explicabo voluptatem sit. Et animi eligendi dicta praesentium illo quo. Quod incidunt accusamus veritatis soluta enim asperiores sequi.\n\nCumque voluptatem delectus et corporis molestiae et in ea. Et quasi est est expedita odit nesciunt nesciunt. Commodi repellat sunt odit excepturi molestiae qui rem. Rem excepturi et consequuntur cumque.','Post_Image_1.jpg',3,0,'2016-09-19 09:00:00','2016-09-19 09:00:00',NULL,2,43),
	(14,'Non eligendi voluptas autem odio ut non.','dignissimos-qui-iusto-eos-alias-ea-quia','Iure aperiam nam explicabo.','Eum voluptatibus rerum minus ratione. Harum voluptates magni voluptates quo fugiat voluptatum et excepturi. Ad minus tempora pariatur dicta et et.','Consequatur rerum iste et labore. Ut ullam molestias assumenda pariatur in. Ab unde et est amet tempore in cumque vel.\n\nQuae quae qui quia et. Eum rerum perferendis ea quia et. Corrupti velit aut qui fuga facilis adipisci.\n\nId iusto ex et nemo. Ut qui voluptas aliquid ullam. Libero aperiam praesentium enim a aut excepturi dicta eius. Cum mollitia officia inventore quia.\n\nEst ex est alias facere. Excepturi ducimus at nihil labore mollitia. Reiciendis neque ea nesciunt at molestiae minima.\n\nEt est voluptatem exercitationem aut optio rerum qui facilis. Corrupti asperiores odit assumenda sed ea ipsum fuga. Ducimus hic optio qui sed aut.\n\nConsequatur commodi explicabo qui aliquam. Ut expedita atque amet corrupti assumenda ut.\n\nMaiores id culpa exercitationem. Eos quasi doloremque commodi sunt facilis sint. Et rerum reiciendis pariatur ad ducimus. Id voluptatem rerum fugiat qui.\n\nEt rerum et velit mollitia aspernatur harum explicabo. Ex error quidem consectetur architecto voluptatibus assumenda odit. Et ut consequatur similique voluptas repellat dolor quia quisquam. Aut blanditiis in porro ut velit perspiciatis id eligendi.\n\nAliquam maiores et deleniti quae enim alias. Dolores autem earum consequuntur. Magni id tempora libero aut deserunt nesciunt.\n\nVoluptas neque adipisci quidem aliquid vel dolor inventore. Eum dolorem dicta iste. Ea architecto nulla impedit quis sit sed minus vero. Est voluptates illum sed et dignissimos.\n\nEum tempora ut vero culpa aut at. Perspiciatis corporis consectetur quia et. Temporibus consequatur nihil dolorem quis.','Post_Image_3.jpg',3,0,'2016-10-03 09:00:00','2016-10-03 09:00:00','2016-10-07 09:00:00',2,64),
	(15,'Eveniet sit et molestias pariatur.','rerum-porro-velit-iusto-ipsa-reprehenderit-culpa-amet','Animi in iure voluptas dolorem provident eum ad.','Fugit voluptatibus eaque corrupti numquam. Et ducimus aut iste qui. Aspernatur qui ullam sit eos perferendis nobis sequi.','Rem voluptates iusto porro est autem repudiandae voluptates. Porro eligendi saepe aut autem. Similique culpa minima eveniet est odio molestiae earum. Dicta enim labore molestias sint.\n\nEa ex nemo soluta qui voluptatem amet. Aut omnis nihil officiis ullam aut dolore. Et consequatur libero delectus vel alias sed.\n\nLaboriosam harum et dicta atque perspiciatis architecto nihil. Dolorem accusantium occaecati facilis quia sit. Asperiores quos aut placeat velit consequatur labore. Dolore dolorum dolor porro assumenda vero.\n\nVoluptatem in consequatur praesentium veritatis soluta. Eum accusantium laborum est quo qui autem deserunt. Et velit odit tenetur mollitia. Voluptatum omnis eligendi minima exercitationem laborum enim minus.\n\nMolestias vel fuga voluptatibus fugiat dicta ducimus. Libero quidem omnis possimus aliquam. Dolor et quisquam recusandae perspiciatis et incidunt rerum accusamus. Hic voluptas iusto blanditiis eos enim quam fugit.\n\nFugiat sit inventore accusamus eveniet voluptas et ut molestiae. Omnis enim in deleniti quis dolor. Non explicabo esse sed ullam inventore voluptas molestias. Perspiciatis quis amet commodi doloribus.\n\nDeserunt similique alias accusantium rem voluptatum aliquam velit. Excepturi fuga qui impedit iste sed vel molestiae. Fugiat velit illum rerum architecto porro ullam.\n\nMaxime qui distinctio voluptas nihil. Qui quo repellendus voluptatem officia quibusdam voluptas. Placeat placeat nulla mollitia. Rerum sit cupiditate nihil quidem quia.\n\nCulpa repellat eum est laborum consequatur vel. Dolores quia quod est qui occaecati. Enim non sunt inventore vel ad eius.\n\nQui et odio iusto omnis libero deleniti rerum. Sit omnis consequuntur dolorem laborum provident earum. Corporis cupiditate temporibus saepe nostrum. In ratione adipisci voluptas doloremque.\n\nMinima voluptatem aut eligendi porro. Quo soluta ab ea. Natus qui et totam fuga ut ea ipsam.\n\nQuam aut laboriosam ratione consequatur sit. Praesentium vitae non odio sapiente est adipisci. Nostrum voluptates consectetur illum. Eaque alias voluptas sit quia nulla.',NULL,5,0,'2016-10-18 09:00:00','2016-10-18 09:00:00',NULL,1,45),
	(16,'Est eos maxime architecto nesciunt tenetur aspernatur laborum.','aut-a-labore-alias-eos-architecto-dignissimos','Laudantium et autem animi quo maiores et iure.','Maiores aut labore tempore hic dolorem consequatur. Possimus asperiores quia rerum hic. Numquam nihil molestiae tempore.','Id temporibus vero occaecati nobis voluptas et. In eum fugit aut aut beatae doloremque corrupti. Non fuga consequatur sed porro et facilis. Nihil voluptas praesentium unde harum quisquam quia.\n\nFuga voluptatum nesciunt dolor officiis. Nihil a unde qui facere. Eum voluptatem eveniet voluptas sunt dolorum porro id. Quod quo consequatur quaerat beatae vero aliquid deleniti.\n\nAsperiores voluptatem fuga asperiores unde aut. A illo cumque sed nobis autem. Ut dicta cum repudiandae minus.\n\nVel omnis in accusantium. Vero nemo molestias tempore eaque dolorem vitae. Et ipsum non numquam illum molestias. Aut et nesciunt ipsam atque praesentium fuga aliquid.\n\nAccusamus totam non corrupti tempora repellat. Velit non et omnis veritatis amet. Sapiente quaerat recusandae et expedita vel. Iure tempora dolorem cumque aspernatur perferendis autem officia.\n\nSunt dignissimos voluptas non. Et sed iste qui. Distinctio quia vitae similique molestias. Id sed culpa odio dolorum voluptates. Dolor quia corporis similique eos omnis quaerat aut.\n\nSit eum commodi est dicta. Magni aut reprehenderit assumenda autem ipsum eveniet ut itaque. Et doloribus tempore voluptatibus ab et aut. Et fugiat voluptas culpa doloribus nihil ipsam similique.\n\nNatus totam dolor harum excepturi labore autem. Asperiores excepturi hic libero ut. Dolorem molestiae asperiores sunt cumque nobis. Temporibus esse temporibus officia velit provident qui dicta.\n\nRecusandae et quas unde hic cumque in. Dolorem aperiam in quia. Dolorem rerum et in cum. Quidem deleniti dolorem iste ut quis id modi.\n\nAtque at numquam omnis fugit. Culpa ut a velit modi perferendis. Eligendi minima voluptatem exercitationem nihil minima.\n\nQui est nam quas itaque dicta. Suscipit vitae voluptas quos aut id. Repellendus ut quas laudantium eius.\n\nFugiat omnis quo quia molestias ipsa placeat. Eaque molestiae culpa dolor quia nostrum eum labore. Cumque ut quibusdam et sequi omnis. Sit qui cum praesentium similique. Sequi dolores a aliquam.\n\nQuo consequuntur possimus sunt aspernatur non. Fugiat deserunt rerum est illo. Qui et nobis necessitatibus sequi ea quidem.\n\nAnimi omnis eos optio nemo omnis minima. Expedita nulla vitae doloremque deleniti laborum. Ipsum corrupti cupiditate voluptatem.\n\nNulla necessitatibus corporis aut. Voluptas delectus dolorum quia voluptate quis. Quasi facere molestias corrupti modi quam qui. Consectetur enim magni velit eveniet voluptatem.','Post_Image_3.jpg',5,0,'2016-11-03 09:00:00','2016-11-03 09:00:00','2016-11-07 09:00:00',1,76),
	(17,'Repellendus nihil aliquam velit.','et-deleniti-et-ea-praesentium-quod-animi','Eum voluptatem itaque accusantium.','Omnis totam blanditiis non ut. Dolor dignissimos a accusamus soluta ut eum. Et sed magni facilis aperiam voluptas laborum rem.','Omnis doloribus exercitationem repudiandae vel culpa. Blanditiis maiores est ullam temporibus. Nihil ut qui et itaque. Necessitatibus sit qui expedita sit. Occaecati voluptas voluptatem tempora repellat rem aut veritatis.\n\nSaepe libero quae officia quo. Voluptas laborum repellat voluptatem reprehenderit amet. Et similique dolore et consequuntur quasi exercitationem dicta.\n\nTemporibus aut ea et sint. Sit aut aut doloribus aliquam harum aperiam omnis. Maxime quae dicta vel.\n\nItaque a reiciendis et exercitationem cum. Asperiores delectus ipsum molestiae optio perspiciatis. Quis enim harum voluptatem sit. Corrupti exercitationem sequi velit soluta voluptas officiis eligendi veniam.\n\nFugiat iure quam eum totam nihil repudiandae. Commodi occaecati et sed quisquam. Itaque alias ut est. Cum quod vitae amet sapiente.\n\nEst illo reprehenderit et odit. Enim repellendus rerum quae repudiandae. Vel corporis consectetur ut voluptas. Velit commodi aliquam cupiditate qui reiciendis asperiores.\n\nAut qui eaque dolorem ducimus et quam est. Nihil omnis possimus maiores debitis velit. Esse quibusdam qui sit et libero dicta hic. Dolore sequi sint repellat eos reiciendis ut.\n\nAnimi ratione quis nesciunt ut earum amet placeat at. Debitis iste veritatis sit aut odit quo suscipit. Non dolorem occaecati nesciunt eos voluptatem rerum. Et ea quasi commodi et.\n\nSit ut tenetur velit adipisci. Voluptatum numquam rerum ut reprehenderit atque praesentium accusamus. Sit provident vitae nostrum quia.\n\nDolore maxime porro et. Incidunt dolores at at. Soluta sunt qui dolor perferendis voluptatem dolor.\n\nTempore quisquam non id. Dolores ipsa facilis ea temporibus omnis. Cupiditate quo consequatur veniam quod quo et.\n\nAut saepe modi magni consequuntur quia quidem. Et perferendis sed et magni praesentium distinctio magni quaerat. Ut facilis aut blanditiis mollitia a nihil.\n\nQuasi debitis voluptas beatae dolores. Id assumenda cupiditate repellat tenetur necessitatibus quam.','Post_Image_2.jpg',5,0,'2016-11-20 09:00:00','2016-11-20 09:00:00',NULL,1,37),
	(18,'Et sint eius temporibus repellendus.','sequi-quae-non-alias-iure','Et quidem aspernatur voluptas quibusdam.','Qui distinctio molestias beatae quod officiis aut dolores. Officia nemo non dicta quod quisquam. Vero facilis in culpa vel. Nobis consequatur sunt accusantium facilis a.','Enim inventore maxime et quisquam. Sint quas fuga veritatis consequatur error rerum. Quod dolorem quia similique est. Sint itaque et assumenda ut vel odio sed.\n\nFugit rerum nobis id deserunt. Esse neque blanditiis modi aliquid sed dolorem. Ut sunt quam saepe aliquam assumenda doloribus consequatur. Est perspiciatis quo fugiat fugit voluptates non porro.\n\nOfficiis est asperiores fugit sequi ea nulla a. Architecto autem quo et. Voluptatum occaecati delectus eum delectus ex quas.\n\nSunt sed voluptas est rerum facere. Minima atque ullam quisquam molestias ad unde. Recusandae pariatur sed ducimus qui ut dolorem modi et.\n\nDolores nisi est consequatur reiciendis est tenetur. Odio quas aut et.\n\nUllam eum optio sit odio quod. Quaerat excepturi aut ipsam ipsa reiciendis saepe sed. Quae quaerat consequatur amet autem dolores.\n\nIn praesentium deleniti molestias animi. Ea incidunt aliquam asperiores magnam accusamus maiores. Quia occaecati veniam voluptates consequuntur aperiam quisquam est.\n\nHic aut autem natus facilis quibusdam ut doloribus. Dolore eligendi quibusdam quisquam.\n\nVoluptatum quam placeat ducimus. Odit iure et impedit maiores sed omnis dolorum. Velit nisi ducimus expedita officiis quis.\n\nOmnis vitae inventore porro rem et exercitationem sit. Itaque consequatur modi expedita maxime dolores. Qui est omnis fuga.\n\nFugiat aspernatur neque impedit occaecati quae. Reprehenderit dolor doloremque dolorem. Doloribus qui cupiditate debitis dolore sint illum.\n\nExercitationem et dolorem laudantium. Eos eos at rem nihil quia et ipsa. Nesciunt repellat consequatur velit reiciendis et. Nihil officia qui eius.','Post_Image_3.jpg',3,0,'2016-12-08 09:00:00','2016-12-08 09:00:00',NULL,5,118),
	(19,'Vero eos perspiciatis commodi reprehenderit magnam magni esse.','necessitatibus-sunt-molestiae-quisquam-ut-accusantium-ad','Magnam cupiditate eum ducimus incidunt amet quae pariatur.','Et omnis rem est tempora provident. Voluptatum officia nam est error hic at.','Inventore quasi aliquid officia sapiente. Ea dicta hic dicta temporibus velit. Nulla suscipit molestiae consequatur dolores sit. Facere sequi vel nostrum asperiores.\n\nVoluptas fugiat exercitationem doloremque vero. Neque beatae asperiores praesentium quod placeat vel et. Quas fugiat ad culpa. Impedit qui aliquam sapiente quam.\n\nSoluta esse necessitatibus et accusantium commodi numquam. Dolorem eaque vero autem minima. Omnis officia mollitia consequatur delectus. Quis omnis est deserunt minima.\n\nCorrupti omnis autem amet. Delectus eius officiis consequatur quia. Magni natus impedit cumque sunt.\n\nVoluptatum vitae illo minima et sit modi ipsa mollitia. Aspernatur blanditiis quia delectus molestiae exercitationem. Ratione cumque est et nobis. Architecto quo recusandae aut.\n\nMinima totam id reiciendis voluptatum nemo aut nihil. Eos suscipit repellendus non voluptatem. Similique architecto asperiores delectus expedita alias amet consequatur. Laboriosam et qui natus.\n\nEum soluta reprehenderit aut necessitatibus aliquam. Et autem aperiam voluptas assumenda eveniet et. Quo dolorem non non blanditiis asperiores iste voluptatem.\n\nExercitationem aliquid illo id earum fugit omnis. Voluptatem accusamus rerum et officiis maxime. Dolorem nesciunt provident rerum. Dolor qui sint ullam ipsum deserunt.\n\nAut dolor earum magni quis. Et ratione corrupti in corporis ab consequatur illo. Rerum enim nostrum eligendi dolores quas velit ipsam ex. Est commodi odio quo voluptas illum.\n\nQuos expedita aliquid velit cumque aspernatur est. Ratione molestiae rem beatae animi pariatur veniam corporis. Dolore delectus pariatur quod ut aut autem aut.\n\nEveniet quasi dolores dolore ratione accusantium. Id exercitationem suscipit reiciendis veniam suscipit magni molestiae. Commodi sed inventore quaerat a nemo.\n\nExcepturi quia debitis ut non accusantium eos. Itaque dolore dolorem corporis harum ex velit. Debitis aut deserunt quaerat neque. Aperiam enim explicabo quaerat deserunt odit officiis.','Post_Image_4.jpg',3,0,'2016-12-27 09:00:00','2016-12-27 09:00:00',NULL,5,99),
	(20,'Consectetur fugiat velit cum corporis deleniti reprehenderit.','vero-illum-quasi-et-rerum','Illum eum dolor temporibus illum necessitatibus sunt.','Et ea maiores aut pariatur. Occaecati ad voluptatem placeat et ipsam et est vitae. Quaerat quia aut aut est voluptatibus magnam. Praesentium aut non voluptatem natus quasi dolorum cupiditate.','Vel est fuga qui nostrum. Amet ipsam optio et est est pariatur ea. Sint in architecto voluptatum ut repudiandae ut.\n\nAliquam ipsam animi recusandae aperiam aut sunt. Facilis animi repellendus molestias maxime quos. Magni ut eum et a quasi expedita. Adipisci voluptatum quisquam est expedita. Deleniti dolorem architecto atque sit commodi quaerat.\n\nVoluptatem numquam libero nihil nisi dolores. Inventore officiis sunt aut amet soluta ipsa. Quia omnis aut sunt totam sit.\n\nEst cum et quam aut et perferendis. Quod officia ea aut. Sed quaerat labore quis voluptas cumque natus sunt. Aut odio distinctio repellat numquam.\n\nQui qui nemo laboriosam quia est ipsum similique necessitatibus. Voluptatem voluptatem ipsa ea. Dolores earum incidunt saepe incidunt sint.\n\nAut sint voluptatem ut earum. Adipisci expedita commodi reprehenderit quidem eveniet. Rerum aliquam expedita sed voluptatem debitis autem sit sed.\n\nQui laudantium velit sed et. In excepturi dolor minima. Magnam sint deserunt sed recusandae corporis.\n\nQuia accusantium excepturi sunt et. Est eaque voluptas corporis asperiores ut. Facilis est nesciunt molestiae illo possimus. Sint quia quisquam deserunt quos.\n\nAb delectus nam amet eos omnis autem labore ullam. Earum beatae facilis voluptates ipsam. Blanditiis fugiat quia dolorem et aliquam.\n\nCupiditate alias omnis et asperiores repellendus voluptate velit. Consectetur ut facere et velit et odio error. Et aut est qui sapiente praesentium maxime. Porro quae incidunt qui sapiente.\n\nDebitis molestias quis repellendus magni earum nemo est. Repellat eos est vero eum qui. Perferendis nobis ducimus praesentium commodi.',NULL,4,0,'2017-01-16 09:00:00','2017-08-12 13:45:22','2017-01-20 09:00:00',6,98);

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

LOCK TABLES `permission_user` WRITE;
/*!40000 ALTER TABLE `permission_user` DISABLE KEYS */;

INSERT INTO `permission_user` (`permission_id`, `user_id`, `user_type`)
VALUES
	(9,7,'App\\User'),
	(10,7,'App\\User'),
	(11,7,'App\\User');

/*!40000 ALTER TABLE `permission_user` ENABLE KEYS */;
UNLOCK TABLES;


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
	(1,'create-users','Create Users','Create Users','2017-08-11 21:27:49','2017-08-11 21:27:49'),
	(2,'read-users','Read Users','Read Users','2017-08-11 21:27:49','2017-08-11 21:27:49'),
	(3,'update-users','Update Users','Update Users','2017-08-11 21:27:49','2017-08-11 21:27:49'),
	(4,'delete-users','Delete Users','Delete Users','2017-08-11 21:27:49','2017-08-11 21:27:49'),
	(5,'create-acl','Create Acl','Create Acl','2017-08-11 21:27:49','2017-08-11 21:27:49'),
	(6,'read-acl','Read Acl','Read Acl','2017-08-11 21:27:49','2017-08-11 21:27:49'),
	(7,'update-acl','Update Acl','Update Acl','2017-08-11 21:27:49','2017-08-11 21:27:49'),
	(8,'delete-acl','Delete Acl','Delete Acl','2017-08-11 21:27:49','2017-08-11 21:27:49'),
	(9,'read-profile','Read Profile','Read Profile','2017-08-11 21:27:49','2017-08-11 21:27:49'),
	(10,'update-profile','Update Profile','Update Profile','2017-08-11 21:27:49','2017-08-11 21:27:49'),
	(11,'create-profile','Create Profile','Create Profile','2017-08-11 21:27:50','2017-08-11 21:27:50');

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
	(3,3,'App\\User'),
	(4,4,'App\\User'),
	(5,5,'App\\User'),
	(6,6,'App\\User');

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
	(1,'superadministrator','Superadministrator','Superadministrator','2017-08-11 21:27:49','2017-08-11 21:27:49'),
	(2,'administrator','Administrator','Administrator','2017-08-11 21:27:49','2017-08-11 21:27:49'),
	(3,'editor','Editor','Editor','2017-08-11 21:27:49','2017-08-11 21:27:49'),
	(4,'author','Author','Author','2017-08-11 21:27:49','2017-08-11 21:27:49'),
	(5,'contributor','Contributor','Contributor','2017-08-11 21:27:50','2017-08-11 21:27:50'),
	(6,'subscriber','Subscriber','Subscriber','2017-08-11 21:27:50','2017-08-11 21:27:50');

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'Superadministrator','superadministrator@app.com','$2y$10$iD9rfFDAp/hJ8hO1TGNZau7qfUygnHckUWRg8rVntbJ1.xsF/cIa2',NULL,'2017-08-11 21:27:49','2017-08-11 21:27:49'),
	(2,'Administrator','administrator@app.com','$2y$10$2j5FvEOQ7cvqr7ncVTWDS.pVhPQwMA7lYK5Xvczu5SX9DUKa6Wre6',NULL,'2017-08-11 21:27:49','2017-08-11 21:27:49'),
	(3,'Editor','editor@app.com','$2y$10$XIu5QI2kE2wLe6gjWA//4u4ecJEM3od97jIWjxyqZAtAC7WMD9QTG',NULL,'2017-08-11 21:27:49','2017-08-11 21:27:49'),
	(4,'Author','author@app.com','$2y$10$F5Qn/Xkthwq0XrHNjrU..eF5OX3bRM96s5vR6qyykmjaDrLTrsXNK',NULL,'2017-08-11 21:27:50','2017-08-11 21:27:50'),
	(5,'Contributor','contributor@app.com','$2y$10$Nnlg06kHYITj6.chUCUTnO0e/UjJ6WULnUyfcyEvW1WxJQAsZtmaK',NULL,'2017-08-11 21:27:50','2017-08-11 21:27:50'),
	(6,'Subscriber','subscriber@app.com','$2y$10$.zFcnuaT8PnEL.i6en8fQeJMFK3OP8DoZCHu7WXLcJDs4ojNPQSNq',NULL,'2017-08-11 21:27:50','2017-08-11 21:27:50'),
	(7,'Cru User','cru_user@app.com','$2y$10$bvYGwpvtzF5V8QFbQJPJ.O2GR2WIM30yT1Ao2.p2zSoDJenFvoBgy','K8igiIK5mQ','2017-08-11 21:27:50','2017-08-11 21:27:50');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
