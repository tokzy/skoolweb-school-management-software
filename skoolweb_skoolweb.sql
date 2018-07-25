-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 12, 2017 at 11:28 PM
-- Server version: 10.0.31-MariaDB-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skoolweb_skoolweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(30) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'toks4wonder', '3553316daafcd976f5c1edb9d5a4f84dc96f64fe'),
(2, 'abdul205', 'b748922e860525ee13ac31ed363be75c45e5efdd');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(30) NOT NULL,
  `class` varchar(200) NOT NULL,
  `datemade` varchar(200) NOT NULL,
  `attendance` varchar(200) NOT NULL,
  `schoolidentity` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `pics` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE `board` (
  `id` int(30) NOT NULL,
  `title` varchar(200) NOT NULL,
  `post` text NOT NULL,
  `datemade` datetime NOT NULL,
  `schoolidentity` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bulk`
--

CREATE TABLE `bulk` (
  `id` int(30) NOT NULL,
  `plan` varchar(200) DEFAULT NULL,
  `messages` varchar(200) DEFAULT '0',
  `schoolidentity` varchar(200) DEFAULT NULL,
  `datemade` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(30) NOT NULL,
  `class` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `teachers` varchar(200) NOT NULL,
  `datemade` datetime NOT NULL,
  `schoolidentity` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `class`, `category`, `teachers`, `datemade`, `schoolidentity`) VALUES
(1, 'jss1', 'primary/basic', 'test', '2017-06-07 19:12:36', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `datemade` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`, `datemade`) VALUES
(1, 'kamaludeen abubakar sadiq', 'abubakar.m1601527@st.futminna.com', 'wow you guys really work hard here, all I could say is well done boys.\n\nwish you all the best.', '08:56:00'),
(2, 'Skyhigh international academy', 'Skyhighinternationacademy@gmail.com', 'I want your packages for school programs we are interested in your services', '03:54:04');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id` int(30) NOT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `picture` varchar(200) DEFAULT NULL,
  `sender` varchar(200) DEFAULT NULL,
  `recipient` varchar(200) DEFAULT NULL,
  `message` varchar(200) DEFAULT NULL,
  `datemade` datetime NOT NULL,
  `schoolidentity` varchar(200) DEFAULT NULL,
  `spam` int(30) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id`, `subject`, `picture`, `sender`, `recipient`, `message`, `datemade`, `schoolidentity`, `spam`) VALUES
(28, 'welcome address', '386610227.jpg', 'test', 'isaiahtokunbo11@gmail.com', 'welcome to skoolweb', '2017-06-12 12:36:11', 'test', 0),
(29, 'welcome', '386610227.jpg', 'test', 'isaiahtokunbo11@gmail.com', 'welcome to upss', '2017-06-14 02:05:09', 'test', 0),
(30, 'test', '386610227.jpg', 'test', 'peterdbrainy5@gmail.com', 'welcome', '2017-06-27 04:04:35', 'test', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` int(30) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `date_pay` varchar(200) NOT NULL,
  `datemade` datetime NOT NULL,
  `schoolidentity` varchar(200) NOT NULL,
  `school_fees` varchar(200) NOT NULL,
  `class` varchar(200) DEFAULT NULL,
  `student_name` varchar(200) DEFAULT NULL,
  `session` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grade_result`
--

CREATE TABLE `grade_result` (
  `id` int(30) NOT NULL,
  `grade_name` varchar(200) DEFAULT NULL,
  `grade_alphabet` varchar(200) DEFAULT NULL,
  `range_min` varchar(200) DEFAULT NULL,
  `range_max` varchar(200) DEFAULT NULL,
  `class` varchar(200) DEFAULT NULL,
  `datemade` datetime DEFAULT NULL,
  `schoolidentity` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `id` int(30) NOT NULL,
  `title` varchar(200) NOT NULL,
  `about` text NOT NULL,
  `datemade` datetime NOT NULL,
  `schoolidentity` varchar(200) NOT NULL,
  `book` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(30) NOT NULL,
  `sender` varchar(200) NOT NULL,
  `recipient` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `status` int(30) NOT NULL DEFAULT '0',
  `datemade` datetime NOT NULL,
  `schoolidentity` varchar(200) NOT NULL,
  `picture` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(30) NOT NULL,
  `email` varchar(200) NOT NULL,
  `datemade` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parentadd`
--

CREATE TABLE `parentadd` (
  `id` int(30) NOT NULL,
  `child` varchar(200) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `profession` varchar(200) DEFAULT NULL,
  `phone` varchar(200) NOT NULL,
  `datemade` datetime DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `schoolidentity` varchar(200) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(30) NOT NULL,
  `teller_no` varchar(200) DEFAULT NULL,
  `teller_image` varchar(200) DEFAULT NULL,
  `schoolidentity` varchar(200) NOT NULL,
  `confirm` varchar(200) NOT NULL DEFAULT 'free trial',
  `admin` varchar(200) NOT NULL,
  `school_logo` varchar(200) NOT NULL,
  `datemade` datetime NOT NULL,
  `plan` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `teller_no`, `teller_image`, `schoolidentity`, `confirm`, `admin`, `school_logo`, `datemade`, `plan`) VALUES
(2, NULL, NULL, 'test', 'free trial', 'test', '386610227.jpg', '2017-06-07 19:10:46', NULL),
(3, NULL, NULL, 'Skyhigh international academy', 'free trial', 'Aishatu suleiman', '1761050130.jpg', '2017-06-29 05:07:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `recyclebin`
--

CREATE TABLE `recyclebin` (
  `id` int(30) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone_no` varchar(200) DEFAULT NULL,
  `class` varchar(200) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `datemade` datetime DEFAULT NULL,
  `schoolidentity` varchar(200) NOT NULL,
  `user` varchar(200) DEFAULT NULL,
  `child` varchar(200) DEFAULT NULL,
  `category` varchar(200) DEFAULT NULL,
  `teacher` varchar(200) DEFAULT NULL,
  `admission_number` varchar(200) DEFAULT NULL,
  `gender` varchar(200) DEFAULT NULL,
  `date_of_birth` varchar(200) DEFAULT NULL,
  `profession` varchar(200) DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `teachers` varchar(200) DEFAULT NULL,
  `grade_name` varchar(200) DEFAULT NULL,
  `grade_alphabet` varchar(200) DEFAULT NULL,
  `range_min` varchar(200) DEFAULT NULL,
  `range_max` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `deleted_by` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(30) NOT NULL,
  `result` varchar(200) NOT NULL,
  `datemade` datetime NOT NULL,
  `schoolidentity` varchar(200) NOT NULL,
  `result_id` int(30) NOT NULL,
  `class` varchar(200) NOT NULL,
  `pics` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `session` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `scratch_card`
--

CREATE TABLE `scratch_card` (
  `id` int(30) NOT NULL,
  `class` varchar(200) DEFAULT NULL,
  `session` varchar(200) DEFAULT NULL,
  `pin` varchar(200) DEFAULT NULL,
  `datemade` datetime DEFAULT NULL,
  `schoolidentity` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `price` varchar(200) DEFAULT NULL,
  `usage_limit` varchar(200) DEFAULT NULL,
  `usage_status` varchar(200) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scratch_card`
--

INSERT INTO `scratch_card` (`id`, `class`, `session`, `pin`, `datemade`, `schoolidentity`, `status`, `price`, `usage_limit`, `usage_status`) VALUES
(2, 'jss1', '2017/2018', 't8lqWtKyoW7QcJd7iFT6', '2017-07-11 03:33:47', 'test', 'Free', '', '3', '3');

-- --------------------------------------------------------

--
-- Table structure for table `studentadd`
--

CREATE TABLE `studentadd` (
  `id` int(30) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `admission_number` varchar(200) DEFAULT NULL,
  `class` varchar(200) DEFAULT NULL,
  `datemade` datetime DEFAULT NULL,
  `picture` varchar(200) DEFAULT NULL,
  `schoolidentity` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `gender` varchar(200) DEFAULT NULL,
  `date_of_birth` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `payment_status` varchar(200) DEFAULT NULL,
  `payment_session` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentadd`
--

INSERT INTO `studentadd` (`id`, `name`, `email`, `admission_number`, `class`, `datemade`, `picture`, `schoolidentity`, `address`, `gender`, `date_of_birth`, `password`, `payment_status`, `payment_session`) VALUES
(1, 'test', 'peterdbrainy5@gmail.com', 'test101', 'jss1', '2017-06-07 19:13:30', '2055951817.jpg', 'test', 'n0 8 ikorodu', 'male', '1992', 'test', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subjectadd`
--

CREATE TABLE `subjectadd` (
  `id` int(30) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `datemade` datetime NOT NULL,
  `schoolidentity` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacheradd`
--

CREATE TABLE `teacheradd` (
  `id` int(30) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone_no` varchar(200) DEFAULT NULL,
  `datemade` datetime DEFAULT NULL,
  `schoolidentity` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `gender` varchar(200) DEFAULT NULL,
  `date_of_birth` varchar(200) DEFAULT NULL,
  `picture` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacheradd`
--

INSERT INTO `teacheradd` (`id`, `email`, `phone_no`, `datemade`, `schoolidentity`, `name`, `address`, `gender`, `date_of_birth`, `picture`, `password`) VALUES
(1, 'test@gmail.com', '0', '2017-06-07 19:12:11', 'test', 'test', 'n0 8 ikorodu', 'male', '1992', '491791540.jpg', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `id` int(30) NOT NULL,
  `class` varchar(200) NOT NULL,
  `subjects` varchar(200) NOT NULL,
  `days` varchar(200) NOT NULL,
  `hours` varchar(200) NOT NULL,
  `minutes` varchar(200) NOT NULL,
  `meridean` varchar(200) NOT NULL,
  `ending_time_hour` varchar(200) NOT NULL,
  `ending_time_minute` varchar(200) NOT NULL,
  `ending_meridean` varchar(200) NOT NULL,
  `datemade` datetime NOT NULL,
  `schoolidentity` varchar(200) NOT NULL,
  `status` int(30) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `schoolname` varchar(200) NOT NULL,
  `administrator` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `datemade` datetime NOT NULL,
  `logo` varchar(200) NOT NULL,
  `schooladdress` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `about` text,
  `adminemail` varchar(200) NOT NULL,
  `pricingplan` varchar(200) NOT NULL,
  `phone_no` varchar(200) DEFAULT NULL,
  `session` varchar(200) DEFAULT NULL,
  `school_phone` varchar(200) DEFAULT NULL,
  `status` int(30) DEFAULT '0',
  `payment` varchar(200) DEFAULT 'deactivated'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `schoolname`, `administrator`, `password`, `datemade`, `logo`, `schooladdress`, `email`, `about`, `adminemail`, `pricingplan`, `phone_no`, `session`, `school_phone`, `status`, `payment`) VALUES
(3, 'Skyhigh international academy', 'Aishatu suleiman', 'fcd25c2fa7f0282231da669accc70fbc0c9c0f4c', '2017-06-29 04:50:26', '1761050130.jpg', 'Old Nasarawa road keffi', 'skyhighinternationalacademy@gmail.com', NULL, 'Sulaimanaishatusuleiman@gmail.com', 'BASIC', NULL, NULL, NULL, 1, 'activated'),
(2, 'test', 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', '2017-06-07 19:10:12', '386610227.jpg', 'test', 'test@gmail.com', NULL, 'test@gmail.com', 'BASIC', NULL, NULL, NULL, 1, 'activated');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bulk`
--
ALTER TABLE `bulk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade_result`
--
ALTER TABLE `grade_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parentadd`
--
ALTER TABLE `parentadd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recyclebin`
--
ALTER TABLE `recyclebin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scratch_card`
--
ALTER TABLE `scratch_card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentadd`
--
ALTER TABLE `studentadd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjectadd`
--
ALTER TABLE `subjectadd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacheradd`
--
ALTER TABLE `teacheradd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bulk`
--
ALTER TABLE `bulk`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `grade_result`
--
ALTER TABLE `grade_result`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `parentadd`
--
ALTER TABLE `parentadd`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `recyclebin`
--
ALTER TABLE `recyclebin`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `scratch_card`
--
ALTER TABLE `scratch_card`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `studentadd`
--
ALTER TABLE `studentadd`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subjectadd`
--
ALTER TABLE `subjectadd`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teacheradd`
--
ALTER TABLE `teacheradd`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
