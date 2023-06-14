-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2023 at 11:15 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jbn_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(256) NOT NULL,
  `No_of_products` int(11) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `No_of_products`, `reg_date`, `status`) VALUES
(83, 'Dry Fruits ', 10, '2023-05-25 03:40:14', '1'),
(84, 'Millets ', 7, '2023-05-25 03:40:52', '1'),
(85, 'Noodles ', 8, '2023-05-25 03:41:29', '1'),
(86, 'Spicy Powders', 11, '2023-05-25 03:42:07', '1'),
(87, 'Puja Items', 7, '2023-05-25 03:42:29', '1'),
(88, 'Rice Items ', 5, '2023-05-25 03:42:50', '1'),
(89, 'Flours', 8, '2023-05-25 03:43:08', '1'),
(90, 'Herbal Items', 13, '2023-05-25 03:43:35', '1'),
(91, 'Jaggery/ Sugar Items', 9, '2023-05-26 12:18:57', '1'),
(93, 'All Pulses ', 11, '2023-05-26 12:28:51', '1'),
(94, 'Masala Items ', 16, '2023-06-08 09:09:37', '1'),
(95, 'Tea, Coffee & Beverages ', 11, '2023-06-06 04:25:25', '1'),
(112, 'Other Items', 20, '2023-05-26 12:19:23', '1'),
(132, 'Cold Pressed Oils', 6, '2023-06-08 11:51:22', '1');

-- --------------------------------------------------------

--
-- Table structure for table `jbn_contact_details`
--

CREATE TABLE `jbn_contact_details` (
  `id` int(6) UNSIGNED NOT NULL,
  `customer_name` varchar(256) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_phone` bigint(20) NOT NULL,
  `customer_message` text DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jbn_contact_details`
--

INSERT INTO `jbn_contact_details` (`id`, `customer_name`, `customer_email`, `customer_phone`, `customer_message`, `reg_date`, `status`) VALUES
(16, '.kdm,', 'kjdj@gmail.com', 6545556465, '', '2023-05-30 08:49:47', 2),
(17, '.kdm,', 'kjdj@gmail.com', 6545556465, '', '2023-05-30 08:49:11', 2),
(18, '.kdm,', 'kjdj@gmail.com', 6545556465, '', '2023-05-30 08:48:51', 2),
(19, 'djlk', 'kjend@gmail.com', 6565136622, '', '2023-05-30 08:43:58', 2),
(20, 'Njknskj', 'hd@gmail.com', 6586411697, 'Hey', '2023-06-01 11:27:49', 2),
(21, 'kjjndjn', 'efjn@gm.com', 5615648948, '', '2023-05-30 09:58:09', 2),
(22, 'Varshit', 'Varshit@gmail.com', 9876543210, 'Hello There!!!', '2023-05-30 06:02:23', 1),
(23, 'lkfn', 'dj@gmail.com', 6584561548, '', '2023-06-01 11:24:38', 2),
(24, 'Hemanth', 'hemanth@gmail.com', 8551239987, 'This is a test message. This message contains nothing but sample text to test the backend. We have to also confirm that it is reflecting in the admin dashboard', '2023-05-30 08:51:25', 1),
(25, 'kjdnkjn', 'nejf@gmail.com', 9864649645, 'dnjAKNFIOEJFkmeklmKLEFnoijoijrkslkalkj;iENCKN NIONFION KNJNJDNKFEUJr kfnkndmc d lk akjkfn lkdmf eom dakakl ioejfFK;aKJ J IJ OIJFEIOAJFLKMSKDDMFDKJNFLJKsjkjnfjknurh jkdfjndfjkndsufhurhfafjartioakfkjahfjkdhfjhfalsuhruhfjn jf jj fjdhfjhdushtrtyuy84y892y8fjkvn', '2023-05-30 10:41:00', 2),
(26, 'jjdnkj', 'kjf@gm.com', 4984656848, 'AdkjhuidhieknefuihhkjJKHFKHeuhfUHDJNFDJBCBUIjfjdfueUIHUIHUIFhuidjkjkHUFIHUIERHFUHFJKBDJAHFShhdguhUIWRHJKVLJKL;UUHGRUKJ JRKFJKDJF IF IIUH UIFHEUIH IFH IIFH IH IH ', '2023-05-30 10:39:08', 2),
(27, 'ywbhwbdu', 'jbwd@gm.com', 4845653121, 'bhjdb djknd jkf oeijf eijr fj jeoij ejriojio3j jfijn kfnlkefniejr ij 3iorjio j3 kl 3lk iojr 3fkl kl3j rj n3fkn n3klf3 ijri n k3nirij nkln r3i', '2023-05-30 10:40:59', 2),
(28, 'ekjfnjk', 'wdnjk@gm.com', 5632189413, 'Absuywgybdj jd e flhufh euifuiheuih iufhie fuih ehiuiiiiuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu', '2023-05-30 10:40:54', 2),
(29, 'BBknkjdnjk', 'dwjknjk@gmail.com', 4894894646, '', '2023-05-30 12:06:09', 1),
(30, 'iuehfenflkn', 'ksjdbjk@gmail.com', 6465654894, 'BAbdbkjdbjksb hhw jkdhw h dljwh jkwhjk hdkjl hlwjkhd jJ jd jJD HJKWD JKWNDJK NJKW DH WJKND KJWN JKNDJKW', '2023-06-01 11:27:04', 2),
(31, 'varshit', 'varshitvasu@gmail.com', 7894612358, 'How to buy?', '2023-06-14 06:21:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `fullName` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phoneNo` bigint(20) DEFAULT NULL,
  `address` varchar(256) NOT NULL,
  `city` varchar(256) NOT NULL,
  `pincode` bigint(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `productName` varchar(256) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` varchar(256) NOT NULL,
  `status` int(11) DEFAULT 1,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL,
  `reason` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `fullName`, `email`, `phoneNo`, `address`, `city`, `pincode`, `product_id`, `productName`, `quantity`, `total`, `status`, `reg_date`, `user_id`, `reason`) VALUES
(15, 'Varshit', 'varshit@gmail.com', 2147483647, 'Earth', 'Somewhere', 530003, 129, 'Strawberry Shake', 1, '45', 4, '2023-06-07 10:19:20', 0, ''),
(16, 'Varshit', 'varshit@gmail.com', 2147483647, 'Earth', 'Somewhere', 530003, 129, 'Strawberry Shake', 1, '45', 4, '2023-06-07 10:18:28', 0, ''),
(17, 'Hey ', 'sample@gmail.com', 6565156169, 'jnejndjenl', 'enflkmlk', 5616556, 141, 'Jaggery Powder', 1, '250', 2, '2023-06-07 10:15:19', 0, ''),
(18, 'Hemanth', 'hemant@shiftwave.com', 9999999999, 'poornamark', 'vizag', 50004, 132, 'Badam Shake', 2, '100', 1, '2023-06-08 04:55:44', 0, ''),
(19, 'yeah', 'hemanth@shiftwave.com', 6165165165, 'lkdmdklw', 'wmdlk', 651651, 156, 'Mustard Oil', 1, '150', 5, '2023-06-14 08:29:29', 0, ''),
(20, 'yeah', 'hemanth@shiftwave.com', 6165165165, 'lkdmdklw', 'wmdlk', 651651, 156, 'Mustard Oil', 1, '150', 1, '2023-06-09 11:28:16', 0, ''),
(21, 'yeah', 'hemanth@shiftwave.com', 6165165165, 'lkdmdklw', 'wmdlk', 651651, 156, 'Mustard Oil', 1, '150', 1, '2023-06-09 11:28:16', 0, ''),
(22, 'yeah', 'hemanth@shiftwave.com', 6165165165, 'lkdmdklw', 'wmdlk', 651651, 156, 'Mustard Oil', 1, '150', 1, '2023-06-09 11:29:08', 0, ''),
(23, 'yeah', 'hemanth@shiftwave.com', 6165165165, 'lkdmdklw', 'wmdlk', 651651, 156, 'Mustard Oil', 1, '150', 1, '2023-06-09 11:29:08', 0, ''),
(24, 'yeah', 'hemanth@shiftwave.com', 6165165165, 'lkdmdklw', 'wmdlk', 651651, 156, 'Mustard Oil', 1, '150', 1, '2023-06-09 11:29:08', 0, ''),
(36, 'Varshit', 'varshitvasu@gmail.com', 7894561230, 'India', 'India', 530003, 143, 'Organic Sugar', 1, '160', 1, '2023-06-10 03:14:29', 4, ''),
(37, 'Hemanth', 'hemanth@shiftwave.com', 7895446662, 'India', 'India', 530003, 128, 'Mocktails', 1, '200', 1, '2023-06-10 03:35:07', 3, ''),
(38, 'Varshit', 'varshitvasu@gmail.com', 6516514165, 'Yeah ', 'wdno', 89465, 134, 'White Rice', 1, '500', 1, '2023-06-11 16:57:08', 4, ''),
(39, 'hemanth', 'hemant@shiftwave.com', 6516565165, 'Shiftwave', 'Vizag', 530003, 146, 'Millet Malt', 1, '150', 1, '2023-06-12 10:49:17', 3, ''),
(40, 'hemanth', 'hemant@shiftwave.com', 9876543210, 'Shiftwave', 'Visakhapatnam', 530003, 125, 'Aruku Instant Coffee', 2, '340', 1, '2023-06-12 11:48:42', 3, ''),
(41, 'hemanth', 'hemant@shiftwave.com', 9876543210, 'Shiftwave', 'Visakhapatnam', 530003, 133, 'Brown Rice ', 1, '680', 1, '2023-06-14 05:05:35', 3, ''),
(42, 'Varshit', 'varshitvasu@gmail.com', 9888888555, 'Vizag', 'Vizag', 530003, 130, 'Chocolate Shake', 1, '45', 1, '2023-06-14 05:06:51', 4, ''),
(43, 'Varshit', 'varshitvasu@gmail.com', 9876541239, 'Vizag', 'Vizag', 530015, 144, 'Brown Sugar', 3, '870', 1, '2023-06-14 05:30:34', 4, ''),
(44, 'Varshit', 'varshitvasu@gmail.com', 9874533215, 'Vizag', 'Vizag', 8888888, 123, 'Ginger Tea Powder', 1, '100', 1, '2023-06-14 05:43:50', 4, ''),
(45, 'Varshit', 'varshitvasu@gmail.com', 9876543210, 'Vizag', 'Vizag', 5300015, 157, 'Sunflower Oil', 1, '160', 1, '2023-06-14 05:49:28', 4, ''),
(46, 'Varshit', 'varshitvasu@gmail.com', 9876543210, 'Vizag', 'Vizag', 5300015, 156, 'Mustard Oil', 2, '300', 1, '2023-06-14 06:10:32', 4, ''),
(47, 'Varshit', 'varshitvasu@gmail.com', 9876543210, 'Vizag', 'Vizag', 5300015, 152, 'Millet Idly ravva', 1, '250', 1, '2023-06-14 06:12:19', 4, ''),
(48, 'Varshit', 'varshitvasu@gmail.com', 9876543210, 'Vizag', 'Vizag', 5300015, 140, 'Palak Noodles', 1, '89', 0, '2023-06-14 08:59:50', 4, 'NO REASON'),
(49, 'Varshit', 'varshitvasu@gmail.com', 9876543210, 'Vizag', 'Vizag', 5300015, 150, 'Millet idly', 1, '230', 1, '2023-06-14 06:48:40', 4, ''),
(51, 'Varshit', 'varshitvasu@gmail.com', 9876543210, 'Vizag', 'Vizag', 5300015, 149, 'Millet Dosa', 1, '250', 1, '2023-06-14 07:12:42', 4, ''),
(52, 'Varshit', 'varshitvasu@gmail.com', 9876543210, 'Vizag', 'Vizag', 5300015, 156, 'Mustard Oil', 1, '150', 1, '2023-06-14 08:38:58', 4, ''),
(53, 'Varshit', 'varshitvasu@gmail.com', 9876543210, 'Vizag', 'Vizag', 5300015, 157, 'Sunflower Oil', 1, '160', 1, '2023-06-14 08:44:27', 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `productName` varchar(30) NOT NULL,
  `productPrice` varchar(30) NOT NULL,
  `productQuantity` int(11) NOT NULL,
  `status` int(11) DEFAULT 1,
  `ctg_id` int(11) NOT NULL,
  `productImage` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productName`, `productPrice`, `productQuantity`, `status`, `ctg_id`, `productImage`, `reg_date`) VALUES
(122, 'Lemon Tea powder', '150.00', 10, 1, 95, 'lemon tea powder.jpeg', '2023-06-07 12:26:05'),
(123, 'Ginger Tea Powder', '100.00', 15, 1, 95, 'ginger tea powder.jpeg', '2023-06-07 12:26:09'),
(124, 'Green Tea powder', '120.00', 20, 1, 95, 'green tea powder.jpeg', '2023-06-07 12:26:13'),
(125, 'Aruku Instant Coffee', '170.00', 10, 1, 95, 'araku instant coffee.jpeg', '2023-06-07 12:26:16'),
(126, 'Pure & Sure Coffee', '100.00', 10, 1, 95, 'pure&sure coffee.jpeg', '2023-06-07 12:26:22'),
(127, 'Filter Coffee Powder', '80.00', 5, 1, 95, 'filter coffee powder.jpeg', '2023-06-07 12:26:26'),
(128, 'Mocktails', '200.00', 10, 1, 95, 'Mocktails.jpeg', '2023-06-07 12:26:29'),
(129, 'Strawberry Shake', '45.00', 40, 1, 95, 'strawberry shake.jpeg', '2023-06-07 12:26:33'),
(130, 'Chocolate Shake', '45.00', 40, 1, 95, 'chocoloate shake.jpeg', '2023-06-07 12:26:38'),
(131, 'Coffee Shake', '50.00', 40, 1, 95, 'coffee shake.jpeg', '2023-06-07 12:26:43'),
(132, 'Badam Shake', '50.00', 40, 1, 95, 'badam shake.jpeg', '2023-06-07 12:26:47'),
(133, 'Brown Rice ', '680.00', 10, 1, 88, 'brown rice.webp', '2023-06-07 12:26:54'),
(134, 'White Rice', '500.00', 10, 1, 88, 'white rice.webp', '2023-06-07 12:26:57'),
(135, 'Black Rice', '750.00', 5, 1, 88, 'black rice.jpeg', '2023-06-07 12:27:01'),
(136, 'Red Rice', '750.00', 5, 1, 88, 'red rice.jpeg', '2023-06-07 12:27:05'),
(137, 'Beaten Rice', '450.00', 5, 1, 88, 'beaten rice.jpeg', '2023-06-07 12:27:08'),
(138, 'Desi Veg Noodles', '89.00', 10, 1, 85, 'desi veg noodles.jpeg', '2023-06-07 12:27:12'),
(139, 'Desi Chicken Noodles', '109.00', 10, 1, 85, 'desi chicken noodles.jpeg', '2023-06-07 12:27:26'),
(140, 'Palak Noodles', '89.00', 10, 1, 85, 'palak noodles.jpeg', '2023-06-07 12:27:31'),
(141, 'Jaggery Powder', '250.00', 5, 1, 91, 'jaggery powder.jpeg', '2023-06-07 12:27:35'),
(142, 'Jaggery Cubes', '230.00', 5, 1, 91, 'jaggery cubes.jpeg', '2023-06-07 12:27:37'),
(143, 'Organic Sugar', '160.00', 10, 1, 91, 'organic sugar.jpeg', '2023-06-07 12:27:42'),
(144, 'Brown Sugar', '290.00', 5, 1, 91, 'brown sugar.jpeg', '2023-06-07 12:27:47'),
(145, 'Khandasari sugar', '230.00', 5, 1, 91, 'khandasari sugar.jpeg', '2023-06-07 12:27:55'),
(146, 'Millet Malt', '150.00', 10, 1, 84, 'millet malt.jpeg', '2023-06-07 12:23:30'),
(147, 'Sample product', '505.00', 100, 2, 112, 'Screenshot_20221227_195802.png', '2023-06-08 09:13:57'),
(148, 'Millet Upma', '250.00', 10, 1, 84, 'millet upma.jpeg', '2023-06-08 11:41:20'),
(149, 'Millet Dosa', '250.00', 10, 1, 84, 'millet dosa.jpeg', '2023-06-08 11:46:30'),
(150, 'Millet idly', '230.00', 5, 1, 84, 'millet idly.jpeg', '2023-06-08 11:48:22'),
(151, 'Millet Mix', '300.00', 10, 1, 84, 'millet mix.jpeg', '2023-06-08 11:47:44'),
(152, 'Millet Idly ravva', '250.00', 5, 1, 84, 'millet idly ravva mix.jpg', '2023-06-08 12:00:01'),
(153, 'Groundnut Oil', '160.00', 10, 1, 132, 'ground nut oil.jpeg', '2023-06-08 12:00:04'),
(154, 'Sesame Oil', '220.00', 10, 2, 132, 'sesameoil.jpg', '2023-06-14 08:59:13'),
(155, 'Coconut Oil', '100.00', 10, 1, 132, 'Coconut Oil.jpeg', '2023-06-08 12:01:02'),
(156, 'Mustard Oil', '150.00', 5, 1, 132, 'mustard oil.jpeg', '2023-06-08 12:01:44'),
(157, 'Sunflower Oil', '160.00', 10, 1, 132, 'sunflower oil.jpeg', '2023-06-08 12:02:19'),
(158, 'Ghee', '150.00', 15, 1, 132, 'ghee.jpeg', '2023-06-12 11:35:55');

-- --------------------------------------------------------

--
-- Table structure for table `users_db`
--

CREATE TABLE `users_db` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `email_id` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `status` int(11) DEFAULT 1,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_admin` int(11) DEFAULT 0,
  `phoneNo` bigint(20) NOT NULL,
  `address` varchar(256) NOT NULL,
  `city` varchar(256) NOT NULL,
  `pincode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_db`
--

INSERT INTO `users_db` (`id`, `username`, `email_id`, `password`, `status`, `reg_date`, `is_admin`, `phoneNo`, `address`, `city`, `pincode`) VALUES
(1, 'admin', 'admin@gmail.com', 'Sample@123', 1, '2023-06-09 07:01:18', 1, 0, '', '', 0),
(2, 'Legend', 'legend@gmail.com', '123456789', 1, '2023-06-09 06:15:45', 0, 0, '', '', 0),
(3, 'hemanth', 'hemant@shiftwave.com', 'Shiftwave@123', 1, '2023-06-12 11:23:17', 0, 9876543210, 'Shiftwave', 'Visakhapatnam', 530003),
(4, 'Varshit', 'varshitvasu@gmail.com', '123456789', 1, '2023-06-14 05:49:17', 0, 9876543210, 'Vizag', 'Vizag', 5300015),
(6, 'jonsnow', 'jonsnow6302@gmail.com', '9876543210', 1, '2023-06-14 04:02:41', 0, 0, '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jbn_contact_details`
--
ALTER TABLE `jbn_contact_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_db`
--
ALTER TABLE `users_db`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `jbn_contact_details`
--
ALTER TABLE `jbn_contact_details`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `users_db`
--
ALTER TABLE `users_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
