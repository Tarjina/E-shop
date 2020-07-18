-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2020 at 08:19 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `description` text NOT NULL,
  `price` float(10,3) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `productType` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `productName`, `categoryId`, `brandId`, `description`, `price`, `picture`, `productType`) VALUES
(2, 'K43e', 8, 2, '<p>BrandIdbrandIdbrandId. BrandIdbrandId brandIdbrandIdbrand.IdbrandIdbr andIdbrandIdbrand.Idbrand IdbrandIdbrand IdbrandIdbrandIdbrandIdbrand.IdbrandIdbrandIdbrandId.BrandIdbrandIdbrandId</p>', 2093093.250, '../admin/upload/7533c2bf5a.jpg', 1),
(4, '67U', 8, 2, 'You want X lines of text. Anything after that, gracefully cut off. That’s “line clamping” and it is a perfectly legit desire. When you can count on text being a certain number of lines, you can create stronger and more reliable grids from the elements that contain that text, as well as achieve some symmetric aesthetic harmony. ', 67890.797, '../admin/upload/56d3a9a760.jpg', 2),
(5, 'U90', 3, 2, 'On the other hand… it’s weird. why does it need to be a flexbox thing (the old version at that)? It doesn’t work without that. And it’s extremely fragile. Let’s say you want the module (or the paragraph) to have some padding. You can’t because the padding will expose extra lines. That’s what we get with half-baked non-standardized properties.\r\nOn the other hand… it’s weird. why does it need to be a flexbox thing (the old version at that)? It doesn’t work without that.', 304.800, '../admin/upload/6c8f240791.jpg', 2),
(6, '78ui', 3, 1, 'On the other hand… it’s weird. why does it need to be a flexbox thing (the old version at that)? It doesn’t work without that. And it’s extremely fragile. Let’s say you want the module (or the paragraph) to have some padding. You can’t because the padding will expose extra lines. That’s what we get with half-baked non-standardized properties.On the other hand… it’s weird. why does it need to be a flexbox thing (the old version at that)? It doesn’t work without that. And it’s extremely fragile. Let’s say you want the module (or the paragraph) to have some padding. You can’t because the padding will expose extra lines. That’s what we get with half-baked non-standardized properties.On the other hand… it’s weird. why does it need to be a flexbox thing (the old version at that)? It doesn’t work without that. And it’s extremely fragile. Let’s say you want the module (or the paragraph) to have some padding. You can’t because the padding will expose extra lines. That’s what we get with half-baked non-standardized properties.', 6799.000, '../admin/upload/7f98f1eeee.jpg', 1),
(7, 'kuoiih', 1, 2, 'On the other hand… it’s weird. why does it need to be a flexbox thing (the old version at that)? It doesn’t work without that. And it’s extremely fragile. Let’s say you want the module (or the paragraph) to have some padding. You can’t because the padding will expose extra lines. That’s what we get with half-baked non-standardized properties.\r\nOn the other hand… it’s weird. why does it need to be a flexbox thing (the old version at that)? It doesn’t work without that. And it’s extremely fragile. Let’s say you want the module (or the paragraph) to have some padding. You can’t because the padding will expose extra lines. That’s what we get with half-baked non-standardized properties.', 78986.000, '../admin/upload/b8983d3386.jpg', 1),
(8, 'Loren Ipsam', 8, 3, '<p>Side-by-side visual comparison. For Windows and macOS. Free trial. 30-Day Free Trial. Features: Compare <strong>Text</strong> From Common Office File Formats, Image And Binary File Comparison, Three-Way Comparison And Automatic Merging, Portable Reports.</p>\r\n<p>Side-by-side visual comparison. For Windows and macOS. Free trial. 30-Day Free Trial. Features: Compare <strong>Text</strong> From Common Office File Formats, Image And Binary File Comparison, Three-Way Comparison And Automatic Merging, Portable Reports.</p>\r\n<p>Side-by-side visual comparison. For Windows and macOS. Free trial. 30-Day Free Trial. Features: Compare <strong>Text</strong> From Common Office File Formats, Image And Binary File Comparison, Three-Way Comparison And Automatic Merging, Portable Reports.</p>', 5789.000, '../admin/upload/709f800c77.jpg', 2),
(9, 'u800', 9, 3, '<p>Side-by-side visual comparison. For Windows and macOS. Free trial. 30-Day Free Trial. Features: Compare <strong>Text</strong> From Common Office File Formats, Image And Binary File Comparison, Three-Way Comparison And Automatic Merging, Portable Reports.</p>\r\n<p>Side-by-side visual comparison. For Windows and macOS. Free trial. 30-Day Free Trial. Features: Compare <strong>Text</strong> From Common Office File Formats, Image And Binary File Comparison, Three-Way Comparison And Automatic Merging, Portable Reports.</p>\r\n<p>Side-by-side visual comparison. For Windows and macOS. Free trial. 30-Day Free Trial. Features: Compare <strong>Text</strong> From Common Office File Formats, Image And Binary File Comparison, Three-Way Comparison And Automatic Merging, Portable Reports.</p>', 809.000, '../admin/upload/0c985c0346.png', 1),
(10, '77u', 4, 1, '<p>Side-by-side visual comparison. For Windows and macOS. Free trial. 30-Day Free Trial. Features: Compare <strong>Text</strong> From Common Office File Formats, Image And Binary File Comparison, Three-Way Comparison And Automatic Merging, Portable Reports.</p>\r\n<p>Side-by-side visual comparison. For Windows and macOS. Free trial. 30-Day Free Trial. Features: Compare <strong>Text</strong> From Common Office File Formats, Image And Binary File Comparison, Three-Way Comparison And Automatic Merging, Portable Reports.</p>\r\n<p>Side-by-side visual comparison. For Windows and macOS. Free trial. 30-Day Free Trial. Features: Compare <strong>Text</strong> From Common Office File Formats, Image And Binary File Comparison, Three-Way Comparison And Automatic Merging, Portable Reports.</p>', 987.000, '../admin/upload/3b78e6e5cc.jpg', 1),
(11, 'Loren Ipsam-Camera', 1, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>', 0.000, '../admin/upload/9e2eeea31b.jpg', 1),
(12, 'Loren Ipsam-Camera', 1, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>', 0.000, '../admin/upload/9a3df0737e.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`, `level`) VALUES
(1, 'Tarjina Jahan', 'Sonia', 'sonia@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(1, 'Asus'),
(2, 'Samsung'),
(3, 'Lenevo'),
(4, 'Canon'),
(5, 'Hp'),
(7, 'Apple');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `sId`, `productId`, `productName`, `price`, `picture`, `quantity`) VALUES
(1, 'hgnk0iet6vr1fg7vf2lju4mo30', 6, '78ui', 6799.00, '../admin/upload/7f98f1eeee.jpg', 1),
(2, 'ommmgt020rui759n39d2td5g13', 6, '78ui', 6799.00, '../admin/upload/7f98f1eeee.jpg', 0),
(3, '9jrlgfp8sumsobdf1eg4di64g5', 8, 'Loren Ipsam', 5789.00, '../admin/upload/709f800c77.jpg', 0),
(4, '9jrlgfp8sumsobdf1eg4di64g5', 6, '78ui', 6799.00, '../admin/upload/7f98f1eeee.jpg', 0),
(5, 'phj83nne4f87rrmuna1hd3kfrr', 6, '78ui', 6799.00, '../admin/upload/7f98f1eeee.jpg', 1),
(6, 'phj83nne4f87rrmuna1hd3kfrr', 2, 'K43e', 2093093.25, '../admin/upload/7533c2bf5a.jpg', 1),
(7, 'u7gfpfuchflhejqnidm7o52g19', 6, '78ui', 6799.00, '../admin/upload/7f98f1eeee.jpg', 1),
(8, '0014i72ivsubfeb2dif1bkvtr2', 6, '78ui', 6799.00, '../admin/upload/7f98f1eeee.jpg', 1),
(9, '0014i72ivsubfeb2dif1bkvtr2', 8, 'Loren Ipsam', 5789.00, '../admin/upload/709f800c77.jpg', 1),
(10, '4omrrimvvs6cjj2vr9403jhk6m', 6, '78ui', 6799.00, '../admin/upload/7f98f1eeee.jpg', 1),
(11, '4omrrimvvs6cjj2vr9403jhk6m', 2, 'K43e', 2093093.25, '../admin/upload/7533c2bf5a.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(1, 'Others'),
(2, 'Laptop'),
(3, 'Accessories'),
(4, 'Mobile'),
(5, 'Footware'),
(6, 'Jewellery'),
(7, 'Sports and Fitness'),
(8, 'Home decor &amp; Kitchen'),
(9, 'Beauty &amp; HealthCare');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_compare`
--

CREATE TABLE `tbl_compare` (
  `compareId` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customerId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customerId`, `name`, `address`, `city`, `country`, `zip_code`, `password`, `email`, `phone`) VALUES
(1, 'customer one', 'mistripara,lal mashjid', 'ctg', 'bangladesh', '4000', '123456', 'one@gmail.com', 12345677),
(2, 'customer two', 'ctg', 'ctg', 'bangladesh', '4000', '$2y$10$5d0vNcl0LxdL5N982pvKleHJMo.GC6r3Nz7v.xgvyPKDJzUUDZQ4y', 'two@gmail.com', 12345678),
(3, 'customer two', 'ctg', 'ctg', 'bangladesh', '4100', 'customertwo', 'custwo@gmail.com', 1234567);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `orderId` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(40) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`orderId`, `cmrId`, `productId`, `productName`, `price`, `quantity`, `picture`, `status`, `date`) VALUES
(33, 1, 2, 'K43e', 2093093.25, 1, '../admin/upload/7533c2bf5a.jpg', 1, '2020-06-28 21:12:49'),
(34, 1, 6, '78ui', 20397.00, 3, '../admin/upload/7f98f1eeee.jpg', 0, '2020-07-18 16:24:45'),
(35, 1, 2, 'K43e', 2093093.25, 1, '../admin/upload/7533c2bf5a.jpg', 0, '2020-07-18 16:52:30'),
(36, 1, 8, 'Loren Ipsam', 5789.00, 1, '../admin/upload/709f800c77.jpg', 0, '2020-07-18 16:59:40'),
(37, 1, 6, '78ui', 13598.00, 2, '../admin/upload/7f98f1eeee.jpg', 0, '2020-07-18 17:10:07'),
(38, 1, 6, '78ui', 13598.00, 2, '../admin/upload/7f98f1eeee.jpg', 0, '2020-07-18 17:12:27'),
(39, 1, 2, 'K43e', 2093093.25, 1, '../admin/upload/7533c2bf5a.jpg', 0, '2020-07-18 17:17:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `wishId` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`wishId`, `cmrId`, `productId`, `productName`, `price`, `picture`) VALUES
(1, 1, 6, '78ui', 6799.00, '../admin/upload/7f98f1eeee.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  ADD PRIMARY KEY (`compareId`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`wishId`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  MODIFY `compareId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `wishId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
