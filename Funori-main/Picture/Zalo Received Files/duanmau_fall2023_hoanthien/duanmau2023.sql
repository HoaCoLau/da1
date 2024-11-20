-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 23, 2024 at 03:55 PM
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
-- Database: `duanmau2023`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int NOT NULL,
  `idpro` int NOT NULL,
  `iduser` int NOT NULL,
  `noidung` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ngaybinhluan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`id`, `idpro`, `iduser`, `noidung`, `ngaybinhluan`) VALUES
(3, 12, 2, 'sản phẩm rất tốt', '2024-07-23'),
(4, 6, 2, 'giao hàng rất nhanh', '2024-07-23'),
(5, 14, 2, 'tôi rất hài lòng với sản phẩm này', '2024-07-23'),
(6, 9, 2, 'sản phẩm rất tốt nhé ', '2024-07-23'),
(7, 7, 2, 'điện thoại này rất tốt nhé mọi người', '2024-07-23'),
(8, 8, 2, 'điện thoại mượt quá shop', '2024-07-23'),
(9, 13, 2, 'học sinh sinh viên nên mua laptop này học nhé', '2024-07-23'),
(10, 5, 2, 'cap rất tốt không bị lỗi', '2024-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`) VALUES
(2, 'Điện thoại'),
(4, 'Phụ kiện'),
(5, 'Laptop');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `price` double(10,2) NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `mota` text COLLATE utf8mb4_general_ci NOT NULL,
  `luotxem` int NOT NULL,
  `iddm` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `name`, `price`, `img`, `mota`, `luotxem`, `iddm`) VALUES
(5, 'Cáp Hub USB-C 4 in 1 Hyperdrive Next HD4001', 1529000.00, '2024_6_3_638530063565104305_hd4001gl.jpg', 'Cáp Hub USB-C 4 in 1 Hyperdrive Next HD4001 là một phụ kiện kết nối mạnh mẽ và đa năng. Với khả năng hỗ trợ màn hình 4K60Hz cùng tốc độ truyền dữ liệu nhanh lên đến 10Gbps, chiếc cáp này không chỉ đáp ứng mà còn vượt qua kỳ vọng của người dùng. Dù là một nhà thiết kế đồ họa, biên tập nội dung hay nhiếp ảnh gia, Hyperdrive Next HD4001 chắc chắn sẽ là trợ thủ đắc lực, giúp bạn làm việc hiệu quả và tối ưu hơn.  Hỗ trợ màn hình 4K60Hz', 0, 4),
(6, 'Iphone 15 Promax', 29000000.00, '2023_9_20_638307982103040290_iphone-15-promax-trang-1.jpg', 'Cấu trúc bên ngoài của iPhone 15 Pro được sản xuất từ Titan - chất liệu sang trọng với nhiều đặc tính nổi bật về độ bền chắc. Để có thể uốn cong và tạo hình thiết bị một các tinh tế, quy trình chế tác kỳ công đã được áp dụng với rất nhiều công đoạn khác nhau gồm: gia công cơ khí, chà nhám, đánh bóng và phun mài.', 0, 2),
(7, 'Iphone 11', 8800000.00, '2022_12_6_638059309890101717_iphone-11-trang-1.jpg', 'Phiên bản iPhone 11 128GB được người dùng yêu thích bởi dung lượng bộ nhớ đủ dùng, camera kép cực đỉnh và những lựa chọn màu sắc vô cùng thời trang.', 0, 2),
(8, 'Iphone 14', 17600000.00, '2022_11_30_638054086797665958_ip-14-den-1.jpg', 'Khoác lên kiểu dáng đặc trưng của dòng điện thoại iPhone, phiên bản iPhone 14 được cải tiến mạnh ở thời lượng pin và tập trung nâng cấp mạnh về camera nhằm đem đến những thước phim, khuôn hình đầy chất nghệ thuật và đạt chuẩn điện ảnh.', 0, 2),
(9, 'Samsung Galaxy Z Fold6 5G 256GB', 43999000.00, 'samsung_galaxy_z_fold6_pink_bec1eeef80.png', 'Samsung Galaxy Z Fold6 đánh dấu một chuẩn mực mới trong thế giới điện thoại gập. Với thiết kế siêu mỏng nhẹ và hiệu năng vượt trội, Z Fold 6 mang đến sự kết hợp hoàn hảo giữa công nghệ tiên tiến và vẻ ngoài thời thượng. Đây không chỉ là một chiếc điện thoại, mà còn là minh chứng cho những đột phá công nghệ của Samsung, tạo nên trải nghiệm gập đẳng cấp mà bạn khó có thể tìm thấy ở bất kỳ thiết bị nào khác.', 0, 2),
(10, 'Samsung Galaxy A54 5G 128GB', 8990000.00, '2023_5_23_638204318787939063_samsung-galaxy-a54-5g-xanh-4.jpg', 'Tỏa sáng với thế hệ Galaxy A mới trẻ trung và năng động, Samsung Galaxy A54 sát cánh cùng người dùng trong mọi trải nghiệm di động đỉnh cao từ thiết kế đột phá, sức mạnh Exynos 1380, đến tận dụng tối đa công nghệ nhiếp ảnh tiên tiến, tiên phong chống rung OIS, mang tới hệ thống camera đẳng cấp, thước phim chuẩn nét dù ngày hay đêm.', 0, 2),
(11, 'Samsung Galaxy A55 5G 128GB', 9690000.00, '2024_3_19_638464669526032000_samsung-galaxy-a55-xanh-png-1.png', 'Vẻ ngoài hiện đại, khung viền kim loại bền bỉ, sang trọng kết hợp sắc màu thời thượng, Samsung Galaxy A55 mang tới trải nghiệm thiết kế cao cấp cho người dùng. Đồng thời, sự có mặt của các công nghệ chụp ảnh tiên tiến, hiệu năng mạnh, bảo mật nâng cao Knox Vault và màn hình hàng đầu sẽ giúp người dùng tận hưởng những điều tuyệt vời nhất trên thế hệ Galaxy A mới.', 0, 2),
(12, 'Cáp USB-C to VGA Multiport Apple', 1849000.00, '2018_4_17_636595599977293761_USB-C-VGA-Multiport-5.jpg', 'Được thiết kế để hỗ trợ người dùng những dòng máy Mac và iPad sử dụng cổng USB-C có thể trích xuất dữ liệu hình ảnh ra TV, màn hình hoặc máy chiếu có cổng VGA. Cáp USB-C VGA Multiport là công cụ lý tưởng để bạn chạm tới sự chuyên nghiệp trong công việc hoặc đem tới không gian giải trí rộng lớn hơn cho cả gia đình.', 0, 4),
(13, 'Laptop Dell Latitude 3440 i5-1235U/16GB/512GB/14  FHD/Win11', 20200000.00, '2024_6_17_638542414156483871_00908936-laptop-dell-latitude-l3440.jpg', 'Dell Latitude 3440 là một mẫu laptop văn phòng với thiết kế chắc chắn, hiệu năng mạnh mẽ và tính năng bảo mật cao, đây là sự lựa chọn hoàn hảo cho các doanh nhân hiện đại và các bạn sinh viên muốn một chiếc laptop có hiệu suất cao. Dell Latitude 3440 không chỉ mang đến sự bền bỉ và tin cậy mà còn cung cấp hiệu suất vượt trội và các tính năng hỗ trợ công việc hàng ngày một cách hiệu quả', 0, 5),
(14, 'Laptop Asus Vivobook X1504ZA-NJ1039W i7-1255U/16GB FHD/Win11', 17790000.00, 'asus_vivobook_x1504za_nj1039w_7459424b00.png', 'Vivobook X1504ZA-NJ1039W hứa hẹn là trợ thủ đắc lực sẽ đồng hành cùng bạn trong cả công việc, học tập và giải trí. Mẫu laptop này sở hữu thiết kế thân thiện với bản lề phẳng 180 độ cùng tấm chắn webcam tiện lợi. Cấu hình mạnh mẽ với chip Intel Core i7 đảm bảo đáp ứng tốt mọi nhu cầu thường ngày của người dùng.', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int NOT NULL,
  `user` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tel` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `role` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `user`, `pass`, `email`, `address`, `tel`, `role`) VALUES
(1, 'truongdvph', '12345', 'dovantruongf1@gmail.com', 'Lien Chau', '12345678', 0),
(2, 'trungnt173', '12345', 'trungnt173@fpt.edut.vn', 'Nam Từ Liêm', '0123456789', 0),
(3, 'admin', 'admin', '', '', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_danhmuc_sanpham` (`iddm`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_danhmuc_sanpham` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
