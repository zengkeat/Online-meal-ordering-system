-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 01, 2023 at 10:30 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_meal_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `credit_transaction`
--

CREATE TABLE `credit_transaction` (
  `CreditT_ID` int(11) NOT NULL,
  `Customer_ID` varchar(255) NOT NULL,
  `Staff_ID` int(11) NOT NULL,
  `Action` varchar(255) NOT NULL,
  `Amount` varchar(255) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `credit_transaction`
--

INSERT INTO `credit_transaction` (`CreditT_ID`, `Customer_ID`, `Staff_ID`, `Action`, `Amount`, `Date`) VALUES
(90001, 'TP044766', 30002, 'Top-Up', '44', '2019-03-23 12:27:58'),
(90002, 'TP044766', 0, 'Top-Up', '66', '2019-03-23 12:29:36'),
(90003, 'TP044766', 0, 'Refund', '33', '2019-03-23 13:13:25'),
(90004, 'TP044766', 0, 'Top-Up', '88', '2019-03-23 14:07:08'),
(90005, 'TP044766', 30001, 'Top-Up', '77', '2019-03-24 21:39:36'),
(90006, 'TP044766', 0, 'Refund', '99', '2019-03-24 21:39:57'),
(90007, 'TP044766', 0, 'Top-Up', '5', '2019-03-25 18:10:05'),
(90008, 'TP044766', 0, 'Top-Up', '11', '2019-03-25 19:42:39'),
(90009, 'LC044766', 30002, 'Top-Up', '10', '2019-04-08 14:32:53'),
(90010, 'TP938282', 0, 'Top-Up', '0', '2019-04-08 15:41:12'),
(90011, 'TP938282', 0, 'Top-Up', '1000', '2019-04-08 15:41:44'),
(90012, 'TP044766', 30002, 'Top-Up', '25', '2019-04-08 15:52:55'),
(90013, 'TP044766', 30002, 'Refund', '8850.12', '2019-04-08 15:53:25'),
(90014, 'TP044766', 30002, 'Top-Up', '1000', '2019-04-08 15:53:39');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_ID` varchar(255) NOT NULL,
  `Customer_Name` varchar(255) NOT NULL,
  `Customer_Password` varchar(255) NOT NULL,
  `Customer_Role` varchar(255) NOT NULL,
  `Customer_Gender` varchar(255) NOT NULL,
  `Customer_IC_No` varchar(255) NOT NULL,
  `Customer_Contact` varchar(255) NOT NULL,
  `Customer_Email` varchar(255) NOT NULL,
  `Customer_Description` varchar(255) NOT NULL,
  `Customer_Credit_Balance` varchar(255) NOT NULL,
  `Customer_File` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_ID`, `Customer_Name`, `Customer_Password`, `Customer_Role`, `Customer_Gender`, `Customer_IC_No`, `Customer_Contact`, `Customer_Email`, `Customer_Description`, `Customer_Credit_Balance`, `Customer_File`) VALUES
('TP044765', 'john snow', '25d55ad283aa400af464c76d713c07ad', 'student', 'male', '8029029019', '01832252351', 'zengkeat@gmail.com', 'my name is chew ii tung', '7628.57', 'cardi b.jpg'),
('TP044766', 'Cersei Lannister', '25d55ad283aa400af464c76d713c07ad', 'Student', 'male', '980308146177', '018-3225235', 'zengkeat@gmail.com', 'UCDF1705ICT(SE)', '991.22', 'jonny depp.jpg'),
('TP043234', 'Jacks', '25d55ad283aa400af464c76d713c07ad', 'Student', 'male', '123123123123', '01111982216', 'hongchin42@gmail.com', 'qwe', '0.00', 'default.jpg'),
('TP123534', 'Jacks', '25d55ad283aa400af464c76d713c07ad', 'Student', 'male', '123123123123', '01111982216', 'hongchin42@gmail.com', 'qweqwe', '0.00', 'default.jpg'),
('TP044245', 'Lord of Bones', '25d55ad283aa400af464c76d713c07ad', 'Student', 'male', '123123123123', '01111982216', 'hongchin42@gmail.com', 'qweqwe', '0.00', 'default.jpg'),
('TP044246', 'Petyr Baelish', '25d55ad283aa400af464c76d713c07ad', 'Student', 'male', '123123123123', '01111982216', 'hongchin42@gmail.com', 'qweqwe', '0.00', 'default.jpg'),
('TP044247', 'Polliver', '25d55ad283aa400af464c76d713c07ad', 'Student', 'male', '123123123123', '01111982216', 'hongchin42@gmail.com', 'qweqwe', '0.00', 'images/default.jpg'),
('TP123123', 'Harald Karstark', '25d55ad283aa400af464c76d713c07ad', 'Student', 'male', '123123123123', '01111982216', 'hongchin42@gmail.com', 'qweqwe', '0.00', 'images/default.jpg'),
('TP518556', 'Wyman Manderly', '25d55ad283aa400af464c76d713c07ad', 'Student', 'male', '123123123123', '01111982216', 'hongchin42@gmail.com', 'qweqwe', '0.00', 'images/default.jpg'),
('TP134677', 'Razdal mo Eraz', '25d55ad283aa400af464c76d713c07ad', 'Student', 'male', '123123123123', '01111982216', 'hongchin42@gmail.com', 'qweqwe', '0.00', 'default.jpg'),
('LC852147', 'Dickon', '25d55ad283aa400af464c76d713c07ad', 'Lecturer', 'male', '123123123123', '01111982216', 'hongchin42@gmail.com', 'qweqwe', '0.00', 'default.jpg'),
('ST456789', 'Euron', '25d55ad283aa400af464c76d713c07ad', 'Staff', 'male', '123123123123', '01111982216', 'hongchin42@gmail.com', 'qweqwe', '0.00', 'default.jpg'),
('LC044766', 'Rickard', '25d55ad283aa400af464c76d713c07ad', 'Lecturer', 'male', '123123123123', '01111982216', 'hongchin42@gmail.com', 'qweqwe', '10', 'jonny depp.jpg'),
('TP461543', 'wong', '25d55ad283aa400af464c76d713c07ad', 'Student', 'male', '324322234432', '3123131433', 'vfxv42@gmail.com', 'qwe', '0.00', 'default.jpg'),
('TP123125', 'Melara', '25d55ad283aa400af464c76d713c07ad', 'Student', '', '123123123123', '0111198221', 'sfsf2@gmail.com', 'qweqwe', '0.00', 'default.jpg'),
('TP938282', 'Yoren', '25d55ad283aa400af464c76d713c07ad', 'Student', 'male', '123245643434', '01111982215', 'hongchifwn42@gmail.com', 'qwe', '993.01', 'starbucks_logo_desktop20Jan2015183643.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `favourite_order`
--

CREATE TABLE `favourite_order` (
  `Favourite_ID` int(11) NOT NULL,
  `Order_ID` int(11) NOT NULL,
  `Customer_ID` varchar(255) NOT NULL,
  `Favourite_Timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `favourite_order`
--

INSERT INTO `favourite_order` (`Favourite_ID`, `Order_ID`, `Customer_ID`, `Favourite_Timestamp`) VALUES
(70032, 40101, 'TP044766', '2019-03-28 00:37:56'),
(70033, 40113, 'TP044766', '2019-03-30 12:28:33'),
(70034, 40112, 'TP044766', '2019-03-30 12:28:34'),
(70035, 40106, 'TP044766', '2019-03-30 12:28:36');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `Food_ID` varchar(255) NOT NULL,
  `Stall_ID` int(11) NOT NULL,
  `Food_Name` varchar(255) NOT NULL,
  `Food_Category` varchar(255) NOT NULL,
  `Unit_Price` varchar(255) NOT NULL,
  `Food_Description` varchar(255) NOT NULL,
  `Food_File` varchar(255) NOT NULL,
  `Food_Status` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`Food_ID`, `Stall_ID`, `Food_Name`, `Food_Category`, `Unit_Price`, `Food_Description`, `Food_File`, `Food_Status`) VALUES
('F002', 10002, 'nasi lemak', 'malay', '8.00', 'nasi lemak set ', 'malay1.jpg', 'available'),
('F001', 10001, 'chicken chop', 'western', '4.50', 'delicious chicken chop with some friedn and salad', 'western1.jpg', 'available'),
('F003', 10003, 'dry noodle', 'chinese', '6.00', 'delicios chinese style dry noodle', 'chinese1.jpg', 'unavailable'),
('F004', 10008, 'teh ice', 'beverage', '5.89', 'local authentic teh ice', 'beverage1.jpg', 'available'),
('F005', 10004, 'indian food set', 'indian', '13.90', 'delicious indian style nasi set', 'indian1.jpg', 'available'),
('F006', 10008, 'croissant', 'bakery', '14.99', 'France import croissant', 'bakery1.jpg', 'available'),
('F007', 10005, 'arab style food bowl', 'arab', '25.88', 'arab style bowl with a kebab', 'arab1.jpg', 'available'),
('F008', 10007, 'Strawberry cheese cake', 'dessert', '45.22', 'homemade strawberry cheese cake', 'dessert1.jpg', 'available'),
('F009', 10003, 'chinese style mee goreng ', 'chinese', '13.41', 'chinese stule mee goreng ', 'chinese1.jpg', 'available'),
('F011', 10003, 'Mix rice 2 meat 1 egg 1 vege', 'chinese', '8.50', 'Mix rice with prawn, chicken, egg and vege', 'chinese2.jpg', 'available'),
('F010', 10003, 'Chinese style fried rice', 'chinese ', '5.50', 'Delicious chinese style with prawn fried rice', 'chinese3.jpg', 'available'),
('F012', 10003, 'spicy chiken ball', 'chinese', '2.00', 'super spicy chiquan chicken ball', 'chinese4.jpg', 'available'),
('F013', 10003, 'Pork fried rice', 'chinese', '7.50', 'Pork fried rice with vege at top ', 'chinese6.jpg', 'available'),
('F014', 10003, 'Prawn noodle', 'chinese', '6.99', 'Delicious penang curry prawn noodles', 'chinese9.jpg', 'available'),
('F015', 10003, 'Popia with chicken ', 'chinese', '4.88', 'Delicious popia with chicken inside', 'chinese10.jpg', 'available'),
('F019', 10002, 'Mani goreng', 'malay', '5.60', 'delicious homemade mami goreng', 'malay2.jpg', 'available'),
('F016', 10002, 'Nasi Lemak ', 'malay', '8.60', 'Tradition nasi lemak with sambal', 'malay3.jpeg', 'unavailable'),
('F017', 10002, 'Nasi Berani with chicken', 'malay', '9.00', 'Nasi berani with curry chicken ', 'malay4.jpg', 'unavailable'),
('F018', 10002, 'malay mix rice ', 'malay', '9.80', 'different malay crusine mix rice', 'malay5.jpg', 'available'),
('F022', 10002, 'satay', 'malay', '5.60', 'delicious homemade satay', 'malay6.jpg', 'available'),
('F025', 10002, 'Green kuih with coconut', 'malay', '5.60', 'delicious homemade kuih', 'malay7.jpg', 'available'),
('F031', 10002, 'Mani goreng', 'malay', '5.60', 'delicious homemade mami goreng', 'malay2.jpg', 'available'),
('F223', 10001, 'Salmon', 'western', '11.00', 'delicious salmon', 'western2.jpg', 'unavailable'),
('F390', 10001, 'western naan', 'western', '4.00', 'delicious western naan with green inside', 'western3.jpg', 'unavailable'),
('F756', 10001, 'pork rib', 'western', '15.70', 'delivious smokey rib', 'western4.jpg', 'unavailable'),
('F420', 10001, 'bologies spagetti', 'western', '8.00', 'deliciosu homemade noodlw with cheese', 'western6.jpeg', 'unavailable'),
('F483', 10001, 'prawn spagetti', 'western', '14.90', 'prawn spagetti with garlic bread', 'western7.jpg', 'unavailable'),
('F959', 10004, 'curry tofu', 'indian', '5.60', 'delicious curry tofu bowl', 'indian2.jpg', 'available'),
('F969', 10004, 'curry chicken with naan', 'indian', '7.80', 'curry chicken with naan', 'indian3.jpg', 'available'),
('F563', 10004, 'indian donut', 'indian', '8.90', 'indian donut with some coconut sugar', 'indian4.jpg', 'available'),
('F407', 10004, 'indian curry puff', 'indian', '4.90', 'homemade indian curry puff', 'indian5.jpg', 'unavailable'),
('F798', 10004, 'roti tisu', 'indian', '3.90', 'roti tisu', 'indian6.jpg', 'unavailable'),
('F263', 10004, 'green curry chicken', 'indian', '7.90', 'green curry chicken', 'indian7.jpeg', 'available'),
('F772', 10005, 'arab style curry bowl', 'arab', '8.90', 'arab style curry bowl with some delicios bean', 'arab2.jpg', 'available'),
('F561', 10005, 'arab satay', 'arab', '7.90', 'smokey arab satay ', 'arab3.jpg', 'unavailable'),
('F402', 10005, 'arab naan and some side dish', 'arab', '4.90', 'arab naan and some side dish', 'arab4.jpg', 'available'),
('F233', 10005, 'arab meat ball', 'arab', '7.70', 'hoemade arab meat ball', 'arab5.jpg', 'available'),
('F848', 10005, 'arab style pizza', 'arab', '15.90', 'arab style pizza', 'arab6.jpg', 'unavailable'),
('F372', 10005, 'arab style luxury meat plate', 'arab', '18.90', 'arab style luxury meat plate', 'arab7.jpg', 'available'),
('F671', 10006, 'bread stick', 'bakery', '3.90', 'bread stick', 'bakery2.jpg', 'available'),
('F723', 10006, 'bun', 'bakery', '2.00', 'homemade bun', 'bakery3.jpg', 'unavailable'),
('F315', 10006, 'hotdog bun', 'bakery', '2.90', 'hotdog bun', 'bakery4.jpg', 'available'),
('F900', 10006, 'kaya filling bun ', 'bakery', '4.89', 'kaya filling bun ', 'bakery5.jpg', 'available'),
('F351', 10006, 'chocalate bun', 'bakery', '4.90', 'chocalate bun', 'bakery6.jpeg', 'unavailable'),
('F952', 10006, 'roti boy', 'bakery', '4.89', 'roti boy', 'bakery7.jpg', 'available'),
('F259', 10003, 'starbuck', 'chinese ', '15.00', 'starbuck', 'starbucks_logo_desktop20Jan2015183643.jpg', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_ID` int(11) NOT NULL,
  `Food_ID` varchar(255) NOT NULL,
  `Customer_ID` varchar(255) NOT NULL,
  `Total_Item` int(11) NOT NULL,
  `Order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `Order_Get_Time` varchar(255) DEFAULT NULL,
  `Order_Estimated_Time` datetime DEFAULT NULL,
  `Order_Prepare_Time` datetime DEFAULT NULL,
  `Order_Tracking_Number` varchar(255) NOT NULL,
  `Order_Total_Price` varchar(255) NOT NULL,
  `Order_Remark` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_ID`, `Food_ID`, `Customer_ID`, `Total_Item`, `Order_date`, `Order_Get_Time`, `Order_Estimated_Time`, `Order_Prepare_Time`, `Order_Tracking_Number`, `Order_Total_Price`, `Order_Remark`) VALUES
(40050, 'F012F012F010F010F003F003F003', 'TP044766', 7, '2019-03-19 14:00:47', '45 minutes', '2019-03-19 14:45:46', '2019-03-19 14:30:46', 'T-894498-82516', '26', ''),
(40049, 'F012F012F012F012F012F012', 'TP044766', 6, '2019-03-19 07:28:13', '45 minutes', '2019-03-19 08:13:12', '2019-03-19 07:58:12', 'T-395087-87029', '12', ''),
(40047, 'F002F002F002F002F002F002', 'TP044766', 6, '2019-03-17 23:50:53', '45 minutes', '2019-03-18 00:35:52', '2019-03-18 00:20:52', 'T-305235-69802', '48', ''),
(40007, 'F012F007F007F007F007F007', 'TP044766', 6, '2019-03-15 21:23:53', '1 hour 15 minutes', '2019-03-15 22:22:13', '2019-03-15 22:07:13', 'T-919181-40644', '131.4', ''),
(40008, 'F007F007F007F007F007', 'TP044766', 5, '2019-03-15 21:24:15', '1 hour 15 minutes', '2019-03-15 22:22:13', '2019-03-15 22:07:13', 'T-919181-40644', '129.4', 'this is order get time testing'),
(40009, 'F012F012F012F012F012', 'TP044766', 5, '2019-03-15 21:42:55', '1 hour', '2019-03-15 22:42:51', '2019-03-15 22:27:51', 'T-288286-96978', '10', ''),
(40010, 'F012F012F012F010F010F010', 'TP044766', 6, '2019-03-15 21:45:11', '1 hour 15 minutes', '2019-03-15 23:00:09', '2019-03-15 22:45:09', 'T-47433-51865', '12', ''),
(40011, 'F012F012F012F012F012F012', 'TP044766', 6, '2019-03-15 21:51:28', '1 hour 15 minutes', '2019-03-15 23:06:25', '2019-03-15 22:51:25', 'T-191365-42910', '12', ''),
(40012, 'F012F012F012F012F012F012F012', 'TP044766', 7, '2019-03-15 21:52:23', '1 hour', '2019-03-15 22:52:19', '2019-03-15 22:37:19', 'T-441644-5145', '14', ''),
(40014, 'F012F010F010F010F010F010F010F010F010F010F010F010F010F010F010F010F010F010F010F010F010F010F010', 'TP044766', 23, '2019-03-15 22:22:47', '1 hour 15 minutes', '2019-03-15 23:37:38', '2019-03-15 23:22:38', 'T-592585-10716', '46', ''),
(40016, 'F012F012F012F012F012', 'TP044766', 5, '2019-03-15 22:51:53', '1 hour', '2019-03-15 23:51:47', '2019-03-15 23:36:47', 'T-334118-44315', '10', ''),
(40064, 'F002F002F002F002', 'TP044766', 4, '2019-03-23 14:20:03', '45 minutes', '2019-03-23 15:05:02', '2019-03-23 14:50:02', 'T-260068-70929', '32', ''),
(40078, 'F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012', 'TP044766', 56, '2019-03-24 19:20:34', '1 hour 45 minutes', '2019-03-24 21:05:33', '2019-03-24 20:50:33', 'T-386597-70289', '112', ''),
(40073, 'F007', 'TP044766', 1, '2019-03-24 15:28:44', '45 minutes', '2019-03-24 16:13:39', '2019-03-24 15:58:39', 'T-897640-54889', '25.88', ''),
(40069, 'F006', 'TP044766', 1, '2019-03-23 14:55:41', '30 minutes', '2019-03-23 15:25:40', '2019-03-23 15:10:40', 'T-421432-15317', '14.99', ''),
(40070, 'F007', 'TP044766', 1, '2019-03-23 16:14:31', '30 minutes', '2019-03-23 16:44:29', '2019-03-23 16:29:29', 'T-916885-83679', '25.88', ''),
(40045, 'F012F012F012F012F012F012', 'TP044766', 6, '2019-03-17 22:30:41', '30 minutes', '2019-03-17 23:00:39', '2019-03-17 22:45:39', 'T-840690-60615', '12', ''),
(40057, 'F012F010F010F010F010F010F010F010F010F010', 'TP044766', 10, '2019-03-20 00:05:58', '1 hour', '2019-03-20 01:05:53', '2019-03-20 00:50:53', 'T-138553-42705', '20', ''),
(40044, 'F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012F012', 'TP044766', 50, '2019-03-17 22:30:16', '2 hours', '2019-03-18 00:30:15', '2019-03-18 00:15:15', 'T-184053-15810', '100', ''),
(40091, 'F015', 'TP044766', 1, '2019-03-25 21:03:18', '30 minutes', '2019-03-25 21:33:16', '2019-03-25 21:18:16', 'T-217740-31855', '4.88', ''),
(40093, 'F013', 'TP044766', 1, '2019-03-25 22:19:51', '30 minutes', '2019-03-25 22:49:49', '2019-03-25 22:34:49', 'T-304812-12598', '7.5', ''),
(40096, 'F015F002', 'TP044766', 2, '2019-03-25 22:59:18', '30 minutes', '2019-03-25 23:29:13', '2019-03-25 23:14:13', 'T-55741-1661', '12.88', ''),
(40097, 'F022F022', 'TP044766', 2, '2019-03-26 21:00:31', '30 minutes', '2019-03-26 21:30:30', '2019-03-26 21:15:30', 'T-412308-11770', '11.2', ''),
(40099, 'F014', 'TP044766', 1, '2019-03-27 00:08:33', '30 minutes', '2019-03-27 00:38:32', '2019-03-27 00:23:32', 'T-127133-82192', '6.99', ''),
(40102, 'F014F005F004F007F007F007F006', 'TP044766', 7, '2019-03-28 21:14:07', '30 minutes', '2019-03-28 21:44:05', '2019-03-28 21:29:05', 'T-193933-50793', '119.41', ''),
(40101, 'F005F004F007F007F007', 'TP044766', 5, '2019-03-27 00:44:02', '30 minutes', '2019-03-27 01:13:59', '2019-03-27 00:58:59', 'T-212785-83035', '97.43', ''),
(40103, 'F015F014F013F012F010F013F007F006F001F002F008F004F025', 'TP044766', 13, '2019-03-28 22:50:00', '30 minutes', '2019-03-28 23:19:58', '2019-03-28 23:04:58', 'T-414241-32846', '144.45', ''),
(40104, 'F015F015F015F015F014F013F012F003F003F005F005F006F006F007F007', 'TP044766', 15, '2019-03-29 00:01:49', '30 minutes', '2019-03-29 00:31:48', '2019-03-29 00:16:48', 'T-414423-99791', '157.55', ''),
(40106, 'F005F007F006', 'TP044766', 3, '2019-03-30 00:46:34', '30 minutes', '2019-03-31 01:16:32', '2019-03-30 00:00:00', 'T-37281-64965', '54.77', ''),
(40111, 'F015', 'TP044766', 1, '2019-03-30 01:15:44', '30 minutes', '2019-03-31 01:45:43', '2019-03-30 00:00:00', 'T-215716-26807', '4.88', ''),
(40112, 'F015', 'TP044766', 1, '2019-03-30 01:17:31', '30 minutes', '2019-03-31 01:47:30', '2019-03-30 00:00:00', 'T-249614-71455', '4.88', ''),
(40113, 'F014', 'TP044766', 1, '2019-03-30 01:17:44', '30 minutes', '2019-03-31 01:47:43', '2019-03-30 00:00:00', 'T-81512-64458', '6.99', ''),
(40115, 'F003F007F003', 'TP044766', 2, '2019-03-30 19:48:27', '30 minutes', '2019-03-31 20:18:25', '2019-03-30 00:00:00', 'T-802199-3036', '31.88', ''),
(40116, 'F002F006F007', 'TP044766', 3, '2019-03-30 19:48:39', '45 minutes', '2019-03-31 20:33:37', '2019-03-30 00:00:00', 'T-344118-24928', '48.87', ''),
(40117, 'F008F019F018F018F022F022', 'TP044766', 6, '2019-03-30 19:48:54', '1 hour', '2019-03-31 20:48:53', '2019-03-31 20:33:53', 'T-972234-31109', '81.62', ''),
(40119, 'F015F015F015', 'TP044766', 3, '2019-03-31 21:26:20', '2 hours', '2019-03-31 23:26:18', '2019-03-31 23:11:18', 'T-557116-78881', '14.64', ''),
(40120, 'F015F015F015', 'TP044766', 3, '2019-03-31 21:30:16', '30 minutes', '2019-03-31 22:00:15', '2019-03-31 21:45:15', 'T-571799-56397', '14.64', ''),
(40121, 'F015F015F015F015F015', 'TP044766', 5, '2019-03-31 22:05:54', '30 minutes', '2019-03-31 22:35:52', '2019-03-31 22:20:52', 'T-565455-89335', '24.4', ''),
(40122, 'F015F015F015F014', 'TP044766', 4, '2019-04-01 08:45:45', '30 minutes', '2019-04-01 09:15:43', '2019-04-01 09:00:43', 'T-190639-72132', '21.63', ''),
(40123, 'F015F014', 'TP044766', 2, '2019-04-01 12:02:34', '30 minutes', '2019-04-01 12:32:32', '2019-04-01 12:17:32', 'T-336777-36170', '11.87', ''),
(40124, 'F015F002F005', 'TP044766', 3, '2019-04-01 12:03:08', '30 minutes', '2019-04-01 12:33:06', '2019-04-01 12:04:06', 'T-696486-18653', '26.78', ''),
(40125, 'F015F005F002', 'TP044766', 3, '2019-04-01 12:32:14', '30 minutes', '2019-04-01 13:02:12', '2019-04-01 12:33:12', 'T-835402-38563', '26.78', ''),
(40126, 'F015F002F005F019F019', 'TP044766', 5, '2019-04-01 15:39:45', '30 minutes', '2019-04-01 16:09:42', '2019-04-01 15:41:42', 'T-261941-69690', '37.98', ''),
(40127, 'F015F002F005', 'TP044766', 3, '2019-04-01 16:29:43', '30 minutes', '2019-04-01 16:59:41', '2019-04-01 16:31:41', 'T-211033-29904', '26.78', ''),
(40128, 'F015F002F005', 'TP044766', 3, '2019-04-01 16:29:57', '30 minutes', '2019-04-01 16:59:55', '2019-04-01 16:31:55', 'T-690927-44684', '26.78', ''),
(40129, 'F015F005', 'TP044766', 2, '2019-04-01 16:30:53', '30 minutes', '2019-04-01 17:00:52', '2019-04-01 16:31:52', 'T-904347-56841', '18.78', ''),
(40130, 'F015F002F005', 'TP044766', 3, '2019-04-02 00:59:54', '30 minutes', '2019-04-02 01:29:52', '2019-04-02 01:00:52', 'T-923109-6111', '26.78', ''),
(40131, 'F015F005', 'TP044766', 2, '2019-04-02 01:00:09', '30 minutes', '2019-04-02 01:30:08', '2019-04-07 01:00:08', 'T-180156-12000', '18.78', ''),
(40132, 'F015F001', 'TP044766', 2, '2019-04-02 01:07:13', '30 minutes', '2019-04-02 01:37:10', '2019-04-07 01:00:10', 'T-711985-49919', '9.38', ''),
(40133, 'F019', 'TP044766', 1, '2019-04-02 01:07:42', '30 minutes', '2019-04-02 01:37:41', '2019-04-07 01:00:41', 'T-753436-12927', '5.6', ''),
(40134, 'F015F014F002', 'TP044766', 3, '2019-04-02 03:15:30', '30 minutes', '2019-04-02 03:45:28', '2019-04-07 01:16:28', 'T-363273-69745', '19.87', ''),
(40135, 'F015F002F005', 'TP044766', 3, '2019-04-05 01:52:16', '30 minutes', '2019-04-05 02:22:12', '2019-04-07 01:55:00', 'T-532734-34327', '26.78', ''),
(40136, 'F015F002F005', 'TP044766', 3, '2019-04-06 13:40:59', '30 minutes', '2019-04-06 14:10:57', '2019-04-07 01:42:00', 'T-432369-94311', '26.78', ''),
(40137, 'F015F014F013', 'TP044766', 3, '2019-04-06 15:16:02', '30 minutes', '2019-04-06 15:46:01', '2019-04-07 01:16:01', 'T-581769-75352', '19.37', 'qweqweqweqweqweqweqweqweqweqweqweqweqweqweqqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqwe'),
(40139, 'F014', 'TP938282', 1, '2019-04-08 15:43:20', '30 minutes', '2019-04-08 16:13:19', '2019-04-08 15:58:19', 'T-655941-93368', '6.99', ''),
(40140, 'F015F014F015', 'TP044766', 3, '2019-04-08 15:45:51', '30 minutes', '2019-04-08 16:15:50', '2019-04-08 15:48:00', 'T-974228-74500', '16.75', ''),
(40141, 'F015F671', 'TP044766', 2, '2023-07-02 03:02:40', '45 minutes', '2023-07-02 03:47:39', '2023-07-02 03:32:39', 'T-541595-43378', '8.78', '');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `Post_ID` int(11) NOT NULL,
  `Post_Title` varchar(255) NOT NULL,
  `Post_Description` varchar(255) NOT NULL,
  `Post_Timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `Post_File` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`Post_ID`, `Post_Title`, `Post_Description`, `Post_Timestamp`, `Post_File`) VALUES
(80004, 'qweqwe', 'qweqweqwe', '2019-04-08 13:46:27', 'starbucks_logo_desktop20Jan2015183643.jpg'),
(80005, 'FOOD dISCOUNT', 'FOOD SICOUNT ', '2019-03-24 23:09:13', 'discount1.jpg'),
(80006, 'FOOD dISCOUNT', 'FOOD SICOUNT ', '2019-03-24 23:09:13', 'discount2.jpeg'),
(80012, 'new post', 'uju', '2019-04-08 15:35:23', 'CaffeBeneLogo_Mobile01Oct2017112949.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `Sales_ID` int(11) NOT NULL,
  `Stall_ID` int(11) NOT NULL,
  `Order_ID` int(11) NOT NULL,
  `Food_ID` varchar(255) NOT NULL,
  `Sales_Date` datetime NOT NULL DEFAULT current_timestamp(),
  `Profit` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`Sales_ID`, `Stall_ID`, `Order_ID`, `Food_ID`, `Sales_Date`, `Profit`) VALUES
(60001, 10003, 40111, 'F015', '2019-03-31 20:43:08', '4.88'),
(60002, 10003, 40112, 'F015', '2019-03-31 20:48:25', '4.88'),
(60016, 10003, 40140, 'F015F014F015', '2019-04-08 15:49:34', '16.75');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Staff_ID` int(11) NOT NULL,
  `Staff_Username` varchar(255) NOT NULL,
  `Staff_Password` varchar(255) NOT NULL,
  `Staff_Role` varchar(255) NOT NULL,
  `Staff_I/C_No` varchar(255) NOT NULL,
  `Staff_Contact` varchar(255) NOT NULL,
  `Staff_Email` varchar(255) NOT NULL,
  `Staff_Gender` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Staff_ID`, `Staff_Username`, `Staff_Password`, `Staff_Role`, `Staff_I/C_No`, `Staff_Contact`, `Staff_Email`, `Staff_Gender`) VALUES
(30001, 'admin1', '25d55ad283aa400af464c76d713c07ad', 'System Admin', '892083029911', '019-9330293', 'ali_maju@gmail.com', 'female'),
(30002, 'admin2', '25d55ad283aa400af464c76d713c07ad', 'Finance Department', '839028728177', '019-9290938', 'eninem@gmail.com', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `stall`
--

CREATE TABLE `stall` (
  `Stall_ID` int(11) NOT NULL,
  `Stall_Username` varchar(255) NOT NULL,
  `Stall_Password` varchar(255) NOT NULL,
  `Stall_Owner` varchar(255) NOT NULL,
  `Stall_Name` varchar(255) NOT NULL,
  `Stall_Category` varchar(255) NOT NULL,
  `Stall_Description` varchar(255) NOT NULL,
  `Stall_Contact` varchar(255) NOT NULL,
  `Stall_Email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `stall`
--

INSERT INTO `stall` (`Stall_ID`, `Stall_Username`, `Stall_Password`, `Stall_Owner`, `Stall_Name`, `Stall_Category`, `Stall_Description`, `Stall_Contact`, `Stall_Email`) VALUES
(10001, 'western', '25d55ad283aa400af464c76d713c07ad', 'David Bakem', 'Pita ', 'western', 'maily selling western food.Want other food? go other side!', '0293000000', 'pita_pan@gmail.com'),
(10002, 'malay', '25d55ad283aa400af464c76d713c07ad', 'sarah siti ', 'sarah\'s malay stall', 'malay', 'mainly selling malay food ', '029-9992029', 'sarah_malay@gmai.com'),
(10003, 'chinese', '25d55ad283aa400af464c76d713c07ad', 'meng chia hua', 'Ah Meng\'s Mix rice ', 'chinese ', 'mainly selling chinese mix rice', '029-87665272', 'ahmeng@gmail.com'),
(10004, 'indian', '25d55ad283aa400af464c76d713c07ad', 'Jacob Arjun', 'Arjun Indian Crusine', 'indian', 'maily produce indian food ', '0199993029', 'jacod@gmail.com\r\n'),
(10005, 'arab', '25d55ad283aa400af464c76d713c07ad', 'Asab ', 'Asab Arab crusine ', 'arab', 'produce deliciosu arab crusine ', '0194889487', 'asab@gmail.com'),
(10006, 'bakery', '25d55ad283aa400af464c76d713c07ad', 'Victoria secret', 'Victoria Bakery', 'bakery', 'produce fresh bread daily', '0298765267', 'victoria@gmail.com'),
(10007, 'dessert', '25d55ad283aa400af464c76d713c07ad', 'john snow', 'john snow dessert house', 'dessert', 'maily making delicious dessert', '0980997652', 'john_snow@gmail.com'),
(10008, 'beverage', '25d55ad283aa400af464c76d713c07ad', 'Arnold giam', 'Arnold beverage ', 'beverage', 'delicious beverage', '0197766544', 'arnold@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `credit_transaction`
--
ALTER TABLE `credit_transaction`
  ADD PRIMARY KEY (`CreditT_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexes for table `favourite_order`
--
ALTER TABLE `favourite_order`
  ADD PRIMARY KEY (`Favourite_ID`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`Food_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_ID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`Post_ID`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`Sales_ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Staff_ID`);

--
-- Indexes for table `stall`
--
ALTER TABLE `stall`
  ADD PRIMARY KEY (`Stall_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `credit_transaction`
--
ALTER TABLE `credit_transaction`
  MODIFY `CreditT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90015;

--
-- AUTO_INCREMENT for table `favourite_order`
--
ALTER TABLE `favourite_order`
  MODIFY `Favourite_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70037;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40142;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `Post_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80013;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `Sales_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60017;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `Staff_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30003;

--
-- AUTO_INCREMENT for table `stall`
--
ALTER TABLE `stall`
  MODIFY `Stall_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10009;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
