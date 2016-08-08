-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2016 at 10:08 AM
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
  `STATUS` varchar(30) NOT NULL,
  `TYPE` varchar(10) NOT NULL,
  PRIMARY KEY (`ACCT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`ACCT_ID`, `USERNAME`, `PASSWORD`, `STATUS`, `TYPE`) VALUES
(1, 'geraldjohnt', 'geraldgwapo', '', 'Client'),
(3, 'bayronon', 'pakers', '', 'Client'),
(4, 'kaylie', 'buangko', '', 'Client'),
(5, 'ocampokaga', 'kagako', '', 'Client'),
(6, 'admin01', 'stevejobs', '', 'Admin'),
(7, 'admin02', 'billgates', '', 'Admin'),
(8, 'yeah1', 'abcd12345', '', 'Client'),
(9, 'pakersss', 'akoako', '', 'Healer'),
(10, 'pakersss', 'akoako', '', 'Healer'),
(11, 'pakersss', 'akoako', '', 'Healer'),
(13, 'kylekun', 'kikiki', '', 'Healer'),
(14, 'itangboy', 'itang', '', 'Healer'),
(15, 'open7', 'perez', '', 'Client');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ADMIN_ID`, `ACCT_ID`, `FIRSTNAME`, `LASTNAME`) VALUES
(1, 6, 'Gerald John', 'Tangpos'),
(2, 7, 'John William', 'Ocampo');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `APPOINTMENT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SCHED_ID` int(11) NOT NULL,
  `APPOINTMENT_DATE` varchar(30) NOT NULL,
  `CLIENT_ID` int(11) NOT NULL,
  `STATUS` varchar(100) NOT NULL,
  PRIMARY KEY (`APPOINTMENT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`CLIENT_ID`, `ACCT_ID`, `FIRSTNAME`, `LASTNAME`, `ADDRESS`, `EMAIL_ADDRESS`, `MOBILE`) VALUES
(1, 1, 'Gerald John', 'Tangpos', '', 'geraldjohnt@gmail.com', '09254669851'),
(3, 3, 'Byron', 'Pacres', '', 'robynpacers@gmail.com', '9382839899'),
(4, 4, 'Kyle', 'Cabradilla', '', 'kaylie@gmail.com', '9382839289'),
(5, 5, 'John William', 'Ocampo', '', 'kaga@gmail.com', '9382938298'),
(6, 8, 'Gerald', 'Tangpos', '', 'etagpos@email', '090807060578'),
(7, 15, 'Dsad', 'Ada', '', 'eeee@yahoo.com', '09229712475');

-- --------------------------------------------------------

--
-- Table structure for table `client_feedback`
--

CREATE TABLE IF NOT EXISTS `client_feedback` (
  `FEEDBACK_ID` int(11) NOT NULL AUTO_INCREMENT,
  `RATINGS` int(11) NOT NULL,
  `COMMENT` varchar(1000) NOT NULL,
  `CLIENT_ID` int(11) NOT NULL,
  `LABEL` varchar(20) NOT NULL,
  `LABEL_ID` int(11) NOT NULL,
  `DATEADDED` varchar(30) NOT NULL,
  PRIMARY KEY (`FEEDBACK_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `client_feedback`
--

INSERT INTO `client_feedback` (`FEEDBACK_ID`, `RATINGS`, `COMMENT`, `CLIENT_ID`, `LABEL`, `LABEL_ID`, `DATEADDED`) VALUES
(1, 0, 'skdjf', 3, 'healer', 14, '2016-08-04 18:50:38'),
(6, 0, 'This is good :D', 3, 'method', 4, '2016-08-05 03:52:14'),
(7, 0, 'WOw! Great :D', 3, 'method', 8, '2016-08-05 03:53:51'),
(8, 0, 'Cool!', 3, 'method', 7, '2016-08-05 03:54:52'),
(9, 0, 'Hihi', 3, 'product', 3, '2016-08-05 04:26:12'),
(10, 0, 'Nice', 1, 'method', 7, '2016-08-05 04:37:03'),
(11, 0, 'Buang ka.', 1, 'healer', 13, '2016-08-05 04:40:08'),
(12, 0, 'Buang buang ka.', 3, 'healer', 13, '2016-08-05 04:40:36'),
(13, 0, 'This method is so good.', 3, 'method', 5, '2016-08-05 16:53:51'),
(14, 0, 'Louya way comment.', 3, 'healer', 11, '2016-08-05 16:54:13');

-- --------------------------------------------------------

--
-- Table structure for table `clinic_schedule`
--

CREATE TABLE IF NOT EXISTS `clinic_schedule` (
  `SCHED_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DAYS` varchar(30) NOT NULL,
  `TIME_START` varchar(20) NOT NULL,
  `TIME_END` varchar(20) NOT NULL,
  `CAPACITY` int(11) NOT NULL,
  `STATUS` varchar(100) NOT NULL,
  `HEALER_ID` int(11) NOT NULL,
  PRIMARY KEY (`SCHED_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `healer`
--

CREATE TABLE IF NOT EXISTS `healer` (
  `HEALER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ACCT_ID` int(11) NOT NULL,
  `FIRSTNAME` varchar(30) NOT NULL,
  `LASTNAME` varchar(30) NOT NULL,
  `ADDRESS` varchar(50) NOT NULL,
  `CONTACT` varchar(30) NOT NULL,
  `EMAIL_ADDRESS` varchar(45) NOT NULL,
  `IMAGE` varchar(60) NOT NULL,
  `LATITUDE` decimal(10,0) NOT NULL,
  `LONGITUDE` decimal(10,0) NOT NULL,
  `DETAILS` varchar(1000) NOT NULL,
  `PICTURE` varchar(50) NOT NULL,
  `RATE` decimal(5,1) NOT NULL,
  `STATUS` varchar(15) NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`HEALER_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `healer`
--

INSERT INTO `healer` (`HEALER_ID`, `ACCT_ID`, `FIRSTNAME`, `LASTNAME`, `ADDRESS`, `CONTACT`, `EMAIL_ADDRESS`, `IMAGE`, `LATITUDE`, `LONGITUDE`, `DETAILS`, `PICTURE`, `RATE`, `STATUS`) VALUES
(1, 11, 'Byron', 'Pacres', '', '09282839288', 'babytarts@gmail.com', '', '0', '0', '', 'face.jpg', '3.3', 'ACTIVE'),
(3, 13, 'Kyle', 'Cabradilla', '', '09382838277', 'kylekun@yahoo.com', '', '0', '0', '', 'face.jpg', '2.1', 'ACTIVE'),
(4, 14, 'Raymart', 'Itang', '', '09382837399', 'itang@gmail.com', '', '0', '0', '', 'face.jpg', '5.0', 'ACTIVE');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`PRODUCT_ID`, `PRODTYPE_ID`, `ACCT_ID`, `DESCRIPTION`, `RATE`, `NAME`, `QUANTITY`, `PRICE`, `UNIT`, `STATUS`, `PICTURE`) VALUES
(1, 2, 13, 'This is the best capsule in my traditional medicines. You sh', '5.0', 'Albatroz Capsule', 100, '12.00', 0, 'INACTIVE', '13_1.png'),
(2, 1, 13, 'Mao ni ang ointment nga makapaayo sa sakit sa lawas.', '3.3', 'Tanini ointment', 0, '84.00', 0, 'ACTIVE', 'product_13Tanini ointment.jpg'),
(3, 1, 13, 'This ointment is made from Coca Cola', '4.1', 'Coca Ointment', 0, '938.00', 0, 'ACTIVE', 'product_13Coca Ointment.jpg');

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
(1, 'Ointment'),
(2, 'Capsule');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`SERVICE_ID`, `SRVCTYPE_ID`, `ACCT_ID`, `NAME`, `DESCRIPTION`, `PRICE`, `STATUS`, `PICTURE`, `RATE`) VALUES
(1, 1, 14, 'Accupuncture', 'Nindot jud kaayo\r\n\r\nDili ka mag mahay.\r\n\r\nTry na.\r\n\r\n\r\n\r\n\r\nTag 500 ra kada oras.', '500.00', 'ACTIVE', '14_1.png', '3.0'),
(2, 2, 14, 'Hilot hilot', 'Try mo ani. Maka nindot sa lawas. Mawa imong mga pamaol ug sakit sakit sa lawas. Dili mo magmahay. Affordable pa jud. Tag 350 ra.', '400.00', 'ACTIVE', '14_2.png', '1.1'),
(3, 2, 14, 'Hilot diri', 'Epektibo jud kaayo ni. Proven and tested.', '239.00', 'ACTIVE', '14service_14Hilot diri.jpg', '2.3'),
(4, 2, 14, 'the new hilot', 'Mao ni ang bag o na pamaagi sa pag hilot.', '239.00', 'ACTIVE', 'service_14the new hilot.jpg', '3.5'),
(5, 1, 14, 'tusok tusok ni bai', 'Ang pinaka nindot nga pamaagi sa pag accupuncture ania na.', '847.00', 'ACTIVE', 'service_14tusok tusok ni bai.png', '5.0'),
(6, 2, 14, 'New hilot', 'Mao na ang usa sa mga pinaka nindot na hilot sa tibuok Cube.', '943.00', 'ACTIVE', 'service_14New hilot.jpg', '3.0'),
(7, 2, 13, 'THis is hilot', 'Nindot ni kay maka relax jud ka.', '843.00', 'ACTIVE', 'service_13THis is hilot.jpg', '4.9'),
(8, 1, 13, 'acCUTEpuncture', 'Mao ni ang cute way sa pag tusok.', '323.00', 'ACTIVE', 'service_13acCUTEpuncture.jpg', '5.0'),
(9, 2, 13, 'hilot na ni', 'Mao ni ang hilot nga maka pa bayaw nimo sa Langit.', '69.00', 'ACTIVE', 'service_13hilot na ni.jpg', '3.1');

-- --------------------------------------------------------

--
-- Table structure for table `service_type`
--

CREATE TABLE IF NOT EXISTS `service_type` (
  `SRVCTYPE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SRVCTYPE` varchar(30) NOT NULL,
  PRIMARY KEY (`SRVCTYPE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `service_type`
--

INSERT INTO `service_type` (`SRVCTYPE_ID`, `SRVCTYPE`) VALUES
(1, 'Accupuncture'),
(2, 'Hilot');

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
