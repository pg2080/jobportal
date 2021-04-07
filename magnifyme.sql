-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2020 at 05:56 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magnifyme`
--

-- --------------------------------------------------------

--
-- Table structure for table `companyinfo`
--

CREATE TABLE `companyinfo` (
  `CompanyId` int(11) NOT NULL,
  `LoginId` int(11) NOT NULL,
  `CompanyName` varchar(50) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `City` int(11) NOT NULL,
  `State` int(11) NOT NULL,
  `ContactPersonName` varchar(20) NOT NULL,
  `Mobile` varchar(12) NOT NULL,
  `CompanyEmail` varchar(100) NOT NULL,
  `Wesite` varchar(100) NOT NULL,
  `CompanyLogo` varchar(60) NOT NULL,
  `AboutCompany` varchar(600) NOT NULL,
  `Created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `LastModified_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companyinfo`
--

INSERT INTO `companyinfo` (`CompanyId`, `LoginId`, `CompanyName`, `Address`, `City`, `State`, `ContactPersonName`, `Mobile`, `CompanyEmail`, `Wesite`, `CompanyLogo`, `AboutCompany`, `Created_on`, `LastModified_on`) VALUES
(70, 107, 'Uka tarsadiya University', 'Tarsadi gam', 49, 12, 'Sandip delvadkar', '9090909980', 'utu@gmail.com', 'http://www.utu.ac.in/', 'unnamed.jpg', 'Good for study ', '2020-05-31 03:47:29', '2020-05-31 03:47:29'),
(71, 114, 'Nirma', 'Delhi gate', 10, 10, 'MaheshbhaiPatel', '9426839897', 'nm@gmail.com', 'http://localhost/MAINJOBPORTAL/Common/Registerc.php', 'one1.jpg', 'Good company', '2020-06-06 15:06:39', '2020-06-19 09:24:00'),
(72, 120, 'Forever', 'rajavadi road', 12, 12, 'Yogesh patel', '9999888812', 'f@gmail.com', 'http://localhost/MAINJOBPORTAL/Common/Registerc.php', 'd.jpeg', 'Good company', '2020-06-06 06:08:46', '2020-06-11 16:08:59'),
(74, 127, 'HMCompany', 'No add', 11, 11, 'AmitPatel', '9898530691', 'h@gmail.com', 'http://localhost/MAINJOBPORTAL/Common/Registerc.php', 'd2.jpg', 'Good company', '2020-06-12 16:08:42', '2020-06-12 16:08:42'),
(77, 134, 'Dpizza', 'varracha', 12, 12, 'Shivanspatel', '9090902388', 'pizza@gmail.com', 'http://localhost/MAINJOBPORTAL/Common/Registerc.php', 'one2.jpg', 'Good company for food', '2020-06-19 10:26:17', '2020-06-19 10:26:17'),
(78, 135, 'Veromoda', 'ghod dod road', 12, 12, 'Kiran Goti', '9090887878', 'v@gmail.com', 'http://localhost/MAINJOBPORTAL/Common/Registerc.php', 'shutterstock_682308241.jpg', 'Good company for clothing variety', '2020-06-19 10:45:15', '2020-06-19 10:45:15');

-- --------------------------------------------------------

--
-- Table structure for table `hrinfo`
--

CREATE TABLE `hrinfo` (
  `HRId` int(11) NOT NULL,
  `CompanyId` int(11) NOT NULL,
  `LoginId` int(11) NOT NULL,
  `DepartmentId` int(11) NOT NULL,
  `HRFullName` varchar(60) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Mobile` varchar(12) NOT NULL,
  `City` int(11) NOT NULL,
  `State` int(11) NOT NULL,
  `Gender` char(1) NOT NULL,
  `DOB` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hrinfo`
--

INSERT INTO `hrinfo` (`HRId`, `CompanyId`, `LoginId`, `DepartmentId`, `HRFullName`, `Address`, `Mobile`, `City`, `State`, `Gender`, `DOB`) VALUES
(6, 114, 115, 27, 'Hardik Vaghela', 'kaliyabed', '9426173585', 12, 12, 'm', '1996-03-29'),
(7, 114, 118, 28, 'DhruviPatel', 'no add needed', '9099801272', 13, 13, 'f', '2000-07-15'),
(8, 114, 119, 29, 'AnjaliVaghela', 'Santlal soc,Varracha', '9191923442', 17, 17, 'f', '1997-05-07'),
(10, 127, 128, 33, 'KavyPatel', 'B-46 Santlal Socienty', '9595952322', 17, 17, 'm', '1999-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `jobseekerinfor`
--

CREATE TABLE `jobseekerinfor` (
  `JobSeekerId` int(11) NOT NULL,
  `LoginId` int(11) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `City` int(11) NOT NULL,
  `State` int(11) NOT NULL,
  `Gender` char(1) NOT NULL,
  `Resume` int(100) NOT NULL,
  `Mobile` varchar(12) NOT NULL,
  `DOB` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobseekerinfor`
--

INSERT INTO `jobseekerinfor` (`JobSeekerId`, `LoginId`, `FullName`, `Address`, `City`, `State`, `Gender`, `Resume`, `Mobile`, `DOB`) VALUES
(12, 113, 'NishaDodiya', 'b-12Rachna soc', 191, 12, 'F', 0, '9537895163', '1996-09-12'),
(13, 121, 'VedGoti', 'Ahar nagar surat', 495, 12, 'M', 0, '9173882080', '1999-04-29'),
(15, 126, 'DevVaghela', 'Santlal soc,Varracha', 276, 12, 'M', 0, '9099881223', '2003-03-05'),
(19, 136, 'kiya', '20-sai darshan society katargam', 390, 12, 'F', 0, '9173882081', '1999-05-22'),
(20, 137, 'krisha', '20-sai darshan society katargam', 406, 12, 'F', 0, '9173882082', '2004-06-08');

-- --------------------------------------------------------

--
-- Table structure for table `resume`
--

CREATE TABLE `resume` (
  `ResumeId` int(11) NOT NULL,
  `LoginId` int(11) NOT NULL,
  `Objective` varchar(512) NOT NULL,
  `Services` varchar(512) NOT NULL,
  `AboutServices` varchar(512) DEFAULT NULL,
  `maxedu` varchar(512) NOT NULL,
  `Project` varchar(512) NOT NULL,
  `ProjectDescription` varchar(512) NOT NULL,
  `ProjectImage` varchar(512) NOT NULL,
  `Certification` varchar(512) NOT NULL,
  `ExtraSkills` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resume`
--

INSERT INTO `resume` (`ResumeId`, `LoginId`, `Objective`, `Services`, `AboutServices`, `maxedu`, `Project`, `ProjectDescription`, `ProjectImage`, `Certification`, `ExtraSkills`) VALUES
(26, 109, 'Dance', 'Rehsal hall', '24 hours available', 'Diploma,80', 'Classical,western', 'best,good', '109.jpg,109.jpg', 'bsc dance,msc dance', 'singing,reading'),
(27, 113, 'Dance', 'rehasal hall', '24 hours available', 'Diploma,77', 'Classical,western', 'indian dance form,nonee', '113.jpg,113.jpg', 'dance1,bsc ,msc', 'reading'),
(28, 125, 'Handling to sales Department', 'saling', '24 hours open ', '12 Pass,77', 'Tv Department,Cellphone Department', 'to cell smart tv,to cell android phones', '125.jpeg,125.jpg', '12th pass,bsc', 'reading,foodie'),
(29, 126, 'To Handle Clothes Department', 'Provide Food,Uniform', 'Good Food,Uniform is good', '12 Pass,99', 'Western clothe,Traditional cloth', 'Handle western clothes department,Celling cloth', '126.jpg,126.jpeg', 'bcs,msc', 'Dancing,foodie,reading'),
(30, 121, 'Design of clothes', 'food', 'good food', 'Graduate,98', 'westren,Traditional cloth', 'handle department,nonee', '121.jpg,121.jpg', 'bsc,msc', 'reading');

-- --------------------------------------------------------

--
-- Table structure for table `tblappplication`
--

CREATE TABLE `tblappplication` (
  `ApplicationId` int(11) NOT NULL,
  `JobId` int(11) NOT NULL,
  `ApplicantId` int(11) NOT NULL,
  `CompanyId` int(11) NOT NULL,
  `HRId` int(11) NOT NULL,
  `ResumeId` int(11) NOT NULL,
  `Status` char(2) DEFAULT 'PE',
  `Remark` varchar(100) DEFAULT NULL,
  `AppliedOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `Action On` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblappplication`
--

INSERT INTO `tblappplication` (`ApplicationId`, `JobId`, `ApplicantId`, `CompanyId`, `HRId`, `ResumeId`, `Status`, `Remark`, `AppliedOn`, `Action On`) VALUES
(53, 16, 113, 71, 118, 1, 'AP', 'Good ', '2020-06-07 07:02:15', '2020-06-07 08:47:17'),
(54, 15, 113, 71, 115, 1, 'PE', NULL, '2020-06-07 07:34:59', '2020-06-07 07:34:59'),
(55, 17, 113, 71, 118, 1, 'AP', 'Good ', '2020-06-07 07:37:34', '2020-06-07 07:39:07'),
(56, 18, 113, 71, 118, 1, 'RJ', 'Incompelete Resume', '2020-06-08 06:03:41', '2020-06-08 06:33:50'),
(58, 20, 126, 74, 128, 1, 'RJ', 'Incompelete Resume', '2020-06-12 16:20:05', '2020-06-12 16:24:16'),
(59, 20, 121, 74, 128, 1, 'AP', 'Good ', '2020-06-12 16:22:25', '2020-06-12 16:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `tblcity`
--

CREATE TABLE `tblcity` (
  `CitytId` int(11) NOT NULL,
  `CityName` varchar(100) NOT NULL,
  `StateId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcity`
--

INSERT INTO `tblcity` (`CitytId`, `CityName`, `StateId`) VALUES
(1, 'Adilabad', 32),
(2, 'Agra', 34),
(3, 'Ahmed Nagar', 21),
(4, 'Ahmedabad City', 12),
(5, 'Aizawl', 24),
(6, 'Ajmer', 29),
(7, 'Akola', 21),
(8, 'Aligarh', 34),
(9, 'Allahabad', 34),
(10, 'Alleppey', 18),
(11, 'Almora', 35),
(12, 'Alwar', 29),
(13, 'Alwaye', 18),
(14, 'Amalapuram', 2),
(15, 'Ambala', 13),
(16, 'Ambedkar Nagar', 34),
(17, 'Amravati', 21),
(18, 'Amreli', 12),
(19, 'Amritsar', 28),
(20, 'Anakapalle', 2),
(21, 'Anand', 12),
(22, 'Anantapur', 2),
(23, 'Ananthnag', 15),
(24, 'Anna Road H.O', 31),
(25, 'Arakkonam', 31),
(26, 'Asansol', 36),
(27, 'Aska', 26),
(28, 'Auraiya', 34),
(29, 'Aurangabad', 21),
(30, 'Aurangabad(Bihar)', 5),
(31, 'Azamgarh', 34),
(32, 'Bagalkot', 17),
(33, 'Bageshwar', 35),
(34, 'Bagpat', 34),
(35, 'Bahraich', 34),
(36, 'Balaghat', 20),
(37, 'Balangir', 26),
(38, 'Balasore', 26),
(39, 'Ballia', 34),
(40, 'Balrampur', 34),
(41, 'Banasanktha', 12),
(42, 'Banda', 34),
(43, 'Bandipur', 15),
(44, 'Bankura', 36),
(45, 'Banswara', 29),
(46, 'Barabanki', 34),
(47, 'Baramulla', 15),
(48, 'Baran', 29),
(49, 'Bardoli', 12),
(50, 'Bareilly', 34),
(51, 'Barmer', 29),
(52, 'Barnala', 28),
(53, 'Barpeta', 4),
(54, 'Bastar', 7),
(55, 'Basti', 34),
(56, 'Bathinda', 28),
(57, 'Beed', 21),
(58, 'Begusarai', 5),
(59, 'Belgaum', 17),
(60, 'Bellary', 17),
(61, 'Bengaluru East', 17),
(62, 'Bengaluru South', 17),
(63, 'Bengaluru West', 17),
(64, 'Berhampur', 26),
(65, 'Bhadrak', 26),
(66, 'Bhagalpur', 5),
(67, 'Bhandara', 21),
(68, 'Bharatpur', 29),
(69, 'Bharuch', 12),
(70, 'Bhavnagar', 12),
(71, 'Bhilwara', 29),
(72, 'Bhimavaram', 2),
(73, 'Bhiwani', 13),
(74, 'Bhojpur', 5),
(75, 'Bhopal', 20),
(76, 'Bhubaneswar', 26),
(77, 'Bidar', 17),
(78, 'Bijapur', 17),
(79, 'Bijnor', 34),
(80, 'Bikaner', 29),
(81, 'Bilaspur', 7),
(82, 'Birbhum', 36),
(83, 'Bishnupur', 22),
(84, 'Bongaigaon', 4),
(85, 'Budaun', 34),
(86, 'Budgam', 15),
(87, 'Bulandshahr', 34),
(88, 'Buldhana', 21),
(89, 'Bundi', 29),
(90, 'Burdwan', 36),
(91, 'Cachar', 4),
(92, 'Calicut', 18),
(93, 'Carnicobar', 1),
(94, 'Chamba', 14),
(95, 'Chamoli', 35),
(96, 'Champawat', 35),
(97, 'Champhai', 24),
(98, 'Chandauli', 34),
(99, 'Chandel', 22),
(100, 'Chandigarh', 6),
(101, 'Chandrapur', 21),
(102, 'Changanacherry', 18),
(103, 'Changlang', 3),
(104, 'Channapatna', 17),
(105, 'Chengalpattu', 31),
(106, 'Chennai City Central', 31),
(107, 'Chennai City North', 31),
(108, 'Chennai City South', 31),
(109, 'Chhatarpur', 20),
(110, 'Chhindwara', 20),
(111, 'Chikmagalur', 17),
(112, 'Chikodi', 17),
(113, 'Chitradurga', 17),
(114, 'Chitrakoot', 34),
(115, 'Chittoor', 2),
(116, 'Chittorgarh', 29),
(117, 'Churachandpur', 22),
(118, 'Churu', 29),
(119, 'Coimbatore', 31),
(120, 'Contai', 36),
(121, 'Cooch Behar', 36),
(122, 'Cuddalore', 31),
(123, 'Cuddapah', 2),
(124, 'Cuttack City', 26),
(125, 'Cuttack North', 26),
(126, 'Cuttack South', 26),
(127, 'Dadra & Nagar Haveli', 8),
(128, 'Daman', 9),
(129, 'Darbhanga', 5),
(130, 'Darjiling', 36),
(131, 'Darrang', 4),
(132, 'Dausa', 29),
(133, 'Dehra Gopipur', 14),
(134, 'Dehradun', 35),
(135, 'Delhi', 10),
(136, 'Deoria', 34),
(137, 'Dhalai', 33),
(138, 'Dhanbad', 16),
(139, 'Dharamsala', 14),
(140, 'Dharmapuri', 31),
(141, 'Dharwad', 17),
(142, 'Dhemaji', 4),
(143, 'Dhenkanal', 26),
(144, 'Dholpur', 29),
(145, 'Dhubri', 4),
(146, 'Dhule', 21),
(147, 'Dibang Valley', 3),
(148, 'Dibrugarh', 4),
(149, 'Diglipur', 1),
(150, 'Dimapur', 25),
(151, 'Dindigul', 31),
(152, 'Diu', 9),
(153, 'Doda', 15),
(154, 'Dungarpur', 29),
(155, 'Durg', 7),
(156, 'East Champaran', 5),
(157, 'East Garo Hills', 23),
(158, 'East Kameng', 3),
(159, 'East Khasi Hills', 23),
(160, 'East Siang', 3),
(161, 'East Sikkim', 30),
(162, 'Eluru', 2),
(163, 'Ernakulam', 18),
(164, 'Erode', 31),
(165, 'Etah', 34),
(166, 'Etawah', 34),
(167, 'Faizabad', 34),
(168, 'Faridabad', 13),
(169, 'Faridkot', 28),
(170, 'Farrukhabad', 34),
(171, 'Fatehgarh Sahib', 28),
(172, 'Fatehpur', 34),
(173, 'Fazilka', 28),
(174, 'Ferrargunj', 1),
(175, 'Firozabad', 34),
(176, 'Firozpur', 28),
(177, 'Gadag', 17),
(178, 'Gadchiroli', 21),
(179, 'Gandhinagar', 12),
(180, 'Ganganagar', 29),
(181, 'Gautam Buddha Nagar', 34),
(182, 'Gaya', 5),
(183, 'Ghaziabad', 34),
(184, 'Ghazipur', 34),
(185, 'Giridih', 16),
(186, 'Goa', 11),
(187, 'Goalpara', 4),
(188, 'Gokak', 17),
(189, 'Golaghat', 4),
(190, 'Gonda', 34),
(191, 'Gondal', 12),
(192, 'Gondia', 21),
(193, 'Gorakhpur', 34),
(194, 'Gudivada', 2),
(195, 'Gudur', 2),
(196, 'Gulbarga', 17),
(197, 'Guna', 20),
(198, 'Guntur', 2),
(199, 'Gurdaspur', 28),
(200, 'Gurugram', 13),
(201, 'Gwalior', 20),
(202, 'Hailakandi', 4),
(203, 'Hamirpur (HP)', 14),
(204, 'Hamirpur (UP)', 34),
(205, 'Hanamkonda', 32),
(206, 'Hanumangarh', 29),
(207, 'Hardoi', 34),
(208, 'Haridwar', 35),
(209, 'Hassan', 17),
(210, 'Hathras', 34),
(211, 'Haveri', 17),
(212, 'Hazaribagh', 16),
(213, 'Hindupur', 2),
(214, 'Hingoli', 21),
(215, 'Hissar', 13),
(216, 'Hooghly', 36),
(217, 'Hoshangabad', 20),
(218, 'Hoshiarpur', 28),
(219, 'Howrah', 36),
(220, 'Hut Bay', 1),
(221, 'Hyderabad City', 32),
(222, 'Hyderabad South East', 32),
(223, 'Idukki', 18),
(224, 'Imphal East', 22),
(225, 'Imphal West', 22),
(226, 'Indore City', 20),
(227, 'Indore Moffusil', 20),
(228, 'Irinjalakuda', 18),
(229, 'Jabalpur', 20),
(230, 'Jaintia Hills', 23),
(231, 'Jaipur', 29),
(232, 'Jaisalmer', 29),
(233, 'Jalandhar', 28),
(234, 'Jalaun', 34),
(235, 'Jalgaon', 21),
(236, 'Jalna', 21),
(237, 'Jalor', 29),
(238, 'Jalpaiguri', 36),
(239, 'Jammu', 15),
(240, 'Jamnagar', 12),
(241, 'Jaunpur', 34),
(242, 'Jhalawar', 29),
(243, 'Jhansi', 34),
(244, 'Jhujhunu', 29),
(245, 'Jodhpur', 29),
(246, 'Jorhat', 4),
(247, 'Junagadh', 12),
(248, 'Jyotiba Phule Nagar', 34),
(249, 'Kakinada', 2),
(250, 'Kalahandi', 26),
(251, 'Kamrup', 4),
(252, 'Kanchipuram', 31),
(253, 'Kannauj', 34),
(254, 'Kanniyakumari', 31),
(255, 'Kannur', 18),
(256, 'Kanpur Dehat', 34),
(257, 'Kanpur Nagar', 34),
(258, 'Kapurthala', 28),
(259, 'Karaikal', 27),
(260, 'Karaikudi', 31),
(261, 'Karauli', 29),
(262, 'Karbi Anglong', 4),
(263, 'Kargil', 15),
(264, 'Karimganj', 4),
(265, 'Karimnagar', 32),
(266, 'Karnal', 13),
(267, 'Karur', 31),
(268, 'Karwar', 17),
(269, 'Kasaragod', 18),
(270, 'Kathua', 15),
(271, 'Kaushambi', 34),
(272, 'Keonjhar', 26),
(273, 'Khammam (AP)', 2),
(274, 'Khammam (TL)', 32),
(275, 'Khandwa', 20),
(276, 'Kheda', 12),
(277, 'Kheri', 34),
(278, 'Kiphire', 25),
(279, 'Kodagu', 17),
(280, 'Kohima', 25),
(281, 'Kokrajhar', 4),
(282, 'Kolar', 17),
(283, 'Kolasib', 24),
(284, 'Kolhapur', 21),
(285, 'Kolkata', 36),
(286, 'Koraput', 26),
(287, 'Kota', 29),
(288, 'Kottayam', 18),
(289, 'Kovilpatti', 31),
(290, 'Krishnagiri', 31),
(291, 'Kulgam', 15),
(292, 'Kumbakonam', 31),
(293, 'Kupwara', 15),
(294, 'Kurnool', 2),
(295, 'Kurukshetra', 13),
(296, 'Kurung Kumey', 3),
(297, 'Kushinagar', 34),
(298, 'Kutch', 12),
(299, 'Lakhimpur', 4),
(300, 'Lakshadweep', 19),
(301, 'Lalitpur', 34),
(302, 'Latur', 21),
(303, 'Lawngtlai', 24),
(304, 'Leh', 15),
(305, 'Lohit', 3),
(306, 'Longleng', 25),
(307, 'Lower Subansiri', 3),
(308, 'Lucknow', 34),
(309, 'Ludhiana', 28),
(310, 'Lunglei', 24),
(311, 'Machilipatnam', 2),
(312, 'Madhubani', 5),
(313, 'Madurai', 31),
(314, 'Mahabubnagar', 32),
(315, 'Maharajganj', 34),
(316, 'Mahesana', 12),
(317, 'Mahoba', 34),
(318, 'Mainpuri', 34),
(319, 'Malda', 36),
(320, 'Mammit', 24),
(321, 'Mandi', 14),
(322, 'Mandsaur', 20),
(323, 'Mandya', 17),
(324, 'Mangalore', 17),
(325, 'Manjeri', 18),
(326, 'Mansa', 28),
(327, 'Marigaon', 4),
(328, 'Mathura', 34),
(329, 'Mau', 34),
(330, 'Mavelikara', 18),
(331, 'Mayabander', 1),
(332, 'Mayiladuthurai', 31),
(333, 'Mayurbhanj', 26),
(334, 'Medak', 32),
(335, 'Meerut', 34),
(336, 'Meghalaya', 23),
(337, 'Midnapore', 36),
(338, 'Mirzapur', 34),
(339, 'Moga', 28),
(340, 'Mohali', 28),
(341, 'Mokokchung', 25),
(342, 'Mon', 25),
(343, 'Monghyr', 5),
(344, 'Moradabad', 34),
(345, 'Morena', 20),
(346, 'Muktsar', 28),
(347, 'Mumbai', 21),
(348, 'Murshidabad', 36),
(349, 'Muzaffarnagar', 34),
(350, 'Muzaffarpur', 5),
(351, 'Mysore', 17),
(352, 'Nadia', 36),
(353, 'Nagaon', 4),
(354, 'Nagapattinam', 31),
(355, 'Nagaur', 29),
(356, 'Nagpur', 21),
(357, 'Nainital', 35),
(358, 'Nalanda', 5),
(359, 'Nalbari', 4),
(360, 'Nalgonda', 32),
(361, 'Namakkal', 31),
(362, 'Nancorie', 1),
(363, 'Nancowrie', 1),
(364, 'Nanded', 21),
(365, 'Nandurbar', 21),
(366, 'Nandyal', 2),
(367, 'Nanjangud', 17),
(368, 'Narasaraopet', 2),
(369, 'Nashik', 21),
(370, 'Navsari', 12),
(371, 'Nawadha', 5),
(372, 'Nawanshahr', 28),
(373, 'Nellore', 2),
(374, 'Nilgiris', 31),
(375, 'Nizamabad', 32),
(376, 'North 24 Parganas', 36),
(377, 'North Cachar Hills', 4),
(378, 'North Dinajpur', 36),
(379, 'North Sikkim', 30),
(380, 'North Tripura', 33),
(381, 'Osmanabad', 21),
(382, 'Ottapalam', 18),
(383, 'Palamau', 16),
(384, 'Palghat', 18),
(385, 'Pali', 29),
(386, 'Panchmahals', 12),
(387, 'Papum Pare', 3),
(388, 'Parbhani', 21),
(389, 'Parvathipuram', 2),
(390, 'Patan', 12),
(391, 'Pathanamthitta', 18),
(392, 'Patiala', 28),
(393, 'Patna', 5),
(394, 'Pattukottai', 31),
(395, 'Pauri Garhwal', 35),
(396, 'Peddapalli', 32),
(397, 'Peren', 25),
(398, 'Phek', 25),
(399, 'Phulbani', 26),
(400, 'Pilibhit', 34),
(401, 'Pithoragarh', 35),
(402, 'Poducherry (PD)', 27),
(403, 'Poducherry (TN)', 31),
(404, 'Pollachi', 31),
(405, 'Poonch', 15),
(406, 'Porbandar', 12),
(407, 'Port Blair', 1),
(408, 'Prakasam', 2),
(409, 'Pratapgarh', 34),
(410, 'Proddatur', 2),
(411, 'Pudukkottai', 31),
(412, 'Pulwama', 15),
(413, 'Pune', 21),
(414, 'Puri', 26),
(415, 'Purnea', 5),
(416, 'Purulia', 36),
(417, 'Puttur', 17),
(418, 'Quilon', 18),
(419, 'Raebareli', 34),
(420, 'Raichur', 17),
(421, 'Raigarh (CT)', 7),
(422, 'Raigarh (MH)', 21),
(423, 'Raipur', 7),
(424, 'Rajahmundry', 2),
(425, 'Rajauri', 15),
(426, 'Rajkot', 12),
(427, 'Rajsamand', 29),
(428, 'Ramanathapuram', 31),
(429, 'Rampur', 34),
(430, 'Rampur Bushahr', 14),
(431, 'Ranchi', 16),
(432, 'Rangat', 1),
(433, 'Ratlam', 20),
(434, 'Ratnagiri', 21),
(435, 'Reasi', 15),
(436, 'Rewa', 20),
(437, 'Ri Bhoi', 23),
(438, 'Rohtak', 13),
(439, 'Rohtas', 5),
(440, 'Ropar', 28),
(441, 'Rudraprayag', 35),
(442, 'Rupnagar', 28),
(443, 'Sabarkantha', 12),
(444, 'Sagar', 20),
(445, 'Saharanpur', 34),
(446, 'Saharsa', 5),
(447, 'Salem East', 31),
(448, 'Salem West', 31),
(449, 'Samastipur', 5),
(450, 'Sambalpur', 26),
(451, 'Sangareddy', 32),
(452, 'Sangli', 21),
(453, 'Sangrur', 28),
(454, 'Sant Kabir Nagar', 34),
(455, 'Sant Ravidas Nagar', 34),
(456, 'Santhal Parganas', 16),
(457, 'Saran', 5),
(458, 'Satara', 21),
(459, 'Sawai Madhopur', 29),
(460, 'Secunderabad', 32),
(461, 'Sehore', 20),
(462, 'Senapati', 22),
(463, 'Serchhip', 24),
(464, 'Shahdol', 20),
(465, 'Shahjahanpur', 34),
(466, 'Shimla', 14),
(467, 'Shimoga', 17),
(468, 'Shrawasti', 34),
(469, 'Sibsagar', 4),
(470, 'Siddharthnagar', 34),
(471, 'Sikar', 29),
(472, 'Sindhudurg', 21),
(473, 'Singhbhum', 16),
(474, 'Sirohi', 29),
(475, 'Sirsi', 17),
(476, 'Sitamarhi', 5),
(477, 'Sitapur', 34),
(478, 'Sivaganga', 31),
(479, 'Siwan', 5),
(480, 'Solan', 14),
(481, 'Solapur', 21),
(482, 'Sonbhadra', 34),
(483, 'Sonepat', 13),
(484, 'Sonitpur', 4),
(485, 'South 24 Parganas', 36),
(486, 'South Dinajpur', 36),
(487, 'South Garo Hills', 23),
(488, 'South Sikkim', 30),
(489, 'South Tripura', 33),
(490, 'Srikakulam', 2),
(491, 'Srinagar', 15),
(492, 'Srirangam', 31),
(493, 'Sultanpur', 34),
(494, 'Sundargarh', 26),
(495, 'Surat', 12),
(496, 'Surendranagar', 12),
(497, 'Suryapet', 32),
(498, 'Tadepalligudem', 2),
(499, 'Tambaram', 31),
(500, 'Tamenglong', 22),
(501, 'Tamluk', 36),
(502, 'Tarn Taran', 28),
(503, 'Tawang', 3),
(504, 'Tehri Garhwal', 35),
(505, 'Tenali', 2),
(506, 'Thalassery', 18),
(507, 'Thane', 21),
(508, 'Thanjavur', 31),
(509, 'Theni', 31),
(510, 'Thoubal', 22),
(511, 'Tinsukia', 4),
(512, 'Tirap', 3),
(513, 'Tiruchirapalli', 31),
(514, 'Tirunelveli', 31),
(515, 'Tirupati', 2),
(516, 'Tirupattur', 31),
(517, 'Tirupur', 31),
(518, 'Tirur', 18),
(519, 'Tiruvalla', 18),
(520, 'Tiruvannamalai', 31),
(521, 'Tonk', 29),
(522, 'Trichur', 18),
(523, 'Trivandrum North', 18),
(524, 'Trivandrum South', 18),
(525, 'Tuensang', 25),
(526, 'Tumkur', 17),
(527, 'Tuticorin', 31),
(528, 'Udaipur', 29),
(529, 'Udham Singh Nagar', 35),
(530, 'Udhampur', 15),
(531, 'Udupi', 17),
(532, 'Ujjain', 20),
(533, 'Ukhrul', 22),
(534, 'Una', 14),
(535, 'Unnao', 34),
(536, 'Upper Siang', 3),
(537, 'Upper Subansiri', 3),
(538, 'Uttarkashi', 35),
(539, 'Vadakara', 18),
(540, 'Vadodara East', 12),
(541, 'Vadodara West', 12),
(542, 'Vaishali', 5),
(543, 'Valsad', 12),
(544, 'Varanasi', 34),
(545, 'Vellore', 31),
(546, 'Vidisha', 20),
(547, 'Vijayawada', 2),
(548, 'Virudhunagar', 31),
(549, 'Visakhapatnam', 2),
(550, 'Vizianagaram', 2),
(551, 'Vriddhachalam', 31),
(552, 'Wanaparthy', 32),
(553, 'Warangal', 32),
(554, 'Wardha', 21),
(555, 'Washim', 21),
(556, 'West Champaran', 5),
(557, 'West Garo Hills', 23),
(558, 'West Kameng', 3),
(559, 'West Khasi Hills', 23),
(560, 'West Siang', 3),
(561, 'West Sikkim', 30),
(562, 'West Tripura', 33),
(563, 'Wokha', 25),
(564, 'Yavatmal', 21),
(565, 'Zunhebotto', 25);

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartment`
--

CREATE TABLE `tbldepartment` (
  `DepartmentId` int(11) NOT NULL,
  `DepartmentName` varchar(50) NOT NULL,
  `CompanyId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldepartment`
--

INSERT INTO `tbldepartment` (`DepartmentId`, `DepartmentName`, `CompanyId`) VALUES
(1, 'IT', 1),
(2, 'Sales', 1),
(5, 'Account', 1),
(18, 'Management', 1),
(19, 'Sales', 2),
(20, 'Account', 2),
(21, 'Footwear design', 68),
(22, 'Sales', 68),
(23, 'Account', 68),
(24, 'Bmiit', 107),
(25, 'cgpit', 107),
(26, 'bhms', 107),
(27, 'IT', 114),
(28, 'Design', 114),
(29, 'ELectrical', 114),
(30, 'Electronics', 123),
(31, 'Sales', 123),
(32, 'Traditional Clothes', 127),
(33, 'Western Clothes', 127);

-- --------------------------------------------------------

--
-- Table structure for table `tblfeedback`
--

CREATE TABLE `tblfeedback` (
  `FeedBackId` int(11) NOT NULL,
  `LoginId` int(11) NOT NULL,
  `Ratings` float NOT NULL,
  `FeedType` char(2) DEFAULT ''''''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblfeedback`
--

INSERT INTO `tblfeedback` (`FeedBackId`, `LoginId`, `Ratings`, `FeedType`) VALUES
(15, 113, 2, 'JS'),
(16, 114, 3, 'co'),
(17, 127, 5, 'co'),
(18, 126, 3, 'JS'),
(19, 134, 3, 'co');

-- --------------------------------------------------------

--
-- Table structure for table `tblinterview`
--

CREATE TABLE `tblinterview` (
  `InterViewId` int(11) NOT NULL,
  `CompanyId` int(11) NOT NULL,
  `ApplicationId` int(11) NOT NULL,
  `HRId` int(11) NOT NULL,
  `DepartmentId` int(11) NOT NULL,
  `JobId` int(11) NOT NULL,
  `ApplicantId` int(11) NOT NULL,
  `ResumeId` int(11) NOT NULL,
  `Date` varchar(120) NOT NULL,
  `Time` varchar(50) NOT NULL,
  `Location` varchar(200) NOT NULL,
  `Status` varchar(2) DEFAULT 'PE',
  `Remark` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblinterview`
--

INSERT INTO `tblinterview` (`InterViewId`, `CompanyId`, `ApplicationId`, `HRId`, `DepartmentId`, `JobId`, `ApplicantId`, `ResumeId`, `Date`, `Time`, `Location`, `Status`, `Remark`) VALUES
(10, 70, 46, 110, 25, 14, 109, 0, '2020-06-04', '4:30:PM', 'L.H Road Surat', 'AP', 'You Are the best candidate for this job so you are approve and selected for this job and wellcome to'),
(11, 71, 55, 118, 28, 17, 113, 0, '2020-06-13', '4:15:PM', 'Varracha road surat', 'RJ', 'we see your resume and we are approved your application for this job.'),
(12, 71, 53, 118, 28, 16, 113, 0, '2020-06-19', '8:15:AM', 'Varracha road surat', 'PE', 'good and we approved your application.'),
(14, 74, 59, 128, 33, 20, 121, 0, '2020-06-25', '6:30:PM', 'Varracha road surat', 'AP', 'resume done');

-- --------------------------------------------------------

--
-- Table structure for table `tbljob`
--

CREATE TABLE `tbljob` (
  `JobId` int(11) NOT NULL,
  `CompanyId` int(11) NOT NULL,
  `HRLoginId` int(11) NOT NULL,
  `DepartmentId` int(11) NOT NULL,
  `JobTypeId` char(1) NOT NULL,
  `Qualification` varchar(200) NOT NULL,
  `Designation` varchar(50) NOT NULL,
  `Location` varchar(200) NOT NULL,
  `ExpectedSalary` varchar(12) NOT NULL,
  `Experiance` varchar(12) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Vacancy` int(11) NOT NULL,
  `IsDeleted` int(11) NOT NULL DEFAULT 1,
  `Created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbljob`
--

INSERT INTO `tbljob` (`JobId`, `CompanyId`, `HRLoginId`, `DepartmentId`, `JobTypeId`, `Qualification`, `Designation`, `Location`, `ExpectedSalary`, `Experiance`, `Description`, `Vacancy`, `IsDeleted`, `Created_on`) VALUES
(15, 71, 115, 27, 'F', 'Masters in IT', 'Web designer', 'navsari', '5000', '3', 'good job', 2, 1, '2020-06-06 15:18:28'),
(16, 71, 118, 28, 'P', 'MS', 'Fashion designer', '2a', '120000-15000', '1', 'product marketing', 0, 1, '2020-06-06 15:24:30'),
(17, 71, 118, 28, 'I', 'Master in Interior designer', 'interior', 'Pune', '12000-150000', '1', 'No Des', 8, 1, '2020-06-07 07:36:52'),
(18, 71, 118, 28, 'P', 'master in shoe design', 'Shoe Design', 'Pune', '5000', '1', 'Footwear designer', 25, 1, '2020-06-08 06:01:31'),
(20, 74, 128, 33, 'I', '12th pass', 'Fashion designer', 'vadodara', '100000-50000', '5', 'No Des', 6, 1, '2020-06-12 16:14:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbllogin`
--

CREATE TABLE `tbllogin` (
  `LoginId` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(5000) DEFAULT NULL,
  `UserType` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbllogin`
--

INSERT INTO `tbllogin` (`LoginId`, `Email`, `Password`, `UserType`) VALUES
(65, 'adm@gmail.com', '5a1fe428e6a0c1dafd67fffeec31ea8f', 'M'),
(107, 'utuapp@gmail.com', 'Aa1!abcd', 'co'),
(113, 'dhruvivaghela22@gmail.com', 'Aa1!abcd', 'JS'),
(114, 'nirma@gmail.com', 'Aa1!abcd', 'co'),
(115, 'hardikvaghela959@gmail.com', 'Aa1!abcd', 'CH'),
(118, '17bmiit122@gmail.com', 'Aa1!abcd', 'CH'),
(119, 'anjalivaghela959@gmail.com', 'Aa1!abcd', 'CH'),
(120, 'forever@gmail.com', 'Aa1!abcd', 'co'),
(121, 'parthgoti2080@gmail.com', 'Aa1!abcd', 'JS'),
(126, 'devvaghela462@gmail.com', 'Aa1!abcd', 'JS'),
(127, 'Hm@gmail.com', 'Aa1!abcd', 'co'),
(128, '17bmiit042@gmail.com', 'Aa2!abcd', 'CH'),
(134, 'dpizza@gmail.com', 'Aa1!abcd', 'co'),
(135, 'veromoda@gmail.com', 'Aa1!abcd', 'co'),
(136, 'dhruvivaghela@gmai.com', '5a1fe428e6a0', 'JS'),
(137, 'dhruvi@gmai.com', '5a1fe428e6a0c1dafd67fffeec31ea8f', 'JS');

-- --------------------------------------------------------

--
-- Table structure for table `tblotp`
--

CREATE TABLE `tblotp` (
  `OTP` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblotp`
--

INSERT INTO `tblotp` (`OTP`, `Email`, `CreatedOn`) VALUES
(41497, 'f201506@gmail.com', '2020-02-02 11:21:36'),
(49494, 'azz@gmail.com', '2020-02-02 11:30:41'),
(98106, 'az@gmail.com', '2020-02-02 11:38:17');

-- --------------------------------------------------------

--
-- Table structure for table `tblpayment`
--

CREATE TABLE `tblpayment` (
  `PaymentId` int(11) NOT NULL,
  `PlanId` int(10) NOT NULL,
  `ComapnyId` int(10) NOT NULL,
  `StartedOn` date NOT NULL,
  `ExpiredOn` date NOT NULL,
  `Amount` varchar(20) NOT NULL,
  `TransacionId` text NOT NULL,
  `TransacionDate` date NOT NULL,
  `TransacionBy` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpayment`
--

INSERT INTO `tblpayment` (`PaymentId`, `PlanId`, `ComapnyId`, `StartedOn`, `ExpiredOn`, `Amount`, `TransacionId`, `TransacionDate`, `TransacionBy`) VALUES
(1, 13, 134, '2020-06-19', '2021-06-19', '2400.00', '20200619111212800110168025203060473', '2020-06-19', 'Dpizza'),
(2, 13, 135, '2020-06-19', '2021-06-19', '2400.00', '20200619111212800110168390201625271', '2020-06-19', 'Veromoda'),
(3, 13, 114, '2020-06-19', '2021-06-19', '2400.00', '20200619111212800110168403701649720', '2020-06-19', 'Nirma');

-- --------------------------------------------------------

--
-- Table structure for table `tblplan`
--

CREATE TABLE `tblplan` (
  `PlanId` int(11) NOT NULL,
  `PlanName` varchar(20) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Duration` varchar(30) NOT NULL,
  `IsActive` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblplan`
--

INSERT INTO `tblplan` (`PlanId`, `PlanName`, `Amount`, `Duration`, `IsActive`) VALUES
(1, 'GOLDEN', 200, '10', 0),
(15, 'SILVER', 1500, '1', 1),
(20, 'PLATINUM', 2000, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblstate`
--

CREATE TABLE `tblstate` (
  `StateId` int(11) NOT NULL,
  `StateName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstate`
--

INSERT INTO `tblstate` (`StateId`, `StateName`) VALUES
(1, 'Andaman & Nicobar Islands'),
(2, 'Andhra Pradesh'),
(3, 'Arunachal Pradesh'),
(4, 'Assam'),
(5, 'Bihar'),
(6, 'Chandigarh'),
(7, 'Chattisgarh'),
(8, 'Dadra & Nagar Haveli'),
(9, 'Daman & Diu'),
(10, 'Delhi'),
(11, 'Goa'),
(12, 'Gujarat'),
(13, 'Haryana'),
(14, 'Himachal Pradesh'),
(15, 'Jammu & Kashmir'),
(16, 'Jharkhand'),
(17, 'Karnataka'),
(18, 'Kerala'),
(19, 'Lakshadweep'),
(20, 'Madhya Pradesh'),
(21, 'Maharashtra'),
(22, 'Manipur'),
(23, 'Meghalaya'),
(24, 'Mizoram'),
(25, 'Nagaland'),
(26, 'Odisha'),
(27, 'Poducherry'),
(28, 'Punjab'),
(29, 'Rajasthan'),
(30, 'Sikkim'),
(31, 'Tamil Nadu'),
(32, 'Telangana'),
(33, 'Tripura'),
(34, 'Uttar Pradesh'),
(35, 'Uttarakhand'),
(36, 'West Bengal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companyinfo`
--
ALTER TABLE `companyinfo`
  ADD PRIMARY KEY (`CompanyId`),
  ADD UNIQUE KEY `Mobile` (`Mobile`),
  ADD UNIQUE KEY `CompanyEmail` (`CompanyEmail`);

--
-- Indexes for table `hrinfo`
--
ALTER TABLE `hrinfo`
  ADD PRIMARY KEY (`HRId`);

--
-- Indexes for table `jobseekerinfor`
--
ALTER TABLE `jobseekerinfor`
  ADD PRIMARY KEY (`JobSeekerId`);

--
-- Indexes for table `resume`
--
ALTER TABLE `resume`
  ADD PRIMARY KEY (`ResumeId`),
  ADD UNIQUE KEY `LoginId` (`LoginId`);

--
-- Indexes for table `tblappplication`
--
ALTER TABLE `tblappplication`
  ADD PRIMARY KEY (`ApplicationId`);

--
-- Indexes for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  ADD PRIMARY KEY (`DepartmentId`);

--
-- Indexes for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  ADD PRIMARY KEY (`FeedBackId`);

--
-- Indexes for table `tblinterview`
--
ALTER TABLE `tblinterview`
  ADD PRIMARY KEY (`InterViewId`);

--
-- Indexes for table `tbljob`
--
ALTER TABLE `tbljob`
  ADD PRIMARY KEY (`JobId`);

--
-- Indexes for table `tbllogin`
--
ALTER TABLE `tbllogin`
  ADD PRIMARY KEY (`LoginId`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `tblpayment`
--
ALTER TABLE `tblpayment`
  ADD PRIMARY KEY (`PaymentId`);

--
-- Indexes for table `tblplan`
--
ALTER TABLE `tblplan`
  ADD PRIMARY KEY (`PlanId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companyinfo`
--
ALTER TABLE `companyinfo`
  MODIFY `CompanyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `hrinfo`
--
ALTER TABLE `hrinfo`
  MODIFY `HRId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jobseekerinfor`
--
ALTER TABLE `jobseekerinfor`
  MODIFY `JobSeekerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `resume`
--
ALTER TABLE `resume`
  MODIFY `ResumeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tblappplication`
--
ALTER TABLE `tblappplication`
  MODIFY `ApplicationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  MODIFY `DepartmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  MODIFY `FeedBackId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tblinterview`
--
ALTER TABLE `tblinterview`
  MODIFY `InterViewId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbljob`
--
ALTER TABLE `tbljob`
  MODIFY `JobId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbllogin`
--
ALTER TABLE `tbllogin`
  MODIFY `LoginId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `tblpayment`
--
ALTER TABLE `tblpayment`
  MODIFY `PaymentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblplan`
--
ALTER TABLE `tblplan`
  MODIFY `PlanId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
