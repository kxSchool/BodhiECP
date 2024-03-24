/*
 Navicat Premium Data Transfer

 Source Server         : bodhi
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : 192.168.31.125:3306
 Source Schema         : bodhi_goods

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 23/03/2024 11:17:09
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for attribute
-- ----------------------------
DROP TABLE IF EXISTS `attribute`;
CREATE TABLE `attribute`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '属性名称',
  `pid` mediumint(8) UNSIGNED NOT NULL COMMENT '上级id',
  `catid` mediumint(8) UNSIGNED NOT NULL COMMENT '分类id',
  `desc` tinyint(4) NOT NULL COMMENT '属性描述：排序',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '产品属性表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of attribute
-- ----------------------------

-- ----------------------------
-- Table structure for brand
-- ----------------------------
DROP TABLE IF EXISTS `brand`;
CREATE TABLE `brand`  (
  `id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '品牌名称',
  `logoimg` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'logo图片',
  `desc` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '描述',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 172 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '品牌表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of brand
-- ----------------------------

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category`  (
  `cat_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键',
  `cat_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '分类名称',
  `cat_pid` mediumint(8) UNSIGNED NOT NULL COMMENT '上级id',
  `cat_desc` tinyint(4) NOT NULL COMMENT '分类描述：排序',
  `is_hot` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否为热门 1为是',
  `is_show` tinyint(1) NOT NULL DEFAULT 1 COMMENT '是否显示, 1为是',
  `is_del` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否删除 1为是',
  PRIMARY KEY (`cat_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 159 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '产品分类表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES (1, '工商服务', 0, 0, 0, 1, 0);
INSERT INTO `category` VALUES (2, '公司注册', 1, 0, 0, 1, 0);
INSERT INTO `category` VALUES (3, '公司变更', 1, 0, 0, 1, 0);
INSERT INTO `category` VALUES (34, '外商独资公司注册', 2, 3, 1, 0, 1);
INSERT INTO `category` VALUES (4, '公司注销及其他', 1, 0, 0, 1, 0);
INSERT INTO `category` VALUES (5, '财税服务', 0, 0, 0, 1, 0);
INSERT INTO `category` VALUES (6, '代理记账', 5, 0, 0, 1, 0);
INSERT INTO `category` VALUES (7, '税务代办', 5, 0, 0, 1, 0);
INSERT INTO `category` VALUES (8, '审计评估', 5, 0, 0, 1, 0);
INSERT INTO `category` VALUES (9, '资质办理', 0, 0, 0, 1, 0);
INSERT INTO `category` VALUES (10, '货物运输类', 9, 3, 0, 1, 0);
INSERT INTO `category` VALUES (11, '餐饮食品类', 9, 2, 0, 1, 0);
INSERT INTO `category` VALUES (13, '影视文化类', 9, 5, 0, 1, 0);
INSERT INTO `category` VALUES (14, '服务类', 9, 1, 0, 1, 0);
INSERT INTO `category` VALUES (33, '股份有限公司注册', 2, 2, 0, 1, 0);
INSERT INTO `category` VALUES (16, '互联网类', 9, 4, 0, 1, 0);
INSERT INTO `category` VALUES (17, '知识产权', 0, 0, 0, 1, 0);
INSERT INTO `category` VALUES (18, '商标', 17, 0, 0, 1, 0);
INSERT INTO `category` VALUES (19, '版权', 17, 0, 0, 1, 0);
INSERT INTO `category` VALUES (20, '专利', 17, 0, 0, 1, 0);
INSERT INTO `category` VALUES (21, '知识产权贯标服务', 17, 0, 0, 1, 0);
INSERT INTO `category` VALUES (22, '认证服务', 0, 0, 0, 1, 0);
INSERT INTO `category` VALUES (23, '商品条形码', 22, 0, 0, 1, 0);
INSERT INTO `category` VALUES (24, '管理体系认证', 22, 0, 0, 1, 0);
INSERT INTO `category` VALUES (25, '高新企业认定', 22, 0, 0, 1, 0);
INSERT INTO `category` VALUES (26, '法律服务', 0, 0, 0, 1, 0);
INSERT INTO `category` VALUES (27, '法律咨询', 26, 0, 0, 1, 0);
INSERT INTO `category` VALUES (28, '拟审合同', 26, 0, 0, 1, 0);
INSERT INTO `category` VALUES (29, '法律顾问', 26, 0, 0, 1, 0);
INSERT INTO `category` VALUES (30, '金融服务', 0, 0, 0, 1, 0);
INSERT INTO `category` VALUES (31, '金融服务', 30, 0, 0, 1, 0);
INSERT INTO `category` VALUES (32, '有限公司注册', 2, 1, 1, 1, 0);
INSERT INTO `category` VALUES (35, '合伙企业注册', 2, 4, 0, 1, 0);
INSERT INTO `category` VALUES (36, '分公司注册', 2, 5, 0, 1, 0);
INSERT INTO `category` VALUES (37, '办事处注册', 2, 6, 1, 1, 0);
INSERT INTO `category` VALUES (38, '个体工商注册', 2, 7, 0, 1, 0);
INSERT INTO `category` VALUES (39, '名称变更', 3, 0, 0, 1, 0);
INSERT INTO `category` VALUES (40, '地址变更', 3, 0, 0, 1, 0);
INSERT INTO `category` VALUES (41, '股权变更', 3, 0, 0, 1, 0);
INSERT INTO `category` VALUES (42, '法人变更', 3, 0, 0, 1, 0);
INSERT INTO `category` VALUES (43, '经营范围变更', 3, 0, 0, 1, 0);
INSERT INTO `category` VALUES (44, '董监高管理人员信息变更', 3, 0, 0, 1, 0);
INSERT INTO `category` VALUES (45, '简易注销', 4, 0, 0, 1, 0);
INSERT INTO `category` VALUES (46, '一般注销', 4, 0, 0, 1, 0);
INSERT INTO `category` VALUES (47, '年报公示', 4, 0, 0, 1, 0);
INSERT INTO `category` VALUES (48, '五证合一', 4, 0, 0, 1, 0);
INSERT INTO `category` VALUES (49, '工商解异常', 4, 0, 0, 1, 0);
INSERT INTO `category` VALUES (50, '开设银行基本户', 4, 0, 0, 1, 0);
INSERT INTO `category` VALUES (51, '银行开户预约', 4, 0, 0, 0, 0);
INSERT INTO `category` VALUES (52, '小规模纳税人记账服务', 6, 0, 1, 1, 0);
INSERT INTO `category` VALUES (53, '一般纳税人记账服务', 6, 0, 0, 1, 0);
INSERT INTO `category` VALUES (54, '税控代办', 7, 0, 0, 1, 0);
INSERT INTO `category` VALUES (55, '发票代办', 7, 0, 0, 1, 0);
INSERT INTO `category` VALUES (56, '税务解锁', 7, 0, 0, 1, 0);
INSERT INTO `category` VALUES (57, '所得税清缴汇算', 7, 0, 0, 1, 0);
INSERT INTO `category` VALUES (58, '验资报告', 8, 0, 0, 1, 0);
INSERT INTO `category` VALUES (59, '专项审计', 8, 0, 0, 1, 0);
INSERT INTO `category` VALUES (143, '商标宽展', 18, 4, 0, 1, 0);
INSERT INTO `category` VALUES (62, '道路运输经营许可证', 10, 0, 0, 1, 0);
INSERT INTO `category` VALUES (63, '无船承运业务经营资格许可证', 10, 0, 0, 1, 0);
INSERT INTO `category` VALUES (64, '食品经营许可证', 11, 0, 0, 1, 0);
INSERT INTO `category` VALUES (65, '食品生产经营许可证', 11, 0, 0, 1, 0);
INSERT INTO `category` VALUES (66, '酒类商品许可证', 11, 0, 0, 1, 0);
INSERT INTO `category` VALUES (68, '公共场所卫生许可证', 11, 0, 0, 1, 0);
INSERT INTO `category` VALUES (69, '广播电视节目经营许可证', 13, 0, 0, 1, 0);
INSERT INTO `category` VALUES (70, '营业性演出许可证', 13, 0, 0, 1, 0);
INSERT INTO `category` VALUES (71, '电影发行经营许可证', 13, 0, 0, 1, 0);
INSERT INTO `category` VALUES (72, '电影单片审查及发行许可证', 13, 0, 0, 1, 0);
INSERT INTO `category` VALUES (73, '电影立项拍摄(单片许可证)', 13, 0, 0, 1, 0);
INSERT INTO `category` VALUES (74, '电视剧剧本备案', 13, 0, 0, 1, 0);
INSERT INTO `category` VALUES (75, '电视剧立项拍摄(单片许可证)', 13, 0, 0, 1, 0);
INSERT INTO `category` VALUES (76, '广播电视视频点播业务经营许可证', 13, 0, 0, 1, 0);
INSERT INTO `category` VALUES (77, '人力资源服务许可证', 14, 0, 0, 1, 0);
INSERT INTO `category` VALUES (78, '劳务派遣经营许可证', 14, 0, 0, 1, 0);
INSERT INTO `category` VALUES (79, '进出口权许可证', 14, 0, 0, 1, 0);
INSERT INTO `category` VALUES (80, '危险化学品经营许可证', 14, 0, 0, 1, 0);
INSERT INTO `category` VALUES (81, '医疗器械经营许可证', 14, 0, 0, 1, 0);
INSERT INTO `category` VALUES (82, 'SP经营许可证', 16, 0, 0, 1, 0);
INSERT INTO `category` VALUES (83, 'ISP经营许可证', 16, 0, 0, 1, 0);
INSERT INTO `category` VALUES (84, 'IDC经营许可证', 16, 0, 0, 1, 0);
INSERT INTO `category` VALUES (85, 'ICP经营许可证', 16, 0, 0, 1, 0);
INSERT INTO `category` VALUES (86, 'EDI经营许可证', 16, 0, 0, 1, 0);
INSERT INTO `category` VALUES (87, '呼叫中心经营许可证', 16, 0, 0, 1, 0);
INSERT INTO `category` VALUES (88, '网络文化经营许可证', 16, 0, 0, 1, 0);
INSERT INTO `category` VALUES (89, '互联网药品信息服务资格证', 16, 0, 0, 1, 0);
INSERT INTO `category` VALUES (91, '商标注册', 18, 2, 0, 1, 0);
INSERT INTO `category` VALUES (92, '商标变更', 18, 5, 0, 1, 0);
INSERT INTO `category` VALUES (93, '商标注销', 18, 10, 0, 1, 0);
INSERT INTO `category` VALUES (94, '商标续展', 18, 3, 0, 1, 0);
INSERT INTO `category` VALUES (95, '商标异议', 18, 6, 0, 1, 0);
INSERT INTO `category` VALUES (96, '商标复审', 18, 8, 0, 1, 0);
INSERT INTO `category` VALUES (97, '商标答辩', 18, 7, 0, 1, 0);
INSERT INTO `category` VALUES (98, '商标撤三', 18, 9, 0, 1, 0);
INSERT INTO `category` VALUES (99, '商标无效公告', 18, 11, 0, 1, 0);
INSERT INTO `category` VALUES (142, '商标设计', 18, 1, 0, 1, 0);
INSERT INTO `category` VALUES (100, '一般著作权登记', 19, 1, 0, 1, 0);
INSERT INTO `category` VALUES (101, '一般著作权变更', 19, 2, 0, 1, 0);
INSERT INTO `category` VALUES (102, '一般著作权转让', 19, 4, 0, 1, 0);
INSERT INTO `category` VALUES (103, '一般著作权补证', 19, 3, 0, 1, 0);
INSERT INTO `category` VALUES (104, '视频著作权登记', 19, 5, 0, 1, 0);
INSERT INTO `category` VALUES (105, '视频著作权变更', 19, 6, 0, 1, 0);
INSERT INTO `category` VALUES (106, '视频著作权转让', 19, 8, 0, 1, 0);
INSERT INTO `category` VALUES (107, '视频著作权补证', 19, 7, 0, 1, 0);
INSERT INTO `category` VALUES (108, '软件著作权登记', 19, 9, 0, 1, 0);
INSERT INTO `category` VALUES (109, '软件著作权变更', 19, 10, 0, 1, 0);
INSERT INTO `category` VALUES (110, '软件著作权转让', 19, 12, 0, 1, 0);
INSERT INTO `category` VALUES (111, '软件著作权补证', 19, 11, 0, 1, 0);
INSERT INTO `category` VALUES (112, '发明专利申请', 20, 0, 0, 1, 0);
INSERT INTO `category` VALUES (113, '实用新型专利', 20, 0, 0, 1, 0);
INSERT INTO `category` VALUES (114, '外观设计专利', 20, 0, 0, 1, 0);
INSERT INTO `category` VALUES (115, '小微企业(10-100人)', 21, 0, 0, 1, 0);
INSERT INTO `category` VALUES (116, '中型企业(100-500人)', 21, 0, 0, 1, 0);
INSERT INTO `category` VALUES (117, '大型企业(500以上)', 21, 0, 0, 1, 0);
INSERT INTO `category` VALUES (118, '国内商品条形码', 23, 0, 0, 1, 0);
INSERT INTO `category` VALUES (119, '国际商品条形码', 23, 0, 0, 1, 0);
INSERT INTO `category` VALUES (120, '质量体系管理管理认证', 24, 0, 0, 1, 0);
INSERT INTO `category` VALUES (121, '环境管理体系认证', 24, 0, 0, 1, 0);
INSERT INTO `category` VALUES (122, '信息管理安全认证', 24, 0, 0, 1, 0);
INSERT INTO `category` VALUES (123, '食品安全管理体系认证', 24, 0, 0, 1, 0);
INSERT INTO `category` VALUES (124, '职业健康与安全管理体系认证', 24, 0, 0, 1, 0);
INSERT INTO `category` VALUES (125, '高新企业认定标准套餐', 25, 0, 0, 1, 0);
INSERT INTO `category` VALUES (126, '高新企业认定高级套餐', 25, 0, 0, 1, 0);
INSERT INTO `category` VALUES (127, '电话咨询', 27, 0, 0, 1, 0);
INSERT INTO `category` VALUES (128, '咨询套餐', 27, 0, 0, 1, 0);
INSERT INTO `category` VALUES (129, '公司章程', 28, 0, 0, 1, 0);
INSERT INTO `category` VALUES (130, '规章制度', 28, 0, 0, 1, 0);
INSERT INTO `category` VALUES (131, '购销类合同', 28, 0, 0, 1, 0);
INSERT INTO `category` VALUES (132, '合作类合同', 28, 0, 0, 1, 0);
INSERT INTO `category` VALUES (133, '投资类合同', 28, 0, 0, 1, 0);
INSERT INTO `category` VALUES (134, '股权类合同', 28, 0, 0, 1, 0);
INSERT INTO `category` VALUES (135, '劳动力合同', 28, 0, 0, 1, 0);
INSERT INTO `category` VALUES (136, '法律顾问标准版', 29, 0, 0, 1, 0);
INSERT INTO `category` VALUES (137, '法律顾问高级版', 29, 0, 0, 1, 0);
INSERT INTO `category` VALUES (138, '商业计划书', 31, 0, 0, 1, 0);
INSERT INTO `category` VALUES (139, '融资方案设计', 31, 0, 0, 1, 0);
INSERT INTO `category` VALUES (140, '股权架构设计', 31, 0, 0, 1, 0);
INSERT INTO `category` VALUES (141, '员工股权激励方案设计', 31, 0, 0, 1, 0);
INSERT INTO `category` VALUES (144, '套餐', 0, 0, 0, 0, 0);
INSERT INTO `category` VALUES (145, '优惠套餐', 144, 0, 0, 0, 0);
INSERT INTO `category` VALUES (146, '公司注册+记账服务', 145, 0, 0, 0, 0);
INSERT INTO `category` VALUES (147, '商标设计+商标注册', 145, 0, 0, 0, 0);
INSERT INTO `category` VALUES (148, '法律咨询套餐', 145, 0, 0, 0, 0);
INSERT INTO `category` VALUES (149, '餐饮公司注册', 145, 0, 0, 0, 0);
INSERT INTO `category` VALUES (150, '物流公司注册', 145, 0, 0, 0, 0);
INSERT INTO `category` VALUES (151, '一般公司注册', 145, 0, 0, 0, 0);
INSERT INTO `category` VALUES (155, '社保开户', 4, 0, 1, 1, 0);
INSERT INTO `category` VALUES (156, '公积金开户', 4, 0, 1, 1, 0);
INSERT INTO `category` VALUES (157, '银行开户', 4, 0, 0, 0, 1);
INSERT INTO `category` VALUES (154, '法人一证通办理', 4, 0, 0, 1, 0);

-- ----------------------------
-- Table structure for category_brand
-- ----------------------------
DROP TABLE IF EXISTS `category_brand`;
CREATE TABLE `category_brand`  (
  `cat_id` mediumint(9) NOT NULL,
  `brand_id` mediumint(9) NOT NULL,
  `sort` tinyint(4) NULL DEFAULT NULL,
  INDEX `cat_id`(`cat_id`) USING BTREE,
  INDEX `brand_id`(`brand_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '分类与品牌关联表' ROW_FORMAT = FIXED;

-- ----------------------------
-- Records of category_brand
-- ----------------------------

-- ----------------------------
-- Table structure for constant
-- ----------------------------
DROP TABLE IF EXISTS `constant`;
CREATE TABLE `constant`  (
  `cat_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键',
  `cat_code` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '常量简写名',
  `cat_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '分类名称',
  `cat_pid` mediumint(8) UNSIGNED NOT NULL COMMENT '上级id',
  `cat_desc` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '分类描述',
  `sort` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '常量排序值',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '常量状态: 1 开启,0 关闭',
  PRIMARY KEY (`cat_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 19256 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '产品分类表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of constant
-- ----------------------------

-- ----------------------------
-- Table structure for enter_category
-- ----------------------------
DROP TABLE IF EXISTS `enter_category`;
CREATE TABLE `enter_category`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '类目名称',
  `parent_id` int(11) NOT NULL COMMENT '上级类目ID',
  `level` tinyint(1) NOT NULL COMMENT '级别',
  `multiple` tinyint(1) NOT NULL COMMENT '是否可以多选 0为单选 1为多选',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '状态 1为开启',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 140 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '入驻类目' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of enter_category
-- ----------------------------
INSERT INTO `enter_category` VALUES (1, '工商财税', 0, 1, 1, 1);
INSERT INTO `enter_category` VALUES (2, '财税服务', 0, 1, 1, 1);
INSERT INTO `enter_category` VALUES (3, '资质办理', 0, 1, 1, 1);
INSERT INTO `enter_category` VALUES (4, '知识产权', 0, 1, 0, 1);
INSERT INTO `enter_category` VALUES (5, '认证服务', 0, 1, 0, 1);
INSERT INTO `enter_category` VALUES (6, '法律服务', 0, 1, 0, 1);
INSERT INTO `enter_category` VALUES (7, '金融服务', 0, 1, 0, 1);
INSERT INTO `enter_category` VALUES (8, '公司注册', 1, 2, 1, 1);
INSERT INTO `enter_category` VALUES (9, '公司变更', 1, 2, 1, 1);
INSERT INTO `enter_category` VALUES (10, '公司注销及其他', 1, 2, 1, 1);
INSERT INTO `enter_category` VALUES (11, '有限公司注册', 8, 3, 1, 1);
INSERT INTO `enter_category` VALUES (12, '服份有限公司注册', 8, 3, 1, 1);
INSERT INTO `enter_category` VALUES (13, '外商独资公司注册', 8, 3, 1, 1);
INSERT INTO `enter_category` VALUES (14, '合伙企业注册', 8, 3, 1, 1);
INSERT INTO `enter_category` VALUES (15, '分公司注册', 8, 3, 1, 1);
INSERT INTO `enter_category` VALUES (16, '办事处注册', 8, 3, 1, 1);
INSERT INTO `enter_category` VALUES (17, '个体工商注册', 8, 3, 1, 1);
INSERT INTO `enter_category` VALUES (18, '名称变更', 9, 3, 1, 1);
INSERT INTO `enter_category` VALUES (19, '地址变更', 9, 3, 1, 1);
INSERT INTO `enter_category` VALUES (20, '股权变更', 9, 3, 1, 1);
INSERT INTO `enter_category` VALUES (21, '法人变更', 9, 3, 1, 1);
INSERT INTO `enter_category` VALUES (22, '经营范围变更', 9, 3, 1, 1);
INSERT INTO `enter_category` VALUES (23, '董监高管理人员信息变更', 9, 3, 1, 1);
INSERT INTO `enter_category` VALUES (24, '简易注销', 10, 3, 1, 1);
INSERT INTO `enter_category` VALUES (25, '一般注销', 10, 3, 1, 1);
INSERT INTO `enter_category` VALUES (26, '年报公示', 10, 3, 1, 1);
INSERT INTO `enter_category` VALUES (27, '五证合一', 10, 3, 1, 1);
INSERT INTO `enter_category` VALUES (28, '工商解异常', 10, 3, 1, 1);
INSERT INTO `enter_category` VALUES (29, '开设银行基本户', 10, 3, 1, 1);
INSERT INTO `enter_category` VALUES (30, '社保开户', 10, 3, 1, 1);
INSERT INTO `enter_category` VALUES (31, '公积金开户', 10, 3, 1, 1);
INSERT INTO `enter_category` VALUES (32, '法人一证通', 10, 3, 1, 1);
INSERT INTO `enter_category` VALUES (33, '代理记账', 2, 2, 1, 1);
INSERT INTO `enter_category` VALUES (34, '税务代办', 2, 2, 1, 1);
INSERT INTO `enter_category` VALUES (35, '审计评估', 2, 2, 1, 1);
INSERT INTO `enter_category` VALUES (36, '小规模纳税人记账服务', 33, 3, 1, 1);
INSERT INTO `enter_category` VALUES (37, '一般纳税人记账服务', 33, 3, 1, 1);
INSERT INTO `enter_category` VALUES (38, '税控代办', 34, 3, 1, 1);
INSERT INTO `enter_category` VALUES (39, '发票代办', 34, 3, 1, 1);
INSERT INTO `enter_category` VALUES (40, '税务解锁', 34, 3, 1, 1);
INSERT INTO `enter_category` VALUES (41, '所得税清缴汇算', 34, 3, 1, 1);
INSERT INTO `enter_category` VALUES (42, '验资报告', 35, 3, 1, 1);
INSERT INTO `enter_category` VALUES (43, '专项审计', 35, 3, 1, 1);
INSERT INTO `enter_category` VALUES (44, '货物运输类', 3, 2, 1, 1);
INSERT INTO `enter_category` VALUES (45, '餐饮食品类', 3, 2, 1, 1);
INSERT INTO `enter_category` VALUES (46, '影视文化类', 3, 2, 1, 1);
INSERT INTO `enter_category` VALUES (47, '服务类', 3, 2, 1, 1);
INSERT INTO `enter_category` VALUES (48, '互联网类', 3, 2, 1, 1);
INSERT INTO `enter_category` VALUES (49, '道路运输经营许可证', 44, 3, 1, 1);
INSERT INTO `enter_category` VALUES (50, '无船承运业务经营资格许可证', 44, 3, 1, 1);
INSERT INTO `enter_category` VALUES (51, '食品经营许可证', 45, 3, 1, 1);
INSERT INTO `enter_category` VALUES (52, '食品生成许可证', 45, 3, 1, 1);
INSERT INTO `enter_category` VALUES (53, '酒类商品许可证', 45, 3, 1, 1);
INSERT INTO `enter_category` VALUES (54, '公共场所卫生许可证', 45, 3, 1, 1);
INSERT INTO `enter_category` VALUES (55, '广播电视节目经营许可证', 46, 3, 1, 1);
INSERT INTO `enter_category` VALUES (56, '营业性演出许可证', 46, 3, 1, 1);
INSERT INTO `enter_category` VALUES (57, '电影发行经营许可证', 46, 3, 1, 1);
INSERT INTO `enter_category` VALUES (58, '电影单片审查及发行许可证', 46, 3, 1, 1);
INSERT INTO `enter_category` VALUES (59, '电影立项拍摄(单片许可证)', 46, 3, 1, 1);
INSERT INTO `enter_category` VALUES (60, '电视剧剧本备案', 46, 3, 1, 1);
INSERT INTO `enter_category` VALUES (61, '电视剧立项拍摄(单片许可证)', 46, 3, 1, 1);
INSERT INTO `enter_category` VALUES (62, '广播电视视频点播业务经营许可证', 46, 3, 1, 1);
INSERT INTO `enter_category` VALUES (63, '人力资源服务许可证', 47, 3, 1, 1);
INSERT INTO `enter_category` VALUES (64, '劳务派遣经营许可证', 47, 3, 1, 1);
INSERT INTO `enter_category` VALUES (65, '进出口权许可证', 47, 3, 1, 1);
INSERT INTO `enter_category` VALUES (66, '危险化学品经营许可证', 47, 3, 1, 1);
INSERT INTO `enter_category` VALUES (67, '医疗器械经营许可证', 47, 3, 1, 1);
INSERT INTO `enter_category` VALUES (68, 'SP经营许可证', 48, 3, 1, 1);
INSERT INTO `enter_category` VALUES (69, 'ISP经营许可证', 48, 3, 1, 1);
INSERT INTO `enter_category` VALUES (70, 'IDC经营许可证', 48, 3, 1, 1);
INSERT INTO `enter_category` VALUES (71, 'ICP经营许可证', 48, 3, 1, 1);
INSERT INTO `enter_category` VALUES (72, 'EDI经营许可证', 48, 3, 1, 1);
INSERT INTO `enter_category` VALUES (73, '呼叫中心经营许可证', 48, 3, 1, 1);
INSERT INTO `enter_category` VALUES (74, '网络文化经营许可证', 48, 3, 1, 1);
INSERT INTO `enter_category` VALUES (75, '互联网药品信息服务资格证', 48, 3, 1, 1);
INSERT INTO `enter_category` VALUES (76, '商标', 4, 2, 0, 1);
INSERT INTO `enter_category` VALUES (77, '版权', 4, 2, 0, 1);
INSERT INTO `enter_category` VALUES (78, '专利', 4, 2, 0, 1);
INSERT INTO `enter_category` VALUES (79, '知识产权贯标', 4, 2, 0, 1);
INSERT INTO `enter_category` VALUES (80, '小微企业', 79, 3, 0, 1);
INSERT INTO `enter_category` VALUES (81, '中型企业', 79, 3, 0, 1);
INSERT INTO `enter_category` VALUES (82, '大型企业', 79, 3, 0, 1);
INSERT INTO `enter_category` VALUES (83, '发明专利申请', 78, 3, 0, 1);
INSERT INTO `enter_category` VALUES (84, '实用新型专利', 78, 3, 0, 1);
INSERT INTO `enter_category` VALUES (85, '外观设计专利', 78, 3, 0, 1);
INSERT INTO `enter_category` VALUES (86, '一般著作权登记', 77, 3, 0, 1);
INSERT INTO `enter_category` VALUES (87, '一般著作权变更', 77, 3, 0, 1);
INSERT INTO `enter_category` VALUES (88, '一般著作权转让', 77, 3, 0, 1);
INSERT INTO `enter_category` VALUES (89, '一般著作权补证', 77, 3, 0, 1);
INSERT INTO `enter_category` VALUES (90, '视频著作权登记', 77, 3, 0, 1);
INSERT INTO `enter_category` VALUES (91, '视频著作权变更', 77, 3, 0, 1);
INSERT INTO `enter_category` VALUES (92, '视频著作权转让', 77, 3, 0, 1);
INSERT INTO `enter_category` VALUES (93, '视频著作权补证', 77, 3, 0, 1);
INSERT INTO `enter_category` VALUES (94, '软件著作权登记', 77, 3, 0, 1);
INSERT INTO `enter_category` VALUES (95, '软件著作权变更', 77, 3, 0, 1);
INSERT INTO `enter_category` VALUES (96, '软件著作权转让', 77, 3, 0, 1);
INSERT INTO `enter_category` VALUES (97, '软件著作权补证', 77, 3, 0, 1);
INSERT INTO `enter_category` VALUES (98, '商标宽展', 76, 3, 0, 1);
INSERT INTO `enter_category` VALUES (99, '商标注册', 76, 3, 0, 1);
INSERT INTO `enter_category` VALUES (100, '商标变更', 76, 3, 0, 1);
INSERT INTO `enter_category` VALUES (101, '商标注销', 76, 3, 0, 1);
INSERT INTO `enter_category` VALUES (102, '商标续展', 76, 3, 0, 1);
INSERT INTO `enter_category` VALUES (103, '商标异议', 76, 3, 0, 1);
INSERT INTO `enter_category` VALUES (104, '商标复审', 76, 3, 0, 1);
INSERT INTO `enter_category` VALUES (105, '商标答辩', 76, 3, 0, 1);
INSERT INTO `enter_category` VALUES (106, '商标撤三', 76, 3, 0, 1);
INSERT INTO `enter_category` VALUES (107, '商标无效公告', 76, 3, 0, 1);
INSERT INTO `enter_category` VALUES (108, '商标设计', 76, 3, 0, 1);
INSERT INTO `enter_category` VALUES (109, '商品条形码', 5, 2, 0, 1);
INSERT INTO `enter_category` VALUES (110, '管理体系认证', 5, 2, 0, 1);
INSERT INTO `enter_category` VALUES (111, '高新企业认定', 5, 2, 0, 1);
INSERT INTO `enter_category` VALUES (112, '国内商品条形码', 109, 3, 0, 1);
INSERT INTO `enter_category` VALUES (113, '国际商品条形码', 109, 3, 0, 1);
INSERT INTO `enter_category` VALUES (114, '质量体系管理管理认证', 110, 3, 0, 1);
INSERT INTO `enter_category` VALUES (115, '环境管理体系认证', 110, 3, 0, 1);
INSERT INTO `enter_category` VALUES (116, '信息管理安全认证', 110, 3, 0, 1);
INSERT INTO `enter_category` VALUES (117, '食品安全管理体系认证', 110, 3, 0, 1);
INSERT INTO `enter_category` VALUES (118, '职业健康与安全管理体系认证', 110, 3, 0, 1);
INSERT INTO `enter_category` VALUES (119, '高新企业认定标准套餐', 111, 3, 0, 1);
INSERT INTO `enter_category` VALUES (120, '高新企业认定高级套餐', 111, 3, 0, 1);
INSERT INTO `enter_category` VALUES (121, '法律咨询', 6, 2, 0, 1);
INSERT INTO `enter_category` VALUES (122, '拟审合同', 6, 2, 0, 1);
INSERT INTO `enter_category` VALUES (123, '法律顾问', 6, 2, 0, 1);
INSERT INTO `enter_category` VALUES (124, '电话咨询', 121, 3, 0, 1);
INSERT INTO `enter_category` VALUES (125, '咨询套餐', 121, 3, 0, 1);
INSERT INTO `enter_category` VALUES (126, '公司章程', 122, 3, 0, 1);
INSERT INTO `enter_category` VALUES (127, '规章制度', 122, 3, 0, 1);
INSERT INTO `enter_category` VALUES (128, '购销类合同', 122, 3, 0, 1);
INSERT INTO `enter_category` VALUES (129, '合作类合同', 122, 3, 0, 1);
INSERT INTO `enter_category` VALUES (130, '投资类合同', 122, 3, 0, 1);
INSERT INTO `enter_category` VALUES (131, '股权类合同', 122, 3, 0, 1);
INSERT INTO `enter_category` VALUES (132, '劳动力合同', 122, 3, 0, 1);
INSERT INTO `enter_category` VALUES (133, '法律顾问标准版', 123, 3, 0, 1);
INSERT INTO `enter_category` VALUES (134, '法律顾问高级版', 123, 3, 0, 1);
INSERT INTO `enter_category` VALUES (135, '金融服务', 7, 2, 0, 1);
INSERT INTO `enter_category` VALUES (136, '商业计划书', 135, 3, 0, 1);
INSERT INTO `enter_category` VALUES (137, '融资方案设计', 135, 3, 0, 1);
INSERT INTO `enter_category` VALUES (138, '股权架构设计', 135, 3, 0, 1);
INSERT INTO `enter_category` VALUES (139, '员工股权激励方案设计', 135, 3, 0, 1);

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL DEFAULT 0 COMMENT '登录用户的身份id',
  `all_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '产品全名称',
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '产品简介',
  `category1` int(1) NOT NULL DEFAULT 0 COMMENT '产品一级类型',
  `category2` int(1) NOT NULL DEFAULT 0 COMMENT '产品二级类型',
  `category3` int(1) NOT NULL DEFAULT 0 COMMENT '产品三级类型',
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '产品描述移动端',
  `content_pc` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '产品介绍PC端',
  `brand_id` int(11) NOT NULL DEFAULT 0 COMMENT '品牌id',
  `brand_name` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '品牌名称',
  `outer_code` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '出厂编码',
  `oecode` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '产品oe码',
  `goods_quality` tinyint(1) NOT NULL DEFAULT 0 COMMENT '产品质量:1 原厂原装,2 品牌件,3 同质件,4 其他',
  `origin` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '商品产地',
  `factory_id` int(11) NOT NULL DEFAULT 0 COMMENT '生产厂商id',
  `bar_code` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '产品条形码',
  `packing_specifications` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '包装规格',
  `specifications_carmodel` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '规格车型',
  `net_weight` double NOT NULL DEFAULT 0 COMMENT '产品毛净重',
  `trace_code` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '产品追踪码',
  `warranty_period` varchar(27) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '质保期',
  `shopinner_category_id` int(2) NOT NULL DEFAULT 0 COMMENT '店铺内分类id',
  `shopinner_category_name` varchar(36) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '店铺内分类名称',
  `defined_code` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '自定义编码',
  `create_time` int(10) NOT NULL DEFAULT 0 COMMENT '创建时间',
  `update_time` int(10) NOT NULL DEFAULT 0 COMMENT '更新(修改)时间',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '商品状态: 1 开启',
  `modelcar` varchar(180) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '适配车型',
  `isinstall` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否支持到店安装：1，支持；2，不支持',
  `qa` tinyint(1) NOT NULL DEFAULT 0 COMMENT '质保：1，店铺三包；2，全国联保；3，其它',
  `cod` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否支持货到付款：1，支持；2，不支持',
  `is_hot` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否为热销商品：1，是热销商品；0，不是热销',
  `is_new` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否是新品：1，是新品；0，不是新品',
  `sortdesc` int(11) NOT NULL DEFAULT 0,
  `adminsortdesc` int(11) NOT NULL DEFAULT 0,
  `is_region` tinyint(1) NOT NULL DEFAULT 1 COMMENT '是否区分地区 1为是',
  `is_count` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否记数量 1为是',
  `progress_id` int(11) NOT NULL DEFAULT 1 COMMENT 'goods_progress表中的id',
  `is_del` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否删除 1为删除',
  `seo_keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'SEO关键词',
  `seo_description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'SEO简述',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 222 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '产品表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of goods
-- ----------------------------

-- ----------------------------
-- Table structure for goods_attribute
-- ----------------------------
DROP TABLE IF EXISTS `goods_attribute`;
CREATE TABLE `goods_attribute`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '产品属性id',
  `attrvalue` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '属性id(父id+\"_\"+自己id)',
  `attrname` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '属性名称',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '产品属性状态: 1 开启, 0 关闭 ',
  `prtid` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '产品主表id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '产品属性关联表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of goods_attribute
-- ----------------------------

-- ----------------------------
-- Table structure for goods_category
-- ----------------------------
DROP TABLE IF EXISTS `goods_category`;
CREATE TABLE `goods_category`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '分类名称',
  `code` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '编码',
  `pid` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '上级分类id',
  `sort` int(11) NOT NULL COMMENT '排序',
  `company_id` int(11) UNSIGNED NOT NULL COMMENT '公司id',
  `enable` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '是否有效 0无效，1有效，2删除',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 20 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '商品分类表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of goods_category
-- ----------------------------

-- ----------------------------
-- Table structure for goods_ex
-- ----------------------------
DROP TABLE IF EXISTS `goods_ex`;
CREATE TABLE `goods_ex`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) NULL DEFAULT NULL,
  `class_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '分类名称',
  `class_tag` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '关联商品编号（12,13,14,15）',
  `param` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '分类默认值',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 198 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '产品关联表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of goods_ex
-- ----------------------------

-- ----------------------------
-- Table structure for goods_factory
-- ----------------------------
DROP TABLE IF EXISTS `goods_factory`;
CREATE TABLE `goods_factory`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '厂商id',
  `factname` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '生产厂商名称',
  `factcode` varchar(18) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '厂商编码',
  `factaddress` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '厂商地址',
  `factphone` char(13) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '厂商联系电话',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 308 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '商品生产商(厂商)信息' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of goods_factory
-- ----------------------------

-- ----------------------------
-- Table structure for goods_gallery
-- ----------------------------
DROP TABLE IF EXISTS `goods_gallery`;
CREATE TABLE `goods_gallery`  (
  `img_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `goods_id` mediumint(8) UNSIGNED NOT NULL DEFAULT 0,
  `img_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `img_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `thumb_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `img_original` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`img_id`) USING BTREE,
  INDEX `goods_id`(`goods_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 164 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of goods_gallery
-- ----------------------------

-- ----------------------------
-- Table structure for goods_picture
-- ----------------------------
DROP TABLE IF EXISTS `goods_picture`;
CREATE TABLE `goods_picture`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `goods_id` mediumint(8) UNSIGNED NOT NULL DEFAULT 0,
  `picname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '图片状态: 1 显示,2 不显示',
  `userid` int(11) NOT NULL DEFAULT 0 COMMENT '所属店铺id',
  `type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '图片类型 1为PC 2 为移动',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `goods_id`(`goods_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 383 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '商品图片表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of goods_picture
-- ----------------------------

-- ----------------------------
-- Table structure for goods_progress
-- ----------------------------
DROP TABLE IF EXISTS `goods_progress`;
CREATE TABLE `goods_progress`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '进度标题',
  `createtime` int(11) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '描述',
  `disabled` tinyint(1) NOT NULL DEFAULT 1 COMMENT '状态 1为可用',
  `updatetime` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of goods_progress
-- ----------------------------

-- ----------------------------
-- Table structure for keywords
-- ----------------------------
DROP TABLE IF EXISTS `keywords`;
CREATE TABLE `keywords`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '热搜词id',
  `keyword` varchar(90) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '搜索关键字',
  `count` int(11) NOT NULL DEFAULT 1,
  `from` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '搜索来源',
  `addtime` int(11) NOT NULL DEFAULT 0 COMMENT '创建时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 414 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '热词搜索记录表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of keywords
-- ----------------------------

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) NOT NULL COMMENT '商品id',
  `price` decimal(8, 2) UNSIGNED NOT NULL DEFAULT 0.00 COMMENT '商品价格',
  `totalprice` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '商品总价格(含运费)',
  `region_id` int(11) NOT NULL DEFAULT 0 COMMENT '地区id',
  `userid` int(11) NOT NULL DEFAULT 0 COMMENT '所属店铺id',
  `ffee` decimal(8, 2) NOT NULL DEFAULT 0.00 COMMENT '产品运费',
  `goods_unit` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '计量单位id',
  `stock_number` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '库存量',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '状态: 1 正常,2 下线, 3 删除, 4 系统禁售',
  `attr_id` varchar(90) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '属性id拼接字串',
  `look_count` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '商品浏览量',
  `sales_num` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '商品销量',
  `collection_num` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '用户收藏量',
  `price_expression` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '价格表达式',
  `province` int(11) NULL DEFAULT NULL COMMENT '省',
  `city` int(11) NULL DEFAULT NULL COMMENT '市',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 688 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '货品库存表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of products
-- ----------------------------

-- ----------------------------
-- Table structure for progress
-- ----------------------------
DROP TABLE IF EXISTS `progress`;
CREATE TABLE `progress`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL COMMENT 'goods_progress表中的id',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '标题',
  `sort` tinyint(1) NOT NULL DEFAULT 1 COMMENT '排序',
  `createtime` int(11) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '描述',
  `updatetime` int(11) NULL DEFAULT NULL COMMENT '更新时间',
  `disabled` tinyint(1) NOT NULL DEFAULT 1 COMMENT '是否可用 1可用',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of progress
-- ----------------------------

-- ----------------------------
-- Table structure for seller_category
-- ----------------------------
DROP TABLE IF EXISTS `seller_category`;
CREATE TABLE `seller_category`  (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id',
  `userid` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '商户id',
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '分类名',
  `desc` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '分类描述',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 35 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '卖家分类表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of seller_category
-- ----------------------------

-- ----------------------------
-- Table structure for unit
-- ----------------------------
DROP TABLE IF EXISTS `unit`;
CREATE TABLE `unit`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '标准名',
  `company_id` int(11) UNSIGNED NOT NULL COMMENT '用户',
  `sort` int(11) NOT NULL DEFAULT 0 COMMENT '排序',
  `enable` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '状态，0无效，1有效，2删除',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 29 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '统计单位表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of unit
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
