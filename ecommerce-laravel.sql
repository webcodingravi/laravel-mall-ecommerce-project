-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2025 at 10:29 AM
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

INSERT INTO `categories` (`id`, `name`, `slug`, `meta_title`, `meta_description`, `meta_keywords`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Jewelry & Watches', 'jewelry-watches', 'Jewelry & Watches', 'Jewelry & Watches', 'Jewelry & Watches', 1, 1, '2025-02-23 01:51:27', '2025-02-23 01:51:27'),
(5, 'Sports & Outdoors', 'sports-outdoors', 'Sports & Outdoors', 'Sports & Outdoors', 'Sports & Outdoors', 1, 1, '2025-02-23 01:51:54', '2025-02-23 01:51:54'),
(6, 'Toys & Games', 'toys-games', 'Toys & Games', 'Toys & Games', 'Toys & Games', 1, 1, '2025-02-23 01:52:19', '2025-02-23 01:52:19'),
(7, 'Books, Movies & Music', 'books-movies-music', 'Books, Movies & Music', 'Books, Movies & Music', 'Books, Movies & Music', 1, 1, '2025-02-23 01:52:47', '2025-02-23 01:52:47'),
(8, 'Beauty & Personal Care', 'beauty-personal-care', 'Beauty & Personal Care', 'Beauty & Personal Care', 'Beauty & Personal Care', 1, 1, '2025-02-23 01:53:28', '2025-02-23 01:53:28'),
(9, 'Home & Furniture', 'home-furniture', 'Home & Furniture', 'Home & Furniture', 'Home & Furniture', 1, 1, '2025-02-23 01:54:01', '2025-02-23 01:54:01'),
(10, 'Fashion', 'fashion', 'Fashion', 'Fashion', 'Fashion', 1, 1, '2025-02-23 01:54:20', '2025-02-23 01:54:20'),
(11, 'Electronics', 'electronics', 'Electronics', 'Electronics', 'Electronics', 1, 1, '2025-02-23 01:55:07', '2025-02-23 01:55:07');

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
(33, '2025_03_25_070644_update_orders_table', 14);

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
(22, 1, NULL, 'Ravi', 'Kumar', 'rkdesinger', 'India', 'd/265', '', 'Delhi', 'Delhi', '110043', '09821345742', 'ravi6975@gmail.com', 'note', '', '0', 2, '0', '410', 'cash', 0, '1', NULL, NULL, NULL, '2025-03-16 05:22:04', '2025-03-25 02:54:09'),
(62, NULL, NULL, 'Ravi', 'Kumar', 'rkdesinger', 'India', 'd/265', '', 'Delhi', 'Delhi', '110043', '09821345742', 'ravi395950@gmail.com', '', '', '0', 2, '0', '970', 'paypal', 0, '1', '{\"PayerID\":\"CP32GASGMWDHE\",\"st\":\"Completed\",\"tx\":\"6GM72249F33749354\",\"cc\":\"USD\",\"amt\":\"970.00\",\"payer_email\":\"rkconsultancy34@gmail.com\",\"payer_id\":\"CP32GASGMWDHE\",\"payer_status\":\"VERIFIED\",\"first_name\":\"John\",\"last_name\":\"Doe\",\"txn_id\":\"6GM72249F33749354\",\"mc_currency\":\"USD\",\"mc_fee\":\"38.13\",\"mc_gross\":\"970.00\",\"protection_eligibility\":\"ELIGIBLE\",\"payment_fee\":\"38.13\",\"payment_gross\":\"970.00\",\"payment_status\":\"Completed\",\"payment_type\":\"instant\",\"handling_amount\":\"0.00\",\"shipping\":\"0.00\",\"item_name\":\"E-commerce\",\"item_number\":\"62\",\"quantity\":\"1\",\"txn_type\":\"web_accept\",\"payment_date\":\"2025-03-18T13:13:29Z\",\"receiver_id\":\"85UBVEVAEQXA2\",\"notify_version\":\"UNVERSIONED\",\"verify_sign\":\"AWwTEt6LtOi-FdZplEQG6QlYxrt5AyGqKeoswgMB8h4tdnDnTwhASTk1\"}', NULL, NULL, '2025-03-18 07:43:24', '2025-03-25 02:54:06'),
(63, NULL, '123456789', 'Ravi', 'Kumar', 'rkdesinger', 'India', 'd/265', '', 'Delhi', 'Delhi', '110043', '09821345742', 'ravi395950@gmail.com', '', '', '0', 2, '0', '260', 'stripe', 0, '1', '{\"id\":\"cs_test_a1vq4lDZ9hS3Qe56KyMiXrHrHESJ1b0qAcPUlQVviuf5qjJqArgavgRW9A\",\"object\":\"checkout.session\",\"adaptive_pricing\":{\"enabled\":false},\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":26000,\"amount_total\":26000,\"automatic_tax\":{\"enabled\":false,\"liability\":null,\"status\":null},\"billing_address_collection\":null,\"cancel_url\":\"http:\\/\\/127.0.0.1:8000\\/checkout\",\"client_reference_id\":null,\"client_secret\":null,\"collected_information\":{\"shipping_details\":null},\"consent\":null,\"consent_collection\":null,\"created\":1742307715,\"currency\":\"usd\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"after_submit\":null,\"shipping_address\":null,\"submit\":null,\"terms_of_service_acceptance\":null},\"customer\":null,\"customer_creation\":\"if_required\",\"customer_details\":{\"address\":{\"city\":null,\"country\":\"IN\",\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":\"ravi395950@gmail.com\",\"name\":\"Ravi kumar\",\"phone\":null,\"tax_exempt\":\"none\",\"tax_ids\":[]},\"customer_email\":\"ravi395950@gmail.com\",\"discounts\":[],\"expires_at\":1742394115,\"invoice\":null,\"invoice_creation\":{\"enabled\":false,\"invoice_data\":{\"account_tax_ids\":null,\"custom_fields\":null,\"description\":null,\"footer\":null,\"issuer\":null,\"metadata\":[],\"rendering_options\":null}},\"livemode\":false,\"locale\":null,\"metadata\":[],\"mode\":\"payment\",\"payment_intent\":\"pi_3R418zGpCfSeQGNi0s0G4Ze3\",\"payment_link\":null,\"payment_method_collection\":\"if_required\",\"payment_method_configuration_details\":null,\"payment_method_options\":{\"card\":{\"request_three_d_secure\":\"automatic\"}},\"payment_method_types\":[\"card\"],\"payment_status\":\"paid\",\"phone_number_collection\":{\"enabled\":false},\"recovered_from\":null,\"saved_payment_method_options\":null,\"setup_intent\":null,\"shipping_address_collection\":null,\"shipping_cost\":null,\"shipping_details\":null,\"shipping_options\":[],\"status\":\"complete\",\"submit_type\":null,\"subscription\":null,\"success_url\":\"http:\\/\\/127.0.0.1:8000\\/stripe\\/payment-success\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"ui_mode\":\"hosted\",\"url\":null}', 'cs_test_a1vq4lDZ9hS3Qe56KyMiXrHrHESJ1b0qAcPUlQVviuf5qjJqArgavgRW9A', 'cs_test_a1vq4lDZ9hS3Qe56KyMiXrHrHESJ1b0qAcPUlQVviuf5qjJqArgavgRW9A', '2025-03-18 08:31:23', '2025-03-25 02:54:03');

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
(34, 22, 9, '260', 'Green', 'Small', '60', '1', '260', '2025-03-16 05:22:04', '2025-03-16 05:22:04'),
(35, 22, 10, '150', 'Green', NULL, '0', '1', '150', '2025-03-16 05:22:04', '2025-03-16 05:22:04'),
(91, 62, 9, '260', 'Green', 'Small', '60', '2', '260', '2025-03-18 07:43:24', '2025-03-18 07:43:24'),
(92, 62, 10, '150', 'Green', NULL, '0', '3', '150', '2025-03-18 07:43:24', '2025-03-18 07:43:24'),
(93, 63, 9, '260', 'Green', 'Small', '60', '1', '260', '2025-03-18 08:31:23', '2025-03-18 08:31:23');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `sku`, `category_id`, `sub_category_id`, `brand_id`, `user_id`, `price`, `old_price`, `short_description`, `description`, `additional_information`, `shipping_returns`, `status`, `created_at`, `updated_at`) VALUES
(9, 'Brown paperbag waist pencil', 'brown-paperbag-waist-pencil', 'BPWP', 10, 3, 1, 1, '200', 250, '<p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing. Sed lectus.</p>', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus.</p>\r\n<ul>\r\n<li>Nunc nec porttitor turpis. In eu risus enim. In vitae mollis elit.</li>\r\n<li>Vivamus finibus vel mauris ut vehicula.</li>\r\n<li>Nullam a magna porttitor, dictum risus nec, faucibus sapien.</li>\r\n</ul>\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus.</p>', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci.</p>\r\n<h3>Fabric &amp; care</h3>\r\n<ul>\r\n<li>Faux suede fabric</li>\r\n<li>Gold tone metal hoop handles.</li>\r\n<li>RI branding</li>\r\n<li>Snake print trim interior</li>\r\n<li>Adjustable cross body strap</li>\r\n<li>Height: 31cm; Width: 32cm; Depth: 12cm; Handle Drop: 61cm</li>\r\n</ul>\r\n<h3>Size</h3>\r\n<p>one size</p>', '<p>We deliver to over 100 countries around the world. For full details of the delivery options we offer, please view our&nbsp;<a href=\"#\">Delivery information</a><br>We hope you&rsquo;ll love every purchase, but if you ever need to return an item you can do so within a month of receipt. For full details of how to make a return, please view our&nbsp;<a href=\"#\">Returns information</a></p>', 1, '2025-02-25 08:48:28', '2025-02-25 09:12:39'),
(10, 'Dark yellow lace cut out swing dress', 'dark-yellow-lace-cut-out-swing-dress', 'Dark123', 10, 3, 2, 1, '150', 300, '<p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing. Sed lectus.</p>', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus.</p>\r\n<ul>\r\n<li>Nunc nec porttitor turpis. In eu risus enim. In vitae mollis elit.</li>\r\n<li>Vivamus finibus vel mauris ut vehicula.</li>\r\n<li>Nullam a magna porttitor, dictum risus nec, faucibus sapien.</li>\r\n</ul>\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus.</p>', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci.</p>\r\n<h3>Fabric &amp; care</h3>\r\n<ul>\r\n<li>Faux suede fabric</li>\r\n<li>Gold tone metal hoop handles.</li>\r\n<li>RI branding</li>\r\n<li>Snake print trim interior</li>\r\n<li>Adjustable cross body strap</li>\r\n<li>Height: 31cm; Width: 32cm; Depth: 12cm; Handle Drop: 61cm</li>\r\n</ul>\r\n<h3>Size</h3>\r\n<p>one size</p>', '<p>We deliver to over 100 countries around the world. For full details of the delivery options we offer, please view our&nbsp;<a href=\"#\">Delivery information</a><br>We hope you&rsquo;ll love every purchase, but if you ever need to return an item you can do so within a month of receipt. For full details of how to make a return, please view our&nbsp;<a href=\"#\">Returns information</a></p>', 1, '2025-02-25 09:29:21', '2025-02-25 09:31:21'),
(11, 'Khaki utility boiler jumpsuit', 'khaki-utility-boiler-jumpsuit', 'khaki2545', 10, 5, 1, 1, '800', 1000, '<p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing. Sed lectus.</p>', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus.</p>\r\n<ul>\r\n<li>Nunc nec porttitor turpis. In eu risus enim. In vitae mollis elit.</li>\r\n<li>Vivamus finibus vel mauris ut vehicula.</li>\r\n<li>Nullam a magna porttitor, dictum risus nec, faucibus sapien.</li>\r\n</ul>\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus.</p>', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci.</p>\r\n<h3>Fabric &amp; care</h3>\r\n<ul>\r\n<li>Faux suede fabric</li>\r\n<li>Gold tone metal hoop handles.</li>\r\n<li>RI branding</li>\r\n<li>Snake print trim interior</li>\r\n<li>Adjustable cross body strap</li>\r\n<li>Height: 31cm; Width: 32cm; Depth: 12cm; Handle Drop: 61cm</li>\r\n</ul>\r\n<h3>Size</h3>\r\n<p>one size</p>', '<p>We deliver to over 100 countries around the world. For full details of the delivery options we offer, please view our&nbsp;<a href=\"#\">Delivery information</a><br>We hope you&rsquo;ll love every purchase, but if you ever need to return an item you can do so within a month of receipt. For full details of how to make a return, please view our&nbsp;<a href=\"#\">Returns information</a></p>', 1, '2025-03-09 11:48:01', '2025-03-09 12:13:44');

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
(21, 9, 1, '2025-02-25 09:28:09', '2025-02-25 09:28:09'),
(27, 11, 1, '2025-03-09 12:13:44', '2025-03-09 12:13:44'),
(28, 11, 2, '2025-03-09 12:13:44', '2025-03-09 12:13:44'),
(31, 10, 1, '2025-03-10 04:28:56', '2025-03-10 04:28:56');

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
(18, 9, 'Small', 60, '2025-02-25 09:28:09', '2025-02-25 09:28:09'),
(23, 11, 'Small', 60, '2025-03-09 12:13:44', '2025-03-09 12:13:44'),
(24, 11, 'large', 80, '2025-03-09 12:13:44', '2025-03-09 12:13:44');

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
(6, 'Shoes', 'shoes', 5, 1, 'Shoes', 'Shoes', 'Shoes', 1, '2025-02-23 01:59:30', '2025-02-23 01:59:30'),
(7, 'Sportwear', 'sportwear', 4, 1, 'Sportwear', 'Sportwear', 'Sportwear', 1, '2025-02-23 02:00:25', '2025-02-23 02:00:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
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

INSERT INTO `users` (`id`, `name`, `image`, `email`, `email_verified_at`, `password`, `is_admin`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ravi Kumar', '1738932093.jpg', 'ravi@gmail.com', '2025-03-13 05:27:11', '$2y$12$sKHKUuYDrjPd41tyg4fzk.SsOwtVEkAYihKXOZm6BACNenniW8cSu', 1, 1, 'ThxL69TxdCIN5g2wcieebsAW2UVaZHiGrxS8ZUqlBqz5J88OAvxqFEfbTaIR', '2025-02-07 04:50:25', '2025-03-13 05:27:11'),
(3, 'Krish', '1738932108.jpg', 'krish@gmail.com', NULL, '$2y$12$phvGWXYCBROh03L6g7FP0u6AEQxtRi6QaFJBSRypiRIZN0/XJ2BP2', 1, 1, '7oPAAR5BOvW2LeXrhTjztOuCXq5AuEUwYjXT09lkVV3oKlKGQQ81lITce2Sl', '2025-02-07 07:08:48', '2025-02-07 07:13:22'),
(4, 'thakur', '1738932250.jpg', 'thakur@gmail.com', NULL, '$2y$12$JuFPgVYDaLl.x8guxe7BWOnuQ.xgdOMMtoVDbwmPI8MhKcrA2IyVi', 1, 1, 'SWZLkSD8thabxibsTuzsbt2E1vDINTVIKYe1HtMOtnuyOObAH89EmaCAoeni', '2025-02-07 07:14:10', '2025-02-07 07:14:10'),
(6, 'pooja', NULL, 'pooja@gmail.com', '2025-03-13 05:16:44', '$2y$12$dIRG2xwTg/6m0Dsw2bpz4eYZdQbh.Io./TJnxkWSmSii0YdpUtJDC', 0, 1, 'iHlq69VFE3L2CNBKAkpdixCu75mDbeEvpv7ArvdVa4wxB7yoIMkO33sJ0cFI', '2025-03-12 10:47:39', '2025-03-13 05:16:44'),
(8, 'chandan Kumar', NULL, 'chandan@gmail.com', '2025-03-13 05:37:43', '$2y$12$Z6x9gi15wUfX6FXWfTa5u./0RgLXDqTkYZVOme4iUffwPZ295ymqC', 0, 1, 'PrBb0Ujnxre3iCymXPGTClVIbUdbsQKn1eZTMiSmnYsWc96UVVRTxpnLy02T', '2025-03-13 05:24:03', '2025-03-13 05:37:43');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_sizes_product_id_foreign` (`product_id`);

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
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`),
  ADD KEY `sub_categories_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- Constraints for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD CONSTRAINT `product_sizes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
