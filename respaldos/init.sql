-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema si_lbgpf
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema si_lbgpf
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `si_lbgpf` DEFAULT CHARACTER SET utf8mb4 ;
USE `si_lbgpf` ;

-- -----------------------------------------------------
-- Table `si_lbgpf`.`año-escolar`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `si_lbgpf`.`año-escolar` (
  `idAño-Escolar` INT(11) NOT NULL AUTO_INCREMENT,
  `Inicio_Año_Escolar` VARCHAR(4) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Fin_Año_Escolar` VARCHAR(4) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  PRIMARY KEY (`idAño-Escolar`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `si_lbgpf`.`bitácora`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `si_lbgpf`.`bitácora` (
  `idbitácora` INT(11) NOT NULL AUTO_INCREMENT,
  `idUsuarios` INT(11) NOT NULL,
  `fechaInicioSesión` DATE NOT NULL,
  `horaInicioSesión` TIME NOT NULL,
  `linksVisitados` TEXT NOT NULL,
  `fechaFinalSesión` DATE NULL DEFAULT NULL,
  `horaFinalSesión` TIME NULL DEFAULT NULL,
  PRIMARY KEY (`idbitácora`),
  INDEX `fk_usuarios_bitacora` (`idUsuarios` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 144
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `si_lbgpf`.`personas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `si_lbgpf`.`personas` (
  `idPersonas` INT(11) NOT NULL AUTO_INCREMENT,
  `Primer_Nombre` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Segundo_Nombre` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Primer_Apellido` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Segundo_Apellido` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Cédula` VARCHAR(15) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Fecha_Nacimiento` DATE NOT NULL,
  `Lugar_Nacimiento` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Género` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Correo_Electrónico` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Dirección` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Estado_Civil` VARCHAR(15) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  PRIMARY KEY (`idPersonas`),
  UNIQUE INDEX `Cédula_UNIQUE` (`Cédula` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 822
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `si_lbgpf`.`carnet-patria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `si_lbgpf`.`carnet-patria` (
  `idCarnet` INT(11) NOT NULL AUTO_INCREMENT,
  `Código_Carnet` VARCHAR(10) NOT NULL,
  `Serial_Carnet` VARCHAR(10) NOT NULL,
  `Cédula_Persona` VARCHAR(15) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  PRIMARY KEY (`idCarnet`),
  INDEX `fk_personas_carnet` (`Cédula_Persona` ASC),
  CONSTRAINT `fk_personas_carnet`
    FOREIGN KEY (`Cédula_Persona`)
    REFERENCES `si_lbgpf`.`personas` (`Cédula`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 476
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `si_lbgpf`.`representantes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `si_lbgpf`.`representantes` (
  `idRepresentantes` INT(11) NOT NULL AUTO_INCREMENT,
  `Grado_Académico` VARCHAR(15) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Cédula_Persona` VARCHAR(15) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  PRIMARY KEY (`idRepresentantes`),
  INDEX `fk_personas_representantes` (`Cédula_Persona` ASC),
  CONSTRAINT `fk_personas_representantes`
    FOREIGN KEY (`Cédula_Persona`)
    REFERENCES `si_lbgpf`.`personas` (`Cédula`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 225
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `si_lbgpf`.`contactos_auxiliares`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `si_lbgpf`.`contactos_auxiliares` (
  `idContactoAuxiliar` INT(11) NOT NULL AUTO_INCREMENT,
  `idRepresentante` INT(20) NOT NULL,
  `Primer_Nombre` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Segundo_Nombre` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Primer_Apellido` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Segundo_Apellido` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Relación` VARCHAR(20) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Prefijo` VARCHAR(20) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Número_Telefónico` VARCHAR(20) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `idEstudiantes` INT(11) NOT NULL,
  PRIMARY KEY (`idContactoAuxiliar`, `idRepresentante`),
  INDEX `fk_representantes_auxiliares` (`idRepresentante` ASC),
  CONSTRAINT `fk_representantes_auxiliares`
    FOREIGN KEY (`idRepresentante`)
    REFERENCES `si_lbgpf`.`representantes` (`idRepresentantes`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 253
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `si_lbgpf`.`datos-económicos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `si_lbgpf`.`datos-económicos` (
  `idDatos-económicos` INT(11) NOT NULL AUTO_INCREMENT,
  `Banco` VARCHAR(45) NOT NULL,
  `Tipo_Cuenta` VARCHAR(45) NOT NULL,
  `Cta_Bancaria` VARCHAR(45) NOT NULL,
  `idRepresentantes` INT(11) NOT NULL,
  PRIMARY KEY (`idDatos-económicos`, `idRepresentantes`),
  INDEX `fk_datos-economicos_representantes1_idx` (`idRepresentantes` ASC),
  CONSTRAINT `fk_datos-economicos_representantes1`
    FOREIGN KEY (`idRepresentantes`)
    REFERENCES `si_lbgpf`.`representantes` (`idRepresentantes`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 224
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `si_lbgpf`.`datos-laborales`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `si_lbgpf`.`datos-laborales` (
  `idDatos-laborales` INT(11) NOT NULL AUTO_INCREMENT,
  `Empleo` VARCHAR(45) NOT NULL,
  `Lugar_Trabajo` VARCHAR(45) NULL DEFAULT NULL,
  `Remuneración` VARCHAR(45) NULL DEFAULT NULL,
  `Tipo_Remuneración` VARCHAR(45) NULL DEFAULT NULL,
  `idRepresentantes` INT(11) NOT NULL,
  PRIMARY KEY (`idDatos-laborales`, `idRepresentantes`),
  INDEX `fk_datos-laborales_representantes1_idx` (`idRepresentantes` ASC),
  CONSTRAINT `fk_datos-laborales_representantes1`
    FOREIGN KEY (`idRepresentantes`)
    REFERENCES `si_lbgpf`.`representantes` (`idRepresentantes`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 224
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `si_lbgpf`.`madre`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `si_lbgpf`.`madre` (
  `idMadre` INT(11) NOT NULL AUTO_INCREMENT,
  `País_Residencia` VARCHAR(25) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Grado_Académico` VARCHAR(15) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Cédula_Persona` VARCHAR(15) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  PRIMARY KEY (`idMadre`, `Cédula_Persona`),
  UNIQUE INDEX `Cedula_Persona_UNIQUE` (`Cédula_Persona` ASC),
  INDEX `Cedula_Persona_idx` (`Cédula_Persona` ASC),
  CONSTRAINT `madre_ibfk_1`
    FOREIGN KEY (`Cédula_Persona`)
    REFERENCES `si_lbgpf`.`personas` (`Cédula`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 260
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `si_lbgpf`.`datos-laborales-madres`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `si_lbgpf`.`datos-laborales-madres` (
  `idDatos-laboralesMa` INT(11) NOT NULL AUTO_INCREMENT,
  `Empleo` VARCHAR(45) NOT NULL,
  `Lugar_Trabajo` VARCHAR(45) NOT NULL,
  `Remuneración` VARCHAR(45) NOT NULL,
  `Tipo_Remuneración` VARCHAR(45) NOT NULL,
  `idMadre` INT(11) NOT NULL,
  PRIMARY KEY (`idDatos-laboralesMa`),
  INDEX `idPadre` (`idMadre` ASC),
  CONSTRAINT `datos-laborales-madres_ibfk_1`
    FOREIGN KEY (`idMadre`)
    REFERENCES `si_lbgpf`.`madre` (`idMadre`)
    ON DELETE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 351
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `si_lbgpf`.`padre`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `si_lbgpf`.`padre` (
  `idPadre` INT(11) NOT NULL AUTO_INCREMENT,
  `País_Residencia` VARCHAR(25) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Grado_Académico` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Cédula_Persona` VARCHAR(15) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  PRIMARY KEY (`idPadre`, `Cédula_Persona`),
  UNIQUE INDEX `Cedula_Persona_UNIQUE` (`Cédula_Persona` ASC),
  INDEX `Cedula_Persona_idx` (`Cédula_Persona` ASC),
  CONSTRAINT `Cedula_Persona`
    FOREIGN KEY (`Cédula_Persona`)
    REFERENCES `si_lbgpf`.`personas` (`Cédula`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 248
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `si_lbgpf`.`datos-laborales-padres`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `si_lbgpf`.`datos-laborales-padres` (
  `idDatos-laboralesPa` INT(11) NOT NULL AUTO_INCREMENT,
  `Empleo` VARCHAR(45) NOT NULL,
  `Lugar_Trabajo` VARCHAR(45) NOT NULL,
  `Remuneración` VARCHAR(45) NOT NULL,
  `Tipo_Remuneración` VARCHAR(45) NOT NULL,
  `idPadre` INT(11) NOT NULL,
  PRIMARY KEY (`idDatos-laboralesPa`),
  INDEX `idPadre` (`idPadre` ASC),
  CONSTRAINT `datos-laborales-padres_ibfk_1`
    FOREIGN KEY (`idPadre`)
    REFERENCES `si_lbgpf`.`padre` (`idPadre`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 291
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `si_lbgpf`.`estudiantes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `si_lbgpf`.`estudiantes` (
  `idEstudiantes` INT(11) NOT NULL AUTO_INCREMENT,
  `Plantel_Procedencia` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Con_Quién_Vive` VARCHAR(25) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Cédula_Persona` VARCHAR(15) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `idRepresentante` INT(11) NOT NULL,
  `Relación_Representante` VARCHAR(20) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `idPadre` INT(11) NOT NULL,
  `idMadre` INT(20) NOT NULL,
  PRIMARY KEY (`idEstudiantes`, `Cédula_Persona`, `idRepresentante`, `idPadre`),
  INDEX `Cedula_Persona_idx` (`Cédula_Persona` ASC),
  INDEX `id_Representante_idx` (`idRepresentante` ASC),
  INDEX `fk_estudiantes_Padre1_idx` (`idPadre` ASC),
  INDEX `fk_estudiantes_Madre1` (`idMadre` ASC),
  CONSTRAINT `fk_Personas_Estudiantes`
    FOREIGN KEY (`Cédula_Persona`)
    REFERENCES `si_lbgpf`.`personas` (`Cédula`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Representantes_Estudiantes`
    FOREIGN KEY (`idRepresentante`)
    REFERENCES `si_lbgpf`.`representantes` (`idRepresentantes`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_estudiantes_Madre1`
    FOREIGN KEY (`idMadre`)
    REFERENCES `si_lbgpf`.`madre` (`idMadre`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_estudiantes_Padre1`
    FOREIGN KEY (`idPadre`)
    REFERENCES `si_lbgpf`.`padre` (`idPadre`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 252
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `si_lbgpf`.`datos-salud`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `si_lbgpf`.`datos-salud` (
  `idDatos-Médicos` INT(11) NOT NULL AUTO_INCREMENT,
  `Estatura` INT(11) NOT NULL,
  `Peso` INT(11) NOT NULL,
  `Índice` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Circ_Braquial` INT(11) NOT NULL,
  `Lateralidad` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Tipo_Sangre` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Vacunado` VARCHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Vacuna` VARCHAR(30) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Dosis` INT(10) NOT NULL,
  `Lote` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Medicación` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Dieta_Especial` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Enfermedad` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Impedimento_Físico` VARCHAR(60) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Necesidad_educativa` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Alergias` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Cond_Vista` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Cond_Dental` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Institución_Médica` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Carnet_Discapacidad` VARCHAR(20) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `idEstudiantes` INT(11) NOT NULL,
  PRIMARY KEY (`idDatos-Médicos`, `idEstudiantes`),
  UNIQUE INDEX `idEstudiantes` (`idEstudiantes` ASC),
  INDEX `idUsuarios_idx` (`idEstudiantes` ASC),
  CONSTRAINT `fk_Estudiantes_Datos-Medicos`
    FOREIGN KEY (`idEstudiantes`)
    REFERENCES `si_lbgpf`.`estudiantes` (`idEstudiantes`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 252
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `si_lbgpf`.`datos-sociales`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `si_lbgpf`.`datos-sociales` (
  `idDatos-Sociales` INT(11) NOT NULL AUTO_INCREMENT,
  `Posee_Canaima` CHAR(2) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Condición_Canaima` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Acceso_Internet` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `idEstudiantes` INT(11) NOT NULL,
  PRIMARY KEY (`idDatos-Sociales`, `idEstudiantes`),
  UNIQUE INDEX `idEstudiantes` (`idEstudiantes` ASC),
  INDEX `idEstudiantes_idx` (`idEstudiantes` ASC),
  CONSTRAINT `fk_Estudiantes_Datos-Sociales`
    FOREIGN KEY (`idEstudiantes`)
    REFERENCES `si_lbgpf`.`estudiantes` (`idEstudiantes`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 252
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `si_lbgpf`.`datos-tallas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `si_lbgpf`.`datos-tallas` (
  `idDatos-Tallas` INT(11) NOT NULL AUTO_INCREMENT,
  `Talla_Camisa` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Talla_Pantalón` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Talla_Zapatos` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `idEstudiantes` INT(11) NOT NULL,
  PRIMARY KEY (`idDatos-Tallas`, `idEstudiantes`),
  UNIQUE INDEX `idEstudiantes` (`idEstudiantes` ASC),
  INDEX `idEstudiantes_idx` (`idEstudiantes` ASC),
  CONSTRAINT `fk_Estudiantes_Datos-Tallas`
    FOREIGN KEY (`idEstudiantes`)
    REFERENCES `si_lbgpf`.`estudiantes` (`idEstudiantes`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 252
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `si_lbgpf`.`datos-vivienda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `si_lbgpf`.`datos-vivienda` (
  `idDatos-vivienda` INT(11) NOT NULL AUTO_INCREMENT,
  `Condiciones_Vivienda` VARCHAR(25) NOT NULL,
  `Tipo_Vivienda` VARCHAR(25) NOT NULL,
  `Tenencia_vivienda` VARCHAR(25) NOT NULL,
  `idRepresentante` INT(11) NOT NULL,
  PRIMARY KEY (`idDatos-vivienda`),
  UNIQUE INDEX `idRepresentante` (`idRepresentante` ASC),
  INDEX `fk_representantes_vivienda` (`idRepresentante` ASC),
  CONSTRAINT `fk_representantes_vivienda`
    FOREIGN KEY (`idRepresentante`)
    REFERENCES `si_lbgpf`.`representantes` (`idRepresentantes`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 224
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `si_lbgpf`.`datos-vivienda-madres`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `si_lbgpf`.`datos-vivienda-madres` (
  `idDatos-viviendaMa` INT(11) NOT NULL AUTO_INCREMENT,
  `Condiciones_Vivienda` VARCHAR(25) NOT NULL,
  `Tipo_Vivienda` VARCHAR(25) NOT NULL,
  `Tenencia_Vivienda` VARCHAR(25) NOT NULL,
  `idMadre` INT(11) NOT NULL,
  PRIMARY KEY (`idDatos-viviendaMa`),
  UNIQUE INDEX `idRepresentante` (`idMadre` ASC),
  INDEX `fk_representantes_vivienda` (`idMadre` ASC),
  CONSTRAINT `datos-vivienda-madres_ibfk_1`
    FOREIGN KEY (`idMadre`)
    REFERENCES `si_lbgpf`.`madre` (`idMadre`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 351
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `si_lbgpf`.`datos-vivienda-padres`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `si_lbgpf`.`datos-vivienda-padres` (
  `idDatos-viviendaPa` INT(11) NOT NULL AUTO_INCREMENT,
  `Condiciones_Vivienda` VARCHAR(25) NOT NULL,
  `Tipo_Vivienda` VARCHAR(25) NOT NULL,
  `Tenencia_Vivienda` VARCHAR(25) NOT NULL,
  `idPadre` INT(11) NOT NULL,
  PRIMARY KEY (`idDatos-viviendaPa`),
  UNIQUE INDEX `idRepresentante` (`idPadre` ASC),
  INDEX `fk_representantes_vivienda` (`idPadre` ASC),
  INDEX `idPadre` (`idPadre` ASC),
  CONSTRAINT `datos-vivienda-padres_ibfk_1`
    FOREIGN KEY (`idPadre`)
    REFERENCES `si_lbgpf`.`padre` (`idPadre`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 481
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `si_lbgpf`.`estudiantes-observaciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `si_lbgpf`.`estudiantes-observaciones` (
  `idObservaciones` INT(11) NOT NULL AUTO_INCREMENT,
  `Social` TEXT NULL DEFAULT NULL,
  `Físico` TEXT NULL DEFAULT NULL,
  `Personal` TEXT NULL DEFAULT NULL,
  `Familiar` TEXT NULL DEFAULT NULL,
  `Académico` TEXT NULL DEFAULT NULL,
  `Otra` TEXT NULL DEFAULT NULL,
  `idEstudiantes` INT(11) NOT NULL,
  PRIMARY KEY (`idObservaciones`),
  INDEX `fk_estudiantes_observaciones` (`idEstudiantes` ASC),
  CONSTRAINT `fk_estudiantes_observaciones`
    FOREIGN KEY (`idEstudiantes`)
    REFERENCES `si_lbgpf`.`estudiantes` (`idEstudiantes`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 252
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `si_lbgpf`.`estudiantes-repitentes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `si_lbgpf`.`estudiantes-repitentes` (
  `idEstudiante-Repitente` INT(11) NOT NULL AUTO_INCREMENT,
  `Materias_Pendientes` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Año_Repetido` VARCHAR(20) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Que_Materias_Repite` VARCHAR(75) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `idEstudiante` INT(11) NOT NULL,
  PRIMARY KEY (`idEstudiante-Repitente`, `idEstudiante`),
  INDEX `idEstudiantes_idx` (`idEstudiante` ASC),
  CONSTRAINT `fk_Estudiantes_Materias-Pendientes`
    FOREIGN KEY (`idEstudiante`)
    REFERENCES `si_lbgpf`.`estudiantes` (`idEstudiantes`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 269
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `si_lbgpf`.`grado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `si_lbgpf`.`grado` (
  `idGrado` INT(11) NOT NULL AUTO_INCREMENT,
  `Grado_A_Cursar` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `idEstudiantes` INT(11) NOT NULL,
  `idAño-Escolar` INT(11) NOT NULL,
  PRIMARY KEY (`idGrado`, `idEstudiantes`, `idAño-Escolar`),
  INDEX `idEstudiante_idx` (`idEstudiantes` ASC),
  INDEX `fk_Año-Escolar_Grado` (`idAño-Escolar` ASC),
  CONSTRAINT `fk_Año-Escolar_Grado`
    FOREIGN KEY (`idAño-Escolar`)
    REFERENCES `si_lbgpf`.`año-escolar` (`idAño-Escolar`),
  CONSTRAINT `fk_Estudiantes_Grado`
    FOREIGN KEY (`idEstudiantes`)
    REFERENCES `si_lbgpf`.`estudiantes` (`idEstudiantes`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 252
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `si_lbgpf`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `si_lbgpf`.`usuarios` (
  `idUsuarios` INT(11) NOT NULL AUTO_INCREMENT,
  `Clave` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Privilegios` INT(11) NOT NULL,
  `Pregunta_Seg_1` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Pregunta_Seg_2` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Respuesta_1` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Respuesta_2` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Cédula_Persona` VARCHAR(15) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  PRIMARY KEY (`idUsuarios`),
  UNIQUE INDEX `Cedula_Persona` (`Cédula_Persona` ASC),
  INDEX `Cedula_Persona_idx` (`Cédula_Persona` ASC),
  CONSTRAINT `fk_personas_usuarios`
    FOREIGN KEY (`Cédula_Persona`)
    REFERENCES `si_lbgpf`.`personas` (`Cédula`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 14
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `si_lbgpf`.`inscripciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `si_lbgpf`.`inscripciones` (
  `idInscripciones` INT(11) NOT NULL AUTO_INCREMENT,
  `Fecha_Inscripción` VARCHAR(12) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `Hora_Inscripción` VARCHAR(12) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  `idUsuario` INT(11) NOT NULL,
  `idEstudiante` INT(11) NOT NULL,
  PRIMARY KEY (`idInscripciones`, `idUsuario`, `idEstudiante`),
  INDEX `idEstudiante_idx` (`idEstudiante` ASC),
  INDEX `idUsuarios_idx` (`idUsuario` ASC),
  CONSTRAINT `fk_Estudiantes_Inscripciones`
    FOREIGN KEY (`idEstudiante`)
    REFERENCES `si_lbgpf`.`estudiantes` (`idEstudiantes`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Usuarios_Inscripciones`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `si_lbgpf`.`usuarios` (`idUsuarios`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 268
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `si_lbgpf`.`respaldos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `si_lbgpf`.`respaldos` (
  `idRespaldo` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Respaldo` VARCHAR(200) NOT NULL,
  `Fecha_Respaldo` VARCHAR(50) NOT NULL,
  `Hora_Respaldo` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idRespaldo`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `si_lbgpf`.`teléfonos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `si_lbgpf`.`teléfonos` (
  `idTeléfonos` INT(11) NOT NULL AUTO_INCREMENT,
  `Prefijo` VARCHAR(4) NULL DEFAULT NULL,
  `Número_Telefónico` VARCHAR(10) NULL DEFAULT NULL,
  `Relación_Teléfono` VARCHAR(20) NOT NULL,
  `Cédula_Persona` VARCHAR(15) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
  PRIMARY KEY (`idTeléfonos`),
  INDEX `fk_personas_teléfonos` (`Cédula_Persona` ASC),
  CONSTRAINT `fk_personas_teléfonos`
    FOREIGN KEY (`Cédula_Persona`)
    REFERENCES `si_lbgpf`.`personas` (`Cédula`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 2591
DEFAULT CHARACTER SET = utf8mb4;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
