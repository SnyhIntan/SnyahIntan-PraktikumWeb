-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2024 at 04:00 PM
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
-- Database: `dbtoko`
--
CREATE DATABASE IF NOT EXISTS `dbtoko` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dbtoko`;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `jumlah` decimal(10,0) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `gambar`, `nama`, `harga`, `quantity`, `jumlah`, `tanggal`) VALUES
(1, '2024-10-15 08.32.22.jpg', 'SPIRULINA', 90000.00, 8, 720000, '2024-10-06 20:44:47'),
(6, '', 'MAGAFIT', 90000.00, 2, 180000, '2024-10-07 16:08:46'),
(9, '2024-10-15 07.23.23.jpg', 'PEGAGAN', 90000.00, 3, 270000, '2024-10-07 16:14:53'),
(16, '2024-10-15 07.09.12.jpg', 'NIGHT CREAM', 85000.00, 3, 255000, '2024-10-09 13:03:26'),
(19, '', 'SINAI OLIVE OIL', 35000.00, 5, 175000, '2024-10-15 13:33:10'),
(21, '2024-10-15 08.45.14.jpg', 'HNI HEALTH', 80000.00, 3, 240000, '2024-10-15 14:44:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `usia` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `usia`, `password`, `role`) VALUES
(1, 'sansan', 'slverqueen794@gmail.com', 20, '$2y$10$qFMjiUpNKfX4OPdkEKhaxep5TgmPmMF3Opv0EV2PJFW2n7g8jdVPe', 'admin'),
(2, 'lala', 'raihanrahmadiniputri@gmail.com', 17, '$2y$10$mEjq3vR3WcPIF81A9n4ZmeaEmrmEMnG2ZtSzReA/SXK2XHp00rJ4S', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
