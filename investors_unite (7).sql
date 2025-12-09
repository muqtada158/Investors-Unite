-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2023 at 05:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `investors_unite`
--

-- --------------------------------------------------------

--
-- Table structure for table `ch_favorites`
--

CREATE TABLE `ch_favorites` (
  `id` char(36) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `favorite_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ch_favorites`
--

INSERT INTO `ch_favorites` (`id`, `user_id`, `favorite_id`, `created_at`, `updated_at`) VALUES
('d77da720-b779-40a8-bfdb-c7fb177b75b2', 3, 2, '2023-08-09 08:19:03', '2023-08-09 08:19:03'),
('efe64efd-b119-422d-b275-9710450698a2', 2, 6, '2023-08-09 07:11:16', '2023-08-09 07:11:16');

-- --------------------------------------------------------

--
-- Table structure for table `ch_messages`
--

CREATE TABLE `ch_messages` (
  `id` char(36) NOT NULL,
  `from_id` bigint(20) NOT NULL,
  `to_id` bigint(20) NOT NULL,
  `body` varchar(5000) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ch_messages`
--

INSERT INTO `ch_messages` (`id`, `from_id`, `to_id`, `body`, `attachment`, `seen`, `created_at`, `updated_at`) VALUES
('05349e69-4b7d-40bd-b920-6856d672eaaa', 2, 7, 'hello', NULL, 0, '2023-08-09 06:33:51', '2023-08-09 06:33:51'),
('05776e70-b99a-4474-8953-4ef34e43f70b', 2, 6, 'yo', NULL, 0, '2023-08-09 06:56:11', '2023-08-09 06:56:11'),
('22121b75-fae8-4a8d-8b2b-21807909f5b2', 3, 2, 'hi mate', NULL, 1, '2023-08-09 08:00:19', '2023-08-09 08:00:19'),
('46ad754a-6668-4cea-9345-52ddc2a982fb', 2, 3, 'hi this is dealer', NULL, 1, '2023-08-09 06:56:56', '2023-08-09 06:57:42'),
('4b28149d-15a5-4d05-82c9-af44c791ed46', 3, 2, 'Hello there', NULL, 1, '2023-08-09 06:57:48', '2023-08-09 06:57:49'),
('52774c5f-5508-4de9-b4f4-b33bb699a319', 3, 2, 'hello', NULL, 1, '2023-08-09 08:00:15', '2023-08-09 08:00:16'),
('82b4adfe-1bbb-465b-9d9c-b04a9fef518e', 2, 3, 'hello', NULL, 1, '2023-08-09 07:09:23', '2023-08-09 07:09:30'),
('8d4270e4-02a4-4f16-80d6-6b62cf60002a', 3, 2, '🤗', NULL, 1, '2023-08-09 08:00:53', '2023-08-09 08:00:55'),
('97fa304a-02f8-44ab-b2bc-f0980574f954', 2, 3, 'o', NULL, 1, '2023-08-09 08:00:02', '2023-08-09 08:00:03'),
('98a3ffad-b778-4ae5-92af-9652d34f2af1', 3, 2, '', '{\"new_name\":\"2a293be1-3cca-4011-97d1-4d61be5741ff.png\",\"old_name\":\"cart-img-10.png\"}', 1, '2023-08-09 07:03:42', '2023-08-09 07:03:54'),
('991486d1-3258-4b16-b0c0-fa31ea92e5c2', 2, 3, 'hi bro', NULL, 1, '2023-08-09 08:00:22', '2023-08-09 08:00:23'),
('cb4ea0c8-29c9-4ba0-8515-428ad23dc6f1', 2, 3, '?', NULL, 1, '2023-08-09 06:58:27', '2023-08-09 06:58:34'),
('e052c397-169e-474a-b13d-c604678eadd1', 3, 2, 'ok then its working now', NULL, 1, '2023-08-09 07:09:38', '2023-08-09 07:09:40'),
('f067d0b6-d0e7-473b-8dae-b9377c6eae72', 3, 2, 'perfect', NULL, 1, '2023-08-09 07:59:42', '2023-08-09 07:59:54'),
('fc076879-daed-4b4b-a1d2-f59867405876', 3, 2, 'helo', NULL, 1, '2023-08-09 09:26:27', '2023-08-09 09:26:32');

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(1, 'How do I post my property?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 1, '2023-05-30 08:59:26', '2023-05-30 09:24:05'),
(3, 'How do I take my property down?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 1, '2023-05-30 09:23:58', '2023-05-30 09:23:58'),
(4, 'How do I connect with private lenders?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 1, '2023-05-30 09:24:33', '2023-05-30 09:37:51');

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
-- Table structure for table `j_v_partners`
--

CREATE TABLE `j_v_partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lister_id` int(11) NOT NULL COMMENT 'Property Lister',
  `property_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL COMMENT 'JV Requester',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = InActive , 1 = Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `j_v_partners`
--

INSERT INTO `j_v_partners` (`id`, `lister_id`, `property_id`, `member_id`, `status`, `created_at`, `updated_at`) VALUES
(8, 6, 8, 2, 0, '2023-06-15 08:10:52', '2023-06-15 08:10:52'),
(9, 6, 8, 6, 0, '2023-06-16 02:31:37', '2023-06-16 02:31:37'),
(10, 2, 4, 8, 1, '2023-06-16 05:30:40', '2023-06-20 07:17:33'),
(14, 2, 4, 2, 1, '2023-06-28 06:30:12', '2023-06-28 06:30:12'),
(19, 2, 6, 2, 0, '2023-07-06 10:49:03', '2023-07-06 10:49:03'),
(20, 2, 7, 2, 0, '2023-07-11 03:26:03', '2023-07-11 03:26:03'),
(23, 2, 4, 3, 0, '2023-07-20 09:55:00', '2023-07-20 09:55:00');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `device_token` text DEFAULT NULL,
  `email_for_notification` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `phone_for_notification` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 = buyers, 2 = seller, 3 = property dealer',
  `profile_status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 = not completed, 1 = completed',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0 = inactive, 1 = active',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'for chatify chat status',
  `dark_mode` tinyint(1) NOT NULL DEFAULT 0,
  `messenger_color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `email`, `device_token`, `email_for_notification`, `phone`, `phone_for_notification`, `company`, `image`, `email_verified_at`, `password`, `type`, `profile_status`, `status`, `remember_token`, `created_at`, `updated_at`, `active_status`, `dark_mode`, `messenger_color`) VALUES
(1, 'Test User', 'test@mail.com', NULL, 'test@mail.com', '123123213', '123123123', 'Mycompany', '/upload/profile/1766362777504051.jpg', NULL, '$2y$10$tRgc1ViQ857/Q0kr1sdqiewm8HBMD3Ohz2urSt3zQo2lfLjAn8kl.', 1, 1, 1, NULL, '2023-05-18 18:27:28', '2023-07-26 06:52:13', 0, 0, NULL),
(2, 'Dealer', 'dealer@mail.com', 'fx0ovaqcogWMeMVZIXJoiy:APA91bG_5gBTwWyobaxVPJuDL_AOjaqfTdhe91tH30PxIRfHJ-Mdd-H3KMyVJoHZELfMOP4hRgP9AwJ96-v0y25lSOmAQAsUo8P_ZDMrOTyKwWXpgFX9hvyNhVSxcNf9z-qSttIwTaV9', 'dev@dealer.com', '123456789', '123456789', 'Dev', '/upload/profile/1773562737941753.jpg', NULL, '$2y$10$wbjKSFId6x8LYIub/CmfquTFJ6zoP3brtBK.kc6yLDlOZjaSi9dSG', 3, 1, 1, NULL, '2023-05-19 10:29:13', '2023-08-09 09:25:33', 1, 0, '#2180f3'),
(3, 'New User', 'new@mail.com', 'c9u7a_SobzjOD4a9I_pt3f:APA91bF3FrU_1LCycVu0HzzJh_3Et0lZGOl5w9-waJgOlJppi6XabEGtibMxiB6jKre0hIW7CpH_iiZfFCqYlMOl-QfmyJivp9-KjARFDszM8uk9UHVh2yvRD2yGhXRSXTLKuPx-3fGd', 'new@mail.com', '1234568789', '12345679', 'asd', '/upload/profile/1771944631999963.jpg', NULL, '$2y$10$SCHJWyWkBu6156LlV8xvkeX9ajzIL9f5RizBUFJXdqiTQysD31FY6', 3, 1, 1, NULL, '2023-05-30 03:19:13', '2023-08-09 09:30:05', 1, 0, NULL),
(4, 'Member', 'aaa@maill.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$JdQqnSOgVoOefHz6FLPy8ungObmIiGYJU.qgLuG7I6kJGdWJbxgsa', 1, 0, 1, NULL, '2023-05-30 03:21:26', '2023-05-30 03:21:26', 0, 0, NULL),
(5, 'John Doe', 'john@mail.com', NULL, 'john@mail.com', '123456789', '987654321', 'Johnathan', '/upload/profile/1767331882016334.jpg', NULL, '$2y$10$EaEHQSxZUZznUER5sW0dReRjU7QdoXDRdDoO8zbto2dX8TLb7Erv.', 2, 1, 1, NULL, '2023-05-30 10:03:13', '2023-07-26 07:05:34', 0, 0, NULL),
(6, 'John Dealer', 'johndealer@mail.com', NULL, 'johndd@mail.com', '987654321', '321564897', 'John', '/upload/profile/1767599702251104.jpg', NULL, '$2y$10$F4PEKSubyPA79jsdpxz2CuUVXrBnanfKAFlo/iC5DHgRdWtGYvQiS', 3, 1, 1, NULL, '2023-06-02 06:52:33', '2023-06-02 09:00:37', 0, 0, NULL),
(7, 'Darren', 'darren@mail.com', NULL, NULL, NULL, NULL, NULL, '/upload/profile/1766362777504051.jpg', NULL, '$2y$10$wY/r3lJ1fCY699D0/z8wi.r3jpMMCtwkem3A4UOM6Xf.xJbj5lHyy', 1, 0, 1, NULL, '2023-06-02 07:51:21', '2023-06-02 07:51:21', 0, 0, NULL),
(8, 'dealer 2', 'dealer2@mail.com', NULL, NULL, NULL, NULL, NULL, '/upload/profile/1767599702251104.jpg', NULL, '$2y$10$x67NyIrRHyKpWMdeKDmaDeUn7U5LWY5VLZ2zvrkUYIxD3uiw7C1tC', 3, 0, 1, NULL, '2023-06-06 10:00:18', '2023-06-06 10:00:18', 0, 0, NULL),
(9, 'newpro', 'newpro@mail.com', NULL, 'asd@vv', '11111', '123', 'asd', '/upload/profile/1773562855176384.jpg', NULL, '$2y$10$dS1t1RV3ZL9SBhqR3qf/dO8VTWg8LJ4X7ny2rrU379zK14DdM5RVu', 1, 1, 1, NULL, '2023-08-07 04:41:45', '2023-08-07 04:48:30', 0, 0, NULL);

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_05_19_190924_create_properties_table', 1),
(7, '2023_05_19_214531_create_properties_images_table', 1),
(8, '2023_05_25_093047_saved_deals_create_table', 1),
(9, '2023_05_30_130917_create_faqs_table', 1),
(11, '2023_05_31_135821_create_offer_documents_table', 1),
(12, '2023_06_06_071936_create_property_solds_table', 1),
(15, '2023_06_07_141711_create_packages_table', 3),
(16, '2023_06_07_125743_create_subscriptions_table', 4),
(17, '2023_05_31_134103_create_offers_table', 5),
(20, '2023_06_15_095419_create_j_v_partners_table', 6),
(24, '2023_06_20_142529_create_showings_table', 7),
(25, '2023_05_17_151147_create_members_table', 8),
(26, '2023_07_19_135609_create_jobs_table', 9),
(28, '2023_07_21_110816_create_notification_permissions_table', 10),
(47, '2023_08_09_999999_add_active_status_to_members', 11),
(48, '2023_08_09_999999_add_dark_mode_to_members', 11),
(49, '2023_08_09_999999_add_messenger_color_to_members', 11),
(50, '2023_08_09_999999_create_chatify_favorites_table', 11),
(51, '2023_08_09_999999_create_chatify_messages_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `notification_permissions`
--

CREATE TABLE `notification_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `email_deal_posted` int(11) NOT NULL DEFAULT 0,
  `notify_deal_posted` int(11) NOT NULL DEFAULT 0,
  `email_offer_received` int(11) NOT NULL DEFAULT 0,
  `notify_offer_received` int(11) NOT NULL DEFAULT 0,
  `email_buy_now` int(11) NOT NULL DEFAULT 0,
  `notify_buy_now` int(11) NOT NULL DEFAULT 0,
  `email_jv_partner` int(11) NOT NULL DEFAULT 0,
  `notify_jv_partner` int(11) NOT NULL DEFAULT 0,
  `email_direct_message` int(11) NOT NULL DEFAULT 0,
  `notify_direct_message` int(11) NOT NULL DEFAULT 0,
  `email_closing_date` int(11) NOT NULL DEFAULT 0,
  `notify_closing_date` int(11) NOT NULL DEFAULT 0,
  `email_financing` int(11) NOT NULL DEFAULT 0,
  `notify_financing` int(11) NOT NULL DEFAULT 0,
  `email_house_tour` int(11) NOT NULL DEFAULT 0,
  `notify_house_tour` int(11) NOT NULL DEFAULT 0,
  `email_price_reduction` int(11) NOT NULL DEFAULT 0,
  `notify_price_reduction` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification_permissions`
--

INSERT INTO `notification_permissions` (`id`, `member_id`, `email_deal_posted`, `notify_deal_posted`, `email_offer_received`, `notify_offer_received`, `email_buy_now`, `notify_buy_now`, `email_jv_partner`, `notify_jv_partner`, `email_direct_message`, `notify_direct_message`, `email_closing_date`, `notify_closing_date`, `email_financing`, `notify_financing`, `email_house_tour`, `notify_house_tour`, `email_price_reduction`, `notify_price_reduction`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 0, 1, 0, 1, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, '2023-07-31 07:23:04', '2023-08-03 09:03:28'),
(2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, '2023-07-31 10:47:58', '2023-07-31 11:05:55');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `offer_price` decimal(16,2) DEFAULT NULL,
  `earnest_deposit` decimal(16,2) DEFAULT NULL,
  `closing_date` date DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0 = buy_now, 1 = make_an_offer',
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `buyer_id`, `property_id`, `offer_price`, `earnest_deposit`, `closing_date`, `name`, `phone`, `email`, `company`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 7, 62626.00, 262.00, '2023-06-10', 'Dealer', '123456789', 'dealer@mail.com', 'Dev', 1, 1, '2023-05-31 10:08:21', '2023-05-31 10:08:21'),
(2, 2, 7, 12345.00, 123.00, '2023-06-10', 'Dealer', '123456789', 'dealer@mail.com', 'Dev', 1, 1, '2023-05-31 10:10:55', '2023-05-31 10:10:55'),
(3, 2, 7, 62626.00, 123.00, NULL, 'Dealer', '123456789', 'dealer@mail.com', 'Dev', 1, 1, '2023-05-31 10:13:01', '2023-05-31 10:13:01'),
(4, 2, 7, 111111.00, 222.00, NULL, 'Dealer', '123456789', 'dealer@mail.com', 'Dev', 1, 1, '2023-05-31 10:21:37', '2023-05-31 10:21:37'),
(5, 2, 3, 62626.00, 262.00, '2023-06-16', 'Dealer', '123456789', 'dealer@mail.com', 'Dev', 1, 1, '2023-06-01 06:07:33', '2023-06-01 06:07:33'),
(6, 1, 7, 52000.00, 25000.00, '2023-06-03', 'Test User', '123123213', 'test@mail.com', 'asd', 1, 1, '2023-06-01 11:01:16', '2023-06-01 11:01:16'),
(7, 2, 3, 600.00, 250.00, '2023-06-09', 'Dealer', '123456789', 'dealer@mail.com', 'Dev', 1, 1, '2023-06-02 04:26:18', '2023-06-02 04:26:18'),
(8, 2, 3, 123.00, 123.00, '2023-06-15', 'Dealer', '123456789', 'dealer@mail.com', 'Dev', 1, 1, '2023-06-02 04:29:32', '2023-06-02 04:29:32'),
(9, 2, 3, 250.00, 200.00, '2023-06-03', 'Dealer', '123456789', 'dealer@mail.com', 'Dev', 1, 1, '2023-06-02 04:35:03', '2023-06-02 04:35:03'),
(10, 2, 3, 250.00, 123.00, '2023-06-03', NULL, NULL, NULL, NULL, 1, 1, '2023-06-19 06:15:51', '2023-06-02 06:15:51'),
(11, 2, 3, 123.00, 123.00, '2023-06-03', NULL, NULL, NULL, NULL, 0, 1, '2023-06-02 06:16:56', '2023-06-02 06:16:56'),
(12, 2, 3, 123.00, 150.00, '2023-06-15', NULL, NULL, NULL, NULL, 0, 1, '2023-06-19 06:18:38', '2023-06-02 06:18:38'),
(13, 6, 6, 420.00, 150.00, '2023-06-15', NULL, NULL, NULL, NULL, 1, 1, '2023-06-02 06:53:14', '2023-06-02 06:53:14'),
(14, 6, 7, 62626.00, 123.00, '2023-06-09', NULL, NULL, NULL, NULL, 1, 1, '2023-06-02 07:16:17', '2023-06-02 07:16:17'),
(21, 2, 4, 700.00, 250.00, '2023-06-28', NULL, NULL, NULL, NULL, 1, 1, '2023-06-16 09:33:56', '2023-06-16 09:33:56'),
(22, 2, 7, 55000.00, 123.00, '2023-07-05', NULL, NULL, NULL, NULL, 0, 1, '2023-07-04 08:15:12', '2023-07-04 08:15:12'),
(23, 2, 7, 55000.00, 2500.00, '2023-07-06', NULL, NULL, NULL, NULL, 0, 1, '2023-07-05 08:46:46', '2023-07-05 08:46:46'),
(24, 2, 7, 55000.00, 2500.00, '2023-07-06', NULL, NULL, NULL, NULL, 0, 1, '2023-07-05 08:47:54', '2023-07-05 08:47:54'),
(25, 2, 7, 55000.00, 1111111.00, '2023-07-12', NULL, NULL, NULL, NULL, 0, 1, '2023-07-05 08:49:10', '2023-07-05 08:49:10'),
(26, 2, 7, 490000.00, 25000.00, '2023-07-07', NULL, NULL, NULL, NULL, 1, 1, '2023-07-05 08:50:08', '2023-07-05 08:50:08'),
(27, 2, 7, 11111111111.00, 11111111.00, '2023-07-12', NULL, NULL, NULL, NULL, 1, 1, '2023-07-05 09:44:08', '2023-07-05 09:44:08'),
(28, 2, 6, 435.00, 2500.00, '2023-07-20', NULL, NULL, NULL, NULL, 0, 1, '2023-07-10 07:14:28', '2023-07-10 07:14:28'),
(29, 2, 6, 435.00, 1111.00, '2023-07-11', NULL, NULL, NULL, NULL, 0, 1, '2023-07-10 07:39:08', '2023-07-10 07:39:08'),
(30, 2, 6, 435.00, 11111.00, '2023-07-12', NULL, NULL, NULL, NULL, 0, 1, '2023-07-10 07:52:02', '2023-07-10 07:52:02'),
(31, 2, 6, 435.00, 123.00, '2023-07-11', NULL, NULL, NULL, NULL, 0, 1, '2023-07-10 07:56:22', '2023-07-10 07:56:22'),
(32, 2, 6, 400.00, 150.00, '2023-07-11', NULL, NULL, NULL, NULL, 1, 1, '2023-07-10 10:39:33', '2023-07-10 10:39:33'),
(33, 2, 6, 399.00, 123.00, '2023-07-12', NULL, NULL, NULL, NULL, 1, 1, '2023-07-10 10:43:07', '2023-07-10 10:43:07'),
(34, 2, 4, 700.00, 250.00, '2023-07-10', NULL, NULL, NULL, NULL, 1, 1, '2023-07-10 10:49:15', '2023-07-10 10:49:15'),
(35, 2, 7, 62626.00, 262.00, '2023-07-12', NULL, NULL, NULL, NULL, 1, 1, '2023-07-11 08:41:55', '2023-07-11 08:41:55'),
(36, 2, 7, 55000.00, 123.00, '2023-07-12', NULL, NULL, NULL, NULL, 0, 1, '2023-07-11 08:42:24', '2023-07-11 08:42:24'),
(37, 2, 7, 50000.00, 2500.00, '2023-07-26', NULL, NULL, NULL, NULL, 1, 1, '2023-07-11 08:46:42', '2023-07-11 08:46:42'),
(38, 3, 7, 55000.00, 45000.00, '2023-07-27', NULL, NULL, NULL, NULL, 0, 1, '2023-07-20 08:01:40', '2023-07-20 08:01:40'),
(39, 3, 7, 52000.00, 15222.00, '2023-07-27', NULL, NULL, NULL, NULL, 1, 1, '2023-07-20 08:06:37', '2023-07-20 08:06:37'),
(40, 3, 7, 55000.00, 2222.00, '2023-07-27', NULL, NULL, NULL, NULL, 0, 1, '2023-07-20 08:16:06', '2023-07-20 08:16:06'),
(41, 3, 4, 730.00, 123.00, '2023-07-27', NULL, NULL, NULL, NULL, 0, 1, '2023-07-20 10:39:36', '2023-07-20 10:39:36'),
(42, 2, 12, 69000.00, 123.00, '2023-08-16', NULL, NULL, NULL, NULL, 0, 1, '2023-08-03 07:08:56', '2023-08-03 07:08:56'),
(43, 2, 12, 69000.00, 123126.00, '2023-08-17', NULL, NULL, NULL, NULL, 0, 1, '2023-08-03 08:07:28', '2023-08-03 08:07:28');

-- --------------------------------------------------------

--
-- Table structure for table `offer_documents`
--

CREATE TABLE `offer_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `offer_id` int(11) NOT NULL,
  `document` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offer_documents`
--

INSERT INTO `offer_documents` (`id`, `offer_id`, `document`, `created_at`, `updated_at`) VALUES
(1, 9, '/upload/offer_documents/28281327908542832.docx', '2023-06-02 04:35:03', '2023-06-02 04:35:03'),
(2, 9, '/upload/offer_documents/28281327908679185.pdf', '2023-06-02 04:35:03', '2023-06-02 04:35:03'),
(3, 9, '/upload/offer_documents/28281327908801058.txt', '2023-06-02 04:35:03', '2023-06-02 04:35:03'),
(4, 10, '/upload/offer_documents/28281429367917760.txt', '2023-06-02 06:15:51', '2023-06-02 06:15:51'),
(5, 11, '/upload/offer_documents/28281430461816576.txt', '2023-06-02 06:16:56', '2023-06-02 06:16:56'),
(6, 12, '/upload/offer_documents/28281432167863792.docx', '2023-06-02 06:18:38', '2023-06-02 06:18:38'),
(7, 13, '/upload/offer_documents/28281466998806352.txt', '2023-06-02 06:53:14', '2023-06-02 06:53:14'),
(8, 14, '/upload/offer_documents/28281490210869616.txt', '2023-06-02 07:16:17', '2023-06-02 07:16:17'),
(9, 15, '/upload/offer_documents/28287457057025232.jpg', '2023-06-06 10:03:49', '2023-06-06 10:03:49'),
(10, 16, '/upload/offer_documents/28288586367311632.jpg', '2023-06-07 04:45:41', '2023-06-07 04:45:41'),
(11, 17, '/upload/offer_documents/28288715685266288.jpg', '2023-06-07 06:54:09', '2023-06-07 06:54:09'),
(12, 18, '/upload/offer_documents/28288718330742688.jpeg', '2023-06-07 06:56:47', '2023-06-07 06:56:47'),
(13, 19, '/upload/offer_documents/28288723621507680.jpg', '2023-06-07 07:02:02', '2023-06-07 07:02:02'),
(14, 20, '/upload/offer_documents/28298828647882656.jpeg', '2023-06-14 06:20:29', '2023-06-14 06:20:29'),
(15, 21, '/upload/offer_documents/28301922491290400.jpeg', '2023-06-16 09:33:56', '2023-06-16 09:33:56'),
(16, 22, '/upload/offer_documents/28327935154597984.jpg', '2023-07-04 08:15:12', '2023-07-04 08:15:12'),
(17, 23, '/upload/offer_documents/28329416491166224.jpg', '2023-07-05 08:46:46', '2023-07-05 08:46:46'),
(18, 24, '/upload/offer_documents/28329417629682880.jpg', '2023-07-05 08:47:54', '2023-07-05 08:47:54'),
(19, 25, '/upload/offer_documents/28329418900050560.jpeg', '2023-07-05 08:49:10', '2023-07-05 08:49:10'),
(20, 26, '/upload/offer_documents/28329419873642608.jpg', '2023-07-05 08:50:08', '2023-07-05 08:50:08'),
(21, 27, '/upload/offer_documents/28329474232881920.jpg', '2023-07-05 09:44:08', '2023-07-05 09:44:08'),
(22, 28, '/upload/offer_documents/28336571335800448.jpg', '2023-07-10 07:14:28', '2023-07-10 07:14:28'),
(23, 29, '/upload/offer_documents/28336596163851056.jpg', '2023-07-10 07:39:08', '2023-07-10 07:39:08'),
(24, 30, '/upload/offer_documents/28336609150410832.jpg', '2023-07-10 07:52:02', '2023-07-10 07:52:02'),
(25, 31, '/upload/offer_documents/28336613509984736.jpg', '2023-07-10 07:56:22', '2023-07-10 07:56:22'),
(26, 32, '/upload/offer_documents/28336777772814288.jpg', '2023-07-10 10:39:33', '2023-07-10 10:39:33'),
(27, 33, '/upload/offer_documents/28336781360349232.jpg', '2023-07-10 10:43:07', '2023-07-10 10:43:07'),
(28, 34, '/upload/offer_documents/28336787533729616.jpg', '2023-07-10 10:49:15', '2023-07-10 10:49:15'),
(29, 35, '/upload/offer_documents/28338108917230288.jpg', '2023-07-11 08:41:55', '2023-07-11 08:41:55'),
(30, 36, '/upload/offer_documents/28338109409153696.jpg', '2023-07-11 08:42:24', '2023-07-11 08:42:24'),
(31, 37, '/upload/offer_documents/28338113733541872.jpg', '2023-07-11 08:46:42', '2023-07-11 08:46:42'),
(32, 38, '/upload/offer_documents/28351114360420864.png', '2023-07-20 08:01:40', '2023-07-20 08:01:40'),
(33, 39, '/upload/offer_documents/28351119340357344.jpg', '2023-07-20 08:06:37', '2023-07-20 08:06:37'),
(34, 40, '/upload/offer_documents/28351128885162400.png', '2023-07-20 08:16:06', '2023-07-20 08:16:06'),
(35, 41, '/upload/offer_documents/28351273340591504.png', '2023-07-20 10:39:36', '2023-07-20 10:39:36'),
(36, 42, '/upload/offer_documents/28371354994752656.png', '2023-08-03 07:08:56', '2023-08-03 07:08:56'),
(37, 43, '/upload/offer_documents/28371413912284992.png', '2023-08-03 08:07:28', '2023-08-03 08:07:28');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `listing_details` text DEFAULT NULL,
  `price` decimal(16,2) DEFAULT NULL,
  `validity_in_days` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0 = Inactive, 1 = Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `title`, `listing_details`, `price`, `validity_in_days`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Investor Unite Plus', '[\"Sell your deals fast\",\"Increase your potential profits instantly\",\"Access to private money lenders nationwide\",\"Realtors can list pocket listings and make more\"]', 279.00, 30, 1, '2023-06-07 10:03:15', '2023-06-07 10:03:15');

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
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_type` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `complete_address` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `after_repair_value` decimal(10,2) DEFAULT NULL,
  `no_of_beds` int(11) DEFAULT NULL,
  `no_of_baths` int(11) DEFAULT NULL,
  `acceptable_financing` decimal(10,2) DEFAULT NULL,
  `total_square_footage` varchar(255) DEFAULT NULL,
  `association_community` varchar(255) DEFAULT NULL,
  `current_zoning` varchar(255) DEFAULT NULL,
  `annual_taxes` decimal(10,2) DEFAULT NULL,
  `year_built` year(4) DEFAULT NULL,
  `water_source` varchar(255) DEFAULT NULL,
  `sewer_source` varchar(255) DEFAULT NULL,
  `cooling_type` varchar(255) DEFAULT NULL,
  `heating_type` varchar(255) DEFAULT NULL,
  `type_of_parking` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `expected_closing_date` date DEFAULT NULL,
  `property_availability` varchar(255) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `bedroom_and_bathroom` varchar(255) DEFAULT NULL,
  `basement` varchar(255) DEFAULT NULL,
  `flooring` varchar(255) DEFAULT NULL,
  `appliances` varchar(255) DEFAULT NULL,
  `other_interior_features` text DEFAULT NULL,
  `walk_score` int(11) DEFAULT NULL,
  `transit_score` int(11) DEFAULT NULL,
  `bike_score` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0 = inactive, 1 = active',
  `property_sold` int(11) NOT NULL DEFAULT 0 COMMENT '0 = notSold, 1 = sold',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `property_type`, `city`, `state`, `zipcode`, `complete_address`, `price`, `after_repair_value`, `no_of_beds`, `no_of_baths`, `acceptable_financing`, `total_square_footage`, `association_community`, `current_zoning`, `annual_taxes`, `year_built`, `water_source`, `sewer_source`, `cooling_type`, `heating_type`, `type_of_parking`, `description`, `expected_closing_date`, `property_availability`, `member_id`, `bedroom_and_bathroom`, `basement`, `flooring`, `appliances`, `other_interior_features`, `walk_score`, `transit_score`, `bike_score`, `status`, `property_sold`, `created_at`, `updated_at`) VALUES
(3, 'Mobile Home', NULL, NULL, NULL, 'Novel Road 1135, Williamston,nc, 23892 United States', 605.00, 123.00, 51, 29, 123.00, '500', '0', 'Consequuntur velit o', 123.00, '2018', 'Ratione enim duis am', 'Obcaecati et ea magn', 'Consequuntur archite', 'Cupiditate ut delect', 'Officia fugit labor', 'Voluptas enim nostru', '2023-07-10', '0', 2, '1 Master bed, 3 bed, 3 Baths', NULL, 'Vinyl', NULL, NULL, 22, 34, 67, 1, 0, '2023-05-19 17:03:12', '2023-07-07 09:42:55'),
(4, 'Multi Family (5+ Unit)', NULL, NULL, NULL, 'State Road 1135, Williamston,nc, 23892 United States', 730.00, 123.00, 43, 88, 123.00, '2855', NULL, 'Quia laudantium ali', 123.00, '2010', 'Ullam quia non nesci', 'Rem natus ea archite', 'In labore mollit par', 'Sit non neque aliqu', 'Quam quo quis tempor', 'Error laboriosam ve', '2023-06-03', '1', 2, NULL, NULL, NULL, NULL, NULL, 23, 23, 23, 1, 0, '2023-05-19 17:06:49', '2023-05-31 08:09:33'),
(6, 'Single Family', NULL, NULL, NULL, 'Free way Road 1135, Williamston,nc, 23892 United States', 435.00, 123.00, 65, 54, 123.00, '4850', NULL, 'In quis praesentium', 123.00, '1971', 'Dolor animi est en', 'Excepturi rem enim f', 'Quasi iure porro mol', 'Est dolorem modi ani', 'Eveniet animi nece', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the\r\n                industry\'s standard dummy text ever since the 1500s. Lorem Ipsum is simply dummy text of the printing\r\n                and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the\r\n                1500s. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been\r\n                the industry\'s standard dummy text ever since the 1500s. Lorem Ipsum is simply dummy text of the\r\n                printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since\r\n                the 1500s.', '2023-06-15', '1', 2, NULL, NULL, NULL, NULL, NULL, 78, 88, 88, 1, 1, '2023-05-19 17:24:12', '2023-07-11 09:04:35'),
(7, 'Commercial', NULL, NULL, NULL, 'WTC Road 1135, Williamston,nc, 23892 United States', 55000.00, 65000.00, 4, 3, 5000.00, '5600', NULL, 'Sunt facilis ratione', 1200.00, '2022', 'tap water', 'yes', 'yes', 'concealed', '2 garages', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '2023-06-10', '1', 2, '1 Master bed, 3 bee, 3 Baths', 'Unfinished', 'Carpet', 'Dishwasher, Disposal, Microwave, Oven', 'Common walls with other units/homes: No Common Walls', 97, 53, 89, 1, 0, '2023-05-31 07:14:59', '2023-06-06 05:15:32'),
(9, 'Multi Family (1-4 Unit)', NULL, NULL, NULL, '1135 state road , Williamston,nc, 23892 United States', 350000.00, 450000.00, 7, 5, 1200.00, '7000', '250', 'Culpa nostrud ullam', 2500.00, '2012', 'Aute voluptas id fug', 'Praesentium proident', 'Dolor est facilis ea', 'Nisi in recusandae', 'Ea unde deleniti dol', 'Natus rerum placeat', '2023-08-02', '1', 2, 'Voluptatum omnis aut', 'Et ab molestiae in c', 'Qui doloribus tempor', NULL, 'Aliquam velit dolore', 94, 45, 33, 1, 0, '2023-08-02 04:51:30', '2023-08-02 04:51:30'),
(10, 'Multi Family (5+ Unit)', NULL, NULL, NULL, '1135 state road , Williamston,nc, 23892 United States', 630.00, 123.00, 12, 8, 123.00, 'Voluptas excepteur d', 'Quasi in harum offic', 'Voluptatem Similiqu', 123.00, '1994', 'Ipsam expedita odio', 'Sit ex molestiae con', 'Enim atque quaerat r', 'Natus exercitation q', 'Ex ut voluptate id', 'Libero mollitia volu', '2023-08-02', '1', 2, '630', NULL, 'Voluptas et impedit', NULL, 'Aut corporis consequ', 83, 78, 88, 1, 0, '2023-08-02 04:54:49', '2023-08-02 04:54:49'),
(11, 'Lot/Land', NULL, NULL, NULL, '1180 state road , Levy Street ,nc, 98765 United States', 950.00, 3434343.00, 0, 0, 2500.00, '6800', '200', 'Dolorem eu eos autem', 260.00, '1983', 'Qui est ut qui repud', 'Accusamus aut quis o', 'Harum nihil dolor al', 'Vitae veniam ipsa', 'Cumque sit nulla re', 'Minim sit fuga Est', '2023-08-02', '1', 2, NULL, NULL, NULL, NULL, NULL, 72, 76, 86, 1, 0, '2023-08-02 05:06:14', '2023-08-02 05:06:14'),
(12, 'Condo', NULL, NULL, NULL, '1180 state road , Levy Street ,nc, 98765 United States', 69000.00, 85000.00, 5, 3, 200.00, '2500', '260', 'Elit perferendis ut', 150.00, '2015', 'In enim animi dolor', 'Qui velit qui id cu', 'Pariatur Necessitat', 'Dolor enim eius offi', 'Ducimus dolor liber', 'Fugit quo tempore', '2023-08-02', '1', 2, 'Nam nostrum qui cupi', NULL, 'Dolor pariatur Enim', NULL, NULL, 96, 59, 1, 1, 0, '2023-08-02 06:45:01', '2023-08-02 06:45:01');

-- --------------------------------------------------------

--
-- Table structure for table `properties_images`
--

CREATE TABLE `properties_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties_images`
--

INSERT INTO `properties_images` (`id`, `property_id`, `image`, `created_at`, `updated_at`) VALUES
(15, 6, '/upload/properties/28268404802141952.png', '2023-05-24 06:37:06', '2023-05-24 06:37:06'),
(16, 6, '/upload/properties/28268404802282257.png', '2023-05-24 06:37:06', '2023-05-24 06:37:06'),
(17, 6, '/upload/properties/28268404802419106.png', '2023-05-24 06:37:06', '2023-05-24 06:37:06'),
(18, 6, '/upload/properties/28268404802562307.png', '2023-05-24 06:37:06', '2023-05-24 06:37:06'),
(19, 3, '/upload/properties/28268517083454496.png', '2023-05-24 08:28:39', '2023-05-24 08:28:39'),
(20, 3, '/upload/properties/28268517083611361.png', '2023-05-24 08:28:39', '2023-05-24 08:28:39'),
(21, 3, '/upload/properties/28268517083774930.png', '2023-05-24 08:28:39', '2023-05-24 08:28:39'),
(22, 4, '/upload/properties/28268517495543232.png', '2023-05-24 08:29:03', '2023-05-24 08:29:03'),
(23, 4, '/upload/properties/28268517495665057.png', '2023-05-24 08:29:03', '2023-05-24 08:29:03'),
(24, 4, '/upload/properties/28268517495781618.png', '2023-05-24 08:29:03', '2023-05-24 08:29:03'),
(25, 4, '/upload/properties/28268517495933107.png', '2023-05-24 08:29:03', '2023-05-24 08:29:03'),
(28, 7, '/upload/properties/28278589787460608.png', '2023-05-31 07:14:59', '2023-05-31 07:14:59'),
(29, 7, '/upload/properties/28278589787587697.png', '2023-05-31 07:14:59', '2023-05-31 07:14:59'),
(30, 7, '/upload/properties/28278589787687730.png', '2023-05-31 07:14:59', '2023-05-31 07:14:59'),
(34, 9, '/upload/properties/28369767096724512.png', '2023-08-02 04:51:30', '2023-08-02 04:51:30'),
(35, 9, '/upload/properties/28369767096923185.png', '2023-08-02 04:51:30', '2023-08-02 04:51:30'),
(36, 9, '/upload/properties/28369767097213378.png', '2023-08-02 04:51:30', '2023-08-02 04:51:30'),
(37, 10, '/upload/properties/28369770445208432.png', '2023-08-02 04:54:49', '2023-08-02 04:54:49'),
(38, 10, '/upload/properties/28369770445365217.png', '2023-08-02 04:54:49', '2023-08-02 04:54:49'),
(39, 10, '/upload/properties/28369770445527474.png', '2023-08-02 04:54:49', '2023-08-02 04:54:49'),
(40, 11, '/upload/properties/28369781940653008.png', '2023-08-02 05:06:14', '2023-08-02 05:06:14'),
(41, 11, '/upload/properties/28369781940766849.png', '2023-08-02 05:06:14', '2023-08-02 05:06:14'),
(42, 11, '/upload/properties/28369781940901698.png', '2023-08-02 05:06:14', '2023-08-02 05:06:14'),
(43, 12, '/upload/properties/28369881370093696.png', '2023-08-02 06:45:01', '2023-08-02 06:45:01'),
(44, 12, '/upload/properties/28369881370251169.png', '2023-08-02 06:45:01', '2023-08-02 06:45:01');

-- --------------------------------------------------------

--
-- Table structure for table `property_solds`
--

CREATE TABLE `property_solds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lister_id` bigint(20) DEFAULT NULL,
  `buyer_id` bigint(20) DEFAULT NULL,
  `offer_id` bigint(20) DEFAULT NULL,
  `property_id` bigint(20) DEFAULT NULL,
  `buying_price` decimal(16,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_solds`
--

INSERT INTO `property_solds` (`id`, `lister_id`, `buyer_id`, `offer_id`, `property_id`, `buying_price`, `created_at`, `updated_at`) VALUES
(5, 2, 2, 31, 6, 435.00, '2023-07-11 09:04:35', '2023-07-11 09:04:35');

-- --------------------------------------------------------

--
-- Table structure for table `saved_deals`
--

CREATE TABLE `saved_deals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `saved_deals`
--

INSERT INTO `saved_deals` (`id`, `member_id`, `property_id`, `created_at`, `updated_at`) VALUES
(71, 1, 6, '2023-05-30 02:58:33', '2023-05-30 02:58:33'),
(72, 1, 3, '2023-05-30 03:02:51', '2023-05-30 03:02:51'),
(73, 5, 6, '2023-05-30 10:03:57', '2023-05-30 10:03:57'),
(75, 6, 3, '2023-06-02 08:54:33', '2023-06-02 08:54:33'),
(79, 1, 7, '2023-06-05 07:23:09', '2023-06-05 07:23:09'),
(83, 6, 6, '2023-06-15 10:37:46', '2023-06-15 10:37:46'),
(86, 2, 6, '2023-07-04 03:38:30', '2023-07-04 03:38:30');

-- --------------------------------------------------------

--
-- Table structure for table `showings`
--

CREATE TABLE `showings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `lister_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = pending, 1 = active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `showings`
--

INSERT INTO `showings` (`id`, `buyer_id`, `lister_id`, `property_id`, `date`, `time`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 7, '2023-06-22', '1:30 pm', 1, '2023-06-20 09:54:06', '2023-07-04 07:01:13'),
(2, 2, 2, 7, '2023-06-23', '1:00 pm', 1, '2023-06-20 10:02:23', '2023-07-07 11:09:06'),
(3, 2, 2, 7, '2023-06-22', '1:30 pm', 1, '2023-06-20 10:08:01', '2023-07-11 08:05:02'),
(4, 2, 2, 7, '2023-06-22', '1:00 pm', 0, '2023-06-20 10:08:54', '2023-06-20 10:08:54'),
(5, 2, 2, 7, '2023-06-23', '12:30 pm', 0, '2023-06-20 10:10:54', '2023-06-20 10:10:54'),
(6, 2, 2, 6, '2023-06-28', '11:30 am', 0, '2023-06-22 10:10:43', '2023-06-22 10:10:43'),
(7, 2, 2, 7, '2023-06-24', '12:30 pm', 0, '2023-06-22 11:45:06', '2023-06-22 11:45:06'),
(8, 1, 2, 7, '2023-07-10', '8:30 am', 1, '2023-07-04 08:04:44', '2023-07-07 09:43:20'),
(9, 2, 2, 6, '2023-07-11', '1:00 pm', 0, '2023-07-07 11:07:21', '2023-07-07 11:07:21'),
(10, 2, 2, 7, '2023-07-13', '1:00 pm', 0, '2023-07-11 06:32:08', '2023-07-11 06:32:08'),
(11, 2, 2, 7, '2023-07-13', '4:00 pm', 0, '2023-07-11 06:36:02', '2023-07-11 06:36:02'),
(12, 3, 2, 4, '2023-07-19', '12:00 pm', 0, '2023-07-18 10:47:22', '2023-07-18 10:47:22'),
(13, 3, 2, 4, '2023-07-19', '12:00 pm', 0, '2023-07-18 10:48:01', '2023-07-18 10:48:01'),
(14, 3, 2, 7, '2023-07-19', '2:30 pm', 0, '2023-07-18 10:49:23', '2023-07-18 10:49:23'),
(15, 3, 2, 7, '2023-07-19', '1:30 pm', 0, '2023-07-18 10:51:05', '2023-07-18 10:51:05'),
(16, 3, 2, 7, '2023-07-27', '3:00 pm', 0, '2023-07-18 10:53:10', '2023-07-18 10:53:10'),
(17, 3, 2, 7, '2023-07-20', '12:00 pm', 0, '2023-07-19 03:03:50', '2023-07-19 03:03:50'),
(18, 3, 2, 7, '2023-07-20', '12:00 pm', 0, '2023-07-19 03:04:56', '2023-07-19 03:04:56'),
(19, 3, 2, 7, '2023-07-20', '12:00 pm', 0, '2023-07-19 03:25:16', '2023-07-19 03:25:16'),
(20, 3, 2, 7, '2023-07-26', '2:00 pm', 0, '2023-07-19 04:37:01', '2023-07-19 04:37:01'),
(21, 3, 2, 7, '2023-07-22', '5:00 pm', 1, '2023-07-19 05:25:23', '2023-07-19 09:43:46'),
(22, 3, 2, 7, '2023-07-27', '11:30 am', 0, '2023-07-19 06:42:18', '2023-07-19 06:42:18'),
(23, 2, 2, 7, '2023-07-27', '4:30 pm', 0, '2023-07-19 09:47:04', '2023-07-19 09:47:04'),
(24, 2, 2, 7, '2023-07-27', '5:00 pm', 0, '2023-07-19 11:12:57', '2023-07-19 11:12:57'),
(25, 2, 2, 7, '2023-07-21', '4:00 pm', 0, '2023-07-20 07:49:04', '2023-07-20 07:49:04'),
(26, 3, 2, 7, '2023-07-24', '2:00 pm', 0, '2023-07-21 08:48:14', '2023-07-21 08:48:14'),
(27, 2, 2, 7, '2023-07-27', '4:00 pm', 0, '2023-07-24 10:22:34', '2023-07-24 10:22:34'),
(28, 2, 2, 7, '2023-07-27', '4:00 pm', 0, '2023-07-24 10:23:01', '2023-07-24 10:23:01'),
(29, 3, 2, 7, '2023-07-27', '4:00 pm', 0, '2023-07-24 10:31:20', '2023-07-24 10:31:20'),
(30, 3, 2, 7, '2023-07-26', '4:30 pm', 0, '2023-07-24 10:33:33', '2023-07-24 10:33:33'),
(31, 2, 2, 7, '2023-07-27', '3:30 pm', 0, '2023-07-25 04:58:35', '2023-07-25 04:58:35'),
(32, 2, 2, 7, '2023-07-27', '4:00 pm', 0, '2023-07-25 09:40:35', '2023-07-25 09:40:35'),
(33, 2, 2, 7, '2023-07-28', '3:30 pm', 0, '2023-07-25 10:40:40', '2023-07-25 10:40:40'),
(34, 3, 2, 7, '2023-07-28', '5:00 pm', 1, '2023-07-25 11:03:35', '2023-07-26 05:22:03'),
(35, 3, 2, 7, '2023-07-28', '5:00 pm', 0, '2023-07-26 05:39:11', '2023-07-26 05:39:11'),
(36, 3, 2, 7, '2023-07-28', '5:00 pm', 0, '2023-07-26 05:40:20', '2023-07-26 05:40:20'),
(37, 3, 2, 7, '2023-07-28', '5:00 pm', 1, '2023-07-26 05:40:45', '2023-07-26 05:51:48'),
(38, 3, 2, 7, '2023-08-08', '4:30 pm', 0, '2023-07-31 10:20:44', '2023-07-31 10:20:44'),
(39, 3, 2, 7, '2023-08-08', '4:30 pm', 0, '2023-07-31 10:22:39', '2023-07-31 10:22:39'),
(40, 3, 2, 7, '2023-08-08', '4:30 pm', 0, '2023-07-31 10:23:45', '2023-07-31 10:23:45'),
(41, 3, 2, 7, '2023-08-08', '4:30 pm', 0, '2023-07-31 10:24:09', '2023-07-31 10:24:09'),
(42, 3, 2, 7, '2023-08-08', '4:30 pm', 0, '2023-07-31 10:28:31', '2023-07-31 10:28:31'),
(43, 3, 2, 7, '2023-08-08', '4:30 pm', 0, '2023-07-31 10:30:54', '2023-07-31 10:30:54'),
(44, 3, 2, 7, '2023-08-08', '4:30 pm', 0, '2023-07-31 10:34:45', '2023-07-31 10:34:45'),
(45, 2, 2, 11, '2023-08-17', '4:00 pm', 0, '2023-08-02 05:48:58', '2023-08-02 05:48:58'),
(46, 2, 2, 11, '2023-08-17', '4:00 pm', 0, '2023-08-02 05:50:11', '2023-08-02 05:50:11'),
(47, 2, 2, 11, '2023-08-18', '4:30 pm', 0, '2023-08-02 06:39:20', '2023-08-02 06:39:20'),
(48, 9, 2, 12, '2023-08-16', '4:30 pm', 0, '2023-08-07 04:49:09', '2023-08-07 04:49:09');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `subscription_start_date` date DEFAULT NULL,
  `subscription_expire_date` date DEFAULT NULL,
  `billing_name` varchar(255) DEFAULT NULL,
  `billing_email` varchar(255) DEFAULT NULL,
  `billing_address` varchar(255) DEFAULT NULL,
  `billing_state` varchar(255) DEFAULT NULL,
  `billing_city` varchar(255) DEFAULT NULL,
  `billing_zipcode` varchar(255) DEFAULT NULL,
  `auto_renew` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = no, 1 = yes',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = InActive, 1 = Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `member_id`, `package_id`, `subscription_start_date`, `subscription_expire_date`, `billing_name`, `billing_email`, `billing_address`, `billing_state`, `billing_city`, `billing_zipcode`, `auto_renew`, `status`, `created_at`, `updated_at`) VALUES
(3, 2, 1, '2023-06-08', '2023-07-08', 'Dealer', 'dealer@mail.com', 'asd', 'asd', 'asd', 'asd', 0, 1, '2023-06-08 08:12:44', '2023-06-08 08:12:44'),
(4, 3, 1, '2023-06-08', '2023-07-08', 'New User', 'new@mail.com', 'asd', 'asd', 'asd', 'F123456', 0, 1, '2023-06-08 09:36:45', '2023-06-08 09:36:45'),
(5, 5, 1, '2023-07-26', '2023-08-26', 'John Doe', 'john@mail.com', 'asd', 'asd', 'asd', '123', 0, 1, '2023-07-26 07:05:34', '2023-07-26 07:05:34');

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
(1, 'admin', 'admin@mail.com', NULL, '$2y$10$BRKbzlCGgJJO./1HXn41uOM0uBLwIkebFei9eMinpqZTbBT.2DAwe', NULL, '2023-05-19 10:06:50', '2023-05-19 10:06:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ch_favorites`
--
ALTER TABLE `ch_favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ch_messages`
--
ALTER TABLE `ch_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `j_v_partners`
--
ALTER TABLE `j_v_partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `members_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_permissions`
--
ALTER TABLE `notification_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer_documents`
--
ALTER TABLE `offer_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
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
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties_images`
--
ALTER TABLE `properties_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_solds`
--
ALTER TABLE `property_solds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saved_deals`
--
ALTER TABLE `saved_deals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `showings`
--
ALTER TABLE `showings`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `j_v_partners`
--
ALTER TABLE `j_v_partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `notification_permissions`
--
ALTER TABLE `notification_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `offer_documents`
--
ALTER TABLE `offer_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `properties_images`
--
ALTER TABLE `properties_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `property_solds`
--
ALTER TABLE `property_solds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `saved_deals`
--
ALTER TABLE `saved_deals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `showings`
--
ALTER TABLE `showings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
