-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2018 at 10:43 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `market`
--

-- --------------------------------------------------------

--
-- Table structure for table `aitrading`
--

UPDATE TABLE `aitrading` (
  `id` int(11) NOT NULL,
  `last_AI` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aitrading`
--

INSERT INTO `aitrading` (`id`, `last_AI`) VALUES
(1, '2018-06-05 14:30:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(255) NOT NULL,
  `symbol` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(18,10) NOT NULL,
  `company_value` decimal(18,10) NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `symbol`, `name`, `price`, `company_value`, `last_updated`) VALUES
(1, 'NRA', 'National Redstone Association', '52.6286770000', '1632654.7501700000', '2018-06-05 14:30:00.000000'),
(2, 'MCO', 'Mine Co.', '1.8329830000', '169040.5788573700', '2018-06-05 14:30:00.000000'),
(3, 'LYG', 'Lumber LLC.', '10.1354140000', '3190490.4619914000', '2018-06-05 14:30:00.000000'),
(4, 'KST', 'Keepat 17 Inc.', '17.0000100000', '17171730.2489870000', '2018-06-05 14:30:00.000000'),
(5, 'TTC', 'Techtris Cooperative', '99.9800630000', '10000033.1070630000', '2018-06-05 14:30:00.000000'),
(6, 'HYD', 'Honeydew Inc.', '76.1200130000', '72358406.9377180000', '2018-06-05 14:30:00.000000'),
(7, 'FOX', 'Foxcatcher', '10.0233170000', '150390.2915174800', '2018-06-05 14:30:00.000000'),
(8, 'AEX', 'Angel Enterprises', '0.1723220000', '24774.9152909600', '2018-06-05 14:30:00.000000'),
(9, 'SFS', 'Superhero Fatigue Solutions', '0.3173130000', '22301.3031430490', '2018-06-05 14:30:00.000000'),
(10, 'CHC', 'Card House Company', '20.1999840000', '5432061.9561315000', '2018-06-05 14:30:00.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aitrading`
--
ALTER TABLE `aitrading`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aitrading`
--
ALTER TABLE `aitrading`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
