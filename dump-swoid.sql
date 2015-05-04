# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Hôte: 127.0.0.1 (MySQL 5.6.21)
# Base de données: swoid
# Temps de génération: 2015-05-04 12:50:01 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Affichage de la table comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `author_id` (`author_id`,`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;

INSERT INTO `comments` (`id`, `author_id`, `post_id`, `text`, `date`)
VALUES
	(1,1,3,'Ouais, genre là tout de suite maintenant ? Avec plein de grillades ...','2015-04-27 09:19:32'),
	(2,3,4,'Tu prends un cachet et tu fais pas chier !','2015-04-27 09:20:16'),
	(3,1,4,'Ok mais si j\'ai pas envie ? ','2015-04-27 09:20:33');

/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table messages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `target_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `author_id` (`author_id`,`target_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;

INSERT INTO `messages` (`id`, `author_id`, `target_id`, `text`, `date`)
VALUES
	(1,2,1,'Void envoie à Swith 1','2015-05-03 13:28:24'),
	(2,1,2,'Swith répond à void 2','2015-05-03 13:28:33'),
	(3,1,2,'Swith répond à void 3','2015-05-03 13:28:45'),
	(4,1,2,'Trop cool ça marche !','2015-05-04 14:22:54');

/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table notifications
# ------------------------------------------------------------

DROP TABLE IF EXISTS `notifications`;

CREATE TABLE `notifications` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ref` varchar(255) NOT NULL DEFAULT '',
  `ref_id` int(11) NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `target_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;

INSERT INTO `notifications` (`id`, `ref`, `ref_id`, `author_id`, `target_id`, `date`, `seen`)
VALUES
	(3,'messages',1,2,1,'2015-05-04 12:59:57',0),
	(4,'messages',2,1,2,'2015-05-04 13:15:21',0),
	(5,'messages',3,1,2,'2015-05-04 13:15:58',0),
	(6,'comments',2,3,1,'2015-05-04 14:14:25',0),
	(7,'comments',3,1,3,'2015-05-04 14:16:09',0);

/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` varchar(255) NOT NULL DEFAULT '',
  `target_id` varchar(255) NOT NULL DEFAULT '',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `text` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `comment_count` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `author_id` (`author_id`,`target_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;

INSERT INTO `posts` (`id`, `author_id`, `target_id`, `date`, `text`, `image`, `comment_count`)
VALUES
	(1,'1','2','2015-04-27 09:08:54','Hey man ! It\'s amazing :p',NULL,0),
	(2,'1','2','2015-04-27 09:17:55','Ce réseau social est mortel !',NULL,0),
	(3,'2','1','2015-04-27 09:18:16','On se fait un BBQ ? ',NULL,1),
	(4,'1','3','2015-04-27 09:18:37','J\'ai mal à la tête, que dois-je faire ??',NULL,2),
	(5,'2','2','2015-04-29 21:07:01','Un statut pour moi',NULL,0),
	(7,'2','2','2015-05-03 11:05:22','Trop coool',NULL,0),
	(20,'1','1','2015-05-03 17:31:36','Un statut à moi, comment c\'est beau ce site',NULL,0),
	(25,'1','1','2015-05-04 10:21:07','coucou',NULL,0),
	(26,'1','1','2015-05-04 10:23:33','coucou',NULL,0),
	(27,'1','1','2015-05-04 10:25:15','qzdqzdqzd',NULL,0),
	(28,'1','1','2015-05-04 10:25:33','qzdqzdqzd',NULL,0),
	(29,'1','1','2015-05-04 10:26:31','kkk',NULL,0),
	(30,'1','1','2015-05-04 10:26:44','kkk',NULL,0),
	(31,'1','1','2015-05-04 10:26:48','kkk',NULL,0),
	(32,'1','1','2015-05-04 10:27:28','qzdqzdqzd',NULL,0),
	(33,'1','1','2015-05-04 10:28:10','qzdqzdqzdqzdqzd',NULL,0),
	(34,'1','1','2015-05-04 10:28:38','idoqizdjoziqjdoiqzjdoiqzjdoiqzjdojzqoidjoqzijdo izqjdoqiz jdoiqzjdoiqzj',NULL,0),
	(35,'1','1','2015-05-04 10:28:47','dozqjdoiqzjdo zqijd oizjq doizqj doiqzj dijq',NULL,0),
	(36,'1','1','2015-05-04 10:29:40','bonjour',NULL,0);

/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table relations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `relations`;

CREATE TABLE `relations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `friend_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`friend_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `relations` WRITE;
/*!40000 ALTER TABLE `relations` DISABLE KEYS */;

INSERT INTO `relations` (`id`, `user_id`, `friend_id`)
VALUES
	(1,1,2),
	(3,1,3),
	(2,2,1),
	(4,3,1);

/*!40000 ALTER TABLE `relations` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '',
  `firstname` varchar(255) NOT NULL DEFAULT '',
  `lastname` varchar(255) NOT NULL DEFAULT '',
  `tagline` varchar(255) DEFAULT '',
  `avatar` varchar(255) DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `post_count` int(11) DEFAULT '0',
  `friend_count` int(11) DEFAULT '0',
  `date_enregistrement` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `tagline`, `avatar`, `password`, `post_count`, `friend_count`, `date_enregistrement`)
VALUES
	(1,'Swith','Jeremy','Smith','Debuggeur compulsif','swith','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',21,2,'2015-04-27 09:11:13'),
	(2,'Void','Adrien','Leloup','Grilladeur compulsif','void','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',3,1,'2015-04-27 09:11:13'),
	(3,'DrHouse','Hugh','Laurie','Medecin fou','drhouse','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',0,1,'2015-04-27 09:11:13');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
