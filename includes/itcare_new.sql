-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 21, 2018 at 05:15 PM
-- Server version: 5.7.24-0ubuntu0.16.04.1
-- PHP Version: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itcare_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `it_apis_list`
--

CREATE TABLE `it_apis_list` (
  `id` int(11) NOT NULL,
  `apis_provider_name` varchar(200) NOT NULL,
  `flight` enum('0','1') NOT NULL,
  `bus` enum('0','1') NOT NULL,
  `train` enum('0','1') NOT NULL,
  `prepaid_mobile` enum('0','1') NOT NULL,
  `datacard` enum('0','1') NOT NULL,
  `dth` enum('0','1') NOT NULL,
  `hotel` enum('0','1') NOT NULL,
  `electricity` enum('0','1') NOT NULL,
  `postpaid_mobile` enum('0','1') NOT NULL,
  `water` enum('0','1') NOT NULL,
  `gas` enum('0','1') NOT NULL,
  `metro` enum('0','1') NOT NULL,
  `money_transfer` enum('0','1') NOT NULL,
  `gift_coupon` enum('0','1') NOT NULL,
  `sms` enum('0','1') NOT NULL,
  `gold` enum('0','1') NOT NULL,
  `prepaid_card` enum('0','1') NOT NULL,
  `eds_pos` enum('0','1') NOT NULL,
  `insurance` enum('0','1') NOT NULL,
  `dth_sale` enum('0','1') NOT NULL,
  `car` enum('0','1') NOT NULL,
  `bike` enum('0','1') NOT NULL,
  `domain` enum('0','1') NOT NULL,
  `forex` enum('0','1') NOT NULL,
  `payment_gateway` enum('0','1') NOT NULL,
  `auth1` varchar(255) NOT NULL,
  `auth2` varchar(255) NOT NULL,
  `auth3` varchar(255) NOT NULL,
  `auth4` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `it_apis_list`
--

INSERT INTO `it_apis_list` (`id`, `apis_provider_name`, `flight`, `bus`, `train`, `prepaid_mobile`, `datacard`, `dth`, `hotel`, `electricity`, `postpaid_mobile`, `water`, `gas`, `metro`, `money_transfer`, `gift_coupon`, `sms`, `gold`, `prepaid_card`, `eds_pos`, `insurance`, `dth_sale`, `car`, `bike`, `domain`, `forex`, `payment_gateway`, `auth1`, `auth2`, `auth3`, `auth4`, `status`) VALUES
(1, 'ezy_pay', '0', '0', '0', '1', '1', '1', '0', '1', '1', '1', '1', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '', '1'),
(2, 'cyber_plate', '0', '0', '0', '1', '1', '1', '0', '1', '1', '1', '1', '0', '1', '1', '0', '0', '0', '1', '1', '1', '0', '0', '0', '0', '0', '', '', '', '', '1'),
(3, 'gi', '1', '1', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '1', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '', '1'),
(4, 'go_all_trip', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '', '1'),
(5, 'phone_pay', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '', '1'),
(6, 'reseller_club', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '', '', '', '', '1'),
(7, 'oyo', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '', '1'),
(8, 'tbo', '1', '1', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '', '', '', '', '1'),
(9, 'tracknpay', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '', '', '', '', '1'),
(10, 'eko_money', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '', '1'),
(11, 'aups', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `it_bank_list`
--

CREATE TABLE `it_bank_list` (
  `id` int(11) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_code` varchar(4) NOT NULL,
  `imps` int(11) NOT NULL DEFAULT '0',
  `neft` int(11) NOT NULL DEFAULT '0',
  `is_verify_acc` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `it_bank_list`
--

INSERT INTO `it_bank_list` (`id`, `bank_name`, `bank_code`, `imps`, `neft`, `is_verify_acc`, `status`) VALUES
(1, 'Abhyudaya Co-op Bank Ltd', 'ABHY', 0, 1, 1, 1),
(2, 'Abu Dhabi Commercial Bank', 'ADCB', 0, 1, 0, 1),
(3, 'Ahmedabad Mercantile Cooperative Bank', 'AMCB', 0, 1, 0, 1),
(4, 'Akola Janata Commercial Cooperative Bank', 'HDFJ', 1, 1, 1, 1),
(5, 'ALLAHABAD BANK', 'ALLA', 1, 1, 1, 1),
(6, 'Allahabad UP Gramin Bank', 'ALLG', 0, 1, 0, 1),
(7, 'ANDHRA BANK', 'ANDB', 1, 1, 1, 1),
(8, 'Andhra Pradesh Grameena Vikas Bank', 'SAPG', 0, 1, 0, 1),
(9, 'Andhra Pragathi Grameena Bank', 'SYNG', 0, 1, 0, 1),
(10, 'Apna Sahakari Bank Ltd', 'ASBL', 1, 1, 1, 1),
(11, 'Arunachal Pradesh Rural Bank', 'SBAP', 0, 1, 0, 1),
(12, 'Aryavart Gramin Bank', 'BKIG', 0, 1, 0, 1),
(13, 'Assam Gramin Vikash Bank', 'UASG', 0, 1, 0, 1),
(14, 'AXIS BANK', 'UTIB', 1, 1, 1, 1),
(15, 'Baitarani Gramin Bank', 'BKIB', 0, 1, 0, 1),
(16, 'Ballia Etawah Gramin Bank', 'CBIG', 0, 1, 0, 1),
(17, 'BANDHAN BANK LIMITED', 'BDBL', 0, 1, 0, 1),
(18, 'Bangiya Gramin Bank', 'UTBB', 0, 1, 0, 1),
(19, 'BANK OF AMERICA', 'BOFA', 0, 1, 0, 1),
(20, 'Bank of Bahrein and Kuwait', 'BBKM', 0, 1, 0, 1),
(21, 'BANK OF BARODA', 'BARB', 1, 1, 1, 1),
(22, 'Bank of Ceylon', 'BCEY', 0, 1, 0, 1),
(23, 'BANK OF INDIA', 'BKID', 1, 1, 1, 1),
(24, 'BANK OF MAHARASHTRA', 'MAHB', 1, 1, 0, 1),
(25, 'Bank of Tokyo Mitsubishi Ltd', 'BOTM', 0, 1, 0, 1),
(26, 'Barclays Bank', 'BARC', 0, 1, 0, 1),
(27, 'Baroda Gujarat Gramin Bank', 'BJDG', 0, 1, 0, 1),
(28, 'Baroda Rajasthan Gramin Bank', 'BARR', 0, 1, 0, 1),
(29, 'Baroda Uttar Pradesh Gramin Bank', 'BARU', 0, 1, 0, 1),
(30, 'Bassein Catholic Co-Op Bank Ltd', 'BACB', 1, 1, 1, 1),
(31, 'Bharat Cooperative Bank Mumbai Ltd', 'BCBM', 0, 1, 0, 1),
(32, 'Bharatiya Mahila Bank Ltd', 'BMBL', 0, 1, 0, 1),
(33, 'Bhartiya Mahila Bank', 'BMBL', 1, 1, 1, 1),
(34, 'Bihar Kshetriya Gramin Bank', 'UCBK', 0, 1, 0, 1),
(35, 'BNP Paribas Bank', 'BNPA', 1, 1, 1, 1),
(36, 'CANARA BANK', 'CNRB', 1, 1, 1, 1),
(37, 'Catholic Syrian Bank', 'CSBK', 1, 1, 1, 1),
(38, 'Cauvery Kalpatharu Grameena Bank', 'SBMG', 0, 1, 0, 1),
(39, 'CENTRAL BANK OF INDIA', 'CBIN', 1, 1, 1, 1),
(40, 'Chaitanya Godavari Grameena Bank', 'ACGG', 0, 1, 0, 1),
(41, 'Chhattisgarh Gramin Bank', 'SBIC', 0, 1, 0, 1),
(42, 'Chickmangalur Kodagu Gramin Bank', 'CORG', 0, 1, 0, 1),
(43, 'Chinatrust Commercial Bank', 'CTCB', 0, 1, 0, 1),
(44, 'CITI Bank', 'CITI', 1, 1, 1, 1),
(45, 'Citizen Credit Cooperative Bank', 'CCBL', 0, 1, 0, 1),
(46, 'City Union Bank Ltd', 'CIUB', 1, 1, 1, 1),
(47, 'CORPORATION BANK', 'CORP', 1, 1, 1, 1),
(48, 'Credit Agricole Corporate and Investment Bank', 'CRLY', 0, 1, 0, 1),
(49, 'DBS Bank Ltd', 'DBSS', 1, 1, 1, 1),
(50, 'DCB Bank Ltd', 'DCBL', 1, 1, 0, 1),
(51, 'Deccan Grameena Bank', 'SBHG', 0, 1, 0, 1),
(52, 'DENA BANK', 'BKDN', 1, 1, 0, 1),
(53, 'Dena Gujarat Gramin Bank', 'BKDD', 0, 1, 0, 1),
(54, 'Deutsche Bank', 'DEUT', 0, 1, 0, 1),
(55, 'Development Credit Bank Limited', 'DCBL', 1, 1, 1, 1),
(56, 'Dhanlaxmi Bank Ltd', 'DLXB', 0, 1, 0, 1),
(57, 'DICGC', 'DICG', 0, 1, 0, 1),
(58, 'Dombivli Nagari Sahakari Bank Ltd', 'DNSB', 1, 1, 1, 1),
(59, 'Dr. Annasaheb Chougule Urban Co-op Bank Ltd.', 'HDFA', 1, 1, 1, 1),
(60, 'Durg Rajnandgaon Gramin Bank', 'BKDR', 0, 1, 0, 1),
(61, 'Ellaqui Dehati Bank', 'SBIE', 0, 1, 0, 1),
(62, 'Federal Bank Ltd', 'FDRL', 1, 1, 1, 1),
(63, 'Firstrand Bank Ltd', 'FIRN', 0, 1, 0, 1),
(64, 'Gayatri Bank', 'HDGB', 1, 1, 1, 1),
(65, 'Gurgaon Gramin Bank Ltd', 'GGBG', 0, 1, 0, 1),
(66, 'Hadoti Kshetriya Gramin Bank', 'CBIH', 0, 1, 0, 1),
(67, 'Haryana Gramin Bank', 'PUNH', 0, 1, 0, 1),
(68, 'HDFC BANK', 'HDFC', 1, 1, 0, 1),
(69, 'Himachal Gramin Bank', 'PUHG', 0, 1, 0, 1),
(70, 'Himachal Pradesh State Co-Operative Bank Ltd', 'YESH', 0, 1, 0, 1),
(71, 'HSBC', 'HSBC', 1, 1, 1, 1),
(72, 'Hutatma Sahakari Bank Ltd.', 'ICIH', 1, 1, 1, 1),
(73, 'ICICI BANK LIMITED', 'ICIC', 1, 1, 1, 1),
(74, 'IDBI BANK', 'IBKL', 1, 1, 1, 1),
(75, 'IDFC Bank Ltd', 'IDFB', 0, 1, 0, 1),
(76, 'INDIAN BANK', 'IDIB', 1, 1, 1, 1),
(77, 'INDIAN OVERSEAS BANK', 'IOBA', 1, 1, 1, 1),
(78, 'Indusind Bank Ltd', 'INDB', 1, 1, 1, 1),
(79, 'ING Vysya Bank Ltd', 'VYSA', 1, 1, 1, 1),
(80, 'J & K Grameen Bank', 'JAKG', 0, 1, 0, 1),
(81, 'Jaipur Thar Gramin Bank', 'UJTG', 0, 1, 0, 1),
(82, 'Jalore Nagrik Sahakari Bank Ltd.', 'HDJC', 1, 1, 1, 1),
(83, 'Janakalyan Sahakari Bank Ltd', 'JSBL', 0, 1, 0, 1),
(84, 'Janaseva Sahakari Bank Ltd', 'JANA', 1, 1, 1, 1),
(85, 'Janata Sahakari Bank Ltd (Pune)', 'JSBP', 1, 1, 1, 1),
(86, 'Jhabua Dhar Kshetriya Gramin Bank', 'BJDG', 0, 1, 0, 1),
(87, 'Jharkhand Gramin Bank', 'SBIJ', 0, 1, 0, 1),
(88, 'JPMorgan Chase Bank Na', 'CHAS', 0, 1, 0, 1),
(89, 'Kalinga Gramya Bank', 'UCKG', 0, 1, 0, 1),
(90, 'Kallappanna Awade Ichalkaranji Janata Sahakari Bank Ltd', 'KAIJ', 1, 1, 1, 1),
(91, 'Kapole Co-op Bank', 'KCBL', 0, 1, 0, 1),
(92, 'Karnataka Bank Ltd', 'KARB', 0, 1, 0, 1),
(93, 'Karnataka Vikas Grameena Bank', 'SYKG', 0, 1, 0, 1),
(94, 'Karur Vysya Bank', 'KVBL', 1, 1, 1, 1),
(95, 'Kashi Gomati Samyut Gramin Bank', 'UBKG', 0, 1, 0, 1),
(96, 'Kerala Gramin Bank', 'KLGB', 1, 1, 1, 1),
(97, 'Kotak Mahindra Bank', 'KKBK', 1, 1, 1, 1),
(98, 'Langpi Dehangi Rural Bank', 'SLDR', 0, 1, 0, 1),
(99, 'Madhya Bharat Gramin Bank', 'FBIG', 0, 1, 0, 1),
(100, 'Madhya Bihar Gramin Bank', 'PUNG', 0, 1, 0, 1),
(101, 'Mahakaushal Kshetriya Gramin Bank', 'UCBG', 0, 1, 0, 1),
(102, 'Mahanagar Cooperative Bank Ltd', 'MCBL', 0, 1, 0, 1),
(103, 'Maharashtra Gramin Bank', 'MAHG', 0, 1, 0, 1),
(104, 'Maharashtra State Co Operative Bank', 'MSCI', 0, 1, 0, 1),
(105, 'Malwa Gramin Bank', 'HDFG', 0, 1, 0, 1),
(106, 'Manipur Rural Ank', 'UTBG', 0, 1, 0, 1),
(107, 'Mashreq Bank', 'MSHQ', 0, 1, 0, 1),
(108, 'Meghalaya Rural Bank', 'SMEG', 0, 1, 0, 1),
(109, 'Mewar Anchalik Gramin Bank', 'ICIG', 0, 1, 0, 1),
(110, 'Mg Baroda Gramin Bank', 'SBBG', 0, 1, 0, 1),
(111, 'Mizuho Corporate Bank Ltd', 'MHCB', 0, 1, 0, 1),
(112, 'Nainital Almora Kshetriya Gramin Bank', 'BARG', 0, 1, 0, 1),
(113, 'Narmada Malwa Gramin Bank', 'SBIG', 0, 1, 0, 1),
(114, 'Neelachal Gramya Bank', 'INGB', 0, 1, 0, 1),
(115, 'Neft Malwa Gramin Bank', 'NMGB', 0, 1, 0, 1),
(116, 'New India Cooperative Ban Ltd', 'NICB', 0, 1, 0, 1),
(117, 'North Malabar Gramin Bank', 'SYNM', 0, 1, 0, 1),
(118, 'NULLThe Bharat Co-Operative Bank (Mumbai) Ltd', 'BCBM', 0, 1, 0, 1),
(119, 'Nutan Nagarik Sahakari Bank Ltd', 'NNSB', 0, 1, 0, 1),
(120, 'Oman International Bank', 'OIBA', 0, 1, 0, 1),
(121, 'ORIENTAL BANK OF COMMERCE', 'ORBC', 1, 1, 0, 1),
(122, 'Pallavan Grama Bank', 'IDIG', 0, 1, 0, 1),
(123, 'Pandyan Gramin Bank', 'IOBG', 0, 1, 0, 1),
(124, 'Parshwanath Co-operative Bank Ltd.', 'HDPA', 1, 1, 1, 1),
(125, 'Parvatiya Gramin Bank', 'SPGB', 0, 1, 0, 1),
(126, 'Paschim Banga Gramin Bank', 'UPBG', 0, 1, 0, 1),
(127, 'Pochampally Co-op Urban Bank Ltd.', 'HDFP', 1, 1, 1, 1),
(128, 'Pragathi Krishna Gramin Bank', 'PKGB', 1, 1, 1, 1),
(129, 'Prathama Bank', 'PRTH', 0, 1, 0, 1),
(130, 'Puduvai Bharathiar Grama Bank', 'IPBG', 0, 1, 0, 1),
(131, 'Pune Peoples Co-Operative Bank', 'IBKP', 1, 1, 1, 1),
(132, 'Punjab and Maharashtra Cooperative Bank Ltd', 'PMCB', 1, 1, 1, 1),
(133, 'PUNJAB AND SIND BANK', 'PSIB', 1, 1, 1, 1),
(134, 'Punjab Gramin Bank', 'PPGB', 0, 1, 0, 1),
(135, 'PUNJAB NATIONAL BANK', 'PUNB', 1, 1, 1, 1),
(136, 'Purvanchal Gramin Bank', 'SRGB', 0, 1, 0, 1),
(137, 'Raipur Urban Mercantile Co- operative Bank Ltd', 'HDRU', 1, 1, 1, 1),
(138, 'Rajasthan Gramin Bank', 'PRGB', 0, 1, 0, 1),
(139, 'Rajkot Nagarik Sahakari Bank Ltd', 'RNSB', 0, 1, 0, 1),
(140, 'Rewa-Sidhi Gramin Bank', 'URSG', 0, 1, 0, 1),
(141, 'Rushikulya Gramin Bank', 'ANDG', 0, 1, 0, 1),
(142, 'Samastipur Kshetriya Gb', 'SSKG', 0, 1, 0, 1),
(143, 'Sarva Up Gramin Bank', 'PSGB', 0, 1, 0, 1),
(144, 'Satpura Narmada Kshetriya Gramin Bank', 'CSUG', 0, 1, 0, 1),
(145, 'Saurashtra Gramin Bank', 'SSGB', 0, 1, 0, 1),
(146, 'Sharda Gramin Bank', 'ASGB', 0, 1, 0, 1),
(147, 'Shinhan Bank', 'SHBK', 0, 1, 0, 1),
(148, 'Shree Veershaiv Co-op Bank Ltd', 'CVCB', 1, 1, 0, 1),
(149, 'Shreyas Gramin Bank', 'CSGB', 0, 1, 0, 1),
(150, 'Shri Arihant Co-operative Bank Ltd.', 'ICSA', 1, 1, 1, 1),
(151, 'Shri Basaveshwar Sahakari Bank Niyamit,Bagalkot', 'ICIS', 1, 1, 1, 1),
(152, 'Societe Generale', 'SOGE', 0, 1, 0, 1),
(153, 'South Indian Bank', 'SIBL', 1, 1, 1, 1),
(154, 'South Malabar Gramin Bank', 'CMGB', 0, 1, 0, 1),
(155, 'Standard Chartered Bank', 'SCBL', 0, 1, 0, 1),
(156, 'State Bank of Bikaner and Jaipur', 'SBBJ', 1, 1, 1, 1),
(157, 'STATE BANK OF HYDERABAD', 'SBHY', 1, 1, 1, 1),
(158, 'STATE BANK OF INDIA', 'SBIN', 1, 1, 1, 1),
(159, 'State Bank of Mauritius Ltd', 'STCB', 0, 1, 0, 1),
(160, 'State Bank of Mysore', 'SBMY', 1, 1, 1, 1),
(161, 'State Bank of Patiala', 'STBP', 1, 1, 1, 1),
(162, 'State Bank of Travancore', 'SBTR', 1, 1, 1, 1),
(163, 'Suco Souharda Sahakari Bank Ltd', 'HDFS', 1, 1, 1, 1),
(164, 'Surguja Kshetriya Gramin Bank', 'CKGB', 0, 1, 0, 1),
(165, 'Sutlej Gramin Bank', 'PSIG', 0, 1, 0, 1),
(166, 'Swarna Bharat Trust Cyber Grameen', 'SBCG', 0, 1, 0, 1),
(167, 'Syndicate Bank', 'SYNB', 1, 1, 0, 1),
(168, 'Tamilnad Mercantile Bank Ltd', 'TMBL', 1, 1, 1, 1),
(169, 'The A.P. Mahesh Co-Op Urban Bank Ltd', 'APMC', 1, 1, 1, 1),
(170, 'The Adarsh Urban Co-op. Bank Ltd., Hyderabad', 'ICIA', 1, 1, 1, 1),
(171, 'The Ahmedabad Mercantile Co- Operative Bank Ltd', 'AMCB', 0, 1, 0, 1),
(172, 'The Bank of Nova Scotia', 'NOSC', 0, 1, 0, 1),
(173, 'The Cosmos Co-Operative Bank Ltd', 'COSB', 1, 1, 1, 1),
(174, 'The Greater Bombay Co-operative Bank Ltd', 'GBCB', 1, 1, 1, 1),
(175, 'The Jammu And Kashmir Bank Ltd', 'JAKA', 1, 1, 0, 1),
(176, 'The Kalupur Commercial Co-op Bank Ltd', 'KCCB', 1, 1, 1, 1),
(177, 'The Kalyan Janata Sahakari Bank Ltd', 'KJSB', 1, 1, 0, 1),
(178, 'The Kangra Central Cooperative Bank Ltd', 'KACE', 0, 1, 0, 1),
(179, 'The Kangra Cooperative Bank Ltd', 'KANG', 0, 1, 0, 1),
(180, 'The Karad Urban Co-op Bank Ltd', 'KUCB', 0, 1, 0, 1),
(181, 'The Karnataka State Apex Cooperative Bank Ltd', 'KSBC', 0, 1, 0, 1),
(182, 'The Lakshmi Vilas Bank Ltd', 'LAVB', 0, 1, 0, 1),
(183, 'The Mayani Urban Co-operative Bank Ltd', 'ICIM', 1, 1, 1, 1),
(184, 'The Mehsana Urban Cooperative Bank Ltd', 'MSNU', 1, 1, 1, 1),
(185, 'The Nainital Bank Ltd', 'NTBL', 1, 1, 1, 1),
(186, 'The Nasik Merchants Co-Op Bank Ltd', 'NMCB', 0, 1, 0, 1),
(187, 'The National Co-operative Bank Ltd.', 'KKBN', 1, 1, 1, 1),
(188, 'The Pandharpur Urban Co Op. Bank Ltd. Pandharpur', 'ICPU', 1, 1, 1, 1),
(189, 'The Ratnakar Bank Ltd', 'RATN', 1, 1, 1, 1),
(190, 'The Royal Bank of Scotland N.V.', 'ABNA', 0, 1, 0, 1),
(191, 'The Saraswat Co-operative Bank Ltd', 'SRCB', 1, 1, 1, 1),
(192, 'The Shamrao Vithal Cooperative Bank Ltd', 'SVCB', 0, 1, 0, 1),
(193, 'The Shirpur Peoples’ Co-op Bank Ltd', 'KKBS', 1, 1, 1, 1),
(194, 'The Surat District Co Operative Bank Ltd', 'SDCB', 1, 1, 1, 1),
(195, 'The Surat Peoples Co-Op Bank Ltd', 'SPCB', 0, 1, 0, 1),
(196, 'The Tamilnadu State Apex Cooperative Bank', 'TNSC', 0, 1, 0, 1),
(197, 'The Thane Janata Sahakari Bank Ltd', 'TJSB', 1, 1, 1, 1),
(198, 'The Varachha Co-Op. Bank Ltd', 'VARA', 1, 1, 1, 1),
(199, 'The West Bengal State Cooperative Bank Ltd', 'WBSC', 0, 1, 0, 1),
(200, 'Thrissur District Central Co-op Bank Ltd', 'TDCB', 1, 1, 1, 1),
(201, 'Tripura Gramin Bank', 'UTGB', 0, 1, 0, 1),
(202, 'UBS Ag', 'UBSW', 0, 1, 0, 1),
(203, 'UCO BANK', 'UCBA', 1, 1, 0, 1),
(204, 'Union Bank of India', 'UBIN', 1, 1, 1, 1),
(205, 'UNITED BANK OF INDIA', 'UTBI', 1, 1, 1, 1),
(206, 'Utkal Gramya Bank', 'SUUG', 1, 1, 0, 1),
(207, 'Uttar Banga Kshetriya Gramin Bank', 'CUKG', 0, 1, 0, 1),
(208, 'Uttar Bihar Gramin Bank', 'CBBB', 0, 1, 0, 1),
(209, 'Uttaranchal Gramin Bank', 'SUTG', 0, 1, 0, 1),
(210, 'Vananchal Gramin Bank', 'SVAG', 0, 1, 0, 1),
(211, 'Vidharbha Kshetriya Gramin Bank', 'CVAG', 0, 1, 0, 1),
(212, 'Vidisha Bhopal Kshetriya Gramin Bank', 'SBOG', 0, 1, 0, 1),
(213, 'VIJAYA BANK', 'VIJB', 1, 1, 0, 1),
(214, 'Vishweshwar Co-op. Bank Ltd.', 'VSBL', 1, 1, 1, 1),
(215, 'Visveshwaraya Gramin Bank', 'VIJG', 0, 1, 0, 1),
(216, 'Wainganga Krishna Gramin Bank', 'BWKG', 0, 1, 0, 1),
(217, 'Yadagiri Lakshmi Narasimha Swamy Co op Urban Bank Ltd', 'YESP', 1, 1, 1, 1),
(218, 'YES BANK', 'YESB', 1, 1, 1, 1),
(219, 'Zila Sahkari Bank Ltd Ghaziabad', 'IBKL', 0, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `it_city`
--

CREATE TABLE `it_city` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `it_city`
--

INSERT INTO `it_city` (`id`, `name`, `state_id`) VALUES
(1, 'Mumbai', 15),
(2, 'Delhi', 35),
(3, 'Bangalore', 12),
(4, 'Hyderabad', 38),
(5, 'Ahmedabad', 7),
(6, 'Chennai', 24),
(7, 'Kolkata', 28),
(8, 'Surat', 7),
(9, 'Pune', 15),
(10, 'Jaipur', 22),
(11, 'Lucknow', 27),
(12, 'Kanpur', 27),
(13, 'Nagpur', 15),
(14, 'Visakhapatnam', 1),
(15, 'Indore', 14),
(16, 'Thane', 15),
(17, 'Bhopal', 14),
(18, 'Pimpri-chinchwad', 15),
(19, 'Patna', 4),
(20, 'Vadodara', 7),
(21, 'Ghaziabad', 27),
(22, 'Ludhiana', 21),
(23, 'Coimbatore', 24),
(24, 'Agra', 27),
(25, 'Madurai', 24),
(26, 'Nashik', 15),
(27, 'Faridabad', 8),
(28, 'Meerut', 27),
(29, 'Rajkot', 7),
(30, 'Kalyan-Dombivali', 15),
(31, 'Vasai-Virar', 15),
(32, 'Varanasi', 27),
(33, 'Srinagar', 10),
(34, 'Aurangabad', 15),
(35, 'Dhanbad', 11),
(36, 'Amritsar', 21),
(37, 'Navi Mumbai', 15),
(38, 'Allahabad', 27),
(39, 'Ranchi', 11),
(40, 'Howrah?(city area)', 28),
(41, 'Jabalpur', 14),
(42, 'Gwalior', 14),
(43, 'Vijayawada', 1),
(44, 'Jodhpur', 22),
(45, 'Raipur', 5),
(46, 'Kota', 22),
(47, 'Guwahati', 3),
(48, 'Chandigarh', 32),
(49, 'Solapur', 15),
(50, 'Hubballi-Dharwad', 12),
(51, 'Tiruchirappalli', 24),
(52, 'Bareilly', 27),
(53, 'Mysore', 12),
(54, 'Tiruppur', 24),
(55, 'Gurgaon', 8),
(56, 'Aligarh', 27),
(57, 'Jalandhar', 21),
(58, 'Bhubaneswar', 20),
(59, 'Salem', 24),
(60, 'Mira-Bhayandar', 15),
(61, 'Warangal', 38),
(62, 'Thiruvananthapuram', 13),
(63, 'Guntur', 1),
(64, 'Bhiwandi', 15),
(65, 'Saharanpur', 27),
(66, 'Gorakhpur', 27),
(67, 'Bikaner', 22),
(68, 'Amravati', 15),
(69, 'Noida', 27),
(70, 'Jamshedpur', 11),
(71, 'Bhilai', 5),
(72, 'Cuttack', 20),
(73, 'Firozabad', 27),
(74, 'Kochi', 13),
(75, 'Nellore', 1),
(76, 'Bhavnagar', 7),
(77, 'Dehradun', 26),
(78, 'Durgapur', 28),
(79, 'Asansol', 28),
(80, 'Nanded', 15),
(81, 'Kolhapur', 15),
(82, 'Ajmer', 22),
(83, 'Akola', 15),
(84, 'Gulbarga', 12),
(85, 'Jamnagar', 7),
(86, 'Ujjain', 14),
(87, 'Loni', 27),
(88, 'Siliguri', 28),
(89, 'Jhansi', 27),
(90, 'Ulhasnagar', 15),
(91, 'Jumbo', 10),
(92, 'Sangli-Miraj & Kupwad', 15),
(93, 'Mangalore', 12),
(94, 'Erode', 24),
(95, 'Belgaum', 12),
(96, 'Ambattur', 24),
(97, 'Tirunelveli', 24),
(98, 'Malegaon', 15),
(99, 'Gaya', 4),
(100, 'Jalgaon', 15),
(101, 'Udaipur', 22),
(102, 'Maheshtala', 28),
(103, 'Davanagere', 12),
(104, 'Kozhikode', 13),
(105, 'Kurnool', 1),
(106, 'Rajpur Sonarpur', 28),
(107, 'Rajahmundry', 1),
(108, 'Bocaro', 11),
(109, 'South Dumdum', 28),
(110, 'Bellary', 12),
(111, 'Patiala', 21),
(112, 'Gopalpur', 28),
(113, 'Agartala', 25),
(114, 'Bhagalpur', 4),
(115, 'Muzaffarnagar', 27),
(116, 'Bhatpara', 28),
(117, 'Panihati', 28),
(118, 'Latur', 15),
(119, 'Dhule', 15),
(120, 'Tirupati', 1),
(121, 'Rohtak', 8),
(122, 'Korba', 5),
(123, 'Bhilwara', 22),
(124, 'Berhampur', 20),
(125, 'Muzaffarpur', 4),
(126, 'Ahmednagar', 15),
(127, 'Mathura', 27),
(128, 'Kollam', 13),
(129, 'Avadi', 24),
(130, 'Kadapa', 1),
(131, 'Kamarhati', 28),
(132, 'Sambalpur', 20),
(133, 'Bilaspur', 5),
(134, 'Shahjahanpur', 27),
(135, 'Satara', 15),
(136, 'Bijapur', 12),
(137, 'Rampur', 27),
(138, 'Shivamogga', 12),
(139, 'Chandrapur', 15),
(140, 'Junagadh', 7),
(141, 'Thrissur', 13),
(142, 'Alwar', 22),
(143, 'Bardhaman', 28),
(144, 'Kulti', 28),
(145, 'Kakinada', 1),
(146, 'Nizamabad', 38),
(147, 'Parbhani', 15),
(148, 'Tumkur', 12),
(149, 'Khammam', 38),
(150, 'Ozhukarai', 37),
(151, 'Bihar Sharif', 4),
(152, 'Panipat', 8),
(153, 'Darbhanga', 4),
(154, 'Bally', 28),
(155, 'Aizawl', 18),
(156, 'Dewas', 14),
(157, 'Ichalkaranji', 15),
(158, 'Karnal', 8),
(159, 'Bathinda', 21),
(160, 'Jalna', 15),
(161, 'Eluru', 1),
(162, 'Kirari Suleman Nagar', 35),
(163, 'Barasat', 28),
(164, 'Purnia', 4),
(165, 'Satna', 14),
(166, 'Mau', 27),
(167, 'Sonipat', 8),
(168, 'Farrukhabad', 27),
(169, 'Sagar', 14),
(170, 'Rourkela', 20),
(171, 'Durg', 5),
(172, 'Imphal', 16),
(173, 'Ratlam', 14),
(174, 'Hapur', 27),
(175, 'Arrah', 4),
(176, 'Karimnagar', 38),
(177, 'Anantapur', 1),
(178, 'Etawah', 27),
(179, 'Ambernath', 15),
(180, 'North Dumdum', 28),
(181, 'Bharatpur', 22),
(182, 'Begusarai', 4),
(183, 'New Delhi', 35),
(184, 'Gandhidham', 7),
(185, 'Baranagar', 28),
(186, 'Tiruvottiyur', 24),
(187, 'Pondicherry', 37),
(188, 'Cikar', 22),
(189, 'Thoothukudi', 24),
(190, 'Rewa', 14),
(191, 'Mirzapur', 27),
(192, 'Raichur', 12),
(193, 'Pali', 22),
(194, 'Ramagundam', 38),
(195, 'Haridwar', 26),
(196, 'Vijayanagaram', 1),
(197, 'Katihar', 4),
(198, 'Nagercoil', 24),
(199, 'Sri Ganganagar', 22),
(200, 'Karawal nagar', 35),
(201, 'Mango', 11),
(202, 'Thanjavur', 24),
(203, 'Bulandshahr', 27),
(204, 'Uluberia', 28),
(205, 'Murwara', 27),
(206, 'Sambhal', 27),
(207, 'Singrauli', 14),
(208, 'Nadiad', 7),
(209, 'Secunderabad', 38),
(210, 'Naihati', 28),
(211, 'Yamunanagar', 8),
(212, 'Bidhan Nagar', 28),
(213, 'Pallavaram', 24),
(214, 'Bidar', 12),
(215, 'Munger', 4),
(216, 'Panchkula', 8),
(217, 'Burhanpur', 14),
(218, 'Raurkela Industrial Township', 20),
(219, 'Kharagpur', 28),
(220, 'Dindigul', 24),
(221, 'Gandhinagar', 7),
(222, 'Hospet', 12),
(223, 'Nangloi Jat', 35),
(224, 'English Bazar', 28),
(225, 'Ongole', 1),
(226, 'Deoghar', 11),
(227, 'Chapra', 4),
(228, 'Haldia', 28),
(229, 'Khandwa', 14),
(230, 'Nandyal', 1),
(231, 'Chittoor', 1),
(232, 'Morena', 14),
(233, 'Amroha', 27),
(234, 'Anand', 7),
(235, 'Bhind', 14),
(236, 'Bhalswa Jahangir Pur', 35),
(237, 'Madhyamgram', 28),
(238, 'Bhiwani', 8),
(239, 'Navi Mumbai?Panvel Raigad', 15),
(240, 'Baharampur', 28),
(241, 'Ambala', 8),
(242, 'Morvi', 7),
(243, 'Fatehpur', 27),
(244, 'Rae Bareli', 27),
(245, 'Khora', 27),
(246, 'Bhusawal', 15),
(247, 'Orai', 27),
(248, 'Bahraich', 27),
(249, 'Vellore', 24),
(250, 'Mahesana', 7),
(251, 'Sambalpur', 20),
(252, 'Raiganj', 28),
(253, 'Sirsa', 8),
(254, 'Danapur', 4),
(255, 'Serampore', 28),
(256, 'Sultan Pur Majra', 35),
(257, 'Guna', 14),
(258, 'Junpur', 27),
(259, 'Panvel', 15),
(260, 'Shivpuri', 14),
(261, 'Surendranagar Dudhrej', 7),
(262, 'Unnao', 27),
(263, 'Hugli?and?Chinsurah', 28),
(264, 'Alappuzha', 13),
(265, 'Kottayam', 13),
(266, 'Machilipatnam', 1),
(267, 'Shimla', 9),
(268, 'Adoni', 1),
(269, 'Udupi', 12),
(270, 'Tenali', 1),
(271, 'Proddatur', 1),
(272, 'Saharsa', 4),
(273, 'Hindupur', 1),
(274, 'Sasaram', 4),
(275, 'Hajipur', 4),
(276, 'Bhimavaram', 1),
(277, 'Dehri', 4),
(278, 'Madanapalle', 1),
(279, 'Siwan', 4),
(280, 'Bettiah', 4),
(281, 'Guntakal', 1),
(282, 'Srikakulam', 1),
(283, 'Motihari', 4),
(284, 'Dharmavaram', 1),
(285, 'Gudivada', 1),
(286, 'Narasaraopet', 1),
(287, 'Suryapet', 38),
(288, 'Bagaha', 4),
(289, 'Tadipatri', 1),
(290, 'Kishanganj', 4),
(291, 'Karaikudi', 24),
(292, 'Miryalaguda', 38),
(293, 'Jamalpur', 4),
(294, 'Kavali', 1),
(295, 'Tadepalligudem', 1),
(296, 'Amaravati', 1),
(297, 'Buxar', 4),
(298, 'Jehanabad', 4),
(299, 'Aurangabad', 4);

-- --------------------------------------------------------

--
-- Table structure for table `it_commissions`
--

CREATE TABLE `it_commissions` (
  `id` int(11) NOT NULL,
  `operator_name_id` int(11) NOT NULL,
  `operator_type_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `slab_a` int(11) NOT NULL,
  `slab_b` int(11) NOT NULL,
  `slab_c` int(11) NOT NULL,
  `slab_d` int(11) NOT NULL,
  `slab_e` int(11) NOT NULL,
  `surcharge` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `type` enum('Flat','Percentage') NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `it_country`
--

CREATE TABLE `it_country` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(10) NOT NULL,
  `code_3` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `it_country`
--

INSERT INTO `it_country` (`id`, `name`, `code`, `code_3`) VALUES
(1, 'Afghanistan', 'AF', 'AFG'),
(2, 'Aland Islands', 'AX', 'ALA'),
(3, 'Albania', 'AL', 'ALB'),
(4, 'Algeria', 'DZ', 'DZA'),
(5, 'American Samoa', 'AS', 'ASM'),
(6, 'Andorra', 'AD', 'AND'),
(7, 'Angola', 'AO', 'AGO'),
(8, 'Anguilla', 'AI', 'AIA'),
(9, 'Antarctica', 'AQ', 'ATA'),
(10, 'Antigua and Barbuda', 'AG', 'ATG'),
(11, 'Argentina', 'AR', 'ARG'),
(12, 'Armenia', 'AM', 'ARM'),
(13, 'Aruba', 'AW', 'ABW'),
(14, 'Australia', 'AU', 'AUS'),
(15, 'Austria', 'AT', 'AUT'),
(16, 'Azerbaijan', 'AZ', 'AZE'),
(17, 'Bahamas', 'BS', 'BHS'),
(18, 'Bahrain', 'BH', 'BHR'),
(19, 'Bangladesh', 'BD', 'BGD'),
(20, 'Barbados', 'BB', 'BRB'),
(21, 'Belarus', 'BY', 'BLR'),
(22, 'Belgium', 'BE', 'BEL'),
(23, 'Belize', 'BZ', 'BLZ'),
(24, 'Benin', 'BJ', 'BEN'),
(25, 'Bermuda', 'BM', 'BMU'),
(26, 'Bhutan', 'BT', 'BTN'),
(27, 'Bolivia', 'BO', 'BOL'),
(28, 'Bosnia and Herzegovina', 'BA', 'BIH'),
(29, 'Botswana', 'BW', 'BWA'),
(30, 'Bouvet Island', 'BV', 'BVT'),
(31, 'Brazil', 'BR', 'BRA'),
(32, 'British Virgin Islands', 'VG', 'VGB'),
(33, 'British Indian Ocean Territory', 'IO', 'IOT'),
(34, 'Brunei Darussalam', 'BN', 'BRN'),
(35, 'Bulgaria', 'BG', 'BGR'),
(36, 'Burkina Faso', 'BF', 'BFA'),
(37, 'Burundi', 'BI', 'BDI'),
(38, 'Cambodia', 'KH', 'KHM'),
(39, 'Cameroon', 'CM', 'CMR'),
(40, 'Canada', 'CA', 'CAN'),
(41, 'Cape Verde', 'CV', 'CPV'),
(42, 'Cayman Islands', 'KY', 'CYM'),
(43, 'Central African Republic', 'CF', 'CAF'),
(44, 'Chad', 'TD', 'TCD'),
(45, 'Chile', 'CL', 'CHL'),
(46, 'China', 'CN', 'CHN'),
(47, 'Hong Kong, SAR China', 'HK', 'HKG'),
(48, 'Macao, SAR China', 'MO', 'MAC'),
(49, 'Christmas Island', 'CX', 'CXR'),
(50, 'Cocos (Keeling) Islands', 'CC', 'CCK'),
(51, 'Colombia', 'CO', 'COL'),
(52, 'Comoros', 'KM', 'COM'),
(53, 'Congo?(Brazzaville)', 'CG', 'COG'),
(54, 'Congo, (Kinshasa)', 'CD', 'COD'),
(55, 'Cook Islands', 'CK', 'COK'),
(56, 'Costa Rica', 'CR', 'CRI'),
(57, 'C?te d\'Ivoire', 'CI', 'CIV'),
(58, 'Croatia', 'HR', 'HRV'),
(59, 'Cuba', 'CU', 'CUB'),
(60, 'Cyprus', 'CY', 'CYP'),
(61, 'Czech Republic', 'CZ', 'CZE'),
(62, 'Denmark', 'DK', 'DNK'),
(63, 'Djibouti', 'DJ', 'DJI'),
(64, 'Dominica', 'DM', 'DMA'),
(65, 'Dominican Republic', 'DO', 'DOM'),
(66, 'Ecuador', 'EC', 'ECU'),
(67, 'Egypt', 'EG', 'EGY'),
(68, 'El Salvador', 'SV', 'SLV'),
(69, 'Equatorial Guinea', 'GQ', 'GNQ'),
(70, 'Eritrea', 'ER', 'ERI'),
(71, 'Estonia', 'EE', 'EST'),
(72, 'Ethiopia', 'ET', 'ETH'),
(73, 'Falkland Islands (Malvinas)', 'FK', 'FLK'),
(74, 'Faroe Islands', 'FO', 'FRO'),
(75, 'Fiji', 'FJ', 'FJI'),
(76, 'Finland', 'FI', 'FIN'),
(77, 'France', 'FR', 'FRA'),
(78, 'French Guiana', 'GF', 'GUF'),
(79, 'French Polynesia', 'PF', 'PYF'),
(80, 'French Southern Territories', 'TF', 'ATF'),
(81, 'Gabon', 'GA', 'GAB'),
(82, 'Gambia', 'GM', 'GMB'),
(83, 'Georgia', 'GE', 'GEO'),
(84, 'Germany', 'DE', 'DEU'),
(85, 'Ghana', 'GH', 'GHA'),
(86, 'Gibraltar', 'GI', 'GIB'),
(87, 'Greece', 'GR', 'GRC'),
(88, 'Greenland', 'GL', 'GRL'),
(89, 'Grenada', 'GD', 'GRD'),
(90, 'Guadeloupe', 'GP', 'GLP'),
(91, 'Guam', 'GU', 'GUM'),
(92, 'Guatemala', 'GT', 'GTM'),
(93, 'Guernsey', 'GG', 'GGY'),
(94, 'Guinea', 'GN', 'GIN'),
(95, 'Guinea-Bissau', 'GW', 'GNB'),
(96, 'Guyana', 'GY', 'GUY'),
(97, 'Haiti', 'HT', 'HTI'),
(98, 'Heard and Mcdonald Islands', 'HM', 'HMD'),
(99, 'Holy See?(Vatican City State)', 'VA', 'VAT'),
(100, 'Honduras', 'HN', 'HND'),
(101, 'Hungary', 'HU', 'HUN'),
(102, 'Iceland', 'IS', 'ISL'),
(103, 'India', 'IN', 'IND'),
(104, 'Indonesia', 'ID', 'IDN'),
(105, 'Islamic Republic of Iran', 'IR', 'IRN'),
(106, 'Iraq', 'IQ', 'IRQ'),
(107, 'Ireland', 'IE', 'IRL'),
(108, 'Isle of Man', 'IM', 'IMN'),
(109, 'Israel', 'IL', 'ISR'),
(110, 'Italy', 'IT', 'ITA'),
(111, 'Jamaica', 'JM', 'JAM'),
(112, 'Japan', 'JP', 'JPN'),
(113, 'Jersey', 'JE', 'JEY'),
(114, 'Jordan', 'JO', 'JOR'),
(115, 'Kazakhstan', 'KZ', 'KAZ'),
(116, 'Kenya', 'KE', 'KEN'),
(117, 'Kiribati', 'KI', 'KIR'),
(118, 'Korea?(North)', 'KP', 'PRK'),
(119, 'Korea?(South)', 'KR', 'KOR'),
(120, 'Kuwait', 'KW', 'KWT'),
(121, 'Kyrgyzstan', 'KG', 'KGZ'),
(122, 'Lao PDR', 'LA', 'LAO'),
(123, 'Latvia', 'LV', 'LVA'),
(124, 'Lebanon', 'LB', 'LBN'),
(125, 'Lesotho', 'LS', 'LSO'),
(126, 'Liberia', 'LR', 'LBR'),
(127, 'Libya', 'LY', 'LBY'),
(128, 'Liechtenstein', 'LI', 'LIE'),
(129, 'Lithuania', 'LT', 'LTU'),
(130, 'Luxembourg', 'LU', 'LUX'),
(131, 'Macedonia, Republic of', 'MK', 'MKD'),
(132, 'Madagascar', 'MG', 'MDG'),
(133, 'Malawi', 'MW', 'MWI'),
(134, 'Malaysia', 'MY', 'MYS'),
(135, 'Maldives', 'MV', 'MDV'),
(136, 'Mali', 'ML', 'MLI'),
(137, 'Malta', 'MT', 'MLT'),
(138, 'Marshall Islands', 'MH', 'MHL'),
(139, 'Martinique', 'MQ', 'MTQ'),
(140, 'Mauritania', 'MR', 'MRT'),
(141, 'Mauritius', 'MU', 'MUS'),
(142, 'Mayotte', 'YT', 'MYT'),
(143, 'Mexico', 'MX', 'MEX'),
(144, 'Federated States of Micronesia', 'FM', 'FSM'),
(145, 'Moldova', 'MD', 'MDA'),
(146, 'Monaco', 'MC', 'MCO'),
(147, 'Mongolia', 'MN', 'MNG'),
(148, 'Montenegro', 'ME', 'MNE'),
(149, 'Montserrat', 'MS', 'MSR'),
(150, 'Morocco', 'MA', 'MAR'),
(151, 'Mozambique', 'MZ', 'MOZ'),
(152, 'Myanmar', 'MM', 'MMR'),
(153, 'Namibia', 'NA', 'NAM'),
(154, 'Nauru', 'NR', 'NRU'),
(155, 'Nepal', 'NP', 'NPL'),
(156, 'Netherlands', 'NL', 'NLD'),
(157, 'Netherlands Antilles', 'AN', 'ANT'),
(158, 'New Caledonia', 'NC', 'NCL'),
(159, 'New Zealand', 'NZ', 'NZL'),
(160, 'Nicaragua', 'NI', 'NIC'),
(161, 'Niger', 'NE', 'NER'),
(162, 'Nigeria', 'NG', 'NGA'),
(163, 'Niue', 'NU', 'NIU'),
(164, 'Norfolk Island', 'NF', 'NFK'),
(165, 'Northern Mariana Islands', 'MP', 'MNP'),
(166, 'Norway', 'NO', 'NOR'),
(167, 'Oman', 'OM', 'OMN'),
(168, 'Pakistan', 'PK', 'PAK'),
(169, 'Palau', 'PW', 'PLW'),
(170, 'Palestinian Territory', 'PS', 'PSE'),
(171, 'Panama', 'PA', 'PAN'),
(172, 'Papua New Guinea', 'PG', 'PNG'),
(173, 'Paraguay', 'PY', 'PRY'),
(174, 'Peru', 'PE', 'PER'),
(175, 'Philippines', 'PH', 'PHL'),
(176, 'Pitcairn', 'PN', 'PCN'),
(177, 'Poland', 'PL', 'POL'),
(178, 'Portugal', 'PT', 'PRT'),
(179, 'Puerto Rico', 'PR', 'PRI'),
(180, 'Qatar', 'QA', 'QAT'),
(181, 'R?union', 'RE', 'REU'),
(182, 'Romania', 'RO', 'ROU'),
(183, 'Russian Federation', 'RU', 'RUS'),
(184, 'Rwanda', 'RW', 'RWA'),
(185, 'Saint-Barth?lemy', 'BL', 'BLM'),
(186, 'Saint Helena', 'SH', 'SHN'),
(187, 'Saint Kitts and Nevis', 'KN', 'KNA'),
(188, 'Saint Lucia', 'LC', 'LCA'),
(189, 'Saint-Martin (French part)', 'MF', 'MAF'),
(190, 'Saint Pierre and Miquelon', 'PM', 'SPM'),
(191, 'Saint Vincent and Grenadines', 'VC', 'VCT'),
(192, 'Samoa', 'WS', 'WSM'),
(193, 'San Marino', 'SM', 'SMR'),
(194, 'Sao Tome and Principe', 'ST', 'STP'),
(195, 'Saudi Arabia', 'SA', 'SAU'),
(196, 'Senegal', 'SN', 'SEN'),
(197, 'Serbia', 'RS', 'SRB'),
(198, 'Seychelles', 'SC', 'SYC'),
(199, 'Sierra Leone', 'SL', 'SLE'),
(200, 'Singapore', 'SG', 'SGP'),
(201, 'Slovakia', 'SK', 'SVK'),
(202, 'Slovenia', 'SI', 'SVN'),
(203, 'Solomon Islands', 'SB', 'SLB'),
(204, 'Somalia', 'SO', 'SOM'),
(205, 'South Africa', 'ZA', 'ZAF'),
(206, 'South Georgia and the South Sandwich Islands', 'GS', 'SGS'),
(207, 'South Sudan', 'SS', 'SSD'),
(208, 'Spain', 'ES', 'ESP'),
(209, 'Sri Lanka', 'LK', 'LKA'),
(210, 'Sudan', 'SD', 'SDN'),
(211, 'Suriname', 'SR', 'SUR'),
(212, 'Svalbard and Jan Mayen Islands', 'SJ', 'SJM'),
(213, 'Swaziland', 'SZ', 'SWZ'),
(214, 'Sweden', 'SE', 'SWE'),
(215, 'Switzerland', 'CH', 'CHE'),
(216, 'Syrian Arab Republic?(Syria)', 'SY', 'SYR'),
(217, 'Taiwan, Republic of China', 'TW', 'TWN'),
(218, 'Tajikistan', 'TJ', 'TJK'),
(219, 'United Republic of Tanzania', 'TZ', 'TZA'),
(220, 'Thailand', 'TH', 'THA'),
(221, 'Timor-Leste', 'TL', 'TLS'),
(222, 'Togo', 'TG', 'TGO'),
(223, 'Tokelau', 'TK', 'TKL'),
(224, 'Tonga', 'TO', 'TON'),
(225, 'Trinidad and Tobago', 'TT', 'TTO'),
(226, 'Tunisia', 'TN', 'TUN'),
(227, 'Turkey', 'TR', 'TUR'),
(228, 'Turkmenistan', 'TM', 'TKM'),
(229, 'Turks and Caicos Islands', 'TC', 'TCA'),
(230, 'Tuvalu', 'TV', 'TUV'),
(231, 'Uganda', 'UG', 'UGA'),
(232, 'Ukraine', 'UA', 'UKR'),
(233, 'United Arab Emirates', 'AE', 'ARE'),
(234, 'United Kingdom', 'GB', 'GBR'),
(235, 'United States of America', 'US', 'USA'),
(236, 'US Minor Outlying Islands', 'UM', 'UMI'),
(237, 'Uruguay', 'UY', 'URY'),
(238, 'Uzbekistan', 'UZ', 'UZB'),
(239, 'Vanuatu', 'VU', 'VUT'),
(240, 'Venezuela?(Bolivarian Republic)', 'VE', 'VEN'),
(241, 'Viet Nam', 'VN', 'VNM'),
(242, 'Virgin Islands, US', 'VI', 'VIR'),
(243, 'Wallis and Futuna Islands', 'WF', 'WLF'),
(244, 'Western Sahara', 'EH', 'ESH'),
(245, 'Yemen', 'YE', 'YEM'),
(246, 'Zambia', 'ZM', 'ZMB'),
(247, 'Zimbabwe', 'ZW', 'ZWE');

-- --------------------------------------------------------

--
-- Table structure for table `it_departments`
--

CREATE TABLE `it_departments` (
  `deptid` int(10) NOT NULL,
  `deptname` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `depthidden` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `it_invoice`
--

CREATE TABLE `it_invoice` (
  `id` int(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_amt` int(11) NOT NULL,
  `paid_amt` int(11) NOT NULL,
  `balance_amt` int(11) NOT NULL,
  `payment_type` enum('Cash','Card','Wallet','Online') NOT NULL,
  `trans_id` varchar(200) NOT NULL,
  `pg_trans_id` varchar(200) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `tax_id` int(11) NOT NULL,
  `sgst` int(11) NOT NULL,
  `cgst` int(11) NOT NULL,
  `igst` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `it_invoice_list`
--

CREATE TABLE `it_invoice_list` (
  `id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `it_news`
--

CREATE TABLE `it_news` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `desc` varchar(250) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `it_operator`
--

CREATE TABLE `it_operator` (
  `id` int(11) NOT NULL,
  `api_id` int(11) NOT NULL,
  `operator_name_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `commission` int(11) NOT NULL,
  `surcharge` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `margin_type` enum('flat','perc') NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `it_operator`
--

INSERT INTO `it_operator` (`id`, `api_id`, `operator_name_id`, `type_id`, `commission`, `surcharge`, `created_date`, `modified_date`, `margin_type`, `status`) VALUES
(1, 1, 1, 1, 0, 0, '2018-07-14 12:00:00', '2018-07-14 12:00:00', 'flat', '1'),
(2, 1, 2, 1, 0, 0, '2018-07-15 12:00:00', '2018-07-15 12:00:00', 'flat', '1'),
(3, 1, 3, 1, 0, 0, '2018-07-16 12:00:00', '2018-07-16 12:00:00', 'flat', '1'),
(4, 1, 4, 1, 0, 0, '2018-07-17 12:00:00', '2018-07-17 12:00:00', 'flat', '1'),
(5, 1, 5, 1, 0, 0, '2018-07-18 12:00:00', '2018-07-18 12:00:00', 'flat', '1'),
(6, 1, 6, 1, 0, 0, '2018-07-19 12:00:00', '2018-07-19 12:00:00', 'flat', '1'),
(7, 1, 7, 1, 0, 0, '2018-07-20 12:00:00', '2018-07-20 12:00:00', 'flat', '1'),
(8, 1, 8, 1, 0, 0, '2018-07-21 12:00:00', '2018-07-21 12:00:00', 'flat', '1'),
(9, 1, 9, 1, 0, 0, '2018-07-22 12:00:00', '2018-07-22 12:00:00', 'flat', '1'),
(10, 1, 10, 1, 0, 0, '2018-07-23 12:00:00', '2018-07-23 12:00:00', 'flat', '1'),
(11, 1, 11, 1, 0, 0, '2018-07-24 12:00:00', '2018-07-24 12:00:00', 'flat', '1'),
(12, 1, 12, 1, 0, 0, '2018-07-25 12:00:00', '2018-07-25 12:00:00', 'flat', '1'),
(13, 1, 13, 1, 0, 0, '2018-07-26 12:00:00', '2018-07-26 12:00:00', 'flat', '1'),
(14, 1, 14, 1, 0, 0, '2018-07-27 12:00:00', '2018-07-27 12:00:00', 'flat', '1'),
(15, 1, 15, 1, 0, 0, '2018-07-28 12:00:00', '2018-07-28 12:00:00', 'flat', '1'),
(16, 1, 16, 1, 0, 0, '2018-07-29 12:00:00', '2018-07-29 12:00:00', 'flat', '1'),
(17, 1, 17, 1, 0, 0, '2018-07-30 12:00:00', '2018-07-30 12:00:00', 'flat', '1'),
(18, 1, 18, 1, 0, 0, '2018-07-31 12:00:00', '2018-07-31 12:00:00', 'flat', '1'),
(19, 1, 19, 1, 0, 0, '2018-08-01 12:00:00', '2018-08-01 12:00:00', 'flat', '1'),
(20, 1, 20, 1, 0, 0, '2018-08-02 12:00:00', '2018-08-02 12:00:00', 'flat', '1'),
(21, 1, 21, 1, 0, 0, '2018-08-03 12:00:00', '2018-08-03 12:00:00', 'flat', '1'),
(22, 1, 22, 1, 0, 0, '2018-08-04 12:00:00', '2018-08-04 12:00:00', 'flat', '1'),
(23, 1, 23, 1, 0, 0, '2018-08-05 12:00:00', '2018-08-05 12:00:00', 'flat', '1'),
(30, 1, 1, 2, 0, 0, '2018-07-12 13:31:00', '2018-07-24 04:16:19', 'perc', '1'),
(31, 1, 3, 2, 0, 0, '2018-07-12 13:31:00', '2018-07-24 04:16:19', 'perc', '1'),
(32, 1, 6, 2, 0, 0, '2018-07-12 13:31:00', '2018-07-24 04:16:19', 'perc', '1'),
(33, 1, 11, 2, 0, 0, '2018-07-12 13:31:00', '2018-07-24 04:16:19', 'perc', '1'),
(34, 1, 10, 2, 0, 0, '2018-07-12 13:31:00', '2018-07-24 04:16:19', 'perc', '1'),
(35, 1, 2, 2, 0, 0, '2018-07-12 13:31:00', '2018-07-24 04:16:19', 'perc', '1'),
(36, 1, 18, 2, 0, 0, '2018-07-12 13:31:00', '2018-07-24 04:16:19', 'perc', '1'),
(37, 1, 8, 2, 0, 0, '2018-07-12 13:31:00', '2018-07-24 04:16:19', 'perc', '1'),
(38, 1, 12, 2, 0, 0, '2018-07-12 13:31:00', '2018-07-24 04:16:19', 'perc', '1'),
(39, 1, 9, 2, 0, 0, '2018-07-12 13:31:00', '2018-07-24 04:16:19', 'perc', '1'),
(40, 1, 24, 4, 0, 0, '2018-07-06 10:27:29', '2018-07-12 10:23:25', 'flat', '1'),
(41, 1, 25, 4, 0, 0, '2018-07-06 10:27:29', '2018-07-12 10:23:25', 'flat', '1'),
(42, 1, 26, 4, 0, 0, '2018-07-06 10:27:29', '2018-07-12 10:23:25', 'flat', '1'),
(43, 1, 27, 4, 0, 0, '2018-07-06 10:27:29', '2018-07-12 10:23:25', 'flat', '1'),
(44, 1, 28, 4, 0, 0, '2018-07-06 10:27:29', '2018-07-12 10:23:25', 'flat', '1'),
(45, 1, 29, 4, 0, 0, '2018-07-06 10:27:29', '2018-07-12 10:23:25', 'flat', '1'),
(46, 1, 30, 5, 0, 0, '2018-07-14 12:00:00', '2018-07-14 12:00:00', 'flat', '1'),
(47, 1, 31, 5, 0, 0, '2018-07-15 12:00:00', '2018-07-15 12:00:00', 'flat', '1'),
(48, 1, 32, 5, 0, 0, '2018-07-16 12:00:00', '2018-07-16 12:00:00', 'flat', '1'),
(49, 1, 33, 5, 0, 0, '2018-07-17 12:00:00', '2018-07-17 12:00:00', 'flat', '1'),
(50, 1, 34, 5, 0, 0, '2018-07-18 12:00:00', '2018-07-18 12:00:00', 'flat', '1'),
(51, 1, 35, 5, 0, 0, '2018-07-19 12:00:00', '2018-07-19 12:00:00', 'flat', '1'),
(52, 1, 36, 5, 0, 0, '2018-07-20 12:00:00', '2018-07-20 12:00:00', 'flat', '1'),
(53, 1, 37, 5, 0, 0, '2018-07-21 12:00:00', '2018-07-21 12:00:00', 'flat', '1'),
(54, 1, 38, 5, 0, 0, '2018-07-22 12:00:00', '2018-07-22 12:00:00', 'flat', '1'),
(55, 1, 39, 5, 0, 0, '2018-07-23 12:00:00', '2018-07-23 12:00:00', 'flat', '1'),
(56, 1, 40, 5, 0, 0, '2018-07-24 12:00:00', '2018-07-24 12:00:00', 'flat', '1'),
(57, 1, 41, 5, 0, 0, '2018-07-25 12:00:00', '2018-07-25 12:00:00', 'flat', '1'),
(58, 1, 42, 5, 0, 0, '2018-07-26 12:00:00', '2018-07-26 12:00:00', 'flat', '1'),
(59, 1, 43, 5, 0, 0, '2018-07-27 12:00:00', '2018-07-27 12:00:00', 'flat', '1'),
(60, 1, 44, 5, 0, 0, '2018-07-28 12:00:00', '2018-07-28 12:00:00', 'flat', '1'),
(61, 1, 45, 5, 0, 0, '2018-07-29 12:00:00', '2018-07-29 12:00:00', 'flat', '1'),
(62, 1, 46, 5, 0, 0, '2018-07-30 12:00:00', '2018-07-30 12:00:00', 'flat', '1'),
(63, 1, 50, 5, 0, 0, '2018-08-03 12:00:00', '2018-08-03 12:00:00', 'flat', '1'),
(64, 1, 51, 5, 0, 0, '2018-08-04 12:00:00', '2018-08-04 12:00:00', 'flat', '1'),
(65, 1, 52, 5, 0, 0, '2018-08-05 12:00:00', '2018-08-05 12:00:00', 'flat', '1'),
(66, 1, 53, 5, 0, 0, '2018-08-06 12:00:00', '2018-08-06 12:00:00', 'flat', '1'),
(67, 1, 54, 5, 0, 0, '2018-08-07 12:00:00', '2018-08-07 12:00:00', 'flat', '1'),
(68, 1, 55, 5, 0, 0, '2018-08-08 12:00:00', '2018-08-08 12:00:00', 'flat', '1'),
(69, 1, 56, 5, 0, 0, '2018-08-09 12:00:00', '2018-08-09 12:00:00', 'flat', '1'),
(70, 1, 57, 5, 0, 0, '2018-08-10 12:00:00', '2018-08-10 12:00:00', 'flat', '1'),
(71, 1, 58, 5, 0, 0, '2018-08-11 12:00:00', '2018-08-11 12:00:00', 'flat', '1'),
(72, 1, 59, 5, 0, 0, '2018-08-12 12:00:00', '2018-08-12 12:00:00', 'flat', '1'),
(73, 1, 60, 5, 0, 0, '2018-08-13 12:00:00', '2018-08-13 12:00:00', 'flat', '1'),
(74, 1, 61, 5, 0, 0, '2018-08-14 12:00:00', '2018-08-14 12:00:00', 'flat', '1'),
(75, 1, 62, 5, 0, 0, '2018-08-15 12:00:00', '2018-08-15 12:00:00', 'flat', '1'),
(76, 1, 63, 5, 0, 0, '2018-08-16 12:00:00', '2018-08-16 12:00:00', 'flat', '1'),
(77, 1, 64, 5, 0, 0, '2018-08-17 12:00:00', '2018-08-17 12:00:00', 'flat', '1'),
(78, 1, 65, 5, 0, 0, '2018-08-18 12:00:00', '2018-08-18 12:00:00', 'flat', '1'),
(79, 1, 66, 5, 0, 0, '2018-08-19 12:00:00', '2018-08-19 12:00:00', 'flat', '1'),
(80, 1, 67, 5, 0, 0, '2018-08-20 12:00:00', '2018-08-20 12:00:00', 'flat', '1'),
(81, 1, 68, 5, 0, 0, '2018-08-21 12:00:00', '2018-08-21 12:00:00', 'flat', '1'),
(82, 1, 69, 5, 0, 0, '2018-08-22 12:00:00', '2018-08-22 12:00:00', 'flat', '1'),
(83, 1, 70, 5, 0, 0, '2018-08-23 12:00:00', '2018-08-23 12:00:00', 'flat', '1'),
(84, 1, 71, 5, 0, 0, '2018-08-24 12:00:00', '2018-08-24 12:00:00', 'flat', '1'),
(85, 1, 72, 5, 0, 0, '2018-08-25 12:00:00', '2018-08-25 12:00:00', 'flat', '1'),
(86, 1, 73, 5, 0, 0, '2018-08-26 12:00:00', '2018-08-26 12:00:00', 'flat', '1'),
(87, 1, 74, 5, 0, 0, '2018-08-27 12:00:00', '2018-08-27 12:00:00', 'flat', '1'),
(88, 1, 84, 5, 0, 0, '2018-08-28 12:00:00', '2018-08-28 12:00:00', 'flat', '1'),
(89, 1, 85, 5, 0, 0, '2018-08-29 12:00:00', '2018-08-29 12:00:00', 'flat', '1'),
(90, 1, 86, 5, 0, 0, '2018-08-30 12:00:00', '2018-08-30 12:00:00', 'flat', '1'),
(91, 1, 87, 5, 0, 0, '2018-08-31 12:00:00', '2018-08-31 12:00:00', 'flat', '1'),
(92, 1, 88, 5, 0, 0, '2018-09-01 12:00:00', '2018-09-01 12:00:00', 'flat', '1'),
(93, 1, 89, 5, 0, 0, '2018-09-02 12:00:00', '2018-09-02 12:00:00', 'flat', '1'),
(94, 1, 90, 5, 0, 0, '2018-09-03 12:00:00', '2018-09-03 12:00:00', 'flat', '1'),
(95, 1, 91, 5, 0, 0, '2018-09-04 12:00:00', '2018-09-04 12:00:00', 'flat', '1'),
(96, 1, 92, 5, 0, 0, '2018-09-05 12:00:00', '2018-09-05 12:00:00', 'flat', '1'),
(97, 1, 93, 5, 0, 0, '2018-09-06 12:00:00', '2018-09-06 12:00:00', 'flat', '1'),
(98, 1, 94, 5, 0, 0, '2018-09-07 12:00:00', '2018-09-07 12:00:00', 'flat', '1'),
(99, 1, 75, 6, 0, 0, '2018-09-08 12:00:00', '2018-09-08 12:00:00', 'flat', '1'),
(100, 1, 76, 6, 0, 0, '2018-09-09 12:00:00', '2018-09-09 12:00:00', 'flat', '1'),
(101, 1, 77, 6, 0, 0, '2018-09-10 12:00:00', '2018-09-10 12:00:00', 'flat', '1'),
(102, 1, 78, 6, 0, 0, '2018-09-11 12:00:00', '2018-09-11 12:00:00', 'flat', '1'),
(103, 1, 79, 6, 0, 0, '2018-09-12 12:00:00', '2018-09-12 12:00:00', 'flat', '1'),
(104, 1, 80, 6, 0, 0, '2018-09-13 12:00:00', '2018-09-13 12:00:00', 'flat', '1'),
(105, 1, 83, 6, 0, 0, '2018-09-14 12:00:00', '2018-09-14 12:00:00', 'flat', '1'),
(106, 1, 81, 7, 0, 0, '2018-09-15 12:00:00', '2018-09-15 12:00:00', 'flat', '1'),
(107, 1, 82, 7, 0, 0, '2018-09-16 12:00:00', '2018-09-16 12:00:00', 'flat', '1'),
(108, 1, 95, 8, 0, 0, '2018-09-17 12:00:00', '2018-09-17 12:00:00', 'flat', '1'),
(109, 1, 106, 8, 0, 0, '2018-09-18 12:00:00', '2018-09-18 12:00:00', 'flat', '1'),
(110, 1, 107, 8, 0, 0, '2018-09-19 12:00:00', '2018-09-19 12:00:00', 'flat', '1'),
(111, 1, 108, 8, 0, 0, '2018-09-20 12:00:00', '2018-09-20 12:00:00', 'flat', '1'),
(112, 1, 3, 9, 0, 0, '2018-07-27 09:25:24', '2018-07-27 10:25:27', 'flat', '1'),
(113, 1, 11, 9, 0, 0, '2018-07-27 13:30:35', '2018-07-27 10:28:28', 'flat', '1'),
(114, 1, 23, 9, 0, 0, '2018-07-27 11:29:30', '2018-07-27 11:29:29', 'flat', '1'),
(115, 1, 4, 9, 0, 0, '2018-07-27 11:26:32', '2018-07-27 12:29:32', 'flat', '1'),
(116, 1, 12, 9, 0, 0, '2018-07-27 13:31:31', '2018-07-27 12:29:32', 'flat', '1');

-- --------------------------------------------------------

--
-- Table structure for table `it_operator_city`
--

CREATE TABLE `it_operator_city` (
  `id` int(11) NOT NULL,
  `opertor_id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `validator_1` varchar(255) NOT NULL,
  `validator_2` varchar(255) NOT NULL,
  `validator_3` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `it_operator_city`
--

INSERT INTO `it_operator_city` (`id`, `opertor_id`, `city`, `validator_1`, `validator_2`, `validator_3`, `status`) VALUES
(1, 30, 'Rajasthan', 'K Number Starts With 1', '', '', '1'),
(2, 31, 'Mumbai', 'Consumer Number', '', '', '1'),
(3, 32, 'Chhattisgarh', 'Business Partner No', '', '', '1'),
(4, 33, 'Rajasthan', 'K Number Starts With 2', '', '', '1'),
(5, 34, 'Rajasthan', 'K Number Starts With 3', '', '', '1'),
(6, 35, 'Mumbai', 'Account Number', 'Cycle No', '', '1'),
(7, 36, 'Gujarat', 'Consumer Number', '', '', '1'),
(8, 37, 'Bhopal', 'Consumer Number', '', '', '1'),
(9, 38, 'Indore', 'Consumer Number', '', '', '1'),
(10, 39, 'Jabalpur', 'Consumer Number', '', '', '1'),
(11, 40, 'Delhi', 'Consumer Number', '', '', '1'),
(12, 41, 'Delhi', 'Consumer Number', '', '', '1'),
(13, 42, 'Delhi', 'CA Number', '', '', '1'),
(14, 43, 'Kolkata', 'Consumer Id', '', '', '1'),
(15, 44, 'Karnataka', 'Please Enter Valid Customer ID / Account ID', '', '', '1'),
(16, 45, 'Jharkhand', 'Business Partner Number', '', '', '1'),
(17, 46, 'Agra', 'Service Number', 'Account No', '', '1'),
(18, 50, 'Maharastra', 'Consumer Number', 'Billing Unit', '', '1'),
(19, 51, 'Bihar', 'Consumer Number', '', '', '1'),
(20, 52, 'Meghalaya', 'Consumer ID', '', '', '1'),
(21, 53, 'Delhi', 'CA Number', '', '', '1'),
(22, 54, 'Assam', 'Consumer ID', '', '', '1'),
(23, 55, 'Bharatpur', 'K number', '', '', '1'),
(24, 56, 'Bikaner', 'K number', '', '', '1'),
(25, 57, 'Daman and Diu', 'Account number', '', '', '1'),
(26, 58, 'Gujarat', 'Consumer Number', '', '', '1'),
(27, 59, 'Dadra Nagar Haveli', 'Service Connection Number', '', '', '1'),
(28, 60, 'Andhra Pradesh', 'Service No.', '', '', '1'),
(29, 61, 'Kota', 'K number', '', '', '1'),
(30, 62, 'Kanpur', 'Account Number', '', '', '1'),
(31, 63, 'Orrisa', 'Consumer Number', '', '', '1'),
(32, 64, 'Gujarat', 'Consumer Number', '', '', '1'),
(33, 65, 'Andhra Pradesh', 'Service Number', '', '', '1'),
(34, 66, 'Mumbai', 'CA Number', '', '', '1'),
(35, 67, 'Tripura', 'Consumer ID', '', '', '1'),
(36, 68, 'Gujarat', 'Consumer Number', '', '', '1'),
(37, 69, 'Bhiwadi', 'CUSTOMER ID', '', '', '1'),
(38, 70, 'Uttarakhand', 'Service Connection Number', '', '', '1'),
(39, 71, 'Muzaffarpur', 'Consumer No', '', '', '1'),
(40, 72, 'Bihar', 'CA Number', '', '', '1'),
(41, 73, 'Bihar', 'CA Number', '', '', '1'),
(42, 74, 'Maharastra', 'Consumer Number', 'Billing Unit', '', '1'),
(43, 75, 'Gujarat', 'Customer ID', '', '', '1'),
(44, 76, 'Gujarat', 'CA Number', '', '', '1'),
(45, 77, 'Delhi', 'BP Number', '', '', '1'),
(46, 78, 'Mumbai', 'CA Number', '', '', '1'),
(47, 79, 'Haryana', 'CRN Number', '', '', '1'),
(48, 80, 'Tripura', 'CONSUMER NO.', '', '', '1'),
(49, 81, 'Delhi', 'K No', '', '', '1'),
(50, 82, 'Gurgaon', 'K No', '', '', '1'),
(51, 83, 'Pune', 'BP Number', '', '', '1'),
(52, 84, 'Ajmer', 'K Number', '', '', '1'),
(53, 85, 'Haryana', 'Account Number', 'Mobile Number', '', '1'),
(54, 86, 'West Bengal', 'Consumer ID', 'Mobile Number', '', '1'),
(55, 87, 'Karnataka', 'CUSTOMER ID', '', '', '1'),
(56, 88, 'Haryana', 'Account Number', 'Mobile Number', '', '1'),
(57, 89, 'Karnataka', 'Consumer Number', '', '', '1'),
(58, 90, 'Karnataka', 'Consumer Number', '', '', '1'),
(59, 91, 'Jharkhand', 'Consumer Number', 'Enter Sub-Division', '', '1'),
(60, 92, 'Punjab', 'Account Number', '', '', '1'),
(61, 93, 'NAGPUR', 'Consumer Number', '', '', '1'),
(62, 94, 'Tamil Nadu', 'Consumer Number', '', '', '1'),
(63, 95, 'Bengaluru', 'ACCOUNTNO/USER NAME#ACCOUNTNO#STATE#SUBSCRIBERNAME', '', '', '1'),
(64, 95, 'Chennai', 'ACCOUNTNO/USER NAME#ACCOUNTNO#STATE#SUBSCRIBERNAME', '', '', '1'),
(65, 106, 'Punjab & Chandigarh', 'Directory Number#Alternate Number\n(Registered Mobile number)\n#Customer name#Account number#email_id#\n', '', '', '1'),
(66, 107, 'National', 'Customer ID', '', '', '1'),
(67, 108, 'National', 'Service Id', '', '', '1'),
(68, 46, 'Ahmedabad', 'Service Number', 'Account No', '', '1'),
(69, 46, 'Surat', 'Service Number', 'Account No', '', '1'),
(70, 46, 'Bhiwandi', 'Service Number', 'Account No', '', '1'),
(71, 95, 'Hyderabad', 'ACCOUNTNO/USER NAME#ACCOUNTNO#STATE#SUBSCRIBERNAME', '', '', '1'),
(72, 95, 'Delhi', 'ACCOUNTNO/USER NAME#ACCOUNTNO#STATE#SUBSCRIBERNAME', '', '', '1'),
(73, 95, 'Coimbatore', 'ACCOUNTNO/USER NAME#ACCOUNTNO#STATE#SUBSCRIBERNAME', '', '', '1'),
(74, 95, 'Vijayawada', 'ACCOUNTNO/USER NAME#ACCOUNTNO#STATE#SUBSCRIBERNAME', '', '', '1'),
(75, 95, 'Guntur', 'ACCOUNTNO/USER NAME#ACCOUNTNO#STATE#SUBSCRIBERNAME', '', '', '1'),
(76, 95, 'Nellore', 'ACCOUNTNO/USER NAME#ACCOUNTNO#STATE#SUBSCRIBERNAME', '', '', '1'),
(77, 95, 'Tirupati', 'ACCOUNTNO/USER NAME#ACCOUNTNO#STATE#SUBSCRIBERNAME', '', '', '1'),
(78, 95, 'Eluru', 'ACCOUNTNO/USER NAME#ACCOUNTNO#STATE#SUBSCRIBERNAME', '', '', '1'),
(79, 95, 'Visakhapatnam', 'ACCOUNTNO/USER NAME#ACCOUNTNO#STATE#SUBSCRIBERNAME', '', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `it_operator_names`
--

CREATE TABLE `it_operator_names` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `it_operator_names`
--

INSERT INTO `it_operator_names` (`id`, `name`, `status`) VALUES
(1, 'Vodafone', '1'),
(2, 'Idea', '1'),
(3, 'AIRTEL', '1'),
(4, 'TATA INDICOM', '1'),
(5, 'TELENOR', '1'),
(6, 'AIRCEL', '1'),
(7, 'VIDEOCON', '1'),
(8, 'MTS', '1'),
(9, 'RELIANCE GSM', '1'),
(10, 'TATA DOCOMO', '1'),
(11, 'BSNL', '1'),
(12, 'RELIANCE CDMA', '1'),
(13, 'BSNL STV', '1'),
(14, 'TATA DOCOMO STV', '1'),
(15, 'TELENOR STV', '1'),
(16, 'VIDEOCON STV', '1'),
(17, 'MTNL DEL STV', '1'),
(18, 'Jio', '1'),
(19, 'T24', '1'),
(20, 'T24 STV', '1'),
(21, 'MTNL MUM', '1'),
(22, 'MTNL MUM STV', '1'),
(23, 'MTNL DEL', '1'),
(24, 'DISH TV', '1'),
(25, 'TATA SKY', '1'),
(26, 'SUN TV', '1'),
(27, 'VIDEOCON D2H TV', '1'),
(28, 'RELIANCE BIG TV', '1'),
(29, 'AIRTEL DEGITAL TV', '1'),
(30, 'Ajmer Vidyut Vitran Nigam Ltd', '1'),
(31, 'Brihan Mumbai Electric Supply and Transport Undertaking', '1'),
(32, 'Chhattisgarh State Electricity Board', '1'),
(33, 'Jaipur Vidyut Vitran Nigam Ltd', '1'),
(34, 'Jodhpur Vidyut Vitran Nigam Ltd', '1'),
(35, 'Reliance Energy Limited', '1'),
(36, 'Madhya Gujarat Vij Company Limited', '1'),
(37, 'Madhya Pradesh Madhya Kshetra Vidyut Vitaran Company Limited - Bhopal', '1'),
(38, 'Madhya Pradesh Paschim Kshetra Vidyut Vitaran Co. Ltd -Indore', '1'),
(39, 'Madhya Pradesh Poorv Kshetra Vidyut Vitaran Company Limited(MPPKVVCL)-Jabalpur', '1'),
(40, 'Noida Power Company Limited', '1'),
(41, 'BSES Yamuna Power Limited', '1'),
(42, 'BSES Rajdhani Power Limited', '1'),
(43, 'CESC LTD', '1'),
(44, 'Bangalore Electricity Supply Co. Ltd (BESCOM)', '1'),
(45, 'Jamshedpur Utilities and Services Company Limited', '1'),
(46, 'Torrent power', '1'),
(50, 'MSEDCL Ltd. ', '1'),
(51, 'India Power Corporation Limited', '1'),
(52, 'Meghalaya Power Distribution Corporation Ltd', '1'),
(53, 'Tata Power-DDL', '1'),
(54, 'Assam Power Distribution Company Ltd (APDCL RAPDR)', '1'),
(55, 'Bharatpur Electricity Services Ltd.', '1'),
(56, 'Bikaner Electricity Supply Limited (BkESL),', '1'),
(57, 'Daman and Diu Electricity Department', '1'),
(58, 'Dakshin Gujarat Vij Company Limited', '1'),
(59, 'DNH Power Distribution Company Limited', '1'),
(60, 'Eastern Power Distribution Company of Andhra Pradesh Limited.', '1'),
(61, 'Kota Electricity Distribution Ltd.', '1'),
(62, 'Kanpur Electricity Supply Company Ltd', '1'),
(63, 'ODISHA Discoms', '1'),
(64, 'Paschim Gujarat Vij Company Limited ', '1'),
(65, 'Southern power Distribution Company Ltd of Andhra Pradesh', '1'),
(66, 'Tata Power -Mumbai', '1'),
(67, 'Tripura State Electricity Corporation Ltd', '1'),
(68, 'Uttar Gujarat Vij Company Limited ', '1'),
(69, 'UIT Bhiwadi', '1'),
(70, 'Uttarakhand Power Corporation Limited', '1'),
(71, 'Muzaffarpur Vidyut Vitran Limited', '1'),
(72, 'North Bihar Power Distribution Company Ltd.', '1'),
(73, 'South Bihar Power Distribution Company Ltd.', '1'),
(74, 'Mahavitaran-Maharashtra State Electricity Distribution Company Ltd.', '1'),
(75, 'Adani Gas', '1'),
(76, 'Gujrat Gas company Limited', '1'),
(77, 'Indraprasth Gas', '1'),
(78, 'Mahanagar Gas Limited ', '1'),
(79, 'Haryana City gas', '1'),
(80, 'Tripura Natural Gas Company Ltd', '1'),
(81, 'Delhi Jal Board', '1'),
(82, 'Municipal Corporation of Gurugram', '1'),
(83, 'Maharashtra Natural Gas Limited ', '1'),
(84, 'TP Ajmer Distribution Ltd. ', '1'),
(85, 'Uttar Haryana Bijli Vitran Nigam', '1'),
(86, 'West Bengal Electricity (consolidated)', '1'),
(87, 'Chamundeshwari Electricity Supply Corp Ltd (CESCOM)', '1'),
(88, 'Dakshin Haryana Bijli Vitran Nigam (DHBVN)', '1'),
(89, 'Gulbarga Electricity Supply Company Limited', '1'),
(90, 'Hubli Electricity Supply Company Ltd (HESCOM)', '1'),
(91, 'Jharkhand Bijli Vitran Nigam Limited (JBVNL)', '1'),
(92, 'Punjab State Power Corporation Ltd (PSPCL)', '1'),
(93, 'SNDL Nagpur', '1'),
(94, 'Tamil Nadu Electricity Board (TNEB)', '1'),
(95, 'ACT FIBERNET', '1'),
(106, 'Connect Broadband', '1'),
(107, 'Hathway Broadband', '1'),
(108, 'Tikona Digital Networks Private Limited', '1');

-- --------------------------------------------------------

--
-- Table structure for table `it_operator_type`
--

CREATE TABLE `it_operator_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `it_operator_type`
--

INSERT INTO `it_operator_type` (`id`, `name`, `status`) VALUES
(1, 'Recharge Prepaid', '1'),
(2, 'Recharge Postpaid', '1'),
(3, 'Datacard', '1'),
(4, 'DTH', '1'),
(5, 'Electricity', '1'),
(6, 'Gas', '1'),
(7, 'Water', '1'),
(8, 'Broadband', '1'),
(9, 'Landline', '1');

-- --------------------------------------------------------

--
-- Table structure for table `it_pages`
--

CREATE TABLE `it_pages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `short_desc` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `type` enum('Blog','Page') NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `status` enum('0','1') NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `it_permissions`
--

CREATE TABLE `it_permissions` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `permission_type_id` int(20) NOT NULL,
  `insert` enum('0','1') NOT NULL,
  `edit` enum('0','1') NOT NULL,
  `view` enum('0','1') NOT NULL,
  `remove` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `it_products`
--

CREATE TABLE `it_products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `pro_desc` longtext NOT NULL,
  `short_desc` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `main_pic` varchar(255) NOT NULL,
  `unit_price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `alert_quantity` varchar(255) NOT NULL,
  `gallery` longtext NOT NULL,
  `unit_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `tax_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `it_product_attribute`
--

CREATE TABLE `it_product_attribute` (
  `id` int(11) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `it_product_cat`
--

CREATE TABLE `it_product_cat` (
  `id` int(11) NOT NULL,
  `cat_parent_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_pic` varchar(255) NOT NULL,
  `cat_desc` longtext NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `it_product_color`
--

CREATE TABLE `it_product_color` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `it_product_review`
--

CREATE TABLE `it_product_review` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `star` int(11) NOT NULL,
  `review` varchar(255) NOT NULL,
  `status` enum('Active','Rejected','Pending','') NOT NULL,
  `iser_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `it_product_unit`
--

CREATE TABLE `it_product_unit` (
  `td` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `calculation` enum('Add','Subtract','Multiply','Divide') NOT NULL,
  `parent_unit_id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `it_setting`
--

CREATE TABLE `it_setting` (
  `id` int(122) UNSIGNED NOT NULL,
  `keys` varchar(255) DEFAULT NULL,
  `value` longtext,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `it_setting`
--

INSERT INTO `it_setting` (`id`, `keys`, `value`, `user_id`) VALUES
(1, 'website', 'itcarewallet.com', 8),
(2, 'logo', 'logo-itcare-dark_1532086536.png', 8),
(3, 'favicon', 'favicon_1532086536.png', 8),
(4, 'SMTP_EMAIL', 'php@bgc.ooo', 8),
(5, 'HOST', 'smtp.gmail.com', 8),
(6, 'PORT', '465', 8),
(7, 'SMTP_SECURE', 'SSL', 8),
(8, 'SMTP_PASSWORD', 'test123', 8),
(9, 'mail_setting', 'simple_mail', 8),
(10, 'company_name', 'ITCARE WALLET', 8),
(11, 'crud_list', 'users,User', 8),
(12, 'EMAIL', 'care@bgc.ooo', 8),
(13, 'UserModules', 'yes', 8),
(14, 'register_allowed', '1', 8),
(15, 'email_invitation', '1', 8),
(16, 'admin_approval', '0', 8),
(17, 'user_type', '["Member"]', 8),
(18, 'version', '1.0', 8),
(19, 'company_api_url', 'http://localhost/itcare.net', 8),
(20, 'api_key', '88a843b6dfedecc66dd699716b537bac', 8),
(21, 'title1', 'ITCARE', 8),
(22, 'title2', 'WALLET', 8),
(23, 'menu', '[{"text":"Dashboard","href":"dashboard","icon":"fa fa-dashboard","target":"_self","title":"Dashboard","permission_type":"","segmentNo":"1","segmentName":""},{"text":"Fund management","href":"#","icon":"fa fa-inr","target":"_self","title":"","permission_type":"","segmentNo":"","segmentName":"","children":[{"text":"Commission Slab","href":"#","icon":"fa fa-circle-o","target":"_self","title":"","permission_type":"","segmentNo":"","segmentName":""},{"text":"Admin API Balance","href":"#","icon":"fa fa-circle-o","target":"_self","title":"","permission_type":"","segmentNo":"","segmentName":""},{"text":"Debit Fund","href":"#","icon":"fa fa-circle-o","target":"_self","title":"","permission_type":"","segmentNo":"","segmentName":""}]},{"text":"User Management","href":"#","icon":"fa fa-user-secret","target":"_self","title":"","permission_type":"","segmentNo":"1","segmentName":"white-label-users","children":[{"text":"White Label","href":"white-label-users","icon":"fa fa-circle-o","target":"_self","title":"","permission_type":"","segmentNo":"1","segmentName":"white-label-users"},{"text":"API Users","href":"#","icon":"fa fa-circle-o","target":"_self","title":"","permission_type":"","segmentNo":"","segmentName":""},{"text":"Master Distributors","href":"#","icon":"fa fa-circle-o","target":"_self","title":"","permission_type":"","segmentNo":"","segmentName":""},{"text":"Area Distibutors","href":"#","icon":"fa fa-circle-o","target":"_self","title":"","permission_type":"","segmentNo":"","segmentName":""},{"text":"Agents","href":"","icon":"fa fa-circle-o","target":"_self","title":"","permission_type":"","segmentNo":"","segmentName":""},{"text":"Customers","href":"","icon":"fa fa-circle-o","target":"_self","title":"","permission_type":"","segmentNo":"","segmentName":""}]},{"text":"E-Commerce","href":"#","icon":"fa fa-pie-chart","target":"_self","title":"","permission_type":"","segmentNo":"","segmentName":"","children":[{"text":"Products","href":"#","icon":"fa fa-circle-o","target":"_self","title":"","permission_type":"","segmentNo":"","segmentName":""},{"text":"Catagory","href":"","icon":"fa fa-circle-o","target":"_self","title":"","permission_type":"","segmentNo":"","segmentName":""}]},{"text":"Communication System","href":"#","icon":"fa fa-wechat","target":"_self","title":"","permission_type":"","segmentNo":"","segmentName":""},{"text":"Reports Manager","href":"reports","icon":"fa fa-line-chart","target":"_self","title":"","permission_type":"","segmentNo":"1","segmentName":"reports"},{"text":"Settings","href":"#","icon":"fa fa-cogs","target":"_self","title":"","permission_type":"","segmentNo":"1","segmentName":"","children":[{"text":"User Permission Manager","href":"permission","icon":"fa fa-user-plus","target":"_self","title":"","permission_type":"","segmentNo":"1","segmentName":"permission"},{"text":"Sidebar Menu","href":"admin-menu","icon":"fa fa-align-justify","target":"_self","title":"","permission_type":"","segmentNo":"1","segmentName":"admin-menu1"},{"text":"Profile","href":"profile","icon":"fa fa-credit-card","target":"_self","title":"","permission_type":"","segmentNo":"1","segmentName":"profile"},{"text":"Logout","href":"logout","icon":"fa fa-sign-in","target":"_self","title":"","permission_type":"","segmentNo":"1","segmentName":"logout"}]},{"text":"Services","icon":"fa fa-coffee","href":"#","target":"_self","title":"","permission_type":"","segmentNo":"","segmentName":"","children":[{"text":"Money Transfer","icon":"fa fa-inr","href":"money-transfer","target":"_self","title":"Money Transfer","permission_type":"","segmentNo":"","segmentName":""}]}]', 8),
(24, 'website', 'www.paysiti.in', 9),
(25, 'logo', 'logo-pay.png', 9),
(26, 'favicon', 'favicon_pay.png', 9),
(27, 'SMTP_EMAIL', 'info@paysiti.com', 9),
(28, 'HOST', 'smtp.gmail.com', 9),
(29, 'PORT', '465', 9),
(30, 'SMTP_SECURE', 'SSL', 9),
(31, 'SMTP_PASSWORD', 'test123', 9),
(32, 'mail_setting', 'simple_mail', 9),
(33, 'company_name', 'PAY SITY', 9),
(34, 'crud_list', 'users,User', 9),
(35, 'EMAIL', 'care@bgc.ooo', 9),
(36, 'UserModules', 'yes', 9),
(37, 'register_allowed', '1', 9),
(38, 'email_invitation', '1', 9),
(39, 'admin_approval', '0', 9),
(40, 'version', '1.0', 9),
(41, 'company_api_url', 'https://itcarewallet.com/itcare.net', 9),
(42, 'api_key', '88a843b6dfedecc66dd699716b537bac', 9),
(43, 'title1', 'PAY', 9),
(44, 'title2', 'SITY', 9),
(45, 'color', '#209CEE', 9),
(46, 'color', '#209cee', 9),
(47, 'color', '#D32F2F', 8);

-- --------------------------------------------------------

--
-- Table structure for table `it_state`
--

CREATE TABLE `it_state` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `state_code` varchar(10) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `it_state`
--

INSERT INTO `it_state` (`id`, `name`, `state_code`, `country_id`) VALUES
(1, 'Andhra Pradesh', 'AP', 103),
(2, 'Arunachal Pradesh', 'AR', 103),
(3, 'Assam', 'AS', 103),
(4, 'Bihar', 'BR', 103),
(5, 'Chhattisgarh', 'CG', 103),
(6, 'Goa', 'GA', 103),
(7, 'Gujarat', 'GJ', 103),
(8, 'Haryana', 'HR', 103),
(9, 'Himachal Pradesh', 'HP', 103),
(10, 'Jammu and kashmir', 'JK', 103),
(11, 'Jharkhand', 'JH', 103),
(12, 'Karnataka', 'KA', 103),
(13, 'Kerala', 'KL', 103),
(14, 'Madhya Pradesh', 'MP', 103),
(15, 'Maharashtra', 'MH', 103),
(16, 'Manipur', 'MN', 103),
(17, 'Meghalaya', 'ML', 103),
(18, 'Mizoram', 'MZ', 103),
(19, 'Nagaland', 'NL', 103),
(20, 'Orissa', 'OR', 103),
(21, 'Punjab', 'PB', 103),
(22, 'Rajasthan', 'RJ', 103),
(23, 'Sikkim', 'SK', 103),
(24, 'Tamil Nadu', 'TN', 103),
(25, 'Tripura', 'TR', 103),
(26, 'Uttarakhand', 'UK', 103),
(27, 'Uttar Pradesh', 'UP', 103),
(28, 'West bengal', 'WB', 103),
(29, 'Tamil Nadu', 'TN', 103),
(30, 'Tripura', 'TR', 103),
(31, 'Andaman and Nicobar Islands', 'AN', 103),
(32, 'Chandigarh', 'CH', 103),
(33, 'Dadra and Nagar Haveli', 'DH', 103),
(34, 'Daman and Diu', 'DD', 103),
(35, 'Delhi', 'DL', 103),
(36, 'Lakshadweep', 'LD', 103),
(37, 'Pondicherry', 'PY', 103),
(38, 'Telangana', 'TS', 103);

-- --------------------------------------------------------

--
-- Table structure for table `it_taxes`
--

CREATE TABLE `it_taxes` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `sgst` int(11) NOT NULL,
  `cgst` int(11) NOT NULL,
  `igst` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `it_ticketreplies`
--

CREATE TABLE `it_ticketreplies` (
  `id` int(10) NOT NULL,
  `ticketid` int(10) DEFAULT NULL,
  `body` longtext COLLATE utf8_unicode_ci,
  `replier` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `replierid` int(10) DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `it_tickets`
--

CREATE TABLE `it_tickets` (
  `id` int(10) NOT NULL,
  `ticket_code` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `status` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `reporter` int(10) DEFAULT '0',
  `priority` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `additional` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `attachment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `archived_t` int(2) DEFAULT '0',
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `it_transaction`
--

CREATE TABLE `it_transaction` (
  `id` int(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `trans_id` varchar(255) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `pay_type` enum('Credit','Debit','NA') NOT NULL,
  `narration` longtext NOT NULL,
  `created_date` datetime NOT NULL,
  `trans_type` enum('Recharge','Bill Payment','Money Transfer','Commission','Surcharge','Travel','Fund Transfer') NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=>failed, 1=>Success, 2=>Failed'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `it_transaction`
--

INSERT INTO `it_transaction` (`id`, `user_id`, `order_id`, `trans_id`, `amount`, `pay_type`, `narration`, `created_date`, `trans_type`, `status`) VALUES
(1, 2, '244DA894208C8B', 'HTRQ1234', 50.00, 'Credit', 'Add Money', '2018-07-27 12:55:09', 'Money Transfer', 1),
(2, 2, '1FC20C441610E3', 'HTRQ1234', 50.00, 'Credit', 'Add Money', '2018-07-27 12:56:03', 'Money Transfer', 1),
(3, 2, 'EAD17982BA1DF7', '', 50.00, 'NA', '', '2018-07-27 12:57:54', 'Money Transfer', 1),
(4, 2, '4D902CF2F62775', 'HTRQ1234', 50.00, 'Credit', 'Add Money', '2018-07-27 12:58:13', 'Money Transfer', 1),
(5, 2, '9CD5751888E306', 'HTRQ1234', 50.00, 'Credit', 'Add Money', '2018-07-27 12:59:02', 'Money Transfer', 1),
(6, 2, '11FAC78FC1BEC9', '', 50.00, 'NA', '', '2018-07-27 12:59:54', 'Money Transfer', 1),
(7, 2, '2A4BF95E678886', '', 50.00, 'NA', '', '2018-07-27 01:00:28', 'Money Transfer', 1),
(8, 2, '113B8F6060F3C8', 'HTRQ1234', 50.00, 'Credit', 'Add Money', '2018-07-27 01:02:08', 'Money Transfer', 1),
(9, 2, '7EAB743722F743', 'HTRQ1234', 50.00, 'Credit', 'Add Money', '2018-07-27 01:08:57', 'Money Transfer', 1),
(10, 2, 'DC45AAD2C8A44A', 'HTRQ1234', 50.00, 'Credit', 'Add Money', '2018-07-27 01:09:38', 'Money Transfer', 1),
(11, 2, '5ACA726CF43924', '', 50.00, 'NA', '', '2018-07-27 01:16:34', 'Money Transfer', 1),
(12, 2, 'F4F88441C23A5D', 'HTRQ1234', 500.00, 'Credit', 'Add Money', '2018-07-27 01:20:11', 'Money Transfer', 1),
(13, 2, 'B881C33A6B8598', 'HTRQ1234', 100.00, 'Credit', 'Add Money', '2018-07-27 01:21:11', 'Money Transfer', 1),
(14, 2, 'B8CBD78412C281', 'HTRQ1234', 500.00, 'Credit', 'Add Money', '2018-07-27 01:21:56', 'Money Transfer', 1),
(15, 2, 'E7700415FCA6AD', 'HTRQ1234', 100.00, 'Credit', 'Add Money', '2018-07-27 01:24:06', 'Money Transfer', 1),
(16, 2, 'A8112F0A321F52', 'HTRQ1234', 100.00, 'Credit', 'Add Money', '2018-07-27 01:26:14', 'Money Transfer', 1),
(17, 2, 'B7325ABDFBFAA6', 'HTRQ1234', 100.00, 'Credit', 'Add Money', '2018-07-27 01:27:25', 'Money Transfer', 1),
(18, 2, 'A37DF6EBB9C666', 'HTRQ1234', 100.00, 'Credit', 'Add Money', '2018-07-27 01:28:36', 'Money Transfer', 1),
(19, 2, 'B356B471A5A487', '', 500.00, 'NA', '', '2018-07-27 01:30:04', 'Money Transfer', 0),
(20, 2, '016D60864D9AA2', 'HTRQ1234', 100.00, 'Credit', 'Add Money', '2018-07-27 01:32:20', 'Money Transfer', 1),
(21, 2, '6013A233BB5D4C', '', 50.00, 'NA', '', '2018-07-27 04:37:04', 'Money Transfer', 0),
(22, 2, '28F532620848D3', '', 50.00, 'NA', '', '2018-07-27 05:45:45', 'Money Transfer', 0),
(23, 2, 'DCCDABDF99580C', 'SFOLAW8917689135', 100.00, 'Credit', 'Add Money', '2018-07-29 06:22:15', 'Money Transfer', 2),
(24, 2, '3F22AF0DCA65C0', '', 1000.00, 'NA', '', '2018-07-29 06:24:00', 'Money Transfer', 0),
(25, 32, '7FE04B40520A94', '', 50.00, 'NA', '', '2018-07-30 06:18:19', 'Money Transfer', 0),
(26, 32, '6A4DCD4809C1F4', '', 50.00, 'NA', '', '2018-07-30 06:41:17', 'Money Transfer', 0),
(27, 34, '2DDB2161008A28', '', 100.00, 'NA', '', '2018-08-01 01:02:56', 'Money Transfer', 0),
(28, 34, 'DC923638EAE627', '', 1000.00, 'NA', '', '2018-08-01 01:22:04', 'Money Transfer', 0),
(29, 34, 'A6679966E42AE4', '', 1000.00, 'NA', '', '2018-08-01 02:04:43', 'Money Transfer', 0),
(30, 35, '7731F83D10D281', '', 500.00, 'NA', '', '2018-08-02 05:05:15', 'Money Transfer', 0),
(31, 2, 'C629FF9C4925FB', '', 1000.00, 'NA', '', '2018-08-02 10:27:02', 'Money Transfer', 0),
(32, 2, '694F3BF3273E19', '', 500.00, 'NA', '', '2018-08-02 10:31:10', 'Money Transfer', 0),
(33, 2, 'D2065ACF2ACFEC', '', 500.00, 'NA', '', '2018-08-02 10:31:19', 'Money Transfer', 0),
(34, 36, 'C62253B4E6B700', '', 100.00, 'NA', '', '2018-08-03 10:10:26', 'Money Transfer', 0),
(35, 2, '4912519790808180112', '218448339', 10.00, 'Debit', 'Mobile Recharge for ( 9457120207 ) of &#8377; 10 with AIRTEL', '2018-08-08 12:31:13', 'Recharge', 1);

-- --------------------------------------------------------

--
-- Table structure for table `it_users`
--

CREATE TABLE `it_users` (
  `id` int(200) NOT NULL,
  `user_type` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `last_login_date` datetime NOT NULL,
  `last_login_ip` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `balance` double(10,2) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `is_email_verified` enum('0','1') NOT NULL,
  `is_mobile_verified` enum('0','1') NOT NULL,
  `pan_no` varchar(200) NOT NULL,
  `pan_pic` varchar(200) NOT NULL,
  `aadhar_no` varchar(200) NOT NULL,
  `aadhar_pic` varchar(200) NOT NULL,
  `gst_no` varchar(200) NOT NULL,
  `api_key` varchar(255) NOT NULL,
  `kyc_status` enum('0','1') NOT NULL,
  `is_deleted` enum('0','1') NOT NULL,
  `parent_id` int(11) NOT NULL,
  `referal_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `it_users`
--

INSERT INTO `it_users` (`id`, `user_type`, `name`, `email`, `mobile`, `password`, `address1`, `address2`, `city`, `state`, `country`, `pincode`, `created_date`, `modified_date`, `last_login_date`, `last_login_ip`, `profile_pic`, `balance`, `status`, `is_email_verified`, `is_mobile_verified`, `pan_no`, `pan_pic`, `aadhar_no`, `aadhar_pic`, `gst_no`, `api_key`, `kyc_status`, `is_deleted`, `parent_id`, `referal_id`) VALUES
(1, 7, 'Prateek Verma', 'php@bgc.ooo', '9999040313', 'e10adc3949ba59abbe56e057f20f883e', 'Itech spaze park', '', 1, 1, 1, '110095', '2018-07-23 09:32:36', '2018-07-23 13:36:39', '2018-08-08 19:08:26', '103.201.141.181', '', 50000.00, '1', '1', '1', '', '', '', '', '', '', '1', '0', 0, ''),
(2, 8, 'Verma', 'pv16061995@gmail.com', '9457120206', 'e10adc3949ba59abbe56e057f20f883e', '', '', 0, 0, 0, '', '2018-07-26 01:19:55', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 970.00, '1', '0', '0', '', '', '123456789123', '', '', '', '0', '0', 0, ''),
(28, 8, 'Verma', 'pv160619953456@gmail.com', '9457120207', '02288b662af011585aab4a774d4c8cd8', '', '', 0, 0, 0, '', '2018-07-26 04:42:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 0.00, '1', '0', '0', '', '', '123456781234', '', '', '', '0', '0', 0, ''),
(29, 8, 'Sumit Sharma', 'sumit@gmail.com', '7843844116', '0d724683d15125cdf314a47efbce000e', '', '', 0, 0, 0, '', '2018-07-26 05:53:42', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 0.00, '1', '0', '0', '', '', '123456789123', '', '', '', '0', '0', 0, ''),
(30, 8, 'Tarun', 'jcmlinks@gmail.com', '9999417007', '25d55ad283aa400af464c76d713c07ad', '', '', 0, 0, 0, '', '2018-07-29 03:50:45', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 0.00, '1', '0', '0', '', '', '123412341234', '', '', '', '0', '0', 0, ''),
(31, 8, 'Tarun', 'jcmliks@gmail.com', '9999417007', '25d55ad283aa400af464c76d713c07ad', '', '', 0, 0, 0, '', '2018-07-29 03:51:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 0.00, '1', '0', '0', '', '', '123412341234', '', '', '', '0', '0', 0, ''),
(32, 8, 'tarun', 'care@bgc.ooo', '9999417007', '4607e782c4d86fd5364d7e4508bb10d9', '', '', 0, 0, 0, '', '2018-07-30 06:17:32', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 0.00, '1', '0', '0', 'afh23jpd22', '', '', '', '', '', '0', '0', 0, ''),
(33, 8, 'Ashwani Gupta', 'ashwanigupta781@gmail.com', '9953533397', '48e2b5b66b2391251b919486097f4168', '', '', 0, 0, 0, '', '2018-07-31 12:30:53', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 0.00, '1', '0', '0', '', '', '55822658562', '', '', '', '0', '0', 0, ''),
(34, 8, 'trt', 'web@bgc.ooo', '8586813606', 'e10adc3949ba59abbe56e057f20f883e', '', '', 0, 0, 0, '', '2018-08-01 12:51:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 0.00, '1', '0', '0', 'ahjpd6876j', '', '', '', '', '', '0', '0', 0, ''),
(35, 8, 'Ashwani Gupta', 'ashwanigupta@mail.com', '8744044497', '00f7c12115dfc9c0ae2f082176c0759c', 'gandhi nagar', '', 55, 8, 103, '122001', '2018-08-02 05:01:35', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 0.00, '1', '0', '0', '', '', '555909802432', '', '', '', '0', '0', 0, ''),
(36, 8, 'nnmnmnmnm', 'dr@grr.la', '9999999999', 'e10adc3949ba59abbe56e057f20f883e', '', '', 0, 0, 0, '', '2018-08-03 10:09:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 0.00, '1', '0', '0', 'A', '', '', '', '', '', '0', '0', 0, ''),
(37, 8, 'TARUN', 'phonepay.online@gmail.com', '9999417007', 'e10adc3949ba59abbe56e057f20f883e', '', '', 0, 0, 0, '', '2018-08-07 11:09:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 0.00, '1', '0', '0', 'ahjpd6876f', '', '', '', '', '', '0', '0', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `it_user_permissions`
--

CREATE TABLE `it_user_permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `it_user_type`
--

CREATE TABLE `it_user_type` (
  `id` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `it_user_type`
--

INSERT INTO `it_user_type` (`id`, `name`, `status`) VALUES
(1, 'Admin', '1'),
(2, 'Sub-admin', '1'),
(3, 'Master Distributor', '1'),
(4, 'Distributor', '1'),
(5, 'Api admin', '1'),
(6, 'Area Distributor', '1'),
(7, 'Agent', '1'),
(8, 'Customer', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `it_apis_list`
--
ALTER TABLE `it_apis_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `it_bank_list`
--
ALTER TABLE `it_bank_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `it_city`
--
ALTER TABLE `it_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `it_commissions`
--
ALTER TABLE `it_commissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `it_country`
--
ALTER TABLE `it_country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `it_departments`
--
ALTER TABLE `it_departments`
  ADD PRIMARY KEY (`deptid`);

--
-- Indexes for table `it_invoice`
--
ALTER TABLE `it_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `it_invoice_list`
--
ALTER TABLE `it_invoice_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `it_news`
--
ALTER TABLE `it_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `it_operator`
--
ALTER TABLE `it_operator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `it_operator_city`
--
ALTER TABLE `it_operator_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `it_operator_names`
--
ALTER TABLE `it_operator_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `it_operator_type`
--
ALTER TABLE `it_operator_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `it_pages`
--
ALTER TABLE `it_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `it_permissions`
--
ALTER TABLE `it_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `it_products`
--
ALTER TABLE `it_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `it_product_attribute`
--
ALTER TABLE `it_product_attribute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `it_product_cat`
--
ALTER TABLE `it_product_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `it_product_color`
--
ALTER TABLE `it_product_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `it_product_review`
--
ALTER TABLE `it_product_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `it_product_unit`
--
ALTER TABLE `it_product_unit`
  ADD PRIMARY KEY (`td`);

--
-- Indexes for table `it_setting`
--
ALTER TABLE `it_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `it_state`
--
ALTER TABLE `it_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `it_taxes`
--
ALTER TABLE `it_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `it_ticketreplies`
--
ALTER TABLE `it_ticketreplies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `it_tickets`
--
ALTER TABLE `it_tickets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticket_code` (`ticket_code`);

--
-- Indexes for table `it_transaction`
--
ALTER TABLE `it_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `it_users`
--
ALTER TABLE `it_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `it_user_permissions`
--
ALTER TABLE `it_user_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `it_user_type`
--
ALTER TABLE `it_user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `it_apis_list`
--
ALTER TABLE `it_apis_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `it_bank_list`
--
ALTER TABLE `it_bank_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;
--
-- AUTO_INCREMENT for table `it_city`
--
ALTER TABLE `it_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;
--
-- AUTO_INCREMENT for table `it_commissions`
--
ALTER TABLE `it_commissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `it_country`
--
ALTER TABLE `it_country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;
--
-- AUTO_INCREMENT for table `it_departments`
--
ALTER TABLE `it_departments`
  MODIFY `deptid` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `it_invoice`
--
ALTER TABLE `it_invoice`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `it_invoice_list`
--
ALTER TABLE `it_invoice_list`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `it_news`
--
ALTER TABLE `it_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `it_operator`
--
ALTER TABLE `it_operator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT for table `it_operator_names`
--
ALTER TABLE `it_operator_names`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT for table `it_operator_type`
--
ALTER TABLE `it_operator_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `it_pages`
--
ALTER TABLE `it_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `it_permissions`
--
ALTER TABLE `it_permissions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `it_products`
--
ALTER TABLE `it_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `it_product_attribute`
--
ALTER TABLE `it_product_attribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `it_product_cat`
--
ALTER TABLE `it_product_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `it_product_color`
--
ALTER TABLE `it_product_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `it_product_review`
--
ALTER TABLE `it_product_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `it_product_unit`
--
ALTER TABLE `it_product_unit`
  MODIFY `td` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `it_setting`
--
ALTER TABLE `it_setting`
  MODIFY `id` int(122) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `it_state`
--
ALTER TABLE `it_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `it_taxes`
--
ALTER TABLE `it_taxes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `it_ticketreplies`
--
ALTER TABLE `it_ticketreplies`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `it_tickets`
--
ALTER TABLE `it_tickets`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `it_transaction`
--
ALTER TABLE `it_transaction`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `it_users`
--
ALTER TABLE `it_users`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `it_user_type`
--
ALTER TABLE `it_user_type`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
