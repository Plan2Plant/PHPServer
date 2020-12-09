-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 09, 2020 at 11:25 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plan2plant`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `size` varchar(200) NOT NULL,
  `soil` varchar(200) NOT NULL,
  `temp` int(11) NOT NULL,
  `max_temp` varchar(200) NOT NULL,
  `min_temp` varchar(200) NOT NULL,
  `humidity` int(11) NOT NULL,
  `kml` varchar(200) NOT NULL,
  `longitude` varchar(200) NOT NULL,
  `latitude` varchar(200) NOT NULL,
  `altitude` varchar(200) NOT NULL,
  `banana` text NOT NULL,
  `corn` text NOT NULL,
  `avocado` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `name`, `size`, `soil`, `temp`, `max_temp`, `min_temp`, `humidity`, `kml`, `longitude`, `latitude`, `altitude`, `banana`, `corn`, `avocado`) VALUES
(1, '×’×•× ×’×œ ×ž×–×¨×—', '101 ×“×•× ×', 'clay loam', 1, '39.5', '7.55555', 61, '1.kml', '35.58644568026617', '32.6454856061015', '231.2725903313523', 'Banana growing, desirable planting date: August 2021,', 'Growing corn, desirable planting date: November 2021, estimated harvest time: March 2022', 'Growing Avocado Haas, Desirable Planting Date: September 2021, Estimated Harvest Time: November 2024'),
(2, '×× ×“×¨×˜×” ×ž×¢×¨×‘', '90 ×“×•× ×', 'clay', 2, '36.232554', '7.50000', 57, '2.kml', '35.58000914728155', '32.65256157993829', '359.9999991404968', 'Banana growing, desirable planting date: August 2021,', 'Growing corn, desirable planting date: November 2021, estimated harvest time: March 2022', 'Growing Avocado Haas, Desirable Planting Date: September 2021, Estimated Harvest Time: November 2024'),
(3, '×“×•×©×Ÿ ×', '150 ×“×•× ×', 'clay', 3, '32.000555', '7.5056543', 60, '3.kml', '35.54150521271467', '32.54635456196131', '-226.5623086532972', 'Banana growing, desirable planting date: August 2021,', 'Growing corn, desirable planting date: November 2021, estimated harvest time: March 2022', 'Growing Avocado Haas, Desirable Planting Date: September 2021, Estimated Harvest Time: November 2024'),
(4, '×”×ž×¢×™×™×Ÿ', '50 ×“×•× ×', 'heavy clay', 4, '28.33333333', '7.556532', 68, '4.kml', '35.53948171356924', '32.63321480708429', '15.18833269175954', 'Banana growing, desirable planting date: August 2021,', 'Growing corn, desirable planting date: November 2021, estimated harvest time: March 2022', 'Growing Avocado Haas, Desirable Planting Date: September 2021, Estimated Harvest Time: November 2024');

-- --------------------------------------------------------

--
-- Table structure for table `chart`
--

CREATE TABLE `chart` (
  `id` int(11) NOT NULL,
  `2015` int(11) NOT NULL,
  `2016` int(11) NOT NULL,
  `2017` int(11) NOT NULL,
  `2018` int(11) NOT NULL,
  `2019` int(11) NOT NULL,
  `2020` int(11) NOT NULL,
  `2021` int(11) NOT NULL,
  `2022` int(11) NOT NULL,
  `2023` int(11) NOT NULL,
  `2024` int(11) NOT NULL,
  `2025` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chart`
--

INSERT INTO `chart` (`id`, `2015`, `2016`, `2017`, `2018`, `2019`, `2020`, `2021`, `2022`, `2023`, `2024`, `2025`) VALUES
(1, 50, 59, 60, 80, 75, 66, 50, 40, 45, 35, 36),
(2, 53, 64, 65, 56, 40, 35, 52, 68, 65, 48, 70),
(3, 62, 59, 78, 58, 65, 55, 45, 54, 66, 53, 72),
(4, 54, 55, 63, 72, 44, 45, 71, 52, 70, 50, 72);

-- --------------------------------------------------------

--
-- Table structure for table `humidity`
--

CREATE TABLE `humidity` (
  `id` int(11) NOT NULL,
  `january` int(11) NOT NULL,
  `february` int(11) NOT NULL,
  `march` int(11) NOT NULL,
  `april` int(11) NOT NULL,
  `may` int(11) NOT NULL,
  `june` int(11) NOT NULL,
  `july` int(11) NOT NULL,
  `august` int(11) NOT NULL,
  `september` int(11) NOT NULL,
  `october` int(11) NOT NULL,
  `november` int(11) NOT NULL,
  `december` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `humidity`
--

INSERT INTO `humidity` (`id`, `january`, `february`, `march`, `april`, `may`, `june`, `july`, `august`, `september`, `october`, `november`, `december`) VALUES
(1, 71, 72, 68, 62, 57, 59, 60, 62, 61, 60, 61, 70),
(2, 71, 72, 68, 62, 57, 59, 60, 62, 61, 60, 61, 70),
(3, 75, 73, 66, 56, 51, 52, 52, 54, 53, 54, 57, 68),
(4, 68, 70, 65, 57, 52, 55, 59, 61, 58, 55, 55, 64);

-- --------------------------------------------------------

--
-- Table structure for table `max_temp`
--

CREATE TABLE `max_temp` (
  `id` int(11) NOT NULL,
  `january` int(11) NOT NULL,
  `february` int(11) NOT NULL,
  `march` int(11) NOT NULL,
  `april` int(11) NOT NULL,
  `may` int(11) NOT NULL,
  `june` int(11) NOT NULL,
  `july` int(11) NOT NULL,
  `august` int(11) NOT NULL,
  `september` int(11) NOT NULL,
  `october` int(11) NOT NULL,
  `november` int(11) NOT NULL,
  `december` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `max_temp`
--

INSERT INTO `max_temp` (`id`, `january`, `february`, `march`, `april`, `may`, `june`, `july`, `august`, `september`, `october`, `november`, `december`) VALUES
(1, 19, 20, 23, 27, 35, 37, 40, 40, 37, 31, 26, 21),
(2, 19, 20, 23, 27, 33, 35, 38, 38, 36, 31, 26, 21),
(3, 18, 19, 23, 28, 34, 38, 40, 40, 36, 32, 26, 20),
(4, 18, 19, 22, 26, 31, 33, 36, 36, 34, 29, 25, 20);

-- --------------------------------------------------------

--
-- Table structure for table `min_temp`
--

CREATE TABLE `min_temp` (
  `id` int(11) NOT NULL,
  `january` int(11) NOT NULL,
  `february` int(11) NOT NULL,
  `march` int(11) NOT NULL,
  `april` int(11) NOT NULL,
  `may` int(11) NOT NULL,
  `june` int(11) NOT NULL,
  `july` int(11) NOT NULL,
  `august` int(11) NOT NULL,
  `september` int(11) NOT NULL,
  `october` int(11) NOT NULL,
  `november` int(11) NOT NULL,
  `december` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `min_temp`
--

INSERT INTO `min_temp` (`id`, `january`, `february`, `march`, `april`, `may`, `june`, `july`, `august`, `september`, `october`, `november`, `december`) VALUES
(1, 8, 8, 9, 12, 17, 20, 24, 24, 22, 18, 13, 10),
(2, 9, 9, 10, 13, 17, 20, 24, 24, 22, 18, 14, 11),
(3, 8, 8, 10, 14, 18, 21, 24, 25, 22, 19, 14, 10),
(4, 8, 8, 9, 12, 15, 18, 22, 22, 20, 16, 13, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chart`
--
ALTER TABLE `chart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `humidity`
--
ALTER TABLE `humidity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `max_temp`
--
ALTER TABLE `max_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `min_temp`
--
ALTER TABLE `min_temp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chart`
--
ALTER TABLE `chart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `humidity`
--
ALTER TABLE `humidity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `max_temp`
--
ALTER TABLE `max_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `min_temp`
--
ALTER TABLE `min_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
