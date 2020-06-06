-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 06, 2020 at 03:14 PM
-- Server version: 5.7.30-0ubuntu0.18.04.1
-- PHP Version: 5.6.40-29+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` bigint(20) NOT NULL,
  `dept_id` bigint(20) NOT NULL DEFAULT '0',
  `course_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` bigint(20) NOT NULL,
  `dep_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dep_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Computer', 1, '2020-06-06 12:33:06', '2020-06-06 12:33:06'),
(2, 'Economics', 1, '2020-06-06 12:33:06', '2020-06-06 12:33:06'),
(3, 'Finance', 1, '2020-06-06 15:02:39', '2020-06-06 15:02:39'),
(4, 'IT', 2, '2020-06-06 15:05:49', '2020-06-06 15:05:49');

-- --------------------------------------------------------

--
-- Table structure for table `exercise`
--

CREATE TABLE `exercise` (
  `id` bigint(20) NOT NULL,
  `dep_id` bigint(20) DEFAULT '0',
  `exercise_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question_answer`
--

CREATE TABLE `question_answer` (
  `id` bigint(20) NOT NULL,
  `quiz_id` bigint(20) NOT NULL DEFAULT '0',
  `question` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `answer_1` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `answer_2` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `answer_3` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `answer_4` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `correct_answer` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `question_answer`
--

INSERT INTO `question_answer` (`id`, `quiz_id`, `question`, `answer_1`, `answer_2`, `answer_3`, `answer_4`, `correct_answer`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Select products developed by google?', 'Gogle earth', '', '', '', 1, 2, '2020-06-05 14:58:35', '2020-06-05 14:58:35'),
(2, 4, 'Select products developed by google?', 'MS office', '', '', '', 0, 1, '2020-06-05 14:58:35', '2020-06-05 14:58:35'),
(3, 5, 'Select products developed by google?', 'GMail', '', '', '', 0, 1, '2020-06-05 14:58:35', '2020-06-05 14:58:35'),
(4, 10, 'Select products developed by google?', 'React', '', '', '', 0, 1, '2020-06-05 14:58:35', '2020-06-05 14:58:35');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` bigint(20) NOT NULL,
  `dep_id` bigint(20) DEFAULT '0',
  `quiz_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `question_count` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `dep_id`, `quiz_name`, `question_count`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Best Quiz updated', 0, 2, '2020-06-06 12:39:05', '2020-06-06 12:39:05'),
(2, 1, 'Quiz Great', 0, 1, '2020-06-06 12:57:33', '2020-06-06 12:57:33'),
(3, 1, 'Quizo', 0, 1, '2020-06-06 12:59:23', '2020-06-06 12:59:23'),
(4, 1, 'First Quiz', 0, 1, '2020-06-06 13:00:41', '2020-06-06 13:00:41'),
(5, 1, 'My Quiz', 0, 1, '2020-06-06 13:02:16', '2020-06-06 13:02:16'),
(6, 1, 'Q', 0, 1, '2020-06-06 13:02:40', '2020-06-06 13:02:40'),
(7, 1, 'Q', 0, 1, '2020-06-06 13:03:24', '2020-06-06 13:03:24'),
(8, 1, 'Q', 0, 1, '2020-06-06 13:04:23', '2020-06-06 13:04:23'),
(9, 1, 'Qd', 0, 1, '2020-06-06 13:06:10', '2020-06-06 13:06:10');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `full_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `full_name`, `email`, `password`, `is_admin`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Javed', 'javed@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '2020-06-05 00:00:00', '2020-06-05 00:00:00'),
(2, 'Zia', 'zia@gmail.com', '112233', 0, 1, '2020-06-05 16:24:09', '2020-06-05 16:24:09'),
(3, 'Tehzeeb', 'tehzeeb@gmail.com', '123456', 1, 1, '2020-06-05 16:24:47', '2020-06-05 16:24:47'),
(4, 'Shan', 'Tehzeeb Hussain', '123456', 1, 1, '2020-06-05 16:25:30', '2020-06-05 16:25:30'),
(5, 'Ammar', 'amaar@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '2020-06-05 16:29:45', '2020-06-05 16:29:45');

-- --------------------------------------------------------

--
-- Table structure for table `user_quiz`
--

CREATE TABLE `user_quiz` (
  `id` bigint(20) NOT NULL,
  `quiz_id` bigint(20) NOT NULL DEFAULT '0',
  `question_identifier` bigint(20) NOT NULL,
  `question_answer_id` bigint(20) NOT NULL,
  `is_correct_answer_given` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` bigint(20) NOT NULL,
  `dep_id` bigint(20) DEFAULT '0',
  `exercise_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exercise`
--
ALTER TABLE `exercise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_answer`
--
ALTER TABLE `question_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_quiz`
--
ALTER TABLE `user_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `exercise`
--
ALTER TABLE `exercise`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `question_answer`
--
ALTER TABLE `question_answer`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_quiz`
--
ALTER TABLE `user_quiz`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
