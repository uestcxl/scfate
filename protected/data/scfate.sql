SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `scfate` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `scfate` ;

-- -----------------------------------------------------
-- Table `scfate`.`user`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `scfate`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(45) NOT NULL ,
  `name` VARCHAR(45) NULL ,
  `password` VARCHAR(32) NOT NULL ,
  `phone` VARCHAR(11) NOT NULL ,
  `mail` VARCHAR(40) NOT NULL ,
  `QQ` VARCHAR(20) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci
COMMENT = '用户信息表';


-- -----------------------------------------------------
-- Table `scfate`.`address`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `scfate`.`address` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `userid` INT NOT NULL ,
  `province` VARCHAR(45) NOT NULL ,
  `city` VARCHAR(45) NOT NULL ,
  `school` VARCHAR(45) NOT NULL ,
  `detail` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  `zipcode` VARCHAR(45) NOT NULL ,
  `receipter` VARCHAR(45) NOT NULL ,
  `default` INT NOT NULL DEFAULT 0 COMMENT '是否为默认地址\n0不是\n1是' ,
  `phone` VARCHAR(11) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_address_1` (`userid` ASC) ,
  CONSTRAINT `fk_address_1`
    FOREIGN KEY (`userid` )
    REFERENCES `scfate`.`user` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci
COMMENT = '用户收获地址表';


-- -----------------------------------------------------
-- Table `scfate`.`order`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `scfate`.`order` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `goods_name` VARCHAR(45) NOT NULL ,
  `goods_id` INT NOT NULL ,
  `price` FLOAT NOT NULL ,
  `user_id` INT NOT NULL ,
  `user_name` VARCHAR(45) NOT NULL ,
  `create_time` DATETIME NOT NULL ,
  `goods_type` INT NOT NULL COMMENT '0:衣服\n1:纪念品' ,
  `order_status` TINYINT(1) NOT NULL COMMENT 'type=0\n0:订单成功正在配送\n1:配送成功未返回\n2:返回成功未评论\n3:评论成功交易完成\ntype=1\n' ,
  `message` TEXT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci
COMMENT = '订单表';


-- -----------------------------------------------------
-- Table `scfate`.`userpic`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `scfate`.`userpic` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `userid` INT NOT NULL ,
  `picture` VARCHAR(100) NOT NULL ,
  `create_time` DATETIME NOT NULL ,
  `title` VARCHAR(45) NOT NULL ,
  `description` TEXT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `userpic` (`userid` ASC) ,
  CONSTRAINT `userpic`
    FOREIGN KEY (`userid` )
    REFERENCES `scfate`.`user` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci
COMMENT = '用户图片时间轴';


-- -----------------------------------------------------
-- Table `scfate`.`indexpic`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `scfate`.`indexpic` (
  `id` INT NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `picture` VARCHAR(100) NOT NULL ,
  `create_time` DATETIME NOT NULL ,
  `view` INT NOT NULL DEFAULT 1 COMMENT '是否显示\n1显示\n0不显示\n按时间排序取前x张值为\n1的' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci
COMMENT = '首页大图片';


-- -----------------------------------------------------
-- Table `scfate`.`announcement`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `scfate`.`announcement` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `content` TEXT NOT NULL ,
  `create_time` DATETIME NOT NULL ,
  `title` VARCHAR(50) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci
COMMENT = '首页公告';


-- -----------------------------------------------------
-- Table `scfate`.`clothes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `scfate`.`clothes` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `clothesname` VARCHAR(45) NOT NULL ,
  `rent` INT NOT NULL ,
  `cash_pledge` INT NOT NULL COMMENT '押金' ,
  `reserve` INT NOT NULL COMMENT '库存' ,
  `sort_id` INT NOT NULL ,
  `description` TEXT NOT NULL ,
  `piture` VARCHAR(100) NOT NULL ,
  `comment_count` INT NOT NULL DEFAULT 0 COMMENT '评论数量' ,
  `sale_count` INT NOT NULL DEFAULT 0 COMMENT '租赁次数' ,
  `size` VARCHAR(40) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci
COMMENT = '服装信息表';


-- -----------------------------------------------------
-- Table `scfate`.`comment`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `scfate`.`comment` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NOT NULL ,
  `username` VARCHAR(45) NOT NULL ,
  `content` TEXT NOT NULL ,
  `create_time` DATETIME NOT NULL ,
  `goods_id` INT NOT NULL ,
  `goods_type` TINYINT(1) NOT NULL COMMENT '0是衣服\n1是纪念品' ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_user` (`user_id` ASC) ,
  CONSTRAINT `fk_user`
    FOREIGN KEY (`user_id` )
    REFERENCES `scfate`.`user` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci
COMMENT = '反馈评论表';


-- -----------------------------------------------------
-- Table `scfate`.`area`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `scfate`.`area` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `parent_id` INT NOT NULL ,
  `area_name` VARCHAR(45) NOT NULL ,
  `area_type` TINYINT(1) NOT NULL COMMENT '0是国家\n1是省份\n2是市\n3是区\n4是学校' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `scfate`.`souvenir`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `scfate`.`souvenir` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `price` FLOAT NOT NULL ,
  `reduce_price` FLOAT NOT NULL COMMENT '优惠价格' ,
  `is_reduce` TINYINT(1) NOT NULL DEFAULT 0 COMMENT '是否优惠\n0不优惠\n1优惠' ,
  `area_id` INT NOT NULL ,
  `school_id` INT NOT NULL ,
  `school` VARCHAR(45) NOT NULL ,
  `description` TEXT NOT NULL ,
  `sort_id` INT NOT NULL ,
  `picture` VARCHAR(100) NOT NULL ,
  `sale_count` INT NOT NULL DEFAULT 0 ,
  `comment_count` INT NOT NULL DEFAULT 0 ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_area` (`area_id` ASC) ,
  CONSTRAINT `fk_area`
    FOREIGN KEY (`area_id` )
    REFERENCES `scfate`.`area` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci
COMMENT = '纪念品';


-- -----------------------------------------------------
-- Table `scfate`.`sort`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `scfate`.`sort` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `sort_name` VARCHAR(50) NOT NULL ,
  `sort_type` TINYINT(1) NOT NULL COMMENT '0是衣服\n1是纪念品\n2是作品' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci
COMMENT = '衣服和纪念品分类信息表';


-- -----------------------------------------------------
-- Table `scfate`.`phototeam`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `scfate`.`phototeam` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `team_name` VARCHAR(120) NOT NULL ,
  `phone` VARCHAR(11) NOT NULL ,
  `QQ` VARCHAR(20) NULL ,
  `email` VARCHAR(60) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci
COMMENT = '摄影团队信息表';


-- -----------------------------------------------------
-- Table `scfate`.`photographs`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `scfate`.`photographs` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(50) NOT NULL ,
  `piture` VARCHAR(100) NOT NULL ,
  `sort_id` INT NOT NULL ,
  `phototeam_id` INT NOT NULL ,
  `create_time` DATETIME NOT NULL ,
  `description` TEXT NOT NULL ,
  `school_id` INT NOT NULL ,
  `school` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_school` (`school_id` ASC) ,
  INDEX `fk_team` (`phototeam_id` ASC) ,
  CONSTRAINT `fk_school`
    FOREIGN KEY (`school_id` )
    REFERENCES `scfate`.`area` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_team`
    FOREIGN KEY (`phototeam_id` )
    REFERENCES `scfate`.`phototeam` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci
COMMENT = '摄影作品展示';



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
