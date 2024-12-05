-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 05, 2024 at 03:05 PM
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
(11, 11, './uploads/1733406766tu-de-quan-ao-bang-go-cong-nghiep-mdf-ghs-51821-7.jpg'),
(12, 11, './uploads/1733406766tu-de-quan-ao-bang-go-cong-nghiep-mdf-ghs-51821-6.jpg'),
(13, 11, './uploads/1733406766tu-de-quan-ao-bang-go-cong-nghiep-mdf-ghs-51821-ava.jpg'),
(14, 14, './uploads/1733407882den-tran-hinh-tron-minimalist-chong-choi-nvc657-7.jpg'),
(15, 14, './uploads/1733407882den-tran-hinh-tron-minimalist-chong-choi-nvc657-3.jpg'),
(16, 14, './uploads/1733407882den-tran-hinh-tron-minimalist-chong-choi-nvc657-2.jpg'),
(17, 15, './uploads/1733408717Bon-Tam-Goc-Amazon-TP-7005.2-600x450.jpg'),
(18, 15, './uploads/1733408717Bon-Tam-Goc-Amazon-TP-7005.3-600x450.jpg'),
(19, 15, './uploads/1733408717Bon-Tam-Goc-Amazon-TP-7005.4-600x800.jpg'),
(20, 15, './uploads/1733408717Bon-Tam-Goc-Amazon-TP-7005-600x600.jpg'),
(21, 15, './uploads/1733408717bon-tam-amazon-tp-7005-chinh-hang.jpg'),
(22, 16, './uploads/1733408957AT3350R-xa-phai-1090x1090.webp'),
(23, 16, './uploads/1733408957AT3350L-xa-trai-1090x1090.webp'),
(24, 16, './uploads/1733408957ban-ve-bon-tam-caesar-at3350lr-chan-yem-1090x1090.webp'),
(34, 18, './uploads/1733404530ghe-nhua-duc-st3002-cafe (1).jpg'),
(35, 18, './uploads/1733404530ghe-nhua-mau-do-st3002-01.jpg'),
(36, 18, './uploads/1733404530ghe-cafe-nhua-nhieu-mau-3002-03.jpg'),
(37, 18, './uploads/1733404530ghe-cafe-nhua-nhieu-mau-3002-08.jpg'),
(40, 19, './uploads/1733409152Ke-go-trang-tri-phong-khach-gia-dinh-GHS-146-2.jpg'),
(41, 19, './uploads/1733409131Ke-go-trang-tri-phong-khach-gia-dinh-GHS-146-3.jpg'),
(42, 19, './uploads/1733409131Ke-go-trang-tri-phong-khach-gia-dinh-GHS-146-4.jpg'),
(43, 19, './uploads/1733409131Ke-go-trang-tri-phong-khach-gia-dinh-GHS-146-5.jpg'),
(44, 19, './uploads/1733409131Ke-go-trang-tri-phong-khach-gia-dinh-GHS-146-ava.png'),
(48, 1, './uploads/1733402552Ban-hoc-co-ngan-keo-SD35_4.webp'),
(49, 1, './uploads/1733402552Ban-hoc-co-ngan-keo-SD35_5.webp'),
(50, 1, './uploads/1733402552Ban-hoc-co-ngan-keo-SD352.webp'),
(51, 1, './uploads/1733402742Ban-hoc-co-ngan-keo-SD35_6.webp'),
(52, 2, './uploads/1733402976Ban-hoc-go-cao-su-ST42-4-600x600.jpg'),
(53, 2, './uploads/1733402976Ban-hoc-go-cao-su-ST42.jpg'),
(54, 2, './uploads/1733402976Ban-hoc-go-cao-su-ST42-3.jpg'),
(55, 2, './uploads/1733402976Ban-hoc-go-cao-su-ST42-2-600x600.jpg'),
(56, 3, './uploads/1733403652ghe-giam-doc-boc-da-sp-568-7.jpg'),
(57, 3, './uploads/1733403652ghe-giam-doc-boc-da-sp-568-5.jpg'),
(58, 3, './uploads/1733403652ghe-giam-doc-boc-da-sp-568-3.jpg'),
(59, 3, './uploads/1733403663ghe-giam-doc-boc-da-sp-568-1.jpg'),
(60, 4, './uploads/1733404255ghe-giam-doc-boc-da-sp-568-1.jpg'),
(61, 4, './uploads/1733404255ghe-boc-nem-chan-sat-8.jpg'),
(62, 4, './uploads/1733404255ghe-boc-nem-chan-sat-4.jpg'),
(63, 4, './uploads/1733404255ghe-boc-nem-chan-sat-7.jpg'),
(64, 5, './uploads/1733404934ke-de-may-in-ghc-51143-3.jpg'),
(65, 5, './uploads/1733404934ke-de-may-in-ghc-51143-2.jpg'),
(66, 5, './uploads/1733404934ke-de-may-in-ghc-51143-1.jpg'),
(67, 5, './uploads/1733404934avar-ke-de-may-in-ghc-51143-.jpg'),
(68, 6, './uploads/1733405198ke-de-do-ke-go-trang-tri-thiet-ke-o-vuong-tien-loi-ghc-2412-3.jpg'),
(69, 6, './uploads/1733405198ke-de-do-ke-go-trang-tri-thiet-ke-o-vuong-tien-loi-ghc-2412-6.jpg'),
(70, 6, './uploads/1733405198ke-de-do-ke-go-trang-tri-thiet-ke-o-vuong-tien-loi-ghc-2412-ava2-1.jpg'),
(71, 6, './uploads/1733405198ke-de-do-ke-go-trang-tri-thiet-ke-o-vuong-tien-loi-ghc-2412-4.jpg'),
(72, 7, './uploads/1733405614pro_nau_noi_that_moho_ghe___2__c648897f772e4625814ccac55146f785_master.webp'),
(73, 7, './uploads/1733405614pro_nau_noi_that_moho_ghe___4__034ef885615e4257bf52226e71d06092_master.jpg'),
(74, 7, './uploads/1733405614pro_nau_noi_that_moho_ghe___6__555c114c458c4522a8f52b408fa281bc_master.jpg'),
(75, 7, './uploads/1733405614pro_nau_noi_that_moho_ghe___8__83be5ef25a634c33bcccccff332709cf_master.jpg'),
(76, 7, './uploads/1733405614pro_nau_noi_that_moho_ghe_bdc5094c1d0a4520b209c54ea88e10ba_master.jpg'),
(77, 8, './uploads/1733405864pro_nau_noi_that_moho_ghe_sofa_go_vline_dem_be_5_64539e86ca6e45a1bbb6b3e37440c118_master (1).jpg'),
(79, 8, './uploads/1733405864pro_nau_noi_that_moho_ghe_sofa_go_vline_dem_be_hfbfbd_e3ba9cdd45664c79aaf1d2d9cf5e4758_master.webp'),
(80, 8, './uploads/1733405864pro_nau_noi_that_moho_ghe_sofa_go_vline_dem_be_hfbfbd_e3ba9cdd45664c79aaf1d2d9cf5e4758_master.webp'),
(81, 8, './uploads/1733405864pro_nau_noi_that_moho_ghe_sofa_go_vline_dem_be_2_8481c99127b74a319d33504cd3227b34_master.webp'),
(82, 20, './uploads/1733406022pro_mau_nau_xam_noi_that_moho_sofa_goc_phai___3__f54bc175ab754f899aa1ec04b3573589_master.jpg'),
(83, 20, './uploads/1733406022pro_mau_nau_xam_noi_that_moho_sofa_goc_phai___4__78a4a47d9b204462b369bec337b12ff4_master.jpg'),
(84, 20, './uploads/1733406022pro_mau_nau_xam_noi_that_moho_sofa_goc_phai___5__229f3cbd5cd748e4a9f20d81a1fd5539_master.jpg'),
(85, 20, './uploads/1733406022pro_mau_nau_xam_noi_that_moho_sofa_goc_phai___1__796a299067414ef3acdb39aaa859118e_master.jpg'),
(86, 20, './uploads/1733406022pro_mau_nau_xam_noi_that_moho_sofa_goc_phai___2__af8b7439219448088a86001e3612fa7b_master.jpg'),
(87, 9, './uploads/1733406366EC-12T-ct2-ok.jpg'),
(88, 9, './uploads/1733406366EC12T-ct1-ok-1.jpg'),
(89, 9, './uploads/1733406366EC-12T-ct3-ok.jpg'),
(90, 10, './uploads/1733406534Bàn-gỗ-làm-việc-hiện-đại-Dixon-7-600x600.jpg'),
(91, 10, './uploads/1733406534Ban-go-lam-viec-hien-dai-Dixon-600x600.jpg'),
(92, 10, './uploads/17334065340004_Bàn-gỗ-làm-việc-hiện-đại-Dixon-7-600x600.jpg'),
(93, 10, './uploads/1733406534Ban-go-lam-viec-hien-dai-Dixon-3.jpg'),
(94, 11, './uploads/1733406785tu-de-quan-ao-bang-go-cong-nghiep-mdf-ghs-51821-5.jpg'),
(95, 11, './uploads/1733406785tu-de-quan-ao-bang-go-cong-nghiep-mdf-ghs-51821-3.jpg'),
(96, 12, './uploads/1733407066tu-dung-quan-ao-go-cong-nghiep-mdf-cao-cap-ghs-51171-5.jpg'),
(97, 12, './uploads/1733407066tu-dung-quan-ao-go-cong-nghiep-mdf-cao-cap-ghs-51171-3.jpg'),
(98, 12, './uploads/1733407066tu-dung-quan-ao-go-cong-nghiep-mdf-cao-cap-ghs-51171-2.jpg'),
(99, 12, './uploads/1733407066tu-dung-quan-ao-go-cong-nghiep-mdf-cao-cap-ghs-51171-1.jpg'),
(100, 12, './uploads/1733407087tu-dung-quan-ao-go-cong-nghiep-mdf-cao-cap-ghs-51171-ava.jpg'),
(101, 13, './uploads/1733407688den-pha-le-khung-dong-bac-au-cao-cap-mc350-15h-8-350x350.jpg'),
(102, 13, './uploads/1733407688den-pha-le-khung-dong-bac-au-cao-cap-mc350-15h-6.jpg'),
(103, 13, './uploads/1733407688den-pha-le-khung-dong-bac-au-cao-cap-mc350-15h-1.jpg'),
(104, 13, './uploads/1733407688den-pha-le-khung-dong-bac-au-cao-cap-mc350-15h-5.jpg'),
(105, 14, './uploads/1733407882den-tran-hinh-tron-minimalist-chong-choi-nvc657-10.jpg'),
(106, 21, './uploads/1733409499pro_mau_tu_nhien_noi_that_moho_ban_lam_viec_vline_1_92060b73c393469181d9d24218c38851_master.webp'),
(107, 21, './uploads/1733409499pro_mau_tu_nhien_noi_that_moho_ban_lam_viec_vline_7_fb8a8b06d20b446381fb47f1e5c367df_master.webp'),
(108, 21, './uploads/1733409499pro_mau_tu_nhien_noi_that_moho_ban_lam_viec_vline_2_c5873c63ba1d417d93a80ad99569ef51_master.webp'),
(109, 21, './uploads/1733409521pro_mau_tu_nhien_noi_that_moho_ban_lam_viec_vline_5_70a8ab5d00c6463ea5eee815b34800b3_master.webp'),
(110, 21, './uploads/1733409521pro_mau_tu_nhien_noi_that_moho_ban_lam_viec_vline_3_b32e93a14f7b4af6866b0beb92e35798_master.webp'),
(111, 22, './uploads/1733410041tu-ao-quan-huong-da-co-ke-trang-tri--ta966-1654055270-3523af.jpg'),
(112, 22, './uploads/1733410041tu-ao-quan-huong-da-co-ke-trang-tri--ta966-1654055403-6ab90c.jpg'),
(113, 22, './uploads/1733410041tu-ao-quan-huong-da-co-ke-trang-tri--ta966-1654055403-464469.jpg'),
(114, 22, './uploads/1733410041tu-ao-quan-huong-da-co-ke-trang-tri--ta966-1654055404-e8885b.jpg'),
(115, 22, './uploads/1733410041tu-ao-quan-huong-da-co-ke-trang-tri--ta966-1654055405-fbf083.jpg'),
(116, 23, './uploads/1733410160RA_21Tx1200x1200x4.jpg'),
(117, 23, './uploads/1733410160RA179___2___2_x1200x1200x4.jpg'),
(118, 23, './uploads/1733410160RA179___2___2_x1200x1200x4.jpg'),
(119, 23, './uploads/1733410160RA179_2_x1200x1200x4.jpg'),
(120, 24, './uploads/1733410369bon-tam-inax-bf-1760v-1090x1090.webp'),
(121, 24, './uploads/1733410369inax-bf-1760v-showroom-tdm-2-1090x1090.webp'),
(122, 24, './uploads/1733410369inax-bf-1760v-showroom-tdm-3-1090x1090.webp'),
(123, 24, './uploads/1733410381ban-ve-inax-BF-1760V-1090x1090.webp'),
(124, 24, './uploads/1733410369inax-bf-1760v-showroom-tdm-1090x1090.webp'),
(125, 25, './uploads/1733410553ban-lam-viec-dung-blvd04-1.jpeg'),
(126, 25, './uploads/1733410553ban-lam-viec-dung-blvd04-2-612x612.jpeg'),
(127, 25, './uploads/1733410553ban-lam-viec-dung-blvd04-3-600x600.jpeg'),
(128, 25, './uploads/1733410553ban-lam-viec-dung-blvd04-4-612x612.jpeg'),
(129, 25, './uploads/1733410553ban-lam-viec-dung-blvd04-5-612x612.jpeg'),
(130, 28, './uploads/17334106724_923c31fc997649aaaa7890dcb766d5ab_master.webp'),
(131, 28, './uploads/17334106729_d2f06699b9d64fdb89125667e88ce251_master.webp'),
(132, 28, './uploads/173341067211_0e4c9b60ee5644c2b5cd740a9f75d363_master.webp'),
(133, 28, './uploads/17334106721_53735b421ee9430a8190e70b75561190_master.webp'),
(134, 28, './uploads/17334106723_beaae13717834d33852011c635d98357_master.webp'),
(135, 34, './uploads/1733410901products-17-6-600x600.jpg'),
(136, 34, './uploads/1733410901RA_21Tx1200x1200x4.jpg'),
(137, 34, './uploads/1733410901den-tran-hinh-tron-minimalist-chong-choi-nvc657-2.jpg'),
(138, 34, './uploads/1733410901products-10-7.jpg');

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
(1, 'Bàn học ngăn kéo SD35', '100000.00', '90000.00', './uploads/1733402844Ban-hoc-co-ngan-keo-SD352.webp', 10, 0, '2023-10-01', 'Bàn làm việc chất lượng cao', 15, 1),
(2, 'Bàn học gỗ cao su ST42', '1500000.00', '1200000.00', './uploads/1733402982Ban-hoc-go-cao-su-ST42.jpg', 15, 0, '2024-11-11', 'Thiết kế: Phong cách sang trọng và trang nhã\r\nMàu sắc: vàng nhạt gỗ cao su\r\nKích thước: 100cm x 55cm x 116cm (Dài x Rộng x Cao)\r\nChất liệu: Gỗ cao su tự nhiên\r\nPhụ kiện: Kệ sách, hộp kéo nhỏ, kệ để đồ bên dưới\r\nLắp ráp: Video hướng dẫn chi tiết, dụng cụ và ốc vít lắp ráp.\r\nBảo hành: 24 tháng.', 15, 1),
(3, 'Ghế giám đốc bọc da cao cấp', '3000000.00', '2500000.00', './uploads/1733403726ghe-giam-doc-boc-da-sp-568-1.jpg', 20, 0, '2024-02-02', 'Công năng sử dụng: Ghế giám đốc, ghế làm việc,...\r\nChức năng ghế: tăng giảm độ cao, gật gù lưng, ngả lưng 120 độ, chân xoay\r\nChất liệu: Nệm PU mềm, chân hợp kim nhôm bóng\r\nKích thước (DxRxC): 82x68x45-54cm (115-124)', 16, 1),
(4, 'Ghế Elara bọc nệm da bò sáp lưng', '1300000.00', '999000.00', './uploads/1733404311ghe-boc-nem-chan-sat-1.jpg', 25, 0, '2024-02-11', 'Ghế Elera GAK128 là sự lựa chọn hoàn hảo cho những ai yêu thích sự tinh tế, sang trọng. Thiết kế giao thoa tinh tế giữa phong cách Bắc Âu và Mid-century tạo nên một bản giao hưởng thị giác độc đáo. Với đường nét mềm mại, uyển chuyển như những chiếc lá, phần lưng ghế không chỉ mang đến sự thoải mái tối đa mà còn là điểm nhấn đầy cuốn hút cho không gian sống của bạn. Phần ngồi được thiết kế ôm sát cơ thể, kết hợp với chất liệu da bò sáp cao cấp, mang đến cảm giác êm ái, thư thái, xứng tầm một tác phẩm nội thất thượng hạng.', 16, 1),
(5, 'Kệ để đồ văn phòng di động', '150000.00', '100000.00', './uploads/1733404888avar-ke-de-may-in-ghc-51143-.jpg', 30, 0, '2023-10-01', 'Kệ để đồ tiện dụng', 17, 1),
(6, 'Kệ để đồ, kệ gỗ trang trí thiết kế ô vuông tiện lợi', '250000.00', '100000.00', './uploads/1733405149ke-de-do-ke-go-trang-tri-thiet-ke-o-vuong-tien-loi-ghc-2412-1.jpg', 35, 0, '2024-02-11', ' kệ gỗ trang trí thiết kế ô vuông tiện lợi', 17, 1),
(7, 'Ghế Sofa MOHO HALDEN 801', '9000000.00', '8100000.00', './uploads/1733405577pro_nau_noi_that_moho_ghe_bdc5094c1d0a4520b209c54ea88e10ba_master.jpg', 5, 0, '2023-10-01', 'Kích thước: Dài 180cm x Rộng 85cm x Cao 82cm\r\n\r\nChất liệu:\r\n\r\n- Gỗ cao su tự nhiên\r\n\r\n- Vải sợi tổng hợp có khả năng chống thấm nước và dầu\r\n\r\n(*) Tiêu chuẩn California Air Resources Board xuất khẩu Mỹ, đảm bảo gỗ không độc hại, an toàn sức khỏ', 18, 1),
(8, 'Ghế Sofa Gỗ Tràm Tự Nhiên MOHO VLINE', '10000000.00', '7990000.00', './uploads/1733405734pro_nau_noi_that_moho_ghe_sofa_go_vline_dem_be_2_8481c99127b74a319d33504cd3227b34_master.webp', 8, 0, '2023-10-01', 'Kích thước: Dài: 180cm x Rộng 85cm x Cao 69cm\r\n\r\nChất liệu:\r\n\r\n- Thân ghế: Gỗ tràm tự nhiên\r\n\r\n- Chân ghế: Gỗ cao su tự nhiên\r\n\r\n- Vải sợi tổng hợp kháng khuẩn, chống nhăn, kháng bụi bẩn và nấm mốc\r\n\r\n- Tấm phản: Gỗ công nghiệp Plywood chuẩn CARB-P2 (*) \r\n\r\n(*) Tiêu chuẩn California Air Resources Board xuất khẩu Mỹ, đảm bảo gỗ không độc hại, an toàn sức khỏe.', 18, 1),
(9, 'Bàn chân vuông Eos 1m2 EC12T', '300000.00', '250000.00', './uploads/1733406325EC12T-ct1-ok-1.jpg', 12, 0, '2023-10-01', 'Bàn chân vuông Eos 1m2 EC12T thuộc dòng bàn dành cho nhân viên được ưa chuộng nhất hiện nay. Sản phẩm được thiết kế hiện đại mà ấn tượng đảm bảo đáp ứng nhu cầu sử dụng đồng thời kiến tạo không gian làm việc sang trọng, chuyên nghiệp.', 19, 1),
(10, 'Bàn làm việc thiết kế thông minh Dixon', '300000.00', '222000.00', './uploads/1733406507Ban-go-lam-viec-hien-dai-Dixon-3.jpg', 14, 0, '2023-10-01', 'Kích thước: Dài 120cm x Rộng 60cm x Cao 75cm \r\nChất liệu: MDF phủ Melamine, chống ẩm.', 19, 1),
(11, 'Tủ để quần áo bằng gỗ công nghiệp MDF GHS-51821', '800000.00', '666000.00', './uploads/1733406740tu-de-quan-ao-bang-go-cong-nghiep-mdf-ghs-51821-7.jpg', 6, 0, '2023-10-01', 'Tủ để quần áo bằng gỗ công nghiệp MDF GHS-51821', 20, 1),
(12, 'Tủ đựng quần áo gỗ công nghiệp MDF cao cấp ', '5000000.00', '3900000.00', './uploads/1733407002tu-dung-quan-ao-go-cong-nghiep-mdf-cao-cap-ghs-51171-ava.jpg', 7, 0, '2023-10-01', 'Tủ đựng quần áo gỗ công nghiệp', 20, 1),
(13, 'Đèn pha lê khung đồng Bắc Âu cao cấp ', '2000000.00', '1700000.00', './uploads/1733407651den-pha-le-khung-dong-bac-au-cao-cap-mc350-15h-6.jpg', 50, 0, '2023-10-01', 'Bảo hành\r\n1 năm\r\n\r\nVật liệu\r\nĐồng thau, Pha lê\r\n\r\nLoại bóng\r\nG9\r\n\r\nDiện tích chiếu sáng\r\n20-25m²\r\n\r\nKích thước (RxSxC)\r\n100x45cm\r\n\r\nKiểu cách\r\n15 đầu bóng\r\n\r\n', 21, 1),
(14, 'Đèn trần hình tròn Minimalist chống chói', '1500000.00', '1000000.50', './uploads/1733407854den-tran-hinh-tron-minimalist-chong-choi-nvc657-10.jpg', 55, 0, '2023-10-01', 'Danh mục: Đèn trang trí, Đèn trần\r\nTừ khóa: Đèn ốp trần hành lang, Đèn ốp trần hiện đại, Đèn ốp trần phòng bé, Đèn ốp trần phòng ngủ, Đèn trần trang trí phòng ngủ, Đèn trang trí nghệ thuật', 21, 1),
(15, 'Bồn Tắm Amazon', '10000000.00', '9000000.00', './uploads/1733408754bon-tam-amazon-tp-7005-chinh-hang.jpg', 7, 0, '2023-10-01', 'Bồn tắm hiện đại', 22, 1),
(16, 'Bồn Tắm Chân Yếm ', '5000000.00', '4000000.00', './uploads/1733408985AT3350L-xa-trai-1090x1090.webp', 4, 0, '2023-10-01', 'Bồn tắm sang trọng', 22, 1),
(18, 'Ghế nhựa cao cấp nhiều màu', '500000.00', '250000.50', './uploads/1733404623ghe-nhua-st3002.jpg', 20, 0, '2023-10-01', 'Ghế nhựa cao cấp nhiều màu ST3002 là sản phẩm thuộc dòng ghế cafe, ghế ăn được làm từ nhựa cao cấp sở hữu khả năng chịu lực tốt và bền bỉ theo thời gian. Với kiếu dáng đơn, tinh tế phù hợp với không gian nhà phố, căn hộ mang phong cách hiện đại. Ghế ST3002 ngoài hai màu sắc cơ bản như trắng, đen còn có thêm nhiều màu khác như hồng, xanh... giúp làm mới không gian với gam màu sắc tươi sáng.', 16, 1),
(19, 'Kệ gỗ trang trí phòng khách gia đình', '2000000.00', '1500000.50', './uploads/1733409297Ke-go-trang-tri-phong-khach-gia-dinh-GHS-146-4.jpg', 30, 0, '2023-10-01', 'Kệ gỗ để đồ tiện dụng', 17, 1),
(20, 'Ghế Sofa Góc HOBRO 301 (160) Bên Trái', '2100000.00', '1700000.00', './uploads/1733405985pro_mau_nau_xam_noi_that_moho_sofa_goc_phai___1__796a299067414ef3acdb39aaa859118e_master.jpg', 5, 0, '2023-10-01', '(Đi kèm 1 gối tựa lưng) \r\n\r\nKích thước: Rộng 900 x Dài 1800 x Cao 700\r\n\r\nChất liệu: \r\n\r\n- Gỗ cao su tự nhiên\r\n\r\n- Vải sợi tổng hợp chống nhăn, kháng bụi bẩn và nấm mốc\r\n\r\n- Tấm phản: Gỗ công nghiệp Plywood chuẩn CARB-P2 (*) \r\n\r\n*Vải chống cháy, chống bám bẩn theo tiêu chuẩn quốc tế OEKO TEX (Standard 100).', 18, 1),
(21, 'Bàn Làm Việc Gỗ Màu Tự Nhiên', '800000.00', '500000.50', './uploads/1733409874pro_mau_tu_nhien_noi_that_moho_ban_lam_viec_vline_1_92060b73c393469181d9d24218c38851_master.webp', 12, 0, '2023-10-01', 'Bàn Làm Việc Gỗ ', 19, 1),
(22, 'Tủ Quần Áo Có Hương Đá', '2000000.00', '1500000.00', './uploads/1733410068tu-ao-quan-huong-da-co-ke-trang-tri--ta966-1654055270-3523af.jpg', 6, 0, '2023-10-01', 'Tủ quần áo', 20, 1),
(23, 'Đèn led gắn tường RA21-WH', '800000.00', '700000.80', './uploads/1733410205RA_21Tx1200x1200x4.jpg', 50, 0, '2023-10-01', 'Đèn Led', 21, 1),
(24, 'Bồn Tắm Đặt Sàn ', '3000000.00', '2900001.00', './uploads/1733410403bon-tam-inax-bf-1760v-1090x1090.webp', 3, 0, '2023-10-01', 'Bồn tắm hiện đại', 22, 1),
(25, 'Bàn làm việc đứng ', '200000.00', '150000.50', './uploads/1733410587ban-lam-viec-dung-blvd04-1.jpeg', 10, 0, '2023-10-01', 'Bàn làm việc đứng ', 15, 1),
(28, 'Bàn Gaming điều chỉnh độ cao ', '1000000.00', '899999.00', './uploads/1733410720gt2_a13260063d994214ab496a59fd592caa_master.jpg', 23, 0, '2024-05-06', 'Bàn Gaming FlexiSpot GT2 với các chi tiết được chăm chút tỉ mỉ, đường cắt sắc sảo, khung bàn chắc chắn, gợi lên sự mạnh mẽ và hiện đại, phù hợp với phong cách của các game thủ chuyên nghiệp. Với hình khối độc đáo, cùng hệ thống đèn LED nhiều màu ánh sáng, bàn mang lại cảm giác sống động như bước vào thế giới ảo, tạo nên một không gian giải trí đẳng cấp và hiện đại.\r\n\r\nBàn Gaming FlexiSpot GT2 có động cơ nâng hạ với cơ chế cực kỳ yên tĩnh giúp các game thủ điều chỉnh trường nhìn của họ một cách phù hợp. Flexispot Motion Gaming Desk còn được bổ sung rất nhiều tính năng tiện lợi giúp game thủ có trải nghiệm chơi game tốt hơn.\r\n\r\n ', 19, 1),
(34, 'Đèn ngủ', '5000000.00', '2400000.00', './uploads/17326683431722706074categories-11.jpg', 23, 0, '2024-05-06', 'Siêu đẹp', 19, 1);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

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
