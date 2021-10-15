-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 15 oct. 2021 à 15:16
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bizinastore`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'nomenarisoa', 'nomenarisoa.hajalalaina@gmail.com', '$2y$10$FnW/LzaMLkw3uzZLPEef/uVuIrA433eyo66CgpGDmrqQmLOkuuD2C', NULL, '2021-06-12 13:04:55', '2021-06-14 06:25:18'),
(2, 'Marielle', 'marielle.raveloarisoa@gmail.com', '$2y$10$8VSPuFCzXO.n79vXoWxly.y1Ibd4SJ7K30ZSysDJuLrF3H4vVa2Q.', NULL, '2021-06-14 05:55:55', '2021-06-14 05:55:55');

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

DROP TABLE IF EXISTS `annonces`;
CREATE TABLE IF NOT EXISTS `annonces` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `payant` int(11) DEFAULT '0',
  `status_payant` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `titre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `localisation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `etat_annonce` int(11) NOT NULL DEFAULT '1',
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorie_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_produit_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_annonce_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marque_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_produit_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `etat_produit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mode_paiement_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `annonces_annonceur_id_index` (`user_id`),
  KEY `annonces_categorie_id_index` (`categorie_id`),
  KEY `annonces_type_produit_id_index` (`type_produit_id`),
  KEY `annonces_type_annonce_id_index` (`type_annonce_id`),
  KEY `annonces_marque_id_index` (`marque_id`),
  KEY `annonces_model_produit_id_index` (`model_produit_id`),
  KEY `annonces_etat_id_index` (`etat_produit`),
  KEY `annonces_mode_paiement_id_index` (`mode_paiement_id`),
  KEY `annonces_region_id_index` (`region_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`id`, `payant`, `status_payant`, `status`, `titre`, `description`, `prix`, `email`, `phone`, `localisation`, `etat_annonce`, `user_id`, `categorie_id`, `type_produit_id`, `type_annonce_id`, `marque_id`, `model_produit_id`, `etat_produit`, `mode_paiement_id`, `region_id`, `created_at`, `updated_at`) VALUES
(20, 0, NULL, 1, 'TEST', 'Ergo ego senator inimicus, si ita vultis, homini, amicus esse, sicut semper fui, rei publicae debeo. Quid? si ipsas inimicitias, depono rei publicae causa, quis me tandem iure reprehendet, praesertim cum ego omnium meorum consiliorum atque factorum exempla semper ex summorum hominum consiliis atque factis mihi censuerim petenda.', '10000', 'nomenarisoa.hajalalaina@gmail.com', '0345266201', NULL, 1, '1', '1', NULL, NULL, NULL, NULL, NULL, '2', '2', '2021-10-05 09:43:25', '2021-10-05 09:43:25');

-- --------------------------------------------------------

--
-- Structure de la table `annonce_signals`
--

DROP TABLE IF EXISTS `annonce_signals`;
CREATE TABLE IF NOT EXISTS `annonce_signals` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `annonce_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `annonce_sub_categorie_values`
--

DROP TABLE IF EXISTS `annonce_sub_categorie_values`;
CREATE TABLE IF NOT EXISTS `annonce_sub_categorie_values` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `annonce_id` bigint(20) NOT NULL,
  `sub_category_id` bigint(20) NOT NULL,
  `value` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `annonce_sub_categorie_values`
--

INSERT INTO `annonce_sub_categorie_values` (`id`, `annonce_id`, `sub_category_id`, `value`, `created_at`, `updated_at`) VALUES
(1, 20, 1, '1', '2021-10-05 09:43:25', '2021-10-05 09:43:25'),
(2, 20, 2, 'SUB CAT 2', '2021-10-05 09:43:25', '2021-10-05 09:43:25'),
(3, 20, 3, 'SUB CAT 3', '2021-10-05 09:43:25', '2021-10-05 09:43:25'),
(4, 20, 4, 'SUB CAT 4', '2021-10-05 09:43:25', '2021-10-05 09:43:25');

-- --------------------------------------------------------

--
-- Structure de la table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `titre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `groupe_categorie_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_groupe_categorie_id_index` (`groupe_categorie_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `groupe_categorie_id`, `created_at`, `updated_at`) VALUES
(1, 'Categorie A 1', '1', NULL, NULL),
(2, 'Categorie A 2', '1', NULL, NULL),
(3, 'Categorie A 3', '1', NULL, NULL),
(4, 'Categorie A 4', '1', NULL, NULL),
(5, 'Categorie B 1', '2', NULL, NULL),
(6, 'Categorie B 2', '2', NULL, NULL),
(7, 'Categorie B 3', '2', NULL, NULL),
(8, 'Categorie B 4', '2', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forum_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_user_id_index` (`user_id`),
  KEY `comments_forum_id_index` (`forum_id`),
  KEY `comments_blog_id_index` (`blog_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `forum_id`, `blog_id`, `created_at`, `updated_at`) VALUES
(1, 'Primer réponse sur ma forum de merde mais c\'est en core 50 characaters', '1', '1', NULL, '2021-06-08 10:44:11', '2021-06-08 10:44:11'),
(2, 'tena mila mitady faux texte fa manahirana be ilay miandry 40 chaaracters', '1', '2', NULL, '2021-06-08 10:58:45', '2021-06-08 10:58:45');

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `sujet` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `message` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `sujet`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'nomenarisoa', 'nomenajah@yahoo.fr', 'Nouvelle sujet', '0345266201', 'test pour envoye une contact vers bizinastore', '2021-06-17 00:40:06', '2021-06-17 00:40:06');

-- --------------------------------------------------------

--
-- Structure de la table `conversations`
--

DROP TABLE IF EXISTS `conversations`;
CREATE TABLE IF NOT EXISTS `conversations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `annonce_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `received` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `conversations_annonce_id_index` (`annonce_id`),
  KEY `conversations_user_id_index` (`sender`),
  KEY `conversations_annonceur_id_index` (`received`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etats`
--

DROP TABLE IF EXISTS `etats`;
CREATE TABLE IF NOT EXISTS `etats` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etats`
--

INSERT INTO `etats` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Etat 1', NULL, NULL),
(2, 'Etat 2', NULL, NULL),
(3, 'Etat 3', NULL, NULL),
(4, 'Etat 4', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

DROP TABLE IF EXISTS `favoris`;
CREATE TABLE IF NOT EXISTS `favoris` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `annonce_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `favoris_annonce_id_index` (`annonce_id`),
  KEY `favoris_user_id_index` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `forums`
--

DROP TABLE IF EXISTS `forums`;
CREATE TABLE IF NOT EXISTS `forums` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `forums_user_id_index` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `forums`
--

INSERT INTO `forums` (`id`, `titre`, `content`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Titre de l\'forum', 'TEST pour envoyer une forum sur le site de bizina store. donc merci pour votre considération', '1', '2021-06-07 15:28:46', '2021-06-07 15:28:46'),
(2, 'Nouvelle sujet de forum', 'Merci de regarder ce putain de forum que j\'ai concue enviren 1h mErci', '1', '2021-06-07 15:36:57', '2021-06-07 15:36:57'),
(3, 'Titre de l\'forum', 'TEST pour envoyer une forum sur le site de bizina store. donc merci pour votre considération', '1', '2021-06-07 15:28:46', '2021-06-07 15:28:46'),
(4, 'Nouvelle sujet de forum', 'Merci de regarder ce putain de forum que j\'ai concue enviren 1h mErci', '1', '2021-06-07 15:36:57', '2021-06-07 15:36:57'),
(5, 'Titre de l\'forum', 'TEST pour envoyer une forum sur le site de bizina store. donc merci pour votre considération', '1', '2021-06-07 15:28:46', '2021-06-07 15:28:46'),
(6, 'Nouvelle sujet de forum', 'Merci de regarder ce putain de forum que j\'ai concue enviren 1h mErci', '1', '2021-06-07 15:36:57', '2021-06-07 15:36:57'),
(7, 'Titre de l\'forum', 'TEST pour envoyer une forum sur le site de bizina store. donc merci pour votre considération', '1', '2021-06-07 15:28:46', '2021-06-07 15:28:46'),
(8, 'Nouvelle sujet de forum', 'Merci de regarder ce putain de forum que j\'ai concue enviren 1h mErci', '1', '2021-06-07 15:36:57', '2021-06-07 15:36:57'),
(9, 'Titre de l\'forum', 'TEST pour envoyer une forum sur le site de bizina store. donc merci pour votre considération', '1', '2021-06-07 15:28:46', '2021-06-07 15:28:46'),
(10, 'Nouvelle sujet de forum', 'Merci de regarder ce putain de forum que j\'ai concue enviren 1h mErci', '1', '2021-06-07 15:36:57', '2021-06-07 15:36:57'),
(11, 'Titre de l\'forum', 'TEST pour envoyer une forum sur le site de bizina store. donc merci pour votre considération', '1', '2021-06-07 15:28:46', '2021-06-07 15:28:46'),
(12, 'Nouvelle sujet de forum', 'Merci de regarder ce putain de forum que j\'ai concue enviren 1h mErci', '1', '2021-06-07 15:36:57', '2021-06-07 15:36:57'),
(13, 'Titre de l\'forum', 'TEST pour envoyer une forum sur le site de bizina store. donc merci pour votre considération', '1', '2021-06-07 15:28:46', '2021-06-07 15:28:46'),
(14, 'Nouvelle sujet de forum', 'Merci de regarder ce putain de forum que j\'ai concue enviren 1h mErci', '1', '2021-06-07 15:36:57', '2021-06-07 15:36:57'),
(15, 'Titre de l\'forum', 'TEST pour envoyer une forum sur le site de bizina store. donc merci pour votre considération', '1', '2021-06-07 15:28:46', '2021-06-07 15:28:46'),
(16, 'Nouvelle sujet de forum', 'Merci de regarder ce putain de forum que j\'ai concue enviren 1h mErci', '1', '2021-06-07 15:36:57', '2021-06-07 15:36:57'),
(17, 'Titre de l\'forum', 'TEST pour envoyer une forum sur le site de bizina store. donc merci pour votre considération', '1', '2021-06-07 15:28:46', '2021-06-07 15:28:46'),
(18, 'Nouvelle sujet de forum', 'Merci de regarder ce putain de forum que j\'ai concue enviren 1h mErci', '1', '2021-06-07 15:36:57', '2021-06-07 15:36:57'),
(19, 'Titre de l\'forum', 'TEST pour envoyer une forum sur le site de bizina store. donc merci pour votre considération', '1', '2021-06-07 15:28:46', '2021-06-07 15:28:46'),
(20, 'Nouvelle sujet de forum', 'Merci de regarder ce putain de forum que j\'ai concue enviren 1h mErci', '1', '2021-06-07 15:36:57', '2021-06-07 15:36:57'),
(21, 'Titre de l\'forum', 'TEST pour envoyer une forum sur le site de bizina store. donc merci pour votre considération', '1', '2021-06-07 15:28:46', '2021-06-07 15:28:46'),
(22, 'Nouvelle sujet de forum', 'Merci de regarder ce putain de forum que j\'ai concue enviren 1h mErci', '1', '2021-06-07 15:36:57', '2021-06-07 15:36:57'),
(23, 'Titre de l\'forum', 'TEST pour envoyer une forum sur le site de bizina store. donc merci pour votre considération', '1', '2021-06-07 15:28:46', '2021-06-07 15:28:46'),
(24, 'Nouvelle sujet de forum', 'Merci de regarder ce putain de forum que j\'ai concue enviren 1h mErci', '1', '2021-06-07 15:36:57', '2021-06-07 15:36:57'),
(25, 'Titre de l\'forum', 'TEST pour envoyer une forum sur le site de bizina store. donc merci pour votre considération', '1', '2021-06-07 15:28:46', '2021-06-07 15:28:46'),
(26, 'Nouvelle sujet de forum', 'Merci de regarder ce putain de forum que j\'ai concue enviren 1h mErci', '1', '2021-06-07 15:36:57', '2021-06-07 15:36:57'),
(27, 'Titre de l\'forum', 'TEST pour envoyer une forum sur le site de bizina store. donc merci pour votre considération', '1', '2021-06-07 15:28:46', '2021-06-07 15:28:46'),
(28, 'Nouvelle sujet de forum', 'Merci de regarder ce putain de forum que j\'ai concue enviren 1h mErci', '1', '2021-06-07 15:36:57', '2021-06-07 15:36:57'),
(29, 'Titre de l\'forum', 'TEST pour envoyer une forum sur le site de bizina store. donc merci pour votre considération', '1', '2021-06-07 15:28:46', '2021-06-07 15:28:46'),
(30, 'Nouvelle sujet de forum', 'Merci de regarder ce putain de forum que j\'ai concue enviren 1h mErci', '1', '2021-06-07 15:36:57', '2021-06-07 15:36:57'),
(31, 'Titre de l\'forum', 'TEST pour envoyer une forum sur le site de bizina store. donc merci pour votre considération', '1', '2021-06-07 15:28:46', '2021-06-07 15:28:46'),
(32, 'Nouvelle sujet de forum', 'Merci de regarder ce putain de forum que j\'ai concue enviren 1h mErci', '1', '2021-06-07 15:36:57', '2021-06-07 15:36:57');

-- --------------------------------------------------------

--
-- Structure de la table `group_categories`
--

DROP TABLE IF EXISTS `group_categories`;
CREATE TABLE IF NOT EXISTS `group_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `group_categories`
--

INSERT INTO `group_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Categorie A', NULL, NULL),
(2, 'Categorie B', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `historique_searches`
--

DROP TABLE IF EXISTS `historique_searches`;
CREATE TABLE IF NOT EXISTS `historique_searches` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `categorie_id` varchar(191) DEFAULT NULL,
  `region_id` varchar(191) DEFAULT NULL,
  `user_id` varchar(191) DEFAULT NULL,
  `query` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `folder` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `url`, `folder`, `created_at`, `updated_at`) VALUES
(1, 'dell.png1622738617.png', 'annonce/image_user_id_1/annon_er__1', '2021-06-03 13:43:37', '2021-06-03 13:43:37'),
(2, 'compte.PNG1622738617.jpg', 'annonce/image_user_id_1/annon_er__1', '2021-06-03 13:43:37', '2021-06-03 13:43:37'),
(3, 'dell.png1622743485.png', 'annonce/image_user_id_1/annon_er__1', '2021-06-03 15:04:45', '2021-06-03 15:04:45'),
(4, 'compte.PNG1622743485.jpg', 'annonce/image_user_id_1/annon_er__1', '2021-06-03 15:04:45', '2021-06-03 15:04:45'),
(5, 'Galaxy_S10_series_One_UI_3.0_update.jpg1624436306.jpg', 'annonce/image_user_id_1/samsung_galaxy_s10', '2021-06-23 05:18:26', '2021-06-23 05:18:26'),
(6, 'index.jpg1624436306.jpg', 'annonce/image_user_id_1/samsung_galaxy_s10', '2021-06-23 05:18:26', '2021-06-23 05:18:26'),
(7, 'Madagascar-regions.png1624437163.png', 'annonce/image_user_id_1/ordinateur_hp', '2021-06-23 05:32:43', '2021-06-23 05:32:43'),
(8, 'Capture yvon kamena.PNG1624437163.PNG', 'annonce/image_user_id_1/ordinateur_hp', '2021-06-23 05:32:43', '2021-06-23 05:32:43'),
(9, 'Capture Réseaux.PNG1624437163.PNG', 'annonce/image_user_id_1/ordinateur_hp', '2021-06-23 05:32:43', '2021-06-23 05:32:43'),
(10, 'téléchargement.png1633437482.png', 'annonce/image_user_id_1/test', '2021-10-05 09:38:02', '2021-10-05 09:38:02'),
(11, 'téléchargement.png1633437805.png', 'annonce/image_user_id_1/test', '2021-10-05 09:43:25', '2021-10-05 09:43:25');

-- --------------------------------------------------------

--
-- Structure de la table `image_annonces`
--

DROP TABLE IF EXISTS `image_annonces`;
CREATE TABLE IF NOT EXISTS `image_annonces` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annonce_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `image_annonces_image_id_index` (`image_id`),
  KEY `image_annonces_annonce_id_index` (`annonce_id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `image_annonces`
--

INSERT INTO `image_annonces` (`id`, `image_id`, `annonce_id`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '2021-06-03 13:43:37', '2021-06-03 13:43:37'),
(2, '2', '1', '2021-06-03 13:43:37', '2021-06-03 13:43:37'),
(3, '3', '2', '2021-06-03 15:04:45', '2021-06-03 15:04:45'),
(4, '4', '2', '2021-06-03 15:04:45', '2021-06-03 15:04:45'),
(5, '3', '3', '2021-06-03 15:04:45', '2021-06-03 15:04:45'),
(6, '4', '3', '2021-06-03 15:04:45', '2021-06-03 15:04:45'),
(7, '3', '4', '2021-06-03 15:04:45', '2021-06-03 15:04:45'),
(8, '4', '4', '2021-06-03 15:04:45', '2021-06-03 15:04:45'),
(9, '3', '5', '2021-06-03 15:04:45', '2021-06-03 15:04:45'),
(10, '4', '5', '2021-06-03 15:04:45', '2021-06-03 15:04:45'),
(11, '3', '6', '2021-06-03 15:04:45', '2021-06-03 15:04:45'),
(12, '4', '6', '2021-06-03 15:04:45', '2021-06-03 15:04:45'),
(13, '3', '7', '2021-06-03 15:04:45', '2021-06-03 15:04:45'),
(14, '4', '7', '2021-06-03 15:04:45', '2021-06-03 15:04:45'),
(15, '3', '8', '2021-06-03 15:04:45', '2021-06-03 15:04:45'),
(16, '4', '8', '2021-06-03 15:04:45', '2021-06-03 15:04:45'),
(17, '1', '9', '2021-06-03 13:43:37', '2021-06-03 13:43:37'),
(18, '2', '9', '2021-06-03 13:43:37', '2021-06-03 13:43:37'),
(19, '3', '10', '2021-06-03 15:04:45', '2021-06-03 15:04:45'),
(20, '4', '10', '2021-06-03 15:04:45', '2021-06-03 15:04:45'),
(21, '3', '3', '2021-06-03 15:04:45', '2021-06-03 15:04:45'),
(22, '4', '11', '2021-06-03 15:04:45', '2021-06-03 15:04:45'),
(23, '3', '11', '2021-06-03 15:04:45', '2021-06-03 15:04:45'),
(24, '4', '12', '2021-06-03 15:04:45', '2021-06-03 15:04:45'),
(25, '3', '12', '2021-06-03 15:04:45', '2021-06-03 15:04:45'),
(26, '4', '13', '2021-06-03 15:04:45', '2021-06-03 15:04:45'),
(27, '3', '13', '2021-06-03 15:04:45', '2021-06-03 15:04:45'),
(28, '4', '14', '2021-06-03 15:04:45', '2021-06-03 15:04:45'),
(29, '3', '14', '2021-06-03 15:04:45', '2021-06-03 15:04:45'),
(30, '4', '15', '2021-06-03 15:04:45', '2021-06-03 15:04:45'),
(31, '3', '15', '2021-06-03 15:04:45', '2021-06-03 15:04:45'),
(32, '4', '16', '2021-06-03 15:04:45', '2021-06-03 15:04:45'),
(33, '5', '17', '2021-06-23 05:18:26', '2021-06-23 05:18:26'),
(34, '6', '17', '2021-06-23 05:18:26', '2021-06-23 05:18:26'),
(35, '7', '18', '2021-06-23 05:32:43', '2021-06-23 05:32:43'),
(36, '8', '18', '2021-06-23 05:32:43', '2021-06-23 05:32:43'),
(37, '9', '18', '2021-06-23 05:32:43', '2021-06-23 05:32:43'),
(38, '10', '19', '2021-10-05 09:38:02', '2021-10-05 09:38:02'),
(39, '11', '20', '2021-10-05 09:43:25', '2021-10-05 09:43:25');

-- --------------------------------------------------------

--
-- Structure de la table `marques`
--

DROP TABLE IF EXISTS `marques`;
CREATE TABLE IF NOT EXISTS `marques` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `marques`
--

INSERT INTO `marques` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Marque 1', NULL, NULL),
(2, 'Marque 2', NULL, NULL),
(3, 'Marque 3', NULL, NULL),
(4, 'Marque 4', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `conversation_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `messages_conversation_id_index` (`conversation_id`),
  KEY `messages_user_id_index` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_05_31_100909_create_annonces_table', 1),
(5, '2021_05_31_100929_create_annonceurs_table', 1),
(6, '2021_05_31_100937_create_categories_table', 1),
(7, '2021_05_31_100951_create_type_produits_table', 1),
(8, '2021_05_31_100959_create_type_annonces_table', 1),
(9, '2021_05_31_101008_create_marques_table', 1),
(10, '2021_05_31_101025_create_model_produits_table', 1),
(11, '2021_05_31_101043_create_images_table', 1),
(12, '2021_05_31_101104_create_mode_paiements_table', 1),
(13, '2021_05_31_101117_create_regions_table', 1),
(14, '2021_05_31_101133_create_group_categories_table', 1),
(15, '2021_05_31_101148_create_image_annonces_table', 1),
(16, '2021_05_31_102155_create_etats_table', 1),
(21, '2021_06_07_043318_create_messages_table', 3),
(18, '2021_06_07_043225_create_conversations_table', 2),
(20, '2021_06_03_083614_create_blogs_table', 3),
(22, '2021_06_07_150712_create_forums_table', 4),
(23, '2021_06_07_151454_create_comments_table', 4),
(24, '2021_06_09_062327_create_favoris_table', 5);

-- --------------------------------------------------------

--
-- Structure de la table `model_produits`
--

DROP TABLE IF EXISTS `model_produits`;
CREATE TABLE IF NOT EXISTS `model_produits` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `model_produits`
--

INSERT INTO `model_produits` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Modèle 1', NULL, NULL),
(2, 'Modèle 2', NULL, NULL),
(3, 'Modèle 3', NULL, NULL),
(4, 'Modèle 4', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `mode_paiements`
--

DROP TABLE IF EXISTS `mode_paiements`;
CREATE TABLE IF NOT EXISTS `mode_paiements` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `mode_paiements`
--

INSERT INTO `mode_paiements` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Mode de paiement 1', NULL, NULL),
(2, 'Mode de paiement 2', NULL, NULL),
(3, 'Mode de paiement 3', NULL, NULL),
(4, 'Mode de paiement 4', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `page_textes`
--

DROP TABLE IF EXISTS `page_textes`;
CREATE TABLE IF NOT EXISTS `page_textes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `apropos` longtext COLLATE utf8mb4_unicode_ci,
  `aide` longtext COLLATE utf8mb4_unicode_ci,
  `mention_legale` longtext COLLATE utf8mb4_unicode_ci,
  `cgu` longtext COLLATE utf8mb4_unicode_ci,
  `cgv` longtext COLLATE utf8mb4_unicode_ci,
  `vie_priver` longtext COLLATE utf8mb4_unicode_ci,
  `contact` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `page_textes`
--

INSERT INTO `page_textes` (`id`, `apropos`, `aide`, `mention_legale`, `cgu`, `cgv`, `vie_priver`, `contact`, `created_at`, `updated_at`) VALUES
(1, '<p>Quam ob rem vita quidem talis fuit vel fortuna vel gloria, ut nihil posset accedere, moriendi autem sensum celeritas abstulit; quo de genere mortis difficile dictu est; quid homines suspicentur, videtis; hoc vere tamen licet dicere, P. Scipioni ex multis diebus, quos in vita celeberrimos laetissimosque viderit, illum diem clarissimum fuisse, cum senatu dimisso domum reductus ad vesperum est a patribus conscriptis, populo Romano, sociis et Latinis, pridie quam excessit e vita, ut ex tam alto dignitatis gradu ad superos videatur deos potius quam ad inferos pervenisse.<br>Quam ob rem vita quidem talis fuit vel fortuna vel gloria, ut nihil posset accedere, moriendi autem sensum celeritas abstulit; quo de genere mortis difficile dictu est; quid homines suspicentur, videtis; hoc vere tamen licet dicere, P. Scipioni ex multis diebus, quos in vita celeberrimos laetissimosque viderit, illum diem clarissimum fuisse, cum senatu dimisso domum reductus ad vesperum est a patribus conscriptis, populo Romano, sociis et Latinis, pridie quam excessit e vita, ut ex tam alto dignitatis gradu ad superos videatur deos potius quam ad inferos pervenisse.<br>Vbi curarum abiectis ponderibus aliis tamquam nodum et codicem difficillimum Caesarem convellere nisu valido cogitabat, eique deliberanti cum proximis clandestinis conloquiis et nocturnis qua vi, quibusve commentis id fieret, antequam effundendis rebus pertinacius incumberet confidentia, acciri mollioribus scriptis per simulationem tractatus publici nimis urgentis eundem placuerat Gallum, ut auxilio destitutus sine ullo interiret obstaculo.<br>Et quoniam apud eos ut in capite mundi morborum acerbitates celsius dominantur, ad quos vel sedandos omnis professio medendi torpescit, excogitatum est adminiculum sospitale nequi amicum perferentem similia videat, additumque est cautionibus paucis remedium aliud satis validum, ut famulos percontatum missos quem ad modum valeant noti hac aegritudine colligati, non ante recipiant domum quam lavacro purgaverint corpus. ita etiam alienis oculis visa metuitur labes.<br>Proinde concepta rabie saeviore, quam desperatio incendebat et fames, amplificatis viribus ardore incohibili in excidium urbium matris Seleuciae efferebantur, quam comes tuebatur Castricius tresque legiones bellicis sudoribus induratae.<br>Dumque ibi diu moratur commeatus opperiens, quorum translationem ex Aquitania verni imbres solito crebriores prohibebant auctique torrentes, Herculanus advenit protector domesticus, Hermogenis ex magistro equitum filius, apud Constantinopolim, ut supra rettulimus, populari quondam turbela discerpti. quo verissime referente quae Gallus egerat, damnis super praeteritis maerens et futurorum timore suspensus angorem animi quam diu potuit emendabat.<br>Ciliciam vero, quae Cydno amni exultat, Tarsus nobilitat, urbs perspicabilis hanc condidisse Perseus memoratur, Iovis filius et Danaes, vel certe ex Aethiopia profectus Sandan quidam nomine vir opulentus et nobilis et Anazarbus auctoris vocabulum referens, et Mopsuestia vatis illius domicilium Mopsi, quem a conmilitio Argonautarum cum aureo vellere direpto redirent, errore abstractum delatumque ad Africae litus mors repentina consumpsit, et ex eo cespite punico tecti manes eius heroici dolorum varietati medentur plerumque sospitales.<br>Ex turba vero imae sortis et paupertinae in tabernis aliqui pernoctant vinariis, non nulli velariis umbraculorum theatralium latent, quae Campanam imitatus lasciviam Catulus in aedilitate sua suspendit omnium primus; aut pugnaciter aleis certant turpi sono fragosis naribus introrsum reducto spiritu concrepantes; aut quod est studiorum omnium maximum ab ortu lucis ad vesperam sole fatiscunt vel pluviis, per minutias aurigarum equorumque praecipua vel delicta scrutantes.<br>Accenderat super his incitatum propositum ad nocendum aliqua mulier vilis, quae ad palatium ut poposcerat intromissa insidias ei latenter obtendi prodiderat a militibus obscurissimis. quam Constantina exultans ut in tuto iam locata mariti salute muneratam vehiculoque inpositam per regiae ianuas emisit in publicum, ut his inlecebris alios quoque ad indicanda proliceret paria vel maiora.<br>Hacque adfabilitate confisus cum eadem postridie feceris, ut incognitus haerebis et repentinus, hortatore illo hesterno clientes numerando, qui sis vel unde venias diutius ambigente agnitus vero tandem et adscitus in amicitiam si te salutandi adsiduitati dederis triennio indiscretus et per tot dierum defueris tempus, reverteris ad paria perferenda, nec ubi esses interrogatus et quo tandem miser discesseris, aetatem omnem frustra in stipite conteres summittendo.<br><br></p>', '<h2><u><b>AIDE</b></u><br></h2><p>Quam ob rem vita quidem talis fuit vel fortuna vel gloria, ut nihil posset accedere, moriendi autem sensum celeritas abstulit; quo de genere mortis difficile dictu est; quid homines suspicentur, videtis; hoc vere tamen licet dicere, P. Scipioni ex multis diebus, quos in vita celeberrimos laetissimosque viderit, illum diem clarissimum fuisse, cum senatu dimisso domum reductus ad vesperum est a patribus conscriptis, populo Romano, sociis et Latinis, pridie quam excessit e vita, ut ex tam alto dignitatis gradu ad superos videatur deos potius quam ad inferos pervenisse.<br>Quam ob rem vita quidem talis fuit vel fortuna vel gloria, ut nihil posset accedere, moriendi autem sensum celeritas abstulit; quo de genere mortis difficile dictu est; quid homines suspicentur, videtis; hoc vere tamen licet dicere, P. Scipioni ex multis diebus, quos in vita celeberrimos laetissimosque viderit, illum diem clarissimum fuisse, cum senatu dimisso domum reductus ad vesperum est a patribus conscriptis, populo Romano, sociis et Latinis, pridie quam excessit e vita, ut ex tam alto dignitatis gradu ad superos videatur deos potius quam ad inferos pervenisse.<br>Vbi curarum abiectis ponderibus aliis tamquam nodum et codicem difficillimum Caesarem convellere nisu valido cogitabat, eique deliberanti cum proximis clandestinis conloquiis et nocturnis qua vi, quibusve commentis id fieret, antequam effundendis rebus pertinacius incumberet confidentia, acciri mollioribus scriptis per simulationem tractatus publici nimis urgentis eundem placuerat Gallum, ut auxilio destitutus sine ullo interiret obstaculo.<br>Et quoniam apud eos ut in capite mundi morborum acerbitates celsius dominantur, ad quos vel sedandos omnis professio medendi torpescit, excogitatum est adminiculum sospitale nequi amicum perferentem similia videat, additumque est cautionibus paucis remedium aliud satis validum, ut famulos percontatum missos quem ad modum valeant noti hac aegritudine colligati, non ante recipiant domum quam lavacro purgaverint corpus. ita etiam alienis oculis visa metuitur labes.<br>Proinde concepta rabie saeviore, quam desperatio incendebat et fames, amplificatis viribus ardore incohibili in excidium urbium matris Seleuciae efferebantur, quam comes tuebatur Castricius tresque legiones bellicis sudoribus induratae.<br>Dumque ibi diu moratur commeatus opperiens, quorum translationem ex Aquitania verni imbres solito crebriores prohibebant auctique torrentes, Herculanus advenit protector domesticus, Hermogenis ex magistro equitum filius, apud Constantinopolim, ut supra rettulimus, populari quondam turbela discerpti. quo verissime referente quae Gallus egerat, damnis super praeteritis maerens et futurorum timore suspensus angorem animi quam diu potuit emendabat.<br>Ciliciam vero, quae Cydno amni exultat, Tarsus nobilitat, urbs perspicabilis hanc condidisse Perseus memoratur, Iovis filius et Danaes, vel certe ex Aethiopia profectus Sandan quidam nomine vir opulentus et nobilis et Anazarbus auctoris vocabulum referens, et Mopsuestia vatis illius domicilium Mopsi, quem a conmilitio Argonautarum cum aureo vellere direpto redirent, errore abstractum delatumque ad Africae litus mors repentina consumpsit, et ex eo cespite punico tecti manes eius heroici dolorum varietati medentur plerumque sospitales.<br>Ex turba vero imae sortis et paupertinae in tabernis aliqui pernoctant vinariis, non nulli velariis umbraculorum theatralium latent, quae Campanam imitatus lasciviam Catulus in aedilitate sua suspendit omnium primus; aut pugnaciter aleis certant turpi sono fragosis naribus introrsum reducto spiritu concrepantes; aut quod est studiorum omnium maximum ab ortu lucis ad vesperam sole fatiscunt vel pluviis, per minutias aurigarum equorumque praecipua vel delicta scrutantes.<br>Accenderat super his incitatum propositum ad nocendum aliqua mulier vilis, quae ad palatium ut poposcerat intromissa insidias ei latenter obtendi prodiderat a militibus obscurissimis. quam Constantina exultans ut in tuto iam locata mariti salute muneratam vehiculoque inpositam per regiae ianuas emisit in publicum, ut his inlecebris alios quoque ad indicanda proliceret paria vel maiora.<br>Hacque adfabilitate confisus cum eadem postridie feceris, ut incognitus haerebis et repentinus, hortatore illo hesterno clientes numerando, qui sis vel unde venias diutius ambigente agnitus vero tandem et adscitus in amicitiam si te salutandi adsiduitati dederis triennio indiscretus et per tot dierum defueris tempus, reverteris ad paria perferenda, nec ubi esses interrogatus et quo tandem miser discesseris, aetatem omnem frustra in stipite conteres summittendo.<br><br></p>', '<p>FIERI, INQUAM, TRIARI, NULLO PACTO POTEST, UT NON DICAS, QUID NON PROBES EIUS, A QUO DISSENTIAS. QUID ENIM ME PROHIBERET EPICUREUM ESSE, SI PROBAREM, QUAE ILLE DICERET? CUM PRAESERTIM ILLA PERDISCERE LUDUS ESSET. QUAM OB REM DISSENTIENTIUM INTER SE REPREHENSIONES NON SUNT VITUPERANDAE, MALEDICTA, CONTUMELIAE, TUM IRACUNDIAE, CONTENTIONES CONCERTATIONESQUE IN DISPUTANDO PERTINACES INDIGNAE PHILOSOPHIA MIHI VIDERI SOLENT.<br>PAPHIUS QUIN ETIAM ET CORNELIUS SENATORES, AMBO VENENORUM ARTIBUS PRAVIS SE POLLUISSE CONFESSI, EODEM PRONUNTIANTE MAXIMINO SUNT INTERFECTI. PARI SORTE ETIAM PROCURATOR MONETAE EXTINCTUS EST. SERICUM ENIM ET ASBOLIUM SUPRA DICTOS, QUONIAM CUM HORTARETUR PASSIM NOMINARE, QUOS VELLENT, ADIECTA RELIGIONE FIRMARAT, NULLUM IGNI VEL FERRO SE PUNIRI IUSSURUM, PLUMBI VALIDIS ICTIBUS INTEREMIT. ET POST HOE FLAMMIS CAMPENSEM ARUSPICEM DEDIT, IN NEGOTIO EIUS NULLO SACRAMENTO CONSTRICTUS.<br>FUERIT TOTO IN CONSULATU SINE PROVINCIA, CUI FUERIT, ANTEQUAM DESIGNATUS EST, DECRETA PROVINCIA. SORTIETUR AN NON? NAM ET NON SORTIRI ABSURDUM EST, ET, QUOD SORTITUS SIS, NON HABERE. PROFICISCETUR PALUDATUS? QUO? QUO PERVENIRE ANTE CERTAM DIEM NON LICEBIT. IANUARIO, FEBRUARIO, PROVINCIAM NON HABEBIT; KALENDIS EI DENIQUE MARTIIS NASCETUR REPENTE PROVINCIA.<br>IAMQUE NON UMBRATIS FALLACIIS RES AGEBATUR, SED QUA PALATIUM EST EXTRA MUROS, ARMATIS OMNE CIRCUMDEDIT. INGRESSUSQUE OBSCURO IAM DIE, ABLATIS REGIIS INDUMENTIS CAESAREM TUNICA TEXIT ET PALUDAMENTO COMMUNI, EUM POST HAEC NIHIL PASSURUM VELUT MANDATO PRINCIPIS IURANDI CREBRITATE CONFIRMANS ET STATIM INQUIT EXSURGE ET INOPINUM CARPENTO PRIVATO INPOSITUM AD HISTRIAM DUXIT PROPE OPPIDUM POLAM, UBI QUONDAM PEREMPTUM CONSTANTINI FILIUM ACCEPIMUS CRISPUM.<br>ET OLIM LICET OTIOSAE SINT TRIBUS PACATAEQUE CENTURIAE ET NULLA SUFFRAGIORUM CERTAMINA SET POMPILIANI REDIERIT SECURITAS TEMPORIS, PER OMNES TAMEN QUOTQUOT SUNT PARTES TERRARUM, UT DOMINA SUSCIPITUR ET REGINA ET UBIQUE PATRUM REVERENDA CUM AUCTORITATE CANITIES POPULIQUE ROMANI NOMEN CIRCUMSPECTUM ET VERECUNDUM.<br><br></p>', '<ul><li>&nbsp;&nbsp;&nbsp; CGU<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Eodem tempore etiam Hymetii praeclarae indolis<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; His cognitis Gallus ut serpens adpetitus telo vel<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Nemo quaeso miretur, si post exsudatos labores<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Illud autem non dubitatur quod cum esset aliquando<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Eius populus ab incunabulis primis ad usque<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Saraceni tamen nec amici nobis umquam nec hostes<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Altera sententia est, quae definit amicitiam<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Procedente igitur mox tempore cum adventicium<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Dumque ibi diu moratur commeatus opperiens, quorum<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Oportunum est, ut arbitror, explanare nunc causam,<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Post emensos insuperabilis expeditionis eventus<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Alii nullo quaerente vultus severitate adsimulata<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Thalassius vero ea tempestate praefectus praetorio<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Post hoc impie perpetratum quod in aliis quoque<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Advenit post multos Scudilo Scutariorum tribunus<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Montius nos tumore inusitato quodam et novo ut<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Alii summum decus in carruchis solito altioribus<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Et est admodum mirum videre plebem innumeram<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Quod si rectum statuerimus vel concedere amicis,<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Denique Antiochensis ordinis vertices sub uno<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Cumque pertinacius ut legum gnarus accusatorem<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Hac ita persuasione reducti intra moenia<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Sed quid est quod in hac causa maxime homines<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Hacque adfabilitate confisus cum eadem postridie<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Superatis Tauri montis verticibus qui ad solis<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Quibus ita sceleste patratis Paulus cruore<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Post quorum necem nihilo lenius ferociens Gallus<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Eo adducta re per Isauriam, rege Persarum bellis<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Mensarum enim voragines et varias voluptatum<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Accenderat super his incitatum propositum ad<br>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <br>&nbsp;&nbsp;&nbsp; <br></li></ul>', '<p>CGV<br></p><p>INTER HAS RUINARUM VARIETATES A NISIBI QUAM TUEBATUR ACCITUS VRSICINUS, CUI NOS OBSECUTUROS IUNXERAT IMPERIALE PRAECEPTUM, DISPICERE LITIS EXITIALIS CERTAMINA COGEBATUR ABNUENS ET RECLAMANS, ADULATORUM OBLATRANTIBUS TURMIS, BELLICOSUS SANE MILESQUE SEMPER ET MILITUM DUCTOR SED FORENSIBUS IURGIIS LONGE DISCRETUS, QUI METU SUI DISCRIMINIS ANXIUS CUM ACCUSATORES QUAESITORESQUE SUBDITIVOS SIBI CONSOCIATOS EX ISDEM FOVEIS CERNERET EMERGENTES, QUAE CLAM PALAMVE AGITABANTUR, OCCULTIS CONSTANTIUM LITTERIS EDOCEBAT INPLORANS SUBSIDIA, QUORUM METU TUMOR NOTISSIMUS CAESARIS EXHALARET.<br>CUIUS ACERBITATI UXOR GRAVE ACCESSERAT INCENTIVUM, GERMANITATE AUGUSTI TURGIDA SUPRA MODUM, QUAM HANNIBALIANO REGI FRATRIS FILIO ANTEHAC CONSTANTINUS IUNXERAT PATER, MEGAERA QUAEDAM MORTALIS, INFLAMMATRIX SAEVIENTIS ADSIDUA, HUMANI CRUORIS AVIDA NIHIL MITIUS QUAM MARITUS; QUI PAULATIM ERUDITIORES FACTI PROCESSU TEMPORIS AD NOCENDUM PER CLANDESTINOS VERSUTOSQUE RUMIGERULOS CONPERTIS LEVITER ADDERE QUAEDAM MALE SUETOS FALSA ET PLACENTIA SIBI DISCENTES, ADFECTATI REGNI VEL ARTIUM NEFANDARUM CALUMNIAS INSONTIBUS ADFLIGEBANT.<br>MENSARUM ENIM VORAGINES ET VARIAS VOLUPTATUM INLECEBRAS, NE LONGIUS PROGREDIAR, PRAETERMITTO ILLUC TRANSITURUS QUOD QUIDAM PER AMPLA SPATIA URBIS SUBVERSASQUE SILICES SINE PERICULI METU PROPERANTES EQUOS VELUT PUBLICOS SIGNATIS QUOD DICITUR CALCEIS AGITANT, FAMILIARIUM AGMINA TAMQUAM PRAEDATORIOS GLOBOS POST TERGA TRAHENTES NE SANNIONE QUIDEM, UT AIT COMICUS, DOMI RELICTO. QUOS IMITATAE MATRONAE COMPLURES OPERTIS CAPITIBUS ET BASTERNIS PER LATERA CIVITATIS CUNCTA DISCURRUNT.<br>BATNAE MUNICIPIUM IN ANTHEMUSIA CONDITUM MACEDONUM MANU PRISCORUM AB EUPHRATE FLUMINE BREVI SPATIO DISPARATUR, REFERTUM MERCATORIBUS OPULENTIS, UBI ANNUA SOLLEMNITATE PROPE SEPTEMBRIS INITIUM MENSIS AD NUNDINAS MAGNA PROMISCUAE FORTUNAE CONVENIT MULTITUDO AD COMMERCANDA QUAE INDI MITTUNT ET SERES ALIAQUE PLURIMA VEHI TERRA MARIQUE CONSUETA.<br>DUMQUE IBI DIU MORATUR COMMEATUS OPPERIENS, QUORUM TRANSLATIONEM EX AQUITANIA VERNI IMBRES SOLITO CREBRIORES PROHIBEBANT AUCTIQUE TORRENTES, HERCULANUS ADVENIT PROTECTOR DOMESTICUS, HERMOGENIS EX MAGISTRO EQUITUM FILIUS, APUD CONSTANTINOPOLIM, UT SUPRA RETTULIMUS, POPULARI QUONDAM TURBELA DISCERPTI. QUO VERISSIME REFERENTE QUAE GALLUS EGERAT, DAMNIS SUPER PRAETERITIS MAERENS ET FUTURORUM TIMORE SUSPENSUS ANGOREM ANIMI QUAM DIU POTUIT EMENDABAT.<br>PANDENTE ITAQUE VIAM FATORUM SORTE TRISTISSIMA, QUA PRAESTITUTUM ERAT EUM VITA ET IMPERIO SPOLIARI, ITINERIBUS INTERIECTIS PERMUTATIONE IUMENTORUM EMENSIS VENIT PETOBIONEM OPPIDUM NORICORUM, UBI RESERATAE SUNT INSIDIARUM LATEBRAE OMNES, ET BARBATIO REPENTE APPARUIT COMES, QUI SUB EO DOMESTICIS PRAEFUIT, CUM APODEMIO AGENTE IN REBUS MILITES DUCENS, QUOS BENEFICIIS SUIS OPPIGNERATOS ELEGERAT IMPERATOR CERTUS NEC PRAEMIIS NEC MISERATIONE ULLA POSSE DEFLECTI.<br>HAEC IGITUR PRIMA LEX AMICITIAE SANCIATUR, UT AB AMICIS HONESTA PETAMUS, AMICORUM CAUSA HONESTA FACIAMUS, NE EXSPECTEMUS QUIDEM, DUM ROGEMUR; STUDIUM SEMPER ADSIT, CUNCTATIO ABSIT; CONSILIUM VERO DARE AUDEAMUS LIBERE. PLURIMUM IN AMICITIA AMICORUM BENE SUADENTIUM VALEAT AUCTORITAS, EAQUE ET ADHIBEATUR AD MONENDUM NON MODO APERTE SED ETIAM ACRITER, SI RES POSTULABIT, ET ADHIBITAE PAREATUR.<br>DUM APUD PERSAS, UT SUPRA NARRAVIMUS, PERFIDIA REGIS MOTUS AGITAT INSPERATOS, ET IN EOIS TRACTIBUS BELLA REDIVIVA CONSURGUNT, ANNO SEXTO DECIMO ET EO DIUTIUS POST NEPOTIANI EXITIUM, SAEVIENS PER URBEM AETERNAM UREBAT CUNCTA BELLONA, EX PRIMORDIIS MINIMIS AD CLADES EXCITA LUCTUOSAS, QUAS OBLITERASSET UTINAM IUGE SILENTIUM! NE FORTE PARIA QUANDOQUE TEMPTENTUR, PLUS EXEMPLIS GENERALIBUS NOCITURA QUAM DELICTIS.<br>EXCOGITATUM EST SUPER HIS, UT HOMINES QUIDAM IGNOTI, VILITATE IPSA PARUM CAVENDI AD COLLIGENDOS RUMORES PER ANTIOCHIAE LATERA CUNCTA DESTINARENTUR RELATURI QUAE AUDIRENT. HI PERAGRANTER ET DISSIMULANTER HONORATORUM CIRCULIS ADSISTENDO PERVADENDOQUE DIVITES DOMUS EGENTIUM HABITU QUICQUID NOSCERE POTERANT VEL AUDIRE LATENTER INTROMISSI PER POSTICAS IN REGIAM NUNTIABANT, ID OBSERVANTES CONSPIRATIONE CONCORDI, UT FINGERENT QUAEDAM ET COGNITA DUPLICARENT IN PEIUS, LAUDES VERO SUPPRIMERENT CAESARIS, QUAS INVITIS CONPLURIBUS FORMIDO MALORUM INPENDENTIUM EXPRIMEBAT.<br>INCENDERAT AUTEM AUDACES USQUE AD INSANIAM HOMINES AD HAEC, QUAE NEFARIIS EGERE CONATIBUS, LUSCUS QUIDAM CURATOR URBIS SUBITO VISUS: EOSQUE UT HEIULANS BAIOLORUM PRAECENTOR AD EXPEDIENDUM QUOD ORSI SUNT INCITANS VOCIBUS CREBRIS. QUI HAUT LONGE POSTEA IDEO VIVUS EXUSTUS EST.<br><br></p>', '<p>FIERI, INQUAM, TRIARI, NULLO PACTO POTEST, UT NON DICAS, QUID NON PROBES EIUS, A QUO DISSENTIAS. QUID ENIM ME PROHIBERET EPICUREUM ESSE, SI PROBAREM, QUAE ILLE DICERET? CUM PRAESERTIM ILLA PERDISCERE LUDUS ESSET. QUAM OB REM DISSENTIENTIUM INTER SE REPREHENSIONES NON SUNT VITUPERANDAE, MALEDICTA, CONTUMELIAE, TUM IRACUNDIAE, CONTENTIONES CONCERTATIONESQUE IN DISPUTANDO PERTINACES INDIGNAE PHILOSOPHIA MIHI VIDERI SOLENT.<br>PAPHIUS QUIN ETIAM ET CORNELIUS SENATORES, AMBO VENENORUM ARTIBUS PRAVIS SE POLLUISSE CONFESSI, EODEM PRONUNTIANTE MAXIMINO SUNT INTERFECTI. PARI SORTE ETIAM PROCURATOR MONETAE EXTINCTUS EST. SERICUM ENIM ET ASBOLIUM SUPRA DICTOS, QUONIAM CUM HORTARETUR PASSIM NOMINARE, QUOS VELLENT, ADIECTA RELIGIONE FIRMARAT, NULLUM IGNI VEL FERRO SE PUNIRI IUSSURUM, PLUMBI VALIDIS ICTIBUS INTEREMIT. ET POST HOE FLAMMIS CAMPENSEM ARUSPICEM DEDIT, IN NEGOTIO EIUS NULLO SACRAMENTO CONSTRICTUS.<br>FUERIT TOTO IN CONSULATU SINE PROVINCIA, CUI FUERIT, ANTEQUAM DESIGNATUS EST, DECRETA PROVINCIA. SORTIETUR AN NON? NAM ET NON SORTIRI ABSURDUM EST, ET, QUOD SORTITUS SIS, NON HABERE. PROFICISCETUR PALUDATUS? QUO? QUO PERVENIRE ANTE CERTAM DIEM NON LICEBIT. IANUARIO, FEBRUARIO, PROVINCIAM NON HABEBIT; KALENDIS EI DENIQUE MARTIIS NASCETUR REPENTE PROVINCIA.<br>IAMQUE NON UMBRATIS FALLACIIS RES AGEBATUR, SED QUA PALATIUM EST EXTRA MUROS, ARMATIS OMNE CIRCUMDEDIT. INGRESSUSQUE OBSCURO IAM DIE, ABLATIS REGIIS INDUMENTIS CAESAREM TUNICA TEXIT ET PALUDAMENTO COMMUNI, EUM POST HAEC NIHIL PASSURUM VELUT MANDATO PRINCIPIS IURANDI CREBRITATE CONFIRMANS ET STATIM INQUIT EXSURGE ET INOPINUM CARPENTO PRIVATO INPOSITUM AD HISTRIAM DUXIT PROPE OPPIDUM POLAM, UBI QUONDAM PEREMPTUM CONSTANTINI FILIUM ACCEPIMUS CRISPUM.<br>ET OLIM LICET OTIOSAE SINT TRIBUS PACATAEQUE CENTURIAE ET NULLA SUFFRAGIORUM CERTAMINA SET POMPILIANI REDIERIT SECURITAS TEMPORIS, PER OMNES TAMEN QUOTQUOT SUNT PARTES TERRARUM, UT DOMINA SUSCIPITUR ET REGINA ET UBIQUE PATRUM REVERENDA CUM AUCTORITATE CANITIES POPULIQUE ROMANI NOMEN CIRCUMSPECTUM ET VERECUNDUM.<br><br></p>', NULL, NULL, '2021-06-16 03:30:15');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `regions`
--

DROP TABLE IF EXISTS `regions`;
CREATE TABLE IF NOT EXISTS `regions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `regions`
--

INSERT INTO `regions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Région 1', NULL, NULL),
(2, 'Région 2', NULL, NULL),
(3, 'Région 3', NULL, NULL),
(4, 'Région 4', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sub_categories`
--

DROP TABLE IF EXISTS `sub_categories`;
CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `libelle` varchar(191) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `is_obligatoir` tinyint(1) DEFAULT '0',
  `placeholder` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `libelle`, `category_id`, `is_obligatoir`, `placeholder`, `created_at`, `updated_at`) VALUES
(1, 'sub_category_1', 'Sub Catégorye 1', 1, 0, 'Entré Sub Catégorye 1', NULL, NULL),
(2, 'sub_category_2', 'Sub Catégorye 2', 1, 0, 'Entré Sub Catégorye 2', NULL, NULL),
(3, 'sub_category_3', 'Sub Catégorye 3', 1, 0, 'Entré Sub Catégorye 3', NULL, NULL),
(4, 'sub_category_4', 'Sub Catégorye 4', 1, 1, 'Entré Sub Catégorye 4', NULL, NULL),
(5, 'sub_categoryA_1', 'Sub CatégoryeA 1', 2, 1, 'Entré Sub CatégoryeA 1', NULL, NULL),
(6, 'sub_categoryA_2', 'Sub CatégoryeA 2', 2, 0, 'Entré Sub CatégoryeA 2', NULL, NULL),
(7, 'sub_categoryA_3', 'Sub CatégoryeA 3', 2, 0, 'Entré Sub CatégoryeA 3', NULL, NULL),
(8, 'sub_categoryA_4', 'Sub CatégoryeA 4', 2, 1, 'Entré Sub CatégoryeA 4', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sub_category_lists`
--

DROP TABLE IF EXISTS `sub_category_lists`;
CREATE TABLE IF NOT EXISTS `sub_category_lists` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `sub_category_id` bigint(20) NOT NULL,
  `value` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sub_category_lists`
--

INSERT INTO `sub_category_lists` (`id`, `sub_category_id`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 'Audi', NULL, NULL),
(2, 1, 'BMW', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `type_annonces`
--

DROP TABLE IF EXISTS `type_annonces`;
CREATE TABLE IF NOT EXISTS `type_annonces` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type_produits`
--

DROP TABLE IF EXISTS `type_produits`;
CREATE TABLE IF NOT EXISTS `type_produits` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_produits`
--

INSERT INTO `type_produits` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Type Produit 1', NULL, NULL),
(2, 'Type Produit 2', NULL, NULL),
(3, 'Type Produit 3', NULL, NULL),
(4, 'Type Produit 4', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_users` int(11) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `phone`, `avatar`, `email`, `type_users`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'hajalalaina nomenarisoa', NULL, NULL, NULL, 'nomenarisoa.hajalalaina@gmail.com', 0, NULL, '$2y$10$PYCam3RGQAqLz2eHHIL/QOLZ4PdDWcQNqZ0j6rGjEq1HLo.x00TqG', NULL, '2021-06-06 04:21:34', '2021-06-23 04:06:08'),
(2, 'raveloarisoa.marielle@gmail.com', NULL, NULL, NULL, 'raveloarisoa.marielle@gmail.com', 0, NULL, '$2y$10$r2HJU35TPCztC2FSx.cm/upzW6F.iGnqifMSqKfyjtVKOpC5Q7YZu', NULL, '2021-09-24 07:57:21', '2021-09-24 07:57:21');

-- --------------------------------------------------------

--
-- Structure de la table `view_annonces`
--

DROP TABLE IF EXISTS `view_annonces`;
CREATE TABLE IF NOT EXISTS `view_annonces` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `annonce_id` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=97 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `view_annonces`
--

INSERT INTO `view_annonces` (`id`, `annonce_id`, `created_at`, `updated_at`) VALUES
(95, '20', '2021-10-15 08:49:15', '2021-10-15 08:49:15'),
(94, '20', '2021-10-15 06:13:11', '2021-10-15 06:13:11'),
(93, '20', '2021-10-15 06:01:19', '2021-10-15 06:01:19'),
(92, '20', '2021-10-15 04:52:13', '2021-10-15 04:52:13'),
(91, '20', '2021-10-15 04:52:05', '2021-10-15 04:52:05'),
(90, '20', '2021-10-15 04:51:48', '2021-10-15 04:51:48'),
(89, '20', '2021-10-15 04:51:35', '2021-10-15 04:51:35'),
(88, '20', '2021-10-15 04:51:18', '2021-10-15 04:51:18'),
(87, '20', '2021-10-15 04:50:09', '2021-10-15 04:50:09'),
(86, '20', '2021-10-15 04:49:51', '2021-10-15 04:49:51'),
(85, '20', '2021-10-15 04:48:42', '2021-10-15 04:48:42'),
(84, '20', '2021-10-15 04:47:02', '2021-10-15 04:47:02'),
(83, '20', '2021-10-15 04:46:06', '2021-10-15 04:46:06'),
(82, '20', '2021-10-15 04:45:53', '2021-10-15 04:45:53'),
(81, '20', '2021-10-15 04:45:37', '2021-10-15 04:45:37'),
(80, '20', '2021-10-15 04:44:50', '2021-10-15 04:44:50'),
(79, '20', '2021-10-15 04:44:40', '2021-10-15 04:44:40'),
(78, '20', '2021-10-15 04:44:16', '2021-10-15 04:44:16'),
(77, '20', '2021-10-15 04:44:05', '2021-10-15 04:44:05'),
(76, '20', '2021-10-15 04:43:32', '2021-10-15 04:43:32'),
(75, '20', '2021-10-15 04:42:58', '2021-10-15 04:42:58'),
(74, '20', '2021-10-15 04:42:38', '2021-10-15 04:42:38'),
(73, '20', '2021-10-15 04:42:25', '2021-10-15 04:42:25'),
(72, '20', '2021-10-15 04:41:47', '2021-10-15 04:41:47'),
(71, '20', '2021-10-15 04:41:34', '2021-10-15 04:41:34'),
(70, '20', '2021-10-15 04:40:43', '2021-10-15 04:40:43'),
(69, '20', '2021-10-15 04:40:02', '2021-10-15 04:40:02'),
(68, '20', '2021-10-15 04:39:31', '2021-10-15 04:39:31'),
(67, '20', '2021-10-15 04:38:59', '2021-10-15 04:38:59'),
(66, '20', '2021-10-15 04:38:48', '2021-10-15 04:38:48'),
(65, '20', '2021-10-15 04:38:26', '2021-10-15 04:38:26'),
(64, '20', '2021-10-15 04:31:55', '2021-10-15 04:31:55'),
(63, '20', '2021-10-15 04:31:33', '2021-10-15 04:31:33'),
(62, '20', '2021-10-15 04:31:02', '2021-10-15 04:31:02'),
(61, '20', '2021-10-15 04:30:53', '2021-10-15 04:30:53'),
(60, '20', '2021-10-15 04:28:54', '2021-10-15 04:28:54'),
(59, '20', '2021-10-15 04:27:58', '2021-10-15 04:27:58'),
(58, '20', '2021-10-15 04:24:22', '2021-10-15 04:24:22'),
(57, '20', '2021-10-05 10:31:48', '2021-10-05 10:31:48'),
(96, '20', '2021-10-15 11:24:50', '2021-10-15 11:24:50');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
