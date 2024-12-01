-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2024 at 03:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujikom_template`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_name`, `phone`, `address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Tomo', '0890823434564', 'Bekasi', '2024-11-29 17:37:19', '2024-11-29 17:37:19', 0),
(2, 'Eben', '0876734546787', 'Jakarta', '2024-11-29 17:37:19', '2024-11-29 17:37:19', 0),
(3, 'Wahyu', '0568524786157', 'Solo', '2024-11-29 17:37:19', '2024-11-29 17:37:19', 0),
(4, 'Edwar', '0845212649567', 'Malang', '2024-11-29 17:37:19', '2024-11-29 17:37:19', 0),
(5, 'Ozi', '0865915473695', 'Karawang', '2024-11-29 17:37:19', '2024-11-29 17:37:19', 0),
(6, 'Gilang', '0835815648527', 'Surabaya', '2024-11-29 17:37:19', '2024-11-29 17:37:19', 0),
(7, 'Atio', '0845681742694', 'Kuningan', '2024-11-29 17:37:19', '2024-11-29 17:37:19', 0),
(8, 'Rizky', '0814714689532', 'Medan', '2024-11-29 17:37:19', '2024-11-29 17:37:19', 0),
(9, 'Thariq', '0814536251984', 'Makassar', '2024-11-29 17:37:19', '2024-11-29 17:37:19', 0),
(10, 'Qaulan', '0814526591874', 'Lembang', '2024-11-29 17:37:19', '2024-11-29 17:37:19', 0),
(11, 'Dhanti', '0842601593654', 'Tegal', '2024-11-29 17:37:19', '2024-11-29 17:37:19', 0),
(12, 'Nanas', '0826482514135', 'Yogyakarta', '2024-11-29 17:37:19', '2024-11-29 17:37:19', 0),
(13, 'Rangga', '0836516724573', 'Denpasar', '2024-11-29 17:37:19', '2024-11-29 17:37:19', 0),
(14, 'Hana', '0562012642568', 'Subang', '2024-11-29 17:37:19', '2024-11-29 17:37:19', 0),
(15, 'Finka', '0815641259472', 'Jayapura', '2024-11-29 17:37:19', '2024-11-29 17:37:19', 0),
(16, 'Ajeng', '0812602540259', 'Blitar', '2024-11-29 17:37:19', '2024-11-29 17:37:19', 0),
(17, 'Fifi', '0826014035970', 'Gondangdia', '2024-11-29 17:37:19', '2024-11-29 17:37:19', 0),
(18, 'Andri', '086809542657', 'Pontianak', '2024-11-29 17:37:19', '2024-11-29 17:37:19', 0),
(19, 'Yusuf', '0868103591420', 'Ternate', '2024-11-29 17:37:19', '2024-11-29 17:37:19', 0),
(20, 'Pak Reza', '0810526410359', 'Cakung', '2024-11-29 17:37:19', '2024-11-29 17:37:19', 0),
(21, 'Bu Ria', '0832102149520', 'Lampung', '2024-11-29 17:37:19', '2024-11-29 17:37:19', 0),
(22, 'Pak Tri', '0814032681054', 'Manado', '2024-11-29 17:37:19', '2024-11-29 17:37:19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `level_name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `level_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'User', '2024-11-11 02:11:05', '2024-11-15 01:37:10', 0),
(2, 'Operator', '2024-11-11 02:11:05', '2024-11-15 01:36:53', 0),
(3, 'Admin', '2024-11-11 02:11:24', '2024-11-15 01:36:48', 0),
(4, 'tes123', '2024-11-12 07:48:13', '2024-11-15 02:20:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trans_laundry_pickup`
--

CREATE TABLE `trans_laundry_pickup` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `pickup_date` date NOT NULL,
  `pickup_pay` int(11) NOT NULL,
  `pickup_change` int(11) NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trans_laundry_pickup`
--

INSERT INTO `trans_laundry_pickup` (`id`, `id_order`, `id_customer`, `pickup_date`, `pickup_pay`, `pickup_change`, `notes`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 38, 1, '2024-12-02', 100000, 55000, '', '2024-12-01 04:53:43', '2024-12-01 04:53:43', 0),
(4, 37, 2, '2024-12-02', 50000, 12000, NULL, '2024-12-01 05:47:45', '2024-12-01 05:47:45', 0);

-- --------------------------------------------------------

--
-- Table structure for table `trans_order`
--

CREATE TABLE `trans_order` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `order_code` varchar(50) NOT NULL,
  `order_date` varchar(50) NOT NULL,
  `order_status` tinyint(11) NOT NULL DEFAULT 0,
  `total_price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trans_order`
--

INSERT INTO `trans_order` (`id`, `id_customer`, `order_code`, `order_date`, `order_status`, `total_price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(37, 2, 'LNDRY-202412010506421', '2024-12-01', 1, 38000, '2024-12-01 04:06:57', '2024-12-01 05:47:45', 0),
(38, 1, 'LNDRY-2024120105070939', '2024-12-01', 1, 45000, '2024-12-01 04:07:34', '2024-12-01 04:53:43', 0),
(39, 5, 'LNDRY-2024120106545140', '2024-12-02', 0, 13500, '2024-12-01 05:55:04', '2024-12-01 05:55:04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `trans_order_detail`
--

CREATE TABLE `trans_order_detail` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_service` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trans_order_detail`
--

INSERT INTO `trans_order_detail` (`id`, `id_order`, `id_service`, `qty`, `subtotal`, `notes`, `created_at`, `updated_at`, `deleted_at`) VALUES
(38, 37, 1, 4, 24000, NULL, '2024-12-01 04:06:57', '2024-12-01 04:06:57', 0),
(39, 37, 4, 2, 14000, NULL, '2024-12-01 04:06:57', '2024-12-01 04:06:57', 0),
(40, 38, 1, 4, 24000, NULL, '2024-12-01 04:07:34', '2024-12-01 04:07:34', 0),
(41, 38, 4, 3, 21000, NULL, '2024-12-01 04:07:34', '2024-12-01 04:07:34', 0),
(42, 39, 2, 3, 13500, NULL, '2024-12-01 05:55:04', '2024-12-01 05:55:04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `type_of_service`
--

CREATE TABLE `type_of_service` (
  `id` int(11) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type_of_service`
--

INSERT INTO `type_of_service` (`id`, `service_name`, `price`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cuci dan Gosok', 6000, 'Free wife', '2024-11-15 02:58:44', '2024-11-15 06:42:22', 0),
(2, 'Hanya Cuci', 4500, '', '2024-11-15 03:09:17', '2024-11-15 03:09:17', 0),
(3, 'Hanya Gosok ', 5000, '', '2024-11-15 03:10:15', '2024-11-15 03:10:15', 0),
(4, ' Laundry Besar', 7000, ' Seperti selimut, karpet, mantel dan sprei my love', '2024-11-15 03:10:35', '2024-11-30 14:08:30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profile_picture` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `id_level`, `username`, `email`, `password`, `profile_picture`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 'Admin', 'admin@gmail.com', '12345678', 'profile_picture1.jpg', '2024-11-11 02:30:45', '2024-11-28 13:02:50', 0),
(13, 3, 'Bang Ganteng', 'bang.ganteng@gmail.com', '12345678', 'profile_picture13.jpeg', '2024-11-28 12:04:23', '2024-11-28 12:58:11', 0),
(14, 3, 'Mia K.', 'mia.k@gmail.com', '12345678', 'profile_picture14.jpeg', '2024-11-28 12:16:42', '2024-11-28 12:58:06', 0),
(15, 3, 'Mr. Bean', 'mr.bean@gmail.com', '12345678', 'profile_picture15.jpg', '2024-11-28 12:24:47', '2024-11-28 12:57:59', 0),
(16, 0, 'Sumanto', 'sumanto@gmail.com', '12345678', 'profile_picture16.jpg', '2024-11-28 13:05:03', '2024-11-28 13:05:26', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_laundry_pickup`
--
ALTER TABLE `trans_laundry_pickup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_order`
--
ALTER TABLE `trans_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_order_detail`
--
ALTER TABLE `trans_order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_of_service`
--
ALTER TABLE `type_of_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trans_laundry_pickup`
--
ALTER TABLE `trans_laundry_pickup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trans_order`
--
ALTER TABLE `trans_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `trans_order_detail`
--
ALTER TABLE `trans_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `type_of_service`
--
ALTER TABLE `type_of_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
