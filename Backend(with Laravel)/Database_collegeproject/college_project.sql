-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2025 at 03:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumini`
--

CREATE TABLE `alumini` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alumini`
--

INSERT INTO `alumini` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Priyanshu', 'abc@gmail.com', NULL, '$2y$12$0ImLhDDkDumRiAgJxRp5vuVGceutEPXzKvfdX75P8TOZ6nhiujijS', NULL, '2025-01-30 02:00:05', '2025-01-30 02:00:05'),
(3, 'Priyanshu', 'babanjas2002@gmail.com', NULL, '$2y$12$jhlvwVKf/mB1LnO5IqU6zOMHE2OWQmd/vmFhs4evXdv4J7zArnGyu', NULL, '2025-01-30 02:12:47', '2025-01-30 02:12:47'),
(4, 'Priyanshu', 'priyanshujash27@gmail.com', NULL, '$2y$12$IElKG.VM8Jduc2s7mTGT.e5bSh4qx4du7.w.d7Hcs0afBUz0LOHmW', NULL, '2025-02-10 08:13:53', '2025-02-13 23:46:24'),
(5, 'Priyanshu', 'bca@gmail.com', NULL, '$2y$12$ziQAyJPv54GKgQK5Vrfa2e9GQFGdA6ZHOqxocm6YjGvlucWBEs2UK', NULL, '2025-02-10 22:54:44', '2025-02-10 22:54:44'),
(6, 'baban', 'xyz@gmail.com', NULL, '$2y$12$/5N0VDPP3Z0oaM5LJB7G4O81VoS4SkTy8I6Tb7EmtXXo7JQmw0sdi', NULL, '2025-02-10 23:23:03', '2025-02-10 23:23:03'),
(7, 'baban', 'abc@xyz.com', NULL, '$2y$12$x6gpegSFFPUmM7T/kTaafeJRy1r6WyYUbB5sv2qyem6rkuv4QtTqm', NULL, '2025-02-12 23:01:46', '2025-02-12 23:01:46'),
(8, 'Rajesh', 'rajesh@gmail.com', NULL, '$2y$12$5lqtLmYcoxojSvbXQ6IvVeP1KqzsEzAnL5JSTg6RNGjRCtZZL9ofK', NULL, '2025-02-13 00:40:46', '2025-02-13 00:40:46'),
(9, 'Dhaka', 'arjundhaka2002@gmail.com', NULL, '$2y$12$9LICIYxc83Y.sy2Bq0b2nOdeMgADQVKD3oYns9I.x6v5duUYWCq2i', NULL, '2025-02-17 10:29:27', '2025-02-17 10:30:20'),
(10, 'Ankur', 'biswasankur@gmail.com', NULL, '$2y$12$7Gi49fEwTozQeldks.kREOazsiHdU4gzlxqT9pFLz4ntYrDNIvg2K', NULL, '2025-02-27 00:58:12', '2025-02-27 00:58:12'),
(11, 'Nikita', 'niki@gmail.com', NULL, '$2y$12$EGj00YfxIM3Lu8RV/JFvP.Gf4qknlq4dEhvIoptxy6RrjAd0S/UZG', NULL, '2025-04-08 01:21:32', '2025-04-08 01:21:32');

-- --------------------------------------------------------

--
-- Table structure for table `aluminipassword_reset_tokens`
--

CREATE TABLE `aluminipassword_reset_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'physicswallah', 'babanjas2002@gmail.com', NULL, '$2y$12$chX7t1mljaWbIO10pvavde1k4cJCIeq2chDp8Yl0Be8QMAtKAoiwm', NULL, '2025-02-24 09:55:58', '2025-02-24 22:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `companypassword_reset_tokens`
--

CREATE TABLE `companypassword_reset_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `jobs`
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
-- Table structure for table `job_batches`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_01_22_172513_create_alumni_table', 2),
(6, '2025_01_27_161905_create_studentpassword_reset_tokens_table', 3),
(7, '2025_01_30_064444_create_alumini_table', 3),
(10, '2025_02_13_063711_create_aluminipassword_reset_tokens', 4),
(11, '2025_02_18_061329_create_company_table', 5),
(12, '2025_02_24_144517_create_companypassword_reset_tokens', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
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
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('l5UVlCbUiS7VnJg3NJEvKpYmD53yenb6PMh7XtRI', 16, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:139.0) Gecko/20100101 Firefox/139.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRVk3YjhnRUo4eklpZGVmZUxhQVBuejNxdmpGN2dKU05rOEtobUc4YiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdHVkZW50cy1kYXNoYm9hcmQ/X3Rva2VuPUVZN2I4Z0VKOHpJaWRlZmVMYUFQbnozcXZqRjdnSlNOazhLaG1HOGIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxNjt9', 1749806314),
('nlvJE5tgitGT02JnzIfzMzNdp8GWOlPzlqgHsQcJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVDZoRDhZaGs4T25jZmJWOUZ5SGpQTlpjam1od1Nza2R4a1N5WG0yOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC90ZXN0LWluc2VydCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749801893),
('vf6Y61oZTn3tryECGnZbggZKeYqpW1GfibJlWcW6', 16, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:139.0) Gecko/20100101 Firefox/139.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiS2lhY1N3NlBkcERGbnlVdzVZOXJNWlBJRHZ4TDlwVVNSRmN0RGtxZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdHVkZW50cy1kYXNoYm9hcmQ/X3Rva2VuPUtpYWNTdzZQZHBERm55VXc1WTlyTVpQSUR2eEw5cFVTUkZjdERrcWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxNjt9', 1750394603);

-- --------------------------------------------------------

--
-- Table structure for table `studentpassword_reset_tokens`
--

CREATE TABLE `studentpassword_reset_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studentpassword_reset_tokens`
--

INSERT INTO `studentpassword_reset_tokens` (`id`, `email`, `token`, `created_at`) VALUES
(5, 'diptarkachatterjee78@gmail.com', '6FHT6TF31dllHycymEUgHLsbQSS4z6whSdBJap1WvX6pdcuDTiAGUL0RWuP8ovxF', '2025-04-29 07:44:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ghfdgh', 'abs@gmail.com', NULL, '$2y$12$dpMUBb20clKeQb3PywZzkeQCGyQFVowrX9pThggkH8aUGAY/zmNTO', NULL, '2025-01-20 22:25:46', '2025-01-20 22:25:46'),
(3, 'ghfdgh', 'abq@gmail.com', NULL, '$2y$12$ylwx8li0YeR8QHSjIvClJOiounHYepmXakqtgmU3ig9o0Jom2Hm3S', NULL, '2025-01-20 22:31:20', '2025-01-20 22:31:20'),
(4, 'abcde', 'bs@gmail.com', NULL, '$2y$12$HeOXMoUbaVJFHV9LJ8VGGumsbO9KU2at.1wZl.x23rEr.uGfKKPxu', NULL, '2025-01-20 22:36:32', '2025-01-20 22:36:32'),
(5, 'xyz', 'cbs@gmail.com', NULL, '$2y$12$HELH0fAM2.ZJKGtBNqN8.uGTgnK7neX8a0ftLaCv3eugAbdXfh2zi', NULL, '2025-01-20 22:54:10', '2025-01-20 22:54:10'),
(6, 'xyz', 'ccbs@gmail.com', NULL, '$2y$12$eEQeh6ernAYV4YsAEQP7VuskmW9CKlowTzPTnoxkRpncbhVDrASZK', NULL, '2025-01-20 22:54:41', '2025-01-20 22:54:41'),
(7, 'priyanshu', 'xx@gmail.com', NULL, '$2y$12$us9beyDcCIbXVhNaMWHn/eO9BPbL6e/Xqq4Z072vUsuvIPl.ez.cu', NULL, '2025-01-21 22:51:49', '2025-01-21 22:51:49'),
(9, 'Priyanshu', 'bbs@gfd.com', NULL, '$2y$12$Uh.nTUEAUA73Zs7l.If7eePTDxkVs6ZO4XGwgpL65RiaTG6b4Fq/6', NULL, '2025-01-26 00:27:35', '2025-01-26 00:27:35'),
(10, 'Priyanshu', 'babanjas2002@gmail.com', NULL, '$2y$12$LjxNC4S06H4L7J.qBxI6L.4lLK9uyU445wNpzCZwiFt3RfYor1D4u', NULL, '2025-01-28 10:11:35', '2025-02-25 00:23:56'),
(11, 'Priyanshu', 'zxc@gmail.com', NULL, '$2y$12$/VA94AV8yHx7YKjMXQSxyuX3Z6K3MDLTf06bSD0wlC/U/Yy5mQxS2', NULL, '2025-02-12 23:44:48', '2025-02-12 23:44:48'),
(12, 'Arjun Dhaka', 'arjundhaka2002@gmail.com', NULL, '$2y$12$paRuV3qrSNW1tvT2viZHOOQFGDzq/jLsE8tmUUcpJ.Wm6.RAOHGc2', NULL, '2025-02-17 10:26:46', '2025-02-17 10:28:06'),
(13, 'Evelyn', 'priyanshujash27@gmail.com', NULL, '$2y$12$hr6TjY1quXadQ9xWsO/mXOP9SBtgVHQ2DXy41SQ1fpAPNDnEbDr7W', NULL, '2025-02-27 01:16:15', '2025-02-27 01:16:15'),
(14, 'Nikita', 'niki@gmail.com', NULL, '$2y$12$9lbRSDnrGGrhvEF3ffiSzuhXtBrfyFWpGFJrP15d0aX/kFPbOi11i', NULL, '2025-04-08 10:58:47', '2025-04-08 10:58:47'),
(15, 'Ramit Kundu', 'Rami@gmail.com', NULL, '$2y$12$cNCnruebnd.suKvm2aw2vOHrX.qvGCYkrRpdMXwGkoAOPJT7Zc1uO', NULL, '2025-04-13 06:53:14', '2025-04-13 06:53:14'),
(16, 'Dipu', 'diptarkachatterjee78@gmail.com', NULL, '$2y$12$XX3ELSPa0UoPZyiv6k6FWuCyHwGOsLVn6hdmUypxOkT25BmI7JQc2', NULL, '2025-04-29 07:42:59', '2025-04-29 07:42:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumini`
--
ALTER TABLE `alumini`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alumini_email_unique` (`email`);

--
-- Indexes for table `aluminipassword_reset_tokens`
--
ALTER TABLE `aluminipassword_reset_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aluminipassword_reset_tokens_email_index` (`email`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `company_email_unique` (`email`);

--
-- Indexes for table `companypassword_reset_tokens`
--
ALTER TABLE `companypassword_reset_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companypassword_reset_tokens_email_index` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `studentpassword_reset_tokens`
--
ALTER TABLE `studentpassword_reset_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumini`
--
ALTER TABLE `alumini`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `aluminipassword_reset_tokens`
--
ALTER TABLE `aluminipassword_reset_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `companypassword_reset_tokens`
--
ALTER TABLE `companypassword_reset_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `studentpassword_reset_tokens`
--
ALTER TABLE `studentpassword_reset_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
