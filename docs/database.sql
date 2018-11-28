-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema BeerTime
-- -----------------------------------------------------
-- Evénementiels sur les bières

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
CREATE TABLE IF NOT EXISTS `BeerTime`.`t_user` (
  `iduser` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `createddate` DATETIME NOT NULL DEFAULT NOW(),
  `role` VARCHAR(255) NULL,
  `connected` TINYINT NOT NULL DEFAULT 0,
  PRIMARY KEY (`iduser`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BeerTime`.`t_address`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BeerTime`.`t_address` (
  `idaddress` INT NOT NULL AUTO_INCREMENT,
  `adress` VARCHAR(255) NOT NULL,
  `zipcode` VARCHAR(10) NOT NULL,
  `town` VARCHAR(255) NOT NULL,
  `country` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idaddress`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BeerTime`.`t_event`
-- -----------------------------------------------------
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
  PRIMARY KEY (`idevent`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BeerTime`.`t_program`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BeerTime`.`t_program` (
  `idevent` INT NOT NULL,
  `idprogram` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `description` VARCHAR(255) NULL,
  `timeperiod` VARCHAR(45) NULL,
  `price` DECIMAL(5,2) NULL DEFAULT 0,
  PRIMARY KEY (`idprogram`, `title`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BeerTime`.`t_tags`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BeerTime`.`t_tags` (
  `idtag` INT NOT NULL AUTO_INCREMENT,
  `tags` VARCHAR(45) NOT NULL,
  `icon` VARCHAR(255) NULL,
  PRIMARY KEY (`idtag`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BeerTime`.`t_participant`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BeerTime`.`t_participant` (
  `idevent` INT NOT NULL,
  `iduser` INT NOT NULL,
  `idtag` INT NOT NULL,
  `reservationnumber` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idevent`, `iduser`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
