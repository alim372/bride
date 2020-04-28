-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2018 at 01:03 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `birde`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '$2y$10$lFWJvJ1ksi0JXSo5U.Uuuu6U8x7ZwzemrPritQqFeL1qvI/99vCOW',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `photo`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'AbdElaty', 'admin@admin.com', 'https://lorempixel.com/640/480/?39990', '$2y$10$lFWJvJ1ksi0JXSo5U.Uuuu6U8x7ZwzemrPritQqFeL1qvI/99vCOW', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_ar`, `name_en`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'sdas', 'asdas', 'https://lorempixel.com/640/480/?39990', '2018-07-29 04:10:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `elements`
--

CREATE TABLE `elements` (
  `id` int(10) UNSIGNED NOT NULL,
  `element` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `elements`
--

INSERT INTO `elements` (`id`, `element`, `package_id`, `created_at`, `updated_at`) VALUES
(1, 'asdasd', 1, '2018-07-29 22:00:00', NULL),
(2, 'asdasd', 2, '2018-07-29 22:00:00', NULL),
(3, 'asdasd', 2, '2018-07-29 22:00:00', NULL),
(4, 'asdasd', 3, '2018-07-29 22:00:00', NULL),
(5, 'asdasd', 4, '2018-07-29 22:00:00', NULL),
(6, 'asdasd', 4, '2018-07-29 22:00:00', NULL),
(7, 'asdasd', 5, '2018-07-29 22:00:00', NULL),
(8, 'asdasd', 5, '2018-07-29 22:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 1),
(12, '2018_06_25_131858_create_admins_table', 1),
(13, '2018_07_22_193949_create_categories_table', 1),
(14, '2018_07_22_194402_create_settings_table', 1),
(15, '2018_07_22_194434_create_places_table', 1),
(16, '2018_07_22_194526_create_offers_table', 1),
(17, '2018_07_22_195307_create_packages_table', 1),
(18, '2018_07_22_195432_create_elements_table', 1),
(19, '2018_07_29_200817_create_store_requests_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `description`, `image`, `price`, `place_id`, `created_at`, `updated_at`) VALUES
(1, 'asdasdasdasasd sadasdas das', 'https://lorempixel.com/640/480/?39990', '12', 1, NULL, NULL),
(2, 'asdasdasdasasd sadasdas das', 'https://lorempixel.com/640/480/?39990', '12', 1, NULL, NULL),
(3, 'asdasdasdasasd sadasdas das', 'https://lorempixel.com/640/480/?39990', '12', 1, NULL, NULL),
(4, 'asdasdasdasasd sadasdas das', 'https://lorempixel.com/640/480/?39990', '12', 1, NULL, NULL),
(5, 'asdasdasdasasd sadasdas das', 'https://lorempixel.com/640/480/?39990', '12', 1, NULL, NULL),
(6, 'asdasdasdasasd sadasdas das', 'https://lorempixel.com/640/480/?39990', '12', 1, NULL, NULL),
(7, 'asdasdasdasasd sadasdas das', 'https://lorempixel.com/640/480/?39990', '12', 1, NULL, NULL),
(8, 'asdasdasdasasd sadasdas das', 'https://lorempixel.com/640/480/?39990', '12', 1, NULL, NULL),
(9, 'asdasdasdasasd sadasdas das', 'https://lorempixel.com/640/480/?39990', '12', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `image`, `price`, `place_id`, `created_at`, `updated_at`) VALUES
(1, 'asdasd', 'https://lorempixel.com/640/480/?39990', '12', 1, '2018-07-29 22:00:00', NULL),
(2, 'asdasd', 'https://lorempixel.com/640/480/?39990', '12', 1, '2018-07-29 22:00:00', NULL),
(3, 'asdasd', 'https://lorempixel.com/640/480/?39990', '12', 1, '2018-07-29 22:00:00', NULL),
(4, 'asdasd', 'https://lorempixel.com/640/480/?39990', '12', 1, '2018-07-29 22:00:00', NULL),
(5, 'asdasd', 'https://lorempixel.com/640/480/?39990', '12', 1, '2018-07-29 22:00:00', NULL),
(6, 'asdasd', 'https://lorempixel.com/640/480/?39990', '12', 1, '2018-07-29 22:00:00', NULL),
(7, 'asdasd', 'https://lorempixel.com/640/480/?39990', '12', 1, '2018-07-29 22:00:00', NULL),
(8, 'asdasd', 'https://lorempixel.com/640/480/?39990', '12', 1, '2018-07-29 22:00:00', NULL),
(9, 'asdasd', 'https://lorempixel.com/640/480/?39990', '12', 1, '2018-07-29 22:00:00', NULL),
(10, 'asdasd', 'https://lorempixel.com/640/480/?39990', '12', 1, '2018-07-29 22:00:00', NULL),
(11, 'asdasd', 'https://lorempixel.com/640/480/?39990', '12', 1, '2018-07-29 22:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `name`, `image`, `description`, `owner_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'asdasd', 'https://lorempixel.com/640/480/?39990', 'asdasdassdas', 1, 1, NULL, '2018-07-29 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `about_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `terms_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `terms_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `about_ar`, `about_en`, `terms_ar`, `terms_en`, `mobile`, `created_at`, `updated_at`) VALUES
(1, 'عن التطبيق عن التطبيق عن التطبيق عن التطبيق عن التطبيق عن التطبيق عن التطبيق عن التطبيق عن التطبيق عن التطبيق عن التطبيق عن التطبيق عن التطبيق عن التطبيق عن التطبيق عن التطبيق عن التطبيق عن التطبيق عن التطبيق عن التطبيق عن التطبيق عن التطبيق عن التطبيق عن التطبيق عن التطبيق عن التطبيق عن التطبيق عن التطبيق عن التطبيق عن التطبيق عن التطبيق عن التطبيق عن التطبيق عن التطبيق عن التطبيق ', 'about app about app about app about app about app about app about app about app about app about app about app about app about app about app about app about app about app about app about app about app about app about app about app about app about app about app about app about app about app about app about app about app ', 'الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط الشروط ', 'terms terms terms terms terms terms terms terms terms terms terms terms terms terms terms terms terms terms terms terms terms terms terms terms terms terms terms terms terms terms terms terms terms ', '123123123123', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `store_requests`
--

CREATE TABLE `store_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store_requests`
--

INSERT INTO `store_requests` (`id`, `name`, `phone`, `message`, `category_id`, `created_at`, `updated_at`) VALUES
(2, 'المالكي', '01000000232', 'ارغب فى انشاء مكان لديكم فى التطبيق منتظر التواصل معي علي الموبيل', 1, '2018-07-29 22:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `type`, `password`, `api_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'asdas', '123123123', '2', '$2y$10$lFWJvJ1ksi0JXSo5U.Uuuu6U8x7ZwzemrPritQqFeL1qvI/99vCOW', '123', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elements`
--
ALTER TABLE `elements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `elements_package_id_index` (`package_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offers_place_id_index` (`place_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `packages_place_id_index` (`place_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`),
  ADD KEY `places_owner_id_index` (`owner_id`),
  ADD KEY `places_category_id_index` (`category_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_requests`
--
ALTER TABLE `store_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `store_requests_category_id_index` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`),
  ADD UNIQUE KEY `users_api_token_unique` (`api_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `elements`
--
ALTER TABLE `elements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `store_requests`
--
ALTER TABLE `store_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `elements`
--
ALTER TABLE `elements`
  ADD CONSTRAINT `elements_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `packages_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `places_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `places_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `store_requests`
--
ALTER TABLE `store_requests`
  ADD CONSTRAINT `store_requests_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
