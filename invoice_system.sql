-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2020 at 03:15 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invoice_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `inv_number` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `rate` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `sub_total` varchar(255) DEFAULT NULL,
  `sgst_per` varchar(255) DEFAULT NULL,
  `cgst_per` varchar(255) DEFAULT NULL,
  `sgst_amount` varchar(255) DEFAULT NULL,
  `cgst_amount` varchar(255) DEFAULT NULL,
  `due_amt` varchar(255) DEFAULT NULL,
  `paid_amt` varchar(255) DEFAULT NULL,
  `grand_total` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `user_id`, `inv_number`, `name`, `quantity`, `rate`, `amount`, `sub_total`, `sgst_per`, `cgst_per`, `sgst_amount`, `cgst_amount`, `due_amt`, `paid_amt`, `grand_total`, `created_at`) VALUES
(1, 5, NULL, 'Mobile,Prod', '20,20', '10,20', '200.00,400.00', '600.00', '20', '20', '120.00', '120.00', '40', '800', '840.00', '2020-10-09 12:13:07'),
(2, 4, NULL, 'Mobile,Television', '100,100', '100,200', '10000.00,20000.00', '30000.00', '10', '10', '3000.00', '3000.00', '6000', '30000', '36000.00', '2020-10-09 12:30:22'),
(3, 4, NULL, 'Prod', '20', '20', '400.00', '400.00', '10', '10', '40.00', '40.00', '20', '460', '480.00', '2020-10-09 13:08:12'),
(4, 4, NULL, 'New Prod', '20', '20', '400.00', '400.00', '10', '10', '40.00', '40.00', '80', '400', '480.00', '2020-10-09 13:09:06'),
(5, 4, NULL, 'New Prod', '20', '20', '400.00', '400.00', '10', '10', '40.00', '40.00', '80', '400', '480.00', '2020-10-09 13:09:50'),
(6, 4, 1, 'Mobile', '10', '20', '200.00', '200.00', '10', '10', '20.00', '20.00', '40', '200', '240.00', '2020-10-09 13:13:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `created_at`) VALUES
(4, 'Rakesh', 'Sapariya', 'Rakesh123', 'e10adc3949ba59abbe56e057f20f883e', '2020-10-08 07:38:14'),
(5, 'Vijay', 'Sharma', 'vijay321', 'e10adc3949ba59abbe56e057f20f883e', '2020-10-08 07:43:43'),
(6, 'Raj', 'Sharma', 'Raj123', 'e10adc3949ba59abbe56e057f20f883e', '2020-10-08 07:44:32'),
(7, 'Jay', 'Shah', 'Jay123', 'e10adc3949ba59abbe56e057f20f883e', '2020-10-08 07:45:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
