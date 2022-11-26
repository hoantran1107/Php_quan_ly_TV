-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2021 at 04:29 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quan_li_thu_vien`
--

-- --------------------------------------------------------

--
-- Table structure for table `bao_cao`
--

CREATE TABLE `bao_cao` (
  `ma_bc` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_bc` date NOT NULL,
  `ma_nv` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nhan_vien`
--

CREATE TABLE `nhan_vien` (
  `ma_nv` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hoten_nv` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi_nv` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt_nv` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cmnd_nv` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioitinh_nv` tinyint(1) NOT NULL,
  `anh_nv` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_nv` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwd` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nhan_vien`
--

INSERT INTO `nhan_vien` (`ma_nv`, `hoten_nv`, `diachi_nv`, `sdt_nv`, `cmnd_nv`, `gioitinh_nv`, `anh_nv`, `email_nv`, `pwd`) VALUES
('001', 'Trần Lê Ánh Tuyết', 'Nha Trang, Khánh Hòa', '0234567876', '156234567897', 1, 'Admin_413.png', 'tuyet@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
('002', 'Trần Văn Tiến', 'Vạn Ninh, Khánh Hòa', '028765345', '152345678987', 0, 'Admin_179.png', 'tranvantien@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
('003', 'Nguyễn Thị Thắm', 'Ninh Hòa', '098638332', '224567894', 1, 'Admin_326.png', 'nhung.lthihong@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
('611', 'Lê Thị Hồng Nhung', 'Khánh Hòa', '0987622782', '225698817', 1, 'Admin_71.jpg', 'hongnhung14421@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `nha_xuat_ban`
--

CREATE TABLE `nha_xuat_ban` (
  `ma_nxb` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_nxb` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nha_xuat_ban`
--

INSERT INTO `nha_xuat_ban` (`ma_nxb`, `ten_nxb`) VALUES
('CT', 'Nhà xuất bản Công Thương'),
('DT', 'Nhà xuất bản Dân Trí'),
('HĐ', 'Nhà xuất bản Hồng Đức'),
('HNV', 'Nhà xuất bản Hội nhà văn'),
('KD', 'Nhà xuất bản Kim Đồng'),
('LD', 'Nhà xuất bản Lao Động'),
('NVH', 'Nhà xuất bản Văn Học'),
('NXBT', 'Nhà xuất bản Trẻ'),
('PN', 'Nhà xuất bản Phụ Nữ'),
('SP', 'Nhà xuất bản Đại học Sư Phạm'),
('TG', 'Nhà xuất bản Thế Giới'),
('TH', 'Nhà xuất bản Tổng hợp TP HCM'),
('TN', 'Nhà xuất bản Thanh Niên'),
('VH', 'NHÀ XUẤT BẢN VĂN HỌC'),
('VH-VN', 'Nhà xuất bản Văn hóa - Văn nghệ'),
('XBT', 'Thành viên Nhà xuất bản Trẻ');

-- --------------------------------------------------------

--
-- Table structure for table `phieu_muon`
--

CREATE TABLE `phieu_muon` (
  `ma_pm` int(11) NOT NULL,
  `ngay_muon` date NOT NULL,
  `soluong_muon` int(11) NOT NULL,
  `ma_sach` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_sv` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phieu_muon`
--

INSERT INTO `phieu_muon` (`ma_pm`, `ngay_muon`, `soluong_muon`, `ma_sach`, `ma_sv`, `active`) VALUES
(2, '2021-10-25', 1, 'ĐRPN', '003', 'Yes'),
(8, '2021-10-29', 1, 'NCH', '60678345', 'Yes'),
(11, '2021-10-29', 1, 'NCH', '63131063', 'Yes'),
(13, '2021-11-02', 1, 'BHTQ', '61456788', 'Yes'),
(17, '2021-11-05', 1, 'CBCX', '61123456', 'Yes'),
(20, '2021-11-05', 1, 'DMPL', '61123456', 'Yes'),
(21, '2021-11-05', 2, 'CCBH', '61123456', 'Yes'),
(22, '2021-11-05', 3, 'SD', '61123456', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `sach`
--

CREATE TABLE `sach` (
  `ma_sach` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_sach` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `sotrang` int(11) NOT NULL,
  `gia_sach` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namxb` int(11) NOT NULL,
  `ma_nxb` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_tl` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_tg` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinhtrang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tomtat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anh_sach` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sach`
--

INSERT INTO `sach` (`ma_sach`, `ten_sach`, `soluong`, `sotrang`, `gia_sach`, `namxb`, `ma_nxb`, `ma_tl`, `ma_tg`, `tinhtrang`, `tomtat`, `anh_sach`) VALUES
('5PDC', '5 Phút Dạy Con', 23, 183, '77000', 2020, 'PN', 'MB', 'LHJ', 'Còn mới', '“Cha mẹ là cha mẹ, không phải người hầu”.', 'Book_847.jpg'),
('BHTQ', 'Bà Huyện Thanh Quan', 13, 97, '145000', 2015, 'KD', 'VHTD', 'QC', 'Còn mới', 'Thơ văn và cuộc đời Bà Huyện Thanh Quan', 'Book_974.jpg'),
('CBCX', 'Cân bằng cảm xúc, cả lúc bão giông', 6, 336, '96000', 2020, 'TG', 'KNS', 'RN', 'Còn mới', 'Học được cách cân bằng cảm xúc không đơn giản', 'Book_504.jpg'),
('CCBH', 'Những chú chó bán hàng', 56, 356, '89700', 2018, 'NXBT', 'KT', 'BS', 'Còn mới', 'Làm bùng nổ thu nhập mà không cần tấn công', 'Book_876.jpg'),
('CPL', 'Những cuộc phiêu lưu của Tom Sawyer ', 12, 860, '120000', 2018, 'VH', 'TT', 'MK', 'Còn mới', 'Là những cuộc phiêu lưu của thanh thiếu niên', 'Book_100.jpg'),
('DMPL', 'Dế mèn phiêu lưu kí', 9, 37, '43000', 1941, 'KD', 'STN', 'TH', 'Còn mới', 'Là những trang văn mẫu mực của văn học thiếu nhi', 'Book_593.jpg'),
('ĐB', 'Đừng bán khi chưa được giá', 45, 296, '90000', 2019, 'CT', 'KT', 'JW', 'Còn mới', 'Là chiêu thức để tạo ra một công ty mà không cần tới bạn', 'Book_936.jpg'),
('ĐRPN', 'Đất rừng phương nam', 2, 304, '80000', 1957, 'KD', 'STN', 'ĐG', 'Còn mới', 'Những trang sách sinh động và chân thực về thiên nhiên và con người nơi đây', 'Book_586.jpg'),
('HD', 'Vũ trụ trong vỏ hạt dẻ', 4, 254, '77000', 2018, 'NXBT', 'STH', 'STE', 'Còn mới', 'Lòng khát khao khám phá luôn là động lực cho trí sáng tạo ', 'Book_635.jpg'),
('LPT', 'Thơ ngụ ngôn La Fontaine', 32, 75, '54000', 2017, 'TG', 'THO', 'LPT', 'Hơi cũ', 'Ngôn ngữ dịch linh hoạt những ngụ ngôn của La Fontaine', 'Book_205.jpg'),
('MDHA', 'Chuyện con mèo dạy hải âu bay', 20, 144, '50000', 2019, 'HNV', 'STN', 'LS', 'Còn mới', 'Kiệt tác dành cho thiếu nhi trên toàn thế giới', 'Book_417.jpg'),
('MKNS', 'Muôn kiếp nhân sinh', 5, 408, '145000', 2020, 'XBT', 'TG-TL', 'NP', 'Còn sách', 'Triết lý nhân sinh, tác phẩm thiên về triết lý và đạo lý', 'Book_852.jpg'),
('NCH', 'Ngàn cánh hạc', 34, 292, '82000', 2021, 'HĐ', 'TT', 'KY', 'Còn mới', 'Thế giới ngôn ngữ hình ảnh đa cảm của Kawabata Yasunari', 'Book_851.jpg'),
('NCKP', 'Nuôi con không phải là cuộc chiến', 50, 76, '86000', 2018, 'LD', 'MB', 'HL', 'Còn mới', 'Là kinh nghiệm đặt hợp lý cho từng lứa tuổi', 'Book_795.jpg'),
('NVVX', 'Nẻo vào văn xuôi đương đại Việt Nam', 10, 245, '390000', 2017, 'VH', 'TLPB', 'BNH', 'Vẫn còn mới', 'Một cuốn sách nên đọc, tác phẩm có luận về đạo lý', 'Book_874.jpg'),
('SD', 'Vang bóng một thời', 4, 212, '75000', 2007, 'XBT', 'TB', 'NT', 'Hơi cũ', 'Một trong những tùy bút đặc sắc của Nguyễn Tuân', 'Book_743.jpg'),
('SL', 'Sherlock Holmes', 2, 234, '230000', 2018, 'VH', 'TT', 'CD', 'Vẫn còn mới', 'Một tựa sách kinh điển, là cuốn sách gối đầu nổi tiếng', 'Book_211.jpg'),
('TBT', 'Tảng băng tan', 12, 188, '140000', 2020, 'HĐ', 'KNS', 'JK', 'Còn sách', 'Là cuốn sách hay về tư duy và kỹ năng sống', 'Book_295.jpg'),
('TD', 'Tắt đèn', 15, 97, '56000', 2006, 'VH', 'VHTD', 'NTT', 'Còn mới', 'Tuyển tập \"Danh tác Việt Nam\", là một tác phẩm \"động\" tiêu biểu', 'Book_695.jpg'),
('TDVN', 'Con đường giải mã VH trung đại VN', 2, 796, '350000', 2021, 'SP', 'TLPB', 'NDN', 'Còn mới', 'Bao quát Văn học trung đại Việt Nam, giải mã văn học trung đại', 'Book_83.jpg'),
('THCM', 'Thơ Hồ Chí Minh', 45, 35, '25000', 2012, 'XBT', 'THO', 'HCM', 'Đã hơi cũ', 'Tuyển tập các bài thơ của Hồ Chí Minh, bài thơ bát ngát tình', 'Book_109.jfif'),
('TK', 'Bản thiết kế vĩ đại', 7, 196, '56000', 2018, 'NXBT', 'STH', 'STEP', 'Còn mới', ' chuyện \"Bí ẩn của kiếp nhân sinh\", câu hỏi về tồn tại', 'Book_746.jpg'),
('TNNCH', 'Truyện ngắn Nguyễn Công Hoan', 23, 149, '24500', 2019, 'KD', 'TN', 'NCH', 'Có một số cuốn đã cũ', 'Tuyển tập một số truyện ngắn  của Nguyễn Công Hoan', 'Book_460.jpg'),
('TTHCM', 'Tuyển tập thơ văn Hồ Chí Minh', 10, 123, '123000', 2012, 'XBT', 'VHDD', 'HCM', 'Còn mới', 'Tuyển tập thơ văn Hồ Chí Minh, nhà cách mạng của dân tộc', 'Book_257.jpg'),
('VA', 'Việt Án', 45, 480, '124000', 2018, 'TH', 'LS', 'TDB', 'Còn mới', 'Việt Án Lần Theo Trang Sử Cũ, tác giả Trần Đình Ba', 'Book_710.jpg'),
('VCTR', 'Văn chương tan rã', 34, 237, '345890', 2020, 'XBT', 'TLPB', 'IS', 'Vẫn còn mới', 'Một cuốn sách phê bình đáng đọc, luận về văn chương, đạo lý', 'Book_216.jpg'),
('VNSL', 'Việt Nam Sử Lược', 70, 700, '670000', 2017, 'DT', 'LS', 'TTK', 'Còn mới', 'Tóm lược lịch sử một cách sáng suốt, công bằng', 'Book_457.jpg'),
('VT', 'Tìm hiểu về: Vũ trụ', 6, 123, '105000', 2020, 'PN', 'STH', 'IG', 'Còn mới', 'Là những kiến thức thú vị về vũ trụ', 'Book_296.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sinh_vien`
--

CREATE TABLE `sinh_vien` (
  `ma_sv` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hoten_sv` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioitinh_sv` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaysinh_sv` date NOT NULL,
  `diachi_sv` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `khoa` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwd_sv` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sinh_vien`
--

INSERT INTO `sinh_vien` (`ma_sv`, `hoten_sv`, `gioitinh_sv`, `ngaysinh_sv`, `diachi_sv`, `khoa`, `email`, `pwd_sv`) VALUES
('003', 'Trịnh Văn Toàn', 'Nam', '2000-03-04', 'Nha Trang, Khánh Hòa', 'Kĩ Thuật Giao Thông', 'toan@gmail.com', ''),
('004', 'Lý Văn Lịch', 'Nam', '2000-03-03', 'Đà Nẵng', 'KTTC', 'tranvantien@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
('60123123', 'Nguyễn Văn Am', 'Nam', '2000-01-01', 'Khánh Hòa', 'Cơ khí', '', '81dc9bdb52d04dc20036dbd8313ed055'),
('60200200', 'Nguyễn Văn Chuẩn', 'Nam', '2000-05-05', 'Hà Nội', 'Cơ Khí', 'chuan@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
('60678345', 'Trần Thị Mai Hạ', 'Nữ', '2000-12-03', 'Đà Nẵng', 'Kỹ thuật giao thông', 'nhung.lthihong@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
('61123456', 'Lê Thị Kiều Mai', 'Nữ', '2001-10-10', 'Hà Nội', 'Kinh tế', 'kieumai@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
('61232123', 'Nguyễn Như Ngọc', 'Nữ', '2001-02-04', 'Khánh Hòa', 'NTTS', 'nhungocnguyen@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
('61456788', 'Hồ Anh Nam', 'Nam', '2001-01-01', 'Khánh Hòa', 'CNTT', 'anhnam.ho1666@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
('62131062', 'Lê Thị Xuân Đào', 'Nữ', '2002-03-20', 'Khánh Hòa', 'Kinh tế', 'daolethi@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
('62133345', 'Nguyễn Thị Tuyết Mai', 'Nữ', '2002-08-05', 'Bình Định', 'Luật', 'tuyetmainguyen@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
('62321234', 'Nguyễn Quốc Đạt', 'Nam', '2002-05-14', 'Khánh Hòa', 'Xây Dựng', 'datnguyenquoc@gmail.com', '6562c5c1f33db6e05a082a88cddab5ea'),
('62345678', 'Trần Thị Trúc Đào', 'Nữ', '2002-02-04', 'Vạn Ninh', 'Kế toán-Tài chính', '', '81dc9bdb52d04dc20036dbd8313ed055'),
('63040123', 'Trần Đình Trọng', 'Nam', '2003-06-09', 'Phú Yên', 'Cơ khí', 'trongtran@gmail.com', '674f3c2c1a8a6f90461e8a66fb5550ba'),
('63110455', 'Huỳnh Thị Kiều My', 'Nữ', '2003-01-22', 'Bình Thuận', 'Luật', 'kieumyhuynh@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
('63121045', 'Trịnh Thúc Loan', 'Nữ', '2003-10-21', 'Bắc Giang', 'CNTP', 'thucloantrinh@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
('63130045', 'Nguyễn Thị Kim Anh', 'Nữ', '2003-08-25', 'Khánh Hòa', 'Kinh tế', 'kimanhnguyenthi@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
('63131063', 'Lê Thị Hồng Phước', 'Nữ', '2003-04-27', 'Khánh Hòa', 'Kinh tế', 'hongphuocle.vn@gmail.com', 'd964173dc44da83eeafa3aebbee9a1a0');

-- --------------------------------------------------------

--
-- Table structure for table `tac_gia`
--

CREATE TABLE `tac_gia` (
  `ma_tg` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_tg` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tac_gia`
--

INSERT INTO `tac_gia` (`ma_tg`, `ten_tg`) VALUES
('BNH', 'Bùi Như Hải'),
('BS', 'Blair Singer'),
('CD', 'Sir Arthur Conan Doyle'),
('ĐG', 'Đoàn Giỏi'),
('HCM', 'Hồ Chí Minh'),
('HL', ' Hachun Lyonnet'),
('IG', 'Ian Graham'),
('IS', 'Inrasara'),
('JK', 'John Kotter'),
('JW', 'John Warrillow'),
('KY', 'Kawabata Yasunari'),
('LHJ', 'Liat Hughes Joshi '),
('LPT', 'La Fontaine'),
('LS', 'Luis Sepúlveda '),
('MK', 'Mark Twain'),
('NC', 'Nam Cao'),
('NCH', 'Nguyễn Công Hoan'),
('NDN', 'Nguyễn Đăng Na'),
('NK', 'Nguyễn Khuyến'),
('NP', 'Nguyên Phong'),
('NT', 'Nguyễn Tuân'),
('NTT', 'Ngô Tất Tố'),
('QC', 'Quỳnh Cư'),
('RN', ' Richard Nicholls'),
('STE', 'Stephen Hawking'),
('STEP', 'Leonard Mlodinow, Stephen Hawking'),
('TDB', 'Trần Đình Ba'),
('TH', 'Tô Hoài'),
('TTK', 'Trần Trọng Kim ');

-- --------------------------------------------------------

--
-- Table structure for table `the_loai`
--

CREATE TABLE `the_loai` (
  `ma_tl` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_tl` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anh_tl` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `the_loai`
--

INSERT INTO `the_loai` (`ma_tl`, `ten_tl`, `anh_tl`) VALUES
('KNS', 'Kỹ năng sống', 'Category_222.jpg'),
('KT', 'Kinh tế', 'Category_84.jpg'),
('LS', 'Lịch sử', 'Category_849.jpg'),
('MB', 'Bà mẹ - em bé', 'Category_251.jpg'),
('STH', 'Sách kiến thức tổng hợp', 'Category_346.jpg'),
('STN', 'Thiếu Nhi', 'Category_381.jpg'),
('TB', 'Tùy bút', 'Category_406.jpg'),
('TG-TL', 'Tôn giáo - Tâm linh', 'Category_465.jpg'),
('THO', 'Thơ', 'Category_393.jpg'),
('TLPB', 'Tiểu luận - Phê bình', 'Category_383.jpg'),
('TN', 'Truyện ngắn', 'Category_580.jpg'),
('TT', 'Tiểu thuyết', 'Category_655.jpg'),
('VHDD', 'Văn học đương đại', 'Category_233.jpg'),
('VHTD', 'Văn học trung đại', 'Category_335.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `the_thu_vien`
--

CREATE TABLE `the_thu_vien` (
  `ma_the` int(11) NOT NULL,
  `thoigiancap` date NOT NULL,
  `hsd` int(11) NOT NULL,
  `ma_sv` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `the_thu_vien`
--

INSERT INTO `the_thu_vien` (`ma_the`, `thoigiancap`, `hsd`, `ma_sv`, `active`) VALUES
(2, '2021-10-29', 3, '004', 'No'),
(3, '2021-10-29', 3, '61123456', 'No'),
(4, '2021-06-29', 3, '60678345', 'Yes'),
(8, '2021-10-29', 3, '63131063', 'Yes'),
(9, '2021-11-02', 3, '61456788', 'Yes'),
(10, '2021-11-03', 12, '61123456', 'Yes'),
(11, '2021-11-05', 3, '60200200', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bao_cao`
--
ALTER TABLE `bao_cao`
  ADD PRIMARY KEY (`ma_bc`),
  ADD KEY `ma_nv` (`ma_nv`);

--
-- Indexes for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD PRIMARY KEY (`ma_nv`);

--
-- Indexes for table `nha_xuat_ban`
--
ALTER TABLE `nha_xuat_ban`
  ADD PRIMARY KEY (`ma_nxb`);

--
-- Indexes for table `phieu_muon`
--
ALTER TABLE `phieu_muon`
  ADD PRIMARY KEY (`ma_pm`),
  ADD KEY `ma_sach` (`ma_sach`),
  ADD KEY `ma_sv` (`ma_sv`);

--
-- Indexes for table `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`ma_sach`),
  ADD KEY `ma_nxb` (`ma_nxb`),
  ADD KEY `ma_tl` (`ma_tl`),
  ADD KEY `ma_tg` (`ma_tg`);

--
-- Indexes for table `sinh_vien`
--
ALTER TABLE `sinh_vien`
  ADD PRIMARY KEY (`ma_sv`);

--
-- Indexes for table `tac_gia`
--
ALTER TABLE `tac_gia`
  ADD PRIMARY KEY (`ma_tg`);

--
-- Indexes for table `the_loai`
--
ALTER TABLE `the_loai`
  ADD PRIMARY KEY (`ma_tl`);

--
-- Indexes for table `the_thu_vien`
--
ALTER TABLE `the_thu_vien`
  ADD PRIMARY KEY (`ma_the`),
  ADD KEY `ma_sv` (`ma_sv`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `phieu_muon`
--
ALTER TABLE `phieu_muon`
  MODIFY `ma_pm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `the_thu_vien`
--
ALTER TABLE `the_thu_vien`
  MODIFY `ma_the` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bao_cao`
--
ALTER TABLE `bao_cao`
  ADD CONSTRAINT `bao_cao_ibfk_1` FOREIGN KEY (`ma_nv`) REFERENCES `nhan_vien` (`ma_nv`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `phieu_muon`
--
ALTER TABLE `phieu_muon`
  ADD CONSTRAINT `phieu_muon_ibfk_1` FOREIGN KEY (`ma_sach`) REFERENCES `sach` (`ma_sach`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `phieu_muon_ibfk_2` FOREIGN KEY (`ma_sv`) REFERENCES `sinh_vien` (`ma_sv`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `sach`
--
ALTER TABLE `sach`
  ADD CONSTRAINT `sach_ibfk_1` FOREIGN KEY (`ma_nxb`) REFERENCES `nha_xuat_ban` (`ma_nxb`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `sach_ibfk_2` FOREIGN KEY (`ma_tg`) REFERENCES `tac_gia` (`ma_tg`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `sach_ibfk_3` FOREIGN KEY (`ma_tl`) REFERENCES `the_loai` (`ma_tl`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `the_thu_vien`
--
ALTER TABLE `the_thu_vien`
  ADD CONSTRAINT `the_thu_vien_ibfk_1` FOREIGN KEY (`ma_sv`) REFERENCES `sinh_vien` (`ma_sv`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
