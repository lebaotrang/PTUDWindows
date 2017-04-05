-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2017 at 02:24 AM
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
(1, 1, 1, 'Đăng ký'),
(2, 2, 1, 'Có ý thích');

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
  `nv_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `daotao`
--

INSERT INTO `daotao` (`dt_id`, `dt_ma`, `dt_ten`, `dt_mota`, `dt_trangthai`, `nv_id`) VALUES
(1, 'CNTT17', 'Công nghệ thông tin', 'Đào tạo kỹ sư Công nghệ thông tin', 0, 1),
(2, 'CNTS17', 'Thủy sản', 'Đào tạo kỹ sư thủy sản', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ketqua`
--

CREATE TABLE `ketqua` (
  `kq_id` int(11) NOT NULL,
  `sv_id` int(11) NOT NULL,
  `mh_id` int(11) NOT NULL,
  `kq_diemlan1` float NOT NULL,
  `kq_diemlan2` float DEFAULT NULL,
  `kq_trungbinh` float NOT NULL,
  `kq_tichluy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ketqua`
--

INSERT INTO `ketqua` (`kq_id`, `sv_id`, `mh_id`, `kq_diemlan1`, `kq_diemlan2`, `kq_trungbinh`, `kq_tichluy`) VALUES
(1, 1, 3, 9, NULL, 9, 3),
(2, 1, 4, 8.7, NULL, 8.7, 3),
(3, 1, 5, 8.8, NULL, 8.8, 4);

-- --------------------------------------------------------

--
-- Table structure for table `monhoc`
--

CREATE TABLE `monhoc` (
  `mh_id` int(11) NOT NULL,
  `mh_ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mh_tinchi` int(2) NOT NULL,
  `dt_id` int(11) NOT NULL,
  `nv_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `monhoc`
--

INSERT INTO `monhoc` (`mh_id`, `mh_ten`, `mh_tinchi`, `dt_id`, `nv_id`) VALUES
(3, 'Lập trình căn bản', 3, 1, 4),
(4, 'Nền tảng CNTT', 3, 1, 7),
(5, 'Nhập môn Công nghệ phần mềm', 3, 1, 6),
(6, 'Lập trình hướng đối tượng', 3, 1, 2),
(7, 'Nguyên lý hệ điều hành', 3, 1, 5),
(8, 'Cấu trúc dữ liệu', 4, 1, 2),
(9, 'Phân tích thiết kế thuật toán', 4, 1, 3),
(10, 'Mạng máy tính', 3, 1, 5),
(11, 'Lý thuyết đồ thị', 3, 1, 2),
(12, 'Phân tích thiết kế hệ thống', 3, 1, 6),
(13, 'Cơ sở dữ liệu', 4, 1, 7),
(14, 'Quản trị hệ thống', 3, 1, 4),
(15, 'Phương pháp nghiên cứu khoa học', 2, 1, 4),
(16, 'Mạng không dây và di động', 2, 1, 3);

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
  `nv_matkhau` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`nv_id`, `nv_hoten`, `nv_gioitinh`, `nv_ngaysinh`, `nv_dienthoai`, `nv_email`, `nv_diachi`, `nv_tentaikhoan`, `nv_matkhau`) VALUES
(1, 'Quản trị 1', 1, '1985-08-20', '0939999999', 'quantri1@gmail.com', 'Cần Thơ', 'quantri1@gmail.com', '96e79218965eb72c92a549dd5a330112'),
(2, 'Nguyễn Trọng Thức', 0, '1986-09-03', '0123456789', 'ntthuc@gmail.com', 'Can tho', 'ntthuc@gmail.com', '96e79218965eb72c92a549dd5a330112'),
(3, 'Trần Bá Huy', 1, '1986-03-15', '0939898989', 'tbhuy@gmail.com', 'Vinh Long', 'tbhuy@gmail.com', '96e79218965eb72c92a549dd5a330112'),
(4, 'Nguyễn Minh Đợi', 1, '1978-03-03', '0123456456', 'nmdoi@gmail.com', 'Soc Trang', 'nmdoi@gmail.com', '96e79218965eb72c92a549dd5a330112'),
(5, 'Nguyễn Hữu Phước Đại', 1, '1985-03-20', '0123456799', 'nhpdai@gmail.com', 'Ca Mau', 'nhpdai@gmail.com', '96e79218965eb72c92a549dd5a330112'),
(6, 'Trần Nguyễn Huyền Trang', 0, '1984-03-26', '0936889889', 'tnhtrang@gmail.com', 'Can Tho', 'tnhtrang@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f'),
(7, 'Lê Thị Phương Phi', 0, '1987-03-22', '0122345678', 'ltpphi@gmial.com', 'Hậu Giang', 'ltpphi@gmial.com', '96e79218965eb72c92a549dd5a330112');

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
(2, 'Giảng viên');

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
(1, 1, 1),
(2, 2, 2),
(3, 3, 2),
(4, 4, 2),
(5, 5, 2),
(6, 6, 2),
(7, 7, 2);

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
  `sv_trangthai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sinhvien`
--

INSERT INTO `sinhvien` (`sv_id`, `sv_hoten`, `sv_gioitinh`, `sv_ngaysinh`, `sv_diachi`, `sv_dienthoai`, `sv_email`, `sv_matkhau`, `sv_trangthai`) VALUES
(1, 'Lê Bảo Trang', 1, '1992-10-18', '', '0926701279', 'lebaotrang1810@gmail.com', '96e79218965eb72c92a549dd5a330112', 1),
(2, 'Li Bao Zhuang', 1, '1992-09-23', 'Can tho', '0123456788', 'lbzhuang@gmail.com', '96e79218965eb72c92a549dd5a330112', 1);

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
-- Indexes for table `daotao`
--
ALTER TABLE `daotao`
  ADD PRIMARY KEY (`dt_id`),
  ADD UNIQUE KEY `dt_ma` (`dt_ma`),
  ADD KEY `nv_id` (`nv_id`);

--
-- Indexes for table `ketqua`
--
ALTER TABLE `ketqua`
  ADD PRIMARY KEY (`kq_id`),
  ADD KEY `sv_id` (`sv_id`),
  ADD KEY `mh_id` (`mh_id`);

--
-- Indexes for table `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`mh_id`),
  ADD KEY `dt_id` (`dt_id`),
  ADD KEY `nv_id` (`nv_id`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`nv_id`);

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
  ADD PRIMARY KEY (`sv_id`);

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
  MODIFY `dk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `daotao`
--
ALTER TABLE `daotao`
  MODIFY `dt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ketqua`
--
ALTER TABLE `ketqua`
  MODIFY `kq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `monhoc`
--
ALTER TABLE `monhoc`
  MODIFY `mh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `nv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `quyen`
--
ALTER TABLE `quyen`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `quyennhanvien`
--
ALTER TABLE `quyennhanvien`
  MODIFY `qnv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sinhvien`
--
ALTER TABLE `sinhvien`
  MODIFY `sv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
-- Constraints for table `daotao`
--
ALTER TABLE `daotao`
  ADD CONSTRAINT `daotao_ibfk_1` FOREIGN KEY (`nv_id`) REFERENCES `nhanvien` (`nv_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ketqua`
--
ALTER TABLE `ketqua`
  ADD CONSTRAINT `ketqua_ibfk_1` FOREIGN KEY (`sv_id`) REFERENCES `sinhvien` (`sv_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ketqua_ibfk_2` FOREIGN KEY (`mh_id`) REFERENCES `monhoc` (`mh_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `monhoc`
--
ALTER TABLE `monhoc`
  ADD CONSTRAINT `monhoc_ibfk_1` FOREIGN KEY (`dt_id`) REFERENCES `daotao` (`dt_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `monhoc_ibfk_2` FOREIGN KEY (`nv_id`) REFERENCES `quyennhanvien` (`nv_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quyennhanvien`
--
ALTER TABLE `quyennhanvien`
  ADD CONSTRAINT `quyennhanvien_ibfk_1` FOREIGN KEY (`nv_id`) REFERENCES `nhanvien` (`nv_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `quyennhanvien_ibfk_2` FOREIGN KEY (`q_id`) REFERENCES `quyen` (`q_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thongtinsv`
--
ALTER TABLE `thongtinsv`
  ADD CONSTRAINT `thongtinsv_ibfk_1` FOREIGN KEY (`sv_id`) REFERENCES `sinhvien` (`sv_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
