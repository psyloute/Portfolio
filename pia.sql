-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 07 fév. 2019 à 12:10
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pia`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `pseudo` varchar(535) NOT NULL,
  `object` varchar(535) NOT NULL,
  `email` varchar(535) NOT NULL,
  `message` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`pseudo`, `object`, `email`, `message`) VALUES
('Rocail', 'Coucou !', 'rocaile3@gmail.com', 'ça fonctionne :3'),
('Rocail', 'Coucou !', 'rocaile3@gmail.com', 'ça fonctionne :3'),
('Rocail', 'Coucou !', 'rocaile3@gmail.com', 'ça fonctionne :3'),
('Rocail', 'Coucou !', 'rocaile3@gmail.com', 'ça fonctionne :3'),
('Rocail', 'Coucou !', 'rocaile3@gmail.com', 'ça fonctionne :3'),
('Rocail', 'Bonjour', 'rocaile3@gmail.com', 'C\'est Rocail :3');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
