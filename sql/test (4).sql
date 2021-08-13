-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2021 at 08:34 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_pass`, `admin_status`) VALUES
(1, 'mtowfiq', '12345', 'actiive');

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
(47, 'hi am tahsin i need this', 'Hivv mheguyhjfvbehdihzanw edkj', 28, 0, 'taken', 'solved', 'sent', 5678, 568, '2021-08-12 14:25:31'),
(48, 'sdhaoid', 'shdssad dasedhkj caskdkjhajd cfasdahad,masdjkkbdas,sadkjfas', 28, 0, 'taken', 'solved', 'sent', 1000, 100, '2021-08-12 14:58:08');

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

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_assignment_id`, `comment_text`, `comment_commentar`) VALUES
(1, 47, 'mtowfiqulislam', 'urgent '),
(2, 47, 'mtowfiqulislam', 'ok  i will get it done'),
(3, 48, 'mtowfiqulislam', '......');

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

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `assignment_id`, `user_id`, `solver_id`, `filename`, `comment`, `time`) VALUES
(7, 47, 28, 0, '7155-.htaccess', 'hfyyiuohj', '2021-08-12 14:39:48'),
(8, 48, 28, 0, '4870-app.js', '', '2021-08-12 15:07:17');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `review_text` text NOT NULL,
  `review_ass_id` int(11) NOT NULL,
  `reviews_star` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `solver_status` enum('active','pending','banned') NOT NULL DEFAULT 'pending',
  `actiavation_token` varchar(255) DEFAULT NULL,
  `forget_token` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `university` varchar(255) DEFAULT NULL,
  `age` tinyint(4) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `solver`
--

INSERT INTO `solver` (`solver_id`, `solver_fullname`, `solver_username`, `solver_email`, `solver_pass`, `solver_status`, `actiavation_token`, `forget_token`, `address`, `university`, `age`, `gender`, `birthday`) VALUES
(0, 'yguiuoiggjk', 'mtowfiqulislam', 'mtowfiqulislam@gmail.com', '123456', 'active', 'af01b446488ead9780820f588481e5', NULL, 'dhakla', 'fxgujok', 127, 'male', '0000-00-00');

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
(7, 47, 0, 25, 28),
(8, 48, 0, 25, 28);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_fullname` text NOT NULL,
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
  `birthday` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_fullname`, `user_email`, `user_pass`, `user_status`, `user_name`, `actiavation_token`, `forget_token`, `address`, `university`, `age`, `gender`, `birthday`) VALUES
(27, 'Mazharul Islam', 'mazharul.hub@gmail.com', '12345', 'pending', 'mazharul.hub', '780e5306d2724f6765739ae511052f', NULL, 'cumilla', 'hamdard', 20, 'male', '0009-09-08'),
(28, 'gcfuioiughcvhk', 'mtowfiqulislam@gmail.com', '12345', 'active', 'mtowfiqulislam', '2d3b99bba2901b4af42d72a2fcd3e8', NULL, 'gfdtuigh', 'vhhojhvb', 20, 'male', '0001-01-01'),
(29, 'sdhushd', 'redfoxtowfiqulislam@gmail.com', '09876', 'pending', 'redfoxtowfiqulislam', 'd674e28dba75861a88d4bad98e0e81', NULL, 'effsd', 'dsefaf', 50, 'male', '0041-12-31'),
(30, 'GUIHGHGHK', 'tasinmizi01@gmail.com', '09876', 'pending', 'tasinmizi01', '0db7b39689dde52e8a2e8217bb8f16', NULL, 'edhedh', 'jksdhk', 50, 'male', '1998-12-04');

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
(3, 3243, 1789756456, 28, 'fxdyuiodf', 'verified', 1000, '2021-08-12 14:24:30'),
(4, 1992838808, 1789756456, 28, 'asdf', 'verified', 500, '2021-08-12 15:03:56');

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
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `solver_account`
--
ALTER TABLE `solver_account`
  MODIFY `solver_acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
