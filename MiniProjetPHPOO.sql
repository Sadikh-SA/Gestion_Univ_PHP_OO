-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Lun 24 Juin 2019 à 09:31
-- Version du serveur :  5.7.26-0ubuntu0.18.04.1
-- Version de PHP :  7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `MiniProjetPHPOO`
--

-- --------------------------------------------------------

--
-- Structure de la table `Batiment`
--

CREATE TABLE `Batiment` (
  `idbat` int(11) NOT NULL,
  `numbat` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Batiment`
--

INSERT INTO `Batiment` (`idbat`, `numbat`) VALUES
(1, 'Campus B'),
(2, 'Campus A'),
(3, 'Campus C');

-- --------------------------------------------------------

--
-- Structure de la table `Boursier`
--

CREATE TABLE `Boursier` (
  `idbour` int(11) NOT NULL,
  `idEtu` int(11) NOT NULL,
  `idtype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Boursier`
--

INSERT INTO `Boursier` (`idbour`, `idEtu`, `idtype`) VALUES
(2, 21, 1),
(16, 54, 1),
(17, 56, 1),
(1, 2, 2),
(18, 57, 2);

-- --------------------------------------------------------

--
-- Structure de la table `Chambre`
--

CREATE TABLE `Chambre` (
  `idcham` int(11) NOT NULL,
  `numcham` int(11) DEFAULT NULL,
  `idbat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Chambre`
--

INSERT INTO `Chambre` (`idcham`, `numcham`, `idbat`) VALUES
(1, 25, 1),
(2, 25, 3),
(3, 1, 1),
(26, 1, 2),
(27, 3, 1),
(28, 4, 1),
(29, 5, 1),
(30, 6, 1),
(31, 8, 1),
(32, 9, 1),
(33, 10, 1),
(34, 11, 1),
(35, 12, 1),
(36, 13, 1),
(37, 14, 1),
(38, 15, 1),
(39, 16, 1),
(40, 17, 1),
(41, 18, 1),
(42, 19, 1),
(43, 20, 1),
(44, 21, 1),
(45, 22, 1),
(46, 23, 1),
(47, 24, 1),
(48, 2, 1),
(49, 1, 2),
(50, 2, 2),
(51, 3, 2),
(52, 4, 2),
(53, 5, 2),
(54, 6, 2),
(55, 8, 2),
(56, 9, 2),
(57, 10, 2),
(58, 11, 2),
(59, 12, 2),
(60, 13, 2),
(61, 14, 2),
(62, 15, 2),
(63, 16, 2),
(64, 17, 2),
(65, 18, 2),
(66, 19, 2),
(67, 20, 2),
(68, 21, 2),
(69, 22, 2),
(70, 23, 2),
(71, 24, 2),
(72, 24, 2),
(97, 1, 3),
(98, 2, 3),
(99, 3, 3),
(100, 4, 3),
(101, 5, 3),
(102, 6, 3),
(103, 8, 3),
(104, 9, 3),
(105, 10, 3),
(106, 11, 3),
(107, 12, 3),
(108, 13, 3),
(109, 14, 3),
(110, 15, 3),
(111, 16, 3),
(112, 17, 3),
(113, 18, 3),
(114, 19, 3),
(115, 20, 3),
(116, 21, 3),
(117, 22, 3),
(118, 23, 3),
(119, 24, 3),
(120, 24, 3),
(121, 24, 3);

-- --------------------------------------------------------

--
-- Structure de la table `Etudiant`
--

CREATE TABLE `Etudiant` (
  `idEtu` int(11) NOT NULL,
  `matricule` varchar(45) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `tel` int(11) DEFAULT NULL,
  `ddn` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Etudiant`
--

INSERT INTO `Etudiant` (`idEtu`, `matricule`, `nom`, `prenom`, `mail`, `tel`, `ddn`) VALUES
(1, 'SA960820', 'GUEYE', 'Ababacar Sadikh', 'Sadikhabou@gmail.com', 784408822, '1996-08-20'),
(2, 'SA951112', 'NGOM', 'Mariama', 'ngomariama@gmail.com', 771845215, '1995-11-12'),
(3, 'SA911123', 'CAMARA', 'Aboubacar', 'babacamara91@gmail.com', 778584822, '1991-11-23'),
(4, 'SA920405', 'NGOM', 'Abdoulaye', 'ngomabdoulaye@gmail.com', 776418887, '1992-05-04'),
(5, 'SA970213', 'NDIAYE', 'Bitty Diouf', 'bitty.ndiaye@gmail.com', 781870014, '1997-02-13'),
(12, 'SA940415', 'NDAO', 'Ibou', 'ndao.ibou@gmail.com', 778083808, '1994-04-15'),
(16, 'SA940802', 'LY', 'El Hadj Yaya', 'ly.yaya.el@gmail.com', 772652363, '1994-08-02'),
(19, 'SA981025', 'GUEYE', 'Awa', 'gueye.awa@gmail.com', 773221208, '1998-10-25'),
(21, 'SA990920', 'DIA', 'AÃ¯ta', 'adn@gmail.com', 774662714, '1999-09-20'),
(22, 'SA950714', 'GUISSE', 'Ibrahima', 'guizzo@gmail.com', 776541278, '1995-07-14'),
(28, 'SA950623', 'GAYE', 'Doudou Mouhamed', 'edmg@gmail.com', 778754215, '1995-06-23'),
(47, 'SA941129', 'DIEME', 'Souleymane', 'dieme.jules@gmail.com', 773511585, '1994-11-29'),
(48, 'SA911211', 'GUEYE', 'Khalifa', 'khalifa907@gmail.com', 776727271, '1991-12-11'),
(52, 'SA870821', 'GUEYE', 'Arame', 'emara8@gmail.com', 773221482, '1987-08-20'),
(54, 'SA940311', 'GUEYE', 'Maty', 'atina@gmail.com', 774661377, '1996-03-11'),
(55, 'SA991223', 'GUEYE', 'Lamine', 'lamineg@gmail.com', 778648228, '1999-12-23'),
(56, 'SA980714', 'NIANG', 'Dior', 'dior.niang@gmail.com', 774625521, '1998-07-14'),
(57, 'SA000411', 'CISSE', 'NdoumbÃ©', 'ndoumz.c@gmail.com', 771180530, '2000-04-11');

-- --------------------------------------------------------

--
-- Structure de la table `Loger`
--

CREATE TABLE `Loger` (
  `idlog` int(11) NOT NULL,
  `idbour` int(11) NOT NULL,
  `idEtu` int(11) NOT NULL,
  `idcham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Loger`
--

INSERT INTO `Loger` (`idlog`, `idbour`, `idEtu`, `idcham`) VALUES
(8, 16, 54, 2);

-- --------------------------------------------------------

--
-- Structure de la table `NonBoursier`
--

CREATE TABLE `NonBoursier` (
  `idnob` int(11) NOT NULL,
  `idEtu` int(11) NOT NULL,
  `Adresse` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `NonBoursier`
--

INSERT INTO `NonBoursier` (`idnob`, `idEtu`, `Adresse`) VALUES
(1, 1, '101 Hamo 4 Guédiwaye '),
(2, 55, '101 Hamo 4 GuÃ©diawaye');

-- --------------------------------------------------------

--
-- Structure de la table `Situation`
--

CREATE TABLE `Situation` (
  `idtype` int(11) NOT NULL,
  `libelle` varchar(120) NOT NULL,
  `montant` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Situation`
--

INSERT INTO `Situation` (`idtype`, `libelle`, `montant`) VALUES
(1, 'Demi-pension', 20000),
(2, 'pension-complete', 40000);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Batiment`
--
ALTER TABLE `Batiment`
  ADD PRIMARY KEY (`idbat`);

--
-- Index pour la table `Boursier`
--
ALTER TABLE `Boursier`
  ADD PRIMARY KEY (`idbour`,`idEtu`),
  ADD KEY `fk_etudiantboursier` (`idEtu`),
  ADD KEY `fk_type` (`idtype`);

--
-- Index pour la table `Chambre`
--
ALTER TABLE `Chambre`
  ADD PRIMARY KEY (`idcham`),
  ADD KEY `fk_chambre` (`idbat`);

--
-- Index pour la table `Etudiant`
--
ALTER TABLE `Etudiant`
  ADD PRIMARY KEY (`idEtu`),
  ADD UNIQUE KEY `matricule` (`matricule`);

--
-- Index pour la table `Loger`
--
ALTER TABLE `Loger`
  ADD PRIMARY KEY (`idlog`,`idEtu`,`idbour`),
  ADD KEY `fk_Etudiant` (`idEtu`),
  ADD KEY `fk_bourse` (`idbour`),
  ADD KEY `fk_chambreloger` (`idcham`);

--
-- Index pour la table `NonBoursier`
--
ALTER TABLE `NonBoursier`
  ADD PRIMARY KEY (`idnob`,`idEtu`),
  ADD KEY `fk_etudiantnonboursier` (`idEtu`);

--
-- Index pour la table `Situation`
--
ALTER TABLE `Situation`
  ADD PRIMARY KEY (`idtype`),
  ADD UNIQUE KEY `libelle` (`libelle`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Batiment`
--
ALTER TABLE `Batiment`
  MODIFY `idbat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `Boursier`
--
ALTER TABLE `Boursier`
  MODIFY `idbour` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `Chambre`
--
ALTER TABLE `Chambre`
  MODIFY `idcham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
--
-- AUTO_INCREMENT pour la table `Etudiant`
--
ALTER TABLE `Etudiant`
  MODIFY `idEtu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT pour la table `Loger`
--
ALTER TABLE `Loger`
  MODIFY `idlog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `NonBoursier`
--
ALTER TABLE `NonBoursier`
  MODIFY `idnob` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `Situation`
--
ALTER TABLE `Situation`
  MODIFY `idtype` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Boursier`
--
ALTER TABLE `Boursier`
  ADD CONSTRAINT `fk_etudiantboursier` FOREIGN KEY (`idEtu`) REFERENCES `Etudiant` (`idEtu`),
  ADD CONSTRAINT `fk_type` FOREIGN KEY (`idtype`) REFERENCES `Situation` (`idtype`);

--
-- Contraintes pour la table `Chambre`
--
ALTER TABLE `Chambre`
  ADD CONSTRAINT `fk_chambre` FOREIGN KEY (`idbat`) REFERENCES `Batiment` (`idbat`);

--
-- Contraintes pour la table `Loger`
--
ALTER TABLE `Loger`
  ADD CONSTRAINT `fk_Etudiant` FOREIGN KEY (`idEtu`) REFERENCES `Etudiant` (`idEtu`),
  ADD CONSTRAINT `fk_bourse` FOREIGN KEY (`idbour`) REFERENCES `Boursier` (`idbour`),
  ADD CONSTRAINT `fk_chambreloger` FOREIGN KEY (`idcham`) REFERENCES `Chambre` (`idcham`);

--
-- Contraintes pour la table `NonBoursier`
--
ALTER TABLE `NonBoursier`
  ADD CONSTRAINT `fk_etudiantnonboursier` FOREIGN KEY (`idEtu`) REFERENCES `Etudiant` (`idEtu`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
