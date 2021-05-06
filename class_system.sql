-- phpMyAdmin SQL Dump
-- version 4.9.7deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 06, 2021 at 01:58 PM
-- Server version: 8.0.23-0ubuntu0.20.10.1
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `class_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 2, 'Admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `answer_task`
--

CREATE TABLE `answer_task` (
  `id` bigint UNSIGNED NOT NULL,
  `tugas_id` bigint NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answer_task`
--

INSERT INTO `answer_task` (`id`, `tugas_id`, `nama`, `file`, `created_at`, `updated_at`) VALUES
(1, 1, 'kaneki', '1620264188_WhatsApp Image 2021-01-15 at 10.15.33 PM.jpeg', '2021-05-05 18:23:08', '2021-05-05 18:23:08'),
(2, 1, 'gintama', '1620270723_tensura.jpg', '2021-05-05 20:12:03', '2021-05-05 20:12:03'),
(3, 3, 'gintama', '1620270732_WhatsApp Image 2021-01-15 at 10.15.33 PM.jpeg', '2021-05-05 20:12:12', '2021-05-05 20:12:12');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` bigint UNSIGNED NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_student` int NOT NULL,
  `course_class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `kelas`, `max_student`, `course_class`, `created_at`, `updated_at`) VALUES
(1, 'XRPL1', 20, '1,2,5,6', NULL, NULL),
(2, 'XRPL2', 20, '3,4', NULL, NULL),
(3, 'XTKJ1', 20, '1,2,3', NULL, NULL),
(4, 'XTKJ2', 20, '1,2,3,4', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Math', NULL, NULL),
(2, 'Pyhsics', NULL, NULL),
(3, 'Geoghraphy', NULL, NULL),
(4, 'History', NULL, NULL),
(5, 'Chemistry', NULL, NULL),
(6, 'Art', NULL, NULL),
(7, 'Indonesia Language', NULL, NULL),
(8, 'Japan Language', NULL, NULL),
(9, 'Sport', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_05_04_213539_create_student_table', 1),
(5, '2021_05_04_213549_create_teacher_table', 1),
(6, '2021_05_04_213556_create_class_table', 1),
(7, '2021_05_05_023914_create_course_table', 2),
(8, '2021_05_05_082642_create_task_table', 3),
(9, '2021_05_05_090920_create_admin_table', 4),
(10, '2021_05_06_001648_create_answer_task_table', 5);

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
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `user_id`, `nama`, `kelas`, `created_at`, `updated_at`) VALUES
(1, 5, 'kaneki ken', 1, NULL, NULL),
(2, 6, 'Gintama waa', 1, NULL, NULL),
(3, 7, 'Todoroki Shoto', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` int NOT NULL,
  `for_class` int NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `judul`, `course`, `for_class`, `file`, `deadline`, `created_at`, `updated_at`) VALUES
(1, 'ABC', 1, 1, '', '2021-05-13', NULL, NULL),
(2, 'def', 1, 2, '', '2021-05-13', NULL, NULL),
(3, 'GHU', 1, 1, '', '2021-05-21', NULL, NULL),
(4, 'gte', 2, 1, '1620259225_v.png', '2021-05-27', '2021-05-05 17:00:25', '2021-05-05 17:00:25'),
(5, 'Geog1', 3, 2, '1620259929_PKN_Apr_19.pdf', '2021-05-28', '2021-05-05 17:12:09', '2021-05-05 17:12:09'),
(6, 'Baru', 1, 1, '1620261250_shumatsu no valkyrie.pdf', '2021-05-28', '2021-05-05 17:34:10', '2021-05-05 17:34:10'),
(7, 'xxx', 1, 1, '1620278471_IMG-20210421-WA0062.jpg', '2021-05-20', '2021-05-05 22:21:11', '2021-05-05 22:21:11');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialist` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teach` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NIP` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `user_id`, `nama`, `umur`, `specialist`, `teach`, `NIP`, `tanggal_lahir`, `tempat_lahir`, `pendidikan`, `img`, `created_at`, `updated_at`) VALUES
(1, 3, 'rimuru sama', '18', '1,2,3', '1,2', '1234567890123456', NULL, NULL, NULL, '-', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `role` bigint NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, 'c3LsR0WzCO', 'hdNxOB1NgL@gmail.com', NULL, '$2y$10$PsRG52tSybDGEbW4s8kSlen7IP5BMp8CoKRGPg13vvI9VZ5I/MvVO', NULL, NULL, NULL),
(2, 2, 'admin', 'admin@gmail.com', NULL, '$2y$10$Mt5OIF94JsxAxQ2u6sx9VOlT8XxCamuRaxtWHHd8ZwOjEY2Csm32e', NULL, '2021-05-04 16:31:26', '2021-05-04 16:31:26'),
(3, 1, 'rimuru', 'rimuru@gmail.com', NULL, '$2y$10$wNVUiHASvpEu6XUTl7PRjeGZLO3puhxvASYMF7c1ERa08r1bt0V3q', NULL, '2021-05-04 16:51:25', '2021-05-04 16:51:25'),
(5, 0, 'kaneki', 'kaneki@gmail.com', NULL, '$2y$10$K1GnXqAMa7RgfJ2zeyfBhOfTnsM6hVuh6XnlidgW/vCswDRvFo9S2', NULL, '2021-05-04 17:05:47', '2021-05-04 17:05:47'),
(6, 0, 'gintama', 'gintama@gmail.com', NULL, '$2y$10$sGMLZwD83rDF.qrY7T3ZbOi5VqR.67stAvLXLkejJXCgN2H5pEU0G', NULL, '2021-05-04 17:19:22', '2021-05-04 17:19:22'),
(7, 0, 'todoroki', 'todoroki@gmail.com', NULL, '$2y$10$juIaHQOGEkxBGzvEjljFVOvB3LOJFV7KZuaUf.g8q3Ualbf7tnxlu', NULL, '2021-05-05 02:04:59', '2021-05-05 02:04:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answer_task`
--
ALTER TABLE `answer_task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `answer_task`
--
ALTER TABLE `answer_task`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
