# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.38)
# Database: Swoid
# Generation Time: 2015-03-29 13:34:41 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `text` text,
  `date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table messages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) DEFAULT NULL,
  `target_id` int(11) DEFAULT NULL,
  `text` text,
  `date` timestamp NULL DEFAULT NULL,
  `seen` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table notifications_comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `notifications_comments`;

CREATE TABLE `notifications_comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `text` text,
  `date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table notifications_friends
# ------------------------------------------------------------

DROP TABLE IF EXISTS `notifications_friends`;

CREATE TABLE `notifications_friends` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) DEFAULT NULL,
  `target_id` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `seen` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table notifications_posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `notifications_posts`;

CREATE TABLE `notifications_posts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `target_id` int(11) DEFAULT NULL,
  `seen` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table notifications_messages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `notifications_messages`;

CREATE TABLE `notifications_messages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) DEFAULT NULL,
  `target_id` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `message_id` int(11) DEFAULT NULL,
  `seen` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` varchar(255) DEFAULT NULL,
  `target_id` varchar(255) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `text` text,
  `image` varchar(255) DEFAULT NULL,
  `comment_count` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table relations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `relations`;

CREATE TABLE `relations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `friend_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `relations` WRITE;
/*!40000 ALTER TABLE `relations` DISABLE KEYS */;

INSERT INTO `relations` (`id`, `user_id`, `friend_id`)
VALUES
	(1,NULL,NULL);

/*!40000 ALTER TABLE `relations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `post_count` int(11) DEFAULT NULL,
  `friend_count` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
