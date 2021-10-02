-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 17, 2021 lúc 10:35 AM
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
(13, 1, '7344', 1);

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
(21, '7344', 4, 1);

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
(1, 'Thân Trọng Thắng', 'thangthantrong@gmail.com', 'Quận Thanh Khê', '202cb962ac59075b964b07152d234b70', '0886997189'),
(2, 'Trần Ánh Dương', 'trananh123duong@gmail.com', '18 cổ mân mai 2', '202cb962ac59075b964b07152d234b70', '0971843429'),
(3, 'Trần Ánh Dương', 'trananh123duong@gmail.com', 'Hành Thịnh, Nghĩa Hành, Quảng Ngãi', '202cb962ac59075b964b07152d234b70', '0971843429'),
(4, 'Test', 'test', 'None', 'c4ca4238a0b923820dcc509a6f75849b', '123456');

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
(1, 'Giày độn thể thao', 'A01', '499000', 20, '1621558895_giaydon.jpg', '', 'Sản phẩm cao cấp full book, full size', 1, 5),
(2, 'Set Áo Thun Ngắn Tay + Quần Short Ống Rộng Thời Trang Nữ', 'B01', '390000', 44, '1621559048_setnu.jfif', '', '', 1, 4),
(3, 'Xịt khoáng Dược mỹ phẩm La Roche Posay', 'C01', '79000', 41, '1621559145_xit-khoang.jpg', '', '', 1, 3),
(4, 'Loa Kéo Karaoke Bluetooth JBZ NE108 Bass 2 Tấc - BH 6 Tháng', 'D01', '1190000', 30, '1621559196_02403d44d89fd72b39a32948546ca469.jfif', '', '', 1, 2),
(5, 'Giá kệ Inox 304 để lò vi sóng, nồi cơm điện, để gia vị đồ nhà bếp VANDO K10', 'E01', '349000', 22, '1621559286_kệ lò.jfif', '', '', 1, 1),
(6, 'Gọng kính cận vuông nam nữ Lilyeyewear', 'A02', '89000', 30, '1621563188_kinhcan.jfif', 'cam kết 100% sản phẩm là ảnh thật shop tự chụp, quý khách hoàn toàn yên tâm khi mua và sử dụng sản phẩm.', '', 1, 5),
(7, 'Quần jean baggy nam nữ ống rộng', 'B02', '165000', 38, '1621564943_quanbaggy.jfif', 'Tên sản phẩm:Quần jean baggy unisex cho nam nữ giá rẻ', '', 1, 4),
(8, 'Áo thun in hình Jack J97 Đom Đóm', 'B03', '81000', 33, '1621565046_aothun.jfif', 'Áo thun in hình Jack J97 Đom Đóm - Vải Cotton thái M2391', '', 1, 4),
(9, 'Tất cao cổ vintage Hàn Quốc', 'A03', '20000', 40, '1621566628_tat.jfif', '[TẤT CÓ SẴN] Tất trơn dài về lại đủ màu', '', 1, 5);

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
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `id_cart_details` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `dangky`
--
ALTER TABLE `dangky`
  MODIFY `id_khachhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
