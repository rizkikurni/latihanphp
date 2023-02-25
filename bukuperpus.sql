-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2023 at 07:56 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daftarbuku`
--

-- --------------------------------------------------------

--
-- Table structure for table `bukuperpus`
--

CREATE TABLE `bukuperpus` (
  `id` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `penulis` varchar(200) NOT NULL,
  `kode` varchar(200) NOT NULL,
  `tahun` char(4) NOT NULL,
  `genre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bukuperpus`
--

INSERT INTO `bukuperpus` (`id`, `judul`, `penulis`, `kode`, `tahun`, `genre`) VALUES
(1, 'holy mother', 'akiyoshi rikakoo', '63b8c59ae5ddc.jpg', '2016', 'misteri, triller'),
(2, 'kimi no nawaa', 'makoto shinkai', '63b8c50311167.jpg', '2016', 'romance'),
(3, 'wetering with you', 'makoto shinkai', '63b8c5a89319f.jpg', '2016', 'romance'),
(4, 'girl in the dark', 'akiyoshi rikako', '63b8c5b7093db.jpg', '2016', 'misteri '),
(5, 'penance', 'minato kanae', '63b8c5c497d65.jpg', '2015', 'misteri');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bukuperpus`
--
ALTER TABLE `bukuperpus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bukuperpus`
--
ALTER TABLE `bukuperpus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
