-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2021 at 02:28 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_shoping`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Cat_ID` varchar(10) NOT NULL,
  `Cat_Name` varchar(30) NOT NULL,
  `Cat_Des` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Cat_ID`, `Cat_Name`, `Cat_Des`) VALUES
('C001', 'Bun', 'Bun Product'),
('C002', 'Drink', 'Drink Product'),
('C003', 'Whole Cake', 'Whole Cake product');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Username` varchar(20) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `CustName` varchar(30) NOT NULL,
  `gender` int(11) NOT NULL,
  `Address` varchar(1000) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `CusDate` int(11) NOT NULL,
  `CusMonth` int(11) NOT NULL,
  `CusYear` int(11) NOT NULL,
  `SSN` varchar(10) DEFAULT NULL,
  `ActiveCode` varchar(100) NOT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Username`, `Password`, `CustName`, `gender`, `Address`, `telephone`, `email`, `CusDate`, `CusMonth`, `CusYear`, `SSN`, `ActiveCode`, `state`) VALUES
('admin', 'e10adc3949ba59abbe56e057f20f883e', 'le kien', 0, 'sghxbhxbx, jxjsx q', '2025550159', 'lekien@gmail.com', 10, 9, 1983, '', '', 1),
('duongngao', 'e10adc3949ba59abbe56e057f20f883e', 'duong ngao', 0, 'hgvybhbjhbj', '56777558', 'duonbgham@gmail.com', 17, 9, 1985, '', '', 0),
('Finn', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyen Hung Dung', 0, 'Can Tho', '0903100550', 'nhdung.CPL@gmail.com', 31, 8, 1980, '', '', 0),
('nhdung', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyen Hung Dung', 0, 'Can Thow', '0903100550', 'nhdung@gmail.com', 31, 8, 1980, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` varchar(6) NOT NULL,
  `OrderDate` datetime NOT NULL,
  `DeliveryDate` datetime NOT NULL,
  `Delivery_loca` varchar(200) NOT NULL,
  `Payment` int(11) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_ID` varchar(10) NOT NULL,
  `Product_Name` varchar(30) NOT NULL,
  `Price` varchar(20) NOT NULL,
  `oldPrice` decimal(12,2) NOT NULL,
  `SmallDesc` varchar(1000) NOT NULL,
  `DetailDesc` text NOT NULL,
  `ProDate` datetime NOT NULL,
  `Pro_qty` int(11) NOT NULL,
  `Pro_image` varchar(200) NOT NULL,
  `Cat_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_ID`, `Product_Name`, `Price`, `oldPrice`, `SmallDesc`, `DetailDesc`, `ProDate`, `Pro_qty`, `Pro_image`, `Cat_ID`) VALUES
('P001', 'Chocolate Donut', '$52.00', '0.00', 'Bun Cake', 'Bun Cake', '2021-05-06 09:18:11', 12, '5.png', 'C001'),
('P002', 'LYCHEE TEA', '$60.00', '0.00', 'Drink', '', '2021-05-06 12:25:18', 23, '7.jpg', 'C002'),
('P003', 'SO YAMMY', '$76.00', '0.00', 'Bread', 'Bread filled with meat and potatoes', '2021-05-07 08:49:16', 17, 'I_M_So-Yammy-300x300.jpg', 'C001'),
('P004', 'MOCHI CHEESE', '$54.00', '0.00', 'Bread', 'Japanese purple potato flour bread and cheese, mochi', '2021-05-07 08:51:42', 15, 'I_M_Mochi-Cheese-300x300.jpg', 'C001'),
('P005', 'STRAWBERRY MOJITO', '$45.00', '0.00', 'Drink', 'Drink Product', '2021-05-07 08:55:49', 32, '71-300x300.jpg', 'C002'),
('P006', 'STRAWBERRY TEA', '$52.00', '0.00', 'Drink', 'Drink Product', '2021-05-07 08:57:26', 23, 'trà-dâu-1-300x300.jpg', 'C002'),
('P007', 'PEACH PERFECT', '$200.00', '0.00', 'Whole Cake', 'Whole Cake', '2021-05-07 08:59:24', 24, 'V_Peach-Perfect-300x300.jpg', 'C003'),
('P008', 'YAMMY MUMMY', '$250.00', '0.00', 'Whole Cake', 'Whole Cake', '2021-05-07 09:00:28', 34, 'V_Yammy-Mummy-300x300.jpg', 'C003'),
('P009', 'RED VELVET', '$400.00', '0.00', 'Whole Cake', 'Whole Cake', '2021-05-07 09:03:10', 25, 'V_Red-Velvet-300x300.jpg', 'C003');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Cat_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_ID`),
  ADD KEY `Cat_ID` (`Cat_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`username`) REFERENCES `customer` (`Username`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Cat_ID`) REFERENCES `category` (`Cat_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
