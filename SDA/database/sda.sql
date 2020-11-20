-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2020 at 08:21 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sda`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit`
--

CREATE TABLE `audit` (
  `id` int(11) NOT NULL,
  `station_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `action` varchar(50) NOT NULL,
  `affected` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit`
--

INSERT INTO `audit` (`id`, `station_id`, `username`, `action`, `affected`, `date`) VALUES
(14, 1, 'sirmartin@gmail.com', 'Login', 'Only Login', '2020-08-19 22:44:22'),
(15, 1, 'sirmartin@gmail.com', 'Added a Police Officer', 'Fipre Central', '2020-08-19 23:12:41'),
(16, 1, 'sirmartin@gmail.com', 'Added a Police Officer', 'South-West', '2020-08-20 00:34:22'),
(17, 1, 'sirmartin@gmail.com', 'Added a Police Officer', 'Chiraa', '2020-08-20 01:00:49'),
(18, 1, 'sirmartin@gmail.com', 'Added a Police Officer', 'Odumase', '2020-08-20 01:01:07'),
(19, 1, 'sirmartin@gmail.com', 'Added a User', 'Martin Yeboah', '2020-08-20 01:13:33'),
(20, 2, 'greenview@gmail.com', 'Login', 'Only Login', '2020-08-20 01:17:20'),
(21, 2, 'greenview@gmail.com', 'Added a Police Officer', 'Goaso Central', '2020-08-20 01:18:29'),
(22, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-08-20 01:28:30'),
(23, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Amoah Simon', '2020-08-20 16:05:54'),
(24, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Martin Yeboah', '2020-08-20 16:11:53'),
(25, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Martin Yeboah', '2020-08-20 16:12:39'),
(26, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Martin Yeboah', '2020-08-20 16:13:38'),
(27, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Martin Yeboah', '2020-08-20 16:14:44'),
(28, 1, 'ymartin951@gmail.com', 'Added a Police Officer', '', '2020-08-20 18:18:53'),
(29, 1, 'ymartin951@gmail.com', 'Added a Police Officer', '', '2020-08-20 18:20:01'),
(30, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Nancy Gyau', '2020-08-20 18:23:08'),
(31, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Obeng Mensah', '2020-08-20 18:27:20'),
(32, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-08-21 05:14:39'),
(33, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-08-21 05:15:38'),
(34, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Clinton Nicholas', '2020-08-21 05:16:07'),
(35, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Clinton Nicholas', '2020-08-21 05:16:48'),
(36, 1, 'sirmartin@gmail.com', 'Login', 'Only Login', '2020-08-21 05:17:53'),
(37, 1, 'sirmartin@gmail.com', 'Login', 'Only Login', '2020-08-21 05:20:39'),
(38, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-08-21 11:34:16'),
(39, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Kwame Acheampong', '2020-08-22 03:45:56'),
(40, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-08-22 07:07:34'),
(41, 2, 'greenview@gmail.com', 'Login', 'Only Login', '2020-08-22 07:12:56'),
(42, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-08-22 07:47:37'),
(43, 2, 'greenview@gmail.com', 'Login', 'Only Login', '2020-08-22 08:01:41'),
(44, 2, 'greenview@gmail.com', 'Added a Police Officer', 'Martin Yeboah', '2020-08-22 08:25:23'),
(45, 2, 'greenview@gmail.com', 'Added a Police Officer', 'Marfo Felix', '2020-08-22 22:52:04'),
(46, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-08-23 05:30:07'),
(47, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-08-23 07:14:49'),
(48, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-08-23 07:31:04'),
(49, 1, 'sirmartin@gmail.com', 'Login', 'Only Login', '2020-08-24 16:46:21'),
(50, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-08-24 17:32:45'),
(51, 1, 'sirmartin@gmail.com', 'Login', 'Only Login', '2020-08-24 17:33:04'),
(52, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-08-24 17:39:03'),
(53, 1, 'sirmartin@gmail.com', 'Login', 'Only Login', '2020-08-24 17:43:24'),
(54, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-08-24 17:55:37'),
(55, 1, 'sirmartin@gmail.com', 'Login', 'Only Login', '2020-08-24 17:56:09'),
(56, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-08-24 18:08:17'),
(57, 1, 'sirmartin@gmail.com', 'Login', 'Only Login', '2020-08-24 18:08:46'),
(58, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-08-24 18:11:53'),
(59, 1, 'sirmartin@gmail.com', 'Login', 'Only Login', '2020-08-24 18:12:42'),
(60, 1, 'sirmartin@gmail.com', 'Added a Police Officer', 'Nsuatre Central', '2020-08-24 18:17:32'),
(61, 1, 'sirmartin@gmail.com', 'Login', 'Only Login', '2020-08-24 18:25:00'),
(62, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-08-24 18:31:05'),
(63, 1, 'sirmartin@gmail.com', 'Login', 'Only Login', '2020-08-24 18:38:18'),
(64, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-08-24 23:43:58'),
(65, 1, 'sirmartin@gmail.com', 'Login', 'Only Login', '2020-08-24 23:44:50'),
(66, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-08-25 01:27:11'),
(67, 1, 'sirmartin@gmail.com', 'Login', 'Only Login', '2020-08-25 01:28:10'),
(68, 1, 'sirmartin@gmail.com', 'Added a Police Officer', 'Dumasua Central', '2020-08-25 01:51:44'),
(69, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-08-25 04:55:55'),
(70, 1, 'sirmartin@gmail.com', 'Login', 'Only Login', '2020-08-25 06:27:33'),
(71, 1, 'sirmartin@gmail.com', 'Added a User', 'Martin Yeboah', '2020-08-25 19:32:21'),
(72, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-08-25 20:50:07'),
(73, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Serwaa Ruth', '2020-08-25 20:50:49'),
(74, 1, 'sirmartin@gmail.com', 'Login', 'Only Login', '2020-08-25 20:54:10'),
(75, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-08-25 20:56:21'),
(76, 1, 'sirmartin@gmail.com', 'Login', 'Only Login', '2020-08-25 21:11:07'),
(77, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-08-25 21:13:36'),
(78, 1, 'sirmartin@gmail.com', 'Login', 'Only Login', '2020-08-25 21:56:23'),
(79, 1, 'sirmartin@gmail.com', 'Login', 'Only Login', '2020-08-25 22:38:58'),
(80, 1, 'sirmartin@gmail.com', 'Login', 'Only Login', '2020-08-25 22:42:30'),
(81, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-08-25 22:42:52'),
(82, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Pastor Frank', '2020-08-25 22:43:25'),
(83, 1, 'sirmartin@gmail.com', 'Login', 'Only Login', '2020-08-25 22:47:09'),
(84, 1, 'sirmartin@gmail.com', 'Login', 'Only Login', '2020-08-26 00:18:30'),
(85, 1, 'sirmartin@gmail.com', 'Login', 'Only Login', '2020-08-26 15:26:44'),
(86, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-08-26 15:46:37'),
(87, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-08-26 15:47:53'),
(88, 1, 'sirmartin@gmail.com', 'Login', 'Only Login', '2020-08-26 16:22:20'),
(89, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-08-26 18:03:58'),
(90, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-08-26 19:37:32'),
(91, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Michael Danson', '2020-08-26 19:38:07'),
(92, 1, 'sirmartin@gmail.com', 'Login', 'Only Login', '2020-08-26 19:41:46'),
(93, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-08-26 19:57:16'),
(94, 1, 'sirmartin@gmail.com', 'Login', 'Only Login', '2020-08-27 19:06:08'),
(95, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-08-27 19:08:09'),
(96, 1, 'sirmartin@gmail.com', 'Login', 'Only Login', '2020-08-27 19:41:58'),
(97, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-08-28 20:22:29'),
(98, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-08-28 20:27:43'),
(99, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-08-28 20:53:51'),
(100, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-08-28 20:56:06'),
(101, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-08-28 20:59:05'),
(102, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Agyemang Francis', '2020-08-29 20:36:03'),
(103, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Anna Gyamfua', '2020-08-29 20:37:31'),
(104, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Agness Amponsah', '2020-08-29 20:41:02'),
(105, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Obeng Mensah', '2020-08-29 20:48:54'),
(106, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'E K Boahen', '2020-08-29 20:51:23'),
(107, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Tenni Yera', '2020-08-29 20:55:30'),
(108, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Gideon Effah', '2020-08-29 20:56:47'),
(109, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Ellen Takyiwaa', '2020-08-29 20:58:36'),
(110, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Rebecca Kyeremaa', '2020-08-29 21:00:30'),
(111, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Abigail Manu Larbi', '2020-08-29 21:02:50'),
(112, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Ps Frank Adu', '2020-08-29 21:06:01'),
(113, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Eric Amponsah', '2020-08-29 21:07:36'),
(114, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Sarpomaa Christiana', '2020-08-29 21:08:57'),
(115, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Sarpomaa Christiana', '2020-08-29 21:09:12'),
(116, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Hannah Arhin', '2020-08-29 21:10:22'),
(117, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Margret Boahen', '2020-08-29 21:12:06'),
(118, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Bright Ofori', '2020-08-29 21:14:52'),
(119, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Juliana Osei Kissiwa', '2020-08-29 21:27:17'),
(120, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Mr  Mrs Kumi Gyamfi', '2020-08-29 21:30:54'),
(121, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Theresa Tuffour', '2020-08-29 21:31:57'),
(122, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Victoria Ama Takyiwaa', '2020-08-29 21:34:57'),
(123, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Hanson Sakyi', '2020-08-29 21:36:08'),
(124, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Gideon O Amoh', '2020-08-29 21:37:20'),
(125, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Daniel Yeboah', '2020-08-29 21:37:57'),
(126, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Opoku Yaw', '2020-08-29 21:38:46'),
(127, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Lydia Adutwumwaa', '2020-08-29 21:39:48'),
(128, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Maxwell Konadu', '2020-08-29 21:41:09'),
(129, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Mr  Mrs Osei Kofi', '2020-08-29 21:42:53'),
(130, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Mr & Mrs Amoh Victor', '2020-08-29 21:45:49'),
(131, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Mrs Comfort Antwi', '2020-08-29 21:51:42'),
(132, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Boahemaa Eunice', '2020-08-29 21:52:56'),
(133, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Richmond Owusu Barnie', '2020-08-29 21:56:05'),
(134, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Daniel Amoh', '2020-08-29 21:58:33'),
(135, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Ruth Adobea', '2020-08-29 22:01:47'),
(136, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Abraham N. Wonnu', '2020-08-29 22:03:41'),
(137, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Yuoni David', '2020-08-29 22:06:07'),
(138, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Janet Nsiah', '2020-08-29 22:17:36'),
(139, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Florence Sakyi', '2020-08-29 22:18:44'),
(140, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Adusei Kwadwo', '2020-08-29 22:19:17'),
(141, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Vida Abbertteh', '2020-08-29 22:20:03'),
(142, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Williams Danquah', '2020-08-29 22:20:45'),
(143, 1, 'sirmartin@gmail.com', 'Login', 'Only Login', '2020-08-31 20:28:57'),
(144, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-08-31 20:29:59'),
(145, 2, 'sirmartin23@gmail.com', 'Login', 'Only Login', '2020-08-31 20:35:20'),
(146, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-08-31 21:22:12'),
(147, 1, 'sirmartin@gmail.com', 'Login', 'Only Login', '2020-09-01 16:08:53'),
(148, 1, 'sirmartin@gmail.com', 'Login', 'Only Login', '2020-09-01 16:08:53'),
(149, 1, 'sirmartin@gmail.com', 'Added a Police Officer', 'Penkwase', '2020-09-01 16:14:52'),
(150, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-09-01 16:45:51'),
(151, 1, 'sirmartin@gmail.com', 'Login', 'Only Login', '2020-09-01 18:56:47'),
(152, 1, 'sirmartin@gmail.com', 'Login', 'Only Login', '2020-09-02 23:10:49'),
(153, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-09-09 19:50:45'),
(154, 1, 'sirmartin@gmail.com', 'Login', 'Only Login', '2020-09-10 15:00:41'),
(155, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-09-11 01:14:27'),
(156, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-09-16 10:44:37'),
(157, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-09-18 01:57:50'),
(158, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-09-19 18:53:45'),
(159, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-10-12 15:06:45'),
(160, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-10-15 23:07:08'),
(161, 1, 'sirmartin@gmail.com', 'Login', 'Only Login', '2020-10-22 05:41:43'),
(162, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-10-22 05:43:19'),
(163, 1, 'ymartin951@gmail.com', 'Login', 'Only Login', '2020-10-29 16:08:17'),
(164, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Serwaa Ruths', '2020-10-29 16:10:10'),
(165, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Gyimah Prince', '2020-10-29 16:17:29'),
(166, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Delali', '2020-10-29 16:21:50'),
(167, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Delali Two', '2020-10-29 16:22:24'),
(168, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Akua Serwaa', '2020-10-29 16:26:51'),
(169, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Akua Serwaa', '2020-10-29 16:27:36'),
(170, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Akua Serwaa', '2020-10-29 16:27:45'),
(171, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Akua Serwaa', '2020-10-29 16:28:13'),
(172, 1, 'ymartin951@gmail.com', 'Added a Police Officer', 'Christy', '2020-10-29 16:35:10'),
(173, 1, 'Yeboah Martin', 'Login', 'Only Login', '2020-10-29 18:29:28'),
(174, 3, 'sirmartin@gmail.com', 'Login', 'Only Login', '2020-10-29 19:48:00'),
(175, 3, 'sirmartin@gmail.com', 'Added a Police Officer', 'South-West', '2020-10-29 19:49:17'),
(176, 3, 'sirmartin@gmail.com', 'Added a Police Officer', 'South-West', '2020-10-29 19:51:22'),
(177, 3, 'sirmartin@gmail.com', 'Added a Police Officer', 'Fipre Central', '2020-10-29 19:54:15'),
(178, 3, 'sirmartin@gmail.com', 'Added a Police Officer', 'Fipre Central', '2020-10-29 20:14:41');

-- --------------------------------------------------------

--
-- Table structure for table `churches`
--

CREATE TABLE `churches` (
  `id` int(11) NOT NULL,
  `station_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `location` varchar(255) NOT NULL,
  `district` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `churches`
--

INSERT INTO `churches` (`id`, `station_id`, `name`, `location`, `district`) VALUES
(5, 3, 'Fipre Central', 'Fiapre', 5);

-- --------------------------------------------------------

--
-- Table structure for table `conferences`
--

CREATE TABLE `conferences` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `region` varchar(30) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conferences`
--

INSERT INTO `conferences` (`id`, `name`, `region`, `location`) VALUES
(3, 'Mid-West Ghana Conference', 'Bono Region', 'Sunyani'),
(4, 'Green-View', 'Ahafo', 'Goaso');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(11) NOT NULL,
  `station_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `station_id`, `name`) VALUES
(5, 3, 'South-West');

-- --------------------------------------------------------

--
-- Table structure for table `others`
--

CREATE TABLE `others` (
  `id` int(11) NOT NULL,
  `station` int(11) NOT NULL,
  `district` int(11) NOT NULL,
  `loose` double NOT NULL,
  `mission` double NOT NULL,
  `sabbathSc` double NOT NULL,
  `bdedication` double NOT NULL,
  `paymentdate` varchar(50) NOT NULL,
  `month` varchar(50) NOT NULL,
  `year` int(11) NOT NULL,
  `week` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payers`
--

CREATE TABLE `payers` (
  `payer` int(11) NOT NULL,
  `station_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `period`
--

CREATE TABLE `period` (
  `id` int(11) NOT NULL,
  `dates` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `period`
--

INSERT INTO `period` (`id`, `dates`) VALUES
(1, '21 Aug'),
(2, '21 Aug'),
(3, '22 Aug');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `church` varchar(255) NOT NULL,
  `district` int(11) NOT NULL,
  `tithe` decimal(10,2) NOT NULL,
  `offering` decimal(10,2) NOT NULL,
  `thanks` decimal(10,2) NOT NULL,
  `others` decimal(10,2) NOT NULL,
  `mission` decimal(10,2) NOT NULL,
  `loose` decimal(10,2) NOT NULL,
  `sabbath` decimal(10,2) NOT NULL,
  `month` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tithe`
--

CREATE TABLE `tithe` (
  `id` int(11) NOT NULL,
  `station` int(11) NOT NULL,
  `district` int(11) NOT NULL,
  `payer` int(11) NOT NULL,
  `tithe` decimal(10,2) NOT NULL,
  `offering` decimal(10,2) NOT NULL,
  `others` decimal(10,2) NOT NULL,
  `thanks` decimal(10,2) NOT NULL,
  `type` varchar(255) NOT NULL,
  `paymentdate` varchar(50) NOT NULL,
  `month` varchar(50) NOT NULL,
  `year` varchar(5) NOT NULL,
  `week` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `station_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sex` varchar(8) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rank` varchar(25) NOT NULL,
  `role` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date_added` date NOT NULL,
  `type` varchar(10) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `station_id`, `name`, `sex`, `address`, `phone`, `password`, `rank`, `role`, `email`, `date_added`, `type`, `image`) VALUES
(14, 3, '', '', '', '', '$2y$10$BbuGZAzYVXxA.alAYNYj.e3pZuBBlEVxyoqyi9aJTZ83u3ivqnfBq', '', 'Admin', 'Sirmartin@gmail.com', '2020-10-29', 'Conference', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit`
--
ALTER TABLE `audit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `churches`
--
ALTER TABLE `churches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conferences`
--
ALTER TABLE `conferences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `others`
--
ALTER TABLE `others`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payers`
--
ALTER TABLE `payers`
  ADD PRIMARY KEY (`payer`);

--
-- Indexes for table `period`
--
ALTER TABLE `period`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tithe`
--
ALTER TABLE `tithe`
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
-- AUTO_INCREMENT for table `audit`
--
ALTER TABLE `audit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `churches`
--
ALTER TABLE `churches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `conferences`
--
ALTER TABLE `conferences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `others`
--
ALTER TABLE `others`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payers`
--
ALTER TABLE `payers`
  MODIFY `payer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `period`
--
ALTER TABLE `period`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tithe`
--
ALTER TABLE `tithe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
