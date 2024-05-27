-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 27 mai 2024 à 13:27
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_piscine`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `ID_Admin` int NOT NULL AUTO_INCREMENT,
  `email_Admin` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Prenom_Admin` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Nom_Admin` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `MDP_Admin` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `CV_Admin` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Photo_Admin` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Specialite_Admin` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`ID_Admin`),
  KEY `ID_Admin` (`ID_Admin`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `agenda_agent`
--

DROP TABLE IF EXISTS `agenda_agent`;
CREATE TABLE IF NOT EXISTS `agenda_agent` (
  `ID_Agenda` int NOT NULL AUTO_INCREMENT,
  `ID_Agent` int UNSIGNED NOT NULL,
  `ID_RDV` int NOT NULL,
  `ID_Propriete` int NOT NULL,
  PRIMARY KEY (`ID_Agenda`),
  KEY `ID_Agent` (`ID_Agent`,`ID_RDV`,`ID_Propriete`),
  KEY `ID_Agenda` (`ID_Agenda`),
  KEY `ID_Agenda_2` (`ID_Agenda`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `agent`
--

DROP TABLE IF EXISTS `agent`;
CREATE TABLE IF NOT EXISTS `agent` (
  `ID_Agent` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `email_Agent` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Prenom_Agent` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Nom_Agent` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `MDP_Agent` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `CV_Agent` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Photo_Agent` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Specialite_Agent` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`ID_Agent`),
  KEY `ID_Agent` (`ID_Agent`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `bank`
--

DROP TABLE IF EXISTS `bank`;
CREATE TABLE IF NOT EXISTS `bank` (
  `ID_Bank` int NOT NULL AUTO_INCREMENT,
  `Carte_Bank` int NOT NULL,
  `Numero_Bank` int NOT NULL,
  `Nom_Bank` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Expiration_Bank` date NOT NULL,
  `Code_Bank` int NOT NULL,
  PRIMARY KEY (`ID_Bank`),
  KEY `ID_Bank` (`ID_Bank`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `ID_Client` int NOT NULL AUTO_INCREMENT,
  `email_Client` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Prenom_Client` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Nom_Client` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `MDP_Client` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Adresse_Client` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Ville_Client` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `CP_Client` int NOT NULL,
  `Pays_Client` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Tel_Client` int NOT NULL,
  PRIMARY KEY (`ID_Client`),
  KEY `ID_Client` (`ID_Client`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `propriete`
--

DROP TABLE IF EXISTS `propriete`;
CREATE TABLE IF NOT EXISTS `propriete` (
  `ID_Propriete` int NOT NULL AUTO_INCREMENT,
  `Adresse_Propriete` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Ville_Propriete` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `CP_Propriete` int NOT NULL,
  `Pays_Propriete` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Description_Propriete` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Types_Propriete` int NOT NULL,
  `Prix_Propriete` int NOT NULL,
  `Vendu` int NOT NULL,
  `Chambre_Propriete` int NOT NULL,
  `SDB_Propriete` int NOT NULL,
  `Taille_Propriete` float NOT NULL,
  `Pieces_Propriete` int NOT NULL,
  `Etage_Propriete` int NOT NULL,
  `Balcon_Propriete` int NOT NULL,
  `Parking_Propriete` int NOT NULL,
  PRIMARY KEY (`ID_Propriete`),
  KEY `ID_Propriete` (`ID_Propriete`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `prop_photo`
--

DROP TABLE IF EXISTS `prop_photo`;
CREATE TABLE IF NOT EXISTS `prop_photo` (
  `ID_photo` int NOT NULL AUTO_INCREMENT,
  `ID_Propriete` int NOT NULL,
  `Prop_photo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`ID_photo`),
  KEY `ID_Propriete` (`ID_Propriete`),
  KEY `ID_photo` (`ID_photo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

DROP TABLE IF EXISTS `rdv`;
CREATE TABLE IF NOT EXISTS `rdv` (
  `ID_RDV` int NOT NULL AUTO_INCREMENT,
  `Heure_RDV` int NOT NULL,
  `Jour_RDV` int NOT NULL,
  `Mois_RDV` int NOT NULL,
  `Annee_RDV` int NOT NULL,
  PRIMARY KEY (`ID_RDV`),
  KEY `ID_RDV` (`ID_RDV`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
