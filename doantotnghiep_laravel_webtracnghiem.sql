-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 17, 2022 at 08:16 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doantotnghiep_laravel_webtracnghiem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` tinyint(4) DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriptions` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `age`, `phone`, `facebook`, `youtube`, `avatar`, `address`, `descriptions`, `birthday`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Nam', 'doantotnghiep@gmail.com', '$2y$10$m/6wIaT3hbj3C5n09K/WUOWcsIi7.tK6TFDF.H2tCywOayEDrwiOm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qe4Wn4b5aSe1649uK6QKp3ob4shEHzlOkNTQV63Mo5Adyoqd2KDnL0NXSETo', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categoryposts`
--

CREATE TABLE `categoryposts` (
  `id` int(10) UNSIGNED NOT NULL,
  `cpo_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpo_slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpo_sort` tinyint(4) DEFAULT '0',
  `cpo_type` tinyint(4) DEFAULT '0',
  `cpo_hot` tinyint(4) DEFAULT '0',
  `cpo_count_post` int(11) DEFAULT '0',
  `cpo_parent_id` int(11) DEFAULT '0',
  `cpo_content` longtext COLLATE utf8mb4_unicode_ci,
  `cpo_active` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categoryposts`
--

INSERT INTO `categoryposts` (`id`, `cpo_name`, `cpo_slug`, `cpo_sort`, `cpo_type`, `cpo_hot`, `cpo_count_post`, `cpo_parent_id`, `cpo_content`, `cpo_active`, `created_at`, `updated_at`) VALUES
(1, 'Học Java cơ bản', 'hoc-java-co-ban', 1, 1, 0, 0, 0, '<p>Đang cập nhật</p>', 0, NULL, NULL),
(2, 'Học java nâng cao', 'hoc-java-nang-cao', NULL, 1, 0, 0, 0, NULL, 0, NULL, NULL),
(3, 'Java Programming', 'java-programming', 1, 1, 0, 0, 1, '<p>These Java examples are categorized as basic, array, numbers, math functions, string, classes, inheritance, event handling, exception handling, collections, methods, java applets, searching, Sorting, etc. We have also listed programs on data structure topics like trees, heaps, linked lists, hash tables, stacks, and queues. Each sample program includes a program description, Java code, and program output. All examples have been compiled and tested on Windows and Linux systems.</p>', 0, NULL, NULL),
(4, 'Học nâng cao', 'hoc-nang-cao', 2, 1, 0, 0, 2, '<p>Nội dung đang cập nhật</p>', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `cmt_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cmt_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cmt_content` longtext COLLATE utf8mb4_unicode_ci,
  `cmt_post_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id` int(10) UNSIGNED NOT NULL,
  `e_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `e_host` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `e_drive` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `e_post` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `e_password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(10) UNSIGNED NOT NULL,
  `e_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `e_level` tinyint(4) DEFAULT '0',
  `e_user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `e_code`, `e_level`, `e_user_id`, `created_at`, `updated_at`) VALUES
(19, 'bRucKeLgUa', 1, 1, NULL, NULL),
(20, 'Ejl5tJ5Y0g', 1, 1, NULL, NULL),
(21, '2Aw9RDYSdr', 1, 1, NULL, NULL),
(22, 'dwmgr7QBfw', 1, 1, NULL, NULL),
(23, 'YrC4PaWoHo', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exams_users`
--

CREATE TABLE `exams_users` (
  `eu_exam_id` int(11) NOT NULL,
  `eu_question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams_users`
--

INSERT INTO `exams_users` (`eu_exam_id`, `eu_question_id`) VALUES
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 1),
(21, 2),
(22, 1),
(22, 2),
(22, 3),
(23, 1),
(23, 2),
(23, 3),
(23, 4);

-- --------------------------------------------------------

--
-- Table structure for table `exam_result`
--

CREATE TABLE `exam_result` (
  `id` int(10) UNSIGNED NOT NULL,
  `er_user_id` int(11) NOT NULL,
  `er_point` int(11) NOT NULL,
  `er_exam_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_result`
--

INSERT INTO `exam_result` (`id`, `er_user_id`, `er_point`, `er_exam_id`, `created_at`, `updated_at`) VALUES
(1, 3, 0, 20, NULL, NULL),
(2, 3, 0, 20, NULL, NULL),
(3, 3, 0, 20, NULL, NULL),
(4, 3, 3, 22, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriptions` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_01_01_085640_create_posts_table', 1),
(4, '2018_01_03_181523_create_admins_table', 1),
(5, '2018_01_04_154143_create_settings_table', 1),
(6, '2018_01_04_173802_create_slides_table', 1),
(7, '2018_01_09_125217_create_level_table', 1),
(8, '2018_01_16_164143_create_email_table', 1),
(9, '2018_01_18_011628_create_categoryposts_table', 1),
(10, '2018_01_19_094530_add_relationships_post_category', 1),
(11, '2018_02_03_220811_create_questions_table', 1),
(12, '2018_02_25_092343_add_filed_question5_question_table', 1),
(13, '2018_03_05_140931_create_comments_table', 1),
(14, '2018_03_07_000458_add_filed_sort_posts_table', 1),
(15, '2018_03_16_202037_create_exams_users_table', 1),
(16, '2018_03_16_203757_create_exams_table', 1),
(17, '2018_03_19_221124_create_sessions_table', 1),
(18, '2018_03_20_123054_create_exam_result_table', 1),
(19, '2018_03_27_113139_create_post_about_table', 1),
(20, '2018_04_20_200641_create_test_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `po_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_keywords` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_hot` tinyint(4) DEFAULT '0',
  `po_category_post_id` int(10) UNSIGNED DEFAULT '0',
  `po_active` int(11) DEFAULT '0',
  `po_admin_id` int(10) UNSIGNED DEFAULT NULL,
  `po_thunbar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_content` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `po_sort` int(11) DEFAULT '0' COMMENT 'sap xep '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `po_title`, `po_slug`, `po_keywords`, `po_description`, `po_tags`, `po_hot`, `po_category_post_id`, `po_active`, `po_admin_id`, `po_thunbar`, `po_content`, `created_at`, `updated_at`, `po_sort`) VALUES
(1, 'Bài Java Program', 'bai-java-program', 'Java Program', 'Java Program', NULL, 1, 3, 1, 1, NULL, '<p>Nội dung b&agrave;i viết</p>', '2022-10-17 12:35:07', '2022-10-17 12:35:07', 1),
(2, 'Bài học Simple Java Programs', 'bai-hoc-simple-java-programs', 'Simple Java Programs', 'Simple Java Programs', NULL, 1, 3, 1, 1, NULL, '<p>Đang cập nhật</p>', '2022-10-17 12:35:14', '2022-10-17 12:35:14', 2),
(3, 'Bài học 1000 bài tập java hay nổi tiếng', 'bai-hoc-1000-bai-tap-java-hay-noi-tieng', '1000 bài tập java hay nổi tiếng', '1000 bài tập java hay nổi tiếng', NULL, 1, 4, 1, 1, NULL, '<p>Nội dung b&agrave;i học&nbsp;</p>\r\n\r\n<p>1000 b&agrave;i tập java hay nổi tiếng3</p>', '2022-10-17 12:36:23', '2022-10-17 12:36:23', 3);

-- --------------------------------------------------------

--
-- Table structure for table `posts_about`
--

CREATE TABLE `posts_about` (
  `id` int(10) UNSIGNED NOT NULL,
  `po_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_keywords` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_hot` tinyint(4) DEFAULT '0',
  `po_sort` tinyint(4) DEFAULT '0',
  `po_active` int(11) DEFAULT '0',
  `po_thunbar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_content` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts_about`
--

INSERT INTO `posts_about` (`id`, `po_title`, `po_slug`, `po_keywords`, `po_description`, `po_hot`, `po_sort`, `po_active`, `po_thunbar`, `po_content`, `created_at`, `updated_at`) VALUES
(1, 'Bài viết liên quan giới thiệu', 'bai-viet-lien-quan-gioi-thieu', 'Bài viết liên quan giới thiệu', 'Bài viết liên quan giới thiệu', 0, 1, 1, NULL, '<p>B&agrave;i viết li&ecirc;n quan giới thiệu</p>', '2022-10-17 12:40:03', '2022-10-17 12:40:03');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `qs_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT ' câu hỏi ',
  `qs_suggestion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT ' gợi ý câu hỏi ',
  `qs_answer1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'câu trả lời ',
  `qs_answer2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'câu trả lời ',
  `qs_answer3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'câu trả lời ',
  `qs_answer4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'câu trả lời ',
  `qs_answer_true` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT ' đáp án đúng ',
  `qs_thunbar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT ' hình ảnh câu hỏi nếu có  ',
  `qs_post_id` int(11) DEFAULT NULL COMMENT ' khoas ngoai id bai viet ',
  `ps_category_post_id` int(11) DEFAULT NULL COMMENT ' khoas ngoai danh muc ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `qs_answer5` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'câu trả lời '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `qs_name`, `qs_suggestion`, `qs_answer1`, `qs_answer2`, `qs_answer3`, `qs_answer4`, `qs_answer_true`, `qs_thunbar`, `qs_post_id`, `ps_category_post_id`, `created_at`, `updated_at`, `qs_answer5`) VALUES
(1, '<p>Đang cập nhật</p>', '12121', 'Câu tả lời 1', 'Câu tả lời 2', 'Câu tả lời 3', 'Câu tả lời 4', 'qs_answer1', NULL, 0, 1, '2021-04-25 16:17:48', '2021-04-25 16:17:48', 'Câu tả lời 5'),
(2, '<p>Trả lời đ&aacute;p &aacute;n đi</p>', '2121', 'A', 'B', 'C', 'D', 'qs_answer1', NULL, 0, 1, '2021-12-17 10:25:02', '2021-12-17 10:25:02', 'A'),
(3, '<p>Bạn đang d&ugrave;ng laravel bao nhi&ecirc;u</p>', 'Dùng version 8x', '8x', '7x', '4x', '5x', 'qs_answer1', NULL, 0, 3, '2022-10-17 12:47:04', '2022-10-17 12:47:04', '10x'),
(4, '<p>B&agrave;i học tiếp</p>', 'Bài học tiếp', '1', '2', '3', '4', 'qs_answer1', NULL, 1, 3, '2022-10-17 12:52:31', '2022-10-17 12:52:31', '5');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `images` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `u_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `u_phone` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `u_age` tinyint(4) DEFAULT '0',
  `u_avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `u_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `u_online` tinyint(4) DEFAULT '0',
  `u_active` tinyint(4) DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `u_name`, `u_email`, `u_password`, `u_phone`, `u_age`, `u_avatar`, `u_address`, `u_online`, `u_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Đồ án', 'doantotnghiep@gmail.com', '$2y$10$e9ccrSBZieZCir4U9ittCujHICIJEBJJbCp2c0QQpmByrpC6Xyi46', NULL, 0, NULL, NULL, 0, 1, NULL, '2021-12-17 10:26:05', '2021-12-17 10:26:05'),
(3, 'Nam Nguyễn', 'namnguyen@gmail.com', '$2y$10$ilCsfZu5fOGTMPORkVIv..ckpvhMAtzLCATClN/wL/442P89jwWV6', NULL, 0, NULL, NULL, 0, 1, 'ZQuJmWZVGNGTjLZgdfbSbIcNNlXeKpj8miyASVD9t695XIFaS8qHAMiKLqmO', '2022-10-17 12:38:01', '2022-10-17 12:38:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categoryposts`
--
ALTER TABLE `categoryposts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categoryposts_cpo_name_unique` (`cpo_name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams_users`
--
ALTER TABLE `exams_users`
  ADD UNIQUE KEY `exams_users_eu_exam_id_eu_question_id_unique` (`eu_exam_id`,`eu_question_id`);

--
-- Indexes for table `exam_result`
--
ALTER TABLE `exam_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_po_admin_id_foreign` (`po_admin_id`);

--
-- Indexes for table `posts_about`
--
ALTER TABLE `posts_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_u_email_unique` (`u_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categoryposts`
--
ALTER TABLE `categoryposts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `exam_result`
--
ALTER TABLE `exam_result`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts_about`
--
ALTER TABLE `posts_about`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_po_admin_id_foreign` FOREIGN KEY (`po_admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
