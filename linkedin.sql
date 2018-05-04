-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 04 mai 2018 à 15:33
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `linkedin`
--

-- --------------------------------------------------------

--
-- Structure de la table `aimer`
--

DROP TABLE IF EXISTS `aimer`;
CREATE TABLE IF NOT EXISTS `aimer` (
  `ID_aimer` int(10) NOT NULL AUTO_INCREMENT,
  `ID_user` int(10) NOT NULL,
  `ID_post` int(10) NOT NULL,
  PRIMARY KEY (`ID_aimer`),
  KEY `ID_post` (`ID_post`),
  KEY `ID_user` (`ID_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `aimer`
--

INSERT INTO `aimer` (`ID_aimer`, `ID_user`, `ID_post`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `ID_commentaire` int(10) NOT NULL AUTO_INCREMENT,
  `ID_user` int(10) NOT NULL,
  `ID_post` int(10) NOT NULL,
  `Contenu` text NOT NULL,
  PRIMARY KEY (`ID_commentaire`),
  KEY `ID_post` (`ID_post`),
  KEY `ID_user` (`ID_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`ID_commentaire`, `ID_user`, `ID_post`, `Contenu`) VALUES
(1, 3, 1, 'J\'adore ce que tu fais ma cherai');

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

DROP TABLE IF EXISTS `connexion`;
CREATE TABLE IF NOT EXISTS `connexion` (
  `ID_connexion` int(100) NOT NULL AUTO_INCREMENT,
  `ID_user_1` int(10) NOT NULL,
  `ID_user_2` int(10) NOT NULL,
  `DateConnexion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_connexion`),
  KEY `ID_user_1` (`ID_user_1`),
  KEY `ID_user_2` (`ID_user_2`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `connexion`
--

INSERT INTO `connexion` (`ID_connexion`, `ID_user_1`, `ID_user_2`, `DateConnexion`) VALUES
(5, 2, 1, '2018-05-03 15:07:36'),
(9, 2, 7, '2018-05-04 13:27:23'),
(10, 7, 8, '2018-05-04 13:33:26'),
(11, 3, 2, '2018-05-04 15:33:21');

-- --------------------------------------------------------

--
-- Structure de la table `demandeconnexion`
--

DROP TABLE IF EXISTS `demandeconnexion`;
CREATE TABLE IF NOT EXISTS `demandeconnexion` (
  `ID_demandeConnexion` int(10) NOT NULL AUTO_INCREMENT,
  `ID_expediteur` int(10) NOT NULL,
  `ID_destinataire` int(10) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_demandeConnexion`),
  KEY `ID_destinataire` (`ID_destinataire`),
  KEY `ID_expediteur` (`ID_expediteur`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `description`
--

DROP TABLE IF EXISTS `description`;
CREATE TABLE IF NOT EXISTS `description` (
  `ID_description` int(10) NOT NULL AUTO_INCREMENT,
  `ID_user` int(10) NOT NULL,
  `Description` text NOT NULL,
  `CV` text NOT NULL,
  `PhotoProfil` varchar(30) NOT NULL,
  `ImageFond` varchar(30) NOT NULL,
  `ModeVisibilite` int(3) NOT NULL,
  PRIMARY KEY (`ID_description`),
  KEY `ID_user` (`ID_user`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `description`
--

INSERT INTO `description` (`ID_description`, `ID_user`, `Description`, `CV`, `PhotoProfil`, `ImageFond`, `ModeVisibilite`) VALUES
(1, 1, 'Jeune etudiant', 'cv.pdf', 'imageProfilAlexis.jpg', 'imageBackgroundAlexis.jpg', 0),
(2, 2, 'Jeune etudiant', 'CV', 'imageProfilBenjamin.jpg', 'imageBackgroundDefault', 0),
(3, 3, 'Jeune Ã©tudiant', 'Accueil.css', 'imageProfilPierre.jpg', 'imageBackgroundDefault.jpg', 0),
(8, 7, '', '', 'imageProfilDefault.jpg', 'imageBackgroundDefault.jpg', 0),
(9, 8, '', '', 'imageProfilDefault.jpg', 'imageBackgroundDefault.jpg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `ID_evenement` int(10) NOT NULL AUTO_INCREMENT,
  `ID_post` int(10) NOT NULL,
  `Nom` varchar(30) NOT NULL,
  `Lieu` varchar(30) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`ID_evenement`),
  KEY `ID_post` (`ID_post`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`ID_evenement`, `ID_post`, `Nom`, `Lieu`, `Date`) VALUES
(1, 1, 'Soirée pour fêter ma vidéo', 'Saint-Cloud', '2018-04-12');

-- --------------------------------------------------------

--
-- Structure de la table `experience`
--

DROP TABLE IF EXISTS `experience`;
CREATE TABLE IF NOT EXISTS `experience` (
  `ID_experience` int(10) NOT NULL AUTO_INCREMENT,
  `ID_user` int(10) NOT NULL,
  `TypeExperience` varchar(30) NOT NULL,
  `Entreprise` varchar(30) NOT NULL,
  `DateArrive` date NOT NULL,
  `DateFin` date NOT NULL,
  `Localisation` varchar(30) NOT NULL,
  `Commentaires` text NOT NULL,
  PRIMARY KEY (`ID_experience`),
  KEY `ID_user` (`ID_user`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `experience`
--

INSERT INTO `experience` (`ID_experience`, `ID_user`, `TypeExperience`, `Entreprise`, `DateArrive`, `DateFin`, `Localisation`, `Commentaires`) VALUES
(1, 1, 'Stage', 'Citee des sciences', '2018-04-11', '2018-04-12', 'Paris', 'Robotique');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

DROP TABLE IF EXISTS `formation`;
CREATE TABLE IF NOT EXISTS `formation` (
  `ID_formation` int(10) NOT NULL AUTO_INCREMENT,
  `ID_user` int(10) NOT NULL,
  `NomEcole` varchar(100) NOT NULL,
  `TypeFormation` varchar(100) NOT NULL,
  `DateArrive` date NOT NULL,
  `DateFin` date NOT NULL,
  `Commentaire` text NOT NULL,
  PRIMARY KEY (`ID_formation`),
  KEY `ID_user` (`ID_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`ID_formation`, `ID_user`, `NomEcole`, `TypeFormation`, `DateArrive`, `DateFin`, `Commentaire`) VALUES
(1, 1, 'ECE Paris', 'Formation ecole ingenieur', '2015-04-30', '2020-04-30', 'Ecole post bac formation generaliste');

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `ID_media` int(10) NOT NULL AUTO_INCREMENT,
  `ID_post` int(10) NOT NULL,
  `NomFichier` varchar(30) NOT NULL,
  `Lieu` varchar(30) NOT NULL,
  `Date` date NOT NULL,
  `Sensation` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_media`),
  KEY `ID_post` (`ID_post`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `media`
--

INSERT INTO `media` (`ID_media`, `ID_post`, `NomFichier`, `Lieu`, `Date`, `Sensation`) VALUES
(1, 1, '/tutoBeaute.mp4', 'Saint-Cloud', '2018-04-13', 'Extremement belle');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `ID_message` int(10) NOT NULL AUTO_INCREMENT,
  `ID_expediteur` int(10) NOT NULL,
  `ID_destinataire` int(10) NOT NULL,
  `Message` text NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_message`),
  KEY `ID_expediteur` (`ID_expediteur`,`ID_destinataire`),
  KEY `ID_destinataire` (`ID_destinataire`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

DROP TABLE IF EXISTS `offre`;
CREATE TABLE IF NOT EXISTS `offre` (
  `ID_offre` int(10) NOT NULL AUTO_INCREMENT,
  `ID_user_recruteur` int(10) NOT NULL,
  `ID_user_salarie` int(10) DEFAULT NULL,
  `Nom` varchar(30) NOT NULL,
  `Description` text NOT NULL,
  `Entreprise` varchar(30) NOT NULL,
  `Localisation` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_offre`),
  KEY `ID_user_recruteur` (`ID_user_recruteur`),
  KEY `ID_user_salarie` (`ID_user_salarie`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`ID_offre`, `ID_user_recruteur`, `ID_user_salarie`, `Nom`, `Description`, `Entreprise`, `Localisation`) VALUES
(1, 3, NULL, 'Architecture du batiment', 'Secteur immobilier', 'Pierre Co', 'Paris'),
(2, 2, NULL, 'Nettoyage sanitaire', 'Venez on est bien', 'Benjamin Co', 'Saint cloud'),
(3, 1, NULL, 'Assistant', 'Assistant dans le domaine de la finance et bigdata', 'Alexis Co', 'Paris');

-- --------------------------------------------------------

--
-- Structure de la table `partage`
--

DROP TABLE IF EXISTS `partage`;
CREATE TABLE IF NOT EXISTS `partage` (
  `ID_partage` int(10) NOT NULL AUTO_INCREMENT,
  `ID_post` int(10) NOT NULL,
  `ID_user` int(10) NOT NULL,
  `DatePartage` date NOT NULL,
  PRIMARY KEY (`ID_partage`),
  KEY `ID_post` (`ID_post`),
  KEY `ID_user` (`ID_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `partage`
--

INSERT INTO `partage` (`ID_partage`, `ID_post`, `ID_user`, `DatePartage`) VALUES
(1, 1, 2, '2018-04-30');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `ID_post` int(10) NOT NULL AUTO_INCREMENT,
  `ID_user` int(10) NOT NULL,
  `Contenu` text NOT NULL,
  `DatePublication` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Lieu` varchar(30) NOT NULL,
  `ModeVisibilite` int(3) NOT NULL,
  PRIMARY KEY (`ID_post`),
  KEY `ID_user` (`ID_user`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`ID_post`, `ID_user`, `Contenu`, `DatePublication`, `Lieu`, `ModeVisibilite`) VALUES
(20, 7, '<div style=\"width : 400px;\"><p style=\"text-align : center;\">Bonjour, je suis Richard Pastel!</p></div>', '2018-05-04 15:34:37', 'Paris', 0),
(21, 8, '<div style=\"width : 400px;\"><p style=\"text-align : center;\">Et moi Jacques Boulon!</p></div>', '2018-05-04 15:34:54', 'Paris', 0),
(22, 2, '<div style=\"width : 400px;\"><p style=\"text-align : center;\">Nouvelle photo de profil:</p><img src=imageProfilBenjamin.jpg alt=\"\" height=\"200\" width\"220\" style=\"margin-left : 50px;\"/></div>', '2018-05-04 15:35:28', 'Paris', 0),
(23, 3, '<div style=\"width : 400px;\"><p style=\"text-align : center;\">Cher rÃ©seau, je recherche un stage pour cet Ã©tÃ© dans le domaine de l ingenierie</p></div>', '2018-05-04 15:36:10', 'Paris', 0),
(24, 1, '<div style=\"width : 400px;\"><p style=\"text-align : center;\">Recherche assistant dans la finance, voir la section Emploi</p></div>', '2018-05-04 15:42:38', 'Paris', 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID_user` int(10) NOT NULL AUTO_INCREMENT,
  `Prenom` varchar(30) NOT NULL,
  `Nom` varchar(30) NOT NULL,
  `DateNaissance` date NOT NULL,
  `Mail` varchar(50) NOT NULL,
  `MotDePasse` varchar(30) NOT NULL,
  `DroitsAdmins` varchar(3) NOT NULL DEFAULT 'NON',
  PRIMARY KEY (`ID_user`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID_user`, `Prenom`, `Nom`, `DateNaissance`, `Mail`, `MotDePasse`, `DroitsAdmins`) VALUES
(1, 'Alexis', 'Butin', '1997-05-14', 'alexis.butin@edu.ece.fr', 'abutin', 'NON'),
(2, 'Benjamin', 'Chardin', '1997-01-01', 'benjamin.chardin@edu.ece.fr', 'bchardin', 'NON'),
(3, 'Pierre', 'Mouli-Castillo', '1997-01-01', 'pierre.mouli-castillo@edu.ece.fr', 'pmoulicastillo', 'OUI'),
(7, 'Richard', 'Pastel', '2018-05-01', 'rp@rp.fr', 'rp', 'NON'),
(8, 'Jacques', 'Boulon', '2018-05-01', 'jb@jb.fr', 'jb', 'NON');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `connexion`
--
ALTER TABLE `connexion`
  ADD CONSTRAINT `connexion_ibfk_1` FOREIGN KEY (`ID_user_1`) REFERENCES `utilisateur` (`ID_user`),
  ADD CONSTRAINT `connexion_ibfk_2` FOREIGN KEY (`ID_user_2`) REFERENCES `utilisateur` (`ID_user`);

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`ID_user`) REFERENCES `utilisateur` (`ID_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
