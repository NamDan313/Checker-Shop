-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2021 at 09:59 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dct119c2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `userAD` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `passAD` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userAD`, `passAD`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `maDon` int(30) NOT NULL,
  `maSP` int(30) NOT NULL,
  `userKH` varchar(64) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `hinhanh` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `diachinhan` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `maDon` int(30) NOT NULL,
  `giaDon` int(30) NOT NULL,
  `soluongMua` int(30) NOT NULL,
  `tinhtrang` varchar(64) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ngaydat` date NOT NULL,
  `userKH` varchar(64) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `diachinhan` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`maDon`, `giaDon`, `soluongMua`, `tinhtrang`, `ngaydat`, `userKH`, `diachinhan`) VALUES
(1, 4890, 2, 'Chua xu ly', '2021-05-18', 'ha', '48BTX'),
(2, 4554, 4, 'da xu ly', '2020-08-05', 'fhfhgfh', 'fhfh'),
(3, 6767, 7, 'chua xu ly', '2020-08-19', 'gsdgsdgsdgsd', '48BTX');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `userKH` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `passKH` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `sdt` varchar(15) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `hoTen` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`userKH`, `passKH`, `sdt`, `hoTen`) VALUES
('ha', '123', '0939635455', 'le nguyen');

-- --------------------------------------------------------

--
-- Table structure for table `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `maloaiSP` int(30) NOT NULL,
  `loaiSP` varchar(64) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `loaisanpham`
--

INSERT INTO `loaisanpham` (`maloaiSP`, `loaiSP`) VALUES
(1, 'tee'),
(2, 'jacket');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `maSP` int(30) NOT NULL,
  `maloaiSP` int(11) NOT NULL,
  `thongtinSP` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `tenSP` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `giaSP` int(11) NOT NULL,
  `hinhanhSP` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `soluongtonkho` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`maSP`, `maloaiSP`, `thongtinSP`, `tenSP`, `giaSP`, `hinhanhSP`, `soluongtonkho`) VALUES
(1, 1, '', 'tee1 summer', 39, '1.1.jpg', 20),
(64, 1, '', 'tee2 winter', 49, '21.1.jpg', 0),
(65, 1, 'Fresh', 'tee3 autumn', 39, '20.1.jpg', 1),
(66, 1, '', 'tee4 spring', 29, '17.1.jpg', 21),
(67, 2, 'Comfortable', 'jacket1 sping', 99, 'jk1.jpg', 50),
(68, 2, '', 'jacket2 autumn', 89, 'jk2.jpg', 50),
(69, 2, '', 'jacket3 winter', 129, 'jk3.jpg', 40),
(70, 2, 'Adorable', 'jacket4 spring', 109, 'jk4.jpg', 59),
(71, 1, 'Beatiful', 'tee5 spring', 35, '4.1.jpg', 50),
(72, 2, '', 'jacket5 winter', 119, 'jk5.jpg', 30),
(73, 1, '', 'tee6 autumn', 69, '7.1.jpg', 30),
(74, 1, 'Cute', 'tee7 summer', 49, '22.1.jpg', 40),
(75, 2, 'Relaxing', 'jacket6 summer', 99, 'jk6.jpg', 40),
(76, 2, '', 'jacket7 autumn', 89, 'jk7.jpg', 60),
(77, 1, 'Catchy', 'tee8 spring', 79, '23.1.jpg', 20),
(78, 2, '', 'jacket8 winter', 159, 'jk8.jpg', 40),
(79, 1, '', 'tee9 summer', 59, '15.1.jpg', 36),
(80, 1, 'Beatiful', 'tee10 summer', 39, '12.1.jpg', 45),
(81, 2, 'Comfortable', 'jacket9 spring', 89, 'jk9.jpg', 40),
(82, 1, '', 'tee11 autumn', 59, '13.1.jpg', 40),
(83, 2, '', 'jacket10 spring', 109, 'jk10.jpg', 20),
(84, 1, '', 'tee12 spring', 79, '14.1.jpg', 50),
(85, 1, '', 'tee12 winter', 39, 'jk2.jpg', 50),
(86, 1, 'Nice', 'tee13 spring', 59, '5.1.jpg', 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`userAD`);

--
-- Indexes for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`maDon`,`maSP`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`maDon`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`userKH`);

--
-- Indexes for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`maloaiSP`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`maSP`),
  ADD KEY `FK_loaisp` (`maloaiSP`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `maDon` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `maSP` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FK_loaisp` FOREIGN KEY (`maloaiSP`) REFERENCES `loaisanpham` (`maloaiSP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
