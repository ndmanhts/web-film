-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 19, 2019 lúc 08:43 AM
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
-- Cơ sở dữ liệu: `web_film`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `numFilm` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `numFilm`) VALUES
(3, 'Phim Hoạt Hình', NULL),
(4, 'Kinh Dị', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idFilm` int(11) NOT NULL,
  `content` text NOT NULL,
  `time` date NOT NULL,
  `liked` int(11) NOT NULL DEFAULT '0',
  `unliked` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `iduser`, `idFilm`, `content`, `time`, `liked`, `unliked`) VALUES
(88, 34, 1015, 'Phim hay', '2019-05-18', 0, 0),
(89, 37, 1006, 'Hay đấy bạn ơi', '2019-05-19', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `idFilm` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `Liked` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `danhgia`
--

INSERT INTO `danhgia` (`idFilm`, `idUser`, `Liked`) VALUES
(1006, 34, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgiacomment`
--

CREATE TABLE `danhgiacomment` (
  `id` int(11) NOT NULL,
  `idComment` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `liked` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `danhgiacomment`
--

INSERT INTO `danhgiacomment` (`id`, `idComment`, `idUser`, `liked`) VALUES
(80, 82, 35, 0),
(81, 83, 35, 1),
(82, 88, 35, 0),
(83, 82, 37, 1),
(84, 89, 34, 0),
(85, 89, 36, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `hinhanh` varchar(50) DEFAULT NULL,
  `NoiBat` int(11) NOT NULL,
  `nation` varchar(20) NOT NULL,
  `year` int(11) NOT NULL,
  `source` varchar(50) NOT NULL,
  `views` int(11) DEFAULT NULL,
  `liked` int(11) DEFAULT NULL,
  `NSX` varchar(255) DEFAULT NULL,
  `unliked` int(11) DEFAULT NULL,
  `content` text,
  `author` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `film`
--

INSERT INTO `film` (`id`, `name`, `hinhanh`, `NoiBat`, `nation`, `year`, `source`, `views`, `liked`, `NSX`, `unliked`, `content`, `author`, `created_at`, `updated_at`) VALUES
(1006, 'Naruto Tập 2', 'naruto2.jpg', 1, 'Nhật Bản', 2008, 'upload/film/Naruto2.mp4', 0, 3, 'manga Nhật Bản', 0, 'Naruto Tập 2', 'Kishimoto Masashi', '2019-05-17 17:11:57', '2019-05-17 17:11:57'),
(1007, 'Naruto Tập 3', 'naruto3.jpg', 1, 'Nhật Bản', 2008, 'upload/film/Naruto3.mp4', 1500, 0, 'manga Nhật Bản', 0, 'Naruto Tập 3', 'Kishimoto Masashi', '2019-05-17 17:16:01', '2019-05-17 17:16:01'),
(1008, 'Naruto tập 4', 'naruto4.jpg', 1, 'Nhật Bản', 2008, 'upload/film/Naruto4.mp4', 160, 0, 'manga Nhật Bản', 0, 'Naruto Tập 4', 'Kishimoto Masashi', '2019-05-17 17:22:01', '2019-05-17 17:22:01'),
(1009, 'Naruto Tập 5', 'naruto5.jpg', 1, 'Nhật Bản', 2008, 'upload/film/Naruto5.mp4', 38, 0, 'manga Nhật Bản', 0, 'Naruto tập 5', 'Kishimoto Masashi', '2019-05-17 17:29:18', '2019-05-17 17:29:18'),
(1010, 'Naruto Tập 6', 'naruto6.jpg', 1, 'Nhật Bản', 2008, 'upload/film/Naruto6.mp4', 635, 0, 'manga Nhật Bản', 0, 'Naruto tập 6', 'Kishimoto Masashi', '2019-05-17 17:30:23', '2019-05-17 17:30:23'),
(1011, 'Naruto Tập 7', 'naruto7.jpg', 1, 'Nhật Bản', 2008, 'upload/film/Naruto7.mp4', 3986, 0, 'manga Nhật Bản', 38, 'Naruto tập 7', 'Kishimoto Masashi', '2019-05-17 17:30:58', '2019-05-17 17:30:58'),
(1014, 'Đường phố khắc nghiêt 1', 'hanhdong1.jpg', 1, 'Việt Nam', 2015, 'upload/film/hanhdong1.mp4', 100000, 0, 'Nguyễn  Đình Mạnh', 0, 'ĐƯờng Phố Khắc Nghiệt 1', 'Nguyễn Đình Mạnh', '2019-05-17 20:02:51', '2019-05-17 20:02:51'),
(1015, 'Anh Thợ Nụ', 'canhachai1.jpg', 1, 'Việt Nam', 2008, 'upload/film/haicanhac1.mp4', 10000, 0, 'Vanh leg', 0, 'Anh Thợ Nụ', 'Vanh leg', '2019-05-17 20:16:57', '2019-05-17 20:16:57'),
(1016, 'Đường vào tim em', 'canhac1.jpg', 1, 'Việt Nam', 2015, 'upload/film/canhac1.mp4', 50000, 0, 'VTV', 0, 'Người Tình Mùa Đông', 'Hồ Quang Hiếu', '2019-05-17 20:23:33', '2019-05-17 20:23:33'),
(1017, 'Naruto', 'naruto1.jpg', 1, 'Nhật Bản', 2008, 'upload/film/Naruto.mp4', 53000, 1, 'manga Nhật Bản', 2, 'Naruto Tập Cuối', 'Kishimoto Masashi', '2019-05-17 20:27:24', '2019-05-17 20:27:24'),
(1019, 'Anh thợ 1', 'canhachai2.jpg', 0, 'Việt Nam', 2015, 'upload/film/haicanhac2.mp4', 3689, 0, 'Vag leg', 0, 'Anh thợ nụ tập 2', 'Vanh leg', '2019-05-18 02:40:50', '2019-05-18 02:40:50'),
(1020, 'Anh thợ 3', 'canhachai3.jpg', 0, 'Nhật Bản', 2015, 'upload/film/haicanhac3.mp4', 6987, 0, 'Vag leg', 0, 'Anh thợ nụ tập 3', 'Vanh leg', '2019-05-18 02:49:41', '2019-05-18 02:49:41'),
(1021, 'Anh thợ nụ 4', 'canhachai4.jpg', 0, 'Nhật Bản', 2015, 'upload/film/haicanhac3.mp4', 6987, 0, 'Vag leg', 0, 'Anh thợ nụ tập 4', 'Vanh leg', '2019-05-18 02:50:11', '2019-05-18 02:50:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `filmandcategory`
--

CREATE TABLE `filmandcategory` (
  `idFilm` int(11) NOT NULL,
  `idCategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `filmandcategory`
--

INSERT INTO `filmandcategory` (`idFilm`, `idCategory`) VALUES
(1006, 3),
(1007, 3),
(1008, 3),
(1008, 4),
(1009, 3),
(1010, 3),
(1011, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phonenumber` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `admin` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `phonenumber`, `email`, `admin`) VALUES
(34, 'Manh', '$2y$10$EsP60CvOXUX8ebnZJuU0OOrSelNouy73oaC15V1soCR9BOdFe7WkC', '0969183576', 'ndmanhts@gmail.com', 2),
(36, 'Manh1', '$2y$10$FE7PrOlaByDYl2XK7WO6oOv4GCCBEez.fPb5ZgnWynIu6zHeB87Qa', '09691835767', 'nhinlenbautroi10@gmail.com', 1),
(37, 'MA2', '$2y$10$stiqG2qSS0Wg1ZbVqt9lH.Br.3mv7C1FQdzJonBJ.B/LYb9edieIS', '0987326487', 'akjfhkjshkaj@gmail.com', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_FilmComment` (`iduser`),
  ADD KEY `fk_FilmC` (`idFilm`);

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`idFilm`,`idUser`),
  ADD KEY `fk_userdanhgia` (`idUser`);

--
-- Chỉ mục cho bảng `danhgiacomment`
--
ALTER TABLE `danhgiacomment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `filmandcategory`
--
ALTER TABLE `filmandcategory`
  ADD PRIMARY KEY (`idFilm`,`idCategory`),
  ADD KEY `fk_Category` (`idCategory`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT cho bảng `danhgiacomment`
--
ALTER TABLE `danhgiacomment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT cho bảng `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1022;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_FilmC` FOREIGN KEY (`idFilm`) REFERENCES `film` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_FilmComment` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `fk_filmdanhgia` FOREIGN KEY (`idFilm`) REFERENCES `film` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_userdanhgia` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `filmandcategory`
--
ALTER TABLE `filmandcategory`
  ADD CONSTRAINT `fk_Category` FOREIGN KEY (`idCategory`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_Film` FOREIGN KEY (`idFilm`) REFERENCES `film` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
