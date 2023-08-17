-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2023 at 10:00 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `urojahaj`
--

-- --------------------------------------------------------

--
-- Table structure for table `admindetails`
--

CREATE TABLE `admindetails` (
  `adminID` int(10) NOT NULL,
  `profilePhoto` text DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `countryOfResidence` varchar(255) DEFAULT NULL,
  `contactNumber` varchar(15) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` enum('Active Now','Offline Now') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admindetails`
--

INSERT INTO `admindetails` (`adminID`, `profilePhoto`, `firstName`, `lastName`, `dateOfBirth`, `countryOfResidence`, `contactNumber`, `email`, `status`) VALUES
(1, 'Screenshot 2023-05-02 060409.png', 'Fahim', 'Wayez', '2023-07-05', '18 zakir hossain road', '+8801886827811', 'fahimwayez@gmail.com', 'Offline Now'),
(2, 'nuzhat.jpg', 'Nuzhatul', 'Amin', NULL, NULL, NULL, 'nuzhat@gmail.com', 'Offline Now'),
(3, 'rahat.jpg', 'Hasnain', 'Rahat', NULL, NULL, NULL, 'rahat@gmail.com', 'Offline Now'),
(4, 'alaminSir.jpg', 'Al', 'Amin', NULL, NULL, NULL, 'alamin@gmail.com', 'Active Now');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingReference` int(10) NOT NULL,
  `flightID` int(11) NOT NULL,
  `seatType` enum('Economy','Business') NOT NULL,
  `seatNumber` varchar(5) NOT NULL,
  `status` enum('Booked','Issued','Cancelled') NOT NULL,
  `boardingAirport` enum('Abu Dhabi International Airport (AUH)','Barcelona Airport (BCN)','Beijing Airport (PEK)','Buenos Aires Airport (BUE)','Cambridge Airport (CBG)','Shah Amanat International Airport, Chattogram (CGP)','Chicago International Airport (CHI)','Hazrat Shahjalal International Airport, Dhaka (DAC)','Doha International Airport (DOH)','London Airport (LON)','Rosario Airport (ROS)','Madrid Airport (MAD)','Manchester Airport (MAN)','Shanghai International Airport (SHA)','Osmani International Airport, Sylhet (ZYL)') NOT NULL,
  `dSchedule` date NOT NULL,
  `tSchedule` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingReference`, `flightID`, `seatType`, `seatNumber`, `status`, `boardingAirport`, `dSchedule`, `tSchedule`) VALUES
(1234, 1, 'Economy', 'A23', 'Booked', 'Abu Dhabi International Airport (AUH)', '2023-07-04', '23:16:53.000000');

-- --------------------------------------------------------

--
-- Table structure for table `customerdetails`
--

CREATE TABLE `customerdetails` (
  `customerID` int(10) NOT NULL,
  `title` enum('Mr.','Mrs.','He','Miss','Hrh','Dr.','Prof.','Sheikh','Sheikha','Baron','Barones','Captain','Colonel','General','Lady','Lord','Master','Sir') DEFAULT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `contactNumber` varchar(15) DEFAULT NULL,
  `countryOfResidence` varchar(255) DEFAULT NULL,
  `miles` int(10) UNSIGNED NOT NULL DEFAULT 500,
  `profilePhoto` text DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `passportNumber` varchar(255) DEFAULT NULL,
  `passportExpiryDate` date DEFAULT NULL,
  `nationalIDNumber` varchar(255) DEFAULT NULL,
  `favoriteHolidayPreference` varchar(255) DEFAULT NULL,
  `favoriteDestination` varchar(255) DEFAULT NULL,
  `favoriteAirport` varchar(255) DEFAULT NULL,
  `preferredSeat` varchar(10) DEFAULT NULL,
  `paymentID` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customerdetails`
--

INSERT INTO `customerdetails` (`customerID`, `title`, `firstName`, `lastName`, `dateOfBirth`, `gender`, `email`, `contactNumber`, `countryOfResidence`, `miles`, `profilePhoto`, `nationality`, `passportNumber`, `passportExpiryDate`, `nationalIDNumber`, `favoriteHolidayPreference`, `favoriteDestination`, `favoriteAirport`, `preferredSeat`, `paymentID`) VALUES
(1, NULL, 'Fahim', 'Wayez', '2023-07-04', NULL, 'fahimwayez1@gmail.com', '+8801739353505', 'Bangladesh', 500, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, 'Fahim', 'Wayez', NULL, NULL, 'fahimwayez2312@gmail.com', NULL, NULL, 500, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, 'Ratul ', 'Ratul', NULL, NULL, 'ratul@gmail.com', NULL, NULL, 500, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, NULL, 'Ratul', 'Ratul', NULL, NULL, 'newidratul@gmail.com', NULL, NULL, 500, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employeedetails`
--

CREATE TABLE `employeedetails` (
  `employeeID` int(10) UNSIGNED ZEROFILL NOT NULL,
  `title` enum('Mr.','Mrs,','He','Miss') NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `dateOfBirth` date NOT NULL,
  `contactNumber` varchar(15) NOT NULL,
  `emergencyContactNumber` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `questionID` int(255) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `answer` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`questionID`, `question`, `answer`) VALUES
(1, 'Is an infant entitled to any baggage allowance?', 'Yes, infant fares are entitled to a checked baggage allowance of:\nRoute: Flights to and from Africa or Americas\nAll classes: One piece, not to exceed 23kg (50lb) or a maximum dimension of 115cm (45in)\n\nRoute: Flights to and from all other destinations\nAll Classes: 10kg (22lb) not to exceed a maximum dimension of 115 cm (45inc)\n\nOne stroller, collapsible carrycot, or pushchair per infant is accepted without charge.\n\nPlease note that Infants are NOT entitled for any hand baggage allowance to be carried by the accompanying adult.'),
(2, 'Can I carry Holy water (Zam-Zam) as checked baggage?', 'Up to 5 litres of Zamzam holy water per passenger (for Hajj and Umrah passengers) carried in one or several containers may be carried free of charge in addition to your applicable baggage allowance.\r\n\r\nContainers in excess i.e. more than 5 litres will be charged as excess baggage.\r\n\r\nNote: Additionally, each passenger may carry a container of not more than 100 ml in the aircraft cabin as hand luggage.'),
(3, 'What is my carry on baggage allowance?', 'Hand baggage allowance:\n\nBusiness Class:  Two pieces, not to exceed 15 kg and 50x37x25 cm\n\nEconomy Class: One piece, not to exceed 7 kg and 50x37x25 cm,  Flights to and from Brazil allows one piece, not to exceed 10kg (22lb)\n\nIn addition to your hand baggage allowance, you can also carry personal items such as one ladies handbag or one small briefcase, one coat, cape or blanket, one umbrella, one pair of crutches or walking stick, one small camera or binoculars, limited reading material, an infant’s carrying basket, and duty free items purchased on the day of your flight.\nLaptops and laptop bags have to fit within your hand baggage allowance.'),
(4, 'What is the policy on personal wheelchair?', 'Wheelchairs are available for use at all airport locations and can help in transferring you from one point to the other within the airport throughout your journey. You may submit a special service request for a wheelchair at the time of booking or through the \'Manage Booking\' feature online, or by contacting your local Qatar Airways office at least 48 hours prior to departure.\r\n\r\nIf you intend to travel with your own wheelchair or use other mobility aid then please inform us either at the seat booking stage or after you have made your booking. We will carry your wheelchair or mobility aid free of charge. Please see contact us page to reach out.'),
(5, 'Is it possible to carry an LCD or LED TV in my checked baggage?', 'Depending on the region of travel, each piece of checked baggage is restricted to a maximum dimension (length + width + height) of 158 cm for transatlantic flights, and 300 cm for all other flights.\r\n\r\nIf your TV fits within the dimensions and weight for the route being travelled, you may carry an LED/LCD TV as part of your checked-in luggage.\r\n\r\nFor items which fit the specified maximum size, but exceed the standard free baggage allowance mentioned on the ticket, normal excess baggage charges will be applied.\r\n\r\nNOTE: Passengers are advised to secure any fragile item like a TV with adequate packing in order to withstand the effects of normal baggage handling procedures.');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackID` int(10) UNSIGNED ZEROFILL NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `customerID` int(10) DEFAULT NULL,
  `subject` varchar(500) DEFAULT NULL,
  `feedbackMessage` mediumtext DEFAULT NULL,
  `action` enum('Forwarded','Solved','On queue','Rejected') DEFAULT NULL,
  `feedbackSubmissionTime` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedbackID`, `name`, `customerID`, `subject`, `feedbackMessage`, `action`, `feedbackSubmissionTime`) VALUES
(0000000001, 'asd', 0, 'asd', 'asdasd', 'Solved', '2023-08-03 05:33:55.000000');

-- --------------------------------------------------------

--
-- Table structure for table `flightdetails`
--

CREATE TABLE `flightdetails` (
  `flightID` varchar(255) NOT NULL,
  `fleet` enum('Airbus A350-1000','Airbus A380-800','Boeing 777-200LR','Boeing 777-300ER','Boeing 787-8','Boeing 787-9','Boeing 787-10') NOT NULL,
  `economyClassSeatsCapacity` int(10) NOT NULL,
  `economyClassSeatsFare` int(10) NOT NULL,
  `businessClassSeatsCapacity` int(10) NOT NULL,
  `businessClassSeatsFare` int(10) NOT NULL,
  `routeID` int(10) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flightdetails`
--

INSERT INTO `flightdetails` (`flightID`, `fleet`, `economyClassSeatsCapacity`, `economyClassSeatsFare`, `businessClassSeatsCapacity`, `businessClassSeatsFare`, `routeID`) VALUES
('1', 'Airbus A350-1000', 312, 50000, 444, 20000, 0000000001);

-- --------------------------------------------------------

--
-- Table structure for table `flightstatus`
--

CREATE TABLE `flightstatus` (
  `flightID` varchar(255) NOT NULL,
  `scheduleTime` time(6) NOT NULL,
  `destinationPoint` enum('Abu Dhabi (AUH)','Barcelona (BCN)','Beijing (PEK)','Buenos Aires (BUE)','Cambridge (CBG)','Chattogram (CGP)','Chicago (CHI)','Dhaka (DAC)','Doha (DOH)','London (LON)','Rosario (ROS)','Madrid (MAD)','Manchester (MAN)','Shanghai (SHA)','Sylhet (ZYL)') NOT NULL,
  `gate` enum('G1','G2','G3','G4','G5','G6','G7','G8','G9','G10','Wait in lounge') NOT NULL,
  `status` enum('Last Call','On time','Delayed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logincredentials`
--

CREATE TABLE `logincredentials` (
  `userID` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logincredentials`
--

INSERT INTO `logincredentials` (`userID`, `type`, `firstName`, `lastName`, `email`, `password`) VALUES
(1, 'Admin', 'Fahim', 'Wayez', 'fahimwayez@gmail.com', 'IdklpC4567'),
(2, 'Admin', 'Nuzhatul', 'Amin', 'nuzhat@gmail.com', 'Qx}kdwC4567'),
(3, 'Admin', 'Hasnain', 'Rahat', 'rahat@gmail.com', 'UdkdwC4567'),
(4, 'Admin', 'Al', 'Amin', 'alamin@gmail.com', 'DodplqC4567'),
(5, 'Customer', 'Fahim', 'Wayez', 'fahimwayez1@gmail.com', 'IdklpC4567');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(10) UNSIGNED NOT NULL,
  `customerID` int(10) UNSIGNED ZEROFILL NOT NULL,
  `paymentType` enum('Card','Bkash') DEFAULT NULL,
  `cardNumber` varchar(255) DEFAULT NULL,
  `cardExpiryDate` date DEFAULT NULL,
  `cvc` int(4) DEFAULT NULL,
  `cardHolderName` varchar(255) DEFAULT NULL,
  `bKashNumber` varchar(15) DEFAULT NULL,
  `bKashPin` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentID`, `customerID`, `paymentType`, `cardNumber`, `cardExpiryDate`, `cvc`, `cardHolderName`, `bKashNumber`, `bKashPin`) VALUES
(1, 0000000001, '', '12345678', '2023-08-05', 1234, 'anha', '12345678', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `routedetails`
--

CREATE TABLE `routedetails` (
  `routeID` int(10) UNSIGNED ZEROFILL NOT NULL,
  `boardingPoint` enum('Abu Dhabi (AUH)','Barcelona (BCN)','Beijing (PEK)','Buenos Aires (BUE)','Cambridge (CBG)','Chattogram (CGP)','Chicago (CHI)','Dhaka (DAC)','Doha (DOH)','London (LON)','Rosario (ROS)','Madrid (MAD)','Manchester (MAN)','Shanghai (SHA)','Sylhet (ZYL)') NOT NULL,
  `boardingAirport` enum('Abu Dhabi International Airport (AUH)','Barcelona Airport (BCN)','Beijing Airport (PEK)','Buenos Aires Airport (BUE)','Cambridge Airport (CBG)','Shah Amanat International Airport, Chattogram (CGP)','Chicago International Airport (CHI)','Hazrat Shahjalal International Airport, Dhaka (DAC)','Doha International Airport (DOH)','London Airport (LON)','Rosario Airport (ROS)','Madrid Airport (MAD)','Manchester Airport (MAN)','Shanghai International Airport (SHA)','Osmani International Airport, Sylhet (ZYL)') NOT NULL,
  `destinationPoint` enum('Abu Dhabi (AUH)','Barcelona (BCN)','Beijing (PEK)','Buenos Aires (BUE)','Cambridge (CBG)','Chattogram (CGP)','Chicago (CHI)','Dhaka (DAC)','Doha (DOH)','London (LON)','Rosario (ROS)','Madrid (MAD)','Manchester (MAN)','Shanghai (SHA)','Sylhet (ZYL)') NOT NULL,
  `destinationAirport` enum('Abu Dhabi International Airport (AUH)','Barcelona Airport (BCN)','Beijing Airport (PEK)','Buenos Aires Airport (BUE)','Cambridge Airport (CBG)','Shah Amanat International Airport, Chattogram (CGP)','Chicago International Airport (CHI)','Hazrat Shahjalal International Airport, Dhaka (DAC)','Doha International Airport (DOH)','London Airport (LON)','Rosario Airport (ROS)','Madrid Airport (MAD)','Manchester Airport (MAN)','Shanghai International Airport (SHA)','Osmani International Airport, Sylhet (ZYL)') NOT NULL,
  `tripType` enum('One way','Return') NOT NULL,
  `dSchedule` date NOT NULL,
  `tSchedule` time(6) NOT NULL,
  `rDSchedule` date DEFAULT NULL,
  `rTSchedule` time(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `routedetails`
--

INSERT INTO `routedetails` (`routeID`, `boardingPoint`, `boardingAirport`, `destinationPoint`, `destinationAirport`, `tripType`, `dSchedule`, `tSchedule`, `rDSchedule`, `rTSchedule`) VALUES
(0000000002, '', '', '', '', '', '2023-08-04', '00:00:00.000000', '0000-00-00', '00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `urochithi`
--

CREATE TABLE `urochithi` (
  `messageID` int(11) NOT NULL,
  `senderID` int(11) NOT NULL,
  `receiverID` int(11) NOT NULL,
  `messageContent` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admindetails`
--
ALTER TABLE `admindetails`
  ADD PRIMARY KEY (`adminID`),
  ADD UNIQUE KEY `userName` (`email`),
  ADD UNIQUE KEY `contactNumber` (`contactNumber`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingReference`),
  ADD UNIQUE KEY `seatNumber` (`seatNumber`);

--
-- Indexes for table `customerdetails`
--
ALTER TABLE `customerdetails`
  ADD PRIMARY KEY (`customerID`),
  ADD UNIQUE KEY `userName` (`email`),
  ADD UNIQUE KEY `paymentID` (`paymentID`),
  ADD UNIQUE KEY `passportNumber` (`passportNumber`),
  ADD UNIQUE KEY `nationalIDNumber` (`nationalIDNumber`);

--
-- Indexes for table `employeedetails`
--
ALTER TABLE `employeedetails`
  ADD PRIMARY KEY (`employeeID`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`questionID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackID`);

--
-- Indexes for table `flightdetails`
--
ALTER TABLE `flightdetails`
  ADD PRIMARY KEY (`flightID`);

--
-- Indexes for table `flightstatus`
--
ALTER TABLE `flightstatus`
  ADD KEY `FOREIGN` (`flightID`);

--
-- Indexes for table `logincredentials`
--
ALTER TABLE `logincredentials`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userName` (`email`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `routedetails`
--
ALTER TABLE `routedetails`
  ADD PRIMARY KEY (`routeID`);

--
-- Indexes for table `urochithi`
--
ALTER TABLE `urochithi`
  ADD PRIMARY KEY (`messageID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admindetails`
--
ALTER TABLE `admindetails`
  MODIFY `adminID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customerdetails`
--
ALTER TABLE `customerdetails`
  MODIFY `customerID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employeedetails`
--
ALTER TABLE `employeedetails`
  MODIFY `employeeID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123124;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `questionID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `logincredentials`
--
ALTER TABLE `logincredentials`
  MODIFY `userID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `urochithi`
--
ALTER TABLE `urochithi`
  MODIFY `messageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `flightstatus`
--
ALTER TABLE `flightstatus`
  ADD CONSTRAINT `FOREIGN` FOREIGN KEY (`flightID`) REFERENCES `flightdetails` (`flightID`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
