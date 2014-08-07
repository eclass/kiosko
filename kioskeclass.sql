/*
Navicat MySQL Data Transfer

Source Server         : LOCALHOST
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : kioskeclass

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2014-08-07 18:26:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for pays
-- ----------------------------
DROP TABLE IF EXISTS `pays`;
CREATE TABLE `pays` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `monto` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `id_persona` int(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pays
-- ----------------------------

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) DEFAULT NULL,
  `codigo` varchar(250) DEFAULT NULL,
  `precio` int(10) DEFAULT NULL,
  `descripcion` mediumtext,
  `stock` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products
-- ----------------------------

-- ----------------------------
-- Table structure for products_transactions
-- ----------------------------
DROP TABLE IF EXISTS `products_transactions`;
CREATE TABLE `products_transactions` (
  `id` tinyint(11) NOT NULL AUTO_INCREMENT,
  `id_products` tinyint(9) DEFAULT NULL,
  `id_transactions` tinyint(11) DEFAULT NULL,
  `monto` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_products` (`id_products`),
  KEY `id_transactions` (`id_transactions`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products_transactions
-- ----------------------------

-- ----------------------------
-- Table structure for repositions
-- ----------------------------
DROP TABLE IF EXISTS `repositions`;
CREATE TABLE `repositions` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_products` int(9) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `cantidad` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_products` (`id_products`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of repositions
-- ----------------------------

-- ----------------------------
-- Table structure for transactions
-- ----------------------------
DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `id_pays` int(10) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `total` int(10) DEFAULT NULL,
  `id_persona` int(25) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pays` (`id_pays`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of transactions
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `documento` varchar(255) NOT NULL,
  `saldo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'asdsadsa', '', '', '2113');
