-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2024 at 01:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_da1`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `img` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `subtitle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`img`, `title`, `subtitle`) VALUES
('img1.png', 'New In: iPhone 15 series', 'Protect Your New iPhone'),
('iphone15-pro-max-th12-30990.webp', 'iPhone 15 Pro Max', 'Lên đời ngay');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(4) NOT NULL,
  `noidung` text NOT NULL,
  `ngaybinhluan` date NOT NULL,
  `hide` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: hienthi, 1 an',
  `iduser` int(4) NOT NULL,
  `idsp` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `noidung`, `ngaybinhluan`, `hide`, `iduser`, `idsp`) VALUES
(1, 'Mình không có phiên bản màu hồng ạ', '2023-12-03', 0, 3, 12),
(2, 'Chuyển hàng trong mấy ngày ạ', '2023-12-03', 0, 1, 12),
(3, 'Trời ơi sạc mắc quá vậy', '2023-12-04', 0, 1, 29);

-- --------------------------------------------------------

--
-- Table structure for table `ctsanpham`
--

CREATE TABLE `ctsanpham` (
  `MaSP` int(4) NOT NULL,
  `Ma_DungLuong` varchar(50) NOT NULL,
  `Ma_Mau` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ctsanpham`
--

INSERT INTO `ctsanpham` (`MaSP`, `Ma_DungLuong`, `Ma_Mau`) VALUES
(12, '1TB', 'Titan đen'),
(12, '1TB', 'Titan Tự Nhiên'),
(12, '1TB', 'Titan xanh'),
(12, '256GB', 'Titan đen'),
(12, '256GB', 'Titan Tự Nhiên'),
(12, '256GB', 'Titan xanh'),
(12, '512GB', 'Titan đen'),
(12, '512GB', 'Titan Tự Nhiên'),
(12, '512GB', 'Titan xanh'),
(14, '1TB', 'Titan đen'),
(14, '1TB', 'Titan Tự Nhiên'),
(14, '1TB', 'Titan xanh'),
(14, '256GB', 'Titan đen'),
(14, '256GB', 'Titan Tự Nhiên'),
(14, '256GB', 'Titan xanh'),
(14, '512GB', 'Titan đen'),
(14, '512GB', 'Titan Tự Nhiên'),
(14, '512GB', 'Titan xanh'),
(15, '1TB', 'Titan đen'),
(15, '1TB', 'Titan Tự Nhiên'),
(15, '1TB', 'Titan xanh'),
(15, '256GB', 'Titan đen'),
(15, '256GB', 'Titan Tự Nhiên'),
(15, '256GB', 'Titan xanh'),
(15, '512GB', 'Titan đen'),
(15, '512GB', 'Titan Tự Nhiên'),
(15, '512GB', 'Titan xanh'),
(16, '1TB', 'Titan đen'),
(16, '1TB', 'Titan Tự Nhiên'),
(16, '1TB', 'Titan xanh'),
(17, '1TB', 'Titan đen'),
(17, '1TB', 'Titan Tự Nhiên'),
(17, '1TB', 'Titan xanh'),
(17, '256GB', 'Titan đen'),
(17, '256GB', 'Titan Tự Nhiên'),
(17, '256GB', 'Titan xanh'),
(17, '512GB', 'Titan đen'),
(17, '512GB', 'Titan Tự Nhiên'),
(17, '512GB', 'Titan xanh'),
(19, '1TB', 'Midnight'),
(19, '1TB', 'Titan đen'),
(19, '1TB', 'Titan Tự Nhiên'),
(19, '1TB', 'Titan xanh'),
(19, '256GB', 'Titan đen'),
(19, '256GB', 'Titan Tự Nhiên'),
(19, '256GB', 'Titan xanh'),
(19, '512GB', 'Titan đen'),
(19, '512GB', 'Titan Tự Nhiên'),
(19, '512GB', 'Titan xanh'),
(20, '1TB', 'Titan đen'),
(20, '1TB', 'Titan Tự Nhiên'),
(20, '1TB', 'Titan xanh'),
(20, '256GB', 'Titan đen'),
(20, '256GB', 'Titan Tự Nhiên'),
(20, '256GB', 'Titan xanh'),
(20, '512GB', 'Titan đen'),
(20, '512GB', 'Titan Tự Nhiên'),
(20, '512GB', 'Titan xanh'),
(24, 'Sport Band - M/L', 'Midnight'),
(24, 'Sport Band - M/L', 'Starlight'),
(24, 'Sport Band - S/M', 'Midnight'),
(24, 'Sport Band - S/M', 'Starlight'),
(29, 'None', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `ct_donhang`
--

CREATE TABLE `ct_donhang` (
  `id` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `img` varchar(100) NOT NULL,
  `price` int(9) NOT NULL,
  `dungluong` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `soluong` int(4) NOT NULL,
  `thanhtien` int(9) NOT NULL,
  `idbill` int(4) NOT NULL,
  `iduser` int(4) NOT NULL,
  `id_pro` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ct_donhang`
--

INSERT INTO `ct_donhang` (`id`, `name`, `img`, `price`, `dungluong`, `color`, `soluong`, `thanhtien`, `idbill`, `iduser`, `id_pro`) VALUES
(1, 'Iphone 14 Plus', '0009496_iphone-14-plus-128gb_550.webp', 20990000, '256GB', 'Titan đen', 1, 20990000, 3, 1, 20),
(2, 'Iphone 14 Plus', '0009496_iphone-14-plus-128gb_550.webp', 20990000, '256GB', 'Titan đen', 2, 20990000, 4, 1, 20),
(3, 'Iphone 14 Plus', '0009496_iphone-14-plus-128gb_550.webp', 20990000, '512GB', 'Titan đen', 1, 20990000, 4, 1, 20),
(4, 'iphone 15 pro max ', 'iphone15-promax.jpeg                       ', 32000000, '1TB', 'Titan đen', 2, 32000000, 5, 3, 12),
(5, 'iphone 15 pro max ', 'iphone15-promax.jpeg                       ', 32000000, '1TB', 'Titan đen', 1, 32000000, 6, 3, 12),
(6, 'Iphone 15', '0019818_iphone-15-256gb_550.jpeg  ', 27000000, '1TB', 'Titan Tự Nhiên', 1, 27000000, 6, 3, 16),
(7, 'iPhone 14 Pro Max ', '0020074_iphone-15-pro-max-128gb_550.jpeg', 29000000, '1TB', 'Titan xanh', 2, 58000000, 7, 3, 17),
(8, 'iPhone 15 pro max ', 'iphone15-promax.jpeg                              ', 32000000, '1TB', 'Titan đen', 1, 32000000, 9, 1, 12),
(9, 'Iphone 15', '0019818_iphone-15-256gb_550.jpeg    ', 27000000, '1TB', 'Titan đen', 1, 27000000, 9, 1, 16),
(10, 'Iphone 15 Plus', '0019940_iphone-15-plus-128gb_550.jpeg      ', 30000000, '1TB', 'Titan đen', 2, 60000000, 10, 1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `home` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1: là xuất hiện',
  `id_LoaiDanhMuc` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`, `content`, `home`, `id_LoaiDanhMuc`) VALUES
(1, 'Iphone 15', '', 1, 1),
(2, 'Iphone 14', '', 1, 1),
(5, 'Cáp sạc', '', 1, 5),
(8, 'APPLE WATCH ULTRA', '', 1, 4),
(9, 'Iphone 13', '', 1, 1),
(10, 'Iphone 12', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id` int(4) NOT NULL,
  `madonhang` varchar(20) NOT NULL,
  `nguoidat_ten` varchar(50) NOT NULL,
  `nguoidat_email` varchar(50) NOT NULL,
  `nguoidat_phone` varchar(15) NOT NULL,
  `nguoidat_diachi` varchar(100) NOT NULL,
  `nguoinhan_ten` varchar(50) DEFAULT NULL,
  `nguoinhan_phone` varchar(20) DEFAULT NULL,
  `nguoinhan_diachi` varchar(100) DEFAULT NULL,
  `ship` int(5) NOT NULL,
  `voucher` varchar(20) NOT NULL,
  `pttt` int(4) NOT NULL COMMENT '0: cod, 1 ck',
  `total` int(11) NOT NULL,
  `tong_thanhtoan` int(11) NOT NULL,
  `ngaymua` date NOT NULL,
  `trang_thai` int(4) NOT NULL COMMENT '0: đã tiếp nhận, 1: đang chuẩn bị hàng',
  `iduser` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`id`, `madonhang`, `nguoidat_ten`, `nguoidat_email`, `nguoidat_phone`, `nguoidat_diachi`, `nguoinhan_ten`, `nguoinhan_phone`, `nguoinhan_diachi`, `ship`, `voucher`, `pttt`, `total`, `tong_thanhtoan`, `ngaymua`, `trang_thai`, `iduser`) VALUES
(3, 'AAA1-165900-26112023', 'Nguyễn Phi Nguyễn', 'phinguyenq12@gmail.com', '0775183622', 'Tân Chánh Hiệp, quận 12', '', '', '', 0, '0', 1, 20990000, 20990000, '2023-11-26', 2, 1),
(4, 'AAA1-015022-27112023', 'Nguyễn Phi Nguyễn', 'phinguyenq12@gmail.com', '0775183622', 'Tân Chánh Hiệp, quận 12', '', '', '', 0, '0', 1, 62970000, 62970000, '2023-11-27', 2, 1),
(5, 'AAA3-164503-29112023', 'Nguyễn Nguyễn', 'khang.pna@gmail.com', '0775183622', '285/33/11 đường Tân Chánh Hiệp 10', 'Đỗ Bình Dương', '0901234567', 'CVPM Quang Trung, quận 12', 0, '0', 1, 64000000, 64000000, '2023-11-29', 1, 3),
(6, 'AAA3-013219-30112023', 'Nguyễn Nguyễn', 'khang.pna@gmail.com', '0775183621', 'To ky quanj 12', '', '', '', 0, '0', 2, 59000000, 59000000, '2023-11-30', 3, 3),
(7, 'AAA3-025640-01122023', 'Nguyễn Nguyễn', 'khang.pna@gmail.com', '0775183622', '285/33/11 đường Tân Chánh Hiệp 10', '', '', '', 0, '0', 2, 58000000, 58000000, '2023-12-01', 1, 3),
(8, 'AAA3-030836-02122023', 'Nguyễn Nguyễn', 'khang.pna@gmail.com', '0775183621', 'q12', '', '', '', 0, '0', 2, 595000, 595000, '2023-12-02', 1, 3),
(9, 'AAA1-025047-04122023', 'Nguyễn Phi Nguyễn', 'phinguyenq12@gmail.com', '0775183622', 'Tân Chánh Hiệp, quận 12', '', '', '', 0, '0', 1, 59000000, 59000000, '2023-12-04', 1, 1),
(10, 'AAA1-073900-07122023', 'Nguyễn Phi Nguyễn', 'phinguyenq12@gmail.com', '0775183622', 'Tân Chánh Hiệp, quận 12', 'Dương', '0775183612', 'Tô ký quận 12', 0, '0', 1, 60000000, 60000000, '2023-12-07', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(4) NOT NULL,
  `img` varchar(250) NOT NULL,
  `idsp` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `img`, `idsp`) VALUES
(3, 'glass.png', 12),
(4, '0019940_iphone-15-plus-128gb_550.jpeg', 12),
(5, 'img1.png', 12),
(6, 'ip_ho.webp', 12),
(7, 'sp2.png', 12),
(9, 'sp3.png', 12);

-- --------------------------------------------------------

--
-- Table structure for table `loaidanhmuc`
--

CREATE TABLE `loaidanhmuc` (
  `id` int(4) NOT NULL,
  `name_LDM` varchar(50) NOT NULL,
  `img` varchar(100) DEFAULT NULL,
  `content` varchar(100) NOT NULL,
  `home` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaidanhmuc`
--

INSERT INTO `loaidanhmuc` (`id`, `name_LDM`, `img`, `content`, `home`) VALUES
(1, 'Iphone', '    ', '', 0),
(2, 'Mac', 'mac.png', '', 1),
(3, 'Ipad', 'ipad.png', '', 1),
(4, 'Watch', 'watch.png  ', '', 1),
(5, 'Accessories', '      ', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(4) NOT NULL,
  `payment_name` varchar(50) NOT NULL,
  `payment_ship` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_name`, `payment_ship`) VALUES
(1, 'Ship tận nơi', 30000),
(2, 'Chuyển khoản', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `img` varchar(250) NOT NULL,
  `price` int(9) NOT NULL,
  `price_sale` int(9) DEFAULT NULL,
  `view` int(6) NOT NULL,
  `iddm` int(4) NOT NULL,
  `id_LoaiDanhMuc` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `name`, `img`, `price`, `price_sale`, `view`, `iddm`, `id_LoaiDanhMuc`) VALUES
(12, 'iPhone 15 pro max ', 'iphone15-promax.jpeg                                 ', 32000000, 0, 10, 1, 1),
(14, 'iPhone 15 pro ', '0019704_iphone-15-pro-512gb_550.jpeg     ', 30000000, 0, 100, 1, 1),
(15, 'Iphone 15 Plus', '0019940_iphone-15-plus-128gb_550.jpeg      ', 30000000, 0, 100, 1, 1),
(16, 'Iphone 15', '0019818_iphone-15-256gb_550.jpeg    ', 27000000, 0, 100, 1, 1),
(17, 'iPhone 14 Pro Max ', '0020074_iphone-15-pro-max-128gb_550.jpeg ', 29000000, 0, 100, 2, 2),
(18, 'Iphone 14 Pro', '0009496_iphone-14-plus-128gb_550.webp  ', 30000000, 0, 100, 2, 1),
(19, 'Iphone 14', '0009496_iphone-14-plus-128gb_550.webp', 19990000, 0, 100, 2, 1),
(20, 'Iphone 14 Plus', '0009496_iphone-14-plus-128gb_550.webp           ', 20990000, 0, 100, 2, 1),
(24, 'Apple Watch SE 2 2023 40mm (GPS) viền nhôm', 'apw.webp   ', 5950000, 0, 0, 8, 4),
(29, 'Cáp sạc USB-C to Lightning Cable 1m FAE', 'group_117_1.webp          ', 1000, 0, 200, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_color`
--

CREATE TABLE `tbl_color` (
  `color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_color`
--

INSERT INTO `tbl_color` (`color`) VALUES
('Midnight'),
('none'),
('Starlight'),
('Titan đen'),
('Titan Tự Nhiên'),
('Titan xanh');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dungluong`
--

CREATE TABLE `tbl_dungluong` (
  `dungluong` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_dungluong`
--

INSERT INTO `tbl_dungluong` (`dungluong`) VALUES
('1TB'),
('256GB'),
('512GB'),
('None'),
('Sport Band - M/L'),
('Sport Band - S/M');

-- --------------------------------------------------------

--
-- Table structure for table `trangthai`
--

CREATE TABLE `trangthai` (
  `trangthai_id` int(4) NOT NULL,
  `ten_trangthai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `trangthai`
--

INSERT INTO `trangthai` (`trangthai_id`, `ten_trangthai`) VALUES
(1, 'Đã tiếp nhận'),
(2, 'Đang vận chuyển'),
(3, 'Đã giao thành công');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(250) DEFAULT NULL,
  `role` tinyint(1) DEFAULT 0 COMMENT '0: khach, 1 admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `password`, `address`, `role`) VALUES
(1, 'Nguyễn Phi Nguyễn', 'phinguyenq12@gmail.com', '0775183622', '22042004', 'Tân Chánh Hiệp, quận 12', 0),
(3, 'Nguyễn Nguyễn', 'khang.pna@gmail.com', '0775183621', 'Khang123', NULL, 0),
(5, 'admin', 'admin@gmail.com', '09000000000', '123456789', NULL, 1),
(6, 'Nguyễn Thành Đạt', 'nguyenthanhdat@gmail.com', '0775182622', 'Dat123456', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cmt_user` (`iduser`),
  ADD KEY `fk_cmt_sp` (`idsp`);

--
-- Indexes for table `ctsanpham`
--
ALTER TABLE `ctsanpham`
  ADD PRIMARY KEY (`MaSP`,`Ma_DungLuong`,`Ma_Mau`),
  ADD KEY `fk_ctsp_dungluong` (`Ma_DungLuong`),
  ADD KEY `fk_ctsp_color` (`Ma_Mau`);

--
-- Indexes for table `ct_donhang`
--
ALTER TABLE `ct_donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ctdh_sp` (`id_pro`),
  ADD KEY `fk_ctdh_user` (`iduser`),
  ADD KEY `fk_ctdh_bill` (`idbill`),
  ADD KEY `fk_ctdh_dungluong` (`dungluong`),
  ADD KEY `fk_ctdh_color` (`color`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dm_ldm` (`id_LoaiDanhMuc`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dh_user` (`iduser`),
  ADD KEY `fk_dh_pttt` (`pttt`),
  ADD KEY `fk_dh_trangthai` (`trang_thai`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_gallery_sp` (`idsp`);

--
-- Indexes for table `loaidanhmuc`
--
ALTER TABLE `loaidanhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sp_dm` (`iddm`),
  ADD KEY `fk_sp_ldm` (`id_LoaiDanhMuc`);

--
-- Indexes for table `tbl_color`
--
ALTER TABLE `tbl_color`
  ADD PRIMARY KEY (`color`);

--
-- Indexes for table `tbl_dungluong`
--
ALTER TABLE `tbl_dungluong`
  ADD PRIMARY KEY (`dungluong`);

--
-- Indexes for table `trangthai`
--
ALTER TABLE `trangthai`
  ADD PRIMARY KEY (`trangthai_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ct_donhang`
--
ALTER TABLE `ct_donhang`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `loaidanhmuc`
--
ALTER TABLE `loaidanhmuc`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `trangthai`
--
ALTER TABLE `trangthai`
  MODIFY `trangthai_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_cmt_sp` FOREIGN KEY (`idsp`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `fk_cmt_user` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`);

--
-- Constraints for table `ctsanpham`
--
ALTER TABLE `ctsanpham`
  ADD CONSTRAINT `fk_ctsp_color` FOREIGN KEY (`Ma_Mau`) REFERENCES `tbl_color` (`color`),
  ADD CONSTRAINT `fk_ctsp_dungluong` FOREIGN KEY (`Ma_DungLuong`) REFERENCES `tbl_dungluong` (`dungluong`),
  ADD CONSTRAINT `fk_ctsp_sp` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`id`);

--
-- Constraints for table `ct_donhang`
--
ALTER TABLE `ct_donhang`
  ADD CONSTRAINT `fk_ctdh_bill` FOREIGN KEY (`idbill`) REFERENCES `donhang` (`id`),
  ADD CONSTRAINT `fk_ctdh_color` FOREIGN KEY (`color`) REFERENCES `tbl_color` (`color`),
  ADD CONSTRAINT `fk_ctdh_dungluong` FOREIGN KEY (`dungluong`) REFERENCES `tbl_dungluong` (`dungluong`),
  ADD CONSTRAINT `fk_ctdh_sp` FOREIGN KEY (`id_pro`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `fk_ctdh_user` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`);

--
-- Constraints for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD CONSTRAINT `fk_dm_ldm` FOREIGN KEY (`id_LoaiDanhMuc`) REFERENCES `loaidanhmuc` (`id`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `fk_dh_pttt` FOREIGN KEY (`pttt`) REFERENCES `payment` (`payment_id`),
  ADD CONSTRAINT `fk_dh_trangthai` FOREIGN KEY (`trang_thai`) REFERENCES `trangthai` (`trangthai_id`),
  ADD CONSTRAINT `fk_dh_user` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`);

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `fk_gallery_sp` FOREIGN KEY (`idsp`) REFERENCES `sanpham` (`id`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_sp_dm` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`id`),
  ADD CONSTRAINT `fk_sp_ldm` FOREIGN KEY (`id_LoaiDanhMuc`) REFERENCES `loaidanhmuc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
