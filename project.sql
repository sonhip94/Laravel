-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2017 at 05:43 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cates`
--

CREATE TABLE IF NOT EXISTS `cates` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cates`
--

INSERT INTO `cates` (`id`, `name`, `alias`, `order`, `parent_id`, `keywords`, `description`, `created_at`, `updated_at`) VALUES
(15, 'Áo phông', 'ao-phong', 0, 0, 'Áo phông', 'Áo phông', '2017-08-14 05:22:24', '2017-08-14 05:22:24'),
(16, 'Áo sơ mi', 'ao-so-mi', 1, 0, 'Áo sơ mi', 'Áo sơ mi', '2017-08-14 05:22:37', '2017-08-14 05:22:37'),
(18, 'Quần jeans - kaki', 'quan-jeans-kaki', 4, 0, 'Quần jeans - kaki', 'Quần jeans - kaki', '2017-08-14 05:23:03', '2017-08-14 07:23:20'),
(21, 'Quần short', 'quan-short', 7, 0, 'Quần short', 'Quần short', '2017-08-14 05:25:24', '2017-08-14 05:25:24'),
(22, 'Váy liền', 'vay-lien', 9, 0, 'Váy liền', 'Váy liền', '2017-08-14 05:25:39', '2017-08-14 07:20:04'),
(23, 'Chân váy', 'chan-vay', 10, 0, 'Chân váy', 'Chân váy', '2017-08-14 07:20:21', '2017-08-14 07:20:21'),
(24, 'Áo len', 'ao-len', 11, 0, 'Áo len', 'Áo len', '2017-08-14 07:20:45', '2017-08-14 07:20:45'),
(25, 'Áo khoác', 'ao-khoac', 11, 0, 'Áo khoác', 'Áo khoác', '2017-08-14 07:20:58', '2017-08-14 07:20:58'),
(26, 'Phụ kiện', 'phu-kien', 12, 0, 'Phụ kiện', 'Phụ kiện', '2017-08-14 07:21:06', '2017-08-14 07:21:06'),
(27, 'Áo phông không cổ', 'ao-phong-khong-co', 0, 15, '', '', '2017-08-14 07:25:29', '2017-08-14 07:26:06'),
(28, 'Áo phông có cổ', 'ao-phong-co-co', 0, 15, '', '', '2017-08-14 07:26:18', '2017-08-14 07:26:18'),
(29, 'Áo dài tay', 'ao-dai-tay', 0, 15, 'Áo dài tay', 'Áo dài tay', '2017-08-14 07:26:42', '2017-08-14 09:40:16'),
(30, 'Sơ mi denim', 'so-mi-denim', 12, 16, 'Sơ mi denim', 'Sơ mi denim', '2017-08-14 10:36:29', '2017-08-14 10:36:29'),
(31, 'Túi xách', 'tui-xach', 32, 26, 'Túi xách', 'Túi xách', '2017-08-14 21:20:04', '2017-08-14 21:20:04'),
(32, 'Dây lưng', 'day-lung', 43, 26, 'Dây lưng', 'Dây lưng', '2017-08-14 21:20:38', '2017-08-14 21:20:38'),
(33, 'Tất', 'tat', 54, 26, 'Tất', 'Tất', '2017-08-14 21:21:01', '2017-08-14 21:21:01'),
(34, 'Khăn', 'khan', 432, 26, 'Khăn', 'Khăn', '2017-08-14 21:21:28', '2017-08-14 21:21:28'),
(35, 'Áo sơ mi dài tay', 'ao-so-mi-dai-tay', 45, 16, 'Áo sơ mi dài tay', 'Áo sơ mi dài tay', '2017-08-14 21:23:35', '2017-08-14 21:23:35'),
(36, 'Áo sơ mi cộc tay', 'ao-so-mi-coc-tay', 65, 16, 'Áo sơ mi cộc tay', 'Áo sơ mi cộc tay', '2017-08-14 21:23:53', '2017-08-14 21:23:53'),
(37, 'Quần jeans', 'quan-jeans', 654, 18, 'Quần jeans', 'Quần jeans', '2017-08-14 21:25:50', '2017-08-14 21:25:50'),
(38, 'Quần kaki', 'quan-kaki', 654, 18, 'Quần kaki', 'Quần kaki', '2017-08-14 21:26:03', '2017-08-14 21:26:03'),
(39, 'Chân váy bút chì', 'chan-vay-but-chi', 54, 23, 'Chân váy bút chì', 'Chân váy bút chì', '2017-08-14 21:27:58', '2017-08-14 21:27:58'),
(40, 'Chân váy chữ A', 'chan-vay-chu-a', 423, 23, 'Chân váy chữ A', 'Chân váy chữ A', '2017-08-14 21:28:15', '2017-08-14 21:28:15'),
(41, 'Chân váy xếp li', 'chan-vay-xep-li', 437, 23, 'Chân váy xếp li', 'Chân váy xếp li', '2017-08-14 21:28:33', '2017-08-14 21:28:33'),
(42, 'Đầm ôm', 'dam-om', 654, 22, 'Đầm ôm', 'Đầm ôm', '2017-08-14 21:28:58', '2017-08-14 21:28:58'),
(43, 'Đầm suông', 'dam-suong', 6865, 22, 'Đầm suông', 'Đầm suông', '2017-08-14 21:29:11', '2017-08-14 21:29:47'),
(44, 'Đầm xòe', 'dam-xoe', 451, 22, 'Đầm xòe', 'Đầm xòe', '2017-08-14 21:29:25', '2017-08-14 21:29:25'),
(45, 'Áo len cardigan', 'ao-len-cardigan', 85, 24, 'Áo len cardigan', 'Áo len cardigan', '2017-08-14 21:30:53', '2017-08-14 21:30:53'),
(46, 'Áo len dáng dài', 'ao-len-dang-dai', 7645, 24, 'Áo len dáng dài', 'Áo len dáng dài', '2017-08-14 21:31:18', '2017-08-14 21:31:18'),
(47, 'Áo len ngắn tay', 'ao-len-ngan-tay', 5647, 24, 'Áo len ngắn tay', 'Áo len ngắn tay', '2017-08-14 21:31:53', '2017-08-14 21:31:53'),
(48, 'Áo len cổ lọ', 'ao-len-co-lo', 435, 24, 'Áo len cổ lọ', 'Áo len cổ lọ', '2017-08-14 21:33:01', '2017-08-14 21:33:01'),
(49, 'Áo khoác gió', 'ao-khoac-gio', 46, 25, 'Áo khoác gió', 'Áo khoác gió', '2017-08-14 21:33:32', '2017-08-14 21:33:32'),
(50, 'Áo khoác jeans', 'ao-khoac-jeans', 7685, 25, 'Áo khoác jeans', 'Áo khoác jeans', '2017-08-14 21:33:48', '2017-08-14 21:33:48'),
(51, 'Áo khoác dạ, da lộn', 'ao-khoac-da-da-lon', 7856, 25, 'Áo khoác dạ, da lộn', 'Áo khoác dạ, da lộn', '2017-08-14 21:34:11', '2017-08-14 21:35:03'),
(52, 'Áo khoác lông vũ', 'ao-khoac-long-vu', 86575, 25, 'Áo khoác lông vũ', 'Áo khoác lông vũ', '2017-08-14 21:34:29', '2017-08-14 21:34:29');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL,
  `comm_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comm_content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `status` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comm_name`, `comm_content`, `product_id`, `status`, `created_at`, `updated_at`) VALUES
(49, 'trhrtger', 'htrhrtegr', 12, 0, '2017-08-18 02:50:14', '2017-08-18 02:50:14');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `totalPrice` double NOT NULL,
  `qty` int(11) NOT NULL,
  `status` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `address`, `phone`, `email`, `totalPrice`, `qty`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Tqwe', 'ưefwefwe', '32131241312', 'eqweqw@wqeqw.com', 543555888, 0, 0, '2017-07-25 18:48:22', '2017-08-18 02:43:25'),
(4, 'hrthtr', 'htrhrthrt', '5543523432', 'htrht@gthtrhrt', 1297496, 0, 1, '2017-08-10 01:39:07', '2017-08-18 02:53:02'),
(5, 'hrthtr', 'htrhrthrt', '5543523432', 'htrht@gthtrhrt', 1297496, 0, 1, '2017-08-10 01:39:24', '2017-08-18 02:43:56'),
(6, 'yhthyth', 'tgrtgerfer', '1212412312', 'rtge@FRFRE.FERFRE', 3477170, 0, 2, '2017-08-18 02:57:05', '2017-08-18 02:57:18');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_05_31_064143_create_cates_table', 1),
('2017_05_31_064653_create_products_table', 1),
('2017_05_31_065235_create_product_images_table', 1),
('2017_07_24_083056_create_customers_table', 1),
('2017_07_24_084827_create_product_customers_table', 1),
('2017_07_26_071758_create_comments_table', 2),
('2017_07_26_071816_create_reply_comments_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `intro` text COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `cate_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `alias`, `price`, `intro`, `content`, `image`, `keywords`, `description`, `user_id`, `cate_id`, `created_at`, `updated_at`) VALUES
(9, 'Ao thun cổ tròn', 'ao-thun-co-tron', 259000, '<p>Ao thun cổ tròn</p>\r\n', '<p>Ao thun cổ tròn</p>\r\n', '6ts17s054-sa164-m.jpg', 'Ao thun cổ tròn', 'Ao thun cổ tròn', 1, 27, '2017-08-14 07:39:10', '2017-08-14 07:39:10'),
(10, 'Áo phông nữ cổ tim', 'ao-phong-nu-co-tim', 169000, '<p>Áo phông nữ cổ tim</p>\r\n', '<p>Áo phông nữ cổ tim</p>\r\n', '6ts17s057-sm004-m.jpg', 'Áo phông nữ cổ tim', 'Áo phông nữ cổ tim', 1, 27, '2017-08-14 07:42:33', '2017-08-14 07:42:33'),
(11, 'Áo thun tay lỡ', 'ao-thun-tay-lo', 300000, '<p>Áo thun tay lỡ</p>\r\n', '<p>Áo thun tay lỡ</p>\r\n', '6TE17S010-SA037-34.jpg', 'Áo thun tay lỡ', 'Áo thun tay lỡ', 1, 27, '2017-08-14 08:34:09', '2017-08-14 08:34:09'),
(12, 'Áo sát nách', 'ao-sat-nach', 150000, '<p>Áo sát nách</p>\r\n', '<p>Áo sát nách</p>\r\n', '6TA17S004-SB148-34.jpg', 'Áo sát nách', 'Áo sát nách', 1, 27, '2017-08-14 08:39:07', '2017-08-14 08:39:07'),
(13, 'Áo cộc họa tiết', 'ao-coc-hoa-tiet', 250000, '<p>Áo cộc họa tiết</p>\r\n', '<p>Áo cộc họa tiết</p>\r\n', '6TS17S037-SA026-37.jpg', 'Áo cộc họa tiết', 'Áo cộc họa tiết', 1, 27, '2017-08-14 08:41:47', '2017-08-14 08:41:47'),
(14, 'Áo polo sát nách', 'ao-polo-sat-nach', 260000, '<p>Áo polo sát nách</p>\r\n', '<p>Áo polo sát nách</p>\r\n', '6TP17S002-SB090-34.jpg', 'Áo polo sát nách', 'Áo polo sát nách', 1, 28, '2017-08-14 08:48:57', '2017-08-14 08:48:57'),
(15, 'Áo polo cộc tay', 'ao-polo-coc-tay', 123321, '<p>Áo polo cộc tay</p>\r\n', '<p>Áo polo cộc tay</p>\r\n', '6TP17S009-SW001-34.jpg', 'Áo polo cộc tay', 'Áo polo cộc tay', 1, 28, '2017-08-14 08:51:11', '2017-08-14 08:51:11'),
(16, 'Áo polo nữ', 'ao-polo-nu', 651323, '<p>Áo polo nữ</p>\r\n', '<p>Áo polo nữ</p>\r\n', '6tp17s006-sw001-m.jpg', 'Áo polo nữ', 'Áo polo nữ', 1, 28, '2017-08-14 08:57:03', '2017-08-14 08:57:03'),
(17, 'Áo cộc polo', 'ao-coc-polo', 956513, '<p>Áo cộc polo sọc</p>\r\n', '<p>Áo cộc polo sọc</p>\r\n', '6TP17S005-SK010-34.jpg', 'Áo cộc polo sọc', '                         Áo cộc polo sọc\r\n                    ', 1, 28, '2017-08-14 08:59:29', '2017-08-14 20:26:09'),
(18, 'Sơ mi denim vintage', 'so-mi-denim-vintage', 545434, '<p>Sơ mi denim vintage</p>\r\n', '<p>Sơ mi denim vintage</p>\r\n', 'ao-so-mi-nu-denim-han-quoc-tuyet-dep-2015-tre-trung-phong-cach-bui-bam-cho-co-nang-cong-so-thoi-trang-3.jpg', 'Sơ mi denim vintage', 'Sơ mi denim vintage', 1, 30, '2017-08-14 21:42:59', '2017-08-14 21:42:59'),
(19, 'Denim Korea Style', 'denim-korea-style', 76574, '<p>Denim Korea Style</p>\r\n', '<p>Denim Korea Style</p>\r\n', 'bst-ao-so-mi-denim-nu-dep-ca-tinh-nang-dong-he-2015-2016-4.jpg', 'Denim Korea Style', 'Denim Korea Style', 1, 30, '2017-08-14 21:44:33', '2017-08-14 21:44:33'),
(20, 'Sơmi denim nữ tính', 'somi-denim-nu-tinh', 564654, '<p>Sơmi denim nữ tính</p>\r\n', '<p>Sơmi denim nữ tính</p>\r\n', 'bst-ao-so-mi-denim-nu-dep-ca-tinh-nang-dong-he-2015-2016-7.jpg', 'Sơmi denim nữ tính', 'Sơmi denim nữ tính', 1, 30, '2017-08-14 21:45:36', '2017-08-14 21:45:36'),
(21, 'Khăn lụa họa tiết', 'khan-lua-hoa-tiet', 546345, '<p>Khăn lụa họa tiết</p>\r\n', '<p>Khăn lụa họa tiết</p>\r\n', '6ac16w001-fb064-3.jpg', 'Khăn lụa họa tiết', 'Khăn lụa họa tiết', 1, 34, '2017-08-14 22:54:01', '2017-08-14 22:54:01'),
(22, 'Khăn len', 'khan-len', 524332, '<p>Khăn len</p>\r\n', '<p>Khăn len</p>\r\n', '6ac16w002-sa036-3.jpg', 'Khăn len', 'Khăn len', 1, 34, '2017-08-14 22:58:16', '2017-08-14 22:58:16'),
(23, 'Khăn ống', 'khan-ong', 653454, '<p>Khăn ống</p>\r\n', '<p>Khăn ống</p>\r\n', '6ac16w009-khan-len-1.jpg', 'Khăn ống', 'Khăn ống', 1, 34, '2017-08-14 23:00:34', '2017-08-14 23:00:34'),
(24, 'Quần short jeans', 'quan-short-jeans', 65434, '<p>Quần short jeans</p>\r\n', '<p>Quần short jeans</p>\r\n', '6BJ17S003-SJ166-33_5.jpg', 'Quần short jeans', 'Quần short jeans', 1, 21, '2017-08-14 23:34:45', '2017-08-14 23:34:45'),
(25, 'Quần short kaki', 'quan-short-kaki', 1242321, '<p>Quần short kaki</p>\r\n', '<p>Quần short kaki</p>\r\n', '6BS17S004-SB090-33_1.jpg', 'Quần short kaki', 'Quần short kaki', 1, 21, '2017-08-14 23:35:44', '2017-08-14 23:35:44'),
(26, 'Quần short chấm pi', 'quan-short-cham-pi', 453452, '<p>Quần short chấm pi</p>\r\n', '<p>Quần short chấm pi</p>\r\n', '6bs17s002-sb090-28.jpg', 'Quần short chấm pi', 'Quần short chấm pi', 1, 21, '2017-08-14 23:36:43', '2017-08-14 23:36:43'),
(27, 'Quần short nơ', 'quan-short-no', 234252, '<p>Quần short nơ</p>\r\n', '<p>Quần short nơ</p>\r\n', '6bs17c010-pb084-m.jpg', 'Quần short nơ', 'Quần short nơ', 1, 21, '2017-08-14 23:37:13', '2017-08-14 23:37:13'),
(28, 'Quần short hoa', 'quan-short-hoa', 2341231, '<p>Quần short hoa</p>\r\n', '<p>Quần short hoa</p>\r\n', '6lb17s005-fm034-m.jpg', 'Quần short hoa', 'Quần short hoa', 1, 21, '2017-08-14 23:38:12', '2017-08-14 23:38:12'),
(29, 'Quần thun họa tiết', 'quan-thun-hoa-tiet', 546345, '<p>Quần thun họa tiết</p>\r\n', '<p>Quần thun họa tiết</p>\r\n', '6BS17S022-SA169-33_1.jpg', 'Quần thun họa tiết', 'Quần thun họa tiết', 1, 21, '2017-08-15 00:10:50', '2017-08-15 00:10:50'),
(30, 'quần short mặc nhà', 'quan-short-mac-nha', 234123, '<p>quần short mặc nhà</p>\r\n', '<p>quần short mặc nhà</p>\r\n', '6bs17s013-sb148-m.jpg', 'quần short mặc nhà', 'quần short mặc nhà', 1, 21, '2017-08-15 00:17:08', '2017-08-15 00:17:08'),
(31, 'Váy xòe sát nách', 'vay-xoe-sat-nach', 4353434, '<p>Váy xòe sát nách</p>\r\n', '<p>Váy xòe sát nách</p>\r\n', '6DS17S039-SA1670_1.jpg', 'Váy xòe sát nách', 'Váy xòe sát nách', 1, 44, '2017-08-15 00:38:18', '2017-08-15 00:38:18'),
(32, 'Váy len mỏng', 'vay-len-mong', 234123, '<p>Váy xòe sát nách</p>\r\n', '<p>Váy xòe sát nách</p>\r\n', 'vay-len-nu-6ds15w006-2.jpg', 'Váy xòe sát nách', 'Váy xòe sát nách', 1, 44, '2017-08-15 00:40:54', '2017-08-15 00:40:54'),
(33, 'Váy maxi', 'vay-maxi', 324212, '<p>Váy maxi</p>\r\n', '<p>Váy maxi</p>\r\n', 'vay-maxi-nu-6da16s001-1.jpg', 'Váy maxi', 'Váy maxi', 1, 44, '2017-08-15 00:45:06', '2017-08-15 00:45:06'),
(34, 'Váy thắt belt', 'vay-that-belt', 123121, '<p>Váy thắt belt</p>\r\n', '<p>Váy thắt belt</p>\r\n', '6DS17S015-SK010-33_4.jpg', 'Váy thắt belt', 'Váy thắt belt', 1, 44, '2017-08-15 00:46:17', '2017-08-15 00:46:17'),
(35, 'Váy tay kẻ sát nách', 'vay-tay-ke-sat-nach', 121231, '<p>Váy tay sát nách</p>\r\n', '<p>Váy tay sát nách</p>\r\n', '6da17s003-pbb015-33.jpg', 'Váy tay sát nách', '                         Váy tay sát nách\r\n                    ', 1, 43, '2017-08-15 00:47:50', '2017-08-18 03:36:36');

-- --------------------------------------------------------

--
-- Table structure for table `product_customers`
--

CREATE TABLE IF NOT EXISTS `product_customers` (
  `id` int(10) unsigned NOT NULL,
  `qty` int(10) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_customers`
--

INSERT INTO `product_customers` (`id`, `qty`, `product_id`, `customer_id`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 2, '2017-07-25 10:30:35', '2017-07-25 10:30:35'),
(2, 1, 2, 3, '2017-07-25 18:48:23', '2017-07-25 18:48:23'),
(3, 1, 4, 3, '2017-07-25 18:48:23', '2017-07-25 18:48:23'),
(4, 2, 3, 5, '2017-08-10 01:39:24', '2017-08-10 01:39:24'),
(5, 1, 8, 5, '2017-08-10 01:39:25', '2017-08-10 01:39:25'),
(6, 5, 12, 6, '2017-08-18 02:57:05', '2017-08-18 02:57:05'),
(7, 5, 18, 6, '2017-08-18 02:57:05', '2017-08-18 02:57:05');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE IF NOT EXISTS `product_images` (
  `id` int(10) unsigned NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(6, '6TS17S054-SK010-33.jpg', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '6TS17S054-SK010-34.jpg', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '6ts17s057-sw003-m.jpg', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '6ts17s057-sy016-m.jpg', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '6TE17S010-SA037-33.jpg', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, '6TE17S010-SA037-34.jpg', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, '6te17s010-sa037-m.jpg', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, '6ta17s004-sk010-m.jpg', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, '6TA17S004-SB148-34.jpg', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, '6TA17S004-SB148-37.jpg', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, '6TS17S037-SA026-33.jpg', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, '6TS17S037-SA026-35.jpg', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, '6ts17s037-so014-m.jpg', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, '6TP17S002-SB090-33.jpg', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, '6tp17s002-sb090-m.jpg', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, '6TP17S009-SW001-33.jpg', 15, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, '6tp17s009-sw001-m.jpg', 15, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, '6TP17S006-SW001-34.jpg', 16, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, '6TP17S005-SK010-33.jpg', 17, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, '6TP17S005-SK010-34.jpg', 17, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, '6tp17s005-sk010-m.jpg', 17, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'ao-so-mi-nu-denim-han-quoc-tuyet-dep-2015-tre-trung-phong-cach-bui-bam-cho-co-nang-cong-so-thoi-trang-4.jpg', 18, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'ao-so-mi-nu-denim-han-quoc-tuyet-dep-2015-tre-trung-phong-cach-bui-bam-cho-co-nang-cong-so-thoi-trang-8.jpg', 18, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'ao-so-mi-nu-denim-han-quoc-tuyet-dep-2015-tre-trung-phong-cach-bui-bam-cho-co-nang-cong-so-thoi-trang-10.jpg', 19, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'bst-ao-so-mi-denim-nu-dep-ca-tinh-nang-dong-he-2015-2016-5.jpg', 19, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'bst-ao-so-mi-denim-nu-dep-ca-tinh-nang-dong-he-2015-2016-8.jpg', 20, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'bst-ao-so-mi-denim-nu-dep-ca-tinh-nang-dong-he-2015-2016-4.jpg', 20, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, '6ac16w001-fb066-2.jpg', 21, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, '6ac16w001-fo017-1_2.jpg', 21, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, '6ac16w002-sp013-3.jpg', 22, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, '6ac16w002-sa015-3.jpg', 22, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, '6ac16w002-sr032-3.jpg', 22, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, '6ac16w009-khan-len-3.jpg', 23, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, '6ac16w009-sk103-2.jpg', 23, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, '6bj16s001-sj115-28_4.jpg', 24, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, '6bj17s005-sj180-28.jpg', 24, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, '6bs17s004-sg135-28.jpg', 25, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, '6bs17s003-sg127-28.jpg', 25, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, '6bs17s003-sp071-28.jpg', 25, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, '6bs17s002-sw011-28.jpg', 26, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, '6BS17S003-SB090-33_1.jpg', 26, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, '6bs17c010-sg090-m.jpg', 27, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, '6BS17S018-FW065-33_1.jpg', 28, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, '6lb17s005-fg016-m.jpg', 28, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, '6lb17s005-fb067-m.jpg', 28, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, '6bs17s023-sa169-m.jpg', 29, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, '6lb17s005-fb067-m.jpg', 29, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, '6bs17s023-sa169-m.jpg', 29, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, '6bs17s013-sk010-m.jpg', 30, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, '6bs17s014-sa137-m.jpg', 30, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, '6bs17s014-so064-m.jpg', 30, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, '6bs17s014-sb148-m.jpg', 30, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, '6ds17s039-sm130-m.jpg', 31, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 'vay-len-nu-6ds15w006-4.jpg', 32, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 'vay-maxi-nu-6da16s001-1.jpg', 33, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, '6ds17s015-fm045-m.jpg', 34, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, '6DS17S016-FM045-34_1.jpg', 34, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, '6da17s003-pr006-m.jpg', 35, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `reply_comments`
--

CREATE TABLE IF NOT EXISTS `reply_comments` (
  `id` int(10) unsigned NOT NULL,
  `reply_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reply_content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment_id` int(11) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Thanh Sơn', '$2y$10$XaQhNguHxXPk.LjJeXjvFeSW8t3x8bphaW/EWTm4kgQ.wCDzat1NO', 'mrhip2013@gmail.com', 1, 'odwbwY1EuCeWCTyFicMaT65qKApGSsX2ywO3uus6mD8jewPbRZozDjwj9ss3', '2017-07-25 10:09:27', '2017-08-18 03:44:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cates`
--
ALTER TABLE `cates`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `cates_name_unique` (`name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `products_name_unique` (`name`), ADD KEY `products_user_id_foreign` (`user_id`), ADD KEY `products_cate_id_foreign` (`cate_id`);

--
-- Indexes for table `product_customers`
--
ALTER TABLE `product_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`), ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `reply_comments`
--
ALTER TABLE `reply_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cates`
--
ALTER TABLE `cates`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `product_customers`
--
ALTER TABLE `product_customers`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `reply_comments`
--
ALTER TABLE `reply_comments`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
ADD CONSTRAINT `products_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `cates` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
