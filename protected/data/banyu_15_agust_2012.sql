-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 15, 2012 at 01:14 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `banyu`
--

-- --------------------------------------------------------

--
-- Table structure for table `advisor_factory_review`
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
-- Dumping data for table `advisor_factory_review`
--

INSERT INTO `advisor_factory_review` (`id`, `factory_id`, `reference_code`, `num_reviews`, `average_value`, `detil_rating`) VALUES
(1, 3, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 4, 3, '{"3":4}'),
(12, 10, 'd3d9446802a44259755d38e6d163e820', 4, 5, '{"5":4}'),
(14, 7, '8f14e45fceea167a5a36dedd4bea2543', 0, 0, '[]'),
(15, 25, '8e296a067a37563370ded05f5a3bf3ec', 1, 4, '{"4":2}'),
(17, 34, 'e369853df766fa44e1ed0ff613f563bd', 0, 0, '[]');

-- --------------------------------------------------------

--
-- Table structure for table `advisor_factory_subrating`
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

-- --------------------------------------------------------

--
-- Table structure for table `advisor_rating`
--

CREATE TABLE IF NOT EXISTS `advisor_rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `advisor_rating`
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
-- Table structure for table `advisor_reviewrating`
--

CREATE TABLE IF NOT EXISTS `advisor_reviewrating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `review_id` int(11) DEFAULT NULL,
  `rating_id` int(11) DEFAULT NULL,
  `value` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=197 ;

--
-- Dumping data for table `advisor_reviewrating`
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
-- Table structure for table `advisor_reviews`
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
-- Dumping data for table `advisor_reviews`
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
-- Table structure for table `advisor_review_photo`
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
-- Dumping data for table `advisor_review_photo`
--

INSERT INTO `advisor_review_photo` (`id`, `review_id`, `reference_code`, `filename`, `caption`) VALUES
(28, 51, '8e296a067a37563370ded05f5a3bf3ec', 'Boston-Nevado-(Prudential-B.jpg', 'asdsd');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_bin NOT NULL,
  `iso_code_2` varchar(2) COLLATE utf8_bin NOT NULL DEFAULT '',
  `iso_code_3` varchar(3) COLLATE utf8_bin NOT NULL DEFAULT '',
  `address_format` text COLLATE utf8_bin NOT NULL,
  `postcode_required` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`country_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=240 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `name`, `iso_code_2`, `iso_code_3`, `address_format`, `postcode_required`, `status`) VALUES
(1, 'Afghanistan', 'AF', 'AFG', '', 0, 1),
(2, 'Albania', 'AL', 'ALB', '', 0, 1),
(3, 'Algeria', 'DZ', 'DZA', '', 0, 1),
(4, 'American Samoa', 'AS', 'ASM', '', 0, 1),
(5, 'Andorra', 'AD', 'AND', '', 0, 1),
(6, 'Angola', 'AO', 'AGO', '', 0, 1),
(7, 'Anguilla', 'AI', 'AIA', '', 0, 1),
(8, 'Antarctica', 'AQ', 'ATA', '', 0, 1),
(9, 'Antigua and Barbuda', 'AG', 'ATG', '', 0, 1),
(10, 'Argentina', 'AR', 'ARG', '', 0, 1),
(11, 'Armenia', 'AM', 'ARM', '', 0, 1),
(12, 'Aruba', 'AW', 'ABW', '', 0, 1),
(13, 'Australia', 'AU', 'AUS', '', 0, 1),
(14, 'Austria', 'AT', 'AUT', '', 0, 1),
(15, 'Azerbaijan', 'AZ', 'AZE', '', 0, 1),
(16, 'Bahamas', 'BS', 'BHS', '', 0, 1),
(17, 'Bahrain', 'BH', 'BHR', '', 0, 1),
(18, 'Bangladesh', 'BD', 'BGD', '', 0, 1),
(19, 'Barbados', 'BB', 'BRB', '', 0, 1),
(20, 'Belarus', 'BY', 'BLR', '', 0, 1),
(21, 'Belgium', 'BE', 'BEL', '', 0, 1),
(22, 'Belize', 'BZ', 'BLZ', '', 0, 1),
(23, 'Benin', 'BJ', 'BEN', '', 0, 1),
(24, 'Bermuda', 'BM', 'BMU', '', 0, 1),
(25, 'Bhutan', 'BT', 'BTN', '', 0, 1),
(26, 'Bolivia', 'BO', 'BOL', '', 0, 1),
(27, 'Bosnia and Herzegowina', 'BA', 'BIH', '', 0, 1),
(28, 'Botswana', 'BW', 'BWA', '', 0, 1),
(29, 'Bouvet Island', 'BV', 'BVT', '', 0, 1),
(30, 'Brazil', 'BR', 'BRA', '', 0, 1),
(31, 'British Indian Ocean Territory', 'IO', 'IOT', '', 0, 1),
(32, 'Brunei Darussalam', 'BN', 'BRN', '', 0, 1),
(33, 'Bulgaria', 'BG', 'BGR', '', 0, 1),
(34, 'Burkina Faso', 'BF', 'BFA', '', 0, 1),
(35, 'Burundi', 'BI', 'BDI', '', 0, 1),
(36, 'Cambodia', 'KH', 'KHM', '', 0, 1),
(37, 'Cameroon', 'CM', 'CMR', '', 0, 1),
(38, 'Canada', 'CA', 'CAN', '', 0, 1),
(39, 'Cape Verde', 'CV', 'CPV', '', 0, 1),
(40, 'Cayman Islands', 'KY', 'CYM', '', 0, 1),
(41, 'Central African Republic', 'CF', 'CAF', '', 0, 1),
(42, 'Chad', 'TD', 'TCD', '', 0, 1),
(43, 'Chile', 'CL', 'CHL', '', 0, 1),
(44, 'China', 'CN', 'CHN', '', 0, 1),
(45, 'Christmas Island', 'CX', 'CXR', '', 0, 1),
(46, 'Cocos (Keeling) Islands', 'CC', 'CCK', '', 0, 1),
(47, 'Colombia', 'CO', 'COL', '', 0, 1),
(48, 'Comoros', 'KM', 'COM', '', 0, 1),
(49, 'Congo', 'CG', 'COG', '', 0, 1),
(50, 'Cook Islands', 'CK', 'COK', '', 0, 1),
(51, 'Costa Rica', 'CR', 'CRI', '', 0, 1),
(52, 'Cote D''Ivoire', 'CI', 'CIV', '', 0, 1),
(53, 'Croatia', 'HR', 'HRV', '', 0, 1),
(54, 'Cuba', 'CU', 'CUB', '', 0, 1),
(55, 'Cyprus', 'CY', 'CYP', '', 0, 1),
(56, 'Czech Republic', 'CZ', 'CZE', '', 0, 1),
(57, 'Denmark', 'DK', 'DNK', '', 0, 1),
(58, 'Djibouti', 'DJ', 'DJI', '', 0, 1),
(59, 'Dominica', 'DM', 'DMA', '', 0, 1),
(60, 'Dominican Republic', 'DO', 'DOM', '', 0, 1),
(61, 'East Timor', 'TP', 'TMP', '', 0, 1),
(62, 'Ecuador', 'EC', 'ECU', '', 0, 1),
(63, 'Egypt', 'EG', 'EGY', '', 0, 1),
(64, 'El Salvador', 'SV', 'SLV', '', 0, 1),
(65, 'Equatorial Guinea', 'GQ', 'GNQ', '', 0, 1),
(66, 'Eritrea', 'ER', 'ERI', '', 0, 1),
(67, 'Estonia', 'EE', 'EST', '', 0, 1),
(68, 'Ethiopia', 'ET', 'ETH', '', 0, 1),
(69, 'Falkland Islands (Malvinas)', 'FK', 'FLK', '', 0, 1),
(70, 'Faroe Islands', 'FO', 'FRO', '', 0, 1),
(71, 'Fiji', 'FJ', 'FJI', '', 0, 1),
(72, 'Finland', 'FI', 'FIN', '', 0, 1),
(73, 'France', 'FR', 'FRA', '', 0, 1),
(74, 'France, Metropolitan', 'FX', 'FXX', '', 0, 1),
(75, 'French Guiana', 'GF', 'GUF', '', 0, 1),
(76, 'French Polynesia', 'PF', 'PYF', '', 0, 1),
(77, 'French Southern Territories', 'TF', 'ATF', '', 0, 1),
(78, 'Gabon', 'GA', 'GAB', '', 0, 1),
(79, 'Gambia', 'GM', 'GMB', '', 0, 1),
(80, 'Georgia', 'GE', 'GEO', '', 0, 1),
(81, 'Germany', 'DE', 'DEU', 0x7b636f6d70616e797d0d0a7b66697273746e616d657d207b6c6173746e616d657d0d0a7b616464726573735f317d0d0a7b616464726573735f327d0d0a7b706f7374636f64657d207b636974797d0d0a7b636f756e7472797d, 0, 1),
(82, 'Ghana', 'GH', 'GHA', '', 0, 1),
(83, 'Gibraltar', 'GI', 'GIB', '', 0, 1),
(84, 'Greece', 'GR', 'GRC', '', 0, 1),
(85, 'Greenland', 'GL', 'GRL', '', 0, 1),
(86, 'Grenada', 'GD', 'GRD', '', 0, 1),
(87, 'Guadeloupe', 'GP', 'GLP', '', 0, 1),
(88, 'Guam', 'GU', 'GUM', '', 0, 1),
(89, 'Guatemala', 'GT', 'GTM', '', 0, 1),
(90, 'Guinea', 'GN', 'GIN', '', 0, 1),
(91, 'Guinea-bissau', 'GW', 'GNB', '', 0, 1),
(92, 'Guyana', 'GY', 'GUY', '', 0, 1),
(93, 'Haiti', 'HT', 'HTI', '', 0, 1),
(94, 'Heard and Mc Donald Islands', 'HM', 'HMD', '', 0, 1),
(95, 'Honduras', 'HN', 'HND', '', 0, 1),
(96, 'Hong Kong', 'HK', 'HKG', '', 0, 1),
(97, 'Hungary', 'HU', 'HUN', '', 0, 1),
(98, 'Iceland', 'IS', 'ISL', '', 0, 1),
(99, 'India', 'IN', 'IND', '', 0, 1),
(100, 'Indonesia', 'ID', 'IDN', '', 0, 1),
(101, 'Iran (Islamic Republic of)', 'IR', 'IRN', '', 0, 1),
(102, 'Iraq', 'IQ', 'IRQ', '', 0, 1),
(103, 'Ireland', 'IE', 'IRL', '', 0, 1),
(104, 'Israel', 'IL', 'ISR', '', 0, 1),
(105, 'Italy', 'IT', 'ITA', '', 0, 1),
(106, 'Jamaica', 'JM', 'JAM', '', 0, 1),
(107, 'Japan', 'JP', 'JPN', '', 0, 1),
(108, 'Jordan', 'JO', 'JOR', '', 0, 1),
(109, 'Kazakhstan', 'KZ', 'KAZ', '', 0, 1),
(110, 'Kenya', 'KE', 'KEN', '', 0, 1),
(111, 'Kiribati', 'KI', 'KIR', '', 0, 1),
(112, 'North Korea', 'KP', 'PRK', '', 0, 1),
(113, 'Korea, Republic of', 'KR', 'KOR', '', 0, 1),
(114, 'Kuwait', 'KW', 'KWT', '', 0, 1),
(115, 'Kyrgyzstan', 'KG', 'KGZ', '', 0, 1),
(116, 'Lao People''s Democratic Republic', 'LA', 'LAO', '', 0, 1),
(117, 'Latvia', 'LV', 'LVA', '', 0, 1),
(118, 'Lebanon', 'LB', 'LBN', '', 0, 1),
(119, 'Lesotho', 'LS', 'LSO', '', 0, 1),
(120, 'Liberia', 'LR', 'LBR', '', 0, 1),
(121, 'Libyan Arab Jamahiriya', 'LY', 'LBY', '', 0, 1),
(122, 'Liechtenstein', 'LI', 'LIE', '', 0, 1),
(123, 'Lithuania', 'LT', 'LTU', '', 0, 1),
(124, 'Luxembourg', 'LU', 'LUX', '', 0, 1),
(125, 'Macau', 'MO', 'MAC', '', 0, 1),
(126, 'Macedonia', 'MK', 'MKD', '', 0, 1),
(127, 'Madagascar', 'MG', 'MDG', '', 0, 1),
(128, 'Malawi', 'MW', 'MWI', '', 0, 1),
(129, 'Malaysia', 'MY', 'MYS', '', 0, 1),
(130, 'Maldives', 'MV', 'MDV', '', 0, 1),
(131, 'Mali', 'ML', 'MLI', '', 0, 1),
(132, 'Malta', 'MT', 'MLT', '', 0, 1),
(133, 'Marshall Islands', 'MH', 'MHL', '', 0, 1),
(134, 'Martinique', 'MQ', 'MTQ', '', 0, 1),
(135, 'Mauritania', 'MR', 'MRT', '', 0, 1),
(136, 'Mauritius', 'MU', 'MUS', '', 0, 1),
(137, 'Mayotte', 'YT', 'MYT', '', 0, 1),
(138, 'Mexico', 'MX', 'MEX', '', 0, 1),
(139, 'Micronesia, Federated States of', 'FM', 'FSM', '', 0, 1),
(140, 'Moldova, Republic of', 'MD', 'MDA', '', 0, 1),
(141, 'Monaco', 'MC', 'MCO', '', 0, 1),
(142, 'Mongolia', 'MN', 'MNG', '', 0, 1),
(143, 'Montserrat', 'MS', 'MSR', '', 0, 1),
(144, 'Morocco', 'MA', 'MAR', '', 0, 1),
(145, 'Mozambique', 'MZ', 'MOZ', '', 0, 1),
(146, 'Myanmar', 'MM', 'MMR', '', 0, 1),
(147, 'Namibia', 'NA', 'NAM', '', 0, 1),
(148, 'Nauru', 'NR', 'NRU', '', 0, 1),
(149, 'Nepal', 'NP', 'NPL', '', 0, 1),
(150, 'Netherlands', 'NL', 'NLD', '', 0, 1),
(151, 'Netherlands Antilles', 'AN', 'ANT', '', 0, 1),
(152, 'New Caledonia', 'NC', 'NCL', '', 0, 1),
(153, 'New Zealand', 'NZ', 'NZL', '', 0, 1),
(154, 'Nicaragua', 'NI', 'NIC', '', 0, 1),
(155, 'Niger', 'NE', 'NER', '', 0, 1),
(156, 'Nigeria', 'NG', 'NGA', '', 0, 1),
(157, 'Niue', 'NU', 'NIU', '', 0, 1),
(158, 'Norfolk Island', 'NF', 'NFK', '', 0, 1),
(159, 'Northern Mariana Islands', 'MP', 'MNP', '', 0, 1),
(160, 'Norway', 'NO', 'NOR', '', 0, 1),
(161, 'Oman', 'OM', 'OMN', '', 0, 1),
(162, 'Pakistan', 'PK', 'PAK', '', 0, 1),
(163, 'Palau', 'PW', 'PLW', '', 0, 1),
(164, 'Panama', 'PA', 'PAN', '', 0, 1),
(165, 'Papua New Guinea', 'PG', 'PNG', '', 0, 1),
(166, 'Paraguay', 'PY', 'PRY', '', 0, 1),
(167, 'Peru', 'PE', 'PER', '', 0, 1),
(168, 'Philippines', 'PH', 'PHL', '', 0, 1),
(169, 'Pitcairn', 'PN', 'PCN', '', 0, 1),
(170, 'Poland', 'PL', 'POL', '', 0, 1),
(171, 'Portugal', 'PT', 'PRT', '', 0, 1),
(172, 'Puerto Rico', 'PR', 'PRI', '', 0, 1),
(173, 'Qatar', 'QA', 'QAT', '', 0, 1),
(174, 'Reunion', 'RE', 'REU', '', 0, 1),
(175, 'Romania', 'RO', 'ROM', '', 0, 1),
(176, 'Russian Federation', 'RU', 'RUS', '', 0, 1),
(177, 'Rwanda', 'RW', 'RWA', '', 0, 1),
(178, 'Saint Kitts and Nevis', 'KN', 'KNA', '', 0, 1),
(179, 'Saint Lucia', 'LC', 'LCA', '', 0, 1),
(180, 'Saint Vincent and the Grenadines', 'VC', 'VCT', '', 0, 1),
(181, 'Samoa', 'WS', 'WSM', '', 0, 1),
(182, 'San Marino', 'SM', 'SMR', '', 0, 1),
(183, 'Sao Tome and Principe', 'ST', 'STP', '', 0, 1),
(184, 'Saudi Arabia', 'SA', 'SAU', '', 0, 1),
(185, 'Senegal', 'SN', 'SEN', '', 0, 1),
(186, 'Seychelles', 'SC', 'SYC', '', 0, 1),
(187, 'Sierra Leone', 'SL', 'SLE', '', 0, 1),
(188, 'Singapore', 'SG', 'SGP', '', 0, 1),
(189, 'Slovak Republic', 'SK', 'SVK', 0x7b66697273746e616d657d207b6c6173746e616d657d0d0a7b636f6d70616e797d0d0a7b616464726573735f317d0d0a7b616464726573735f327d0d0a7b636974797d207b706f7374636f64657d0d0a7b7a6f6e657d0d0a7b636f756e7472797d, 0, 1),
(190, 'Slovenia', 'SI', 'SVN', '', 0, 1),
(191, 'Solomon Islands', 'SB', 'SLB', '', 0, 1),
(192, 'Somalia', 'SO', 'SOM', '', 0, 1),
(193, 'South Africa', 'ZA', 'ZAF', '', 0, 1),
(194, 'South Georgia &amp; South Sandwich Islands', 'GS', 'SGS', '', 0, 1),
(195, 'Spain', 'ES', 'ESP', '', 0, 1),
(196, 'Sri Lanka', 'LK', 'LKA', '', 0, 1),
(197, 'St. Helena', 'SH', 'SHN', '', 0, 1),
(198, 'St. Pierre and Miquelon', 'PM', 'SPM', '', 0, 1),
(199, 'Sudan', 'SD', 'SDN', '', 0, 1),
(200, 'Suriname', 'SR', 'SUR', '', 0, 1),
(201, 'Svalbard and Jan Mayen Islands', 'SJ', 'SJM', '', 0, 1),
(202, 'Swaziland', 'SZ', 'SWZ', '', 0, 1),
(203, 'Sweden', 'SE', 'SWE', '', 0, 1),
(204, 'Switzerland', 'CH', 'CHE', '', 0, 1),
(205, 'Syrian Arab Republic', 'SY', 'SYR', '', 0, 1),
(206, 'Taiwan', 'TW', 'TWN', '', 0, 1),
(207, 'Tajikistan', 'TJ', 'TJK', '', 0, 1),
(208, 'Tanzania, United Republic of', 'TZ', 'TZA', '', 0, 1),
(209, 'Thailand', 'TH', 'THA', '', 0, 1),
(210, 'Togo', 'TG', 'TGO', '', 0, 1),
(211, 'Tokelau', 'TK', 'TKL', '', 0, 1),
(212, 'Tonga', 'TO', 'TON', '', 0, 1),
(213, 'Trinidad and Tobago', 'TT', 'TTO', '', 0, 1),
(214, 'Tunisia', 'TN', 'TUN', '', 0, 1),
(215, 'Turkey', 'TR', 'TUR', '', 0, 1),
(216, 'Turkmenistan', 'TM', 'TKM', '', 0, 1),
(217, 'Turks and Caicos Islands', 'TC', 'TCA', '', 0, 1),
(218, 'Tuvalu', 'TV', 'TUV', '', 0, 1),
(219, 'Uganda', 'UG', 'UGA', '', 0, 1),
(220, 'Ukraine', 'UA', 'UKR', '', 0, 1),
(221, 'United Arab Emirates', 'AE', 'ARE', '', 0, 1),
(222, 'United Kingdom', 'GB', 'GBR', '', 1, 1),
(223, 'United States', 'US', 'USA', 0x7b66697273746e616d657d207b6c6173746e616d657d0d0a7b636f6d70616e797d0d0a7b616464726573735f317d0d0a7b616464726573735f327d0d0a7b636974797d2c207b7a6f6e657d207b706f7374636f64657d0d0a7b636f756e7472797d, 0, 1),
(224, 'United States Minor Outlying Islands', 'UM', 'UMI', '', 0, 1),
(225, 'Uruguay', 'UY', 'URY', '', 0, 1),
(226, 'Uzbekistan', 'UZ', 'UZB', '', 0, 1),
(227, 'Vanuatu', 'VU', 'VUT', '', 0, 1),
(228, 'Vatican City State (Holy See)', 'VA', 'VAT', '', 0, 1),
(229, 'Venezuela', 'VE', 'VEN', '', 0, 1),
(230, 'Viet Nam', 'VN', 'VNM', '', 0, 1),
(231, 'Virgin Islands (British)', 'VG', 'VGB', '', 0, 1),
(232, 'Virgin Islands (U.S.)', 'VI', 'VIR', '', 0, 1),
(233, 'Wallis and Futuna Islands', 'WF', 'WLF', '', 0, 1),
(234, 'Western Sahara', 'EH', 'ESH', '', 0, 1),
(235, 'Yemen', 'YE', 'YEM', '', 0, 1),
(236, 'Yugoslavia', 'YU', 'YUG', '', 0, 1),
(237, 'Democratic Republic of Congo', 'CD', 'COD', '', 0, 1),
(238, 'Zambia', 'ZM', 'ZMB', '', 0, 1),
(239, 'Zimbabwe', 'ZW', 'ZWE', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `email_newsletter`
--

CREATE TABLE IF NOT EXISTS `email_newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `register_date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `email_newsletter`
--

INSERT INTO `email_newsletter` (`id`, `email`, `register_date`) VALUES
(1, 'narkosu@yahoo.co.uk', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `factory`
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
-- Dumping data for table `factory`
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
-- Table structure for table `shop_address`
--

CREATE TABLE IF NOT EXISTS `shop_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `city_state_dn` varchar(255) DEFAULT NULL,
  `country` varchar(255) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `location_type` enum('dn','ln') DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `shop_address`
--

INSERT INTO `shop_address` (`id`, `firstname`, `lastname`, `street`, `zipcode`, `state`, `city`, `city_state_dn`, `country`, `country_id`, `location_type`, `user_id`) VALUES
(1, 'demolistik', 'demolistik', 'stret', '121212', NULL, 'jakarta', NULL, 'Indonesia', NULL, NULL, 15),
(2, 'Budi', 'Sunarko', 'Jl. Warga 25 C, Pejaten Barat, Pasar Minggu', '12510', 'DI YOGYAKARTA', 'GUNUNG KIDUL', '3403', 'Indonesia', 100, 'dn', 1),
(3, 'Song ', 'Sing', 'st long wong', '89711', 'weng', 'sung sin', NULL, 'Korea, Republic of', 113, 'ln', 1),
(4, 'sanusi', 'jupri', 'Jl. Warga 25 C, Pejaten Barat, Pasar Minggu', '12510', 'DKI JAKARTA', 'KOTA JAKARTA SELATAN', '3171', 'Indonesia', 100, 'dn', 9),
(5, 'Budi', 'Sunarko', 'Jl. Warga 25 C, Pejaten Barat, Pasar Minggu', '12510', 'DKI JAKARTA', 'KOTA JAKARTA SELATAN', '3171', 'Indonesia', 100, 'dn', 2),
(6, 'Budi', 'Sunarko', 'Jl. Warga 25 C, Pejaten Barat, Pasar Minggu', '12510', 'DKI JAKARTA', 'KOTA JAKARTA SELATAN', '3171', 'Indonesia', 100, 'dn', 2);

-- --------------------------------------------------------

--
-- Table structure for table `shop_category`
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
-- Dumping data for table `shop_category`
--

INSERT INTO `shop_category` (`category_id`, `parent_id`, `title`, `description`, `language`, `store_id`) VALUES
(1, 0, 'Primary Articles', NULL, NULL, NULL),
(2, 0, 'Secondary Articles', NULL, NULL, NULL),
(3, 1, 'Red Primary Articles', NULL, NULL, NULL),
(4, 1, 'Green Primary Articles', NULL, NULL, NULL),
(5, 2, 'Red Secondary Articles', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shop_customer`
--

CREATE TABLE IF NOT EXISTS `shop_customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `address_id` int(11) NOT NULL,
  `delivery_address_id` int(11) NOT NULL,
  `billing_address_id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shop_delivery_address`
--

CREATE TABLE IF NOT EXISTS `shop_delivery_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `city_state_dn` varchar(255) DEFAULT NULL,
  `country` varchar(255) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `location_type` enum('dn','ln') DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `shop_delivery_address`
--

INSERT INTO `shop_delivery_address` (`id`, `firstname`, `lastname`, `street`, `zipcode`, `state`, `city`, `city_state_dn`, `country`, `country_id`, `location_type`, `user_id`) VALUES
(1, 'Budi', 'Sunarko', 'Jl. Warga 25 C, Pejaten Barat, Pasar Minggu', '12510', NULL, 'GUNUNG KIDUL', NULL, 'Indonesia', NULL, NULL, NULL),
(2, 'Budi', 'Sunarko', 'Jl. Warga 25 C, Pejaten Barat, Pasar Minggu', '12510', NULL, 'GUNUNG KIDUL', NULL, 'Indonesia', NULL, NULL, NULL),
(3, 'Budi', 'Sunarko', 'Jl. Warga 25 C, Pejaten Barat, Pasar Minggu', '12510', NULL, 'GUNUNG KIDUL', NULL, 'Indonesia', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shop_delivery_addressx`
--

CREATE TABLE IF NOT EXISTS `shop_delivery_addressx` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shop_image`
--

CREATE TABLE IF NOT EXISTS `shop_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `filename` varchar(45) NOT NULL,
  `product_id` int(11) NOT NULL,
  `type_link` varchar(200) DEFAULT NULL,
  `storage` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Image_Products` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `shop_image`
--

INSERT INTO `shop_image` (`id`, `title`, `filename`, `product_id`, `type_link`, `storage`) VALUES
(1, 'Jewelry greate', '564aebfa-a5bc-4738-bb4e-2568ce047d9b.jpg', 1, NULL, NULL),
(2, 'Jewelry greate', '564aebfa-a5bc-4738-bb4e-2568ce047d9b.jpg', 1, NULL, NULL),
(3, 'Tampak depan', '20120509043822cgpgC.jpg', 6, NULL, NULL),
(4, 'testing', '20120625044938AuCrx.jpg', 5, NULL, NULL),
(5, 'sd', '20120509043822cgpgC.jpg', 4, NULL, NULL),
(6, 'as', '564aebfa-a5bc-4738-bb4e-2568ce047d9b.jpg', 2, NULL, NULL),
(7, 'test', 'Penguins.jpg', 3, NULL, NULL),
(8, 'sd', 'Tulips.jpg', 3, NULL, NULL),
(9, 'ss', 'Koala.jpg', 3, NULL, NULL),
(10, 't', '2640060.jpg', 7, NULL, NULL),
(11, 'tas kulit', '94af493f-7fa2-4c01-9c6a-b5b08c4efdf4.jpg', 8, NULL, NULL),
(12, 'ali lai', 'a80231dc-7da0-40cd-b3c5-d613809607b7.jpg', 10, NULL, NULL),
(13, 'bagus bagus aja', '3032409170_831dcb3819_b.jpg', 11, NULL, NULL),
(14, 'bagus bagus aja', '120b.jpg', 11, NULL, NULL),
(15, 'bagus bagus aja', 'p.jpg', 9, NULL, NULL),
(16, 'testing', 'IMG01460-20120530-1712.jpg', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shop_order`
--

CREATE TABLE IF NOT EXISTS `shop_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `delivery_address_id` int(11) NOT NULL,
  `billing_address_id` int(11) DEFAULT NULL,
  `ordering_date` int(11) NOT NULL,
  `ordering_done` tinyint(1) DEFAULT NULL,
  `ordering_confirmed` tinyint(1) DEFAULT NULL,
  `payment_method` int(11) NOT NULL,
  `shipping_method` int(11) NOT NULL,
  `comment` text,
  `store_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `shop_order`
--

INSERT INTO `shop_order` (`order_id`, `customer_id`, `delivery_address_id`, `billing_address_id`, `ordering_date`, `ordering_done`, `ordering_confirmed`, `payment_method`, `shipping_method`, `comment`, `store_id`) VALUES
(3, 1, 3, NULL, 1343881661, NULL, NULL, 1, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shop_order_position`
--

CREATE TABLE IF NOT EXISTS `shop_order_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `specifications` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `shop_order_position`
--

INSERT INTO `shop_order_position` (`id`, `order_id`, `product_id`, `amount`, `specifications`) VALUES
(1, 2, 7, 3, '{"1":["8"],"2":["9"]}'),
(2, 3, 4, 2, 'null'),
(3, 3, 1, 1, 'null');

-- --------------------------------------------------------

--
-- Table structure for table `shop_payment_method`
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
-- Dumping data for table `shop_payment_method`
--

INSERT INTO `shop_payment_method` (`id`, `title`, `description`, `tax_id`, `price`) VALUES
(1, 'Transfer Bank', 'Pembayaran melalui transfer bank. No rekening kami sertakan dalam Konfirmasi Invoice ', 1, 0),
(2, 'advance Payment', 'You pay in advance, we deliver', 1, 0),
(3, 'cash on delivery', 'You pay when we deliver', 1, 0),
(4, 'invoice', 'We deliver and send a invoice', 1, 0),
(5, 'paypal', 'You pay by paypal', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `shop_payment_seller`
--

CREATE TABLE IF NOT EXISTS `shop_payment_seller` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_methode_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  `desc` text,
  `attribute` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `shop_payment_seller`
--

INSERT INTO `shop_payment_seller` (`id`, `payment_methode_id`, `user_id`, `store_id`, `desc`, `attribute`) VALUES
(1, 1, 2, 1, NULL, '{"bca":{"bank":"BCA","nama":"BUDI SUNARKO","norek":"12341234","cabang":"Madiun"},"mandiri_syariah":{"bank":"Mandiri Syariah","nama":"Man BUDI SUNARKO ","norek":"12341234","cabang":"Madiun"}}');

-- --------------------------------------------------------

--
-- Table structure for table `shop_products`
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
-- Dumping data for table `shop_products`
--

INSERT INTO `shop_products` (`product_id`, `category_id`, `tax_id`, `title`, `description`, `price`, `language`, `specifications`, `store_id`) VALUES
(1, 1, 1, 'Demonstration of Article with variations', 'Hello, World!', '350000', NULL, '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":"","Random attribute":""}', 1),
(2, 1, 2, 'Another Demo Article with less Tax', '!!', '350000', NULL, '{"Size":"","Color":"","Random attribute":"","Material":"","Specific number":""}', 1),
(3, 2, 1, 'Boneka EX WIN', 'Waiting on buyer feedback and after photos!\r\n\r\nPictures of before shown on this listing. Waiting for buyer to provide photos of cover after.\r\n\r\nPrice entered on this listing is not a true price as this is a promotional item, information only item, rather than a product to be purchased!\r\nPlease do not purchase this listing, it’s a helpful tool for buyers and it’s not an actual product to be purchased.\r\n\r\n*************************************************************************************************************\r\n*************************************************************************************************************\r\n\r\nHave a piece of furniture that looks old, dirty, tired, and that needs a face lift?\r\n\r\nContact me via convo with details, photo of the item, and measurements. I would be happy to give a quote for a new slip cover custom made.\r\n\r\nPrice includes labor only and buyer can choose their own fabric for the cover to be made.\r\nPhotos included on this listing are examples of before and after of projects done on etsy for other buyers!\r\n\r\nPlease Note\r\nSlip covers are an extremely popular item. I am getting lots and lots of requests daily and have many projects that I am currently working on. There are times that I will not be able to take on new projects right away; therefore please convo me for scheduling.\r\n\r\nPatterns\r\nIf someone is a skilled sewer and would like me to design a custom pattern for them to make their own slip covers I would be happy to do so.\r\n\r\nHow to measure\r\n\r\nI will need the following measurements in order to estimate:\r\n\r\nottoman\r\nwidth, length, height\r\n\r\nchair\r\ncushions (how many, are they detached)\r\nwidth, length, height\r\narm of chair\r\nwidth, length, height\r\nback of chair\r\nwidth, depth and height\r\nseat of chair\r\ndepth, width and height\r\n\r\nCouch\r\ncushions (how many, are they detached)\r\nwidth, length, height\r\narm of couch\r\nwidth, length, height\r\nback of couch\r\nwidth, depth and height\r\nseat of couch\r\ndepth, width and height\r\n\r\nFor Sectional Pieces\r\nRepeat all measurements for all sections of sofa separately\r\nDo not forget to note how many cushions\r\n\r\nPrice entered on this listing is not a true price as this is a promotional item, information only item, rather than a product to be purchased!\r\nPlease do not purchase this listing, it’s a helpful tool for buyers and it’s not an actual product to be purchased.\r\n\r\nP.S. Buyers: Always please state name on inquiries, its helpful in responding back\r\n\r\nThank you for visting my shop! ', '90000', NULL, '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":""}', 1),
(4, 4, 1, 'Tas klasik', 'Twisted headband is made of a lawn cotton and digitally printed with web pattern. Lawn cotton is gauzy and semi-sheer. Stretchy elastic back makes this headband comfortable for all head sizes. ', '750000', NULL, '{"Size":"","Color":"","Random attribute":"","Material":"","Specific number":""}', 1),
(5, 1, 0, 'Test Produk', 'testing ajalah', '120000', NULL, '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":"","Random attribute":""}', 1),
(6, 1, 0, 'Handbag Leather nobrand', 'This handbag is made os different motifs leather\r\nIt has metal lock closure and removable shoulder strap\r\nInterior is fully lined, \r\nThere are 2 compartments + 1 zipped pocket inbetween + 1 small zipped pocket\r\nExcellent vintage conditiion\r\n\r\nBrand: DONNA LISA\r\nMade in Italy\r\nGenuine leather\r\n\r\nH 9.1" (23cm)\r\nL 10.2" (26cm)\r\nW 2.2" (5.5cm)\r\nStrap length: 45.7" (116cm)\r\n\r\n\r\nShipping: REGISTERED MAIL & INSURANCE to Etsy address, please ensure it is current.\r\n\r\nEstimated delivery time:\r\nabout 1 week to aarive within European countries\r\nbetween 1 - 2.5 weeks for the rest of the world', '750000', NULL, '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":""}', 1),
(7, 5, 0, 'T-Shirt Merdeka Jaya', 'Tersedia XL L M S', '80000', NULL, '{"Size":"M","Color":"","Some random attribute":"","Material":"","Specific number":"","Random attribute":""}', 2),
(8, 1, 0, 'Tas kulit Asli', 'Coba ya om', '649000', NULL, '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":"","Random attribute":""}', 3),
(9, 1, 0, 'Sepatu Kulit', 'test', '550000', NULL, '{"Size":"41","Color":"","Some random attribute":"","Material":"","Specific number":"","Random attribute":""}', 3),
(10, 1, 0, 'Komplet dan berjaya', 'Bismillah', '70000', NULL, '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":"","Random attribute":""}', 3),
(11, 1, 0, 'test', 'test', '', NULL, '{"Size":"","Color":"","Some random attribute":"","Material":"","Specific number":"","Random attribute":""}', 2);

-- --------------------------------------------------------

--
-- Table structure for table `shop_product_specification`
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
-- Dumping data for table `shop_product_specification`
--

INSERT INTO `shop_product_specification` (`id`, `title`, `is_user_input`, `required`, `store_id`) VALUES
(1, 'Size', 0, 1, NULL),
(2, 'Color', 0, 1, NULL),
(3, 'Random attribute', 0, 0, NULL),
(4, 'Material', 0, 0, NULL),
(5, 'Specific number', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shop_product_variation`
--

CREATE TABLE IF NOT EXISTS `shop_product_variation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `specification_id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price_adjustion` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `shop_product_variation`
--

INSERT INTO `shop_product_variation` (`id`, `product_id`, `specification_id`, `position`, `title`, `price_adjustion`) VALUES
(27, 8, 2, -10, 'Hitam', 0),
(28, 8, 2, -10, 'Coklat', 0),
(29, 7, 1, -10, 'L', 5000),
(30, 7, 2, -10, 'Merah', 0),
(31, 7, 1, -10, 'XL', 10000),
(32, 7, 1, -10, 'M', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shop_shipping_method`
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
-- Dumping data for table `shop_shipping_method`
--

INSERT INTO `shop_shipping_method` (`id`, `title`, `description`, `tax_id`, `price`, `store_id`) VALUES
(1, 'Delivery by postal Service', 'We deliver by Postal Service. 2.99 units of money are charged for that', 1, 2.99, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shop_shipping_product`
--

CREATE TABLE IF NOT EXISTS `shop_shipping_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `type_area` varchar(255) DEFAULT NULL,
  `country_code` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `kode_propinsi` varchar(255) DEFAULT NULL,
  `propinsi` varchar(255) DEFAULT NULL,
  `kode_kabupaten` varchar(255) NOT NULL,
  `kabupaten` varchar(255) DEFAULT NULL,
  `price` double NOT NULL,
  `price_other_item` double DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `shop_shipping_product`
--

INSERT INTO `shop_shipping_product` (`id`, `product_id`, `type_area`, `country_code`, `country`, `kode_propinsi`, `propinsi`, `kode_kabupaten`, `kabupaten`, `price`, `price_other_item`, `store_id`) VALUES
(23, 1, 'local', '100', 'Indonesia', '31', 'DKI JAKARTA ', '71', ' KOTA JAKARTA SELATAN', 7000, 2000, 1),
(24, 1, 'local', '100', 'Indonesia', '31', 'DKI JAKARTA ', '72', ' KOTA JAKARTA TIMUR', 8000, 4000, 1),
(25, 1, 'local', '100', 'Indonesia', '31', 'DKI JAKARTA ', '73', ' KOTA JAKARTA PUSAT', 8000, 4000, 1),
(26, 1, 'local', '100', 'Indonesia', '31', 'DKI JAKARTA ', '74', ' KOTA JAKARTA BARAT', 8000, 4000, 1),
(27, 1, 'local', '100', 'Indonesia', '31', 'DKI JAKARTA ', '75', ' KOTA JAKARTA UTARA', 8000, 4000, 1),
(28, 2, 'local', '100', 'Indonesia', '31', 'DKI JAKARTA ', '71', ' KOTA JAKARTA SELATAN', 7000, 2000, 1),
(29, 4, 'local', '100', 'Indonesia', '31', 'DKI JAKARTA ', '71', ' KOTA JAKARTA SELATAN', 7000, 2000, 1),
(30, 5, 'local', '100', 'Indonesia', '31', 'DKI JAKARTA ', '71', ' KOTA JAKARTA SELATAN', 7000, 2000, 1),
(31, 9, 'local', '100', 'Indonesia', '31', 'DKI JAKARTA ', '71', ' KOTA JAKARTA SELATAN', 7000, 2000, 3),
(33, 10, 'local', '100', 'Indonesia', '31', 'DKI JAKARTA ', '71', ' KOTA JAKARTA SELATAN', 7000, 0, 3),
(34, 7, 'local', '100', 'Indonesia', '31', 'DKI JAKARTA ', '71', ' KOTA JAKARTA SELATAN', 6000, 0, 2),
(35, 11, 'local', '100', 'Indonesia', '31', 'DKI JAKARTA ', '71', ' KOTA JAKARTA SELATAN', 8000, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `shop_shipping_product_detail_template`
--

CREATE TABLE IF NOT EXISTS `shop_shipping_product_detail_template` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `template_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `type_area` varchar(255) DEFAULT NULL,
  `country_code` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `kode_propinsi` varchar(255) DEFAULT NULL,
  `propinsi` varchar(255) DEFAULT NULL,
  `kode_kabupaten` varchar(255) NOT NULL,
  `kabupaten` varchar(255) DEFAULT NULL,
  `price` double NOT NULL,
  `price_other_item` double DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shop_shipping_product_template`
--

CREATE TABLE IF NOT EXISTS `shop_shipping_product_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_name` varchar(255) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shop_store`
--

CREATE TABLE IF NOT EXISTS `shop_store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `shop_store`
--

INSERT INTO `shop_store` (`id`, `user_id`, `shop_name`, `description`) VALUES
(1, 2, 'nakos', NULL),
(2, 9, 'bunas', NULL),
(3, 1, 'demo', 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `shop_tax`
--

CREATE TABLE IF NOT EXISTS `shop_tax` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `percent` int(11) NOT NULL,
  `store_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `shop_tax`
--

INSERT INTO `shop_tax` (`id`, `title`, `percent`, `store_id`) VALUES
(1, '19%', 19, NULL),
(2, '7%', 7, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `tbl_comments`
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
('Products', 1, 24, NULL, 2, NULL, NULL, 'bagus brow', 1341722714, NULL, 0),
('Products', 1, 25, NULL, 2, NULL, NULL, 'testing aja dulu', 1343439528, 1343439644, 2),
('Products', 4, 26, NULL, 1, NULL, NULL, 'stoknya masih banyak sis ?', 1343750851, NULL, 0),
('Products', 8, 27, NULL, 1, NULL, NULL, 'mantap bener nih', 1343750889, NULL, 0),
('Products', 9, 28, NULL, 1, NULL, NULL, 'keren nih gan, stok masih ada?', 1343781843, 1343781855, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mailbox_conversation`
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_mailbox_conversation`
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
(9, 1, 9, 'Tanya om', 3, 0, 1342732120, 'no', 0, 0),
(10, 2, 9, 'Bro bagaimana kabara barangnya', 3, 0, 1343637772, 'no', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mailbox_message`
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tbl_mailbox_message`
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
(18, 9, 1342240161, 1, 9, 'Bos bisa dikirimin katalog terbaru ?\r\n\r\nthanks', 16),
(19, 9, 1342732120, 9, 1, 'Oke bos emailnya apa bos ?\r\n\r\nthanks', 35021923),
(20, 10, 1343637772, 2, 9, 'Bro bagaimana kabar barangnya, sudah seminggu kok belum ada kabarnya', 22398703462);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_profile`
--

INSERT INTO `tbl_profile` (`id`, `firstname`, `lastname`, `street`, `zipcode`, `city`, `country`, `user_id`) VALUES
(1, 'demolistik', 'demoslistik', '', '', '', '', 15),
(2, 'Demo', 'Sunarko', ' ', ' ', ' ', ' ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reset_password`
--

CREATE TABLE IF NOT EXISTS `tbl_reset_password` (
  `user_id` int(11) NOT NULL,
  `temp_forget_password` varchar(100) DEFAULT NULL,
  `start_time` varchar(50) DEFAULT NULL,
  `end_time` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE IF NOT EXISTS `tbl_state` (
  `province_id` varchar(10) NOT NULL,
  `province` varchar(255) DEFAULT NULL,
  `state_id` varchar(10) NOT NULL,
  `state` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`province_id`,`state_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`province_id`, `province`, `state_id`, `state`) VALUES
('11', 'NANGGROE ACEH DARUSSALAM', '01', 'SIMEULUE'),
('11', 'NANGGROE ACEH DARUSSALAM', '02', 'ACEH SINGKIL'),
('11', 'NANGGROE ACEH DARUSSALAM', '03', 'ACEH SELATAN'),
('11', 'NANGGROE ACEH DARUSSALAM', '04', 'ACEH TENGGARA'),
('11', 'NANGGROE ACEH DARUSSALAM', '05', 'ACEH TIMUR'),
('11', 'NANGGROE ACEH DARUSSALAM', '06', 'ACEH TENGAH'),
('11', 'NANGGROE ACEH DARUSSALAM', '07', 'ACEH BARAT'),
('11', 'NANGGROE ACEH DARUSSALAM', '08', 'ACEH BESAR'),
('11', 'NANGGROE ACEH DARUSSALAM', '09', 'PIDIE'),
('11', 'NANGGROE ACEH DARUSSALAM', '10', 'BIREUEN'),
('11', 'NANGGROE ACEH DARUSSALAM', '11', 'ACEH UTARA'),
('11', 'NANGGROE ACEH DARUSSALAM', '12', 'ACEH BARAT DAYA'),
('11', 'NANGGROE ACEH DARUSSALAM', '13', 'GAYO LUES'),
('11', 'NANGGROE ACEH DARUSSALAM', '14', 'ACEH TAMIANG'),
('11', 'NANGGROE ACEH DARUSSALAM', '15', 'NAGAN RAYA'),
('11', 'NANGGROE ACEH DARUSSALAM', '16', 'ACEH JAYA'),
('11', 'NANGGROE ACEH DARUSSALAM', '17', 'BENER MERIAH'),
('11', 'NANGGROE ACEH DARUSSALAM', '18', 'PIDIE JAYA'),
('11', 'NANGGROE ACEH DARUSSALAM', '71', 'KOTA BANDA ACEH'),
('11', 'NANGGROE ACEH DARUSSALAM', '72', 'KOTA SABANG'),
('11', 'NANGGROE ACEH DARUSSALAM', '73', 'KOTA LANGSA'),
('11', 'NANGGROE ACEH DARUSSALAM', '74', 'KOTA LHOKSEUMAWE'),
('11', 'NANGGROE ACEH DARUSSALAM', '75', 'KOTA SUBULUSSALAM'),
('12', 'SUMATERA UTARA', '01', 'NIAS'),
('12', 'SUMATERA UTARA', '02', 'MANDAILING NATAL'),
('12', 'SUMATERA UTARA', '03', 'TAPANULI SELATAN'),
('12', 'SUMATERA UTARA', '04', 'TAPANULI TENGAH'),
('12', 'SUMATERA UTARA', '05', 'TAPANULI UTARA'),
('12', 'SUMATERA UTARA', '06', 'TOBA SAMOSIR'),
('12', 'SUMATERA UTARA', '07', 'LABUHAN BATU'),
('12', 'SUMATERA UTARA', '08', 'ASAHAN'),
('12', 'SUMATERA UTARA', '09', 'SIMALUNGUN'),
('12', 'SUMATERA UTARA', '10', 'DAIRI'),
('12', 'SUMATERA UTARA', '11', 'KARO'),
('12', 'SUMATERA UTARA', '12', 'DELI SERDANG'),
('12', 'SUMATERA UTARA', '13', 'LANGKAT'),
('12', 'SUMATERA UTARA', '14', 'NIAS SELATAN'),
('12', 'SUMATERA UTARA', '15', 'HUMBANG HASUNDUTAN'),
('12', 'SUMATERA UTARA', '16', 'PAKPAK BHARAT'),
('12', 'SUMATERA UTARA', '17', 'SAMOSIR'),
('12', 'SUMATERA UTARA', '18', 'SERDANG BEDAGAI'),
('12', 'SUMATERA UTARA', '19', 'BATU BARA'),
('12', 'SUMATERA UTARA', '20', 'PADANG LAWAS UTARA'),
('12', 'SUMATERA UTARA', '21', 'PADANG LAWAS'),
('12', 'SUMATERA UTARA', '22', 'LABUHAN BATU SELATAN'),
('12', 'SUMATERA UTARA', '23', 'LABUHAN BATU UTARA'),
('12', 'SUMATERA UTARA', '24', 'NIAS UTARA'),
('12', 'SUMATERA UTARA', '25', 'NIAS BARAT'),
('12', 'SUMATERA UTARA', '71', 'KOTA SIBOLGA'),
('12', 'SUMATERA UTARA', '72', 'KOTA TANJUNG BALAI'),
('12', 'SUMATERA UTARA', '73', 'KOTA PEMATANG SIANTAR'),
('12', 'SUMATERA UTARA', '74', 'KOTA TEBING TINGGI'),
('12', 'SUMATERA UTARA', '75', 'KOTA MEDAN'),
('12', 'SUMATERA UTARA', '76', 'KOTA BINJAI'),
('12', 'SUMATERA UTARA', '77', 'KOTA PADANGSIDIMPUAN'),
('12', 'SUMATERA UTARA', '78', 'KOTA GUNUNGSITOLI'),
('13', 'SUMATERA BARAT', '01', 'KEPULAUAN MENTAWAI'),
('13', 'SUMATERA BARAT', '02', 'KAB. PESISIR SELATAN'),
('13', 'SUMATERA BARAT', '03', 'KOTA SOLOK'),
('13', 'SUMATERA BARAT', '04', 'KAB. SAWAHLUNTO-SIJUNJUNG'),
('13', 'SUMATERA BARAT', '05', 'KAB. TANAH DATAR'),
('13', 'SUMATERA BARAT', '06', 'KAB. PADANG PARIAMAN'),
('13', 'SUMATERA BARAT', '07', 'KAB. AGAM'),
('13', 'SUMATERA BARAT', '08', 'KAB. LIMA PULUH KOTA'),
('13', 'SUMATERA BARAT', '09', 'KAB. PASAMAN'),
('13', 'SUMATERA BARAT', '10', 'KAB. SOLOK SELATAN'),
('13', 'SUMATERA BARAT', '11', 'KAB. DHARMAS RAYA'),
('13', 'SUMATERA BARAT', '12', 'KAB. PASAMAN BARAT'),
('13', 'SUMATERA BARAT', '71', 'KOTA PADANG'),
('13', 'SUMATERA BARAT', '72', 'KOTA SOLOK'),
('13', 'SUMATERA BARAT', '73', 'KOTA SAWAH LUNTO'),
('13', 'SUMATERA BARAT', '74', 'KOTA PADANG PANJANG'),
('13', 'SUMATERA BARAT', '75', 'KOTA BUKITTINGGI'),
('13', 'SUMATERA BARAT', '76', 'KOTA PAYAKUMBUH'),
('13', 'SUMATERA BARAT', '77', 'KOTA PARIAMAN'),
('14', 'RIAU', '01', 'KUANTAN SINGINGI'),
('14', 'RIAU', '02', 'INDRAGIRI HULU'),
('14', 'RIAU', '03', 'INDRAGIRI HILIR'),
('14', 'RIAU', '04', 'PELALAWAN'),
('14', 'RIAU', '05', 'SIAK'),
('14', 'RIAU', '06', 'KAMPAR'),
('14', 'RIAU', '07', 'ROKAN HULU'),
('14', 'RIAU', '08', 'BENGKALIS'),
('14', 'RIAU', '09', 'ROKAN HILIR'),
('14', 'RIAU', '10', 'KEPULAUAN MERANTI'),
('14', 'RIAU', '71', 'KOTA PEKANBARU'),
('14', 'RIAU', '73', 'KOTA DUMAI'),
('15', 'JAMBI', '01', 'KERINCI'),
('15', 'JAMBI', '02', 'MERANGIN'),
('15', 'JAMBI', '03', 'SAROLANGUN'),
('15', 'JAMBI', '04', 'BATANG HARI'),
('15', 'JAMBI', '05', 'MUARO JAMBI'),
('15', 'JAMBI', '06', 'TANJUNG JABUNG TIMUR'),
('15', 'JAMBI', '07', 'TANJUNG JABUNG BARAT'),
('15', 'JAMBI', '08', 'TEBO'),
('15', 'JAMBI', '09', 'BUNGO'),
('15', 'JAMBI', '71', 'KOTA JAMBI'),
('15', 'JAMBI', '72', 'KOTA SUNGAI PENUH'),
('16', 'SUMATERA SELATAN', '01', 'OGAN KOMERING ULU'),
('16', 'SUMATERA SELATAN', '02', 'OGAN KOMERING ILIR'),
('16', 'SUMATERA SELATAN', '03', 'MUARA ENIM'),
('16', 'SUMATERA SELATAN', '04', 'LAHAT'),
('16', 'SUMATERA SELATAN', '05', 'MUSI RAWAS'),
('16', 'SUMATERA SELATAN', '06', 'MUSI BANYUASIN'),
('16', 'SUMATERA SELATAN', '07', 'BANYU ASIN'),
('16', 'SUMATERA SELATAN', '08', 'OGAN KOMERING ULU SELATAN'),
('16', 'SUMATERA SELATAN', '09', 'OGAN KOMERING ULU TIMUR'),
('16', 'SUMATERA SELATAN', '10', 'OGAN ILIR'),
('16', 'SUMATERA SELATAN', '11', 'EMPAT LAWANG'),
('16', 'SUMATERA SELATAN', '71', 'KOTA PALEMBANG'),
('16', 'SUMATERA SELATAN', '72', 'KOTA PRABUMULIH'),
('16', 'SUMATERA SELATAN', '73', 'KOTA PAGAR ALAM'),
('16', 'SUMATERA SELATAN', '74', 'KOTA LUBUK LINGGAU'),
('17', 'BENGKULU', '01', 'BENGKULU SELATAN'),
('17', 'BENGKULU', '02', 'REJANG LEBONG'),
('17', 'BENGKULU', '03', 'BENGKULU UTARA'),
('17', 'BENGKULU', '04', 'KAUR'),
('17', 'BENGKULU', '05', 'SELUMA'),
('17', 'BENGKULU', '06', 'MUKOMUKO'),
('17', 'BENGKULU', '07', 'LEBONG'),
('17', 'BENGKULU', '08', 'KEPAHIANG'),
('17', 'BENGKULU', '09', 'BENGKULU TENGAH'),
('17', 'BENGKULU', '71', 'KOTA BENGKULU'),
('18', 'LAMPUNG', '01', 'LAMPUNG BARAT'),
('18', 'LAMPUNG', '02', 'TANGGAMUS'),
('18', 'LAMPUNG', '03', 'LAMPUNG SELATAN'),
('18', 'LAMPUNG', '04', 'LAMPUNG TIMUR'),
('18', 'LAMPUNG', '05', 'LAMPUNG TENGAH'),
('18', 'LAMPUNG', '06', 'LAMPUNG UTARA'),
('18', 'LAMPUNG', '07', 'WAY KANAN'),
('18', 'LAMPUNG', '08', 'TULANG BAWANG'),
('18', 'LAMPUNG', '09', 'PESAWARAN'),
('18', 'LAMPUNG', '10', 'PRINGSEWU'),
('18', 'LAMPUNG', '11', 'MESUJI'),
('18', 'LAMPUNG', '12', 'TULANG BAWANG BARAT'),
('18', 'LAMPUNG', '71', 'KOTA BANDAR LAMPUNG'),
('18', 'LAMPUNG', '72', 'KOTA METRO'),
('19', 'KEPULAUAN BANGKA BELITUNG', '01', 'BANGKA'),
('19', 'KEPULAUAN BANGKA BELITUNG', '02', 'BELITUNG'),
('19', 'KEPULAUAN BANGKA BELITUNG', '03', 'BANGKA BARAT'),
('19', 'KEPULAUAN BANGKA BELITUNG', '04', 'BANGKA TENGAH'),
('19', 'KEPULAUAN BANGKA BELITUNG', '05', 'BANGKA SELATAN'),
('19', 'KEPULAUAN BANGKA BELITUNG', '06', 'BELITUNG TIMUR'),
('19', 'KEPULAUAN BANGKA BELITUNG', '71', 'KOTA PANGKAL PINANG'),
('21', 'KEPULAUAN RIAU', '01', 'KARIMUN'),
('21', 'KEPULAUAN RIAU', '02', 'BINTAN'),
('21', 'KEPULAUAN RIAU', '03', 'NATUNA'),
('21', 'KEPULAUAN RIAU', '04', 'LINGGA'),
('21', 'KEPULAUAN RIAU', '05', 'KEPULAUAN ANAMBAS'),
('21', 'KEPULAUAN RIAU', '71', 'KOTA B A T A M'),
('21', 'KEPULAUAN RIAU', '72', 'KOTA TANJUNG PINANG'),
('31', 'DKI JAKARTA', '01', 'KEPULAUAN SERIBU'),
('31', 'DKI JAKARTA', '71', 'KOTA JAKARTA SELATAN'),
('31', 'DKI JAKARTA', '72', 'KOTA JAKARTA TIMUR'),
('31', 'DKI JAKARTA', '73', 'KOTA JAKARTA PUSAT'),
('31', 'DKI JAKARTA', '74', 'KOTA JAKARTA BARAT'),
('31', 'DKI JAKARTA', '75', 'KOTA JAKARTA UTARA'),
('32', 'JAWA BARAT', '01', 'BOGOR'),
('32', 'JAWA BARAT', '02', 'SUKABUMI'),
('32', 'JAWA BARAT', '03', 'CIANJUR'),
('32', 'JAWA BARAT', '04', 'BANDUNG'),
('32', 'JAWA BARAT', '05', 'GARUT'),
('32', 'JAWA BARAT', '06', 'TASIKMALAYA'),
('32', 'JAWA BARAT', '07', 'CIAMIS'),
('32', 'JAWA BARAT', '08', 'KUNINGAN'),
('32', 'JAWA BARAT', '09', 'CIREBON'),
('32', 'JAWA BARAT', '10', 'MAJALENGKA'),
('32', 'JAWA BARAT', '11', 'SUMEDANG'),
('32', 'JAWA BARAT', '12', 'INDRAMAYU'),
('32', 'JAWA BARAT', '13', 'SUBANG'),
('32', 'JAWA BARAT', '14', 'PURWAKARTA'),
('32', 'JAWA BARAT', '15', 'KARAWANG'),
('32', 'JAWA BARAT', '16', 'BEKASI'),
('32', 'JAWA BARAT', '17', 'BANDUNG BARAT'),
('32', 'JAWA BARAT', '71', 'BOGOR'),
('32', 'JAWA BARAT', '72', 'SUKABUMI'),
('32', 'JAWA BARAT', '73', 'BANDUNG'),
('32', 'JAWA BARAT', '74', 'CIREBON'),
('32', 'JAWA BARAT', '75', 'BEKASI'),
('32', 'JAWA BARAT', '76', 'DEPOK'),
('32', 'JAWA BARAT', '77', 'CIMAHI'),
('32', 'JAWA BARAT', '78', 'TASIKMALAYA'),
('32', 'JAWA BARAT', '79', 'BANJAR'),
('33', 'JAWA TENGAH', '01', 'CILACAP'),
('33', 'JAWA TENGAH', '02', 'BANYUMAS'),
('33', 'JAWA TENGAH', '03', 'PURBALINGGA'),
('33', 'JAWA TENGAH', '04', 'BANJARNEGARA'),
('33', 'JAWA TENGAH', '05', 'KEBUMEN'),
('33', 'JAWA TENGAH', '06', 'PURWOREJO'),
('33', 'JAWA TENGAH', '07', 'WONOSOBO'),
('33', 'JAWA TENGAH', '08', 'MAGELANG'),
('33', 'JAWA TENGAH', '09', 'BOYOLALI'),
('33', 'JAWA TENGAH', '10', 'KLATEN'),
('33', 'JAWA TENGAH', '11', 'SUKOHARJO'),
('33', 'JAWA TENGAH', '12', 'WONOGIRI'),
('33', 'JAWA TENGAH', '13', 'KARANGANYAR'),
('33', 'JAWA TENGAH', '14', 'SRAGEN'),
('33', 'JAWA TENGAH', '15', 'GROBOGAN'),
('33', 'JAWA TENGAH', '16', 'BLORA'),
('33', 'JAWA TENGAH', '17', 'REMBANG'),
('33', 'JAWA TENGAH', '18', 'PATI'),
('33', 'JAWA TENGAH', '19', 'KUDUS'),
('33', 'JAWA TENGAH', '20', 'JEPARA'),
('33', 'JAWA TENGAH', '21', 'DEMAK'),
('33', 'JAWA TENGAH', '22', 'SEMARANG'),
('33', 'JAWA TENGAH', '23', 'TEMANGGUNG'),
('33', 'JAWA TENGAH', '24', 'KENDAL'),
('33', 'JAWA TENGAH', '25', 'BATANG'),
('33', 'JAWA TENGAH', '26', 'PEKALONGAN'),
('33', 'JAWA TENGAH', '27', 'PEMALANG'),
('33', 'JAWA TENGAH', '28', 'TEGAL'),
('33', 'JAWA TENGAH', '29', 'BREBES'),
('33', 'JAWA TENGAH', '71', 'MAGELANG'),
('33', 'JAWA TENGAH', '72', 'SURAKARTA'),
('33', 'JAWA TENGAH', '73', 'SALATIGA'),
('33', 'JAWA TENGAH', '74', 'SEMARANG'),
('33', 'JAWA TENGAH', '75', 'PEKALONGAN'),
('33', 'JAWA TENGAH', '76', 'TEGAL'),
('34', 'DI YOGYAKARTA', '01', 'KULON PROGO'),
('34', 'DI YOGYAKARTA', '02', 'BANTUL'),
('34', 'DI YOGYAKARTA', '03', 'GUNUNG KIDUL'),
('34', 'DI YOGYAKARTA', '04', 'SLEMAN'),
('34', 'DI YOGYAKARTA', '71', 'YOGYAKARTA'),
('35', 'JAWA TIMUR', '01', 'PACITAN'),
('35', 'JAWA TIMUR', '02', 'PONOROGO'),
('35', 'JAWA TIMUR', '03', 'TRENGGALEK'),
('35', 'JAWA TIMUR', '04', 'TULUNGAGUNG'),
('35', 'JAWA TIMUR', '05', 'BLITAR'),
('35', 'JAWA TIMUR', '06', 'KEDIRI'),
('35', 'JAWA TIMUR', '07', 'MALANG'),
('35', 'JAWA TIMUR', '08', 'LUMAJANG'),
('35', 'JAWA TIMUR', '09', 'JEMBER'),
('35', 'JAWA TIMUR', '10', 'BANYUWANGI'),
('35', 'JAWA TIMUR', '11', 'BONDOWOSO'),
('35', 'JAWA TIMUR', '12', 'SITUBONDO'),
('35', 'JAWA TIMUR', '13', 'PROBOLINGGO'),
('35', 'JAWA TIMUR', '14', 'PASURUAN'),
('35', 'JAWA TIMUR', '15', 'SIDOARJO'),
('35', 'JAWA TIMUR', '16', 'MOJOKERTO'),
('35', 'JAWA TIMUR', '17', 'JOMBANG'),
('35', 'JAWA TIMUR', '18', 'NGANJUK'),
('35', 'JAWA TIMUR', '19', 'MADIUN'),
('35', 'JAWA TIMUR', '20', 'MAGETAN'),
('35', 'JAWA TIMUR', '21', 'NGAWI'),
('35', 'JAWA TIMUR', '22', 'BOJONEGORO'),
('35', 'JAWA TIMUR', '23', 'TUBAN'),
('35', 'JAWA TIMUR', '24', 'LAMONGAN'),
('35', 'JAWA TIMUR', '25', 'GRESIK'),
('35', 'JAWA TIMUR', '26', 'BANGKALAN'),
('35', 'JAWA TIMUR', '27', 'SAMPANG'),
('35', 'JAWA TIMUR', '28', 'PAMEKASAN'),
('35', 'JAWA TIMUR', '29', 'SUMENEP'),
('35', 'JAWA TIMUR', '71', 'KEDIRI'),
('35', 'JAWA TIMUR', '72', 'BLITAR'),
('35', 'JAWA TIMUR', '73', 'MALANG'),
('35', 'JAWA TIMUR', '74', 'PROBOLINGGO'),
('35', 'JAWA TIMUR', '75', 'PASURUAN'),
('35', 'JAWA TIMUR', '76', 'MOJOKERTO'),
('35', 'JAWA TIMUR', '77', 'MADIUN'),
('35', 'JAWA TIMUR', '78', 'SURABAYA'),
('35', 'JAWA TIMUR', '79', 'BATU'),
('36', 'BANTEN', '01', 'PANDEGLANG'),
('36', 'BANTEN', '02', 'LEBAK'),
('36', 'BANTEN', '03', 'KABUPATEN TANGERANG'),
('36', 'BANTEN', '04', 'SERANG'),
('36', 'BANTEN', '71', 'KOTA TANGERANG'),
('36', 'BANTEN', '72', 'CILEGON'),
('36', 'BANTEN', '73', 'KOTA SERANG'),
('36', 'BANTEN', '74', 'TANGERANG SELATAN'),
('51', 'BALI', '01', 'JEMBRANA'),
('51', 'BALI', '02', 'TABANAN'),
('51', 'BALI', '03', 'BADUNG'),
('51', 'BALI', '04', 'GIANYAR'),
('51', 'BALI', '05', 'KLUNGKUNG'),
('51', 'BALI', '06', 'BANGLI'),
('51', 'BALI', '07', 'KARANG ASEM'),
('51', 'BALI', '08', 'BULELENG'),
('51', 'BALI', '71', 'DENPASAR'),
('52', 'NUSA TENGGARA BARAT', '01', 'LOMBOK BARAT'),
('52', 'NUSA TENGGARA BARAT', '02', 'LOMBOK TENGAH'),
('52', 'NUSA TENGGARA BARAT', '03', 'LOMBOK TIMUR'),
('52', 'NUSA TENGGARA BARAT', '04', 'SUMBAWA'),
('52', 'NUSA TENGGARA BARAT', '05', 'DOMPU'),
('52', 'NUSA TENGGARA BARAT', '06', 'BIMA'),
('52', 'NUSA TENGGARA BARAT', '07', 'SUMBAWA BARAT'),
('52', 'NUSA TENGGARA BARAT', '08', 'LOMBOK UTARA'),
('52', 'NUSA TENGGARA BARAT', '71', 'KOTA MATARAM'),
('52', 'NUSA TENGGARA BARAT', '72', 'KOTA BIMA'),
('53', 'NUSA TENGGARA TIMUR', '01', 'SUMBA BARAT'),
('53', 'NUSA TENGGARA TIMUR', '02', 'SUMBA TIMUR'),
('53', 'NUSA TENGGARA TIMUR', '03', 'KUPANG'),
('53', 'NUSA TENGGARA TIMUR', '04', 'TIMOR TENGAH SELATAN'),
('53', 'NUSA TENGGARA TIMUR', '05', 'TIMOR TENGAH UTARA'),
('53', 'NUSA TENGGARA TIMUR', '06', 'BELU'),
('53', 'NUSA TENGGARA TIMUR', '07', 'ALOR'),
('53', 'NUSA TENGGARA TIMUR', '08', 'LEMBATA'),
('53', 'NUSA TENGGARA TIMUR', '09', 'FLORES TIMUR'),
('53', 'NUSA TENGGARA TIMUR', '10', 'SIKKA'),
('53', 'NUSA TENGGARA TIMUR', '11', 'ENDE'),
('53', 'NUSA TENGGARA TIMUR', '12', 'NGADA'),
('53', 'NUSA TENGGARA TIMUR', '13', 'MANGGARAI'),
('53', 'NUSA TENGGARA TIMUR', '14', 'ROTE NDAO'),
('53', 'NUSA TENGGARA TIMUR', '15', 'MANGGARAI BARAT'),
('53', 'NUSA TENGGARA TIMUR', '16', 'SUMBA TENGAH'),
('53', 'NUSA TENGGARA TIMUR', '17', 'SUMBA BARAT DAYA'),
('53', 'NUSA TENGGARA TIMUR', '18', 'NAGEKEO'),
('53', 'NUSA TENGGARA TIMUR', '19', 'MANGGARAI TIMUR'),
('53', 'NUSA TENGGARA TIMUR', '20', 'SABU RAIJUA'),
('53', 'NUSA TENGGARA TIMUR', '71', 'KOTA KUPANG'),
('61', 'KALIMANTAN BARAT', '01', 'SAMBAS'),
('61', 'KALIMANTAN BARAT', '02', 'BENGKAYANG'),
('61', 'KALIMANTAN BARAT', '03', 'LANDAK'),
('61', 'KALIMANTAN BARAT', '04', 'PONTIANAK'),
('61', 'KALIMANTAN BARAT', '05', 'SANGGAU'),
('61', 'KALIMANTAN BARAT', '06', 'KETAPANG'),
('61', 'KALIMANTAN BARAT', '07', 'SINTANG'),
('61', 'KALIMANTAN BARAT', '08', 'KAPUAS HULU'),
('61', 'KALIMANTAN BARAT', '09', 'SEKADAU'),
('61', 'KALIMANTAN BARAT', '10', 'MELAWI'),
('61', 'KALIMANTAN BARAT', '11', 'KAYONG UTARA'),
('61', 'KALIMANTAN BARAT', '12', 'KUBU RAYA'),
('61', 'KALIMANTAN BARAT', '71', 'PONTIANAK'),
('61', 'KALIMANTAN BARAT', '72', 'SINGKAWANG'),
('62', 'KALIMANTAN TENGAH', '01', 'KOTAWARINGIN BARAT'),
('62', 'KALIMANTAN TENGAH', '02', 'KOTAWARINGIN TIMUR'),
('62', 'KALIMANTAN TENGAH', '03', 'KAPUAS'),
('62', 'KALIMANTAN TENGAH', '04', 'BARITO SELATAN'),
('62', 'KALIMANTAN TENGAH', '05', 'BARITO UTARA'),
('62', 'KALIMANTAN TENGAH', '06', 'SUKAMARA'),
('62', 'KALIMANTAN TENGAH', '07', 'LAMANDAU'),
('62', 'KALIMANTAN TENGAH', '08', 'SERUYAN'),
('62', 'KALIMANTAN TENGAH', '09', 'KATINGAN'),
('62', 'KALIMANTAN TENGAH', '10', 'PULANG PISAU'),
('62', 'KALIMANTAN TENGAH', '11', 'GUNUNG MAS'),
('62', 'KALIMANTAN TENGAH', '12', 'BARITO TIMUR'),
('62', 'KALIMANTAN TENGAH', '13', 'MURUNG RAYA'),
('62', 'KALIMANTAN TENGAH', '71', 'PALANGKA RAYA'),
('63', 'KALIMANTAN SELATAN', '01', 'TANAH LAUT'),
('63', 'KALIMANTAN SELATAN', '02', 'KOTA BARU'),
('63', 'KALIMANTAN SELATAN', '03', 'BANJAR'),
('63', 'KALIMANTAN SELATAN', '04', 'BARITO KUALA'),
('63', 'KALIMANTAN SELATAN', '05', 'TAPIN'),
('63', 'KALIMANTAN SELATAN', '06', 'HULU SUNGAI SELATAN'),
('63', 'KALIMANTAN SELATAN', '07', 'HULU SUNGAI TENGAH'),
('63', 'KALIMANTAN SELATAN', '08', 'HULU SUNGAI UTARA'),
('63', 'KALIMANTAN SELATAN', '09', 'TABALONG'),
('63', 'KALIMANTAN SELATAN', '10', 'TANAH BUMBU'),
('63', 'KALIMANTAN SELATAN', '11', 'BALANGAN'),
('63', 'KALIMANTAN SELATAN', '71', 'BANJARMASIN'),
('63', 'KALIMANTAN SELATAN', '72', 'BANJAR BARU'),
('64', 'KALIMANTAN TIMUR', '01', 'PASER'),
('64', 'KALIMANTAN TIMUR', '02', 'KUTAI BARAT'),
('64', 'KALIMANTAN TIMUR', '03', 'KUTAI KARTANEGARA'),
('64', 'KALIMANTAN TIMUR', '04', 'KUTAI TIMUR'),
('64', 'KALIMANTAN TIMUR', '05', 'BERAU'),
('64', 'KALIMANTAN TIMUR', '06', 'MALINAU'),
('64', 'KALIMANTAN TIMUR', '07', 'BULUNGAN'),
('64', 'KALIMANTAN TIMUR', '08', 'NUNUKAN'),
('64', 'KALIMANTAN TIMUR', '09', 'PENAJAM PASER UTARA'),
('64', 'KALIMANTAN TIMUR', '10', 'TANA TIDUNG'),
('64', 'KALIMANTAN TIMUR', '71', 'KOTA BALIKPAPAN'),
('64', 'KALIMANTAN TIMUR', '72', 'KOTA SAMARINDA'),
('64', 'KALIMANTAN TIMUR', '73', 'KOTA TARAKAN'),
('64', 'KALIMANTAN TIMUR', '74', 'KOTA BONTANG'),
('71', 'SULAWESI UTARA', '01', 'BOLAANG MONGONDOW'),
('71', 'SULAWESI UTARA', '02', 'MINAHASA'),
('71', 'SULAWESI UTARA', '03', 'KEPULAUAN SANGIHE'),
('71', 'SULAWESI UTARA', '04', 'KEPULAUAN TALAUD'),
('71', 'SULAWESI UTARA', '05', 'MINAHASA SELATAN'),
('71', 'SULAWESI UTARA', '06', 'MINAHASA UTARA'),
('71', 'SULAWESI UTARA', '07', 'BOLAANG MONGONDOW UTARA'),
('71', 'SULAWESI UTARA', '08', 'SIAU TAGULANDANG BIARO'),
('71', 'SULAWESI UTARA', '09', 'MINAHASA TENGGARA'),
('71', 'SULAWESI UTARA', '71', 'MANADO'),
('71', 'SULAWESI UTARA', '72', 'BITUNG'),
('71', 'SULAWESI UTARA', '73', 'TOMOHON'),
('71', 'SULAWESI UTARA', '74', 'KOTAMOBAGU'),
('72', 'SULAWESI TENGAH', '01', 'BANGGAI KEPULAUAN'),
('72', 'SULAWESI TENGAH', '02', 'BANGGAI'),
('72', 'SULAWESI TENGAH', '03', 'MOROWALI'),
('72', 'SULAWESI TENGAH', '04', 'POSO'),
('72', 'SULAWESI TENGAH', '05', 'DONGGALA'),
('72', 'SULAWESI TENGAH', '06', 'TOLI-TOLI'),
('72', 'SULAWESI TENGAH', '07', 'BUOL'),
('72', 'SULAWESI TENGAH', '08', 'PARIGI MOUTONG'),
('72', 'SULAWESI TENGAH', '09', 'TOJO UNA-UNA'),
('72', 'SULAWESI TENGAH', '10', 'SIGI'),
('72', 'SULAWESI TENGAH', '71', 'KOTA PALU'),
('73', 'SULAWESI SELATAN', '01', 'SELAYAR'),
('73', 'SULAWESI SELATAN', '02', 'BULUKUMBA'),
('73', 'SULAWESI SELATAN', '03', 'BANTAENG'),
('73', 'SULAWESI SELATAN', '04', 'JENEPONTO'),
('73', 'SULAWESI SELATAN', '05', 'TAKALAR'),
('73', 'SULAWESI SELATAN', '06', 'GOWA'),
('73', 'SULAWESI SELATAN', '07', 'SINJAI'),
('73', 'SULAWESI SELATAN', '08', 'MAROS'),
('73', 'SULAWESI SELATAN', '09', 'PANGKAJENE DAN KEPULAUAN'),
('73', 'SULAWESI SELATAN', '10', 'BARRU'),
('73', 'SULAWESI SELATAN', '11', 'BONE'),
('73', 'SULAWESI SELATAN', '12', 'SOPPENG'),
('73', 'SULAWESI SELATAN', '13', 'WAJO'),
('73', 'SULAWESI SELATAN', '14', 'SIDENRENG RAPPANG'),
('73', 'SULAWESI SELATAN', '15', 'PINRANG'),
('73', 'SULAWESI SELATAN', '16', 'ENREKANG'),
('73', 'SULAWESI SELATAN', '17', 'LUWU'),
('73', 'SULAWESI SELATAN', '18', 'TANA TORAJA'),
('73', 'SULAWESI SELATAN', '22', 'LUWU UTARA'),
('73', 'SULAWESI SELATAN', '25', 'LUWU TIMUR'),
('73', 'SULAWESI SELATAN', '71', 'MAKASSAR'),
('73', 'SULAWESI SELATAN', '72', 'PARE-PARE'),
('73', 'SULAWESI SELATAN', '73', 'PALOPO'),
('74', 'SULAWESI TENGGARA', '01', 'BUTON'),
('74', 'SULAWESI TENGGARA', '02', 'MUNA'),
('74', 'SULAWESI TENGGARA', '03', 'KONAWE'),
('74', 'SULAWESI TENGGARA', '04', 'KOLAKA'),
('74', 'SULAWESI TENGGARA', '05', 'KONAWE SELATAN'),
('74', 'SULAWESI TENGGARA', '06', 'BOMBANA'),
('74', 'SULAWESI TENGGARA', '07', 'WAKATOBI'),
('74', 'SULAWESI TENGGARA', '08', 'KOLAKA UTARA'),
('74', 'SULAWESI TENGGARA', '09', 'BUTON UTARA'),
('74', 'SULAWESI TENGGARA', '10', 'KONAWE UTARA'),
('74', 'SULAWESI TENGGARA', '71', 'KOTA KENDARI'),
('74', 'SULAWESI TENGGARA', '72', 'KOTA BAU-BAU'),
('75', 'GORONTALO', '01', 'BOALEMO'),
('75', 'GORONTALO', '02', 'GORONTALO'),
('75', 'GORONTALO', '03', 'POHUWATO'),
('75', 'GORONTALO', '04', 'BONE BOLANGO'),
('75', 'GORONTALO', '05', 'GORONTALO UTARA'),
('75', 'GORONTALO', '71', 'KOTA GORONTALO'),
('76', 'SULAWESI BARAT', '01', 'MAJENE'),
('76', 'SULAWESI BARAT', '02', 'POLEWALI MANDAR'),
('76', 'SULAWESI BARAT', '03', 'MAMASA'),
('76', 'SULAWESI BARAT', '04', 'MAMUJU'),
('76', 'SULAWESI BARAT', '05', 'MAMUJU UTARA'),
('81', 'MALUKU', '01', 'MALUKU TENGGARA BARAT'),
('81', 'MALUKU', '02', 'MALUKU TENGGARA'),
('81', 'MALUKU', '03', 'MALUKU TENGAH'),
('81', 'MALUKU', '04', 'BURU'),
('81', 'MALUKU', '05', 'KEPULAUAN ARU'),
('81', 'MALUKU', '06', 'SERAM BAGIAN BARAT'),
('81', 'MALUKU', '07', 'SERAM BAGIAN TIMUR'),
('81', 'MALUKU', '71', 'AMBON'),
('81', 'MALUKU', '72', 'TUAL'),
('82', 'MALUKU UTARA', '01', 'HALMAHERA BARAT'),
('82', 'MALUKU UTARA', '02', 'HALMAHERA TENGAH'),
('82', 'MALUKU UTARA', '03', 'KEPULAUAN SULA'),
('82', 'MALUKU UTARA', '04', 'HALMAHERA SELATAN'),
('82', 'MALUKU UTARA', '05', 'HALMAHERA UTARA'),
('82', 'MALUKU UTARA', '06', 'HALMAHERA TIMUR'),
('82', 'MALUKU UTARA', '07', 'PULAU MOROTAI'),
('82', 'MALUKU UTARA', '71', 'KOTA TERNATE'),
('82', 'MALUKU UTARA', '72', 'KOTA TIDORE KEPULAUAN'),
('91', 'PAPUA BARAT', '01', 'FAKFAK'),
('91', 'PAPUA BARAT', '02', 'KAIMANA'),
('91', 'PAPUA BARAT', '03', 'TELUK WONDAMA'),
('91', 'PAPUA BARAT', '04', 'TELUK BINTUNI'),
('91', 'PAPUA BARAT', '05', 'MANOKWARI'),
('91', 'PAPUA BARAT', '06', 'SORONG SELATAN'),
('91', 'PAPUA BARAT', '07', 'SORONG'),
('91', 'PAPUA BARAT', '08', 'RAJA AMPAT'),
('91', 'PAPUA BARAT', '09', 'TAMBRAUW'),
('91', 'PAPUA BARAT', '10', 'MAYBRAT'),
('91', 'PAPUA BARAT', '71', 'KOTA SORONG'),
('94', 'PAPUA', '01', 'MERAUKE'),
('94', 'PAPUA', '02', 'JAYAWIJAYA'),
('94', 'PAPUA', '03', 'JAYAPURA'),
('94', 'PAPUA', '04', 'NABIRE'),
('94', 'PAPUA', '08', 'KEPULAUAN YAPEN'),
('94', 'PAPUA', '09', 'BIAK NUMFOR'),
('94', 'PAPUA', '10', 'PANIAI'),
('94', 'PAPUA', '11', 'PUNCAK JAYA'),
('94', 'PAPUA', '12', 'MIMIKA'),
('94', 'PAPUA', '13', 'BOVEN DIGOEL'),
('94', 'PAPUA', '14', 'MAPPI'),
('94', 'PAPUA', '15', 'ASMAT'),
('94', 'PAPUA', '16', 'YAHUKIMO'),
('94', 'PAPUA', '17', 'PEGUNUNGAN BINTANG'),
('94', 'PAPUA', '18', 'TOLIKARA'),
('94', 'PAPUA', '19', 'SARMI'),
('94', 'PAPUA', '20', 'KEEROM'),
('94', 'PAPUA', '26', 'WAROPEN'),
('94', 'PAPUA', '27', 'SUPIORI'),
('94', 'PAPUA', '28', 'MAMBERAMO RAYA'),
('94', 'PAPUA', '29', 'NDUGA'),
('94', 'PAPUA', '30', 'LANNY JAYA'),
('94', 'PAPUA', '31', 'MAMBERAMO TENGAH'),
('94', 'PAPUA', '32', 'YALIMO'),
('94', 'PAPUA', '33', 'PUNCAK'),
('94', 'PAPUA', '34', 'DOGIYAI'),
('94', 'PAPUA', '35', 'INTAN JAYA'),
('94', 'PAPUA', '36', 'DEIYAI'),
('94', 'PAPUA', '71', 'KOTA JAYAPURA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `salt`, `email`, `profile`, `first_name`, `last_name`) VALUES
(1, 'demo', '2e5c7db760a33498023813489cfadc0b', '28b206548469ce62182048fd9cf91760', 'webmaster@example.com', NULL, NULL, NULL),
(2, 'nakos', 'bba99b601c28ab80308951cda62c7eba', '4ef6c197490601.61954109', 'budi@localhost.com', NULL, 'budi', NULL),
(9, 'bunas', '2562f15bccf89cf738cc11e9279c1c37', '4f5636bdb80a74.86606685', 'budidemo@localhost.com', NULL, 'budi', 'sunarko'),
(15, 'demoslistik', 'be05f3677ed8a6086befb658522f5924', '50098c411e2594.98609474', 'demoslistik@localhost.com', NULL, 'demolistik', 'demoslistik');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_useradmin`
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
-- Dumping data for table `tbl_useradmin`
--

INSERT INTO `tbl_useradmin` (`id`, `username`, `password`, `salt`, `email`, `profile`) VALUES
(1, 'admin', '2e5c7db760a33498023813489cfadc0b', '28b206548469ce62182048fd9cf91760', 'webmaster@example.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usergroups_access`
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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usergroups_configuration`
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
-- Dumping data for table `tbl_usergroups_configuration`
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
-- Table structure for table `tbl_usergroups_cron`
--

CREATE TABLE IF NOT EXISTS `tbl_usergroups_cron` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `lapse` int(6) DEFAULT NULL,
  `last_occurrence` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_usergroups_cron`
--

INSERT INTO `tbl_usergroups_cron` (`id`, `name`, `lapse`, `last_occurrence`) VALUES
(1, 'garbage_collection', 7, '2012-01-26 00:00:00'),
(2, 'unban', 1, '2012-01-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usergroups_group`
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
-- Dumping data for table `tbl_usergroups_group`
--

INSERT INTO `tbl_usergroups_group` (`id`, `groupname`, `level`, `home`) VALUES
(1, 'root', 100, NULL),
(2, 'user', 1, '/userGroups');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usergroups_lookup`
--

CREATE TABLE IF NOT EXISTS `tbl_usergroups_lookup` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `element` varchar(20) DEFAULT NULL,
  `value` int(5) DEFAULT NULL,
  `text` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_usergroups_lookup`
--

INSERT INTO `tbl_usergroups_lookup` (`id`, `element`, `value`, `text`) VALUES
(1, 'status', 0, 'banned'),
(2, 'status', 1, 'waiting activation'),
(3, 'status', 2, 'waiting approval'),
(4, 'status', 3, 'password change request'),
(5, 'status', 4, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usergroups_user`
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
-- Dumping data for table `tbl_usergroups_user`
--

INSERT INTO `tbl_usergroups_user` (`id`, `group_id`, `username`, `password`, `email`, `home`, `status`, `question`, `answer`, `creation_date`, `activation_code`, `activation_time`, `last_login`, `ban`, `ban_reason`) VALUES
(1, 1, 'admin', 'da964977e2498fa2289e5916e4b01997', 'budi@localhost.com', '/userGroups/admin/documentation', 4, 'test', 'test', '2012-01-07 21:00:32', NULL, NULL, '2012-01-26 02:02:17', NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `shop_image`
--
ALTER TABLE `shop_image`
  ADD CONSTRAINT `fk_Image_Products` FOREIGN KEY (`product_id`) REFERENCES `shop_products` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `shop_products`
--
ALTER TABLE `shop_products`
  ADD CONSTRAINT `fk_products_category` FOREIGN KEY (`category_id`) REFERENCES `shop_category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
