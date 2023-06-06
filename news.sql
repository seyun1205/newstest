/*
 Navicat Premium Data Transfer

 Source Server         : connect
 Source Server Type    : MySQL
 Source Server Version : 50727
 Source Host           : localhost:3306
 Source Schema         : news

 Target Server Type    : MySQL
 Target Server Version : 50727
 File Encoding         : 65001

 Date: 18/05/2023 20:49:51
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category`  (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(20) CHARACTER SET utf8 COLLATE utf8_german2_ci NOT NULL,
  PRIMARY KEY (`category_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_german2_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES (1, '国内');
INSERT INTO `category` VALUES (2, '国际');
INSERT INTO `category` VALUES (3, '军事');
INSERT INTO `category` VALUES (4, '财经');
INSERT INTO `category` VALUES (5, '娱乐');
INSERT INTO `category` VALUES (7, '健康');
INSERT INTO `category` VALUES (8, '汽车');
INSERT INTO `category` VALUES (9, '法治');

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news`  (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` char(100) CHARACTER SET utf8 COLLATE utf8_german2_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_german2_ci,
  `publish_time` datetime(0) DEFAULT NULL,
  `clicked` int(11) DEFAULT NULL,
  `attachment` char(100) CHARACTER SET utf8 COLLATE utf8_german2_ci DEFAULT NULL,
  PRIMARY KEY (`news_id`) USING BTREE,
  INDEX `FK_news_user`(`user_id`) USING BTREE,
  INDEX `FK_news_category`(`category_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_german2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES (3, 1, 1, '2020年全国硕士研究生招生考试21日开考 341万人报名', '&lt;p&gt;\r\n	&lt;span style=&quot;font-size:14px;&quot;&gt;&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;microsoft yahei&amp;quot;; letter-spacing: 1px;&quot;&gt;　&lt;/span&gt;&lt;a href=&quot;http://www.chinanews.com/&quot; style=&quot;text-decoration-line: none; color: rgb(30, 118, 226); font-family: &amp;quot;microsoft yahei&amp;quot;; font-size: 20px; letter-spacing: 1px;&quot; target=&quot;_blank&quot;&gt;中新网&lt;/a&gt;&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;microsoft yahei&amp;quot;; letter-spacing: 1px;&quot;&gt;12月18日电 据教育部网站消息，2020年全国硕士研究生招生考试将于12月21日至23日举行，报考人数341万人。为严厉打击涉考违法活动，严肃考试纪律，维护考生合法权益，教育部18日在官网公布2020年全国硕士研究生招生考试违规违法行为举报电话，提醒广大考生知法守法，诚信考试。&lt;/span&gt;&lt;/span&gt;&lt;span style=&quot;color: rgb(51, 51, 51); font-family: &amp;quot;microsoft yahei&amp;quot;; font-size: 20px; letter-spacing: 1px;&quot;&gt;&lt;span style=&quot;font-size:14px;&quot;&gt;　教育部指出，近期，各地教育、公安、网信、工信、市场监管等相关部门正联合开展考试环境综合治理。对涉考违法违规活动，有关部门将依法严厉打击，发现一起、查处一起，坚决维护研招考试公平公正。&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n&lt;p style=&quot;margin: 15px 0px; padding: 0px; color: rgb(51, 51, 51); letter-spacing: 1px; font-family: &amp;quot;microsoft yahei&amp;quot;; font-size: 20px;&quot;&gt;\r\n	&lt;span style=&quot;font-size:14px;&quot;&gt;　　根据2019年9月4日起施行的《最高人民法院、最高人民检察院关于办理组织考试作弊等刑事案件适用法律若干问题的解释》，在研究生招生考试中&amp;ldquo;组织考试作弊&amp;rdquo;&amp;ldquo;非法出售或者提供试题、答案&amp;rdquo;等情形，均应认定为刑法第二百八十四条规定之一的&amp;ldquo;情节严重&amp;rdquo;，将依法从重追究刑事责任。&lt;/span&gt;&lt;/p&gt;\r\n&lt;p style=&quot;margin: 15px 0px; padding: 0px; color: rgb(51, 51, 51); letter-spacing: 1px; font-family: &amp;quot;microsoft yahei&amp;quot;; font-size: 20px;&quot;&gt;\r\n	&lt;span style=&quot;font-size:14px;&quot;&gt;　　教育部郑重提醒广大考生，要切实增强法制观念，提高法律意识，自觉学法知法、尊法守法，诚信考试，不参与涉考违法犯罪活动，同时，不要听信一些社会培训机构&amp;ldquo;包过&amp;rdquo;&amp;ldquo;保过&amp;rdquo;的虚假宣传，不购买所谓&amp;ldquo;试题&amp;rdquo;&amp;ldquo;答案&amp;rdquo;，谨防受骗。&lt;/span&gt;&lt;/p&gt;\r\n&lt;p style=&quot;margin: 15px 0px; padding: 0px; color: rgb(51, 51, 51); letter-spacing: 1px; font-family: &amp;quot;microsoft yahei&amp;quot;; font-size: 20px;&quot;&gt;\r\n	&lt;span style=&quot;font-size:14px;&quot;&gt;　　教育部指出，欢迎社会各界和广大考生积极参与监督，共同维护公平公正的考试环境。&lt;/span&gt;&lt;/p&gt;\r\n&lt;p&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n', '2019-12-18 14:00:57', 198, 'new2.jpg');
INSERT INTO `news` VALUES (4, 1, 7, '母亲节特辑：她们，是场上拼搏、场下柔情的“妈妈运动员”', '她们既是母亲，也是运动员。她们用汗水和佳绩，演绎了体育的精神。她们也用温情和勇敢，诠释了母爱的伟大。今天是母亲节，让我们致敬“妈妈运动员”们。\r\n今年4月，在日本轮岛的一场35公里竞走比赛中，刘虹以2小时38分42秒的成绩刷新了自己3月创造的亚洲纪录。赛后她表示：“再次刷新亚洲纪录，世界纪录也就没那么远了。”东京奥运周期，刘虹曾告别赛场回归家庭，但对田径的热爱让她决定再战奥运。刘虹克服了怀孕生子缺少训练、技术能力衰退等难题，再次走上奥运赛道，并获得东京奥运会女子20公里竞走铜牌，把自己的奥运奖牌增加为1金1银1铜。如今，36岁的刘虹正望向巴黎，期待五战奥运。\r\n四战奥运会，两获金牌，里约奥运会的失利让吴静钰选择了退役。但心中仍有不甘，她在2018年决定复出。彼时已生为人母的吴静钰用了一年的时间，重新适应训练节奏；用10个月的时间，完成了其他选手4年的积分争夺任务；用非比常人的意志力，走过了东京奥运会延期的一年。2021年，吴静钰站到了东京奥运会赛场上，即便没能再次登上领奖台，对她来说，第四次奥运登场，本身就是胜利。', '2023-05-14 11:32:00', 209, 'p.jpg');
INSERT INTO `news` VALUES (5, 4, 1, '我国主要江河湖海全面进入休禁渔期 为期两个半月', '&lt;p style=&quot;outline: 0px; zoom: 1; margin: 0px 0px 20px; padding: 0px; border: 0px; color: rgb(51, 51, 51); font-size: 20px; line-height: 40px; font-family: Arial, Tahoma, Verdana, 微软雅黑, STHeiTi, sans-serif, Helvetica, SimSun, 微软雅黑;&quot;&gt;\r\n	从5月16日12时起，我国海河、辽河、松花江流域，即华北东北三大流域开启为期两个半月的禁渔，这标志着今年我国四大海域、内陆七大重点流域全面进入休禁渔期。&lt;/p&gt;\r\n&lt;p style=&quot;outline: 0px; zoom: 1; margin: 0px 0px 20px; padding: 0px; border: 0px; color: rgb(51, 51, 51); font-size: 20px; line-height: 40px; font-family: Arial, Tahoma, Verdana, 微软雅黑, STHeiTi, sans-serif, Helvetica, SimSun, 微软雅黑;&quot;&gt;\r\n	　　今天(16日)，农业农村部在吉林省松原市举办&amp;ldquo;中国渔政亮剑2023&amp;rdquo;华北东北三大流域禁渔专项执法行动启动活动，动员三大流域渔政执法力量做好禁渔专项执法监管各项工作，确保禁渔期制度执行到位，水生生物资源得以全面休养生息。&lt;/p&gt;\r\n&lt;p style=&quot;outline: 0px; zoom: 1; margin: 0px 0px 20px; padding: 0px; border: 0px; color: rgb(51, 51, 51); font-size: 20px; line-height: 40px; font-family: Arial, Tahoma, Verdana, 微软雅黑, STHeiTi, sans-serif, Helvetica, SimSun, 微软雅黑;&quot;&gt;\r\n	　　2019年，农业农村部发布了《关于实行海河、辽河、松花江和钱塘江等4个流域禁渔期制度的通告》，从而实现了我国内陆七大重点流域禁渔期制度全覆盖和我国主要江河湖海休禁渔制度全覆盖。&lt;/p&gt;\r\n&lt;p style=&quot;outline: 0px; zoom: 1; margin: 0px 0px 20px; padding: 0px; border: 0px; color: rgb(51, 51, 51); font-size: 20px; line-height: 40px; font-family: Arial, Tahoma, Verdana, 微软雅黑, STHeiTi, sans-serif, Helvetica, SimSun, 微软雅黑;&quot;&gt;\r\n	　　据了解，2022年，在海河、辽河、松花江流域，三大流域禁渔期专项执法行动共出动执法人员13.5万人，检查渔船、渔港码头、渔船自然停靠点等2.1万个次，查处违法违规案件1163宗，移送司法处理案件163宗，对保护渔业资源和水域生态环境，维护水生生物多样性起到了至关重要的作用。&lt;/p&gt;\r\n&lt;table align=&quot;left&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot; class=&quot;adInContent&quot; style=&quot;outline: 0px; zoom: 1; border-width: initial; border-style: none; border-color: initial; margin: 0px 20px 0px 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, Tahoma, Verdana, 微软雅黑, STHeiTi, sans-serif, Helvetica, SimSun, 微软雅黑; font-size: 16px;&quot;&gt;\r\n	&lt;tbody style=&quot;outline: 0px; zoom: 1;&quot;&gt;\r\n		&lt;tr style=&quot;outline: 0px; zoom: 1;&quot;&gt;\r\n			&lt;td style=&quot;outline: 0px; zoom: 1; margin: 0px; padding: 0px;&quot;&gt;\r\n				&amp;nbsp;&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;p style=&quot;outline: 0px; zoom: 1; margin: 0px 0px 20px; padding: 0px; border: 0px; color: rgb(51, 51, 51); font-size: 20px; line-height: 40px; font-family: Arial, Tahoma, Verdana, 微软雅黑, STHeiTi, sans-serif, Helvetica, SimSun, 微软雅黑;&quot;&gt;\r\n	　　(总台记者 梁丽娟 胡子淇)&lt;/p&gt;\r\n', '2023-05-16 14:42:09', 152, '松花江.jpeg');
INSERT INTO `news` VALUES (6, 2, 4, '油价创年内最大跌幅 加一箱油少花约15元', '<p style=\"outline: 0px; zoom: 1; margin: 0px 0px 20px; padding: 0px; border: 0px; color: rgb(51, 51, 51); font-size: 10px; line-height: 40px; font-family: Arial, Tahoma, Verdana, 微软雅黑, STHeiTi, sans-serif, Helvetica, SimSun, 微软雅黑;\">\r\n	　<a href=\"https://www.chinanews.com/\" style=\"outline: none; zoom: 1; cursor: pointer; color: blue; text-decoration-line: none;\" target=\"_blank\">中新网</a>5月16日电 (中新财经 葛成) 据国家发改委通知，5月16日24时起，每吨汽油下调380元，每吨柴油下调365元。</p>\r\n<p style=\"outline: 0px; zoom: 1; margin: 0px 0px 20px; padding: 0px; border: 0px; color: rgb(51, 51, 51); font-size: 10px; line-height: 40px; font-family: Arial, Tahoma, Verdana, 微软雅黑, STHeiTi, sans-serif, Helvetica, SimSun, 微软雅黑;\">\r\n	　　据机构测算，油价此次调价创年内最大跌幅，折合92号汽油每升下调0.30元，95号汽油每升下调0.31元，0号柴油每升下调0.31元。油价调整后，全国大部分地区95号汽油将回归“7元时代”。</p>\r\n<div style=\"outline: 0px; zoom: 1; margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, Tahoma, Verdana, 微软雅黑, STHeiTi, sans-serif, Helvetica, SimSun, 微软雅黑; font-size: 10px; text-align: center;\">\r\n	 </div>\r\n<p style=\"outline: 0px; zoom: 1; margin: 0px 0px 20px; padding: 0px; border: 0px; color: rgb(51, 51, 51); font-size: 10px; line-height: 40px; font-family: Arial, Tahoma, Verdana, 微软雅黑, STHeiTi, sans-serif, Helvetica, SimSun, 微软雅黑;\">\r\n	　　以油箱容量50L的普通私家车为例，这次调价后，车主加满一箱油将少花15元左右。柴油方面，油箱容量为160L的大货车，加满一箱油将少支出约49.6元。</p>\r\n<p style=\"outline: 0px; zoom: 1; margin: 0px 0px 20px; padding: 0px; border: 0px; color: rgb(51, 51, 51); font-size: 10px; line-height: 40px; font-family: Arial, Tahoma, Verdana, 微软雅黑, STHeiTi, sans-serif, Helvetica, SimSun, 微软雅黑;\">\r\n	　　隆众资讯分析师刘文杰认为，本轮计价周期内，国际油价持续承压。虽然石油输出国组织及其合作伙伴(OPEC+)减产使得供应趋紧预期仍在，美国亦可能在6月回补战略储备；但欧美经济衰退风险带来的忧虑情绪延续，美国初请失业金人数增加，债务上限问题亦持续引发市场担忧，原油期货价格趋弱运行。</p>\r\n<p style=\"outline: 0px; zoom: 1; margin: 0px 0px 20px; padding: 0px; border: 0px; color: rgb(51, 51, 51); font-size: 10px; line-height: 40px; font-family: Arial, Tahoma, Verdana, 微软雅黑, STHeiTi, sans-serif, Helvetica, SimSun, 微软雅黑;\">\r\n	　　“整体来看，计价周期内挂靠油种均价下移，所对应的原油综合变化率负向区间运行，开启本轮零售价下调窗口。”</p>\r\n<p style=\"outline: 0px; zoom: 1; margin: 0px 0px 20px; padding: 0px; border: 0px; color: rgb(51, 51, 51); font-size: 10px; line-height: 40px; font-family: Arial, Tahoma, Verdana, 微软雅黑, STHeiTi, sans-serif, Helvetica, SimSun, 微软雅黑;\">\r\n	　　本轮是2023年第十次调价，调价后，国内成品油价格年内呈现“三涨五跌两搁浅”格局。下一轮调价窗口将在5月30日24时开启。</p>\r\n<p style=\"outline: 0px; zoom: 1; margin: 0px 0px 20px; padding: 0px; border: 0px; color: rgb(51, 51, 51); font-size: 10px; line-height: 40px; font-family: Arial, Tahoma, Verdana, 微软雅黑, STHeiTi, sans-serif, Helvetica, SimSun, 微软雅黑;\">\r\n	　　“预计下一轮成品油调价上涨的概率较大。”隆众资讯分析师李彦分析称，虽然以当前的国际原油价格水平计算，下一轮成品油调价开局将呈现小幅下调的趋势，但从目前来看，5月下旬美国夏季出行高峰将至，债务上限问题引发美国信用违约的概率不大，国际油价还有上行空间。</p>\r\n<p style=\"outline: 0px; zoom: 1; margin: 0px 0px 20px; padding: 0px; border: 0px; color: rgb(51, 51, 51); font-size: 10px; line-height: 40px; font-family: Arial, Tahoma, Verdana, 微软雅黑, STHeiTi, sans-serif, Helvetica, SimSun, 微软雅黑;\">\r\n	　　而在金联创成品油高级分析师王延婷看来，进入新一轮计价周期后，初期变化率波动幅度有限，对市场心态难有明显提振。但前期业者多维持低库存操作，随着价格回落至低位，开始多入市补货，对市场成交形成支撑，国际油价或适度反弹。(完)</p>\r\n<table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"adInContent\" style=\"outline: 0px; zoom: 1; border-width: initial; border-style: none; border-color: initial; margin: 0px 20px 0px 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, Tahoma, Verdana, 微软雅黑, STHeiTi, sans-serif, Helvetica, SimSun, 微软雅黑; font-size: 10px;\">\r\n	<tbody style=\"outline: 0px; zoom: 1;\">\r\n		<tr style=\"outline: 0px; zoom: 1;\">\r\n			<td style=\"outline: 0px; zoom: 1; margin: 0px; padding: 0px;\">\r\n				 </td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<div class=\"adEditor\" style=\"outline: 0px; zoom: 1; margin: 0px; padding: 0px; overflow: hidden; color: rgb(51, 51, 51); font-family: Arial, Tahoma, Verdana, 微软雅黑, STHeiTi, sans-serif, Helvetica, SimSun, 微软雅黑; font-size: 16px;\">\r\n	<div class=\"left_name right\" style=\"outline: 0px; zoom: 1; margin: 0px; padding: 0px; float: right; display: inline; width: 485px; background: url(\"//i2.chinanews.com.cn/2019/newzw2/images/bg1.jpg\") 0px center repeat-x; color: rgb(73, 73, 73); text-align: right; font-size: 10px;\">\r\n		<span style=\"outline: 0px; zoom: 1; display: inline-block; padding-left: 10px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"></span></div>\r\n</div>\r\n<p>\r\n	 </p>\r\n', '2023-05-16 14:47:26', 165, '石油.jpg');
INSERT INTO `news` VALUES (7, 1, 2, '习近平同乌兹别克斯坦总统米尔济约耶夫会谈', '<div class=\"content_maincontent_more\" style=\"outline: 0px; zoom: 1; margin: 0px 0px 15px; padding: 24px 65px; border-radius: 5px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(51, 51, 51); font-family: Arial, Tahoma, Verdana, 微软雅黑, STHeiTi, sans-serif, Helvetica, SimSun, 微软雅黑; font-size: 16px;\">\r\n	<div class=\"content_maincontent_content\" style=\"outline: 0px; zoom: 1; margin: 0px; padding: 16px 0px 0px;\">\r\n		<div class=\"left_zw\" style=\"outline: 0px; zoom: 1; margin: 0px 15px; padding: 0px;\">\r\n			<p style=\"outline: 0px; zoom: 1; margin: 0px 0px 20px; padding: 0px; border: 0px; font-size: 20px; line-height: 40px;\">\r\n				<strong style=\"outline: 0px; zoom: 1;\">快讯：习近平同乌兹别克斯坦总统米尔济约耶夫会谈</strong></p>\r\n			<p style=\"outline: 0px; zoom: 1; margin: 0px 0px 20px; padding: 0px; border: 0px; font-size: 20px; line-height: 40px;\">\r\n				　　<a href=\"https://www.chinanews.com.cn/\" style=\"outline: none; zoom: 1; cursor: pointer; color: blue; text-decoration-line: none;\" target=\"_blank\">中新社</a>西安5月18日电 (记者 郭金超 黄钰钦)5月18日下午，中国国家主席习近平在西安同来华出席中国—中亚峰会并进行国事访问的乌兹别克斯坦总统米尔济约耶夫会谈。</p>\r\n			<p style=\"outline: 0px; zoom: 1; margin: 0px 0px 20px; padding: 0px; border: 0px; font-size: 20px; line-height: 40px;\">\r\n				　　习近平指出，欢迎米尔济约耶夫总统来华出席中国—中亚峰会并进行国事访问。去年9月，我对贵国进行国事访问，受到你热情友好接待，至今记忆犹新。不久前，乌兹别克斯坦成功举行全民公投，通过了新宪法，充分表明贵国人民对总统先生的高度信任和衷心拥护。我向你表示祝贺。相信在你领导下，乌兹别克斯坦改革开放之路会越走越宽，“新乌兹别克斯坦”建设将不断取得更大成就。</p>\r\n			<p style=\"outline: 0px; zoom: 1; margin: 0px 0px 20px; padding: 0px; border: 0px; font-size: 20px; line-height: 40px;\">\r\n				　　习近平说，去年9月，我们共同宣布在中乌双边层面践行命运共同体，确立了两国关系新定位。中方愿同乌方一道，深化全方位合作，构建中乌命运共同体。(完)</p>\r\n			<div class=\"adEditor\" style=\"outline: 0px; zoom: 1; margin: 0px; padding: 0px; overflow: hidden;\">\r\n				<div class=\"left_name right\" style=\"outline: 0px; zoom: 1; margin: 0px; padding: 0px; float: right; display: inline; width: 485px; background: none; color: rgb(73, 73, 73); text-align: right; font-size: 14px;\">\r\n					<span style=\"outline: 0px; zoom: 1; display: inline-block; padding-left: 10px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">【编辑:田博群】</span></div>\r\n			</div>\r\n		</div>\r\n	</div>\r\n</div>\r\n<p>\r\n	 </p>\r\n', '2023-05-18 12:19:55', 7, 'news3.jpg');

-- ----------------------------
-- Table structure for review
-- ----------------------------
DROP TABLE IF EXISTS `review`;
CREATE TABLE `review`  (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_id` int(11) DEFAULT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_german2_ci,
  `publish_time` datetime(0) DEFAULT NULL,
  `state` char(10) CHARACTER SET utf8 COLLATE utf8_german2_ci DEFAULT NULL,
  `ip` char(15) CHARACTER SET utf8 COLLATE utf8_german2_ci DEFAULT NULL,
  PRIMARY KEY (`review_id`) USING BTREE,
  INDEX `FK_review_news`(`news_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_german2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of review
-- ----------------------------
INSERT INTO `review` VALUES (5, 6, '很好，希望能保持价格！', '2023-05-16 15:08:24', '已审核', '::1');
INSERT INTO `review` VALUES (4, 4, '母亲真伟大！', '2023-05-14 11:34:46', '已审核', '::1');
INSERT INTO `review` VALUES (6, 4, '很好！很棒！', '2023-05-18 11:57:49', '已审核', '::1');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(20) CHARACTER SET utf8 COLLATE utf8_german2_ci NOT NULL,
  `password` char(32) CHARACTER SET utf8 COLLATE utf8_german2_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_german2_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', '202cb962ac59075b964b07152d234b70');
INSERT INTO `users` VALUES (2, 'www', 'e10adc3949ba59abbe56e057f20f883e');
INSERT INTO `users` VALUES (3, 'zzz', 'e10adc3949ba59abbe56e057f20f883e');
INSERT INTO `users` VALUES (4, '0922201', 'e10adc3949ba59abbe56e057f20f883e');
INSERT INTO `users` VALUES (5, '111', 'e10adc3949ba59abbe56e057f20f883e');
INSERT INTO `users` VALUES (11, '222', 'e10adc3949ba59abbe56e057f20f883e');
INSERT INTO `users` VALUES (12, '123456', 'e10adc3949ba59abbe56e057f20f883e');

SET FOREIGN_KEY_CHECKS = 1;
