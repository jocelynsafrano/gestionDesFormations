-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 20 Juin 2017 à 21:44
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `formationppe`
--

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE `employe` (
  `idEmploye` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `mdp` char(32) NOT NULL,
  `typeEmploye` int(11) NOT NULL,
  `Credit` int(11) NOT NULL DEFAULT '5000',
  `joursDeFormation` int(11) NOT NULL DEFAULT '15'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `employe`
--

INSERT INTO `employe` (`idEmploye`, `nom`, `mdp`, `typeEmploye`, `Credit`, `joursDeFormation`) VALUES
(1, 'testconnect', '12345', 1, 1000, 9),
(3, 'Admin', 'rl9KyTv533eps', 1, 35205, 36),
(5, 'Belle', 'IBL32VEV7TN', 2, 15245, 9),
(6, 'Patrick', 'elfamosomotdepasse', 2, 4997671, 9),
(7, 'Bell', 'YYS90SVP7VL', 2, 18559, 15),
(8, 'Maisie', 'QOK52RAC9TG', 1, 15839, 15),
(9, 'Dara', 'WWF15DOK7MN', 2, 6549, 15),
(10, 'Rashad', 'TYV59NWS2XV', 2, 12729, 15),
(11, 'Seth', 'DMG85TFY6GL', 2, 20956, 15),
(12, 'Hiram', 'KZN00BUN6GB', 2, 1619, 15),
(13, 'Natalie', 'NZZ58OUV1EV', 2, 10720, 15),
(14, 'Ronan', 'QMM27ZOL6DN', 1, 3239, 15),
(15, 'Nash', 'PAM02GFL5OA', 1, 24972, 15),
(16, 'Bernard', 'CFO16MST1DB', 1, 11791, 15),
(17, 'Abraham', 'JIG09HOJ1DN', 1, 5933, 15),
(18, 'Regan', 'WYQ59AYK4UF', 1, 11331, 15),
(19, 'Mariam', 'FEO77ENZ2MM', 1, 945, 15),
(20, 'Merrill', 'PEJ27TIS2DZ', 1, 4246, 15),
(21, 'Emma', 'RSZ36UPV4HG', 2, 12319, 15),
(22, 'TaShya', 'TSS16WAN7PF', 2, 5675, 15),
(23, 'Benjamin', 'PSO13KFV2YQ', 2, 21341, 15),
(24, 'Nathan', 'BVL51QDU8HQ', 1, 24004, 15),
(25, 'Emerald', 'OLR46SOC3GG', 1, 14803, 15),
(26, 'Jessica', 'ACF95HTY8ZZ', 2, 13671, 15),
(27, 'Buckminster', 'WWU83IFX2BN', 1, 21675, 15),
(28, 'Rajah', 'VLH32XRP9HV', 2, 21296, 15),
(29, 'Pascale', 'FGM87JKI8NP', 2, 17700, 15),
(30, 'Daquan', 'JMV47TJA5MV', 2, 15759, 15),
(103, 'Rana', 'USI37UPZ3DI', 1, 9796, 15),
(104, 'Kaye', 'CIG86SPY5CP', 1, 8601, 15),
(105, 'Nylecoj', 'rl7e6iu2/IDrM', 1, 4999299, 130),
(106, 'aze', 'rl7e6iu2/IDrM', 1, 20, 20),
(107, 'aze', 'rl7e6iu2/IDrM', 1, 20, 20),
(108, 'aze', 'rl7e6iu2/IDrM', 1, 20, 20),
(109, 'JocelynEmploye', 'rl7e6iu2/IDrM', 2, 47926, 500);

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `idFormation` int(11) NOT NULL,
  `titre` varchar(45) NOT NULL,
  `detail` text NOT NULL,
  `date` datetime NOT NULL,
  `duree` int(11) NOT NULL,
  `credit` int(11) NOT NULL,
  `idPrestataire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `formation`
--

INSERT INTO `formation` (`idFormation`, `titre`, `detail`, `date`, `duree`, `credit`, `idPrestataire`) VALUES
(1, 'Formation Excel - Debutant', 'Vous ne savez pas encore vous servir d\'un clavier ? \nCette formation est faite pour vous! Vous apprendrez dans un même temps à utiliser le logiciel de traitement de texte bien connu qu\'est Word. \nAh la formation c\'est Excell ? Bah :^)', '2016-11-24 00:00:00', 3, 500, 1),
(2, 'Formation Excel - Expert', 'feugiat tellus lorem eu metus. In lorem. Donec elementum, lorem ut aliquam iaculis, lacus pede sagittis augue, eu tempor erat neque non quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames', '2016-11-25 00:00:00', 4, 750, 1),
(3, 'Formation X3 - Débutant', 'feugiat tellus lorem eu metus. In lorem. Donec elementum, lorem ut aliquam iaculis, lacus pede sagittis augue, eu tempor erat neque non quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames', '2017-02-16 00:00:00', 6, 900, 2),
(4, 'Formation X3 - Intermédiaire', 'feugiat tellus lorem eu metus. In lorem. Donec elementum, lorem ut aliquam iaculis, lacus pede sagittis augue, eu tempor erat neque non quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames', '2017-03-16 00:00:00', 7, 1500, 2),
(5, 'Lorem ipsum dolor', 'enim diam vel arcu. Curabitur ut odio vel est tempor bibendum. Donec felis orci, adipiscing', '2030-09-16 00:00:00', 10, 679, 3),
(6, 'Lorem ipsum dolor', 'auctor vitae, aliquet nec, imperdiet nec, leo. Morbi neque tellus, imperdiet non, vestibulum nec, euismod in, dolor.', '2012-03-16 00:00:00', 10, 701, 2),
(7, 'Lorem', 'sit amet massa. Quisque porttitor eros nec tellus. Nunc lectus pede, ultrices a, auctor non, feugiat nec, diam. Duis mi enim, condimentum eget, volutpat ornare, facilisis eget, ipsum. Donec sollicitudin adipiscing ligula. Aenean gravida nunc sed', '2022-02-18 00:00:00', 7, 633, 3),
(8, 'Lorem', 'mauris sapien, cursus in, hendrerit consectetuer, cursus et, magna. Praesent interdum ligula eu enim. Etiam imperdiet dictum magna. Ut tincidunt orci quis lectus. Nullam suscipit, est ac facilisis facilisis, magna tellus faucibus leo, in lobortis tellus justo', '2021-07-16 00:00:00', 6, 651, 3),
(9, 'Lorem', 'quis massa. Mauris vestibulum, neque sed dictum eleifend, nunc risus varius orci, in consequat enim diam vel arcu. Curabitur ut odio vel est tempor bibendum. Donec felis orci, adipiscing non, luctus sit amet, faucibus ut,', '2023-08-17 00:00:00', 7, 378, 3),
(10, 'Lorem ipsum', 'feugiat tellus lorem eu metus. In lorem. Donec elementum, lorem ut aliquam iaculis, lacus pede sagittis augue, eu tempor erat neque non quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames', '2018-05-16 00:00:00', 10, 404, 3),
(30, 'tincidunt pede', 'et, commodo at, libero. Morbi accumsan laoreet ipsum. Curabitur consequat, lectus sit amet luctus vulputate, nisi sem semper erat, in consectetuer ipsum nunc id enim. Curabitur massa. Vestibulum accumsan', '2525-05-16 00:00:00', 10, 888, 2),
(31, 'augue. Sed molestie. Sed', 'Nam consequat dolor vitae dolor. Donec fringilla. Donec feugiat metus sit amet ante. Vivamus non', '0606-01-17 00:00:00', 8, 824, 1),
(32, 'nascetur ridiculus mus.', 'semper pretium neque. Morbi quis urna. Nunc quis arcu vel quam dignissim pharetra. Nam ac nulla. In tincidunt congue turpis. In condimentum. Donec at arcu. Vestibulum ante ipsum', '2323-05-17 00:00:00', 8, 768, 4),
(33, 'congue turpis. In', 'rutrum non, hendrerit id, ante. Nunc mauris sapien, cursus in, hendrerit consectetuer, cursus et, magna. Praesent interdum ligula eu enim. Etiam imperdiet dictum magna. Ut tincidunt orci', '1616-01-17 00:00:00', 9, 715, 2),
(34, 'ornare. Fusce', 'aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien,', '3030-04-16 00:00:00', 5, 834, 1),
(35, 'et ultrices posuere cubilia', 'imperdiet nec, leo. Morbi neque tellus, imperdiet non, vestibulum nec, euismod in, dolor. Fusce feugiat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aliquam', '0505-09-17 00:00:00', 9, 235, 4),
(36, 'lorem lorem,', 'fringilla. Donec feugiat metus sit amet ante. Vivamus non lorem vitae odio sagittis semper. Nam tempor diam dictum sapien. Aenean massa. Integer vitae nibh. Donec est mauris, rhoncus id, mollis', '2323-12-16 00:00:00', 4, 508, 4),
(37, 'tristique aliquet. Phasellus', 'risus. Duis a mi fringilla mi lacinia mattis. Integer eu lacus. Quisque imperdiet, erat nonummy ultricies ornare, elit elit fermentum', '2323-04-17 00:00:00', 5, 379, 4),
(38, 'turpis egestas.', 'nibh dolor, nonummy ac, feugiat non, lobortis quis, pede. Suspendisse dui. Fusce diam nunc, ullamcorper eu, euismod ac, fermentum vel, mauris.', '3030-09-17 00:00:00', 6, 258, 2),
(39, 'erat eget ipsum. Suspendisse', 'mattis semper, dui lectus rutrum urna, nec luctus felis purus ac tellus. Suspendisse sed dolor. Fusce mi lorem, vehicula et, rutrum eu, ultrices sit amet, risus.', '2626-07-17 00:00:00', 5, 640, 2),
(40, 'ac nulla.', 'eget tincidunt dui augue eu tellus. Phasellus elit pede, malesuada vel, venenatis vel, faucibus id, libero. Donec consectetuer mauris id sapien.', '1212-01-18 00:00:00', 4, 444, 3),
(41, 'pharetra ut, pharetra sed,', 'cubilia Curae; Donec tincidunt. Donec vitae erat vel pede blandit congue. In scelerisque scelerisque dui. Suspendisse ac', '1010-12-16 00:00:00', 6, 997, 4),
(42, 'ultrices sit amet,', 'mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus quam quis diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac', '0101-01-18 00:00:00', 5, 407, 3),
(43, 'risus. Quisque libero', 'tempor diam dictum sapien. Aenean massa. Integer vitae nibh. Donec est mauris, rhoncus id, mollis nec,', '2323-03-17 00:00:00', 9, 669, 1),
(44, 'mollis. Phasellus libero', 'per inceptos hymenaeos. Mauris ut quam vel sapien imperdiet ornare. In faucibus. Morbi vehicula. Pellentesque tincidunt tempus', '1414-02-17 00:00:00', 7, 702, 4),
(45, 'Donec sollicitudin adipiscing ligula.', 'enim non nisi. Aenean eget metus. In nec orci. Donec nibh. Quisque nonummy ipsum non arcu. Vivamus sit amet risus. Donec egestas. Aliquam nec enim. Nunc ut erat. Sed', '1616-09-16 00:00:00', 6, 542, 2),
(46, 'magna et ipsum cursus', 'orci, adipiscing non, luctus sit amet, faucibus ut, nulla. Cras eu tellus eu augue porttitor interdum. Sed auctor', '0707-12-17 00:00:00', 4, 818, 4),
(47, 'Etiam gravida molestie arcu.', 'dictum eu, placerat eget, venenatis a, magna. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam laoreet, libero et tristique pellentesque, tellus sem mollis', '1313-12-16 00:00:00', 8, 885, 3),
(48, 'sit amet ornare', 'Donec est mauris, rhoncus id, mollis nec, cursus a, enim. Suspendisse aliquet, sem ut cursus luctus, ipsum leo elementum sem, vitae aliquam eros turpis non enim. Mauris quis', '0808-04-16 00:00:00', 6, 617, 1),
(49, 'magna a tortor. Nunc', 'amet ultricies sem magna nec quam. Curabitur vel lectus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec', '0202-02-17 00:00:00', 6, 385, 4),
(50, 'quis, pede. Suspendisse dui.', 'et netus et malesuada fames ac turpis egestas. Fusce aliquet magna a neque. Nullam ut nisi a', '3131-08-16 00:00:00', 9, 423, 2);

-- --------------------------------------------------------

--
-- Structure de la table `prestataire`
--

CREATE TABLE `prestataire` (
  `idPrestataire` int(11) NOT NULL,
  `nomPrestataire` varchar(45) NOT NULL,
  `rue` varchar(45) DEFAULT NULL,
  `ville` varchar(45) DEFAULT NULL,
  `codePostal` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `prestataire`
--

INSERT INTO `prestataire` (`idPrestataire`, `nomPrestataire`, `rue`, `ville`, `codePostal`) VALUES
(1, 'Microsoft Training', 'rue de la Juiverie', 'Paris', '78400'),
(2, 'Sage Training', 'rue des Marchands', 'Paris', '78005'),
(3, 'Aurea gestion', '18 Cour des Miracles', 'Paris', '78018'),
(4, 'IPSSI ta mere', '10 rue de la Hass', 'Paris', '75003');

-- --------------------------------------------------------

--
-- Structure de la table `selectionner`
--

CREATE TABLE `selectionner` (
  `idEmploye` int(11) NOT NULL,
  `idFormation` int(11) NOT NULL,
  `etat` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `selectionner`
--

INSERT INTO `selectionner` (`idEmploye`, `idFormation`, `etat`) VALUES
(1, 1, 'Formation Refusée'),
(1, 2, 'Formation Refusée'),
(1, 3, 'Formation Refusée'),
(1, 4, 'Formation Refusée'),
(1, 5, 'Formation Refusée'),
(1, 6, 'Formation Refusée'),
(1, 7, 'Formation Refusée'),
(1, 8, 'Formation Refusée'),
(1, 9, 'Formation Validée'),
(1, 10, 'Formation Validée'),
(1, 31, 'Formation Refusée'),
(1, 34, 'Formation Refusée'),
(1, 41, 'Formation Refusée'),
(1, 50, 'Formation Refusée'),
(3, 1, 'Formation Refusée'),
(3, 2, 'Formation Validée'),
(3, 3, 'Formation Refusée'),
(3, 4, 'Formation Validée'),
(3, 5, 'Formation Validée'),
(3, 6, 'Formation Refusée'),
(3, 7, 'Formation Refusée'),
(3, 8, 'Formation Validée'),
(3, 9, 'Formation Refusée'),
(3, 10, 'Formation Refusée'),
(3, 31, 'Formation Refusée'),
(3, 33, 'Formation Refusée'),
(3, 34, 'Formation Validée'),
(3, 39, 'Formation Refusée'),
(3, 43, 'Formation Validée'),
(3, 45, 'Attente Validation'),
(3, 48, 'Formation Refusée'),
(3, 49, 'Formation Refusée'),
(5, 1, 'Formation Refusée'),
(5, 2, 'Formation Refusée'),
(5, 3, 'Formation Validée'),
(5, 4, 'Formation Validée'),
(5, 5, 'Formation Refusée'),
(5, 6, 'Formation Refusée'),
(5, 7, 'Formation Validée'),
(5, 8, 'Formation Validée'),
(5, 9, 'Formation Refusée'),
(5, 10, 'Formation Validée'),
(6, 1, 'Formation Refusée'),
(6, 2, 'Formation Validée'),
(6, 3, 'Formation Validée'),
(6, 4, 'Formation Refusée'),
(6, 5, 'Formation Validée'),
(6, 6, 'Formation Refusée'),
(6, 7, 'Formation Refusée'),
(6, 8, 'Formation Refusée'),
(105, 6, 'Formation Validée'),
(105, 30, 'Formation Refusée'),
(109, 1, 'Attente Validation'),
(109, 2, 'Attente Validation'),
(109, 31, 'Attente Validation');

-- --------------------------------------------------------

--
-- Structure de la table `typeemploye`
--

CREATE TABLE `typeemploye` (
  `idTypeEmploye` int(11) NOT NULL,
  `libelle` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `typeemploye`
--

INSERT INTO `typeemploye` (`idTypeEmploye`, `libelle`) VALUES
(1, 'Cadre'),
(2, 'Technicien');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`idEmploye`),
  ADD KEY `fk_Employe_TypeEmploye_idx` (`typeEmploye`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`idFormation`),
  ADD KEY `fk_Formation_Prestataire1_idx` (`idPrestataire`);

--
-- Index pour la table `prestataire`
--
ALTER TABLE `prestataire`
  ADD PRIMARY KEY (`idPrestataire`);

--
-- Index pour la table `selectionner`
--
ALTER TABLE `selectionner`
  ADD PRIMARY KEY (`idEmploye`,`idFormation`),
  ADD KEY `fk_Employe_has_Formation_Formation1_idx` (`idFormation`),
  ADD KEY `fk_Employe_has_Formation_Employe1_idx` (`idEmploye`);

--
-- Index pour la table `typeemploye`
--
ALTER TABLE `typeemploye`
  ADD PRIMARY KEY (`idTypeEmploye`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `employe`
--
ALTER TABLE `employe`
  MODIFY `idEmploye` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `idFormation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT pour la table `prestataire`
--
ALTER TABLE `prestataire`
  MODIFY `idPrestataire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `typeemploye`
--
ALTER TABLE `typeemploye`
  MODIFY `idTypeEmploye` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `employe`
--
ALTER TABLE `employe`
  ADD CONSTRAINT `fk_Employe_TypeEmploye` FOREIGN KEY (`typeEmploye`) REFERENCES `typeemploye` (`idTypeEmploye`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `fk_Formation_Prestataire1` FOREIGN KEY (`idPrestataire`) REFERENCES `prestataire` (`idPrestataire`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `selectionner`
--
ALTER TABLE `selectionner`
  ADD CONSTRAINT `fk_Employe_has_Formation_Employe1` FOREIGN KEY (`idEmploye`) REFERENCES `employe` (`idEmploye`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Employe_has_Formation_Formation1` FOREIGN KEY (`idFormation`) REFERENCES `formation` (`idFormation`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
