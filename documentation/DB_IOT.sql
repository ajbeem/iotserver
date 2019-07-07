-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `IOT_DB` DEFAULT CHARACTER SET utf8 ;
USE `IOT_DB` ;

-- -----------------------------------------------------
-- Table `mydb`.`Administradores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Administradores` (
  `ID` BIGINT NOT NULL,
  `nombreCompleto` VARCHAR(250) NOT NULL,
  `nombreUsuario` VARCHAR(150) NOT NULL,
  `eMail` VARCHAR(150) NOT NULL,
  `password` VARCHAR(150) NOT NULL,
  `fechaAlta` TIMESTAMP NOT NULL COMMENT 'Fecha Alta registro',
  `fechaModificacion` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha modificacion',
  `creadoPor` VARCHAR(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL COMMENT 'Usuario que genero registro',
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Estacionamiento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Estacionamiento` (
  `ID` BIGINT NOT NULL,
  `nombreEst` VARCHAR(150) NOT NULL,
  `capacidad` MEDIUMINT NOT NULL,
  `plazasDiscapacitados` MEDIUMINT NOT NULL,
  `plazasOcupadas` MEDIUMINT NOT NULL,
  `latitud` DOUBLE NOT NULL,
  `longitud` DOUBLE NOT NULL,
  `Estacionamientocol` VARCHAR(45) NULL,
  `Administradores_ID` BIGINT NOT NULL,
  `fechaAlta` TIMESTAMP NOT NULL COMMENT 'Fecha Alta registro',
  `fechaModificacion` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha modificacion',
  `creadoPor` VARCHAR(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL COMMENT 'Usuario que genero registro',
  PRIMARY KEY (`ID`),
  CONSTRAINT `fk_Estacionamiento_Administradores1`
    FOREIGN KEY (`Administradores_ID`)
    REFERENCES `Administradores` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Area`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Area` (
  `ID` BIGINT NOT NULL,
  `capacidad` MEDIUMINT NULL,
  `Estacionamiento_ID` BIGINT NOT NULL,
  PRIMARY KEY (`ID`),
  `fechaAlta` TIMESTAMP NOT NULL COMMENT 'Fecha Alta registro',
  `fechaModificacion` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha modificacion',
  `creadoPor` VARCHAR(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL COMMENT 'Usuario que genero registro',
  CONSTRAINT `fk_Area_Estacionamiento`
    FOREIGN KEY (`Estacionamiento_ID`)
    REFERENCES `Estacionamiento` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Plaza`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Plaza` (
  `ID` MEDIUMINT NOT NULL,
  `MAC` VARCHAR(45) NULL,
  `Area_ID` BIGINT NOT NULL,
  PRIMARY KEY (`ID`),
  `fechaAlta` TIMESTAMP NOT NULL COMMENT 'Fecha Alta registro',
  `fechaModificacion` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha modificacion',
  `creadoPor` VARCHAR(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL COMMENT 'Usuario que genero registro',
  CONSTRAINT `fk_Plaza_Area1`
    FOREIGN KEY (`Area_ID`)
    REFERENCES `Area` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Clientes` (
  `ID` MEDIUMINT NOT NULL,
  `nombreUsuario` VARCHAR(50) NOT NULL,
  `password` VARCHAR(150) NOT NULL,
  `eMail` VARCHAR(255) NOT NULL,
  `Estacionamiento_ID` BIGINT,
  `creadoPor` VARCHAR(150),
  PRIMARY KEY (`ID`),
  CONSTRAINT `fk_Cliente_Estacionamiento1`
    FOREIGN KEY (`Estacionamiento_ID`)
    REFERENCES `Estacionamiento` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`MetodoPago`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MetodoPago` (
  `ID` BIGINT NOT NULL,
  `token` VARCHAR(255) NOT NULL,
  `tipo` VARCHAR(25) NOT NULL,
  `banco` VARCHAR(150) NOT NULL,
  `Plaza_ID` MEDIUMINT NOT NULL,
  `fechaAlta` TIMESTAMP NOT NULL COMMENT 'Fecha Alta registro',
  `fechaModificacion` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha modificacion',
  `creadoPor` VARCHAR(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL COMMENT 'Usuario que genero registro',
  PRIMARY KEY (`ID`),
  CONSTRAINT `fk_MetodoPago_Plaza1`
    FOREIGN KEY (`Plaza_ID`)
    REFERENCES `Plaza` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


-------------------------------------------------------------
----Agregar columnas
-------------------------------------------------------------

ALTER TABLE `area` ADD `fechaAlta` TIMESTAMP NOT NULL COMMENT 'Fecha Alta registro' AFTER `Estacionamiento_ID`, ADD `fechaModificacion` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha modificacion' AFTER `fechaAlta`, ADD `creadoPor` VARCHAR(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL COMMENT 'Usuario que genero registro' AFTER `fechaModificacion`;

ALTER TABLE `clientes` ADD `fechaAlta` TIMESTAMP NOT NULL COMMENT 'Fecha Alta registro' AFTER `creadoPor`, ADD `fechaModificacion` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha modificacion' AFTER `fechaAlta`;

ALTER TABLE `estacionamiento` ADD `fechaAlta` TIMESTAMP NOT NULL COMMENT 'Fecha Alta registro' AFTER `Administradores_ID`, ADD `fechaModificacion` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha modificacion' AFTER `fechaAlta`, ADD `creadoPor` VARCHAR(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL COMMENT 'Usuario que genero registro' AFTER `fechaModificacion`;

ALTER TABLE `metodopago` ADD `fechaAlta` TIMESTAMP NOT NULL COMMENT 'Fecha Alta registro' AFTER `Plaza_ID`, ADD `fechaModificacion` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha modificacion' AFTER `fechaAlta`, ADD `creadoPor` VARCHAR(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL COMMENT 'Usuario que genero registro' AFTER `fechaModificacion`;

ALTER TABLE `plaza` ADD `fechaAlta` TIMESTAMP NOT NULL COMMENT 'Fecha Alta registro' AFTER `Area_ID`, ADD `fechaModificacion` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha modificacion' AFTER `fechaAlta`, ADD `creadoPor` VARCHAR(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL COMMENT 'Usuario que genero registro' AFTER `fechaModificacion`;
