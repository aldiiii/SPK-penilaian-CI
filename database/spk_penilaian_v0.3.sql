/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 100134
 Source Host           : localhost:3306
 Source Schema         : spk_penilaian

 Target Server Type    : MySQL
 Target Server Version : 100134
 File Encoding         : 65001

 Date: 25/09/2019 19:44:38
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for spk_detail_kriteria
-- ----------------------------
DROP TABLE IF EXISTS `spk_detail_kriteria`;
CREATE TABLE `spk_detail_kriteria` (
  `kriteria_detail_id` int(10) NOT NULL AUTO_INCREMENT,
  `kriteria_id` int(10) DEFAULT NULL,
  `nama_detail_kriteria` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`kriteria_detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of spk_detail_kriteria
-- ----------------------------
BEGIN;
INSERT INTO `spk_detail_kriteria` VALUES (1, 4, 'Tarik teuing', '2019-09-22 19:39:34', '2019-09-22 20:06:48');
INSERT INTO `spk_detail_kriteria` VALUES (4, 4, 'Loba teuing', '2019-09-22 20:08:39', '2019-09-22 20:08:39');
COMMIT;

-- ----------------------------
-- Table structure for spk_kriteria
-- ----------------------------
DROP TABLE IF EXISTS `spk_kriteria`;
CREATE TABLE `spk_kriteria` (
  `kriteria_id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `bobot` float DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` enum('1','2') DEFAULT '1' COMMENT '1 = Aktif, 2 = Tidak Aktif',
  `kode` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`kriteria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of spk_kriteria
-- ----------------------------
BEGIN;
INSERT INTO `spk_kriteria` VALUES (2, 'Kerja Sama Tim dan Peduli Teman', 0.9, '2019-09-19 00:15:41', '2019-09-22 18:52:36', '1', 'C2');
INSERT INTO `spk_kriteria` VALUES (4, 'Integritas', 0.8, '2019-09-19 00:19:01', '2019-09-22 20:08:24', '1', 'C34');
COMMIT;

-- ----------------------------
-- Table structure for spk_periode_penilaian
-- ----------------------------
DROP TABLE IF EXISTS `spk_periode_penilaian`;
CREATE TABLE `spk_periode_penilaian` (
  `periode_id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_periode` varchar(50) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`periode_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of spk_periode_penilaian
-- ----------------------------
BEGIN;
INSERT INTO `spk_periode_penilaian` VALUES (2, 'Periode 11111', '2019-09-01', '2019-09-30', '2019-09-25', '2019-09-25', 4);
COMMIT;

-- ----------------------------
-- Table structure for spk_sys_module
-- ----------------------------
DROP TABLE IF EXISTS `spk_sys_module`;
CREATE TABLE `spk_sys_module` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of spk_sys_module
-- ----------------------------
BEGIN;
INSERT INTO `spk_sys_module` VALUES (1, 'Dashboard');
INSERT INTO `spk_sys_module` VALUES (2, 'Syslevel');
INSERT INTO `spk_sys_module` VALUES (3, 'Sysuser');
INSERT INTO `spk_sys_module` VALUES (4, 'Sysmodule');
INSERT INTO `spk_sys_module` VALUES (5, 'Systask');
INSERT INTO `spk_sys_module` VALUES (6, 'Sysrole');
INSERT INTO `spk_sys_module` VALUES (7, 'Sysapi');
INSERT INTO `spk_sys_module` VALUES (8, 'Notfound');
INSERT INTO `spk_sys_module` VALUES (9, 'User');
INSERT INTO `spk_sys_module` VALUES (30, 'Kriteria');
INSERT INTO `spk_sys_module` VALUES (31, 'Detailkriteria');
INSERT INTO `spk_sys_module` VALUES (32, 'Periodepenilaian');
INSERT INTO `spk_sys_module` VALUES (33, 'Penilaian');
COMMIT;

-- ----------------------------
-- Table structure for spk_sys_role
-- ----------------------------
DROP TABLE IF EXISTS `spk_sys_role`;
CREATE TABLE `spk_sys_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_level_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  PRIMARY KEY (`role_id`),
  KEY `fk_role_task` (`task_id`),
  KEY `fk_role_level` (`user_level_id`),
  CONSTRAINT `fk_role_level` FOREIGN KEY (`user_level_id`) REFERENCES `spk_sys_user_level` (`user_level_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_role_task` FOREIGN KEY (`task_id`) REFERENCES `spk_sys_task` (`task_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of spk_sys_role
-- ----------------------------
BEGIN;
INSERT INTO `spk_sys_role` VALUES (1, 1, 1);
INSERT INTO `spk_sys_role` VALUES (2, 1, 2);
INSERT INTO `spk_sys_role` VALUES (3, 1, 3);
INSERT INTO `spk_sys_role` VALUES (4, 1, 4);
INSERT INTO `spk_sys_role` VALUES (5, 1, 5);
INSERT INTO `spk_sys_role` VALUES (6, 1, 6);
INSERT INTO `spk_sys_role` VALUES (7, 1, 7);
INSERT INTO `spk_sys_role` VALUES (8, 1, 8);
INSERT INTO `spk_sys_role` VALUES (9, 1, 9);
INSERT INTO `spk_sys_role` VALUES (10, 1, 10);
INSERT INTO `spk_sys_role` VALUES (11, 1, 11);
INSERT INTO `spk_sys_role` VALUES (12, 1, 12);
INSERT INTO `spk_sys_role` VALUES (13, 1, 13);
INSERT INTO `spk_sys_role` VALUES (14, 1, 14);
INSERT INTO `spk_sys_role` VALUES (15, 1, 15);
INSERT INTO `spk_sys_role` VALUES (16, 1, 16);
INSERT INTO `spk_sys_role` VALUES (17, 1, 17);
INSERT INTO `spk_sys_role` VALUES (18, 1, 18);
INSERT INTO `spk_sys_role` VALUES (19, 1, 19);
INSERT INTO `spk_sys_role` VALUES (20, 1, 20);
INSERT INTO `spk_sys_role` VALUES (21, 1, 21);
INSERT INTO `spk_sys_role` VALUES (22, 1, 22);
INSERT INTO `spk_sys_role` VALUES (23, 1, 23);
INSERT INTO `spk_sys_role` VALUES (24, 1, 24);
INSERT INTO `spk_sys_role` VALUES (25, 1, 25);
INSERT INTO `spk_sys_role` VALUES (26, 1, 26);
INSERT INTO `spk_sys_role` VALUES (27, 1, 27);
INSERT INTO `spk_sys_role` VALUES (28, 1, 29);
INSERT INTO `spk_sys_role` VALUES (29, 1, 28);
INSERT INTO `spk_sys_role` VALUES (120, 1, 112);
INSERT INTO `spk_sys_role` VALUES (121, 1, 113);
INSERT INTO `spk_sys_role` VALUES (122, 1, 110);
INSERT INTO `spk_sys_role` VALUES (123, 1, 111);
INSERT INTO `spk_sys_role` VALUES (124, 1, 116);
INSERT INTO `spk_sys_role` VALUES (125, 1, 117);
INSERT INTO `spk_sys_role` VALUES (126, 1, 114);
INSERT INTO `spk_sys_role` VALUES (127, 1, 115);
INSERT INTO `spk_sys_role` VALUES (128, 1, 120);
INSERT INTO `spk_sys_role` VALUES (129, 1, 121);
INSERT INTO `spk_sys_role` VALUES (130, 1, 118);
INSERT INTO `spk_sys_role` VALUES (131, 1, 119);
INSERT INTO `spk_sys_role` VALUES (132, 1, 124);
INSERT INTO `spk_sys_role` VALUES (133, 1, 125);
INSERT INTO `spk_sys_role` VALUES (134, 1, 122);
INSERT INTO `spk_sys_role` VALUES (135, 1, 123);
COMMIT;

-- ----------------------------
-- Table structure for spk_sys_task
-- ----------------------------
DROP TABLE IF EXISTS `spk_sys_task`;
CREATE TABLE `spk_sys_task` (
  `task_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_id` int(11) NOT NULL,
  `task_name` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`task_id`),
  KEY `fk_task_module` (`module_id`),
  CONSTRAINT `fk_task_module` FOREIGN KEY (`module_id`) REFERENCES `spk_sys_module` (`module_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of spk_sys_task
-- ----------------------------
BEGIN;
INSERT INTO `spk_sys_task` VALUES (1, 1, 'view');
INSERT INTO `spk_sys_task` VALUES (2, 2, 'list');
INSERT INTO `spk_sys_task` VALUES (3, 2, 'add');
INSERT INTO `spk_sys_task` VALUES (4, 2, 'edit');
INSERT INTO `spk_sys_task` VALUES (5, 2, 'delete');
INSERT INTO `spk_sys_task` VALUES (6, 3, 'list');
INSERT INTO `spk_sys_task` VALUES (7, 3, 'add');
INSERT INTO `spk_sys_task` VALUES (8, 3, 'edit');
INSERT INTO `spk_sys_task` VALUES (9, 3, 'delete');
INSERT INTO `spk_sys_task` VALUES (10, 4, 'list');
INSERT INTO `spk_sys_task` VALUES (11, 4, 'add');
INSERT INTO `spk_sys_task` VALUES (12, 4, 'edit');
INSERT INTO `spk_sys_task` VALUES (13, 4, 'delete');
INSERT INTO `spk_sys_task` VALUES (14, 5, 'list');
INSERT INTO `spk_sys_task` VALUES (15, 5, 'add');
INSERT INTO `spk_sys_task` VALUES (16, 5, 'edit');
INSERT INTO `spk_sys_task` VALUES (17, 5, 'delete');
INSERT INTO `spk_sys_task` VALUES (18, 6, 'list');
INSERT INTO `spk_sys_task` VALUES (19, 6, 'add');
INSERT INTO `spk_sys_task` VALUES (20, 6, 'edit');
INSERT INTO `spk_sys_task` VALUES (21, 6, 'delete');
INSERT INTO `spk_sys_task` VALUES (22, 7, 'list');
INSERT INTO `spk_sys_task` VALUES (23, 7, 'add');
INSERT INTO `spk_sys_task` VALUES (24, 7, 'edit');
INSERT INTO `spk_sys_task` VALUES (25, 7, 'delete');
INSERT INTO `spk_sys_task` VALUES (26, 8, 'view');
INSERT INTO `spk_sys_task` VALUES (27, 9, 'logout');
INSERT INTO `spk_sys_task` VALUES (28, 9, 'setting');
INSERT INTO `spk_sys_task` VALUES (29, 9, 'profile');
INSERT INTO `spk_sys_task` VALUES (110, 30, 'edit');
INSERT INTO `spk_sys_task` VALUES (111, 30, 'list');
INSERT INTO `spk_sys_task` VALUES (112, 30, 'add');
INSERT INTO `spk_sys_task` VALUES (113, 30, 'delete');
INSERT INTO `spk_sys_task` VALUES (114, 31, 'edit');
INSERT INTO `spk_sys_task` VALUES (115, 31, 'list');
INSERT INTO `spk_sys_task` VALUES (116, 31, 'add');
INSERT INTO `spk_sys_task` VALUES (117, 31, 'delete');
INSERT INTO `spk_sys_task` VALUES (118, 32, 'edit');
INSERT INTO `spk_sys_task` VALUES (119, 32, 'list');
INSERT INTO `spk_sys_task` VALUES (120, 32, 'add');
INSERT INTO `spk_sys_task` VALUES (121, 32, 'delete');
INSERT INTO `spk_sys_task` VALUES (122, 33, 'edit');
INSERT INTO `spk_sys_task` VALUES (123, 33, 'list');
INSERT INTO `spk_sys_task` VALUES (124, 33, 'add');
INSERT INTO `spk_sys_task` VALUES (125, 33, 'delete');
COMMIT;

-- ----------------------------
-- Table structure for spk_sys_user
-- ----------------------------
DROP TABLE IF EXISTS `spk_sys_user`;
CREATE TABLE `spk_sys_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `nik` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `fk_user_level` (`user_level_id`),
  CONSTRAINT `fk_user_level` FOREIGN KEY (`user_level_id`) REFERENCES `spk_sys_user_level` (`user_level_id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of spk_sys_user
-- ----------------------------
BEGIN;
INSERT INTO `spk_sys_user` VALUES (4, 'Super Admin', 'super@mail.com', '022', 'Bandung', 1, 'superadmin', '83626cc96878b9d30721cd4fb0baee63', '1', '2019-09-25 18:41:46', 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `spk_sys_user` VALUES (6, 'Aldi', 'aldi@live.com', '0981293819', 'bandung', 3, '', 'af4028244df706746e6964103cfe7f55', '1', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for spk_sys_user_level
-- ----------------------------
DROP TABLE IF EXISTS `spk_sys_user_level`;
CREATE TABLE `spk_sys_user_level` (
  `user_level_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_level_name` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`user_level_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of spk_sys_user_level
-- ----------------------------
BEGIN;
INSERT INTO `spk_sys_user_level` VALUES (1, 'Super Admin');
INSERT INTO `spk_sys_user_level` VALUES (2, 'Direktur');
INSERT INTO `spk_sys_user_level` VALUES (3, 'Penutur');
COMMIT;

-- ----------------------------
-- Table structure for spk_user_forgot_password
-- ----------------------------
DROP TABLE IF EXISTS `spk_user_forgot_password`;
CREATE TABLE `spk_user_forgot_password` (
  `forgot_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `forgot_key` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `forgot_time` datetime NOT NULL,
  `forgot_status` enum('1','2','3') COLLATE latin1_general_ci NOT NULL COMMENT '1=active,2=used,3=expired',
  `forgot_expired_time` datetime NOT NULL,
  `forgot_actived_time` datetime NOT NULL,
  PRIMARY KEY (`forgot_id`),
  KEY `fk_forgot_user` (`user_id`),
  CONSTRAINT `fk_forgot_user` FOREIGN KEY (`user_id`) REFERENCES `spk_sys_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

SET FOREIGN_KEY_CHECKS = 1;
