-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 01, 2019 at 02:10 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_penilaian`
--

-- --------------------------------------------------------

--
-- Table structure for table `spk_detail_kriteria`
--

CREATE TABLE `spk_detail_kriteria` (
  `kriteria_detail_id` int(10) NOT NULL,
  `kriteria_id` int(10) DEFAULT NULL,
  `nama_detail_kriteria` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spk_detail_kriteria`
--

INSERT INTO `spk_detail_kriteria` (`kriteria_detail_id`, `kriteria_id`, `nama_detail_kriteria`, `created_at`, `updated_at`) VALUES
(1, 4, 'Tarik teuing', '2019-09-22 19:39:34', '2019-09-22 20:06:48'),
(4, 4, 'Loba teuing', '2019-09-22 20:08:39', '2019-09-22 20:08:39'),
(5, 2, 'Data Detail', '2019-09-25 21:15:43', '2019-09-25 21:15:43'),
(6, 2, 'Inget', '2019-09-25 21:34:38', '2019-09-25 21:34:38'),
(7, 5, 'Diri', '2019-09-25 21:35:12', '2019-09-25 21:35:12'),
(8, 5, 'Iman', '2019-09-25 21:35:18', '2019-09-25 21:35:18');

-- --------------------------------------------------------

--
-- Table structure for table `spk_kriteria`
--

CREATE TABLE `spk_kriteria` (
  `kriteria_id` int(10) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `bobot` float DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` enum('1','2') DEFAULT '1' COMMENT '1 = Aktif, 2 = Tidak Aktif',
  `kode` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spk_kriteria`
--

INSERT INTO `spk_kriteria` (`kriteria_id`, `nama`, `bobot`, `created_at`, `updated_at`, `status`, `kode`) VALUES
(2, 'Kerja Sama Tim dan Peduli Teman', 0.9, '2019-09-19 00:15:41', '2019-09-22 18:52:36', '1', 'C2'),
(4, 'Integritas', 0.8, '2019-09-19 00:19:01', '2019-09-22 20:08:24', '1', 'C34');

-- --------------------------------------------------------

--
-- Table structure for table `spk_penilaian`
--

CREATE TABLE `spk_penilaian` (
  `penilaian_id` int(10) NOT NULL,
  `periode_id` int(10) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `target_user_id` int(10) DEFAULT NULL,
  `kriteria_id` int(10) DEFAULT NULL,
  `score` double(10,1) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spk_penilaian`
--

INSERT INTO `spk_penilaian` (`penilaian_id`, `periode_id`, `user_id`, `target_user_id`, `kriteria_id`, `score`, `created_at`, `updated_at`) VALUES
(51, 2, 4, 7, 4, 2.5, '2019-09-25', '2019-09-25'),
(52, 2, 4, 7, 2, 3.5, '2019-09-25', '2019-09-25');

-- --------------------------------------------------------

--
-- Table structure for table `spk_penilaian_respon`
--

CREATE TABLE `spk_penilaian_respon` (
  `penilaian_respon_id` int(10) NOT NULL,
  `penilaian_id` int(10) DEFAULT NULL,
  `kriteria_id` int(10) DEFAULT NULL,
  `kriteria_detail_id` int(10) DEFAULT NULL,
  `point` double(10,0) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spk_penilaian_respon`
--

INSERT INTO `spk_penilaian_respon` (`penilaian_respon_id`, `penilaian_id`, `kriteria_id`, `kriteria_detail_id`, `point`, `created_at`, `updated_at`) VALUES
(36, 51, 4, 1, 4, '2019-09-25', '2019-09-25'),
(37, 51, 4, 4, 1, '2019-09-25', '2019-09-25'),
(38, 52, 2, 5, 3, '2019-09-25', '2019-09-25'),
(39, 52, 2, 6, 4, '2019-09-25', '2019-09-25');

-- --------------------------------------------------------

--
-- Table structure for table `spk_periode_penilaian`
--

CREATE TABLE `spk_periode_penilaian` (
  `periode_id` int(10) NOT NULL,
  `nama_periode` varchar(50) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spk_periode_penilaian`
--

INSERT INTO `spk_periode_penilaian` (`periode_id`, `nama_periode`, `tanggal_mulai`, `tanggal_selesai`, `created_at`, `updated_at`, `user_id`) VALUES
(2, 'Periode 11111', '2019-09-01', '2019-09-30', '2019-09-25', '2019-09-25', 4);

-- --------------------------------------------------------

--
-- Table structure for table `spk_sys_module`
--

CREATE TABLE `spk_sys_module` (
  `module_id` int(11) NOT NULL,
  `module_name` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `spk_sys_module`
--

INSERT INTO `spk_sys_module` (`module_id`, `module_name`) VALUES
(1, 'Dashboard'),
(2, 'Syslevel'),
(3, 'Sysuser'),
(4, 'Sysmodule'),
(5, 'Systask'),
(6, 'Sysrole'),
(7, 'Sysapi'),
(8, 'Notfound'),
(9, 'User'),
(30, 'Kriteria'),
(31, 'Detailkriteria'),
(32, 'Periodepenilaian'),
(33, 'Penilaian'),
(34, 'laporan'),
(35, 'calculate');

-- --------------------------------------------------------

--
-- Table structure for table `spk_sys_role`
--

CREATE TABLE `spk_sys_role` (
  `role_id` int(11) NOT NULL,
  `user_level_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `spk_sys_role`
--

INSERT INTO `spk_sys_role` (`role_id`, `user_level_id`, `task_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 1, 12),
(13, 1, 13),
(14, 1, 14),
(15, 1, 15),
(16, 1, 16),
(17, 1, 17),
(18, 1, 18),
(19, 1, 19),
(20, 1, 20),
(21, 1, 21),
(22, 1, 22),
(23, 1, 23),
(24, 1, 24),
(25, 1, 25),
(26, 1, 26),
(27, 1, 27),
(28, 1, 29),
(29, 1, 28),
(120, 1, 112),
(121, 1, 113),
(122, 1, 110),
(123, 1, 111),
(124, 1, 116),
(125, 1, 117),
(126, 1, 114),
(127, 1, 115),
(128, 1, 120),
(129, 1, 121),
(130, 1, 118),
(131, 1, 119),
(132, 1, 124),
(133, 1, 125),
(134, 1, 122),
(135, 1, 123),
(136, 3, 1),
(137, 3, 116),
(138, 3, 117),
(139, 3, 114),
(140, 3, 115),
(141, 3, 112),
(142, 3, 113),
(143, 3, 110),
(144, 3, 111),
(145, 3, 26),
(146, 3, 124),
(147, 3, 125),
(148, 3, 122),
(149, 3, 123),
(150, 3, 120),
(151, 3, 121),
(152, 3, 118),
(153, 3, 119),
(154, 3, 23),
(155, 3, 25),
(156, 3, 24),
(157, 3, 22),
(158, 3, 3),
(159, 3, 5),
(160, 3, 4),
(161, 3, 2),
(162, 3, 11),
(163, 3, 13),
(164, 3, 12),
(165, 3, 10),
(166, 3, 19),
(167, 3, 21),
(168, 3, 20),
(169, 3, 18),
(170, 3, 15),
(171, 3, 17),
(172, 3, 16),
(173, 3, 14),
(174, 3, 7),
(175, 3, 9),
(176, 3, 8),
(177, 3, 6),
(178, 3, 27),
(179, 3, 29),
(180, 3, 28),
(181, 3, 126),
(182, 3, 127),
(183, 3, 128),
(184, 3, 129);

-- --------------------------------------------------------

--
-- Table structure for table `spk_sys_task`
--

CREATE TABLE `spk_sys_task` (
  `task_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `task_name` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `spk_sys_task`
--

INSERT INTO `spk_sys_task` (`task_id`, `module_id`, `task_name`) VALUES
(1, 1, 'view'),
(2, 2, 'list'),
(3, 2, 'add'),
(4, 2, 'edit'),
(5, 2, 'delete'),
(6, 3, 'list'),
(7, 3, 'add'),
(8, 3, 'edit'),
(9, 3, 'delete'),
(10, 4, 'list'),
(11, 4, 'add'),
(12, 4, 'edit'),
(13, 4, 'delete'),
(14, 5, 'list'),
(15, 5, 'add'),
(16, 5, 'edit'),
(17, 5, 'delete'),
(18, 6, 'list'),
(19, 6, 'add'),
(20, 6, 'edit'),
(21, 6, 'delete'),
(22, 7, 'list'),
(23, 7, 'add'),
(24, 7, 'edit'),
(25, 7, 'delete'),
(26, 8, 'view'),
(27, 9, 'logout'),
(28, 9, 'setting'),
(29, 9, 'profile'),
(110, 30, 'edit'),
(111, 30, 'list'),
(112, 30, 'add'),
(113, 30, 'delete'),
(114, 31, 'edit'),
(115, 31, 'list'),
(116, 31, 'add'),
(117, 31, 'delete'),
(118, 32, 'edit'),
(119, 32, 'list'),
(120, 32, 'add'),
(121, 32, 'delete'),
(122, 33, 'edit'),
(123, 33, 'list'),
(124, 33, 'add'),
(125, 33, 'delete'),
(126, 34, 'view'),
(127, 34, 'list'),
(128, 35, 'add'),
(129, 35, 'list');

-- --------------------------------------------------------

--
-- Table structure for table `spk_sys_user`
--

CREATE TABLE `spk_sys_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `user_email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `user_phone` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `user_address` text COLLATE latin1_general_ci NOT NULL,
  `user_level_id` int(11) DEFAULT NULL,
  `user_username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `user_password` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `user_status` enum('1','0') COLLATE latin1_general_ci NOT NULL DEFAULT '1' COMMENT '1 = Aktif, 0 = Tidak Aktif',
  `user_last_login` datetime NOT NULL,
  `user_is_login` smallint(6) NOT NULL,
  `user_photo` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `user_agama` enum('islam','kristen','budha','lainnya') COLLATE latin1_general_ci DEFAULT NULL,
  `user_tgl_lahir` date DEFAULT NULL,
  `user_start_work` date DEFAULT NULL,
  `user_nik` varchar(10) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `spk_sys_user`
--

INSERT INTO `spk_sys_user` (`user_id`, `user_name`, `user_email`, `user_phone`, `user_address`, `user_level_id`, `user_username`, `user_password`, `user_status`, `user_last_login`, `user_is_login`, `user_photo`, `user_agama`, `user_tgl_lahir`, `user_start_work`, `user_nik`) VALUES
(4, 'Super Admin', 'super@mail.com', '022', 'Bandung', 1, 'superadmin', '83626cc96878b9d30721cd4fb0baee63', '1', '2019-10-01 18:02:35', 0, NULL, NULL, NULL, NULL, NULL),
(6, 'Aldi', 'aldi@live.com', '0981293819', 'bandung', 3, '', '83626cc96878b9d30721cd4fb0baee63', '1', '2019-10-01 18:04:00', 1, NULL, NULL, NULL, NULL, NULL),
(7, 'Indar', 'indra@mail.com', '0981293819', 'Bandung Coret', 3, '', '575cd789df8f886cb92b92f174a20283', '1', '0000-00-00 00:00:00', 0, NULL, 'islam', '2019-09-25', '2019-09-25', 'NIK002');

-- --------------------------------------------------------

--
-- Table structure for table `spk_sys_user_level`
--

CREATE TABLE `spk_sys_user_level` (
  `user_level_id` int(11) NOT NULL,
  `user_level_name` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `spk_sys_user_level`
--

INSERT INTO `spk_sys_user_level` (`user_level_id`, `user_level_name`) VALUES
(1, 'Super Admin'),
(2, 'Direktur'),
(3, 'Penutur');

-- --------------------------------------------------------

--
-- Table structure for table `spk_user_forgot_password`
--

CREATE TABLE `spk_user_forgot_password` (
  `forgot_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `forgot_key` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `forgot_time` datetime NOT NULL,
  `forgot_status` enum('1','2','3') COLLATE latin1_general_ci NOT NULL COMMENT '1=active,2=used,3=expired',
  `forgot_expired_time` datetime NOT NULL,
  `forgot_actived_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `spk_v_penilaian`
-- (See below for the actual view)
--
CREATE TABLE `spk_v_penilaian` (
`penilaian_id` int(10)
,`periode_id` int(10)
,`user_id` int(10)
,`target_user_id` int(10)
,`kriteria_id` int(10)
,`score` double(10,1)
,`created_at` date
,`updated_at` date
,`user_name` varchar(50)
,`target_user_name` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `spk_v_penilaian`
--
DROP TABLE IF EXISTS `spk_v_penilaian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `spk_v_penilaian`  AS  select `penilaian_id` AS `penilaian_id`,`periode_id` AS `periode_id`,`user_id` AS `user_id`,`target_user_id` AS `target_user_id`,`kriteria_id` AS `kriteria_id`,`score` AS `score`,`created_at` AS `created_at`,`updated_at` AS `updated_at`,`spk_sys_user`.`user_name` AS `user_name`,`spk_sys_user_alias1`.`user_name` AS `target_user_name` from ((`spk_penilaian` join `spk_sys_user` on((`user_id` = `spk_sys_user`.`user_id`))) join `spk_sys_user` `spk_sys_user_alias1` on((`target_user_id` = `spk_sys_user_alias1`.`user_id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `spk_detail_kriteria`
--
ALTER TABLE `spk_detail_kriteria`
  ADD PRIMARY KEY (`kriteria_detail_id`);

--
-- Indexes for table `spk_kriteria`
--
ALTER TABLE `spk_kriteria`
  ADD PRIMARY KEY (`kriteria_id`);

--
-- Indexes for table `spk_penilaian`
--
ALTER TABLE `spk_penilaian`
  ADD PRIMARY KEY (`penilaian_id`);

--
-- Indexes for table `spk_penilaian_respon`
--
ALTER TABLE `spk_penilaian_respon`
  ADD PRIMARY KEY (`penilaian_respon_id`);

--
-- Indexes for table `spk_periode_penilaian`
--
ALTER TABLE `spk_periode_penilaian`
  ADD PRIMARY KEY (`periode_id`);

--
-- Indexes for table `spk_sys_module`
--
ALTER TABLE `spk_sys_module`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `spk_sys_role`
--
ALTER TABLE `spk_sys_role`
  ADD PRIMARY KEY (`role_id`),
  ADD KEY `fk_role_task` (`task_id`),
  ADD KEY `fk_role_level` (`user_level_id`);

--
-- Indexes for table `spk_sys_task`
--
ALTER TABLE `spk_sys_task`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `fk_task_module` (`module_id`);

--
-- Indexes for table `spk_sys_user`
--
ALTER TABLE `spk_sys_user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_user_level` (`user_level_id`);

--
-- Indexes for table `spk_sys_user_level`
--
ALTER TABLE `spk_sys_user_level`
  ADD PRIMARY KEY (`user_level_id`);

--
-- Indexes for table `spk_user_forgot_password`
--
ALTER TABLE `spk_user_forgot_password`
  ADD PRIMARY KEY (`forgot_id`),
  ADD KEY `fk_forgot_user` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `spk_detail_kriteria`
--
ALTER TABLE `spk_detail_kriteria`
  MODIFY `kriteria_detail_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `spk_kriteria`
--
ALTER TABLE `spk_kriteria`
  MODIFY `kriteria_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `spk_penilaian`
--
ALTER TABLE `spk_penilaian`
  MODIFY `penilaian_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `spk_penilaian_respon`
--
ALTER TABLE `spk_penilaian_respon`
  MODIFY `penilaian_respon_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `spk_periode_penilaian`
--
ALTER TABLE `spk_periode_penilaian`
  MODIFY `periode_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `spk_sys_module`
--
ALTER TABLE `spk_sys_module`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `spk_sys_role`
--
ALTER TABLE `spk_sys_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `spk_sys_task`
--
ALTER TABLE `spk_sys_task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `spk_sys_user`
--
ALTER TABLE `spk_sys_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `spk_sys_user_level`
--
ALTER TABLE `spk_sys_user_level`
  MODIFY `user_level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `spk_user_forgot_password`
--
ALTER TABLE `spk_user_forgot_password`
  MODIFY `forgot_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `spk_sys_role`
--
ALTER TABLE `spk_sys_role`
  ADD CONSTRAINT `fk_role_level` FOREIGN KEY (`user_level_id`) REFERENCES `spk_sys_user_level` (`user_level_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_role_task` FOREIGN KEY (`task_id`) REFERENCES `spk_sys_task` (`task_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `spk_sys_task`
--
ALTER TABLE `spk_sys_task`
  ADD CONSTRAINT `fk_task_module` FOREIGN KEY (`module_id`) REFERENCES `spk_sys_module` (`module_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `spk_sys_user`
--
ALTER TABLE `spk_sys_user`
  ADD CONSTRAINT `fk_user_level` FOREIGN KEY (`user_level_id`) REFERENCES `spk_sys_user_level` (`user_level_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `spk_user_forgot_password`
--
ALTER TABLE `spk_user_forgot_password`
  ADD CONSTRAINT `fk_forgot_user` FOREIGN KEY (`user_id`) REFERENCES `spk_sys_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
