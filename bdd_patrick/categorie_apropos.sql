-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 18 fév. 2021 à 21:04
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `patrickday`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie_apropos`
--

DROP TABLE IF EXISTS `categorie_apropos`;
CREATE TABLE IF NOT EXISTS `categorie_apropos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(50) NOT NULL,
  `titre_categorie` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie_apropos`
--

INSERT INTO `categorie_apropos` (`id`, `nom_categorie`, `titre_categorie`) VALUES
(1, 'articles', 'Les articles de presse'),
(2, 'affiches', 'Théâtre, Comédies musicales, Films'),
(3, 'comedien', 'Le Comédien'),
(4, 'metteurenscene', 'Le Metteur en scène');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
