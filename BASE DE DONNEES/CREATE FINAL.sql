DROP DATABASE IF EXISTS SurvivalCamp;
CREATE DATABASE SurvivalCamp;
USE SurvivalCamp;

CREATE TABLE T_Etat_Inscription (
  id_Etat_Inscription INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nom_Etat_Inscription VARCHAR(20) NOT NULL,
  PRIMARY KEY(id_Etat_Inscription)
)
ENGINE=InnoDB;

CREATE TABLE T_Equipe (
  id_Equipe INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  j1 INTEGER UNSIGNED NOT NULL,
  j2 INTEGER UNSIGNED NOT NULL,
  j3 INTEGER UNSIGNED NOT NULL,
  j4 INTEGER UNSIGNED NOT NULL,
  j5 INTEGER UNSIGNED NOT NULL,
  id_Chef INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(id_Equipe)
)
ENGINE=InnoDB;

CREATE TABLE T_Etat_Tournois (
  id_Etat_Tournois INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nom_Etat_Tournois VARCHAR(20) NOT NULL,
  PRIMARY KEY(id_Etat_Tournois)
)
ENGINE=InnoDB;

CREATE TABLE T_Produit (
  id_Produit INTEGER UNSIGNED NOT NULL,
  nom_Produit VARCHAR(100) NOT NULL,
  in_Game INTEGER(1) UNSIGNED NULL,
  prix_Produit INTEGER UNSIGNED NULL,
  PRIMARY KEY(id_Produit)
)
ENGINE=InnoDB;

CREATE TABLE T_Joueur (
  id_Joueur INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  pseudo_Joueur VARCHAR(30) NOT NULL,
  survivalCoin INTEGER UNSIGNED NULL,
  mdp VARCHAR(50) NOT NULL,
  mail_Joueur VARCHAR(30) NOT NULL,
  prenom_Joueur VARCHAR(30) NULL,
  nom_Joueur VARCHAR(30) NULL,
  date_De_Naiss DATE NOT NULL,
  adresse_Joueur VARCHAR(50) NULL,
  tel_Joueur INTEGER(20) UNSIGNED NULL,
  is_Admin BOOL NULL,
  file_Path VARCHAR(255) NULL DEFAULT '/assets/img/avatar/default.png',
  PRIMARY KEY(id_Joueur)
)
ENGINE=InnoDB;

CREATE TABLE T_Carte (
  id_Carte INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nom_Carte VARCHAR(30) NOT NULL,
  url_Carte VARCHAR(255) NOT NULL,
  PRIMARY KEY(id_Carte)
)
ENGINE=InnoDB;

CREATE TABLE T_Tournois (
  id_Tournois INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  T_Etat_Tournois_id_Etat_Tournois INTEGER UNSIGNED NOT NULL,
  nom_Tournois VARCHAR(30) NOT NULL,
  date_Lancement DATETIME NOT NULL,
  id_Createur INTEGER UNSIGNED NOT NULL,
  id_Gagnant INTEGER UNSIGNED NULL,
  prix_Tournois INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(id_Tournois),
  FOREIGN KEY (T_Etat_Tournois_id_Etat_Tournois) REFERENCES T_Etat_Tournois(id_Etat_Tournois)
)
ENGINE=InnoDB;

CREATE TABLE T_Achat_SC (
  id_Achat_SC INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  T_Joueur_id_Joueur INTEGER UNSIGNED NOT NULL,
  date_Achat_SC DATETIME NOT NULL,
  montant_SC INTEGER UNSIGNED NOT NULL,
  montant_Euros INTEGER UNSIGNED NOT NULL,
  code_Validation VARCHAR(30) NOT NULL,
  PRIMARY KEY(id_Achat_SC),
  FOREIGN KEY (T_Joueur_id_Joueur) REFERENCES T_Joueur(id_Joueur)
)
ENGINE=InnoDB;

CREATE TABLE T_Contact (
  id_Contact INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  T_Joueur_id_Joueur INTEGER UNSIGNED NOT NULL,
  description_Contact VARCHAR(255) NOT NULL,
  sujet_Contact VARCHAR(255) NOT NULL,
  PRIMARY KEY(id_Contact),
  FOREIGN KEY (T_Joueur_id_Joueur) REFERENCES T_Joueur(id_Joueur)
)
ENGINE=InnoDB;

CREATE TABLE T_Commande (
  id_Commande INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  T_Produit_id_Produit INTEGER UNSIGNED NOT NULL,
  T_Joueur_id_Joueur INTEGER UNSIGNED NOT NULL,
  date_Commande DATETIME NOT NULL,
  PRIMARY KEY(id_Commande),
  FOREIGN KEY (T_Joueur_id_Joueur) REFERENCES T_Joueur(id_Joueur),
  FOREIGN KEY (T_Produit_id_Produit) REFERENCES T_Produit(id_Produit)
)
ENGINE=InnoDB;

CREATE TABLE T_En_Attente (
  id_En_Attente INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  T_Joueur_id_Joueur INTEGER UNSIGNED NOT NULL,
  T_Equipe_id_Equipe INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(id_En_Attente),
  FOREIGN KEY (T_Equipe_id_Equipe) REFERENCES T_Equipe(id_Equipe),
  FOREIGN KEY (T_Joueur_id_Joueur) REFERENCES T_Joueur(id_Joueur)
)
ENGINE=InnoDB;

CREATE TABLE T_Amis (
  T_Joueur_id_Joueur1 INTEGER UNSIGNED NOT NULL,
  T_Joueur_id_Joueur2 INTEGER UNSIGNED NOT NULL,
  FOREIGN KEY (T_Joueur_id_Joueur1) REFERENCES T_Joueur(id_Joueur),
  FOREIGN KEY (T_Joueur_id_Joueur2) REFERENCES T_Joueur(id_Joueur)
)
ENGINE=InnoDB;

CREATE TABLE T_Inscription (
  T_Equipe_id_Equipe INTEGER UNSIGNED NOT NULL,
  T_Tournois_id_Tournois INTEGER UNSIGNED NOT NULL,
  T_Etat_Inscription_id_Etat_Inscription INTEGER UNSIGNED NOT NULL,
  code_Validation_Paiement VARCHAR(50) NOT NULL,
  date_Inscription DATETIME NOT NULL,
  PRIMARY KEY(T_Equipe_id_Equipe, T_Tournois_id_Tournois),
  FOREIGN KEY (T_Equipe_id_Equipe) REFERENCES T_Equipe(id_Equipe),
  FOREIGN KEY (T_Tournois_id_Tournois) REFERENCES T_Tournois(id_Tournois),
  FOREIGN KEY (T_Etat_Inscription_id_Etat_Inscription) REFERENCES T_Etat_Inscription(id_Etat_Inscription)
)
ENGINE=InnoDB;

CREATE TABLE T_Partie (
  id_Partie INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  T_Tournois_id_Tournois INTEGER UNSIGNED NULL,
  T_Carte_id_Carte INTEGER UNSIGNED NOT NULL,
  T_Equipe_id_Equipe INTEGER UNSIGNED NOT NULL,
  date_Partie DATETIME NOT NULL,
  resultat_Partie BOOL NULL,
  duree_Partie INTEGER UNSIGNED NULL,
  PRIMARY KEY(id_Partie),
  FOREIGN KEY (T_Equipe_id_Equipe) REFERENCES T_Equipe(id_Equipe),
  FOREIGN KEY (T_Carte_id_Carte) REFERENCES T_Carte(id_Carte),
  FOREIGN KEY (T_Tournois_id_Tournois) REFERENCES T_Tournois(id_Tournois)
)
ENGINE=InnoDB;

CREATE TABLE T_Serveur (
  T_Partie_id_Partie INTEGER UNSIGNED NOT NULL,
  pid_Server INTEGER UNSIGNED NOT NULL,
  FOREIGN KEY (T_Partie_id_Partie) REFERENCES T_Partie(id_Partie)
)
ENGINE=InnoDB;

