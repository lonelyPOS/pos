-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 13, 2018 at 08:14 PM
-- Server version: 10.0.32-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lonely`
--

-- --------------------------------------------------------

--
-- Table structure for table `Bill`
--

CREATE TABLE `Bill` (
  `ID` int(11) NOT NULL,
  `MEMBER_ID` int(11) NOT NULL,
  `EMPLOYEE_ID` int(11) NOT NULL,
  `DATE_TIME` datetime NOT NULL,
  `TOTAL_PRICE` double NOT NULL,
  `PAY_AMOUNT` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Bill`
--

INSERT INTO `Bill` (`ID`, `MEMBER_ID`, `EMPLOYEE_ID`, `DATE_TIME`, `TOTAL_PRICE`, `PAY_AMOUNT`) VALUES
(11, 19, 1, '2018-06-12 03:22:58', 9000, 10000),
(12, 19, 1, '2018-06-12 03:30:08', 6000, 6000),
(13, 20, 1, '2018-06-12 11:03:31', 450, 3),
(14, 1, 1, '2018-06-12 12:01:13', 450, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `BillItem`
--

CREATE TABLE `BillItem` (
  `ID` int(11) NOT NULL,
  `BILL_ID` int(11) NOT NULL,
  `PRODUCT_LINE_ID` int(11) NOT NULL,
  `QUANTITY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `BillItem`
--

INSERT INTO `BillItem` (`ID`, `BILL_ID`, `PRODUCT_LINE_ID`, `QUANTITY`) VALUES
(15, 11, 1, 20),
(16, 12, 29, 1),
(17, 12, 28, 1),
(18, 12, 30, 1),
(19, 13, 1, 1),
(20, 14, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Brand`
--

CREATE TABLE `Brand` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Brand`
--

INSERT INTO `Brand` (`ID`, `NAME`) VALUES
(1, 'LONELY'),
(2, 'TunLaLa'),
(10, 'bankeiei3'),
(11, 'asd'),
(12, 'banknaja');

-- --------------------------------------------------------

--
-- Table structure for table `COLOR`
--

CREATE TABLE `COLOR` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `HEX_CODE` varchar(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `COLOR`
--

INSERT INTO `COLOR` (`ID`, `NAME`, `HEX_CODE`) VALUES
(1, 'fixed', 'xxxxxx'),
(2, 'black', '000000'),
(3, 'green', '008000'),
(4, 'blue', '0000ff'),
(5, 'red', 'ff0000'),
(6, 'yellow', 'ffff00'),
(7, 'white', 'ffffff'),
(9, 'df', 'dddd'),
(10, 'wakanda', '696969');

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE `Employee` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `PASSWORD` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `TYPE` int(11) NOT NULL,
  `EMAIL` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `FNAME` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `LNAME` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `GENDER` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `CITIZEN_ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `TEL` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Employee`
--

INSERT INTO `Employee` (`ID`, `USERNAME`, `PASSWORD`, `TYPE`, `EMAIL`, `FNAME`, `LNAME`, `GENDER`, `CITIZEN_ID`, `TEL`) VALUES
(1, 'tunlala', '12345678', 0, 'potsathon20@gmail.com', 'Potsathon', 'Tree..', 'M', '1234567890123', '0801234567');

-- --------------------------------------------------------

--
-- Table structure for table `Member`
--

CREATE TABLE `Member` (
  `ID` int(11) NOT NULL,
  `B_CODE` varchar(48) COLLATE utf8_unicode_ci NOT NULL,
  `FNAME` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `LNAME` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `GENDER` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `B_DATE` date NOT NULL,
  `ADDRESS` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TEL` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Member`
--

INSERT INTO `Member` (`ID`, `B_CODE`, `FNAME`, `LNAME`, `EMAIL`, `GENDER`, `B_DATE`, `ADDRESS`, `TEL`) VALUES
(1, '00001', 'Guest', 'User', 'guest_lonely@gmail.com', 'M', '2011-01-01', '@lonely', '0801234567'),
(16, 'F43OgR9IHo0xCNtQalAJ', 'Pakorn', 'Chiraksa', 'pakondom@gmail.com', 'M', '1997-12-04', 'Pathumthani, klongluang', '0822808826'),
(17, '0QcYUtym3ZRpC8iBWqFz', 'ccc', 'c', 'cc', 'M', '0000-00-00', 'sd', 'sfa'),
(18, 'Dj6FtSs7qeEOX95RBAbN', 'Pattaradach', 'Thipmart', 'pattaradach.thi@sci.tu.ac.th', 'M', '0000-00-00', 'TU-Dome', '0625644253'),
(19, 'vFOPT9CeguHUmdn2oMNZ', 'kimtun', 'handsomeman', 'hansomeman@gmail.com', 'M', '1998-03-25', 'haeven', 'maime'),
(20, 'rVlWgIm2KP1tQUMAnTja', 'fdss', 'dsfs', 'sdssdf', 'M', '2018-06-06', 'sdsdvs', 'sdfsdfsd'),
(21, 'XGQ4NUq8EHV5iwfCO3hF', 'JR', 'Fooj', 'pong@gmail.com', 'M', '2018-06-12', 'tu tut ut', '0801234567');

-- --------------------------------------------------------

--
-- Table structure for table `OnlineMember`
--

CREATE TABLE `OnlineMember` (
  `om_index` int(4) NOT NULL,
  `om_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `om_pwd` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `om_type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `OnlineMember`
--

INSERT INTO `OnlineMember` (`om_index`, `om_id`, `om_pwd`, `om_type`) VALUES
(1, 'test1', '12345', 0);

-- --------------------------------------------------------

--
-- Table structure for table `OnlineMemberInfo`
--

CREATE TABLE `OnlineMemberInfo` (
  `om_index` int(4) NOT NULL,
  `om_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `om_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `om_ads` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `om_mail` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `om_phone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `OnlineMemberInfo`
--

INSERT INTO `OnlineMemberInfo` (`om_index`, `om_id`, `om_name`, `om_ads`, `om_mail`, `om_phone`) VALUES
(1, 'test1', 'ttetetwtv  wrw rfwr', '55/182 Muang-ake', 'test@gmail.com', 85555555);

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `ID` int(11) NOT NULL,
  `BRAND_ID` int(11) NOT NULL,
  `NAME` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `DESCRIPTION` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`ID`, `BRAND_ID`, `NAME`, `DESCRIPTION`) VALUES
(1, 1, 'LONELY IMPERFECT', 'asffs'),
(2, 2, 'เสื้อยืด', 'อิอิอิอิ'),
(3, 2, 'เสื้อกันหนาว', 'อิอิอิอิอิ'),
(4, 2, 'เสื้อแขนยาว', 'แอแอ'),
(5, 2, 'เสื้อ Liverpool', 'อ่อน'),
(35, 2, 'Avalon', 'test'),
(36, 12, 'pataradach', 'eiei'),
(37, 2, 'nam', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `ProductLine`
--

CREATE TABLE `ProductLine` (
  `ID` int(11) NOT NULL,
  `BARCODE_ID` varchar(48) COLLATE utf8_unicode_ci NOT NULL,
  `PRODUCT_ID` int(11) NOT NULL,
  `COLOR_ID` int(11) NOT NULL,
  `SIZE_ID` int(11) NOT NULL,
  `PRICE` double NOT NULL,
  `QUANTITY` int(11) NOT NULL,
  `PRO_images` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ProductLine`
--

INSERT INTO `ProductLine` (`ID`, `BARCODE_ID`, `PRODUCT_ID`, `COLOR_ID`, `SIZE_ID`, `PRICE`, `QUANTITY`, `PRO_images`) VALUES
(1, '1506FT-041-WH', 1, 1, 1, 450, 21, ''),
(28, '1206FT-041-WH', 5, 4, 4, 500, 10, 'night_sky_stars_starry_sky_118036_1920x1080.jpg'),
(29, '1506FT-041-WF', 1, 1, 1, 500, 60, ''),
(30, '1150FT-041-WH', 35, 5, 6, 5000, 20, '2.png'),
(31, '0925644253', 36, 10, 7, 5000, 500, 'images.jpg'),
(32, 'barrr', 37, 5, 2, 400, 30, 'Image_4603214.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `SIZE`
--

CREATE TABLE `SIZE` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Small,Large Bahh',
  `CODE` varchar(5) COLLATE utf8_unicode_ci NOT NULL COMMENT 'S,M,XL Bahhh'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `SIZE`
--

INSERT INTO `SIZE` (`ID`, `NAME`, `CODE`) VALUES
(1, 'Extra Small', 'XS'),
(2, 'Small', 'S'),
(3, 'Medium', 'M'),
(4, 'Large', 'L'),
(5, 'Extra Large', 'XL'),
(6, 'largeeeee', 'XXXL'),
(7, 'mini', 'mnmn');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Bill`
--
ALTER TABLE `Bill`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `BillItem`
--
ALTER TABLE `BillItem`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Brand`
--
ALTER TABLE `Brand`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `COLOR`
--
ALTER TABLE `COLOR`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Employee`
--
ALTER TABLE `Employee`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Member`
--
ALTER TABLE `Member`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `OnlineMember`
--
ALTER TABLE `OnlineMember`
  ADD PRIMARY KEY (`om_index`),
  ADD UNIQUE KEY `c_id` (`om_id`);

--
-- Indexes for table `OnlineMemberInfo`
--
ALTER TABLE `OnlineMemberInfo`
  ADD PRIMARY KEY (`om_index`,`om_id`);

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ProductLine`
--
ALTER TABLE `ProductLine`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `SIZE`
--
ALTER TABLE `SIZE`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Bill`
--
ALTER TABLE `Bill`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `BillItem`
--
ALTER TABLE `BillItem`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `Brand`
--
ALTER TABLE `Brand`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `COLOR`
--
ALTER TABLE `COLOR`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `Employee`
--
ALTER TABLE `Employee`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Member`
--
ALTER TABLE `Member`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `OnlineMember`
--
ALTER TABLE `OnlineMember`
  MODIFY `om_index` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `OnlineMemberInfo`
--
ALTER TABLE `OnlineMemberInfo`
  MODIFY `om_index` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Product`
--
ALTER TABLE `Product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `ProductLine`
--
ALTER TABLE `ProductLine`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `SIZE`
--
ALTER TABLE `SIZE`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
