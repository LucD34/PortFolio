-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 16 sep. 2021 à 17:53
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dumas_boutique`
--

DELIMITER $$
--
-- Procédures
--
DROP PROCEDURE IF EXISTS `AddCategorie`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `AddCategorie` (IN `id` INT, IN `libelle` VARCHAR(155))  NO SQL
insert into categorie VALUES(id,libelle)$$

DROP PROCEDURE IF EXISTS `DeleteCategorie`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteCategorie` (IN `id` INT)  NO SQL
delete from categorie where categorie.idCategorie = id$$

DROP PROCEDURE IF EXISTS `DeleteProduit`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteProduit` (IN `id` INT)  NO SQL
delete from categorie where categorie.idCategorie = id$$

DROP PROCEDURE IF EXISTS `GetCategorie`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetCategorie` ()  NO SQL
SELECT * FROM categorie$$

DROP PROCEDURE IF EXISTS `GetProduit`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetProduit` ()  NO SQL
SELECT * FROM produit$$

DROP PROCEDURE IF EXISTS `ModifierCategorie`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ModifierCategorie` (IN `id` INT, IN `libelle` VARCHAR(155))  NO SQL
UPDATE categorie
SET categorie.libelleCategorie = libelle
WHERE categorie.idCategorie = id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` int(11) NOT NULL,
  `libelleCategorie` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `libelleCategorie`) VALUES
(1, 'smartphone'),
(2, 'console'),
(3, 'PC'),
(4, 'TV'),
(5, 'TEST 2');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `passe` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `login`, `passe`, `email`, `isAdmin`) VALUES
(1, 'grandChef', 'admin', 'grandchef@sio.net', 1),
(2, 'petitChef', 'noadmin', 'petitchef@sio.net', 0);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `idCommande` int(11) NOT NULL,
  `dateCommande` varchar(10) DEFAULT NULL,
  `idCli` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCommande`),
  KEY `FKCli` (`idCli`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `idFournisseur` int(11) NOT NULL,
  `nomFournisseur` varchar(100) DEFAULT NULL,
  `villeFournisseur` varchar(100) DEFAULT NULL,
  `cpFournisseur` int(11) DEFAULT NULL,
  PRIMARY KEY (`idFournisseur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`idFournisseur`, `nomFournisseur`, `villeFournisseur`, `cpFournisseur`) VALUES
(1, 'xiaomi', 'tokyo', 5200),
(2, 'sony', 'san francisco', 20002);

-- --------------------------------------------------------

--
-- Structure de la table `lignedecommande`
--

DROP TABLE IF EXISTS `lignedecommande`;
CREATE TABLE IF NOT EXISTS `lignedecommande` (
  `idCommande` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `quantiteCom` int(11) NOT NULL,
  PRIMARY KEY (`idCommande`,`idProduit`),
  KEY `FKCom` (`idCommande`),
  KEY `FKProd` (`idProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `idProduit` int(11) NOT NULL,
  `libelleProduit` varchar(100) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `prixHTProduit` float DEFAULT NULL,
  `qteStockProduit` int(11) DEFAULT NULL,
  `Image` varchar(255) NOT NULL,
  `idFourn` int(11) DEFAULT NULL,
  `idCat` int(11) DEFAULT NULL,
  PRIMARY KEY (`idProduit`),
  KEY `FKFourn` (`idFourn`),
  KEY `FKCat` (`idCat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `libelleProduit`, `description`, `prixHTProduit`, `qteStockProduit`, `Image`, `idFourn`, `idCat`) VALUES
(1, 'xiaomi redmi note 9', 'nouveau smartphone xiaomi redmi note 9', 154, 50, 'XiaomiRedmiNote9.jpg', 1, 1),
(2, 'xiaomi redmi note 9 pro', 'nouveau smartphone xiaomi redmi note 9 pro, plus puissant que le xiaomi redmi note 9', 229, 40, 'Note9Pro.jpg', 1, 1),
(3, 'Playstation 5', 'nouvelle console de chez sony, cette console est a la pointe de la technologie.', 500, 10, 'ps5.jpg', 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `passe` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `login`, `passe`, `email`, `isAdmin`) VALUES
(1, 'petitChef', '81c2828c6c1d3bc66393c199c90b2b993435d018', 'petitchef@sio.net', 0),
(2, 'grandChef', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'grandchef@sio.net', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FKCli` FOREIGN KEY (`idCli`) REFERENCES `client` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `lignedecommande`
--
ALTER TABLE `lignedecommande`
  ADD CONSTRAINT `FKCom` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`idCommande`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FKProd` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `FKCat` FOREIGN KEY (`idCat`) REFERENCES `categorie` (`idCategorie`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FKFourn` FOREIGN KEY (`idFourn`) REFERENCES `fournisseur` (`idFournisseur`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
