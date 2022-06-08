-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2022 at 11:52 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clothes_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID` int(10) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Code` varchar(100) NOT NULL,
  `Color` varchar(100) NOT NULL,
  `Image_1` mediumtext NOT NULL,
  `Image_2` mediumtext NOT NULL,
  `OPrice` varchar(100) NOT NULL,
  `PPrice` varchar(100) NOT NULL,
  `Sale` varchar(100) NOT NULL,
  `SoldOut` varchar(10) NOT NULL,
  `MOut` varchar(10) NOT NULL,
  `LOut` varchar(10) NOT NULL,
  `XLOut` varchar(10) NOT NULL,
  `Decription` longtext NOT NULL,
  `Type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `Name`, `Code`, `Color`, `Image_1`, `Image_2`, `OPrice`, `PPrice`, `Sale`, `SoldOut`, `MOut`, `LOut`, `XLOut`, `Decription`, `Type`) VALUES
(10, 'CACOPHONY TEE', 'BKU: CO2000', 'Black', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-01-1.png', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-01-2.png', '180', '69', '38.333333333333', '', '', '', '', 'Đẹp mà!', 'Áo'),
(11, 'SPORTY TEE', 'BKU: CO2001', 'Dark Green', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-02-1.png', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-02-2.png', '180', '79', '43.888888888889', '1', '', '', '', 'Nhìn mát mà!', 'Áo'),
(12, 'MINIMALISM TEE', 'BKU: CO2002', 'Black', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-03-1.png', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-03-2.png', '180', '69', '38.333333333333', '', '', '', '', 'Đơn giản ha!', 'Áo'),
(13, 'PIXEL ICON TEE', 'BKU: CO2003', 'Black', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-04-1.png', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-04-2.png', '180', '99', '55', '', '', '', '', 'Nhìn trất\'sss nha!', 'Áo'),
(14, 'THE RACE TEE', 'BKU: CO2004', 'Black', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-05-1.png', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-05-2.png', '180', '99', '55', '', '', '', '', 'Nhìn năng động thế!', 'Áo'),
(15, 'CHALLENGE OF LOVE TEE', 'BKU: CO2005', 'Black', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-06-1.png', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-06-2.png', '180', '99', '55', '', '', '', '', 'Thật dễ thương phải không nào!', 'Áo'),
(16, 'WORLDWIDE LOGO TEE', 'BKU: CO2006', 'Black', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-07-1.png', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-07-2.png', '180', '99', '55', '', '', '', '', 'Đẹp mà đúng không!', 'Áo'),
(17, 'TAG ME TEE', 'BKU: CO2007', 'White', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-08-1.png', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-08-2.png', '180', '', '', '', '', '', '', '', 'Áo'),
(18, 'TAG ME TEE', 'BKU: CO2008', 'Coban Blue', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-09-1.png', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-09-2.png', '180', '69', '38.333333333333', '', '', '', '', '', 'Áo'),
(19, 'SAIGON TOUR TEE', 'BKU: CO2009', 'Black', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-10-1.png', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-10-2.png', '180', '79', '43.888888888889', '', '', '', '', 'Du lịch thôi!', 'Áo'),
(20, 'SAIGON TOUR TEE', 'BKU: CO2010', 'White', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-11-1.png', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-11-2.png', '180', '79', '43.888888888889', '', '', '', '', 'Du lịch thôi!', 'Áo'),
(21, 'HM STUDIO IN DOWNTOWN SHIRT', 'BKU: CO2011', 'Matcha', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-12-1.png', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-12-2.png', '250', '99', '39.6', '', '', '', '', '', 'Áo'),
(22, 'HM STUDIO IN DOWNTOWN SHIRT', 'BKU: CO2012', 'White', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-23-1.png', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-23-2.png', '250', '99', '39.6', '', '', '', '', '', 'Áo'),
(23, 'BARCODE TEE', 'BKU: CO2013', 'Black', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-13-1.png', '', '180', '69', '38.333333333333', '', '', '', '', '', 'Áo'),
(24, 'BARCODE TEE', 'BKU: CO2014', 'White', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-14-1.png', '', '180', '69', '38.333333333333', '', '', '', '', '', 'Áo'),
(25, 'BARCODE TEE', 'BKU: CO2015', 'Xanh', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-15-1.png', '', '180', '69', '38.333333333333', '', '', '', '', '', 'Áo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
