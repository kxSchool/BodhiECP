/*
 Navicat Premium Data Transfer

 Source Server         : bodhi
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : 192.168.31.125:3306
 Source Schema         : bodhi_log

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 23/03/2024 11:17:16
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for log_202403
-- ----------------------------
DROP TABLE IF EXISTS `log_202403`;
CREATE TABLE `log_202403`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(6) NULL DEFAULT NULL,
  `url` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `ip` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `remark` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `createtime` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '日志表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of log_202403
-- ----------------------------
INSERT INTO `log_202403` VALUES (1, 1, 'index/login', '192.168.31.195', '登录系统：管理员wangxiaobao@rongyiban.net', 1711113124);
INSERT INTO `log_202403` VALUES (2, 1, 'index/logout', '192.168.31.195', '退出系统：管理员admin', 1711113197);
INSERT INTO `log_202403` VALUES (3, 1, 'index/login', '192.168.31.195', '登录系统：管理员wangxiaobao@rongyiban.net', 1711113205);
INSERT INTO `log_202403` VALUES (4, 1, 'index/logout', '192.168.31.195', '退出系统：管理员admin', 1711114786);
INSERT INTO `log_202403` VALUES (5, 1, 'index/login', '192.168.31.195', '登录系统：管理员admin@bodhitest.com', 1711115271);
INSERT INTO `log_202403` VALUES (6, 1, 'index/saveProfile', '192.168.31.195', '修改个人信息：管理员ID1', 1711115312);
INSERT INTO `log_202403` VALUES (7, 1, 'index/logout', '192.168.31.195', '退出系统：管理员admin', 1711115314);
INSERT INTO `log_202403` VALUES (8, 1, 'index/login', '192.168.31.195', '登录系统：管理员admin@bodhitest.com', 1711115322);
INSERT INTO `log_202403` VALUES (9, 1, 'index/logout', '192.168.31.195', '退出系统：管理员admin', 1711115328);
INSERT INTO `log_202403` VALUES (10, 1, 'index/login', '192.168.31.195', '登录系统：管理员admin@bodhitest.com', 1711116495);
INSERT INTO `log_202403` VALUES (11, 1, 'index/logout', '192.168.31.195', '退出系统：管理员admin', 1711116498);
INSERT INTO `log_202403` VALUES (12, 1, 'index/login', '192.168.31.195', '登录系统：管理员admin@bodhitest.com', 1711116506);
INSERT INTO `log_202403` VALUES (13, 1, 'index/logout', '192.168.31.195', '退出系统：管理员admin', 1711116862);
INSERT INTO `log_202403` VALUES (14, 1, 'index/login', '192.168.31.195', '登录系统：管理员admin', 1711116872);
INSERT INTO `log_202403` VALUES (15, 1, 'index/logout', '192.168.31.195', '退出系统：管理员admin', 1711116877);

-- ----------------------------
-- Table structure for staff_log_202403
-- ----------------------------
DROP TABLE IF EXISTS `staff_log_202403`;
CREATE TABLE `staff_log_202403`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NULL DEFAULT NULL,
  `staff_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `url` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `ip` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `remark` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `createtime` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '日志表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of staff_log_202403
-- ----------------------------
INSERT INTO `staff_log_202403` VALUES (7, 165, 'admin', 'index/login', '192.168.31.195', 'admin:登录系统', 1711113696);
INSERT INTO `staff_log_202403` VALUES (8, 165, 'admin', 'index/logout', '192.168.31.195', 'admin:退出系统', 1711114464);
INSERT INTO `staff_log_202403` VALUES (9, 165, 'admin', 'index/login', '192.168.31.195', 'admin:登录系统', 1711114475);
INSERT INTO `staff_log_202403` VALUES (10, 165, 'admin', 'index/logout', '192.168.31.195', 'admin:退出系统', 1711114857);
INSERT INTO `staff_log_202403` VALUES (11, 165, 'admin', 'index/login', '192.168.31.195', 'admin:登录系统', 1711114872);
INSERT INTO `staff_log_202403` VALUES (12, 165, 'admin', 'index/logout', '192.168.31.195', 'admin:退出系统', 1711115344);
INSERT INTO `staff_log_202403` VALUES (13, 165, 'admin', 'index/login', '192.168.31.195', 'admin:登录系统', 1711116473);
INSERT INTO `staff_log_202403` VALUES (14, 165, 'admin', 'index/logout', '192.168.31.195', 'admin:退出系统', 1711116477);
INSERT INTO `staff_log_202403` VALUES (15, 165, 'admin', 'index/login', '192.168.31.195', 'admin:登录系统', 1711116896);

SET FOREIGN_KEY_CHECKS = 1;
