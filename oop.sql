-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2022 at 02:09 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oop`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(3) NOT NULL,
  `cat_id` int(3) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `photo` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(1) DEFAULT 0,
  `createtime` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `cat_id`, `title`, `content`, `photo`, `name`, `status`, `createtime`) VALUES
(1, 6, 'java', '<p><span style=\"color: rgb(33, 37, 41);\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like</span><br></p>', '20220102091450.jpg', 'admin', 1, '2022-01-02 08:14:50'),
(2, 8, 'html', '<p><span style=\"color: rgb(33, 37, 41);\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like</span><br></p>', '20220102091519.jpg', 'admin', 1, '2022-01-02 08:15:19'),
(3, 10, 'css', '<p><span style=\"color: rgb(33, 37, 41);\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like</span><br></p>', '20220102091718.jpg', 'admin', 1, '2022-01-02 08:17:18'),
(4, 8, 'html', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like<br></p>', '20220102092358.jpg', 'admin', 1, '2022-01-02 08:23:58'),
(5, 12, 'php', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like</p>', '20220102092658.jpg', 'admin', 1, '2022-01-02 08:26:58'),
(6, 14, 'psd to html', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like<br></p>', '20220102092722.jpg', 'admin', 1, '2022-01-02 08:27:22'),
(7, 8, 'html', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like<br></p>', '20220102092738.jpg', 'admin', 1, '2022-01-02 08:27:38'),
(8, 6, 'java', '<p>java</p>', '20220102121602.jpg', 'admin', 1, '2022-01-02 11:16:02'),
(10, 11, 'bootstrap', '<p>bootstrap</p>', '20220102121632.jpg', 'admin', 1, '2022-01-02 11:16:32'),
(12, 15, 'java script', '<p>java script language</p>', '20220104020854.jpg', 'admin', 1, '2022-01-04 01:08:54');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(3) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createtime` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `status`, `createtime`, `updatetime`) VALUES
(6, 'java', 1, '2021-12-30 12:47:58', '2021-12-31 03:34:42'),
(8, 'html', 1, '2021-12-30 12:48:05', '2021-12-31 03:34:43'),
(10, 'css', 1, '2021-12-31 04:23:35', '2021-12-31 04:30:39'),
(11, 'bootstrap', 1, '2021-12-31 04:23:47', '2022-01-02 08:11:17'),
(12, 'php', 1, '2021-12-31 04:23:55', '2021-12-31 04:30:38'),
(14, 'psd to html', 1, '2021-12-31 04:24:08', '2021-12-31 04:30:37'),
(15, 'javascript', 1, '2022-01-04 01:08:18', '2022-01-04 01:08:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `photo` varchar(255) DEFAULT NULL,
  `createtime` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `status`, `photo`, `createtime`, `updatetime`) VALUES
(1, 'admin', 'admin', '5e970c6d40819253f0e13dd8a7206599', 1, '', '2021-12-30 02:03:59', '2021-12-30 02:52:08'),
(2, 'kawsar', 'kawsar', 'a12a6a129a59b6f181fc980fa63507cd', 1, NULL, '2021-12-30 02:23:11', '2021-12-30 02:43:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
