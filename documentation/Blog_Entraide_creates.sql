-- Blog_Entraide_creates.sql

DROP DATABASE IF EXISTS blogentraide;
CREATE DATABASE blogentraide DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE blogentraide; 

SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `blogentraide`.`categories`;
CREATE TABLE  `blogentraide`.`categories` (
  `id_categorie` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categorie` varchar(45) NOT NULL,
  PRIMARY KEY (`id_categorie`),
  UNIQUE KEY `idx_categories_categorie` (`categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `blogentraide`.`produits`;
CREATE TABLE  `blogentraide`.`produits` (
  `id_produit` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `produit` varchar(45) NOT NULL,
  `id_categorie` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_produit`),
  UNIQUE KEY `idx_produits_produit` (`produit`),
  KEY `FK_produits_categorie` (`id_categorie`),
  CONSTRAINT `FK_produits_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `blogentraide`.`questions`;
CREATE TABLE  `blogentraide`.`questions` (
  `id_question` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(45) NOT NULL,
  `id_sujet` int(10) unsigned NOT NULL,
  `id_utilisateur` int(10) unsigned NOT NULL,
  `date_question` datetime NOT NULL,
  PRIMARY KEY (`id_question`),
  KEY `FK_questions_sujet` (`id_sujet`),
  KEY `FK_questions_utilisateur` (`id_utilisateur`),
  CONSTRAINT `FK_questions_sujet` FOREIGN KEY (`id_sujet`) REFERENCES `sujets` (`id_sujet`),
  CONSTRAINT `FK_questions_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `blogentraide`.`reponses`;
CREATE TABLE  `blogentraide`.`reponses` (
  `id_reponse` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reponse` varchar(45) NOT NULL,
  `id_question` int(10) unsigned NOT NULL,
  `date_reponse` datetime NOT NULL,
  `id_utilisateur` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_reponse`),
  KEY `FK_reponses_question` (`id_question`),
  KEY `FK_reponses_utilisateur` (`id_utilisateur`),
  CONSTRAINT `FK_reponses_question` FOREIGN KEY (`id_question`) REFERENCES `questions` (`id_question`),
  CONSTRAINT `FK_reponses_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `blogentraide`.`sujets`;
CREATE TABLE  `blogentraide`.`sujets` (
  `id_sujet` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sujet` varchar(45) NOT NULL,
  `id_produit` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_sujet`),
  UNIQUE KEY `idx_sujets_sujet` (`sujet`),
  KEY `FK_sujets_produit` (`id_produit`),
  CONSTRAINT `FK_sujets_produit` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `blogentraide`.`utilisateurs`;
CREATE TABLE  `blogentraide`.`utilisateurs` (
  `id_utilisateur` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(45) NOT NULL,
  `mdp` varchar(45) NOT NULL,
  PRIMARY KEY (`id_utilisateur`),
  UNIQUE KEY `idx_utilisateurs_pseudo` (`pseudo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS=1;
