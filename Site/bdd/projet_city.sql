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

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `codeCategorie` int(5) NOT NULL,
  `libelleCategorie` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codeCategorie`),
  KEY `codeCategorie` (`codeCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `nom` varchar(50) NOT NULL,
  `message` text,
  `date` date DEFAULT NULL,
  `codeProfile` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `codePays` int(5) NOT NULL,
  `libellePays` varchar(50) DEFAULT NULL,
  `libellePaysCourt` varchar(3) DEFAULT NULL,
  `fichier` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codePays`),
  KEY `codePays` (`codePays`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile` (
  `codeProfile` int(5) NOT NULL,
  `libelleProfile` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `quartier`;
CREATE TABLE IF NOT EXISTS `quartier` (
  `codeQuartier` int(5) NOT NULL,
  `libelleQuartier` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codeQuartier`),
  KEY `codeQuartier` (`codeQuartier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `codeUser` int(5) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `passWord` varchar(255) DEFAULT NULL,
  `codeProfile` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`codeTopic`) REFERENCES `topic` (`codeTopic`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`codeProfile`) REFERENCES `profile` (`codeProfile`);
  ADD PRIMARY KEY (`codeMessage`),
  ADD KEY `codeMessage` (`codeMessage`),
  ADD KEY `codeTopic` (`codeTopic`),
  ADD KEY `codeProfile` (`codeProfile`);

ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`codeTopic`) REFERENCES `topic` (`codeTopic`);
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`codeProfile`) REFERENCES `profile` (`codeProfile`);
  ADD KEY `codeProfile` (`codeProfile`);

ALTER TABLE `monument`
  ADD CONSTRAINT `monument_ibfk_1` FOREIGN KEY (`codePays`) REFERENCES `pays` (`codePays`),
  ADD CONSTRAINT `monument_ibfk_2` FOREIGN KEY (`codeQuartier`) REFERENCES `quartier` (`codeQuartier`);

ALTER TABLE `restaurant`
  ADD CONSTRAINT `restaurant_ibfk_1` FOREIGN KEY (`codePays`) REFERENCES `pays` (`codePays`),
  ADD CONSTRAINT `restaurant_ibfk_2` FOREIGN KEY (`codeQuartier`) REFERENCES `quartier` (`codeQuartier`);

ALTER TABLE `topic`
  ADD CONSTRAINT `topic_ibfk_1` FOREIGN KEY (`codePays`) REFERENCES `pays` (`codePays`),
  ADD CONSTRAINT `topic_ibfk_2` FOREIGN KEY (`codeEtat`) REFERENCES `etattopic` (`codeEtat`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`codeUser`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `codeUser` (`codeUser`),
  ADD KEY `codeProfile` (`codeProfile`);