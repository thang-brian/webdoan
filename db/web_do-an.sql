-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 16, 2021 lúc 04:31 AM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_do-an`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `admin_status`) VALUES
(1, 'admin', '25f9e794323b453885f5181f1b624d0b', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_khachhang` int(11) NOT NULL,
  `code_cart` varchar(10) NOT NULL,
  `cart_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id_cart`, `id_khachhang`, `code_cart`, `cart_status`) VALUES
(1, 1, '4672', 0),
(2, 1, '2418', 0),
(3, 1, '3906', 0),
(4, 1, '9586', 0),
(5, 1, '1991', 0),
(6, 2, '8863', 0),
(7, 1, '5907', 0),
(8, 0, '488', 1),
(9, 0, '1848', 1),
(10, 0, '8787', 1),
(11, 1, '8127', 3),
(12, 1, '8481', 1),
(13, 1, '7344', 1),
(14, 5, '925', 0),
(15, 0, '3201', 1),
(16, 1, '2710', 1),
(19, 1, '6630', 3),
(20, 1, '1118', 3),
(21, 1, '8214', 3),
(22, 1, '3936', 3),
(23, 1, '3283', 3),
(24, 1, '7837', 3),
(25, 1, '191', 3),
(26, 1, '6745', 3),
(27, 1, '2933', 3),
(28, 1, '668', 4),
(29, 1, '5244', 1),
(30, 1, '3417', 4),
(31, 1, '1654', 3),
(32, 1, '6962', 0),
(33, 1, '3809', 3),
(34, 1, '7291', 3),
(35, 1, '8363', 4),
(49, 1, '8574', 2),
(63, 1, '701', 1),
(64, 0, '5712', 1),
(65, 0, '723', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_details`
--

CREATE TABLE `cart_details` (
  `id_cart_details` int(11) NOT NULL,
  `code_cart` varchar(10) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cart_details`
--

INSERT INTO `cart_details` (`id_cart_details`, `code_cart`, `id_sanpham`, `soluongmua`) VALUES
(1, '4672', 5, 2),
(2, '2418', 6, 6),
(3, '3906', 8, 10),
(4, '9586', 4, 10),
(5, '1991', 9, 1),
(6, '1991', 7, 1),
(7, '8863', 9, 1),
(8, '5907', 7, 1),
(9, '5907', 8, 1),
(10, '488', 8, 1),
(11, '488', 2, 1),
(12, '1848', 8, 1),
(13, '1848', 3, 1),
(14, '8787', 9, 1),
(15, '8787', 3, 1),
(16, '8127', 3, 1),
(17, '8127', 2, 1),
(18, '8481', 3, 1),
(19, '8481', 6, 1),
(20, '7344', 3, 2),
(21, '7344', 4, 1),
(22, '925', 2, 1),
(23, '925', 3, 1),
(24, '3201', 6, 1),
(25, '3201', 3, 1),
(26, '3201', 4, 1),
(27, '2710', 8, 1),
(28, '208', 3, 1),
(29, '6630', 3, 1),
(30, '1118', 3, 1),
(31, '8214', 3, 1),
(32, '3936', 3, 2),
(33, '3283', 3, 2),
(34, '7837', 3, 2),
(35, '191', 3, 2),
(36, '6745', 3, 2),
(37, '2933', 3, 2),
(38, '668', 9, 1),
(39, '5244', 7, 1),
(40, '3417', 4, 1),
(41, '1654', 1, 1),
(42, '6962', 6, 2),
(43, '3809', 7, 1),
(44, '7291', 1, 1),
(45, '7291', 7, 1),
(46, '8363', 1, 1),
(47, '8363', 7, 2),
(48, '8363', 8, 3),
(65, '8574', 7, 1),
(66, '8574', 3, 1),
(84, '701', 1, 3),
(85, '5712', 4, 1),
(86, '723', 4, 1),
(112, '2558', 1, 1),
(113, '2558', 4, 1),
(125, '7873', 2, 1),
(126, '9539', 2, 1),
(127, '3569', 2, 2),
(128, '373', 2, 2),
(129, '2949', 2, 1),
(132, '7763', 2, 1),
(133, '9048', 2, 1),
(134, '4726', 2, 3),
(137, '8797', 3, 1),
(138, '1995', 3, 1),
(140, '9871', 9, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dangky`
--

CREATE TABLE `dangky` (
  `id_khachhang` int(11) NOT NULL,
  `tenkhachhang` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `dienthoai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dangky`
--

INSERT INTO `dangky` (`id_khachhang`, `tenkhachhang`, `email`, `diachi`, `matkhau`, `dienthoai`) VALUES
(1, 'Thân Trọng Thắng', 'thangthantrong@gmail.com', 'Quận Thanh Khê, Đà Nẵng', '202cb962ac59075b964b07152d234b70', '0886997189'),
(2, 'Trần Ánh Dương', 'trananh123duong@gmail.com', '18 cổ mân mai 2', '202cb962ac59075b964b07152d234b70', '0971843429'),
(3, 'Trần Ánh Dương', 'trananh123duong@gmail.com', 'Hành Thịnh, Nghĩa Hành, Quảng Ngãi', '202cb962ac59075b964b07152d234b70', '0971843429'),
(4, 'Test', 'test@mail', 'None', 'c4ca4238a0b923820dcc509a6f75849b', '123456'),
(5, 'Văn', 'van@mail.com', 'None', '202cb962ac59075b964b07152d234b70', '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `tendanhmuc` varchar(100) NOT NULL,
  `thutu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id_danhmuc`, `tendanhmuc`, `thutu`) VALUES
(1, 'Gia dụng', 5),
(2, 'Đồ điện tử', 4),
(3, 'Mỹ phẩm', 3),
(4, 'Quần Áo', 2),
(5, 'Phụ kiện', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `code_cart` varchar(255) NOT NULL,
  `thanh_vien` varchar(100) NOT NULL COMMENT 'thành viên thanh toán',
  `money` float NOT NULL COMMENT 'số tiền thanh toán',
  `note` varchar(255) DEFAULT NULL COMMENT 'ghi chú thanh toán',
  `vnp_response_code` varchar(255) NOT NULL COMMENT 'mã phản hồi',
  `code_vnpay` varchar(255) NOT NULL COMMENT 'mã giao dịch vnpay',
  `code_bank` varchar(255) NOT NULL COMMENT 'mã ngân hàng',
  `time` datetime NOT NULL COMMENT 'thời gian chuyển khoản'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `payments`
--

INSERT INTO `payments` (`id`, `code_cart`, `thanh_vien`, `money`, `note`, `vnp_response_code`, `code_vnpay`, `code_bank`, `time`) VALUES
(2, '608324672', 'abc', 1000000, 'test chuyển khoản', '00', '13401811', 'NCB', '2020-10-11 21:00:00'),
(7, '6962', '', 218000, 'thanh toan don hang 6962', '00', '13604776', 'NCB', '2021-10-14 22:00:00'),
(8, '9779', 'Test', 60000, 'thanh toan don hang 9779', '00', '13604881', 'NCB', '2021-10-15 08:00:00'),
(9, '6586', 'Test', 205000, 'thanh toan don hang 6586', '00', '13604962', 'NCB', '2021-10-15 10:00:00'),
(10, '9270', 'Test', 1230000, 'thanh toan don hang 9270', '00', '13604986', 'NCB', '2021-10-15 10:00:00'),
(11, '9220', 'Test', 121000, 'thanh toan don hang 9220', '00', '13605013', 'NCB', '2021-10-15 11:00:00'),
(12, '8574', 'Thân Trọng Thắng', 284000, 'thanh toan don hang 8574', '00', '13605052', 'NCB', '2021-10-15 11:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `tensanpham` varchar(250) NOT NULL,
  `masp` varchar(100) NOT NULL,
  `giasp` varchar(50) NOT NULL,
  `soluong` int(11) NOT NULL,
  `hinhanh` varchar(50) NOT NULL,
  `tomtat` text NOT NULL,
  `noidung` text NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `id_danhmuc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sanpham`, `tensanpham`, `masp`, `giasp`, `soluong`, `hinhanh`, `tomtat`, `noidung`, `tinhtrang`, `id_danhmuc`) VALUES
(1, 'Giày độn thể thao', 'A01', '499000', 1, '1634287273________8_.jpg', '', 'Sản phẩm cao cấp full book, full size', 1, 5),
(2, 'Set Áo Thun Ngắn Tay + Quần Short Ống Rộng Thời Trang Nữ', 'B01', '390000', 28, '1621559048_setnu.jfif', '', '', 1, 4),
(3, 'Xịt khoáng Dược mỹ phẩm La Roche Posay', 'C01', '79000', 45, '1621559145_xit-khoang.jpg', '', '', 1, 3),
(4, 'Loa Kéo Karaoke Bluetooth JBZ NE108 Bass 2 Tấc - BH 6 Tháng', 'D01', '1190000', 5, '1621559196_02403d44d89fd72b39a32948546ca469.jfif', '', '', 1, 2),
(5, 'Giá kệ Inox 304 để lò vi sóng, nồi cơm điện, để gia vị đồ nhà bếp VANDO K10', 'E01', '349000', 22, '1621559286_kệ lò.jfif', '', '', 1, 1),
(6, 'Gọng kính cận vuông nam nữ Lilyeyewear', 'A02', '89000', 23, '1621563188_kinhcan.jfif', 'cam kết 100% sản phẩm là ảnh thật shop tự chụp, quý khách hoàn toàn yên tâm khi mua và sử dụng sản phẩm.', '', 1, 5),
(7, 'Quần jean baggy nam nữ ống rộng', 'B02', '165000', 26, '1621564943_quanbaggy.jfif', 'Tên sản phẩm:Quần jean baggy unisex cho nam nữ giá rẻ', '', 1, 4),
(8, 'Áo thun in hình Jack J97 Đom Đóm', 'B03', '81000', 28, '1621565046_aothun.jfif', 'Áo thun in hình Jack J97 Đom Đóm - Vải Cotton thái M2391', '', 1, 4),
(9, 'Tất cao cổ vintage Hàn Quốc', 'A03', '20000', 35, '1621566628_tat.jfif', '[TẤT CÓ SẴN] Tất trơn dài về lại đủ màu', '', 1, 5);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `fk_kh` (`id_khachhang`);

--
-- Chỉ mục cho bảng `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`id_cart_details`),
  ADD KEY `id_sanpham` (`id_sanpham`);

--
-- Chỉ mục cho bảng `dangky`
--
ALTER TABLE `dangky`
  ADD PRIMARY KEY (`id_khachhang`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sanpham`),
  ADD KEY `id_danhmuc` (`id_danhmuc`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT cho bảng `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `id_cart_details` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT cho bảng `dangky`
--
ALTER TABLE `dangky`
  MODIFY `id_khachhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
