-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 03, 2024 at 05:34 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_noi_that`
--

-- --------------------------------------------------------

--
-- Table structure for table `binh_luans`
--

CREATE TABLE `binh_luans` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `tai_khoan_id` int NOT NULL,
  `noi_dung` text NOT NULL,
  `ngay_dang` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `trang_thai` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `binh_luans`
--

INSERT INTO `binh_luans` (`id`, `san_pham_id`, `tai_khoan_id`, `noi_dung`, `ngay_dang`, `trang_thai`) VALUES
(1, 10, 2, 'dadouihahuiahdajkhduahdoiajskldhoiwa', '2024-07-31 17:00:00', 1),
(2, 10, 2, 'dadagedgasjikpejhaiodhiaowdhioauwdWs', '2024-08-05 17:00:00', 1),
(3, 14, 9, 'avav', '2024-08-11 23:24:19', 1),
(4, 14, 9, 'dada', '2024-08-11 23:24:47', 1),
(5, 14, 9, 'adada', '2024-08-11 23:25:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hangs`
--

CREATE TABLE `chi_tiet_don_hangs` (
  `id` int NOT NULL,
  `don_hang_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `don_gia` decimal(10,2) NOT NULL,
  `so_luong` int NOT NULL,
  `thanh_tien` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chi_tiet_don_hangs`
--

INSERT INTO `chi_tiet_don_hangs` (`id`, `don_hang_id`, `san_pham_id`, `don_gia`, `so_luong`, `thanh_tien`) VALUES
(1, 1, 10, '1200000.00', 1, '1200000.00'),
(2, 1, 1, '20000.00', 1, '20000.00');

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_gio_hangs`
--

CREATE TABLE `chi_tiet_gio_hangs` (
  `id` int NOT NULL,
  `gio_hang_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `so_luong` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chi_tiet_gio_hangs`
--

INSERT INTO `chi_tiet_gio_hangs` (`id`, `gio_hang_id`, `san_pham_id`, `so_luong`) VALUES
(1, 1, 14, 4),
(2, 2, 14, 4),
(3, 2, 14, 1),
(4, 2, 15, 1),
(5, 2, 16, 1),
(6, 2, 15, 1),
(7, 2, 15, 1),
(8, 2, 15, 2),
(9, 2, 19, 2),
(10, 2, 23, 2),
(11, 3, 14, 4),
(12, 3, 14, 1),
(13, 3, 15, 1),
(14, 3, 15, 1),
(15, 4, 14, 1),
(16, 4, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chuc_vus`
--

CREATE TABLE `chuc_vus` (
  `id` int NOT NULL,
  `ten_chuc_vu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danh_mucs`
--

CREATE TABLE `danh_mucs` (
  `id` int NOT NULL,
  `ten_danh_muc` varchar(255) NOT NULL,
  `mo_ta` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `danh_mucs`
--

INSERT INTO `danh_mucs` (`id`, `ten_danh_muc`, `mo_ta`) VALUES
(15, 'Bàn làm việc', ''),
(16, 'Ghế', ''),
(17, 'Kệ để đồ', ''),
(18, 'Ghế sofa', ''),
(19, 'Bàn', ''),
(20, 'Tủ', ''),
(21, 'Đèn', ''),
(22, 'bồn tắm', 'đẹp');

-- --------------------------------------------------------

--
-- Table structure for table `don_hangs`
--

CREATE TABLE `don_hangs` (
  `id` int NOT NULL,
  `ma_don_hang` varchar(50) NOT NULL,
  `tai_khoan_id` int NOT NULL,
  `ten_nguoi_nhan` varchar(255) NOT NULL,
  `email_nguoi_nhan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sdt_nguoi_nhan` varchar(15) NOT NULL,
  `dia_chi_nguoi_nhan` text NOT NULL,
  `ngay_dat` date NOT NULL,
  `tong_tien` decimal(10,2) NOT NULL,
  `ghi_chu` text,
  `phuong_thuc_thanh_toan_id` int NOT NULL,
  `trang_thai_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `don_hangs`
--

INSERT INTO `don_hangs` (`id`, `ma_don_hang`, `tai_khoan_id`, `ten_nguoi_nhan`, `email_nguoi_nhan`, `sdt_nguoi_nhan`, `dia_chi_nguoi_nhan`, `ngay_dat`, `tong_tien`, `ghi_chu`, `phuong_thuc_thanh_toan_id`, `trang_thai_id`) VALUES
(3, 'DH3334', 15, 'NGUYEN TIEN THUAN', 'c@gmail.com', '56345353', 'Thôn 1, Yên Sở, Hoài Đức, Hà Nội\r\nThôn 1, Yên Sở, Hoài Đức, Hà Nội', '2024-12-01', '1760000.00', 'dâdw', 1, 1),
(4, 'DH9763', 15, 'NGUYEN TIEN THUAN', 'c@gmail.com', '56345353', 'Thôn 1, Yên Sở, Hoài Đức, Hà Nội\r\nThôn 1, Yên Sở, Hoài Đức, Hà Nội', '2024-12-01', '1760000.00', 'dâdw', 1, 1),
(5, 'DH8131', 15, 'NGUYEN TIEN THUAN', 'c@gmail.com', '56345353', 'Thôn 1, Yên Sở, Hoài Đức, Hà Nội\r\nThôn 1, Yên Sở, Hoài Đức, Hà Nội', '2024-12-01', '1760000.00', 'dâdw', 1, 1),
(6, 'DH5876', 15, 'NGUYEN TIEN THUAN', 'c@gmail.com', '56345353', 'Thôn 1, Yên Sở, Hoài Đức, Hà Nội\r\nThôn 1, Yên Sở, Hoài Đức, Hà Nội', '2024-12-01', '12600000.00', '3rfada', 1, 1),
(7, 'DH6521', 15, 'NGUYEN TIEN THUAN', 'c@gmail.com', '56345353', 'Thôn 1, Yên Sở, Hoài Đức, Hà Nội\r\nThôn 1, Yên Sở, Hoài Đức, Hà Nội', '2024-12-01', '12600000.00', '3rfada', 1, 1),
(8, 'DH6550', 15, 'NGUYEN TIEN THUAN', 'c@gmail.com', '56345353', 'Thôn 1, Yên Sở, Hoài Đức, Hà Nội\r\nThôn 1, Yên Sở, Hoài Đức, Hà Nội', '2024-12-01', '12600000.00', '3rfada', 1, 1),
(9, 'DH3622', 15, 'NGUYEN TIEN THUAN', 'c@gmail.com', '56345353', 'Thôn 1, Yên Sở, Hoài Đức, Hà Nội\r\nThôn 1, Yên Sở, Hoài Đức, Hà Nội', '2024-12-01', '13800000.00', 'twehe5y4gr', 1, 1),
(10, 'DH9492', 15, 'Trang', 'c@gmail.com', '56345353', 'adadadw', '2024-12-01', '16200000.00', '34242', 1, 1),
(11, 'DH8165', 15, 'Trang', 'c@gmail.com', '56345353', 'dadada', '2024-12-01', '19800000.00', 'dadadad', 1, 1),
(12, 'DH2988', 16, 'NGUYEN TIEN THUAN', 'y@gmail.com', '56345353', 'Thôn 1, Yên Sở, Hoài Đức, Hà Nội\r\nThôn 1, Yên Sở, Hoài Đức, Hà Nội', '2024-12-02', '1760000.00', 'gsfs', 1, 1),
(13, 'DH7966', 16, 'adada', 'y@gmail.com', '56345353', 'dâdada', '2024-12-03', '4600000.00', 'adada', 1, 1),
(14, 'DH6691', 16, 'adada', 'y@gmail.com', '56345353', 'dâda', '2024-12-03', '4600000.00', 'adada', 1, 1),
(15, 'DH4817', 16, 'adada', 'y@gmail.com', '56345353', 'dadad', '2024-12-03', '880000.00', 'dada', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gio_hangs`
--

CREATE TABLE `gio_hangs` (
  `id` int NOT NULL,
  `tai_khoan_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gio_hangs`
--

INSERT INTO `gio_hangs` (`id`, `tai_khoan_id`) VALUES
(1, 14),
(2, 15),
(5, 16);

-- --------------------------------------------------------

--
-- Table structure for table `hinh_anh_san_phams`
--

CREATE TABLE `hinh_anh_san_phams` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `link_hinh_anh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hinh_anh_san_phams`
--

INSERT INTO `hinh_anh_san_phams` (`id`, `san_pham_id`, `link_hinh_anh`) VALUES
(11, 11, './uploads/1722706074categories-11.jpg'),
(12, 11, './uploads/1722706074img-1.png'),
(13, 11, './uploads/1722706074img-15-9-600x600.jpg'),
(14, 14, './uploads/1723371324Screenshot 2024-08-11 171310.png'),
(15, 14, './uploads/1723371324Screenshot 2024-08-11 171314.png'),
(16, 14, './uploads/1723371324Screenshot 2024-08-11 171325.png'),
(17, 15, './uploads/1723371470products-7-600x600.jpg'),
(18, 15, './uploads/1723371470products-8-600x600.jpg'),
(19, 15, './uploads/1723371470slider-4.jpg'),
(20, 15, './uploads/1723371470slider-5.jpg'),
(21, 15, './uploads/1723371470slider-6.jpg'),
(22, 16, './uploads/17233715891722685109categories-6.jpg'),
(23, 16, './uploads/17233715891722685109slider-4.jpg'),
(24, 16, './uploads/17233715891722685109slider-5.jpg'),
(25, 16, './uploads/17233715891722685109slider-6.jpg'),
(26, 16, './uploads/17233715891722685262img-1.png'),
(27, 16, './uploads/17233715891722698488banner-6-1.jpg'),
(28, 17, './uploads/172337164917233715891722685109slider-4.jpg'),
(29, 17, './uploads/172337164917233715891722685109slider-5.jpg'),
(30, 17, './uploads/172337164917233715891722685109slider-6.jpg'),
(31, 17, './uploads/172337164917233715891722685262img-1.png'),
(32, 17, './uploads/172337164917233715891722698488banner-6-1.jpg'),
(33, 17, './uploads/172337164917233715891723371470slider-6.jpg'),
(34, 18, './uploads/172337171817233715891722698488banner-6-1.jpg'),
(35, 18, './uploads/172337171817233715891723371470slider-6.jpg'),
(36, 18, './uploads/1723371718172337164917233715891722685109slider-4.jpg'),
(37, 18, './uploads/1723371718172337164917233715891722685109slider-5.jpg'),
(38, 18, './uploads/1723371718172337164917233715891722685109slider-6.jpg'),
(39, 18, './uploads/1723371718172337164917233715891722685262img-1.png'),
(40, 19, './uploads/1723372066categories-19.jpg'),
(41, 19, './uploads/1723372066products-4.jpg'),
(42, 19, './uploads/1723372066products-10-1-600x600.jpg'),
(43, 19, './uploads/1723372066products-10-2-600x600.jpg'),
(44, 19, './uploads/1723372066products-10-4-600x600.jpg'),
(45, 19, './uploads/1723372066products-10-5-600x600.jpg'),
(46, 19, './uploads/1723372066products-10-7.jpg'),
(47, 19, './uploads/1723372066products-13-1-600x600.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `phuong_thuc_thanh_toans`
--

CREATE TABLE `phuong_thuc_thanh_toans` (
  `id` int NOT NULL,
  `ten_phuong_thuc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `phuong_thuc_thanh_toans`
--

INSERT INTO `phuong_thuc_thanh_toans` (`id`, `ten_phuong_thuc`) VALUES
(1, 'Thanh toán COD'),
(2, 'Thanh toán online');

-- --------------------------------------------------------

--
-- Table structure for table `san_phams`
--

CREATE TABLE `san_phams` (
  `id` int NOT NULL,
  `ten_san_pham` varchar(255) NOT NULL,
  `gia_san_pham` decimal(10,2) NOT NULL,
  `gia_khuyen_mai` decimal(10,2) DEFAULT NULL,
  `hinh_anh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `so_luong` int NOT NULL,
  `luot_xem` int DEFAULT '0',
  `ngay_nhap` date NOT NULL,
  `mo_ta` text,
  `danh_muc_id` int NOT NULL,
  `trang_thai` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `san_phams`
--

INSERT INTO `san_phams` (`id`, `ten_san_pham`, `gia_san_pham`, `gia_khuyen_mai`, `hinh_anh`, `so_luong`, `luot_xem`, `ngay_nhap`, `mo_ta`, `danh_muc_id`, `trang_thai`) VALUES
(1, 'Bàn làm việc A', '100.00', '90.00', 'ban_lam_viec_A.jpg', 10, 0, '2023-10-01', 'Bàn làm việc chất lượng cao', 15, 1),
(2, 'Bàn làm việc B', '150.00', '135.00', 'ban_lam_viec_B.jpg', 15, 0, '2023-10-01', 'Bàn làm việc hiện đại', 15, 1),
(3, 'Ghế A', '50.00', '45.00', 'ghe_A.jpg', 20, 0, '2023-10-01', 'Ghế ngồi thoải mái', 16, 1),
(4, 'Ghế B', '60.00', '54.00', 'ghe_B.jpg', 25, 0, '2023-10-01', 'Ghế văn phòng', 16, 1),
(5, 'Kệ để đồ A', '80.00', '72.00', 'ke_A.jpg', 30, 0, '2023-10-01', 'Kệ để đồ tiện dụng', 17, 1),
(6, 'Kệ để đồ B', '90.00', '81.00', 'ke_B.jpg', 35, 0, '2023-10-01', 'Kệ để đồ đa năng', 17, 1),
(7, 'Ghế sofa A', '200.00', '180.00', 'ghe_sofa_A.jpg', 5, 0, '2023-10-01', 'Ghế sofa êm ái', 18, 1),
(8, 'Ghế sofa B', '250.00', '225.00', 'ghe_sofa_B.jpg', 8, 0, '2023-10-01', 'Ghế sofa sang trọng', 18, 1),
(9, 'Bàn A', '120.00', '108.00', 'ban_an_A.jpg', 12, 0, '2023-10-01', 'Bàn ăn gia đình', 19, 1),
(10, 'Bàn B', '130.00', '117.00', 'ban_hoc_B.jpg', 14, 0, '2023-10-01', 'Bàn học sinh', 19, 1),
(11, 'Tủ A', '300.00', '270.00', 'tu_A.jpg', 6, 0, '2023-10-01', 'Tủ quần áo', 20, 1),
(12, 'Tủ B', '350.00', '315.00', 'tu_B.jpg', 7, 0, '2023-10-01', 'Tủ bếp', 20, 1),
(13, 'Đèn A', '40.00', '36.00', 'den_ban_A.jpg', 50, 0, '2023-10-01', 'Đèn bàn', 21, 1),
(14, 'Đèn B', '45.00', '40.50', 'den_ngu_B.jpg', 55, 0, '2023-10-01', 'Đèn ngủ', 21, 1),
(15, 'Bồn tắm A', '500.00', '450.00', 'bon_tam_A.jpg', 3, 0, '2023-10-01', 'Bồn tắm hiện đại', 22, 1),
(16, 'Bồn tắm B', '550.00', '495.00', 'bon_tam_B.jpg', 4, 0, '2023-10-01', 'Bồn tắm sang trọng', 22, 1),
(17, 'Bàn làm việc C', '110.00', '99.00', 'ban_lam_viec_C.jpg', 10, 0, '2023-10-01', 'Bàn làm việc phong cách', 15, 1),
(18, 'Ghế C', '55.00', '49.50', 'ghe_C.jpg', 20, 0, '2023-10-01', 'Ghế ngồi thoải mái', 16, 1),
(19, 'Kệ để đồ C', '85.00', '76.50', 'ke_C.jpg', 30, 0, '2023-10-01', 'Kệ để đồ tiện dụng', 17, 1),
(20, 'Ghế sofa C', '210.00', '189.00', 'ghe_sofa_C.jpg', 5, 0, '2023-10-01', 'Ghế sofa êm ái', 18, 1),
(21, 'Bàn C', '125.00', '112.50', 'ban_an_C.jpg', 12, 0, '2023-10-01', 'Bàn ăn gia đình', 19, 1),
(22, 'Tủ C', '310.00', '279.00', 'tu_C.jpg', 6, 0, '2023-10-01', 'Tủ quần áo', 20, 1),
(23, 'Đèn C', '42.00', '37.80', 'den_ban_C.jpg', 50, 0, '2023-10-01', 'Đèn bàn', 21, 1),
(24, 'Bồn tắm C', '520.00', '468.00', 'bon_tam_C.jpg', 3, 0, '2023-10-01', 'Bồn tắm hiện đại', 22, 1),
(25, 'Bàn làm việc D', '115.00', '103.50', 'ban_lam_viec_D.jpg', 10, 0, '2023-10-01', 'Bàn làm việc phong cách', 15, 1),
(26, 'bàn làm việc', '5000000.00', '2400000.00', './uploads/17326679871722685109slider-4.jpg', 23, 0, '2024-05-06', 'Siêu đẹp', 19, 1),
(27, 'bàn làm việc', '5000000.00', '2400000.00', './uploads/17326679161722680885slider-4.jpg', 23, 0, '2024-05-06', 'Siêu đẹp', 19, 1),
(28, 'bàn làm việc', '5000000.00', '2400000.00', './uploads/1732668526ketchen-room.jpg', 23, 0, '2024-05-06', 'Siêu đẹp', 19, 1),
(29, 'bàn làm việc', '5000000.00', '2400000.00', './uploads/17326685431722706074img-15-9-600x600.jpg', 23, 0, '2024-05-06', 'Siêu đẹp', 19, 1),
(30, 'bàn làm việc', '5000000.00', '2400000.00', './uploads/1723372066products-10-5-600x600.jpg', 23, 0, '2024-05-06', 'Siêu đẹp', 19, 1),
(31, 'bàn làm việc', '5000000.00', '2400000.00', './uploads/17326403351722684733img-15-9-600x600.jpg', 23, 0, '2024-05-06', 'Siêu đẹp', 19, 1),
(32, 'bàn làm việc', '5000000.00', '2400000.00', './uploads/1723372066products-10-5-600x600.jpg', 23, 0, '2024-05-06', 'Siêu đẹp', 19, 1),
(33, 'bàn làm việc', '5000000.00', '2400000.00', './uploads/17326679311722684522img-1.png', 23, 0, '2024-05-06', 'Siêu đẹp', 19, 1),
(34, 'Đèn ngủ', '5000000.00', '2400000.00', './uploads/17326683431722706074categories-11.jpg', 23, 0, '2024-05-06', 'Siêu đẹp', 19, 1),
(35, 'ghế ngồi', '5000000.00', '2400000.00', './uploads/17326683591722706074products-1-600x600.jpg', 23, 0, '2024-05-06', 'Siêu đẹp', 19, 1),
(36, 'bàn làm việc', '5000000.00', '2400000.00', './uploads/1723372066products-10-5-600x600.jpg', 23, 0, '2024-05-06', 'Siêu đẹp', 19, 1),
(37, 'ghế', '5000000.00', '2400000.00', './uploads/17326684171723371470slider-6.jpg', 23, 0, '2024-05-06', 'Siêu đẹp', 19, 1),
(38, 'bàn làm việc', '5000000.00', '2400000.00', './uploads/17326684541722706074img-15-9-600x600.jpg', 23, 0, '2024-05-06', 'Siêu đẹp', 19, 1),
(39, 'ghế', '5000000.00', '2400000.00', './uploads/17326684841723371649banner-6-1.jpg', 23, 0, '2024-05-06', 'Siêu đẹp', 19, 1),
(40, 'bàn làm việc', '5000000.00', '2400000.00', './uploads/1732668505categories-7.jpg', 23, 0, '2024-05-06', 'Siêu đẹp', 19, 1),
(41, 'bàn làm việc', '5000000.00', '2400000.00', './uploads/1723372066products-10-5-600x600.jpg', 23, 0, '2024-05-06', 'Siêu đẹp', 19, 1),
(42, 'Ghế ngồi', '5000000.00', '2400000.00', './uploads/17326683241722685109categories-6.jpg', 23, 0, '2024-05-06', 'Siêu đẹp', 19, 1),
(43, 'Ghế sofa', '5000000.00', '2400000.00', './uploads/17326682641722685109slider-4.jpg', 23, 0, '2024-05-06', 'Siêu đẹp', 19, 1),
(44, 'Ghế sofa', '5000000.00', '2400000.00', './uploads/17326680141722680885slider-4.jpg', 23, 0, '2024-05-06', 'Siêu đẹp', 19, 1),
(45, 'Tủ đựng đồ', '5000000.00', '2400000.00', './uploads/17326680701722684567categories-10.jpg', 23, 0, '2024-05-06', 'Siêu đẹp', 19, 1),
(46, 'ghế ngồi', '5000000.00', '2400000.00', './uploads/17326681791722684868img-15-9-600x600.jpg', 23, 0, '2024-05-06', 'Siêu đẹp', 19, 1),
(47, 'ghế ngồi', '5000000.00', '2400000.00', './uploads/17326682061722685262img-1.png', 23, 0, '2024-05-06', 'Siêu đẹp', 19, 1),
(48, 'bàn làm việc', '5000000.00', '2400000.00', './uploads/1723372066products-10-5-600x600.jpg', 23, 0, '2024-05-06', 'Siêu đẹp', 19, 1),
(50, 'Ghế G', '64.00', '57.60', 'ghe_G.jpg', 20, 0, '2023-10-01', 'Ghế ngồi thoải mái', 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoans`
--

CREATE TABLE `tai_khoans` (
  `id` int NOT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `anh_dai_dien` varchar(255) DEFAULT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `gioi_tinh` tinyint(1) NOT NULL DEFAULT '1',
  `dia_chi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `mat_khau` varchar(255) NOT NULL,
  `chuc_vu_id` int NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tai_khoans`
--

INSERT INTO `tai_khoans` (`id`, `ho_ten`, `anh_dai_dien`, `ngay_sinh`, `email`, `so_dien_thoai`, `gioi_tinh`, `dia_chi`, `mat_khau`, `chuc_vu_id`, `trang_thai`) VALUES
(11, 'Thuan', NULL, NULL, 'b@gmail.com', '56345353', 1, NULL, '$2y$10$YqHT1Jia4TnKcaYyNXRLmOy2Tvdwugr9rzRGwtkc.M1smLSJQjnO.', 1, 1),
(14, 'adada', NULL, NULL, 'kmisme07@gmail.com', '56345353', 1, NULL, '$2y$10$p21UpMUTx2X/NsTJCTd1TOUsNgWFGb3DHHjd3bcksdTWmz1Wv1qoO', 2, 1),
(15, 'Trang', NULL, NULL, 'c@gmail.com', '56345353', 1, NULL, '$2y$10$z7GkLdMSqbeUmRREfCE/Pe/NC5/1lNpamhs/MA/.w/9lf/UMjnWvG', 2, 1),
(16, 'adada', NULL, NULL, 'y@gmail.com', '56345353', 1, NULL, '$2y$10$Bt2Qh/pLOHn2aXHFwZ8OxubrmJUt1l9VXS5txiYz4f.Ba7FYp.BxG', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai_don_hangs`
--

CREATE TABLE `trang_thai_don_hangs` (
  `id` int NOT NULL,
  `ten_trang_thai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `trang_thai_don_hangs`
--

INSERT INTO `trang_thai_don_hangs` (`id`, `ten_trang_thai`) VALUES
(1, 'Đã xác nhận'),
(2, 'Chưa xác nhận'),
(3, 'Đã thanh toán'),
(4, 'Chưa thanh toán'),
(5, 'Đã giao'),
(6, 'Đã nhận'),
(7, 'Đang chuẩn bị hàng'),
(8, 'Thành công'),
(9, 'Đang giao'),
(10, 'Hoàn hàng'),
(11, 'Hủy Đơn');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binh_luans`
--
ALTER TABLE `binh_luans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chuc_vus`
--
ALTER TABLE `chuc_vus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phuong_thuc_thanh_toans`
--
ALTER TABLE `phuong_thuc_thanh_toans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `san_phams`
--
ALTER TABLE `san_phams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tai_khoans`
--
ALTER TABLE `tai_khoans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binh_luans`
--
ALTER TABLE `binh_luans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `chuc_vus`
--
ALTER TABLE `chuc_vus`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `don_hangs`
--
ALTER TABLE `don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `phuong_thuc_thanh_toans`
--
ALTER TABLE `phuong_thuc_thanh_toans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `san_phams`
--
ALTER TABLE `san_phams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tai_khoans`
--
ALTER TABLE `tai_khoans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
