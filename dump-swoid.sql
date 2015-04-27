# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Hôte: 127.0.0.1 (MySQL 5.6.21)
# Base de données: swoid
# Temps de génération: 2015-04-27 07:16:24 +0000
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



# Affichage de la table messages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `target_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `seen` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `author_id` (`author_id`,`target_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table notifications_comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `notifications_comments`;

CREATE TABLE `notifications_comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `text` text,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `author_id` (`author_id`,`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table notifications_friends
# ------------------------------------------------------------

DROP TABLE IF EXISTS `notifications_friends`;

CREATE TABLE `notifications_friends` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `target_id` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `seen` int(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `author_id` (`author_id`,`target_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table notifications_messages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `notifications_messages`;

CREATE TABLE `notifications_messages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `target_id` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `message_id` int(11) NOT NULL,
  `seen` int(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `author_id` (`author_id`,`target_id`,`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table notifications_posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `notifications_posts`;

CREATE TABLE `notifications_posts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `target_id` int(11) NOT NULL,
  `seen` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`,`author_id`,`target_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



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
	(1,'1','2','2015-04-27 09:08:54','Hey man ! It\'s amazing :p',NULL,NULL);

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
	(1,'Swith','Jeremy','Smith','Debuggeur compulsif',NULL,'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',NULL,NULL,'2015-04-27 09:11:13'),
	(2,'Void','Adrien','Leloup','Grilladeur compulsif',NULL,'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',NULL,NULL,'2015-04-27 09:11:13'),
	(3,'Dr House','Hugh','Laurie','Medecin fou',NULL,'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',NULL,NULL,'2015-04-27 09:11:13');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
