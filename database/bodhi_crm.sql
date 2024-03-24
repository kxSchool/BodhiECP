/*
 Navicat Premium Data Transfer

 Source Server         : bodhi
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : 192.168.31.125:3306
 Source Schema         : bodhi_crm

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 23/03/2024 11:17:01
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for staff1
-- ----------------------------
DROP TABLE IF EXISTS `staff1`;
CREATE TABLE `staff1`  (
  `userid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '会员id',
  `username` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '账号名',
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '密码，加密方式为：明码md5得到的结果后面拼接上加密秘钥（encrypt），最后在md5',
  `encrypt` char(6) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '秘钥（六位的随机字母）',
  `birthday` int(11) NOT NULL DEFAULT 0 COMMENT '生日',
  `sex` tinyint(1) NOT NULL DEFAULT 0 COMMENT '性别 0保密 1男 2女',
  `realname` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '真实姓名',
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '邮箱',
  `emailauth` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0:未认证;1已认证',
  `qq` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `region_id` int(11) NOT NULL COMMENT '地区id',
  `mobile` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '手机号',
  `register_time` int(11) NOT NULL DEFAULT 0 COMMENT '注册时间（时间戳）',
  `register_ip` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '注册IP',
  `login_time` int(11) NOT NULL DEFAULT 0 COMMENT '上次登陆时间（时间戳）',
  `login_ip` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '上次登陆IP',
  `login_count` int(11) NOT NULL DEFAULT 0 COMMENT '总计登陆次数',
  `disabled` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1账号禁用 0正常使用',
  `dateCreated` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '云通讯子账户的创建时间',
  `online` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '0 不在线 1在线',
  `money` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '钱包',
  `sort` tinyint(6) NOT NULL DEFAULT 0 COMMENT '排序权重',
  `hxname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '环信账号',
  `hxpassword` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '环信密码',
  `shopid` int(11) NOT NULL DEFAULT 0 COMMENT '商铺id号',
  `roleid` int(11) NOT NULL DEFAULT 0 COMMENT '角色id（对应staff_role表中的roleid）',
  `addtime` datetime NULL DEFAULT NULL COMMENT '修理厂入住平台时间',
  `isadmin` smallint(1) NOT NULL DEFAULT 0 COMMENT '是否为管理员: (1:是,0:不是)',
  PRIMARY KEY (`userid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 169 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '账户主表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of staff1
-- ----------------------------
INSERT INTO `staff1` VALUES (165, 'admin', '9db06bcff9248837f86d1a6bcf41c9e7', '', 0, 0, '上海章大牛企业管理有限公司', '28586585@qq.com', 0, '', 0, '18621153185', 1521769972, '192.168.1.3', 0, '', 0, 0, '', 0, 0.00, 0, '', '', 241, 26, '2018-03-23 09:52:52', 1);

-- ----------------------------
-- Table structure for staff_priv
-- ----------------------------
DROP TABLE IF EXISTS `staff_priv`;
CREATE TABLE `staff_priv`  (
  `privid` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '节点id',
  `name` char(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '节点名',
  `parentid` smallint(6) NOT NULL DEFAULT 0 COMMENT '上级节点',
  `c` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '控制器',
  `a` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '方法',
  `data` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '附加参数',
  `style` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '菜单样式',
  `listorder` smallint(6) UNSIGNED NOT NULL DEFAULT 0 COMMENT '排序',
  `disabled` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0不显示 显示',
  PRIMARY KEY (`privid`) USING BTREE,
  INDEX `listorder`(`listorder`) USING BTREE,
  INDEX `parentid`(`parentid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 104 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '权限节点表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of staff_priv
-- ----------------------------
INSERT INTO `staff_priv` VALUES (98, '订单管理', 100, 'TicketsOrder', 'order', '', '', 0, 1);
INSERT INTO `staff_priv` VALUES (77, '员工管理', 1, 'staff', 'index', '', '', 0, 1);
INSERT INTO `staff_priv` VALUES (99, '日志管理', 100, 'TicketsLog', 'ticketslog', '', '', 0, 1);
INSERT INTO `staff_priv` VALUES (1, '权限管理', 0, 'manager', 'init', '', 'fa fa-table', 0, 1);
INSERT INTO `staff_priv` VALUES (2, '角色管理', 1, 'manager', 'role', '', '', 0, 1);
INSERT INTO `staff_priv` VALUES (3, '总账管理', 1, 'manager', 'admin', '', '', 0, 1);
INSERT INTO `staff_priv` VALUES (4, '节点管理', 1, 'manager', 'priv', '', '', 0, 1);
INSERT INTO `staff_priv` VALUES (100, '财务管理', 0, 'account', '', '', 'fa fa-table', 0, 1);
INSERT INTO `staff_priv` VALUES (101, '资金明细', 100, 'accountlog', 'accountlog', '', '', 0, 1);
INSERT INTO `staff_priv` VALUES (102, '提现管理', 100, 'UserAccount', 'useraccount', '', '', 0, 1);

-- ----------------------------
-- Table structure for staff_role
-- ----------------------------
DROP TABLE IF EXISTS `staff_role`;
CREATE TABLE `staff_role`  (
  `roleid` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '角色id',
  `rolename` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '角色名',
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '角色描述',
  `disabled` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否可用（1禁用 0可用 默认为0）',
  `shopid` int(11) NOT NULL DEFAULT 0 COMMENT '商铺id',
  `isshow` smallint(1) NOT NULL DEFAULT 1 COMMENT '是否显示(1:显示,0:不显示)',
  `isadmin` smallint(1) NOT NULL DEFAULT 0 COMMENT '是否是管理员角色',
  PRIMARY KEY (`roleid`) USING BTREE,
  INDEX `disabled`(`disabled`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 29 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '管理员角色表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of staff_role
-- ----------------------------
INSERT INTO `staff_role` VALUES (1, '商铺CRM管理员', 'CRM系统管理员', 0, 11, 1, 1);
INSERT INTO `staff_role` VALUES (2, '商铺CRM询价模块管理员', 'CRM询价模块管理员', 0, 0, 1, 0);
INSERT INTO `staff_role` VALUES (3, '财务专员', '主要负责公司财务对账事宜', 0, 0, 1, 0);
INSERT INTO `staff_role` VALUES (8, 'CRM客服权限组', '本角色主要负责供货商询价单寻报价管理,订单管理', 0, 0, 1, 0);
INSERT INTO `staff_role` VALUES (9, '供货商权限组', '供货商主要功能组', 0, 0, 1, 0);
INSERT INTO `staff_role` VALUES (12, 'CRM商铺管理员', '', 0, 66, 0, 1);
INSERT INTO `staff_role` VALUES (13, 'CRM商铺管理员', '', 0, 231, 0, 1);
INSERT INTO `staff_role` VALUES (14, 'CRM商铺管理员', '', 0, 1, 0, 1);
INSERT INTO `staff_role` VALUES (18, '职员[awei1601]权限', '', 0, 231, 0, 0);
INSERT INTO `staff_role` VALUES (19, '职员[aaaaa]权限', '', 0, 231, 0, 0);
INSERT INTO `staff_role` VALUES (20, '职员[xiaobai]权限', '', 0, 11, 0, 0);
INSERT INTO `staff_role` VALUES (21, 'ddddd', 'ffffe', 0, 0, 1, 0);
INSERT INTO `staff_role` VALUES (22, 'CRM商铺管理员', '', 0, 240, 0, 1);
INSERT INTO `staff_role` VALUES (23, '职员[xiaobai]权限', '', 0, 240, 0, 0);
INSERT INTO `staff_role` VALUES (24, 'CRM商铺管理员', '', 0, 105, 0, 1);
INSERT INTO `staff_role` VALUES (25, '职员[xiaobai]权限', '', 0, 105, 0, 0);
INSERT INTO `staff_role` VALUES (26, 'CRM商铺管理员', '', 0, 241, 0, 1);
INSERT INTO `staff_role` VALUES (27, 'CRM商铺管理员', '', 0, 1, 0, 1);
INSERT INTO `staff_role` VALUES (28, 'CRM商铺管理员', '', 0, 106, 0, 1);

-- ----------------------------
-- Table structure for staff_role_priv
-- ----------------------------
DROP TABLE IF EXISTS `staff_role_priv`;
CREATE TABLE `staff_role_priv`  (
  `roleid` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '角色id（对应happy_admin_role表中的roleid）',
  `privid` tinyint(3) NOT NULL DEFAULT 0 COMMENT '权限节点',
  INDEX `roleid`(`roleid`, `privid`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '管理员后台操作权限表' ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of staff_role_priv
-- ----------------------------
INSERT INTO `staff_role_priv` VALUES (1, 1);
INSERT INTO `staff_role_priv` VALUES (1, 2);
INSERT INTO `staff_role_priv` VALUES (1, 3);
INSERT INTO `staff_role_priv` VALUES (1, 4);
INSERT INTO `staff_role_priv` VALUES (1, 77);
INSERT INTO `staff_role_priv` VALUES (1, 98);
INSERT INTO `staff_role_priv` VALUES (1, 99);
INSERT INTO `staff_role_priv` VALUES (10, 77);
INSERT INTO `staff_role_priv` VALUES (10, 98);
INSERT INTO `staff_role_priv` VALUES (10, 99);
INSERT INTO `staff_role_priv` VALUES (12, 77);
INSERT INTO `staff_role_priv` VALUES (13, 77);
INSERT INTO `staff_role_priv` VALUES (14, 77);
INSERT INTO `staff_role_priv` VALUES (20, 1);
INSERT INTO `staff_role_priv` VALUES (20, 2);
INSERT INTO `staff_role_priv` VALUES (20, 3);
INSERT INTO `staff_role_priv` VALUES (20, 4);
INSERT INTO `staff_role_priv` VALUES (20, 77);
INSERT INTO `staff_role_priv` VALUES (20, 98);
INSERT INTO `staff_role_priv` VALUES (20, 99);
INSERT INTO `staff_role_priv` VALUES (22, 1);
INSERT INTO `staff_role_priv` VALUES (22, 2);
INSERT INTO `staff_role_priv` VALUES (22, 3);
INSERT INTO `staff_role_priv` VALUES (22, 4);
INSERT INTO `staff_role_priv` VALUES (22, 77);
INSERT INTO `staff_role_priv` VALUES (22, 98);
INSERT INTO `staff_role_priv` VALUES (22, 99);
INSERT INTO `staff_role_priv` VALUES (22, 100);
INSERT INTO `staff_role_priv` VALUES (22, 101);
INSERT INTO `staff_role_priv` VALUES (22, 102);
INSERT INTO `staff_role_priv` VALUES (23, 1);
INSERT INTO `staff_role_priv` VALUES (23, 2);
INSERT INTO `staff_role_priv` VALUES (23, 3);
INSERT INTO `staff_role_priv` VALUES (23, 4);
INSERT INTO `staff_role_priv` VALUES (23, 77);
INSERT INTO `staff_role_priv` VALUES (23, 98);
INSERT INTO `staff_role_priv` VALUES (23, 99);
INSERT INTO `staff_role_priv` VALUES (23, 100);
INSERT INTO `staff_role_priv` VALUES (23, 101);
INSERT INTO `staff_role_priv` VALUES (23, 102);
INSERT INTO `staff_role_priv` VALUES (24, 1);
INSERT INTO `staff_role_priv` VALUES (24, 2);
INSERT INTO `staff_role_priv` VALUES (24, 3);
INSERT INTO `staff_role_priv` VALUES (24, 4);
INSERT INTO `staff_role_priv` VALUES (24, 77);
INSERT INTO `staff_role_priv` VALUES (24, 98);
INSERT INTO `staff_role_priv` VALUES (24, 99);
INSERT INTO `staff_role_priv` VALUES (24, 100);
INSERT INTO `staff_role_priv` VALUES (24, 101);
INSERT INTO `staff_role_priv` VALUES (24, 102);
INSERT INTO `staff_role_priv` VALUES (25, 98);
INSERT INTO `staff_role_priv` VALUES (25, 99);
INSERT INTO `staff_role_priv` VALUES (25, 100);
INSERT INTO `staff_role_priv` VALUES (25, 101);
INSERT INTO `staff_role_priv` VALUES (25, 102);
INSERT INTO `staff_role_priv` VALUES (26, 1);
INSERT INTO `staff_role_priv` VALUES (26, 2);
INSERT INTO `staff_role_priv` VALUES (26, 3);
INSERT INTO `staff_role_priv` VALUES (26, 4);
INSERT INTO `staff_role_priv` VALUES (26, 77);
INSERT INTO `staff_role_priv` VALUES (26, 98);
INSERT INTO `staff_role_priv` VALUES (26, 99);
INSERT INTO `staff_role_priv` VALUES (26, 100);
INSERT INTO `staff_role_priv` VALUES (26, 101);
INSERT INTO `staff_role_priv` VALUES (26, 102);
INSERT INTO `staff_role_priv` VALUES (27, 1);
INSERT INTO `staff_role_priv` VALUES (27, 2);
INSERT INTO `staff_role_priv` VALUES (27, 3);
INSERT INTO `staff_role_priv` VALUES (27, 4);
INSERT INTO `staff_role_priv` VALUES (27, 77);
INSERT INTO `staff_role_priv` VALUES (27, 98);
INSERT INTO `staff_role_priv` VALUES (27, 99);
INSERT INTO `staff_role_priv` VALUES (27, 100);
INSERT INTO `staff_role_priv` VALUES (27, 101);
INSERT INTO `staff_role_priv` VALUES (27, 102);

SET FOREIGN_KEY_CHECKS = 1;
