-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2019 at 10:24 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dwellingdiscoverer`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `App_Id` int(11) NOT NULL,
  `House_Id` int(11) DEFAULT NULL,
  `User_Id` int(11) DEFAULT NULL,
  `App_Date` date NOT NULL,
  `App_Time` time NOT NULL,
  `Status` varchar(50) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `A_Code` int(11) NOT NULL,
  `A_Name` varchar(100) NOT NULL,
  `Pincode` char(6) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`A_Code`, `A_Name`, `Pincode`, `IsActive`) VALUES
(1, 'Sabarmati', '380005', 1),
(2, 'Chandakheda', '380019', 1),
(3, 'Gheekanta ', '380001', 1),
(4, 'Ambawadi', '380006', 1),
(5, 'Bapu Nagar', '380024', 1),
(6, 'Bhat', '382210', 1),
(7, 'Bopal', '380058', 1),
(8, 'Chandalodia', '382481', 1),
(9, 'Chandra Nagar', '382150', 1),
(10, 'CTM', '380026', 1),
(11, 'D-Cabin', '380018', 1),
(12, 'Ellisbridge', '380007', 1),
(13, 'Gota', '382481', 1),
(14, 'Gujarat University', '380009', 1),
(15, 'Isanpur', '382443', 1),
(16, 'Jantanagar', '382449', 1),
(17, 'Jetalpur', '382426', 1),
(18, 'Kathwada', '382430', 1),
(19, 'lambha', '382405', 1),
(20, 'Maninagar', '380008', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Cat_Id` int(11) NOT NULL,
  `Cat_Name` varchar(100) NOT NULL,
  `Cat_Description` varchar(2000) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Cat_Id`, `Cat_Name`, `Cat_Description`, `IsActive`) VALUES
(1, 'Tenant', 'A tenant who not only lives at your place but also pays for food and shelter. shared accommodation with the owner.', 1),
(2, 'PG', 'PG is someone who takes a part of your house on rent, Normally young students  take up these kind of opportunity as it comes pretty reasonable and their focus at this time of life is college, studies, work etc...', 1);

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `Com_Id` int(11) NOT NULL,
  `User_Id` int(11) DEFAULT NULL,
  `House_Owner_Id` int(11) DEFAULT NULL,
  `TSProvider_Id` int(11) DEFAULT NULL,
  `Description` varchar(500) NOT NULL,
  `Com_Date` date NOT NULL,
  `Com_Status` varchar(100) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `Contact_Id` int(11) NOT NULL,
  `Contact_Fname` varchar(30) NOT NULL,
  `Contact_Lname` varchar(30) NOT NULL,
  `Contact_Email` varchar(150) NOT NULL,
  `Contact_Subject` varchar(100) NOT NULL,
  `Contact_Message` varchar(500) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `Facility_Id` int(11) NOT NULL,
  `F_Name` varchar(50) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`Facility_Id`, `F_Name`, `Description`, `IsActive`) VALUES
(1, 'security', 'This House provides Security guard', 1),
(2, 'WI-FI', 'This House Provides Wi-FI', 1),
(3, 'lift', 'Provide Lift', 1),
(4, 'AC', 'AC available', 1),
(5, 'GYM', 'GYM available', 1),
(6, 'garden', 'Garden available infront of Balcony', 1),
(7, 'Balcony', 'Balcony Available', 1),
(8, 'Car Parking ', 'Car Parking Available ', 1),
(9, 'Club House', 'Club house available', 1),
(10, 'Jogging Track', 'Jogging Track available', 1),
(11, 'Furniture', 'Fully Furniture Available', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Feed_Id` int(11) NOT NULL,
  `User_Id` int(11) DEFAULT NULL,
  `Feedback` varchar(500) NOT NULL,
  `Feed_Date` date NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `Food_Id` int(11) NOT NULL,
  `Food_Type` varchar(250) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`Food_Id`, `Food_Type`, `IsActive`) VALUES
(1, 'Gujarati', 1),
(2, 'Punjabi', 1),
(3, 'South Indian', 1);

-- --------------------------------------------------------

--
-- Table structure for table `house`
--

CREATE TABLE `house` (
  `House_Id` int(11) NOT NULL,
  `Cat_Id` int(11) DEFAULT NULL,
  `User_Id` int(11) DEFAULT NULL,
  `A_Code` int(11) DEFAULT NULL,
  `H_Name` varchar(200) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `Profile_Image` varchar(250) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Rent` int(11) NOT NULL,
  `Uploaded_Date` date NOT NULL,
  `Square_Foot` varchar(100) NOT NULL,
  `No_of_Rooms` varchar(100) NOT NULL,
  `Floor` varchar(20) NOT NULL,
  `IsAvailable` tinyint(1) NOT NULL DEFAULT '1',
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `house`
--

INSERT INTO `house` (`House_Id`, `Cat_Id`, `User_Id`, `A_Code`, `H_Name`, `Address`, `Profile_Image`, `Description`, `Rent`, `Uploaded_Date`, `Square_Foot`, `No_of_Rooms`, `Floor`, `IsAvailable`, `IsActive`) VALUES
(1, 2, 9, 1, 'Shriji Nivas', '5,kirti socity', 'navya-pg-services-satellite-ahmedabad-paying-guest-accommodations-l4nwasmb4u.jpg', ' Provide you Best Facilities', 3000, '2019-02-24', '120', '1', 'Ground', 1, 1),
(2, 1, 9, 1, 'Balaji', '5, kirti Socity', '155995539O-1547464144.jpeg', 'Provide you Best Facilities and if you have any coplaint it solve as soon as possible', 10000, '2019-02-24', '250', '3', '1st', 1, 1),
(3, 2, 14, 18, 'Bhaduriya House', '39, kundan nagar', 'hemang-desai-navrangpura-ahmedabad-paying-guest-accommodations-for-men-3esvy9f.jpg', 'Provide you Best Facilities and if you have any coplaint it solve as soon as possible', 4000, '2019-02-24', '250', '1', 'ground', 1, 1),
(4, 1, 16, 13, 'Labana House', 'b. 506, royal plaza', 'flat.jpg', 'Provide you Best Facilities and if you have any coplaint it will be solved as soon as possible', 9000, '2019-02-24', '300', '2', '5', 1, 1),
(5, 1, 19, 11, 'Shah House', 'b. 204, sangath flat', 'flat3.jpg', 'Provide you Best Facilities and if you have any coplaint it solve as soon as possible', 7000, '2019-02-24', '200', '2', '2nd', 1, 1),
(6, 1, 20, 20, 'Champavat House', '5, Suryam floora', 'bhagwati-ben-paying-guest-vejalpur-ahmedabad-paying-guest-accommodations-2d5t5wb.jpg', 'Provide you Best Facilities and if you have any coplaint it solve as soon as possible', 11000, '2019-02-24', '400', '4', 'ground', 1, 1),
(7, 2, 20, 11, 'Shyam Nivas', '20, Stadium villa Bunglow', 'deepmala-pg-service-odhav-ahmedabad-paying-guest-accommodation-for-men-c6eae.jpg', 'Provide you Best Facilities and if you have any coplaint it solve as soon as possible', 5000, '2019-02-24', '450', '3', 'ground', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `house_booking`
--

CREATE TABLE `house_booking` (
  `HBook_Id` int(11) NOT NULL,
  `User_Id` int(11) DEFAULT NULL,
  `House_Id` int(11) DEFAULT NULL,
  `HB_Date` date NOT NULL,
  `HB_Status` varchar(50) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `house_facility`
--

CREATE TABLE `house_facility` (
  `House_Facility_Id` int(11) NOT NULL,
  `Facility_Id` int(11) DEFAULT NULL,
  `House_Id` int(11) DEFAULT NULL,
  `IsActive` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `house_facility`
--

INSERT INTO `house_facility` (`House_Facility_Id`, `Facility_Id`, `House_Id`, `IsActive`) VALUES
(1, 2, 1, 1),
(2, 4, 1, 1),
(3, 2, 2, 1),
(4, 7, 2, 1),
(5, 11, 2, 1),
(6, 4, 2, 1),
(7, 1, 4, 1),
(8, 2, 4, 1),
(9, 11, 4, 1),
(10, 2, 3, 1),
(11, 7, 3, 1),
(12, 11, 3, 1),
(13, 3, 5, 1),
(14, 4, 5, 1),
(15, 1, 5, 1),
(16, 2, 6, 1),
(17, 4, 6, 1),
(18, 7, 6, 1),
(19, 4, 7, 1),
(20, 11, 7, 1),
(21, 11, 6, 1),
(22, 8, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `house_images`
--

CREATE TABLE `house_images` (
  `Img_Id` int(11) NOT NULL,
  `House_Id` int(11) DEFAULT NULL,
  `Image_Path` varchar(250) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `house_images`
--

INSERT INTO `house_images` (`Img_Id`, `House_Id`, `Image_Path`, `IsActive`) VALUES
(1, 1, '155995545O-1547464047.jpeg', 1),
(2, 1, '155995539O-1547464144.jpeg', 1),
(3, 1, '155995541O-1547464285.jpeg', 1),
(4, 2, 'hemang-desai-navrangpura-ahmedabad-paying-guest-accommodations-for-men-1dset58.jpg', 1),
(5, 2, 'hemang-desai-navrangpura-ahmedabad-paying-guest-accommodations-for-men-3m2lc6.jpg', 1),
(6, 2, 'hemang-desai-navrangpura-ahmedabad-paying-guest-accommodations-for-men-38prh0j.jpg', 1),
(7, 2, 'hemang-desai-navrangpura-ahmedabad-paying-guest-accommodations-for-men-65kkxa.jpg', 1),
(8, 2, 'hemang-desai-navrangpura-ahmedabad-paying-guest-accommodations-for-men-2ueuu5r.jpg', 1),
(9, 4, 'arihant-p-g-houses-c-g-road-ahmedabad-paying-guest-accommodations-pjy73.jpg', 1),
(10, 4, 'badroom1.jpg', 1),
(11, 4, 'badroom10.jpg', 1),
(12, 3, 'masterroom1.jpg', 1),
(13, 3, 'badroom6.jpg', 1),
(14, 5, 'masterroom4.jpg', 1),
(15, 5, 'badroom17.jpg', 1),
(16, 5, 'img.jpg', 1),
(17, 6, 'deepmala-pg-service-odhav-ahmedabad-paying-guest-accommodation-for-men-owgtmv9zlm.jpg', 1),
(18, 6, 'masterroom6.jpg', 1),
(19, 6, 'badroom3.jpg', 1),
(20, 6, 'badroom10.jpg', 1),
(21, 6, 'arihant-p-g-houses-c-g-road-ahmedabad-paying-guest-accommodations-k23x6.jpg', 1),
(22, 6, 'kitchen.jpg', 1),
(23, 7, 'masterroom9.jpg', 1),
(24, 6, '146438121O-1548502810.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `membership_package`
--

CREATE TABLE `membership_package` (
  `MPackage_Id` int(11) NOT NULL,
  `Package_Name` varchar(100) NOT NULL,
  `Description` varchar(250) NOT NULL,
  `Price` int(11) NOT NULL,
  `Duration` varchar(50) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership_package`
--

INSERT INTO `membership_package` (`MPackage_Id`, `Package_Name`, `Description`, `Price`, `Duration`, `IsActive`) VALUES
(1, 'Gold', 'For Uploading House and Tiffin Service', 2000, '3 months', 1),
(2, 'Silver', 'For Uploading House and Tiffin Service', 1500, '2 months', 1),
(3, 'Platinum', 'For Uploading House and Tiffin Service', 1000, '1 month', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `Role_Id` int(11) NOT NULL,
  `Role_Name` varchar(100) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`Role_Id`, `Role_Name`, `IsActive`) VALUES
(1, 'Admin', 0),
(2, 'Customer', 1),
(3, 'House Owner', 1),
(4, 'Tiffin Service Provider', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tiffin_service_booking`
--

CREATE TABLE `tiffin_service_booking` (
  `TSBook_Id` int(11) NOT NULL,
  `User_Id` int(11) DEFAULT NULL,
  `TSPackage_Id` int(11) DEFAULT NULL,
  `Delivery_Address` varchar(250) NOT NULL,
  `A_Code` int(11) DEFAULT NULL,
  `SB_Date` date NOT NULL,
  `SB_Status` varchar(50) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tiffin_service_package`
--

CREATE TABLE `tiffin_service_package` (
  `TSPackage_Id` int(11) NOT NULL,
  `Package_Name` varchar(150) NOT NULL,
  `User_Id` int(11) DEFAULT NULL,
  `Food_Id` int(11) DEFAULT NULL,
  `Profile_Image` varchar(250) NOT NULL,
  `Description` varchar(250) NOT NULL,
  `Price` int(11) NOT NULL,
  `Duration` varchar(50) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tiffin_service_package`
--

INSERT INTO `tiffin_service_package` (`TSPackage_Id`, `Package_Name`, `User_Id`, `Food_Id`, `Profile_Image`, `Description`, `Price`, `Duration`, `IsActive`) VALUES
(1, 'Chhole Puri', 38, 2, 'chole-bhature.jpg', 'chhole and 2 puri', 1500, '1 Month', 1),
(2, 'Combo Gujarati', 32, 1, 'gujarati', '3roti, sabji, dal, rice, salad, butermilk', 2500, '1 month', 1),
(3, 'Delux Combo ', 30, 2, 'punjabi1.jpg', '3 butter roti, 2Sabji, salad, Buter milk, rice, dal', 3000, '1 month', 1),
(4, 'Idali-Dosa-Sambhar', 28, 3, 'south-indian1.jpg', 'Customer get Delicious food delivered to their doorstep on a regular basis', 2000, '1month', 1),
(5, 'Golden Combo ', 24, 1, 'Gujarati-Recipes1.jpg', '5-roti, 2- sabji, dal, rice, salad, 1-butermilk, 1 sweet', 2000, '1 month', 1),
(6, ' Gujju Combo ', 22, 1, 'gujarati2.jpg', '3-roti, 2-subji, dal, rice, 1-papad, 1-buttermilk', 3000, '1month', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user1`
--

CREATE TABLE `user1` (
  `User_Id` int(11) NOT NULL,
  `Role_Id` int(11) DEFAULT NULL,
  `A_Code` int(11) DEFAULT NULL,
  `MPackage_Id` int(11) DEFAULT NULL,
  `U_Name` varchar(200) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `ContectNo` char(10) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Reg_Date` date NOT NULL,
  `End_Date` date DEFAULT NULL,
  `Otp` int(11) NOT NULL,
  `Otpused` int(11) NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1',
  `Payment_Status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user1`
--

INSERT INTO `user1` (`User_Id`, `Role_Id`, `A_Code`, `MPackage_Id`, `U_Name`, `Address`, `ContectNo`, `Email`, `Password`, `Reg_Date`, `End_Date`, `Otp`, `Otpused`, `IsActive`, `Payment_Status`) VALUES
(1, 3, 1, NULL, 'Preksha Sheth', 'b.406, Sahjanand Park, Motera', '9104812154', 'prekshasheth1998@gmail.com', 'Preksha@123', '2019-02-21', NULL, 0, 0, 1, NULL),
(2, 2, 5, NULL, 'Tejas Parmar', ' 45, vraj Bhumi Socity', '9898592098', 'tejasparmar39@gmail.com', 't123', '2019-02-24', NULL, 0, 0, 1, NULL),
(3, 2, 1, NULL, 'Prerak Sheth', ' b.406, Sahjanand Park,', '7778804429', 'shethprerak8@gmail.com', 'p123', '2019-02-24', NULL, 0, 0, 1, NULL),
(4, 2, 8, NULL, 'Yash Shah', ' 23, Maheshwari Flat', '8153953181', 'yash12@gail.com', 'y123', '2019-02-24', NULL, 0, 0, 1, NULL),
(5, 2, 2, NULL, 'Ronit Maheshwari', ' C.202, Shivalay heights,', '9427153945', 'ronitmaheshwari1406@gmail.com', 'r123', '2019-02-24', NULL, 0, 0, 1, NULL),
(6, 2, 2, NULL, 'Himani Patel', ' A. 504, Vrundavan Royal', '8160234304', 'himanipatoliya@gmail.com', 'h123', '2019-02-24', NULL, 0, 0, 1, NULL),
(7, 2, 20, NULL, 'Dhruvil Shah', ' 68, Adinath Socity, ', '8320642041', 'imdhruvil2208@gmail.com', 'd123', '2019-02-24', NULL, 0, 0, 1, NULL),
(8, 2, 10, NULL, 'Ashwini Kashyap', ' 307, Maheshwari socity', '9773120713', 'ashwinikashyap206@gmail.com', 'a123', '2019-02-24', NULL, 0, 0, 1, NULL),
(9, 1, 1, 2, 'honey shah', '5, kirti Socity', '6354199832', 'honey399shah@gmail.com', 'h123', '2019-02-24', NULL, 0, 0, 1, NULL),
(14, 3, 18, 1, 'Sadhna Bhaduriya', 'b.10, kundan nagar', '9904251704', 'sadhnabha250@gmail.com', 's123', '2019-02-24', NULL, 0, 0, 1, NULL),
(16, 3, 12, 3, 'Subhash Labana', 'b.101, Stadium Plaza Flat', '8200854189', 'lsubhash123@gmail.com', 's123', '2019-02-24', NULL, 0, 0, 1, NULL),
(19, 3, 6, 1, 'Hemil Shah', '69, Abu Street Socity', '9510140586', 'hemil321@gmail.com', 'h1234', '2019-02-24', NULL, 0, 0, 1, NULL),
(20, 3, 1, 1, 'Rittal Champavat', '20, Stadium Villa Bunglow', '7383903118', 'rittalchampavat@gmail.com', 'r1234', '2019-02-24', NULL, 0, 0, 1, NULL),
(22, 4, 2, 2, 'Sanjay Tank', '16, Suryanarayan Socity', '7016240352', 'sanjay123@gmail.com', 's123', '2019-02-24', NULL, 0, 0, 1, NULL),
(24, 4, 18, 3, 'Dhaval Rana', '23, Shiv Shakti Apartment', '9103923975', 'ranadhaval123@gmail.com', 'd123', '2019-02-24', NULL, 0, 0, 1, NULL),
(28, 4, 20, 3, 'Kajal Patel', 'b. 207, Parshwanath Flat', '7778805324', 'kajalk21499@gmail.com', 'k123', '2019-02-24', NULL, 0, 0, 1, NULL),
(30, 4, 1, 1, 'Ravi Shah', 'E.303, kameshwar Flat', '9427707481', 'ravishah123@gmail.com', 'rv123', '2019-02-24', NULL, 0, 0, 1, NULL),
(32, 4, 11, 3, 'Kalpana Gami', '58, suramya socity', '8511989944', 'kalpanagami23@gmail.com', 'kg123', '2019-02-24', NULL, 0, 0, 1, NULL),
(34, 3, 20, 1, 'vishwa Sharma', 'c.204, Devam-2 Flat', '9998805562', 'vishwas98@gmail.com', 'v123', '2019-02-24', NULL, 0, 0, 1, NULL),
(36, 3, 7, 2, 'Vivek Joshi', 'b.202, Sangath Platinum Flat', '9104812153', 'vivekjoshi99@gmail.com', 'vj123', '2019-02-24', NULL, 0, 0, 1, NULL),
(38, 4, 16, 3, 'Rachna Joshi', '5, Hariom Apartment', '9429149096', 'joshirachna96@gmail.com', 'rj123', '2019-02-24', NULL, 0, 0, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`App_Id`),
  ADD KEY `House_Id` (`House_Id`),
  ADD KEY `User_Id` (`User_Id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`A_Code`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Cat_Id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`Com_Id`),
  ADD KEY `User_Id` (`User_Id`),
  ADD KEY `House_Owner_Id` (`House_Owner_Id`),
  ADD KEY `TSProvider_Id` (`TSProvider_Id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`Contact_Id`);

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`Facility_Id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Feed_Id`),
  ADD KEY `User_Id` (`User_Id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`Food_Id`);

--
-- Indexes for table `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`House_Id`),
  ADD KEY `User_Id` (`User_Id`),
  ADD KEY `A_Code` (`A_Code`),
  ADD KEY `Cat_Id` (`Cat_Id`);

--
-- Indexes for table `house_booking`
--
ALTER TABLE `house_booking`
  ADD PRIMARY KEY (`HBook_Id`),
  ADD KEY `User_Id` (`User_Id`),
  ADD KEY `House_Id` (`House_Id`);

--
-- Indexes for table `house_facility`
--
ALTER TABLE `house_facility`
  ADD PRIMARY KEY (`House_Facility_Id`),
  ADD KEY `Facility_Id` (`Facility_Id`),
  ADD KEY `House_Id` (`House_Id`);

--
-- Indexes for table `house_images`
--
ALTER TABLE `house_images`
  ADD PRIMARY KEY (`Img_Id`),
  ADD KEY `House_Id` (`House_Id`);

--
-- Indexes for table `membership_package`
--
ALTER TABLE `membership_package`
  ADD PRIMARY KEY (`MPackage_Id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`Role_Id`);

--
-- Indexes for table `tiffin_service_booking`
--
ALTER TABLE `tiffin_service_booking`
  ADD PRIMARY KEY (`TSBook_Id`),
  ADD KEY `A_Code` (`A_Code`),
  ADD KEY `TSPackage_Id` (`TSPackage_Id`),
  ADD KEY `User_Id` (`User_Id`);

--
-- Indexes for table `tiffin_service_package`
--
ALTER TABLE `tiffin_service_package`
  ADD PRIMARY KEY (`TSPackage_Id`),
  ADD KEY `User_Id` (`User_Id`),
  ADD KEY `Food_Id` (`Food_Id`);

--
-- Indexes for table `user1`
--
ALTER TABLE `user1`
  ADD PRIMARY KEY (`User_Id`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `Role_Id` (`Role_Id`),
  ADD KEY `A_Code` (`A_Code`),
  ADD KEY `MPackage_Id` (`MPackage_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `App_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `A_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Cat_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `Com_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `Contact_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `Facility_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `Feed_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `Food_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `house`
--
ALTER TABLE `house`
  MODIFY `House_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `house_booking`
--
ALTER TABLE `house_booking`
  MODIFY `HBook_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `house_facility`
--
ALTER TABLE `house_facility`
  MODIFY `House_Facility_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `house_images`
--
ALTER TABLE `house_images`
  MODIFY `Img_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `membership_package`
--
ALTER TABLE `membership_package`
  MODIFY `MPackage_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `Role_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tiffin_service_booking`
--
ALTER TABLE `tiffin_service_booking`
  MODIFY `TSBook_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tiffin_service_package`
--
ALTER TABLE `tiffin_service_package`
  MODIFY `TSPackage_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user1`
--
ALTER TABLE `user1`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`House_Id`) REFERENCES `house` (`House_Id`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`User_Id`) REFERENCES `user1` (`User_Id`);

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `user1` (`User_Id`),
  ADD CONSTRAINT `complaint_ibfk_2` FOREIGN KEY (`House_Owner_Id`) REFERENCES `user1` (`User_Id`),
  ADD CONSTRAINT `complaint_ibfk_3` FOREIGN KEY (`TSProvider_Id`) REFERENCES `user1` (`User_Id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `user1` (`User_Id`);

--
-- Constraints for table `house`
--
ALTER TABLE `house`
  ADD CONSTRAINT `house_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `user1` (`User_Id`),
  ADD CONSTRAINT `house_ibfk_3` FOREIGN KEY (`A_Code`) REFERENCES `area` (`A_Code`),
  ADD CONSTRAINT `house_ibfk_4` FOREIGN KEY (`Cat_Id`) REFERENCES `category` (`Cat_Id`);

--
-- Constraints for table `house_booking`
--
ALTER TABLE `house_booking`
  ADD CONSTRAINT `house_booking_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `user1` (`User_Id`),
  ADD CONSTRAINT `house_booking_ibfk_2` FOREIGN KEY (`House_Id`) REFERENCES `house` (`House_Id`);

--
-- Constraints for table `house_facility`
--
ALTER TABLE `house_facility`
  ADD CONSTRAINT `house_facility_ibfk_1` FOREIGN KEY (`Facility_Id`) REFERENCES `facility` (`Facility_Id`),
  ADD CONSTRAINT `house_facility_ibfk_4` FOREIGN KEY (`House_Id`) REFERENCES `house` (`House_Id`);

--
-- Constraints for table `house_images`
--
ALTER TABLE `house_images`
  ADD CONSTRAINT `house_images_ibfk_1` FOREIGN KEY (`House_Id`) REFERENCES `house` (`House_Id`);

--
-- Constraints for table `tiffin_service_booking`
--
ALTER TABLE `tiffin_service_booking`
  ADD CONSTRAINT `tiffin_service_booking_ibfk_1` FOREIGN KEY (`A_Code`) REFERENCES `area` (`A_Code`),
  ADD CONSTRAINT `tiffin_service_booking_ibfk_2` FOREIGN KEY (`TSPackage_Id`) REFERENCES `tiffin_service_package` (`TSPackage_Id`),
  ADD CONSTRAINT `tiffin_service_booking_ibfk_3` FOREIGN KEY (`User_Id`) REFERENCES `user1` (`User_Id`);

--
-- Constraints for table `tiffin_service_package`
--
ALTER TABLE `tiffin_service_package`
  ADD CONSTRAINT `tiffin_service_package_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `user1` (`User_Id`),
  ADD CONSTRAINT `tiffin_service_package_ibfk_2` FOREIGN KEY (`Food_Id`) REFERENCES `food` (`Food_Id`);

--
-- Constraints for table `user1`
--
ALTER TABLE `user1`
  ADD CONSTRAINT `user1_ibfk_1` FOREIGN KEY (`Role_Id`) REFERENCES `role` (`Role_Id`),
  ADD CONSTRAINT `user1_ibfk_2` FOREIGN KEY (`A_Code`) REFERENCES `area` (`A_Code`),
  ADD CONSTRAINT `user1_ibfk_3` FOREIGN KEY (`MPackage_Id`) REFERENCES `membership_package` (`MPackage_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
