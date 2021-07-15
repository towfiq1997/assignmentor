-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2021 at 02:56 PM
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
  `admin_status` enum('actiive','pending','banned') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_account`
--

INSERT INTO `admin_account` (`admin_acc_id`, `admin_ass_id`, `admin_page_count`, `admin_user_id`, `admin_amount`, `admin_solver_id`, `trxid`, `v_status`) VALUES
(2, 19, 789, 1, 89, 0, 'fhjghvj', NULL),
(3, 19, 789, 1, 89, 0, 'fhgjh', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assignment_id` int(11) NOT NULL,
  `assignment_title` text NOT NULL,
  `assignment_description` text NOT NULL,
  `assignment_user` int(11) NOT NULL,
  `assignment_solver` int(11) DEFAULT NULL,
  `assignment_acc_status` enum('taken','not_taken') NOT NULL,
  `assignment_solv_status` enum('pending','solving','solved') NOT NULL,
  `assignment_pay_status` enum('pending','sent','accepted') NOT NULL,
  `assignment_page_count` int(11) NOT NULL,
  `assignment_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assignment_id`, `assignment_title`, `assignment_description`, `assignment_user`, `assignment_solver`, `assignment_acc_status`, `assignment_solv_status`, `assignment_pay_status`, `assignment_page_count`, `assignment_price`) VALUES
(17, 'Lorem ipsum', 'yuiopknm', 1, 0, 'taken', 'solved', 'accepted', 787, 79),
(18, 'uiuiui', 'uiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', 1, NULL, 'not_taken', 'pending', 'pending', 787, 79),
(19, 'yiuh', 'my name is khan and i am not terrorist', 1, 0, 'taken', 'solving', 'sent', 789, 79),
(20, 'yiuh', 'my name is khan and i am not terrorist', 1, NULL, 'not_taken', 'pending', 'pending', 789, 79),
(21, 'yiuh', 'my name is khan and i am not terrorist', 1, 0, 'taken', 'solving', 'pending', 789, 79),
(22, 'newew', 'hgjknkjjwhdhwio', 1, NULL, 'taken', 'pending', 'pending', 78898, 7890),
(23, 'newvj ghghj', 'fhghgv gyygh', 1, NULL, 'not_taken', 'pending', 'pending', 6787, 679);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_assignment_id` int(11) NOT NULL,
  `comment_text` text NOT NULL,
  `comment_commentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `review_text` text NOT NULL,
  `review_ass_id` int(11) NOT NULL,
  `reviews_star` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `solver`
--

CREATE TABLE `solver` (
  `solver_id` int(11) NOT NULL,
  `solver_fullname` text NOT NULL,
  `solver_username` varchar(30) NOT NULL,
  `solver_email` varchar(50) NOT NULL,
  `solver_pass` varchar(30) NOT NULL,
  `solver_status` enum('active','pending','banned') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `solver`
--

INSERT INTO `solver` (`solver_id`, `solver_fullname`, `solver_username`, `solver_email`, `solver_pass`, `solver_status`) VALUES
(0, 'Solver', 'solver', 'solver@gmail.com', 'solver', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `solver_account`
--

CREATE TABLE `solver_account` (
  `solver_acc_id` int(11) NOT NULL,
  `solver_acc_ass_id` int(11) NOT NULL,
  `solver_acc_page_count` int(11) NOT NULL,
  `solver_acc_solver_id` int(11) NOT NULL,
  `solver_acc_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_fullname` text NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_pass` varchar(50) NOT NULL,
  `user_status` enum('active','pending','banned') NOT NULL,
  `user_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_fullname`, `user_email`, `user_pass`, `user_status`, `user_name`) VALUES
(1, 'Test Tester', 'tester@test.com', 'tester', 'active', 'tester'),
(2, 'User User', 'user@user.com', 'user', 'active', 'user'),
(3, 'Test Test', 'test00009@gmail.com', 'test', 'active', 'test00009'),
(4, 'gfyguhiokkjb', 'test@gmai.com', 'shebabari', 'active', 'test'),
(5, 'dterytrtdtfy', 'adsfs@ffh.cion', 'shebabari', 'active', 'adsfs');

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
  ADD KEY `solver_acc_solver_id` (`solver_acc_solver_id`),
  ADD KEY `solver_acc_amount` (`solver_acc_amount`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_account`
--
ALTER TABLE `admin_account`
  MODIFY `admin_acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `solver_account`
--
ALTER TABLE `solver_account`
  MODIFY `solver_acc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
