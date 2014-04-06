-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 18. Juli 2012 jam 03:01
-- Versi Server: 5.5.8
-- Versi PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `banyu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `advisor_factory_review`
--

CREATE TABLE IF NOT EXISTS `advisor_factory_review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `factory_id` int(11) DEFAULT NULL,
  `reference_code` varchar(100) DEFAULT NULL,
  `num_reviews` int(11) DEFAULT NULL,
  `average_value` float DEFAULT NULL,
  `detil_rating` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data untuk tabel `advisor_factory_review`
--

INSERT INTO `advisor_factory_review` (`id`, `factory_id`, `reference_code`, `num_reviews`, `average_value`, `detil_rating`) VALUES
(1, 3, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 4, 3, '{"3":4}'),
(12, 10, 'd3d9446802a44259755d38e6d163e820', 4, 5, '{"5":4}'),
(14, 7, '8f14e45fceea167a5a36dedd4bea2543', 0, 0, '[]'),
(15, 25, '8e296a067a37563370ded05f5a3bf3ec', 1, 4, '{"4":2}'),
(17, 34, 'e369853df766fa44e1ed0ff613f563bd', 0, 0, '[]');

-- --------------------------------------------------------

--
-- Struktur dari tabel `advisor_factory_subrating`
--

CREATE TABLE IF NOT EXISTS `advisor_factory_subrating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_code` varchar(100) DEFAULT NULL,
  `sub_rating_id` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `num_review` int(11) DEFAULT NULL,
  `average` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data untuk tabel `advisor_factory_subrating`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `advisor_rating`
--

CREATE TABLE IF NOT EXISTS `advisor_rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `advisor_rating`
--

INSERT INTO `advisor_rating` (`id`, `title`) VALUES
(1, 'Communication'),
(2, 'Sampling'),
(3, 'Follow up of the orders'),
(4, 'Quality of goods'),
(5, 'Delivery'),
(6, 'Documentation');

-- --------------------------------------------------------

--
-- Struktur dari tabel `advisor_reviewrating`
--

CREATE TABLE IF NOT EXISTS `advisor_reviewrating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `review_id` int(11) DEFAULT NULL,
  `rating_id` int(11) DEFAULT NULL,
  `value` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=197 ;

--
-- Dumping data untuk tabel `advisor_reviewrating`
--

INSERT INTO `advisor_reviewrating` (`id`, `review_id`, `rating_id`, `value`) VALUES
(22, 15, 1, '4'),
(23, 15, 5, '3'),
(24, 16, 1, '4'),
(25, 16, 5, '3'),
(43, 30, 1, '4'),
(44, 30, 2, '4'),
(45, 30, 3, '4'),
(46, 30, 4, '2'),
(47, 30, 5, '3'),
(48, 30, 6, '3'),
(49, 31, 1, '3'),
(50, 31, 2, '5'),
(51, 31, 3, '3'),
(52, 31, 4, '4'),
(53, 31, 5, '2'),
(54, 31, 6, '3'),
(55, 32, 1, '3'),
(56, 32, 2, '5'),
(57, 32, 3, '3'),
(58, 32, 4, '4'),
(59, 32, 5, '2'),
(60, 32, 6, '3'),
(97, 43, 2, '3'),
(98, 44, 2, '3'),
(99, 45, 2, '3'),
(100, 46, 2, '3'),
(120, 51, 1, '2'),
(121, 51, 2, '3'),
(122, 51, 3, '3'),
(123, 51, 4, '5'),
(124, 51, 5, '3'),
(125, 51, 6, '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `advisor_reviews`
--

CREATE TABLE IF NOT EXISTS `advisor_reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_code` varchar(100) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `review` text,
  `rating` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `advice` text,
  `create_date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data untuk tabel `advisor_reviews`
--

INSERT INTO `advisor_reviews` (`id`, `reference_code`, `title`, `review`, `rating`, `user_id`, `advice`, `create_date`) VALUES
(13, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'love Great communication', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '3', 2, NULL, '1324832482'),
(14, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'love Great communication', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '3', 2, NULL, '1324832609'),
(15, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'love Great communication', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '3', 2, NULL, '1324832748'),
(16, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'love Great communication', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '3', 2, NULL, '1324832803'),
(30, 'd3d9446802a44259755d38e6d163e820', 'Great communication', 'asdasdasd', '5', 2, NULL, '1330262221'),
(31, 'd3d9446802a44259755d38e6d163e820', 'Truly beautiful street in Gion. Even better atmosphere at night', 'I love Shimbashi-dori! It''s a beautiful little street in the heart of Gion. I think it''s a must see. It''s a beautifully quaint cobblestone road lined with trees and a beautiful stream. Ryokans and tea houses straddle the stream and its stunning during all times of the year (see photos attached. They are from different visits to Kyoto to show how it can look at different times of the year). It''s a few streets north of Shijo-dori, the main street in Gion and easy to find.', '5', 2, NULL, '1330264909'),
(32, 'd3d9446802a44259755d38e6d163e820', 'Truly beautiful street in Gion. Even better atmosphere at night', 'I love Shimbashi-dori! It''s a beautiful little street in the heart of Gion. I think it''s a must see. It''s a beautifully quaint cobblestone road lined with trees and a beautiful stream. Ryokans and tea houses straddle the stream and its stunning during all times of the year (see photos attached. They are from different visits to Kyoto to show how it can look at different times of the year). It''s a few streets north of Shijo-dori, the main street in Gion and easy to find.', '5', 2, NULL, '1330264976'),
(33, 'd3d9446802a44259755d38e6d163e820', 'Truly beautiful street in Gion. Even better atmosphere at night', 'I love Shimbashi-dori! It''s a beautiful little street in the heart of Gion. I think it''s a must see. It''s a beautifully quaint cobblestone road lined with trees and a beautiful stream. Ryokans and tea houses straddle the stream and its stunning during all times of the year (see photos attached. They are from different visits to Kyoto to show how it can look at different times of the year). It''s a few streets north of Shijo-dori, the main street in Gion and easy to find.', '5', 2, NULL, '1330265040'),
(51, '8e296a067a37563370ded05f5a3bf3ec', 'sad', 'sadasd', '4', 2, NULL, '1331735970');

-- --------------------------------------------------------

--
-- Struktur dari tabel `advisor_review_photo`
--

CREATE TABLE IF NOT EXISTS `advisor_review_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `review_id` int(11) DEFAULT NULL,
  `reference_code` varchar(100) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data untuk tabel `advisor_review_photo`
--

INSERT INTO `advisor_review_photo` (`id`, `review_id`, `reference_code`, `filename`, `caption`) VALUES
(28, 51, '8e296a067a37563370ded05f5a3bf3ec', 'Boston-Nevado-(Prudential-B.jpg', 'asdsd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `email_newsletter`
--

CREATE TABLE IF NOT EXISTS `email_newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `register_date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data untuk tabel `email_newsletter`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `factory`
--

CREATE TABLE IF NOT EXISTS `factory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_person` varchar(255) DEFAULT NULL,
  `pre_contact` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `telp_number` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `distric` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `user_created` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data untuk tabel `factory`
--

INSERT INTO `factory` (`id`, `contact_person`, `pre_contact`, `company_name`, `telp_number`, `mobile`, `fax`, `email`, `address`, `distric`, `city`, `status`, `user_created`) VALUES
(1, 'Omar Quader Khan', 'M.D.', 'Desh Garments Ltd', '02-9894241, 02-8828505', '01819-219777', '02-8826049', 'desh@deshgroup.com', 'Awal Centre (7th Floor), 34, Kemal Ataturk Avenue', 'Banani', 'Dhaka-1213', NULL, NULL),
(2, 'Naveed Hashmet', 'Director', 'Youngones (Bangladesh) Ltd.', '031-715100, 031-716235', '', '031-710061', 'yobctg@globalctg.net', '24, Agrabad C/A, Jahan Building # 2', '', 'Chittagong', NULL, NULL),
(3, 'Mohammad Mosharraf Hossain', 'M.D.', 'York Garments Inds. Ltd.', ', ', '', '02-8823702', '', '11, Mohakhali C/A (1st floor), ', 'Gulshan', 'Dhaka-1212', NULL, NULL),
(5, 'Shamsun Nahar Ahmed', 'M.D.', 'Baishaki Garments Ltd.', '02-9669404, 02-8617236', '01911750362', '02-8313523', '', '87, New Elephant Road, ', 'Dhanmondi', 'Dhaka-1205', NULL, NULL),
(7, 'Mohd. Giasuddin', 'M.D.', 'Reaz Garments Ltd.', '02-9136346, 9124634-6', '01711530860', '02-9123010', 'gias@reazbd.com', 'BTMC Bhaban (3rd Floor), 7-9, Kawran Bazar', 'Kawran Bazar', 'Dhaka-1215', NULL, NULL),
(9, 'Mohammed Nasir', 'M.D.', 'Ashraf Garments (Pvt.) Ltd.', '02-8828183, ', '01819-311196', '02-8811478', 'masudapp@bol-online.com', 'House # 79 (4th Floor), Block-D, New Airport Road', 'Banani', 'Dhaka-1213', NULL, NULL),
(10, 'Muneer Hussain', 'M.D.', 'Continental Garments Inds. (Pvt) Ltd.', '02-7792376-7, 02-7792410', '01711-541443', '02-7792413', 'delwar@continental-bd.com', '8, Dewan Idris Road, Bora Rangamatia, Ashulia', 'Savar', 'Dhaka', NULL, NULL),
(11, 'Mahbubur Rahman', 'M.D.', 'Shapla Garments Ltd.', '02-8827982, 02-8827605', '', '02-8826093', '', '103, Mohakhali C/A,, ', 'Mohakhali', 'Dhaka-1212', NULL, NULL),
(12, 'Md. Humayun', 'Chairman', 'Paris Garments (Pvt). Ltd.', '02-9139589, ', '01727-496072', '02-8189193', 'zaman@parisgarments.com', '1, DIT Market (2nd Floor), ', 'Kawran Bazar', 'Dhaka-1215', NULL, NULL),
(15, 'Maizuddin Ahmed Chowdhury', 'Director', 'Beauty Garments (Pvt) Ltd.', '02-8850473, 02-8852751', '01711305697', '02-8852751', 'beautygm@bijoy.net', 'Holland Center (7th Floor), Cha-72/1-B, Middle Badda', 'Badda', 'Dhaka-1212', NULL, NULL),
(16, 'Mahmud Hasan Nur', 'M.D.', 'Central Garments Industry Ltd.', '02-9358780, 01715-228200', '01715228200', '02-8318015', 'neptune@bttb.net.bd', 'Flat A-2, Property Mention, 1, Noa Ratan Colony', 'New Baily Road', 'Dhaka', NULL, NULL),
(17, 'Sayeeful Islam', 'M.D.', 'Concorde Garments Ltd.', '02-8118151, 02-8118139', '01711527439', '02-8113678', 'cgl@concorde.bangla.net', 'Jahangir Tower (4th floor), 10, Kawran Bazar', 'Kawran Bazar', 'Dhaka-1215', NULL, NULL),
(18, 'Ferdous Amin', 'Director', 'Smart Apparels (Pte) Limited', '02-981316, 02-9813377', '01712843549', '02-9800581', 'smart@eltechco.net', '239 Auchpara, ', 'Tongi', 'Gazipur', NULL, NULL),
(20, 'Ramzul Seraj', 'M.D.', 'Elite Garments Inds. Ltd.', '02-8859998, 02-8857884', '01711-526555', '02-9883681', 'elite@citechco.net', 'South Avenue Tower (2nd Floor), House # 50, Road # 3, 7 Gulshan Avenue', 'Gulshan-1', 'Dhaka-1212', NULL, NULL),
(23, 'Nasrat Khalil Choudhury', 'Director', 'Khalil Garments Ltd.', '02-8313442, 02-9331139', '01711526759', '02-8313943', 'khalilg@siriusbb.com', 'KRC Bhaban (2nd Floor), 1/1, North Kamalapur', 'Kamalapur', 'Dhaka-1000', NULL, NULL),
(24, 'R.A. Khan', 'M.D.', 'Jupiter Readymade Garments Ltd.', '02-8012022, 02-8015311', '01711523846', '02-8013367', 'jupiter@dekko.net.bd', 'Plot # I/2, Road # 6, Section # 7', 'Mirpur', 'Dhaka', NULL, NULL),
(25, 'nakos', NULL, 'Good project', 'sadasd', NULL, NULL, NULL, 'saasdas', '', '', NULL, '2'),
(34, 'dasdasd', NULL, 'testing yaasdsa', '', NULL, NULL, NULL, '', '', '', NULL, '1'),
(36, 'asdasdasd', NULL, 'asdsadsad', '', NULL, NULL, NULL, 'to rani', '', '', NULL, '2'),
(37, 'try this', NULL, 'Uji coba saya', '', NULL, NULL, NULL, '', '', '', NULL, '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `shop_address`
--

CREATE TABLE IF NOT EXISTS `shop_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `shop_address`
--

INSERT INTO `shop_address` (`id`, `firstname`, `lastname`, `street`, `zipcode`, `city`, `country`) VALUES
(1, 'budi', 'sunarko', 'jl', '60121', 'jakarta', 'indonesia'),
(2, 'budi', 'sunarko', 'jl', '60121', 'jakarta', 'indonesia'),
(3, 'budi', 'sunarko', 'jl', '60121', 'jakarta', 'indonesia'),
(4, 'budi', 'sunarko', 'jl', '60121', 'jakarta', 'indonesia'),
(5, 'budi', 'sunarko', 'jl', '60121', 'jakarta', 'indonesia'),
(6, 'budi', 'sunarko', 'jl', '60121', 'jakarta', 'indonesia'),
(7, 'budi', 'sunarko', 'jl', '60121', 'jakarta', 'indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `shop_category`
--

CREATE TABLE IF NOT EXISTS `shop_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(45) NOT NULL,
  `description` text,
  `language` varchar(45) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `shop_category`
--

INSERT INTO `shop_category` (`category_id`, `parent_id`, `title`, `description`, `language`, `store_id`) VALUES
(1, 0, 'Primary Articles', NULL, NULL, NULL),
(2, 0, 'Secondary Articles', NULL, NULL, NULL),
(3, 1, 'Red Primary Articles', NULL, NULL, NULL),
(4, 1, 'Green Primary Articles', NULL, NULL, NULL),
(5, 2, 'Red Secondary Articles', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `shop_customer`
--

CREATE TABLE IF NOT EXISTS `shop_customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `address_id` int(11) NOT NULL,
  `delivery_address_id` int(11) NOT NULL,
  `billing_address_id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `shop_customer`
--

INSERT INTO `shop_customer` (`customer_id`, `user_id`, `address_id`, `delivery_address_id`, `billing_address_id`, `email`) VALUES
(1, 2, 1, 0, 0, 'budi@localhost.com'),
(2, 1, 3, 0, 0, 'budisunarko@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `shop_image`
--

CREATE TABLE IF NOT EXISTS `shop_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `filename` varchar(45) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Image_Products` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `shop_image`
--

INSERT INTO `shop_image` (`id`, `title`, `filename`, `product_id`) VALUES
(1, 'Jewelry greate', '564aebfa-a5bc-4738-bb4e-2568ce047d9b.jpg', 1),
(2, 'Jewelry greate', '564aebfa-a5bc-4738-bb4e-2568ce047d9b.jpg', 1),
(3, 'Tampak depan', '20120509043822cgpgC.jpg', 6),
(4, 'testing', 'IMG01460-20120530-1712.jpg', 5),
(5, 'sd', '20120509043822cgpgC.jpg', 4),
(6, 'as', '564aebfa-a5bc-4738-bb4e-2568ce047d9b.jpg', 2),
(7, 'test', 'Penguins.jpg', 3),
(8, 'sd', 'Tulips.jpg', 3),
(9, 'ss', 'Koala.jpg', 3),
(10, 't', '2640060.jpg', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `shop_order`
--

CREATE TABLE IF NOT EXISTS `shop_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `delivery_address_id` int(11) NOT NULL,
  `billing_address_id` int(11) NOT NULL,
  `ordering_date` int(11) NOT NULL,
  `ordering_done` tinyint(1) DEFAULT NULL,
  `ordering_confirmed` tinyint(1) DEFAULT NULL,
  `payment_method` int(11) NOT NULL,
  `shipping_method` int(11) NOT NULL,
  `comment` text,
  PRIMARY KEY (`order_id`),
  KEY `fk_order_customer` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `shop_order`
--

INSERT INTO `shop_order` (`order_id`, `customer_id`, `delivery_address_id`, `billing_address_id`, `ordering_date`, `ordering_done`, `ordering_confirmed`, `payment_method`, `shipping_method`, `comment`) VALUES
(1, 2, 4, 5, 1342572845, NULL, NULL, 4, 1, ''),
(2, 2, 6, 7, 1342572970, NULL, NULL, 4, 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `shop_order_position`
--

CREATE TABLE IF NOT EXISTS `shop_order_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `specifications` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `shop_order_position`
--

INSERT INTO `shop_order_position` (`id`, `order_id`, `product_id`, `amount`, `specifications`) VALUES
(1, 2, 7, 3, '{"1":["8"],"2":["9"]}');

-- --------------------------------------------------------

--
-- Struktur dari tabel `shop_payment_method`
--

CREATE TABLE IF NOT EXISTS `shop_payment_method` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `tax_id` int(11) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `shop_payment_method`
--

INSERT INTO `shop_payment_method` (`id`, `title`, `description`, `tax_id`, `price`) VALUES
(1, 'cash', 'You pay cash', 1, 0),
(2, 'advance Payment', 'You pay in advance, we deliver', 1, 0),
(3, 'cash on delivery', 'You pay when we deliver', 1, 0),
(4, 'invoice', 'We deliver and send a invoice', 1, 0),
(5, 'paypal', 'You pay by paypal', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `shop_products`
--

CREATE TABLE IF NOT EXISTS `shop_products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `tax_id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `description` text,
  `price` varchar(45) DEFAULT NULL,
  `language` varchar(45) DEFAULT NULL,
  `specifications` text,
  `store_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `fk_products_category` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `shop_products`
--

INSERT INTO `shop_products` (`product_id`, `category_id`, `tax_id`, `title`, `description`, `price`, `language`, `specifications`, `store_id`) VALUES
(1, 1, 1, 'Demonstration of Article with variations', 'Hello, World!', '19.99', NULL, NULL, 1),
(2, 1, 2, 'Another Demo Article with less Tax', '!!', '29.99', NULL, NULL, 1),
(3, 2, 1, 'Boneka EX WIN', 'Waiting on buyer feedback and after photos!\r\n\r\nPictures of before shown on this listing. Waiting for buyer to provide photos of cover after.\r\n\r\nPrice entered on this listing is not a true price as this is a promotional item, information only item, rather than a product to be purchased!\r\nPlease do not purchase this listing, it’s a helpful tool for buyers and it’s not an actual product to be purchased.\r\n\r\n*************************************************************************************************************\r\n*************************************************************************************************************\r\n\r\nHave a piece of furniture that looks old, dirty, tired, and that needs a face lift?\r\n\r\nContact me via convo with details, photo of the item, and measurements. I would be happy to give a quote for a new slip cover custom made.\r\n\r\nPrice includes labor only and buyer can choose their own fabric for the cover to be made.\r\nPhotos included on this listing are examples of before and after of projects done on etsy for other buyers!\r\n\r\nPlease Note\r\nSlip covers are an extremely popular item. I am getting lots and lots of requests daily and have many projects that I am currently working on. There are times that I will not be able to take on new projects right away; therefore please convo me for scheduling.\r\n\r\nPatterns\r\nIf someone is a skilled sewer and would like me to design a custom pattern for them to make their own slip covers I would be happy to do so.\r\n\r\nHow to measure\r\n\r\nI will need the following measurements in order to estimate:\r\n\r\nottoman\r\nwidth, length, height\r\n\r\nchair\r\ncushions (how many, are they detached)\r\nwidth, length, height\r\narm of chair\r\nwidth, length, height\r\nback of chair\r\nwidth, depth and height\r\nseat of chair\r\ndepth, width and height\r\n\r\nCouch\r\ncushions (how many, are they detached)\r\nwidth, length, height\r\narm of couch\r\nwidth, length, height\r\nback of couch\r\nwidth, depth and height\r\nseat of couch\r\ndepth, width and height\r\n\r\nFor Sectional Pieces\r\nRepeat all measurements for all sections of sofa separately\r\nDo not forget to note how many cushions\r\n\r\nPrice entered on this listing is not a true price as this is a promotional item, information only item, rather than a product to be purchased!\r\nPlease do not purchase this listing, it’s a helpful tool for buyers and it’s not an actual product to be purchased.\r\n\r\nP.S. Buyers: Always please state name on inquiries, its helpful in responding back\r\n\r\nThank you for visting my shop! ', '90000', NULL, '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":""}', 1),
(4, 4, 1, 'Demo4', '', '7, 55', NULL, NULL, 1),
(5, 1, 0, 'Test Produk', 'testing ajalah', '12', NULL, '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":""}', 1),
(6, 1, 0, 'Handbag Leather nobrand', 'This handbag is made os different motifs leather\r\nIt has metal lock closure and removable shoulder strap\r\nInterior is fully lined, \r\nThere are 2 compartments + 1 zipped pocket inbetween + 1 small zipped pocket\r\nExcellent vintage conditiion\r\n\r\nBrand: DONNA LISA\r\nMade in Italy\r\nGenuine leather\r\n\r\nH 9.1" (23cm)\r\nL 10.2" (26cm)\r\nW 2.2" (5.5cm)\r\nStrap length: 45.7" (116cm)\r\n\r\n\r\nShipping: REGISTERED MAIL & INSURANCE to Etsy address, please ensure it is current.\r\n\r\nEstimated delivery time:\r\nabout 1 week to aarive within European countries\r\nbetween 1 - 2.5 weeks for the rest of the world', '750000', NULL, '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":""}', 1),
(7, 5, 0, 'T-Shirt Merdeka Jaya', 'Tersedia XL L M S', '80000', NULL, '{"Size":"M","Color":"","Some random attribute":"","Material":"","Specific number":""}', 2),
(8, 1, 0, 'Tas kulit Asli', 'Coba ya om', '', NULL, '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":""}', 3),
(9, 1, 0, 'test', 'test', '', NULL, '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":""}', 3),
(10, 1, 0, 'test', 'test', '', NULL, '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":""}', 3),
(11, 1, 0, 'test', 'test', '', NULL, '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":""}', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `shop_product_specification`
--

CREATE TABLE IF NOT EXISTS `shop_product_specification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `is_user_input` tinyint(1) DEFAULT NULL,
  `required` tinyint(1) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `shop_product_specification`
--

INSERT INTO `shop_product_specification` (`id`, `title`, `is_user_input`, `required`, `store_id`) VALUES
(1, 'Size', 0, 1, NULL),
(2, 'Color', 0, 0, NULL),
(3, 'Some random attribute', 0, 0, NULL),
(4, 'Material', 0, 1, NULL),
(5, 'Specific number', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `shop_product_variation`
--

CREATE TABLE IF NOT EXISTS `shop_product_variation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `specification_id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price_adjustion` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `shop_product_variation`
--

INSERT INTO `shop_product_variation` (`id`, `product_id`, `specification_id`, `position`, `title`, `price_adjustion`) VALUES
(1, 1, 1, 2, 'variation1', 3),
(2, 1, 1, 3, 'variation2', 6),
(3, 1, 2, 4, 'variation3', 9),
(4, 1, 5, 1, 'please enter a number here', 0),
(8, 7, 1, -10, 'L', 5000),
(9, 7, 2, -10, 'Merah', 0),
(10, 7, 1, -10, 'XL', 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `shop_shipping_method`
--

CREATE TABLE IF NOT EXISTS `shop_shipping_method` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `tax_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `store_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `shop_shipping_method`
--

INSERT INTO `shop_shipping_method` (`id`, `title`, `description`, `tax_id`, `price`, `store_id`) VALUES
(1, 'Delivery by postal Service', 'We deliver by Postal Service. 2.99 units of money are charged for that', 1, 2.99, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `shop_store`
--

CREATE TABLE IF NOT EXISTS `shop_store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `shop_store`
--

INSERT INTO `shop_store` (`id`, `user_id`, `shop_name`, `description`) VALUES
(1, 2, 'nakostoko', NULL),
(2, 9, 'bunas', NULL),
(3, 1, 'demo', 'testing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `shop_tax`
--

CREATE TABLE IF NOT EXISTS `shop_tax` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `percent` int(11) NOT NULL,
  `store_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `shop_tax`
--

INSERT INTO `shop_tax` (`id`, `title`, `percent`, `store_id`) VALUES
(1, '19%', 19, NULL),
(2, '7%', 7, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_comments`
--

CREATE TABLE IF NOT EXISTS `tbl_comments` (
  `owner_name` varchar(50) NOT NULL,
  `owner_id` int(12) NOT NULL,
  `comment_id` int(12) NOT NULL AUTO_INCREMENT,
  `parent_comment_id` int(12) DEFAULT NULL,
  `creator_id` int(12) DEFAULT NULL,
  `user_name` varchar(128) DEFAULT NULL,
  `user_email` varchar(128) DEFAULT NULL,
  `comment_text` text,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_id`),
  KEY `owner_name` (`owner_name`,`owner_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data untuk tabel `tbl_comments`
--

INSERT INTO `tbl_comments` (`owner_name`, `owner_id`, `comment_id`, `parent_comment_id`, `creator_id`, `user_name`, `user_email`, `comment_text`, `create_time`, `update_time`, `status`) VALUES
('Products', 1, 1, 0, 2, NULL, NULL, 'bos aku suka ini berapa hari dikirim ke surabay dan berapa rupiah ?', 1338703815, NULL, 0),
('Products', 5, 2, 0, 2, NULL, NULL, 'bos kirim ke harga untuk grosir ya', 1338704034, NULL, 0),
('Products', 4, 3, 0, 2, NULL, NULL, 'Saya suka ini, saya pesen dulu.', 1339060983, NULL, 0),
('Products', 3, 4, 0, 2, NULL, NULL, 'Photonya yang mana ini ?', 1339061008, NULL, 0),
('Products', 2, 5, 0, 2, NULL, NULL, 'Harganya beda dengan photo sebelah ya?', 1339061052, NULL, 0),
('Products', 1, 6, 0, 2, NULL, NULL, 'ada contoh lain ngga? gan', 1339061080, NULL, 0),
('Products', 6, 7, 0, 2, NULL, NULL, 'bandingkan', 1339061553, NULL, 0),
('Products', 2, 8, 0, 2, NULL, NULL, 'cantik', 1339061592, NULL, 0),
('Products', 2, 9, 0, 2, NULL, NULL, 'keren juga', 1339061608, NULL, 0),
('Products', 7, 10, 0, 9, NULL, NULL, 'ini punya gue gan, monggo2 di check', 1339144827, NULL, 0),
('Products', 4, 11, NULL, 2, NULL, NULL, 'test', 1340670031, 1341766274, 2),
('Products', 6, 12, NULL, 2, NULL, NULL, 'mari gan', 1340670526, NULL, 0),
('Products', 5, 13, 0, 2, NULL, NULL, 'oke ceck email bro', 1340670659, NULL, 0),
('Products', 6, 14, NULL, 2, NULL, NULL, 'sip lanjutkan', 1340670707, NULL, 0),
('Products', 5, 15, NULL, 2, NULL, NULL, 'test aja ya om, nanti dihapus ya', 1340670783, NULL, 0),
('Products', 2, 16, NULL, 2, NULL, NULL, 'testing', 1340754500, NULL, 0),
('Products', 3, 17, NULL, 2, NULL, NULL, 'jangan kosong deh', 1340756185, NULL, 0),
('Products', 2, 18, NULL, 2, NULL, NULL, 'testing', 1340756342, NULL, 0),
('Products', 2, 19, NULL, 9, NULL, NULL, 'saya bunas', 1340756537, 1340756550, 2),
('Products', 1, 20, NULL, 9, NULL, NULL, 'oke lanjut', 1340765953, 1340853190, 2),
('Products', 2, 21, NULL, 9, NULL, NULL, 'saya rasa hal yang terbaik adalah membeli barang yang asli, bukan kw - kw an', 1340766024, NULL, 0),
('Products', 1, 22, NULL, 9, NULL, NULL, 'bro, gue mau nanya, lokasi offlinenya dimana ?\r\n', 1340853213, NULL, 0),
('Products', 3, 23, NULL, 9, NULL, NULL, 'good default foto :)', 1340854020, NULL, 0),
('Products', 1, 24, NULL, 2, NULL, NULL, 'bagus brow', 1341722714, NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mailbox_conversation`
--

CREATE TABLE IF NOT EXISTS `tbl_mailbox_conversation` (
  `conversation_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `initiator_id` int(10) NOT NULL,
  `interlocutor_id` int(10) NOT NULL,
  `subject` varchar(100) NOT NULL DEFAULT '',
  `bm_read` tinyint(3) NOT NULL DEFAULT '0',
  `bm_deleted` tinyint(3) NOT NULL DEFAULT '0',
  `modified` int(10) unsigned NOT NULL,
  `is_system` enum('yes','no') NOT NULL DEFAULT 'no',
  `initiator_del` tinyint(1) unsigned DEFAULT '0',
  `interlocutor_del` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`conversation_id`),
  KEY `initiator_id` (`initiator_id`),
  KEY `interlocutor_id` (`interlocutor_id`),
  KEY `conversation_ts` (`modified`),
  KEY `subject` (`subject`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `tbl_mailbox_conversation`
--

INSERT INTO `tbl_mailbox_conversation` (`conversation_id`, `initiator_id`, `interlocutor_id`, `subject`, `bm_read`, `bm_deleted`, `modified`, `is_system`, `initiator_del`, `interlocutor_del`) VALUES
(1, 2, 1, 'asdasdsa', 2, 3, 1338664209, 'no', 161, NULL),
(2, 1, 2, 'teasdsadt', 3, 3, 1338664224, 'no', 154, 161),
(3, 2, 1, 'coba coba', 3, 3, 1338664516, 'no', 161, NULL),
(4, 1, 2, 'la kok ra iso', 3, 0, 1340929785, 'no', 0, 0),
(5, 2, 9, 'rtrt', 3, 3, 1339130644, 'no', 161, 160),
(6, 2, 9, 'Tanya harga produk terbaru', 3, 0, 1339136175, 'no', 0, 0),
(7, 9, 2, 'Bro bagaimana barangnya', 3, 0, 1340766236, 'no', 0, 0),
(8, 2, 9, 'Bos, tanya', 3, 0, 1340766419, 'no', 0, 0),
(9, 1, 9, 'Tanya om', 1, 0, 1342240161, 'no', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mailbox_message`
--

CREATE TABLE IF NOT EXISTS `tbl_mailbox_message` (
  `message_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `conversation_id` int(10) unsigned NOT NULL,
  `created` int(10) unsigned NOT NULL DEFAULT '0',
  `sender_id` int(10) unsigned NOT NULL DEFAULT '0',
  `recipient_id` int(10) unsigned NOT NULL DEFAULT '0',
  `text` mediumtext NOT NULL,
  `crc64` bigint(20) NOT NULL,
  PRIMARY KEY (`message_id`),
  KEY `sender_profile_id` (`sender_id`),
  KEY `recipient_profile_id` (`recipient_id`),
  KEY `conversation_id` (`conversation_id`),
  KEY `timestamp` (`created`),
  KEY `crc64` (`crc64`),
  FULLTEXT KEY `text` (`text`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data untuk tabel `tbl_mailbox_message`
--

INSERT INTO `tbl_mailbox_message` (`message_id`, `conversation_id`, `created`, `sender_id`, `recipient_id`, `text`, `crc64`) VALUES
(1, 1, 1338663702, 2, 1, 'asdasdsad', 5842800),
(2, 2, 1338663940, 1, 2, 'asdasdsadsad', 9),
(3, 1, 1338664209, 2, 1, 'sadasdsad', 144),
(4, 2, 1338664224, 2, 1, 'asdsad', 463896),
(5, 3, 1338664516, 2, 1, 'coba coba', 469296),
(6, 4, 1338664620, 1, 2, 'piye om', 4),
(7, 4, 1338664773, 1, 2, 'bagaimana om ? ', 0),
(8, 4, 1338664825, 2, 1, 'oke bos, aplikasinya lumayan bagus', 144201528),
(9, 5, 1339130644, 2, 9, 'sfdsfdsfdsf', 1632),
(10, 4, 1339135196, 2, 1, 'coba lagi ya bos', 1880),
(11, 6, 1339136175, 2, 9, 'Saya mau tanya produk yang terbaru apa ya?\r\n\r\nbisa dikirimkan produk dan price list - nya terima kasih', 13858),
(12, 7, 1339257005, 9, 2, 'Barange piye bro\r\nthanks', 615697),
(13, 7, 1339257092, 2, 9, 'Sik bos, sik lagi tak siapno', 2309),
(14, 7, 1339293776, 2, 9, 'Pak bos barang sudah aku kirim ya. monggo dicheck', 9642880),
(15, 7, 1340766236, 9, 2, 'Oke bro, barang sudah sampe, oh ya bisa dikirim juga bukti pengirimannya. buat dokumentasi.\r\n\r\nthks', 29520),
(16, 8, 1340766419, 2, 9, 'Bos, di tempat sampeyan ada lahan kosong di pinggir jalan atau stand kosong ?\r\n\r\natau sampeyan mau jadi agen ku  :D', 4416068),
(17, 4, 1340929785, 1, 2, 'okre', 1382361378),
(18, 9, 1342240161, 1, 9, 'Bos bisa dikirimin katalog terbaru ?\r\n\r\nthanks', 16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_reset_password`
--

CREATE TABLE IF NOT EXISTS `tbl_reset_password` (
  `user_id` int(11) NOT NULL,
  `temp_forget_password` varchar(100) DEFAULT NULL,
  `start_time` varchar(50) DEFAULT NULL,
  `end_time` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_reset_password`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `profile` text COLLATE utf8_unicode_ci,
  `first_name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `salt`, `email`, `profile`, `first_name`, `last_name`) VALUES
(1, 'demo', '2e5c7db760a33498023813489cfadc0b', '28b206548469ce62182048fd9cf91760', 'webmaster@example.com', NULL, NULL, NULL),
(2, 'nakos', 'bba99b601c28ab80308951cda62c7eba', '4ef6c197490601.61954109', 'budi@localhost.com', NULL, 'budi', NULL),
(9, 'bunas', '2562f15bccf89cf738cc11e9279c1c37', '4f5636bdb80a74.86606685', 'budidemo@localhost.com', NULL, 'budi', 'sunarko');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_useradmin`
--

CREATE TABLE IF NOT EXISTS `tbl_useradmin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `profile` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `tbl_useradmin`
--

INSERT INTO `tbl_useradmin` (`id`, `username`, `password`, `salt`, `email`, `profile`) VALUES
(1, 'admin', '2e5c7db760a33498023813489cfadc0b', '28b206548469ce62182048fd9cf91760', 'webmaster@example.com', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_usergroups_access`
--

CREATE TABLE IF NOT EXISTS `tbl_usergroups_access` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `element` int(3) NOT NULL,
  `element_id` bigint(20) NOT NULL,
  `module` varchar(140) NOT NULL,
  `controller` varchar(140) NOT NULL,
  `permission` varchar(7) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data untuk tabel `tbl_usergroups_access`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_usergroups_configuration`
--

CREATE TABLE IF NOT EXISTS `tbl_usergroups_configuration` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `rule` varchar(40) DEFAULT NULL,
  `value` varchar(20) DEFAULT NULL,
  `options` text,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `tbl_usergroups_configuration`
--

INSERT INTO `tbl_usergroups_configuration` (`id`, `rule`, `value`, `options`, `description`) VALUES
(1, 'version', '1.8', 'CONST', 'userGroups version'),
(2, 'password_strength', '0', 'a:3:{i:0;s:4:"weak";i:1;s:6:"medium";i:2;s:6:"strong";}', 'password strength:<br/>weak: password of at least 5 characters, any character allowed.<br/>\r\n			medium: password of at least 5 characters, must contain at least 2 digits and 2 letters.<br/>\r\n			strong: password of at least 5 characters, must contain at least 2 digits, 2 letters and a special character.'),
(3, 'registration', 'FALSE', 'BOOL', 'allow user registration'),
(4, 'public_user_list', 'FALSE', 'BOOL', 'logged users can see the complete user list'),
(5, 'public_profiles', 'FALSE', 'BOOL', 'allow everyone, even guests, to see user profiles'),
(6, 'profile_privacy', 'TRUE', 'BOOL', 'logged user can see other users profiles'),
(7, 'personal_home', 'FALSE', 'BOOL', 'users can set their own home'),
(8, 'simple_password_reset', 'FALSE', 'BOOL', 'if true users just have to provide user and email to reset their password.<br/>Otherwise they will have to answer their custom question'),
(9, 'user_need_activation', 'TRUE', 'BOOL', 'if true when a user creates an account a mail with an activation code will be sent to his email address'),
(10, 'user_need_approval', 'FALSE', 'BOOL', 'if true when a user creates an account a user with user admin rights will have to approve the registration.<br/>If both this setting and user_need_activation are true the user will need to activate is account first and then will need the approval'),
(11, 'user_registration_group', '2', 'GROUP_LIST', 'the group new users automatically belong to'),
(12, 'dumb_admin', 'TRUE', 'BOOL', 'users with just admin write permissions won''t see the Main Configuration and Cron Jobs panels'),
(13, 'super_admin', 'FALSE', 'BOOL', 'users with userGroups admin admin permission will have access to everything, just like root'),
(14, 'permission_cascade', 'TRUE', 'BOOL', 'if a user has on a controller admin permissions will have access to write and read pages. If he has write permissions will also have access to read pages'),
(15, 'server_executed_crons', 'FALSE', 'BOOL', 'if true crons must be executed from the server using a crontab');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_usergroups_cron`
--

CREATE TABLE IF NOT EXISTS `tbl_usergroups_cron` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `lapse` int(6) DEFAULT NULL,
  `last_occurrence` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tbl_usergroups_cron`
--

INSERT INTO `tbl_usergroups_cron` (`id`, `name`, `lapse`, `last_occurrence`) VALUES
(1, 'garbage_collection', 7, '2012-01-26 00:00:00'),
(2, 'unban', 1, '2012-01-26 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_usergroups_group`
--

CREATE TABLE IF NOT EXISTS `tbl_usergroups_group` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `groupname` varchar(120) NOT NULL,
  `level` int(6) DEFAULT NULL,
  `home` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `groupname` (`groupname`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tbl_usergroups_group`
--

INSERT INTO `tbl_usergroups_group` (`id`, `groupname`, `level`, `home`) VALUES
(1, 'root', 100, NULL),
(2, 'user', 1, '/userGroups');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_usergroups_lookup`
--

CREATE TABLE IF NOT EXISTS `tbl_usergroups_lookup` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `element` varchar(20) DEFAULT NULL,
  `value` int(5) DEFAULT NULL,
  `text` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `tbl_usergroups_lookup`
--

INSERT INTO `tbl_usergroups_lookup` (`id`, `element`, `value`, `text`) VALUES
(1, 'status', 0, 'banned'),
(2, 'status', 1, 'waiting activation'),
(3, 'status', 2, 'waiting approval'),
(4, 'status', 3, 'password change request'),
(5, 'status', 4, 'active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_usergroups_user`
--

CREATE TABLE IF NOT EXISTS `tbl_usergroups_user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `group_id` bigint(20) DEFAULT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) DEFAULT NULL,
  `email` varchar(120) NOT NULL,
  `home` varchar(120) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `question` text,
  `answer` text,
  `creation_date` datetime DEFAULT NULL,
  `activation_code` varchar(30) DEFAULT NULL,
  `activation_time` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `ban` datetime DEFAULT NULL,
  `ban_reason` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `group_id_idxfk` (`group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `tbl_usergroups_user`
--

INSERT INTO `tbl_usergroups_user` (`id`, `group_id`, `username`, `password`, `email`, `home`, `status`, `question`, `answer`, `creation_date`, `activation_code`, `activation_time`, `last_login`, `ban`, `ban_reason`) VALUES
(1, 1, 'admin', 'da964977e2498fa2289e5916e4b01997', 'budi@localhost.com', '/userGroups/admin/documentation', 4, 'test', 'test', '2012-01-07 21:00:32', NULL, NULL, '2012-01-26 02:02:17', NULL, NULL);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `shop_image`
--
ALTER TABLE `shop_image`
  ADD CONSTRAINT `fk_Image_Products` FOREIGN KEY (`product_id`) REFERENCES `shop_products` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `shop_order`
--
ALTER TABLE `shop_order`
  ADD CONSTRAINT `fk_order_customer1` FOREIGN KEY (`customer_id`) REFERENCES `shop_customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `shop_products`
--
ALTER TABLE `shop_products`
  ADD CONSTRAINT `fk_products_category` FOREIGN KEY (`category_id`) REFERENCES `shop_category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
