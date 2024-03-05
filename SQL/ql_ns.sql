-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 06, 2023 lúc 11:49 AM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ql_ns`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bangchamcong`
--

CREATE TABLE `bangchamcong` (
  `maChamCong` int(11) NOT NULL,
  `maNV` int(11) DEFAULT NULL,
  `Thang_Nam` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngayCongChuan` int(11) DEFAULT NULL,
  `soNgayLam` int(11) DEFAULT NULL,
  `soNgayNghiCoPhep` int(11) DEFAULT NULL,
  `soNgayNghiKhongPhep` int(11) DEFAULT NULL,
  `liDoNghi` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bangchamcong`
--

INSERT INTO `bangchamcong` (`maChamCong`, `maNV`, `Thang_Nam`, `ngayCongChuan`, `soNgayLam`, `soNgayNghiCoPhep`, `soNgayNghiKhongPhep`, `liDoNghi`) VALUES
(1, 2, '12 - 2023', 26, 25, 1, 0, 'Ä‘á»¥ng xe'),
(2, 1, '12 - 2023', 26, 25, 0, 1, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baohiem`
--

CREATE TABLE `baohiem` (
  `maBH` int(11) NOT NULL,
  `BHNT` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `BHXH` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `BHYT` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `Ngaydong` date DEFAULT NULL,
  `Hanhet` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `baohiem`
--

INSERT INTO `baohiem` (`maBH`, `BHNT`, `BHXH`, `BHYT`, `Ngaydong`, `Hanhet`) VALUES
(1, '010', '010', '010', '2022-01-05', '2023-01-05'),
(2, '020', '020', '020', '2023-01-02', '2024-01-02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bophan`
--

CREATE TABLE `bophan` (
  `maBP` int(11) NOT NULL,
  `tenBoPhan` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BP_SDT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bophan`
--

INSERT INTO `bophan` (`maBP`, `tenBoPhan`, `BP_SDT`) VALUES
(1, 'GiÃ¡m Ä‘á»‘c', 983),
(2, 'Tester', 1234);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `maChucVu` int(5) NOT NULL,
  `tenChucVu` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chucvu`
--

INSERT INTO `chucvu` (`maChucVu`, `tenChucVu`) VALUES
(1, 'NhÃ¢n viÃªn'),
(2, 'TrÆ°á»Ÿng ban'),
(3, 'GiÃ¡m Ä‘á»‘c'),
(4, 'PhÃ³ giÃ¡m Ä‘á»‘c');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `luong`
--

CREATE TABLE `luong` (
  `maLuong` int(11) NOT NULL,
  `tenBoPhan` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenChucVu` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soLuong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `luong`
--

INSERT INTO `luong` (`maLuong`, `tenBoPhan`, `tenChucVu`, `soLuong`) VALUES
(1, 'GiÃ¡m Ä‘á»‘c ', 'GiÃ¡m Ä‘á»‘c', 35000000),
(2, 'GiÃ¡m Ä‘á»‘c', 'PhÃ³ giÃ¡m Ä‘á»‘c', 30000000),
(3, 'Tester', 'NhÃ¢n viÃªn', 6000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `maNV` int(5) NOT NULL,
  `tenBoPhan` varchar(50) DEFAULT NULL,
  `maBH` varchar(5) DEFAULT NULL,
  `tenChucVu` varchar(50) DEFAULT NULL,
  `HovaTen` varchar(50) DEFAULT NULL,
  `Gioitinh` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SDT` int(10) DEFAULT NULL,
  `DiaChi` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `CCCD` int(12) DEFAULT NULL,
  `ngayCap` date DEFAULT NULL,
  `noiCap` varchar(50) DEFAULT NULL,
  `tinhTrangHonNhan` varchar(20) DEFAULT NULL,
  `ngayVaoLam` date DEFAULT NULL,
  `tinhTrang` varchar(20) DEFAULT NULL,
  `trinhDoHocVan` varchar(50) DEFAULT NULL,
  `trinhDoChuyenMon` varchar(50) DEFAULT NULL,
  `tenLoaiPhuCap` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`maNV`, `tenBoPhan`, `maBH`, `tenChucVu`, `HovaTen`, `Gioitinh`, `SDT`, `DiaChi`, `Email`, `CCCD`, `ngayCap`, `noiCap`, `tinhTrangHonNhan`, `ngayVaoLam`, `tinhTrang`, `trinhDoHocVan`, `trinhDoChuyenMon`, `tenLoaiPhuCap`) VALUES
(1, 'GiÃ¡m Ä‘á»‘c', '1', 'GiÃ¡m Ä‘á»‘c', 'HÆ°ng', 'nam', 3389, 'hai bÃ  trÆ°ng', 'aaa@yahoo.com', 789, '2023-01-01', 'Nguyá»…n trÃ£i', 'Ä‘á»™c thÃ¢n', '2023-01-01', 'Ä‘ang lÃ m', 'thÆ°á»ng', 'thÆ°á»ng', 'Äƒn trÆ°a'),
(2, 'Tester', '2', 'NhÃ¢n viÃªn', 'NhÃ¢n viÃªn a', 'ná»¯', 3389, '132/2', 'nhanvien@gmail.com', 123456, '2023-01-05', 'Nguyá»…n trÃ£i', 'Ä‘á»™c thÃ¢n', '2023-01-21', 'Ä‘ang lÃ m', 'cÅ©ng Ä‘Æ°á»£c', 'thÆ°á»ng', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phucap`
--

CREATE TABLE `phucap` (
  `maPhuCap` int(11) NOT NULL,
  `tenLoaiPhuCap` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `soTien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phucap`
--

INSERT INTO `phucap` (`maPhuCap`, `tenLoaiPhuCap`, `soTien`) VALUES
(1, 'Äƒn trÆ°a', 200000),
(2, 'xÄƒng xe', 100000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `maTK` int(11) NOT NULL,
  `HovaTen` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenTaiKhoan` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`maTK`, `HovaTen`, `tenTaiKhoan`, `MatKhau`) VALUES
(1, 'HÆ°ng', 'yukiham', 123),
(2, 'NhÃ¢n viÃªn a', 'nhanviena', 1234);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinhluong`
--

CREATE TABLE `tinhluong` (
  `maTL` int(11) NOT NULL,
  `maNV` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tenBoPhan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tenChucVu` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soLuong` int(11) DEFAULT NULL,
  `soTien` int(11) DEFAULT NULL,
  `ngayCongChuan` int(11) DEFAULT NULL,
  `soNgayLam` int(11) DEFAULT NULL,
  `soNgayNghiKhongPhep` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tinhluong`
--

INSERT INTO `tinhluong` (`maTL`, `maNV`, `tenBoPhan`, `tenChucVu`, `soLuong`, `soTien`, `ngayCongChuan`, `soNgayLam`, `soNgayNghiKhongPhep`) VALUES
(1, '1', 'GiÃ¡m Ä‘á»‘c', 'GiÃ¡m Ä‘á»‘c', 35000000, 200000, 26, 25, 1),
(2, '2', 'Tester', 'NhÃ¢n viÃªn', 6000000, 0, 26, 25, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bangchamcong`
--
ALTER TABLE `bangchamcong`
  ADD PRIMARY KEY (`maChamCong`);

--
-- Chỉ mục cho bảng `baohiem`
--
ALTER TABLE `baohiem`
  ADD PRIMARY KEY (`maBH`);

--
-- Chỉ mục cho bảng `bophan`
--
ALTER TABLE `bophan`
  ADD PRIMARY KEY (`maBP`);

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`maChucVu`);

--
-- Chỉ mục cho bảng `luong`
--
ALTER TABLE `luong`
  ADD PRIMARY KEY (`maLuong`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`maNV`);

--
-- Chỉ mục cho bảng `phucap`
--
ALTER TABLE `phucap`
  ADD PRIMARY KEY (`maPhuCap`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`maTK`);

--
-- Chỉ mục cho bảng `tinhluong`
--
ALTER TABLE `tinhluong`
  ADD PRIMARY KEY (`maTL`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bangchamcong`
--
ALTER TABLE `bangchamcong`
  MODIFY `maChamCong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `baohiem`
--
ALTER TABLE `baohiem`
  MODIFY `maBH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `bophan`
--
ALTER TABLE `bophan`
  MODIFY `maBP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `maChucVu` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `luong`
--
ALTER TABLE `luong`
  MODIFY `maLuong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `maNV` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `phucap`
--
ALTER TABLE `phucap`
  MODIFY `maPhuCap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `maTK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tinhluong`
--
ALTER TABLE `tinhluong`
  MODIFY `maTL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
