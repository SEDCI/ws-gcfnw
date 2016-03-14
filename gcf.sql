-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2016 at 09:11 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gcf`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `registered_date` datetime NOT NULL,
  `registered_by` varchar(20) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `registered_date`, `registered_by`, `group_id`) VALUES
(1, 'admin', '$2y$10$R3IzZU40MTdsJChociFTKu05I8irjvLPADm4uJy0a/n4FPzl/vNxC', '2015-09-24 11:19:36', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
`id` int(11) NOT NULL,
  `event_date` date NOT NULL,
  `event_content` varchar(500) NOT NULL,
  `date_added` datetime NOT NULL,
  `added_by` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_children`
--

CREATE TABLE IF NOT EXISTS `m_children` (
`id` int(11) NOT NULL,
  `m_personal_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `birthdate` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_children`
--

INSERT INTO `m_children` (`id`, `m_personal_id`, `name`, `birthdate`) VALUES
(1, 3, 'C Name 1', '2015-09-30'),
(2, 3, 'C Name 2', '2015-10-01'),
(3, 3, 'C Name 3', '2015-10-02'),
(4, 4, 'Name of Child 1', '2015-01-01'),
(5, 4, 'Name of Child 2', '2015-01-02'),
(6, 4, 'Name of Child 3', '2015-01-03'),
(7, 5, 'Name of Child 1', '0000-00-00'),
(8, 5, 'Name of Child 2', '0000-00-00'),
(9, 5, 'Name of Child 3', '0000-00-00'),
(10, 6, 'NoC 1', '0000-00-00'),
(11, 6, 'NoC 2', '0000-00-00'),
(12, 6, 'NoC 3', '0000-00-00'),
(13, 7, 'NoC 1', '0000-00-00'),
(14, 7, 'NoC 2', '0000-00-00'),
(15, 7, 'NoC 3', '0000-00-00'),
(16, 8, 'Athena Borlaza', '0000-00-00'),
(17, 8, 'David Borlaza', '0000-00-00'),
(18, 8, '', '0000-00-00'),
(19, 9, 'Child 1', '2010-01-05'),
(20, 9, 'Child 2', '2010-01-06'),
(21, 9, 'Child 3', '2010-01-07'),
(26, 9, 'Child 4', '2010-01-08'),
(32, 10, 'Child 1', '2010-02-01'),
(33, 10, 'Child 2', '2010-02-02'),
(34, 10, 'Child 3', '2010-02-03'),
(35, 11, 'C1', '2010-02-01'),
(36, 11, 'C2', '2010-02-02'),
(37, 11, 'C3', '2010-02-03'),
(38, 12, 'Child 1', '2015-10-19'),
(39, 12, 'Child 2', '2015-10-20'),
(40, 12, 'Child 3', '2015-10-21');

-- --------------------------------------------------------

--
-- Table structure for table `m_education`
--

CREATE TABLE IF NOT EXISTS `m_education` (
`id` int(11) NOT NULL,
  `m_personal_id` int(11) NOT NULL,
  `level` char(1) NOT NULL,
  `school_name` varchar(150) NOT NULL,
  `course` varchar(150) NOT NULL,
  `inclusive_years` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_education`
--

INSERT INTO `m_education` (`id`, `m_personal_id`, `level`, `school_name`, `course`, `inclusive_years`) VALUES
(1, 4, 'h', 'High School 4', '', '2000-2001'),
(2, 4, 'c', 'College 4', 'BS Course 4', '2001-2002'),
(3, 4, 'g', 'Graduate School 4', 'MS Course 4', '2002-2003'),
(4, 4, 'p', 'Post Graduate School 4', 'DS Course 4', '2003-2004'),
(5, 5, 'h', 'High School 5', '', '1994-1995'),
(6, 5, 'c', 'College 5', 'BS Course 5', '1995-1996'),
(7, 5, 'g', 'Graduate 5', 'MS Course 5', '1997-1998'),
(8, 5, 'p', 'Post Graduate 5', 'DS Course 5', '1999-2000'),
(9, 6, 'h', 'HNoS', 'HC', '1990'),
(10, 6, 'c', 'CNoS', 'CC', '1991'),
(11, 6, 'g', 'GNoS', 'GC', '1992'),
(12, 6, 'p', 'PNoS', 'PC', '1993'),
(13, 7, 'h', 'HNoS', 'HC', '1991'),
(14, 7, 'c', 'CNoS', 'CC', '1992'),
(15, 7, 'g', 'GNoS', 'GC', '1993'),
(16, 7, 'p', 'PNoS', 'PC', '1994'),
(17, 8, 'h', 'Liliw National High School', 'High School', '2000-2004'),
(18, 8, 'c', 'Laguna State Polytechnic University', 'B.S. Information Technology', '2004-2008'),
(19, 8, 'g', '', '', ''),
(20, 8, 'p', '', '', ''),
(21, 9, 'h', 'High School', 'Course 1', '2000-2004'),
(22, 9, 'c', 'College', 'Course 2', '2004-2008'),
(23, 9, 'g', 'Graduate School', 'Course 3', '2008-2010'),
(24, 9, 'p', 'Post Graduate School', 'Course 4', '2010-2012'),
(31, 10, 'h', 'LNHS', 'HS', '2000-2004'),
(32, 10, 'c', 'LSPU', 'BSIT', '2004-2008'),
(33, 10, 'g', 'PGL', 'SDA', '2009-2014'),
(34, 10, 'p', 'SEDCI', 'WDB', '2015 to Present'),
(39, 11, 'h', 'HS1', 'HSC1', '2000'),
(40, 11, 'h', 'HS2', 'HSC2', '2001'),
(41, 11, 'h', '', '', ''),
(42, 11, 'c', 'CS1', '', '2002'),
(43, 11, 'g', '', 'GSC1', ''),
(44, 11, 'g', 'GS2', 'GSC2', '2003'),
(45, 11, 'g', 'GS3', 'GSC3', ''),
(46, 11, 'p', 'PGS1', 'PGSC1', ''),
(47, 11, 'p', '', 'PGSC2', '2004'),
(48, 12, 'h', 'LNHS', 'HS', '2000-2004'),
(49, 12, 'h', '', 'HS2', ''),
(50, 12, 'c', 'LSPU', 'BSIT', '2004-2006'),
(51, 12, 'c', 'LSPU2', 'BSIT2', '2006-2008'),
(52, 12, 'g', '', 'GSC1', '2008-2009'),
(53, 12, 'g', '', '', ''),
(54, 12, 'p', 'PGS1', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `m_personal`
--

CREATE TABLE IF NOT EXISTS `m_personal` (
`id` int(11) NOT NULL,
  `registration_code` varchar(8) NOT NULL,
  `registration_number` int(11) NOT NULL,
  `membership_id` varchar(20) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `nick_name` varchar(30) NOT NULL,
  `home_address` varchar(150) NOT NULL,
  `region_id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `muncity_id` int(11) NOT NULL,
  `baranggay_id` int(11) NOT NULL,
  `date_of_birth` date NOT NULL,
  `place_of_birth` varchar(150) NOT NULL,
  `home_number` varchar(30) NOT NULL,
  `cellphone` varchar(11) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `company_office` varchar(150) NOT NULL,
  `occupation` varchar(30) NOT NULL,
  `office_number` varchar(30) NOT NULL,
  `fax` varchar(15) NOT NULL,
  `office_email` varchar(100) NOT NULL,
  `civil_status` char(1) NOT NULL COMMENT 'S(ingle), (M)arried, (O)thers',
  `civil_status_others` varchar(20) NOT NULL,
  `date_first_visit` date DEFAULT NULL,
  `invited_by` varchar(150) NOT NULL,
  `s_last_name` varchar(50) NOT NULL,
  `s_first_name` varchar(50) NOT NULL,
  `s_middle_name` varchar(50) NOT NULL,
  `s_nick_name` varchar(30) NOT NULL,
  `date_married` date DEFAULT NULL,
  `s_birthdate` date DEFAULT NULL,
  `father_name` varchar(150) NOT NULL,
  `father_age` tinyint(4) NOT NULL,
  `mother_name` varchar(150) NOT NULL,
  `mother_age` tinyint(4) NOT NULL,
  `date_received` datetime DEFAULT NULL,
  `application_type` char(1) NOT NULL COMMENT 'For (B)aptism, (T)ransferee',
  `status` char(1) NOT NULL COMMENT '(N)ew Application, (A)pproved, (R)ejected, Archive(D)',
  `application_date` datetime DEFAULT NULL,
  `approval_date` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_personal`
--

INSERT INTO `m_personal` (`id`, `registration_code`, `registration_number`, `membership_id`, `last_name`, `first_name`, `middle_name`, `nick_name`, `home_address`, `region_id`, `province_id`, `muncity_id`, `baranggay_id`, `date_of_birth`, `place_of_birth`, `home_number`, `cellphone`, `email_address`, `company_office`, `occupation`, `office_number`, `fax`, `office_email`, `civil_status`, `civil_status_others`, `date_first_visit`, `invited_by`, `s_last_name`, `s_first_name`, `s_middle_name`, `s_nick_name`, `date_married`, `s_birthdate`, `father_name`, `father_age`, `mother_name`, `mother_age`, `date_received`, `application_type`, `status`, `application_date`, `approval_date`) VALUES
(1, 'AM201509', 1, '', 'Last Name', 'First Name', 'Middle Name', 'Nickname', 'Home Address', 0, 0, 0, 0, '1990-01-01', 'Place of Birth', '1234567', '09123456789', 'email@address.com', 'Company Office', 'Occupation', '7654321', '1111111', 'officeemail@address.com', 'O', 'Other Civil Status', '0000-00-00', 'Invited By', '', '', '', '', '0000-00-00', '0000-00-00', '', 0, '', 0, '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00'),
(2, 'AM201509', 2, '', 'Last Name 2', 'First Name 2', 'Middle Name 2', 'Nickname 2', 'Home Address 2', 0, 0, 0, 0, '1990-01-02', 'Place of Birth 2', '0', '09999999999', 'email2@address.com', 'Company Office 2', 'Occupation 2', '1234567', '2222222', 'officeemail2@address.com', 'S', '', '0000-00-00', 'Invited By 2', '', '', '', '', '0000-00-00', '0000-00-00', '', 0, '', 0, '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00'),
(3, 'AM201509', 3, '', 'Last Name 3', 'First Name 3', 'Middle Name 3', 'Nickname 3', 'Home Address 3', 0, 0, 0, 0, '1990-01-03', 'Place of Birth 3', '1234567', '09333333333', 'email3@address.com', 'Company Office 3', 'Occupation 3', '7654321', '3333333', 'officeemail3@address.com', 'M', '', '2015-09-30', 'Invited By 3', 'S Last Name', 'S First Name', 'S Middle Name', 'S Nickname', '1990-02-01', '2000-03-01', 'Father Name', 60, 'Mother Name', 60, '0000-00-00 00:00:00', 'B', 'R', '0000-00-00 00:00:00', '0000-00-00'),
(4, 'AM201509', 4, '', 'Last Name 4', 'First Name 4', 'Middle Name 4', 'Nickname 4', 'Home Address 4', 0, 0, 0, 0, '1990-01-04', 'Place of Birth 4', '0', '09994444444', 'email4@address.com', 'Company Office 4', 'Occupation 4', '9876543', '4444444', 'officeemail4@address.com', 'O', 'Others 4', '2015-09-30', 'Invited By 4', 'S Last Name 4', 'S First Name 4', 'S Middle Name 4', 'S Nickname 4', '2000-02-04', '2000-02-04', 'Father Name 4', 61, 'Mother Name 4', 62, '0000-00-00 00:00:00', 'B', 'A', '0000-00-00 00:00:00', '0000-00-00'),
(5, 'AM201509', 5, '', 'Last Name 5', 'First Name 5', 'Middle Name 5', 'Nickname 5', 'Home Address 5', 0, 0, 0, 0, '1990-01-05', 'Place of Birth 5', '12345678', '09995555555', 'email5@address.com', 'Company Office 5', 'Occupation 5', '9876543', '1237895', 'officeemail5@address.com', 'S', '', '2015-09-30', 'Invited By 5', 'S Last Name 5', 'S First Name 5', 'S Middle Name 5', 'S Nickname 5', '2000-02-05', '2000-02-05', 'Father Name 5', 60, 'Mother Name 5', 60, '0000-00-00 00:00:00', 'B', 'A', '0000-00-00 00:00:00', '0000-00-00'),
(6, 'AM201510', 1, '', 'LN', 'FN', 'MN', 'NN', 'HA', 0, 0, 0, 0, '2000-01-01', 'PoB', '1213141', '09999999999', 'pem@address.com', 'CO', 'O', '9898987', '1245789', 'oem@address.com', 'S', '', '2015-10-08', 'IB', 'SLN', 'SFN', 'SMN', 'SNN', '2000-01-02', '2000-01-03', 'FN', 60, 'MN', 60, '0000-00-00 00:00:00', 'B', 'A', '0000-00-00 00:00:00', '0000-00-00'),
(7, 'AM201510', 2, '', 'LN', 'FN', 'MN', 'NN', 'HA', 0, 0, 0, 0, '1990-01-01', 'PoB', '0', '09876543210', 'pem2@address.com', 'CO', 'O', '1234567', '1236547', 'oem@address.com', 'S', '', '2015-10-08', 'IB', 'SLN', 'SFN', 'SMN', 'SNN', '1990-01-02', '1990-01-03', 'FN', 60, 'MN', 60, '0000-00-00 00:00:00', 'B', 'R', '0000-00-00 00:00:00', '0000-00-00'),
(8, 'AM201510', 3, 'RM201510-00001', 'Borlaza', 'Rocky', 'Diez', 'Rocks', '123 Ilayang Taykin, Liliw, Laguna', 0, 0, 0, 0, '1988-06-18', 'San Pablo City, Laguna', '0', '09272338291', 'rocky_borlaza@yahoo.com', 'South Eastern Data Center, Inc.', 'Web Developer (Backend)', '(02) 3513798', '(02) 3513798', 'info@sedci.com', 'S', '', '2015-10-14', 'Testing', 'Borlaza', 'Reshelle Cristina', 'Victoria', 'Shelle', '2013-03-09', '1986-12-14', 'Isagani B. Borlaza', 61, 'Arlene D. Borlaza', 60, '0000-00-00 00:00:00', 'B', 'A', '0000-00-00 00:00:00', '0000-00-00'),
(9, '', 0, 'RM201510-00002', 'Borlaza', 'Rocky', 'Diez', 'Rocky', '130 Ilayang Taykin, Liliw, Laguna', 0, 0, 0, 0, '1988-06-18', 'San Pablo City, Laguna', '(02) 5632134', '09272338291', 'rdborlaza@gmail.com', 'SEDCI', 'Web Developer (Backend)', '(049) 1234567', '9876543', 'rocky.borlaza@southeasterndatacenter.com', 'O', 'Testing', '2015-10-15', 'None', 'SLN', 'SFN', 'SMN', 'SNN', '2015-10-15', '1990-03-27', 'Father', 40, 'Mother', 40, '0000-00-00 00:00:00', 'T', 'A', '0000-00-00 00:00:00', '0000-00-00'),
(10, '', 0, 'RM201510-00003', 'Borla', 'Ro', 'Di', 'RDB', 'HA', 0, 0, 0, 0, '1988-06-18', 'SPC', '(049) 1111111', '09787878787', 'rdb@g.com', 'SEDCI', 'WDBE', '(02) 2222222', '3333333', 'r.b@sedci.com', 'O', 'Test', '2015-10-15', 'IB', 'Vi', 'RC', 'Br', 'M', '2013-03-09', '1986-12-14', 'IB', 61, 'AB', 60, '0000-00-00 00:00:00', 'T', 'A', '0000-00-00 00:00:00', '0000-00-00'),
(11, '', 0, 'RM201510-00004', 'Admin LN', 'Admin FN', 'Admin MN', 'Admin NN', 'HA', 0, 0, 0, 0, '1990-01-01', 'POB', '1234567', '09123456789', 'adminpem@address.com', 'CO', 'OCCUPATION', '(02) 1111111', '(02) 2222222', 'oem@address.com', 'O', 'CS', '2015-10-21', 'IB', 'SLN', 'SFN', 'SMN', 'SNN', '2015-10-21', '1990-01-01', 'FN', 60, 'MN', 60, '2015-10-21 00:00:00', 'M', 'A', '0000-00-00 00:00:00', '0000-00-00'),
(12, 'AM201510', 4, 'RM201511-00002', 'Borlaza', 'Rocky', 'Diez', 'Rocky', '123 Ilayang Taykin, Liliw, Laguna', 0, 0, 0, 0, '1988-06-18', 'San Pablo City, Laguna', '(049) 5632134', '09272338291', 'rocky.borlaza@southeasterndatacenter.com', 'South Eastern Data Center, Inc.', 'Web Developer (Backend)', '1234567', 'N/A', 'rocky.borlaza@sedci.com', 'S', '', '2015-10-21', 'None', 'LN', 'FN', 'MN', 'NN', '2013-03-09', '1986-12-14', 'FN', 61, 'MN', 60, '2015-10-21 08:47:38', 'B', 'A', '0000-00-00 00:00:00', '0000-00-00'),
(13, 'AM201603', 1, '', 'Borlaza', 'Rocky', 'Diez', 'Rocky', 'Kamuning, QC', 0, 0, 0, 0, '1988-06-18', 'San Pablo City, Laguna', '1234567', '09123465789', 'rocky.borlaza@sedci.com', 'SEDCI', 'Web Developer', '', '', 'info@sedci.com', 'S', '', '0000-00-00', '', '', '', '', '', '0000-00-00', '0000-00-00', '', 0, '', 0, '2016-03-07 09:30:44', 'M', 'N', '0000-00-00 00:00:00', '0000-00-00'),
(14, 'AM201603', 2, '', 'Borlaza', 'Rocky', 'Diez', 'Rocky', 'Kamuning, QC', 0, 0, 0, 0, '1988-06-18', 'San Pablo City, Laguna', '1234567', '09123465789', 'info@sedci.com', 'SEDCI', 'Web Developer', '', '', 'info@sedci.com', 'S', '', '0000-00-00', '', '', '', '', '', '0000-00-00', '0000-00-00', '', 0, '', 0, '2016-03-07 09:31:38', 'M', 'N', '0000-00-00 00:00:00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `m_references`
--

CREATE TABLE IF NOT EXISTS `m_references` (
`id` int(11) NOT NULL,
  `m_personal_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `relationship` varchar(15) NOT NULL,
  `contact_numbers` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_religious`
--

CREATE TABLE IF NOT EXISTS `m_religious` (
  `m_personal_id` int(11) NOT NULL,
  `bg1_when` varchar(30) NOT NULL,
  `bg1_where` varchar(150) NOT NULL,
  `bg1_whom` varchar(100) NOT NULL,
  `bg2_yesno` char(1) DEFAULT NULL,
  `bg2_when` varchar(15) NOT NULL,
  `bg2_where` varchar(150) NOT NULL,
  `bg2_minister` varchar(100) NOT NULL,
  `bg3_church` varchar(100) NOT NULL,
  `bg3_years` varchar(15) NOT NULL,
  `bg3_pastor` varchar(100) NOT NULL,
  `bg3_address` varchar(150) NOT NULL,
  `bg3_telno` varchar(15) NOT NULL,
  `bg3_positions` varchar(100) NOT NULL,
  `bg4_reasons` varchar(300) NOT NULL,
  `bg5_yesno` char(1) DEFAULT NULL,
  `bg5_question` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_religious`
--

INSERT INTO `m_religious` (`m_personal_id`, `bg1_when`, `bg1_where`, `bg1_whom`, `bg2_yesno`, `bg2_when`, `bg2_where`, `bg2_minister`, `bg3_church`, `bg3_years`, `bg3_pastor`, `bg3_address`, `bg3_telno`, `bg3_positions`, `bg4_reasons`, `bg5_yesno`, `bg5_question`) VALUES
(4, 'On birth', 'Church', 'Priest', 'Y', 'When I''m 1 year', 'Church', 'Minister', 'Church Name 4', '1989 to Present', 'Pastor 4', 'Address 4', '1111112', 'None', 'Reason', 'Y', 'Answer'),
(5, '1443391200', 'Where 1 5', 'Whom 1 5', 'Y', '1443391200', 'Where 2 5', 'Minister 5', 'Church Name 5', '2003 to Present', 'Pastor 5', 'Address 5', '7894613', 'Positions 5', 'Reason 5', 'Y', 'Answer 5'),
(7, '1267398000', 'Where1', 'Whom1', 'Y', '1267484400', 'Where2', 'OM', 'CN', '1990 to Present', 'P', 'A', '5445454', 'PHIA', 'RL', 'Y', 'HHMM'),
(8, '582588000', 'Liliw', 'Priest', 'Y', '582588000', 'Liliw Church', 'Priest 2', 'St. John the Baptist Parish Church', '1988 to Present', 'Priest 3', 'Liliw, Laguna', '1234567', 'None', 'None', 'Y', 'I don''t know.'),
(9, '2010-01-01', 'Where 1', 'Whom 1', 'Y', '2010-01-02', 'Where 2', 'Officiating Minister', 'Church', '1988 to Present', 'Pastor', 'Somewhere near', '4564564', 'None', 'Reasons?', 'N', 'Hmm..'),
(10, '2015-10-15', 'Here', 'Whom', 'Y', '2015-10-15', 'Here', 'Ministro', 'Simbahan', '1988 to Present', 'Pastor', 'LL', '(049) 3333333', 'All', 'Not Available', 'Y', 'Hmm...'),
(11, '2015-10-21', 'Where1', 'Whom1', 'Y', '2015-10-21', 'Where2', 'OM', 'CN', '2015', 'Pastor', 'A', '(049) 3333333', 'NONE', 'NONE', 'Y', 'NA'),
(12, '2015-10-21', 'Where1', 'Whom1', 'Y', '2015-10-21', 'Where2', 'OM', 'CN', '2015', 'P', 'A', '1234567', 'None', 'None', 'Y', 'N/A'),
(14, 'Unknown', '', '', NULL, 'Unknown', '', '', '', '', '', '', '', '', '', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `m_requirements`
--

CREATE TABLE IF NOT EXISTS `m_requirements` (
  `m_personal_id` int(11) NOT NULL,
  `done` tinyint(4) NOT NULL,
  `f_testimony` varchar(50) NOT NULL,
  `mc_facilitator` varchar(100) NOT NULL,
  `mc_date` date NOT NULL,
  `mc_place` varchar(150) NOT NULL,
  `f_endorsement` varchar(50) NOT NULL,
  `f_baptism_cert` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `m_personal_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `registered_date` datetime NOT NULL,
  `registered_by` varchar(20) NOT NULL,
  `verification_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `m_personal_id`, `email`, `password`, `registered_date`, `registered_by`, `verification_date`) VALUES
(1, 3, 'email3@address.com', '$2y$10$R3IzZU40MTdsJChociFTKu1gL/XWRrTXZK0YRNr/PCt', '2015-10-13 00:00:00', 'SYSTEM', '0000-00-00 00:00:00'),
(2, 4, 'email4@address.com', '$2y$10$R3IzZU40MTdsJChociFTKu1gL/XWRrTXZK0YRNr/PCt', '2015-10-13 00:00:00', 'SYSTEM', '0000-00-00 00:00:00'),
(3, 6, 'pem@address.com', '$2y$10$R3IzZU40MTdsJChociFTKu1gL/XWRrTXZK0YRNr/PCt', '2015-10-13 00:00:00', 'SYSTEM', '0000-00-00 00:00:00'),
(4, 5, 'email5@address.com', '$2y$10$R3IzZU40MTdsJChociFTKu1gL/XWRrTXZK0YRNr/PCt', '2015-10-13 00:00:00', 'SYSTEM', '0000-00-00 00:00:00'),
(5, 8, 'rocky_borlaza@yahoo.com', '$2y$10$R3IzZU40MTdsJChociFTKu1gL/XWRrTXZK0YRNr/PCtLG3coFsvWO', '2015-10-14 00:00:00', 'SYSTEM', '0000-00-00 00:00:00'),
(6, 12, 'rocky.borlaza@southeasterndatacenter.com', '$2y$10$R3IzZU40MTdsJChociFTKuNV1x/iJXNzERNpk1BIwL9', '2015-11-04 00:00:00', 'SYSTEM', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_verification`
--

CREATE TABLE IF NOT EXISTS `user_verification` (
  `verification_key` varchar(40) NOT NULL,
  `m_personal_id` int(11) NOT NULL,
  `date_generated` datetime NOT NULL,
  `status` char(1) NOT NULL COMMENT '(V)erified; (U)nverified'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `weekly_message`
--

CREATE TABLE IF NOT EXISTS `weekly_message` (
`id` int(11) NOT NULL,
  `verse` varchar(30) NOT NULL,
  `content` varchar(300) NOT NULL,
  `ppt_file` varchar(50) NOT NULL,
  `ios_file` varchar(50) NOT NULL,
  `pdf_file` varchar(50) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `weekly_message`
--

INSERT INTO `weekly_message` (`id`, `verse`, `content`, `ppt_file`, `ios_file`, `pdf_file`, `date_added`) VALUES
(1, '2 Cor 5:17', '17 Therefore, if anyone is in Christ, the new creation has come: The old has gone, the new is here!', 'be49a63e28fa7f0d4a6d56eb23510fca.pptx', '', '13faf50905a3dd798a25636589c7967c.pdf', '2015-11-16 05:42:32'),
(2, 'John 3:16', 'For God so loved the world that He gave His only begotten Son and that whoever believes in Him shall not perish but have everlasting life.', '', '', '1ee45d3d76cc3466ce9e6c1f5ffffc2c.pdf', '2015-11-16 11:26:01');

-- --------------------------------------------------------

--
-- Table structure for table `weekly_message_comments`
--

CREATE TABLE IF NOT EXISTS `weekly_message_comments` (
`id` int(11) NOT NULL,
  `weekly_message_id` int(11) NOT NULL,
  `membership_id` varchar(20) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `date_commented` datetime NOT NULL,
  `status` char(1) NOT NULL COMMENT '(U)napproved; (A)ctive; (R)emoved',
  `approved_by` varchar(20) NOT NULL,
  `removed_by` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `weekly_message_comments`
--

INSERT INTO `weekly_message_comments` (`id`, `weekly_message_id`, `membership_id`, `email_address`, `comment`, `date_commented`, `status`, `approved_by`, `removed_by`) VALUES
(1, 1, 'RM201510-00001', 'rocky_borlaza@yahoo.com', 'This is a test comment. Hope it works.', '2015-11-16 10:53:42', 'A', 'SYSTEM', 'admin'),
(2, 1, 'RM201510-00001', 'rocky_borlaza@yahoo.com', 'This is another test comment. And it really works! This is another test comment. And it really works! This is another test comment. And it really works! This is another test comment. And it really works! This is another test comment. And it really works! This is another test comment. And it really works! This is another test comment. And it really works!', '2015-11-16 11:13:37', 'R', 'SYSTEM', 'admin'),
(3, 2, 'RM201510-00001', 'rocky_borlaza@yahoo.com', 'This is a test comment for the next weekly message.', '2015-11-16 11:26:38', 'R', 'SYSTEM', 'admin'),
(4, 2, 'RM201510-00001', 'rocky_borlaza@yahoo.com', 'This is a test comment for the next weekly message. This is a test comment for the next weekly message. This is a test comment for the next weekly message. This is a test comment for the next weekly message. This is a test comment for the next weekly message.', '2015-11-17 09:23:17', 'R', 'SYSTEM', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_children`
--
ALTER TABLE `m_children`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_education`
--
ALTER TABLE `m_education`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_personal`
--
ALTER TABLE `m_personal`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_references`
--
ALTER TABLE `m_references`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_religious`
--
ALTER TABLE `m_religious`
 ADD PRIMARY KEY (`m_personal_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_verification`
--
ALTER TABLE `user_verification`
 ADD PRIMARY KEY (`verification_key`);

--
-- Indexes for table `weekly_message`
--
ALTER TABLE `weekly_message`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weekly_message_comments`
--
ALTER TABLE `weekly_message_comments`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `m_children`
--
ALTER TABLE `m_children`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `m_education`
--
ALTER TABLE `m_education`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `m_personal`
--
ALTER TABLE `m_personal`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `m_references`
--
ALTER TABLE `m_references`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `weekly_message`
--
ALTER TABLE `weekly_message`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `weekly_message_comments`
--
ALTER TABLE `weekly_message_comments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
