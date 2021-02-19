-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 18 fév. 2021 à 21:03
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
-- Structure de la table `images_categorie`
--

DROP TABLE IF EXISTS `images_categorie`;
CREATE TABLE IF NOT EXISTS `images_categorie` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `adresse_image` text NOT NULL,
  `titre_image` varchar(50) NOT NULL,
  `id_categorie` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_images_categories_categorie_apropos` (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `images_categorie`
--

INSERT INTO `images_categorie` (`id`, `adresse_image`, `titre_image`, `id_categorie`) VALUES
(1, 'media\\images/articles/article1.jpg', '', 1),
(2, 'media\\images/articles/article2.jpg', '', 1),
(3, 'media\\images/articles/article3.jpg', '', 1),
(4, 'media\\images/articles/article4.jpg', '', 1),
(5, 'media\\images/articles/article5.jpg', '', 1),
(6, 'media\\images/articles/article6.jpg', '', 1),
(7, 'media\\images/affiches/affiche1.jpg', '', 2),
(8, 'media\\images/affiches/affiche2.jpg', '', 2),
(9, 'media\\images/affiches/affiche3.jpg', '', 2),
(10, 'media\\images/affiches/affiche4.jpg', '', 2),
(11, 'media\\images/affiches/affiche5.jpg', '', 2),
(12, 'media\\images/affiches/affiche6.jpg', '', 2),
(13, 'media\\images/affiches/affiche7.jpg', '', 2),
(14, 'media\\images/affiches/affiche8.jpg', '', 2),
(15, 'media\\images/affiches/affiche9.jpg', '', 2),
(16, 'media\\images/comedien/comedien1.jpg', '', 3),
(17, 'media\\images/comedien/comedien2.jpg', 'Hamlet', 3),
(18, 'media\\images/comedien/comedien3.jpg', 'Sigillee', 3),
(19, 'media\\images/comedien/comedien4.jpg', 'Saint Just', 3),
(20, 'media\\images/comedien/comedien5.jpg', 'L\'échange', 3),
(21, 'media\\images/comedien/comedien6.jpg', 'Chant indien', 3),
(22, 'media\\images/miseenscene/metteur1.jpg', '', 4),
(23, 'media\\images/miseenscene/metteur2.jpg', '', 4),
(24, 'media\\images/miseenscene/metteur3.jpg', '', 4),
(25, 'media\\images/miseenscene/metteur4.jpg', '', 4),
(26, 'media\\images/miseenscene/metteur5.jpg', '', 4),
(27, 'media\\images/miseenscene/metteur6.jpg', '', 4);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `images_categorie`
--
ALTER TABLE `images_categorie`
  ADD CONSTRAINT `fk_images_categories_categorie_apropos` FOREIGN KEY (`id_categorie`) REFERENCES `categorie_apropos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
