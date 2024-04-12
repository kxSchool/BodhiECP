/*
 Navicat Premium Data Transfer

 Source Server         : 192.168.177.128
 Source Server Type    : MySQL
 Source Server Version : 50744
 Source Host           : 192.168.177.128:3306
 Source Schema         : bodhi_shopmall

 Target Server Type    : MySQL
 Target Server Version : 50744
 File Encoding         : 65001

 Date: 12/04/2024 10:30:57
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for account_log
-- ----------------------------
DROP TABLE IF EXISTS `account_log`;
CREATE TABLE `account_log`  (
  `log_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'log的id',
  `log_sn` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '流水号',
  `staff_id` mediumint(8) UNSIGNED NOT NULL COMMENT '操作人id 0为系统管理员',
  `user_money` decimal(10, 2) NOT NULL COMMENT '资金',
  `change_time` int(10) UNSIGNED NOT NULL COMMENT '变动时间',
  `change_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '变动原因',
  `status_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '提现成功\r\n,转入钱包成功',
  `change_money` decimal(10, 2) NOT NULL COMMENT '修改金额',
  `shopid` int(11) NOT NULL COMMENT '服务商id',
  `staff_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '操作人名称',
  `status` tinyint(1) NOT NULL COMMENT '1为提现成功，2为转入钱包，3为转入冻结,4为申请提现',
  `adminid` int(11) NOT NULL COMMENT '管理员ID',
  `adminname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '管理员名称',
  PRIMARY KEY (`log_id`) USING BTREE,
  INDEX `user_id`(`staff_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 38 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '商铺财务操作日志表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of account_log
-- ----------------------------
INSERT INTO `account_log` VALUES (37, '2024032312584741933', 165, 76970.05, 1711169927, '订单号202403235562481015完单结账', '转入账户冻结余额', 980.00, 241, 'admin', 3, 0, '');

-- ----------------------------
-- Table structure for ad
-- ----------------------------
DROP TABLE IF EXISTS `ad`;
CREATE TABLE `ad`  (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '广告名',
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '广告描述',
  `spaceid` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '广告位置id（happy_ad_space中的spaceid）',
  `type` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '0是图片广告 1是文字广告',
  `setting` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '广告设置（广告内容ad_code、广告链接ad_link组成数组转化成的字符串）',
  `startdate` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '开始显示时间（时间戳）',
  `enddate` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '结束显示时间',
  `addtime` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '广告添加时间',
  `clicks` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '广告点击次数',
  `listorder` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '排序',
  `disabled` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1可用  0禁用',
  `description1` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '广告描述1',
  `description2` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '广告描述2',
  `description3` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '广告描述3',
  `description4` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '广告描述4',
  `apptype` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT 'app接口判断跳转的方向：0,默认不做任何操作；1,店铺列表;2,店铺详情;3,商品列表;4,商品详情;5,广告',
  `price` int(10) NULL DEFAULT NULL COMMENT '价格',
  `amount` int(11) NULL DEFAULT NULL COMMENT '销售数量',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `spaceid`(`spaceid`, `disabled`, `listorder`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 209 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '广告位内容' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of ad
-- ----------------------------
INSERT INTO `ad` VALUES (1, '公司注册', '公司注册', 1, '0', '{\"ad_link\":\"/product/info?tid=32&sid=2\",\"ad_code\":\"n_banner-1.jpg\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', NULL, NULL);
INSERT INTO `ad` VALUES (2, '税控代办', '税控代办', 1, '0', '{\"ad_link\":\"/product/info.html?tid=54&sid=7\",\"ad_code\":\"n_banner-2.jpg\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', NULL, NULL);
INSERT INTO `ad` VALUES (178, '知识产权', '知识产权', 1, '0', '{\"ad_link\":\"/product/info.html?tid=115&sid=21\",\"ad_code\":\"n_banner-4.jpg\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', NULL, NULL);
INSERT INTO `ad` VALUES (177, '互联网+财税', '互联网+财税', 1, '0', '{\"ad_link\":\"/product/info?tid=53&sid=6\",\"ad_code\":\"n_banner-3.jpg\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', NULL, NULL);
INSERT INTO `ad` VALUES (118, '财税服务', '财税服务', 2, '0', '{\"ad_link\":\"/product\\/info?tid=53&sid=6\",\"ad_code\":\"home_type2.png\"}', 0, 0, 0, 0, 2, 1, NULL, NULL, NULL, NULL, '0', NULL, NULL);
INSERT INTO `ad` VALUES (7, '工商服务', '开公司', 2, '0', '{\"ad_link\":\"/product\\/info?tid=32&sid=2\",\"ad_code\":\"home_type1.png\"}', 0, 0, 0, 0, 1, 1, '', '', '', '', '', 0, NULL);
INSERT INTO `ad` VALUES (119, '许可服务', '注册商标', 2, '0', '{\"ad_link\":\"/product\\/info?tid=77&sid=14\",\"ad_code\":\"home_type3.png\"}', 0, 0, 0, 0, 3, 1, NULL, NULL, NULL, NULL, '0', NULL, NULL);
INSERT INTO `ad` VALUES (120, '知识产权', '办社保', 2, '0', '{\"ad_link\":\"/product\\/info?tid=91&sid=18\",\"ad_code\":\"home_type4.png\"}', 0, 0, 0, 0, 4, 1, NULL, NULL, NULL, NULL, '0', NULL, NULL);
INSERT INTO `ad` VALUES (121, '认证服务', '找律师', 2, '0', '{\"ad_link\":\"/product\\/info?tid=120&sid=24\",\"ad_code\":\"home_type5.png\"}', 0, 0, 0, 0, 5, 1, NULL, NULL, NULL, NULL, '0', NULL, NULL);
INSERT INTO `ad` VALUES (122, '法律服务', '办著作权', 2, '0', '{\"ad_link\":\"/product\\/info?tid=127&sid=27\",\"ad_code\":\"home_type6.png\"}', 0, 0, 0, 0, 6, 1, NULL, NULL, NULL, NULL, '0', NULL, NULL);
INSERT INTO `ad` VALUES (123, '金融服务', '申请专利', 2, '0', '{\"ad_link\":\"/product\\/info?tid=138&sid=31\",\"ad_code\":\"home_type7.png\"}', 0, 0, 0, 0, 7, 1, NULL, NULL, NULL, NULL, '0', NULL, NULL);
INSERT INTO `ad` VALUES (124, '全部分类', '全部分类', 2, '0', '{\"ad_link\":\"/product\\/index\",\"ad_code\":\"home_type8.png\"}', 0, 0, 0, 0, 8, 1, NULL, NULL, NULL, NULL, '0', NULL, NULL);
INSERT INTO `ad` VALUES (126, '专属定制', '专属定制', 7, '0', '{\"ad_link\":\"/index\\/customization\",\"ad_code\":\"proper_banner.png\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', NULL, NULL);
INSERT INTO `ad` VALUES (127, '公司注册+记账服务', '公司注册+记账服务', 3, '0', '{\"ad_link\":\"/product/info.html?tid=151&sid=145\",\"ad_code\":\"ybgszc.jpg\"}', 0, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, '0', 3600, 35);
INSERT INTO `ad` VALUES (128, '餐饮公司注册', '税控代办', 3, '0', '{\"ad_link\":\"/product/info.html?tid=149&sid=145\",\"ad_code\":\"cygs.jpg\"}', 0, 0, 0, 0, 4, 1, '', NULL, NULL, NULL, '0', 3800, 15);
INSERT INTO `ad` VALUES (129, '物流公司注册', '银行开户', 3, '0', '{\"ad_link\":\"/product/info.html?tid=150&sid=145\",\"ad_code\":\"wlgs.jpg\"}', 0, 0, 0, 0, 5, 1, '', NULL, NULL, NULL, '0', 4600, 85);
INSERT INTO `ad` VALUES (130, '商标设计+商标注册', '商标设计+商标注册', 3, '0', '{\"ad_link\":\"/product/info.html?tid=147&sid=145\",\"ad_code\":\"sbfw.jpg\"}', 0, 0, 0, 0, 2, 1, '', NULL, NULL, NULL, '0', 3600, 46);
INSERT INTO `ad` VALUES (131, '法律咨询套餐', '法律咨询套餐', 3, '0', '{\"ad_link\":\"/product/info.html?tid=136&sid=29\",\"ad_code\":\"flfw.jpg\"}', 0, 0, 0, 0, 3, 1, '', NULL, NULL, NULL, '0', 2580, 15);
INSERT INTO `ad` VALUES (181, '税控代办', '专业代办 省时省力', 48, '0', '{\"ad_link\":\"/product/info.html?cid=7_54\",\"ad_code\":\"info-4.jpg\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', 500, NULL);
INSERT INTO `ad` VALUES (132, '公司注册', '公司注册', 4, '0', '{\"ad_link\":\"/product\\/info.html?tid=32&sid=2\",\"ad_code\":\"gszc.jpg\"}', 0, 0, 0, 0, 1, 1, '', '', '', '', '', 1280, 48);
INSERT INTO `ad` VALUES (133, '代理记账', '代理记账', 4, '0', '{\"ad_link\":\"/product\\/info.html?tid=52&sid=6\",\"ad_code\":\"dljz.jpg\"}', 0, 0, 0, 0, 3, 1, '', '', '', '', '', 3600, 20);
INSERT INTO `ad` VALUES (134, '税控代办', '税控代办', 4, '0', '{\"ad_link\":\"/product/info.html?tid=54&sid=7\",\"ad_code\":\"swch.jpg\"}', 0, 0, 0, 0, 2, 1, '', NULL, NULL, NULL, '0', 500, 60);
INSERT INTO `ad` VALUES (135, '专项审计', '专项审计', 4, '0', '{\"ad_link\":\"/product/info.html?tid=59&sid=8\",\"ad_code\":\"zxsj.jpg\"}', 0, 0, 0, 0, 4, 1, '', NULL, NULL, NULL, '0', 20000, 12);
INSERT INTO `ad` VALUES (136, '公司注销', '公司注销', 4, '0', '{\"ad_link\":\"/product/info.html?tid=45&sid=4\",\"ad_code\":\"gszx.jpg\"}', 0, 0, 0, 0, 5, 1, '', NULL, NULL, NULL, '0', 3800, 10);
INSERT INTO `ad` VALUES (137, '商品条形码', '商品条形码', 6, '0', '{\"ad_link\":\"/product/info.html?tid=118&sid=23\",\"ad_code\":\"sptxm.jpg\"}', 0, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, '0', 3600, 50);
INSERT INTO `ad` VALUES (138, '高新企业认证', '高新企业认证', 6, '0', '{\"ad_link\":\"/product/info.html?tid=125&sid=25\",\"ad_code\":\"gxqyrd.jpg\"}', 0, 0, 0, 0, 2, 1, '', NULL, NULL, NULL, '0', 32800, 6);
INSERT INTO `ad` VALUES (139, '质量管理体系认证', '质量管理体系认证', 6, '0', '{\"ad_link\":\"/product/info.html?tid=120&sid=24\",\"ad_code\":\"zlgltx.jpg\"}', 0, 0, 0, 0, 3, 1, '', NULL, NULL, NULL, '0', 9800, 16);
INSERT INTO `ad` VALUES (140, '环境管理体系认证', '环境管理体系认证', 6, '0', '{\"ad_link\":\"/product/info.html?id=90&tid=121&sid=24\",\"ad_code\":\"hjgltx.png\"}', 0, 0, 0, 0, 4, 1, '', NULL, NULL, NULL, '0', 11800, 20);
INSERT INTO `ad` VALUES (141, '信息管理安全认证', '信息管理安全认证', 6, '0', '{\"ad_link\":\"/product/info.html?id=91&tid=122&sid=24\",\"ad_code\":\"xxgxaq.jpg\"}', 0, 0, 0, 0, 5, 1, '', NULL, NULL, NULL, '0', 11800, 18);
INSERT INTO `ad` VALUES (142, '商标注册', '商标注册', 5, '0', '{\"ad_link\":\"/product/info.html?tid=91&sid=18\",\"ad_code\":\"sbzc.jpg\"}', 0, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, '0', 980, 85);
INSERT INTO `ad` VALUES (143, '商标撤三', '商标撤三', 5, '0', '{\"ad_link\":\"/product/info.html?tid=98&sid=18\",\"ad_code\":\"sbcs.jpg\"}', 0, 0, 0, 0, 5, 1, '', NULL, NULL, NULL, '0', 3000, 17);
INSERT INTO `ad` VALUES (144, '软件著作权', '软件著作权', 5, '0', '{\"ad_link\":\"/product/info.html?tid=108&sid=19\",\"ad_code\":\"rjzzq.jpg\"}', 0, 0, 0, 0, 3, 1, '', NULL, NULL, NULL, '0', 1800, 78);
INSERT INTO `ad` VALUES (145, '发明专利', '发明专利', 5, '0', '{\"ad_link\":\"/product/info.html?tid=112&sid=20\",\"ad_code\":\"fmzl.jpg\"}', 0, 0, 0, 0, 2, 1, '', NULL, NULL, NULL, '0', 5000, 50);
INSERT INTO `ad` VALUES (146, '实用新型专利', '实用新型专利', 5, '0', '{\"ad_link\":\"/product/info.html?tid=113&sid=20\",\"ad_code\":\"syxxzl.jpg\"}', 0, 0, 0, 0, 4, 1, '', NULL, NULL, NULL, '0', 2800, 45);
INSERT INTO `ad` VALUES (147, '食品经营许可证', '食品经营许可证', 8, '0', '{\"ad_link\":\"/product/info.html?id=33&tid=64&sid=11\",\"ad_code\":\"spjy.jpg\"}', 0, 0, 0, 0, 1, 1, '', NULL, NULL, NULL, '0', 3800, 60);
INSERT INTO `ad` VALUES (148, '道路经营许可证', '道路经营许可证', 8, '0', '{\"ad_link\":\"/product/info.html?id=31&tid=62&sid=10\",\"ad_code\":\"dljy.jpg\"}', 0, 0, 0, 0, 2, 1, '', NULL, NULL, NULL, '0', 4600, 31);
INSERT INTO `ad` VALUES (149, '人力资源服务许可证', '人力资源服务许可证', 8, '0', '{\"ad_link\":\"/product/info.html?id=46&tid=77&sid=14\",\"ad_code\":\"rlzy.jpg\"}', 0, 0, 0, 0, 3, 1, '', NULL, NULL, NULL, '0', 8800, 45);
INSERT INTO `ad` VALUES (150, '进出口权许可证', '进出口权许可证', 8, '0', '{\"ad_link\":\"/product/info.html?id=49&tid=79&sid=14\",\"ad_code\":\"jckmy.jpg\"}', 0, 0, 0, 0, 4, 1, '', NULL, NULL, NULL, '0', 3600, 11);
INSERT INTO `ad` VALUES (151, 'ISP经营许可证', 'ISP经营许可证', 8, '0', '{\"ad_link\":\"/product/info.html?id=52&tid=83&sid=16\",\"ad_code\":\"ispjy.jpg\"}', 0, 0, 0, 0, 5, 1, '', NULL, NULL, NULL, '0', 38000, 5);
INSERT INTO `ad` VALUES (152, '开公司', '公司注册', 9, '1', '{\"ad_link\":\"/product/info.html?cid=2_32\",\"ad_code\":\"\"}', 0, 0, 0, 0, 0, 1, '', '', '', '', '', 0, NULL);
INSERT INTO `ad` VALUES (153, '记账服务', '知识产权', 9, '1', '{\"ad_link\":\"/product/info.html?cid=6_52\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', NULL, NULL);
INSERT INTO `ad` VALUES (154, '商标注册', '代理记账', 9, '1', '{\"ad_link\":\"/product/info.html?cid=18_91\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', NULL, NULL);
INSERT INTO `ad` VALUES (155, '版权申请', '国家高新', 9, '1', '{\"ad_link\":\"/product/info.html?cid=19_100\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', NULL, NULL);
INSERT INTO `ad` VALUES (156, '专利申请', '税收筹划', 9, '1', '{\"ad_link\":\"/product/info.html?cid=20_112\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', NULL, NULL);
INSERT INTO `ad` VALUES (157, '认证服务', '公司转让', 9, '1', '{\"ad_link\":\"/product/info.html?cid=24_120\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', NULL, NULL);
INSERT INTO `ad` VALUES (161, '轮播图1', '轮播图1', 10, '0', '{\"ad_link\":\"/product\\/info.html?cid=2_32\",\"ad_code\":\"xxxx_1533806704.png\"}', 0, 0, 0, 0, 0, 0, '', '', '', '', '0', 0, NULL);
INSERT INTO `ad` VALUES (162, '轮播图2', '轮播图2', 10, '0', '{\"ad_link\":\"/product\\/info.html?cid=7_54\",\"ad_code\":\"xxxx_1533806843.jpg\"}', 0, 0, 0, 0, 0, 0, '', '', '', '', '0', 0, NULL);
INSERT INTO `ad` VALUES (163, '轮播图3', '轮播图3', 10, '0', '{\"ad_link\":\"/product\\/info.html?cid=6_52\",\"ad_code\":\"xxxx_1533806812.jpg\"}', 0, 0, 0, 0, 0, 0, '', '', '', '', '0', 0, NULL);
INSERT INTO `ad` VALUES (164, '轮播图4', '轮播图4', 10, '0', '{\"ad_link\":\"/product\\/info.html?cid=21_115\",\"ad_code\":\"xxxx_1533806773.jpg\"}', 0, 0, 0, 0, 0, 0, '', '', '', '', '0', 0, NULL);
INSERT INTO `ad` VALUES (172, '一般公司注册', ' 一般公司注册', 12, '0', '{\"ad_link\":\"/product\\/info.html?cid=145_151\",\"ad_code\":\"setMeal1.jpg\"}', 0, 0, 0, 0, 0, 1, '', '', '', '', '0', 0, NULL);
INSERT INTO `ad` VALUES (173, '优惠套餐', ' 餐饮公司注册', 12, '0', '{\"ad_link\":\"/product/info.html?cid=145_149\",\"ad_code\":\"setMeal2.jpg\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', NULL, NULL);
INSERT INTO `ad` VALUES (174, '法律服务', '法律服务', 12, '0', '{\"ad_link\":\"/product\\/info.html?cid=29_136\",\"ad_code\":\"setMeal3.jpg\"}', 0, 0, 0, 0, 0, 1, '', '', '', '', '0', 0, NULL);
INSERT INTO `ad` VALUES (175, '优惠套餐', '物流公司注册', 12, '0', '{\"ad_link\":\"/product/info.html?cid=145_149\",\"ad_code\":\"setMeal4.jpg\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', NULL, NULL);
INSERT INTO `ad` VALUES (176, '商标服务', ' 商标服务', 12, '0', '{\"ad_link\":\"/product\\/info.html?cid=145_147\",\"ad_code\":\"setMeal5.jpg\"}', 0, 0, 0, 0, 0, 1, '', '', '', '', '0', 0, NULL);
INSERT INTO `ad` VALUES (180, '公司注册', '极速注册 省心保障', 48, '0', '{\"ad_link\":\"/product\\/info.html?cid=2_32\",\"ad_code\":\"info-2.jpg\"}', 0, 0, 0, 0, 0, 1, '', '', '', '', '', 1280, NULL);
INSERT INTO `ad` VALUES (207, '服务商入驻', '', 10, '0', '{\"ad_link\":\"\",\"ad_code\":\"xxxx_1533869022.png\"}', 0, 0, 1533808856, 0, 0, 0, '', '', '', '', '0', 0, NULL);
INSERT INTO `ad` VALUES (206, '服务商入驻', '', 1, '0', '{\"ad_link\":\"\",\"ad_code\":\"xxxx_1533872372.png\"}', 0, 0, 1533808759, 0, 0, 1, '', '', '', '', '0', 0, NULL);
INSERT INTO `ad` VALUES (182, '代理记账', '记账报税 告别财务风险', 48, '0', '{\"ad_link\":\"/product\\/info.html?cid=6_52\",\"ad_code\":\"info-1.jpg\"}', 0, 0, 0, 0, 0, 1, '', '', '', '', '', 3600, NULL);
INSERT INTO `ad` VALUES (183, '专项审计', '贴心指导 专业服务', 48, '0', '{\"ad_link\":\"/product/info.html?cid=8_59\",\"ad_code\":\"info-5.jpg\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', 2000, NULL);
INSERT INTO `ad` VALUES (184, '公司注销', '快速递交 高授权率', 48, '0', '{\"ad_link\":\"/product/info.html?cid=4_45\",\"ad_code\":\"info-3.jpg\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', 3800, NULL);
INSERT INTO `ad` VALUES (185, '商标注册', '知识产权保护第一步', 49, '0', '{\"ad_link\":\"/product/info.html?cid=18_91\",\"ad_code\":\"info-14.jpg\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', 980, NULL);
INSERT INTO `ad` VALUES (186, '发明专利', '防止侵权 抢占市场', 49, '0', '{\"ad_link\":\"/product/info.html?cid=20_112\",\"ad_code\":\"info-11.jpg\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', 5000, NULL);
INSERT INTO `ad` VALUES (187, '软件著作权', '保护著作权人合法权益', 49, '0', '{\"ad_link\":\"/product/info.html?cid=19_108\",\"ad_code\":\"info-12.jpg\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', 1800, NULL);
INSERT INTO `ad` VALUES (188, '实用新型专利', '保护知产 先人一步', 49, '0', '{\"ad_link\":\"/product/info.html?cid=20_113\",\"ad_code\":\"info-15.jpg\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', 2800, NULL);
INSERT INTO `ad` VALUES (189, '商标撤三', '解决疑难商标 排除后顾之忧', 49, '0', '{\"ad_link\":\"/product/info.html?cid=18_98\",\"ad_code\":\"info-13.jpg\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', 3000, NULL);
INSERT INTO `ad` VALUES (191, '商品条形码', '售后跟踪 省心省力', 50, '0', '{\"ad_link\":\"/product\\/info.html?cid=23_118\",\"ad_code\":\"xxxx_1533546448.jpg\"}', 0, 0, 0, 0, 0, 1, '', '', '', '', '0', 3600, NULL);
INSERT INTO `ad` VALUES (192, '高新企业认定', '节省成本 提高效益', 50, '0', '{\"ad_link\":\"/product/info.html?cid=25_125\",\"ad_code\":\"info-6.jpg\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', 32800, NULL);
INSERT INTO `ad` VALUES (193, '质量管理体系认证', '企业开拓市场金钥匙', 50, '0', '{\"ad_link\":\"/product/info.html?cid=24_120\",\"ad_code\":\"info-8.jpg\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', 9800, NULL);
INSERT INTO `ad` VALUES (194, '环境管理体系认证', '专业服务 全程跟进', 50, '0', '{\"ad_link\":\"/product/info.html?cid=24_121\",\"ad_code\":\"info-7.png\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', 11800, NULL);
INSERT INTO `ad` VALUES (195, '信息管理体系认证', '足不出户 专人办理', 50, '0', '{\"ad_link\":\"/product/info.html?cid=24_122\",\"ad_code\":\"info-10.jpg\"}', 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '0', 11800, NULL);
INSERT INTO `ad` VALUES (196, '商品条形码', '条形码是商品的身份证   ', 51, '0', '{\"ad_link\":\"/product\\/info.html?cid=23_118\",\"ad_code\":\"xxxx_1535096638.png\"}', 0, 0, 0, 0, 0, 1, '', '', '', '', '', 3600, NULL);
INSERT INTO `ad` VALUES (197, '高新企业认证', '享受税收减免优惠 ', 51, '0', '{\"ad_link\":\"/index.php\\/product\\/info.html?cid=25_125\",\"ad_code\":\"xxxx_1535096690.png\"}', 0, 0, 0, 0, 0, 1, '', '', '', '', '', 32800, NULL);
INSERT INTO `ad` VALUES (198, '质量管理体系认证', '增强企业市场竞争力', 51, '0', '{\"ad_link\":\"/product\\/info.html?cid=24_120\",\"ad_code\":\"xxxx_1535096722.png\"}', 0, 0, 0, 0, 0, 1, '', '', '', '', '', 9800, NULL);
INSERT INTO `ad` VALUES (199, '信息安全体系认证', '有效保障组织信息安全', 51, '0', '{\"ad_link\":\"/product\\/info.html?cid=24_122\",\"ad_code\":\"xxxx_1535096742.png\"}', 0, 0, 0, 0, 0, 1, '', '', '', '', '', 11800, NULL);
INSERT INTO `ad` VALUES (200, 'ISP经营许可证', '交易过程 全程担保', 51, '0', '{\"ad_link\":\"/product/info.html?gid=52&cid=16_83\",\"ad_code\":\"info-16.jpg\"}', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '0', 8000, NULL);
INSERT INTO `ad` VALUES (208, '13', '', 9, '2', '{\"ad_link\":\"/product\\/info.html?cid=2_32\"}', 0, 0, 1533954269, 0, 0, 0, '', '', '', '', '4', 0, NULL);
INSERT INTO `ad` VALUES (205, 'gxjah ', '', 10, '0', '{\"ad_link\":\"/product\\/info.html?cid=2_32\",\"ad_code\":\"xxxx_1534564048.png\"}', 0, 0, 1533546820, 0, 0, 1, '', '', '', '', '', 0, NULL);

-- ----------------------------
-- Table structure for ad_space
-- ----------------------------
DROP TABLE IF EXISTS `ad_space`;
CREATE TABLE `ad_space`  (
  `spaceid` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `name` char(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '广告位名',
  `width` smallint(4) UNSIGNED NOT NULL DEFAULT 0 COMMENT '广告位所占用的宽度',
  `height` smallint(4) UNSIGNED NOT NULL DEFAULT 0 COMMENT '广告位所占用的高度',
  `description` char(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '描述',
  `disabled` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1可用  0禁用',
  PRIMARY KEY (`spaceid`) USING BTREE,
  INDEX `disabled`(`disabled`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 54 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '广告位' ROW_FORMAT = FIXED;

-- ----------------------------
-- Records of ad_space
-- ----------------------------
INSERT INTO `ad_space` VALUES (1, '移动端首页轮播图', 0, 0, '移动端首页轮播图', 1);
INSERT INTO `ad_space` VALUES (2, '移动端首页服务位', 0, 0, '', 1);
INSERT INTO `ad_space` VALUES (3, '优选套餐', 0, 0, '移动端优选套餐', 1);
INSERT INTO `ad_space` VALUES (4, '工商财税', 0, 0, '移动端工商财税', 1);
INSERT INTO `ad_space` VALUES (5, '知识产权', 0, 0, '移动端知识产权', 1);
INSERT INTO `ad_space` VALUES (6, '认证服务', 0, 0, '移动端认证服务', 1);
INSERT INTO `ad_space` VALUES (7, '移动端首页专属定制位', 0, 0, '', 1);
INSERT INTO `ad_space` VALUES (8, '资质服务', 0, 0, '移动端资质服务', 1);
INSERT INTO `ad_space` VALUES (9, 'PC首页栏目', 0, 0, 'PC首页栏目', 1);
INSERT INTO `ad_space` VALUES (10, 'PC首页轮播图', 0, 0, '', 1);
INSERT INTO `ad_space` VALUES (53, 'PC首页合作伙伴', 15, 15, '', 1);
INSERT INTO `ad_space` VALUES (48, '工商财税', 0, 0, '', 1);
INSERT INTO `ad_space` VALUES (12, '优选套餐', 0, 0, '优质服务那么多，我们为你精选，容易办越来越懂你', 1);
INSERT INTO `ad_space` VALUES (49, '知识产权', 0, 0, '', 1);
INSERT INTO `ad_space` VALUES (51, '认证服务', 0, 0, '', 1);
INSERT INTO `ad_space` VALUES (50, '资质服务', 0, 0, '', 1);

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `account` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '登陆账号',
  `password` char(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '密码（明码md5）',
  `realname` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '真是姓名',
  `roleid` smallint(3) NOT NULL COMMENT '角色id（对应happy_admin_role表中的roleid）',
  `mobile` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '手机号',
  `email` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '邮箱',
  `register_ip` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '注册IP',
  `register_time` int(10) NOT NULL COMMENT '注册时间（时间戳）',
  `login_ip` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '上次登陆IP',
  `login_time` int(10) NOT NULL COMMENT '上次登陆时间（时间戳）',
  `disabled` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1禁用 0可用',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '后台管理员表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'admin', '96e79218965eb72c92a549dd5a330112', '系统管理员', 1, '15618645670', 'admin@bodhitest.com', '112.2.149.161', 1694150798, '192.168.177.1', 1712887663, 0);

-- ----------------------------
-- Table structure for admin_priv
-- ----------------------------
DROP TABLE IF EXISTS `admin_priv`;
CREATE TABLE `admin_priv`  (
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
) ENGINE = MyISAM AUTO_INCREMENT = 126 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '权限节点表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of admin_priv
-- ----------------------------
INSERT INTO `admin_priv` VALUES (1, '权限管理', 0, 'manager', 'init', '', 'fa fa-group', 0, 1);
INSERT INTO `admin_priv` VALUES (2, '角色管理', 1, 'manager', 'role', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (3, '账户管理', 1, 'manager', 'admin', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (4, '节点管理', 1, 'manager', 'priv', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (22, '会员管理', 0, 'members', 'init', '', 'fa fa-user', 0, 1);
INSERT INTO `admin_priv` VALUES (23, '客户企业', 22, 'members', 'index', 'type=1', '', 0, 1);
INSERT INTO `admin_priv` VALUES (24, '加盟商户', 22, 'members', 'index', 'type=2', '', 0, 1);
INSERT INTO `admin_priv` VALUES (44, '星级管理', 22, 'members', 'star', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (50, '入驻申请', 22, 'members', 'applySeller', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (51, '证书审核', 22, 'members', 'certificate', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (93, '操作日志', 1, 'log', 'manage', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (95, '商品管理', 0, 'goods', 'init', '', 'fa fa-magic', 0, 1);
INSERT INTO `admin_priv` VALUES (96, '商品列表', 95, 'goods', 'index', '', ' ', 0, 1);
INSERT INTO `admin_priv` VALUES (97, '添加商品', 95, 'goods', 'addGoods', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (98, '订单管理', 0, 'order', 'init', '', 'fa fa-list', 0, 1);
INSERT INTO `admin_priv` VALUES (99, '订单列表', 98, 'order', 'index', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (100, '财务管理', 0, 'finance', 'index', '', 'fa fa-rmb', 0, 1);
INSERT INTO `admin_priv` VALUES (102, '财务日志', 100, 'finance', 'logs', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (103, '提现申请', 100, 'finance', 'apply', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (108, '广告管理', 106, 'ad', 'space', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (107, '促销卡券', 106, 'promotion', 'index', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (106, '营销管理', 0, '', '', '', 'fa fa-share-alt', 0, 1);
INSERT INTO `admin_priv` VALUES (109, '分类管理', 95, 'goods', 'cateList', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (110, '添加分类', 95, 'goods', 'addCate', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (111, '进度管理', 95, 'goods', 'progress', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (112, 'CMS管理', 0, 'cms', 'init', '', 'fa fa-archive', 0, 1);
INSERT INTO `admin_priv` VALUES (113, '栏目管理', 112, 'cms', 'channel', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (114, '内容管理', 112, 'cms', 'archive', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (115, '评论管理', 0, 'comment', 'init', '', 'fa fa-comments', 0, 1);
INSERT INTO `admin_priv` VALUES (116, '评论列表', 115, 'comment', 'index', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (117, '添加评论', 115, 'comment', 'addComment', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (123, '财务报表', 121, 'statistic', 'finance', '', '', 0, 1);
INSERT INTO `admin_priv` VALUES (121, '统计分析', 0, 'statistic', 'init', '', 'fa fa-area-chart', 0, 1);
INSERT INTO `admin_priv` VALUES (122, '订单统计', 121, 'statistic', 'order', '', '', 0, 1);

-- ----------------------------
-- Table structure for admin_role
-- ----------------------------
DROP TABLE IF EXISTS `admin_role`;
CREATE TABLE `admin_role`  (
  `roleid` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `rolename` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '角色名',
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '角色描述',
  `disabled` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否可用（1禁用 0可用 默认为0）',
  PRIMARY KEY (`roleid`) USING BTREE,
  INDEX `disabled`(`disabled`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '管理员角色表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of admin_role
-- ----------------------------
INSERT INTO `admin_role` VALUES (1, '超级管理员', '超级管理员', 0);
INSERT INTO `admin_role` VALUES (10, '总经办', '超级管理员', 0);
INSERT INTO `admin_role` VALUES (11, '运营部', '', 0);

-- ----------------------------
-- Table structure for admin_role_priv
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_priv`;
CREATE TABLE `admin_role_priv`  (
  `roleid` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '角色id（对应happy_admin_role表中的roleid）',
  `privid` tinyint(3) NOT NULL DEFAULT 0 COMMENT '权限节点',
  INDEX `roleid`(`roleid`, `privid`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '管理员后台操作权限表' ROW_FORMAT = FIXED;

-- ----------------------------
-- Records of admin_role_priv
-- ----------------------------
INSERT INTO `admin_role_priv` VALUES (0, 22);
INSERT INTO `admin_role_priv` VALUES (1, 1);
INSERT INTO `admin_role_priv` VALUES (1, 2);
INSERT INTO `admin_role_priv` VALUES (1, 3);
INSERT INTO `admin_role_priv` VALUES (1, 4);
INSERT INTO `admin_role_priv` VALUES (1, 22);
INSERT INTO `admin_role_priv` VALUES (1, 23);
INSERT INTO `admin_role_priv` VALUES (1, 24);
INSERT INTO `admin_role_priv` VALUES (1, 44);
INSERT INTO `admin_role_priv` VALUES (1, 50);
INSERT INTO `admin_role_priv` VALUES (1, 51);
INSERT INTO `admin_role_priv` VALUES (1, 93);
INSERT INTO `admin_role_priv` VALUES (1, 95);
INSERT INTO `admin_role_priv` VALUES (1, 96);
INSERT INTO `admin_role_priv` VALUES (1, 98);
INSERT INTO `admin_role_priv` VALUES (1, 99);
INSERT INTO `admin_role_priv` VALUES (1, 100);
INSERT INTO `admin_role_priv` VALUES (1, 102);
INSERT INTO `admin_role_priv` VALUES (1, 103);
INSERT INTO `admin_role_priv` VALUES (1, 106);
INSERT INTO `admin_role_priv` VALUES (1, 107);
INSERT INTO `admin_role_priv` VALUES (1, 108);
INSERT INTO `admin_role_priv` VALUES (1, 109);
INSERT INTO `admin_role_priv` VALUES (1, 111);
INSERT INTO `admin_role_priv` VALUES (1, 112);
INSERT INTO `admin_role_priv` VALUES (1, 113);
INSERT INTO `admin_role_priv` VALUES (1, 114);
INSERT INTO `admin_role_priv` VALUES (1, 115);
INSERT INTO `admin_role_priv` VALUES (1, 116);
INSERT INTO `admin_role_priv` VALUES (1, 117);
INSERT INTO `admin_role_priv` VALUES (1, 121);
INSERT INTO `admin_role_priv` VALUES (1, 122);
INSERT INTO `admin_role_priv` VALUES (1, 123);
INSERT INTO `admin_role_priv` VALUES (10, 1);
INSERT INTO `admin_role_priv` VALUES (10, 2);
INSERT INTO `admin_role_priv` VALUES (10, 3);
INSERT INTO `admin_role_priv` VALUES (10, 4);
INSERT INTO `admin_role_priv` VALUES (10, 22);
INSERT INTO `admin_role_priv` VALUES (10, 23);
INSERT INTO `admin_role_priv` VALUES (10, 24);
INSERT INTO `admin_role_priv` VALUES (10, 44);
INSERT INTO `admin_role_priv` VALUES (10, 50);
INSERT INTO `admin_role_priv` VALUES (10, 51);
INSERT INTO `admin_role_priv` VALUES (10, 93);
INSERT INTO `admin_role_priv` VALUES (10, 95);
INSERT INTO `admin_role_priv` VALUES (10, 96);
INSERT INTO `admin_role_priv` VALUES (10, 98);
INSERT INTO `admin_role_priv` VALUES (10, 99);
INSERT INTO `admin_role_priv` VALUES (10, 100);
INSERT INTO `admin_role_priv` VALUES (10, 102);
INSERT INTO `admin_role_priv` VALUES (10, 103);
INSERT INTO `admin_role_priv` VALUES (10, 106);
INSERT INTO `admin_role_priv` VALUES (10, 107);
INSERT INTO `admin_role_priv` VALUES (10, 108);
INSERT INTO `admin_role_priv` VALUES (10, 109);
INSERT INTO `admin_role_priv` VALUES (10, 111);
INSERT INTO `admin_role_priv` VALUES (10, 112);
INSERT INTO `admin_role_priv` VALUES (10, 113);
INSERT INTO `admin_role_priv` VALUES (10, 114);
INSERT INTO `admin_role_priv` VALUES (10, 115);
INSERT INTO `admin_role_priv` VALUES (10, 116);
INSERT INTO `admin_role_priv` VALUES (11, 1);
INSERT INTO `admin_role_priv` VALUES (11, 2);
INSERT INTO `admin_role_priv` VALUES (11, 3);
INSERT INTO `admin_role_priv` VALUES (11, 4);
INSERT INTO `admin_role_priv` VALUES (11, 22);
INSERT INTO `admin_role_priv` VALUES (11, 23);
INSERT INTO `admin_role_priv` VALUES (11, 24);
INSERT INTO `admin_role_priv` VALUES (11, 44);
INSERT INTO `admin_role_priv` VALUES (11, 50);
INSERT INTO `admin_role_priv` VALUES (11, 51);
INSERT INTO `admin_role_priv` VALUES (11, 93);
INSERT INTO `admin_role_priv` VALUES (11, 95);
INSERT INTO `admin_role_priv` VALUES (11, 96);
INSERT INTO `admin_role_priv` VALUES (11, 97);
INSERT INTO `admin_role_priv` VALUES (11, 98);
INSERT INTO `admin_role_priv` VALUES (11, 99);
INSERT INTO `admin_role_priv` VALUES (11, 100);
INSERT INTO `admin_role_priv` VALUES (11, 102);
INSERT INTO `admin_role_priv` VALUES (11, 103);
INSERT INTO `admin_role_priv` VALUES (11, 106);
INSERT INTO `admin_role_priv` VALUES (11, 107);
INSERT INTO `admin_role_priv` VALUES (11, 108);
INSERT INTO `admin_role_priv` VALUES (11, 109);
INSERT INTO `admin_role_priv` VALUES (11, 110);
INSERT INTO `admin_role_priv` VALUES (11, 111);
INSERT INTO `admin_role_priv` VALUES (11, 112);
INSERT INTO `admin_role_priv` VALUES (11, 113);
INSERT INTO `admin_role_priv` VALUES (11, 114);
INSERT INTO `admin_role_priv` VALUES (11, 115);
INSERT INTO `admin_role_priv` VALUES (11, 116);
INSERT INTO `admin_role_priv` VALUES (11, 117);
INSERT INTO `admin_role_priv` VALUES (11, 121);
INSERT INTO `admin_role_priv` VALUES (11, 122);
INSERT INTO `admin_role_priv` VALUES (11, 123);

-- ----------------------------
-- Table structure for bank
-- ----------------------------
DROP TABLE IF EXISTS `bank`;
CREATE TABLE `bank`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bank` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '银行卡' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of bank
-- ----------------------------
INSERT INTO `bank` VALUES (1, '工商银行', 'gongshangbank.png');
INSERT INTO `bank` VALUES (2, '广发银行', 'guangfabank.png');
INSERT INTO `bank` VALUES (3, '建设银行', 'jianshebank.png');
INSERT INTO `bank` VALUES (4, '交通银行', 'jiaotongbank.png');
INSERT INTO `bank` VALUES (5, '农业银行', 'nongyebank.png');
INSERT INTO `bank` VALUES (6, '上海农商银行', 'shanghaibank.png');
INSERT INTO `bank` VALUES (7, '兴业银行', 'xinyebank.png');
INSERT INTO `bank` VALUES (8, '招商银行', 'zhaoshangbank.png');
INSERT INTO `bank` VALUES (9, '中国银行', 'zhongguobank.png');

-- ----------------------------
-- Table structure for bind_info
-- ----------------------------
DROP TABLE IF EXISTS `bind_info`;
CREATE TABLE `bind_info`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `userid` int(11) NOT NULL COMMENT '用户id',
  `type` tinyint(1) NOT NULL COMMENT '0：手机号，1,邮箱',
  `value` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '内容',
  `delete` tinyint(1) NOT NULL COMMENT '0 未删除 1删除',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '用户手机及邮箱验证表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of bind_info
-- ----------------------------
INSERT INTO `bind_info` VALUES (9, 4, 0, '18763810911', 0);
INSERT INTO `bind_info` VALUES (10, 4, 1, '2416714377@qq.com', 0);
INSERT INTO `bind_info` VALUES (11, 8, 1, '28586585@qq.com', 0);
INSERT INTO `bind_info` VALUES (12, 13, 1, '173969938@qq.com', 0);
INSERT INTO `bind_info` VALUES (13, 11, 0, '18917238667', 0);
INSERT INTO `bind_info` VALUES (14, 12, 1, 'joby.jiang@gmail.com', 0);
INSERT INTO `bind_info` VALUES (15, 14, 1, '35820017@qq.com', 0);
INSERT INTO `bind_info` VALUES (16, 15, 1, '494452229@qq.com', 0);

-- ----------------------------
-- Table structure for bonus_type
-- ----------------------------
DROP TABLE IF EXISTS `bonus_type`;
CREATE TABLE `bonus_type`  (
  `type_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '红包类型流水号',
  `type_name` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '红包名称',
  `type_money` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '红包所值的金额',
  `send_type` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '红包发送类型.0 卡卷',
  `min_amount` decimal(10, 2) UNSIGNED NOT NULL DEFAULT 0.00 COMMENT '如果是按金额发送红包,该项是最小金额.即只要购买超过该金额的商品都可以领到红包',
  `max_amount` decimal(10, 2) UNSIGNED NOT NULL DEFAULT 0.00,
  `send_start_date` int(11) NOT NULL DEFAULT 0 COMMENT '红包发送的开始时间',
  `send_end_date` int(11) NOT NULL DEFAULT 0 COMMENT '红包发送的结束时间',
  `use_start_date` int(11) NOT NULL DEFAULT 0 COMMENT '红包可以使用的开始时间',
  `use_end_date` int(11) NOT NULL DEFAULT 0 COMMENT '红包可以使用的结束时间',
  `min_goods_amount` decimal(10, 2) UNSIGNED NOT NULL DEFAULT 0.00 COMMENT '可以使用该红包的商品的最低价格.即只要达到该价格的商品才可以使用红包',
  `use_type` tinyint(3) NOT NULL COMMENT '0:不支持并用，1：支持并用',
  `build_action` tinyint(3) NOT NULL COMMENT '生成方式 0 同一暗号 1 凭不同的促销码',
  `sign` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'build_action等于0时代表暗号，1时代表以什么开头',
  `num` int(10) NOT NULL COMMENT 'build_action是1的时候代表促销码位数',
  PRIMARY KEY (`type_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '红包类型表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of bonus_type
-- ----------------------------

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment`  (
  `comment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `seller_id` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '咨询师id',
  `order_id` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '订单id',
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '详细描述',
  `add_time` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `professional` tinyint(1) UNSIGNED NOT NULL DEFAULT 5 COMMENT '专业程度',
  `attitude` tinyint(1) UNSIGNED NOT NULL DEFAULT 5 COMMENT '服务态度',
  `effect` tinyint(1) UNSIGNED NOT NULL DEFAULT 5 COMMENT '办事效率',
  `tagids` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1.显示  0不显示',
  `is_hot` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1热门评论',
  `goods_id` int(11) NOT NULL COMMENT '商品id',
  `ip` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'IP',
  `star_level` tinyint(1) NOT NULL COMMENT '星级 ',
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '地址',
  `goods_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '商品名称',
  PRIMARY KEY (`comment_id`) USING BTREE,
  INDEX `id_value`(`order_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1956 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '订单评论表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES (1173, 26, 0, 0, '很棒的服务，指导很及时到位，很满意', 1532283306, 4, 4, 4, '2,3,4,5,6,7', 1, 0, 32, '114.94.28.162', 4, '上海市-崇明区', '无船承运业务经营资格登记证');
INSERT INTO `comment` VALUES (1172, 21, 0, 0, '服务不错，配合的也很好', 1532697280, 4, 4, 4, '1,2,5', 1, 0, 55, '114.94.28.162', 4, '上海市-自贸区', 'EDI经营许可证');
INSERT INTO `comment` VALUES (1171, 12, 0, 0, '相当满意，相当满意，相当满意。', 1533636728, 4, 4, 4, '1,2,3,4,5,6', 1, 0, 34, '114.94.28.162', 4, '上海市-宝山区', '食品生产经营许可证');
INSERT INTO `comment` VALUES (1170, 29, 0, 0, '咨询非常认真靠谱，感谢马原！下次还选你。', 1533247025, 4, 4, 4, '2,4,5,7', 1, 0, 53, '114.94.28.162', 4, '上海市-闵行区', 'IDC经营许可证');
INSERT INTO `comment` VALUES (1169, 18, 0, 0, '相当满意，相当满意，相当满意。', 1534085277, 4, 4, 4, '3,6', 1, 0, 53, '114.94.28.162', 4, '上海市-宝山区', 'IDC经营许可证');
INSERT INTO `comment` VALUES (1168, 29, 0, 0, '比想象的快！一共47天下证。', 1534111968, 4, 4, 4, '1,2,4,6,7', 1, 0, 31, '114.94.28.162', 4, '上海市-嘉定区', '道路运输经营许可证');
INSERT INTO `comment` VALUES (1167, 28, 0, 0, '非常负责，态度很好，选她没错', 1530383239, 4, 4, 4, '1,2,4,6,7', 1, 0, 157, '114.94.28.162', 4, '上海市-虹口区', '二类医疗器械经营许可证');
INSERT INTO `comment` VALUES (1166, 242, 0, 0, '服务很好，以后会一直合作下去', 1529626966, 4, 4, 4, '1,2,3,4,5,6,7', 1, 0, 50, '114.94.28.162', 4, '上海市-嘉定区', '危险化学品经营许可证');
INSERT INTO `comment` VALUES (1165, 21, 0, 0, '伙子服务态度比较喜欢，能耐心的解答我的疑问，整个沟通的过程蛮舒服的，办事效率也很高', 1532466980, 4, 4, 4, '1,3,4,5,6,7', 1, 0, 57, '114.94.28.162', 4, '上海市-普陀区', '网络文化经营许可证');
INSERT INTO `comment` VALUES (1164, 27, 0, 0, '遇到一些波折，最后还是顺利办下来了', 1530344197, 4, 4, 4, '1,2,3,6,7', 1, 0, 158, '114.94.28.162', 4, '上海市-闵行区', '三类医疗器械经营许可证');
INSERT INTO `comment` VALUES (1163, 29, 0, 0, '服务周到，热情主动，大方', 1533816651, 4, 4, 4, '1,2,3,4,5,6,7', 1, 0, 33, '114.94.28.162', 4, '上海市-浦东新区', '食品经营许可证(餐饮)');
INSERT INTO `comment` VALUES (1162, 12, 0, 0, '非常热心，对于不明白的地方都会细心解说，值得信赖及推荐~', 1532024905, 4, 4, 4, '1,2,4', 1, 0, 32, '114.94.28.162', 4, '上海市-闵行区', '无船承运业务经营资格登记证');
INSERT INTO `comment` VALUES (1161, 13, 0, 0, '做事靠谱，速度快，下次继续合作', 1531267830, 4, 4, 4, '1,2,4,5,6', 1, 0, 44, '114.94.28.162', 4, '上海市-奉贤区', '电视剧立项拍摄(单片许可证)');
INSERT INTO `comment` VALUES (1160, 12, 0, 0, '咨询非常认真靠谱，感谢马原！下次还选你。', 1533876324, 4, 4, 4, '1,6', 1, 0, 57, '114.94.28.162', 4, '上海市-杨浦区', '网络文化经营许可证');
INSERT INTO `comment` VALUES (1159, 13, 0, 0, '好，很好，非常好，哈哈哈', 1529326386, 4, 4, 4, '1,2,3,5,6', 1, 0, 55, '114.94.28.162', 4, '上海市-青浦区', 'EDI经营许可证');
INSERT INTO `comment` VALUES (1158, 20, 0, 0, '非常棒！很专业，给我们做了详尽的答疑解惑，支持，好评！', 1529886049, 4, 4, 4, '3,4', 1, 0, 37, '114.94.28.162', 4, '上海市-青浦区', '公共场所卫生许可证');
INSERT INTO `comment` VALUES (1157, 14, 0, 0, '站在客户的角度很敬业，加油小伙子', 1532825855, 4, 4, 4, '1,4,6,7', 1, 0, 158, '114.94.28.162', 4, '上海市-黄浦区', '三类医疗器械经营许可证');
INSERT INTO `comment` VALUES (1156, 18, 0, 0, '站在客户的角度很敬业，加油小伙子', 1532748934, 4, 4, 4, '1,2,4,6,7', 1, 0, 44, '114.94.28.162', 4, '上海市-青浦区', '电视剧立项拍摄(单片许可证)');
INSERT INTO `comment` VALUES (1155, 26, 0, 0, '一起去的小王还是挺有亲和力的，办事也细心', 1531762864, 4, 4, 4, '1,2,3,4,5,6,7', 1, 0, 46, '114.94.28.162', 4, '上海市-普陀区', '人力资源服务许可证');
INSERT INTO `comment` VALUES (1154, 22, 0, 0, '做事靠谱，速度快，下次继续合作', 1533571210, 4, 4, 4, '2,4,7', 1, 0, 42, '114.94.28.162', 4, '上海市-青浦区', '电影立项拍摄(单片许可证)');
INSERT INTO `comment` VALUES (1153, 29, 0, 0, '服务很好，以后会一直合作下去', 1532832925, 4, 4, 4, '1,2,3,4,5,6,7', 1, 0, 31, '114.94.28.162', 4, '上海市-普陀区', '道路运输经营许可证');
INSERT INTO `comment` VALUES (1152, 19, 0, 0, '小王能耐心的解释我的疑问，整个过程能尽量按照我的要求来，有些我不会的他都帮我搞，愉快的合作。', 1531859357, 4, 4, 4, '4,7', 1, 0, 53, '114.94.28.162', 4, '上海市-长宁区', 'IDC经营许可证');
INSERT INTO `comment` VALUES (1151, 22, 0, 0, '非常热心的一位同志，细致负责。', 1531451055, 4, 4, 4, '1,2,4,6,7', 1, 0, 49, '114.94.28.162', 4, '上海市-长宁区', '进出口权许可证');
INSERT INTO `comment` VALUES (1150, 26, 0, 0, '比较靠谱，很热心，人不错！', 1529578042, 4, 4, 4, '1,3,4', 1, 0, 44, '114.94.28.162', 4, '上海市-徐汇区', '电视剧立项拍摄(单片许可证)');
INSERT INTO `comment` VALUES (1149, 2, 0, 0, '非常热心的一位同志，细致负责。', 1533831904, 4, 4, 4, '2,3,5,7', 1, 0, 46, '114.94.28.162', 4, '上海市-松江区', '人力资源服务许可证');
INSERT INTO `comment` VALUES (1148, 24, 0, 0, '值得信任，值得托付业务！！！', 1533793017, 4, 4, 4, '1,2,3,6,7', 1, 0, 56, '114.94.28.162', 4, '上海市-浦东新区', '呼叫中心经营许可证');
INSERT INTO `comment` VALUES (1147, 13, 0, 0, '服务不错，配合的也很好', 1531600823, 4, 4, 4, '2,3,4,6', 1, 0, 41, '114.94.28.162', 4, '上海市-嘉定区', '电影单片审查及发行许可证');
INSERT INTO `comment` VALUES (1146, 29, 0, 0, '相当满意，相当满意，相当满意。', 1533640871, 4, 4, 4, '1,2,4,5,6,7', 1, 0, 45, '114.94.28.162', 4, '上海市-徐汇区', '广播电视视频点播业务经营许可证(乙种)');
INSERT INTO `comment` VALUES (1145, 25, 0, 0, 'Super surprise 超赞', 1531562325, 4, 4, 4, '1,6,7', 1, 0, 36, '114.94.28.162', 4, '上海市-虹口区', '酒类商品批发许可证');
INSERT INTO `comment` VALUES (1144, 242, 0, 0, '咨询非常认真靠谱，感谢马原！下次还选你。', 1529022392, 4, 4, 4, '2,4,6', 1, 0, 34, '114.94.28.162', 4, '上海市-闵行区', '食品生产经营许可证');
INSERT INTO `comment` VALUES (1143, 29, 0, 0, 'Super surprise 超赞', 1532145736, 4, 4, 4, '1,4', 1, 0, 34, '114.94.28.162', 4, '上海市-金山区', '食品生产经营许可证');
INSERT INTO `comment` VALUES (1142, 29, 0, 0, '服务很好，以后会一直合作下去', 1533521846, 4, 4, 4, '2,3,4', 1, 0, 45, '114.94.28.162', 4, '上海市-嘉定区', '广播电视视频点播业务经营许可证(乙种)');
INSERT INTO `comment` VALUES (1141, 22, 0, 0, '爱岗敬业 客户为宗旨 人美心善 大赞', 1529944765, 4, 4, 4, '1,2,4,7', 1, 0, 52, '114.94.28.162', 4, '上海市-奉贤区', 'ISP经营许可证');
INSERT INTO `comment` VALUES (1140, 27, 0, 0, '伙子服务态度比较喜欢，能耐心的解答我的疑问，整个沟通的过程蛮舒服的，办事效率也很高', 1529122281, 4, 4, 4, '1,2,3,4,5,6,7', 1, 0, 58, '114.94.28.162', 4, '上海市-静安区', '互联网药品信息服务资格证');
INSERT INTO `comment` VALUES (1139, 242, 0, 0, '咨询非常认真靠谱，感谢马原！下次还选你。', 1533224218, 4, 4, 4, '1,2,4,6', 1, 0, 52, '114.94.28.162', 4, '上海市-奉贤区', 'ISP经营许可证');
INSERT INTO `comment` VALUES (1138, 19, 0, 0, '很细心 知识点解释也很清晰', 1531594915, 4, 4, 4, '1,4,6', 1, 0, 158, '114.94.28.162', 4, '上海市-普陀区', '三类医疗器械经营许可证');
INSERT INTO `comment` VALUES (1137, 27, 0, 0, '相当满意，相当满意，相当满意。', 1528982005, 4, 4, 4, '2,3', 1, 0, 46, '114.94.28.162', 4, '上海市-杨浦区', '人力资源服务许可证');
INSERT INTO `comment` VALUES (1136, 21, 0, 0, '服务态度好，专业程度高，如期完成申办业务，赞！', 1533037291, 4, 4, 4, '1,3,6', 1, 0, 36, '114.94.28.162', 4, '上海市-自贸区', '酒类商品批发许可证');
INSERT INTO `comment` VALUES (1135, 13, 0, 0, '非常棒！很专业，给我们做了详尽的答疑解惑，支持，好评！', 1531697263, 4, 4, 4, '3,5,6,7', 1, 0, 47, '114.94.28.162', 4, '上海市-普陀区', '劳务派遣经营许可证');
INSERT INTO `comment` VALUES (1134, 13, 0, 0, '遇到一些波折，最后还是顺利办下来了', 1530419107, 4, 4, 4, '1,3,5,6', 1, 0, 38, '114.94.28.162', 4, '上海市-闵行区', '广播电视节目制作经营许可证');
INSERT INTO `comment` VALUES (1133, 2, 0, 0, '值得信任，值得托付业务！！！', 1531485670, 4, 4, 4, '1,4', 1, 0, 158, '114.94.28.162', 4, '上海市-徐汇区', '三类医疗器械经营许可证');
INSERT INTO `comment` VALUES (1132, 27, 0, 0, '服务周到，热情主动，大方', 1529222981, 4, 4, 4, '1,4', 1, 0, 51, '114.94.28.162', 4, '上海市-黄浦区', 'SP经营许可证');
INSERT INTO `comment` VALUES (1131, 242, 0, 0, '遇到一些波折，最后还是顺利办下来了', 1529889135, 4, 4, 4, '1,2,5,6,7', 1, 0, 42, '114.94.28.162', 4, '上海市-杨浦区', '电影立项拍摄(单片许可证)');
INSERT INTO `comment` VALUES (1130, 25, 0, 0, '非常热心的一位同志，细致负责。', 1530314466, 4, 4, 4, '2,6,7', 1, 0, 34, '114.94.28.162', 4, '上海市-黄浦区', '食品生产经营许可证');
INSERT INTO `comment` VALUES (1129, 27, 0, 0, '比较靠谱，很热心，人不错！', 1531059248, 4, 4, 4, '1,2,3,6,7', 1, 0, 40, '114.94.28.162', 4, '上海市-虹口区', '电影发行经营许可证');
INSERT INTO `comment` VALUES (1128, 12, 0, 0, '人很好，放心 这就足够了！', 1531813445, 4, 4, 4, '1,2,3,4,5,6', 1, 0, 39, '114.94.28.162', 4, '上海市-徐汇区', '营业性演出许可证');
INSERT INTO `comment` VALUES (1127, 242, 0, 0, '耐心解答每一个问题不错', 1530923937, 4, 4, 4, '1,5', 1, 0, 44, '114.94.28.162', 4, '上海市-青浦区', '电视剧立项拍摄(单片许可证)');
INSERT INTO `comment` VALUES (1126, 19, 0, 0, '很有耐心，很负责，沟通上也很愉快，合作体验很好！', 1531439438, 4, 4, 4, '1,2,3,4,7', 1, 0, 54, '114.94.28.162', 4, '上海市-金山区', 'ICP经营许可证');
INSERT INTO `comment` VALUES (1125, 24, 0, 0, '值得信任，值得托付业务！！！', 1533231137, 4, 4, 4, '1,3,4,5,7', 1, 0, 53, '114.94.28.162', 4, '上海市-闵行区', 'IDC经营许可证');
INSERT INTO `comment` VALUES (1124, 27, 0, 0, '服务非常周到，希望可以一直合作', 1529885679, 4, 4, 4, '1,2,4,6', 1, 0, 40, '114.94.28.162', 4, '上海市-青浦区', '电影发行经营许可证');
INSERT INTO `comment` VALUES (1123, 18, 0, 0, '做事靠谱，速度快，下次继续合作', 1531494998, 4, 4, 4, '4,6,7', 1, 0, 157, '114.94.28.162', 4, '上海市-金山区', '二类医疗器械经营许可证');
INSERT INTO `comment` VALUES (1121, 13, 0, 0, '服务非常周到，希望可以一直合作', 1532756414, 4, 4, 4, '2,7', 1, 0, 47, '114.94.28.162', 4, '上海市-松江区', '劳务派遣经营许可证');
INSERT INTO `comment` VALUES (1122, 18, 0, 0, '咨询非常认真靠谱，感谢马原！下次还选你。', 1531024946, 4, 4, 4, '2,5', 1, 0, 56, '114.94.28.162', 4, '上海市-虹口区', '呼叫中心经营许可证');
INSERT INTO `comment` VALUES (1120, 27, 0, 0, '专业耐心，合作愉快，很认真负责。', 1529392903, 4, 4, 4, '1,2,3,4,5,6', 1, 0, 57, '114.94.28.162', 4, '上海市-奉贤区', '网络文化经营许可证');
INSERT INTO `comment` VALUES (1119, 242, 0, 0, '遇到一些波折，最后还是顺利办下来了', 1533864352, 4, 4, 4, '5,6', 1, 0, 38, '114.94.28.162', 4, '上海市-闵行区', '广播电视节目制作经营许可证');
INSERT INTO `comment` VALUES (1118, 25, 0, 0, '非常热心，对于不明白的地方都会细心解说，值得信赖及推荐~', 1531743103, 4, 4, 4, '1,3,5,7', 1, 0, 38, '114.94.28.162', 4, '上海市-崇明区', '广播电视节目制作经营许可证');
INSERT INTO `comment` VALUES (1117, 26, 0, 0, '爱岗敬业 客户为宗旨 人美心善 大赞', 1532749393, 4, 4, 4, '3,4,5,6', 1, 0, 41, '114.94.28.162', 4, '上海市-奉贤区', '电影单片审查及发行许可证');
INSERT INTO `comment` VALUES (1116, 19, 0, 0, '很有耐心，很负责，沟通上也很愉快，合作体验很好！', 1531553262, 4, 4, 4, '1,6,7', 1, 0, 34, '114.94.28.162', 4, '上海市-金山区', '食品生产经营许可证');
INSERT INTO `comment` VALUES (1115, 14, 0, 0, '给力，专业度高，值得推荐', 1530123270, 4, 4, 4, '1,3,4,5,6,7', 1, 0, 54, '114.94.28.162', 4, '上海市-自贸区', 'ICP经营许可证');
INSERT INTO `comment` VALUES (1114, 29, 0, 0, '很有耐心，很负责，沟通上也很愉快，合作体验很好！', 1530144564, 4, 4, 4, '2,3', 1, 0, 41, '114.94.28.162', 4, '上海市-徐汇区', '电影单片审查及发行许可证');
INSERT INTO `comment` VALUES (1113, 24, 0, 0, '专业耐心，合作愉快，很认真负责。', 1529624156, 4, 4, 4, '6,7', 1, 0, 57, '114.94.28.162', 4, '上海市-崇明区', '网络文化经营许可证');
INSERT INTO `comment` VALUES (1112, 13, 0, 0, '服务很好，以后会一直合作下去', 1532895658, 4, 4, 4, '1,3,6', 1, 0, 53, '114.94.28.162', 4, '上海市-金山区', 'IDC经营许可证');
INSERT INTO `comment` VALUES (1110, 20, 0, 0, '专业耐心，合作愉快，很认真负责。', 1531786368, 4, 4, 4, '1,3,4,5,6,7', 1, 0, 32, '114.94.28.162', 4, '上海市-青浦区', '无船承运业务经营资格登记证');
INSERT INTO `comment` VALUES (1111, 29, 0, 0, '走心，贴心，小姑娘有前途', 1529803075, 4, 4, 4, '1,2,4,6', 1, 0, 51, '114.94.28.162', 4, '上海市-嘉定区', 'SP经营许可证');
INSERT INTO `comment` VALUES (1109, 241, 0, 0, '小王能耐心的解释我的疑问，整个过程能尽量按照我的要求来，有些我不会的他都帮我搞，愉快的合作。', 1531431890, 4, 4, 4, '1,2,3,4,5', 1, 0, 55, '114.94.28.162', 4, '上海市-徐汇区', 'EDI经营许可证');
INSERT INTO `comment` VALUES (1108, 241, 0, 0, '不错，促进办理流程认识，并懂得跟他人沟通有效结果传递。', 1533463621, 4, 4, 4, '1,3,4,5,6,7', 1, 0, 47, '114.94.28.162', 4, '上海市-嘉定区', '劳务派遣经营许可证');
INSERT INTO `comment` VALUES (1107, 21, 0, 0, '专业耐心，合作愉快，很认真负责。', 1533973495, 4, 4, 4, '1,2,3,4,5,6,7', 1, 0, 216, '114.94.28.162', 4, '上海市-普陀区', '食品经营许可证(食品)');
INSERT INTO `comment` VALUES (1106, 12, 0, 0, '非常负责，态度很好，选她没错', 1531221824, 4, 4, 4, '2,3,4,5,6,7', 1, 0, 42, '114.94.28.162', 4, '上海市-浦东新区', '电影立项拍摄(单片许可证)');
INSERT INTO `comment` VALUES (1105, 2, 0, 0, '非常负责，态度很好，选她没错', 1528932057, 4, 4, 4, '1,2,3', 1, 0, 54, '114.94.28.162', 4, '上海市-普陀区', 'ICP经营许可证');
INSERT INTO `comment` VALUES (1104, 241, 0, 0, '比想象的快！一共47天下证。', 1529517787, 4, 4, 4, '1,2,4,5,6,7', 1, 0, 49, '114.94.28.162', 4, '上海市-松江区', '进出口权许可证');
INSERT INTO `comment` VALUES (1103, 14, 0, 0, '咨询非常认真靠谱，感谢马原！下次还选你。', 1530213207, 4, 4, 4, '5,6', 1, 0, 216, '114.94.28.162', 4, '上海市-崇明区', '食品经营许可证(食品)');
INSERT INTO `comment` VALUES (1102, 25, 0, 0, '态度服务超级好，还会给一些咨询意见', 1532916100, 4, 4, 4, '1,3,4,6,7', 1, 0, 35, '114.94.28.162', 4, '上海市-闵行区', '酒类商品零售许可证');
INSERT INTO `comment` VALUES (1101, 25, 0, 0, '非常好，很专业、对客户也很负责任', 1530882445, 4, 4, 4, '1,2,3,7', 1, 0, 55, '114.94.28.162', 4, '上海市-黄浦区', 'EDI经营许可证');
INSERT INTO `comment` VALUES (1100, 20, 0, 0, '态度服务超级好，还会给一些咨询意见', 1531835061, 4, 4, 4, '3,6,7', 1, 0, 216, '114.94.28.162', 4, '上海市-奉贤区', '食品经营许可证(食品)');
INSERT INTO `comment` VALUES (1099, 20, 0, 0, '服务不错，配合的也很好', 1529267906, 4, 4, 4, '1,4,5,6,7', 1, 0, 53, '114.94.28.162', 4, '上海市-宝山区', 'IDC经营许可证');
INSERT INTO `comment` VALUES (1098, 26, 0, 0, '人很好，放心 这就足够了！', 1530715476, 4, 4, 4, '3,4,6,7', 1, 0, 55, '114.94.28.162', 4, '上海市-静安区', 'EDI经营许可证');
INSERT INTO `comment` VALUES (1097, 18, 0, 0, '态度服务超级好，还会给一些咨询意见', 1532958597, 4, 4, 4, '2,3,4,5,6,7', 1, 0, 57, '114.94.28.162', 4, '上海市-浦东新区', '网络文化经营许可证');
INSERT INTO `comment` VALUES (1095, 19, 0, 0, '一直合作多次，认真负责，有问必答。', 1532821435, 4, 4, 4, '2,4,6,7', 1, 0, 216, '114.94.28.162', 4, '上海市-自贸区', '食品经营许可证(食品)');
INSERT INTO `comment` VALUES (1096, 242, 0, 0, '耐心解答每一个问题不错', 1530315079, 4, 4, 4, '2,3,4,7', 1, 0, 158, '114.94.28.162', 4, '上海市-松江区', '三类医疗器械经营许可证');
INSERT INTO `comment` VALUES (1094, 29, 0, 0, '不错尽心尽力，很专业。', 1532422877, 4, 4, 4, '2,4,6,7', 1, 0, 33, '114.94.28.162', 4, '上海市-普陀区', '食品经营许可证(餐饮)');
INSERT INTO `comment` VALUES (1093, 13, 0, 0, '工作效率高、专业知识扎实。', 1531926910, 4, 4, 4, '1,2,3,4,7', 1, 0, 157, '114.94.28.162', 4, '上海市-自贸区', '二类医疗器械经营许可证');
INSERT INTO `comment` VALUES (1092, 19, 0, 0, '相当满意，相当满意，相当满意。', 1532707855, 4, 4, 4, '1,2,3,4,5,6,7', 1, 0, 35, '114.94.28.162', 4, '上海市-静安区', '酒类商品零售许可证');
INSERT INTO `comment` VALUES (1091, 18, 0, 0, '比想象的快！一共47天下证。', 1533084831, 4, 4, 4, '3,4,5,6,7', 1, 0, 50, '114.94.28.162', 4, '上海市-普陀区', '危险化学品经营许可证');
INSERT INTO `comment` VALUES (1090, 24, 0, 0, '服务不错，配合的也很好', 1531012922, 4, 4, 4, '2,6', 1, 0, 158, '114.94.28.162', 4, '上海市-自贸区', '三类医疗器械经营许可证');
INSERT INTO `comment` VALUES (1089, 241, 0, 0, '非常负责，态度很好，选她没错', 1532656502, 4, 4, 4, '4,7', 1, 0, 54, '114.94.28.162', 4, '上海市-浦东新区', 'ICP经营许可证');
INSERT INTO `comment` VALUES (1088, 242, 0, 0, '效率非常高，非常专业。', 1529111110, 4, 4, 4, '1,5,6,7', 1, 0, 53, '114.94.28.162', 4, '上海市-普陀区', 'IDC经营许可证');
INSERT INTO `comment` VALUES (1087, 242, 0, 0, '服务周到，热情主动，大方', 1532941945, 4, 4, 4, '1,3,5,6', 1, 0, 40, '114.94.28.162', 4, '上海市-长宁区', '电影发行经营许可证');
INSERT INTO `comment` VALUES (1086, 24, 0, 0, '伙子服务态度比较喜欢，能耐心的解答我的疑问，整个沟通的过程蛮舒服的，办事效率也很高', 1530048252, 4, 4, 4, '1,2,3,4,5,6,7', 1, 0, 35, '114.94.28.162', 4, '上海市-嘉定区', '酒类商品零售许可证');
INSERT INTO `comment` VALUES (1085, 27, 0, 0, '非常好，很专业、对客户也很负责任', 1532811844, 4, 4, 4, '1,3,7', 1, 0, 49, '114.94.28.162', 4, '上海市-嘉定区', '进出口权许可证');
INSERT INTO `comment` VALUES (1084, 27, 0, 0, '专业耐心，合作愉快，很认真负责。', 1530670579, 4, 4, 4, '1,2,3,4,5', 1, 0, 38, '114.94.28.162', 4, '上海市-奉贤区', '广播电视节目制作经营许可证');
INSERT INTO `comment` VALUES (1083, 242, 0, 0, '相当满意，相当满意，相当满意。', 1529087470, 4, 4, 4, '6,7', 1, 0, 56, '114.94.28.162', 4, '上海市-自贸区', '呼叫中心经营许可证');
INSERT INTO `comment` VALUES (1082, 29, 0, 0, '专业耐心，合作愉快，很认真负责。', 1531488007, 4, 4, 4, '1,2,4,5,6,7', 1, 0, 35, '114.94.28.162', 4, '上海市-长宁区', '酒类商品零售许可证');
INSERT INTO `comment` VALUES (1081, 24, 0, 0, '服务态度好，专业程度高，如期完成申办业务，赞！', 1530802770, 4, 4, 4, '3,5,6', 1, 0, 46, '114.94.28.162', 4, '上海市-杨浦区', '人力资源服务许可证');
INSERT INTO `comment` VALUES (1079, 241, 0, 0, '走心，贴心，小姑娘有前途', 1533255682, 4, 4, 4, '1,3,5,6,7', 1, 0, 31, '114.94.28.162', 4, '上海市-宝山区', '道路运输经营许可证');
INSERT INTO `comment` VALUES (1080, 19, 0, 0, '做事靠谱，速度快，下次继续合作', 1531652604, 4, 4, 4, '1,2,3,4,5,6,7', 1, 0, 55, '114.94.28.162', 4, '上海市-杨浦区', 'EDI经营许可证');
INSERT INTO `comment` VALUES (1078, 13, 0, 0, '相当满意，相当满意，相当满意。', 1530058441, 4, 4, 4, '1,2,3,4,5,6,7', 1, 0, 38, '114.94.28.162', 4, '上海市-青浦区', '广播电视节目制作经营许可证');
INSERT INTO `comment` VALUES (1077, 18, 0, 0, '服务周到，热情主动，大方', 1529973096, 4, 4, 4, '1,2,3,4,5,6,7', 1, 0, 53, '114.94.28.162', 4, '上海市-杨浦区', 'IDC经营许可证');
INSERT INTO `comment` VALUES (1076, 27, 0, 0, '比较靠谱，很热心，人不错！', 1531951652, 4, 4, 4, '4,7', 1, 0, 52, '114.94.28.162', 4, '上海市-长宁区', 'ISP经营许可证');
INSERT INTO `comment` VALUES (1075, 26, 0, 0, '非常热心的一位同志，细致负责。', 1533270987, 4, 4, 4, '2,3,4,5,7', 1, 0, 46, '114.94.28.162', 4, '上海市-静安区', '人力资源服务许可证');
INSERT INTO `comment` VALUES (1074, 20, 0, 0, '工作效率高、专业知识扎实。', 1532712369, 4, 4, 4, '1,2,3,4,5,6,7', 1, 0, 34, '114.94.28.162', 4, '上海市-松江区', '食品生产经营许可证');
INSERT INTO `comment` VALUES (1073, 13, 0, 0, '值得信任，值得托付业务！！！', 1533319523, 4, 4, 4, '1,2,3,5,6,7', 1, 0, 46, '114.94.28.162', 4, '上海市-静安区', '人力资源服务许可证');
INSERT INTO `comment` VALUES (1072, 22, 0, 0, '耐心解答每一个问题不错', 1532624850, 4, 4, 4, '1,2,3,4,5,6,7', 1, 0, 36, '114.94.28.162', 4, '上海市-金山区', '酒类商品批发许可证');
INSERT INTO `comment` VALUES (1071, 24, 0, 0, '工作效率高、专业知识扎实。', 1533849152, 4, 4, 4, '1,2,3,4,7', 1, 0, 55, '114.94.28.162', 4, '上海市-自贸区', 'EDI经营许可证');
INSERT INTO `comment` VALUES (1070, 18, 0, 0, '不错，促进办理流程认识，并懂得跟他人沟通有效结果传递。', 1533649535, 4, 4, 4, '2,3,4,5,6,7', 1, 0, 40, '114.94.28.162', 4, '上海市-奉贤区', '电影发行经营许可证');
INSERT INTO `comment` VALUES (1069, 241, 0, 0, '站在客户的角度很敬业，加油小伙子', 1529976818, 4, 4, 4, '2,4,6', 1, 0, 54, '114.94.28.162', 4, '上海市-黄浦区', 'ICP经营许可证');
INSERT INTO `comment` VALUES (1068, 13, 0, 0, '再次选择，依然没有失望，办的很好，非常感谢', 1529287558, 4, 4, 4, '1,2,3,4,6,7', 1, 0, 52, '114.94.28.162', 4, '上海市-奉贤区', 'ISP经营许可证');
INSERT INTO `comment` VALUES (1067, 2, 0, 0, '非常热心的一位同志，细致负责。', 1533631757, 4, 4, 4, '1,6,7', 1, 0, 57, '114.94.28.162', 4, '上海市-虹口区', '网络文化经营许可证');
INSERT INTO `comment` VALUES (1066, 28, 0, 0, '爱岗敬业 客户为宗旨 人美心善 大赞', 1533334992, 4, 4, 4, '3,4,5', 1, 0, 50, '114.94.28.162', 4, '上海市-金山区', '危险化学品经营许可证');
INSERT INTO `comment` VALUES (1065, 241, 0, 0, '非常热心，对于不明白的地方都会细心解说，值得信赖及推荐~', 1530808035, 4, 4, 4, '1,2,3,5,6,7', 1, 0, 50, '114.94.28.162', 4, '上海市-静安区', '危险化学品经营许可证');
INSERT INTO `comment` VALUES (1064, 28, 0, 0, '一直合作多次，认真负责，有问必答。', 1531626742, 4, 4, 4, '1,2,3,4,5,7', 1, 0, 54, '114.94.28.162', 4, '上海市-青浦区', 'ICP经营许可证');
INSERT INTO `comment` VALUES (1063, 24, 0, 0, '非常负责，态度很好，选她没错', 1532877221, 4, 4, 4, '2,3,7', 1, 0, 52, '114.94.28.162', 4, '上海市-虹口区', 'ISP经营许可证');
INSERT INTO `comment` VALUES (1062, 25, 0, 0, '很有耐心，很负责，沟通上也很愉快，合作体验很好！', 1529327493, 4, 4, 4, '2,5,7', 1, 0, 50, '114.94.28.162', 4, '上海市-浦东新区', '危险化学品经营许可证');
INSERT INTO `comment` VALUES (1061, 19, 0, 0, '非常棒！很专业，给我们做了详尽的答疑解惑，支持，好评！', 1531131658, 4, 4, 4, '1,2,4,6,7', 1, 0, 53, '114.94.28.162', 4, '上海市-金山区', 'IDC经营许可证');
INSERT INTO `comment` VALUES (1060, 24, 0, 0, '服务态度好，专业程度高，如期完成申办业务，赞！', 1530728802, 4, 4, 4, '1,2,3,4,5,6,7', 1, 0, 45, '114.94.28.162', 4, '上海市-青浦区', '广播电视视频点播业务经营许可证(乙种)');
INSERT INTO `comment` VALUES (1059, 26, 0, 0, '给力，专业度高，值得推荐', 1530707777, 4, 4, 4, '2,3,4,5,6,7', 1, 0, 36, '114.94.28.162', 4, '上海市-金山区', '酒类商品批发许可证');
INSERT INTO `comment` VALUES (1058, 24, 0, 0, '人很好，放心 这就足够了！', 1530955694, 4, 4, 4, '1,2,3,4', 1, 0, 36, '114.94.28.162', 4, '上海市-虹口区', '酒类商品批发许可证');
INSERT INTO `comment` VALUES (1057, 241, 0, 0, '态度服务超级好，还会给一些咨询意见', 1530133835, 4, 4, 4, '1,3,4,5,6,7', 1, 0, 51, '114.94.28.162', 4, '上海市-闵行区', 'SP经营许可证');
INSERT INTO `comment` VALUES (1055, 13, 0, 0, '', 1531786281, 5, 5, 5, '1,5', 1, 0, 95, '114.94.28.162', 5, '上海市-青浦区', '高新企业认定高级套餐');
INSERT INTO `comment` VALUES (1056, 20, 0, 0, '伙子服务态度比较喜欢，能耐心的解答我的疑问，整个沟通的过程蛮舒服的，办事效率也很高', 1529348861, 4, 4, 4, '1,2,5,6,7', 1, 0, 54, '114.94.28.162', 4, '上海市-虹口区', 'ICP经营许可证');
INSERT INTO `comment` VALUES (1054, 22, 0, 0, '', 1529818477, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 93, '114.94.28.162', 5, '上海市-虹口区', 'OHSAS18001职业健康与安全管理体系认证');
INSERT INTO `comment` VALUES (1053, 25, 0, 0, '', 1529505555, 5, 5, 5, '1,2,4,5', 1, 0, 93, '114.94.28.162', 5, '上海市-长宁区', 'OHSAS18001职业健康与安全管理体系认证');
INSERT INTO `comment` VALUES (1052, 242, 0, 0, '', 1530740090, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 93, '114.94.28.162', 5, '上海市-静安区', 'OHSAS18001职业健康与安全管理体系认证');
INSERT INTO `comment` VALUES (1050, 12, 0, 0, '', 1532222582, 5, 5, 5, '3,4,6,7', 1, 0, 95, '114.94.28.162', 5, '上海市-金山区', '高新企业认定高级套餐');
INSERT INTO `comment` VALUES (1051, 21, 0, 0, '', 1533094897, 5, 5, 5, '1,2,4,7', 1, 0, 90, '114.94.28.162', 5, '上海市-普陀区', 'ISO14001环境管理体系认证');
INSERT INTO `comment` VALUES (1049, 26, 0, 0, '', 1533378629, 5, 5, 5, '4,5,7', 1, 0, 94, '114.94.28.162', 5, '上海市-自贸区', '高新企业认定标准套餐');
INSERT INTO `comment` VALUES (1048, 12, 0, 0, '', 1531298904, 5, 5, 5, '2,3,4,5,6,7', 1, 0, 95, '114.94.28.162', 5, '上海市-虹口区', '高新企业认定高级套餐');
INSERT INTO `comment` VALUES (1047, 241, 0, 0, '', 1529931322, 5, 5, 5, '3,5', 1, 0, 88, '114.94.28.162', 5, '上海市-黄浦区', '国外商品条形码');
INSERT INTO `comment` VALUES (1046, 27, 0, 0, '', 1531728311, 5, 5, 5, '2,3,4,5,6,7', 1, 0, 94, '114.94.28.162', 5, '上海市-虹口区', '高新企业认定标准套餐');
INSERT INTO `comment` VALUES (1045, 20, 0, 0, '', 1529489675, 5, 5, 5, '1,3,4,5,6,7', 1, 0, 91, '114.94.28.162', 5, '上海市-长宁区', 'ISO27001信息管理安全认证');
INSERT INTO `comment` VALUES (1044, 18, 0, 0, '', 1529570084, 5, 5, 5, '3,6', 1, 0, 87, '114.94.28.162', 5, '上海市-嘉定区', '国内商品条形码');
INSERT INTO `comment` VALUES (1043, 2, 0, 0, '', 1532155946, 5, 5, 5, '1,4,6', 1, 0, 92, '114.94.28.162', 5, '上海市-静安区', 'ISO22000食品安全管理体系认证');
INSERT INTO `comment` VALUES (1042, 20, 0, 0, '', 1531118635, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 93, '114.94.28.162', 5, '上海市-静安区', 'OHSAS18001职业健康与安全管理体系认证');
INSERT INTO `comment` VALUES (1041, 18, 0, 0, '', 1532816303, 5, 5, 5, '1,4,5,6,7', 1, 0, 95, '114.94.28.162', 5, '上海市-崇明区', '高新企业认定高级套餐');
INSERT INTO `comment` VALUES (1040, 13, 0, 0, '', 1530511647, 5, 5, 5, '1,2,4,5,6', 1, 0, 93, '114.94.28.162', 5, '上海市-长宁区', 'OHSAS18001职业健康与安全管理体系认证');
INSERT INTO `comment` VALUES (1038, 14, 0, 0, '', 1532363377, 5, 5, 5, '2,5', 1, 0, 87, '114.94.28.162', 5, '上海市-长宁区', '国内商品条形码');
INSERT INTO `comment` VALUES (1039, 2, 0, 0, '', 1532927762, 5, 5, 5, '6,7', 1, 0, 93, '114.94.28.162', 5, '上海市-静安区', 'OHSAS18001职业健康与安全管理体系认证');
INSERT INTO `comment` VALUES (1037, 18, 0, 0, '', 1532152423, 5, 5, 5, '2,3,4,7', 1, 0, 91, '114.94.28.162', 5, '上海市-嘉定区', 'ISO27001信息管理安全认证');
INSERT INTO `comment` VALUES (1036, 29, 0, 0, '', 1529876493, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 88, '114.94.28.162', 5, '上海市-青浦区', '国外商品条形码');
INSERT INTO `comment` VALUES (1035, 13, 0, 0, '', 1532732093, 5, 5, 5, '1,2,3,4,5,6', 1, 0, 89, '114.94.28.162', 5, '上海市-徐汇区', 'ISO9001质量体系管理认证');
INSERT INTO `comment` VALUES (1034, 24, 0, 0, '', 1533481853, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 95, '114.94.28.162', 5, '上海市-金山区', '高新企业认定高级套餐');
INSERT INTO `comment` VALUES (1032, 18, 0, 0, '', 1531176287, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 92, '114.94.28.162', 5, '上海市-崇明区', 'ISO22000食品安全管理体系认证');
INSERT INTO `comment` VALUES (1033, 21, 0, 0, '', 1531723710, 5, 5, 5, '2,3,4,7', 1, 0, 95, '114.94.28.162', 5, '上海市-金山区', '高新企业认定高级套餐');
INSERT INTO `comment` VALUES (1031, 14, 0, 0, '', 1531482179, 5, 5, 5, '1,2,4,5,7', 1, 0, 90, '114.94.28.162', 5, '上海市-奉贤区', 'ISO14001环境管理体系认证');
INSERT INTO `comment` VALUES (1030, 22, 0, 0, '', 1530363588, 5, 5, 5, '1,2,4', 1, 0, 95, '114.94.28.162', 5, '上海市-青浦区', '高新企业认定高级套餐');
INSERT INTO `comment` VALUES (1028, 26, 0, 0, '', 1528995066, 5, 5, 5, '1,6', 1, 0, 94, '114.94.28.162', 5, '上海市-松江区', '高新企业认定标准套餐');
INSERT INTO `comment` VALUES (1029, 19, 0, 0, '', 1529419378, 5, 5, 5, '3,6,7', 1, 0, 87, '114.94.28.162', 5, '上海市-奉贤区', '国内商品条形码');
INSERT INTO `comment` VALUES (1026, 14, 0, 0, '', 1531990857, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 88, '114.94.28.162', 5, '上海市-崇明区', '国外商品条形码');
INSERT INTO `comment` VALUES (1027, 18, 0, 0, '', 1529245471, 5, 5, 5, '1,5,6,7', 1, 0, 94, '114.94.28.162', 5, '上海市-松江区', '高新企业认定标准套餐');
INSERT INTO `comment` VALUES (1025, 26, 0, 0, '', 1533434095, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 93, '114.94.28.162', 5, '上海市-浦东新区', 'OHSAS18001职业健康与安全管理体系认证');
INSERT INTO `comment` VALUES (1023, 12, 0, 0, '', 1530660413, 5, 5, 5, '1,5', 1, 0, 90, '114.94.28.162', 5, '上海市-金山区', 'ISO14001环境管理体系认证');
INSERT INTO `comment` VALUES (1024, 26, 0, 0, '', 1530612443, 5, 5, 5, '1,2,4,5,6,7', 1, 0, 87, '114.94.28.162', 5, '上海市-金山区', '国内商品条形码');
INSERT INTO `comment` VALUES (1022, 27, 0, 0, '', 1533322978, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 87, '114.94.28.162', 5, '上海市-松江区', '国内商品条形码');
INSERT INTO `comment` VALUES (1020, 2, 0, 0, '', 1531008845, 5, 5, 5, '1,2,3,4,5,6', 1, 0, 92, '114.94.28.162', 5, '上海市-崇明区', 'ISO22000食品安全管理体系认证');
INSERT INTO `comment` VALUES (1021, 14, 0, 0, '', 1531126894, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 95, '114.94.28.162', 5, '上海市-长宁区', '高新企业认定高级套餐');
INSERT INTO `comment` VALUES (1019, 27, 0, 0, '', 1533923096, 5, 5, 5, '1,3', 1, 0, 90, '114.94.28.162', 5, '上海市-杨浦区', 'ISO14001环境管理体系认证');
INSERT INTO `comment` VALUES (1018, 28, 0, 0, '', 1528997119, 5, 5, 5, '1,2,3,5,6,7', 1, 0, 87, '114.94.28.162', 5, '上海市-浦东新区', '国内商品条形码');
INSERT INTO `comment` VALUES (1017, 27, 0, 0, '', 1530323853, 5, 5, 5, '2,3,4,5,6', 1, 0, 88, '114.94.28.162', 5, '上海市-浦东新区', '国外商品条形码');
INSERT INTO `comment` VALUES (1016, 242, 0, 0, '', 1532430276, 5, 5, 5, '1,3,4,5,6,7', 1, 0, 90, '114.94.28.162', 5, '上海市-虹口区', 'ISO14001环境管理体系认证');
INSERT INTO `comment` VALUES (1015, 22, 0, 0, '', 1534002975, 5, 5, 5, '1,2,3,4,6,7', 1, 0, 90, '114.94.28.162', 5, '上海市-嘉定区', 'ISO14001环境管理体系认证');
INSERT INTO `comment` VALUES (1013, 14, 0, 0, '', 1533131948, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 90, '114.94.28.162', 5, '上海市-崇明区', 'ISO14001环境管理体系认证');
INSERT INTO `comment` VALUES (1014, 18, 0, 0, '', 1529574680, 5, 5, 5, '3,5,7', 1, 0, 95, '114.94.28.162', 5, '上海市-嘉定区', '高新企业认定高级套餐');
INSERT INTO `comment` VALUES (1012, 18, 0, 0, '', 1529321168, 5, 5, 5, '1,2,3,4,7', 1, 0, 92, '114.94.28.162', 5, '上海市-闵行区', 'ISO22000食品安全管理体系认证');
INSERT INTO `comment` VALUES (1011, 22, 0, 0, '', 1529599273, 5, 5, 5, '1,2,3,7', 1, 0, 87, '114.94.28.162', 5, '上海市-徐汇区', '国内商品条形码');
INSERT INTO `comment` VALUES (1010, 18, 0, 0, '', 1531992383, 5, 5, 5, '1,2,5,7', 1, 0, 95, '114.94.28.162', 5, '上海市-嘉定区', '高新企业认定高级套餐');
INSERT INTO `comment` VALUES (1009, 25, 0, 0, '', 1530092577, 5, 5, 5, '1,3,6', 1, 0, 94, '114.94.28.162', 5, '上海市-杨浦区', '高新企业认定标准套餐');
INSERT INTO `comment` VALUES (1008, 18, 0, 0, '', 1533034361, 5, 5, 5, '3,5', 1, 0, 94, '114.94.28.162', 5, '上海市-黄浦区', '高新企业认定标准套餐');
INSERT INTO `comment` VALUES (1006, 25, 0, 0, '', 1531740248, 5, 5, 5, '1,5,7', 1, 0, 89, '114.94.28.162', 5, '上海市-长宁区', 'ISO9001质量体系管理认证');
INSERT INTO `comment` VALUES (1007, 25, 0, 0, '', 1529843549, 5, 5, 5, '1,2,5,7', 1, 0, 92, '114.94.28.162', 5, '上海市-黄浦区', 'ISO22000食品安全管理体系认证');
INSERT INTO `comment` VALUES (1005, 242, 0, 0, '', 1532461982, 5, 5, 5, '1,2,4,5,7', 1, 0, 90, '114.94.28.162', 5, '上海市-杨浦区', 'ISO14001环境管理体系认证');
INSERT INTO `comment` VALUES (1003, 25, 0, 0, '', 1530332780, 5, 5, 5, '1,3,4,5,6,7', 1, 0, 95, '114.94.28.162', 5, '上海市-嘉定区', '高新企业认定高级套餐');
INSERT INTO `comment` VALUES (1004, 26, 0, 0, '', 1530270116, 5, 5, 5, '2,3,4,5,6,7', 1, 0, 88, '114.94.28.162', 5, '上海市-崇明区', '国外商品条形码');
INSERT INTO `comment` VALUES (1002, 241, 0, 0, '', 1529177174, 5, 5, 5, '1,2,5,6', 1, 0, 93, '114.94.28.162', 5, '上海市-自贸区', 'OHSAS18001职业健康与安全管理体系认证');
INSERT INTO `comment` VALUES (1001, 26, 0, 0, '', 1532840209, 5, 5, 5, '2,5,6', 1, 0, 94, '114.94.28.162', 5, '上海市-静安区', '高新企业认定标准套餐');
INSERT INTO `comment` VALUES (1000, 28, 0, 0, '', 1531394342, 5, 5, 5, '3,4', 1, 0, 89, '114.94.28.162', 5, '上海市-闵行区', 'ISO9001质量体系管理认证');
INSERT INTO `comment` VALUES (999, 29, 0, 0, '', 1530027577, 5, 5, 5, '1,3,4,5,6,7', 1, 0, 88, '114.94.28.162', 5, '上海市-嘉定区', '国外商品条形码');
INSERT INTO `comment` VALUES (998, 14, 0, 0, '', 1533686369, 5, 5, 5, '2,3', 1, 0, 94, '114.94.28.162', 5, '上海市-自贸区', '高新企业认定标准套餐');
INSERT INTO `comment` VALUES (997, 19, 0, 0, '', 1531260159, 5, 5, 5, '1,2,4,5,7', 1, 0, 93, '114.94.28.162', 5, '上海市-杨浦区', 'OHSAS18001职业健康与安全管理体系认证');
INSERT INTO `comment` VALUES (996, 27, 0, 0, '', 1530836683, 5, 5, 5, '3,4,5,6,7', 1, 0, 95, '114.94.28.162', 5, '上海市-金山区', '高新企业认定高级套餐');
INSERT INTO `comment` VALUES (995, 26, 0, 0, '', 1530471520, 5, 5, 5, '1,2,3,5,6,7', 1, 0, 94, '114.94.28.162', 5, '上海市-静安区', '高新企业认定标准套餐');
INSERT INTO `comment` VALUES (994, 26, 0, 0, '', 1530452860, 5, 5, 5, '3,5', 1, 0, 90, '114.94.28.162', 5, '上海市-黄浦区', 'ISO14001环境管理体系认证');
INSERT INTO `comment` VALUES (993, 241, 0, 0, '', 1530316313, 5, 5, 5, '3,7', 1, 0, 93, '114.94.28.162', 5, '上海市-自贸区', 'OHSAS18001职业健康与安全管理体系认证');
INSERT INTO `comment` VALUES (992, 24, 0, 0, '', 1533940641, 5, 5, 5, '1,7', 1, 0, 94, '114.94.28.162', 5, '上海市-徐汇区', '高新企业认定标准套餐');
INSERT INTO `comment` VALUES (991, 18, 0, 0, '', 1532642232, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 91, '114.94.28.162', 5, '上海市-自贸区', 'ISO27001信息管理安全认证');
INSERT INTO `comment` VALUES (989, 25, 0, 0, '', 1529723233, 5, 5, 5, '2,3,4,5,7', 1, 0, 93, '114.94.28.162', 5, '上海市-崇明区', 'OHSAS18001职业健康与安全管理体系认证');
INSERT INTO `comment` VALUES (990, 28, 0, 0, '', 1531272416, 5, 5, 5, '1,2,4,7', 1, 0, 93, '114.94.28.162', 5, '上海市-崇明区', 'OHSAS18001职业健康与安全管理体系认证');
INSERT INTO `comment` VALUES (988, 29, 0, 0, '', 1530229646, 5, 5, 5, '1,2,3,5,6', 1, 0, 92, '114.94.28.162', 5, '上海市-奉贤区', 'ISO22000食品安全管理体系认证');
INSERT INTO `comment` VALUES (986, 20, 0, 0, '', 1533872084, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 87, '114.94.28.162', 5, '上海市-徐汇区', '国内商品条形码');
INSERT INTO `comment` VALUES (987, 12, 0, 0, '', 1531055657, 5, 5, 5, '2,3,4', 1, 0, 87, '114.94.28.162', 5, '上海市-普陀区', '国内商品条形码');
INSERT INTO `comment` VALUES (985, 242, 0, 0, '', 1532287534, 5, 5, 5, '3,4,6,7', 1, 0, 90, '114.94.28.162', 5, '上海市-嘉定区', 'ISO14001环境管理体系认证');
INSERT INTO `comment` VALUES (984, 29, 0, 0, '', 1533467619, 5, 5, 5, '3,4,5,6,7', 1, 0, 91, '114.94.28.162', 5, '上海市-金山区', 'ISO27001信息管理安全认证');
INSERT INTO `comment` VALUES (983, 29, 0, 0, '', 1531507582, 5, 5, 5, '1,2,3,5,6,7', 1, 0, 87, '114.94.28.162', 5, '上海市-徐汇区', '国内商品条形码');
INSERT INTO `comment` VALUES (982, 21, 0, 0, '', 1532470041, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 91, '114.94.28.162', 5, '上海市-宝山区', 'ISO27001信息管理安全认证');
INSERT INTO `comment` VALUES (981, 18, 0, 0, '', 1529637646, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 88, '114.94.28.162', 5, '上海市-嘉定区', '国外商品条形码');
INSERT INTO `comment` VALUES (980, 19, 0, 0, '', 1529939728, 5, 5, 5, '3,5,6,7', 1, 0, 89, '114.94.28.162', 5, '上海市-松江区', 'ISO9001质量体系管理认证');
INSERT INTO `comment` VALUES (979, 26, 0, 0, '', 1531151315, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 93, '114.94.28.162', 5, '上海市-杨浦区', 'OHSAS18001职业健康与安全管理体系认证');
INSERT INTO `comment` VALUES (978, 29, 0, 0, '', 1534086652, 5, 5, 5, '1,7', 1, 0, 93, '114.94.28.162', 5, '上海市-宝山区', 'OHSAS18001职业健康与安全管理体系认证');
INSERT INTO `comment` VALUES (977, 27, 0, 0, '', 1534140156, 5, 5, 5, '1,3,7', 1, 0, 92, '114.94.28.162', 5, '上海市-青浦区', 'ISO22000食品安全管理体系认证');
INSERT INTO `comment` VALUES (976, 2, 0, 0, '', 1530050340, 5, 5, 5, '2,4,5', 1, 0, 88, '114.94.28.162', 5, '上海市-普陀区', '国外商品条形码');
INSERT INTO `comment` VALUES (975, 19, 0, 0, '', 1532502838, 5, 5, 5, '2,3,4,6', 1, 0, 94, '114.94.28.162', 5, '上海市-金山区', '高新企业认定标准套餐');
INSERT INTO `comment` VALUES (973, 27, 0, 0, '', 1533434141, 5, 5, 5, '1,2,3', 1, 0, 88, '114.94.28.162', 5, '上海市-宝山区', '国外商品条形码');
INSERT INTO `comment` VALUES (974, 19, 0, 0, '', 1533510116, 5, 5, 5, '1,4,5', 1, 0, 95, '114.94.28.162', 5, '上海市-闵行区', '高新企业认定高级套餐');
INSERT INTO `comment` VALUES (972, 242, 0, 0, '', 1529404610, 5, 5, 5, '3,4,5', 1, 0, 91, '114.94.28.162', 5, '上海市-自贸区', 'ISO27001信息管理安全认证');
INSERT INTO `comment` VALUES (971, 13, 0, 0, '', 1532182007, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 93, '114.94.28.162', 5, '上海市-徐汇区', 'OHSAS18001职业健康与安全管理体系认证');
INSERT INTO `comment` VALUES (970, 26, 0, 0, '', 1530773356, 5, 5, 5, '1,2,3,4,6,7', 1, 0, 87, '114.94.28.162', 5, '上海市-静安区', '国内商品条形码');
INSERT INTO `comment` VALUES (969, 24, 0, 0, '', 1534013395, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 92, '114.94.28.162', 5, '上海市-静安区', 'ISO22000食品安全管理体系认证');
INSERT INTO `comment` VALUES (968, 12, 0, 0, '', 1530690532, 5, 5, 5, '2,3,5', 1, 0, 89, '114.94.28.162', 5, '上海市-杨浦区', 'ISO9001质量体系管理认证');
INSERT INTO `comment` VALUES (967, 27, 0, 0, '', 1528896138, 5, 5, 5, '1,2,3,4,5', 1, 0, 94, '114.94.28.162', 5, '上海市-杨浦区', '高新企业认定标准套餐');
INSERT INTO `comment` VALUES (966, 28, 0, 0, '', 1534129403, 5, 5, 5, '4,6', 1, 0, 95, '114.94.28.162', 5, '上海市-松江区', '高新企业认定高级套餐');
INSERT INTO `comment` VALUES (965, 24, 0, 0, '', 1529639431, 5, 5, 5, '1,2,3,4,6', 1, 0, 92, '114.94.28.162', 5, '上海市-长宁区', 'ISO22000食品安全管理体系认证');
INSERT INTO `comment` VALUES (964, 27, 0, 0, '', 1531637267, 5, 5, 5, '2,4,5,6', 1, 0, 92, '114.94.28.162', 5, '上海市-普陀区', 'ISO22000食品安全管理体系认证');
INSERT INTO `comment` VALUES (963, 13, 0, 0, '', 1531708476, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 87, '114.94.28.162', 5, '上海市-金山区', '国内商品条形码');
INSERT INTO `comment` VALUES (962, 27, 0, 0, '', 1531735831, 5, 5, 5, '1,3,4,5,6,7', 1, 0, 94, '114.94.28.162', 5, '上海市-自贸区', '高新企业认定标准套餐');
INSERT INTO `comment` VALUES (961, 14, 0, 0, '', 1531853468, 5, 5, 5, '1,3,4,5,7', 1, 0, 89, '114.94.28.162', 5, '上海市-金山区', 'ISO9001质量体系管理认证');
INSERT INTO `comment` VALUES (960, 2, 0, 0, '', 1529569446, 5, 5, 5, '1,2,3', 1, 0, 91, '114.94.28.162', 5, '上海市-浦东新区', 'ISO27001信息管理安全认证');
INSERT INTO `comment` VALUES (959, 12, 0, 0, '', 1533612025, 5, 5, 5, '2,3,5,7', 1, 0, 91, '114.94.28.162', 5, '上海市-静安区', 'ISO27001信息管理安全认证');
INSERT INTO `comment` VALUES (958, 28, 0, 0, '', 1533715600, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 87, '114.94.28.162', 5, '上海市-自贸区', '国内商品条形码');
INSERT INTO `comment` VALUES (957, 29, 0, 0, '', 1530735331, 5, 5, 5, '1,2,3,4,6,7', 1, 0, 87, '114.94.28.162', 5, '上海市-杨浦区', '国内商品条形码');
INSERT INTO `comment` VALUES (956, 12, 0, 0, '', 1530391170, 5, 5, 5, '1,2,4,5,6,7', 1, 0, 91, '114.94.28.162', 5, '上海市-自贸区', 'ISO27001信息管理安全认证');
INSERT INTO `comment` VALUES (955, 28, 0, 0, '服务很到位，建议做的也很合理', 1531217379, 5, 5, 5, '1,3,4,5,6,7', 1, 0, 117, '114.94.28.162', 5, '上海市-杨浦区', '开票量(20份以下)');
INSERT INTO `comment` VALUES (954, 29, 0, 0, '服务很好，很专业。后期会继续合作', 1532979961, 5, 5, 5, '2,4,5,6', 1, 0, 121, '114.94.28.162', 5, '上海市-松江区', '开票量(50份以下)');
INSERT INTO `comment` VALUES (953, 28, 0, 0, '服务态度好，热情，很有亲和力，实用高效，有耐心。', 1531290881, 5, 5, 5, '1,3,4,5,6,7', 1, 0, 134, '114.94.28.162', 5, '上海市-黄浦区', '5000万以上(具体金额*0.01%)');
INSERT INTO `comment` VALUES (952, 241, 0, 0, '一直都很喜欢这家公司，跟一般公司相比，年轻有活力，还很专业', 1532965295, 5, 5, 5, '4,5,6,7', 1, 0, 26, '114.94.28.162', 5, '上海市-松江区', '所得税清缴汇算');
INSERT INTO `comment` VALUES (951, 25, 0, 0, '服务周到 实用高效 感觉好喜欢他 实用高效长得还挺帅', 1530256574, 5, 5, 5, '2,4,6,7', 1, 0, 130, '114.94.28.162', 5, '上海市-黄浦区', '50-100万');
INSERT INTO `comment` VALUES (950, 14, 0, 0, '专业、认真、负责，很不错的一群年轻人。', 1530877078, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 120, '114.94.28.162', 5, '上海市-闵行区', '开票量(20份以下)');
INSERT INTO `comment` VALUES (949, 27, 0, 0, '签过之后 还没办对公那边会计基本每天都打电话跟我确认时间去开对公 不错', 1532366695, 5, 5, 5, '6,7', 1, 0, 132, '114.94.28.162', 5, '上海市-徐汇区', '300-600万');
INSERT INTO `comment` VALUES (948, 19, 0, 0, '专业度很高，以后回介绍客户继续', 1533287765, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 138, '114.94.28.162', 5, '上海市-静安区', '1000万以下');
INSERT INTO `comment` VALUES (947, 24, 0, 0, '服务还可以，以后有朋友需要还会介绍', 1530337246, 5, 5, 5, '1,4,5,6,7', 1, 0, 138, '114.94.28.162', 5, '上海市-虹口区', '1000万以下');
INSERT INTO `comment` VALUES (946, 241, 0, 0, '很好的回答每一个问题，因为所有创业者都不容易，需要专业平台帮解决实际问题，希望合作愉快！', 1531909265, 5, 5, 5, '2,4,5,6,7', 1, 0, 140, '114.94.28.162', 5, '上海市-宝山区', '5000万以上(具体金额*0.2%)');
INSERT INTO `comment` VALUES (945, 22, 0, 0, '合作时间马上1年了，一直跟踪很到位', 1530126970, 5, 5, 5, '2,4,5,6,7', 1, 0, 140, '114.94.28.162', 5, '上海市-青浦区', '5000万以上(具体金额*0.2%)');
INSERT INTO `comment` VALUES (944, 20, 0, 0, '非常棒， 一直信赖贵司。 谢谢。', 1533644151, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 126, '114.94.28.162', 5, '上海市-自贸区', '发票增版/量');
INSERT INTO `comment` VALUES (943, 28, 0, 0, '問題隨時問的都得到了解決，感覺很有耐心，希望合作愉快', 1533250180, 5, 5, 5, '3,4,6', 1, 0, 132, '114.94.28.162', 5, '上海市-奉贤区', '300-600万');
INSERT INTO `comment` VALUES (942, 19, 0, 0, '非常细心认真负责十分专业细心长的帅耐心负责', 1531452221, 5, 5, 5, '1,3,4,6,7', 1, 0, 131, '114.94.28.162', 5, '上海市-青浦区', '100-300万');
INSERT INTO `comment` VALUES (941, 21, 0, 0, '为人非常好，也很专业，尽心尽责地帮客户排忧解难，非常推荐他的服务', 1532304310, 5, 5, 5, '2,4,5,6', 1, 0, 125, '114.94.28.162', 5, '上海市-宝山区', '发票代购');
INSERT INTO `comment` VALUES (940, 29, 0, 0, '不错 每月账目很清晰', 1529056694, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 125, '114.94.28.162', 5, '上海市-杨浦区', '发票代购');
INSERT INTO `comment` VALUES (939, 19, 0, 0, '不错 快法务这个平台的服务非常好', 1533627531, 5, 5, 5, '2,3,4,5,6,7', 1, 0, 135, '114.94.28.162', 5, '上海市-自贸区', '1000万以上(具体金额*0.01%)');
INSERT INTO `comment` VALUES (938, 20, 0, 0, '主动热情 办事效率高效服务周到', 1530273193, 5, 5, 5, '2,3,4,5,6,7', 1, 0, 139, '114.94.28.162', 5, '上海市-长宁区', '1000万以上(具体金额*0.3%)');
INSERT INTO `comment` VALUES (937, 18, 0, 0, '挺好的，尽职尽责，会计也好说话', 1533005892, 5, 5, 5, '3,4,5,7', 1, 0, 136, '114.94.28.162', 5, '上海市-虹口区', '1亿元以上(具体金额*0.01%)');
INSERT INTO `comment` VALUES (936, 28, 0, 0, '不错 快法务这个平台的服务非常好', 1529076414, 5, 5, 5, '1,2,3,5,6', 1, 0, 139, '114.94.28.162', 5, '上海市-奉贤区', '1000万以上(具体金额*0.3%)');
INSERT INTO `comment` VALUES (935, 25, 0, 0, '一家不错的公司，希望继续保持，可以长期合作。', 1531219248, 5, 5, 5, '1,4,5,6', 1, 0, 123, '114.94.28.162', 5, '上海市-自贸区', '税控设备购置');
INSERT INTO `comment` VALUES (934, 26, 0, 0, '不错不错 办事效率高到没话说 来交接东西的人很有耐心 长的还好看', 1532036769, 5, 5, 5, '1,5', 1, 0, 138, '114.94.28.162', 5, '上海市-黄浦区', '1000万以下');
INSERT INTO `comment` VALUES (933, 18, 0, 0, '效率快，不厌其烦解答。我终于决定与你们合作。', 1531780659, 5, 5, 5, '2,3,7', 1, 0, 137, '114.94.28.162', 5, '上海市-崇明区', '500万以下');
INSERT INTO `comment` VALUES (932, 2, 0, 0, '不错 人很好 态度很好 服务更好', 1529275678, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 26, '114.94.28.162', 5, '上海市-自贸区', '所得税清缴汇算');
INSERT INTO `comment` VALUES (931, 12, 0, 0, '一如既往的好,一如既往的好.', 1531144085, 5, 5, 5, '1,2,6', 1, 0, 139, '114.94.28.162', 5, '上海市-金山区', '1000万以上(具体金额*0.3%)');
INSERT INTO `comment` VALUES (930, 241, 0, 0, '业务小伙子态度可以，比之前合作的代账要正规些', 1531639491, 5, 5, 5, '1,2,3,4,6,7', 1, 0, 124, '114.94.28.162', 5, '上海市-静安区', '税种核定');
INSERT INTO `comment` VALUES (929, 242, 0, 0, '服务很好，专业性强！值得信赖', 1530672062, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 140, '114.94.28.162', 5, '上海市-黄浦区', '5000万以上(具体金额*0.2%)');
INSERT INTO `comment` VALUES (928, 25, 0, 0, '一个朋友介绍的，感觉还可以，小伙子人不错', 1531075233, 5, 5, 5, '1,4,6', 1, 0, 26, '114.94.28.162', 5, '上海市-长宁区', '所得税清缴汇算');
INSERT INTO `comment` VALUES (927, 26, 0, 0, '服务态度好，办事效率，响应速度快，专业程度高，服务周到', 1531715694, 5, 5, 5, '2,4,5,6,7', 1, 0, 129, '114.94.28.162', 5, '上海市-奉贤区', '50万以下');
INSERT INTO `comment` VALUES (926, 20, 0, 0, '专业服务态度好，很有亲和力', 1529695406, 5, 5, 5, '1,4,5', 1, 0, 117, '114.94.28.162', 5, '上海市-崇明区', '开票量(20份以下)');
INSERT INTO `comment` VALUES (925, 18, 0, 0, '专业、而且很负责任，很热情的回答我的问题', 1532247300, 5, 5, 5, '2,3,4,6', 1, 0, 136, '114.94.28.162', 5, '上海市-金山区', '1亿元以上(具体金额*0.01%)');
INSERT INTO `comment` VALUES (924, 24, 0, 0, '完全满足需求，响应很及时', 1533887683, 5, 5, 5, '4,5,6', 1, 0, 116, '114.94.28.162', 5, '上海市-嘉定区', '零申报');
INSERT INTO `comment` VALUES (923, 241, 0, 0, '非常专业，工作态度很好，回复及时，效率', 1533980630, 5, 5, 5, '1,3,4,5,7', 1, 0, 133, '114.94.28.162', 5, '上海市-自贸区', '600-1000万');
INSERT INTO `comment` VALUES (922, 242, 0, 0, '挺好的，尽职尽责，会计也好说话', 1530649428, 5, 5, 5, '1,3', 1, 0, 120, '114.94.28.162', 5, '上海市-自贸区', '开票量(20份以下)');
INSERT INTO `comment` VALUES (921, 26, 0, 0, '服务态度好，办事效率高，响应速度，专业高', 1532517733, 5, 5, 5, '1,3,4,5,7', 1, 0, 124, '114.94.28.162', 5, '上海市-浦东新区', '税种核定');
INSERT INTO `comment` VALUES (920, 19, 0, 0, '方便快捷、专业程度高、安全放心、一家很不错的公司。', 1530803051, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 129, '114.94.28.162', 5, '上海市-松江区', '50万以下');
INSERT INTO `comment` VALUES (919, 18, 0, 0, '注册公司竟然5天就拿到执照了，牛', 1533137465, 5, 5, 5, '2,5,7', 1, 0, 138, '114.94.28.162', 5, '上海市-浦东新区', '1000万以下');
INSERT INTO `comment` VALUES (918, 14, 0, 0, '問題隨時問的都得到了解決，感覺很有耐心，希望合作愉快', 1532003740, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 125, '114.94.28.162', 5, '上海市-自贸区', '发票代购');
INSERT INTO `comment` VALUES (917, 26, 0, 0, '对于这种平台我们很放心，服务很周到', 1531885308, 5, 5, 5, '1,2,3,5,6,7', 1, 0, 136, '114.94.28.162', 5, '上海市-金山区', '1亿元以上(具体金额*0.01%)');
INSERT INTO `comment` VALUES (916, 26, 0, 0, '服务周到 实用高效 感觉好喜欢他 实用高效长得还挺帅', 1530190267, 5, 5, 5, '2,3,4,5,6,7', 1, 0, 124, '114.94.28.162', 5, '上海市-长宁区', '税种核定');
INSERT INTO `comment` VALUES (915, 26, 0, 0, '不善言辞，但是很务实的一个人', 1533725892, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 116, '114.94.28.162', 5, '上海市-青浦区', '零申报');
INSERT INTO `comment` VALUES (914, 14, 0, 0, '对于这种平台我们很放心，服务很周到', 1532243046, 5, 5, 5, '1,2,3,4,5,7', 1, 0, 132, '114.94.28.162', 5, '上海市-杨浦区', '300-600万');
INSERT INTO `comment` VALUES (913, 26, 0, 0, '服务好，效率高，专业度高，点赞，会持续支持的', 1529270915, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 140, '114.94.28.162', 5, '上海市-普陀区', '5000万以上(具体金额*0.2%)');
INSERT INTO `comment` VALUES (912, 13, 0, 0, '专业，敬业，热情，讲解很详细', 1533689263, 5, 5, 5, '1,4,5,6', 1, 0, 118, '114.94.28.162', 5, '上海市-自贸区', '开票量(50份以下)');
INSERT INTO `comment` VALUES (911, 2, 0, 0, '好服务，好服务，好服务，真心不错', 1528948921, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 120, '114.94.28.162', 5, '上海市-浦东新区', '开票量(20份以下)');
INSERT INTO `comment` VALUES (910, 2, 0, 0, '效率非常高，一直都是请她帮忙，非常细心！', 1533614852, 5, 5, 5, '1,2,6', 1, 0, 121, '114.94.28.162', 5, '上海市-静安区', '开票量(50份以下)');
INSERT INTO `comment` VALUES (909, 19, 0, 0, '非常细心认真负责十分专业细心长的帅耐心负责', 1533466927, 5, 5, 5, '2,3,4,5,6,7', 1, 0, 122, '114.94.28.162', 5, '上海市-嘉定区', '税控设备购置及税种核定');
INSERT INTO `comment` VALUES (908, 29, 0, 0, '服务很好，很满意，这是做好最快的服务质量', 1529012770, 5, 5, 5, '1,2,4,5,6', 1, 0, 133, '114.94.28.162', 5, '上海市-浦东新区', '600-1000万');
INSERT INTO `comment` VALUES (907, 29, 0, 0, '时间快', 1533882850, 5, 5, 5, '1,3,5', 1, 0, 134, '114.94.28.162', 5, '上海市-宝山区', '5000万以上(具体金额*0.01%)');
INSERT INTO `comment` VALUES (906, 12, 0, 0, '問題隨時問的都得到了解決，感覺很有耐心，希望合作愉快', 1530172772, 5, 5, 5, '3,6,7', 1, 0, 122, '114.94.28.162', 5, '上海市-普陀区', '税控设备购置及税种核定');
INSERT INTO `comment` VALUES (905, 241, 0, 0, '价格实惠，性价比高，最主要真专业！', 1533833986, 5, 5, 5, '2,3,4,7', 1, 0, 125, '114.94.28.162', 5, '上海市-金山区', '发票代购');
INSERT INTO `comment` VALUES (904, 27, 0, 0, '专业度很高，以后回介绍客户继续', 1532268616, 5, 5, 5, '1,3,4,5,7', 1, 0, 122, '114.94.28.162', 5, '上海市-普陀区', '税控设备购置及税种核定');
INSERT INTO `comment` VALUES (903, 20, 0, 0, '业务能力强大，服务态度非常好', 1529359759, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 121, '114.94.28.162', 5, '上海市-奉贤区', '开票量(50份以下)');
INSERT INTO `comment` VALUES (902, 22, 0, 0, '一如既往的好,一如既往的好.', 1532595470, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 123, '114.94.28.162', 5, '上海市-松江区', '税控设备购置');
INSERT INTO `comment` VALUES (901, 25, 0, 0, '为人非常好，也很专业，尽心尽责地帮客户排忧解难，非常推荐他的服务', 1531655919, 5, 5, 5, '3,5,6,7', 1, 0, 117, '114.94.28.162', 5, '上海市-杨浦区', '开票量(20份以下)');
INSERT INTO `comment` VALUES (900, 19, 0, 0, '业务能力强大，服务态度非常好', 1531286130, 5, 5, 5, '2,5,7', 1, 0, 134, '114.94.28.162', 5, '上海市-松江区', '5000万以上(具体金额*0.01%)');
INSERT INTO `comment` VALUES (899, 14, 0, 0, '服务很热情，其他公司会计太一般了，问了问题都答不上来，安会计专业度不错，问题能及时解决，值得选择，当下就直接合作了', 1530125914, 5, 5, 5, '6,7', 1, 0, 135, '114.94.28.162', 5, '上海市-黄浦区', '1000万以上(具体金额*0.01%)');
INSERT INTO `comment` VALUES (898, 21, 0, 0, '不错 每月账目很清晰', 1529941114, 5, 5, 5, '4,6,7', 1, 0, 127, '114.94.28.162', 5, '上海市-嘉定区', '税控器解锁');
INSERT INTO `comment` VALUES (897, 241, 0, 0, '非常细心认真负责十分专业细心长的帅耐心负责', 1532256742, 5, 5, 5, '1,4,6', 1, 0, 131, '114.94.28.162', 5, '上海市-静安区', '100-300万');
INSERT INTO `comment` VALUES (896, 28, 0, 0, '人好服务号，安全省心 到报税期都按时打电话提醒 很细心 真不错', 1533673771, 5, 5, 5, '2,3,6', 1, 0, 124, '114.94.28.162', 5, '上海市-青浦区', '税种核定');
INSERT INTO `comment` VALUES (895, 14, 0, 0, '效率快，不厌其烦解答。我终于决定与你们合作。', 1533449748, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 124, '114.94.28.162', 5, '上海市-浦东新区', '税种核定');
INSERT INTO `comment` VALUES (894, 14, 0, 0, '很愉快的一次合作 办事人员很NICE', 1532139528, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 138, '114.94.28.162', 5, '上海市-浦东新区', '1000万以下');
INSERT INTO `comment` VALUES (893, 242, 0, 0, '会介绍朋友过来哟', 1529053474, 5, 5, 5, '1,2,4,7', 1, 0, 130, '114.94.28.162', 5, '上海市-杨浦区', '50-100万');
INSERT INTO `comment` VALUES (892, 12, 0, 0, '一个朋友介绍的，感觉还可以，小伙子人不错', 1529408449, 5, 5, 5, '1,2,6', 1, 0, 121, '114.94.28.162', 5, '上海市-长宁区', '开票量(50份以下)');
INSERT INTO `comment` VALUES (891, 19, 0, 0, '效率快，不厌其烦解答。我终于决定与你们合作。', 1532225994, 5, 5, 5, '1,2,3,4,5,6', 1, 0, 126, '114.94.28.162', 5, '上海市-嘉定区', '发票增版/量');
INSERT INTO `comment` VALUES (890, 21, 0, 0, '非常专业，工作态度很好，回复及时，效率', 1529885794, 5, 5, 5, '3,5', 1, 0, 130, '114.94.28.162', 5, '上海市-静安区', '50-100万');
INSERT INTO `comment` VALUES (889, 26, 0, 0, '一个朋友介绍的，感觉还可以，小伙子人不错', 1532180150, 5, 5, 5, '4,5', 1, 0, 131, '114.94.28.162', 5, '上海市-虹口区', '100-300万');
INSERT INTO `comment` VALUES (888, 12, 0, 0, '非常专业，工作态度很好，回复及时，效率', 1533547472, 5, 5, 5, '1,2,4,6', 1, 0, 136, '114.94.28.162', 5, '上海市-静安区', '1亿元以上(具体金额*0.01%)');
INSERT INTO `comment` VALUES (887, 29, 0, 0, '服务周到 实用高效 感觉好喜欢他 实用高效长得还挺帅', 1533336761, 5, 5, 5, '2,3,5', 1, 0, 119, '114.94.28.162', 5, '上海市-崇明区', '零申报');
INSERT INTO `comment` VALUES (886, 22, 0, 0, '效率快，不厌其烦解答。我终于决定与你们合作。', 1533012752, 5, 5, 5, '1,2,5,7', 1, 0, 136, '114.94.28.162', 5, '上海市-青浦区', '1亿元以上(具体金额*0.01%)');
INSERT INTO `comment` VALUES (885, 2, 0, 0, '效率非常高，一直都是请她帮忙，非常细心！', 1531923155, 5, 5, 5, '2,4,5,6,7', 1, 0, 117, '114.94.28.162', 5, '上海市-金山区', '开票量(20份以下)');
INSERT INTO `comment` VALUES (884, 19, 0, 0, '会计非常热情主动的沟通，让我对财税更加了解，非常好', 1531089862, 5, 5, 5, '2,3,4,5,6,7', 1, 0, 132, '114.94.28.162', 5, '上海市-自贸区', '300-600万');
INSERT INTO `comment` VALUES (883, 24, 0, 0, '会计非常热情主动的沟通，让我对财税更加了解，非常好', 1530531049, 5, 5, 5, '1,2,3,4,7', 1, 0, 118, '114.94.28.162', 5, '上海市-杨浦区', '开票量(50份以下)');
INSERT INTO `comment` VALUES (882, 241, 0, 0, '年轻人的团队，有激情，有活力，发展空间很大，合作很放心', 1534022318, 5, 5, 5, '2,7', 1, 0, 118, '114.94.28.162', 5, '上海市-松江区', '开票量(50份以下)');
INSERT INTO `comment` VALUES (881, 14, 0, 0, '好服务，好服务，好服务，真心不错', 1529040486, 5, 5, 5, '5,6', 1, 0, 138, '114.94.28.162', 5, '上海市-闵行区', '1000万以下');
INSERT INTO `comment` VALUES (880, 14, 0, 0, '主动热情 办事效率高效服务周到', 1531326689, 5, 5, 5, '4,7', 1, 0, 137, '114.94.28.162', 5, '上海市-徐汇区', '500万以下');
INSERT INTO `comment` VALUES (879, 26, 0, 0, '这是一个很智能安全高效能控制企业风险的好平台', 1530931517, 5, 5, 5, '4,6', 1, 0, 125, '114.94.28.162', 5, '上海市-长宁区', '发票代购');
INSERT INTO `comment` VALUES (878, 20, 0, 0, '一个电话就解决问题了，小姑娘办事效率挺高的。有客户推荐还会找你们合作', 1530275386, 5, 5, 5, '2,7', 1, 0, 120, '114.94.28.162', 5, '上海市-普陀区', '开票量(20份以下)');
INSERT INTO `comment` VALUES (877, 25, 0, 0, '会计非常热情主动的沟通，让我对财税更加了解，非常好', 1530251804, 5, 5, 5, '1,3,4,5,7', 1, 0, 124, '114.94.28.162', 5, '上海市-嘉定区', '税种核定');
INSERT INTO `comment` VALUES (876, 20, 0, 0, '服务态度好，热情，很有亲和力，实用高效，有耐心。', 1531827722, 5, 5, 5, '1,2,4,5,6,7', 1, 0, 117, '114.94.28.162', 5, '上海市-崇明区', '开票量(20份以下)');
INSERT INTO `comment` VALUES (875, 13, 0, 0, '小边很热情，非常有耐心和责任心。会计团队的服务也很周到 效率高。非常不错 很满意', 1532859533, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 124, '114.94.28.162', 5, '上海市-宝山区', '税种核定');
INSERT INTO `comment` VALUES (874, 20, 0, 0, '办事认真负责，有时候我自己都不急的时候他们比我还急，说明很认真负责，不会拿了钱就跑路，用心在做，很喜欢，我会续费的', 1530115839, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 123, '114.94.28.162', 5, '上海市-浦东新区', '税控设备购置');
INSERT INTO `comment` VALUES (873, 13, 0, 0, '人好服务号，安全省心 到报税期都按时打电话提醒 很细心 真不错', 1533249673, 5, 5, 5, '5,6,7', 1, 0, 121, '114.94.28.162', 5, '上海市-自贸区', '开票量(50份以下)');
INSERT INTO `comment` VALUES (872, 29, 0, 0, '主动热情，很有亲和力，办事靠谱。', 1533958920, 5, 5, 5, '1,2,3,4,6', 1, 0, 121, '114.94.28.162', 5, '上海市-徐汇区', '开票量(50份以下)');
INSERT INTO `comment` VALUES (871, 2, 0, 0, '完全满足需求，响应很及时', 1533145833, 5, 5, 5, '2,4,6', 1, 0, 129, '114.94.28.162', 5, '上海市-松江区', '50万以下');
INSERT INTO `comment` VALUES (870, 24, 0, 0, '为人非常好，也很专业，尽心尽责地帮客户排忧解难，非常推荐他的服务', 1534162805, 5, 5, 5, '3,5,6', 1, 0, 139, '114.94.28.162', 5, '上海市-宝山区', '1000万以上(具体金额*0.3%)');
INSERT INTO `comment` VALUES (869, 26, 0, 0, '問題隨時問的都得到了解決，感覺很有耐心，希望合作愉快', 1533072614, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 137, '114.94.28.162', 5, '上海市-金山区', '500万以下');
INSERT INTO `comment` VALUES (868, 27, 0, 0, '非常专业，工作态度很好，回复及时，效率', 1531201802, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 126, '114.94.28.162', 5, '上海市-闵行区', '发票增版/量');
INSERT INTO `comment` VALUES (867, 24, 0, 0, '服务态度好效率好，有耐心，靠谱', 1531497940, 5, 5, 5, '1,4', 1, 0, 130, '114.94.28.162', 5, '上海市-自贸区', '50-100万');
INSERT INTO `comment` VALUES (866, 29, 0, 0, '始于缘分和需求，忠于专业和服务，期待愉快之合作！', 1529778167, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 121, '114.94.28.162', 5, '上海市-崇明区', '开票量(50份以下)');
INSERT INTO `comment` VALUES (865, 29, 0, 0, '很好的回答每一个问题，因为所有创业者都不容易，需要专业平台帮解决实际问题，希望合作愉快！', 1533851131, 5, 5, 5, '3,5', 1, 0, 133, '114.94.28.162', 5, '上海市-普陀区', '600-1000万');
INSERT INTO `comment` VALUES (864, 2, 0, 0, '不错 人很好 态度很好 服务更好', 1529441425, 5, 5, 5, '1,3,4,5,6,7', 1, 0, 131, '114.94.28.162', 5, '上海市-金山区', '100-300万');
INSERT INTO `comment` VALUES (863, 26, 0, 0, '专业、认真、负责，很不错的一群年轻人。', 1532926225, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 139, '114.94.28.162', 5, '上海市-普陀区', '1000万以上(具体金额*0.3%)');
INSERT INTO `comment` VALUES (862, 28, 0, 0, '服务很好，会计很专业，也能及时回答我的一些疑问。', 1532973579, 5, 5, 5, '3,4,5', 1, 0, 134, '114.94.28.162', 5, '上海市-杨浦区', '5000万以上(具体金额*0.01%)');
INSERT INTO `comment` VALUES (861, 13, 0, 0, '服务周到 实用高效 感觉好喜欢他 实用高效长得还挺帅', 1531590443, 5, 5, 5, '1,2,4,7', 1, 0, 116, '114.94.28.162', 5, '上海市-奉贤区', '零申报');
INSERT INTO `comment` VALUES (860, 14, 0, 0, '时间快', 1530083875, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 125, '114.94.28.162', 5, '上海市-徐汇区', '发票代购');
INSERT INTO `comment` VALUES (859, 29, 0, 0, '服务很热情，其他公司会计太一般了，问了问题都答不上来，安会计专业度不错，问题能及时解决，值得选择，当下就直接合作了', 1531111839, 5, 5, 5, '1,3,5,6', 1, 0, 135, '114.94.28.162', 5, '上海市-金山区', '1000万以上(具体金额*0.01%)');
INSERT INTO `comment` VALUES (858, 28, 0, 0, '主动热情，很有亲和力，办事靠谱。', 1532905970, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 122, '114.94.28.162', 5, '上海市-徐汇区', '税控设备购置及税种核定');
INSERT INTO `comment` VALUES (857, 242, 0, 0, '非常细心认真负责十分专业细心长的帅耐心负责', 1531620763, 5, 5, 5, '4,5', 1, 0, 124, '114.94.28.162', 5, '上海市-杨浦区', '税种核定');
INSERT INTO `comment` VALUES (856, 2, 0, 0, '小边很热情，非常有耐心和责任心。会计团队的服务也很周到 效率高。非常不错 很满意', 1531340735, 5, 5, 5, '1,2,3,4,6,7', 1, 0, 137, '114.94.28.162', 5, '上海市-静安区', '500万以下');
INSERT INTO `comment` VALUES (855, 28, 0, 0, '挺好的，非常敬业，很快就办好了，不错。', 1531280735, 5, 5, 5, '1,3,4,5', 1, 0, 113, '114.94.28.162', 5, '上海市-杨浦区', '本区地址变更');
INSERT INTO `comment` VALUES (854, 24, 0, 0, '这个注册过程还是蛮顺利的，谢谢', 1532410759, 5, 5, 5, '1,2,3,4,5,6', 1, 0, 10, '114.94.28.162', 5, '上海市-奉贤区', '股权变更');
INSERT INTO `comment` VALUES (853, 13, 0, 0, '很专业 有问必答 给他们做这些很放心。', 1533493496, 5, 5, 5, '2,3,4,5,6,7', 1, 0, 12, '114.94.28.162', 5, '上海市-静安区', '经营范围变更');
INSERT INTO `comment` VALUES (852, 26, 0, 0, '漂亮声音还好听做事认真知心姐姐特别有耐心', 1533234079, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 114, '114.94.28.162', 5, '上海市-徐汇区', '跨区地址变更');
INSERT INTO `comment` VALUES (851, 26, 0, 0, '超出预期，低调还特别有效率，赞一个', 1530029563, 5, 5, 5, '3,6', 1, 0, 219, '114.94.28.162', 5, '上海市-青浦区', '法人一证通办理');
INSERT INTO `comment` VALUES (850, 2, 0, 0, '良好的服务和专业水准保证了业务的顺利办理', 1529980662, 5, 5, 5, '1,2,4,5', 1, 0, 113, '114.94.28.162', 5, '上海市-闵行区', '本区地址变更');
INSERT INTO `comment` VALUES (849, 241, 0, 0, '关键同志，的确服务比较好，专业内容做得好，强烈推荐', 1533867569, 5, 5, 5, '1,4,5', 1, 0, 15, '114.94.28.162', 5, '上海市-静安区', '一般注销');
INSERT INTO `comment` VALUES (848, 241, 0, 0, '注册公司很块，中间的流程都办的请清楚楚，没有浪费一分时间，1280元', 1529550202, 5, 5, 5, '2,3,4,5,7', 1, 0, 12, '114.94.28.162', 5, '上海市-普陀区', '经营范围变更');
INSERT INTO `comment` VALUES (847, 29, 0, 0, '超出预期，低调还特别有效率，赞一个', 1533971994, 5, 5, 5, '1,2,3,5,6,7', 1, 0, 2, '114.94.28.162', 5, '上海市-青浦区', '股份有限公司注册');
INSERT INTO `comment` VALUES (846, 24, 0, 0, '挺好的，非常敬业，很快就办好了，不错。', 1530030972, 5, 5, 5, '1,3,4,5,7', 1, 0, 2, '114.94.28.162', 5, '上海市-金山区', '股份有限公司注册');
INSERT INTO `comment` VALUES (845, 22, 0, 0, '服务细心，非常专业，能切实解决问题，推荐！', 1533005539, 5, 5, 5, '3,6', 1, 0, 6, '114.94.28.162', 5, '上海市-青浦区', '办事处注册');
INSERT INTO `comment` VALUES (844, 242, 0, 0, '很专业，服务很热情周到，效率很高', 1533444954, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 19, '114.94.28.162', 5, '上海市-宝山区', '开设银行基本户');
INSERT INTO `comment` VALUES (843, 18, 0, 0, '好，质素高，人老实，服务好', 1533004744, 5, 5, 5, '1,2,3,4,5', 1, 0, 115, '114.94.28.162', 5, '上海市-闵行区', '跨市地址变更');
INSERT INTO `comment` VALUES (842, 19, 0, 0, '非常好 本人有很多相关知识都不懂 问了很多问题 回答都很及时', 1532438116, 5, 5, 5, '1,2,4,6,7', 1, 0, 1, '114.94.28.162', 5, '上海市-虹口区', '有限公司注册');
INSERT INTO `comment` VALUES (841, 19, 0, 0, '诚信踏实非常专业', 1533178681, 5, 5, 5, '2,4,5,7', 1, 0, 10, '114.94.28.162', 5, '上海市-自贸区', '股权变更');
INSERT INTO `comment` VALUES (840, 21, 0, 0, '对这次服务非常满意，之前已在这个网站注册过公司，现在介绍朋友来，朋友评价不错。', 1531033690, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 6, '114.94.28.162', 5, '上海市-奉贤区', '办事处注册');
INSERT INTO `comment` VALUES (839, 25, 0, 0, '办事效率高，主动热情', 1529260550, 5, 5, 5, '1,6,7', 1, 0, 220, '114.94.28.162', 5, '上海市-嘉定区', '社保开户');
INSERT INTO `comment` VALUES (838, 241, 0, 0, '非常迅速，反馈也很及时，没想到这么快办完了。非常满意的一次服务', 1529190031, 5, 5, 5, '2,5,7', 1, 0, 2, '114.94.28.162', 5, '上海市-普陀区', '股份有限公司注册');
INSERT INTO `comment` VALUES (837, 24, 0, 0, '挺讲信用的，不错的代办公司，以后长期合作。', 1529613664, 5, 5, 5, '1,2,7', 1, 0, 2, '114.94.28.162', 5, '上海市-自贸区', '股份有限公司注册');
INSERT INTO `comment` VALUES (835, 22, 0, 0, '关键同志，的确服务比较好，专业内容做得好，强烈推荐', 1529075653, 5, 5, 5, '3,4,5,6', 1, 0, 115, '114.94.28.162', 5, '上海市-虹口区', '跨市地址变更');
INSERT INTO `comment` VALUES (836, 22, 0, 0, '合作很愉快！服务态度好专业程度高', 1529508241, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 111, '114.94.28.162', 5, '上海市-青浦区', '字号变更');
INSERT INTO `comment` VALUES (834, 12, 0, 0, '很有责任心，专业热情，有问必答，真的很有耐心，我有好多不了解的事情Dear耐心帮我解答，32个赞！！！！', 1533818252, 5, 5, 5, '1,3,4,6,7', 1, 0, 11, '114.94.28.162', 5, '上海市-宝山区', '法人变更');
INSERT INTO `comment` VALUES (833, 18, 0, 0, '挺好的，非常敬业，很快就办好了，不错。', 1531550905, 5, 5, 5, '4,6', 1, 0, 219, '114.94.28.162', 5, '上海市-杨浦区', '法人一证通办理');
INSERT INTO `comment` VALUES (832, 242, 0, 0, '比较诚恳，做事效率比较高，专业性也不错，交给他们做很放心', 1529763904, 5, 5, 5, '2,3,4,5,6,7', 1, 0, 3, '114.94.28.162', 5, '上海市-虹口区', '外商独资公司注册');
INSERT INTO `comment` VALUES (831, 20, 0, 0, '积极配合帮助我们想办法解决注册、银行开户中的各种问题，谢谢。下次注册还找你们', 1530690884, 5, 5, 5, '1,2,5,6,7', 1, 0, 115, '114.94.28.162', 5, '上海市-虹口区', '跨市地址变更');
INSERT INTO `comment` VALUES (830, 2, 0, 0, '还不错 可是我自己找会计了', 1533024245, 5, 5, 5, '2,6,7', 1, 0, 10, '114.94.28.162', 5, '上海市-静安区', '股权变更');
INSERT INTO `comment` VALUES (829, 25, 0, 0, '态度非常好，人很耐心，有亲和力，有问必答，服务很周到。', 1532222213, 5, 5, 5, '2,3,4,5,6,7', 1, 0, 115, '114.94.28.162', 5, '上海市-杨浦区', '跨市地址变更');
INSERT INTO `comment` VALUES (828, 12, 0, 0, '超预期的服务体验，大力推荐。以后我们公司业务就找你了。蒸蒸日上哦', 1531729490, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 17, '114.94.28.162', 5, '上海市-杨浦区', '五证合一');
INSERT INTO `comment` VALUES (826, 13, 0, 0, '服务质量很好，时间也在正常中', 1530578524, 5, 5, 5, '1,2,3,4', 1, 0, 220, '114.94.28.162', 5, '上海市-嘉定区', '社保开户');
INSERT INTO `comment` VALUES (827, 28, 0, 0, '一周内办完流程和手续，专业度高', 1529525569, 5, 5, 5, '1,2,7', 1, 0, 115, '114.94.28.162', 5, '上海市-崇明区', '跨市地址变更');
INSERT INTO `comment` VALUES (825, 20, 0, 0, '业务能力强 办事利索 快', 1533422121, 5, 5, 5, '4,5', 1, 0, 6, '114.94.28.162', 5, '上海市-自贸区', '办事处注册');
INSERT INTO `comment` VALUES (824, 19, 0, 0, '合作得挺愉快，希望之后还有机会合作。', 1533735142, 5, 5, 5, '1,2,3,5,6', 1, 0, 1, '114.94.28.162', 5, '上海市-普陀区', '有限公司注册');
INSERT INTO `comment` VALUES (823, 2, 0, 0, '办事细心，业务很熟悉，做事认真负责', 1531980457, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 221, '114.94.28.162', 5, '上海市-崇明区', '公积金开户');
INSERT INTO `comment` VALUES (821, 20, 0, 0, '挺好的，非常敬业，很快就办好了，不错。', 1533443117, 5, 5, 5, '1,2,4,5,6,7', 1, 0, 7, '114.94.28.162', 5, '上海市-崇明区', '个体商户注册');
INSERT INTO `comment` VALUES (822, 20, 0, 0, '办事效率高，很专业，值得信赖', 1531476582, 5, 5, 5, '1,2,3,5,6,7', 1, 0, 13, '114.94.28.162', 5, '上海市-黄浦区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (820, 14, 0, 0, '服务好，任何进度第一时间跟踪，同步，感谢···还望下次有机会再次合作···', 1532996395, 5, 5, 5, '5,7', 1, 0, 13, '114.94.28.162', 5, '上海市-徐汇区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (819, 21, 0, 0, '很有责任心，专业热情，有问必答，真的很有耐心，我有好多不了解的事情Dear耐心帮我解答，32个赞！！！！', 1532867527, 5, 5, 5, '1,3,6,7', 1, 0, 19, '114.94.28.162', 5, '上海市-普陀区', '开设银行基本户');
INSERT INTO `comment` VALUES (818, 13, 0, 0, '比较诚恳，做事效率比较高，专业性也不错，交给他们做很放心', 1533185073, 5, 5, 5, '1,2,3,4,6,7', 1, 0, 19, '114.94.28.162', 5, '上海市-静安区', '开设银行基本户');
INSERT INTO `comment` VALUES (817, 242, 0, 0, '很好 办事细腻认真', 1532384709, 5, 5, 5, '5,6', 1, 0, 112, '114.94.28.162', 5, '上海市-宝山区', '行业名称变更');
INSERT INTO `comment` VALUES (816, 241, 0, 0, '一周内办完流程和手续，专业度高', 1532104862, 5, 5, 5, '1,3,5,7', 1, 0, 19, '114.94.28.162', 5, '上海市-浦东新区', '开设银行基本户');
INSERT INTO `comment` VALUES (815, 22, 0, 0, '很专业，对待客户的问题细致耐心，赞', 1533524186, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 11, '114.94.28.162', 5, '上海市-静安区', '法人变更');
INSERT INTO `comment` VALUES (814, 28, 0, 0, '非常好 本人有很多相关知识都不懂 问了很多问题 回答都很及时', 1530958786, 5, 5, 5, '2,4,5', 1, 0, 113, '114.94.28.162', 5, '上海市-宝山区', '本区地址变更');
INSERT INTO `comment` VALUES (813, 26, 0, 0, '真心不错，随时响应，快，且为客户着想', 1529002246, 5, 5, 5, '4,6,7', 1, 0, 5, '114.94.28.162', 5, '上海市-普陀区', '分公司注册');
INSERT INTO `comment` VALUES (812, 13, 0, 0, '很感谢两位，公司注册好了，沟通很顺畅，服务很到位，希望下次继续合作。', 1533358818, 5, 5, 5, '2,5', 1, 0, 219, '114.94.28.162', 5, '上海市-嘉定区', '法人一证通办理');
INSERT INTO `comment` VALUES (811, 25, 0, 0, '还不错 可是我自己找会计了', 1531772232, 5, 5, 5, '1,2,3,7', 1, 0, 18, '114.94.28.162', 5, '上海市-青浦区', '工商解异常');
INSERT INTO `comment` VALUES (810, 21, 0, 0, '现在想想还是蛮不错的，当时自己太急躁了！', 1530420549, 5, 5, 5, '3,5', 1, 0, 19, '114.94.28.162', 5, '上海市-静安区', '开设银行基本户');
INSERT INTO `comment` VALUES (809, 13, 0, 0, '合作得挺愉快，希望之后还有机会合作。', 1531913712, 5, 5, 5, '2,5', 1, 0, 115, '114.94.28.162', 5, '上海市-普陀区', '跨市地址变更');
INSERT INTO `comment` VALUES (808, 28, 0, 0, '还不错 可是我自己找会计了', 1530662422, 5, 5, 5, '1,3,5', 1, 0, 16, '114.94.28.162', 5, '上海市-浦东新区', '年报公示');
INSERT INTO `comment` VALUES (807, 2, 0, 0, '很感谢两位，公司注册好了，沟通很顺畅，服务很到位，希望下次继续合作。', 1533118505, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 7, '114.94.28.162', 5, '上海市-长宁区', '个体商户注册');
INSERT INTO `comment` VALUES (806, 24, 0, 0, '服务很好，很周到，有问必答，为客户着想，效率很高，合作很愉快', 1530704059, 5, 5, 5, '1,2,4,5,7', 1, 0, 1, '114.94.28.162', 5, '上海市-松江区', '有限公司注册');
INSERT INTO `comment` VALUES (805, 19, 0, 0, '合作很愉快！服务态度好专业程度高', 1533829820, 5, 5, 5, '2,7', 1, 0, 14, '114.94.28.162', 5, '上海市-徐汇区', '简易注销');
INSERT INTO `comment` VALUES (804, 18, 0, 0, '满意，省心省力～', 1530372944, 5, 5, 5, '1,4,7', 1, 0, 3, '114.94.28.162', 5, '上海市-奉贤区', '外商独资公司注册');
INSERT INTO `comment` VALUES (803, 21, 0, 0, '办事效率还是挺高的，也很会为客户着想。', 1534002101, 5, 5, 5, '6,7', 1, 0, 113, '114.94.28.162', 5, '上海市-崇明区', '本区地址变更');
INSERT INTO `comment` VALUES (802, 13, 0, 0, '还不错 可是我自己找会计了', 1529538725, 5, 5, 5, '1,6', 1, 0, 1, '114.94.28.162', 5, '上海市-宝山区', '有限公司注册');
INSERT INTO `comment` VALUES (801, 14, 0, 0, '一气呵成，服务周到，值得推荐', 1533868068, 5, 5, 5, '1,2,3,4,7', 1, 0, 15, '114.94.28.162', 5, '上海市-长宁区', '一般注销');
INSERT INTO `comment` VALUES (800, 25, 0, 0, '不错，办事效率挺高，沟通到位，回复及时', 1533927758, 5, 5, 5, '1,2,6', 1, 0, 6, '114.94.28.162', 5, '上海市-杨浦区', '办事处注册');
INSERT INTO `comment` VALUES (799, 24, 0, 0, '业务熟练，态度温和，比较认真负责', 1529545979, 5, 5, 5, '1,5,6,7', 1, 0, 112, '114.94.28.162', 5, '上海市-闵行区', '行业名称变更');
INSERT INTO `comment` VALUES (798, 20, 0, 0, '合作很愉快！服务态度好专业程度高', 1532680662, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 111, '114.94.28.162', 5, '上海市-浦东新区', '字号变更');
INSERT INTO `comment` VALUES (797, 29, 0, 0, '现在想想还是蛮不错的，当时自己太急躁了！', 1532220780, 5, 5, 5, '2,3,4,5,6,7', 1, 0, 115, '114.94.28.162', 5, '上海市-普陀区', '跨市地址变更');
INSERT INTO `comment` VALUES (796, 26, 0, 0, '為人民服務 不忘初心 继续前进', 1529319126, 5, 5, 5, '1,2', 1, 0, 16, '114.94.28.162', 5, '上海市-宝山区', '年报公示');
INSERT INTO `comment` VALUES (795, 20, 0, 0, '因为要实地注册地址，所以遇到一些麻烦，但是还是非常耐心的帮忙询问，且在原本预计的时间之内拿到营业执照，还是非常感谢的。', 1530997179, 5, 5, 5, '1,2,5,7', 1, 0, 5, '114.94.28.162', 5, '上海市-杨浦区', '分公司注册');
INSERT INTO `comment` VALUES (794, 25, 0, 0, '良好的服务和专业水准保证了业务的顺利办理', 1529389437, 5, 5, 5, '5,7', 1, 0, 15, '114.94.28.162', 5, '上海市-杨浦区', '一般注销');
INSERT INTO `comment` VALUES (793, 28, 0, 0, '办事效率高，主动热情', 1531309031, 5, 5, 5, '2,4,5,6', 1, 0, 13, '114.94.28.162', 5, '上海市-崇明区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (791, 27, 0, 0, '办事速度快，靠谱，非常专业，后期会一直合作。', 1530797917, 5, 5, 5, '1,3,4,5,6', 1, 0, 18, '114.94.28.162', 5, '上海市-静安区', '工商解异常');
INSERT INTO `comment` VALUES (792, 13, 0, 0, '不错，我让我朋友也来这里做，挺负责不错，专业水平也够', 1533106863, 5, 5, 5, '1,2,3,4,6', 1, 0, 16, '114.94.28.162', 5, '上海市-宝山区', '年报公示');
INSERT INTO `comment` VALUES (790, 13, 0, 0, '很好，满足预期，专业。', 1532204742, 5, 5, 5, '1,2,3,4,6,7', 1, 0, 220, '114.94.28.162', 5, '上海市-金山区', '社保开户');
INSERT INTO `comment` VALUES (789, 25, 0, 0, '服务很好，很细致很周到.', 1529554295, 5, 5, 5, '1,3,4,5', 1, 0, 15, '114.94.28.162', 5, '上海市-宝山区', '一般注销');
INSERT INTO `comment` VALUES (788, 22, 0, 0, '服务细心，非常专业，能切实解决问题，推荐！', 1529912791, 5, 5, 5, '2,4,5', 1, 0, 220, '114.94.28.162', 5, '上海市-自贸区', '社保开户');
INSERT INTO `comment` VALUES (787, 24, 0, 0, '非常棒的体验。省事省心。专业、给力。', 1533852984, 5, 5, 5, '2,6', 1, 0, 13, '114.94.28.162', 5, '上海市-普陀区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (786, 29, 0, 0, '良好的服务和专业水准保证了业务的顺利办理', 1529701521, 5, 5, 5, '2,3,4,5,6,7', 1, 0, 7, '114.94.28.162', 5, '上海市-青浦区', '个体商户注册');
INSERT INTO `comment` VALUES (785, 22, 0, 0, '好评，快速，可以长期深入合作', 1533368679, 5, 5, 5, '1,2,4', 1, 0, 113, '114.94.28.162', 5, '上海市-闵行区', '本区地址变更');
INSERT INTO `comment` VALUES (784, 25, 0, 0, '很专业，对待客户的问题细致耐心，赞', 1530350735, 5, 5, 5, '1,3,4,7', 1, 0, 221, '114.94.28.162', 5, '上海市-嘉定区', '公积金开户');
INSERT INTO `comment` VALUES (783, 241, 0, 0, '超出预期，低调还特别有效率，赞一个', 1530324644, 5, 5, 5, '3,6', 1, 0, 10, '114.94.28.162', 5, '上海市-徐汇区', '股权变更');
INSERT INTO `comment` VALUES (782, 19, 0, 0, '上门服务，态度热情，办事服务满意，给赞，希望后期合作愉快！', 1531204087, 5, 5, 5, '1,3,4,5,6,7', 1, 0, 10, '114.94.28.162', 5, '上海市-长宁区', '股权变更');
INSERT INTO `comment` VALUES (781, 21, 0, 0, '办事效率高，主动热情', 1532335672, 5, 5, 5, '2,4,5,7', 1, 0, 13, '114.94.28.162', 5, '上海市-自贸区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (780, 24, 0, 0, '态度非常好，人很耐心，有亲和力，有问必答，服务很周到。', 1531857765, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 18, '114.94.28.162', 5, '上海市-静安区', '工商解异常');
INSERT INTO `comment` VALUES (779, 13, 0, 0, '越努力就越辛运，以后有机会合作！', 1530659321, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 3, '114.94.28.162', 5, '上海市-黄浦区', '外商独资公司注册');
INSERT INTO `comment` VALUES (778, 13, 0, 0, '现在想想还是蛮不错的，当时自己太急躁了！', 1530628189, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 18, '114.94.28.162', 5, '上海市-奉贤区', '工商解异常');
INSERT INTO `comment` VALUES (777, 241, 0, 0, '服务很好，很周到，有问必答，为客户着想，效率很高，合作很愉快', 1529260283, 5, 5, 5, '1,3,6', 1, 0, 10, '114.94.28.162', 5, '上海市-自贸区', '股权变更');
INSERT INTO `comment` VALUES (776, 2, 0, 0, '很专业 开户办理的很顺利 而且很细心 有问必答 服务效率高，很难见到这种专业而又效率的公司了，绝对好评', 1530130968, 5, 5, 5, '2,4,5,6,7', 1, 0, 13, '114.94.28.162', 5, '上海市-宝山区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (775, 27, 0, 0, '非常棒的体验。省事省心。专业、给力。', 1530966993, 5, 5, 5, '3,4,5,7', 1, 0, 220, '114.94.28.162', 5, '上海市-青浦区', '社保开户');
INSERT INTO `comment` VALUES (774, 14, 0, 0, '良好的服务和专业水准保证了业务的顺利办理', 1529774415, 5, 5, 5, '1,3,5', 1, 0, 14, '114.94.28.162', 5, '上海市-青浦区', '简易注销');
INSERT INTO `comment` VALUES (773, 12, 0, 0, '以后办理还找他。实在感谢', 1533547999, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 10, '114.94.28.162', 5, '上海市-徐汇区', '股权变更');
INSERT INTO `comment` VALUES (772, 26, 0, 0, '非常迅速，反馈也很及时，没想到这么快办完了。非常满意的一次服务', 1532710842, 5, 5, 5, '1,3,4,5,6,7', 1, 0, 13, '114.94.28.162', 5, '上海市-青浦区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (771, 2, 0, 0, '非常好。帮助并办理注册公司的整个过程。很好的的一个人', 1530736559, 5, 5, 5, '1,4,6,7', 1, 0, 221, '114.94.28.162', 5, '上海市-虹口区', '公积金开户');
INSERT INTO `comment` VALUES (770, 28, 0, 0, '积极配合帮助我们想办法解决注册、银行开户中的各种问题，谢谢。下次注册还找你们', 1531736458, 5, 5, 5, '1,3,4,5,6,7', 1, 0, 10, '114.94.28.162', 5, '上海市-虹口区', '股权变更');
INSERT INTO `comment` VALUES (769, 25, 0, 0, '合作得挺愉快，希望之后还有机会合作。', 1532603946, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 113, '114.94.28.162', 5, '上海市-青浦区', '本区地址变更');
INSERT INTO `comment` VALUES (768, 2, 0, 0, '办事效率高，主动热情', 1532593474, 5, 5, 5, '1,2,3,4,6', 1, 0, 7, '114.94.28.162', 5, '上海市-浦东新区', '个体商户注册');
INSERT INTO `comment` VALUES (767, 28, 0, 0, '积极配合帮助我们想办法解决注册、银行开户中的各种问题，谢谢。下次注册还找你们', 1528934857, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 220, '114.94.28.162', 5, '上海市-青浦区', '社保开户');
INSERT INTO `comment` VALUES (766, 25, 0, 0, '很感谢两位，公司注册好了，沟通很顺畅，服务很到位，希望下次继续合作。', 1529156829, 5, 5, 5, '2,4,6', 1, 0, 6, '114.94.28.162', 5, '上海市-青浦区', '办事处注册');
INSERT INTO `comment` VALUES (765, 29, 0, 0, '服务很好，很细致很周到.', 1532508575, 5, 5, 5, '1,2,4,5,6,7', 1, 0, 3, '114.94.28.162', 5, '上海市-宝山区', '外商独资公司注册');
INSERT INTO `comment` VALUES (764, 24, 0, 0, '越努力就越辛运，以后有机会合作！', 1533762553, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 113, '114.94.28.162', 5, '上海市-静安区', '本区地址变更');
INSERT INTO `comment` VALUES (763, 22, 0, 0, '整体满意。感谢平台遇见缘分。希望不断壮大服务提升更高水平', 1531543157, 5, 5, 5, '1,2,7', 1, 0, 19, '114.94.28.162', 5, '上海市-嘉定区', '开设银行基本户');
INSERT INTO `comment` VALUES (762, 242, 0, 0, '现在想想还是蛮不错的，当时自己太急躁了！', 1532579770, 5, 5, 5, '2,6', 1, 0, 3, '114.94.28.162', 5, '上海市-宝山区', '外商独资公司注册');
INSERT INTO `comment` VALUES (761, 27, 0, 0, '业务熟练，态度温和，比较认真负责', 1532243366, 5, 5, 5, '3,4,6,7', 1, 0, 18, '114.94.28.162', 5, '上海市-崇明区', '工商解异常');
INSERT INTO `comment` VALUES (760, 14, 0, 0, '超预期的服务体验，大力推荐。以后我们公司业务就找你了。蒸蒸日上哦', 1531705501, 5, 5, 5, '2,3', 1, 0, 18, '114.94.28.162', 5, '上海市-宝山区', '工商解异常');
INSERT INTO `comment` VALUES (759, 29, 0, 0, '非常负责和热情，态度特别好，我问的问题都很快回复，给十万个好评～', 1533361302, 5, 5, 5, '2,3,4,5,7', 1, 0, 4, '114.94.28.162', 5, '上海市-奉贤区', '合伙企业注册');
INSERT INTO `comment` VALUES (758, 2, 0, 0, '不错，我让我朋友也来这里做，挺负责不错，专业水平也够', 1531574035, 5, 5, 5, '1,2,3,5,6', 1, 0, 11, '114.94.28.162', 5, '上海市-松江区', '法人变更');
INSERT INTO `comment` VALUES (757, 13, 0, 0, '加油，刚刚注册了公司，原来不知道这方面还有这么多需要注意的事情。学习到了很多，希望我能和你们一起成长', 1529538330, 5, 5, 5, '1,3', 1, 0, 1, '114.94.28.162', 5, '上海市-普陀区', '有限公司注册');
INSERT INTO `comment` VALUES (756, 26, 0, 0, '满意，省心省力～', 1530364963, 5, 5, 5, '1,2,6', 1, 0, 11, '114.94.28.162', 5, '上海市-嘉定区', '法人变更');
INSERT INTO `comment` VALUES (755, 20, 0, 0, '讲解耐心，充分为客户照相，做事认真', 1531434986, 1, 1, 1, '1,2,3,4,5', 1, 0, 15, '114.94.28.162', 1, '上海市-崇明区', '一般注销');
INSERT INTO `comment` VALUES (754, 28, 0, 0, '积极配合帮助我们想办法解决注册、银行开户中的各种问题，谢谢。下次注册还找你们', 1532031871, 1, 1, 1, '2,3,4,7', 1, 0, 5, '114.94.28.162', 1, '上海市-松江区', '分公司注册');
INSERT INTO `comment` VALUES (753, 22, 0, 0, '办事效率高，主动热情', 1532543115, 1, 1, 1, '3,4,6,7', 1, 0, 6, '114.94.28.162', 1, '上海市-杨浦区', '办事处注册');
INSERT INTO `comment` VALUES (752, 29, 0, 0, '好，质素高，人老实，服务好', 1531240588, 1, 1, 1, '1,2,4,5,6,7', 1, 0, 114, '114.94.28.162', 1, '上海市-虹口区', '跨区地址变更');
INSERT INTO `comment` VALUES (751, 22, 0, 0, '态度非常好，人很耐心，有亲和力，有问必答，服务很周到。', 1529500220, 1, 1, 1, '2,3', 1, 0, 14, '114.94.28.162', 1, '上海市-金山区', '简易注销');
INSERT INTO `comment` VALUES (750, 22, 0, 0, '因为要实地注册地址，所以遇到一些麻烦，但是还是非常耐心的帮忙询问，且在原本预计的时间之内拿到营业执照，还是非常感谢的。', 1531785703, 1, 1, 1, '1,3,4,5,6,7', 1, 0, 17, '114.94.28.162', 1, '上海市-嘉定区', '五证合一');
INSERT INTO `comment` VALUES (749, 28, 0, 0, '现在想想还是蛮不错的，当时自己太急躁了！', 1532777170, 1, 1, 1, '1,4,6', 1, 0, 1, '114.94.28.162', 1, '上海市-杨浦区', '有限公司注册');
INSERT INTO `comment` VALUES (748, 20, 0, 0, '挺讲信用的，不错的代办公司，以后长期合作。', 1531663005, 1, 1, 1, '1,2,3,4,5,6', 1, 0, 11, '114.94.28.162', 1, '上海市-黄浦区', '法人变更');
INSERT INTO `comment` VALUES (747, 28, 0, 0, '服务很好，很周到，有问必答，为客户着想，效率很高，合作很愉快', 1533085725, 1, 1, 1, '1,2,3,4,5,6,7', 1, 0, 112, '114.94.28.162', 1, '上海市-金山区', '行业名称变更');
INSERT INTO `comment` VALUES (746, 22, 0, 0, '不错，我让我朋友也来这里做，挺负责不错，专业水平也够', 1531032477, 1, 1, 1, '3,5,7', 1, 0, 17, '114.94.28.162', 1, '上海市-松江区', '五证合一');
INSERT INTO `comment` VALUES (745, 26, 0, 0, '服务非常好。反馈的问题也得到了解决。', 1533932736, 1, 1, 1, '1,6', 1, 0, 2, '114.94.28.162', 1, '上海市-宝山区', '股份有限公司注册');
INSERT INTO `comment` VALUES (744, 13, 0, 0, '办事细心，业务很熟悉，做事认真负责', 1529248222, 1, 1, 1, '1,2,3,5,6,7', 1, 0, 15, '114.94.28.162', 1, '上海市-普陀区', '一般注销');
INSERT INTO `comment` VALUES (743, 21, 0, 0, '很专业 开户办理的很顺利 而且很细心 有问必答 服务效率高，很难见到这种专业而又效率的公司了，绝对好评', 1530445007, 1, 1, 1, '2,4,5,7', 1, 0, 112, '114.94.28.162', 1, '上海市-闵行区', '行业名称变更');
INSERT INTO `comment` VALUES (742, 29, 0, 0, '因为要实地注册地址，所以遇到一些麻烦，但是还是非常耐心的帮忙询问，且在原本预计的时间之内拿到营业执照，还是非常感谢的。', 1533247165, 1, 1, 1, '1,4,7', 1, 0, 111, '114.94.28.162', 1, '上海市-金山区', '字号变更');
INSERT INTO `comment` VALUES (741, 24, 0, 0, '积极配合帮助我们想办法解决注册、银行开户中的各种问题，谢谢。下次注册还找你们', 1532254424, 1, 1, 1, '1,3,5', 1, 0, 112, '114.94.28.162', 1, '上海市-浦东新区', '行业名称变更');
INSERT INTO `comment` VALUES (739, 26, 0, 0, '很好，满足预期，专业。', 1530804408, 1, 1, 1, '1,2,3,5,6', 1, 0, 115, '114.94.28.162', 1, '上海市-嘉定区', '跨市地址变更');
INSERT INTO `comment` VALUES (740, 29, 0, 0, '办事速度快，靠谱，非常专业，后期会一直合作', 1532662370, 1, 1, 1, '5,7', 1, 0, 4, '114.94.28.162', 1, '上海市-嘉定区', '合伙企业注册');
INSERT INTO `comment` VALUES (737, 21, 0, 0, '非常好。帮助并办理注册公司的整个过程。很好的的一个人', 1533949279, 1, 1, 1, '1,2,3,4,5,6,7', 1, 0, 220, '114.94.28.162', 1, '上海市-徐汇区', '社保开户');
INSERT INTO `comment` VALUES (738, 21, 0, 0, '挺好的，非常敬业，很快就办好了，不错。', 1529964638, 1, 1, 1, '2,6', 1, 0, 1, '114.94.28.162', 1, '上海市-奉贤区', '有限公司注册');
INSERT INTO `comment` VALUES (736, 27, 0, 0, '很专业 有问必答 给他们做这些很放心。', 1530386056, 1, 1, 1, '1,3,4', 1, 0, 3, '114.94.28.162', 1, '上海市-嘉定区', '外商独资公司注册');
INSERT INTO `comment` VALUES (735, 242, 0, 0, '好，质素高，人老实，服务好', 1529874893, 5, 5, 5, '1,5,7', 1, 0, 11, '114.94.28.162', 5, '上海市-崇明区', '法人变更');
INSERT INTO `comment` VALUES (732, 25, 0, 0, '服务非常好。反馈的问题也得到了解决。', 1530043236, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 16, '114.94.28.162', 5, '上海市-崇明区', '年报公示');
INSERT INTO `comment` VALUES (733, 26, 0, 0, '合作得挺愉快，希望之后还有机会合作。', 1532019025, 5, 5, 5, '2,3,6', 1, 0, 115, '114.94.28.162', 5, '上海市-闵行区', '跨市地址变更');
INSERT INTO `comment` VALUES (734, 27, 0, 0, '以后办理还找他。实在感谢', 1530688154, 5, 5, 5, '2,7', 1, 0, 13, '114.94.28.162', 5, '上海市-奉贤区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (731, 13, 0, 0, '很不错，响应和服务都很好。', 1529561844, 5, 5, 5, '1,2,3,4,5,7', 1, 0, 111, '114.94.28.162', 5, '上海市-普陀区', '字号变更');
INSERT INTO `comment` VALUES (729, 2, 0, 0, '关键同志，的确服务比较好，专业内容做得好，强烈推荐', 1533593337, 5, 5, 5, '1,5', 1, 0, 221, '114.94.28.162', 5, '上海市-嘉定区', '公积金开户');
INSERT INTO `comment` VALUES (730, 18, 0, 0, '非常好。帮助并办理注册公司的整个过程。很好的的一个人', 1530719770, 5, 5, 5, '1,3,5,6', 1, 0, 13, '114.94.28.162', 5, '上海市-徐汇区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (728, 26, 0, 0, '服务很周到，专业，为初次创业注册公司解决了很多问题！', 1533929624, 5, 5, 5, '1,2,3,5,6,7', 1, 0, 6, '114.94.28.162', 5, '上海市-青浦区', '办事处注册');
INSERT INTO `comment` VALUES (726, 27, 0, 0, '办事干净利索，非常专业 ，赞一个。', 1529791719, 5, 5, 5, '5,7', 1, 0, 3, '114.94.28.162', 5, '上海市-徐汇区', '外商独资公司注册');
INSERT INTO `comment` VALUES (727, 22, 0, 0, '办事细心，业务很熟悉，做事认真负责', 1532962585, 5, 5, 5, '3,4,5,7', 1, 0, 15, '114.94.28.162', 5, '上海市-徐汇区', '一般注销');
INSERT INTO `comment` VALUES (724, 21, 0, 0, '注册公司很块，中间的流程都办的请清楚楚，没有浪费一分时间，1280元', 1529668558, 5, 5, 5, '4,7', 1, 0, 112, '114.94.28.162', 5, '上海市-自贸区', '行业名称变更');
INSERT INTO `comment` VALUES (725, 14, 0, 0, '超出预期，低调还特别有效率，赞一个', 1532257725, 5, 5, 5, '1,2,4,5,6,7', 1, 0, 10, '114.94.28.162', 5, '上海市-松江区', '股权变更');
INSERT INTO `comment` VALUES (723, 14, 0, 0, '非常有耐心的一个人，是个好姑凉，希望老板多给她加薪奖励。', 1529532009, 5, 5, 5, '2,7', 1, 0, 4, '114.94.28.162', 5, '上海市-闵行区', '合伙企业注册');
INSERT INTO `comment` VALUES (721, 27, 0, 0, '非常感谢，长期合作，祝事业蒸蒸日上', 1530190946, 5, 5, 5, '1,2,3,4,6,7', 1, 0, 4, '114.94.28.162', 5, '上海市-青浦区', '合伙企业注册');
INSERT INTO `comment` VALUES (722, 14, 0, 0, '细心，耐心，专业，给力！', 1529478518, 5, 5, 5, '1,2,5,6', 1, 0, 2, '114.94.28.162', 5, '上海市-长宁区', '股份有限公司注册');
INSERT INTO `comment` VALUES (718, 18, 0, 0, '不错，我让我朋友也来这里做，挺负责不错，专业水平也够', 1529049345, 5, 5, 5, '4,6', 1, 0, 15, '114.94.28.162', 5, '上海市-静安区', '一般注销');
INSERT INTO `comment` VALUES (719, 27, 0, 0, '积极配合帮助我们想办法解决注册、银行开户中的各种问题，谢谢。下次注册还找你们', 1533598400, 5, 5, 5, '1,3,5', 1, 0, 10, '114.94.28.162', 5, '上海市-宝山区', '股权变更');
INSERT INTO `comment` VALUES (720, 13, 0, 0, '态度非常好，人很耐心，有亲和力，有问必答，服务很周到。', 1532254049, 5, 5, 5, '3,5', 1, 0, 219, '114.94.28.162', 5, '上海市-宝山区', '法人一证通办理');
INSERT INTO `comment` VALUES (717, 25, 0, 0, '越努力就越辛运，以后有机会合作！', 1532891428, 5, 5, 5, '1,3', 1, 0, 17, '114.94.28.162', 5, '上海市-普陀区', '五证合一');
INSERT INTO `comment` VALUES (716, 19, 0, 0, '注册公司很块，中间的流程都办的请清楚楚，没有浪费一分时间，1280元', 1529124587, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 14, '114.94.28.162', 5, '上海市-宝山区', '简易注销');
INSERT INTO `comment` VALUES (696, 26, 0, 0, '办事干净利索，非常专业 ，赞一个。', 1531457413, 3, 3, 3, '1,5,6', 1, 0, 7, '114.94.28.162', 3, '上海市-金山区', '个体商户注册');
INSERT INTO `comment` VALUES (697, 13, 0, 0, '非常负责和热情，态度特别好，我问的问题都很快回复，给十万个好评～', 1531305055, 3, 3, 3, '1,2,4,5,7', 1, 0, 115, '114.94.28.162', 3, '上海市-金山区', '跨市地址变更');
INSERT INTO `comment` VALUES (698, 29, 0, 0, '办事效率高，主动热情', 1531670802, 3, 3, 3, '3,4', 1, 0, 7, '114.94.28.162', 3, '上海市-金山区', '个体商户注册');
INSERT INTO `comment` VALUES (699, 26, 0, 0, '為人民服務 不忘初心 继续前进', 1530671065, 3, 3, 3, '1,2,4,5,6,7', 1, 0, 3, '114.94.28.162', 3, '上海市-金山区', '外商独资公司注册');
INSERT INTO `comment` VALUES (700, 29, 0, 0, '非常负责和热情，态度特别好，我问的问题都很快回复，给十万个好评～', 1533920312, 3, 3, 3, '1,2,4,5,6,7', 1, 0, 4, '114.94.28.162', 3, '上海市-金山区', '合伙企业注册');
INSERT INTO `comment` VALUES (701, 241, 0, 0, '很感谢两位，公司注册好了，沟通很顺畅，服务很到位，希望下次继续合作。', 1530477040, 3, 3, 3, '1,2,6', 1, 0, 115, '114.94.28.162', 3, '上海市-金山区', '跨市地址变更');
INSERT INTO `comment` VALUES (702, 25, 0, 0, '不错，办事效率挺高，沟通到位，回复及时', 1530603890, 3, 3, 3, '1,5', 1, 0, 13, '114.94.28.162', 3, '上海市-金山区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (703, 19, 0, 0, '积极配合帮助我们想办法解决注册、银行开户中的各种问题，谢谢。下次注册还找你们', 1533773033, 3, 3, 3, '4,5', 1, 0, 15, '114.94.28.162', 3, '上海市-金山区', '一般注销');
INSERT INTO `comment` VALUES (704, 22, 0, 0, '服务很好，很细致很周到.', 1532242091, 3, 3, 3, '4,5,6,7', 1, 0, 113, '114.94.28.162', 3, '上海市-金山区', '本区地址变更');
INSERT INTO `comment` VALUES (705, 2, 0, 0, '办事速度快，靠谱，非常专业，后期会一直合作。', 1533441158, 3, 3, 3, '2,5,6', 1, 0, 12, '114.94.28.162', 3, '上海市-金山区', '经营范围变更');
INSERT INTO `comment` VALUES (706, 29, 0, 0, '用心服务，用心对待；办事效率高；感谢王哥，做了几项业务了；后期有需求还是会选择您，再次感谢', 1533390988, 3, 3, 3, '2,3,4,6,7', 1, 0, 115, '114.94.28.162', 3, '上海市-金山区', '跨市地址变更');
INSERT INTO `comment` VALUES (707, 24, 0, 0, '一气呵成，服务周到，值得推荐', 1534144389, 3, 3, 3, '1,2,3,4,5,6,7', 1, 0, 7, '114.94.28.162', 3, '上海市-金山区', '个体商户注册');
INSERT INTO `comment` VALUES (708, 22, 0, 0, '真心不错，随时响应，快，且为客户着想', 1529934432, 3, 3, 3, '3,5', 1, 0, 113, '114.94.28.162', 3, '上海市-金山区', '本区地址变更');
INSERT INTO `comment` VALUES (709, 2, 0, 0, '诚信踏实非常专业', 1531456189, 3, 3, 3, '1,2,3,4,5,6,7', 1, 0, 113, '114.94.28.162', 3, '上海市-金山区', '本区地址变更');
INSERT INTO `comment` VALUES (710, 29, 0, 0, '加油，刚刚注册了公司，原来不知道这方面还有这么多需要注意的事情。学习到了很多，希望我能和你们一起成长', 1533042692, 3, 3, 3, '1,3,4,5,6,7', 1, 0, 16, '114.94.28.162', 3, '上海市-金山区', '年报公示');
INSERT INTO `comment` VALUES (711, 2, 0, 0, '很好 办事细腻认真', 1530739923, 3, 3, 3, '1,2,3,4,5,6,7', 1, 0, 15, '114.94.28.162', 3, '上海市-金山区', '一般注销');
INSERT INTO `comment` VALUES (712, 21, 0, 0, '服务非常好。反馈的问题也得到了解决。', 1530971171, 3, 3, 3, '1,4,7', 1, 0, 14, '114.94.28.162', 3, '上海市-金山区', '简易注销');
INSERT INTO `comment` VALUES (713, 28, 0, 0, '业务熟练，态度温和，比较认真负责', 1532099995, 3, 3, 3, '1,2,3,4,5,6', 1, 0, 219, '114.94.28.162', 3, '上海市-金山区', '法人一证通办理');
INSERT INTO `comment` VALUES (714, 18, 0, 0, '态度非常好，人很耐心，有亲和力，有问必答，服务很周到。', 1533991848, 3, 3, 3, '1,2,3,4,5,6,7', 1, 0, 3, '114.94.28.162', 3, '上海市-金山区', '外商独资公司注册');
INSERT INTO `comment` VALUES (715, 21, 0, 0, '超出预期，低调还特别有效率，赞一个', 1531427075, 3, 3, 3, '2,3,4', 1, 0, 6, '114.94.28.162', 3, '上海市-金山区', '办事处注册');
INSERT INTO `comment` VALUES (1174, 18, 0, 0, '耐心解答每一个问题不错', 1530988319, 4, 4, 4, '2,3,4,5,6,7', 1, 0, 216, '114.94.28.162', 4, '上海市-自贸区', '食品经营许可证(食品)');
INSERT INTO `comment` VALUES (1175, 2, 0, 0, '站在客户的角度很敬业，加油小伙子', 1531259610, 4, 4, 4, '1,2,3,4,5,6,7', 1, 0, 52, '114.94.28.162', 4, '上海市-金山区', 'ISP经营许可证');
INSERT INTO `comment` VALUES (1176, 21, 0, 0, '比较靠谱，很热心，人不错！', 1533265692, 4, 4, 4, '1,2,3,4,5,6,7', 1, 0, 56, '114.94.28.162', 4, '上海市-徐汇区', '呼叫中心经营许可证');
INSERT INTO `comment` VALUES (1177, 18, 0, 0, '走心，贴心，小姑娘有前途', 1530825591, 4, 4, 4, '2,3,4,5,6,7', 1, 0, 40, '114.94.28.162', 4, '上海市-黄浦区', '电影发行经营许可证');
INSERT INTO `comment` VALUES (1178, 22, 0, 0, '效率非常高，非常专业。', 1532046104, 4, 4, 4, '2,3,4', 1, 0, 216, '114.94.28.162', 4, '上海市-黄浦区', '食品经营许可证(食品)');
INSERT INTO `comment` VALUES (1179, 24, 0, 0, '人很好，放心 这就足够了！', 1529797252, 4, 4, 4, '1,2,5,6,7', 1, 0, 34, '114.94.28.162', 4, '上海市-黄浦区', '食品生产经营许可证');
INSERT INTO `comment` VALUES (1180, 19, 0, 0, '给力，专业度高，值得推荐', 1530695853, 4, 4, 4, '1,2,3,5,6', 1, 0, 31, '114.94.28.162', 4, '上海市-杨浦区', '道路运输经营许可证');
INSERT INTO `comment` VALUES (1181, 21, 0, 0, '走心，贴心，小姑娘有前途', 1530748649, 4, 4, 4, '1,2,6', 1, 0, 39, '114.94.28.162', 4, '上海市-宝山区', '营业性演出许可证');
INSERT INTO `comment` VALUES (1182, 27, 0, 0, '不错，促进办理流程认识，并懂得跟他人沟通有效结果传递。', 1531241007, 4, 4, 4, '1,2,3,4,5,6,7', 1, 0, 45, '114.94.28.162', 4, '上海市-浦东新区', '广播电视视频点播业务经营许可证(乙种)');
INSERT INTO `comment` VALUES (1183, 2, 0, 0, '再次选择，依然没有失望，办的很好，非常感谢', 1528925157, 4, 4, 4, '1,3,6', 1, 0, 36, '114.94.28.162', 4, '上海市-奉贤区', '酒类商品批发许可证');
INSERT INTO `comment` VALUES (1184, 2, 0, 0, '很有耐心，很负责，沟通上也很愉快，合作体验很好！', 1531904665, 4, 4, 4, '2,5', 1, 0, 47, '114.94.28.162', 4, '上海市-浦东新区', '劳务派遣经营许可证');
INSERT INTO `comment` VALUES (1185, 20, 0, 0, '伙子服务态度比较喜欢，能耐心的解答我的疑问，整个沟通的过程蛮舒服的，办事效率也很高', 1533784772, 4, 4, 4, '1,2,3,4,5,6,7', 1, 0, 158, '114.94.28.162', 4, '上海市-自贸区', '三类医疗器械经营许可证');
INSERT INTO `comment` VALUES (1186, 29, 0, 0, '爱岗敬业 客户为宗旨 人美心善 大赞', 1531537944, 4, 4, 4, '1,3,5', 1, 0, 55, '114.94.28.162', 4, '上海市-徐汇区', 'EDI经营许可证');
INSERT INTO `comment` VALUES (1187, 2, 0, 0, '不错，促进办理流程认识，并懂得跟他人沟通有效结果传递。', 1532605912, 4, 4, 4, '1,2,3,6', 1, 0, 43, '114.94.28.162', 4, '上海市-松江区', '电视剧剧本备案');
INSERT INTO `comment` VALUES (1188, 29, 0, 0, '值得信任，值得托付业务！！！', 1531486927, 4, 4, 4, '1,2,3,4,5,7', 1, 0, 35, '114.94.28.162', 4, '上海市-宝山区', '酒类商品零售许可证');
INSERT INTO `comment` VALUES (1189, 18, 0, 0, '服务很好，以后会一直合作下去', 1530468254, 4, 4, 4, '1,2,3,4,5,6,7', 1, 0, 216, '114.94.28.162', 4, '上海市-崇明区', '食品经营许可证(食品)');
INSERT INTO `comment` VALUES (1190, 20, 0, 0, '比较靠谱，很热心，人不错！', 1529524897, 4, 4, 4, '3,7', 1, 0, 33, '114.94.28.162', 4, '上海市-长宁区', '食品经营许可证(餐饮)');
INSERT INTO `comment` VALUES (1191, 24, 0, 0, '再次选择，依然没有失望，办的很好，非常感谢', 1528933602, 4, 4, 4, '1,2,3,4,5,6,7', 1, 0, 56, '114.94.28.162', 4, '上海市-宝山区', '呼叫中心经营许可证');
INSERT INTO `comment` VALUES (1192, 28, 0, 0, '非常负责，态度很好，选她没错', 1528945984, 4, 4, 4, '1,3,4,5,6,7', 1, 0, 42, '114.94.28.162', 4, '上海市-嘉定区', '电影立项拍摄(单片许可证)');
INSERT INTO `comment` VALUES (1193, 29, 0, 0, '再次选择，依然没有失望，办的很好，非常感谢', 1531628789, 4, 4, 4, '3,5', 1, 0, 56, '114.94.28.162', 4, '上海市-静安区', '呼叫中心经营许可证');
INSERT INTO `comment` VALUES (1194, 22, 0, 0, '态度服务超级好，还会给一些咨询意见', 1534096609, 4, 4, 4, '1,2,3,4,5,6,7', 1, 0, 216, '114.94.28.162', 4, '上海市-青浦区', '食品经营许可证(食品)');
INSERT INTO `comment` VALUES (1195, 24, 0, 0, '非常棒！很专业，给我们做了详尽的答疑解惑，支持，好评！', 1529164489, 4, 4, 4, '1,2,4,6,7', 1, 0, 31, '114.94.28.162', 4, '上海市-静安区', '道路运输经营许可证');
INSERT INTO `comment` VALUES (1196, 12, 0, 0, '服务非常周到，希望可以一直合作', 1530338833, 4, 4, 4, '1,2,3,4,5,6,7', 1, 0, 158, '114.94.28.162', 4, '上海市-静安区', '三类医疗器械经营许可证');
INSERT INTO `comment` VALUES (1197, 18, 0, 0, '遇到一些波折，最后还是顺利办下来了', 1530794005, 4, 4, 4, '1,2,3,5,7', 1, 0, 39, '114.94.28.162', 4, '上海市-普陀区', '营业性演出许可证');
INSERT INTO `comment` VALUES (1198, 27, 0, 0, '遇到一些波折，最后还是顺利办下来了', 1532530518, 4, 4, 4, '1,2,3,4,5,6,7', 1, 0, 35, '114.94.28.162', 4, '上海市-自贸区', '酒类商品零售许可证');
INSERT INTO `comment` VALUES (1199, 25, 0, 0, '站在客户的角度很敬业，加油小伙子', 1529785698, 4, 4, 4, '2,4,5,6', 1, 0, 33, '114.94.28.162', 4, '上海市-金山区', '食品经营许可证(餐饮)');
INSERT INTO `comment` VALUES (1200, 27, 0, 0, '服务周到，热情主动，大方', 1530866155, 4, 4, 4, '1,2,3,4,5,6,7', 1, 0, 55, '114.94.28.162', 4, '上海市-虹口区', 'EDI经营许可证');
INSERT INTO `comment` VALUES (1201, 19, 0, 0, '伙子服务态度比较喜欢，能耐心的解答我的疑问，整个沟通的过程蛮舒服的，办事效率也很高', 1530555024, 4, 4, 4, '1,4', 1, 0, 43, '114.94.28.162', 4, '上海市-自贸区', '电视剧剧本备案');
INSERT INTO `comment` VALUES (1202, 13, 0, 0, '爱岗敬业 客户为宗旨 人美心善 大赞', 1531011329, 4, 4, 4, '1,3,4,5,7', 1, 0, 35, '114.94.28.162', 4, '上海市-虹口区', '酒类商品零售许可证');
INSERT INTO `comment` VALUES (1203, 14, 0, 0, '很棒的服务，指导很及时到位，很满意', 1532160268, 4, 4, 4, '1,2', 1, 0, 44, '114.94.28.162', 4, '上海市-静安区', '电视剧立项拍摄(单片许可证)');
INSERT INTO `comment` VALUES (1204, 27, 0, 0, '非常棒！很专业，给我们做了详尽的答疑解惑，支持，好评！', 1530483356, 4, 4, 4, '3,5,6,7', 1, 0, 46, '114.94.28.162', 4, '上海市-杨浦区', '人力资源服务许可证');
INSERT INTO `comment` VALUES (1205, 21, 0, 0, '人很好，放心 这就足够了！', 1531924581, 4, 4, 4, '1,2,4,5,7', 1, 0, 31, '114.94.28.162', 4, '上海市-闵行区', '道路运输经营许可证');
INSERT INTO `comment` VALUES (1206, 27, 0, 0, '人很诚实工作也有能力', 1533325459, 4, 4, 4, '3,5', 1, 0, 50, '114.94.28.162', 4, '上海市-宝山区', '危险化学品经营许可证');
INSERT INTO `comment` VALUES (1207, 12, 0, 0, '工作效率高、专业知识扎实。', 1529405068, 4, 4, 4, '2,3,5', 1, 0, 31, '114.94.28.162', 4, '上海市-杨浦区', '道路运输经营许可证');
INSERT INTO `comment` VALUES (1208, 12, 0, 0, '非常好，很专业、对客户也很负责任', 1529250585, 4, 4, 4, '1,4,5,6,7', 1, 0, 47, '114.94.28.162', 4, '上海市-奉贤区', '劳务派遣经营许可证');
INSERT INTO `comment` VALUES (1209, 21, 0, 0, '站在客户的角度很敬业，加油小伙子', 1532126214, 4, 4, 4, '1,2,3,5', 1, 0, 46, '114.94.28.162', 4, '上海市-普陀区', '人力资源服务许可证');
INSERT INTO `comment` VALUES (1210, 28, 0, 0, '很细心 知识点解释也很清晰', 1533191916, 4, 4, 4, '2,3,4,5,7', 1, 0, 35, '114.94.28.162', 4, '上海市-嘉定区', '酒类商品零售许可证');
INSERT INTO `comment` VALUES (1211, 24, 0, 0, '不错，促进办理流程认识，并懂得跟他人沟通有效结果传递。', 1529398352, 4, 4, 4, '1,2,4,5', 1, 0, 52, '114.94.28.162', 4, '上海市-自贸区', 'ISP经营许可证');
INSERT INTO `comment` VALUES (1212, 25, 0, 0, '非常热心的一位同志，细致负责。', 1529440445, 4, 4, 4, '4,6', 1, 0, 43, '114.94.28.162', 4, '上海市-徐汇区', '电视剧剧本备案');
INSERT INTO `comment` VALUES (1213, 242, 0, 0, '非常棒！很专业，给我们做了详尽的答疑解惑，支持，好评！', 1531513141, 4, 4, 4, '3,7', 1, 0, 35, '114.94.28.162', 4, '上海市-普陀区', '酒类商品零售许可证');
INSERT INTO `comment` VALUES (1214, 28, 0, 0, '不错，促进办理流程认识，并懂得跟他人沟通有效结果传递。', 1532575055, 4, 4, 4, '3,4,7', 1, 0, 49, '114.94.28.162', 4, '上海市-青浦区', '进出口权许可证');
INSERT INTO `comment` VALUES (1215, 242, 0, 0, '值得信任，值得托付业务！！！', 1529359397, 4, 4, 4, '1,2,3,4,5,6,7', 1, 0, 41, '114.94.28.162', 4, '上海市-浦东新区', '电影单片审查及发行许可证');
INSERT INTO `comment` VALUES (1216, 242, 0, 0, '给力，专业度高，值得推荐', 1529881459, 4, 4, 4, '1,2,3,4,5,6,7', 1, 0, 56, '114.94.28.162', 4, '上海市-奉贤区', '呼叫中心经营许可证');
INSERT INTO `comment` VALUES (1217, 25, 0, 0, '咨询非常认真靠谱，感谢马原！下次还选你。', 1533591394, 4, 4, 4, '3,5', 1, 0, 36, '114.94.28.162', 4, '上海市-黄浦区', '酒类商品批发许可证');
INSERT INTO `comment` VALUES (1218, 18, 0, 0, '不错，促进办理流程认识，并懂得跟他人沟通有效结果传递。', 1531069530, 4, 4, 4, '4,6', 1, 0, 45, '114.94.28.162', 4, '上海市-自贸区', '广播电视视频点播业务经营许可证(乙种)');
INSERT INTO `comment` VALUES (1219, 241, 0, 0, '专业耐心，合作愉快，很认真负责。', 1533286892, 4, 4, 4, '1,2,3,6', 1, 0, 31, '114.94.28.162', 4, '上海市-杨浦区', '道路运输经营许可证');
INSERT INTO `comment` VALUES (1220, 13, 0, 0, '非常热心，对于不明白的地方都会细心解说，值得信赖及推荐~', 1532197736, 4, 4, 4, '1,3,4,5,6,7', 1, 0, 46, '114.94.28.162', 4, '上海市-嘉定区', '人力资源服务许可证');
INSERT INTO `comment` VALUES (1221, 21, 0, 0, '很有耐心，很负责，沟通上也很愉快，合作体验很好！', 1534011289, 4, 4, 4, '2,4,6,7', 1, 0, 31, '114.94.28.162', 4, '上海市-奉贤区', '道路运输经营许可证');
INSERT INTO `comment` VALUES (1222, 24, 0, 0, '人很好，放心 这就足够了！', 1531201664, 4, 4, 4, '1,2,3,4,5,6,7', 1, 0, 46, '114.94.28.162', 4, '上海市-虹口区', '人力资源服务许可证');
INSERT INTO `comment` VALUES (1223, 21, 0, 0, '小王能耐心的解释我的疑问，整个过程能尽量按照我的要求来，有些我不会的他都帮我搞，愉快的合作。', 1530400289, 4, 4, 4, '1,2,3,4,5,6,7', 1, 0, 50, '114.94.28.162', 4, '上海市-崇明区', '危险化学品经营许可证');
INSERT INTO `comment` VALUES (1224, 25, 0, 0, '服务周到，热情主动，大方', 1530122326, 4, 4, 4, '2,3,4,5,6,7', 1, 0, 216, '114.94.28.162', 4, '上海市-徐汇区', '食品经营许可证(食品)');
INSERT INTO `comment` VALUES (1225, 28, 0, 0, '耐心解答每一个问题不错', 1533167003, 4, 4, 4, '3,6', 1, 0, 33, '114.94.28.162', 4, '上海市-宝山区', '食品经营许可证(餐饮)');
INSERT INTO `comment` VALUES (1226, 241, 0, 0, '再次选择，依然没有失望，办的很好，非常感谢', 1529417631, 4, 4, 4, '2,3', 1, 0, 43, '114.94.28.162', 4, '上海市-普陀区', '电视剧剧本备案');
INSERT INTO `comment` VALUES (1227, 27, 0, 0, '很有耐心，很负责，沟通上也很愉快，合作体验很好！', 1533675612, 4, 4, 4, '1,2,3,4,5,6,7', 1, 0, 55, '114.94.28.162', 4, '上海市-奉贤区', 'EDI经营许可证');
INSERT INTO `comment` VALUES (1228, 26, 0, 0, '好，很好，非常好，哈哈哈', 1531896344, 4, 4, 4, '1,2,5,7', 1, 0, 40, '114.94.28.162', 4, '上海市-松江区', '电影发行经营许可证');
INSERT INTO `comment` VALUES (1229, 21, 0, 0, '态度服务超级好，还会给一些咨询意见', 1529900770, 4, 4, 4, '1,2,5,6,7', 1, 0, 41, '114.94.28.162', 4, '上海市-普陀区', '电影单片审查及发行许可证');
INSERT INTO `comment` VALUES (1230, 25, 0, 0, '一起去的小王还是挺有亲和力的，办事也细心', 1530431302, 4, 4, 4, '1,3', 1, 0, 51, '114.94.28.162', 4, '上海市-金山区', 'SP经营许可证');
INSERT INTO `comment` VALUES (1231, 18, 0, 0, '伙子服务态度比较喜欢，能耐心的解答我的疑问，整个沟通的过程蛮舒服的，办事效率也很高', 1531865198, 4, 4, 4, '1,2,4,5,6,7', 1, 0, 58, '114.94.28.162', 4, '上海市-杨浦区', '互联网药品信息服务资格证');
INSERT INTO `comment` VALUES (1232, 20, 0, 0, '值得信任，值得托付业务！！！', 1532192065, 4, 4, 4, '2,3,4,5,6', 1, 0, 42, '114.94.28.162', 4, '上海市-青浦区', '电影立项拍摄(单片许可证)');
INSERT INTO `comment` VALUES (1233, 18, 0, 0, '值得信任，值得托付业务！！！', 1533401369, 4, 4, 4, '1,3,4,5,6,7', 1, 0, 34, '114.94.28.162', 4, '上海市-静安区', '食品生产经营许可证');
INSERT INTO `comment` VALUES (1234, 29, 0, 0, '一直合作多次，认真负责，有问必答。', 1533628112, 4, 4, 4, '1,4,5,6', 1, 0, 32, '114.94.28.162', 4, '上海市-青浦区', '无船承运业务经营资格登记证');
INSERT INTO `comment` VALUES (1235, 242, 0, 0, '很细心 知识点解释也很清晰', 1529809559, 4, 4, 4, '4,5', 1, 0, 58, '114.94.28.162', 4, '上海市-虹口区', '互联网药品信息服务资格证');
INSERT INTO `comment` VALUES (1236, 20, 0, 0, '再次选择，依然没有失望，办的很好，非常感谢', 1531964887, 4, 4, 4, '1,2,3,4,5,6,7', 1, 0, 158, '114.94.28.162', 4, '上海市-普陀区', '三类医疗器械经营许可证');
INSERT INTO `comment` VALUES (1237, 12, 0, 0, '非常负责，态度很好，选她没错', 1530538409, 4, 4, 4, '2,3,4,5,6', 1, 0, 58, '114.94.28.162', 4, '上海市-虹口区', '互联网药品信息服务资格证');
INSERT INTO `comment` VALUES (1238, 22, 0, 0, '伙子服务态度比较喜欢，能耐心的解答我的疑问，整个沟通的过程蛮舒服的，办事效率也很高', 1532517404, 4, 4, 4, '1,3,4,6', 1, 0, 56, '114.94.28.162', 4, '上海市-徐汇区', '呼叫中心经营许可证');
INSERT INTO `comment` VALUES (1239, 20, 0, 0, '不错尽心尽力，很专业。', 1533884653, 4, 4, 4, '1,3,4,7', 1, 0, 49, '114.94.28.162', 4, '上海市-嘉定区', '进出口权许可证');
INSERT INTO `comment` VALUES (1240, 2, 0, 0, '爱岗敬业 客户为宗旨 人美心善 大赞', 1532213529, 4, 4, 4, '2,3,5', 1, 0, 37, '114.94.28.162', 4, '上海市-闵行区', '公共场所卫生许可证');
INSERT INTO `comment` VALUES (1241, 18, 0, 0, '服务不错，配合的也很好', 1530266319, 4, 4, 4, '1,2,3,4,5', 1, 0, 36, '114.94.28.162', 4, '上海市-徐汇区', '酒类商品批发许可证');
INSERT INTO `comment` VALUES (1242, 22, 0, 0, '一直合作多次，认真负责，有问必答。', 1532387430, 4, 4, 4, '2,3,4,5,6,7', 1, 0, 56, '114.94.28.162', 4, '上海市-黄浦区', '呼叫中心经营许可证');
INSERT INTO `comment` VALUES (1243, 13, 0, 0, '服务态度好，专业程度高，如期完成申办业务，赞！', 1533232878, 4, 4, 4, '1,3,4,5', 1, 0, 34, '114.94.28.162', 4, '上海市-浦东新区', '食品生产经营许可证');
INSERT INTO `comment` VALUES (1244, 29, 0, 0, '遇到一些波折，最后还是顺利办下来了', 1531197523, 4, 4, 4, '5,6,7', 1, 0, 31, '114.94.28.162', 4, '上海市-长宁区', '道路运输经营许可证');
INSERT INTO `comment` VALUES (1245, 25, 0, 0, '非常热心，对于不明白的地方都会细心解说，值得信赖及推荐~', 1533055289, 4, 4, 4, '1,2,3,4,5,6', 1, 0, 49, '114.94.28.162', 4, '上海市-长宁区', '进出口权许可证');
INSERT INTO `comment` VALUES (1246, 18, 0, 0, '站在客户的角度很敬业，加油小伙子', 1530246358, 4, 4, 4, '1,2,3,4,6,7', 1, 0, 57, '114.94.28.162', 4, '上海市-崇明区', '网络文化经营许可证');
INSERT INTO `comment` VALUES (1247, 22, 0, 0, '工作效率高、专业知识扎实。', 1529600981, 4, 4, 4, '2,4,7', 1, 0, 45, '114.94.28.162', 4, '上海市-松江区', '广播电视视频点播业务经营许可证(乙种)');
INSERT INTO `comment` VALUES (1248, 21, 0, 0, 'Super surprise 超赞', 1533687932, 4, 4, 4, '1,2,4,5,6', 1, 0, 31, '114.94.28.162', 4, '上海市-静安区', '道路运输经营许可证');
INSERT INTO `comment` VALUES (1249, 20, 0, 0, '非常棒！很专业，给我们做了详尽的答疑解惑，支持，好评！', 1529445889, 4, 4, 4, '1,2,3,4,5,6,7', 1, 0, 49, '114.94.28.162', 4, '上海市-黄浦区', '进出口权许可证');
INSERT INTO `comment` VALUES (1250, 28, 0, 0, '相当满意，相当满意，相当满意。', 1528903049, 4, 4, 4, '1,2,4', 1, 0, 54, '114.94.28.162', 4, '上海市-金山区', 'ICP经营许可证');
INSERT INTO `comment` VALUES (1251, 18, 0, 0, '非常热心，对于不明白的地方都会细心解说，值得信赖及推荐~', 1532583675, 4, 4, 4, '3,5', 1, 0, 54, '114.94.28.162', 4, '上海市-青浦区', 'ICP经营许可证');
INSERT INTO `comment` VALUES (1252, 19, 0, 0, '非常热心的一位同志，细致负责。', 1533867124, 4, 4, 4, '4,6', 1, 0, 39, '114.94.28.162', 4, '上海市-闵行区', '营业性演出许可证');
INSERT INTO `comment` VALUES (1253, 18, 0, 0, '非常热心，对于不明白的地方都会细心解说，值得信赖及推荐~', 1529331673, 4, 4, 4, '2,3', 1, 0, 38, '114.94.28.162', 4, '上海市-浦东新区', '广播电视节目制作经营许可证');
INSERT INTO `comment` VALUES (1254, 29, 0, 0, '服务态度好，专业程度高，如期完成申办业务，赞！', 1530894116, 4, 4, 4, '2,4,7', 1, 0, 34, '114.94.28.162', 4, '上海市-崇明区', '食品生产经营许可证');
INSERT INTO `comment` VALUES (1255, 13, 0, 0, '再次选择，依然没有失望，办的很好，非常感谢', 1529949697, 4, 4, 4, '2,3,5', 1, 0, 47, '114.94.28.162', 4, '上海市-奉贤区', '劳务派遣经营许可证');
INSERT INTO `comment` VALUES (1256, 18, 0, 0, '好，质素高，人老实，服务好', 1531462672, 5, 5, 5, '1,4,5', 1, 0, 7, '114.94.28.162', 5, '上海市-崇明区', '个体商户注册');
INSERT INTO `comment` VALUES (1257, 29, 0, 0, '比较诚恳，做事效率比较高，专业性也不错，交给他们做很放心', 1533160028, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 220, '114.94.28.162', 5, '上海市-徐汇区', '社保开户');
INSERT INTO `comment` VALUES (1258, 12, 0, 0, '办事细心，业务很熟悉，做事认真负责', 1529524957, 5, 5, 5, '2,3,4,5,6,7', 1, 0, 5, '114.94.28.162', 5, '上海市-虹口区', '分公司注册');
INSERT INTO `comment` VALUES (1259, 29, 0, 0, '很专业，对待客户的问题细致耐心，赞', 1533768024, 5, 5, 5, '3,7', 1, 0, 7, '114.94.28.162', 5, '上海市-嘉定区', '个体商户注册');
INSERT INTO `comment` VALUES (1260, 29, 0, 0, '合作得挺愉快，希望之后还有机会合作。', 1529691519, 5, 5, 5, '4,5,7', 1, 0, 19, '114.94.28.162', 5, '上海市-松江区', '开设银行基本户');
INSERT INTO `comment` VALUES (1261, 24, 0, 0, '漂亮声音还好听做事认真知心姐姐特别有耐心', 1533124048, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 17, '114.94.28.162', 5, '上海市-长宁区', '五证合一');
INSERT INTO `comment` VALUES (1262, 241, 0, 0, '很好，满足预期，专业。', 1533698689, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 12, '114.94.28.162', 5, '上海市-奉贤区', '经营范围变更');
INSERT INTO `comment` VALUES (1263, 26, 0, 0, '业务熟练，态度温和，比较认真负责', 1529612630, 5, 5, 5, '1,2,5', 1, 0, 19, '114.94.28.162', 5, '上海市-嘉定区', '开设银行基本户');
INSERT INTO `comment` VALUES (1264, 21, 0, 0, '用心服务，用心对待；办事效率高；感谢王哥，做了几项业务了；后期有需求还是会选择您，再次感谢', 1532839394, 5, 5, 5, '1,2,4,7', 1, 0, 20, '114.94.28.162', 5, '上海市-长宁区', '银行开户预约');
INSERT INTO `comment` VALUES (1265, 241, 0, 0, '非常好的服务，每次都是很耐心的帮忙查询，给出建议', 1530606715, 5, 5, 5, '1,2,5,7', 1, 0, 17, '114.94.28.162', 5, '上海市-杨浦区', '五证合一');
INSERT INTO `comment` VALUES (1266, 2, 0, 0, '办事细心，业务很熟悉，做事认真负责', 1530011742, 5, 5, 5, '1,2,5,6,7', 1, 0, 19, '114.94.28.162', 5, '上海市-青浦区', '开设银行基本户');
INSERT INTO `comment` VALUES (1267, 26, 0, 0, '关键同志，的确服务比较好，专业内容做得好，强烈推荐', 1529100856, 5, 5, 5, '1,2,4,5,6', 1, 0, 19, '114.94.28.162', 5, '上海市-松江区', '开设银行基本户');
INSERT INTO `comment` VALUES (1268, 29, 0, 0, '真心不错，随时响应，快，且为客户着想', 1531365356, 5, 5, 5, '1,3,5,6,7', 1, 0, 111, '114.94.28.162', 5, '上海市-静安区', '字号变更');
INSERT INTO `comment` VALUES (1269, 28, 0, 0, '非常好的服务，每次都是很耐心的帮忙查询，给出建议', 1531401628, 5, 5, 5, '1,2,3,5,6', 1, 0, 219, '114.94.28.162', 5, '上海市-嘉定区', '法人一证通办理');
INSERT INTO `comment` VALUES (1270, 2, 0, 0, '挺讲信用的，不错的代办公司，以后长期合作。', 1530552772, 5, 5, 5, '1,2,3,5,6,7', 1, 0, 112, '114.94.28.162', 5, '上海市-静安区', '行业名称变更');
INSERT INTO `comment` VALUES (1271, 26, 0, 0, '非常负责和热情，态度特别好，我问的问题都很快回复，给十万个好评～', 1533701550, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 1, '114.94.28.162', 5, '上海市-嘉定区', '有限公司注册');
INSERT INTO `comment` VALUES (1272, 13, 0, 0, '还不错 可是我自己找会计了', 1529741835, 5, 5, 5, '1,2,3,4,6,7', 1, 0, 19, '114.94.28.162', 5, '上海市-虹口区', '开设银行基本户');
INSERT INTO `comment` VALUES (1273, 13, 0, 0, '效果很棒，还能及时提醒下一次什么时候办理。', 1529692390, 5, 5, 5, '1,2,3,7', 1, 0, 17, '114.94.28.162', 5, '上海市-普陀区', '五证合一');
INSERT INTO `comment` VALUES (1274, 20, 0, 0, '满意，省心省力～', 1531303234, 5, 5, 5, '1,3,4,5,7', 1, 0, 111, '114.94.28.162', 5, '上海市-长宁区', '字号变更');
INSERT INTO `comment` VALUES (1275, 19, 0, 0, '非常有责任心，时间观念超级强，很期待跟您的下次合作！！', 1533084796, 5, 5, 5, '5,7', 1, 0, 16, '114.94.28.162', 5, '上海市-自贸区', '年报公示');
INSERT INTO `comment` VALUES (1276, 20, 0, 0, '讲解耐心，充分为客户照相，做事认真', 1531172024, 5, 5, 5, '2,3,4,5,6,7', 1, 0, 10, '114.94.28.162', 5, '上海市-浦东新区', '股权变更');
INSERT INTO `comment` VALUES (1277, 21, 0, 0, '非常有责任心，时间观念超级强，很期待跟您的下次合作！！', 1531050960, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 10, '114.94.28.162', 5, '上海市-金山区', '股权变更');
INSERT INTO `comment` VALUES (1278, 26, 0, 0, '很好，满足预期，专业。', 1530217220, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 221, '114.94.28.162', 5, '上海市-长宁区', '公积金开户');
INSERT INTO `comment` VALUES (1279, 241, 0, 0, '服务态度别好，办事效率很高，对我不明白的问题进行了一个详细的讲解，很有耐心。特别的感谢这位美女的服务。', 1529729054, 5, 5, 5, '3,4,5', 1, 0, 20, '114.94.28.162', 5, '上海市-静安区', '银行开户预约');
INSERT INTO `comment` VALUES (1280, 13, 0, 0, '办事速度快，靠谱，非常专业，后期会一直合作。', 1533143337, 5, 5, 5, '1,4', 1, 0, 2, '114.94.28.162', 5, '上海市-长宁区', '股份有限公司注册');
INSERT INTO `comment` VALUES (1281, 29, 0, 0, '一周内办完流程和手续，专业度高', 1530876742, 5, 5, 5, '1,4', 1, 0, 13, '114.94.28.162', 5, '上海市-闵行区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (1282, 18, 0, 0, '业务能力强 办事利索 快', 1531076179, 5, 5, 5, '3,4,5,6', 1, 0, 10, '114.94.28.162', 5, '上海市-虹口区', '股权变更');
INSERT INTO `comment` VALUES (1283, 24, 0, 0, '真心不错，随时响应，快，且为客户着想', 1533234673, 5, 5, 5, '1,3,4,5,7', 1, 0, 12, '114.94.28.162', 5, '上海市-金山区', '经营范围变更');
INSERT INTO `comment` VALUES (1284, 242, 0, 0, '非常好。帮助并办理注册公司的整个过程。很好的的一个人', 1529767574, 5, 5, 5, '1,3,4,5,7', 1, 0, 5, '114.94.28.162', 5, '上海市-浦东新区', '分公司注册');
INSERT INTO `comment` VALUES (1285, 28, 0, 0, '业务能力强 办事利索 快', 1529183354, 5, 5, 5, '1,2,6,7', 1, 0, 7, '114.94.28.162', 5, '上海市-自贸区', '个体商户注册');
INSERT INTO `comment` VALUES (1286, 13, 0, 0, '以后办理还找他。实在感谢', 1529848202, 5, 5, 5, '2,3,6,7', 1, 0, 7, '114.94.28.162', 5, '上海市-金山区', '个体商户注册');
INSERT INTO `comment` VALUES (1287, 29, 0, 0, '很专业 有问必答 给他们做这些很放心。', 1530418340, 5, 5, 5, '1,5,6,7', 1, 0, 113, '114.94.28.162', 5, '上海市-徐汇区', '本区地址变更');
INSERT INTO `comment` VALUES (1288, 242, 0, 0, '挺讲信用的，不错的代办公司，以后长期合作。', 1531764507, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 1, '114.94.28.162', 5, '上海市-长宁区', '有限公司注册');
INSERT INTO `comment` VALUES (1289, 26, 0, 0, '现在想想还是蛮不错的，当时自己太急躁了！', 1532836067, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 12, '114.94.28.162', 5, '上海市-自贸区', '经营范围变更');
INSERT INTO `comment` VALUES (1290, 19, 0, 0, '很专业 有问必答 给他们做这些很放心。', 1534098083, 5, 5, 5, '2,3,4,5,6,7', 1, 0, 219, '114.94.28.162', 5, '上海市-奉贤区', '法人一证通办理');
INSERT INTO `comment` VALUES (1291, 24, 0, 0, '服务很周到 主要是专业，回答问题及时，太感谢了', 1533904796, 5, 5, 5, '1,2,4', 1, 0, 111, '114.94.28.162', 5, '上海市-静安区', '字号变更');
INSERT INTO `comment` VALUES (1292, 29, 0, 0, '加油，刚刚注册了公司，原来不知道这方面还有这么多需要注意的事情。学习到了很多，希望我能和你们一起成长', 1531180789, 5, 5, 5, '4,6', 1, 0, 13, '114.94.28.162', 5, '上海市-长宁区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (1293, 14, 0, 0, '以后办理还找他。实在感谢', 1533512625, 5, 5, 5, '3,5', 1, 0, 20, '114.94.28.162', 5, '上海市-崇明区', '银行开户预约');
INSERT INTO `comment` VALUES (1294, 2, 0, 0, '良好的服务和专业水准保证了业务的顺利办理', 1533097352, 5, 5, 5, '1,2,3,5,6,7', 1, 0, 19, '114.94.28.162', 5, '上海市-自贸区', '开设银行基本户');
INSERT INTO `comment` VALUES (1295, 27, 0, 0, '关键同志，的确服务比较好，专业内容做得好，强烈推荐', 1533603410, 5, 5, 5, '5,7', 1, 0, 13, '114.94.28.162', 5, '上海市-虹口区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (1296, 20, 0, 0, '办事速度快，靠谱，非常专业，后期会一直合作。', 1533046770, 5, 5, 5, '5,6', 1, 0, 1, '114.94.28.162', 5, '上海市-普陀区', '有限公司注册');
INSERT INTO `comment` VALUES (1297, 242, 0, 0, '非常好。帮助并办理注册公司的整个过程。很好的的一个人', 1532691772, 5, 5, 5, '1,2,3,4,6,7', 1, 0, 12, '114.94.28.162', 5, '上海市-金山区', '经营范围变更');
INSERT INTO `comment` VALUES (1298, 242, 0, 0, '超出预期，低调还特别有效率，赞一个', 1533176362, 5, 5, 5, '1,4,7', 1, 0, 7, '114.94.28.162', 5, '上海市-闵行区', '个体商户注册');
INSERT INTO `comment` VALUES (1299, 242, 0, 0, '一周内办完流程和手续，专业度高', 1530698034, 5, 5, 5, '2,3,4', 1, 0, 112, '114.94.28.162', 5, '上海市-松江区', '行业名称变更');
INSERT INTO `comment` VALUES (1300, 2, 0, 0, '这个注册过程还是蛮顺利的，谢谢', 1530498759, 5, 5, 5, '1,2,5,7', 1, 0, 220, '114.94.28.162', 5, '上海市-杨浦区', '社保开户');
INSERT INTO `comment` VALUES (1301, 242, 0, 0, '很专业 有问必答 给他们做这些很放心。', 1531940091, 5, 5, 5, '1,4,6,7', 1, 0, 3, '114.94.28.162', 5, '上海市-普陀区', '外商独资公司注册');
INSERT INTO `comment` VALUES (1302, 20, 0, 0, '非常好。帮助并办理注册公司的整个过程。很好的的一个人', 1531574264, 5, 5, 5, '2,3,4,5', 1, 0, 5, '114.94.28.162', 5, '上海市-杨浦区', '分公司注册');
INSERT INTO `comment` VALUES (1303, 26, 0, 0, '服务很周到 主要是专业，回答问题及时，太感谢了', 1529996412, 5, 5, 5, '1,3,4,5,6,7', 1, 0, 5, '114.94.28.162', 5, '上海市-金山区', '分公司注册');
INSERT INTO `comment` VALUES (1304, 18, 0, 0, '服务非常好。反馈的问题也得到了解决。', 1530076453, 5, 5, 5, '1,2,5,6', 1, 0, 111, '114.94.28.162', 5, '上海市-崇明区', '字号变更');
INSERT INTO `comment` VALUES (1305, 13, 0, 0, '整体满意。感谢平台遇见缘分。希望不断壮大服务提升更高水平', 1532234844, 5, 5, 5, '1,2,3,4,6,7', 1, 0, 2, '114.94.28.162', 5, '上海市-宝山区', '股份有限公司注册');
INSERT INTO `comment` VALUES (1306, 242, 0, 0, '很专业，服务很热情周到，效率很高', 1529411423, 5, 5, 5, '1,2,4', 1, 0, 220, '114.94.28.162', 5, '上海市-浦东新区', '社保开户');
INSERT INTO `comment` VALUES (1307, 18, 0, 0, '办事速度快，靠谱，非常专业，后期会一直合作。', 1530035241, 5, 5, 5, '2,3,5,6', 1, 0, 16, '114.94.28.162', 5, '上海市-黄浦区', '年报公示');
INSERT INTO `comment` VALUES (1308, 13, 0, 0, '服务很好，很细致很周到.', 1530577850, 5, 5, 5, '1,3,4,7', 1, 0, 11, '114.94.28.162', 5, '上海市-松江区', '法人变更');
INSERT INTO `comment` VALUES (1309, 28, 0, 0, '办事干净利索，非常专业 ，赞一个。', 1530707756, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 114, '114.94.28.162', 5, '上海市-宝山区', '跨区地址变更');
INSERT INTO `comment` VALUES (1310, 241, 0, 0, '办事效率高，很专业，值得信赖', 1533312191, 5, 5, 5, '2,3,4,5,7', 1, 0, 6, '114.94.28.162', 5, '上海市-青浦区', '办事处注册');
INSERT INTO `comment` VALUES (1311, 19, 0, 0, '办事速度快，靠谱，非常专业，后期会一直合作。', 1530075225, 5, 5, 5, '1,2,3,4,6', 1, 0, 6, '114.94.28.162', 5, '上海市-崇明区', '办事处注册');
INSERT INTO `comment` VALUES (1312, 12, 0, 0, '很专业 开户办理的很顺利 而且很细心 有问必答 服务效率高，很难见到这种专业而又效率的公司了，绝对好评', 1533321154, 5, 5, 5, '1,3,4,5,7', 1, 0, 115, '114.94.28.162', 5, '上海市-宝山区', '跨市地址变更');
INSERT INTO `comment` VALUES (1313, 27, 0, 0, '很专业 开户办理的很顺利 而且很细心 有问必答 服务效率高，很难见到这种专业而又效率的公司了，绝对好评', 1533738938, 5, 5, 5, '3,5,6,7', 1, 0, 3, '114.94.28.162', 5, '上海市-虹口区', '外商独资公司注册');
INSERT INTO `comment` VALUES (1314, 25, 0, 0, '满意，省心省力～', 1533457565, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 113, '114.94.28.162', 5, '上海市-崇明区', '本区地址变更');
INSERT INTO `comment` VALUES (1315, 24, 0, 0, '很专业，服务很热情周到，效率很高', 1530076457, 5, 5, 5, '2,5,6', 1, 0, 7, '114.94.28.162', 5, '上海市-金山区', '个体商户注册');
INSERT INTO `comment` VALUES (1316, 18, 0, 0, '上门服务，态度热情，办事服务满意，给赞，希望后期合作愉快！', 1529415314, 5, 5, 5, '2,6', 1, 0, 11, '114.94.28.162', 5, '上海市-闵行区', '法人变更');
INSERT INTO `comment` VALUES (1317, 242, 0, 0, '这次注册公司很顺利，虽然中间有政策变动，但是赶在变动前把一切事情都搞定了，很棒，平时有问题也及时帮我解答，不错哦~', 1529575568, 5, 5, 5, '1,2,3,5,6,7', 1, 0, 16, '114.94.28.162', 5, '上海市-青浦区', '年报公示');
INSERT INTO `comment` VALUES (1318, 19, 0, 0, '很好 办事细腻认真', 1532764089, 5, 5, 5, '3,4,5,6,7', 1, 0, 5, '114.94.28.162', 5, '上海市-自贸区', '分公司注册');
INSERT INTO `comment` VALUES (1319, 22, 0, 0, '服务态度别好，办事效率很高，对我不明白的问题进行了一个详细的讲解，很有耐心。特别的感谢这位美女的服务。', 1529792268, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 11, '114.94.28.162', 5, '上海市-奉贤区', '法人变更');
INSERT INTO `comment` VALUES (1320, 22, 0, 0, '很好，满足预期，专业。', 1533159455, 5, 5, 5, '1,6', 1, 0, 5, '114.94.28.162', 5, '上海市-金山区', '分公司注册');
INSERT INTO `comment` VALUES (1321, 13, 0, 0, '很好 办事细腻认真', 1531395063, 5, 5, 5, '1,2,6,7', 1, 0, 7, '114.94.28.162', 5, '上海市-虹口区', '个体商户注册');
INSERT INTO `comment` VALUES (1322, 14, 0, 0, '很专业 开户办理的很顺利 而且很细心 有问必答 服务效率高，很难见到这种专业而又效率的公司了，绝对好评', 1531225987, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 17, '114.94.28.162', 5, '上海市-静安区', '五证合一');
INSERT INTO `comment` VALUES (1323, 29, 0, 0, '还不错 可是我自己找会计了', 1534139619, 5, 5, 5, '2,7', 1, 0, 15, '114.94.28.162', 5, '上海市-崇明区', '一般注销');
INSERT INTO `comment` VALUES (1324, 20, 0, 0, '以后办理还找他。实在感谢', 1529830243, 5, 5, 5, '4,5,6', 1, 0, 12, '114.94.28.162', 5, '上海市-杨浦区', '经营范围变更');
INSERT INTO `comment` VALUES (1325, 13, 0, 0, '服务很周到 主要是专业，回答问题及时，太感谢了', 1531760660, 5, 5, 5, '1,3', 1, 0, 114, '114.94.28.162', 5, '上海市-长宁区', '跨区地址变更');
INSERT INTO `comment` VALUES (1326, 24, 0, 0, '比较诚恳，做事效率比较高，专业性也不错，交给他们做很放心', 1532016744, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 114, '114.94.28.162', 5, '上海市-青浦区', '跨区地址变更');
INSERT INTO `comment` VALUES (1327, 21, 0, 0, '非常好。谢谢。', 1533933541, 5, 5, 5, '2,3,7', 1, 0, 12, '114.94.28.162', 5, '上海市-虹口区', '经营范围变更');
INSERT INTO `comment` VALUES (1328, 12, 0, 0, '很不错，响应和服务都很好。', 1531150132, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 3, '114.94.28.162', 5, '上海市-宝山区', '外商独资公司注册');
INSERT INTO `comment` VALUES (1329, 13, 0, 0, '态度非常好，人很耐心，有亲和力，有问必答，服务很周到。', 1530112385, 5, 5, 5, '2,7', 1, 0, 221, '114.94.28.162', 5, '上海市-松江区', '公积金开户');
INSERT INTO `comment` VALUES (1330, 18, 0, 0, '服务很好，很细致很周到.', 1532342438, 5, 5, 5, '3,4', 1, 0, 13, '114.94.28.162', 5, '上海市-黄浦区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (1331, 24, 0, 0, '整体满意。感谢平台遇见缘分。希望不断壮大服务提升更高水平', 1532590624, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 6, '114.94.28.162', 5, '上海市-闵行区', '办事处注册');
INSERT INTO `comment` VALUES (1332, 12, 0, 0, '现在想想还是蛮不错的，当时自己太急躁了！', 1531348252, 5, 5, 5, '1,2,3,4,5', 1, 0, 19, '114.94.28.162', 5, '上海市-虹口区', '开设银行基本户');
INSERT INTO `comment` VALUES (1333, 18, 0, 0, '很好 办事细腻认真', 1533427678, 5, 5, 5, '5,7', 1, 0, 112, '114.94.28.162', 5, '上海市-长宁区', '行业名称变更');
INSERT INTO `comment` VALUES (1334, 19, 0, 0, '讲解耐心，充分为客户照相，做事认真', 1528900352, 5, 5, 5, '1,2,3,4,6,7', 1, 0, 111, '114.94.28.162', 5, '上海市-崇明区', '字号变更');
INSERT INTO `comment` VALUES (1335, 21, 0, 0, '真心不错，随时响应，快，且为客户着想', 1533571460, 5, 5, 5, '3,4', 1, 0, 13, '114.94.28.162', 5, '上海市-自贸区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (1336, 27, 0, 0, '比较诚恳，做事效率比较高，专业性也不错，交给他们做很放心', 1531862909, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 14, '114.94.28.162', 5, '上海市-松江区', '简易注销');
INSERT INTO `comment` VALUES (1337, 28, 0, 0, '服务细心，非常专业，能切实解决问题，推荐！', 1532581076, 5, 5, 5, '3,6,7', 1, 0, 220, '114.94.28.162', 5, '上海市-黄浦区', '社保开户');
INSERT INTO `comment` VALUES (1338, 22, 0, 0, '现在想想还是蛮不错的，当时自己太急躁了！', 1532900078, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 4, '114.94.28.162', 5, '上海市-金山区', '合伙企业注册');
INSERT INTO `comment` VALUES (1339, 18, 0, 0, '越努力就越辛运，以后有机会合作！', 1531118098, 5, 5, 5, '1,2,4,6', 1, 0, 115, '114.94.28.162', 5, '上海市-金山区', '跨市地址变更');
INSERT INTO `comment` VALUES (1340, 12, 0, 0, '因为要实地注册地址，所以遇到一些麻烦，但是还是非常耐心的帮忙询问，且在原本预计的时间之内拿到营业执照，还是非常感谢的。', 1533646516, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 4, '114.94.28.162', 5, '上海市-嘉定区', '合伙企业注册');
INSERT INTO `comment` VALUES (1341, 14, 0, 0, '很专业，服务很热情周到，效率很高', 1529262280, 5, 5, 5, '1,4,5,6,7', 1, 0, 17, '114.94.28.162', 5, '上海市-宝山区', '五证合一');
INSERT INTO `comment` VALUES (1342, 12, 0, 0, '办事效率高，主动热情', 1532048716, 5, 5, 5, '1,6,7', 1, 0, 2, '114.94.28.162', 5, '上海市-金山区', '股份有限公司注册');
INSERT INTO `comment` VALUES (1343, 24, 0, 0, '很专业，服务很热情周到，效率很高', 1533074442, 5, 5, 5, '4,5,6,7', 1, 0, 221, '114.94.28.162', 5, '上海市-金山区', '公积金开户');
INSERT INTO `comment` VALUES (1344, 241, 0, 0, '办事效率还是挺高的，也很会为客户着想。', 1529988816, 5, 5, 5, '1,2,4,5,7', 1, 0, 12, '114.94.28.162', 5, '上海市-金山区', '经营范围变更');
INSERT INTO `comment` VALUES (1345, 12, 0, 0, '漂亮声音还好听做事认真知心姐姐特别有耐心', 1529428265, 5, 5, 5, '1,2,5,7', 1, 0, 20, '114.94.28.162', 5, '上海市-金山区', '银行开户预约');
INSERT INTO `comment` VALUES (1346, 28, 0, 0, '非常迅速，反馈也很及时，没想到这么快办完了。非常满意的一次服务', 1533843451, 5, 5, 5, '1,5,6', 1, 0, 6, '114.94.28.162', 5, '上海市-徐汇区', '办事处注册');
INSERT INTO `comment` VALUES (1347, 29, 0, 0, '办事干净利索，非常专业 ，赞一个。', 1529138998, 5, 5, 5, '3,4,5', 1, 0, 4, '114.94.28.162', 5, '上海市-杨浦区', '合伙企业注册');
INSERT INTO `comment` VALUES (1348, 24, 0, 0, '超预期的服务体验，大力推荐。以后我们公司业务就找你了。蒸蒸日上哦', 1531758004, 5, 5, 5, '2,3,5,7', 1, 0, 3, '114.94.28.162', 5, '上海市-金山区', '外商独资公司注册');
INSERT INTO `comment` VALUES (1349, 27, 0, 0, '好评，快速，可以长期深入合作', 1532586804, 5, 5, 5, '2,4,5,7', 1, 0, 114, '114.94.28.162', 5, '上海市-长宁区', '跨区地址变更');
INSERT INTO `comment` VALUES (1350, 21, 0, 0, '效果很棒，还能及时提醒下一次什么时候办理。', 1531232240, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 111, '114.94.28.162', 5, '上海市-宝山区', '字号变更');
INSERT INTO `comment` VALUES (1351, 22, 0, 0, '非常好。帮助并办理注册公司的整个过程。很好的的一个人', 1533028008, 5, 5, 5, '2,4,6,7', 1, 0, 4, '114.94.28.162', 5, '上海市-徐汇区', '合伙企业注册');
INSERT INTO `comment` VALUES (1352, 26, 0, 0, '很有责任心，专业热情，有问必答，真的很有耐心，我有好多不了解的事情Dear耐心帮我解答，32个赞！！！！', 1534100919, 5, 5, 5, '2,3,4,5,6,7', 1, 0, 19, '114.94.28.162', 5, '上海市-杨浦区', '开设银行基本户');
INSERT INTO `comment` VALUES (1353, 14, 0, 0, '不错，办事效率挺高，沟通到位，回复及时', 1530288851, 5, 5, 5, '1,3,7', 1, 0, 11, '114.94.28.162', 5, '上海市-浦东新区', '法人变更');
INSERT INTO `comment` VALUES (1354, 24, 0, 0, '办事速度快，靠谱，非常专业，后期会一直合作。', 1531358492, 5, 5, 5, '1,2,3,4,6,7', 1, 0, 19, '114.94.28.162', 5, '上海市-闵行区', '开设银行基本户');
INSERT INTO `comment` VALUES (1355, 14, 0, 0, '业务熟练，态度温和，比较认真负责', 1531671814, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 114, '114.94.28.162', 5, '上海市-宝山区', '跨区地址变更');
INSERT INTO `comment` VALUES (1356, 20, 0, 0, '积极配合帮助我们想办法解决注册、银行开户中的各种问题，谢谢。下次注册还找你们', 1530634300, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 4, '114.94.28.162', 5, '上海市-金山区', '合伙企业注册');
INSERT INTO `comment` VALUES (1357, 29, 0, 0, '业务能力强 办事利索 快', 1530654885, 5, 5, 5, '1,2,4,5,6', 1, 0, 19, '114.94.28.162', 5, '上海市-青浦区', '开设银行基本户');
INSERT INTO `comment` VALUES (1358, 29, 0, 0, '非常感谢，长期合作，祝事业蒸蒸日上', 1531516114, 5, 5, 5, '1,2,3,4,7', 1, 0, 10, '114.94.28.162', 5, '上海市-普陀区', '股权变更');
INSERT INTO `comment` VALUES (1359, 2, 0, 0, '不错，办事效率挺高，沟通到位，回复及时', 1530504092, 5, 5, 5, '2,3,5,6,7', 1, 0, 113, '114.94.28.162', 5, '上海市-徐汇区', '本区地址变更');
INSERT INTO `comment` VALUES (1360, 20, 0, 0, '一气呵成，服务周到，值得推荐', 1531954986, 5, 5, 5, '1,3', 1, 0, 14, '114.94.28.162', 5, '上海市-黄浦区', '简易注销');
INSERT INTO `comment` VALUES (1361, 14, 0, 0, '非常感谢，长期合作，祝事业蒸蒸日上', 1532571669, 5, 5, 5, '1,2,3,4,5,6', 1, 0, 112, '114.94.28.162', 5, '上海市-自贸区', '行业名称变更');
INSERT INTO `comment` VALUES (1362, 2, 0, 0, '非常棒的服务，沟通顺畅，有耐心', 1529378115, 5, 5, 5, '2,3,6', 1, 0, 115, '114.94.28.162', 5, '上海市-普陀区', '跨市地址变更');
INSERT INTO `comment` VALUES (1363, 13, 0, 0, '办事效率高，很专业，值得信赖', 1533777342, 5, 5, 5, '1,3,5,6', 1, 0, 1, '114.94.28.162', 5, '上海市-金山区', '有限公司注册');
INSERT INTO `comment` VALUES (1364, 18, 0, 0, '服务态度别好，办事效率很高，对我不明白的问题进行了一个详细的讲解，很有耐心。特别的感谢这位美女的服务。', 1530971816, 5, 5, 5, '1,3,4,6,7', 1, 0, 221, '114.94.28.162', 5, '上海市-崇明区', '公积金开户');
INSERT INTO `comment` VALUES (1365, 28, 0, 0, '非常负责和热情，态度特别好，我问的问题都很快回复，给十万个好评～', 1529885649, 5, 5, 5, '1,2,4,5', 1, 0, 115, '114.94.28.162', 5, '上海市-浦东新区', '跨市地址变更');
INSERT INTO `comment` VALUES (1366, 29, 0, 0, '非常好的服务，每次都是很耐心的帮忙查询，给出建议', 1530780221, 5, 5, 5, '1,3,6', 1, 0, 6, '114.94.28.162', 5, '上海市-崇明区', '办事处注册');
INSERT INTO `comment` VALUES (1367, 21, 0, 0, '很不错，响应和服务都很好。', 1533333903, 5, 5, 5, '2,3,4,6', 1, 0, 112, '114.94.28.162', 5, '上海市-黄浦区', '行业名称变更');
INSERT INTO `comment` VALUES (1368, 26, 0, 0, '合作很愉快！服务态度好专业程度高', 1532742471, 5, 5, 5, '1,2,3,4,7', 1, 0, 5, '114.94.28.162', 5, '上海市-奉贤区', '分公司注册');
INSERT INTO `comment` VALUES (1369, 20, 0, 0, '讲解耐心，充分为客户照相，做事认真', 1530850164, 5, 5, 5, '2,7', 1, 0, 111, '114.94.28.162', 5, '上海市-金山区', '字号变更');
INSERT INTO `comment` VALUES (1370, 241, 0, 0, '服务很周到 主要是专业，回答问题及时，太感谢了', 1533369786, 5, 5, 5, '1,3,4', 1, 0, 221, '114.94.28.162', 5, '上海市-普陀区', '公积金开户');
INSERT INTO `comment` VALUES (1371, 24, 0, 0, '加油，刚刚注册了公司，原来不知道这方面还有这么多需要注意的事情。学习到了很多，希望我能和你们一起成长', 1530582279, 5, 5, 5, '1,2,6,7', 1, 0, 16, '114.94.28.162', 5, '上海市-奉贤区', '年报公示');
INSERT INTO `comment` VALUES (1372, 29, 0, 0, '超出预期，低调还特别有效率，赞一个', 1533316093, 5, 5, 5, '1,4,5,6', 1, 0, 20, '114.94.28.162', 5, '上海市-普陀区', '银行开户预约');
INSERT INTO `comment` VALUES (1373, 25, 0, 0, '非常有耐心的一个人，是个好姑凉，希望老板多给她加薪奖励。', 1533550771, 5, 5, 5, '2,5,6,7', 1, 0, 10, '114.94.28.162', 5, '上海市-长宁区', '股权变更');
INSERT INTO `comment` VALUES (1374, 26, 0, 0, '很专业，服务很热情周到，效率很高', 1530996012, 5, 5, 5, '1,2,3,5,6,7', 1, 0, 2, '114.94.28.162', 5, '上海市-浦东新区', '股份有限公司注册');
INSERT INTO `comment` VALUES (1375, 18, 0, 0, '业务熟练，态度温和，比较认真负责', 1531900557, 5, 5, 5, '1,5,7', 1, 0, 219, '114.94.28.162', 5, '上海市-杨浦区', '法人一证通办理');
INSERT INTO `comment` VALUES (1376, 28, 0, 0, '非常棒的服务，沟通顺畅，有耐心', 1534020869, 5, 5, 5, '5,6', 1, 0, 20, '114.94.28.162', 5, '上海市-浦东新区', '银行开户预约');
INSERT INTO `comment` VALUES (1377, 19, 0, 0, '很感谢两位，公司注册好了，沟通很顺畅，服务很到位，希望下次继续合作。', 1532983204, 5, 5, 5, '2,3,4,5,7', 1, 0, 112, '114.94.28.162', 5, '上海市-自贸区', '行业名称变更');
INSERT INTO `comment` VALUES (1378, 28, 0, 0, '办事效率还是挺高的，也很会为客户着想。', 1533879491, 5, 5, 5, '2,7', 1, 0, 19, '114.94.28.162', 5, '上海市-静安区', '开设银行基本户');
INSERT INTO `comment` VALUES (1379, 22, 0, 0, '好评，快速，可以长期深入合作', 1532507862, 5, 5, 5, '2,3,6', 1, 0, 17, '114.94.28.162', 5, '上海市-闵行区', '五证合一');
INSERT INTO `comment` VALUES (1380, 28, 0, 0, '服务质量很好，时间也在正常中', 1530716187, 5, 5, 5, '1,2,3,5,7', 1, 0, 219, '114.94.28.162', 5, '上海市-金山区', '法人一证通办理');
INSERT INTO `comment` VALUES (1381, 2, 0, 0, '真心不错，随时响应，快，且为客户着想', 1531213464, 5, 5, 5, '1,2,3,4,6,7', 1, 0, 114, '114.94.28.162', 5, '上海市-自贸区', '跨区地址变更');
INSERT INTO `comment` VALUES (1382, 21, 0, 0, '很不错，响应和服务都很好。', 1529673574, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 3, '114.94.28.162', 5, '上海市-崇明区', '外商独资公司注册');
INSERT INTO `comment` VALUES (1383, 28, 0, 0, '细心，耐心，专业，给力！', 1532725687, 5, 5, 5, '1,5,6,7', 1, 0, 12, '114.94.28.162', 5, '上海市-黄浦区', '经营范围变更');
INSERT INTO `comment` VALUES (1384, 2, 0, 0, '良好的服务和专业水准保证了业务的顺利办理', 1534071784, 5, 5, 5, '2,6,7', 1, 0, 17, '114.94.28.162', 5, '上海市-静安区', '五证合一');
INSERT INTO `comment` VALUES (1385, 241, 0, 0, '服务非常好。反馈的问题也得到了解决。', 1529144331, 5, 5, 5, '1,5,6,7', 1, 0, 19, '114.94.28.162', 5, '上海市-杨浦区', '开设银行基本户');
INSERT INTO `comment` VALUES (1386, 27, 0, 0, '合作很愉快！服务态度好专业程度高', 1530683276, 5, 5, 5, '2,3', 1, 0, 7, '114.94.28.162', 5, '上海市-奉贤区', '个体商户注册');
INSERT INTO `comment` VALUES (1387, 13, 0, 0, '效果很棒，还能及时提醒下一次什么时候办理。', 1532852682, 5, 5, 5, '4,6,7', 1, 0, 221, '114.94.28.162', 5, '上海市-闵行区', '公积金开户');
INSERT INTO `comment` VALUES (1388, 29, 0, 0, '非常迅速，反馈也很及时，没想到这么快办完了。非常满意的一次服务', 1532371864, 5, 5, 5, '1,2,4,5,6,7', 1, 0, 3, '114.94.28.162', 5, '上海市-奉贤区', '外商独资公司注册');
INSERT INTO `comment` VALUES (1389, 26, 0, 0, '非常好 本人有很多相关知识都不懂 问了很多问题 回答都很及时', 1531358160, 5, 5, 5, '1,2,3,4,6,7', 1, 0, 4, '114.94.28.162', 5, '上海市-宝山区', '合伙企业注册');
INSERT INTO `comment` VALUES (1390, 21, 0, 0, '非常好。帮助并办理注册公司的整个过程。很好的的一个人', 1529317727, 5, 5, 5, '4,5,6,7', 1, 0, 112, '114.94.28.162', 5, '上海市-金山区', '行业名称变更');
INSERT INTO `comment` VALUES (1391, 28, 0, 0, '业务熟练，态度温和，比较认真负责', 1530290398, 5, 5, 5, '1,4,5,6', 1, 0, 10, '114.94.28.162', 5, '上海市-虹口区', '股权变更');
INSERT INTO `comment` VALUES (1392, 29, 0, 0, '越努力就越辛运，以后有机会合作！', 1529988592, 5, 5, 5, '3,4,7', 1, 0, 16, '114.94.28.162', 5, '上海市-松江区', '年报公示');
INSERT INTO `comment` VALUES (1393, 25, 0, 0, '非常好 本人有很多相关知识都不懂 问了很多问题 回答都很及时', 1529446061, 5, 5, 5, '1,3,4,5,6,7', 1, 0, 5, '114.94.28.162', 5, '上海市-自贸区', '分公司注册');
INSERT INTO `comment` VALUES (1394, 24, 0, 0, '业务熟练，态度温和，比较认真负责', 1531392929, 5, 5, 5, '2,5', 1, 0, 113, '114.94.28.162', 5, '上海市-浦东新区', '本区地址变更');
INSERT INTO `comment` VALUES (1395, 20, 0, 0, '非常好。帮助并办理注册公司的整个过程。很好的的一个人', 1531560763, 5, 5, 5, '1,4,5,6', 1, 0, 13, '114.94.28.162', 5, '上海市-闵行区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (1396, 25, 0, 0, '以后办理还找他。实在感谢', 1534095395, 5, 5, 5, '1,2,3,4,5,7', 1, 0, 19, '114.94.28.162', 5, '上海市-松江区', '开设银行基本户');
INSERT INTO `comment` VALUES (1397, 28, 0, 0, '服务很好，很细致很周到.', 1532397490, 5, 5, 5, '1,3,5,7', 1, 0, 6, '114.94.28.162', 5, '上海市-闵行区', '办事处注册');
INSERT INTO `comment` VALUES (1398, 2, 0, 0, '积极配合帮助我们想办法解决注册、银行开户中的各种问题，谢谢。下次注册还找你们', 1532818207, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 19, '114.94.28.162', 5, '上海市-浦东新区', '开设银行基本户');
INSERT INTO `comment` VALUES (1399, 27, 0, 0, '良好的服务和专业水准保证了业务的顺利办理', 1530433133, 5, 5, 5, '1,3,4,5,6', 1, 0, 114, '114.94.28.162', 5, '上海市-杨浦区', '跨区地址变更');
INSERT INTO `comment` VALUES (1400, 21, 0, 0, '很好 办事细腻认真', 1533933391, 5, 5, 5, '1,2,3,4,5,6', 1, 0, 7, '114.94.28.162', 5, '上海市-宝山区', '个体商户注册');
INSERT INTO `comment` VALUES (1401, 241, 0, 0, '关键同志，的确服务比较好，专业内容做得好，强烈推荐', 1532708722, 5, 5, 5, '1,2,4,5,6,7', 1, 0, 7, '114.94.28.162', 5, '上海市-松江区', '个体商户注册');
INSERT INTO `comment` VALUES (1402, 28, 0, 0, '很感谢两位，公司注册好了，沟通很顺畅，服务很到位，希望下次继续合作。', 1531333934, 5, 5, 5, '2,3,5,6,7', 1, 0, 20, '114.94.28.162', 5, '上海市-静安区', '银行开户预约');
INSERT INTO `comment` VALUES (1403, 29, 0, 0, '非常感谢，长期合作，祝事业蒸蒸日上', 1530826061, 5, 5, 5, '1,2,4,5,6,7', 1, 0, 115, '114.94.28.162', 5, '上海市-青浦区', '跨市地址变更');
INSERT INTO `comment` VALUES (1404, 28, 0, 0, '合作得挺愉快，希望之后还有机会合作。', 1530937819, 5, 5, 5, '3,4,5,6,7', 1, 0, 15, '114.94.28.162', 5, '上海市-黄浦区', '一般注销');
INSERT INTO `comment` VALUES (1405, 13, 0, 0, '很好 办事细腻认真', 1529829151, 5, 5, 5, '1,7', 1, 0, 13, '114.94.28.162', 5, '上海市-松江区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (1406, 18, 0, 0, '服务质量很好，时间也在正常中', 1532530893, 5, 5, 5, '1,2,3,4,6,7', 1, 0, 14, '114.94.28.162', 5, '上海市-金山区', '简易注销');
INSERT INTO `comment` VALUES (1407, 24, 0, 0, '為人民服務 不忘初心 继续前进', 1529690883, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 5, '114.94.28.162', 5, '上海市-青浦区', '分公司注册');
INSERT INTO `comment` VALUES (1408, 24, 0, 0, '好评，快速，可以长期深入合作', 1529413552, 5, 5, 5, '1,2,3,4,6', 1, 0, 113, '114.94.28.162', 5, '上海市-徐汇区', '本区地址变更');
INSERT INTO `comment` VALUES (1409, 28, 0, 0, '非常好的服务，每次都是很耐心的帮忙查询，给出建议', 1530420523, 5, 5, 5, '1,4,5,6', 1, 0, 219, '114.94.28.162', 5, '上海市-静安区', '法人一证通办理');
INSERT INTO `comment` VALUES (1410, 24, 0, 0, '积极配合帮助我们想办法解决注册、银行开户中的各种问题，谢谢。下次注册还找你们', 1529402568, 5, 5, 5, '1,2,5,7', 1, 0, 13, '114.94.28.162', 5, '上海市-黄浦区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (1411, 14, 0, 0, '非常棒的服务，沟通顺畅，有耐心', 1529115007, 5, 5, 5, '2,3,4,5,6,7', 1, 0, 11, '114.94.28.162', 5, '上海市-金山区', '法人变更');
INSERT INTO `comment` VALUES (1412, 242, 0, 0, '很感谢两位，公司注册好了，沟通很顺畅，服务很到位，希望下次继续合作。', 1529800607, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 16, '114.94.28.162', 5, '上海市-奉贤区', '年报公示');
INSERT INTO `comment` VALUES (1413, 28, 0, 0, '非常棒的服务，沟通顺畅，有耐心', 1529451481, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 221, '114.94.28.162', 5, '上海市-闵行区', '公积金开户');
INSERT INTO `comment` VALUES (1414, 241, 0, 0, '非常棒的体验。省事省心。专业、给力。', 1530248854, 5, 5, 5, '4,5', 1, 0, 113, '114.94.28.162', 5, '上海市-自贸区', '本区地址变更');
INSERT INTO `comment` VALUES (1415, 22, 0, 0, '办事效率高，很专业，值得信赖', 1532651740, 5, 5, 5, '1,2,3,5,6,7', 1, 0, 113, '114.94.28.162', 5, '上海市-黄浦区', '本区地址变更');
INSERT INTO `comment` VALUES (1416, 19, 0, 0, '加油，刚刚注册了公司，原来不知道这方面还有这么多需要注意的事情。学习到了很多，希望我能和你们一起成长', 1530520087, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 14, '114.94.28.162', 5, '上海市-徐汇区', '简易注销');
INSERT INTO `comment` VALUES (1417, 19, 0, 0, '办事干净利索，非常专业 ，赞一个。', 1532886383, 5, 5, 5, '1,6,7', 1, 0, 112, '114.94.28.162', 5, '上海市-长宁区', '行业名称变更');
INSERT INTO `comment` VALUES (1418, 19, 0, 0, '服务很周到 主要是专业，回答问题及时，太感谢了', 1528962485, 5, 5, 5, '1,2,4', 1, 0, 13, '114.94.28.162', 5, '上海市-普陀区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (1419, 22, 0, 0, '一周内办完流程和手续，专业度高', 1532232488, 5, 5, 5, '3,5,6,7', 1, 0, 111, '114.94.28.162', 5, '上海市-黄浦区', '字号变更');
INSERT INTO `comment` VALUES (1420, 26, 0, 0, '很专业 开户办理的很顺利 而且很细心 有问必答 服务效率高，很难见到这种专业而又效率的公司了，绝对好评', 1530715359, 5, 5, 5, '1,3,6,7', 1, 0, 6, '114.94.28.162', 5, '上海市-普陀区', '办事处注册');
INSERT INTO `comment` VALUES (1421, 22, 0, 0, '非常棒的服务，沟通顺畅，有耐心', 1529079620, 5, 5, 5, '1,2,3,4,5', 1, 0, 15, '114.94.28.162', 5, '上海市-徐汇区', '一般注销');
INSERT INTO `comment` VALUES (1422, 2, 0, 0, '上门服务，态度热情，办事服务满意，给赞，希望后期合作愉快！', 1531690624, 5, 5, 5, '1,4,5,6,7', 1, 0, 5, '114.94.28.162', 5, '上海市-青浦区', '分公司注册');
INSERT INTO `comment` VALUES (1423, 25, 0, 0, '良好的服务和专业水准保证了业务的顺利办理', 1529102002, 5, 5, 5, '2,3,4,5,6,7', 1, 0, 221, '114.94.28.162', 5, '上海市-松江区', '公积金开户');
INSERT INTO `comment` VALUES (1424, 28, 0, 0, '很专业 开户办理的很顺利 而且很细心 有问必答 服务效率高，很难见到这种专业而又效率的公司了，绝对好评', 1529891820, 5, 5, 5, '1,2,3,5,6,7', 1, 0, 6, '114.94.28.162', 5, '上海市-杨浦区', '办事处注册');
INSERT INTO `comment` VALUES (1425, 29, 0, 0, '很感谢两位，公司注册好了，沟通很顺畅，服务很到位，希望下次继续合作。', 1529588531, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 221, '114.94.28.162', 5, '上海市-闵行区', '公积金开户');
INSERT INTO `comment` VALUES (1426, 19, 0, 0, '非常感谢，长期合作，祝事业蒸蒸日上', 1534048607, 5, 5, 5, '1,2,3,4,7', 1, 0, 19, '114.94.28.162', 5, '上海市-黄浦区', '开设银行基本户');
INSERT INTO `comment` VALUES (1427, 14, 0, 0, '合作很愉快！服务态度好专业程度高', 1532311601, 5, 5, 5, '1,3,4,5', 1, 0, 219, '114.94.28.162', 5, '上海市-长宁区', '法人一证通办理');
INSERT INTO `comment` VALUES (1428, 27, 0, 0, '很专业，对待客户的问题细致耐心，赞', 1529122984, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 220, '114.94.28.162', 5, '上海市-宝山区', '社保开户');
INSERT INTO `comment` VALUES (1429, 13, 0, 0, '良好的服务和专业水准保证了业务的顺利办理', 1531405317, 5, 5, 5, '2,3,5,6', 1, 0, 18, '114.94.28.162', 5, '上海市-长宁区', '工商解异常');
INSERT INTO `comment` VALUES (1430, 242, 0, 0, '好评，快速，可以长期深入合作', 1529772229, 5, 5, 5, '2,4,5', 1, 0, 18, '114.94.28.162', 5, '上海市-静安区', '工商解异常');
INSERT INTO `comment` VALUES (1431, 29, 0, 0, '细心，耐心，专业，给力！', 1529372602, 5, 5, 5, '1,2,4', 1, 0, 219, '114.94.28.162', 5, '上海市-静安区', '法人一证通办理');
INSERT INTO `comment` VALUES (1432, 242, 0, 0, '关键同志，的确服务比较好，专业内容做得好，强烈推荐', 1530434228, 5, 5, 5, '2,3,4,5', 1, 0, 113, '114.94.28.162', 5, '上海市-普陀区', '本区地址变更');
INSERT INTO `comment` VALUES (1433, 18, 0, 0, '非常好 本人有很多相关知识都不懂 问了很多问题 回答都很及时', 1529459544, 5, 5, 5, '1,2,5,7', 1, 0, 1, '114.94.28.162', 5, '上海市-静安区', '有限公司注册');
INSERT INTO `comment` VALUES (1434, 242, 0, 0, '办事细心，业务很熟悉，做事认真负责', 1529106809, 5, 5, 5, '6,7', 1, 0, 2, '114.94.28.162', 5, '上海市-浦东新区', '股份有限公司注册');
INSERT INTO `comment` VALUES (1435, 242, 0, 0, '服务态度别好，办事效率很高，对我不明白的问题进行了一个详细的讲解，很有耐心。特别的感谢这位美女的服务。', 1533880575, 5, 5, 5, '5,7', 1, 0, 14, '114.94.28.162', 5, '上海市-黄浦区', '简易注销');
INSERT INTO `comment` VALUES (1436, 26, 0, 0, '办事效率高，很专业，值得信赖', 1529475219, 5, 5, 5, '2,4,5', 1, 0, 6, '114.94.28.162', 5, '上海市-浦东新区', '办事处注册');
INSERT INTO `comment` VALUES (1437, 242, 0, 0, '办事干净利索，非常专业 ，赞一个。', 1531738152, 5, 5, 5, '2,3,4,7', 1, 0, 5, '114.94.28.162', 5, '上海市-浦东新区', '分公司注册');
INSERT INTO `comment` VALUES (1438, 25, 0, 0, '现在想想还是蛮不错的，当时自己太急躁了！', 1530631599, 5, 5, 5, '1,3,4,5,6,7', 1, 0, 220, '114.94.28.162', 5, '上海市-金山区', '社保开户');
INSERT INTO `comment` VALUES (1439, 27, 0, 0, '细心，耐心，专业，给力！', 1531254297, 5, 5, 5, '2,5,6', 1, 0, 13, '114.94.28.162', 5, '上海市-浦东新区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (1440, 18, 0, 0, '合作得挺愉快，希望之后还有机会合作。', 1533357779, 5, 5, 5, '1,2,3', 1, 0, 3, '114.94.28.162', 5, '上海市-杨浦区', '外商独资公司注册');
INSERT INTO `comment` VALUES (1441, 14, 0, 0, '合作得挺愉快，希望之后还有机会合作。', 1532623637, 5, 5, 5, '1,2,4,5,7', 1, 0, 12, '114.94.28.162', 5, '上海市-静安区', '经营范围变更');
INSERT INTO `comment` VALUES (1442, 29, 0, 0, '这次注册公司很顺利，虽然中间有政策变动，但是赶在变动前把一切事情都搞定了，很棒，平时有问题也及时帮我解答，不错哦~', 1532791798, 5, 5, 5, '1,3,5,6,7', 1, 0, 5, '114.94.28.162', 5, '上海市-浦东新区', '分公司注册');
INSERT INTO `comment` VALUES (1443, 242, 0, 0, '合作得挺愉快，希望之后还有机会合作。', 1532092507, 5, 5, 5, '1,3,5,6', 1, 0, 221, '114.94.28.162', 5, '上海市-奉贤区', '公积金开户');
INSERT INTO `comment` VALUES (1444, 26, 0, 0, '以后办理还找他。实在感谢', 1530150146, 5, 5, 5, '1,2,4,5,6,7', 1, 0, 220, '114.94.28.162', 5, '上海市-嘉定区', '社保开户');
INSERT INTO `comment` VALUES (1445, 20, 0, 0, '很专业，服务很热情周到，效率很高', 1533333471, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 15, '114.94.28.162', 5, '上海市-奉贤区', '一般注销');
INSERT INTO `comment` VALUES (1446, 14, 0, 0, '漂亮声音还好听做事认真知心姐姐特别有耐心', 1530031047, 5, 5, 5, '1,2,3,4,6', 1, 0, 219, '114.94.28.162', 5, '上海市-杨浦区', '法人一证通办理');
INSERT INTO `comment` VALUES (1447, 28, 0, 0, '服务很好，很细致很周到.', 1530157904, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 15, '114.94.28.162', 5, '上海市-奉贤区', '一般注销');
INSERT INTO `comment` VALUES (1448, 26, 0, 0, '整体满意。感谢平台遇见缘分。希望不断壮大服务提升更高水平', 1532973749, 5, 5, 5, '1,3,4,6', 1, 0, 6, '114.94.28.162', 5, '上海市-青浦区', '办事处注册');
INSERT INTO `comment` VALUES (1449, 26, 0, 0, '比较诚恳，做事效率比较高，专业性也不错，交给他们做很放心', 1532381037, 5, 5, 5, '1,2,3,5,7', 1, 0, 16, '114.94.28.162', 5, '上海市-崇明区', '年报公示');
INSERT INTO `comment` VALUES (1450, 25, 0, 0, '办事干净利索，非常专业 ，赞一个。', 1530313263, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 114, '114.94.28.162', 5, '上海市-闵行区', '跨区地址变更');
INSERT INTO `comment` VALUES (1451, 27, 0, 0, '整体满意。感谢平台遇见缘分。希望不断壮大服务提升更高水平', 1532256316, 5, 5, 5, '2,3,4,5,7', 1, 0, 4, '114.94.28.162', 5, '上海市-宝山区', '合伙企业注册');
INSERT INTO `comment` VALUES (1452, 13, 0, 0, '业务能力强 办事利索 快', 1530447377, 5, 5, 5, '1,3,4,6,7', 1, 0, 115, '114.94.28.162', 5, '上海市-崇明区', '跨市地址变更');
INSERT INTO `comment` VALUES (1453, 25, 0, 0, '处处为客户着想，非常的专业！', 1531006619, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 6, '114.94.28.162', 5, '上海市-杨浦区', '办事处注册');
INSERT INTO `comment` VALUES (1454, 27, 0, 0, '很专业，服务很热情周到，效率很高', 1530473275, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 115, '114.94.28.162', 5, '上海市-宝山区', '跨市地址变更');
INSERT INTO `comment` VALUES (1455, 21, 0, 0, '办事速度快，靠谱，非常专业，后期会一直合作。', 1531840450, 5, 5, 5, '1,2,3,4,6,7', 1, 0, 14, '114.94.28.162', 5, '上海市-长宁区', '简易注销');
INSERT INTO `comment` VALUES (1456, 2, 0, 0, '讲解耐心，充分为客户照相，做事认真', 1530691478, 5, 5, 5, '6,7', 1, 0, 113, '114.94.28.162', 5, '上海市-崇明区', '本区地址变更');
INSERT INTO `comment` VALUES (1457, 2, 0, 0, '办事效率还是挺高的，也很会为客户着想。', 1534150054, 5, 5, 5, '2,7', 1, 0, 4, '114.94.28.162', 5, '上海市-徐汇区', '合伙企业注册');
INSERT INTO `comment` VALUES (1458, 25, 0, 0, '很专业 开户办理的很顺利 而且很细心 有问必答 服务效率高，很难见到这种专业而又效率的公司了，绝对好评', 1533791234, 5, 5, 5, '1,3', 1, 0, 115, '114.94.28.162', 5, '上海市-浦东新区', '跨市地址变更');
INSERT INTO `comment` VALUES (1459, 14, 0, 0, '还不错 可是我自己找会计了', 1532717447, 5, 5, 5, '1,3,4,6,7', 1, 0, 18, '114.94.28.162', 5, '上海市-奉贤区', '工商解异常');
INSERT INTO `comment` VALUES (1460, 19, 0, 0, '效果很棒，还能及时提醒下一次什么时候办理。', 1533803465, 5, 5, 5, '3,7', 1, 0, 114, '114.94.28.162', 5, '上海市-宝山区', '跨区地址变更');
INSERT INTO `comment` VALUES (1461, 25, 0, 0, '超出预期，低调还特别有效率，赞一个', 1529566769, 5, 5, 5, '1,2', 1, 0, 111, '114.94.28.162', 5, '上海市-青浦区', '字号变更');
INSERT INTO `comment` VALUES (1462, 28, 0, 0, '很不错，响应和服务都很好。', 1529979427, 5, 5, 5, '2,3,4,5,6,7', 1, 0, 5, '114.94.28.162', 5, '上海市-浦东新区', '分公司注册');
INSERT INTO `comment` VALUES (1463, 22, 0, 0, '挺讲信用的，不错的代办公司，以后长期合作。', 1534091393, 5, 5, 5, '2,3,4,6', 1, 0, 20, '114.94.28.162', 5, '上海市-黄浦区', '银行开户预约');
INSERT INTO `comment` VALUES (1464, 29, 0, 0, '好，质素高，人老实，服务好', 1529661300, 5, 5, 5, '1,2,5,6', 1, 0, 220, '114.94.28.162', 5, '上海市-黄浦区', '社保开户');
INSERT INTO `comment` VALUES (1465, 18, 0, 0, '满意，省心省力～', 1529192964, 5, 5, 5, '2,3,7', 1, 0, 1, '114.94.28.162', 5, '上海市-青浦区', '有限公司注册');
INSERT INTO `comment` VALUES (1466, 241, 0, 0, '非常棒的体验。省事省心。专业、给力。', 1532737169, 5, 5, 5, '2,4,6', 1, 0, 13, '114.94.28.162', 5, '上海市-虹口区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (1467, 13, 0, 0, '非常好的服务，每次都是很耐心的帮忙查询，给出建议', 1531864414, 5, 5, 5, '4,6,7', 1, 0, 114, '114.94.28.162', 5, '上海市-金山区', '跨区地址变更');
INSERT INTO `comment` VALUES (1468, 14, 0, 0, '非常棒的体验。省事省心。专业、给力。', 1533395955, 5, 5, 5, '1,2,3,5,6', 1, 0, 15, '114.94.28.162', 5, '上海市-浦东新区', '一般注销');
INSERT INTO `comment` VALUES (1469, 21, 0, 0, '很专业 开户办理的很顺利 而且很细心 有问必答 服务效率高，很难见到这种专业而又效率的公司了，绝对好评', 1531160226, 5, 5, 5, '2,3,5,6,7', 1, 0, 14, '114.94.28.162', 5, '上海市-普陀区', '简易注销');
INSERT INTO `comment` VALUES (1470, 28, 0, 0, '对这次服务非常满意，之前已在这个网站注册过公司，现在介绍朋友来，朋友评价不错。', 1533200004, 5, 5, 5, '1,4,5,6', 1, 0, 15, '114.94.28.162', 5, '上海市-嘉定区', '一般注销');
INSERT INTO `comment` VALUES (1471, 20, 0, 0, '很专业，服务很热情周到，效率很高', 1533617332, 5, 5, 5, '1,2,5', 1, 0, 114, '114.94.28.162', 5, '上海市-静安区', '跨区地址变更');
INSERT INTO `comment` VALUES (1472, 26, 0, 0, '业务熟练，态度温和，比较认真负责', 1530325705, 5, 5, 5, '1,3,4,5,6,7', 1, 0, 20, '114.94.28.162', 5, '上海市-杨浦区', '银行开户预约');
INSERT INTO `comment` VALUES (1473, 22, 0, 0, '办事干净利索，非常专业 ，赞一个。', 1530126918, 5, 5, 5, '1,6', 1, 0, 2, '114.94.28.162', 5, '上海市-崇明区', '股份有限公司注册');
INSERT INTO `comment` VALUES (1474, 22, 0, 0, '一周内办完流程和手续，专业度高', 1533504826, 5, 5, 5, '1,3,4,6', 1, 0, 3, '114.94.28.162', 5, '上海市-长宁区', '外商独资公司注册');
INSERT INTO `comment` VALUES (1475, 20, 0, 0, '还不错 可是我自己找会计了', 1530770286, 5, 5, 5, '2,5', 1, 0, 15, '114.94.28.162', 5, '上海市-宝山区', '一般注销');
INSERT INTO `comment` VALUES (1476, 22, 0, 0, '关键同志，的确服务比较好，专业内容做得好，强烈推荐', 1530409367, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 113, '114.94.28.162', 5, '上海市-黄浦区', '本区地址变更');
INSERT INTO `comment` VALUES (1477, 20, 0, 0, '讲解耐心，充分为客户照相，做事认真', 1531877672, 5, 5, 5, '3,7', 1, 0, 221, '114.94.28.162', 5, '上海市-长宁区', '公积金开户');
INSERT INTO `comment` VALUES (1478, 20, 0, 0, '很专业，服务很热情周到，效率很高', 1530530034, 5, 5, 5, '2,3,4,5,6,7', 1, 0, 221, '114.94.28.162', 5, '上海市-闵行区', '公积金开户');
INSERT INTO `comment` VALUES (1479, 28, 0, 0, '业务熟练，态度温和，比较认真负责', 1531594318, 5, 5, 5, '1,2,3,4,6,7', 1, 0, 5, '114.94.28.162', 5, '上海市-徐汇区', '分公司注册');
INSERT INTO `comment` VALUES (1480, 13, 0, 0, '為人民服務 不忘初心 继续前进', 1531964978, 5, 5, 5, '1,3,4,6', 1, 0, 111, '114.94.28.162', 5, '上海市-金山区', '字号变更');
INSERT INTO `comment` VALUES (1481, 21, 0, 0, '很专业，服务很热情周到，效率很高', 1529522208, 5, 5, 5, '1,3,5,6', 1, 0, 1, '114.94.28.162', 5, '上海市-徐汇区', '有限公司注册');
INSERT INTO `comment` VALUES (1482, 19, 0, 0, '比较诚恳，做事效率比较高，专业性也不错，交给他们做很放心', 1531197324, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 19, '114.94.28.162', 5, '上海市-宝山区', '开设银行基本户');
INSERT INTO `comment` VALUES (1483, 25, 0, 0, '挺好的，非常敬业，很快就办好了，不错。', 1530276748, 5, 5, 5, '1,6', 1, 0, 12, '114.94.28.162', 5, '上海市-浦东新区', '经营范围变更');
INSERT INTO `comment` VALUES (1484, 25, 0, 0, '挺讲信用的，不错的代办公司，以后长期合作。', 1529344908, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 221, '114.94.28.162', 5, '上海市-金山区', '公积金开户');
INSERT INTO `comment` VALUES (1485, 13, 0, 0, '不错，办事效率挺高，沟通到位，回复及时', 1533322340, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 16, '114.94.28.162', 5, '上海市-青浦区', '年报公示');
INSERT INTO `comment` VALUES (1486, 242, 0, 0, '态度非常好，人很耐心，有亲和力，有问必答，服务很周到。', 1529748816, 5, 5, 5, '1,2,3,4,5,7', 1, 0, 15, '114.94.28.162', 5, '上海市-浦东新区', '一般注销');
INSERT INTO `comment` VALUES (1487, 28, 0, 0, '非常好的服务，每次都是很耐心的帮忙查询，给出建议', 1532980090, 5, 5, 5, '1,2,3,6,7', 1, 0, 1, '114.94.28.162', 5, '上海市-浦东新区', '有限公司注册');
INSERT INTO `comment` VALUES (1488, 19, 0, 0, '一气呵成，服务周到，值得推荐', 1531994761, 5, 5, 5, '1,3,5,7', 1, 0, 3, '114.94.28.162', 5, '上海市-静安区', '外商独资公司注册');
INSERT INTO `comment` VALUES (1489, 18, 0, 0, '很专业 有问必答 给他们做这些很放心。', 1532724313, 5, 5, 5, '1,6', 1, 0, 15, '114.94.28.162', 5, '上海市-宝山区', '一般注销');
INSERT INTO `comment` VALUES (1490, 20, 0, 0, '整体满意。感谢平台遇见缘分。希望不断壮大服务提升更高水平', 1528918474, 5, 5, 5, '1,2,3,4,5,7', 1, 0, 13, '114.94.28.162', 5, '上海市-杨浦区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (1491, 242, 0, 0, '挺好的，非常敬业，很快就办好了，不错。', 1532490408, 5, 5, 5, '3,4,7', 1, 0, 19, '114.94.28.162', 5, '上海市-崇明区', '开设银行基本户');
INSERT INTO `comment` VALUES (1492, 29, 0, 0, '很好，满足预期，专业。', 1531783689, 5, 5, 5, '1,2,3,5,6,7', 1, 0, 220, '114.94.28.162', 5, '上海市-嘉定区', '社保开户');
INSERT INTO `comment` VALUES (1493, 2, 0, 0, '很专业 有问必答 给他们做这些很放心。', 1528913378, 5, 5, 5, '1,2,4,6,7', 1, 0, 4, '114.94.28.162', 5, '上海市-杨浦区', '合伙企业注册');
INSERT INTO `comment` VALUES (1494, 14, 0, 0, '非常好的服务，每次都是很耐心的帮忙查询，给出建议', 1530276086, 5, 5, 5, '1,3,6,7', 1, 0, 1, '114.94.28.162', 5, '上海市-金山区', '有限公司注册');
INSERT INTO `comment` VALUES (1495, 2, 0, 0, '诚信踏实非常专业', 1529383213, 5, 5, 5, '3,4,5,6,7', 1, 0, 13, '114.94.28.162', 5, '上海市-宝山区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (1496, 27, 0, 0, '诚信踏实非常专业', 1532266484, 5, 5, 5, '3,7', 1, 0, 4, '114.94.28.162', 5, '上海市-崇明区', '合伙企业注册');
INSERT INTO `comment` VALUES (1497, 21, 0, 0, '很专业 有问必答 给他们做这些很放心。', 1529033250, 5, 5, 5, '1,4,5,7', 1, 0, 5, '114.94.28.162', 5, '上海市-崇明区', '分公司注册');
INSERT INTO `comment` VALUES (1498, 2, 0, 0, '服务细心，非常专业，能切实解决问题，推荐！', 1533722435, 5, 5, 5, '2,3', 1, 0, 19, '114.94.28.162', 5, '上海市-杨浦区', '开设银行基本户');
INSERT INTO `comment` VALUES (1499, 21, 0, 0, '很专业，服务很热情周到，效率很高', 1529194315, 5, 5, 5, '3,4,5,6,7', 1, 0, 112, '114.94.28.162', 5, '上海市-静安区', '行业名称变更');
INSERT INTO `comment` VALUES (1500, 21, 0, 0, '超预期的服务体验，大力推荐。以后我们公司业务就找你了。蒸蒸日上哦', 1532093364, 5, 5, 5, '2,5,6', 1, 0, 18, '114.94.28.162', 5, '上海市-虹口区', '工商解异常');
INSERT INTO `comment` VALUES (1501, 29, 0, 0, '非常棒的服务，沟通顺畅，有耐心', 1530702008, 5, 5, 5, '1,2,4,5,6,7', 1, 0, 10, '114.94.28.162', 5, '上海市-徐汇区', '股权变更');
INSERT INTO `comment` VALUES (1502, 29, 0, 0, '因为要实地注册地址，所以遇到一些麻烦，但是还是非常耐心的帮忙询问，且在原本预计的时间之内拿到营业执照，还是非常感谢的。', 1532601909, 5, 5, 5, '4,7', 1, 0, 4, '114.94.28.162', 5, '上海市-浦东新区', '合伙企业注册');
INSERT INTO `comment` VALUES (1503, 22, 0, 0, '非常感谢，长期合作，祝事业蒸蒸日上', 1530314251, 5, 5, 5, '1,2,4,5,6', 1, 0, 113, '114.94.28.162', 5, '上海市-闵行区', '本区地址变更');
INSERT INTO `comment` VALUES (1504, 25, 0, 0, '很好，满足预期，专业。', 1530307507, 5, 5, 5, '2,3,5,7', 1, 0, 6, '114.94.28.162', 5, '上海市-普陀区', '办事处注册');
INSERT INTO `comment` VALUES (1505, 27, 0, 0, '这个注册过程还是蛮顺利的，谢谢', 1530680274, 5, 5, 5, '1,2,3,4,6,7', 1, 0, 114, '114.94.28.162', 5, '上海市-虹口区', '跨区地址变更');
INSERT INTO `comment` VALUES (1506, 20, 0, 0, '合作很愉快！服务态度好专业程度高', 1531120804, 5, 5, 5, '2,6', 1, 0, 13, '114.94.28.162', 5, '上海市-奉贤区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (1507, 27, 0, 0, '非常有耐心的一个人，是个好姑凉，希望老板多给她加薪奖励。', 1533617311, 5, 5, 5, '3,7', 1, 0, 14, '114.94.28.162', 5, '上海市-松江区', '简易注销');
INSERT INTO `comment` VALUES (1508, 241, 0, 0, '好评，快速，可以长期深入合作', 1531918765, 5, 5, 5, '3,7', 1, 0, 114, '114.94.28.162', 5, '上海市-浦东新区', '跨区地址变更');
INSERT INTO `comment` VALUES (1509, 12, 0, 0, '服务质量很好，时间也在正常中', 1530445408, 5, 5, 5, '6,7', 1, 0, 5, '114.94.28.162', 5, '上海市-徐汇区', '分公司注册');
INSERT INTO `comment` VALUES (1510, 2, 0, 0, '合作很愉快！服务态度好专业程度高', 1532273952, 5, 5, 5, '2,3,5,6,7', 1, 0, 112, '114.94.28.162', 5, '上海市-宝山区', '行业名称变更');
INSERT INTO `comment` VALUES (1511, 24, 0, 0, '积极配合帮助我们想办法解决注册、银行开户中的各种问题，谢谢。下次注册还找你们', 1532365644, 5, 5, 5, '1,2,3,4,6', 1, 0, 1, '114.94.28.162', 5, '上海市-虹口区', '有限公司注册');
INSERT INTO `comment` VALUES (1512, 242, 0, 0, '细心，耐心，专业，给力！', 1532930476, 5, 5, 5, '4,7', 1, 0, 112, '114.94.28.162', 5, '上海市-杨浦区', '行业名称变更');
INSERT INTO `comment` VALUES (1513, 242, 0, 0, '非常迅速，反馈也很及时，没想到这么快办完了。非常满意的一次服务', 1528955902, 5, 5, 5, '1,2,4,5,6,7', 1, 0, 15, '114.94.28.162', 5, '上海市-长宁区', '一般注销');
INSERT INTO `comment` VALUES (1514, 19, 0, 0, '服务好，任何进度第一时间跟踪，同步，感谢···还望下次有机会再次合作···', 1531615788, 5, 5, 5, '2,3', 1, 0, 10, '114.94.28.162', 5, '上海市-徐汇区', '股权变更');
INSERT INTO `comment` VALUES (1515, 12, 0, 0, '良好的服务和专业水准保证了业务的顺利办理', 1533352608, 5, 5, 5, '2,3,4,7', 1, 0, 19, '114.94.28.162', 5, '上海市-静安区', '开设银行基本户');
INSERT INTO `comment` VALUES (1516, 29, 0, 0, '超预期的服务体验，大力推荐。以后我们公司业务就找你了。蒸蒸日上哦', 1533032808, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 13, '114.94.28.162', 5, '上海市-松江区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (1517, 27, 0, 0, '非常负责和热情，态度特别好，我问的问题都很快回复，给十万个好评～', 1532887362, 5, 5, 5, '1,3,4,6,7', 1, 0, 19, '114.94.28.162', 5, '上海市-崇明区', '开设银行基本户');
INSERT INTO `comment` VALUES (1518, 241, 0, 0, '上门服务，态度热情，办事服务满意，给赞，希望后期合作愉快！', 1529953637, 5, 5, 5, '2,5', 1, 0, 114, '114.94.28.162', 5, '上海市-浦东新区', '跨区地址变更');
INSERT INTO `comment` VALUES (1519, 2, 0, 0, '漂亮声音还好听做事认真知心姐姐特别有耐心', 1529789494, 5, 5, 5, '1,2,3,4,6', 1, 0, 19, '114.94.28.162', 5, '上海市-虹口区', '开设银行基本户');
INSERT INTO `comment` VALUES (1520, 14, 0, 0, '很好，满足预期，专业。', 1531660024, 5, 5, 5, '4,5', 1, 0, 10, '114.94.28.162', 5, '上海市-闵行区', '股权变更');
INSERT INTO `comment` VALUES (1521, 25, 0, 0, '加油，刚刚注册了公司，原来不知道这方面还有这么多需要注意的事情。学习到了很多，希望我能和你们一起成长', 1530528412, 5, 5, 5, '2,3,4,5', 1, 0, 19, '114.94.28.162', 5, '上海市-青浦区', '开设银行基本户');
INSERT INTO `comment` VALUES (1522, 22, 0, 0, '办事效率高，很专业，值得信赖', 1533665452, 5, 5, 5, '1,4,5,6,7', 1, 0, 114, '114.94.28.162', 5, '上海市-嘉定区', '跨区地址变更');
INSERT INTO `comment` VALUES (1523, 27, 0, 0, '很专业 有问必答 给他们做这些很放心。', 1529290023, 5, 5, 5, '1,2,4,6,7', 1, 0, 17, '114.94.28.162', 5, '上海市-杨浦区', '五证合一');
INSERT INTO `comment` VALUES (1524, 27, 0, 0, '不错，办事效率挺高，沟通到位，回复及时', 1531093965, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 114, '114.94.28.162', 5, '上海市-杨浦区', '跨区地址变更');
INSERT INTO `comment` VALUES (1525, 24, 0, 0, '服务细心，非常专业，能切实解决问题，推荐！', 1529917742, 5, 5, 5, '1,5,7', 1, 0, 5, '114.94.28.162', 5, '上海市-普陀区', '分公司注册');
INSERT INTO `comment` VALUES (1526, 29, 0, 0, '用心服务，用心对待；办事效率高；感谢王哥，做了几项业务了；后期有需求还是会选择您，再次感谢', 1532674495, 5, 5, 5, '1,2,4,6,7', 1, 0, 7, '114.94.28.162', 5, '上海市-松江区', '个体商户注册');
INSERT INTO `comment` VALUES (1527, 21, 0, 0, '办事效率高，主动热情', 1530852621, 5, 5, 5, '5,6,7', 1, 0, 16, '114.94.28.162', 5, '上海市-浦东新区', '年报公示');
INSERT INTO `comment` VALUES (1528, 29, 0, 0, '比较诚恳，做事效率比较高，专业性也不错，交给他们做很放心', 1533881973, 5, 5, 5, '3,7', 1, 0, 15, '114.94.28.162', 5, '上海市-崇明区', '一般注销');
INSERT INTO `comment` VALUES (1529, 242, 0, 0, '非常好。帮助并办理注册公司的整个过程。很好的的一个人', 1531345690, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 115, '114.94.28.162', 5, '上海市-普陀区', '跨市地址变更');
INSERT INTO `comment` VALUES (1530, 29, 0, 0, '服务很周到，专业，为初次创业注册公司解决了很多问题！', 1531834146, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 13, '114.94.28.162', 5, '上海市-青浦区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (1531, 22, 0, 0, '非常有耐心的一个人，是个好姑凉，希望老板多给她加薪奖励。', 1533582342, 5, 5, 5, '1,2,3,6,7', 1, 0, 220, '114.94.28.162', 5, '上海市-普陀区', '社保开户');
INSERT INTO `comment` VALUES (1532, 13, 0, 0, '好，质素高，人老实，服务好', 1531372498, 5, 5, 5, '1,3,4,5,6', 1, 0, 15, '114.94.28.162', 5, '上海市-黄浦区', '一般注销');
INSERT INTO `comment` VALUES (1533, 27, 0, 0, '好评，快速，可以长期深入合作', 1532647513, 5, 5, 5, '1,2,3,5,6', 1, 0, 10, '114.94.28.162', 5, '上海市-松江区', '股权变更');
INSERT INTO `comment` VALUES (1534, 20, 0, 0, '一周内办完流程和手续，专业度高', 1531049125, 5, 5, 5, '1,6,7', 1, 0, 12, '114.94.28.162', 5, '上海市-自贸区', '经营范围变更');
INSERT INTO `comment` VALUES (1535, 20, 0, 0, '很感谢两位，公司注册好了，沟通很顺畅，服务很到位，希望下次继续合作。', 1532663351, 5, 5, 5, '1,6,7', 1, 0, 6, '114.94.28.162', 5, '上海市-嘉定区', '办事处注册');
INSERT INTO `comment` VALUES (1536, 28, 0, 0, '因为要实地注册地址，所以遇到一些麻烦，但是还是非常耐心的帮忙询问，且在原本预计的时间之内拿到营业执照，还是非常感谢的。', 1530598250, 5, 5, 5, '1,3,4,5,6,7', 1, 0, 19, '114.94.28.162', 5, '上海市-虹口区', '开设银行基本户');
INSERT INTO `comment` VALUES (1537, 19, 0, 0, '以后办理还找他。实在感谢', 1531692094, 5, 5, 5, '1,2,4,5,6,7', 1, 0, 111, '114.94.28.162', 5, '上海市-嘉定区', '字号变更');
INSERT INTO `comment` VALUES (1538, 21, 0, 0, '很好 办事细腻认真', 1531695205, 5, 5, 5, '1,2,3,5', 1, 0, 2, '114.94.28.162', 5, '上海市-虹口区', '股份有限公司注册');
INSERT INTO `comment` VALUES (1539, 28, 0, 0, '满意，省心省力～', 1530126337, 5, 5, 5, '1,4,6,7', 1, 0, 115, '114.94.28.162', 5, '上海市-嘉定区', '跨市地址变更');
INSERT INTO `comment` VALUES (1540, 241, 0, 0, '态度非常好，人很耐心，有亲和力，有问必答，服务很周到。', 1531451377, 5, 5, 5, '3,7', 1, 0, 3, '114.94.28.162', 5, '上海市-崇明区', '外商独资公司注册');
INSERT INTO `comment` VALUES (1541, 242, 0, 0, '不错，我让我朋友也来这里做，挺负责不错，专业水平也够', 1532452648, 5, 5, 5, '1,2,4,5,6,7', 1, 0, 12, '114.94.28.162', 5, '上海市-宝山区', '经营范围变更');
INSERT INTO `comment` VALUES (1542, 241, 0, 0, '超预期的服务体验，大力推荐。以后我们公司业务就找你了。蒸蒸日上哦', 1532432447, 5, 5, 5, '1,2,3,4', 1, 0, 220, '114.94.28.162', 5, '上海市-嘉定区', '社保开户');
INSERT INTO `comment` VALUES (1543, 25, 0, 0, '服务质量很好，时间也在正常中', 1529026933, 5, 5, 5, '2,3,4,5,6', 1, 0, 16, '114.94.28.162', 5, '上海市-长宁区', '年报公示');
INSERT INTO `comment` VALUES (1544, 27, 0, 0, '合作很愉快！服务态度好专业程度高', 1531085247, 5, 5, 5, '1,2,3,4,6,7', 1, 0, 20, '114.94.28.162', 5, '上海市-自贸区', '银行开户预约');
INSERT INTO `comment` VALUES (1545, 241, 0, 0, '很专业，服务很热情周到，效率很高', 1533705929, 5, 5, 5, '1,2,5', 1, 0, 19, '114.94.28.162', 5, '上海市-闵行区', '开设银行基本户');
INSERT INTO `comment` VALUES (1546, 241, 0, 0, '业务能力强 办事利索 快', 1533957867, 5, 5, 5, '2,3,4,6,7', 1, 0, 2, '114.94.28.162', 5, '上海市-浦东新区', '股份有限公司注册');
INSERT INTO `comment` VALUES (1547, 27, 0, 0, '不错，我让我朋友也来这里做，挺负责不错，专业水平也够', 1529186575, 5, 5, 5, '1,3,4', 1, 0, 2, '114.94.28.162', 5, '上海市-自贸区', '股份有限公司注册');
INSERT INTO `comment` VALUES (1548, 24, 0, 0, '非常好。帮助并办理注册公司的整个过程。很好的的一个人', 1529646623, 5, 5, 5, '1,2,5,7', 1, 0, 15, '114.94.28.162', 5, '上海市-自贸区', '一般注销');
INSERT INTO `comment` VALUES (1549, 14, 0, 0, '很专业，办事比较主动。', 1529592542, 5, 5, 5, '1,3,4,5,7', 1, 0, 13, '114.94.28.162', 5, '上海市-虹口区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (1550, 241, 0, 0, '非常好 本人有很多相关知识都不懂 问了很多问题 回答都很及时', 1530362872, 5, 5, 5, '3,6', 1, 0, 2, '114.94.28.162', 5, '上海市-静安区', '股份有限公司注册');
INSERT INTO `comment` VALUES (1551, 28, 0, 0, '业务能力强 办事利索 快', 1531076049, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 3, '114.94.28.162', 5, '上海市-长宁区', '外商独资公司注册');
INSERT INTO `comment` VALUES (1552, 27, 0, 0, '很专业，服务很热情周到，效率很高', 1532851712, 5, 5, 5, '2,3', 1, 0, 115, '114.94.28.162', 5, '上海市-松江区', '跨市地址变更');
INSERT INTO `comment` VALUES (1553, 241, 0, 0, '服务细心，非常专业，能切实解决问题，推荐！', 1530330006, 5, 5, 5, '3,4', 1, 0, 11, '114.94.28.162', 5, '上海市-嘉定区', '法人变更');
INSERT INTO `comment` VALUES (1554, 24, 0, 0, '积极配合帮助我们想办法解决注册、银行开户中的各种问题，谢谢。下次注册还找你们', 1533740700, 5, 5, 5, '1,3,5', 1, 0, 5, '114.94.28.162', 5, '上海市-静安区', '分公司注册');
INSERT INTO `comment` VALUES (1555, 2, 0, 0, '诚信踏实非常专业', 1534010061, 5, 5, 5, '1,2,4,5', 1, 0, 220, '114.94.28.162', 5, '上海市-自贸区', '社保开户');
INSERT INTO `comment` VALUES (1556, 12, 0, 0, '不错，我让我朋友也来这里做，挺负责不错，专业水平也够', 1531677450, 5, 5, 5, '2,7', 1, 0, 115, '114.94.28.162', 5, '上海市-嘉定区', '跨市地址变更');
INSERT INTO `comment` VALUES (1557, 18, 0, 0, '非常感谢，长期合作，祝事业蒸蒸日上', 1532725379, 5, 5, 5, '4,7', 1, 0, 114, '114.94.28.162', 5, '上海市-长宁区', '跨区地址变更');
INSERT INTO `comment` VALUES (1558, 19, 0, 0, '很好 办事细腻认真', 1532794004, 5, 5, 5, '1,2,5,6,7', 1, 0, 19, '114.94.28.162', 5, '上海市-长宁区', '开设银行基本户');
INSERT INTO `comment` VALUES (1559, 2, 0, 0, '服务细心，非常专业，能切实解决问题，推荐！', 1529191593, 5, 5, 5, '3,5,6', 1, 0, 19, '114.94.28.162', 5, '上海市-宝山区', '开设银行基本户');
INSERT INTO `comment` VALUES (1560, 12, 0, 0, '不错，我让我朋友也来这里做，挺负责不错，专业水平也够', 1529438985, 5, 5, 5, '2,4,6', 1, 0, 15, '114.94.28.162', 5, '上海市-黄浦区', '一般注销');
INSERT INTO `comment` VALUES (1561, 242, 0, 0, '非常棒的服务，沟通顺畅，有耐心', 1531406499, 5, 5, 5, '1,2,6,7', 1, 0, 17, '114.94.28.162', 5, '上海市-奉贤区', '五证合一');
INSERT INTO `comment` VALUES (1562, 13, 0, 0, '很专业，对待客户的问题细致耐心，赞', 1532862300, 5, 5, 5, '2,4,5,6', 1, 0, 6, '114.94.28.162', 5, '上海市-黄浦区', '办事处注册');
INSERT INTO `comment` VALUES (1563, 24, 0, 0, '服务质量很好，时间也在正常中', 1529902248, 5, 5, 5, '1,2,4,7', 1, 0, 16, '114.94.28.162', 5, '上海市-浦东新区', '年报公示');
INSERT INTO `comment` VALUES (1564, 26, 0, 0, '因为要实地注册地址，所以遇到一些麻烦，但是还是非常耐心的帮忙询问，且在原本预计的时间之内拿到营业执照，还是非常感谢的。', 1529398995, 5, 5, 5, '1,2,3,5,7', 1, 0, 113, '114.94.28.162', 5, '上海市-徐汇区', '本区地址变更');
INSERT INTO `comment` VALUES (1565, 25, 0, 0, '越努力就越辛运，以后有机会合作！', 1532527861, 5, 5, 5, '2,4,6,7', 1, 0, 220, '114.94.28.162', 5, '上海市-金山区', '社保开户');
INSERT INTO `comment` VALUES (1566, 26, 0, 0, '很专业，办事比较主动。', 1533344336, 5, 5, 5, '3,4,6', 1, 0, 10, '114.94.28.162', 5, '上海市-奉贤区', '股权变更');
INSERT INTO `comment` VALUES (1567, 25, 0, 0, '合作得挺愉快，希望之后还有机会合作。', 1534077867, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 1, '114.94.28.162', 5, '上海市-闵行区', '有限公司注册');
INSERT INTO `comment` VALUES (1568, 25, 0, 0, '满意，省心省力～', 1531873017, 5, 5, 5, '2,4,5,6,7', 1, 0, 111, '114.94.28.162', 5, '上海市-青浦区', '字号变更');
INSERT INTO `comment` VALUES (1569, 18, 0, 0, '办事速度快，靠谱，非常专业，后期会一直合作。', 1529313253, 5, 5, 5, '1,2,4,5,6,7', 1, 0, 2, '114.94.28.162', 5, '上海市-闵行区', '股份有限公司注册');
INSERT INTO `comment` VALUES (1570, 18, 0, 0, '挺讲信用的，不错的代办公司，以后长期合作。', 1531701942, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 6, '114.94.28.162', 5, '上海市-奉贤区', '办事处注册');
INSERT INTO `comment` VALUES (1571, 27, 0, 0, '现在想想还是蛮不错的，当时自己太急躁了！', 1532109049, 5, 5, 5, '1,2,3,4,7', 1, 0, 6, '114.94.28.162', 5, '上海市-崇明区', '办事处注册');
INSERT INTO `comment` VALUES (1572, 21, 0, 0, '合作很愉快！服务态度好专业程度高', 1530555372, 5, 5, 5, '4,7', 1, 0, 12, '114.94.28.162', 5, '上海市-静安区', '经营范围变更');
INSERT INTO `comment` VALUES (1573, 242, 0, 0, '非常感谢，长期合作，祝事业蒸蒸日上', 1533268247, 5, 5, 5, '1,2,6', 1, 0, 3, '114.94.28.162', 5, '上海市-宝山区', '外商独资公司注册');
INSERT INTO `comment` VALUES (1574, 14, 0, 0, '以后办理还找他。实在感谢', 1533511267, 5, 5, 5, '3,5,6', 1, 0, 220, '114.94.28.162', 5, '上海市-普陀区', '社保开户');
INSERT INTO `comment` VALUES (1575, 21, 0, 0, '好评，快速，可以长期深入合作', 1532924824, 5, 5, 5, '1,2,6', 1, 0, 11, '114.94.28.162', 5, '上海市-金山区', '法人变更');
INSERT INTO `comment` VALUES (1576, 19, 0, 0, '很感谢两位，公司注册好了，沟通很顺畅，服务很到位，希望下次继续合作。', 1532676451, 5, 5, 5, '2,3,6', 1, 0, 112, '114.94.28.162', 5, '上海市-闵行区', '行业名称变更');
INSERT INTO `comment` VALUES (1577, 26, 0, 0, '办事效率高，很专业，值得信赖', 1529118369, 5, 5, 5, '1,2,5,6,7', 1, 0, 19, '114.94.28.162', 5, '上海市-虹口区', '开设银行基本户');
INSERT INTO `comment` VALUES (1578, 27, 0, 0, '很专业 有问必答 给他们做这些很放心。', 1532957178, 5, 5, 5, '1,2,3,4,5', 1, 0, 113, '114.94.28.162', 5, '上海市-奉贤区', '本区地址变更');
INSERT INTO `comment` VALUES (1579, 21, 0, 0, '非常棒的体验。省事省心。专业、给力。', 1528894831, 5, 5, 5, '2,3,4,5,6,7', 1, 0, 6, '114.94.28.162', 5, '上海市-嘉定区', '办事处注册');
INSERT INTO `comment` VALUES (1580, 241, 0, 0, '服务非常好。反馈的问题也得到了解决。', 1533914456, 5, 5, 5, '2,3,5,6,7', 1, 0, 112, '114.94.28.162', 5, '上海市-普陀区', '行业名称变更');
INSERT INTO `comment` VALUES (1581, 29, 0, 0, '非常负责和热情，态度特别好，我问的问题都很快回复，给十万个好评～', 1529964126, 5, 5, 5, '1,3,4,6', 1, 0, 220, '114.94.28.162', 5, '上海市-长宁区', '社保开户');
INSERT INTO `comment` VALUES (1582, 21, 0, 0, '服务质量很好，时间也在正常中', 1529295406, 5, 5, 5, '1,3,6,7', 1, 0, 11, '114.94.28.162', 5, '上海市-静安区', '法人变更');
INSERT INTO `comment` VALUES (1583, 13, 0, 0, '很有责任心，专业热情，有问必答，真的很有耐心，我有好多不了解的事情Dear耐心帮我解答，32个赞！！！！', 1531421262, 5, 5, 5, '1,3,6,7', 1, 0, 16, '114.94.28.162', 5, '上海市-奉贤区', '年报公示');
INSERT INTO `comment` VALUES (1584, 27, 0, 0, '好，质素高，人老实，服务好', 1530429886, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 220, '114.94.28.162', 5, '上海市-杨浦区', '社保开户');
INSERT INTO `comment` VALUES (1585, 12, 0, 0, '用心服务，用心对待；办事效率高；感谢王哥，做了几项业务了；后期有需求还是会选择您，再次感谢', 1531033975, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 20, '114.94.28.162', 5, '上海市-杨浦区', '银行开户预约');
INSERT INTO `comment` VALUES (1586, 19, 0, 0, '很专业，对待客户的问题细致耐心，赞', 1531912556, 5, 5, 5, '3,6', 1, 0, 15, '114.94.28.162', 5, '上海市-金山区', '一般注销');
INSERT INTO `comment` VALUES (1587, 20, 0, 0, '服务很周到，专业，为初次创业注册公司解决了很多问题！', 1533089917, 5, 5, 5, '1,2,3,4,5,6', 1, 0, 20, '114.94.28.162', 5, '上海市-宝山区', '银行开户预约');
INSERT INTO `comment` VALUES (1588, 28, 0, 0, '服务很好，很细致很周到.', 1533834593, 5, 5, 5, '2,3,4,5,6,7', 1, 0, 112, '114.94.28.162', 5, '上海市-嘉定区', '行业名称变更');
INSERT INTO `comment` VALUES (1589, 18, 0, 0, '服务很好，很周到，有问必答，为客户着想，效率很高，合作很愉快', 1532454704, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 16, '114.94.28.162', 5, '上海市-静安区', '年报公示');
INSERT INTO `comment` VALUES (1590, 242, 0, 0, '服务很好，很周到，有问必答，为客户着想，效率很高，合作很愉快', 1532799171, 5, 5, 5, '2,7', 1, 0, 111, '114.94.28.162', 5, '上海市-虹口区', '字号变更');
INSERT INTO `comment` VALUES (1591, 241, 0, 0, '非常迅速，反馈也很及时，没想到这么快办完了。非常满意的一次服务', 1529624047, 5, 5, 5, '1,3,4,6,7', 1, 0, 13, '114.94.28.162', 5, '上海市-闵行区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (1592, 19, 0, 0, '比较诚恳，做事效率比较高，专业性也不错，交给他们做很放心', 1530580459, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 13, '114.94.28.162', 5, '上海市-崇明区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (1593, 26, 0, 0, '非常好 本人有很多相关知识都不懂 问了很多问题 回答都很及时', 1533028033, 5, 5, 5, '2,5', 1, 0, 5, '114.94.28.162', 5, '上海市-青浦区', '分公司注册');
INSERT INTO `comment` VALUES (1594, 22, 0, 0, '非常有耐心的一个人，是个好姑凉，希望老板多给她加薪奖励。', 1529502825, 5, 5, 5, '1,2,3,4,5,6', 1, 0, 15, '114.94.28.162', 5, '上海市-金山区', '一般注销');
INSERT INTO `comment` VALUES (1595, 20, 0, 0, '这次注册公司很顺利，虽然中间有政策变动，但是赶在变动前把一切事情都搞定了，很棒，平时有问题也及时帮我解答，不错哦~', 1534036111, 5, 5, 5, '1,2,3,5,6,7', 1, 0, 14, '114.94.28.162', 5, '上海市-静安区', '简易注销');
INSERT INTO `comment` VALUES (1596, 19, 0, 0, '满意，省心省力～', 1532973836, 5, 5, 5, '1,3,4,5,6,7', 1, 0, 20, '114.94.28.162', 5, '上海市-长宁区', '银行开户预约');
INSERT INTO `comment` VALUES (1597, 29, 0, 0, '真心不错，随时响应，快，且为客户着想', 1533061226, 5, 5, 5, '4,5', 1, 0, 111, '114.94.28.162', 5, '上海市-自贸区', '字号变更');
INSERT INTO `comment` VALUES (1598, 13, 0, 0, '超出预期，低调还特别有效率，赞一个', 1530646082, 5, 5, 5, '3,5,6,7', 1, 0, 115, '114.94.28.162', 5, '上海市-嘉定区', '跨市地址变更');
INSERT INTO `comment` VALUES (1599, 21, 0, 0, '积极配合帮助我们想办法解决注册、银行开户中的各种问题，谢谢。下次注册还找你们', 1532546887, 5, 5, 5, '1,2,4,6,7', 1, 0, 4, '114.94.28.162', 5, '上海市-崇明区', '合伙企业注册');
INSERT INTO `comment` VALUES (1600, 28, 0, 0, '业务熟练，态度温和，比较认真负责', 1534072463, 5, 5, 5, '4,6', 1, 0, 7, '114.94.28.162', 5, '上海市-虹口区', '个体商户注册');
INSERT INTO `comment` VALUES (1601, 242, 0, 0, '一周内办完流程和手续，专业度高', 1533429617, 5, 5, 5, '1,2,6', 1, 0, 115, '114.94.28.162', 5, '上海市-嘉定区', '跨市地址变更');
INSERT INTO `comment` VALUES (1602, 24, 0, 0, '对这次服务非常满意，之前已在这个网站注册过公司，现在介绍朋友来，朋友评价不错。', 1533675000, 5, 5, 5, '1,2,3,4,5,7', 1, 0, 115, '114.94.28.162', 5, '上海市-长宁区', '跨市地址变更');
INSERT INTO `comment` VALUES (1603, 13, 0, 0, '服务很好，很细致很周到.', 1531473683, 5, 5, 5, '2,3,6,7', 1, 0, 6, '114.94.28.162', 5, '上海市-普陀区', '办事处注册');
INSERT INTO `comment` VALUES (1604, 13, 0, 0, '办事速度快，靠谱，非常专业，后期会一直合作。', 1530819742, 5, 5, 5, '1,3,4,5,6,7', 1, 0, 111, '114.94.28.162', 5, '上海市-长宁区', '字号变更');
INSERT INTO `comment` VALUES (1605, 25, 0, 0, '很专业 开户办理的很顺利 而且很细心 有问必答 服务效率高，很难见到这种专业而又效率的公司了，绝对好评', 1531568899, 5, 5, 5, '1,2,3,4,5,6', 1, 0, 19, '114.94.28.162', 5, '上海市-黄浦区', '开设银行基本户');
INSERT INTO `comment` VALUES (1606, 19, 0, 0, '因为要实地注册地址，所以遇到一些麻烦，但是还是非常耐心的帮忙询问，且在原本预计的时间之内拿到营业执照，还是非常感谢的。', 1532376445, 5, 5, 5, '4,6,7', 1, 0, 16, '114.94.28.162', 5, '上海市-普陀区', '年报公示');
INSERT INTO `comment` VALUES (1607, 26, 0, 0, '办事干净利索，非常专业 ，赞一个。', 1532906215, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 5, '114.94.28.162', 5, '上海市-杨浦区', '分公司注册');
INSERT INTO `comment` VALUES (1608, 29, 0, 0, '超出预期，低调还特别有效率，赞一个', 1529621318, 5, 5, 5, '2,3', 1, 0, 18, '114.94.28.162', 5, '上海市-虹口区', '工商解异常');
INSERT INTO `comment` VALUES (1609, 24, 0, 0, '细心，耐心，专业，给力！', 1532454063, 5, 5, 5, '4,5,6,7', 1, 0, 5, '114.94.28.162', 5, '上海市-松江区', '分公司注册');
INSERT INTO `comment` VALUES (1610, 24, 0, 0, '非常迅速，反馈也很及时，没想到这么快办完了。非常满意的一次服务', 1531443269, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 10, '114.94.28.162', 5, '上海市-静安区', '股权变更');
INSERT INTO `comment` VALUES (1611, 28, 0, 0, '很感谢两位，公司注册好了，沟通很顺畅，服务很到位，希望下次继续合作。', 1532445420, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 13, '114.94.28.162', 5, '上海市-崇明区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (1612, 2, 0, 0, '很好 办事细腻认真', 1530770982, 5, 5, 5, '1,6', 1, 0, 15, '114.94.28.162', 5, '上海市-自贸区', '一般注销');
INSERT INTO `comment` VALUES (1613, 241, 0, 0, '加油，刚刚注册了公司，原来不知道这方面还有这么多需要注意的事情。学习到了很多，希望我能和你们一起成长', 1531411207, 5, 5, 5, '3,4,5,7', 1, 0, 4, '114.94.28.162', 5, '上海市-奉贤区', '合伙企业注册');
INSERT INTO `comment` VALUES (1614, 27, 0, 0, '整体满意。感谢平台遇见缘分。希望不断壮大服务提升更高水平', 1529456635, 5, 5, 5, '1,2,5,7', 1, 0, 7, '114.94.28.162', 5, '上海市-自贸区', '个体商户注册');
INSERT INTO `comment` VALUES (1615, 24, 0, 0, '以后办理还找他。实在感谢', 1532559390, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 19, '114.94.28.162', 5, '上海市-奉贤区', '开设银行基本户');
INSERT INTO `comment` VALUES (1616, 24, 0, 0, '良好的服务和专业水准保证了业务的顺利办理', 1532169539, 5, 5, 5, '2,6', 1, 0, 18, '114.94.28.162', 5, '上海市-松江区', '工商解异常');
INSERT INTO `comment` VALUES (1617, 27, 0, 0, '上门服务，态度热情，办事服务满意，给赞，希望后期合作愉快！', 1533576540, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 7, '114.94.28.162', 5, '上海市-静安区', '个体商户注册');
INSERT INTO `comment` VALUES (1618, 12, 0, 0, '很专业，对待客户的问题细致耐心，赞', 1529894577, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 17, '114.94.28.162', 5, '上海市-奉贤区', '五证合一');
INSERT INTO `comment` VALUES (1619, 14, 0, 0, '很专业，服务很热情周到，效率很高', 1530970628, 5, 5, 5, '1,2,3,4,5,7', 1, 0, 20, '114.94.28.162', 5, '上海市-奉贤区', '银行开户预约');
INSERT INTO `comment` VALUES (1620, 19, 0, 0, '非常好的服务，每次都是很耐心的帮忙查询，给出建议', 1532628720, 5, 5, 5, '2,4', 1, 0, 4, '114.94.28.162', 5, '上海市-黄浦区', '合伙企业注册');
INSERT INTO `comment` VALUES (1621, 14, 0, 0, '非常迅速，反馈也很及时，没想到这么快办完了。非常满意的一次服务', 1530775392, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 19, '114.94.28.162', 5, '上海市-自贸区', '开设银行基本户');
INSERT INTO `comment` VALUES (1622, 24, 0, 0, '非常棒的服务，沟通顺畅，有耐心', 1530455798, 5, 5, 5, '3,4,5,7', 1, 0, 12, '114.94.28.162', 5, '上海市-崇明区', '经营范围变更');
INSERT INTO `comment` VALUES (1623, 2, 0, 0, '办事效率高，很专业，值得信赖', 1533507611, 5, 5, 5, '1,2,3,7', 1, 0, 111, '114.94.28.162', 5, '上海市-浦东新区', '字号变更');
INSERT INTO `comment` VALUES (1624, 27, 0, 0, '效果很棒，还能及时提醒下一次什么时候办理。', 1531324960, 5, 5, 5, '1,2,3,4,5,6', 1, 0, 4, '114.94.28.162', 5, '上海市-自贸区', '合伙企业注册');
INSERT INTO `comment` VALUES (1625, 24, 0, 0, '合作得挺愉快，希望之后还有机会合作。', 1532984025, 5, 5, 5, '1,3,4,5,6,7', 1, 0, 221, '114.94.28.162', 5, '上海市-宝山区', '公积金开户');
INSERT INTO `comment` VALUES (1626, 27, 0, 0, '因为要实地注册地址，所以遇到一些麻烦，但是还是非常耐心的帮忙询问，且在原本预计的时间之内拿到营业执照，还是非常感谢的。', 1533412545, 5, 5, 5, '5,6,7', 1, 0, 14, '114.94.28.162', 5, '上海市-黄浦区', '简易注销');
INSERT INTO `comment` VALUES (1627, 22, 0, 0, '非常好。帮助并办理注册公司的整个过程。很好的的一个人', 1531072298, 5, 5, 5, '3,5,6,7', 1, 0, 1, '114.94.28.162', 5, '上海市-普陀区', '有限公司注册');
INSERT INTO `comment` VALUES (1628, 13, 0, 0, '合作很愉快！服务态度好专业程度高', 1533372850, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 1, '114.94.28.162', 5, '上海市-奉贤区', '有限公司注册');
INSERT INTO `comment` VALUES (1629, 27, 0, 0, '用心服务，用心对待；办事效率高；感谢王哥，做了几项业务了；后期有需求还是会选择您，再次感谢', 1530104981, 5, 5, 5, '1,4,5', 1, 0, 6, '114.94.28.162', 5, '上海市-徐汇区', '办事处注册');
INSERT INTO `comment` VALUES (1630, 26, 0, 0, '还不错 可是我自己找会计了', 1528962033, 5, 5, 5, '1,2,3', 1, 0, 17, '114.94.28.162', 5, '上海市-杨浦区', '五证合一');
INSERT INTO `comment` VALUES (1631, 2, 0, 0, '办事干净利索，非常专业 ，赞一个。', 1529458875, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 219, '114.94.28.162', 5, '上海市-静安区', '法人一证通办理');
INSERT INTO `comment` VALUES (1632, 14, 0, 0, '注册公司很块，中间的流程都办的请清楚楚，没有浪费一分时间，1280元', 1533772459, 5, 5, 5, '2,3,4,5,6,7', 1, 0, 219, '114.94.28.162', 5, '上海市-青浦区', '法人一证通办理');
INSERT INTO `comment` VALUES (1633, 27, 0, 0, '办事速度快，靠谱，非常专业，后期会一直合作', 1532209881, 5, 5, 5, '1,3,4,5', 1, 0, 5, '114.94.28.162', 5, '上海市-闵行区', '分公司注册');
INSERT INTO `comment` VALUES (1634, 12, 0, 0, '很专业，对待客户的问题细致耐心，赞', 1530034939, 5, 5, 5, '3,5', 1, 0, 13, '114.94.28.162', 5, '上海市-嘉定区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (1635, 27, 0, 0, '办事效率高，主动热情', 1533612221, 5, 5, 5, '1,3,4,5,6,7', 1, 0, 18, '114.94.28.162', 5, '上海市-金山区', '工商解异常');
INSERT INTO `comment` VALUES (1636, 242, 0, 0, '好，质素高，人老实，服务好', 1530675218, 5, 5, 5, '2,3,5,7', 1, 0, 5, '114.94.28.162', 5, '上海市-金山区', '分公司注册');
INSERT INTO `comment` VALUES (1637, 18, 0, 0, '很不错，响应和服务都很好。', 1533693516, 5, 5, 5, '1,2,4,6,7', 1, 0, 3, '114.94.28.162', 5, '上海市-静安区', '外商独资公司注册');
INSERT INTO `comment` VALUES (1638, 18, 0, 0, '积极配合帮助我们想办法解决注册、银行开户中的各种问题，谢谢。下次注册还找你们', 1529242768, 5, 5, 5, '2,3,4', 1, 0, 6, '114.94.28.162', 5, '上海市-静安区', '办事处注册');
INSERT INTO `comment` VALUES (1639, 22, 0, 0, '比较诚恳，做事效率比较高，专业性也不错，交给他们做很放心', 1531333876, 5, 5, 5, '2,4', 1, 0, 4, '114.94.28.162', 5, '上海市-奉贤区', '合伙企业注册');
INSERT INTO `comment` VALUES (1640, 26, 0, 0, '很好，满足预期，专业。', 1532076360, 5, 5, 5, '4,5', 1, 0, 6, '114.94.28.162', 5, '上海市-静安区', '办事处注册');
INSERT INTO `comment` VALUES (1641, 21, 0, 0, '办事效率高，主动热情', 1530592613, 5, 5, 5, '1,2,3,4,5,7', 1, 0, 1, '114.94.28.162', 5, '上海市-杨浦区', '有限公司注册');
INSERT INTO `comment` VALUES (1642, 21, 0, 0, '很专业，对待客户的问题细致耐心，赞', 1531725489, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 15, '114.94.28.162', 5, '上海市-浦东新区', '一般注销');
INSERT INTO `comment` VALUES (1643, 14, 0, 0, '非常棒的体验。省事省心。专业、给力。', 1532677187, 5, 5, 5, '1,3,4,5,6,7', 1, 0, 13, '114.94.28.162', 5, '上海市-宝山区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (1644, 2, 0, 0, '非常迅速，反馈也很及时，没想到这么快办完了。非常满意的一次服务', 1532706685, 5, 5, 5, '1,2,4,5,6,7', 1, 0, 1, '114.94.28.162', 5, '上海市-杨浦区', '有限公司注册');
INSERT INTO `comment` VALUES (1645, 25, 0, 0, '很专业，办事比较主动。', 1533347345, 5, 5, 5, '4,6,7', 1, 0, 114, '114.94.28.162', 5, '上海市-奉贤区', '跨区地址变更');
INSERT INTO `comment` VALUES (1646, 22, 0, 0, '业务熟练，态度温和，比较认真负责', 1530688487, 5, 5, 5, '1,4,7', 1, 0, 19, '114.94.28.162', 5, '上海市-浦东新区', '开设银行基本户');
INSERT INTO `comment` VALUES (1647, 21, 0, 0, '一周内办完流程和手续，专业度高', 1529158344, 5, 5, 5, '3,4,6,7', 1, 0, 112, '114.94.28.162', 5, '上海市-嘉定区', '行业名称变更');
INSERT INTO `comment` VALUES (1648, 14, 0, 0, '非常好。谢谢。', 1529094700, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 1, '114.94.28.162', 5, '上海市-徐汇区', '有限公司注册');
INSERT INTO `comment` VALUES (1649, 26, 0, 0, '非常棒的体验。省事省心。专业、给力。', 1533119438, 5, 5, 5, '1,2,3,4,7', 1, 0, 111, '114.94.28.162', 5, '上海市-青浦区', '字号变更');
INSERT INTO `comment` VALUES (1650, 19, 0, 0, '办事速度快，靠谱，非常专业，后期会一直合作。', 1530868731, 5, 5, 5, '2,3', 1, 0, 114, '114.94.28.162', 5, '上海市-静安区', '跨区地址变更');
INSERT INTO `comment` VALUES (1651, 242, 0, 0, '因为要实地注册地址，所以遇到一些麻烦，但是还是非常耐心的帮忙询问，且在原本预计的时间之内拿到营业执照，还是非常感谢的。', 1529647959, 5, 5, 5, '2,3,5,6,7', 1, 0, 3, '114.94.28.162', 5, '上海市-黄浦区', '外商独资公司注册');
INSERT INTO `comment` VALUES (1652, 25, 0, 0, '办事效率高，很专业，值得信赖', 1529432946, 5, 5, 5, '2,3,5,6,7', 1, 0, 220, '114.94.28.162', 5, '上海市-徐汇区', '社保开户');
INSERT INTO `comment` VALUES (1653, 29, 0, 0, '非常迅速，反馈也很及时，没想到这么快办完了。非常满意的一次服务', 1529226466, 5, 5, 5, '2,4', 1, 0, 12, '114.94.28.162', 5, '上海市-浦东新区', '经营范围变更');
INSERT INTO `comment` VALUES (1654, 242, 0, 0, '业务熟练，态度温和，比较认真负责', 1532415283, 5, 5, 5, '1,3,7', 1, 0, 1, '114.94.28.162', 5, '上海市-黄浦区', '有限公司注册');
INSERT INTO `comment` VALUES (1655, 21, 0, 0, '办事速度快，靠谱，非常专业，后期会一直合作', 1532437630, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 3, '114.94.28.162', 5, '上海市-青浦区', '外商独资公司注册');
INSERT INTO `comment` VALUES (1656, 26, 0, 0, '服务细心，非常专业，能切实解决问题，推荐！', 1533356580, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 220, '114.94.28.162', 5, '上海市-杨浦区', '社保开户');
INSERT INTO `comment` VALUES (1657, 29, 0, 0, '很专业 有问必答 给他们做这些很放心。', 1532954455, 5, 5, 5, '1,3,4,6', 1, 0, 4, '114.94.28.162', 5, '上海市-松江区', '合伙企业注册');
INSERT INTO `comment` VALUES (1658, 21, 0, 0, '很专业，服务很热情周到，效率很高', 1531106706, 5, 5, 5, '1,3,4,5,6', 1, 0, 5, '114.94.28.162', 5, '上海市-奉贤区', '分公司注册');
INSERT INTO `comment` VALUES (1659, 14, 0, 0, '一气呵成，服务周到，值得推荐', 1534072572, 5, 5, 5, '3,6,7', 1, 0, 2, '114.94.28.162', 5, '上海市-黄浦区', '股份有限公司注册');
INSERT INTO `comment` VALUES (1660, 22, 0, 0, '一周内办完流程和手续，专业度高', 1530756328, 5, 5, 5, '4,5,7', 1, 0, 221, '114.94.28.162', 5, '上海市-奉贤区', '公积金开户');
INSERT INTO `comment` VALUES (1661, 2, 0, 0, '业务能力强 办事利索 快', 1530671241, 5, 5, 5, '2,5,6', 1, 0, 17, '114.94.28.162', 5, '上海市-嘉定区', '五证合一');
INSERT INTO `comment` VALUES (1662, 27, 0, 0, '服务好，任何进度第一时间跟踪，同步，感谢···还望下次有机会再次合作···', 1531597089, 5, 5, 5, '1,4,6,7', 1, 0, 113, '114.94.28.162', 5, '上海市-普陀区', '本区地址变更');
INSERT INTO `comment` VALUES (1663, 241, 0, 0, '很专业，办事比较主动。', 1529207447, 5, 5, 5, '1,2,3,4,5,7', 1, 0, 13, '114.94.28.162', 5, '上海市-虹口区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (1664, 18, 0, 0, '超出预期，低调还特别有效率，赞一个', 1533737371, 5, 5, 5, '1,2,3,5,6,7', 1, 0, 115, '114.94.28.162', 5, '上海市-普陀区', '跨市地址变更');
INSERT INTO `comment` VALUES (1665, 20, 0, 0, '很感谢两位，公司注册好了，沟通很顺畅，服务很到位，希望下次继续合作。', 1529890260, 5, 5, 5, '2,3,4,5,6,7', 1, 0, 11, '114.94.28.162', 5, '上海市-长宁区', '法人变更');
INSERT INTO `comment` VALUES (1666, 241, 0, 0, '非常负责和热情，态度特别好，我问的问题都很快回复，给十万个好评～', 1529862019, 5, 5, 5, '2,3,5,6,7', 1, 0, 17, '114.94.28.162', 5, '上海市-宝山区', '五证合一');
INSERT INTO `comment` VALUES (1667, 20, 0, 0, '上门服务，态度热情，办事服务满意，给赞，希望后期合作愉快！', 1531076848, 5, 5, 5, '1,3,4,5,6', 1, 0, 20, '114.94.28.162', 5, '上海市-虹口区', '银行开户预约');
INSERT INTO `comment` VALUES (1668, 26, 0, 0, '诚信踏实非常专业', 1530628128, 5, 5, 5, '1,2,5,6,7', 1, 0, 113, '114.94.28.162', 5, '上海市-闵行区', '本区地址变更');
INSERT INTO `comment` VALUES (1669, 25, 0, 0, '讲解耐心，充分为客户照相，做事认真', 1531481479, 5, 5, 5, '1,3,6', 1, 0, 3, '114.94.28.162', 5, '上海市-虹口区', '外商独资公司注册');
INSERT INTO `comment` VALUES (1670, 241, 0, 0, '非常棒的服务，沟通顺畅，有耐心', 1530137026, 5, 5, 5, '2,4,6,7', 1, 0, 6, '114.94.28.162', 5, '上海市-金山区', '办事处注册');
INSERT INTO `comment` VALUES (1671, 241, 0, 0, '越努力就越辛运，以后有机会合作！', 1529080528, 5, 5, 5, '2,3', 1, 0, 18, '114.94.28.162', 5, '上海市-长宁区', '工商解异常');
INSERT INTO `comment` VALUES (1672, 26, 0, 0, '非常好的服务，每次都是很耐心的帮忙查询，给出建议', 1531123670, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 115, '114.94.28.162', 5, '上海市-浦东新区', '跨市地址变更');
INSERT INTO `comment` VALUES (1673, 20, 0, 0, '非常好。帮助并办理注册公司的整个过程。很好的的一个人', 1529885511, 5, 5, 5, '1,2,3,4,6,7', 1, 0, 7, '114.94.28.162', 5, '上海市-黄浦区', '个体商户注册');
INSERT INTO `comment` VALUES (1674, 241, 0, 0, '态度非常好，人很耐心，有亲和力，有问必答，服务很周到。', 1533304858, 5, 5, 5, '1,2,3,5,7', 1, 0, 2, '114.94.28.162', 5, '上海市-自贸区', '股份有限公司注册');
INSERT INTO `comment` VALUES (1675, 29, 0, 0, '诚信踏实非常专业', 1532315858, 5, 5, 5, '1,6', 1, 0, 15, '114.94.28.162', 5, '上海市-嘉定区', '一般注销');
INSERT INTO `comment` VALUES (1676, 242, 0, 0, '服务很好，很细致很周到.', 1531495471, 5, 5, 5, '1,2,4,5,6,7', 1, 0, 14, '114.94.28.162', 5, '上海市-浦东新区', '简易注销');
INSERT INTO `comment` VALUES (1677, 25, 0, 0, '超预期的服务体验，大力推荐。以后我们公司业务就找你了。蒸蒸日上哦', 1532080018, 5, 5, 5, '4,6,7', 1, 0, 20, '114.94.28.162', 5, '上海市-闵行区', '银行开户预约');
INSERT INTO `comment` VALUES (1678, 26, 0, 0, '以后办理还找他。实在感谢', 1533747085, 5, 5, 5, '1,7', 1, 0, 6, '114.94.28.162', 5, '上海市-松江区', '办事处注册');
INSERT INTO `comment` VALUES (1679, 21, 0, 0, '办事细心，业务很熟悉，做事认真负责', 1529913645, 5, 5, 5, '1,4', 1, 0, 113, '114.94.28.162', 5, '上海市-嘉定区', '本区地址变更');
INSERT INTO `comment` VALUES (1680, 28, 0, 0, '超预期的服务体验，大力推荐。以后我们公司业务就找你了。蒸蒸日上哦', 1529495669, 5, 5, 5, '2,3,6,7', 1, 0, 221, '114.94.28.162', 5, '上海市-黄浦区', '公积金开户');
INSERT INTO `comment` VALUES (1681, 19, 0, 0, '合作很愉快！服务态度好专业程度高', 1529345674, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 16, '114.94.28.162', 5, '上海市-嘉定区', '年报公示');
INSERT INTO `comment` VALUES (1682, 28, 0, 0, '非常有耐心的一个人，是个好姑凉，希望老板多给她加薪奖励。', 1531252574, 5, 5, 5, '3,5,6', 1, 0, 18, '114.94.28.162', 5, '上海市-崇明区', '工商解异常');
INSERT INTO `comment` VALUES (1683, 27, 0, 0, '合作得挺愉快，希望之后还有机会合作。', 1529326728, 5, 5, 5, '1,2,3,4,5,6', 1, 0, 114, '114.94.28.162', 5, '上海市-杨浦区', '跨区地址变更');
INSERT INTO `comment` VALUES (1684, 28, 0, 0, '用心服务，用心对待；办事效率高；感谢王哥，做了几项业务了；后期有需求还是会选择您，再次感谢', 1529909205, 5, 5, 5, '1,2,3,4,5,6', 1, 0, 3, '114.94.28.162', 5, '上海市-虹口区', '外商独资公司注册');
INSERT INTO `comment` VALUES (1685, 22, 0, 0, '良好的服务和专业水准保证了业务的顺利办理', 1531576395, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 5, '114.94.28.162', 5, '上海市-自贸区', '分公司注册');
INSERT INTO `comment` VALUES (1686, 28, 0, 0, '积极配合帮助我们想办法解决注册、银行开户中的各种问题，谢谢。下次注册还找你们', 1532527226, 5, 5, 5, '3,4,6,7', 1, 0, 7, '114.94.28.162', 5, '上海市-虹口区', '个体商户注册');
INSERT INTO `comment` VALUES (1687, 28, 0, 0, '以后办理还找他。实在感谢', 1533829242, 5, 5, 5, '4,5', 1, 0, 10, '114.94.28.162', 5, '上海市-松江区', '股权变更');
INSERT INTO `comment` VALUES (1688, 2, 0, 0, '服务质量很好，时间也在正常中', 1529740025, 5, 5, 5, '2,7', 1, 0, 113, '114.94.28.162', 5, '上海市-普陀区', '本区地址变更');
INSERT INTO `comment` VALUES (1689, 21, 0, 0, '办事速度快，靠谱，非常专业，后期会一直合作。', 1531957203, 5, 5, 5, '1,2,3,6,7', 1, 0, 13, '114.94.28.162', 5, '上海市-松江区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (1690, 21, 0, 0, '服务很好，很细致很周到.', 1533774975, 5, 5, 5, '1,2,3,4,5', 1, 0, 17, '114.94.28.162', 5, '上海市-虹口区', '五证合一');
INSERT INTO `comment` VALUES (1691, 20, 0, 0, '合作得挺愉快，希望之后还有机会合作。', 1530675039, 5, 5, 5, '3,4,5,6', 1, 0, 12, '114.94.28.162', 5, '上海市-黄浦区', '经营范围变更');
INSERT INTO `comment` VALUES (1692, 241, 0, 0, '好评，快速，可以长期深入合作', 1530778717, 5, 5, 5, '2,5', 1, 0, 14, '114.94.28.162', 5, '上海市-普陀区', '简易注销');
INSERT INTO `comment` VALUES (1693, 2, 0, 0, '越努力就越辛运，以后有机会合作！', 1529404839, 5, 5, 5, '3,5,6', 1, 0, 19, '114.94.28.162', 5, '上海市-闵行区', '开设银行基本户');
INSERT INTO `comment` VALUES (1694, 29, 0, 0, '很感谢两位，公司注册好了，沟通很顺畅，服务很到位，希望下次继续合作。', 1531399652, 5, 5, 5, '2,3,4', 1, 0, 2, '114.94.28.162', 5, '上海市-自贸区', '股份有限公司注册');
INSERT INTO `comment` VALUES (1695, 25, 0, 0, '超出预期，低调还特别有效率，赞一个', 1530201021, 5, 5, 5, '1,2,4,5,6,7', 1, 0, 113, '114.94.28.162', 5, '上海市-宝山区', '本区地址变更');
INSERT INTO `comment` VALUES (1696, 19, 0, 0, '非常棒的服务，沟通顺畅，有耐心', 1531401246, 5, 5, 5, '2,3,5', 1, 0, 17, '114.94.28.162', 5, '上海市-嘉定区', '五证合一');
INSERT INTO `comment` VALUES (1697, 21, 0, 0, '良好的服务和专业水准保证了业务的顺利办理', 1533887244, 5, 5, 5, '1,4', 1, 0, 18, '114.94.28.162', 5, '上海市-虹口区', '工商解异常');
INSERT INTO `comment` VALUES (1698, 21, 0, 0, '非常有耐心的一个人，是个好姑凉，希望老板多给她加薪奖励。', 1532299554, 5, 5, 5, '1,2,7', 1, 0, 112, '114.94.28.162', 5, '上海市-嘉定区', '行业名称变更');
INSERT INTO `comment` VALUES (1699, 29, 0, 0, '超出预期，低调还特别有效率，赞一个', 1533584907, 5, 5, 5, '2,3,4,5,6,7', 1, 0, 11, '114.94.28.162', 5, '上海市-普陀区', '法人变更');
INSERT INTO `comment` VALUES (1700, 242, 0, 0, '办事速度快，靠谱，非常专业，后期会一直合作', 1532548283, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 7, '114.94.28.162', 5, '上海市-自贸区', '个体商户注册');
INSERT INTO `comment` VALUES (1701, 22, 0, 0, '还不错 可是我自己找会计了', 1533704239, 5, 5, 5, '2,5,6', 1, 0, 17, '114.94.28.162', 5, '上海市-金山区', '五证合一');
INSERT INTO `comment` VALUES (1702, 2, 0, 0, '服务很周到 主要是专业，回答问题及时，太感谢了', 1532549279, 5, 5, 5, '1,2,6', 1, 0, 115, '114.94.28.162', 5, '上海市-宝山区', '跨市地址变更');
INSERT INTO `comment` VALUES (1703, 28, 0, 0, '服务很好，很周到，有问必答，为客户着想，效率很高，合作很愉快', 1529937181, 5, 5, 5, '1,2,5,6', 1, 0, 112, '114.94.28.162', 5, '上海市-浦东新区', '行业名称变更');
INSERT INTO `comment` VALUES (1704, 2, 0, 0, '办事细心，业务很熟悉，做事认真负责', 1530944689, 5, 5, 5, '1,2,4,5,6,7', 1, 0, 15, '114.94.28.162', 5, '上海市-金山区', '一般注销');
INSERT INTO `comment` VALUES (1705, 20, 0, 0, '漂亮声音还好听做事认真知心姐姐特别有耐心', 1531963473, 5, 5, 5, '2,3,4,5,6,7', 1, 0, 221, '114.94.28.162', 5, '上海市-金山区', '公积金开户');
INSERT INTO `comment` VALUES (1706, 21, 0, 0, '上门服务，态度热情，办事服务满意，给赞，希望后期合作愉快！', 1532825701, 5, 5, 5, '2,3,4,5,6', 1, 0, 12, '114.94.28.162', 5, '上海市-浦东新区', '经营范围变更');
INSERT INTO `comment` VALUES (1707, 13, 0, 0, '很专业 开户办理的很顺利 而且很细心 有问必答 服务效率高，很难见到这种专业而又效率的公司了，绝对好评', 1533589826, 5, 5, 5, '3,4,5,6,7', 1, 0, 220, '114.94.28.162', 5, '上海市-徐汇区', '社保开户');
INSERT INTO `comment` VALUES (1708, 22, 0, 0, '合作很愉快！服务态度好专业程度高', 1530318972, 5, 5, 5, '2,3,4,5,6,7', 1, 0, 5, '114.94.28.162', 5, '上海市-长宁区', '分公司注册');
INSERT INTO `comment` VALUES (1709, 21, 0, 0, '超预期的服务体验，大力推荐。以后我们公司业务就找你了。蒸蒸日上哦', 1532626848, 5, 5, 5, '2,3,6,7', 1, 0, 115, '114.94.28.162', 5, '上海市-浦东新区', '跨市地址变更');
INSERT INTO `comment` VALUES (1710, 14, 0, 0, '非常有责任心，时间观念超级强，很期待跟您的下次合作！！', 1531442770, 5, 5, 5, '1,2,7', 1, 0, 112, '114.94.28.162', 5, '上海市-松江区', '行业名称变更');
INSERT INTO `comment` VALUES (1711, 20, 0, 0, '办事速度快，靠谱，非常专业，后期会一直合作', 1533255322, 5, 5, 5, '1,2,5,6', 1, 0, 2, '114.94.28.162', 5, '上海市-闵行区', '股份有限公司注册');
INSERT INTO `comment` VALUES (1712, 14, 0, 0, '服务很好，很细致很周到.', 1529221231, 5, 5, 5, '1,2,3,5,7', 1, 0, 2, '114.94.28.162', 5, '上海市-黄浦区', '股份有限公司注册');
INSERT INTO `comment` VALUES (1713, 29, 0, 0, '漂亮声音还好听做事认真知心姐姐特别有耐心', 1532583658, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 1, '114.94.28.162', 5, '上海市-宝山区', '有限公司注册');
INSERT INTO `comment` VALUES (1714, 2, 0, 0, '业务能力强 办事利索 快', 1530159900, 5, 5, 5, '1,3,4,5,6', 1, 0, 19, '114.94.28.162', 5, '上海市-崇明区', '开设银行基本户');
INSERT INTO `comment` VALUES (1715, 24, 0, 0, '办事效率高，主动热情', 1529798915, 5, 5, 5, '1,2,3,6', 1, 0, 4, '114.94.28.162', 5, '上海市-杨浦区', '合伙企业注册');
INSERT INTO `comment` VALUES (1716, 21, 0, 0, '还不错 可是我自己找会计了', 1532293828, 5, 5, 5, '1,2,4,5,6,7', 1, 0, 3, '114.94.28.162', 5, '上海市-闵行区', '外商独资公司注册');
INSERT INTO `comment` VALUES (1717, 2, 0, 0, '注册公司很块，中间的流程都办的请清楚楚，没有浪费一分时间，1280元', 1528937681, 5, 5, 5, '1,2,3,5,6,7', 1, 0, 11, '114.94.28.162', 5, '上海市-自贸区', '法人变更');
INSERT INTO `comment` VALUES (1718, 22, 0, 0, '很专业，办事比较主动。', 1531320127, 5, 5, 5, '1,2,3,4,5,6', 1, 0, 3, '114.94.28.162', 5, '上海市-长宁区', '外商独资公司注册');
INSERT INTO `comment` VALUES (1719, 241, 0, 0, '这次注册公司很顺利，虽然中间有政策变动，但是赶在变动前把一切事情都搞定了，很棒，平时有问题也及时帮我解答，不错哦~', 1532794809, 5, 5, 5, '1,4,7', 1, 0, 113, '114.94.28.162', 5, '上海市-虹口区', '本区地址变更');
INSERT INTO `comment` VALUES (1720, 13, 0, 0, '非常迅速，反馈也很及时，没想到这么快办完了。非常满意的一次服务', 1533625616, 5, 5, 5, '1,2,3,4,5,6', 1, 0, 11, '114.94.28.162', 5, '上海市-奉贤区', '法人变更');
INSERT INTO `comment` VALUES (1721, 13, 0, 0, '好，质素高，人老实，服务好', 1533081046, 5, 5, 5, '1,3,5', 1, 0, 7, '114.94.28.162', 5, '上海市-浦东新区', '个体商户注册');
INSERT INTO `comment` VALUES (1722, 12, 0, 0, '诚信踏实非常专业', 1532494645, 5, 5, 5, '1,2', 1, 0, 2, '114.94.28.162', 5, '上海市-普陀区', '股份有限公司注册');
INSERT INTO `comment` VALUES (1723, 28, 0, 0, '整体满意。感谢平台遇见缘分。希望不断壮大服务提升更高水平', 1532703329, 5, 5, 5, '1,5,7', 1, 0, 221, '114.94.28.162', 5, '上海市-金山区', '公积金开户');
INSERT INTO `comment` VALUES (1724, 22, 0, 0, '关键同志，的确服务比较好，专业内容做得好，强烈推荐', 1532096329, 5, 5, 5, '1,2,3,4,7', 1, 0, 14, '114.94.28.162', 5, '上海市-金山区', '简易注销');
INSERT INTO `comment` VALUES (1725, 18, 0, 0, '办事效率还是挺高的，也很会为客户着想。', 1532211202, 5, 5, 5, '1,2,6', 1, 0, 114, '114.94.28.162', 5, '上海市-徐汇区', '跨区地址变更');
INSERT INTO `comment` VALUES (1726, 28, 0, 0, '服务很周到，专业，为初次创业注册公司解决了很多问题！', 1530521456, 5, 5, 5, '1,2,3,4,5,7', 1, 0, 1, '114.94.28.162', 5, '上海市-自贸区', '有限公司注册');
INSERT INTO `comment` VALUES (1727, 2, 0, 0, '办事效率高，主动热情', 1531647138, 5, 5, 5, '1,2,3,4,5', 1, 0, 115, '114.94.28.162', 5, '上海市-崇明区', '跨市地址变更');
INSERT INTO `comment` VALUES (1728, 18, 0, 0, '非常感谢，长期合作，祝事业蒸蒸日上', 1533309829, 5, 5, 5, '5,6', 1, 0, 13, '114.94.28.162', 5, '上海市-宝山区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (1729, 13, 0, 0, '很好，满足预期，专业。', 1529805007, 5, 5, 5, '1,2,3,4,6,7', 1, 0, 219, '114.94.28.162', 5, '上海市-自贸区', '法人一证通办理');
INSERT INTO `comment` VALUES (1730, 25, 0, 0, '讲解耐心，充分为客户照相，做事认真', 1528980921, 5, 5, 5, '5,7', 1, 0, 3, '114.94.28.162', 5, '上海市-奉贤区', '外商独资公司注册');
INSERT INTO `comment` VALUES (1731, 14, 0, 0, '很感谢两位，公司注册好了，沟通很顺畅，服务很到位，希望下次继续合作。', 1533276916, 5, 5, 5, '1,2,3,5,6,7', 1, 0, 7, '114.94.28.162', 5, '上海市-自贸区', '个体商户注册');
INSERT INTO `comment` VALUES (1732, 2, 0, 0, '好评，快速，可以长期深入合作', 1532914631, 5, 5, 5, '1,2,4,5,6', 1, 0, 219, '114.94.28.162', 5, '上海市-闵行区', '法人一证通办理');
INSERT INTO `comment` VALUES (1733, 25, 0, 0, '漂亮声音还好听做事认真知心姐姐特别有耐心', 1533421892, 5, 5, 5, '4,7', 1, 0, 10, '114.94.28.162', 5, '上海市-青浦区', '股权变更');
INSERT INTO `comment` VALUES (1734, 19, 0, 0, '非常有责任心，时间观念超级强，很期待跟您的下次合作！！', 1532109426, 5, 5, 5, '2,4,5,6', 1, 0, 112, '114.94.28.162', 5, '上海市-长宁区', '行业名称变更');
INSERT INTO `comment` VALUES (1735, 241, 0, 0, '良好的服务和专业水准保证了业务的顺利办理', 1531768166, 5, 5, 5, '1,2,4,5,6,7', 1, 0, 20, '114.94.28.162', 5, '上海市-奉贤区', '银行开户预约');
INSERT INTO `comment` VALUES (1736, 25, 0, 0, '加油，刚刚注册了公司，原来不知道这方面还有这么多需要注意的事情。学习到了很多，希望我能和你们一起成长', 1530954572, 5, 5, 5, '1,3,4,5,7', 1, 0, 14, '114.94.28.162', 5, '上海市-松江区', '简易注销');
INSERT INTO `comment` VALUES (1737, 27, 0, 0, '处处为客户着想，非常的专业！', 1530152323, 5, 5, 5, '1,4', 1, 0, 14, '114.94.28.162', 5, '上海市-青浦区', '简易注销');
INSERT INTO `comment` VALUES (1738, 19, 0, 0, '漂亮声音还好听做事认真知心姐姐特别有耐心', 1530311056, 5, 5, 5, '1,3,4', 1, 0, 11, '114.94.28.162', 5, '上海市-宝山区', '法人变更');
INSERT INTO `comment` VALUES (1739, 13, 0, 0, '服务非常好。反馈的问题也得到了解决。', 1530613743, 5, 5, 5, '1,4,6', 1, 0, 6, '114.94.28.162', 5, '上海市-黄浦区', '办事处注册');
INSERT INTO `comment` VALUES (1740, 242, 0, 0, '办事效率还是挺高的，也很会为客户着想。', 1529627435, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 19, '114.94.28.162', 5, '上海市-金山区', '开设银行基本户');
INSERT INTO `comment` VALUES (1741, 14, 0, 0, '积极配合帮助我们想办法解决注册、银行开户中的各种问题，谢谢。下次注册还找你们', 1529024918, 5, 5, 5, '1,2,4,5,6,7', 1, 0, 7, '114.94.28.162', 5, '上海市-闵行区', '个体商户注册');
INSERT INTO `comment` VALUES (1742, 14, 0, 0, '為人民服務 不忘初心 继续前进', 1533091010, 5, 5, 5, '1,3,4,5,6,7', 1, 0, 14, '114.94.28.162', 5, '上海市-金山区', '简易注销');
INSERT INTO `comment` VALUES (1743, 27, 0, 0, '业务熟练，态度温和，比较认真负责', 1532724595, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 115, '114.94.28.162', 5, '上海市-杨浦区', '跨市地址变更');
INSERT INTO `comment` VALUES (1744, 13, 0, 0, '服务非常好。反馈的问题也得到了解决。', 1531503497, 5, 5, 5, '3,4,6', 1, 0, 6, '114.94.28.162', 5, '上海市-虹口区', '办事处注册');
INSERT INTO `comment` VALUES (1745, 26, 0, 0, '一气呵成，服务周到，值得推荐', 1531460555, 5, 5, 5, '2,5,6', 1, 0, 17, '114.94.28.162', 5, '上海市-金山区', '五证合一');
INSERT INTO `comment` VALUES (1746, 24, 0, 0, '服务很好，很细致很周到.', 1531351528, 5, 5, 5, '1,2,3,4,6,7', 1, 0, 4, '114.94.28.162', 5, '上海市-金山区', '合伙企业注册');
INSERT INTO `comment` VALUES (1747, 13, 0, 0, '服务质量很好，时间也在正常中', 1531115603, 5, 5, 5, '2,5', 1, 0, 3, '114.94.28.162', 5, '上海市-杨浦区', '外商独资公司注册');
INSERT INTO `comment` VALUES (1748, 18, 0, 0, '很专业，办事比较主动。', 1530550987, 5, 5, 5, '1,3,6,7', 1, 0, 112, '114.94.28.162', 5, '上海市-普陀区', '行业名称变更');
INSERT INTO `comment` VALUES (1749, 27, 0, 0, '服务细心，非常专业，能切实解决问题，推荐！', 1533923541, 5, 5, 5, '1,3,4,5,6', 1, 0, 17, '114.94.28.162', 5, '上海市-杨浦区', '五证合一');
INSERT INTO `comment` VALUES (1750, 20, 0, 0, '办事效率高，主动热情', 1530686122, 5, 5, 5, '1,2,3,4,6,7', 1, 0, 12, '114.94.28.162', 5, '上海市-崇明区', '经营范围变更');
INSERT INTO `comment` VALUES (1751, 2, 0, 0, '很专业，对待客户的问题细致耐心，赞', 1531563261, 5, 5, 5, '1,2,3,4,6,7', 1, 0, 115, '114.94.28.162', 5, '上海市-宝山区', '跨市地址变更');
INSERT INTO `comment` VALUES (1752, 24, 0, 0, '越努力就越辛运，以后有机会合作！', 1530894719, 5, 5, 5, '1,5,7', 1, 0, 221, '114.94.28.162', 5, '上海市-嘉定区', '公积金开户');
INSERT INTO `comment` VALUES (1753, 13, 0, 0, '办事速度快，靠谱，非常专业，后期会一直合作', 1532664282, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 18, '114.94.28.162', 5, '上海市-嘉定区', '工商解异常');
INSERT INTO `comment` VALUES (1754, 2, 0, 0, '很专业，对待客户的问题细致耐心，赞', 1529540179, 5, 5, 5, '2,3,6', 1, 0, 17, '114.94.28.162', 5, '上海市-杨浦区', '五证合一');
INSERT INTO `comment` VALUES (1755, 19, 0, 0, '服务很好，很周到，有问必答，为客户着想，效率很高，合作很愉快', 1532671095, 5, 5, 5, '4,5,6', 1, 0, 6, '114.94.28.162', 5, '上海市-崇明区', '办事处注册');
INSERT INTO `comment` VALUES (1756, 241, 0, 0, '积极配合帮助我们想办法解决注册、银行开户中的各种问题，谢谢。下次注册还找你们', 1529728899, 5, 5, 5, '1,4,5,6,7', 1, 0, 14, '114.94.28.162', 5, '上海市-宝山区', '简易注销');
INSERT INTO `comment` VALUES (1757, 18, 0, 0, '合作很愉快！服务态度好专业程度高', 1533866568, 5, 5, 5, '1,2,3,4,7', 1, 0, 10, '114.94.28.162', 5, '上海市-静安区', '股权变更');
INSERT INTO `comment` VALUES (1758, 26, 0, 0, '业务能力强 办事利索 快', 1528979835, 5, 5, 5, '5,7', 1, 0, 10, '114.94.28.162', 5, '上海市-闵行区', '股权变更');
INSERT INTO `comment` VALUES (1759, 26, 0, 0, '很感谢两位，公司注册好了，沟通很顺畅，服务很到位，希望下次继续合作。', 1529270448, 5, 5, 5, '1,2,3,4,6,7', 1, 0, 3, '114.94.28.162', 5, '上海市-闵行区', '外商独资公司注册');
INSERT INTO `comment` VALUES (1760, 26, 0, 0, '不错，我让我朋友也来这里做，挺负责不错，专业水平也够', 1530078994, 5, 5, 5, '2,4,5,6,7', 1, 0, 6, '114.94.28.162', 5, '上海市-金山区', '办事处注册');
INSERT INTO `comment` VALUES (1761, 24, 0, 0, '非常有责任心，时间观念超级强，很期待跟您的下次合作！！', 1529590895, 5, 5, 5, '4,5,6', 1, 0, 115, '114.94.28.162', 5, '上海市-长宁区', '跨市地址变更');
INSERT INTO `comment` VALUES (1762, 12, 0, 0, '比较诚恳，做事效率比较高，专业性也不错，交给他们做很放心', 1531557624, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 3, '114.94.28.162', 5, '上海市-青浦区', '外商独资公司注册');
INSERT INTO `comment` VALUES (1763, 2, 0, 0, '业务熟练，态度温和，比较认真负责', 1533225270, 5, 5, 5, '1,5,7', 1, 0, 15, '114.94.28.162', 5, '上海市-青浦区', '一般注销');
INSERT INTO `comment` VALUES (1764, 29, 0, 0, '态度非常好，人很耐心，有亲和力，有问必答，服务很周到。', 1533318553, 5, 5, 5, '3,6,7', 1, 0, 111, '114.94.28.162', 5, '上海市-虹口区', '字号变更');
INSERT INTO `comment` VALUES (1765, 24, 0, 0, '办事效率还是挺高的，也很会为客户着想。', 1531683229, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 221, '114.94.28.162', 5, '上海市-浦东新区', '公积金开户');
INSERT INTO `comment` VALUES (1766, 241, 0, 0, '挺讲信用的，不错的代办公司，以后长期合作。', 1532979465, 5, 5, 5, '2,4,5,7', 1, 0, 14, '114.94.28.162', 5, '上海市-自贸区', '简易注销');
INSERT INTO `comment` VALUES (1767, 24, 0, 0, '很专业，对待客户的问题细致耐心，赞', 1533067687, 5, 5, 5, '3,6', 1, 0, 18, '114.94.28.162', 5, '上海市-金山区', '工商解异常');
INSERT INTO `comment` VALUES (1768, 22, 0, 0, '很专业，服务很热情周到，效率很高', 1530914817, 5, 5, 5, '3,4', 1, 0, 11, '114.94.28.162', 5, '上海市-松江区', '法人变更');
INSERT INTO `comment` VALUES (1769, 22, 0, 0, '办事速度快，靠谱，非常专业，后期会一直合作。', 1532755448, 5, 5, 5, '1,3,4,5,7', 1, 0, 112, '114.94.28.162', 5, '上海市-杨浦区', '行业名称变更');
INSERT INTO `comment` VALUES (1770, 26, 0, 0, '办事干净利索，非常专业 ，赞一个。', 1531309594, 5, 5, 5, '1,4,5,6,7', 1, 0, 19, '114.94.28.162', 5, '上海市-闵行区', '开设银行基本户');
INSERT INTO `comment` VALUES (1771, 14, 0, 0, '服务好，任何进度第一时间跟踪，同步，感谢···还望下次有机会再次合作···', 1530476356, 5, 5, 5, '1,3', 1, 0, 114, '114.94.28.162', 5, '上海市-浦东新区', '跨区地址变更');
INSERT INTO `comment` VALUES (1772, 26, 0, 0, '真心不错，随时响应，快，且为客户着想', 1531889128, 5, 5, 5, '5,6', 1, 0, 4, '114.94.28.162', 5, '上海市-崇明区', '合伙企业注册');
INSERT INTO `comment` VALUES (1773, 19, 0, 0, '细心，耐心，专业，给力！', 1533088191, 5, 5, 5, '1,2,7', 1, 0, 2, '114.94.28.162', 5, '上海市-虹口区', '股份有限公司注册');
INSERT INTO `comment` VALUES (1774, 2, 0, 0, '一气呵成，服务周到，值得推荐', 1529804268, 5, 5, 5, '2,4,5', 1, 0, 220, '114.94.28.162', 5, '上海市-浦东新区', '社保开户');
INSERT INTO `comment` VALUES (1775, 21, 0, 0, '现在想想还是蛮不错的，当时自己太急躁了！', 1529981126, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 221, '114.94.28.162', 5, '上海市-奉贤区', '公积金开户');
INSERT INTO `comment` VALUES (1776, 29, 0, 0, '好，质素高，人老实，服务好', 1529775866, 5, 5, 5, '1,2,3,4,5,6', 1, 0, 12, '114.94.28.162', 5, '上海市-徐汇区', '经营范围变更');
INSERT INTO `comment` VALUES (1777, 22, 0, 0, '非常有耐心的一个人，是个好姑凉，希望老板多给她加薪奖励。', 1530352216, 5, 5, 5, '1,2,4,5,6,7', 1, 0, 6, '114.94.28.162', 5, '上海市-奉贤区', '办事处注册');
INSERT INTO `comment` VALUES (1778, 22, 0, 0, '加油，刚刚注册了公司，原来不知道这方面还有这么多需要注意的事情。学习到了很多，希望我能和你们一起成长', 1533933109, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 16, '114.94.28.162', 5, '上海市-崇明区', '年报公示');
INSERT INTO `comment` VALUES (1779, 24, 0, 0, '很专业，对待客户的问题细致耐心，赞', 1531236994, 5, 5, 5, '3,4,7', 1, 0, 12, '114.94.28.162', 5, '上海市-自贸区', '经营范围变更');
INSERT INTO `comment` VALUES (1780, 19, 0, 0, '一气呵成，服务周到，值得推荐', 1531128763, 5, 5, 5, '1,2,4,5,6', 1, 0, 18, '114.94.28.162', 5, '上海市-松江区', '工商解异常');
INSERT INTO `comment` VALUES (1781, 21, 0, 0, '非常好 本人有很多相关知识都不懂 问了很多问题 回答都很及时', 1531181637, 5, 5, 5, '1,3,5,6', 1, 0, 6, '114.94.28.162', 5, '上海市-青浦区', '办事处注册');
INSERT INTO `comment` VALUES (1782, 242, 0, 0, '办事干净利索，非常专业 ，赞一个。', 1530277737, 5, 5, 5, '1,3,4,6', 1, 0, 20, '114.94.28.162', 5, '上海市-嘉定区', '银行开户预约');
INSERT INTO `comment` VALUES (1783, 22, 0, 0, '办事效率高，很专业，值得信赖', 1530848646, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 16, '114.94.28.162', 5, '上海市-杨浦区', '年报公示');
INSERT INTO `comment` VALUES (1784, 14, 0, 0, '对这次服务非常满意，之前已在这个网站注册过公司，现在介绍朋友来，朋友评价不错。', 1530885355, 5, 5, 5, '1,2,3,4,6,7', 1, 0, 10, '114.94.28.162', 5, '上海市-崇明区', '股权变更');
INSERT INTO `comment` VALUES (1785, 28, 0, 0, '服务态度别好，办事效率很高，对我不明白的问题进行了一个详细的讲解，很有耐心。特别的感谢这位美女的服务。', 1531863271, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 7, '114.94.28.162', 5, '上海市-杨浦区', '个体商户注册');
INSERT INTO `comment` VALUES (1786, 18, 0, 0, '超出预期，低调还特别有效率，赞一个', 1530255482, 5, 5, 5, '1,2,3,4,6,7', 1, 0, 13, '114.94.28.162', 5, '上海市-黄浦区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (1787, 26, 0, 0, '服务非常好。反馈的问题也得到了解决。', 1530097917, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 6, '114.94.28.162', 5, '上海市-嘉定区', '办事处注册');
INSERT INTO `comment` VALUES (1788, 21, 0, 0, '很专业，服务很热情周到，效率很高', 1530136396, 5, 5, 5, '1,4', 1, 0, 115, '114.94.28.162', 5, '上海市-静安区', '跨市地址变更');
INSERT INTO `comment` VALUES (1789, 19, 0, 0, '用心服务，用心对待；办事效率高；感谢王哥，做了几项业务了；后期有需求还是会选择您，再次感谢', 1532050352, 5, 5, 5, '3,6', 1, 0, 2, '114.94.28.162', 5, '上海市-杨浦区', '股份有限公司注册');
INSERT INTO `comment` VALUES (1790, 242, 0, 0, '办事速度快，靠谱，非常专业，后期会一直合作', 1532834152, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 1, '114.94.28.162', 5, '上海市-黄浦区', '有限公司注册');
INSERT INTO `comment` VALUES (1791, 241, 0, 0, '办事速度快，靠谱，非常专业，后期会一直合作', 1533561161, 5, 5, 5, '1,2,3,4,6', 1, 0, 19, '114.94.28.162', 5, '上海市-奉贤区', '开设银行基本户');
INSERT INTO `comment` VALUES (1792, 27, 0, 0, '好评，快速，可以长期深入合作', 1532685374, 5, 5, 5, '1,2,3,4', 1, 0, 6, '114.94.28.162', 5, '上海市-金山区', '办事处注册');
INSERT INTO `comment` VALUES (1793, 24, 0, 0, '办事细心，业务很熟悉，做事认真负责', 1530689515, 5, 5, 5, '1,3,4,5,6,7', 1, 0, 17, '114.94.28.162', 5, '上海市-虹口区', '五证合一');
INSERT INTO `comment` VALUES (1794, 24, 0, 0, '良好的服务和专业水准保证了业务的顺利办理', 1531903470, 5, 5, 5, '1,2,3,4,5,7', 1, 0, 112, '114.94.28.162', 5, '上海市-静安区', '行业名称变更');
INSERT INTO `comment` VALUES (1795, 21, 0, 0, '很不错，响应和服务都很好。', 1529992476, 5, 5, 5, '2,3,5', 1, 0, 19, '114.94.28.162', 5, '上海市-金山区', '开设银行基本户');
INSERT INTO `comment` VALUES (1796, 20, 0, 0, '很感谢两位，公司注册好了，沟通很顺畅，服务很到位，希望下次继续合作。', 1531517095, 5, 5, 5, '1,2,3,4,5,7', 1, 0, 219, '114.94.28.162', 5, '上海市-奉贤区', '法人一证通办理');
INSERT INTO `comment` VALUES (1797, 242, 0, 0, '一气呵成，服务周到，值得推荐', 1531299855, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 20, '114.94.28.162', 5, '上海市-嘉定区', '银行开户预约');
INSERT INTO `comment` VALUES (1798, 18, 0, 0, '还不错 可是我自己找会计了', 1532641895, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 11, '114.94.28.162', 5, '上海市-徐汇区', '法人变更');
INSERT INTO `comment` VALUES (1799, 24, 0, 0, '很专业，办事比较主动。', 1531352806, 5, 5, 5, '1,2,3,5,6,7', 1, 0, 115, '114.94.28.162', 5, '上海市-闵行区', '跨市地址变更');
INSERT INTO `comment` VALUES (1800, 20, 0, 0, '现在想想还是蛮不错的，当时自己太急躁了！', 1532645380, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 112, '114.94.28.162', 5, '上海市-黄浦区', '行业名称变更');
INSERT INTO `comment` VALUES (1801, 24, 0, 0, '服务很周到 主要是专业，回答问题及时，太感谢了', 1533128451, 5, 5, 5, '1,2,4,5,7', 1, 0, 20, '114.94.28.162', 5, '上海市-闵行区', '银行开户预约');
INSERT INTO `comment` VALUES (1802, 27, 0, 0, '业务熟练，态度温和，比较认真负责', 1531650644, 5, 5, 5, '2,5,6', 1, 0, 10, '114.94.28.162', 5, '上海市-黄浦区', '股权变更');
INSERT INTO `comment` VALUES (1803, 13, 0, 0, '服务好，任何进度第一时间跟踪，同步，感谢···还望下次有机会再次合作···', 1529334743, 5, 5, 5, '1,3,5', 1, 0, 18, '114.94.28.162', 5, '上海市-虹口区', '工商解异常');
INSERT INTO `comment` VALUES (1804, 18, 0, 0, '业务能力强 办事利索 快', 1529592762, 5, 5, 5, '3,5,6', 1, 0, 4, '114.94.28.162', 5, '上海市-嘉定区', '合伙企业注册');
INSERT INTO `comment` VALUES (1805, 24, 0, 0, '很好，满足预期，专业。', 1531083105, 5, 5, 5, '1,2,4,5,6,7', 1, 0, 220, '114.94.28.162', 5, '上海市-金山区', '社保开户');
INSERT INTO `comment` VALUES (1806, 19, 0, 0, '这个注册过程还是蛮顺利的，谢谢', 1532084835, 5, 5, 5, '1,7', 1, 0, 20, '114.94.28.162', 5, '上海市-青浦区', '银行开户预约');
INSERT INTO `comment` VALUES (1807, 19, 0, 0, '办事速度快，靠谱，非常专业，后期会一直合作。', 1529720019, 5, 5, 5, '2,7', 1, 0, 113, '114.94.28.162', 5, '上海市-青浦区', '本区地址变更');
INSERT INTO `comment` VALUES (1808, 13, 0, 0, '不错，我让我朋友也来这里做，挺负责不错，专业水平也够', 1531582972, 5, 5, 5, '1,2,6,7', 1, 0, 12, '114.94.28.162', 5, '上海市-奉贤区', '经营范围变更');
INSERT INTO `comment` VALUES (1809, 25, 0, 0, '关键同志，的确服务比较好，专业内容做得好，强烈推荐', 1531197967, 5, 5, 5, '1,2,5,6,7', 1, 0, 12, '114.94.28.162', 5, '上海市-奉贤区', '经营范围变更');
INSERT INTO `comment` VALUES (1810, 14, 0, 0, '细心，耐心，专业，给力！', 1533518360, 5, 5, 5, '1,2,4,5,6,7', 1, 0, 12, '114.94.28.162', 5, '上海市-闵行区', '经营范围变更');
INSERT INTO `comment` VALUES (1811, 29, 0, 0, '态度非常好，人很耐心，有亲和力，有问必答，服务很周到。', 1533118508, 5, 5, 5, '2,4,5,7', 1, 0, 7, '114.94.28.162', 5, '上海市-青浦区', '个体商户注册');
INSERT INTO `comment` VALUES (1812, 22, 0, 0, '挺讲信用的，不错的代办公司，以后长期合作。', 1531788270, 5, 5, 5, '1,3,4,5,6,7', 1, 0, 220, '114.94.28.162', 5, '上海市-长宁区', '社保开户');
INSERT INTO `comment` VALUES (1813, 28, 0, 0, '业务能力强 办事利索 快', 1532890964, 5, 5, 5, '2,5,6', 1, 0, 14, '114.94.28.162', 5, '上海市-松江区', '简易注销');
INSERT INTO `comment` VALUES (1814, 14, 0, 0, '超预期的服务体验，大力推荐。以后我们公司业务就找你了。蒸蒸日上哦', 1533621025, 5, 5, 5, '2,3,4,6', 1, 0, 111, '114.94.28.162', 5, '上海市-黄浦区', '字号变更');
INSERT INTO `comment` VALUES (1815, 20, 0, 0, '比较诚恳，做事效率比较高，专业性也不错，交给他们做很放心', 1533435989, 5, 5, 5, '3,4', 1, 0, 115, '114.94.28.162', 5, '上海市-虹口区', '跨市地址变更');
INSERT INTO `comment` VALUES (1816, 24, 0, 0, '这个注册过程还是蛮顺利的，谢谢', 1532819054, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 3, '114.94.28.162', 5, '上海市-虹口区', '外商独资公司注册');
INSERT INTO `comment` VALUES (1817, 26, 0, 0, '态度非常好，人很耐心，有亲和力，有问必答，服务很周到。', 1531375123, 5, 5, 5, '2,3,4', 1, 0, 115, '114.94.28.162', 5, '上海市-普陀区', '跨市地址变更');
INSERT INTO `comment` VALUES (1818, 21, 0, 0, '办事细心，业务很熟悉，做事认真负责', 1533962844, 5, 5, 5, '1,3,4,5', 1, 0, 16, '114.94.28.162', 5, '上海市-奉贤区', '年报公示');
INSERT INTO `comment` VALUES (1819, 24, 0, 0, '非常好。谢谢。', 1529644276, 5, 5, 5, '1,2,5', 1, 0, 114, '114.94.28.162', 5, '上海市-嘉定区', '跨区地址变更');
INSERT INTO `comment` VALUES (1820, 28, 0, 0, '办事效率高，很专业，值得信赖', 1533435830, 5, 5, 5, '4,6,7', 1, 0, 15, '114.94.28.162', 5, '上海市-嘉定区', '一般注销');
INSERT INTO `comment` VALUES (1821, 28, 0, 0, '加油，刚刚注册了公司，原来不知道这方面还有这么多需要注意的事情。学习到了很多，希望我能和你们一起成长', 1529517118, 5, 5, 5, '1,2,3,6,7', 1, 0, 111, '114.94.28.162', 5, '上海市-静安区', '字号变更');
INSERT INTO `comment` VALUES (1822, 242, 0, 0, '服务非常好。反馈的问题也得到了解决。', 1532474226, 5, 5, 5, '1,2,3,4,7', 1, 0, 1, '114.94.28.162', 5, '上海市-嘉定区', '有限公司注册');
INSERT INTO `comment` VALUES (1823, 21, 0, 0, '很专业 开户办理的很顺利 而且很细心 有问必答 服务效率高，很难见到这种专业而又效率的公司了，绝对好评', 1532592522, 5, 5, 5, '1,3,4,5,6,7', 1, 0, 10, '114.94.28.162', 5, '上海市-松江区', '股权变更');
INSERT INTO `comment` VALUES (1824, 242, 0, 0, '為人民服務 不忘初心 继续前进', 1529142232, 5, 5, 5, '3,4,5,7', 1, 0, 3, '114.94.28.162', 5, '上海市-浦东新区', '外商独资公司注册');
INSERT INTO `comment` VALUES (1825, 12, 0, 0, '这个注册过程还是蛮顺利的，谢谢', 1532699296, 5, 5, 5, '3,6,7', 1, 0, 11, '114.94.28.162', 5, '上海市-自贸区', '法人变更');
INSERT INTO `comment` VALUES (1826, 13, 0, 0, '非常棒的服务，沟通顺畅，有耐心', 1532449672, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 3, '114.94.28.162', 5, '上海市-松江区', '外商独资公司注册');
INSERT INTO `comment` VALUES (1827, 27, 0, 0, '非常好。谢谢。', 1529867043, 5, 5, 5, '1,3,4,5,6,7', 1, 0, 220, '114.94.28.162', 5, '上海市-松江区', '社保开户');
INSERT INTO `comment` VALUES (1828, 14, 0, 0, '很专业 有问必答 给他们做这些很放心。', 1531628537, 5, 5, 5, '1,2,3,5,7', 1, 0, 219, '114.94.28.162', 5, '上海市-奉贤区', '法人一证通办理');
INSERT INTO `comment` VALUES (1829, 14, 0, 0, '业务熟练，态度温和，比较认真负责', 1531574351, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 13, '114.94.28.162', 5, '上海市-静安区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (1830, 18, 0, 0, '很感谢两位，公司注册好了，沟通很顺畅，服务很到位，希望下次继续合作。', 1529292449, 5, 5, 5, '2,3,4,5,6,7', 1, 0, 12, '114.94.28.162', 5, '上海市-虹口区', '经营范围变更');
INSERT INTO `comment` VALUES (1831, 25, 0, 0, '满意，省心省力～', 1529836903, 5, 5, 5, '3,6', 1, 0, 3, '114.94.28.162', 5, '上海市-松江区', '外商独资公司注册');
INSERT INTO `comment` VALUES (1832, 28, 0, 0, '非常有责任心，时间观念超级强，很期待跟您的下次合作！！', 1529420310, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 6, '114.94.28.162', 5, '上海市-奉贤区', '办事处注册');
INSERT INTO `comment` VALUES (1833, 22, 0, 0, '服务很好，很细致很周到.', 1532467269, 5, 5, 5, '1,2,3,4,5,7', 1, 0, 10, '114.94.28.162', 5, '上海市-黄浦区', '股权变更');
INSERT INTO `comment` VALUES (1834, 12, 0, 0, '很感谢两位，公司注册好了，沟通很顺畅，服务很到位，希望下次继续合作。', 1531762811, 5, 5, 5, '1,4,5,6', 1, 0, 10, '114.94.28.162', 5, '上海市-闵行区', '股权变更');
INSERT INTO `comment` VALUES (1835, 2, 0, 0, '用心服务，用心对待；办事效率高；感谢王哥，做了几项业务了；后期有需求还是会选择您，再次感谢', 1530000369, 5, 5, 5, '1,2,3,4,7', 1, 0, 1, '114.94.28.162', 5, '上海市-静安区', '有限公司注册');
INSERT INTO `comment` VALUES (1836, 27, 0, 0, '很不错，响应和服务都很好。', 1530275107, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 115, '114.94.28.162', 5, '上海市-闵行区', '跨市地址变更');
INSERT INTO `comment` VALUES (1837, 20, 0, 0, '很专业，服务很热情周到，效率很高', 1530431055, 5, 5, 5, '1,4,7', 1, 0, 14, '114.94.28.162', 5, '上海市-长宁区', '简易注销');
INSERT INTO `comment` VALUES (1838, 242, 0, 0, '办事效率还是挺高的，也很会为客户着想。', 1533601305, 5, 5, 5, '1,2,3,6,7', 1, 0, 5, '114.94.28.162', 5, '上海市-闵行区', '分公司注册');
INSERT INTO `comment` VALUES (1839, 21, 0, 0, '一周内办完流程和手续，专业度高', 1533923503, 5, 5, 5, '1,5,6', 1, 0, 220, '114.94.28.162', 5, '上海市-浦东新区', '社保开户');
INSERT INTO `comment` VALUES (1840, 20, 0, 0, '办事速度快，靠谱，非常专业，后期会一直合作。', 1534160187, 5, 5, 5, '2,4,6', 1, 0, 5, '114.94.28.162', 5, '上海市-嘉定区', '分公司注册');
INSERT INTO `comment` VALUES (1841, 24, 0, 0, '漂亮声音还好听做事认真知心姐姐特别有耐心', 1532401962, 5, 5, 5, '2,3,4,5', 1, 0, 20, '114.94.28.162', 5, '上海市-松江区', '银行开户预约');
INSERT INTO `comment` VALUES (1842, 26, 0, 0, '很专业 开户办理的很顺利 而且很细心 有问必答 服务效率高，很难见到这种专业而又效率的公司了，绝对好评', 1531757418, 5, 5, 5, '1,6,7', 1, 0, 111, '114.94.28.162', 5, '上海市-闵行区', '字号变更');
INSERT INTO `comment` VALUES (1843, 26, 0, 0, '挺好的，非常敬业，很快就办好了，不错。', 1533598980, 5, 5, 5, '1,2,4', 1, 0, 2, '114.94.28.162', 5, '上海市-长宁区', '股份有限公司注册');
INSERT INTO `comment` VALUES (1844, 12, 0, 0, '注册公司很块，中间的流程都办的请清楚楚，没有浪费一分时间，1280元', 1533537399, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 7, '114.94.28.162', 5, '上海市-杨浦区', '个体商户注册');
INSERT INTO `comment` VALUES (1845, 20, 0, 0, '很专业 有问必答 给他们做这些很放心。', 1532101329, 5, 5, 5, '3,4,5,6', 1, 0, 115, '114.94.28.162', 5, '上海市-长宁区', '跨市地址变更');
INSERT INTO `comment` VALUES (1846, 21, 0, 0, '非常有耐心的一个人，是个好姑凉，希望老板多给她加薪奖励。', 1533042172, 5, 5, 5, '1,5', 1, 0, 221, '114.94.28.162', 5, '上海市-青浦区', '公积金开户');
INSERT INTO `comment` VALUES (1847, 242, 0, 0, '非常好的服务，每次都是很耐心的帮忙查询，给出建议', 1532280343, 5, 5, 5, '1,2,3,5,6,7', 1, 0, 114, '114.94.28.162', 5, '上海市-静安区', '跨区地址变更');
INSERT INTO `comment` VALUES (1848, 29, 0, 0, '现在想想还是蛮不错的，当时自己太急躁了！', 1531360545, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 18, '114.94.28.162', 5, '上海市-杨浦区', '工商解异常');
INSERT INTO `comment` VALUES (1849, 28, 0, 0, '非常迅速，反馈也很及时，没想到这么快办完了。非常满意的一次服务', 1532635861, 5, 5, 5, '3,5,7', 1, 0, 20, '114.94.28.162', 5, '上海市-自贸区', '银行开户预约');
INSERT INTO `comment` VALUES (1850, 29, 0, 0, '办事速度快，靠谱，非常专业，后期会一直合作', 1529536660, 5, 5, 5, '4,5,6', 1, 0, 3, '114.94.28.162', 5, '上海市-普陀区', '外商独资公司注册');
INSERT INTO `comment` VALUES (1851, 25, 0, 0, '处处为客户着想，非常的专业！', 1533662701, 5, 5, 5, '2,4,6,7', 1, 0, 20, '114.94.28.162', 5, '上海市-宝山区', '银行开户预约');
INSERT INTO `comment` VALUES (1852, 21, 0, 0, '还不错 可是我自己找会计了', 1529427659, 5, 5, 5, '2,3,5', 1, 0, 20, '114.94.28.162', 5, '上海市-闵行区', '银行开户预约');
INSERT INTO `comment` VALUES (1853, 24, 0, 0, '非常棒的体验。省事省心。专业、给力。', 1529250493, 5, 5, 5, '1,3', 1, 0, 2, '114.94.28.162', 5, '上海市-普陀区', '股份有限公司注册');
INSERT INTO `comment` VALUES (1854, 13, 0, 0, '积极配合帮助我们想办法解决注册、银行开户中的各种问题，谢谢。下次注册还找你们', 1530374495, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 14, '114.94.28.162', 5, '上海市-青浦区', '简易注销');
INSERT INTO `comment` VALUES (1855, 12, 0, 0, '积极配合帮助我们想办法解决注册、银行开户中的各种问题，谢谢。下次注册还找你们', 1532563678, 5, 5, 5, '1,4', 1, 0, 14, '114.94.28.162', 5, '上海市-长宁区', '简易注销');
INSERT INTO `comment` VALUES (1856, 19, 0, 0, '非常好的服务，每次都是很耐心的帮忙查询，给出建议', 1531762271, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 11, '114.94.28.162', 5, '上海市-虹口区', '法人变更');
INSERT INTO `comment` VALUES (1857, 14, 0, 0, '非常有责任心，时间观念超级强，很期待跟您的下次合作！！', 1530737764, 5, 5, 5, '2,7', 1, 0, 114, '114.94.28.162', 5, '上海市-杨浦区', '跨区地址变更');
INSERT INTO `comment` VALUES (1858, 27, 0, 0, '服务很好，很细致很周到.', 1533005763, 5, 5, 5, '2,4,5,7', 1, 0, 2, '114.94.28.162', 5, '上海市-徐汇区', '股份有限公司注册');
INSERT INTO `comment` VALUES (1859, 13, 0, 0, '不错，我让我朋友也来这里做，挺负责不错，专业水平也够', 1529148231, 5, 5, 5, '1,3,4,5,6,7', 1, 0, 4, '114.94.28.162', 5, '上海市-金山区', '合伙企业注册');
INSERT INTO `comment` VALUES (1860, 29, 0, 0, '非常好的服务，每次都是很耐心的帮忙查询，给出建议', 1531984019, 5, 5, 5, '1,2,6', 1, 0, 3, '114.94.28.162', 5, '上海市-静安区', '外商独资公司注册');
INSERT INTO `comment` VALUES (1861, 2, 0, 0, '非常棒的服务，沟通顺畅，有耐心', 1529507757, 5, 5, 5, '2,3', 1, 0, 14, '114.94.28.162', 5, '上海市-普陀区', '简易注销');
INSERT INTO `comment` VALUES (1862, 242, 0, 0, '不错，我让我朋友也来这里做，挺负责不错，专业水平也够', 1532925035, 5, 5, 5, '1,2,6,7', 1, 0, 114, '114.94.28.162', 5, '上海市-奉贤区', '跨区地址变更');
INSERT INTO `comment` VALUES (1863, 20, 0, 0, '关键同志，的确服务比较好，专业内容做得好，强烈推荐', 1533911564, 5, 5, 5, '1,3,4', 1, 0, 7, '114.94.28.162', 5, '上海市-杨浦区', '个体商户注册');
INSERT INTO `comment` VALUES (1864, 29, 0, 0, '合作得挺愉快，希望之后还有机会合作。', 1531215742, 5, 5, 5, '1,2,3,4,5,6', 1, 0, 220, '114.94.28.162', 5, '上海市-普陀区', '社保开户');
INSERT INTO `comment` VALUES (1865, 24, 0, 0, '真心不错，随时响应，快，且为客户着想', 1532423944, 5, 5, 5, '1,2,4,5,7', 1, 0, 112, '114.94.28.162', 5, '上海市-静安区', '行业名称变更');
INSERT INTO `comment` VALUES (1866, 27, 0, 0, '非常好的服务，每次都是很耐心的帮忙查询，给出建议', 1531487355, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 18, '114.94.28.162', 5, '上海市-崇明区', '工商解异常');
INSERT INTO `comment` VALUES (1867, 22, 0, 0, '现在想想还是蛮不错的，当时自己太急躁了！', 1530805970, 5, 5, 5, '2,3,4,7', 1, 0, 220, '114.94.28.162', 5, '上海市-虹口区', '社保开户');
INSERT INTO `comment` VALUES (1868, 12, 0, 0, '一气呵成，服务周到，值得推荐', 1530551509, 5, 5, 5, '5,6', 1, 0, 7, '114.94.28.162', 5, '上海市-松江区', '个体商户注册');
INSERT INTO `comment` VALUES (1869, 21, 0, 0, '办事速度快，靠谱，非常专业，后期会一直合作。', 1531918350, 5, 5, 5, '1,2,4,6,7', 1, 0, 13, '114.94.28.162', 5, '上海市-青浦区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (1870, 12, 0, 0, '服务很周到 主要是专业，回答问题及时，太感谢了', 1530483180, 5, 5, 5, '2,6,7', 1, 0, 20, '114.94.28.162', 5, '上海市-宝山区', '银行开户预约');
INSERT INTO `comment` VALUES (1871, 242, 0, 0, '诚信踏实非常专业', 1533589473, 5, 5, 5, '4,5', 1, 0, 111, '114.94.28.162', 5, '上海市-自贸区', '字号变更');
INSERT INTO `comment` VALUES (1872, 22, 0, 0, '服务很好，很细致很周到.', 1530938010, 5, 5, 5, '1,2,3,4,5', 1, 0, 4, '114.94.28.162', 5, '上海市-崇明区', '合伙企业注册');
INSERT INTO `comment` VALUES (1873, 26, 0, 0, '效果很棒，还能及时提醒下一次什么时候办理。', 1534016600, 5, 5, 5, '1,3,5', 1, 0, 10, '114.94.28.162', 5, '上海市-浦东新区', '股权变更');
INSERT INTO `comment` VALUES (1874, 12, 0, 0, '很专业，办事比较主动。', 1531171459, 5, 5, 5, '1,3', 1, 0, 19, '114.94.28.162', 5, '上海市-金山区', '开设银行基本户');
INSERT INTO `comment` VALUES (1875, 22, 0, 0, '注册公司很块，中间的流程都办的请清楚楚，没有浪费一分时间，1280元', 1533426687, 5, 5, 5, '2,3,4,5,6,7', 1, 0, 2, '114.94.28.162', 5, '上海市-徐汇区', '股份有限公司注册');
INSERT INTO `comment` VALUES (1876, 28, 0, 0, '因为要实地注册地址，所以遇到一些麻烦，但是还是非常耐心的帮忙询问，且在原本预计的时间之内拿到营业执照，还是非常感谢的。', 1533653089, 5, 5, 5, '1,5', 1, 0, 11, '114.94.28.162', 5, '上海市-徐汇区', '法人变更');
INSERT INTO `comment` VALUES (1877, 26, 0, 0, '服务细心，非常专业，能切实解决问题，推荐！', 1533065885, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 15, '114.94.28.162', 5, '上海市-松江区', '一般注销');
INSERT INTO `comment` VALUES (1878, 19, 0, 0, '这次注册公司很顺利，虽然中间有政策变动，但是赶在变动前把一切事情都搞定了，很棒，平时有问题也及时帮我解答，不错哦~', 1534088100, 5, 5, 5, '2,3,5,6,7', 1, 0, 115, '114.94.28.162', 5, '上海市-崇明区', '跨市地址变更');
INSERT INTO `comment` VALUES (1879, 242, 0, 0, '一气呵成，服务周到，值得推荐', 1534034071, 5, 5, 5, '4,6', 1, 0, 5, '114.94.28.162', 5, '上海市-黄浦区', '分公司注册');
INSERT INTO `comment` VALUES (1880, 27, 0, 0, '办事效率还是挺高的，也很会为客户着想。', 1533836736, 5, 5, 5, '1,2,3,4,5,6', 1, 0, 221, '114.94.28.162', 5, '上海市-普陀区', '公积金开户');
INSERT INTO `comment` VALUES (1881, 19, 0, 0, '注册公司很块，中间的流程都办的请清楚楚，没有浪费一分时间，1280元', 1533893709, 5, 5, 5, '2,3,5', 1, 0, 13, '114.94.28.162', 5, '上海市-普陀区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (1882, 2, 0, 0, '服务态度别好，办事效率很高，对我不明白的问题进行了一个详细的讲解，很有耐心。特别的感谢这位美女的服务。', 1531471428, 5, 5, 5, '3,4,6', 1, 0, 16, '114.94.28.162', 5, '上海市-崇明区', '年报公示');
INSERT INTO `comment` VALUES (1883, 13, 0, 0, '业务熟练，态度温和，比较认真负责', 1532903091, 5, 5, 5, '1,3,4,5,6,7', 1, 0, 219, '114.94.28.162', 5, '上海市-浦东新区', '法人一证通办理');
INSERT INTO `comment` VALUES (1884, 242, 0, 0, '為人民服務 不忘初心 继续前进', 1533224118, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 112, '114.94.28.162', 5, '上海市-崇明区', '行业名称变更');
INSERT INTO `comment` VALUES (1885, 22, 0, 0, '办事速度快，靠谱，非常专业，后期会一直合作。', 1530494116, 5, 5, 5, '1,3,4,5,7', 1, 0, 1, '114.94.28.162', 5, '上海市-崇明区', '有限公司注册');
INSERT INTO `comment` VALUES (1886, 26, 0, 0, '很感谢两位，公司注册好了，沟通很顺畅，服务很到位，希望下次继续合作。', 1531643093, 5, 5, 5, '1,3,5', 1, 0, 221, '114.94.28.162', 5, '上海市-嘉定区', '公积金开户');
INSERT INTO `comment` VALUES (1887, 25, 0, 0, '非常好。帮助并办理注册公司的整个过程。很好的的一个人', 1530199057, 5, 5, 5, '2,7', 1, 0, 6, '114.94.28.162', 5, '上海市-自贸区', '办事处注册');
INSERT INTO `comment` VALUES (1888, 14, 0, 0, '对这次服务非常满意，之前已在这个网站注册过公司，现在介绍朋友来，朋友评价不错。', 1533729452, 5, 5, 5, '4,5,7', 1, 0, 4, '114.94.28.162', 5, '上海市-崇明区', '合伙企业注册');
INSERT INTO `comment` VALUES (1889, 18, 0, 0, '业务熟练，态度温和，比较认真负责', 1530276762, 5, 5, 5, '3,4', 1, 0, 14, '114.94.28.162', 5, '上海市-崇明区', '简易注销');
INSERT INTO `comment` VALUES (1890, 2, 0, 0, '真心不错，随时响应，快，且为客户着想', 1530939541, 5, 5, 5, '1,2,3,4,6,7', 1, 0, 6, '114.94.28.162', 5, '上海市-闵行区', '办事处注册');
INSERT INTO `comment` VALUES (1891, 18, 0, 0, '很有责任心，专业热情，有问必答，真的很有耐心，我有好多不了解的事情Dear耐心帮我解答，32个赞！！！！', 1531183375, 5, 5, 5, '1,2,4,6,7', 1, 0, 221, '114.94.28.162', 5, '上海市-青浦区', '公积金开户');
INSERT INTO `comment` VALUES (1892, 12, 0, 0, '非常有责任心，时间观念超级强，很期待跟您的下次合作！！', 1531514695, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 1, '114.94.28.162', 5, '上海市-闵行区', '有限公司注册');
INSERT INTO `comment` VALUES (1893, 13, 0, 0, '服务很周到 主要是专业，回答问题及时，太感谢了', 1530745475, 5, 5, 5, '1,2,3,4,6,7', 1, 0, 221, '114.94.28.162', 5, '上海市-长宁区', '公积金开户');
INSERT INTO `comment` VALUES (1894, 13, 0, 0, '一气呵成，服务周到，值得推荐', 1533441613, 5, 5, 5, '3,7', 1, 0, 13, '114.94.28.162', 5, '上海市-虹口区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (1895, 29, 0, 0, '非常迅速，反馈也很及时，没想到这么快办完了。非常满意的一次服务', 1532173220, 5, 5, 5, '1,3,5,6', 1, 0, 1, '114.94.28.162', 5, '上海市-黄浦区', '有限公司注册');
INSERT INTO `comment` VALUES (1896, 28, 0, 0, '还不错 可是我自己找会计了', 1532297985, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 221, '114.94.28.162', 5, '上海市-黄浦区', '公积金开户');
INSERT INTO `comment` VALUES (1897, 241, 0, 0, '对这次服务非常满意，之前已在这个网站注册过公司，现在介绍朋友来，朋友评价不错。', 1530033909, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 16, '114.94.28.162', 5, '上海市-普陀区', '年报公示');
INSERT INTO `comment` VALUES (1898, 19, 0, 0, '业务能力强 办事利索 快', 1530476014, 5, 5, 5, '1,3,4,5,6', 1, 0, 2, '114.94.28.162', 5, '上海市-黄浦区', '股份有限公司注册');
INSERT INTO `comment` VALUES (1899, 21, 0, 0, '越努力就越辛运，以后有机会合作！', 1530770676, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 7, '114.94.28.162', 5, '上海市-静安区', '个体商户注册');
INSERT INTO `comment` VALUES (1900, 29, 0, 0, '非常有耐心的一个人，是个好姑凉，希望老板多给她加薪奖励。', 1530100904, 5, 5, 5, '1,2,4,5,6,7', 1, 0, 11, '114.94.28.162', 5, '上海市-宝山区', '法人变更');
INSERT INTO `comment` VALUES (1901, 2, 0, 0, '非常感谢，长期合作，祝事业蒸蒸日上', 1531677691, 5, 5, 5, '2,3,4,7', 1, 0, 19, '114.94.28.162', 5, '上海市-闵行区', '开设银行基本户');
INSERT INTO `comment` VALUES (1902, 26, 0, 0, '这次注册公司很顺利，虽然中间有政策变动，但是赶在变动前把一切事情都搞定了，很棒，平时有问题也及时帮我解答，不错哦~', 1531147260, 5, 5, 5, '2,3,5,6,7', 1, 0, 10, '114.94.28.162', 5, '上海市-长宁区', '股权变更');
INSERT INTO `comment` VALUES (1903, 242, 0, 0, '讲解耐心，充分为客户照相，做事认真', 1530390371, 5, 5, 5, '3,4,5', 1, 0, 15, '114.94.28.162', 5, '上海市-长宁区', '一般注销');
INSERT INTO `comment` VALUES (1904, 12, 0, 0, '满意，省心省力～', 1534089238, 5, 5, 5, '2,4,7', 1, 0, 4, '114.94.28.162', 5, '上海市-自贸区', '合伙企业注册');
INSERT INTO `comment` VALUES (1905, 20, 0, 0, '满意，省心省力～', 1529974869, 5, 5, 5, '1,2,6,7', 1, 0, 17, '114.94.28.162', 5, '上海市-宝山区', '五证合一');
INSERT INTO `comment` VALUES (1906, 22, 0, 0, '不错，我让我朋友也来这里做，挺负责不错，专业水平也够', 1533207945, 5, 5, 5, '2,3,5', 1, 0, 112, '114.94.28.162', 5, '上海市-青浦区', '行业名称变更');
INSERT INTO `comment` VALUES (1907, 21, 0, 0, '很好 办事细腻认真', 1532797252, 5, 5, 5, '2,4', 1, 0, 13, '114.94.28.162', 5, '上海市-自贸区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (1908, 21, 0, 0, '办事速度快，靠谱，非常专业，后期会一直合作。', 1534148929, 5, 5, 5, '3,4,5,6', 1, 0, 221, '114.94.28.162', 5, '上海市-崇明区', '公积金开户');
INSERT INTO `comment` VALUES (1909, 22, 0, 0, '合作得挺愉快，希望之后还有机会合作。', 1532472424, 5, 5, 5, '2,3,4,6,7', 1, 0, 13, '114.94.28.162', 5, '上海市-闵行区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (1910, 241, 0, 0, '挺好的，非常敬业，很快就办好了，不错。', 1528931426, 5, 5, 5, '1,2,3,4,5,7', 1, 0, 220, '114.94.28.162', 5, '上海市-金山区', '社保开户');
INSERT INTO `comment` VALUES (1911, 24, 0, 0, '好，质素高，人老实，服务好', 1533961431, 5, 5, 5, '1,2,3,4,6,7', 1, 0, 10, '114.94.28.162', 5, '上海市-黄浦区', '股权变更');
INSERT INTO `comment` VALUES (1912, 242, 0, 0, '不错，办事效率挺高，沟通到位，回复及时', 1530230925, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 18, '114.94.28.162', 5, '上海市-浦东新区', '工商解异常');
INSERT INTO `comment` VALUES (1913, 18, 0, 0, '服务很好，很周到，有问必答，为客户着想，效率很高，合作很愉快', 1532940605, 5, 5, 5, '1,4,5,7', 1, 0, 7, '114.94.28.162', 5, '上海市-长宁区', '个体商户注册');
INSERT INTO `comment` VALUES (1914, 29, 0, 0, '关键同志，的确服务比较好，专业内容做得好，强烈推荐', 1529991527, 5, 5, 5, '6,7', 1, 0, 5, '114.94.28.162', 5, '上海市-长宁区', '分公司注册');
INSERT INTO `comment` VALUES (1915, 24, 0, 0, '满意，省心省力～', 1532515442, 5, 5, 5, '1,2,3', 1, 0, 15, '114.94.28.162', 5, '上海市-崇明区', '一般注销');
INSERT INTO `comment` VALUES (1916, 2, 0, 0, '因为要实地注册地址，所以遇到一些麻烦，但是还是非常耐心的帮忙询问，且在原本预计的时间之内拿到营业执照，还是非常感谢的。', 1532078092, 5, 5, 5, '2,4,5,6', 1, 0, 114, '114.94.28.162', 5, '上海市-闵行区', '跨区地址变更');
INSERT INTO `comment` VALUES (1917, 242, 0, 0, '以后办理还找他。实在感谢', 1528998755, 5, 5, 5, '1,2,3,4,6,7', 1, 0, 11, '114.94.28.162', 5, '上海市-长宁区', '法人变更');
INSERT INTO `comment` VALUES (1918, 28, 0, 0, '还不错 可是我自己找会计了', 1533240919, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 220, '114.94.28.162', 5, '上海市-闵行区', '社保开户');
INSERT INTO `comment` VALUES (1919, 20, 0, 0, '诚信踏实非常专业', 1531395363, 5, 5, 5, '2,4', 1, 0, 113, '114.94.28.162', 5, '上海市-金山区', '本区地址变更');
INSERT INTO `comment` VALUES (1920, 26, 0, 0, '良好的服务和专业水准保证了业务的顺利办理', 1531683973, 5, 5, 5, '2,3,6', 1, 0, 112, '114.94.28.162', 5, '上海市-青浦区', '行业名称变更');
INSERT INTO `comment` VALUES (1921, 242, 0, 0, '业务能力强 办事利索 快', 1533877611, 5, 5, 5, '4,6,7', 1, 0, 6, '114.94.28.162', 5, '上海市-松江区', '办事处注册');
INSERT INTO `comment` VALUES (1922, 26, 0, 0, '很有责任心，专业热情，有问必答，真的很有耐心，我有好多不了解的事情Dear耐心帮我解答，32个赞！！！！', 1531419866, 5, 5, 5, '2,3,4,6', 1, 0, 113, '114.94.28.162', 5, '上海市-浦东新区', '本区地址变更');
INSERT INTO `comment` VALUES (1923, 18, 0, 0, '非常棒的服务，沟通顺畅，有耐心', 1532994447, 5, 5, 5, '1,2,4,7', 1, 0, 3, '114.94.28.162', 5, '上海市-宝山区', '外商独资公司注册');
INSERT INTO `comment` VALUES (1924, 241, 0, 0, '合作得挺愉快，希望之后还有机会合作。', 1534060495, 5, 5, 5, '1,2,5,6', 1, 0, 220, '114.94.28.162', 5, '上海市-黄浦区', '社保开户');
INSERT INTO `comment` VALUES (1925, 20, 0, 0, '好，质素高，人老实，服务好', 1531368620, 5, 5, 5, '1,3,5,6,7', 1, 0, 14, '114.94.28.162', 5, '上海市-自贸区', '简易注销');
INSERT INTO `comment` VALUES (1926, 22, 0, 0, '真心不错，随时响应，快，且为客户着想', 1530867812, 5, 5, 5, '1,3,4,6,7', 1, 0, 3, '114.94.28.162', 5, '上海市-崇明区', '外商独资公司注册');
INSERT INTO `comment` VALUES (1927, 242, 0, 0, '比较诚恳，做事效率比较高，专业性也不错，交给他们做很放心', 1531743279, 5, 5, 5, '1,2,3,4,5,6', 1, 0, 18, '114.94.28.162', 5, '上海市-闵行区', '工商解异常');
INSERT INTO `comment` VALUES (1928, 21, 0, 0, '积极配合帮助我们想办法解决注册、银行开户中的各种问题，谢谢。下次注册还找你们', 1529893721, 5, 5, 5, '3,6', 1, 0, 114, '114.94.28.162', 5, '上海市-静安区', '跨区地址变更');
INSERT INTO `comment` VALUES (1929, 26, 0, 0, '挺好的，非常敬业，很快就办好了，不错。', 1529933299, 5, 5, 5, '1,2,3,4,5,6', 1, 0, 111, '114.94.28.162', 5, '上海市-松江区', '字号变更');
INSERT INTO `comment` VALUES (1930, 29, 0, 0, '积极配合帮助我们想办法解决注册、银行开户中的各种问题，谢谢。下次注册还找你们', 1530779669, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 19, '114.94.28.162', 5, '上海市-浦东新区', '开设银行基本户');
INSERT INTO `comment` VALUES (1931, 28, 0, 0, '服务很周到 主要是专业，回答问题及时，太感谢了', 1533041238, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 113, '114.94.28.162', 5, '上海市-长宁区', '本区地址变更');
INSERT INTO `comment` VALUES (1932, 242, 0, 0, '很专业，对待客户的问题细致耐心，赞', 1534129611, 5, 5, 5, '1,2,3', 1, 0, 13, '114.94.28.162', 5, '上海市-松江区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (1933, 24, 0, 0, '超预期的服务体验，大力推荐。以后我们公司业务就找你了。蒸蒸日上哦', 1529083812, 5, 5, 5, '2,3,4,6', 1, 0, 5, '114.94.28.162', 5, '上海市-徐汇区', '分公司注册');
INSERT INTO `comment` VALUES (1934, 14, 0, 0, '服务很周到 主要是专业，回答问题及时，太感谢了', 1532000858, 5, 5, 5, '2,5', 1, 0, 17, '114.94.28.162', 5, '上海市-金山区', '五证合一');
INSERT INTO `comment` VALUES (1935, 24, 0, 0, '讲解耐心，充分为客户照相，做事认真', 1531070888, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 1, '114.94.28.162', 5, '上海市-黄浦区', '有限公司注册');
INSERT INTO `comment` VALUES (1936, 29, 0, 0, '现在想想还是蛮不错的，当时自己太急躁了！', 1531255709, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 17, '114.94.28.162', 5, '上海市-青浦区', '五证合一');
INSERT INTO `comment` VALUES (1937, 25, 0, 0, '一气呵成，服务周到，值得推荐', 1533983282, 5, 5, 5, '1,3,7', 1, 0, 19, '114.94.28.162', 5, '上海市-崇明区', '开设银行基本户');
INSERT INTO `comment` VALUES (1938, 242, 0, 0, '办事细心，业务很熟悉，做事认真负责', 1532260013, 5, 5, 5, '2,3,4', 1, 0, 3, '114.94.28.162', 5, '上海市-自贸区', '外商独资公司注册');
INSERT INTO `comment` VALUES (1939, 14, 0, 0, '很专业，对待客户的问题细致耐心，赞', 1533029727, 5, 5, 5, '1,2,4', 1, 0, 18, '114.94.28.162', 5, '上海市-自贸区', '工商解异常');
INSERT INTO `comment` VALUES (1940, 18, 0, 0, '因为要实地注册地址，所以遇到一些麻烦，但是还是非常耐心的帮忙询问，且在原本预计的时间之内拿到营业执照，还是非常感谢的。', 1532934857, 5, 5, 5, '2,5', 1, 0, 16, '114.94.28.162', 5, '上海市-奉贤区', '年报公示');
INSERT INTO `comment` VALUES (1941, 18, 0, 0, '办事效率还是挺高的，也很会为客户着想。', 1532983994, 5, 5, 5, '1,2,5,6', 1, 0, 13, '114.94.28.162', 5, '上海市-徐汇区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (1942, 19, 0, 0, '服务很周到，专业，为初次创业注册公司解决了很多问题！', 1532228504, 5, 5, 5, '2,6', 1, 0, 20, '114.94.28.162', 5, '上海市-金山区', '银行开户预约');
INSERT INTO `comment` VALUES (1943, 2, 0, 0, '很专业，对待客户的问题细致耐心，赞', 1530572130, 5, 5, 5, '1,2,4,5,6', 1, 0, 3, '114.94.28.162', 5, '上海市-浦东新区', '外商独资公司注册');
INSERT INTO `comment` VALUES (1944, 241, 0, 0, '讲解耐心，充分为客户照相，做事认真', 1531662698, 5, 5, 5, '3,5,6', 1, 0, 15, '114.94.28.162', 5, '上海市-静安区', '一般注销');
INSERT INTO `comment` VALUES (1945, 12, 0, 0, '很专业 有问必答 给他们做这些很放心。', 1532162516, 5, 5, 5, '1,6,7', 1, 0, 219, '114.94.28.162', 5, '上海市-徐汇区', '法人一证通办理');
INSERT INTO `comment` VALUES (1946, 29, 0, 0, '服务细心，非常专业，能切实解决问题，推荐！', 1533070487, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 15, '114.94.28.162', 5, '上海市-黄浦区', '一般注销');
INSERT INTO `comment` VALUES (1947, 242, 0, 0, '超出预期，低调还特别有效率，赞一个', 1530620969, 5, 5, 5, '3,4,5,6,7', 1, 0, 3, '114.94.28.162', 5, '上海市-金山区', '外商独资公司注册');
INSERT INTO `comment` VALUES (1948, 12, 0, 0, '处处为客户着想，非常的专业！', 1529569370, 5, 5, 5, '1,2,4,5,7', 1, 0, 12, '114.94.28.162', 5, '上海市-奉贤区', '经营范围变更');
INSERT INTO `comment` VALUES (1949, 2, 0, 0, '非常好的服务，每次都是很耐心的帮忙查询，给出建议', 1531503847, 5, 5, 5, '1,2,3,5,7', 1, 0, 15, '114.94.28.162', 5, '上海市-青浦区', '一般注销');
INSERT INTO `comment` VALUES (1950, 241, 0, 0, '办事效率高，主动热情', 1532742934, 5, 5, 5, '1,2,3,4,5,6,7', 1, 0, 13, '114.94.28.162', 5, '上海市-虹口区', '董监高管理人员信息变更');
INSERT INTO `comment` VALUES (1951, 27, 0, 0, '以后办理还找他。实在感谢', 1528971497, 5, 5, 5, '1,2,4,5,6,7', 1, 0, 7, '114.94.28.162', 5, '上海市-松江区', '个体商户注册');
INSERT INTO `comment` VALUES (1952, 13, 0, 0, '非常有耐心的一个人，是个好姑凉，希望老板多给她加薪奖励。', 1532057938, 5, 5, 5, '2,4,7', 1, 0, 111, '114.94.28.162', 5, '上海市-徐汇区', '字号变更');
INSERT INTO `comment` VALUES (1953, 19, 0, 0, '服务很好，很细致很周到.', 1532584903, 5, 5, 5, '3,7', 1, 0, 111, '114.94.28.162', 5, '上海市-松江区', '字号变更');
INSERT INTO `comment` VALUES (1954, 18, 0, 0, '漂亮声音还好听做事认真知心姐姐特别有耐心', 1530956818, 5, 5, 5, '3,7', 1, 0, 14, '114.94.28.162', 5, '上海市-自贸区', '简易注销');
INSERT INTO `comment` VALUES (1955, 24, 0, 0, '这个注册过程还是蛮顺利的，谢谢', 1532824983, 5, 5, 5, '5,7', 1, 0, 15, '114.94.28.162', 5, '上海市-浦东新区', '一般注销');

-- ----------------------------
-- Table structure for frozen_account
-- ----------------------------
DROP TABLE IF EXISTS `frozen_account`;
CREATE TABLE `frozen_account`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shopid` int(11) NOT NULL COMMENT '服务商id',
  `money` decimal(10, 2) NOT NULL COMMENT '冻结金额',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `order_id` int(11) NOT NULL COMMENT '订单ID',
  `order_sn` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT '订单编号',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci COMMENT = '冻结余额表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of frozen_account
-- ----------------------------
INSERT INTO `frozen_account` VALUES (1, 241, 980.00, 1711169927, 766, '202403235562481015');

-- ----------------------------
-- Table structure for goods_news
-- ----------------------------
DROP TABLE IF EXISTS `goods_news`;
CREATE TABLE `goods_news`  (
  `goods_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of goods_news
-- ----------------------------
INSERT INTO `goods_news` VALUES (1, 114);
INSERT INTO `goods_news` VALUES (10, 114);
INSERT INTO `goods_news` VALUES (1, 113);
INSERT INTO `goods_news` VALUES (1, 115);
INSERT INTO `goods_news` VALUES (2, 115);
INSERT INTO `goods_news` VALUES (3, 115);
INSERT INTO `goods_news` VALUES (4, 115);
INSERT INTO `goods_news` VALUES (5, 115);
INSERT INTO `goods_news` VALUES (6, 115);
INSERT INTO `goods_news` VALUES (7, 115);

-- ----------------------------
-- Table structure for members1
-- ----------------------------
DROP TABLE IF EXISTS `members1`;
CREATE TABLE `members1`  (
  `userid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '会员id',
  `username` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '账号名',
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '密码，加密方式为：明码md5得到的结果后面拼接上加密秘钥（encrypt），最后在md5',
  `encrypt` char(6) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '秘钥（六位的随机字母）',
  `birthday` int(11) NOT NULL COMMENT '生日',
  `sex` tinyint(1) NOT NULL DEFAULT 0 COMMENT '性别 0保密 1男 2女',
  `realname` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '真实姓名',
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '邮箱',
  `emailauth` tinyint(1) NOT NULL COMMENT '0:未认证;1已认证',
  `skype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'skype',
  `qq` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `education` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '最高学历：0 初中 1 高中 2 大专 3本科 4硕士 5博士 6其他',
  `trade` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `profession` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '职业',
  `region_id` int(11) NOT NULL COMMENT '地区id',
  `mobile` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1:客户;2:服务商',
  `register_time` int(11) NOT NULL COMMENT '注册时间（时间戳）',
  `register_ip` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '注册IP',
  `login_time` int(11) NOT NULL COMMENT '上次登陆时间（时间戳）',
  `login_ip` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '上次登陆IP',
  `login_count` int(11) NOT NULL DEFAULT 0 COMMENT '总计登陆次数',
  `disabled` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1账号禁用 0正常使用',
  `subAccountSid` char(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '云通讯子账户Id',
  `subToken` char(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '云通讯子账户的授权令牌',
  `dateCreated` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '云通讯子账户的创建时间',
  `voipAccount` varchar(14) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '云通讯VoIP号码',
  `voipPwd` char(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '云通讯VoIP密码',
  `online` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '0 不在线 1在线',
  `money` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '钱包',
  `shop_contact` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '商铺联系人',
  `contact_number` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '商铺的联系方式',
  `shop_address` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '商铺的详细地址',
  `sort` tinyint(6) NOT NULL,
  `addtime` datetime NULL DEFAULT '2017-10-23 13:46:53' COMMENT '修理厂入驻平台时间',
  `rtype` tinyint(1) NOT NULL DEFAULT 2 COMMENT '用户类型 {1:签约用户,2:注册用户,3:内部用户,4:注册修理厂}',
  `isexamine` tinyint(2) UNSIGNED NOT NULL DEFAULT 0 COMMENT '0:默认,1:审核通过,2:审核失败,3:待审核状态',
  `login_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '登录验签码',
  `issuppliers` smallint(1) NOT NULL DEFAULT 0 COMMENT '是否为供货商:0默认不是,1是',
  `company` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '公司',
  `post` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '职务',
  `icon` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '头像',
  `wechat` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '微信号',
  `company_addr` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '公司地址',
  `company_province` int(11) NULL DEFAULT NULL COMMENT '公司所在省',
  `company_city` int(11) NULL DEFAULT NULL COMMENT '公司所在市',
  `company_area` int(11) NULL DEFAULT NULL COMMENT '公司所在区',
  `order_num` int(11) NOT NULL DEFAULT 0 COMMENT '订单数',
  PRIMARY KEY (`userid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 245 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '账户主表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of members1
-- ----------------------------
INSERT INTO `members1` VALUES (12, '153****5719', 'd2a933660afaad4092e97d6a0f684ff6', 'ncLmgT', 0, 0, '张三', '', 0, '', '', '', '', '', 0, '15371715719', 1, 1529748064, '101.87.3.36', 1712820600, '192.168.177.1', 0, 0, '', '', '', '', '', 0, 0.00, '', '', '', 0, '2017-10-23 13:46:53', 2, 0, 'b91342de-c8b1-40f4-b359-6eaab91f4005', 0, '', '', '', '', NULL, NULL, NULL, NULL, 0);
INSERT INTO `members1` VALUES (241, '18621153185', '65313bd486ffc8eb4d9aecaebeee4e19', 'jcYQxz', 0, 0, '上海章大牛企业管理有限公司', '28586585@qq.com', 0, '', '', '', '', '', 0, '18621153185', 2, 1530271458, '101.87.3.36', 1710895800, '112.2.149.76', 0, 0, '', '', '', '', '', 0, 76970.05, '', '', '', 100, '2017-10-23 13:46:53', 2, 0, '', 0, '唧唧', 'vh556', '', '', NULL, 10, 109, 1215, 0);

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `catid` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '文章所属栏目id（对应happy_category中的catid）',
  `userid` mediumint(6) NOT NULL DEFAULT 0 COMMENT '前台用户id',
  `adminid` mediumint(6) NOT NULL DEFAULT 0 COMMENT '后台管理员id',
  `title` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '标题',
  `style` char(24) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '标题样式',
  `thumb` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '缩略图',
  `keywords` char(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '关键词',
  `description` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '描述',
  `content` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '内容',
  `listorder` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '排序',
  `status` tinyint(2) UNSIGNED NOT NULL DEFAULT 1 COMMENT '0草稿   1发布  2未发布',
  `recommend` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1推荐 ',
  `top` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1置顶 0不置顶',
  `copyfrom` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '文章来源',
  `islink` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否是外链文章（0否 1是 默认为0）',
  `url` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '外链url',
  `views` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '访问次数',
  `inputtime` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '添加文章时间（时间戳）',
  `updatetime` int(10) NOT NULL COMMENT '更新文章时间（时间戳）',
  `publishtime` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '发布文章时间（时间戳）',
  `isdel` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1为删除',
  `isshow` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1为显示',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `status`(`status`, `listorder`, `id`) USING BTREE,
  INDEX `listorder`(`catid`, `status`, `listorder`, `id`) USING BTREE,
  INDEX `catid`(`catid`, `status`, `id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 116 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = 'CMS文章表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES (93, 1, 0, 0, '车配龙商城招商公告', '', '', '', '', '<p><a style=\\\"text-decoration-line: underline; cursor: pointer; color: rgb(240, 68, 48); font-size: 12px; display: inline-block; max-width: 100%; overflow: hidden; text-overflow: ellipsis; font-family: &quot;Microsoft YaHei&quot;, tahoma, arial, &quot;Hiragino Sans GB&quot;, sans-serif; background-color: rgb(255, 255, 255);\\\">车配龙商城更新提示</a></p>', 0, 1, 0, 0, '', 0, '', 0, 1495705492, 1495705492, 0, 1, 1);
INSERT INTO `news` VALUES (98, 1, 0, 0, '车配龙真正打造能够净化市场的中国汽配电商第一网', '', '', '', '', '<p style=\\\"text-align:center\\\"><strong><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 22px\\\"><span style=\\\"font-family:宋体\\\">这里有全车件，还有透明的价格</span></span></strong></p><p style=\\\"text-align:center\\\"><strong><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 22px\\\"><span style=\\\"font-family:宋体\\\">车配龙真正打造能够净化市场的中国汽配电商第一网</span></span></strong></p><p style=\\\"line-height: 120%; text-align: right;\\\"><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">——</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">专访上海燎申（集团）有限公司副总裁、上海车配龙（股份）有限公司董事总经理史中</span></span></p><p style=\\\"text-align:center;line-height:120%\\\"><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">本报记者　黄霞</span></span></p><p style=\\\"text-indent:28px\\\"><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">汽配城要转型，这是每一位</span><span style=\\\"font-family:宋体\\\">老汽配人</span><span style=\\\"font-family:宋体\\\">心知肚明的事，因为他们都在经受搬迁、销售模式改变、互联网冲击带来的影响。最让记者感叹的莫过于，</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">2015</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">年有着悠久历史的京城西效汽配城搬迁了，很多老汽配人就此改行。与此同时，汽配电子商城兴起，各路资本蜂拥而至，京东、淘宝等打造的汽配商城已名声在外，传统汽车零部件企业、海外电商、汽车后市场达人、甚至整车企业都在积极搭建汽配件的网上销售平台。但是，目前我国没有一家汽车网上商城能够做到真正直击痛点净化汽车后市场环境。</span></span></p><p style=\\\"text-indent:28px\\\"><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">在</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">2017</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">年上海车展期间，记者了解到上海汽车配件圈的</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">“</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">一枝独秀</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">”——</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">上海车配龙</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">(</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">股份</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">)</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">有限公司（简称</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">“</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">车配龙</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">”</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">）网上商城要改变行业现状。那么，车配龙网上商城能否融合传统优势与互联网思维？它能承载净化汽车后市场环境的重任吗？带着一系列的疑问甚至是期望，记者于车展期间专访了上海燎申（集团）有限公司副总裁、上海车配龙（股份）有限公司董事总经理史中。</span></span></p><p style=\\\"text-indent:28px\\\"><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">&nbsp;</span></p><p style=\\\"text-indent:28px\\\"><strong><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">主动与资本对接　车配龙上新三板了</span></span></strong></p><p style=\\\"text-indent:28px\\\"><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">这是为数不多的传统汽配城主动出击打造网上商城的案例，正因此，车配龙于去年</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">4</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">月在新三板上挂牌上市。</span></span></p><p style=\\\"text-indent:28px\\\"><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">“</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">我们要把车配龙打造成中国汽车后服务市场的</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">’</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">第一股</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">’</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">。</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">”</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">史中说的这席话十分提士气。据悉，车配龙成立于</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">2008</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">年，由原吴中汽配城演变发展而来，目前是上海规模最大的汽配交易市场之一。他对记者说：</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">“</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">目前车配龙占地</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">150</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">亩，年交易额达到</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">40</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">亿元，年创税</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">2</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">亿元以上，目前车配龙</span></span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">市场</span></span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">拥有超过</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">1200</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">家商户，业务包括汽配件、汽车美容、改装</span></span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">、配送物流</span></span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">等。</span><span style=\\\"font-family:宋体\\\">年营收达百亿元的上海燎申（集团）有限公司</span><span style=\\\"font-family:宋体\\\">是车配龙的大股东。</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">”</span></p><p style=\\\"text-indent:28px\\\"><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">车配龙拥有一定实力、且主动与资本市场对接，还在合适的时间里积极融入互联网思维，加快实施</span></span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">以汽车后服务</span>+互联网+集仓为主体，汽车文化为补充的战略转型</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">。史中对记者说：</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">“2015</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">年，我们就在思考汽车后市场的变革之路。当时我们已经感觉到传统汽配城会受到电商极大的冲击。</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">”</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">随后，他介绍了车配龙迎接时代变革的一些大动作。</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">“</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">除了挂牌新三板外，我们在</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">2014</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">年</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">9</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">月于四川遂宁拓展成立车配龙国际汽车百货广场，于</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">2015</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">年</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">12</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">月在上海七宝地区成立</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">’</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">车配龙生活欢乐港</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">’</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">，于</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">2016</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">年</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">6</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">月并购中华汽配网建立互联网事业部，于该年</span></span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\">8月又合资组建了车配龙聚配行一站式汽配销售服务平台</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">。</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">”</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">他告诉记者，目的只有一个，</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:Calibri\\\">即</span></span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">利用整合好车配龙强大的线下资源，插上互联网的翅膀打通融合线下线上力争成为汽配第一网</span></span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">。</span></span></p><p><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">&nbsp;</span></p><p style=\\\"text-indent:28px\\\"><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">&nbsp;</span></p><p style=\\\"text-indent:28px\\\"><strong><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">要做全车件销售　车配龙立定志向</span></span></strong></p><p style=\\\"text-indent:28px\\\"><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">2016</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">年</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">10</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">月，车配龙网上商城正式上线。</span></span></p><p style=\\\"text-indent:28px\\\"><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">尽管才过去短短几个月的时间，车配龙网上商城的营销模式受到华东地区甚至全国汽修厂的认可。据悉，目前车配龙网上商城月销售额超过</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">2000</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">万元，且呈正极增长。史中希望，该商城年销售额能够达到</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">3</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">亿元。他还让记者体验了一下同步上线车配龙</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">APP</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">的便利性。目前该</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">APP</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">揽括了</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">30</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">多个主流品牌大众配件。此外，车配龙正在筹划建立同质配件的示范点。</span></span></p><p style=\\\"text-indent:28px\\\"><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">车配龙网上商城立定志向要做全车件。史中对记者说：</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">“</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">燎申集团正在举集团之力重点打造。我们计划在</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">3</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">年内完成华东地区的市场布局，争取在</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">5</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">年的时间内打造成中国汽车后服务市场第一网。</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">”</span></p><p style=\\\"text-indent:28px\\\"><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">最为关键的是，这是一个最好的时代。未来</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">5</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">年内，我国汽车后市场新格局将会形成。</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">“</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">成功了，那将是万亿规模级的市场。</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">”</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">行业资深人士表示。</span></span></p><p><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">　　史中强调，车配龙找到了汽车后市场的痛点，也能够做到</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">“</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">对症下药</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">”</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">。他说：</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">“</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">目前汽车后市场尤其是汽修市场存在配件价格高、市场不透明、送货慢、配件质量没有保障等问题。</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">”</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">对此，车配龙</span></span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">集仓</span>+互联网模式</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">秉持</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">“</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">不售假、不暴利、不回扣</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">”</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">经营理念，实行形象统一，仓储统一，营销统一，配送统一，结算统一，服务统一的市场同步措施，建立质量问题先行赔付和</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">“</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">暴利投诉</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">”</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">管理机制，并引入第三方金融合作单位解决合作方资金瓶颈，立志打造汽车维修企业真心信任和依赖的汽车全车件一站式销售服务平台。他还表示，</span></span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">以车配龙聚配行平台为主体的上海市汽车维修协会配件工委会已经成立，这意味着上海市维修协会非常愿意与车配龙密切合作。目前我们已于上海</span>800多家维修协会会员单位签订合作协议，预计首批年采购量可达5亿元</span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:Calibri\\\">。</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">”</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">史中说道。</span></span></p><p style=\\\"text-indent:28px\\\"><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">“</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">我们希望在汽配行业打造一个真正的</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">“</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">奥特莱斯</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">”</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">，以点带面地净化环境。</span></span><span style=\\\"font-family: Calibri;letter-spacing: 0;font-size: 14px\\\">”</span><span style=\\\"font-family: 宋体;letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">史中也坦言道，再宏伟的蓝图，不仅需要企业脚踏实地步步推进，也需要一个培育和整合过程，更需要资本等各方的支持。</span></span></p><p style=\\\"text-indent:28px\\\"><span style=\\\"font-family: 宋体;color: rgb(255, 0, 0);letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">回首车配龙深耕于中国汽车后市场的历史，敢为人先，勇于拼搏，以超前的服务意识，为客户带来最优化的体验，是车配龙发展壮大和走向成功的坚定原则。</span></span></p><p style=\\\"text-indent:28px\\\"><span style=\\\"font-family: 宋体;color: rgb(255, 0, 0);letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">在中国汽车后市场的改革发展中，</span></span><span style=\\\"font-family: 宋体;color: rgb(254, 37, 0);letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">车配龙</span></span><span style=\\\"font-family: 宋体;color: rgb(253, 37, 0);letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">抓住市场机遇</span></span><span style=\\\"font-family: 宋体;color: rgb(255, 0, 0);letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">，</span></span><span style=\\\"font-family: 宋体;color: rgb(254, 40, 80);letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">适时</span></span><span style=\\\"font-family: 宋体;color: rgb(255, 0, 0);letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">推出车配龙互联网</span></span><span style=\\\"font-family: Calibri;color: rgb(255, 0, 0);letter-spacing: 0;font-size: 14px\\\">+</span><span style=\\\"font-family: 宋体;color: rgb(255, 0, 0);letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">集仓模式，正是车配龙不汲于既往的成就，不坐困愁城，誓做披荆斩棘的开拓者的担当。</span></span></p><p style=\\\"text-indent:28px\\\"><span style=\\\"font-family: 宋体;color: rgb(255, 0, 0);letter-spacing: 0;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">车配龙将以加倍的努力，在未来的发展道路上，以超前的危机意识，响应国家产业政策，引领行业风潮，在蕴藏无限商机的中国汽车后市场开辟出一片新天地，为中国汽车后市场的蓬勃发展贡献自己的力量。</span></span></p><p><br/></p>', 0, 1, 1, 0, '', 0, '', 0, 1497426232, 1497426232, 0, 1, 1);
INSERT INTO `news` VALUES (99, 1, 0, 0, '打造全新汽配供应链——“车配龙”强势崛起', '', '', '', '', '<p style=\\\"text-indent:0;text-align:center\\\"><br/></p><p style=\\\"text-indent:36px\\\"><span style=\\\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\\\"><span style=\\\"font-family: 宋体; font-size: 16px;\\\">车配龙是中国最早一批运营汽车后服务专业市场的公司，现有营业面积逾</span><span style=\\\"font-family: Calibri; font-size: 16px;\\\">10</span><span style=\\\"font-family: 宋体; font-size: 16px;\\\">万平方米，年交易额过百亿元，旨在立足上海，辐射全球，并于</span><span style=\\\"font-family: Calibri; font-size: 16px;\\\">2016</span><span style=\\\"font-family: 宋体; font-size: 16px;\\\">年</span><span style=\\\"font-family: Calibri; font-size: 16px;\\\">4</span><span style=\\\"font-family: 宋体; font-size: 16px;\\\">月</span><span style=\\\"font-family: Calibri; font-size: 16px;\\\">22</span><span style=\\\"font-family: 宋体; font-size: 16px;\\\">日成功登陆新三板，正式在全国中小企业股份转让系统挂牌公开转让（证券代码：</span><span style=\\\"font-family: Calibri; font-size: 16px;\\\">837183</span><span style=\\\"font-family: 宋体; font-size: 16px;\\\">），对接资本市场，开启全新的发展格局！</span><span style=\\\"font-family: Calibri; font-size: 16px;\\\">&nbsp;</span></span></p><p style=\\\"text-indent:0;text-align:center\\\"><img src=\\\"http://admin.chepeilong.com/uploads/resource/20170614/1497429532465993.png\\\" title=\\\"1497429532465993.png\\\"/><span style=\\\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\\\"><strong><span style=\\\"font-family: Calibri; font-size: 20px;\\\">&nbsp;</span></strong><strong><span style=\\\"font-family: Calibri; font-size: 20px;\\\"></span></strong></span></p><p style=\\\"text-indent:36px\\\"><span style=\\\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\\\"><span style=\\\"font-family: 宋体; font-size: 16px;\\\"><span style=\\\"font-family: 宋体;\\\">回首车配龙十余年的发展壮大历程便会发现，作为汽车独立售后市场重要流通环节的</span>“汽配经销实体”，长期以来的现状是规模小、不规范、太分散，这些痛点成为业内的诟病，并束缚着整个汽车售后市场的发展。尽管多年来，外资以各种模式进入中国汽车售后市场，如</span><span style=\\\"font-family: Calibri; font-size: 16px;\\\">NAPA</span><span style=\\\"font-family: 宋体; font-size: 16px;\\\"><span style=\\\"font-family: 宋体;\\\">的两进两出，花旗集团的大手笔资本运作，司库伯的努力坚守等，但这些</span>“巨头”们终因各种原因而退出中国市场。现实表明，靠“外力”无法“解救”中国汽车独立售后市场，人们又将希望寄托于中国本土市场能够尽早出现具规模、跨区域、规范经营的企业。而在这十多年的发展过程中，中国汽车独立售后市场的一颗新秀</span><span style=\\\"font-family: Calibri; font-size: 16px;\\\">——</span><span style=\\\"font-family: 宋体; font-size: 16px;\\\">“车配龙”，正在崛起！车配龙一直坚定信念，顺应时代发展和国家产业政策的调整，实施革新发展战略，</span><span style=\\\"font-family: Calibri; font-size: 16px;\\\">2016</span><span style=\\\"font-family: 宋体; font-size: 16px;\\\">年</span><span style=\\\"font-family: Calibri; font-size: 16px;\\\">9</span><span style=\\\"font-family: 宋体; font-size: 16px;\\\"><span style=\\\"font-family: 宋体;\\\">月份，车配龙</span>·聚配行这个“一站式汽车配件销售服务平台”正式成立，标志着汽配经销实体长期以来规模小、不规范、太分散的现状正在被打破，“</span><strong><span style=\\\"font-family: 宋体; font-size: 16px;\\\"><span style=\\\"font-family: 宋体;\\\">统一报价、统一仓储、统一物流、统一配送、统一服务、统一运营</span>”的新模式正式建立。</span></strong><strong><span style=\\\"font-family: 宋体; font-size: 16px;\\\"></span></strong></span></p><p style=\\\"text-indent:0;text-align:center\\\"><img src=\\\"http://admin.chepeilong.com/uploads/resource/20170614/1497429544498099.png\\\" title=\\\"1497429544498099.png\\\"/><span style=\\\"font-size: 16px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\\\">&nbsp;</span></p><p style=\\\"text-indent:0;text-align:center\\\"><span style=\\\"font-size: 16px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\\\">&nbsp;</span></p><p style=\\\"text-indent:36px\\\"><span style=\\\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\\\"><span style=\\\"font-family: 宋体; font-size: 16px;\\\">中国互联网的发展正以日新月异的速度冲击着每一个行业，而且不断改变着人们的消费方式，经常有一些媒体、同行甚至一些投资人在各种场合把汽车后市场的服务分成各种类型，并给企业贴上互联网、电商、连锁、传统等等标签，而真正重要的是，从事我们这个行业才知道汽车后市场有着其自身的特殊性、专业性，互联网与汽车后市场如何做到真正的结合，一直是我们车配龙在研究的课题，需要我们不断的更新自身的知识结构、产业布局，</span><strong><span style=\\\"font-family: 宋体; font-size: 16px;\\\">真正做大配件连锁与维修连锁系统之间的互通，提供快速简单的报价、仓储、物料、配送、服务、运营方式。</span></strong><strong><span style=\\\"font-family: 宋体; font-size: 16px;\\\"></span></strong></span></p><p style=\\\"text-indent: 36px; text-align: center;\\\"><img src=\\\"http://admin.chepeilong.com/uploads/resource/20170614/1497429557572099.jpg\\\" title=\\\"1497429557572099.jpg\\\"/><span style=\\\"font-size: 16px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\\\">&nbsp;</span></p><p style=\\\"text-indent:36px\\\"><span style=\\\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\\\"><span style=\\\"font-family: 宋体; font-size: 16px;\\\">历经多年的研究与积累，</span><span style=\\\"font-family: Calibri; font-size: 16px;\\\">&nbsp;2016</span><span style=\\\"font-family: 宋体; font-size: 16px;\\\">年</span><span style=\\\"font-family: Calibri; font-size: 16px;\\\">9</span><span style=\\\"font-family: 宋体; font-size: 16px;\\\"><span style=\\\"font-family: 宋体;\\\">月份在车配龙</span>·聚配行集仓项目启动的同时，车配龙</span><span style=\\\"font-family: Calibri; font-size: 16px;\\\">APP</span><span style=\\\"font-family: 宋体; font-size: 16px;\\\">、车配龙网上商城同步正式上线，正是一种超前的危机意识的和进取雄心的体现。车配龙</span><span style=\\\"font-family: Calibri; font-size: 16px;\\\">APP</span><span style=\\\"font-family: 宋体; font-size: 16px;\\\"><span style=\\\"font-family: 宋体;\\\">的上线极大的方便了客户的询价、报价、采购、物流、配送、服务、管理，打造了粘合度更高的新型顾客关系网络。一站式销售服务平台聚配行的建立和</span>“互联网</span><span style=\\\"font-family: Calibri; font-size: 16px;\\\">+</span><span style=\\\"font-family: 宋体; font-size: 16px;\\\">”的运用，对于汽车后市场的标杆意义不言而喻，这也将是车配龙未来持续发展的大方向，以及在汽车后市场发展中的主要推广模式。效率的提高、采购成本的降低是效益增长的前提，也是走品牌化可持续发展的必然趋势。“集仓</span><span style=\\\"font-family: Calibri; font-size: 16px;\\\">+</span><span style=\\\"font-family: 宋体; font-size: 16px;\\\"><span style=\\\"font-family: 宋体;\\\">互联网</span>”的模式将实现共享客户资源，深挖市场，不断拓展市场前沿，扩大市场占有率。</span></span></p><p style=\\\"text-indent:0;text-align:center\\\"><img src=\\\"http://admin.chepeilong.com/uploads/resource/20170614/1497429577888702.png\\\" title=\\\"1497429577888702.png\\\"/><span style=\\\"font-size: 16px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\\\">&nbsp;</span></p><p style=\\\"text-indent:16px;text-align:center\\\"><span style=\\\"font-size: 16px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\\\">&nbsp;</span></p><p style=\\\"text-indent:36px\\\"><span style=\\\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\\\"><span style=\\\"font-family: 宋体; font-size: 16px;\\\"><span style=\\\"font-family: 宋体;\\\">时不我待，时不我与，一个企业在市场激烈的竞争中如逆水行舟，不进则退，对于一个企业来说，固守本分，虽然可以稳扎稳打于一时，但是对于日新月异的市场和不断调整的商业模式来说，迟早将被淘汰。机会不仅仅是给有准备的人，也是给每一个勇敢抓住机会，拥有前瞻思维的人准备的。车配龙</span>·聚配行集仓项目的启动、车配龙</span><span style=\\\"font-family: Calibri; font-size: 16px;\\\">APP</span><span style=\\\"font-family: 宋体; font-size: 16px;\\\">、车配龙网上商城的正式上线，并不是车配龙发展的终点，只是车配龙未来发展一个新的起点。</span></span></p><p style=\\\"text-indent:36px\\\"><span style=\\\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\\\"><span style=\\\"font-family: 宋体; font-size: 16px;\\\"><span style=\\\"font-family: 宋体;\\\">在资本不断涌入的当下，这一日益增长而且蓬勃发展的行业充满了激烈的竞争，也体现在</span>“互联网</span><span style=\\\"font-family: Calibri; font-size: 16px;\\\">+</span><span style=\\\"font-family: 宋体; font-size: 16px;\\\">”的影响。相比传统经济时代，互联网深刻改变消费模式和影响人们消费观念的同时，也将一个企业呈现几何倍数的增长变得更加迅速，变得不可思议，这就是互联网加资本的力量。车配龙登陆新三板，助力我们打开资本市场的大门，在分享可喜成果的同时，我们也应理智的意识到，我们正处汽车后市场剧烈变革的前沿和风潮之中。抓住时代发展脉搏，脚踏实地，以实体企业的稳健，加上互联网的效率和速度，必定会让车配龙深耕十余年的汽车后市场之路走得更加风生水起，通天大道既宽且阔。</span></span></p><p style=\\\"text-indent:0;text-align:center\\\"><img src=\\\"http://admin.chepeilong.com/uploads/resource/20170614/1497429588511398.png\\\" title=\\\"1497429588511398.png\\\"/><span style=\\\"font-size: 16px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\\\">&nbsp;</span></p><p style=\\\"text-indent:0;text-align:center\\\"><span style=\\\"font-size: 16px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\\\">&nbsp;</span></p><p style=\\\"text-indent:36px\\\"><span style=\\\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\\\"><span style=\\\"font-family: 宋体; font-size: 16px;\\\">千帆竞争，百舸争流，拥有万亿元的中国汽车后市场，每天都在出现各种新的商业模式，新的企业层出不穷。只有不满足于现状，勇敢攀登高峰，锐意进取，不汲汲于小成就的自足，才能登上泰山的高顶，享受一览众山小的壮丽美景。中国汽车保有量的不断增长，连续多年来保持世界产销量第一的大趋势，决定了中国汽车后服务市场的不断壮大，这就需要一批品牌化战略企业满足市场需求、引导市场健康发展。</span><strong><span style=\\\"font-family: 宋体; font-size: 16px;\\\">“车配龙</span></strong><strong><span style=\\\"font-family: Calibri; font-size: 16px;\\\">+</span></strong><strong><span style=\\\"font-family: 宋体; font-size: 16px;\\\">互联网</span></strong><strong><span style=\\\"font-family: Calibri; font-size: 16px;\\\">+</span></strong><strong><span style=\\\"font-family: 宋体; font-size: 16px;\\\"><span style=\\\"font-family: 宋体;\\\">集仓</span>”的建立，使得我们抓住这一战略机遇，使得汽车后服务市场市值百亿的品牌化巨无霸型战略企业成为车配龙的未来。</span></strong><strong><span style=\\\"font-family: 宋体; font-size: 16px;\\\"></span></strong></span></p><p style=\\\"text-indent:0;text-align:center\\\"><img src=\\\"http://admin.chepeilong.com/uploads/resource/20170614/1497429598789934.png\\\" title=\\\"1497429598789934.png\\\"/><span style=\\\"font-size: 16px; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\\\">&nbsp;</span></p><p><br/></p>', 0, 1, 0, 1, '', 0, '', 0, 1497429607, 1497429607, 0, 1, 1);
INSERT INTO `news` VALUES (100, 1, 0, 0, '网上商城登陆公告', '', '', '', '', '<p style=\\\"text-indent:48px\\\"><span style=\\\"font-family: 微软雅黑; font-size: 16px;\\\">车配龙商城将于2017年<span style=\\\"font-family: Tahoma;\\\">6</span>月<span style=\\\"font-family: Tahoma;\\\">28</span>日全新登陆汽车后市场，车配龙商城包括商城平台和自营板块。</span></p><p style=\\\"text-indent:48px\\\"><span style=\\\"font-family: 微软雅黑; font-size: 16px;\\\">凡是于2017年<span style=\\\"font-size: 16px; font-family: Tahoma;\\\">7</span>月<span style=\\\"font-size: 16px; font-family: Tahoma;\\\">15</span>日之前在车配龙商城平台开店的商户，免费拍照，免费整理上传资料，免费指导开店！</span></p><p style=\\\"text-indent:48px\\\"><span style=\\\"font-family: 微软雅黑; font-size: 16px;\\\">免免免，优惠多多，方便多多，机会难得，过期不候！</span></p><p style=\\\"text-indent:48px\\\"><span style=\\\"font-family: 微软雅黑; font-size: 16px;\\\">车配龙商城将与您一起撬动万亿汽车后市场的无限商机，我们也将以立高望远的姿态，全力打造汽车后市场的“京东”！</span></p><p><br/></p>', 0, 1, 1, 0, '', 0, '', 0, 1497429744, 1497429744, 0, 1, 1);
INSERT INTO `news` VALUES (101, 1, 0, 0, '车配龙股份战略布局新闻发布会暨新三板挂牌一周年庆典隆重举行', '', '', '', '', '<p style=\\\"text-indent: 28px; text-align: center;\\\"><strong><img src=\\\"http://admin.chepeilong.com/uploads/resource/20170630/1498784604271605.png\\\" title=\\\"1498784604271605.png\\\"/></strong></p><p style=\\\"text-indent:28px\\\"><strong><span style=\\\";font-family:宋体;font-size:14px\\\">2017<span style=\\\"font-family:宋体\\\">年</span><span style=\\\"font-family:Calibri\\\">6</span><span style=\\\"font-family:宋体\\\">月</span><span style=\\\"font-family:Calibri\\\">28</span><span style=\\\"font-family:宋体\\\">日，车配龙股份（</span><span style=\\\"font-family:Calibri\\\">837183</span><span style=\\\"font-family:宋体\\\">）战略布局新闻发布会暨新三板挂牌一周年庆典在上海外滩</span><span style=\\\"font-family:Calibri\\\">SOHO</span><span style=\\\"font-family:宋体\\\">广场举行。来自</span></span><span style=\\\"font-family: 宋体;font-size: 14px;background: rgb(255, 255, 255)\\\"><span style=\\\"font-family:宋体\\\">政府有关领导、行业协会领导专家、各大券商律所、投资机构、新闻媒体、股东代表、车配龙股份董事长林先燎（</span></span></strong><span style=\\\"font-family: 宋体;font-size: 14px;background: rgb(255, 255, 255)\\\"><span style=\\\"font-family:宋体\\\">创始人）及高管团队相聚一堂，共同见证车配龙高速发展的历史性时刻。</span></span></p><p style=\\\"text-indent: 28px; text-align: center;\\\"><img src=\\\"http://admin.chepeilong.com/uploads/resource/20170630/1498784617787172.png\\\" title=\\\"1498784617787172.png\\\"/><span style=\\\";font-family:Calibri;font-size:14px\\\">&nbsp;</span></p><p style=\\\"text-indent:28px\\\"><span style=\\\";font-family:宋体;font-size:14px\\\"><span style=\\\"font-family:宋体\\\">董事长林先燎首先向所有来宾做了热情洋溢的欢迎词，表示车配龙股份扎根于汽车后服务市场十六载，已发展成为汽车后服务市场的标杆企业之一。</span>2016<span style=\\\"font-family:宋体\\\">年</span><span style=\\\"font-family:Calibri\\\">6</span><span style=\\\"font-family:宋体\\\">月，车配龙股份高管团队在全国股转系统敲响了新三板开市宝钟，并将新三板挂牌作为发展新起点。一年来，公司启动转型发展，内抓管理提升、对外投资并购，探索企业发展方向、规划公司战略目标。完成收购互联网企业</span></span><span style=\\\";font-family:Calibri;font-size:14px\\\">—</span><span style=\\\";font-family:宋体;font-size:14px\\\"><span style=\\\"font-family:宋体\\\">上海创宇信息技术发展有限公司（中华汽配网），实现了自主研发建设的汽配件网上商城</span>—车配龙<span style=\\\"font-family:Calibri\\\">APP</span><span style=\\\"font-family:宋体\\\">上线运营；投资设立上海车配龙聚配行贸易有限公司，建立一站式汽车配件销售服务平台。初步确立了“升级创新中的汽车后服务市场</span><span style=\\\"font-family:Calibri\\\">+</span><span style=\\\"font-family:宋体\\\">互联网</span><span style=\\\"font-family:Calibri\\\">+</span><span style=\\\"font-family:宋体\\\">一站式汽配销售平台”的崭新商业模式，树立了争创“汽车后服务第一股”和“汽车后服务第一网”的宏伟目标。</span></span></p><p><strong><span style=\\\"font-family: 宋体;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">车配龙融资路演</span></span></strong></p><p style=\\\"text-indent:28px\\\"><span style=\\\";font-family:宋体;font-size:14px\\\"><span style=\\\"font-family:宋体\\\">车配龙常务副总经理陈屹先生从行业发展趋势、公司商业模式、发展规划、投资亮点和项目融资需求等角度向在座来宾做了全方位的详细介绍和汇报，吸引了各参会人员的关注和认同。长江证券、东开投资和海航物流集团分别上台进行发言点评，对公司的商业模式和发展前景表示高度赞同并表示出强烈的投资合作愿望。</span></span></p><p><strong><span style=\\\"font-family: 宋体;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">车配龙与海航投资签约</span></span></strong></p><p style=\\\"text-indent:28px\\\"><span style=\\\";font-family:宋体;font-size:14px\\\"><span style=\\\"font-family:宋体\\\">经过多次深入洽谈达成的意向，在本次发布会上车配龙董事长林先燎先生与海航物流集团汽车事业集群总裁黄高志先生分别代表双方签署了《战略合作协议》。海航物流集团表示，汽车后服务市场是近年来的投资风口，跟随资本嗅觉，海航一直在寻找有潜力、有实力的汽车后服务</span>+<span style=\\\"font-family:宋体\\\">互联网企业，我们惊喜的发现车配龙不但拥有上千家汽配件实体经销商的雄厚资源及十多年积淀的行业管理经验，而且具备互联网</span><span style=\\\"font-family:Calibri\\\">+</span><span style=\\\"font-family:宋体\\\">的创新思维。正是看到车配龙具备深厚的行业实力与未来发展的巨大潜力，在汽车后市场</span><span style=\\\"font-family:Calibri\\\">+</span><span style=\\\"font-family:宋体\\\">互联网的创业大军中我们选择与车配龙携手合作，共同撬动汽车后服务市场的万亿蓝海。</span></span></p><p style=\\\"text-align: center;\\\"><img src=\\\"http://admin.chepeilong.com/uploads/resource/20170630/1498785226974478.png\\\" title=\\\"1498785226974478.png\\\" alt=\\\"合并1.png\\\"/></p><p><strong><span style=\\\"font-family: 宋体;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">战略发布：打造</span>“中国汽车后服务市场第一股”、“中国汽车后服务市场第一网”</span></strong></p><p style=\\\"text-indent:28px\\\"><span style=\\\";font-family:宋体;font-size:14px\\\"><span style=\\\"font-family:宋体\\\">车配龙董事、总经理史中先生以富有感染力的演讲发布了车配龙战略布局，车配龙以</span>“升级创新中的汽车后服务市场<span style=\\\"font-family:Calibri\\\">+</span><span style=\\\"font-family:宋体\\\">互联网</span><span style=\\\"font-family:Calibri\\\">+</span><span style=\\\"font-family:宋体\\\">一站式汽配销售平台”为商业模式，大力发展车配龙网上商城，通过线上引领线下，通过</span><span style=\\\"font-family:Calibri\\\">O2O</span><span style=\\\"font-family:宋体\\\">模式构筑一个汇聚汽配件生产厂家、经销商、维修企业及终端客户于一体的超级交易平台，打造具有“车配龙”自主品牌的同质汽配件，采用线下共管仓库和线上网络平台，并通过“总仓—干线物流—分仓—落地配送”的模式，汽配件销售平台辐射全国。同时向大家具体阐述了公司的</span><span style=\\\"font-family:Calibri\\\">5</span><span style=\\\"font-family:宋体\\\">年战略规划和企业战略目标及愿景，令人心潮澎湃、踌躇满志。</span></span></p><p style=\\\"text-indent: 28px; text-align: center;\\\"><img src=\\\"http://admin.chepeilong.com/uploads/resource/20170630/1498784656625659.png\\\" title=\\\"1498784656625659.png\\\"/></p><p><strong><span style=\\\"font-family: 宋体;font-size: 14px\\\"><span style=\\\"font-family:宋体\\\">车配龙网（</span>www.chepeilong.com<span style=\\\"font-family:宋体\\\">）上线仪式</span></span></strong></p><p style=\\\"text-indent:28px\\\"><span style=\\\";font-family:宋体;font-size:14px\\\"><span style=\\\"font-family:宋体\\\">随着车配龙董事、总经理史中先生郑重按下启动键，历时一年研发和建设的车配龙网于今天正式开通上线。中华汽配网创始人、车配龙互联网中心总监王宇星先生演示了车配龙网上商城网页及车配龙</span>APP<span style=\\\"font-family:宋体\\\">的操作。车配龙网上商城的上线开创了汽车配件</span><span style=\\\"font-family:Calibri\\\">O2O</span><span style=\\\"font-family:宋体\\\">时代，依托强大的汽车配件数据系统支撑，辅以配件集仓，通过现代化的仓储管理体系实现快速调配，让普通消费者能够根据车型及配件型号便捷的找到相应配件并进行比价购买。这一平台的建立解决了汽车后市场车型信息匹配滞后与不对称这一困扰汽车后市场发展的瓶颈问题。可以预见，“买汽配上车配龙网”不久将成为现实。</span></span></p><p style=\\\"text-align: center;\\\"><img src=\\\"http://admin.chepeilong.com/uploads/resource/20170630/1498785249767108.png\\\" title=\\\"1498785249767108.png\\\" alt=\\\"合并2.png\\\"/></p><p><strong><span style=\\\"font-family: 宋体;font-size: 14px\\\">&nbsp;“车配龙集团”揭牌仪式</span></strong></p><p style=\\\"text-indent:28px\\\"><span style=\\\";font-family:宋体;font-size:14px\\\"><span style=\\\"font-family:宋体\\\">中国汽车维修行业协会配件工作委员会主任王逢铃先生和闵行区委统战部副部长、区工商联党组书记孙耀辉先生对本次活动予以祝贺，对车配龙新三板挂牌一年的工作给予充分肯定，并提出了进一步的殷切期望。在车配龙董事长、总经理的陪同下，共同举杯为公司更名为</span>“上海车配龙实业（集团）股份有限公司”进行揭牌，把整个活动推向了高潮。车配龙集团的成立标志着车配龙朝“汽车后服务第一股”和“汽车后服务第一网”的宏伟目标又迈进一步，是车配龙创新发展的再亮剑，在传统汽车后市场时代，车配龙走在了前列，在未来汽车后市场的互联网<span style=\\\"font-family:Calibri\\\">+</span><span style=\\\"font-family:宋体\\\">风潮里，车配龙将继续秉承“引领市场、创新经营、和商共赢、拓展空间”的经营理念，以汽车后市场服务首席运营商的担当，以车配龙新商业模式为载体，把握汽车后服务市场万亿商机，成为国内具有竞争力和影响力的汽车后服务行业巨擎。</span></span></p><p style=\\\"text-align: center;\\\"><img src=\\\"http://admin.chepeilong.com/uploads/resource/20170630/1498784685629038.png\\\" title=\\\"1498784685629038.png\\\"/></p><p style=\\\"text-align: center;\\\"><img src=\\\"http://admin.chepeilong.com/uploads/resource/20170630/1498784695269399.png\\\" title=\\\"1498784695269399.png\\\"/></p><p style=\\\"text-align: center;\\\"><img src=\\\"http://admin.chepeilong.com/uploads/resource/20170630/1498784705821208.png\\\" title=\\\"1498784705821208.png\\\"/></p><p><br/></p>', 0, 1, 0, 0, '', 0, '', 0, 1498784841, 1498784841, 1517817300, 1, 1);
INSERT INTO `news` VALUES (102, 1, 0, 0, '上海车配龙国际汽车售后服务市场经营管理股份有限公司关于公司名称变更的公告', '', '', '', '0', '<p style=\\\"margin-left:409px;text-align:right\\\"><strong><span style=\\\"font-family: 宋体;font-size: 16px\\\">公告编号：</span></strong><strong><span style=\\\"font-family: 仿宋;font-size: 16px\\\">2017-039</span></strong></p><p style=\\\"line-height:20px\\\"><span style=\\\";font-family:&#39;Times New Roman&#39;;font-size:16px\\\">&nbsp;</span></p><p style=\\\"text-align:center\\\"><strong><span style=\\\"font-family: 宋体;font-size: 16px\\\">证券代码：</span></strong><strong><span style=\\\"font-family: 仿宋;font-size: 16px\\\">837183</span></strong> <strong><span style=\\\"font-family: 宋体;font-size: 16px\\\">证券简称：车配龙</span></strong> <strong><span style=\\\"font-family: 宋体;font-size: 15px\\\"><span style=\\\"font-family:宋体\\\">主办券商：长江证券</span></span></strong></p><p style=\\\"white-space: normal; text-align: center;\\\"><strong><span style=\\\"font-family: 宋体; font-size: 24px;\\\">上海车配龙国际汽车售后服务</span></strong></p><p style=\\\"white-space: normal; text-align: center;\\\"><strong><span style=\\\"font-family: 宋体; font-size: 24px;\\\">市场经营管理股份有限公司</span></strong></p><p style=\\\"white-space: normal; text-align: center;\\\"><strong><span style=\\\"font-family: 宋体; font-size: 24px;\\\">关于公司名称变更的公告</span></strong></p><p style=\\\"white-space: normal; text-align: center;\\\"><strong><span style=\\\"font-family: 宋体; font-size: 24px;\\\"><img src=\\\"http://admin.chepeilong.com/uploads/resource/20170918/1505712888860896.png\\\" title=\\\"1505712888860896.png\\\" alt=\\\"声明.png\\\"/></span></strong></p><p style=\\\"white-space: normal;\\\"><strong><span style=\\\"font-family: 宋体; font-size: 19px;\\\"><br/></span></strong></p><p style=\\\"white-space: normal;\\\"><strong><span style=\\\"font-family: 宋体; font-size: 19px;\\\">一、基本情况</span></strong><br/></p><p style=\\\"white-space: normal; text-indent: 37px; line-height: 30.72px;\\\"><span style=\\\"font-family: 宋体; font-size: 18px;\\\">上海车配龙国际汽车售后服务市场经营管理股份有限公司（以下</span><span style=\\\"text-align: justify; font-family: 宋体; font-size: 19px;\\\">简称“</span><span style=\\\"text-align: justify; font-family: 宋体; font-size: 19px;\\\">公司”</span><span style=\\\"text-align: justify; font-family: 宋体; font-size: 19px;\\\">）于 2017</span><span style=\\\"text-align: justify; font-family: 宋体; font-size: 19px;\\\">&nbsp;年 7</span><span style=\\\"text-align: justify; font-family: 宋体; font-size: 19px;\\\">&nbsp;月 10</span><span style=\\\"text-align: justify; font-family: 宋体; font-size: 19px;\\\">&nbsp;日在公司会议室召开了 2017</span><span style=\\\"text-align: justify; font-family: 宋体; font-size: 19px;\\\">&nbsp;年第四次临时股东大会，会议审议通过了《关于变更公司名称的议案》、《关于变更公司经营范围的议案》、《关于修改公司章程的议案》，详见公司于<span style=\\\"font-family: 仿宋; font-size: 19px; text-align: justify; text-indent: 37px;\\\">&nbsp;</span></span><span style=\\\"text-align: justify; font-family: 仿宋; font-size: 19px;\\\">2017<span style=\\\"font-family: 仿宋; font-size: 19px; text-align: justify; text-indent: 37px;\\\">&nbsp;</span></span><span style=\\\"text-align: justify; font-family: 宋体; font-size: 19px;\\\">年<span style=\\\"font-family: 仿宋; font-size: 19px; text-align: justify; text-indent: 37px;\\\">&nbsp;</span></span><span style=\\\"text-align: justify; font-family: 仿宋; font-size: 19px;\\\">7&nbsp;</span><span style=\\\"text-align: justify; font-family: 宋体; font-size: 19px;\\\">月<span style=\\\"font-family: 仿宋; font-size: 19px; text-align: justify; text-indent: 37px;\\\">&nbsp;</span></span><span style=\\\"text-align: justify; font-family: 仿宋; font-size: 19px;\\\">11</span><span style=\\\"text-align: justify; font-family: 宋体; font-size: 19px;\\\"><span style=\\\"font-family: 仿宋; font-size: 19px; text-align: justify; text-indent: 37px;\\\">&nbsp;</span>日在全国中小企业股份转让系统指定的信息披露平台</span><span style=\\\"text-align: justify; font-family: 仿宋; font-size: 19px;\\\">(http://www.neeq.com.cn )</span><span style=\\\"text-align: justify; font-family: 宋体; font-size: 19px;\\\">披露的《上海车配龙国际汽车售后服务市场经营管理股份有限公司<span style=\\\"font-size: 19px; text-align: justify; text-indent: 37px; font-family: 仿宋;\\\">&nbsp;</span><span style=\\\"font-family: 宋体; font-size: 19px; text-align: justify; text-indent: 37px;\\\"></span></span><span style=\\\"text-align: justify; font-family: 仿宋; font-size: 19px;\\\">2017<span style=\\\"font-size: 19px; text-align: justify; text-indent: 37px; font-family: 仿宋;\\\">&nbsp;</span><span style=\\\"font-family: 宋体; font-size: 19px; text-align: justify; text-indent: 37px;\\\"></span></span><span style=\\\"text-align: justify; font-family: 宋体; font-size: 19px;\\\">年第四次临时股东大会决议公告》（公告编号：</span><span style=\\\"text-align: justify; font-family: 仿宋; font-size: 19px;\\\">2017-037</span><span style=\\\"text-align: justify; font-family: 宋体; font-size: 19px;\\\">）。</span></p><p style=\\\"white-space: normal; line-height: 4px;\\\"><span style=\\\"font-family: &quot;Times New Roman&quot;;\\\">&nbsp;</span></p><p style=\\\"white-space: normal; text-indent: 37px; line-height: 30.72px;\\\"><span style=\\\"font-family: 宋体; font-size: 18px;\\\">公司已于近日完成了公司名称变更、经营范围变更及章程修正案的工商备案手续，并取得了上海市工商行政管理局换发的新营业执照。</span></p><p style=\\\"white-space: normal; line-height: 4px;\\\"><span style=\\\"font-family: &quot;Times New Roman&quot;;\\\">&nbsp;</span></p><p style=\\\"margin-right: 17px; white-space: normal; text-indent: 37px; text-align: justify; line-height: 29.12px;\\\"><span style=\\\"font-family: 宋体; font-size: 18px;\\\">公司已向全国中小企业股份转让系统有限责任公司履行完名称变更的备案手续，自<span style=\\\"font-size: 19px; text-align: justify; text-indent: 37px; font-family: 仿宋;\\\">&nbsp;</span><span style=\\\"font-family: 宋体; font-size: 19px; text-align: justify; text-indent: 37px;\\\"></span></span><span style=\\\"font-family: 仿宋; font-size: 18px;\\\">2017</span><span style=\\\"font-family: 宋体; font-size: 18px;\\\"><span style=\\\"font-size: 19px; text-align: justify; text-indent: 37px; font-family: 仿宋;\\\">&nbsp;</span><span style=\\\"font-family: 宋体; font-size: 19px; text-align: justify; text-indent: 37px;\\\"></span>年<span style=\\\"font-size: 19px; text-align: justify; text-indent: 37px; font-family: 仿宋;\\\">&nbsp;</span><span style=\\\"font-family: 宋体; font-size: 19px; text-align: justify; text-indent: 37px;\\\"></span></span><span style=\\\"font-family: 仿宋; font-size: 18px;\\\">8</span><span style=\\\"font-family: 宋体; font-size: 18px;\\\"><span style=\\\"font-size: 19px; text-align: justify; text-indent: 37px; font-family: 仿宋;\\\">&nbsp;</span><span style=\\\"font-family: 宋体; font-size: 19px; text-align: justify; text-indent: 37px;\\\"></span>月<span style=\\\"font-size: 19px; text-align: justify; text-indent: 37px; font-family: 仿宋;\\\">&nbsp;</span><span style=\\\"font-family: 宋体; font-size: 19px; text-align: justify; text-indent: 37px;\\\"></span></span><span style=\\\"font-family: 仿宋; font-size: 18px;\\\">2</span><span style=\\\"font-family: 宋体; font-size: 18px;\\\"><span style=\\\"font-size: 19px; text-align: justify; text-indent: 37px; font-family: 仿宋;\\\">&nbsp;</span><span style=\\\"font-family: 宋体; font-size: 19px; text-align: justify; text-indent: 37px;\\\"></span>日起，公司正式在全国中小企业股份转让系统进行名称变更。公司中文名称由</span><span style=\\\"font-family: Arial; font-size: 18px;\\\">“</span><span style=\\\"font-family: 宋体; font-size: 18px;\\\">上海车配龙国际汽车</span><span style=\\\"font-family: 宋体; font-size: 19px;\\\">售后服务市场经营管理股份有限公司</span><span style=\\\"font-family: Arial; font-size: 19px;\\\">”</span><span style=\\\"font-family: 宋体; font-size: 19px;\\\">变更为</span><span style=\\\"font-family: Arial; font-size: 19px;\\\">“</span><span style=\\\"font-family: 宋体; font-size: 19px;\\\">上海车配龙实业（集</span><span style=\\\"font-family: 宋体; font-size: 19px;\\\">团） 股 份 有 限 公 司&nbsp;</span><span style=\\\"font-family: Arial; font-size: 19px;\\\">”</span><span style=\\\"font-family: 宋体; font-size: 19px;\\\">， 英 文 名 称 由“</span><span style=\\\"font-family: 仿宋; font-size: 19px;\\\">Shanghai</span>&nbsp;<span style=\\\"font-family: 仿宋; font-size: 19px;\\\">Chepeilong&nbsp;</span><span style=\\\"font-family: 仿宋; font-size: 18px;\\\">International Automobile After-sales Service Market Operating&nbsp;</span><span style=\\\"font-family: 仿宋; font-size: 19px;\\\">and Management LTD<span style=\\\"font-family: 宋体; font-size: 19px; text-align: justify; text-indent: 37px;\\\">”</span></span><span style=\\\"font-family: 宋体; font-size: 19px;\\\">变更为<span style=\\\"font-family: 宋体; font-size: 19px; text-align: justify; text-indent: 37px;\\\">“</span></span><span style=\\\"font-family: 仿宋; font-size: 19px;\\\">Shanghai Chepeilong Industrial&nbsp;</span><span style=\\\"font-family: 仿宋; font-size: 19px;\\\">(Group) Co.,Ltd</span><span style=\\\"font-family: Arial; font-size: 19px;\\\"><span style=\\\"font-family: 宋体; font-size: 19px; text-align: justify; text-indent: 37px;\\\">”</span></span><span style=\\\"font-family: 宋体; font-size: 19px;\\\">，证券简称及证券代码保持不变。</span></p><p style=\\\"white-space: normal; line-height: 20px;\\\"><span style=\\\"font-family: &quot;Times New Roman&quot;;\\\">&nbsp;</span></p><p style=\\\"white-space: normal; line-height: 20px;\\\"><strong><span style=\\\"font-family: 宋体; font-size: 19px;\\\">二、备查文件</span></strong></p><p style=\\\"margin-right: 389px; margin-left: 37px; white-space: normal; line-height: 28.96px;\\\"><span style=\\\"font-family: 宋体; font-size: 19px;\\\">（一）《营业执照》特此公告。</span></p><p style=\\\"margin-right: 389px; margin-left: 37px; white-space: normal; line-height: 28.96px;\\\"><span style=\\\"font-family: 宋体; font-size: 19px;\\\"><br/></span></p><p style=\\\"margin-left: 501px; white-space: normal; line-height: 30.72px; text-align: right;\\\"><span style=\\\"font-family: 宋体; font-size: 18px;\\\"><br/></span></p><p style=\\\"margin-left: 501px; white-space: normal; line-height: 30.72px; text-align: right;\\\"><span style=\\\"font-family: 宋体; font-size: 18px;\\\">上海车配龙国际汽车售后服务市场经营管理股份有限公司董事会</span></p><p style=\\\"white-space: normal; line-height: 1px;\\\"><span style=\\\"font-family: &quot;Times New Roman&quot;;\\\">&nbsp;</span></p><p style=\\\"white-space: normal; text-align: right;\\\"><span style=\\\"font-family: 仿宋; font-size: 19px;\\\">2017&nbsp;</span><span style=\\\"font-family: 宋体; font-size: 19px;\\\">年</span><span style=\\\"font-family: 仿宋; font-size: 19px;\\\">&nbsp;8&nbsp;</span><span style=\\\"font-family: 宋体; font-size: 19px;\\\">月</span><span style=\\\"font-family: 仿宋; font-size: 19px;\\\">&nbsp;1&nbsp;</span><span style=\\\"font-family: 宋体; font-size: 19px;\\\">日</span></p><p style=\\\"white-space: normal;\\\"><strong><span style=\\\"font-family: 宋体; font-size: 24px;\\\"><br/></span></strong><br/></p><p><br/></p>', 9, 1, 1, 1, '', 0, '', 0, 1505712956, 1505712956, 1519794780, 1, 1);
INSERT INTO `news` VALUES (109, 38, 0, 1, '2222', '', 'http://admin.kxschool.com/uploads/thumb/thumb_1534302703.png', '', '', '<p>0恩恩额热无若</p>', 0, 2, 0, 0, '', 0, '', 0, 1534299375, 1534303028, 0, 1, 1);
INSERT INTO `news` VALUES (110, 43, 0, 1, '研究人员利用VR技术帮助教师更好了解自闭症学生', '', 'http://admin.kxschool.com/uploads/thumb/thumb_1534900364.png', '', '据外媒报道，研究人员正在利用VR技术帮助教师们了解自闭症学生进而能够真正地去帮助他们。近日，来自马耳他大学的一个研究小组决定通过VR技术帮助教师理解自闭症儿童的生活体验。通过利用自闭症儿童的音频和视觉技巧，研究团队开发出一个VR应用，它能模拟出自闭症儿童在教室里的体验情况。', '<p>据外媒报道，研究人员正在利用VR技术帮助教师们了解自闭症学生进而能够真正地去帮助他们。近日，来自马耳他大学的一个研究小组决定通过VR技术帮助教师理解自闭症儿童的生活体验。通过利用自闭症儿童的音频和视觉技巧，研究团队开发出一个VR应用，它能模拟出自闭症儿童在教室里的体验情况。<img src=\"https://admin.rongyiban.net/uploads/resource/20180822/1534900478595831.png\" title=\"1534900478595831.png\" alt=\"44.png\"/></p>', 1, 1, 1, 1, '', 0, '', 442, 1534299672, 1694144038, 1694144038, 0, 1);
INSERT INTO `news` VALUES (111, 43, 0, 1, '容易办公司注册', '', 'http://admin.kxschool.com/uploads/thumb/thumb_1534731662.png', '1321,23213213,213213213q', '是对方答复', '', 0, 1, 0, 0, '', 0, '', 0, 1534731682, 0, 1534731682, 1, 1);
INSERT INTO `news` VALUES (112, 43, 0, 1, '容易办公司注册开通新地区', '', 'http://admin.kxschool.com/uploads/thumb/thumb_1534731876.png', '1321,23213213,213213213q', '容易办公司注册开通新地区', '<p>容易办公司注册开通新地区<img src=\"https://admin.rongyiban.net/uploads/resource/20180820/1534731858175521.png\" title=\"1534731858175521.png\" alt=\"5ad44128db3ed0.png\"/></p>', 0, 1, 1, 1, '', 0, '', 0, 1534731891, 0, 1534731891, 1, 1);
INSERT INTO `news` VALUES (113, 43, 0, 1, '2222', '', '', '', '', '<p>这里写你的初始化内容</p>', 0, 1, 1, 1, '', 0, '', 0, 1534734272, 1534734801, 1534734801, 1, 1);
INSERT INTO `news` VALUES (114, 43, 0, 1, '2222', '', '', '', '', '<p>这里写你的初始化内容</p>', 0, 1, 0, 0, '', 0, '', 0, 1534734323, 1534734755, 1534734755, 1, 1);
INSERT INTO `news` VALUES (115, 43, 0, 1, '容易办公司注册', '', 'http://admin.kxschool.com/uploads/thumb/thumb_1534920811.png', '', '', '<p>这里写你的初始化内容大萨达撒多</p>', 0, 1, 1, 1, '', 0, '', 1000, 1534920846, 0, 1534920846, 0, 1);

-- ----------------------------
-- Table structure for news_category
-- ----------------------------
DROP TABLE IF EXISTS `news_category`;
CREATE TABLE `news_category`  (
  `catid` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1：栏目\r\n2：列表\r\n3：链接',
  `parentid` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `catname` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ismenu` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1显示 0不显示',
  `keywords` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `listorder` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `disabled` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1可用 0禁用',
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '链接',
  PRIMARY KEY (`catid`) USING BTREE,
  INDEX `module`(`parentid`, `listorder`, `catid`) USING BTREE,
  INDEX `siteid`(`type`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 44 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '栏目表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of news_category
-- ----------------------------
INSERT INTO `news_category` VALUES (1, 1, 0, '首页公告', 0, '111,222,111,223', '我的撒多', 0, 1, '');
INSERT INTO `news_category` VALUES (34, 1, 1, 'sadsd', 1, 'adsa,adsad,asdas', 'dasdasgsadsdag', 0, 0, '');
INSERT INTO `news_category` VALUES (35, 1, 34, 'asdsd', 0, 'adsa,adsad,asdas', 'dasdasgsadsdag', 0, 0, '');
INSERT INTO `news_category` VALUES (36, 1, 36, 'adsad1', 1, '阿萨德撒多,萨达萨达', '段的撒多撒多', 0, 0, '');
INSERT INTO `news_category` VALUES (37, 1, 34, 'das', 1, '阿萨德撒多,萨达萨达', '段的撒多撒多', 0, 0, '');
INSERT INTO `news_category` VALUES (38, 1, 34, '萨达萨达', 1, '阿萨德撒多,萨达萨达', '段的撒多撒多', 0, 0, '');
INSERT INTO `news_category` VALUES (39, 1, 34, '阿萨德撒', 1, '萨达', '按时段', 0, 0, '');
INSERT INTO `news_category` VALUES (40, 1, 0, '阿萨德撒', 1, '萨达', '按时段', 0, 0, '');
INSERT INTO `news_category` VALUES (41, 1, 40, '阿萨德撒', 1, '萨达', '按时段', 0, 0, '');
INSERT INTO `news_category` VALUES (42, 1, 41, '阿萨德撒', 1, '萨达', '按时段', 0, 0, '');
INSERT INTO `news_category` VALUES (43, 2, 40, '大萨达撒', 1, '阿萨德', '萨达萨达', 0, 1, '');

-- ----------------------------
-- Table structure for region
-- ----------------------------
DROP TABLE IF EXISTS `region`;
CREATE TABLE `region`  (
  `region_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `region_name` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `region_type` tinyint(1) NOT NULL DEFAULT 2,
  `agency_id` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `hf_address_id` varchar(6) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '汇付天下地址id',
  `desc` int(10) NOT NULL DEFAULT 0 COMMENT '排序',
  PRIMARY KEY (`region_id`) USING BTREE,
  INDEX `parent_id`(`parent_id`) USING BTREE,
  INDEX `region_type`(`region_type`) USING BTREE,
  INDEX `agency_id`(`agency_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4049 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '邮政地址管理表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of region
-- ----------------------------
INSERT INTO `region` VALUES (1, 0, '全国', 0, 0, '', 0);
INSERT INTO `region` VALUES (10, 1, '上海', 1, 0, '0031', 0);
INSERT INTO `region` VALUES (109, 10, '上海市', 2, 0, '3100', 0);
INSERT INTO `region` VALUES (1215, 109, '黄浦区', 3, 0, '', 1);
INSERT INTO `region` VALUES (1217, 109, '徐汇区', 3, 0, '', 2);
INSERT INTO `region` VALUES (1218, 109, '长宁区', 3, 0, '', 3);
INSERT INTO `region` VALUES (1219, 109, '静安区', 3, 0, '', 4);
INSERT INTO `region` VALUES (1220, 109, '普陀区', 3, 0, '', 5);
INSERT INTO `region` VALUES (1222, 109, '虹口区', 3, 0, '', 6);
INSERT INTO `region` VALUES (1223, 109, '杨浦区', 3, 0, '', 7);
INSERT INTO `region` VALUES (1224, 109, '闵行区', 3, 0, '', 8);
INSERT INTO `region` VALUES (1225, 109, '宝山区', 3, 0, '', 9);
INSERT INTO `region` VALUES (1226, 109, '嘉定区', 3, 0, '', 10);
INSERT INTO `region` VALUES (1227, 109, '浦东新区', 3, 0, '', 11);
INSERT INTO `region` VALUES (1228, 109, '金山区', 3, 0, '', 11);
INSERT INTO `region` VALUES (1229, 109, '松江区', 3, 0, '', 12);
INSERT INTO `region` VALUES (1230, 109, '青浦区', 3, 0, '', 13);
INSERT INTO `region` VALUES (1232, 109, '奉贤区', 3, 0, '', 14);
INSERT INTO `region` VALUES (1234, 109, '崇明区', 3, 0, '', 15);
INSERT INTO `region` VALUES (1235, 109, '自贸区', 3, 0, '', 16);

-- ----------------------------
-- Table structure for seller_certificate
-- ----------------------------
DROP TABLE IF EXISTS `seller_certificate`;
CREATE TABLE `seller_certificate`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `userid` int(11) NOT NULL COMMENT '咨询师id',
  `number` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '证书编号/专业',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '证书标题/学历',
  `get_time` int(11) NOT NULL COMMENT '证书获得时间',
  `institution` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '培训机构/大学',
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '证书照片',
  `add_time` int(255) NOT NULL COMMENT '证书添加时间',
  `authority` tinyint(4) NOT NULL COMMENT '0:未认证;1已认证 2拒绝通过',
  `type` tinyint(1) NOT NULL COMMENT '0 证书 1最高学历',
  `refuse_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '拒绝通过的理由',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 27 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '商铺审核证书表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of seller_certificate
-- ----------------------------

-- ----------------------------
-- Table structure for seller_image
-- ----------------------------
DROP TABLE IF EXISTS `seller_image`;
CREATE TABLE `seller_image`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `userid` int(11) NOT NULL COMMENT '用户id',
  `type` tinyint(1) NOT NULL COMMENT '照片类型 0:身份证认证照片 1:形象照片',
  `filename` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '上传文件名',
  `time` int(11) NOT NULL COMMENT '文件生成时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 53 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '商铺图册表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of seller_image
-- ----------------------------
INSERT INTO `seller_image` VALUES (32, 24, 1, '6990d3dea1bde20a5be38618d9f190d5.jpg', 1467966347);
INSERT INTO `seller_image` VALUES (30, 3, 1, '29d9f046014a70b07666df144afb7f20.jpeg', 1467962901);
INSERT INTO `seller_image` VALUES (31, 3, 1, 'e97d621fd16a698eb24189fb67d2052c.jpeg', 1467962917);
INSERT INTO `seller_image` VALUES (28, 11, 1, 'e34d9e2ccde84b21924e65dfd97b09db.jpg', 1467342153);
INSERT INTO `seller_image` VALUES (29, 16, 1, 'e1aa19cebf11c75c7c70cdaca8090466.png', 1467359908);
INSERT INTO `seller_image` VALUES (33, 24, 1, '94278c6ac8374a6034f894ced34fb695.jpg', 1467966351);
INSERT INTO `seller_image` VALUES (34, 24, 1, '322030da1e46916b6666257c5e6fd99d.jpg', 1467966354);
INSERT INTO `seller_image` VALUES (35, 24, 1, 'e3f4a1399138c81e051a8139438c5f7c.jpg', 1467966357);
INSERT INTO `seller_image` VALUES (40, 3, 1, '4f311314cae10c2983c5c6fdd2ec1cde.jpg', 1467967663);
INSERT INTO `seller_image` VALUES (39, 3, 1, '1556d1935ae041561c1a9c1e0bc2061a.jpg', 1467967644);
INSERT INTO `seller_image` VALUES (41, 26, 1, '7774589019c42d1ace5f86a455b89e84.jpg', 1468289031);
INSERT INTO `seller_image` VALUES (49, 11, 1, 'a416416248d9f7ef0b46851cbae32e97.png', 1495854953);
INSERT INTO `seller_image` VALUES (44, 11, 1, 'f9c2aaedd1af8d699631944a79c0e13a.JPG', 1488244933);
INSERT INTO `seller_image` VALUES (48, 33, 1, '374b8f318546e90afa70418e602fc92e.png', 1495853187);
INSERT INTO `seller_image` VALUES (47, 42, 1, 'ff43219022c07ecf954ca067db6f0f8a.png', 1495852989);
INSERT INTO `seller_image` VALUES (50, 38, 1, '2abb632438a01cf4e1883c2a5197847c.png', 1496743239);
INSERT INTO `seller_image` VALUES (52, 131, 1, 'b61e6c091399d26a4046f4b99ea8b8fd.jpg', 1500732591);

-- ----------------------------
-- Table structure for seller_profile
-- ----------------------------
DROP TABLE IF EXISTS `seller_profile`;
CREATE TABLE `seller_profile`  (
  `userid` int(11) UNSIGNED NOT NULL COMMENT '咨询师id',
  `starid` smallint(3) NOT NULL DEFAULT 0 COMMENT '星级',
  `experience` int(11) NOT NULL COMMENT '经验',
  `idno` char(18) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '身份证号码',
  `authority` tinyint(1) NOT NULL DEFAULT 2 COMMENT '0:未认证；1认证失败; 2已认证',
  `introduction` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '个性介绍',
  `sign` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '个性签名',
  `skill` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '擅长技能',
  `speciality` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '擅长领域',
  `hobby` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '爱好',
  `add_time` int(11) NOT NULL COMMENT '申请认证时间',
  `is_hot` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1热门咨询师',
  `reg_step` tinyint(1) NOT NULL DEFAULT 0,
  `shop_type` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0:商家；1:自营',
  PRIMARY KEY (`userid`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '商铺信息扩展表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of seller_profile
-- ----------------------------

-- ----------------------------
-- Table structure for sendsms
-- ----------------------------
DROP TABLE IF EXISTS `sendsms`;
CREATE TABLE `sendsms`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mobile_phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '结束短信的手机号',
  `sendtime` int(11) NOT NULL COMMENT '发送时间（时间戳）',
  `stats` int(11) NOT NULL DEFAULT 0 COMMENT '0未使用 1已使用 默认为0',
  `supplier` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '短信平台供应商名',
  `content` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '短信内容',
  `code` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT '验证码',
  `sendtype` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT '1' COMMENT 'type为1发送登录短信，type为2发送找回密码短信,type为3发送更换老手机手机短信, type为4发送更换新手机手机短信，type为5发送注册短信卡,200为其他',
  `checktime` int(11) NOT NULL COMMENT '验证码验证时间（时间戳）',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 220 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '短信表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of sendsms
-- ----------------------------
INSERT INTO `sendsms` VALUES (219, '15371715719', 1711115885, 0, '阿里云', '5660', '5660', '1', 0);

-- ----------------------------
-- Table structure for star
-- ----------------------------
DROP TABLE IF EXISTS `star`;
CREATE TABLE `star`  (
  `starid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `starname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `low` smallint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '最低经验值',
  `high` smallint(3) NOT NULL DEFAULT 0 COMMENT '高经验值',
  `price` float(8, 2) NOT NULL DEFAULT 0.00 COMMENT '星级报价',
  PRIMARY KEY (`starid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '商铺星级表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of star
-- ----------------------------
INSERT INTO `star` VALUES (1, '0级', 5, 59, 0.00);
INSERT INTO `star` VALUES (2, '1级', 60, 129, 0.00);
INSERT INTO `star` VALUES (3, '2级', 130, 199, 0.00);
INSERT INTO `star` VALUES (4, '3级', 200, 269, 0.00);
INSERT INTO `star` VALUES (5, '4级', 270, 389, 0.00);
INSERT INTO `star` VALUES (6, '5级', 390, 519, 0.00);

-- ----------------------------
-- Table structure for tag
-- ----------------------------
DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag`  (
  `tagid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `tagname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `catid` smallint(5) NOT NULL COMMENT '标签所属分类ID',
  `ishot` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否是热门标签',
  `listorder` tinyint(5) NOT NULL DEFAULT 0,
  PRIMARY KEY (`tagid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '标签表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tag
-- ----------------------------
INSERT INTO `tag` VALUES (1, '服务态度好', 1, 0, 0);
INSERT INTO `tag` VALUES (2, '办事效率高', 1, 0, 0);
INSERT INTO `tag` VALUES (3, '响应速度快', 1, 0, 0);
INSERT INTO `tag` VALUES (4, '专业程度高', 1, 0, 0);
INSERT INTO `tag` VALUES (5, '服务周到', 1, 0, 0);
INSERT INTO `tag` VALUES (6, '主动热情', 1, 0, 0);
INSERT INTO `tag` VALUES (7, '实用高效', 1, 0, 0);

-- ----------------------------
-- Table structure for tag_category
-- ----------------------------
DROP TABLE IF EXISTS `tag_category`;
CREATE TABLE `tag_category`  (
  `catid` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `catname` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '标签分类名',
  `listorder` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '排序',
  PRIMARY KEY (`catid`) USING BTREE,
  INDEX `sort_order`(`listorder`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '标签分类表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tag_category
-- ----------------------------
INSERT INTO `tag_category` VALUES (1, '评论标签', 0);

-- ----------------------------
-- Table structure for user_bank
-- ----------------------------
DROP TABLE IF EXISTS `user_bank`;
CREATE TABLE `user_bank`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `realname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '真实姓名',
  `idno` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `account` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '账号',
  `accountname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '账号名',
  `type` tinyint(1) NOT NULL DEFAULT 0 COMMENT '账号类型 0 支付宝 1银行卡',
  `is_used` tinyint(1) NOT NULL DEFAULT 1 COMMENT '是否可用 0 不可用 1可用',
  `bankid` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT 'type=1时 存放银行id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = '会员银行卡设置表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of user_bank
-- ----------------------------
INSERT INTO `user_bank` VALUES (3, 3, '罗振宇', '1231243123123123456', '13761955940', '支付宝', 0, 0, '0');
INSERT INTO `user_bank` VALUES (4, 11, '黄钟妮', '310103198812297027', '13611650295', '支付宝', 0, 1, '0');
INSERT INTO `user_bank` VALUES (5, 16, 'iuytree', '54342234566654345634', '13701608951', '支付宝', 0, 1, '0');
INSERT INTO `user_bank` VALUES (7, 1, '周国伟', '410928198704276311', '622145236547852145236', '建设银行', 0, 1, '0');
INSERT INTO `user_bank` VALUES (8, 4, '111', '111', '111', '支付宝', 0, 1, '0');
INSERT INTO `user_bank` VALUES (9, 24, '1000000000', '100000000000', '13757409023', '支付宝', 0, 1, '0');
INSERT INTO `user_bank` VALUES (10, 3, '周国伟', '410928198704276311', '622145236547852145', '交通银行', 1, 1, '4');
INSERT INTO `user_bank` VALUES (11, 26, '姓名', '1234567890123456', '6217001210067429884', '建设银行', 1, 1, '3');
INSERT INTO `user_bank` VALUES (12, 140, '刘淑玲', '654202197902222228', '6228480031152560111', '农业银行', 1, 1, '5');
INSERT INTO `user_bank` VALUES (13, 131, '李洪强', '131126198004201834', '13816343900', '支付宝', 0, 1, '0');
INSERT INTO `user_bank` VALUES (14, 158, '徐杰', '310107198408051354', '13816759193', '支付宝', 0, 1, '0');

-- ----------------------------
-- Table structure for user_bonus
-- ----------------------------
DROP TABLE IF EXISTS `user_bonus`;
CREATE TABLE `user_bonus`  (
  `bonus_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '红包的流水号',
  `bonus_type_id` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '红包发送类型.0,按用户如会员等级,会员名称发放;1,按商品类别发送;2,按订单金额所达到的额度发送;3,线下发送',
  `bonus_sn` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '红包号,如果为0就是没有红包号.如果大于0,就需要输入该红包号才能使用红包',
  `user_id` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT '该红包属于某会员的id.如果为0,就是该红包不属于某会员',
  `used_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '红包使用的时间',
  `order_id` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT '使用了该红包的交易号',
  `emailed` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '猜的，应该是是否已经将红包发送到用户的邮箱；1，是；0，否；',
  PRIMARY KEY (`bonus_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 10056 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '已经发送的红包信息列表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of user_bonus
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
