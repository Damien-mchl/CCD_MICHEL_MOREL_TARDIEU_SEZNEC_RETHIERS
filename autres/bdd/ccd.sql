-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 13 fév. 2020 à 14:39
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ccd`
--

-- --------------------------------------------------------

--
-- Structure de la table `besoin`
--

CREATE TABLE `besoin` (
  `id` int(11) NOT NULL,
  `idRole` int(11) NOT NULL,
  `idCreneau` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `recurent` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `besoin`
--

INSERT INTO `besoin` (`id`, `idRole`, `idCreneau`, `idUser`, `recurent`) VALUES
(1, 1, 2, 3, 1),
(2, 2, 3, 2, 1),
(3, 3, 2, 1, 0),
(4, 2, 4, 5, 1),
(5, 2, 5, 1, 0),
(6, 4, 2, 6, 1),
(7, 5, 3, 7, 0);

-- --------------------------------------------------------

--
-- Structure de la table `creneau`
--

CREATE TABLE `creneau` (
  `id` int(11) NOT NULL,
  `jour` int(1) NOT NULL,
  `semaine` varchar(1) NOT NULL,
  `heureDeb` int(2) NOT NULL,
  `heureFin` int(2) NOT NULL,
  `actif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `creneau`
--

INSERT INTO `creneau` (`id`, `jour`, `semaine`, `heureDeb`, `heureFin`, `actif`) VALUES
(1, 1, 'A', 8, 10, 1),
(2, 1, 'A', 10, 12, 1),
(3, 1, 'A', 14, 17, 1),
(4, 2, 'A', 8, 10, 1),
(5, 2, 'A', 10, 12, 1),
(6, 2, 'A', 14, 17, 1),
(7, 3, 'A', 8, 10, 1),
(8, 3, 'A', 10, 12, 1),
(9, 3, 'A', 14, 17, 1),
(10, 4, 'A', 8, 10, 1),
(11, 4, 'A', 10, 12, 1),
(12, 4, 'A', 14, 17, 1);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `label` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `label`) VALUES
(1, 'Caissier titulaire'),
(2, 'Caissier assistant'),
(3, 'Gestionnaire de vrac titulaire'),
(4, 'Gestionnaire de vrac assistant'),
(5, 'Chargé d\'accueil titulaire'),
(6, 'Chargé d\'accueil assistant');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `tel` varchar(10) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `obligationPerm` int(2) NOT NULL,
  `nbAbscences` int(2) NOT NULL,
  `acces` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `nom`, `prenom`, `mail`, `tel`, `photo`, `obligationPerm`, `nbAbscences`, `acces`) VALUES
(1, '', '', 'Cassandre', '', '', '', '', 0, 0, 0),
(2, '', '', 'Achille', '', '', '', '', 0, 0, 0),
(3, '', '', 'Calypso', '', '', '', '', 0, 0, 0),
(4, '', '', 'Bacchus', '', '', '', '', 0, 0, 0),
(5, '', '', 'Diane', '', '', '', '', 0, 0, 0),
(6, '', '', 'Clark', '', '', '', '', 0, 0, 0),
(7, '', '', 'Helene', '', '', '', '', 0, 0, 0),
(8, '', '', 'Jason', '', '', '', '', 0, 0, 0),
(9, '', '', 'Bruce', '', '', '', '', 0, 0, 0),
(10, '', '', 'Pénélope', '', '', '', '', 0, 0, 0),
(11, '', '', 'Ariane', '', '', '', '', 0, 0, 0),
(12, '', '', 'Lois', '', '', '', '', 0, 0, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `besoin`
--
ALTER TABLE `besoin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `creneau`
--
ALTER TABLE `creneau`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `besoin`
--
ALTER TABLE `besoin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `creneau`
--
ALTER TABLE `creneau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
