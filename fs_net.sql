-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2015 at 08:14 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fs_net`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_email` varchar(255) NOT NULL,
  `u_pwd` varchar(60) NOT NULL,
  `u_f_name` varchar(50) NOT NULL,
  `u_l_name` varchar(50) NOT NULL,
  `u_b_day` date NOT NULL,
  `u_about` text NOT NULL,
  `u_nickName` varchar(50) NOT NULL,
  `u_reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`u_id`),
  UNIQUE KEY `u_email` (`u_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_email`, `u_pwd`, `u_f_name`, `u_l_name`, `u_b_day`, `u_about`, `u_nickName`, `u_reg_date`) VALUES
(4, 'tttt@ttt.com', '$2y$10$2i7Al7VJFteacJI9Qb.ErO5dTNosEbQkLhU/IyH8tOByboKuq8Rv2', 'dddddd', 'vvvvvv', '1987-03-04', 'dfsdgfsgfdg', 'rrrrrr', '2015-08-01 07:47:34'),
(5, 'bbbb@bbbbb.com', '$2y$10$OKErVubNkkiTsecKgfhZo.PA9Wu8dyOGop4LTfJMUlPGTCl/TabCi', 'vvvv', 'vvvvvbbbbb', '1987-03-03', 'fgdfgdfg', 'yyyy', '2015-08-01 08:14:05'),
(6, 'vdsvd@fgdfg.com', '$2y$10$0ojppL9lHr2AlJU/qQeVCewUbeRY6mOLrsiZjZ6d9Eh4bb50F2gWa', '', '', '1989-01-01', '', 'gf', '2015-08-01 08:23:08'),
(7, 'fffff@hhhhhh.com', '$2y$10$ecgm8QERJhSfhdDgHJ6EzOMwdbm1EpLl9avwhe3CqfGUrGsdKMrKy', '', '', '1989-01-01', '', 'gf', '2015-08-01 08:24:52'),
(9, 'stdgdfg@fdgfgd', '$2y$10$Kef0hADgQ5vHeqsSEWFHiO7bLQP53C4TZdCuDqXBw57OxSDDkAj02', '', '', '1989-01-01', '', 'gf', '2015-08-01 08:29:55'),
(10, 'tytytytyt@fgdhgdh', '$2y$10$u6BytnBzQJd.huePflQpZ.dLr7h.a8PftUedpe3dmspIy4UWkJ2zS', '', '', '1989-01-01', '', 'gf', '2015-08-01 08:40:13'),
(11, 'gggg@fggg', '$2y$10$m61LNMPJjTOcsXWyqtOmRuzplQw15s3nH5/4E7kFRped29O1yz7Vm', 'first', 'Last', '1989-01-01', '', 'ttttt', '2015-08-01 08:40:48'),
(12, 'newtrue@gggg.com', '@$2y$10$snIlecwbowG.NvrNGCvWXechqAQbCvsNYEovreIdv6lag55NfbkD', 'alex234324', 's65675675sss', '1995-05-02', 'i am sooooo                                                  ', 'green', '2015-08-01 12:34:39'),
(14, 'fff@fffff.com', '$2y$10$LkUEuKt48ZETKhjXRogmBeWxsdZC8sF9EhAIncZo6EXEbEppYA0PK', 'bbbbbbfgffffgg', 'lllllllggggg', '2015-08-12', 'dfsdsgsgdfgdf', 'vcvscvdfsvdfb', '2015-08-01 17:15:35'),
(16, 'valeri4@gmail.com', '$2y$10$6fAC4ec.GM18Aq0g7N9fC.BFtxNFbCDUaU4DcwMlDu2D3Ah9GroVS', 'Valery', 'Dubina', '1989-04-11', '<p>bcvbcvbcvb</p>\r\n<ul>\r\n<li>dfsdfdsf</li>\r\n<li>sdfsdfsd</li>\r\n<li>sdfsdfsd</li>\r\n</ul>', '', '2015-08-02 14:20:21'),
(17, '', '$2y$10$4QPqBsy8sx6/UXynLpi4Ie2zIIV8NnQZqc0f5Xrhty1qVKwP0.57a', '', '', '1970-01-01', '', '', '2015-08-06 09:34:54');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
