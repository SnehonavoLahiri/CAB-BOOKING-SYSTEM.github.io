-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2022 at 05:58 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customer database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Employee_ID` int(11) NOT NULL,
  `First Name` varchar(50) NOT NULL,
  `Last Name` varchar(10) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `DOB` varchar(12) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `EmailID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Employee_ID`, `First Name`, `Last Name`, `Phone`, `Gender`, `DOB`, `Password`, `EmailID`) VALUES
(1001, 'Snehonavo', 'Lahiri', '8583037615', 'Male', '17-12-2001', '85830376', 'bubanlahiri@gmail.com'),
(1002, 'Suparna', 'Mishra', '9674520381', 'Female', '18-12-2001', '96745203', 'mishra.suparna.01@gmail.com'),
(1003, 'Manab', 'Biswas', '7602683252', 'Male', '09-01-2003', '76026832', 'manabbiswas@gmail.com'),
(1004, 'Tanmay', 'Saha', '6295705931', 'Male', '20-10-2001', '62957059', 'tanmaysaha@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `Serial_No` varchar(10) NOT NULL,
  `type` varchar(20) NOT NULL,
  `cab_id` int(10) NOT NULL,
  `car_name` varchar(20) NOT NULL,
  `driver_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`Serial_No`, `type`, `cab_id`, `car_name`, `driver_id`) VALUES
('19', 'suv', 1020, 'wagonor', 2119),
('28', 'mini_sedan', 1031, 'honda_city', 2128),
('29', 'mini_sedan', 1032, 'swift_dzire', 2129),
('30', 'suv', 1033, 'xuv500', 2130),
('31', 'suv', 1034, 'xuv500', 2131),
('32', 'mini_sedan', 1035, 'indica', 2132),
('33', 'mini_sedan', 1036, 'honda_city', 2133),
('34', 'suv', 1037, 'brezza', 2134),
('35', 'mini_sedan', 1038, 'swift', 2135),
('36', 'suv', 1039, 'venue', 2136),
('37', 'suv', 1040, 'xuv500', 2137),
('38', 'mini_sedan', 1041, 'alto', 2138),
('39', 'suv', 1042, 'fortuner', 2139),
('40', 'mini_sedan', 1043, 'swift_dzire', 2140);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `EmailID` varchar(50) NOT NULL,
  `feedback` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`EmailID`, `feedback`) VALUES
('', 'The Coding Guy'),
('bubanlahiri@gmail.com', 'This is a very efficient cab service company!!'),
('bubanlahiri@gmail.com', 'I am very happy to ride with RideNow!!'),
('bubanlahiri@gmail.com', 'I am very happy to ride with RideNow!!'),
('bubanlahiri@gmail.com', 'I am very happy to ride with RideNow!!'),
('bubanlahiri@gmail.com', 'I am very happy to ride with RideNow!!'),
('bubanlahiri@gmail.com', 'I am very happy to ride with RideNow!!'),
('bubanlahiri@gmail.com', 'GNAAREEEE JAAAAAA');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `driver_id` int(5) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `EmailID` varchar(20) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Aadhar_no` varchar(14) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `DOJ` date NOT NULL,
  `type` varchar(10) NOT NULL,
  `Phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`driver_id`, `Name`, `EmailID`, `Gender`, `Aadhar_no`, `Address`, `Password`, `DOJ`, `type`, `Phone`) VALUES
(70010, 'Raghav', 'raghav@gmail.com', 'Male', '123456789876', '69/G.M.Sastri street,Kolkata', '85830376', '2022-11-11', 'mini_sedan', '9674520381'),
(70011, 'raghu', 'raghu$gmail.com', 'Male', '987654321234', '69/P.M Sastri Street,Kolkata', '12345678', '2022-11-11', 'suv', '7602683252'),
(70012, 'riya', 'riya@gmail.com', 'Female', '123456789886', '87/c.m.Sastri street,kolkata', '12345678', '2022-11-11', 'mini_sedan', '6295705931'),
(70013, 'priya', 'priya@gmai.com', 'Female', '987654321233', '60/j/k/chatterjee street,kollkata', '12345678', '2022-11-11', 'suv', '8583037615');

-- --------------------------------------------------------

--
-- Table structure for table `micro`
--

CREATE TABLE `micro` (
  `cab_id` int(7) NOT NULL,
  `pickup` varchar(70) NOT NULL,
  `dropp` varchar(70) NOT NULL,
  `time` varchar(20) NOT NULL,
  `customername` varchar(30) NOT NULL,
  `customerphone` varchar(10) NOT NULL,
  `driver_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `Name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `EmailID` varchar(50) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `DOB` varchar(10) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`Name`, `lastname`, `EmailID`, `Phone`, `Gender`, `DOB`, `Password`, `Description`) VALUES
('abhisek', 'lastName', 'abhisk@gmail.com', '1111111111', 'Male', '2022-11-13', '85830376', 'goodone'),
('trina', '', 'banerje@gmail.com', '3333333333', 'Female', '2022-11-14', '22222222', 'gir'),
('trina', '', 'banerjee@gmail.com', '3333333333', 'Female', '2022-11-14', '22222222', 'girl'),
('bon', '', 'bon@gmail.co', '2222222222', 'Female', '2022-11-14', '66666666', 'goodg'),
('bon', 'lastName', 'bon@gmail.com', '2222222222', 'Female', '2022-11-14', '85830376', 'goodgirl'),
('buban', '', 'bubanlahiri@gmail.com', '1234678425', 'Male', '2022-11-23', '92317648', 'good boy'),
('dani', '', 'dani@gmail.com', '2222222222', 'Female', '2022-12-05', '66666666', ''),
('rahul', '', 'dey@gmail.com', '98765431', 'Male', '2022-11-14', '44444444', 'techno'),
('monalisa', 'saha', 'saha@gmail.com', '9231764863', 'Female', '2022-11-14', '99999999', 'eucation'),
('Snehonavo Lahiri', '', 'snehonavo@gmail.com', '8583037615', 'Male', '2001-12-17', '98765432', 'The Coding Guy'),
('SUPARNA', '', 'suparna@gmail.com', '5555555555', 'Female', '2022-11-14', '12345678', ''),
('vai@gmail', '', 'vai@gmail', '5555555555', 'Female', '2022-11-17', '55555555', '');

-- --------------------------------------------------------

--
-- Table structure for table `suv`
--

CREATE TABLE `suv` (
  `cab_id` int(7) NOT NULL,
  `pickup` varchar(70) NOT NULL,
  `dropp` varchar(70) NOT NULL,
  `time` varchar(20) NOT NULL,
  `customername` varchar(30) NOT NULL,
  `customerphone` varchar(10) NOT NULL,
  `driver_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `view`
--

CREATE TABLE `view` (
  `Name` varchar(50) NOT NULL,
  `pickup` varchar(50) NOT NULL,
  `dropp` varchar(50) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp(),
  `time` varchar(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `book_no` int(10) NOT NULL,
  `EmailID` varchar(50) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Feedback` varchar(150) NOT NULL,
  `cab_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `view`
--

INSERT INTO `view` (`Name`, `pickup`, `dropp`, `Date`, `time`, `type`, `book_no`, `EmailID`, `Phone`, `Feedback`, `cab_id`) VALUES
('manab', 'chandannagar', 'chuchura', '2022-11-13 19:13:53', '06:53', 'mini_sedan', 1, 'bubanlahiri@gmail.com', '8583037615', '', '1001'),
('buban', 'bethua', 'rishra', '2022-11-13 23:31:22', '23:31', 'mini_sedan', 3, 'bubanlahiri@gmail.com', '8583037615', '', '1023'),
('buban', 'Serampore', 'Salt Lake Sector-5', '2022-11-19 15:17:14', '15:17', 'SUV', 8, 'bubanlahiri@gmail.com', '8697437229', '', '1017'),
('buban', 'Serampore', 'Salt Lake Sector-5', '2022-11-19 15:18:34', '15:17', 'SUV', 9, 'bubanlahiri@gmail.com', '8697437229', '', '1018'),
('buban', 'Serampore', 'Salt Lake Sector-5', '2022-11-19 16:48:33', '16:48', 'SUV', 11, 'bubanlahiri@gmail.com', '8697437229', '', '1019'),
('buban', 'Serampore', 'singapore', '2022-11-23 01:23:29', '01:23', 'mini_sedan', 12, 'bubanlahiri@gmail.com', '2121212121', '', '1030');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Employee_ID`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`cab_id`),
  ADD UNIQUE KEY `driver` (`driver_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `micro`
--
ALTER TABLE `micro`
  ADD PRIMARY KEY (`cab_id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`EmailID`);

--
-- Indexes for table `suv`
--
ALTER TABLE `suv`
  ADD PRIMARY KEY (`cab_id`);

--
-- Indexes for table `view`
--
ALTER TABLE `view`
  ADD UNIQUE KEY `BOOK_ID` (`book_no`),
  ADD KEY `EmailID` (`EmailID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Employee_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1005;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `cab_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1044;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `driver_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70014;

--
-- AUTO_INCREMENT for table `micro`
--
ALTER TABLE `micro`
  MODIFY `cab_id` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suv`
--
ALTER TABLE `suv`
  MODIFY `cab_id` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `view`
--
ALTER TABLE `view`
  MODIFY `book_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `view`
--
ALTER TABLE `view`
  ADD CONSTRAINT `view_ibfk_1` FOREIGN KEY (`EmailID`) REFERENCES `signup` (`EmailID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
