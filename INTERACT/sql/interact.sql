-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema interact
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema interact
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `interact` DEFAULT CHARACTER SET utf8 ;
USE `interact` ;

-- -----------------------------------------------------
-- Table `interact`.`admin`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `interact`.`admin` ;

CREATE TABLE IF NOT EXISTS `interact`.`admin` (
  `idadmin` INT NOT NULL AUTO_INCREMENT,
  `epost` VARCHAR(45) NOT NULL,
  `passord` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idadmin`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `interact`.`cases`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `interact`.`cases` ;

CREATE TABLE IF NOT EXISTS `interact`.`cases` (
  `idcases` INT NOT NULL AUTO_INCREMENT,
  `bilde` VARCHAR(255) NULL,
  `tittel` VARCHAR(45) NOT NULL,
  `publisert` TINYINT NOT NULL,
  `dato` DATETIME NOT NULL,
  `tekst` TEXT(2000) NOT NULL,
  PRIMARY KEY (`idcases`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `interact`.`nodes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `interact`.`nodes` ;

CREATE TABLE IF NOT EXISTS `interact`.`nodes` (
  `idnodes` INT NOT NULL AUTO_INCREMENT,
  `bilde` VARCHAR(255) NULL,
  `overskrift` VARCHAR(45) NOT NULL,
  `cases_idcases` INT NOT NULL,
  PRIMARY KEY (`idnodes`, `cases_idcases`),
  INDEX `fk_nodes_cases1_idx` (`cases_idcases` ASC),
  CONSTRAINT `fk_nodes_cases1`
    FOREIGN KEY (`cases_idcases`)
    REFERENCES `interact`.`cases` (`idcases`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `interact`.`sub_nodes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `interact`.`sub_nodes` ;

CREATE TABLE IF NOT EXISTS `interact`.`sub_nodes` (
  `idsub_nodes` INT NOT NULL AUTO_INCREMENT,
  `overskrift` VARCHAR(45) NOT NULL,
  `nodes_idnodes` INT NOT NULL,
  `nodes_cases_idcases` INT NOT NULL,
  PRIMARY KEY (`idsub_nodes`, `nodes_idnodes`, `nodes_cases_idcases`),
  INDEX `fk_sub_nodes_nodes1_idx` (`nodes_idnodes` ASC, `nodes_cases_idcases` ASC),
  CONSTRAINT `fk_sub_nodes_nodes1`
    FOREIGN KEY (`nodes_idnodes` , `nodes_cases_idcases`)
    REFERENCES `interact`.`nodes` (`idnodes` , `cases_idcases`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `interact`.`tekst`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `interact`.`tekst` ;

CREATE TABLE IF NOT EXISTS `interact`.`tekst` (
  `idtekst` INT NOT NULL AUTO_INCREMENT,
  `tekst` TEXT(2000) NOT NULL,
  `sub_nodes_idsub_nodes` INT NOT NULL,
  `sub_nodes_nodes_idnodes` INT NOT NULL,
  `sub_nodes_nodes_cases_idcases` INT NOT NULL,
  PRIMARY KEY (`idtekst`, `sub_nodes_idsub_nodes`, `sub_nodes_nodes_idnodes`, `sub_nodes_nodes_cases_idcases`),
  INDEX `fk_tekst_sub_nodes1_idx` (`sub_nodes_idsub_nodes` ASC, `sub_nodes_nodes_idnodes` ASC, `sub_nodes_nodes_cases_idcases` ASC),
  CONSTRAINT `fk_tekst_sub_nodes1`
    FOREIGN KEY (`sub_nodes_idsub_nodes` , `sub_nodes_nodes_idnodes` , `sub_nodes_nodes_cases_idcases`)
    REFERENCES `interact`.`sub_nodes` (`idsub_nodes` , `nodes_idnodes` , `nodes_cases_idcases`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `interact`.`bilde`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `interact`.`bilde` ;

CREATE TABLE IF NOT EXISTS `interact`.`bilde` (
  `idbilde` INT NOT NULL AUTO_INCREMENT,
  `bilde` VARCHAR(255) NOT NULL,
  `sub_nodes_idsub_nodes` INT NOT NULL,
  `sub_nodes_nodes_idnodes` INT NOT NULL,
  `sub_nodes_nodes_cases_idcases` INT NOT NULL,
  PRIMARY KEY (`idbilde`, `sub_nodes_idsub_nodes`, `sub_nodes_nodes_idnodes`, `sub_nodes_nodes_cases_idcases`),
  INDEX `fk_bilde_sub_nodes1_idx` (`sub_nodes_idsub_nodes` ASC, `sub_nodes_nodes_idnodes` ASC, `sub_nodes_nodes_cases_idcases` ASC),
  CONSTRAINT `fk_bilde_sub_nodes1`
    FOREIGN KEY (`sub_nodes_idsub_nodes` , `sub_nodes_nodes_idnodes` , `sub_nodes_nodes_cases_idcases`)
    REFERENCES `interact`.`sub_nodes` (`idsub_nodes` , `nodes_idnodes` , `nodes_cases_idcases`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `interact`.`sporsmaal`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `interact`.`sporsmaal` ;

CREATE TABLE IF NOT EXISTS `interact`.`sporsmaal` (
  `idsporsmaal` INT NOT NULL AUTO_INCREMENT,
  `sporsmaal` VARCHAR(255) NOT NULL,
  `sub_nodes_idsub_nodes` INT NOT NULL,
  `sub_nodes_nodes_idnodes` INT NOT NULL,
  `sub_nodes_nodes_cases_idcases` INT NOT NULL,
  PRIMARY KEY (`idsporsmaal`, `sub_nodes_idsub_nodes`, `sub_nodes_nodes_idnodes`, `sub_nodes_nodes_cases_idcases`),
  INDEX `fk_sporsmaal_sub_nodes1_idx` (`sub_nodes_idsub_nodes` ASC, `sub_nodes_nodes_idnodes` ASC, `sub_nodes_nodes_cases_idcases` ASC),
  CONSTRAINT `fk_sporsmaal_sub_nodes1`
    FOREIGN KEY (`sub_nodes_idsub_nodes` , `sub_nodes_nodes_idnodes` , `sub_nodes_nodes_cases_idcases`)
    REFERENCES `interact`.`sub_nodes` (`idsub_nodes` , `nodes_idnodes` , `nodes_cases_idcases`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `interact`.`video`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `interact`.`video` ;

CREATE TABLE IF NOT EXISTS `interact`.`video` (
  `idvideo` INT NOT NULL AUTO_INCREMENT,
  `video` VARCHAR(255) NOT NULL,
  `sub_nodes_idsub_nodes` INT NOT NULL,
  `sub_nodes_nodes_idnodes` INT NOT NULL,
  `sub_nodes_nodes_cases_idcases` INT NOT NULL,
  PRIMARY KEY (`idvideo`, `sub_nodes_idsub_nodes`, `sub_nodes_nodes_idnodes`, `sub_nodes_nodes_cases_idcases`),
  INDEX `fk_video_sub_nodes1_idx` (`sub_nodes_idsub_nodes` ASC, `sub_nodes_nodes_idnodes` ASC, `sub_nodes_nodes_cases_idcases` ASC),
  CONSTRAINT `fk_video_sub_nodes1`
    FOREIGN KEY (`sub_nodes_idsub_nodes` , `sub_nodes_nodes_idnodes` , `sub_nodes_nodes_cases_idcases`)
    REFERENCES `interact`.`sub_nodes` (`idsub_nodes` , `nodes_idnodes` , `nodes_cases_idcases`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `interact`.`lyd`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `interact`.`lyd` ;

CREATE TABLE IF NOT EXISTS `interact`.`lyd` (
  `idlyd` INT NOT NULL AUTO_INCREMENT,
  `lyd` VARCHAR(255) NOT NULL,
  `sub_nodes_idsub_nodes` INT NOT NULL,
  `sub_nodes_nodes_idnodes` INT NOT NULL,
  `sub_nodes_nodes_cases_idcases` INT NOT NULL,
  PRIMARY KEY (`idlyd`, `sub_nodes_idsub_nodes`, `sub_nodes_nodes_idnodes`, `sub_nodes_nodes_cases_idcases`),
  INDEX `fk_lyd_sub_nodes1_idx` (`sub_nodes_idsub_nodes` ASC, `sub_nodes_nodes_idnodes` ASC, `sub_nodes_nodes_cases_idcases` ASC),
  CONSTRAINT `fk_lyd_sub_nodes1`
    FOREIGN KEY (`sub_nodes_idsub_nodes` , `sub_nodes_nodes_idnodes` , `sub_nodes_nodes_cases_idcases`)
    REFERENCES `interact`.`sub_nodes` (`idsub_nodes` , `nodes_idnodes` , `nodes_cases_idcases`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `interact`.`link`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `interact`.`link` ;

CREATE TABLE IF NOT EXISTS `interact`.`link` (
  `idlink` INT NOT NULL AUTO_INCREMENT,
  `link` VARCHAR(255) NOT NULL,
  `sub_nodes_idsub_nodes` INT NOT NULL,
  `sub_nodes_nodes_idnodes` INT NOT NULL,
  `sub_nodes_nodes_cases_idcases` INT NOT NULL,
  PRIMARY KEY (`idlink`, `sub_nodes_idsub_nodes`, `sub_nodes_nodes_idnodes`, `sub_nodes_nodes_cases_idcases`),
  INDEX `fk_link_sub_nodes1_idx` (`sub_nodes_idsub_nodes` ASC, `sub_nodes_nodes_idnodes` ASC, `sub_nodes_nodes_cases_idcases` ASC),
  CONSTRAINT `fk_link_sub_nodes1`
    FOREIGN KEY (`sub_nodes_idsub_nodes` , `sub_nodes_nodes_idnodes` , `sub_nodes_nodes_cases_idcases`)
    REFERENCES `interact`.`sub_nodes` (`idsub_nodes` , `nodes_idnodes` , `nodes_cases_idcases`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `interact`.`dokument`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `interact`.`dokument` ;

CREATE TABLE IF NOT EXISTS `interact`.`dokument` (
  `iddokument` INT NOT NULL AUTO_INCREMENT,
  `dokument` VARCHAR(255) NOT NULL,
  `sub_nodes_idsub_nodes` INT NOT NULL,
  `sub_nodes_nodes_idnodes` INT NOT NULL,
  `sub_nodes_nodes_cases_idcases` INT NOT NULL,
  PRIMARY KEY (`iddokument`, `sub_nodes_idsub_nodes`, `sub_nodes_nodes_idnodes`, `sub_nodes_nodes_cases_idcases`),
  INDEX `fk_dokument_sub_nodes1_idx` (`sub_nodes_idsub_nodes` ASC, `sub_nodes_nodes_idnodes` ASC, `sub_nodes_nodes_cases_idcases` ASC),
  CONSTRAINT `fk_dokument_sub_nodes1`
    FOREIGN KEY (`sub_nodes_idsub_nodes` , `sub_nodes_nodes_idnodes` , `sub_nodes_nodes_cases_idcases`)
    REFERENCES `interact`.`sub_nodes` (`idsub_nodes` , `nodes_idnodes` , `nodes_cases_idcases`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `interact`.`admin_has_cases`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `interact`.`admin_has_cases` ;

CREATE TABLE IF NOT EXISTS `interact`.`admin_has_cases` (
  `admin_idadmin` INT NOT NULL,
  `cases_idcases` INT NOT NULL,
  PRIMARY KEY (`admin_idadmin`, `cases_idcases`),
  INDEX `fk_admin_has_cases_cases1_idx` (`cases_idcases` ASC),
  INDEX `fk_admin_has_cases_admin_idx` (`admin_idadmin` ASC),
  CONSTRAINT `fk_admin_has_cases_admin`
    FOREIGN KEY (`admin_idadmin`)
    REFERENCES `interact`.`admin` (`idadmin`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_admin_has_cases_cases1`
    FOREIGN KEY (`cases_idcases`)
    REFERENCES `interact`.`cases` (`idcases`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `interact`.`videolink`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `interact`.`videolink` ;

CREATE TABLE IF NOT EXISTS `interact`.`videolink` (
  `idvideolink` INT NOT NULL AUTO_INCREMENT,
  `videolink` VARCHAR(255) NOT NULL,
  `sub_nodes_idsub_nodes` INT NOT NULL,
  `sub_nodes_nodes_idnodes` INT NOT NULL,
  `sub_nodes_nodes_cases_idcases` INT NOT NULL,
  PRIMARY KEY (`idvideolink`, `sub_nodes_idsub_nodes`, `sub_nodes_nodes_idnodes`, `sub_nodes_nodes_cases_idcases`),
  INDEX `fk_link_sub_nodes1_idx` (`sub_nodes_idsub_nodes` ASC, `sub_nodes_nodes_idnodes` ASC, `sub_nodes_nodes_cases_idcases` ASC),
  CONSTRAINT `fk_link_sub_nodes10`
    FOREIGN KEY (`sub_nodes_idsub_nodes` , `sub_nodes_nodes_idnodes` , `sub_nodes_nodes_cases_idcases`)
    REFERENCES `interact`.`sub_nodes` (`idsub_nodes` , `nodes_idnodes` , `nodes_cases_idcases`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
