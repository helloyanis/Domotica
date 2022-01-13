-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mar. 20 avr. 2021 à 15:48
-- Version du serveur :  5.7.26
-- Version de PHP :  7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `domotique2021`
--

-- --------------------------------------------------------

--
-- Structure de la table `lieu`
--

CREATE TABLE `lieu` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `idUsers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lieu`
--

INSERT INTO `lieu` (`id`, `nom`, `idUsers`) VALUES
(1, 'Salon', 4),
(2, 'Chambre', 4),
(3, 'Cuisine', 4);

-- --------------------------------------------------------

--
-- Structure de la table `objets`
--

CREATE TABLE `objets` (
  `id` int(11) NOT NULL,
  `idType` int(11) NOT NULL,
  `idLieu` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `idUsers` int(11) NOT NULL,
  `etatConnexion` tinyint(1) NOT NULL,
  `couleur` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `objets`
--

INSERT INTO `objets` (`id`, `idType`, `idLieu`, `nom`, `idUsers`, `etatConnexion`, `couleur`) VALUES
(1, 1, 1, 'GRANDLE PLOP V2', 1, 1, 'white'),
(2, 2, 2, 'DERSCHNEI GLUGLU V3', 1, 1, ''),
(3, 1, 1, 'Lampe 1', 4, 1, ''),
(4, 1, 2, 'Lampe 2', 4, 1, ''),
(5, 1, 2, 'Lampe 3', 4, 1, ''),
(6, 2, 3, 'Lampe couleur 1', 4, 0, ''),
(7, 2, 3, 'Lampe couleur 2', 4, 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id`, `nom`) VALUES
(1, 'Quel est le nom de votre premier animal ? '),
(2, 'Quel est votre ville de naissance ? '),
(3, 'Quel est votre surnom ?'),
(4, 'Quel est le prénom de ton/ta cousin(e) ?'),
(5, 'Quel est le prénom de ton père/mère ?');

-- --------------------------------------------------------

--
-- Structure de la table `typeobjets`
--

CREATE TABLE `typeobjets` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `typeobjets`
--

INSERT INTO `typeobjets` (`id`, `type`, `img`) VALUES
(1, 'Lumière led', './images/ampoule_led.jpg'),
(2, 'Lumière couleur', './images/ampoule_color.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `actif` int(11) DEFAULT NULL,
  `lastco` datetime DEFAULT NULL,
  `dateNaissance` text NOT NULL,
  `codePostal` text NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `idQuestion` int(11) NOT NULL,
  `reponse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `mail`, `pseudo`, `prenom`, `nom`, `mdp`, `tel`, `photo`, `actif`, `lastco`, `dateNaissance`, `codePostal`, `adresse`, `ville`, `idQuestion`, `reponse`) VALUES
(1, 'grenuy@efficom-lille.com', '', 'Grégory', 'RENUY', '7682fe272099ea26efe39c890b33675b', '0612345678', './uploads/profils/1grenuy.jpg', 1, '2021-01-25 11:17:00', '', '', '', '', 1, ''),
(4, 'elodie602@hotmail.com', 'Elodie62', 'Elodie', 'LECLERCQ', 'e794027aa7585eece25389c1dfd7cc4dd1de97cd', '0628797965', './uploads/profils/anna-olaf-la-reine-des-neiges-II-1.jpg', NULL, NULL, '2021-03-31', '59290', '8 RUE ARTHUR BUYSE - APPARTEMENT 202, BATIMENT VAN GOGH 2', ' WASQUEHAL', 1, ''),
(23, 'elodie602@free.fr', 'Elodie', 'Elodie', 'LECLERCQ', 'e67221ee9159493141af64367c0e6669103e109d', '0628797965', NULL, NULL, NULL, '2021-04-15', '62490', '14 rue de vitry', 'Sailly en ostrevent', 1, 'azer');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `lieu`
--
ALTER TABLE `lieu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsers` (`idUsers`);

--
-- Index pour la table `objets`
--
ALTER TABLE `objets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsers` (`idUsers`),
  ADD KEY `idType` (`idType`),
  ADD KEY `idLieu` (`idLieu`);

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `typeobjets`
--
ALTER TABLE `typeobjets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idQuestion` (`idQuestion`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `lieu`
--
ALTER TABLE `lieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `objets`
--
ALTER TABLE `objets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `typeobjets`
--
ALTER TABLE `typeobjets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `lieu`
--
ALTER TABLE `lieu`
  ADD CONSTRAINT `lieu_ibfk_1` FOREIGN KEY (`idUsers`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `objets`
--
ALTER TABLE `objets`
  ADD CONSTRAINT `objets_ibfk_1` FOREIGN KEY (`idUsers`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `objets_ibfk_2` FOREIGN KEY (`idType`) REFERENCES `typeobjets` (`id`),
  ADD CONSTRAINT `objets_ibfk_3` FOREIGN KEY (`idLieu`) REFERENCES `lieu` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idQuestion`) REFERENCES `questions` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
