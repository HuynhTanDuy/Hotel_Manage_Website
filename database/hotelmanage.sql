-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 28, 2019 lúc 07:56 AM
-- Phiên bản máy phục vụ: 10.1.39-MariaDB
-- Phiên bản PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hotelmanage`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `body` varchar(1000) NOT NULL,
  `image` varchar(200) NOT NULL,
  `video` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `about`
--

INSERT INTO `about` (`id`, `body`, `image`, `video`) VALUES
(1, 'Paradise Resort tọa lạc giữa trung tâm thương mại TP.Hồ Chí Minh, bên dòng Sài Gòn được thiết kế theo kiến trúc Pháp cổ kính, sang trọng, ấm cúng. Với khung cảnh thơ mộng, hữu tình và vị trí gần các trung tâm thương mại lớn, các nhà hàng nổi tiếng, Bar – Vũ trường – Karaoke… Khách sạn Riverside là nơi thuận tiện cho khách tham quan, công tác, ăn uống, mua sắm và vui chơi giải trí. Khách sạn Riverside còn là địa điểm lý tưởng dành cho khách thương mại, du lịch thư giãn, nghỉ ngơi bởi không khí trong lành, thoáng mát bên bờ sông.', 'images/img_1.jpg', 'https://www.youtube.com/watch?v=uy4fArvRfDA');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_food`
--

CREATE TABLE `category_food` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category_food`
--

INSERT INTO `category_food` (`id`, `name`) VALUES
(1, 'Mains'),
(2, 'Desserts'),
(3, 'Drinks');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_room`
--

CREATE TABLE `category_room` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category_room`
--

INSERT INTO `category_room` (`id`, `name`, `image`, `price`, `description`) VALUES
(1, 'Single Room', 'images/img_1.jpg', '90', 'Phòng được thiết kế ưu tiên sự riêng tư và tính cá nhân của khách hàng. Phòng rộng 50m vuông, đẩy đủ các tiện nghi.'),
(2, 'Family Room', 'images/img_2.jpg', '120', 'Sang trọng nhưng không kém phần ấm cúng. Căn phòng được trang bị mọi tiện ích đi kèm để phục vụ cho nhu cầu của cả gia đình bạn.'),
(3, 'Presidential Room', 'images/img_3.jpg', '250', 'Căn phòng được thiết kế dành riêng cho giới quý tộc. Với thiết kế hiện đại, trẻ trung cùng các dịch vụ đi kèm phong phú sẽ làm hài lòng những vị khách khó tính nhất. ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `description`
--

CREATE TABLE `description` (
  `id` int(11) NOT NULL,
  `room` varchar(1000) NOT NULL,
  `photo` varchar(1000) NOT NULL,
  `menu` varchar(1000) NOT NULL,
  `event` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `description`
--

INSERT INTO `description` (`id`, `room`, `photo`, `menu`, `event`) VALUES
(1, 'Khách sạn với 51 phòng rộng rãi, sang trọng đạt tiêu chuẩn quốc tế 3 sao. Các phòng Single, Family và Presidential Room được trang trí nội thất bằng các đồ gỗ quý giá với những cửa sổ hướng ra sông, giúp quý khách tận hưởng trọn vẹn không khí trong lành và ngắm nhìn thành phố lung linh về đêm. Với đội ngũ nhân viên tiếp đón lịch sự, ân cần, nhiều kinh nghiệm, Paradise Resort chắc chắn là nơi đáp ứng cao nhất mọi tiện nghi, dịch vụ cho quý khách.', 'Cùng tham quan khách sạn với bộ ảnh siêu lung linh được chụp bởi chính những quý khách đã có thời gian nghỉ ngơi tuyệt vời tại đây', 'Tự hào là chuỗi nhà hàng chuyên về steak và các món Âu được thiết kế cho người Việt, với giá Việt. Chúng tôi quan tâm tới trải nghiệm của khách hàng, thiết kế các loại combo Family và Lover đặc biệt cho các gia đình và cặp đôi; tới hướng dẫn nhân viên tư vấn nhiệt tình về các loại thịt bò và cách thưởng thức.', 'Cùng chào đón loạt sự kiện khuyến mãi nhân dịp hè 2019. Cùng gia đình tận hưởng một kì nghỉ tuyệt vời !');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `details_bill`
--

CREATE TABLE `details_bill` (
  `id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `idReservation` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `details_bill`
--

INSERT INTO `details_bill` (`id`, `content`, `price`, `idReservation`, `created_at`, `updated_at`) VALUES
(3, 'Tiền phòng', '360', 16, NULL, NULL),
(4, 'Tiền phòng', '1320', 17, NULL, NULL),
(5, 'Tiền phòng', '810', 19, '2019-10-28', '2019-10-28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `body` varchar(1000) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `event`
--

INSERT INTO `event` (`id`, `name`, `body`, `image`, `created_at`) VALUES
(3, 'Khách sạn Paradise Resort khuyến mại trọn gói 3 ngày 2 đêm CHỈ 2,1 triệu/ người', '1 phòng Suite tại Khách sạn Paradise Suites dành cho gia đình 2 người lớn cho 2 đêm, MIỄN PHÍ cho 1 bé dưới 5 tuổi.Xe đưa đón 2 chiều, Hà Nội – Hạ Long – Hà Nội tại 49 Hai Bà Trưng Hà Nội2 Buffet sáng tại Khách sạn Paradise Suites2 bữa trưa và 1 bữa tối tại nhà hàng 1958 ngon nổi tiếng tại Hạ Long (hiện đang đứng số 1 trên tripadvisor)', 'images/slider-6.jpg', '2019-04-02 13:19:04'),
(4, 'Chương trình tri ân khách hàng tại Khách Sạn Paradise Resort', 'Khi đặt phòng tại khách sạn quý khách sẽ được sử dụng các dịch vụ miễn phí như: Hồ bơi, sân tennis, phòng gym….và được 1 xuất ăn sáng phong phú.Đặc biệt, giá phòng sẽ ưu đãi hơn khi bạn đặt phòng tại website khách sạn.', 'images/slider-7.jpg', '2019-04-02 13:19:04'),
(5, 'Tận hưởng mùa hè 2017 cùng Paradise Resort', 'TẬN HƯỞNG MÙA HÈ CÙNG Paradise Resort\r\nÁp dụng từ 18/7/2017 đến 30/09/2017 với tất cả các loại phòng trong khách sạn\r\nChỉ từ 380.000vnđ trở lên bạn đã nhận ngay một phòng tại khách sạn 2 sao.', 'images/slider-3.jpg', '2019-04-02 13:19:04'),
(8, 'Từng bừng khuyến mãi Hè 2019 cùng Paradise Resort. Giảm giá 80% tất cả loại phòng.', 'That\'s Cú lừa', 'Ngân-Hòa14.jpg', '2019-04-07 02:52:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` varchar(200) NOT NULL,
  `idCategory` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `food`
--

INSERT INTO `food` (`id`, `name`, `description`, `price`, `idCategory`) VALUES
(1, 'Black Caviar Italy 30g', 'Blinis Sour Cream Shallot Egg Parsley', '105', 1),
(2, 'Wagyu Beef', 'French Fries Chilli Aïoli', '25', 1),
(3, 'Confit Foie Gras in a Jar', 'Chilli Fig Jam', '70', 1),
(4, 'Crispy Duck Pancakes\r\n', 'Hoisin Cucumber Spring Onion Shallot Chilli\r\n', '45', 1),
(5, 'French Fries ', 'Truffle Oil Parmesan', '20', 1),
(6, 'Crab Avocado', 'Mayonnaise Chilli Coriander', '34', 1),
(7, 'The Deck Chocolate Bomb', 'Poached Berries Lemongrass Caramel Vanilla Ice Cream', '10', 2),
(8, 'Chocolate / Yuzu Lime Fondant', 'Choice of Ice Cream', '12', 2),
(9, 'Passion Fruit Cheesecake', 'Passion Fruit Sauce', '9', 2),
(10, 'Greek Yoghurt Dong Nai Fig Tart', 'Pistachio Crust Phú Quốc Pepper Bamboo Charcoal Ice Cream', '9', 2),
(11, 'Trio of Crème Brûlée', 'Passion Fruit Vanilla Lemongrass', '10', 2),
(12, 'Baked Camembert', 'Truffle Oil Honey Garlic Walnuts Baguette', '15', 2),
(13, 'Allan Scott 2018', 'Sauvignon Blanc Marlborough New Zealand', '89', 3),
(14, 'Villa Maria Private Bin 2017', 'Sauvignon Blanc Marlborough New Zealand', '110', 3),
(15, 'The Deck Bellini', 'Peach Schnapps Peach Prosecco', '20', 3),
(16, 'Lawson’s Dry Hills 2015', 'Pinot Noir Marlborough New Zealand', '170', 3),
(17, 'Laroche 2017', 'Chablis France', '25', 3),
(18, 'Yalumba Y Series 2017', 'Pinot Grigio Barossa Australia', '50', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `information`
--

CREATE TABLE `information` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `slogan` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone_number` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `information`
--

INSERT INTO `information` (`id`, `name`, `slogan`, `email`, `phone_number`, `address`) VALUES
(0, 'Paradise Resort', 'A Best Place To Stay', 'tanduyht@gmail.com', '0332725110', '17 Tran Van On, Tam Ky City');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `idRoom` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `DateIn` datetime NOT NULL,
  `DateOut` datetime NOT NULL,
  `Numbers` int(11) NOT NULL,
  `Notes` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `reservation`
--

INSERT INTO `reservation` (`id`, `idRoom`, `name`, `phone`, `email`, `DateIn`, `DateOut`, `Numbers`, `Notes`) VALUES
(15, 12, 'Chủ tịch', '11112213', 'phubui2702@gmail.com', '2019-06-23 00:00:00', '2019-06-26 00:00:00', 1, 'Giàu'),
(16, 6, 'Phan Trọng Ba', '0332725110', 'ba@gmail.com', '2019-09-21 00:00:00', '2019-09-25 00:00:00', 2, 'aa'),
(17, 8, 'Thái Thăng', '0332725110', 'thang@gmail.com', '2019-10-30 00:00:00', '2019-11-10 00:00:00', 4, 'Không trang trí hoa trong phòng'),
(18, 1, 'an', '0332725110', 'hazard10@gmail.com', '2019-11-11 00:00:00', '2019-11-20 00:00:00', 1, '1'),
(19, 2, 'an', '0332725110', 'hazard10@gmail.com', '2019-11-11 00:00:00', '2019-11-20 00:00:00', 1, '1'),
(20, 7, 'duy', '0332725110', '16520287@gm.uit.edu.vn', '1111-01-01 00:00:00', '1111-01-02 00:00:00', 3, '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `author` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `body` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `review`
--

INSERT INTO `review` (`id`, `author`, `image`, `body`) VALUES
(1, 'Tấn Duy', 'images/person_1.jpg', 'Khách sạn tuy được xây dựng lâu, tuy nhiên, khá sạch sẽ. Diện tích phòng lớn, giá cả hợp lý.'),
(2, 'Phương Duy', 'images/person_2.jpg', 'Phòng no smoking mà ngập tràn mùi thuốc lá. Khi yêu cầu đổi phòng có cửa sổ thì tính thêm phí 40usd một đêm. Ăn sáng thì đưa cho khách sữa chua đã hết hạn hơn 5 ngày.'),
(3, 'Văn Vinh', 'images/person_3.jpg', 'Địa điểm là tốt. Bên cạnh sự thuận tiện của sông. Phòng lớn. Giá là rất tốt đẹp.'),
(4, 'Thế Vĩ', 'images/person_1.jpg', 'Bữa sáng nghèo nàn so với 1 khách sạn 3 sao trung tâm. Phòng nhỏ, chật chội, nội thất cũ kĩ và không có cửa sổ.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `idCategory` int(11) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `room`
--

INSERT INTO `room` (`id`, `name`, `idCategory`, `Status`) VALUES
(1, 'A100', 1, 0),
(2, 'A101', 1, 0),
(6, 'A102', 1, 0),
(7, 'A104', 1, 0),
(8, 'B100', 2, 0),
(9, 'B101', 2, 1),
(10, 'B102', 2, 1),
(11, 'C100', 3, 1),
(12, 'C101', 3, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `link` varchar(200) NOT NULL,
  `caption` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `link`, `caption`) VALUES
(1, 'images/slider-1.jpg', 'Đây là ảnh 1'),
(2, 'images/slider-2.jpg', 'Đây là ảnh 24'),
(3, 'images/slider-3.jpg', 'Đây là ảnh 3'),
(4, 'images/slider-4.jpg', 'Đây là ảnh 4'),
(5, 'images/slider-5.jpg', 'Đây là ảnh 5'),
(6, 'images/slider-6.jpg', 'Đây là ảnh 6'),
(7, 'images/slider-7.jpg', 'Đây là ảnh 7');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `password`) VALUES
(2, 'admin', '$2y$10$i2ZTIQc.O1U2r0kGcUip0eoh3jLd9v1Mu1JmvaE.95yv34p3kFNzS');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category_food`
--
ALTER TABLE `category_food`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category_room`
--
ALTER TABLE `category_room`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `description`
--
ALTER TABLE `description`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `details_bill`
--
ALTER TABLE `details_bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_reservation` (`idReservation`);

--
-- Chỉ mục cho bảng `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_CategoryFood` (`idCategory`);

--
-- Chỉ mục cho bảng `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Room` (`idRoom`);

--
-- Chỉ mục cho bảng `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_CategoryRooms` (`idCategory`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
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
-- AUTO_INCREMENT cho bảng `details_bill`
--
ALTER TABLE `details_bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `details_bill`
--
ALTER TABLE `details_bill`
  ADD CONSTRAINT `FK_reservation` FOREIGN KEY (`idReservation`) REFERENCES `reservation` (`id`);

--
-- Các ràng buộc cho bảng `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `FK_CategoryFood` FOREIGN KEY (`idCategory`) REFERENCES `category_food` (`id`);

--
-- Các ràng buộc cho bảng `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `FK_Room` FOREIGN KEY (`idRoom`) REFERENCES `room` (`id`);

--
-- Các ràng buộc cho bảng `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `FK_CategoryRooms` FOREIGN KEY (`idCategory`) REFERENCES `category_room` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
