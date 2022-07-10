-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 16, 2021 lúc 10:22 AM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `database`
--
CREATE DATABASE IF NOT EXISTS `database` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `database`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `msud` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `star` int(11) NOT NULL DEFAULT 5,
  `text` varchar(300) NOT NULL,
  `mscmt` varchar(10) NOT NULL,
  `ngaycmt` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`msud`, `email`, `name`, `star`, `text`, `mscmt`, `ngaycmt`) VALUES
('game6', '51900124@student.tdtu.edu.vn', 'Linh Nguyen', 4, 'Game kha hay', 'CMT001', '16-1-2021  1:05:44'),
('game5', 'klasjnk@gmail.com', 'Khanh Huynh', 2, 'Game tot ma quang cao nhieu qua nen cho 1 sao', 'CMT002', '16-2-2021  2:36:14'),
('game5', '12345678@gmail.com', 'Le Bao', 1, 'Game te, quang cao qua nhieu', 'CMT003', '16-3-2021  3:14:32'),
('game5', 'jiowestks@gmail.com', 'Phuong Ngan', 1, 'Game khong hay', 'CMT004', '16-4-2021  23:36:44'),
('game5', '12345678@gmail.com', 'Minh Quang', 1, 'Quang cao qua nhieu, game thi lag.', 'CMT005', '16-5-2021  0:36:24'),
('game5', '51900124@student.tdtu.edu.vn', 'Dai Nam', 5, 'Loi choi hap dan.', 'CMT006', '16-5-2020  5:36:54'),
('edu6', 'klasjnk@gmail.com', 'Bao Vy', 1, 'Quang cao nhieu qua', 'CMT007', '16-5-2020  15:39:56'),
('game2', 'klasjnk@gmail.com', 'Anh Khoa', 4, 'Game kha hay', 'CMT008', '16-5-2020  18:23:23'),
('game2', 'khanhpro1250@gmail.com', 'Phuong Vy', 2, 'Luc thi lag, luc thi bi out ra.', 'CMT009', '11-3-2020  5:23:15'),
('game2', 'jiowestks@gmail.com', 'Hoai Bao', 1, 'Co game nhung k co em.', 'CMT010', '09-4-2019  6:26:19'),
('game2', 'klasjnk@gmail.com', 'Gia Linh', 2, 'Game do qua di. Khong hay gi het', 'CMT011', '05-5-2021  17:38:22'),
('edu3', 'klasjnk@gmail.com', 'Linh Nguyen', 4, 'Sach doc cung duoc nhung khong hay, co luc thi hoi do.', 'CMT012', '11-5-2021  21:23:49'),
('edu2', 'baole88@gmail.com', 'Le Bao', 5, 'Ung dung tot cho viec hoc tap.', 'CMT013', '23-5-2020  19:46:59'),
('book001', 'lehoangbao.tdtu@gmail.com', 'Trong Nhan', 3, 'Sach doc cung binh thuong, khong hay khong do.', 'CMT014', '17-2-2020  10:25:11'),
('mxh1', 'baole88888@gmail.com', 'Duc Manh', 4, 'Toi co the ket noi voi ban be cua minh.', 'CMT015', '18-4-2020  12:36:15'),
('game7', 'baole88888@gmail.com', 'Minh Kha', 4, 'Game choi kha la nghien luon nha mn.', 'CMT016', '28-11-2020  09:35:10'),
('mxh2', 'baole8888@gmail.com', 'Van Tai', 3, 'Very good', 'CMT017', '29-4-2021  15:31:22'),
('book002', 'klasjnk@gmail.com', 'Linh Nguyen', 3, 'Gma ehay', 'CMT018', '01-01-2021  12:48:54'),
('book003', 'jiowestks@gmail.com', 'Nguyen Linh', 5, 'hihi good', 'CMT019', '16-5-2021  13:8:34'),
('book001', 'mvmanh@hotboy.com', 'Mai Van Manh', 5, 'Good book. I have more knowleage about somthing', 'CMT020', '16-5-2021  13:26:27'),
('book002', 'Hihi@gmail.com', 'Mai Van Manh', 4, 'Sach doc hay noi dung de tiep thu. ', 'CMT021', '16-5-2021  13:28:0'),
('book003', 'klasjnk@gmail.com', 'Linh Nguyen', 2, 'Sach te qua. Noi dung nham nhi . Cham 2* la con nuong tay', 'CMT022', '16-5-2021  13:28:51'),
('book004', 'klasjnk@gmail.com', 'Mai Van Manh', 4, 'Story very well. I was interested by them', 'CMT023', '16-5-2021  13:30:11'),
('book004', '51900124@student.tdtu.edu.vn', 'Hu?nh Khanh', 5, 'Sach hay qua ban oi thanks you !!!! <3', 'CMT024', '16-5-2021  13:31:3'),
('book005', '12345678@gmail.com', 'Mai Van Manh', 1, 'khong hieu noi noi dung sach la gi !!', 'CMT025', '16-5-2021  13:32:55'),
('book006', '12345678@gmail.com', 'Linh Nguyen', 3, 'Tam on. Noi chung la ok !!', 'CMT026', '16-5-2021  13:33:41'),
('game001', 'anhkhoa123@gmail.com', 'Tran Anh Khoa', 4, 'Game thich hop voi nguoi me the thao nhu toi.', 'CMT027', '16-5-2021  13:36:16'),
('game001', 'baovy123@gmail.com', 'Nguyen Tran Bao Vy', 5, 'Game tuyet voi', 'CMT028', '16-5-2021  13:36:53'),
('edu001', 'khanhvy123@gmail.com', 'Nguyen Tran Khanh Vy', 5, 'Ung duc tot. de tiep thu cho nguoi moi bat dau', 'CMT029', '16-5-2021  13:37:30'),
('edu001', '12345678@gmail.com', 'Dang Hoang Khanh', 5, 'App tren ca tuyetj voi.', 'CMT030', '16-5-2021  13:37:55'),
('edu002', '123456@gmail.com', 'Huynh Cong Khanh', 5, 'Vua duoc 10 diem vua co nguoi yeu kkk. yeu em PN', 'CMT031', '16-5-2021  13:38:30'),
('edu002', 'klasjnk@gmail.com', 'Phuong Ngan', 5, 'Vua duoc 10 diem, vua co duoc anh kkk yeu HK', 'CMT032', '16-5-2021  13:38:51'),
('edu5', 'klasjnk@gmail.com', 'Bao Vy', 1, 'Quang cao nhieu qua', 'CMT037', '16-5-2020  15:39:56'),
('edu003', 'klasjnk@gmail.com', 'Linh Nguyen', 4, 'Ung dung hay nhung kho su dung qua !!', 'CMT038', '16-5-2021  13:51:12'),
('game008', 'klasjnk@gmail.com', 'Linh Nguyen', 4, 'game hay doi hoi tu duy xep hinh dinh cao :)))', 'CMT039', '16-5-2021  13:51:39'),
('game006', '12345678@gmail.com', 'Linh Nguyen', 5, 'game oke nha :)) ma chay di bat pokemon hoi moi chan nhe ', 'CMT040', '16-5-2021  13:52:14'),
('music000', '12345678@gmail.com', 'Linh Nguyen', 4, 'nhac nhay chill phet :)) le ra cho 5* ma tai no chill qua ne 4* thoi', 'CMT041', '16-5-2021  13:53:5'),
('game007', 'klasjnk@gmail.com', 'Linh Nguyen', 3, 'choi game ma coc a . Gmmm', 'CMT042', '16-5-2021  13:53:34'),
('mxh008', 'klasjnk@gmail.com', 'Linh Nguyen', 5, 'uay cuon qua luot ca ngay :((', 'CMT043', '16-5-2021  13:54:2'),
('mxh003', 'klasjnk@gmail.com', 'Linh Nguyen', 4, 'noi luu tru ly tuong day roi :))', 'CMT044', '16-5-2021  13:54:26'),
('mxh005', 'klasjnk@gmail.com', 'Linh Nguyen', 4, 'app hay nhat toi duoc dung :))', 'CMT045', '16-5-2021  13:54:55'),
('mxh006', 'klasjnk@gmail.com', 'Linh Nguyen', 3, 'da co web nay thi can gi toi app nay nua :))', 'CMT046', '16-5-2021  13:55:30'),
('mxh000', 'klasjnk@gmail.com', 'Linh Nguyen', 4, 'app hay ma kho su dung qua :((', 'CMT047', '16-5-2021  13:55:54'),
('tailieu001', '12345678@gmail.com', 'Linh Nguyen', 5, 'uay cuong qua :(( chi cho dc 5* thoi hic', 'CMT048', '16-5-2021  13:56:35'),
('music002', 'klasjnk@gmail.com', 'Linh Nguyen', 5, 'nhac hay qua ma quan trong la free:))', 'CMT049', '16-5-2021  14:1:6'),
('game002', 'yennhi123@gmail.com', 'Nguy?n Y?n Nhi', 3, 'Game choi kha nham chan, chi choi duoc mot nguoi.', 'CMT050', '16-5-2021  14:41:31'),
('game003', 'trongnhan123@gmail.com', 'Nguyen Trong Nhan', 3, 'Game choi rat chan, khong giong nhu mieu ta', 'CMT051', '16-5-2021  14:42:7'),
('book002', 'khanh123@gmail.com', 'Huynh Khanh', 3, 'Toi da tiep thu duoc li tuong cua Dang, sau khi doc sach nay', 'CMT052', '16-5-2021  14:44:21'),
('edu000', 'khanh123@gmail.com', 'Huynh Khanh', 1, 'Toi thuong xuyen bi cha me danh do app nay', 'CMT053', '16-5-2021  14:45:21'),
('book007', 'dangtri123@gmail.com', 'Dang Dang Tri', 3, 'Sach kha hap dan nguoi doc, cac ban nen tham khao', 'CMT054', '16-5-2021  14:45:59'),
('edu004', 'minhkha123@gmail.com', 'Minh kha', 5, 'App tuyet voi, giup toi hoc anh van tot hon', 'CMT055', '16-5-2021  14:46:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MSKH` varchar(5) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(1000) NOT NULL,
  `HoTenKH` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `SoDienThoai` varchar(10) NOT NULL,
  `NgaySinh` date DEFAULT NULL,
  `DiaChi` varchar(200) NOT NULL,
  `trangthai` int(2) NOT NULL DEFAULT 0,
  `SoDu` int(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MSKH`, `Username`, `Password`, `HoTenKH`, `Email`, `SoDienThoai`, `NgaySinh`, `DiaChi`, `trangthai`, `SoDu`) VALUES
('KH000', 'admin', '$2y$10$psNNNmpuaG1DFyOoilm4e.qn6Go4LbKQSun30iWw2XUvoSqVLux8m', 'Administrator', 'admin@gmail.com', 'admin', '2021-05-01', 'Admin', 2, 0),
('KH001', 'linh', '$2y$10$ETG.79RsPR3cnjDsQFA4m.Z8vNQwaVKn6ToQpSHweNGaoe6K0bYLm', 'Nguyễn Nhật Linh', 'jiowestks@gmail.com', '0987555422', '2021-05-26', 'Ca Mau', 1, 0),
('KH002', 'khanh123', '$2y$10$PBYXTgS6V5QKTNff5w.EAO9d2S4Y/R9Nnyt7xeFu9mXX6.huxNkz2', 'Huỳnh Công Khanh', 'khanhpro1250@gmail.com', '0777905219', '2021-05-15', 'Sa Dec', 1, 150),
('KH003', 'bao123', '$2y$10$G36sjDNXnOvT1hzjXaFBpO6KBNkcE229HF/8Xs7WbeZVTZuZqN/aa', 'Lê Hoảng Bảo', 'lehoangbao.tdtu@gmail.com', '0909070806', '2021-05-27', 'hihi', 0, 0),
('KH004', 'baovy123', '$2y$10$m7h6C1haidO0y6k51NtLreqMca4UVSxzBI7Io//HgrmF.HQ.WSDv2', 'Nguyễn Trần Bảo Vy', 'baovy123@gmail.com', '0978887664', '2009-02-15', 'Dong Thap', 0, 198),
('KH005', 'anhkhoa123', '$2y$10$o8HRYcJtEQ/VGBl/dLkEwO2wgXgDSoRAyZsIWpYIZxEXX0Gq.IV/i', 'Trần Anh Khoa', 'anhkhoa123@gmail.com', '0944555477', '2021-05-06', 'Sa Dec, Dong Thap', 1, 54),
('KH006', 'dangtri123', '$2y$10$/lbwWJXBuBSMJAgpuHU8HuCXRiDk6UrCEHtfuxywGkIxYHt/Ghrra', 'Đặng Đăng Trí', 'dangtri123@gmail.com', '0947301110', '2021-05-11', 'Thành Phố Hồ Chí mInh', 1, 513),
('KH007', 'minhkha123', '$2y$10$ZMTcLS23iDDOlBpdZV2e2.LT1r7gSgHgDiJA7GqnlKg.ep20abarS', 'Trần Minh Kha', 'minhkha123@gmail.com', '0129300587', '2021-05-14', 'Tân An, Long An', 1, 0),
('KH008', 'hoanghuy123', '$2y$10$hGx73gf.WVpe3i6lp2d8TellQ7FS.ZoaQp93vAfpXqMx1xuNTusdO', 'Lê Hoàng Huy', 'hoanghuy123@gmail.com', '0945634564', '2021-05-06', 'Sa Đéc, Đồng Tháp', 1, 0),
('KH009', 'tanhung123', '$2y$10$TQveNijTMEL3g4asN3.NFeLLB4jfbJ/n88jk6zQmAECDHJB4pNcNO', 'Trương Tấn Hùng', 'tanhung123@gmail.com', '0934567865', '2021-05-06', 'Đồng Nai', 1, 0),
('KH010', 'phuchuy123', '$2y$10$HUkzBq2yykABwF7wbEZRy.z2R2c4s/ZQNqSMPCpV.riVc9mCoODlG', 'Đặng Phúc Huy', 'phuchuy123@gmail.com', '0945337224', '2021-05-21', 'Bảo Lộc, Lâm Đồng', 0, 28),
('KH011', 'baothai123', '$2y$10$bsOERpsQL7qYJ70OwV0uguaMdTV0XYeUXr2MIqS4X/MbaO7uGvype', 'Cao Bảo Thái', 'baothai123@gmail.com', '0911456877', '2021-05-13', 'Ninh Kiều, Cần Thơ', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsudownload`
--

CREATE TABLE `lichsudownload` (
  `msdownload` varchar(10) NOT NULL,
  `username` varchar(10) NOT NULL,
  `msapp` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `lichsudownload`
--

INSERT INTO `lichsudownload` (`msdownload`, `username`, `msapp`) VALUES
('LSD000', 'KH006', 'book002'),
('LSD001', 'KH006', 'book003'),
('LSD002', 'KH005', 'book006'),
('LSD003', 'KH005', 'book003'),
('LSD004', 'KH005', 'book007'),
('LSD005', 'KH005', 'music002'),
('LSD006', 'KH004', 'book008'),
('LSD007', 'KH004', 'edu004'),
('LSD008', 'KH004', 'edu000'),
('LSD009', 'KH010', 'book003'),
('LSD010', 'KH010', 'game004'),
('LSD011', 'KH010', 'music001'),
('LSD012', 'KH010', 'mxh005'),
('LSD013', 'KH010', 'tailieu001'),
('LSD014', 'KH004', 'game002'),
('LSD015', 'KH002', 'edu001');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsunap`
--

CREATE TABLE `lichsunap` (
  `msls` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `mathe` varchar(10) NOT NULL,
  `sotien` int(11) NOT NULL,
  `loaithe` varchar(10) NOT NULL,
  `ngaynap` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `lichsunap`
--

INSERT INTO `lichsunap` (`msls`, `username`, `mathe`, `sotien`, `loaithe`, `ngaynap`) VALUES
('LSN000', 'KH005', '3718289140', 50, 'viettel', '16-5-2021  12:26:31'),
('LSN001', 'KH005', '7853915161', 20, 'mobi', '16-5-2021  12:26:48'),
('LSN002', 'KH007', '4443869390', 500, 'mobi', '16-5-2021  12:43:8'),
('LSN003', 'KH006', '2286715914', 20, 'viettel', '16-5-2021  13:3:54'),
('LSN004', 'KH006', '8597125022', 500, 'vina', '16-5-2021  13:4:21'),
('LSN005', 'KH010', '9524643708', 50, 'viettel', '16-5-2021  14:5:35'),
('LSN006', 'KH004', '2907620223', 100, 'vina', '16-5-2021  14:39:28'),
('LSN007', 'KH004', '0046805161', 50, 'vina', '16-5-2021  14:39:53'),
('LSN008', 'KH004', '0024306946', 50, 'viettel', '16-5-2021  14:40:32'),
('LSN009', 'KH002', '1898847860', 50, 'viettel', '16-5-2021  14:43:31'),
('LSN010', 'KH002', '9830529182', 100, 'mobi', '16-5-2021  14:43:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `matheloai` varchar(10) NOT NULL,
  `tentheloai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`matheloai`, `tentheloai`) VALUES
('book', 'Book'),
('edu', 'Education'),
('game', 'Game'),
('music', 'Music'),
('mxh', 'Social'),
('tailieu', 'Document');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thenap`
--

CREATE TABLE `thenap` (
  `MSThe` varchar(20) NOT NULL,
  `MSSeri` varchar(20) NOT NULL,
  `Sotien` int(20) NOT NULL,
  `Loaithe` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thenap`
--

INSERT INTO `thenap` (`MSThe`, `MSSeri`, `Sotien`, `Loaithe`) VALUES
('53140752882631', '11528631543918', 20, 'viettel'),
('84347812642311', '28417472518159', 50, 'viettel'),
('45713430985667', '41164034943775', 50, 'viettel'),
('96049693554767', '45268766196306', 50, 'viettel'),
('73070864278842', '53536637942745', 10, 'mobi'),
('86730195694379', '67409782542911', 50, 'viettel'),
('91558199628809', '67949890841299', 20, 'vina'),
('95532793776543', '78197802134878', 50, 'viettel'),
('10485696331824', '80588561839232', 20, 'mobi'),
('95512942668271', '83664098114180', 50, 'viettel'),
('35536936320904', '90882709304087', 20, 'viettel'),
('69339149469270', '96297396994522', 20, 'viettel'),
('07316584012865', '97159861712719', 10, 'viettel'),
('27585859061929', '97727769698769', 10, 'mobi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ungdung`
--

CREATE TABLE `ungdung` (
  `MSAPP` varchar(20) NOT NULL,
  `TenAPP` varchar(300) NOT NULL,
  `Gia` int(20) NOT NULL,
  `MaNhom` varchar(20) NOT NULL,
  `Hinh` varchar(1000) NOT NULL,
  `MoTaAPP` varchar(2000) NOT NULL,
  `file` varchar(1000) NOT NULL,
  `star` int(2) NOT NULL DEFAULT 5,
  `luottai` int(11) NOT NULL DEFAULT 0,
  `nhaphattrien` varchar(50) NOT NULL DEFAULT 'Administrator'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `ungdung`
--

INSERT INTO `ungdung` (`MSAPP`, `TenAPP`, `Gia`, `MaNhom`, `Hinh`, `MoTaAPP`, `file`, `star`, `luottai`, `nhaphattrien`) VALUES
('book001', 'The Last Thing He To Do', 3, 'book', 'edu1.png', 'This intricate, fast-paced story about \"trying to create a context for democracy and getting hands a little dirty in the process\" is an incisive and chilling look at a modern world where things are not working as they should—and where the oblique and official language is as sinister as the events it is covering up. ', 'avt.jpg', 4, 0, 'KH000'),
('book002', 'American Marxism', 2, 'book', 'edu2.jpg', 'The six-time #1 New York Times bestselling author, Fox News star, and radio host Mark R. Levin explains how the dangers he warned against in the “timely yet timeless” (David Limbaugh, author of Jesus Is Risen) bestseller Liberty and Tyranny have come to pass.', 'avt.jpg', 3, 1, 'KH000'),
('book003', 'What Happened to You', 5, 'book', 'edu3.jpg', 'Our earliest experiences shape our lives far down the road, and What Happened to You? provides powerful scientific and emotional insights into the behavioral patterns so many of us struggle to understand.', 'avt.jpg', 4, 3, 'KH000'),
('book004', 'Sooley: A Novel ', 3, 'book', 'edu4.jpg', 'New York Times bestselling author John Grisham takes you to a different kind of court in his first basketball novel. Samuel “Sooley” Sooleymon is a raw, young talent with big hoop dreams … and even bigger challenges off the court.', 'avt.jpg', 5, 0, 'KH000'),
('book005', 'We Were Liars', 4, 'book', 'edu5.jpg', 'A beautiful and distinguished family.\r\nA private island.\r\nA brilliant, damaged girl; a passionate, political boy.\r\nA group of four friends—the Liars—whose friendship turns destructive.\r\nA revolution. An accident. A secret.\r\nLies upon lies.\r\nTrue love.\r\nThe truth.\r\n', 'avt.jpg', 1, 0, 'KH000'),
('book006', 'Untamed', 4, 'book', 'edu6.jpg', 'NAMED ONE OF THE BEST BOOKS OF THE YEAR BY O: The Oprah Magazine • The Washington Post • Cosmopolitan • Marie Claire • Bloomberg • Parade • “Untamed will liberate women—emotionally, spiritually, and physically. It is phenomenal.”—Elizabeth Gilbert, author of City of Girls and Eat Pray Love', 'avt.jpg', 3, 1, 'KH002'),
('book007', 'Grey', 7, 'book', 'grey.png', 'Relive the sensuality, the romance and the drama of Fifty Shades Freed through the thoughts, reflections and dreams of Christian Grey. Look for FREED: Fifty Shades as Told by Christian, available for pre-order now.', 'unnamed.png', 3, 1, 'Administrator'),
('book008', 'Learn English', 0, 'book', 'englishbook.jpg', 'Are you learning english? Do you want to read and listen to short stories and audio books? are you looking for an easy english story to read? Do you want free audio books and english stories?\r\n\r\nThis is the app for you. Listen to easy and beautiful short stories in English to improve your vocabulary and speaking skills. English Stories for Beginners application will make you practice your English skills in a fun, easy and authentic way.', 'bida.zip', 5, 1, 'Administrator'),
('edu000', 'VNedu', 0, 'edu', 'edu.png', 'Sphero Edu is your hub to create, contribute, and learn with Sphero robots. Go beyond code by incorporating unique STEAM activities to complete with your bot.\r\n\r\nDesigned for learner progression, Sphero Edu beginners can give robots commands by drawing a path in the app for their robot to follow. Intermediate coders can use Scratch blocks to learn more advanced logic, while pros can use text programming and write their own JavaScript.\r\n\r\nSphero Edu is built for makers, learners, educators, and parents. Join the growing community and share your creations to inspire and be inspired. The interactive platform allows you to keep track of your class or group from one easy place. Anyone can save their progress, jump from device to device, and continue the discovery from anywhere. Preparing for the future has never been so fun.', 'bida.zip', 1, 1, 'Administrator'),
('edu001', 'Learn Python', 0, 'edu', 'python.png', 'Learn Python: Programiz is a free Android app that makes it easy to learn Python and try out what you have learned in real-time. You can use the app to follow through Python tutorials step-by-step, experiment with Python code in each lesson using the in-built Python interpreter, take quizzes and more to learn basic concepts of Python 3 from beginning to advanced.', 'python.txt', 5, 1, 'Administrator'),
('edu002', 'Learn Java 10+', 0, 'edu', 'java.png', 'Build your programming skills in the Java Programming language. Become a Java programming master with this programming learning app. Learn the basics of Java Programming or become an expert in Java Programming with this best Java code learning app. Learn to code with Java Programming Language for free with a one-stop programming language learning app - “Learn Java Programming”. If you’re preparing for a Java programming interview or just preparing for your upcoming coding test, this is a must have app for you.', 'angrybird.png', 5, 0, 'Administrator'),
('edu003', 'Learn C++', 1, 'edu', 'c++.png', 'Build your programming skills in the C++ Programming language. Become a C++ programming master with this programming learning app. Learn the basics of C++ Programming or become an expert in C++ Programming with this best C++ code learning app. Learn to code with C++ Programming Language for free with a one-stop programming language learning app - “Learn C++”. If you’re preparing for a C++ programming interview or just preparing for your upcoming coding test, this is a must have app for you.', 'angrybird.png', 4, 0, 'Administrator'),
('edu004', 'Dictionary for you', 0, 'edu', 'googledich.png', 'Get America’s most useful and respected dictionary, optimized for your Android device. This is the best Android app for English language reference, education, and vocabulary building.\r\n\r\nAnd now we’ve added new word games! It’s never been more fun to learn new words and test your vocabulary for everyone from English learners to total word nerds. Hundreds of words to test your skills.', 'angrybird.png', 5, 1, 'Administrator'),
('game001', 'Baseball', 3, 'game', 'baseball.png', 'Traditional Baseball\r\nIf you’re on this page, you’re probably looking for a classic baseball game. One that puts you out there, pitching, batting, and fielding. Because you want that authentic baseball experience, we recommend games like ESPN Arcade Baseball and Super Baseball where you get to practice your hitting accuracy in a live baseball game.\r\n\r\nMore Baseball\r\nWhat if you want a twist on the genre? Something different? If that’s the case, Baseball Fury will have you swinging a flaming baseball bat and sinking ships with your striking power!', 'avt.jpg', 5, 0, 'KH000'),
('game002', 'Pacman', 2, 'game', 'pacman.png', 'Pac-Man[a] is a maze action game developed and released by Namco for arcades in 1980. The original Japanese title of Puck Man was changed to Pac-Man for international releases as a preventative measure against defacement of the arcade machines by changing the P to an F.[3] In North America, the game was released by Midway Manufacturing as part of its licensing agreement with Namco America. ', 'avt.jpg', 3, 1, 'KH000'),
('game003', 'Basketball', 5, 'game', 'basketball.png', 'Basketball is one of the most popular sports in the USA, leaving plenty of choice in the gaming realm. Many games mirror real-life teams and legendary players like James Harden, LeBron James, and Kobe Bryant. Here, you can play out your NBA dream in a range of free basketball games.', 'avt.jpg', 3, 0, 'KH000'),
('game004', 'Angry Bird', 4, 'game', 'angrybird.png', 'Join hundreds of millions of players for FREE and start the fun slingshot adventure now! Team up with your friends, climb the leaderboards, gather in clans, collect hats, take on challenges, and play fun events in all-new game modes. Evolve your team and show your skills in the most exciting Angry Birds game out there!', 'avt.jpg', 5, 1, 'KH000'),
('game005', 'Bowling', 6, 'game', 'bowling.png', 'To bowl the ball: Move the bowler from side to side using the arrows. Line him up to where you want the ball to start out. Left-click the mouse or hit the space bar to start the bowling action. First you will select the power with which the ball is bowled. The higher the bar is on the left the faster the ball will go. Use the mouse left-click or the space bar to stop the bar from moving up and down. Next you will select the direction the ball will take. Sort of like spin on the ball. The ball will move in the direction that you stop the arrow. Use the mouse left-click or the space bar to stop the arrow from moving. You can continue to play a full game of bowling. See how your computer score compares to your real bowling score.\r\n', 'avt.jpg', 2, 0, 'KH000'),
('game006', 'Pokemon Go', 7, 'game', 'pokemongo.png', 'NEW! Now you can battle other Pokémon GO Trainers online! Try the GO Battle League today!\r\n\r\nJoin Trainers across the globe who are discovering Pokémon as they explore the world around them. Pokémon GO is the global gaming sensation that has been downloaded over 1 billion times and named “Best Mobile Game” by the Game Developers Choice Awards and “Best App of the Year” by TechCrunch.', 'avt.jpg', 5, 0, 'KH002'),
('game007', 'GH Truyền Kỳ 2', 0, 'game', 'ghtruyenky.png', 'Game vo lam chi ton tuyet dinh, ca the gioi dang choi con ban thi sao', 'Project.rar', 3, 1, 'Administrator'),
('game008', 'Jigsaw Puzzles Free', 0, 'game', 'puzle.png', 'Jigsaw puzzles free is easy to play, you just need to drag the pieces to form the picture. You can upload the pictures in the photo album of your mobile phone to play games, or you can set the number of pieces to determine the difficulty of the puzzle.', 'bida.zip', 4, 0, 'Administrator'),
('music000', 'ZingMP3', 1, 'music', 'zingmp3.png', 'Download this Mp3 player app to your phone and enjoy the best mp3 music experience with your favorite tracks, songs, albums, artists, artist charts.\r\n\r\nFor more experience and many new features for Music Player, you can send your comments to us so that you can bring users the best mp3 player with many useful features.', 'bida.zip', 4, 0, 'Administrator'),
('music001', 'My Music', 0, 'music', 'mymusic.png', '\"NhacCuaTui is a music application that offers you both online and offline streaming with a wide variety of songs under all genres. Just enjoy the copyrighted music, watch lyrics, and create personal playlists. Download now!\r\n\r\nBring NhacCuaTui with you wherever you go and express your ego with music. With millions of songs, music videos, and karaoke videos of all genres from Vietnamese music to international music, we guarantee to offer your favorite genres: pop, rock, indie, EDM, folk, rap, hiphop, etc.', 'bida.zip', 5, 1, 'Administrator'),
('music002', 'SoundCloud', 0, 'music', 'sounclound.png', 'SoundCloud is more than a streaming service, it’s an open global community for anyone to upload any sound for immediate discovery.\r\n\r\nBe the first to hear new tracks, connect directly with fellow fans and your favorite artists in real time, and support the future of music with every play, like, repost and comment.', 'bida.zip', 5, 1, 'Administrator'),
('music003', 'Spotify', 0, 'music', 'sotify.png', 'With Spotify, you have access to a world of free music, curated playlists, artists, and podcasts you love. Discover new music, podcasts, top songs or listen to your favorite artists, albums. Create your own music playlists with the latest songs to suit your mood.\r\n\r\nSpotify makes streaming music easy with curated playlists and thousands of podcasts you can’t find anywhere else. Find music from new artists, stream your favorite album or playlist and listen to music you love for free.', 'bida.zip', 5, 0, 'Administrator'),
('mxh000', 'Twitter', 1, 'mxh', 'twitter.png', 'Explore what’s trending in the media, or get to know thought-leaders in the topics that matter to you; whether your interests range from #Kpop Twitter to politics, news or sports, you can follow & speak directly to influencers or your friends alike. Every voice can impact the world.\r\n\r\n', 'avt.jpg', 4, 0, 'KH000'),
('mxh001', 'Snapchat', 0, 'mxh', 'snapchat.png', 'SNAP\r\n\r\n•Snapchat opens right to the camera, so you can send a Snap in seconds! Just take a photo or video, add a caption, and send it to your best friends and family. Express yourself with Filters, Lenses, Bitmojis, and all kinds of fun effects.\r\n\r\n• Capturing and sending photos and videos is easy! Tap to take a photo, or press and hold for video.\r\n\r\n• New selfie Lenses and Filters are added every day. Change the way you look, dance with your 3D Bitmoji, and even play games with your face!\r\n\r\n• Create your own Filters to add to photos and videos — or try out Lenses made by our community!', 'avt.jpg', 5, 0, 'KH000'),
('mxh002', 'Instagram', 1, 'mxh', 'instagram.png', 'Express Yourself and Connect With Friends\r\n\r\n\r\n* Add photos and videos to your story that disappear after 24 hours, and bring them to life with fun creative tools.\r\n\r\n* Message your friends with Messenger. Share and connect over what you see on Feed and Stories.\r\n\r\n* Create and discover short, entertaining videos on Instagram with Reels.\r\n\r\n* Post photos and videos to your feed that you want to show on your profile.', 'avt.jpg', 3, 1, 'KH000'),
('mxh003', 'Google Drive', 0, 'mxh', 'googledrive.png', 'Google Drive là dịch vụ lưu trữ và đồng bộ hóa tập tin được tạo bởi Google. Nó cho phép người dùng có thể lưu trữ tập tin trên đám mây, chia sẻ tập tin, và chỉnh sửa tài liệu, văn bản, bảng tính, và bài thuyết trình với cộng tác viên. ', 'avt.jpg', 4, 0, 'KH002'),
('mxh005', 'Facebook', 0, 'mxh', 'facebook.png', 'Connect with friends, family and people who share the same interests as you. Communicate privately, watch your favorite content, buy and sell items or just spend time with your community. On Facebook, keeping up with the people who matter most is easy. Discover, enjoy and do more together.', 'bida.zip', 4, 1, 'KH000'),
('mxh006', 'CH Play', 1, 'mxh', 'googleplay.png', 'Google Play, trước đây là Android Market, là nền tảng phân phối kỹ thuật số các ứng dụng cho hệ điều hành Android và cửa hàng truyền thông kỹ thuật số, điều hành bởi Google. Wikipedia\r\n', 'test.c', 3, 0, 'Administrator'),
('mxh008', 'TikTok', 0, 'mxh', 'tiltiok.png', 'TikTok is THE destination for mobile videos. On TikTok, short-form videos are exciting, spontaneous, and genuine. Whether you’re a sports fanatic, a pet enthusiast, or just looking for a laugh, there’s something for everyone on TikTok. All you have to do is watch, engage with what you like, skip what you don’t, and you’ll find an endless stream of short videos that feel personalized just for you. From your morning coffee to your afternoon errands, TikTok has the videos that are guaranteed to make your day.\r\n\r\nWe make it easy for you to discover and create your own original videos by providing easy-to-use tools to view and capture your daily moments. Take your videos to the next level with special effects, filters, music, and more.', 'book.zip', 5, 0, 'Administrator'),
('tailieu001', 'The Happiest Man on Earth', 13, 'tailieu', 'hi.png', 'In this uplifting memoir in the vein of The Last Lecture and Man’s Search for Meaning, a Holocaust survivor pays tribute to those who were lost by telling his story, sharing his wisdom, and living his best possible life.\r\n\r\nBorn in Leipzig, Germany, into a Jewish family, Eddie Jaku was a teenager when his world was turned upside-down. On November 9, 1938, during the terrifying violence of Kristallnacht, the Night of Broken Glass, Eddie was beaten by SS thugs, arrested, and sent to a concentration camp with thousands of other Jews across Germany. Every day of the next seven years of his life, Eddie faced unimaginable horrors in Buchenwald, Auschwitz, and finally on a forced death march during the Third Reich’s final days. The Nazis took everything from Eddie—his family, his friends, and his country. But they did not break his spirit.\r\nAgainst unbelievable odds, Eddie found the will to survive. Overwhelming grateful, he made a promise: he would smile every day in thanks for the precious gift he was given and to honor the six million Jews murdered by Hitler. Today, at 100 years of age, despite all he suffered, Eddie calls himself the “happiest man on earth.” In his remarkable memoir, this born storyteller shares his wisdom and reflects on how he has led his best possible life, talking warmly and openly about the power of gratitude, tolerance, and kindness. Life can be beautiful if you make it beautiful. With The Happiest Man on Earth, Eddie shows us how. \r\n\r\nFilled with his insights on friendship, family, health, ethics, love, and hatred, and the simple beliefs that have shaped him, The Happiest Man on Earth offers timeless lessons for readers of all ages, especially for  young people today.\r\n\r\n', 'book.zip', 5, 1, 'Administrator');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `uploadapp`
--

CREATE TABLE `uploadapp` (
  `MSAPP` varchar(30) NOT NULL,
  `mskh` varchar(10) NOT NULL,
  `TenAPP` varchar(200) NOT NULL,
  `Gia` int(20) NOT NULL,
  `Hinh` varchar(1000) NOT NULL,
  `MaNhom` varchar(20) NOT NULL,
  `MoTaAPP` varchar(2000) NOT NULL,
  `file` varchar(1000) NOT NULL,
  `tinhtrangud` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `uploadapp`
--

INSERT INTO `uploadapp` (`MSAPP`, `mskh`, `TenAPP`, `Gia`, `Hinh`, `MaNhom`, `MoTaAPP`, `file`, `tinhtrangud`) VALUES
('book008', 'KH005', 'Learn English', 0, 'englishbook.jpg', 'book', 'Are you learning english? Do you want to read and listen to short stories and audio books? are you looking for an easy english story to read? Do you want free audio books and english stories?\r\n\r\nThis is the app for you. Listen to easy and beautiful short stories in English to improve your vocabulary and speaking skills. English Stories for Beginners application will make you practice your English skills in a fun, easy and authentic way.', 'bida.zip', 1),
('game008', 'KH006', 'Jigsaw Puzzles Free', 0, 'puzle.png', 'game', 'Jigsaw puzzles free is easy to play, you just need to drag the pieces to form the picture. You can upload the pictures in the photo album of your mobile phone to play games, or you can set the number of pieces to determine the difficulty of the puzzle.', 'bida.zip', 1),
('music000', 'KH007', 'ZingMP3', 1, 'zingmp3.png', 'music', 'Download this Mp3 player app to your phone and enjoy the best mp3 music experience with your favorite tracks, songs, albums, artists, artist charts.\r\n\r\nFor more experience and many new features for Music Player, you can send your comments to us so that you can bring users the best mp3 player with many useful features.', 'bida.zip', 1),
('music001', 'KH007', 'My Music', 0, 'mymusic.png', 'music', '\"NhacCuaTui is a music application that offers you both online and offline streaming with a wide variety of songs under all genres. Just enjoy the copyrighted music, watch lyrics, and create personal playlists. Download now!\r\n\r\nBring NhacCuaTui with you wherever you go and express your ego with music. With millions of songs, music videos, and karaoke videos of all genres from Vietnamese music to international music, we guarantee to offer your favorite genres: pop, rock, indie, EDM, folk, rap, hiphop, etc.', 'bida.zip', 1),
('music002', 'KH007', 'SoundCloud', 0, 'sounclound.png', 'music', 'SoundCloud is more than a streaming service, it’s an open global community for anyone to upload any sound for immediate discovery.\r\n\r\nBe the first to hear new tracks, connect directly with fellow fans and your favorite artists in real time, and support the future of music with every play, like, repost and comment.', 'bida.zip', 1),
('music003', 'KH006', 'Spotify', 0, 'sotify.png', 'music', 'With Spotify, you have access to a world of free music, curated playlists, artists, and podcasts you love. Discover new music, podcasts, top songs or listen to your favorite artists, albums. Create your own music playlists with the latest songs to suit your mood.\r\n\r\nSpotify makes streaming music easy with curated playlists and thousands of podcasts you can’t find anywhere else. Find music from new artists, stream your favorite album or playlist and listen to music you love for free.', 'bida.zip', 1),
('tailieu002', 'KH002', 'Maths', 0, 'math.png', 'tailieu', 'Learn math, check homework and study for upcoming tests and ACTs/SATs with the most used math learning app in the world! Got tricky homework or class assignments? Get unstuck ASAP with our step-by-step explanations and animations.\r\n\r\nWe’ve got you covered from basic arithmetic to advanced calculus and geometry. You CAN do math!', 'amed.png', 0),
('tailieu003', 'KH002', 'Chemistry Document', 0, 'chemistry.png', 'tailieu', 'The Chemistry application allows you to find chemical reactions and to solve the chemical equations with one or multiple unknown variables. You will always have Mendeleev Periodic Table and Solubility table handy And even the calculator of Molar Masses is now on your phone!', 'ball.png', 0),
('tailieu004', 'KH005', 'Education Document', 1, 'education.png', 'tailieu', 'Whether you’re a student, parent, or borrower, Federal Student Aid’s myStudentAid app has the tools and resources you need to apply for and manage financial aid for college or career school on the go. Complete the FAFSA® form, view loan and grant information on your personalized dashboard, get relevant account alerts, and track your repayment progress.', 'ball.png', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`mscmt`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MSKH`);

--
-- Chỉ mục cho bảng `lichsudownload`
--
ALTER TABLE `lichsudownload`
  ADD PRIMARY KEY (`msdownload`);

--
-- Chỉ mục cho bảng `lichsunap`
--
ALTER TABLE `lichsunap`
  ADD PRIMARY KEY (`msls`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`matheloai`);

--
-- Chỉ mục cho bảng `thenap`
--
ALTER TABLE `thenap`
  ADD PRIMARY KEY (`MSSeri`);

--
-- Chỉ mục cho bảng `ungdung`
--
ALTER TABLE `ungdung`
  ADD PRIMARY KEY (`MSAPP`);

--
-- Chỉ mục cho bảng `uploadapp`
--
ALTER TABLE `uploadapp`
  ADD PRIMARY KEY (`MSAPP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
