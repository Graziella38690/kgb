-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 27 nov. 2021 à 17:07
-- Version du serveur : 10.4.20-MariaDB
-- Version de PHP : 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `kgb`
--

-- --------------------------------------------------------

--
-- Structure de la table `agents`
--

CREATE TABLE `agents` (
  `id` int(11) NOT NULL,
  `nationalite_id` int(11) DEFAULT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datedenaissance` date NOT NULL,
  `codeidentification` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `agents_specialite`
--

CREATE TABLE `agents_specialite` (
  `agents_id` int(11) NOT NULL,
  `specialite_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cibles`
--

CREATE TABLE `cibles` (
  `id` int(11) NOT NULL,
  `nationalite_id` int(11) DEFAULT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datedenaissance` date NOT NULL,
  `nomdecode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `nationalite_id` int(11) DEFAULT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datedenaissance` date NOT NULL,
  `nomdecode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `missions`
--

CREATE TABLE `missions` (
  `id` int(11) NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `statut_id` int(11) DEFAULT NULL,
  `specialite_id` int(11) DEFAULT NULL,
  `pays_id` int(11) DEFAULT NULL,
  `titre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codemission` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datededebut` date NOT NULL,
  `datedefin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `missions_agents`
--

CREATE TABLE `missions_agents` (
  `missions_id` int(11) NOT NULL,
  `agents_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `missions_cibles`
--

CREATE TABLE `missions_cibles` (
  `missions_id` int(11) NOT NULL,
  `cibles_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `missions_contacts`
--

CREATE TABLE `missions_contacts` (
  `missions_id` int(11) NOT NULL,
  `contacts_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `missions_planques`
--

CREATE TABLE `missions_planques` (
  `missions_id` int(11) NOT NULL,
  `planques_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `nationalite`
--

CREATE TABLE `nationalite` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationalite_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `planques`
--

CREATE TABLE `planques` (
  `id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `codeidentification` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pays_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

CREATE TABLE `specialite` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `statumission`
--

CREATE TABLE `statumission` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `typemission`
--

CREATE TABLE `typemission` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `typeplanque`
--

CREATE TABLE `typeplanque` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`roles`)),
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datecreation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `roles`, `password`, `nom`, `prenom`, `datecreation`) VALUES
(4, 'Grazou', '[]', '$2y$13$62rtFjn67JuKmqQx3Cdc6url.eeCchPK3uBXcigB3NG4kz2td.bt.', 'Fournel', 'Graziella', '2003-11-25'),
(5, 'Grazou44', '[]', '$2y$13$Rfa0PbIVazLGBC8GjculJuYI0ZIedk.szUlRcqaxFUzyWe2Lo1Aa2', 'Fournel', 'Graziella', '1946-01-01');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9596AB6E1B063272` (`nationalite_id`);

--
-- Index pour la table `agents_specialite`
--
ALTER TABLE `agents_specialite`
  ADD PRIMARY KEY (`agents_id`,`specialite_id`),
  ADD KEY `IDX_968C180709770DC` (`agents_id`),
  ADD KEY `IDX_968C1802195E0F0` (`specialite_id`);

--
-- Index pour la table `cibles`
--
ALTER TABLE `cibles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_AAE47BC31B063272` (`nationalite_id`);

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_334015731B063272` (`nationalite_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `missions`
--
ALTER TABLE `missions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_34F1D47EC54C8C93` (`type_id`),
  ADD KEY `IDX_34F1D47EF6203804` (`statut_id`),
  ADD KEY `IDX_34F1D47E2195E0F0` (`specialite_id`),
  ADD KEY `IDX_34F1D47EA6E44244` (`pays_id`);

--
-- Index pour la table `missions_agents`
--
ALTER TABLE `missions_agents`
  ADD PRIMARY KEY (`missions_id`,`agents_id`),
  ADD KEY `IDX_5340AFB917C042CF` (`missions_id`),
  ADD KEY `IDX_5340AFB9709770DC` (`agents_id`);

--
-- Index pour la table `missions_cibles`
--
ALTER TABLE `missions_cibles`
  ADD PRIMARY KEY (`missions_id`,`cibles_id`),
  ADD KEY `IDX_6C327F1417C042CF` (`missions_id`),
  ADD KEY `IDX_6C327F149E046BDF` (`cibles_id`);

--
-- Index pour la table `missions_contacts`
--
ALTER TABLE `missions_contacts`
  ADD PRIMARY KEY (`missions_id`,`contacts_id`),
  ADD KEY `IDX_FA54446417C042CF` (`missions_id`),
  ADD KEY `IDX_FA544464719FB48E` (`contacts_id`);

--
-- Index pour la table `missions_planques`
--
ALTER TABLE `missions_planques`
  ADD PRIMARY KEY (`missions_id`,`planques_id`),
  ADD KEY `IDX_F9E5FE8A17C042CF` (`missions_id`),
  ADD KEY `IDX_F9E5FE8A70AF8C0F` (`planques_id`);

--
-- Index pour la table `nationalite`
--
ALTER TABLE `nationalite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_349F3CAE1B063272` (`nationalite_id`);

--
-- Index pour la table `planques`
--
ALTER TABLE `planques`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_30F1AF9DC54C8C93` (`type_id`),
  ADD KEY `IDX_30F1AF9DA6E44244` (`pays_id`);

--
-- Index pour la table `specialite`
--
ALTER TABLE `specialite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `statumission`
--
ALTER TABLE `statumission`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `typemission`
--
ALTER TABLE `typemission`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `typeplanque`
--
ALTER TABLE `typeplanque`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `cibles`
--
ALTER TABLE `cibles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `missions`
--
ALTER TABLE `missions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `nationalite`
--
ALTER TABLE `nationalite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `planques`
--
ALTER TABLE `planques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `specialite`
--
ALTER TABLE `specialite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `statumission`
--
ALTER TABLE `statumission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `typemission`
--
ALTER TABLE `typemission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `typeplanque`
--
ALTER TABLE `typeplanque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `agents`
--
ALTER TABLE `agents`
  ADD CONSTRAINT `FK_9596AB6E1B063272` FOREIGN KEY (`nationalite_id`) REFERENCES `nationalite` (`id`);

--
-- Contraintes pour la table `agents_specialite`
--
ALTER TABLE `agents_specialite`
  ADD CONSTRAINT `FK_968C1802195E0F0` FOREIGN KEY (`specialite_id`) REFERENCES `specialite` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_968C180709770DC` FOREIGN KEY (`agents_id`) REFERENCES `agents` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `cibles`
--
ALTER TABLE `cibles`
  ADD CONSTRAINT `FK_AAE47BC31B063272` FOREIGN KEY (`nationalite_id`) REFERENCES `nationalite` (`id`);

--
-- Contraintes pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `FK_334015731B063272` FOREIGN KEY (`nationalite_id`) REFERENCES `nationalite` (`id`);

--
-- Contraintes pour la table `missions`
--
ALTER TABLE `missions`
  ADD CONSTRAINT `FK_34F1D47E2195E0F0` FOREIGN KEY (`specialite_id`) REFERENCES `specialite` (`id`),
  ADD CONSTRAINT `FK_34F1D47EA6E44244` FOREIGN KEY (`pays_id`) REFERENCES `pays` (`id`),
  ADD CONSTRAINT `FK_34F1D47EC54C8C93` FOREIGN KEY (`type_id`) REFERENCES `typemission` (`id`),
  ADD CONSTRAINT `FK_34F1D47EF6203804` FOREIGN KEY (`statut_id`) REFERENCES `statumission` (`id`);

--
-- Contraintes pour la table `missions_agents`
--
ALTER TABLE `missions_agents`
  ADD CONSTRAINT `FK_5340AFB917C042CF` FOREIGN KEY (`missions_id`) REFERENCES `missions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_5340AFB9709770DC` FOREIGN KEY (`agents_id`) REFERENCES `agents` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `missions_cibles`
--
ALTER TABLE `missions_cibles`
  ADD CONSTRAINT `FK_6C327F1417C042CF` FOREIGN KEY (`missions_id`) REFERENCES `missions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_6C327F149E046BDF` FOREIGN KEY (`cibles_id`) REFERENCES `cibles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `missions_contacts`
--
ALTER TABLE `missions_contacts`
  ADD CONSTRAINT `FK_FA54446417C042CF` FOREIGN KEY (`missions_id`) REFERENCES `missions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_FA544464719FB48E` FOREIGN KEY (`contacts_id`) REFERENCES `contacts` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `missions_planques`
--
ALTER TABLE `missions_planques`
  ADD CONSTRAINT `FK_F9E5FE8A17C042CF` FOREIGN KEY (`missions_id`) REFERENCES `missions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_F9E5FE8A70AF8C0F` FOREIGN KEY (`planques_id`) REFERENCES `planques` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `pays`
--
ALTER TABLE `pays`
  ADD CONSTRAINT `FK_349F3CAE1B063272` FOREIGN KEY (`nationalite_id`) REFERENCES `nationalite` (`id`);

--
-- Contraintes pour la table `planques`
--
ALTER TABLE `planques`
  ADD CONSTRAINT `FK_30F1AF9DA6E44244` FOREIGN KEY (`pays_id`) REFERENCES `pays` (`id`),
  ADD CONSTRAINT `FK_30F1AF9DC54C8C93` FOREIGN KEY (`type_id`) REFERENCES `typeplanque` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
