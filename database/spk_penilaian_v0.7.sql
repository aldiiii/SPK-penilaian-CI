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

 Date: 01/10/2019 23:21:35
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for spk_calculate
-- ----------------------------
DROP TABLE IF EXISTS `spk_calculate`;
CREATE TABLE `spk_calculate` (
  `calculate_id` int(10) NOT NULL AUTO_INCREMENT,
  `periode_id` int(10) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total` float(5,1) DEFAULT NULL,
  `label` varchar(50) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`calculate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of spk_calculate
-- ----------------------------
BEGIN;
INSERT INTO `spk_calculate` VALUES (1, 2, 6, 3.3, 'Baik', '2019-10-01', '2019-10-01');
INSERT INTO `spk_calculate` VALUES (2, 2, 7, 3.8, 'Sangat Baik', '2019-10-01', '2019-10-01');
INSERT INTO `spk_calculate` VALUES (3, 2, 8, 2.7, 'Cukup', '2019-10-01', '2019-10-01');
COMMIT;

-- ----------------------------
-- Table structure for spk_detail_calculate
-- ----------------------------
DROP TABLE IF EXISTS `spk_detail_calculate`;
CREATE TABLE `spk_detail_calculate` (
  `calculate_detail_id` int(10) NOT NULL AUTO_INCREMENT,
  `calculate_id` int(10) DEFAULT NULL,
  `kriteria_id` int(10) DEFAULT NULL,
  `score` float(5,1) DEFAULT NULL,
  `bobot` float(5,1) DEFAULT NULL,
  `max` float(5,1) DEFAULT NULL,
  `pembagian` float(5,1) DEFAULT NULL,
  `hasil_bobot` float(5,1) DEFAULT NULL,
  `periode_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`calculate_detail_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of spk_detail_calculate
-- ----------------------------
BEGIN;
INSERT INTO `spk_detail_calculate` VALUES (1, 1, 2, 3.1, 0.8, 3.2, 1.0, 0.8, 2);
INSERT INTO `spk_detail_calculate` VALUES (2, 1, 4, 2.8, 0.8, 3.4, 0.8, 0.6, 2);
INSERT INTO `spk_detail_calculate` VALUES (3, 1, 5, 3.0, 0.8, 3.8, 0.8, 0.6, 2);
INSERT INTO `spk_detail_calculate` VALUES (4, 1, 6, 3.0, 0.8, 3.4, 0.9, 0.7, 2);
INSERT INTO `spk_detail_calculate` VALUES (5, 1, 7, 2.5, 0.8, 3.8, 0.7, 0.6, 2);
INSERT INTO `spk_detail_calculate` VALUES (6, 2, 2, 3.1, 0.8, 3.2, 1.0, 0.8, 2);
INSERT INTO `spk_detail_calculate` VALUES (7, 2, 4, 3.4, 0.8, 3.4, 1.0, 0.8, 2);
INSERT INTO `spk_detail_calculate` VALUES (8, 2, 5, 3.5, 0.8, 3.8, 0.9, 0.7, 2);
INSERT INTO `spk_detail_calculate` VALUES (9, 2, 6, 3.2, 0.8, 3.4, 0.9, 0.7, 2);
INSERT INTO `spk_detail_calculate` VALUES (10, 2, 7, 3.7, 0.8, 3.8, 1.0, 0.8, 2);
INSERT INTO `spk_detail_calculate` VALUES (11, 3, 2, 2.4, 0.8, 3.2, 0.8, 0.6, 2);
INSERT INTO `spk_detail_calculate` VALUES (12, 3, 4, 2.3, 0.8, 3.4, 0.7, 0.6, 2);
INSERT INTO `spk_detail_calculate` VALUES (13, 3, 5, 2.4, 0.8, 3.8, 0.6, 0.5, 2);
INSERT INTO `spk_detail_calculate` VALUES (14, 3, 6, 2.2, 0.8, 3.4, 0.6, 0.5, 2);
INSERT INTO `spk_detail_calculate` VALUES (15, 3, 7, 2.1, 0.8, 3.8, 0.6, 0.5, 2);
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of spk_detail_kriteria
-- ----------------------------
BEGIN;
INSERT INTO `spk_detail_kriteria` VALUES (1, 2, 'Kretif', '2019-09-22 19:39:34', '2019-09-22 20:06:48');
INSERT INTO `spk_detail_kriteria` VALUES (4, 2, 'Kretif', '2019-09-22 20:08:39', '2019-09-22 20:08:39');
INSERT INTO `spk_detail_kriteria` VALUES (5, 2, 'Kretif', '2019-09-25 21:15:43', '2019-09-25 21:15:43');
INSERT INTO `spk_detail_kriteria` VALUES (6, 2, 'Kretif', '2019-09-25 21:34:38', '2019-09-25 21:34:38');
INSERT INTO `spk_detail_kriteria` VALUES (7, 2, 'Kretif', '2019-09-25 21:35:12', '2019-09-25 21:35:12');
INSERT INTO `spk_detail_kriteria` VALUES (8, 4, 'Test', '2019-09-25 21:35:18', '2019-09-25 21:35:18');
INSERT INTO `spk_detail_kriteria` VALUES (9, 4, 'Test', '2019-09-25 21:35:18', '2019-09-25 21:35:18');
INSERT INTO `spk_detail_kriteria` VALUES (10, 4, 'Test', '2019-09-25 21:35:18', '2019-09-25 21:35:18');
INSERT INTO `spk_detail_kriteria` VALUES (11, 4, 'Test', '2019-09-25 21:35:18', '2019-09-25 21:35:18');
INSERT INTO `spk_detail_kriteria` VALUES (12, 4, 'Test', '2019-09-25 21:35:18', '2019-09-25 21:35:18');
INSERT INTO `spk_detail_kriteria` VALUES (13, 5, 'Coba', '2019-09-25 21:35:18', '2019-09-25 21:35:18');
INSERT INTO `spk_detail_kriteria` VALUES (14, 5, 'Coba', '2019-09-25 21:35:18', '2019-09-25 21:35:18');
INSERT INTO `spk_detail_kriteria` VALUES (15, 5, 'Coba', '2019-09-25 21:35:18', '2019-09-25 21:35:18');
INSERT INTO `spk_detail_kriteria` VALUES (16, 5, 'Coba', '2019-09-25 21:35:18', '2019-09-25 21:35:18');
INSERT INTO `spk_detail_kriteria` VALUES (17, 5, 'Coba', '2019-09-25 21:35:18', '2019-09-25 21:35:18');
INSERT INTO `spk_detail_kriteria` VALUES (18, 6, 'Mantap', '2019-09-25 21:35:18', '2019-09-25 21:35:18');
INSERT INTO `spk_detail_kriteria` VALUES (19, 6, 'Mantap', '2019-09-25 21:35:18', '2019-09-25 21:35:18');
INSERT INTO `spk_detail_kriteria` VALUES (20, 6, 'Mantap', '2019-09-25 21:35:18', '2019-09-25 21:35:18');
INSERT INTO `spk_detail_kriteria` VALUES (21, 6, 'Mantap', '2019-09-25 21:35:18', '2019-09-25 21:35:18');
INSERT INTO `spk_detail_kriteria` VALUES (22, 6, 'Mantap', '2019-09-25 21:35:18', '2019-09-25 21:35:18');
INSERT INTO `spk_detail_kriteria` VALUES (23, 7, 'Ideku', '2019-09-25 21:35:18', '2019-09-25 21:35:18');
INSERT INTO `spk_detail_kriteria` VALUES (24, 7, 'Ideku', '2019-09-25 21:35:18', '2019-09-25 21:35:18');
INSERT INTO `spk_detail_kriteria` VALUES (25, 7, 'Ideku', '2019-09-25 21:35:18', '2019-09-25 21:35:18');
INSERT INTO `spk_detail_kriteria` VALUES (26, 7, 'Ideku', '2019-09-25 21:35:18', '2019-09-25 21:35:18');
INSERT INTO `spk_detail_kriteria` VALUES (27, 7, 'Ideku', '2019-09-25 21:35:18', '2019-09-25 21:35:18');
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of spk_kriteria
-- ----------------------------
BEGIN;
INSERT INTO `spk_kriteria` VALUES (2, 'Kerja Sama Tim dan Peduli Teman', 0.8, '2019-09-19 00:15:41', '2019-09-22 18:52:36', '1', 'C1');
INSERT INTO `spk_kriteria` VALUES (4, 'Integritas', 0.8, '2019-09-19 00:19:01', '2019-09-22 20:08:24', '1', 'C2');
INSERT INTO `spk_kriteria` VALUES (5, 'Data 3', 0.8, '2019-09-19 00:19:01', '2019-09-19 00:19:01', '1', 'C3');
INSERT INTO `spk_kriteria` VALUES (6, 'Data 4', 0.8, '2019-09-19 00:19:01', '2019-09-19 00:19:01', '1', 'C4');
INSERT INTO `spk_kriteria` VALUES (7, 'Data 5', 0.8, '2019-09-19 00:19:01', '2019-09-19 00:19:01', '1', 'C5');
COMMIT;

-- ----------------------------
-- Table structure for spk_penilaian
-- ----------------------------
DROP TABLE IF EXISTS `spk_penilaian`;
CREATE TABLE `spk_penilaian` (
  `penilaian_id` int(10) NOT NULL AUTO_INCREMENT,
  `periode_id` int(10) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `target_user_id` int(10) DEFAULT NULL,
  `kriteria_id` int(10) DEFAULT NULL,
  `score` double(10,1) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`penilaian_id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of spk_penilaian
-- ----------------------------
BEGIN;
INSERT INTO `spk_penilaian` VALUES (57, 2, 6, 6, 7, 2.4, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian` VALUES (58, 2, 6, 6, 6, 3.4, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian` VALUES (59, 2, 6, 6, 5, 3.4, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian` VALUES (60, 2, 6, 6, 4, 2.6, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian` VALUES (61, 2, 6, 6, 2, 3.2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian` VALUES (62, 2, 6, 7, 7, 3.8, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian` VALUES (63, 2, 6, 7, 6, 3.0, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian` VALUES (64, 2, 6, 7, 5, 3.2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian` VALUES (65, 2, 6, 7, 4, 3.4, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian` VALUES (66, 2, 6, 7, 2, 3.0, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian` VALUES (67, 2, 6, 8, 7, 2.0, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian` VALUES (68, 2, 6, 8, 6, 2.4, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian` VALUES (69, 2, 6, 8, 5, 2.2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian` VALUES (70, 2, 6, 8, 4, 2.2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian` VALUES (71, 2, 6, 8, 2, 2.6, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian` VALUES (72, 2, 7, 6, 7, 2.6, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian` VALUES (73, 2, 7, 6, 6, 2.6, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian` VALUES (74, 2, 7, 6, 5, 2.6, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian` VALUES (75, 2, 7, 6, 4, 3.0, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian` VALUES (76, 2, 7, 6, 2, 3.0, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian` VALUES (77, 2, 7, 7, 7, 3.6, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian` VALUES (78, 2, 7, 7, 6, 3.4, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian` VALUES (79, 2, 7, 7, 5, 3.8, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian` VALUES (80, 2, 7, 7, 4, 3.4, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian` VALUES (81, 2, 7, 7, 2, 3.2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian` VALUES (82, 2, 7, 8, 7, 2.2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian` VALUES (83, 2, 7, 8, 6, 2.0, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian` VALUES (84, 2, 7, 8, 5, 2.6, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian` VALUES (85, 2, 7, 8, 4, 2.4, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian` VALUES (86, 2, 7, 8, 2, 2.2, '2019-10-01', '2019-10-01');
COMMIT;

-- ----------------------------
-- Table structure for spk_penilaian_respon
-- ----------------------------
DROP TABLE IF EXISTS `spk_penilaian_respon`;
CREATE TABLE `spk_penilaian_respon` (
  `penilaian_respon_id` int(10) NOT NULL AUTO_INCREMENT,
  `penilaian_id` int(10) DEFAULT NULL,
  `kriteria_id` int(10) DEFAULT NULL,
  `kriteria_detail_id` int(10) DEFAULT NULL,
  `point` double(10,0) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`penilaian_respon_id`)
) ENGINE=InnoDB AUTO_INCREMENT=198 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of spk_penilaian_respon
-- ----------------------------
BEGIN;
INSERT INTO `spk_penilaian_respon` VALUES (48, 57, 7, 23, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (49, 57, 7, 24, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (50, 57, 7, 25, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (51, 57, 7, 26, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (52, 57, 7, 27, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (53, 58, 6, 18, 4, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (54, 58, 6, 19, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (55, 58, 6, 20, 4, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (56, 58, 6, 21, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (57, 58, 6, 22, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (58, 59, 5, 13, 4, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (59, 59, 5, 14, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (60, 59, 5, 15, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (61, 59, 5, 16, 4, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (62, 59, 5, 17, 4, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (63, 60, 4, 8, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (64, 60, 4, 9, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (65, 60, 4, 10, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (66, 60, 4, 11, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (67, 60, 4, 12, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (68, 61, 2, 1, 4, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (69, 61, 2, 4, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (70, 61, 2, 5, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (71, 61, 2, 6, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (72, 61, 2, 7, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (73, 62, 7, 23, 4, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (74, 62, 7, 24, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (75, 62, 7, 25, 4, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (76, 62, 7, 26, 4, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (77, 62, 7, 27, 4, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (78, 63, 6, 18, 4, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (79, 63, 6, 19, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (80, 63, 6, 20, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (81, 63, 6, 21, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (82, 63, 6, 22, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (83, 64, 5, 13, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (84, 64, 5, 14, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (85, 64, 5, 15, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (86, 64, 5, 16, 4, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (87, 64, 5, 17, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (88, 65, 4, 8, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (89, 65, 4, 9, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (90, 65, 4, 10, 4, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (91, 65, 4, 11, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (92, 65, 4, 12, 4, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (93, 66, 2, 1, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (94, 66, 2, 4, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (95, 66, 2, 5, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (96, 66, 2, 6, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (97, 66, 2, 7, 4, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (98, 67, 7, 23, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (99, 67, 7, 24, 1, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (100, 67, 7, 25, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (101, 67, 7, 26, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (102, 67, 7, 27, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (103, 68, 6, 18, 1, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (104, 68, 6, 19, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (105, 68, 6, 20, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (106, 68, 6, 21, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (107, 68, 6, 22, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (108, 69, 5, 13, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (109, 69, 5, 14, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (110, 69, 5, 15, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (111, 69, 5, 16, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (112, 69, 5, 17, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (113, 70, 4, 8, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (114, 70, 4, 9, 1, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (115, 70, 4, 10, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (116, 70, 4, 11, 4, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (117, 70, 4, 12, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (118, 71, 2, 1, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (119, 71, 2, 4, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (120, 71, 2, 5, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (121, 71, 2, 6, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (122, 71, 2, 7, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (123, 72, 7, 23, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (124, 72, 7, 24, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (125, 72, 7, 25, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (126, 72, 7, 26, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (127, 72, 7, 27, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (128, 73, 6, 18, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (129, 73, 6, 19, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (130, 73, 6, 20, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (131, 73, 6, 21, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (132, 73, 6, 22, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (133, 74, 5, 13, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (134, 74, 5, 14, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (135, 74, 5, 15, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (136, 74, 5, 16, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (137, 74, 5, 17, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (138, 75, 4, 8, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (139, 75, 4, 9, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (140, 75, 4, 10, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (141, 75, 4, 11, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (142, 75, 4, 12, 4, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (143, 76, 2, 1, 4, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (144, 76, 2, 4, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (145, 76, 2, 5, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (146, 76, 2, 6, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (147, 76, 2, 7, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (148, 77, 7, 23, 4, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (149, 77, 7, 24, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (150, 77, 7, 25, 4, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (151, 77, 7, 26, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (152, 77, 7, 27, 4, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (153, 78, 6, 18, 4, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (154, 78, 6, 19, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (155, 78, 6, 20, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (156, 78, 6, 21, 4, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (157, 78, 6, 22, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (158, 79, 5, 13, 4, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (159, 79, 5, 14, 4, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (160, 79, 5, 15, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (161, 79, 5, 16, 4, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (162, 79, 5, 17, 4, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (163, 80, 4, 8, 4, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (164, 80, 4, 9, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (165, 80, 4, 10, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (166, 80, 4, 11, 4, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (167, 80, 4, 12, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (168, 81, 2, 1, 4, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (169, 81, 2, 4, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (170, 81, 2, 5, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (171, 81, 2, 6, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (172, 81, 2, 7, 4, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (173, 82, 7, 23, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (174, 82, 7, 24, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (175, 82, 7, 25, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (176, 82, 7, 26, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (177, 82, 7, 27, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (178, 83, 6, 18, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (179, 83, 6, 19, 1, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (180, 83, 6, 20, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (181, 83, 6, 21, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (182, 83, 6, 22, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (183, 84, 5, 13, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (184, 84, 5, 14, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (185, 84, 5, 15, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (186, 84, 5, 16, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (187, 84, 5, 17, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (188, 85, 4, 8, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (189, 85, 4, 9, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (190, 85, 4, 10, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (191, 85, 4, 11, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (192, 85, 4, 12, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (193, 86, 2, 1, 1, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (194, 86, 2, 4, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (195, 86, 2, 5, 3, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (196, 86, 2, 6, 2, '2019-10-01', '2019-10-01');
INSERT INTO `spk_penilaian_respon` VALUES (197, 86, 2, 7, 3, '2019-10-01', '2019-10-01');
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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

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
INSERT INTO `spk_sys_module` VALUES (34, 'laporan');
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
) ENGINE=InnoDB AUTO_INCREMENT=189 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

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
INSERT INTO `spk_sys_role` VALUES (136, 3, 1);
INSERT INTO `spk_sys_role` VALUES (137, 3, 116);
INSERT INTO `spk_sys_role` VALUES (138, 3, 117);
INSERT INTO `spk_sys_role` VALUES (139, 3, 114);
INSERT INTO `spk_sys_role` VALUES (140, 3, 115);
INSERT INTO `spk_sys_role` VALUES (141, 3, 112);
INSERT INTO `spk_sys_role` VALUES (142, 3, 113);
INSERT INTO `spk_sys_role` VALUES (143, 3, 110);
INSERT INTO `spk_sys_role` VALUES (144, 3, 111);
INSERT INTO `spk_sys_role` VALUES (145, 3, 26);
INSERT INTO `spk_sys_role` VALUES (146, 3, 124);
INSERT INTO `spk_sys_role` VALUES (147, 3, 125);
INSERT INTO `spk_sys_role` VALUES (148, 3, 122);
INSERT INTO `spk_sys_role` VALUES (149, 3, 123);
INSERT INTO `spk_sys_role` VALUES (150, 3, 120);
INSERT INTO `spk_sys_role` VALUES (151, 3, 121);
INSERT INTO `spk_sys_role` VALUES (152, 3, 118);
INSERT INTO `spk_sys_role` VALUES (153, 3, 119);
INSERT INTO `spk_sys_role` VALUES (154, 3, 23);
INSERT INTO `spk_sys_role` VALUES (155, 3, 25);
INSERT INTO `spk_sys_role` VALUES (156, 3, 24);
INSERT INTO `spk_sys_role` VALUES (157, 3, 22);
INSERT INTO `spk_sys_role` VALUES (158, 3, 3);
INSERT INTO `spk_sys_role` VALUES (159, 3, 5);
INSERT INTO `spk_sys_role` VALUES (160, 3, 4);
INSERT INTO `spk_sys_role` VALUES (161, 3, 2);
INSERT INTO `spk_sys_role` VALUES (162, 3, 11);
INSERT INTO `spk_sys_role` VALUES (163, 3, 13);
INSERT INTO `spk_sys_role` VALUES (164, 3, 12);
INSERT INTO `spk_sys_role` VALUES (165, 3, 10);
INSERT INTO `spk_sys_role` VALUES (166, 3, 19);
INSERT INTO `spk_sys_role` VALUES (167, 3, 21);
INSERT INTO `spk_sys_role` VALUES (168, 3, 20);
INSERT INTO `spk_sys_role` VALUES (169, 3, 18);
INSERT INTO `spk_sys_role` VALUES (170, 3, 15);
INSERT INTO `spk_sys_role` VALUES (171, 3, 17);
INSERT INTO `spk_sys_role` VALUES (172, 3, 16);
INSERT INTO `spk_sys_role` VALUES (173, 3, 14);
INSERT INTO `spk_sys_role` VALUES (174, 3, 7);
INSERT INTO `spk_sys_role` VALUES (175, 3, 9);
INSERT INTO `spk_sys_role` VALUES (176, 3, 8);
INSERT INTO `spk_sys_role` VALUES (177, 3, 6);
INSERT INTO `spk_sys_role` VALUES (178, 3, 27);
INSERT INTO `spk_sys_role` VALUES (179, 3, 29);
INSERT INTO `spk_sys_role` VALUES (180, 3, 28);
INSERT INTO `spk_sys_role` VALUES (181, 3, 126);
INSERT INTO `spk_sys_role` VALUES (182, 3, 127);
INSERT INTO `spk_sys_role` VALUES (187, 1, 127);
INSERT INTO `spk_sys_role` VALUES (188, 1, 126);
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
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

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
INSERT INTO `spk_sys_task` VALUES (126, 34, 'view');
INSERT INTO `spk_sys_task` VALUES (127, 34, 'list');
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
  `user_nik` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `fk_user_level` (`user_level_id`),
  CONSTRAINT `fk_user_level` FOREIGN KEY (`user_level_id`) REFERENCES `spk_sys_user_level` (`user_level_id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of spk_sys_user
-- ----------------------------
BEGIN;
INSERT INTO `spk_sys_user` VALUES (4, 'Super Admin', 'super@mail.com', '022', 'Bandung', 1, 'superadmin', '83626cc96878b9d30721cd4fb0baee63', '1', '2019-10-01 22:17:59', 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `spk_sys_user` VALUES (6, 'Aldi', 'aldi@live.com', '0981293819', 'bandung', 3, '', '83626cc96878b9d30721cd4fb0baee63', '1', '2019-10-01 21:20:18', 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `spk_sys_user` VALUES (7, 'Indar', 'indra@mail.com', '0981293819', 'Bandung Coret', 3, '', '83626cc96878b9d30721cd4fb0baee63', '1', '2019-10-01 22:15:25', 0, NULL, 'islam', '2019-09-25', '2019-09-25', 'NIK002');
INSERT INTO `spk_sys_user` VALUES (8, 'Lukman', 'lukman@mail.com', '08123817238', 'Bandung barat', 3, '', '83626cc96878b9d30721cd4fb0baee63', '1', '0000-00-00 00:00:00', 0, NULL, 'islam', '2003-01-01', '2019-09-01', 'NIK005');
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

-- ----------------------------
-- View structure for spk_v_penilaian
-- ----------------------------
DROP VIEW IF EXISTS `spk_v_penilaian`;
CREATE VIEW `spk_v_penilaian` AS select `spk_penilaian`.`penilaian_id` AS `penilaian_id`,`spk_penilaian`.`periode_id` AS `periode_id`,`spk_penilaian`.`user_id` AS `user_id`,`spk_penilaian`.`target_user_id` AS `target_user_id`,`spk_penilaian`.`kriteria_id` AS `kriteria_id`,`spk_penilaian`.`score` AS `score`,`spk_penilaian`.`created_at` AS `created_at`,`spk_penilaian`.`updated_at` AS `updated_at`,`spk_sys_user`.`user_name` AS `user_name`,`spk_sys_user_alias1`.`user_name` AS `target_user_name`,`spk_kriteria`.`nama` AS `nama`,`spk_kriteria`.`bobot` AS `bobot`,`spk_kriteria`.`kode` AS `kode` from (((`spk_penilaian` join `spk_sys_user` on((`spk_penilaian`.`user_id` = `spk_sys_user`.`user_id`))) join `spk_sys_user` `spk_sys_user_alias1` on((`spk_penilaian`.`target_user_id` = `spk_sys_user_alias1`.`user_id`))) join `spk_kriteria` on((`spk_penilaian`.`kriteria_id` = `spk_kriteria`.`kriteria_id`)));

SET FOREIGN_KEY_CHECKS = 1;
