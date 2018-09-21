-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 31 Octobre 2017 à 08:52
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `iut`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE `categorie`;

CREATE TABLE `categorie` (
  `catID` int(2) NOT NULL,
  `nomCat` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`catID`, `nomCat`) VALUES
(1, 'Animaux'),
(2, 'Repas'),
(3, 'Monuments');

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

DROP TABLE `photo`;

CREATE TABLE `photo` (
  `photoID` int(2) NOT NULL,
  `nomFiche` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `catID` int(2) DEFAULT NULL,
  `userID` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `photo`
--

INSERT INTO `photo` (`photoID`, `nomFiche`, `description`, `catID`, `userID`) VALUES
(1, 'DSC00001.jpg', 'Une perruche en cage', 1, NULL),
(5, 'DSC00005.jpg', 'Un plateau télé', 2, NULL),
(2, 'DSC00002.jpg', 'Un chien en laisse', 1, NULL),
(3, 'DSC00003.jpg', 'Un canard dans l\'eau', 1, NULL),
(4, 'DSC00004.jpg', 'Une chèvre dans un pré', 1, NULL),
(6, 'DSC00006.jpg', 'Quelque chose de sculpté', 3, NULL),
(7, 'DSC00007.jpg', 'Un monument lointain', 3, NULL),
(8, 'DSC00008.jpg', 'Un monument très très loin', 3, NULL),
(9, 'DSC00009.jpg', 'Un monument vu d\'en bas', 3, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `userID` int(2) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `mail` varchar(50) NOT NULL,
  `motdepasse` varchar(50) DEFAULT NULL,
  `nbphotoupload` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`userID`, `prenom`, `nom`, `mail`, `motdepasse`, `nbphotoupload`) VALUES
(1, 'paul', 'poupet', 'paulpoupet@atilog.com', '7e9ddb82d5f8df761ed64708d5cf7b0818d2f33b', 7);
INSERT INTO `user` (`userID`, `prenom`, `nom`, `mail`, `motdepasse`, `nbphotoupload`) VALUES (2, 'gab', 'bailly', 'gab.bailly@gmail.com', 'cc513a04b54f0aef4d51df9810183c1d9aeac58d', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`catID`),
  ADD KEY `catID` (`catID`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`photoID`),
  ADD KEY `photoID` (`photoID`),
  ADD KEY `fk_userID` (`userID`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
