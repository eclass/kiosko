-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-08-2014 a las 21:49:15
-- Versión del servidor: 5.1.44
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `kiskeclass`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `monto` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `id_persona` int(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `pays`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) DEFAULT NULL,
  `codigo` varchar(250) DEFAULT NULL,
  `precio` int(10) DEFAULT NULL,
  `descripcion` mediumtext,
  `stock` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `products`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_transactions`
--

CREATE TABLE IF NOT EXISTS `products_transactions` (
  `id` tinyint(11) NOT NULL AUTO_INCREMENT,
  `id_products` tinyint(9) DEFAULT NULL,
  `id_transactions` tinyint(11) DEFAULT NULL,
  `monto` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_products` (`id_products`),
  KEY `id_transactions` (`id_transactions`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `products_transactions`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repositions`
--

CREATE TABLE IF NOT EXISTS `repositions` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_products` int(9) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `cantidad` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_products` (`id_products`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `repositions`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `id_pays` int(10) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `total` int(10) DEFAULT NULL,
  `id_persona` int(25) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pays` (`id_pays`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `transactions`
--

