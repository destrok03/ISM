-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 25 juin 2025 à 07:04
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_inscription`
--

-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) NOT NULL,
  `nomfiliere` varchar(100) NOT NULL,
  `niveau` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `classes`
--

INSERT INTO `classes` (`id`, `libelle`, `nomfiliere`, `niveau`, `created_at`) VALUES
(3, 'L2GlrsA', 'Glrs', 'L2', '2025-06-24 22:51:25'),
(4, 'L2GlrsB', 'Glrs', 'L2', '2025-06-24 22:52:15'),
(5, 'L1GlrsA', 'Glrs', 'L1', '2025-06-24 22:52:44'),
(6, 'IAGE', 'Informatique AppliquÃ©e Ã  la Gestion des Entreprises', 'L1', '2025-06-24 22:55:00'),
(7, 'TTL', 'Technologie Transport et Logistique', 'L3', '2025-06-24 22:55:31'),
(8, 'MP', 'Management de Projets', 'M1', '2025-06-24 22:56:01'),
(9, 'MPI', 'Management de Projets Internationaux', 'M2', '2025-06-24 22:56:50'),
(10, 'ETSE', 'Ã‰lectronique TÃ©lÃ©communications et SystÃ¨mes EmbarquÃ©s', 'L2', '2025-06-24 22:57:48');

-- --------------------------------------------------------

--
-- Structure de la table `demandes`
--

DROP TABLE IF EXISTS `demandes`;
CREATE TABLE IF NOT EXISTS `demandes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `etudiant_id` int(11) NOT NULL,
  `type_demande` varchar(100) NOT NULL,
  `raison` text NOT NULL,
  `date_demande` date NOT NULL,
  `statut` enum('Pending','Accepted','Rejected') DEFAULT 'Pending',
  PRIMARY KEY (`id`),
  KEY `etudiant_id` (`etudiant_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `demandes`
--

INSERT INTO `demandes` (`id`, `etudiant_id`, `type_demande`, `raison`, `date_demande`, `statut`) VALUES
(1, 15301, 'RelevÃ© de notes', 'je suis malade', '2025-06-25', 'Accepted');

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

DROP TABLE IF EXISTS `etudiants`;
CREATE TABLE IF NOT EXISTS `etudiants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(50) NOT NULL,
  `nom_complet` varchar(100) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `classe_id` int(11) NOT NULL,
  `annee_academique` varchar(10) NOT NULL,
  `type_inscription` enum('inscription','reinscription') NOT NULL,
  `niveau` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `matricule` (`matricule`),
  KEY `classe_id` (`classe_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`id`, `matricule`, `nom_complet`, `email`, `classe_id`, `annee_academique`, `type_inscription`, `niveau`) VALUES
(1, '15301', 'Hamet Sy', 'metza@gmail.com', 3, '2024-2025', 'inscription', 'L2');

-- --------------------------------------------------------

--
-- Structure de la table `inscriptions`
--

DROP TABLE IF EXISTS `inscriptions`;
CREATE TABLE IF NOT EXISTS `inscriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `etudiant_id` int(11) DEFAULT NULL,
  `classe_id` int(11) DEFAULT NULL,
  `annee_scolaire` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `etudiant_id` (`etudiant_id`,`annee_scolaire`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `modules`
--

DROP TABLE IF EXISTS `modules`;
CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `modules`
--

INSERT INTO `modules` (`id`, `nom`) VALUES
(1, 'Introduction Ã  la programmation ');

-- --------------------------------------------------------

--
-- Structure de la table `professeurs`
--

DROP TABLE IF EXISTS `professeurs`;
CREATE TABLE IF NOT EXISTS `professeurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_complet` varchar(150) DEFAULT NULL,
  `grade` varchar(100) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=136 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `professeurs`
--

INSERT INTO `professeurs` (`id`, `nom_complet`, `grade`, `adresse`) VALUES
(135, 'Hamet Sy', 'Professeur Titulaire', 'lac rose'),
(14, 'habib Diallo', 'Professeur Vacataire', 'Parcelles Assainies UnitÃ© 11');

-- --------------------------------------------------------

--
-- Structure de la table `professeur_classe`
--

DROP TABLE IF EXISTS `professeur_classe`;
CREATE TABLE IF NOT EXISTS `professeur_classe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `professeur_id` int(11) NOT NULL,
  `classe_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `professeur_id` (`professeur_id`),
  KEY `classe_id` (`classe_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `professeur_classe`
--

INSERT INTO `professeur_classe` (`id`, `professeur_id`, `classe_id`) VALUES
(1, 135, 9),
(2, 14, 6);

-- --------------------------------------------------------

--
-- Structure de la table `professeur_module`
--

DROP TABLE IF EXISTS `professeur_module`;
CREATE TABLE IF NOT EXISTS `professeur_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `professeur_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `professeur_id` (`professeur_id`),
  KEY `module_id` (`module_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `professeur_module`
--

INSERT INTO `professeur_module` (`id`, `professeur_id`, `module_id`) VALUES
(1, 135, 1),
(2, 14, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_complet` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom_complet`, `email`, `password`, `role`, `created_at`) VALUES
(4, 'Awa Ndiaye', 'Sy@gmail.com', '$2y$10$mzxM311PT9ZFJHSLzwqIFO3KIRSDGVLjM1B1kS/V3hj85..RlgD8y', 'ac', '2025-06-24 20:17:00'),
(3, 'Aminata Sy', 'Sy7447451@gmail.com', '$2y$10$mZr42XMQeopt7kr3G2cPlOzytbqajVF0/NpHN/ma.hZixsmWVf4TS', 'admin', '2025-06-24 20:15:58'),
(5, 'Hamet Sy', 'metza@gmail.com', '$2y$10$xTFujBxc27YVIM2f.1tFBeHit7yJFQGE0seCug8620J5qEfSmCrtO', 'etudiant', '2025-06-24 20:18:07');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
