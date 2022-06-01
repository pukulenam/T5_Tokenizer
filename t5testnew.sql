-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2022 at 02:14 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `t5test`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_tbl`
--

CREATE TABLE `api_tbl` (
  `api_id` int(11) NOT NULL,
  `api_sesid` varchar(20) NOT NULL,
  `api_token` varchar(200) NOT NULL,
  `api_type` enum('1','2') NOT NULL DEFAULT '1',
  `api_limit` int(11) NOT NULL DEFAULT 0,
  `api_count` int(11) NOT NULL DEFAULT 0,
  `api_lastreq` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `api_tbl`
--

INSERT INTO `api_tbl` (`api_id`, `api_sesid`, `api_token`, `api_type`, `api_limit`, `api_count`, `api_lastreq`) VALUES
(1, 'b9991111', 'a3ce243be19811ecb0d50068ebde6724', '2', 9, 0, '2022-06-01 12:49:04');

-- --------------------------------------------------------

--
-- Table structure for table `lastreq_tbl`
--

CREATE TABLE `lastreq_tbl` (
  `req_id` int(11) NOT NULL,
  `req_sesid` varchar(20) NOT NULL,
  `req_uniqid` varchar(20) NOT NULL,
  `req_var1` decimal(10,2) NOT NULL DEFAULT 0.00,
  `req_var2` decimal(10,2) NOT NULL DEFAULT 0.00,
  `req_var3` decimal(10,2) NOT NULL DEFAULT 0.00,
  `req_cb1` enum('0','1') NOT NULL DEFAULT '0',
  `req_cb2` enum('0','1') NOT NULL DEFAULT '0',
  `req_cb3` enum('0','1') NOT NULL DEFAULT '0',
  `req_news` longtext NOT NULL,
  `req_sum` longtext NOT NULL,
  `req_added` datetime NOT NULL DEFAULT current_timestamp(),
  `req_ts` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `req_status` enum('0','1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `log_tbl`
--

CREATE TABLE `log_tbl` (
  `log_id` int(11) NOT NULL,
  `user_sesid` varchar(20) NOT NULL,
  `user_ip` varchar(200) NOT NULL,
  `user_agent` varchar(200) NOT NULL,
  `user_activity` mediumtext NOT NULL,
  `log_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_tbl`
--

INSERT INTO `log_tbl` (`log_id`, `user_sesid`, `user_ip`, `user_agent`, `user_activity`, `log_added`) VALUES
(13, '637f09f9', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:100.0) Gecko/20100101 Firefox/100.0', 'New Account Created', '2022-05-01 11:59:18'),
(14, '637f09f9', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:100.0) Gecko/20100101 Firefox/100.0', 'ReLogin', '2022-05-01 11:59:24'),
(15, '637f09f9', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:100.0) Gecko/20100101 Firefox/100.0', 'ReLogin', '2022-05-02 23:55:42'),
(16, '12d8ec0e', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:100.0) Gecko/20100101 Firefox/100.0', 'New Account Created', '2022-05-02 23:59:47'),
(17, 'f4fe259f', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:100.0) Gecko/20100101 Firefox/100.0', 'New Account Created', '2022-05-03 00:51:58'),
(18, '5f1ce31e', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:100.0) Gecko/20100101 Firefox/100.0', 'New Account Created', '2022-05-03 01:13:03'),
(19, '391550bb', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:100.0) Gecko/20100101 Firefox/100.0', 'New Account Created', '2022-05-03 01:14:25'),
(20, '30d849a7', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:100.0) Gecko/20100101 Firefox/100.0', 'New Account Created', '2022-05-03 01:16:57'),
(21, '637f09f9', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:100.0) Gecko/20100101 Firefox/100.0', 'ReLogin', '2022-05-04 22:45:30'),
(22, '637f09f9', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 'ReLogin', '2022-05-05 22:47:57'),
(23, '637f09f9', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 'ReLogin', '2022-05-06 19:21:28'),
(24, '637f09f9', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 'ReLogin', '2022-05-06 22:09:59'),
(25, '637f09f9', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 'ReLogin', '2022-05-16 17:01:42'),
(26, '2504fab8', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 'New Account Created', '2022-05-17 15:00:14'),
(27, '47919d52', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 'New Account Created', '2022-05-17 15:18:12'),
(28, 'd09d555a', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 'New Account Created', '2022-05-17 15:18:46'),
(29, '8fcfd215', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 'New Account Created', '2022-05-17 15:19:42'),
(30, '26e1884c', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:102.0) Gecko/20100101 Firefox/102.0', 'New Account Created', '2022-06-01 18:02:02'),
(31, '26e1884c', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:102.0) Gecko/20100101 Firefox/102.0', 'New Request : 53EE4BA9', '2022-06-01 19:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `req_tbl`
--

CREATE TABLE `req_tbl` (
  `req_id` int(11) NOT NULL,
  `req_sesid` varchar(20) NOT NULL,
  `req_uniqid` varchar(20) NOT NULL,
  `req_var1` decimal(10,2) NOT NULL DEFAULT 0.00,
  `req_var2` decimal(10,2) NOT NULL DEFAULT 0.00,
  `req_var3` decimal(10,2) NOT NULL DEFAULT 0.00,
  `req_cb1` enum('0','1') NOT NULL DEFAULT '0',
  `req_cb2` enum('0','1') NOT NULL DEFAULT '0',
  `req_cb3` enum('0','1') NOT NULL DEFAULT '0',
  `req_news` longtext NOT NULL,
  `req_sum` longtext NOT NULL,
  `req_added` datetime NOT NULL DEFAULT current_timestamp(),
  `req_ts` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `req_status` enum('0','1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `req_tbl`
--

INSERT INTO `req_tbl` (`req_id`, `req_sesid`, `req_uniqid`, `req_var1`, `req_var2`, `req_var3`, `req_cb1`, `req_cb2`, `req_cb3`, `req_news`, `req_sum`, `req_added`, `req_ts`, `req_status`) VALUES
(1, '637f09f9', '1BEFC17A', '2.00', '1.00', '1.50', '0', '1', '0', 'walala', '{:var1:2,:var2:1,:var3:1.5,:cbx:0,:cby:1,:cbyn:0,:news:walala}\n', '2022-05-01 13:09:55', '2022-05-01 06:09:55', '0'),
(22, '637f09f9', '24CCC0D5', '1.00', '0.50', '2.00', '1', '1', '0', 'Seperti pantai Pulau Cina, Desa Telukjatidawang, Kecamatan Tambak, Gresik. Di sini, wisatawan bisa menikmati pemandangan lepas pantai dan keindahan laut. Tak hanya itu, Pantai Pulau Cina juga memiliki keindahan bawah laut yang masih alami. Selain keindahan alam, pengelola wisata Pantai Pulau Cina juga menyiapkan berbagai wisata air seperti banana boat dan snorkeling yang dilengkapi sejumlah alat keselamatan. Bagi wisatawan yang ingin bersantai di pinggiran pantai, bisa memanfaatkan gazebo di pinggiran pantai. Sambil bersantai, wisatawan bisa membakar ikan laut segar. Wisatawan bisa menikmati pantai Pulau Cina, mulai dari pinggir pantai hingga ke tengah laut, ujar Kepala Desa Telukjatidawang Fahrur Razi, mewakili pengelola wisata pantai Pulau Cina, Jumat (6/5/2022). Pantai Pulau Cina merupakan obyek wisata yang dikembangkan Pemerintah Desa (Pemdes) Telukjatidawang.', '', '2022-05-06 19:21:33', '2022-05-06 12:21:33', '0'),
(23, '637f09f9', '815A9A3E', '1.00', '0.50', '2.00', '1', '1', '0', 'Seperti pantai Pulau Cina, Desa Telukjatidawang, Kecamatan Tambak, Gresik. Di sini, wisatawan bisa menikmati pemandangan lepas pantai dan keindahan laut. Tak hanya itu, Pantai Pulau Cina juga memiliki keindahan bawah laut yang masih alami. Selain keindahan alam, pengelola wisata Pantai Pulau Cina juga menyiapkan berbagai wisata air seperti banana boat dan snorkeling yang dilengkapi sejumlah alat keselamatan. Bagi wisatawan yang ingin bersantai di pinggiran pantai, bisa memanfaatkan gazebo di pinggiran pantai. Sambil bersantai, wisatawan bisa membakar ikan laut segar. Wisatawan bisa menikmati pantai Pulau Cina, mulai dari pinggir pantai hingga ke tengah laut, ujar Kepala Desa Telukjatidawang Fahrur Razi, mewakili pengelola wisata pantai Pulau Cina, Jumat (6/5/2022). Pantai Pulau Cina merupakan obyek wisata yang dikembangkan Pemerintah Desa (Pemdes) Telukjatidawang.', 'Seperti pantai Pulau Cina, Desa Telukjatidawang, Kecamatan Tambak, Gresik. Di sini, wisatawan bisa menikmati pemandangan lepas pantai dan keindahan laut. Tak hanya itu, Pantai Pulau Cina juga memiliki keindahan bawah laut yang masih alami. Selain keindahan alam, pengelola wisata Pantai Pulau Cina juga menyiapkan berbagai wisata air seperti banana boat dan snorkeling yang dilengkapi sejumlah alat keselamatan. Bagi wisatawan yang ingin bersantai di pinggiran pantai, bisa memanfaatkan gazebo di pinggiran pantai. Sambil bersantai, wisatawan bisa membakar ikan laut segar. Wisatawan bisa menikmati pantai Pulau Cina, mulai dari pinggir pantai hingga ke tengah laut, ujar Kepala Desa Telukjatidawang Fahrur Razi, mewakili pengelola wisata pantai Pulau Cina, Jumat (6/5/2022). Pantai Pulau Cina merupakan obyek wisata yang dikembangkan Pemerintah Desa (Pemdes) Telukjatidawang.', '2022-05-06 19:22:49', '2022-05-06 12:22:49', '0'),
(24, '637f09f9', '2FEF9830', '1.00', '0.50', '2.00', '1', '1', '0', 'Seperti pantai Pulau Cina, Desa Telukjatidawang, Kecamatan Tambak, Gresik. Di sini, wisatawan bisa menikmati pemandangan lepas pantai dan keindahan laut. Tak hanya itu, Pantai Pulau Cina juga memiliki keindahan bawah laut yang masih alami. Selain keindahan alam, pengelola wisata Pantai Pulau Cina juga menyiapkan berbagai wisata air seperti banana boat dan snorkeling yang dilengkapi sejumlah alat keselamatan. Bagi wisatawan yang ingin bersantai di pinggiran pantai, bisa memanfaatkan gazebo di pinggiran pantai. Sambil bersantai, wisatawan bisa membakar ikan laut segar. Wisatawan bisa menikmati pantai Pulau Cina, mulai dari pinggir pantai hingga ke tengah laut, ujar Kepala Desa Telukjatidawang Fahrur Razi, mewakili pengelola wisata pantai Pulau Cina, Jumat (6/5/2022). Pantai Pulau Cina merupakan obyek wisata yang dikembangkan Pemerintah Desa (Pemdes) Telukjatidawang.', '', '2022-05-06 19:26:22', '2022-05-06 12:26:22', '0'),
(25, '637f09f9', '8B7F67C9', '2.00', '1.00', '1.50', '0', '1', '0', 'Bapak/Ibu Zx New,\r\n\r\nBerikut informasi tagihanmu\r\n\r\nJumlah: Rp1.020.000\r\n\r\nSilakan bayar melalui transfer bank, dompet digital, atau Alfamart disini👇\r\nhttps://checkout.xendit.co/web/621d7214600ac465125d9169\r\n\r\nTerima kasih,\r\n\r\nZx Technologies', '', '2022-05-16 19:11:03', '2022-05-16 12:11:03', '0'),
(26, '637f09f9', 'EDB99641', '2.00', '1.00', '1.50', '0', '1', '0', 'Bapak/Ibu Zx New,\r\n\r\nBerikut informasi tagihanmu\r\n\r\nJumlah: Rp1.020.000\r\n\r\nSilakan bayar melalui transfer bank, dompet digital, atau Alfamart disini👇\r\nhttps://checkout.xendit.co/web/621d7214600ac465125d9169\r\n\r\nTerima kasih,\r\n\r\nZx Technologies', '', '2022-05-16 19:11:16', '2022-05-16 12:11:16', '0'),
(27, '637f09f9', '0A91ED44', '2.00', '1.00', '1.50', '0', '1', '0', 'Bapak/Ibu Zx New,\r\n\r\nBerikut informasi tagihanmu\r\n\r\nJumlah: Rp1.020.000\r\n\r\nSilakan bayar melalui transfer bank, dompet digital, atau Alfamart disini👇\r\nhttps://checkout.xendit.co/web/621d7214600ac465125d9169\r\n\r\nTerima kasih,\r\n\r\nZx Technologies', '', '2022-05-16 19:11:21', '2022-05-16 12:11:21', '0'),
(28, '637f09f9', '783489BB', '2.00', '1.00', '1.50', '0', '1', '0', 'Bapak/Ibu Zx New,\r\n\r\nBerikut informasi tagihanmu\r\n\r\nJumlah: Rp1.020.000\r\n\r\nSilakan bayar melalui transfer bank, dompet digital, atau Alfamart disini👇\r\nhttps://checkout.xendit.co/web/621d7214600ac465125d9169\r\n\r\nTerima kasih,\r\n\r\nZx Technologies', '', '2022-05-16 19:11:23', '2022-05-16 12:11:23', '0'),
(29, '637f09f9', 'E32715FF', '2.00', '1.00', '1.50', '0', '1', '0', 'Bapak/Ibu Zx New,\r\n\r\nBerikut informasi tagihanmu\r\n\r\nJumlah: Rp1.020.000\r\n\r\nSilakan bayar melalui transfer bank, dompet digital, atau Alfamart disini👇\r\nhttps://checkout.xendit.co/web/621d7214600ac465125d9169\r\n\r\nTerima kasih,\r\n\r\nZx Technologies', '', '2022-05-16 19:11:25', '2022-05-16 12:11:25', '0'),
(30, '637f09f9', '6D654B4C', '2.00', '1.00', '1.50', '0', '1', '0', 'Bapak/Ibu Zx New,\r\n\r\nBerikut informasi tagihanmu\r\n\r\nJumlah: Rp1.020.000\r\n\r\nSilakan bayar melalui transfer bank, dompet digital, atau Alfamart disini👇\r\nhttps://checkout.xendit.co/web/621d7214600ac465125d9169\r\n\r\nTerima kasih,\r\n\r\nZx Technologies', '', '2022-05-16 19:11:27', '2022-05-16 12:11:27', '0'),
(31, '637f09f9', '905FCCE0', '2.00', '1.00', '1.50', '0', '1', '0', 'Bapak/Ibu Zx New,\r\n\r\nBerikut informasi tagihanmu\r\n\r\nJumlah: Rp1.020.000\r\n\r\nSilakan bayar melalui transfer bank, dompet digital, atau Alfamart disini👇\r\nhttps://checkout.xendit.co/web/621d7214600ac465125d9169\r\n\r\nTerima kasih,\r\n\r\nZx Technologies', '', '2022-05-16 19:11:30', '2022-05-16 12:11:30', '0'),
(32, '637f09f9', '9C2FE100', '2.00', '1.00', '1.50', '0', '1', '0', 'Bapak/Ibu Zx New,\r\n\r\nBerikut informasi tagihanmu\r\n\r\nJumlah: Rp1.020.000\r\n\r\nSilakan bayar melalui transfer bank, dompet digital, atau Alfamart disini👇\r\nhttps://checkout.xendit.co/web/621d7214600ac465125d9169\r\n\r\nTerima kasih,\r\n\r\nZx Technologies', '', '2022-05-16 19:11:32', '2022-05-16 12:11:32', '0'),
(33, '637f09f9', '62B7D44F', '2.00', '1.00', '1.50', '0', '1', '0', 'Bapak/Ibu Zx New,\r\n\r\nBerikut informasi tagihanmu\r\n\r\nJumlah: Rp1.020.000\r\n\r\nSilakan bayar melalui transfer bank, dompet digital, atau Alfamart disini👇\r\nhttps://checkout.xendit.co/web/621d7214600ac465125d9169\r\n\r\nTerima kasih,\r\n\r\nZx Technologies', '', '2022-05-16 19:41:14', '2022-05-16 12:41:14', '0'),
(34, '637f09f9', '715BB79E', '2.00', '1.00', '1.50', '0', '1', '0', 'Bapak/Ibu Zx New,\r\n\r\nBerikut informasi tagihanmu\r\n\r\nJumlah: Rp1.020.000\r\n\r\nSilakan bayar melalui transfer bank, dompet digital, atau Alfamart disini👇\r\nhttps://checkout.xendit.co/web/621d7214600ac465125d9169\r\n\r\nTerima kasih,\r\n\r\nZx Technologies', '', '2022-05-16 19:41:55', '2022-05-16 12:41:55', '0'),
(35, '637f09f9', '192A117E', '2.00', '1.00', '1.50', '0', '1', '0', 'Bapak/Ibu Zx New,\r\n\r\nBerikut informasi tagihanmu\r\n\r\nJumlah: Rp1.020.000\r\n\r\nSilakan bayar melalui transfer bank, dompet digital, atau Alfamart disini👇\r\nhttps://checkout.xendit.co/web/621d7214600ac465125d9169\r\n\r\nTerima kasih,\r\n\r\nZx Technologies', '[{\"summary_text\":\"Jika Anda ingin membeli tagihan Zx, berikut informasinya:\"}]', '2022-05-16 19:42:29', '2022-05-16 12:42:29', '0'),
(36, '637f09f9', 'E083AAE4', '2.00', '1.00', '1.50', '0', '1', '0', 'Bapak/Ibu Zx New,\r\n\r\nBerikut informasi tagihanmu\r\n\r\nJumlah: Rp1.020.000\r\n\r\nSilakan bayar melalui transfer bank, dompet digital, atau Alfamart disini👇\r\nhttps://checkout.xendit.co/web/621d7214600ac465125d9169\r\n\r\nTerima kasih,\r\n\r\nZx Technologies', '[{\"summary_text\":\"Jika Anda ingin membeli tagihan Zx, berikut informasinya:\"}]', '2022-05-16 19:45:24', '2022-05-16 12:45:24', '0'),
(37, '637f09f9', '515B2EF9', '2.00', '1.00', '1.50', '0', '1', '0', 'Bapak/Ibu Zx New,\r\n\r\nBerikut informasi tagihanmu\r\n\r\nJumlah: Rp1.020.000\r\n\r\nSilakan bayar melalui transfer bank, dompet digital, atau Alfamart disini👇\r\nhttps://checkout.xendit.co/web/621d7214600ac465125d9169\r\n\r\nTerima kasih,\r\n\r\nZx Technologies', 'Array', '2022-05-16 19:49:59', '2022-05-16 12:50:00', '0'),
(38, '637f09f9', 'A45D5AE6', '2.00', '1.00', '1.50', '0', '1', '0', 'asasasa', 'Array', '2022-05-16 19:52:26', '2022-05-16 12:52:26', '0'),
(39, '637f09f9', 'E4A50F50', '2.00', '1.00', '1.50', '0', '1', '0', 'Bapak/Ibu Zx New,\r\n\r\nBerikut informasi tagihanmu\r\n\r\nJumlah: Rp1.020.000\r\n\r\nSilakan bayar melalui transfer bank, dompet digital, atau Alfamart disini👇\r\nhttps://checkout.xendit.co/web/621d7214600ac465125d9169\r\n\r\nTerima kasih,\r\n\r\nZx Technologies', '', '2022-05-16 19:54:00', '2022-05-16 12:54:00', '0'),
(40, '637f09f9', 'B384D729', '2.00', '1.00', '1.50', '0', '1', '0', 'Cannot access offset of type string on string', '[{\"summary_text\":\"Creating a string without using the wrong type of string has been blocked.\"}]', '2022-05-16 19:56:33', '2022-05-16 12:56:33', '0'),
(41, '637f09f9', 'B683E4F9', '2.00', '1.00', '1.50', '0', '1', '0', 'Cannot access offset of type string on string', 'Creating a string without using the wrong type of string has been blocked.', '2022-05-16 20:02:49', '2022-05-16 13:02:49', '0'),
(42, '637f09f9', '7372FA0F', '2.00', '1.00', '1.50', '0', '1', '0', 'Bapak/Ibu Zx New,\r\n\r\nBerikut informasi tagihanmu\r\n\r\nJumlah: Rp1.020.000\r\n\r\nSilakan bayar melalui transfer bank, dompet digital, atau Alfamart disini👇\r\nhttps://checkout.xendit.co/web/621d7214600ac465125d9169\r\n\r\nTerima kasih,\r\n\r\nZx Technologies', 'Jika Anda ingin membeli tagihan Zx, berikut informasinya:', '2022-05-16 20:04:24', '2022-05-16 13:04:24', '0'),
(43, '47919d52', 'C805502A', '1.00', '0.50', '2.00', '1', '1', '0', 'python3 predict.py eyI6dmFyMSI6MTIxLCI6dmFyMiI6MTEsIjp2YXIzIjoyMywiOmNieCI6MSwiOmNieSI6MSwiOmNieW4iOjEsIjpuZXdzIjoiU2VwZXJ0aSBwYW50YWkgUHVsYXUgQ2luYSwgRGVzYSBUZWx1a2phdGlkYXdhbmcsIEtlY2FtYXRhbiBUYW1iYWssIEdyZXNpay4gRGkgc2luaSwgd2lzYXRhd2FuIGJpc2EgbWVuaWttYXRpIHBlbWFuZGFuZ2FuIGxlcGFzIHBhbnRhaSBkYW4ga2VpbmRhaGFuIGxhdXQuIFRhayBoYW55YSBpdHUsIFBhbnRhaSBQdWxhdSBDaW5hIGp1Z2EgbWVtaWxpa2kga2VpbmRhaGFuIGJhd2FoIGxhdXQgeWFuZyBtYXNpaCBhbGFtaS4gU2VsYWluIGtlaW5kYWhhbiBhbGFtLCBwZW5nZWxvbGEgd2lzYXRhIFBhbnRhaSBQdWxhdSBDaW5hIGp1Z2EgbWVueWlhcGthbiBiZXJiYWdhaSB3aXNhdGEgYWlyIHNlcGVydGkgYmFuYW5hIGJvYXQgZGFuIHNub3JrZWxpbmcgeWFuZyBkaWxlbmdrYXBpIHNlanVtbGFoIGFsYXQga2VzZWxhbWF0YW4uIEJhZ2kgd2lzYXRhd2FuIHlhbmcgaW5naW4gYmVyc2FudGFpIGRpIHBpbmdnaXJhbiBwYW50YWksIGJpc2EgbWVtYW5mYWF0a2FuIGdhemVibyBkaSBwaW5nZ2lyYW4gcGFudGFpLiBTYW1iaWwgYmVyc2FudGFpLCB3aXNhdGF3YW4gYmlzYSBtZW1iYWthciBpa2FuIGxhdXQgc2VnYXIuIFdpc2F0YXdhbiBiaXNhIG1lbmlrbWF0aSBwYW50YWkgUHVsYXUgQ2luYSwgbXVsYWkgZGFyaSBwaW5nZ2lyIHBhbnRhaSBoaW5nZ2Ega2UgdGVuZ2FoIGxhdXQsIHVqYXIgS2VwYWxhIERlc2EgVGVsdWtqYXRpZGF3YW5nIEZhaHJ1ciBSYXppLCBtZXdha2lsaSBwZW5nZWxvbGEgd2lzYXRhIHBhbnRhaSBQdWxhdSBDaW5hLCBKdW1hdCAoNlwvNVwvMjAyMikuIFBhbnRhaSBQdWxhdSBDaW5hIG1lcnVwYWthbiBvYnllayB3aXNhdGEgeWFuZyBkaWtlbWJhbmdrYW4gUGVtZXJpbnRhaCBEZXNhIChQZW1kZXMpIFRlbHVramF0aWRhd2FuZy4ifQ==', 'YnllayB3ayI6dmFyMii6MTT a s I r ey i o n y', '2022-05-17 16:07:55', '2022-05-17 09:07:55', '0'),
(44, '47919d52', 'E5E482FB', '1.00', '0.50', '2.00', '1', '1', '0', 'python3 predict.py eyI6dmFyMSI6MTIxLCI6dmFyMiI6MTEsIjp2YXIzIjoyMywiOmNieCI6MSwiOmNieSI6MSwiOmNieW4iOjEsIjpuZXdzIjoiU2VwZXJ0aSBwYW50YWkgUHVsYXUgQ2luYSwgRGVzYSBUZWx1a2phdGlkYXdhbmcsIEtlY2FtYXRhbiBUYW1iYWssIEdyZXNpay4gRGkgc2luaSwgd2lzYXRhd2FuIGJpc2EgbWVuaWttYXRpIHBlbWFuZGFuZ2FuIGxlcGFzIHBhbnRhaSBkYW4ga2VpbmRhaGFuIGxhdXQuIFRhayBoYW55YSBpdHUsIFBhbnRhaSBQdWxhdSBDaW5hIGp1Z2EgbWVtaWxpa2kga2VpbmRhaGFuIGJhd2FoIGxhdXQgeWFuZyBtYXNpaCBhbGFtaS4gU2VsYWluIGtlaW5kYWhhbiBhbGFtLCBwZW5nZWxvbGEgd2lzYXRhIFBhbnRhaSBQdWxhdSBDaW5hIGp1Z2EgbWVueWlhcGthbiBiZXJiYWdhaSB3aXNhdGEgYWlyIHNlcGVydGkgYmFuYW5hIGJvYXQgZGFuIHNub3JrZWxpbmcgeWFuZyBkaWxlbmdrYXBpIHNlanVtbGFoIGFsYXQga2VzZWxhbWF0YW4uIEJhZ2kgd2lzYXRhd2FuIHlhbmcgaW5naW4gYmVyc2FudGFpIGRpIHBpbmdnaXJhbiBwYW50YWksIGJpc2EgbWVtYW5mYWF0a2FuIGdhemVibyBkaSBwaW5nZ2lyYW4gcGFudGFpLiBTYW1iaWwgYmVyc2FudGFpLCB3aXNhdGF3YW4gYmlzYSBtZW1iYWthciBpa2FuIGxhdXQgc2VnYXIuIFdpc2F0YXdhbiBiaXNhIG1lbmlrbWF0aSBwYW50YWkgUHVsYXUgQ2luYSwgbXVsYWkgZGFyaSBwaW5nZ2lyIHBhbnRhaSBoaW5nZ2Ega2UgdGVuZ2FoIGxhdXQsIHVqYXIgS2VwYWxhIERlc2EgVGVsdWtqYXRpZGF3YW5nIEZhaHJ1ciBSYXppLCBtZXdha2lsaSBwZW5nZWxvbGEgd2lzYXRhIHBhbnRhaSBQdWxhdSBDaW5hLCBKdW1hdCAoNlwvNVwvMjAyMikuIFBhbnRhaSBQdWxhdSBDaW5hIG1lcnVwYWthbiBvYnllayB3aXNhdGEgeWFuZyBkaWtlbWJhbmdrYW4gUGVtZXJpbnRhaCBEZXNhIChQZW1kZXMpIFRlbHVramF0aWRhd2FuZy4ifQ==', 'YnllayB3ayI6dmFyMii6MTT a s I r ey i o n y', '2022-05-17 16:49:52', '2022-05-17 09:49:52', '0'),
(45, '26e1884c', '34ADE334', '1.00', '0.50', '2.00', '1', '1', '0', 'Hello World', 'test ok', '2022-06-01 18:04:15', '2022-06-01 11:04:15', '0'),
(46, '26e1884c', '53EE4BA9', '1.00', '0.50', '2.00', '1', '1', '0', 'Helloo', 'test ok', '2022-06-01 19:09:33', '2022-06-01 12:09:33', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `user_id` int(11) NOT NULL,
  `user_sesid` varchar(20) NOT NULL,
  `user_type` enum('1','2') NOT NULL DEFAULT '1',
  `user_added` datetime NOT NULL DEFAULT current_timestamp(),
  `user_lastlogin` datetime NOT NULL,
  `user_lastreq` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`user_id`, `user_sesid`, `user_type`, `user_added`, `user_lastlogin`, `user_lastreq`) VALUES
(8, '637f09f9', '1', '2022-05-01 11:59:18', '2022-05-16 17:01:42', '0000-00-00 00:00:00'),
(9, '12d8ec0e', '1', '2022-05-02 23:59:47', '2022-05-02 23:59:47', '0000-00-00 00:00:00'),
(10, 'f4fe259f', '1', '2022-05-03 00:51:58', '2022-05-03 00:51:58', '0000-00-00 00:00:00'),
(11, '5f1ce31e', '1', '2022-05-03 01:13:03', '2022-05-03 01:13:03', '0000-00-00 00:00:00'),
(12, '391550bb', '1', '2022-05-03 01:14:25', '2022-05-03 01:14:25', '0000-00-00 00:00:00'),
(13, '30d849a7', '1', '2022-05-03 01:16:57', '2022-05-03 01:16:57', '0000-00-00 00:00:00'),
(14, '2504fab8', '1', '2022-05-17 15:00:13', '2022-05-17 15:00:13', '0000-00-00 00:00:00'),
(15, '47919d52', '1', '2022-05-17 15:18:12', '2022-05-17 15:18:12', '0000-00-00 00:00:00'),
(16, 'd09d555a', '1', '2022-05-17 15:18:46', '2022-05-17 15:18:46', '0000-00-00 00:00:00'),
(17, '8fcfd215', '1', '2022-05-17 15:19:42', '2022-05-17 15:19:42', '0000-00-00 00:00:00'),
(18, 'b9991111', '2', '2022-06-01 17:48:18', '2022-06-01 12:47:49', '2022-06-01 12:47:49'),
(19, '26e1884c', '1', '2022-06-01 18:02:02', '2022-06-01 18:02:02', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_tbl`
--
ALTER TABLE `api_tbl`
  ADD PRIMARY KEY (`api_id`),
  ADD KEY `api_token` (`api_token`),
  ADD KEY `api_sesid` (`api_sesid`);

--
-- Indexes for table `lastreq_tbl`
--
ALTER TABLE `lastreq_tbl`
  ADD PRIMARY KEY (`req_id`),
  ADD UNIQUE KEY `req_uniqid` (`req_uniqid`),
  ADD KEY `req_sesid` (`req_sesid`);

--
-- Indexes for table `log_tbl`
--
ALTER TABLE `log_tbl`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `user_sesid` (`user_sesid`);

--
-- Indexes for table `req_tbl`
--
ALTER TABLE `req_tbl`
  ADD PRIMARY KEY (`req_id`),
  ADD UNIQUE KEY `req_uniqid` (`req_uniqid`),
  ADD KEY `req_sesid` (`req_sesid`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_sesid` (`user_sesid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_tbl`
--
ALTER TABLE `api_tbl`
  MODIFY `api_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lastreq_tbl`
--
ALTER TABLE `lastreq_tbl`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_tbl`
--
ALTER TABLE `log_tbl`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `req_tbl`
--
ALTER TABLE `req_tbl`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `api_tbl`
--
ALTER TABLE `api_tbl`
  ADD CONSTRAINT `api_tbl_ibfk_1` FOREIGN KEY (`api_sesid`) REFERENCES `user_tbl` (`user_sesid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lastreq_tbl`
--
ALTER TABLE `lastreq_tbl`
  ADD CONSTRAINT `lastreq_tbl_ibfk_1` FOREIGN KEY (`req_uniqid`) REFERENCES `req_tbl` (`req_uniqid`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `lastreq_tbl_ibfk_2` FOREIGN KEY (`req_sesid`) REFERENCES `req_tbl` (`req_sesid`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `log_tbl`
--
ALTER TABLE `log_tbl`
  ADD CONSTRAINT `log_tbl_ibfk_1` FOREIGN KEY (`user_sesid`) REFERENCES `user_tbl` (`user_sesid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `req_tbl`
--
ALTER TABLE `req_tbl`
  ADD CONSTRAINT `req_tbl_ibfk_1` FOREIGN KEY (`req_sesid`) REFERENCES `user_tbl` (`user_sesid`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
