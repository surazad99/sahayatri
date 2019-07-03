-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2019 at 12:23 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sahayatri`
--

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `name`) VALUES
(1, 'kathmandu'),
(2, 'Pokhara'),
(3, 'Butwal'),
(4, 'Chitwan');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `package_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `package_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-06-28 04:23:25', '2019-06-28 04:23:25'),
(2, 2, '2019-06-28 04:25:04', '2019-06-28 04:25:04'),
(3, 2, '2019-06-29 12:23:56', '2019-06-29 12:23:56');

-- --------------------------------------------------------

--
-- Table structure for table `group_user`
--

CREATE TABLE `group_user` (
  `group_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_user`
--

INSERT INTO `group_user` (`group_id`, `user_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `destination_id` int(10) UNSIGNED NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `destination_id`, `url`, `created_at`, `updated_at`) VALUES
(1, 1, 'photo2.png', '2019-06-28 14:00:58', '2019-06-28 14:00:58'),
(2, 2, 'photo2.png', '2019-06-28 14:04:48', '2019-06-28 14:04:48'),
(3, 3, 'photo1.jpg', '2019-06-28 14:08:26', '2019-06-28 14:08:26'),
(4, 3, 'photo2.png', '2019-06-28 14:08:26', '2019-06-28 14:08:26'),
(5, 1, 'photo1.jpg', '2019-06-29 09:11:05', '2019-06-29 09:11:05'),
(6, 1, 'photo3.jpg', '2019-06-29 09:11:05', '2019-06-29 09:11:05'),
(7, 2, 'bench_autumn_river_lake.jpg', '2019-06-29 09:11:26', '2019-06-29 09:11:26'),
(8, 2, 'mountains_grass_trees_day.jpg', '2019-06-29 09:11:26', '2019-06-29 09:11:26'),
(9, 3, 'rock climbers.jpg', '2019-06-29 09:11:50', '2019-06-29 09:11:50'),
(10, 3, 'switzerland_mountains_landscape.jpg', '2019-06-29 09:11:50', '2019-06-29 09:11:50'),
(11, 4, 'tree_field_plain_green_sky_lonely_day_summer.jpg', '2019-06-29 09:12:07', '2019-06-29 09:12:07'),
(12, 4, 'trees_park_autumn_leaves_yellow.jpg', '2019-06-29 09:12:07', '2019-06-29 09:12:07'),
(13, 4, 'yosemite_national_park.jpg', '2019-06-29 09:12:07', '2019-06-29 09:12:07');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_06_24_130932_create_roles_table', 1),
(4, '2019_06_24_131357_create_packages_table', 2),
(5, '2019_06_24_131620_create_destinations_table', 3),
(6, '2019_06_24_131832_create_packages_destinations_table', 4),
(7, '2019_06_25_080037_create_package_destination_table', 5),
(8, '2019_06_25_080704_create_package_destination_table', 6),
(9, '2019_06_25_143014_create_user_package_table', 7),
(10, '2019_06_25_153218_create_groups_table', 8),
(11, '2019_06_25_173501_create_groups_table', 9),
(12, '2019_06_25_180947_create_groups_table', 10),
(13, '2019_06_28_080421_create_groups_table', 11),
(14, '2019_06_28_083955_create_group_user_table', 12),
(15, '2019_06_28_164554_create_images_table', 13),
(16, '2019_06_28_173044_create_images_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_of_days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `num_of_days`) VALUES
(1, 'east trekking', 10),
(2, 'Langtang Trek', 5),
(3, 'kathmandu Stay', 7),
(4, 'Romance in Chitwan', 5);

-- --------------------------------------------------------

--
-- Table structure for table `package_destination`
--

CREATE TABLE `package_destination` (
  `package_id` int(10) UNSIGNED NOT NULL,
  `destination_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_destination`
--

INSERT INTO `package_destination` (`package_id`, `destination_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 2),
(2, 3),
(2, 4),
(3, 1),
(3, 3),
(3, 4),
(4, 1),
(4, 3),
(4, 4);

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified_status` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` bigint(6) NOT NULL,
  `nationality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `verified_status`, `password`, `phone_number`, `nationality`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ram', 'ram@gmail.com', 0, 'ram123', 9841123456, 'nepali', 3, NULL, NULL, NULL),
(2, 'shyam', 'shyam@gmail.com', 1, 'shyam123', 9843567890, 'nepali', 3, NULL, NULL, NULL),
(3, 'hari', 'hari@gmail.com', 1, 'hari123', 9851012345, 'indian', 3, NULL, NULL, NULL),
(4, 'sujan', 'sujan@gmail.com', 1, 'sujan123', 9860123145, 'african', 3, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_package`
--

CREATE TABLE `user_package` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `package_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_package`
--

INSERT INTO `user_package` (`user_id`, `package_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(1, 2),
(2, 2),
(2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groups_package_id_foreign` (`package_id`);

--
-- Indexes for table `group_user`
--
ALTER TABLE `group_user`
  ADD KEY `group_user_group_id_foreign` (`group_id`),
  ADD KEY `group_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_destination_id_foreign` (`destination_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_destination`
--
ALTER TABLE `package_destination`
  ADD KEY `package_destination_package_id_foreign` (`package_id`),
  ADD KEY `package_destination_destination_id_foreign` (`destination_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_package`
--
ALTER TABLE `user_package`
  ADD KEY `user_package_user_id_foreign` (`user_id`),
  ADD KEY `user_package_package_id_foreign` (`package_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `group_user`
--
ALTER TABLE `group_user`
  ADD CONSTRAINT `group_user_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_destination_id_foreign` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `package_destination`
--
ALTER TABLE `package_destination`
  ADD CONSTRAINT `package_destination_destination_id_foreign` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `package_destination_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_package`
--
ALTER TABLE `user_package`
  ADD CONSTRAINT `user_package_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_package_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
