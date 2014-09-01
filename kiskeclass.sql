# ************************************************************
# Sequel Pro SQL dump
# Version 4004
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 192.168.10.38 (MySQL 5.5.39-36.0)
# Database: kiskeclass
# Generation Time: 2014-09-01 14:50:35 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table pays
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pays`;

CREATE TABLE `pays` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `amount` int(4) NOT NULL,
  `date` datetime NOT NULL,
  `id_person` int(4) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table people
# ------------------------------------------------------------

DROP TABLE IF EXISTS `people`;

CREATE TABLE `people` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rut` int(4) NOT NULL,
  `debt` int(4) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` mediumtext NOT NULL,
  `stock` int(4) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


# Dump of table products_transactions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products_transactions`;

CREATE TABLE `products_transactions` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `id_product` int(4) NOT NULL,
  `id_transaction` int(4) NOT NULL,
  `cantity` int(4) NOT NULL,
  `amount` int(4) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_products` (`id_product`),
  KEY `id_transactions` (`id_transaction`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table repositions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `repositions`;

CREATE TABLE `repositions` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `id_product` int(4) NOT NULL,
  `date` datetime NOT NULL,
  `cantity` smallint(4) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_products` (`id_product`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table transactions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `transactions`;

CREATE TABLE `transactions` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `id_pay` int(4) NOT NULL,
  `id_person` int(4) NOT NULL,
  `date` datetime NOT NULL,
  `total` int(4) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pays` (`id_pay`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
