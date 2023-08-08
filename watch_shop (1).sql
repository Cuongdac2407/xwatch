-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 22, 2023 lúc 04:27 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `watch_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id` int(11) NOT NULL,
  `order_id` char(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`id`, `order_id`, `product_id`, `qty`) VALUES
(1, 'order_869137', 12, 3),
(2, 'order_869137', 11, 2),
(3, 'order_763851', 4, 1),
(4, 'order_291278', 6, 4),
(5, 'order_957034', 4, 2),
(6, 'order_957034', 5, 3),
(7, 'order_961604', 5, 3),
(8, 'order_961604', 6, 3),
(9, 'order_961604', 7, 2),
(10, 'order_961604', 8, 1),
(11, 'order_961604', 11, 2),
(12, 'order_828993', 5, 1),
(13, 'order_290761', 5, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `idSP` int(11) NOT NULL,
  `idND` int(11) NOT NULL,
  `sosao` int(11) NOT NULL,
  `binhluan` text NOT NULL,
  `ngaythang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhgia`
--

INSERT INTO `danhgia` (`idSP`, `idND`, `sosao`, `binhluan`, `ngaythang`) VALUES
(5, 2, 4, 'Sản phẩm ổn', '28/06/2023'),
(5, 1, 3, 'sản phẩm rất tuyệt', '22/07/2023');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` char(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `address` text NOT NULL,
  `sdt` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id`, `user_id`, `total`, `address`, `sdt`, `created_at`, `updated_at`) VALUES
('order_290761', 1, 25200000, '111', '1111', '2023-07-22 02:25:33', '2023-07-22 09:25:33'),
('order_291278', 1, 47040000, 'Hà Nội', '', '2023-07-20 09:29:05', '2023-07-20 16:29:05'),
('order_763851', 1, 1373000, 'Hà Nội', '', '2023-07-20 09:18:38', '2023-07-20 16:18:38'),
('order_828993', 1, 12600000, 'hânm', '', '2023-07-22 02:22:17', '2023-07-22 09:22:17'),
('order_869137', 1, 26084000, 'Hà Nội', '', '2023-06-30 08:21:54', '2023-06-30 15:21:54'),
('order_957034', 1, 40546000, 'Hà Nội', '', '2023-07-20 17:04:03', '2023-07-21 00:04:03'),
('order_961604', 1, 98924000, 'hanoi', '', '2023-07-22 02:07:15', '2023-07-22 09:07:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'user-avatar.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`id`, `email`, `username`, `password`, `avatar`) VALUES
(1, 'ntvchuy123@gmail.com', 'Quang Huy', '1', 'user-avatar.png'),
(2, 'a@gmail.com', 'Thu Lệ', '1', 'user-avatar.png'),
(5, 'b@gmail.com', 'Hữu Huy', '1', 'user-avatar.png'),
(6, 'c@gmail.com', 'Đắc Cường', '1', 'user-avatar.png'),
(7, 'd@gmail.com', 'Vân Chi', '1', 'user-avatar.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanhoi`
--

CREATE TABLE `phanhoi` (
  `id` int(255) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sdt` int(10) NOT NULL,
  `tinnhan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phanhoi`
--

INSERT INTO `phanhoi` (`id`, `hoten`, `email`, `sdt`, `tinnhan`) VALUES
(2, 'Đặng Quang Huy', 'Ntvc123@gmail.com', 328441869, 'Đây là trang đồ án tốt nghiệp của tôi. Đây là trang đồ án tốt nghiệp của tôi. Đây là trang đồ án tốt nghiệp của tôi. Đây là trang đồ án tốt nghiệp của tôi. Đây là trang đồ án tốt nghiệp của tôi. ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `tensanpham` varchar(255) NOT NULL,
  `giaban` varchar(255) NOT NULL,
  `giagiam` varchar(255) NOT NULL,
  `img1` varchar(255) NOT NULL,
  `img2` varchar(255) NOT NULL,
  `img3` varchar(255) NOT NULL,
  `img4` varchar(255) NOT NULL,
  `thuonghieu` varchar(255) NOT NULL,
  `thongtin` text NOT NULL,
  `loai` varchar(255) NOT NULL,
  `gioitinh` varchar(25) NOT NULL,
  `duongkinh` varchar(255) NOT NULL,
  `daydeo` varchar(255) NOT NULL,
  `xuatxu` varchar(255) NOT NULL,
  `khungvien` varchar(255) NOT NULL,
  `dodaymat` varchar(255) NOT NULL,
  `soluong` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `tensanpham`, `giaban`, `giagiam`, `img1`, `img2`, `img3`, `img4`, `thuonghieu`, `thongtin`, `loai`, `gioitinh`, `duongkinh`, `daydeo`, `xuatxu`, `khungvien`, `dodaymat`, `soluong`) VALUES
(4, 'CASIO WORLD TIME AE-1200WHD-1AVDF – NAM – QUARTZ (PIN) – MẶT SỐ 45 MM, BỘ BẤM GIỜ, CHỐNG NƯỚC 10 ATM', '1490000', '1373000', 'dongho1.webp', 'dongho1-1.webp', 'dongho1-2.webp', 'dongho1-3.webp', 'Casio', 'Đồng hồ nam Casio AE1200WHD có mặt đồng hồ vuông to với phong cách thể thao, mặt số điện tử với những tính năng hiện đại tiện dụng, kết hợp với dây đeo bằng kim loại đem lại vẻ mạnh mẽ cá tính dành cho phái nam.', 'Hiện đại', 'Nam', '45 mm x 42.1 mm', '1', 'Nhật bản', 'Thép Không Gỉ', '12.5 mm', 0),
(5, 'CITIZEN TSUYOSA NJ0154-80H – NAM – KÍNH SAPPHIRE – AUTOMATIC (TỰ ĐỘNG) – MẶT SỐ 40MM, TRỮ CÓT 40 GIỜ, CHỐNG NƯỚC 5ATM', '14600000 ', '12600000 ', 'dongho2.webp', 'dongho2-1.webp', 'dongho2-2.webp', 'dongho2-3.webp', 'Citizen', 'Mẫu Citizen NJ0154-80H phiên bản mặt kính chất liệu kính Sapphire với kích thước nam tính 40mm, kết hợp cùng mẫu dây đeo kim loại dây vàng demi phong cách thời trang sang trọng.', 'Cổ điển', 'Nam', '40 mm', 'Thép Không Gỉ', 'Nhật Bản', 'Thép Không Gỉ', '11.7 mm', 111),
(6, 'ORIENT OPEN HEART RA-AR0001S10B – NAM – AUTOMATIC – MẶT SỐ 40.8 MM, TRỮ CÓT 40 GIỜ, KÍNH SAPPHIRE', '13990000', '11760000', 'dongho3.webp', 'dongho3-1.webp', 'dongho3-2.webp', 'dongho3-3.webp', 'Orient ', 'Mẫu Orient RA-AR0001S10B thiết kế đặc trưng Open Heart với ô chân kính lộ ra 1 phần của bô máy cơ tạo nên vẻ độc đáo trước mặt kính Sapphire.', 'Cổ điển', 'Nam', '40.8 mm', 'Thép Không Gỉ', 'Nhật Bản', 'Thép Không Gỉ', '11 mm', 93),
(7, 'ORIENT SK RA-AA0B02R19B – NAM – AUTOMATIC (TỰ ĐỘNG) – MẶT SỐ 41.7MM, TRỮ CÓT 40 GIỜ, HACKING SECOND', '8900000', '7800000', 'dongho4.webp', 'dongho4-1.webp', 'dongho4-2.webp', 'dongho4-3.webp', 'Orient ', 'Mẫu Orient RA-AA0B02R19B phiên bản mạ vàng với mẫu kim chỉ nổi bật trên mặt số size 41.7mm đi kèm thiết kế 2 núm vặn điều chỉnh, vỏ máy kim loại mạ bạc kiểu dáng dày dặn của bô máy cơ.', 'Cổ điển', 'Nam', '41.7 mm', 'Thép Không Gỉ', 'Nhật Bản', 'Thép Không Gỉ', '12.6 mm', 98),
(8, 'SAGA 53766-GPZMGGE-2 – NỮ – KÍNH CỨNG – QUARTZ (PIN) – MẶT SỐ 39MM, SWAROVSKI, CHỐNG NƯỚC 5ATM', '7900000', '6720000 ', 'dongho5.jpg', 'dongho5-1.jpg', 'dongho5-2.jpg', 'dongho5-3.jpg', 'Saga', 'Mẫu Saga 53766-GPZMGGE-2 dây da trắng phiên bản da trơn trẻ trung, mặt số trắng, được khảm xà cừ với hiệu ứng bắt mắt. Sản phẩm mang phong cách sang trọng khi đính đá pha lê', 'Cổ điển', 'Nữ', '39 mm', 'Dây Da Chính Hãng', 'Thụy Sĩ', 'Thép Không Gỉ', '7 mm', 99),
(11, 'CASIO A168WG-9WDF – NAM/NỮ – KÍNH NHỰA – QUARTZ (PIN) – MẶT SỐ 38.6MM, BỘ BẤM GIỜ, CHỐNG NƯỚC 3ATM', '1990000', '1762000', 'dongho6.webp', 'dongho6-1.webp', 'dongho6-2.webp', 'dongho6-3.webp', 'Casio', 'Đồng hồ Casio A168WG-9WDF với hình dáng truyền thống của hãng, phù hợp cho cả nam lẫn nữ, tông màu vàng chủ đạo từng chi tiết vỏ, mặt số và dây đeo tạo nên thời trang sang trọng, quý phái và thanh lịch.', 'Hiện đại', 'Nam, nữ', '38.6mm x 36.3mm', 'Thép không gỉ 316L mạ vàng công nghệ PVD', 'Nhật Bản', 'Nhựa', '9.6 mm', 98),
(12, 'SAGA 53766-SVSVSV-2 – NỮ – QUARTZ (PIN) – MẶT SỐ 39MM, KÍNH CỨNG, CHỐNG NƯỚC 3ATM', '8990000', '7520000', 'dongho7.jpg', 'dongho7-1.jpg', 'dongho7-2.jpg', 'dongho7-3.jpg', 'Saga', 'Mẫu Saga 53766-SVSVSV-2 phiên bản dây vỏ mạ bạc sang trọng, điểm nhấn nổi bật với thiết kế thời trang đính đá pha lê Swaroski trên nền mặt số trắng họa tiết trải tia nhẹ.', 'Cổ điển', 'Nữ', '39 mm', 'Thép Không Gỉ', 'Thụy Sĩ', 'Thép Không Gỉ', '7 mm', 110),
(13, 'CASIO MTP-V006GL-7BUDF – NAM – QUARTZ (PIN) – MẶT SỐ 38MM, KÍNH CỨNG, CHỐNG NƯỚC 3ATM', '1290000', '932000', 'dongho8.jpg', 'dongho8-1.jpg', 'dongho8-2.jpg', 'dongho8-3.jpg', 'Casio', 'Đồng hồ Casio MTP-V006GL-7BUDF với mặt số tròn truyền thống, màu vàng của niềng bao quanh màu trắng của nền số, trung tâm mặt số có 3 kim chỉ màu vàng và vạch số La Mã phủ màu đen nổi bật.', 'Cổ điển', 'Nam', '38 mm', 'Dây Da Chính Hãng', 'Nhật Bản', 'Thép Không Gỉ', ' 8 mm', 100),
(14, 'Đồng hồ Casio 42 mm Nam AE-1200WH-1AVDF', '1140000', '790000', 'dongho9.jpg', 'dongho9-1.jpg', 'dongho9-2.jpg', 'dongho9-3.jpg', 'Casio', 'Đồng hồ điện tử Casio AE-1200WH-1AVDF dành cho các bạn trẻ, các tính năng đa dụng cho bộ đếm giờ, chất liệu được làm bằng nhựa cao cấp, mặt kính cứng chịu lực.', 'Hiện đại', 'Nam', '45mm x 42,1mm', 'Dây Cao Su', 'Nhật Bản', 'Nhựa', '12mm', 100),
(19, 'Đồng hồ CITIZEN Mechanical Tsuyosa 40 mm Nam NJ0150-81L ', '11180000', '6708000', 'dongho10.jpg', 'dongho10-1.jpg', 'dongho10-2.jpg', 'dongho10-3.jpg', 'Citizen', 'Xu hướng thiết kế chính của đồng hồ Citizen là đơn giản và thanh lịch. Citizen luôn chú trọng đến việc đổi mới và tạo sự phong phú cho các mẫu thiết kế. Các chi tiết cũng được Citizen đầu tư kỹ lưỡng trong khâu chế tác', 'Cổ điển', 'Nam', ' 40 mm', 'Thép không gỉ 316L', 'Nhật Bản', 'Kính Sapphire', '11.7 mm', 100),
(20, 'Đồng hồ EDIFICE CASIO 44 mm Nam EFS-S570DB-2AUDF ', '7353000', '5882000', 'dongho11.jpg', 'dongho11-1.jpg', 'dongho11-2.jpg', 'dongho11-3.jpg', 'Casio', 'Sự kết hợp của truyền thống và hiện đại  với đầy đủ các đặc trưng của đồng hồ Casio truyền thống, Edifice Casio còn được tích hợp nhiều chức năng hiện đại, giá trị ứng dụng cao, mang đến cho phái mạnh dòng sản phẩm thông minh đáng mơ ước.', 'Cổ điển', 'Nam', ' 44 mm', 'Thép không gỉ mạ Ion', 'Trung Quốc', 'Thép không gỉ mạ Ion', ' 9.7 mm', 100),
(21, 'Đồng hồ G-SHOCK 43.2 mm Nam GM-5600-1DR', '7008000', '5606000', 'dongho12.jpg', 'dongho12-1.jpg', 'dongho12-2.jpg', 'dongho12-3.jpg', 'Casio ', 'Khỏe khoắn, cuốn hút và dũng mãnh. Chữ G trong từ G-Shock được bắt nguồn từ chữ cái đầu của từ Gravity, nghĩa là không trọng lực. G-Shock được hiểu với khả năng chống va đập, rơi vỡ. Cái tên đã nói rõ về tính năng và thiết kế của chiếc đồng hồ.', 'Hiện đại', 'Nam', ' 43.2 mm', 'Nhựa', 'Thái Lan', 'Thép không gỉ', '12.9 mm', 100),
(22, 'Đồng hồ Casio 34 mm Nam MTP-M305L-7AVDF', '3553000', '2842000', 'dongho13.jpg', 'dongho13-1.jpg', 'dongho10-2.jpg', 'dongho13-3.jpg', 'Casio', 'Tinh hoa của sự sáng tạo. Thương hiệu đồng hồ nổi tiếng đến từ Nhật Bản không ngừng cải tiến và cho ra mắt những dòng sản phẩm chất lượng phù hợp với nhiều đối tượng khách hàng. Những dòng sản phẩm nổi tiếng của Casio là: G-Shock với thiết kế mạnh mẽ cùng độ bền cao, Edifice thiết kế hiện đại cùng nhiều tính năng vượt trội, Sheen với thiết kế cổ điển và sang trọng,…', 'Cổ điển', 'Nam', '34 mm', ' Da tổng hợp', ' Trung Quốc', 'Thép không gỉ', '9.3 mm', 100),
(23, 'Đồng hồ ORIENT 37.9 mm Nam FGW0100FW0 ', '4520000', '3616000', 'dongho14.jpg', 'dongho14-1.jpg', 'dongho14-2.jpg', 'dongho14-3.jpg', 'Orient', 'Sang trọng và đẳng cấp. Đồng hồ Orient đem đến những sản phẩm ấn tượng chinh phục người nhìn một cách nhanh chóng. Đồng hồ Orient với những chất liệu cao cấp bóng bẩy nâng tầm đẳng cấp cho người sở hữu, phù hợp với doanh nhân thành đạt, dân văn phòng hay các giám đốc công ty. Phong cách thời thượng, sang trọng đầy sức thu hút đến từ đồng hồ Orient chắc chắn sẽ khiến bạn luôn hãnh diện với những người xung quanh.', 'Cổ điển', 'Nam', ' 37.9 mm', 'Da tổng hợp', ' Trung Quốc', ' Thép không gỉ', ' 6.9 mm', 100),
(24, 'Đồng hồ CASIO 32 mm Unisex A100WEL-1ADF ', '1737000', '1389000', 'dongho15.jpg', 'dongho15-1.jpg', 'dongho15-2.jpg', 'dongho15-3.jpg', 'Casio', 'Thương hiệu đồng hồ nổi tiếng đến từ Nhật Bản không ngừng cải tiến và cho ra mắt những dòng sản phẩm chất lượng phù hợp với nhiều đối tượng khách hàng. Những dòng sản phẩm nổi tiếng của Casio là: G-Shock với thiết kế mạnh mẽ cùng độ bền cao, Edifice thiết kế hiện đại cùng nhiều tính năng vượt trội, Sheen với thiết kế cổ điển và sang trọng,…', 'Hiện đại', 'Nam', '32 mm', 'Da tổng hợp', ' Trung Quốc', 'Nhựa mạ nhôm', ' 9 mm', 100),
(25, 'Đồng hồ CASIO 24 mm Nữ LA670WGA-1DF', '1271000', '1016000', 'dongho16.jpg', 'dongho16-1.jpg', 'dongho16-2.jpg', 'dongho16-3.jpg', 'Casio', 'Thương hiệu đồng hồ nổi tiếng đến từ Nhật Bản không ngừng cải tiến và cho ra mắt những dòng sản phẩm chất lượng phù hợp với nhiều đối tượng khách hàng. Những dòng sản phẩm nổi tiếng của Casio là: G-Shock với thiết kế mạnh mẽ cùng độ bền cao, Edifice thiết kế hiện đại cùng nhiều tính năng vượt trội, Sheen với thiết kế cổ điển và sang trọng,…', 'Hiện đại', 'Nữ', '24 mm', 'Hợp kim', 'Trung Quốc', 'Nhựa Resin', '7 mm', 100),
(26, 'Đồng hồ CASIO 43 mm Unisex W-218HC-4AVDF ', '803000', '642000', 'dongho17.jpg', 'dongho17-1.jpg', 'dongho17-2.jpg', 'dongho17-3.jpg', 'Casio', 'Thương hiệu đồng hồ nổi tiếng đến từ Nhật Bản không ngừng cải tiến và cho ra mắt những dòng sản phẩm chất lượng phù hợp với nhiều đối tượng khách hàng. Những dòng sản phẩm nổi tiếng của Casio là: G-Shock với thiết kế mạnh mẽ cùng độ bền cao, Edifice thiết kế hiện đại cùng nhiều tính năng vượt trội, Sheen với thiết kế cổ điển và sang trọng,…', 'Hiện đại', 'Nam/Nữ', '43 mm', ' Nhựa', ' Trung Quốc', 'Nhựa Resin', '11 mm', 100);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chitietdonhang_ibfk_1` (`order_id`),
  ADD KEY `chitietdonhang_ibfk_2` (`product_id`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donhang_ibfk_1` (`user_id`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phanhoi`
--
ALTER TABLE `phanhoi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `phanhoi`
--
ALTER TABLE `phanhoi`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `donhang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `nguoidung` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
