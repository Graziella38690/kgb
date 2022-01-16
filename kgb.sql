-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 15 jan. 2022 à 17:15
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

--
-- Déchargement des données de la table `agents`
--

INSERT INTO `agents` (`id`, `nationalite_id`, `nom`, `prenom`, `datedenaissance`, `codeidentification`) VALUES
(1cc53vsqwdfr613hv1, 6, 'xwcdwxcvxwvwc', 'vvcxvxcv', '1947-01-01', 'xcvcxvxcvxcv');

--
-- Déchargement des données de la table `agents_specialite`
--

INSERT INTO `agents_specialite` (`agents_id`, `specialite_id`) VALUES
(11, 6);

--
-- Déchargement des données de la table `cibles`
--

INSERT INTO `cibles` (`id`, `nationalite_id`, `nom`, `prenom`, `datedenaissance`, `nomdecode`) VALUES
(4, 7, 'FDSFDS', 'FDSFDSF', '1947-01-01', 'FDSFDSFSD');

--
-- Déchargement des données de la table `missions`
--

INSERT INTO `missions` (`id`, `type_id`, `statut_id`, `specialite_id`, `pays_id`, `titre`, `description`, `codemission`, `datededebut`, `datedefin`) VALUES
(9, NULL, NULL, 6, 9, 'cvcxv', 'cxvcxvcxv', 'vcxvxcvcxvx', '2017-01-01', '2017-01-01');

--
-- Déchargement des données de la table `missions_agents`
--

INSERT INTO `missions_agents` (`missions_id`, `agents_id`) VALUES
(9, 11);

--
-- Déchargement des données de la table `missions_cibles`
--

INSERT INTO `missions_cibles` (`missions_id`, `cibles_id`) VALUES
(9, 4);

--
-- Déchargement des données de la table `nationalite`
--

INSERT INTO `nationalite` (`id`, `nom`) VALUES
(6, 'VCXVCXVXCV'),
(7, 'xcwcwx'),
(8, 'fdqsqsfsf'),
(9, 'dsdqsdqsdf'),
(10, 'sqdqsdqsd');

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id`, `nom`, `nationalite_id`) VALUES
(9, 'CXVCXVXVjhgjghkkhgjgh', 6),
(11, 'cxwcwxcwx', 7),
(15, 'dsfqsfqs', 10);

--
-- Déchargement des données de la table `specialite`
--

INSERT INTO `specialite` (`id`, `nom`) VALUES
(6, 'hnvcnhgf');

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `roles`, `password`, `nom`, `prenom`, `datecreation`, `mail`) VALUES
(6, 'Graou', '[]', '$2y$13$VuGPTkozOmhNfORbKtRgDuvIxWXVAAsoIF78.BC5swCLZKAdYKXG.', 'Fournel', 'Graziella', '1986-01-10', NULL),
(10, 'fdsfsdf', '[]', '$2y$13$do5o/dcMqxbns6LIFakpd.adq6VcITzggrTkTZkC6pxCOECW1yIpe', 'fdfsd', 'fdsfsd', '2022-01-15', 'fdsfdsfsdf@fdsf.fr');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
