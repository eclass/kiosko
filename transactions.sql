/*
Navicat MySQL Data Transfer

Source Server         : 002 - Desarrollo [192.168.10.34]
Source Server Version : 50534
Source Host           : 192.168.10.34:3306
Source Database       : kiskeclass

Target Server Type    : MYSQL
Target Server Version : 50534
File Encoding         : 65001

Date: 2014-08-28 20:23:12
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for transactions
-- ----------------------------
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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of transactions
-- ----------------------------
INSERT INTO `transactions` VALUES ('1', '0', '1', '2014-08-26 17:38:00', '700', '0');
INSERT INTO `transactions` VALUES ('2', '1', '4', '2014-08-26 17:38:00', '5000', '0');
INSERT INTO `transactions` VALUES ('3', '0', '5', '2014-08-27 03:53:12', '0', '0');

-- ----------------------------
-- Table structure for repositions
-- ----------------------------
DROP TABLE IF EXISTS `repositions`;
CREATE TABLE `repositions` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `id_product` int(4) NOT NULL,
  `date` datetime NOT NULL,
  `cantity` smallint(4) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_products` (`id_product`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of repositions
-- ----------------------------
INSERT INTO `repositions` VALUES ('1', '6', '2014-08-20 12:54:52', '20', '0');
INSERT INTO `repositions` VALUES ('2', '6', '2014-08-20 12:57:52', '10', '0');
INSERT INTO `repositions` VALUES ('3', '6', '2014-08-20 12:52:52', '5', '0');
INSERT INTO `repositions` VALUES ('4', '0', '2014-08-26 22:51:05', '7', '0');
INSERT INTO `repositions` VALUES ('5', '1', '2014-08-26 22:55:00', '8', '0');
INSERT INTO `repositions` VALUES ('6', '1', '2014-08-26 22:55:15', '6', '0');
INSERT INTO `repositions` VALUES ('7', '6', '2014-08-27 00:25:16', '30', '0');
INSERT INTO `repositions` VALUES ('8', '8', '2014-08-27 17:05:10', '20', '0');
INSERT INTO `repositions` VALUES ('9', '1', '2014-08-27 17:05:19', '9', '0');

-- ----------------------------
-- Table structure for products_transactions
-- ----------------------------
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products_transactions
-- ----------------------------
INSERT INTO `products_transactions` VALUES ('1', '1', '1', '2', '300', '0');
INSERT INTO `products_transactions` VALUES ('2', '2', '1', '2', '400', '0');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `price` int(4) NOT NULL,
  `description` mediumtext NOT NULL,
  `stock` int(4) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', 'Ramitas', '7657575765765', '200', 'Ricas ramitas', '29', '0');
INSERT INTO `products` VALUES ('2', 'Barra de Cereal', '8798792837492873', '150', 'Barra de cereal', '10', '1');
INSERT INTO `products` VALUES ('3', 'ashkcjanx kjbsdc', '687698769876', '543543', 'lkdhf nishdfkjhsdfjkh sdfj', '0', '1');
INSERT INTO `products` VALUES ('4', 'asdasdasd', '1231231', '123123', 'asda sd', '7', '1');
INSERT INTO `products` VALUES ('5', 'Pan', '123123', '500', '123123123', '0', '0');
INSERT INTO `products` VALUES ('6', 'Bebida Express', '654654', '150', 'asdañsldkañsd', '30', '0');
INSERT INTO `products` VALUES ('7', 'Plumon Pelican Negro', '7792700996938', '780', 'Lorem ipsum', '19', '0');
INSERT INTO `products` VALUES ('8', 'Papa Frita Evercrisp', '7802000002557', '150', 'Lorem', '39', '0');
INSERT INTO `products` VALUES ('9', 'Jugo Andina 1lt', '7802820700053', '200', 'Lorem ipsum', '19', '0');
INSERT INTO `products` VALUES ('10', 'Bebida Fanta 1.5lt', '7801610671061', '500', 'Lorem ipsum', '19', '0');
INSERT INTO `products` VALUES ('11', 'Cigarros Lucky Click', '78016293', '500', 'Lorem ipsum', '19', '0');
INSERT INTO `products` VALUES ('12', 'DOCE', '12', '100', 'TEST!', '0', '0');

-- ----------------------------
-- Table structure for people
-- ----------------------------
DROP TABLE IF EXISTS `people`;
CREATE TABLE `people` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rut` int(4) NOT NULL,
  `debt` int(4) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of people
-- ----------------------------
INSERT INTO `people` VALUES ('1', 'Eduardo Vargas', 'evargas@eclass.cl', '15539998', '-2500', '0');
INSERT INTO `people` VALUES ('2', 'Sergio Barnachea', 'sbarnachea@eclass.cl', '17667409', '0', '0');
INSERT INTO `people` VALUES ('3', 'Sebastián González', 'sgonzalez@eclass.cl', '17378665', '2000', '0');
INSERT INTO `people` VALUES ('4', 'Rodrigo Bustamante', 'rodrigo.bustamante@eclass.cl', '17150370', '100', '0');
INSERT INTO `people` VALUES ('5', 'Victor San Martin', 'victor@eclass.cl', '16076566', '0', '0');

-- ----------------------------
-- Table structure for pays
-- ----------------------------
DROP TABLE IF EXISTS `pays`;
CREATE TABLE `pays` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `amount` int(4) NOT NULL,
  `date` datetime NOT NULL,
  `id_person` int(4) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pays
-- ----------------------------
INSERT INTO `pays` VALUES ('1', '500', '2014-08-20 23:36:49', '1', '0');
INSERT INTO `pays` VALUES ('2', '500', '2014-08-20 23:41:46', '1', '0');
INSERT INTO `pays` VALUES ('3', '1000', '2014-08-20 23:51:07', '1', '0');
INSERT INTO `pays` VALUES ('4', '1000', '2014-08-20 23:59:07', '1', '0');
INSERT INTO `pays` VALUES ('5', '3000', '2014-08-27 00:26:58', '1', '0');
INSERT INTO `pays` VALUES ('6', '500', '2014-08-27 00:43:36', '4', '0');
INSERT INTO `pays` VALUES ('7', '200', '2014-08-27 01:22:13', '4', '0');
INSERT INTO `pays` VALUES ('8', '120', '2014-08-29 01:14:45', '4', '0');
INSERT INTO `pays` VALUES ('9', '4000', '2014-08-29 01:15:05', '4', '0');
INSERT INTO `pays` VALUES ('10', '80', '2014-08-29 01:15:16', '4', '0');
