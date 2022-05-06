-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th5 06, 2022 lúc 01:28 PM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hnclinic`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `schedule_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `appointment_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_id` int(11) NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `gender` int(11) NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symptoms` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `require_testing` int(11) NOT NULL,
  `QR_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`schedule_id`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `appointments`
--

INSERT INTO `appointments` (`schedule_id`, `appointment_code`, `email`, `patient_id`, `full_name`, `birth_date`, `gender`, `phone`, `doctor_id`, `department_id`, `date`, `time`, `status`, `symptoms`, `require_testing`, `QR_id`, `created_at`, `updated_at`) VALUES
(86, 'AP-1101', 'hieusnguyen0709@gmail.com', 2, 'KH Hiếu Rose', '1999-09-07', 0, '0365549764', 21, 0, '2022-04-29', '10:00 - 10:30', '0', 'Mụn', 0, 0, NULL, NULL),
(80, 'AP-968', '5', 22, '0', '2022-05-04', 1, '5', 19, 0, '2022-05-06', '15:00 - 15:30', '2', '5', 1, 0, NULL, NULL),
(64, 'AP-1504', '1234@gmail.com', 2, '0', '2022-05-05', 1, '123', 20, 0, '2022-04-29', '13:30 - 14:00', '3', '123', 0, 0, NULL, NULL),
(47, 'AP-1620', 'hieusnguyen0709@gmail.com', 2, '0', '1999-10-02', 0, '0365549764', 20, 0, '2022-04-29', '13:30 - 14:00', '1', 'Hello', 1, 0, NULL, NULL),
(76, 'AP-8588', '1', 2, '0', '2022-05-04', 1, '1', 20, 0, '2022-04-29', '08:00 - 08:30', '1', '1', 1, 0, NULL, NULL),
(78, 'AP-7510', 'hieusnguyen0709@gmail.com', 2, '0', '1999-09-07', 0, '0365549764', 21, 0, '2022-04-29', '10:00 - 10:30', '0', 'Demo', 0, 0, NULL, NULL),
(73, 'AP-5061', 'demo', 22, '0', '2022-05-04', 0, 'demo', 20, 0, '2022-04-29', '14:00 - 14:30', '2', 'demo', 0, 0, NULL, NULL),
(82, 'AP-1527', '123', 2, '0', '2022-05-19', 0, '123', 19, 0, '2022-05-04', '15:30 - 16:00', '1', '123', 0, 0, NULL, NULL),
(83, 'AP-5114', 'hieusnguyen0709@gmail.com', 2, '0', '1999-09-07', 0, '0365549764', 20, 0, '2022-04-29', '13:00 - 13:30', '2', '1', 1, 0, NULL, NULL),
(84, 'AP-2671', 'hieusnguyen0709@gmail.com', 2, '0', '1999-09-07', 0, '0365549764', 19, 0, '2022-05-05', '08:00 - 08:30', '2', '1', 1, 0, NULL, NULL),
(85, 'AP-6380', 'hieusnguyen0709@gmail.com', 2, '0', '1999-09-07', 0, '0365549764', 19, 0, '2022-05-04', '08:30 - 09:00', '2', 'Mụn', 1, 0, NULL, NULL),
(87, 'AP-9479', 'hieusnguyen0709@gmail.com', 2, '0', '1999-09-07', 0, '0365549764', 19, 0, '2022-05-05', '15:00 - 15:30', '2', 'Mụn', 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `case_histories`
--

DROP TABLE IF EXISTS `case_histories`;
CREATE TABLE IF NOT EXISTS `case_histories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `food_allergies` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bleed_tendency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heart_disease` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_pressure` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diabetic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surgery` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accident` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `family_medical_history` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_medication` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `female_pregnancy` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breast_feeding` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `health_insurance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `low_income` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `others` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dayoff_schedules`
--

DROP TABLE IF EXISTS `dayoff_schedules`;
CREATE TABLE IF NOT EXISTS `dayoff_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `department_user`
--

DROP TABLE IF EXISTS `department_user`;
CREATE TABLE IF NOT EXISTS `department_user` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `medicines`
--

DROP TABLE IF EXISTS `medicines`;
CREATE TABLE IF NOT EXISTS `medicines` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instruction` text COLLATE utf8mb4_unicode_ci,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `medicines`
--

INSERT INTO `medicines` (`id`, `name`, `instruction`, `unit`, `quantity`, `category`, `created_at`, `updated_at`) VALUES
(7, 'Demo', 'Bôi 2 lần/ngày', 'Ống', 2, 'Bôi', '2022-03-31 12:20:35', '2022-03-31 12:20:35'),
(2, 'Decumar', 'Bôi 1 ngày 2 lần, sáng và tối', 'Ống bôi', 1, 'Bôi', '2022-03-26 08:23:05', '2022-03-26 08:23:05'),
(6, 'Acnes Scar Care', 'Bôi 1 ngày 2 lần, sáng và tối', 'Ống bôi', 1, 'Bôi', '2022-03-27 05:07:07', '2022-03-27 05:07:07'),
(10, 'Thuốc trị mụn', 'Bôi 1 ngày 2 lần, sáng và tối', 'Ống bôi', 1, 'Bôi', '2022-03-31 13:59:23', '2022-03-31 13:59:23'),
(11, 'Thuốc', 'Bôi', 'Ống bôi', 1, 'Bôi', '2022-04-08 02:37:35', '2022-04-08 02:37:35'),
(12, 'Gel Boosting', 'Bôi 1 ngày 2 lần, sáng và tối', 'Tuýp', 10, 'Bôi', '2022-04-14 12:58:10', '2022-04-14 12:58:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `medicine_prescription`
--

DROP TABLE IF EXISTS `medicine_prescription`;
CREATE TABLE IF NOT EXISTS `medicine_prescription` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `prescription_id` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `instructions` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2019_11_05_153432_create_departments_table', 2),
(6, '2019_11_06_180428_create_time_schedules_table', 2),
(7, '2019_11_18_141722_create_appointments_table', 2),
(8, '2020_01_05_140821_create_case_histories_table', 2),
(9, '2020_01_06_135045_create_prescriptions_table', 2),
(10, '2020_01_06_151523_create_medicines_table', 2),
(11, '2020_01_07_161138_create_dayoff_schedules_table', 2),
(12, '2020_01_09_165150_create_medicine_prescription_table', 2),
(13, '2020_02_04_143422_create_medicine_categories_table', 2),
(14, '2020_02_13_193336_create_department_user_table', 2),
(15, '2022_03_31_130439_create_time_frame_table', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `prescriptions`
--

DROP TABLE IF EXISTS `prescriptions`;
CREATE TABLE IF NOT EXISTS `prescriptions` (
  `id_pres` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `appointment_id` int(11) DEFAULT NULL,
  `medicine_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `symptoms` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diagnosis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `advice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `pre_instruction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pre_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pres`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `prescriptions`
--

INSERT INTO `prescriptions` (`id_pres`, `appointment_id`, `medicine_id`, `doctor_id`, `patient_id`, `symptoms`, `diagnosis`, `advice`, `date`, `pre_instruction`, `pre_code`, `created_at`, `updated_at`) VALUES
(62, 0, 2, 21, 29, '1', '1', '1', '2022-05-03', '3', 'PR-625', '2022-05-03 14:38:40', '2022-05-03 14:38:40'),
(60, 0, 10, 21, 29, '1', '1', '1', '2022-05-03', '1', 'PR-625', '2022-05-03 14:38:40', '2022-05-03 14:38:40'),
(61, 0, 11, 21, 29, '1', '1', '1', '2022-05-03', '2', 'PR-625', '2022-05-03 14:38:40', '2022-05-03 14:38:40'),
(57, 0, 2, 21, 22, 'Nổi nhiều mụn bọc', 'Viêm da cấp 1', 'Không ăn đồ chiên dầu', '2022-04-14', 'Bôi ngày 2 lần', 'PR-6228', '2022-04-14 12:51:56', '2022-04-14 12:51:56'),
(58, 0, 12, 21, 22, '1', '1', '1', '2022-04-16', '1', 'PR-3223', '2022-04-15 04:18:40', '2022-04-15 04:18:40'),
(59, 0, 11, 21, 22, '1', '1', '1', '2022-04-16', '2', 'PR-3223', '2022-04-15 04:18:40', '2022-04-15 04:18:40'),
(56, 0, 10, 21, 22, 'Nổi nhiều mụn bọc', 'Viêm da cấp 1', 'Không ăn đồ chiên dầu', '2022-04-14', 'Bôi và thoa đều chỗ bị mụn', 'PR-6228', '2022-04-14 12:51:56', '2022-04-14 12:51:56'),
(80, 83, 11, 20, 2, '1', '1', '1', '2022-05-06', '2', 'PR-1420', '2022-05-06 12:27:48', '2022-05-06 12:27:48'),
(81, 87, 11, 19, 2, 'Dạ dày', 'Dạ dày', 'Dạ dày', '2022-05-06', 'Dạ dày', 'PR-4644', '2022-05-06 12:46:08', '2022-05-06 12:46:08'),
(66, 0, 10, 20, 2, '3', '3', '3', '2022-05-08', '3', 'PR-5226', '2022-05-04 11:21:35', '2022-05-04 11:21:35'),
(79, 83, 12, 20, 2, '1', '1', '1', '2022-05-06', '1', 'PR-1420', '2022-05-06 12:27:48', '2022-05-06 12:27:48'),
(78, 85, 10, 19, 2, '7', '7', '7', '2022-05-07', '7', 'PR-4361', '2022-05-06 07:48:20', '2022-05-06 07:48:20'),
(77, 85, 11, 19, 2, '7', '7', '7', '2022-05-07', '7', 'PR-4361', '2022-05-06 07:48:20', '2022-05-06 07:48:20'),
(75, NULL, 12, 19, 29, '1', '1', '1', '2022-05-07', '1', 'PR-8708', '2022-05-06 07:37:03', '2022-05-06 07:37:03'),
(76, 0, 12, 19, 22, '3', '3', '3', '2022-05-07', '3', 'PR-2038', '2022-05-06 07:38:53', '2022-05-06 07:38:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `qr_code`
--

DROP TABLE IF EXISTS `qr_code`;
CREATE TABLE IF NOT EXISTS `qr_code` (
  `QR_id` int(11) NOT NULL AUTO_INCREMENT,
  `QR_Content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `QR_Image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`QR_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `id_test` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_appointment` int(11) NOT NULL,
  `id_patient` int(11) NOT NULL,
  `id_doctor` int(11) NOT NULL,
  `id_test_type` int(11) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_status` int(11) NOT NULL,
  PRIMARY KEY (`id_test`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `test`
--

INSERT INTO `test` (`id_test`, `id_appointment`, `id_patient`, `id_doctor`, `id_test_type`, `note`, `result`, `test_status`) VALUES
(1, 83, 2, 19, 4, 'Dạ dày', 'Đau dạ dày cấp 1', 1),
(3, 80, 22, 0, 4, '1', 'Mụn', 1),
(4, 80, 22, 0, 5, '2', '2', 1),
(5, 47, 2, 0, 4, '3', '0', 0),
(6, 47, 2, 0, 3, '4', '0', 0),
(7, 80, 22, 0, 5, '1', '0', 0),
(8, 76, 2, 0, 5, '3', '0', 0),
(9, 76, 2, 0, 4, '2', '0', 0),
(10, 47, 2, 0, 5, '2', '0', 0),
(16, 85, 2, 19, 4, '2', '2', 1),
(15, 85, 2, 19, 5, '1', '1', 1),
(13, 84, 2, 19, 3, '1', '2', 1),
(14, 84, 2, 19, 4, '2', '2', 1),
(17, 83, 2, 20, 5, '1', '1', 1),
(18, 83, 2, 20, 4, '2', '2', 1),
(19, 87, 2, 19, 4, 'Xét nghiệm dạ dày', 'Viêm dạ dày', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `test_type`
--

DROP TABLE IF EXISTS `test_type`;
CREATE TABLE IF NOT EXISTS `test_type` (
  `id_test_type` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_test_type`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `test_type`
--

INSERT INTO `test_type` (`id_test_type`, `name_type`) VALUES
(2, 'Máu'),
(3, 'Nước tiểu'),
(4, 'Dạ dày'),
(5, 'Tim');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `time_frame`
--

DROP TABLE IF EXISTS `time_frame`;
CREATE TABLE IF NOT EXISTS `time_frame` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `frame_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `time_frame`
--

INSERT INTO `time_frame` (`id`, `frame_name`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 'Ca sáng', '07:00:00', '11:00:00', NULL, NULL),
(2, 'Ca chiều', '12:00:00', '16:00:00', NULL, NULL),
(4, 'Ca tối', '18:00:00', '22:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `time_schedules`
--

DROP TABLE IF EXISTS `time_schedules`;
CREATE TABLE IF NOT EXISTS `time_schedules` (
  `id_time` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `frame_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_time`)
) ENGINE=MyISAM AUTO_INCREMENT=455 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `time_schedules`
--

INSERT INTO `time_schedules` (`id_time`, `date`, `frame_name`, `duration`, `user_id`, `created_at`, `updated_at`) VALUES
(454, '2022/5/5', 'none', '30m', 19, '2022-05-04 06:54:54', NULL),
(453, '2022/5/4', 'none', '30m', 19, '2022-05-04 06:54:54', NULL),
(452, '2022/5/6', 'none', '30m', 19, '2022-04-30 06:10:35', NULL),
(451, '2022/4/29', 'none', '30m', 20, '2022-04-29 13:31:15', NULL),
(450, '2022/4/30', 'none', '30m', 21, '2022-04-24 05:33:15', NULL),
(449, '2022/4/29', 'none', '30m', 21, '2022-04-24 05:33:15', NULL),
(448, '2022/4/28', 'none', '30m', 21, '2022-04-24 05:33:15', NULL),
(444, '2022/4/24', 'none', '30m', 21, '2022-04-24 05:33:15', NULL),
(445, '2022/4/25', 'none', '30m', 21, '2022-04-24 05:33:15', NULL),
(446, '2022/4/26', 'none', '30m', 21, '2022-04-24 05:33:15', NULL),
(447, '2022/4/27', 'none', '30m', 21, '2022-04-24 05:33:15', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `specialist` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `address`, `picture`, `birth_date`, `gender`, `phone`, `emergency`, `type`, `email_verified_at`, `specialist`, `blood_group`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Quản Trị Viên', 'Hiếu', 'admin@gmail.com', '123456', 'Nhà', 'admin51.jpg', '1999-09-07', '0', '0365549764', '1', 1, NULL, '0', '0', NULL, NULL, NULL),
(2, 'KH', 'Hiếu Rose', 'hieusnguyen0709@gmail.com', '123456', 'Đường số 9, P16, GV', 'Ảnh thẻ353040.PNG', '1999-09-07', 'Nam', '0365549764', '1', 0, NULL, NULL, 'A', NULL, NULL, NULL),
(17, 'NV Xét Nghiệm', 'Hiếu', 'test_doctor@gmail.com', '123456', '108/08 đường số 5, P17, Q. Gò Vấp HCM', 'Bor5pNl80.jpg', '2022-03-19', '0', '0985972446', '1', 3, '2022-03-19 04:12:52', '1', '1', NULL, '2022-03-19 04:12:52', '2022-03-19 04:12:52'),
(18, 'Dược Sĩ', 'Hiếu', 'phamarcist@gmail.com', '123456', '108/08 đường số 5, P17, Q. Gò Vấp', '404-error20.jpg', '2022-03-20', '0', '0365549764', '1', 5, '2022-03-20 07:10:38', '0', '0', NULL, '2022-03-20 07:10:38', '2022-03-20 07:10:38'),
(13, 'NV Y Tế', 'Hiếu', 'receptionist@gmail.com', '123456', '108/08 duong so 5, quan go vap', '269063316_930389617679563_5398068098782128691_n66.jpg', NULL, '0', '365549764', '123', 2, '2022-03-13 06:49:30', '0', '2', NULL, '2022-03-13 06:49:30', '2022-03-13 06:49:30'),
(19, 'BS', 'Hiếu', 'doctor@gmail.com', '123456', '108/08 đường số 5, P17, Q. Gò Vấp', 'Dien Thoai IPhone85.jpg', '2022-03-20', '0', '0365549764', '1', 4, '2022-03-20 07:22:04', '0', '0', NULL, '2022-03-20 07:22:04', '2022-03-20 07:22:04'),
(20, 'Demo', 'BS 2', 'BS2', '123456', '108/08 duong so 5', 'Bor5pNl39.jpg', NULL, '0', '0365549764', '1', 4, '2022-03-26 07:35:45', '0', '0', NULL, '2022-03-26 07:35:45', '2022-03-26 07:35:45'),
(21, 'Hieu', 'BS', 'bs2@gmail.com', '123456', '108/08 đường số 5, P17, Q. Gò Vấp', 'Anh-Anime-119.jpg', '2022-03-27', '0', '0365549764', '123', 4, '2022-03-27 08:21:20', '0', '0', NULL, '2022-03-27 08:21:20', '2022-03-27 08:21:20'),
(22, 'Nguyễn', 'Huy', 'huy@gmail.com', '123456789', '108/08 đường số 5, P17, Q. Gò Vấp', 'May Tinh Lenovo14.png', '2022-03-27', '0', '0365549764', '123', 0, '2022-03-27 10:42:48', '0', '0', NULL, '2022-03-27 10:42:48', '2022-03-27 10:42:48'),
(24, 'Nguyễn', 'Hiếu', 'hieuhamho999x@gmail.com', '123123', '108/08 đường số 5, P17, Q. Gò Vấp', 'poster_lat_mat__payoff_1567.jpg', '2022-04-25', '0', '0', '0', 0, '2022-04-25 03:14:48', '0', '0', NULL, '2022-04-25 03:14:48', '2022-04-25 03:14:48'),
(28, 'Nguyễn', 'Hiếu', 'hieuhieu@gmail.com', '123123', '108/08 đường số 5, P17, Q. Gò Vấp', '0', '2022-04-25', '0', '0365549764', '0', 0, '2022-04-25 08:25:18', '0', '0', NULL, '2022-04-25 08:25:18', '2022-04-25 08:25:18'),
(29, 'Nguyễn', 'Hiếu', 'hieuhieu111@gmail.com', '123', '108/08 đường số 5, P17, Q. Gò Vấp', 'Chưa cập nhật', '2022-04-25', 'Chưa cập nhật', '0365549764', 'Chưa cập nhật', 0, '2022-04-25 08:31:25', '0', 'Chưa cập nhật', NULL, '2022-04-25 08:31:25', '2022-04-25 08:31:25'),
(30, 'Nguyễn', 'Hiếu', '1234@gmail.com', NULL, '108/08 duong so 5123', 'Chưa cập nhật', '2022-04-25', '0', '0365549764123', 'BTh', 1, '2022-04-25 08:45:49', 'Chưa cập nhật', '0', NULL, '2022-04-25 08:45:49', '2022-04-25 08:45:49');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
