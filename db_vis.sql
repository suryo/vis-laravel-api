/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100417
 Source Host           : localhost:3306
 Source Schema         : db_vis

 Target Server Type    : MySQL
 Target Server Version : 100417
 File Encoding         : 65001

 Date: 05/01/2022 11:52:46
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2021_06_22_110445_create_vis_provinsis_table', 1);
INSERT INTO `migrations` VALUES (5, '2021_06_22_110508_create_vis_kabupatens_table', 1);
INSERT INTO `migrations` VALUES (6, '2021_06_22_110519_create_vis_kotas_table', 1);
INSERT INTO `migrations` VALUES (7, '2021_06_22_110541_create_vis_kecamatans_table', 1);
INSERT INTO `migrations` VALUES (8, '2021_06_22_110554_create_vis_desas_table', 1);
INSERT INTO `migrations` VALUES (9, '2021_06_22_110609_create_vis_berita_desas_table', 1);
INSERT INTO `migrations` VALUES (10, '2021_06_22_110620_create_vis_kartu_keluargas_table', 2);
INSERT INTO `migrations` VALUES (11, '2021_06_22_110636_create_vis_jenis_lembaga_desas_table', 2);
INSERT INTO `migrations` VALUES (12, '2021_06_22_110645_create_vis_lembaga_desas_table', 2);
INSERT INTO `migrations` VALUES (13, '2021_06_22_110654_create_vis_jenis_potensi_desas_table', 2);
INSERT INTO `migrations` VALUES (14, '2021_06_22_110704_create_vis_jenis_surats_table', 2);
INSERT INTO `migrations` VALUES (15, '2021_06_22_110716_create_vis_master_surats_table', 2);
INSERT INTO `migrations` VALUES (16, '2021_06_22_110728_create_vis_surat_keluars_table', 2);
INSERT INTO `migrations` VALUES (17, '2021_06_22_110737_create_vis_surat_masuks_table', 2);
INSERT INTO `migrations` VALUES (18, '2021_06_22_110748_create_vis_data_penduduks_table', 3);
INSERT INTO `migrations` VALUES (19, '2021_06_22_110805_create_vis_perangkat_desas_table', 3);
INSERT INTO `migrations` VALUES (20, '2021_06_22_110818_create_vis_users_table', 3);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for vis_berita_desas
-- ----------------------------
DROP TABLE IF EXISTS `vis_berita_desas`;
CREATE TABLE `vis_berita_desas`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_desa` bigint(20) UNSIGNED NOT NULL,
  `judul` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `berita` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `vis_berita_desas_id_desa_foreign`(`id_desa`) USING BTREE,
  CONSTRAINT `vis_berita_desas_id_desa_foreign` FOREIGN KEY (`id_desa`) REFERENCES `vis_desas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for vis_data_penduduks
-- ----------------------------
DROP TABLE IF EXISTS `vis_data_penduduks`;
CREATE TABLE `vis_data_penduduks`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `no_kk` bigint(20) UNSIGNED NOT NULL,
  `id_desa` bigint(20) UNSIGNED NOT NULL,
  `nama_penduduk` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_penduduk` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `vis_data_penduduks_id_desa_foreign`(`id_desa`) USING BTREE,
  CONSTRAINT `vis_data_penduduks_id_desa_foreign` FOREIGN KEY (`id_desa`) REFERENCES `vis_desas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for vis_desas
-- ----------------------------
DROP TABLE IF EXISTS `vis_desas`;
CREATE TABLE `vis_desas`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_provinsi` bigint(20) UNSIGNED NOT NULL,
  `id_kota` bigint(20) UNSIGNED NOT NULL,
  `id_kabupaten` bigint(20) UNSIGNED NOT NULL,
  `id_kecamatan` bigint(20) UNSIGNED NOT NULL,
  `nama_desa` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_lengkap` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `vis_desas_id_provinsi_foreign`(`id_provinsi`) USING BTREE,
  INDEX `vis_desas_id_kota_foreign`(`id_kota`) USING BTREE,
  INDEX `vis_desas_id_kabupaten_foreign`(`id_kabupaten`) USING BTREE,
  INDEX `vis_desas_id_kecamatan_foreign`(`id_kecamatan`) USING BTREE,
  CONSTRAINT `vis_desas_id_kabupaten_foreign` FOREIGN KEY (`id_kabupaten`) REFERENCES `vis_kabupatens` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `vis_desas_id_kecamatan_foreign` FOREIGN KEY (`id_kecamatan`) REFERENCES `vis_kecamatans` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `vis_desas_id_kota_foreign` FOREIGN KEY (`id_kota`) REFERENCES `vis_kotas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `vis_desas_id_provinsi_foreign` FOREIGN KEY (`id_provinsi`) REFERENCES `vis_provinsis` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for vis_jenis_lembaga_desas
-- ----------------------------
DROP TABLE IF EXISTS `vis_jenis_lembaga_desas`;
CREATE TABLE `vis_jenis_lembaga_desas`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_lembaga` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of vis_jenis_lembaga_desas
-- ----------------------------
INSERT INTO `vis_jenis_lembaga_desas` VALUES (1, 'coba', '2021-07-18 02:56:07', '2021-07-18 02:56:07');
INSERT INTO `vis_jenis_lembaga_desas` VALUES (2, 'merdeka', '2021-07-18 04:49:42', '2021-07-18 04:49:42');

-- ----------------------------
-- Table structure for vis_jenis_potensi_desas
-- ----------------------------
DROP TABLE IF EXISTS `vis_jenis_potensi_desas`;
CREATE TABLE `vis_jenis_potensi_desas`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_desa` bigint(20) UNSIGNED NOT NULL,
  `nama_potensi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `vis_jenis_potensi_desas_id_desa_foreign`(`id_desa`) USING BTREE,
  CONSTRAINT `vis_jenis_potensi_desas_id_desa_foreign` FOREIGN KEY (`id_desa`) REFERENCES `vis_desas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for vis_jenis_surats
-- ----------------------------
DROP TABLE IF EXISTS `vis_jenis_surats`;
CREATE TABLE `vis_jenis_surats`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_desa` bigint(20) UNSIGNED NOT NULL,
  `jenis_surat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `vis_jenis_surats_id_desa_foreign`(`id_desa`) USING BTREE,
  CONSTRAINT `vis_jenis_surats_id_desa_foreign` FOREIGN KEY (`id_desa`) REFERENCES `vis_desas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for vis_kabupatens
-- ----------------------------
DROP TABLE IF EXISTS `vis_kabupatens`;
CREATE TABLE `vis_kabupatens`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_provinsi` bigint(20) UNSIGNED NOT NULL,
  `kabupaten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `vis_kabupatens_id_provinsi_foreign`(`id_provinsi`) USING BTREE,
  CONSTRAINT `vis_kabupatens_id_provinsi_foreign` FOREIGN KEY (`id_provinsi`) REFERENCES `vis_provinsis` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of vis_kabupatens
-- ----------------------------
INSERT INTO `vis_kabupatens` VALUES (1, 2, 'malang', '2021-07-18 13:31:46', '2021-12-28 08:39:45');

-- ----------------------------
-- Table structure for vis_kartu_keluargas
-- ----------------------------
DROP TABLE IF EXISTS `vis_kartu_keluargas`;
CREATE TABLE `vis_kartu_keluargas`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `no_kk` bigint(20) UNSIGNED NOT NULL,
  `nik` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of vis_kartu_keluargas
-- ----------------------------
INSERT INTO `vis_kartu_keluargas` VALUES (1, 12345678, 123, '2021-07-17 15:29:41', '2021-07-17 15:29:41');

-- ----------------------------
-- Table structure for vis_kecamatans
-- ----------------------------
DROP TABLE IF EXISTS `vis_kecamatans`;
CREATE TABLE `vis_kecamatans`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_kota` bigint(20) UNSIGNED NOT NULL,
  `id_kabupaten` bigint(20) UNSIGNED NOT NULL,
  `id_provinsi` bigint(20) UNSIGNED NOT NULL,
  `kecamatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `vis_kecamatans_id_kota_foreign`(`id_kota`) USING BTREE,
  INDEX `vis_kecamatans_id_kabupaten_foreign`(`id_kabupaten`) USING BTREE,
  INDEX `vis_kecamatans_id_provinsi_foreign`(`id_provinsi`) USING BTREE,
  CONSTRAINT `vis_kecamatans_id_kabupaten_foreign` FOREIGN KEY (`id_kabupaten`) REFERENCES `vis_kabupatens` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `vis_kecamatans_id_kota_foreign` FOREIGN KEY (`id_kota`) REFERENCES `vis_kotas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `vis_kecamatans_id_provinsi_foreign` FOREIGN KEY (`id_provinsi`) REFERENCES `vis_provinsis` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of vis_kecamatans
-- ----------------------------
INSERT INTO `vis_kecamatans` VALUES (1, 1, 1, 1, 'sukolilo', '2021-07-26 15:55:57', '2021-07-26 15:55:57');

-- ----------------------------
-- Table structure for vis_kotas
-- ----------------------------
DROP TABLE IF EXISTS `vis_kotas`;
CREATE TABLE `vis_kotas`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_provinsi` bigint(20) UNSIGNED NOT NULL,
  `kota` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `vis_kotas_id_provinsi_foreign`(`id_provinsi`) USING BTREE,
  CONSTRAINT `vis_kotas_id_provinsi_foreign` FOREIGN KEY (`id_provinsi`) REFERENCES `vis_provinsis` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of vis_kotas
-- ----------------------------
INSERT INTO `vis_kotas` VALUES (1, 1, 'surabaya', '2021-07-17 14:34:39', '2021-07-17 14:34:39');
INSERT INTO `vis_kotas` VALUES (4, 2, 'bandung', '2021-12-30 07:15:12', '2021-12-30 07:15:12');
INSERT INTO `vis_kotas` VALUES (5, 12, 'malang', '2021-12-30 07:15:22', '2021-12-30 07:15:22');

-- ----------------------------
-- Table structure for vis_lembaga_desas
-- ----------------------------
DROP TABLE IF EXISTS `vis_lembaga_desas`;
CREATE TABLE `vis_lembaga_desas`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_jenis_lembaga` bigint(20) UNSIGNED NOT NULL,
  `id_desa` bigint(20) UNSIGNED NOT NULL,
  `lembaga_desa` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `vis_lembaga_desas_id_jenis_lembaga_foreign`(`id_jenis_lembaga`) USING BTREE,
  INDEX `vis_lembaga_desas_id_desa_foreign`(`id_desa`) USING BTREE,
  CONSTRAINT `vis_lembaga_desas_id_desa_foreign` FOREIGN KEY (`id_desa`) REFERENCES `vis_desas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `vis_lembaga_desas_id_jenis_lembaga_foreign` FOREIGN KEY (`id_jenis_lembaga`) REFERENCES `vis_jenis_lembaga_desas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for vis_master_surats
-- ----------------------------
DROP TABLE IF EXISTS `vis_master_surats`;
CREATE TABLE `vis_master_surats`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_jenis_surat` bigint(20) UNSIGNED NOT NULL,
  `file` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `version_date` date NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `vis_master_surats_id_jenis_surat_foreign`(`id_jenis_surat`) USING BTREE,
  CONSTRAINT `vis_master_surats_id_jenis_surat_foreign` FOREIGN KEY (`id_jenis_surat`) REFERENCES `vis_jenis_surats` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for vis_perangkat_desas
-- ----------------------------
DROP TABLE IF EXISTS `vis_perangkat_desas`;
CREATE TABLE `vis_perangkat_desas`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_desa` bigint(20) UNSIGNED NOT NULL,
  `nik` bigint(20) UNSIGNED NOT NULL,
  `nama_perangkat_desa` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `vis_perangkat_desas_id_desa_foreign`(`id_desa`) USING BTREE,
  INDEX `vis_perangkat_desas_nik_foreign`(`nik`) USING BTREE,
  CONSTRAINT `vis_perangkat_desas_id_desa_foreign` FOREIGN KEY (`id_desa`) REFERENCES `vis_desas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `vis_perangkat_desas_nik_foreign` FOREIGN KEY (`nik`) REFERENCES `vis_data_penduduks` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for vis_provinsis
-- ----------------------------
DROP TABLE IF EXISTS `vis_provinsis`;
CREATE TABLE `vis_provinsis`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `provinsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of vis_provinsis
-- ----------------------------
INSERT INTO `vis_provinsis` VALUES (1, 'kalimantan timur', '2021-06-27 15:50:30', '2021-07-05 05:16:27');
INSERT INTO `vis_provinsis` VALUES (2, 'jawa barat', '2021-06-27 15:50:36', '2021-06-27 15:50:36');
INSERT INTO `vis_provinsis` VALUES (3, 'Jawa Tengah', '2021-06-28 10:27:43', '2021-06-28 10:27:43');
INSERT INTO `vis_provinsis` VALUES (10, 'bali', '2021-07-18 04:47:57', '2021-07-18 04:47:57');
INSERT INTO `vis_provinsis` VALUES (12, 'jawa timur', '2021-12-28 08:35:34', '2021-12-28 08:37:35');
INSERT INTO `vis_provinsis` VALUES (21, 'irian jaya', '2022-01-04 13:08:03', '2022-01-04 13:59:00');

-- ----------------------------
-- Table structure for vis_surat_keluars
-- ----------------------------
DROP TABLE IF EXISTS `vis_surat_keluars`;
CREATE TABLE `vis_surat_keluars`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_jenis_surat` bigint(20) UNSIGNED NOT NULL,
  `tgl_keluar` date NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `vis_surat_keluars_id_jenis_surat_foreign`(`id_jenis_surat`) USING BTREE,
  CONSTRAINT `vis_surat_keluars_id_jenis_surat_foreign` FOREIGN KEY (`id_jenis_surat`) REFERENCES `vis_jenis_surats` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for vis_surat_masuks
-- ----------------------------
DROP TABLE IF EXISTS `vis_surat_masuks`;
CREATE TABLE `vis_surat_masuks`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_jenis_surat` bigint(20) UNSIGNED NOT NULL,
  `tgl_masuk` date NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `vis_surat_masuks_id_jenis_surat_foreign`(`id_jenis_surat`) USING BTREE,
  CONSTRAINT `vis_surat_masuks_id_jenis_surat_foreign` FOREIGN KEY (`id_jenis_surat`) REFERENCES `vis_jenis_surats` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for vis_users
-- ----------------------------
DROP TABLE IF EXISTS `vis_users`;
CREATE TABLE `vis_users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nik` bigint(20) UNSIGNED NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
