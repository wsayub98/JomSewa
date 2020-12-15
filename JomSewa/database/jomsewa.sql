-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2019 at 09:01 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jomsewa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `user`, `pass`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `BookingID` int(11) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `driver` varchar(100) NOT NULL,
  `payment` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `distance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`BookingID`, `destination`, `driver`, `payment`, `point`, `distance`) VALUES
(43, 'Gambang(UMP)-Kuantan', 'ali', 10, 2, 32),
(45, 'Gambang(UMP)-Kuantan', 'ali', 10, 2, 32),
(46, 'Gambang(UMP)-Teluk Cempedak', 'Yasmeen', 15, 2, 55),
(47, 'Gambang(UMP)-Pekan(UMP)', 'ali', 30, 2, 323),
(48, 'Gambang(UMP)-Kuantan', 'ali', 10, 2, 32),
(49, 'Gambang(UMP)-Kuantan', 'ali', 10, 2, 32),
(50, 'Gambang(UMP)-Kuantan', 'Yasmeen', 10, 2, 32);

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

CREATE TABLE `destination` (
  `destinationID` int(11) NOT NULL,
  `place` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `distance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `destination`
--

INSERT INTO `destination` (`destinationID`, `place`, `price`, `point`, `distance`) VALUES
(1, 'Gambang(UMP)-Kuantan', 10, 2, 32),
(2, 'Gambang(UMP)-Pekan(UMP)', 30, 2, 323),
(3, 'Gambang(UMP)-Teluk Cempedak', 15, 2, 55);

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `DriverID` int(11) NOT NULL,
  `DriverName` varchar(100) NOT NULL,
  `DriverEmail` varchar(100) NOT NULL,
  `DriverPass` varchar(50) NOT NULL,
  `DriverGender` varchar(20) NOT NULL,
  `DriverServices` varchar(100) NOT NULL,
  `DriverImage` varchar(100) NOT NULL,
  `places` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`DriverID`, `DriverName`, `DriverEmail`, `DriverPass`, `DriverGender`, `DriverServices`, `DriverImage`, `places`) VALUES
(1, 'abu', 'abu@gmail.com', 'abu123', 'm', 'hailingservices', 'Untitled Diagram.jpg', 'Gambang(UMP)-Kuantan'),
(3, 'ali', 'ali@gmail.com', 'ali', 'm', 'cab', 'image', ''),
(7, 'ahmad', 'ahmad@gmail.com', 'ahmad', 'm', 'fooddeliver,hailservice', 'imageName', ''),
(14, 'ameera', 'ameera@gmail.com', 'a24d58da12f36d08ed99f34437036cda', 'f', 'fooddeliver', 'Wedhome.jpg', ''),
(23, 'Yasmeen', 'niki@gmail.com', '202cb962ac59075b964b07152d234b70', 'f', 'cab', 'Untitled Diagram.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `user`, `subject`, `Description`, `Date`) VALUES
(6, 'niki@gmail.com', 'adfdfdfdfd', 'bbbbbbbb', '2016-07-31 15:38:35'),
(7, 'ravi@gmail.com', 'adfdfdfdfd', 'aaaaaaaaaaaaaa', '2016-07-31 15:38:35'),
(8, 'ravi@gmail.com', 'hi', 'yo', '2019-05-03 13:51:04'),
(9, 'ravi@gmail.com', 'hi', 'dsfsddfdss', '2019-05-03 23:00:40'),
(10, 'abhi@gmail.com', 'hi', 'dsfsddfdss', '2019-05-03 23:00:41');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `AppID` int(11) NOT NULL,
  `AppName` varchar(100) NOT NULL,
  `AppEmail` varchar(100) NOT NULL,
  `AppPass` varchar(50) NOT NULL,
  `AppGender` varchar(20) NOT NULL,
  `AppServices` varchar(100) NOT NULL,
  `AppImage` varchar(100) NOT NULL,
  `RegID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`AppID`, `AppName`, `AppEmail`, `AppPass`, `AppGender`, `AppServices`, `AppImage`, `RegID`) VALUES
(8, 'abu', 'abu@gmail.com', 'abu', 'm', 'fooddeliver,hailservice', 'imageName', 2147483647),
(9, 'abu', 'abu@gmail.com', 'abu', 'm', 'hailservice', 'imageName', 2147483647),
(12, 'ali', 'ali@gmail.com', '86318e52f5ed4801abe1d13d509443de', 'm', 'fooddeliver', 'Birthhome.jpg', 2147483647),
(15, 'meen', 'meen@gmail.com', 'cd9932a3c541b4e89c992983bd84c537', 'f', 'fooddeliver', 'bdayevent.jpg', 2147483647),
(16, 'meen', 'meen@gmail.com', 'cd9932a3c541b4e89c992983bd84c537', 'f', 'fooddeliver', 'bdayevent.jpg', 2147483647),
(17, 'meen', 'meen@gmail.com', 'cd9932a3c541b4e89c992983bd84c537', 'f', 'fooddeliver', 'bdayevent.jpg', 2147483647),
(18, 'meen', 'meen@gmail.com', 'cd9932a3c541b4e89c992983bd84c537', 'f', 'fooddeliver', 'bdayevent.jpg', 2147483647),
(19, 'hiu', 'meerasyh98@gmail.com', '7815696ecbf1c96e6894b779456d330e', 'f', 'fooddeliver', 'B.jpg', 2147483647),
(20, 'qwe', 'qwe@gmail.com', '76d80224611fc919a5d54f0ff9fba446', 'm', 'fooddeliver', 'C.jpg', 2147483647),
(21, 'qwe', 'qwe@gmail.com', '76d80224611fc919a5d54f0ff9fba446', 'm', 'fooddeliver', 'C.jpg', 2147483647),
(22, 'Yasmeen', 'niki@gmail.com', '202cb962ac59075b964b07152d234b70', 'f', 'cab', 'Untitled Diagram.jpg', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` char(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `mobile` bigint(11) NOT NULL,
  `gender` varchar(40) NOT NULL,
  `services` varchar(40) NOT NULL,
  `image` varchar(50) NOT NULL,
  `dob` datetime NOT NULL,
  `regid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `pass`, `mobile`, `gender`, `services`, `image`, `dob`, `regid`) VALUES
(14, 'aiman', 'aiman@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1239999, 'm', 'readin,social_media', 'pexels-photo-716398.jpeg', '1966-10-16 00:00:00', 2147483647),
(15, 'niki', 'niki@gmail.com', '94197c2d4366aefb3cd8c84b862c9702', 123456789, 'f', 'Newspaper/Print', 'b03.jpg', '1962-07-05 00:00:00', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `VehicleID` int(11) NOT NULL,
  `CarType` varchar(100) NOT NULL,
  `CarManufacturer` varchar(100) NOT NULL,
  `CarModel` varchar(100) NOT NULL,
  `CarRtx` date NOT NULL,
  `CarImg` varchar(50) NOT NULL,
  `DriverID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`VehicleID`, `CarType`, `CarManufacturer`, `CarModel`, `CarRtx`, `CarImg`, `DriverID`) VALUES
(2, 'SUV', 'Perodua', 'Aruz', '2019-10-18', 's1000.jpg', 'syahmi@gmail.com'),
(3, 'SUV', 'Perodua', 'Aruz', '2020-11-06', 's1000.jpg', 'niki@gmail.com'),
(4, 'SUV', 'Perodua', 'Aruz', '1968-03-20', 'Untitled Diagram.jpg', 'abu@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `vehicleinfo`
--

CREATE TABLE `vehicleinfo` (
  `InfoID` int(11) NOT NULL,
  `Proof` varchar(50) NOT NULL,
  `LastService` date NOT NULL,
  `DriverID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicleinfo`
--

INSERT INTO `vehicleinfo` (`InfoID`, `Proof`, `LastService`, `DriverID`) VALUES
(7, '2.png', '1968-11-19', '0'),
(9, '2.png', '1968-11-19', 'niki@gmail.com'),
(11, 'Untitled Diagram.jpg', '2020-11-23', 'abu@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`BookingID`);

--
-- Indexes for table `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`destinationID`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`DriverID`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`AppID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);
ALTER TABLE `user` ADD FULLTEXT KEY `name` (`name`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`VehicleID`);

--
-- Indexes for table `vehicleinfo`
--
ALTER TABLE `vehicleinfo`
  ADD PRIMARY KEY (`InfoID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `BookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `DriverID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `AppID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `VehicleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicleinfo`
--
ALTER TABLE `vehicleinfo`
  MODIFY `InfoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
