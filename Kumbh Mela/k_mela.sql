-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2021 at 07:07 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `k_mela`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_list`
--

CREATE TABLE `admin_list` (
  `admin_id` int(11) NOT NULL,
  `admin_adhar` int(11) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_sup` int(11) NOT NULL,
  `admin_task` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_list`
--

INSERT INTO `admin_list` (`admin_id`, `admin_adhar`, `admin_password`, `admin_sup`, `admin_task`) VALUES
(1, 100003647, 'MRuPd7o', 1, 'Main Admin'),
(2, 435084410, 'Z4TWzKuLXKX', 1, 'Business Development'),
(3, 32048595, 'MRuPd7o', 1, 'Main Admin'),
(4, 43504654, 'Z4TWzKuLXKX', 1, 'Business Development'),
(5, 42373594, 'uWLJtFvXAai', 1, 'Security'),
(6, 34245366, 'pGHxi4BjCV02', 1, 'Training'),
(7, 426346357, 'v5YdR1tn5', 1, 'Business Development'),
(8, 200003647, '2xk1PCaSDtj', 2, 'Product Management'),
(9, 785090789, 'VvASW26wn', 2, 'Support'),
(12, 2147483647, 'OIHpEPPWA1YQ', 3, 'Support');

-- --------------------------------------------------------

--
-- Table structure for table `donation_list`
--

CREATE TABLE `donation_list` (
  `donation_id` int(11) NOT NULL,
  `donation_pil_id` int(11) NOT NULL,
  `donation_amount` int(11) NOT NULL,
  `donation_date` date NOT NULL DEFAULT current_timestamp(),
  `donation_mode` varchar(30) NOT NULL,
  `donation_message` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donation_list`
--

INSERT INTO `donation_list` (`donation_id`, `donation_pil_id`, `donation_amount`, `donation_date`, `donation_mode`, `donation_message`) VALUES
(11, 101, 100000, '2021-10-09', 'debitcard', 'Har Har gange');

-- --------------------------------------------------------

--
-- Table structure for table `ghat_list`
--

CREATE TABLE `ghat_list` (
  `ghat_no` int(11) NOT NULL,
  `max_occupancy` int(11) NOT NULL,
  `ghat_type` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ghat_list`
--

INSERT INTO `ghat_list` (`ghat_no`, `max_occupancy`, `ghat_type`) VALUES
(1, 150, 'qwert'),
(2, 200, 'trewq'),
(3, 350, 'qazw'),
(4, 100, 'mnbvcx');

-- --------------------------------------------------------

--
-- Table structure for table `item_list`
--

CREATE TABLE `item_list` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_price` decimal(4,2) NOT NULL,
  `item_avail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_list`
--

INSERT INTO `item_list` (`item_id`, `item_name`, `item_price`, `item_avail`) VALUES
(123, 'Khaki', '20.00', 0),
(132, 'Moti', '99.99', 500),
(134, 'Ganga Jal', '10.00', 10000),
(243, 'Khadau', '99.99', 1000),
(341, 'Kaju Katli', '99.99', 1000),
(343, 'Abhishek', '50.00', 100000),
(344, 'Pooja Pushp', '99.99', 10000),
(345, 'Rudraksh', '99.99', 10000),
(354, 'MotiChoor', '25.00', 7000),
(435, 'Laddu', '30.00', 8000),
(890, 'Gulab Jamun', '41.00', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `payment_list`
--

CREATE TABLE `payment_list` (
  `payment_id` int(11) NOT NULL,
  `pillgrim_id` int(11) NOT NULL,
  `payment_amount` float NOT NULL,
  `payment_mode` varchar(20) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_list`
--

INSERT INTO `payment_list` (`payment_id`, `pillgrim_id`, `payment_amount`, `payment_mode`, `date`) VALUES
(13, 101, 399.97, 'paypal', '2021-10-09'),
(14, 101, 319.97, 'debitcard', '2021-10-09'),
(15, 103, 2323, 'debit_card', '2021-10-09');

-- --------------------------------------------------------

--
-- Table structure for table `pilgrim`
--

CREATE TABLE `pilgrim` (
  `pilgrim_id` int(11) NOT NULL,
  `pilgrim_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pilgrim_adhar` varchar(11) NOT NULL,
  `pilgrim_password` varchar(50) NOT NULL,
  `pilgrim_address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pilgrim`
--

INSERT INTO `pilgrim` (`pilgrim_id`, `pilgrim_name`, `email`, `pilgrim_adhar`, `pilgrim_password`, `pilgrim_address`) VALUES
(101, 'Himanshu Chaudhari', 'himanshu2346@gmail.com', '9876543210', 'qwert1234', 'rezsrfvgbytgvg,gcfcg,vgvhg asasasasa'),
(102, 'Yash Chaudhari', 'yash2346@gmail.com', '12345432', 'qwert1234', 'qqscvgyukjhgfefv'),
(103, 'naveen maheshwari', 'naveen123@gmail.com', '123456789', 'qwert1234', 'ergarvvjnvjn vfvnknvnfknk');

-- --------------------------------------------------------

--
-- Table structure for table `pilgrim_order`
--

CREATE TABLE `pilgrim_order` (
  `order_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `pilgrim_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `number_of_item` int(11) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pilgrim_order`
--

INSERT INTO `pilgrim_order` (`order_id`, `payment_id`, `pilgrim_id`, `item_id`, `number_of_item`, `order_date`) VALUES
(135, 14, 101, 123, 1, '2021-10-09'),
(137, 14, 101, 341, 1, '2021-10-09'),
(139, 14, 101, 345, 2, '2021-10-09'),
(141, 14, 101, 123, 10, '2021-10-09');

--
-- Triggers `pilgrim_order`
--
DELIMITER $$
CREATE TRIGGER `check_availbility` AFTER INSERT ON `pilgrim_order` FOR EACH ROW UPDATE item_list 
 		SET item_avail = item_avail - NEW.number_of_item
WHERE item_id = NEW.item_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `receipts_list`
--

CREATE TABLE `receipts_list` (
  `id` int(11) NOT NULL,
  `pilgrim_id` int(11) NOT NULL,
  `slot_ghat_id` int(11) NOT NULL,
  `no_of_pligrim` int(11) NOT NULL,
  `TimeStamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receipts_list`
--

INSERT INTO `receipts_list` (`id`, `pilgrim_id`, `slot_ghat_id`, `no_of_pligrim`, `TimeStamp`) VALUES
(12, 101, 9, 4, '2021-10-10 18:54:48');

--
-- Triggers `receipts_list`
--
DELIMITER $$
CREATE TRIGGER `after_insert_update_curr_capacity` AFTER INSERT ON `receipts_list` FOR EACH ROW UPDATE slot_ghat SET
	curr_capacity = curr_capacity - 		new.no_of_pligrim
WHERE id = new.slot_ghat_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `slot_ghat`
--

CREATE TABLE `slot_ghat` (
  `id` int(11) NOT NULL,
  `slot_id` int(11) NOT NULL,
  `ghat_id` int(11) NOT NULL,
  `curr_capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slot_ghat`
--

INSERT INTO `slot_ghat` (`id`, `slot_id`, `ghat_id`, `curr_capacity`) VALUES
(1, 3, 4, 86),
(2, 3, 3, 350),
(3, 3, 1, 146),
(4, 3, 2, 200),
(5, 4, 4, 100),
(6, 4, 3, 350),
(7, 4, 1, 150),
(8, 4, 2, 200),
(9, 5, 4, 96),
(10, 5, 3, 350);

-- --------------------------------------------------------

--
-- Table structure for table `slot_list`
--

CREATE TABLE `slot_list` (
  `slot_id` int(10) NOT NULL,
  `slot_time` time NOT NULL,
  `slot_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slot_list`
--

INSERT INTO `slot_list` (`slot_id`, `slot_time`, `slot_date`) VALUES
(3, '18:15:32', '2021-02-12'),
(4, '17:18:45', '2021-10-08'),
(5, '18:20:32', '2021-02-12'),
(6, '17:18:45', '2021-10-08');

-- --------------------------------------------------------

--
-- Table structure for table `traveller_list`
--

CREATE TABLE `traveller_list` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `adhar` int(11) NOT NULL,
  `relationship` varchar(30) NOT NULL,
  `pilgrim_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `traveller_list`
--

INSERT INTO `traveller_list` (`id`, `name`, `adhar`, `relationship`, `pilgrim_id`) VALUES
(4, 'Kushal Sarode', 234545343, 'friend', 103),
(5, 'Yogesh Bhirud', 2345343, 'friend', 103),
(6, 'Yash Bhole', 45343232, 'Friend', 102),
(29, 'Vaibhav Toke', 12345432, 'friend', 101),
(30, 'Yuvraj Chauhan', 12345432, 'friend', 101),
(31, 'jerome wilson', 2147483647, 'friend', 101),
(32, 'Vaibhav Toke', 12345432, 'friend', 101),
(33, 'Yuvraj Chauhan', 12345432, 'friend', 101),
(34, 'jerome wilson', 2147483647, 'friend', 101),
(35, 'Vaibhav Toke', 12345432, 'friend', 101),
(36, 'Yuvraj Chauhan', 12345432, 'friend', 101),
(37, 'jerome wilson', 2147483647, 'friend', 101),
(38, 'Vaibhav Toke', 12345432, 'friend', 101),
(39, 'Yuvraj Chauhan', 12345432, 'friend', 101),
(40, 'jerome wilson', 2147483647, 'friend', 101),
(41, 'Vaibhav Toke', 12345432, 'friend', 101),
(42, 'Yuvraj Chauhan', 12345432, 'friend', 101),
(43, 'jerome wilson', 2147483647, 'friend', 101);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_list`
--
ALTER TABLE `admin_list`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `Aadhar ID` (`admin_adhar`),
  ADD KEY `admin_supervisor` (`admin_sup`);

--
-- Indexes for table `donation_list`
--
ALTER TABLE `donation_list`
  ADD PRIMARY KEY (`donation_id`),
  ADD KEY `cn_donation_pil_id` (`donation_pil_id`);

--
-- Indexes for table `ghat_list`
--
ALTER TABLE `ghat_list`
  ADD PRIMARY KEY (`ghat_no`);

--
-- Indexes for table `item_list`
--
ALTER TABLE `item_list`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `payment_list`
--
ALTER TABLE `payment_list`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `pillgrim_id` (`pillgrim_id`);

--
-- Indexes for table `pilgrim`
--
ALTER TABLE `pilgrim`
  ADD PRIMARY KEY (`pilgrim_id`),
  ADD UNIQUE KEY `pilgrim_adhar` (`pilgrim_adhar`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `pilgrim_order`
--
ALTER TABLE `pilgrim_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `on_delete_cascade_item_id` (`item_id`),
  ADD KEY `on_delete_cascade_pilgrim_id` (`pilgrim_id`),
  ADD KEY `payment_id` (`payment_id`);

--
-- Indexes for table `receipts_list`
--
ALTER TABLE `receipts_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pilgrim_id` (`pilgrim_id`),
  ADD KEY `slot_ghat_id` (`slot_ghat_id`);

--
-- Indexes for table `slot_ghat`
--
ALTER TABLE `slot_ghat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slot_id` (`slot_id`,`ghat_id`),
  ADD KEY `slot_ghat_ibfk_1` (`ghat_id`);

--
-- Indexes for table `slot_list`
--
ALTER TABLE `slot_list`
  ADD PRIMARY KEY (`slot_id`);

--
-- Indexes for table `traveller_list`
--
ALTER TABLE `traveller_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pilgrim_id` (`pilgrim_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donation_list`
--
ALTER TABLE `donation_list`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ghat_list`
--
ALTER TABLE `ghat_list`
  MODIFY `ghat_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `item_list`
--
ALTER TABLE `item_list`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=891;

--
-- AUTO_INCREMENT for table `payment_list`
--
ALTER TABLE `payment_list`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pilgrim`
--
ALTER TABLE `pilgrim`
  MODIFY `pilgrim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `pilgrim_order`
--
ALTER TABLE `pilgrim_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `receipts_list`
--
ALTER TABLE `receipts_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `slot_ghat`
--
ALTER TABLE `slot_ghat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `slot_list`
--
ALTER TABLE `slot_list`
  MODIFY `slot_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `traveller_list`
--
ALTER TABLE `traveller_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_list`
--
ALTER TABLE `admin_list`
  ADD CONSTRAINT `admin_supervisor` FOREIGN KEY (`admin_sup`) REFERENCES `admin_list` (`admin_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `donation_list`
--
ALTER TABLE `donation_list`
  ADD CONSTRAINT `cn_donation_pil_id` FOREIGN KEY (`donation_pil_id`) REFERENCES `pilgrim` (`pilgrim_id`) ON DELETE CASCADE;

--
-- Constraints for table `payment_list`
--
ALTER TABLE `payment_list`
  ADD CONSTRAINT `payment_list_ibfk_1` FOREIGN KEY (`pillgrim_id`) REFERENCES `pilgrim` (`pilgrim_id`);

--
-- Constraints for table `pilgrim_order`
--
ALTER TABLE `pilgrim_order`
  ADD CONSTRAINT `on_delete_cascade_item_id` FOREIGN KEY (`item_id`) REFERENCES `item_list` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `on_delete_cascade_pilgrim_id` FOREIGN KEY (`pilgrim_id`) REFERENCES `pilgrim` (`pilgrim_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pilgrim_order_ibfk_1` FOREIGN KEY (`payment_id`) REFERENCES `payment_list` (`payment_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `receipts_list`
--
ALTER TABLE `receipts_list`
  ADD CONSTRAINT `receipts_list_ibfk_1` FOREIGN KEY (`pilgrim_id`) REFERENCES `pilgrim` (`pilgrim_id`),
  ADD CONSTRAINT `receipts_list_ibfk_2` FOREIGN KEY (`slot_ghat_id`) REFERENCES `slot_ghat` (`id`);

--
-- Constraints for table `slot_ghat`
--
ALTER TABLE `slot_ghat`
  ADD CONSTRAINT `slot_ghat_ibfk_1` FOREIGN KEY (`ghat_id`) REFERENCES `ghat_list` (`ghat_no`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `slot_ghat_ibfk_2` FOREIGN KEY (`slot_id`) REFERENCES `slot_list` (`slot_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `traveller_list`
--
ALTER TABLE `traveller_list`
  ADD CONSTRAINT `traveller_list_ibfk_1` FOREIGN KEY (`pilgrim_id`) REFERENCES `pilgrim` (`pilgrim_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
