-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2019 at 11:32 AM
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
  `House_Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `App_Date` date NOT NULL,
  `App_Time` time NOT NULL,
  `Status` varchar(10) NOT NULL,
  `IsActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`App_Id`, `House_Id`, `User_Id`, `App_Date`, `App_Time`, `Status`, `IsActive`) VALUES
(1, 2, 5, '2018-05-09', '03:26:00', 'Approved', 1),
(2, 3, 4, '2018-03-19', '04:30:00', 'Approved', 1),
(3, 4, 1, '2018-12-02', '12:25:00', 'Approve', 1),
(4, 3, 8, '2018-11-19', '09:48:00', 'Disapprove', 1),
(5, 3, 6, '2019-05-05', '03:06:00', 'Pending', 1),
(6, 1, 6, '2020-05-07', '04:06:00', 'Pending', 1);

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `A_Code` int(3) NOT NULL,
  `City_Id` int(11) NOT NULL,
  `A_Name` varchar(30) NOT NULL,
  `Pincode` char(6) NOT NULL,
  `IsActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`A_Code`, `City_Id`, `A_Name`, `Pincode`, `IsActive`) VALUES
(8, 1, 'setellite', '380015', 1),
(9, 1, 'sabarmati', '380005', 1),
(10, 2, 'ramnagar', '542450', 1),
(11, 4, 'city light', '650012', 1),
(12, 3, 'alkapuri', '380006', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Cat_Id` int(3) NOT NULL,
  `Cat_Name` varchar(30) NOT NULL,
  `IsActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Cat_Id`, `Cat_Name`, `IsActive`) VALUES
(1, 'Tenant', 1),
(2, 'PG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `City_Id` int(11) NOT NULL,
  `City_Name` varchar(30) NOT NULL,
  `IsActive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`City_Id`, `City_Name`, `IsActive`) VALUES
(1, 'Ahmedabad', 1),
(2, 'Rajkot', 1),
(3, 'Vadodara', 1),
(4, 'Surat', 1);

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `Com_Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `House_Owner_Id` int(11) DEFAULT NULL,
  `TSProvider_Id` int(11) DEFAULT NULL,
  `Description` varchar(150) NOT NULL,
  `Com_Date` date NOT NULL,
  `Com_Status` varchar(100) NOT NULL,
  `IsActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`Com_Id`, `User_Id`, `House_Owner_Id`, `TSProvider_Id`, `Description`, `Com_Date`, `Com_Status`, `IsActive`) VALUES
(1, 4, 5, 1, 'Ac not working', '2018-10-02', 'Pending', 1),
(2, 5, 3, 4, 'food packing', '2018-05-25', 'Pending', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `Contact_Id` int(11) NOT NULL,
  `Contact_Fname` varchar(30) NOT NULL,
  `Contact_Lname` varchar(25) NOT NULL,
  `Contact_Email` varchar(50) NOT NULL,
  `Contact_Subject` varchar(40) NOT NULL,
  `Contact_Message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`Contact_Id`, `Contact_Fname`, `Contact_Lname`, `Contact_Email`, `Contact_Subject`, `Contact_Message`) VALUES
(1, 'Sanjay', 'Tank', 'sanjay23@gmail.com', 'complain', 'AC is not Working in my Room.');

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `Facility_Id` int(3) NOT NULL,
  `F_Name` varchar(30) NOT NULL,
  `Description` varchar(150) NOT NULL,
  `IsActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`Facility_Id`, `F_Name`, `Description`, `IsActive`) VALUES
(1, 'AC Room', 'AC Rooms available here', 1),
(2, 'Balcony', 'infront of master room', 1),
(3, 'WI-Fi', 'very good Wi-Fi facility', 1),
(4, 'lift', 'Very Comfortable Services	', 1),
(5, 'garden', 'awesome view ', 1),
(6, 'security', 'Powerful Security', 1),
(7, 'GYM', 'Provide GYM ', 1),
(8, 'Club House', 'provide club house for your enjoyment', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Feed_Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Feedback` varchar(250) NOT NULL,
  `Feed_Date` date NOT NULL,
  `IsActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`Feed_Id`, `User_Id`, `Feedback`, `Feed_Date`, `IsActive`) VALUES
(1, 8, 'It\'s a very Comfortable PG Website', '2018-10-17', 1),
(2, 3, 'Very Easily find houses and flats', '2018-12-21', 1),
(3, 1, 'This Web Application is very Useful.', '2019-02-02', 1),
(5, 4, 'very good website', '2019-02-07', 1),
(6, 6, 'This web site is so useful.', '2019-02-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `Food_Id` int(11) NOT NULL,
  `Food_Type` varchar(100) NOT NULL,
  `IsActive` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`Food_Id`, `Food_Type`, `IsActive`) VALUES
(1, 'Gujarati', 1),
(2, 'South Indian', 1);

-- --------------------------------------------------------

--
-- Table structure for table `house`
--

CREATE TABLE `house` (
  `House_Id` int(11) NOT NULL,
  `Cat_Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `A_Code` int(11) NOT NULL,
  `H_Name` varchar(50) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `Profile_Image` varchar(200) DEFAULT NULL,
  `Description` varchar(150) NOT NULL,
  `Rent` int(11) NOT NULL,
  `Uploaded_Date` date NOT NULL,
  `Square_Foot` varchar(20) NOT NULL,
  `No_of_Rooms` varchar(10) NOT NULL,
  `Floor` varchar(20) NOT NULL,
  `House_Facility_Id` int(11) NOT NULL,
  `IsActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `house`
--

INSERT INTO `house` (`House_Id`, `Cat_Id`, `User_Id`, `A_Code`, `H_Name`, `Address`, `Profile_Image`, `Description`, `Rent`, `Uploaded_Date`, `Square_Foot`, `No_of_Rooms`, `Floor`, `House_Facility_Id`, `IsActive`) VALUES
(1, 2, 4, 9, 'Karnavati Bungalow', 'Kirti Society,Ramnagar,Ahmedabad', 'a1.png', 'House contain very good AC service', 5000, '2018-09-08', '1200sqft', '2', 'Second', 1, 1),
(2, 1, 5, 10, 'Mannat Bunglaw', 'Shyamved Elliegance,New Naroda,Ahmedabad', 'a2.png', 'Good Electricity', 8000, '2018-04-23', '1500sqft', '3', 'Ground', 1, 1),
(3, 1, 3, 11, 'Rushabh Nivas', 'parshwanath flat, near godiji temple', 'a3.png', 'Awesome looking and more comfertable', 18000, '2018-12-02', '2000', '3', 'First', 2, 1),
(4, 2, 1, 8, 'Saroj Nivas', 'Karnavati Flat, Satellite,Ahmedabad', 'a4.jpg', 'Awesome view ', 6000, '2018-12-25', '1650sqft', '2', 'Third', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `house_booking`
--

CREATE TABLE `house_booking` (
  `HBook_Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `House_Id` int(11) NOT NULL,
  `HB_Date` date NOT NULL,
  `HB_Status` varchar(10) NOT NULL,
  `IsActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `house_booking`
--

INSERT INTO `house_booking` (`HBook_Id`, `User_Id`, `House_Id`, `HB_Date`, `HB_Status`, `IsActive`) VALUES
(1, 8, 3, '2018-09-17', 'booked', 0),
(2, 4, 1, '2018-11-23', 'unbooked', 1),
(3, 1, 4, '2018-11-22', 'booked', 0),
(4, 5, 2, '2018-09-02', 'unbooked', 1);

-- --------------------------------------------------------

--
-- Table structure for table `house_facility`
--

CREATE TABLE `house_facility` (
  `House_Facility_Id` int(11) NOT NULL,
  `Facility_Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `House_Id` int(11) NOT NULL,
  `A_Code` int(11) DEFAULT NULL,
  `IsActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `house_facility`
--

INSERT INTO `house_facility` (`House_Facility_Id`, `Facility_Id`, `User_Id`, `House_Id`, `A_Code`, `IsActive`) VALUES
(1, 2, 1, 4, 9, 1),
(2, 4, 3, 3, 8, 0),
(3, 3, 5, 2, 10, 1),
(4, 4, 4, 1, 11, 1),
(5, 3, 3, 3, 12, 1),
(6, 5, 3, 3, 12, 1),
(7, 7, 3, 3, NULL, 0),
(8, 7, 3, 3, NULL, 0),
(9, 6, 3, 3, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `house_images`
--

CREATE TABLE `house_images` (
  `Img_Id` int(11) NOT NULL,
  `House_Id` int(11) NOT NULL,
  `Image_Path` varchar(250) NOT NULL,
  `IsActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `house_images`
--

INSERT INTO `house_images` (`Img_Id`, `House_Id`, `Image_Path`, `IsActive`) VALUES
(1, 2, 'img1.jpg', 1),
(2, 2, 'img2.jpg', 1),
(3, 1, 'img3.jpg', 1),
(4, 1, 'img3.jpg', 1),
(5, 3, 'img5.jpg', 0),
(6, 3, 'img6.jpg', 0),
(7, 4, 'img7.jpg', 1),
(8, 4, 'img8.jpg', 1),
(9, 3, 'img9.jpg', 1),
(10, 3, 'abd.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `membership_package`
--

CREATE TABLE `membership_package` (
  `MPackage_Id` int(3) NOT NULL,
  `Package_Name` varchar(30) NOT NULL,
  `Description` varchar(150) NOT NULL,
  `Price` int(5) NOT NULL,
  `Duration` varchar(10) NOT NULL,
  `IsActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership_package`
--

INSERT INTO `membership_package` (`MPackage_Id`, `Package_Name`, `Description`, `Price`, `Duration`, `IsActive`) VALUES
(2, 'Silver', 'For Uploading House ', 2000, '6 months', 1),
(3, 'Gold', 'For uploading House and tiffin services both', 2500, '6 months', 1),
(5, 'platinum', 'For uploding tiffinservice', 1000, '6month', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `Role_Id` int(3) NOT NULL,
  `Role_Name` varchar(30) NOT NULL,
  `IsActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`Role_Id`, `Role_Name`, `IsActive`) VALUES
(2, 'customer', 1),
(3, 'HouseOwner', 1),
(4, 'TiffinServiseProvider', 1),
(5, 'admin', 0),
(6, 'gh', 0),
(7, 'gh', 0),
(8, 'ghhfaghja', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tiffin_service`
--

CREATE TABLE `tiffin_service` (
  `TS_Id` int(11) NOT NULL,
  `Food_Type` varchar(30) NOT NULL,
  `A_Code` int(11) NOT NULL,
  `Owner_Name` varchar(50) NOT NULL,
  `ContactNo` int(11) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Price` int(11) NOT NULL,
  `Created_On` date NOT NULL,
  `IsActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tiffin_service`
--

INSERT INTO `tiffin_service` (`TS_Id`, `Food_Type`, `A_Code`, `Owner_Name`, `ContactNo`, `Email`, `Price`, `Created_On`, `IsActive`) VALUES
(1, 'Gujarati', 8, 'sahil', 945630481, 'sahil@gmail.com', 1200, '2018-01-08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tiffin_service_booking`
--

CREATE TABLE `tiffin_service_booking` (
  `TSBook_Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `TSPackage_Id` int(11) NOT NULL,
  `A_Code` int(11) NOT NULL,
  `SB_Date` date NOT NULL,
  `SB_Status` varchar(20) NOT NULL,
  `IsActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tiffin_service_booking`
--

INSERT INTO `tiffin_service_booking` (`TSBook_Id`, `User_Id`, `TSPackage_Id`, `A_Code`, `SB_Date`, `SB_Status`, `IsActive`) VALUES
(1, 4, 3, 8, '2018-11-10', 'booked', 1),
(2, 1, 2, 9, '2018-03-22', 'unbooked', 1),
(3, 5, 2, 10, '2018-09-04', 'booked', 1),
(4, 3, 4, 11, '2018-04-23', 'booked', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tiffin_service_package`
--

CREATE TABLE `tiffin_service_package` (
  `TSPackage_Id` int(11) NOT NULL,
  `Package_Name` varchar(30) NOT NULL,
  `Food_Id` int(11) NOT NULL,
  `Profile_Image` varchar(250) NOT NULL,
  `Description` varchar(150) NOT NULL,
  `Price` int(11) NOT NULL,
  `Duration` varchar(30) NOT NULL,
  `IsActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tiffin_service_package`
--

INSERT INTO `tiffin_service_package` (`TSPackage_Id`, `Package_Name`, `Food_Id`, `Profile_Image`, `Description`, `Price`, `Duration`, `IsActive`) VALUES
(1, 'gold (Lunch & Dinner)', 1, 'img1.jpeg', 'lunch and dinner', 2000, '3months', 1),
(2, 'gold (Lunch & Dinner)', 2, 'img2.jpeg', 'lunch and dinner', 2000, '2months', 1),
(3, 'silver (Only Lunch)', 2, 'img3.jpeg', 'lunch only', 4000, '3month', 1),
(4, 'silver (Only Lunch)', 1, 'img4.jpeg', 'lunch only', 2000, '4months', 1),
(5, 'royal', 1, 'food.jpeg', 'Provide Best Quality food', 2500, '2 months', 0),
(6, 'platinum', 1, 'img11.png', 'Provide Best Quality food', 3000, '2 months', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user1`
--

CREATE TABLE `user1` (
  `User_Id` int(11) NOT NULL,
  `Role_Id` int(11) NOT NULL,
  `A_Code` int(11) NOT NULL,
  `City_Id` int(11) NOT NULL,
  `MPackage_Id` int(11) DEFAULT NULL,
  `U_Name` varchar(30) NOT NULL,
  `Address` varchar(150) NOT NULL,
  `ContectNo` char(10) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Reg_Date` date NOT NULL,
  `Otp` varchar(10) NOT NULL,
  `Otpused` int(1) NOT NULL,
  `IsActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user1`
--

INSERT INTO `user1` (`User_Id`, `Role_Id`, `A_Code`, `City_Id`, `MPackage_Id`, `U_Name`, `Address`, `ContectNo`, `Email`, `Password`, `Reg_Date`, `Otp`, `Otpused`, `IsActive`) VALUES
(1, 2, 10, 3, 5, 'Tejas Parmar', 'sangath platinum flat', '9104876104', 'tejasparmar39@gmail.com', 'tejas', '2018-01-14', '36221', 0, 1),
(2, 5, 8, 3, 3, 'preksha', 'sahjanand park, motera', '9104812154', 'prekshasheth1998@gmail.com', 'p123', '2018-02-24', '27505', 1, 1),
(3, 3, 11, 1, 5, 'himani shah', 'parshwanath flat', '9406574839', 'himanishah@gmail.com', '432', '2018-01-28', '', 0, 1),
(4, 5, 9, 1, 2, 'honey shah', 'posh flat, city light', '8460730164', 'honey399shah@gmail.com', 'h123', '2018-05-21', '448845', 1, 1),
(5, 2, 10, 1, 3, 'ravi', 'kameshwar flat,ramnagar', '8300651208', 'ravi@gmail.com', 'r123', '2019-09-11', '', 0, 1),
(6, 3, 11, 3, 5, 'prerak', 'sangath flat, city light', '9998880105', 'preraksheth8@gmail.com', '1234', '2018-02-19', '', 0, 0),
(8, 4, 8, 1, 3, 'ruhi patel', ' b.45, adinath flat', '6560565544', 'ruhi12@gmail.com', 'r123', '2019-02-06', '', 0, 0),
(10, 4, 9, 1, 2, 'priya', '4, shriji nivas', '6304291949', 'priya@gmail.com', '123', '2019-02-09', '', 0, 1);

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
  ADD PRIMARY KEY (`A_Code`),
  ADD KEY `City_Id` (`City_Id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Cat_Id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`City_Id`);

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
  ADD KEY `Cat_Id` (`Cat_Id`),
  ADD KEY `User_Id` (`User_Id`),
  ADD KEY `A_Code` (`A_Code`);

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
  ADD KEY `House_Id` (`House_Id`),
  ADD KEY `User_Id` (`User_Id`),
  ADD KEY `A_Code` (`A_Code`);

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
-- Indexes for table `tiffin_service`
--
ALTER TABLE `tiffin_service`
  ADD PRIMARY KEY (`TS_Id`),
  ADD KEY `A_Code` (`A_Code`);

--
-- Indexes for table `tiffin_service_booking`
--
ALTER TABLE `tiffin_service_booking`
  ADD PRIMARY KEY (`TSBook_Id`),
  ADD KEY `User_Id` (`User_Id`),
  ADD KEY `TSPackage_Id` (`TSPackage_Id`),
  ADD KEY `A_Code` (`A_Code`);

--
-- Indexes for table `tiffin_service_package`
--
ALTER TABLE `tiffin_service_package`
  ADD PRIMARY KEY (`TSPackage_Id`),
  ADD KEY `Food_Id` (`Food_Id`);

--
-- Indexes for table `user1`
--
ALTER TABLE `user1`
  ADD PRIMARY KEY (`User_Id`),
  ADD KEY `MPackage_Id` (`MPackage_Id`),
  ADD KEY `user1_ibfk_1` (`Role_Id`),
  ADD KEY `A_Code` (`A_Code`),
  ADD KEY `City_Id` (`City_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `App_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `A_Code` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Cat_Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `City_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `Com_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `Contact_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `Facility_Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `Feed_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `Food_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `house`
--
ALTER TABLE `house`
  MODIFY `House_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `house_booking`
--
ALTER TABLE `house_booking`
  MODIFY `HBook_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `house_facility`
--
ALTER TABLE `house_facility`
  MODIFY `House_Facility_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `house_images`
--
ALTER TABLE `house_images`
  MODIFY `Img_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `membership_package`
--
ALTER TABLE `membership_package`
  MODIFY `MPackage_Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `Role_Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tiffin_service`
--
ALTER TABLE `tiffin_service`
  MODIFY `TS_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tiffin_service_booking`
--
ALTER TABLE `tiffin_service_booking`
  MODIFY `TSBook_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tiffin_service_package`
--
ALTER TABLE `tiffin_service_package`
  MODIFY `TSPackage_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user1`
--
ALTER TABLE `user1`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- Constraints for table `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `area_ibfk_1` FOREIGN KEY (`City_Id`) REFERENCES `city` (`City_Id`);

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
  ADD CONSTRAINT `house_ibfk_1` FOREIGN KEY (`Cat_Id`) REFERENCES `category` (`Cat_Id`),
  ADD CONSTRAINT `house_ibfk_2` FOREIGN KEY (`User_Id`) REFERENCES `user1` (`User_Id`),
  ADD CONSTRAINT `house_ibfk_3` FOREIGN KEY (`A_Code`) REFERENCES `area` (`A_Code`);

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
  ADD CONSTRAINT `house_facility_ibfk_2` FOREIGN KEY (`House_Id`) REFERENCES `house` (`House_Id`),
  ADD CONSTRAINT `house_facility_ibfk_3` FOREIGN KEY (`User_Id`) REFERENCES `user1` (`User_Id`),
  ADD CONSTRAINT `house_facility_ibfk_4` FOREIGN KEY (`A_Code`) REFERENCES `area` (`A_Code`);

--
-- Constraints for table `house_images`
--
ALTER TABLE `house_images`
  ADD CONSTRAINT `house_images_ibfk_1` FOREIGN KEY (`House_Id`) REFERENCES `house` (`House_Id`);

--
-- Constraints for table `tiffin_service`
--
ALTER TABLE `tiffin_service`
  ADD CONSTRAINT `tiffin_service_ibfk_1` FOREIGN KEY (`A_Code`) REFERENCES `area` (`A_Code`);

--
-- Constraints for table `tiffin_service_booking`
--
ALTER TABLE `tiffin_service_booking`
  ADD CONSTRAINT `tiffin_service_booking_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `user1` (`User_Id`),
  ADD CONSTRAINT `tiffin_service_booking_ibfk_2` FOREIGN KEY (`TSPackage_Id`) REFERENCES `tiffin_service_package` (`TSPackage_Id`),
  ADD CONSTRAINT `tiffin_service_booking_ibfk_3` FOREIGN KEY (`A_Code`) REFERENCES `area` (`A_Code`);

--
-- Constraints for table `tiffin_service_package`
--
ALTER TABLE `tiffin_service_package`
  ADD CONSTRAINT `tiffin_service_package_ibfk_1` FOREIGN KEY (`Food_Id`) REFERENCES `food` (`Food_Id`);

--
-- Constraints for table `user1`
--
ALTER TABLE `user1`
  ADD CONSTRAINT `user1_ibfk_1` FOREIGN KEY (`Role_Id`) REFERENCES `role` (`Role_Id`),
  ADD CONSTRAINT `user1_ibfk_2` FOREIGN KEY (`MPackage_Id`) REFERENCES `membership_package` (`MPackage_Id`),
  ADD CONSTRAINT `user1_ibfk_3` FOREIGN KEY (`A_Code`) REFERENCES `area` (`A_Code`),
  ADD CONSTRAINT `user1_ibfk_4` FOREIGN KEY (`City_Id`) REFERENCES `city` (`City_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
