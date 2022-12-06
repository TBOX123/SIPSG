-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 03:25 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipsg`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_activation_attempts`
--

INSERT INTO `auth_activation_attempts` (`id`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '05dbb9df5ef33f7f905ee9decb0bd807', '2022-11-07 00:48:38');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'SIPSG@gmail.com', NULL, '2022-11-01 10:23:21', 0),
(2, '::1', 'SIPSG@gmail.com', NULL, '2022-11-01 10:26:05', 0),
(3, '::1', 'SIPSG@gmail.com', NULL, '2022-11-01 10:33:31', 0),
(4, '::1', 'SIPSG1@gmail.com', 2, '2022-11-01 10:37:16', 1),
(5, '::1', 'SIPSG1@gmail.com', NULL, '2022-11-01 10:45:43', 0),
(6, '::1', 'SIPSG@gmail.com', NULL, '2022-11-01 10:45:57', 0),
(7, '::1', 'SIPSG@gmail.com', NULL, '2022-11-01 10:46:10', 0),
(8, '::1', 'SIPSG@gmail.com', NULL, '2022-11-01 10:46:29', 0),
(9, '::1', 'SIPSG1@gmail.com', NULL, '2022-11-01 10:46:44', 0),
(10, '::1', 'SIPSG', NULL, '2022-11-01 10:47:14', 0),
(11, '::1', 'SIPSG1@gmail.com', NULL, '2022-11-01 10:47:46', 0),
(12, '::1', 'SIPSG@gmail.com', NULL, '2022-11-01 10:48:02', 0),
(13, '::1', 'SIPSG@gmail.com', NULL, '2022-11-01 10:49:06', 0),
(14, '::1', 'SIPSG@gmail.com', NULL, '2022-11-01 10:49:45', 0),
(15, '::1', 'SIPSG@gmail.com', NULL, '2022-11-01 10:52:13', 0),
(16, '::1', 'SIPSG@gmail.com', NULL, '2022-11-01 10:53:47', 0),
(17, '::1', 'SIPSG@gmail.com', NULL, '2022-11-01 10:54:29', 0),
(18, '::1', 'owner1@gmail.com', NULL, '2022-11-01 10:55:23', 0),
(19, '::1', 'SIPSG@gmail.com', NULL, '2022-11-01 11:21:57', 0),
(20, '::1', 'SIPSG@gmail.com', NULL, '2022-11-01 11:22:34', 0),
(21, '::1', 'SIPSG@gmail.com', NULL, '2022-11-01 11:43:59', 0),
(22, '::1', 'SIPSG1@gmail.com', NULL, '2022-11-01 12:04:19', 0),
(23, '::1', 'SIPSG', NULL, '2022-11-01 12:04:37', 0),
(24, '::1', 'SIPSG@gmail.com', NULL, '2022-11-01 12:04:55', 0),
(25, '::1', 'SIPSG@gmail.com', NULL, '2022-11-01 19:35:22', 0),
(26, '::1', 'SIWEBB1@gmail.com', NULL, '2022-11-01 19:42:05', 0),
(27, '::1', 'SIPSG1@gmail.com', 3, '2022-11-01 19:42:15', 1),
(28, '::1', 'SIPSG1@gmail.com', 3, '2022-11-01 19:43:09', 1),
(29, '::1', 'SIPSG1@gmail.com', NULL, '2022-11-01 19:43:31', 0),
(30, '::1', 'SIPSG1@gmail.com', NULL, '2022-11-01 19:43:39', 0),
(31, '::1', 'SIPSG0@gmail.com', 4, '2022-11-01 19:46:08', 1),
(32, '::1', 'SIPSG01@gmail.com', 5, '2022-11-01 19:47:53', 1),
(33, '::1', 'SIPSG02@gmail.com', 6, '2022-11-01 19:50:25', 1),
(34, '::1', 'SIPSG01@gmail.com', 5, '2022-11-01 20:00:58', 1),
(35, '::1', 'SIPSG01@gmail.com', 5, '2022-11-01 20:02:02', 1),
(36, '::1', 'SIPSG0@gmail.com', 4, '2022-11-01 20:02:52', 1),
(37, '::1', 'SIPSG0@gmail.com', 4, '2022-11-01 20:15:19', 1),
(38, '::1', 'SIPSG0@gmail.com', 4, '2022-11-01 20:16:46', 1),
(39, '::1', 'owner1@gmail.com', 7, '2022-11-01 20:18:35', 1),
(40, '::1', 'owner1@gmail.com', 7, '2022-11-01 21:17:50', 1),
(41, '::1', 'owner1@gmail.com', 7, '2022-11-01 21:34:22', 1),
(42, '::1', 'owner1@gmail.com', 7, '2022-11-02 00:39:04', 1),
(43, '::1', 'SIPSG0@gmail.com', 4, '2022-11-02 06:09:36', 1),
(44, '::1', 'sfsd', NULL, '2022-11-02 06:19:44', 0),
(45, '::1', 'owner1@gmail.com', 7, '2022-11-02 06:22:05', 1),
(46, '::1', 'owner1@gmail.com', 7, '2022-11-02 22:04:00', 1),
(47, '::1', 'owner1@gmail.com', 7, '2022-11-02 22:07:41', 1),
(48, '::1', 'owner1@gmail.com', 7, '2022-11-03 08:53:46', 1),
(49, '::1', 'owner1@gmail.com', 7, '2022-11-03 09:02:31', 1),
(50, '::1', 'owner1@gmail.com', 7, '2022-11-03 09:03:14', 1),
(51, '::1', 'owner1@gmail.com', 7, '2022-11-03 09:05:06', 1),
(52, '::1', 'owner1@gmail.com', 7, '2022-11-03 09:05:29', 1),
(53, '::1', 'owner1@gmail.com', 7, '2022-11-03 09:21:20', 1),
(54, '::1', 'owner1@gmail.com', 7, '2022-11-04 01:02:50', 1),
(55, '::1', 'owner1@gmail.com', 7, '2022-11-04 01:22:47', 1),
(56, '::1', 'owner1', NULL, '2022-11-04 01:23:33', 0),
(57, '::1', 'owner1@gmail.com', 7, '2022-11-04 01:24:08', 1),
(58, '::1', 'david@gmail.com', 8, '2022-11-04 01:37:39', 1),
(59, '::1', 'owner1', NULL, '2022-11-04 02:03:10', 0),
(60, '::1', 'owner1@gmail.com', 7, '2022-11-04 02:03:20', 1),
(61, '::1', 'owner1@gmail.com', 7, '2022-11-04 21:35:01', 1),
(62, '::1', 'owner1@gmail.com', 7, '2022-11-05 05:02:03', 1),
(63, '::1', 'owner1@gmail.com', 7, '2022-11-05 06:36:14', 1),
(64, '::1', 'owner1@gmail.com', 7, '2022-11-05 20:36:21', 1),
(65, '::1', 'owner1@gmail.com', 7, '2022-11-05 21:20:44', 1),
(66, '::1', 'owner1@gmail.com', 7, '2022-11-05 22:28:09', 1),
(67, '::1', 'owner1@gmail.com', 7, '2022-11-06 02:50:46', 1),
(68, '::1', 'owner1@gmail.com', 7, '2022-11-06 22:50:08', 1),
(69, '::1', 'owner1@gmail.com', 7, '2022-11-06 23:44:42', 1),
(70, '::1', 'owner1@gmail.com', 7, '2022-11-06 23:49:21', 1),
(71, '::1', 'chalsen', NULL, '2022-11-07 00:48:52', 0),
(72, '::1', 'chalsenhryvie@gmail.com', 15, '2022-11-07 00:49:21', 1),
(73, '::1', 'admin1', 16, '2022-11-07 00:50:18', 0),
(74, '::1', 'owner1@gmail.com', 7, '2022-11-07 01:17:32', 1),
(75, '::1', 'owner1@gmail.com', 7, '2022-11-07 01:32:08', 1),
(76, '::1', 'owner1@gmail.com', 7, '2022-11-07 08:32:42', 1),
(77, '::1', 'owner1@gmail.com', 7, '2022-11-07 21:38:06', 1),
(78, '::1', 'owner1@gmail.com', 7, '2022-11-08 07:18:23', 1),
(79, '::1', 'owner1@gmail.com', 7, '2022-11-08 23:34:12', 1),
(80, '::1', 'owner1@gmail.com', 7, '2022-11-09 06:07:07', 1),
(81, '::1', 'owner1@gmail.com', 7, '2022-11-09 06:07:09', 1),
(82, '::1', 'owner1@gmail.com', 7, '2022-11-10 10:04:51', 1),
(83, '::1', 'owner1@gmail.com', 7, '2022-11-10 13:00:31', 1),
(84, '::1', 'owner1@gmail.com', 7, '2022-11-17 19:06:28', 1),
(85, '::1', 'owner1@gmail.com', 7, '2022-11-18 08:27:40', 1),
(86, '::1', 'owner1@gmail.com', 7, '2022-11-18 16:35:46', 1),
(87, '::1', 'owner1@gmail.com', 7, '2022-11-21 13:43:45', 1),
(88, '::1', 'owner1@gmail.com', 7, '2022-11-21 13:44:32', 1),
(89, '::1', 'owner1@gmail.com', 7, '2022-11-21 13:45:50', 1),
(90, '::1', 'owner1', NULL, '2022-11-30 21:24:06', 0),
(91, '::1', 'owner1@gmail.com', 7, '2022-11-30 21:24:14', 1),
(92, '::1', 'owner1', NULL, '2022-12-01 09:20:57', 0),
(93, '::1', 'owner1@gmail.com', 7, '2022-12-01 09:21:04', 1),
(94, '::1', 'owner1@gmail.com', 7, '2022-12-01 09:24:06', 1),
(95, '::1', 'owner1@gmail.com', 7, '2022-12-01 09:26:24', 1),
(96, '::1', 'owner1', NULL, '2022-12-01 09:31:01', 0),
(97, '::1', 'owner1@gmail.com', 7, '2022-12-01 09:31:08', 1),
(98, '::1', 'owner1@gmail.com', 7, '2022-12-01 09:31:51', 1),
(99, '::1', 'owner1@gmail.com', 7, '2022-12-01 13:40:54', 1),
(100, '::1', 'owner1@gmail.com', 7, '2022-12-02 07:59:43', 1),
(101, '::1', 'owner1@gmail.com', 7, '2022-12-02 13:05:06', 1),
(102, '::1', 'owner1@gmail.com', 7, '2022-12-05 18:54:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_reset_attempts`
--

INSERT INTO `auth_reset_attempts` (`id`, `email`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, 'chalsenhryvie@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '4ce8ad851e45724dc8e467a9dd222c37', '2022-11-07 00:51:19');

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `barang_id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET latin1 NOT NULL,
  `slug` varchar(150) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL,
  `cover` varchar(100) NOT NULL,
  `barang_category_id` int(5) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`barang_id`, `title`, `slug`, `nama_barang`, `stock`, `cover`, `barang_category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '', 'sony-42-inci', '', 1, '', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-11-01 12:45:51'),
(2, '', 'sony-45-inci1', 'Sony 45 Inci1', 2, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '', 'stik-ps4', 'Stik PS4', 10, '', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '', 'stick-ps5', 'Stick PS5', 10, '', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '', 'tv-samsung-35-inci', 'TV Samsung 35 Inci', 10, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '', 'tv-panasonic-40-inci', 'TV Panasonic 40 inci', 10, '', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '', 'kabel-stik-ps4', 'Kabel stik ps4', 100, '', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-11-04 01:56:07'),
(8, '', 'qwewq', 'qwewq', 23, '', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-11-04 01:23:11'),
(9, '', 'dfsfds', 'dfsfds', 3, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-11-04 01:29:40'),
(10, '', 'sada', 'sada', 2, '1667543445_a212fb456037b01d639c.jpeg', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `barang_category`
--

CREATE TABLE `barang_category` (
  `barang_category_id` int(5) NOT NULL,
  `nama_category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_category`
--

INSERT INTO `barang_category` (`barang_category_id`, `nama_category`) VALUES
(1, 'Playstation'),
(2, 'Televisi'),
(3, 'BD Playstation'),
(4, 'Kabel Playstation'),
(5, 'Stick Playstation');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `rowid` int(11) NOT NULL,
  `nama_ps` varchar(250) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_ps` int(11) NOT NULL,
  `discount` float NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) UNSIGNED NOT NULL,
  `nama_customer` varchar(100) NOT NULL,
  `no_customer` int(12) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telepon` int(12) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `nama_customer`, `no_customer`, `alamat`, `no_telepon`, `created_at`, `updated_at`) VALUES
(2, 'Lian Rante', 1234343345, 'Babarsari', 8982112, '2022-11-03', '2022-11-03'),
(3, 'Michael Mulia', 121323443, 'Homikos', 90890990, '2022-11-05', '2022-11-05'),
(4, 'Andrew', 2147483647, 'Homikos2', 2147483647, '2022-11-04', '2022-11-04'),
(5, 'Billie ', 1232133442, 'Perumnas', 2147483647, '2022-11-05', '2022-11-05'),
(10, 'Rafly', 2147483647, 'Seturan', 2147483647, '2022-11-04', '2022-11-04'),
(11, 'Rati', 12112121, 'seturan', 2147483647, '2022-11-04', '2022-11-04'),
(12, 'Kennedy', 2147483647, 'Magelang', 2147483647, '2022-12-09', '2022-12-08');

-- --------------------------------------------------------

--
-- Table structure for table `data_penjualan`
--

CREATE TABLE `data_penjualan` (
  `id_data_penjualan` int(15) NOT NULL,
  `id_ps` int(15) NOT NULL,
  `id_customer` int(15) NOT NULL,
  `jumlah_penjualan` int(15) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `total_harga` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_penjualan`
--

INSERT INTO `data_penjualan` (`id_data_penjualan`, `id_ps`, `id_customer`, `jumlah_penjualan`, `tanggal_peminjaman`, `tanggal_pengembalian`, `total_harga`) VALUES
(4535, 123, 546464, 1, '2022-10-13', '2022-10-21', 15000),
(4536, 111, 1111, 1, '2022-10-01', '2022-10-02', 15000),
(4537, 222, 834823, 1, '2022-10-01', '2022-10-02', 20000),
(4538, 444, 43423, 1, '2022-10-14', '2022-10-15', 20000),
(4539, 555, 12321, 1, '2022-10-20', '2022-10-21', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(2, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1667315842, 1),
(3, '2022-11-03-132540', 'App\\Database\\Migrations\\Customer', 'default', 'App', 1667482415, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(15) NOT NULL,
  `id_customer` int(15) NOT NULL,
  `ps_id` int(11) NOT NULL,
  `sale_id` varchar(15) NOT NULL,
  `status` varchar(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `sisa_hari` varchar(200) NOT NULL,
  `denda` int(20) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  `deleted_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id_pengembalian`, `id_customer`, `ps_id`, `sale_id`, `status`, `stock`, `sisa_hari`, `denda`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 5, 423442, 'J1669818317', 'selesai', 1, '1', 100000, '0000-00-00', '0000-00-00', '0000-00-00'),
(2, 4, 423442, 'J1669861300', 'selesai', 1, '1', 40000, '0000-00-00', '0000-00-00', '0000-00-00'),
(3, 4, 423442, 'J1669861461', 'selesai', 1, '1', 40000, '0000-00-00', '0000-00-00', '0000-00-00'),
(4, 4, 423453, 'J1669942870', 'selesai', 1, '1', 590000, '0000-00-00', '0000-00-00', '0000-00-00'),
(5, 5, 423453, 'J1669963009', 'selesai', 1, '1', 530000, '0000-00-00', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `playstation`
--

CREATE TABLE `playstation` (
  `ps_id` int(11) NOT NULL,
  `title` varchar(1) NOT NULL,
  `slug` varchar(150) CHARACTER SET latin1 NOT NULL,
  `nama_ps` varchar(100) CHARACTER SET latin1 NOT NULL,
  `tipe_ps` varchar(100) CHARACTER SET latin1 NOT NULL,
  `harga_ps` float NOT NULL,
  `warna_ps` varchar(100) CHARACTER SET latin1 NOT NULL,
  `stock` int(11) NOT NULL,
  `discount` decimal(4,2) NOT NULL,
  `cover` varchar(100) CHARACTER SET latin1 NOT NULL,
  `ps_category_id` int(5) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playstation`
--

INSERT INTO `playstation` (`ps_id`, `title`, `slug`, `nama_ps`, `tipe_ps`, `harga_ps`, `warna_ps`, `stock`, `discount`, `cover`, `ps_category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(423442, '', 'xx41', 'XX41', 'PS4', 120000, 'putih', 7, '0.98', 'default.jpg', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(423453, '', 'xx432', 'XX432', 'PS4', 120000, 'Hitam', 100, '0.00', 'default.jpg', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ps_category`
--

CREATE TABLE `ps_category` (
  `ps_category_id` int(10) NOT NULL,
  `nama_category` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ps_category`
--

INSERT INTO `ps_category` (`ps_category_id`, `nama_category`) VALUES
(1, 'PS4 Pro'),
(2, 'PS4 Slim'),
(3, 'PS 4 Fat'),
(4, 'PS 5');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `sale_id` varchar(15) CHARACTER SET latin1 NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`sale_id`, `user_id`, `customer_id`, `created_at`, `updated_at`) VALUES
('J1668747789', 7, 2, '2022-11-18 12:03:09', '2022-11-18 12:03:09'),
('J1668747801', 7, 3, '2022-11-18 12:03:21', '2022-11-18 12:03:21'),
('J1668747830', 7, 3, '2022-11-18 12:03:50', '2022-11-18 12:03:50'),
('J1668747876', 7, 2, '2022-11-18 12:04:36', '2022-11-18 12:04:36'),
('J1668869486', 7, 10, '2022-11-19 21:51:26', '2022-11-19 21:51:26'),
('J1669013288', 7, 2, '2022-11-21 13:48:08', '2022-11-21 13:48:08'),
('J1669818279', 7, 5, '2022-11-30 21:24:39', '2022-11-30 21:24:39'),
('J1669818317', 7, 5, '2022-11-30 21:25:17', '2022-11-30 21:25:17'),
('J1669861300', 7, 4, '2022-12-01 09:21:40', '2022-12-01 09:21:40'),
('J1669861461', 7, 4, '2022-12-01 09:24:21', '2022-12-01 09:24:21'),
('J1669942870', 7, 4, '2022-12-02 08:01:10', '2022-12-02 08:01:10'),
('J1669963009', 7, 5, '2022-12-02 13:36:49', '2022-12-02 13:36:49');

-- --------------------------------------------------------

--
-- Table structure for table `sale_detail`
--

CREATE TABLE `sale_detail` (
  `sale_id` varchar(15) CHARACTER SET latin1 NOT NULL,
  `ps_id` int(111) NOT NULL,
  `amount` int(11) NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  `total_price` float NOT NULL,
  `day` int(11) NOT NULL,
  `exam_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale_detail`
--

INSERT INTO `sale_detail` (`sale_id`, `ps_id`, `amount`, `price`, `discount`, `total_price`, `day`, `exam_date`) VALUES
('J1668747789', 423442, 1, 120000, 1176, 118824, 1, '2022-04-12'),
('J1668747801', 423442, 1, 120000, 1176, 118824, 1, '2022-04-12'),
('J1668747830', 423442, 1, 120000, 1176, 118824, 1, '2022-05-12'),
('J1668747858', 423442, 2, 120000, 2352, 237648, 1, '2022-05-13'),
('J1668747876', 423442, 1, 120000, 1176, 118824, 1, '2023-05-13'),
('J1668869486', 423442, 1, 120000, 1176, 118824, 1, '2023-05-13'),
('J1669013288', 423442, 1, 120000, 1176, 118824, 1, '2023-05-13'),
('J1669818279', 423442, 1, 120000, 1176, 118824, 1, '2022-11-30'),
('J1669818317', 423442, 1, 120000, 1176, 118824, 1, '2022-11-30'),
('J1669861300', 423442, 1, 120000, 1176, 118824, 1, '2022-12-01'),
('J1669861461', 423442, 1, 120000, 1176, 118824, 1, '2022-12-01'),
('J1669942870', 423453, 1, 120000, 0, 120000, 1, '2022-12-02'),
('J1669963009', 423453, 1, 120000, 0, 120000, 1, '2022-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `stok_barang`
--

CREATE TABLE `stok_barang` (
  `id_stokbarang` int(15) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jumlah` int(15) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  `deleted_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok_barang`
--

INSERT INTO `stok_barang` (`id_stokbarang`, `nama_barang`, `jumlah`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 'Playstation 4', 150, '2022-10-31', '2022-10-21', '2022-11-01'),
(2, 'Playstation 5', 15, '2022-10-31', '2022-10-21', '2022-11-02'),
(3, 'Televisi 40 inci', 15, '2022-10-31', '2022-10-21', '2022-11-01'),
(4, 'BD PS4', 30, '2022-10-31', '2022-10-21', '2022-11-02'),
(5, 'BD PS5', 10, '2022-10-31', '2022-10-21', '2022-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Lian', 'Limbong', 'sipsg@gmail.com', 'SIPSG', 'Sipsg123', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2022-11-01 19:41:03', '2022-11-01 19:41:03'),
(3, 'Michael', 'Bangun', 'SIPSG1@gmail.com', 'SIPSG1', '$2y$10$dJ79ywWeAvyZxofCHG37s.LG6YRKTcZJHLb7OSuYE1Ufu6eJ59.x6', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-01 19:41:54', '2022-11-01 19:43:21', '2022-11-01 19:43:21'),
(4, 'Lian', 'Limbong', 'SIPSG0@gmail.com', 'Lian', '$2y$10$m8Q2Y3h836lD5RgllJVCzO8hakI29BlXOUUA5ai78BZftt3kjLL/e', '14fbb8c333af8e8d178c2c228e14cc1f', NULL, '2022-11-07 00:23:09', NULL, NULL, NULL, 1, 0, '2022-11-01 19:45:28', '2022-11-06 23:23:09', NULL),
(5, 'Michael', 'Bangun', 'SIPSG01@gmail.com', 'SIPSG01', '$2y$10$smPXfX7uipmuk2nvGBsiJ.L5CNWTMJp4xSXhuMNZhSC7P5FjU9td6', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-01 19:47:25', '2022-11-01 20:02:07', '2022-11-01 20:02:07'),
(6, 'David', 'Sembiring', 'SIPSG02@gmail.com', 'SIPSG02', '$2y$10$HFmYKVnr/36qJPU85AEXNe7eYhZDa2tBgH8/c31XJgYMZavCjwQsK', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-01 19:49:50', '2022-11-01 20:01:04', '2022-11-01 20:01:04'),
(7, 'Michael', 'Bangun', 'owner1@gmail.com', 'owner1', '$2y$10$ztDaa7tjMjkocesqSQ2Xve15yzMdyaAWqX3ao3rJ71nlhyCFgODwO', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-01 20:18:13', '2022-11-01 20:18:13', NULL),
(8, 'David ', 'Sembiring', 'david@gmail.com', 'owner2', '$2y$10$5pVr8coXpTf1/t3jVEfQluc04ar1Ugj5glBTbdeSuMqqV73fx.p0i', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-04 01:37:29', '2022-11-04 01:37:29', NULL),
(9, 'Naruto', 'Uzumaki', 'naruto@gmail.com', 'owner3', '$2y$10$w0JoV1QZ2v23cf9ua4FhROBGbbrHauJqYW/RIHlZOpq34vCUDg82O', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-04 02:11:31', '2022-11-04 02:11:43', '2022-11-04 02:11:43'),
(16, 'Chalsen', 'hariyavie', 'chalsenhryvie@gmail.com', 'admin1', '$2y$10$SO0IcCqZQARyOutvE7Q2FON0USyTXzaVinnoYo8yJDSKLSqrkVIKS', '1bc5292c8a1ee3411c3624a75d3b03e3', '2022-11-07 00:51:20', '2022-11-07 02:23:49', 'ffd7432d887b27d46b52b00537c4a256', NULL, NULL, 0, 0, '2022-11-07 00:50:01', '2022-11-07 01:23:49', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_id`);

--
-- Indexes for table `barang_category`
--
ALTER TABLE `barang_category`
  ADD PRIMARY KEY (`barang_category_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`rowid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `data_penjualan`
--
ALTER TABLE `data_penjualan`
  ADD PRIMARY KEY (`id_data_penjualan`),
  ADD KEY `id_ps` (`id_ps`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `playstation`
--
ALTER TABLE `playstation`
  ADD PRIMARY KEY (`ps_id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `stok_barang`
--
ALTER TABLE `stok_barang`
  ADD PRIMARY KEY (`id_stokbarang`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `barang_category`
--
ALTER TABLE `barang_category`
  MODIFY `barang_category_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `rowid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_penjualan`
--
ALTER TABLE `data_penjualan`
  MODIFY `id_data_penjualan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4541;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `playstation`
--
ALTER TABLE `playstation`
  MODIFY `ps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=423454;

--
-- AUTO_INCREMENT for table `stok_barang`
--
ALTER TABLE `stok_barang`
  MODIFY `id_stokbarang` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
