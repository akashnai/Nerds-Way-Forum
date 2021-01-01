-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2021 at 07:25 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nerdsway`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(8) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `created`) VALUES
(1, 'python', 'Python is an interpreted, high-level and general-purpose programming language. Python\'s design philosophy emphasizes code readability with its notable use of significant whitespace.', '2020-12-27 10:19:23'),
(2, 'javascript', 'JavaScript, often abbreviated as JS, is a programming language that conforms to the ECMAScript specification. JavaScript is high-level, often just-in-time compiled, and multi-paradigm. It has curly-bracket syntax, dynamic typing.', '2020-12-27 10:20:21'),
(3, 'Django', 'Django is a Python-based free and open-source web framework that follows the model-template-views architectural pattern. It is maintained by the Django Software Foundation, an American independent organization established as a 501 non-profit.', '2020-12-27 12:31:29'),
(4, 'flask', 'Flask is a micro web framework written in Python. It is classified as a microframework because it does not require particular tools or libraries. It has no database abstraction layer, form validation.', '2020-12-27 12:31:41'),
(5, 'React', 'React is an open-source, front end, JavaScript library for building user interfaces or UI components. It is maintained by Facebook and a community of individual developers and companies.', '2020-12-28 22:49:35'),
(6, 'Node.js', 'Node.js® is a JavaScript runtime built on Chrome\'s V8 JavaScript engine. Node.js is an open-source, cross-platform, back-end, JavaScript runtime environment that executes JavaScript code outside a web browser. ', '2020-12-28 22:53:10');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(8) NOT NULL,
  `comment_content` text NOT NULL,
  `thread_id` int(8) NOT NULL,
  `comment_by` int(8) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES
(2, 'you can just type python on google, then find a documentation for python, go there and start learning', 1, 1, '2020-12-28 22:45:13'),
(3, 'get a book named learn python the hard way or automate the boring stuff with python', 2, 1, '2020-12-28 22:46:32'),
(4, 'Python is good language', 1, 1, '2020-12-28 23:10:10'),
(6, 'yes it is', 1, 6, '2020-12-29 10:09:37'),
(7, 'its a framework maybe, not sure google it before testing', 5, 6, '2020-12-29 10:51:20'),
(8, '&lt;script&gt;alert(\"test\");&lt;/script&gt;', 9, 6, '2020-12-29 11:07:27'),
(9, '&lt;script&gt;alert(\"test\");&lt;/script&gt;', 9, 6, '2020-12-29 11:08:01'),
(10, '&lt;script&gt;alert(\"test\");&lt;/script&gt;', 10, 6, '2020-12-29 11:11:05');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(7) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_cat_id` int(7) NOT NULL,
  `thread_user_id` int(7) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES
(1, 'what is python?', 'suggest resources to learn python', 1, 4, '2020-12-28 22:43:28'),
(2, 'how to start learning python?', 'suggest some books for learning python with hacking related', 1, 4, '2020-12-28 22:44:16'),
(3, 'what is javascript?', 'share some resources to start learning js', 2, 1, '2020-12-28 23:02:46'),
(4, 'what is Django ?', 'need some resources to learn Django ', 3, 1, '2020-12-28 23:03:07'),
(5, 'what is Node.js ? somebody explain', 'plz help', 6, 1, '2020-12-28 23:06:21'),
(6, 'what is flask ?', 'I have to do some web dev stuff on flask, someone help', 4, 1, '2020-12-28 23:07:04'),
(7, 'is react good?', 'i need to know', 5, 1, '2020-12-28 23:08:14'),
(8, 'how to hack nasa using python?', 'I need to go to mars. need help', 1, 1, '2020-12-28 23:09:49'),
(9, '<script>alert(\"test\");</script>', 'testing', 1, 6, '2020-12-29 11:06:36'),
(10, 'test', 'test', 1, 6, '2020-12-29 11:10:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(11) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `user_email`, `user_pass`, `timestamp`) VALUES
(1, 'akashnai658@gmail.com', '$2y$10$l.69VaWRJbowxtxy6Szb6.HhzX9KhW.qMmmiYd4ICy/k..R3TdTo.', '2020-12-28 22:12:08'),
(2, 'a@a.com', '$2y$10$UAMfLCULayltAO9tNjyZr.tK3BNDEKl//qoV815mXAKLsSEi0lWWu', '2020-12-28 22:14:14'),
(3, 'vivek@vib.com', '$2y$10$4PZyFzrRFgYF/ag9O1geyOKpbRH1YjOz1724Y9wU5YIaBPNyEOau2', '2020-12-28 22:14:25'),
(4, 'test@test.com', '$2y$10$u9cdYMer8sZD.F9ViIiEHOLL8TP2LItBkj4.I0fAp7NRHfsydoB7a', '2020-12-28 22:14:38'),
(5, 'arvind@test.com', '$2y$10$a1MCWmx6kiFmsUhgXh5CIOi7PFOjePtYOQaeBa1rl.NDiZPwoACAm', '2020-12-28 22:14:52'),
(6, 'a', '$2y$10$.CUYGEW8QelDNYTrWaonROSyPF7kPMty7sBQGKuJFkq.zXrsM/JNa', '2020-12-29 09:51:07'),
(7, 'akash', '$2y$10$XiTmNXOh/Y4t2A6Jl00ET.loYELfgseOImkWx.JBLdV9IyBZEp0cW', '2020-12-29 13:34:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_desc`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
