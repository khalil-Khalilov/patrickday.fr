-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 24 fév. 2021 à 15:19
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdd_patrick`
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

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `images_categorie`
--

DROP TABLE IF EXISTS `images_categorie`;
CREATE TABLE IF NOT EXISTS `images_categorie` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `adresse_image` text NOT NULL,
  `titre_image` varchar(50) DEFAULT NULL,
  `id_categorie` int(10) UNSIGNED DEFAULT NULL,
  `gallery_column` int(11) DEFAULT NULL,
  `type_image` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_images_categories_categorie_apropos` (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `images_categorie`
--

INSERT INTO `images_categorie` (`id`, `adresse_image`, `titre_image`, `id_categorie`, `gallery_column`, `type_image`) VALUES
(1, 'media\\images/articles/article1.jpg', '', 1, NULL, ''),
(2, 'media\\images/articles/article2.jpg', '', 1, NULL, ''),
(3, 'media\\images/articles/article3.jpg', '', 1, NULL, ''),
(4, 'media\\images/articles/article4.jpg', '', 1, NULL, ''),
(5, 'media\\images/articles/article5.jpg', '', 1, NULL, ''),
(6, 'media\\images/articles/article6.jpg', '', 1, NULL, ''),
(7, 'media\\images/affiches/affiche1.jpg', '', 2, NULL, ''),
(8, 'media\\images/affiches/affiche2.jpg', '', 2, NULL, ''),
(9, 'media\\images/affiches/affiche3.jpg', '', 2, NULL, ''),
(10, 'media\\images/affiches/affiche4.jpg', '', 2, NULL, ''),
(11, 'media\\images/affiches/affiche5.jpg', '', 2, NULL, ''),
(12, 'media\\images/affiches/affiche6.jpg', '', 2, NULL, ''),
(13, 'media\\images/affiches/affiche7.jpg', '', 2, NULL, ''),
(14, 'media\\images/affiches/affiche8.jpg', '', 2, NULL, ''),
(15, 'media\\images/affiches/affiche9.jpg', '', 2, NULL, ''),
(16, 'media\\images/comedien/comedien1.jpg', '', 3, NULL, ''),
(17, 'media\\images/comedien/comedien2.jpg', 'Hamlet', 3, NULL, ''),
(18, 'media\\images/comedien/comedien3.jpg', 'Sigillee', 3, NULL, ''),
(19, 'media\\images/comedien/comedien4.jpg', 'Saint Just', 3, NULL, ''),
(20, 'media\\images/comedien/comedien5.jpg', 'L\'échange', 3, NULL, ''),
(21, 'media\\images/comedien/comedien6.jpg', 'Chant indien', 3, NULL, ''),
(22, 'media\\images/miseenscene/metteur1.jpg', '', 4, NULL, ''),
(23, 'media\\images/miseenscene/metteur2.jpg', '', 4, NULL, ''),
(24, 'media\\images/miseenscene/metteur3.jpg', '', 4, NULL, ''),
(25, 'media\\images/miseenscene/metteur4.jpg', '', 4, NULL, ''),
(26, 'media\\images/miseenscene/metteur5.jpg', '', 4, NULL, ''),
(27, 'media\\images/miseenscene/metteur6.jpg', '', 4, NULL, ''),
(30, 'media/images/dessins/Alex2-min.jpg', 'Alex', NULL, 1, 'Dessin'),
(31, 'media/images/dessins/Alex3-min.jpg', 'Alex', NULL, 2, 'Dessin'),
(32, 'media/images/dessins/Bronsky1-min.jpg', 'Bronsky', NULL, 3, 'Dessin'),
(33, 'media/images/dessins/Bronsky2-min.jpg', 'Bronsky', NULL, 4, 'Dessin'),
(34, 'media/images/dessins/Bronsky3-min.jpg', 'Bronsky', NULL, 1, 'Dessin'),
(35, 'media/images/dessins/chloe2-min.jpg', 'Chloe', NULL, 3, 'Dessin'),
(36, 'media/images/dessins/chloe-min.jpg', 'Chloe', NULL, 2, 'Dessin'),
(37, 'media/images/dessins/Chris1-min.jpg', 'Chris', NULL, 4, 'Dessin'),
(38, 'media/images/dessins/Chris2-min.jpg', 'Chris', NULL, 1, 'Dessin'),
(39, 'media/images/dessins/Dany1-min.jpg', 'Dany', NULL, 2, 'Dessin'),
(40, 'media/images/dessins/Dany2-min.jpg', 'Dany', NULL, 3, 'Dessin'),
(41, 'media/images/dessins/Darmond1-min.jpg', 'Darmond', NULL, 4, 'Dessin'),
(42, 'media/images/dessins/Darmond2-min.jpg', 'Darmond', NULL, 1, 'Dessin'),
(43, 'media/images/dessins/maqette-planche-Pyrrha-min.jpg', 'Maqette Planche Pyrrha', NULL, 1, 'Dessin'),
(44, 'media/images/dessins/maqette-planche-Pyrrha2-min.jpg', 'Maqette Planche Pyrrha', NULL, 1, 'Dessin'),
(45, 'media/images/dessins/Pyrrha1-min.jpg', 'Pyrrha', NULL, 4, 'Dessin'),
(46, 'media/images/dessins/Pyrrha2-min.jpg', 'Pyrrha', NULL, 3, 'Dessin'),
(47, 'media/images/dessins/Pyrrha3-min.jpg', 'Pyrrha', NULL, 4, 'Dessin'),
(48, 'media/images/peintures/3 Graces-min.jpg', '3 Graces', NULL, 1, 'Peinture'),
(49, 'media/images/peintures/57 EME RUE BROOKLIN-min.jpg', '57 EME RUE BROOKLIN', NULL, 1, 'Peinture'),
(50, 'media/images/peintures/ALIEN-min.jpg', 'ALIEN', NULL, 1, 'Peinture'),
(51, 'media/images/peintures/BAR A JOE-min.jpg', 'BAR A JOE', NULL, 1, 'Peinture'),
(52, 'media/images/peintures/Traqué-min.jpg', 'Traqué', NULL, 1, 'Peinture'),
(53, 'media/images/peintures/In PROGRESS-min.jpg', 'IN PROGRESS', NULL, 1, 'Peinture'),
(54, 'media/images/peintures/JUSQU\'AU BOUT-min.jpg', 'JUSQU\'AU BOUT', NULL, 1, 'Peinture'),
(55, 'media/images/peintures/LA CHUTE-min.jpg', 'LA CHUTE', NULL, 1, 'Peinture'),
(56, 'media/images/peintures/LA FEMME INCONNUE-min.jpg', 'LA FEMME INCONNUE', NULL, 1, 'Peinture'),
(57, 'media/images/peintures/NEW-YORK (9)-min.jpg', 'NEW YORK 9', NULL, 1, 'Peinture'),
(58, 'media/images/peintures/NEW-YORK (10)-min.jpg', 'NEW YORK 10', NULL, 1, 'Peinture'),
(59, 'media/images/peintures/NEW-YORK (11)-min.jpg', 'NEW YORK 11', NULL, 1, 'Peinture'),
(60, 'media/images/peintures/NEW-YORK (12)-min.jpg', 'NEW YORK 12', NULL, 1, 'Peinture'),
(61, 'media/images/peintures/Saxo-min.jpg', 'Saxo', NULL, 1, 'Peinture'),
(62, 'media/images/peintures/CHAMP BLEU-min.jpg', 'CHAMP BLEU', NULL, 2, 'Peinture'),
(63, 'media/images/peintures/COMETE-min.jpg', 'COMETE', NULL, 2, 'Peinture'),
(64, 'media/images/peintures/COMMUNICARE 2-min.jpg', 'COMMUNICARE 2', NULL, 2, 'Peinture'),
(65, 'media/images/peintures/communicare-min.jpg', 'COMMUNICARE', NULL, 2, 'Peinture'),
(66, 'media/images/peintures/Liens 2-min.jpg', 'Liens 2', NULL, 2, 'Peinture'),
(67, 'media/images/peintures/LOVE 2-min.jpg', 'LOVE 2', NULL, 2, 'Peinture'),
(68, 'media/images/peintures/Manhattan-min.jpg', 'MANHATTAN', NULL, 2, 'Peinture'),
(69, 'media/images/peintures/Nu Bleu-min.jpg', 'Nu Bleu', NULL, 2, 'Peinture'),
(70, 'media/images/peintures/NU-min.jpg', 'Nu', NULL, 2, 'Peinture'),
(71, 'media/images/peintures/NUIT ROUGE 1-min.jpg', 'NUIT ROUGE 1', NULL, 2, 'Peinture'),
(72, 'media/images/peintures/NUIT ROUGE 2-min.jpg', 'NUIT ROUGE 2', NULL, 2, 'Peinture'),
(73, 'media/images/peintures/SON REGARD-min.jpg', 'SON REGARD', NULL, 2, 'Peinture'),
(74, 'media/images/peintures/Toile Allenbach-min.jpg', 'Toile Allenbach', NULL, 2, 'Peinture'),
(75, 'media/images/peintures/DES HOMMES ET DES DIEUX-min.jpg', 'DES HOMMES ET DES DIEUX', NULL, 3, 'Peinture'),
(76, 'media/images/peintures/DEUX-min.jpg', 'DEUX', NULL, 3, 'Peinture'),
(77, 'media/images/peintures/DOULEUR-min.jpg', 'DOULEUR', NULL, 3, 'Peinture'),
(78, 'media/images/peintures/Et maintenant..-min.jpg', 'Et maintenant...', NULL, 3, 'Peinture'),
(79, 'media/images/peintures/NEW YORK-min.jpg', 'NEW YORK 1', NULL, 3, 'Peinture'),
(80, 'media/images/peintures/NEW-YORK (2)-min.jpg', 'NEW YORK 2', NULL, 3, 'Peinture'),
(81, 'media/images/peintures/NEW-YORK (3)-min.jpg', 'NEW YORK 3', NULL, 3, 'Peinture'),
(82, 'media/images/peintures/NEW-YORK (4)-min.jpg', 'NEW YORK 4', NULL, 3, 'Peinture'),
(83, 'media/images/peintures/NEW-YORK (13)-min.jpg', 'NEW YORK 13', NULL, 3, 'Peinture'),
(84, 'media/images/peintures/NEW-YORK (14)-min.jpg', 'NEW YORK 14', NULL, 3, 'Peinture'),
(85, 'media/images/peintures/Nu 1-min.jpg', 'Nu 1', NULL, 3, 'Peinture'),
(86, 'media/images/peintures/NU 2-min.jpg', 'Nu 2', NULL, 3, 'Peinture'),
(87, 'media/images/peintures/SOLITUDE NOCTURNE-min.jpg', 'SOLITUDE NOCTURNE', NULL, 3, 'Peinture'),
(88, 'media/images/peintures/FEMME AUX PIVOINES-min.jpg', 'FEMME AUX PIVOINES', NULL, 4, 'Peinture'),
(89, 'media/images/peintures/FUMEE-min.jpg', 'FUMEE', NULL, 4, 'Peinture'),
(90, 'media/images/peintures/ILS-min.jpg', 'ILS', NULL, 4, 'Peinture'),
(91, 'media/images/peintures/IN ET OUT-min.jpg', 'IN ET OUT', NULL, 4, 'Peinture'),
(93, 'media/images/peintures/NEW-YORK (6)-min.jpg', 'NEW YORK 6', NULL, 4, 'Peinture'),
(94, 'media/images/peintures/NEW-YORK (7)-min.jpg', 'NEW YORK 7', NULL, 4, 'Peinture'),
(95, 'media/images/peintures/NEW-YORK (8)-min.jpg', 'NEW YORK 8', NULL, 4, 'Peinture'),
(96, 'media/images/peintures/NUIT ROUGE 3-min.jpg', 'NUIT ROUGE 3', NULL, 4, 'Peinture'),
(97, 'media/images/peintures/OUPS (en travail)-min.jpg', 'OUPS (en travail)', NULL, 4, 'Peinture'),
(98, 'media/images/peintures/POURQUOI-min.jpg', 'POURQUOI', NULL, 4, 'Peinture'),
(99, 'media/images/peintures/Rendez-vous-min.jpg', 'Rendez-vous', NULL, 4, 'Peinture'),
(100, 'media/images/peintures/YELLOW CAR-min.jpg', 'YELLOW CAR', NULL, 4, 'Peinture'),
(101, 'media/images/peintures/Seul dans la Ville nue-min.jpg', 'Seul dans la Ville', NULL, 4, 'Peinture'),
(102, 'media/images/peintures/SI BELLE-min.jpg', 'SI BELLE', NULL, 4, 'Peinture'),
(103, 'media/images/peintures/SI PRES SI LOIN-min.jpg', 'SI PRES SI LOIN', NULL, 4, 'Peinture'),
(105, 'media/images/dessins/nature.jpg', 'nature', NULL, 2, 'Dessin'),
(106, 'media/images/dessins/paris.jpg', 'paris', NULL, 3, 'Dessin'),
(107, 'media/images/dessins/underwater.jpg', 'underwater', NULL, 1, 'Dessin'),
(108, 'media/images/dessins/rocks.jpg', 'rocks', NULL, 2, 'Dessin'),
(109, 'media/images/dessins/wedding.jpg', 'wedding', NULL, 3, 'Dessin'),
(110, 'media/images/dessins/mist.jpg', 'mist', NULL, 1, 'Dessin'),
(111, 'media/images/dessins/ocean.jpg', 'ocean', NULL, 2, 'Dessin'),
(114, 'media/img/JavaScript-Wallpapers1614093038.jpg', 'Azer', NULL, 1, 'Dessin'),
(115, 'media/img/1920x1080-px-assassins-creed-1331351-wallhere.com1614094079.jpg', 'NEW YORK 5', NULL, 2, 'Peinture'),
(116, 'media/img/2025 7916140942181614166000.png', 'Ecole 42', NULL, 4, 'Peinture'),
(117, 'media/img/NEW-YORK (5)-min1614094309.JPG', 'NEW YORK 8', NULL, 1, 'Peinture'),
(119, 'media/img/rocks1614154587.jpg', 'Rocks', NULL, 3, 'Dessin'),
(120, 'media/img/paris16141548721614172182.jpg', 'Paris', NULL, 3, 'Dessin');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudonyme` varchar(30) NOT NULL,
  `mot_de_passe` text NOT NULL,
  `rang` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudonyme`, `mot_de_passe`, `rang`) VALUES
(1, 'Admin', 'g0yf19lkOUvJGlrtodi4Fw==', 1);

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
