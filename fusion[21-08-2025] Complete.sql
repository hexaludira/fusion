/*
 Navicat Premium Data Transfer

 Source Server         : Local_MySql
 Source Server Type    : MySQL
 Source Server Version : 100432 (10.4.32-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : fusion

 Target Server Type    : MySQL
 Target Server Version : 100432 (10.4.32-MariaDB)
 File Encoding         : 65001

 Date: 21/08/2025 11:33:21
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for mc_daily_plan_tbl
-- ----------------------------
DROP TABLE IF EXISTS `mc_daily_plan_tbl`;
CREATE TABLE `mc_daily_plan_tbl`  (
  `plan_id` int NOT NULL AUTO_INCREMENT,
  `date_plan` date NOT NULL,
  `sales_order_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `coloring_plan_qty` double NULL DEFAULT NULL,
  `tubing_plan_qty` double NULL DEFAULT NULL,
  `stranding_plan_qty` double NULL DEFAULT NULL,
  `sheathing_plan_ckm_qty` double NULL DEFAULT NULL,
  `sheathing_plan_fkm_qty` double NULL DEFAULT NULL,
  `created_user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_date_time` datetime NULL DEFAULT NULL,
  `updated_date_time` datetime NULL DEFAULT NULL,
  `is_delete` int NULL DEFAULT NULL COMMENT '1=deleted, 0=not deleted',
  PRIMARY KEY (`plan_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mc_daily_plan_tbl
-- ----------------------------

-- ----------------------------
-- Table structure for role_access_menu
-- ----------------------------
DROP TABLE IF EXISTS `role_access_menu`;
CREATE TABLE `role_access_menu`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `role_id` int NOT NULL,
  `menu_id` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_access_menu
-- ----------------------------
INSERT INTO `role_access_menu` VALUES (1, 1, 1);
INSERT INTO `role_access_menu` VALUES (2, 1, 2);
INSERT INTO `role_access_menu` VALUES (3, 1, 3);
INSERT INTO `role_access_menu` VALUES (4, 1, 4);
INSERT INTO `role_access_menu` VALUES (5, 1, 5);
INSERT INTO `role_access_menu` VALUES (6, 1, 6);
INSERT INTO `role_access_menu` VALUES (7, 1, 7);

-- ----------------------------
-- Table structure for role_access_system
-- ----------------------------
DROP TABLE IF EXISTS `role_access_system`;
CREATE TABLE `role_access_system`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `role_id` int NOT NULL,
  `system_id` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_access_system
-- ----------------------------
INSERT INTO `role_access_system` VALUES (1, 1, 1);
INSERT INTO `role_access_system` VALUES (2, 1, 2);
INSERT INTO `role_access_system` VALUES (3, 1, 3);

-- ----------------------------
-- Table structure for role_tbl
-- ----------------------------
DROP TABLE IF EXISTS `role_tbl`;
CREATE TABLE `role_tbl`  (
  `role_id` int NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `role_desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`role_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_tbl
-- ----------------------------
INSERT INTO `role_tbl` VALUES (1, 'Administrator', 'Can Access all system');

-- ----------------------------
-- Table structure for user_menu
-- ----------------------------
DROP TABLE IF EXISTS `user_menu`;
CREATE TABLE `user_menu`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `system_id` int NOT NULL,
  `menu_name` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `url` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `icon` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'fa-circle',
  `sort` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_menu
-- ----------------------------
INSERT INTO `user_menu` VALUES (1, 2, 'Main Dashboard', 'mes_cable/mc_main_dashboard', 'fa-gauge-high', 1);
INSERT INTO `user_menu` VALUES (2, 2, 'Plan Input', 'mes_cable/mc_plan_input', 'fa-calendar-days', 2);
INSERT INTO `user_menu` VALUES (3, 2, 'Coloring Dashboard', 'mes_cable/mc_coloring_dashboard', 'fa-road-barrier', 3);
INSERT INTO `user_menu` VALUES (4, 2, 'Tubing Dashboard', 'mes_cable/mc_tubing_dashboard', 'fa-ring', 4);
INSERT INTO `user_menu` VALUES (5, 2, 'Stranding Dashboard', 'mes_cable/mc_stranding_dashboard', 'fa-xmarks-lines', 5);
INSERT INTO `user_menu` VALUES (6, 2, 'Sheathing Dashboard', 'mes_cable/mc_sheathing_dashboard', 'fa-rug', 6);
INSERT INTO `user_menu` VALUES (7, 2, 'Sales Order Tracking', 'mes_cable/mc_salesorder_tracking', 'fa-route', 7);

-- ----------------------------
-- Table structure for user_systems
-- ----------------------------
DROP TABLE IF EXISTS `user_systems`;
CREATE TABLE `user_systems`  (
  `system_id` int NOT NULL AUTO_INCREMENT,
  `system_code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `system_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `color` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `icon` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`system_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_systems
-- ----------------------------
INSERT INTO `user_systems` VALUES (1, 'mes_fiber', 'MES Fiber', 'mes_fiber/mf_main_dashboard', 'bg-warning', 'mesf.png');
INSERT INTO `user_systems` VALUES (2, 'mes_cable', 'MES Cable', 'mes_cable/mc_main_dashboard', 'bg-danger', 'mesc.png');
INSERT INTO `user_systems` VALUES (3, 'wms', 'WMS', 'wms/wms_main_dashboard', 'bg-info', 'wms.png');

-- ----------------------------
-- Table structure for user_tbl
-- ----------------------------
DROP TABLE IF EXISTS `user_tbl`;
CREATE TABLE `user_tbl`  (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `nik` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `role_id` int NULL DEFAULT NULL,
  `created_date_time` datetime NULL DEFAULT NULL,
  `created_by` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_date_time` datetime NULL DEFAULT NULL,
  `updated_by` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_tbl
-- ----------------------------
INSERT INTO `user_tbl` VALUES (1, '99999999', 'Administrator', 'admin@mbgfiber.com', '$2y$10$MQoXj2cpX9vhGWrdjGR.Z.xHb3QreRm8QAE6oliSoZ.3L/V17VfSq', 1, NULL, NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
