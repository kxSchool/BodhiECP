/*
 Navicat Premium Data Transfer

 Source Server         : vmware-mysql5.7
 Source Server Type    : MySQL
 Source Server Version : 50744
 Source Host           : 192.168.31.125:3306
 Source Schema         : bodhi_goods

 Target Server Type    : MySQL
 Target Server Version : 50744
 File Encoding         : 65001

 Date: 12/04/2024 11:35:16
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

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
) ENGINE = MyISAM AUTO_INCREMENT = 159 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '产品分类表' ROW_FORMAT = DYNAMIC;

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
) ENGINE = MyISAM AUTO_INCREMENT = 140 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '入驻类目' ROW_FORMAT = DYNAMIC;

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
INSERT INTO `goods` VALUES (1, 0, '有限公司注册', '', 1, 2, 32, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/gszc.jpg\" alt=\"\"><p><br></p>', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_company_register.jpg\" alt=\"\"><p><br></p>', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 1533967978, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 6, 0, '1,2,1,5,4,1,asasa', 'dasdsad ');
INSERT INTO `goods` VALUES (2, 0, '股份有限公司注册', '', 1, 2, 33, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/gszc.jpg\" alt=\"\"><p><br></p>', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_company_register.jpg\" alt=\"\"><p><br></p>', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 6, 0, '', '');
INSERT INTO `goods` VALUES (3, 0, '外商独资公司注册', '', 1, 2, 34, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_company_register.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/gszc.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (4, 0, '合伙企业注册', '', 1, 2, 35, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_company_register.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/gszc.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (5, 0, '分公司注册', '', 1, 2, 36, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_company_register.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/gszc.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (6, 0, '办事处注册', '', 1, 2, 37, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_company_register.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/gszc.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (7, 0, '个体商户注册', '', 1, 2, 38, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_company_register.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/gszc.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (10, 0, '股权变更', '', 1, 3, 41, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_share_change_details.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/gqbg.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (11, 0, '法人变更', '', 1, 3, 42, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_zibenbiangeng.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/zbbg.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (12, 0, '经营范围变更', '', 1, 3, 43, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_company_change1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/jyfwbg.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (13, 0, '董监高管理人员信息变更', '', 1, 3, 44, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_zibenbiangeng.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/zbbg.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (14, 0, '简易注销', '', 1, 4, 45, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_companylogout1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/gszx.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (15, 0, '一般注销', '', 1, 4, 46, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_companylogout1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/gszx.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (16, 0, '年报公示', '', 1, 4, 47, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_nianbao.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/nbgs.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (17, 0, '五证合一', '', 1, 4, 48, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_wuzheng.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/wzhy.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (18, 0, '工商解异常', '', 1, 4, 49, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_yichang1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/gsjyc.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (19, 0, '开设银行基本户', '', 1, 4, 50, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_yichang1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/gsjyc.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (20, 0, '银行开户预约', '', 1, 4, 51, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_yichang1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/gsjyc.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (26, 0, '所得税清缴汇算', '', 5, 7, 57, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_shenji.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/sdsqj.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (31, 0, '道路运输经营许可证', '', 9, 10, 62, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_yunshu1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/dlys.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (32, 0, '无船承运业务经营资格登记证', '', 9, 10, 63, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_yunshu2.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/wccy.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (33, 0, '食品经营许可证(餐饮)', '', 9, 11, 64, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_shipin1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/spjy.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (34, 0, '食品生产经营许可证', '', 9, 11, 65, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_shipin2.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/spsc.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (35, 0, '酒类商品零售许可证', '', 9, 11, 66, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_jiulei1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/jlls.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (36, 0, '酒类商品批发许可证', '', 9, 11, 66, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_jiulei2.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/jlpf.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (37, 0, '公共场所卫生许可证', '', 9, 11, 68, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_weisheng1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/wsxkz.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (38, 0, '广播电视节目制作经营许可证', '', 9, 13, 69, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_dianshi1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/dsjmzz.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (39, 0, '营业性演出许可证', '', 9, 13, 70, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_yanchu1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/yyxyc.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (40, 0, '电影发行经营许可证', '', 9, 13, 71, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_dianying1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/dyfx.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (41, 0, '电影单片审查及发行许可证', '', 9, 13, 72, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_dianying1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/dyfx.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (42, 0, '电影立项拍摄(单片许可证)', '', 9, 13, 73, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_dianying1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/dyfx.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (43, 0, '电视剧剧本备案', '', 9, 13, 74, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_dianying1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/dyfx.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (44, 0, '电视剧立项拍摄(单片许可证)', '', 9, 13, 75, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_dianying1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/dyfx.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (45, 0, '广播电视视频点播业务经营许可证(乙种)', '', 9, 13, 76, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_dianshi2.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/dsspdb.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (46, 0, '人力资源服务许可证', '', 9, 14, 77, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_renli1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/rlzy.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (47, 0, '劳务派遣经营许可证', '', 9, 14, 78, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_paiqian1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/lwpq.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (49, 0, '进出口权许可证', '', 9, 14, 79, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_jinchukou.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/chk.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (50, 0, '危险化学品经营许可证', '', 9, 14, 80, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_weixian1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/wxhxp.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (51, 0, 'SP经营许可证', '', 9, 16, 82, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_sp.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/sp.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (52, 0, 'ISP经营许可证', '', 9, 16, 83, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_isp.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/isp.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (53, 0, 'IDC经营许可证', '', 9, 16, 84, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_idc.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/idc.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (54, 0, 'ICP经营许可证', '', 9, 16, 85, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_icp.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/icp.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (55, 0, 'EDI经营许可证', '', 9, 16, 86, '<p><img src=\"http://admin.bodhitest.com/uploads/goods_details/goods_153388010102.jpg\" style=\"max-width:100%;\"><br></p><p><br></p>', '<p><img src=\"http://admin.bodhitest.com/uploads/goods_details/goods_153387926221.png\" style=\"max-width:100%;\"><br></p><p><br></p>', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (56, 0, '呼叫中心经营许可证', '', 9, 16, 87, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_hujiao.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/hjzx.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (57, 0, '网络文化经营许可证', '', 9, 16, 88, '<p><img src=\"http://admin.bodhitest.com/uploads/goods_details/goods_153388715549.png\" style=\"max-width:100%;\"><br></p><p><br></p>', '<p><img src=\"http://admin.bodhitest.com/uploads/goods_details/goods_153388713775.png\" style=\"max-width:100%;\"><br></p>', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (58, 0, '互联网药品信息服务资格证', '', 9, 16, 89, '<p><img src=\"http://admin.bodhitest.com/uploads/goods_details/goods_153389563144.png\" style=\"max-width:100%;\"><br></p>', '<p><img src=\"http://admin.bodhitest.com/uploads/goods_details/goods_153389561486.png\" style=\"max-width:100%;\"><br></p>', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (61, 0, '商标变更', '', 17, 18, 92, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_shangbiao1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/sbbg.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (62, 0, '商标注销', '', 17, 18, 93, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_shangbiao2.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/sbzx.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (63, 0, '商标续展', '', 17, 18, 94, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_shangbiao3.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/sbxz.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (64, 0, '商标异议', '', 17, 18, 95, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_shangbiao4.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/sbyy.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (65, 0, '商标复审', '', 17, 18, 96, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_shangbiao5.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/sbfs.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (66, 0, '商标答辩', '', 17, 18, 97, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_shangbiao6.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/sbdb.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (68, 0, '商标无效公告', '', 17, 18, 99, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_shangbiao7.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/wxgg.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (70, 0, '一般著作权变更', '', 17, 19, 101, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_dengji1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/zzqdj.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (71, 0, '一般著作权转让', '', 17, 19, 102, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_dengji1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/zzqdj.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (72, 0, '一般著作权补证', '', 17, 19, 103, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_dengji1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/zzqdj.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (74, 0, '视频著作权变更', '', 17, 19, 105, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_dengji1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/zzqdj.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (75, 0, '视频著作权转让', '', 17, 19, 106, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_dengji1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/zzqdj.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (76, 0, '视频著作权补证', '', 17, 19, 107, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_dengji1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/zzqdj.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (78, 0, '软件著作权变更', '', 17, 19, 109, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_dengji2.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/rjzzq.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (79, 0, '软件著作权转让', '', 17, 19, 110, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_dengji2.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/rjzzq.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (80, 0, '软件著作权补证', '', 17, 19, 111, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_dengji2.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/rjzzq.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (84, 0, '小微企业(10-100人)', '', 17, 21, 115, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_chanquan1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/zscqgb.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (85, 0, '中型企业(100-500人)', '', 17, 21, 116, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_chanquan1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/zscqgb.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (86, 0, '大型企业(500人以上)', '', 17, 21, 117, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_chanquan1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/zscqgb.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (87, 0, '国内商品条形码', '', 22, 23, 118, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_tiaoxingma.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/txm.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (88, 0, '国外商品条形码', '', 22, 23, 119, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_tiaoxingma.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/txm.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (89, 0, 'ISO9001质量体系管理认证', '', 22, 24, 120, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_iso9001.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/iso9001.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (90, 0, 'ISO14001环境管理体系认证', '', 22, 24, 121, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_14001.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/14001.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (91, 0, 'ISO27001信息管理安全认证', '', 22, 24, 122, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_27001.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/27001.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (92, 0, 'ISO22000食品安全管理体系认证', '', 22, 24, 123, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_22000.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/22000.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (93, 0, 'OHSAS18001职业健康与安全管理体系认证', '', 22, 24, 124, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_18000.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/18000.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (94, 0, '高新企业认定标准套餐', '', 22, 25, 125, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_rending1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/gxqyrz.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (95, 0, '高新企业认定高级套餐', '', 22, 25, 126, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_rending1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/gxqyrz.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (96, 0, '电话咨询', '', 26, 27, 127, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_zixun1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/dhzx.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (97, 0, '咨询套餐', '', 26, 27, 128, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_zixun1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/dhzx.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (98, 0, '公司章程', '', 26, 28, 129, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_zhangcheng.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/gszc1.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (99, 0, '规章制度', '', 26, 28, 130, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_zhangcheng.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/gszc1.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (100, 0, '购销类合同', '', 26, 28, 131, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_hetong1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/gxlht.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (101, 0, '合作类合同', '', 26, 28, 132, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_hetong5.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/hzlht.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (102, 0, '投资类合同', '', 26, 28, 133, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_hetong2.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/tzlht.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (103, 0, '股权类合同', '', 26, 28, 134, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_hetong3.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/gqlht.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (104, 0, '劳动类合同', '', 26, 28, 135, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_hetong4.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/ldlht.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (105, 0, '法律顾问标准版', '', 26, 29, 136, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_guwen1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/flgw.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (106, 0, '法律顾问高级版', '', 26, 29, 137, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_guwen1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/flgw.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (107, 0, '商业计划书', '', 30, 31, 138, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_jihua.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/syjhs.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (108, 0, '融资方案设计', '', 30, 31, 139, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_rongzi.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/rzfa.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (109, 0, '股权架构设计', '', 30, 31, 140, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_guquan2.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/gqjgsj.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (110, 0, '员工股权激励方案设计', '', 30, 31, 141, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_guquan3.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/gqjlfa.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (111, 0, '字号变更', '', 1, 3, 39, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_mingchengbiangeng.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/gsmcbg.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 1533803789, 0, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (112, 0, '行业名称变更', '', 1, 3, 39, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_biangeng1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/gsmcbg.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (113, 0, '本区地址变更', '', 1, 3, 40, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_biangeng2.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/dzbg.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (114, 0, '跨区地址变更', '', 1, 3, 40, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_biangeng2.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/dzbg.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (115, 0, '跨市地址变更', '', 1, 3, 40, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_biangeng2.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/dzbg.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (116, 0, '零申报', '', 5, 6, 52, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_jizhang.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/dljz.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (117, 0, '开票量(20份以下)', '', 5, 6, 52, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_jizhang.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/dljz.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (118, 0, '开票量(50份以下)', '', 5, 6, 52, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_jizhang.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/dljz.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (119, 0, '零申报', '', 5, 6, 53, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_jizhang.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/dljz.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (120, 0, '开票量(20份以下)', '', 5, 6, 53, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_jizhang.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/dljz.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (121, 0, '开票量(50份以下)', '', 5, 6, 53, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_jizhang.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/dljz.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (122, 0, '税控设备购置及税种核定', '', 5, 7, 54, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_jiesuo.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/skdb.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (123, 0, '税控设备购置', '', 5, 7, 54, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_jiesuo.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/skdb.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (124, 0, '税种核定', '', 5, 7, 54, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_jiesuo.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/skdb.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (125, 0, '发票代购', '', 5, 7, 55, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_daiban.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/fpdb.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (126, 0, '发票增版/量', '', 5, 7, 55, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_daiban.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/fpdb.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (127, 0, '税控器解锁', '', 5, 7, 56, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_jiesuo.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/swjs.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (128, 0, '税控系统解锁', '', 5, 7, 56, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_jiesuo.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/swjs.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (129, 0, '50万以下', '', 5, 8, 58, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_yanzi.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/yzbg.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (130, 0, '50-100万', '', 5, 8, 58, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_yanzi.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/yzbg.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (131, 0, '100-300万', '', 5, 8, 58, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_yanzi.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/yzbg.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (132, 0, '300-600万', '', 5, 8, 58, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_yanzi.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/yzbg.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (133, 0, '600-1000万', '', 5, 8, 58, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_yanzi.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/yzbg.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (134, 0, '5000万以上(具体金额*0.01%)', '', 5, 8, 58, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_yanzi.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/yzbg.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (135, 0, '1000万以上(具体金额*0.01%)', '', 5, 8, 58, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_yanzi.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/yzbg.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (136, 0, '1亿元以上(具体金额*0.01%)', '', 5, 8, 58, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_yanzi.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/yzbg.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (137, 0, '500万以下', '', 5, 8, 59, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_yanzi.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/sdsqjsj.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (138, 0, '1000万以下', '', 5, 8, 59, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_yanzi.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/sdsqjsj.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (139, 0, '1000万以上(具体金额*0.3%)', '', 5, 8, 59, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_yanzi.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/sdsqjsj.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (140, 0, '5000万以上(具体金额*0.2%)', '', 5, 8, 59, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_yanzi.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/sdsqjsj.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (157, 0, '二类医疗器械经营许可证', '', 9, 14, 81, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_erlei.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/elylqx.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (158, 0, '三类医疗器械经营许可证', '', 9, 14, 81, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_sanlei.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/slylqx.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (159, 0, '新锐设计', '', 17, 18, 142, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_sheji.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/sbsj.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (160, 0, '资深设计', '', 17, 18, 142, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_sheji.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/sbsj.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (161, 0, '总监设计', '', 17, 18, 142, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_sheji.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/sbsj.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (162, 0, '普通注册', '', 17, 18, 91, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_zhuce.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/sbzc.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, '', '');
INSERT INTO `goods` VALUES (163, 0, '双享注册', '', 17, 18, 91, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_zhuce.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/sbzc.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, '', '');
INSERT INTO `goods` VALUES (164, 0, '担保注册', '', 17, 18, 91, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_zhuce.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/sbzc.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, '', '');
INSERT INTO `goods` VALUES (165, 0, '商标撤三', '', 17, 18, 98, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_chesan.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/sbcs.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (166, 0, '撤三复审', '', 17, 18, 98, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_chesan.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/sbcs.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (167, 0, '普通登记(30个工作日)', '', 17, 19, 100, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_dengji1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/zzqdj.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (168, 0, '加急登记(15个工作日)', '', 17, 19, 100, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_dengji1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/zzqdj.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (169, 0, '特急登记(5个工作日)', '', 17, 19, 100, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_dengji1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/zzqdj.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (170, 0, '视频著作权登记(1-5分钟)15个工作日完成', '', 17, 19, 104, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_dengji1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/zzqdj.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (171, 0, '普通登记(30个工作日)', '', 17, 19, 108, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_dengji2.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/rjzzq.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (172, 0, '视频著作权登记(5-10分钟)15个工作日完成', '', 17, 19, 104, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_dengji1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/zzqdj.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (173, 0, '加急登记(15个工作日)', '', 17, 19, 108, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_dengji2.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/rjzzq.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (174, 0, '视频著作权登记(10-25分钟)15个工作日完成', '', 17, 19, 104, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_dengji1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/zzqdj.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (175, 0, '特急登记(5个工作日)', '', 17, 19, 108, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_dengji2.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/rjzzq.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (176, 0, '基础班套餐', '', 17, 20, 112, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_zhuanli.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/fmzl.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (177, 0, '标准版套餐', '', 17, 20, 112, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_zhuanli.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/fmzl.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (178, 0, '高级版套餐', '', 17, 20, 112, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_zhuanli.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/fmzl.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (179, 0, '专家版套餐', '', 17, 20, 112, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_zhuanli.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/fmzl.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (180, 0, '普通申请', '', 17, 20, 113, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_zhuanli2.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/syxxzl.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (181, 0, '加急申请', '', 17, 20, 113, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_zhuanli2.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/syxxzl.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (182, 0, '担保申请', '', 17, 20, 113, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_zhuanli2.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/syxxzl.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (183, 0, '普通申请', '', 17, 20, 114, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_zhuanli1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/wgzl.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (184, 0, '担保申请', '', 17, 20, 114, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_zhuanli1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/wgzl.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (193, 0, '地址注册', '', 0, 0, 0, NULL, '', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 6, 0, '', '');
INSERT INTO `goods` VALUES (194, 0, '社保开户', '', 0, 0, 0, NULL, '', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (195, 0, '公积金开户', '', 0, 0, 0, NULL, '', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (196, 0, '社保公积金开户', '', 0, 0, 0, NULL, '', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (197, 0, '视频著作权登记(25-5分钟)15个工作日完成', ' ', 17, 19, 104, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_dengji1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/zzqdj.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (198, 0, '视频著作权登记(45分钟以上)15个工作日完成', '', 17, 19, 104, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_dengji1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/zzqdj.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (199, 0, '商标宽展', '', 17, 18, 143, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_shangbiao3.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/sbxz.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (200, 0, '公司注册+记账服务', '', 0, 0, 0, NULL, '', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (201, 0, '有限公司注册+一般纳税人代理记账', '', 144, 145, 146, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_yanzi.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/gszc.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (202, 0, '有限公司注册+小规模纳税人代理记账', '', 144, 145, 146, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_company_register.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/gszc.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (203, 0, '商标注册+新锐设计', '', 144, 145, 147, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_sheji.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/sbsj.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, '', '');
INSERT INTO `goods` VALUES (204, 0, '法律咨询套餐', '', 144, 145, 148, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_zixun1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/dhzx.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (205, 0, '公司注册+食品经营许可证', '', 144, 145, 149, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_company_register.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/gszc.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (206, 0, '公司注册+道路运输许可证', '', 144, 145, 150, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_company_register.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/gszc.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (207, 0, '公司注册+小规模纳税人代理记账', ' ', 144, 145, 151, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_company_register.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/gszc.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (208, 0, '公司注册+一般纳税人代理记账', ' ', 144, 145, 151, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_company_register.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/gszc.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (209, 0, '公司注册+食品经营许可证+小规模代理记账', '', 144, 145, 149, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_company_register.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/gszc.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (210, 0, '公司注册+食品经营许可证+一般代理记账', '', 144, 145, 149, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_company_register.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/gszc.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (211, 0, '公司注册+道路运输许可证+小规模纳税人代理记账', '', 144, 145, 150, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_company_register.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/gszc.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (212, 0, '公司注册+道路运输许可证+一般纳税人代理记账', '', 144, 145, 150, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_company_register.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/gszc.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (213, 0, '人员设备', '', 0, 0, 0, NULL, '', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (214, 0, '商标注册+资深设计', '', 144, 145, 147, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_sheji.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/sbsj.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, '', '');
INSERT INTO `goods` VALUES (215, 0, '商标注册+总监设计', '', 144, 145, 147, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_sheji.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/sbsj.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, '', '');
INSERT INTO `goods` VALUES (216, 0, '食品经营许可证(食品)', '', 9, 11, 64, '<img src=\"http://admin.bodhitest.com/uploads/goods_details/m_shipin1.jpg\" alt=\"\">', '<img src=\"http://admin.bodhitest.com/uploads/goods_details/spjy.jpg\" alt=\"\">', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (219, 0, '法人一证通办理', '', 1, 4, 154, '<p><img src=\"http://admin.bodhitest.com/uploads/goods_details/goods_153380289270.jpg\" style=\"max-width:100%;\"><br></p>', '<p><img src=\"http://admin.bodhitest.com/uploads/goods_details/goods_153380280397.jpg\" style=\"max-width: 100%;\"><br></p>', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (220, 0, '社保开户', '', 1, 4, 155, '<p><img src=\"http://admin.bodhitest.com/uploads/goods_details/goods_153380449873.jpg\" style=\"max-width:100%;\"><br></p><p><br></p>', '<p><img src=\"http://admin.bodhitest.com/uploads/goods_details/goods_153380448111.jpg\" style=\"max-width:100%;\"><br></p><p><br></p>', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');
INSERT INTO `goods` VALUES (221, 0, '公积金开户', '', 1, 4, 156, '<p><img src=\"http://admin.bodhitest.com/uploads/goods_details/goods_153380459280.jpg\" style=\"max-width:100%;\"><br></p><p><br></p>', '<p><img src=\"http://admin.bodhitest.com/uploads/goods_details/goods_153380460445.jpg\" style=\"max-width:100%;\"><br></p><p><br></p>', 0, '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', 0, 0, 1, '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, '', '');

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
INSERT INTO `goods_ex` VALUES (6, 2, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (7, 2, '选择银行开户', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我自己办理银行开户\",\"price\":\"0.00\"},{\"id\":\"20\",\"name\":\"请为我预约银行开户\"},{\"id\":\"19\",\"name\":\"请为我办理银行开户\"}]');
INSERT INTO `goods_ex` VALUES (8, 2, '选择税种核定', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我自己办理税种核定\",\"price\":\"0.00\"},{\"id\":\"122\",\"name\":\"请为我办理税种核定(包含官费530元)\"}]');
INSERT INTO `goods_ex` VALUES (9, 2, '选择会计服务', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我有自己的会计\",\"price\":\"0.00\"},{\"id\":\"116\",\"name\":\"一年代理记账服务(小规模)\"},{\"id\":\"119\",\"name\":\"一年代理记账服务(一般纳税人)\"}]');
INSERT INTO `goods_ex` VALUES (10, 2, '选择社保/公积金', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我自己办理\",\"price\":\"0.00\"},{\"id\":\"194\",\"name\":\"请为我办理社保开户\"},{\"id\":\"195\",\"name\":\"请为我办理公积金开户\"},{\"id\":\"196\",\"name\":\"请为我办理社保公积金开户\"}]');
INSERT INTO `goods_ex` VALUES (11, 3, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (12, 3, '选择银行开户', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我自己办理银行开户\",\"price\":\"0.00\"},{\"id\":\"20\",\"name\":\"请为我预约银行开户\"},{\"id\":\"19\",\"name\":\"请为我办理银行开户\"}]');
INSERT INTO `goods_ex` VALUES (13, 3, '选择税种核定', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我自己办理税种核定\",\"price\":\"0.00\"},{\"id\":\"122\",\"name\":\"请为我办理税种核定(包含官费530元)\"}]');
INSERT INTO `goods_ex` VALUES (14, 3, '选择会计服务', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我有自己的会计\",\"price\":\"0.00\"},{\"id\":\"116\",\"name\":\"一年代理记账服务(小规模)\"},{\"id\":\"119\",\"name\":\"一年代理记账服务(一般纳税人)\"}]');
INSERT INTO `goods_ex` VALUES (15, 3, '选择社保/公积金', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我自己办理\",\"price\":\"0.00\"},{\"id\":\"194\",\"name\":\"请为我办理社保开户\"},{\"id\":\"195\",\"name\":\"请为我办理公积金开户\"},{\"id\":\"196\",\"name\":\"请为我办理社保公积金开户\"}]');
INSERT INTO `goods_ex` VALUES (16, 4, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (17, 4, '选择银行开户', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我自己办理银行开户\",\"price\":\"0.00\"},{\"id\":\"20\",\"name\":\"请为我预约银行开户\"},{\"id\":\"19\",\"name\":\"请为我办理银行开户\"}]');
INSERT INTO `goods_ex` VALUES (18, 4, '选择税种核定', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我自己办理税种核定\",\"price\":\"0.00\"},{\"id\":\"122\",\"name\":\"请为我办理税种核定(包含官费530元)\"}]');
INSERT INTO `goods_ex` VALUES (19, 4, '选择会计服务', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我有自己的会计\",\"price\":\"0.00\"},{\"id\":\"116\",\"name\":\"一年代理记账服务(小规模)\"},{\"id\":\"119\",\"name\":\"一年代理记账服务(一般纳税人)\"}]');
INSERT INTO `goods_ex` VALUES (20, 4, '选择社保/公积金', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我自己办理\",\"price\":\"0.00\"},{\"id\":\"194\",\"name\":\"请为我办理社保开户\"},{\"id\":\"195\",\"name\":\"请为我办理公积金开户\"},{\"id\":\"196\",\"name\":\"请为我办理社保公积金开户\"}]');
INSERT INTO `goods_ex` VALUES (21, 5, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (22, 5, '选择银行开户', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我自己办理银行开户\",\"price\":\"0.00\"},{\"id\":\"20\",\"name\":\"请为我预约银行开户\"},{\"id\":\"19\",\"name\":\"请为我办理银行开户\"}]');
INSERT INTO `goods_ex` VALUES (23, 5, '选择税种核定', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我自己办理税种核定\",\"price\":\"0.00\"},{\"id\":\"122\",\"name\":\"请为我办理税种核定(包含官费530元)\"}]');
INSERT INTO `goods_ex` VALUES (24, 5, '选择会计服务', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我有自己的会计\",\"price\":\"0.00\"},{\"id\":\"116\",\"name\":\"一年代理记账服务(小规模)\"},{\"id\":\"119\",\"name\":\"一年代理记账服务(一般纳税人)\"}]');
INSERT INTO `goods_ex` VALUES (25, 5, '选择社保/公积金', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我自己办理\",\"price\":\"0.00\"},{\"id\":\"194\",\"name\":\"请为我办理社保开户\"},{\"id\":\"195\",\"name\":\"请为我办理公积金开户\"},{\"id\":\"196\",\"name\":\"请为我办理社保公积金开户\"}]');
INSERT INTO `goods_ex` VALUES (26, 6, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (27, 6, '选择银行开户', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我自己办理银行开户\",\"price\":\"0.00\"},{\"id\":\"20\",\"name\":\"请为我预约银行开户\"},{\"id\":\"19\",\"name\":\"请为我办理银行开户\"}]');
INSERT INTO `goods_ex` VALUES (28, 6, '选择税种核定', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我自己办理税种核定\",\"price\":\"0.00\"},{\"id\":\"122\",\"name\":\"请为我办理税种核定(包含官费530元)\"}]');
INSERT INTO `goods_ex` VALUES (29, 6, '选择会计服务', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我有自己的会计\",\"price\":\"0.00\"},{\"id\":\"116\",\"name\":\"一年代理记账服务(小规模)\"},{\"id\":\"119\",\"name\":\"一年代理记账服务(一般纳税人)\"}]');
INSERT INTO `goods_ex` VALUES (30, 6, '选择社保/公积金', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我自己办理\",\"price\":\"0.00\"},{\"id\":\"194\",\"name\":\"请为我办理社保开户\"},{\"id\":\"195\",\"name\":\"请为我办理公积金开户\"},{\"id\":\"196\",\"name\":\"请为我办理社保公积金开户\"}]');
INSERT INTO `goods_ex` VALUES (31, 7, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (32, 7, '选择银行开户', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我自己办理银行开户\",\"price\":\"0.00\"},{\"id\":\"20\",\"name\":\"请为我预约银行开户\"},{\"id\":\"19\",\"name\":\"请为我办理银行开户\"}]');
INSERT INTO `goods_ex` VALUES (33, 7, '选择税种核定', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我自己办理税种核定\",\"price\":\"0.00\"},{\"id\":\"122\",\"name\":\"请为我办理税种核定(包含官费530元)\"}]');
INSERT INTO `goods_ex` VALUES (34, 7, '选择会计服务', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我有自己的会计\",\"price\":\"0.00\"},{\"id\":\"116\",\"name\":\"一年代理记账服务(小规模)\"},{\"id\":\"119\",\"name\":\"一年代理记账服务(一般纳税人)\"}]');
INSERT INTO `goods_ex` VALUES (35, 7, '选择社保/公积金', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我自己办理\",\"price\":\"0.00\"},{\"id\":\"194\",\"name\":\"请为我办理社保开户\"},{\"id\":\"195\",\"name\":\"请为我办理公积金开户\"},{\"id\":\"196\",\"name\":\"请为我办理社保公积金开户\"}]');
INSERT INTO `goods_ex` VALUES (36, 159, '选择商标注册', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要注册商标\",\"price\":\"0.00\"},{\"id\":\"162\",\"name\":\"请为我注册商标\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (37, 159, '选择版权申请', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要申请版权\",\"price\":\"0.00\"},{\"id\":\"167\",\"name\":\"请为我申请版权\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (38, 31, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (39, 31, '选择人员资质', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的人员资质\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供人员资质\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (40, 31, '选择是否需要增资', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要增资\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供增资出具验资报告\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (41, 32, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (42, 32, '选择人员资质', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的人员资质\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供人员资质\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (43, 32, '选择是否需要增资', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要增资\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供增资出具验资报告\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (44, 33, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (45, 33, '选择人员资质', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的人员资质\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供人员资质\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (46, 33, '选择是否需要增资', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要增资\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供增资出具验资报告\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (47, 34, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (48, 34, '选择人员资质', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的人员资质\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供人员资质\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (49, 34, '选择是否需要增资', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要增资\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供增资出具验资报告\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (50, 35, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (51, 35, '选择人员资质', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的人员资质\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供人员资质\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (52, 35, '选择是否需要增资', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要增资\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供增资出具验资报告\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (53, 36, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (54, 36, '选择人员资质', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的人员资质\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供人员资质\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (55, 36, '选择是否需要增资', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要增资\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供增资出具验资报告\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (56, 37, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (57, 37, '选择人员资质', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的人员资质\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供人员资质\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (58, 37, '选择是否需要增资', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要增资\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供增资出具验资报告\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (59, 38, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (60, 38, '选择人员资质', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的人员资质\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供人员资质\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (61, 38, '选择是否需要增资', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要增资\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供增资出具验资报告\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (62, 39, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (63, 39, '选择人员资质', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的人员资质\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供人员资质\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (64, 39, '选择是否需要增资', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要增资\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供增资出具验资报告\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (65, 40, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (66, 40, '选择人员资质', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的人员资质\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供人员资质\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (67, 40, '选择是否需要增资', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要增资\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供增资出具验资报告\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (68, 41, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (69, 41, '选择人员资质', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的人员资质\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供人员资质\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (70, 41, '选择是否需要增资', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要增资\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供增资出具验资报告\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (71, 42, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (72, 42, '选择人员资质', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的人员资质\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供人员资质\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (73, 42, '选择是否需要增资', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要增资\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供增资出具验资报告\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (74, 43, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (75, 43, '选择人员资质', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的人员资质\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供人员资质\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (76, 43, '选择是否需要增资', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要增资\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供增资出具验资报告\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (77, 44, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (78, 44, '选择人员资质', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的人员资质\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供人员资质\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (79, 44, '选择是否需要增资', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要增资\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供增资出具验资报告\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (80, 45, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (81, 45, '选择人员资质', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的人员资质\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供人员资质\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (82, 45, '选择是否需要增资', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要增资\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供增资出具验资报告\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (83, 46, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (84, 46, '选择人员资质', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的人员资质\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供人员资质\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (85, 46, '选择是否需要增资', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要增资\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供增资出具验资报告\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (86, 47, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (87, 47, '选择人员资质', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的人员资质\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供人员资质\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (88, 47, '选择是否需要增资', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要增资\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供增资出具验资报告\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (89, 48, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (90, 48, '选择人员资质', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的人员资质\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供人员资质\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (91, 48, '选择是否需要增资', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要增资\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供增资出具验资报告\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (92, 49, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (93, 49, '选择人员资质', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的人员资质\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供人员资质\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (94, 49, '选择是否需要增资', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要增资\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供增资出具验资报告\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (95, 50, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (96, 50, '选择人员资质', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的人员资质\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供人员资质\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (97, 50, '选择是否需要增资', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要增资\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供增资出具验资报告\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (98, 51, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (99, 51, '选择人员资质', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的人员资质\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供人员资质\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (100, 51, '选择是否需要增资', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要增资\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供增资出具验资报告\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (101, 52, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (102, 52, '选择人员资质', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的人员资质\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供人员资质\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (103, 52, '选择是否需要增资', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要增资\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供增资出具验资报告\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (104, 53, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (105, 53, '选择人员资质', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的人员资质\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供人员资质\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (106, 53, '选择是否需要增资', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要增资\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供增资出具验资报告\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (107, 54, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (108, 54, '选择人员资质', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的人员资质\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供人员资质\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (109, 54, '选择是否需要增资', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要增资\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供增资出具验资报告\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (110, 55, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (111, 55, '选择人员资质', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的人员资质\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供人员资质\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (112, 55, '选择是否需要增资', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要增资\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供增资出具验资报告\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (113, 56, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (114, 56, '选择人员资质', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的人员资质\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供人员资质\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (115, 56, '选择是否需要增资', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要增资\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供增资出具验资报告\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (116, 57, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (117, 57, '选择人员资质', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的人员资质\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供人员资质\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (118, 57, '选择是否需要增资', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要增资\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供增资出具验资报告\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (119, 58, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (120, 58, '选择人员资质', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的人员资质\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供人员资质\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (121, 58, '选择是否需要增资', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要增资\",\"price\":\"0.00\"},{\"id\":\"0\",\"name\":\"请为我提供增资出具验资报告\",\"price\":\"0.00\"}]');
INSERT INTO `goods_ex` VALUES (122, 10, '名称变更', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要名称变更\",\"price\":\"0.00\"},{\"id\":\"111\",\"name\":\"字号变更\",\"price\":\"100.00\"},{\"id\":\"112\",\"name\":\"行业名称变更\",\"price\":\"100.00\"}]');
INSERT INTO `goods_ex` VALUES (123, 10, '地址变更', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要地址变更\",\"price\":\"0.00\"},{\"id\":\"113\",\"name\":\"本区地址变更\",\"price\":\"100.00\"},{\"id\":\"114\",\"name\":\"跨区地址变更\",\"price\":\"100.00\"},{\"id\":\"115\",\"name\":\"跨市地址变更\",\"price\":\"100.00\"}]');
INSERT INTO `goods_ex` VALUES (124, 10, '法人及股东变更', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要变更\",\"price\":\"0.00\"},{\"id\":\"10\",\"name\":\"法人变更\",\"price\":\"100.00\"},{\"id\":\"11\",\"name\":\"股东变更\",\"price\":\"100.00\"}]');
INSERT INTO `goods_ex` VALUES (125, 10, '董监高管理人员信息变更', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要变更\",\"price\":\"0.00\"},{\"id\":\"13\",\"name\":\"董监高管理人员信息变更\",\"price\":\"100.00\"}]');
INSERT INTO `goods_ex` VALUES (126, 11, '名称变更', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要名称变更\",\"price\":\"0.00\"},{\"id\":\"111\",\"name\":\"字号变更\",\"price\":\"100.00\"},{\"id\":\"112\",\"name\":\"行业名称变更\",\"price\":\"100.00\"}]');
INSERT INTO `goods_ex` VALUES (127, 11, '地址变更', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要地址变更\",\"price\":\"0.00\"},{\"id\":\"113\",\"name\":\"本区地址变更\",\"price\":\"100.00\"},{\"id\":\"114\",\"name\":\"跨区地址变更\",\"price\":\"100.00\"},{\"id\":\"115\",\"name\":\"跨市地址变更\",\"price\":\"100.00\"}]');
INSERT INTO `goods_ex` VALUES (128, 11, '法人及股东变更', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要变更\",\"price\":\"0.00\"},{\"id\":\"10\",\"name\":\"法人变更\",\"price\":\"100.00\"},{\"id\":\"11\",\"name\":\"股东变更\",\"price\":\"100.00\"}]');
INSERT INTO `goods_ex` VALUES (129, 11, '董监高管理人员信息变更', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要变更\",\"price\":\"0.00\"},{\"id\":\"13\",\"name\":\"董监高管理人员信息变更\",\"price\":\"100.00\"}]');
INSERT INTO `goods_ex` VALUES (131, 12, '名称变更', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要名称变更\",\"price\":\"0.00\"},{\"id\":\"111\",\"name\":\"字号变更\",\"price\":\"100.00\"},{\"id\":\"112\",\"name\":\"行业名称变更\",\"price\":\"100.00\"}]');
INSERT INTO `goods_ex` VALUES (132, 12, '地址变更', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要地址变更\",\"price\":\"0.00\"},{\"id\":\"113\",\"name\":\"本区地址变更\",\"price\":\"100.00\"},{\"id\":\"114\",\"name\":\"跨区地址变更\",\"price\":\"100.00\"},{\"id\":\"115\",\"name\":\"跨市地址变更\",\"price\":\"100.00\"}]');
INSERT INTO `goods_ex` VALUES (133, 12, '法人及股东变更', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要变更\",\"price\":\"0.00\"},{\"id\":\"10\",\"name\":\"法人变更\",\"price\":\"100.00\"},{\"id\":\"11\",\"name\":\"股东变更\",\"price\":\"100.00\"}]');
INSERT INTO `goods_ex` VALUES (134, 12, '董监高管理人员信息变更', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要变更\",\"price\":\"0.00\"},{\"id\":\"13\",\"name\":\"董监高管理人员信息变更\",\"price\":\"100.00\"}]');
INSERT INTO `goods_ex` VALUES (135, 13, '名称变更', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要名称变更\",\"price\":\"0.00\"},{\"id\":\"111\",\"name\":\"字号变更\",\"price\":\"100.00\"},{\"id\":\"112\",\"name\":\"行业名称变更\",\"price\":\"100.00\"}]');
INSERT INTO `goods_ex` VALUES (136, 13, '地址变更', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要地址变更\",\"price\":\"0.00\"},{\"id\":\"113\",\"name\":\"本区地址变更\",\"price\":\"100.00\"},{\"id\":\"114\",\"name\":\"跨区地址变更\",\"price\":\"100.00\"},{\"id\":\"115\",\"name\":\"跨市地址变更\",\"price\":\"100.00\"}]');
INSERT INTO `goods_ex` VALUES (137, 13, '法人及股东变更', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要变更\",\"price\":\"0.00\"},{\"id\":\"10\",\"name\":\"法人变更\",\"price\":\"100.00\"},{\"id\":\"11\",\"name\":\"股东变更\",\"price\":\"100.00\"}]');
INSERT INTO `goods_ex` VALUES (138, 13, '董监高管理人员信息变更', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要变更\",\"price\":\"0.00\"},{\"id\":\"13\",\"name\":\"董监高管理人员信息变更\",\"price\":\"100.00\"}]');
INSERT INTO `goods_ex` VALUES (139, 111, '名称变更', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要名称变更\",\"price\":\"0.00\"},{\"id\":\"111\",\"name\":\"字号变更\",\"price\":\"100.00\"},{\"id\":\"112\",\"name\":\"行业名称变更\",\"price\":\"100.00\"}]');
INSERT INTO `goods_ex` VALUES (140, 111, '地址变更', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要地址变更\",\"price\":\"0.00\"},{\"id\":\"113\",\"name\":\"本区地址变更\",\"price\":\"100.00\"},{\"id\":\"114\",\"name\":\"跨区地址变更\",\"price\":\"100.00\"},{\"id\":\"115\",\"name\":\"跨市地址变更\",\"price\":\"100.00\"}]');
INSERT INTO `goods_ex` VALUES (141, 111, '法人及股东变更', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要变更\",\"price\":\"0.00\"},{\"id\":\"10\",\"name\":\"法人变更\",\"price\":\"100.00\"},{\"id\":\"11\",\"name\":\"股东变更\",\"price\":\"100.00\"}]');
INSERT INTO `goods_ex` VALUES (142, 111, '董监高管理人员信息变更', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要变更\",\"price\":\"0.00\"},{\"id\":\"13\",\"name\":\"董监高管理人员信息变更\",\"price\":\"100.00\"}]');
INSERT INTO `goods_ex` VALUES (143, 112, '名称变更', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要名称变更\",\"price\":\"0.00\"},{\"id\":\"111\",\"name\":\"字号变更\",\"price\":\"100.00\"},{\"id\":\"112\",\"name\":\"行业名称变更\",\"price\":\"100.00\"}]');
INSERT INTO `goods_ex` VALUES (144, 112, '地址变更', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要地址变更\",\"price\":\"0.00\"},{\"id\":\"113\",\"name\":\"本区地址变更\",\"price\":\"100.00\"},{\"id\":\"114\",\"name\":\"跨区地址变更\",\"price\":\"100.00\"},{\"id\":\"115\",\"name\":\"跨市地址变更\",\"price\":\"100.00\"}]');
INSERT INTO `goods_ex` VALUES (145, 112, '法人及股东变更', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要变更\",\"price\":\"0.00\"},{\"id\":\"10\",\"name\":\"法人变更\",\"price\":\"100.00\"},{\"id\":\"11\",\"name\":\"股东变更\",\"price\":\"100.00\"}]');
INSERT INTO `goods_ex` VALUES (146, 112, '董监高管理人员信息变更', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要变更\",\"price\":\"0.00\"},{\"id\":\"13\",\"name\":\"董监高管理人员信息变更\",\"price\":\"100.00\"}]');
INSERT INTO `goods_ex` VALUES (147, 107, '融资方案设计', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要\",\"price\":\"0.00\"},{\"id\":\"108\",\"name\":\"请为我提供融资方案设计\",\"price\":\"100.00\"}]');
INSERT INTO `goods_ex` VALUES (148, 107, '股权架构设计', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要\",\"price\":\"0.00\"},{\"id\":\"109\",\"name\":\"请为我提供股权架构设计\",\"price\":\"100.00\"}]');
INSERT INTO `goods_ex` VALUES (149, 107, '员工股权激励方案设计', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要\",\"price\":\"0.00\"},{\"id\":\"110\",\"name\":\"请为我提供员工股权激励方案设计\",\"price\":\"100.00\"}]');
INSERT INTO `goods_ex` VALUES (150, 108, '股权架构设计', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要\",\"price\":\"0.00\"},{\"id\":\"109\",\"name\":\"请为我提供股权架构设计\",\"price\":\"100.00\"}]');
INSERT INTO `goods_ex` VALUES (151, 108, '员工股权激励方案设计', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要\",\"price\":\"0.00\"},{\"id\":\"110\",\"name\":\"请为我提供员工股权激励方案设计\",\"price\":\"100.00\"}]');
INSERT INTO `goods_ex` VALUES (152, 109, '员工股权激励方案设计', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"不需要\",\"price\":\"0.00\"},{\"id\":\"110\",\"name\":\"请为我提供股员工股权激励方案设计\",\"price\":\"100.00\"}]');
INSERT INTO `goods_ex` VALUES (153, 207, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (154, 207, '预约银行开户', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我自己办理银行开户\",\"price\":\"0.00\"},{\"id\":\"20\",\"name\":\"请为我预约银行开户\"},{\"id\":\"19\",\"name\":\"请为我办理银行开户\"}]');
INSERT INTO `goods_ex` VALUES (157, 208, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (158, 208, '预约银行开户', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我自己办理银行开户\",\"price\":\"0.00\"},{\"id\":\"20\",\"name\":\"请为我预约银行开户\"},{\"id\":\"19\",\"name\":\"请为我办理银行开户\"}]');
INSERT INTO `goods_ex` VALUES (159, 208, '选择税种核定', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我自己办理税种核定\",\"price\":\"0.00\"},{\"id\":\"122\",\"name\":\"请为我办理税种核定(包含官费530元)\"}]');
INSERT INTO `goods_ex` VALUES (160, 208, '选择社保/公积金', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我自己办理\",\"price\":\"0.00\"},{\"id\":\"194\",\"name\":\"请为我办理社保开户\"},{\"id\":\"195\",\"name\":\"请为我办理公积金开户\"},{\"id\":\"196\",\"name\":\"请为我办理社保公积金开户\"}]');
INSERT INTO `goods_ex` VALUES (161, 205, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (162, 209, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (163, 210, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (164, 205, '预约银行开户', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我自己办理银行开户\",\"price\":\"0.00\"},{\"id\":\"20\",\"name\":\"请为我预约银行开户\"},{\"id\":\"19\",\"name\":\"请为我办理银行开户\"}]');
INSERT INTO `goods_ex` VALUES (165, 209, '预约银行开户', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我自己办理银行开户\",\"price\":\"0.00\"},{\"id\":\"20\",\"name\":\"请为我预约银行开户\"},{\"id\":\"19\",\"name\":\"请为我办理银行开户\"}]');
INSERT INTO `goods_ex` VALUES (166, 210, '预约银行开户', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我自己办理银行开户\",\"price\":\"0.00\"},{\"id\":\"20\",\"name\":\"请为我预约银行开户\"},{\"id\":\"19\",\"name\":\"请为我办理银行开户\"}]');
INSERT INTO `goods_ex` VALUES (167, 205, '选择税种核定', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我自己办理税种核定\",\"price\":\"0.00\"},{\"id\":\"122\",\"name\":\"请为我办理税种核定(包含官费530元)\"}]');
INSERT INTO `goods_ex` VALUES (168, 209, '选择社保/公积金', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我自己办理\",\"price\":\"0.00\"},{\"id\":\"194\",\"name\":\"请为我办理社保开户\"},{\"id\":\"195\",\"name\":\"请为我办理公积金开户\"},{\"id\":\"196\",\"name\":\"请为我办理社保公积金开户\"}]');
INSERT INTO `goods_ex` VALUES (169, 210, '选择社保/公积金', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我自己办理\",\"price\":\"0.00\"},{\"id\":\"194\",\"name\":\"请为我办理社保开户\"},{\"id\":\"195\",\"name\":\"请为我办理公积金开户\"},{\"id\":\"196\",\"name\":\"请为我办理社保公积金开户\"}]');
INSERT INTO `goods_ex` VALUES (170, 205, '选择社保/公积金', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我自己办理\",\"price\":\"0.00\"},{\"id\":\"194\",\"name\":\"请为我办理社保开户\"},{\"id\":\"195\",\"name\":\"请为我办理公积金开户\"},{\"id\":\"196\",\"name\":\"请为我办理社保公积金开户\"}]');
INSERT INTO `goods_ex` VALUES (171, 206, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (172, 211, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (173, 212, '选择注册地址', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"使用自己的地址\",\"price\":\"0.00\"},{\"id\":\"193\",\"name\":\"请为我提供地址注册\"}]');
INSERT INTO `goods_ex` VALUES (174, 206, '预约银行开户', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我自己办理银行开户\",\"price\":\"0.00\"},{\"id\":\"20\",\"name\":\"请为我预约银行开户\"},{\"id\":\"19\",\"name\":\"请为我办理银行开户\"}]');
INSERT INTO `goods_ex` VALUES (175, 211, '预约银行开户', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我自己办理银行开户\",\"price\":\"0.00\"},{\"id\":\"20\",\"name\":\"请为我预约银行开户\"},{\"id\":\"19\",\"name\":\"请为我办理银行开户\"}]');
INSERT INTO `goods_ex` VALUES (176, 212, '预约银行开户', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我自己办理银行开户\",\"price\":\"0.00\"},{\"id\":\"20\",\"name\":\"请为我预约银行开户\"},{\"id\":\"19\",\"name\":\"请为我办理银行开户\"}]');
INSERT INTO `goods_ex` VALUES (177, 206, '选择人员设备', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我自己有人员设备\",\"price\":\"0.00\"},{\"id\":\"213\",\"name\":\"请为我提供人员设备\"}]');
INSERT INTO `goods_ex` VALUES (178, 211, '选择人员设备', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我自己有人员设备\",\"price\":\"0.00\"},{\"id\":\"213\",\"name\":\"请为我提供人员设备\"}]');
INSERT INTO `goods_ex` VALUES (179, 212, '选择人员设备', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我自己有人员设备\",\"price\":\"0.00\"},{\"id\":\"213\",\"name\":\"请为我提供人员设备\"}]');
INSERT INTO `goods_ex` VALUES (180, 206, '选择税种核定', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我自己办理税种核定\",\"price\":\"0.00\"},{\"id\":\"122\",\"name\":\"请为我办理税种核定(包含官费530元)\"}]');
INSERT INTO `goods_ex` VALUES (181, 207, '选择税种核定', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我自己办理税种核定\",\"price\":\"0.00\"},{\"id\":\"122\",\"name\":\"请为我办理税种核定(包含官费530元)\"}]');
INSERT INTO `goods_ex` VALUES (182, 207, '选择社保/公积金', NULL, '[{\"id\":\"\",\"default\":\"1\",\"name\":\"我自己办理\",\"price\":\"0.00\"},{\"id\":\"194\",\"name\":\"请为我办理社保开户\"},{\"id\":\"195\",\"name\":\"请为我办理公积金开户\"},{\"id\":\"196\",\"name\":\"请为我办理社保公积金开户\"}]');
INSERT INTO `goods_ex` VALUES (193, 1, '选择注册地址', NULL, '[{\"name\":\"\\u4f7f\\u7528\\u81ea\\u5df1\\u7684\\u5730\\u5740\",\"id\":\"0\",\"default\":1},{\"name\":\"\\u8bf7\\u4e3a\\u6211\\u63d0\\u4f9b\\u5730\\u5740\\u6ce8\\u518c\",\"id\":\"193\"}]');
INSERT INTO `goods_ex` VALUES (194, 1, '选择银行开户', NULL, '[{\"name\":\"\\u6211\\u81ea\\u5df1\\u529e\\u7406\\u94f6\\u884c\\u5f00\\u6237\",\"id\":\"0\",\"default\":1},{\"name\":\"\\u8bf7\\u4e3a\\u6211\\u9884\\u7ea6\\u94f6\\u884c\\u5f00\\u6237\",\"id\":\"20\"},{\"name\":\"\\u8bf7\\u4e3a\\u6211\\u529e\\u7406\\u94f6\\u884c\\u5f00\\u6237\",\"id\":\"19\"}]');
INSERT INTO `goods_ex` VALUES (195, 1, '选择税种核定', NULL, '[{\"name\":\"\\u6211\\u81ea\\u5df1\\u529e\\u7406\\u7a0e\\u79cd\\u6838\\u5b9a\",\"id\":\"0\",\"default\":1},{\"name\":\"\\u8bf7\\u4e3a\\u6211\\u529e\\u7406\\u7a0e\\u79cd\\u6838\\u5b9a(\\u5305\\u542b\\u5b98\\u8d39530\\u5143)\",\"id\":\"122\"}]');
INSERT INTO `goods_ex` VALUES (196, 1, '选择会计服务', NULL, '[{\"name\":\"\\u6211\\u6709\\u81ea\\u5df1\\u7684\\u4f1a\\u8ba1\",\"id\":\"0\",\"default\":1},{\"name\":\"\\u4e00\\u5e74\\u4ee3\\u7406\\u8bb0\\u8d26\\u670d\\u52a1(\\u5c0f\\u89c4\\u6a21)\",\"id\":\"116\"},{\"name\":\"\\u4e00\\u5e74\\u4ee3\\u7406\\u8bb0\\u8d26\\u670d\\u52a1(\\u4e00\\u822c\\u7eb3\\u7a0e\\u4eba)\",\"id\":\"119\"}]');
INSERT INTO `goods_ex` VALUES (197, 1, '选择社保/公积金', NULL, '[{\"name\":\"\\u6211\\u81ea\\u5df1\\u529e\\u7406\",\"id\":\"0\",\"default\":1},{\"name\":\"\\u8bf7\\u4e3a\\u6211\\u529e\\u7406\\u793e\\u4fdd\\u5f00\\u6237\",\"id\":\"194\"},{\"name\":\"\\u8bf7\\u4e3a\\u6211\\u529e\\u7406\\u516c\\u79ef\\u91d1\\u5f00\\u6237\",\"id\":\"195\"},{\"name\":\"\\u8bf7\\u4e3a\\u6211\\u529e\\u7406\\u793e\\u4fdd\\u516c\\u79ef\\u91d1\\u5f00\\u6237\",\"id\":\"196\"}]');

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
INSERT INTO `goods_picture` VALUES (1, 1, 'company_register.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (2, 2, 'company_register.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (3, 3, 'company_register.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (4, 4, 'company_register.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (5, 5, 'company_register.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (6, 6, 'company_register.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (7, 7, 'company_register.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (8, 10, 'company_change.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (9, 11, 'company_change.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (10, 12, 'company_change.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (11, 13, 'company_change.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (12, 14, 'company_logout.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (13, 15, 'company_logout.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (14, 16, 'company_logout.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (15, 17, 'company_logout.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (16, 18, 'company_logout.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (17, 19, 'company_logout.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (18, 20, 'company_logout.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (19, 26, 'tax_commission.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (20, 31, 'freightage.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (21, 32, 'NVOCC.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (22, 33, 'food1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (23, 34, 'food2.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (24, 35, 'liquor1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (25, 36, 'liquor2.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (26, 37, 'public_places.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (27, 38, 'film_culture1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (28, 39, 'film_culture2.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (29, 40, 'film_culture3.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (30, 41, 'film_culture3.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (31, 42, 'film_culture3.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (32, 43, 'film_culture3.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (33, 44, 'film_culture3.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (34, 45, 'film_culture1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (35, 46, 'hr1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (36, 47, 'hr2.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (37, 49, 'trade.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (38, 50, 'chemicals.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (39, 51, 'internet1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (40, 52, 'internet2.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (41, 53, 'internet3.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (42, 54, 'internet4.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (43, 55, 'internet5.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (44, 56, 'internet6.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (45, 57, 'goods_153388029556.jpg', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (46, 58, 'internet8.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (47, 61, 'brand1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (48, 62, 'brand1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (49, 63, 'brand1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (50, 64, 'objection.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (51, 65, 'brand.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (52, 66, 'brand.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (53, 68, 'brand.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (54, 70, 'general_copyright1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (55, 71, 'general_copyright1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (56, 72, 'general_copyright1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (57, 74, 'general_copyright2.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (58, 75, 'general_copyright2.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (59, 76, 'general_copyright2.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (60, 78, 'software_copyright1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (61, 79, 'software_copyright1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (62, 80, 'software_copyright1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (63, 84, 'standards1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (64, 85, 'standards1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (65, 86, 'standards1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (66, 87, 'barcode1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (67, 88, 'barcode1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (68, 89, 'management_system1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (69, 90, 'management_system2.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (70, 91, 'management_system3.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (71, 92, 'management_system4.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (72, 93, 'management_system5.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (73, 94, 'companies_that.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (74, 95, 'companies_that.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (75, 96, 'telephone_counseling.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (76, 97, 'telephone_counseling.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (77, 98, 'articles.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (78, 99, 'articles.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (79, 100, 'contract.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (80, 101, 'contract.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (81, 102, 'contract.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (82, 103, 'contract.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (83, 104, 'contract.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (84, 105, 'legal_counsel.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (85, 106, 'legal_counsel.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (86, 107, 'businessplan.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (87, 108, 'financing.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (88, 109, 'stock1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (89, 110, 'stock2.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (90, 111, 'company_change.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (91, 112, 'company_change.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (92, 113, 'company_change.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (93, 114, 'company_change.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (94, 115, 'company_change.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (95, 116, 'agency_account.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (96, 117, 'agency_account.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (97, 118, 'agency_account.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (98, 119, 'agency_account.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (99, 120, 'agency_account.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (100, 121, 'agency_account.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (101, 122, 'tax_commission1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (102, 123, 'tax_commission1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (103, 124, 'tax_commission1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (104, 125, 'tax_commission2.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (105, 126, 'tax_commission2.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (106, 127, 'tax_commission3.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (107, 128, 'tax_commission3.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (108, 129, 'risk_assess1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (109, 130, 'risk_assess1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (110, 131, 'risk_assess1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (111, 132, 'risk_assess1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (112, 133, 'risk_assess1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (113, 134, 'risk_assess1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (114, 135, 'risk_assess1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (115, 136, 'risk_assess1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (116, 137, 'risk_assess2.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (117, 138, 'risk_assess2.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (118, 139, 'risk_assess2.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (119, 140, 'risk_assess2.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (120, 141, 'risk_assess2.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (121, 142, 'risk_assess2.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (122, 143, 'risk_assess2.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (123, 144, 'risk_assess2.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (124, 145, 'risk_assess2.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (125, 146, 'risk_assess2.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (126, 147, 'risk_assess2.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (127, 148, 'risk_assess2.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (128, 149, 'risk_assess2.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (129, 150, 'risk_assess2.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (130, 151, 'risk_assess2.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (131, 152, 'risk_assess2.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (132, 153, 'risk_assess2.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (133, 154, 'risk_assess2.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (134, 155, 'risk_assess2.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (135, 156, 'risk_assess2.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (136, 157, 'medical.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (137, 158, 'medical.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (138, 159, 'design.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (139, 160, 'design.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (140, 161, 'design.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (141, 162, 'brand1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (142, 163, 'brand1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (143, 164, 'brand1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (144, 165, 'brand1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (145, 166, 'brand1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (146, 167, 'general_copyright1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (147, 168, 'general_copyright1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (148, 169, 'general_copyright1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (149, 170, 'general_copyright2.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (150, 171, 'software_copyright1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (151, 172, 'general_copyright2.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (152, 173, 'software_copyright1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (153, 174, 'general_copyright2.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (154, 175, 'software_copyright1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (155, 176, 'application.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (156, 177, 'application.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (157, 178, 'application.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (158, 179, 'application.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (159, 180, 'utility_model_patent.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (160, 181, 'utility_model_patent.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (161, 182, 'utility_model_patent.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (162, 183, 'design_patent.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (163, 184, 'design_patent.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (164, 1, 'm_company_register.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (165, 2, 'm_company_register.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (166, 3, 'm_company_register.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (167, 4, 'm_company_register.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (168, 5, 'm_company_register.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (169, 6, 'm_company_register.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (170, 7, 'm_company_register.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (171, 10, 'm_company_change.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (172, 11, 'm_company_change.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (173, 12, 'm_company_change.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (174, 13, 'm_company_change.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (175, 14, 'm_logout_1.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (176, 15, 'm_logout_1.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (177, 16, 'm_logout_2.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (178, 17, 'm_logout_3.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (179, 18, 'm_logout_4.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (180, 19, 'm_logout_5.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (181, 20, 'm_logout_5.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (182, 26, 'm_tax_commission1.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (183, 31, 'm_freightage.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (184, 32, 'm_NVOCC.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (185, 33, 'm_food.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (186, 34, 'm_food.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (187, 35, 'm_liquor.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (188, 36, 'm_liquor.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (189, 37, 'm_public_places.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (190, 38, 'film_1.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (191, 39, 'film_2.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (192, 41, 'film_3.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (193, 42, 'film_3.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (194, 43, 'film_3.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (195, 44, 'film_3.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (196, 45, 'film_1.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (197, 46, 'm_hr.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (198, 47, 'm_hr.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (199, 49, 'm_trade.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (200, 50, 'm_chemicals.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (201, 51, 'm_internet1.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (202, 52, 'm_internet2.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (203, 53, 'm_internet3.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (204, 54, 'm_internet4.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (205, 55, 'm_internet5.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (206, 56, 'm_internet6.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (207, 57, 'goods_153388030780.jpg', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (208, 58, 'm_internet8.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (209, 61, 'm_brand1.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (210, 62, 'm_brand1.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (211, 63, 'm_brand1.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (212, 64, 'm_objection.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (213, 65, 'm_brand2.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (214, 66, 'm_brand2.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (215, 68, 'm_brand2.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (216, 70, 'm_general_copyright1.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (217, 71, 'm_general_copyright1.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (218, 72, 'm_general_copyright1.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (219, 73, 'm_general_copyright1.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (220, 74, 'm_general_copyright2.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (221, 75, 'm_general_copyright2.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (222, 76, 'm_general_copyright2.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (223, 78, 'm_software_copyright1.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (224, 79, 'm_software_copyright1.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (225, 80, 'm_software_copyright1.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (226, 84, 'm_standards.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (227, 85, 'm_standards.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (228, 86, 'm_standards.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (229, 87, 'm_barcode.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (230, 88, 'm_barcode.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (231, 89, 'm_management_system1.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (232, 90, 'm_management_system2.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (233, 91, 'm_management_system3.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (234, 92, 'm_management_system4.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (235, 93, 'm_management_system5.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (236, 94, 'm_companies_that.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (237, 95, 'm_companies_that.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (238, 96, 'm_counseling.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (239, 97, 'm_counseling.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (240, 98, 'm_articles.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (241, 99, 'm_articles.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (242, 100, 'm_contract.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (243, 101, 'm_contract.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (244, 102, 'm_contract.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (245, 103, 'm_contract.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (246, 104, 'm_contract.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (247, 105, 'm_legal_counsel.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (248, 106, 'm_legal_counsel.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (249, 107, 'm_businessplan.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (250, 108, 'm_financing.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (251, 109, 'm_stock.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (252, 110, 'm_stock.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (253, 111, 'm_company_change.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (254, 112, 'm_company_change.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (255, 113, 'm_company_change.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (256, 114, 'm_company_change.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (257, 115, 'm_company_change.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (258, 116, 'm_agency_account.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (259, 117, 'm_agency_account.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (260, 118, 'm_agency_account.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (261, 119, 'm_agency_account.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (262, 120, 'm_agency_account.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (263, 121, 'm_agency_account.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (264, 122, 'm_tax1.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (265, 123, 'm_tax1.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (266, 124, 'm_tax1.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (267, 125, 'm_tax2.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (268, 126, 'm_tax2.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (269, 127, 'm_tax3.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (270, 128, 'm_tax3.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (271, 129, 'm_assess1.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (272, 130, 'm_assess1.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (273, 131, 'm_assess1.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (274, 132, 'm_assess1.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (275, 133, 'm_assess1.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (276, 134, 'm_assess1.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (277, 135, 'm_assess1.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (278, 136, 'm_assess1.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (279, 137, 'm_assess2.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (280, 138, 'm_assess2.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (281, 139, 'm_assess2.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (282, 140, 'm_assess2.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (283, 141, 'm_assess2.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (284, 142, 'm_assess2.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (285, 143, 'm_assess2.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (286, 144, 'm_assess2.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (287, 145, 'm_assess2.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (288, 146, 'm_assess2.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (289, 147, 'm_assess2.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (290, 148, 'm_assess2.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (291, 149, 'm_assess2.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (292, 150, 'm_assess2.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (293, 151, 'm_assess2.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (294, 152, 'm_assess2.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (295, 153, 'm_assess2.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (296, 154, 'm_assess2.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (297, 155, 'm_assess2.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (298, 156, 'm_assess2.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (299, 157, 'm_medical.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (300, 158, 'm_medical.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (301, 159, 'm_design.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (302, 160, 'm_design.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (303, 161, 'm_design.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (304, 162, 'm_brand1.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (305, 163, 'm_brand1.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (306, 164, 'm_brand1.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (307, 165, 'm_brand1.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (308, 166, 'm_brand1.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (309, 167, 'm_general_copyright1.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (310, 168, 'm_general_copyright1.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (311, 169, 'm_general_copyright1.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (312, 170, 'm_general_copyright2.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (313, 171, 'm_software_copyright1.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (314, 173, 'm_software_copyright1.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (315, 175, 'm_software_copyright1.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (316, 172, 'm_general_copyright2.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (317, 174, 'm_general_copyright2.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (318, 175, 'm_application.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (319, 176, 'm_application.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (320, 177, 'm_application.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (321, 178, 'm_application.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (322, 179, 'm_application.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (323, 180, 'm_utility_model_patent.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (324, 181, 'm_utility_model_patent.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (325, 182, 'm_utility_model_patent.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (326, 183, 'm_design_patent.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (327, 184, 'm_design_patent.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (328, 199, 'brand1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (329, 199, 'm_brand1.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (330, 201, 'company_register.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (331, 202, 'company_register.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (332, 203, 'design.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (333, 204, 'telephone_counseling.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (335, 206, 'company_register.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (336, 201, 'm_company_register.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (337, 202, 'm_company_register.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (338, 203, 'm_design.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (339, 204, 'm_counseling.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (340, 205, 'm_company_register.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (341, 206, 'm_company_register.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (342, 40, 'film_3.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (343, 197, 'm_general_copyright2.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (344, 198, 'm_general_copyright2.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (345, 194, 'm_security.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (346, 195, 'm_security.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (347, 196, 'm_security.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (348, 197, 'general_copyright2.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (349, 198, 'general_copyright2.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (350, 194, 'security.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (351, 195, 'security.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (352, 196, 'security.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (353, 207, 'm_company_register.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (354, 208, 'm_company_register.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (355, 205, 'company_register.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (356, 209, 'company_register.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (357, 209, 'm_company_register.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (358, 207, 'company_register.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (359, 208, 'company_register.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (360, 210, 'company_register.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (361, 210, 'm_company_register.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (362, 211, 'company_register.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (363, 211, 'm_company_register.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (364, 212, 'company_register.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (365, 212, 'm_company_register.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (366, 214, 'design.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (367, 215, 'design.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (368, 214, 'm_design.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (369, 215, 'm_design.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (370, 216, 'food1.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (371, 216, 'm_216.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (374, 193, 'dzzc.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (377, 219, 'goods_153380274353.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (378, 219, 'goods_153380273169.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (379, 220, 'goods_153380444234.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (380, 220, 'goods_153380446299.png', 1, 0, 1);
INSERT INTO `goods_picture` VALUES (381, 221, 'goods_153380463792.png', 1, 0, 2);
INSERT INTO `goods_picture` VALUES (382, 221, 'goods_153380462008.png', 1, 0, 1);

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
INSERT INTO `goods_progress` VALUES (1, '一般进度流程', 1532317258, '一般进度流程', 1, 1533954479);
INSERT INTO `goods_progress` VALUES (6, '一般流程2', 1533624261, '一般流程2', 1, NULL);

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
INSERT INTO `products` VALUES (2, 2, 0.00, 3800.00, 1215, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (3, 3, 0.00, 6800.00, 1215, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (4, 4, 0.00, 1280.00, 1215, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (5, 5, 0.00, 1680.00, 1215, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (6, 6, 0.00, 0.01, 1215, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (7, 7, 0.00, 1280.00, 1215, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (8, 10, 100.00, 1280.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (9, 11, 100.00, 1280.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (10, 12, 100.00, 1280.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (11, 13, 100.00, 1280.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (12, 14, 100.00, 3800.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (13, 15, 100.00, 6800.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (14, 16, 100.00, 980.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (15, 17, 100.00, 1860.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (16, 18, 100.00, 980.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (17, 19, 100.00, 500.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (18, 20, 100.00, 0.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (19, 26, 100.00, 1580.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (20, 31, 100.00, 4600.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (21, 32, 100.00, 15800.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (22, 33, 100.00, 5800.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (23, 34, 100.00, 3800.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (24, 35, 100.00, 5800.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (25, 36, 100.00, 5800.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (26, 37, 100.00, 6800.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (27, 38, 100.00, 28900.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (28, 39, 100.00, 25800.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (29, 40, 100.00, 26000.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (30, 41, 100.00, 8800.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (31, 42, 100.00, 8800.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (32, 43, 100.00, 6800.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (33, 44, 100.00, 8800.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (34, 45, 100.00, 58000.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (35, 46, 100.00, 8800.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (36, 47, 100.00, 6800.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (37, 49, 100.00, 3600.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (38, 50, 100.00, 5600.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (39, 51, 100.00, 38000.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (40, 52, 100.00, 38000.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (41, 53, 100.00, 38000.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (42, 54, 100.00, 38000.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (43, 55, 100.00, 38000.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (44, 56, 100.00, 38000.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (45, 57, 100.00, 38000.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (46, 58, 100.00, 38000.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (47, 61, 100.00, 1000.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (48, 62, 100.00, 500.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (49, 63, 100.00, 2500.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (50, 64, 100.00, 3500.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (51, 65, 100.00, 3500.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (52, 66, 100.00, 3500.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (53, 68, 100.00, 3500.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (54, 70, 100.00, 780.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (55, 71, 100.00, 980.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (56, 72, 100.00, 680.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (57, 74, 100.00, 1500.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (58, 75, 100.00, 1500.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (59, 76, 100.00, 1500.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (60, 78, 100.00, 1500.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (61, 79, 100.00, 1500.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (62, 80, 100.00, 1500.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (63, 84, 100.00, 38000.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (64, 85, 100.00, 48000.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (65, 86, 100.00, 58000.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (66, 87, 100.00, 3600.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (67, 88, 100.00, 5400.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (68, 89, 100.00, 9800.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (69, 90, 100.00, 11800.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (70, 91, 100.00, 11800.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (71, 93, 100.00, 11800.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (72, 94, 100.00, 32800.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (73, 95, 100.00, 38000.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (74, 96, 100.00, 288.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (75, 97, 100.00, 2580.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (76, 98, 100.00, 980.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (77, 99, 100.00, 980.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (78, 100, 100.00, 680.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (79, 101, 100.00, 680.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (80, 102, 100.00, 680.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (81, 103, 100.00, 680.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (82, 104, 100.00, 680.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (83, 105, 100.00, 22800.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (84, 106, 100.00, 29800.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (85, 107, 100.00, 12800.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (86, 108, 100.00, 38000.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (87, 109, 100.00, 38000.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (88, 110, 100.00, 98000.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (89, 111, 0.00, 1280.00, 1215, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (90, 112, 0.00, 1680.00, 1215, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (91, 113, 100.00, 1280.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (92, 114, 100.00, 3800.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (93, 115, 100.00, 7800.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (94, 116, 100.00, 3600.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (95, 117, 100.00, 4800.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (96, 118, 100.00, 6000.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (97, 119, 100.00, 6000.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (98, 120, 100.00, 7200.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (99, 121, 100.00, 8400.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (100, 122, 100.00, 1030.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (101, 123, 100.00, 480.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (102, 124, 100.00, 500.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (103, 125, 100.00, 500.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (104, 126, 100.00, 500.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (105, 127, 100.00, 890.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (106, 128, 100.00, 890.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (107, 129, 100.00, 1000.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (108, 130, 100.00, 1500.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (109, 131, 100.00, 2000.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (110, 132, 100.00, 2500.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (111, 133, 100.00, 3000.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (112, 134, 100.00, 0.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, '(price)*0.01%;', NULL, NULL);
INSERT INTO `products` VALUES (113, 135, 100.00, 0.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, '(price)*0.01%;', NULL, NULL);
INSERT INTO `products` VALUES (114, 136, 100.00, 0.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, '(price)*0.01%;', NULL, NULL);
INSERT INTO `products` VALUES (115, 137, 100.00, 20000.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (116, 138, 100.00, 25000.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (117, 139, 100.00, 0.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, '(price)*0.3%;', NULL, NULL);
INSERT INTO `products` VALUES (118, 140, 100.00, 0.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, '(price)*0.2%;', NULL, NULL);
INSERT INTO `products` VALUES (135, 157, 100.00, 6800.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (136, 158, 100.00, 6800.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (137, 159, 100.00, 2800.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (138, 160, 100.00, 5800.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (139, 161, 100.00, 8800.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (140, 162, 100.00, 980.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, '980*(num);', NULL, NULL);
INSERT INTO `products` VALUES (141, 163, 100.00, 1280.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, '1280*(num);', NULL, NULL);
INSERT INTO `products` VALUES (142, 164, 100.00, 1680.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, '1680*(num);', NULL, NULL);
INSERT INTO `products` VALUES (143, 165, 100.00, 3000.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (144, 166, 100.00, 3500.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (145, 167, 100.00, 1500.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (146, 168, 100.00, 3000.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (147, 169, 100.00, 3800.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (148, 170, 100.00, 3180.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (149, 171, 100.00, 1800.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (150, 172, 100.00, 3380.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (151, 173, 100.00, 3600.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (152, 174, 100.00, 3580.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (153, 175, 100.00, 4200.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (154, 176, 100.00, 5000.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (155, 177, 100.00, 6500.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (156, 178, 100.00, 8500.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (157, 179, 100.00, 11000.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (158, 180, 100.00, 2800.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (159, 181, 100.00, 3800.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (160, 182, 100.00, 4500.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (161, 183, 100.00, 1500.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (162, 184, 100.00, 1980.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (163, 92, 100.00, 11800.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (183, 2, 0.00, 3800.00, 1217, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (184, 2, 0.00, 3800.00, 1218, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (185, 2, 0.00, 3800.00, 1219, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (186, 2, 0.00, 3800.00, 1220, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (187, 2, 0.00, 3800.00, 1222, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (188, 2, 0.00, 3800.00, 1223, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (189, 2, 0.00, 3800.00, 1224, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (190, 2, 0.00, 3800.00, 1225, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (191, 2, 0.00, 3800.00, 1226, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (192, 2, 0.00, 3800.00, 1227, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (193, 2, 0.00, 3800.00, 1228, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (194, 2, 0.00, 3800.00, 1229, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (195, 2, 0.00, 3800.00, 1230, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (196, 2, 0.00, 3800.00, 1232, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (197, 2, 0.00, 3800.00, 1234, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (198, 3, 0.00, 6800.00, 1217, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (199, 3, 0.00, 6800.00, 1218, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (200, 3, 0.00, 6800.00, 1219, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (201, 3, 0.00, 6800.00, 1220, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (202, 3, 0.00, 6800.00, 1222, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (203, 3, 0.00, 6800.00, 1223, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (204, 3, 0.00, 6800.00, 1224, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (205, 3, 0.00, 6800.00, 1225, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (206, 3, 0.00, 6800.00, 1226, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (207, 3, 0.00, 6800.00, 1227, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (208, 3, 0.00, 6800.00, 1228, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (209, 3, 0.00, 6800.00, 1229, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (210, 3, 0.00, 6800.00, 1230, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (211, 3, 0.00, 6800.00, 1232, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (212, 3, 0.00, 6800.00, 1234, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (213, 4, 0.00, 1280.00, 1217, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (214, 4, 0.00, 1280.00, 1218, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (215, 4, 0.00, 1280.00, 1219, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (216, 4, 0.00, 1280.00, 1220, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (217, 4, 0.00, 1280.00, 1222, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (218, 4, 0.00, 1280.00, 1223, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (219, 4, 0.00, 1280.00, 1224, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (220, 4, 0.00, 1280.00, 1225, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (221, 4, 0.00, 1280.00, 1226, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (222, 4, 0.00, 1280.00, 1227, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (223, 4, 0.00, 1280.00, 1228, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (224, 4, 0.00, 1280.00, 1229, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (225, 4, 0.00, 1280.00, 1230, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (226, 4, 0.00, 1280.00, 1232, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (227, 4, 0.00, 1280.00, 1234, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (228, 5, 0.00, 1680.00, 1217, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (229, 5, 0.00, 1680.00, 1218, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (230, 5, 0.00, 1680.00, 1219, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (231, 5, 0.00, 1680.00, 1220, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (232, 5, 0.00, 1680.00, 1234, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (233, 5, 0.00, 1680.00, 1222, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (234, 5, 0.00, 1680.00, 1223, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (235, 5, 0.00, 1680.00, 1224, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (236, 5, 0.00, 1680.00, 1225, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (237, 5, 0.00, 1680.00, 1226, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (238, 5, 0.00, 1680.00, 1227, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (239, 5, 0.00, 1680.00, 1228, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (240, 5, 0.00, 1680.00, 1229, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (241, 5, 0.00, 1680.00, 1230, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (242, 5, 0.00, 1680.00, 1232, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (243, 6, 0.00, 1680.00, 1217, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (244, 6, 0.00, 1680.00, 1218, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (245, 6, 0.00, 1680.00, 1219, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (246, 6, 0.00, 1680.00, 1220, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (247, 6, 0.00, 1680.00, 1222, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (248, 6, 0.00, 1680.00, 1223, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (249, 6, 0.00, 1680.00, 1224, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (250, 6, 0.00, 1680.00, 1225, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (251, 6, 0.00, 1680.00, 1226, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (252, 6, 0.00, 1680.00, 1227, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (253, 6, 0.00, 1680.00, 1228, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (254, 6, 0.00, 1680.00, 1229, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (255, 6, 0.00, 1680.00, 1230, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (256, 6, 0.00, 1680.00, 1232, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (257, 6, 0.00, 1680.00, 1234, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (258, 7, 0.00, 1280.00, 1217, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (259, 7, 0.00, 1280.00, 1218, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (260, 7, 0.00, 1280.00, 1219, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (261, 7, 0.00, 1280.00, 1220, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (262, 7, 0.00, 1280.00, 1222, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (263, 7, 0.00, 1280.00, 1223, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (264, 7, 0.00, 1280.00, 1224, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (265, 7, 0.00, 1280.00, 1225, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (266, 7, 0.00, 1280.00, 1226, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (267, 7, 0.00, 1280.00, 1227, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (268, 7, 0.00, 1280.00, 1228, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (269, 7, 0.00, 1280.00, 1229, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (270, 7, 0.00, 1280.00, 1230, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (271, 7, 0.00, 1280.00, 1232, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (272, 7, 0.00, 1280.00, 1234, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (273, 111, 0.00, 1280.00, 1217, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (274, 111, 0.00, 1280.00, 1218, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (275, 111, 0.00, 1280.00, 1219, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (276, 111, 0.00, 1280.00, 1220, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (277, 111, 0.00, 1280.00, 1222, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (278, 111, 0.00, 1280.00, 1223, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (279, 111, 0.00, 1280.00, 1224, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (280, 111, 0.00, 1280.00, 1225, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (281, 111, 0.00, 1280.00, 1226, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (282, 111, 0.00, 1280.00, 1227, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (283, 111, 0.00, 1280.00, 1228, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (284, 111, 0.00, 1280.00, 1229, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (285, 111, 0.00, 1280.00, 1230, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (286, 111, 0.00, 1280.00, 1232, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (287, 111, 0.00, 1280.00, 1234, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (288, 112, 0.00, 1680.00, 1217, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (289, 112, 0.00, 1680.00, 1218, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (290, 112, 0.00, 1680.00, 1219, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (291, 112, 0.00, 1680.00, 1220, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (292, 112, 0.00, 1680.00, 1222, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (293, 112, 0.00, 1680.00, 1224, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (294, 112, 0.00, 1680.00, 1223, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (295, 112, 0.00, 1680.00, 1225, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (296, 112, 0.00, 1680.00, 1226, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (297, 112, 0.00, 1680.00, 1227, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (298, 112, 0.00, 1680.00, 1228, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (299, 112, 0.00, 1680.00, 1229, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (300, 112, 0.00, 1680.00, 1230, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (301, 112, 0.00, 1680.00, 1232, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (302, 112, 0.00, 1680.00, 1234, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (305, 193, 0.00, 4000.00, 1222, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (306, 193, 0.00, 4000.00, 1223, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (307, 193, 0.00, 4000.00, 1220, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (308, 193, 0.00, 6000.00, 1219, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (309, 193, 0.00, 4000.00, 1218, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (310, 193, 0.00, 0.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (311, 194, 0.00, 500.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (312, 195, 0.00, 500.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (313, 196, 0.00, 1000.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (314, 193, 0.00, 6000.00, 1235, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (316, 2, 0.00, 3800.00, 1235, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (317, 3, 0.00, 6800.00, 1235, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (318, 4, 0.00, 1280.00, 1235, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (319, 5, 0.00, 1680.00, 1235, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (320, 6, 0.00, 1680.00, 1235, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (321, 7, 0.00, 1280.00, 1235, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (430, 197, 0.00, 3880.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (431, 198, 0.00, 4500.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (432, 193, 0.00, 6000.00, 1215, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (433, 193, 6000.00, 6000.00, 1217, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (434, 199, 0.00, 3000.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (435, 201, 0.00, 6000.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (436, 202, 0.00, 3600.00, 1215, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (438, 204, 0.00, 2580.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (441, 207, 0.00, 3600.00, 1215, 0, 0.00, ' ', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (442, 208, 0.00, 6000.00, 1215, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (443, 205, 0.00, 4280.00, 1215, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (444, 209, 0.00, 7980.00, 1215, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (445, 210, 0.00, 9800.00, 1215, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (446, 206, 0.00, 4800.00, 1215, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (447, 211, 0.00, 7800.00, 1215, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (448, 212, 0.00, 9800.00, 1215, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (449, 213, 0.00, 500.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (450, 203, 0.00, 2800.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, '2800+980*(num-1);', NULL, NULL);
INSERT INTO `products` VALUES (451, 214, 0.00, 3800.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, '3800+980*(num-1);', NULL, NULL);
INSERT INTO `products` VALUES (452, 215, 0.00, 6800.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, '6000+980*(num-1);', NULL, NULL);
INSERT INTO `products` VALUES (453, 202, 0.00, 3600.00, 1217, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (454, 202, 0.00, 3600.00, 1218, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (455, 202, 0.00, 3600.00, 1219, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (456, 202, 0.00, 3600.00, 1220, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (457, 202, 0.00, 3600.00, 1222, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (458, 202, 0.00, 3600.00, 1223, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (459, 202, 0.00, 3600.00, 1224, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (460, 202, 0.00, 3600.00, 1225, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (461, 202, 0.00, 3600.00, 1226, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (462, 202, 0.00, 3600.00, 1227, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (463, 202, 0.00, 3600.00, 1228, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (464, 202, 0.00, 3600.00, 1229, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (465, 202, 0.00, 3600.00, 1230, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (466, 202, 0.00, 3600.00, 1232, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (467, 202, 0.00, 3600.00, 1235, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (468, 202, 0.00, 3600.00, 1234, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (469, 205, 0.00, 4280.00, 1217, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (470, 205, 0.00, 4280.00, 1218, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (471, 205, 0.00, 4280.00, 1219, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (472, 205, 0.00, 4280.00, 1220, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (473, 205, 0.00, 4280.00, 1222, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (474, 205, 0.00, 4280.00, 1223, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (475, 205, 0.00, 4280.00, 1224, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (476, 205, 0.00, 4280.00, 1225, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (477, 205, 0.00, 4280.00, 1226, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (478, 205, 0.00, 4280.00, 1227, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (479, 205, 0.00, 4280.00, 1228, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (480, 205, 0.00, 4280.00, 1229, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (481, 205, 0.00, 4280.00, 1230, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (482, 205, 0.00, 4280.00, 1232, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (483, 205, 0.00, 4280.00, 1234, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (484, 205, 0.00, 4280.00, 1235, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (485, 206, 0.00, 4800.00, 1217, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (486, 206, 0.00, 4800.00, 1218, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (487, 206, 0.00, 4800.00, 1219, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (488, 206, 0.00, 4800.00, 1220, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (489, 206, 0.00, 4800.00, 1222, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (490, 206, 0.00, 4800.00, 1223, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (491, 206, 0.00, 4800.00, 1224, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (492, 206, 0.00, 4800.00, 1225, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (493, 206, 0.00, 4800.00, 1226, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (494, 206, 0.00, 4800.00, 1227, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (495, 206, 0.00, 4800.00, 1228, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (496, 206, 0.00, 4800.00, 1229, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (497, 206, 0.00, 4800.00, 1230, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (498, 206, 0.00, 4800.00, 1232, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (499, 206, 0.00, 4800.00, 1234, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (501, 206, 0.00, 4800.00, 1235, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (502, 207, 0.00, 3600.00, 1217, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (503, 207, 0.00, 3600.00, 1218, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (504, 207, 0.00, 3600.00, 1219, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (505, 207, 0.00, 3600.00, 1220, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (506, 207, 0.00, 3600.00, 1220, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (507, 207, 0.00, 3600.00, 1221, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (508, 207, 0.00, 3600.00, 1222, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (509, 207, 0.00, 3600.00, 1223, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (510, 207, 0.00, 3600.00, 1224, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (511, 207, 0.00, 3600.00, 1225, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (512, 207, 0.00, 3600.00, 1226, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (513, 207, 0.00, 3600.00, 1227, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (514, 207, 0.00, 3600.00, 1228, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (515, 207, 0.00, 3600.00, 1229, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (516, 207, 0.00, 3600.00, 1230, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (517, 207, 0.00, 3600.00, 1232, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (518, 207, 0.00, 3600.00, 1234, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (519, 207, 0.00, 3600.00, 1235, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (520, 208, 0.00, 6000.00, 1217, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (521, 208, 0.00, 6000.00, 1218, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (522, 208, 0.00, 6000.00, 1219, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (523, 208, 0.00, 6000.00, 1220, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (524, 208, 0.00, 6000.00, 1221, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (525, 208, 0.00, 6000.00, 1222, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (526, 208, 0.00, 6000.00, 1223, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (527, 208, 0.00, 6000.00, 1224, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (528, 208, 0.00, 6000.00, 1225, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (529, 208, 0.00, 6000.00, 1226, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (530, 208, 0.00, 6000.00, 1227, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (531, 208, 0.00, 6000.00, 1228, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (532, 208, 0.00, 6000.00, 1229, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (533, 208, 0.00, 6000.00, 1230, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (534, 208, 0.00, 6000.00, 1232, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (535, 208, 0.00, 6000.00, 1234, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (536, 208, 0.00, 6000.00, 1235, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (537, 209, 0.00, 7980.00, 1217, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (538, 209, 0.00, 7980.00, 1218, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (539, 209, 0.00, 7980.00, 1219, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (540, 209, 0.00, 7980.00, 1220, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (541, 209, 0.00, 7980.00, 1221, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (542, 209, 0.00, 7980.00, 1222, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (543, 209, 0.00, 7980.00, 1223, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (544, 209, 0.00, 7980.00, 1224, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (545, 209, 0.00, 7980.00, 1225, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (546, 209, 0.00, 7980.00, 1226, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (547, 209, 0.00, 7980.00, 1227, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (548, 209, 0.00, 7980.00, 1228, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (549, 209, 0.00, 7980.00, 1229, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (550, 209, 0.00, 7980.00, 1230, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (551, 209, 0.00, 7980.00, 1232, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (552, 209, 0.00, 7980.00, 1234, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (553, 209, 0.00, 7980.00, 1235, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (554, 210, 0.00, 9800.00, 1217, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (555, 210, 0.00, 9800.00, 1218, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (556, 210, 0.00, 9800.00, 1219, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (557, 210, 0.00, 9800.00, 1220, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (558, 210, 0.00, 9800.00, 1221, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (559, 210, 0.00, 9800.00, 1222, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (560, 210, 0.00, 9800.00, 1223, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (561, 210, 0.00, 9800.00, 1224, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (562, 210, 0.00, 9800.00, 1225, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (563, 210, 0.00, 9800.00, 1226, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (564, 210, 0.00, 9800.00, 1227, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (565, 210, 0.00, 9800.00, 1228, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (566, 210, 0.00, 9800.00, 1229, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (567, 210, 0.00, 9800.00, 1230, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (568, 210, 0.00, 9800.00, 1232, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (569, 210, 0.00, 9800.00, 1234, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (570, 210, 0.00, 9800.00, 1235, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (571, 212, 0.00, 9800.00, 1217, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (572, 212, 0.00, 9800.00, 1218, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (573, 212, 0.00, 9800.00, 1219, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (574, 212, 0.00, 9800.00, 1220, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (575, 212, 0.00, 9800.00, 1221, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (576, 212, 0.00, 9800.00, 1222, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (577, 212, 0.00, 9800.00, 1223, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (578, 212, 0.00, 9800.00, 1224, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (579, 212, 0.00, 9800.00, 1225, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (580, 212, 0.00, 9800.00, 1226, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (581, 212, 0.00, 9800.00, 1227, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (582, 212, 0.00, 9800.00, 1228, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (583, 212, 0.00, 9800.00, 1229, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (584, 212, 0.00, 9800.00, 1230, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (585, 212, 0.00, 9800.00, 1232, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (586, 212, 0.00, 9800.00, 1234, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (587, 212, 0.00, 9800.00, 1235, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (588, 211, 0.00, 7800.00, 1217, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (589, 211, 0.00, 7800.00, 1218, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (590, 211, 0.00, 7800.00, 1219, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (591, 211, 0.00, 7800.00, 1220, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (592, 211, 0.00, 7800.00, 1221, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (593, 211, 0.00, 7800.00, 1222, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (594, 211, 0.00, 7800.00, 1223, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (595, 211, 0.00, 7800.00, 1224, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (596, 211, 0.00, 7800.00, 1225, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (597, 211, 0.00, 7800.00, 1226, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (598, 211, 0.00, 7800.00, 1227, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (599, 211, 0.00, 7800.00, 1228, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (600, 211, 0.00, 7800.00, 1229, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (601, 211, 0.00, 7800.00, 1230, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (602, 211, 0.00, 7800.00, 1232, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (603, 211, 0.00, 7800.00, 1234, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (604, 211, 0.00, 7800.00, 1235, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (605, 216, 0.00, 3800.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (606, 122, 0.00, 0.00, 0, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, NULL, NULL);
INSERT INTO `products` VALUES (667, 1, 0.00, 1680.00, 1215, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (668, 1, 0.00, 1680.00, 1217, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (669, 1, 0.00, 1680.00, 1218, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (670, 1, 0.00, 1680.00, 1219, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (671, 1, 0.00, 1680.00, 1220, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (672, 1, 0.00, 1680.00, 1222, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (673, 1, 0.00, 1680.00, 1223, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (674, 1, 0.00, 1280.00, 1224, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (675, 1, 0.00, 1280.00, 1225, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (676, 1, 0.00, 1280.00, 1226, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (677, 1, 0.00, 1280.00, 1227, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (678, 1, 0.00, 1280.00, 1228, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (679, 1, 0.00, 1280.00, 1229, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (680, 1, 0.00, 1280.00, 1230, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (681, 1, 0.00, 1280.00, 1232, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (682, 1, 0.00, 1280.00, 1234, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (683, 1, 0.00, 1280.00, 1235, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (685, 219, 0.00, 200.00, 1215, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (686, 220, 0.00, 500.00, 1215, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);
INSERT INTO `products` VALUES (687, 221, 0.00, 500.00, 1215, 0, 0.00, '', 0, 1, '', 0, 0, 0, NULL, 10, 109);

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
INSERT INTO `progress` VALUES (1, 1, '流程1', 1, 1532317258, '我去热翁无群而我却', NULL, 1);
INSERT INTO `progress` VALUES (2, 1, '流程2', 2, 1532317258, '为我去额我去额', NULL, 1);
INSERT INTO `progress` VALUES (3, 1, '流程3', 3, 1532317258, '我而我却二我去额', 1533620849, 1);
INSERT INTO `progress` VALUES (4, 1, '流程4', 4, 1532317258, '为请问去', NULL, 1);
INSERT INTO `progress` VALUES (11, 6, '111', 3, 1533624272, '一般流程2', 1533624301, 1);
INSERT INTO `progress` VALUES (12, 6, '2222', 1, 1533624315, '2222', NULL, 1);

SET FOREIGN_KEY_CHECKS = 1;
