-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  lun. 24 sep. 2018 à 15:04
-- Version du serveur :  10.1.35-MariaDB
-- Version de PHP :  7.2.9

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

CREATE TABLE `activite` (
  `codeActivte` int(5) NOT NULL,
  `codePays` int(5) DEFAULT NULL,
  `codeQuartier` int(5) DEFAULT NULL,
  `codeCategorie` int(5) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `nomLieux` varchar(50) DEFAULT NULL,
  `commentaire` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `codeCategorie` int(5) NOT NULL,
  `libelleCategorie` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `codeCommentaire` int(5) NOT NULL,
  `codePays` int(5) DEFAULT NULL,
  `codeQuartier` int(5) DEFAULT NULL,
  `commentaire` text,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `etatTopic`
--

CREATE TABLE `etatTopic` (
  `codeEtat` int(5) NOT NULL,
  `libelleEtat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `histoire`
--

CREATE TABLE `histoire` (
  `codeHistoire` int(5) NOT NULL,
  `codePays` int(5) NOT NULL,
  `codeQuartier` int(5) NOT NULL,
  `commentaire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `codeMessage` int(5) NOT NULL,
  `codeTopic` int(5) DEFAULT NULL,
  `message` text,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `monument`
--

CREATE TABLE `monument` (
  `codeMonument` int(5) NOT NULL,
  `codePays` int(5) DEFAULT NULL,
  `codeQuartier` int(5) DEFAULT NULL,
  `libelleMonument` varchar(50) DEFAULT NULL,
  `imageMonument` varchar(50) DEFAULT NULL,
  `dateConstruction` date DEFAULT NULL,
  `architecte` varchar(50) DEFAULT NULL,
  `commentaire` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `codePays` int(5) NOT NULL,
  `libellePays` varchar(50) NOT NULL,
  `libellePaysCourt` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `quartier`
--

CREATE TABLE `quartier` (
  `codeQuartier` int(5) NOT NULL,
  `libelleQuartier` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `restaurant`
--

CREATE TABLE `restaurant` (
  `codeRestaurant` int(5) NOT NULL,
  `codePays` int(5) DEFAULT NULL,
  `codeQuartier` int(5) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `numeroTelephone` varchar(20) DEFAULT NULL,
  `commentaire` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `topic`
--

CREATE TABLE `topic` (
  `codeTopic` int(5) NOT NULL,
  `codePays` int(5) DEFAULT NULL,
  `libelleTopic` int(50) DEFAULT NULL,
  `description` text,
  `codeEtat` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activite`
--
ALTER TABLE `activite`
  ADD KEY `codePays` (`codePays`),
  ADD KEY `codeQuartier` (`codeQuartier`),
  ADD KEY `codeCategorie` (`codeCategorie`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`codeCategorie`),
  ADD KEY `codeCategorie` (`codeCategorie`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`codeCommentaire`),
  ADD KEY `codeCommentaire` (`codeCommentaire`),
  ADD KEY `codePays` (`codePays`),
  ADD KEY `codeQuartier` (`codeQuartier`);

--
-- Index pour la table `etatTopic`
--
ALTER TABLE `etatTopic`
  ADD PRIMARY KEY (`codeEtat`),
  ADD KEY `codeEtat` (`codeEtat`);

--
-- Index pour la table `histoire`
--
ALTER TABLE `histoire`
  ADD PRIMARY KEY (`codeHistoire`),
  ADD KEY `codeHistoire` (`codeHistoire`),
  ADD KEY `codePays` (`codePays`),
  ADD KEY `codeQuartier` (`codeQuartier`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`codeMessage`),
  ADD KEY `codeMessage` (`codeMessage`),
  ADD KEY `codeTopic` (`codeTopic`);

--
-- Index pour la table `monument`
--
ALTER TABLE `monument`
  ADD PRIMARY KEY (`codeMonument`),
  ADD KEY `codeMonument` (`codeMonument`),
  ADD KEY `codePays` (`codePays`),
  ADD KEY `codeQuartier` (`codeQuartier`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`codePays`),
  ADD KEY `codePays` (`codePays`);

--
-- Index pour la table `quartier`
--
ALTER TABLE `quartier`
  ADD PRIMARY KEY (`codeQuartier`),
  ADD KEY `codeQuartier` (`codeQuartier`);

--
-- Index pour la table `restaurant`
--
ALTER TABLE `restaurant`
  ADD KEY `codePays` (`codePays`),
  ADD KEY `codeQuartier` (`codeQuartier`);

--
-- Index pour la table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`codeTopic`),
  ADD KEY `codeTopic` (`codeTopic`),
  ADD KEY `codePays` (`codePays`),
  ADD KEY `codeEtat` (`codeEtat`);

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
  ADD CONSTRAINT `topic_ibfk_2` FOREIGN KEY (`codeEtat`) REFERENCES `etatTopic` (`codeEtat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
