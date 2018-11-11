-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2017 at 10:00 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digi_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `commented_post_id` int(11) NOT NULL,
  `commented_user_id` int(11) NOT NULL,
  `commented_username` varchar(30) NOT NULL,
  `comment_body` text NOT NULL,
  `comment_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `commented_post_id`, `commented_user_id`, `commented_username`, `comment_body`, `comment_created`) VALUES
(1, 7, 1, 'Bhuiyan Mobasshir', 'Commented!!!!', '2017-11-26 03:53:15'),
(2, 7, 5, 'Kamrul Huda', 'Commented from Sixth One!!!', '2017-11-26 04:04:57'),
(3, 7, 1, 'Bhuiyan Mobasshir', 'Hello from Sixth Onee!!!!', '2017-11-26 04:07:17'),
(4, 6, 1, 'Bhuiyan Mobasshir', 'Hi from Fifth Hitted!!!', '2017-11-26 04:08:12'),
(5, 6, 5, 'Kamrul Huda', 'hi ()', '2017-11-26 04:09:04'),
(6, 9, 7, 'Imran', 'hi!!!', '2017-11-26 14:10:16'),
(7, 10, 5, 'Kamrul Huda', 'Hi I am kamrul Huda Tamim', '2017-11-27 20:42:46'),
(8, 11, 5, 'Kamrul Huda', 'Hi Commented simultaneously !!!', '2017-11-27 21:42:44'),
(9, 3, 4, 'Riaz Hoassain', 'Hi I am Mobasshir Bhuiyan Here !!!!', '2017-11-27 22:38:45'),
(10, 12, 1, 'Bhuiyan Mobasshir', 'My Comments!!!!', '2017-11-27 22:47:52'),
(11, 13, 4, 'Riaz Hoassain', 'Hi I am Riaz hossain here by !!!', '2017-11-28 23:53:28');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `posted_user_type` varchar(30) NOT NULL,
  `posted_user_id` int(11) NOT NULL,
  `posted_username` varchar(30) NOT NULL,
  `post_body` text NOT NULL,
  `post_created` datetime NOT NULL,
  `post_moderator_id` int(11) DEFAULT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `posted_user_type`, `posted_user_id`, `posted_username`, `post_body`, `post_created`, `post_moderator_id`, `status`) VALUES
(9, 'User', 7, 'Imran', 'HI From Class!!', '2017-11-26 14:08:27', NULL, 'Approved'),
(10, 'User', 5, 'Kamrul Huda', 'Hi from last post!!!!', '2017-11-27 20:40:31', NULL, 'Approved'),
(11, 'User', 5, 'Kamrul Huda', 'After Session (*_*) @@@', '2017-11-27 21:28:14', NULL, 'Disapproved'),
(12, 'Admin', 1, 'Bhuiyan Mobasshir', 'Admin Mobasshir Bhuiyan Here !!!!', '2017-11-27 21:43:25', NULL, 'Disapproved'),
(13, 'Moderator', 4, 'Riaz Hoassain', 'Hi This is the latest post from moderator!!!!!', '2017-11-28 23:52:48', NULL, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `user_type` varchar(30) NOT NULL,
  `image` varchar(40) DEFAULT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `user_type`, `image`, `status`) VALUES
(1, 'Bhuiyan Mobasshir', 'mobasshir1234', 'mobasshir@dhc.com', 'Admin', 'mobasshir.png', 'Approved'),
(2, 'Peu Roy', 'roy1234', 'peu@dhc.com', 'User', NULL, 'Approved'),
(3, 'Amite Baral', 'kumar1234', 'amite@dhc.com', 'User', NULL, 'Disapproved'),
(4, 'Riaz Hoassain', 'riaz1234', 'riaz@gmail.com', 'Moderator', NULL, 'Approved'),
(5, 'Kamrul Huda', 'huda1234', 'huda@gmail.com', 'User', NULL, 'Approved'),
(6, 'Roy Peu', 'peu1234', 'peu@gmail.com', 'User', NULL, 'Disapproved'),
(7, 'Imran', 'imran1234', 'imran@gmail.com', 'User', NULL, 'Disapproved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
