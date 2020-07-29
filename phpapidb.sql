-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 29 juil. 2020 à 15:53
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `phpapidb`
--

-- --------------------------------------------------------

--
-- Structure de la table `voisin`
--

DROP TABLE IF EXISTS `voisin`;
CREATE TABLE IF NOT EXISTS `voisin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `phone` int(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `about` varchar(500) NOT NULL,
  `favoris` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `voisin`
--

INSERT INTO `voisin` (`id`, `name`, `phone`, `address`, `about`, `favoris`) VALUES
(1, 'John Doe', 12366564, 'dakar', 'Data Scientist, i love football', 0),
(2, 'David Costa', 123589859, 'yoff', 'Apparel Patternmaker', 0),
(3, 'Todd Martell', 26994598, 'mamelles', 'Accountant, love play basketball', 0),
(19, 'ouzin faye', 79652622, 'sicap', 'i love walking on the street at sunday night', 0),
(20, 'ouzin faye', 79652622, 'sicap', 'i love walking on the street at sunday night', 1),
(21, 'fallou gogne', 79652622, 'niarry tally', 'i love walking on the street at sunday night', 0),
(22, 'fallou gogne', 79652622, 'niarry tally', 'i love walking on the street at sunday night', 0),
(23, 'pate diop', 79652622, 'saly', 'i love walking on the street at sunday night', 1),
(24, 'pate diop', 79652622, 'saly', 'i love walking on the street at sunday night', 0),
(25, 'thioune', 79652622, 'foire', 'i love walking on the street at sunday night', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
