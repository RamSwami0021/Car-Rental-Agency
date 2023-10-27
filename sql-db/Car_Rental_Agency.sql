-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 12, 2023 at 06:49 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Car_Rental_Agency`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(6) UNSIGNED NOT NULL,
  `vehicle_id` int(6) UNSIGNED NOT NULL,
  `vehicle_number` varchar(20) NOT NULL,
  `booking_days` int(3) NOT NULL,
  `pickup_date` date NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `vehicle_id`, `vehicle_number`, `booking_days`, `pickup_date`, `booking_date`) VALUES
(5, 13, '0', 2, '2023-10-13', '2023-10-12 04:35:58'),
(6, 9, '0', 5, '2023-10-14', '2023-10-12 04:36:06'),
(7, 11, '0', 3, '2023-10-25', '2023-10-12 04:36:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `usertype`, `password`) VALUES
(3, 'customer1', 'customer1@gmail.com', 'user', '$2y$10$PCEvKxfcHarT.aCkU0P4S.aKT2QA3EKMuci24pkfBj1zhZH.p962C'),
(4, 'customer2', 'customer2@gmail.com', 'user', '$2y$10$gtnLOPmRXwiuYPXNF.yObeJMPAiRsWzx3HL4dquxlH5KqhjrK7Vnm'),
(5, 'agency1', 'agency1@gmail.com', 'admin', '$2y$10$fpz4KXQ4cR62hpzwXOhMUOo5iGwEyd/ZbEp6qlpQl66ZUTDzNnCWu'),
(6, 'agency2', 'agency2@gmail.com', 'admin', '$2y$10$gCIXHNTVx7Ry0.ZD3azjiOhKhpjUFxbA4.ZI4dqbTfxmThcvhNqcS');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(6) UNSIGNED NOT NULL,
  `vehicle_model` varchar(100) NOT NULL,
  `vehicle_number` varchar(20) NOT NULL,
  `seating_capacity` int(3) NOT NULL,
  `rent_per_day` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `vehicle_model`, `vehicle_number`, `seating_capacity`, `rent_per_day`) VALUES
(9, 'Maruti Swift', 'DL 01 AB 1234', 5, 1.00),
(10, 'Tata Innova', 'MH 02 CD 5678', 7, 2.00),
(11, 'Hyundai Creta', 'KA 03 EF 9012', 5, 1.00),
(12, 'Mahindra XUV500', 'TN 04 GH 3456', 7, 2.00),
(13, 'Honda City', 'AP 05 IJ 6789', 5, 2.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicle_id` (`vehicle_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
