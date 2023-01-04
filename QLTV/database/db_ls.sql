-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 03, 2022 lúc 07:42 PM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_ls`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `book_title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_author` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_publish` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `book_image` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `book`
--

INSERT INTO `book` (`book_id`, `book_title`, `book_description`, `book_category`, `book_author`, `date_publish`, `qty`, `book_image`) VALUES
(15, 'Cơ sở dữ liệu', 'B (Khoa học công nghệ - Kinh tế)', 'Khoa học công nghệ - Kinh tế', 'Nguyễn Bá Tường', '2021-11-17', 20, 'cơ sở dữ liệu.jpg'),
(19, 'Hạt giống tâm hồn 1', 'G (Tâm lý - Tâm linh - Tôn giáo)', 'Tâm lý - Tâm linh - Tôn giáo', 'Nhiều tác giả', '2021-09-10', 20, 'hạt giống tâm hồn 1.jpg'),
(20, 'Trái tim yêu thương', 'G (Tâm lý - Tâm linh - Tôn giáo)', 'Tâm lý - Tâm linh - Tôn giáo', 'Quốc Toản', '2021-07-08', 10, 'trái tim yêu thương.jpg'),
(21, 'Tư tưởng Hồ Chí Minh', 'D', 'Văn hóa xã hội - lịch sử', 'Phạm Ngọc Anh', '2021-10-08', 10, ''),
(47, 'Lập trình Java căn bản', 'B (Khoa học công nghệ - Kinh tế)', 'Khoa học công nghệ - Kinh tế', 'Nhiều tác giả', '2022-01-13', 20, 'lập trình java.jpg'),
(48, 'Conan tập 1', 'F (Truyện - Tiểu thuyết)', 'Truyện - Tiểu thuyết', 'Gosho Aoyama', '2021-12-31', 10, 'conan.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `borrowing`
--

CREATE TABLE `borrowing` (
  `borrow_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_no` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `borrowing`
--

INSERT INTO `borrowing` (`borrow_id`, `book_id`, `user_no`, `qty`, `date`, `status`) VALUES
(216, 48, '19DH111223', 1, '2022-01-07', 'Đang mượn'),
(217, 20, '19DH110002', 1, '2022-01-07', 'Đang mượn'),
(218, 15, '19DH110742', 1, '2022-04-22', 'Đã trả');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `login`
--

CREATE TABLE `login` (
  `id` int(3) NOT NULL,
  `username` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'hung', '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `penalty`
--

CREATE TABLE `penalty` (
  `penalty_id` int(11) NOT NULL,
  `penalty_name` varchar(30) NOT NULL,
  `penalty_date` date NOT NULL,
  `penalty_fine` varchar(10) NOT NULL,
  `penalty_reason` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `penalty`
--

INSERT INTO `penalty` (`penalty_id`, `penalty_name`, `penalty_date`, `penalty_fine`, `penalty_reason`) VALUES
(6, 'Hà Bùi Mạnh Hùng', '2022-01-02', '10.000', 'Nộp trễ hạn'),
(7, 'Nguyễn Đăng Khoa', '2022-01-07', '5.000', 'Trả sách trễ hạn ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_no` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` int(4) NOT NULL,
  `section` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_image` char(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `user_no`, `firstname`, `middlename`, `lastname`, `course`, `section`, `user_image`) VALUES
(6, '19DH110002', 'Nguyễn ', 'Thành ', 'Đạt', 2001, '01234567891', 'personas đạt.jpg'),
(12, '19DH111223', 'Hà', 'Bùi Mạnh', 'Hùng', 2001, '01222797123', 'IMG_20210716_042653_550 (1).jpg'),
(15, '19DH111140', 'Nguyễn ', 'Đăng', 'Khoa', 2001, '1234567899', 'khoacan.jpg'),
(16, '19DH110742', 'Nguyễn', 'Anh', 'Khoa', 2001, '67845634332', 'anhkhoa.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Chỉ mục cho bảng `borrowing`
--
ALTER TABLE `borrowing`
  ADD PRIMARY KEY (`borrow_id`);

--
-- Chỉ mục cho bảng `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `penalty`
--
ALTER TABLE `penalty`
  ADD PRIMARY KEY (`penalty_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `borrowing`
--
ALTER TABLE `borrowing`
  MODIFY `borrow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT cho bảng `login`
--
ALTER TABLE `login`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `penalty`
--
ALTER TABLE `penalty`
  MODIFY `penalty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
