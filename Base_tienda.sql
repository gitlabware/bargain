-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 06, 2014 at 09:18 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tienda`
--

-- --------------------------------------------------------

--
-- Table structure for table `bloques`
--

CREATE TABLE IF NOT EXISTS `bloques` (
  `id` varchar(36) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `contenido` text,
  `estado` varchar(30) DEFAULT NULL,
  `posicion` varchar(30) DEFAULT NULL,
  `imagen_lugar` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` varchar(36) NOT NULL,
  `numero` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `orden` int(2) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `numero` (`numero`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `numero`, `nombre`, `descripcion`, `orden`, `created`, `modified`) VALUES
('52c72fd6-19b0-4805-93e7-0f483d4f19a0', 1, 'Digital Camera', '', 0, '2014-01-03 22:47:02', '2014-01-14 00:18:13'),
('52c72ff0-b8a4-4365-aa57-0f483d4f19a0', 2, 'Mobile Phones', '', 0, '2014-01-03 22:47:28', '2014-01-14 00:15:22'),
('52c73003-9678-4488-8352-0f483d4f19a0', 3, 'Computers', '', 0, '2014-01-03 22:47:47', '2014-01-14 00:18:58'),
('52c73020-bb38-4d72-aefd-0f483d4f19a0', 4, 'Gaming', '', 0, '2014-01-03 22:48:16', '2014-01-14 00:19:17'),
('52c73039-4400-4a71-a72e-0f483d4f19a0', 5, 'Gift Ideas', '', 0, '2014-01-03 22:48:41', '2014-01-14 00:18:41'),
('52c7304d-a500-47b5-8dde-0f483d4f19a0', 6, 'Parts Car', '', 0, '2014-01-03 22:49:01', '2014-01-14 00:19:38'),
('52c730dc-78e0-4a71-95cf-0f483d4f19a0', 7, 'Women Wear', '', 0, '2014-01-03 22:51:24', '2014-01-14 14:45:40'),
('52c730ed-4250-4e83-ac0a-0f483d4f19a0', 8, 'Men Wear', '', 0, '2014-01-03 22:51:41', '2014-01-14 00:17:46');

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(36) NOT NULL,
  `producto_id` varbinary(36) NOT NULL,
  `comentario` varbinary(500) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numero` int(10) unsigned DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `observaciones` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED AUTO_INCREMENT=9 ;

--
-- Dumping data for table `estados`
--

INSERT INTO `estados` (`id`, `numero`, `descripcion`, `observaciones`) VALUES
(1, 0, 'No Visible', 'Productos'),
(2, 1, 'Visible', 'Productos'),
(3, 2, 'Especial', 'Productos'),
(4, 3, 'Habilitado', 'Usuarios'),
(5, 4, 'Deshabilitado', 'Usuarios'),
(6, 5, 'Carrito', 'Pedidos'),
(7, 6, 'Pedido', 'Pedidos'),
(8, 7, 'Pagado', 'Pedidos');

-- --------------------------------------------------------

--
-- Table structure for table `favoritos`
--

CREATE TABLE IF NOT EXISTS `favoritos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(36) NOT NULL,
  `producto_id` varbinary(36) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `imagenes`
--

CREATE TABLE IF NOT EXISTS `imagenes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagen` varchar(500) NOT NULL,
  `numero` int(11) unsigned NOT NULL,
  `producto_id` varchar(36) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `imagenes`
--

INSERT INTO `imagenes` (`id`, `imagen`, `numero`, `producto_id`, `created`, `modified`) VALUES
(1, '52c74ad6-d148-42a8-a02a-1aa03d4f19a0.jpg', 1, '52c74abf-5b4c-4f58-9f32-1aa03d4f19a0', '2014-01-04 00:42:15', '2014-01-04 00:42:15'),
(2, '52c74ad7-4b84-481e-ae35-1aa03d4f19a0.jpg', 2, '52c74abf-5b4c-4f58-9f32-1aa03d4f19a0', '2014-01-04 00:42:15', '2014-01-04 00:42:15'),
(3, '52c74ad7-60d4-4d42-b52a-1aa03d4f19a0.jpg', 3, '52c74abf-5b4c-4f58-9f32-1aa03d4f19a0', '2014-01-04 00:42:15', '2014-01-04 00:42:15'),
(4, '52c74c0c-08d8-411a-a257-1aa03d4f19a0.jpg', 1, '52c74bf3-75a4-4452-9c95-1aa03d4f19a0', '2014-01-04 00:47:25', '2014-01-04 00:47:25'),
(5, '52c74c0d-2420-4fb3-b018-1aa03d4f19a0.jpg', 2, '52c74bf3-75a4-4452-9c95-1aa03d4f19a0', '2014-01-04 00:47:25', '2014-01-04 00:47:25'),
(6, '52c74c61-1d9c-4fe6-b3c7-1aa03d4f19a0.jpg', 1, '52c74c53-cd5c-4448-a8b9-1aa03d4f19a0', '2014-01-04 00:48:50', '2014-01-04 00:48:50'),
(7, '52c74c62-4620-4c82-a6d9-1aa03d4f19a0.jpg', 2, '52c74c53-cd5c-4448-a8b9-1aa03d4f19a0', '2014-01-04 00:48:50', '2014-01-04 00:48:50'),
(8, '52c74ccd-69e0-4677-a9d5-1aa03d4f19a0.jpg', 1, '52c74c95-f334-4733-9eb3-1aa03d4f19a0', '2014-01-04 00:50:38', '2014-01-04 00:50:38'),
(9, '52c74cce-71ec-4189-aeed-1aa03d4f19a0.jpg', 2, '52c74c95-f334-4733-9eb3-1aa03d4f19a0', '2014-01-04 00:50:38', '2014-01-04 00:50:38'),
(10, '52c74d18-18a8-4509-a909-1aa03d4f19a0.jpg', 1, '52c74d09-3b04-4a64-86b9-1aa03d4f19a0', '2014-01-04 00:51:53', '2014-01-04 00:51:53'),
(11, '52c74d19-5c3c-4444-953e-1aa03d4f19a0.jpg', 2, '52c74d09-3b04-4a64-86b9-1aa03d4f19a0', '2014-01-04 00:51:53', '2014-01-04 00:51:53'),
(12, '52c74d58-0c48-46c2-a508-1aa03d4f19a0.jpg', 1, '52c74d4a-c83c-41a8-95ca-1aa03d4f19a0', '2014-01-04 00:52:58', '2014-01-04 00:52:58'),
(13, '52c74d5a-4858-4a66-aff3-1aa03d4f19a0.jpg', 2, '52c74d4a-c83c-41a8-95ca-1aa03d4f19a0', '2014-01-04 00:52:58', '2014-01-04 00:52:58'),
(14, '52c74ddd-0c60-4ce9-a493-1aa03d4f19a0.jpg', 1, '52c74dcf-1718-415c-8dc2-1aa03d4f19a0', '2014-01-04 00:55:10', '2014-01-04 00:55:10'),
(15, '52c74dde-2d38-4b1e-9f1e-1aa03d4f19a0.jpg', 2, '52c74dcf-1718-415c-8dc2-1aa03d4f19a0', '2014-01-04 00:55:10', '2014-01-04 00:55:10'),
(16, '52c74dde-ff58-43b0-a46d-1aa03d4f19a0.jpg', 3, '52c74dcf-1718-415c-8dc2-1aa03d4f19a0', '2014-01-04 00:55:10', '2014-01-04 00:55:10'),
(17, '52c74e15-ce58-467f-a135-1aa03d4f19a0.jpg', 1, '52c74e04-d9f0-4448-8c52-1aa03d4f19a0', '2014-01-04 00:56:06', '2014-01-04 00:56:06'),
(18, '52c74e16-f6c0-4dbb-a1de-1aa03d4f19a0.jpg', 2, '52c74e04-d9f0-4448-8c52-1aa03d4f19a0', '2014-01-04 00:56:06', '2014-01-04 00:56:06'),
(19, '52c74e67-5020-4066-967d-1aa03d4f19a0.jpg', 1, '52c74e53-440c-4aed-a03d-1aa03d4f19a0', '2014-01-04 00:57:28', '2014-01-04 00:57:28'),
(20, '52c74e68-f960-4c8c-b639-1aa03d4f19a0.jpg', 2, '52c74e53-440c-4aed-a03d-1aa03d4f19a0', '2014-01-04 00:57:28', '2014-01-04 00:57:28'),
(21, '52c74ea9-7254-49bb-a358-1aa03d4f19a0.jpg', 1, '52c74e96-4088-44dd-a3f1-1aa03d4f19a0', '2014-01-04 00:58:34', '2014-01-04 00:58:34'),
(22, '52c74eaa-2f70-4be3-b0b1-1aa03d4f19a0.jpg', 2, '52c74e96-4088-44dd-a3f1-1aa03d4f19a0', '2014-01-04 00:58:34', '2014-01-04 00:58:34'),
(23, '52c74f15-b900-4a67-a176-1aa03d4f19a0.jpg', 1, '52c74f0b-4d4c-4d0b-a864-1aa03d4f19a0', '2014-01-04 01:00:23', '2014-01-04 01:00:23'),
(24, '52c74f17-cee8-479a-ada5-1aa03d4f19a0.jpg', 2, '52c74f0b-4d4c-4d0b-a864-1aa03d4f19a0', '2014-01-04 01:00:23', '2014-01-04 01:00:23'),
(25, '52c74f4d-4adc-4bdb-aaa1-1aa03d4f19a0.jpg', 1, '52c74f3f-9420-4102-90e2-1aa03d4f19a0', '2014-01-04 01:01:18', '2014-01-04 01:01:18'),
(26, '52c74f4e-9be4-41af-aa8c-1aa03d4f19a0.jpg', 2, '52c74f3f-9420-4102-90e2-1aa03d4f19a0', '2014-01-04 01:01:18', '2014-01-04 01:01:18'),
(27, '52c74ffc-19f8-42fa-be42-1aa03d4f19a0.jpg', 1, '52c74fe1-93b8-4bfb-950b-1aa03d4f19a0', '2014-01-04 01:04:13', '2014-01-04 01:04:13'),
(28, '52c74ffd-525c-459e-ab4c-1aa03d4f19a0.jpg', 2, '52c74fe1-93b8-4bfb-950b-1aa03d4f19a0', '2014-01-04 01:04:13', '2014-01-04 01:04:13'),
(29, '52c75048-6cdc-4ce7-ab04-1aa03d4f19a0.jpg', 1, '52c7503c-7274-49ce-a9d1-1aa03d4f19a0', '2014-01-04 01:05:29', '2014-01-04 01:05:29'),
(30, '52c75049-2f4c-4081-b0e0-1aa03d4f19a0.jpg', 2, '52c7503c-7274-49ce-a9d1-1aa03d4f19a0', '2014-01-04 01:05:29', '2014-01-04 01:05:29'),
(31, '52c750cb-6b30-431f-821f-1aa03d4f19a0.jpg', 1, '52c750c0-6374-44d3-95b1-1aa03d4f19a0', '2014-01-04 01:07:40', '2014-01-04 01:07:40'),
(32, '52c750cc-3868-4366-851a-1aa03d4f19a0.jpg', 2, '52c750c0-6374-44d3-95b1-1aa03d4f19a0', '2014-01-04 01:07:40', '2014-01-04 01:07:40'),
(33, '52c8138e-e5e0-41ad-9c74-1b283d4f19a0.jpg', 1, '52c81380-10c8-4c53-9df0-1b283d4f19a0', '2014-01-04 14:58:39', '2014-01-04 14:58:39'),
(34, '52c8138f-f1d4-4f18-8e66-1b283d4f19a0.jpg', 2, '52c81380-10c8-4c53-9df0-1b283d4f19a0', '2014-01-04 14:58:39', '2014-01-04 14:58:39'),
(35, '52c813d1-6b6c-468d-94eb-1b283d4f19a0.jpg', 1, '52c813c5-f09c-4312-a6d0-1b283d4f19a0', '2014-01-04 14:59:46', '2014-01-04 14:59:46'),
(36, '52c813d2-304c-40c2-9ce1-1b283d4f19a0.jpg', 2, '52c813c5-f09c-4312-a6d0-1b283d4f19a0', '2014-01-04 14:59:46', '2014-01-04 14:59:46'),
(41, '52d43ddf-4afc-4571-abdc-05143d4f19a0.jpg', 1, '52c813fd-67e8-4aef-9792-1b283d4f19a0', '2014-01-13 20:26:23', '2014-01-13 20:26:23'),
(42, '52d43e1e-5e98-4050-b948-05143d4f19a0.jpg', 2, '52c813fd-67e8-4aef-9792-1b283d4f19a0', '2014-01-13 20:27:26', '2014-01-13 20:27:26'),
(39, '52d3f5b5-5afc-4a31-9f33-05143d4f19a0.jpg', 1, '52d3f3fc-a8bc-425c-a9e6-05143d4f19a0', '2014-01-13 15:18:30', '2014-01-13 15:18:30'),
(43, '52d49a86-8d88-4345-b8d0-114c3d4f19a0.jpg', 2, '52d3f3fc-a8bc-425c-a9e6-05143d4f19a0', '2014-01-14 03:01:42', '2014-01-14 03:01:42'),
(44, '52d5a038-6730-4923-b329-165c3d4f19a0.jpg', 1, '52d59ce8-1e68-41f3-9c54-165c3d4f19a0', '2014-01-14 21:38:17', '2014-01-14 21:38:17'),
(45, '52f10edf-93a4-4bcf-a02a-06e43d4f19a0.jpg', 1, '52d5a81b-3bec-4f35-b299-10a43d4f19a0', '2014-02-04 17:01:35', '2014-02-04 17:01:35'),
(46, '52f3ed68-ee24-4416-a363-19943d4f19a0.jpg', 1, '52f3ecaa-2c94-4213-a78c-19943d4f19a0', '2014-02-06 21:15:38', '2014-02-06 21:15:38');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` varchar(36) NOT NULL,
  `numero` int(11) NOT NULL AUTO_INCREMENT,
  `estado` int(11) NOT NULL DEFAULT '0',
  `producto_id` varchar(36) NOT NULL,
  `pedido_id` varchar(36) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT '0',
  `precio` decimal(15,2) NOT NULL DEFAULT '0.00',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `numero` (`numero`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `numero`, `estado`, `producto_id`, `pedido_id`, `cantidad`, `precio`, `created`, `modified`) VALUES
('52dff832-96f4-4ac4-93df-1b783d4f19a0', 1, 7, '52c74dcf-1718-415c-8dc2-1aa03d4f19a0', '52dff832-c350-4b3b-949c-1b783d4f19a0', 1, '599.99', '2014-01-22 17:56:18', '2014-01-22 17:56:18'),
('52dff834-ac7c-428e-986e-1b783d4f19a0', 2, 7, '52c74d4a-c83c-41a8-95ca-1aa03d4f19a0', '52dff832-c350-4b3b-949c-1b783d4f19a0', 1, '888.99', '2014-01-22 17:56:20', '2014-01-22 17:56:20');

-- --------------------------------------------------------

--
-- Table structure for table `marcas`
--

CREATE TABLE IF NOT EXISTS `marcas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=23 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `marcas`
--

INSERT INTO `marcas` (`id`, `nombre`, `descripcion`, `created`, `modified`) VALUES
(1, 'Samsung', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Sony', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Lenovo', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `movimientos`
--

CREATE TABLE IF NOT EXISTS `movimientos` (
  `id` varchar(36) NOT NULL,
  `producto_id` varchar(36) NOT NULL,
  `precio` decimal(15,2) NOT NULL DEFAULT '0.00',
  `entrada` int(11) NOT NULL DEFAULT '0',
  `salida` int(11) NOT NULL DEFAULT '0',
  `total` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movimientos`
--

INSERT INTO `movimientos` (`id`, `producto_id`, `precio`, `entrada`, `salida`, `total`, `created`, `modified`) VALUES
('52d3f3fc-2b20-4070-8fe4-05143d4f19a0', '52d3f3fc-a8bc-425c-a9e6-05143d4f19a0', '23.50', 90, 0, 90, '2014-01-13 15:11:08', '2014-01-13 15:11:08'),
('52d59ce8-2bc0-4c95-bbba-165c3d4f19a0', '52d59ce8-1e68-41f3-9c54-165c3d4f19a0', '1.50', 4, 0, 4, '2014-01-14 21:24:08', '2014-01-14 21:24:08'),
('52d5a81b-9764-4d74-82b4-10a43d4f19a0', '52d5a81b-3bec-4f35-b299-10a43d4f19a0', '99.99', 6, 0, 6, '2014-01-14 22:11:55', '2014-01-14 22:11:55'),
('52f3ecaa-b4f8-4814-abb6-19943d4f19a0', '52f3ecaa-2c94-4213-a78c-19943d4f19a0', '355.50', 10, 0, 10, '2014-02-06 21:12:26', '2014-02-06 21:12:26');

-- --------------------------------------------------------

--
-- Table structure for table `paginas`
--

CREATE TABLE IF NOT EXISTS `paginas` (
  `id` varchar(36) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `contenido` text,
  `estado` varchar(30) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parametros`
--

CREATE TABLE IF NOT EXISTS `parametros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `envio` decimal(15,2) NOT NULL DEFAULT '0.00',
  `tax` decimal(15,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `parametros`
--

INSERT INTO `parametros` (`id`, `envio`, `tax`) VALUES
(1, '10.50', '20.50');

-- --------------------------------------------------------

--
-- Table structure for table `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` varchar(36) NOT NULL,
  `numero` int(11) NOT NULL AUTO_INCREMENT,
  `shipping` decimal(15,2) NOT NULL DEFAULT '0.00',
  `tax` decimal(15,2) NOT NULL DEFAULT '0.00',
  `user_id` varchar(36) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `numero` (`numero`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pedidos`
--

INSERT INTO `pedidos` (`id`, `numero`, `shipping`, `tax`, `user_id`, `estado`, `created`, `modified`) VALUES
('52dff832-c350-4b3b-949c-1b783d4f19a0', 1, '10.50', '20.50', '52cb4636-df58-4282-8d71-06d43d4f19a0', 7, '2014-01-22 17:56:18', '2014-02-05 05:33:58');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id` varchar(36) NOT NULL,
  `sku` varchar(50) DEFAULT NULL,
  `numero` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(500) NOT NULL,
  `resumen` text,
  `descripcion` text,
  `marca_id` int(10) unsigned DEFAULT NULL,
  `categoria_id` varbinary(36) NOT NULL,
  `estado` int(1) DEFAULT '1',
  `precio` decimal(15,2) NOT NULL DEFAULT '0.00',
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `numero` (`numero`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `sku`, `numero`, `nombre`, `resumen`, `descripcion`, `marca_id`, `categoria_id`, `estado`, `precio`, `modified`, `created`) VALUES
('52c74abf-5b4c-4f58-9f32-1aa03d4f19a0', NULL, 1, 'Zopo 980c', 'Si durante el Ãºltimo aÃ±o hemos estado hablando de la llegada de las firmas chinas a la gama alta del mercado de smartphones, ahora es el momento de conocer a uno de los actores del mercado. Sin hacer hacer tanto ruido como Huawei o Xiaomi, Zopo ya estÃ¡ establecida en EspaÃ±a.', '<p>Las medidas exactas se cifran en 141.9 &times; 67 &times; 7.9mm. El resultado es que, sin ser el m&aacute;s peque&ntilde;o ni el m&aacute;s fino, se ajusta a los tiempos. El peso se queda en 155 gramos; no es ligero, pero s&iacute; aceptable para un terminal de 5 pulgadas. En definitiva, aunque cumple su funci&oacute;n y no aparenta ser fr&aacute;gil, uno no puede evitar sentir que se pod&iacute;a haber trabajado mejor este aspecto. La buena noticia es que se trata del peor punto del producto junto a su c&aacute;mara.&nbsp;</p>\r\n\r\n<p>Tampoco encontraremos grandes alardes en el sistema operativo, un Android 4.2.1 limpio y puro, el preferido de muchos, entre los que me incluyo. Hay poco extra y s&oacute;lo vienen instaladas de f&aacute;brica algunas aplicaciones b&aacute;sicas de Google y otras generales como Facebook o Skype. Eso s&iacute;, ni rastro de software en chino. En este caso se trata de una versi&oacute;n dedicada al mercado espa&ntilde;ol; con su garant&iacute;a y soporte. Nada de importaci&oacute;n.</p>\r\n', 1, '52c72ff0-b8a4-4365-aa57-0f483d4f19a0', 1, '199.99', '2014-01-04 00:41:51', '2014-01-04 00:41:51'),
('52c74bf3-75a4-4452-9c95-1aa03d4f19a0', NULL, 2, 'Zopo 982', 'Si durante el Ãºltimo aÃ±o hemos estado hablando de la llegada de las firmas chinas a la gama alta del mercado de smartphones, ahora es el momento de conocer a uno de los actores del mercado. Sin hacer hacer tanto ruido como Huawei o Xiaomi, Zopo ya estÃ¡ establecida en EspaÃ±a.', '<p>Las medidas exactas se cifran en 141.9 &times; 67 &times; 7.9mm. El resultado es que, sin ser el m&aacute;s peque&ntilde;o ni el m&aacute;s fino, se ajusta a los tiempos. El peso se queda en 155 gramos; no es ligero, pero s&iacute; aceptable para un terminal de 5 pulgadas. En definitiva, aunque cumple su funci&oacute;n y no aparenta ser fr&aacute;gil, uno no puede evitar sentir que se pod&iacute;a haber trabajado mejor este aspecto. La buena noticia es que se trata del peor punto del producto junto a su c&aacute;mara.&nbsp;</p>\r\n\r\n<p>Tampoco encontraremos grandes alardes en el sistema operativo, un Android 4.2.1 limpio y puro, el preferido de muchos, entre los que me incluyo. Hay poco extra y s&oacute;lo vienen instaladas de f&aacute;brica algunas aplicaciones b&aacute;sicas de Google y otras generales como Facebook o Skype. Eso s&iacute;, ni rastro de software en chino. En este caso se trata de una versi&oacute;n dedicada al mercado espa&ntilde;ol; con su garant&iacute;a y soporte. Nada de importaci&oacute;n.</p>\r\n', 1, '52c72ff0-b8a4-4365-aa57-0f483d4f19a0', 2, '180.00', '2014-01-04 00:46:59', '2014-01-04 00:46:59'),
('52c74c53-cd5c-4448-a8b9-1aa03d4f19a0', NULL, 3, 'Zopo 750', 'Si durante el Ãºltimo aÃ±o hemos estado hablando de la llegada de las firmas chinas a la gama alta del mercado de smartphones, ahora es el momento de conocer a uno de los actores del mercado. Sin hacer hacer tanto ruido como Huawei o Xiaomi, Zopo ya estÃ¡ establecida en EspaÃ±a.', '<p>Las medidas exactas se cifran en 141.9 &times; 67 &times; 7.9mm. El resultado es que, sin ser el m&aacute;s peque&ntilde;o ni el m&aacute;s fino, se ajusta a los tiempos. El peso se queda en 155 gramos; no es ligero, pero s&iacute; aceptable para un terminal de 5 pulgadas. En definitiva, aunque cumple su funci&oacute;n y no aparenta ser fr&aacute;gil, uno no puede evitar sentir que se pod&iacute;a haber trabajado mejor este aspecto. La buena noticia es que se trata del peor punto del producto junto a su c&aacute;mara.&nbsp;</p>\r\n\r\n<p>Tampoco encontraremos grandes alardes en el sistema operativo, un Android 4.2.1 limpio y puro, el preferido de muchos, entre los que me incluyo. Hay poco extra y s&oacute;lo vienen instaladas de f&aacute;brica algunas aplicaciones b&aacute;sicas de Google y otras generales como Facebook o Skype. Eso s&iacute;, ni rastro de software en chino. En este caso se trata de una versi&oacute;n dedicada al mercado espa&ntilde;ol; con su garant&iacute;a y soporte. Nada de importaci&oacute;n.</p>\r\n', 1, '52c72ff0-b8a4-4365-aa57-0f483d4f19a0', 1, '189.99', '2014-01-04 00:48:35', '2014-01-04 00:48:35'),
('52c74c95-f334-4733-9eb3-1aa03d4f19a0', NULL, 4, 'Samsung s3', 'Si durante el Ãºltimo aÃ±o hemos estado hablando de la llegada de las firmas chinas a la gama alta del mercado de smartphones, ahora es el momento de conocer a uno de los actores del mercado. Sin hacer hacer tanto ruido como Huawei o Xiaomi, Zopo ya estÃ¡ establecida en EspaÃ±a.', '<p>Las medidas exactas se cifran en 141.9 &times; 67 &times; 7.9mm. El resultado es que, sin ser el m&aacute;s peque&ntilde;o ni el m&aacute;s fino, se ajusta a los tiempos. El peso se queda en 155 gramos; no es ligero, pero s&iacute; aceptable para un terminal de 5 pulgadas. En definitiva, aunque cumple su funci&oacute;n y no aparenta ser fr&aacute;gil, uno no puede evitar sentir que se pod&iacute;a haber trabajado mejor este aspecto. La buena noticia es que se trata del peor punto del producto junto a su c&aacute;mara.&nbsp;</p>\r\n\r\n<p>Tampoco encontraremos grandes alardes en el sistema operativo, un Android 4.2.1 limpio y puro, el preferido de muchos, entre los que me incluyo. Hay poco extra y s&oacute;lo vienen instaladas de f&aacute;brica algunas aplicaciones b&aacute;sicas de Google y otras generales como Facebook o Skype. Eso s&iacute;, ni rastro de software en chino. En este caso se trata de una versi&oacute;n dedicada al mercado espa&ntilde;ol; con su garant&iacute;a y soporte. Nada de importaci&oacute;n.</p>\r\n', 1, '52c72ff0-b8a4-4365-aa57-0f483d4f19a0', 1, '399.99', '2014-01-04 00:49:41', '2014-01-04 00:49:41'),
('52c74d09-3b04-4a64-86b9-1aa03d4f19a0', NULL, 5, 'Ultrabook Toshiba', 'Si durante el Ãºltimo aÃ±o hemos estado hablando de la llegada de las firmas chinas a la gama alta del mercado de smartphones, ahora es el momento de conocer a uno de los actores del mercado. Sin hacer hacer tanto ruido como Huawei o Xiaomi, Zopo ya estÃ¡ establecida en EspaÃ±a.', '<p>Las medidas exactas se cifran en 141.9 &times; 67 &times; 7.9mm. El resultado es que, sin ser el m&aacute;s peque&ntilde;o ni el m&aacute;s fino, se ajusta a los tiempos. El peso se queda en 155 gramos; no es ligero, pero s&iacute; aceptable para un terminal de 5 pulgadas. En definitiva, aunque cumple su funci&oacute;n y no aparenta ser fr&aacute;gil, uno no puede evitar sentir que se pod&iacute;a haber trabajado mejor este aspecto. La buena noticia es que se trata del peor punto del producto junto a su c&aacute;mara.&nbsp;</p>\r\n\r\n<p>Tampoco encontraremos grandes alardes en el sistema operativo, un Android 4.2.1 limpio y puro, el preferido de muchos, entre los que me incluyo. Hay poco extra y s&oacute;lo vienen instaladas de f&aacute;brica algunas aplicaciones b&aacute;sicas de Google y otras generales como Facebook o Skype. Eso s&iacute;, ni rastro de software en chino. En este caso se trata de una versi&oacute;n dedicada al mercado espa&ntilde;ol; con su garant&iacute;a y soporte. Nada de importaci&oacute;n.</p>\r\n', 1, '52c73003-9678-4488-8352-0f483d4f19a0', 1, '999.99', '2014-01-04 00:51:37', '2014-01-04 00:51:37'),
('52c74d4a-c83c-41a8-95ca-1aa03d4f19a0', NULL, 6, 'Ultrabook Asus', 'Si durante el Ãºltimo aÃ±o hemos estado hablando de la llegada de las firmas chinas a la gama alta del mercado de smartphones, ahora es el momento de conocer a uno de los actores del mercado. Sin hacer hacer tanto ruido como Huawei o Xiaomi, Zopo ya estÃ¡ establecida en EspaÃ±a.', '<p>Las medidas exactas se cifran en 141.9 &times; 67 &times; 7.9mm. El resultado es que, sin ser el m&aacute;s peque&ntilde;o ni el m&aacute;s fino, se ajusta a los tiempos. El peso se queda en 155 gramos; no es ligero, pero s&iacute; aceptable para un terminal de 5 pulgadas. En definitiva, aunque cumple su funci&oacute;n y no aparenta ser fr&aacute;gil, uno no puede evitar sentir que se pod&iacute;a haber trabajado mejor este aspecto. La buena noticia es que se trata del peor punto del producto junto a su c&aacute;mara.&nbsp;</p>\r\n\r\n<p>Tampoco encontraremos grandes alardes en el sistema operativo, un Android 4.2.1 limpio y puro, el preferido de muchos, entre los que me incluyo. Hay poco extra y s&oacute;lo vienen instaladas de f&aacute;brica algunas aplicaciones b&aacute;sicas de Google y otras generales como Facebook o Skype. Eso s&iacute;, ni rastro de software en chino. En este caso se trata de una versi&oacute;n dedicada al mercado espa&ntilde;ol; con su garant&iacute;a y soporte. Nada de importaci&oacute;n.</p>\r\n', 2, '52c73003-9678-4488-8352-0f483d4f19a0', 1, '888.99', '2014-01-04 00:52:42', '2014-01-04 00:52:42'),
('52c74dcf-1718-415c-8dc2-1aa03d4f19a0', NULL, 7, 'Camara Nikon', 'Si durante el Ãºltimo aÃ±o hemos estado hablando de la llegada de las firmas chinas a la gama alta del mercado de smartphones, ahora es el momento de conocer a uno de los actores del mercado. Sin hacer hacer tanto ruido como Huawei o Xiaomi, Zopo ya estÃ¡ establecida en EspaÃ±a.', '<p>Las medidas exactas se cifran en 141.9 &times; 67 &times; 7.9mm. El resultado es que, sin ser el m&aacute;s peque&ntilde;o ni el m&aacute;s fino, se ajusta a los tiempos. El peso se queda en 155 gramos; no es ligero, pero s&iacute; aceptable para un terminal de 5 pulgadas. En definitiva, aunque cumple su funci&oacute;n y no aparenta ser fr&aacute;gil, uno no puede evitar sentir que se pod&iacute;a haber trabajado mejor este aspecto. La buena noticia es que se trata del peor punto del producto junto a su c&aacute;mara.&nbsp;</p>\r\n\r\n<p>Tampoco encontraremos grandes alardes en el sistema operativo, un Android 4.2.1 limpio y puro, el preferido de muchos, entre los que me incluyo. Hay poco extra y s&oacute;lo vienen instaladas de f&aacute;brica algunas aplicaciones b&aacute;sicas de Google y otras generales como Facebook o Skype. Eso s&iacute;, ni rastro de software en chino. En este caso se trata de una versi&oacute;n dedicada al mercado espa&ntilde;ol; con su garant&iacute;a y soporte. Nada de importaci&oacute;n.</p>\r\n', 2, '52c72fd6-19b0-4805-93e7-0f483d4f19a0', 1, '599.99', '2014-01-04 00:54:55', '2014-01-04 00:54:55'),
('52c74e04-d9f0-4448-8c52-1aa03d4f19a0', NULL, 8, 'Camara sony', 'Si durante el Ãºltimo aÃ±o hemos estado hablando de la llegada de las firmas chinas a la gama alta del mercado de smartphones, ahora es el momento de conocer a uno de los actores del mercado. Sin hacer hacer tanto ruido como Huawei o Xiaomi, Zopo ya estÃ¡ establecida en EspaÃ±a.', '<p>Las medidas exactas se cifran en 141.9 &times; 67 &times; 7.9mm. El resultado es que, sin ser el m&aacute;s peque&ntilde;o ni el m&aacute;s fino, se ajusta a los tiempos. El peso se queda en 155 gramos; no es ligero, pero s&iacute; aceptable para un terminal de 5 pulgadas. En definitiva, aunque cumple su funci&oacute;n y no aparenta ser fr&aacute;gil, uno no puede evitar sentir que se pod&iacute;a haber trabajado mejor este aspecto. La buena noticia es que se trata del peor punto del producto junto a su c&aacute;mara.&nbsp;</p>\r\n\r\n<p>Tampoco encontraremos grandes alardes en el sistema operativo, un Android 4.2.1 limpio y puro, el preferido de muchos, entre los que me incluyo. Hay poco extra y s&oacute;lo vienen instaladas de f&aacute;brica algunas aplicaciones b&aacute;sicas de Google y otras generales como Facebook o Skype. Eso s&iacute;, ni rastro de software en chino. En este caso se trata de una versi&oacute;n dedicada al mercado espa&ntilde;ol; con su garant&iacute;a y soporte. Nada de importaci&oacute;n.</p>\r\n', 2, '52c72fd6-19b0-4805-93e7-0f483d4f19a0', 2, '299.99', '2014-01-04 00:55:48', '2014-01-04 00:55:48'),
('52c74e53-440c-4aed-a03d-1aa03d4f19a0', '', 9, 'God Of War 3', 'Si durante el Ãºltimo aÃ±o hemos estado hablando de la llegada de las firmas chinas a la gama alta del mercado de smartphones, ahora es el momento de conocer a uno de los actores del mercado. Sin hacer hacer tanto ruido como Huawei o Xiaomi, Zopo ya estÃ¡ establecida en EspaÃ±a.', '<p>Las medidas exactas se cifran en 141.9 &times; 67 &times; 7.9mm. El resultado es que, sin ser el m&aacute;s peque&ntilde;o ni el m&aacute;s fino, se ajusta a los tiempos. El peso se queda en 155 gramos; no es ligero, pero s&iacute; aceptable para un terminal de 5 pulgadas. En definitiva, aunque cumple su funci&oacute;n y no aparenta ser fr&aacute;gil, uno no puede evitar sentir que se pod&iacute;a haber trabajado mejor este aspecto. La buena noticia es que se trata del peor punto del producto junto a su c&aacute;mara.&nbsp;</p>\r\n\r\n<p>Tampoco encontraremos grandes alardes en el sistema operativo, un Android 4.2.1 limpio y puro, el preferido de muchos, entre los que me incluyo. Hay poco extra y s&oacute;lo vienen instaladas de f&aacute;brica algunas aplicaciones b&aacute;sicas de Google y otras generales como Facebook o Skype. Eso s&iacute;, ni rastro de software en chino. En este caso se trata de una versi&oacute;n dedicada al mercado espa&ntilde;ol; con su garant&iacute;a y soporte. Nada de importaci&oacute;n.</p>\r\n', 2, '52c73020-bb38-4d72-aefd-0f483d4f19a0', 1, '329.99', '2014-02-04 22:16:33', '2014-01-04 00:57:07'),
('52c74e96-4088-44dd-a3f1-1aa03d4f19a0', NULL, 10, 'God of War 3', 'Si durante el Ãºltimo aÃ±o hemos estado hablando de la llegada de las firmas chinas a la gama alta del mercado de smartphones, ahora es el momento de conocer a uno de los actores del mercado. Sin hacer hacer tanto ruido como Huawei o Xiaomi, Zopo ya estÃ¡ establecida en EspaÃ±a.', '<p>Las medidas exactas se cifran en 141.9 &times; 67 &times; 7.9mm. El resultado es que, sin ser el m&aacute;s peque&ntilde;o ni el m&aacute;s fino, se ajusta a los tiempos. El peso se queda en 155 gramos; no es ligero, pero s&iacute; aceptable para un terminal de 5 pulgadas. En definitiva, aunque cumple su funci&oacute;n y no aparenta ser fr&aacute;gil, uno no puede evitar sentir que se pod&iacute;a haber trabajado mejor este aspecto. La buena noticia es que se trata del peor punto del producto junto a su c&aacute;mara.&nbsp;</p>\r\n\r\n<p>Tampoco encontraremos grandes alardes en el sistema operativo, un Android 4.2.1 limpio y puro, el preferido de muchos, entre los que me incluyo. Hay poco extra y s&oacute;lo vienen instaladas de f&aacute;brica algunas aplicaciones b&aacute;sicas de Google y otras generales como Facebook o Skype. Eso s&iacute;, ni rastro de software en chino. En este caso se trata de una versi&oacute;n dedicada al mercado espa&ntilde;ol; con su garant&iacute;a y soporte. Nada de importaci&oacute;n.</p>\r\n', 1, '52c73020-bb38-4d72-aefd-0f483d4f19a0', 2, '299.99', '2014-01-04 00:58:14', '2014-01-04 00:58:14'),
('52c74f0b-4d4c-4d0b-a864-1aa03d4f19a0', NULL, 11, 'Call of dutty ', 'Si durante el Ãºltimo aÃ±o hemos estado hablando de la llegada de las firmas chinas a la gama alta del mercado de smartphones, ahora es el momento de conocer a uno de los actores del mercado. Sin hacer hacer tanto ruido como Huawei o Xiaomi, Zopo ya estÃ¡ establecida en EspaÃ±a.', '<p>Las medidas exactas se cifran en 141.9 &times; 67 &times; 7.9mm. El resultado es que, sin ser el m&aacute;s peque&ntilde;o ni el m&aacute;s fino, se ajusta a los tiempos. El peso se queda en 155 gramos; no es ligero, pero s&iacute; aceptable para un terminal de 5 pulgadas. En definitiva, aunque cumple su funci&oacute;n y no aparenta ser fr&aacute;gil, uno no puede evitar sentir que se pod&iacute;a haber trabajado mejor este aspecto. La buena noticia es que se trata del peor punto del producto junto a su c&aacute;mara.&nbsp;</p>\r\n\r\n<p>Tampoco encontraremos grandes alardes en el sistema operativo, un Android 4.2.1 limpio y puro, el preferido de muchos, entre los que me incluyo. Hay poco extra y s&oacute;lo vienen instaladas de f&aacute;brica algunas aplicaciones b&aacute;sicas de Google y otras generales como Facebook o Skype. Eso s&iacute;, ni rastro de software en chino. En este caso se trata de una versi&oacute;n dedicada al mercado espa&ntilde;ol; con su garant&iacute;a y soporte. Nada de importaci&oacute;n.</p>\r\n', 2, '52c73020-bb38-4d72-aefd-0f483d4f19a0', 1, '129.99', '2014-01-04 01:00:11', '2014-01-04 01:00:11'),
('52c74f3f-9420-4102-90e2-1aa03d4f19a0', NULL, 12, 'Call of dutty 3', 'Si durante el Ãºltimo aÃ±o hemos estado hablando de la llegada de las firmas chinas a la gama alta del mercado de smartphones, ahora es el momento de conocer a uno de los actores del mercado. Sin hacer hacer tanto ruido como Huawei o Xiaomi, Zopo ya estÃ¡ establecida en EspaÃ±a.', '<p>Las medidas exactas se cifran en 141.9 &times; 67 &times; 7.9mm. El resultado es que, sin ser el m&aacute;s peque&ntilde;o ni el m&aacute;s fino, se ajusta a los tiempos. El peso se queda en 155 gramos; no es ligero, pero s&iacute; aceptable para un terminal de 5 pulgadas. En definitiva, aunque cumple su funci&oacute;n y no aparenta ser fr&aacute;gil, uno no puede evitar sentir que se pod&iacute;a haber trabajado mejor este aspecto. La buena noticia es que se trata del peor punto del producto junto a su c&aacute;mara.&nbsp;</p>\r\n\r\n<p>Tampoco encontraremos grandes alardes en el sistema operativo, un Android 4.2.1 limpio y puro, el preferido de muchos, entre los que me incluyo. Hay poco extra y s&oacute;lo vienen instaladas de f&aacute;brica algunas aplicaciones b&aacute;sicas de Google y otras generales como Facebook o Skype. Eso s&iacute;, ni rastro de software en chino. En este caso se trata de una versi&oacute;n dedicada al mercado espa&ntilde;ol; con su garant&iacute;a y soporte. Nada de importaci&oacute;n.</p>\r\n', 1, '52c73020-bb38-4d72-aefd-0f483d4f19a0', 2, '99.99', '2014-01-04 01:01:03', '2014-01-04 01:01:03'),
('52c74fe1-93b8-4bfb-950b-1aa03d4f19a0', NULL, 13, 'Cake', 'Si durante el Ãºltimo aÃ±o hemos estado hablando de la llegada de las firmas chinas a la gama alta del mercado de smartphones, ahora es el momento de conocer a uno de los actores del mercado. Sin hacer hacer tanto ruido como Huawei o Xiaomi, Zopo ya estÃ¡ establecida en EspaÃ±a.', '<p>Las medidas exactas se cifran en 141.9 &times; 67 &times; 7.9mm. El resultado es que, sin ser el m&aacute;s peque&ntilde;o ni el m&aacute;s fino, se ajusta a los tiempos. El peso se queda en 155 gramos; no es ligero, pero s&iacute; aceptable para un terminal de 5 pulgadas. En definitiva, aunque cumple su funci&oacute;n y no aparenta ser fr&aacute;gil, uno no puede evitar sentir que se pod&iacute;a haber trabajado mejor este aspecto. La buena noticia es que se trata del peor punto del producto junto a su c&aacute;mara.&nbsp;</p>\r\n\r\n<p>Tampoco encontraremos grandes alardes en el sistema operativo, un Android 4.2.1 limpio y puro, el preferido de muchos, entre los que me incluyo. Hay poco extra y s&oacute;lo vienen instaladas de f&aacute;brica algunas aplicaciones b&aacute;sicas de Google y otras generales como Facebook o Skype. Eso s&iacute;, ni rastro de software en chino. En este caso se trata de una versi&oacute;n dedicada al mercado espa&ntilde;ol; con su garant&iacute;a y soporte. Nada de importaci&oacute;n.</p>\r\n', 2, '52c73039-4400-4a71-a72e-0f483d4f19a0', 1, '34.00', '2014-01-04 01:03:45', '2014-01-04 01:03:45'),
('52c7503c-7274-49ce-a9d1-1aa03d4f19a0', NULL, 14, 'Cake 2', 'Si durante el Ãºltimo aÃ±o hemos estado hablando de la llegada de las firmas chinas a la gama alta del mercado de smartphones, ahora es el momento de conocer a uno de los actores del mercado. Sin hacer hacer tanto ruido como Huawei o Xiaomi, Zopo ya estÃ¡ establecida en EspaÃ±a.', '<p>Las medidas exactas se cifran en 141.9 &times; 67 &times; 7.9mm. El resultado es que, sin ser el m&aacute;s peque&ntilde;o ni el m&aacute;s fino, se ajusta a los tiempos. El peso se queda en 155 gramos; no es ligero, pero s&iacute; aceptable para un terminal de 5 pulgadas. En definitiva, aunque cumple su funci&oacute;n y no aparenta ser fr&aacute;gil, uno no puede evitar sentir que se pod&iacute;a haber trabajado mejor este aspecto. La buena noticia es que se trata del peor punto del producto junto a su c&aacute;mara.&nbsp;</p>\r\n\r\n<p>Tampoco encontraremos grandes alardes en el sistema operativo, un Android 4.2.1 limpio y puro, el preferido de muchos, entre los que me incluyo. Hay poco extra y s&oacute;lo vienen instaladas de f&aacute;brica algunas aplicaciones b&aacute;sicas de Google y otras generales como Facebook o Skype. Eso s&iacute;, ni rastro de software en chino. En este caso se trata de una versi&oacute;n dedicada al mercado espa&ntilde;ol; con su garant&iacute;a y soporte. Nada de importaci&oacute;n.</p>\r\n', 2, '52c73039-4400-4a71-a72e-0f483d4f19a0', 1, '12.99', '2014-01-04 01:05:16', '2014-01-04 01:05:16'),
('52c750c0-6374-44d3-95b1-1aa03d4f19a0', NULL, 15, 'Chaquetas', 'Si durante el Ãºltimo aÃ±o hemos estado hablando de la llegada de las firmas chinas a la gama alta del mercado de smartphones, ahora es el momento de conocer a uno de los actores del mercado. Sin hacer hacer tanto ruido como Huawei o Xiaomi, Zopo ya estÃ¡ establecida en EspaÃ±a.', '<p>Las medidas exactas se cifran en 141.9 &times; 67 &times; 7.9mm. El resultado es que, sin ser el m&aacute;s peque&ntilde;o ni el m&aacute;s fino, se ajusta a los tiempos. El peso se queda en 155 gramos; no es ligero, pero s&iacute; aceptable para un terminal de 5 pulgadas. En definitiva, aunque cumple su funci&oacute;n y no aparenta ser fr&aacute;gil, uno no puede evitar sentir que se pod&iacute;a haber trabajado mejor este aspecto. La buena noticia es que se trata del peor punto del producto junto a su c&aacute;mara.&nbsp;</p>\r\n\r\n<p>Tampoco encontraremos grandes alardes en el sistema operativo, un Android 4.2.1 limpio y puro, el preferido de muchos, entre los que me incluyo. Hay poco extra y s&oacute;lo vienen instaladas de f&aacute;brica algunas aplicaciones b&aacute;sicas de Google y otras generales como Facebook o Skype. Eso s&iacute;, ni rastro de software en chino. En este caso se trata de una versi&oacute;n dedicada al mercado espa&ntilde;ol; con su garant&iacute;a y soporte. Nada de importaci&oacute;n.</p>\r\n', 3, '52c730dc-78e0-4a71-95cf-0f483d4f19a0', 1, '39.99', '2014-01-04 01:07:28', '2014-01-04 01:07:28'),
('52c81380-10c8-4c53-9df0-1b283d4f19a0', NULL, 16, 'Repuestos', 'Si durante el Ãºltimo aÃ±o hemos estado hablando de la llegada de las firmas chinas a la gama alta del mercado de smartphones, ahora es el momento de conocer a uno de los actores del mercado. Sin hacer hacer tanto ruido como Huawei o Xiaomi, Zopo ya estÃ¡ establecida en EspaÃ±a.', '<p style="box-sizing: border-box; padding: 0px; font-family: Lato, Helvetica, Arial, sans-serif;">Las medidas exactas se cifran en 141.9 &times; 67 &times; 7.9mm. El resultado es que, sin ser el m&aacute;s peque&ntilde;o ni el m&aacute;s fino, se ajusta a los tiempos. El peso se queda en 155 gramos; no es ligero, pero s&iacute; aceptable para un terminal de 5 pulgadas. En definitiva, aunque cumple su funci&oacute;n y no aparenta ser fr&aacute;gil, uno no puede evitar sentir que se pod&iacute;a haber trabajado mejor este aspecto. La buena noticia es que se trata del peor punto del producto junto a su c&aacute;mara.&nbsp;</p>\r\n\r\n<p style="box-sizing: border-box; padding: 0px; font-family: Lato, Helvetica, Arial, sans-serif;">Tampoco encontraremos grandes alardes en el sistema operativo, un Android 4.2.1 limpio y puro, el preferido de muchos, entre los que me incluyo. Hay poco extra y s&oacute;lo vienen instaladas de f&aacute;brica algunas aplicaciones b&aacute;sicas de Google y otras generales como Facebook o Skype. Eso s&iacute;, ni rastro de software en chino. En este caso se trata de una versi&oacute;n dedicada al mercado espa&ntilde;ol; con su garant&iacute;a y soporte. Nada de importaci&oacute;n.</p>\r\n', 2, '52c7304d-a500-47b5-8dde-0f483d4f19a0', 1, '12.00', '2014-01-04 14:58:24', '2014-01-04 14:58:24'),
('52c813c5-f09c-4312-a6d0-1b283d4f19a0', NULL, 17, 'Repuestos 2', 'Si durante el Ãºltimo aÃ±o hemos estado hablando de la llegada de las firmas chinas a la gama alta del mercado de smartphones, ahora es el momento de conocer a uno de los actores del mercado. Sin hacer hacer tanto ruido como Huawei o Xiaomi, Zopo ya estÃ¡ establecida en EspaÃ±a.', '<p style="box-sizing: border-box; padding: 0px; font-family: Lato, Helvetica, Arial, sans-serif;">Las medidas exactas se cifran en 141.9 &times; 67 &times; 7.9mm. El resultado es que, sin ser el m&aacute;s peque&ntilde;o ni el m&aacute;s fino, se ajusta a los tiempos. El peso se queda en 155 gramos; no es ligero, pero s&iacute; aceptable para un terminal de 5 pulgadas. En definitiva, aunque cumple su funci&oacute;n y no aparenta ser fr&aacute;gil, uno no puede evitar sentir que se pod&iacute;a haber trabajado mejor este aspecto. La buena noticia es que se trata del peor punto del producto junto a su c&aacute;mara.&nbsp;</p>\r\n\r\n<p style="box-sizing: border-box; padding: 0px; font-family: Lato, Helvetica, Arial, sans-serif;">Tampoco encontraremos grandes alardes en el sistema operativo, un Android 4.2.1 limpio y puro, el preferido de muchos, entre los que me incluyo. Hay poco extra y s&oacute;lo vienen instaladas de f&aacute;brica algunas aplicaciones b&aacute;sicas de Google y otras generales como Facebook o Skype. Eso s&iacute;, ni rastro de software en chino. En este caso se trata de una versi&oacute;n dedicada al mercado espa&ntilde;ol; con su garant&iacute;a y soporte. Nada de importaci&oacute;n.</p>\r\n', 1, '52c7304d-a500-47b5-8dde-0f483d4f19a0', 1, '14.00', '2014-01-04 14:59:33', '2014-01-04 14:59:33'),
('52c813fd-67e8-4aef-9792-1b283d4f19a0', NULL, 18, 'Ropa varon', 'Si durante el Ãºltimo aÃ±o hemos estado hablando de la llegada de las firmas chinas a la gama alta del mercado de smartphones, ahora es el momento de conocer a uno de los actores del mercado. Sin hacer hacer tanto ruido como Huawei o Xiaomi, Zopo ya estÃ¡ establecida en EspaÃ±a.', '<p style="box-sizing: border-box; padding: 0px; font-family: Lato, Helvetica, Arial, sans-serif;">Las medidas exactas se cifran en 141.9 &times; 67 &times; 7.9mm. El resultado es que, sin ser el m&aacute;s peque&ntilde;o ni el m&aacute;s fino, se ajusta a los tiempos. El peso se queda en 155 gramos; no es ligero, pero s&iacute; aceptable para un terminal de 5 pulgadas. En definitiva, aunque cumple su funci&oacute;n y no aparenta ser fr&aacute;gil, uno no puede evitar sentir que se pod&iacute;a haber trabajado mejor este aspecto. La buena noticia es que se trata del peor punto del producto junto a su c&aacute;mara.&nbsp;</p>\r\n\r\n<p style="box-sizing: border-box; padding: 0px; font-family: Lato, Helvetica, Arial, sans-serif;">Tampoco encontraremos grandes alardes en el sistema operativo, un Android 4.2.1 limpio y puro, el preferido de muchos, entre los que me incluyo. Hay poco extra y s&oacute;lo vienen instaladas de f&aacute;brica algunas aplicaciones b&aacute;sicas de Google y otras generales como Facebook o Skype. Eso s&iacute;, ni rastro de software en chino. En este caso se trata de una versi&oacute;n dedicada al mercado espa&ntilde;ol; con su garant&iacute;a y soporte. Nada de importaci&oacute;n.</p>\r\n', 2, '52c730ed-4250-4e83-ac0a-0f483d4f19a0', 1, '14.00', '2014-01-04 17:25:59', '2014-01-04 15:00:29'),
('52d3f3fc-a8bc-425c-a9e6-05143d4f19a0', '12333', 24, 'Fanta 2', 'Resumen', '<p>Descripcion</p>\r\n', 1, '52c730dc-78e0-4a71-95cf-0f483d4f19a0', 1, '23.00', '2014-02-04 22:18:47', '2014-01-13 15:11:08'),
('52f3ecaa-2c94-4213-a78c-19943d4f19a0', '', 27, 'Samsung I9100 Galaxy S II Android 2.3 WCDMA Smartphone w/ 4.3" Capacitive and GPS - Black (16GB)', '\r\n\r\n    3G Network HSDPA 850 / 900 / 1900 / 2100\r\n    GSM 850 / 900 / 1800 / 1900\r\n    16 GB storage, 1 GB RAM\r\n    Accelerometer, gyro, proximity, compass, barometer\r\n    Exynos 1.4 GHz Quad-core Processor\r\n    Best DROID phone on the market,WiFi a/b/g/n, WiFi HT4', '<p>3G Network HSDPA 850 / 900 / 1900 / 2100<br />\r\n&nbsp;&nbsp;&nbsp; GSM 850 / 900 / 1800 / 1900<br />\r\n&nbsp;&nbsp;&nbsp; 16 GB storage, 1 GB RAM<br />\r\n&nbsp;&nbsp;&nbsp; Accelerometer, gyro, proximity, compass, barometer<br />\r\n&nbsp;&nbsp;&nbsp; Exynos 1.4 GHz Quad-core Processor<br />\r\n&nbsp;&nbsp;&nbsp; Best DROID phone on the market,WiFi a/b/g/n, WiFi HT40</p>\r\n', NULL, '52c72ff0-b8a4-4365-aa57-0f483d4f19a0', 1, '355.50', '2014-02-06 21:12:26', '2014-02-06 21:12:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` varchar(36) NOT NULL,
  `numero` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `direccion` varchar(500) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `estado` int(2) NOT NULL DEFAULT '4',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `numero` (`numero`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `numero`, `username`, `password`, `nombre`, `email`, `telefono`, `direccion`, `role`, `estado`, `created`, `modified`) VALUES
('52cb4636-df58-4282-8d71-06d43d4f19a0', 12, 'cristiamherrera@gmail.com', '5468b6cae46096756eacd957e981dfc3ccf452c7', 'Cristiam Herrera Daza', 'cristiamherrera@gmail.com', NULL, NULL, 'visitante', 3, '2014-01-07 01:11:34', '2014-01-07 01:11:34'),
('52deefc3-fee0-4be2-a8a5-0d643d4f19a0', 19, NULL, '5468b6cae46096756eacd957e981dfc3ccf452c7', 'Juan Perez', 'j@gmail.com', '23333', ' 	Calle Yanacocha #123', 'visitante', 5, '2014-01-21 23:08:03', '2014-01-21 23:08:03'),
('52def0ae-1768-4c6e-b6f1-0d643d4f19a0', 20, 'a@gmai.com', '5468b6cae46096756eacd957e981dfc3ccf452c7', 'jperes 2', 'a@gmai.com', '123', 'ASDFA', 'visitante', 3, '2014-01-21 23:11:58', '2014-02-05 01:33:33'),
('52f15189-f8e0-4b3e-b5a5-01ac3d4f19a0', 21, 'admin', 'b7c2356438b4129b48da4666f0ab6d8702bf1f33', 'Crt', 'crt#asdfa', 'asdfa', NULL, NULL, 4, '2014-02-04 21:46:01', '2014-02-05 02:19:04'),
('52f18444-df08-40b1-be9b-01ac3d4f19a0', 23, 'cristiam', '5468b6cae46096756eacd957e981dfc3ccf452c7', 'Cristiam Herrera Daza', 'cristiamherrera@gmail.com', '73253830', NULL, NULL, 4, '2014-02-05 01:22:28', '2014-02-05 02:21:49'),
('52f185ab-36f4-469d-9a5d-01ac3d4f19a0', 24, 'admin', NULL, 'Mauricio Mercado', 'mau@gmail.com', '787978', NULL, NULL, 4, '2014-02-05 01:28:27', '2014-02-05 01:28:27'),
('52f26126-2ea0-4624-a16b-16543d4f19a0', 25, '', '5468b6cae46096756eacd957e981dfc3ccf452c7', 'Grover Fernandez Daza', 'grover@gmail.com', '77777', 'Calle catacora', 'visitante', 4, '2014-02-05 17:04:54', '2014-02-05 17:55:18');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
