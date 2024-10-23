-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2024 at 08:38 PM
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
-- Database: `laravel_ecommerce_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'اردبيل', NULL, NULL),
(2, 'اصفهان', NULL, NULL),
(3, 'البرز', NULL, NULL),
(4, 'ايلام', NULL, NULL),
(5, 'آذربايجان شرقي', NULL, NULL),
(6, 'آذربايجان غربي', NULL, NULL),
(7, 'بوشهر', NULL, NULL),
(8, 'تهران', NULL, NULL),
(9, 'چهارمحال وبختياري', NULL, NULL),
(10, 'خراسان جنوبي', NULL, NULL),
(11, 'خراسان رضوي', NULL, NULL),
(12, 'خراسان شمالي', NULL, NULL),
(13, 'خوزستان', NULL, NULL),
(14, 'زنجان', NULL, NULL),
(15, 'سمنان', NULL, NULL),
(16, 'سيستان وبلوچستان', NULL, NULL),
(17, 'فارس', NULL, NULL),
(18, 'قزوين', NULL, NULL),
(19, 'قم', NULL, NULL),
(20, 'كردستان', NULL, NULL),
(21, 'كرمان', NULL, NULL),
(22, 'كرمانشاه', NULL, NULL),
(23, 'كهگيلويه وبويراحمد', NULL, NULL),
(24, 'گلستان', NULL, NULL),
(25, 'گيلان', NULL, NULL),
(26, 'لرستان', NULL, NULL),
(27, 'مازندران', NULL, NULL),
(28, 'مركزي', NULL, NULL),
(29, 'هرمزگان', NULL, NULL),
(30, 'همدان', NULL, NULL),
(31, 'يزد', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
