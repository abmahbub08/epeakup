-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 24, 2019 at 06:35 PM
-- Server version: 10.2.23-MariaDB-log-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epeakupc_softepeakup`
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
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'joe', 'joe@joe.com', '$2y$10$1N3nwybXu2HyXTffwiIEfO0IpLUZBJFLcyRP1jRLZ.1A/dPqVjEu2', 1, 'XpMz2SmhbUNAxLwoXjF1oTduYKBcZfBkNSLnFrPpMIyNLkk4iSgMdkuZBnmw', '2019-05-07 12:53:45', '2019-05-08 09:29:15'),
(6, 'Sazzad Haque', 'doe@doe.com', '$2y$10$nxbC.DZ/dgabhvdTCVzi2OGWkY21CuNVFYjmAMhjNxCBD8/HyevNC', 1, NULL, '2019-05-07 19:25:07', '2019-05-31 12:24:57'),
(8, 'baby', 'baby@baby.com', '$2y$10$03R0OSYsoVtUCAFNZP2BVuXSeOjsB/dbh70swJ.HpAcwQwbb8oew2', 1, NULL, '2019-05-31 05:51:26', '2019-05-31 05:52:00'),
(9, 'Sunny', 'bkash955@gmail.com', '$2y$10$UDU0Pov1dM8Wf4y7UknGI.alAWW0Vw69dfPbmG2XTUWeUc9XA1R6G', 1, 'UxJYV6TEmpIIs4z6D3wbOCxT1PBJ3XTwrtPysq3AVObMipTsaDCmCfK0mgGC', '2019-06-15 11:43:04', '2019-06-15 11:43:46'),
(10, 'Admin 1', 'ep.min01@gmail.com', '$2y$10$KIN1TL2lInvN6HhLUklCDOtR.gF1Zd2GVYFcatDPNhxZ6yaiJtMWe', 1, NULL, '2019-06-16 21:51:45', '2019-06-16 21:52:30'),
(11, 'Admin2', 'ep.min02@gmail.com', '$2y$10$Ed4N6dnVWfoyMYwEgGMft.tWs7PWyFKWyYEPt5Kc9SGvWVVtoHMxO', 1, 'bIXPQDtk9P1AojBCxIn3YWpPlrUORA6mCTSJACNvBMnrjzYaXECOxP3YT1f8', '2019-06-16 21:53:17', '2019-06-16 21:53:32'),
(12, 'Admin3', 'ep.min03@gmail.com', '$2y$10$Qx3YUVkW1iLCjHwA27979ub8HCc8tAT7ZBPzcZqEAHMgdInfbT/vG', 1, NULL, '2019-06-16 21:54:10', '2019-06-16 21:54:25');

-- --------------------------------------------------------

--
-- Table structure for table `admin_role`
--

CREATE TABLE `admin_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_role`
--

INSERT INTO `admin_role` (`id`, `role_id`, `admin_id`) VALUES
(2, 1, 2),
(6, 2, 6),
(8, 2, 8),
(9, 2, 9),
(10, 1, 9),
(11, 6, 10),
(12, 6, 11),
(13, 6, 12);

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idcard` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `first_name`, `last_name`, `phone`, `email`, `email_verified_at`, `password`, `address`, `city`, `state`, `zipcode`, `country_id`, `active`, `gender`, `date_of_birth`, `avatar`, `idcard`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 'Soft', 'Threat', '01234567890', 'softthreat@gmail.com', NULL, '$2y$10$eV0yVANUd/ZbQOC7NIhch.fkA0NIKaHOaYs9nejccDYCET1aEc2JW', 'Savar', 'Dhaka', 'Dhaka', '1234', 1, 1, NULL, NULL, 'avatar.png', NULL, NULL, '2019-07-21 21:05:20', '2019-07-21 21:06:57'),
(9, 'Sunny', 'Siddiqui', '01677273025', 'bkash955@gmail.com', NULL, '$2y$10$jKUAl7AWi2ROycwvcbykUe1Ty7OO6cUWG6mjf3fPwi0so.bWfH/lS', '235/241', 'Khulna', 'NSW', '4046', 2, 1, NULL, NULL, 'avatar.png', NULL, NULL, '2019-07-22 12:00:02', '2019-07-22 12:01:13'),
(10, 'Sunny', 'Siddiqui', '1677273025', 'sunnyepeakup@gmail.com', NULL, '$2y$10$hJXxjAYV4Wuu.gs3ezeHX.5bRAg6OnXt0KOgRr41mKXnARImyZB.K', '235/241', 'Khulna', 'NSW', '4046', 2, 0, NULL, NULL, 'avatar.png', NULL, NULL, '2019-07-22 12:22:59', '2019-07-22 12:22:59');

-- --------------------------------------------------------

--
-- Table structure for table `balances`
--

CREATE TABLE `balances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` int(11) NOT NULL,
  `balance` decimal(8,2) NOT NULL DEFAULT 0.00,
  `total_balance` decimal(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `balances`
--

INSERT INTO `balances` (`id`, `agent_id`, `balance`, `total_balance`, `created_at`, `updated_at`) VALUES
(7, 8, '9900.00', '10000.00', '2019-07-21 21:05:20', '2019-07-22 05:41:17'),
(8, 9, '1900.00', '2000.00', '2019-07-22 12:00:02', '2019-07-22 12:08:33'),
(9, 10, '0.00', '0.00', '2019-07-22 12:22:59', '2019-07-22 12:22:59');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city`, `state_id`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 1, '2019-05-04 18:00:00', '2019-05-04 18:00:00'),
(2, 'Gazipur', 1, '2019-05-04 18:00:00', '2019-05-04 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` int(11) NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `agent_id`, `first_name`, `last_name`, `address`, `state`, `phone`, `email`, `nid`, `created_at`, `updated_at`) VALUES
(4, 8, 'Mahir', 'Sarkar', 'Dhaka', 'Dhaka', '+61188181889', 'mahir@gmail.com', '1563772299.jpeg', '2019-07-21 21:09:52', '2019-07-21 21:11:39'),
(5, 8, 'ikz', 'dhaka', 'Suit 04, 228 Chapel Road,Bankstown NSW-2200', 'australia', '+61017399724', 'softthreat@gmail.com', '1563802526.png', '2019-07-22 05:35:26', '2019-07-22 05:35:26'),
(6, 9, 'John', 'Ali', '235/241', 'NSW', '+61406070844', 'bkash955@gmail.com', '1563825921.png', '2019-07-22 12:05:21', '2019-07-22 12:05:21');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Bangladesh', '2019-05-17 09:53:25', '2019-05-17 09:53:25');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` int(11) NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `country_id`, `currency`, `short_name`, `rate`, `created_at`, `updated_at`) VALUES
(1, 1, 'Taka', 'BDT', '58.00', '2019-05-18 03:44:26', '2019-06-30 11:49:51');

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`id`, `user_id`, `name`, `email`, `subject`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Null', 'null@epeakup.com', 'Null', 'Null', 0, '2019-06-04 09:17:30', '2019-06-04 09:17:30'),
(5, NULL, 'Eric', 'eric@talkwithcustomer.com', 'It’s all about Perfect Timing', 'Hello epeakup.com,\r\n\r\nPeople ask, “why does TalkWithCustomer work so well?”\r\n\r\nIt’s simple.\r\n\r\nTalkWithCustomer enables you to connect with a prospective customer at EXACTLY the Perfect Time.\r\n\r\n- NOT one week, two weeks, three weeks after they’ve checked out your website epeakup.com.\r\n- NOT with a form letter style email that looks like it was written by a bot.\r\n- NOT with a robocall that could come at any time out of the blue.\r\n\r\nTalkWithCustomer connects you to that person within seconds of THEM asking to hear from YOU.\r\n\r\nThey kick off the conversation.\r\n\r\nThey take that first step.\r\n\r\nThey ask to hear from you regarding what you have to offer and how it can make their life better. \r\n\r\nAnd it happens almost immediately. In real time. While they’re still looking over your website epeakup.com, trying to make up their mind whether you are right for them.\r\n\r\nWhen you connect with them at that very moment it’s the ultimate in Perfect Timing – as one famous marketer put it, “you’re entering the conversation already going on in their mind.”\r\n\r\nYou can’t find a better opportunity than that.\r\n\r\nAnd you can’t find an easier way to seize that chance than TalkWithCustomer. \r\n\r\nCLICK HERE http://www.talkwithcustomer.com now to take a free, 14-day test drive and see what a difference “Perfect Timing” can make to your business.\r\n\r\nSincerely,\r\nEric\r\n\r\nPS:  If you’re wondering whether NOW is the perfect time to try TalkWithCustomer, ask yourself this:\r\n“Will doing what I’m already doing now produce up to 100X more leads?”\r\nBecause those are the kinds of results we know TalkWithCustomer can deliver.  \r\nIt shouldn’t even be a question, especially since it will cost you ZERO to give it a try. \r\nCLICK HERE http://www.talkwithcustomer.com to start your free 14-day test drive today.\r\n\r\nIf you\'d like to unsubscribe click here http://liveserveronline.com/talkwithcustomer.aspx?d=epeakup.com', 0, '2019-07-02 05:12:24', '2019-07-02 05:12:24'),
(6, NULL, 'Aly Chiman', 'aly1@alychidesigns.com', 'Broken Links Update', 'Hello there, My name is Aly and I would like to know if you would have any interest to have your website here at epeakup.com  promoted as a resource on our blog alychidesign.com ?\r\n\r\n We are  updating our do-follow broken link resources to include current and up to date resources for our readers. If you may be interested in being included as a resource on our blog, please let me know.\r\n\r\n Thanks, Aly', 0, '2019-07-10 06:48:27', '2019-07-10 06:48:27');

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
(22, '2014_10_12_000000_create_users_table', 1),
(23, '2014_10_12_100000_create_password_resets_table', 1),
(24, '2019_04_19_112504_create_countries_table', 1),
(25, '2019_04_19_112925_create_states_table', 1),
(26, '2019_04_19_113527_create_cities_table', 1),
(27, '2019_04_25_144333_create_services_table', 1),
(28, '2019_04_25_145800_create_payment_networks_table', 1),
(29, '2019_04_28_131246_create_recipients_table', 1),
(30, '2019_04_28_131412_create_currencies_table', 1),
(31, '2019_05_04_140010_create_orders_table', 1),
(32, '2019_05_04_204747_create_reasons_table', 1),
(33, '2017_03_06_023521_create_admins_table', 2),
(34, '2017_03_06_053834_create_admin_role_table', 2),
(35, '2018_03_06_023523_create_roles_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `money_requests`
--

CREATE TABLE `money_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` int(11) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `money_requests`
--

INSERT INTO `money_requests` (`id`, `agent_id`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(13, 8, '10000.00', 1, '2019-07-22 05:39:21', '2019-07-22 05:40:34'),
(15, 9, '2000.00', 1, '2019-07-22 12:07:50', '2019-07-22 12:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orderId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `charge_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receipt_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recipient_id` int(11) DEFAULT NULL,
  `reason_id` int(11) DEFAULT NULL,
  `service_id` int(11) NOT NULL,
  `payment_network_id` int(11) NOT NULL,
  `agent_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` int(11) DEFAULT 1,
  `amount` decimal(8,2) NOT NULL,
  `totalpay` decimal(8,2) DEFAULT NULL,
  `recipient_amount` decimal(8,2) DEFAULT NULL,
  `confirmation` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderId`, `country_id`, `user_id`, `charge_id`, `receipt_url`, `recipient_id`, `reason_id`, `service_id`, `payment_network_id`, `agent_type`, `status_id`, `amount`, `totalpay`, `recipient_amount`, `confirmation`, `created_at`, `updated_at`) VALUES
(85, 'OD1560873555', 1, 25, 'PAYID-LUEQSMY9Y162254EW7370157', NULL, 99, 1, 1, 1, 'Personal', 2, '52.00', '56.50', '3003.00', 0, '2019-06-18 07:59:15', '2019-06-18 08:05:06'),
(99, 'OD1561253000', 1, 29, 'PAYID-LUHNH5I8T800599GA420525E', NULL, 113, 1, 1, 1, 'Personal', 2, '25.00', '29.50', '1450.00', 0, '2019-06-22 17:23:20', '2019-06-22 19:36:13'),
(100, 'OD1561260443', 1, 36, 'PAYID-LUHPC4I5LF97186A84747620', NULL, 114, 1, 1, 1, 'Personal', 2, '200.00', '204.50', '11600.00', 0, '2019-06-22 19:27:23', '2019-06-22 19:34:10'),
(101, 'OD1561264258', 1, 29, 'PAYID-LUHP74I5XH6921191623304K', NULL, 115, 1, 1, 1, 'Personal', 2, '18.50', '23.00', '1073.00', 0, '2019-06-22 20:30:58', '2019-06-22 20:59:22'),
(102, 'OD1561287839', 1, 38, 'PAYID-LUHVXWA9Y4248914R564445T', NULL, 116, 1, 2, 4, NULL, 2, '18.00', '20.00', '1044.00', 0, '2019-06-23 03:03:59', '2019-06-23 03:15:53'),
(103, 'OD1561294372', 1, 38, 'PAYID-LUHXKKI7N654620VR6878146', NULL, 117, 1, 2, 4, NULL, 2, '18.00', '20.00', '1044.00', 0, '2019-06-23 04:52:52', '2019-06-23 04:58:06'),
(104, 'OD1561342444', 1, 34, 'PAYID-LUIDDIY55402589SB392371T', NULL, 118, 1, 1, 1, 'Personal', 2, '200.00', '204.50', '11600.00', 0, '2019-06-23 18:14:04', '2019-06-23 18:17:48'),
(105, 'OD1561463859', 1, 46, 'PAYID-LUJAXRA58E09262MA506242R', NULL, 119, 1, 2, 7, NULL, 2, '48.00', '50.00', '2796.00', 0, '2019-06-25 03:57:39', '2019-06-25 04:12:03'),
(106, 'OD1561468851', 1, 43, 'PAYID-LUJB5UY4RN93461RK6852055', NULL, 120, 1, 2, 7, NULL, 2, '1.00', '3.00', '58.25', 0, '2019-06-25 05:20:51', '2019-06-25 09:12:34'),
(107, 'OD1561475378', 1, 46, 'PAYID-LUJDREQ6L348528SN922273P', NULL, 121, 1, 1, 1, 'Personal', 2, '1.00', '5.50', '58.25', 0, '2019-06-25 07:09:38', '2019-06-25 07:24:31'),
(108, 'OD1561567200', 1, 44, 'ch_1EpeA7CPcZXHwm6ITxLvQ9I4', 'https://pay.stripe.com/receipts/acct_1EZJccCPcZXHwm6I/ch_1EpeA7CPcZXHwm6ITxLvQ9I4/rcpt_FKIljpnrTjWyqnzUvKxXzN3LJQ6d6Q6', 122, 2, 1, 1, 'Personal', 2, '1.00', '5.50', '58.50', 0, '2019-06-26 08:40:00', '2019-06-26 08:49:28'),
(109, 'OD1561740591', 1, 49, 'PAYID-LULEKEI99J19593YF8339944', NULL, 123, 1, 2, 4, NULL, 2, '10.00', '12.00', '585.00', 0, '2019-06-28 08:49:51', '2019-06-28 08:59:07'),
(110, 'OD1561745704', 1, 50, 'PAYID-LULFQUA2ET73969306638033', NULL, 124, 2, 1, 1, 'Personal', 2, '85.50', '90.00', '5001.75', 0, '2019-06-28 10:15:04', '2019-06-28 10:20:08'),
(111, 'OD1562055413', 1, 57, 'PAYID-LUNRA2A6KX35845J47928203', NULL, 125, 1, 2, 4, NULL, 2, '8.00', '10.00', '464.00', 0, '2019-07-02 00:16:53', '2019-07-02 00:44:08'),
(112, 'OD1562078395', 1, 58, 'PAYID-LUNWYEA7MR48868LU231644T', NULL, 126, 1, 1, 1, 'Personal', 2, '95.50', '100.00', '5539.00', 0, '2019-07-02 06:39:55', '2019-07-02 06:43:16'),
(113, 'OD1562224981', 1, 57, 'PAYID-LUO2Q3I5Y875988HX388994L', NULL, 127, 1, 1, 1, 'Agent', 2, '195.50', '200.00', '11339.00', 0, '2019-07-03 23:23:01', '2019-07-03 23:36:25'),
(114, 'OD1562258995', 1, 44, 'ch_1EsY86CPcZXHwm6IEzoANdID', 'https://pay.stripe.com/receipts/acct_1EZJccCPcZXHwm6I/ch_1EsY86CPcZXHwm6IEzoANdID/rcpt_FNIjsE6ZOBQEbzKIlWKU4yKwsO4Tecp', 128, 1, 1, 1, 'Personal', 2, '12.00', '16.50', '696.00', 0, '2019-07-04 08:49:55', '2019-07-04 08:57:10'),
(115, 'OD1562394218', 1, 35, 'PAYID-LUQD4MQ8WM69222V78764018', NULL, 129, 1, 2, 8, NULL, 2, '8.00', '10.00', '464.00', 0, '2019-07-05 22:23:38', '2019-07-05 22:27:59'),
(116, 'OD1562394762', 1, 35, 'PAYID-LUQEA7I7VJ93231SG553801X', NULL, 130, 1, 2, 8, NULL, 2, '8.00', '10.00', '464.00', 0, '2019-07-05 22:32:42', '2019-07-05 22:35:04'),
(117, 'OD1562395027', 1, 35, 'PAYID-LUQEDBQ9WC63555912222454', NULL, 131, 1, 2, 5, NULL, 2, '8.00', '10.00', '464.00', 0, '2019-07-05 22:37:07', '2019-07-05 22:39:58'),
(118, 'OD1562395335', 1, 35, 'PAYID-LUQEFII5PL90200WB6348444', NULL, 132, 1, 2, 8, NULL, 2, '8.00', '10.00', '464.00', 0, '2019-07-05 22:42:15', '2019-07-05 22:44:59'),
(119, 'OD1562747958', 1, 53, 'PAYID-LUS2G5I4V964673144501426', NULL, 133, 1, 1, 1, 'Personal', 2, '40.00', '44.50', '2320.00', 0, '2019-07-10 00:39:18', '2019-07-10 00:43:11'),
(120, 'OD1563183160', 1, 58, 'PAYID-LUWEPQY9FG19755E5744894D', NULL, 134, 1, 1, 1, 'Personal', 2, '95.50', '100.00', '5539.00', 0, '2019-07-15 01:32:40', '2019-07-15 01:35:22'),
(121, 'OD1563254685', 1, 35, 'PAYID-LUWV7BA80A70009078655323', NULL, 135, 1, 1, 1, 'Personal', 2, '95.00', '99.50', '5510.00', 0, '2019-07-15 21:24:45', '2019-07-15 22:19:28'),
(122, 'OD1563445187', 1, 57, 'PAYID-LUYEN3I8EF21897B03181034', NULL, 136, 1, 1, 1, 'Personal', 2, '9.50', '14.00', '551.00', 0, '2019-07-18 02:19:47', '2019-07-18 02:28:11'),
(123, 'OD1563447818', 1, 59, 'PAYID-LUYFD5Q5NG21344VB930222X', NULL, 137, 1, 1, 1, 'Personal', 2, '150.00', '154.50', '8700.00', 0, '2019-07-18 03:03:38', '2019-07-18 03:05:50'),
(124, 'OD1563542869', 1, 59, 'PAYID-LUY4KQY1XV50719FC563103S', NULL, 138, 1, 1, 1, 'Personal', 2, '140.00', '144.50', '8120.00', 0, '2019-07-19 05:27:49', '2019-07-19 05:30:59'),
(125, 'OD1563738036', 1, 57, 'PAYID-LU2L6PQ3N8243153C339045G', NULL, 139, 1, 2, 4, NULL, 2, '6.00', '8.00', '348.00', 0, '2019-07-21 11:40:36', '2019-07-21 11:42:22'),
(126, 'OD1563780966', 1, 58, 'PAYID-LU2WOBI21E55324AM728653T', NULL, 140, 1, 1, 1, 'Personal', 2, '120.00', '124.50', '6960.00', 0, '2019-07-21 23:36:06', '2019-07-21 23:36:06');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('sunny.epeakup@gmail.com', '$2y$10$UnSbTxUoMbYCJmWUcmvLI.z3IFJxR.TDoMcyH3Psm3GY7/eVRTraa', '2019-06-13 03:07:49'),
('webszionline.solution@gmail.com', '$2y$10$1Yw0uXA6bzNl/4ja9PlaDuIUPiwZUj9nFBpwtKFm9x/zRS9YO7LJa', '2019-06-13 03:08:09'),
('sazzadsobuj@yahoo.com', '$2y$10$YJ5cFkB08qZlEVYBftHKoeAj23h4Olp1lQdTOBd.qmG2WyAQwgQha', '2019-06-23 07:26:16'),
('mahir@gmail.com', '$2y$10$oIJFTfI.IowpY1TNWmSi2OodmB9vF9hhojCnRnPQ/awcooN2HnCde', '2019-07-10 10:09:49');

-- --------------------------------------------------------

--
-- Table structure for table `payment_method_discounts`
--

CREATE TABLE `payment_method_discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_method_discounts`
--

INSERT INTO `payment_method_discounts` (`id`, `payment_method`, `discount`, `created_at`, `updated_at`) VALUES
(1, 'POLi', '50.00', '2019-06-15 13:30:04', '2019-06-15 19:30:33'),
(2, 'Poli', '60.00', '2019-06-15 13:58:13', '2019-06-15 14:07:21');

-- --------------------------------------------------------

--
-- Table structure for table `payment_networks`
--

CREATE TABLE `payment_networks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_networks`
--

INSERT INTO `payment_networks` (`id`, `service_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'bKash', '2019-05-04 15:53:11', '2019-06-24 17:31:42'),
(2, 1, 'Rocket', '2019-05-04 15:54:02', '2019-06-24 17:32:12'),
(4, 2, 'Grmeenphone', '2019-05-16 18:00:00', '2019-06-24 17:32:24'),
(5, 2, 'Robi', '2019-05-16 18:00:00', '2019-06-24 17:31:53'),
(6, 2, 'Teletalk', '2019-05-17 12:32:04', '2019-06-24 17:31:28'),
(7, 2, 'Airtel', '2019-05-17 12:33:16', '2019-06-24 17:31:15'),
(8, 2, 'Banglalink', '2019-05-17 12:34:09', '2019-06-24 17:30:59');

-- --------------------------------------------------------

--
-- Table structure for table `reasons`
--

CREATE TABLE `reasons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reasons`
--

INSERT INTO `reasons` (`id`, `reason`, `created_at`, `updated_at`) VALUES
(1, 'Send to Family', '2019-05-05 09:27:04', '2019-05-05 09:27:04'),
(2, 'Pay for Services', '2019-05-05 09:27:52', '2019-05-05 09:27:52');

-- --------------------------------------------------------

--
-- Table structure for table `receivers`
--

CREATE TABLE `receivers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receivers`
--

INSERT INTO `receivers` (`id`, `agent_id`, `client_id`, `first_name`, `last_name`, `account_number`, `payment_method`, `account_type`, `created_at`, `updated_at`) VALUES
(3, 8, 4, 'Jordan', 'Jon', '01781818181', 'Robi Topup', NULL, '2019-07-21 21:10:29', '2019-07-21 21:18:17'),
(4, 8, 5, 'Ukl', 'Lkjh', '01739972425', 'bkash', 'Personal', '2019-07-22 05:38:24', '2019-07-22 05:38:24'),
(5, 9, 6, 'Sunny', 'Siddiqui', '01677273025', 'bkash', 'Agent', '2019-07-22 12:06:27', '2019-07-22 12:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `recipients`
--

CREATE TABLE `recipients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_branch` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_one` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_two` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recipients`
--

INSERT INTO `recipients` (`id`, `country_id`, `user_id`, `bank_name`, `bank_branch`, `account_number`, `first_name`, `last_name`, `address_one`, `address_two`, `city`, `postcode`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(19, 1, 1, NULL, NULL, '01781112233', 'Doe', 'Joe', NULL, NULL, 'California', NULL, '01781112233', 'doe@doe.com', '2019-05-08 08:04:11', '2019-05-08 08:04:11'),
(20, 1, 1, NULL, NULL, '01781112233', 'Jojo', 'Handi', NULL, NULL, 'Uganda', NULL, '01781112233', 'jojo@gamil.com', '2019-05-08 08:27:30', '2019-05-08 08:27:30'),
(21, 1, 1, NULL, NULL, '01781112233', 'Doe', 'Doe', NULL, NULL, 'California', NULL, '01781112233', 'doe@doe.com', '2019-05-13 08:42:34', '2019-05-13 08:42:34'),
(22, 1, 1, NULL, NULL, '01781112233', 'Joe', 'Doe', NULL, NULL, 'California', NULL, '01781112233', 'doe@doe.com', '2019-05-13 09:52:24', '2019-05-13 09:52:24'),
(23, 1, 1, NULL, NULL, '01781112233', 'Joe', 'Doe', NULL, NULL, 'California', NULL, '01781112233', 'doe@doe.com', '2019-05-14 01:08:31', '2019-05-14 01:08:31'),
(24, 1, 1, NULL, NULL, '01781112233', 'Doe', 'Doe', NULL, NULL, 'Calff', NULL, '01781112233', 'joe@joe.com', '2019-05-14 01:26:57', '2019-05-14 01:26:57'),
(25, 1, 1, NULL, NULL, '01781112233', 'Jony', 'Handi', NULL, NULL, 'California', NULL, '01781112233', 'jony@jony.com', '2019-05-14 02:36:20', '2019-05-14 02:36:20'),
(26, 1, 1, NULL, NULL, '01781112233', 'Joon', 'Handi', NULL, NULL, 'California', NULL, '01781112233', 'Joon@joon.com', '2019-05-14 03:19:52', '2019-05-14 03:19:52'),
(27, 1, 1, NULL, NULL, '01781112233', 'Joe', 'Doe', NULL, NULL, 'California', NULL, '01781112233', 'joyanto@gmail.com', '2019-05-14 03:31:14', '2019-05-14 03:31:14'),
(28, 1, 1, NULL, NULL, '01781112233', 'Doe', 'Doe', NULL, NULL, 'sdafasd', NULL, '01781112233', 'maya@gmail.com', '2019-05-14 05:31:02', '2019-05-14 05:31:02'),
(29, 1, 1, NULL, NULL, '01781112233', 'Doe', 'dsfasdf', NULL, NULL, 'Daiging', NULL, '01781112233', 'joyanta319@gmail.com', '2019-05-14 05:33:49', '2019-05-14 05:33:49'),
(30, 1, 1, NULL, NULL, '01781112233', 'Joon', 'Handi', NULL, NULL, 'Calff', NULL, '01781112233', 'joy@gmail.com', '2019-05-14 05:39:15', '2019-05-14 05:39:15'),
(31, 1, 1, NULL, NULL, '01781112233', 'Joe', 'Doe', NULL, NULL, 'California', NULL, '01781112233', 'maya@gmail.com', '2019-05-18 15:00:14', '2019-05-18 15:00:14'),
(32, 1, 1, NULL, NULL, '01781112233', 'Jolly', 'Llb', NULL, NULL, 'California', NULL, '01781112233', 'jolly@jolly.com', '2019-05-18 15:05:51', '2019-05-18 15:05:51'),
(33, 1, 1, NULL, NULL, '01781112233', 'baby', 'doll', NULL, NULL, 'California', NULL, '01781112233', 'baby@doll.d', '2019-05-18 15:09:49', '2019-05-18 15:09:49'),
(34, 1, 1, NULL, NULL, '01781112233', 'Joe', 'Doe', NULL, NULL, 'California', NULL, '01781112233', 'joe@joe.com', '2019-05-23 10:18:59', '2019-05-23 10:18:59'),
(35, 1, 1, NULL, NULL, '01781112233', 'Joe', 'Handi', NULL, NULL, 'California', NULL, '01781112233', 'joe@joe.com', '2019-05-23 12:14:56', '2019-05-23 12:14:56'),
(36, 1, 1, NULL, NULL, '01781112233', 'Joe', 'Doe', NULL, NULL, 'California', NULL, '01781112233', 'joe@joe.com', '2019-05-23 20:33:04', '2019-05-23 20:33:04'),
(37, 1, 1, NULL, NULL, '01781112233', 'Joe', 'Doe', NULL, NULL, 'California', NULL, '01781112233', 'joe@joe.com', '2019-05-23 20:42:51', '2019-05-23 20:42:51'),
(38, 1, 1, NULL, NULL, '01781112233', 'Joe', 'Doe', NULL, NULL, 'sdafasd', NULL, '01781112233', 'doe@doe.com', '2019-05-24 01:25:43', '2019-05-24 01:25:43'),
(39, 1, 1, NULL, NULL, '01781112233', 'Joe', 'Doe', NULL, NULL, 'California', NULL, '01781112233', 'joe@joe.com', '2019-05-24 01:39:28', '2019-05-24 01:39:28'),
(40, 1, 1, NULL, NULL, '01711223344', 'dfghjk', 'dfghkl', NULL, NULL, 'fghjkl', NULL, '01711223344', 'joe@joe.com', '2019-05-27 12:17:50', '2019-05-27 12:17:50'),
(41, 1, 1, NULL, NULL, '01711223344', 'dfghjk', 'sdfghj', NULL, NULL, 'fghjkl', NULL, '01711223344', 'joe@joe.com', '2019-05-28 01:50:34', '2019-05-28 01:50:34'),
(42, 1, 1, NULL, NULL, '+8801711223344', 'dfghjk', 'sdfghj', NULL, NULL, 'fghjkl', NULL, '+8801711223344', 'joyanta319@gmail.com', '2019-05-29 12:19:23', '2019-05-29 12:19:23'),
(43, 1, 1, NULL, NULL, '+8801711223344', 'dfghjk', 'sdfghj', NULL, NULL, 'fghjkl', NULL, '+8801711223344', 'joyanta319@gmail.com', '2019-05-29 13:51:54', '2019-05-29 13:51:54'),
(44, 1, 1, NULL, NULL, '+8801711223344', 'dfghjk', 'sdfghj', NULL, NULL, 'fghjkl', NULL, '+8801711223344', 'joyanta319@gmail.com', '2019-05-29 15:19:29', '2019-05-29 15:19:29'),
(45, 1, 1, NULL, NULL, '+8801711223344', 'dfghjk', 'sdfghj', NULL, NULL, 'fghjkl', NULL, '+8801711223344', 'joyanta319@gmail.com', '2019-05-29 15:39:05', '2019-05-29 15:39:05'),
(46, 1, 1, NULL, NULL, '+8801781976511', 'fdhsa', 'afsjdk', NULL, NULL, 'fdas', NULL, '+8801781449339', 'joe@joe.com', '2019-05-29 21:49:56', '2019-05-29 21:49:56'),
(47, 1, 1, NULL, NULL, '+8801781976511', 'fdhsa', 'afsjdk', NULL, NULL, 'fdas', NULL, '+8801781976511', 'joe@joe.com', '2019-05-29 21:59:33', '2019-05-29 21:59:33'),
(48, 1, 1, NULL, NULL, '+8801781449339', 'dfgh', 'fgffhjkl', NULL, NULL, 'dfghj', NULL, '+8801781449339', 'asg@ddfgghf', '2019-06-01 03:47:11', '2019-06-01 03:47:11'),
(49, 1, 1, NULL, NULL, '+8801781449339', 'dfgh', 'fgffhjkl', NULL, NULL, 'dfghj', NULL, '+8801781449339', 'asg@ddfgghf', '2019-06-01 03:50:26', '2019-06-01 03:50:26'),
(50, 1, 1, NULL, NULL, '+8801781449339', 'asdfgjk', 'asdfgjk', NULL, NULL, 'sdfgjk', NULL, '+8801781449339', 'joyanta319@gmail.com', '2019-06-02 11:40:07', '2019-06-02 11:40:07'),
(74, 1, 5, NULL, NULL, '+8801716719995', 'Sunny', 'Siddique', NULL, NULL, 'Khluna', NULL, '+8801912904450', 'sunny.epeakup@gmail.com', '2019-05-31 01:54:55', '2019-05-31 01:54:55'),
(75, 1, 1, NULL, NULL, '+8801781449339', 'joy', 'sarkar', NULL, NULL, 'dhaka', NULL, '+8801781449339', 'joyanta319@gmail.com', '2019-05-31 02:01:09', '2019-05-31 02:01:09'),
(76, 1, 3, NULL, NULL, '+8801700000000', 'Mr.', 'Imtiaz', NULL, NULL, 'Dhaka', NULL, '+8801739972425', 'czar.imtiaz@gmail.com', '2019-05-31 02:01:57', '2019-05-31 02:01:57'),
(77, 1, 3, NULL, NULL, '+8801739972425', 'Sunny', 'Siddique', NULL, NULL, 'Khulna', NULL, '+8801677273025', 'czar.imtiaz@gmail.com', '2019-05-31 02:05:38', '2019-05-31 02:05:38'),
(78, 1, 1, NULL, NULL, '+8801781449339', 'asdfhk', 'sdfgh', NULL, NULL, 'asdfgh', NULL, '+8801781449339', 'joe@joe.com', '2019-05-31 02:06:51', '2019-05-31 02:06:51'),
(79, 1, 5, NULL, NULL, '+8801716719995', 'Sunny', 'Siddique', NULL, NULL, 'Khluna', NULL, '+8801912904450', 'sunny.epeakup@gmail.com', '2019-05-31 02:53:21', '2019-05-31 02:53:21'),
(80, 1, 3, NULL, NULL, '+8801739972425', 'imtiaz', 'Khandoker', NULL, NULL, 'Sirajganj', NULL, '+8801912904450', 'hoquesazzadul@gmail.com', '2019-05-31 04:16:19', '2019-05-31 04:16:19'),
(81, 1, 3, NULL, NULL, '+8801739972425', 'Last', 'Imtiaz', NULL, NULL, 'Dhanmondi', NULL, '+8801739972425', 'czar.imtiaz@gmail.com', '2019-05-31 05:10:19', '2019-05-31 05:10:19'),
(82, 1, 8, NULL, NULL, '+8801703459502', 'riadul', 'islam', NULL, NULL, 'sirajgonj', NULL, '+8801703459502', 'riaduli06@gmail.com', '2019-05-31 09:27:38', '2019-05-31 09:27:38'),
(83, 1, 5, NULL, NULL, '+8801716719995', 'Sunny', 'Siddique', NULL, NULL, 'Khluna', NULL, '+8801912904450', 'sunny.epeakup@gmail.com', '2019-05-31 21:05:11', '2019-05-31 21:05:11'),
(84, 1, 1, NULL, NULL, '+8801781449339', 'ggggggf', 'asdfghjk', NULL, NULL, 'sdfghj', NULL, '+8801781449339', 'joyanta319@gmail.com', '2019-05-31 22:08:25', '2019-05-31 22:08:25'),
(85, 1, 1, NULL, NULL, '+8801739972425', 'Imtiaz', 'Khandakar', NULL, NULL, 'Sirazgang', NULL, '+8801739972425', 'softthreat@gmail.com', '2019-06-02 06:40:20', '2019-06-02 06:40:20'),
(86, 1, 1, NULL, NULL, '+8801781449339', 'asdfgjk', 'asdfgjk', NULL, NULL, 'sdfgjk', NULL, '+8801781449339', 'joyanta319@gmail.com', '2019-06-02 09:18:03', '2019-06-02 09:18:03'),
(87, 1, 3, NULL, NULL, '+8801739972425', 'Mr.', 'Kamal', NULL, NULL, 'Pabna', NULL, '+8801739972425', 'czar.imtiaz@gmail.com', '2019-06-02 11:38:57', '2019-06-02 11:38:57'),
(88, 1, 5, NULL, NULL, '+8801677273025', 'Sunny', 'Siddiqui', NULL, NULL, 'Khulna', NULL, '+8801912904450', 'sunny.epeakup@gmail.com', '2019-06-12 02:56:24', '2019-06-12 02:56:24'),
(89, 1, 5, NULL, NULL, '+8801677273025', 'Sunny', 'Siddiqui', NULL, NULL, 'Khulna', NULL, '+8801912904450', 'sunny.epeakup@gmail.com', '2019-06-12 02:56:25', '2019-06-12 02:56:25'),
(90, 1, 13, NULL, NULL, '+8801814445320', 'Khaleda', 'Akter', NULL, NULL, 'Feni', NULL, '+8801814445320', 'rashidaakter999@gmail.com', '2019-06-12 04:59:51', '2019-06-12 04:59:51'),
(91, 1, 1, NULL, NULL, '+8801781818181', 'sssss', 'ssssss', NULL, NULL, 'sss', NULL, '+8801781818181', 'joyanta@gmail.com', '2019-06-14 07:14:30', '2019-06-14 07:14:30'),
(92, 1, 3, NULL, NULL, '+8801711856173', 'Md', 'Ohiduzzaman', NULL, NULL, 'Khulna', NULL, '+8801711856173', 'teconce.ceo@gmail.com', '2019-06-16 10:54:26', '2019-06-16 10:54:26'),
(93, 1, 14, NULL, NULL, '+8801681950322', 'Ferdouse', 'Yesmin', NULL, NULL, 'Khulna', NULL, '+8801677273025', 'webszionline.solution@gmail.com', '2019-06-16 11:17:21', '2019-06-16 11:17:21'),
(94, 1, 16, NULL, NULL, '+8801918922659', 'Md tariful', 'Islam', NULL, NULL, 'Dhaka', NULL, '+8801918922659', 'mehedi.rulz@yahoo.com', '2019-06-16 21:25:14', '2019-06-16 21:25:14'),
(95, 1, 16, NULL, NULL, '+8801918922659', 'Md tariful', 'Islam', NULL, NULL, 'Dhaka', NULL, '+8801918922659', 'mehedi.rulz@yahoo.com', '2019-06-16 21:31:59', '2019-06-16 21:31:59'),
(96, 1, 3, NULL, NULL, '+8801739972425', 'imtiaz', 'khandoker', NULL, NULL, 'Sirajganj', NULL, '+8801739972425', 'softthreat@gmail.com', '2019-06-17 05:21:06', '2019-06-17 05:21:06'),
(99, 1, 25, NULL, NULL, '+8801818063729', 'Rafiq ul', 'Islam', NULL, NULL, 'Dhaka', NULL, '+8801818063729', 'razi_talukder@yahoo.com', '2019-06-18 07:59:15', '2019-06-18 07:59:15'),
(113, 1, 29, NULL, NULL, '+8801712411123', 'Golam', 'Robbani', NULL, NULL, 'Shirajgonj', NULL, '+8801712411123', 'tamannaafrinau@hotmail.com', '2019-06-22 17:23:19', '2019-06-22 17:23:19'),
(114, 1, 36, NULL, NULL, '+8801674463888', 'S M Ohid', 'Ullah', NULL, NULL, 'Feni', NULL, '+8801674463888', 'nnccbd@gmail.com', '2019-06-22 19:27:23', '2019-06-22 19:27:23'),
(115, 1, 29, NULL, NULL, '+8801712544999', 'Md', 'Limon', NULL, NULL, 'Shirajgonj', NULL, '+8801712544999', 'tamannaafrinau@hotmail.com', '2019-06-22 20:30:58', '2019-06-22 20:30:58'),
(116, 1, 38, NULL, NULL, '+8801718916325', 'Qazi Monoawr', 'Hossain', NULL, NULL, 'Dhaka', NULL, '+8801718916325', 'sazzadsobuj1990@icloud.com', '2019-06-23 03:03:59', '2019-06-23 03:03:59'),
(117, 1, 38, NULL, NULL, '+8801712529749', 'Baro', 'Apu', NULL, NULL, 'Dhaka', NULL, '+8801712529749', 'sazzadsobuj@yahoo.com', '2019-06-23 04:52:52', '2019-06-23 04:52:52'),
(118, 1, 34, NULL, NULL, '+8801968876000', 'Tanvir', 'Ahmed', NULL, NULL, 'Brahmanbaria', NULL, '+8801911039022', 'monoara.mridha@gmail.com', '2019-06-23 18:14:04', '2019-06-23 18:14:04'),
(119, 1, 46, NULL, NULL, '+8801677074138', 'Jue', 'Jue', NULL, NULL, 'Dhaka', NULL, '+8801677074138', 'mdbappe@gmail.com', '2019-06-25 03:57:39', '2019-06-25 03:57:39'),
(120, 1, 43, NULL, NULL, '+8801677273025', 'Sunny', 'Siddiqui', NULL, NULL, 'Khulna', NULL, '+8801912904450', 'bkash955@gmail.com', '2019-06-25 05:20:51', '2019-06-25 05:20:51'),
(121, 1, 46, NULL, NULL, '+8801717570685', 'Md Imtiaz', 'Ahamed', NULL, NULL, 'Dhaka', NULL, '+8801717570685', 'mdbappe@gmail.com', '2019-06-25 07:09:38', '2019-06-25 07:09:38'),
(122, 1, 44, NULL, NULL, '+8801739972425', 'imtiaz', 'khandoker', NULL, NULL, 'Sirajganj', NULL, '+8801739972425', 'softthreat@gmail.com', '2019-06-26 08:39:58', '2019-06-26 08:39:58'),
(123, 1, 49, NULL, NULL, '+8801750150291', 'Md Anisur', 'Rhaman', NULL, NULL, 'Savar', NULL, '+8801750150291', 'anis4147@gmail.com', '2019-06-28 08:49:51', '2019-06-28 08:49:51'),
(124, 1, 50, NULL, NULL, '+8801766144254', 'Rahul', 'Das', NULL, NULL, 'Chittagong', NULL, '+8801766144254', 'rahul.juiit@gmail.com', '2019-06-28 10:15:04', '2019-06-28 10:15:04'),
(125, 1, 57, NULL, NULL, '+8801706996317', 'Naumi', 'Nafisa', NULL, NULL, 'Dhaka', NULL, '+8801706996317', 'asif_0172@yahoo.com', '2019-07-02 00:16:53', '2019-07-02 00:16:53'),
(126, 1, 58, NULL, NULL, '+8801711853175', 'Mohammad Mijanur', 'Rahaman', NULL, NULL, 'Chittagong', NULL, '+8801711853175', 'moinulahsan.ctg@gmail.com', '2019-07-02 06:39:55', '2019-07-02 06:39:55'),
(127, 1, 57, NULL, NULL, '+8801766685020', 'MD Maruf', 'Bizle', NULL, NULL, 'Dhaka', NULL, '+8801741956378', 'maruf_e@yahoo.com', '2019-07-03 23:23:01', '2019-07-03 23:23:01'),
(128, 1, 44, NULL, NULL, '+8801739972425', 'imtiaz', 'khandoker', NULL, NULL, 'dhaka', NULL, '+8801739972425', 'softthreat@gmail.com', '2019-07-04 08:49:53', '2019-07-04 08:49:53'),
(129, 1, 35, NULL, NULL, '+8801978232942', 'Moqbul', 'Ahmed', NULL, NULL, 'Feni', NULL, '+8801978232942', 'rashidaakter999@gmail.com', '2019-07-05 22:23:38', '2019-07-05 22:23:38'),
(130, 1, 35, NULL, NULL, '+8801924159383', 'Fatema Tuj', 'Johora', NULL, NULL, 'Feni', NULL, '+8801924159383', 'rashidaakter999@gmail.com', '2019-07-05 22:32:42', '2019-07-05 22:32:42'),
(131, 1, 35, NULL, NULL, '+8801812448685', 'Khaleda', 'Akter', NULL, NULL, 'Feni', NULL, '+8801812448685', 'rashidaakter999@gmail.com', '2019-07-05 22:37:07', '2019-07-05 22:37:07'),
(132, 1, 35, NULL, NULL, '+8801968827845', 'Khaleda', 'Akter', NULL, NULL, 'Feni', NULL, '+8801968827845', 'rashidaakter999@gmail.com', '2019-07-05 22:42:15', '2019-07-05 22:42:15'),
(133, 1, 53, NULL, NULL, '+8801748920147', 'Kamal', 'Hossain', NULL, NULL, 'Comilla', NULL, '+8801720275376', 'mhasanau@yahoo.com', '2019-07-10 00:39:18', '2019-07-10 00:39:18'),
(134, 1, 58, NULL, NULL, '+8801675524361', 'Nazmul huda', 'Nadim', NULL, NULL, 'Chittagong', NULL, '+8801675524361', 'moinulahsan.ctg@gmail.com', '2019-07-15 01:32:40', '2019-07-15 01:32:40'),
(135, 1, 35, NULL, NULL, '+8801674463888', 'S M Ohid', 'Ullah', NULL, NULL, 'Feni', NULL, '+8801674463888', 'rashidaakter999@gmail.com', '2019-07-15 21:24:45', '2019-07-15 21:24:45'),
(136, 1, 57, NULL, NULL, '+8801799834075', 'Nafisa', 'Nawal', NULL, NULL, 'Dhaka', NULL, '+8801799834075', 'goalm.hossain@gmail.com', '2019-07-18 02:19:47', '2019-07-18 02:19:47'),
(137, 1, 59, NULL, NULL, '+8801732140160', 'Ferdousi', 'Renoka', NULL, NULL, 'Narsingdi', NULL, '+8801732140160', 'farjana.rumi007@gmail.com', '2019-07-18 03:03:38', '2019-07-18 03:03:38'),
(138, 1, 59, NULL, NULL, '+8801675125051', 'Rahin', 'Hasan', NULL, NULL, 'Dhaka', NULL, '+8801675125051', 'farjana.rumi007@gmail.com', '2019-07-19 05:27:49', '2019-07-19 05:27:49'),
(139, 1, 57, NULL, NULL, '+8801706612601', 'Golam', 'Hossain', NULL, NULL, 'Dhaka', NULL, '+8801706612601', 'goalm.hossain@gmail.com', '2019-07-21 11:40:36', '2019-07-21 11:40:36'),
(140, 1, 58, NULL, NULL, '+8801675524361', 'Nazmul huda', 'Nadim', NULL, NULL, 'Chittagong', NULL, '+8801675524361', 'moinulahsan.ctg@gmail.com', '2019-07-21 23:36:06', '2019-07-21 23:36:06');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'super', '2019-05-07 12:38:57', '2019-05-07 12:38:57'),
(2, 'manager', '2019-05-07 12:57:28', '2019-05-07 12:57:28'),
(6, 'warker', '2019-05-09 07:27:35', '2019-05-09 07:27:35');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_charge` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `country_id`, `name`, `service_charge`, `created_at`, `updated_at`) VALUES
(1, 1, 'bKash / Rocket Payment', '4.50', '2019-05-04 15:37:34', '2019-07-22 00:29:28'),
(2, 1, 'Mobile Top Up', '2.00', '2019-05-04 15:43:25', '2019-06-24 08:18:43');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) NOT NULL,
  `image` text NOT NULL,
  `button_text` varchar(191) DEFAULT NULL,
  `size` bigint(20) DEFAULT NULL,
  `type` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `button_text`, `size`, `type`, `created_at`, `updated_at`) VALUES
(1, '1560276807.jpeg', 'Get Start', 103, 'jpeg', '2019-06-11 06:19:03', '2019-06-11 10:13:27'),
(2, '1560276824.jpeg', 'Get Start', 145, 'jpeg', '2019-06-11 10:13:44', '2019-06-11 10:13:44'),
(3, '1560276844.jpeg', 'Get Start', 99, 'jpeg', '2019-06-11 10:14:04', '2019-06-11 10:14:04');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 1, '2019-05-04 18:00:00', '2019-05-04 18:00:00'),
(2, 'Rajshahi', 1, '2019-05-04 18:00:00', '2019-05-04 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `agent_id`, `client_id`, `receiver_id`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 8, 5, 4, '100.00', 0, '2019-07-22 05:41:17', '2019-07-22 05:41:17'),
(2, 9, 6, 5, '100.00', 1, '2019-07-22 12:08:33', '2019-07-22 12:16:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customerId` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documents` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buildingName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` bigint(20) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `customerId`, `documents`, `firstName`, `lastName`, `email`, `email_verified_at`, `password`, `gender`, `phone`, `street`, `postcode`, `buildingName`, `city_id`, `country_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(23, 'DS1560827942', NULL, 'Dilshat', 'Shela', 'dilshatshela@gmail.com', '2019-06-17 19:19:47', '$2y$10$vqj63itdTx9rygjdRcSbiul1L1yPbQxAPNZAeqvbsIl4rCtx2ZPye', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2019-06-17 19:19:02', '2019-06-17 19:19:47'),
(24, 'RB1560841328', NULL, 'Reg', 'BRIGHT', 'bright73@hotmail.com', '2019-06-17 23:04:26', '$2y$10$7qriWBlcb/Pk/dNjSiMMiOR7XCouuO2jzzkvYMmFySZQSLqXSBXuG', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2019-06-17 23:02:08', '2019-06-17 23:04:26'),
(25, 'MI1560872089', NULL, 'Md tariful', 'Islam', 'mehedi.rulz@yahoo.com', '2019-06-18 07:36:10', '$2y$10$/oa1uz/5lmw247mkEnt86OhCBbsEKmwhoYEEvz/l5dXCDr7BwidE2', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2019-06-18 07:34:49', '2019-06-18 07:36:10'),
(27, 'LL1560957179', NULL, 'Litu', 'Litu', 'abdulkuddus07@gmail.com', '2019-06-19 07:15:53', '$2y$10$yXlKY2uNKR0tGRgQJejZoefpc2WaOzGcDP3b.m6Ls7KLy.bMGiKGK', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2019-06-19 07:12:59', '2019-06-19 07:15:53'),
(29, 'TA1560963862', NULL, 'Tamanna', 'Afrin', 'tamannaafrinau@hotmail.com', '2019-06-22 17:18:29', '$2y$10$V.RGS6Yn9hjEXX/lOlvSV.VIojSddjaGoNx643KFnvv4FMZIITGha', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'eIKdFlZbfvtsZLeT1d6QLb0ltPX0BdndfTeNVa4HrlWUFgF7cStC6e1onfUX', '2019-06-19 09:04:22', '2019-06-22 17:18:29'),
(30, 'MI1561017762', NULL, 'Md Ariful', 'Islam', 'ariful_sydney@yahoo.com', '2019-06-20 00:03:29', '$2y$10$YjkCxMMaOYxBPtf9ww1dv.2JMe5cMMbPvQpqvUpvbYyrbX26K4abG', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2019-06-20 00:02:42', '2019-06-20 00:03:29'),
(31, 'TA1561031853', NULL, 'Tanjim', 'Ahmed', 'tanjimahmed47609@yahoo.com', '2019-06-20 04:03:34', '$2y$10$3DVHHQElfeuZlN1SxETjz.vMPnlhMmM0SIl340aeRQsJl3ntCCn.W', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'NuNpks0W9CPqi1wurMMJCW9VJ8LXXtF92HiFNwDNx5gcWjxdcEbx0742KVxV', '2019-06-20 03:57:33', '2019-06-20 04:03:34'),
(32, 'BU1561097631', NULL, 'Burhan', 'Uddin', 'uddin92nz@gmail.com', '2019-06-20 22:18:33', '$2y$10$UNdaQKKnFfSVF6MtHNsMauulZA4chV8J8hB8P5BaMnWiiNnRJDIgu', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2019-06-20 22:13:51', '2019-06-20 22:18:33'),
(34, 'MR1561205203', NULL, 'MD Masudur', 'Rahman', 'masudur222@gmail.com', '2019-06-22 04:41:08', '$2y$10$40gQEOBofVWGpkWNGstvROOxcrsJjyampISaau5pqWzwf.FYL0rOG', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2019-06-22 04:06:43', '2019-06-22 04:41:08'),
(35, 'RA1561258852', NULL, 'Rashida', 'Akter', 'rashidaakter999@gmail.com', '2019-06-22 22:19:03', '$2y$10$S2DfkikIK0kVMZ4nCxGT6e0TKzFdKR3BGVVnHGINMGh19UISzEEyy', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'MGhyWPxDq5x0wTSt6Or6xEIKD1ye6swJGGPd212M12ZOiipqTJgMzmAnCs5k', '2019-06-22 19:00:52', '2019-06-22 22:19:03'),
(36, 'RA1561259410', NULL, 'Rashida', 'Akter', 'rashida@studyin.com.au', '2019-06-22 19:11:17', '$2y$10$av2N0HbecDProZZE.rkXtOkgLpZx6ZJGY.8oz.Gkk3UWBgXxpfdtW', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'FdBFCQZ2WSlTINA2i2jT3qBIbhzl6ldm9UjXK5UfdyslidbN5XCzOfvcuitr', '2019-06-22 19:10:10', '2019-06-22 22:12:58'),
(38, 'MH1561287212', NULL, 'Md sazzadul', 'Hoque', 'sazzadsobuj@yahoo.com', '2019-06-23 02:54:16', '$2y$10$DSJh13Vb8KOhY34O7qv4nO4e7o2XDx6591/CvbLVXoJt40Wy9m9QS', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2019-06-23 02:53:32', '2019-06-23 02:54:16'),
(43, 'SS1561392800', NULL, 'Sunny', 'Siddiqui', 'webszionline.solution@gmail.com', '2019-06-24 08:15:46', '$2y$10$4lXjlWDaV.TSazX1kRKIkue9evBa7JIWc4D1ZkCkvjEY1.EBVTS7C', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2019-06-24 08:13:20', '2019-06-24 08:15:46'),
(44, 'HS1561398050', '1563378205.png', 'Helpline', 'Agent', 'softthreat@gmail.com', '2019-06-24 09:41:41', '$2y$10$Qp9PrC8ibSK142cqrm4EOe1tIQLyD0zBtT6c5Gay23QroW/2gH2Lu', 'Male', '1739970000', 'Dhaka,18/d', '12345', 'Dhaka,18/d', 'dhanmondi', 1, NULL, '2019-06-24 09:40:50', '2019-07-17 07:43:26'),
(45, 'NS1561458549', NULL, 'Nisat Sultana', 'Zilin', 'nisatsultana.zilin@gmail.com', '2019-06-25 02:40:15', '$2y$10$KMjTLfJLfxKYWMUDPm2H9.ONrl8YN.9TFEUu5vVHKfvPI/WpTU19.', 'Female', '0405050627', 'Danman Avenue', '2195', '7/64', 'NSW', 1, NULL, '2019-06-25 02:29:09', '2019-06-25 04:52:10'),
(46, 'MB1561458550', NULL, 'MD', 'Bappe', 'mdbappe@gmail.com', '2019-06-25 02:31:18', '$2y$10$oY9JdQb1cSCE5widy0mEzento0jHsEuNUZ0P9iLsE4hlTuFMxJYg2', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2019-06-25 02:29:10', '2019-06-25 02:31:18'),
(47, 'RK1561467825', NULL, 'RATUL', 'KHAN', 'kmjawadtahamid@gmail.com', '2019-06-25 05:06:10', '$2y$10$qEu7kSAKurtbzB/egRovAuoJH.t46of.e6HhpkLGEFMEPxB.m9t/m', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2019-06-25 05:03:45', '2019-06-25 05:06:10'),
(48, 'RS1561699480', NULL, 'Rabeya', 'Sayed', 'rabeyanahid21@gmail.com', '2019-06-27 21:27:55', '$2y$10$0CB4q9T.Ue57mdvu6HbBLeuRI01MtnKTATiWqc.YGraPV8f.544pm', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2019-06-27 21:24:40', '2019-06-27 21:27:55'),
(49, 'MR1561740116', NULL, 'Md Anisur', 'Rhaman', 'anis4147@gmail.com', '2019-06-28 08:42:47', '$2y$10$5s1ejZnzRqiQxjnWeRApreuiXig6cGUn2Xk.4tKTklpaVmIBc3OSS', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2019-06-28 08:41:57', '2019-06-28 08:42:47'),
(50, 'KI1561745067', NULL, 'Kazi Tanvir', 'Islam', 'marvel1419@gmail.com', '2019-06-28 10:05:23', '$2y$10$Yqp5KfYUS2krMeeb51BdheuDNjV.0665yWtbk1Ae4MXb.zac0JmR2', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2019-06-28 10:04:27', '2019-06-28 10:05:23'),
(51, 'MR1561756586', NULL, 'Mahiur', 'Rahman', 'amimishad@gmail.com', '2019-06-28 13:17:07', '$2y$10$7wvI4x46lIOVnbwQnYIaGecAFz4WFitlhjFRAr9t0Al7lhtPJNfx2', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2019-06-28 13:16:26', '2019-06-28 13:17:07'),
(52, 'YN1561770769', NULL, 'Yeasmin', 'nahar', 'yeasminera.chem@gmail.com', '2019-06-28 17:26:54', '$2y$10$G9L/szXqz5qkjb3E6f72ke12XX.BDzIZNsRYKtGV/U4opoIDIWavu', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2019-06-28 17:12:49', '2019-06-28 17:26:54'),
(53, 'MH1561779771', NULL, 'Md Mahmudul', 'Hasan', 'mhasanau@yahoo.com', '2019-06-28 19:43:52', '$2y$10$YNTY70Yg0AipVZaTJiJMaOop9ZcpVcz9rdAjh4ySqfU6YlvJ/NIEq', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2019-06-28 19:42:51', '2019-06-28 19:43:52'),
(54, 'MR1561813304', NULL, 'Md Atiqur', 'Rahman', 'atiqurrahman2060@gmail.com', '2019-06-29 05:02:17', '$2y$10$ITTnPuR1WAp8Mi9x/jxrWumBc6BDzYI6I3tZCyH54uN9CTQnNolW6', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2019-06-29 05:01:44', '2019-06-29 05:02:17'),
(55, 'CB1561881135', NULL, 'Chowdhury', 'Beg', 'csabeg@gmail.com', '2019-06-29 23:54:01', '$2y$10$RoPcO1uclJ7r6K5t8oa8OO4NlK6TIyA5dw0fmoizncC9amhc5Cs2y', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2019-06-29 23:52:15', '2019-06-29 23:54:01'),
(56, 'TS1562008552', NULL, 'Tariful Islam', 'Sipon', 'tariful.ipe@gmail.com', NULL, '$2y$10$ioojkUjlGNafoUJKCD56Pez85rrbuRPkxh2FGjrT5xQBdG/EKK1im', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2019-07-01 11:15:52', '2019-07-01 11:15:52'),
(57, 'GH1562054286', NULL, 'Golam', 'Hossain', 'goalm.hossain@gmail.com', '2019-07-01 23:58:58', '$2y$10$xFnrAOBASKCeIw7r.14ToeWgB864d8Q1S7K/AVKtySw3CMvDdxqra', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2019-07-01 23:58:06', '2019-07-01 23:58:58'),
(58, 'MA1562060873', NULL, 'Moinul', 'Ahsan', 'moinulahsan.ctg@gmail.com', '2019-07-02 01:49:01', '$2y$10$y7M2aDgCMhsJKE5/wd2PFO1hBFOvTcxnUz5B/.m50z21PtEyiZQRC', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2019-07-02 01:47:53', '2019-07-02 01:49:01'),
(59, 'FA1562195560', NULL, 'Farzana', 'Afruj', 'farjana.rumi007@gmail.com', '2019-07-18 02:45:38', '$2y$10$JgpdWQbp7pJzowTFSgNyPOqpAFP6NX1hrsHHpF92eiJgMZaywc1.e', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'z7SMWK4JEGMZRot4yiw1LiyFZD0czpExY4R9Q9aNioA9PiTklzLhxez2UUJM', '2019-07-03 15:12:40', '2019-07-18 02:45:38'),
(61, 'AA1562674855', NULL, 'Ashikuzzaman', 'Ashik', 'ashik_ku09@yahoo.com', '2019-07-09 04:21:33', '$2y$10$4mOJ1gaF3LrB0NrcMW18TeEp3gsLw5DIKTEFiWtawKPJ6jg54kmqu', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2019-07-09 04:20:55', '2019-07-09 04:21:33'),
(62, 'MD1562734592', NULL, 'md niamul muhid', 'danieal', 'danieal786@hotmail.com.au', '2019-07-09 21:30:02', '$2y$10$mBXhzwRPJf361SR5OGMwO.cMVUnueC1xiB75E1Mv/aMl3kN5NgyHa', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2019-07-09 20:56:32', '2019-07-09 21:30:02'),
(63, 'MA1562832030', NULL, 'Md Tanvir', 'Ahamad', 'tanvirahamad27@yahoo.com', '2019-07-11 00:00:59', '$2y$10$o5XQdcfXVK9AXPZdP.pFxOV9wmIUZYhvPvzMo6Ju8KSrR3vUUCtnG', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2019-07-11 00:00:30', '2019-07-11 00:00:59');

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
-- Indexes for table `admin_role`
--
ALTER TABLE `admin_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_role_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `agents_email_unique` (`email`);

--
-- Indexes for table `balances`
--
ALTER TABLE `balances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `money_requests`
--
ALTER TABLE `money_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_orderid_unique` (`orderId`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_method_discounts`
--
ALTER TABLE `payment_method_discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_networks`
--
ALTER TABLE `payment_networks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reasons`
--
ALTER TABLE `reasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receivers`
--
ALTER TABLE `receivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipients`
--
ALTER TABLE `recipients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `admin_role`
--
ALTER TABLE `admin_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `balances`
--
ALTER TABLE `balances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `money_requests`
--
ALTER TABLE `money_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `payment_method_discounts`
--
ALTER TABLE `payment_method_discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_networks`
--
ALTER TABLE `payment_networks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reasons`
--
ALTER TABLE `reasons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `receivers`
--
ALTER TABLE `receivers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `recipients`
--
ALTER TABLE `recipients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_role`
--
ALTER TABLE `admin_role`
  ADD CONSTRAINT `admin_role_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
