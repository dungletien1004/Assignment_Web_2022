-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema ltw
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ltw
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ltw` DEFAULT CHARACTER SET utf8 ;
USE `ltw` ;

-- -----------------------------------------------------
-- Table `ltw`.`cart`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ltw`.`cart` (
  `cart_id` INT NOT NULL,
  `total_price` DECIMAL NULL,
  PRIMARY KEY (`cart_id`));


-- -----------------------------------------------------
-- Table `ltw`.`customer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ltw`.`customer` (
  `customerID` INT NOT NULL,
  `phone` VARCHAR(15) NULL,
  `email` VARCHAR(100) NULL,
  `fullname` VARCHAR(100) NULL,
  `username` VARCHAR(100) NULL,
  `password` VARCHAR(100) NULL,
  `gender` ENUM('Male', 'Female', 'Others') NULL,
  `cart_cart_id` INT NOT NULL,
  `address` VARCHAR(200),
  PRIMARY KEY (`customerID`),
  INDEX `fk_customer_cart_idx` (`cart_cart_id` ASC) VISIBLE,
  CONSTRAINT `fk_customer_cart`
    FOREIGN KEY (`cart_cart_id`)
    REFERENCES `ltw`.`cart` (`cart_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `ltw`.`products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ltw`.`products` (
  `product_id` INT NOT NULL,
  `discription` VARCHAR(1000) NULL,
  `product_image` LONGTEXT NULL COMMENT 'This one stores the relative path to the image of local folder\n',
  `unit_price` DECIMAL NULL,
  `name` VARCHAR(100) NULL,
  PRIMARY KEY (`product_id`));


-- -----------------------------------------------------
-- Table `ltw`.`product_in_cart`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ltw`.`product_in_cart` (
  `quantity` DECIMAL NOT NULL,
  `cart_cart_id` INT NOT NULL,
  `products_product_id1` INT NOT NULL,
  `size` ENUM('S', 'M', 'L', 'XL', 'XXL', 'XXXL') NOT NULL,
  `order_id` INT,
  PRIMARY KEY (`cart_cart_id`, `products_product_id1`),
  INDEX `fk_product_in_cart_cart1_idx` (`cart_cart_id` ASC) VISIBLE,
  INDEX `fk_product_in_cart_products1_idx` (`products_product_id1` ASC) VISIBLE,
  CONSTRAINT `fk_product_in_cart_cart1`
    FOREIGN KEY (`cart_cart_id`)
    REFERENCES `ltw`.`cart` (`cart_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_product_in_cart_products1`
    FOREIGN KEY (`products_product_id1`)
    REFERENCES `ltw`.`products` (`product_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
  CONSTRAINT `fk_order_id`
    FOREIGN KEY (`order_id`)
    REFERENCES `ltw`.`order` (`orderID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION

-- -----------------------------------------------------
-- Table `ltw`.`order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ltw`.`order` (
  `orderID` INT NOT NULL,
  `TotalPrice` DECIMAL UNSIGNED NOT NULL,
  `product_in_cart_cart_cart_id` INT NOT NULL,
  `product_in_cart_products_product_id` INT NOT NULL,
  `customer_customer_id` INT NOT NULL,
  `order_address` VARCHAR(200) NOT NULL,
  `state` ENUM('0', '1') NOT NULL,
  PRIMARY KEY (`orderID`),
  INDEX `fk_order_product_in_cart1_idx` (`product_in_cart_cart_cart_id` ASC, `product_in_cart_products_product_id` ASC) VISIBLE,
  CONSTRAINT `fk_order_product_in_cart1`
    FOREIGN KEY (`product_in_cart_cart_cart_id` , `product_in_cart_products_product_id`)
    REFERENCES `ltw`.`product_in_cart` (`cart_cart_id` , `products_product_id1`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `ltw`.`feedback`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ltw`.`feedback` (
  `feedback_id` INT NOT NULL,
  `comment` MEDIUMTEXT NOT NULL,
  `star` ENUM('1', '2', '3', '4', '5') NOT NULL,
  `products_product_id` INT NOT NULL,
  `customer_customer_id` INT NOT NULL,
  PRIMARY KEY (`feedback_id`, `customer_customer_id`),
  INDEX `fk_feedback_products1_idx` (`products_product_id` ASC) VISIBLE,
  INDEX `fk_feedback_customer1_idx` (`customer_customer_id` ASC) VISIBLE,
  CONSTRAINT `fk_feedback_products1`
    FOREIGN KEY (`products_product_id`)
    REFERENCES `ltw`.`products` (`product_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_feedback_customer1`
    FOREIGN KEY (`customer_customer_id`)
    REFERENCES `ltw`.`customer` (`customerID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `ltw`.`admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ltw`.`admin` (
  `admin_id` INT NOT NULL,
  `username` VARCHAR(255) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NULL,
  PRIMARY KEY (`admin_id`));


-- -----------------------------------------------------
-- Table `ltw`.`News`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ltw`.`News` (
  `news_id` INT NOT NULL,
  `content` LONGTEXT NULL,
  `Newscol` VARCHAR(45) NULL,
  PRIMARY KEY (`news_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ltw`.`product_edit_history`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ltw`.`product_edit_history` (
  `admin_admin_id` INT NOT NULL,
  `products_product_id` INT NOT NULL,
  INDEX `fk_product_edit_history_admin1_idx` (`admin_admin_id` ASC) VISIBLE,
  INDEX `fk_product_edit_history_products1_idx` (`products_product_id` ASC) VISIBLE,
  CONSTRAINT `fk_product_edit_history_admin1`
    FOREIGN KEY (`admin_admin_id`)
    REFERENCES `ltw`.`admin` (`admin_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_product_edit_history_products1`
    FOREIGN KEY (`products_product_id`)
    REFERENCES `ltw`.`products` (`product_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ltw`.`news_edit_history`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ltw`.`news_edit_history` (
  `admin_admin_id` INT NOT NULL,
  `News_news_id` INT NOT NULL,
  INDEX `fk_news_edit_history_admin1_idx` (`admin_admin_id` ASC) VISIBLE,
  INDEX `fk_news_edit_history_News1_idx` (`News_news_id` ASC) VISIBLE,
  PRIMARY KEY (`News_news_id`, `admin_admin_id`),
  CONSTRAINT `fk_news_edit_history_admin1`
    FOREIGN KEY (`admin_admin_id`)
    REFERENCES `ltw`.`admin` (`admin_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_news_edit_history_News1`
    FOREIGN KEY (`News_news_id`)
    REFERENCES `ltw`.`News` (`news_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
