-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 06, 2022 at 12:02 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e_med`
--
CREATE DATABASE IF NOT EXISTS `e_med` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `e_med`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_detail`
--

CREATE TABLE IF NOT EXISTS `admin_detail` (
  `admin_id` int(10) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_detail`
--

INSERT INTO `admin_detail` (`admin_id`, `email_id`, `pwd`) VALUES
(1, 'admin@emed.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE IF NOT EXISTS `bill_detail` (
  `bill_id` int(10) NOT NULL,
  `bill_date` date NOT NULL,
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `cart_id` int(10) NOT NULL,
  `total_amt` int(10) NOT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`bill_id`, `bill_date`, `order_id`, `customer_id`, `cart_id`, `total_amt`) VALUES
(1, '2022-04-03', 1, 1, 2, 85),
(2, '2022-04-06', 2, 1, 3, 131);

-- --------------------------------------------------------

--
-- Table structure for table `cart_detail`
--

CREATE TABLE IF NOT EXISTS `cart_detail` (
  `cart_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_detail`
--

INSERT INTO `cart_detail` (`cart_id`, `product_id`, `qty`, `price`) VALUES
(1, 1, 1, 30),
(1, 2, 2, 85),
(2, 2, 1, 85),
(3, 2, 1, 85),
(3, 3, 2, 23),
(4, 2, 3, 85);

-- --------------------------------------------------------

--
-- Table structure for table `cart_master`
--

CREATE TABLE IF NOT EXISTS `cart_master` (
  `cart_id` int(10) NOT NULL,
  `cart_date` date NOT NULL,
  `customer_id` int(10) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_master`
--

INSERT INTO `cart_master` (`cart_id`, `cart_date`, `customer_id`) VALUES
(1, '2022-04-02', 1),
(2, '2022-04-03', 1),
(3, '2022-04-06', 1),
(4, '2022-04-06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_detail`
--

CREATE TABLE IF NOT EXISTS `customer_detail` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_detail`
--

INSERT INTO `customer_detail` (`customer_id`, `customer_name`, `address`, `city`, `mobile_no`, `gender`, `email_id`, `pwd`) VALUES
(1, 'Palak', 'Valsad', 'valsad', '8596741230', 'FEMALE', 'palak@yahoo.com', '111111');

-- --------------------------------------------------------

--
-- Table structure for table `delievery_boy_detail`
--

CREATE TABLE IF NOT EXISTS `delievery_boy_detail` (
  `del_id` int(10) NOT NULL,
  `del_name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `dis_id` int(10) NOT NULL,
  PRIMARY KEY (`del_id`),
  KEY `dis_id` (`dis_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delievery_boy_detail`
--

INSERT INTO `delievery_boy_detail` (`del_id`, `del_name`, `address`, `city`, `mobile_no`, `email_id`, `gender`, `dis_id`) VALUES
(1, 'Ramesh', 'valsad', 'valsad', '9876543210', 'ramesh@yahoo.com', 'MALE', 1),
(2, 'Krishna', 'valsad', 'valsad', '8596321470', 'krishna@yahoo.com', 'FEMALE', 1),
(3, 'Kirit', 'Vapi', 'vapi', '8574123690', 'kirit@yahoo.com', 'MALE', 2),
(4, 'jeena', 'vapi', 'vapi', '9874125630', 'jeena@yahoo.com', 'FEMALE', 2);

-- --------------------------------------------------------

--
-- Table structure for table `distributor_regis`
--

CREATE TABLE IF NOT EXISTS `distributor_regis` (
  `dis_id` int(10) NOT NULL,
  `dis_name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  `pharmacy_name` varchar(50) NOT NULL,
  `lic_img` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`dis_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distributor_regis`
--

INSERT INTO `distributor_regis` (`dis_id`, `dis_name`, `address`, `city`, `mobile_no`, `email_id`, `pwd`, `pharmacy_name`, `lic_img`, `status`) VALUES
(1, 'Chintan', 'avabai road', 'valsad', '9876543210', 'chintan@yahoo.com', '111111', 'gayatri medical', 'lic_img/LI1.png', 1),
(2, 'vivek', 'chanod', 'vapi', '8596321470', 'vivek@yahoo.com', '111111', 'a to z pharmacy', 'lic_img/LI2.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

CREATE TABLE IF NOT EXISTS `order_master` (
  `order_id` int(10) NOT NULL,
  `order_date` date NOT NULL,
  `cart_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `del_address` varchar(100) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `total_amount` int(10) NOT NULL,
  `payment_type` varchar(7) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_master`
--

INSERT INTO `order_master` (`order_id`, `order_date`, `cart_id`, `customer_id`, `del_address`, `mobile_no`, `total_amount`, `payment_type`) VALUES
(1, '2022-04-03', 2, 1, 'Ramji Tekra Valsad', '9876543210', 85, 'ONLINE'),
(2, '2022-04-06', 3, 1, 'tithal road\r\nvalsad', '9876543210', 131, 'COD'),
(3, '2022-04-06', 4, 1, 'tithal road\r\nvalsad', '8596321470', 255, 'ONLINE');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `pay_id` int(10) NOT NULL,
  `pay_date` date NOT NULL,
  `card_type` varchar(15) NOT NULL,
  `card_no` varchar(16) NOT NULL,
  `cvv_no` varchar(3) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `card_holder_name` varchar(50) NOT NULL,
  `expiry_date` varchar(15) NOT NULL,
  `amount` int(10) NOT NULL,
  PRIMARY KEY (`pay_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `pay_date`, `card_type`, `card_no`, `cvv_no`, `bank_name`, `card_holder_name`, `expiry_date`, `amount`) VALUES
(1, '2022-04-03', 'DEBIT CARD', '1234567890123456', '230', 'bank of baroda', 'palak desai', 'Feb-2025', 85),
(2, '2022-04-03', 'DEBIT CARD', '1234567890123456', '111', 'SBI', 'PALAK DESAI', 'May-2025', 80),
(3, '2022-04-06', 'CREDIT CARD', '8596321470123456', '123', 'bank of baroda', 'palak desai', 'April-2025', 255),
(4, '2022-04-06', 'DEBIT CARD', '1234567890123456', '123', 'sbi', 'palak desai', 'May-2026', 100);

-- --------------------------------------------------------

--
-- Table structure for table `prescription_detail`
--

CREATE TABLE IF NOT EXISTS `prescription_detail` (
  `prescription_id` int(10) NOT NULL,
  `upload_date` date NOT NULL,
  `customer_id` int(10) NOT NULL,
  `del_address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `del_mobile_no` varchar(10) NOT NULL,
  `prescription_path` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`prescription_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription_detail`
--

INSERT INTO `prescription_detail` (`prescription_id`, `upload_date`, `customer_id`, `del_address`, `city`, `del_mobile_no`, `prescription_path`, `status`) VALUES
(1, '2022-03-26', 1, 'Ramji Tekra valsad', 'valsad', '8596471230', 'pres_img/PI1.png', 4),
(2, '2022-04-06', 1, 'tithal road', 'valsad', '8596321470', 'pres_img/PI2.png', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pres_bill_detail`
--

CREATE TABLE IF NOT EXISTS `pres_bill_detail` (
  `pres_bill_id` int(10) NOT NULL,
  `medicine_name` varchar(50) NOT NULL,
  `qty` int(10) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pres_bill_detail`
--

INSERT INTO `pres_bill_detail` (`pres_bill_id`, `medicine_name`, `qty`, `price`) VALUES
(1, 'Zerodol p', 10, 5),
(1, 'Dolo', 10, 3),
(2, 'Zerodol p', 50, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pres_bill_master`
--

CREATE TABLE IF NOT EXISTS `pres_bill_master` (
  `pres_bill_id` int(10) NOT NULL,
  `bill_date` date NOT NULL,
  `prescription_id` int(10) NOT NULL,
  `dis_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `total_amount` int(10) NOT NULL,
  `del_id` int(10) NOT NULL,
  PRIMARY KEY (`pres_bill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pres_bill_master`
--

INSERT INTO `pres_bill_master` (`pres_bill_id`, `bill_date`, `prescription_id`, `dis_id`, `customer_id`, `total_amount`, `del_id`) VALUES
(1, '2022-04-03', 1, 1, 1, 80, 1),
(2, '2022-04-06', 2, 1, 1, 100, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

CREATE TABLE IF NOT EXISTS `product_detail` (
  `product_id` int(10) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_img` varchar(50) NOT NULL,
  `dis_id` int(10) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`product_id`, `product_name`, `description`, `product_price`, `product_img`, `dis_id`) VALUES
(1, 'Aspirin', 'Aspirin is in a group of medications called salicylates It works by stopping the production substances that cause fever pain swelling and blood clots', 30, 'prod_img/PI1_1205.png', 1),
(2, 'Vicks', 'Vicks vaporub is intended for use on the chest back and throat for cough suppression or on muscles and joints for minor aches and pains', 85, 'prod_img/PI2_3610.png', 1),
(3, 'Sanitizer', ' Original Instant Hand Sanitizer kills 99.9% of germs without water This instant formula is enriched with soothing aloe vera is rinse free and non-sticky', 23, 'prod_img/PI3_7854.png', 1),
(4, 'Cofsils', 'is a combination drug containing two medicines Amylmetacresol and Benzyl alcohol primarily used to reduce pain and discomfort associated with sore throats and cough ', 30, 'prod_img/PI4_7447.png', 1),
(5, 'volini', 'Volini Gel is a pain relief gel which provides effective relief from muscle pain strains sprains spasms and cramps ', 30, 'prod_img/PI5_2608.png', 1),
(6, 'Digene Gel Acidity', 'Digene Gel Acidity & Gas Relief provides relief from acidity and gas whenever acidity strikes It is a sugar-free syrup that provides effective action against acidity', 120, 'prod_img/PI6_5767.png', 1),
(7, 'Saridon', '\r\nSaridon is an analgesic combination indicated for the management of headache It contains the analgesics propyphenazone and paracetamol and the stimulant caffeine', 30, 'prod_img/PI7_7691.png', 1),
(8, 'Dettol', 'Dettol Liquid Antiseptic Disinfectant is a proven effective concentrated antiseptic disinfectant that kills bacteria and provides protection against bacteria which can cause infection and illness', 279, 'prod_img/PI8_5882.png', 1),
(9, 'dolo', 'Dolo650 Tablet 15s belongs to the group of mild analgesics and antipyretic used to treat mild to moderate pain including headache migraine toothache menstrual period pain osteoarthritis pain musculosk', 25, 'prod_img/PI9_3106.png', 1),
(10, 'Cough syrup', 'Benadryl Syrup is a combination of three medicines Diphenhydramine Ammonium chloride and Sodium citrate which relieves cough', 73, 'prod_img/PI10_8211.png', 1),
(11, 'Diapers', 'Huggies ultra soft pants are our softest diaper pants The ultra soft range is the very best from Huggies and features cotton like softness to gently hug your baby Every ultra soft diaper pant is clini', 25, 'prod_img/PI11_1316.png', 1),
(12, 'Iodex', 'Iodex a trusted pain relief brand in India for close to 100 years helps provide effective relief from different types of musculo skeletal pains like neck shoulder pain back pain joint pain sprain etc', 80, 'prod_img/PI12_2655.png', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `delievery_boy_detail`
--
ALTER TABLE `delievery_boy_detail`
  ADD CONSTRAINT `fk_dis_id` FOREIGN KEY (`dis_id`) REFERENCES `distributor_regis` (`dis_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
