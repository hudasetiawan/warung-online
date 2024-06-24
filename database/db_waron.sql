-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 07:31 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_waron`
--

-- --------------------------------------------------------

--
-- Table structure for table `makanan`
--

CREATE TABLE `makanan` (
  `menu` varchar(50) NOT NULL,
  `harga` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `makanan`
--

INSERT INTO `makanan` (`menu`, `harga`) VALUES
('Ayam Bakar', 14000),
('Ayam Goreng', 12000),
('Bebek Bakar', 16000),
('Bebek Goreng', 14000),
('Belut Goreng', 11000),
('Cireng', 7000),
('Cumi Bakar', 12000),
('Jamur Crispy', 7000),
('Kentang Goreng', 10000),
('Kulit Crispy', 11000),
('Kwetiau Goreng', 14000),
('Kwetiau Rebus', 14000),
('Lele Bakar', 12000),
('Magelangan', 15000),
('Nasi Gila', 20000),
('Nasi Goreng', 14000),
('Nasi Goreng + Telor', 17000),
('Nasi Goreng Special', 20000),
('Nila Bakar', 15000),
('Nila Goreng', 14000);

-- --------------------------------------------------------

--
-- Table structure for table `minuman`
--

CREATE TABLE `minuman` (
  `menu` varchar(50) NOT NULL,
  `harga` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `minuman`
--

INSERT INTO `minuman` (`menu`, `harga`) VALUES
('Air Putih', 1000),
('Cappuccino Coffee (Es)', 12000),
('Cappuccino Coffee (Hangat)', 11000),
('Es Jeruk', 4000),
('Es Teh', 3000),
('Jus Alpukat', 12000),
('Jus Buah Naga', 12000),
('Jus Jambu', 8000),
('Jus Mangga', 10000),
('Jus Melon', 10000),
('Jus Nanas', 10000),
('Jus Tomat', 7000),
('Lemon Tea', 5000),
('Lychee Tea', 9000),
('Teh Tarik', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `orderan`
--

CREATE TABLE `orderan` (
  `id` int(10) NOT NULL,
  `menu` varchar(50) NOT NULL,
  `harga` int(20) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderan`
--

INSERT INTO `orderan` (`id`, `menu`, `harga`, `jumlah`, `username`) VALUES
(11, 'Ayam Bakar', 14000, 1, 'arya'),
(12, 'Kwetiau Goreng', 14000, 1, 'arya'),
(13, 'Nasi Gila', 20000, 4, 'gibran'),
(14, 'Bebek Goreng', 14000, 1, 'hudaa'),
(15, 'Es Jeruk', 4000, 1, 'hudaa'),
(16, 'Nasi Goreng + Telor', 17000, 3, 'gibran');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('Penjual','Pembeli') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `role`) VALUES
('admin', 'admin', 'Penjual'),
('arya', 'uhuy', 'Pembeli'),
('gibran', 'okee', 'Pembeli'),
('hudaa', 'ganteng', 'Pembeli'),
('mudah', 'oke', 'Pembeli'),
('oke', 'wir', 'Pembeli');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`menu`);

--
-- Indexes for table `minuman`
--
ALTER TABLE `minuman`
  ADD PRIMARY KEY (`menu`);

--
-- Indexes for table `orderan`
--
ALTER TABLE `orderan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orderan`
--
ALTER TABLE `orderan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
