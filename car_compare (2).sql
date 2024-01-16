-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 16 jan. 2024 à 08:23
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `car_compare`
--

-- --------------------------------------------------------

--
-- Structure de la table `diaporama`
--

DROP TABLE IF EXISTS `diaporama`;
CREATE TABLE IF NOT EXISTS `diaporama` (
  `id_diaporama` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_website` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id_diaporama`),
  KEY `id_website` (`id_website`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `diaporama`
--

INSERT INTO `diaporama` (`id_diaporama`, `id_website`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `diaporam_items`
--

DROP TABLE IF EXISTS `diaporam_items`;
CREATE TABLE IF NOT EXISTS `diaporam_items` (
  `id_diapo_item` smallint(6) NOT NULL AUTO_INCREMENT,
  `image_link` varchar(255) DEFAULT NULL,
  `news_ad_link` varchar(255) DEFAULT NULL,
  `id_diaporama` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id_diapo_item`),
  KEY `id_diaporama` (`id_diaporama`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `diaporam_items`
--

INSERT INTO `diaporam_items` (`id_diapo_item`, `image_link`, `news_ad_link`, `id_diaporama`) VALUES
(1, 'assets/diaporama/news1.jpg', 'https://tonobiles.com/marche-de-voiture-occasion-en-algerie/', 1),
(2, 'assets/diaporama/news2.jpg', 'https://dzair-tube.dz/en/arrival-of-new-chery-cars-in-algeria/', 1),
(3, 'assets/diaporama/news3.jpg', 'https://themaghrebtimes.com/opel-has-a-new-official-representative-in-algeria/', 1);

-- --------------------------------------------------------

--
-- Structure de la table `generation`
--

DROP TABLE IF EXISTS `generation`;
CREATE TABLE IF NOT EXISTS `generation` (
  `id_generation` smallint(6) NOT NULL AUTO_INCREMENT,
  `generation_name` varchar(50) DEFAULT NULL,
  `year_begin` year(4) DEFAULT NULL,
  `year_end` year(4) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `deleted` varchar(3) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id_generation`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `generation`
--

INSERT INTO `generation` (`id_generation`, `generation_name`, `year_begin`, `year_end`, `date_create`, `date_update`, `deleted`) VALUES
(1, 'F22/F23', 2013, 2017, '2024-01-08 01:24:13', NULL, 'no'),
(2, 'W251', 2005, 2010, '2024-01-08 09:55:09', NULL, 'no');

-- --------------------------------------------------------

--
-- Structure de la table `generation_v_year`
--

DROP TABLE IF EXISTS `generation_v_year`;
CREATE TABLE IF NOT EXISTS `generation_v_year` (
  `id_generation_v_year` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_generation` smallint(6) DEFAULT NULL,
  `id_v_year` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id_generation_v_year`),
  KEY `id_generation` (`id_generation`),
  KEY `id_v_year` (`id_v_year`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `generation_v_year`
--

INSERT INTO `generation_v_year` (`id_generation_v_year`, `id_generation`, `id_v_year`) VALUES
(1, 1, 2),
(2, 2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `logo`
--

DROP TABLE IF EXISTS `logo`;
CREATE TABLE IF NOT EXISTS `logo` (
  `id_logo` smallint(6) NOT NULL AUTO_INCREMENT,
  `logo_link` varchar(255) DEFAULT NULL,
  `logo_type` varchar(50) DEFAULT NULL,
  `id_website` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id_logo`),
  KEY `id_website` (`id_website`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `logo`
--

INSERT INTO `logo` (`id_logo`, `logo_link`, `logo_type`, `id_website`) VALUES
(1, '/Car-comparison-website/assets/logo/logo-black-orange.svg', 'black and orange', 1),
(2, '/Car-comparison-website/assets/logo/logo-white-orange.svg', 'white and orange', 1),
(3, '/Car-comparison-website/assets/logo/logo-white.svg', 'white', 1);

-- --------------------------------------------------------

--
-- Structure de la table `make`
--

DROP TABLE IF EXISTS `make`;
CREATE TABLE IF NOT EXISTS `make` (
  `id_make` smallint(6) NOT NULL AUTO_INCREMENT,
  `make_name` varchar(50) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `origin_country` varchar(50) DEFAULT NULL,
  `registered_office` varchar(255) DEFAULT NULL,
  `deleted` varchar(3) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id_make`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `make`
--

INSERT INTO `make` (`id_make`, `make_name`, `date_create`, `date_update`, `origin_country`, `registered_office`, `deleted`) VALUES
(1, 'Audi', '2024-01-04 17:03:07', NULL, 'Germany', 'Ingolsatadt, Germany', 'no'),
(2, 'Astom Martin', '2024-01-04 17:03:07', NULL, 'England', 'Gaydon, England', 'no'),
(3, 'Austin', '2024-01-04 17:03:07', NULL, 'England', 'Rayne, England', 'no'),
(4, 'Bentley', '2024-01-04 17:03:07', NULL, 'England', 'Crewe, England', 'no'),
(5, 'BMW', '2024-01-04 17:03:07', NULL, 'Germany', 'Munich, Germany', 'no'),
(6, 'Chery', '2024-01-04 17:03:07', NULL, 'China', 'Wuhu, China', 'no'),
(7, 'Cheverolet', '2024-01-04 17:03:07', NULL, 'US', 'Michigan, US', 'no'),
(8, 'Mercedes', '2024-01-04 17:03:07', NULL, 'Germany', 'Sttutgart, Germany', 'no'),
(9, 'Porsche', '2024-01-04 17:03:07', NULL, 'Germany', 'Sttutgart, Germany', 'no');

-- --------------------------------------------------------

--
-- Structure de la table `model`
--

DROP TABLE IF EXISTS `model`;
CREATE TABLE IF NOT EXISTS `model` (
  `id_model` smallint(6) NOT NULL AUTO_INCREMENT,
  `model_name` varchar(50) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `id_make` smallint(6) DEFAULT NULL,
  `deleted` varchar(3) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id_model`),
  KEY `id_make` (`id_make`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `model`
--

INSERT INTO `model` (`id_model`, `model_name`, `date_create`, `date_update`, `id_make`, `deleted`) VALUES
(1, '1 serie', '2024-01-08 01:14:16', NULL, 5, 'no'),
(2, '2 serie', '2024-01-08 01:14:16', NULL, 5, 'no'),
(3, '2 serie Active Tourer', '2024-01-08 01:14:16', NULL, 5, 'no'),
(4, 'A1', '2024-01-08 01:14:16', NULL, 1, 'no'),
(5, 'A2', '2024-01-08 01:14:16', NULL, 1, 'no'),
(6, 'A3', '2024-01-08 01:14:16', NULL, 1, 'no'),
(7, 'R_Class', '2024-01-08 09:50:35', NULL, 8, 'no');

-- --------------------------------------------------------

--
-- Structure de la table `model_generation`
--

DROP TABLE IF EXISTS `model_generation`;
CREATE TABLE IF NOT EXISTS `model_generation` (
  `id_model_generation` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_model` smallint(6) DEFAULT NULL,
  `id_generation` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id_model_generation`),
  KEY `id_model` (`id_model`),
  KEY `id_generation` (`id_generation`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `model_generation`
--

INSERT INTO `model_generation` (`id_model_generation`, `id_model`, `id_generation`) VALUES
(1, 2, 1),
(2, 7, 2);

-- --------------------------------------------------------

--
-- Structure de la table `nav_menu`
--

DROP TABLE IF EXISTS `nav_menu`;
CREATE TABLE IF NOT EXISTS `nav_menu` (
  `id_nav_menu` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_website` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id_nav_menu`),
  KEY `id_website` (`id_website`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `nav_menu`
--

INSERT INTO `nav_menu` (`id_nav_menu`, `id_website`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `nav_menu_item`
--

DROP TABLE IF EXISTS `nav_menu_item`;
CREATE TABLE IF NOT EXISTS `nav_menu_item` (
  `id_item` smallint(6) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(50) DEFAULT NULL,
  `item_link` varchar(255) DEFAULT NULL,
  `id_nav_menu` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id_item`),
  KEY `id_nav_menu` (`id_nav_menu`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `nav_menu_item`
--

INSERT INTO `nav_menu_item` (`id_item`, `item_name`, `item_link`, `id_nav_menu`) VALUES
(1, 'News', '/Car-comparison-website/news', 1),
(2, 'Comparator', '/Car-comparison-website/comparator', 1),
(3, 'Makes', '/Car-comparison-website/makes', 1),
(4, 'Reviews', '/Car-comparison-website/reviews', 1),
(5, 'Buying guide', '/Car-comparison-website/buying-guide', 1),
(6, 'Contact', '/Car-comparison-website/contact', 1);

-- --------------------------------------------------------

--
-- Structure de la table `ratingmake`
--

DROP TABLE IF EXISTS `ratingmake`;
CREATE TABLE IF NOT EXISTS `ratingmake` (
  `id_rating` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_user` smallint(6) DEFAULT NULL,
  `id_make` smallint(6) DEFAULT NULL,
  `rating` float DEFAULT NULL,
  PRIMARY KEY (`id_rating`),
  KEY `id_user` (`id_user`),
  KEY `id_make` (`id_make`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ratingmake`
--

INSERT INTO `ratingmake` (`id_rating`, `id_user`, `id_make`, `rating`) VALUES
(1, 1, 1, 3.5),
(2, 1, 4, 4),
(3, 1, 5, 4),
(4, 1, 8, 4.5),
(5, 2, 1, 4),
(6, 2, 4, 4),
(7, 2, 5, 3),
(8, 2, 8, 5);

-- --------------------------------------------------------

--
-- Structure de la table `ratingmodel`
--

DROP TABLE IF EXISTS `ratingmodel`;
CREATE TABLE IF NOT EXISTS `ratingmodel` (
  `id_rating` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_user` smallint(6) DEFAULT NULL,
  `id_model` smallint(6) DEFAULT NULL,
  `rating` float DEFAULT '0',
  PRIMARY KEY (`id_rating`),
  KEY `id_user` (`id_user`),
  KEY `id_model` (`id_model`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ratingmodel`
--

INSERT INTO `ratingmodel` (`id_rating`, `id_user`, `id_model`, `rating`) VALUES
(1, 2, 1, 5),
(2, 2, 2, 1),
(3, 2, 3, 4.5),
(4, 2, 4, 3.5),
(5, 2, 5, 3),
(6, 2, 6, 4),
(18, 3, 5, 2),
(17, 3, 4, 4),
(16, 3, 3, 3),
(15, 3, 2, 1),
(14, 3, 1, 5),
(13, 2, 7, 4),
(19, 3, 6, 5),
(20, 3, 7, 2.5),
(21, 4, 1, 4),
(22, 4, 2, 3),
(23, 4, 3, 4),
(24, 4, 4, 3),
(25, 4, 5, 4),
(26, 4, 6, 3),
(27, 4, 7, 4);

-- --------------------------------------------------------

--
-- Structure de la table `ratingvehicule`
--

DROP TABLE IF EXISTS `ratingvehicule`;
CREATE TABLE IF NOT EXISTS `ratingvehicule` (
  `id_rating` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_user` smallint(6) DEFAULT NULL,
  `id_vehicule` smallint(6) DEFAULT NULL,
  `rating` float DEFAULT NULL,
  PRIMARY KEY (`id_rating`),
  KEY `id_user` (`id_user`),
  KEY `id_vehicule` (`id_vehicule`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ratingvehicule`
--

INSERT INTO `ratingvehicule` (`id_rating`, `id_user`, `id_vehicule`, `rating`) VALUES
(1, 2, 1, 3),
(2, 2, 2, 4.5),
(3, 1, 1, 4),
(4, 1, 2, 3),
(5, 3, 1, 5),
(6, 3, 2, 5);

-- --------------------------------------------------------

--
-- Structure de la table `series`
--

DROP TABLE IF EXISTS `series`;
CREATE TABLE IF NOT EXISTS `series` (
  `id_series` smallint(6) NOT NULL AUTO_INCREMENT,
  `series_name` varchar(50) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `id_generation` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id_series`),
  KEY `id_generation` (`id_generation`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `social`
--

DROP TABLE IF EXISTS `social`;
CREATE TABLE IF NOT EXISTS `social` (
  `id_social` smallint(6) NOT NULL AUTO_INCREMENT,
  `platform` varchar(50) DEFAULT NULL,
  `social_link` varchar(255) DEFAULT NULL,
  `id_socials` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id_social`),
  KEY `id_socials` (`id_socials`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `social`
--

INSERT INTO `social` (`id_social`, `platform`, `social_link`, `id_socials`) VALUES
(1, 'facebook', 'https://www.facebook.com/', 1),
(2, 'instagram', 'https://www.instagram.com/', 1),
(3, 'x-twitter', 'https://twitter.com/', 1),
(5, 'linkedin', 'https://www.linkedin.com/', 1);

-- --------------------------------------------------------

--
-- Structure de la table `socials`
--

DROP TABLE IF EXISTS `socials`;
CREATE TABLE IF NOT EXISTS `socials` (
  `id_socials` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_website` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id_socials`),
  KEY `id_website` (`id_website`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `socials`
--

INSERT INTO `socials` (`id_socials`, `id_website`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `specification`
--

DROP TABLE IF EXISTS `specification`;
CREATE TABLE IF NOT EXISTS `specification` (
  `id_specification` smallint(6) NOT NULL AUTO_INCREMENT,
  `specification_name` varchar(50) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `deleted` varchar(3) DEFAULT 'no',
  PRIMARY KEY (`id_specification`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `specification`
--

INSERT INTO `specification` (`id_specification`, `specification_name`, `date_create`, `date_update`, `deleted`) VALUES
(1, 'City driving fuel consumption per 100km', '2024-01-12 01:04:12', NULL, 'no'),
(2, 'Highway driving fuel consumption per 100 km', '2024-01-12 01:04:12', NULL, 'no'),
(3, 'Mixed driving fuel consumption per 100km', '2024-01-12 01:04:12', NULL, 'no'),
(4, 'Fuel tank capacity', '2024-01-12 01:04:12', NULL, 'no'),
(5, 'Cruising range', '2024-01-12 01:04:13', NULL, 'no'),
(6, 'Fuel', '2024-01-12 01:04:13', NULL, 'no'),
(7, 'Emission standards', '2024-01-12 01:04:13', NULL, 'no'),
(8, 'Max speed', '2024-01-12 01:04:13', NULL, 'no'),
(9, 'Acceleration(0-100km/h)', '2024-01-12 01:04:13', NULL, 'no'),
(10, 'Capacity', '2024-01-12 01:04:13', NULL, 'no'),
(11, 'Engine power', '2024-01-12 01:04:13', NULL, 'no'),
(12, 'Max pwer at RPM', '2024-01-12 01:04:13', NULL, 'no'),
(13, 'Maximum torque', '2024-01-12 01:04:13', NULL, 'no'),
(14, 'Turnover of maximum torque', '2024-01-12 01:04:13', NULL, 'no'),
(15, 'Engine type', '2024-01-12 01:04:13', NULL, 'no'),
(16, 'Cylinder layout', '2024-01-12 01:04:13', NULL, 'no'),
(17, 'Injection type', '2024-01-12 01:04:13', NULL, 'no'),
(18, 'Boost type', '2024-01-12 01:04:13', NULL, 'no'),
(19, 'Presence of intercooler', '2024-01-12 01:04:13', NULL, 'no'),
(20, 'Number of cylinders', '2024-01-12 01:04:13', NULL, 'no'),
(21, 'Valves per cylinder', '2024-01-12 01:04:13', NULL, 'no'),
(22, 'Cylinder bore', '2024-01-12 01:04:13', NULL, 'no'),
(23, 'Stroke cycle', '2024-01-12 01:04:13', NULL, 'no'),
(24, 'Gearbox type', '2024-01-12 01:04:13', NULL, 'no'),
(25, 'Number of gear', '2024-01-12 01:04:13', NULL, 'no'),
(26, 'Drive wheels', '2024-01-12 01:04:13', NULL, 'no'),
(27, 'Turning circle', '2024-01-12 01:04:13', NULL, 'no'),
(28, 'Number of seater', '2024-01-12 01:04:13', NULL, 'no'),
(29, 'Length', '2024-01-12 01:04:13', NULL, 'no'),
(30, 'Width', '2024-01-12 01:04:13', NULL, 'no'),
(31, 'Wheelbase', '2024-01-12 01:04:13', NULL, 'no'),
(32, 'Front track', '2024-01-12 01:04:13', NULL, 'no'),
(33, 'Rear track', '2024-01-12 01:04:13', NULL, 'no'),
(34, 'Ground clearance', '2024-01-12 01:04:13', NULL, 'no'),
(35, 'Curb weight', '2024-01-12 01:04:13', NULL, 'no'),
(36, 'Full weight', '2024-01-12 01:04:13', NULL, 'no'),
(37, 'Payload', '2024-01-12 01:04:13', NULL, 'no'),
(38, 'Min trunk capacity', '2024-01-12 01:04:13', NULL, 'no'),
(39, 'Max trunk capacity', '2024-01-12 01:04:13', NULL, 'no'),
(40, 'Front/rear axle load', '2024-01-12 01:04:13', NULL, 'no'),
(41, 'Trialer load(with brakes)', '2024-01-12 01:04:13', NULL, 'no'),
(42, 'Front suspension', '2024-01-12 01:04:13', NULL, 'no'),
(43, 'Back suspension', '2024-01-12 01:04:14', NULL, 'no'),
(44, 'Front brakes', '2024-01-12 01:04:14', NULL, 'no'),
(45, 'Rear brakes', '2024-01-12 01:04:14', NULL, 'no'),
(46, 'Body type', '2024-01-12 01:04:14', NULL, 'no');

-- --------------------------------------------------------

--
-- Structure de la table `specification_value`
--

DROP TABLE IF EXISTS `specification_value`;
CREATE TABLE IF NOT EXISTS `specification_value` (
  `id_specification_value` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_vehicule` smallint(6) DEFAULT NULL,
  `id_specification` smallint(6) DEFAULT NULL,
  `value` varchar(255) DEFAULT ' ',
  `unit` varchar(50) DEFAULT ' ',
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `deleted` varchar(3) DEFAULT 'no',
  PRIMARY KEY (`id_specification_value`),
  KEY `id_vehicule` (`id_vehicule`),
  KEY `id_specification` (`id_specification`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `specification_value`
--

INSERT INTO `specification_value` (`id_specification_value`, `id_vehicule`, `id_specification`, `value`, `unit`, `date_create`, `date_update`, `deleted`) VALUES
(1, 1, 1, '5.6', 'l', '2024-01-12 01:28:05', NULL, 'no'),
(2, 1, 2, '3.9', 'l', '2024-01-12 01:28:05', NULL, 'no'),
(3, 1, 3, '4.5', 'l', '2024-01-12 01:28:05', NULL, 'no'),
(4, 1, 4, '52', 'l', '2024-01-12 01:28:05', NULL, 'no'),
(5, 1, 5, 'from 930 to 1 330', 'km', '2024-01-12 01:28:05', NULL, 'no'),
(6, 1, 6, 'diesel', '', '2024-01-12 01:28:05', NULL, 'no'),
(7, 1, 7, 'EURO VI', '', '2024-01-12 01:28:05', NULL, 'no'),
(8, 1, 8, '230', 'km/h', '2024-01-12 01:28:05', NULL, 'no'),
(9, 1, 9, '7.2', 's', '2024-01-12 01:28:05', NULL, 'no'),
(10, 1, 10, '1995', 'cm3', '2024-01-12 01:28:06', NULL, 'no'),
(11, 1, 11, '184', 'hp', '2024-01-12 01:28:06', NULL, 'no'),
(12, 1, 12, 'to 4 000', 'RPM', '2024-01-12 01:28:06', NULL, 'no'),
(13, 1, 13, '380', 'N*m', '2024-01-12 01:28:06', NULL, 'no'),
(14, 1, 14, 'from 1 750 to 2 750', 'RPM', '2024-01-12 01:28:06', NULL, 'no'),
(15, 1, 15, 'Diesel', '', '2024-01-12 01:28:06', NULL, 'no'),
(16, 1, 16, 'Inline', '', '2024-01-12 01:28:06', NULL, 'no'),
(17, 1, 17, 'Common Rail', '', '2024-01-12 01:28:06', NULL, 'no'),
(18, 1, 18, 'Turbo', '', '2024-01-12 01:28:06', NULL, 'no'),
(19, 1, 19, 'Present', '', '2024-01-12 01:28:06', NULL, 'no'),
(20, 1, 20, '4', '', '2024-01-12 01:28:06', NULL, 'no'),
(21, 1, 21, '4', '', '2024-01-12 01:28:06', NULL, 'no'),
(22, 1, 22, '90', 'mm', '2024-01-12 01:28:06', NULL, 'no'),
(23, 1, 23, '84', 'mm', '2024-01-12 01:28:06', NULL, 'no'),
(24, 1, 24, 'Manual', '', '2024-01-12 01:28:06', NULL, 'no'),
(25, 1, 25, '6', '', '2024-01-12 01:28:06', NULL, 'no'),
(26, 1, 26, 'Rear wheel drive', '', '2024-01-12 01:28:06', NULL, 'no'),
(27, 1, 27, '10.9', 'm', '2024-01-12 01:28:06', NULL, 'no'),
(28, 1, 28, '4', '', '2024-01-12 01:28:06', NULL, 'no'),
(29, 1, 29, '4432', 'mm', '2024-01-12 01:28:06', NULL, 'no'),
(30, 1, 30, '1774', 'mm', '2024-01-12 01:28:06', NULL, 'no'),
(53, 2, 5, 'from 930 to 1 330', 'km', '2024-01-12 01:54:03', NULL, 'no'),
(52, 2, 4, '52', 'l', '2024-01-12 01:54:03', NULL, 'no'),
(51, 2, 3, '4.5', 'l', '2024-01-12 01:54:03', NULL, 'no'),
(50, 2, 2, '3.9', 'l', '2024-01-12 01:54:03', NULL, 'no'),
(49, 2, 1, '5.6', 'l', '2024-01-12 01:54:03', NULL, 'no'),
(54, 2, 6, 'diesel', '', '2024-01-12 01:54:03', NULL, 'no'),
(55, 2, 7, 'EURO VI', '', '2024-01-12 01:54:03', NULL, 'no'),
(56, 2, 8, '230', 'km/h', '2024-01-12 01:54:03', NULL, 'no'),
(57, 2, 9, '7.2', 's', '2024-01-12 01:54:03', NULL, 'no'),
(58, 2, 10, '1995', 'cm3', '2024-01-12 01:54:03', NULL, 'no'),
(59, 2, 11, '184', 'hp', '2024-01-12 01:54:04', NULL, 'no'),
(60, 2, 12, 'to 4 000', 'RPM', '2024-01-12 01:54:04', NULL, 'no'),
(61, 2, 13, '380', 'N*m', '2024-01-12 01:54:04', NULL, 'no'),
(62, 2, 14, 'from 1 750 to 2 750', 'RPM', '2024-01-12 01:54:04', NULL, 'no'),
(63, 2, 15, 'Diesel', '', '2024-01-12 01:54:04', NULL, 'no'),
(64, 2, 16, 'Inline', '', '2024-01-12 01:54:04', NULL, 'no'),
(65, 2, 17, 'Common Rail', '', '2024-01-12 01:54:04', NULL, 'no'),
(66, 2, 18, 'Turbo', '', '2024-01-12 01:54:04', NULL, 'no'),
(67, 2, 19, 'Present', '', '2024-01-12 01:54:04', NULL, 'no'),
(68, 2, 20, '4', '', '2024-01-12 01:54:04', NULL, 'no'),
(69, 2, 21, '4', '', '2024-01-12 01:54:04', NULL, 'no'),
(70, 2, 22, '90', 'mm', '2024-01-12 01:54:04', NULL, 'no'),
(71, 2, 23, '84', 'mm', '2024-01-12 01:54:04', NULL, 'no'),
(72, 2, 24, 'Manual', '', '2024-01-12 01:54:04', NULL, 'no'),
(73, 2, 25, '6', '', '2024-01-12 01:54:04', NULL, 'no'),
(74, 2, 26, 'Rear wheel drive', '', '2024-01-12 01:54:04', NULL, 'no'),
(75, 2, 27, '10.9', 'm', '2024-01-12 01:54:04', NULL, 'no'),
(76, 2, 28, '4', '', '2024-01-12 01:54:04', NULL, 'no'),
(77, 2, 29, '4432', 'mm', '2024-01-12 01:54:04', NULL, 'no'),
(78, 2, 30, '1774', 'mm', '2024-01-12 01:54:04', NULL, 'no');

-- --------------------------------------------------------

--
-- Structure de la table `trim`
--

DROP TABLE IF EXISTS `trim`;
CREATE TABLE IF NOT EXISTS `trim` (
  `id_trim` smallint(6) NOT NULL AUTO_INCREMENT,
  `trim_name` varchar(50) DEFAULT NULL,
  `start_production_year` year(4) DEFAULT NULL,
  `end_production_year` year(4) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `id_series` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id_trim`),
  KEY `id_series` (`id_series`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` smallint(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `username`, `email`, `password`) VALUES
(1, 'Hadjer_joe', 'kh_laissaoui@esi.dz', '9c2674997b8c512b7a2823dbd47d8810'),
(3, 'hadjerYo', 'hadjerlais77@gmail.com', '9c2674997b8c512b7a2823dbd47d8810'),
(4, 'HelloWorld', 'hello_world@gmail.com', '9c2674997b8c512b7a2823dbd47d8810'),
(5, 'hadjerYeah', 'hadjer_year@gmail.com', '9c2674997b8c512b7a2823dbd47d8810'),
(6, 'Joe0_0', 'joe@gmail.com', '9c2674997b8c512b7a2823dbd47d8810');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

DROP TABLE IF EXISTS `vehicule`;
CREATE TABLE IF NOT EXISTS `vehicule` (
  `id_vehicule` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_vehicule_type` smallint(6) DEFAULT NULL,
  `id_make` smallint(6) DEFAULT NULL,
  `id_model` smallint(6) DEFAULT NULL,
  `id_generation` smallint(6) DEFAULT NULL,
  `id_v_year` smallint(6) DEFAULT NULL,
  `deleted` varchar(3) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id_vehicule`),
  KEY `id_vehicule_type` (`id_vehicule_type`),
  KEY `id_make` (`id_make`),
  KEY `id_model` (`id_model`),
  KEY `id_generation` (`id_generation`),
  KEY `id_v_year` (`id_v_year`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vehicule`
--

INSERT INTO `vehicule` (`id_vehicule`, `id_vehicule_type`, `id_make`, `id_model`, `id_generation`, `id_v_year`, `deleted`) VALUES
(1, 1, 5, 2, 1, 2, 'no'),
(2, 1, 8, 7, 2, 4, 'no');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule_image`
--

DROP TABLE IF EXISTS `vehicule_image`;
CREATE TABLE IF NOT EXISTS `vehicule_image` (
  `id_vehicule_image` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_vehicule` smallint(6) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_vehicule_image`),
  KEY `id_vehicule` (`id_vehicule`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vehicule_image`
--

INSERT INTO `vehicule_image` (`id_vehicule_image`, `id_vehicule`, `path`) VALUES
(1, 1, '/Car-comparison-website/assets/cars/BMW-2-Series_13_17_15.jpg'),
(2, 2, '/Car-comparison-website/assets/cars/Mercedes_R_Class_W251_2005_2010_2010.png');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule_type`
--

DROP TABLE IF EXISTS `vehicule_type`;
CREATE TABLE IF NOT EXISTS `vehicule_type` (
  `id_vehicule_type` smallint(6) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_vehicule_type`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vehicule_type`
--

INSERT INTO `vehicule_type` (`id_vehicule_type`, `type_name`) VALUES
(1, 'Car'),
(2, 'Truck');

-- --------------------------------------------------------

--
-- Structure de la table `v_year`
--

DROP TABLE IF EXISTS `v_year`;
CREATE TABLE IF NOT EXISTS `v_year` (
  `id_v_year` smallint(6) NOT NULL AUTO_INCREMENT,
  `year_name` year(4) DEFAULT NULL,
  `deleted` varchar(3) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id_v_year`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `v_year`
--

INSERT INTO `v_year` (`id_v_year`, `year_name`, `deleted`) VALUES
(1, 2018, 'no'),
(2, 2015, 'no'),
(4, 2010, 'no');

-- --------------------------------------------------------

--
-- Structure de la table `website`
--

DROP TABLE IF EXISTS `website`;
CREATE TABLE IF NOT EXISTS `website` (
  `id_website` smallint(6) NOT NULL AUTO_INCREMENT,
  `website_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_website`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `website`
--

INSERT INTO `website` (`id_website`, `website_name`) VALUES
(1, 'Markaba');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
