-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2018 at 07:34 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `option_plus`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(18, 'Computer', '2018-11-06 20:39:46', '2018-11-06 20:39:46'),
(19, 'Mobiles', '2018-11-09 04:35:12', '2018-11-08 22:35:12');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(1000) NOT NULL,
  `business` varchar(1000) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `business`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(4, 'Cats Eye', 'Cats Eye', '1627440390', 'Bonani', '2018-10-26 08:35:32', '2018-10-26 08:35:32'),
(5, 'Emirates', 'Air Travels', '1627440390', 'Bonani', '2018-10-26 22:29:57', '2018-10-26 22:29:57'),
(12, 'omar Faruq9', 'BAF SVC9', '01611775479', 'Dhaka Bangladesh9', '2018-11-10 08:50:01', '2018-11-10 00:43:41');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `department_name` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `created_at`, `updated_at`) VALUES
(5, '9999', '2018-11-11 03:47:01', '2018-11-11 03:47:01'),
(6, '555', '2018-11-12 21:09:44', '2018-11-12 21:09:44'),
(7, 'habijabi', '2018-11-15 00:27:51', '2018-11-15 00:27:51');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` varchar(1000) NOT NULL,
  `item` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `category_id`, `subcategory_id`, `item`, `created_at`, `updated_at`) VALUES
(3, 18, '7', 'jinjar', '2018-11-09 09:06:52', '2018-11-09 03:06:52'),
(4, 18, '7', 'Easy ok', '2018-11-09 09:13:13', '2018-11-09 03:13:13'),
(5, 19, '7', 'ok', '2018-11-09 09:07:11', '2018-11-09 03:07:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_lists`
--

CREATE TABLE `permission_lists` (
  `id` int(11) NOT NULL,
  `permission_name` varchar(500) NOT NULL,
  `permission_id` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permission_lists`
--

INSERT INTO `permission_lists` (`id`, `permission_name`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 'Category', 1, '2018-11-13 19:53:53', '0000-00-00 00:00:00'),
(2, 'Costumer', 2, '2018-11-13 19:53:53', '0000-00-00 00:00:00'),
(3, 'Supplier', 3, '2018-11-13 20:18:33', '0000-00-00 00:00:00'),
(4, 'Unit', 4, '2018-11-13 20:18:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `description` varchar(1000) NOT NULL,
  `unit_id` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `item_id`, `name`, `description`, `unit_id`, `created_at`, `updated_at`) VALUES
(8, 15, NULL, NULL, 'T Shirt', 'Yellow color', '4', '2018-10-26 08:37:08', '2018-10-26 08:37:08'),
(9, 15, NULL, NULL, 'Pant', 'Yellow color', '4', '2018-10-26 08:44:38', '2018-10-26 08:44:38'),
(10, 16, NULL, NULL, 'Business class', 'ticket', '4', '2018-10-26 22:30:30', '2018-10-26 22:30:30'),
(11, 15, 1, 1, 'chgh', 'gfhgfh', '4', '2018-10-28 09:17:16', '2018-10-28 09:17:16'),
(12, 16, 1, 1, 'fdgdf', 'tfgh', '4', '2018-10-28 09:43:44', '2018-10-28 09:43:44'),
(13, 15, 1, 1, 'gfdgh', 'hfgh', '4', '2018-10-28 09:44:32', '2018-10-28 09:44:32'),
(14, 17, 10, 5, 'A el C u', 'nill', '4', '2018-11-08 23:58:09', '2018-11-08 23:58:09');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `invoice` varchar(10000) DEFAULT NULL,
  `requisition_qty` int(11) DEFAULT NULL,
  `requisition_status` int(11) DEFAULT NULL,
  `requisition_no` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `vat` int(11) NOT NULL,
  `tax` int(11) DEFAULT NULL,
  `ait` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `net_payable` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `due` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `product_id`, `qty`, `invoice`, `requisition_qty`, `requisition_status`, `requisition_no`, `price`, `description`, `vat`, `tax`, `ait`, `discount`, `net_payable`, `supplier_id`, `due`, `created_at`, `updated_at`) VALUES
(26, 9, 333, NULL, 444, 1, 4683, 33, 'hgfhfg', 0, 0, 0, 0, 0, 5, 0, '2018-10-28 16:19:06', '2018-10-28 10:19:06'),
(28, 8, 44, 'g54t5', 44, 1, 22110, 44, 'fdgf', 445, 445, 33, 55, 44, 5, 33, '2018-10-28 16:27:07', '2018-10-28 10:27:07'),
(29, 8, NULL, 'tt', 5, 0, 26788, 456, 'nill', 45, 43, 43, 23, 535, 5, 56, '2018-11-09 00:08:46', '2018-11-09 00:08:46'),
(30, 8, NULL, '11', 11, 0, 87528, 11, '11', 11, 11, 11, 11, 11, 5, 11, '2018-11-10 04:03:25', '2018-11-10 04:03:25'),
(31, 8, NULL, '11', 11, 0, 7387, 11, '11', 11, 11, 11, 11, 11, 5, 11, '2018-11-10 04:08:09', '2018-11-10 04:08:09'),
(32, 8, NULL, '11', 11, 0, 1805, 11, '11', 11, 11, 11, 11, 11, 5, 11, '2018-11-10 04:08:20', '2018-11-10 04:08:20'),
(37, 999, NULL, '99', 33399, 0, 38830, 3399, 'hgfhfg99', 99, 99, 99, 99, 99, 599, 99, '2018-11-10 04:45:15', '2018-11-10 04:45:15');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_cash_returns`
--

CREATE TABLE `purchase_cash_returns` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `cash_return` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_cash_returns`
--

INSERT INTO `purchase_cash_returns` (`id`, `supplier_id`, `purchase_id`, `product_id`, `qty`, `cash_return`, `created_at`, `updated_at`) VALUES
(25, 5, 23, 8, 10, 10, '2018-10-26 11:19:55', '2018-10-26 11:19:55'),
(26, 5, 24, 10, 10, 10, '2018-10-26 22:32:34', '2018-10-26 22:32:34');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_damages`
--

CREATE TABLE `purchase_damages` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `damage_cost` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_damages`
--

INSERT INTO `purchase_damages` (`id`, `supplier_id`, `purchase_id`, `product_id`, `qty`, `damage_cost`, `created_at`, `updated_at`) VALUES
(16, 5, 23, 8, 10, 10, '2018-10-26 11:21:03', '2018-10-26 11:21:03'),
(17, 5, 24, 10, 10, 10, '2018-10-26 22:33:17', '2018-10-26 22:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_repairs`
--

CREATE TABLE `purchase_repairs` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `repair_cost` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `vat` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `net_payable` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `due` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `product_id`, `qty`, `price`, `description`, `vat`, `discount`, `net_payable`, `supplier_id`, `due`, `created_at`, `updated_at`) VALUES
(9, 8, 500, 500, 'Yellow color', 0, 0, 500, 4, 0, '2018-10-26 11:21:57', '2018-10-26 11:21:57'),
(10, 10, 20, 40, 'Yellow color', 0, 0, 0, 5, 0, '2018-10-26 22:34:04', '2018-10-26 22:34:04'),
(18, 9, 9, 9, '9', 9, 9, 9, 4, 9, '2018-11-10 03:04:40', '2018-11-10 03:04:40'),
(19, 8, 0, 0, '0', 0, 0, 0, 4, 0, '2018-11-10 03:06:01', '2018-11-10 03:06:01');

-- --------------------------------------------------------

--
-- Table structure for table `sale_cash_returns`
--

CREATE TABLE `sale_cash_returns` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `cash_return` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale_cash_returns`
--

INSERT INTO `sale_cash_returns` (`id`, `client_id`, `sales_id`, `product_id`, `qty`, `cash_return`, `created_at`, `updated_at`) VALUES
(6, 4, 9, 8, 20, 20, '2018-10-26 11:22:56', '2018-10-26 11:22:56'),
(7, 5, 10, 10, 10, 10, '2018-10-26 22:34:38', '2018-10-26 22:34:38');

-- --------------------------------------------------------

--
-- Table structure for table `sale_damages`
--

CREATE TABLE `sale_damages` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `damage_cost` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale_damages`
--

INSERT INTO `sale_damages` (`id`, `client_id`, `sales_id`, `product_id`, `qty`, `damage_cost`, `created_at`, `updated_at`) VALUES
(5, 4, 9, 8, 100, 100, '2018-10-26 11:23:45', '2018-10-26 11:23:45');

-- --------------------------------------------------------

--
-- Table structure for table `sale_repairs`
--

CREATE TABLE `sale_repairs` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `repair_cost` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategory`, `created_at`, `updated_at`) VALUES
(7, 18, 'ASUS', '2018-11-06 20:40:07', '2018-11-06 20:40:07'),
(11, 19, 'Nokia Phone', '2018-11-09 04:48:25', '2018-11-08 22:48:25');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `supplier_name` varchar(1000) NOT NULL,
  `business` varchar(1000) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_name`, `business`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(5, 'Abc Garments', 'Abc Garments', '1627440390', 'Bonani', '2018-10-26 08:36:17', '2018-10-26 08:36:17'),
(6, 'kamal', 'None', '6547856345', 'None', '2018-11-08 23:54:08', '2018-11-08 23:54:08');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `unit_name` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_name`, `created_at`, `updated_at`) VALUES
(4, 'pc', '2018-10-26 08:36:41', '2018-10-26 08:36:41'),
(5, 'none', '2018-11-08 23:48:08', '2018-11-08 23:48:08');

-- --------------------------------------------------------

--
-- Table structure for table `userroles`
--

CREATE TABLE `userroles` (
  `id` int(11) NOT NULL,
  `user_role` varchar(500) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userroles`
--

INSERT INTO `userroles` (`id`, `user_role`, `role_id`, `created_at`, `updated_at`) VALUES
(6, 'Auditor', 868, '2018-11-13 22:21:26', '2018-11-13 22:21:26'),
(7, 'Assessor', 658, '2018-11-13 22:22:43', '2018-11-13 22:22:43'),
(8, 'Bookkeeper', 346, '2018-11-13 22:22:53', '2018-11-13 22:22:53'),
(10, 'Cash manager', 395, '2018-11-13 22:23:24', '2018-11-13 22:23:24'),
(11, 'Chief financial officer', 376, '2018-11-13 22:23:39', '2018-11-13 22:23:39'),
(12, 'Controller', 895, '2018-11-13 22:23:51', '2018-11-13 22:23:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phone` int(20) NOT NULL,
  `empUserId` int(20) NOT NULL,
  `dob` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `department_id` int(20) NOT NULL,
  `role_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `empUserId`, `dob`, `address`, `status`, `department_id`, `role_id`, `image`, `created_at`, `updated_at`) VALUES
(20, 'admin', 'admin@gmail.com', 'admin', 1536131168, 501, '11/14/2018', 'admin', 1, 7, 0, 'img_avatar.png', '2018-11-21 08:31:55', '2018-11-21 02:31:55'),
(22, 'Nayem', 'rofequlislamnayem@gmail.com', '12345678', 1536131168, 289, '11/14/2018', 'None', 1, 7, 0, 'nayem_1542778219.jpg', '2018-11-28 06:32:54', '2018-11-28 00:32:54'),
(25, 'Monir Mollah', 'monir@gmail.com', '123456789', 1536131168, 845, '11/12/2018', 'None', 0, 7, 700, 'img_avatar.png', '2018-11-24 11:52:24', '2018-11-24 11:52:24');

-- --------------------------------------------------------

--
-- Table structure for table `user_permissions`
--

CREATE TABLE `user_permissions` (
  `id` int(11) NOT NULL,
  `role_id` varchar(200) NOT NULL,
  `permission_id` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_permissions`
--

INSERT INTO `user_permissions` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(95, '868', '1', '2018-11-13 22:26:53', '2018-11-13 22:26:53'),
(96, '658', '3', '2018-11-13 22:32:44', '2018-11-13 22:32:44'),
(97, '346', '4', '2018-11-13 22:32:47', '2018-11-13 22:32:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_lists`
--
ALTER TABLE `permission_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_cash_returns`
--
ALTER TABLE `purchase_cash_returns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_damages`
--
ALTER TABLE `purchase_damages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_repairs`
--
ALTER TABLE `purchase_repairs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_cash_returns`
--
ALTER TABLE `sale_cash_returns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_damages`
--
ALTER TABLE `sale_damages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_repairs`
--
ALTER TABLE `sale_repairs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userroles`
--
ALTER TABLE `userroles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permission_lists`
--
ALTER TABLE `permission_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `purchase_cash_returns`
--
ALTER TABLE `purchase_cash_returns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `purchase_damages`
--
ALTER TABLE `purchase_damages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `purchase_repairs`
--
ALTER TABLE `purchase_repairs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `sale_cash_returns`
--
ALTER TABLE `sale_cash_returns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sale_damages`
--
ALTER TABLE `sale_damages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sale_repairs`
--
ALTER TABLE `sale_repairs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `userroles`
--
ALTER TABLE `userroles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `user_permissions`
--
ALTER TABLE `user_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
