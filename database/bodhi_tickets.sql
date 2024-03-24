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

 Date: 23/03/2024 11:17:33
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
) ENGINE = MyISAM AUTO_INCREMENT = 1243 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '订单商品信息备份表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of order_goods
-- ----------------------------

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
) ENGINE = MyISAM AUTO_INCREMENT = 117 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '订单商品进度表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of order_goods_progress
-- ----------------------------

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
) ENGINE = MyISAM AUTO_INCREMENT = 752 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '订单信息表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of order_info
-- ----------------------------

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
