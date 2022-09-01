-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2022 at 08:50 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test-k-24`
--

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
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lahir` date NOT NULL,
  `kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ktp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `users_id`, `hp`, `lahir`, `kelamin`, `ktp`, `photo`, `created_at`, `updated_at`) VALUES
(1, 3, '085272559098', '2022-08-30', 'P', '1371082607940001', 'public/members/Dede Aftafiandi.jpg', NULL, '2022-09-01 10:27:08'),
(4, 77, '025878559098', '2022-09-04', 'P', '1371020604090001', 'public/members/Dede.jpg', '2022-09-01 11:45:18', '2022-09-01 11:45:18');

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
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2022_08_30_140739_create_members_table', 2),
(10, '2022_08_31_034256_add_access_table_users', 3);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `access` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `status`, `access`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Dede Aftafiandi', 'apaa53601@gmail.com', NULL, '$2y$10$7osoGFQtWHGdSbvcxY.v2.m1QPXc5OwtAWEGcpTFWCFz7xvF/pRVO', 1, 'admin', NULL, '2022-08-30 07:38:43', '2022-09-01 08:38:05'),
(4, 'Dede Rand1', 'dede1@test.com', NULL, '$2y$10$Nr8.hW/iKPqk3lQH8OlI8OQtzhONPUaFLRD6hXMymH8l01CAwi.4i', 1, 'user', NULL, '2022-08-31 20:05:08', '2022-08-31 20:05:08'),
(5, 'Dede Rand2', 'dede2@test.com', NULL, '$2y$10$KWY60or/jfkx6bDLpfFaUOF9uoeZdNC5s3Y681TjAgrEo/FHW9Jri', 1, 'user', NULL, '2022-08-31 20:05:08', '2022-08-31 20:05:08'),
(6, 'Dede Rand3', 'dede3@test.com', NULL, '$2y$10$E9AZuN8YR2r8/Xx4C0jgE.ofi8lK69garToBILwUC2db6gft.7NJu', 1, 'user', NULL, '2022-08-31 20:05:08', '2022-08-31 20:05:08'),
(7, 'Dede Rand4', 'dede4@test.com', NULL, '$2y$10$b624FYkol6xzjPwuOJsgAun4nur.yh9Va9rqEna8oqzQ5KXBdwoti', 1, 'user', NULL, '2022-08-31 20:05:08', '2022-08-31 20:05:08'),
(8, 'Dede Rand5', 'dede5@test.com', NULL, '$2y$10$w.eiOPU6Pwj9CGY8DL8.qelV5YDDFPqSmTL0vKKalqm8gBkO16wX6', 1, 'user', NULL, '2022-08-31 20:05:08', '2022-08-31 20:05:08'),
(9, 'Dede Rand6', 'dede6@test.com', NULL, '$2y$10$K79SlrDXmEZYxFDc2O.92eXwGFtcIcZmbQHyVG8ezcrrTvJECuBBe', 1, 'user', NULL, '2022-08-31 20:05:08', '2022-08-31 20:05:08'),
(10, 'Dede Rand7', 'dede7@test.com', NULL, '$2y$10$CpOsQtnb1qL7Ug/UCZgkHOWMybEs13crNe1jq4IUACYHFy1ZfC.cq', 1, 'user', NULL, '2022-08-31 20:05:08', '2022-08-31 20:05:08'),
(12, 'Dede Rand9', 'dede9@test.com', NULL, '$2y$10$OJApfHUa6Q.bae7dC09pVuINcrEhhk8q.JlWjNi3AIMh7vj2pbAV2', 1, 'user', NULL, '2022-08-31 20:05:08', '2022-08-31 20:05:08'),
(13, 'Dede Rand10', 'dede10@test.com', NULL, '$2y$10$Ljkc0XCQHYxq8aRTEjbKuO2t8eGbhmCrTRiMtMaaW0ZUS4hLPX.tK', 1, 'user', NULL, '2022-08-31 20:05:08', '2022-08-31 20:05:08'),
(14, 'Dede Rand11', 'dede11@test.com', NULL, '$2y$10$E3jcOtT7SovGAftRcXxqcuDluKRQNlBbDnT8GHRrWKy34DxqfN8NC', 1, 'user', NULL, '2022-08-31 20:05:08', '2022-08-31 20:05:08'),
(15, 'Dede Rand12', 'dede12@test.com', NULL, '$2y$10$LLWMib6nVoP0vuoOMKoQruhHUrJP3SlA/oVJaHjuH8.4rJYgLm7Im', 1, 'user', NULL, '2022-08-31 20:05:08', '2022-08-31 20:05:08'),
(16, 'Dede Rand13', 'dede13@test.com', NULL, '$2y$10$tsrF.SrQurUWbNqgZ1t3jub4P74AZi3jmvOJpZIvefLhk9jS6vnvy', 1, 'user', NULL, '2022-08-31 20:05:08', '2022-08-31 20:05:08'),
(17, 'Dede Rand14', 'dede14@test.com', NULL, '$2y$10$u557F8jPunUpo9piU3In5OvcVYFeOWXmQ2Eioji2M287QrVeDINzW', 1, 'user', NULL, '2022-08-31 20:05:08', '2022-08-31 20:05:08'),
(18, 'Dede Rand15', 'dede15@test.com', NULL, '$2y$10$6bL7KL6wYJ9V3X90wROlMud1wDzvucGzv/YJRTkoiWIhlCMvVYnPi', 1, 'user', NULL, '2022-08-31 20:05:09', '2022-08-31 20:05:09'),
(19, 'Dede Rand16', 'dede16@test.com', NULL, '$2y$10$lrWQrx62rbD.E/JxdHlpnuU3R0qYswH3WbFCuH3CrhZmWqACEAQq.', 1, 'user', NULL, '2022-08-31 20:05:09', '2022-08-31 20:05:09'),
(20, 'Dede Rand17', 'dede17@test.com', NULL, '$2y$10$WfSJbe6peHGSyfJ1J4aSA.dUJnJOy3k1wAkhlRclUIy0MnQ1BD/v.', 1, 'user', NULL, '2022-08-31 20:05:09', '2022-08-31 20:05:09'),
(21, 'Dede Rand18', 'dede18@test.com', NULL, '$2y$10$/aW0wSpiuJSZhBBT0B5xKeB6oJvfChQOC/3syZeJiI2BEW/OJcQGa', 1, 'user', NULL, '2022-08-31 20:05:09', '2022-08-31 20:05:09'),
(22, 'Dede Rand19', 'dede19@test.com', NULL, '$2y$10$TvWyWBAIcpZq1DNkI17lzO0fJBqdnE/5B4bTMipC1qLkc8c9.YDbe', 1, 'user', NULL, '2022-08-31 20:05:09', '2022-08-31 20:05:09'),
(23, 'Dede Rand20', 'dede20@test.com', NULL, '$2y$10$CU14e5JXGXJtKGBhKQ31lOlaKF0ElE7Mwc6HMHdBr810nStrCI656', 1, 'user', NULL, '2022-08-31 20:05:09', '2022-08-31 20:05:09'),
(24, 'Dede Rand21', 'dede21@test.com', NULL, '$2y$10$t9E54FPSWsCSUHEz1S.H4OoliYQ2o9q1uFCrBIFVou2ZEXCgHpVeu', 1, 'user', NULL, '2022-08-31 20:05:09', '2022-08-31 20:05:09'),
(25, 'Dede Rand22', 'dede22@test.com', NULL, '$2y$10$Yw9s///qQM6LIzuQa8Z7OO7YZx1jqsjfaiMkF1DOW7uTZpYOnb3Ae', 1, 'user', NULL, '2022-08-31 20:05:09', '2022-08-31 20:05:09'),
(26, 'Dede Rand23', 'dede23@test.com', NULL, '$2y$10$AWWaAloX2AeQvLdFALhlEOcp0hdudh3rdUldcIcpojsmUEDBlWxqa', 1, 'user', NULL, '2022-08-31 20:05:09', '2022-08-31 20:05:09'),
(27, 'Dede Rand24', 'dede24@test.com', NULL, '$2y$10$1Ozd0geku5hrNdXJF.hl9eLNtGeO4wZT7je.Wt8VfSXIJd7cFnjjq', 1, 'user', NULL, '2022-08-31 20:05:09', '2022-08-31 20:05:09'),
(28, 'Dede Rand25', 'dede25@test.com', NULL, '$2y$10$w45BEeRm/wfj7JcSyUqEXOFXscriVI6LRXu8EFHXLIA.xEwSx9RLC', 1, 'user', NULL, '2022-08-31 20:05:09', '2022-08-31 20:05:09'),
(29, 'Dede Rand26', 'dede26@test.com', NULL, '$2y$10$PY4cPfVilh4FpukENZ5g9.G/1pd/e4dnEYQO8nbBEVbzhgfz0ipB2', 1, 'user', NULL, '2022-08-31 20:05:09', '2022-08-31 20:05:09'),
(30, 'Dede Rand27', 'dede27@test.com', NULL, '$2y$10$zJ568utSqBUWccE8u4/T4ev.IdR2/dIvtcjgk9Xegw6bIv5xNBzWO', 1, 'user', NULL, '2022-08-31 20:05:09', '2022-08-31 20:05:09'),
(31, 'Dede Rand28', 'dede28@test.com', NULL, '$2y$10$qXmbAsSbbnnaGWWfslJfdOBgJuYXrgYqfQx4ECW22x8Gm9Zf5O.Q.', 1, 'user', NULL, '2022-08-31 20:05:09', '2022-08-31 20:05:09'),
(32, 'Dede Rand29', 'dede29@test.com', NULL, '$2y$10$A4ifkGPVYO7dRh5g2/kPaO9jJkkvZSUN.GXYRfLbFYe05lhob/KZ6', 1, 'user', NULL, '2022-08-31 20:05:09', '2022-08-31 20:05:09'),
(33, 'Dede Rand30', 'dede30@test.com', NULL, '$2y$10$Ro8raDLOS0IxVmQuKV5vteIpioppYWXjriDDYhRUtQ2zzOHLuUXJS', 1, 'user', NULL, '2022-08-31 20:05:09', '2022-08-31 20:05:09'),
(34, 'Dede Rand31', 'dede31@test.com', NULL, '$2y$10$EalfItVG5SP7M7aGYWOYreH6wLRsXX8V.6VGO8Vy/5FqPrV0BNhxu', 1, 'user', NULL, '2022-08-31 20:05:09', '2022-08-31 20:05:09'),
(35, 'Dede Rand32', 'dede32@test.com', NULL, '$2y$10$V4ANaSgwRuprXeyPeL9/KeamDO.PB7hyrAAoaRRsZ2b8Hz7YphDjK', 1, 'user', NULL, '2022-08-31 20:05:09', '2022-08-31 20:05:09'),
(36, 'Dede Rand33', 'dede33@test.com', NULL, '$2y$10$eaYNs.DrKMrpCb4DF0fw0O.mVtLrwUGg4OxCWcr9kH6SuPiDEdsgK', 1, 'user', NULL, '2022-08-31 20:05:10', '2022-08-31 20:05:10'),
(37, 'Dede Rand34', 'dede34@test.com', NULL, '$2y$10$AvO5uGbxE3h2rU1xnL5hsO79J8cNq5U3uDzd1ncKdsiA3boKQj76C', 1, 'user', NULL, '2022-08-31 20:05:10', '2022-08-31 20:05:10'),
(38, 'Dede Rand35', 'dede35@test.com', NULL, '$2y$10$LgOXfVqktBnLm1RrYrPR.uDtbWfpdPlzVeK5VpmIzN..ac1N9OmpS', 1, 'user', NULL, '2022-08-31 20:05:10', '2022-08-31 20:05:10'),
(39, 'Dede Rand36', 'dede36@test.com', NULL, '$2y$10$bLoDFWzp81PlhCHLFNwTdO0/fx7BpAHNn5gsM7YyA4T/IJNlIX.sm', 1, 'user', NULL, '2022-08-31 20:05:10', '2022-08-31 20:05:10'),
(40, 'Dede Rand37', 'dede37@test.com', NULL, '$2y$10$/53FvZi6xmCibviV.aAAe.YiGNiGCv5lYF.K.vMaJJSomPjzIbJtO', 1, 'user', NULL, '2022-08-31 20:05:10', '2022-08-31 20:05:10'),
(41, 'Dede Rand38', 'dede38@test.com', NULL, '$2y$10$HN9OTRv4cqwtp8oZd0fRgu4MEihJXIapMvBZkokkC37R.TDYo56GO', 1, 'user', NULL, '2022-08-31 20:05:10', '2022-08-31 20:05:10'),
(42, 'Dede Rand39', 'dede39@test.com', NULL, '$2y$10$d7g.amdV7FS0NSDUEzMJ/.g9bjiJdbVQKjw/C.POysHsH2lLeelGm', 1, 'user', NULL, '2022-08-31 20:05:10', '2022-08-31 20:05:10'),
(43, 'Dede Rand40', 'dede40@test.com', NULL, '$2y$10$UFXKzhxspYnDWV3NjMOBsu9Of/danG63lXkB/m8surk1W/PjEHkgm', 1, 'user', NULL, '2022-08-31 20:05:10', '2022-08-31 20:05:10'),
(44, 'Dede Rand41', 'dede41@test.com', NULL, '$2y$10$p5iEeH8pXb5ctpLb1cPVpesyKmPFZX4EqgH9r4debds1eYOuObdFi', 1, 'user', NULL, '2022-08-31 20:05:10', '2022-08-31 20:05:10'),
(45, 'Dede Rand42', 'dede42@test.com', NULL, '$2y$10$RqX71WgUAy93EsdqeKt8YebHe90Mb4CA9I7eDUcDY1RjqebiLxJz6', 1, 'user', NULL, '2022-08-31 20:05:10', '2022-08-31 20:05:10'),
(46, 'Dede Rand43', 'dede43@test.com', NULL, '$2y$10$FRQH4bzo7Ti9tMIQKbob8./MLmL33nfdQjWSLg1tOO7tA6N9jWPx6', 1, 'user', NULL, '2022-08-31 20:05:10', '2022-08-31 20:05:10'),
(47, 'Dede Rand44', 'dede44@test.com', NULL, '$2y$10$YAV85ZyRwV2LzMOfHVRqT.0DyT2WOlHUVe7voZAFnBpRsZUinZPoq', 1, 'user', NULL, '2022-08-31 20:05:10', '2022-08-31 20:05:10'),
(48, 'Dede Rand45', 'dede45@test.com', NULL, '$2y$10$FxPHOjGYrox01u/0t8XKyON8sa7FC9esMYRPBjgt9IomtvEIr6LWm', 1, 'user', NULL, '2022-08-31 20:05:10', '2022-08-31 20:05:10'),
(49, 'Dede Rand46', 'dede46@test.com', NULL, '$2y$10$uXtvx1UFfnR47PwAy2IcfuRHsHnig2akcwFfn9sJaKWS2reae3sLC', 1, 'user', NULL, '2022-08-31 20:05:10', '2022-08-31 20:05:10'),
(50, 'Dede Rand47', 'dede47@test.com', NULL, '$2y$10$IlUhDMVO5cc8t9/1nDhyUudSVhwg2pdr4BMBwcfendvdJHNCLlgcq', 1, 'user', NULL, '2022-08-31 20:05:10', '2022-08-31 20:05:10'),
(51, 'Dede Rand48', 'dede48@test.com', NULL, '$2y$10$oJYiNZDH5GOsRyDoKc3.y.acXO9vPM7yt4vufojmbyrso06hbWBIi', 1, 'user', NULL, '2022-08-31 20:05:10', '2022-08-31 20:05:10'),
(52, 'Dede Rand49', 'dede49@test.com', NULL, '$2y$10$4G/YBCpJTytzZ7VuLAWk9uFoHm9J/UxmgSH03LHOQYpCok6758wgO', 1, 'user', NULL, '2022-08-31 20:05:10', '2022-08-31 20:05:10'),
(53, 'Dede Rand50', 'dede50@test.com', NULL, '$2y$10$GFwTbwE8AJbuRTpeTrZ.duSmRQSrrrEpIorkQCDI5SQOmT/0iJj.i', 1, 'user', NULL, '2022-08-31 20:05:10', '2022-08-31 20:05:10'),
(54, 'Dede Rand51', 'dede51@test.com', NULL, '$2y$10$8NAa7FHuSlM2GOFxu1s.uuC0Yt9wMHwp5RMuJMVmdEL9phAWwl4qm', 1, 'user', NULL, '2022-08-31 20:05:11', '2022-08-31 20:05:11'),
(55, 'Dede Rand52', 'dede52@test.com', NULL, '$2y$10$AMv7jxv8CjN82o4.YUxG7e8gab8MVOr.8tTDwjt1cIRTyINbXNwDa', 1, 'user', NULL, '2022-08-31 20:05:11', '2022-08-31 20:05:11'),
(56, 'Dede Rand53', 'dede53@test.com', NULL, '$2y$10$F8LTswhNrqRKszHqVfGjL.9DbQe9rRKmSuI3shq/1SvvcqMejROM6', 1, 'user', NULL, '2022-08-31 20:05:11', '2022-08-31 20:05:11'),
(57, 'Dede Rand54', 'dede54@test.com', NULL, '$2y$10$uFDK/jrCoL8DmiImELpK3.1JuMFdzXiqa5GJGrEpmNmeCNbPGgw1a', 1, 'user', NULL, '2022-08-31 20:05:11', '2022-08-31 20:05:11'),
(58, 'Dede Rand55', 'dede55@test.com', NULL, '$2y$10$DhYMYyVZSRQ8r7yvTE72pePCUSjE3D5/jN8O2kGNMFg0ljJPeyDBS', 1, 'user', NULL, '2022-08-31 20:05:11', '2022-08-31 20:05:11'),
(59, 'Dede Rand56', 'dede56@test.com', NULL, '$2y$10$eOTdApJ4ZimvaRAhAQ7dKOIk0frXIfwfzw8TvbO.MWVVxhYq83JzO', 1, 'user', NULL, '2022-08-31 20:05:11', '2022-08-31 20:05:11'),
(60, 'Dede Rand57', 'dede57@test.com', NULL, '$2y$10$RmLAbml7TEiZA4DsQgOSDOL24ZwhPI0IbWwT2eDv6Clzat65/3Ejy', 1, 'user', NULL, '2022-08-31 20:05:11', '2022-08-31 20:05:11'),
(61, 'Dede Rand58', 'dede58@test.com', NULL, '$2y$10$Cwtg7vAFyuLGJ5abS6YTHuIHr8SBzaz12X1ca9QsnWCzSeH4jOsRu', 1, 'user', NULL, '2022-08-31 20:05:11', '2022-08-31 20:05:11'),
(62, 'Dede Rand59', 'dede59@test.com', NULL, '$2y$10$cUS.Y1oN8Sn2cXnknOaF9Oq0ng5eAznTPXPPj4h7/64o4e1DORRcC', 1, 'user', NULL, '2022-08-31 20:05:11', '2022-08-31 20:05:11'),
(63, 'Dede Rand60', 'dede60@test.com', NULL, '$2y$10$5m6KCjVD9bIw85pAxup1t.mDqJPM72DBqfwYczutoMSfBq2GcJXGO', 1, 'user', NULL, '2022-08-31 20:05:11', '2022-08-31 20:05:11'),
(64, 'Dede Rand61', 'dede61@test.com', NULL, '$2y$10$Siiwu9Sn8UxkWkGzfkzPY.KX9pgHbmsvF/Txh/MwvCU7FiH5ZDWQy', 1, 'user', NULL, '2022-08-31 20:05:11', '2022-08-31 20:05:11'),
(65, 'Dede Rand62', 'dede62@test.com', NULL, '$2y$10$5DjHc6MimGxAasydvBgQW.aXoO4WgXX2uT0wBYt8eNGEjuMCgssla', 1, 'user', NULL, '2022-08-31 20:05:11', '2022-08-31 20:05:11'),
(66, 'Dede Rand63', 'dede63@test.com', NULL, '$2y$10$BBqq2Xqa7AuaPPeZcW/gUeMUAfDc2ip/Pqhp5bWcpdUrghJM7BQxW', 1, 'user', NULL, '2022-08-31 20:05:11', '2022-08-31 20:05:11'),
(67, 'Dede Rand64', 'dede64@test.com', NULL, '$2y$10$H1pd/33rc9vylR2LyV31CuOah7zEK.2zqVb0o/QrS6xKNxfTZz1P2', 1, 'user', NULL, '2022-08-31 20:05:11', '2022-08-31 20:05:11'),
(68, 'Dede Rand65', 'dede65@test.com', NULL, '$2y$10$yXQ8ImkHXN5XOdzevXXcdu2YkNCqWoo7WSGuFL5ScvGV.kk75Wu5y', 1, 'user', NULL, '2022-08-31 20:05:11', '2022-08-31 20:05:11'),
(69, 'Dede Rand66', 'dede66@test.com', NULL, '$2y$10$RuN96AbW2CxGtUnuxer3MOrxmspXA0yqe5vw/ev1UYJk.tJgBcJOC', 1, 'user', NULL, '2022-08-31 20:05:11', '2022-08-31 20:05:11'),
(70, 'Dede Rand67', 'dede67@test.com', NULL, '$2y$10$/WGXAnshL5vujhXDWs1RPeI0uguxc.jBSNDH01BtCN7Ot4dDxmiW.', 1, 'user', NULL, '2022-08-31 20:05:11', '2022-08-31 20:05:11'),
(71, 'Dede Rand68', 'dede68@test.com', NULL, '$2y$10$ZOyaQ8wDX8ySzvU/k2MzjexUmDDPmGzLxNndso9ii17Rl37eBH10G', 1, 'user', NULL, '2022-08-31 20:05:11', '2022-08-31 20:05:11'),
(72, 'Dede Rand69', 'dede69@test.com', NULL, '$2y$10$oJPN8jWpQ1vCBoMD/EKlS.9ac.lTUZcF7S1wgbNevVRTwHgu3pjlO', 1, 'user', NULL, '2022-08-31 20:05:12', '2022-08-31 20:05:12'),
(73, 'Dede Rand70', 'dede70@test.com', NULL, '$2y$10$Kin92UOQyo9aOwrJel456uHiGTgh.sTLOSyRzCgD2h2ix9S2//1yC', 1, 'user', NULL, '2022-08-31 20:05:12', '2022-08-31 20:05:12'),
(74, 'Aftafiandi', 'afta2@gmail.com', NULL, '$2y$10$OFh7fORyVnd1/jTHdb3km.4teRsICowfTBgZBS1Gp8scdxGAU.qZW', 1, 'member', NULL, '2022-09-01 00:52:37', '2022-09-01 00:52:37'),
(77, 'Dede', 'dede@test12.com', NULL, '$2y$10$4rs8bP6vTt32deW3tEU9A.VASQouaSN2mYsoXhEhfzd5oCaDhyB3e', 1, 'member', NULL, '2022-09-01 11:45:18', '2022-09-01 11:45:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `members_users_id_foreign` (`users_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
