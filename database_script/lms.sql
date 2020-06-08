-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 08, 2020 at 02:47 PM
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
  `course_file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `dept_id`, `course_name`, `course_file`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Course1', '1591528184.pdf', 1, '2020-06-07 12:14:25', '2020-06-07 12:14:25'),
(2, 3, 'ou', '1591514826.pdf', 1, '2020-06-07 12:27:05', '2020-06-07 12:27:05'),
(3, 1, 'c', '1591515591.pdf', 2, '2020-06-07 12:39:50', '2020-06-07 12:39:50'),
(4, 3, 'cc', '1591515614.pdf', 2, '2020-06-07 12:40:14', '2020-06-07 12:40:14'),
(5, 1, 'CD', '1591515705.docx', 2, '2020-06-07 12:41:45', '2020-06-07 12:41:45'),
(6, 1, 'yyyyyyyyyyy', '1591516138.pdf', 1, '2020-06-07 12:48:37', '2020-06-07 12:48:37');

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
  `dept_id` bigint(20) DEFAULT '0',
  `exercise_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `exercise_file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exercise`
--

INSERT INTO `exercise` (`id`, `dept_id`, `exercise_name`, `exercise_file`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'E1', '1591517370.docx', 2, '2020-06-07 13:08:40', '2020-06-07 13:08:40'),
(2, 3, 'E2', '1591517337.pdf', 1, '2020-06-07 13:08:56', '2020-06-07 13:08:56');

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
(1, 1, 'Which of following programnibg language developed by microsoft?', 'PHP', 'C#', 'Nodejs', 'Python', 2, 2, '2020-06-05 14:58:35', '2020-06-05 14:58:35'),
(2, 1, 'Which of following developed by Ryan Dahl?', 'C++', 'Python', 'React', 'Nodejs', 4, 2, '2020-06-05 14:58:35', '2020-06-05 14:58:35'),
(3, 5, 'Select products developed by google?', 'GMail', '', '', '', 0, 2, '2020-06-05 14:58:35', '2020-06-05 14:58:35'),
(4, 10, 'Select products developed by google?', 'React', '', '', '', 0, 1, '2020-06-05 14:58:35', '2020-06-05 14:58:35'),
(5, 1, 'What is the color of banana?', 'red', 'purple', 'brown', 'yellow', 4, 2, '2020-06-06 15:58:22', '2020-06-06 15:58:22'),
(6, 1, 'What stands for PHP?', 'pa hey per', 'hypertext preprocessor', 'Programming Hyper text', 'Programing hell processor', 2, 2, '2020-06-06 16:01:46', '2020-06-06 16:01:46'),
(7, 1, 'What is the color of apple?', 'blue', 'red', 'yellow', 'black', 2, 2, '2020-06-06 19:15:56', '2020-06-06 19:15:56'),
(8, 1, 'What is the color of apple?', 'blue', 'red', 'yellow', 'Programing hell processor', 2, 2, '2020-06-06 19:17:07', '2020-06-06 19:17:07'),
(9, 1, 'What is the color of apple?', 'blue', 'red', 'yellow', 'black', 2, 1, '2020-06-06 19:42:33', '2020-06-06 19:42:33');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` bigint(20) NOT NULL,
  `dep_id` bigint(20) DEFAULT '0',
  `quiz_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `question_count` tinyint(4) NOT NULL DEFAULT '0',
  `quiz_time` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `dep_id`, `quiz_name`, `question_count`, `quiz_time`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Programming Quiz', 11, 120, 1, '2020-06-06 12:39:05', '2020-06-06 12:39:05'),
(2, 1, 'Quiz Great', 5, 180, 1, '2020-06-06 12:57:33', '2020-06-06 12:57:33'),
(3, 1, 'Quizo', 0, 360, 1, '2020-06-06 12:59:23', '2020-06-06 12:59:23'),
(4, 1, 'First Quiz', 0, 120, 1, '2020-06-06 13:00:41', '2020-06-06 13:00:41'),
(5, 1, 'My Quiz', 0, 60, 2, '2020-06-06 13:02:16', '2020-06-06 13:02:16'),
(6, 1, 'Q', 0, 120, 1, '2020-06-06 13:02:40', '2020-06-06 13:02:40');

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
(5, 'Ammar', 'amaar@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '2020-06-05 16:29:45', '2020-06-05 16:29:45'),
(6, 'Zia', 'zia@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, '2020-06-05 16:24:09', '2020-06-05 16:24:09');

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
  `dept_id` bigint(20) DEFAULT '0',
  `video_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `video_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `dept_id`, `video_name`, `video_link`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Awesome Video', 'https://www.youtube.com/watch?v=4dsFQFCvVGU--', 2, '2020-06-07 13:37:01', '2020-06-07 13:37:01');

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `exercise`
--
ALTER TABLE `exercise`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `question_answer`
--
ALTER TABLE `question_answer`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_quiz`
--
ALTER TABLE `user_quiz`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;