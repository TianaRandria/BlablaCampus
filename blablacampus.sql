-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 11 oct. 2022 à 13:13
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blablacampus`
--

-- --------------------------------------------------------

--
-- Structure de la table `mailbox`
--

DROP TABLE IF EXISTS `mailbox`;
CREATE TABLE IF NOT EXISTS `mailbox` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `type_message` int(50) NOT NULL,
  PRIMARY KEY (`id_message`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `mailbox`
--

INSERT INTO `mailbox` (`id_message`, `type_message`) VALUES
(1, 0),
(2, 0);

-- --------------------------------------------------------

--
-- Structure de la table `reserver`
--

DROP TABLE IF EXISTS `reserver`;
CREATE TABLE IF NOT EXISTS `reserver` (
  `id_reservation` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_traject` int(11) NOT NULL,
  `id_message` int(11) NOT NULL,
  `validate_reservation` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_reservation`),
  KEY `id_traject` (`id_traject`),
  KEY `id_message` (`id_message`),
  KEY `Id_user` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `reserver`
--

INSERT INTO `reserver` (`id_reservation`, `id_user`, `id_traject`, `id_message`, `validate_reservation`) VALUES
(1, 3, 8, 1, NULL),
(2, 3, 9, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `trajects`
--

DROP TABLE IF EXISTS `trajects`;
CREATE TABLE IF NOT EXISTS `trajects` (
  `id_traject` int(11) NOT NULL AUTO_INCREMENT,
  `start_traject` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `end_traject` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_traject` date DEFAULT NULL,
  `hour_traject` time DEFAULT NULL,
  `numplace_traject` int(11) DEFAULT NULL,
  `placerest_traject` int(11) DEFAULT NULL,
  `type_traject` int(11) NOT NULL,
  `Id_user` int(11) NOT NULL,
  `point1_traject` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `point2_traject` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `point3_traject` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timeToTravel` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_traject`),
  KEY `Id_user` (`Id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `trajects`
--

INSERT INTO `trajects` (`id_traject`, `start_traject`, `end_traject`, `date_traject`, `hour_traject`, `numplace_traject`, `placerest_traject`, `type_traject`, `Id_user`, `point1_traject`, `point2_traject`, `point3_traject`, `timeToTravel`) VALUES
(7, 'Société fromagère de Lons-le-Saunier (Lactalis), 39 Avenue Camille Prost, 39000 Lons-le-Saunier, France', '2 Route De Montaigu, 39000 Lons-le-Saunier, France', '2022-10-13', '01:52:00', 8, 8, 1, 3, '5', NULL, NULL, NULL),
(4, '10110 Poligny, Aube, France', '13 bis Avenue du Stade Municipal, 39000 Lons-le-Saunier, France', '2022-10-18', '21:12:00', 8, 8, 0, 2, '39190 Sainte-AgnÃ¨s, France', NULL, NULL, NULL),
(8, 'MÃ©tropole de Lyon, France', '13 bis Avenue du Stade Municipal, 39000 Lons-le-Saunier, France', '2022-10-22', '16:59:00', 5, 5, 0, 2, '47210 Parisot, France', NULL, NULL, NULL),
(9, '05500 Poligny, France', '2 Route De Montaigu, 39000 Lons-le-Saunier, France', '2022-10-13', '17:01:00', 8, 8, 1, 4, 'Lyon, MÃ©tropole de Lyon, France', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name_user` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nickname_user` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_user` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_user` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio_user` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_user` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `name_user`, `nickname_user`, `password_user`, `email_user`, `bio_user`, `img_user`) VALUES
(2, 'BENOIT', 'vincent', '$2y$10$7FbXQLyN0vvU5s3IdEovPOI/MdCYsMoASXHbMwq0VFJ/DWA8e04jO', 'vincent-benoit@outlook.fr', 'Je suis beau :)', 'html'),
(3, '22', 'Twentytwoo', '$2y$10$wHDvDl1gt5ef9D33poJih.wrh9puDQE4MRAchFabQqJ8n8Qs4kYuC', 'twentytwoosw@gmail.com', 'Salut, moi, c\'est Twentytwoo, je fais 22 cm ;)', 'cc'),
(4, 'tiana', 'tiana', '$2y$10$Y5x3xdn89CZRMjMjiHPX2OdHkqxiamLI8j/53MRU/zwYiWn/f.w.W', 'tiana@tiana', 'tiana la plus belle ', 'cc'),
(5, 'leo', 'leo', '$2y$10$n0KQT5dEVt.FPDYHv68mJOYW08xeo8jkYjpV0HbqBaC6V2gRL7PDm', 'loe@leo', 'LÃ©o le plus bel homme que j\'ai vu <3 ', 'cc'),
(6, 'alain', 'alain', '$2y$10$IBlPjKawl4KXSKUpg.iC3OsXjIT8WTfaS8eS5Sf84uEupq1c5oGrm', 'alain@alain', 'alain', 'cc');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
