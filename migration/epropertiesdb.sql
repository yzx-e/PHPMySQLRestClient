-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2020 at 07:20 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7


--
-- Database: `epropertiesdb`
--
CREATE DATABASE IF NOT EXISTS `epropertiesdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `epropertiesdb`;
-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `street_address` varchar(100) NOT NULL,
  `suburb` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `property_type` varchar(50) NOT NULL,
  `land_area` decimal(10,0) NOT NULL,
  `selling_price` decimal(10,0) NOT NULL,
  `filename` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `street_address`, `suburb`, `state`, `property_type`, `land_area`, `selling_price`, `filename`) VALUES
(1, '1 league of Legends street', 'Abottsford', 'Victoria', 'house', '250', '550000', 'property1.jpg'),
(2, '2 Counter Strike GO Street', 'Brunswick', 'Victoria', 'unit', '400', '660000', 'property25.jpg'),
(3, '3 World of Warcraft street', 'Craigieburn', 'Victoria', 'house', '600', '440000', 'property6.jpg'),
(4, '4 Dota Court', 'Dandenong', 'Victoria', 'house', '600', '570000', 'property11.jpg'),
(5, '5 Halo Crescent', 'Frankston', 'Victoria', 'unit', '550', '380000', 'property21.jpg'),
(6, '6 Diablo court', 'Frankston', 'Victoria', 'house', '770', '780000', 'property5.jpg'),
(7, '7 Call of Duty avenue', 'Greenvale', 'Victoria', 'house', '600', '670000', 'property16.jpg'),
(8, '8 World in tanks road', 'Hoppers Crossing', 'Victoria', 'house', '600', '480000', 'property8.jpg'),
(9, '9 Grand Theft Auto street', 'Ivanhoe', 'Victoria', 'unit', '250', '550000', 'property12.jpg'),
(10, '10 Team Fortress street', 'Greenvale', 'Victoria', 'house', '600', '650000', 'property10.jpg'),
(11, '11 Battlefield place', 'Kurunjang', 'Victoria', 'Town House', '500', '350000', 'property3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;


