-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 19 Février 2016 à 20:39
-- Version du serveur: 5.5.47-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `battleship`
--

-- --------------------------------------------------------

--
-- Structure de la table `apiCountry`
--

CREATE TABLE IF NOT EXISTS `apiCountry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `apiCountry`
--

INSERT INTO `apiCountry` (`id`, `name`) VALUES
(1, 'France'),
(2, 'USA'),
(3, 'North Korea'),
(4, 'Russia'),
(5, 'Japan'),
(6, 'South Korea');

-- --------------------------------------------------------

--
-- Structure de la table `apiShip`
--

CREATE TABLE IF NOT EXISTS `apiShip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ship` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `radius_attack` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `apiShip`
--

INSERT INTO `apiShip` (`id`, `ship`, `size`, `radius_attack`, `country`) VALUES
(1, 'destroyer', 5, 2, 1),
(2, 'ship', 2, 1, 0),
(3, 'frigat', 3, 1, 0),
(4, 'submarine', 4, 2, 0),
(5, 'aircraft carrier', 5, 1, 0),
(6, 'patrol boat', 1, 0, 0),
(7, 'mine hunter', 2, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
