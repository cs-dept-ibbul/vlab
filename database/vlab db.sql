-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2021 at 10:17 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vlab`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `enrollment_code` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `school_id`, `faculty_id`, `title`, `code`, `description`, `status`, `video_url`, `remember_token`, `created_at`, `updated_at`, `enrollment_code`, `session_id`) VALUES
('211d7316-c996-469d-aad5-8e7ad1e27726', '1', '1', '1introduction to physics practic', 'phy 123', 'klweio 2o weoo', 'Active', 'youtube.com/seko23', NULL, NULL, '2021-05-14 04:17:41', '12345', 'abcf97dd-3ce4-4de3-a765-abebcdd2a585'),
('d531b477-bece-44c4-9e43-745a988792ce', '1', '1', 'introduction to physics practic', 'phy 108', 'course_description', 'Active', '', NULL, NULL, '2021-05-06 09:52:11', '12345e', 'abcf97dd-3ce4-4de3-a765-abebcdd2a585'),
('d531b477-bece-44c4-9e43-745a988792cf', '1', '1', 'introduction to physics practic', 'phy 107', 'course_description', 'Active', '', NULL, NULL, '2021-05-06 09:52:11', '12345e', 'abcf97dd-3ce4-4de3-a765-abebcdd2a585');

-- --------------------------------------------------------

--
-- Table structure for table `course_experiment`
--

CREATE TABLE `course_experiment` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experiment_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_experiment`
--

INSERT INTO `course_experiment` (`id`, `course_id`, `experiment_id`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
('309ac155-0f24-433a-90cb-60a2cf1cb316', '211d7316-c996-469d-aad5-8e7ad1e27726', '4cfec3f5-526f-4fed-a96b-27c3f53a6783', 'Active', NULL, NULL, NULL),
('4d793017-544b-40f4-aec2-90ebd5c124e9', 'd531b477-bece-44c4-9e43-745a988792ce', 'a945e793-17d2-4542-a032-b12f100b3d85', 'Active', NULL, '2021-05-15 08:14:01', '2021-05-15 08:14:01'),
('58a60841-c454-43df-99de-b2b6f231ced1', 'd531b477-bece-44c4-9e43-745a988792cf', '22abf888-e27a-4732-9904-c2bdafb1b280', 'Active', NULL, NULL, NULL),
('58a60841-c454-43df-99de-b2b6f231ced3', 'd531b477-bece-44c4-9e43-745a988792cf', '22abf888-e27a-4732-9904-c2bdafb1b280', 'Active', NULL, NULL, NULL),
('bdc568bc-6320-4a6a-9a85-566dca0cf1c0', '211d7316-c996-469d-aad5-8e7ad1e27726', 'a945e793-17d2-4542-a032-b12f100b3d85', 'Active', NULL, NULL, NULL),
('bf0270f4-35ba-4261-84a1-fb0c840beb8c', '211d7316-c996-469d-aad5-8e7ad1e27726', '22abf888-e27a-4732-9904-c2bdafb1b280', 'Active', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_instructor`
--

CREATE TABLE `course_instructor` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instructor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_instructor`
--

INSERT INTO `course_instructor` (`id`, `course_id`, `instructor_id`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
('042ca1e3-a9b2-424a-b43b-e40b457c02b1', '25cfd559-4b3b-45f3-be6f-1b9d37ff2fd8', '2', 'Active', NULL, NULL, NULL),
('101db974-1ded-4abf-a2b2-6e8ccbb414f8', '6f3fc8c3-3c6f-4ca2-9500-ebf9d4707c6c', '2', 'Active', NULL, NULL, NULL),
('2ca176fb-d8a5-4630-b832-7becfbc0c822', '211d7316-c996-469d-aad5-8e7ad1e27726', '22abf888-e27a-4732-9904-c2bdafb1b280', 'Active', NULL, NULL, NULL),
('42f6466b-e0d9-4d18-8530-544651bc2430', '658740b4-9d8c-4b1d-a968-9a829edb59be', 'NaN', 'Active', NULL, NULL, NULL),
('49c8686e-b496-44fc-a7b3-763557200ed2', '3a6d173b-7018-4708-bd4d-c55f6e6d31e2', '1', 'Active', NULL, NULL, NULL),
('700c68f0-d449-4c35-b906-ab6ad8c05a53', '2de6fa55-21dd-4168-989f-6a4d71133fd5', '1', 'Active', NULL, NULL, NULL),
('73fce7a2-6150-4255-a4e1-9a872d32f56b', '6f3fc8c3-3c6f-4ca2-9500-ebf9d4707c6c', '1', 'Active', NULL, NULL, NULL),
('8626f606-24d0-4695-a4df-c7f01b78f8ad', 'b7dcd031-168c-4949-900d-972fe6fa0fa0', '2', 'Active', NULL, NULL, NULL),
('8c0eda4b-6626-4cba-afb1-4fcf56f6985c', '3a6d173b-7018-4708-bd4d-c55f6e6d31e2', '2', 'Active', NULL, NULL, NULL),
('c5555471-4e44-4eb2-a9a5-54900e565340', 'b7dcd031-168c-4949-900d-972fe6fa0fa0', '1', 'Active', NULL, NULL, NULL),
('f2e0b35e-4adb-4fb2-b16a-2c40dcded26c', '9cb2101c-1ef1-4e32-9eeb-4ee53676190d', '1', 'Active', NULL, NULL, NULL),
('f4bcb37b-422a-4d75-a3ac-b040d5921b54', 'd531b477-bece-44c4-9e43-745a988792cf', 'NaN', 'Active', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_resources`
--

CREATE TABLE `course_resources` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resourceUrl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_resources`
--

INSERT INTO `course_resources` (`id`, `course_id`, `resourceUrl`, `caption`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
('5a286843-b5e8-4273-b33a-4fe3eff65a05', 'd531b477-bece-44c4-9e43-745a988792cf', 'images/resources/simple_pendulum.jpg', 'image caption goes here', 'Active', NULL, NULL, NULL),
('c05377a5-a003-40cb-a7aa-f836b98ba12a', '211d7316-c996-469d-aad5-8e7ad1e27726', 'images/resources/1-05-12-2021-08pm.PNG', 'review', 'Active', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `school_id`, `faculty_id`, `name`, `code`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
('34f47725-bfa5-412e-b7a9-edf318671ed2', '1', '2e9a8345-0869-4138-a0f5-d6b925188131', 'computer science', 'csc', 'Active', NULL, '2021-04-10 11:40:20', '2021-04-24 02:58:37'),
('43228f73-2ceb-4b27-b24b-9eed7fe1215c', '1', 'b688d83e-6ebc-4967-8998-3cb5224ddb8a', 'wew', 'wewe', 'Inactive', NULL, '2021-05-03 13:32:50', '2021-05-03 13:33:12'),
('47107e64-2381-4e62-beb0-bc5fdca6ee9f', '1', '1', 'new', 'eee', 'Inactive', NULL, '2021-05-03 13:23:45', '2021-05-03 13:33:34'),
('4da0bb73-e628-468c-a2b3-da0ca2b645aa', '1', '1', 'sawe', 'wew', 'Inactive', NULL, '2021-05-03 13:28:08', '2021-05-03 13:33:21'),
('70367a3c-6de0-4983-b725-3ba6e6c19263', '1', '2e9a8345-0869-4138-a0f5-d6b925188131', 'biology', 'bio', 'Active', NULL, '2021-05-03 12:51:16', '2021-05-03 12:51:16'),
('cd0daaff-67b5-4415-992c-e57cc63bd972', '1', '2e9a8345-0869-4138-a0f5-d6b925188131', 'Physics', 'phy', 'Active', NULL, '2021-04-10 12:35:58', '2021-05-03 12:29:05');

-- --------------------------------------------------------

--
-- Table structure for table `experiments`
--

CREATE TABLE `experiments` (
  `id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experiment_intro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experiment_goal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experiment_diagram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apparatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experiment_resource` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `procedures` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exercise` varchar(3000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tables` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL,
  `graph` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL,
  `page` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experiments`
--

INSERT INTO `experiments` (`id`, `name`, `experiment_intro`, `experiment_goal`, `experiment_diagram`, `apparatus`, `experiment_resource`, `procedures`, `exercise`, `required`, `video_url`, `faculty_id`, `tables`, `graph`, `page`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
('22abf888-e27a-4732-9904-c2bdafb1b280', 'Simple Pendulum', 'undefined', 'sdfa', '-', '-', '-', '-', '-', 'undefined', 'https://www.youtube.com/watch?v=r2gnD5NEplY', '1', 'false', 'false', 'simple-pendulum', 'Active', NULL, '2021-05-05 10:57:49', '2021-05-05 10:57:49'),
('4cfec3f5-526f-4fed-a96b-27c3f53a6783', 'Simple Pendulum', 'undefined', 'asadfsaf3223', 'images/resources/simple_pendulum.jpg', '-', '-', '-', '<p>-</p>', '<ol><li>Enter your readings in the record shhet provided in Table 1</li><li>Plot a graph of UV against U + V Determine the slope of your graph and explain its meaning</li><li>Plot a graph of and deduce from your graph</li></ol>', 'https://www.youtube.com/watch?v=r2gnD5NEplY', '1', 'false', 'false', 'simple-pendulum', 'Active', NULL, '2021-05-05 11:52:05', '2021-05-05 15:01:08'),
('a945e793-17d2-4542-a032-b12f100b3d85', 'Simple Pendulum2', 'undefined', 'asdsaf', '/public/images/resources/simple_pendulum.jpg', '-', '-', '-', '-', 'undefined', 'https://www.youtube.com/watch?v=r2gnD5NEplY', '1', 'false', 'false', 'simple-pendulum', 'Active', NULL, '2021-05-05 11:42:55', '2021-05-05 11:42:55'),
('f5d98adf-6068-42c2-bbab-ad7094e672ad', 'Simple Pendulum', 'undefined', 'afewwc', '-', '-', '-', '-', '-', 'undefined', 'https://www.youtube.com/watch?v=r2gnD5NEplY', '1', 'false', 'false', 'simple-pendulum', 'Active', NULL, '2021-05-05 10:40:07', '2021-05-05 10:40:07');

-- --------------------------------------------------------

--
-- Table structure for table `experiment_results`
--

CREATE TABLE `experiment_results` (
  `id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experiment_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weekly_work_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result_json` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_started` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_submited` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_left` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `completion_status` enum('Not Started','Started','Completed','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Not Started',
  `status` enum('Active','In Active','','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `remember_token` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experiment_results`
--

INSERT INTO `experiment_results` (`id`, `user_id`, `course_id`, `experiment_id`, `session_id`, `weekly_work_id`, `result_json`, `time_started`, `time_submited`, `time_left`, `completion_status`, `status`, `remember_token`, `updated_at`, `created_at`) VALUES
('516be91a-d4dd-44b7-b3b5-e676b8957bd4', '2', 'd531b477-bece-44c4-9e43-745a988792cf', 'a945e793-17d2-4542-a032-b12f100b3d85', 'abcf97dd-3ce4-4de3-a765-abebcdd2a585', 'd1d65308-857c-41f8-843c-6d03bc88c6a9', '[{\"title\":\"Length of Cylinder\",\"head\":[\"S/NO.\",\"Length(L) (m)\",\"\\n                  Time (t) for 20 oscillations\\n                  \\n                  t1(sec)\\n            \",\"t2(sec)\",\"Average\",\"Period (T) (sec)\",\"T2 (sec2)\"],\"mhead\":\"\\n            <tr><th class=\\\"p-1 fs01 text-center\\\" width=\\\"10%\\\">S/NO.</th>\\n            <th class=\\\"p-1 fs01 text-center\\\" width=\\\"15%\\\">Length(L) (m)</th>\\n            <th class=\\\"p-1 fs01 text-center pt-4\\\" style=\\\"position:relative;\\\" width=\\\"15%\\\">\\n                  <span class=\\\"overlapcells\\\">Time (t) for 20 oscillations</span>\\n                  <br>\\n                  t<sub>1</sub>(sec)\\n            </th>\\n            <th class=\\\"p-1 fs01 text-center pt-3\\\" width=\\\"15%\\\">t<sub>2</sub>(sec)</th>\\n            <th class=\\\"p-1 fs01 text-center pt-3\\\" width=\\\"15%\\\">Average</th>\\n            <th class=\\\"p-1 fs01 text-center\\\" width=\\\"15%\\\">Period (T) (sec)</th>\\n            <th class=\\\"p-1 fs01 text-center\\\" width=\\\"15%\\\">T<sup>2</sup> (sec<sup>2</sup>)</th>\\n          </tr>\",\"data\":[[],[\"1.\",\"12\",\"1\",\"23\",\"34\",\"3\",\"11\"],[\"2.\",\"12\",\"\",\"we\",\"\",\"\",\"\"],[\"3.\",\"23\",\"e\",\"\",\"\",\"\",\"\"],[\"4.\",\"\",\"\",\"\",\"\",\"\",\"\"],[\"5.\",\"32\",\"\",\"\",\"\",\"\",\"\"],[\"6.\",\"\",\"\",\"\",\"\",\"\",\"\"],[\"7.\",\"\",\"\",\"\",\"\",\"\",\"\"],[\"8.\",\"\",\"\",\"\",\"\",\"\",\"\"]]}]', '08/05/2021, 13:37:36', '09/05/2021, 16:52:11', '01:29:39', 'Completed', 'Active', NULL, '2021-05-09 14:52:11.000000', '2021-05-08 11:37:46.000000'),
('abcf97dd-3ce4-4de3-a765-abebcdd2a533', '2', 'd531b477-bece-44c4-9e43-745a988792cf', '22abf888-e27a-4732-9904-c2bdafb1b280', 'abcf97dd-3ce4-4de3-a765-abebcdd2a585', 'd1d65308-857c-41f8-843c-6d03bc88c6a8', '{a:3,b:5}', '10:11', '11:11', '00:00', 'Not Started', 'Active', '', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `school_id`, `name`, `code`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
('0338cf56-1534-4f3f-84c1-cd179e2e367f', '1', 'aews1', 'aewds', 'Inactive', NULL, '2021-04-04 15:01:22', '2021-05-03 11:14:34'),
('1', '1', 'Applied Science', 'app', 'Active', NULL, NULL, NULL),
('15b4edd0-cd9d-48e9-8b45-5bea7d32c227', '1', 'aes1', 'aes', 'Inactive', NULL, '2021-04-04 14:54:03', '2021-05-03 11:14:07'),
('1c1ea912-be44-48ad-b8b6-4291729dc658', '1', 'assd', 'asdf', 'Active', NULL, '2021-04-04 14:25:40', '2021-04-04 14:25:40'),
('2e9a8345-0869-4138-a0f5-d6b925188131', '1', 'Natural Science', 'fns', 'Active', NULL, NULL, NULL),
('2s', '1', 'dsapss', 'fns', 'Active', NULL, '2021-04-04 14:33:46', '2021-05-03 11:50:32'),
('3d5dc56a-df96-498a-ba72-6b39b5c66676', '1', 'aews', 'awes', 'Inactive', NULL, '2021-04-04 15:00:01', '2021-05-03 11:14:27'),
('43712fbb-13fc-450c-b5ff-4643f5ff8a0e', '1', 'as', 'fns', 'Active', NULL, '2021-04-04 14:34:47', '2021-04-04 14:34:47'),
('45ad4d92-372d-4524-8719-8c4259eafdd9', '1', 'aes', 'aes', 'Inactive', NULL, '2021-04-04 14:27:50', '2021-05-03 11:11:33'),
('72f0463f-51b0-4594-baff-4a7bc429bacb', '1', 'aese', 'sad', 'Inactive', NULL, '2021-04-04 14:29:13', '2021-05-03 11:14:20'),
('adac219c-2dae-4ab2-b05e-f2a20720dbb8', '1', 'asda', 'adse', 'Active', NULL, '2021-04-04 14:26:18', '2021-04-04 14:26:18'),
('b688d83e-6ebc-4967-8998-3cb5224ddb8a', '1', 'ewwe', 'awikkyv', 'Active', NULL, '2021-04-04 15:04:37', '2021-04-04 15:04:37'),
('c57ac847-5f74-4832-9035-384d43b731c7', '1', 'aes2', 'aes', 'Inactive', NULL, '2021-04-04 14:55:36', '2021-05-03 11:13:58'),
('e5d6daa5-1237-4fc1-a597-db648dd3ee9c', '1', 'aes23', 'aes', 'Inactive', NULL, '2021-04-04 14:57:34', '2021-05-03 11:14:13'),
('f899649d-565a-4c8f-9249-ca5767c812dc', '1', 'wsy', 'wwe', 'Active', NULL, '2021-04-04 15:03:08', '2021-04-04 15:03:08'),
('ff92e5aa-cc91-4d9d-88c9-814844ccff76', '1', 'new n', 'nn', 'Active', NULL, '2021-04-04 14:22:40', '2021-04-04 14:22:40');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` varchar(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `likes` enum('yes','no') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagename` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `likes`, `message`, `pagename`) VALUES
('3090ea76-d1a5-4ebf-b78d-9dd6e21f8d74', 'yes', 'just like that', 'home'),
('365527a4-38cd-4fb6-8f47-8494836f0d54', 'yes', '-', 'home'),
('5f3acd71-e9a0-4766-bcc3-64c1c60d4f0d', 'yes', '-', 'home'),
('ae7e9e50-bebb-44ae-8924-8f3f825f27e4', 'yes', '-', 'home'),
('bc27feb1-041f-4e9f-b471-d05123345a88', 'yes', '-', 'login'),
('cf69c5d4-08db-4e49-bff0-0a70899a9d33', 'yes', '-', 'home'),
('fc343586-f8e8-4cdd-8160-bb058d884dda', 'yes', 'just like that', 'home');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2021_02_14_150913_create_role_table', 1),
(9, '2021_02_14_150913_create_courses_table', 2),
(10, '2021_02_14_150913_create_experiments_table', 2),
(11, '2021_02_14_150913_create_faculties_table', 2),
(12, '2021_02_14_150913_create_schools_table', 2),
(13, '2021_02_14_150913_create_departments_table', 3),
(14, '2021_02_14_150913_create_experiment_result_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_added` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_modified` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `title`, `description`, `status`, `date_added`, `date_modified`, `remember_token`, `created_at`, `updated_at`) VALUES
('3e836670-a9d5-4c78-bfb8-0bdcda27263c', 'student', '', '', '', '', NULL, NULL, NULL),
('61947969-78e6-4619-be35-50541aef8cb3', 'admin', '', '', '', '', NULL, NULL, NULL),
('9260655c-6933-45a0-8d01-6de3d6a52657', 'instructor', '', '', '', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `code`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
('1', 'Ibrahim Badamasi Babangida University', 'ibbul', 'Active', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive','','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_current` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `created_at` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `session`, `status`, `is_current`, `updated_at`, `created_at`) VALUES
('5ea4a892-2c63-4cb1-abb7-47bd849a46ae', '2020/2021', 'Inactive', '1', '2021-05-03 15:46:26.000000', '2021-04-24 22:07:58.000000'),
('75f4bfcc-75b1-46ea-9458-f2e49639e884', '2022/2023', 'Active', '0', '2021-05-11 11:45:21.000000', '2021-05-11 11:10:55.000000'),
('abcf97dd-3ce4-4de3-a765-abebcdd2a585', '2020/2021', 'Active', '1', '2021-05-11 11:43:32.000000', '2021-05-03 15:46:48.000000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_names` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salute` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matric_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `faculty_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `other_names`, `salute`, `gender`, `role_id`, `email`, `username`, `matric_number`, `phone`, `password`, `user_ip_address`, `token`, `status`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `faculty_id`, `department_id`, `session_id`, `school_id`) VALUES
('1', 'Abdusalam', 'Abubakar Olajide', '', 'male', '', 'bynalabs@gmail.com', 'bynalabs@gmail.com', 'U16/FNS/MTH/1059', '', '827ccb0eea8a706c4c34a16891f84e7b', '', '', 'Active', NULL, NULL, NULL, NULL, '1', 'cd0daaff-67b5-4415-992c-e57cc63bd972', 'abcf97dd-3ce4-4de3-a765-abebcdd2a585', '1'),
('13293f3c-5491-40ad-aac4-c5e7662d7f96', 'murjanatu 6', 'K', '', 'female', '3e836670-a9d5-4c78-bfb8-0bdcda27263c', '6@gmail.com', 'u16/fns/csc/1017', 'u16/fns/csc/1017', '802384743', '21b76ad1136de1df7ecd434ffa27a8e9', '127.0.0.1', NULL, 'Active', NULL, NULL, NULL, NULL, '2e9a8345-0869-4138-a0f5-d6b925188131', '34f47725-bfa5-412e-b7a9-edf318671ed2', 'abcf97dd-3ce4-4de3-a765-abebcdd2a585', '1'),
('1409d4e6-39db-4f19-8747-f4f8e1a3cd7f', 'murjanatu 5', 'K', '', 'female', '3e836670-a9d5-4c78-bfb8-0bdcda27263c', '5@gmail.com', 'u16/fns/csc/1016', 'u16/fns/csc/1016', '802384743', '21b76ad1136de1df7ecd434ffa27a8e9', '127.0.0.1', NULL, 'Active', NULL, NULL, NULL, NULL, '2e9a8345-0869-4138-a0f5-d6b925188131', '34f47725-bfa5-412e-b7a9-edf318671ed2', 'abcf97dd-3ce4-4de3-a765-abebcdd2a585', '1'),
('2', 'said', 'abdulsalam', '', 'male', '3e836670-a9d5-4c78-bfb8-0bdcda27263c', 'saidabdulsalam5@gmail.com', 'saidabdulsalam5@gmail.com', 'U16/FNS/CSC/1052', '', '25d55ad283aa400af464c76d713c07ad', '', '', 'Active', NULL, NULL, NULL, NULL, '1', 'cd0daaff-67b5-4415-992c-e57cc63bd972', 'abcf97dd-3ce4-4de3-a765-abebcdd2a585', '1'),
('3', 'Kawu', 'abdulsalam', '', 'female', '9260655c-6933-45a0-8d01-6de3d6a52657', 'saidabdulsalam05@gmail.com', 'saidabdulsalam05@gmail.com', '', '08096642065', '25d55ad283aa400af464c76d713c07ad', '127.0.0.1', '', 'Active', NULL, NULL, NULL, '2021-05-10 20:11:37', '1', 'cd0daaff-67b5-4415-992c-e57cc63bd972', 'abcf97dd-3ce4-4de3-a765-abebcdd2a585', '1'),
('36d41e74-ab6d-4459-81e5-56cd85268dfc', 'murjanatu 1', 'K', '', 'female', '3e836670-a9d5-4c78-bfb8-0bdcda27263c', '1@gmail.com', 'u16/fns/csc/1012', 'u16/fns/csc/1012', '802384743', '21b76ad1136de1df7ecd434ffa27a8e9', '127.0.0.1', NULL, 'Active', NULL, NULL, NULL, NULL, '2e9a8345-0869-4138-a0f5-d6b925188131', '34f47725-bfa5-412e-b7a9-edf318671ed2', 'abcf97dd-3ce4-4de3-a765-abebcdd2a585', '1'),
('3fca0dcc-a3ed-400b-b984-7c23f2d461a1', 'murjanatu 3', 'K', '', 'female', '3e836670-a9d5-4c78-bfb8-0bdcda27263c', '3@gmail.com', 'u16/fns/csc/1014', 'u16/fns/csc/1014', '802384743', '21b76ad1136de1df7ecd434ffa27a8e9', '127.0.0.1', NULL, 'Active', NULL, NULL, NULL, NULL, '2e9a8345-0869-4138-a0f5-d6b925188131', '34f47725-bfa5-412e-b7a9-edf318671ed2', 'abcf97dd-3ce4-4de3-a765-abebcdd2a585', '1'),
('3fd41d9d-6cd6-4b87-9bfa-c236148c3c9e', 'murjanatu 11', 'K', '', 'female', '3e836670-a9d5-4c78-bfb8-0bdcda27263c', '11@gmail.com', 'u16/fns/csc/1022', 'u16/fns/csc/1022', '802384743', '21b76ad1136de1df7ecd434ffa27a8e9', '127.0.0.1', NULL, 'Active', NULL, NULL, NULL, NULL, '2e9a8345-0869-4138-a0f5-d6b925188131', '34f47725-bfa5-412e-b7a9-edf318671ed2', 'abcf97dd-3ce4-4de3-a765-abebcdd2a585', '1'),
('4', 'said', 'abdulrahman1', '', 'male', '61947969-78e6-4619-be35-50541aef8cb3', 'admin%2525252525252540gmail.com', 'admin%2525252525252540gmail.com', '', '', '25d55ad283aa400af464c76d713c07ad', '', '', 'Active', NULL, NULL, NULL, '2021-05-10 16:34:44', '1', 'cd0daaff-67b5-4415-992c-e57cc63bd972', 'abcf97dd-3ce4-4de3-a765-abebcdd2a585', '1'),
('46f6c9b3-a350-4826-8500-152226a3b9f8', 'murjanatu 10', 'K', '', 'female', '3e836670-a9d5-4c78-bfb8-0bdcda27263c', '10@gmail.com', 'u16/fns/csc/1021', 'u16/fns/csc/1021', '802384743', '21b76ad1136de1df7ecd434ffa27a8e9', '127.0.0.1', NULL, 'Active', NULL, NULL, NULL, NULL, '2e9a8345-0869-4138-a0f5-d6b925188131', '34f47725-bfa5-412e-b7a9-edf318671ed2', 'abcf97dd-3ce4-4de3-a765-abebcdd2a585', '1'),
('5ab6c00b-dbdb-4cef-a1b8-fe9b771aa2c5', 'murjanatu 9', 'K', '', 'female', '3e836670-a9d5-4c78-bfb8-0bdcda27263c', '9@gmail.com', 'u16/fns/csc/1020', 'u16/fns/csc/1020', '802384743', '21b76ad1136de1df7ecd434ffa27a8e9', '127.0.0.1', NULL, 'Active', NULL, NULL, NULL, NULL, '2e9a8345-0869-4138-a0f5-d6b925188131', '34f47725-bfa5-412e-b7a9-edf318671ed2', 'abcf97dd-3ce4-4de3-a765-abebcdd2a585', '1'),
('99baadcf-8638-4db3-b7dc-b171d10b6f3c', 'murjanatu 2', 'K', '', 'female', '3e836670-a9d5-4c78-bfb8-0bdcda27263c', '2@gmail.com', 'u16/fns/csc/1013', 'u16/fns/csc/1013', '802384743', '21b76ad1136de1df7ecd434ffa27a8e9', '127.0.0.1', NULL, 'Active', NULL, NULL, NULL, NULL, '2e9a8345-0869-4138-a0f5-d6b925188131', '34f47725-bfa5-412e-b7a9-edf318671ed2', 'abcf97dd-3ce4-4de3-a765-abebcdd2a585', '1'),
('bc34c5c3-7902-4c70-ba66-d4384755710a', 'murjanatu 7', 'K', '', 'female', '3e836670-a9d5-4c78-bfb8-0bdcda27263c', '7@gmail.com', 'u16/fns/csc/1018', 'u16/fns/csc/1018', '802384743', '21b76ad1136de1df7ecd434ffa27a8e9', '127.0.0.1', NULL, 'Active', NULL, NULL, NULL, NULL, '2e9a8345-0869-4138-a0f5-d6b925188131', '34f47725-bfa5-412e-b7a9-edf318671ed2', 'abcf97dd-3ce4-4de3-a765-abebcdd2a585', '1'),
('d57eae23-1b43-4378-8045-3e8d6fb10f4c', 'murjanatu 4', 'K', '', 'female', '3e836670-a9d5-4c78-bfb8-0bdcda27263c', '4@gmail.com', 'u16/fns/csc/1015', 'u16/fns/csc/1015', '802384743', '21b76ad1136de1df7ecd434ffa27a8e9', '127.0.0.1', NULL, 'Active', NULL, NULL, NULL, NULL, '2e9a8345-0869-4138-a0f5-d6b925188131', '34f47725-bfa5-412e-b7a9-edf318671ed2', 'abcf97dd-3ce4-4de3-a765-abebcdd2a585', '1'),
('e4399d46-7555-4e6f-a588-9e6bc3bfdd4e', 'murjanatu 8', 'K', '', 'female', '3e836670-a9d5-4c78-bfb8-0bdcda27263c', '8@gmail.com', 'u16/fns/csc/1019', 'u16/fns/csc/1019', '802384743', '21b76ad1136de1df7ecd434ffa27a8e9', '127.0.0.1', NULL, 'Active', NULL, NULL, NULL, NULL, '2e9a8345-0869-4138-a0f5-d6b925188131', '34f47725-bfa5-412e-b7a9-edf318671ed2', 'abcf97dd-3ce4-4de3-a765-abebcdd2a585', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_courses`
--

CREATE TABLE `user_courses` (
  `id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_courses`
--

INSERT INTO `user_courses` (`id`, `school_id`, `faculty_id`, `course_id`, `user_id`, `session_id`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
('c181a206-1d8e-4804-a30c-efa49ba50d92', '1', '1', 'd531b477-bece-44c4-9e43-745a988792cf', '2', 'abcf97dd-3ce4-4de3-a765-abebcdd2a585', 'Active', NULL, '2021-05-06 13:51:22', '2021-05-06 13:51:22'),
('c181a206-1d8e-4804-a30c-efa49ba50d94', '1', '1', 'd531b477-bece-44c4-9e43-745a988792ce', '2', 'abcf97dd-3ce4-4de3-a765-abebcdd2a585', 'Active', NULL, '2021-05-06 13:51:22', '2021-05-06 13:51:22');

-- --------------------------------------------------------

--
-- Table structure for table `weekly_works`
--

CREATE TABLE `weekly_works` (
  `id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_open` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_close` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `limitation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive','','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weekly_works`
--

INSERT INTO `weekly_works` (`id`, `title`, `course_id`, `school_id`, `faculty_id`, `session_id`, `date_open`, `date_close`, `access_code`, `limitation`, `status`, `created_at`, `updated_at`) VALUES
('a81647aa-2ec2-4580-a602-3076e893a2f6', 'week 2', 'd531b477-bece-44c4-9e43-745a988792cf', '1', '1', 'abcf97dd-3ce4-4de3-a765-abebcdd2a585', '06/04/2021', '05/06/2021', 'secret', '0', 'Inactive', '2021-05-06', '2021-05-09'),
('da2694e4-df7c-4e58-b794-3666ef119ce7', 'week 1', 'd531b477-bece-44c4-9e43-745a988792cf', '1', '1', 'abcf97dd-3ce4-4de3-a765-abebcdd2a585', '05/26/2021', '05/29/2021', '123332', '0', 'Active', '2021-05-06', '2021-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `weekly_work_experiments`
--

CREATE TABLE `weekly_work_experiments` (
  `id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experiment_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weekly_work_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive','','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `updated_at` date NOT NULL DEFAULT current_timestamp(),
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weekly_work_experiments`
--

INSERT INTO `weekly_work_experiments` (`id`, `experiment_id`, `weekly_work_id`, `status`, `updated_at`, `created_at`) VALUES
('bcabddd7-0126-49e1-811d-cc5397c72c65', '22abf888-e27a-4732-9904-c2bdafb1b280', 'a81647aa-2ec2-4580-a602-3076e893a2f6', 'Active', '2021-05-06', '2021-05-06'),
('d1d65308-857c-41f8-843c-6d03bc88c6a8', '22abf888-e27a-4732-9904-c2bdafb1b280', 'da2694e4-df7c-4e58-b794-3666ef119ce7', 'Active', '2021-05-06', '2021-05-06'),
('d1d65308-857c-41f8-843c-6d03bc88c6a9', 'a945e793-17d2-4542-a032-b12f100b3d85', 'da2694e4-df7c-4e58-b794-3666ef119ce7', 'Active', '2021-05-06', '2021-05-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_experiment`
--
ALTER TABLE `course_experiment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_instructor`
--
ALTER TABLE `course_instructor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_resources`
--
ALTER TABLE `course_resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experiments`
--
ALTER TABLE `experiments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experiment_results`
--
ALTER TABLE `experiment_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_courses`
--
ALTER TABLE `user_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weekly_works`
--
ALTER TABLE `weekly_works`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weekly_work_experiments`
--
ALTER TABLE `weekly_work_experiments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
