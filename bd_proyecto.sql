-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema bd_proyecto
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bd_proyecto
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bd_proyecto` DEFAULT CHARACTER SET utf8 ;
USE `bd_proyecto` ;

-- -----------------------------------------------------
-- Table `bd_proyecto`.`personas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_proyecto`.`personas` (
  `idPersonas` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombres` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Apellidos` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Cédula` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Fecha_Nacimiento` DATE NULL DEFAULT NULL,
  `Lugar_Nacimiento` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `Género` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `Correo_Electronico` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `Dirección` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `Teléfono_Principal` VARCHAR(15) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Teléfono_Auxiliar` VARCHAR(15) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Estado_Civil` VARCHAR(15) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  PRIMARY KEY (`idPersonas`),
  UNIQUE INDEX `Cédula_UNIQUE` (`Cédula` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 155
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `bd_proyecto`.`padres`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_proyecto`.`padres` (
  `idPadres` INT(11) NOT NULL AUTO_INCREMENT,
  `Parentezco` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Cedula_Persona` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  PRIMARY KEY (`idPadres`, `Cedula_Persona`),
  INDEX `Cedula_Persona_idx` (`Cedula_Persona` ASC),
  CONSTRAINT `Cedula_Persona`
    FOREIGN KEY (`Cedula_Persona`)
    REFERENCES `bd_proyecto`.`personas` (`Cédula`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 61
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `bd_proyecto`.`representantes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_proyecto`.`representantes` (
  `idRepresentantes` INT(11) NOT NULL AUTO_INCREMENT,
  `Vinculo` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Banco` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Tipo_Cuenta` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Cta_Bancaria` INT(11) NOT NULL,
  `Grado_Inst` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Empleo` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Lugar_Trabajo` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Teléfono_Trabajo` VARCHAR(11) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Remuneracion` INT(11) NULL DEFAULT NULL,
  `Tipo_Remuneración` VARCHAR(20) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL,
  `Cedula_Persona` VARCHAR(11) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  PRIMARY KEY (`idRepresentantes`),
  INDEX `fk_personas_representantes` (`Cedula_Persona` ASC),
  CONSTRAINT `fk_personas_representantes`
    FOREIGN KEY (`Cedula_Persona`)
    REFERENCES `bd_proyecto`.`personas` (`Cédula`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 39
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `bd_proyecto`.`alumnos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_proyecto`.`alumnos` (
  `idAlumnos` INT(11) NOT NULL AUTO_INCREMENT,
  `Plantel_Procedencia` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Cedula_Persona` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `idRepresentante` INT(11) NOT NULL,
  `idPadre` INT(11) NOT NULL,
  PRIMARY KEY (`idAlumnos`, `Cedula_Persona`, `idRepresentante`, `idPadre`),
  INDEX `Cedula_Persona_idx` (`Cedula_Persona` ASC),
  INDEX `id_Representante_idx` (`idRepresentante` ASC),
  INDEX `fk_Padres_Alumnos` (`idPadre` ASC),
  CONSTRAINT `fk_Padres_Alumnos`
    FOREIGN KEY (`idPadre`)
    REFERENCES `bd_proyecto`.`padres` (`idPadres`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Personas_Alumnos`
    FOREIGN KEY (`Cedula_Persona`)
    REFERENCES `bd_proyecto`.`personas` (`Cédula`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Representantes_Alumnos`
    FOREIGN KEY (`idRepresentante`)
    REFERENCES `bd_proyecto`.`representantes` (`idRepresentantes`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 28
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `bd_proyecto`.`año-escolar`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_proyecto`.`año-escolar` (
  `idAño-Escolar` INT(11) NOT NULL AUTO_INCREMENT,
  `Año_Escolar` VARCHAR(15) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  PRIMARY KEY (`idAño-Escolar`),
  UNIQUE INDEX `Año_Escolar` (`Año_Escolar` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `bd_proyecto`.`contactos_auxiliares`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_proyecto`.`contactos_auxiliares` (
  `idContactoAuxiliar` INT(11) NOT NULL AUTO_INCREMENT,
  `idRepresentante` INT(20) NOT NULL,
  `Relación` VARCHAR(20) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Nombre_Aux` VARCHAR(30) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Tfl_P_Contacto_Aux` VARCHAR(15) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Tfl_S_Contacto_Aux` VARCHAR(15) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  PRIMARY KEY (`idContactoAuxiliar`, `idRepresentante`),
  INDEX `fk_representantes_auxiliares` (`idRepresentante` ASC),
  CONSTRAINT `fk_representantes_auxiliares`
    FOREIGN KEY (`idRepresentante`)
    REFERENCES `bd_proyecto`.`representantes` (`idRepresentantes`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `bd_proyecto`.`datos-medicos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_proyecto`.`datos-medicos` (
  `idDatos-Medicos` INT(11) NOT NULL AUTO_INCREMENT,
  `Estatura` INT(11) NOT NULL,
  `Peso` INT(11) NOT NULL,
  `Indice` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Circ_Braquial` INT(11) NOT NULL,
  `Lateralidad` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Tipo_Sangre` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Medicación` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Dieta_Especial` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Impedimento_Físico` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Alergias` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Cond_Vista` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Cond_Dental` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Institucion_Medica` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Carnet_Discapacidad` VARCHAR(20) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `idAlumnos` INT(11) NOT NULL,
  PRIMARY KEY (`idDatos-Medicos`, `idAlumnos`),
  INDEX `idUsuarios_idx` (`idAlumnos` ASC),
  CONSTRAINT `fk_Alumnos_Datos-Medicos`
    FOREIGN KEY (`idAlumnos`)
    REFERENCES `bd_proyecto`.`alumnos` (`idAlumnos`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `bd_proyecto`.`datos-sociales`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_proyecto`.`datos-sociales` (
  `idDatos-Sociales` INT(11) NOT NULL,
  `Posee_Canaima` CHAR(2) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Condicion_Canaima` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Posee_Carnet_Patria` CHAR(2) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Codigo_Carnet_Patria` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Serial_Carnet_Patria` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Acceso_Internet` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `idAlumnos` INT(11) NOT NULL,
  PRIMARY KEY (`idDatos-Sociales`, `idAlumnos`),
  INDEX `idAlumnos_idx` (`idAlumnos` ASC),
  CONSTRAINT `fk_Alumnos_Datos-Sociales`
    FOREIGN KEY (`idAlumnos`)
    REFERENCES `bd_proyecto`.`alumnos` (`idAlumnos`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `bd_proyecto`.`datos-tallas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_proyecto`.`datos-tallas` (
  `idDatos-Tallas` INT(11) NOT NULL,
  `Talla_Camisa` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Talla_Pantalón` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Talla_Zapatos` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `idAlumnos` INT(11) NOT NULL,
  PRIMARY KEY (`idDatos-Tallas`, `idAlumnos`),
  INDEX `idAlumnos_idx` (`idAlumnos` ASC),
  CONSTRAINT `fk_Alumnos_Datos-Tallas`
    FOREIGN KEY (`idAlumnos`)
    REFERENCES `bd_proyecto`.`alumnos` (`idAlumnos`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `bd_proyecto`.`grado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_proyecto`.`grado` (
  `idGrado` INT(11) NOT NULL AUTO_INCREMENT,
  `Grado_A_Cursar` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `idAlumnos` INT(11) NOT NULL,
  `idAño-Escolar` INT(11) NOT NULL,
  PRIMARY KEY (`idGrado`, `idAlumnos`, `idAño-Escolar`),
  INDEX `idAlumno_idx` (`idAlumnos` ASC),
  INDEX `fk_Año-Escolar_Grado` (`idAño-Escolar` ASC),
  CONSTRAINT `fk_Alumnos_Grado`
    FOREIGN KEY (`idAlumnos`)
    REFERENCES `bd_proyecto`.`alumnos` (`idAlumnos`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Año-Escolar_Grado`
    FOREIGN KEY (`idAño-Escolar`)
    REFERENCES `bd_proyecto`.`año-escolar` (`idAño-Escolar`))
ENGINE = InnoDB
AUTO_INCREMENT = 15
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `bd_proyecto`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_proyecto`.`usuarios` (
  `idUsuarios` INT(11) NOT NULL AUTO_INCREMENT,
  `Clave` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Privilegios` INT(11) NOT NULL,
  `Cedula_Persona` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `idRepresentante` INT NOT NULL,
  PRIMARY KEY (`idUsuarios`, `Cedula_Persona`),
  INDEX `Cedula_Persona_idx` (`Cedula_Persona` ASC),
  INDEX `fk_represntantes_usuarios_idx` (`idRepresentante` ASC),
  CONSTRAINT `fk_personas_usuarios`
    FOREIGN KEY (`Cedula_Persona`)
    REFERENCES `bd_proyecto`.`personas` (`Cédula`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_represntantes_usuarios`
    FOREIGN KEY (`idRepresentante`)
    REFERENCES `bd_proyecto`.`representantes` (`idRepresentantes`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 59
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `bd_proyecto`.`inscripciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_proyecto`.`inscripciones` (
  `idInscripciones` INT(11) NOT NULL AUTO_INCREMENT,
  `Fecha_Inscripcion` DATE NOT NULL,
  `Hora_Inscripción` DATE NOT NULL,
  `idUsuario` INT(11) NOT NULL,
  `idAlumno` INT(11) NOT NULL,
  PRIMARY KEY (`idInscripciones`, `idUsuario`, `idAlumno`),
  INDEX `idAlumno_idx` (`idAlumno` ASC),
  INDEX `idUsuarios_idx` (`idUsuario` ASC),
  CONSTRAINT `fk_Alumnos_Inscripciones`
    FOREIGN KEY (`idAlumno`)
    REFERENCES `bd_proyecto`.`alumnos` (`idAlumnos`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Usuarios_Inscripciones`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `bd_proyecto`.`usuarios` (`idUsuarios`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `bd_proyecto`.`materias-pendientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_proyecto`.`materias-pendientes` (
  `idMaterias-Pendientes` INT(11) NOT NULL,
  `Tiene_Mat_Pend` CHAR(2) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Materias_Pendientes` INT(11) NOT NULL,
  `idAlumno` INT(11) NOT NULL,
  PRIMARY KEY (`idMaterias-Pendientes`, `idAlumno`),
  INDEX `idAlumnos_idx` (`idAlumno` ASC),
  CONSTRAINT `fk_Alumnos_Materias-Pendientes`
    FOREIGN KEY (`idAlumno`)
    REFERENCES `bd_proyecto`.`alumnos` (`idAlumnos`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
