-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2020 at 02:41 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `berita`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `deskripsi` varchar(300) DEFAULT NULL,
  `create_time` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `image`, `deskripsi`, `create_time`, `user_id`) VALUES
(10, 'Gijoe', '5f782fada33d4.jpg', 'G.I. Joe: Retaliation adalah film laga fiksi ilmiah militer Amerika Serikat tahun 2013 yang disutradarai oleh Jon M. Chu yang kisahnya berdasarkan pada mainan, komik dan media waralaba G.I. Joe dari Hasbro. Film ini ditulis oleh Rhett Reese dan Paul Wernick, dan merupakan sekuel dari film tahun 2009', '2020-10-03 10:00:45', 6),
(11, 'Marvel', '5f78323d914c9.jpg', 'Captain Marvel dibuka dengan cerita Vers (Brie Larson), calon pejuang yang ingin mengabdikan dirinya untuk bangsa Kree dari Planet Hala. Ia, sebenarnya bukan bagian dari Kree, ras alien yang memiliki teknologi luar biasa canggih. Ia diselamatkan oleh Yon-Rogg (Jude Law), dari sebuah peristiwa yang m', '2020-10-03 10:11:41', 7),
(12, 'mulan', '5f785a4a2d0f0.jpg', 'ini film mulan 2020 full movice', '2020-10-03 13:02:34', 8);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `role` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `role`) VALUES
(6, 'herdi hidayat', 'herdi.kom@gmail.com', 'admin'),
(7, 'rizky', 'rizky@gmail.com', 'user'),
(8, 'resya', 'resya@gmail.com', 'user'),
(9, 'salsabilah', 'salsabillah@gmail.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`,`user_id`),
  ADD KEY `news_ibfk_1` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
