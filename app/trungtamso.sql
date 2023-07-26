-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th7 26, 2023 lúc 04:02 AM
-- Phiên bản máy phục vụ: 5.7.40
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `trungtamso`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `file`
--

DROP TABLE IF EXISTS `file`;
CREATE TABLE IF NOT EXISTS `file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duong_dan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_hop_dong` int(11) NOT NULL,
  `daxoa` int(11) DEFAULT NULL,
  `gio` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_hop_dong_file` (`id_hop_dong`)
) ENGINE=MyISAM AUTO_INCREMENT=161 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `file`
--

INSERT INTO `file` (`id`, `ten`, `duong_dan`, `id_hop_dong`, `daxoa`, `gio`) VALUES
(147, '', '\\JobDnict\\php_project\\app\\Modules\\quanLyHopDong\\Public\\saveFile\\', 55, 0, '02:09:28'),
(146, 'screencapture-quickref-me-chatgpt-2023-04-13-12_14_43.pdf', '\\JobDnict\\php_project\\app\\Modules\\quanLyHopDong\\Public\\saveFile\\screencapture-quickref-me-chatgpt-2023-04-13-12_14_43.pdf', 12, 0, '02:08:55'),
(145, 'QUY TRÌNH LÀM REUP LIVE TIKTOK.docx', '\\JobDnict\\php_project\\app\\Modules\\quanLyHopDong\\Public\\saveFile\\QUY TRÌNH LÀM REUP LIVE TIKTOK.docx', 12, 0, '02:08:55'),
(144, 'PHP-Review.pdf', '\\JobDnict\\php_project\\app\\Modules\\quanLyHopDong\\Public\\saveFile\\PHP-Review.pdf', 12, 0, '02:08:55'),
(142, 'PHP-Review.pdf', '\\JobDnict\\php_project\\app\\Modules\\quanLyHopDong\\Public\\saveFile\\PHP-Review.pdf', 53, 0, '00:58:09'),
(143, 'QUY TRÌNH LÀM REUP LIVE TIKTOK.docx', '\\JobDnict\\php_project\\app\\Modules\\quanLyHopDong\\Public\\saveFile\\QUY TRÌNH LÀM REUP LIVE TIKTOK.docx', 53, 0, '00:58:09'),
(141, 'NguyenVanThanh_Apply-for-PHP-1-1.docx', '\\JobDnict\\php_project\\app\\Modules\\quanLyHopDong\\Public\\saveFile\\NguyenVanThanh_Apply-for-PHP-1-1.docx', 53, 0, '00:58:09'),
(140, 'NguyenVanThanh_Apply-for-PHP-1-1.docx', '\\JobDnict\\php_project\\app\\Modules\\quanLyHopDong\\Public\\saveFile\\NguyenVanThanh_Apply-for-PHP-1-1.docx', 53, 0, '00:23:27'),
(139, 'NguyenVanThanh_Apply-for-PHP-1.docx', '\\JobDnict\\php_project\\app\\Modules\\quanLyHopDong\\Public\\saveFile\\NguyenVanThanh_Apply-for-PHP-1.docx', 53, 0, '00:23:27'),
(148, '', '\\JobDnict\\php_project\\app\\Modules\\quanLyHopDong\\Public\\saveFile\\', 56, 0, '02:18:28'),
(149, '', '\\JobDnict\\php_project\\app\\Modules\\quanLyHopDong\\Public\\saveFile\\', 57, 0, '02:23:09'),
(150, 'NguyenVanThanh_Apply-for-PHP.pdf', '\\JobDnict\\php_project\\app\\Modules\\quanLyHopDong\\Public\\saveFile\\NguyenVanThanh_Apply-for-PHP.pdf', 58, 0, '00:22:35'),
(151, 'NguyenVanThanh_Apply-for-PHP-1.docx', '\\JobDnict\\php_project\\app\\Modules\\quanLyHopDong\\Public\\saveFile\\NguyenVanThanh_Apply-for-PHP-1.docx', 58, 0, '00:22:35'),
(152, 'NguyenVanThanh_Apply-for-PHP-1-1.docx', '\\JobDnict\\php_project\\app\\Modules\\quanLyHopDong\\Public\\saveFile\\NguyenVanThanh_Apply-for-PHP-1-1.docx', 58, 0, '00:22:35'),
(153, 'PHP-Review.pdf', '\\JobDnict\\php_project\\app\\Modules\\quanLyHopDong\\Public\\saveFile\\PHP-Review.pdf', 58, 0, '00:22:35'),
(154, '', '\\JobDnict\\php_project\\app\\Modules\\quanLyHopDong\\Public\\saveFile\\', 59, 0, '09:56:30'),
(155, 'NguyenVanThanh_Apply-for-PHP-1.docx', '\\JobDnict\\php_project\\app\\Modules\\quanLyHopDong\\Public\\saveFile\\NguyenVanThanh_Apply-for-PHP-1.docx', 59, 0, '10:06:42'),
(156, 'NguyenVanThanh_Apply-for-PHP-1-1.docx', '\\JobDnict\\php_project\\app\\Modules\\quanLyHopDong\\Public\\saveFile\\NguyenVanThanh_Apply-for-PHP-1-1.docx', 59, 1, '10:06:42'),
(157, 'PHP-Review.pdf', '\\JobDnict\\php_project\\app\\Modules\\quanLyHopDong\\Public\\saveFile\\PHP-Review.pdf', 59, 1, '10:06:42'),
(158, 'NguyenVanThanh_Apply-for-PHP.pdf', '\\JobDnict\\php_project\\app\\Modules\\quanLyHopDong\\Public\\saveFile\\NguyenVanThanh_Apply-for-PHP.pdf', 60, 0, '10:19:18'),
(159, 'NguyenVanThanh_Apply-for-PHP-1.docx', '\\JobDnict\\php_project\\app\\Modules\\quanLyHopDong\\Public\\saveFile\\NguyenVanThanh_Apply-for-PHP-1.docx', 60, 0, '10:19:18'),
(160, 'NguyenVanThanh_Apply-for-PHP-1-1.docx', '\\JobDnict\\php_project\\app\\Modules\\quanLyHopDong\\Public\\saveFile\\NguyenVanThanh_Apply-for-PHP-1-1.docx', 60, 0, '10:19:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hop_dong`
--

DROP TABLE IF EXISTS `hop_dong`;
CREATE TABLE IF NOT EXISTS `hop_dong` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten_hop_dong` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_hop_dong` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngay_ky` date DEFAULT NULL,
  `khach_hang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kinh_phi` int(11) DEFAULT NULL,
  `thoi_gian_thuc_hien` int(11) DEFAULT NULL,
  `ngay_ket_thuc` date DEFAULT NULL,
  `trang_thai` int(11) DEFAULT NULL,
  `daxoa` int(11) DEFAULT NULL,
  `id_phong_ban` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_hopdong_phongban` (`id_phong_ban`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hop_dong`
--

INSERT INTO `hop_dong` (`id`, `ten_hop_dong`, `so_hop_dong`, `ngay_ky`, `khach_hang`, `kinh_phi`, `thoi_gian_thuc_hien`, `ngay_ket_thuc`, `trang_thai`, `daxoa`, `id_phong_ban`) VALUES
(60, 'aaaaaaaaaa', 'aaaaaaaaaaaaa', '2023-07-12', 'aaaaaaaaaaaaaaaaa', 1111111, 19, '2023-07-31', 2, 0, 9),
(12, 'Hop dong 66', 'HD006', '2023-07-06', 'Khách hàng 61', 25000000, 194, '2023-09-25', 1, 0, 6),
(11, 'HD005', 'HD005', '2023-07-05', 'Khách hàng 52', 12000000, 175, '2023-07-10', 2, 0, 5),
(10, 'Hop dong 43', 'HD004', '2023-07-04', 'Khách hàng 44', 18000000, 234, '2023-10-02', 1, 0, 4),
(9, 'Hop dong 32', 'HD003', '2023-07-03', 'Khách hàng 31', 15000000, 283, '2023-08-17', 3, 0, 3),
(8, 'Hop dong 25', 'HD002', '2023-07-02', 'Khách hàng 22', 20000000, 351, '2023-09-01', 1, 0, 2),
(7, 'Hop dong 12', 'HD0012', '2023-07-01', 'Khách hàng 12', 10000000, 245, '2023-07-31', 2, 0, 1),
(6, 'Hop dong 6', 'HD006', '2023-07-06', 'Khách hàng 6', 25000000, 115, '2023-09-25', 1, 0, 6),
(5, 'Hop dong 5', 'HD005', '2023-07-05', 'Khách hàng 5', 12000000, 78, '2023-07-10', 2, 0, 5),
(4, 'Hop dong 4', 'HD004', '2023-07-04', 'Khách hàng 4', 18000000, 290, '2023-10-02', 1, 0, 4),
(1, 'Hop dong 1', 'HD001', '2023-07-01', 'Khách hàng 1', 10000000, 250, '2023-07-10', 1, 0, 1),
(51, 'AHDQL01', 'HDQL01', '2023-07-14', 'thanh', 2000000, 323, '2023-07-31', 1, 0, 5),
(59, 'ssssssssssss', 'ssssssssssssssssssssssssssssssss', '2023-07-11', 'sssssssssssssssss', 1111111111, 16, '2023-07-27', 2, 0, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `linh_vuc`
--

DROP TABLE IF EXISTS `linh_vuc`;
CREATE TABLE IF NOT EXISTS `linh_vuc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten_linh_vuc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag_delete` int(11) DEFAULT '1',
  `ma_linh_vuc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trang_thai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `linh_vuc`
--

INSERT INTO `linh_vuc` (`id`, `ten_linh_vuc`, `flag_delete`, `ma_linh_vuc`, `trang_thai`) VALUES
(1, 'Phát triển phần mềm 2', 1, 'ptpm 2', 'Active'),
(2, 'Marketing số', 1, 'ms', 'Active'),
(3, 'Thiết kế đồ họa', 1, 'tkdh', 'Active'),
(4, 'Dịch vụ tài chính', 1, 'dvtc', 'Active'),
(5, 'Chăm sóc sức khỏe', 1, 'cssk', 'Active'),
(6, 'Thương mại điện tử', 1, 'tmdt', 'Active'),
(7, 'Giáo dục', 1, 'gd', 'Active'),
(8, 'Lữ hành', 1, 'lh', 'Active'),
(9, 'Ô tô', 1, 'ot', 'Active'),
(10, 'Thời trang', 1, 'tt', 'Active');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhan_vien`
--

DROP TABLE IF EXISTS `nhan_vien`;
CREATE TABLE IF NOT EXISTS `nhan_vien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten_nhan_vien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tuoi` int(11) DEFAULT NULL,
  `gioi_tinh` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dia_chi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngay_vao_lam` date DEFAULT NULL,
  `luong` decimal(10,0) DEFAULT NULL,
  `flag_delete` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhan_vien`
--

INSERT INTO `nhan_vien` (`id`, `ten_nhan_vien`, `tuoi`, `gioi_tinh`, `dia_chi`, `ngay_vao_lam`, `luong`, `flag_delete`) VALUES
(1, 'Nguyễn Văn A', 20, 'Nam', 'Đà Nẵng', '2022-01-01', '15000000', 0),
(2, 'Trần Thị B', 25, 'Nữ', 'Hồ Chí Minh', '2022-02-15', '12000000', 0),
(3, 'Lê Văn C', 30, 'Nam', 'Đà Nẵng', '2022-03-10', '13500000', 1),
(4, 'Phạm Thị D', 32, 'Nữ', 'Hải Phòng', '2022-04-20', '16000000', 1),
(5, 'Hoàng Văn E', 27, 'Nam', 'Bình Dương', '2022-05-05', '12500000', 1),
(6, 'Vũ Thị F', 29, 'Nữ', 'Hưng Yên', '2022-06-12', '14000000', 1),
(7, 'Đặng Văn G', 31, 'Nam', 'Hà Tĩnh', '2022-07-18', '15500000', 1),
(8, 'Mai Thị H', 26, 'Nữ', 'Quảng Ninh', '2022-08-25', '13000000', 1),
(9, 'Ngô Văn I', 33, 'Nam', 'Thanh Hóa', '2022-09-30', '14500000', 1),
(10, 'Trịnh Thị K', 24, 'Nữ', 'Nghệ An', '2022-10-07', '11000000', 1),
(11, 'Lương Văn L', 30, 'Nam', 'Hải Dương', '2022-11-15', '12500000', 1),
(12, 'Phan Thị M', 28, 'Nữ', 'Vĩnh Phúc', '2022-12-22', '14000000', 1),
(13, 'Bùi Văn N', 32, 'Nam', 'Quảng Bình', '2023-01-05', '15500000', 1),
(14, 'Hồ Thị P', 27, 'Nữ', 'Hà Nam', '2023-02-10', '13000000', 1),
(15, 'Trần Văn Q', 29, 'Nam', 'Thái Bình', '2023-03-18', '14500000', 1),
(16, 'Lê Thị R', 26, 'Nữ', 'Ninh Bình', '2023-04-25', '12000000', 1),
(17, 'Phùng Thị T', 24, 'Nữ', 'Hòa Bình', '2023-06-10', '15000000', 1),
(18, 'Đỗ Văn U', 33, 'Nam', 'Hà Giang', '2023-07-17', '12500000', 1),
(19, 'Tạ Thị V', 28, 'Nữ', 'Cao Bằng', '2023-08-24', '14000000', 0),
(20, 'new', 21, 'Nữ', 'đà nẵng', '2022-02-02', '19000000', 0),
(21, 'ddddd', 23, 'Nữ', 'dsasdasdasd', '2022-12-12', '20000000', 1),
(22, 'aaa', 21, 'Nam', 'đâsdasda', '2023-12-12', '20000000', 1),
(23, 'dddddádasd', 22, 'on', 'dsasdasdasd', '2023-12-12', '15000000', 1),
(24, 'ĐSDSD', 22, 'Nam', '2D SÁDAS', '2023-12-12', '12300000', 0),
(25, 'dddddddddddd', 23, 'Nam', 'dasdasdasdas', '2023-12-12', '12000000', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong_ban`
--

DROP TABLE IF EXISTS `phong_ban`;
CREATE TABLE IF NOT EXISTS `phong_ban` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten_phong` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ma_phong` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sap_xep` int(11) DEFAULT NULL,
  `da_xoa` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phong_ban`
--

INSERT INTO `phong_ban` (`id`, `ten_phong`, `ma_phong`, `sap_xep`, `da_xoa`) VALUES
(1, 'Ban Giám đốc', 'BGD1', 1, 0),
(2, 'Phòng Kế Hoạch Quản Trị', 'PKHQT', 1, 0),
(3, 'Phòng PTPM 1', 'PPTPM1', 1, 0),
(4, 'Phòng PTPM 2', 'PPTPM2', 1, 0),
(5, 'Phòng Nghiên Cứu Tư Vấn', 'PNCTV', 1, 0),
(6, 'Phòng Vận Hành', 'PVH', 1, 0),
(8, 'd', 'dsd', 1, 0),
(9, 'a', 'a', 1, 0),
(10, 'd', 's', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag_delete` tinyint(1) DEFAULT NULL,
  `id_linh_vuc` int(11) DEFAULT NULL,
  `button` tinytext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `description`, `flag_delete`, `id_linh_vuc`, `button`) VALUES
(1, 'admin', 'Chức vụ quản trị viên có quyền truy cập và quản lý toàn bộ hệ thống.', 1, 13, '0'),
(2, 'manager ptpm2', 'Chức vụ quản lý có quyền quản lý các nguồn lực và nhân viên.', 1, 1, '4'),
(3, 'user', 'Chức vụ người dùng có quyền truy cập và sử dụng các chức năng cơ bản của hệ thống.', 1, 100, NULL),
(4, 'manager lh', 'Cho phép thêm thông tin về lữ hành mới vào cơ sở dữ liệu, bao gồm các chi tiết như tên lữ hành, mô tả, thời gian diễn ra, địa điểm,', 1, 8, '1,2,4'),
(5, 'manager ot', 'Cho phép thêm thông tin về chiếc oto mới vào cơ sở dữ liệu, bao gồm các chi tiết như hãng sản xuất, mẫu xe, năm sản xuất, màu sắc, v.v.', 1, 9, NULL),
(6, 'manager tt', 'Cho phép thêm thông tin về mặt hàng thời trang mới vào cơ sở dữ liệu, bao gồm các chi tiết như tên mặt hàng, kiểu dáng, màu sắc, kích cỡ, v.v.', 1, 10, '2,3,4'),
(7, 'manager tkdh', 'Cho phép thêm thông tin về người tham gia thiết kế đồ họa mới vào cơ sở dữ liệu.', 1, 3, NULL),
(16, 'new', '', 1, 100, '4'),
(19, 'zzzzzzzzzzzzzzzz', 'zzzzzzzzzzzzzzzzzzzzzzz', 1, 1, '2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sidebar`
--

DROP TABLE IF EXISTS `sidebar`;
CREATE TABLE IF NOT EXISTS `sidebar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chucNangTitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sidebar`
--

INSERT INTO `sidebar` (`id`, `name`, `view`, `path`, `redirect`, `role`, `icon`, `chucNangTitle`, `parent_id`) VALUES
(1, 'admin', 'Views/site/auth/login.php', '/admin', '/project_php/app', '', '', 'Show Admin', NULL),
(2, 'quanLyHeThong', 'Views/site/auth/login.php', '/quanLyHeThong', '/project_php/app/admin/quanLyHeThong', 'admin', 'nav-icon fas fa-tachometer-alt', 'Quản lý Hệ Thống', 1),
(3, 'list', 'Modules/quanLyHeThong/Views/list.php', '/list', '/project_php/app/admin/quanLyHeThong/list', 'admin', 'fa-solid fa-list', 'Danh Sách Người Dùng', 2),
(4, 'add', 'Modules/quanLyHeThong/Views/add.php', '/add', '/project_php/app/admin/quanLyHeThong/add', 'admin', 'fa-solid fa-plus', 'Thêm Người Dùng', 2),
(5, 'edit?id=1', 'Modules/quanLyHeThong/Views/edit.php', '/add', '/project_php/app/admin/quanLyHeThong/edit?id=1', 'admin', 'fa-solid fa-pen-to-square', 'Cập Nhật Thông Tin', 2),
(6, 'roles', 'Modules/quanLyHeThong/Views/listRole.php', '/roles', '/project_php/app/admin/quanLyHeThong/listRole', 'admin,manager', 'fa-solid fa-list', 'Danh Sách Phân Quyền', 2),
(7, 'quanLyHopDong', 'Views/site/auth/login.php', '/quanLyHopDong', '/project_php/app/admin/quanLyHopDong', 'manager ptpm2', 'fa-solid fa-folder-open', 'Quản lý Hợp Đồng', 1),
(8, 'list', 'Modules/quanLyHopDong/Views/list.php', '/list', '/project_php/app/admin/quanLyHopDong/list', 'manager ptpm2', 'fa-solid fa-list', 'Danh Sách Hợp Đồng', 7),
(9, 'add', 'Modules/quanLyHopDong/Views/add.php', '/add', '/project_php/app/admin/quanLyHopDong/add', 'manager ptpm2', 'fa-solid fa-plus', 'Thêm Hợp Đồng', 7),
(10, 'quanLyNhanVien', 'Views/site/auth/login.php', '/quanLyNhanVien', '/project_php/app/admin/quanLyNhanVien', 'admin,manager', 'fa-solid fa-users ', 'Quản lý Nhân Viên', 1),
(11, 'list', 'Modules/quanLyNhanVien/Views/list.php', '/list', '/project_php/app/admin/quanLyNhanVien/list', '', 'fa-solid fa-list', 'Danh Sách Nhân Viên', 10),
(12, 'add', 'Modules/quanLyNhanVien/Views/add.php', '/add', '/project_php/app/admin/quanLyNhanVien/add', '', 'fa-solid fa-plus', 'Thêm Nhân Viên', 10),
(13, 'quanLyLinhVuc', 'Views/site/auth/login.php', '/quanLyLinhVuc', '/project_php/app/admin/quanLyLinhVuc', 'manager tt', 'nav-icon fas fa-tachometer-alt', 'Quản lý Lĩnh Vực', 1),
(14, 'list', 'Modules/quanLyLinhVuc/Views/list.php', '/list', '/project_php/app/admin/quanLyLinhVuc/list', 'manager tt', 'fa-solid fa-list', 'Danh Sách Lĩnh Vực', 13),
(15, 'add', 'Modules/quanLyLinhVuc/Views/add.php', '/add', '/project_php/app/admin/quanLyLinhVuc/add', 'manager tt', 'fa-solid fa-plus', 'Thêm Lĩnh Vực', 13);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` int(10) NOT NULL,
  `gender` bit(1) NOT NULL,
  `flag_delete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `students`
--

INSERT INTO `students` (`id`, `name`, `class`, `gender`, `flag_delete`) VALUES
(8, 'Luyến 2', 9, b'0', 1),
(2, 'Thành', 8, b'1', 1),
(4, 'Luyến', 9, b'0', 1),
(7, 'Thành 2', 8, b'1', 0),
(9, 'Luyến 3', 9, b'0', 1),
(10, 'Thành 1', 8, b'1', 1),
(11, 'Luyến 1', 9, b'0', 1),
(13, 'Luyến 4', 9, b'0', 1),
(14, 'Thành 4', 8, b'1', 1),
(15, 'Luyến 5', 9, b'0', 1),
(16, 'Thành 6', 8, b'1', 1),
(17, 'Luyến 7', 9, b'0', 1),
(18, 'Thành 5', 8, b'1', 1),
(19, 'Luyến 9', 9, b'0', 1),
(20, 'Luyến 0', 9, b'0', 1),
(21, 'Thành 5', 8, b'1', 1),
(22, 'Luyến 8', 9, b'0', 1),
(23, 'Thành 9', 8, b'1', 1),
(24, 'Luyến 8', 9, b'0', 1),
(25, 'Thành 8', 8, b'1', 1),
(26, 'Luyến 7', 9, b'0', 1),
(27, 'Luyến 7', 9, b'0', 1),
(28, 'Thành 7', 8, b'1', 1),
(29, 'Luyến 6', 9, b'0', 1),
(30, 'Thành 6', 8, b'1', 1),
(31, 'Luyến 10', 9, b'0', 1),
(32, 'Thành 10', 8, b'1', 1),
(33, 'Luyến 11', 9, b'0', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanh_toan`
--

DROP TABLE IF EXISTS `thanh_toan`;
CREATE TABLE IF NOT EXISTS `thanh_toan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `noi_dung_thanh_toan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thoi_gian` date NOT NULL,
  `gia_tri_thanh_toan` int(11) NOT NULL,
  `id_hop_dong` int(11) NOT NULL,
  `daxoa` int(11) DEFAULT NULL,
  `gio` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_hop_dong_thanh_toan` (`id_hop_dong`)
) ENGINE=MyISAM AUTO_INCREMENT=119 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thanh_toan`
--

INSERT INTO `thanh_toan` (`id`, `noi_dung_thanh_toan`, `thoi_gian`, `gia_tri_thanh_toan`, `id_hop_dong`, `daxoa`, `gio`) VALUES
(57, 'lần 3', '2023-07-31', 400000, 51, 0, '11:21:29'),
(53, 'lần 2', '2023-07-25', 450000, 51, 1, '11:19:33'),
(54, 'lần 3', '2023-07-31', 400000, 51, 1, '11:19:33'),
(55, 'lần 1', '2023-07-15', 150000, 51, 0, '11:21:29'),
(56, 'lần 2', '2023-07-25', 450000, 51, 0, '11:21:29'),
(52, 'lần 1', '2023-07-15', 150000, 51, 1, '11:19:33'),
(49, 'lần 1', '2023-07-15', 150000, 51, 1, '11:12:52'),
(50, 'lần 2', '2023-07-25', 450000, 51, 1, '11:12:52'),
(51, 'lần 3', '2023-07-31', 400000, 51, 1, '11:12:52'),
(87, 'sdas', '2023-05-12', 500000, 53, 1, '14:36:21'),
(85, 'sdas', '2023-05-12', 500000, 53, 1, '11:31:20'),
(86, 'sdas', '2023-05-12', 500000, 53, 1, '13:39:38'),
(80, '1', '2023-07-19', 5000000, 52, 1, '10:51:09'),
(83, '1', '2023-07-19', 5000000, 52, 0, '14:52:50'),
(79, '1', '2023-07-19', 5000000, 52, 1, '10:50:07'),
(84, '22', '2023-07-22', 3000000, 52, 0, '14:52:50'),
(82, '22', '2023-07-22', 3000000, 52, 1, '14:51:03'),
(81, '1', '2023-07-19', 5000000, 52, 1, '14:51:03'),
(88, 'sd', '2023-07-12', 12000000, 11, 0, '23:30:02'),
(89, '2', '2023-02-12', 1000000, 54, 1, '11:06:00'),
(90, '2', '2023-02-12', 1000000, 54, 1, '11:06:27'),
(91, '2', '2023-02-12', 1000000, 54, 0, '11:27:42'),
(92, 'sdas', '2023-05-12', 500000, 53, 1, '15:48:38'),
(93, 'sdas', '2023-05-12', 500000, 53, 1, '15:50:59'),
(94, 'sdas', '2023-05-12', 500000, 53, 1, '15:50:59'),
(95, 'sdas', '2023-05-12', 500000, 53, 1, '15:51:37'),
(96, 'sdas', '2023-05-12', 500000, 53, 1, '11:42:09'),
(97, 'sdas', '2023-05-12', 500000, 53, 1, '15:20:59'),
(98, 'sdas', '2023-05-12', 500000, 53, 1, '00:17:30'),
(99, 'sdas', '2023-05-12', 500000, 53, 1, '00:22:03'),
(100, 'sdas', '2023-05-12', 500000, 53, 1, '00:23:27'),
(101, 'sdas', '2023-05-12', 500000, 53, 1, '00:58:09'),
(102, 'sdas', '2023-05-12', 500000, 53, 1, '01:23:01'),
(103, 'sdas', '2023-05-12', 500000, 53, 1, '01:23:16'),
(104, 'sdas', '2023-05-12', 500000, 53, 0, '01:23:34'),
(105, 'lần 1 ', '2023-05-12', 500000, 58, 1, '00:22:35'),
(106, 'lần 1 ', '2023-05-12', 500000, 58, 1, '09:19:44'),
(107, 'lần 1 ', '2023-05-12', 500000, 58, 1, '14:12:29'),
(108, 'lần 1 ', '2023-05-12', 500000, 58, 1, '01:06:21'),
(109, 'lần 1 ', '2023-05-12', 500000, 58, 1, '01:06:23'),
(110, 'lần 1 ', '2023-05-12', 500000, 58, 1, '08:24:54'),
(111, 'lần 1 ', '2023-05-12', 500000, 58, 1, '08:35:52'),
(112, 'lần 1 ', '2023-05-12', 500000, 58, 1, '08:36:30'),
(113, 'lần 2', '2023-05-19', 500000, 58, 1, '08:36:30'),
(114, 'lần 1 ', '2023-05-12', 500000, 58, 0, '09:31:05'),
(115, 'lần 2', '2023-05-19', 500000, 58, 0, '09:31:05'),
(116, 'lần 2', '2023-12-12', 1000000000, 59, 1, '10:00:00'),
(117, 'lần 2', '2023-12-12', 1000000000, 59, 1, '10:06:42'),
(118, 'lần 2', '2023-12-12', 1000000000, 59, 0, '10:08:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `flag_delete` int(11) DEFAULT '1',
  `nguon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `level` (`level`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `phone`, `gender`, `level`, `flag_delete`, `nguon`) VALUES
(1, 'Thành', 'admin', '$2y$10$miCPtcPqxbHHZpRQ.Z4FSuVvZ47Gmi8iCdAJx5G8LcgrpVkuRwXYW', 'toilatoi8624@gmail.com', '0931999031', 'nam', 1, 1, 'Database'),
(2, 'Thắng', 'toilatoi1996', '$2y$10$90NlttFE4/RcS9vr.s7RGevD45X59Qd4yaeEZdCWlCWF0Bl161ACG', 'toilatoi1996@gmail.com', '0905529128', 'nam', 16, 1, 'Database'),
(3, 'Văn Thành', 'admin1', '$2y$10$Lst7boUzIlasnbbDY.v3ReUvdctxFobaSc3ah46j715vmUjs6EBsW', 'toilatoi18624@gmail.com', '0905743282', 'nam', 2, 1, 'Database'),
(5, 'Thiện', 'thien123', '$2y$10$VFEbRkmL8a6yCHMiMZfnmuMV5R5zdPVYxqR7e3m4LQz1WRVoCFI8C', 'huy753198624@gmail.com', '0931999031', 'nam', 2, 1, 'Database'),
(13, 'chip', 'chip1', '$2y$10$DXL0qX2oDzIBNf8gA3gSk.qp5vN.7vHXSHivnTq0Vl0lahS/tp5lW', 'chip@gmail.com', '0905319456', 'nu', 6, 1, 'Database'),
(39, 'thanh', 'thanh123', '$2y$10$X7ghnsLLcx3yUr..7UcLjOncEIOSzSuEjbbxbMbIIIYOB/fkkXViW', 'thanh123@gmail.com', '0659568745', 'nam', 4, 1, 'Database');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
