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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `activite` (`codeActivite`, `codePays`, `codeQuartier`, `codeCategorie`, `nom`, `nomLieux`, `coordonnees`, `imageActivite`, `commentaire`) VALUES
(1, 1, 1, 100, 'Le Musée des Tissus et des Arts Décoratifs', NULL, GeomFromText('POINT(45.7518938 4.8256525)'), '', NULL);

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `codeCategorie` int(5) NOT NULL,
  `libelleCategorie` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codeCategorie`),
  KEY `codeCategorie` (`codeCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `categorie` (`codeCategorie`, `libelleCategorie`) VALUES
(100, 'Musée');

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

DROP TABLE IF EXISTS `etatTopic`;
CREATE TABLE IF NOT EXISTS `etatTopic` (
  `codeEtat` int(5) NOT NULL,
  `libelleEtat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codeEtat`),
  KEY `codeEtat` (`codeEtat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `etatTopic` (`codeEtat`, `libelleEtat`) VALUES
(1, 'En attente'),
(2, 'Valider'),
(3, 'Annuler');

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

INSERT INTO `message` (`codeMessage`, `codeTopic`, `message`, `date`) VALUES
(1, 1, 'test message 1', '2018-09-28');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


INSERT INTO `monument` (`codeMonument`, `codePays`, `codeQuartier`, `libelleMonument`, `imageMonument`, `coordonnees`, `dateConstruction`, `architecte`, `commentaire`) VALUES
(1, 1, 3, 'Hôtel de ville de Lyon', 'assets\\images\\terreaux\\hotel-de-ville-lyon-1.jpg', GeomFromText('POINT(45.7677074 4.828135800000041)'), '1672-01-01', 'Simon Maupin', NULL),
(2, 1, 1, 'Statue de la République', 'assets\\images\\perrache\\statut-de-la-republique.jpg', GeomFromText('POINT(45.7508908 4.8259418)'), '1880-01-01', 'Victor-Auguste Blavette', NULL);

DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `codePays` int(5) NOT NULL,
  `libellePays` varchar(50) DEFAULT NULL,
  `libellePaysCourt` varchar(3) DEFAULT NULL,
  `fichier` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codePays`),
  KEY `codePays` (`codePays`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `pays` (`codePays`, `libellePays`, `libellePaysCourt`, `fichier`) VALUES
(1, 'France', 'FR', '');

DROP TABLE IF EXISTS `quartier`;
CREATE TABLE IF NOT EXISTS `quartier` (
  `codeQuartier` int(5) NOT NULL,
  `libelleQuartier` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codeQuartier`),
  KEY `codeQuartier` (`codeQuartier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `quartier` (`codeQuartier`, `libelleQuartier`) VALUES
(1, 'Perrache'),
(2, 'Bellecour'),
(3, 'Terreaux');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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


INSERT INTO `topic` (`codeTopic`, `codePays`, `libelleTopic`, `description`, `codeEtat`, `date`) VALUES
(1, 1, 'test1', 'ceci est un test', 1, '2018-09-27'),
(2, 1, 'testSite', 'test depuis le site', 1, '2018-09-28');

ALTER TABLE `activite`
  ADD CONSTRAINT `activite_ibfk_1` FOREIGN KEY (`codePays`) REFERENCES `pays` (`codePays`),
  ADD CONSTRAINT `activite_ibfk_2` FOREIGN KEY (`codeQuartier`) REFERENCES `quartier` (`codeQuartier`),
  ADD CONSTRAINT `activite_ibfk_3` FOREIGN KEY (`codeCategorie`) REFERENCES `categorie` (`codeCategorie`);

ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`codePays`) REFERENCES `pays` (`codePays`),
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`codeQuartier`) REFERENCES `quartier` (`codeQuartier`);

ALTER TABLE `histoire`
  ADD CONSTRAINT `histoire_ibfk_1` FOREIGN KEY (`codePays`) REFERENCES `pays` (`codePays`),
  ADD CONSTRAINT `histoire_ibfk_2` FOREIGN KEY (`codeQuartier`) REFERENCES `quartier` (`codeQuartier`);

ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`codeTopic`) REFERENCES `topic` (`codeTopic`);

ALTER TABLE `monument`
  ADD CONSTRAINT `monument_ibfk_1` FOREIGN KEY (`codePays`) REFERENCES `pays` (`codePays`),
  ADD CONSTRAINT `monument_ibfk_2` FOREIGN KEY (`codeQuartier`) REFERENCES `quartier` (`codeQuartier`);

ALTER TABLE `restaurant`
  ADD CONSTRAINT `restaurant_ibfk_1` FOREIGN KEY (`codePays`) REFERENCES `pays` (`codePays`),
  ADD CONSTRAINT `restaurant_ibfk_2` FOREIGN KEY (`codeQuartier`) REFERENCES `quartier` (`codeQuartier`);

ALTER TABLE `topic`
  ADD CONSTRAINT `topic_ibfk_1` FOREIGN KEY (`codePays`) REFERENCES `pays` (`codePays`),
  ADD CONSTRAINT `topic_ibfk_2` FOREIGN KEY (`codeEtat`) REFERENCES `etattopic` (`codeEtat`);