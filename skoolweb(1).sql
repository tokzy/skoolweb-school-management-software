-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2017 at 09:04 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skoolweb`
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
  `pics` varchar(200) NOT NULL,
  `post_id` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `class`, `datemade`, `attendance`, `schoolidentity`, `name`, `pics`, `post_id`) VALUES
(13, 'jss11', '24th of feb.,2019', 'absent', 'tomilola nur and primary school akure', 'tokunbo isaiah iranlowo', '22424.jpg', '8 '),
(12, 'jss11', '23rd of feb.,2019', 'present', 'tomilola nur and primary school akure', 'tokunbo isaiah iranlowo', '22424.jpg', '8 '),
(11, 'jss11', '22nd of feb.,2019', 'absent', 'tomilola nur and primary school akure', 'tokunbo', '16164.jpg', '7 '),
(10, 'jss11', '22nd of feb.,2019', 'present', 'tomilola nur and primary school akure', 'tokunbo isaiah iranlowo', '22424.jpg', '8 '),
(14, 'jss11', '24th of feb.,2019', 'present', 'tomilola nur and primary school akure', 'tokunbo', '16164.jpg', '7 '),
(15, 'jss11', '24th of feb.,2019', 'absent', 'tomilola nur and primary school akure', 'tomsy', '32325.jpg', '12 '),
(16, 'jss11', '22nd of feb.,2019', 'absent', 'tomilola nur and primary school akure', 'tomsy', '32325.jpg', '12 ');

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

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`id`, `title`, `post`, `datemade`, `schoolidentity`) VALUES
(1, 'introduction to writing hello world in c++', 'hello ladies', '2017-10-30 10:56:10', 'tomilola nur and primary school akure'),
(2, 'introduction to writing hello world in c++', 'hello ladies', '2017-10-30 10:56:50', 'tomilola nur and primary school akure'),
(3, 'introduction to writing hello world in c++', 'hello ladies', '2017-10-30 11:04:13', 'tomilola nur and primary school akure');

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
(1, 'jss1', 'primary/basic', 'test', '2017-06-07 19:12:36', 'test'),
(2, 'jss11', 'junior secondary', 'test6', '2017-10-15 14:08:47', 'tomilola nur and primary school akure');

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

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `amount`, `date_pay`, `datemade`, `schoolidentity`, `school_fees`, `class`, `student_name`, `session`) VALUES
(4, '10,000', '22nd of feb.,2019', '2017-10-30 14:45:17', 'tomilola nur and primary school akure', '20,000', 'jss11', 'tokunbo', '2017/2018');

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

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`id`, `title`, `about`, `datemade`, `schoolidentity`, `book`) VALUES
(1, 'the effect of pollution in the environment', 'C++ Basic Syntax\r\nWhen we consider a C++ program, it can be defined as a collection of objects that communicate via invoking each other''s methods. Let us now briefly look into what do class, object, methods and Instance variables mean.\r\nâ€¢	Object âˆ’ Objects have Properties and Behaviors. Example: A dog has Properties - color, name, breed as well as Behaviors - wagging, barking, eating. An object is an instance of a class.\r\nâ€¢	Class âˆ’ A class can be defined as a template/blueprint that describes the behaviors/states that object of its type support.\r\nâ€¢	Methods âˆ’ A method is basically a behavior. A class can contain many methods. It is in methods where the logics are written, data is manipulated and all the actions are executed.\r\nâ€¢	Instance Variables âˆ’ Each object has its unique set of instance variables. An object''s state is created by the values assigned to these instance variables.\r\nC++ Program Structure:\r\nLet us look at a simple code that would print the words Hello World.\r\n#include <iostream>\r\nusing namespace std;\r\n\r\n// main() is where program execution begins.\r\n\r\nint main() {\r\n   cout << "Hello World"; // prints Hello World\r\n   return 0;\r\n}\r\nLet us look various parts of the above program:\r\nâ€¢	The C++ language defines several headers, which contain information that is either necessary or useful to your program. For this program, the header <iostream> is needed.\r\nâ€¢	The line using namespace std; tells the compiler to use the std namespace. Namespaces are a relatively recent addition to C++.\r\nâ€¢	The next line // main() is where program execution begins. is a single-line comment available in C++. Single-line comments begin with // and stop at the end of the line.\r\nâ€¢	The line int main() is the main function where program execution begins.\r\nâ€¢	The next line cout << "This is', '2017-08-23 14:07:39', 'test', '26148.docx'),
(2, 'the effect of pollution in the environment', 'C++ Basic Syntax\r\nWhen we consider a C++ program, it can be defined as a collection of objects that communicate via invoking each other''s methods. Let us now briefly look into what do class, object, methods and Instance variables mean.\r\nâ€¢	Object âˆ’ Objects have Properties and Behaviors. Example: A dog has Properties - color, name, breed as well as Behaviors - wagging, barking, eating. An object is an instance of a class.\r\nâ€¢	Class âˆ’ A class can be defined as a template/blueprint that describes the behaviors/states that object of its type support.\r\nâ€¢	Methods âˆ’ A method is basically a behavior. A class can contain many methods. It is in methods where the logics are written, data is manipulated and all the actions are executed.\r\nâ€¢	Instance Variables âˆ’ Each object has its unique set of instance variables. An object''s state is created by the values assigned to these instance variables.\r\nC++ Program Structure:\r\nLet us look at a simple code that would print the words Hello World.\r\n#include <iostream>\r\nusing namespace std;\r\n\r\n// main() is where program execution begins.\r\n\r\nint main() {\r\n   cout << "Hello World"; // prints Hello World\r\n   return 0;\r\n}\r\nLet us look various parts of the above program:\r\nâ€¢	The C++ language defines several headers, which contain information that is either necessary or useful to your program. For this program, the header <iostream> is needed.\r\nâ€¢	The line using namespace std; tells the compiler to use the std namespace. Namespaces are a relatively recent addition to C++.\r\nâ€¢	The next line // main() is where program execution begins. is a single-line comment available in C++. Single-line comments begin with // and stop at the end of the line.\r\nâ€¢	The line int main() is the main function where program execution begins.\r\nâ€¢	The next line cout << "This is', '2017-08-23 14:09:01', 'test', '9613.docx'),
(3, 'diaries', 'ddd', '2017-08-26 09:29:07', 'test', '16534.docx');

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
  `password` varchar(200) NOT NULL,
  `profile` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parentadd`
--

INSERT INTO `parentadd` (`id`, `child`, `email`, `profession`, `phone`, `datemade`, `name`, `schoolidentity`, `address`, `password`, `profile`) VALUES
(2, 'tokunbo isaiah', 'test@gmail.com', 'programmer', '07030135861', '2017-08-23 12:35:10', 'tokunbo isaiah iranlowo', 'test', 'no 25,bdpa,ugbowo,benin', '1234', NULL),
(6, 'abdulmalik maleek', 'test@gmail.comerde', 'programmerb', '070', '2017-10-17 17:24:26', 'tokunbo', 'test', 'n0 8 ikorodu', '1234', NULL),
(5, 'tokunbo', 'test@gmail.comw', 'programme', '07', '2017-10-16 08:52:54', 'tokunbo', 'tomilola nur and primary school akure', 'n0 8 ikorodu', '12345', '5490.jpg');

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
  `plan` varchar(200) DEFAULT NULL,
  `free_trial_status` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `teller_no`, `teller_image`, `schoolidentity`, `confirm`, `admin`, `school_logo`, `datemade`, `plan`, `free_trial_status`) VALUES
(2, '8989898', '5014.PNG', 'test', 'pending', 'test', '386610227.jpg', '2017-06-07 19:10:46', NULL, 'free trial expired'),
(3, NULL, NULL, 'Skyhigh international academy', 'free trial', 'Aishatu suleiman', '1761050130.jpg', '2017-06-29 05:07:22', NULL, ''),
(4, '000786789', '10465.PNG', 'tomilola nur and primary school akure', 'pending', 'tom', '9234.jpg', '2017-10-10 09:35:49', NULL, ''),
(6, '000786789n', '4714.jpg', 'music nur and primary school', 'pending', 'ondo', '21055.jpg', '2017-10-16 10:03:25', NULL, NULL),
(7, NULL, NULL, 'toluwa nur and pry school', 'free trial', 'tyjohnson', '8936.jpg', '2017-10-16 13:13:41', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(30) NOT NULL,
  `questions` varchar(200) NOT NULL,
  `option_A` varchar(200) NOT NULL,
  `option_B` varchar(200) NOT NULL,
  `option_C` varchar(200) NOT NULL,
  `option_D` varchar(200) NOT NULL,
  `Answers` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `schoolidentity` varchar(200) NOT NULL,
  `datemade` datetime NOT NULL,
  `class` varchar(200) NOT NULL,
  `teacher` varchar(200) NOT NULL,
  `time` varchar(200) DEFAULT NULL,
  `format` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `questions`, `option_A`, `option_B`, `option_C`, `option_D`, `Answers`, `subject`, `schoolidentity`, `datemade`, `class`, `teacher`, `time`, `format`) VALUES
(20, 'mr mike is a &lt;b&gt;thin &lt;/b&gt;man&lt;br&gt;', 'fat', 'thin', 'plumpy', 'short', 'A', 'chemistry', 'tomilola nur and primary school akure', '2017-10-27 16:25:04', 'jss11', 'tokunbo', '20', 'm'),
(21, 'mr ibu is a &lt;b&gt;greedy &lt;/b&gt;man__________________&lt;br&gt;', 'selfless', 'appreciative', 'glutton', 'good', 'A', 'chemistry', 'tomilola nur and primary school akure', '2017-10-27 16:26:19', 'jss11', 'tokunbo', '20', 'm'),
(22, 'i &lt;b&gt;love &lt;/b&gt;him&lt;br&gt;', 'like', 'hate', 'greet', 'geed', 'B', 'chemistry', 'tomilola nur and primary school akure', '2017-10-27 16:27:16', 'jss11', 'tokunbo', '20', 'm');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `schoolidentity` varchar(200) NOT NULL,
  `results` varchar(200) NOT NULL,
  `datemade` datetime NOT NULL,
  `class` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`id`, `name`, `schoolidentity`, `results`, `datemade`, `class`, `subject`) VALUES
(11, 'tokunbo', 'tomilola nur and primary school akure', '100%', '2017-10-28 16:47:28', 'jss11', 'chemistry');

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
  `subjects` varchar(200) NOT NULL,
  `datemade` datetime NOT NULL,
  `schoolidentity` varchar(200) NOT NULL,
  `class` varchar(200) DEFAULT NULL,
  `pics` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `ca1` varchar(200) DEFAULT NULL,
  `ca2` varchar(200) DEFAULT NULL,
  `ca3` varchar(200) DEFAULT NULL,
  `midterm` varchar(200) DEFAULT NULL,
  `exam` varchar(200) DEFAULT NULL,
  `admission_number` varchar(200) NOT NULL,
  `cummulative` varchar(200) DEFAULT NULL,
  `grade` varchar(200) DEFAULT NULL,
  `teacher_remark` text,
  `student_pos` varchar(200) DEFAULT NULL,
  `nos_of_student` varchar(200) DEFAULT NULL,
  `session` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `subjects`, `datemade`, `schoolidentity`, `class`, `pics`, `name`, `ca1`, `ca2`, `ca3`, `midterm`, `exam`, `admission_number`, `cummulative`, `grade`, `teacher_remark`, `student_pos`, `nos_of_student`, `session`) VALUES
(114, 'maths', '2017-09-01 15:24:25', 'test', 'jss1', '19412.jpg', 'test', '2', '2', '2', '3', '70', '12346', '52', 'C5', '', '', '', NULL),
(113, 'elementary science', '2017-09-01 15:23:22', 'test', 'jss1', '19412.jpg', 'test', '10', '10', '10', '6', '60', '12346', '54', 'C4', '', '', '', NULL),
(117, 'elementary science', '2017-09-01 21:53:16', 'test', 'jss1', '17382.jpg', 'tokunbo isaiah', '10', '3', '3', '6', '50', '1234', '57', 'B2', 'good result but you can do better', '1', '40', NULL),
(118, 'maths', '2017-09-01 21:53:50', 'test', 'jss1', '17382.jpg', 'tokunbo isaiah', '10', '4', '56', '34', '70', '1234', '76', 'A1', 'good result but you can do better', '1', '40', NULL),
(119, 'elementary science', '2017-09-02 19:13:56', 'test', 'jss1', '28876.jpg', 'abdulmalik maleek', '10', '56', '30', '3', '50', '2342562', '56', 'C4', 'good result , but need to step up , probably stop coding', '13', '56', NULL);

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
(2, 'jss1', '2017/2018', 't8lqWtKyoW7QcJd7iFT6', '2017-07-11 03:33:47', 'test', 'Free', '', '3', '3'),
(3, 'jss11', '2017/2018', '4YwKxUH5oubrWkop5uAX', '2017-10-17 14:56:28', 'tomilola nur and primary school akure', 'Commercial', '400', '2', '2'),
(4, 'jss11', '2017/2018', 'gRJVTXgv4HVGyv799RDG', '2017-10-18 14:17:25', 'tomilola nur and primary school akure', 'Commercial', '400', '2', '0');

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
(1, 'test', 'peterdbrainy5@gmail.com', 'test101', 'jss1', '2017-06-07 19:13:30', '2055951817.jpg', 'test', 'n0 8 ikorodu', 'male', '1992', 'test', NULL, NULL),
(3, 'tokunbo isaiah', 'tesingt@gmail.com', '1234', 'jss1', '2017-08-14 08:09:53', '3469.jpg', 'test', 'no 25,bdpa,ugbowo,benin', 'male', '1992', '1234', NULL, NULL),
(5, 'abdulmalik maleek', 'tokunboisaiah@yahoo.comert', '2342562', 'jss1', '2017-09-02 19:12:24', '28876.jpg', 'test', 'no 25,bdpa,ugbowo,benin', 'male', '1992', '1234', NULL, NULL),
(8, 'tokunbo isaiah iranlowo', 'test@gmail.comdf', '1234dfeer', 'jss11', '2017-10-15 14:21:33', '22424.jpg', 'tomilola nur and primary school akure', 'n0 8 ikorod', 'male', '1992', '1234567', NULL, NULL),
(7, 'tokunbo', 'test@gmail.com', '07030135861', 'jss11', '2017-10-15 14:17:10', '12819.PNG', 'tomilola nur and primary school akure', 'n0 8 ikorodu', 'male', '1992', '1234', 'paid', '2017/2018');

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

--
-- Dumping data for table `subjectadd`
--

INSERT INTO `subjectadd` (`id`, `subject`, `category`, `datemade`, `schoolidentity`) VALUES
(1, 'elementary science', 'pre-school', '2017-08-23 14:25:06', 'test'),
(2, 'maths', 'primary/basic', '2017-08-23 14:25:46', 'test'),
(3, 'chemistry', 'senior secondary', '2017-09-02 19:07:07', 'test'),
(4, 'physics', 'senior secondary', '2017-09-02 19:07:18', 'test'),
(5, 'chemistry', 'senior secondary', '2017-10-16 14:56:27', 'tomilola nur and primary school akure');

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
(1, 'test@gmail.com', '0', '2017-06-07 19:12:11', 'test', 'test', 'n0 8 ikorodu', 'male', '1992', '491791540.jpg', '1234'),
(2, 'isaiahtokunbo11@gmail.coms', '07030135861', '2017-10-15 14:08:26', 'tomilola nur and primary school akure', 'test6', 'no 25,bdpa,ugbowo,benin', 'male', '1992', '26738.jpg', '1234'),
(4, 'test@gmail.com', '07030135861', '2017-10-16 08:25:00', 'tomilola nur and primary school akure', 'tokunbo', 'no 25,bdpa,ugbowo,benin', 'male', '1992', '7198.jpg', '12345');

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

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`id`, `class`, `subjects`, `days`, `hours`, `minutes`, `meridean`, `ending_time_hour`, `ending_time_minute`, `ending_meridean`, `datemade`, `schoolidentity`, `status`) VALUES
(1, 'jss1', 'elementary science', 'monday', '7', '30', 'am', '5', '10', 'pm', '2017-08-23 14:56:24', 'test', 0),
(2, 'jss1', 'elementary science', 'tuesday', '6', '25', 'am', '4', '15', 'pm', '2017-08-23 14:57:48', 'test', 0);

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
  `payment` varchar(200) DEFAULT 'deactivated',
  `no_of_students` varchar(200) NOT NULL,
  `admin_logo` varchar(200) DEFAULT NULL,
  `schoolfees` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `schoolname`, `administrator`, `password`, `datemade`, `logo`, `schooladdress`, `email`, `about`, `adminemail`, `pricingplan`, `phone_no`, `session`, `school_phone`, `status`, `payment`, `no_of_students`, `admin_logo`, `schoolfees`) VALUES
(3, 'Skyhigh international academy', 'Aishatu suleiman', 'fcd25c2fa7f0282231da669accc70fbc0c9c0f4c', '2017-06-29 04:50:26', '1761050130.jpg', 'Old Nasarawa road keffi', 'skyhighinternationalacademy@gmail.com', NULL, 'Sulaimanaishatusuleiman@gmail.com', 'BASIC', NULL, NULL, NULL, 0, 'deactivated', '', NULL, NULL),
(2, 'test', 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', '2017-06-07 19:10:12', '386610227.jpg', 'test', 'test@gmail.com', NULL, 'test@gmail.com', 'BASIC', NULL, NULL, NULL, 1, 'activated', '', '28254.jpg', NULL),
(4, 'tomilola nur and primary school akure', 'tom', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2017-10-09 17:23:25', '29973.jpg', 'n0 8 queeen college', 'isaiahtokunbo11@gmail.come', 'hello', 'test2@gmail.come', 'REGULAR', NULL, '2017/2018', '', 1, 'activated', '300', '11926.jpg', '#25,000'),
(15, 'toluwa nur and pry school', 'tyjohnson', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2017-10-16 13:22:53', '29484.jpg', 'akure , ondo state', 'test@gmail.comerd', NULL, 'test2@gmail.comee', 'PROFESSIONAL', NULL, '2017/2018', NULL, 0, 'deactivated', '200', NULL, NULL);

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
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
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
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bulk`
--
ALTER TABLE `bulk`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `grade_result`
--
ALTER TABLE `grade_result`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `parentadd`
--
ALTER TABLE `parentadd`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `recyclebin`
--
ALTER TABLE `recyclebin`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
--
-- AUTO_INCREMENT for table `scratch_card`
--
ALTER TABLE `scratch_card`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `studentadd`
--
ALTER TABLE `studentadd`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `subjectadd`
--
ALTER TABLE `subjectadd`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `teacheradd`
--
ALTER TABLE `teacheradd`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
