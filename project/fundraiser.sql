-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2018 at 02:51 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fundraiser`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'Admin', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `campaign_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Unapproved',
  `category_id` int(11) DEFAULT NULL,
  `amount_raised` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `student_id`, `campaign_name`, `reason`, `amount`, `created_at`, `updated_at`, `status`, `category_id`, `amount_raised`) VALUES
(1, 2, 'My Rent Campaign', 'I need some funds to pay for my rent', 2000, '2018-12-03 08:51:59', '2018-12-05 11:38:53', 'Approved', 1, 1000),
(3, 3, 'School Fees', 'Just a campaign description', 34000, '2018-12-03 10:12:01', '2018-12-03 10:36:28', 'Approved', 4, 0),
(5, 1, 'Campaign name', 'reasons', 4000, '2018-12-04 09:40:29', '2018-12-04 09:40:29', 'Unapproved', 1, 0),
(6, 5, 'School fee campaign', 'I money to pay for school fees', 50000, '2018-12-05 08:32:42', '2018-12-06 07:32:42', 'Approved', 4, 0),
(7, 2, 'Clothing fund raiser', 'rtrtrtr', 36000, '2018-12-05 09:51:21', '2018-12-06 07:32:39', 'Approved', 3, 23000),
(8, 5, 'Just a test fundraiser', 'It\'s private', 3000, '2018-12-06 08:27:26', '2018-12-06 08:34:00', 'Approved', 1, 3000),
(9, 3, 'Facere itaque repudiandae possimus.', 'Voluptates odio ad eos veritatis est asperiores.', 1987, '2018-12-06 08:50:58', '2018-12-06 08:50:58', 'Approved', 1, 0),
(10, 3, 'Qui vel explicabo.', 'Quo saepe laborum quia unde eligendi omnis.', 1197, '2018-12-06 08:50:58', '2018-12-06 08:50:58', 'Approved', 1, 0),
(11, 3, 'Veniam velit amet autem eligendi.', 'Quia autem assumenda quia sed aliquid perspiciatis ut dolorum.', 2233, '2018-12-06 08:50:58', '2018-12-06 08:50:58', 'Approved', 4, 0),
(12, 3, 'Consequatur aspernatur tempore.', 'Sapiente at ea nisi qui ut qui hic quod ullam saepe maxime.', 990, '2018-12-06 08:50:58', '2018-12-06 08:50:58', 'Approved', 4, 0),
(13, 4, 'Est soluta velit voluptates nostrum.', 'Aut distinctio enim voluptas a error perferendis minus.', 1584, '2018-12-06 08:50:58', '2018-12-06 08:50:58', 'Approved', 2, 0),
(14, 5, 'Minima et sequi voluptatem ut vel.', 'Explicabo sunt inventore distinctio aliquam nobis magni molestiae.', 693, '2018-12-06 08:50:58', '2018-12-06 08:50:58', 'Approved', 3, 0),
(15, 5, 'Tenetur eius doloremque minima et.', 'Molestias deleniti quidem ipsa odit omnis vel est ducimus unde.', 1305, '2018-12-06 08:50:58', '2018-12-06 08:50:58', 'Approved', 5, 0),
(16, 4, 'Ut earum unde.', 'Mollitia et occaecati totam sunt ut quas.', 680, '2018-12-06 08:50:58', '2018-12-06 08:50:58', 'Approved', 2, 0),
(17, 5, 'Voluptas rem et.', 'Eum earum deleniti tenetur voluptatibus voluptas quia.', 1578, '2018-12-06 08:50:58', '2018-12-06 08:50:58', 'Approved', 4, 0),
(18, 4, 'Rerum quo culpa nulla distinctio laborum.', 'Est praesentium optio sit iusto non qui consequatur aut.', 1550, '2018-12-06 08:50:58', '2018-12-06 08:50:58', 'Approved', 3, 0),
(19, 4, 'Laborum quidem aliquid aut qui.', 'Fugit praesentium quod nemo tenetur libero dignissimos voluptates quod aut reiciendis.', 2114, '2018-12-06 08:50:58', '2018-12-06 08:50:58', 'Approved', 1, 0),
(20, 3, 'Recusandae dicta blanditiis sed.', 'Quasi eum ut quibusdam et.', 1882, '2018-12-06 08:50:58', '2018-12-06 08:50:58', 'Approved', 1, 0),
(21, 4, 'Nihil labore veritatis officia.', 'Et ex suscipit porro incidunt doloremque doloribus.', 2061, '2018-12-06 08:50:58', '2018-12-06 08:50:58', 'Approved', 3, 0),
(22, 5, 'Rem impedit culpa adipisci eveniet perferendis.', 'Quia facere sapiente aut vel qui aspernatur sequi corrupti ab.', 1465, '2018-12-06 08:50:59', '2018-12-06 08:50:59', 'Approved', 1, 0),
(23, 5, 'Dolorum non rerum earum ratione.', 'Possimus maxime sit qui vel molestiae.', 1745, '2018-12-06 08:50:59', '2018-12-06 08:50:59', 'Approved', 3, 0),
(24, 2, 'Ut omnis maxime.', 'Autem corrupti tempora iusto laborum rerum nobis.', 592, '2018-12-06 08:50:59', '2018-12-06 08:50:59', 'Approved', 2, 0),
(25, 5, 'Ea quaerat repellendus rerum a.', 'Natus in voluptatem quia commodi nihil accusantium.', 785, '2018-12-06 08:50:59', '2018-12-06 08:50:59', 'Approved', 1, 0),
(26, 3, 'Quam et illum voluptatum est corporis.', 'Doloribus tenetur vel illum porro et libero nisi neque.', 1151, '2018-12-06 08:50:59', '2018-12-06 08:50:59', 'Approved', 5, 0),
(27, 4, 'Mollitia tempora quo reiciendis et est.', 'Ea at assumenda hic eum sit enim cupiditate fugiat omnis quia.', 2185, '2018-12-06 08:50:59', '2018-12-06 08:50:59', 'Approved', 4, 0),
(28, 2, 'Soluta qui veritatis exercitationem.', 'Et rem qui ut veritatis dolor voluptatum.', 2361, '2018-12-06 08:50:59', '2018-12-06 08:50:59', 'Approved', 1, 0),
(29, 2, 'Minima fugiat aut.', 'Ut accusantium voluptas quidem dolores est.', 579, '2018-12-06 08:50:59', '2018-12-06 08:50:59', 'Approved', 4, 0),
(30, 3, 'Et blanditiis tempore qui.', 'Dolor animi error iste ad maxime reprehenderit quod et nesciunt dolor.', 1588, '2018-12-06 08:50:59', '2018-12-06 08:50:59', 'Approved', 1, 0),
(31, 5, 'Hic quidem facere ex nobis.', 'Soluta voluptatum voluptatum ipsa earum sapiente nihil.', 906, '2018-12-06 08:50:59', '2018-12-06 08:50:59', 'Approved', 4, 0),
(32, 5, 'Quaerat et ad aut facilis facilis.', 'Facere nihil esse at sint quo mollitia sed soluta.', 2373, '2018-12-06 08:50:59', '2018-12-06 08:50:59', 'Approved', 2, 0),
(33, 5, 'Deserunt rerum qui praesentium.', 'Fugit voluptate et debitis ad consequatur sequi hic esse provident qui.', 508, '2018-12-06 08:50:59', '2018-12-06 08:50:59', 'Approved', 1, 0),
(34, 4, 'Debitis reprehenderit fuga.', 'Qui quod quod vitae corrupti non odit ut saepe.', 1695, '2018-12-06 08:50:59', '2018-12-06 08:50:59', 'Approved', 4, 0),
(35, 4, 'Omnis asperiores ut nisi cum.', 'Adipisci quos tenetur distinctio odio ut ipsam dignissimos cumque.', 1146, '2018-12-06 08:50:59', '2018-12-06 08:50:59', 'Approved', 4, 0),
(36, 3, 'Sint harum quas enim quidem.', 'Tenetur eaque ea vel quia soluta est repellat qui omnis quo.', 2484, '2018-12-06 08:50:59', '2018-12-06 08:50:59', 'Approved', 4, 0),
(37, 2, 'Molestiae et omnis libero dignissimos.', 'Quam aliquam illo soluta vel cupiditate quis.', 2254, '2018-12-06 08:50:59', '2018-12-06 08:50:59', 'Approved', 4, 0),
(38, 4, 'Et delectus non quo.', 'Minima cupiditate saepe provident maiores nostrum.', 2166, '2018-12-06 08:51:00', '2018-12-06 08:51:00', 'Approved', 4, 0),
(39, 2, 'Voluptatem dolor molestias.', 'Vero quod magni eos et accusantium aut reiciendis quae.', 1037, '2018-12-06 08:51:00', '2018-12-06 11:01:16', 'Approved', 4, 1500),
(40, 4, 'Et et sed ab recusandae alias.', 'Ad id provident voluptatem ut rerum enim laudantium.', 2234, '2018-12-06 08:51:00', '2018-12-06 08:51:00', 'Approved', 1, 0),
(41, 3, 'Aut quia sed est.', 'Ut aliquam sint tempora error est.', 2364, '2018-12-06 08:51:00', '2018-12-06 08:51:00', 'Approved', 5, 0),
(42, 3, 'Quo voluptatem corporis nam unde.', 'Sed autem suscipit non dolorem.', 557, '2018-12-06 08:51:00', '2018-12-06 08:51:00', 'Approved', 3, 0),
(43, 2, 'Pariatur ut ad nemo eum.', 'Blanditiis et nobis rem velit placeat blanditiis ut rerum similique sint.', 2097, '2018-12-06 08:51:00', '2018-12-06 08:51:00', 'Approved', 4, 0),
(44, 2, 'Iste non molestiae eum voluptates.', 'Laboriosam repellendus aperiam aut officia sapiente quae id quae.', 1355, '2018-12-06 08:51:00', '2018-12-06 08:51:00', 'Approved', 1, 0),
(45, 4, 'Et est tempora aut expedita dolorem.', 'Quos quia quibusdam sit atque autem et facilis facilis.', 900, '2018-12-06 08:51:00', '2018-12-06 08:51:00', 'Approved', 4, 0),
(46, 5, 'Aliquam consequatur nihil est atque.', 'Minima minima occaecati in ea autem perferendis enim.', 1866, '2018-12-06 08:51:00', '2018-12-06 08:51:00', 'Approved', 3, 0),
(47, 2, 'Dignissimos iste maxime.', 'In ea facilis laudantium qui amet eos laudantium voluptatem architecto sint.', 879, '2018-12-06 08:51:00', '2018-12-06 08:51:00', 'Approved', 5, 0),
(48, 2, 'Architecto sint minima numquam dolores illum.', 'Non natus quis laboriosam dolorem iusto eligendi culpa qui.', 2219, '2018-12-06 08:51:00', '2018-12-06 08:51:00', 'Approved', 2, 0),
(49, 4, 'Velit nihil pariatur beatae.', 'Temporibus reiciendis nemo magnam beatae amet voluptate et ea dolorum.', 1118, '2018-12-06 08:51:00', '2018-12-06 08:51:00', 'Approved', 4, 0),
(50, 4, 'Ut sed necessitatibus.', 'Dolor sapiente et non quos tenetur.', 843, '2018-12-06 08:51:00', '2018-12-06 08:51:00', 'Approved', 5, 0),
(51, 4, 'Facere ea ipsam aut.', 'Ut numquam dolores aut deserunt.', 1745, '2018-12-06 08:51:00', '2018-12-06 08:51:00', 'Approved', 5, 0),
(52, 2, 'At earum consectetur minus.', 'Nisi dolores adipisci soluta ex dolores debitis et nemo repudiandae.', 699, '2018-12-06 08:51:01', '2018-12-06 10:23:07', 'Approved', 4, 500),
(53, 2, 'Voluptas iusto magnam quidem assumenda.', 'Consequatur ipsum velit tenetur quisquam accusamus aut voluptatem exercitationem eos.', 2197, '2018-12-06 08:51:01', '2018-12-06 08:51:01', 'Approved', 1, 0),
(54, 3, 'Et provident dicta ab.', 'Hic eos a ea laboriosam est mollitia dolores non blanditiis minima.', 694, '2018-12-06 08:51:01', '2018-12-06 08:51:01', 'Approved', 4, 0),
(55, 5, 'Amet omnis non modi.', 'Veritatis deleniti omnis dolore distinctio molestias eveniet nihil quo.', 507, '2018-12-06 08:51:01', '2018-12-06 10:57:38', 'Approved', 2, 500),
(56, 4, 'A ipsam voluptatem.', 'Voluptatem qui ipsum saepe sed consectetur.', 1045, '2018-12-06 08:51:01', '2018-12-06 08:51:01', 'Approved', 1, 0),
(57, 4, 'Sint et et placeat.', 'Dolor dicta est laudantium aut.', 1816, '2018-12-06 08:51:01', '2018-12-06 08:51:01', 'Approved', 1, 0),
(58, 4, 'Totam quaerat iste minima perspiciatis.', 'Odit nisi distinctio officia voluptates quas fugiat.', 934, '2018-12-06 08:51:01', '2018-12-06 08:51:01', 'Approved', 2, 0),
(59, 9, 'fggg', 'tytytyty', 2000, '2018-12-07 12:44:57', '2018-12-07 12:48:54', 'Approved', 1, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Feeding', '2018-12-03 07:34:27', '2018-12-03 08:05:29'),
(2, 'Housing', '2018-12-03 07:38:58', '2018-12-03 07:38:58'),
(3, 'Clothing', '2018-12-03 08:05:45', '2018-12-03 08:05:45'),
(4, 'Fees', '2018-12-03 08:05:56', '2018-12-03 08:05:56'),
(5, 'NewCat', '2018-12-05 12:31:17', '2018-12-05 12:31:17');

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
(3, '2018_11_30_104222_create_admins_table', 2),
(4, '2018_11_30_141458_create_campaigns_table', 3),
(5, '2018_11_30_141625_add_column_to_users_table', 3),
(6, '2018_11_30_142919_add_columns_to_camaigns', 4),
(7, '2018_12_03_075924_create_categories_table', 5),
(8, '2018_12_03_093308_add_colum_to_camaigns', 6),
(9, '2018_12_03_100623_add_colum_to_campaigns', 7),
(10, '2018_12_06_104055_add_fulltext_search_to_campaigns', 8);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `baned` tinyint(1) DEFAULT '0',
  `suspended` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `gender`, `phone_no`, `registration_no`, `department`, `level`, `account_no`, `bank_name`, `email`, `password`, `profile_pic`, `created_at`, `updated_at`, `baned`, `suspended`) VALUES
(2, 'Jane', 'Jame', 'Doe', 'Female', '0858585885', '0505005', 'Economics', '200', NULL, NULL, 'jane@mail.com', '0000', 'profile_pictures/NPLIP3q2tiom8D3rp4ojiCZY4nMWSi1HL7FUissz.jpeg', '2018-11-28 13:55:44', '2018-12-07 12:46:18', 0, 1),
(3, 'Mercy', 'John', 'Doe', 'Female', '08085858', 'akp/959599', 'Marketing', '100', NULL, NULL, 'mercy@gmail.com', '0000', 'profile_pictures/FqnpHmDQw9T1oeqykKkbhjZUqy0NE8XURSF761BQ.jpeg', '2018-11-30 06:58:03', '2018-12-05 09:38:35', 0, 0),
(4, 'Bassey', 'John', 'Doe', 'Male', '465657767', 'LST/4554', 'CSC', '200', NULL, NULL, 'john@mail.com', '12345', 'profile_pictures/5YZeRwXMGqqUkqXOjMsS0VaXjIOkQ1abfcILRycn.jpeg', '2018-12-04 07:04:34', '2018-12-05 09:39:17', 0, 0),
(5, 'Emeka', 'Obi', 'John', 'Male', '07084884848', 'ake/959l5o', 'Economics', '200', '085858859', 'First Bank', 'emeka@gmail.com', '12345', 'profile_pictures/yRvtIeejhqVd7HzEPobzVG8ZmP3sd2IYsnLP2PFQ.jpeg', '2018-12-04 12:17:31', '2018-12-06 10:32:51', 0, 0),
(6, 'Bassey', 'John', 'Obi', 'Male', '0908488484', 'akp/o/994/44', 'Computer Science', '200', NULL, NULL, 'bassey@mail.com', '0000', 'profile_pictures/Be4wI5krNlaeyjch3jEBFetjJITUTry0nEcHJlbL.jpeg', '2018-12-07 08:08:34', '2018-12-07 08:08:34', 0, 0),
(7, 'erer', 'errer', 'erer', 'Male', '65656', '656', 'ghgh', '400', NULL, NULL, 'ererr@hh.vb', '5555', 'profile_pictures/DTffCemooXZcvjk1he3OUbYLWtEQ2Z38XggXHt5z.jpeg', '2018-12-07 08:13:16', '2018-12-07 08:13:16', 0, 0),
(9, 'Peter', 'James', 'John', 'Male', '56657767', '67767', 'Econs', '200', NULL, NULL, 'peter6@mail.com', '0000', 'profile_pictures/ND0IrKt5oZG6FBTjcj4DTh8wBSLFgW2ueqEcpVuT.jpeg', '2018-12-07 12:41:39', '2018-12-07 12:46:58', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `campaigns` ADD FULLTEXT KEY `campaign_name` (`campaign_name`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
