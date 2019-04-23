-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Mar 20, 2019 at 07:04 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created`, `modified`) VALUES
(1, 'Fashion', 'Category for anything related to fashion.', '2014-06-01 00:35:07', '2014-05-30 15:34:33'),
(2, 'Electronics', 'Gadgets, drones and more.', '2014-06-01 00:35:07', '2014-05-30 15:34:33'),
(3, 'Motors', 'Motor sports and more', '2014-06-01 00:35:07', '2014-05-30 15:34:54'),
(5, 'Movies', 'Movie products.', '0000-00-00 00:00:00', '2016-01-08 11:27:26'),
(6, 'Books', 'Kindle books, audio books and more.', '0000-00-00 00:00:00', '2016-01-08 11:27:47'),
(13, 'Sports', 'Drop into new winter gear.', '2016-01-09 02:24:24', '2016-01-08 23:24:24');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `category_id`, `created`, `modified`) VALUES
(1, 'Samsung updated', 'jejeje', '100', 2, '2019-03-18 20:29:27', '2014-05-31 15:12:26'),
(2, 'Google Nexus 4', 'The most awesome phone of 2013!', '299', 2, '2014-06-01 01:12:26', '2014-05-31 15:12:26'),
(3, 'Samsung Galaxy S4', 'How about no?', '600', 3, '2014-06-01 01:12:26', '2014-05-31 15:12:26'),
(6, 'Bench Shirt', 'The best shirt!', '29', 1, '2014-06-01 01:12:26', '2014-05-31 00:12:21'),
(7, 'Lenovo Laptop', 'My business partner.', '399', 2, '2014-06-01 01:13:45', '2014-05-31 00:13:39'),
(8, 'Samsung Galaxy Tab 10.1', 'Good tablet.', '259', 2, '2019-03-18 20:12:40', '2014-05-31 00:14:08'),
(9, 'Spalding Watch', 'My sports watch.', '199', 1, '2014-06-01 01:18:36', '2014-05-31 00:18:31'),
(10, 'Sony Smart Watch', 'The coolest smart watch!', '300', 2, '2014-06-06 17:10:01', '2014-06-05 16:09:51'),
(11, 'Huawei Y300', 'For testing purposes.', '100', 2, '2014-06-06 17:11:04', '2014-06-05 16:10:54'),
(12, 'Abercrombie Lake Arnold Shirt', 'Perfect as gift!', '60', 1, '2014-06-06 17:12:21', '2014-06-05 16:12:11'),
(13, 'Abercrombie Allen Brook Shirt', 'Cool red shirt!', '70', 1, '2014-06-06 17:12:59', '2014-06-05 16:12:49'),
(26, 'Another product', 'Awesome product!', '555', 2, '2014-11-22 19:07:34', '2014-11-21 18:07:34'),
(28, 'Wallet', 'You can absolutely use this one!', '799', 6, '2014-12-04 21:12:03', '2014-12-03 20:12:03'),
(31, 'Amanda Waller Shirt', 'New awesome shirt!', '333', 1, '2014-12-13 00:52:54', '2014-12-11 23:52:54'),
(42, 'Nike Shoes for Men', 'Nike Shoes', '12999', 3, '2015-12-12 06:47:08', '2015-12-12 03:47:08'),
(48, 'Bristol Shoes', 'Awesome shoes.', '999', 5, '2016-01-08 06:36:37', '2016-01-08 03:36:37'),
(60, 'Rolex Watch', 'Luxury watch.', '25000', 1, '2016-01-11 15:46:02', '2016-01-11 12:46:02'),
(61, 'Amazing Pillow 2.0', 'The best pillow for amazing programmers.', '199', 2, '2019-03-12 15:39:18', '2019-03-12 14:39:18'),
(62, 'Amazing Pillow 2.0', 'The best pillow for amazing programmers.', '199', 2, '2019-03-12 15:39:19', '2019-03-12 14:39:19'),
(63, 'Amazing Pillow 2.0', ' pillow for amazing programmers.', '255', 2, '2018-08-01 00:35:07', '2019-03-12 14:39:20'),
(64, 'Amazing Pillow and 200', 'The best pillow for amazing programmers 200', '200', 2, '2019-03-14 13:33:23', '2019-03-14 12:33:23'),
(65, 'Amazing Pillow and 200', 'The best pillow for amazing programmers 200', '200', 2, '2019-03-14 13:34:34', '2019-03-14 12:34:34'),
(66, 'Amazing Pillow and 200', 'The best pillow for amazing programmers 200', '200', 2, '2019-03-14 13:40:31', '2019-03-14 12:40:31'),
(67, 'Amazing Pillow and 200', 'The best pillow for amazing programmers 200', '200', 2, '2019-03-14 14:20:58', '2019-03-14 13:20:58'),
(68, 'Sumsung J6 plus', 'Android 8', '4000', 2, '2019-03-18 18:48:25', '2019-03-18 17:48:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
