-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 04:50 AM
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
-- Database: `go_surf_sri_lanka`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'Arvin', '$2y$10$Cv1fOT6Y.3izauVaMOch5eefAitnIWDktSPxBdHY2gg.Z3v28NIfS'),
(2, 'Arvin-1', '$2y$10$hBWEYQB7qrcw7WBasrLSZeRRGO2ycfz.1VV7hQNYOPaJxABeAZaXO');

-- --------------------------------------------------------

--
-- Table structure for table `boards`
--

CREATE TABLE `boards` (
  `board_id` int(11) NOT NULL,
  `board_image` mediumblob NOT NULL,
  `board_name` varchar(50) NOT NULL,
  `board_type` int(11) NOT NULL,
  `board_desc` varchar(500) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `boards`
--

INSERT INTO `boards` (`board_id`, `board_image`, `board_name`, `board_type`, `board_desc`, `price`, `stock`) VALUES
(1, 0x2e2e2f75706c6f6164732f66697368626f617264202d20312e6a7067, 'Blue Wave Rider', 3, 'Glide effortlessly on waves with this fantastic surfing board', 1200.00, 2),
(2, 0x2e2e2f75706c6f6164732f66697368626f617264202d20322e6a7067, 'Spectrum Swirlfish', 3, 'Dive into waves of fun on this vibrant, multi-colored surfing board', 1000.00, 1),
(35, 0x2e2e2f75706c6f6164732f66697368626f617264202d20332e6a7067, 'Pink Lagoon Glide', 3, 'Ride the waves in style with this playful fishboard', 2000.00, 2),
(36, 0x2e2e2f75706c6f6164732f67756e626f617264202d20312e6a7067, 'Golden Bolt Maverick', 13, ' Unleash the power with this white gunboard featuring a DC character (Flash) logo', 1500.00, 3),
(37, 0x2e2e2f75706c6f6164732f67756e626f617264202d20322e6a7067, 'Crimson Lightning Charger', 13, 'Rule the waves on this red gunboard, adorned with a striking golden (Flash) lightning board', 1500.00, 1),
(38, 0x2e2e2f75706c6f6164732f6c6f6e67626f617264202d312e6a7067, 'Midnight Jetstream', 12, 'Glide gracefully on this sleek longboard, embodying style and smooth rides on every wave', 2000.00, 5),
(39, 0x2e2e2f75706c6f6164732f6d616c69627566756e626f617264202d312e6a7067, 'Moonlight Malibu Bliss', 11, 'Cruise in style on this fun malibu board, adorned with a sleek combination of blue, white, and black', 1500.00, 4),
(40, 0x2e2e2f75706c6f6164732f6d616c69627566756e626f617264202d322e6a7067, 'Ocean Twilight Cruiser', 11, 'Enjoy the waves with flair on this fun malibu board', 1500.00, 2),
(41, 0x2e2e2f75706c6f6164732f73686f7274626f617264202d20312e6a7067, 'Arctic Breeze Flash', 9, 'Conquer waves with speed on this shortboard featuring a cool blend of white, light blue, and vibrant orange', 1250.00, 2),
(42, 0x2e2e2f75706c6f6164732f73686f7274626f617264202d20322e6a7067, 'Arctic Flashblade Special Edition', 9, 'A shortboard that blends crisp white, light blue, and fiery orange for high-speed, thrilling surfing', 1500.00, 3),
(43, 0x2e2e2f75706c6f6164732f737570626f617264202d20312e6a7067, 'Verdant Glide', 14, 'Navigate waters with style on this surfing board', 3000.00, 2),
(44, 0x2e2e2f75706c6f6164732f737570626f617264202d20322e6a7067, 'Solar Breeze Elite', 14, 'Rare Edition Stand Up Paddle Board in vibrant highlight yellow, white, and refreshing green. Stand out on every paddle', 3000.00, 2),
(45, 0x2e2e2f75706c6f6164732f746f77626f617264202d20322e6a7067, 'Tow Me Up', 15, 'Dominate the surf with this Tow Board, boasting a sophisticated black background and a central, gleaming golden stripe', 2750.00, 2),
(46, 0x2e2e2f75706c6f6164732f746f77626f617264202d20312e6a7067, 'Ivory Radiance Tow', 15, 'Master the waves on this Tow Board with a pristine white backdrop, a bold golden middle stripe, and sleek black accents on each side', 2750.00, 2);

-- --------------------------------------------------------

--
-- Table structure for table `board_types`
--

CREATE TABLE `board_types` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL,
  `type_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `board_types`
--

INSERT INTO `board_types` (`type_id`, `type_name`, `type_stock`) VALUES
(3, 'Fishboard', 5),
(9, 'Shortboard', 5),
(10, 'Hybrid', 0),
(11, 'Fun Malibu', 6),
(12, 'Longboard', 5),
(13, 'Gunboard', 4),
(14, 'Stand Up Paddle Board', 4),
(15, 'Tow Board', 4);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `address1` varchar(50) NOT NULL,
  `address2` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `contact1` varchar(20) NOT NULL,
  `contact2` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_image` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fname`, `lname`, `address1`, `address2`, `city`, `country`, `gender`, `contact1`, `contact2`, `email`, `password`, `user_image`) VALUES
(18, 'Arvin', 'Premathilake', '344, Koralaima, Gonapola Junction.', '', 'Koralaima', 'Sri Lanka', 'M', '0715247414', '0777200096', 'arvin250cc@gmail.com', '$2y$10$dZeGlr2AIwASZZq74m02p./zibXdKMgaMAs7jp79wea9/VlkieiwW', 0x2e2e2f6173736574732f696d616765732f617276696e2e6a7067),
(26, 'Umindu', 'Haputhanthri', '223, Horana Road, Piliyandala', '', 'Colombo', 'Sri Lanka', 'M', '0741153063', '', 'uminduvh@gmail.com', '$2y$10$ObDlMPRaA35S64NoqnaF2uoN8.7h9Zke82BQ8M6MD4gsqvCBDEAtO', 0x2e2e2f6173736574732f696d616765732f756d696e64752e6a706567),
(27, 'Udani', 'Kodithuwakku', '105/1, Pinidiyagarawatta, Maviththara, Piliyandala', '', 'Colombo', 'Sri Lanka', 'F', '0779989677', '', 'uikodithuwakku@gmail.com', '$2y$10$n9u1G8Jvag3sJl5SyAkXmOkaJ7CAtEXDf9izVSEM5DCIaJj0LafUK', 0x2e2e2f6173736574732f696d616765732f7564616e692e6a706567),
(28, 'Mahith', 'Abeysinghe', 'Horana, School Road, ', '', 'Horana', 'Sri Lanka', 'M', '0769709935', '', 'mhabeysinghe@gmail.com', '$2y$10$lRArhqaC4nRbtbostTFgtuPzSVIO0QVh2AJu4A6u6L8pg59M0qGWK', 0x2e2e2f6173736574732f696d616765732f6d61686974682e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `inquiry_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `rental_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `board_id` int(11) NOT NULL,
  `rental_days` int(11) NOT NULL,
  `rental_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `total_cost` decimal(8,2) NOT NULL,
  `payment_method` varchar(10) NOT NULL,
  `payment_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `review_user_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `stars` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `is_displayed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `review_user_id`, `content`, `stars`, `date_created`, `is_displayed`) VALUES
(32, 26, 'Wow! What an nice experience. This is the best place to rent surfing boards.', 5, '2023-12-10', 1),
(33, 18, 'These people are the best surfing teachers I have ever seen in my life. Good place to rent boards and learn lessons.', 4, '2023-12-10', 1),
(34, 27, 'I loved being in Hikkaduwa during my holidays. The surfing school is also a great place to learn how to surf.', 5, '2023-12-10', 1),
(35, 28, 'Their food-stalls have very hygienic and healthy foods.', 4, '2023-12-10', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `boards`
--
ALTER TABLE `boards`
  ADD PRIMARY KEY (`board_id`),
  ADD KEY `board_type` (`board_type`);

--
-- Indexes for table `board_types`
--
ALTER TABLE `board_types`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`inquiry_id`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`rental_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `board_id` (`board_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `review_user_id` (`review_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `boards`
--
ALTER TABLE `boards`
  MODIFY `board_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `board_types`
--
ALTER TABLE `board_types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `inquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `rental_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `boards`
--
ALTER TABLE `boards`
  ADD CONSTRAINT `boards_ibfk_1` FOREIGN KEY (`board_type`) REFERENCES `board_types` (`type_id`);

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`review_user_id`) REFERENCES `customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
