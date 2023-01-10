-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2023 at 06:51 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

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
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` int(11) NOT NULL,
  `employeer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `job_id`, `employeer_id`, `user_id`, `created_at`, `updated_at`) VALUES
(14, 5, 3, 3, '2023-01-04 12:10:22', '2023-01-04 12:10:22'),
(15, 6, 4, 3, '2023-01-04 23:51:57', '2023-01-04 23:51:57'),
(16, 8, 4, 9, '2023-01-05 03:10:54', '2023-01-05 03:10:54'),
(17, 9, 4, 9, '2023-01-07 22:52:44', '2023-01-07 22:52:44');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_jobs` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `no_jobs`, `created_at`, `updated_at`) VALUES
(3, 'Data Entry Operator', 2, '2023-01-07 22:29:12', '2023-01-07 22:36:01');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `degree_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institute` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passing_year` date NOT NULL,
  `result` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `user_id`, `degree_name`, `subject`, `institute`, `location`, `passing_year`, `result`, `created_at`, `updated_at`) VALUES
(1, 3, 'Erich Sullivan', 'Accusantium deserunt', 'Ullamco vero aut sun', 'Et labore laborum es', '2021-09-17', 'Laborum Eiusmod ass', '2023-01-04 12:29:21', '2023-01-04 12:29:21'),
(2, 3, 'Elmo Martinez', 'Voluptas excepteur e', 'Voluptatem Nulla in', 'Est est lorem eos s', '1977-11-07', 'Accusamus commodo il', '2023-01-04 12:29:36', '2023-01-04 12:29:36');

-- --------------------------------------------------------

--
-- Table structure for table `employeers`
--

CREATE TABLE `employeers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_employeer` tinyint(1) NOT NULL DEFAULT 0,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employeers`
--

INSERT INTO `employeers` (`id`, `name`, `is_employeer`, `email`, `mobile`, `address`, `website`, `company_type`, `created_at`, `updated_at`, `password`) VALUES
(1, 'BANB', 0, 'picecyn@mailinator.com', 'Qui necessitatibus p', 'Veritatis et aliquam', 'https://www.hujibabeb.com.au', 'Officia nulla rerum', '2023-01-02 12:09:21', '2023-01-02 12:09:21', '$2y$10$nk7LHCC15I7wIApem0uKieipXp.p14bw242XrmlWiac6m8.hVFH0u'),
(2, 'Ivor Mclean', 0, 'cywe@mailinator.com', 'Officia suscipit har', 'Dolore tempora quibu', 'https://www.walanawucibof.com.au', 'Reiciendis sit corpo', '2023-01-02 12:16:22', '2023-01-02 12:16:22', '$2y$10$g7ZUB/2rnnYGDffeeS7d2uk4pv1gJIYWG5oEtv.T8GMLz3NtjK6oi'),
(3, 'BANBEIS', 0, 'info@banbeis.gov.bd', '01936583856', 'BANBEIS, 1 zahir raihan road, palashi-nilkhet', 'www.banbeis.gov.bd', 'Test', '2023-01-04 10:30:46', '2023-01-04 10:30:46', '$2y$10$FkAiQpEAR/Uw2sW/mMwY8eriDlMfktjws0rUfapEAIofemxb9.Zj.'),
(4, 'BANBEIS', 0, 'banbeis@gmail.com', '01919191919', 'test', 'banbeis.gov.bd', 'test', '2023-01-04 23:44:36', '2023-01-04 23:44:36', '$2y$10$gfWkaBbazFRtMSL2ypCNUe9nJQ.nl6IU77SA6kcE8N29bcYYcC5ka');

-- --------------------------------------------------------

--
-- Table structure for table `general_info`
--

CREATE TABLE `general_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fathers_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mothers_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'male',
  `dob` date NOT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_reg_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid_or_birth_reg_num` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_contact_num_whatsapp` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `care_of` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `village` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upazila` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_office` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_care_of` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_village` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_upazila` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_post_office` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_post_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_pa_ma` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `student_id_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_info`
--

INSERT INTO `general_info` (`id`, `user_id`, `name`, `fathers_name`, `mothers_name`, `gender`, `dob`, `nid`, `birth_reg_num`, `nid_or_birth_reg_num`, `email`, `contact_num`, `is_contact_num_whatsapp`, `care_of`, `village`, `district`, `upazila`, `post_office`, `post_code`, `ma_care_of`, `ma_village`, `ma_district`, `ma_upazila`, `ma_post_office`, `ma_post_code`, `is_pa_ma`, `student_id_path`, `created_at`, `updated_at`) VALUES
(2, 9, 'September Simmons', 'Kaseem Cochran', 'Brooke Klein', 'female', '1974-11-29', '671', 'Vitae corporis cumqu', '1', 'nejocit@mailinator.com', '2981', '1', 'Tempor sequi repudia', 'Qui ullamco reprehen', 'Quia ut voluptate si', 'Anim numquam et quo', 'Excepteur ut et porr', 'Ea placeat voluptat', 'Quia itaque impedit', 'Odio in officia magn', 'Aut laborum impedit', 'Et dolore quaerat ci', 'Enim veritatis conse', 'Enim non debitis vol', '1', '9_student_id.pdf', '2023-01-08 00:58:45', '2023-01-08 03:57:02');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employeer_id` int(11) NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requirements` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vacancy` int(11) NOT NULL,
  `deadline` date NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsibilities` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `education` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `benifits` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apply_instruction` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_requirements` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_context` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `created_at`, `updated_at`, `title`, `employeer_id`, `location`, `requirements`, `salary`, `vacancy`, `deadline`, `gender`, `age`, `employment_type`, `responsibilities`, `experience`, `education`, `benifits`, `apply_instruction`, `category`, `address`, `additional_requirements`, `keywords`, `job_context`) VALUES
(8, '2023-01-05 03:08:21', '2023-01-05 03:08:21', 'ENumerator for ENglish medium school', 4, 'Dhaka', 'bla bla', 'As per gov rules', 20, '2023-01-31', 'Both Male and Female', '18-30', 'Contractual', 'bla bla', 'blank', 'bla bla', 'will give certificate', 'bla bla', 'test', 'blank', 'should have a smart phone', NULL, 'bla bla'),
(9, '2023-01-07 22:36:00', '2023-01-07 22:36:00', 'Nemo lorem blanditii', 4, 'Gazipur', 'Id sed molestiae ut', 'Vero asperiores reic', 10, '2007-12-06', 'Both Male and Female', 'Repellendus Nostrum', 'Full-time', 'Eos ut et labore ut', 'blank', 'Necessitatibus in ut', 'Temporibus sed est', 'Et nulla cupidatat a', 'Data Entry Operator', 'blank', 'Id id praesentium ex', '', '');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_02_22_130833_create_jobs_table', 1),
(4, '2020_02_26_023002_add_some_fields_to_jobs_table', 1),
(5, '2020_02_26_040100_rename_and_add_field_to_jobs_table', 1),
(6, '2020_02_26_050831_rename_and_drop_field_to_jobs_table', 1),
(7, '2020_02_26_051443_drop_field_to_jobs_table', 1),
(8, '2020_02_26_052100_change_type_and_drop_field_to_jobs_table', 1),
(9, '2020_02_29_170116_create_categories_table', 1),
(10, '2020_02_29_192132_create_education_table', 1),
(11, '2020_03_01_064543_drop_category_id_and_location_id_field_from_jobs_table', 1),
(12, '2020_03_01_081528_add_keyword_and_jobcontext_fieldz_to_jobs_table', 1),
(13, '2020_03_02_083205_add_is_user_field_to_users_table', 1),
(14, '2020_03_02_083931_create_employeers_table', 1),
(15, '2020_03_02_084924_add_password_field_to_employeers_table', 1),
(16, '2020_03_04_095413_add_is_users_field_to_users_table', 1),
(17, '2020_03_04_192211_create_applications_table', 1),
(18, '2020_03_08_090444_create_saved_jobs_table', 1),
(19, '2020_03_09_181241_create_personalinfos_table', 1),
(20, '2014_10_12_000000_create_settings_table', 2),
(21, '2023_01_04_111702_create_general_info_table', 3);

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
-- Table structure for table `personalinfos`
--

CREATE TABLE `personalinfos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personalinfos`
--

INSERT INTO `personalinfos` (`id`, `user_id`, `full_name`, `photo`, `linkedin`, `github`, `website`, `facebook`, `mobile`, `father`, `mother`, `gender`, `religion`, `birthdate`, `nid`, `permanent_address`, `present_address`, `created_at`, `updated_at`) VALUES
(1, 1, 'Clinton Barrett', '/profile_photos/1672683195.jpg', 'Recusandae Quis inv', 'At eum itaque vel mi', 'https://www.mizihyfev.org.au', 'Ea adipisci iure vol', 'Tempore sit facere', 'Explicabo Voluptate', 'Est dolor consectetu', 'Male', 'Barisal', '1986-08-04', 'Laboriosam eos offi', 'Dolores rerum debiti', 'Veritatis rem volupt', '2023-01-02 12:13:16', '2023-01-02 12:13:16');

-- --------------------------------------------------------

--
-- Table structure for table `saved_jobs`
--

CREATE TABLE `saved_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `employeer_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `welcome` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_hdr1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_hdr2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_hdr1_mbl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_hdr2_mbl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_ftr1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_ftr2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_ftr1_mbl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_ftr2_mbl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_driver` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_host` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_port` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_address` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_encryption` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_driver` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_host` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_port` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_encryption` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_mbl` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` enum('id','en') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_user` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_user`) VALUES
(1, 'Blaze Walton', 'fyrox@mailinator.com', NULL, '$2y$10$ljuoMlX5ebKK.jCESYu3YOoE3HoFG3hxYcqoYVzBm6F1/EN0hw8yC', NULL, '2023-01-02 12:11:20', '2023-01-02 12:11:20', 0),
(2, 'Glenna Weiss', 'dif@mailinator.com', NULL, '$2y$10$FkAiQpEAR/Uw2sW/mMwY8eriDlMfktjws0rUfapEAIofemxb9.Zj.', NULL, '2023-01-02 12:26:31', '2023-01-02 12:26:31', 0),
(3, 'Arden Mcconnell', 'seka@mailinator.com', NULL, '$2y$10$gfWkaBbazFRtMSL2ypCNUe9nJQ.nl6IU77SA6kcE8N29bcYYcC5ka', NULL, '2023-01-04 11:31:58', '2023-01-04 11:31:58', 0),
(4, 'Wyoming Mccullough', 'bogumiq@mailinator.com', NULL, '$2y$10$6eULFOGNqOKro.bKyJ2ygOsIU9bqMZ1qR2WbnMY44pAAv4u1dHPKS', NULL, '2023-01-04 11:49:43', '2023-01-04 11:49:43', 0),
(5, 'test', 'test@gmail.com', NULL, '$2y$10$.nmTzjkgrkY9OUK9OgOuRe97k6C4yt1oz9GKRDaGqODUqgveFlXTa', NULL, '2023-01-05 02:26:41', '2023-01-05 02:26:41', 0),
(6, 'test', 'test@gmail.com', NULL, '$2y$10$J069JVArKZWDuGh1Q6ApIONxltAWwYl.eDVaYBuohfWyngM4.cxbe', NULL, '2023-01-05 02:30:03', '2023-01-05 02:30:03', 0),
(7, 'Jenette Love', 'tumope@mailinator.com', NULL, '$2y$10$RF08j0e4c99HTOIXioHq..Rzx9z2u1GRO1K4HifNKgvljqgBiRkhW', NULL, '2023-01-05 02:41:32', '2023-01-05 02:41:32', 0),
(8, 'শাহনাজ দেওয়ান', 'enamuitrce@gmail.com', NULL, '$2y$10$m9gMzzno0SEak8MzTN/YdeQtpqtXiRCFi7m3wBjGeyZ4odqLp2DqC', NULL, '2023-01-05 02:58:14', '2023-01-05 02:58:14', 0),
(9, 'Rashidul Imam', 'rashid@gmail.com', NULL, '$2y$10$PceRMGPeFktGkI5iwG8A2eZy4yVqiw8x4bvmDm/KQOynFfB/48uIq', NULL, '2023-01-05 03:10:19', '2023-01-05 03:10:19', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employeers`
--
ALTER TABLE `employeers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_info`
--
ALTER TABLE `general_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personalinfos`
--
ALTER TABLE `personalinfos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saved_jobs`
--
ALTER TABLE `saved_jobs`
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
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employeers`
--
ALTER TABLE `employeers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `general_info`
--
ALTER TABLE `general_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personalinfos`
--
ALTER TABLE `personalinfos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `saved_jobs`
--
ALTER TABLE `saved_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
