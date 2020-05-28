-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2019 at 02:16 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eleavesystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminprincipalreg`
--

CREATE TABLE `adminprincipalreg` (
  `id` int(11) NOT NULL,
  `userid` varchar(150) NOT NULL,
  `password` varchar(200) NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminprincipalreg`
--

INSERT INTO `adminprincipalreg` (`id`, `userid`, `password`, `regdate`) VALUES
(7, 'sihala1921', 'a92df84da3a4509a98fd7ccca33d73a6', '2019-02-25 10:11:26');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `depid` varchar(50) NOT NULL,
  `depname` varchar(200) NOT NULL,
  `shortname` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `depid`, `depname`, `shortname`) VALUES
(26, '09', 'Electrical Engineering', 'EEEE'),
(25, '08', 'Mechanical Department', 'ME'),
(22, '07', 'Computer Scince and Engineering', 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `empreg`
--

CREATE TABLE `empreg` (
  `id` int(11) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `address` varchar(50) NOT NULL,
  `mobile` bigint(11) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `password` varchar(250) NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empreg`
--

INSERT INTO `empreg` (`id`, `firstname`, `lastname`, `dob`, `gender`, `email`, `department`, `address`, `mobile`, `userid`, `password`, `regdate`) VALUES
(1, 'sabir', 'hala', '2019-01-08', 'Male', 'sabirhala84@gmail.com', 'CSE', 'Koday Rayan road', 8980324571, 'sihala', 'mmm', '2019-01-01 10:28:24'),
(4, 'Shankar', 'Makwana', '1998-10-13', 'Male', 'sjmakwana333@gmail.com', 'Computer Scince and Engineering', 'Baladiya', 9898364553, 'sjmakwana', 'sjmakwana', '2019-01-10 10:11:35'),
(5, 'Madhavan', 'Gadhadara', '2018-05-03', 'Male', 'mbg07@gmail.com', 'Computer Scince and Engineering', 'mandvvi', 8469678222, 'mbg07', '1230', '2019-01-31 05:59:35'),
(6, 'SABIR', 'HALA', '1998-04-27', 'Male', 'sabirhusain.hala@gmail.com', 'Computer Scince and Engineering', 'Koday Rayan road', 7878775879, 'halasaheb', 'halasaheb1234', '2019-02-09 08:59:27'),
(7, 'wqewqe', 'wqewq', '2019-02-05', 'Male', 'sabirhala84@gmail.com', 'Mechanical Department', 'wqewqe', 8980324571, 'sihala1234', '01381948ad80f579d86851049fa60f65', '2019-02-25 09:36:24'),
(8, 'msd', 'msd', '1990-01-30', 'Male', 'cxbvcb@gmail.com', 'Computer Scince and Engineering', 'Bhuj', 7874478798, 'hod@hjd', '1843f7700512b152ceb4d16d03f6bd8a', '2019-03-11 13:17:46'),
(9, 'Sabir', 'Hala', '1998-04-27', '1', 'sabirhusain.hala@gmail.com', 'Computer Scince and Engineering', '			Koday,Mandvi						', 6351522061, 'sabir', '2c214947a824fd1d3b96579cfd53ae4e', '2019-04-02 04:35:44'),
(10, 'Saheb', 'Hala', '1998-04-27', '1', 'sabirhala1921@gmail.com', 'Computer Scince and Engineering', '						Mandvi			', 8980324571, 'saheb', '92d052373751966675f2c0f087d8c9ab', '2019-04-03 05:15:53'),
(11, 'sihala', 'sihala', '2019-04-03', 'Male', 'mbggadhadara@gmail.com', 'Mechanical Department', '			aa						', 2121212, 'hala', '5b203658f1b0da1596db00ba59ee753f', '2019-04-03 06:52:26'),
(14, 'asa', 'adas', '1992-11-11', 'Male', 'sabirhala84@gmail.com ', 'Electrical Engineering', '			ewqwqe						', 987654321, 'newone', '08b1d443ef0ab3677d2af8ef1afb1b28', '2019-04-06 06:45:56');

-- --------------------------------------------------------

--
-- Table structure for table `facultyleave`
--

CREATE TABLE `facultyleave` (
  `id` int(10) NOT NULL,
  `leavetype` varchar(200) NOT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL,
  `discription` varchar(200) NOT NULL,
  `applyeddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `hodremark` varchar(100) DEFAULT NULL,
  `hodremarkdate` timestamp NULL DEFAULT NULL,
  `principalremark` varchar(100) DEFAULT NULL,
  `principalremarkdate` timestamp NULL DEFAULT NULL,
  `statushod` varchar(50) NOT NULL,
  `statusprincipal` varchar(50) NOT NULL,
  `empid` varchar(200) DEFAULT NULL,
  `department` varchar(250) NOT NULL,
  `hodid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facultyleave`
--

INSERT INTO `facultyleave` (`id`, `leavetype`, `fromdate`, `todate`, `discription`, `applyeddate`, `hodremark`, `hodremarkdate`, `principalremark`, `principalremarkdate`, `statushod`, `statusprincipal`, `empid`, `department`, `hodid`) VALUES
(1, 'Medical Leave', '2019-04-03', '2019-04-04', '                                   \r\n                                 aaaa', '2019-04-02 09:52:20', 'ok', '2019-04-02 06:36:35', 'ok', '2019-04-02 09:52:20', 'Approved', 'Approved', '9', '', ''),
(2, 'Medical Leave', '2019-04-07', '2019-04-14', '                                   \r\n                                 need', '2019-04-02 06:40:30', 'ok', '2019-04-02 06:40:30', NULL, NULL, 'Rejectted', 'pending', '9', '', ''),
(3, 'Medical Leave', '2019-04-05', '2019-04-12', '                                   \r\n                                 please', '2019-04-02 09:53:07', 'aa', '2019-04-02 08:24:49', 'ok', '2019-04-02 09:53:07', 'Approved', 'Approved', '9', 'Mechanical Department', '9'),
(4, 'Medical Leave', '2019-04-06', '2019-04-13', '                                   \r\n                                 again', '2019-04-02 10:09:32', 'ok', '2019-04-02 08:27:11', 'ok', '2019-04-02 10:09:32', 'Approved', 'Approved', '9', 'Mechanical Department', '4'),
(5, 'Casual Leave', '2019-04-05', '2019-04-07', '                                   \r\n                                 dddddd', '2019-04-02 10:09:41', 'ok', '2019-04-02 08:31:46', 'no', '2019-04-02 10:09:41', 'Approved', 'Rejectted', '9', 'Computer Scince and Engineering', '1'),
(6, 'Restricted Holiday', '2019-04-04', '2019-04-11', '                                   \r\n                                 hooooo', '2019-04-02 10:19:53', 'ok', '2019-04-02 10:19:14', 'ok', '2019-04-02 10:19:53', 'Approved', 'Approved', '9', 'Mechanical Department', '4'),
(7, 'Medical Leave', '2019-04-04', '2019-04-04', '                                   \r\n                                 ok', '2019-04-03 10:35:39', 'ok', '2019-04-03 04:00:11', 'ok', '2019-04-03 10:35:39', 'Approved', 'Approved', '9', 'Mechanical Department', '4'),
(8, 'Medical Leave', '2019-04-05', '2019-04-07', '                                   \r\n                                 sdss', '2019-04-03 10:35:50', 'ok', '2019-04-03 04:47:32', 'ok', '2019-04-03 10:35:50', 'Approved', 'Approved', '9', 'Mechanical Department', '4'),
(9, 'Medical Leave', '2019-04-06', '2019-04-07', '                                   \r\n                                 aaa', '2019-04-03 10:35:56', 'ok', '2019-04-03 10:34:50', 'ok', '2019-04-03 10:35:56', 'Approved', 'Approved', '10', 'Computer Scince and Engineering', '1'),
(10, 'Medical Leave', '2019-04-06', '2019-04-13', '                                   \r\n                                 aaaaa', '2019-04-05 04:13:34', 'ok', '2019-04-04 06:43:34', 'ok', '2019-04-05 04:13:34', 'Approved', 'Approved', '9', 'Computer Scince and Engineering', '1'),
(11, 'Medical Leave', '2019-04-07', '2019-04-11', '                                   \r\n                                 ddddd', '2019-04-06 05:35:55', 'OK', '2019-04-06 04:50:51', 'ok', '2019-04-06 05:35:55', 'Approved', 'Approved', '11', 'Mechanical Department', '4'),
(12, 'Medical Leave', '2019-04-13', '2019-04-14', '                                   \r\n                                 ok', '2019-04-06 05:36:52', 'ok', '2019-04-06 05:36:20', 'ok', '2019-04-06 05:36:52', 'Approved', 'Approved', '11', 'Mechanical Department', '4'),
(13, 'Medical Leave', '2019-04-04', '2019-04-18', '                                   \r\n                                 qqqqqqqqqqqq', '2019-04-06 05:37:03', 'ok', '2019-04-06 05:36:26', 'ok', '2019-04-06 05:37:03', 'Approved', 'Approved', '11', 'Mechanical Department', '4'),
(24, 'Medical Leave', '2019-04-06', '2019-04-07', '                                   \r\n                            pppppppppppppp', '2019-04-08 10:27:46', NULL, NULL, NULL, NULL, 'pending', 'pending', '11', 'Mechanical Department', '4'),
(25, 'Restricted Holiday', '2019-04-12', '2019-04-07', '                                   \r\n                                 wwwwwwwwwwww', '2019-04-08 10:28:51', NULL, NULL, NULL, NULL, 'pending', 'pending', '11', 'Mechanical Department', '4'),
(26, 'Restricted Holiday', '2019-04-13', '2019-04-14', '                                   \r\n                                 asasasas', '2019-04-08 10:30:01', NULL, NULL, NULL, NULL, 'pending', 'pending', '11', 'Mechanical Department', '4'),
(27, 'Restricted Holiday', '2019-04-14', '2019-04-07', '                                   \r\n                                 eeeeeeeeeeee', '2019-04-08 10:31:30', NULL, NULL, NULL, NULL, 'pending', 'pending', '11', 'Mechanical Department', '4'),
(28, 'Restricted Holiday', '2019-04-13', '2019-04-06', '                                   \r\n                                 sssssssssss', '2019-04-08 10:33:50', NULL, NULL, NULL, NULL, 'pending', 'pending', '11', 'Mechanical Department', '4'),
(29, 'Restricted Holiday', '2019-04-14', '2019-04-13', '                                   \r\n                                 assdsadsadasd', '2019-04-08 10:35:52', NULL, NULL, NULL, NULL, 'pending', 'pending', '11', 'Mechanical Department', '4');

-- --------------------------------------------------------

--
-- Table structure for table `hodleave`
--

CREATE TABLE `hodleave` (
  `id` int(11) NOT NULL,
  `leavetype` varchar(100) NOT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL,
  `discription` varchar(250) NOT NULL,
  `applyeddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `principalremark` varchar(200) DEFAULT NULL,
  `principalremarkdate` varchar(50) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `empid` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hodleave`
--

INSERT INTO `hodleave` (`id`, `leavetype`, `fromdate`, `todate`, `discription`, `applyeddate`, `principalremark`, `principalremarkdate`, `status`, `empid`) VALUES
(1, 'Casual Leave', '2019-03-11', '2019-03-13', 'sdsadsad', '2019-03-11 13:45:44', 'ok', '2019-04-02 11:56:24 ', 'Approved', '1'),
(2, 'Casual Leave', '2019-03-13', '2019-03-15', 'adsadsafd', '2019-03-11 13:50:10', '', '2019-03-11 20:10:03 ', 'Rejectted', '3'),
(3, 'Medical Leave', '2019-03-08', '2019-03-22', '                                   \r\n                                 zxcv', '2019-03-31 13:44:01', 'sdsd', '2019-03-31 19:36:11 ', 'Approved', '1'),
(4, 'Medical Leave', '2019-04-06', '2019-04-14', '                                   \r\n                                 appied', '2019-04-01 11:30:20', 'ok done', '2019-04-01 17:16:51 ', 'Approved', '1'),
(5, 'Casual Leave', '2019-04-05', '2019-04-13', '                                   \r\n                                 dfds', '2019-04-02 06:01:47', 'asasas', '2019-04-02 11:34:01 ', 'Approved', '1'),
(6, 'Medical Leave', '2019-04-05', '2019-04-07', '                                   \r\n                                 qqqqq', '2019-04-02 06:09:12', 'aa', '2019-04-02 14:31:18 ', 'Approved', '1'),
(7, 'Medical Leave', '2019-04-12', '2019-04-14', '                                   \r\n                                 eeeee', '2019-04-02 06:11:44', 'aa', '2019-04-02 14:31:40 ', 'Rejectted', '1'),
(8, 'Medical Leave', '2019-04-06', '2019-04-05', '                                   \r\n                                 rrrr', '2019-04-02 06:12:43', 'aa', '2019-04-02 14:31:50 ', 'Approved', '1'),
(9, 'Casual Leave', '2019-04-07', '2019-04-14', '                                   \r\n                                 Trial Leava', '2019-04-02 11:21:55', 'no', '2019-04-02 18:09:54 ', 'Rejectted', '4'),
(10, 'Medical Leave', '2019-04-06', '2019-04-13', '                                   \r\n                                 required', '2019-04-03 04:18:50', 'ok', '2019-04-03 16:06:05 ', 'Approved', '1');

-- --------------------------------------------------------

--
-- Table structure for table `hodreg`
--

CREATE TABLE `hodreg` (
  `id` int(11) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `mono` bigint(11) NOT NULL,
  `userid` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hodreg`
--

INSERT INTO `hodreg` (`id`, `firstname`, `lastname`, `dob`, `gender`, `email`, `department`, `address`, `mono`, `userid`, `password`, `regdate`) VALUES
(1, 'Sabir', 'Hala', '2019-03-11', 'Male', 'dfdsfdf', 'Computer Scince and Engineering', 'fdsfd', 7874478798, 'hod@hjd', '96e89a298e0a9f469b9ae458d6afae9f', '2019-03-11 13:21:31'),
(2, 'abc', 'xyz', '2019-03-11', 'Male', 'dasds@gmail.com', 'Computer Scince and Engineering', 'sdsd', 6788798798, 'hodofhjd', '4d5f5bcf36f6cdf03c2c8c64105a3a8c', '2019-03-11 13:47:57'),
(3, 'fdf', 'fgfdg', '2019-03-13', 'Male', 'fsgfdg@gmail.com', 'Computer Scince and Engineering', 'sdsadD', 4546553456, 'head', '96e89a298e0a9f469b9ae458d6afae9f', '2019-03-11 13:49:51'),
(4, 'Sabir', 'Hala', '1996-04-27', 'Male', 'sabirhusain.hala@gmail.com', 'Mechanical Department', 'aaa', 1212121212, 'sihala', '008e69ef52cefe59eb50d0818ab4e3f8', '2019-04-02 08:06:23');

-- --------------------------------------------------------

--
-- Table structure for table `leavecount`
--

CREATE TABLE `leavecount` (
  `id` int(10) NOT NULL,
  `count` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leavecount`
--

INSERT INTO `leavecount` (`id`, `count`) VALUES
(6, 9),
(18, 4);

-- --------------------------------------------------------

--
-- Table structure for table `leavetype`
--

CREATE TABLE `leavetype` (
  `id` int(11) NOT NULL,
  `leavetype` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `creationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leavetype`
--

INSERT INTO `leavetype` (`id`, `leavetype`, `description`, `creationdate`) VALUES
(9, 'CL', 'Casual Leave', '2019-01-20 08:44:48'),
(10, 'ML', 'Medical Leave', '2019-01-20 08:44:55'),
(13, 'RL', 'Restricted Holiday', '2019-01-20 14:01:48');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `id` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `text` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`id`, `image`, `text`) VALUES
(7, 'WIN_20180413_12_07_07_Pro.jpg', 'fhg'),
(4, 'WIN_20170712_17_17_12_Pro.jpg', 'fgsdgsfdgsgfsgfsgfg'),
(5, 'WIN_20180406_14_40_15_Pro.jpg', 'dfdf'),
(6, 'WIN_20180406_14_40_09_Pro.jpg', 'dsg');

-- --------------------------------------------------------

--
-- Table structure for table `principalleave`
--

CREATE TABLE `principalleave` (
  `id` int(11) NOT NULL,
  `leavetype` varchar(100) NOT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL,
  `discription` varchar(250) NOT NULL,
  `applyeddate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `adminremark` varchar(200) DEFAULT NULL,
  `adminremarkdate` timestamp NULL DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `empid` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `principalleave`
--

INSERT INTO `principalleave` (`id`, `leavetype`, `fromdate`, `todate`, `discription`, `applyeddate`, `adminremark`, `adminremarkdate`, `status`, `empid`) VALUES
(36, 'Medical Leave', '2019-04-06', '2019-04-07', '                                   \r\n                                 qwer', '2019-04-01 11:02:34', 'asdasd', '2019-04-01 11:06:12', 'Approved', '1'),
(35, 'Medical Leave', '2019-04-07', '2019-04-14', '                                   \r\n                                 sasd', '2019-04-01 11:02:03', 'asdas', '2019-04-01 11:06:34', 'Approved', '1'),
(5, 'Casual Leave', '2019-01-30', '2019-02-13', 'fdsfdfdsf', '2019-02-26 08:32:23', 'gdhghgfhfghgfh', '2019-02-26 14:10:10', 'Rejectted', '1'),
(6, 'Restricted Holiday', '2019-02-12', '2019-02-27', 'fsdgfdgfgfdhghfg', '2019-02-26 09:19:00', 'fdsgfgfhfdhgfhgf', '2019-02-26 14:06:43', 'Approved', '3'),
(7, 'Restricted Holiday', '2019-02-12', '2019-02-19', 'dafdsfdsfsgf', '2019-02-26 09:20:51', NULL, '2019-02-26 09:20:51', 'Rejected', '1'),
(8, 'Medical Leave', '2019-02-05', '2019-02-12', 'fhfdjhjghjgh', '2019-02-27 10:57:52', 'retreyytrytry', '2019-02-27 10:59:09', 'Approved', '1'),
(9, 'Medical Leave', '2019-02-05', '2019-02-20', 'dfshghgfhgf', '2019-02-27 11:00:32', 'xxbxhxghgfhgfhgf', '2019-02-27 11:01:55', 'Rejectted', '1'),
(10, 'Medical Leave', '2019-02-05', '2019-02-06', 'xffdsffgfg', '2019-02-27 13:45:20', 'ok', '2019-03-01 07:39:40', 'Select', '3'),
(11, 'Casual Leave', '2019-03-04', '2019-05-04', 'Need 2 Days Leave', '2019-03-01 07:48:38', 'No', '2019-03-11 08:35:12', 'Rejectted', '1'),
(12, 'Casual Leave', '2019-03-11', '2019-03-05', 'sddasfdfdsf', '2019-03-30 13:52:22', 'dsfdsfds', '2019-03-31 06:24:26', 'Approved', '1'),
(13, 'Medical Leave', '2019-03-06', '2019-03-07', 'dfgfdsffh', '2019-03-31 06:26:16', 'fgfgfdg', '2019-03-31 06:26:29', 'Rejectted', '1'),
(14, 'Medical Leave', '2019-03-27', '2019-03-22', 'fdsfdsfds', '2019-03-31 06:30:10', 'fgfhgfhgfhghghgh', '2019-03-31 06:31:09', 'Approved', '1'),
(15, 'Restricted Holiday', '2019-03-06', '2019-03-22', 'dsfdfdsf', '2019-03-31 06:37:07', 'dsfdsf', '2019-03-31 09:07:17', 'Approved', '1'),
(16, 'Casual Leave', '2019-03-05', '2019-03-27', 'sdsgfdgsdfg', '2019-03-31 09:12:07', 'czvcxvc', '2019-03-31 09:12:23', 'Rejectted', '1'),
(17, 'Medical Leave', '2019-03-04', '2019-03-06', 'xcczvcvcv', '2019-03-31 09:13:27', ' cvcxv', '2019-03-31 09:13:44', 'Approved', '1'),
(18, 'Casual Leave', '2019-03-05', '2019-03-21', 'fsafdfsdf', '2019-03-31 09:16:58', 'vjhgj', '2019-03-31 09:20:51', 'Approved', '1'),
(19, 'Casual Leave', '2019-03-04', '2019-03-06', 'dfdsfsdf', '2019-03-31 09:24:19', 'dkjshdkasjdhksjd', '2019-03-31 09:25:35', 'Approved', '1'),
(20, 'Casual Leave', '2019-03-05', '2019-03-13', 'dfdsfdsgfg', '2019-03-31 09:29:23', 'hjghgjgjgj', '2019-03-31 09:29:43', 'Approved', '1'),
(21, 'Medical Leave', '2019-03-04', '2019-03-13', 'hjkhgkjfg', '2019-03-31 09:34:53', 'nckjzxcnkzxv', '2019-03-31 09:35:10', 'Approved', '1'),
(22, 'Medical Leave', '2019-03-05', '2019-03-06', 'vxvxbvbv', '2019-03-31 09:37:07', 'jhhjjh', '2019-03-31 09:39:06', 'Approved', '1'),
(23, 'Medical Leave', '2019-03-05', '2019-03-13', 'jhkcjxzhkjdzf', '2019-03-31 09:41:21', 'zfcv', '2019-03-31 09:43:02', 'Select Any', '1'),
(25, 'Casual Leave', '2019-02-25', '2019-03-10', 'dfdsfd', '2019-03-31 12:19:42', 'sdsd', '2019-03-31 13:47:08', 'Approved', '1'),
(38, 'Restricted Holiday', '2019-04-05', '2019-04-06', '                                   \r\n                                 want Want', '2019-04-01 11:22:24', 'ok', '2019-04-01 11:26:06', 'Approved', '1'),
(27, 'Casual Leave', '2019-03-07', '2019-03-23', '                                   \r\n                                 hhh', '2019-03-31 12:45:00', 'sdasad', '2019-03-31 14:29:28', 'Approved', '1'),
(28, 'Medical Leave', '2019-03-02', '2019-03-09', '                                   \r\n                                 hala saheb', '2019-03-31 12:49:17', 'sdsad', '2019-03-31 14:29:36', 'Approved', '1'),
(29, 'Restricted Holiday', '2019-03-01', '2019-03-16', '                                   \r\n                                 abcdefgh', '2019-03-31 12:50:46', 'sdsads', '2019-03-31 14:29:45', 'Approved', '1'),
(30, 'Medical Leave', '2019-03-13', '2019-03-14', '                                   \r\n                                 helllo', '2019-03-31 14:47:16', 'asdfgh', '2019-03-31 14:48:19', 'Approved', '1'),
(37, 'Casual Leave', '2019-04-07', '2019-04-14', '                                   \r\n                                 aaaaaa', '2019-04-01 11:14:31', 'ok', '2019-04-01 11:17:50', 'Approved', '1'),
(32, 'Casual Leave', '2019-04-06', '2019-04-06', '                                   \r\n                                 aaaa', '2019-04-01 08:18:23', 'dsdaas', '2019-04-01 09:41:19', 'Approved', '1'),
(33, 'Medical Leave', '2019-04-03', '2019-04-04', '                                   \r\n                                 tttt', '2019-04-01 09:43:45', 'asasd', '2019-04-01 10:17:27', 'Rejectted', '1'),
(34, 'Medical Leave', '2019-04-05', '2019-04-06', '                                   abcdefg\r\n                                 ', '2019-04-01 09:45:38', 'sdasdsd', '2019-04-01 10:17:38', 'Approved', '3'),
(39, 'Medical Leave', '2019-04-07', '2019-04-07', '                                   \r\n                                 asas', '2019-04-02 10:34:19', 'ok', '2019-04-02 10:35:02', 'Approved', '1');

-- --------------------------------------------------------

--
-- Table structure for table `principalreg`
--

CREATE TABLE `principalreg` (
  `id` int(11) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `principalreg`
--

INSERT INTO `principalreg` (`id`, `userid`, `password`, `regdate`) VALUES
(1, 'principal@HJD', 'D52F06D636530CEFF02A250195C89B71', '2019-02-25 09:50:38'),
(3, 'pppp', '2D7ACADF10224FFDABEAB505970A8934', '2019-02-26 09:17:54');

-- --------------------------------------------------------

--
-- Table structure for table `studentleave`
--

CREATE TABLE `studentleave` (
  `id` int(11) NOT NULL,
  `leavetype` varchar(200) NOT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL,
  `discription` varchar(200) NOT NULL,
  `applyeddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `facultyremark` varchar(200) DEFAULT NULL,
  `facultyremarkdate` timestamp NULL DEFAULT NULL,
  `hodremark` varchar(150) DEFAULT NULL,
  `hodremarkdate` timestamp NULL DEFAULT NULL,
  `statusfaculty` varchar(20) NOT NULL,
  `statushod` varchar(20) NOT NULL,
  `empid` varchar(200) DEFAULT NULL,
  `department` varchar(200) NOT NULL,
  `mentorname` varchar(200) NOT NULL,
  `mentorid` varchar(200) DEFAULT NULL,
  `hodid` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentleave`
--

INSERT INTO `studentleave` (`id`, `leavetype`, `fromdate`, `todate`, `discription`, `applyeddate`, `facultyremark`, `facultyremarkdate`, `hodremark`, `hodremarkdate`, `statusfaculty`, `statushod`, `empid`, `department`, `mentorname`, `mentorid`, `hodid`) VALUES
(1, 'Medical Leave', '2019-04-06', '2019-04-07', '                                   \r\n                                 aa', '2019-04-03 06:33:51', 'ok', '2019-04-03 09:13:24', 'ok', '2019-04-03 09:26:12', 'Approved', 'Approved', '2', 'Computer Scince and Engineering', 'Saheb Hala', '4', '1'),
(2, 'Medical Leave', '2019-04-05', '2019-04-04', '                                   \r\n                                 aaa', '2019-04-03 06:38:26', 'aa', '2019-04-03 09:13:30', 'ok', '2019-04-03 09:26:22', 'Rejectted', 'Rejectted', '1', 'Computer Scince and Engineering', 'Saheb Hala', '4', '1'),
(5, 'Restricted Holiday', '2019-04-06', '2019-04-13', '                                   wwwww\r\n                                 ', '2019-04-03 06:54:09', 'ok', '2019-04-03 08:40:36', 'ok', '2019-04-03 09:39:16', 'Approved', 'Approved', '2', 'Mechanical Department', 'sihala', '11', '4'),
(6, 'Restricted Holiday', '2019-04-03', '2019-04-05', '                                   \r\n                                 ooooooooooooo', '2019-04-03 08:02:14', 'no', '2019-04-03 08:40:47', 'ok', '2019-04-03 09:39:22', 'Rejectted', 'Approved', '2', 'Mechanical Department', 'sihala', '11', '4'),
(7, 'Restricted Holiday', '2019-04-06', '2019-04-06', '                                   \r\n                                 re', '2019-04-03 09:20:02', 'ok', '2019-04-03 09:21:23', 'ok', '2019-04-03 09:40:08', 'Approved', 'Approved', '2', 'Mechanical Department', 'sihala', '11', '4'),
(8, 'Restricted Holiday', '2019-04-06', '2019-04-13', '                                   \r\n                                 asdhsakdjhskdjhasdjhaskdjhskdjhaskdhksjhasdasdsdsdasd', '2019-04-03 09:35:31', 'ok', '2019-04-03 09:36:36', 'ok', '2019-04-03 09:40:13', 'Approved', 'Approved', '2', 'Mechanical Department', 'sihala', '11', '4'),
(9, 'Casual Leave', '2019-04-05', '2019-04-06', '                                   \r\n                                 aaaaa', '2019-04-04 07:48:56', 'ok', '2019-04-04 07:49:37', 'no', '2019-04-04 07:50:11', 'Approved', 'Rejectted', '2', 'Mechanical Department', 'sihala', '11', '4'),
(14, 'Medical Leave', '2019-04-03', '2019-04-04', '                                   \r\n                                 please', '2019-04-08 09:46:01', NULL, NULL, NULL, NULL, 'pending', 'pending', '2', 'Mechanical Department', 'sihala', '11', '4'),
(15, 'Medical Leave', '2019-04-09', '2019-04-11', '                                   \r\n                         rrrrrrrrrrrrrrrrrrr', '2019-04-08 09:49:32', NULL, NULL, NULL, NULL, 'pending', 'pending', '2', 'Mechanical Department', 'sihala', '11', '4'),
(16, 'Restricted Holiday', '2019-04-06', '2019-04-20', '                                   \r\n                                 ffdfddf', '2019-04-08 10:40:49', NULL, NULL, NULL, NULL, 'pending', 'pending', '2', 'Mechanical Department', 'sihala', '11', '4');

-- --------------------------------------------------------

--
-- Table structure for table `studentreg`
--

CREATE TABLE `studentreg` (
  `id` int(200) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `address` varchar(250) NOT NULL,
  `mobile` bigint(11) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentreg`
--

INSERT INTO `studentreg` (`id`, `firstname`, `lastname`, `dob`, `gender`, `email`, `department`, `address`, `mobile`, `userid`, `password`, `regdate`) VALUES
(1, 'Saheb', 'Hala', '1998-04-27', 'Male', 'sihala1921@gmail.com', 'Computer Scince and Engineering', '				ok					', 8980324571, 'saheb', '92d052373751966675f2c0f087d8c9ab', '2019-04-03 05:22:50'),
(2, 'sihalaaaaaa', 'Hala', '1998-04-27', 'Male', 'sabirhala1921@gmail.com', 'Mechanical Department', '				abcd					', 1212121212, 'sihala', '008e69ef52cefe59eb50d0818ab4e3f8', '2019-04-03 05:25:16'),
(3, 'as', 'as', '1997-02-25', 'Male', 'xyz@gmail.com', 'Electrical Engineering', '				aa					', 1212121212, 'new', '22af645d1859cb5ca6da0c484f1f37ea', '2019-04-04 05:36:11'),
(4, 'Madhavan', 'Gadhadara', '1998-02-14', 'Male', 'mbggadhadara@gmail.com', 'Mechanical Department', '					Koday				', 8469657801, 'msd', 'b0f2169aa609c42c1bc96d4aa5da3aea', '2019-04-08 06:43:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminprincipalreg`
--
ALTER TABLE `adminprincipalreg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empreg`
--
ALTER TABLE `empreg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facultyleave`
--
ALTER TABLE `facultyleave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hodleave`
--
ALTER TABLE `hodleave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hodreg`
--
ALTER TABLE `hodreg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leavecount`
--
ALTER TABLE `leavecount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leavetype`
--
ALTER TABLE `leavetype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `principalleave`
--
ALTER TABLE `principalleave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `principalreg`
--
ALTER TABLE `principalreg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentleave`
--
ALTER TABLE `studentleave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentreg`
--
ALTER TABLE `studentreg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminprincipalreg`
--
ALTER TABLE `adminprincipalreg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `empreg`
--
ALTER TABLE `empreg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `facultyleave`
--
ALTER TABLE `facultyleave`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `hodleave`
--
ALTER TABLE `hodleave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hodreg`
--
ALTER TABLE `hodreg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `leavecount`
--
ALTER TABLE `leavecount`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `leavetype`
--
ALTER TABLE `leavetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `principalleave`
--
ALTER TABLE `principalleave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `principalreg`
--
ALTER TABLE `principalreg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `studentleave`
--
ALTER TABLE `studentleave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `studentreg`
--
ALTER TABLE `studentreg`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
