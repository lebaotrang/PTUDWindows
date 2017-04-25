-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2017 at 04:14 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlydaotao`
--

-- --------------------------------------------------------

--
-- Table structure for table `dangky`
--

CREATE TABLE `dangky` (
  `dk_id` int(11) NOT NULL,
  `dt_id` int(11) NOT NULL,
  `sv_id` int(11) NOT NULL,
  `dk_trangthai` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dangky`
--

INSERT INTO `dangky` (`dk_id`, `dt_id`, `sv_id`, `dk_trangthai`) VALUES
(1, 1, 5, 'Đăng ký'),
(2, 2, 5, 'Tạm hoãn'),
(3, 3, 5, 'Tạm hoãn'),
(4, 1, 6, 'Đăng ký'),
(5, 1, 7, 'Có ý thích');

-- --------------------------------------------------------

--
-- Table structure for table `dangkymonhoc`
--

CREATE TABLE `dangkymonhoc` (
  `dkmh_id` int(11) NOT NULL,
  `mh_id` int(11) NOT NULL,
  `sv_id` int(11) NOT NULL,
  `hknk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dangkymonhoc`
--

INSERT INTO `dangkymonhoc` (`dkmh_id`, `mh_id`, `sv_id`, `hknk_id`) VALUES
(3, 1, 6, 5),
(4, 2, 6, 5),
(6, 1, 5, 5),
(7, 2, 5, 5),
(8, 3, 5, 5),
(9, 5, 5, 7),
(10, 5, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `daotao`
--

CREATE TABLE `daotao` (
  `dt_id` int(11) NOT NULL,
  `dt_ma` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `dt_ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dt_mota` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dt_trangthai` int(1) NOT NULL,
  `k_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `daotao`
--

INSERT INTO `daotao` (`dt_id`, `dt_ma`, `dt_ten`, `dt_mota`, `dt_trangthai`, `k_id`) VALUES
(1, 'CNTT17', 'Công nghệ thông tin', 'Đào tạo KS CNTT, thời gian 4,5 năm', 0, 1),
(2, 'TCKT17', 'Tài chính - Kế Toán', 'Đào tạo cử nhân 4 năm', 0, 2),
(3, 'NTTS17', 'Nuôi trồng thủy sản', 'Đào tạo kỹ sư thủy sản', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `hknk_mon`
--

CREATE TABLE `hknk_mon` (
  `hknkm_id` int(11) NOT NULL,
  `hknk_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hknk_mon`
--

INSERT INTO `hknk_mon` (`hknkm_id`, `hknk_id`, `m_id`) VALUES
(1, 5, 1),
(2, 5, 2),
(3, 5, 3),
(4, 7, 5),
(5, 7, 6),
(6, 7, 7),
(7, 7, 8),
(8, 5, 5),
(9, 4, 1),
(10, 4, 2),
(11, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `hockynienkhoa`
--

CREATE TABLE `hockynienkhoa` (
  `hknk_id` int(11) NOT NULL,
  `hocky` int(11) NOT NULL,
  `nienkhoa` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hockynienkhoa`
--

INSERT INTO `hockynienkhoa` (`hknk_id`, `hocky`, `nienkhoa`) VALUES
(1, 1, '2016-2017'),
(2, 2, '2016-2017'),
(3, 3, '2016-2017'),
(4, 1, '2017-2018'),
(5, 2, '2017-2018'),
(6, 3, '2017-2018'),
(7, 1, '2018-2019'),
(8, 2, '2018-2019'),
(9, 3, '2018-2019');

-- --------------------------------------------------------

--
-- Table structure for table `ketqua`
--

CREATE TABLE `ketqua` (
  `kq_id` int(11) NOT NULL,
  `sv_id` int(11) NOT NULL,
  `m_id` int(11) DEFAULT NULL,
  `l_id` int(11) NOT NULL,
  `kq_diemlan1` float DEFAULT NULL,
  `kq_diemlan2` float DEFAULT NULL,
  `kq_trungbinh` float DEFAULT NULL,
  `kq_tichluy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ketqua`
--

INSERT INTO `ketqua` (`kq_id`, `sv_id`, `m_id`, `l_id`, `kq_diemlan1`, `kq_diemlan2`, `kq_trungbinh`, `kq_tichluy`) VALUES
(1, 6, 1, 1, NULL, NULL, NULL, NULL),
(2, 5, 1, 1, NULL, NULL, NULL, NULL),
(6, 6, 2, 2, 8.9, -1, 8.8, 4),
(7, 5, 2, 2, 4, 9, 9, 4),
(8, 5, 3, 3, 9, -1, 9, 4),
(9, 5, 5, 4, 9.1, -1, 9.1, 3),
(10, 5, 5, 5, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `k_id` int(11) NOT NULL,
  `k_ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `k_ghichu` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`k_id`, `k_ten`, `k_ghichu`) VALUES
(1, 'Công nghệ thông tin', 'Công nghệ thông tin'),
(2, 'Tài chính - kế toán', 'Tài chính - kế toán'),
(3, 'Thủy sản', '');

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE `lop` (
  `l_id` int(11) NOT NULL,
  `l_ten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hknk_id` int(4) NOT NULL,
  `mh_id` int(11) NOT NULL,
  `nv_id` int(11) DEFAULT NULL,
  `l_trangthai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lop`
--

INSERT INTO `lop` (`l_id`, `l_ten`, `hknk_id`, `mh_id`, `nv_id`, `l_trangthai`) VALUES
(1, 'L11-22017-A', 5, 1, 7, 1),
(2, 'L12-22017-A', 5, 2, 2, 1),
(3, 'L13-22017-A', 5, 3, 2, 1),
(4, 'L15-12018-A', 7, 5, 2, 1),
(5, 'L15-22017-A', 5, 5, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `monhoc`
--

CREATE TABLE `monhoc` (
  `mh_id` int(11) NOT NULL,
  `mh_ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mh_tinchi` int(2) NOT NULL,
  `dt_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `monhoc`
--

INSERT INTO `monhoc` (`mh_id`, `mh_ten`, `mh_tinchi`, `dt_id`) VALUES
(1, 'Tin học căn bản', 2, 1),
(2, 'Lập trình căn bản', 4, 1),
(3, 'Cấu trúc dữ liệu', 4, 1),
(4, 'Tài chính ngân hàng', 3, 2),
(5, 'Kiến trúc máy tính', 3, 1),
(6, 'Nguyên lý hệ điều hành', 3, 1),
(7, 'Nhập môn công nghệ phần mềm', 3, 1),
(8, 'Mạng máy tính', 3, 1),
(9, 'Nguyên lý kế toán', 3, 2),
(10, 'Pháp luật kinh tế', 4, 2),
(11, 'Nguyên lý thống kê', 2, 2),
(12, 'Định giá tài sản', 3, 2),
(13, 'Kiểm toán', 2, 2),
(14, 'Thị trường chứng khoán và đầu tư chứng khoán', 3, 2),
(15, 'Phân tích tài chính doanh nghiệp', 4, 2),
(16, 'Lập trình hướng đối tượng', 3, 1),
(17, 'Lý thuyết đồ thị', 3, 1),
(18, 'Phân tích thiết kế thuật toán', 4, 1),
(19, 'Nền tảng Công nghệ thông tin', 3, 1),
(20, 'Phương pháp nghiên cứu khoa học', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `nv_id` int(11) NOT NULL,
  `nv_hoten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nv_gioitinh` int(1) NOT NULL,
  `nv_ngaysinh` date NOT NULL,
  `nv_dienthoai` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `nv_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nv_diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nv_tentaikhoan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nv_matkhau` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `k_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`nv_id`, `nv_hoten`, `nv_gioitinh`, `nv_ngaysinh`, `nv_dienthoai`, `nv_email`, `nv_diachi`, `nv_tentaikhoan`, `nv_matkhau`, `k_id`) VALUES
(2, 'Nguyễn Trọng Thức', 0, '1984-09-01', '0933123456', 'ntthuc@gmail.com', 'Quận Ninh Kiều, Tp.Cần Thơ', 'ntthuc@gmail.com', 'ee904a8a57dca0d526256e693c779277', 1),
(3, 'Nguyễn Minh Đợi', 0, '1980-09-03', '0123456789', 'nmdoi@gmail.com', 'Quận Ninh Kiều, Tp.Cần Thơ', 'nmdoi@gmail.com', 'ee904a8a57dca0d526256e693c779277', 1),
(4, 'Trần Bá Huy', 0, '1986-04-15', '0936789788', 'tbhuy@gmail.com', 'Quận Ninh Kiều, Tp.Cần Thơ', 'tbhuy@gmail.com', 'ee904a8a57dca0d526256e693c779277', 1),
(5, 'Trần Ngọc Xuyên', 1, '1983-08-23', '0123444555', 'tnxuyen@gmali.com', 'Quận Ninh Kiều, Tp.Cần Thơ', 'tnxuyen@gmali.com', 'ee904a8a57dca0d526256e693c779277', 2),
(6, 'Cao Tài Đức', 0, '1982-08-08', '0936888555', 'ctduc@gmail.com', 'Quận Ninh Kiều, Tp.Cần Thơ', 'ctduc@gmail.com', 'ee904a8a57dca0d526256e693c779277', 2),
(7, 'Trần Huyền Trang', 1, '1983-06-23', '0122566778', 'thtrang@gmail.com', 'Quận Ninh Kiều, Tp.Cần Thơ', 'thtrang@gmail.com', 'ee904a8a57dca0d526256e693c779277', 1),
(8, 'Admin', 0, '1983-06-23', '0122345876', 'admin@gmail.com', 'Quận Ninh Kiều, Tp.Cần Thơ', 'admin@gmail.com', 'ee904a8a57dca0d526256e693c779277', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quyen`
--

CREATE TABLE `quyen` (
  `q_id` int(11) NOT NULL,
  `q_ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quyen`
--

INSERT INTO `quyen` (`q_id`, `q_ten`) VALUES
(1, 'Quản trị'),
(2, 'QL đào tạo'),
(3, 'Giảng viên');

-- --------------------------------------------------------

--
-- Table structure for table `quyennhanvien`
--

CREATE TABLE `quyennhanvien` (
  `qnv_id` int(11) NOT NULL,
  `nv_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quyennhanvien`
--

INSERT INTO `quyennhanvien` (`qnv_id`, `nv_id`, `q_id`) VALUES
(25, 8, 1),
(26, 7, 3),
(27, 6, 3),
(28, 5, 3),
(29, 4, 2),
(30, 4, 3),
(31, 3, 2),
(32, 2, 1),
(33, 2, 2),
(34, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
--

CREATE TABLE `sinhvien` (
  `sv_id` int(11) NOT NULL,
  `sv_hoten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sv_gioitinh` int(1) NOT NULL,
  `sv_ngaysinh` date NOT NULL,
  `sv_diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sv_dienthoai` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `sv_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sv_matkhau` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sv_trangthai` int(1) NOT NULL,
  `dt_id` int(11) DEFAULT NULL,
  `k_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sinhvien`
--

INSERT INTO `sinhvien` (`sv_id`, `sv_hoten`, `sv_gioitinh`, `sv_ngaysinh`, `sv_diachi`, `sv_dienthoai`, `sv_email`, `sv_matkhau`, `sv_trangthai`, `dt_id`, `k_id`) VALUES
(5, 'Lê Bảo Trang', 1, '1992-10-18', '', '093701279', 'sinhvien1@gmail.com', 'ee904a8a57dca0d526256e693c779277', 0, 1, 1),
(6, 'Nguyễn Phan Anh', 0, '1992-04-11', '', '', 'sinhvien2@gmail.com', 'ee904a8a57dca0d526256e693c779277', 0, 1, 1),
(7, 'Nguyễn Viết Thông', 0, '1992-10-10', '', '', 'sinhvien3@gmail.com', 'ee904a8a57dca0d526256e693c779277', 0, NULL, NULL),
(8, 'Nguyễn Minh Nguyện', 0, '1992-04-03', '', '', 'sinhvien4@gmail.com', 'ee904a8a57dca0d526256e693c779277', 0, NULL, NULL),
(9, 'Lê Hồng Chiến', 0, '1992-03-05', '', '', 'sinhvien5@gmail.com', 'ee904a8a57dca0d526256e693c779277', 0, NULL, NULL),
(10, 'Nguyễn Kim Ngân', 1, '1992-10-10', '', '', 'nkngan@gmail.com', 'ee904a8a57dca0d526256e693c779277', 0, NULL, NULL),
(11, 'Hoàng Minh Trung', 0, '1993-02-03', '', '', 'sinhvien6@gmail.com', 'ee904a8a57dca0d526256e693c779277', 0, NULL, NULL),
(12, 'Lâm Ngọc Anh', 1, '1993-03-05', '', '', 'sinhvien7@gmail.com', 'ee904a8a57dca0d526256e693c779277', 0, NULL, NULL),
(13, 'Lý Thu Thủy', 1, '1994-05-08', '', '', 'sinhvien8@gmail.com', 'ee904a8a57dca0d526256e693c779277', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `thongtinsv`
--

CREATE TABLE `thongtinsv` (
  `ttsv_id` int(11) NOT NULL,
  `ttsv_makhoa` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ttsv_tenkhoa` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ttsv_nambatdau` int(4) NOT NULL,
  `ttsv_namketthuc` int(4) NOT NULL,
  `sv_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dangky`
--
ALTER TABLE `dangky`
  ADD PRIMARY KEY (`dk_id`),
  ADD KEY `dt_id` (`dt_id`),
  ADD KEY `sv_id` (`sv_id`);

--
-- Indexes for table `dangkymonhoc`
--
ALTER TABLE `dangkymonhoc`
  ADD PRIMARY KEY (`dkmh_id`),
  ADD KEY `mh_id` (`mh_id`),
  ADD KEY `sv_id` (`sv_id`),
  ADD KEY `hknk_id` (`hknk_id`);

--
-- Indexes for table `daotao`
--
ALTER TABLE `daotao`
  ADD PRIMARY KEY (`dt_id`),
  ADD UNIQUE KEY `dt_ma` (`dt_ma`),
  ADD KEY `k_id` (`k_id`);

--
-- Indexes for table `hknk_mon`
--
ALTER TABLE `hknk_mon`
  ADD PRIMARY KEY (`hknkm_id`),
  ADD KEY `hknk_id` (`hknk_id`),
  ADD KEY `m_id` (`m_id`);

--
-- Indexes for table `hockynienkhoa`
--
ALTER TABLE `hockynienkhoa`
  ADD PRIMARY KEY (`hknk_id`);

--
-- Indexes for table `ketqua`
--
ALTER TABLE `ketqua`
  ADD PRIMARY KEY (`kq_id`),
  ADD KEY `sv_id` (`sv_id`),
  ADD KEY `mh_id` (`m_id`),
  ADD KEY `l_id` (`l_id`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`k_id`);

--
-- Indexes for table `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`l_id`),
  ADD KEY `mh_id` (`mh_id`),
  ADD KEY `hknk_id` (`hknk_id`),
  ADD KEY `nv_id` (`nv_id`);

--
-- Indexes for table `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`mh_id`),
  ADD KEY `dt_id` (`dt_id`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`nv_id`),
  ADD KEY `k_id` (`k_id`);

--
-- Indexes for table `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `quyennhanvien`
--
ALTER TABLE `quyennhanvien`
  ADD PRIMARY KEY (`qnv_id`),
  ADD KEY `nv_id` (`nv_id`),
  ADD KEY `q_id` (`q_id`);

--
-- Indexes for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`sv_id`),
  ADD KEY `dt_id` (`dt_id`),
  ADD KEY `k_id` (`k_id`);

--
-- Indexes for table `thongtinsv`
--
ALTER TABLE `thongtinsv`
  ADD PRIMARY KEY (`ttsv_id`),
  ADD KEY `sv_id` (`sv_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dangky`
--
ALTER TABLE `dangky`
  MODIFY `dk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `dangkymonhoc`
--
ALTER TABLE `dangkymonhoc`
  MODIFY `dkmh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `daotao`
--
ALTER TABLE `daotao`
  MODIFY `dt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `hknk_mon`
--
ALTER TABLE `hknk_mon`
  MODIFY `hknkm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `hockynienkhoa`
--
ALTER TABLE `hockynienkhoa`
  MODIFY `hknk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ketqua`
--
ALTER TABLE `ketqua`
  MODIFY `kq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `khoa`
--
ALTER TABLE `khoa`
  MODIFY `k_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lop`
--
ALTER TABLE `lop`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `monhoc`
--
ALTER TABLE `monhoc`
  MODIFY `mh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `nv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `quyen`
--
ALTER TABLE `quyen`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `quyennhanvien`
--
ALTER TABLE `quyennhanvien`
  MODIFY `qnv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `sinhvien`
--
ALTER TABLE `sinhvien`
  MODIFY `sv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `thongtinsv`
--
ALTER TABLE `thongtinsv`
  MODIFY `ttsv_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `dangky`
--
ALTER TABLE `dangky`
  ADD CONSTRAINT `dangky_ibfk_1` FOREIGN KEY (`dt_id`) REFERENCES `daotao` (`dt_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dangky_ibfk_2` FOREIGN KEY (`sv_id`) REFERENCES `sinhvien` (`sv_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dangkymonhoc`
--
ALTER TABLE `dangkymonhoc`
  ADD CONSTRAINT `dangkymonhoc_ibfk_1` FOREIGN KEY (`sv_id`) REFERENCES `sinhvien` (`sv_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dangkymonhoc_ibfk_2` FOREIGN KEY (`mh_id`) REFERENCES `monhoc` (`mh_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `daotao`
--
ALTER TABLE `daotao`
  ADD CONSTRAINT `daotao_ibfk_1` FOREIGN KEY (`k_id`) REFERENCES `khoa` (`k_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hknk_mon`
--
ALTER TABLE `hknk_mon`
  ADD CONSTRAINT `hknk_mon_ibfk_1` FOREIGN KEY (`m_id`) REFERENCES `monhoc` (`mh_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hknk_mon_ibfk_2` FOREIGN KEY (`hknk_id`) REFERENCES `hockynienkhoa` (`hknk_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ketqua`
--
ALTER TABLE `ketqua`
  ADD CONSTRAINT `ketqua_ibfk_2` FOREIGN KEY (`m_id`) REFERENCES `monhoc` (`mh_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ketqua_ibfk_3` FOREIGN KEY (`l_id`) REFERENCES `lop` (`l_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ketqua_ibfk_4` FOREIGN KEY (`sv_id`) REFERENCES `sinhvien` (`sv_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lop`
--
ALTER TABLE `lop`
  ADD CONSTRAINT `lop_ibfk_2` FOREIGN KEY (`hknk_id`) REFERENCES `hockynienkhoa` (`hknk_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lop_ibfk_3` FOREIGN KEY (`mh_id`) REFERENCES `monhoc` (`mh_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lop_ibfk_4` FOREIGN KEY (`nv_id`) REFERENCES `nhanvien` (`nv_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `monhoc`
--
ALTER TABLE `monhoc`
  ADD CONSTRAINT `monhoc_ibfk_1` FOREIGN KEY (`dt_id`) REFERENCES `daotao` (`dt_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`k_id`) REFERENCES `khoa` (`k_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quyennhanvien`
--
ALTER TABLE `quyennhanvien`
  ADD CONSTRAINT `quyennhanvien_ibfk_1` FOREIGN KEY (`nv_id`) REFERENCES `nhanvien` (`nv_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `quyennhanvien_ibfk_2` FOREIGN KEY (`q_id`) REFERENCES `quyen` (`q_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD CONSTRAINT `sinhvien_ibfk_1` FOREIGN KEY (`dt_id`) REFERENCES `daotao` (`dt_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sinhvien_ibfk_2` FOREIGN KEY (`k_id`) REFERENCES `khoa` (`k_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thongtinsv`
--
ALTER TABLE `thongtinsv`
  ADD CONSTRAINT `thongtinsv_ibfk_1` FOREIGN KEY (`sv_id`) REFERENCES `sinhvien` (`sv_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
