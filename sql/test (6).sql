-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2021 at 04:24 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(30) NOT NULL,
  `admin_pass` varchar(30) NOT NULL,
  `admin_status` enum('active','pending','banned') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_pass`, `admin_status`) VALUES
(1, 'assignmentor', '12345', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

CREATE TABLE `admin_account` (
  `admin_acc_id` int(11) NOT NULL,
  `admin_ass_id` int(11) NOT NULL,
  `admin_page_count` int(11) NOT NULL,
  `admin_user_id` int(11) NOT NULL,
  `admin_amount` int(11) NOT NULL,
  `admin_solver_id` int(11) NOT NULL,
  `trxid` varchar(255) DEFAULT NULL,
  `v_status` enum('not','yes') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assignment_id` int(11) NOT NULL,
  `assignment_title` text NOT NULL,
  `assignment_description` mediumtext NOT NULL,
  `assignment_user` int(11) NOT NULL,
  `assignment_solver` int(11) DEFAULT NULL,
  `assignment_acc_status` enum('taken','not_taken') NOT NULL,
  `assignment_solv_status` enum('pending','solving','solved') NOT NULL,
  `assignment_pay_status` enum('pending','sent') NOT NULL,
  `assignment_page_count` int(11) NOT NULL,
  `assignment_price` int(11) NOT NULL,
  `p_time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assignment_id`, `assignment_title`, `assignment_description`, `assignment_user`, `assignment_solver`, `assignment_acc_status`, `assignment_solv_status`, `assignment_pay_status`, `assignment_page_count`, `assignment_price`, `p_time`) VALUES
(67, 'Hiiii', 'nkjjklk', 32, 116, 'taken', 'solving', 'sent', 909, 91, '2021-08-20 10:36:46'),
(68, 'jnkl', 'bjnkmlkml', 32, 116, 'taken', 'solving', 'sent', 7980, 798, '2021-08-20 11:55:07');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_assignment_id` int(11) NOT NULL,
  `comment_text` text NOT NULL,
  `comment_commentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `solver_id` int(11) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `review_ass_id` int(11) NOT NULL,
  `reviews_star` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `solver`
--

CREATE TABLE `solver` (
  `solver_id` int(11) NOT NULL,
  `solver_username` varchar(30) NOT NULL,
  `solver_email` varchar(50) NOT NULL,
  `solver_pass` varchar(30) NOT NULL,
  `solver_status` enum('active','pending','banned') NOT NULL DEFAULT 'pending',
  `actiavation_token` varchar(255) DEFAULT NULL,
  `forget_token` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `university` varchar(255) DEFAULT NULL,
  `age` tinyint(4) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `first_name` text DEFAULT NULL,
  `last_name` text DEFAULT NULL,
  `department` text DEFAULT NULL,
  `profilepic` varchar(50) DEFAULT NULL,
  `mobileno` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `solver`
--

INSERT INTO `solver` (`solver_id`, `solver_username`, `solver_email`, `solver_pass`, `solver_status`, `actiavation_token`, `forget_token`, `address`, `university`, `age`, `gender`, `birthday`, `first_name`, `last_name`, `department`, `profilepic`, `mobileno`) VALUES
(42, 'test', 'test@gmail.com', '1', 'pending', '3b4d8f6350b8fe6464b5e35343da63', NULL, 'Dhaka', 'HUb', 10, 'male', NULL, 'Test', 'Last', 'CSE', '1487-screenshot-2021-07-06-120005.png', NULL),
(116, 'solver', 'solver@gmail.com', '1', 'active', '007b66cee588660372085047d0e215', NULL, 's', 'w', 23, 'male', NULL, 'Test', 'test', 'd', '3392-untitled.png', NULL),
(871, 'jnnk', 'jnnk@jhjhj.co', '12345', 'pending', 'd43276eeb9a5c107ac88e3b47ed410', NULL, 'ijikoko', 'nji', 12, 'male', NULL, 'bhjnkm', 'njnkmk', 'cse', '3476-screenshot-2021-07-06-120005.png', '120384909');

-- --------------------------------------------------------

--
-- Table structure for table `solver_account`
--

CREATE TABLE `solver_account` (
  `solver_acc_id` int(11) NOT NULL,
  `solver_acc_ass_id` int(11) NOT NULL,
  `solver_acc_solver_id` int(11) NOT NULL,
  `solver_acc_amount` int(11) NOT NULL DEFAULT 25,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `solver_account`
--

INSERT INTO `solver_account` (`solver_acc_id`, `solver_acc_ass_id`, `solver_acc_solver_id`, `solver_acc_amount`, `user_id`) VALUES
(13, 67, 116, 25, 32),
(14, 67, 116, 25, 32),
(15, 67, 116, 25, 32),
(16, 67, 116, 25, 32),
(17, 67, 116, 25, 32),
(18, 67, 116, 25, 32),
(19, 68, 116, 25, 32);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_pass` varchar(50) NOT NULL,
  `user_status` enum('active','pending','banned') DEFAULT 'pending',
  `user_name` varchar(30) NOT NULL,
  `actiavation_token` varchar(255) DEFAULT NULL,
  `forget_token` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `university` varchar(255) DEFAULT NULL,
  `age` tinyint(4) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `first_name` text DEFAULT NULL,
  `last_name` text DEFAULT NULL,
  `department` text DEFAULT NULL,
  `profilepic` varchar(50) DEFAULT NULL,
  `net_money` int(11) DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_pass`, `user_status`, `user_name`, `actiavation_token`, `forget_token`, `address`, `university`, `age`, `gender`, `first_name`, `last_name`, `department`, `profilepic`, `net_money`) VALUES
(32, 'user@gmail.com', '1', 'active', 'user', '88f6c826d3a5ceb66db6f51b825536', NULL, 'dhaka', 'hjk', 46, 'male', 'Test', 'last', 'cse', '6941-screenshot-2021-07-06-154401.png', 3975);

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `id` int(11) NOT NULL,
  `fromno` int(11) NOT NULL,
  `tono` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `trxid` varchar(255) NOT NULL,
  `status` enum('pending','verified','','') NOT NULL DEFAULT 'pending',
  `amount` int(11) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id`, `fromno`, `tono`, `sender`, `trxid`, `status`, `amount`, `time`) VALUES
(9, 10000, 1789756456, 32, 'hhh', 'verified', 1000, '2021-08-20 10:44:54'),
(10, 87, 1789756456, 32, 'ghj', 'verified', 1000, '2021-08-20 10:53:32'),
(11, 87, 1789756456, 32, 'ghj', 'verified', 1000, '2021-08-20 10:55:26'),
(12, 87, 1789756456, 32, 'ghj', 'verified', 1000, '2021-08-20 10:59:11'),
(13, 87, 1789756456, 32, 'ghj', 'verified', 1000, '2021-08-20 11:00:43'),
(14, 87, 1789756456, 32, 'ghj', 'verified', 1000, '2021-08-20 11:01:18'),
(15, 87, 1789756456, 32, 'ghj', 'verified', 1000, '2021-08-20 11:03:59'),
(16, 87, 1789756456, 32, 'ghj', 'verified', 1000, '2021-08-20 11:37:42'),
(17, 87, 1789756456, 32, 'ghj', 'verified', 1000, '2021-08-20 11:38:10'),
(18, 87, 1789756456, 32, 'ghj', 'verified', 1000, '2021-08-20 11:54:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `admin_account`
--
ALTER TABLE `admin_account`
  ADD PRIMARY KEY (`admin_acc_id`),
  ADD KEY `admin_ass_id` (`admin_ass_id`),
  ADD KEY `admin_user_id` (`admin_user_id`),
  ADD KEY `admin_solver_id` (`admin_solver_id`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignment_id`),
  ADD KEY `assignment_solver` (`assignment_solver`),
  ADD KEY `assignment_user` (`assignment_user`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_assignment_id` (`comment_assignment_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assignment_id` (`assignment_id`,`user_id`,`solver_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `solver_id` (`solver_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `review_ass_id` (`review_ass_id`);

--
-- Indexes for table `solver`
--
ALTER TABLE `solver`
  ADD PRIMARY KEY (`solver_id`),
  ADD UNIQUE KEY `solver_id` (`solver_id`);

--
-- Indexes for table `solver_account`
--
ALTER TABLE `solver_account`
  ADD PRIMARY KEY (`solver_acc_id`),
  ADD KEY `solver_acc_ass_id` (`solver_acc_ass_id`),
  ADD KEY `solver_acc_solver_id` (`solver_acc_solver_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender` (`sender`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_account`
--
ALTER TABLE `admin_account`
  MODIFY `admin_acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `solver_account`
--
ALTER TABLE `solver_account`
  MODIFY `solver_acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_account`
--
ALTER TABLE `admin_account`
  ADD CONSTRAINT `admin_account_ibfk_1` FOREIGN KEY (`admin_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_account_ibfk_2` FOREIGN KEY (`admin_ass_id`) REFERENCES `assignment` (`assignment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_account_ibfk_3` FOREIGN KEY (`admin_solver_id`) REFERENCES `solver` (`solver_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `assignment_ibfk_1` FOREIGN KEY (`assignment_user`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assignment_ibfk_2` FOREIGN KEY (`assignment_solver`) REFERENCES `solver` (`solver_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`comment_assignment_id`) REFERENCES `assignment` (`assignment_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`assignment_id`) REFERENCES `assignment` (`assignment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `files_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `files_ibfk_3` FOREIGN KEY (`solver_id`) REFERENCES `solver` (`solver_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`review_ass_id`) REFERENCES `assignment` (`assignment_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `solver_account`
--
ALTER TABLE `solver_account`
  ADD CONSTRAINT `solver_account_ibfk_1` FOREIGN KEY (`solver_acc_ass_id`) REFERENCES `assignment` (`assignment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `solver_account_ibfk_2` FOREIGN KEY (`solver_acc_solver_id`) REFERENCES `solver` (`solver_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_account`
--
ALTER TABLE `user_account`
  ADD CONSTRAINT `user_account_ibfk_1` FOREIGN KEY (`sender`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
