-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 17, 2019 at 11:27 AM
-- Server version: 5.7.23
-- PHP Version: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloger`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Sport', '2017-12-11 22:00:00', '2017-12-24 22:00:00'),
(3, 'General', '2016-12-11 22:00:00', '2019-01-10 11:22:19'),
(5, 'educational', '2019-01-13 12:40:21', '2019-01-13 12:40:21'),
(6, 'ahmed', '2019-01-14 08:44:13', '2019-01-14 08:44:13');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `auther_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_post_id_foreign` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `auther_name`, `body`, `post_id`, `created_at`, `updated_at`) VALUES
(4, 'ahmed', 'kju', 15, '2018-12-30 13:59:51', '2018-12-30 13:59:51'),
(5, 'ahmed', 'first comment', 8, '2018-12-30 14:00:48', '2018-12-30 14:00:48'),
(6, 'ahmed', 'hi this is comment', 26, '2019-01-14 09:29:11', '2019-01-14 09:29:11'),
(7, 'ahmed', 'cghdf', 26, '2019-01-14 10:02:27', '2019-01-14 10:02:27'),
(8, 'mostafa', 'dyjyj', 26, '2019-01-14 10:03:31', '2019-01-14 10:03:31'),
(9, 'ahmed', 'hhhhhhhhhhhhh', 26, '2019-01-14 10:17:14', '2019-01-14 10:17:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2006_10_13_005101_create_posts_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2018_12_23_121857_alter_posts_add_published_at_columns', 2),
(5, '2018_12_23_141742_create_categories_table', 2),
(6, '2006_10_12_221921_alter_user_add_slug_column', 3),
(7, '2018_12_30_112950_create_comments_table', 4),
(8, '2019_01_08_110648_Admin', 5),
(9, '2019_01_10_130157_entrust_setup_tables', 6),
(10, '2018_12_23_142604_alter_posts_add_category_id_columns', 7),
(11, '2018_12_24_110856_alter_posts_add_view_count_column', 7),
(12, '2019_01_10_210032_laratrust_setup_tables', 8),
(13, '2019_01_13_120903_entrust_setup_tables', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ahmed@aa.com', '$2y$10$y3qYhidE1RjuFcKRG7Puiud2dUI18Bg00AvwYBWofpL2lzS6xNlhq', '2019-01-15 13:19:03');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'crud-post', NULL, NULL, '2019-01-13 10:52:07', '2019-01-13 10:52:07'),
(2, 'crud-category', NULL, NULL, '2019-01-13 10:52:07', '2019-01-13 10:52:07'),
(3, 'crud-user', NULL, NULL, '2019-01-13 10:52:07', '2019-01-13 10:52:07'),
(4, 'update-others-post', NULL, NULL, '2019-01-13 10:52:07', '2019-01-13 10:52:07'),
(5, 'delete-others-post', NULL, NULL, '2019-01-13 10:52:07', '2019-01-13 10:52:07');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 1),
(4, 1),
(5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `auther_id` int(11) NOT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `provement` int(11) NOT NULL DEFAULT '0',
  `view_count` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `auther_id`, `body`, `title`, `image`, `created_at`, `updated_at`, `published_at`, `category_id`, `status`, `provement`, `view_count`) VALUES
(8, 4, 'ssss', 'MADEHA SALEM after', 'upload/1547176515.png', '2018-12-26 17:38:32', '2019-02-03 13:28:35', NULL, 2, 0, 1, 0),
(14, 4, 'ssss', 'MADEHA SALEM after', 'upload/1547176515.png', '2018-12-27 07:46:13', '2019-02-03 13:28:51', NULL, 2, 0, 1, 0),
(15, 4, 'ssss', 'MADEHA SALEM after', 'upload/1547176515.png', '2018-12-27 07:53:13', '2019-02-03 13:28:45', NULL, 2, 0, 1, 0),
(16, 4, 'ssss', 'MADEHA SALEM after', 'upload/1547176515.png', '2018-12-31 10:24:41', '2019-02-03 13:28:48', NULL, 2, 0, 1, 0),
(26, 4, 'ssss', 'MADEHA SALEM after', 'upload/1547176515.png', '2018-12-31 11:28:43', '2019-01-14 13:15:21', NULL, 2, 0, 1, 0),
(27, 4, 'ssss', 'MADEHA SALEM after editsergsaerg', 'upload/1547176515.png', '2019-01-13 13:06:41', '2019-02-03 13:28:26', NULL, 2, 0, 1, NULL),
(28, 4, 'cghkcvgh', 'bjkl', 'upload/1549207668.jpg', '2019-02-03 13:27:48', '2019-02-03 13:28:08', NULL, 2, 1, 1, NULL),
(29, 4, 'hhhhhhhhhhhhh', 'hhhhhhhhhhhhhhh', 'upload/1549207760.jpg', '2019-02-03 13:29:20', '2019-02-03 13:29:25', NULL, 3, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'Admin', '2019-01-08 22:00:00', '2019-01-06 22:00:00'),
(2, 'auther', 'auther', 'auther', '2019-01-08 22:00:00', '2019-01-06 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE IF NOT EXISTS `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `admin`) VALUES
(4, 'ahmed', 'ahmed@aa.com', '$2y$10$4/.gV3UbZSrHMkuG5uxUR.zqDSvgriJZ8hamsE.anaBy.tH6khaBi', '38a62kmz0HZ6MSEM2Cujy46VFUtl1W0QCfSvi00S92bKbArSAzvcKLxAvTzs', '2006-10-12 20:57:33', '2019-01-15 13:14:14', 1),
(5, 'mostafa', 'mostafa@mm.com', '$2y$10$4/.gV3UbZSrHMkuG5uxUR.zqDSvgriJZ8hamsE.anaBy.tH6khaBi', '5IQu8vb86EDqTBuh6o5nyxzEkQLB0fJGMzkBiGoMlPqQ5YozCJ7KqPidp4o3', '2019-01-13 10:49:21', '2019-01-15 13:20:30', 0),
(6, 'mohamed', 'sss@admin.com', '$2y$10$0s7ArlckF.9ROi5Sru2e.eAcQHCfW4ulk27C2Dj1gkqglKkVvkpLO', NULL, '2019-01-17 11:43:05', '2019-01-17 11:45:48', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
