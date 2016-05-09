-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 09 Mai 2016 à 14:32
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `wiki`
--

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
`id_message` int(200) NOT NULL AUTO_INCREMENT,
`id_desti` int(200) NOT NULL,
`contenu` text NOT NULL,
`id_exped` int(200) NOT NULL,
KEY `id_message` (`id_message`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id_user` int(200) NOT NULL AUTO_INCREMENT,
`prenom` varchar(200) NOT NULL,
`nom` varchar(200) NOT NULL,
`email` varchar(200) NOT NULL,
`cle` varchar(200) NOT NULL,
`actif` tinyint(1) NOT NULL,
`rang` varchar(200) NOT NULL,
`login` varchar(200) NOT NULL,
`password` varchar(200) NOT NULL,
PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_user`, `prenom`, `nom`, `email`, `cle`, `actif`, `rang`, `login`, `password`) VALUES
(2, 'thomas', 'valadier', 'thomas.valadier@ynov.com', '5ec28e92d2f6bb3320fbd1e09d7493ed', 1, 'admin', 'thomas.valadier', 'e1dfa236a646647b9b5a7c15d5e2739a916b4dda');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
