-- MySQL dump 10.13  Distrib 5.5.34, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: scfate
-- ------------------------------------------------------
-- Server version	5.5.34-0ubuntu0.13.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `province` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `county` varchar(45) DEFAULT NULL,
  `detail` text NOT NULL,
  `zipcode` varchar(45) NOT NULL,
  `receipter` varchar(45) NOT NULL,
  `default` int(11) NOT NULL DEFAULT '0' COMMENT '是否为默认地址\n0不是\n1是',
  `phone` varchar(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_address_1` (`userid`),
  CONSTRAINT `fk_address_1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='用户收获地址表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` VALUES (4,1,'中国','成都市','郫县','<h1>电子科技大学<h1>','611731','徐磊',0,'18583469439'),(5,1,'四川省','成都市','none','西源大道2006号电子科大','611731','海龙',0,'15008487897');
/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `announcement`
--

DROP TABLE IF EXISTS `announcement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `announcement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `create_time` datetime NOT NULL,
  `title` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='首页公告';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `announcement`
--

LOCK TABLES `announcement` WRITE;
/*!40000 ALTER TABLE `announcement` DISABLE KEYS */;
INSERT INTO `announcement` VALUES (1,'我是公告正文','2014-07-09 01:17:00','我是标题'),(2,'很多很多字很多很多字很多很多字很多很多字很多很多字很多很多字很多很多字很多很多字很多很多字很多很多字很多很多字很多很多字很多很多字很多很多字很多很多字很多很多字很多很多字很多很多字很多很多字很多很多字很多很多字很多很多字很多很多字很多很多字很多很多字很多很多字很多很多字很多很多字很多很多字很多很多字很多很多字','2014-07-09 01:38:00','第二条公告'),(3,'asd','2014-07-09 05:28:00','asd');
/*!40000 ALTER TABLE `announcement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `area_name` varchar(45) NOT NULL,
  `area_type` tinyint(1) NOT NULL COMMENT '0是国家\n1是省份\n2是市\n3是区\n4是学校',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area`
--

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` VALUES (1,1,'中国',0),(2,1,'四川省',1),(3,2,'成都市',2),(4,3,'郫县',3),(5,4,'电子科技大学',4);
/*!40000 ALTER TABLE `area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clothes`
--

DROP TABLE IF EXISTS `clothes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clothes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clothesname` varchar(45) NOT NULL,
  `rent` int(11) NOT NULL,
  `cash_pledge` int(11) NOT NULL COMMENT '押金',
  `reserve` int(11) NOT NULL COMMENT '库存',
  `sort_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(100) NOT NULL,
  `comment_count` int(11) NOT NULL DEFAULT '0' COMMENT '评论数量',
  `sale_count` int(11) NOT NULL DEFAULT '0' COMMENT '租赁次数',
  `size` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='服装信息表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clothes`
--

LOCK TABLES `clothes` WRITE;
/*!40000 ALTER TABLE `clothes` DISABLE KEYS */;
INSERT INTO `clothes` VALUES (1,'晚礼服',200,500,20,6,'<p style=\"; ; ; text-align: center;\"><img align=\"absmiddle\" src=\"http://gd1.alicdn.com/imgextra/i1/678667839/T2bGQ1XTJXXXXXXXXX_!!678667839.jpg\" width=\"780\" height=\"450\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top;\"/><img align=\"absmiddle\" src=\"http://gd1.alicdn.com/imgextra/i1/678667839/T2F5s0XFRaXXXXXXXX_!!678667839.jpg\" width=\"702\" height=\"409\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top;\"/><img align=\"absmiddle\" src=\"http://gd2.alicdn.com/imgextra/i2/678667839/T2NSU1XPNXXXXXXXXX_!!678667839.jpg_790x10000.jpg\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top;\"/><img align=\"absmiddle\" src=\"http://gd3.alicdn.com/imgextra/i3/678667839/T2sKI1XPdXXXXXXXXX_!!678667839.jpg\" width=\"790\" height=\"1502\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top;\"/></p><p><span style=\"text-decoration:line-through;\"></span></p><p><em class=\"hd-icon\"></em></p><p><br/></p>','1406368529.jpg',0,0,'X;L;M'),(2,'男西装',100,200,10,5,'<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" width=\"950\" style=\"width: 678px;\"><tbody><tr><td style=\"margin: 0px; padding: 0px;\"><a target=\"_blank\" href=\"http://atti.taobao.com/\" style=\"text-decoration: none; color: rgb(51, 102, 204); margin: 0px; padding: 0px;\"><img src=\"http://gd3.alicdn.com/imgextra/i3/12028739/T21yJDXi8OXXXXXXXX_!!12028739.jpg\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top;\"/></a><br/></td></tr></tbody></table><table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" width=\"950\" style=\"width: 678px;\"><tbody><tr><td style=\"margin: 0px; padding: 0px;\"><a target=\"_blank\" href=\"http://atti.taobao.com/category-649489106-501841733.htm?spm=a1z10.5.0.0.hOgvdp&amp;search=y&amp;catName=%D2%BC%BD%F5%B9%F1+%7C+%C8%C8%C2%F4TOP50\" style=\"text-decoration: none; color: rgb(51, 102, 204); margin: 0px; padding: 0px;\"><img border=\"0\" src=\"http://gd3.alicdn.com/imgextra/i3/12028739/T2aqOWXm4XXXXXXXXX_!!12028739.jpg\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top; float: none;\"/></a></td><td style=\"margin: 0px; padding: 0px;\"><a target=\"_blank\" href=\"http://atti.taobao.com/p/rd348167.htm?spm=a1z10.5.w5002-3138281270.5.1BpwLj\" style=\"text-decoration: none; color: rgb(51, 102, 204); margin: 0px; padding: 0px;\"><img border=\"0\" src=\"http://gd2.alicdn.com/imgextra/i2/12028739/T2MFxWXd4dXXXXXXXX_!!12028739.jpg\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top; float: none;\"/></a></td><td style=\"margin: 0px; padding: 0px;\"><a target=\"_blank\" href=\"http://atti.taobao.com/p/rd704253.htm?spm=a1z10.4.w5002-3138281270.4.ONRoLa\" style=\"text-decoration: none; color: rgb(51, 102, 204); margin: 0px; padding: 0px;\"><img border=\"0\" src=\"http://gd2.alicdn.com/imgextra/i2/12028739/T20ymVXidaXXXXXXXX_!!12028739.jpg\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top; float: none;\"/></a></td><td style=\"margin: 0px; padding: 0px;\"><a target=\"_blank\" href=\"http://atti.taobao.com/p/rd509947.htm?spm=2013.1.w5002-3138281270.7.CHMf44\" style=\"text-decoration: none; color: rgb(51, 102, 204); margin: 0px; padding: 0px;\"><img border=\"0\" src=\"http://gd1.alicdn.com/imgextra/i1/12028739/T2BGuWXmNXXXXXXXXX_!!12028739.jpg\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top; float: none;\"/></a></td></tr></tbody></table><table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" width=\"950\" style=\"width: 678px;\"><tbody><tr><td style=\"margin: 0px; padding: 0px;\"><span style=\"text-align: center;\"><img align=\"absMiddle\" src=\"http://gd1.alicdn.com/imgextra/i1/12028739/T2mvGoXg4XXXXXXXXX_!!12028739.jpg\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top;\"/></span></td></tr></tbody></table><table align=\"center\" background=\"http://img04.taobaocdn.com/imgextra/i4/12028739/T2An5hXmFaXXXXXXXX_!!12028739.jpg\" cellpadding=\"0\" cellspacing=\"0\" width=\"950\" style=\"width: 678px;\"><tbody><tr><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><p style=\"text-align:center;; ;\"><span style=\"line-height: 1.5;\">&nbsp;<img align=\"absmiddle\" src=\"http://gd4.alicdn.com/imgextra/i4/12028739/TB2h6kEXVXXXXXjXXXXXXXXXXXX-12028739.jpg\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top;\"/></span></p><p><span style=\"color:#373b42;font-family:microsoft yahei;font-size:3px\"><span style=\"line-height: 23.99px;\"><strong>在水一方</strong></span></span></p><p style=\"; ;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"color: rgb(251, 156, 156); line-height: 27px; font-size: 18px; background-color: rgb(55, 59, 66);\">柜子说</span><span style=\"font-size: 12pt;\"><span style=\"line-height: 1.5;\"><span style=\"font-size: 12pt;\">：</span></span></span><span style=\"color: rgb(55, 59, 66);\"><span style=\"font-size: 12pt; line-height: 1.5;\">绿草苍苍</span><span style=\"font-size: 12pt; line-height: 1.5;\">,</span><span style=\"font-size: 12pt; line-height: 1.5;\">白雾茫茫</span><span style=\"font-size: 12pt; line-height: 1.5;\">,</span><span style=\"font-size: 12pt; line-height: 1.5;\">有位佳人，在水一方，我愿逆流而上，依偎在他身旁</span></span></span></p><p style=\"text-align:center;; ;\"><span style=\"color: rgb(55, 59, 66);\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 12pt;\">仙女愿意做这样的魅力佳人吗？柜子家这件仙衣有这种魔力哦</span></span></span></p><p style=\"text-align:center;; ;\"><span style=\"color: rgb(55, 59, 66);\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 12pt;\">接近吊带的无袖除了性感妩媚，现在穿也很清凉，A字版廓形不挑身材</span></span></span></p><p style=\"text-align:center;; ;\"><span style=\"color: rgb(55, 59, 66);\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 12pt;\">显瘦效果很显著，对身材自信，也可以将腰间的绳带收紧打成蝴蝶结</span></span></span></p><p style=\"text-align:center;; ;\"><span style=\"color: rgb(55, 59, 66);\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 12pt;\">秀一秀好身材，也可以增加活泼甜美的女人味</span></span></span></p><p style=\"text-align:center;; ;\"><span style=\"color: rgb(55, 59, 66);\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 12pt;\">整件衣服质量极轻，再让人感觉燥热烦闷的夏季，减压效果很显著哦</span></span></span></p><p style=\"text-align:center;; ;\"><span style=\"color: rgb(55, 59, 66);\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 12pt;\">很薄很透的材质细腻美观的条纹状褶皱，让整件衣服带上了娇嫩柔软感</span></span></span></p><p style=\"text-align:center;; ;\"><span style=\"color: rgb(55, 59, 66);\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 12pt;\">还有领口、裙摆窄窄的荷叶边，除了甜美还带来很年轻的感觉，减龄明显</span></span></span></p><p style=\"text-align:center;; ;\"><span style=\"color: rgb(55, 59, 66);\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 12pt;\">领一圈花蕊型的钉珠，亮晶晶的带来一点梦幻，也省了项链搭配</span></span></span></p><p style=\"text-align:center;; ;\"><strong><span style=\"color: rgb(55, 59, 66);\"><span style=\"font-family: &#39;microsoft yahei&#39;;\">注：领后中一粒纽扣，腰间有绳要带，可以取下，但建议不要取下</span></span></strong></p><p style=\"; ;\"><img align=\"absmiddle\" src=\"http://gd1.alicdn.com/imgextra/i1/12028739/TB2JOMAXVXXXXbhXpXXXXXXXXXX-12028739.jpg\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top;\"/><br/><span style=\"color: rgb(251, 156, 156); line-height: 27px; font-family: &#39;microsoft yahei&#39;; font-size: 18px; background-color: rgb(55, 59, 66);\"></span></p><p style=\"; ;\"><span style=\"color: rgb(55, 59, 66);\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 12pt;\"></span></span></span><span style=\"color: rgb(251, 156, 156); line-height: 27px; font-family: &#39;microsoft yahei&#39;; font-size: 18px; background-color: rgb(55, 59, 66);\">材质说明</span></p><p style=\"text-align:center;; ;\"><span style=\"color: rgb(55, 59, 66);\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 12pt;\">真丝顺纡绉面料，强捻预缩等复杂工艺造就表面，有细腻美观的条纹状褶皱</span></span></span></p><p style=\"text-align:center;; ;\"><span style=\"color: rgb(55, 59, 66);\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 12pt;\">悬垂性能不错，成衣很优雅，手感很柔软，透气性能很优良，因此穿着也清凉舒适</span></span></span></p><p style=\"text-align:center;; ;\"><span style=\"color: rgb(55, 59, 66);\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 12pt;\">天然桑蚕丝材质，含有人体所需的18种氨基酸，养颜护肤，多穿让您容光焕发</span></span></span></p><p style=\"text-align:center;; ;\"><span style=\"color: rgb(55, 59, 66);\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 12pt;\">高级内衬，遮光防透，柔软滑爽，排汗吸湿，穿着清凉舒适</span></span></span></p><span style=\"font-family: 宋体; font-size: 12pt;\"></span><table align=\"center\" background=\"http://img04.taobaocdn.com/imgextra/i4/783483454/T2K4yqXjFaXXXXXXXX_!!783483454.jpg\" cellpadding=\"0\" cellspacing=\"0\" width=\"950\" style=\"width: 678px;\"><tbody><tr><td colspan=\"8\" style=\"margin: 0px; padding: 0px;\"><img src=\"http://gd1.alicdn.com/imgextra/i1/12028739/T2Z2MzXh4aXXXXXXXX_!!12028739.jpg\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top; float: none;\"/></td></tr><tr><td align=\"center\" rowspan=\"3\" width=\"65\" style=\"margin: 0px; padding: 0px;\"><br/></td><td align=\"center\" rowspan=\"3\" width=\"400\" style=\"margin: 0px; padding: 0px;\"><img align=\"absmiddle\" src=\"http://gd3.alicdn.com/imgextra/i3/12028739/TB2xYIGXVXXXXcRXXXXXXXXXXXX-12028739.jpg\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top; height: 400px; width: 400px; float: none;\"/><br/></td><td style=\"margin: 0px; padding: 0px;\"><table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" width=\"400\"><tbody><tr><td height=\"30\" style=\"margin: 0px; padding: 0px;\"><span style=\"color: rgb(55, 59, 66);\"><span style=\"font-family: &#39;microsoft yahei&#39;;\">货号：Q6524</span></span><br/></td></tr><tr><td height=\"30\" style=\"margin: 0px; padding: 0px;\"><span style=\"color: rgb(55, 59, 66);\"><span style=\"font-family: &#39;microsoft yahei&#39;;\">面料：真丝顺纡面料</span></span><br/></td></tr><tr><td height=\"30\" style=\"margin: 0px; padding: 0px;\"><span style=\"color: rgb(55, 59, 66);\"><span style=\"font-family: &#39;microsoft yahei&#39;;\">备注：</span><span style=\"font-family: &#39;microsoft yahei&#39;;\">领后中一粒纽扣，腰间有绳要带，可以取下，但建议不要取下</span></span><br/></td></tr></tbody></table></td><td width=\"60\" style=\"margin: 0px; padding: 0px;\"><br/></td><td width=\"60\" style=\"margin: 0px; padding: 0px;\"><br/></td><td width=\"60\" style=\"margin: 0px; padding: 0px;\"><br/></td><td width=\"60\" style=\"margin: 0px; padding: 0px;\"><br/></td><td width=\"60\" style=\"margin: 0px; padding: 0px;\"><br/></td></tr><tr><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><img src=\"http://gd1.alicdn.com/imgextra/i1/12028739/T2ZrqHXpVXXXXXXXXX-12028739.jpg\" width=\"420\" height=\"170\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top;\"/><br/></td><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><br/></td><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><br/></td><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><br/></td><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><br/></td><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><br/></td></tr><tr><td style=\"margin: 0px; padding: 0px;\"><table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" width=\"400\"><tbody><tr><td colspan=\"9\" style=\"margin: 0px; padding: 0px;\"><span style=\"color: rgb(55, 59, 66);\"><span style=\"font-family: &#39;microsoft yahei&#39;;\">长度指数</span></span></td><td rowspan=\"6\" width=\"4\" style=\"margin: 0px; padding: 0px;\"><br/></td><td colspan=\"7\" style=\"margin: 0px; padding: 0px;\"><span style=\"color: rgb(55, 59, 66);\"><span style=\"font-family: &#39;microsoft yahei&#39;;\">版型指数</span></span></td></tr><tr><td bgcolor=\"#5e6562\" width=\"43\" style=\"margin: 0px; padding: 0px; text-align: center;\"><span style=\"color: rgb(204, 204, 204);\"><span style=\"font-size: 12px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\">超短</span></span></span></td><td width=\"2\" style=\"margin: 0px; padding: 0px; text-align: center;\"><br/></td><td bgcolor=\"#5e6562\" width=\"41\" style=\"margin: 0px; padding: 0px; text-align: center;\"><span style=\"color: rgb(241, 92, 114);\"><span style=\"font-size: 12px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\">短</span></span></span></td><td width=\"2\" style=\"margin: 0px; padding: 0px; text-align: center;\"><br/></td><td bgcolor=\"#5e6562\" width=\"41\" style=\"margin: 0px; padding: 0px; text-align: center;\"><span style=\"color: rgb(204, 204, 204);\"><span style=\"font-size: 12px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\">常规</span></span></span></td><td width=\"2\" style=\"margin: 0px; padding: 0px; text-align: center;\"><br/></td><td bgcolor=\"#5e6562\" width=\"41\" style=\"margin: 0px; padding: 0px; text-align: center;\"><span style=\"color: rgb(204, 204, 204);\"><span style=\"font-size: 12px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\">中长</span></span></span></td><td width=\"2\" style=\"margin: 0px; padding: 0px; text-align: center;\"><br/></td><td bgcolor=\"#5e6562\" width=\"41\" style=\"margin: 0px; padding: 0px; text-align: center;\"><span style=\"color: rgb(204, 204, 204);\"><span style=\"font-size: 12px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\">超长</span></span></span></td><td bgcolor=\"#5e6562\" width=\"43\" style=\"margin: 0px; padding: 0px; text-align: center;\"><span style=\"color: rgb(204, 204, 204);\"><span style=\"font-size: 12px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\">紧身</span></span></span></td><td width=\"2\" style=\"margin: 0px; padding: 0px; text-align: center;\"><br/></td><td bgcolor=\"#5e6562\" width=\"41\" style=\"margin: 0px; padding: 0px; text-align: center;\"><span style=\"color: rgb(241, 92, 114);\"><span style=\"font-size: 12px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\">修身</span></span></span><br/></td><td width=\"2\" style=\"margin: 0px; padding: 0px; text-align: center;\"><br/></td><td bgcolor=\"#5e6562\" width=\"41\" style=\"margin: 0px; padding: 0px; text-align: center;\"><span style=\"color: rgb(204, 204, 204);\"><span style=\"font-size: 12px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\">合适</span></span></span></td><td width=\"2\" style=\"margin: 0px; padding: 0px; text-align: center;\"><br/></td><td bgcolor=\"#5e6562\" width=\"41\" style=\"margin: 0px; padding: 0px; text-align: center;\"><span style=\"color: rgb(204, 204, 204);\"><span style=\"font-size: 12px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"background-color: rgb(241, 92, 114);\"><span style=\"background-color: rgb(102, 102, 102);\">宽松</span></span></span></span></span><br/></td></tr><tr><td colspan=\"9\" style=\"margin: 0px; padding: 0px;\"><span style=\"color: rgb(55, 59, 66);\"><span style=\"font-family: &#39;microsoft yahei&#39;;\">厚度指数</span></span></td><td colspan=\"7\" style=\"margin: 0px; padding: 0px;\"><span style=\"color: rgb(55, 59, 66);\"><span style=\"font-family: &#39;microsoft yahei&#39;;\">弹力指数</span></span></td></tr><tr><td bgcolor=\"#5e6562\" style=\"margin: 0px; padding: 0px; text-align: center;\"><span style=\"color: rgb(241, 92, 114);\"><span style=\"font-size: 12px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\">薄</span></span></span></td><td style=\"margin: 0px; padding: 0px; text-align: center;\"><br/></td><td bgcolor=\"#5e6562\" style=\"margin: 0px; padding: 0px; text-align: center;\"><span style=\"color: rgb(204, 204, 204);\"><span style=\"font-size: 12px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\">偏薄</span></span></span></td><td style=\"margin: 0px; padding: 0px; text-align: center;\"><br/></td><td bgcolor=\"#5e6562\" style=\"margin: 0px; padding: 0px; text-align: center;\"><span style=\"color: rgb(204, 204, 204);\"><span style=\"font-size: 12px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\">适中</span></span></span></td><td style=\"margin: 0px; padding: 0px; text-align: center;\"><br/></td><td bgcolor=\"#5e6562\" style=\"margin: 0px; padding: 0px; text-align: center;\"><span style=\"color: rgb(204, 204, 204);\"><span style=\"font-size: 12px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\">厚</span></span></span></td><td style=\"margin: 0px; padding: 0px; text-align: center;\"><br/></td><td bgcolor=\"#5e6562\" style=\"margin: 0px; padding: 0px; text-align: center;\"><span style=\"color: rgb(204, 204, 204);\"><span style=\"font-size: 12px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\">超厚</span></span></span></td><td bgcolor=\"#5e6562\" style=\"margin: 0px; padding: 0px; text-align: center;\"><span style=\"color: rgb(241, 92, 114);\"><span style=\"font-size: 12px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\">无弹</span></span></span></td><td style=\"margin: 0px; padding: 0px; text-align: center;\"><br/></td><td bgcolor=\"#5e6562\" style=\"margin: 0px; padding: 0px; text-align: center;\"><span style=\"color: rgb(204, 204, 204);\"><span style=\"font-size: 12px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\">微弹</span></span></span></td><td style=\"margin: 0px; padding: 0px; text-align: center;\"><br/></td><td bgcolor=\"#5e6562\" style=\"margin: 0px; padding: 0px; text-align: center;\"><span style=\"color: rgb(204, 204, 204);\"><span style=\"font-size: 12px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\">弹力</span></span></span></td><td style=\"margin: 0px; padding: 0px; text-align: center;\"><br/></td><td bgcolor=\"#5e6562\" style=\"margin: 0px; padding: 0px; text-align: center;\"><span style=\"color: rgb(204, 204, 204);\"><span style=\"font-size: 12px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\">超弹</span></span></span></td></tr><tr><td colspan=\"9\" style=\"margin: 0px; padding: 0px;\"><span style=\"color: rgb(55, 59, 66);\"><span style=\"font-family: &#39;microsoft yahei&#39;;\">柔软指数</span></span><br/></td><td colspan=\"7\" style=\"margin: 0px; padding: 0px;\"><br/></td></tr><tr><td bgcolor=\"#5e6562\" style=\"margin: 0px; padding: 0px; text-align: center;\"><span style=\"color: rgb(241, 92, 114);\"><span style=\"font-size: 12px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\">柔软</span></span></span></td><td style=\"margin: 0px; padding: 0px; text-align: center;\"><br/></td><td bgcolor=\"#5e6562\" style=\"margin: 0px; padding: 0px; text-align: center;\"><span style=\"color: rgb(204, 204, 204);\"><span style=\"font-size: 12px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\">适中</span></span></span></td><td style=\"margin: 0px; padding: 0px; text-align: center;\"><br/></td><td bgcolor=\"#5e6562\" style=\"margin: 0px; padding: 0px; text-align: center;\"><span style=\"color: rgb(204, 204, 204);\"><span style=\"font-size: 12px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\">偏硬</span></span></span></td><td style=\"margin: 0px; padding: 0px;\"><br/></td><td style=\"margin: 0px; padding: 0px;\"><br/></td><td style=\"margin: 0px; padding: 0px;\"><br/></td><td style=\"margin: 0px; padding: 0px;\"><br/></td><td style=\"margin: 0px; padding: 0px;\"><br/></td><td style=\"margin: 0px; padding: 0px;\"><br/></td><td style=\"margin: 0px; padding: 0px;\"><br/></td><td style=\"margin: 0px; padding: 0px;\"><br/></td><td style=\"margin: 0px; padding: 0px;\"><br/></td><td style=\"margin: 0px; padding: 0px;\"><br/></td><td style=\"margin: 0px; padding: 0px;\"><br/></td></tr></tbody></table></td><td style=\"margin: 0px; padding: 0px;\"><br/></td><td style=\"margin: 0px; padding: 0px;\"><br/></td><td style=\"margin: 0px; padding: 0px;\"><br/></td><td style=\"margin: 0px; padding: 0px;\"><br/></td><td style=\"margin: 0px; padding: 0px;\"><br/></td></tr></tbody></table></td></tr></tbody></table><table align=\"center\" background=\"http://img04.taobaocdn.com/imgextra/i4/12028739/T2An5hXmFaXXXXXXXX_!!12028739.jpg\" cellpadding=\"0\" cellspacing=\"0\" width=\"950\" style=\"width: 678px;\"><tbody><tr><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><p style=\"; ;\"><img src=\"http://gd4.alicdn.com/imgextra/i4/12028739/T2PEehXidaXXXXXXXX_!!12028739.jpg\" width=\"950\" height=\"67\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top; line-height: 1.5;\"/></p><table align=\"center\" background=\"http://img03.taobaocdn.com/imgextra/i3/12028739/T2XhKhXbdaXXXXXXXX_!!12028739.jpg\" cellpadding=\"0\" cellspacing=\"0\" width=\"820\" style=\"width: 678px;\"><tbody><tr><td align=\"center\" valign=\"center\" width=\"100\" style=\"margin: 0px; padding: 0px;\"><img src=\"http://gd3.alicdn.com/imgextra/i3/12028739/T2gxKhXa8aXXXXXXXX_!!12028739.jpg\" width=\"49\" height=\"93\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top;\"/></td><td width=\"720\" style=\"margin: 0px; padding: 0px;\"><table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" width=\"720\" style=\"width: 678px;\"><tbody><tr><td align=\"center\" height=\"35\" width=\"65\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\"><span style=\"color: rgb(55, 59, 66);\">尺码</span></span></span><br/></td><td align=\"center\" width=\"65\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\"><span style=\"color: rgb(55, 59, 66);\">胸围</span></span></span></td><td align=\"center\" width=\"65\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\">全长</span></span></td><td align=\"center\" width=\"65\" style=\"margin: 0px; padding: 0px;\"><br/></td><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><br/></td></tr><tr><td align=\"center\" height=\"25\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\"><span style=\"color: rgb(55, 59, 66);\">160/S</span></span></span></td><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\"><span style=\"color: rgb(55, 59, 66);\">92CM</span></span></span></td><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\">87<span style=\"color: rgb(55, 59, 66);\">CM</span></span></span></td><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><br/></td><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><br/></td></tr><tr><td align=\"center\" height=\"25\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\"><span style=\"color: rgb(55, 59, 66);\">165/M</span></span></span></td><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\"><span style=\"color: rgb(55, 59, 66);\">96CM</span></span></span></td><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\">88<span style=\"color: rgb(55, 59, 66);\">CM</span></span></span></td><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><br/></td><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><br/></td></tr><tr><td align=\"center\" height=\"25\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\"><span style=\"color: rgb(55, 59, 66);\">170/L</span></span></span><br/></td><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\"><span style=\"color: rgb(55, 59, 66);\">100CM</span></span></span></td><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\">89<span style=\"color: rgb(55, 59, 66);\">CM</span></span></span></td><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><br/></td><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><br/></td></tr></tbody></table></td></tr></tbody></table><table align=\"center\" background=\"http://img03.taobaocdn.com/imgextra/i3/12028739/T21xGhXbtaXXXXXXXX_!!12028739.jpg\" cellpadding=\"0\" cellspacing=\"0\" width=\"820\" style=\"width: 678px;\"><tbody><tr><td align=\"center\" height=\"130\" valign=\"center\" width=\"100\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\"><img src=\"http://gd1.alicdn.com/imgextra/i1/12028739/T27hGhXblaXXXXXXXX_!!12028739.jpg\" width=\"49\" height=\"98\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top;\"/></span></span></td><td width=\"720\" style=\"margin: 0px; padding: 0px;\"><table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" width=\"720\" style=\"width: 678px;\"><tbody><tr><td align=\"center\" height=\"35\" width=\"65\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\">姓名</span></span></td><td align=\"center\" width=\"65\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\">肩宽</span></span></td><td align=\"center\" width=\"65\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\">胸围</span></span></td><td align=\"center\" width=\"65\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\">腰围</span></span></td><td align=\"center\" width=\"65\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\">身高</span></span></td><td align=\"center\" width=\"65\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\">体重</span></span></td><td align=\"center\" width=\"65\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\">平时穿</span></span></td><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><br/></td></tr><tr><td align=\"center\" height=\"25\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\">小慧</span></span></td><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\">37CM</span></span></td><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\">83CM</span></span></td><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\">66CM</span></span></td><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\">160CM</span></span></td><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\">45KG</span></span></td><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\">S</span></span></td><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\">穿160很舒适，透气，显气质</span></span><br/></td></tr><tr><td align=\"center\" height=\"25\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\">欢欢</span></span></td><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\">38CM</span></span></td><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\">86CM</span></span></td><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\">72CM</span></span></td><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\">164CM</span></span></td><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\">55KG</span></span></td><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\">M</span></span></td><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\">穿165合适，</span></span><span style=\"font-family: &#39;microsoft yahei&#39;;\">优雅魅惑</span><br/></td></tr><tr><td align=\"center\" height=\"12\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\">小宁</span></span></td><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\">38CM</span></span></td><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\">92CM</span></span></td><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\">74CM</span></span></td><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\">168CM</span></span></td><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\">59KG</span></span></td><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\">L</span></span></td><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 14px;\">穿170合适，</span></span><span style=\"font-family: &#39;microsoft yahei&#39;;\">时尚高贵</span><br/></td></tr></tbody></table></td></tr></tbody></table><p style=\"; ;\"><span style=\"line-height: 1.5; color: rgb(55, 59, 66);\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 12pt;\">&nbsp;</span></span></span><span style=\"color: rgb(251, 156, 156); line-height: 27px; font-family: &#39;microsoft yahei&#39;; font-size: 18px; background-color: rgb(55, 59, 66);\">食色美人</span></p><p style=\"text-align:center;; ;\"><span style=\"color: rgb(55, 59, 66);\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 12pt;\">浅浅的薄荷绿在轻薄的材质上，让人想起白雾茫茫水边散发的清香的薄荷</span></span></span></p><p style=\"text-align:center;; ;\"><span style=\"color: rgb(55, 59, 66);\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 12pt;\">有种飘渺的仙姿，清新娇嫩的感觉也很减龄哦</span></span></span></p><p style=\"text-align:center;; ;\"><span style=\"color: rgb(55, 59, 66);\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 12pt;\"></span><span style=\"font-size: 12pt; line-height: 1.5;\">浅咖色，有一种女性贵族的优雅，和品位感</span></span></span></p><p style=\"text-align:center;; ;\"><span style=\"color: rgb(55, 59, 66);\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 12pt;\">粉色的减龄效果最显著，有一种女性特有的甜美梦幻感，很可爱</span></span></span></p><p style=\"text-align:center;; ;\"><span style=\"color: rgb(55, 59, 66); line-height: 1.5; font-family: &#39;microsoft yahei&#39;; font-size: 12pt;\"></span></p><p style=\"text-align:center;; ;\">&nbsp;<img align=\"absmiddle\" src=\"http://gd3.alicdn.com/imgextra/i3/12028739/TB2xYIGXVXXXXcRXXXXXXXXXXXX-12028739.jpg\" width=\"800\" height=\"800\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top;\"/></p><p style=\"text-align:center;; ;\"><img align=\"absmiddle\" src=\"http://gd1.alicdn.com/imgextra/i1/12028739/TB2cp.GXVXXXXc_XXXXXXXXXXXX-12028739.jpg\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top; height: 400px; width: 400px; float: none;\"/><img align=\"absmiddle\" src=\"http://gd4.alicdn.com/imgextra/i4/12028739/TB2b4MHXVXXXXawXXXXXXXXXXXX-12028739.jpg\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top; height: 400px; width: 400px; float: none;\"/></p><p style=\"text-align:center;; ;\"><span style=\"color: rgb(55, 59, 66); line-height: 1.5;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 12pt;\">&nbsp;</span></span></span><span style=\"color: rgb(251, 156, 156); line-height: 27px; font-family: &#39;microsoft yahei&#39;; font-size: 18px; background-color: rgb(55, 59, 66);\">适穿</span><span style=\"color: rgb(251, 156, 156); line-height: 27px; font-family: &#39;microsoft yahei&#39;; font-size: 18px; background-color: rgb(55, 59, 66);\">场合</span></p><p style=\"text-align:center;; ;\"><span style=\"color: rgb(55, 59, 66);\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 12pt;\">搭配高跟、凉鞋穿着，有种清新怡人的仙姿，轻薄柔软的感觉很减龄</span></span></span></p><p style=\"text-align:center;; ;\"><span style=\"color: rgb(55, 59, 66);\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 12pt;\">别致的韵味，走到哪里都会广受欢迎，各种休闲场合都很合适</span></span></span></p><p style=\"text-align:center;; ;\"><span style=\"color: rgb(55, 59, 66);\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 12pt;\">约会、聚会穿很合适哦，迷人的仙姿让人着迷</span></span></span></p><span style=\"font-family: &#39;microsoft yahei&#39;;\"></span><p><span style=\"color: rgb(55, 59, 66);\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 12pt;\"></span></span></span></p><p><span style=\"color: rgb(55, 59, 66);\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"font-size: 12pt;\"></span></span></span></p></td></tr></tbody></table><table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" width=\"950\" style=\"width: 678px;\"><tbody><tr><td style=\"margin: 0px; padding: 0px;\"><table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" width=\"950\" style=\"width: 678px;\"><tbody><tr><td style=\"margin: 0px; padding: 0px;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><img src=\"http://gd2.alicdn.com/imgextra/i2/12028739/T2bD9hXlNaXXXXXXXX_!!12028739.jpg\" width=\"950\" height=\"71\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top;\"/></span></td></tr></tbody></table><table align=\"center\" background=\"http://img04.taobaocdn.com/imgextra/i4/12028739/T2An5hXmFaXXXXXXXX_!!12028739.jpg\" cellpadding=\"0\" cellspacing=\"0\" width=\"950\" style=\"width: 678px;\"><tbody><tr><td style=\"margin: 0px; padding: 0px;\"><table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" width=\"800\" style=\"width: 678px;\"><tbody><tr><td style=\"margin: 0px; padding: 0px;\"><p style=\"; ;\"><img align=\"absmiddle\" src=\"http://gd3.alicdn.com/imgextra/i3/12028739/TB2olZDXVXXXXa3XXXXXXXXXXXX-12028739.jpg\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top; height: 525px; width: 350px; float: none;\"/></p></td><td valign=\"top\" style=\"margin: 0px; padding: 0px;\"><table align=\"left\" cellpadding=\"0\" cellspacing=\"0\" width=\"350\"><tbody><tr><td height=\"150\" width=\"150\" style=\"margin: 0px; padding: 0px;\"><a target=\"_blank\" href=\"http://item.taobao.com/item.htm?spm=a1z10.1.w5003-7192315325.4.sOyeZn&amp;id=38601683247&amp;scene=taobao_shop\" style=\"text-decoration: none; color: rgb(51, 102, 204); margin: 0px; padding: 0px;\"><img alt=\"\" border=\"0\" width=\"150\" src=\"http://gd1.alicdn.com/bao/uploaded/i1/T1QaJ_FHtbXXXXXXXX_!!0-item_pic.jpg_400x400.jpg_.webp\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top; width: 230px; height: 230px; float: none;\"/></a></td><td style=\"margin: 0px; padding: 0px;\"><br/></td><td width=\"150\" style=\"margin: 0px; padding: 0px;\"><a target=\"_blank\" href=\"http://item.taobao.com/item.htm?spm=a1z10.3.w4002-3137526630.62.WxG4Mf&amp;id=38954086851\" style=\"text-decoration: none; color: rgb(51, 102, 204); margin: 0px; padding: 0px;\"><img alt=\"\" border=\"0\" width=\"150\" src=\"http://gd2.alicdn.com/bao/uploaded/i2/12028739/TB2lQMNXFXXXXXYXpXXXXXXXXXX-12028739.jpg_400x400.jpg_.webp\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top; width: 230px; height: 230px; float: none;\"/></a></td></tr><tr><td style=\"margin: 0px; padding: 0px; text-align: center;\"><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"color: rgb(55, 59, 66);\">&nbsp;搭配1：Q6110绣花牛仔两件套</span></span></td><td style=\"margin: 0px; padding: 0px; text-align: center;\"><br/></td><td style=\"margin: 0px; padding: 0px; text-align: center;\"><span style=\"color: rgb(55, 59, 66);\"><span style=\"font-family: &#39;microsoft yahei&#39;;\">&nbsp;搭配2：</span><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"line-height: 1.5;\">Q6330</span><span style=\"line-height: 1.5;\">印花宽松连衣裙</span></span></span></td></tr><tr><td height=\"150\" width=\"150\" style=\"margin: 0px; padding: 0px;\"><a target=\"_blank\" href=\"http://item.taobao.com/item.htm?spm=110-Uye-1*011.4zSd-4HdeU.h-lrfEV&amp;id=15334744700&amp;\" style=\"text-decoration: none; color: rgb(51, 102, 204); margin: 0px; padding: 0px;\"></a><a target=\"_blank\" href=\"http://item.taobao.com/item.htm?spm=a1z10.1.w5003-7324653400.7.sOyeZn&amp;id=39036849073&amp;scene=taobao_shop\" style=\"text-decoration: none; color: rgb(51, 102, 204); margin: 0px; padding: 0px;\"><img alt=\"\" border=\"0\" width=\"150\" src=\"http://gd1.alicdn.com/bao/uploaded/i1/T11LIcFKVaXXXXXXXX_!!0-item_pic.jpg_400x400.jpg_.webp\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top; width: 230px; height: 230px; float: none;\"/></a></td><td style=\"margin: 0px; padding: 0px;\"><br/></td><td style=\"margin: 0px; padding: 0px;\"><a target=\"_blank\" href=\"http://item.taobao.com/item.htm?spm=a1z10.3.w4002-3137526630.66.obkCZH&amp;id=39605412964\" style=\"text-decoration: none; color: rgb(51, 102, 204); margin: 0px; padding: 0px;\"><img align=\"absMiddle\" border=\"0\" src=\"http://gd3.alicdn.com/bao/uploaded/i3/12028739/TB2_iqSXVXXXXaCXXXXXXXXXXXX-12028739.jpg_400x400.jpg_.webp\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top; height: 230px; width: 230px; float: none;\"/></a><a target=\"_blank\" href=\"http://item.taobao.com/item.htm?spm=110-Uye-1*011.4zSd-4HdeU.h-lrfEV&amp;id=15334712849&amp;\" style=\"text-decoration: none; color: rgb(51, 102, 204); margin: 0px; padding: 0px;\"></a></td></tr><tr><td style=\"margin: 0px; padding: 0px; text-align: center;\"><span style=\"color: rgb(55, 59, 66);\"><span style=\"font-family: &#39;microsoft yahei&#39;;\">搭配3：Y3225印花上衣半裙两件套</span></span><br/></td><td style=\"margin: 0px; padding: 0px;\"><br/></td><td style=\"margin: 0px; padding: 0px; text-align: center;\"><span style=\"color: rgb(55, 59, 66);\"><span style=\"font-family: &#39;microsoft yahei&#39;;\">搭配4：</span><span style=\"font-family: &#39;microsoft yahei&#39;;\"><span style=\"line-height: 1.5;\">Q6472</span><span style=\"line-height: 1.5;\">真丝三件套连衣裙</span></span></span></td></tr></tbody></table></td></tr></tbody></table><p style=\"; ;\">&nbsp;</p></td></tr></tbody></table></td></tr></tbody></table><table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" width=\"950\" style=\"width: 678px;\"><tbody><tr><td style=\"margin: 0px; padding: 0px;\"><img src=\"http://gd2.alicdn.com/imgextra/i2/12028739/T2NnWhXXtbXXXXXXXX_!!12028739.jpg\" width=\"950\" height=\"112\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top;\"/></td></tr></tbody></table><table align=\"center\" background=\"http://img04.taobaocdn.com/imgextra/i4/12028739/T2An5hXmFaXXXXXXXX_!!12028739.jpg\" cellpadding=\"0\" cellspacing=\"0\" width=\"950\" style=\"width: 678px;\"><tbody><tr><td align=\"center\" style=\"margin: 0px; padding: 0px;\"><p style=\"; ;\"><span style=\"line-height: 1.5;\"></span></p><p style=\"; ;\"><span style=\"color: rgb(251, 156, 156); line-height: 27px; font-family: &#39;microsoft yahei&#39;; background-color: rgb(55, 59, 66);\"></span></p><p style=\"; ;\"><span style=\"color: rgb(55, 59, 66);\"><strong><span style=\"font-family: &#39;microsoft yahei&#39;;\"></span></strong></span></p><p><span style=\"line-height: 1.5;\">&nbsp;</span></p><p style=\"; ;\">&nbsp;<img align=\"absmiddle\" src=\"http://gd3.alicdn.com/imgextra/i3/12028739/TB2onkFXVXXXXb1XXXXXXXXXXXX-12028739.jpg\" width=\"800\" height=\"530\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top;\"/></p><p style=\"; ;\"><img align=\"absmiddle\" src=\"http://gd1.alicdn.com/imgextra/i1/12028739/TB2keUHXVXXXXavXXXXXXXXXXXX-12028739.jpg\" width=\"800\" height=\"530\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top;\"/></p><p style=\"; ;\"><img align=\"absmiddle\" src=\"http://gd2.alicdn.com/imgextra/i2/12028739/TB28LUIXVXXXXXLXXXXXXXXXXXX-12028739.jpg\" width=\"800\" height=\"530\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top;\"/></p><p style=\"; ;\"><img align=\"absmiddle\" src=\"http://gd1.alicdn.com/imgextra/i1/12028739/TB2g0AGXVXXXXcKXXXXXXXXXXXX-12028739.jpg\" width=\"800\" height=\"530\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top;\"/></p><p style=\"; ;\"><img align=\"absmiddle\" src=\"http://gd1.alicdn.com/imgextra/i1/12028739/TB2b6wIXVXXXXXoXXXXXXXXXXXX-12028739.jpg\" width=\"800\" height=\"530\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top;\"/></p><p style=\"; ;\"><img align=\"absmiddle\" src=\"http://gd4.alicdn.com/imgextra/i4/12028739/TB2czQGXVXXXXb6XXXXXXXXXXXX-12028739.jpg\" width=\"800\" height=\"630\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top;\"/></p><p style=\"; ;\"><img align=\"absmiddle\" src=\"http://gd2.alicdn.com/imgextra/i2/12028739/TB2VQEFXVXXXXX2XpXXXXXXXXXX-12028739.jpg\" width=\"800\" height=\"530\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top;\"/></p><p style=\"; ;\"><img align=\"absmiddle\" src=\"http://gd1.alicdn.com/imgextra/i1/12028739/TB288ZGXVXXXXbeXXXXXXXXXXXX-12028739.jpg\" width=\"800\" height=\"630\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top;\"/></p><p style=\"; ;\"><img align=\"absmiddle\" src=\"http://gd4.alicdn.com/imgextra/i4/12028739/TB2yHgHXVXXXXaLXXXXXXXXXXXX-12028739.jpg\" width=\"800\" height=\"530\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top;\"/></p><p style=\"; ;\"><img align=\"absmiddle\" src=\"http://gd3.alicdn.com/imgextra/i3/12028739/TB2nhsIXVXXXXXkXXXXXXXXXXXX-12028739.jpg\" width=\"800\" height=\"530\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top;\"/></p><p style=\"; ;\"><img align=\"absmiddle\" src=\"http://gd4.alicdn.com/imgextra/i4/12028739/TB21VgIXVXXXXX4XXXXXXXXXXXX-12028739.jpg\" width=\"800\" height=\"630\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top;\"/></p><p style=\"; ;\"><img align=\"absmiddle\" src=\"http://gd2.alicdn.com/imgextra/i2/12028739/TB2.XcIXVXXXXaDXXXXXXXXXXXX-12028739.jpg\" width=\"800\" height=\"530\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top;\"/></p><p style=\"; ;\"><img align=\"absmiddle\" src=\"http://gd1.alicdn.com/imgextra/i1/12028739/TB2a4EIXVXXXXXCXXXXXXXXXXXX-12028739.jpg\" width=\"800\" height=\"630\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top;\"/></p><p style=\"; ;\"><img align=\"absmiddle\" src=\"http://gd1.alicdn.com/imgextra/i1/12028739/TB2llAGXVXXXXbHXXXXXXXXXXXX-12028739.jpg\" width=\"800\" height=\"530\" style=\"border: 0px; margin: 0px; padding: 0px; vertical-align: top;\"/></p><p style=\"; ;\"><span style=\"color: rgb(251, 156, 156); line-height: 27px; font-family: &#39;microsoft yahei&#39;; background-color: rgb(55, 59, 66);\">洗涤保养说明</span></p></td></tr></tbody></table><p><br/></p>','1406369196.png',0,0,'X;L;M');
/*!40000 ALTER TABLE `clothes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `indexpic`
--

DROP TABLE IF EXISTS `indexpic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indexpic` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `create_time` datetime NOT NULL,
  `view` int(11) NOT NULL DEFAULT '1' COMMENT '是否显示\n1显示\n0不显示\n按时间排序取前x张值为\n1的',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='首页大图片';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indexpic`
--

LOCK TABLES `indexpic` WRITE;
/*!40000 ALTER TABLE `indexpic` DISABLE KEYS */;
INSERT INTO `indexpic` VALUES (0,'首页','1406611884.jpeg','2014-07-29 13:31:00',1),(1,'科比','1406611904.jpg','2014-07-29 13:31:00',1);
/*!40000 ALTER TABLE `indexpic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_name` varchar(45) NOT NULL,
  `goods_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(45) NOT NULL,
  `create_time` datetime NOT NULL,
  `goods_type` int(11) NOT NULL COMMENT '0:衣服\n1:纪念品',
  `order_status` tinyint(1) NOT NULL COMMENT 'type=0\n0:订单成功正在配送\n1:配送成功未返回\n2:返回成功未评论\n3:评论成功交易完成\ntype=1\n',
  `message` text,
  `express_id` varchar(60) DEFAULT NULL COMMENT '快递号',
  `address_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photographs`
--

DROP TABLE IF EXISTS `photographs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photographs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `sort_id` int(11) NOT NULL,
  `phototeam_id` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `description` text NOT NULL,
  `school_id` int(11) NOT NULL,
  `school` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_school` (`school_id`),
  KEY `fk_team` (`phototeam_id`),
  CONSTRAINT `fk_school` FOREIGN KEY (`school_id`) REFERENCES `area` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_team` FOREIGN KEY (`phototeam_id`) REFERENCES `phototeam` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='摄影作品展示';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photographs`
--

LOCK TABLES `photographs` WRITE;
/*!40000 ALTER TABLE `photographs` DISABLE KEYS */;
INSERT INTO `photographs` VALUES (1,'电子科大毕业季','1405361416.jpg',1,1,'2014-07-15 02:10:00','描述描述描述',5,'电子科技大学'),(2,'龙猫龙猫','1405404645.jpg',2,1,'2014-07-15 14:10:00','我还是一只龙猫',5,'电子科技大学');
/*!40000 ALTER TABLE `photographs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phototeam`
--

DROP TABLE IF EXISTS `phototeam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phototeam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team_name` varchar(120) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `QQ` varchar(20) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='摄影团队信息表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phototeam`
--

LOCK TABLES `phototeam` WRITE;
/*!40000 ALTER TABLE `phototeam` DISABLE KEYS */;
INSERT INTO `phototeam` VALUES (1,'电子科大摄影团队','12345678900','123456','123456@qq.com');
/*!40000 ALTER TABLE `phototeam` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sent_spot`
--

DROP TABLE IF EXISTS `sent_spot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sent_spot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `spot_name` varchar(45) NOT NULL,
  `sent_area` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `area_id` (`id`),
  CONSTRAINT `area_id` FOREIGN KEY (`id`) REFERENCES `area` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sent_spot`
--

LOCK TABLES `sent_spot` WRITE;
/*!40000 ALTER TABLE `sent_spot` DISABLE KEYS */;
/*!40000 ALTER TABLE `sent_spot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sort`
--

DROP TABLE IF EXISTS `sort`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sort` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sort_name` varchar(50) NOT NULL,
  `sort_type` tinyint(1) NOT NULL COMMENT '0是衣服\n1是纪念品\n2是作品',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='衣服和纪念品分类信息表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sort`
--

LOCK TABLES `sort` WRITE;
/*!40000 ALTER TABLE `sort` DISABLE KEYS */;
INSERT INTO `sort` VALUES (1,'毕业季',2),(2,'新生入学',2),(3,'情人节',2),(4,'文化照片',1),(5,'男士正装',0),(6,'女士服装',0);
/*!40000 ALTER TABLE `sort` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `souvenir`
--

DROP TABLE IF EXISTS `souvenir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `souvenir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `price` float NOT NULL,
  `reduce_price` float NOT NULL COMMENT '优惠价格',
  `is_reduce` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否优惠\n0不优惠\n1优惠',
  `area_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `school` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `sort_id` int(11) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `sale_count` int(11) NOT NULL DEFAULT '0',
  `comment_count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_area` (`area_id`),
  CONSTRAINT `fk_area` FOREIGN KEY (`area_id`) REFERENCES `area` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='纪念品';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `souvenir`
--

LOCK TABLES `souvenir` WRITE;
/*!40000 ALTER TABLE `souvenir` DISABLE KEYS */;
INSERT INTO `souvenir` VALUES (2,'小熊',30,20,0,3,5,'','电子科大纪念品',4,'1406046041.jpg',0,0);
/*!40000 ALTER TABLE `souvenir` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `password` varchar(32) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `QQ` varchar(20) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL COMMENT '头像图片',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='用户信息表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','admin','e10adc3949ba59abbe56e057f20f883e','123456','123456@qq.com','123456','1406103044.jpg'),(2,'scfate',NULL,'e10adc3949ba59abbe56e057f20f883e','123456','123456@qq.com',NULL,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userpic`
--

DROP TABLE IF EXISTS `userpic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userpic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `picture` varchar(100) COLLATE utf8_bin NOT NULL,
  `create_time` datetime NOT NULL,
  `title` varchar(45) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin,
  PRIMARY KEY (`id`),
  KEY `userpic` (`userid`),
  CONSTRAINT `userpic` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='用户图片时间轴';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userpic`
--

LOCK TABLES `userpic` WRITE;
/*!40000 ALTER TABLE `userpic` DISABLE KEYS */;
/*!40000 ALTER TABLE `userpic` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-07-31 11:56:09
