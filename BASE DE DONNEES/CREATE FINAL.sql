-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 08 Mars 2013 à 10:53
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `survivalcamp`
--
CREATE DATABASE `survivalcamp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `survivalcamp`;

-- --------------------------------------------------------

--
-- Structure de la table `t_achat_sc`
--

CREATE TABLE IF NOT EXISTS `t_achat_sc` (
  `id_Achat_SC` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `T_Joueur_id_Joueur` int(10) unsigned NOT NULL,
  `date_Achat_SC` datetime NOT NULL,
  `montant_SC` int(10) unsigned NOT NULL,
  `montant_Euros` int(10) unsigned NOT NULL,
  `code_Validation` varchar(30) NOT NULL,
  PRIMARY KEY (`id_Achat_SC`),
  KEY `T_Joueur_id_Joueur` (`T_Joueur_id_Joueur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `t_amis`
--

CREATE TABLE IF NOT EXISTS `t_amis` (
  `T_Joueur_id_Joueur1` int(10) unsigned NOT NULL,
  `T_Joueur_id_Joueur2` int(10) unsigned NOT NULL,
  KEY `T_Joueur_id_Joueur1` (`T_Joueur_id_Joueur1`),
  KEY `T_Joueur_id_Joueur2` (`T_Joueur_id_Joueur2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_amis`
--

INSERT INTO `t_amis` (`T_Joueur_id_Joueur1`, `T_Joueur_id_Joueur2`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `t_carte`
--

CREATE TABLE IF NOT EXISTS `t_carte` (
  `id_Carte` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_Carte` varchar(30) NOT NULL,
  `url_Carte` varchar(255) NOT NULL,
  PRIMARY KEY (`id_Carte`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `t_carte`
--

INSERT INTO `t_carte` (`id_Carte`, `nom_Carte`, `url_Carte`) VALUES
(1, 'SuperCarte', 'map1.map');

-- --------------------------------------------------------

--
-- Structure de la table `t_commande`
--

CREATE TABLE IF NOT EXISTS `t_commande` (
  `id_Commande` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `T_Produit_id_Produit` int(10) unsigned NOT NULL,
  `T_Joueur_id_Joueur` int(10) unsigned NOT NULL,
  `date_Commande` datetime NOT NULL,
  PRIMARY KEY (`id_Commande`),
  KEY `T_Joueur_id_Joueur` (`T_Joueur_id_Joueur`),
  KEY `T_Produit_id_Produit` (`T_Produit_id_Produit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `t_contact`
--

CREATE TABLE IF NOT EXISTS `t_contact` (
  `id_Contact` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `T_Joueur_id_Joueur` int(10) unsigned NOT NULL,
  `description_Contact` varchar(255) NOT NULL,
  `sujet_Contact` varchar(255) NOT NULL,
  PRIMARY KEY (`id_Contact`),
  KEY `T_Joueur_id_Joueur` (`T_Joueur_id_Joueur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `t_en_attente`
--

CREATE TABLE IF NOT EXISTS `t_en_attente` (
  `id_En_Attente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `T_Joueur_id_Joueur` int(10) unsigned NOT NULL,
  `T_Equipe_id_Equipe` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_En_Attente`),
  KEY `T_Equipe_id_Equipe` (`T_Equipe_id_Equipe`),
  KEY `T_Joueur_id_Joueur` (`T_Joueur_id_Joueur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `t_equipe`
--

CREATE TABLE IF NOT EXISTS `t_equipe` (
  `id_Equipe` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `j1` int(10) unsigned NOT NULL,
  `j2` int(10) unsigned DEFAULT NULL,
  `j3` int(10) unsigned DEFAULT NULL,
  `j4` int(10) unsigned DEFAULT NULL,
  `j5` int(10) unsigned DEFAULT NULL,
  `id_Chef` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_Equipe`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `t_equipe`
--

INSERT INTO `t_equipe` (`id_Equipe`, `j1`, `j2`, `j3`, `j4`, `j5`, `id_Chef`) VALUES
(1, 1, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_etat_inscription`
--

CREATE TABLE IF NOT EXISTS `t_etat_inscription` (
  `id_Etat_Inscription` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_Etat_Inscription` varchar(20) NOT NULL,
  PRIMARY KEY (`id_Etat_Inscription`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `t_etat_tournois`
--

CREATE TABLE IF NOT EXISTS `t_etat_tournois` (
  `id_Etat_Tournois` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_Etat_Tournois` varchar(20) NOT NULL,
  PRIMARY KEY (`id_Etat_Tournois`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `t_inscription`
--

CREATE TABLE IF NOT EXISTS `t_inscription` (
  `T_Equipe_id_Equipe` int(10) unsigned NOT NULL,
  `T_Tournois_id_Tournois` int(10) unsigned NOT NULL,
  `T_Etat_Inscription_id_Etat_Inscription` int(10) unsigned NOT NULL,
  `code_Validation_Paiement` varchar(50) NOT NULL,
  `date_Inscription` datetime NOT NULL,
  PRIMARY KEY (`T_Equipe_id_Equipe`,`T_Tournois_id_Tournois`),
  KEY `T_Tournois_id_Tournois` (`T_Tournois_id_Tournois`),
  KEY `T_Etat_Inscription_id_Etat_Inscription` (`T_Etat_Inscription_id_Etat_Inscription`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `t_joueur`
--

CREATE TABLE IF NOT EXISTS `t_joueur` (
  `id_Joueur` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pseudo_Joueur` varchar(30) NOT NULL,
  `survivalCoin` int(10) unsigned DEFAULT '0',
  `mdp` varchar(50) NOT NULL,
  `mail_Joueur` varchar(30) NOT NULL,
  `prenom_Joueur` varchar(30) DEFAULT NULL,
  `nom_Joueur` varchar(30) DEFAULT NULL,
  `date_De_Naiss` date NOT NULL,
  `adresse_Joueur` varchar(50) DEFAULT NULL,
  `tel_Joueur` int(20) unsigned DEFAULT NULL,
  `is_Admin` tinyint(1) DEFAULT '0',
  `file_Path` varchar(255) DEFAULT '/assets/img/avatar/default.png',
  PRIMARY KEY (`id_Joueur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `t_joueur`
--

INSERT INTO `t_joueur` (`id_Joueur`, `pseudo_Joueur`, `survivalCoin`, `mdp`, `mail_Joueur`, `prenom_Joueur`, `nom_Joueur`, `date_De_Naiss`, `adresse_Joueur`, `tel_Joueur`, `is_Admin`, `file_Path`) VALUES
(1, 'test', 0, '098f6bcd4621d373cade4e832627b4f6', 'test@test.com', 'User Prenom', 'User Nom', '1990-03-21', '11 rue TrucParis', 35645846, 0, '/assets/img/avatar/default.png'),
(2, 'admin', 0, '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com', 'Admin Prenom', 'Admin Nom', '1983-02-08', '56 bd MachinTroyes', 402548642, 1, '/assets/img/avatar/default.png'),
(3, 'test1', 0, '5a105e8b9d40e1329780d62ea2265d8a', 'user1@user1.com', 'User1 Prenom', 'User1 Nom', '1960-09-02', '22 rue du PontNantes', 4294967295, 0, '/assets/img/avatar/default.png');

-- --------------------------------------------------------

--
-- Structure de la table `t_partie`
--

CREATE TABLE IF NOT EXISTS `t_partie` (
  `id_Partie` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `T_Tournois_id_Tournois` int(10) unsigned DEFAULT NULL,
  `T_Carte_id_Carte` int(10) unsigned NOT NULL,
  `T_Equipe_id_Equipe` int(10) unsigned NOT NULL,
  `date_Partie` datetime NOT NULL,
  `resultat_Partie` tinyint(1) DEFAULT NULL,
  `duree_Partie` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_Partie`),
  KEY `T_Equipe_id_Equipe` (`T_Equipe_id_Equipe`),
  KEY `T_Carte_id_Carte` (`T_Carte_id_Carte`),
  KEY `T_Tournois_id_Tournois` (`T_Tournois_id_Tournois`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `t_partie`
--

INSERT INTO `t_partie` (`id_Partie`, `T_Tournois_id_Tournois`, `T_Carte_id_Carte`, `T_Equipe_id_Equipe`, `date_Partie`, `resultat_Partie`, `duree_Partie`) VALUES
(1, NULL, 1, 1, '2013-03-08 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `t_produit`
--

CREATE TABLE IF NOT EXISTS `t_produit` (
  `id_Produit` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_Produit` varchar(100) NOT NULL,
  `in_Game` int(1) unsigned DEFAULT NULL,
  `prix_Produit` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_Produit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `t_serveur`
--

CREATE TABLE IF NOT EXISTS `t_serveur` (
  `T_Partie_id_Partie` int(10) unsigned NOT NULL,
  `pid_Server` int(10) unsigned NOT NULL,
  KEY `T_Partie_id_Partie` (`T_Partie_id_Partie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `t_tournois`
--

CREATE TABLE IF NOT EXISTS `t_tournois` (
  `id_Tournois` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `T_Etat_Tournois_id_Etat_Tournois` int(10) unsigned NOT NULL,
  `nom_Tournois` varchar(30) NOT NULL,
  `date_Lancement` datetime NOT NULL,
  `id_Createur` int(10) unsigned NOT NULL,
  `id_Gagnant` int(10) unsigned DEFAULT NULL,
  `prix_Tournois` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_Tournois`),
  KEY `T_Etat_Tournois_id_Etat_Tournois` (`T_Etat_Tournois_id_Etat_Tournois`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
