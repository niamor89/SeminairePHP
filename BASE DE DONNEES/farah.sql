-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 08 Mars 2013 à 10:16
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

-- --------------------------------------------------------

--
-- Structure de la table `t_achat_sc`
--

CREATE TABLE IF NOT EXISTS `t_achat_sc` (
  `id_Achat_SC` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date_Achat_SC` datetime NOT NULL,
  `montant_SC` int(10) unsigned NOT NULL,
  `montant_Euros` int(10) unsigned NOT NULL,
  `code_Validation` varchar(30) NOT NULL,
  PRIMARY KEY (`id_Achat_SC`)
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
(3, 3),
(3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `t_carte`
--

CREATE TABLE IF NOT EXISTS `t_carte` (
  `id_Carte` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_Carte` varchar(30) NOT NULL,
  `url_Carte` varchar(255) NOT NULL,
  PRIMARY KEY (`id_Carte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `t_commande`
--

CREATE TABLE IF NOT EXISTS `t_commande` (
  `id_Commande` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `T_Joueur_id_Joueur` int(10) unsigned NOT NULL,
  `date_Commande` datetime NOT NULL,
  PRIMARY KEY (`id_Commande`),
  KEY `T_Joueur_id_Joueur` (`T_Joueur_id_Joueur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `t_commande_et_produit`
--

CREATE TABLE IF NOT EXISTS `t_commande_et_produit` (
  `T_Commande_id_Commande` int(10) unsigned NOT NULL,
  `T_Produit_id_Produit` int(10) unsigned NOT NULL,
  PRIMARY KEY (`T_Commande_id_Commande`,`T_Produit_id_Produit`),
  KEY `T_Produit_id_Produit` (`T_Produit_id_Produit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `T_Joueur_id_Joueur` int(10) unsigned NOT NULL,
  `T_Equipe_id_Equipe` int(10) unsigned NOT NULL,
  KEY `T_Equipe_id_Equipe` (`T_Equipe_id_Equipe`),
  KEY `T_Joueur_id_Joueur` (`T_Joueur_id_Joueur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `t_equipe`
--

CREATE TABLE IF NOT EXISTS `t_equipe` (
  `id_Equipe` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `j1` int(10) unsigned DEFAULT NULL,
  `j2` int(10) unsigned DEFAULT NULL,
  `j3` int(10) unsigned DEFAULT NULL,
  `j4` int(10) unsigned DEFAULT NULL,
  `j5` int(10) unsigned DEFAULT NULL,
  `id_Chef` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_Equipe`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `t_equipe`
--

INSERT INTO `t_equipe` (`id_Equipe`, `j1`, `j2`, `j3`, `j4`, `j5`, `id_Chef`) VALUES
(6, 1, 2, 3, 4, 5, 1);

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
-- Structure de la table `t_etat_joueur`
--

CREATE TABLE IF NOT EXISTS `t_etat_joueur` (
  `id_Etat_Joueur` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_Etat_Joueur` varchar(50) NOT NULL,
  PRIMARY KEY (`id_Etat_Joueur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `t_etat_joueur`
--

INSERT INTO `t_etat_joueur` (`id_Etat_Joueur`, `nom_Etat_Joueur`) VALUES
(1, 'membre'),
(2, 'admin'),
(3, 'membre'),
(4, 'admin');

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
-- Structure de la table `t_hist_prix_produit`
--

CREATE TABLE IF NOT EXISTS `t_hist_prix_produit` (
  `T_Produit_id_Produit` int(10) unsigned NOT NULL,
  `prix_Produit` int(10) unsigned NOT NULL,
  `date_Debut` datetime NOT NULL,
  `date_Fin` datetime NOT NULL,
  KEY `T_Produit_id_Produit` (`T_Produit_id_Produit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `T_Etat_Joueur_id_Etat_Joueur` int(10) unsigned NOT NULL,
  `pseudo_Joueur` varchar(30) NOT NULL,
  `survivalCoin` int(10) unsigned DEFAULT NULL,
  `mdp` varchar(50) NOT NULL,
  `mail_Joueur` varchar(30) NOT NULL,
  `prenom_Joueur` varchar(30) DEFAULT NULL,
  `nom_Joueur` varchar(30) DEFAULT NULL,
  `date_De_Naiss` date NOT NULL,
  `adresse_Joueur` varchar(50) DEFAULT NULL,
  `tel_Joueur` int(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_Joueur`),
  KEY `T_Etat_Joueur_id_Etat_Joueur` (`T_Etat_Joueur_id_Etat_Joueur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `t_joueur`
--

INSERT INTO `t_joueur` (`id_Joueur`, `T_Etat_Joueur_id_Etat_Joueur`, `pseudo_Joueur`, `survivalCoin`, `mdp`, `mail_Joueur`, `prenom_Joueur`, `nom_Joueur`, `date_De_Naiss`, `adresse_Joueur`, `tel_Joueur`) VALUES
(3, 1, 'tata', 400, 'pouet', 'tata@hotmail.fr', 'tataprenom', 'tatanom', '1989-03-13', '2 rue du mont', 623242526),
(4, 1, 'fafa', 300, 'banane', 'farah@hotmail.fr', 'farah', 'villard', '1989-05-20', '1 rue du mont', 612131415),
(6, 1, 'toto', 200, 'prout', 'toto@hotmail.fr', 'totoprenom', 'totonom', '1989-01-19', '3 rue du mont', 611223344),
(9, 1, 'titi', 100, 'tititi', 'titi@hotmail.fr', 'titiprenom', 'titinom', '1989-05-21', '4 rue du mont', 655667788),
(10, 2, 'tutu', 150, 'chacha', 'tutu@hotmail.fr', 'tutuprenom', 'tutunom', '1978-03-26', '6 rue du mont', 644332211),
(11, 2, 'tete', 450, 'pouetpouet', 'tete@hotmail.fr', 'teteprenom', 'tetenom', '1976-09-27', '7 rue du mont', 655447788);

-- --------------------------------------------------------

--
-- Structure de la table `t_joueur_et_achat_sc`
--

CREATE TABLE IF NOT EXISTS `t_joueur_et_achat_sc` (
  `T_Joueur_id_Joueur` int(10) unsigned NOT NULL,
  `T_Achat_SC_id_Achat_SC` int(10) unsigned NOT NULL,
  PRIMARY KEY (`T_Joueur_id_Joueur`,`T_Achat_SC_id_Achat_SC`),
  KEY `T_Achat_SC_id_Achat_SC` (`T_Achat_SC_id_Achat_SC`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `t_partie`
--

CREATE TABLE IF NOT EXISTS `t_partie` (
  `id_Partie` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `T_Tournois_id_Tournois` int(10) unsigned NOT NULL,
  `T_Carte_id_Carte` int(10) unsigned NOT NULL,
  `T_Equipe_id_Equipe` int(10) unsigned NOT NULL,
  `date_Partie` datetime NOT NULL,
  `resultat_Partie` tinyint(1) DEFAULT NULL,
  `duree_Partie` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_Partie`),
  KEY `T_Equipe_id_Equipe` (`T_Equipe_id_Equipe`),
  KEY `T_Carte_id_Carte` (`T_Carte_id_Carte`),
  KEY `T_Tournois_id_Tournois` (`T_Tournois_id_Tournois`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `t_produit`
--

CREATE TABLE IF NOT EXISTS `t_produit` (
  `id_Produit` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_Produit` varchar(100) NOT NULL,
  PRIMARY KEY (`id_Produit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`id_Tournois`),
  KEY `T_Etat_Tournois_id_Etat_Tournois` (`T_Etat_Tournois_id_Etat_Tournois`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `t_amis`
--
ALTER TABLE `t_amis`
  ADD CONSTRAINT `t_amis_ibfk_1` FOREIGN KEY (`T_Joueur_id_Joueur1`) REFERENCES `t_joueur` (`id_Joueur`),
  ADD CONSTRAINT `t_amis_ibfk_2` FOREIGN KEY (`T_Joueur_id_Joueur2`) REFERENCES `t_joueur` (`id_Joueur`);

--
-- Contraintes pour la table `t_commande`
--
ALTER TABLE `t_commande`
  ADD CONSTRAINT `t_commande_ibfk_1` FOREIGN KEY (`T_Joueur_id_Joueur`) REFERENCES `t_joueur` (`id_Joueur`);

--
-- Contraintes pour la table `t_commande_et_produit`
--
ALTER TABLE `t_commande_et_produit`
  ADD CONSTRAINT `t_commande_et_produit_ibfk_1` FOREIGN KEY (`T_Commande_id_Commande`) REFERENCES `t_commande` (`id_Commande`),
  ADD CONSTRAINT `t_commande_et_produit_ibfk_2` FOREIGN KEY (`T_Produit_id_Produit`) REFERENCES `t_produit` (`id_Produit`);

--
-- Contraintes pour la table `t_contact`
--
ALTER TABLE `t_contact`
  ADD CONSTRAINT `t_contact_ibfk_1` FOREIGN KEY (`T_Joueur_id_Joueur`) REFERENCES `t_joueur` (`id_Joueur`);

--
-- Contraintes pour la table `t_en_attente`
--
ALTER TABLE `t_en_attente`
  ADD CONSTRAINT `t_en_attente_ibfk_1` FOREIGN KEY (`T_Equipe_id_Equipe`) REFERENCES `t_equipe` (`id_Equipe`),
  ADD CONSTRAINT `t_en_attente_ibfk_2` FOREIGN KEY (`T_Joueur_id_Joueur`) REFERENCES `t_joueur` (`id_Joueur`);

--
-- Contraintes pour la table `t_hist_prix_produit`
--
ALTER TABLE `t_hist_prix_produit`
  ADD CONSTRAINT `t_hist_prix_produit_ibfk_1` FOREIGN KEY (`T_Produit_id_Produit`) REFERENCES `t_produit` (`id_Produit`);

--
-- Contraintes pour la table `t_inscription`
--
ALTER TABLE `t_inscription`
  ADD CONSTRAINT `t_inscription_ibfk_1` FOREIGN KEY (`T_Equipe_id_Equipe`) REFERENCES `t_equipe` (`id_Equipe`),
  ADD CONSTRAINT `t_inscription_ibfk_2` FOREIGN KEY (`T_Tournois_id_Tournois`) REFERENCES `t_tournois` (`id_Tournois`),
  ADD CONSTRAINT `t_inscription_ibfk_3` FOREIGN KEY (`T_Etat_Inscription_id_Etat_Inscription`) REFERENCES `t_etat_inscription` (`id_Etat_Inscription`);

--
-- Contraintes pour la table `t_joueur`
--
ALTER TABLE `t_joueur`
  ADD CONSTRAINT `t_joueur_ibfk_1` FOREIGN KEY (`T_Etat_Joueur_id_Etat_Joueur`) REFERENCES `t_etat_joueur` (`id_Etat_Joueur`);

--
-- Contraintes pour la table `t_joueur_et_achat_sc`
--
ALTER TABLE `t_joueur_et_achat_sc`
  ADD CONSTRAINT `t_joueur_et_achat_sc_ibfk_1` FOREIGN KEY (`T_Joueur_id_Joueur`) REFERENCES `t_joueur` (`id_Joueur`),
  ADD CONSTRAINT `t_joueur_et_achat_sc_ibfk_2` FOREIGN KEY (`T_Achat_SC_id_Achat_SC`) REFERENCES `t_achat_sc` (`id_Achat_SC`);

--
-- Contraintes pour la table `t_partie`
--
ALTER TABLE `t_partie`
  ADD CONSTRAINT `t_partie_ibfk_1` FOREIGN KEY (`T_Equipe_id_Equipe`) REFERENCES `t_equipe` (`id_Equipe`),
  ADD CONSTRAINT `t_partie_ibfk_2` FOREIGN KEY (`T_Carte_id_Carte`) REFERENCES `t_carte` (`id_Carte`),
  ADD CONSTRAINT `t_partie_ibfk_3` FOREIGN KEY (`T_Tournois_id_Tournois`) REFERENCES `t_tournois` (`id_Tournois`);

--
-- Contraintes pour la table `t_tournois`
--
ALTER TABLE `t_tournois`
  ADD CONSTRAINT `t_tournois_ibfk_1` FOREIGN KEY (`T_Etat_Tournois_id_Etat_Tournois`) REFERENCES `t_etat_tournois` (`id_Etat_Tournois`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
