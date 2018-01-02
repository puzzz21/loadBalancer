-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 29, 2017 at 10:44 AM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ntapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `ntapp_region_servers`
--

CREATE TABLE `region_servers` (
  `id` int(11) NOT NULL,
  `country` varchar(2),
  `region` varchar(2) DEFAULT NULL,
  `server_url` varchar(100),
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ntapp_region_servers`
--

INSERT INTO `region_servers` (`id`, `country`, `region`, `server_url`, `created_at`, `updated_at`) VALUES
(4, 'JP', '', 'asia.example.com', '2017-12-27 06:07:12', '2017-12-27 22:50:10'),
(5, 'KR', 'fd', 'asia.example.com', '2017-12-27 06:07:20', '2017-12-27 22:50:16'),
(6, 'FR', '', 'europe.example.com', '2017-12-27 06:07:29', '2017-12-27 06:07:29'),
(7, 'GB', '', 'europe.example.com', '2017-12-27 06:07:35', '2017-12-27 06:07:35'),
(8, 'IT', '', 'europe.example.com', '2017-12-27 06:07:42', '2017-12-27 06:07:42'),
(9, 'US', 'CA', 'east.usa.example.com', '2017-12-27 06:08:09', '2017-12-27 06:08:09'),
(10, 'US', 'NV', 'east.usa.example.com', '2017-12-27 06:08:29', '2017-12-27 06:08:29'),
(11, 'US', 'OR', 'east.usa.example.com', '2017-12-27 06:08:38', '2017-12-27 06:08:38'),
(12, 'US', 'WA', 'east.usa.example.com', '2017-12-27 06:08:45', '2017-12-27 06:08:45'),
(13, 'US', 'MT', 'east.usa.example.com', '2017-12-27 06:08:53', '2017-12-27 06:08:53'),
(14, 'US', 'ND', 'east.usa.example.com', '2017-12-27 06:09:00', '2017-12-27 06:09:00'),
(15, 'US', 'MN', 'east.usa.example.com', '2017-12-27 06:09:06', '2017-12-27 06:09:06'),
(16, 'US', 'CA', 'east.usa.example.com', '2017-12-27 06:09:14', '2017-12-27 06:09:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ntapp_region_servers`
--
ALTER TABLE `region_servers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ntapp_region_servers`
--
ALTER TABLE `region_servers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
