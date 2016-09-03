-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2016 at 06:14 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `healph`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `ACCT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(30) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL,
  `STATUS` varchar(30) NOT NULL DEFAULT 'ACTIVE',
  `TYPE` varchar(10) NOT NULL,
  PRIMARY KEY (`ACCT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`ACCT_ID`, `USERNAME`, `PASSWORD`, `STATUS`, `TYPE`) VALUES
(1, 'admin01', 'anjon', 'ACTIVE', 'Admin'),
(2, 'admin02', 'liam', 'ACTIVE', 'Admin'),
(3, 'admin03', 'gerald', 'ACTIVE', 'Admin'),
(4, 'mangkanor', 'mang12', 'ACTIVE', 'Healer'),
(5, 'bayron', 'pakers', 'INACTIVE', 'Healer'),
(6, 'nick01', 'nic01', 'ACTIVE', 'Client'),
(7, 'healer1', 'healer1', 'ACTIVE', 'Healer'),
(8, 'robynpacers', 'lovwiablins', 'ACTIVE', 'Client');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `ADMIN_ID` int(3) NOT NULL AUTO_INCREMENT,
  `ACCT_ID` int(3) NOT NULL,
  `FIRSTNAME` varchar(30) NOT NULL,
  `LASTNAME` varchar(30) NOT NULL,
  PRIMARY KEY (`ADMIN_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ADMIN_ID`, `ACCT_ID`, `FIRSTNAME`, `LASTNAME`) VALUES
(1, 1, 'Anjon Franz', 'Perez'),
(2, 2, 'John William', 'Ocampo'),
(3, 3, 'Gerald John', 'Tangpos');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `APPOINTMENT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `HEALER_ID` int(11) NOT NULL,
  `DATEADDED` varchar(30) NOT NULL,
  `CLIENT_ID` int(11) NOT NULL,
  `APPOINTEDDATE` varchar(30) NOT NULL,
  `FEEDBACK` varchar(3000) NOT NULL,
  `STATUS` varchar(100) NOT NULL DEFAULT 'ACTIVE',
  `DATECONFIRMED` varchar(20) NOT NULL,
  PRIMARY KEY (`APPOINTMENT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `BOOKING_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CLIENT_ID` int(11) NOT NULL,
  `HEALER_ID` int(11) NOT NULL,
  `SERVICE_ID` int(11) NOT NULL,
  `DATEADDED` varchar(20) NOT NULL,
  `BOOKINGDATE` varchar(20) NOT NULL,
  `FEEDBACK` varchar(3000) NOT NULL,
  `STATUS` varchar(15) NOT NULL DEFAULT 'ACTIVE',
  `DATECONFIRMED` varchar(20) NOT NULL,
  PRIMARY KEY (`BOOKING_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`BOOKING_ID`, `CLIENT_ID`, `HEALER_ID`, `SERVICE_ID`, `DATEADDED`, `BOOKINGDATE`, `FEEDBACK`, `STATUS`, `DATECONFIRMED`) VALUES
(3, 6, 7, 6, '2016-08-31 03:54:40', '', '', 'ACTIVE', '');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `CLIENT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ACCT_ID` int(11) NOT NULL,
  `FIRSTNAME` varchar(30) NOT NULL,
  `LASTNAME` varchar(30) NOT NULL,
  `ADDRESS` varchar(60) NOT NULL,
  `EMAIL_ADDRESS` varchar(30) NOT NULL,
  `MOBILE` varchar(15) NOT NULL,
  PRIMARY KEY (`CLIENT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`CLIENT_ID`, `ACCT_ID`, `FIRSTNAME`, `LASTNAME`, `ADDRESS`, `EMAIL_ADDRESS`, `MOBILE`) VALUES
(1, 6, 'Nick', 'Carter', '', 'nickcarter@gmail.com', '09876543212'),
(2, 8, 'Byron', 'Pacres', '', 'robynpacers@gmail.com', '09231392487');

-- --------------------------------------------------------

--
-- Table structure for table `client_feedback`
--

CREATE TABLE IF NOT EXISTS `client_feedback` (
  `FEEDBACK_ID` int(11) NOT NULL AUTO_INCREMENT,
  `COMMENT` varchar(32000) NOT NULL,
  `CLIENT_ID` int(11) NOT NULL,
  `LABEL` varchar(20) NOT NULL,
  `LABEL_ID` int(11) NOT NULL,
  `DATEADDED` varchar(30) NOT NULL,
  PRIMARY KEY (`FEEDBACK_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `client_feedback`
--

INSERT INTO `client_feedback` (`FEEDBACK_ID`, `COMMENT`, `CLIENT_ID`, `LABEL`, `LABEL_ID`, `DATEADDED`) VALUES
(1, 'Kusog ne cya maayu ne !', 1, 'method', 6, '2016-08-31 03:54:36'),
(2, '$_GET[&#39;x&#39;]', 1, 'healer', 7, '2016-09-02 01:19:41'),
(3, '$_POST[&#39;df&#39;];', 1, 'healer', 7, '2016-09-02 02:37:04'),
(4, 'sddlfkieowksdjf asldf s ]  ksldfj', 1, 'healer', 7, '2016-09-02 02:37:35'),
(5, 'kslf  sdf', 1, 'healer', 7, '2016-09-02 02:37:44'),
(6, 'lksdf', 1, 'healer', 7, '2016-09-02 02:37:51'),
(7, 'alert(&#34;You are hacked&#34;);', 1, 'healer', 7, '2016-09-02 02:39:05'),
(8, ';aslkdfj  ', 1, 'healer', 7, '2016-09-02 02:39:47');

-- --------------------------------------------------------

--
-- Table structure for table `clinic_schedule`
--

CREATE TABLE IF NOT EXISTS `clinic_schedule` (
  `SCHED_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TIME` varchar(20) NOT NULL,
  PRIMARY KEY (`SCHED_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `clinic_schedule`
--

INSERT INTO `clinic_schedule` (`SCHED_ID`, `TIME`) VALUES
(1, '8:00 AM - 9:00 AM'),
(2, '9:00 AM - 10:00 AM'),
(3, '11:00 AM - 12:00 NN'),
(4, '12:00 NN - 1:00 PM'),
(5, '1:00 PM - 2:00 PM'),
(6, '2:00 PM - 3:00 PM'),
(7, '3:00 PM - 4:00 PM'),
(8, '4:00 PM - 5:00 PM'),
(9, '5:00 PM - 6:00 PM'),
(10, '6:00 PM - 7:00 PM'),
(11, '7:00 PM - 8:00 PM'),
(12, '8:00 PM - 9:00 PM'),
(13, '9:00 PM - 10:00 PM'),
(14, '10:00 PM - 11:00 PM'),
(15, '11:00 PM - 12:00 NN'),
(16, '12:00 NN - 1:00 AM'),
(17, '1:00 AM - 2:00 AM'),
(18, '2:00 AM - 3:00 AM'),
(19, '3:00 AM - 4:00 AM'),
(20, '4:00 AM - 5:00 AM'),
(21, '5:00 AM - 6:00 AM'),
(22, '6:00 AM - 7:00 AM'),
(23, '7:00 AM - 8:00 AM');

-- --------------------------------------------------------

--
-- Table structure for table `healer`
--

CREATE TABLE IF NOT EXISTS `healer` (
  `HEALER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ACCT_ID` int(11) NOT NULL,
  `FIRSTNAME` varchar(30) NOT NULL,
  `LASTNAME` varchar(30) NOT NULL,
  `ADDRESS` varchar(200) NOT NULL,
  `CONTACT` varchar(30) NOT NULL,
  `EMAIL_ADDRESS` varchar(45) NOT NULL,
  `LATITUDE` varchar(50) NOT NULL,
  `LONGITUDE` varchar(50) NOT NULL,
  `DETAILS` varchar(1000) NOT NULL,
  `PICTURE` varchar(50) NOT NULL DEFAULT 'face.jpg',
  `CLINICHOURS` varchar(200) NOT NULL,
  `DAILYLIMIT` int(11) NOT NULL,
  `RATE` decimal(5,1) NOT NULL,
  `STATUS` varchar(15) NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`HEALER_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `healer`
--

INSERT INTO `healer` (`HEALER_ID`, `ACCT_ID`, `FIRSTNAME`, `LASTNAME`, `ADDRESS`, `CONTACT`, `EMAIL_ADDRESS`, `LATITUDE`, `LONGITUDE`, `DETAILS`, `PICTURE`, `CLINICHOURS`, `DAILYLIMIT`, `RATE`, `STATUS`) VALUES
(1, 4, 'Fonso &#34;aka&#34; Sulbad', 'Pacres', '', '09333571095', 'pacres@gmail.comm', '', '', '', 'healer_4.jpg', 'Everyday (13:00 - 21:00)', 0, '0.0', 'ACTIVE'),
(2, 5, 'Korean Healer', 'Pacres Inc', '', '09123456789', 'spot@yahoo.com', '', '', '', 'face.jpg', '', 0, '0.0', 'ACTIVE'),
(3, 7, 'Portonatu Aka Natu', 'Natu', '', '09888872134', 'natu@gmail.com', '', '', '', 'healer_7.jpg', 'Monday, Tuesday, Wednesday, Thursday, Friday (01:01 - 13:00)', 5, '1.0', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE IF NOT EXISTS `inquiries` (
  `INQUIRY_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `REQUEST` varchar(1000) NOT NULL,
  `ADDED_AT` varchar(20) NOT NULL,
  `STATUS` varchar(20) NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`INQUIRY_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE IF NOT EXISTS `like` (
  `LIKE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LABEL` varchar(15) NOT NULL,
  `LABEL_ID` int(11) NOT NULL,
  `LIKER_ID` int(11) NOT NULL,
  `DATELIKED` varchar(20) NOT NULL,
  PRIMARY KEY (`LIKE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `NOTIF_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOTIF_OWNER` int(11) NOT NULL,
  `TYPE` varchar(15) NOT NULL,
  `TYPE_ID` int(11) NOT NULL,
  `NOTIFDATE` varchar(20) NOT NULL,
  `STATUS` varchar(15) NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`NOTIF_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`NOTIF_ID`, `NOTIF_OWNER`, `TYPE`, `TYPE_ID`, `NOTIFDATE`, `STATUS`) VALUES
(3, 7, 'booking', 3, '2016-08-31 03:54:40', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `PRODUCT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PRODTYPE_ID` int(11) NOT NULL,
  `ACCT_ID` int(11) NOT NULL,
  `DESCRIPTION` varchar(60) NOT NULL,
  `RATE` decimal(5,1) NOT NULL,
  `NAME` varchar(60) NOT NULL,
  `QUANTITY` int(11) NOT NULL,
  `PRICE` decimal(10,2) NOT NULL,
  `UNIT` int(11) NOT NULL,
  `STATUS` varchar(20) NOT NULL DEFAULT 'ACTIVE',
  `PICTURE` varchar(60) NOT NULL,
  PRIMARY KEY (`PRODUCT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`PRODUCT_ID`, `PRODTYPE_ID`, `ACCT_ID`, `DESCRIPTION`, `RATE`, `NAME`, `QUANTITY`, `PRICE`, `UNIT`, `STATUS`, `PICTURE`) VALUES
(1, 1, 4, 'Prevent Cancer\r\nPrevent Kidney Failure\r\nPrevent Heart Failur', '0.0', 'Spirulina Capsule', 100, '250.00', 0, 'ACTIVE', 'product_4Spirulina Capsule.jpg'),
(2, 2, 4, 'This ointment is compose  of several kinds of leave that rel', '0.0', 'Natural  Ointment ', 200, '150.00', 0, 'ACTIVE', 'product_4Natural  Ointment .jpg'),
(3, 2, 7, 'Sa mga Wala pa kasuway sa mga Ane.na bag.o haplas para sa in', '0.0', 'Herbal Haplas', 20, '150.00', 0, 'ACTIVE', 'product_7Herbal Haplas.jpg'),
(4, 1, 7, 'Mga prevent ne sa tanang sakit busa palit na', '1.0', 'Moringa', 15, '150.00', 0, 'ACTIVE', 'product_7Moringa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE IF NOT EXISTS `product_type` (
  `PRODTYPE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PRODTYPE` varchar(30) NOT NULL,
  PRIMARY KEY (`PRODTYPE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`PRODTYPE_ID`, `PRODTYPE`) VALUES
(1, 'Internal'),
(2, 'External');

-- --------------------------------------------------------

--
-- Table structure for table `reaction`
--

CREATE TABLE IF NOT EXISTS `reaction` (
  `LIKE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LABEL` varchar(15) NOT NULL,
  `LABEL_ID` int(11) NOT NULL,
  `LIKER_ID` int(11) NOT NULL,
  `DATELIKED` varchar(20) NOT NULL,
  PRIMARY KEY (`LIKE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `reaction`
--

INSERT INTO `reaction` (`LIKE_ID`, `LABEL`, `LABEL_ID`, `LIKER_ID`, `DATELIKED`) VALUES
(5, 'service', 6, 6, '2016-08-31 04:17:26'),
(6, 'healer', 7, 6, '2016-08-31 04:18:25'),
(7, 'product', 4, 6, '2016-08-31 04:19:01');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE IF NOT EXISTS `request` (
  `REQUEST_ID` int(6) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(50) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `MESSAGE` varchar(500) NOT NULL,
  PRIMARY KEY (`REQUEST_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `RESERVE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CLIENT_ID` int(11) NOT NULL,
  `HEALER_ID` int(11) NOT NULL,
  `PRODUCT_ID` int(11) NOT NULL,
  `PROD_QTY` int(11) NOT NULL,
  `PRICE` decimal(10,2) NOT NULL,
  `DATEADDED` varchar(20) NOT NULL,
  `STATUS` varchar(15) NOT NULL DEFAULT 'ACTIVE',
  `DATECONFIRMED` varchar(20) NOT NULL,
  PRIMARY KEY (`RESERVE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `SERVICE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SRVCTYPE_ID` int(11) NOT NULL,
  `ACCT_ID` int(11) NOT NULL,
  `NAME` varchar(60) NOT NULL,
  `DESCRIPTION` varchar(3000) NOT NULL,
  `PRICE` decimal(10,2) NOT NULL,
  `STATUS` varchar(100) NOT NULL DEFAULT 'ACTIVE',
  `PICTURE` varchar(60) NOT NULL,
  `RATE` decimal(5,1) NOT NULL,
  PRIMARY KEY (`SERVICE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`SERVICE_ID`, `SRVCTYPE_ID`, `ACCT_ID`, `NAME`, `DESCRIPTION`, `PRICE`, `STATUS`, `PICTURE`, `RATE`) VALUES
(1, 2, 4, 'Facial Gua Sha', 'this method use by the Chinese to stay young and fresh', '850.00', 'ACTIVE', 'service_4Facial Gua Sha.jpg', '0.0'),
(2, 2, 4, 'Back Gua Sha', 'To make your circulate your blood to make you stronger', '1200.00', 'ACTIVE', 'service_4Back Gua Sha.jpg', '0.0'),
(3, 3, 4, 'Acupressure Therapy', 'Acupressure unclogs the body''s built up energy in the meridian pathways while triggering the release of muscular tension and blood flow. This can help to restore the body to its equilibrium, while also working to relieve a range of physical and emotional ailments.', '1500.00', 'ACTIVE', 'service_4Acupressure Therapy.jpg', '0.0'),
(4, 1, 4, 'Tui Na', 'is a form of Chinese manipulative therapy often used in conjunction with acupuncture, moxibustion, fire cupping, Chinese herbalism, t&#39;ai chi, and qigong.', '1200.00', 'ACTIVE', 'service_4Tui Na.jpg', '0.0'),
(5, 1, 4, 'moxibustion', 'the burning of moxa on or near a person&#39;s skin as a counterirritant.', '2500.00', 'ACTIVE', 'service_4moxibustion.jpg', '0.0'),
(6, 5, 7, 'Hiwaga', 'Kane ang kinakaraan na pama.agi sa atong nasud og Barato ', '80.00', 'ACTIVE', 'service_7Hiwaga.jpg', '1.0');

-- --------------------------------------------------------

--
-- Table structure for table `service_type`
--

CREATE TABLE IF NOT EXISTS `service_type` (
  `SRVCTYPE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SRVCTYPE` varchar(30) NOT NULL,
  PRIMARY KEY (`SRVCTYPE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `service_type`
--

INSERT INTO `service_type` (`SRVCTYPE_ID`, `SRVCTYPE`) VALUES
(1, 'Accupuncture'),
(2, 'Gua Sha'),
(3, 'Acupressure'),
(4, 'Auricular Therapy'),
(5, 'Hilot');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `TRANSACTION_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DATE` varchar(30) NOT NULL,
  `SRVC_CHARGE` decimal(10,0) NOT NULL,
  `HEALER_ID` int(11) NOT NULL,
  `CLIENT_ID` int(11) NOT NULL,
  `TRANS_AMOUNT` int(11) NOT NULL,
  PRIMARY KEY (`TRANSACTION_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_detail`
--

CREATE TABLE IF NOT EXISTS `transaction_detail` (
  `TRANSDETAIL_ID` int(11) NOT NULL,
  `TRANSACTION_ID` int(11) NOT NULL,
  `SERVICE_ID` int(11) NOT NULL,
  `PRODUCT_ID` int(11) NOT NULL,
  `QUANTITY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
