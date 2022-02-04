/*
Navicat MySQL Data Transfer

Source Server         : localhost xampp
Source Server Version : 100414
Source Host           : localhost:3306
Source Database       : kas_rw

Target Server Type    : MYSQL
Target Server Version : 100414
File Encoding         : 65001

Date: 2022-02-04 08:38:28
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for dta_saldo
-- ----------------------------
DROP TABLE IF EXISTS `dta_saldo`;
CREATE TABLE `dta_saldo` (
  `periode_saldo` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `saldo_pemasukan` int(11) DEFAULT NULL,
  `saldo_pengeluaran` int(11) DEFAULT NULL,
  `bulan_saldo` int(2) DEFAULT NULL,
  `tahun_saldo` int(4) DEFAULT NULL,
  PRIMARY KEY (`periode_saldo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of dta_saldo
-- ----------------------------
INSERT INTO `dta_saldo` VALUES ('202112', '50', '50', '12', '2021');
INSERT INTO `dta_saldo` VALUES ('202201', '100', '75', '1', '2022');
INSERT INTO `dta_saldo` VALUES ('202202', '12000', '7500', '2', '2022');

-- ----------------------------
-- Table structure for dta_trx
-- ----------------------------
DROP TABLE IF EXISTS `dta_trx`;
CREATE TABLE `dta_trx` (
  `periode` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `rt` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rw` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pemasukan` int(11) DEFAULT NULL,
  `pengeluaran` int(11) DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of dta_trx
-- ----------------------------
INSERT INTO `dta_trx` VALUES ('202201', '2022-01-31 15:57:33', '001', '007', '100', '0', 'Debet - iuran');
INSERT INTO `dta_trx` VALUES ('202201', '2022-01-31 15:57:54', '001', '007', '0', '75', 'Kredit - beli lampu');
INSERT INTO `dta_trx` VALUES ('202202', '2022-02-02 08:47:15', '001', '007', '4000', '0', 'Debet - Iuran Warga');
INSERT INTO `dta_trx` VALUES ('202202', '2022-02-02 08:47:49', '001', '007', '0', '1500', 'Kredit - Kegiatan Posyandu');
INSERT INTO `dta_trx` VALUES ('202202', '2022-02-03 09:07:41', '003', '007', '6500', '0', 'Debet - Iuran Warga');
INSERT INTO `dta_trx` VALUES ('202202', '2022-02-03 09:50:50', '002', '007', '500', '0', 'Debet - Iuran warga');
INSERT INTO `dta_trx` VALUES ('202202', '2022-02-03 09:51:30', '001', '007', '1000', '0', 'Debet - Iuran Warga');
INSERT INTO `dta_trx` VALUES ('202202', '2022-02-03 09:52:25', '001', '007', '0', '5500', 'Kredit - Biaya posyandu');
INSERT INTO `dta_trx` VALUES ('202202', '2022-02-03 10:55:49', '001', '007', '0', '500', 'Kredit - Beli lampu');

-- ----------------------------
-- Table structure for dta_users
-- ----------------------------
DROP TABLE IF EXISTS `dta_users`;
CREATE TABLE `dta_users` (
  `user_id` varchar(7) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `rw` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hak_akses` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `waktu_modif` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL DEFAULT 1,
  `x_kali` int(1) NOT NULL DEFAULT 1,
  `email` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of dta_users
-- ----------------------------
INSERT INTO `dta_users` VALUES ('0144001', '007', '44', 'DHONA D.A', 'admin', '2c00e6fc0a4b8c4c2d8101040d3913f8', '2017-03-24 20:19:00', '0099001', '2022-02-04 01:25:00', '1', '0', 'dhonadwi14@gmail.com');
