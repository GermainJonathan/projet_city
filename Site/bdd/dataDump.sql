INSERT INTO `pays` (`codePays`, `libellePays`, `libellePaysCourt`, `fichier`) VALUES
(1, 'France', 'FR', '');

INSERT INTO `etatTopic` (`codeEtat`, `libelleEtat`) VALUES
(1, 'En attente'),
(2, 'Valider'),
(3, 'Annuler');

INSERT INTO `quartier` (`codeQuartier`, `libelleQuartier`) VALUES
(1, 'Perrache'),
(2, 'Bellecour'),
(3, 'Terreaux');

INSERT INTO `profile` (`codeProfile`, `libelleProfile`) VALUES
(1, 'Administrateur'),
(2, 'Moderateur');

INSERT INTO `user` (`codeUser`, `nom`, `mail`, `login`, `passWord`, `codeProfile`) VALUES
(1, 'Administrateur', 'paulpoupet@atilog.com', 'Admin', '$2y$10$ZeBcxc/n7pY2syL5AUGMp.foh5Cx5IN7ZpO3WX4Ol/GKyycuChrXK', 1);

INSERT INTO `topic` (`codeTopic`, `codePays`, `libelleTopic`, `description`, `codeEtat`, `date`) VALUES
(1, 1, 'test1', 'ceci est un test', 1, '2018-09-27'),
(2, 1, 'testSite', 'test depuis le site', 1, '2018-09-28');

INSERT INTO `message` (`codeMessage`, `codeTopic`, `message`, `date`) VALUES
(1, 1, 'test message 1', '2018-09-28');

INSERT INTO `monument` (`codeMonument`, `codePays`, `codeQuartier`, `libelleMonument`, `imageMonument`, `coordonnees`, `dateConstruction`, `architecte`, `commentaire`) VALUES
(1, 1, 3, 'Hôtel de ville de Lyon', 'assets\\images\\terreaux\\hotel-de-ville-lyon-1.jpg', GeomFromText('POINT(45.7677074 4.828135800000041)'), '1672-01-01', 'Simon Maupin', NULL),
(2, 1, 1, 'Statue de la République', 'assets\\images\\perrache\\statut-de-la-republique.jpg', GeomFromText('POINT(45.7508908 4.828135800000041)'), '1880-01-01', 'Victor-Auguste Blavette', NULL);

INSERT INTO `categorie` (`codeCategorie`, `libelleCategorie`) VALUES
(100, 'Musée');

INSERT INTO `activite` (`codeActivite`, `codePays`, `codeQuartier`, `codeCategorie`, `nom`, `nomLieux`, `coordonnees`, `imageActivite`, `commentaire`) VALUES
(1, 1, 1, 100, 'Le Musée des Tissus et des Arts Décoratifs', NULL, GeomFromText('POINT(45.7518938 4.8256525)'), '', NULL);
