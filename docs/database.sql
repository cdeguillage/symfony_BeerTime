-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema BeerTime
-- -----------------------------------------------------
-- Evénementiels sur les bières
DROP SCHEMA IF EXISTS `BeerTime` ;

-- -----------------------------------------------------
-- Schema BeerTime
--
-- Evénementiels sur les bières
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `BeerTime` DEFAULT CHARACTER SET utf8 ;
USE `BeerTime` ;

-- -----------------------------------------------------
-- Table `BeerTime`.`t_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `BeerTime`.`t_user` ;

CREATE TABLE IF NOT EXISTS `BeerTime`.`t_user` (
  `iduser` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `createddate` DATETIME NOT NULL DEFAULT NOW(),
  `roles` LONGTEXT NOT NULL COMMENT '(DC2Type:array)',
  `connected` TINYINT NOT NULL DEFAULT 0,
  PRIMARY KEY (`iduser`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BeerTime`.`t_address`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `BeerTime`.`t_address` ;

CREATE TABLE IF NOT EXISTS `BeerTime`.`t_address` (
  `idaddress` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `street` VARCHAR(255) NOT NULL,
  `zipcode` VARCHAR(10) NOT NULL,
  `town` VARCHAR(255) NOT NULL,
  `country` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idaddress`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BeerTime`.`t_event`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `BeerTime`.`t_event` ;

CREATE TABLE IF NOT EXISTS `BeerTime`.`t_event` (
  `idevent` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `description` VARCHAR(255) NOT NULL,
  `dateevent_start` DATETIME NOT NULL,
  `dateevent_end` DATETIME NOT NULL,
  `price` DECIMAL(5,2) NULL DEFAULT 0,
  `idaddress` INT NOT NULL,
  `idusercreate` INT NOT NULL,
  `createddate` DATETIME NOT NULL DEFAULT NOW(),
  PRIMARY KEY (`idevent`),
  CONSTRAINT `fk_t_event_t_address`
    FOREIGN KEY (`idaddress`)
    REFERENCES `BeerTime`.`t_address` (`idaddress`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_t_event_t_user1`
    FOREIGN KEY (`idusercreate`)
    REFERENCES `BeerTime`.`t_user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BeerTime`.`t_program`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `BeerTime`.`t_program` ;

CREATE TABLE IF NOT EXISTS `BeerTime`.`t_program` (
  `idevent` INT NOT NULL,
  `idprogram` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `description` VARCHAR(255) NULL,
  `timeperiod_start` VARCHAR(45) NOT NULL,
  `timeperiod_end` VARCHAR(45) NOT NULL,
  `price` DECIMAL(5,2) NULL DEFAULT 0,
  PRIMARY KEY (`idprogram`, `title`),
  CONSTRAINT `fk_t_program_t_event1`
    FOREIGN KEY (`idevent`)
    REFERENCES `BeerTime`.`t_event` (`idevent`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BeerTime`.`t_tags`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `BeerTime`.`t_tags` ;

CREATE TABLE IF NOT EXISTS `BeerTime`.`t_tags` (
  `idtag` INT NOT NULL AUTO_INCREMENT,
  `tags` VARCHAR(45) NOT NULL,
  `icon` VARCHAR(255) NULL,
  PRIMARY KEY (`idtag`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BeerTime`.`t_participant`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `BeerTime`.`t_participant` ;

CREATE TABLE IF NOT EXISTS `BeerTime`.`t_participant` (
  `idevent` INT NOT NULL,
  `iduser` INT NOT NULL,
  `idtag` INT NOT NULL,
  `bookingnumber` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idevent`, `iduser`),
  CONSTRAINT `fk_t_event_has_t_user_t_event1`
    FOREIGN KEY (`idevent`)
    REFERENCES `BeerTime`.`t_event` (`idevent`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_t_event_has_t_user_t_user1`
    FOREIGN KEY (`iduser`)
    REFERENCES `BeerTime`.`t_user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_t_participant_t_tags1`
    FOREIGN KEY (`idtag`)
    REFERENCES `BeerTime`.`t_tags` (`idtag`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
