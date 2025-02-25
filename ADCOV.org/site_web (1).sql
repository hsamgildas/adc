-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 25 fév. 2025 à 09:04
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `site_web`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `idco` int NOT NULL AUTO_INCREMENT,
  `nomprenom` varchar(250) NOT NULL,
  `emailco` varchar(250) NOT NULL,
  `messageco` text NOT NULL,
  `dateenvo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idco`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`idco`, `nomprenom`, `emailco`, `messageco`, `dateenvo`) VALUES
(1, 'Ndayikeza melance', 'ndayimelance2@gmail.com', 'votre site est impecable', '2024-11-16 15:15:59'),
(2, '', '', '', '2024-11-16 16:59:57'),
(3, '', '', '', '2024-12-30 10:28:39'),
(4, '', '', '', '2024-12-30 10:28:43'),
(5, '', '', '', '2024-12-30 10:29:16');

-- --------------------------------------------------------

--
-- Structure de la table `droit`
--

DROP TABLE IF EXISTS `droit`;
CREATE TABLE IF NOT EXISTS `droit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user` varchar(250) NOT NULL,
  `menu_droit` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `droit`
--

INSERT INTO `droit` (`id`, `user`, `menu_droit`) VALUES
(41, 'mela', '3-0'),
(37, 'mela', '1-0'),
(38, 'mela', '1-1-0'),
(39, 'mela', '1-2-0'),
(18, 'Desire', '1-0'),
(42, 'mela', '4-0'),
(40, 'mela', '2-0'),
(43, 'mela', '5-0'),
(44, 'mela', '6-0'),
(45, 'Rukundo', '1-0'),
(46, 'Rukundo', '1-1-0'),
(47, 'Rukundo', '1-2-0'),
(48, 'Rukundo', '2-0'),
(49, 'Rukundo', '2-1-0'),
(50, 'Rukundo', '2-2-0'),
(51, 'Rukundo', '3-0'),
(52, 'Rukundo', '4-0'),
(53, 'Rukundo', '4-1-0'),
(54, 'Rukundo', '4-2-0'),
(55, 'Rukundo', '5-0'),
(56, 'Rukundo', '5-1-0'),
(57, 'Rukundo', '5-2-0'),
(58, 'Rukundo', '6-0'),
(59, 'Rukundo', '6-1-0'),
(60, 'Rukundo', '6-2-0');

-- --------------------------------------------------------

--
-- Structure de la table `logine`
--

DROP TABLE IF EXISTS `logine`;
CREATE TABLE IF NOT EXISTS `logine` (
  `idlo` int NOT NULL AUTO_INCREMENT,
  `userlo` varchar(250) NOT NULL,
  `passlo` text NOT NULL,
  PRIMARY KEY (`idlo`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `logine`
--

INSERT INTO `logine` (`idlo`, `userlo`, `passlo`) VALUES
(1, 'mela', '$2y$10$vPl4/xaduTE9AR.1MLdaueSnCwWaucYSXBtbUvu0gAmvHk3jxkTfy');

-- --------------------------------------------------------

--
-- Structure de la table `posting`
--

DROP TABLE IF EXISTS `posting`;
CREATE TABLE IF NOT EXISTS `posting` (
  `ids` int NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `nom_image` varchar(50) NOT NULL,
  `resume` text NOT NULL,
  `type_publication` varchar(3) NOT NULL,
  `status` int NOT NULL,
  `date_publication` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ids`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `posting`
--

INSERT INTO `posting` (`ids`, `titre`, `nom_image`, `resume`, `type_publication`, `status`, `date_publication`) VALUES
(1, 'L\'ADCOV à comme valeur : disponibilité,durabilité,', 'ag.jpg', 'Monde solidaire débarrasser de la pouvreté,dans lequel les femmes et les hommes défavorisés ont des ', '1', 1, '2025-01-10 10:54:40'),
(3, 'L\'ADCOV ', 'amd.jpg', 'Monde solidaire débarrasser de la pouvreté,dans lequel les femmes et les hommes défavorisés ont', '3', 1, '2025-01-10 10:58:47'),
(4, 'ADCOV', 'adm.jpg', 'Monde solidaire débarrasser de la pouvreté,dans lequel les femmes et les hommes défavorisés ont', '3', 1, '2025-01-10 11:00:10'),
(6, 'nonoui', 'ag.jpg', 'non', '2', 0, '2025-01-10 14:23:02'),
(7, 'teste', 'Capture.PNG', 'Monde solidaire débarrasser de la pouvreté,dans lequel les femmes et les hommes défavorisés ont\r\n', '1', 1, '2025-01-24 14:20:45'),
(8, 'tet 2', 'IMG-20250106-WA0000.jpg', 'L\'ADCOV à comme valeur : disponibilité,durabilité,', '1', 1, '2025-01-24 14:22:26'),
(9, 'test 4', 'agri (3).jpg,agri (4).jpg', 'Monde solidaire débarrasser de la pouvreté,dans lequel les femmes et les hommes défavorisés ont', '3', 1, '2025-01-25 08:24:59'),
(10, 'test 5', 'ag.jpg,agri.jpg', 'Monde solidaire débarrasser de la pouvreté,dans lequel les femmes et les hommes défavorisés ont', '1', 1, '2025-01-29 14:02:13'),
(11, 'sasa', 'agri.jpg', 'oui', '3', 1, '2025-02-07 13:42:08'),
(12, 'oui', 'ag.jpg,agri.jpg,elevages.jpg', 'nom', '3', 1, '2025-02-07 13:44:52'),
(13, 'oui oui', 'manioc.jpg', 'oui', '3', 1, '2025-02-07 19:56:26'),
(14, 'meme', 'agri.jpg', 'meme', '3', 1, '2025-02-07 20:11:07'),
(15, 'dodo', 'agris.jpg', 'dodo', '3', 1, '2025-02-07 20:18:24'),
(16, 'oui', 'ag.jpg', 'non', '2', 1, '2025-02-07 20:20:40'),
(17, 'oui', 'bg.jpg', 'oui', '2', 1, '2025-02-07 20:33:00'),
(18, 'sasa', 'agri.jpg', 'nono', '2', 1, '2025-02-07 20:33:38'),
(19, 'dodo', 'elevages.jpg', 'melance', '2', 0, '2025-02-07 20:45:58'),
(20, 'melance', 'vache.jpg', 'melance', '2', 0, '2025-02-07 20:48:32'),
(21, 'ouiiii', 'agris.jpg', 'non', '2', 0, '2025-02-07 20:51:07'),
(22, 'sasa', 'agri.jpg', 'ca va', '2', 0, '2025-02-07 20:51:45'),
(23, 'essai', 'Capture.PNG', 'passe', '2', 0, '2025-02-07 20:54:17'),
(24, 'ca va', 'agri.jpg', 'oui', '2', 0, '2025-02-07 20:55:05'),
(25, 'qui', 'agri.jpg', 'quoi', '2', 0, '2025-02-07 20:56:05'),
(26, 'oui', 'elevages.jpg', 'qui', '2', 0, '2025-02-07 20:58:48'),
(27, 'sawa', 'ag.jpg', 'ca va', '2', 0, '2025-02-07 21:07:04'),
(28, 'oui', 'agri.jpg', 'non', '3', 0, '2025-02-07 21:11:36'),
(29, 'oui', 'elevages.jpg', 'qui suis je?', '3', 0, '2025-02-07 21:19:13');

-- --------------------------------------------------------

--
-- Structure de la table `tauhenifiaion`
--

DROP TABLE IF EXISTS `tauhenifiaion`;
CREATE TABLE IF NOT EXISTS `tauhenifiaion` (
  `idprofil` int NOT NULL AUTO_INCREMENT,
  `idlo` int NOT NULL,
  `nom_prenom` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  PRIMARY KEY (`idprofil`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `tauhenifiaion`
--

INSERT INTO `tauhenifiaion` (`idprofil`, `idlo`, `nom_prenom`, `email`, `telephone`) VALUES
(1, 1, 'Ndayikeza Melance', 'ndayimelance2@gmail.com', '69696990'),
(2, 2, 'Ndikumana', 'desire2@gmail.com', '79980800'),
(3, 3, 'Rukundo Audrey', 'rukundo@gmail.com', '69067833');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
