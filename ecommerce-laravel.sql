-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2025 at 06:54 PM
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
-- Database: `ecommerce-laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `slug`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Graphic Designing', 'graphic-designing', 'Graphic Designing', 'Graphic Designing', 'Graphic Designing', 1, '2025-05-27 10:30:02', '2025-05-27 10:30:02'),
(3, 'Fashion', 'fashion', 'Fashion', 'Fashion', 'Fashion', 1, '2025-05-27 10:30:18', '2025-05-27 10:30:18');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `user_id`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Nike', 'nike', 1, 'Nike', 'Nike', 'Nike', 1, '2025-02-09 09:40:30', '2025-02-09 09:40:30'),
(2, 'Puma', 'puma', 1, 'Puma', 'Puma', 'Puma', 1, '2025-02-09 09:41:51', '2025-02-09 09:41:51');

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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `button_name` varchar(255) DEFAULT NULL,
  `is_home` int(11) NOT NULL DEFAULT 0,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'created_by',
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image_name`, `button_name`, `is_home`, `meta_title`, `meta_description`, `meta_keywords`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Jewelry & Watches', 'jewelry-watches', NULL, NULL, 0, 'Jewelry & Watches', 'Jewelry & Watches', 'Jewelry & Watches', 1, 1, '2025-02-23 01:51:27', '2025-02-23 01:51:27'),
(5, 'Sports & Outdoors', 'sports-outdoors', NULL, NULL, 0, 'Sports & Outdoors', 'Sports & Outdoors', 'Sports & Outdoors', 1, 1, '2025-02-23 01:51:54', '2025-02-23 01:51:54'),
(6, 'Toys & Games', 'toys-games', NULL, NULL, 0, 'Toys & Games', 'Toys & Games', 'Toys & Games', 1, 1, '2025-02-23 01:52:19', '2025-02-23 01:52:19'),
(7, 'Books, Movies & Music', 'books-movies-music', NULL, NULL, 0, 'Books, Movies & Music', 'Books, Movies & Music', 'Books, Movies & Music', 1, 1, '2025-02-23 01:52:47', '2025-02-23 01:52:47'),
(8, 'Beauty & Personal Care', 'beauty-personal-care', NULL, NULL, 0, 'Beauty & Personal Care', 'Beauty & Personal Care', 'Beauty & Personal Care', 1, 1, '2025-02-23 01:53:28', '2025-02-23 01:53:28'),
(9, 'Home & Furniture', 'home-furniture', '1745738742.jpg', 'Shop Now', 1, 'Home & Furniture', 'Home & Furniture', 'Home & Furniture', 1, 1, '2025-02-23 01:54:01', '2025-04-27 01:55:42'),
(10, 'Fashion', 'fashion', '1745737307.jpg', 'Shop Now', 1, 'Fashion', 'Fashion', 'Fashion', 1, 1, '2025-02-23 01:54:20', '2025-04-27 01:31:47'),
(11, 'Electronics', 'electronics', '1745736901.jpg', 'Shop Now', 1, 'Electronics', 'Electronics', 'Electronics', 1, 1, '2025-02-23 01:55:07', '2025-04-27 01:30:10');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `code`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Green', '#00ff4c', 1, 1, '2025-02-09 10:09:33', '2025-02-09 10:13:20'),
(2, 'Red', '#f40b0b', 1, 1, '2025-03-09 00:37:34', '2025-03-09 00:37:34'),
(3, 'Black', '#000000', 1, 1, '2025-03-11 05:22:33', '2025-03-11 05:22:33');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `user_id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(2, 1, 'Ravi Kumar', 'ravi@gmail.com', '09821345742', 'sfs', 'fsf', '2025-04-26 07:34:30', '2025-04-26 07:34:30'),
(3, 1, 'krish', 'krish@gmail.com', '09821345742', 'fdf', 'dfd', '2025-04-26 07:35:37', '2025-04-26 07:35:37');

-- --------------------------------------------------------

--
-- Table structure for table `discount_codes`
--

CREATE TABLE `discount_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `percent_amount` varchar(255) DEFAULT NULL,
  `expiry_date` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount_codes`
--

INSERT INTO `discount_codes` (`id`, `name`, `type`, `percent_amount`, `expiry_date`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Holi2025', 'Amount', '25', '2025-03-15', 1, '2025-03-11 05:27:01', '2025-03-11 05:39:20'),
(3, 'Pankaj', 'Percent', '5', '2025-03-14', 1, '2025-03-11 05:44:58', '2025-03-13 08:26:01');

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `question` text DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `user_id`, `question`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'How will my parcel be delivered?', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus. Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi.</p>', 1, '2025-04-13 03:03:01', '2025-04-13 03:03:01'),
(2, 1, 'Do I pay for delivery?', '<p>Ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros.</p>', 1, '2025-04-13 03:03:23', '2025-04-13 03:03:23'),
(3, 1, 'Will I be charged customs fees?', '<p>Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros.</p>', 1, '2025-04-13 03:04:20', '2025-04-13 03:04:20');

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
(7, '2025_02_07_134037_create_categories_table', 2),
(8, '2025_02_07_153515_create_sub_categories_table', 3),
(9, '2025_02_09_140251_create_brands_table', 4),
(10, '2025_02_09_150311_create_colors_table', 5),
(14, '2025_02_13_041351_create_products_table', 6),
(15, '2025_02_13_090753_create_product_colors_table', 7),
(16, '2025_02_14_092006_create_product_sizes_table', 8),
(17, '2025_02_14_105428_create_product_images_table', 9),
(18, '2025_03_11_095914_create_discount_codes_table', 10),
(19, '2025_03_11_123732_create_shipping_charges_table', 11),
(27, '2025_03_13_101124_create_orders_table', 12),
(28, '2025_03_13_101216_create_order_items_table', 12),
(32, '2025_03_18_122535_update_orders_table', 13),
(33, '2025_03_25_070644_update_orders_table', 14),
(34, '2025_03_31_100210_update_users_table', 15),
(35, '2025_03_31_115039_create_product_wishlists_table', 16),
(36, '2025_04_05_144232_create_product_reviews_table', 17),
(38, '2025_04_09_082746_create_pages_table', 18),
(42, '2025_04_09_111824_create_faqs_table', 19),
(45, '2025_04_13_100211_create_system_settings_table', 20),
(46, '2025_04_25_153804_create_contact_us_table', 21),
(47, '2025_04_26_131250_create_sliders_table', 22),
(49, '2025_04_26_150508_create_partners_table', 23),
(50, '2025_04_27_062057_update_categories_table', 24),
(51, '2025_05_27_131518_update_products_table', 25),
(52, '2025_05_27_141816_create_blog_categories_table', 25),
(54, '2025_05_27_152104_create_blog_categories_table', 26);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_number` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `address_one` varchar(255) DEFAULT NULL,
  `address_two` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `discount_code` varchar(255) DEFAULT NULL,
  `discount_amount` varchar(255) NOT NULL DEFAULT '0',
  `shipping_id` int(11) DEFAULT NULL,
  `shipping_amount` varchar(255) NOT NULL DEFAULT '0',
  `total_amount` varchar(255) NOT NULL DEFAULT '0',
  `payment_method` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 0 COMMENT '0:pending, 1:Inprogress, 2:Delivered, 3:Completed, 4:Cancelled',
  `is_payment` varchar(255) NOT NULL DEFAULT '0',
  `payment_data` text DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `stripe_session_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_number`, `first_name`, `last_name`, `company_name`, `country`, `address_one`, `address_two`, `city`, `state`, `postcode`, `phone`, `email`, `note`, `discount_code`, `discount_amount`, `shipping_id`, `shipping_amount`, `total_amount`, `payment_method`, `status`, `is_payment`, `payment_data`, `transaction_id`, `stripe_session_id`, `created_at`, `updated_at`) VALUES
(66, 1, '999999999', 'Ravi', 'Kumar', 'rkdesinger', 'India', 'd/265', 'test', 'Delhi', 'Delhi', '110043', '09821345742', 'ravi@gmail.com', 'sfs', '', '0', 2, '0', '150', 'cash', 0, '0', NULL, NULL, NULL, '2025-03-31 03:13:09', '2025-03-31 03:13:09'),
(71, 1, '99999999', 'Ravi', 'Kumar', 'rkdesinger', 'India', 'd/265', 'test', 'Delhi', 'Delhi', '110043', '09821345742', 'ravi@gmail.com', 'new', '', '0', 1, '5', '155', 'paypal', 1, '1', '{\"PayerID\":\"CP32GASGMWDHE\",\"st\":\"Completed\",\"tx\":\"8WF91674U94182513\",\"cc\":\"USD\",\"amt\":\"155.00\",\"payer_email\":\"rkconsultancy34@gmail.com\",\"payer_id\":\"CP32GASGMWDHE\",\"payer_status\":\"VERIFIED\",\"first_name\":\"John\",\"last_name\":\"Doe\",\"txn_id\":\"8WF91674U94182513\",\"mc_currency\":\"USD\",\"mc_fee\":\"6.35\",\"mc_gross\":\"155.00\",\"protection_eligibility\":\"ELIGIBLE\",\"payment_fee\":\"6.35\",\"payment_gross\":\"155.00\",\"payment_status\":\"Completed\",\"payment_type\":\"instant\",\"handling_amount\":\"0.00\",\"shipping\":\"0.00\",\"item_name\":\"E-commerce\",\"item_number\":\"71\",\"quantity\":\"1\",\"txn_type\":\"web_accept\",\"payment_date\":\"2025-04-01T06:31:46Z\",\"receiver_id\":\"85UBVEVAEQXA2\",\"notify_version\":\"UNVERSIONED\",\"verify_sign\":\"AgeTM8yoC8A3OA342pIQ2xmontTQAeSwaerQjkg4r57HeohbTqRup7Qg\"}', '8WF91674U94182513', NULL, '2025-04-01 01:01:50', '2025-04-01 01:58:41'),
(73, 1, '99999999', 'Ravi', 'Kumar', 'rkdesinger', 'India', 'd/265', 'test', 'Delhi', 'Delhi', '110043', '09821345742', 'ravi@gmail.com', '', '', '0', 2, '0', '260', 'paypal', 1, '1', '{\"PayerID\":\"CP32GASGMWDHE\",\"st\":\"Completed\",\"tx\":\"10Y55936VA5521748\",\"cc\":\"USD\",\"amt\":\"260.00\",\"payer_email\":\"rkconsultancy34@gmail.com\",\"payer_id\":\"CP32GASGMWDHE\",\"payer_status\":\"VERIFIED\",\"first_name\":\"John\",\"last_name\":\"Doe\",\"txn_id\":\"10Y55936VA5521748\",\"mc_currency\":\"USD\",\"mc_fee\":\"10.44\",\"mc_gross\":\"260.00\",\"protection_eligibility\":\"ELIGIBLE\",\"payment_fee\":\"10.44\",\"payment_gross\":\"260.00\",\"payment_status\":\"Completed\",\"payment_type\":\"instant\",\"handling_amount\":\"0.00\",\"shipping\":\"0.00\",\"item_name\":\"E-commerce\",\"item_number\":\"73\",\"quantity\":\"1\",\"txn_type\":\"web_accept\",\"payment_date\":\"2025-04-01T06:50:11Z\",\"receiver_id\":\"85UBVEVAEQXA2\",\"notify_version\":\"UNVERSIONED\",\"verify_sign\":\"ALBe4QrXe2sJhpq1rIN8JxSbK4RZAgkusraAjI4Z.rN0zsRBSsLwdHtI\"}', '10Y55936VA5521748', NULL, '2025-04-01 01:20:16', '2025-04-01 01:58:42'),
(74, 1, '99999999', 'Ravi', 'Kumar', 'rkdesinger', 'India', 'd/265', 'test', 'Delhi', 'Delhi', '110043', '09821345742', 'ravi@gmail.com', '', '', '0', 2, '0', '150', 'paypal', 1, '1', '{\"PayerID\":\"CP32GASGMWDHE\",\"st\":\"Completed\",\"tx\":\"2WF51503V0999654L\",\"cc\":\"USD\",\"amt\":\"150.00\",\"payer_email\":\"rkconsultancy34@gmail.com\",\"payer_id\":\"CP32GASGMWDHE\",\"payer_status\":\"VERIFIED\",\"first_name\":\"John\",\"last_name\":\"Doe\",\"txn_id\":\"2WF51503V0999654L\",\"mc_currency\":\"USD\",\"mc_fee\":\"6.15\",\"mc_gross\":\"150.00\",\"protection_eligibility\":\"ELIGIBLE\",\"payment_fee\":\"6.15\",\"payment_gross\":\"150.00\",\"payment_status\":\"Completed\",\"payment_type\":\"instant\",\"handling_amount\":\"0.00\",\"shipping\":\"0.00\",\"item_name\":\"E-commerce\",\"item_number\":\"74\",\"quantity\":\"1\",\"txn_type\":\"web_accept\",\"payment_date\":\"2025-04-01T06:52:09Z\",\"receiver_id\":\"85UBVEVAEQXA2\",\"notify_version\":\"UNVERSIONED\",\"verify_sign\":\"AzMNkTxgBvm9UMEVF6xwI2k3UvAsAHBpwPBdSQv6q7Qe66ldnXbrQYQ8\"}', '2WF51503V0999654L', NULL, '2025-04-01 01:22:14', '2025-04-01 01:58:43'),
(75, 1, '99999999', 'Ravi', 'Kumar', 'rkdesinger', 'India', 'd/265', 'test', 'Delhi', 'Delhi', '110043', '09821345742', 'ravi@gmail.com', '', '', '0', 2, '0', '150', 'cash', 2, '1', NULL, NULL, NULL, '2025-04-01 01:24:29', '2025-04-02 11:01:42'),
(77, 1, '66139955', 'Ravi', 'Kumar', 'rkdesinger', 'India', 'd/265', 'test', 'Delhi', 'Delhi', '110043', '09821345742', 'ravi@gmail.com', '', '', '0', 2, '0', '260', 'cash', 3, '1', NULL, NULL, NULL, '2025-04-01 01:31:52', '2025-04-05 08:29:57'),
(78, 1, '26345633', 'Ravi', 'Kumar', 'rkdesinger', 'India', 'd/265', 'test', 'Delhi', 'Delhi', '110043', '09821345742', 'ravi@gmail.com', '', '', '0', 2, '0', '260', 'cash', 0, '1', NULL, NULL, NULL, '2025-04-01 01:33:35', '2025-04-02 10:59:02');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price` varchar(255) NOT NULL DEFAULT '0',
  `color_name` varchar(255) DEFAULT NULL,
  `size_name` varchar(255) DEFAULT NULL,
  `size_amount` varchar(255) NOT NULL DEFAULT '0',
  `quantity` varchar(255) NOT NULL DEFAULT '0',
  `total_price` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `price`, `color_name`, `size_name`, `size_amount`, `quantity`, `total_price`, `created_at`, `updated_at`) VALUES
(96, 66, 10, '150', 'Green', NULL, '0', '1', '150', '2025-03-31 03:13:09', '2025-03-31 03:13:09'),
(101, 71, 10, '150', 'Green', NULL, '0', '1', '150', '2025-04-01 01:01:50', '2025-04-01 01:01:50'),
(103, 73, 9, '260', 'Green', 'Small', '60', '1', '260', '2025-04-01 01:20:16', '2025-04-01 01:20:16'),
(104, 74, 10, '150', 'Green', NULL, '0', '1', '150', '2025-04-01 01:22:14', '2025-04-01 01:22:14'),
(105, 75, 10, '150', 'Green', NULL, '0', '1', '150', '2025-04-01 01:24:29', '2025-04-01 01:24:29'),
(107, 77, 9, '260', 'Green', 'Small', '60', '1', '260', '2025-04-01 01:31:52', '2025-04-01 01:31:52'),
(108, 78, 9, '260', 'Green', 'Small', '60', '1', '260', '2025-04-01 01:33:35', '2025-04-01 01:33:35');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `title`, `image`, `description`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'About Us', 'about-us', 'About Us', '1744193344.jpg', '<h2 class=\"title\">Our Vision</h2>\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh.</p>\r\n<p>&nbsp;</p>\r\n<h2 class=\"title\">Our Mission</h2>\r\n<p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus. <br>Praesent elementum hendrerit tortor. Sed semper lorem at felis.</p>', 'about us', 'about us', 'about us', '2025-04-08 18:30:00', '2025-04-09 04:57:17'),
(3, 'Contact Us', 'contact-us', 'Contact Us', '1744195393.jpg', '<h2 class=\"mb-1 title\">Contact Information</h2>\r\n<p class=\"mb-3\">Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>', 'contact us', 'contact us', 'contact us', '2025-04-08 18:30:00', '2025-04-09 05:14:08'),
(5, 'Payment Methods', 'payment-methods', 'Payment Methods', '1744195888.jpg', '<p>Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna. Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>\r\n<p>Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>\r\n<p>Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>', 'Payment Methods', 'Payment Methods', 'Payment Methods', '2025-04-08 18:30:00', '2025-04-09 05:21:28'),
(7, 'Money-back guarantee', 'money-back-guarantee', 'Money-back guarantee!', '1744196345.jpg', '<div id=\"collapse-1\" class=\"collapse show\" aria-labelledby=\"heading-1\" data-parent=\"#accordion-1\">\r\n<div class=\"card-body\">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus. Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi.</div>\r\n</div>', 'Money-back guarantee!', 'Money-back guarantee!', 'Money-back guarantee!', '2025-04-08 18:30:00', '2025-04-09 05:29:05'),
(9, 'Returns', 'returns', 'Returns', '1744197204.jpg', '<p>Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna. Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>\r\n<p>Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>\r\n<p>Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>', 'Returns', 'Returns', 'Returns', '2025-04-08 18:30:00', '2025-04-09 05:43:24'),
(10, 'Shipping', 'shipping', 'Shipping', '1744197192.jpg', '<p>Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna. Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>\r\n<p>Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>\r\n<p>Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>', 'Shipping', 'Shipping', 'Shipping', '2025-04-08 18:30:00', '2025-04-09 05:43:12'),
(12, 'Terms and conditions', 'terms-conditions', 'Terms and conditions', '1744197181.jpg', '<p>Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna. Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>\r\n<p>Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>\r\n<p>Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>', 'Terms and conditions', 'Terms and conditions', 'Terms and conditions', '2025-04-08 18:30:00', '2025-04-09 05:45:06'),
(13, 'Privacy Policy', 'privacy-policy', 'Privacy Policy', '1744197168.jpg', '<p>Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna. Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>\r\n<p>Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>\r\n<p>Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>', 'Privacy Policy', 'Privacy Policy', 'Privacy Policy', '2025-04-08 18:30:00', '2025-04-09 05:42:48');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `image_name`, `link`, `status`, `created_at`, `updated_at`) VALUES
(2, '1745683079.png', 'http://127.0.0.1:8000/', 1, '2025-04-26 10:27:59', '2025-04-26 10:29:29'),
(3, '1745683232.png', 'http://127.0.0.1:8000/', 1, '2025-04-26 10:30:32', '2025-04-26 10:30:32'),
(4, '1745683246.png', 'http://127.0.0.1:8000/', 1, '2025-04-26 10:30:46', '2025-04-26 10:30:46'),
(5, '1745683258.png', 'http://127.0.0.1:8000/', 1, '2025-04-26 10:30:58', '2025-04-26 10:30:58'),
(6, '1745683272.png', 'http://127.0.0.1:8000/', 1, '2025-04-26 10:31:12', '2025-04-26 10:31:12'),
(7, '1745683285.png', 'http://127.0.0.1:8000/', 1, '2025-04-26 10:31:25', '2025-04-26 10:31:25'),
(8, '1745683301.png', 'http://127.0.0.1:8000/', 1, '2025-04-26 10:31:41', '2025-04-26 10:31:41'),
(9, '1745683317.png', 'http://127.0.0.1:8000/', 1, '2025-04-26 10:31:57', '2025-04-26 10:31:57'),
(10, '1745683331.png', 'http://127.0.0.1:8000/', 1, '2025-04-26 10:32:11', '2025-04-26 10:32:11');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `old_price` double DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `additional_information` text DEFAULT NULL,
  `shipping_returns` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `is_trendy` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `sku`, `category_id`, `sub_category_id`, `brand_id`, `user_id`, `price`, `old_price`, `short_description`, `description`, `additional_information`, `shipping_returns`, `status`, `is_trendy`, `created_at`, `updated_at`) VALUES
(9, 'Brown paperbag waist pencil', 'brown-paperbag-waist-pencil', 'BPWP', 10, 3, 1, 1, '200', 250, '<p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing. Sed lectus.</p>', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus.</p>\r\n<ul>\r\n<li>Nunc nec porttitor turpis. In eu risus enim. In vitae mollis elit.</li>\r\n<li>Vivamus finibus vel mauris ut vehicula.</li>\r\n<li>Nullam a magna porttitor, dictum risus nec, faucibus sapien.</li>\r\n</ul>\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus.</p>', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci.</p>\r\n<h3>Fabric &amp; care</h3>\r\n<ul>\r\n<li>Faux suede fabric</li>\r\n<li>Gold tone metal hoop handles.</li>\r\n<li>RI branding</li>\r\n<li>Snake print trim interior</li>\r\n<li>Adjustable cross body strap</li>\r\n<li>Height: 31cm; Width: 32cm; Depth: 12cm; Handle Drop: 61cm</li>\r\n</ul>\r\n<h3>Size</h3>\r\n<p>one size</p>', '<p>We deliver to over 100 countries around the world. For full details of the delivery options we offer, please view our&nbsp;<a href=\"#\">Delivery information</a><br>We hope you&rsquo;ll love every purchase, but if you ever need to return an item you can do so within a month of receipt. For full details of how to make a return, please view our&nbsp;<a href=\"#\">Returns information</a></p>', 1, 1, '2025-02-25 08:48:28', '2025-05-27 09:47:15'),
(10, 'Dark yellow lace cut out swing dress', 'dark-yellow-lace-cut-out-swing-dress', 'Dark123', 10, 3, 2, 1, '150', 300, '<p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing. Sed lectus.</p>', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus.</p>\r\n<ul>\r\n<li>Nunc nec porttitor turpis. In eu risus enim. In vitae mollis elit.</li>\r\n<li>Vivamus finibus vel mauris ut vehicula.</li>\r\n<li>Nullam a magna porttitor, dictum risus nec, faucibus sapien.</li>\r\n</ul>\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus.</p>', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci.</p>\r\n<h3>Fabric &amp; care</h3>\r\n<ul>\r\n<li>Faux suede fabric</li>\r\n<li>Gold tone metal hoop handles.</li>\r\n<li>RI branding</li>\r\n<li>Snake print trim interior</li>\r\n<li>Adjustable cross body strap</li>\r\n<li>Height: 31cm; Width: 32cm; Depth: 12cm; Handle Drop: 61cm</li>\r\n</ul>\r\n<h3>Size</h3>\r\n<p>one size</p>', '<p>We deliver to over 100 countries around the world. For full details of the delivery options we offer, please view our&nbsp;<a href=\"#\">Delivery information</a><br>We hope you&rsquo;ll love every purchase, but if you ever need to return an item you can do so within a month of receipt. For full details of how to make a return, please view our&nbsp;<a href=\"#\">Returns information</a></p>', 1, 1, '2025-02-25 09:29:21', '2025-05-27 09:46:55'),
(11, 'Khaki utility boiler jumpsuit', 'khaki-utility-boiler-jumpsuit', 'khaki2545', 9, 6, 1, 1, '800', 1000, '<p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing. Sed lectus.</p>', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus.</p>\r\n<ul>\r\n<li>Nunc nec porttitor turpis. In eu risus enim. In vitae mollis elit.</li>\r\n<li>Vivamus finibus vel mauris ut vehicula.</li>\r\n<li>Nullam a magna porttitor, dictum risus nec, faucibus sapien.</li>\r\n</ul>\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus.</p>', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci.</p>\r\n<h3>Fabric &amp; care</h3>\r\n<ul>\r\n<li>Faux suede fabric</li>\r\n<li>Gold tone metal hoop handles.</li>\r\n<li>RI branding</li>\r\n<li>Snake print trim interior</li>\r\n<li>Adjustable cross body strap</li>\r\n<li>Height: 31cm; Width: 32cm; Depth: 12cm; Handle Drop: 61cm</li>\r\n</ul>\r\n<h3>Size</h3>\r\n<p>one size</p>', '<p>We deliver to over 100 countries around the world. For full details of the delivery options we offer, please view our&nbsp;<a href=\"#\">Delivery information</a><br>We hope you&rsquo;ll love every purchase, but if you ever need to return an item you can do so within a month of receipt. For full details of how to make a return, please view our&nbsp;<a href=\"#\">Returns information</a></p>', 1, 1, '2025-03-09 11:48:01', '2025-05-27 09:46:34');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `product_id`, `color_id`, `created_at`, `updated_at`) VALUES
(34, 11, 1, '2025-05-27 09:46:34', '2025-05-27 09:46:34'),
(35, 11, 2, '2025-05-27 09:46:34', '2025-05-27 09:46:34'),
(36, 10, 1, '2025-05-27 09:46:55', '2025-05-27 09:46:55'),
(37, 9, 1, '2025-05-27 09:47:15', '2025-05-27 09:47:15');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `image_extension` varchar(255) DEFAULT NULL,
  `order_by` int(11) NOT NULL DEFAULT 100,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_name`, `image_extension`, `order_by`, `created_at`, `updated_at`) VALUES
(21, 9, '1740495489yg3ISJjNEf.jpg', 'jpg', 100, '2025-02-25 09:28:09', '2025-02-25 09:28:09'),
(22, 9, '1740495489djOw4SSUIm.jpg', 'jpg', 100, '2025-02-25 09:28:09', '2025-02-25 09:28:09'),
(23, 9, '1740495489Eb6S2Jwu2l.jpg', 'jpg', 100, '2025-02-25 09:28:09', '2025-02-25 09:28:09'),
(24, 10, '1740495681vCQvZ4IN51.jpg', 'jpg', 3, '2025-02-25 09:31:21', '2025-03-10 04:28:08'),
(26, 11, '1741540819Ue8YdFISHp.jpg', 'jpg', 100, '2025-03-09 11:50:19', '2025-03-09 11:50:19'),
(27, 11, '1741540819EZO00U6o8u.jpg', 'jpg', 100, '2025-03-09 11:50:19', '2025-03-09 11:50:19'),
(29, 10, '1741600684uRcLYg3zLn.jpg', 'jpg', 1, '2025-03-10 04:28:04', '2025-03-10 04:28:08'),
(30, 10, '1741600736AWo7bzemjn.jpg', 'jpg', 100, '2025-03-10 04:28:56', '2025-03-10 04:28:56'),
(31, 10, '1741600736hvBqwcSfrI.jpg', 'jpg', 100, '2025-03-10 04:28:56', '2025-03-10 04:28:56');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) DEFAULT 0,
  `review` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`id`, `product_id`, `order_id`, `user_id`, `rating`, `review`, `created_at`, `updated_at`) VALUES
(4, 9, 77, 1, 3, 'Good', '2025-04-06 11:38:58', '2025-04-06 11:38:58');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `size` varchar(255) DEFAULT NULL,
  `price` tinyint(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_id`, `size`, `price`, `created_at`, `updated_at`) VALUES
(27, 11, 'Small', 60, '2025-05-27 09:46:34', '2025-05-27 09:46:34'),
(28, 11, 'large', 80, '2025-05-27 09:46:34', '2025-05-27 09:46:34'),
(29, 9, 'Small', 60, '2025-05-27 09:47:15', '2025-05-27 09:47:15');

-- --------------------------------------------------------

--
-- Table structure for table `product_wishlists`
--

CREATE TABLE `product_wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_wishlists`
--

INSERT INTO `product_wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(18, 8, 10, '2025-03-31 08:06:16', '2025-03-31 08:06:16'),
(19, 8, 9, '2025-03-31 08:06:23', '2025-03-31 08:06:23'),
(20, 1, 10, '2025-04-05 07:42:35', '2025-04-05 07:42:35'),
(21, 1, 9, '2025-04-05 07:42:37', '2025-04-05 07:42:37');

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

-- --------------------------------------------------------

--
-- Table structure for table `shipping_charges`
--

CREATE TABLE `shipping_charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_charges`
--

INSERT INTO `shipping_charges` (`id`, `name`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Delux', '5', 1, '2025-03-11 07:29:24', '2025-03-11 07:31:43'),
(2, 'Free shipping', '0', 1, '2025-03-11 07:32:12', '2025-03-11 07:32:12');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `button_name` varchar(255) DEFAULT NULL,
  `button_link` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image_name`, `button_name`, `button_link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Outdoor Dining <br/> Furniture', '1745677703.jpg', 'Shop Now', 'http://127.0.0.1:8000/fashion', 1, '2025-04-26 08:22:55', '2025-04-26 09:19:58'),
(3, 'Living Room <br/> Furniture', '1745677695.jpg', 'Shop Now', 'http://127.0.0.1:8000/fashion', 1, '2025-04-26 08:58:15', '2025-04-26 09:19:52'),
(4, 'New Arrivals', '1745677757.jpg', 'Shop Now', 'http://127.0.0.1:8000/fashion', 1, '2025-04-26 08:59:17', '2025-04-26 09:19:46');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'created_by',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `slug`, `category_id`, `user_id`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Dresses', 'dresses', 10, 1, 'Dresses', 'Dresses', 'Dresses', 1, '2025-02-23 01:57:56', '2025-02-23 01:57:56'),
(4, 'T-shirts', 't-shirts', 10, 1, 'T-shirts', 'T-shirts', 'T-shirts', 1, '2025-02-23 01:58:36', '2025-02-23 01:58:36'),
(5, 'Jeans', 'jeans', 10, 1, 'Jeans', 'Jeans', 'Jeans', 1, '2025-02-23 01:59:06', '2025-02-23 01:59:06'),
(6, 'Shoes', 'shoes', 9, 1, 'Shoes', 'Shoes', 'Shoes', 1, '2025-02-23 01:59:30', '2025-05-11 09:14:07'),
(7, 'Sportwear', 'sportwear', 4, 1, 'Sportwear', 'Sportwear', 'Sportwear', 1, '2025-02-23 02:00:25', '2025-02-23 02:00:25');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `website_name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `footer_description` text DEFAULT NULL,
  `payment_icon` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `phone_two` varchar(255) DEFAULT NULL,
  `submit_email` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_two` varchar(255) DEFAULT NULL,
  `working_hour` varchar(255) DEFAULT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `youtube_link` varchar(255) DEFAULT NULL,
  `instagram_link` varchar(255) DEFAULT NULL,
  `pinterest_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `website_name`, `logo`, `favicon`, `footer_description`, `payment_icon`, `address`, `phone`, `phone_two`, `submit_email`, `email`, `email_two`, `working_hour`, `facebook_link`, `twitter_link`, `youtube_link`, `instagram_link`, `pinterest_link`, `created_at`, `updated_at`) VALUES
(1, 'Mall', '1745592777.png', '1745589757.ico', 'Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, eu vulputate magna eros eu erat.', '1745589786.png', '70 Washington Square South New York, NY 10012, United States', '+9242356745', '', 'info@Molla.com', 'info@Molla.com', '', 'Monday-Saturday,\r\n11am-7pm ET', 'https:\\\\facebook.com', 'https:\\\\www.twitter.com', 'https:\\\\www.youtube.com', 'https:\\\\www.instagram.com', 'https:\\\\www.pinterest.com', NULL, '2025-04-25 09:57:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `address_one` varchar(255) DEFAULT NULL,
  `address_two` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `image`, `email`, `email_verified_at`, `phone`, `company_name`, `country`, `address_one`, `address_two`, `postcode`, `state`, `city`, `password`, `is_admin`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ravi', 'Kumar', '1738932093.jpg', 'ravi@gmail.com', '2025-04-01 01:01:08', '09821345742', 'rkdesinger', 'India', 'd/265', 'test', '110043', 'Delhi', 'Delhi', '$2y$12$sJo0z0wcnevVn1UegA5Deumu5qtoj8hfokNQ9xk62hiU1B8.arqWu', 1, 1, 'oZRCTBPDco8Dp79jFTQQyPbKE4TXa1ciT5stYIgz7Whr7gQGH5ycuvaHxxFe', '2025-02-07 04:50:25', '2025-04-01 01:01:08'),
(3, 'Krish', NULL, '1738932108.jpg', 'krish@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$phvGWXYCBROh03L6g7FP0u6AEQxtRi6QaFJBSRypiRIZN0/XJ2BP2', 1, 1, '7oPAAR5BOvW2LeXrhTjztOuCXq5AuEUwYjXT09lkVV3oKlKGQQ81lITce2Sl', '2025-02-07 07:08:48', '2025-02-07 07:13:22'),
(6, 'pooja', NULL, NULL, 'pooja@gmail.com', '2025-03-13 05:16:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$dIRG2xwTg/6m0Dsw2bpz4eYZdQbh.Io./TJnxkWSmSii0YdpUtJDC', 0, 1, 'iHlq69VFE3L2CNBKAkpdixCu75mDbeEvpv7ArvdVa4wxB7yoIMkO33sJ0cFI', '2025-03-12 10:47:39', '2025-03-13 05:16:44'),
(8, 'chandan Kumar', NULL, NULL, 'chandan@gmail.com', '2025-03-13 05:37:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$fcXX6NdiZ7jGivRV4WXm6eatX.332kClQnFdvN9SNDUf1St0VaENW', 0, 1, 'yog2rVkFHu84P6yQG3z1kMHFp2UO2Ww3tpNwgg9zvL62RtQrXWauJs6j925I', '2025-03-13 05:24:03', '2025-03-31 05:46:55'),
(11, 'Pankaj', NULL, '1745734656.jpg', 'pankaj@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$jHmCm/z/qwntCxa19daaO.7jHFost8nrymALXUI3Sv.6AJbeoLJ.2', 1, 1, NULL, '2025-04-27 00:47:36', '2025-04-27 00:47:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brands_user_id_foreign` (`user_id`);

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_user_id_foreign` (`user_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `colors_user_id_foreign` (`user_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_us_user_id_foreign` (`user_id`);

--
-- Indexes for table `discount_codes`
--
ALTER TABLE `discount_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faqs_user_id_foreign` (`user_id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_user_id_foreign` (`user_id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_colors_product_id_foreign` (`product_id`),
  ADD KEY `product_colors_color_id_foreign` (`color_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_reviews_product_id_foreign` (`product_id`),
  ADD KEY `product_reviews_order_id_foreign` (`order_id`),
  ADD KEY `product_reviews_user_id_foreign` (`user_id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_sizes_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_wishlists`
--
ALTER TABLE `product_wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_wishlists_user_id_foreign` (`user_id`),
  ADD KEY `product_wishlists_product_id_foreign` (`product_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`),
  ADD KEY `sub_categories_user_id_foreign` (`user_id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
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
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `discount_codes`
--
ALTER TABLE `discount_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `product_wishlists`
--
ALTER TABLE `product_wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `brands_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `colors`
--
ALTER TABLE `colors`
  ADD CONSTRAINT `colors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD CONSTRAINT `contact_us_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faqs`
--
ALTER TABLE `faqs`
  ADD CONSTRAINT `faqs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD CONSTRAINT `product_colors_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_colors_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD CONSTRAINT `product_reviews_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD CONSTRAINT `product_sizes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_wishlists`
--
ALTER TABLE `product_wishlists`
  ADD CONSTRAINT `product_wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sub_categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
