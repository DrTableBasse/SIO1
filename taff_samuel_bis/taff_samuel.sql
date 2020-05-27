-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 19 mai 2020 à 16:57
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `taff_samuel`
--

-- --------------------------------------------------------

--
-- Structure de la table `checkout_history`
--

CREATE TABLE `checkout_history` (
  `id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `store_id` int(11) NOT NULL,
  `members_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `pseudo` char(50) NOT NULL,
  `password` char(255) NOT NULL,
  `sold` float DEFAULT 0,
  `admin` int(11) DEFAULT 0,
  `date_inscription` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `members`
--

INSERT INTO `members` (`id`, `pseudo`, `password`, `sold`, `admin`, `date_inscription`) VALUES
(11, 'admin', '$2y$10$oifEx4sB4tqFq2S3V3sbJu5eqP//zWw85J4xwuGfDjovZ/jurMEcC', 0, 1, '2020-05-17 16:27:58'),
(12, 'théo', '$2y$10$aDvKyTXKW7fvxdCOnwXYVutprYiUMnlM9AC.JKEfwoDUBTmWOTO76', 0, 0, '2020-05-18 00:39:21');

-- --------------------------------------------------------

--
-- Structure de la table `members_address`
--

CREATE TABLE `members_address` (
  `id` int(11) NOT NULL,
  `ville_members` varchar(255) DEFAULT NULL,
  `cp_members` varchar(255) DEFAULT NULL,
  `addresse_members` varchar(255) DEFAULT NULL,
  `members_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `nom_produit` char(255) NOT NULL,
  `quantite_produit` int(11) NOT NULL,
  `prix_produit` double(5,2) NOT NULL,
  `description_produit` text DEFAULT NULL,
  `date` datetime NOT NULL,
  `slug` char(255) NOT NULL,
  `members_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `store_rate`
--

CREATE TABLE `store_rate` (
  `id` int(11) NOT NULL,
  `note` double(1,1) DEFAULT NULL,
  `members_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `checkout_history`
--
ALTER TABLE `checkout_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_checkout_history_store1_idx` (`store_id`),
  ADD KEY `fk_checkout_history_members1_idx` (`members_id`);

--
-- Index pour la table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `members_address`
--
ALTER TABLE `members_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_members_information_members_idx` (`members_id`);

--
-- Index pour la table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_store_members1_idx` (`members_id`);

--
-- Index pour la table `store_rate`
--
ALTER TABLE `store_rate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_store_rate_members1_idx` (`members_id`),
  ADD KEY `fk_store_rate_store1_idx` (`store_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `checkout_history`
--
ALTER TABLE `checkout_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `store_rate`
--
ALTER TABLE `store_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `checkout_history`
--
ALTER TABLE `checkout_history`
  ADD CONSTRAINT `fk_checkout_history_members1` FOREIGN KEY (`members_id`) REFERENCES `members` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_checkout_history_store1` FOREIGN KEY (`store_id`) REFERENCES `store` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `members_address`
--
ALTER TABLE `members_address`
  ADD CONSTRAINT `fk_members_information_members` FOREIGN KEY (`members_id`) REFERENCES `members` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `store`
--
ALTER TABLE `store`
  ADD CONSTRAINT `fk_store_members1` FOREIGN KEY (`members_id`) REFERENCES `members` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `store_rate`
--
ALTER TABLE `store_rate`
  ADD CONSTRAINT `fk_store_rate_members1` FOREIGN KEY (`members_id`) REFERENCES `members` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_store_rate_store1` FOREIGN KEY (`store_id`) REFERENCES `store` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
