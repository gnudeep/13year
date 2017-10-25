-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 24, 2017 at 10:05 AM
-- Server version: 5.7.11-0ubuntu6
-- PHP Version: 7.0.4-7ubuntu2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `13year`
--
CREATE DATABASE IF NOT EXISTS `13year` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `13year`;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `school_id` varchar(45) DEFAULT NULL,
  `grade` varchar(45) DEFAULT NULL,
  `class_name` varchar(45) DEFAULT NULL,
  `commenced_date` date NOT NULL,
  `class_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `class_students`
--

CREATE TABLE `class_students` (
  `id` int(11) NOT NULL,
  `school_id` varchar(45) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `class_subjects`
--

CREATE TABLE `class_subjects` (
  `id` int(11) NOT NULL,
  `school_id` varchar(45) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `instructor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `coordinators`
--

CREATE TABLE `coordinators` (
  `id` int(11) NOT NULL,
  `school_id` varchar(45) NOT NULL,
  `coordinator_nic` varchar(15) NOT NULL,
  `coordinator_name` varchar(150) NOT NULL,
  `coordinator_dob` date NOT NULL,
  `coordinator_mobile` varchar(10) NOT NULL,
  `coordinator_email` varchar(100) NOT NULL,
  `coordinator_ser_app` date NOT NULL,
  `coordinator_sch_app` date NOT NULL,
  `user_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `province_id` int(11) DEFAULT NULL,
  `district` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `province_id`, `district`) VALUES
(1, 1, 'Colombo'),
(2, 1, 'Gampaha'),
(3, 1, 'Kalutara'),
(4, 2, 'Kandy'),
(5, 2, 'Matale'),
(6, 2, 'Nuwara Eliya'),
(7, 3, 'Galle'),
(8, 3, 'Matara'),
(9, 3, 'Hambantota'),
(10, 4, 'Jaffna'),
(11, 4, 'Kilinochchi'),
(12, 4, 'Mannar'),
(13, 4, 'Vavuniya'),
(14, 4, 'Mullaitivu'),
(15, 5, 'Batticaloa'),
(16, 5, 'Ampara'),
(17, 5, 'Trincomalee'),
(18, 6, 'Kurunegala'),
(19, 6, 'Puttalam'),
(20, 7, 'Anuradhapura'),
(21, 7, 'Polonnaruwa'),
(22, 8, 'Badulla'),
(23, 8, 'Monaragala'),
(24, 9, 'Ratnapura'),
(25, 9, 'Kegalle');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `school_id` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `funds_id` int(11) DEFAULT NULL,
  `purpose` varchar(45) DEFAULT NULL,
  `amount` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `funds`
--

CREATE TABLE `funds` (
  `id` int(11) NOT NULL,
  `school_id` varchar(45) NOT NULL,
  `fund_id` int(11) DEFAULT NULL,
  `fund_purpose` varchar(100) NOT NULL,
  `amount` varchar(45) DEFAULT NULL,
  `received_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `funds_list`
--

CREATE TABLE `funds_list` (
  `id` int(11) NOT NULL,
  `fund_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `funds_list`
--

INSERT INTO `funds_list` (`id`, `fund_name`) VALUES
(1, 'ADB');

-- --------------------------------------------------------

--
-- Table structure for table `institutes`
--

CREATE TABLE `institutes` (
  `id` int(11) NOT NULL,
  `school_id` varchar(45) DEFAULT NULL,
  `institute_name` varchar(100) DEFAULT NULL,
  `institute_address` varchar(150) DEFAULT NULL,
  `dist_school` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `p1_attendance`
--

CREATE TABLE `p1_attendance` (
  `id` int(11) NOT NULL,
  `school_id` varchar(45) NOT NULL,
  `class_id` int(5) NOT NULL,
  `student_id` int(5) NOT NULL,
  `month` varchar(10) NOT NULL,
  `attended_days` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `id` int(11) NOT NULL,
  `province` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id`, `province`) VALUES
(1, 'Western'),
(2, 'Central'),
(3, 'Southern'),
(4, 'Northern'),
(5, 'Eastern'),
(6, 'North Western'),
(7, 'North Central'),
(8, 'Uva'),
(9, 'Sabaragamuwa');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
  `census_id` varchar(45) DEFAULT NULL,
  `schoolname` varchar(145) DEFAULT NULL,
  `province_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `telephone` varchar(45) DEFAULT NULL,
  `fax` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `principal_name` varchar(45) DEFAULT NULL,
  `principal_mobile` varchar(45) DEFAULT NULL,
  `principal_email` varchar(45) DEFAULT NULL,
  `coordinator_name` varchar(150) DEFAULT NULL,
  `coordinator_mobile` varchar(10) DEFAULT NULL,
  `coordinator_email` varchar(100) DEFAULT NULL,
  `lat` varchar(50) DEFAULT NULL,
  `lot` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `census_id`, `schoolname`, `province_id`, `district_id`, `zone_id`, `telephone`, `fax`, `email`, `principal_name`, `principal_mobile`, `principal_email`, `coordinator_name`, `coordinator_mobile`, `coordinator_email`, `lat`, `lot`) VALUES
(6, '17141', 'Sri Sumangala M.M.V.', 6, 18, 69, '0372267281', '', '', 'B. C. S. Wijesinghe', '076-9022875', '', NULL, NULL, NULL, '7.62009', '80.23372'),
(8, '00078', 'Lumbini Vidyalaya', 1, 1, 1, '114385243', '', '', 'Mr. K.G. Wimalasena', '777391922', 'lumbinicl@gmail.com', NULL, NULL, NULL, '6.88439', '79.86754'),
(9, '00023', 'Kotahena Central College', 1, 1, 1, '112324275', '', '', 'Mr.M.P.  Wirasinghe', '718483400', 'kcc1918@gmail.com', NULL, NULL, NULL, '6.94357', '79.8636'),
(10, '00250', 'Bomiriya Central College', 1, 1, 3, '112439444', '', '', 'Mr.W.A.R.A. Peiris', '714860620', 'bomiriyacentralcollege@gmail.com', NULL, NULL, NULL, '6.93496', '79.99905'),
(11, '01502', 'Senarath Paranawithana M.V.', 1, 2, 6, '332223679', '', '', 'Mr. A.Jayathissa', '714417525', 'udusenarathparanawithana@gmail.com', NULL, NULL, NULL, '7.12374', '79.97505'),
(12, '01301', 'Sri Dharmaloka M. V.', 1, 2, 6, '112911518', '', '', 'Mrs. A.G. Nimal Jayaweera', '71464442', 'principaldharmaloka@gmail.com', NULL, NULL, NULL, '6.96074', '79.90149'),
(13, '02241', 'Thissa M. M. V., Kalutara', 1, 3, 9, '342238456', '', '', 'Mr. K.A.D. Piyaratne', '711274729', 'tcc.kalutara@gmail.com', NULL, NULL, NULL, '6.60831', '79.95331'),
(14, '17420', 'Nakkawatta M. M. V.', 6, 18, 68, '372286024', '', '', 'Mr. J.W. Rohana Karunaratne', '779932925', 'sunilhennayaka@gmail.com', NULL, NULL, NULL, '7.45742', '80.14198'),
(15, '18072', 'Ananda National School', 6, 19, 73, '322266291', '', '', 'Mr. E.M. Pushpakumara', '718003085', 'anandanationalschool@gmail.com', NULL, NULL, NULL, '8.02227', '79.84001'),
(16, '18073', 'Zahira N. S.', 6, 19, 73, '322265473', '', '', 'Mr.   S.A.C.Yacub', '777412179', 'zahiranationalschool@gmail.com', NULL, NULL, NULL, '8.04029', '79.8288'),
(17, '21192', 'Haliela M.M.V.', 8, 22, 83, '552294304', '', '', 'Mr. R.M.W.B.Rathnayake', '718304748', 'mvhaliela@gmail.com', NULL, NULL, NULL, '6.95811', '81.03329'),
(18, '21464', 'Saraswathie M. M. V.', 8, 22, 83, '552223208', '', '', 'Mr. K. Thirulogashankar', '729158669', 'saraswathycentralcollege@gmail.com', NULL, NULL, NULL, '6.99669', '81.05706'),
(19, '21279', 'Kahagolla M. M.  V.', 8, 22, 84, '572227305', '', '', 'Mr. H.M.S.Premalal', '718211681', 'sunilhennayaka@gmail.com', NULL, NULL, NULL, '6.8162', '80.96579'),
(20, '22069', 'Mahanama M. M. V.', 8, 23, 89, '552276312', '', '', 'Mr. D.M.P. Bandara', '772317866', 'principal@mahanamacc.sch.lk', NULL, NULL, NULL, '6.87481', '81.34779'),
(21, '22146', 'Malwattawela  M. M. V.', 8, 23, 90, '552274990', '', '', 'Mr.U.J. Landekumara', '712924135', 'malwattawelammv.wellawaya@gmail.com', NULL, NULL, NULL, '6.73363', '81.11593'),
(22, '06393', 'Meepawala Amarasooriya V.', 3, 7, 27, '912231225', '', '', 'Mr. U.L.G. Kariyawasam', '715631962', 'amarasuriyameepawala@gmail.com', NULL, NULL, NULL, '6.10694', '80.21976'),
(23, '07383', 'Vijitha M. M. V.', 3, 8, 31, '412255116', '', '', 'Mr.S.A.Y.L.K. Rajasinghe', '712203833', '', NULL, NULL, NULL, '5.96637', '80.70264'),
(24, '08038', ' Rajapaksha M. M. V.,Weeraketiya', 3, 9, 37, '472246216', '', '', 'Mrs. P.C . Weerawardena', '716923668', 'weerakatiyarcc@gmail.com', NULL, NULL, NULL, '6.13499', '80.76982'),
(25, '19176', 'Anuradhapura M. M. V.', 7, 20, 75, '252222653', '', '', 'Mr. H.M. Abeykoon', '772297991', 'anuradhapuracentral@gmail.com', NULL, NULL, NULL, '8.33586', '80.40667'),
(26, '20069', 'Royal College ', 7, 21, 80, '272222039', '', '', 'Mr. I.K.K.R. Wijayawansa', '772041366', 'wravilal@yahoo.com', NULL, NULL, NULL, '7.9221', '81.01092'),
(27, '23092', 'Sivali Central College', 9, 24, 93, '452228936', '', '', 'Mr. O.P.M. Anurakumara', '712153259', 'siviali01@gmail.com', NULL, NULL, NULL, '6.71418', '80.38514'),
(28, '24577', 'Dudly Senanayake M.M.V.', 9, 25, 97, '352267269', '', '', 'Mr. W.A.D.R. Hemantha', '717707272', 'dscc.tho@gmail.com', NULL, NULL, NULL, '7.23769', '80.23564'),
(29, '03320', 'Marassana National School', 2, 4, 12, '812405678', '', '', 'Mr. D.R.J.D. Dasanayake', '718230851', 'nationalschool.marassana@gmail.com', NULL, NULL, NULL, '7.21764', '80.74097'),
(30, '03313', 'Hewahata M.M.V', 2, 4, 12, '812404203', '', '', 'Mr H.M.Karunaratne', '772631245', 'hewahatacc@gmail.com', NULL, NULL, NULL, '7.25227', '80.69112'),
(31, '03256', 'Rajawella Hindu N.S.', 2, 4, 16, '812375702', '', '', 'Mr. S. Mylvaganam', '774728709', 'rajawellahns@gmail.com', NULL, NULL, NULL, '7.29687', '80.73051'),
(32, '04003', 'Dambulla Central College', 2, 5, 19, '662284877', '', '', 'Mr. D.M.R.Disanayake', '718275766', 'ranjithdissanayake@gmail.com', NULL, NULL, NULL, '7.86329', '80.64626'),
(33, '05001', 'Gamini Central College', 2, 6, 22, '522222279', '', '', 'Mr. P.R.M.A. Pussallamankada', '727272311', 'gaminimmv.nuwaraeliya@gmail.com', NULL, NULL, NULL, '6.96017', '80.76979'),
(34, '05255', 'Norwood Tamil M.V.', 2, 6, 24, '512240100', '', '', 'Mr. Rajan', '718154749', 'rajans10@gmail.com', NULL, NULL, NULL, '6.83719', '80.60965'),
(35, '09353', 'Hindu College, Chavakachchari', 4, 10, 40, '212270350', '', '', 'Mr. Saruveswaran', '779727730', 'school1003002@gmail.com', NULL, NULL, NULL, '9.66483', '80.17289'),
(36, '12003', 'Vidyananda College', 4, 14, 48, '212061040', '', '', 'Mr. P.K. Sivalingam', '772380773', 'muvidyananda@gmail.com', NULL, NULL, NULL, '9.22427', '80.78097'),
(37, '13110', 'Gamini N. S.', 4, 13, 47, '242228113', '', '', 'Sanjeewa Abekoon', '711724239', 'gamininationalschool@gmail.com', NULL, NULL, NULL, '8.76206', '80.49444'),
(38, '11001', 'Sithyvinayagar Hindu college', 4, 12, 44, '232222321', '', '', 'Mr. Thanesweran', '718612587', 'mnshcprincipal@gmail.com', NULL, NULL, NULL, '8.9796', '79.91974'),
(39, '10001', 'Kilinochchi M. M. V.', 4, 11, 43, '212285115', '', '', 'Mr. M. Raweenthiran', '775857840', 'info@knkcc.com', NULL, NULL, NULL, '9.38161', '80.40911'),
(40, '16057', 'Sinhala M. M. V.', 5, 17, 62, '262222803', '', '', 'Mr.U.M. Upul kithsiri', '718272948', 'sinhalamv@gmail.com', NULL, NULL, NULL, '8.57584', '81.22608'),
(41, '16073', 'St\' Josephs National School', 5, 17, 62, '262222036', '', '', 'Rev.Wijayakamalan Alfred', '779559160', 'avkamalan@gmail.com', NULL, NULL, NULL, '8.57345', '81.22964'),
(42, '16187', 'Kinniya Central College', 5, 17, 65, '272236274', '', '', 'Mr. M.S.M. Rafeek', '776110294', 'kiniyacc@gmail.com', NULL, NULL, NULL, '8.49725', '81.18001'),
(43, '15152', 'Dehiattakandiya M.M.V.', 5, 16, 59, '272250202', '', '', 'Mr. P.K.S. Kumara', '718678512', 'dehiattakandiyadns@gmail.com', NULL, NULL, NULL, '7.66426', '81.04337'),
(44, '15067', 'D.S. Senanayaka College', 5, 16, 55, '632222375', '', '', 'Mr. S.K. Samaranayake', '715851888', 'dssnaamp@gmail.com', NULL, NULL, NULL, '7.30334', '81.67179'),
(45, '15265', 'Al Ashraq M.M.V.', 5, 16, 56, '672250040', '', '', 'Mr. S.M.M. Jabeer', '773736322', 'alashraqntr@gmail.com/jabeersmm@gmail.com', NULL, NULL, NULL, '7.34921', '81.84583'),
(46, '15291', 'Thambiluvil M. M. V.', 5, 16, 61, '672265099', '', '', 'Mr. V. Jayanthan', '775024968', 'intotmmv@sch.lk', NULL, NULL, NULL, '7.1209', '81.85236'),
(47, '14185', 'Padiruppu M. M. V.', 5, 15, 52, '652250111', '', '', 'Mr. Thambirajah', '776134421', 'paddiruppummv@gmail.com', NULL, NULL, NULL, '7.51716', '81.78613'),
(48, '14145', 'Kaththankudi M.M.V', 5, 15, 53, '652245726', '', '', 'Mr. S.H. Firthous', '772376770', 'sirthoussh29@gmail.com/kcckky@gmail.com', NULL, NULL, NULL, '7.68348', '81.73548');

-- --------------------------------------------------------

--
-- Table structure for table `students_info`
--

CREATE TABLE `students_info` (
  `time_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL,
  `index_no` varchar(45) DEFAULT NULL,
  `school_id` varchar(45) DEFAULT NULL,
  `nic` varchar(15) DEFAULT NULL,
  `full_name` varchar(45) DEFAULT NULL,
  `in_name` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `telephone` varchar(10) DEFAULT NULL,
  `medium` varchar(45) DEFAULT NULL,
  `dist_school` varchar(45) DEFAULT NULL COMMENT '	',
  `income` varchar(45) DEFAULT NULL,
  `travel_mode_id` int(11) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Phase 1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student_marks`
--

CREATE TABLE `student_marks` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `grade` varchar(45) DEFAULT NULL COMMENT '														',
  `year` varchar(45) DEFAULT NULL COMMENT '				',
  `month` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `marks` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student_subjects`
--

CREATE TABLE `student_subjects` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `grade` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `institute_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subject_list`
--

CREATE TABLE `subject_list` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject_list`
--

INSERT INTO `subject_list` (`id`, `subject_name`) VALUES
(1, 'Art & Designing'),
(6, 'Physical Education and Sports'),
(7, 'Food Processing Studies');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `school_id` varchar(45) DEFAULT NULL,
  `title` varchar(10) NOT NULL,
  `teacher_in_name` varchar(100) DEFAULT NULL COMMENT '	',
  `nic` varchar(15) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `teacher_mobile` varchar(10) DEFAULT NULL,
  `teacher_email` varchar(100) DEFAULT NULL,
  `teacher_trained_1` tinyint(1) DEFAULT NULL,
  `teacher_trained_2` int(2) DEFAULT NULL,
  `teacher_trained_3` int(2) DEFAULT NULL,
  `teacher_sub_1` int(11) DEFAULT NULL,
  `teacher_sub_2` int(11) DEFAULT NULL,
  `teacher_sub_3` int(11) DEFAULT NULL,
  `app_date_service` date DEFAULT NULL,
  `app_date_school` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `travel_mode`
--

CREATE TABLE `travel_mode` (
  `id` int(11) NOT NULL,
  `travel_mode` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `travel_mode`
--

INSERT INTO `travel_mode` (`id`, `travel_mode`) VALUES
(1, 'On Foot'),
(3, 'Bicycle'),
(4, 'Motor Bicycle'),
(5, 'Car'),
(6, 'Van'),
(7, 'Bus'),
(8, 'Train');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `uname` varchar(45) DEFAULT NULL,
  `passwd` varchar(100) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  `school_id` varchar(45) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `uname`, `passwd`, `role`, `school_id`, `teacher_id`) VALUES
(1, 'Kosala Gangabadage', 'kosala', 'kosala', '0', NULL, 0),
(2, 'School Coordinator', 'sadmin', 'sadmin', '1', '17141', 0),
(10, 'Finance Admin', 'finadmin', 'finadmin', '2', '17141', NULL),
(12, 'P. N. S. K. Perera', 'pnskperera', 'pnskperera', '3', '17141', 2),
(15, 'S. Coordinator', 'coord', 'coord', '1', '17141', NULL),
(16, 'ssssssss', 'ssss', 'ss', '1', '00250', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE `zone` (
  `id` int(11) NOT NULL,
  `district_id` int(11) DEFAULT NULL,
  `zone` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zone`
--

INSERT INTO `zone` (`id`, `district_id`, `zone`) VALUES
(1, 1, 'Colombo'),
(2, 1, 'Homagama'),
(3, 1, 'Srij ayawardanapura'),
(4, 1, 'Piliyandala'),
(5, 2, 'Gampaha'),
(6, 2, 'Minuwangoda'),
(7, 2, 'Negombo'),
(8, 2, 'Kelaniya'),
(9, 3, 'Kalutara'),
(10, 3, 'Matugama'),
(11, 3, 'Horana'),
(12, 4, 'Kandy'),
(13, 4, 'Denuwara'),
(14, 4, 'Gampola'),
(15, 4, 'Teldeniya'),
(16, 4, 'Wathegama'),
(17, 4, 'Katugastota'),
(18, 5, 'Matale'),
(19, 5, 'Galewala'),
(20, 5, 'Naula'),
(21, 5, 'Wilgamuwa'),
(22, 6, 'Nuwaraeliya'),
(23, 6, 'Kotmale'),
(24, 6, 'Hatton'),
(25, 6, 'Walapane'),
(26, 6, 'Hanguranketha'),
(27, 7, 'Galle'),
(28, 7, 'Elpitiya'),
(29, 7, 'Ambalangoda'),
(30, 7, 'Udugama'),
(31, 8, 'Matara'),
(32, 8, 'Akuressa'),
(33, 8, 'Mulatiyana (hakmana)'),
(34, 8, 'Morawaka (deniyaya)'),
(35, 9, 'Tangalle'),
(36, 9, 'Hambantota'),
(37, 9, 'Walasmulla'),
(38, 10, 'Jaffna'),
(39, 10, 'Islands'),
(40, 10, 'Thenmarachchi'),
(41, 10, 'Valikamam'),
(42, 10, 'Vadamarachchi'),
(43, 11, 'Kilinochchi'),
(44, 12, 'Mannar'),
(45, 12, 'Madhu'),
(46, 13, 'Vavuniya south'),
(47, 13, 'Vavuniya north'),
(48, 14, 'Mullativu'),
(49, 14, 'Thunukkai'),
(50, 15, 'Batticaloa'),
(51, 15, 'Kalkudah'),
(52, 15, 'Paddirippu'),
(53, 15, 'Batticaloa central'),
(54, 15, 'Batticoloa west'),
(55, 16, 'Ampara'),
(56, 16, 'Kalmunai'),
(57, 16, 'Sammanthurai'),
(58, 16, 'Mahaoya'),
(59, 16, 'Dehiattakandiya'),
(60, 16, 'Akkaraipattu'),
(61, 16, 'Thirukkovil'),
(62, 17, 'Trincomalee'),
(63, 17, 'Muttur'),
(64, 17, 'Kantale'),
(65, 17, 'Kinniya'),
(66, 17, 'Trincomalee north'),
(67, 18, 'Kurunegala'),
(68, 18, 'Kuliyapitiya'),
(69, 18, 'Nikaweratiya'),
(70, 18, 'Maho'),
(71, 18, 'Giriulla'),
(72, 18, 'Ibbagamuwa'),
(73, 19, 'Puttalam'),
(74, 19, 'Chilaw'),
(75, 20, 'Anuradhapura'),
(76, 20, 'Tambuttegama'),
(77, 20, 'Kekirawa'),
(78, 20, 'Galenbindunuwewa'),
(79, 20, 'Kebithigollewa'),
(80, 21, 'Polonnaruwa'),
(81, 21, 'Hingurakgoda'),
(82, 21, 'Dimbulagala'),
(83, 22, 'Badulla'),
(84, 22, 'Bandarawela'),
(85, 22, 'Mahiyanganaya'),
(86, 22, 'Welimada'),
(87, 22, 'Passara'),
(88, 22, 'Viyaluwa'),
(89, 23, 'Monaragala'),
(90, 23, 'Wellawaya'),
(91, 23, 'Bibile'),
(92, 23, 'Thanamalvila'),
(93, 24, 'Ratnapura'),
(94, 24, 'Balangoda'),
(95, 24, 'Nivitigala'),
(96, 24, 'Embilipitiya'),
(97, 25, 'Kegalle'),
(98, 25, 'Mawanella'),
(99, 25, 'Dehiowita');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_teacher` (`class_teacher`);

--
-- Indexes for table `class_students`
--
ALTER TABLE `class_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `census_id` (`school_id`),
  ADD KEY `subject_id` (`student_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `class_subjects`
--
ALTER TABLE `class_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `census_id` (`school_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `coordinators`
--
ALTER TABLE `coordinators`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index2` (`province_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index2` (`school_id`),
  ADD KEY `index3` (`funds_id`),
  ADD KEY `fund_id` (`funds_id`);

--
-- Indexes for table `funds`
--
ALTER TABLE `funds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index2` (`school_id`),
  ADD KEY `fund_id` (`fund_id`),
  ADD KEY `fund_id_2` (`fund_id`);

--
-- Indexes for table `funds_list`
--
ALTER TABLE `funds_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institutes`
--
ALTER TABLE `institutes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index2` (`school_id`);

--
-- Indexes for table `p1_attendance`
--
ALTER TABLE `p1_attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `census_id_UNIQUE` (`census_id`),
  ADD KEY `province` (`province_id`),
  ADD KEY `district` (`district_id`),
  ADD KEY `zone` (`zone_id`);

--
-- Indexes for table `students_info`
--
ALTER TABLE `students_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `std_id_UNIQUE` (`index_no`);

--
-- Indexes for table `student_marks`
--
ALTER TABLE `student_marks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index2` (`student_id`),
  ADD KEY `index3` (`subject_id`);

--
-- Indexes for table `student_subjects`
--
ALTER TABLE `student_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index2` (`student_id`),
  ADD KEY `index3` (`class_id`),
  ADD KEY `index4` (`subject_id`),
  ADD KEY `index5` (`teacher_id`),
  ADD KEY `index6` (`institute_id`);

--
-- Indexes for table `subject_list`
--
ALTER TABLE `subject_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nic` (`nic`),
  ADD KEY `index2` (`school_id`),
  ADD KEY `teacher_sub_1` (`teacher_sub_1`),
  ADD KEY `teacher_sub_2` (`teacher_sub_2`),
  ADD KEY `teacher_sub_3` (`teacher_sub_3`);

--
-- Indexes for table `travel_mode`
--
ALTER TABLE `travel_mode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uname_UNIQUE` (`uname`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index2` (`district_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `class_students`
--
ALTER TABLE `class_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `class_subjects`
--
ALTER TABLE `class_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `coordinators`
--
ALTER TABLE `coordinators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `funds`
--
ALTER TABLE `funds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `funds_list`
--
ALTER TABLE `funds_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `institutes`
--
ALTER TABLE `institutes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `p1_attendance`
--
ALTER TABLE `p1_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `students_info`
--
ALTER TABLE `students_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `student_marks`
--
ALTER TABLE `student_marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student_subjects`
--
ALTER TABLE `student_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subject_list`
--
ALTER TABLE `subject_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `travel_mode`
--
ALTER TABLE `travel_mode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `zone`
--
ALTER TABLE `zone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `fk_class_1` FOREIGN KEY (`class_teacher`) REFERENCES `teachers` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `class_subjects`
--
ALTER TABLE `class_subjects`
  ADD CONSTRAINT `fk_class_subjects_1` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_subjects_in_school_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`census_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_subjects_in_school_2` FOREIGN KEY (`subject_id`) REFERENCES `subject_list` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_subjects_in_school_3` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `fk_district_1` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `fk_expenses_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`census_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_expenses_2` FOREIGN KEY (`funds_id`) REFERENCES `funds` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `funds`
--
ALTER TABLE `funds`
  ADD CONSTRAINT `fk_finance_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`census_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_finance_2` FOREIGN KEY (`fund_id`) REFERENCES `funds_list` (`id`);

--
-- Constraints for table `institutes`
--
ALTER TABLE `institutes`
  ADD CONSTRAINT `fk_institutes_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`census_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `schools`
--
ALTER TABLE `schools`
  ADD CONSTRAINT `fk_school_1` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_school_2` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_school_3` FOREIGN KEY (`zone_id`) REFERENCES `zone` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `student_marks`
--
ALTER TABLE `student_marks`
  ADD CONSTRAINT `fk_student_marks_1` FOREIGN KEY (`student_id`) REFERENCES `students_info` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_marks_2` FOREIGN KEY (`subject_id`) REFERENCES `class_subjects` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `student_subjects`
--
ALTER TABLE `student_subjects`
  ADD CONSTRAINT `fk_student_subjects_1` FOREIGN KEY (`student_id`) REFERENCES `students_info` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_subjects_2` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_subjects_3` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_subjects_4` FOREIGN KEY (`subject_id`) REFERENCES `class_subjects` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `fk_teacher_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`census_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_teacher_2` FOREIGN KEY (`teacher_sub_1`) REFERENCES `subject_list` (`id`),
  ADD CONSTRAINT `fk_teacher_3` FOREIGN KEY (`teacher_sub_2`) REFERENCES `subject_list` (`id`),
  ADD CONSTRAINT `fk_teacher_4` FOREIGN KEY (`teacher_sub_3`) REFERENCES `subject_list` (`id`);

--
-- Constraints for table `zone`
--
ALTER TABLE `zone`
  ADD CONSTRAINT `fk_zone_1` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
