-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema sj_db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema sj_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `sj_db` DEFAULT CHARACTER SET utf8 ;
USE `sj_db` ;

-- -----------------------------------------------------
-- Table `sj_db`.`pouzivatelia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sj_db`.`pouzivatelia` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `meno` VARCHAR(30) NOT NULL,
  `priezvisko` VARCHAR(30) NOT NULL,
  `email` VARCHAR(100) NOT NULL UNIQUE,
  `heslo` VARCHAR(255) NOT NULL,
  `datum_vytvorenia` DATETIME NOT NULL,
  `rola` TINYINT NOT NULL,
  `datum_posledneho_prihlasenia` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sj_db`.`kategorie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sj_db`.`kategorie` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `kategoria` VARCHAR(50) NOT NULL,
  `podkategoria` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

INSERT INTO `sj_db`.`kategorie` (`kategoria`, `podkategoria`) VALUES
('Teológia', NULL),
('Spiritualita', NULL),
('Svätí', NULL),
('Modlitba', NULL),
('Sviatosti', NULL),
('Cirkevná história', NULL);

-- -----------------------------------------------------
-- Table `sj_db`.`clanky`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sj_db`.`clanky` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nazov` VARCHAR(255) NOT NULL,
  `text_clanku` TEXT(65525) NOT NULL,
  `datum` DATETIME NOT NULL,
  `pouzivatelia_id` INT NOT NULL,
  `kategorie_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_clanky_pouzivatelia_idx` (`pouzivatelia_id` ASC),
  INDEX `fk_clanky_kategorie1_idx` (`kategorie_id` ASC),
  CONSTRAINT `fk_clanky_pouzivatelia`
    FOREIGN KEY (`pouzivatelia_id`)
    REFERENCES `sj_db`.`pouzivatelia` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_clanky_kategorie1`
    FOREIGN KEY (`kategorie_id`)
    REFERENCES `sj_db`.`kategorie` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sj_db`.`komentare`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sj_db`.`komentare` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `komentar` VARCHAR(2000) NOT NULL,
  `datum` DATETIME NOT NULL,
  `pouzivatelia_id` INT NOT NULL,
  `clanky_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_komentare_pouzivatelia1_idx` (`pouzivatelia_id` ASC),
  INDEX `fk_komentare_clanky1_idx` (`clanky_id` ASC),
  CONSTRAINT `fk_komentare_pouzivatelia1`
    FOREIGN KEY (`pouzivatelia_id`)
    REFERENCES `sj_db`.`pouzivatelia` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_komentare_clanky1`
    FOREIGN KEY (`clanky_id`)
    REFERENCES `sj_db`.`clanky` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
