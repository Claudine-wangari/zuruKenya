-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2017 at 07:53 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sgr`
--
CREATE DATABASE IF NOT EXISTS `sgr` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sgr`;

-- --------------------------------------------------------

--
-- Table structure for table `administrative_staff`
--

CREATE TABLE `administrative_staff` (
  `staff_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `postal_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrative_staff`
--

INSERT INTO `administrative_staff` (`staff_id`, `name`, `email`, `phone_number`, `password`, `postal_address`) VALUES
(94566, 'Ian Irungu', 'ian@irungu.com', 774547567, 'f1418e035e99fb6ab826c02a29a1d6090c8c8469', '26985-00100'),
(94567, 'Claudine Wangari', 'claudine@wangari.com', 723281516, '5cec175b165e3d5e62c9e13ce848ef6feac81bff', '6575-00100'),
(54465678, 'tdfghbj', 'qwerty2@gmail.com', 774547567, '7c222fb2927d828af22f592134e8932480637c0d', '32455');

-- --------------------------------------------------------

--
-- Table structure for table `cancelled_tickets`
--

CREATE TABLE `cancelled_tickets` (
  `train_number` varchar(255) NOT NULL,
  `date_of_travel` text NOT NULL,
  `date_cancelled` text NOT NULL,
  `number_of_tickets` int(11) NOT NULL,
  `amount_made` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cancelled_tickets`
--

INSERT INTO `cancelled_tickets` (`train_number`, `date_of_travel`, `date_cancelled`, `number_of_tickets`, `amount_made`) VALUES
('TM5764569', '12/23/2017', '11/12/17', 8, 22590),
('TMN87787', '02/16/2017', '11/12/17', 10, 47565),
('TN875765', '11/18/2017', '11/12/17', 9, 37950),
('TMN6576', '01/28/2018', '11/12/17', 7, 17820),
('TMN6576', '01/28/2018', '11/14/17', 7, 25988);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id_number` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id_number`, `name`, `age`, `email`, `phone_number`) VALUES
(5678, 'rdxctfvygubh', 45, 'qwerty2@gmail.com', 2147483647),
(6548, 'John Doe', 20, 'qwertyadmin@gmail.com', 5678),
(32466, 'Kip John', 21, 'kip.john@gmail.com', 345656),
(45678, 'Jane Doe', 21, 'qwerty2@gmail.com', 2147483647),
(343210, 'Ian Irungu', 20, 'qwerty2@gmail.com', 2147483647),
(675673, 'Allan Kamau', 34, 'allan.kamau@gmail.com', 2147483647),
(918273, 'Ishmael ', 25, 'ishamel@gmail.com', 789657678),
(3344562, 'Judas Mwangi', 28, 'judas@mwangi.com', 723876354),
(12340987, 'Abraham Lincon', 37, 'abram@lincon.com', 712456765),
(27205008, 'Wahu Sylvia', 28, 'wahusylvia@yahoo.com', 711425406),
(199987263, 'James John', 36, 'james@john.com', 725676354),
(433468598, 'Dan Odhiambo', 37, 'dan@odhiambo.com', 734567876),
(987656789, 'Irish Son', 29, 'irish@son.com', 790546787);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id_number` int(11) DEFAULT NULL,
  `ticket_number` varchar(255) DEFAULT NULL,
  `train_number` varchar(255) DEFAULT NULL,
  `ticket_type` text,
  `departure_station` text,
  `destination_station` text,
  `departure_time` text,
  `arrival_time` text,
  `date` text,
  `Class` text,
  `adults` int(11) DEFAULT NULL,
  `children` int(11) DEFAULT NULL,
  `number_of_tickets` int(11) DEFAULT NULL,
  `luggage` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id_number`, `ticket_number`, `train_number`, `ticket_type`, `departure_station`, `destination_station`, `departure_time`, `arrival_time`, `date`, `Class`, `adults`, `children`, `number_of_tickets`, `luggage`, `total_price`) VALUES
(6548, '4537354', 'TMN6576', 'oneway', 'Mombasa', 'Nairobi', '2100', '0400', '01/28/2018', 'Business', 3, 2, 5, 67, 15400),
(45678, '213929', 'TN65478', 'oneway', 'Nairobi', 'Mtito Andei', '1200', '1400', '01/12/2017', 'Business', 6, 2, 8, 56, 22200),
(343210, '8573914', 'TNM3456785', 'oneway', 'Mombasa', 'Nairobi', '1100', '1300', '11/25/2017', 'Business', 3, 1, 4, 37, 10500),
(32466, '8045044', 'TNM87587', 'oneway', 'Athi river', 'Miasenyi', '1200', '1500', '11/23/2017', 'Business', 5, 2, 7, 50, 18000),
(675673, '4299317', 'TNM87587', 'oneway', 'Athi river', 'Miasenyi', '1200', '1500', '11/23/2017', 'Business', 4, 2, 6, 48, 15000),
(987656789, '2291565', 'TMN87787', 'oneway', 'Mombasa', 'Nairobi', '1200', '1600', '02/16/2018', 'Business', 4, 3, 7, 53, 17100),
(27205008, '2752076', 'TNM1234', 'roundtrip', 'Kibwezi', 'Mombasa', '1200', '1600', '03/21/2018', 'Business', 1, 0, 1, 30, 5250),
(433468598, '286561', 'TN875765', 'roundtrip', 'Mombasa', 'Nairobi', '0900', '1200', '11/18/2017', 'Business', 6, 4, 10, 59, 43800),
(918273, '3182068', 'TN65478', 'roundtrip', 'Nairobi', 'Mtito Andei', '1200', '1400', '01/12/2017', 'Business', 5, 2, 7, 45, 31500),
(12340987, '5718079', 'TMN7657', 'roundtrip', 'Nairobi', 'Emali', '0900', '1300', '03/22/2017', 'Business', 2, 5, 7, 56, 24825),
(199987263, '1223450', 'TNM674834', 'oneway', 'Nairobi', 'Voi', '0800', '1300', '02/17/2017', 'Business', 2, 2, 4, 34, 9000),
(3344562, '5580140', 'TMN6576', 'oneway', 'Mombasa', 'Nairobi', '2100', '0400', '01/28/2018', 'Business', 2, 1, 3, 23, 7500);

-- --------------------------------------------------------

--
-- Table structure for table `train_schedules`
--

CREATE TABLE `train_schedules` (
  `train_number` varchar(255) NOT NULL,
  `number_of_seats` int(11) NOT NULL,
  `seats_available` int(11) NOT NULL,
  `departure_station` text NOT NULL,
  `destination_station` text NOT NULL,
  `departure_time` text NOT NULL,
  `arrival_time` text NOT NULL,
  `date` text NOT NULL,
  `status` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train_schedules`
--

INSERT INTO `train_schedules` (`train_number`, `number_of_seats`, `seats_available`, `departure_station`, `destination_station`, `departure_time`, `arrival_time`, `date`, `status`) VALUES
('TM5764569', 200, 195, 'Nairobi', 'Mombasa', '0900', '1300', '12/23/2017', NULL),
('TMN35467', 200, 200, 'Mariakani', 'Nairobi', '0900', '1300', '07/24/2017', 'Train Left'),
('TMN6576', 240, 192, 'Mombasa', 'Nairobi', '2100', '0400', '01/28/2018', NULL),
('TMN7657', 200, 193, 'Nairobi', 'Emali', '0900', '1300', '03/22/2017', 'Train Left'),
('TMN87787', 200, 193, 'Mombasa', 'Nairobi', '1200', '1600', '02/16/2018', NULL),
('TMN9876', 200, 200, 'Miasenyi', 'Kibwezi', '0800', '1200', '06/13/2017', NULL),
('TN65478', 200, 185, 'Nairobi', 'Mtito Andei', '1200', '1400', '01/12/2017', 'Train Left'),
('TN875765', 200, 190, 'Mombasa', 'Nairobi', '0900', '1200', '11/18/2017', NULL),
('TNB6789', 200, 200, 'Mtito Andei', 'Athi river', '1000', '1200', '08/08/2017', NULL),
('TNC76678', 200, 200, 'Mariakani', 'Emali', '1200', '1600', '10/12/2017', NULL),
('TNc7768', 200, 200, 'Mombasa', 'Nairobi', '0900', '1200', '11/06/2017', NULL),
('TNM1234', 200, 199, 'Kibwezi', 'Mombasa', '1200', '1600', '03/21/2018', NULL),
('TNM234567', 240, 240, 'Nairobi', 'Emali', '0900', '1500', '04/16/2017', NULL),
('TNM3456785', 200, 196, 'Mombasa', 'Nairobi', '1100', '1300', '11/25/2017', NULL),
('TNM34568', 200, 200, 'Voi', 'Emali', '1200', '1400', '09/21/2017', NULL),
('TNM65786876', 200, 200, 'Nairobi', 'Mombasa', '0900', '1200', '11/05/2017', NULL),
('TNM674834', 200, 196, 'Nairobi', 'Voi', '0800', '1300', '02/17/2017', NULL),
('TNM674867', 200, 200, 'Mtito Andei', 'Nairobi', '1200', '1300', '12/21/2017', NULL),
('TNM685911111', 200, 200, 'Nairobi', 'Mombasa', '0900', '1200', '11/10/2017', NULL),
('TNM87587', 200, 187, 'Athi river', 'Miasenyi', '1200', '1500', '11/23/2017', NULL),
('TNT8767', 200, 200, 'Miasenyi', 'Kibwezi', '0900', '1200', '11/30/2017', 'Train Left'),
('TNV4568', 240, 240, 'Nairobi', 'Voi', '0800', '1500', '05/25/2017', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrative_staff`
--
ALTER TABLE `administrative_staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_number`);

--
-- Indexes for table `train_schedules`
--
ALTER TABLE `train_schedules`
  ADD PRIMARY KEY (`train_number`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
