-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 11, 2022 at 01:20 PM
-- Server version: 5.7.32-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kevin`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `national_id_number` varchar(9) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `date_of_birth` date NOT NULL,
  `place_of_birth` varchar(50) NOT NULL,
  `home_address` varchar(255) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `home_telephone` int(15) NOT NULL,
  `work_telephone` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`national_id_number`, `first_name`, `surname`, `date_of_birth`, `place_of_birth`, `home_address`, `email_address`, `home_telephone`, `work_telephone`) VALUES
('F01234567', 'Kevin', 'Gonzalez', '1999-12-11', 'Gibraltar', '15 Test Address', 'testEmail@gmail.com', 20045213, 20099883),
('F1231230', 'User', 'Test', '2000-01-01', 'Gibraltar', '10 Test User Lane', 'UserTestEmail@gmail.com', 20012345, 54012233);

-- --------------------------------------------------------

--
-- Table structure for table `customer_document_requests`
--

CREATE TABLE `customer_document_requests` (
  `document_request_id` int(11) NOT NULL,
  `national_id_number` varchar(9) NOT NULL,
  `document_type` varchar(30) NOT NULL,
  `completed_request` varchar(5) NOT NULL,
  `document_fees` double(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_document_requests`
--

INSERT INTO `customer_document_requests` (`document_request_id`, `national_id_number`, `document_type`, `completed_request`, `document_fees`) VALUES
(5, 'F01234567', 'Learners Licence: B', 'No', 15.00),
(6, 'F01234567', 'Learners Licence: B', 'False', 15.00),
(7, 'F01234567', 'Learners Licence: B', 'False', 15.00),
(8, 'F1231230', 'Learners Licence: B', 'False', 15.00);

-- --------------------------------------------------------

--
-- Table structure for table `customer_log_in_details`
--

CREATE TABLE `customer_log_in_details` (
  `log_in_id` int(11) NOT NULL,
  `national_id_number` varchar(9) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_log_in_details`
--

INSERT INTO `customer_log_in_details` (`log_in_id`, `national_id_number`, `password`) VALUES
(1, 'F01234567', 'test'),
(3, 'F1231230', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `customer_practical_bookings_test_details`
--

CREATE TABLE `customer_practical_bookings_test_details` (
  `test_details_id` int(11) NOT NULL,
  `national_id_number` varchar(9) DEFAULT NULL,
  `test_type` varchar(9) DEFAULT NULL,
  `test_category` varchar(30) DEFAULT NULL,
  `test_date` date NOT NULL,
  `test_time` time NOT NULL,
  `test_fees` double(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_practical_bookings_test_details`
--

INSERT INTO `customer_practical_bookings_test_details` (`test_details_id`, `national_id_number`, `test_type`, `test_category`, `test_date`, `test_time`, `test_fees`) VALUES
(26, 'F01234567', 'Practical', 'A', '2022-03-18', '09:00:00', 43.00),
(27, 'F01234567', 'Practical', 'C', '2022-03-18', '12:00:00', 75.00),
(28, NULL, NULL, NULL, '2022-03-31', '09:00:00', NULL),
(29, 'F01234567', 'Practical', 'A', '2022-03-31', '10:00:00', 43.00),
(30, 'F01234567', 'Practical', 'B', '2022-03-31', '11:00:00', 43.00),
(31, 'F1231230', 'Practical', 'B', '2022-03-31', '12:00:00', 43.00),
(32, NULL, NULL, NULL, '2022-03-31', '13:00:00', NULL),
(33, NULL, NULL, NULL, '2022-03-31', '14:00:00', NULL),
(34, NULL, NULL, NULL, '2022-03-31', '15:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_theory_bookings_test_details`
--

CREATE TABLE `customer_theory_bookings_test_details` (
  `test_details_id` int(11) NOT NULL,
  `national_id_number` varchar(9) DEFAULT NULL,
  `test_type` varchar(20) DEFAULT NULL,
  `test_category` varchar(20) DEFAULT NULL,
  `test_date` date NOT NULL,
  `test_time` time NOT NULL,
  `test_fees` double(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_theory_bookings_test_details`
--

INSERT INTO `customer_theory_bookings_test_details` (`test_details_id`, `national_id_number`, `test_type`, `test_category`, `test_date`, `test_time`, `test_fees`) VALUES
(2, 'F01234567', 'Case Study', 'C + D', '2022-03-18', '09:00:00', 40.00),
(3, 'F01234567', 'Theory', 'C + D', '2022-03-18', '09:00:00', 40.00),
(4, NULL, NULL, NULL, '2022-03-18', '09:00:00', NULL),
(5, NULL, NULL, NULL, '2022-03-18', '09:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `document_payment_details`
--

CREATE TABLE `document_payment_details` (
  `payment_id` int(11) NOT NULL,
  `document_request_id` int(11) NOT NULL,
  `card_name` varchar(100) NOT NULL,
  `card_number` int(16) NOT NULL,
  `card_expiry_date` varchar(5) NOT NULL,
  `card_security_code` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document_payment_details`
--

INSERT INTO `document_payment_details` (`payment_id`, `document_request_id`, `card_name`, `card_number`, `card_expiry_date`, `card_security_code`) VALUES
(4, 5, 'Testing', 1234567, '23/34', 123),
(5, 6, 'Testing', 1234567, '23/34', 123),
(6, 7, 'Dennis B', 1234, '123', 0),
(7, 8, 'test', 91827439, '23-24', 432);

-- --------------------------------------------------------

--
-- Table structure for table `duplicate_documents_payment_details`
--

CREATE TABLE `duplicate_documents_payment_details` (
  `payment_id` int(11) NOT NULL,
  `document_request_id` int(11) NOT NULL,
  `card_name` varchar(100) NOT NULL,
  `card_number` int(16) NOT NULL,
  `card_expiry_date` varchar(5) NOT NULL,
  `card_security_code` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `duplicate_documents_payment_details`
--

INSERT INTO `duplicate_documents_payment_details` (`payment_id`, `document_request_id`, `card_name`, `card_number`, `card_expiry_date`, `card_security_code`) VALUES
(1, 9, 'Testing', 1234567, '12/12', 111);

-- --------------------------------------------------------

--
-- Table structure for table `duplicate_documents_requests`
--

CREATE TABLE `duplicate_documents_requests` (
  `duplicate_documents_id` int(11) NOT NULL,
  `national_id_number` varchar(9) NOT NULL,
  `document_type` varchar(30) NOT NULL,
  `vehicle_registration` varchar(10) NOT NULL,
  `reason_for_duplicate` varchar(30) NOT NULL,
  `duplication_fees` double(5,2) NOT NULL,
  `completed_request` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `duplicate_documents_requests`
--

INSERT INTO `duplicate_documents_requests` (`duplicate_documents_id`, `national_id_number`, `document_type`, `vehicle_registration`, `reason_for_duplicate`, `duplication_fees`, `completed_request`) VALUES
(3, 'F01234567', 'roadworthiness', 'G1234', 'Stolen', 22.00, 'False'),
(4, 'F01234567', 'roadworthiness', 'G1234', 'Missing', 22.00, 'False'),
(5, 'F01234567', 'roadworthiness', 'G1234', 'Missing', 22.00, 'False'),
(6, 'F01234567', 'roadworthiness', 'G1234', 'Missing', 22.00, 'False'),
(7, 'F01234567', 'registration', 'G1234', 'Missing', 25.00, 'False'),
(8, 'F01234567', 'registration', 'G1234', 'Missing', 25.00, 'False'),
(9, 'F01234567', 'registration', 'G1234', 'Missing', 25.00, 'False');

-- --------------------------------------------------------

--
-- Table structure for table `practical_booking_payment_details`
--

CREATE TABLE `practical_booking_payment_details` (
  `payment_id` int(11) NOT NULL,
  `test_details_id` int(11) NOT NULL,
  `card_name` varchar(100) NOT NULL,
  `card_number` int(16) NOT NULL,
  `card_expiry_date` varchar(5) NOT NULL,
  `card_security_code` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `practical_booking_payment_details`
--

INSERT INTO `practical_booking_payment_details` (`payment_id`, `test_details_id`, `card_name`, `card_number`, `card_expiry_date`, `card_security_code`) VALUES
(24, 26, 'Testing', 12345678, '12/12', 123),
(26, 27, 'Testing', 1234567, '12/23', 123),
(27, 30, 'Testing', 12345678, '11/12', 123),
(28, 29, 'Dennis Bautista', 1234, '123', 0),
(29, 31, 'test', 1092947, '03-25', 85);

-- --------------------------------------------------------

--
-- Table structure for table `theory_booking_payment_details`
--

CREATE TABLE `theory_booking_payment_details` (
  `payment_id` int(11) NOT NULL,
  `test_details_id` int(11) NOT NULL,
  `card_name` varchar(100) NOT NULL,
  `card_number` int(16) NOT NULL,
  `card_expiry_date` varchar(5) NOT NULL,
  `card_security_code` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theory_booking_payment_details`
--

INSERT INTO `theory_booking_payment_details` (`payment_id`, `test_details_id`, `card_name`, `card_number`, `card_expiry_date`, `card_security_code`) VALUES
(1, 3, 'Testing', 1234567, '12/12', 123);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`national_id_number`),
  ADD UNIQUE KEY `national_id_number` (`national_id_number`);

--
-- Indexes for table `customer_document_requests`
--
ALTER TABLE `customer_document_requests`
  ADD PRIMARY KEY (`document_request_id`),
  ADD KEY `national_id_number` (`national_id_number`);

--
-- Indexes for table `customer_log_in_details`
--
ALTER TABLE `customer_log_in_details`
  ADD PRIMARY KEY (`log_in_id`),
  ADD UNIQUE KEY `national_id_number` (`national_id_number`);

--
-- Indexes for table `customer_practical_bookings_test_details`
--
ALTER TABLE `customer_practical_bookings_test_details`
  ADD PRIMARY KEY (`test_details_id`),
  ADD KEY `national_id_number` (`national_id_number`);

--
-- Indexes for table `customer_theory_bookings_test_details`
--
ALTER TABLE `customer_theory_bookings_test_details`
  ADD PRIMARY KEY (`test_details_id`),
  ADD KEY `national_id_number` (`national_id_number`);

--
-- Indexes for table `document_payment_details`
--
ALTER TABLE `document_payment_details`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `document_request_id` (`document_request_id`);

--
-- Indexes for table `duplicate_documents_payment_details`
--
ALTER TABLE `duplicate_documents_payment_details`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `document_request_id` (`document_request_id`);

--
-- Indexes for table `duplicate_documents_requests`
--
ALTER TABLE `duplicate_documents_requests`
  ADD PRIMARY KEY (`duplicate_documents_id`),
  ADD KEY `national_id_number` (`national_id_number`);

--
-- Indexes for table `practical_booking_payment_details`
--
ALTER TABLE `practical_booking_payment_details`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `test_details_id` (`test_details_id`);

--
-- Indexes for table `theory_booking_payment_details`
--
ALTER TABLE `theory_booking_payment_details`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `test_details_id` (`test_details_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_document_requests`
--
ALTER TABLE `customer_document_requests`
  MODIFY `document_request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `customer_log_in_details`
--
ALTER TABLE `customer_log_in_details`
  MODIFY `log_in_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `customer_practical_bookings_test_details`
--
ALTER TABLE `customer_practical_bookings_test_details`
  MODIFY `test_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `customer_theory_bookings_test_details`
--
ALTER TABLE `customer_theory_bookings_test_details`
  MODIFY `test_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `document_payment_details`
--
ALTER TABLE `document_payment_details`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `duplicate_documents_payment_details`
--
ALTER TABLE `duplicate_documents_payment_details`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `duplicate_documents_requests`
--
ALTER TABLE `duplicate_documents_requests`
  MODIFY `duplicate_documents_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `practical_booking_payment_details`
--
ALTER TABLE `practical_booking_payment_details`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `theory_booking_payment_details`
--
ALTER TABLE `theory_booking_payment_details`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_document_requests`
--
ALTER TABLE `customer_document_requests`
  ADD CONSTRAINT `customer_document_requests_ibfk_1` FOREIGN KEY (`national_id_number`) REFERENCES `customer` (`national_id_number`);

--
-- Constraints for table `customer_log_in_details`
--
ALTER TABLE `customer_log_in_details`
  ADD CONSTRAINT `customer_log_in_details_ibfk_1` FOREIGN KEY (`national_id_number`) REFERENCES `customer` (`national_id_number`);

--
-- Constraints for table `customer_practical_bookings_test_details`
--
ALTER TABLE `customer_practical_bookings_test_details`
  ADD CONSTRAINT `customer_practical_bookings_test_details_ibfk_2` FOREIGN KEY (`national_id_number`) REFERENCES `customer` (`national_id_number`);

--
-- Constraints for table `customer_theory_bookings_test_details`
--
ALTER TABLE `customer_theory_bookings_test_details`
  ADD CONSTRAINT `customer_theory_bookings_test_details_ibfk_1` FOREIGN KEY (`national_id_number`) REFERENCES `customer` (`national_id_number`);

--
-- Constraints for table `document_payment_details`
--
ALTER TABLE `document_payment_details`
  ADD CONSTRAINT `document_payment_details_ibfk_1` FOREIGN KEY (`document_request_id`) REFERENCES `customer_document_requests` (`document_request_id`);

--
-- Constraints for table `duplicate_documents_payment_details`
--
ALTER TABLE `duplicate_documents_payment_details`
  ADD CONSTRAINT `duplicate_documents_payment_details_ibfk_1` FOREIGN KEY (`document_request_id`) REFERENCES `duplicate_documents_requests` (`duplicate_documents_id`);

--
-- Constraints for table `duplicate_documents_requests`
--
ALTER TABLE `duplicate_documents_requests`
  ADD CONSTRAINT `duplicate_documents_requests_ibfk_1` FOREIGN KEY (`national_id_number`) REFERENCES `customer` (`national_id_number`);

--
-- Constraints for table `practical_booking_payment_details`
--
ALTER TABLE `practical_booking_payment_details`
  ADD CONSTRAINT `practical_booking_payment_details_ibfk_1` FOREIGN KEY (`test_details_id`) REFERENCES `customer_practical_bookings_test_details` (`test_details_id`);

--
-- Constraints for table `theory_booking_payment_details`
--
ALTER TABLE `theory_booking_payment_details`
  ADD CONSTRAINT `theory_booking_payment_details_ibfk_1` FOREIGN KEY (`test_details_id`) REFERENCES `customer_theory_bookings_test_details` (`test_details_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
