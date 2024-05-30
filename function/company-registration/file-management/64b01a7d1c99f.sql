-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2023 at 12:05 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `profile_image`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@123', 'admin-profiles/mRF3tvLIUU0L7ZQnU9M3XI9XhO50Aa1HzkG6k9tt.png', '2023-06-14 00:00:04', '2023-06-14 00:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `c_id` bigint(20) UNSIGNED NOT NULL,
  `c_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`c_id`, `c_name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'samsung', 1, NULL, NULL),
(2, 'huwavi', 1, NULL, NULL),
(3, 'hhh', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_registrations`
--

CREATE TABLE `company_registrations` (
  `id` bigint(20) NOT NULL,
  `registration_name` varchar(255) NOT NULL,
  `registration_no` varchar(255) NOT NULL,
  `expire_date` date NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `document_type_id` bigint(20) UNSIGNED NOT NULL,
  `document_name_id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `custom_fields` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`custom_fields`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `document_names`
--

CREATE TABLE `document_names` (
  `dn_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `document_type_id` bigint(20) UNSIGNED NOT NULL,
  `d_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `document_names`
--

INSERT INTO `document_names` (`dn_id`, `user_id`, `company_id`, `document_type_id`, `d_name`, `created_at`, `updated_at`) VALUES
(30, 1, 1, 1, 'kk', NULL, NULL),
(31, 1, 1, 3, 'flash-ships', NULL, NULL),
(32, 1, 1, 1, 'rrr', NULL, NULL),
(33, 1, 1, 1, 'sss', NULL, NULL),
(34, 1, 1, 1, 'yyy', NULL, NULL),
(35, 1, 3, 10, 'getr', NULL, NULL),
(36, 1, 2, 5, 'dfgd', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `document_types`
--

CREATE TABLE `document_types` (
  `dt_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `dt_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `document_types`
--

INSERT INTO `document_types` (`dt_id`, `user_id`, `company_id`, `dt_name`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'employee details', NULL, NULL),
(2, 1, 1, 's6', NULL, NULL),
(3, 1, 1, 'sfive', NULL, NULL),
(5, 1, 2, 'employee details', '2023-06-23 17:58:40', NULL),
(6, 1, 2, 'vehicles', '2023-06-23 17:58:40', NULL),
(8, 1, 2, 'legal details', '2023-06-23 18:24:15', NULL),
(9, 1, 3, 'legal details', '2023-06-24 05:08:42', NULL),
(10, 1, 3, 'employee details', '2023-06-24 05:08:42', NULL),
(11, 1, 3, 'vehicles', '2023-06-24 05:08:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE `employee_details` (
  `emp_id` bigint(20) NOT NULL,
  `employee_name` varchar(30) NOT NULL,
  `passport_no` varchar(9) NOT NULL,
  `mobile` int(15) NOT NULL,
  `join_date` date NOT NULL,
  `document_name_id_fk` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`emp_id`, `employee_name`, `passport_no`, `mobile`, `join_date`, `document_name_id_fk`) VALUES
(2, 'gg', '55555', 11111, '2023-06-15', 35),
(3, 'gdfg', '534534', 67876, '2023-06-25', 36);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` bigint(20) NOT NULL,
  `basic_salary` decimal(10,2) NOT NULL,
  `basic_allowance` decimal(10,2) NOT NULL,
  `fixed_ot` decimal(10,2) NOT NULL,
  `days_count` int(3) NOT NULL,
  `days_amount` float NOT NULL,
  `ot` int(3) NOT NULL,
  `ot_amount` float NOT NULL,
  `hours` int(3) NOT NULL,
  `hours_amount` float NOT NULL,
  `bonus` float NOT NULL,
  `leave_salary` decimal(10,2) DEFAULT NULL,
  `gratuity` decimal(10,2) DEFAULT NULL,
  `salary_deposit` decimal(10,2) NOT NULL,
  `salary_advance` float NOT NULL,
  `loan` decimal(10,2) NOT NULL,
  `air_ticket` decimal(10,2) NOT NULL,
  `telephone_expense` decimal(10,2) NOT NULL,
  `total_salary` decimal(10,2) NOT NULL,
  `document_name_id_fk` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `salary_status` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `basic_salary`, `basic_allowance`, `fixed_ot`, `days_count`, `days_amount`, `ot`, `ot_amount`, `hours`, `hours_amount`, `bonus`, `leave_salary`, `gratuity`, `salary_deposit`, `salary_advance`, `loan`, `air_ticket`, `telephone_expense`, `total_salary`, `document_name_id_fk`, `created_at`, `updated_at`, `salary_status`) VALUES
(20, 1050.00, 400.00, 650.00, 8, 560, 2, 140, 4, 17.5, 0, 735.00, 0.00, 0.00, 0, 0.00, 0.00, 0.00, 1452.50, 35, '2023-06-24 21:45:54', NULL, 'unpaid'),
(21, 1000.00, 200.00, 300.00, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0, 0.00, 0.00, 0.00, 1500.00, 35, '2023-06-24 22:00:26', NULL, 'unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `user_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `password`, `profile_image`, `user_status`, `created_at`, `updated_at`) VALUES
(1, 's20', 's20', '649322389098a_download.jpg', 'active', '2023-06-20 07:05:31', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_users_username_unique` (`username`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `companies_created_by_foreign` (`created_by`);

--
-- Indexes for table `company_registrations`
--
ALTER TABLE `company_registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_registrations_user_id_foreign` (`user_id`),
  ADD KEY `company_registrations_company_id_foreign` (`company_id`),
  ADD KEY `company_registrations_document_type_id_foreign` (`document_type_id`),
  ADD KEY `company_registrations_document_name_id_foreign` (`document_name_id`);

--
-- Indexes for table `document_names`
--
ALTER TABLE `document_names`
  ADD PRIMARY KEY (`dn_id`),
  ADD KEY `document_names_user_id_foreign` (`user_id`),
  ADD KEY `document_names_company_id_foreign` (`company_id`),
  ADD KEY `document_names_document_type_id_foreign` (`document_type_id`);

--
-- Indexes for table `document_types`
--
ALTER TABLE `document_types`
  ADD PRIMARY KEY (`dt_id`),
  ADD KEY `document_types_user_id_foreign` (`user_id`),
  ADD KEY `document_types_company_id_foreign` (`company_id`);

--
-- Indexes for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `document_name_of_employee` (`document_name_id_fk`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_doc_name` (`document_name_id_fk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `c_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company_registrations`
--
ALTER TABLE `company_registrations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `document_names`
--
ALTER TABLE `document_names`
  MODIFY `dn_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `document_types`
--
ALTER TABLE `document_types`
  MODIFY `dt_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employee_details`
--
ALTER TABLE `employee_details`
  MODIFY `emp_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`u_id`);

--
-- Constraints for table `company_registrations`
--
ALTER TABLE `company_registrations`
  ADD CONSTRAINT `company_registrations_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`c_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `company_registrations_document_name_id_foreign` FOREIGN KEY (`document_name_id`) REFERENCES `document_names` (`dn_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `company_registrations_document_type_id_foreign` FOREIGN KEY (`document_type_id`) REFERENCES `document_types` (`dt_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `company_registrations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE;

--
-- Constraints for table `document_names`
--
ALTER TABLE `document_names`
  ADD CONSTRAINT `document_names_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`c_id`),
  ADD CONSTRAINT `document_names_document_type_id_foreign` FOREIGN KEY (`document_type_id`) REFERENCES `document_types` (`dt_id`),
  ADD CONSTRAINT `document_names_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`u_id`);

--
-- Constraints for table `document_types`
--
ALTER TABLE `document_types`
  ADD CONSTRAINT `document_types_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`c_id`),
  ADD CONSTRAINT `document_types_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`u_id`);

--
-- Constraints for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD CONSTRAINT `document_name_of_employee` FOREIGN KEY (`document_name_id_fk`) REFERENCES `document_names` (`dn_id`);

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `employee_doc_name` FOREIGN KEY (`document_name_id_fk`) REFERENCES `document_names` (`dn_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
