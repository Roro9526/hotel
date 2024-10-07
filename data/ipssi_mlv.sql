-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 02 oct. 2024 à 14:53
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



DROP TABLE IF EXISTS `chambre`;
CREATE TABLE IF NOT EXISTS `chambre` (
  `numChambre` int NOT NULL AUTO_INCREMENT,
  `prix` decimal(10,2) NOT NULL,
  `nbLits` int NOT NULL,
  `nbPers` int NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text,
  `reserved` BOOLEAN NOT NULL DEFAULT 0,
  PRIMARY KEY (`numChambre`)
) ENGINE=InnoDB;



DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `numClient` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `tel` varchar(15) NOT NULL,
  PRIMARY KEY (`numClient`)
) ENGINE=InnoDB;



DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `numReservation` int NOT NULL AUTO_INCREMENT,
  `numClient` int NOT NULL,
  `numChambre` int NOT NULL,
  `dateArrivee` date NOT NULL,
  `dateDepart` date NOT NULL,
  PRIMARY KEY (`numReservation`),
  KEY `fk_client` (`numClient`),
  KEY `fk_chambre` (`numChambre`)
) ENGINE=InnoDB;



DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id_util` int NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role` enum('receptionniste','administrateur') NOT NULL,
  PRIMARY KEY (`id_util`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB;


ALTER TABLE `reservation`
  ADD CONSTRAINT `fk_chambre` FOREIGN KEY (`numChambre`) REFERENCES `chambre` (`numChambre`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_client` FOREIGN KEY (`numClient`) REFERENCES `client` (`numClient`) ON DELETE CASCADE;
COMMIT;


INSERT into utilisateurs values (NULL,"a@gmail.com","123","administrateur")

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
