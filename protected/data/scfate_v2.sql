SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

ALTER TABLE `scfate`.`order` ADD COLUMN `address_id` INT(11) NULL DEFAULT NULL  AFTER `express_id` ;

ALTER TABLE `scfate`.`clothes` DROP COLUMN `picture` , ADD COLUMN `piture` VARCHAR(100) NOT NULL  AFTER `description` ;

CREATE  TABLE IF NOT EXISTS `scfate`.`comment` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `user_id` INT(11) NOT NULL ,
  `username` VARCHAR(45) NOT NULL ,
  `content` TEXT NOT NULL ,
  `create_time` DATETIME NOT NULL ,
  `goods_id` INT(11) NOT NULL ,
  `goods_type` TINYINT(1) NOT NULL COMMENT '0是衣服\n1是纪念品' ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_user` (`user_id` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci
COMMENT = '反馈评论表';

ALTER TABLE `scfate`.`photographs` DROP COLUMN `picture` , ADD COLUMN `piture` VARCHAR(100) NOT NULL  AFTER `title` ;

CREATE  TABLE IF NOT EXISTS `scfate`.`cart` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `user_id` INT(11) NULL DEFAULT NULL ,
  `goods_id` INT(11) NULL DEFAULT NULL COMMENT '商品或者衣服id' ,
  `type` TINYINT(4) NULL DEFAULT NULL COMMENT '商品类型\n0为衣服\n1为纪念品' ,
  `size` VARCHAR(40) NULL DEFAULT NULL COMMENT '若为衣服。则表示衣服型号' ,
  `amount` INT(11) NULL DEFAULT NULL ,
  `create_time` DATETIME NULL DEFAULT NULL COMMENT '创建时间' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci
COMMENT = '购物车';


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
