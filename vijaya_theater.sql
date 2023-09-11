-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2023 at 10:47 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vijaya_theater`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(15) NOT NULL,
  `ticket_id` int(15) NOT NULL,
  `user_id` int(255) NOT NULL,
  `show_id` int(255) NOT NULL,
  `movie` varchar(255) NOT NULL,
  `ticket_name` varchar(255) NOT NULL,
  `no_of_seat` int(100) NOT NULL,
  `ticket_date_time` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `booked_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `ticket_id`, `user_id`, `show_id`, `movie`, `ticket_name`, `no_of_seat`, `ticket_date_time`, `amount`, `booked_date`) VALUES
(206, 203, 16, 83, 'Avatar: The Way of Water', 'R1S1 R1S2 R1S3 R1S4 R1S5 R1S6', 6, '2023-04-16 9.00 AM', 1800, '2023-04-16'),
(207, 204, 16, 83, 'Avatar: The Way of Water', 'R3S1 R3S2 R3S3 R3S4', 4, '2023-04-16 9.00 AM', 1200, '2023-04-16'),
(208, 205, 16, 83, 'Avatar: The Way of Water', 'R2S1 R2S2 R2S3 R2S4', 4, '2023-04-16 9.00 AM', 1200, '2023-04-23');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(15) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `user_name`, `password`, `type`) VALUES
(1, 'admin', '123', 'admin'),
(2, 'dsfd', 'sdfd', 'user'),
(3, 'kiru', '123', 'user'),
(4, 'kiru', '123', 'user'),
(5, 'kiru', '123', 'user'),
(6, 'dcf', 'adcfdas', 'user'),
(7, 'kiru', '123', 'user'),
(8, 'kiru', '123', 'user'),
(9, 'kiru', '123', 'user'),
(10, 'ravi', '123', 'user'),
(11, 'fdsfd', 'wedwed', 'user'),
(12, 'edfed', 'ede', 'user'),
(13, 'admin', '123', 'admin'),
(14, 'kiru', '123', 'user'),
(15, 'admin', '123', 'admin'),
(16, 'kiru', '123', 'user'),
(17, 'kiru', '123', 'user'),
(18, 'kiru', '123', 'user'),
(19, 'ravi', '123', 'user'),
(20, 'admin', '123', 'admin'),
(21, 'ravi', '123', 'user'),
(22, 'ravi', '123', 'user'),
(23, 'ravi', '123', 'user'),
(24, 'kiru', '123', 'user'),
(25, 'kiru', '123', 'user'),
(26, 'kiru', '123', 'user'),
(27, 'admin', '123', 'admin'),
(28, 'admin', '123', 'admin'),
(29, 'admin', '123', 'admin'),
(30, 'admin', '123', 'admin'),
(31, 'admin', '123', 'admin'),
(32, 'kiru', '123', 'user'),
(33, 'admin', '123', 'admin'),
(34, 'admin', '123', 'admin'),
(35, 'kiru', '123', 'user'),
(36, 'admin', '123', 'admin'),
(37, 'kiru', '123', 'user'),
(38, 'admin', '123', 'admin'),
(39, 'kiru', '123', 'user'),
(40, 'kiru', '123', 'user'),
(41, 'admin', '123', 'admin'),
(42, 'kiru', '123', 'user'),
(43, 'admin', '123', 'admin'),
(44, 'kiru', '123', 'user'),
(45, 'kiru', '123', 'user'),
(46, 'admin', '123', 'admin'),
(47, 'kiru', '123', 'user'),
(48, 'kiru', '123', 'user'),
(49, 'admin', '123', 'user'),
(50, 'kiru', '123', 'user'),
(51, 'kiru', '123', 'user'),
(52, 'ravi', '123', 'user'),
(53, 'ravi', '123', 'user'),
(54, 'ravi', '123', 'user'),
(55, 'kiru', '123', 'user'),
(56, 'ravi', '123', 'user'),
(57, 'ravi', '123', 'user'),
(58, 'kiru', '123', 'user'),
(59, 'kiru', '123', 'user'),
(60, 'admin', '123', 'user'),
(61, 'admin', '123', 'user'),
(62, 'kiru', '123', 'user'),
(63, 'admin', '123', 'user'),
(64, 'kiru', '123', 'user'),
(65, 'admin', '123', 'user'),
(66, 'kiru', '123', 'user'),
(67, 'admin', '123', 'user'),
(68, 'kiru', '123', 'user'),
(69, 'admin', '123', 'user'),
(70, 'kiru', '123', 'user'),
(71, 'admin', '123', 'user'),
(72, 'kiru', '123', 'user'),
(73, 'kiru', '123', 'user'),
(74, 'admin', '123', 'user'),
(75, 'admin', '123', 'admin'),
(76, 'kiru', '123', 'user'),
(77, 'admin', '123', 'user'),
(78, 'kiru', '123', 'user'),
(79, 'admin', '123', 'admin'),
(80, 'admin', '123', 'admin'),
(81, 'kiru', '123', 'user'),
(82, 'admin', '123', 'admin'),
(83, 'jhh', 'ggg', 'user'),
(84, 'erfe', 'erfer', 'user'),
(85, 'erfe', 'erfer', 'user'),
(86, 'kiru', '123', 'user'),
(87, 'ad', '123', 'user'),
(88, 'kiru', '123', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `movie_id` int(15) NOT NULL,
  `movie_name` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `director` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `release_date` varchar(255) NOT NULL,
  `runtime` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `add_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`movie_id`, `movie_name`, `categorie`, `gender`, `director`, `language`, `release_date`, `runtime`, `image`, `video_url`, `add_date`) VALUES
(14, 'Avatar: The Way of Water', 'Main movie', 'Sci-fi/Adventure', 'James Cameron', 'Tamil', '16/12/2022', '3h 10m', 'movie0.jpg', 'https://www.youtube.com/watch?v=d9MyW72ELq0', '2023-04-06'),
(17, 'Aquaman 2', 'Up coming movie', 'Action/Fantasy', 'James Wan', 'Tamil, English', '16/12/2023', '2h 30m', 'movie13.jpg', 'fwerfgrg', '2023-04-06'),
(18, 'Maaveeran', 'Up coming movie', 'Action', 'Madonna Ashwin', 'Tamil', '12/04/2023', '2h 45m', 'movie3.jpg', 'fwerfgrg', '2023-04-06'),
(19, 'Black adam', 'Populer movie', 'Action/Fantasy', 'Jaume Collet-Serra', 'Tamil, English', '10/10/2022', '2h 40m', 'movie9.jpg', 'fwerfgrg', '2023-04-06'),
(20, 'Ponniyin Selvan: I', 'Populer movie', 'Drama/Action', 'Mani Ratnam', 'Tamil', '30/09/2022', '2h 50m', 'movie10.jpg', 'fwerfgrg', '2023-04-10'),
(21, 'Vikram', 'Populer movie', 'Action/Mystery', 'Lokesh Kanagaraj', 'Tamil', '3/06/2022', '2h 53m', 'movie19.jpg', 'll', '2023-04-10'),
(22, 'Cobra', 'Populer movie', 'Mystery/Crime', 'R. Ajay Gnanamuthu', 'Tamil', '31/08/2022', '3h 03m', 'movie18.jpg', 'fwerfgrg', '2023-04-10'),
(23, 'The Batman', 'Populer movie', 'Action', 'Matt Reeves', 'Tamil, English', '04/03/2022', '2h 56m', 'movie12.jpg', 'frfgrfg', '2023-04-10'),
(30, 'Don', 'Populer movie', 'Action', 'dfgf', 'Tamil, English', '2023-02-23', '3h 10m', 'movie14.jpg', 'fghf', '2023-04-10'),
(31, 'Don', 'Second movie', 'Sci-fi/Adventure', 'James Cameron', 'Tamil, English', '2023-02-28', '3h 10m', 'movie003.jpg', 'fgfg', '2023-04-10'),
(32, 'freft', 'Up coming movie', 'gredfg', 'rger', 'erger', '2023-03-21', 'ererger', 'movie11.jpg', 'jhjjjj', '2023-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `card_no` int(11) NOT NULL,
  `ex_date` varchar(255) NOT NULL,
  `cvv` int(3) NOT NULL,
  `add_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `user_id`, `show_id`, `booking_id`, `name`, `email`, `card_no`, `ex_date`, `cvv`, `add_date`) VALUES
(111, 16, 83, 206, 'kiru', 'kirukirusopn16@gmail.com', 1234566778, '2023-04-20', 123, '2023-04-16'),
(112, 16, 83, 207, 'kirusopan', 'kirukirusopn16@gmail.com', 1234566778, '2023-04-19', 123, '2023-04-20'),
(113, 16, 83, 208, 'kiru', 'kirukirusopn16@gmail.com', 1234566778, '2023-05-05', 0, '2023-04-26');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `user_id` int(15) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `add_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`user_id`, `username`, `email`, `password`, `user_type`, `add_date`) VALUES
(15, 'admin', 'kirukirusopn16@gmail.com', '123', 'admin', '2023-04-06'),
(16, 'kiru', 'kirusopn16@gmail.com', '123', 'user', '2023-04-06'),
(17, 'ravi', 'ravi@gmail.com', '123', 'user', '2023-04-06'),
(24, 'ad', 'ad@gmail.com', '123', 'user', '2023-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `seat_detail`
--

CREATE TABLE `seat_detail` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `show_id` int(255) NOT NULL,
  `seat_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seat_detail`
--

INSERT INTO `seat_detail` (`id`, `user_id`, `show_id`, `seat_no`) VALUES
(203, 16, 83, 'R1S1 R1S2 R1S3 R1S4 R1S5 R1S6'),
(204, 16, 83, 'R3S1 R3S2 R3S3 R3S4'),
(205, 16, 83, 'R2S1 R2S2 R2S3 R2S4');

-- --------------------------------------------------------

--
-- Table structure for table `seat_reserved`
--

CREATE TABLE `seat_reserved` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `show_id` int(255) NOT NULL,
  `seat_name` varchar(255) NOT NULL,
  `reserved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seat_reserved`
--

INSERT INTO `seat_reserved` (`id`, `user_id`, `show_id`, `seat_name`, `reserved`) VALUES
(163, 16, 83, 'R1S1', 0),
(164, 16, 83, 'R1S2', 0),
(165, 16, 83, 'R1S3', 0),
(166, 16, 83, 'R1S4', 0),
(167, 16, 83, 'R1S5', 0),
(168, 16, 83, 'R1S6', 0),
(169, 16, 83, 'R3S1', 0),
(170, 16, 83, 'R3S2', 0),
(171, 16, 83, 'R3S3', 0),
(172, 16, 83, 'R3S4', 0),
(173, 16, 83, 'R2S1', 0),
(174, 16, 83, 'R2S2', 0),
(175, 16, 83, 'R2S3', 0),
(176, 16, 83, 'R2S4', 0);

-- --------------------------------------------------------

--
-- Table structure for table `show_table`
--

CREATE TABLE `show_table` (
  `show_id` int(15) NOT NULL,
  `movie_id` int(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `movie_name` varchar(255) NOT NULL,
  `show_date_time` varchar(255) NOT NULL,
  `ticket_price` varchar(255) NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `add_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `show_table`
--

INSERT INTO `show_table` (`show_id`, `movie_id`, `categorie`, `movie_name`, `show_date_time`, `ticket_price`, `cover_image`, `add_date`) VALUES
(83, 14, 'Main movie', 'Avatar: The Way of Water', '2023-04-16 9.00 AM', '300', 'movie01.jpg', '2023-04-10'),
(84, 14, 'Main movie', 'Avatar: The Way of Water', '2023-04-24 9.00 AM', '4000', 'movie01.jpg', '2023-04-10'),
(85, 31, 'Second movie', 'Don', '2023-05-15 2.00 PM', '300', 'movie0003.jpg', '2023-05-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `show_id` (`show_id`),
  ADD KEY `booking_ibfk_2` (`ticket_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `show_id` (`show_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `seat_detail`
--
ALTER TABLE `seat_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `show_id` (`show_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `seat_reserved`
--
ALTER TABLE `seat_reserved`
  ADD PRIMARY KEY (`id`),
  ADD KEY `show_id` (`show_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `show_table`
--
ALTER TABLE `show_table`
  ADD PRIMARY KEY (`show_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `movie_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `user_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `seat_detail`
--
ALTER TABLE `seat_detail`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `seat_reserved`
--
ALTER TABLE `seat_reserved`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `show_table`
--
ALTER TABLE `show_table`
  MODIFY `show_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `registration` (`user_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`ticket_id`) REFERENCES `seat_detail` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`booking_id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`show_id`) REFERENCES `show_table` (`show_id`),
  ADD CONSTRAINT `payment_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `registration` (`user_id`);

--
-- Constraints for table `seat_detail`
--
ALTER TABLE `seat_detail`
  ADD CONSTRAINT `seat_detail_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `registration` (`user_id`);

--
-- Constraints for table `seat_reserved`
--
ALTER TABLE `seat_reserved`
  ADD CONSTRAINT `seat_reserved_ibfk_1` FOREIGN KEY (`show_id`) REFERENCES `show_table` (`show_id`),
  ADD CONSTRAINT `seat_reserved_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `registration` (`user_id`);

--
-- Constraints for table `show_table`
--
ALTER TABLE `show_table`
  ADD CONSTRAINT `show_table_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
