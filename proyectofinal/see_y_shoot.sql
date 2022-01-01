-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 04, 2020 at 05:39 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `see_y_shoot`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admins`
--

CREATE TABLE `tb_admins` (
  `id_admin` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `emain` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_admins`
--

INSERT INTO `tb_admins` (`id_admin`, `username`, `emain`, `password`) VALUES
(1, 'admin', 'email.codigo', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tb_photo`
--

CREATE TABLE `tb_photo` (
  `id_photo` int(50) NOT NULL,
  `photo_name` char(50) NOT NULL,
  `photo_description` text NOT NULL,
  `id_user` int(100) NOT NULL,
  `photo_category` enum('Aerea','Personas','Naturaleza','Paisajes') NOT NULL,
  `photo_status` varchar(20) NOT NULL,
  `submit_at` datetime NOT NULL,
  `approved_at` datetime NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_photo`
--

INSERT INTO `tb_photo` (`id_photo`, `photo_name`, `photo_description`, `id_user`, `photo_category`, `photo_status`, `submit_at`, `approved_at`, `image`) VALUES
(1, 'personas', 'bbvc', 4, 'Personas', 'aprobado', '2020-12-04 02:42:02', '0000-00-00 00:00:00', 'hYKoyx9njRw4BbLDCGPMpAXqtaUEJOQsgIVFr6HT2k.jpeg'),
(2, 'paisajes', 'adadas', 4, 'Paisajes', 'aprobado', '2020-12-04 02:57:15', '0000-00-00 00:00:00', 'LHlGbUZDk1su6BYT0WNjCRzyKxVwPer7g4fqvd8JFt.jpeg'),
(3, 'pan', 'fvcxvx', 5, 'Aerea', 'pendiente', '2020-12-04 04:30:52', '0000-00-00 00:00:00', 'FD1ZfbyjTu96ICGadHRkv7P2UxWKQz30X4ciEBrqLY.jpg'),
(4, 'naturaleza a', 'cvbcvbc', 7, 'Naturaleza', 'aprobado', '2020-12-04 04:31:00', '0000-00-00 00:00:00', 'pzmKU2wt6aSEi79VI5L0vN4FrxC3DlOu1jGyXcMJko.jpg'),
(5, 'naturaleza p', 'gtyuf', 7, 'Naturaleza', 'aprobado', '2020-12-04 04:31:10', '0000-00-00 00:00:00', 'mZx5ak0N6CoKSHyGBDlb4Usi1RJMjIfzwPdVOX8Ycr.jpg'),
(6, 'naturaleza', 'svxcvx', 7, 'Personas', 'aprobado', '2020-12-04 06:32:14', '0000-00-00 00:00:00', 'HAXSedj8CkwMLIabyUilmGY635JFtEuDzR4xTrVKvg.jpeg'),
(7, 'arbol', 'vcxvxcvx', 7, 'Naturaleza', 'aprobado', '2020-12-04 06:32:28', '0000-00-00 00:00:00', 'zHxRhNynPCg7vLijDGbSFd5clt4Ae2kYEaZ8o3qKu6.jpeg'),
(8, 'personas', 'vcxvxc', 7, 'Personas', 'aprobado', '2020-12-04 06:32:56', '0000-00-00 00:00:00', 'AtWBoeQyCXFwzphR9mHGJLDTvcOSkaNgdxr5MfnI6s.jpg'),
(9, 'aerea', 'cdsfsdfsd', 7, 'Aerea', 'negada', '2020-12-04 06:33:23', '0000-00-00 00:00:00', 'a1VnMLhltKzufTpbkgBARNeZDFXw2SPi0rYGsWCcoQ.jpg'),
(10, 'persona1', 'asdada', 7, 'Personas', 'aprobado', '2020-12-04 06:34:16', '0000-00-00 00:00:00', 'P54xGX2bjAQFYWOsCt3iudmBSJ6HEhwzNk9LlnUvID.jpg'),
(11, 'paisajec', 'dfjkt', 7, 'Paisajes', 'aprobado', '2020-12-04 06:35:45', '0000-00-00 00:00:00', 'IpzhkU5EKxbSFAQ296nBXwP3RHtoflaOTegJmWiCZ7.png'),
(15, 'persona8', 'gfdgfdgdfg', 7, 'Personas', 'pendiente', '2020-12-04 06:51:18', '0000-00-00 00:00:00', 'JN8qfbBo5HkijulQOrDxmgKdytF0cSV1TAh9UsIn7E.jpg'),
(16, 'paisaje7', 'dfs', 7, 'Paisajes', 'pendiente', '2020-12-04 06:51:34', '0000-00-00 00:00:00', 'nAatqsQVPUJhBDxdb8lN2gRFELXzC4IcYmKSoHkwi9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(100) NOT NULL,
  `username` text NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `registered_at` datetime NOT NULL,
  `last_login_at` datetime NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `username`, `password`, `user_email`, `registered_at`, `last_login_at`, `name`, `lastname`) VALUES
(4, 'jaime', '123', 'kmdslfmpsd', '2020-12-04 02:41:39', '2020-12-04 11:04:15', 'fmjdsfmsdkml', 'vmdlcsvmls'),
(5, 'carlos', '123', 'sada', '2020-12-04 06:38:27', '2020-12-04 11:04:44', 'fsdad', 'dfgdf'),
(7, 'delia', '123', 'dsada', '2020-12-04 06:38:59', '2020-12-04 09:09:17', 'vdsfs', 'lasdas'),
(8, 'cristobal', '123', 'cristobalpg1', '2020-12-04 07:21:32', '2020-12-04 07:21:38', 'cristobal', 'perez'),
(9, 'Aaron', '123', 'Aaron', '2020-12-04 10:41:49', '2020-12-04 11:06:10', 'Aaron', 'Flores'),
(10, '1', '1', '1', '2020-12-04 11:35:20', '2020-12-04 11:35:22', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_likes_photo`
--

CREATE TABLE `tb_user_likes_photo` (
  `id_likes` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `id_photo` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user_likes_photo`
--

INSERT INTO `tb_user_likes_photo` (`id_likes`, `id_user`, `id_photo`) VALUES
(1, 10, 6),
(4, 10, 8),
(6, 10, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admins`
--
ALTER TABLE `tb_admins`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_photo`
--
ALTER TABLE `tb_photo`
  ADD PRIMARY KEY (`id_photo`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_user_likes_photo`
--
ALTER TABLE `tb_user_likes_photo`
  ADD PRIMARY KEY (`id_likes`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admins`
--
ALTER TABLE `tb_admins`
  MODIFY `id_admin` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_photo`
--
ALTER TABLE `tb_photo`
  MODIFY `id_photo` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_user_likes_photo`
--
ALTER TABLE `tb_user_likes_photo`
  MODIFY `id_likes` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
