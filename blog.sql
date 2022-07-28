-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2021 at 11:12 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kbtc_2to5_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_publish` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `categories_id`, `title`, `content`, `img`, `is_publish`, `timestamp`) VALUES
(6, 1, 'What is HTML?', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam veniam ab sapiente natus quam omnis quos excepturi explicabo corporis! Unde facilis incidunt voluptatem placeat eligendi officiis atque doloremque! Rerum, architecto. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam veniam ab sapiente natus quam omnis quos excepturi explicabo corporis! Unde facilis incidunt voluptatem placeat eligendi officiis atque doloremque! Rerum, architecto.Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam veniam ab sapiente natus quam omnis quos excepturi explicabo corporis! Unde facilis incidunt voluptatem placeat eligendi officiis atque doloremque! Rerum, architecto.Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam veniam ab sapiente natus quam omnis quos excepturi explicabo corporis! Unde facilis incidunt voluptatem placeat eligendi officiis atque doloremque! Rerum, architecto.', '1637485383wallpaper.jpg', '1', '2021-12-11 08:05:47'),
(9, 1, 'What is CSS ', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam veniam ab sapiente natus quam omnis quos excepturi explicabo corporis! Unde facilis incidunt voluptatem placeat eligendi officiis atque doloremque! Rerum, architecto.\r\n\r\n Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam veniam ab sapiente natus quam omnis quos excepturi explicabo corporis! Unde facilis incidunt voluptatem placeat eligendi officiis atque doloremque! Rerum, architecto.Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam veniam ab sapiente natus quam omnis quos excepturi explicabo corporis! Unde facilis incidunt voluptatem placeat eligendi officiis atque doloremque! Rerum, architecto.Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam veniam ab sapiente natus quam omnis quos excepturi explicabo corporis! Unde facilis incidunt voluptatem placeat eligendi officiis atque doloremque! Rerum, architecto.', '1638696255wallpaper.jpg', '0', '2021-12-11 09:51:09'),
(10, 8, 'REST API', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam veniam ab sapiente natus quam omnis quos excepturi explicabo corporis! Unde facilis incidunt voluptatem placeat eligendi officiis atque doloremque! Rerum, architecto. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam veniam ab sapiente natus quam omnis quos excepturi explicabo corporis! Unde facilis incidunt voluptatem placeat eligendi officiis atque doloremque! Rerum, architecto.Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam veniam ab sapiente natus quam omnis quos excepturi explicabo corporis! Unde facilis incidunt voluptatem placeat eligendi officiis atque doloremque! Rerum, architecto.Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam veniam ab sapiente natus quam omnis quos excepturi explicabo corporis! Unde facilis incidunt voluptatem placeat eligendi officiis atque doloremque! Rerum, architecto.', '1638696272wallpaper.jpg', '1', '2021-12-11 08:05:36');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_publish` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `is_publish`, `created_at`) VALUES
(1, 'Web Development', '1', '2021-11-06 09:55:23'),
(2, 'Mobile Development', '1', '2021-11-07 10:28:36'),
(8, 'API Development', '1', '2021-12-05 09:26:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$mHfXcZkkhm9AbG3jwzyMIuGC1DqHlCNMqT.5NJitXYrB8kVeA0pJC', '2021-11-06 08:31:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `INDEXING` (`categories_id`,`title`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `INDEXING` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CREDENTIALS` (`email`,`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
