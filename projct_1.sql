-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2022 at 10:13 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projct_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `mobiles_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `cart_quantity` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`cart_id`, `mobiles_id`, `user_id`, `cart_quantity`, `created_at`, `updated_at`) VALUES
(15, 21, 12, 1, NULL, NULL),
(16, 30, 13, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(20, 'OPPO', 'OPPO9303oppo.jpeg', NULL, NULL, NULL),
(21, 'Xiaomi', 'Xiaomi16380Xiaomi.png', NULL, NULL, NULL),
(22, 'apple', 'apple34837applepng.png', NULL, NULL, NULL),
(23, 'SAMSUNG', 'SAMSUNG71373samsung.png', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_02_102325_categories', 1),
(6, '2021_09_02_102852_clothes', 1),
(7, '2021_09_02_102920_carts', 1),
(8, '2021_09_05_183643_add_soft_deleted_at_categories', 1),
(9, '2021_09_05_212913_add_sotf_delete_at_clothes', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mobiles`
--

CREATE TABLE `mobiles` (
  `mobiles_id` bigint(20) UNSIGNED NOT NULL,
  `mobiles_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobiles_price` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobiles_description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobiles_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobiles_quantity` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mobiles`
--

INSERT INTO `mobiles` (`mobiles_id`, `mobiles_name`, `mobiles_price`, `mobiles_description`, `mobiles_image`, `mobiles_quantity`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(21, 'A31', '5000', 'OPPO A31 (Fantasy White, 6GB RAM, 128GB Storage) with No Cost EMI/Additional Exchange Offers', 'A3136988OPPO A31 .jpg', 15, 20, NULL, NULL, NULL),
(22, 'A74', '6500', 'OPPO A74 5G (Fantastic Purple,6GB RAM,128GB Storage) with No Cost EMI/Additional Exchange Offers', 'A7455656OPPO A74 .jpg', 10, 20, NULL, NULL, NULL),
(23, 'Xiaomi 11 Lite NE ', '4000', 'Xiaomi 11 Lite NE 5G (Vinyl Black 8GB RAM 128 GB Storage) | Slimmest (6.81mm) & Lightest (158g) 5G S', 'Xiaomi 11 Lite NE 30631Xiaomi 11 Lite NE .jpg', 5, 21, NULL, NULL, NULL),
(24, 'Mi 11X', '5000', 'Mi 11X 5G (Cosmic Black 6GB RAM 128GB ROM) | SD 870 | DisplayMate A+ rated E4 AMOLED | Upto 18 Month', 'Mi 11X82308Mi 11X.jpg', 8, 21, NULL, NULL, NULL),
(25, 'Xiaomi 11T Pro ', '8000', 'Xiaomi 11T Pro 5G Hyperphone(Meteorite Black,12GB RAM,256GB Storage)|SD 888 5G|120 Hz True 10-bit AM', 'Xiaomi 11T Pro 67128Xiaomi 11T Pro .jpg', 9, 21, NULL, NULL, NULL),
(26, 'Apple iPhone 12', '10000', 'Apple iPhone 12 (128GB) - Black', 'Apple iPhone 1290796Apple iPhone 12.jpg', 10, 22, NULL, NULL, NULL),
(27, 'Apple iPhone 13 Pro', '12500', 'Apple iPhone 13 Pro (128GB) - Sierra Blue', 'Apple iPhone 13 Pro52378Apple iPhone 13 Pro.jpg', 14, 22, NULL, NULL, NULL),
(28, 'Apple iPhone XR ', '9999.99', 'Apple iPhone XR (128GB) - (Product) RED', 'Apple iPhone XR 9552Apple iPhone XR .jpg', 5, 22, NULL, NULL, NULL),
(29, 'Samsung Galaxy A03s', '80000', 'Samsung Galaxy A03s (White, 3GB RAM, 32GB Storage) with No Cost EMI/Additional Exchange Offers', 'Samsung Galaxy A03s26631Samsung Galaxy A03s.jpg', 7, 23, NULL, NULL, NULL),
(30, 'Samsung Galaxy A22 ', '4500', 'Samsung Galaxy A22 5G (Mint, 6GB RAM, 128GB Storage) with No Cost EMI/Additional Exchange Offers', 'Samsung Galaxy A22 48878Samsung Galaxy A22 .jpg', 20, 23, NULL, NULL, NULL),
(31, 'Samsung Galaxy S20 ', '9000', 'Samsung Galaxy S20 FE 5G (Cloud Navy, 8GB RAM, 128GB Storage) with No Cost EMI & Additional Exchange', 'Samsung Galaxy S20 24777Samsung Galaxy S20 .jpg', 12, 23, NULL, NULL, NULL),
(32, 'Samsung Galaxy M12 ', '3500', 'Samsung Galaxy M12 (Blue,4GB RAM, 64GB Storage) 6000 mAh with 8nm Processor | True 48 MP Quad Camera', 'Samsung Galaxy M12 40917Samsung Galaxy M12 .jpg', 18, 23, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `user_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_credit_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_is_admin` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_image`, `email_verified_at`, `user_password`, `user_credit_no`, `user_is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'hosam ali', 'ha@gmail.com', '', NULL, '20eabe5d64b0e216796e834f52d61fd0b70332fc', '', 1, NULL, NULL, NULL),
(2, 'khaled ahmed', 'ka@gmail.com', '', NULL, '20eabe5d64b0e216796e834f52d61fd0b70332fc', '12345678912345', 0, NULL, NULL, NULL),
(12, 'khaled', 'khaled@gmail.com', 'khaled32385Polish_20211212_131409826_edited.jpg', NULL, '20eabe5d64b0e216796e834f52d61fd0b70332fc', '1234567890123456', 0, NULL, NULL, NULL),
(13, 'hossam', 'hossam@gmail.com', 'hossam2319uane4l.jpg', NULL, '20eabe5d64b0e216796e834f52d61fd0b70332fc', '1234567890123456', 0, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `carts_clothes_id_foreign` (`mobiles_id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobiles`
--
ALTER TABLE `mobiles`
  ADD PRIMARY KEY (`mobiles_id`),
  ADD KEY `clothes_category_id_foreign` (`category_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_user_email_unique` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mobiles`
--
ALTER TABLE `mobiles`
  MODIFY `mobiles_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_clothes_id_foreign` FOREIGN KEY (`mobiles_id`) REFERENCES `mobiles` (`mobiles_id`),
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `mobiles`
--
ALTER TABLE `mobiles`
  ADD CONSTRAINT `clothes_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
