-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2018 at 06:30 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `education`
--

-- --------------------------------------------------------

--
-- Table structure for table `ht_blogs`
--

CREATE TABLE `ht_blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `short_desc` text NOT NULL,
  `detail` text,
  `type` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ht_blogs`
--

INSERT INTO `ht_blogs` (`id`, `title`, `short_desc`, `detail`, `type`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'lenovo laptop hj', 'oiuoru', '<p>iouipiopo</p>', 'Blog', 54, 'Active', '2018-09-11 01:20:59', '2018-09-10 19:20:59'),
(2, 'This is new blog', 'This is new blog', '<p>okkkkkkkkkkkkk</p>', 'Scholarship', 54, 'Active', '2018-09-11 01:08:32', '2018-09-10 19:08:32'),
(3, 'lenovo laptop ok', 'j;ijiklu', '<p><span style=\"background-color: #ff0000;\">jhkhyu</span></p>', 'Scholarship', 72, 'Active', '2018-09-11 01:25:24', '2018-09-10 19:25:24'),
(4, 'lenovo laptop', 'xbgfh', NULL, 'Blog', 72, 'Active', '2018-09-10 19:25:08', '2018-09-10 19:25:08');

-- --------------------------------------------------------

--
-- Table structure for table `ht_classes`
--

CREATE TABLE `ht_classes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ht_classes`
--

INSERT INTO `ht_classes` (`id`, `title`, `created_at`, `updated_at`) VALUES
(9, 'ষষ্ঠ শ্রেনী', '2018-08-02 11:11:04', '2018-07-20 23:27:40'),
(10, 'সপ্তম শ্রেণী', '2018-08-02 11:11:04', '2018-07-20 23:31:59'),
(11, 'অষ্টম শ্রেণী', '2018-08-02 11:11:04', '2018-07-20 23:32:17'),
(12, 'SSC', '2018-08-02 11:11:04', '2018-08-02 04:52:52'),
(14, 'HSC', '2018-08-02 11:11:04', '2018-08-02 04:53:23'),
(16, 'স্নাতক প্রথম বর্ষ', '2018-07-21 00:17:46', '2018-07-21 00:17:46'),
(17, 'দাখিল', '2018-07-21 00:57:17', '2018-07-21 00:57:17'),
(18, 'দাখিল ৬ষ্ঠ', '2018-07-21 00:59:22', '2018-07-21 00:59:22'),
(19, 'দাখিল সপ্তম', '2018-07-21 01:02:43', '2018-07-21 01:02:43'),
(21, 'দশম শ্রেণী', '2018-07-21 04:21:33', '2018-07-21 04:21:33'),
(22, 'নবম শ্রেণী', '2018-07-21 04:22:30', '2018-07-21 04:22:30'),
(23, 'দশম শ্রেণী', '2018-07-21 05:57:03', '2018-07-21 05:57:03'),
(24, 'দশম শ্রেণী', '2018-07-21 07:18:15', '2018-07-21 07:18:15'),
(25, 'নবম শ্রেণী', '2018-07-21 07:18:35', '2018-07-21 07:18:35'),
(26, 'দশম শ্রেণী', '2018-07-21 07:18:48', '2018-07-21 07:18:48'),
(27, 'কওমী ষষ্ঠ', '2018-07-21 07:36:20', '2018-07-21 07:36:20'),
(28, 'কওমী সপ্তম', '2018-07-21 07:36:38', '2018-07-21 07:36:38'),
(29, 'Class One', '2018-08-02 11:08:58', '2018-08-02 04:54:05'),
(30, 'Class Two', '2018-08-02 11:09:01', '2018-08-02 04:54:34'),
(31, 'Class Three', '2018-08-02 11:09:05', '2018-08-02 04:54:49'),
(32, 'Class Four', '2018-08-02 11:09:09', '2018-08-02 04:55:03'),
(33, 'PEC', '2018-08-02 11:09:12', '2018-08-02 04:55:18'),
(34, 'dakhil one', '2018-08-04 04:15:47', '2018-08-04 04:15:47'),
(35, 'O\' level', '2018-08-04 04:41:22', '2018-08-04 04:41:22'),
(36, 'A\' level', '2018-08-04 04:41:35', '2018-08-04 04:41:35'),
(37, 'Playgroup', '2018-08-04 04:50:13', '2018-08-04 04:50:13'),
(38, 'প্রথম শ্রেণী', '2018-08-04 06:03:16', '2018-08-04 06:03:16'),
(39, 'এসএসসি ভোকেশনাল', '2018-08-04 06:08:39', '2018-08-04 06:08:39'),
(41, 'Level-1, Term-1', '2018-08-13 19:15:17', '2018-08-13 19:15:17'),
(42, 'class one(I)', '2018-08-17 23:48:51', '2018-08-17 23:48:51'),
(43, 'voc nine', '2018-08-19 07:26:33', '2018-08-19 07:26:33'),
(44, 'voc ten', '2018-09-02 08:42:14', '2018-09-02 02:42:14'),
(45, 'Class Five', '2018-09-06 18:05:48', '2018-09-06 18:05:48');

-- --------------------------------------------------------

--
-- Table structure for table `ht_contents`
--

CREATE TABLE `ht_contents` (
  `id` int(11) NOT NULL,
  `content_section_id` int(11) NOT NULL COMMENT 'School, College',
  `institution_category_id` int(11) DEFAULT NULL,
  `institution_type_id` int(11) DEFAULT NULL,
  `institution_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `material_type_id` int(11) DEFAULT NULL COMMENT 'all material type id',
  `subject_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `tests_id` int(11) DEFAULT NULL COMMENT 'standardize_test_id or job_exam_id',
  `skill_development_category_id` int(11) DEFAULT NULL,
  `content_type_id` int(11) NOT NULL,
  `content_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file_location` varchar(255) DEFAULT NULL,
  `file_content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `writer_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content_status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ht_contents`
--

INSERT INTO `ht_contents` (`id`, `content_section_id`, `institution_category_id`, `institution_type_id`, `institution_id`, `class_id`, `material_type_id`, `subject_id`, `department_id`, `tests_id`, `skill_development_category_id`, `content_type_id`, `content_name`, `file_location`, `file_content`, `writer_id`, `user_id`, `content_status`, `created_at`, `updated_at`) VALUES
(4, 1, 0, NULL, 5, 6, 0, 3, 0, 0, 0, 5, 'Class Eight bangla book', NULL, '<p>dgdhgj</p>', NULL, 48, NULL, '2018-06-24 17:25:20', '2018-06-24 11:25:20'),
(5, 1, 0, NULL, 5, 6, 0, 3, 0, 0, 0, 6, 'English for today', NULL, '<p>dfgetry ru678</p>', NULL, 48, NULL, '2018-06-24 11:32:24', '2018-06-24 11:32:24'),
(7, 5, 0, NULL, 4, 6, 0, 3, 0, 0, 0, 5, 'this for test ed', NULL, '<p>fdhhrthty</p>', NULL, 48, NULL, '2018-06-24 11:50:33', '2018-06-24 11:50:33'),
(8, 4, 0, NULL, 5, 6, 0, 3, 0, 0, 0, 5, 'this for test', NULL, '<p>ccvngjn fhtyuy6</p>', NULL, 48, NULL, '2018-06-24 12:07:52', '2018-06-24 12:07:52'),
(9, 3, 0, NULL, 4, 5, 0, 3, 0, 0, 0, 5, 'this for test ed', NULL, '<p>vbngfhn ftytuy</p>', NULL, 48, NULL, '2018-06-24 12:08:36', '2018-06-24 12:08:36'),
(13, 10, NULL, NULL, NULL, NULL, 2, NULL, NULL, 0, 0, 3, 'Higher Study', NULL, '<p>srhyrtuyt</p>', NULL, 48, NULL, '2018-06-29 05:10:13', '2018-06-28 23:10:13'),
(14, 11, NULL, NULL, NULL, NULL, 2, NULL, NULL, 0, 0, 5, 'this for test ed', NULL, '<p>uwwehieuj erjy54</p>', NULL, 48, NULL, '2018-06-28 23:19:51', '2018-06-28 23:19:51'),
(15, 12, NULL, NULL, NULL, NULL, 3, NULL, NULL, 0, 0, 5, 'this for test ed', NULL, '<p>beeuhte ht43</p>', NULL, 48, NULL, '2018-06-29 05:23:37', '2018-06-28 23:23:37'),
(16, 6, NULL, NULL, 5, 6, NULL, 3, NULL, 0, 0, 3, 'Technology and vocational', NULL, '<p>vmh</p>', NULL, 48, NULL, '2018-06-29 04:15:24', '2018-06-29 04:15:24'),
(17, 7, 6, NULL, 6, NULL, 2, 3, NULL, 0, 0, 5, 'vcv cvccvcvc cvc', NULL, '<p><img src=\"http://localhost:8000/assets/uploaded/unnamed.png\" alt=\"unnamed\" /></p>', NULL, 48, NULL, '2018-06-30 00:09:20', '2018-06-30 00:09:20'),
(19, 12, NULL, NULL, NULL, NULL, 4, NULL, NULL, 0, 0, 5, 'this for test', NULL, '<p>trthrejtrjht</p>', NULL, 54, NULL, '2018-07-04 10:26:28', '2018-07-04 10:26:28'),
(22, 10, NULL, NULL, NULL, NULL, 3, NULL, NULL, 2, NULL, 5, 'this for test', NULL, '<p>fdhfjtyiuyoiuo</p>', NULL, 54, NULL, '2018-07-05 01:59:39', '2018-07-04 19:59:39'),
(23, 11, NULL, NULL, NULL, NULL, 3, NULL, NULL, 3, NULL, 3, 'this for test ed', NULL, '<p>fcjfgjtyjiu</p>', NULL, 54, NULL, '2018-07-04 20:03:01', '2018-07-04 20:03:01'),
(25, 6, NULL, NULL, 4, 6, NULL, 3, NULL, NULL, NULL, 4, 'this for test', NULL, '<p>uihire rejrtioyjt</p>', NULL, 54, NULL, '2018-07-05 14:27:46', '2018-07-05 08:27:46'),
(26, 12, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, 2, 5, 'this for test', NULL, '<p>This for test</p>', NULL, 54, NULL, '2018-07-05 08:36:09', '2018-07-05 08:36:09'),
(27, 1, NULL, NULL, 4, 7, NULL, 5, NULL, NULL, NULL, 4, 'English for today', NULL, '<p>This for test</p>', NULL, 54, NULL, '2018-07-08 16:38:51', '2018-07-08 10:38:51'),
(28, 7, 4, NULL, 19, NULL, 3, 26, NULL, NULL, NULL, 4, 'this for test ed', NULL, '<p>,khjlkjlk;o</p>', NULL, 54, NULL, '2018-08-08 15:06:04', '2018-08-08 09:06:04'),
(29, 6, NULL, NULL, 7, 7, NULL, 5, NULL, NULL, NULL, 5, 'this for test', NULL, '<p>this for test</p>', NULL, 54, NULL, '2018-07-08 10:33:42', '2018-07-08 10:33:42'),
(30, 3, NULL, NULL, 5, 6, NULL, 3, NULL, NULL, NULL, 5, 'this for test ed', NULL, '<p>thid ijyitr riytr yerkt jry</p>', NULL, 54, NULL, '2018-07-08 10:37:49', '2018-07-08 10:37:49'),
(31, 9, 5, NULL, 7, NULL, 3, 5, 3, NULL, NULL, 5, 'this for test', NULL, '<p>okkkkkkkkkkkk</p>', NULL, 54, NULL, '2018-07-09 18:07:10', '2018-07-09 18:07:10'),
(33, 8, 5, NULL, 7, NULL, 3, 5, 3, NULL, NULL, 5, 'this for test', NULL, '<p>This for test</p>', NULL, 54, NULL, '2018-07-10 00:22:43', '2018-07-09 18:22:43'),
(34, 1, NULL, NULL, 6, 8, NULL, 4, NULL, NULL, NULL, 5, 'this for test ed', NULL, NULL, NULL, 54, NULL, '2018-07-09 19:03:45', '2018-07-09 19:03:45'),
(35, 1, NULL, NULL, 6, 8, NULL, 4, NULL, NULL, NULL, 5, 'this for test', NULL, '<p>আই আমার বাংলা</p>', NULL, 54, NULL, '2018-07-10 16:03:55', '2018-07-10 16:03:55'),
(36, 1, NULL, NULL, 4, 7, NULL, 5, NULL, NULL, NULL, 5, 'this for test', NULL, '<p>tguwtioetnbtu</p>', NULL, 54, NULL, '2018-07-14 04:43:20', '2018-07-14 04:43:20'),
(37, 1, NULL, NULL, 6, 8, NULL, 4, NULL, NULL, NULL, 5, 'this for test ed', NULL, '<p>shdg yhtru</p>', NULL, 54, NULL, '2018-07-14 04:51:38', '2018-07-14 04:51:38'),
(38, 1, NULL, NULL, NULL, 8, NULL, 4, NULL, NULL, NULL, 5, 'this for test ed', NULL, '<p>hrty try</p>', NULL, 54, NULL, '2018-07-14 04:52:12', '2018-07-14 04:52:12'),
(39, 1, NULL, 10, NULL, 8, NULL, 4, NULL, NULL, NULL, 5, 'this for test', NULL, '<p>xfhftht fhtruytu</p>', NULL, 54, NULL, '2018-07-14 11:05:32', '2018-07-14 05:05:32'),
(40, 1, NULL, 10, NULL, 7, NULL, 5, NULL, NULL, NULL, 5, 'this for test', NULL, '<p>hbjfgjhght hytu</p>', NULL, 54, NULL, '2018-07-14 11:07:15', '2018-07-14 05:07:15'),
(42, 1, NULL, NULL, 5, 15, NULL, 6, NULL, NULL, NULL, 4, 'this for test', NULL, '<p>হ্যফুরে জ্রেগ রগতের&nbsp;</p>', NULL, 54, NULL, '2018-07-21 06:41:58', '2018-07-21 00:41:58'),
(43, 1, NULL, 11, 5, 15, NULL, 6, NULL, NULL, NULL, 5, 'this for test', NULL, '<p>এক্সবফহগফহ</p>', NULL, 54, NULL, '2018-07-21 00:45:21', '2018-07-21 00:45:21'),
(44, 1, NULL, 11, NULL, 15, NULL, 6, NULL, NULL, NULL, 5, 'this for test', NULL, '<p>সদ্গেরত্র </p>', NULL, 54, NULL, '2018-07-21 06:46:36', '2018-07-21 00:46:36'),
(45, 1, NULL, 11, NULL, 15, 4, 6, NULL, NULL, NULL, 6, 'বাংলা প্রথম পত্র', NULL, NULL, NULL, 54, NULL, '2018-07-28 11:52:40', '2018-07-28 05:52:40'),
(48, 2, NULL, 13, 17, 34, 3, 8, NULL, NULL, NULL, 5, 'ইসলামিক', NULL, '<p><a title=\"Rabiuls CV\" href=\"http://localhost:8181/assets/uploaded/Rabiuls CV.docx\">Rabiuls CV</a></p>', NULL, 54, NULL, '2018-08-04 12:22:30', '2018-08-04 06:22:30'),
(49, 3, NULL, 11, 16, 42, 3, 35, NULL, NULL, NULL, 5, 'this for test', '/files/72/annual_report_2009.pdf', '<p><a title=\"Rabiuls CV\" href=\"/files/72/annual_report_2009.pdf\">Rabiuls CV&nbsp;</a></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>ok</p>', NULL, 54, NULL, '2018-09-06 01:30:29', '2018-09-05 19:30:29'),
(50, 4, NULL, 11, 27, 35, 2, 35, NULL, NULL, NULL, 3, 'this for test', '/files/72/EEE_11_EEE_101_11-12.pdf', '<p><a title=\"annual_report_2009\" href=\"/assets/uploaded/annual_report_2009.pdf\">annual_report_2009</a></p>', NULL, 54, NULL, '2018-09-06 01:30:48', '2018-09-05 19:30:48'),
(51, 5, NULL, 11, 13, 28, 3, 34, NULL, NULL, NULL, 3, 'this for test', '/files/72/EEE_11_EEE_101_11-12.pdf', '<p><a title=\"p601\" href=\"/assets/uploaded/p601.pdf\">p601</a></p>', NULL, 54, NULL, '2018-09-06 01:31:34', '2018-09-05 19:31:34'),
(52, 6, NULL, 11, 18, 43, 3, 25, NULL, NULL, NULL, 2, 'Test', NULL, '<p><iframe src=\"http://www.youtube.com/embed/awCtmkJqqg8\" width=\"425\" height=\"350\"></iframe></p>', NULL, 54, NULL, '2018-08-19 13:53:42', '2018-08-19 07:53:42'),
(57, 7, 4, NULL, 21, NULL, 3, 27, NULL, NULL, NULL, 4, 'this for test', NULL, '<p>svgdfgdfgd</p>', NULL, 54, NULL, '2018-08-12 10:14:11', '2018-08-12 10:14:11'),
(58, 7, 4, NULL, 25, NULL, 1, 27, NULL, NULL, NULL, 2, 'A Catholic sister', NULL, '<p><iframe src=\"http://www.youtube.com/embed/so03cpPPNYw\" width=\"425\" height=\"350\"></iframe></p>', NULL, 54, NULL, '2018-08-19 06:44:26', '2018-08-19 00:44:26'),
(59, 7, 4, NULL, 10, NULL, 1, 27, NULL, NULL, NULL, 2, 'A Catholic sister', NULL, '<p><iframe src=\"http://www.youtube.com/embed/so03cpPPNYw\" width=\"425\" height=\"350\"></iframe></p>', NULL, 54, NULL, '2018-08-19 06:45:50', '2018-08-19 00:45:50'),
(60, 9, 4, NULL, 25, 41, 1, 30, 4, NULL, NULL, 2, 'A Catholic sister', NULL, '<p><iframe src=\"http://www.youtube.com/embed/9A6JMPjFaOw\" width=\"425\" height=\"350\"></iframe></p>', NULL, 54, NULL, '2018-08-14 17:37:51', '2018-08-14 11:37:51'),
(61, 9, 4, NULL, 25, 41, 1, 30, 4, NULL, NULL, 2, 'A Catholic sister', NULL, '<p><iframe src=\"http://www.youtube.com/embed/9A6JMPjFaOw\" width=\"425\" height=\"350\"></iframe></p>', NULL, 54, NULL, '2018-08-14 11:16:35', '2018-08-14 11:16:35'),
(62, 8, 4, NULL, 28, 41, 2, 28, 4, NULL, NULL, 4, 'A Catholic sister', NULL, '<p>rhgi wrjiryt</p>', NULL, 54, NULL, '2018-08-19 06:09:38', '2018-08-19 00:09:38'),
(63, 1, NULL, 11, 4, 30, 1, 34, NULL, NULL, NULL, 4, 'A Catholic sister', NULL, '<p>vdfgfhgh</p>', NULL, 54, NULL, '2018-09-02 09:08:07', '2018-09-02 03:08:07'),
(64, 1, NULL, 11, 27, 29, 3, 34, NULL, NULL, NULL, 4, 'Test', NULL, '<p>this fror test</p>', NULL, 54, NULL, '2018-08-20 07:11:28', '2018-08-20 01:11:28'),
(65, 2, NULL, 13, 26, 17, 3, 26, NULL, NULL, NULL, 4, 'A Catholic sister', '/files/72/annual_report_2009.pdf', '<p>djjty</p>', NULL, 54, NULL, '2018-09-03 02:20:10', '2018-09-02 20:20:10'),
(66, 9, 4, NULL, 10, 41, 3, 30, 4, NULL, NULL, 3, 'A Catholic sister', '/files/72/annual_report_2009.pdf', NULL, NULL, 54, NULL, '2018-09-06 17:17:54', '2018-09-06 11:17:54'),
(67, 8, 4, NULL, 28, 41, 3, 28, 4, NULL, NULL, 2, 'PDF file', '/files/72/annual_report_2009.pdf', '<p>drrty hrtytu</p>', NULL, 54, NULL, '2018-09-06 01:49:25', '2018-09-05 19:49:25'),
(68, 7, 4, NULL, 25, NULL, 1, 27, NULL, NULL, NULL, 2, 'PDF file', '/files/72/annual_report_2009.pdf', '<p><a title=\"annual_report_2009\" href=\"/assets/uploaded/annual_report_2009.pdf\">annual_report_2009</a></p>', NULL, 54, NULL, '2018-09-06 01:49:48', '2018-09-05 19:49:48'),
(69, 6, NULL, 11, 18, 43, 3, 25, NULL, NULL, NULL, 3, 'Test', '/files/72/EEE_11_EEE_101_11-12.pdf', '<p>sfgdgrt</p>', NULL, 54, NULL, '2018-09-06 01:31:52', '2018-09-05 19:31:52'),
(70, 1, NULL, 11, 4, 29, 3, 34, NULL, NULL, NULL, 5, 'A Catholic sister', '/files/72/EEE_11_EEE_101_11-12.pdf', '<p><a title=\"annual_report_2009\" href=\"/assets/uploaded/annual_report_2009.pdf\" target=\"_blank\" rel=\"noopener\">annual_report_2009</a></p>', NULL, 54, NULL, '2018-09-03 01:51:35', '2018-09-02 19:51:35'),
(71, 1, NULL, 11, 4, 29, 4, 34, NULL, NULL, NULL, 5, 'eeee', NULL, NULL, NULL, 72, NULL, '2018-09-06 16:38:24', '2018-09-06 10:38:24'),
(72, 2, NULL, 13, 17, 17, 4, 26, NULL, NULL, NULL, 5, 'A Catholic sister', '/files/72/EEE_11_EEE_101_11-12.pdf', NULL, NULL, 72, NULL, '2018-09-06 17:30:09', '2018-09-06 11:30:09'),
(73, 1, NULL, 11, 4, 29, 2, 34, NULL, NULL, NULL, 2, 'this for test', '_TbOxyWXr-I', NULL, NULL, 72, NULL, '2018-09-06 18:48:49', '2018-09-06 12:48:49'),
(74, 1, NULL, 11, 4, 29, 1, 34, NULL, NULL, NULL, 3, 'this for test', '/files/72/EEE_11_EEE_101_11-12.pdf', NULL, NULL, 72, NULL, '2018-09-06 18:27:10', '2018-09-06 12:27:10'),
(75, 9, 4, NULL, 10, 41, 4, 30, 4, NULL, NULL, 3, 'this for test', '/files/72/annual_report_2009.pdf', NULL, NULL, 72, NULL, '2018-09-06 11:18:43', '2018-09-06 11:18:43'),
(76, 1, NULL, 11, 27, 30, 1, 34, NULL, NULL, NULL, 3, 'A Catholic sister asked Yusuf Estes-Why he accepted Islam- 2011', '/files/72/annual_report_2009.pdf', NULL, NULL, 72, NULL, '2018-09-06 18:25:53', '2018-09-06 18:25:53'),
(77, 1, NULL, 11, NULL, 29, 1, 34, NULL, NULL, NULL, 3, 'PDF file', '/files/72/annual_report_2009.pdf', NULL, NULL, 72, NULL, '2018-09-07 00:41:27', '2018-09-06 18:41:27'),
(78, 12, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, 2, 4, 'this for test', NULL, '<p>This for test</p>', NULL, 72, NULL, '2018-09-09 19:37:55', '2018-09-09 19:37:55'),
(79, 10, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, 2, 5, 'this for test ok', '/files/72/annual_report_2009.pdf', NULL, NULL, 72, NULL, '2018-09-10 01:55:58', '2018-09-09 19:55:58'),
(80, 10, NULL, NULL, NULL, NULL, 4, NULL, NULL, 4, NULL, 4, 'this for test', NULL, NULL, NULL, 72, NULL, '2018-09-10 09:54:23', '2018-09-10 09:54:23'),
(81, 11, NULL, NULL, NULL, NULL, 3, NULL, NULL, 6, NULL, 3, 'this for test ok', '/files/72/annual_report_2009.pdf', NULL, NULL, 72, NULL, '2018-09-13 01:16:14', '2018-09-12 19:16:14'),
(82, 11, NULL, NULL, NULL, NULL, 4, 1, NULL, 1, NULL, 5, 'this for test', '/files/72/EEE_11_EEE_101_11-12.pdf', NULL, NULL, 72, NULL, '2018-09-10 18:17:33', '2018-09-10 18:17:33'),
(83, 12, NULL, NULL, NULL, NULL, 3, 2, NULL, 1, NULL, 3, 'this for test', '/files/72/EEE_11_EEE_101_11-12.pdf', NULL, NULL, 72, NULL, '2018-09-11 00:39:45', '2018-09-10 18:39:45'),
(84, 11, NULL, NULL, NULL, NULL, 3, NULL, NULL, 4, NULL, 5, 'A Catholic sister', '/files/72/annual_report_2009.pdf', NULL, NULL, 72, NULL, '2018-09-13 01:20:48', '2018-09-12 19:20:48'),
(85, 12, NULL, NULL, NULL, NULL, 4, 1, NULL, 2, NULL, 5, 'Test', '/files/72/EEE_11_EEE_101_11-12.pdf', NULL, NULL, 72, NULL, '2018-09-16 09:53:55', '2018-09-16 09:53:55'),
(86, 10, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, 3, 2, 'A Catholic sister', 'https://www.youtube.com/watch?v=IUpoCjxPzyo', NULL, NULL, 72, NULL, '2018-09-16 20:02:47', '2018-09-16 20:02:47');

-- --------------------------------------------------------

--
-- Table structure for table `ht_content_section`
--

CREATE TABLE `ht_content_section` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ht_content_section`
--

INSERT INTO `ht_content_section` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'School & College', '2018-06-21 06:11:25', '0000-00-00 00:00:00'),
(2, 'Madrasha', '2018-06-21 06:11:43', '0000-00-00 00:00:00'),
(3, 'English Medium', '2018-06-24 17:41:35', '0000-00-00 00:00:00'),
(4, 'English Version', '2018-06-24 17:41:35', '0000-00-00 00:00:00'),
(5, 'Qawmi', '2018-06-24 17:41:56', '0000-00-00 00:00:00'),
(6, 'Technical & Vocational', '2018-06-27 01:43:17', '0000-00-00 00:00:00'),
(7, 'Admission Test', '2018-06-27 01:43:17', '0000-00-00 00:00:00'),
(8, 'Under Graduate', '2018-06-27 01:44:01', '0000-00-00 00:00:00'),
(9, 'Post Graduate', '2018-06-27 01:44:01', '0000-00-00 00:00:00'),
(10, 'Higher Study', '2018-06-27 01:44:23', '0000-00-00 00:00:00'),
(11, 'Job', '2018-06-27 01:44:23', '0000-00-00 00:00:00'),
(12, 'Skill Development', '2018-06-27 01:44:39', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ht_content_type`
--

CREATE TABLE `ht_content_type` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ht_content_type`
--

INSERT INTO `ht_content_type` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Power Point', '2018-08-03 16:40:17', '2018-06-20 23:50:03'),
(2, 'Video', '2018-05-28 14:27:25', '2018-05-28 08:27:25'),
(3, 'pdf', '2018-05-31 22:09:09', '2018-05-31 22:09:09'),
(4, 'Text', '2018-06-20 23:49:13', '2018-06-20 23:49:13'),
(5, 'Doc/Docx', '2018-06-20 23:49:33', '2018-06-20 23:49:33');

-- --------------------------------------------------------

--
-- Table structure for table `ht_department`
--

CREATE TABLE `ht_department` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ht_department`
--

INSERT INTO `ht_department` (`id`, `title`, `created_at`, `updated_at`) VALUES
(2, 'Law', '2018-05-28 08:29:54', '2018-05-28 08:29:54'),
(3, 'English', '2018-05-31 22:07:43', '2018-05-31 22:07:43'),
(4, 'CSE', '2018-08-08 11:20:34', '2018-08-08 11:20:34');

-- --------------------------------------------------------

--
-- Table structure for table `ht_feedback`
--

CREATE TABLE `ht_feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `is_read` varchar(255) NOT NULL DEFAULT 'No',
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ht_feedback`
--

INSERT INTO `ht_feedback` (`id`, `name`, `email`, `heading`, `message`, `is_read`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Amir', 'amir@gmail.com', 'Testing Message', 'This for testing', 'Yes', 5, '2018-07-21 14:23:54', '2018-07-21 08:23:54'),
(2, 'Abir alam', 'abir@gmail.com', 'this for another test', 'this for another test dexc', 'No', 0, '2018-07-21 14:25:22', '0000-00-00 00:00:00'),
(3, 'rashed khan', 'rabiul0420@gmail.com', 'hfuwrhgerg', 'fhfgjhg', 'No', NULL, '2018-07-26 15:41:43', '2018-07-26 15:41:43'),
(4, 'rashed khan', 'rabiul0420@gmail.com', 'hfuwrhgerg', 'xfbfhfghg', 'No', NULL, '2018-07-26 15:44:24', '2018-07-26 15:44:24'),
(5, 'rashed khan', 'rabiul0420@gmail.com', 'hfuwrhgerg', 'grtt', 'No', NULL, '2018-07-26 16:01:45', '2018-07-26 16:01:45'),
(6, 'rashed khan', 'rabiul0420@gmail.com', 'This for test', 'Content here', 'Yes', NULL, '2018-07-27 03:23:52', '2018-07-26 21:23:52'),
(7, 'rashed khan', 'rabiul0420@gmail.com', 'This for test', 'This for test This for testThis for test', 'No', NULL, '2018-07-26 21:26:39', '2018-07-26 21:26:39'),
(8, 'rahat adnan', 'rahat@gmail.com', 'test', 'retreytr tyiuyo', 'Yes', NULL, '2018-07-27 06:11:47', '2018-07-27 00:11:47');

-- --------------------------------------------------------

--
-- Table structure for table `ht_global_setting`
--

CREATE TABLE `ht_global_setting` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `company_logo` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_plus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `_token` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ht_global_setting`
--

INSERT INTO `ht_global_setting` (`id`, `company_name`, `company_logo`, `favicon`, `email`, `phone`, `facebook`, `twitter`, `google_plus`, `youtube`, `linkedin`, `_token`, `created_at`, `updated_at`) VALUES
(1, 'My Study', 'images/6a2de77471e7306e01aa81d71b52941d.png', 'images/220915b5cf39c53ea79111bf2b55c086.jpg', 'education@gmail.com', '01787841565', NULL, 'https://mobile.twitter.com', 'https://mobile.twitter.com', 'https://mobile.twitter.com', 'https://mobile.twitter.com', 'UpqbGmXKRoSMNW41rvmDgFtSLfhJYHGYPdk1ubMD', '2018-08-11 07:15:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ht_higher_job_material_type`
--

CREATE TABLE `ht_higher_job_material_type` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ht_higher_job_material_type`
--

INSERT INTO `ht_higher_job_material_type` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Lectures', '2018-09-12 16:29:55', '2018-06-20 23:50:03'),
(2, 'Reference books', '2018-09-12 16:30:08', '2018-05-28 08:27:25'),
(3, 'Mock Test', '2018-09-12 16:30:21', '2018-05-31 22:09:09'),
(4, 'Previous Question\r\n& Answers', '2018-09-12 16:30:51', '2018-06-20 23:49:13');

-- --------------------------------------------------------

--
-- Table structure for table `ht_institution`
--

CREATE TABLE `ht_institution` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `institution_category_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ht_institution`
--

INSERT INTO `ht_institution` (`id`, `name`, `address`, `institution_category_id`, `image`, `created_at`, `updated_at`) VALUES
(4, 'Bera College', 'bera , pabna', 6, 'images/6f2c550dec3824b6edbd40a92860d4af.jpg', '2018-08-03 05:16:07', '2018-08-02 23:16:07'),
(5, 'Rashid adorsho high school', 'Mirpur, Dhaka', 6, NULL, '2018-08-03 05:15:50', '2018-08-02 23:15:50'),
(10, 'DUET', 'Gazipur', 4, NULL, '2018-07-26 23:37:14', '2018-07-26 23:37:14'),
(11, 'IBA DU', 'Shahbag', 7, NULL, '2018-07-26 23:40:05', '2018-07-26 23:40:05'),
(12, 'RU', 'Rajshahi', 8, 'images/cd0df7dd6dd748215cceebfcd26020eb.jpg', '2018-07-28 10:29:23', '2018-07-28 04:29:23'),
(13, 'রাশাদ ইন্টা. মাদরাসা', 'মিরপুর', 7, NULL, '2018-08-04 11:53:59', '2018-08-04 05:53:59'),
(14, 'BAF Shaheen English Medium School', 'Tejgaon , Dhaka-1206', 8, NULL, '2018-08-04 04:32:32', '2018-08-04 04:32:32'),
(15, 'Angelica International Schoo', 'Dhaka', 8, NULL, '2018-08-04 04:48:19', '2018-08-04 04:48:19'),
(16, 'Queen\'s School & College', 'Dhaka', 8, NULL, '2018-08-04 04:49:38', '2018-08-04 04:49:38'),
(17, 'tamirul millat', 'Dhaka', 8, NULL, '2018-08-04 05:55:24', '2018-08-04 05:55:24'),
(18, 'Technical school & college', 'কুড়িগ্রাম', 6, NULL, '2018-08-19 14:17:55', '2018-08-19 08:17:55'),
(22, 'Dhaka college', 'Dhaka', 8, NULL, '2018-08-10 11:21:58', '2018-08-10 11:21:58'),
(24, 'Bangla college', 'Rajshahi', 8, NULL, '2018-09-02 09:04:20', '2018-09-02 03:04:20'),
(25, 'BUET', 'Dhaka', 4, 'images/d19e22c17c13260d02013789c0539e2a.png', '2018-08-19 05:27:43', '2018-08-18 23:27:43'),
(26, 'Pabna Alia madrasha', 'Pabna', 8, NULL, '2018-08-16 10:26:51', '2018-08-16 10:26:51'),
(27, 'Mirpur International Tutorial', 'mirpur', 8, NULL, '2018-08-17 23:54:49', '2018-08-17 23:54:49'),
(28, 'Ruet', 'Rajshahi', 4, '/photos/72/Penguins.jpg', '2018-09-03 00:49:59', '2018-09-02 18:49:59');

-- --------------------------------------------------------

--
-- Table structure for table `ht_institution_category`
--

CREATE TABLE `ht_institution_category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ht_institution_category`
--

INSERT INTO `ht_institution_category` (`id`, `title`, `created_at`, `updated_at`) VALUES
(4, 'Engineering', '2018-06-01 05:24:29', '2018-05-31 23:24:29'),
(5, 'Medical', '2018-05-31 23:24:53', '2018-05-31 23:24:53'),
(6, 'Technical', '2018-05-31 23:25:13', '2018-05-31 23:25:13'),
(7, 'Business School', '2018-07-26 23:39:04', '2018-07-26 23:39:04'),
(8, 'General Uni', '2018-07-26 23:41:42', '2018-07-26 23:41:42');

-- --------------------------------------------------------

--
-- Table structure for table `ht_institution_has_class`
--

CREATE TABLE `ht_institution_has_class` (
  `institution_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ht_institution_has_class`
--

INSERT INTO `ht_institution_has_class` (`institution_id`, `class_id`) VALUES
(22, 14),
(23, 11),
(5, 9),
(4, 9),
(4, 12),
(4, 14),
(17, 34),
(26, 17),
(16, 36),
(13, 27),
(13, 28),
(10, 41),
(25, 41),
(18, 43),
(18, 44),
(24, 9),
(24, 10),
(24, 11),
(24, 12),
(24, 14),
(27, 30),
(27, 36),
(27, 42),
(28, 41);

-- --------------------------------------------------------

--
-- Table structure for table `ht_institution_has_type`
--

CREATE TABLE `ht_institution_has_type` (
  `institution_id` int(11) NOT NULL,
  `institution_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ht_institution_has_type`
--

INSERT INTO `ht_institution_has_type` (`institution_id`, `institution_type_id`) VALUES
(4, 1),
(17, 2),
(26, 2),
(16, 3),
(13, 5),
(10, 9),
(10, 8),
(10, 7),
(25, 9),
(25, 7),
(18, 6),
(24, 1),
(27, 4),
(27, 1),
(28, 8);

-- --------------------------------------------------------

--
-- Table structure for table `ht_institution_type`
--

CREATE TABLE `ht_institution_type` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ht_institution_type`
--

INSERT INTO `ht_institution_type` (`id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(1, 'School & College', '/photos/72/school_college.png', '2018-09-06 17:38:38', '2018-09-06 11:38:38'),
(2, 'মাদরাসা', '/photos/72/madrasha.png', '2018-09-04 02:28:00', '2018-09-03 20:28:00'),
(3, 'ইংলিশ মিডিয়াম', 'assets/images/types/english_medium.png', '2018-09-02 05:47:14', '2018-07-21 03:49:56'),
(4, 'ইংলিশ ভার্শন', 'assets/images/types/english_version.png', '2018-09-02 05:47:28', '2018-07-21 03:50:29'),
(5, 'কওমী', 'assets/images/types/qawmi.png', '2018-09-02 05:47:43', '2018-07-21 03:51:33'),
(6, 'Technical & Vocational', 'assets/images/types/technical_vocational.png', '2018-09-02 05:47:55', '2018-08-19 08:16:46'),
(7, 'Admission Test', 'assets/images/types/admission_test.png', '2018-09-02 05:48:07', '2018-07-20 23:30:15'),
(8, 'Undergraduate', 'assets/images/types/undergraduate.png', '2018-09-02 05:48:20', '0000-00-00 00:00:00'),
(9, 'Postgraduate', '/photos/72/postgraduate.png', '2018-09-04 02:25:50', '2018-09-03 20:25:50'),
(10, 'Skill Development', '/photos/72/skill_development.png', '2018-09-12 01:24:45', '2018-09-11 19:24:45'),
(11, 'Higher Study', '/photos/72/higher_study.png', '2018-09-12 01:25:19', '2018-09-11 19:25:19'),
(12, 'Job Preparation', '/photos/72/job_preparation.png', '2018-09-12 01:27:06', '2018-09-11 19:27:06');

-- --------------------------------------------------------

--
-- Table structure for table `ht_institution_type_has_class`
--

CREATE TABLE `ht_institution_type_has_class` (
  `institution_type_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ht_institution_type_has_class`
--

INSERT INTO `ht_institution_type_has_class` (`institution_type_id`, `class_id`) VALUES
(4, 35),
(4, 36),
(8, 41),
(6, 43),
(6, 44),
(5, 12),
(5, 27),
(5, 28),
(3, 36),
(3, 42),
(9, 41),
(2, 17),
(2, 18),
(2, 19),
(2, 34),
(10, 10),
(11, 10),
(12, 12),
(1, 9),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 45);

-- --------------------------------------------------------

--
-- Table structure for table `ht_job_circular`
--

CREATE TABLE `ht_job_circular` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_desc` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ht_job_circular`
--

INSERT INTO `ht_job_circular` (`id`, `title`, `short_desc`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Assistant Teacher', 'Masters in Chemistry, Mathematics, English, Bengali, Physics, Computer Science.', 'http://jobs.bdjobs.com/jobdetails.asp?id=790974&fcatId=4&ln=1', 'Active', '2018-09-17 00:31:03', '2018-09-16 18:31:03'),
(2, 'Professor/ Associate Professor', 'Khwaja Yunus Ali University (KYAU) requires qualified and competent faculty members for the Department of Management Information Systems: Graduated from Computer Science, Computer Science & Engineering, Information Technology, Information Communication Technology, Information System Management and Management', 'http://jobs.bdjobs.com/jobdetails.asp?id=790974&fcatId=4&ln=1', 'Active', '2018-09-16 18:28:16', '2018-09-16 18:28:16');

-- --------------------------------------------------------

--
-- Table structure for table `ht_job_exam`
--

CREATE TABLE `ht_job_exam` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ht_job_exam`
--

INSERT INTO `ht_job_exam` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Prymary School Teacher', '2018-09-09 18:20:29', '2018-09-09 18:20:29'),
(2, 'BCS', '2018-09-13 02:11:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ht_job_exam_has_subject`
--

CREATE TABLE `ht_job_exam_has_subject` (
  `job_exam_id` int(11) NOT NULL,
  `job_exam_subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ht_job_exam_has_subject`
--

INSERT INTO `ht_job_exam_has_subject` (`job_exam_id`, `job_exam_subject_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ht_job_exam_subject`
--

CREATE TABLE `ht_job_exam_subject` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ht_job_exam_subject`
--

INSERT INTO `ht_job_exam_subject` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'English', '2018-09-10 00:07:29', '2018-09-09 18:07:29'),
(2, 'Physics', '2018-09-09 18:07:18', '2018-09-09 18:07:18');

-- --------------------------------------------------------

--
-- Table structure for table `ht_level_year`
--

CREATE TABLE `ht_level_year` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ht_level_year`
--

INSERT INTO `ht_level_year` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, '1st year', '2018-06-01 04:08:36', '2018-05-31 22:08:36'),
(2, '2nd Year', '2018-05-31 23:24:05', '2018-05-31 23:24:05'),
(3, 'Level-1, Term-1', '2018-08-08 11:18:04', '2018-08-08 11:18:04'),
(4, 'Level-1, Term-2', '2018-08-08 11:18:36', '2018-08-08 11:18:36'),
(5, 'Level-1, Term-3', '2018-08-08 11:19:28', '2018-08-08 11:19:28');

-- --------------------------------------------------------

--
-- Table structure for table `ht_locations`
--

CREATE TABLE `ht_locations` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ht_locations`
--

INSERT INTO `ht_locations` (`id`, `title`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Bangladesh', 0, '2018-09-08 10:28:01', '2018-09-08 10:28:01'),
(2, 'Dhaka', 1, '2018-09-08 10:34:48', '2018-09-08 10:34:48'),
(3, 'Mirpur', 2, '2018-09-08 10:35:01', '2018-09-08 10:35:01');

-- --------------------------------------------------------

--
-- Table structure for table `ht_material_type`
--

CREATE TABLE `ht_material_type` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ht_material_type`
--

INSERT INTO `ht_material_type` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'lecture', '2018-06-09 06:20:07', '0000-00-00 00:00:00'),
(2, 'Text Book', '2018-06-09 06:20:07', '0000-00-00 00:00:00'),
(3, 'Model Q', '2018-06-09 06:20:36', '0000-00-00 00:00:00'),
(4, 'Prev. Q&A', '2018-06-09 06:20:36', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ht_menu`
--

CREATE TABLE `ht_menu` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL DEFAULT '100',
  `menu_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ht_menu`
--

INSERT INTO `ht_menu` (`id`, `title`, `parent_id`, `link`, `target`, `priority`, `menu_type`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Home', 0, '/', '_self', 1, NULL, 'Active', 1, '2018-07-12 05:16:28', '2018-07-15 10:40:14'),
(2, 'About FMMSB', 0, '#', '_self', 2, NULL, 'Active', 1, '2018-07-15 04:32:35', '2018-07-15 10:43:16'),
(11, 'About Bangladesh', 0, 'bangladesh.html', '_self', 5, NULL, 'Active', 1, '2018-07-15 10:01:37', '2018-07-16 09:27:29'),
(12, 'Conference Information', 0, '#', '_self', 3, NULL, 'Active', 1, '2018-07-15 10:09:17', '2018-07-15 10:43:00'),
(13, 'About', 2, 'about-fmmsb.html', '_self', 100, NULL, 'Active', 1, '2018-07-15 10:15:47', '2018-07-15 10:15:47'),
(14, 'General Information', 12, 'conference-information.html', '_self', 100, NULL, 'Active', 1, '2018-07-15 10:16:56', '2018-07-16 04:25:31'),
(15, 'Executivee Committee', 12, 'executive-committee.html', '_self', 100, NULL, 'Active', 1, '2018-07-15 10:23:47', '2018-07-16 08:09:35'),
(16, 'Sub Committee', 12, 'sub-committee.html', '_self', 100, NULL, 'Active', 1, '2018-07-15 10:24:18', '2018-07-15 10:24:18'),
(17, 'Message', 2, 'message.html', '_self', 3, NULL, 'Active', 1, '2018-07-16 05:25:28', '2018-07-16 05:27:41'),
(18, 'Registration Information', 12, 'registration-information.html', '_self', 12, NULL, 'Active', 1, '2018-07-16 06:49:21', '2018-07-16 06:49:21'),
(19, 'Program', 0, 'program.html', '_self', 4, NULL, 'Active', 1, '2018-07-16 09:15:42', '2018-07-16 09:15:42'),
(20, 'venue', 0, 'venue.html', '_self', 5, NULL, 'Active', 1, '2018-07-16 09:20:00', '2018-07-16 09:20:00'),
(21, 'Latest News', 0, 'latest-news.html', '_self', 13, NULL, 'Active', 1, '2018-07-16 09:26:12', '2018-07-16 09:26:12'),
(22, 'Contact Us', 0, 'contact-us.html', '_self', 14, NULL, 'Active', 1, '2018-07-16 09:31:59', '2018-07-16 09:31:59');

-- --------------------------------------------------------

--
-- Table structure for table `ht_model_has_permissions`
--

CREATE TABLE `ht_model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ht_model_has_roles`
--

CREATE TABLE `ht_model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ht_model_has_roles`
--

INSERT INTO `ht_model_has_roles` (`role_id`, `model_id`, `model_type`) VALUES
(1, 1, 'App\\User'),
(1, 72, 'App\\User'),
(1, 73, 'App\\User'),
(3, 1, 'App\\User'),
(4, 49, 'App\\User'),
(4, 55, 'App\\User'),
(5, 53, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `ht_pages`
--

CREATE TABLE `ht_pages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) NOT NULL,
  `detail` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `template` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ht_pages`
--

INSERT INTO `ht_pages` (`id`, `title`, `slug`, `detail`, `user_id`, `template`, `created_at`, `updated_at`) VALUES
(1, 'lenovo laptop ok', 'lenovo-laptop-ok', '<p>sdgg ed</p>', NULL, 'general', '2018-07-26 19:17:37', '2018-07-26 13:17:37'),
(2, 'About', 'about', '<p><span style=\"font-size: 24pt;\">Our founding</span></p>\r\n<p>Moz was founded by Rand Fishkin and Gillian Muessig in 2004. It was called SEOmoz, and started as a blog and an online community where some of the world\'s first SEO experts shared their research and ideas. We launched the Beginner\'s Guide to SEO and our first Search Ranking Factors study, and that hub of industry expertise transformed into a small consulting firm and led us to create some of our first SEO tools.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Early growth &amp; funding</p>\r\n<p>After a glimpse of the demand, we shifted our focus from consulting to our software, taking our first round of funding in 2007 to power the development of new tools and ideas. By 2009, we tallied our first 5,000 subscribers and codified our core values in the acronym TAGFEE, continuing to lead the industry with our educational content in an effort to demystify SEO (this is also when we started filming Whiteboard Fridays!).</p>\r\n<p>&nbsp;</p>\r\n<p>Series B funding</p>\r\n<p>A series B investment from The Foundry Group propelled our efforts into the broader realm of inbound marketing, a concept that rejects pushy sales in favor of attracting customers with real value. We acquired a Twitter analytics tool called Followerwonk as well as GetListed, a local SEO tool that has evolved into today\'s Moz Local.</p>', 54, 'general', '2018-07-27 06:07:42', '2018-07-27 00:07:42'),
(3, 'Tems and condition', 'tems-and-condition', '<p>This for test</p>', 54, 'general', '2018-07-26 19:17:18', '2018-07-26 13:17:18'),
(4, 'Policy', 'policy', '<p>What information we collect<br />We collect the following categories of information for the purposes listed below:</p>\r\n<p>When using our Website &ndash; our webserver will collect information like your IP-address, the website from which you were referred to our website, the webpages you are visiting on our Website, the browser you are using and its display settings, your operating system as well as date and duration of your visit. Further personal data will only be stored and processed if you voluntarily provide it to us, e.g. through a contact form.</p>\r\n<p>Device and app information &ndash; this category includes your device\'s type and model, system language, the device\'s operating system (such as Android or iOS), SDK version, mobile carrier name, mobile browsers installed on the device (such as Chrome or Safari), app history and usage information (such as information about running and installed apps on the device), information regarding downloads and installations of mobile applications and any information regarding in-app events (such as in-app purchases), your device\'s IP address, and identifiers assigned to your device, such as its iOS Identifier for Advertising (IDFA), Android Advertising ID, or other types of unique device identifiers (a number uniquely allocated to your device by your device manufacturer).</p>\r\n<p>Ad information &ndash; this category includes information about the online ads and personalized content we have served (or attempted to serve) to you. It includes things like how many times an ad has been served to you, what page the ad appeared on, whether you viewed, clicked on or otherwise interacted with the ad, ad engagement history and whether you visited the Advertiser&rsquo;s website, downloaded an app or purchased the product or service advertised.</p>\r\n<p>Location information &ndash; Appnext collects information about your general location (such as city and country). For example, we may use the IP address to identify your general location. This information does not tell us where your device is precisely located. This information is sent as a normal part of internet traffic. In addition, we also collect implicit location information, which allows us to infer that you are either interested in a place or that you might be at the place &ndash; this information does not actually tell us where your device is precisely located.</p>\r\n<p>In addition, Appnext may collect the precise location of your device (using GPS signals, device sensors, Wi-Fi access points, Bluetooth signals, Beacons signals and cell tower ids that can be used to derive or estimate precise location, or other geo-location data), when location services have been enabled by the end user for the mobile app or website that uses our SDK (you typically have to choose to turn on device-based location services).</p>\r\n<p>Log information &ndash; this category includes the app or website visited, session start/stop time, time zone, and network connection type (e.g., WiFi, cellular), and cookie information.</p>\r\n<p>Information from advertising partners (\"Advertisers\") and other third parties &ndash; this category includes information we receive from our Publishers, Advertisers and other Partners that we work with to help us deliver ads and personalized content to you and recognize you across browsers and devices. This may include pseudonymous advertiser identifiers that some Advertisers or other third party ad platforms choose to share with us. This information is also used to enhance data points about a particular unique browser or device.</p>\r\n<p>How We Use the Information We Collect<br />We use the information we collect for the following purposes:</p>\r\n<p>Serving ads and promoting apps &ndash; allow our Publishers to promote advertising, apps and content in their mobile apps, and to allow Advertisers to bid on Publishers&rsquo; inventory.</p>\r\n<p>Serve interest-based advertising and personalized content &ndash; enable our partners to infer interests and serve ads and personalized content to users based on their behavior, app activity and inferred interests. We will not serve interest-based ads or personalized content based on information that we consider sensitive, such as race, religion or health.</p>\r\n<p>Ad reporting and conversions &ndash; measure ad performance, report to Advertisers when and how users have viewed or clicked on their ads, or visited their website, and to report to Publishers when and how ads were shown on their properties and were clicked on.</p>\r\n<p>Analytics and frequency capping &ndash; allow our Publishers to analyze their applications (for this purpose, we use aggregated and anonymous benchmark data) and prevent users from seeing the same ad too many times.</p>\r\n<p>Fraud detection and prevention &ndash; identify invalid or incentivized clicks (or ad queries) and protect Appnext and our partners from fraudulent behavior.</p>\r\n<p>Enforce our policies, resolve disputes and communicate with you.</p>\r\n<p>Providing and improving our services &ndash; audit, research and analyze information in order to maintain, protect, and improve our services and develop new services, and to ensure that our technologies function properly.</p>', 54, 'general', '2018-07-26 19:48:45', '2018-07-26 13:48:45'),
(5, 'Privacy and policy', 'privacy-and-policy', '<p>ssdhrtyhtu</p>', 54, 'general', '2018-07-26 13:15:52', '2018-07-26 13:15:52'),
(6, 'Feedback', 'feedback', '<p>this for test</p>', 54, 'feedback', '2018-07-26 13:30:53', '2018-07-26 13:30:53'),
(7, 'Contact', 'contact', '<p>This for test</p>', 54, 'contact', '2018-07-26 13:31:55', '2018-07-26 13:31:55'),
(8, 'Terms', 'terms', '<p>What are Terms and Conditions<br />Terms and Conditions are a set of rules and guidelines that a user must agree to in order to use your website or mobile app. It acts as a legal contract between you (the company) who has the website or mobile app and the user who access your website and mobile app.</p>\r\n<p>It&rsquo;s up to you to set the rules and guidelines that the user must agree to. You can think of your Terms and Conditions agreement as the legal agreement where you maintain your rights to exclude users from your app in the event that they abuse your app, and where you maintain your legal rights against potential app abusers, and so on.</p>\r\n<p>Terms and Conditions are also known as Terms of Service or Terms of Use.</p>\r\n<p>This type of legal agreement can be used for both your website and your mobile app. It&rsquo;s not required (it&rsquo;s not recommended actually) to have separate Terms and Conditions agreements: one for your website and one for your mobile app.</p>', 54, 'general', '2018-07-26 19:50:06', '2018-07-26 13:50:06'),
(9, 'Sitemap', 'sitemap', '<p>This for test</p>', 54, 'general', '2018-07-26 13:34:19', '2018-07-26 13:34:19');

-- --------------------------------------------------------

--
-- Table structure for table `ht_password_resets`
--

CREATE TABLE `ht_password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ht_password_resets`
--

INSERT INTO `ht_password_resets` (`email`, `token`, `created_at`) VALUES
('rashed@gmail.com', '$2y$10$MMGnSZ/tk1tOOcdBeoE6FejTaUjK9lsmR56HrcOj6WkdyVKrBjEHK', '2018-07-26 21:34:54');

-- --------------------------------------------------------

--
-- Table structure for table `ht_permissions`
--

CREATE TABLE `ht_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ht_permissions`
--

INSERT INTO `ht_permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'users_manage', 'web', '2018-04-21 22:34:11', '2018-04-23 01:10:38'),
(2, 'Institution Type', 'web', '2018-04-21 22:44:25', '2018-07-02 19:12:11'),
(13, 'Settings Manager', 'web', '2018-04-23 06:04:12', '2018-04-25 03:32:32'),
(15, 'Institution Management', 'web', '2018-07-02 18:58:12', '2018-07-02 19:01:18'),
(16, 'Institution Category', 'web', '2018-07-03 10:09:18', '2018-07-03 10:09:18'),
(17, 'Institution', 'web', '2018-07-03 10:09:36', '2018-07-03 10:09:36'),
(18, 'Class', 'web', '2018-07-03 10:09:47', '2018-07-03 10:09:47'),
(19, 'Subject', 'web', '2018-07-03 10:16:53', '2018-07-03 10:16:53'),
(20, 'Department', 'web', '2018-07-03 10:17:04', '2018-07-03 10:17:04'),
(21, 'Level/Year', 'web', '2018-07-03 10:17:15', '2018-07-03 10:17:15'),
(22, 'Writer', 'web', '2018-07-03 10:17:25', '2018-07-03 10:17:25'),
(23, 'Content Type', 'web', '2018-07-03 10:17:36', '2018-07-03 10:17:36'),
(24, 'School & College', 'web', '2018-07-03 10:17:51', '2018-07-03 10:17:51'),
(25, 'Madrasha', 'web', '2018-07-03 10:18:01', '2018-07-03 10:18:01'),
(26, 'English Medium', 'web', '2018-07-03 10:18:16', '2018-07-03 10:18:16'),
(27, 'English Version', 'web', '2018-07-03 10:18:27', '2018-07-03 10:18:27'),
(28, 'Qawmi', 'web', '2018-07-03 10:18:37', '2018-07-03 10:18:37'),
(29, 'Technical & Vocational', 'web', '2018-07-03 10:18:50', '2018-07-03 10:18:50'),
(30, 'Admission Test', 'web', '2018-07-03 10:19:02', '2018-07-03 10:19:02'),
(31, 'Under Graduate', 'web', '2018-07-03 10:19:13', '2018-07-03 10:19:13'),
(32, 'Post Graduate', 'web', '2018-07-03 10:19:25', '2018-07-03 10:19:25'),
(33, 'Higher Study', 'web', '2018-07-03 10:19:36', '2018-07-03 10:19:36'),
(34, 'Job', 'web', '2018-07-03 10:19:46', '2018-07-03 10:19:46'),
(35, 'Skill Development', 'web', '2018-07-03 10:19:58', '2018-07-03 10:19:58'),
(36, 'Approve Manager', 'web', '2018-07-26 23:06:37', '2018-07-26 23:06:37'),
(37, 'Pages Manager', 'web', '2018-07-26 23:06:51', '2018-07-26 23:06:51'),
(38, 'Blogs Manager', 'web', '2018-07-26 23:07:02', '2018-07-26 23:07:02'),
(39, 'Feedback Manager', 'web', '2018-07-26 23:07:18', '2018-07-26 23:07:18'),
(40, 'Location', 'web', '2018-09-08 09:28:51', '2018-09-08 09:28:51'),
(41, 'University Manager', 'web', '2018-09-08 10:41:14', '2018-09-08 10:41:14'),
(42, 'Job Exam Subject', 'web', '2018-09-09 18:48:30', '2018-09-09 18:48:30'),
(43, 'Job Exam', 'web', '2018-09-09 18:48:48', '2018-09-09 18:48:48'),
(44, 'Skill Development Category', 'web', '2018-09-09 19:00:36', '2018-09-09 19:00:36');

-- --------------------------------------------------------

--
-- Table structure for table `ht_role`
--

CREATE TABLE `ht_role` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ht_role`
--

INSERT INTO `ht_role` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2018-06-01 04:14:10', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ht_roles`
--

CREATE TABLE `ht_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ht_roles`
--

INSERT INTO `ht_roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'web', '2018-04-21 22:34:11', '2018-04-21 22:34:11'),
(2, 'manager', 'web', '2018-04-21 22:58:52', '2018-04-21 22:58:52'),
(3, 'users', 'web', '2018-04-23 04:57:15', '2018-04-23 04:57:15'),
(6, 'Supervisor', 'web', '2018-07-26 23:00:36', '2018-07-26 23:00:36');

-- --------------------------------------------------------

--
-- Table structure for table `ht_role_has_permissions`
--

CREATE TABLE `ht_role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ht_role_has_permissions`
--

INSERT INTO `ht_role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(2, 2),
(2, 3),
(13, 1),
(13, 6),
(15, 1),
(16, 1),
(17, 1),
(17, 6),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(25, 6),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ht_settings`
--

CREATE TABLE `ht_settings` (
  `id` int(11) NOT NULL,
  `key` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ht_settings`
--

INSERT INTO `ht_settings` (`id`, `key`, `name`, `value`, `type`, `created_at`, `updated_at`) VALUES
(1, 'for_information', 'FOR INFORMATION', 'FOR INFORMATION', 'label', NULL, '2018-08-27 12:00:37'),
(2, 'registration', 'Registretion', 'Cardiology', 'label', NULL, '2018-07-19 09:19:16'),
(3, 'registration_link', 'Registration Link', 'Cardiology', 'label', NULL, '2018-07-19 09:20:23'),
(4, 'conference_sponsor', 'CONFERENCE SPONSOR', 'Cardiology', 'label', NULL, NULL),
(5, 'home', 'Home', 'Cardiology', 'label', NULL, NULL),
(6, 'address', 'Address', 'Cardiology', 'label', NULL, NULL),
(7, 'phone', 'Phone', 'Phone', 'label', NULL, '2018-08-27 12:03:59'),
(8, 'email', 'Email', 'Email', 'label', NULL, '2018-08-27 12:03:47'),
(9, 'dusai_resort', 'DUSAI RESORT', 'Cardiology', 'label', NULL, NULL),
(10, 'the_conference', 'THE CONFERENCE', 'Cardiology', 'label', NULL, '2018-07-19 10:50:18'),
(11, 'support_organization', 'SUPPORT & ORGANISATION', 'Cardiology', 'label', NULL, NULL),
(12, 'all_rights_reserved', 'All rights reserved. ', 'Cardiology', 'label', NULL, NULL),
(13, 'design_developed_by', 'Design & Developed By', 'Cardiology', 'label', NULL, NULL),
(14, 'programme', 'PROGRAMME', 'Cardiology', 'label', NULL, NULL),
(15, 'organizers', 'ORGANIZERS', 'Cardiology', 'label', NULL, NULL),
(16, 'travel_to_marketting_food', 'TRAVELTO MARKETTING & FOOD', 'Cardiology', 'label', NULL, NULL),
(17, 'continue_reading', 'Continue Reading', 'Cardiology', 'label', NULL, '2018-07-23 09:30:30'),
(18, 'send_us_a_message', 'SEND US A MESSAGE', 'Cardiology', 'label', NULL, NULL),
(19, 'categories', 'Categories', 'Cardiology', 'label', NULL, NULL),
(20, 'recent_post', 'Recent Post', 'Cardiology', 'label', NULL, NULL),
(22, 'side_title', 'SIDE TITLE', 'Cardiology', 'label', NULL, NULL),
(25, 'join_fmmsb', 'Join FMMSB Conference', 'Cardiology', 'label', NULL, NULL),
(26, 'join_fmmsb_link', 'Join FMMSB Link', 'Cardiology', 'label', NULL, '2018-07-19 09:31:34'),
(27, 'join_fmmsb_desct', 'Join FMMSB Conference Short Description', 'Cardiology', 'label', NULL, '2018-07-19 09:30:39'),
(28, 'registration_program', 'Registration Now for Progme ', 'Cardiology', 'label', NULL, NULL),
(29, 'registration_program_link', 'Registration Now for Progme  Link', 'Cardiology', 'label', NULL, NULL),
(30, 'registration_type', 'Registration Type', 'Cardiology', 'label', NULL, NULL),
(31, 'please_inform', 'Please inform your personal information', 'Cardiology', 'label', NULL, NULL),
(32, 'registration_now', 'Registration now', 'Cardiology', 'label', NULL, NULL),
(33, 'committee_per_page', 'Committee/Speaker Per Page', 'Cardiology', 'label', NULL, '2018-08-16 09:20:50'),
(34, 'site_title', 'test', 'My Study', 'system', NULL, '2018-08-27 09:29:06'),
(35, 'site_slogan', '', 'Healthy Heart - Happy Feet', 'system', NULL, NULL),
(45, 'site_phone', NULL, '01770823204', 'system', NULL, NULL),
(46, 'site_email', NULL, 'info@bangladeshheart.com', 'system', NULL, NULL),
(47, 'site_address', NULL, '274, Mazar Road, Chalabon, Dokkhin Khan, Dhaka-1230, Bangladesh', 'system', NULL, NULL),
(48, 'site_facebook', NULL, 'https://www.facebook.com/', 'system', NULL, NULL),
(49, 'site_twitter', NULL, 'https://twitter.com', 'system', NULL, NULL),
(50, 'site_linkedin', NULL, 'https://bd.linkedin.com/', 'system', NULL, NULL),
(51, 'site_google_plus', NULL, 'https://plus.google.com', 'system', NULL, NULL),
(52, 'site_instagram', NULL, 'https://www.instagram.com', 'system', NULL, NULL),
(53, 'site_pinterest', NULL, 'https://www.pinterest.com/', 'system', NULL, NULL),
(54, 'site_sub_slogan', NULL, 'Humanity & Research Program', 'system', NULL, NULL),
(55, 'site_sister_concern', NULL, 'A sister concern of change the lives foundation', 'system', NULL, NULL),
(56, 'site_fevicon', NULL, '/photos/72/logo.png', 'system', NULL, NULL),
(57, 'site_logo', NULL, '/photos/72/logo.png', 'system', NULL, NULL),
(58, 'site_alt_logo', NULL, '/photos/1/logo2.png', 'system', NULL, NULL),
(59, 'show_statistics_section', NULL, 'no', 'system', NULL, NULL),
(60, 'spaecial_job_exam_id', NULL, '2', 'system', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ht_skills`
--

CREATE TABLE `ht_skills` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ht_skills`
--

INSERT INTO `ht_skills` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Skill 1', '2018-07-04 16:40:35', '0000-00-00 00:00:00'),
(2, 'Skill 2', '2018-07-04 16:40:35', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ht_skills_type`
--

CREATE TABLE `ht_skills_type` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ht_skills_type`
--

INSERT INTO `ht_skills_type` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Soft Skills', '2018-07-04 16:38:02', '0000-00-00 00:00:00'),
(2, 'Computer Skills', '2018-07-04 16:39:04', '0000-00-00 00:00:00'),
(3, 'Sports Skills', '2018-07-04 16:39:04', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ht_skill_development_category`
--

CREATE TABLE `ht_skill_development_category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ht_skill_development_category`
--

INSERT INTO `ht_skill_development_category` (`id`, `title`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Soft Skills', 0, '2018-09-09 19:12:48', '2018-09-09 19:12:48'),
(2, 'Interview', 1, '2018-09-09 19:13:28', '2018-09-09 19:13:28'),
(3, 'Communication', 1, '2018-09-16 19:31:52', '2018-09-16 19:31:52'),
(4, 'Leadership', 1, '2018-09-16 19:32:09', '2018-09-16 19:32:09'),
(5, 'Computer Skills', 0, '2018-09-16 19:33:09', '2018-09-16 19:33:09'),
(6, 'Excell', 5, '2018-09-16 19:33:43', '2018-09-16 19:33:43'),
(7, 'MS Word', 5, '2018-09-16 19:33:57', '2018-09-16 19:33:57');

-- --------------------------------------------------------

--
-- Table structure for table `ht_standarized_tests`
--

CREATE TABLE `ht_standarized_tests` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ht_standarized_tests`
--

INSERT INTO `ht_standarized_tests` (`id`, `title`, `created_at`, `updated_at`) VALUES
(3, 'GRE', '2018-07-08 02:04:19', '0000-00-00 00:00:00'),
(4, 'IELTS', '2018-09-13 01:10:07', '2018-09-12 19:10:07'),
(6, 'Gre', '2018-09-12 10:22:21', '2018-09-12 10:22:21');

-- --------------------------------------------------------

--
-- Table structure for table `ht_subject`
--

CREATE TABLE `ht_subject` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `institution_category_id` int(11) DEFAULT NULL,
  `level_year_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `writer_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ht_subject`
--

INSERT INTO `ht_subject` (`id`, `title`, `institution_category_id`, `level_year_id`, `department_id`, `writer_id`, `created_at`, `updated_at`) VALUES
(3, 'English Today', 0, 0, 3, 4, '2018-07-21 14:05:08', '2018-07-21 08:05:08'),
(4, 'strength of materials', 0, 0, 2, 4, '2018-07-21 14:06:04', '2018-07-21 08:06:04'),
(5, 'physics', 0, 0, 3, 4, '2018-07-21 14:08:48', '2018-07-21 08:08:48'),
(6, 'বাংলা প্রথম পত্র', 0, 0, NULL, 4, '2018-07-21 00:03:03', '2018-07-21 00:03:03'),
(7, 'সাধারন গনিত', 0, 0, NULL, 2, '2018-07-21 00:05:36', '2018-07-21 00:05:36'),
(8, 'আরবি প্রথম পত্র', 0, 0, NULL, 4, '2018-08-04 10:16:58', '2018-08-04 04:16:58'),
(9, 'কুরআন ও হাদিস', 0, 0, NULL, 4, '2018-07-21 01:01:10', '2018-07-21 01:01:10'),
(10, 'সাধারন গনিত', 0, 0, NULL, 4, '2018-07-21 01:02:05', '2018-07-21 01:02:05'),
(11, 'Electricity', 0, NULL, 3, 4, '2018-07-21 04:59:16', '2018-07-21 04:59:16'),
(12, 'English Today', 0, NULL, NULL, 4, '2018-07-21 07:19:49', '2018-07-21 07:19:49'),
(13, 'Professor', 0, NULL, NULL, 4, '2018-07-21 13:35:01', '2018-07-21 07:35:01'),
(14, 'নাহু মীর', 0, NULL, NULL, 4, '2018-07-21 07:37:24', '2018-07-21 07:37:24'),
(15, 'Electronics', 0, NULL, NULL, 4, '2018-07-21 07:40:42', '2018-07-21 07:40:42'),
(16, 'lenovo laptop', 0, NULL, NULL, 4, '2018-07-21 07:41:57', '2018-07-21 07:41:57'),
(17, 'lenovo laptop', 0, NULL, 3, 4, '2018-07-21 07:59:14', '2018-07-21 07:59:14'),
(18, 'Chemistry', 0, NULL, 3, 4, '2018-07-28 05:59:07', '2018-07-28 05:59:07'),
(19, 'Electricity', 0, NULL, 3, 4, '2018-07-28 06:13:21', '2018-07-28 06:13:21'),
(20, 'সাধারন গনিত', 0, NULL, NULL, NULL, '2018-08-02 20:20:57', '2018-08-02 20:20:57'),
(21, 'সাধারন বিজ্ঞান', 0, NULL, NULL, NULL, '2018-08-02 20:21:50', '2018-08-02 20:21:50'),
(23, 'English Language', 0, NULL, NULL, NULL, '2018-08-04 11:52:33', '2018-08-04 05:52:33'),
(24, 'আদর্শ বাংলা পাঠ', 0, NULL, NULL, NULL, '2018-08-04 06:03:45', '2018-08-04 06:03:45'),
(25, 'মেকানিক্স', 6, NULL, NULL, NULL, '2018-08-19 13:30:51', '2018-08-19 07:30:51'),
(26, 'Physics', 4, NULL, NULL, NULL, '2018-08-07 16:04:02', '2018-08-07 10:04:01'),
(27, 'Chemistry', 4, NULL, NULL, NULL, '2018-08-07 10:04:36', '2018-08-07 10:04:36'),
(28, 'Introduction To Programming', 4, NULL, 4, NULL, '2018-08-08 17:21:17', '2018-08-08 11:21:17'),
(29, 'A’ Level Accounting', 7, NULL, 3, 2, '2018-08-13 10:15:04', '2018-08-13 10:15:04'),
(30, 'Social Studies', 4, NULL, 4, 4, '2018-08-14 01:49:34', '2018-08-13 19:49:34'),
(31, 'সাধারন গনিত', 8, NULL, 4, 2, '2018-08-16 15:45:12', '2018-08-16 09:45:12'),
(32, 'A’ Level Accounting', NULL, NULL, NULL, NULL, '2018-08-17 23:34:11', '2018-08-17 23:34:11'),
(33, 'english 1', NULL, NULL, NULL, NULL, '2018-08-17 23:49:37', '2018-08-17 23:49:37'),
(34, 'English for today', NULL, NULL, NULL, NULL, '2018-08-20 01:10:57', '2018-08-20 01:10:57'),
(35, 'social science', NULL, NULL, NULL, NULL, '2018-08-20 01:17:02', '2018-08-20 01:17:02'),
(36, 'amar bangla', NULL, NULL, NULL, NULL, '2018-09-02 03:10:34', '2018-09-02 03:10:34');

-- --------------------------------------------------------

--
-- Table structure for table `ht_subject_has_class`
--

CREATE TABLE `ht_subject_has_class` (
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ht_subject_has_class`
--

INSERT INTO `ht_subject_has_class` (`subject_id`, `class_id`) VALUES
(29, 11),
(29, 12),
(30, 41),
(31, 9),
(31, 10),
(31, 11),
(28, 41),
(32, 36),
(33, 42),
(34, 28),
(34, 27),
(25, 43),
(26, 17),
(26, 43),
(34, 32),
(34, 31),
(34, 30),
(34, 29),
(35, 35),
(35, 42),
(36, 31);

-- --------------------------------------------------------

--
-- Table structure for table `ht_subject_has_type`
--

CREATE TABLE `ht_subject_has_type` (
  `subject_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ht_subject_has_type`
--

INSERT INTO `ht_subject_has_type` (`subject_id`, `type_id`) VALUES
(29, 8),
(29, 7),
(29, 6),
(30, 9),
(31, 1),
(28, 8),
(32, 3),
(33, 4),
(34, 5),
(27, 7),
(25, 6),
(26, 2),
(34, 1),
(35, 4),
(35, 3),
(36, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ht_templates`
--

CREATE TABLE `ht_templates` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `page_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ht_templates`
--

INSERT INTO `ht_templates` (`id`, `title`, `page_name`, `created_at`, `updated_at`) VALUES
(1, 'General Page', 'general', NULL, NULL),
(2, 'About', 'about', NULL, NULL),
(11, 'Contact Us', 'contact_us', NULL, NULL),
(12, 'Feedback', 'feedback', NULL, NULL),
(13, 'Contact', 'contact', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ht_university`
--

CREATE TABLE `ht_university` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ht_university`
--

INSERT INTO `ht_university` (`id`, `country_id`, `state_id`, `city_id`, `name`, `link`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 3, 'Bnagla clollege', 'https://www.facebook.com/', '2018-09-09 01:41:45', '2018-09-08 19:41:45'),
(2, 1, 2, 3, 'Bangladesh', 'https://www.facebook.com/', '2018-09-08 19:31:32', '2018-09-08 19:31:32');

-- --------------------------------------------------------

--
-- Table structure for table `ht_useful_higher_education`
--

CREATE TABLE `ht_useful_higher_education` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_desc` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ht_useful_higher_education`
--

INSERT INTO `ht_useful_higher_education` (`id`, `title`, `short_desc`, `link`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'lenovo laptop ok', 'lenovo laptop  lenovo laptop', 'https://www.facebook.com/', 1, '2018-09-11 16:21:24', '2018-09-11 10:21:24');

-- --------------------------------------------------------

--
-- Table structure for table `ht_users`
--

CREATE TABLE `ht_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ht_users`
--

INSERT INTO `ht_users` (`id`, `name`, `email`, `password`, `phone`, `image`, `status`, `user_type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'anam khan ed', 'anam@gmail.com', '$2y$10$aiV42mvvqqX8EPWGbcV24.7R.VNAFf.XASgsAQtTHzp7ESgEAMsWC', '01787841565', '/photos/1/BannerX4.jpg', 'Active', NULL, 'CDHIG5KSX62VDIkvhbcQtOgj4mdaevjBT8UvSCOmBCn9KYpwFKk2A005Y2cI', '2018-04-23 04:07:29', '2018-09-02 10:22:05'),
(72, 'rabiul islam', 'rabiul0420@gmail.com', '$2y$10$ESnYuIFvK.2.YwWqU4YbpOuDIG0y0elz3Xe381XcV8nFgOIFAuT0S', '0166789', '/photos/72/Penguins.jpg', 'Active', NULL, '5RBDUoftI5Uw2u8WCNd2XcL8sFZDUxJCjYv2CblHrkoVTk5uxtk20F1cU2PU', '2018-09-02 18:09:15', '2018-09-07 06:09:13'),
(73, 'amir khan', 'amir@gmail.com', '$2y$10$BtJisK5t.WZgE354Zwu4s.ZpM8e8qeKACZOuoV2X2VxP00unxyw7m', '016678', '/photos/1/BannerX4.jpg', 'Active', NULL, NULL, '2018-09-02 18:11:06', '2018-09-02 18:15:11'),
(74, 'rashed khan', 'ytyfy@gmail.com', '$2y$10$xNwtPVWcsKD4TcG7B8VR2ei7XZm5u4XlvBaIy0F5zMfgQdbnOHJ9i', NULL, NULL, NULL, 'Teacher', 'VXSPdcsTCTbimBlCDcWvEoJ1EC1Ot7DS1Fkg848znlGFLIHuVAZ5mQcwZzIF', '2018-09-06 23:37:47', '2018-09-06 23:37:47'),
(75, 'rashed khan', 'ddtr@wewqr.com', '$2y$10$YF6qald8F.ug0ls501a/o.SkfaTUTlEURiVwFP8MDvBCJQLSVOSEa', NULL, NULL, NULL, 'Student', 'rOur5QLlaytg9cMPtZWo9YrjlZ0JKOhbtc5AVuycHSlUxNWpWH2vY8v6Bmlf', '2018-09-06 23:43:30', '2018-09-06 23:43:30'),
(76, 'rashed khan', 'seller@gmail.com', '$2y$10$NJxM/KITMKdTz0UNubY5XeyVuajI5ePHQgPYgStu/8F2/2at6dALe', NULL, NULL, NULL, 'Student', NULL, '2018-09-06 23:44:27', '2018-09-06 23:44:27');

-- --------------------------------------------------------

--
-- Table structure for table `ht_writer`
--

CREATE TABLE `ht_writer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ht_writer`
--

INSERT INTO `ht_writer` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'karim joidan', '2018-05-28 08:27:49', '2018-05-28 08:27:49'),
(4, 'Abdur Rahim', '2018-05-31 23:23:39', '2018-05-31 23:23:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ht_blogs`
--
ALTER TABLE `ht_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_classes`
--
ALTER TABLE `ht_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_contents`
--
ALTER TABLE `ht_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_content_section`
--
ALTER TABLE `ht_content_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_content_type`
--
ALTER TABLE `ht_content_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_department`
--
ALTER TABLE `ht_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_feedback`
--
ALTER TABLE `ht_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_global_setting`
--
ALTER TABLE `ht_global_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_higher_job_material_type`
--
ALTER TABLE `ht_higher_job_material_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_institution`
--
ALTER TABLE `ht_institution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_institution_category`
--
ALTER TABLE `ht_institution_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_institution_type`
--
ALTER TABLE `ht_institution_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_job_circular`
--
ALTER TABLE `ht_job_circular`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_job_exam`
--
ALTER TABLE `ht_job_exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_job_exam_subject`
--
ALTER TABLE `ht_job_exam_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_level_year`
--
ALTER TABLE `ht_level_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_locations`
--
ALTER TABLE `ht_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_material_type`
--
ALTER TABLE `ht_material_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_menu`
--
ALTER TABLE `ht_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_model_has_permissions`
--
ALTER TABLE `ht_model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `ht_model_has_roles`
--
ALTER TABLE `ht_model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `ht_pages`
--
ALTER TABLE `ht_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_password_resets`
--
ALTER TABLE `ht_password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `ht_permissions`
--
ALTER TABLE `ht_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_role`
--
ALTER TABLE `ht_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_roles`
--
ALTER TABLE `ht_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_role_has_permissions`
--
ALTER TABLE `ht_role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `ht_settings`
--
ALTER TABLE `ht_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_skills`
--
ALTER TABLE `ht_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_skills_type`
--
ALTER TABLE `ht_skills_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_skill_development_category`
--
ALTER TABLE `ht_skill_development_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_standarized_tests`
--
ALTER TABLE `ht_standarized_tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_subject`
--
ALTER TABLE `ht_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_templates`
--
ALTER TABLE `ht_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_university`
--
ALTER TABLE `ht_university`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_useful_higher_education`
--
ALTER TABLE `ht_useful_higher_education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_users`
--
ALTER TABLE `ht_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_writer`
--
ALTER TABLE `ht_writer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ht_blogs`
--
ALTER TABLE `ht_blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_classes`
--
ALTER TABLE `ht_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `ht_contents`
--
ALTER TABLE `ht_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `ht_content_section`
--
ALTER TABLE `ht_content_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ht_content_type`
--
ALTER TABLE `ht_content_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ht_department`
--
ALTER TABLE `ht_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_feedback`
--
ALTER TABLE `ht_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ht_global_setting`
--
ALTER TABLE `ht_global_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ht_higher_job_material_type`
--
ALTER TABLE `ht_higher_job_material_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_institution`
--
ALTER TABLE `ht_institution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `ht_institution_category`
--
ALTER TABLE `ht_institution_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ht_institution_type`
--
ALTER TABLE `ht_institution_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ht_job_circular`
--
ALTER TABLE `ht_job_circular`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ht_job_exam`
--
ALTER TABLE `ht_job_exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ht_job_exam_subject`
--
ALTER TABLE `ht_job_exam_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ht_level_year`
--
ALTER TABLE `ht_level_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ht_locations`
--
ALTER TABLE `ht_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ht_material_type`
--
ALTER TABLE `ht_material_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_menu`
--
ALTER TABLE `ht_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `ht_pages`
--
ALTER TABLE `ht_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ht_permissions`
--
ALTER TABLE `ht_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `ht_role`
--
ALTER TABLE `ht_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ht_roles`
--
ALTER TABLE `ht_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ht_settings`
--
ALTER TABLE `ht_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `ht_skills`
--
ALTER TABLE `ht_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ht_skills_type`
--
ALTER TABLE `ht_skills_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ht_skill_development_category`
--
ALTER TABLE `ht_skill_development_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ht_standarized_tests`
--
ALTER TABLE `ht_standarized_tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ht_subject`
--
ALTER TABLE `ht_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `ht_templates`
--
ALTER TABLE `ht_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ht_university`
--
ALTER TABLE `ht_university`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ht_useful_higher_education`
--
ALTER TABLE `ht_useful_higher_education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ht_users`
--
ALTER TABLE `ht_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `ht_writer`
--
ALTER TABLE `ht_writer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
