-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2018 at 03:07 PM
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
-- Database: `instashop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `id_user`, `name`, `email`) VALUES
(1, 2, 'Super Admin', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id_document` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `document_type` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `date_upload` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`id_document`, `id_user`, `document_type`, `document`, `date_upload`) VALUES
(4, 5, 'SSM Document', '4_250718042651.pdf', '2018-07-25'),
(7, 4, 'SSM Document', '4_250718042651.pdf', '2018-07-25'),
(16, 4, 'Company Profile', '16_140818003902.pdf', '2018-08-14'),
(17, 3, 'SSM Document', '17_220918165520.PDF', '2018-09-22'),
(18, 3, 'Company Profile', '18_220918174456.pdf', '2018-09-22');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL,
  `id_instashop` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `item` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `date_submitted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `id_instashop`, `id_user`, `feedback`, `item`, `rating`, `date_submitted`) VALUES
(2, 4, 1, 'Wow! The item arrived as described. Fast respond from seller.', 'Microwave', 5, '2018-08-28'),
(3, 4, 1, 'Fast delivery and friendly seller', 'Oven', 5, '2018-08-28'),
(4, 4, 1, 'Good respond', 'Polo T-shirt', 4, '2018-09-06');

-- --------------------------------------------------------

--
-- Table structure for table `instashop`
--

CREATE TABLE `instashop` (
  `id_instashop` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `instagram` varchar(25) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `email` varchar(35) NOT NULL,
  `ssm_no` varchar(16) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `year_involved` varchar(15) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `phone_number` varchar(15) NOT NULL,
  `service_provided` varchar(35) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `date_submit` date DEFAULT NULL,
  `date_approved` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instashop`
--

INSERT INTO `instashop` (`id_instashop`, `id_user`, `instagram`, `facebook`, `website`, `email`, `ssm_no`, `company_address`, `city`, `postcode`, `state`, `year_involved`, `profile_picture`, `phone_number`, `service_provided`, `status`, `date_submit`, `date_approved`) VALUES
(1, 3, 'store', 'store', 'store.com', 'store@gmail.com', '2313213123', '10, JRB', 'Kuala Lumpur', '51300', 'WP', '3', NULL, '0133339913', 'Clothing', 1, '2018-09-22', '0000-00-00'),
(2, 4, 'StorageINC', 'http://www.facebook.com/StorageINC', 'http://www.storageinc.com', 'store@storage.inc', '8889193', '22, Jalan Bukit Bintang', 'Bukit Bintang', '51300', 'Kuala Lumpur', '3', NULL, '0133339913', 'Clothing', 2, '2018-07-18', '2018-07-24'),
(3, 5, 'fourhead', 'http://www.facebook.com/fourhead', 'http://www.fourhead.com', 'services@fourhead.com', '213819421-H', '213, Jalan Telawi', 'Bangsar', '53100', 'Kuala Lumpur', '2', '4_220918161708.png', '03-88819901', 'Clothing', 0, '2018-07-25', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Instashop'),
(4, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `scammer`
--

CREATE TABLE `scammer` (
  `id_scammer` int(11) NOT NULL,
  `report_number` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_occur` varchar(255) NOT NULL,
  `cheated_money` varchar(255) NOT NULL,
  `cheated_story` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `ic_no` varchar(255) NOT NULL,
  `facebook_url` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `date_submitted` date NOT NULL,
  `date_approved` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scammer`
--

INSERT INTO `scammer` (`id_scammer`, `report_number`, `id_user`, `date_occur`, `cheated_money`, `cheated_story`, `name`, `service`, `phone_no`, `ic_no`, `facebook_url`, `instagram`, `status`, `date_submitted`, `date_approved`) VALUES
(8, '20180826829B', 1, '04/09/2018', 'RM3000', 'Tertipu lagi', 'Azman Kasim', 'Footwear', '0133319901', '910911-05-9915', 'http://facebook.com/azman.kasim', '@azmankasim91', 1, '2018-08-26', '2018-09-05'),
(9, '201809066E24', 1, '08/27/2018', 'RM900', 'Test', 'Test1', 'Test 2', 'Test', 'Test', 'Test', 'Test', 1, '2018-09-06', '2018-09-06'),
(10, '20180921F4BF', 1, '09/08/2018', 'RM23', 'test', 'test', 'test', 'test', 'test', 'testtest', 'test', 0, '2018-09-21', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `scammer_bank`
--

CREATE TABLE `scammer_bank` (
  `id_bank` int(11) NOT NULL,
  `report_no` varchar(255) NOT NULL,
  `bank_name` varchar(35) NOT NULL,
  `account_holder` varchar(255) NOT NULL,
  `bank_account` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scammer_bank`
--

INSERT INTO `scammer_bank` (`id_bank`, `report_no`, `bank_name`, `account_holder`, `bank_account`) VALUES
(9, '20180826829B', 'CIMB', 'Azman Kasim', '7049881910'),
(10, '201809066E24', 'Maybank', 'Test', '29329320'),
(11, '20180921F4BF', 'Bank Simpanan Nasional', 'test', 'test'),
(12, '20180921F4BF', 'AM Bank', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `scammer_proof`
--

CREATE TABLE `scammer_proof` (
  `id_proof` int(11) NOT NULL,
  `report_no` varchar(255) NOT NULL,
  `proof` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scammer_proof`
--

INSERT INTO `scammer_proof` (`id_proof`, `report_no`, `proof`) VALUES
(18, '20180826829B', '5b82cb3f6ed468.05671353.jpg'),
(19, '20180826829B', '5b82cb3f71feb3.48377616.jpg'),
(20, '201809066E24', '5b907ee329eea3.18465162.jpeg'),
(21, '20180921F4BF', '5ba4f9f76db274.24823489.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `date_register` date NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `suspend` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_role`, `username`, `password`, `date_register`, `last_login`, `suspend`) VALUES
(1, 4, 'aiman', '123', '2018-06-28', '2018-09-22 17:01:46', 0),
(2, 1, 'admin', '123456', '2018-06-28', '2018-09-22 17:44:44', 0),
(3, 3, 'store', '1234', '2018-06-28', '2018-09-22 17:44:58', 0),
(4, 3, 'store1', '123', '2018-06-29', '2018-09-22 17:14:42', 0),
(5, 3, 'fourhead', '123', '2018-07-24', '2018-09-22 16:53:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `id_user_detail` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id_user_detail`, `id_user`, `name`, `gender`, `age`, `email`, `phone_number`, `address`, `city`, `postcode`, `state`) VALUES
(1, 1, 'Aiman Hakeem', 'Male', 23, 'm.aimanhakeem@gmail.com', '0107077167', '14b, Jalan Gunung Lambak 10, Taman Gunung Lambak', 'Kluang', '86000', 'Johor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id_document`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`);

--
-- Indexes for table `instashop`
--
ALTER TABLE `instashop`
  ADD PRIMARY KEY (`id_instashop`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `scammer`
--
ALTER TABLE `scammer`
  ADD PRIMARY KEY (`id_scammer`);

--
-- Indexes for table `scammer_bank`
--
ALTER TABLE `scammer_bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `scammer_proof`
--
ALTER TABLE `scammer_proof`
  ADD PRIMARY KEY (`id_proof`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id_user_detail`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `id_document` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `instashop`
--
ALTER TABLE `instashop`
  MODIFY `id_instashop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `scammer`
--
ALTER TABLE `scammer`
  MODIFY `id_scammer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `scammer_bank`
--
ALTER TABLE `scammer_bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `scammer_proof`
--
ALTER TABLE `scammer_proof`
  MODIFY `id_proof` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `id_user_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
