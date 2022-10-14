-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 14 oct. 2022 à 14:57
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_note_de_frais`
--
CREATE DATABASE IF NOT EXISTS `gestion_note_de_frais` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `gestion_note_de_frais`;

-- --------------------------------------------------------

--
-- Structure de la table `ligne_fc`
--

DROP TABLE IF EXISTS `ligne_fc`;
CREATE TABLE IF NOT EXISTS `ligne_fc` (
  `Id_ndf_fc` int(20) NOT NULL AUTO_INCREMENT,
  `Montant` float NOT NULL,
  `Justificatif` varchar(20) NOT NULL,
  PRIMARY KEY (`Id_ndf_fc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ligne_fk`
--

DROP TABLE IF EXISTS `ligne_fk`;
CREATE TABLE IF NOT EXISTS `ligne_fk` (
  `Id_ndf_fk` int(20) NOT NULL AUTO_INCREMENT,
  `Montant` float NOT NULL,
  `Justificatif` varchar(20) NOT NULL,
  PRIMARY KEY (`Id_ndf_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `note_de_frais`
--

DROP TABLE IF EXISTS `note_de_frais`;
CREATE TABLE IF NOT EXISTS `note_de_frais` (
  `Id` int(20) NOT NULL AUTO_INCREMENT,
  `Montant` float DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `Date_ndf` varchar(20) DEFAULT NULL,
  `Id_utilisateur` int(20) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `Id_utilisateur` (`Id_utilisateur`),
  KEY `Status` (`Status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `Id` int(20) NOT NULL AUTO_INCREMENT,
  `Libelle` varchar(20) NOT NULL,
  PRIMARY KEY (`Id`,`Libelle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `Id` int(20) NOT NULL AUTO_INCREMENT,
  `Mat` int(20) NOT NULL,
  `Nom` varchar(20) DEFAULT NULL,
  `Prenom` varchar(20) DEFAULT NULL,
  `Mail` varchar(20) DEFAULT NULL,
  `Login` varchar(20) DEFAULT NULL,
  `Mdp` varchar(20) DEFAULT NULL,
  `Admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Id`,`Mat`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`Id`, `Mat`, `Nom`, `Prenom`, `Mail`, `Login`, `Mdp`, `Admin`) VALUES
(1, 6448723, 'Pignion', 'Louis', 'Louis@Pignion.fr', 'login', 'mdp', 1);

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

DROP TABLE IF EXISTS `vehicule`;
CREATE TABLE IF NOT EXISTS `vehicule` (
  `Id` int(20) NOT NULL AUTO_INCREMENT,
  `Marque` varchar(20) NOT NULL,
  `Modele` varchar(20) NOT NULL,
  `Carburant` varchar(20) NOT NULL,
  `Cylindre` varchar(20) NOT NULL,
  `Mat_utilisateur` varchar(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `note_de_frais`
--
ALTER TABLE `note_de_frais`
  ADD CONSTRAINT `note_de_frais_ibfk_1` FOREIGN KEY (`Id_utilisateur`) REFERENCES `utilisateur` (`Id`),
  ADD CONSTRAINT `note_de_frais_ibfk_2` FOREIGN KEY (`Id`) REFERENCES `ligne_fc` (`Id_ndf_fc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
