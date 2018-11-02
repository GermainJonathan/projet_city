-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 01 nov. 2018 à 16:09
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_city`
--

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

DROP TABLE IF EXISTS `activite`;
CREATE TABLE IF NOT EXISTS `activite` (
  `codeActivite` int(5) NOT NULL,
  `codePays` int(5) DEFAULT NULL,
  `codeQuartier` int(5) DEFAULT NULL,
  `codeCategorie` int(5) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `nomLieux` varchar(50) DEFAULT NULL,
  `coordonnees` point NOT NULL,
  `imageActivite` varchar(50) DEFAULT NULL,
  `commentaire` text,
  KEY `codePays` (`codePays`),
  KEY `codeQuartier` (`codeQuartier`),
  KEY `codeCategorie` (`codeCategorie`),
  SPATIAL KEY `coordonnees` (`coordonnees`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `activite`
--

INSERT INTO `activite` (`codeActivite`, `codePays`, `codeQuartier`, `codeCategorie`, `nom`, `nomLieux`, `coordonnees`, `imageActivite`, `commentaire`) VALUES
(1, 1, 1, 100, 'Le Musée des Tissus et des Arts Décoratifs', NULL, GeomFromText('POINT(45.7518938 4.8256525)'), '', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `codeCategorie` int(5) NOT NULL,
  `libelleCategorie` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codeCategorie`),
  KEY `codeCategorie` (`codeCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`codeCategorie`, `libelleCategorie`) VALUES
(100, 'Musée');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `codeCommentaire` int(5) NOT NULL,
  `codePays` int(5) DEFAULT NULL,
  `codeQuartier` int(5) DEFAULT NULL,
  `commentaire` text,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`codeCommentaire`),
  KEY `codeCommentaire` (`codeCommentaire`),
  KEY `codePays` (`codePays`),
  KEY `codeQuartier` (`codeQuartier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `etatTopic`
--

DROP TABLE IF EXISTS `etatTopic`;
CREATE TABLE IF NOT EXISTS `etatTopic` (
  `codeEtat` int(5) NOT NULL,
  `libelleEtat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codeEtat`),
  KEY `codeEtat` (`codeEtat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etatTopic`
--

INSERT INTO `etatTopic` (`codeEtat`, `libelleEtat`) VALUES
(1, 'En attente'),
(2, 'Valider'),
(3, 'Annuler');

-- --------------------------------------------------------

--
-- Structure de la table `histoire`
--

DROP TABLE IF EXISTS `histoire`;
CREATE TABLE IF NOT EXISTS `histoire` (
  `codeHistoire` int(5) NOT NULL,
  `codePays` int(5) NOT NULL,
  `codeQuartier` int(5) NOT NULL,
  `commentaire` text NOT NULL,
  PRIMARY KEY (`codeHistoire`),
  KEY `codeHistoire` (`codeHistoire`),
  KEY `codePays` (`codePays`),
  KEY `codeQuartier` (`codeQuartier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `codeMessage` int(5) NOT NULL,
  `codeTopic` int(5) DEFAULT NULL,
  `message` text,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`codeMessage`),
  KEY `codeMessage` (`codeMessage`),
  KEY `codeTopic` (`codeTopic`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`codeMessage`, `codeTopic`, `message`, `date`) VALUES
(1, 1, 'test message 1', '2018-09-28');

-- --------------------------------------------------------

--
-- Structure de la table `messagecontact`
--

DROP TABLE IF EXISTS `messagecontact`;
CREATE TABLE IF NOT EXISTS `messagecontact` (
  `codeMessage` int(5) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `objet` varchar(50) DEFAULT NULL,
  `message` text,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `monument`
--

DROP TABLE IF EXISTS `monument`;
CREATE TABLE IF NOT EXISTS `monument` (
  `codeMonument` int(5) NOT NULL,
  `codePays` int(5) DEFAULT NULL,
  `codeQuartier` int(5) DEFAULT NULL,
  `libelleMonument` varchar(50) DEFAULT NULL,
  `imageMonument` varchar(50) DEFAULT NULL,
  `coordonnees` point NOT NULL,
  `dateConstruction` date DEFAULT NULL,
  `architecte` varchar(50) DEFAULT NULL,
  `commentaire` text,
  PRIMARY KEY (`codeMonument`),
  KEY `codeMonument` (`codeMonument`),
  KEY `codePays` (`codePays`),
  KEY `codeQuartier` (`codeQuartier`),
  SPATIAL KEY `coordonnees` (`coordonnees`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `monument`
--

INSERT INTO `monument` (`codeMonument`, `codePays`, `codeQuartier`, `libelleMonument`, `imageMonument`, `coordonnees`, `dateConstruction`, `architecte`, `commentaire`) VALUES
(1, 1, 3, 'Hôtel de ville de Lyon', 'assets\\images\\terreaux\\hotel-de-ville-lyon-1.jpg', GeomFromText('POINT(45.7677074 4.828135800000041)'), '1672-01-01', 'Simon Maupin', NULL),
(2, 1, 1, 'Statue de la République', 'assets\\images\\perrache\\statut-de-la-republique.jpg', GeomFromText('POINT(45.7508908 4.8259418)'), '1880-01-01', 'Victor-Auguste Blavette', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `codePays` int(5) NOT NULL,
  `libellePays` varchar(50) DEFAULT NULL,
  `libellePaysCourt` varchar(3) DEFAULT NULL,
  `fichier` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codePays`),
  KEY `codePays` (`codePays`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`codePays`, `libellePays`, `libellePaysCourt`, `fichier`) VALUES
(1, 'France', 'FR', '');

-- --------------------------------------------------------

--
-- Structure de la table `quartier`
--

DROP TABLE IF EXISTS `quartier`;
CREATE TABLE IF NOT EXISTS `quartier` (
  `codeQuartier` int(5) NOT NULL,
  `libelleQuartier` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codeQuartier`),
  KEY `codeQuartier` (`codeQuartier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `quartier`
--

INSERT INTO `quartier` (`codeQuartier`, `libelleQuartier`) VALUES
(1, 'Perrache'),
(2, 'Bellecour'),
(3, 'Terreaux');

-- --------------------------------------------------------

--
-- Structure de la table `restaurant`
--

DROP TABLE IF EXISTS `restaurant`;
CREATE TABLE IF NOT EXISTS `restaurant` (
  `codeRestaurant` int(5) NOT NULL,
  `codePays` int(5) DEFAULT NULL,
  `codeQuartier` int(5) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `numeroTelephone` varchar(20) DEFAULT NULL,
  `coordonnees` point NOT NULL,
  `imageRestaurant` varchar(50) DEFAULT NULL,
  `commentaire` text,
  KEY `codePays` (`codePays`),
  KEY `codeQuartier` (`codeQuartier`),
  SPATIAL KEY `coordonnees` (`coordonnees`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Structure de la table `topic`
--

DROP TABLE IF EXISTS `topic`;
CREATE TABLE IF NOT EXISTS `topic` (
  `codeTopic` int(5) NOT NULL,
  `codePays` int(5) DEFAULT NULL,
  `libelleTopic` varchar(50) DEFAULT NULL,
  `description` text,
  `codeEtat` int(5) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`codeTopic`),
  KEY `codeTopic` (`codeTopic`),
  KEY `codePays` (`codePays`),
  KEY `codeEtat` (`codeEtat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `topic`
--

INSERT INTO `topic` (`codeTopic`, `codePays`, `libelleTopic`, `description`, `codeEtat`, `date`) VALUES
(1, 1, 'test1', 'ceci est un test', 1, '2018-09-27'),
(2, 1, 'testSite', 'test depuis le site', 1, '2018-09-28');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `activite`
--
ALTER TABLE `activite`
  ADD CONSTRAINT `activite_ibfk_1` FOREIGN KEY (`codePays`) REFERENCES `pays` (`codePays`),
  ADD CONSTRAINT `activite_ibfk_2` FOREIGN KEY (`codeQuartier`) REFERENCES `quartier` (`codeQuartier`),
  ADD CONSTRAINT `activite_ibfk_3` FOREIGN KEY (`codeCategorie`) REFERENCES `categorie` (`codeCategorie`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`codePays`) REFERENCES `pays` (`codePays`),
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`codeQuartier`) REFERENCES `quartier` (`codeQuartier`);

--
-- Contraintes pour la table `histoire`
--
ALTER TABLE `histoire`
  ADD CONSTRAINT `histoire_ibfk_1` FOREIGN KEY (`codePays`) REFERENCES `pays` (`codePays`),
  ADD CONSTRAINT `histoire_ibfk_2` FOREIGN KEY (`codeQuartier`) REFERENCES `quartier` (`codeQuartier`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`codeTopic`) REFERENCES `topic` (`codeTopic`);

--
-- Contraintes pour la table `monument`
--
ALTER TABLE `monument`
  ADD CONSTRAINT `monument_ibfk_1` FOREIGN KEY (`codePays`) REFERENCES `pays` (`codePays`),
  ADD CONSTRAINT `monument_ibfk_2` FOREIGN KEY (`codeQuartier`) REFERENCES `quartier` (`codeQuartier`);

--
-- Contraintes pour la table `restaurant`
--
ALTER TABLE `restaurant`
  ADD CONSTRAINT `restaurant_ibfk_1` FOREIGN KEY (`codePays`) REFERENCES `pays` (`codePays`),
  ADD CONSTRAINT `restaurant_ibfk_2` FOREIGN KEY (`codeQuartier`) REFERENCES `quartier` (`codeQuartier`);

--
-- Contraintes pour la table `topic`
--
ALTER TABLE `topic`
  ADD CONSTRAINT `topic_ibfk_1` FOREIGN KEY (`codePays`) REFERENCES `pays` (`codePays`),
  ADD CONSTRAINT `topic_ibfk_2` FOREIGN KEY (`codeEtat`) REFERENCES `etattopic` (`codeEtat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
