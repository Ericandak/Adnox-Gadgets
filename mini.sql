-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2023 at 03:45 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mini`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_tbl`
--

CREATE TABLE `category_tbl` (
  `Category_id` int(3) NOT NULL,
  `Category_name` varchar(40) NOT NULL,
  `product_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_tbl`
--

INSERT INTO `category_tbl` (`Category_id`, `Category_name`, `product_id`) VALUES
(7, 'phones', 0),
(21, 'Ornaments', 0),
(24, 'Rings', 0),
(38, 'Wallets', 0),
(39, 'Razors', 0),
(40, 'Belts', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE `order_tbl` (
  `Order_id` int(6) NOT NULL,
  `Order_date` date NOT NULL,
  `prduct_id` int(6) NOT NULL,
  `usr_id` int(6) NOT NULL,
  `total_price` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pro_tbl`
--

CREATE TABLE `pro_tbl` (
  `product_id` int(4) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `product_desc` varchar(100) NOT NULL,
  `product_price` int(8) NOT NULL,
  `Product_quantity` int(3) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `Category_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pro_tbl`
--

INSERT INTO `pro_tbl` (`product_id`, `product_name`, `product_desc`, `product_price`, `Product_quantity`, `product_image`, `Category_id`) VALUES
(27, 'Nike ', 'Nike is one of the top brands in the world of shoes', 1200, 32, '49.jpg', 30),
(28, 'Rolex', 'Premium high rated mechanical watch for men', 3000, 20, 'pat-taylor-12V36G17IbQ-unsplash.jpg', 30),
(40, 'AllenSolly Wallet 12', 'Accessorise your ensemble in style with this Brown wallet from Allen Solly. This meticulously handcr', 1000, 20, '865262-10243609.jpg', 38),
(42, 'Braun Razor 34', 'Premium Razors that used in 5 different modes', 2000, 20, 'Braun-Series-9-Pro-efficient-electric-shaver-01-1200x900.jpg', 39),
(43, 'Fossil Wallets', ' 1 Divided Note Compartment, 1 Flap Coin Pocket, 1 ID Window, 2 Slide Pockets, 8 Credit Card Slots I', 900, 20, 'ML3653200_main.jpeg', 38),
(45, 'Tan Leather Belt ', 'Fastrack Tan Leather Belt with Single Prong Buckle for Guys', 699, 20, 'B0437LTN03_1 (1).jpg', 38);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(4) NOT NULL,
  `cart_item` varchar(30) NOT NULL,
  `cart_quantity` int(2) NOT NULL,
  `cart_price` int(7) NOT NULL,
  `cart_desc` varchar(50) NOT NULL,
  `cart_img` varchar(100) NOT NULL,
  `user_id` int(4) NOT NULL,
  `prd_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `cart_item`, `cart_quantity`, `cart_price`, `cart_desc`, `cart_img`, `user_id`, `prd_id`) VALUES
(16, 'Braun Razor 34', 0, 2000, 'Premium Razors that used in 5 different modes', 'Braun-Series-9-Pro-efficient-electric-shaver-01-1200x900.jpg', 23, 42),
(17, 'Nike ', 0, 1200, 'Nike is one of the top brands in the world of shoe', '49.jpg', 23, 27),
(18, 'Braun Razor 34', 5, 2000, 'Premium Razors that used in 5 different modes', 'Braun-Series-9-Pro-efficient-electric-shaver-01-1200x900.jpg', 25, 42),
(19, 'AllenSolly Wallet 12', 1, 1000, 'Accessorise your ensemble in style with this Brown', '865262-10243609.jpg', 25, 40);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seller`
--

CREATE TABLE `tbl_seller` (
  `Seller_id` int(5) NOT NULL,
  `Seller_name` varchar(30) NOT NULL,
  `Seller_email` varchar(30) NOT NULL,
  `Seller_password` varchar(30) NOT NULL,
  `Seller_phone` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_seller`
--

INSERT INTO `tbl_seller` (`Seller_id`, `Seller_name`, `Seller_email`, `Seller_password`, `Seller_phone`) VALUES
(1, 'safwan', 'Safwan@gmail.com', 'Safwan32', '9984342312'),
(2, 'delna', 'delna@781.com', 'Delnat4', '9089564390');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(15) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_password` varchar(30) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_phone` varchar(15) NOT NULL,
  `usr_img` varchar(100) NOT NULL,
  `user_type` int(1) NOT NULL,
  `user_membership` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_name`, `user_password`, `user_address`, `user_email`, `user_phone`, `usr_img`, `user_type`, `user_membership`) VALUES
(7, 'erick_james', 'Erickw2', 'ojjfsoijfosjdfoisj', 'erickjames@hgham.com', '9089564390', '', 0, 0),
(13, 'erick_james', 'Erick21', 'kkkkkkk', 'erickjames@gham.com', '8592978534', '', 0, 0),
(21, 'Admin1', 'Admin123', 'INSITE,HOUSE(House)', 'Admin@123.com', '9012234532', '', 1, 0),
(23, 'ajulkjose', 'Gokul@123', 'thevalathil house,pulpally(po),wayanad', 'mail.ajulkjose@gmail.com', '9945932101', 'DSC_1455.JPG', 0, 0),
(24, 'erickjames', 'Amal@34', 'Kattappana,idukki,kerala,673578', 'amalantoney2025@mca.ajce.in', '9912939493', '_DSC1436.JPG', 3, 0),
(25, 'Ajulkjose', 'Ajul@34', 'Kallarackal (h),Adakkakundu (p.o),kaalikavu,676525', 'Ajul2025@mca.ajce.in', '8078234246', 'DSC_1455.JPG', 0, 0),
(26, 'Erickjames', 'Paulin@34', 'Amaljyothi college of engineering mca department,koovapally,kottayam', 'paulinsabu@gmail.com', '7534902312', '49.jpg', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_tbl`
--
ALTER TABLE `category_tbl`
  ADD PRIMARY KEY (`Category_id`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`Order_id`);

--
-- Indexes for table `pro_tbl`
--
ALTER TABLE `pro_tbl`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_seller`
--
ALTER TABLE `tbl_seller`
  ADD PRIMARY KEY (`Seller_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_tbl`
--
ALTER TABLE `category_tbl`
  MODIFY `Category_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `Order_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pro_tbl`
--
ALTER TABLE `pro_tbl`
  MODIFY `product_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_seller`
--
ALTER TABLE `tbl_seller`
  MODIFY `Seller_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
