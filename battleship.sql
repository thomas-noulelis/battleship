-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 20 Février 2016 à 19:34
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
(3, 'North Korea');

-- --------------------------------------------------------

--
-- Structure de la table `apiShip`
--

CREATE TABLE IF NOT EXISTS `apiShip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `id_country` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `apiShip`
--

INSERT INTO `apiShip` (`id`, `type`, `name`, `size`, `id_country`) VALUES
(1, 'destroyer', 'Gabriel Charmes 151', 3, 1),
(2, 'submarine', 'Le Terrible', 3, 1),
(3, 'aircraft carrier', 'Charles de Gaulle', 5, 1),
(4, 'patrol boat', 'Orage', 2, 1),
(5, 'cruiser', 'Tourville', 4, 1),
(6, 'destroyer', 'Arleigh Burke', 3, 2),
(7, 'submarine', 'Virginia', 3, 2),
(8, 'aircraft carrier', 'Ronald Reagan', 5, 2),
(9, 'patrol boat', 'USS Pegasus', 2, 2),
(10, 'cruiser', 'Bunker Hill', 4, 2),
(11, 'destroyer', 'Pyongyange', 3, 3),
(12, 'submarine', 'Hamhung', 3, 3),
(13, 'aircraft carrier', 'Chongjin', 5, 3),
(14, 'patrol boat', 'Nampo', 2, 3),
(15, 'cruiser', 'Wonsan', 4, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
