-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 14, 2022 lúc 03:07 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `clothes_shop`
--
CREATE DATABASE `clothes_shop`;
USE `clothes_shop`;
-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `email`) VALUES
(0, 'admin', '123', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `total_price` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`cart_id`, `total_price`) VALUES
(27, '0'),
(28, '0'),
(29, '0'),
(30, '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`contact_id`, `name`, `message`, `address`, `phone`, `email`) VALUES
(1, 'demo1@gmail.com', 'ádasd', 'asss', '0912113213', ''),
(2, 'demo1@gmail.com', 'đấ', 'asss', '0912113213', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `gender` enum('Male','Female','Others') DEFAULT 'Male',
  `cart_cart_id` int(11) NOT NULL,
  `admin` int(1) NOT NULL,
  `bdate` date NOT NULL DEFAULT current_timestamp(),
  `avt` text NOT NULL DEFAULT 'img/avt/avt.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`customerID`, `phone`, `email`, `fullname`, `username`, `password`, `gender`, `cart_cart_id`, `admin`, `bdate`, `avt`) VALUES
(27, '0912113213', 'demo1@gmail.com', 'qưeqw', '1', 'e10adc3949ba59abbe56e057f20f883e', 'Others', 27, 0, '2022-06-13', 'img/avt/122025434_407428080262289_5200249438427713244_n.jpg'),
(28, '0912113213', 'admin@gmail.com', 'admin', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'Male', 28, 1, '2022-06-13', 'img/avt/126021556_3613665975419101_4174596181152765036_n.jpg'),
(29, '09', 'aaa@gmail.com', 'fullname112', '2', 'e10adc3949ba59abbe56e057f20f883e', 'Male', 29, 0, '2022-06-14', 'img/avt/124084668_1054510848305560_4051778775231500106_o.jpg'),
(30, '0912113213', 'demo1@gmail.com', 'demo', 'demo', 'e10adc3949ba59abbe56e057f20f883e', 'Male', 30, 0, '2022-06-14', 'img/avt/download.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `sub_title` mediumtext DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `postURL` mediumtext DEFAULT NULL,
  `postImage` varchar(255) DEFAULT NULL,
  `postDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`news_id`, `title`, `author`, `sub_title`, `content`, `postURL`, `postImage`, `postDate`) VALUES
(11, 'THE BEST TENNIS CLOTHING BRANDS TO HELP YOU ACE YOUR COURT STYLE', 'Arden Fanning Andrews', 'The best tenniswear brands are very aware of 2022’s fashion-first take on courtside dressing.', '<p>The best tenniswear brands are very aware of 2022’s fashion-first take on courtside dressing. After seasons dominated by high-design athleisure and balletcore, tenniscore has emerged as this year’s answer to a string of anything-can-be-core revivals inspired by classic sports aesthetics. According to industry insiders and experts creating the latest collections, there’s a logic behind this slice of inspiration.</p>\n    <p>“Tennis has always been associated with elegance, including from a sartorial point of view,” says Catherine Spindler, chief brand officer of Lacoste. Spindler acknowledges that style codes are influencing traditional fashion houses and making their way far beyond the country club. Spindler points out that former tennis champion René Lacoste founded the brand in 1933 with deep roots in the sport—he developed a ball-throwing machine for training solo and later invented the polo shirt, “which has become a fashion icon adopted by all.” Now, these “sporty influenced pieces are worn in a professional environment as well as for an evening out,” she says.</p>', 'https://www.vogue.com/article/best-tennis-brands', 'img/news/news-11.jpg', 'June 8, 2022'),
(12, 'FALL 2022 WOMEN\'S CAMPAIGN', 'Fabien Baron', 'Dior unveils images from the campaign for the Fall 2022 collection by Maria GraZia Chiuri', '<p>With her Dior Fall 2022 line, Maria Grazia Chiuri initiated a dialogue between the history of Dior and the contemporary world, which has now been brought to life through group portraits shot by Alice Mann. The campaign reflects a renewed sense of self-affirmation, highlighting a powerful, multiform femininity. It pays homage to the fascinating figures who contributed to Monsieur Dior’s success, from sister Catherine to muse Mizza Bricard and loyal collaborator Marguerite Carré. </p>\n    <p>The emblematic Dior family burlap bags have been transformed into a symbol of sisterhood – in keeping with a major inspiration for the line, namely uniforms – with the motto “L\'union fait la force” (“Strength through unity”) adorning skirts and jackets, alongside the iconic Dior Book Tote. The daring looks come alive for the South African artist’s lens, expressing fundamental values such as togetherness and sharing. </p>', 'https://www.dior.com/en_vn/fashion/news-savoir-faire/folder-news-and-events/fall-2022-womens-campaign', 'img/news/news-12.jpg', 'June 10, 2022'),
(13, 'GOING ON HOLIDAY? YOU\'LL NEED SOME VACATION-WORTHY JEWELRY WHILE YOU\'RE IN PARADISE', 'Madeline Fass', 'Dressing for vacations has a different look and feel than the typical day-to-day summer style.', '<p>Dressing for vacations has a different look and feel than the typical day-to-day summer style. Let’s face it: Going on holiday is the perfect excuse to dress in fantastical, destination-worthy fashions, like dreamy caftans, tropical evening bags, or a pair of raffia-heel sandals. It’s also the best time to take advantage of the playful summer capsule and resort collections designers offer each season. And there’s no shortage of brands whose entire existence depends on dressing us in fabulous vacation wear.</p>\n    <p>But the easiest way to get that on-holiday look is via summer jewelry that instantly makes you feel like you’re in paradise (even when you’re not). Look to artisanal and handcrafted baubles to transform any ordinary summer outfits into extraordinary resort looks. We’re calling it vacation jewelry, and the genre consists of artful statement necklaces made of wooden charms, beads, macramé, or neutral stones strung on textile strands. For vacation earrings, think super-dangly drops embellished with earthy rattan, wood, and seashells that nod to the natural island scenery that, hopefully, surrounds you.</p>', 'https://www.vogue.com/slideshow/vacation-jewelry', 'img/news/news-13.jpg', 'June 7, 2022'),
(14, '26 IMPRESSIONIST FLORAL DRESSES THAT ARE AS PRETTY AS A PAINTING', 'Kristina Rutkowski', 'Florals are not necessarily a groundbreaking concept, but there was a painterly quality to the print this season that seemed almost Impressionist era-inspired.', '<p>Florals are not necessarily a groundbreaking concept, but there was a painterly quality to the print this season that seemed almost Impressionist era-inspired. Since most designer’s mood boards begin with a piece of artwork as a reference, it comes as no surprise that our favorite floral prints for summer could have been plucked from a Claude Monet masterpiece or straight from a Pierre-Auguste Renoir landscape. When applied to a romantic yet modern day silhouette, Impressionist floral dresses are the no-fail option when creating a dreamy summer wardrobe lineup.</p>\n    <p>There are a few key points to remember when looking for your own perfect frock. This trend, of course, is all about a muted pastel color palette inspired by the movement itself. Plenty of volume, ruffles, and gathered layers are necessary when it comes to construction, and a floor-sweeping gown or midi-length is a must when it comes to hemlines. Sweet smocking and pleats hit all the high notes, and an attention to trimmings—from lace to satin ribbons—further expand upon the charming mood of the trend. Make sure to look for modern shapes that will transform these prints from the past to present.</p>', 'https://www.vogue.com/slideshow/impressionist-floral-dresses', 'img/news/news-14.jpg', 'May 16, 2022'),
(15, 'STREET STYLE\'S \'IT\' BAGS OF FALL 2022', 'Irene Kim', 'It bags come in all shapes and sizes. Top handles and increasingly larger size bags began to make their mark, and the Balenciaga moto remained in the fast lane.', '<p>It bags come in all shapes and sizes. Top handles and increasingly larger size bags began to make their mark, and the Balenciaga moto remained in the fast lane. Adding a twist to the street style picture this season were curvy bags from the likes of Prada, Chanel, and Coperni.</p>\n    <p>See the bags our global street stylers carried for fall below, and check out more of the best accessories in the Street Style Trend Tracker.</p>', 'https://www.vogue.com/article/street-style-fashion-week-trends-it-bags-of-street-style-fall-2022', 'img/news/news-15.jpg', 'March 19, 2022'),
(16, '10 TRENDS FROM THE FALL 2022 SEASON THAT PUSH FASHION FORWARD', 'Steff Yotka', 'The front rows, as usual, made the headlines at the fall 2022 runway shows.', '<p>The front rows, as usual, made the headlines at the fall 2022 runway shows. Kim Kardashian wowed at Prada and Balenciaga, and all eyes were on Rihanna at Gucci, Off-White, and Christian Dior. But now that the season is over, what Vogue editors around the world can’t stop talking about is the fashion. From New York to Paris, the garments that designers proposed have a revitalized pragmatism and grace, with none—or at least fewer—of the logos, wacky prints, or gimmicky silhouettes that have defined recent seasons. </p>\n    <p>Fall 2022’s best clothes are pieces to live in that reflect their wearer’s sense, intellect, and beauty. Designers rebelled against last year’s minis with hemlines that dropped to the floor, creating statuesque shapes at Saint Laurent and Rick Owens. Suits were defined by genderless, oversized blazers that hung from widened shoulders at Prada and Louis Vuitton. Lingerie dressing was toughened up with crystals and embellishments at Miu Miu and Paco Rabanne, and corsets took on protective forms at Christian Dior and Balmain. In many ways, fashion went back to basics—the suit, the skirt, the slip dress, and an overwhelming number of white shirts or tank tops styled with medium-wash jeans. </p>', 'https://www.vogue.com/article/fall-2022-fashion-week-trend-report', 'img/news/news-16.jpg', 'March 15, 2022');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `orderID` int(11) NOT NULL,
  `TotalPrice` decimal(10,0) UNSIGNED NOT NULL,
  `product_in_cart_cart_cart_id` int(11) NOT NULL,
  `product_in_cart_products_product_id` int(11) NOT NULL,
  `customer_customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `ID` int(10) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Code` varchar(100) NOT NULL,
  `Color` varchar(100) NOT NULL,
  `Image_1` mediumtext NOT NULL,
  `Image_2` mediumtext NOT NULL,
  `OPrice` varchar(100) NOT NULL,
  `PPrice` varchar(100) NOT NULL,
  `Sale` varchar(100) NOT NULL,
  `SoldOut` varchar(10) NOT NULL,
  `MOut` varchar(10) NOT NULL,
  `LOut` varchar(10) NOT NULL,
  `XLOut` varchar(10) NOT NULL,
  `Decription` longtext NOT NULL,
  `Type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`ID`, `Name`, `Code`, `Color`, `Image_1`, `Image_2`, `OPrice`, `PPrice`, `Sale`, `SoldOut`, `MOut`, `LOut`, `XLOut`, `Decription`, `Type`) VALUES
(10, 'CACOPHONY TEE', 'BKU: CO2000', 'Black', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-01-1.png', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-01-2.png', '180', '69', '38.333333333333', '', '', '', '', 'Đẹp mà!', 'Áo'),
(12, 'MINIMALISM TEE', 'BKU: CO2002', 'Black', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-03-1.png', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-03-2.png', '180', '69', '38.333333333333', '', '', '', '', 'Đơn giản ha!', 'Áo'),
(13, 'PIXEL ICON TEE', 'BKU: CO2003', 'Black', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-04-1.png', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-04-2.png', '180', '99', '55', '', '', '', '', 'Nhìn trất\'sss nha!', 'Áo'),
(14, 'THE RACE TEE', 'BKU: CO2004', 'Black', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-05-1.png', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-05-2.png', '180', '99', '55', '', '', '', '', 'Nhìn năng động thế!', 'Áo'),
(15, 'CHALLENGE OF LOVE TEE', 'BKU: CO2005', 'Black', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-06-1.png', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-06-2.png', '180', '99', '55', '', '', '', '', 'Thật dễ thương phải không nào!', 'Áo'),
(16, 'WORLDWIDE LOGO TEE', 'BKU: CO2006', 'Black', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-07-1.png', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-07-2.png', '180', '99', '55', '', '', '', '', 'Đẹp mà đúng không!', 'Áo'),
(18, 'TAG ME TEE', 'BKU: CO2008', 'Coban Blue', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-09-1.png', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-09-2.png', '180', '69', '38.333333333333', '', '', '', '', '', 'Áo'),
(19, 'SAIGON TOUR TEE', 'BKU: CO2009', 'Black', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-10-1.png', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-10-2.png', '180', '79', '43.888888888889', '', '', '', '', 'Du lịch thôi!', 'Áo'),
(20, 'SAIGON TOUR TEE', 'BKU: CO2010', 'White', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-11-1.png', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-11-2.png', '180', '79', '43.888888888889', '', '', '', '', 'Du lịch thôi!', 'Áo'),
(21, 'HM STUDIO IN DOWNTOWN SHIRT', 'BKU: CO2011', 'Matcha', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-12-1.png', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-12-2.png', '250', '99', '39.6', '', '', '', '', '', 'Áo'),
(22, 'HM STUDIO IN DOWNTOWN SHIRT', 'BKU: CO2012', 'White', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-23-1.png', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-23-2.png', '250', '99', '39.6', '', '', '', '', '', 'Áo'),
(23, 'BARCODE TEE', 'BKU: CO2013', 'Black', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-13-1.png', '', '180', '69', '38.333333333333', '', '', '', '', '', 'Áo'),
(24, 'BARCODE TEE', 'BKU: CO2014', 'White', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-14-1.png', '', '180', '69', '38.333333333333', '', '', '', '', '', 'Áo'),
(25, 'BARCODE TEE', 'BKU: CO2015', 'Xanh', 'C:/xampp/htdocs/Assignment_Web_2022/images/Product-15-1.png', '', '180', '69', '38.333333333333', '', '', '', '', '', 'Áo'),
(28, 'BBâ', '123', 'WHITE', 'C:/xampp/htdocs/Assignment_Web_2022/images/download (2).jpg', 'C:/xampp/htdocs/Assignment_Web_2022/images/download (3).jpg', '1800', '170', '9.4444444444444', '', '', '', '', '', 'Quần');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `discription` varchar(1000) DEFAULT NULL,
  `product_image` longtext DEFAULT NULL COMMENT 'This one stores the relative path to the image of local folder\n',
  `unit_price` decimal(10,0) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `discription`, `product_image`, `unit_price`, `name`) VALUES
(0, 'This is a demo product', 'https://previews.123rf.com/images/petro/petro1405/petro140500075/28708560-variet%C3%A0-di-abiti-appesi-su-rack-in-boutique.jpg', '120000', 'Demo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_edit_history`
--

CREATE TABLE `product_edit_history` (
  `admin_admin_id` int(11) NOT NULL,
  `products_product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_in_cart`
--

CREATE TABLE `product_in_cart` (
  `p_c_id` int(11) NOT NULL,
  `quantity` decimal(10,0) NOT NULL,
  `cart_cart_id` int(11) NOT NULL,
  `products_product_id1` int(11) NOT NULL,
  `size` enum('S','M','L','XL','XXL','XXXL') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product_in_cart`
--

INSERT INTO `product_in_cart` (`p_c_id`, `quantity`, `cart_cart_id`, `products_product_id1`, `size`) VALUES
(1, '10', 27, 17, 'M'),
(4, '3', 27, 17, 'XL'),
(7, '5', 27, 17, 'L'),
(8, '1', 27, 26, 'M'),
(9, '3', 29, 26, 'M'),
(10, '2', 29, 26, 'L'),
(11, '2', 29, 17, 'M'),
(12, '4', 30, 27, 'M');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`),
  ADD KEY `fk_customer_cart` (`cart_cart_id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `fk_order_product_in_cart1` (`product_in_cart_cart_cart_id`,`product_in_cart_products_product_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `product_edit_history`
--
ALTER TABLE `product_edit_history`
  ADD KEY `fk_product_edit_history_admin1` (`admin_admin_id`),
  ADD KEY `fk_product_edit_history_products1` (`products_product_id`);

--
-- Chỉ mục cho bảng `product_in_cart`
--
ALTER TABLE `product_in_cart`
  ADD PRIMARY KEY (`p_c_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `product_in_cart`
--
ALTER TABLE `product_in_cart`
  MODIFY `p_c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `product_edit_history`
--
ALTER TABLE `product_edit_history`
  ADD CONSTRAINT `fk_product_edit_history_admin1` FOREIGN KEY (`admin_admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_edit_history_products1` FOREIGN KEY (`products_product_id`) REFERENCES `products` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
