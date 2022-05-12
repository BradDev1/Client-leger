-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : jeu. 12 mai 2022 à 14:03
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `fpec`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `prenom`, `login`, `mdp`) VALUES
(1, 'LesTechnicien', 'Admin', 'lt', '5f3acfbeb4f6fa5007dd1137ab1e96149af87281');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `type`) VALUES
(1, 'Pc fixe'),
(2, 'Pc portable'),
(3, 'Tablette'),
(4, 'Téléphone');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(20) DEFAULT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `telephone_fix` varchar(20) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `codepostal` varchar(100) DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id_client`, `status`, `nom`, `prenom`, `telephone`, `telephone_fix`, `adresse`, `codepostal`, `ville`, `email`) VALUES
(1, 'Abonné(e)', 'DE SUBERCASEAUX', 'Bradley', '07 00 00 00 00', '05 00 00 00 00', 'adresse test', '82300', 'Caussade', 'bradley@gmail.test');

-- --------------------------------------------------------

--
-- Structure de la table `contrat`
--

DROP TABLE IF EXISTS `contrat`;
CREATE TABLE IF NOT EXISTS `contrat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) DEFAULT NULL,
  `recuperation` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contrat`
--

INSERT INTO `contrat` (`id`, `type`, `recuperation`) VALUES
(1, 'Abonné(e)', 'Oui'),
(2, 'Pas abonné(e)', 'Non');

-- --------------------------------------------------------

--
-- Structure de la table `disque`
--

DROP TABLE IF EXISTS `disque`;
CREATE TABLE IF NOT EXISTS `disque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_materiel` int(11) DEFAULT NULL,
  `disque1` varchar(20) DEFAULT NULL,
  `disque2` varchar(20) DEFAULT NULL,
  `disque3` varchar(20) DEFAULT NULL,
  `disque4` varchar(20) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `format` varchar(50) DEFAULT NULL,
  `marque` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `capacite` varchar(50) DEFAULT NULL,
  `n_serie` varchar(50) DEFAULT NULL,
  `dure_vie` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `fiche_peg`
--

DROP TABLE IF EXISTS `fiche_peg`;
CREATE TABLE IF NOT EXISTS `fiche_peg` (
  `id_inter` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `status` varchar(30) DEFAULT NULL,
  `recup` varchar(20) DEFAULT NULL,
  `contrat` varchar(50) DEFAULT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `datee` varchar(20) NOT NULL,
  `heure` time NOT NULL,
  `type` varchar(50) NOT NULL,
  `marque` varchar(50) NOT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `symptome` text NOT NULL,
  `stockage` varchar(50) DEFAULT NULL,
  `stockage2` varchar(20) DEFAULT NULL,
  `taille` varchar(50) DEFAULT NULL,
  `taille2` varchar(50) DEFAULT NULL,
  `problemes` varchar(50) DEFAULT NULL,
  `nbr_ram` varchar(11) DEFAULT NULL,
  `nbr_go` varchar(11) DEFAULT NULL,
  `materiel` varchar(59) DEFAULT NULL,
  `system` varchar(950) DEFAULT NULL,
  `system2` varchar(50) DEFAULT NULL,
  `system3` varchar(50) DEFAULT NULL,
  `system4` varchar(50) DEFAULT NULL,
  `system5` varchar(50) DEFAULT NULL,
  `notes` varchar(59) DEFAULT NULL,
  `licence` varchar(25) DEFAULT NULL,
  `proposition` varchar(50) DEFAULT NULL,
  `proposition2` varchar(50) DEFAULT NULL,
  `proposition3` varchar(50) DEFAULT NULL,
  `proposition4` varchar(50) DEFAULT NULL,
  `proposition5` varchar(50) DEFAULT NULL,
  `devis` varchar(50) DEFAULT NULL,
  `prix` varchar(50) DEFAULT NULL,
  `prix2` varchar(50) DEFAULT NULL,
  `prix3` varchar(50) DEFAULT NULL,
  `prix4` varchar(50) DEFAULT NULL,
  `prix5` varchar(50) DEFAULT NULL,
  `intervention` varchar(50) DEFAULT NULL,
  `intervention2` varchar(50) DEFAULT NULL,
  `intervention3` varchar(50) DEFAULT NULL,
  `intervention4` varchar(50) DEFAULT NULL,
  `intervention5` varchar(50) DEFAULT NULL,
  `prix_inter` varchar(50) DEFAULT NULL,
  `prix_inter2` varchar(50) DEFAULT NULL,
  `prix_inter3` varchar(50) DEFAULT NULL,
  `prix_inter4` varchar(50) DEFAULT NULL,
  `prix_inter5` varchar(50) DEFAULT NULL,
  `total` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_inter`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fiche_peg`
--

INSERT INTO `fiche_peg` (`id_inter`, `id_client`, `status`, `recup`, `contrat`, `nom`, `prenom`, `telephone`, `datee`, `heure`, `type`, `marque`, `mdp`, `symptome`, `stockage`, `stockage2`, `taille`, `taille2`, `problemes`, `nbr_ram`, `nbr_go`, `materiel`, `system`, `system2`, `system3`, `system4`, `system5`, `notes`, `licence`, `proposition`, `proposition2`, `proposition3`, `proposition4`, `proposition5`, `devis`, `prix`, `prix2`, `prix3`, `prix4`, `prix5`, `intervention`, `intervention2`, `intervention3`, `intervention4`, `intervention5`, `prix_inter`, `prix_inter2`, `prix_inter3`, `prix_inter4`, `prix_inter5`, `total`) VALUES
(1, 1, 'A1 Réception', 'oui', 'Abonné(e)', 'DE SUBERCASEAUX', 'Bradley', '07 00 00 00 00', '12-05-2022', '15:47:46', 'Téléphone', 'Samsung', '0000', 'batterie HS', 'Carte SD', NULL, '60/64Go', NULL, NULL, 'Aucun', '8 GO', 'batterie hs | faut en commander une autre !', 'No Boot', 'Aucun blue screen', 'Aucune erreur', 'Aucune infection', 'Aucune lenteur', 'Batterie morte', NULL, 'Frais de pec', 'Aucune révision compléte', 'Révision partielle', 'Aucune récuperation de données', 'Aucun nettoyage physique', NULL, '29', ' ', '79', ' ', ' ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `intervention`
--

DROP TABLE IF EXISTS `intervention`;
CREATE TABLE IF NOT EXISTS `intervention` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proposition` varchar(50) DEFAULT NULL,
  `prix` varchar(50) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `intervention`
--

INSERT INTO `intervention` (`id`, `proposition`, `prix`, `status`) VALUES
(1, 'Frais de PEC', '29 €', 'A1 Réception'),
(2, 'Révision complète', '109 €', 'B1 Diag'),
(3, 'Révision partielle', '79 €', 'B2 Devis proposé'),
(4, 'Récupération de données', '60 €', 'C1 Intervention'),
(5, 'Nettoyage Physique', ' 60 €', 'C2 Terminé'),
(6, 'Aucun', 'Aucun', 'D1 Livraison'),
(7, '', '', 'D2');

-- --------------------------------------------------------

--
-- Structure de la table `ordinateur`
--

DROP TABLE IF EXISTS `ordinateur`;
CREATE TABLE IF NOT EXISTS `ordinateur` (
  `id_ordinateur` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `type` varchar(11) NOT NULL,
  `marque` varchar(50) NOT NULL,
  `n_serie` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `proc` varchar(50) DEFAULT NULL,
  `carte_graph` varchar(50) DEFAULT NULL,
  `disque_dur` varchar(50) DEFAULT NULL,
  `disque_dur2` varchar(20) DEFAULT NULL,
  `marquedc` varchar(50) DEFAULT NULL,
  `modeldc` varchar(50) DEFAULT NULL,
  `capacitedc` varchar(50) DEFAULT NULL,
  `formatdc` varchar(50) DEFAULT NULL,
  `n_seriedc` varchar(50) DEFAULT NULL,
  `duredc` varchar(50) DEFAULT NULL,
  `marquedc2` varchar(50) DEFAULT NULL,
  `modeldc2` varchar(50) DEFAULT NULL,
  `capacitedc2` varchar(50) DEFAULT NULL,
  `formatdc2` varchar(50) DEFAULT NULL,
  `n_seriedc2` varchar(50) DEFAULT NULL,
  `duredc2` varchar(50) DEFAULT NULL,
  `ram` varchar(50) DEFAULT NULL,
  `go` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_ordinateur`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ordinateur`
--

INSERT INTO `ordinateur` (`id_ordinateur`, `id_client`, `type`, `marque`, `n_serie`, `model`, `proc`, `carte_graph`, `disque_dur`, `disque_dur2`, `marquedc`, `modeldc`, `capacitedc`, `formatdc`, `n_seriedc`, `duredc`, `marquedc2`, `modeldc2`, `capacitedc2`, `formatdc2`, `n_seriedc2`, `duredc2`, `ram`, `go`) VALUES
(1, 1, 'Téléphone', 'Samsung', 'xxxxxxxxxxxxxxxxxx', 'A52', 'Snap dragon', NULL, 'Carte SD', NULL, NULL, NULL, '60/64Go', 'Aucun', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Aucun', '8 GO');

-- --------------------------------------------------------

--
-- Structure de la table `problemes`
--

DROP TABLE IF EXISTS `problemes`;
CREATE TABLE IF NOT EXISTS `problemes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `problemes`
--

INSERT INTO `problemes` (`id`, `type`) VALUES
(1, 'Aucun'),
(2, 'Erreurs'),
(3, 'Clusters'),
(4, 'Erreurs / Clusters');

-- --------------------------------------------------------

--
-- Structure de la table `ram`
--

DROP TABLE IF EXISTS `ram`;
CREATE TABLE IF NOT EXISTS `ram` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nbr_ram` varchar(11) DEFAULT NULL,
  `nbr_go` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ram`
--

INSERT INTO `ram` (`id`, `nbr_ram`, `nbr_go`) VALUES
(1, 'Aucun', 'Aucun'),
(2, '1', '2 GO'),
(3, '2', '4 GO'),
(4, '3', '6 GO'),
(5, '4', '8 GO'),
(6, '5', '16 GO'),
(7, '6', '32 GO'),
(8, '7', '64 GO'),
(9, '9', '128 GO'),
(10, '10', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `stockage`
--

DROP TABLE IF EXISTS `stockage`;
CREATE TABLE IF NOT EXISTS `stockage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `format` varchar(50) DEFAULT NULL,
  `marque` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `capacite` varchar(50) DEFAULT NULL,
  `n_serie` varchar(50) DEFAULT NULL,
  `dure_vie` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `stockage`
--

INSERT INTO `stockage` (`id`, `type`, `format`, `marque`, `model`, `capacite`, `n_serie`, `dure_vie`) VALUES
(1, 'Aucun', 'Aucun', NULL, NULL, 'Aucun', NULL, NULL),
(2, 'HDD', '2.5', NULL, NULL, '60/64Go', NULL, NULL),
(3, 'SDD', '3.5', NULL, NULL, '120/128Go', NULL, NULL),
(4, 'SSHD', 'M2', NULL, NULL, '240/250Go', NULL, NULL),
(8, 'Carte SD', NULL, NULL, NULL, '320Go', NULL, NULL),
(9, 'Micro SD', NULL, NULL, NULL, '480/500/512Go', NULL, NULL),
(10, NULL, NULL, NULL, NULL, '640Go', NULL, NULL),
(11, NULL, NULL, NULL, NULL, '750Go', NULL, NULL),
(12, NULL, NULL, NULL, NULL, '1000Go', NULL, NULL),
(13, NULL, NULL, NULL, NULL, '1500Go', NULL, NULL),
(14, NULL, NULL, NULL, NULL, '2000Go', NULL, NULL),
(15, NULL, NULL, NULL, NULL, '3000Go', NULL, NULL),
(16, NULL, NULL, NULL, NULL, '4000Go', NULL, NULL),
(17, NULL, NULL, NULL, NULL, '32Go', NULL, NULL),
(18, NULL, NULL, NULL, NULL, '16Go', NULL, NULL),
(19, NULL, NULL, NULL, NULL, '8Go', NULL, NULL),
(20, NULL, NULL, NULL, NULL, '4Go', NULL, NULL),
(21, NULL, NULL, NULL, NULL, '2Go', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `system`
--

DROP TABLE IF EXISTS `system`;
CREATE TABLE IF NOT EXISTS `system` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `problemes` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `system`
--

INSERT INTO `system` (`id`, `problemes`) VALUES
(1, 'Aucun'),
(3, 'No boot'),
(4, 'Blue Screen '),
(5, 'Erreurs '),
(6, ' Infections'),
(7, 'Lenteur');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
