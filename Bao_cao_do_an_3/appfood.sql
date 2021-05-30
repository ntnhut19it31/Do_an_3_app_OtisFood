-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 30, 2021 lúc 04:03 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `appfood`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id` int(11) NOT NULL,
  `madonhang` int(11) NOT NULL,
  `masanpham` int(11) NOT NULL,
  `tensanpham` varchar(1000) NOT NULL,
  `giasanpham` int(11) NOT NULL,
  `soluongsanpham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`id`, `madonhang`, `masanpham`, `tensanpham`, `giasanpham`, `soluongsanpham`) VALUES
(1, 1, 1, 'Mỳ cay Hàn Quốc', 12000, 1),
(2, 2, 2, 'TOKIBOKI', 12000, 2),
(3, 3, 3, 'Trà sữa trân châu đường đen', 12000, 2),
(4, 2, 2, 'TOKIBOKI', 12000, 2),
(5, 3, 3, 'Trà sữa trân châu đường đen', 12000, 2),
(6, 2, 2, 'TOKIBOKI', 12000, 2),
(7, 3, 3, 'Trà sữa trân châu đường đen', 12000, 2),
(8, 2, 2, 'TOKIBOKI', 12000, 2),
(9, 3, 3, 'Trà sữa trân châu đường đen', 12000, 2),
(10, 2, 2, 'TOKIBOKI', 12000, 2),
(11, 3, 3, 'Trà sữa trân châu đường đen', 12000, 2),
(12, 2, 2, 'TOKIBOKI', 12000, 2),
(13, 3, 3, 'Trà sữa trân châu đường đen', 12000, 2),
(14, 2, 2, 'TOKIBOKI', 12000, 2),
(15, 3, 3, 'Trà sữa trân châu đường đen', 12000, 2),
(16, 2, 2, 'TOKIBOKI', 12000, 2),
(17, 3, 3, 'Trà sữa trân châu đường đen', 12000, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `tenkhachhang` varchar(200) NOT NULL,
  `sodienthoai` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `diachi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id`, `tenkhachhang`, `sodienthoai`, `email`, `diachi`) VALUES
(13, 'Thuy', 987534252, 'thuy1234@gmail.com', 'Quảng Trị'),
(14, 'nhut', 937456, 'nguyennhut@gmail.com', '23 Quang Nam'),
(15, 'Nhựt', 914745, 'nguyennhut@gmail.com', 'Quảng Nam'),
(16, 'Thuy', 36283893, 'thuy12@gmail.com', 'Quảng Trị'),
(17, 'nhuyt', 914735900, 'nguyenthinhut2001@gmail.com', '21 qUANGR A');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `id` int(11) NOT NULL,
  `tenloaisanpham` varchar(200) NOT NULL,
  `hinhanhloaisanpham` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`id`, `tenloaisanpham`, `hinhanhloaisanpham`) VALUES
(1, 'Trà Sữa', 'http://icons.iconarchive.com/icons/graphicloads/food-drink/128/can-icon.png'),
(2, 'Đồ Ăn Vặt', 'http://icons.iconarchive.com/icons/graphicloads/food-drink/128/dish-2-icon.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `username` int(50) NOT NULL,
  `email` int(100) NOT NULL,
  `password` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `register`
--

INSERT INTO `register` (`id`, `username`, `email`, `password`) VALUES
(2, 0, 0, 1234567);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `tensanpham` varchar(200) NOT NULL,
  `giasanpham` int(15) NOT NULL,
  `hinhanhsanpham` varchar(200) NOT NULL,
  `motasanpham` varchar(10000) NOT NULL,
  `idsanpham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `tensanpham`, `giasanpham`, `hinhanhsanpham`, `motasanpham`, `idsanpham`) VALUES
(3, 'Trà sữa trân châu đường đen', 12000, 'https://yutang.vn/wp-content/uploads/2018/09/signature.jpg', 'Các món sữa tươi kết hợp với trân châu đường đen vẫn chưa có dấu hạ nhiệt tại Việt Nam.\r\nChỉ đơn giản là sữa tươi không đường béo béo hòa cùng vị ngọt ngào của thứ đường đen từ xứ sở Kim Chi,\r\nvà kết hợp cùng với trân châu dẻo dai chỉ vậy thôi đó mà lại thu hút đến kỳ lạ.\r\nBạn có đang bỏ lỡ cơn sốt này không? Hãy đến HANDY để cùng thưởng thức thức uống tuyệt vời này nhé.', 1),
(4, 'Nem rán ', 10000, 'https://image-us.eva.vn/upload/1-2019/images/2019-01-31/ava-1548909996-834-width640height480_schema_article.jpg', 'Sản phẩm ngon ơi là ngon', 2),
(5, 'Trà sữa trân châu dừa', 10000, 'https://cdn.jamja.vn/blog/wp-content/uploads/2017/08/tra-sua-cu-nang-e1503393555879.jpeg', 'Sản phẩm ngon ơi là ngon', 1),
(6, 'Trà sữa thái', 12000, 'https://i.imgur.com/VY6itJel.jpg', 'Sản phẩm ngon ơi là ngon', 1),
(7, 'Trà sữa socola', 10000, 'https://foodgen.vn/wp-content/uploads/2019/09/DckJuCIU8AAJEU0-683x1024.jpg', '', 1),
(8, 'Chân gà sốt cay Hàn Quốc', 35000, 'https://kenh14cdn.com/2017/chan-ga-5-1511222255976.jpg', 'Chân gà là một món ăn được chế biến từ nguyên liệu là những chiếc chân của con gà bằng những phương pháp như nướng hay luộc. Chân gà nướng được tẩm ướp trước khi nướng và ăn kèm với các loại rau sống. Đây là một món đặc sản trong ẩm thực Việt Nam, có là món thức ăn đường phố mang tính bình dân khoái khẩu', 2),
(9, 'Chân gà hầm mât ong', 65000, 'https://2.bp.blogspot.com/-BgWTkCV-wCw/XEufJ-ySCLI/AAAAAAAAHf4/sNgK57DE93w7AkYN1CUpRpyxy62AKLxswCLcBGAs/s1600/51029392_2239927899599567_8682195063658250240_n.jpg', 'Chân gà là một món ăn được chế biến từ nguyên liệu là những chiếc chân của con gà bằng những phương pháp như nướng hay luộc. Chân gà nướng được tẩm ướp trước khi nướng và ăn kèm với các loại rau sống. Đây là một món đặc sản trong ẩm thực Việt Nam, có là món thức ăn đường phố mang tính bình dân khoái khẩu', 2),
(10, 'Bánh mì nướng muối ớt', 15000, 'https://www.vntrip.vn/cam-nang/wp-content/uploads/2017/10/banh-mi-nuong-muoi-ot.jpg', 'Ngon ơi là ngon nè', 2),
(11, 'Gà phô mai', 10000, 'https://media.cooky.vn/recipe/g3/29152/s800x500/recipe-cover-r29152.jpg', 'Ngon ơi là ngon nè', 2),
(12, 'Trà sữa trân châu trắng', 15000, 'https://images.foody.vn/res/g73/721439/s750x750/201881413561-tra-sua-tran-chau-trang.jpg', 'Trà sữa là loại thức uống đa dạng được tìm thấy ở nhiều nền văn hóa, bao gồm một vài cách kết hợp giữa trà và sữa. Các loại thức uống khác nhau tùy thuộc vào lượng thành phần chính của mỗi loại, phương pháp pha chế, và các thành phần khác được thêm vào. Bột trà sữa pha sẵn là một sản phẩm được sản xuất hàng loạt', 2),
(13, 'Trà sữa trân châu đường đen', 20000, 'https://cdn.alongwalker.net/img/2019/7/30/s14tnzgsOecbce6ebe26c8029396f85c57f9064707cb35fccc280150547.jpg', 'Ngon ơi là ngon nè', 2),
(15, 'Trà sửa Orikona\r\n', 30000, 'http://gongcha.com.vn/wp-content/uploads/2018/10/Hinh-Web-OKINAWA-TR%C3%80-S%E1%BB%AEA.png', 'Tên gọi Gong Cha xuất phát từ ý nghĩa trong tiếng Hoa là Trà cung đình. Thời xưa, các loại trà tốt nhất thường được các vị hoàng thân quý tộc ngự dùng. Ngày nay, Gong Cha mong muốn phục vụ các loại trà tốt nhất cho thực khách, cũng như chính tên gọi của thương hiệu. Kể từ khi được thành lập vào năm 2006 tại Đài Loan, chuỗi cửa hàng Gong Cha đã mở rộng trên khắp 19 quốc gia với 1.500 cửa hàng và con số này vẫn tiếp tục tăng trưởng không ngừng. Qua nhiều năm nỗ lực phát triển, Gong Cha đã trở nên phổ biến với khách hàng từ nhiều quốc gia và trở thành một trong những thương hiệu trà đáng tin cậy hàng đầu trên thế giới.', 1),
(17, 'Sữa chua trân châu ', 15000, 'https://images.foody.vn/res/g104/1038874/prof/s576x330/image-b1901e10-201007171231.jpeg', 'Trà sữa là loại thức uống đa dạng được tìm thấy ở nhiều nền văn hóa, bao gồm một vài cách kết hợp giữa trà và sữa. Các loại thức uống khác nhau tùy thuộc vào lượng thành phần chính của mỗi loại, phương pháp pha chế, và các thành phần khác được thêm vào. Bột trà sữa pha sẵn là một sản phẩm được sản xuất hàng loạt', 1),
(18, 'Sữa chua dâu', 30000, 'https://vcdn-suckhoe.vnecdn.net/2019/05/22/yaourt-trai-cay-1558506277-7055-1558506582.png', 'Trà sữa là loại thức uống đa dạng được tìm thấy ở nhiều nền văn hóa, bao gồm một vài cách kết hợp giữa trà và sữa. Các loại thức uống khác nhau tùy thuộc vào lượng thành phần chính của mỗi loại, phương pháp pha chế, và các thành phần khác được thêm vào. Bột trà sữa pha sẵn là một sản phẩm được sản xuất hàng loạt', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `taikhoan` varchar(20) NOT NULL,
  `matkhau` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(4, 'Nhut', '827ccb0eea8a706c4c34a16891f84e7b', 'nguyennhut@gmail.com'),
(5, 'nhut', '1234567', 'nguyenthinhut@gmail.com'),
(6, 'nhut', '25d55ad283aa400af464c76d713c07ad', 'nguyenthinhut2001@gmail.com');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
