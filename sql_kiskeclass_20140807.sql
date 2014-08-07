


-- ---
-- Globals
-- ---

-- SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- SET FOREIGN_KEY_CHECKS=0;

-- ---
-- Table 'transactions'
-- 
-- ---

DROP TABLE IF EXISTS `transactions`;# MySQL ha devuelto un valor vacío (i.e., cero columnas).

		
CREATE TABLE `transactions` (
	`id` TINYINT NULL AUTO_INCREMENT DEFAULT NULL,
	`id_pays` TINYINT NULL DEFAULT NULL,
	`fecha` DATE NULL DEFAULT NULL,
	`total` INT(10) NULL DEFAULT NULL,
	`id_persona` INT(25) NULL DEFAULT NULL,
	PRIMARY KEY (`id`)
);# MySQL ha devuelto un valor vacío (i.e., cero columnas).


-- ---
-- Table 'products'
-- 
-- ---

DROP TABLE IF EXISTS `products`;# MySQL ha devuelto un valor vacío (i.e., cero columnas).

		
CREATE TABLE `products` (
	`id` TINYINT NULL AUTO_INCREMENT DEFAULT NULL,
	`nombre` VARCHAR(250) NULL DEFAULT NULL,
	`codigo` VARCHAR(250) NULL DEFAULT NULL,
	`precio` INT(10) NULL DEFAULT NULL,
	`descripcion` MEDIUMTEXT NULL DEFAULT NULL,
	`stock` INT(5) NULL DEFAULT NULL,
	PRIMARY KEY (`id`)
);# MySQL ha devuelto un valor vacío (i.e., cero columnas).


-- ---
-- Table 'pays'
-- 
-- ---

DROP TABLE IF EXISTS `pays`;# MySQL ha devuelto un valor vacío (i.e., cero columnas).

		
CREATE TABLE `pays` (
	`id` TINYINT NULL AUTO_INCREMENT DEFAULT NULL,
	`monto` INT NULL DEFAULT NULL,
	`fecha` DATE NULL DEFAULT NULL,
	`id_persona` INT(25) NULL DEFAULT NULL,
	PRIMARY KEY (`id`)
);# MySQL ha devuelto un valor vacío (i.e., cero columnas).


-- ---
-- Table 'repositions'
-- 
-- ---

DROP TABLE IF EXISTS `repositions`;# MySQL ha devuelto un valor vacío (i.e., cero columnas).

		
CREATE TABLE `repositions` (
	`id` TINYINT NULL AUTO_INCREMENT DEFAULT NULL,
	`id_products` TINYINT NULL DEFAULT NULL,
	`fecha` DATE NULL DEFAULT NULL,
	`cantidad` INT(5) NULL DEFAULT NULL,
	PRIMARY KEY (`id`)
);# MySQL ha devuelto un valor vacío (i.e., cero columnas).


-- ---
-- Table 'products_transactions'
-- 
-- ---

DROP TABLE IF EXISTS `products_transactions`;# MySQL ha devuelto un valor vacío (i.e., cero columnas).

		
CREATE TABLE `products_transactions` (
	`id` TINYINT NULL AUTO_INCREMENT DEFAULT NULL,
	`id_products` TINYINT NULL DEFAULT NULL,
	`id_transactions` TINYINT NULL DEFAULT NULL,
	`monto` INT(10) NULL DEFAULT NULL,
	PRIMARY KEY (`id`)
);# MySQL ha devuelto un valor vacío (i.e., cero columnas).


-- ---
-- Foreign Keys 
-- ---

ALTER TABLE `transactions` ADD FOREIGN KEY (id_pays) REFERENCES `pays` (`id`);# MySQL ha devuelto un valor vacío (i.e., cero columnas).

ALTER TABLE `repositions` ADD FOREIGN KEY (id_products) REFERENCES `products` (`id`);# MySQL ha devuelto un valor vacío (i.e., cero columnas).

ALTER TABLE `products_transactions` ADD FOREIGN KEY (id_products) REFERENCES `products` (`id`);# MySQL ha devuelto un valor vacío (i.e., cero columnas).

ALTER TABLE `products_transactions` ADD FOREIGN KEY (id_transactions) REFERENCES `transactions` (`id`);# MySQL ha devuelto un valor vacío (i.e., cero columnas).


-- ---
-- Table Properties
-- ---

-- ALTER TABLE `transactions` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `products` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `pays` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `repositions` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `products_transactions` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
# MySQL ha devuelto un valor vacío (i.e., cero columnas).
