-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 08 sep. 2024 à 18:00
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `management`
--

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_09_05_000704_create_products_table', 1),
(5, '2024_09_05_212207_create_carts_table', 1),
(6, '2024_09_06_200211_create_orders_table', 1),
(7, '2024_09_07_123522_create_order_items_table', 1),
(8, '2024_09_07_181228_create_notifications_table', 2);

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('432cd07f-e9e9-4c0e-a72d-56f18108c5a2', 'App\\Notifications\\OrderPlaced', 'App\\Models\\User', 1, '{\"order_id\":22,\"message\":\"Une nouvelle commande a \\u00e9t\\u00e9 pass\\u00e9e par le client \"}', NULL, '2024-09-07 19:38:27', '2024-09-07 19:38:27'),
('904ab449-c195-43e6-a1b6-243f064e2894', 'App\\Notifications\\OrderPlaced', 'App\\Models\\User', 6, '{\"order_id\":24,\"message\":\"A new order has been placed: Order #24\"}', NULL, '2024-09-08 15:06:57', '2024-09-08 15:06:57'),
('bde91158-c6e3-428c-bc59-5dd325ad1d0d', 'App\\Notifications\\OrderPlaced', 'App\\Models\\User', 1, '{\"order_id\":21,\"message\":\"Une nouvelle commande a \\u00e9t\\u00e9 pass\\u00e9e par le client \"}', NULL, '2024-09-07 18:52:20', '2024-09-07 18:52:20'),
('fef9ae7e-7028-48a4-91e1-1b024751df39', 'App\\Notifications\\OrderPlaced', 'App\\Models\\User', 5, '{\"order_id\":23,\"message\":\"A new order has been placed: Order #23\"}', NULL, '2024-09-08 14:11:18', '2024-09-08 14:11:18');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `read` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `created_at`, `updated_at`, `read`) VALUES
(1, 2, '2024-09-07 12:54:45', '2024-09-07 12:54:45', NULL),
(2, 2, '2024-09-07 13:00:43', '2024-09-07 13:00:43', NULL),
(3, 2, '2024-09-07 13:09:42', '2024-09-07 13:09:42', NULL),
(4, 4, '2024-09-07 13:20:19', '2024-09-07 13:20:19', NULL),
(5, 4, '2024-09-07 13:41:14', '2024-09-07 13:41:14', NULL),
(6, 4, '2024-09-07 13:42:01', '2024-09-07 13:42:01', NULL),
(7, 4, '2024-09-07 13:43:45', '2024-09-07 13:43:45', NULL),
(8, 4, '2024-09-07 13:44:24', '2024-09-07 13:44:24', NULL),
(9, 4, '2024-09-07 13:44:51', '2024-09-07 13:44:51', NULL),
(10, 4, '2024-09-07 14:15:03', '2024-09-07 14:15:03', NULL),
(11, 4, '2024-09-07 14:21:22', '2024-09-08 15:14:15', 'yes'),
(12, 4, '2024-09-07 14:22:47', '2024-09-08 15:14:13', 'yes'),
(13, 4, '2024-09-07 14:23:20', '2024-09-07 14:23:20', NULL),
(14, 4, '2024-09-07 14:24:04', '2024-09-08 15:14:09', 'yes'),
(15, 4, '2024-09-07 14:24:15', '2024-09-08 14:58:37', 'yes'),
(16, 4, '2024-09-07 14:24:56', '2024-09-08 14:45:47', 'yes'),
(17, 4, '2024-09-07 14:42:06', '2024-09-08 14:45:44', 'yes'),
(18, 4, '2024-09-07 14:48:16', '2024-09-08 14:45:42', 'yes'),
(19, 4, '2024-09-07 14:49:04', '2024-09-08 14:45:40', 'yes'),
(20, 4, '2024-09-07 14:50:07', '2024-09-08 14:45:29', 'yes'),
(21, 4, '2024-09-07 18:52:18', '2024-09-08 14:45:27', 'yes'),
(22, 2, '2024-09-07 19:38:25', '2024-09-08 14:43:07', 'yes'),
(23, 5, '2024-09-08 14:11:13', '2024-09-08 14:43:05', 'yes'),
(24, 6, '2024-09-08 15:06:53', '2024-09-08 15:14:07', 'yes');

-- --------------------------------------------------------

--
-- Structure de la table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, 75000.00, '2024-09-07 12:54:46', '2024-09-07 12:54:46'),
(2, 1, 2, 1, 5000.00, '2024-09-07 12:54:46', '2024-09-07 12:54:46'),
(3, 1, 3, 1, 4000.00, '2024-09-07 12:54:47', '2024-09-07 12:54:47'),
(4, 2, 1, 1, 25000.00, '2024-09-07 13:00:44', '2024-09-07 13:00:44'),
(5, 2, 2, 4, 20000.00, '2024-09-07 13:00:44', '2024-09-07 13:00:44'),
(6, 2, 3, 1, 4000.00, '2024-09-07 13:00:44', '2024-09-07 13:00:44'),
(7, 3, 1, 1, 25000.00, '2024-09-07 13:09:42', '2024-09-07 13:09:42'),
(8, 3, 2, 1, 5000.00, '2024-09-07 13:09:42', '2024-09-07 13:09:42'),
(9, 3, 3, 3, 12000.00, '2024-09-07 13:09:43', '2024-09-07 13:09:43'),
(10, 4, 1, 1, 25000.00, '2024-09-07 13:20:20', '2024-09-07 13:20:20'),
(11, 4, 2, 1, 5000.00, '2024-09-07 13:20:20', '2024-09-07 13:20:20'),
(12, 4, 3, 3, 12000.00, '2024-09-07 13:20:21', '2024-09-07 13:20:21'),
(13, 4, 4, 10, 20000.00, '2024-09-07 13:20:21', '2024-09-07 13:20:21'),
(14, 5, 4, 1, 2000.00, '2024-09-07 13:41:14', '2024-09-07 13:41:14'),
(15, 6, 3, 1, 4000.00, '2024-09-07 13:42:01', '2024-09-07 13:42:01'),
(16, 7, 4, 9, 18000.00, '2024-09-07 13:43:45', '2024-09-07 13:43:45'),
(17, 9, 3, 3, 12000.00, '2024-09-07 13:44:51', '2024-09-07 13:44:51'),
(18, 9, 4, 3, 6000.00, '2024-09-07 13:44:51', '2024-09-07 13:44:51'),
(19, 10, 3, 3, 12000.00, '2024-09-07 14:15:03', '2024-09-07 14:15:03'),
(20, 10, 4, 7, 14000.00, '2024-09-07 14:15:03', '2024-09-07 14:15:03'),
(21, 11, 1, 1, 25000.00, '2024-09-07 14:21:23', '2024-09-07 14:21:23'),
(22, 11, 2, 2, 10000.00, '2024-09-07 14:21:23', '2024-09-07 14:21:23'),
(23, 12, 1, 1, 25000.00, '2024-09-07 14:22:47', '2024-09-07 14:22:47'),
(24, 12, 2, 2, 10000.00, '2024-09-07 14:22:47', '2024-09-07 14:22:47'),
(25, 13, 2, 5, 25000.00, '2024-09-07 14:23:20', '2024-09-07 14:23:20'),
(26, 14, 2, 5, 25000.00, '2024-09-07 14:24:04', '2024-09-07 14:24:04'),
(27, 16, 3, 2, 8000.00, '2024-09-07 14:24:57', '2024-09-07 14:24:57'),
(28, 17, 4, 6, 12000.00, '2024-09-07 14:42:06', '2024-09-07 14:42:06'),
(29, 18, 4, 6, 12000.00, '2024-09-07 14:48:16', '2024-09-07 14:48:16'),
(30, 19, 4, 6, 12000.00, '2024-09-07 14:49:04', '2024-09-07 14:49:04'),
(31, 20, 2, 1, 5000.00, '2024-09-07 14:50:08', '2024-09-07 14:50:08'),
(32, 21, 2, 2, 10000.00, '2024-09-07 18:52:19', '2024-09-07 18:52:19'),
(33, 22, 3, 2, 8000.00, '2024-09-07 19:38:26', '2024-09-07 19:38:26'),
(34, 23, 1, 4, 100000.00, '2024-09-08 14:11:13', '2024-09-08 14:11:13'),
(35, 24, 1, 3, 75000.00, '2024-09-08 15:06:53', '2024-09-08 15:06:53'),
(36, 24, 2, 4, 20000.00, '2024-09-08 15:06:54', '2024-09-08 15:06:54');

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_ref` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `supplier_ref`, `name`, `stock`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 'CHARGEUR MAC', 0, 25000.00, '2024-09-07 12:53:14', '2024-09-08 15:06:54'),
(2, 1, 'Parfum Oud', 2, 5000.00, '2024-09-07 12:53:46', '2024-09-08 15:06:54'),
(3, 1, 'Durag', 36, 4000.00, '2024-09-07 12:54:08', '2024-09-07 19:38:26'),
(4, 1, 'Biscuit', 32, 2000.00, '2024-09-07 13:17:45', '2024-09-07 14:49:04'),
(5, 5, 'tidiane', 1, 20000.00, '2024-09-08 15:00:06', '2024-09-08 15:00:06'),
(6, 7, 'bisco', 1000, 20000.00, '2024-09-08 15:05:51', '2024-09-08 15:05:51');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('j646tPzLabyyGbDifCEMddl2L17fRZNUk1vJNSG1', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieUl3VEo3bHoxM2Z5YnpsdWViZjhETm4yMW9YTGVUWTJUdmdnQlI1USI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo2O30=', 1725809722);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `type` enum('admin','supplier','customer') NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `telephone`, `type`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Pape Toulé Yade', 'Yade', '773873333', 'admin', 'papiyade8@gmail.com', NULL, '$2y$12$FmriMazajuWX9mcOhQJCxurRJHZrbO8r9ZZaw/bIrfDFsGF8mk.kS', NULL, '2024-09-07 12:51:22', '2024-09-07 12:51:22'),
(2, 'Malick', 'Wane', '765439054', 'customer', 'malickwane26@gmail.com', NULL, '$2y$12$eIiDA22PP0J1ovKWY3Xo8OfiAwAQG9Gh7SoVmh1JvEiSTGIYscPVa', NULL, '2024-09-07 12:52:15', '2024-09-07 12:53:02'),
(3, 'Adama', 'Yade', '773539932', 'supplier', 'adama@webmaster.info', NULL, '$2y$12$gmoWOn2v3uZ26y88LZkNU.vjSjJPIqfMIQpmtv61Oj2leKBL3ZNO6', NULL, '2024-09-07 12:52:42', '2024-09-07 12:52:42'),
(4, 'Fallou', 'Sow', '889999999', 'supplier', 'fallou@gmail.com', NULL, '$2y$12$93n0b60lKTcM3KkutGviBef0VZZYCZ0xMztF.ry/Ki0GkGdrCUEMG', NULL, '2024-09-07 13:19:17', '2024-09-07 13:19:17'),
(5, 'admin', 'admin', '705974959', 'admin', 'admin@gmail.com', NULL, '$2y$12$PD.MVMt.pLZbwVT57F3ew.d9ozhG/oLp3MqKrkLVX0d.hxmsZSSEm', NULL, '2024-09-08 14:10:05', '2024-09-08 14:10:05'),
(6, 'customer', 'customer', '785030404', 'customer', 'customer@gmail.com', NULL, '$2y$12$j.ZYbHfIbcM4HhJJgUH9l.2TIXNMo7EvTIP2CIZqIGn1aptYR5LTa', NULL, '2024-09-08 15:02:30', '2024-09-08 15:02:30'),
(7, 'supplier', 'supplier', '761234567', 'supplier', 'supplier@gmail.com', NULL, '$2y$12$ECrVR0TznbwVFpoAdMSHLOlaxke2jjeMqQLvA0hZpH9PjnddyBitq', NULL, '2024-09-08 15:03:02', '2024-09-08 15:03:02');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_supplier_id_foreign` (`supplier_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Index pour la table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`);

--
-- Index pour la table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_supplier_ref_foreign` (`supplier_ref`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_supplier_ref_foreign` FOREIGN KEY (`supplier_ref`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
