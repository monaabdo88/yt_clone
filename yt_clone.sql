-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 06:11 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yt_clone`
--

-- --------------------------------------------------------

--
-- Table structure for table `channels`
--

CREATE TABLE `channels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'channel-default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `channels`
--

INSERT INTO `channels` (`id`, `user_id`, `name`, `slug`, `uid`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tech Tricks', 'tech-tricks', '1655e281781d5a', NULL, '1655e281781d5a.png', '2023-11-22 14:11:03', '2023-11-26 11:29:59'),
(2, 2, 'Samar Vlogs', 'samar-vlogs', '165636cdb71fac', 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.', '165636cdb71fac.png', '2023-11-26 14:05:47', '2023-11-27 11:40:02'),
(3, 3, 'Mimo Movies', 'mimo-movies', '165637ce82cba2', NULL, '165637ce82cba2.png', '2023-11-26 15:14:16', '2023-11-26 15:48:17');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `video_id` bigint(20) UNSIGNED NOT NULL,
  `reply_id` bigint(20) UNSIGNED DEFAULT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dis_likes`
--

CREATE TABLE `dis_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `video_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `video_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_10_13_154832_create_channels_table', 1),
(7, '2023_10_17_161449_create_videos_table', 1),
(8, '2023_10_21_131032_add_thumbnail_column_to_videos_table', 1),
(9, '2023_11_01_183345_create_jobs_table', 1),
(10, '2023_11_07_195729_create_likes_table', 1),
(11, '2023_11_07_195758_create_dis_likes_table', 1),
(12, '2023_11_10_075108_create_subscriptions_table', 1),
(13, '2023_11_10_182024_create_comments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `channel_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `channel_id`, `created_at`, `updated_at`) VALUES
(1, 3, 1, NULL, NULL),
(2, 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '‪Mona Abdo‬‏', 'monaabdo88@gmail.com', NULL, '$2y$10$KUsVzP4KrEmoBkF0eMFquekFgonOIM9JjATAe4XWkTac3EZhLr8o.', NULL, '2023-11-22 14:11:03', '2023-11-22 14:11:03'),
(2, 'Samar Hassan', 's_h1112011@yahoo.com', NULL, '$2y$10$jrpJF8NOgTIMm6RUhgpuB.GUW8/sHhKw1S5KhqVBPQpqYrTlgs4Ai', NULL, '2023-11-26 14:05:47', '2023-11-26 14:05:47'),
(3, 'Mahmoud', 'mimo_a_2005@yahoo.com', NULL, '$2y$10$AOEpEKN2O/f1oa2yok0oOu0EHgXazkx52QOFM.HwfuppAlk7ATvH2', NULL, '2023-11-26 15:14:16', '2023-11-26 15:14:16');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `channel_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `duration` varchar(255) DEFAULT NULL,
  `uid` varchar(255) NOT NULL,
  `thumbnail_image` varchar(255) DEFAULT NULL,
  `path` text DEFAULT NULL,
  `proccessed_file` varchar(255) DEFAULT NULL,
  `visibility` enum('private','public','unlisted') NOT NULL DEFAULT 'private',
  `processed` tinyint(1) NOT NULL DEFAULT 0,
  `allow_likes` tinyint(1) NOT NULL DEFAULT 0,
  `allow_comments` tinyint(1) NOT NULL DEFAULT 0,
  `processing_percentage` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `channel_id`, `title`, `description`, `views`, `duration`, `uid`, `thumbnail_image`, `path`, `proccessed_file`, `visibility`, `processed`, `allow_likes`, `allow_comments`, `processing_percentage`, `created_at`, `updated_at`) VALUES
(1, 1, ' 1-Laravel Complete Tutorial #001 - Laravel Course Overview eCommerce multi vendor project  كورس لارافل', 'Overview for the course and which tools will use', 0, '00:08:40', '16560d141bd92d', '16560d141bd92d.png', 'lflhEm3WE2quyoCZecs8fd0AamYbsRBzENJT1CBT.mp4', '16560d141bd92d.m3u8', 'public', 1, 0, 0, '100', '2023-11-24 14:37:21', '2023-11-24 17:50:46'),
(2, 1, ' 2-Laravel Complete Tutorial #002 -  What Is MVC ما هو', 'what is mvc pattern and how to use it', 0, '00:06:56', '165632cdb291d0', '165632cdb291d0.png', 'fGo2BzeCKy26aBEhZvoIh7UYyVAqSS4h5aFo1rGd.mp4', '165632cdb291d0.m3u8', 'public', 1, 0, 0, '100', '2023-11-26 09:32:43', '2023-11-26 10:07:04'),
(3, 1, ' 3-Laravel Complete Tutorial #003 -  Course and Development Prerequisite', 'Laravel Complete Tutorial #003 -  Course and Development Prerequisite', 1, '00:04:20', '165635fc0b4af1', '165635fc0b4af1.png', 'RPzu3JKGmIeqm3l2BRYuNmSbj0ocygWKOCAi8OBX.mp4', '165635fc0b4af1.m3u8', 'public', 1, 0, 0, '100', '2023-11-26 13:09:52', '2023-11-28 12:34:00'),
(4, 2, ' How To Manage your life', ' Simple Video to', 0, '00:08:58', '165636e05831af', '165636e05831af.png', 'Z8SzGHKoaghLshEvV6B5S1bu654kaXsar1gnvBpT.mp4', '165636e05831af.m3u8', 'private', 1, 0, 0, '100', '2023-11-26 14:10:45', '2023-11-26 14:44:05'),
(5, 2, ' ماذا لو صليت على سيدنا النبي 1000 مرة؟ لن تتخيل ما سيحدث لك', ' ماذا لو صليت على سيدنا النبي 1000 مرة؟ لن تتخيل ما سيحدث لك\n', 0, '00:03:08', '16563771ed2590', '16563771ed2590.png', 'FgmGyf05acD7x8zuQtskmU0EejOClAv2Rtfeul4c.mp4', '16563771ed2590.m3u8', 'public', 1, 0, 0, '100', '2023-11-26 14:49:34', '2023-11-26 14:55:17'),
(6, 2, ' حين التقيتُكَ عاد قلبي نابضاً بدون موسيقى - علاء ناجي', 'حين التقيتُكَ عاد قلبي نابضاً بدون موسيقى - علاء ناجي - @alaanajy90', 0, '00:01:28', '165637c2a9427d', '165637c2a9427d.png', '2GbUpl8PdkGe0SF0qkUC0SbngR1MD5XbDnma7hTv.mp4', '165637c2a9427d.m3u8', 'public', 1, 0, 0, '100', '2023-11-26 15:11:06', '2023-11-26 15:13:42'),
(7, 3, ' Soft Rain | Animated Short Film (2023)', ' An award-winning short film by Sacha Goedegebure and Omens Studios about a man suffering from depression who is caught in a sudden downpour of pink, fluffy balls. At a crowded bus stop, a cheerful looking woman offers him a spot under her umbrella, and together they enjoy the soft rain.\n', 0, '00:07:03', '165637db4625ac', '165637db4625ac.png', 'bBQ1zmTTAAwxeQdqz0ivxi6DsDEo8VZxoK97tcMj.mp4', '165637db4625ac.m3u8', 'public', 1, 0, 0, '100', '2023-11-26 15:17:40', '2023-11-26 15:26:39'),
(8, 3, ' Papá (2016)', ' BYU Center for Animation\'s 2016 Senior Animated Film capstone project.', 0, '00:06:10', '165637ffc4108a', '165637ffc4108a.png', 'crf9u4q2i3Hn8b02tVdz65CrWY8xoPqDv1Jn515X.mp4', '165637ffc4108a.m3u8', 'public', 1, 0, 0, '100', '2023-11-26 15:27:24', '2023-11-26 15:37:20'),
(9, 3, ' Salt (2020)', ' Brigham Young University Class of 2020 presents an all-new animated short! “Salt” tells the tale of a mother and daughter in Senegal, Africa, who harvest by day and play music at night. A beautiful story about family, culture, and finding joy in life.', 0, '00:06:37', '1656382a22f4d4', '1656382a22f4d4.png', 'r4n2xfrdxz2iUX5C4Hbketsfp3nHnaWTL2H6EwpS.mp4', '1656382a22f4d4.m3u8', 'public', 1, 0, 0, '100', '2023-11-26 15:38:42', '2023-11-26 15:45:42'),
(10, 1, ' 4-Laravel Complete Tutorial #004 -  Why Laravel MVC  Structure Overview لماذا لارافل الافضل', ' 4-Laravel Complete Tutorial #004 -  Why Laravel MVC  Structure Overview لماذا لارافل الافضل', 0, '00:10:00', '165638a32a0a42', '165638a32a0a42.png', 'eGxW6UuaTTAfgonPXJGDHtgaFZwJKCNWtSO903y6.mp4', '165638a32a0a42.m3u8', 'public', 1, 0, 0, '100', '2023-11-26 16:10:58', '2023-11-26 16:17:20'),
(11, 1, ' 5-Laravel Complete Tutorial #005 -  Why Laravel MVC  Structure Overview part 2 شرح مكونات لارافل', ' 5-Laravel Complete Tutorial #005 -  Why Laravel MVC  Structure Overview part 2 شرح مكونات لارافل', 0, '00:03:03', '165638c2f49558', '165638c2f49558.png', 'AE6t1PVtNYWD97iaBUwm3k2RUleVeyJgFS6a6aE4.mp4', '165638c2f49558.m3u8', 'public', 1, 0, 0, '100', '2023-11-26 16:19:27', '2023-11-26 16:21:51'),
(12, 2, ' عندك امنية مستحيلة 😫♥️!! وخاطرك تتحقق شاهد 😍✨', ' عندك امنية مستحيلة 😫♥️!! وخاطرك تتحقق شاهد 😍✨\n', 0, '00:03:47', '1656485083a7f3', '1656485083a7f3.png', 'uB21hYIJFLjUJTZm7EQmrk21jCszXTIglOArd6U3.mp4', '1656485083a7f3.m3u8', 'public', 1, 0, 0, '100', '2023-11-27 10:01:12', '2023-11-27 10:18:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `channels`
--
ALTER TABLE `channels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `channels_user_id_foreign` (`user_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dis_likes`
--
ALTER TABLE `dis_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `videos_channel_id_foreign` (`channel_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `channels`
--
ALTER TABLE `channels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dis_likes`
--
ALTER TABLE `dis_likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `channels`
--
ALTER TABLE `channels`
  ADD CONSTRAINT `channels_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
