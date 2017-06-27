-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Aktivity`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Aktivity` (
  `idAktivity` INT NOT NULL AUTO_INCREMENT,
  `nazov` VARCHAR(45) NULL,
  `popis` VARCHAR(45) NULL,
  `maximum` INT NULL,
  PRIMARY KEY (`idAktivity`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Znamky`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Znamky` (
  `idZnamky` INT NOT NULL AUTO_INCREMENT,
  `meno` VARCHAR(45) NULL,
  `priezvisko` VARCHAR(45) NULL,
  `datum` DATE NULL,
  `body` INT NULL,
  `Aktivity_idAktivity` INT NOT NULL,
  PRIMARY KEY (`idZnamky`),
  INDEX `fk_Znamky_Aktivity_idx` (`Aktivity_idAktivity` ASC),
  CONSTRAINT `fk_Znamky_Aktivity`
    FOREIGN KEY (`Aktivity_idAktivity`)
    REFERENCES `mydb`.`Aktivity` (`idAktivity`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
