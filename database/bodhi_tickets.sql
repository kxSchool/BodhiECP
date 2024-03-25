/*
 Navicat Premium Data Transfer

 Source Server         : bodhi
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : 192.168.31.125:3306
 Source Schema         : bodhi_tickets

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 25/03/2024 09:47:23
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for order_action
-- ----------------------------
DROP TABLE IF EXISTS `order_action`;
CREATE TABLE `order_action`  (
  `action_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` mediumint(8) UNSIGNED NOT NULL DEFAULT 0,
  `action_user` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `order_status` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `shipping_status` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `pay_status` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `action_place` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `action_note` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `log_time` int(11) UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`action_id`) USING BTREE,
  INDEX `order_id`(`order_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 923 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '订单操作行为表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of order_action
-- ----------------------------

-- ----------------------------
-- Table structure for order_goods
-- ----------------------------
DROP TABLE IF EXISTS `order_goods`;
CREATE TABLE `order_goods`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` mediumint(8) UNSIGNED NOT NULL DEFAULT 0,
  `goods_sn` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `goods_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `goods_price` decimal(10, 2) NOT NULL,
  `goods_count` int(10) NOT NULL DEFAULT 1 COMMENT '商品数量',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `order_id`(`order_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1258 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '订单商品信息备份表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of order_goods
-- ----------------------------
INSERT INTO `order_goods` VALUES (1243, 752, '1', '有限公司注册', 1680.00, 1);
INSERT INTO `order_goods` VALUES (1244, 753, '1', '有限公司注册', 1680.00, 1);
INSERT INTO `order_goods` VALUES (1245, 754, '1', '有限公司注册', 1680.00, 1);
INSERT INTO `order_goods` VALUES (1246, 755, '6', '办事处注册', 0.01, 1);
INSERT INTO `order_goods` VALUES (1247, 756, '162', '普通注册', 980.00, 1);
INSERT INTO `order_goods` VALUES (1248, 757, '162', '普通注册', 980.00, 1);
INSERT INTO `order_goods` VALUES (1249, 758, '162', '普通注册', 980.00, 1);
INSERT INTO `order_goods` VALUES (1250, 759, '162', '普通注册', 980.00, 1);
INSERT INTO `order_goods` VALUES (1251, 760, '162', '普通注册', 980.00, 1);
INSERT INTO `order_goods` VALUES (1252, 761, '162', '普通注册', 980.00, 1);
INSERT INTO `order_goods` VALUES (1253, 762, '162', '普通注册', 980.00, 1);
INSERT INTO `order_goods` VALUES (1254, 763, '162', '普通注册', 980.00, 1);
INSERT INTO `order_goods` VALUES (1255, 764, '162', '普通注册', 980.00, 1);
INSERT INTO `order_goods` VALUES (1256, 765, '162', '普通注册', 980.00, 1);
INSERT INTO `order_goods` VALUES (1257, 766, '162', '普通注册', 980.00, 1);

-- ----------------------------
-- Table structure for order_goods_progress
-- ----------------------------
DROP TABLE IF EXISTS `order_goods_progress`;
CREATE TABLE `order_goods_progress`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `order_sn` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `goods_id` int(11) NOT NULL,
  `goods_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '商品名称',
  `progress_id` int(11) NOT NULL DEFAULT 0,
  `progress` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `shopid` int(11) NOT NULL DEFAULT 0,
  `adminid` int(11) NOT NULL DEFAULT 0 COMMENT '0为系统管理员',
  `sort` int(11) NOT NULL DEFAULT 0 COMMENT '排序',
  `createtime` int(11) NOT NULL,
  `adminname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '操作人',
  `updatetime` int(10) NOT NULL DEFAULT 0,
  `isFinish` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否完成 默认为否',
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '简述',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 135 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '订单商品进度表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_goods_progress
-- ----------------------------
INSERT INTO `order_goods_progress` VALUES (1, 1, '201806307107565498', 1, '有限公司注册', 1, '流程1', 241, 165, 1, 1530428310, '李明伟', 1532487897, 1, '1111111111');
INSERT INTO `order_goods_progress` VALUES (2, 1, '201806307107565498', 1, '有限公司注册', 2, '流程2', 241, 165, 2, 1530428310, 'admin', 1532505720, 1, '11111111');
INSERT INTO `order_goods_progress` VALUES (3, 1, '201806307107565498', 1, '有限公司注册', 3, '流程3', 241, 165, 3, 1530428310, 'admin', 1532505757, 1, '11111111');
INSERT INTO `order_goods_progress` VALUES (4, 1, '201806307107565498', 193, '地址注册', 4, '流程1', 241, 165, 4, 1530428310, 'admin', 1532505758, 1, '');
INSERT INTO `order_goods_progress` VALUES (16, 690, '201808087353985557', 1, '有限公司注册', 1, '流程1', 241, 165, 1, 1533699111, 'admin', 1533879616, 1, '我去热翁无群而我却');
INSERT INTO `order_goods_progress` VALUES (17, 690, '201808087353985557', 1, '有限公司注册', 2, '流程2', 241, 165, 2, 1533699111, 'admin', 1533879625, 1, '为我去额我去额');
INSERT INTO `order_goods_progress` VALUES (18, 690, '201808087353985557', 1, '有限公司注册', 3, '流程3', 241, 165, 3, 1533699111, 'admin', 1533879640, 1, '我而我却二我去额');
INSERT INTO `order_goods_progress` VALUES (19, 690, '201808087353985557', 1, '有限公司注册', 4, '流程4', 241, 165, 4, 1533699111, 'admin', 1533879644, 1, '为请问去');
INSERT INTO `order_goods_progress` VALUES (33, 691, '201808087183957505', 0, '', 0, '订单已派单到服务商17621612151', 241, 165, 1, 1533703050, 'admin', 1533705579, 1, '服务商联系电话:17621612151');
INSERT INTO `order_goods_progress` VALUES (34, 691, '201808087183957505', 1, '有限公司注册', 1, '订单已派单到服务商17621612151', 241, 165, 2, 1533703050, 'admin', 1533705595, 1, '我去热翁无群而我却');
INSERT INTO `order_goods_progress` VALUES (35, 691, '201808087183957505', 1, '有限公司注册', 2, '订单已派单到服务商17621612151', 241, 165, 3, 1533703050, 'admin', 1533705596, 1, '为我去额我去额');
INSERT INTO `order_goods_progress` VALUES (36, 691, '201808087183957505', 1, '有限公司注册', 3, '订单已派单到服务商17621612151', 241, 165, 4, 1533703050, 'admin', 1533705600, 1, '我而我却二我去额');
INSERT INTO `order_goods_progress` VALUES (37, 691, '201808087183957505', 1, '有限公司注册', 4, '流程4', 241, 165, 5, 1533703050, 'admin', 1533705605, 1, '为请问去');
INSERT INTO `order_goods_progress` VALUES (43, 692, '201808087928979957', 0, '201808087928979957', 0, '订单已派单到服务商17621612151', 241, 165, 1, 1533706112, 'admin', 1533706135, 1, '服务商联系电话:17621612151');
INSERT INTO `order_goods_progress` VALUES (44, 692, '201808087928979957', 1, '有限公司注册', 1, '流程1', 241, 165, 2, 1533706112, 'admin', 1533706136, 1, '我去热翁无群而我却');
INSERT INTO `order_goods_progress` VALUES (45, 692, '201808087928979957', 1, '有限公司注册', 2, '流程2', 241, 165, 3, 1533706112, 'admin', 1533706137, 1, '为我去额我去额');
INSERT INTO `order_goods_progress` VALUES (46, 692, '201808087928979957', 1, '有限公司注册', 3, '流程3', 241, 165, 4, 1533706112, 'admin', 1533706137, 1, '我而我却二我去额');
INSERT INTO `order_goods_progress` VALUES (47, 692, '201808087928979957', 1, '有限公司注册', 4, '流程4', 241, 165, 5, 1533706112, 'admin', 1533706146, 1, '为请问去');
INSERT INTO `order_goods_progress` VALUES (48, 561, '201807232053515152', 0, '201807232053515152', 0, '订单已派单到服务商17621612151', 241, 165, 1, 1533791321, 'admin', 1533879724, 1, '服务商联系电话:17621612151');
INSERT INTO `order_goods_progress` VALUES (49, 561, '201807232053515152', 51, 'SP经营许可证', 1, '流程1', 241, 165, 2, 1533791321, 'admin', 1533879727, 1, '我去热翁无群而我却');
INSERT INTO `order_goods_progress` VALUES (50, 561, '201807232053515152', 51, 'SP经营许可证', 2, '流程2', 241, 165, 3, 1533791321, 'admin', 1533879727, 1, '为我去额我去额');
INSERT INTO `order_goods_progress` VALUES (51, 561, '201807232053515152', 51, 'SP经营许可证', 3, '流程3', 241, 165, 4, 1533791321, 'admin', 1533879731, 1, '我而我却二我去额');
INSERT INTO `order_goods_progress` VALUES (52, 561, '201807232053515152', 51, 'SP经营许可证', 4, '流程4', 241, 165, 5, 1533791321, 'admin', 1533879734, 1, '为请问去');
INSERT INTO `order_goods_progress` VALUES (53, 559, '201807233057555549', 0, '201807233057555549', 0, '订单已派单到服务商17621612151', 241, 165, 1, 1533803039, 'admin', 1533879994, 1, '服务商联系电话:17621612151');
INSERT INTO `order_goods_progress` VALUES (54, 559, '201807233057555549', 51, 'SP经营许可证', 1, '流程1', 241, 165, 2, 1533803039, 'admin', 1533880011, 1, '我去热翁无群而我却');
INSERT INTO `order_goods_progress` VALUES (55, 559, '201807233057555549', 51, 'SP经营许可证', 2, '流程2', 241, 165, 3, 1533803039, 'admin', 1534144883, 1, '为我去额我去额');
INSERT INTO `order_goods_progress` VALUES (56, 559, '201807233057555549', 51, 'SP经营许可证', 3, '流程3', 241, 165, 4, 1533803039, 'admin', 1534144884, 1, '我而我却二我去额');
INSERT INTO `order_goods_progress` VALUES (57, 559, '201807233057555549', 51, 'SP经营许可证', 4, '流程4', 241, 165, 5, 1533803039, 'admin', 1534144972, 1, '为请问去');
INSERT INTO `order_goods_progress` VALUES (58, 251, '201807138100610198', 0, '201807138100610198', 0, '订单已派单到服务商17621612151', 241, 0, 1, 1533803060, '', 0, 0, '服务商联系电话:17621612151');
INSERT INTO `order_goods_progress` VALUES (59, 251, '201807138100610198', 162, '普通注册', 1, '流程1', 241, 0, 2, 1533803060, '', 0, 0, '我去热翁无群而我却');
INSERT INTO `order_goods_progress` VALUES (60, 251, '201807138100610198', 162, '普通注册', 2, '流程2', 241, 0, 3, 1533803060, '', 0, 0, '为我去额我去额');
INSERT INTO `order_goods_progress` VALUES (61, 251, '201807138100610198', 162, '普通注册', 3, '流程3', 241, 0, 4, 1533803060, '', 0, 0, '我而我却二我去额');
INSERT INTO `order_goods_progress` VALUES (62, 251, '201807138100610198', 162, '普通注册', 4, '流程4', 241, 0, 5, 1533803060, '', 0, 0, '为请问去');
INSERT INTO `order_goods_progress` VALUES (63, 557, '201807236431100975', 0, '201807236431100975', 0, '订单已派单到服务商17621612151', 241, 0, 1, 1533817724, '', 0, 0, '服务商联系电话:17621612151');
INSERT INTO `order_goods_progress` VALUES (64, 557, '201807236431100975', 51, 'SP经营许可证', 1, '流程1', 241, 0, 2, 1533817724, '', 0, 0, '我去热翁无群而我却');
INSERT INTO `order_goods_progress` VALUES (65, 557, '201807236431100975', 51, 'SP经营许可证', 2, '流程2', 241, 0, 3, 1533817724, '', 0, 0, '为我去额我去额');
INSERT INTO `order_goods_progress` VALUES (66, 557, '201807236431100975', 51, 'SP经营许可证', 3, '流程3', 241, 0, 4, 1533817724, '', 0, 0, '我而我却二我去额');
INSERT INTO `order_goods_progress` VALUES (67, 557, '201807236431100975', 51, 'SP经营许可证', 4, '流程4', 241, 0, 5, 1533817724, '', 0, 0, '为请问去');
INSERT INTO `order_goods_progress` VALUES (68, 556, '201807233048985449', 0, '201807233048985449', 0, '订单已派单到服务商17621612151', 241, 165, 1, 1533817746, 'admin', 1534398028, 1, '服务商联系电话:17621612151');
INSERT INTO `order_goods_progress` VALUES (69, 556, '201807233048985449', 51, 'SP经营许可证', 1, '流程1', 241, 165, 2, 1533817746, 'admin', 1534398030, 1, '我去热翁无群而我却');
INSERT INTO `order_goods_progress` VALUES (70, 556, '201807233048985449', 51, 'SP经营许可证', 2, '流程2', 241, 165, 3, 1533817746, 'admin', 1534398031, 1, '为我去额我去额');
INSERT INTO `order_goods_progress` VALUES (71, 556, '201807233048985449', 51, 'SP经营许可证', 3, '流程3', 241, 0, 4, 1533817746, '', 0, 0, '我而我却二我去额');
INSERT INTO `order_goods_progress` VALUES (72, 556, '201807233048985449', 51, 'SP经营许可证', 4, '流程4', 241, 0, 5, 1533817746, '', 0, 0, '为请问去');
INSERT INTO `order_goods_progress` VALUES (73, 556, '201807233048985449', 193, '地址注册', 12, '2222', 241, 0, 6, 1533817746, '', 0, 0, '2222');
INSERT INTO `order_goods_progress` VALUES (74, 556, '201807233048985449', 193, '地址注册', 11, '111', 241, 0, 7, 1533817746, '', 0, 0, '一般流程2');
INSERT INTO `order_goods_progress` VALUES (75, 714, '201808098809049489', 0, '201808098809049489', 0, '订单已派单到服务商17621612151', 241, 165, 1, 1533888534, 'admin', 1533888544, 1, '服务商联系电话:17621612151');
INSERT INTO `order_goods_progress` VALUES (76, 714, '201808098809049489', 1, '有限公司注册', 12, '2222', 241, 165, 2, 1533888534, 'admin', 1533888561, 1, '2222');
INSERT INTO `order_goods_progress` VALUES (77, 714, '201808098809049489', 1, '有限公司注册', 11, '111', 241, 0, 3, 1533888534, '', 0, 0, '一般流程2');
INSERT INTO `order_goods_progress` VALUES (78, 714, '201808098809049489', 20, '银行开户预约', 1, '流程1', 241, 0, 4, 1533888534, '', 0, 0, '我去热翁无群而我却');
INSERT INTO `order_goods_progress` VALUES (79, 714, '201808098809049489', 20, '银行开户预约', 2, '流程2', 241, 0, 5, 1533888534, '', 0, 0, '为我去额我去额');
INSERT INTO `order_goods_progress` VALUES (80, 714, '201808098809049489', 20, '银行开户预约', 3, '流程3', 241, 0, 6, 1533888534, '', 0, 0, '我而我却二我去额');
INSERT INTO `order_goods_progress` VALUES (81, 714, '201808098809049489', 20, '银行开户预约', 4, '流程4', 241, 0, 7, 1533888534, '', 0, 0, '为请问去');
INSERT INTO `order_goods_progress` VALUES (82, 717, '201808108321548101', 0, '201808108321548101', 0, '订单已派单到服务商17621612151', 241, 165, 1, 1533889943, 'admin', 1533889984, 1, '服务商联系电话:17621612151');
INSERT INTO `order_goods_progress` VALUES (83, 717, '201808108321548101', 6, '办事处注册', 1, '流程1', 241, 165, 2, 1533889943, 'admin', 1533889992, 1, '我去热翁无群而我却');
INSERT INTO `order_goods_progress` VALUES (84, 717, '201808108321548101', 6, '办事处注册', 2, '流程2', 241, 165, 3, 1533889943, 'admin', 1533889998, 1, '为我去额我去额');
INSERT INTO `order_goods_progress` VALUES (85, 717, '201808108321548101', 6, '办事处注册', 3, '流程3', 241, 165, 4, 1533889943, 'admin', 1533889999, 1, '我而我却二我去额');
INSERT INTO `order_goods_progress` VALUES (86, 717, '201808108321548101', 6, '办事处注册', 4, '流程4', 241, 165, 5, 1533889943, 'admin', 1533890000, 1, '为请问去');
INSERT INTO `order_goods_progress` VALUES (87, 254, '201807132259535649', 0, '201807132259535649', 0, '订单已派单到服务商17621612151', 241, 165, 1, 1533890226, 'admin', 1533890271, 1, '服务商联系电话:17621612151');
INSERT INTO `order_goods_progress` VALUES (88, 254, '201807132259535649', 162, '普通注册', 1, '流程1', 241, 165, 2, 1533890226, 'admin', 1533890271, 1, '我去热翁无群而我却');
INSERT INTO `order_goods_progress` VALUES (89, 254, '201807132259535649', 162, '普通注册', 2, '流程2', 241, 165, 3, 1533890226, 'admin', 1533890272, 1, '为我去额我去额');
INSERT INTO `order_goods_progress` VALUES (90, 254, '201807132259535649', 162, '普通注册', 3, '流程3', 241, 165, 4, 1533890226, 'admin', 1533890272, 1, '我而我却二我去额');
INSERT INTO `order_goods_progress` VALUES (91, 254, '201807132259535649', 162, '普通注册', 4, '流程4', 241, 165, 5, 1533890226, 'admin', 1533890273, 1, '为请问去');
INSERT INTO `order_goods_progress` VALUES (92, 254, '201807132259535649', 0, '201807132259535649', 0, '订单已完成', 241, 165, 6, 1533890226, 'admin', 1533890274, 1, '');
INSERT INTO `order_goods_progress` VALUES (93, 253, '201807139921524854', 0, '201807139921524854', 0, '订单已派单到服务商17621612151', 241, 0, 1, 1533964458, '', 0, 1, '服务商联系电话:17621612151');
INSERT INTO `order_goods_progress` VALUES (94, 253, '201807139921524854', 162, '普通注册', 1, '流程1', 241, 0, 2, 1533964458, '', 0, 0, '我去热翁无群而我却');
INSERT INTO `order_goods_progress` VALUES (95, 253, '201807139921524854', 162, '普通注册', 2, '流程2', 241, 0, 3, 1533964458, '', 0, 0, '为我去额我去额');
INSERT INTO `order_goods_progress` VALUES (96, 253, '201807139921524854', 162, '普通注册', 3, '流程3', 241, 0, 4, 1533964458, '', 0, 0, '我而我却二我去额');
INSERT INTO `order_goods_progress` VALUES (97, 253, '201807139921524854', 162, '普通注册', 4, '流程4', 241, 0, 5, 1533964458, '', 0, 0, '为请问去');
INSERT INTO `order_goods_progress` VALUES (98, 253, '201807139921524854', 0, '201807139921524854', 0, '订单已完成', 241, 0, 6, 1533964458, '', 0, 0, '');
INSERT INTO `order_goods_progress` VALUES (99, 252, '201807138525495297', 0, '201807138525495297', 0, '订单已派单到服务商17621612151', 241, 165, 1, 1533964710, 'admin', 1533971996, 1, '服务商联系电话:17621612151');
INSERT INTO `order_goods_progress` VALUES (100, 252, '201807138525495297', 162, '普通注册', 1, '流程1', 241, 165, 2, 1533964710, 'admin', 1533971996, 1, '我去热翁无群而我却');
INSERT INTO `order_goods_progress` VALUES (101, 252, '201807138525495297', 162, '普通注册', 2, '流程2', 241, 165, 3, 1533964710, 'admin', 1534123221, 1, '为我去额我去额');
INSERT INTO `order_goods_progress` VALUES (102, 252, '201807138525495297', 162, '普通注册', 3, '流程3', 241, 0, 4, 1533964710, '', 0, 0, '我而我却二我去额');
INSERT INTO `order_goods_progress` VALUES (103, 252, '201807138525495297', 162, '普通注册', 4, '流程4', 241, 0, 5, 1533964710, '', 0, 0, '为请问去');
INSERT INTO `order_goods_progress` VALUES (104, 252, '201807138525495297', 0, '201807138525495297', 0, '订单已完成', 241, 0, 6, 1533964710, '', 0, 0, '');
INSERT INTO `order_goods_progress` VALUES (105, 741, '201808165643984949', 0, '201808165643984949', 0, '订单已派单到服务商17621612151', 241, 165, 1, 1534398041, 'admin', 1534398048, 1, '服务商联系电话:17621612151');
INSERT INTO `order_goods_progress` VALUES (106, 741, '201808165643984949', 6, '办事处注册', 1, '流程1', 241, 165, 2, 1534398041, 'admin', 1534398048, 1, '我去热翁无群而我却');
INSERT INTO `order_goods_progress` VALUES (107, 741, '201808165643984949', 6, '办事处注册', 2, '流程2', 241, 165, 3, 1534398041, 'admin', 1534398048, 1, '为我去额我去额');
INSERT INTO `order_goods_progress` VALUES (108, 741, '201808165643984949', 6, '办事处注册', 3, '流程3', 241, 165, 4, 1534398041, 'admin', 1534398049, 1, '我而我却二我去额');
INSERT INTO `order_goods_progress` VALUES (109, 741, '201808165643984949', 6, '办事处注册', 4, '流程4', 241, 165, 5, 1534398041, 'admin', 1534398074, 1, '为请问去');
INSERT INTO `order_goods_progress` VALUES (110, 741, '201808165643984949', 0, '201808165643984949', 0, '订单已完成', 241, 165, 6, 1534398041, 'admin', 1534398077, 1, '');
INSERT INTO `order_goods_progress` VALUES (111, 743, '201808165165910150', 0, '201808165165910150', 0, '订单已派单到服务商17621612151', 241, 165, 1, 1534402353, 'admin', 1534402406, 1, '服务商联系电话:17621612151');
INSERT INTO `order_goods_progress` VALUES (112, 743, '201808165165910150', 6, '办事处注册', 1, '流程1', 241, 165, 2, 1534402353, 'admin', 1534402406, 1, '我去热翁无群而我却');
INSERT INTO `order_goods_progress` VALUES (113, 743, '201808165165910150', 6, '办事处注册', 2, '流程2', 241, 165, 3, 1534402353, 'admin', 1534402416, 1, '为我去额我去额');
INSERT INTO `order_goods_progress` VALUES (114, 743, '201808165165910150', 6, '办事处注册', 3, '流程3', 241, 165, 4, 1534402353, 'admin', 1534402429, 1, '我而我却二我去额');
INSERT INTO `order_goods_progress` VALUES (115, 743, '201808165165910150', 6, '办事处注册', 4, '流程4', 241, 165, 5, 1534402353, 'admin', 1534402437, 1, '为请问去');
INSERT INTO `order_goods_progress` VALUES (116, 743, '201808165165910150', 0, '201808165165910150', 0, '订单已完成', 241, 165, 6, 1534402353, 'admin', 1534402444, 1, '');
INSERT INTO `order_goods_progress` VALUES (117, 760, '202403237653855564', 0, '202403237653855564', 0, '订单已派单到服务商18621153185', 241, 0, 1, 1711169148, '', 0, 1, '服务商联系电话:18621153185');
INSERT INTO `order_goods_progress` VALUES (118, 760, '202403237653855564', 162, '普通注册', 1, '流程1', 241, 0, 2, 1711169148, '', 0, 0, '我去热翁无群而我却');
INSERT INTO `order_goods_progress` VALUES (119, 760, '202403237653855564', 162, '普通注册', 2, '流程2', 241, 0, 3, 1711169148, '', 0, 0, '为我去额我去额');
INSERT INTO `order_goods_progress` VALUES (120, 760, '202403237653855564', 162, '普通注册', 3, '流程3', 241, 0, 4, 1711169148, '', 0, 0, '我而我却二我去额');
INSERT INTO `order_goods_progress` VALUES (121, 760, '202403237653855564', 162, '普通注册', 4, '流程4', 241, 0, 5, 1711169148, '', 0, 0, '为请问去');
INSERT INTO `order_goods_progress` VALUES (122, 760, '202403237653855564', 0, '202403237653855564', 0, '订单已完成', 241, 0, 6, 1711169148, '', 0, 0, '');
INSERT INTO `order_goods_progress` VALUES (123, 764, '202403234482485110', 0, '202403234482485110', 0, '订单已派单到服务商18621153185', 241, 0, 1, 1711169739, '', 0, 1, '服务商联系电话:18621153185');
INSERT INTO `order_goods_progress` VALUES (124, 764, '202403234482485110', 162, '普通注册', 1, '流程1', 241, 0, 2, 1711169739, '', 0, 0, '我去热翁无群而我却');
INSERT INTO `order_goods_progress` VALUES (125, 764, '202403234482485110', 162, '普通注册', 2, '流程2', 241, 0, 3, 1711169739, '', 0, 0, '为我去额我去额');
INSERT INTO `order_goods_progress` VALUES (126, 764, '202403234482485110', 162, '普通注册', 3, '流程3', 241, 0, 4, 1711169739, '', 0, 0, '我而我却二我去额');
INSERT INTO `order_goods_progress` VALUES (127, 764, '202403234482485110', 162, '普通注册', 4, '流程4', 241, 0, 5, 1711169739, '', 0, 0, '为请问去');
INSERT INTO `order_goods_progress` VALUES (128, 764, '202403234482485110', 0, '202403234482485110', 0, '订单已完成', 241, 0, 6, 1711169739, '', 0, 0, '');
INSERT INTO `order_goods_progress` VALUES (129, 766, '202403235562481015', 0, '202403235562481015', 0, '订单已派单到服务商18621153185', 241, 165, 1, 1711169905, 'admin', 1711169923, 1, '服务商联系电话:18621153185');
INSERT INTO `order_goods_progress` VALUES (130, 766, '202403235562481015', 162, '普通注册', 1, '流程1', 241, 165, 2, 1711169905, 'admin', 1711169923, 1, '我去热翁无群而我却');
INSERT INTO `order_goods_progress` VALUES (131, 766, '202403235562481015', 162, '普通注册', 2, '流程2', 241, 165, 3, 1711169905, 'admin', 1711169924, 1, '为我去额我去额');
INSERT INTO `order_goods_progress` VALUES (132, 766, '202403235562481015', 162, '普通注册', 3, '流程3', 241, 165, 4, 1711169905, 'admin', 1711169925, 1, '我而我却二我去额');
INSERT INTO `order_goods_progress` VALUES (133, 766, '202403235562481015', 162, '普通注册', 4, '流程4', 241, 165, 5, 1711169905, 'admin', 1711169926, 1, '为请问去');
INSERT INTO `order_goods_progress` VALUES (134, 766, '202403235562481015', 0, '202403235562481015', 0, '订单已完成', 241, 165, 6, 1711169905, 'admin', 1711169927, 1, '');

-- ----------------------------
-- Table structure for order_info
-- ----------------------------
DROP TABLE IF EXISTS `order_info`;
CREATE TABLE `order_info`  (
  `order_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_sn` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `event_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `app_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `order_sn_shop` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '微信订单号',
  `seller_id` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '服务商id',
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '购买者会员id',
  `order_status` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '\'0\'=>\'未付款 \',\'1\'=>\'已付款\',\'2\'=>\'退款\',\'3\'=>\'钱已转移到钱包\',\'4\'=>\'已取消\',\'5\'=>\'交易成功\',\'6\'=>\'已评价\'',
  `shipping_status` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '0:未发货,1:已发货,2:已收货',
  `pay_status` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '\'0\'=>\'未付款\',\'1\'=>\'付款中\',\'2\'=>\'已付款\'',
  `refund_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '\'0\'=> \'没人申请退款\',\'1\'=>\'来访者申请退款\',\'2\'=> \'咨询师申请退款\'',
  `consignee` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `country` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `province` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `city` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '\'0\'=>\'未付款 \',\'1\'=>\'已付款\',\'2\'=>\'退款\',\'3\'=>\'钱已转移到钱包\',\'4\'=>\'已取消\',\'5\'=>\'交易成功\',\'6\'=>\'已评价\'',
  `district` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `zipcode` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `tel` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mobile` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `email` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `best_time` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `sign_building` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `postscript` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `shipping_id` tinyint(3) NOT NULL DEFAULT 0,
  `shipping_name` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `pay_id` tinyint(3) NOT NULL DEFAULT 0,
  `pay_name` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `how_oos` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `how_surplus` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `pack_name` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `card_name` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `card_message` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `inv_payee` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `inv_content` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `goods_amount` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '商品总价格',
  `shipping_fee` decimal(10, 2) NOT NULL DEFAULT 0.00,
  `insure_fee` decimal(10, 2) NOT NULL DEFAULT 0.00,
  `pay_fee` decimal(10, 2) NOT NULL DEFAULT 0.00,
  `pack_fee` decimal(10, 2) NOT NULL DEFAULT 0.00,
  `card_fee` decimal(10, 2) NOT NULL DEFAULT 0.00,
  `money_paid` decimal(10, 2) NOT NULL DEFAULT 0.00,
  `surplus` decimal(10, 2) NOT NULL DEFAULT 0.00,
  `integral` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `integral_money` decimal(10, 2) NOT NULL DEFAULT 0.00,
  `bonus` decimal(10, 2) NOT NULL DEFAULT 0.00,
  `order_amount` decimal(10, 2) NOT NULL DEFAULT 0.00,
  `from_ad` smallint(5) NOT NULL DEFAULT 0,
  `referer` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `add_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间',
  `confirm_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '确认时间',
  `pay_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '付款时间',
  `shipping_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '分配服务商时间',
  `pack_id` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `card_id` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `bonus_id` mediumint(8) UNSIGNED NOT NULL DEFAULT 0,
  `invoice_no` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `extension_code` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `extension_id` mediumint(8) UNSIGNED NOT NULL DEFAULT 0,
  `to_buyer` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `pay_note` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `agency_id` smallint(5) UNSIGNED NOT NULL,
  `inv_type` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `tax` decimal(10, 2) NOT NULL,
  `is_separate` tinyint(1) NOT NULL DEFAULT 0,
  `parent_id` mediumint(8) UNSIGNED NOT NULL DEFAULT 0,
  `discount` decimal(10, 2) NOT NULL,
  `refund_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '退款原因',
  `flower` tinyint(1) NOT NULL DEFAULT 0 COMMENT '献花次数',
  `invheader` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '发票抬头',
  `invinfo` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '发票信息',
  `content` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '客户留言',
  `order_type` int(1) NOT NULL DEFAULT 0 COMMENT '订单类型:\r\n1为工商服务\r\n2为财税服务\r\n9为资质办理\r\n17为知识产权\r\n22为认证服务\r\n26为法律服务\r\n30为金融服务\r\n144为套餐服务',
  `invoice_type` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '发票类型：普通发票、增值税发票',
  `obj_issuing` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '开票对象：个人、企业',
  `delete_time` int(10) NULL DEFAULT 0 COMMENT '取消订单时间',
  `finish_time` int(10) NULL DEFAULT NULL COMMENT '服务商完成订单时间',
  PRIMARY KEY (`order_id`) USING BTREE,
  UNIQUE INDEX `order_sn`(`order_sn`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  INDEX `order_status`(`order_status`) USING BTREE,
  INDEX `shipping_status`(`shipping_status`) USING BTREE,
  INDEX `pay_status`(`pay_status`) USING BTREE,
  INDEX `shipping_id`(`shipping_id`) USING BTREE,
  INDEX `pay_id`(`pay_id`) USING BTREE,
  INDEX `extension_code`(`extension_code`, `extension_id`) USING BTREE,
  INDEX `agency_id`(`agency_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 767 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '订单信息表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of order_info
-- ----------------------------
INSERT INTO `order_info` VALUES (752, '202403236113499954', NULL, NULL, '190000985120180702161728', 241, 12, 1, 0, 2, 0, '', 0, 10, 109, 1215, '上海-上海市-黄浦区', '', '', '15371715719', '', '', '', '', 0, '', 0, '', '', '', '', '', '', '', '', 1680.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0.00, 0.00, 1680.00, 0, '', 1711160497, 0, 1711160986, 1711160986, 0, 0, 0, '', '', 0, '', '', 0, '', 0.00, 0, 0, 0.00, '', 0, '', '', '', 1, '', '', 0, NULL);
INSERT INTO `order_info` VALUES (753, '202403234076495254', NULL, NULL, '', 0, 12, 0, 0, 0, 0, '', 0, 10, 109, 1215, '上海-上海市-黄浦区', '', '', '15371715719', '', '', '', '', 0, '', 0, '', '', '', '', '', '', '', '', 1680.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0.00, 0.00, 1680.00, 0, '', 1711163073, 0, 0, 0, 0, 0, 0, '', '', 0, '', '', 0, '', 0.00, 0, 0, 0.00, '', 0, '', '', '', 1, '', '', 0, NULL);
INSERT INTO `order_info` VALUES (754, '202403236038544957', NULL, NULL, '', 0, 12, 0, 0, 0, 0, '', 0, 10, 109, 1215, '上海-上海市-黄浦区', '', '', '15371715719', '', '', '', '', 0, '', 0, '', '', '', '', '', '', '', '', 1680.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0.00, 0.00, 1680.00, 0, '', 1711163142, 0, 0, 0, 0, 0, 0, '', '', 0, '', '', 0, '', 0.00, 0, 0, 0.00, '', 0, '', '', '', 1, '', '', 0, NULL);
INSERT INTO `order_info` VALUES (755, '202403232852544857', NULL, NULL, '', 0, 12, 0, 0, 0, 0, '', 0, 10, 109, 1215, '上海-上海市-黄浦区', '', '', '15371715719', '', '', '', '', 0, '', 0, '', '', '', '', '', '', '', '', 0.01, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0.00, 0.00, 0.01, 0, '', 1711163558, 0, 0, 0, 0, 0, 0, '', '', 0, '', '', 0, '', 0.00, 0, 0, 0.00, '', 0, '', '', '', 1, '', '', 0, NULL);
INSERT INTO `order_info` VALUES (756, '202403234001256515', NULL, NULL, '190000985120180702161728', 241, 12, 1, 0, 1, 0, '', 0, 0, 0, 0, '全国', '', '', '15371715719', '', '', '', '', 0, '', 0, '', '', '', '', '', '', '', '', 980.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0.00, 0.00, 980.00, 0, '', 1711165688, 0, 1711160986, 1711165779, 0, 0, 0, '', '', 0, '', '', 0, '', 0.00, 0, 0, 0.00, '', 0, '', '', '', 17, '', '', 0, NULL);
INSERT INTO `order_info` VALUES (757, '202403234460100555', NULL, NULL, '190000985120180702161728', 241, 12, 1, 0, 1, 0, '', 0, 0, 0, 0, '全国', '', '', '15371715719', '', '', '', '', 0, '', 0, '', '', '', '', '', '', '', '', 980.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0.00, 0.00, 980.00, 0, '', 1711165997, 0, 1711160986, 1711166042, 0, 0, 0, '', '', 0, '', '', 0, '', 0.00, 0, 0, 0.00, '', 0, '', '', '', 17, '', '', 0, NULL);
INSERT INTO `order_info` VALUES (758, '202403233608100485', NULL, NULL, '', 241, 12, 1, 0, 1, 0, '', 0, 0, 0, 0, '全国', '', '', '15371715719', '', '', '', '', 0, '', 0, '', '', '', '', '', '', '', '', 980.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0.00, 0.00, 980.00, 0, '', 1711168637, 0, 1711160986, 1711168682, 0, 0, 0, '', '', 0, '', '', 0, '', 0.00, 0, 0, 0.00, '', 0, '', '', '', 17, '', '', 0, NULL);
INSERT INTO `order_info` VALUES (759, '202403235629457521', NULL, NULL, '', 241, 12, 1, 0, 1, 0, '', 0, 0, 0, 0, '全国', '', '', '15371715719', '', '', '', '', 0, '', 0, '', '', '', '', '', '', '', '', 980.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0.00, 0.00, 980.00, 0, '', 1711168873, 0, 1711160986, 1711168901, 0, 0, 0, '', '', 0, '', '', 0, '', 0.00, 0, 0, 0.00, '', 0, '', '', '', 17, '', '', 0, NULL);
INSERT INTO `order_info` VALUES (760, '202403237653855564', NULL, NULL, '190000985120180702161728', 241, 12, 1, 0, 1, 0, '', 0, 0, 0, 0, '全国', '', '', '15371715719', '', '', '', '', 0, '', 0, '', '', '', '', '', '', '', '', 980.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0.00, 0.00, 980.00, 0, '', 1711168951, 0, 1711160986, 1711169444, 0, 0, 0, '', '', 0, '', '', 0, '', 0.00, 0, 0, 0.00, '', 0, '', '', '', 17, '', '', 0, NULL);
INSERT INTO `order_info` VALUES (761, '202403235531253491', NULL, NULL, '190000985120180702161728', 241, 12, 1, 0, 1, 0, '', 0, 0, 0, 0, '全国', '', '', '15371715719', '', '', '', '', 0, '', 0, '', '', '', '', '', '', '', '', 980.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0.00, 0.00, 980.00, 0, '', 1711169349, 0, 1711160986, 1711169415, 0, 0, 0, '', '', 0, '', '', 0, '', 0.00, 0, 0, 0.00, '', 0, '', '', '', 17, '', '', 0, NULL);
INSERT INTO `order_info` VALUES (762, '202403233101855511', NULL, NULL, '190000985120180702161728', 241, 12, 1, 0, 1, 0, '', 0, 0, 0, 0, '全国', '', '', '15371715719', '', '', '', '', 0, '', 0, '', '', '', '', '', '', '', '', 980.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0.00, 0.00, 980.00, 0, '', 1711169463, 0, 1711160986, 1711169508, 0, 0, 0, '', '', 0, '', '', 0, '', 0.00, 0, 0, 0.00, '', 0, '', '', '', 17, '', '', 0, NULL);
INSERT INTO `order_info` VALUES (763, '202403232463529950', NULL, NULL, '190000985120180702161728', 241, 12, 1, 0, 1, 0, '', 0, 0, 0, 0, '全国', '', '', '15371715719', '', '', '', '', 0, '', 0, '', '', '', '', '', '', '', '', 980.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0.00, 0.00, 980.00, 0, '', 1711169540, 0, 1711160986, 1711169577, 0, 0, 0, '', '', 0, '', '', 0, '', 0.00, 0, 0, 0.00, '', 0, '', '', '', 17, '', '', 0, NULL);
INSERT INTO `order_info` VALUES (764, '202403234482485110', NULL, NULL, '190000985120180702161728', 241, 12, 1, 0, 1, 0, '', 0, 0, 0, 0, '全国', '', '', '15371715719', '', '', '', '', 0, '', 0, '', '', '', '', '', '', '', '', 980.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0.00, 0.00, 980.00, 0, '', 1711169616, 0, 1711160986, 1711169649, 0, 0, 0, '', '', 0, '', '', 0, '', 0.00, 0, 0, 0.00, '', 0, '', '', '', 17, '', '', 0, NULL);
INSERT INTO `order_info` VALUES (765, '202403233247210210', NULL, NULL, '190000985120180702161728', 241, 12, 1, 0, 1, 0, '', 0, 0, 0, 0, '全国', '', '', '15371715719', '', '', '', '', 0, '', 0, '', '', '', '', '', '', '', '', 980.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0.00, 0.00, 980.00, 0, '', 1711169791, 0, 1711160986, 1711169825, 0, 0, 0, '', '', 0, '', '', 0, '', 0.00, 0, 0, 0.00, '', 0, '', '', '', 17, '', '', 0, NULL);
INSERT INTO `order_info` VALUES (766, '202403235562481015', NULL, NULL, '190000985120180702161728', 241, 12, 5, 0, 1, 0, '', 0, 0, 0, 0, '全国', '', '', '15371715719', '', '', '', '', 0, '', 0, '', '', '', '', '', '', '', '', 980.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0.00, 0.00, 980.00, 0, '', 1711169872, 0, 1711160986, 1711169904, 0, 0, 0, '', '', 0, '', '', 0, '', 0.00, 0, 0, 0.00, '', 0, '', '', '', 17, '', '', 0, 1711169927);

-- ----------------------------
-- Table structure for order_visitor
-- ----------------------------
DROP TABLE IF EXISTS `order_visitor`;
CREATE TABLE `order_visitor`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '日志行为id',
  `order_id` int(11) NOT NULL,
  `real_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '真实姓名',
  `sex` tinyint(1) NOT NULL COMMENT '性别 0保密 1男 2女',
  `age` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '年龄',
  `education` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '最高学历',
  `profession` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '职业',
  `speciality` int(5) NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '咨询的原因及困惑',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 195 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '订单备注调查表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of order_visitor
-- ----------------------------

-- ----------------------------
-- Table structure for shoppingcart
-- ----------------------------
DROP TABLE IF EXISTS `shoppingcart`;
CREATE TABLE `shoppingcart`  (
  `cartid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '购物车id',
  `skuid` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '商品id',
  `cookieid` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '未登录状态下用户cookieid值',
  `number` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT '商品数量',
  `userid` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '客户id',
  `addtime` int(10) NOT NULL DEFAULT 0 COMMENT '添加时间',
  `isaccount` tinyint(1) NOT NULL DEFAULT 0 COMMENT '结算标志: 0 : 未结算, 1 : 结算',
  PRIMARY KEY (`cartid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 672 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '购物车表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of shoppingcart
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
