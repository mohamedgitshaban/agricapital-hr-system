-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 26, 2024 at 09:36 AM
-- Server version: 5.7.44
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `darakoutlet_staron_erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hr_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` int(11) NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profileimage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_tybe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Supervisor` bigint(20) UNSIGNED DEFAULT NULL,
  `MedicalInsurance` int(11) DEFAULT '0',
  `VacationBalance` int(11) DEFAULT '0',
  `SocialInsurance` int(11) DEFAULT '0',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EmploymentDate` date DEFAULT '2024-01-28',
  `EmploymentDateEnd` date DEFAULT NULL,
  `isemploee` tinyint(1) NOT NULL DEFAULT '1',
  `kpi` int(11) DEFAULT NULL,
  `tax` int(11) DEFAULT NULL,
  `Trancportation` int(11) NOT NULL DEFAULT '0',
  `TimeStamp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'office',
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'maneger',
  `segment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'G&A',
  `startwork` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'sunday',
  `endwork` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'tursday',
  `clockin` time NOT NULL DEFAULT '09:00:00',
  `clockout` time NOT NULL DEFAULT '06:00:00',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `hr_code`, `date`, `address`, `password`, `salary`, `department`, `profileimage`, `job_role`, `job_tybe`, `pdf`, `Supervisor`, `MedicalInsurance`, `VacationBalance`, `SocialInsurance`, `phone`, `EmploymentDate`, `EmploymentDateEnd`, `isemploee`, `kpi`, `tax`, `Trancportation`, `TimeStamp`, `grade`, `segment`, `startwork`, `endwork`, `clockin`, `clockout`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@erp.com', 'HR0', '1992-03-15', '456 Oak Street, Townsville', '$2y$12$COHe4CB9uzJkYJxL4bPqP.a2KbC/ATkO7TdcfcTZrDdvhnP1mLUPS', 60000, 'admin', '/uploads/profileimages/images.png', 'developer', 'Part-time', '/uploads/userdoc/doc.docx', NULL, 0, 20, 0, '0111551818', '2024-02-11', NULL, 1, NULL, NULL, 0, 'office', 'maneger', 'G&A', 'sunday', 'tursday', '09:00:00', '06:00:00', '2024-02-11 04:39:28', '6NHYh2B387', '2024-02-11 04:39:28', '2024-02-11 04:39:28'),
(185, 'mohamed shaban', 'mohamed.shaban@staronegypt.com.eg', '20355', '1999-06-11', '6 st kamel elsemy twabik faisel', '$2y$12$mmVZk5Gj/fyQBe0tPAM9Gebh7gU1zfDJ2aBdiNH7qyh4kuuZntCs2', 10000, 'Software', '/uploads/profileimages/1708611171.jpg', 'Software Development Manager', 'Full Time', '/uploads/userdoc/1708611171.zip', 1, 0, 0, 0, '01143104499', '2023-07-01', NULL, 1, 1500, 0, 0, 'Office', 'Second Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-22 12:12:54', '2024-02-22 12:12:54'),
(186, 'Gaber Nageh', 'gabernageh@gmail.com', '20372', '1999-10-10', 'hjhjkjh-lklklk', '$2y$12$Ly8jUASZiqBpwxsm/KEQ..xHd3cZsubeYiXlOyZX4gZCt.E87IZAa', 3500, 'Buffet', '/uploads/profileimages/1708611444.jpeg', 'Office Boy', 'Full Time', '/uploads/userdoc/1708611444.jpeg', 1, 0, 0, 0, '011111241515', '2023-08-10', NULL, 1, 0, 0, 0, 'Office', 'Fourth Staff', 'G&A', 'Saturday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-22 12:17:24', '2024-02-22 12:17:24'),
(187, 'Ashery Mohmoud Abdelrazek Shmed', 'ashry.mahmoud@staronegypt.com.eg', '20359', '1984-03-06', 'lsdvnlsdkvsdkvm', '$2y$12$mb3K3b.zQY.ZCYurpFlMP.uZPFvuJwPyP6H0fatSkGhJ3yb5jB1TC', 9900, 'Financial Department', '/uploads/profileimages/1708611650.jpeg', 'Accountant', 'Full Time', '/uploads/userdoc/1708611650.rar', 1, 0, 0, 0, '0120151502', '2023-08-01', NULL, 1, 900, 0, 0, 'Office', 'Second Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-22 12:20:51', '2024-02-22 12:20:51'),
(188, 'Mahmoud Hamed Houssien Hamed', 'Mahmoud.Hamed@staronegypt.com.eg', '20202', '2024-01-31', '6 st kamel elsemy twabik faisel', '$2y$12$Sw7T0cA8dYJCrRzHZ5F.COR16i5/btoxQ3v.fkewFoVXcgDN37j76', 25000, 'Technical Office', '/uploads/profileimages/1708615093.jpeg', 'Chief Technical Officer', 'Full Time', '/uploads/userdoc/1708615093.rar', 1, 430, 0, 500, '01143104499', '2024-01-01', NULL, 1, 6500, 660, 0, 'Office', 'manager', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-22 13:18:14', '2024-02-22 13:18:14'),
(189, 'Salah El Din Mohamed Abdelfatah', 'Salah.Eldin@staronegypt.com.eg', '20203', '2024-01-01', '6 st kamel elsemy twabik faisel', '$2y$12$Gg5/9OB8.MUB328D6bDIeecTcS6lGcxASQAlDjHBlz6ZitzNr3Voq', 20500, 'Financial Department', '/uploads/profileimages/1708615371.jpeg', 'Chief Financial Officer', 'Full Time', '/uploads/userdoc/1708615371.jpeg', 1, 430, 0, 500, '01143104499', '2024-01-01', NULL, 1, 4100, 660, 0, 'Office', 'manager', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-22 13:22:51', '2024-02-22 13:22:51'),
(190, 'Eslam Moataz', 'eslam.moataz@staronegypt.com.eg', '20367', '1989-10-15', 'dsffs-fssfs', '$2y$12$FugbJ2NU3L5/9dsgVbo2gupbmeUbwMkHbsIc5uTLaKG1d3xw1kQZG', 25000, 'Control Office', '/uploads/profileimages/1708616036.jpg', 'Chief Control Officer', 'Full Time', '/uploads/userdoc/1708616036.rar', 1, 0, 0, 0, '+20 101 122 5589', '2023-10-09', NULL, 1, 6500, 1590, 0, 'Office', 'manager', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-22 13:33:57', '2024-02-22 13:33:57'),
(191, 'Ahmed Mohamed Kamal Awdeen', 'ahmed.mohamed@staronegypt.com.eg', '20279', '1988-08-10', 'Elzatoon-Cairo', '$2y$12$gumYm7k/G05DWg5QPemII.n5Ch12JmDQVKLWiUxQkJn.hH/2dHfka', 25000, 'Operation', '/uploads/profileimages/1708616947.jpeg', 'Chief Operations Officer', 'Full Time', '/uploads/userdoc/1708616947.rar', 1, 430, 0, 500, '+20 102 350 3097', '2022-10-11', NULL, 1, 6500, 660, 0, 'Office', 'manager', 'G&A', 'Thursday', 'Sunday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-22 13:49:07', '2024-02-22 13:49:07'),
(192, 'Amr Anwar Abdelhameed Mohamed', 'amr.farrag@staronegypt.com.eg', '20208', '1999-01-01', 'ukjh-jljl', '$2y$12$YGVNkTmDZVC8Rnm.cr.LS.rJY.ohjhfsePpEAoxt0PWL81oaPjUBe', 15000, 'Financial Department', '/uploads/profileimages/1708617810.jpg', 'Chief Accountant', 'Full Time', '/uploads/userdoc/1708617810.rar', 189, 430, 0, 500, '+20 114 409 3699', '0020-11-12', NULL, 1, 2250, 0, 0, 'Office', 'First Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-22 14:03:31', '2024-02-22 14:03:31'),
(193, 'Ayman Mohammad Ismaeil Morsy', 'Ayman.Ismaeil@staronegypt.com.eg', '20212', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$psAWWXB7aauQ2Nkc7UmIwuzSguDyHzD9aI.QYlwjOlNEhhvL8yTI6', 16000, 'Operation', '/uploads/profileimages/1708854397.png', 'Site Supervisor', 'Full Time', '/uploads/userdoc/1708854397.png', 1, 0, 0, 0, '01143104499', '1111-11-11', NULL, 1, 3200, 0, 2000, 'Whats App', 'First Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '17:00:00', NULL, NULL, '2024-02-25 07:46:38', '2024-02-25 07:46:38'),
(194, 'Nahed Mahmoud Mohamed Rashad', 'Nahed.Rashad@staronegypt.com.eg', '20213', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$ZzBuHwTRB9gd7swsU0hqfux7FdZH9BBOOQ90nD6prdoKxJlgDq0V6', 17000, 'Control Office', '/uploads/profileimages/1708854624.jpeg', 'Planning Engineer', 'Full Time', '/uploads/userdoc/1708854624.jpeg', 190, 0, 0, 0, '01143104499', '1111-11-11', NULL, 1, 2550, 0, 0, 'Office', 'First Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-25 07:50:25', '2024-02-25 07:50:25'),
(195, 'Waleed El Sayed Attia', 'Waleed.Attia@staronegypt.com.eg', '20233', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$wD2oINmxmC8fI4cyF9BVHeNe1Qr.1DGc9OGHX7mt44ZvW3SYiLoLy', 10000, 'Warehouse', '/uploads/profileimages/1708855078.png', 'Warehouse Manager', 'Full Time', '/uploads/userdoc/1708855078.rar', 1, 432, 0, 500, '01143104499', '1111-11-11', NULL, 1, 2000, 0, 0, 'Office', 'First Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-25 07:58:04', '2024-02-25 07:58:04'),
(196, 'Amira Hassan Fathy Nabwy', 'Amira.Hassan@staronegypt.com.eg', '20322', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$7OIACymU0B52Tn5xxwNIAehIdg6buGzDg4AB7xBLVndxsImJIwGRm', 12000, 'Operation', '/uploads/profileimages/1708855471.jpeg', 'Operations Engineer', 'Full Time', '/uploads/userdoc/1708855471.rar', 191, 432, 0, 500, '01143104499', '1111-11-11', NULL, 1, 1200, 0, 0, 'Office', 'First Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-25 08:04:32', '2024-02-25 08:04:32'),
(197, 'Mona Mahmoud Aissa Mohamed', 'Mona.Aissa@staronegypt.com.eg', '20328', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$P4.UqKftI11YszAr/8dfS.L/z1VWWHu0okRqCzShX1QxOrB2updky', 12000, 'Technical Office', '/uploads/profileimages/1708855910.jpeg', 'Technical Engineer', 'Full Time', '/uploads/userdoc/1708855910.jpeg', 188, 432, 0, 500, '01143104499', '1111-11-11', NULL, 1, 1200, 0, 0, 'Office', 'First Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-25 08:11:50', '2024-02-25 08:11:50'),
(198, 'Ola Abdlereheem Ebrahim Abdlereheem', 'Ola.Abdlereheem@staronegypt.com.eg', '20332', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$h/.kmrD1zaWp1PeSHrbf8u/QUSuasARG7bjv0ly8tANO6sGMfrBz2', 11000, 'Administration', '/uploads/profileimages/1708856124.jpeg', 'Office Secretary', 'Full Time', '/uploads/userdoc/1708856124.jpeg', 1, 432, 0, 500, '01143104499', '1111-11-11', NULL, 1, 1650, 0, 0, 'Office', 'First Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-25 08:15:25', '2024-02-25 08:15:25'),
(199, 'Mohamed Abdlrahaman Abdlkreem Abdo', 'Mohamed.Abdlrahaman@staronegypt.com.eg', '20205', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$d4X8/dl68QgUABqnSmgKTuiLl5G8mO9FqDVVtl38hRZ.cOGujzvn2', 9000, 'Financial Department', '/uploads/profileimages/1708856352.jpeg', 'Treasury Manager', 'Full Time', '/uploads/userdoc/1708856352.rar', 189, 432, 0, 500, '01143104499', '1111-11-11', NULL, 1, 900, 0, 0, 'Office', 'Second Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-25 08:19:12', '2024-02-25 08:19:12'),
(200, 'Mohamed Ahmed Fathy Hussien', 'Mohamed.Fathy@staronegypt.com.eg', '20206', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$CLBIYGNG41hZ4aBk4VdlbeyuGV38od69WHngAmCUPyBU9KUkdB.xS', 10000, 'Financial Department', '/uploads/profileimages/1708863151.jpeg', 'Asset Accountant', 'Full Time', '/uploads/userdoc/1708863151.jpeg', 192, 432, 0, 500, '01143104499', '1111-11-11', NULL, 1, 2000, 0, 0, 'Office', 'Second Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-25 10:12:32', '2024-02-25 10:12:32'),
(201, 'Gerges Youssef Fawzy', 'Gerges.Fawzy@staronegypt.com.eg', '20257', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$v5ngGNTm0GjeT.4dRuAgcuDj8B.1q1iTCYAEi9UM/ebG.tilFljXa', 5000, 'Human Resource', '/uploads/profileimages/1708863324.png', 'Human Resource Personnel', 'Full Time', '/uploads/userdoc/1708863324.png', 1, 0, 0, 0, '01143104499', '1111-11-11', NULL, 1, 0, 0, 0, 'Office', 'Second Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-25 10:15:24', '2024-02-25 10:15:24'),
(202, 'Mohamed Ali Mohamed Ali', 'Mohamed.Ali@staronegypt.com.eg', '20221', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$CSqzfbJW9fr0c.SX8WM.aOZRz31I/0KvRuiCtdCkjj6bO8KTzD2Ly', 6500, 'Operation', '/uploads/profileimages/1708863505.jpeg', 'Site Supervisor', 'Full Time', '/uploads/userdoc/1708863505.rar', 191, 432, 0, 500, '01143104499', '1111-11-11', NULL, 1, 975, 0, 1800, 'Whats App', 'Second Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-25 10:18:26', '2024-02-25 10:18:26'),
(203, 'Ahmed Ezzat Salem Salem', 'Ahmed.Ezzat@staronegypt.com.eg', '20223', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$NzHSUsvbVRufzjgp34ERBusHQi7y3uGoNhylUoyQwkDetb1ctalG.', 11000, 'Operation', '/uploads/profileimages/1708863902.jpeg', 'Site Manager', 'Full Time', '/uploads/userdoc/1708863902.rar', 191, 432, 0, 500, '01143104499', '1111-11-11', NULL, 1, 1500, 0, 2000, 'Whats App', 'Second Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-25 10:25:02', '2024-02-25 10:25:02'),
(204, 'Ahmed Said Mohamed Abd Elhaleem', 'Ahmed.Said@staronegypt.com.eg', '20225', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$aN9VUx/LO.H1.BFf482S/.d.i2zUOxGJNuKYiESIcCj2is1BO4kHO', 10000, 'Operation', '/uploads/profileimages/1708864137.jpeg', 'Site Manager', 'Full Time', '/uploads/userdoc/1708864137.rar', 191, 423, 0, 500, '01143104499', '1111-11-11', NULL, 1, 1500, 0, 2000, 'Whats App', 'Second Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-25 10:28:58', '2024-02-25 10:28:58'),
(205, 'Tamer Saad  Hanfy Matbouly', 'Tamer.Saad@staronegypt.com.eg', '20227', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$q4ZDdqA1eSkhpNBtwe6WNODVDIZdYBJey5syT/glNKFSRDRo03/i2', 6500, 'Operation', '/uploads/profileimages/1708865666.jpeg', 'Site Manager', 'Full Time', '/uploads/userdoc/1708865666.rar', 191, 432, 0, 500, '01143104499', '1111-11-11', NULL, 1, 975, 0, 1800, 'Whats App', 'Second Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-25 10:54:27', '2024-02-25 10:54:27'),
(206, 'Ibrahim Samir Ibrahim Eldosoky', 'Ibrahim.Samir@staronegypt.com.eg', '20231', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$as5VDX9je49vFJb4q.t.u.CJcsFd34yV.6JgPrVO0Y0EOUnJHO1z6', 9000, 'Operation', '/uploads/profileimages/1708866176.jpeg', 'Site Engineer', 'Full Time', '/uploads/userdoc/1708866176.rar', 191, 423, 0, 500, '01143104499', '1111-11-11', NULL, 1, 1500, 0, 2000, 'Whats App', 'Second Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-25 11:02:57', '2024-02-25 11:02:57'),
(207, 'Mohamed Ramadan Abdlnaby', 'Mohamed.Ramadan@staronegypt.com.eg', '20234', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$NgjgxtTpBOYirEDPw4PlwevXE6CuDTqJfdYwumyKGK5EHDEMlQda.', 7000, 'Warehouse', '/uploads/profileimages/1708866422.jpeg', 'Warehouse Assistant', 'Full Time', '/uploads/userdoc/1708866422.jpeg', 195, 432, 0, 500, '01143104499', '1111-11-11', NULL, 1, 1200, 0, 0, 'Whats App', 'Second Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-25 11:07:03', '2024-02-25 11:07:03'),
(208, 'Khalifa Aly Mohamed Ahmed', 'Khalifa.Aly@staronegypt.com.eg', '20235', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$qkoYEaTAK4esNpdB.3VLu.49uqgLLxT1nhDZXYhy9HHjfLIQbvmRm', 6000, 'Supply Chain', '/uploads/profileimages/1708866612.jpeg', 'Driver', 'Full Time', '/uploads/userdoc/1708866612.rar', 1, 0, 0, 0, '01143104499', '1111-11-11', NULL, 1, 600, 0, 400, 'Whats App', 'Second Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-25 11:10:13', '2024-02-25 11:10:13'),
(209, 'Mohamed Metwaly Galal', 'Mohamed.Metwaly@staronegypt.com.eg', '20236', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$Vtb1qZFxbAVY.GHGVaNotOFYf3RG7Q1nVGTMuCDi6KsO8M2klsbo2', 7000, 'Administration', '/uploads/profileimages/1708866852.png', 'Courier Representative', 'Full Time', '/uploads/userdoc/1708866852.png', 1, 432, 0, 500, '01143104499', '2024-02-04', NULL, 1, 700, 0, 0, 'Office', 'Second Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-25 11:14:12', '2024-02-25 11:14:12'),
(210, 'Mohamed Abdlnaser Abdalla', 'Mohamed.Abdlnaser@staronegypt.com.eg', '20239', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$LqZ0mbNY2ZiuK5125LmVu.JcLAL7SDIu/8JuhgpM1zbg.L1SjjuIO', 4500, 'Warehouse', '/uploads/profileimages/1708867389.png', 'Office Boy', 'Full Time', '/uploads/userdoc/1708867389.png', 195, 0, 0, 0, '01143104499', '1111-11-11', NULL, 1, 0, 0, 0, 'Whats App', 'Second Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-25 11:23:10', '2024-02-25 11:23:10'),
(211, 'Mina Gerges Hana Gayed', 'Mina.Gerges@staronegypt.com.eg', '20242', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$0TdGSI7nyML9DD6sXA4XkORlWseRoPibsugCMhEK3JrJd.7MaPqre', 7500, 'IT', '/uploads/profileimages/1708867534.png', 'Technical Support', 'Full Time', '/uploads/userdoc/1708867534.png', 1, 0, 0, 0, '01143104499', '1111-11-11', NULL, 1, 750, 0, 0, 'Office', 'Second Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-25 11:25:34', '2024-02-25 11:25:34'),
(212, 'Rania Mohamed', 'Rania.Mohamed@staronegypt.com.eg', '20261', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$vMCZmKFvnvEgNG1Xw7uaFOUYmQAQ6wySSgsA5VzKHKDdppPRgHqUy', 2000, 'Administration', '/uploads/profileimages/1708867701.png', 'Office Boy', 'Full Time', '/uploads/userdoc/1708867701.png', 1, 0, 0, 0, '01143104499', '1111-11-11', NULL, 1, 0, 0, 0, 'Office', 'Second Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-25 11:28:22', '2024-02-25 11:28:22'),
(213, 'Sherif Abdelmonem Mohammed Elsogher', 'Sherif.Abdelmonem@staronegypt.com.eg', '20297', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$9sgGkWYX3aMRPdnz.WmcGeEqVe.oZz/W9XHh0ZECG2JaaUoxvU57K', 6000, 'Financial Department', '/uploads/profileimages/1708869698.png', 'Courier Representative', 'Full Time', '/uploads/userdoc/1708869698.png', 192, 432, 0, 500, '01143104499', '1111-11-11', NULL, 1, 600, 0, 0, 'Office', 'Second Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-25 12:01:38', '2024-02-25 12:01:38'),
(214, 'Salma Abdelrahman Ebrahim Mahmoud', 'Salma.Abdelrahman@staronegypt.com.eg', '20326', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$As9.041dj0VmROY2Wk70lu49KtfH9RMg904XBdSzIqVbma9gIcLLu', 9000, 'Technical Office', '/uploads/profileimages/1708869908.jpeg', 'Technical Engineer', 'Full Time', '/uploads/userdoc/1708869908.rar', 188, 432, 0, 500, '01143104499', '1111-11-11', NULL, 1, 1600, 0, 0, 'Office', 'Second Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-25 12:05:08', '2024-02-25 12:05:08'),
(215, 'Nouran Mossad Sayed Abdelmtaal', 'Nouran.Mossad@staronegypt.com.eg', '20341', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$0ztEo9zgFFZSZMzy3PzUn.JoVuKmd3wX83s/NpohFljIT76vtT6PC', 6500, 'Operation', '/uploads/profileimages/1708870180.jpeg', 'Operations Engineer', 'Full Time', '/uploads/userdoc/1708870180.rar', 191, 0, 0, 0, '01143104499', '1111-11-11', NULL, 1, 650, 0, 0, 'Office', 'Second Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-25 12:09:41', '2024-02-25 12:09:41'),
(216, 'Ahmed Wael Esmail Abdelghfar', 'Ahmed.Wael@staronegypt.com.eg', '20353', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$ZxHkx6ojfVhaiGJfaW9s0uYsSzmlrrB8eY95v9ZP0ylXY6Q49C0XC', 9000, 'Operation', '/uploads/profileimages/1708870362.jpeg', 'Operations Engineer', 'Full Time', '/uploads/userdoc/1708870362.rar', 191, 432, 0, 500, '01143104499', '1111-11-11', NULL, 1, 1350, 0, 1800, 'Whats App', 'Second Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-25 12:12:43', '2024-02-25 12:12:43'),
(217, 'Dalia Mostafa Mohamed Hussien', 'Dalia.Mostafa@staronegypt.com.eg', '20356', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$vavNcYdfR.hClM/V88fM9uWlAT1ixj/gI1nwTVT2zlPLAXHcw5/fe', 6000, 'Financial Department', '/uploads/profileimages/1708870517.jpeg', 'Accountant', 'Full Time', '/uploads/userdoc/1708870517.rar', 192, 0, 0, 0, '01143104499', '1111-11-11', NULL, 1, 1000, 0, 0, 'Office', 'Second Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-25 12:15:17', '2024-02-25 12:15:17'),
(218, 'Abdallah Barakat Hassanien', 'Abdallah.Barakat@staronegypt.com.eg', '20358', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$soTJRKWpJSE22eTFKoFy2.MbYyGWyY7pnHH7b7ifublQTgQajCftu', 8500, 'Operation', '/uploads/profileimages/1708870697.jpeg', 'Operations Engineer', 'Full Time', '/uploads/userdoc/1708870697.rar', 191, 432, 0, 500, '01143104499', '1111-11-11', NULL, 1, 1300, 0, 1800, 'Whats App', 'Second Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-25 12:18:18', '2024-02-25 12:18:18'),
(219, 'Hamdy Ahmed Ahmed Elnazer', 'Hamdy.Ahmed@staronegypt.com.eg', '20334', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$qh3TVHZRBZC3BqfBjOYHmeJKh0VVjMa62HSuMDPaMoMWsO7Yqgof2', 6000, 'Supply Chain', '/uploads/profileimages/1708871000.jpeg', 'Warehouse Assistant', 'Full Time', '/uploads/userdoc/1708871000.rar', 1, 0, 0, 0, '01143104499', '1111-11-11', NULL, 1, 0, 0, 0, 'Whats App', 'Second Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-25 12:23:21', '2024-02-25 12:23:21'),
(220, 'Ibrahim Hesham Ibrahim', 'Ibrahim.Hesham@staronegypt.com.eg', '20375', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$Jz4YMYNxYGaiaey.tuzR0uHOqIO1HVunJSEXJDvSB7/3HsaFGNYwW', 10000, 'Sales', '/uploads/profileimages/1708871384.png', 'Sales Engineer', 'Full Time', '/uploads/userdoc/1708871384.png', 1, 0, 0, 0, '01143104499', '1111-11-11', NULL, 1, 0, 0, 2000, 'Office', 'Second Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-25 12:29:45', '2024-02-25 12:29:45'),
(221, 'Ahmed Mohamed Atef Fathy', 'Ahmed.Fathy@staronegypt.com.eg', '20374', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$sHRkGUTQyFhLOW7uWXbKou1IpT3rddy2KDNC9MaPOjfe5eJ3kA75e', 7000, 'Operation', '/uploads/profileimages/1708871553.png', 'Site Engineer', 'Full Time', '/uploads/userdoc/1708871553.png', 191, 432, 0, 500, '01143104499', '1111-11-11', NULL, 1, 1100, 0, 1800, 'Whats App', 'Second Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-25 12:32:33', '2024-02-25 12:32:33'),
(222, 'Manal Fathy Farg allh Elfazaery', 'Manal.Fathy@staronegypt.com.eg', '20387', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$CObrSXfxalkP9GgxTp7Np.CvyUw3ulJ2vlp5uLgUa2irqob/FUeWC', 4000, 'Administration', '/uploads/profileimages/1708871639.png', 'Office Girl', 'Full Time', '/uploads/userdoc/1708871639.png', 198, 0, 0, 0, '01143104499', '1111-11-11', NULL, 1, 0, 0, 0, 'Office', 'Second Staff', 'G&A', 'Saturday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-25 12:33:59', '2024-02-25 12:33:59'),
(223, 'Mostafa Mohamed Mohamed Ahmed', 'Mostafa.mohamed@staronegypt.com.eg', '20262', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$u5ZmdxmDGtsPq2tHiuJFvOevZis4dmZ0OakxtFlDwSsxr7fbhx7N2', 5000, 'Warehouse', '/uploads/profileimages/1708871840.png', 'Site Supervisor', 'Full Time', '/uploads/userdoc/1708871840.png', 195, 0, 0, 0, '01143104499', '1111-11-11', NULL, 1, 0, 0, 0, 'Whats App', 'Third Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-25 12:37:20', '2024-02-25 12:37:20'),
(224, 'Ehab Abdelraaowf Mohamed Kmal Mohamed', 'Ehab.Abdelraaowf@staronegypt.com.eg', '20283', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$5aK9BhAvl9b.7uC0rBiO.OvmNWYAye1shOyMix6LN.OelJG.RjgzC', 9000, 'Warehouse', '/uploads/profileimages/1708872732.jpeg', 'Carpenter', 'Full Time', '/uploads/userdoc/1708872732.rar', 195, 0, 0, 0, '01143104499', '1111-11-11', NULL, 1, 1000, 0, 1534, 'Whats App', 'Fourth Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-25 12:52:14', '2024-02-25 12:52:14'),
(225, 'Mohamed Rashed Mohamed Refaay', 'Mohamed.Rashed@staronegypt.com.eg', '20285', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$rbWGzXKqNEpReI.g7797Yu3N0tbWlRhu49IgwtgMUPB5/HheauUVK', 8500, 'Warehouse', '/uploads/profileimages/1708872920.jpeg', 'Carpenter', 'Full Time', '/uploads/userdoc/1708872920.jpeg', 195, 0, 0, 0, '01143104499', '1111-11-11', NULL, 1, 1000, 0, 1204, 'Whats App', 'Fourth Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-25 12:55:23', '2024-02-25 12:55:23'),
(226, 'Shaaban Mamdoh Mohamed Metwaly', 'Shaaban.Mamdoh@staronegypt.com.eg', '20309', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$rL51JMHcO3qow.Po.NHB6OUmpsn3VINdn1.LFWwiTh5dZLABv1LSK', 5000, 'Warehouse', '/uploads/profileimages/1708873134.jpeg', 'Solid Surface - Factory Worker', 'Full Time', '/uploads/userdoc/1708873134.rar', 195, 0, 0, 0, '01143104499', '1111-11-11', NULL, 1, 1000, 0, 0, 'Whats App', 'Fourth Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-25 12:58:59', '2024-02-25 12:58:59'),
(227, 'Ahmed Sayed Mohamed', 'Ahmed.Sayed@staronegypt.com.eg', '20240', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$mH5y16SS..c6.Hh8mG8umeYZHAztQ3QgJrKMLr74h1P7gR.8v9JWy', 4200, 'Warehouse', '/uploads/profileimages/1708873231.png', 'Security', 'Full Time', '/uploads/userdoc/1708873231.png', 195, 0, 0, 0, '01143104499', '1111-11-11', NULL, 1, 0, 0, 0, 'Whats App', 'Fourth Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-25 13:00:31', '2024-02-25 13:00:31'),
(228, 'Wael Mohamed Nour', 'Wael.Mohamed@staronegypt.com.eg', '20259', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$LrfwTLyZRmPCntAmC0LhPOaSd2lWjwXUe/WdxUKcCK/tC07YqZJC.', 5300, 'Warehouse', '/uploads/profileimages/1708873394.png', 'Labor', 'Full Time', '/uploads/userdoc/1708873394.png', 195, 432, 0, 500, '01143104499', '1111-11-11', NULL, 1, 1500, 0, 0, 'Whats App', 'Fourth Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-25 13:03:14', '2024-02-25 13:03:14'),
(229, 'Samuel Gamel', 'Samuel.Gamel@staronegypt.com.eg', '20321', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$X9TfrmAVIU6l0JRUYwGr5e7VplfWIe/L6nClGT2sgYzY573MFbeiW', 8500, 'Supply Chain', '/uploads/profileimages/1708874470.jpeg', 'Procurement Specialist', 'Full Time', '/uploads/userdoc/1708874470.jpeg', 1, 432, 0, 500, '01143104499', '1111-11-11', NULL, 1, 1700, 0, 0, 'Whats App', 'Second Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-25 13:21:11', '2024-02-25 13:21:11'),
(230, 'Mahmoud Ali', 'Mahmoud.Ali@staronegypt.com.eg', '20390', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$crhRPFhzteUCGykjoJeYmuUsxEyvPreNyipR5vOrhEi2zWx6BAXFa', 10000, 'Sales', '/uploads/profileimages/1708874632.png', 'Sales Engineer', 'Full Time', '/uploads/userdoc/1708874632.png', 1, 0, 0, 0, '01143104499', '1111-11-11', NULL, 1, 0, 0, 2000, 'Office', 'Second Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-25 13:23:52', '2024-02-25 13:23:52'),
(231, 'Suzan Atiallah', 'Suzan.Atiallah@staronegypt.com.eg', '20389', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$R/QdGkRBU9yMs/ijHf50EuNIkpHXmHNSaxScaDlS3xq2Quj6kRNLu', 4000, 'Administration', '/uploads/profileimages/1708874794.png', 'Office Girl', 'Full Time', '/uploads/userdoc/1708874794.png', 198, 0, 0, 0, '01143104499', '1111-11-11', NULL, 1, 0, 0, 0, 'Office', 'Fourth Staff', 'G&A', 'Saturday', 'Thursday', '07:00:00', '16:00:00', NULL, NULL, '2024-02-25 13:26:35', '2024-02-25 13:26:35'),
(232, 'Amany Youssef', 'Amany.Youssef@staronegypt.com.eg', '20338', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$VyvI/NtmATuh5gm.i.iCp.miS60I5cXCP0WJLsNHFq6RElA577jiq', 12000, 'Human Resource', '/uploads/profileimages/1708874988.png', 'HR Administrator', 'Full Time', '/uploads/userdoc/1708874988.png', 201, 0, 0, 0, '01143104499', '1111-11-11', NULL, 1, 1000, 0, 0, 'Office', 'Second Staff', 'G&A', 'Sunday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-25 13:29:48', '2024-02-25 13:29:48'),
(233, 'Mohamed AbdelStar Ali', 'Mohamed.AbdelStar@staronegypt.com.eg', '20379', '1111-11-11', '6 st kamel elsemy twabik faisel', '$2y$12$VIRF87gMgJ5Ojct.OIHdW.LTeGO9FK9L2KRR77rlPg0OIAgp10yWO', 4000, 'Administration', '/uploads/profileimages/1708875164.png', 'Security', 'Full Time', '/uploads/userdoc/1708875164.png', 198, 0, 0, 0, '01143104499', '1111-11-11', NULL, 1, 0, 0, 0, 'Office', 'Fourth Staff', 'G&A', 'Saturday', 'Thursday', '09:00:00', '18:00:00', NULL, NULL, '2024-02-25 13:32:45', '2024-02-25 13:32:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_hr_code_unique` (`hr_code`),
  ADD KEY `users_supervisor_foreign` (`Supervisor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_supervisor_foreign` FOREIGN KEY (`Supervisor`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
