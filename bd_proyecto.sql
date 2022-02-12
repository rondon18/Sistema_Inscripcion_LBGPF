-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema bd_proyecto
-- -----------------------------------------------------
-- Base de datos PSTII

-- -----------------------------------------------------
-- Schema bd_proyecto
--
-- Base de datos PSTII
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bd_proyecto` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ;
USE `bd_proyecto` ;

-- -----------------------------------------------------
-- Table `bd_proyecto`.`Personas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_proyecto`.`Personas` (
  `idPersonas` INT NOT NULL AUTO_INCREMENT,
  `Nombres` VARCHAR(45) NOT NULL,
  `Apellidos` VARCHAR(45) NOT NULL,
  `Cédula` VARCHAR(45) NOT NULL,
  `Fecha_Nacimiento` DATE NOT NULL,
  `Género` VARCHAR(45) NOT NULL,
  `Correo_Electronico` VARCHAR(45) NOT NULL,
  `Dirección` TEXT(100) NOT NULL,
  `Teléfono` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPersonas`),
  UNIQUE INDEX `Cédula_UNIQUE` (`Cédula` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_proyecto`.`Padres`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_proyecto`.`Padres` (
  `idPadres` INT NOT NULL AUTO_INCREMENT,
  `Parentezco` VARCHAR(45) NOT NULL,
  `Dirección_Actual` TEXT(100) NOT NULL,
  `Estado_Civil` VARCHAR(20) NOT NULL,
  `Cedula_Persona` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPadres`, `Cedula_Persona`),
  INDEX `Cedula_Persona_idx` (`Cedula_Persona` ASC),
  CONSTRAINT `fk_Personas_Padres`
    FOREIGN KEY (`Cedula_Persona`)
    REFERENCES `bd_proyecto`.`Personas` (`Cédula`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_proyecto`.`Usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_proyecto`.`Usuarios` (
  `idUsuarios` INT NOT NULL AUTO_INCREMENT,
  `Clave` VARCHAR(45) NOT NULL,
  `Privilegios` INT NOT NULL,
  `Cedula_Persona` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idUsuarios`, `Cedula_Persona`),
  INDEX `Cedula_Persona_idx` (`Cedula_Persona` ASC),
  CONSTRAINT `fk_Personas_Usuarios`
    FOREIGN KEY (`Cedula_Persona`)
    REFERENCES `bd_proyecto`.`Personas` (`Cédula`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_proyecto`.`Representantes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_proyecto`.`Representantes` (
  `idRepresentantes` INT NOT NULL AUTO_INCREMENT,
  `Vinculo` VARCHAR(45) NOT NULL,
  `Estado_Civil` VARCHAR(45) NOT NULL,
  `Cta_Bancaria` VARCHAR(45) NOT NULL,
  `Contacto_Aux` VARCHAR(45) NOT NULL,
  `Grado_Inst` VARCHAR(45) NOT NULL,
  `Empleo` VARCHAR(45) NOT NULL,
  `id_Usuario` INT NOT NULL,
  PRIMARY KEY (`idRepresentantes`, `id_Usuario`),
  INDEX `id_Usuario_idx` (`id_Usuario` ASC),
  CONSTRAINT `fk_Usuarios_Representantes`
    FOREIGN KEY (`id_Usuario`)
    REFERENCES `bd_proyecto`.`Usuarios` (`idUsuarios`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_proyecto`.`Alumnos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_proyecto`.`Alumnos` (
  `idAlumnos` INT NOT NULL AUTO_INCREMENT,
  `Plantel_Procedencia` TEXT(100) NOT NULL,
  `Cedula_Persona` VARCHAR(45) NOT NULL,
  `idRepresentante` INT NOT NULL,
  PRIMARY KEY (`idAlumnos`, `Cedula_Persona`, `idRepresentante`),
  INDEX `Cedula_Persona_idx` (`Cedula_Persona` ASC),
  INDEX `id_Representante_idx` (`idRepresentante` ASC),
  CONSTRAINT `fk_Personas_Alumnos`
    FOREIGN KEY (`Cedula_Persona`)
    REFERENCES `bd_proyecto`.`Personas` (`Cédula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Representantes_Alumnos`
    FOREIGN KEY (`idRepresentante`)
    REFERENCES `bd_proyecto`.`Representantes` (`idRepresentantes`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_proyecto`.`Administradores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_proyecto`.`Administradores` (
  `idAdministradores` INT NOT NULL AUTO_INCREMENT,
  `idUsuario` INT NOT NULL,
  PRIMARY KEY (`idAdministradores`, `idUsuario`),
  INDEX `idUsuario_idx` (`idUsuario` ASC),
  CONSTRAINT `fk_Usuarios_Administradores`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `bd_proyecto`.`Usuarios` (`idUsuarios`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_proyecto`.`Datos-Medicos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_proyecto`.`Datos-Medicos` (
  `idDatos-Medicos` INT NOT NULL,
  `Estatura` INT NOT NULL,
  `Peso` INT NOT NULL,
  `Indice` VARCHAR(45) NOT NULL,
  `Circ_Braquial` INT NOT NULL,
  `Lateralidad` VARCHAR(45) NOT NULL,
  `Tipo_Sangre` VARCHAR(45) NOT NULL,
  `Medicación` TEXT NOT NULL,
  `Dieta_Especial` TEXT NOT NULL,
  `Impedimento_Físico` TEXT NOT NULL,
  `Alergias` TEXT NOT NULL,
  `Cond_Vista` VARCHAR(45) NOT NULL,
  `Cond_Dental` VARCHAR(45) NOT NULL,
  `Cond_Salud` VARCHAR(45) NOT NULL,
  `idAlumnos` INT NOT NULL,
  PRIMARY KEY (`idDatos-Medicos`, `idAlumnos`),
  INDEX `idUsuarios_idx` (`idAlumnos` ASC),
  CONSTRAINT `fk_Alumnos_Datos-Medicos`
    FOREIGN KEY (`idAlumnos`)
    REFERENCES `bd_proyecto`.`Alumnos` (`idAlumnos`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_proyecto`.`Datos-Sociales`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_proyecto`.`Datos-Sociales` (
  `idDatos-Sociales` INT NOT NULL,
  `Posee_Canaima` CHAR(2) NOT NULL,
  `Condicion_Canaima` VARCHAR(45) NOT NULL,
  `Posee_Carnet_Patria` CHAR(2) NOT NULL,
  `Codigo_Carnet_Patria` VARCHAR(45) NOT NULL,
  `Serial_Carnet_Patria` VARCHAR(45) NOT NULL,
  `Acceso_Internet` VARCHAR(45) NOT NULL,
  `idAlumnos` INT NOT NULL,
  PRIMARY KEY (`idDatos-Sociales`, `idAlumnos`),
  INDEX `idAlumnos_idx` (`idAlumnos` ASC),
  CONSTRAINT `fk_Alumnos_Datos-Sociales`
    FOREIGN KEY (`idAlumnos`)
    REFERENCES `bd_proyecto`.`Alumnos` (`idAlumnos`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_proyecto`.`Datos-Tallas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_proyecto`.`Datos-Tallas` (
  `idDatos-Tallas` INT NOT NULL,
  `Talla_Camisa` VARCHAR(45) NOT NULL,
  `Talla_Pantalón` VARCHAR(45) NOT NULL,
  `Talla_Zapatos` VARCHAR(45) NOT NULL,
  `idAlumnos` INT NOT NULL,
  PRIMARY KEY (`idDatos-Tallas`, `idAlumnos`),
  INDEX `idAlumnos_idx` (`idAlumnos` ASC),
  CONSTRAINT `fk_Alumnos_Datos-Tallas`
    FOREIGN KEY (`idAlumnos`)
    REFERENCES `bd_proyecto`.`Alumnos` (`idAlumnos`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_proyecto`.`Grado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_proyecto`.`Grado` (
  `idGrado` INT NOT NULL,
  `Grado_A_Cursar` VARCHAR(45) NOT NULL,
  `idAlumnos` INT NOT NULL,
  PRIMARY KEY (`idGrado`, `idAlumnos`),
  INDEX `idAlumno_idx` (`idAlumnos` ASC),
  CONSTRAINT `fk_Alumnos_Grado`
    FOREIGN KEY (`idAlumnos`)
    REFERENCES `bd_proyecto`.`Alumnos` (`idAlumnos`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_proyecto`.`Materias-Pendientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_proyecto`.`Materias-Pendientes` (
  `idMaterias-Pendientes` INT NOT NULL,
  `Tiene_Mat_Pend` CHAR(2) NOT NULL,
  `Materias_Pendientes` INT NOT NULL,
  `idAlumno` INT NOT NULL,
  PRIMARY KEY (`idMaterias-Pendientes`, `idAlumno`),
  INDEX `idAlumnos_idx` (`idAlumno` ASC),
  CONSTRAINT `fk_Alumnos_Materias-Pendientes`
    FOREIGN KEY (`idAlumno`)
    REFERENCES `bd_proyecto`.`Alumnos` (`idAlumnos`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_proyecto`.`Inscripciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_proyecto`.`Inscripciones` (
  `idInscripciones` INT NOT NULL,
  `Fecha_Inscripcion` DATE NULL,
  `Hora_Inscripción` DATE NULL,
  `idUsuario` INT NOT NULL,
  `idAlumno` INT NOT NULL,
  PRIMARY KEY (`idInscripciones`, `idUsuario`, `idAlumno`),
  INDEX `idAlumno_idx` (`idAlumno` ASC),
  INDEX `idUsuarios_idx` (`idUsuario` ASC),
  CONSTRAINT `fk_Alumnos_Inscripciones`
    FOREIGN KEY (`idAlumno`)
    REFERENCES `bd_proyecto`.`Alumnos` (`idAlumnos`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Usuarios_Inscripciones`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `bd_proyecto`.`Usuarios` (`idUsuarios`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
