-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema sis_reg_lb_gpf_v2
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `sis_reg_lb_gpf_v2` ;

-- -----------------------------------------------------
-- Schema sis_reg_lb_gpf_v2
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `sis_reg_lb_gpf_v2` DEFAULT CHARACTER SET utf8 ;
USE `sis_reg_lb_gpf_v2` ;

-- -----------------------------------------------------
-- Table `sis_reg_lb_gpf_v2`.`personas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sis_reg_lb_gpf_v2`.`personas` ;

CREATE TABLE IF NOT EXISTS `sis_reg_lb_gpf_v2`.`personas` (
  `cedula` VARCHAR(45) NOT NULL,
  `p_nombre` VARCHAR(45) NOT NULL,
  `s_nombre` VARCHAR(45) NOT NULL,
  `p_apellido` VARCHAR(45) NOT NULL,
  `s_apellido` VARCHAR(45) NOT NULL,
  `fecha_nacimiento` DATE NOT NULL,
  `lugar_nacimiento` TEXT NOT NULL,
  `genero` CHAR(2) NOT NULL,
  `estado_civil` VARCHAR(45) NOT NULL,
  `email` VARCHAR(60) NOT NULL,
  `grado_academico` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cedula`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `cedula_UNIQUE` ON `sis_reg_lb_gpf_v2`.`personas` (`cedula` ASC);


-- -----------------------------------------------------
-- Table `sis_reg_lb_gpf_v2`.`direcciones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sis_reg_lb_gpf_v2`.`direcciones` ;

CREATE TABLE IF NOT EXISTS `sis_reg_lb_gpf_v2`.`direcciones` (
  `cedula_persona` VARCHAR(45) NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  `municipio` VARCHAR(45) NOT NULL,
  `parroquia` VARCHAR(45) NOT NULL,
  `sector` VARCHAR(45) NOT NULL,
  `calle` VARCHAR(45) NOT NULL,
  `nro_casa` VARCHAR(45) NOT NULL,
  `punto_referencia` TEXT NOT NULL,
  PRIMARY KEY (`cedula_persona`),
  CONSTRAINT `fk_direcciones_personas1`
    FOREIGN KEY (`cedula_persona`)
    REFERENCES `sis_reg_lb_gpf_v2`.`personas` (`cedula`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sis_reg_lb_gpf_v2`.`carnet_patria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sis_reg_lb_gpf_v2`.`carnet_patria` ;

CREATE TABLE IF NOT EXISTS `sis_reg_lb_gpf_v2`.`carnet_patria` (
  `cedula_persona` VARCHAR(45) NOT NULL,
  `codigo_carnet` VARCHAR(45) NOT NULL,
  `serial_carnet` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cedula_persona`),
  CONSTRAINT `fk_carnet_patria_personas1`
    FOREIGN KEY (`cedula_persona`)
    REFERENCES `sis_reg_lb_gpf_v2`.`personas` (`cedula`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `cedula_persona_UNIQUE` ON `sis_reg_lb_gpf_v2`.`carnet_patria` (`cedula_persona` ASC);


-- -----------------------------------------------------
-- Table `sis_reg_lb_gpf_v2`.`telefonos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sis_reg_lb_gpf_v2`.`telefonos` ;

CREATE TABLE IF NOT EXISTS `sis_reg_lb_gpf_v2`.`telefonos` (
  `cedula_persona` VARCHAR(45) NOT NULL,
  `relacion` VARCHAR(45) NOT NULL,
  `prefijo` VARCHAR(45) NOT NULL,
  `numero` VARCHAR(45) NOT NULL,
  CONSTRAINT `fk_telefonos_personas1`
    FOREIGN KEY (`cedula_persona`)
    REFERENCES `sis_reg_lb_gpf_v2`.`personas` (`cedula`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sis_reg_lb_gpf_v2`.`usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sis_reg_lb_gpf_v2`.`usuarios` ;

CREATE TABLE IF NOT EXISTS `sis_reg_lb_gpf_v2`.`usuarios` (
  `cedula_persona` VARCHAR(45) NOT NULL,
  `rol` VARCHAR(45) NOT NULL,
  `privilegios` VARCHAR(45) NOT NULL,
  `contraseña` VARCHAR(45) NOT NULL,
  `pregunta_seg_1` VARCHAR(45) NOT NULL,
  `respuesta_1` VARCHAR(45) NOT NULL,
  `pregunta_seg_2` VARCHAR(45) NOT NULL,
  `respuesta_2` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cedula_persona`),
  CONSTRAINT `fk_usuarios_personas1`
    FOREIGN KEY (`cedula_persona`)
    REFERENCES `sis_reg_lb_gpf_v2`.`personas` (`cedula`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE INDEX `fk_usuarios_personas1_idx` ON `sis_reg_lb_gpf_v2`.`usuarios` (`cedula_persona` ASC);

CREATE UNIQUE INDEX `cedula_persona_UNIQUE` ON `sis_reg_lb_gpf_v2`.`usuarios` (`cedula_persona` ASC);


-- -----------------------------------------------------
-- Table `sis_reg_lb_gpf_v2`.`padres`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sis_reg_lb_gpf_v2`.`padres` ;

CREATE TABLE IF NOT EXISTS `sis_reg_lb_gpf_v2`.`padres` (
  `cedula_persona` VARCHAR(45) NOT NULL,
  `pais_residencia` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cedula_persona`),
  CONSTRAINT `fk_padres_personas1`
    FOREIGN KEY (`cedula_persona`)
    REFERENCES `sis_reg_lb_gpf_v2`.`personas` (`cedula`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `cedula_persona_UNIQUE` ON `sis_reg_lb_gpf_v2`.`padres` (`cedula_persona` ASC);


-- -----------------------------------------------------
-- Table `sis_reg_lb_gpf_v2`.`representantes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sis_reg_lb_gpf_v2`.`representantes` ;

CREATE TABLE IF NOT EXISTS `sis_reg_lb_gpf_v2`.`representantes` (
  `cedula_persona` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cedula_persona`),
  CONSTRAINT `fk_representantes_personas1`
    FOREIGN KEY (`cedula_persona`)
    REFERENCES `sis_reg_lb_gpf_v2`.`personas` (`cedula`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `cedula_persona_UNIQUE` ON `sis_reg_lb_gpf_v2`.`representantes` (`cedula_persona` ASC);


-- -----------------------------------------------------
-- Table `sis_reg_lb_gpf_v2`.`datos_laborales`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sis_reg_lb_gpf_v2`.`datos_laborales` ;

CREATE TABLE IF NOT EXISTS `sis_reg_lb_gpf_v2`.`datos_laborales` (
  `cedula_persona` VARCHAR(45) NOT NULL,
  `empleo` VARCHAR(45) NOT NULL,
  `lugar_trabajo` VARCHAR(45) NOT NULL,
  `remuneracion` VARCHAR(45) NOT NULL,
  `tipo_remuneracion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cedula_persona`),
  CONSTRAINT `fk_datos_laborales_personas1`
    FOREIGN KEY (`cedula_persona`)
    REFERENCES `sis_reg_lb_gpf_v2`.`personas` (`cedula`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `cedula_persona_UNIQUE` ON `sis_reg_lb_gpf_v2`.`datos_laborales` (`cedula_persona` ASC);


-- -----------------------------------------------------
-- Table `sis_reg_lb_gpf_v2`.`datos_vivienda`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sis_reg_lb_gpf_v2`.`datos_vivienda` ;

CREATE TABLE IF NOT EXISTS `sis_reg_lb_gpf_v2`.`datos_vivienda` (
  `cedula_persona` VARCHAR(45) NOT NULL,
  `condicion` VARCHAR(45) NOT NULL,
  `tipo` VARCHAR(45) NOT NULL,
  `tenencia` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cedula_persona`),
  CONSTRAINT `fk_datos_vivienda_personas1`
    FOREIGN KEY (`cedula_persona`)
    REFERENCES `sis_reg_lb_gpf_v2`.`personas` (`cedula`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `cedula_persona_UNIQUE` ON `sis_reg_lb_gpf_v2`.`datos_vivienda` (`cedula_persona` ASC);


-- -----------------------------------------------------
-- Table `sis_reg_lb_gpf_v2`.`datos_economicos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sis_reg_lb_gpf_v2`.`datos_economicos` ;

CREATE TABLE IF NOT EXISTS `sis_reg_lb_gpf_v2`.`datos_economicos` (
  `cedula_representante` VARCHAR(45) NOT NULL,
  `banco` VARCHAR(240) NOT NULL,
  `tipo_cuenta` VARCHAR(45) NOT NULL,
  `nro_cuenta` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cedula_representante`),
  CONSTRAINT `fk_datos_economicos_representantes1`
    FOREIGN KEY (`cedula_representante`)
    REFERENCES `sis_reg_lb_gpf_v2`.`representantes` (`cedula_persona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `cedula_representante_UNIQUE` ON `sis_reg_lb_gpf_v2`.`datos_economicos` (`cedula_representante` ASC);


-- -----------------------------------------------------
-- Table `sis_reg_lb_gpf_v2`.`contactos_aux`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sis_reg_lb_gpf_v2`.`contactos_aux` ;

CREATE TABLE IF NOT EXISTS `sis_reg_lb_gpf_v2`.`contactos_aux` (
  `cedula_representante` VARCHAR(45) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `prefijo_telefono` VARCHAR(45) NOT NULL,
  `nro_telefono` VARCHAR(45) NOT NULL,
  `relacion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cedula_representante`),
  CONSTRAINT `fk_contactos_aux_representantes1`
    FOREIGN KEY (`cedula_representante`)
    REFERENCES `sis_reg_lb_gpf_v2`.`representantes` (`cedula_persona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `cedula_representante_UNIQUE` ON `sis_reg_lb_gpf_v2`.`contactos_aux` (`cedula_representante` ASC);


-- -----------------------------------------------------
-- Table `sis_reg_lb_gpf_v2`.`estudiantes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sis_reg_lb_gpf_v2`.`estudiantes` ;

CREATE TABLE IF NOT EXISTS `sis_reg_lb_gpf_v2`.`estudiantes` (
  `cedula_persona` VARCHAR(45) NOT NULL,
  `cedula_escolar` VARCHAR(45) NOT NULL,
  `plantel_proced` TEXT NOT NULL,
  `con_quien_vive` VARCHAR(45) NOT NULL,
  `relacion_representante` VARCHAR(45) NOT NULL,
  `cedula_padre` VARCHAR(45) NOT NULL,
  `cedula_madre` VARCHAR(45) NOT NULL,
  `cedula_representante` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cedula_persona`, `cedula_padre`, `cedula_madre`, `cedula_representante`),
  CONSTRAINT `fk_estudiantes_padres1`
    FOREIGN KEY (`cedula_padre`)
    REFERENCES `sis_reg_lb_gpf_v2`.`padres` (`cedula_persona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_estudiantes_padres2`
    FOREIGN KEY (`cedula_madre`)
    REFERENCES `sis_reg_lb_gpf_v2`.`padres` (`cedula_persona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_estudiantes_personas1`
    FOREIGN KEY (`cedula_persona`)
    REFERENCES `sis_reg_lb_gpf_v2`.`personas` (`cedula`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_estudiantes_representantes1`
    FOREIGN KEY (`cedula_representante`)
    REFERENCES `sis_reg_lb_gpf_v2`.`representantes` (`cedula_persona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE INDEX `fk_estudiantes_padres1_idx` ON `sis_reg_lb_gpf_v2`.`estudiantes` (`cedula_padre` ASC);

CREATE INDEX `fk_estudiantes_padres2_idx` ON `sis_reg_lb_gpf_v2`.`estudiantes` (`cedula_madre` ASC);

CREATE INDEX `fk_estudiantes_personas1_idx` ON `sis_reg_lb_gpf_v2`.`estudiantes` (`cedula_persona` ASC);

CREATE INDEX `fk_estudiantes_representantes1_idx` ON `sis_reg_lb_gpf_v2`.`estudiantes` (`cedula_representante` ASC);

CREATE UNIQUE INDEX `cedula_persona_UNIQUE` ON `sis_reg_lb_gpf_v2`.`estudiantes` (`cedula_persona` ASC);


-- -----------------------------------------------------
-- Table `sis_reg_lb_gpf_v2`.`observaciones_est`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sis_reg_lb_gpf_v2`.`observaciones_est` ;

CREATE TABLE IF NOT EXISTS `sis_reg_lb_gpf_v2`.`observaciones_est` (
  `cedula_estudiante` VARCHAR(45) NOT NULL,
  `social` TEXT NOT NULL,
  `fisico` TEXT NOT NULL,
  `personal` TEXT NOT NULL,
  `familiar` TEXT NOT NULL,
  `academico` TEXT NOT NULL,
  `otra` TEXT NOT NULL,
  PRIMARY KEY (`cedula_estudiante`),
  CONSTRAINT `fk_observaciones_est_estudiantes1`
    FOREIGN KEY (`cedula_estudiante`)
    REFERENCES `sis_reg_lb_gpf_v2`.`estudiantes` (`cedula_persona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `cedula_estudiante_UNIQUE` ON `sis_reg_lb_gpf_v2`.`observaciones_est` (`cedula_estudiante` ASC);


-- -----------------------------------------------------
-- Table `sis_reg_lb_gpf_v2`.`datos_sociales`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sis_reg_lb_gpf_v2`.`datos_sociales` ;

CREATE TABLE IF NOT EXISTS `sis_reg_lb_gpf_v2`.`datos_sociales` (
  `cedula_estudiante` VARCHAR(45) NOT NULL,
  `tiene_canaima` VARCHAR(45) NOT NULL,
  `condicion_canaima` VARCHAR(45) NOT NULL,
  `acceso_internet` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cedula_estudiante`),
  CONSTRAINT `fk_datos_sociales_estudiantes1`
    FOREIGN KEY (`cedula_estudiante`)
    REFERENCES `sis_reg_lb_gpf_v2`.`estudiantes` (`cedula_persona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `cedula_estudiante_UNIQUE` ON `sis_reg_lb_gpf_v2`.`datos_sociales` (`cedula_estudiante` ASC);


-- -----------------------------------------------------
-- Table `sis_reg_lb_gpf_v2`.`datos_salud`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sis_reg_lb_gpf_v2`.`datos_salud` ;

CREATE TABLE IF NOT EXISTS `sis_reg_lb_gpf_v2`.`datos_salud` (
  `cedula_estudiante` VARCHAR(45) NOT NULL,
  `lateralidad` VARCHAR(45) NOT NULL,
  `tipo_sangre` VARCHAR(45) NOT NULL,
  `medicacion` TEXT NOT NULL,
  `dieta_especial` TEXT NOT NULL,
  `padecimiento` TEXT NOT NULL,
  `impedimento_fisico` TEXT NOT NULL,
  `necesidad_educativa` TEXT NOT NULL,
  `condicion_vista` VARCHAR(45) NOT NULL,
  `condicion_dental` VARCHAR(45) NOT NULL,
  `institucion_medica` VARCHAR(45) NOT NULL,
  `carnet_discapacidad` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cedula_estudiante`),
  CONSTRAINT `fk_datos_salud_estudiantes1`
    FOREIGN KEY (`cedula_estudiante`)
    REFERENCES `sis_reg_lb_gpf_v2`.`estudiantes` (`cedula_persona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sis_reg_lb_gpf_v2`.`tallas_est`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sis_reg_lb_gpf_v2`.`tallas_est` ;

CREATE TABLE IF NOT EXISTS `sis_reg_lb_gpf_v2`.`tallas_est` (
  `cedula_estudiante` VARCHAR(45) NOT NULL,
  `camisa` VARCHAR(45) NOT NULL,
  `pantalon` VARCHAR(45) NOT NULL,
  `calzado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cedula_estudiante`),
  CONSTRAINT `fk_tallas_est_datos_salud1`
    FOREIGN KEY (`cedula_estudiante`)
    REFERENCES `sis_reg_lb_gpf_v2`.`datos_salud` (`cedula_estudiante`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `cedula_estudiante_UNIQUE` ON `sis_reg_lb_gpf_v2`.`tallas_est` (`cedula_estudiante` ASC);


-- -----------------------------------------------------
-- Table `sis_reg_lb_gpf_v2`.`antropometria_est`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sis_reg_lb_gpf_v2`.`antropometria_est` ;

CREATE TABLE IF NOT EXISTS `sis_reg_lb_gpf_v2`.`antropometria_est` (
  `cedula_estudiante` VARCHAR(45) NOT NULL,
  `estatura` INT NOT NULL,
  `peso` FLOAT NOT NULL,
  `indice_m_c` FLOAT NOT NULL,
  `circ_braquial` FLOAT NOT NULL,
  PRIMARY KEY (`cedula_estudiante`),
  CONSTRAINT `fk_antropometria_est_datos_salud1`
    FOREIGN KEY (`cedula_estudiante`)
    REFERENCES `sis_reg_lb_gpf_v2`.`datos_salud` (`cedula_estudiante`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `cedula_estudiante_UNIQUE` ON `sis_reg_lb_gpf_v2`.`antropometria_est` (`cedula_estudiante` ASC);


-- -----------------------------------------------------
-- Table `sis_reg_lb_gpf_v2`.`vac_covid19_est`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sis_reg_lb_gpf_v2`.`vac_covid19_est` ;

CREATE TABLE IF NOT EXISTS `sis_reg_lb_gpf_v2`.`vac_covid19_est` (
  `cedula_estudiante` VARCHAR(45) NOT NULL,
  `vac_aplicada` TEXT NOT NULL,
  `dosis` INT NOT NULL,
  `lote` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cedula_estudiante`),
  CONSTRAINT `fk_vac_covid19_est_datos_salud1`
    FOREIGN KEY (`cedula_estudiante`)
    REFERENCES `sis_reg_lb_gpf_v2`.`datos_salud` (`cedula_estudiante`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `cedula_estudiante_UNIQUE` ON `sis_reg_lb_gpf_v2`.`vac_covid19_est` (`cedula_estudiante` ASC);


-- -----------------------------------------------------
-- Table `sis_reg_lb_gpf_v2`.`condiciones_est`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sis_reg_lb_gpf_v2`.`condiciones_est` ;

CREATE TABLE IF NOT EXISTS `sis_reg_lb_gpf_v2`.`condiciones_est` (
  `cedula_estudiante` VARCHAR(45) NOT NULL,
  `visual` CHAR NOT NULL,
  `motora` CHAR NOT NULL,
  `auditiva` CHAR NOT NULL,
  `escritura` CHAR NOT NULL,
  `lectura` CHAR NOT NULL,
  `lenguaje` CHAR NOT NULL,
  `embarazo` CHAR NOT NULL,
  PRIMARY KEY (`cedula_estudiante`),
  CONSTRAINT `fk_condiciones_est_datos_salud1`
    FOREIGN KEY (`cedula_estudiante`)
    REFERENCES `sis_reg_lb_gpf_v2`.`datos_salud` (`cedula_estudiante`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `cedula_estudiante_UNIQUE` ON `sis_reg_lb_gpf_v2`.`condiciones_est` (`cedula_estudiante` ASC);


-- -----------------------------------------------------
-- Table `sis_reg_lb_gpf_v2`.`vacunas_est`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sis_reg_lb_gpf_v2`.`vacunas_est` ;

CREATE TABLE IF NOT EXISTS `sis_reg_lb_gpf_v2`.`vacunas_est` (
  `cedula_estudiante` VARCHAR(45) NOT NULL,
  `espec_vacuna` VARCHAR(45) NOT NULL,
  `estado_vacuna` VARCHAR(45) NOT NULL,
  CONSTRAINT `fk_vacunas_est_datos_salud1`
    FOREIGN KEY (`cedula_estudiante`)
    REFERENCES `sis_reg_lb_gpf_v2`.`datos_salud` (`cedula_estudiante`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sis_reg_lb_gpf_v2`.`per_academico`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sis_reg_lb_gpf_v2`.`per_academico` ;

CREATE TABLE IF NOT EXISTS `sis_reg_lb_gpf_v2`.`per_academico` (
  `id_per_academico` VARCHAR(10) NOT NULL,
  `inicio` VARCHAR(45) NOT NULL,
  `fin` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_per_academico`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sis_reg_lb_gpf_v2`.`grado_a_cursar_est`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sis_reg_lb_gpf_v2`.`grado_a_cursar_est` ;

CREATE TABLE IF NOT EXISTS `sis_reg_lb_gpf_v2`.`grado_a_cursar_est` (
  `cedula_estudiante` VARCHAR(45) NOT NULL,
  `grado_a_cursar` VARCHAR(45) NOT NULL,
  `seccion` VARCHAR(50) NOT NULL,
  `id_per_academico` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`cedula_estudiante`, `id_per_academico`),
  CONSTRAINT `fk_grado_a_cursar_est_estudiantes1`
    FOREIGN KEY (`cedula_estudiante`)
    REFERENCES `sis_reg_lb_gpf_v2`.`estudiantes` (`cedula_persona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_grado_a_cursar_est_per_academico1`
    FOREIGN KEY (`id_per_academico`)
    REFERENCES `sis_reg_lb_gpf_v2`.`per_academico` (`id_per_academico`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE INDEX `fk_grado_a_cursar_est_per_academico1_idx` ON `sis_reg_lb_gpf_v2`.`grado_a_cursar_est` (`id_per_academico` ASC);


-- -----------------------------------------------------
-- Table `sis_reg_lb_gpf_v2`.`inscripciones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sis_reg_lb_gpf_v2`.`inscripciones` ;

CREATE TABLE IF NOT EXISTS `sis_reg_lb_gpf_v2`.`inscripciones` (
  `id_inscripcion` INT NOT NULL AUTO_INCREMENT,
  `fecha` VARCHAR(45) NOT NULL,
  `hora` VARCHAR(45) NOT NULL,
  `cedula_usuario` VARCHAR(45) NOT NULL,
  `cedula_estudiante` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_inscripcion`),
  CONSTRAINT `fk_inscripciones_usuarios1`
    FOREIGN KEY (`cedula_usuario`)
    REFERENCES `sis_reg_lb_gpf_v2`.`usuarios` (`cedula_persona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_inscripciones_estudiantes1`
    FOREIGN KEY (`cedula_estudiante`)
    REFERENCES `sis_reg_lb_gpf_v2`.`estudiantes` (`cedula_persona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE INDEX `fk_inscripciones_usuarios1_idx` ON `sis_reg_lb_gpf_v2`.`inscripciones` (`cedula_usuario` ASC);

CREATE INDEX `fk_inscripciones_estudiantes1_idx` ON `sis_reg_lb_gpf_v2`.`inscripciones` (`cedula_estudiante` ASC);


-- -----------------------------------------------------
-- Table `sis_reg_lb_gpf_v2`.`bitacora`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sis_reg_lb_gpf_v2`.`bitacora` ;

CREATE TABLE IF NOT EXISTS `sis_reg_lb_gpf_v2`.`bitacora` (
  `id_bitacora` INT NOT NULL AUTO_INCREMENT,
  `fecha_ingreso` DATE NOT NULL,
  `fecha_salida` DATE NOT NULL,
  `hora_ingreso` TIME NOT NULL,
  `hora_salida` TIME NOT NULL,
  `acciones_realizadas` TEXT NOT NULL,
  `cedula_usuario` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_bitacora`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sis_reg_lb_gpf_v2`.`datos_academicos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sis_reg_lb_gpf_v2`.`datos_academicos` ;

CREATE TABLE IF NOT EXISTS `sis_reg_lb_gpf_v2`.`datos_academicos` (
  `cedula_estudiante` VARCHAR(45) NOT NULL,
  `a_repetido` VARCHAR(45) NOT NULL,
  `materias_repetidas` TEXT NOT NULL,
  `materias_pendientes` TEXT NOT NULL,
  PRIMARY KEY (`cedula_estudiante`),
  CONSTRAINT `fk_datos_academicos_estudiantes1`
    FOREIGN KEY (`cedula_estudiante`)
    REFERENCES `sis_reg_lb_gpf_v2`.`estudiantes` (`cedula_persona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

USE `sis_reg_lb_gpf_v2` ;

-- -----------------------------------------------------
-- Placeholder table for view `sis_reg_lb_gpf_v2`.`vista_usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sis_reg_lb_gpf_v2`.`vista_usuarios` (`cedula` INT, `p_nombre` INT, `s_nombre` INT, `p_apellido` INT, `s_apellido` INT, `fecha_nacimiento` INT, `lugar_nacimiento` INT, `genero` INT, `estado_civil` INT, `email` INT, `grado_academico` INT, `cedula_persona` INT, `rol` INT, `privilegios` INT, `contraseña` INT, `pregunta_seg_1` INT, `respuesta_1` INT, `pregunta_seg_2` INT, `respuesta_2` INT);

-- -----------------------------------------------------
-- Placeholder table for view `sis_reg_lb_gpf_v2`.`vista_estudiantes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sis_reg_lb_gpf_v2`.`vista_estudiantes` (`cedula` INT, `p_nombre` INT, `s_nombre` INT, `p_apellido` INT, `s_apellido` INT, `fecha_nacimiento` INT, `lugar_nacimiento` INT, `genero` INT, `email` INT, `estado` INT, `municipio` INT, `parroquia` INT, `sector` INT, `calle` INT, `nro_casa` INT, `punto_referencia` INT, `codigo_carnet` INT, `serial_carnet` INT, `cedula_escolar` INT, `plantel_proced` INT, `con_quien_vive` INT, `relacion_representante` INT, `cedula_padre` INT, `cedula_madre` INT, `cedula_representante` INT, `lateralidad` INT, `tipo_sangre` INT, `medicacion` INT, `dieta_especial` INT, `padecimiento` INT, `impedimento_fisico` INT, `necesidad_educativa` INT, `condicion_vista` INT, `condicion_dental` INT, `institucion_medica` INT, `carnet_discapacidad` INT, `vac_aplicada` INT, `dosis` INT, `lote` INT, `camisa` INT, `pantalon` INT, `calzado` INT, `estatura` INT, `peso` INT, `indice_m_c` INT, `circ_braquial` INT, `visual` INT, `motora` INT, `auditiva` INT, `escritura` INT, `lectura` INT, `lenguaje` INT, `embarazo` INT, `social` INT, `fisico` INT, `personal` INT, `familiar` INT, `academico` INT, `otra` INT, `grado_repetido` INT, `materias_repetidas` INT, `materias_pendientes` INT, `tiene_canaima` INT, `condicion_canaima` INT, `acceso_internet` INT, `grado_a_cursar` INT, `seccion` INT, `id_per_academico` INT);

-- -----------------------------------------------------
-- Placeholder table for view `sis_reg_lb_gpf_v2`.`vista_representantes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sis_reg_lb_gpf_v2`.`vista_representantes` (`cedula` INT, `p_nombre` INT, `s_nombre` INT, `p_apellido` INT, `s_apellido` INT, `fecha_nacimiento` INT, `lugar_nacimiento` INT, `genero` INT, `estado_civil` INT, `email` INT, `grado_academico` INT, `estado` INT, `municipio` INT, `parroquia` INT, `sector` INT, `calle` INT, `nro_casa` INT, `punto_referencia` INT, `codigo_carnet` INT, `serial_carnet` INT, `empleo` INT, `lugar_trabajo` INT, `remuneracion` INT, `tipo_remuneracion` INT, `condicion` INT, `tipo` INT, `tenencia` INT, `banco` INT, `tipo_cuenta` INT, `nro_cuenta` INT, `nombre_aux` INT, `apellido_aux` INT, `pref_aux` INT, `numero_aux` INT, `relacion_aux` INT);

-- -----------------------------------------------------
-- Placeholder table for view `sis_reg_lb_gpf_v2`.`vista_padres`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sis_reg_lb_gpf_v2`.`vista_padres` (`cedula` INT, `p_nombre` INT, `s_nombre` INT, `p_apellido` INT, `s_apellido` INT, `fecha_nacimiento` INT, `lugar_nacimiento` INT, `genero` INT, `estado_civil` INT, `email` INT, `grado_academico` INT, `estado` INT, `municipio` INT, `parroquia` INT, `sector` INT, `calle` INT, `nro_casa` INT, `punto_referencia` INT, `empleo` INT, `lugar_trabajo` INT, `remuneracion` INT, `tipo_remuneracion` INT, `condicion` INT, `tipo` INT, `tenencia` INT, `pais_residencia` INT);

-- -----------------------------------------------------
-- View `sis_reg_lb_gpf_v2`.`vista_usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sis_reg_lb_gpf_v2`.`vista_usuarios`;
DROP VIEW IF EXISTS `sis_reg_lb_gpf_v2`.`vista_usuarios` ;
USE `sis_reg_lb_gpf_v2`;
CREATE  OR REPLACE VIEW `vista_usuarios` AS
    SELECT 
        *
    FROM
        `personas`,
        `usuarios`
    WHERE
        `personas`.`cedula` = `usuarios`.`cedula_persona`;

-- -----------------------------------------------------
-- View `sis_reg_lb_gpf_v2`.`vista_estudiantes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sis_reg_lb_gpf_v2`.`vista_estudiantes`;
DROP VIEW IF EXISTS `sis_reg_lb_gpf_v2`.`vista_estudiantes` ;
USE `sis_reg_lb_gpf_v2`;
CREATE  OR REPLACE VIEW `vista_estudiantes` AS

SELECT
    `personas`.`cedula`,
    `personas`.`p_nombre`,
    `personas`.`s_nombre`,
    `personas`.`p_apellido`,
    `personas`.`s_apellido`,
    `personas`.`fecha_nacimiento`,
    `personas`.`lugar_nacimiento`,
    `personas`.`genero`,
    `personas`.`email`,
    `direcciones`.`estado`,
    `direcciones`.`municipio`,
    `direcciones`.`parroquia`,
    `direcciones`.`sector`,
    `direcciones`.`calle`,
    `direcciones`.`nro_casa`,
    `direcciones`.`punto_referencia`,
    `carnet_patria`.`codigo_carnet`,
    `carnet_patria`.`serial_carnet`,
    `estudiantes`.`cedula_escolar`,
    `estudiantes`.`plantel_proced`,
    `estudiantes`.`con_quien_vive`,
    `estudiantes`.`relacion_representante`,
    `estudiantes`.`cedula_padre`,
    `estudiantes`.`cedula_madre`,
    `estudiantes`.`cedula_representante`,
    `datos_salud`.`lateralidad`,
    `datos_salud`.`tipo_sangre`,
    `datos_salud`.`medicacion`,
    `datos_salud`.`dieta_especial`,
    `datos_salud`.`padecimiento`,
    `datos_salud`.`impedimento_fisico`,
    `datos_salud`.`necesidad_educativa`,
    `datos_salud`.`condicion_vista`,
    `datos_salud`.`condicion_dental`,
    `datos_salud`.`institucion_medica`,
    `datos_salud`.`carnet_discapacidad`,
    
    `vac_covid19_est`.`vac_aplicada`,
    `vac_covid19_est`.`dosis`,
    `vac_covid19_est`.`lote`,
    
    `tallas_est`.`camisa`,
    `tallas_est`.`pantalon`,
    `tallas_est`.`calzado`,
    `antropometria_est`.`estatura`,
    `antropometria_est`.`peso`,
    `antropometria_est`.`indice_m_c`,
    `antropometria_est`.`circ_braquial`,
    `condiciones_est`.`visual`,
    `condiciones_est`.`motora`,
    `condiciones_est`.`auditiva`,
    `condiciones_est`.`escritura`,
    `condiciones_est`.`lectura`,
    `condiciones_est`.`lenguaje`,
    `condiciones_est`.`embarazo`,
    `observaciones_est`.`social`,
    `observaciones_est`.`fisico`,
    `observaciones_est`.`personal`,
    `observaciones_est`.`familiar`,
    `observaciones_est`.`academico`,
    `observaciones_est`.`otra`,
    `datos_academicos`.`a_repetido` as `grado_repetido`,
    `datos_academicos`.`materias_repetidas`,
    `datos_academicos`.`materias_pendientes`,
    `datos_sociales`.`tiene_canaima`,
    `datos_sociales`.`condicion_canaima`,
    `datos_sociales`.`acceso_internet`,
    `grado_a_cursar_est`.`grado_a_cursar`,
    `grado_a_cursar_est`.`seccion`,
    `grado_a_cursar_est`.`id_per_academico`
FROM
    `personas`,
    `estudiantes`,
    `direcciones`,
    `carnet_patria`,
    `datos_salud`,
    `vac_covid19_est`,
    `tallas_est`,
    `antropometria_est`,
    `condiciones_est`,
    `observaciones_est`,
    `datos_sociales`,
    `datos_academicos`,
    `grado_a_cursar_est`
WHERE
    `personas`.`cedula` = `direcciones`.`cedula_persona` AND `personas`.`cedula` = `carnet_patria`.`cedula_persona` AND `personas`.`cedula` = `estudiantes`.`cedula_persona` AND `personas`.`cedula` = `datos_salud`.`cedula_estudiante` AND `personas`.`cedula` = `vac_covid19_est`.`cedula_estudiante` AND
    `personas`.`cedula` = `tallas_est`.`cedula_estudiante` AND `personas`.`cedula` = `antropometria_est`.`cedula_estudiante` AND `personas`.`cedula` = `condiciones_est`.`cedula_estudiante` AND `personas`.`cedula` = `observaciones_est`.`cedula_estudiante` AND 
    `personas`.`cedula` = `datos_academicos`.`cedula_estudiante` AND 
    `personas`.`cedula` = `datos_sociales`.`cedula_estudiante` AND 
    `personas`.`cedula` = `grado_a_cursar_est`.`cedula_estudiante`;

-- -----------------------------------------------------
-- View `sis_reg_lb_gpf_v2`.`vista_representantes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sis_reg_lb_gpf_v2`.`vista_representantes`;
DROP VIEW IF EXISTS `sis_reg_lb_gpf_v2`.`vista_representantes` ;
USE `sis_reg_lb_gpf_v2`;
CREATE  OR REPLACE VIEW vista_representantes as
SELECT
    `personas`.`cedula`,
    `personas`.`p_nombre`,
    `personas`.`s_nombre`,
    `personas`.`p_apellido`,
    `personas`.`s_apellido`,
    `personas`.`fecha_nacimiento`,
    `personas`.`lugar_nacimiento`,
    `personas`.`genero`,
    `personas`.`estado_civil`,
    `personas`.`email`,
    `personas`.`grado_academico`,
    `direcciones`.`estado`,
    `direcciones`.`municipio`,
    `direcciones`.`parroquia`,
    `direcciones`.`sector`,
    `direcciones`.`calle`,
    `direcciones`.`nro_casa`,
    `direcciones`.`punto_referencia`,
    `carnet_patria`.`codigo_carnet`,
    `carnet_patria`.`serial_carnet`,

    `datos_laborales`.`empleo`,
    `datos_laborales`.`lugar_trabajo`,
    `datos_laborales`.`remuneracion`,
    `datos_laborales`.`tipo_remuneracion`,
    
    `datos_vivienda`.`condicion`,
    `datos_vivienda`.`tipo`,
    `datos_vivienda`.`tenencia`,
    
    `datos_economicos`.`banco`,
    `datos_economicos`.`tipo_cuenta`,
    `datos_economicos`.`nro_cuenta`,
    
    `contactos_aux`.`nombre` AS nombre_aux,
    `contactos_aux`.`apellido` AS apellido_aux,
    `contactos_aux`.`prefijo_telefono` AS pref_aux,
    `contactos_aux`.`nro_telefono` AS numero_aux,
    `contactos_aux`.`relacion` AS relacion_aux

FROM
    `personas`,
    `direcciones`,
    `carnet_patria`,
    `datos_laborales`,
    `datos_vivienda`,
    `representantes`,
    `datos_economicos`,
    `contactos_aux`
WHERE
    `personas`.`cedula` = `direcciones`.`cedula_persona` AND 
    `personas`.`cedula` = `carnet_patria`.`cedula_persona` AND 
    `personas`.`cedula` = `datos_laborales`.`cedula_persona` AND 
    `personas`.`cedula` = `datos_vivienda`.`cedula_persona` AND 
    `personas`.`cedula` = `representantes`.`cedula_persona` AND 
    `personas`.`cedula` = `datos_economicos`.`cedula_representante` AND 
    `personas`.`cedula` = `contactos_aux`.`cedula_representante`;

-- -----------------------------------------------------
-- View `sis_reg_lb_gpf_v2`.`vista_padres`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sis_reg_lb_gpf_v2`.`vista_padres`;
DROP VIEW IF EXISTS `sis_reg_lb_gpf_v2`.`vista_padres` ;
USE `sis_reg_lb_gpf_v2`;
CREATE  OR REPLACE VIEW `vista_padres` AS

SELECT
    `personas`.`cedula`,
    `personas`.`p_nombre`,
    `personas`.`s_nombre`,
    `personas`.`p_apellido`,
    `personas`.`s_apellido`,
    `personas`.`fecha_nacimiento`,
    `personas`.`lugar_nacimiento`,
    `personas`.`genero`,
    `personas`.`estado_civil`,
    `personas`.`email`,
    `personas`.`grado_academico`,
    `direcciones`.`estado`,
    `direcciones`.`municipio`,
    `direcciones`.`parroquia`,
    `direcciones`.`sector`,
    `direcciones`.`calle`,
    `direcciones`.`nro_casa`,
    `direcciones`.`punto_referencia`,

    `datos_laborales`.`empleo`,
    `datos_laborales`.`lugar_trabajo`,
    `datos_laborales`.`remuneracion`,
    `datos_laborales`.`tipo_remuneracion`,
    
    `datos_vivienda`.`condicion`,
    `datos_vivienda`.`tipo`,
    `datos_vivienda`.`tenencia`,
    
    `padres`.`pais_residencia`

FROM
    `personas`,
    `direcciones`,
    `datos_laborales`,
    `datos_vivienda`,
    `padres`
WHERE
    `personas`.`cedula` = `direcciones`.`cedula_persona` AND 
    `personas`.`cedula` = `datos_laborales`.`cedula_persona` AND 
    `personas`.`cedula` = `datos_vivienda`.`cedula_persona` AND 
    `personas`.`cedula` = `padres`.`cedula_persona`;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `sis_reg_lb_gpf_v2`.`personas`
-- -----------------------------------------------------
START TRANSACTION;
USE `sis_reg_lb_gpf_v2`;
INSERT INTO `sis_reg_lb_gpf_v2`.`personas` (`cedula`, `p_nombre`, `s_nombre`, `p_apellido`, `s_apellido`, `fecha_nacimiento`, `lugar_nacimiento`, `genero`, `estado_civil`, `email`, `grado_academico`) VALUES ('V27919566', 'Elber', 'Alonso', 'Rondón', 'Hernández', '2001-05-05', 'Mérida', 'M', 'Soltero(a)', 'earh_2001@outlook.com', 'Universitario');
INSERT INTO `sis_reg_lb_gpf_v2`.`personas` (`cedula`, `p_nombre`, `s_nombre`, `p_apellido`, `s_apellido`, `fecha_nacimiento`, `lugar_nacimiento`, `genero`, `estado_civil`, `email`, `grado_academico`) VALUES ('V28636530', 'María', 'Gabriela', 'Ballestero', 'Rodríguez', '2002-05-09', 'Caja seca', 'F', 'Soltero(a)', 'mgba952@gmail.com', 'Universitario');
INSERT INTO `sis_reg_lb_gpf_v2`.`personas` (`cedula`, `p_nombre`, `s_nombre`, `p_apellido`, `s_apellido`, `fecha_nacimiento`, `lugar_nacimiento`, `genero`, `estado_civil`, `email`, `grado_academico`) VALUES ('V26985572', 'Franklin', 'Darío', 'Contreras', 'Rodríguez', DEFAULT, DEFAULT, 'M', 'Soltero(a)', 'contreras19.franklin@gmail.com', 'Universitario');

COMMIT;


-- -----------------------------------------------------
-- Data for table `sis_reg_lb_gpf_v2`.`usuarios`
-- -----------------------------------------------------
START TRANSACTION;
USE `sis_reg_lb_gpf_v2`;
INSERT INTO `sis_reg_lb_gpf_v2`.`usuarios` (`cedula_persona`, `rol`, `privilegios`, `contraseña`, `pregunta_seg_1`, `respuesta_1`, `pregunta_seg_2`, `respuesta_2`) VALUES ('V27919566', 'Desarrollador', '0', '12345', 'Color favorito', 'Azúl', 'Nombre de mascota', 'Mia');
INSERT INTO `sis_reg_lb_gpf_v2`.`usuarios` (`cedula_persona`, `rol`, `privilegios`, `contraseña`, `pregunta_seg_1`, `respuesta_1`, `pregunta_seg_2`, `respuesta_2`) VALUES ('V28636530', 'Desarrollador', '0', 'Gab_952', 'Color favorito', 'Azúl', DEFAULT, DEFAULT);
INSERT INTO `sis_reg_lb_gpf_v2`.`usuarios` (`cedula_persona`, `rol`, `privilegios`, `contraseña`, `pregunta_seg_1`, `respuesta_1`, `pregunta_seg_2`, `respuesta_2`) VALUES ('V26985572', 'Desarrollador', '0', '12345', DEFAULT, DEFAULT, DEFAULT, DEFAULT);

-- Insercion de datos de pruebas

-- periodo academico para los registros
INSERT INTO `per_academico`(`id_per_academico`, `inicio`, `fin`) VALUES ('20222023','2022','2023');



-- Representantes

-- 33 persona en total

insert  into personas (cedula,p_nombre,s_nombre,p_apellido,s_apellido,fecha_nacimiento,lugar_nacimiento,genero,estado_civil,email,grado_academico) values 
('V28278648','Heriberto','Coraline','Truter','Fewster','1978-03-28','69 Granby Way','F','Viudo(a)','cfewster0@weebly.com','Primaria'),
('V9933359','Ambur','Willy','Voller','Shakshaft','1995-11-08','56292 Lighthouse Bay Hill','M','Viudo(a)','wshakshaft1@google.co.jp','Bachillerato'),
('V31950478','Sabrina','Torrence','Burcombe','Eddowis','1984-10-16','0 Marquette Pass','M','Soltero(a)','teddowis2@xing.com','Universitario'),
('V38590950','Lorena','Euell','Hurley','Pherps','1993-01-06','3 Columbus Alley','M','Divorciado(a)','epherps3@cocolog-nifty.com','Universitario'),
('V18526161','Nikolos','Leicester','Lyes','Dionsetto','1997-02-28','4 Moulton Circle','M','Viudo(a)','ldionsetto4@mapquest.com','Universitario'),
('V33118292','Iggie','Devon','Prosh','Brome','1991-05-25','580 Gale Way','M','Soltero(a)','dbrome5@mysql.com','Primaria'),
('V28302608','Niki','Donaugh','Follit','Boulde','1973-04-23','9 Summit Court','F','Viudo(a)','dboulde6@prnewswire.com','Universitario'),
('V18424188','Barbabas','Udale','Klemz','Painten','1975-10-21','3 Waxwing Plaza','M','Casado(a)','upainten7@ocn.ne.jp','Universitario'),
('V32238738','Ches','Zsa zsa','Deaville','Doughtery','1981-09-14','5303 Melrose Circle','M','Divorciado(a)','zdoughtery8@prweb.com','Primaria'),
('V16561305','Thorstein','Lotty','Yitshak','Squelch','1974-10-07','3 Grasskamp Plaza','M','Soltero(a)','lsquelch9@typepad.com','Primaria'),
('V11046976','Lavina','Rosalie','Rubica','Skitterel','1980-05-02','03517 Darwin Drive','M','Casado(a)','rskitterela@goodreads.com','Bachillerato'),
('V20568611','Carla','Gerrilee','Earey','Wards','1995-01-25','001 Thompson Parkway','F','Casado(a)','gwardsb@so-net.ne.jp','Bachillerato'),
('V27252225','Lemuel','Germaine','Cropton','Atkin','1987-10-20','14 Sunbrook Parkway','F','Divorciado(a)','gatkinc@biglobe.ne.jp','Primaria'),
('V22601755','Lindsy','Gonzales','Lyttle','Hernik','1995-08-29','0 Eliot Crossing','M','Casado(a)','ghernikd@dropbox.com','Universitario'),
('V33574387','Leona','Theodoric','Feedome','Salzen','1971-09-28','69365 Susan Lane','M','Viudo(a)','tsalzene@feedburner.com','Universitario'),
('V35634816','Emmaline','Amy','Gilbee','Ivoshin','1971-02-27','122 Pankratz Terrace','F','Casado(a)','aivoshinf@blogger.com','Universitario'),
('V27717006','Phoebe','Hazlett','Boribal','Bambrough','1974-03-03','68798 Lunder Trail','F','Viudo(a)','hbambroughg@indiegogo.com','Bachillerato'),
('V31694733','Rabi','Chevy','Ector','Badgers','1999-01-06','057 Monica Street','M','Divorciado(a)','cbadgersh@technorati.com','Primaria'),
('V18905517','Wainwright','Ashley','Metterick','Everington','1971-01-15','93 Division Avenue','F','Soltero(a)','aeveringtoni@netscape.com','Primaria'),
('V5714261','Waylin','Kelly','Jefford','de Clerk','1983-01-06','0234 Bunker Hill Hill','M','Casado(a)','kdeclerkj@wikipedia.org','Primaria'),
('V19987910','Gabie','Armstrong','Eadington','Colman','1989-11-04','9395 Badeau Park','F','Viudo(a)','acolmank@ow.ly','Bachillerato'),
('V4459062','Horton','Pia','Annatt','Berrane','1995-01-22','0121 Miller Court','F','Viudo(a)','pberranel@apache.org','Primaria'),
('V22177376','Matelda','Sander','Hearons','Whitear','2000-01-19','9 Lien Plaza','M','Soltero(a)','swhitearm@webs.com','Bachillerato'),
('V35208115','Marsha','Gerik','Arunowicz','Caitlin','1971-08-28','4659 Russell Trail','M','Divorciado(a)','gcaitlinn@behance.net','Primaria'),
('V32113794','Denis','Gerty','Creaven','Marco','1995-03-20','0 Upham Avenue','M','Soltero(a)','gmarcoo@army.mil','Bachillerato'),
('V36732297','Perren','Sterling','Aleksahkin','Kunze','1982-02-25','900 Dexter Center','M','Soltero(a)','skunzep@usda.gov','Universitario'),
('V5344562','Doe','Adams','Hailes','Latimer','1972-11-28','3601 Jenna Road','F','Casado(a)','alatimerq@imageshack.us','Primaria'),
('V25050145','Kial','Alonzo','Gudgion','Fassmann','1998-07-25','58371 Beilfuss Plaza','M','Casado(a)','afassmannr@icq.com','Universitario'),
('V30196324','Petronia','Sallyanne','Dufour','Lamke','1990-09-17','4 Darwin Crossing','M','Viudo(a)','slamkes@tamu.edu','Universitario'),
('V21412330','Collen','Aliza','Fleay','Wimes','1973-12-30','17343 Namekagon Alley','F','Casado(a)','awimest@goo.gl','Primaria'),
('V28798356','Lavinia','Rafaelia','Stoodley','Cree','1970-12-15','991 Nevada Trail','F','Soltero(a)','rcreeu@simplemachines.org','Bachillerato'),
('V20909176','Verene','Lacee','Tweed','Crane','1998-07-23','54 Boyd Lane','F','Viudo(a)','lcranev@auda.org.au','Universitario'),
('V33641397','Eimile','Tamma','Krysztofowicz','Caldron','1975-09-26','5 Transport Parkway','M','Soltero(a)','tcaldronw@npr.org','Primaria');



INSERT  INTO `representantes`(`cedula_persona`) VALUES 
('V28278648'),
('V9933359'),
('V31950478'),
('V38590950'),
('V18526161'),
('V33118292'),
('V28302608'),
('V18424188'),
('V32238738'),
('V16561305'),
('V11046976'),
('V20568611'),
('V27252225'),
('V22601755'),
('V33574387'),
('V35634816'),
('V27717006'),
('V31694733'),
('V18905517'),
('V5714261'),
('V19987910'),
('V4459062'),
('V22177376'),
('V35208115'),
('V32113794'),
('V36732297'),
('V5344562'),
('V25050145'),
('V30196324'),
('V21412330'),
('V28798356'),
('V20909176'),
('V33641397');


insert  into telefonos (cedula_persona,relacion,prefijo,numero) values
('V28278648','Principal',8507,4671140),
('V9933359','Principal',7134,6638885),
('V31950478','Principal',5385,1913649),
('V38590950','Principal',9400,9224618),
('V18526161','Principal',7316,8190445),
('V33118292','Principal',2906,2927882),
('V28302608','Principal',6000,4134233),
('V18424188','Principal',3833,3414775),
('V32238738','Principal',6049,5281505),
('V16561305','Principal',4949,4347276),
('V11046976','Principal',2754,3856835),
('V20568611','Principal',2053,3243774),
('V27252225','Principal',1718,1642455),
('V22601755','Principal',5452,2283833),
('V33574387','Principal',7440,1045162),
('V35634816','Principal',6361,4545836),
('V27717006','Principal',3804,8075540),
('V31694733','Principal',8439,3509722),
('V18905517','Principal',8919,4777244),
('V5714261','Principal',7400,3167693),
('V19987910','Principal',5855,2173034),
('V4459062','Principal',4984,5465930),
('V22177376','Principal',3180,5407287),
('V35208115','Principal',9928,1255955),
('V32113794','Principal',5541,8030557),
('V36732297','Principal',3861,1922816),
('V5344562','Principal',7151,5656354),
('V25050145','Principal',5536,3703519),
('V30196324','Principal',2040,9878454),
('V21412330','Principal',3765,4371927),
('V28798356','Principal',2146,2759393),
('V20909176','Principal',5263,9548759),
('V33641397','Principal',6195,9565750),
('V28278648','Secundario',2854,8502573),
('V9933359','Secundario',4066,3068168),
('V31950478','Secundario',4683,8361621),
('V38590950','Secundario',4769,5105218),
('V18526161','Secundario',5219,8878846),
('V33118292','Secundario',4330,5655980),
('V28302608','Secundario',3778,6018181),
('V18424188','Secundario',5900,4734868),
('V32238738','Secundario',1737,8287933),
('V16561305','Secundario',8535,4243265),
('V11046976','Secundario',2566,5010884),
('V20568611','Secundario',9238,5897796),
('V27252225','Secundario',7461,6168866),
('V22601755','Secundario',1362,5683923),
('V33574387','Secundario',8337,3575610),
('V35634816','Secundario',3568,5666459),
('V27717006','Secundario',1848,2984784),
('V31694733','Secundario',5208,9089753),
('V18905517','Secundario',5386,7829339),
('V5714261','Secundario',7822,7835354),
('V19987910','Secundario',7747,3802940),
('V4459062','Secundario',1979,2367980),
('V22177376','Secundario',3673,3177808),
('V35208115','Secundario',3563,2720034),
('V32113794','Secundario',4613,3525217),
('V36732297','Secundario',1074,2767556),
('V5344562','Secundario',6781,1173425),
('V25050145','Secundario',7184,2151245),
('V30196324','Secundario',3241,4412330),
('V21412330','Secundario',2735,2949626),
('V28798356','Secundario',4832,6140113),
('V20909176','Secundario',4187,8207017),
('V33641397','Secundario',4574,2111808),
('V28278648','Auxiliar',2091,6938836),
('V9933359','Auxiliar',1407,7752060),
('V31950478','Auxiliar',7085,3945104),
('V38590950','Auxiliar',9547,7656274),
('V18526161','Auxiliar',6459,5499197),
('V33118292','Auxiliar',5765,5454158),
('V28302608','Auxiliar',5429,1888584),
('V18424188','Auxiliar',8311,1737649),
('V32238738','Auxiliar',4918,5961382),
('V16561305','Auxiliar',6690,5902637),
('V11046976','Auxiliar',7233,2741272),
('V20568611','Auxiliar',9967,4170036),
('V27252225','Auxiliar',9562,9046449),
('V22601755','Auxiliar',2578,5835993),
('V33574387','Auxiliar',9292,2882509),
('V35634816','Auxiliar',3938,7113118),
('V27717006','Auxiliar',3402,5904012),
('V31694733','Auxiliar',6021,8601575),
('V18905517','Auxiliar',9006,8804183),
('V5714261','Auxiliar',7679,8986503),
('V19987910','Auxiliar',2872,1765322),
('V4459062','Auxiliar',7144,3967406),
('V22177376','Auxiliar',5840,3542525),
('V35208115','Auxiliar',5774,5810778),
('V32113794','Auxiliar',9591,9638290),
('V36732297','Auxiliar',8741,2674289),
('V5344562','Auxiliar',6034,5148144),
('V25050145','Auxiliar',1131,9125991),
('V30196324','Auxiliar',8465,7915833),
('V21412330','Auxiliar',7610,4605838),
('V28798356','Auxiliar',2202,9264428),
('V20909176','Auxiliar',8858,1412990),
('V33641397','Auxiliar',1870,6073471),
('V28278648','Trabajo',8465,7915833),
('V9933359','Trabajo',7610,4605838),
('V31950478','Trabajo',2202,9264428),
('V38590950','Trabajo',8858,1412990),
('V18526161','Trabajo',1870,6073471),
('V33118292','Trabajo',8465,7915833),
('V28302608','Trabajo',7610,4605838),
('V18424188','Trabajo',2202,9264428),
('V32238738','Trabajo',8858,1412990),
('V16561305','Trabajo',1870,6073471),
('V11046976','Trabajo',8465,7915833),
('V20568611','Trabajo',7610,4605838),
('V27252225','Trabajo',2202,9264428),
('V22601755','Trabajo',8858,1412990),
('V33574387','Trabajo',1870,6073471),
('V35634816','Trabajo',8465,7915833),
('V27717006','Trabajo',7610,4605838),
('V31694733','Trabajo',2202,9264428),
('V18905517','Trabajo',8858,1412990),
('V5714261','Trabajo',1870,6073471),
('V19987910','Trabajo',8465,7915833),
('V4459062','Trabajo',7610,4605838),
('V22177376','Trabajo',2202,9264428),
('V35208115','Trabajo',8858,1412990),
('V32113794','Trabajo',1870,6073471),
('V36732297','Trabajo',8465,7915833),
('V5344562','Trabajo',7610,4605838),
('V25050145','Trabajo',2202,9264428),
('V30196324','Trabajo',8858,1412990),
('V21412330','Trabajo',1870,6073471),
('V28798356','Trabajo',8465,7915833),
('V20909176','Trabajo',7610,4605838),
('V33641397','Trabajo',2202,9264428);


insert  into datos_economicos (cedula_representante,banco,tipo_cuenta,nro_cuenta) values 
('V28278648','qdnvqvinhvfubf','jcfqlwiethcsks','40096411743168529536'),
('V9933359','kfzgypcalpffhm','gzcjjiftntwsyi','59220790020061719476'),
('V31950478','eibbflgzdbvqjj','wipjpcvwtcglyi','13928067292912938081'),
('V38590950','ekcchraywbfsjw','ifhxtwmqpxiged','65577857535305206897'),
('V18526161','iyqxcgelewyqsm','gjazxraqvjhveq','37021013029754166438'),
('V33118292','zrgiddsustpcdh','miibwhapfzywbb','52308805040893606435'),
('V28302608','bxmavmumngoueb','jnloxsvmybwblc','20747053919318580583'),
('V18424188','fykhfgixlcqeyt','uomqetryrkbayp','92766260644427755100'),
('V32238738','mashoqhiilgwby','eqcczeotwjqnak','04584711573450612781'),
('V16561305','cayhvfrdpnvlon','mzegkoqaxolqny','89223478069671830359'),
('V11046976','oxagitbdmtjpyb','caxdbelsyyzavq','44406345175937457984'),
('V20568611','wadgseujhbnbhe','tdnphwtvyaaoay','44114687850673484646'),
('V27252225','qsfzscmgjowvjs','lnjajsnckfbdjh','65061315989923310578'),
('V22601755','gjxkponvctythp','qyyeaqjsyvrfco','19240978676877671171'),
('V33574387','wdsnmvmfwskbgs','ndwkmunvewjczr','10865776303569857886'),
('V35634816','wpesaqzwoeslgu','lhibqasokkfakh','04166130529442538776'),
('V27717006','jolpgekauoqhww','upnexrsvldeoqk','39829349609106609087'),
('V31694733','nzhcocfuivxhqs','itowqvldzgujzi','29553597620398191582'),
('V18905517','qyxnmocotifwxx','qcbyogeijfqeqv','05529493016318853073'),
('V5714261','nkndorohbbukok','bxmatvsetwozdg','01638923997876310471'),
('V19987910','kuimfnyveeczie','ltquuytvuwaxfm','51606508274947637363'),
('V4459062','aaidylitjmadkh','znzfvbcidnciuh','48249338762250173460'),
('V22177376','szzgigzmikvoep','yoglmcsqwgnhyh','34168564959306203519'),
('V35208115','mmbrgwuwhtuksn','iynoctzwjmhmvn','70388014792574449398'),
('V32113794','stwrnxojajiluw','bbyrlrxfktsmae','86693484217896376468'),
('V36732297','wwjmefmagdahpb','axkclcgtkovfya','37496468451133874255'),
('V5344562','khgczhotscalwm','uuedgcphmkpnmr','90083578558225722384'),
('V25050145','mkfrhptklochvq','fcslepitnvijds','32418021629534524891'),
('V30196324','fbcwstqyjaocsb','irluliteujhryo','64180053471581453016'),
('V21412330','tbaybefgjgysav','jmlayigzydefmb','78415875219700765380'),
('V28798356','zcvtykzxqlhmhf','pckkyvmcaxgfgm','17908490722419695151'),
('V20909176','umobozazyxgxfa','wxygkjuoujyofs','18220339642511846724'),
('V33641397','tzorjjwfzbshlu','ajzqnwyablrivl','54058154676141480668');




insert  into contactos_aux (cedula_representante,nombre,apellido,prefijo_telefono,nro_telefono,relacion) values 
('V28278648','Nikos','Das','1097','7032642','vecino'),
('V9933359','Kristal','Madrell','0367','6134269','vecino'),
('V31950478','Vikky','Spurden','2610','8704153','tia'),
('V38590950','Karl','Huffer','4009','8605864','abuelo'),
('V18526161','Alis','Le Batteur','6787','7857451','tia'),
('V33118292','Sherlock','Copello','3184','6629975','abuelo'),
('V28302608','Rickert','Panks','9897','3942391','abuelo'),
('V18424188','Ara','Westmarland','8113','3405125','abuelo'),
('V32238738','Irv','Reynish','6278','6383501','vecino'),
('V16561305','Nikki','MacTrustie','8762','4374186','abuelo'),
('V11046976','Perl','Deboo','6230','6039083','abuelo'),
('V20568611','Willi','Padfield','3044','3363234','tio'),
('V27252225','Raddie','Scarrisbrick','5067','9136098','vecino'),
('V22601755','Glynda','Antonacci','5349','1163223','abuelo'),
('V33574387','Gallard','Bryant','9898','3364573','abuelo'),
('V35634816','Cherida','Olohan','7785','0029102','tio'),
('V27717006','Merle','Matyatin','9561','4779709','abuelo'),
('V31694733','Stormi','Benthall','1072','9475052','tia'),
('V18905517','Morganica','Winyard','4054','8048823','vecino'),
('V5714261','Adele','Mulgrew','7659','6559825','tia'),
('V19987910','Filip','Balser','0234','2064687','abuelo'),
('V4459062','Nowell','Jovicevic','2937','6522156','vecino'),
('V22177376','Will','Mobley','1524','5880683','tia'),
('V35208115','Luca','Troy','8225','2980569','vecino'),
('V32113794','Jaquelin','Harrowell','7643','7177341','tia'),
('V36732297','Anestassia','Stud','4313','7522019','abuelo'),
('V5344562','Arte','Norton','0673','2118126','abuelo'),
('V25050145','Bernardo','Currie','7225','9576338','vecino'),
('V30196324','Alic','Budcock','8575','0267944','abuelo'),
('V21412330','Nat','Earp','7139','6053013','tio'),
('V28798356','Brinna','Devonside','4818','6858954','tio'),
('V20909176','Roxy','Curgenuer','9871','0999274','abuelo'),
('V33641397','Joline','Rodenburg','4387','7061043','abuelo');



insert  into direcciones (cedula_persona,estado,municipio,parroquia,sector,calle,nro_casa,punto_referencia) values 
('V28278648','Honduras','China','Joconal','Dinggou','Springview','78','0 Esker Parkway'),
('V9933359','Aland Islands','China','Lemland','Sanli','Daystar','72','5 Summerview Parkway'),
('V31950478','Czech Republic','Ukraine','Raškovice','Shchastya','Mccormick','66','68 Carey Alley'),
('V38590950','Colombia','Guam','Sáchica','Agana Heights Village','Straubel','70','5520 Birchwood Hill'),
('V18526161','Dominican Republic','China','Las Matas de Farfán','Xiangride','Jenifer','51','067 Loeprich Trail'),
('V33118292','Bulgaria','Philippines','Lyubimets','Maindang','Homewood','97','81 Menomonie Lane'),
('V28302608','Indonesia','Brazil','Cijoho','Iracemápolis','Green Ridge','66','78377 Main Point'),
('V18424188','Argentina','Afghanistan','Chichinales','Barakī Barak','American Ash','21','38105 Cody Crossing'),
('V32238738','Serbia','United States','Despotovac','Portland','Southridge','22','7 Oak Junction'),
('V16561305','Namibia','Syria','Tsumeb','Sarāqib','Mandrake','14','9787 Moland Drive'),
('V11046976','Argentina','Peru','Arauco','Julcamarca','Dunning','26','31 Laurel Place'),
('V20568611','China','Argentina','Jiangzao','El Soberbio','New Castle','77','63 Sommers Alley'),
('V27252225','Russia','Czech Republic','Zheleznogorsk','Podolí','Meadow Ridge','48','882 Vidon Pass'),
('V22601755','Portugal','United States','Vila Franca do Campo','Tucson','Sachs','55','92882 Harbort Circle'),
('V33574387','Armenia','Japan','Karanlukh','Chiryū','Spohn','04','205 Mandrake Terrace'),
('V35634816','Brazil','Chad','Água Preta','Bokoro','Judy','50','32 Fairfield Way'),
('V27717006','China','Portugal','Baiyang','Loureiro','Transport','14','3 Larry Center'),
('V31694733','China','Japan','Sanjia','Nagai','Corscot','52','4 Burrows Road'),
('V18905517','Norway','Honduras','Steinkjer','La Estancia','Grover','56','428 Hermina Parkway'),
('V5714261','China','Russia','Qiaotou','Solntsevo','Waywood','31','29531 Fremont Avenue'),
('V19987910','Greece','Kosovo','Rízoma','Dubova (Driloni)','Bay','98','6282 Elmside Parkway'),
('V4459062','Mexico','Ethiopia','Fovissste','Hāgere Selam','Linden','72','6 Canary Center'),
('V22177376','Afghanistan','Brazil','Ţāqchah Khānah','Espírito Santo do Pinhal','Petterle','65','01694 Heffernan Trail'),
('V35208115','Morocco','Poland','Talzemt','Łużna','Hansons','32','12740 Glendale Avenue'),
('V32113794','Argentina','United States','Zapala','Fort Smith','Golf View','87','1027 Hauk Place'),
('V36732297','Brazil','Portugal','Murici','São Miguel','Kingsford','54','4 Corry Trail'),
('V5344562','Brazil','Mexico','Pereira Barreto','San Miguel','Darwin','88','37 Homewood Avenue'),
('V25050145','France','China','Montpellier','Hujiaba','Farmco','13','14 4th Trail'),
('V30196324','France','Japan','Villeneuve-d''Ascq','Ōdachō-ōda','Basil','89','99 2nd Alley'),
('V21412330','Saudi Arabia','China','Tabūk','Golug','Old Shore','03','7 Myrtle Street'),
('V28798356','Indonesia','China','Gereneng','Huxu','Lyons','49','02 Amoth Drive'),
('V20909176','Philippines','France','Guinticgan','Bordeaux','Pearson','98','78 Maple Wood Trail'),
('V33641397','Brazil','Indonesia','Castro','Tebingtinggi','Bobwhite','08','60211 Lakewood Gardens Way');

insert  into datos_vivienda (cedula_persona,condicion,tipo,tenencia) values 
('V28278648','Mala','Rancho','Alquilada'),
('V9933359','Regular','Apartamento','NC'),
('V31950478','Mala','Quinta','Propia'),
('V38590950','Buena','Habitacion','Prestada'),
('V18526161','Mala','Rancho','Prestada'),
('V33118292','Mala','Apartamento','Propia'),
('V28302608','Regular','Apartamento','NC'),
('V18424188','Buena','Casa','NC'),
('V32238738','Mala','Quinta','NC'),
('V16561305','Regular','Quinta','Prestada'),
('V11046976','Mala','Quinta','Alquilada'),
('V20568611','Mala','Apartamento','Prestada'),
('V27252225','Buena','Apartamento','NC'),
('V22601755','Regular','Apartamento','NC'),
('V33574387','Buena','Habitacion','Alquilada'),
('V35634816','Mala','Habitacion','Prestada'),
('V27717006','Mala','Rancho','Propia'),
('V31694733','Regular','Rancho','NC'),
('V18905517','Regular','Casa','NC'),
('V5714261','Buena','Casa','Propia'),
('V19987910','Buena','Casa','NC'),
('V4459062','Regular','Casa','Prestada'),
('V22177376','Regular','Apartamento','Prestada'),
('V35208115','Regular','Casa','Propia'),
('V32113794','Mala','Habitacion','NC'),
('V36732297','Regular','Habitacion','Prestada'),
('V5344562','Buena','Apartamento','Propia'),
('V25050145','Regular','Quinta','NC'),
('V30196324','Buena','Habitacion','Propia'),
('V21412330','Buena','Habitacion','Alquilada'),
('V28798356','Mala','Casa','Alquilada'),
('V20909176','Buena','Apartamento','Propia'),
('V33641397','Mala','Casa','NC');


insert  into datos_laborales (cedula_persona,empleo,lugar_trabajo,remuneracion,tipo_remuneracion) values 
('V28278648', 'Financial Analyst', '39 Rusk Junction', 18, 'Mensual'),
('V9933359', 'Software Consultant', '5813 Iowa Parkway', 7, 'Quincenal'),
('V31950478', 'Programmer Analyst III', '0 Erie Parkway', 4, 'Mensual'),
('V38590950', 'Developer II', '19440 Prairieview Junction', 12, 'Semanal'),
('V18526161', 'Executive Secretary', '2649 Crest Line Crossing', 7, 'Diaria'),
('V33118292', 'Systems Administrator III', '42 Artisan Junction', 13, 'Diaria'),
('V28302608', 'Registered Nurse', '67 6th Plaza', 5, 'Mensual'),
('V18424188', 'Nurse Practicioner', '3 Fieldstone Circle', 20, 'Mensual'),
('V32238738', 'Physical Therapy Assistant', '88976 Pennsylvania Street', 10, 'Mensual'),
('V16561305', 'Office Assistant IV', '92 Northfield Alley', 17, 'Mensual'),
('V11046976', 'Recruiter', '29 8th Junction', 11, 'Diaria'),
('V20568611', 'Nurse Practicioner', '98192 Glacier Hill Parkway', 20, 'Quincenal'),
('V27252225', 'Web Developer II', '85 Quincy Place', 13, 'Quincenal'),
('V22601755', 'Analog Circuit Design manager', '6554 Butternut Crossing', 5, 'Quincenal'),
('V33574387', 'Help Desk Operator', '323 Memorial Trail', 17, 'Semanal'),
('V35634816', 'Recruiter', '4 Packers Avenue', 13, 'Semanal'),
('V27717006', 'Geological Engineer', '362 Crownhardt Crossing', 4, 'Semanal'),
('V31694733', 'Geological Engineer', '84338 Forest Dale Circle', 14, 'Quincenal'),
('V18905517', 'Geologist IV', '07 Vidon Hill', 7, 'Quincenal'),
('V5714261', 'Environmental Tech', '44 Maywood Street', 18, 'Diaria'),
('V19987910', 'Civil Engineer', '994 Pierstorff Way', 16, 'Mensual'),
('V4459062', 'Mechanical Systems Engineer', '72 Tennyson Avenue', 20, 'Diaria'),
('V22177376', 'Clinical Specialist', '4 Sachtjen Junction', 25, 'Semanal'),
('V35208115', 'Social Worker', '17965 Nancy Trail', 2, 'Mensual'),
('V32113794', 'Structural Engineer', '0 Merrick Court', 22, 'Semanal'),
('V36732297', 'GIS Technical Architect', '737 Iowa Junction', 21, 'Semanal'),
('V5344562', 'Software Test Engineer IV', '32 Veith Circle', 3, 'Quincenal'),
('V25050145', 'Software Test Engineer IV', '32 Veith Circle', 3, 'Quincenal'),
('V30196324', 'Software Test Engineer IV', '32 Veith Circle', 3, 'Quincenal'),
('V21412330', 'Software Test Engineer IV', '32 Veith Circle', 3, 'Quincenal'),
('V28798356', 'Software Test Engineer IV', '32 Veith Circle', 3, 'Quincenal'),
('V20909176', 'Software Test Engineer IV', '32 Veith Circle', 3, 'Quincenal'),
('V33641397', 'Accounting Assistant IV', '24507 Straubel Plaza', 11, 'Quincenal');



insert  into carnet_patria (cedula_persona,codigo_carnet,serial_carnet) values 
('V28278648','3088914649','0938828868'),
('V9933359','3052152932','3826866050'),
('V31950478','1760971017','7708357769'),
('V38590950','3075019830','7751542717'),
('V18526161','8168478974','7775126117'),
('V33118292','7079557189','3206687091'),
('V28302608','2209268864','1361204438'),
('V18424188','9266005484','1598355647'),
('V32238738','4418507649','6238952755'),
('V16561305','3596290336','8793896041'),
('V11046976','7437007906','5044507172'),
('V20568611','3690829933','8612694190'),
('V27252225','5062003958','5493694156'),
('V22601755','6090870138','1387754225'),
('V33574387','0624431618','3275736150'),
('V35634816','7277307616','0348004208'),
('V27717006','9429566343','0021152094'),
('V31694733','3817538910','9190919396'),
('V18905517','6671553884','5809830890'),
('V5714261','7251379739','2042446144'),
('V19987910','6390738681','9805607267'),
('V4459062','9557879160','0314661716'),
('V22177376','9569619491','2766221202'),
('V35208115','4621589413','8653932060'),
('V32113794','7369584972','5752668947'),
('V36732297','6383629943','5295501016'),
('V5344562','2523505519','7605248393'),
('V25050145','4744317619','7332133205'),
('V30196324','7384298550','3240807668'),
('V21412330','7851640660','5116917298'),
('V28798356','2125029508','1398427895'),
('V20909176','7435824535','8845100963'),
('V33641397','3874230307','3246828304');


-- Padres


-- 66 registros de padres (2 por cada estudiante)
-- V36515502,V14832231,V80920371,V27049463,V45072650,V41090241,V04667374,V75137320,V24992920,V97836554,V93029260,V66483433,V24055118,V95165912,V85321459,V99806340,V21227139,V02286258,V64765176,V77427358,V35386169,V36756164,V02288319,V81395335,V49593189,V50117141,V49469440,V13336593,V32952482,V15801593,V79112540,V53738892,V80812803,V87971733,V65612580,V23386453,V30926499,V10457386,V04388769,V60544306,V09838593,V06594327,V96168440,V69314620,V98673367,V86711817,V89673979,V98670740,V43206204,V43736580,V63368952,V32626329,V33854591,V48829993,V68542148,V99570421,V62990915,V11425279,V87727632,V55136102,V99392868,V82808667,V34714307,V70783876,V46631827,V56118810


insert  into personas (cedula,p_nombre,s_nombre,p_apellido,s_apellido,fecha_nacimiento,lugar_nacimiento,genero,estado_civil,email,grado_academico) values 
('V36515502','Phillipe','Mohandis','Lockett','Corselles','1996-03-06','24706 Merrick Plaza','M','Viudo(a)','mcorselles0@gnu.org','Bachillerato'),
('V14832231','Caritta','Casi','Winslet','Garden','1991-07-10','9756 Longview Terrace','M','Soltero(a)','cgarden1@weather.com','Bachillerato'),
('V80920371','Erick','Roxanne','Doding','Fairnington','1970-10-22','03290 Northport Hill','F','Soltero(a)','rfairnington2@umn.edu','Universitario'),
('V27049463','Tina','Darby','Paulmann','McKiddin','1984-03-17','99 Ridge Oak Place','M','Casado(a)','dmckiddin3@angelfire.com','Primaria'),
('V45072650','Calla','Alessandro','Middle','Lenihan','1973-02-20','1298 Oxford Plaza','M','Soltero(a)','alenihan4@cpanel.net','Bachillerato'),
('V41090241','Alvie','Evaleen','Lillecrop','Pool','1977-12-13','258 Gale Hill','M','Divorciado(a)','epool5@sohu.com','Universitario'),
('V04667374','Emily','Ainslee','Alcott','Fielden','1984-05-09','438 Ryan Place','F','Divorciado(a)','afielden6@blogspot.com','Universitario'),
('V75137320','George','Rhetta','Gossage','Beech','1973-11-26','5760 Schiller Crossing','F','Divorciado(a)','rbeech7@imdb.com','Bachillerato'),
('V24992920','Bernardine','Cassandra','Eickhoff','Brisland','1979-06-12','5 Oak Valley Parkway','M','Soltero(a)','cbrisland8@alexa.com','Bachillerato'),
('V97836554','Maura','Ode','Bromage','Gillatt','1989-02-07','99931 David Road','F','Soltero(a)','ogillatt9@shinystat.com','Universitario'),
('V93029260','Towny','Brannon','Kilford','Artingstall','1985-12-18','47 Melby Lane','M','Soltero(a)','bartingstalla@mayoclinic.com','Universitario'),
('V66483433','Kory','Harmonie','Jandel','Siely','1991-06-01','39 Stuart Parkway','F','Soltero(a)','hsielyb@addtoany.com','Universitario'),
('V24055118','Dale','Heddie','Rollo','Gilogly','1974-01-20','2 Red Cloud Pass','F','Divorciado(a)','hgiloglyc@elegantthemes.com','Primaria'),
('V95165912','Neddy','Henry','Klimkovich','Albrighton','1971-06-05','2 Bunker Hill Road','M','Casado(a)','halbrightond@comcast.net','Universitario'),
('V85321459','Edeline','Martino','Quenell','Philimore','1979-11-24','769 Lerdahl Terrace','M','Divorciado(a)','mphilimoree@ustream.tv','Bachillerato'),
('V99806340','Joann','Selena','Satterlee','Byre','1994-04-09','06 Meadow Ridge Junction','M','Soltero(a)','sbyref@dyndns.org','Universitario'),
('V21227139','Barrie','Kali','Brownsett','Duiged','1978-07-23','658 Sachtjen Road','F','Casado(a)','kduigedg@cam.ac.uk','Universitario'),
('V02286258','Gaven','Byrom','Jewise','O''Concannon','1981-07-28','8 Armistice Place','M','Divorciado(a)','boconcannonh@examiner.com','Bachillerato'),
('V64765176','Davine','Batholomew','Samme','Stuck','1983-04-25','49616 Hoard Lane','M','Divorciado(a)','bstucki@plala.or.jp','Primaria'),
('V77427358','Griselda','Carina','Tuley','Castagno','1979-10-06','7232 Summit Hill','M','Divorciado(a)','ccastagnoj@cnbc.com','Universitario'),
('V35386169','Angel','Marybelle','Sainter','Muttitt','1996-12-22','86 Rieder Hill','M','Viudo(a)','mmuttittk@slideshare.net','Bachillerato'),
('V36756164','Cristy','Les','Pickford','Barbey','1972-08-22','2 Troy Alley','M','Divorciado(a)','lbarbeyl@ifeng.com','Bachillerato'),
('V02288319','Padget','Teddy','Apdell','Cutill','1977-10-12','5380 Porter Terrace','F','Soltero(a)','tcutillm@google.cn','Bachillerato'),
('V81395335','Stu','Korey','Moubray','MacColgan','1975-07-17','17689 Mifflin Park','M','Casado(a)','kmaccolgann@census.gov','Primaria'),
('V49593189','Kalila','Dirk','Andrieux','Farres','1974-07-14','97030 Caliangt Pass','M','Divorciado(a)','dfarreso@un.org','Primaria'),
('V50117141','Miriam','Odell','Mawer','Sarfat','1995-09-13','1925 Oneill Center','F','Divorciado(a)','osarfatp@csmonitor.com','Bachillerato'),
('V49469440','Haley','Chico','Brazil','Ulrik','1990-08-08','662 Everett Crossing','M','Casado(a)','culrikq@delicious.com','Universitario'),
('V13336593','Sal','Dorthy','McCrackan','Chasemoore','1983-10-15','9 Manitowish Avenue','F','Soltero(a)','dchasemoorer@people.com.cn','Primaria'),
('V32952482','Bailey','Ernesta','Gricks','Getcliff','1976-04-17','55599 Merry Lane','F','Divorciado(a)','egetcliffs@quantcast.com','Universitario'),
('V15801593','Francine','Rutter','Rooze','Connichie','1986-05-05','486 Emmet Crossing','F','Divorciado(a)','rconnichiet@eepurl.com','Bachillerato'),
('V79112540','Paten','Biron','Tourle','O'' Driscoll','1994-06-07','6 Linden Terrace','F','Casado(a)','bodriscollu@shop-pro.jp','Bachillerato'),
('V53738892','Axel','Maxie','Kellaway','Loeber','1977-10-08','1774 Bobwhite Lane','F','Soltero(a)','mloeberv@nyu.edu','Universitario'),
('V80812803','Darlleen','Gerianne','Taylo','Becom','1987-02-19','6067 Michigan Trail','M','Divorciado(a)','gbecomw@google.com.br','Primaria'),
('V87971733','Filbert','Butch','Huntly','Skalls','1976-10-22','0 Veith Place','F','Casado(a)','bskallsx@bloomberg.com','Universitario'),
('V65612580','Amitie','Jill','Hedge','Feighry','1976-04-12','5876 Talmadge Pass','F','Viudo(a)','jfeighryy@unc.edu','Bachillerato'),
('V23386453','Samaria','Giulia','Grzegorecki','Riby','1980-03-20','00 Sunfield Street','F','Viudo(a)','gribyz@narod.ru','Bachillerato'),
('V30926499','Georgie','Harli','Casarino','Stayte','1979-04-23','36520 Ludington Drive','M','Casado(a)','hstayte10@alibaba.com','Primaria'),
('V10457386','Jasun','Norris','De la Barre','Boutwell','1987-04-07','69 Tony Court','F','Divorciado(a)','nboutwell11@live.com','Bachillerato'),
('V04388769','Osgood','Walsh','Ibell','Birkmyre','1990-12-14','85 Manley Lane','M','Divorciado(a)','wbirkmyre12@telegraph.co.uk','Universitario'),
('V60544306','Annabella','Indira','Srawley','Ferrettino','1980-06-16','46 Jenna Lane','F','Casado(a)','iferrettino13@economist.com','Primaria'),
('V09838593','Blinny','Keelby','Bedle','Jeremaes','1987-01-17','8148 Iowa Alley','M','Soltero(a)','kjeremaes14@e-recht24.de','Primaria'),
('V06594327','Arabelle','Jeromy','Nutkins','Cullivan','1995-09-20','0079 Di Loreto Street','M','Soltero(a)','jcullivan15@businesswire.com','Primaria'),
('V96168440','Adore','Vernor','Philippard','Stowers','1970-12-04','20942 Eagan Plaza','F','Viudo(a)','vstowers16@over-blog.com','Universitario'),
('V69314620','Dunstan','Micky','Rushman','Swinney','1994-10-28','8 Hovde Pass','M','Soltero(a)','mswinney17@technorati.com','Primaria'),
('V98673367','Shirleen','Glad','Camel','Leverett','1982-09-08','941 Northridge Point','M','Viudo(a)','gleverett18@geocities.com','Universitario'),
('V86711817','Andee','Bevan','Piner','Antill','1979-09-25','10267 International Crossing','M','Viudo(a)','bantill19@etsy.com','Primaria'),
('V89673979','Tedd','Garrot','Cocking','Lenormand','1987-09-14','18058 Shelley Avenue','M','Viudo(a)','glenormand1a@sina.com.cn','Universitario'),
('V98670740','Alikee','Lucky','Swett','Silversmidt','1979-03-07','3 Brown Parkway','F','Soltero(a)','lsilversmidt1b@reverbnation.com','Bachillerato'),
('V43206204','Octavius','Jenna','Fishley','Brunone','1991-08-27','5756 Northland Street','F','Divorciado(a)','jbrunone1c@newsvine.com','Primaria'),
('V43736580','Stanleigh','Nicko','Irwin','Snelgar','1999-12-19','36247 Loomis Drive','M','Casado(a)','nsnelgar1d@imdb.com','Primaria'),
('V63368952','Cherise','Dori','Ceschelli','Carvell','1979-10-07','29747 Charing Cross Center','F','Soltero(a)','dcarvell1e@4shared.com','Universitario'),
('V32626329','Melodee','Madison','MacCleod','Isack','1984-11-30','586 Waubesa Terrace','F','Viudo(a)','misack1f@cdbaby.com','Bachillerato'),
('V33854591','Edi','Emelina','Harms','Gammett','1985-09-26','054 Sycamore Junction','F','Casado(a)','egammett1g@stumbleupon.com','Universitario'),
('V48829993','Mirilla','Mallorie','Blaine','Loukes','1977-07-07','4580 3rd Alley','M','Casado(a)','mloukes1h@typepad.com','Primaria'),
('V68542148','Melany','Gwenette','Gullivent','Surmon','1996-09-01','2 Fair Oaks Place','F','Divorciado(a)','gsurmon1i@bluehost.com','Bachillerato'),
('V99570421','Meggy','Dasya','Rowbury','Carress','1987-12-08','7825 Katie Avenue','F','Divorciado(a)','dcarress1j@irs.gov','Universitario'),
('V62990915','Thekla','Matelda','Tagg','Leyzell','1971-03-26','97147 New Castle Street','F','Viudo(a)','mleyzell1k@pinterest.com','Primaria'),
('V11425279','Dewitt','Scotti','Dennistoun','Fulmen','1973-02-28','1849 Forest Center','F','Divorciado(a)','sfulmen1l@g.co','Bachillerato'),
('V87727632','Tally','Courtenay','Savary','Longmore','1997-09-14','018 Monterey Drive','F','Casado(a)','clongmore1m@istockphoto.com','Universitario'),
('V55136102','Brade','Bibi','Lantuffe','Enoksson','1995-03-18','6 Waxwing Terrace','M','Viudo(a)','benoksson1n@comsenz.com','Primaria'),
('V99392868','Herold','Winnie','Vosse','Vanichkov','1972-06-17','41 Morrow Pass','M','Divorciado(a)','wvanichkov1o@yelp.com','Bachillerato'),
('V82808667','Giralda','Gabriela','Dolby','Traise','1980-10-31','11 Logan Lane','M','Viudo(a)','gtraise1p@alexa.com','Universitario'),
('V34714307','Skye','Rochette','Harraway','Jonuzi','1975-05-23','5637 New Castle Avenue','M','Casado(a)','rjonuzi1q@aol.com','Universitario'),
('V70783876','Federico','Sam','Dengel','Mobius','1993-11-27','69 Grover Junction','F','Soltero(a)','smobius1r@usgs.gov','Bachillerato'),
('V46631827','Beauregard','Gale','Renbold','Weymont','1989-07-08','4506 Sachs Court','F','Soltero(a)','gweymont1s@privacy.gov.au','Primaria'),
('V56118810','Jacky','Pren','Taylour','Sturm','1974-10-31','475 Pankratz Crossing','F','Viudo(a)','psturm1t@quantcast.com','Universitario');



insert  into padres (cedula_persona,pais_residencia) values 
('V36515502','China'),
('V14832231','China'),
('V80920371','China'),
('V27049463','Ukraine'),
('V45072650','United States'),
('V41090241','China'),
('V04667374','China'),
('V75137320','Indonesia'),
('V24992920','Czech Republic'),
('V97836554','Peru'),
('V93029260','Sweden'),
('V66483433','Egypt'),
('V24055118','Indonesia'),
('V95165912','Philippines'),
('V85321459','Panama'),
('V99806340','China'),
('V21227139','Indonesia'),
('V02286258','Indonesia'),
('V64765176','Venezuela'),
('V77427358','Thailand'),
('V35386169','Brazil'),
('V36756164','Japan'),
('V02288319','Philippines'),
('V81395335','Honduras'),
('V49593189','Sweden'),
('V50117141','Guatemala'),
('V49469440','Indonesia'),
('V13336593','Philippines'),
('V32952482','Indonesia'),
('V15801593','Portugal'),
('V79112540','Indonesia'),
('V53738892','Spain'),
('V80812803','Bosnia and Herzegovina'),
('V87971733','China'),
('V65612580','Norway'),
('V23386453','Palestinian Territory'),
('V30926499','Andorra'),
('V10457386','Philippines'),
('V04388769','China'),
('V60544306','Chad'),
('V09838593','Indonesia'),
('V06594327','Peru'),
('V96168440','Ukraine'),
('V69314620','Canada'),
('V98673367','Brazil'),
('V86711817','Russia'),
('V89673979','Russia'),
('V98670740','China'),
('V43206204','United Kingdom'),
('V43736580','Indonesia'),
('V63368952','Pakistan'),
('V32626329','China'),
('V33854591','Slovenia'),
('V48829993','Argentina'),
('V68542148','France'),
('V99570421','China'),
('V62990915','Thailand'),
('V11425279','Argentina'),
('V87727632','Benin'),
('V55136102','China'),
('V99392868','Vietnam'),
('V82808667','China'),
('V34714307','Indonesia'),
('V70783876','China'),
('V46631827','Argentina'),
('V56118810','Indonesia');


insert  into telefonos (cedula_persona , relacion, prefijo, numero) values 
('V36515502', 'Principal', '3562', '93446467'),
('V14832231', 'Principal', '8319', '06186451'),
('V80920371', 'Principal', '3137', '29760640'),
('V27049463', 'Principal', '1540', '73687102'),
('V45072650', 'Principal', '2669', '71477292'),
('V41090241', 'Principal', '6046', '36583868'),
('V04667374', 'Principal', '2189', '09809334'),
('V75137320', 'Principal', '9874', '27742808'),
('V24992920', 'Principal', '7911', '01231931'),
('V97836554', 'Principal', '2181', '36389797'),
('V93029260', 'Principal', '5307', '13450585'),
('V66483433', 'Principal', '7200', '29596530'),
('V24055118', 'Principal', '6348', '81116094'),
('V95165912', 'Principal', '7615', '66941574'),
('V85321459', 'Principal', '9341', '79769211'),
('V99806340', 'Principal', '3142', '37910699'),
('V21227139', 'Principal', '3447', '32757374'),
('V02286258', 'Principal', '9551', '94804950'),
('V64765176', 'Principal', '3035', '39493848'),
('V77427358', 'Principal', '5053', '42878361'),
('V35386169', 'Principal', '3485', '01361285'),
('V36756164', 'Principal', '8216', '29058273'),
('V02288319', 'Principal', '8586', '81164042'),
('V81395335', 'Principal', '6552', '77889540'),
('V49593189', 'Principal', '4227', '50442510'),
('V50117141', 'Principal', '0173', '28786374'),
('V49469440', 'Principal', '4538', '85522280'),
('V13336593', 'Principal', '1171', '18726185'),
('V32952482', 'Principal', '3593', '12019325'),
('V15801593', 'Principal', '3864', '61489221'),
('V79112540', 'Principal', '0741', '47501011'),
('V53738892', 'Principal', '5257', '61141329'),
('V80812803', 'Principal', '9515', '05616955'),
('V87971733', 'Principal', '3731', '50969247'),
('V65612580', 'Principal', '8756', '38741762'),
('V23386453', 'Principal', '8084', '42530058'),
('V30926499', 'Principal', '2206', '24179684'),
('V10457386', 'Principal', '8513', '63437022'),
('V04388769', 'Principal', '0235', '34427881'),
('V60544306', 'Principal', '8352', '19059639'),
('V09838593', 'Principal', '5278', '24098743'),
('V06594327', 'Principal', '2293', '57610059'),
('V96168440', 'Principal', '7583', '85416748'),
('V69314620', 'Principal', '1566', '37657554'),
('V98673367', 'Principal', '6215', '72009219'),
('V86711817', 'Principal', '0173', '64704155'),
('V89673979', 'Principal', '3237', '91916662'),
('V98670740', 'Principal', '5389', '42350924'),
('V43206204', 'Principal', '6572', '19832653'),
('V43736580', 'Principal', '6126', '29339989'),
('V63368952', 'Principal', '3363', '20107243'),
('V32626329', 'Principal', '5880', '46084121'),
('V33854591', 'Principal', '8411', '60721086'),
('V48829993', 'Principal', '7200', '79767155'),
('V68542148', 'Principal', '3365', '56493008'),
('V99570421', 'Principal', '1855', '71798019'),
('V62990915', 'Principal', '8845', '26105992'),
('V11425279', 'Principal', '3325', '54725387'),
('V87727632', 'Principal', '5043', '89779239'),
('V55136102', 'Principal', '5003', '46117214'),
('V99392868', 'Principal', '4017', '94107323'),
('V82808667', 'Principal', '0217', '98199195'),
('V34714307', 'Principal', '1187', '56210213'),
('V70783876', 'Principal', '6460', '43668731'),
('V46631827', 'Principal', '9623', '72274655'),
('V56118810', 'Principal', '3344', '71563478'),
('V36515502', 'Secundario', '9936', '67226588'),
('V14832231', 'Secundario', '1877', '31503019'),
('V80920371', 'Secundario', '4317', '48227038'),
('V27049463', 'Secundario', '6681', '01407106'),
('V45072650', 'Secundario', '7587', '66944776'),
('V41090241', 'Secundario', '8766', '48846965'),
('V04667374', 'Secundario', '6462', '94731782'),
('V75137320', 'Secundario', '3735', '79619140'),
('V24992920', 'Secundario', '3924', '25622188'),
('V97836554', 'Secundario', '0755', '10270493'),
('V93029260', 'Secundario', '1774', '31220767'),
('V66483433', 'Secundario', '6864', '71777194'),
('V24055118', 'Secundario', '4296', '73500427'),
('V95165912', 'Secundario', '0134', '46059384'),
('V85321459', 'Secundario', '1087', '56025572'),
('V99806340', 'Secundario', '4082', '46570414'),
('V21227139', 'Secundario', '4759', '35924301'),
('V02286258', 'Secundario', '0963', '05651772'),
('V64765176', 'Secundario', '9317', '08689466'),
('V77427358', 'Secundario', '6668', '14046544'),
('V35386169', 'Secundario', '0695', '62154641'),
('V36756164', 'Secundario', '0467', '76152320'),
('V02288319', 'Secundario', '7181', '88107145'),
('V81395335', 'Secundario', '5280', '47580964'),
('V49593189', 'Secundario', '2663', '32585552'),
('V50117141', 'Secundario', '5126', '17528625'),
('V49469440', 'Secundario', '1083', '01754004'),
('V13336593', 'Secundario', '0050', '72578128'),
('V32952482', 'Secundario', '9871', '17678505'),
('V15801593', 'Secundario', '6188', '28660613'),
('V79112540', 'Secundario', '2034', '63630898'),
('V53738892', 'Secundario', '2998', '11294462'),
('V80812803', 'Secundario', '5269', '14306505'),
('V87971733', 'Secundario', '6387', '53534439'),
('V65612580', 'Secundario', '6719', '54789654'),
('V23386453', 'Secundario', '2825', '75004019'),
('V30926499', 'Secundario', '1630', '46379019'),
('V10457386', 'Secundario', '2968', '37980928'),
('V04388769', 'Secundario', '0490', '95267786'),
('V60544306', 'Secundario', '7882', '34589535'),
('V09838593', 'Secundario', '7750', '58099535'),
('V06594327', 'Secundario', '4705', '24976497'),
('V96168440', 'Secundario', '4999', '97021328'),
('V69314620', 'Secundario', '7517', '86100384'),
('V98673367', 'Secundario', '0972', '28060709'),
('V86711817', 'Secundario', '8444', '86606846'),
('V89673979', 'Secundario', '3674', '90394556'),
('V98670740', 'Secundario', '7517', '67539856'),
('V43206204', 'Secundario', '2626', '91635174'),
('V43736580', 'Secundario', '4072', '79724445'),
('V63368952', 'Secundario', '9143', '77661605'),
('V32626329', 'Secundario', '0544', '64951678'),
('V33854591', 'Secundario', '6210', '47664923'),
('V48829993', 'Secundario', '9966', '08833759'),
('V68542148', 'Secundario', '4898', '88824472'),
('V99570421', 'Secundario', '1217', '44828528'),
('V62990915', 'Secundario', '8139', '04025369'),
('V11425279', 'Secundario', '2652', '03605185'),
('V87727632', 'Secundario', '7698', '10080928'),
('V55136102', 'Secundario', '0201', '14015486'),
('V99392868', 'Secundario', '8317', '98358255'),
('V82808667', 'Secundario', '3760', '58947120'),
('V34714307', 'Secundario', '8943', '99195400'),
('V70783876', 'Secundario', '3542', '82762127'),
('V46631827', 'Secundario', '7614', '97842808'),
('V56118810', 'Secundario', '8706', '24275084'),
('V36515502', 'Trabajo', '0462', '95588068'),
('V14832231', 'Trabajo', '7101', '41947211'),
('V80920371', 'Trabajo', '5707', '56224735'),
('V27049463', 'Trabajo', '3555', '84349254'),
('V45072650', 'Trabajo', '0851', '04800453'),
('V41090241', 'Trabajo', '4472', '91429948'),
('V04667374', 'Trabajo', '6934', '69964677'),
('V75137320', 'Trabajo', '1100', '66503906'),
('V24992920', 'Trabajo', '6285', '62811067'),
('V97836554', 'Trabajo', '9323', '94185610'),
('V93029260', 'Trabajo', '0299', '59928929'),
('V66483433', 'Trabajo', '1600', '94824062'),
('V24055118', 'Trabajo', '8759', '63294454'),
('V95165912', 'Trabajo', '9313', '66372114'),
('V85321459', 'Trabajo', '0374', '12255112'),
('V99806340', 'Trabajo', '2769', '71458714'),
('V21227139', 'Trabajo', '2928', '29405967'),
('V02286258', 'Trabajo', '4996', '11554712'),
('V64765176', 'Trabajo', '0128', '74002199'),
('V77427358', 'Trabajo', '4037', '29748631'),
('V35386169', 'Trabajo', '1973', '75582393'),
('V36756164', 'Trabajo', '6223', '08458756'),
('V02288319', 'Trabajo', '1249', '45550754'),
('V81395335', 'Trabajo', '2069', '49782025'),
('V49593189', 'Trabajo', '9843', '52332850'),
('V50117141', 'Trabajo', '0533', '34562655'),
('V49469440', 'Trabajo', '9909', '41141286'),
('V13336593', 'Trabajo', '2275', '39995713'),
('V32952482', 'Trabajo', '7503', '03061838'),
('V15801593', 'Trabajo', '3120', '00129399'),
('V79112540', 'Trabajo', '9020', '45349324'),
('V53738892', 'Trabajo', '7940', '44217334'),
('V80812803', 'Trabajo', '7942', '85812799'),
('V87971733', 'Trabajo', '9898', '16268467'),
('V65612580', 'Trabajo', '2706', '26337387'),
('V23386453', 'Trabajo', '4122', '55960458'),
('V30926499', 'Trabajo', '8180', '33748724'),
('V10457386', 'Trabajo', '3626', '39528982'),
('V04388769', 'Trabajo', '5117', '25935743'),
('V60544306', 'Trabajo', '4158', '31756768'),
('V09838593', 'Trabajo', '1409', '95606604'),
('V06594327', 'Trabajo', '1575', '63456759'),
('V96168440', 'Trabajo', '2902', '21181142'),
('V69314620', 'Trabajo', '2771', '09615243'),
('V98673367', 'Trabajo', '6227', '24347682'),
('V86711817', 'Trabajo', '0155', '61375375'),
('V89673979', 'Trabajo', '4602', '27164555'),
('V98670740', 'Trabajo', '9961', '19100584'),
('V43206204', 'Trabajo', '5737', '17171466'),
('V43736580', 'Trabajo', '1375', '76667229'),
('V63368952', 'Trabajo', '5084', '24572668'),
('V32626329', 'Trabajo', '4685', '13210141'),
('V33854591', 'Trabajo', '5469', '09740011'),
('V48829993', 'Trabajo', '3011', '88855791'),
('V68542148', 'Trabajo', '9453', '68733828'),
('V99570421', 'Trabajo', '9463', '76220236'),
('V62990915', 'Trabajo', '1093', '47167885'),
('V11425279', 'Trabajo', '2116', '03082079'),
('V87727632', 'Trabajo', '4192', '61113243'),
('V55136102', 'Trabajo', '1060', '14644552'),
('V99392868', 'Trabajo', '2099', '02442899'),
('V82808667', 'Trabajo', '3098', '02386185'),
('V34714307', 'Trabajo', '5501', '62074322'),
('V70783876', 'Trabajo', '5283', '09243743'),
('V46631827', 'Trabajo', '5815', '36676917'),
('V56118810', 'Trabajo', '2736', '13004739');


insert  into datos_vivienda (cedula_persona,condicion,tipo,tenencia) values 
('V36515502','Regular','Rancho','NC'),
('V14832231','Buena','Rancho','Prestada'),
('V80920371','Regular','Casa','Propia'),
('V27049463','Buena','Apartamento','NC'),
('V45072650','Buena','Casa','NC'),
('V41090241','Mala','Apartamento','NC'),
('V04667374','Regular','Rancho','Prestada'),
('V75137320','Regular','Habitacion','NC'),
('V24992920','Regular','Quinta','Alquilada'),
('V97836554','Regular','Rancho','Propia'),
('V93029260','Buena','Habitacion','Alquilada'),
('V66483433','Regular','Apartamento','Alquilada'),
('V24055118','Mala','Apartamento','Alquilada'),
('V95165912','Buena','Apartamento','NC'),
('V85321459','Mala','Quinta','Propia'),
('V99806340','Regular','Habitacion','Alquilada'),
('V21227139','Buena','Rancho','Prestada'),
('V02286258','Regular','Habitacion','Alquilada'),
('V64765176','Regular','Apartamento','NC'),
('V77427358','Buena','Apartamento','Prestada'),
('V35386169','Mala','Rancho','Propia'),
('V36756164','Regular','Habitacion','NC'),
('V02288319','Mala','Habitacion','Alquilada'),
('V81395335','Regular','Habitacion','Alquilada'),
('V49593189','Buena','Quinta','NC'),
('V50117141','Buena','Apartamento','Propia'),
('V49469440','Regular','Habitacion','Alquilada'),
('V13336593','Regular','Habitacion','Propia'),
('V32952482','Mala','Apartamento','Prestada'),
('V15801593','Buena','Habitacion','NC'),
('V79112540','Buena','Casa','Alquilada'),
('V53738892','Buena','Rancho','Alquilada'),
('V80812803','Buena','Rancho','Propia'),
('V87971733','Mala','Apartamento','NC'),
('V65612580','Buena','Casa','NC'),
('V23386453','Buena','Casa','Alquilada'),
('V30926499','Regular','Casa','Propia'),
('V10457386','Regular','Casa','Propia'),
('V04388769','Buena','Quinta','Alquilada'),
('V60544306','Regular','Rancho','Alquilada'),
('V09838593','Regular','Habitacion','Alquilada'),
('V06594327','Buena','Rancho','Prestada'),
('V96168440','Regular','Habitacion','Alquilada'),
('V69314620','Mala','Apartamento','Alquilada'),
('V98673367','Mala','Quinta','NC'),
('V86711817','Mala','Habitacion','NC'),
('V89673979','Regular','Quinta','NC'),
('V98670740','Mala','Habitacion','Prestada'),
('V43206204','Regular','Rancho','Propia'),
('V43736580','Mala','Casa','Alquilada'),
('V63368952','Buena','Quinta','Prestada'),
('V32626329','Regular','Apartamento','Prestada'),
('V33854591','Regular','Quinta','Alquilada'),
('V48829993','Regular','Quinta','Propia'),
('V68542148','Buena','Apartamento','NC'),
('V99570421','Regular','Rancho','Propia'),
('V62990915','Buena','Quinta','Alquilada'),
('V11425279','Mala','Casa','Prestada'),
('V87727632','Mala','Rancho','Propia'),
('V55136102','Buena','Habitacion','NC'),
('V99392868','Buena','Casa','Prestada'),
('V82808667','Buena','Habitacion','Prestada'),
('V34714307','Regular','Quinta','NC'),
('V70783876','Buena','Habitacion','Prestada'),
('V46631827','Regular','Apartamento','NC'),
('V56118810','Buena','Rancho','NC');



insert  into datos_laborales (cedula_persona,empleo,lugar_trabajo,remuneracion,tipo_remuneracion) values 
('V36515502', 'Occupational Therapist', '9 Mcguire Junction', 8, 'Mensual'),
('V14832231', 'Health Coach IV', '0666 Sutteridge Circle', 11, 'Quincenal'),
('V80920371', 'Civil Engineer', '9538 Towne Park', 20, 'Semanal'),
('V27049463', 'Senior Financial Analyst', '282 Dovetail Lane', 9, 'Mensual'),
('V45072650', 'Speech Pathologist', '929 American Ash Circle', 22, 'Semanal'),
('V41090241', 'Senior Developer', '21 Ruskin Lane', 11, 'Diaria'),
('V04667374', 'Junior Executive', '1 Weeping Birch Way', 19, 'Semanal'),
('V75137320', 'Clinical Specialist', '96 Melby Place', 2, 'Semanal'),
('V24992920', 'Tax Accountant', '9821 Dryden Hill', 10, 'Diaria'),
('V97836554', 'Developer I', '6 Truax Way', 25, 'Diaria'),
('V93029260', 'Research Associate', '44774 Evergreen Court', 17, 'Diaria'),
('V66483433', 'Marketing Assistant', '5636 Continental Lane', 5, 'Semanal'),
('V24055118', 'Human Resources Assistant III', '64693 Clyde Gallagher Street', 5, 'Mensual'),
('V95165912', 'Software Consultant', '50 Dennis Point', 25, 'Mensual'),
('V85321459', 'Automation Specialist I', '40 Bunker Hill Junction', 17, 'Quincenal'),
('V99806340', 'Senior Cost Accountant', '264 Scott Road', 12, 'Semanal'),
('V21227139', 'Human Resources Manager', '8055 Dapin Junction', 24, 'Semanal'),
('V02286258', 'Chemical Engineer', '748 Northland Pass', 3, 'Quincenal'),
('V64765176', 'Administrative Officer', '3 Comanche Plaza', 4, 'Diaria'),
('V77427358', 'Media Manager I', '72 Express Circle', 8, 'Quincenal'),
('V35386169', 'Web Designer III', '9387 Starling Center', 10, 'Diaria'),
('V36756164', 'Statistician IV', '7 Cody Pass', 15, 'Semanal'),
('V02288319', 'Web Developer II', '3 Anthes Junction', 1, 'Diaria'),
('V81395335', 'Civil Engineer', '56 Sycamore Street', 11, 'Quincenal'),
('V49593189', 'VP Marketing', '46823 Pleasure Terrace', 14, 'Mensual'),
('V50117141', 'Accounting Assistant IV', '1885 Judy Circle', 1, 'Quincenal'),
('V49469440', 'Business Systems Development Analyst', '10496 Merchant Plaza', 12, 'Semanal'),
('V13336593', 'Health Coach I', '2206 Lakewood Center', 23, 'Mensual'),
('V32952482', 'Teacher', '9318 Welch Pass', 14, 'Quincenal'),
('V15801593', 'Help Desk Operator', '2870 Luster Way', 14, 'Quincenal'),
('V79112540', 'Software Engineer III', '3 Fordem Trail', 8, 'Quincenal'),
('V53738892', 'Nurse Practicioner', '4988 Caliangt Way', 3, 'Semanal'),
('V80812803', 'Mechanical Systems Engineer', '10662 4th Crossing', 14, 'Quincenal'),
('V87971733', 'Electrical Engineer', '422 Reindahl Lane', 21, 'Diaria'),
('V65612580', 'Junior Executive', '11813 Valley Edge Plaza', 2, 'Quincenal'),
('V23386453', 'Cost Accountant', '46 Paget Terrace', 5, 'Mensual'),
('V30926499', 'Research Assistant IV', '9 Division Trail', 21, 'Mensual'),
('V10457386', 'Registered Nurse', '63 Sloan Court', 2, 'Semanal'),
('V04388769', 'Software Test Engineer II', '6562 Melby Terrace', 10, 'Diaria'),
('V60544306', 'Programmer III', '32 Hintze Alley', 25, 'Mensual'),
('V09838593', 'Pharmacist', '9391 Spohn Park', 16, 'Quincenal'),
('V06594327', 'Accountant IV', '1635 Hovde Plaza', 2, 'Semanal'),
('V96168440', 'Information Systems Manager', '7 Jana Alley', 17, 'Semanal'),
('V69314620', 'Human Resources Assistant IV', '627 Blackbird Hill', 13, 'Diaria'),
('V98673367', 'Office Assistant III', '67434 Victoria Terrace', 8, 'Semanal'),
('V86711817', 'Marketing Manager', '02163 Northview Center', 18, 'Mensual'),
('V89673979', 'Sales Representative', '65742 Merchant Point', 10, 'Mensual'),
('V98670740', 'Cost Accountant', '6150 Gina Way', 24, 'Mensual'),
('V43206204', 'Budget/Accounting Analyst I', '08095 Sutteridge Lane', 16, 'Mensual'),
('V43736580', 'Compensation Analyst', '77 Center Lane', 6, 'Mensual'),
('V63368952', 'Media Manager IV', '971 Mayfield Circle', 13, 'Quincenal'),
('V32626329', 'Safety Technician II', '5 Village Green Junction', 23, 'Diaria'),
('V33854591', 'Senior Editor', '2893 Riverside Point', 7, 'Diaria'),
('V48829993', 'Physical Therapy Assistant', '738 Huxley Trail', 15, 'Diaria'),
('V68542148', 'Legal Assistant', '70 International Crossing', 4, 'Diaria'),
('V99570421', 'Staff Accountant II', '1788 Bluestem Pass', 11, 'Mensual'),
('V62990915', 'Software Consultant', '96 Helena Pass', 15, 'Diaria'),
('V11425279', 'Actuary', '5453 Messerschmidt Pass', 9, 'Diaria'),
('V87727632', 'Developer IV', '2660 Steensland Hill', 16, 'Semanal'),
('V55136102', 'Human Resources Assistant II', '8813 Annamark Circle', 4, 'Diaria'),
('V99392868', 'Accountant II', '77897 Crest Line Circle', 7, 'Diaria'),
('V82808667', 'Computer Systems Analyst IV', '53 Del Mar Point', 15, 'Quincenal'),
('V34714307', 'Statistician II', '1130 Prairieview Place', 8, 'Diaria'),
('V70783876', 'Project Manager', '767 Luster Alley', 7, 'Quincenal'),
('V46631827', 'Research Nurse', '0 Clemons Trail', 11, 'Diaria'),
('V56118810', 'Financial Analyst', '1314 Loftsgordon Circle', 5, 'Semanal');



-- direcciones

insert  into direcciones (cedula_persona, estado, municipio, parroquia, sector, calle, nro_casa, punto_referencia) values 
('V36515502', 'South Africa', 'Indonesia', 'Bergvliet', 'Soe', 'Brown', '32', '3 Dottie Parkway'),
('V14832231', 'Brazil', 'Iran', 'Imbituba', 'Namīn', 'Heffernan', '78', '8959 Lake View Drive'),
('V80920371', 'Dominican Republic', 'Russia', 'Las Matas de Farfán', 'Vydreno', 'Monterey', '18', '6904 Mariners Cove Crossing'),
('V27049463', 'China', 'Portugal', 'Miaoyu', 'Sebadelhe', 'Blackbird', '79', '3 Mayfield Road'),
('V45072650', 'Uruguay', 'Venezuela', 'Migues', 'Boca de Uchire', 'Service', '52', '5 American Pass'),
('V41090241', 'Philippines', 'China', 'Calaoagan', 'Fengchan', 'Namekagon', '10', '8 Longview Avenue'),
('V04667374', 'Portugal', 'China', 'Casal das Figueiras', 'Shiwan', 'Dorton', '40', '1 Logan Hill'),
('V75137320', 'China', 'China', 'Chengui', 'Wuxihe', 'Meadow Vale', '57', '5 Westend Hill'),
('V24992920', 'Philippines', 'China', 'Malibong East', 'Xinquan', 'Florence', '32', '7520 Cascade Street'),
('V97836554', 'Colombia', 'Netherlands', 'Ráquira', 'Alkmaar', 'Westend', '48', '0 Meadow Valley Hill'),
('V93029260', 'China', 'China', 'Guanghai', 'Qingshan', 'Charing Cross', '34', '895 Cody Plaza'),
('V66483433', 'Papua New Guinea', 'Indonesia', 'Kokopo', 'Cieurih Satu', 'Petterle', '20', '93841 Stuart Hill'),
('V24055118', 'Nigeria', 'Puerto Rico', 'Opi', 'Guaynabo', 'Hooker', '87', '84 Alpine Plaza'),
('V95165912', 'Russia', 'China', 'Issa', 'Xiyuan', 'Ridge Oak', '28', '4531 Melby Point'),
('V85321459', 'Brazil', 'Portugal', 'Navegantes', 'Mosteiro', 'Helena', '82', '7789 Corben Lane'),
('V99806340', 'Israel', 'China', 'H̱olon', 'Taiping', 'Continental', '79', '7 Dennis Junction'),
('V21227139', 'China', 'United States', 'Panshi', 'Katy', 'Thompson', '24', '9518 Sundown Court'),
('V02286258', 'Denmark', 'Philippines', 'København', 'Tala', 'Anthes', '09', '106 Scofield Crossing'),
('V64765176', 'Japan', 'Mexico', 'Gifu-shi', 'Las Palmas', 'Express', '58', '69 Granby Alley'),
('V77427358', 'Russia', 'Uganda', 'Aniva', 'Bwizibwera', 'Anzinger', '95', '141 Artisan Crossing'),
('V35386169', 'China', 'Colombia', 'Quwa', 'Carepa', 'Claremont', '77', '2331 Debra Drive'),
('V36756164', 'Croatia', 'Greece', 'Bestovje', 'Polykárpi', 'Raven', '04', '53 Longview Trail'),
('V02288319', 'Sweden', 'Japan', 'Oxelösund', 'Kitahama', 'East', '96', '82139 Di Loreto Place'),
('V81395335', 'South Africa', 'Greece', 'Lydenburg', 'Kolchikón', 'Dennis', '15', '6705 Veith Road'),
('V49593189', 'Russia', 'Afghanistan', 'Lakhdenpokh’ya', 'Āqchah', 'Anhalt', '81', '3 Meadow Ridge Lane'),
('V50117141', 'China', 'Indonesia', 'Dongpu', 'Ambat', 'Manley', '45', '31792 Lawn Parkway'),
('V49469440', 'Nicaragua', 'Poland', 'Santo Tomás', 'Osielsko', 'Paget', '76', '7776 Hudson Parkway'),
('V13336593', 'Colombia', 'Czech Republic', 'Puerto Asís', 'Kamenný Přívoz', 'Messerschmidt', '27', '724 Cascade Avenue'),
('V32952482', 'Argentina', 'Malta', 'Quilmes', 'L-Iklin', 'Larry', '89', '85 Crownhardt Center'),
('V15801593', 'Portugal', 'Myanmar', 'Fátima', 'Bogale', 'Fieldstone', '66', '82819 Scott Road'),
('V79112540', 'Philippines', 'Indonesia', 'Tuban', 'Rote', 'South', '68', '6041 Onsgard Drive'),
('V53738892', 'China', 'China', 'Tadou', 'Xuexi', 'Fordem', '10', '53996 School Point'),
('V80812803', 'Sweden', 'Comoros', 'Gävle', 'Moutsamoudou', 'Loomis', '53', '60 Warrior Crossing'),
('V87971733', 'United States', 'Indonesia', 'Aurora', 'Kenamoen', 'Paget', '44', '1742 Dunning Way'),
('V65612580', 'Brazil', 'China', 'Itaúna', 'Longguang', 'Green', '86', '2283 Onsgard Junction'),
('V23386453', 'Philippines', 'Japan', 'Libas', 'Kyoto', 'Vera', '67', '98 Ramsey Court'),
('V30926499', 'China', 'Russia', 'Dalu', 'Nevel’sk', 'Memorial', '04', '86384 Colorado Crossing'),
('V10457386', 'Russia', 'China', 'Balakhninskiy', 'Wa’erma', 'Barby', '81', '332 Fulton Trail'),
('V04388769', 'Vietnam', 'Indonesia', 'Thị Trấn Thanh Lưu', 'Kahuripan', '5th', '68', '32456 Heffernan Point'),
('V60544306', 'Philippines', 'Azerbaijan', 'Maddela', 'Binagadi', 'Ryan', '91', '70 Weeping Birch Circle'),
('V09838593', 'Slovenia', 'Brazil', 'Cerkvenjak', 'Cruz das Almas', 'Cascade', '33', '06 Scott Alley'),
('V06594327', 'China', 'Portugal', 'Yingcheng', 'Ribeira das Taínhas', 'Caliangt', '08', '0 Hoffman Drive'),
('V96168440', 'Thailand', 'Belarus', 'Srinagarindra', 'Ivanava', 'Luster', '98', '30 Miller Alley'),
('V69314620', 'Peru', 'Madagascar', 'Mangas', 'Ambarakaraka', 'Manitowish', '81', '9 Upham Center'),
('V98673367', 'Bosnia and Herzegovina', 'Chile', 'Gornje Živinice', 'Coihaique', 'Claremont', '62', '0113 High Crossing Center'),
('V86711817', 'Indonesia', 'Cyprus', 'Nunsena', 'Mammari', 'Pearson', '98', '03364 Golden Leaf Alley'),
('V89673979', 'Chad', 'Portugal', 'Mboursou Léré', 'Vale de Figueira', 'Rusk', '42', '8034 2nd Court'),
('V98670740', 'Portugal', 'Netherlands', 'Pataias', 'Breda', 'Waxwing', '87', '2 Muir Avenue'),
('V43206204', 'Sweden', 'China', 'Arvika', 'Tuopu Luke', 'Forest', '27', '03217 Golden Leaf Drive'),
('V43736580', 'Sweden', 'Thailand', 'Löddeköpinge', 'Non Narai', 'Loeprich', '60', '3 Corben Avenue'),
('V63368952', 'Japan', 'Philippines', 'Itami', 'Socorro', 'Delaware', '20', '95073 Karstens Circle'),
('V32626329', 'Russia', 'Indonesia', 'Rzhev', 'Kalunan', 'Tennyson', '70', '5 Summer Ridge Road'),
('V33854591', 'Poland', 'China', 'Paniówki', 'Shihuang', 'Loomis', '91', '3649 Red Cloud Crossing'),
('V48829993', 'China', 'China', 'Yanghe', 'Yangshuo', 'Forest Dale', '10', '81 Bunker Hill Road'),
('V68542148', 'China', 'China', 'Baoxia', 'Wudong', 'Anthes', '92', '194 Carioca Trail'),
('V99570421', 'Guatemala', 'Greece', 'San Martín Zapotitlán', 'Kostakioí', 'Ilene', '77', '061 Springs Terrace'),
('V62990915', 'Indonesia', 'Sweden', 'Dasanlian Lauk', 'Ängelholm', 'Tennyson', '23', '43 Parkside Parkway'),
('V11425279', 'Poland', 'Peru', 'Wolanów', 'Challas', 'Sachs', '90', '941 Spohn Plaza'),
('V87727632', 'Czech Republic', 'China', 'Zlín', 'Qingduizi', 'Stang', '04', '158 Northview Point'),
('V55136102', 'Poland', 'France', 'Chwaszczyno', 'Cran-Gevrier', 'Tennyson', '22', '0 Nobel Drive'),
('V99392868', 'Malawi', 'Brazil', 'Mzuzu', 'Padre Paraíso', 'Pawling', '95', '593 Lakeland Crossing'),
('V82808667', 'China', 'China', 'Huangzhuang', 'Gyamco', 'Arizona', '02', '3 4th Avenue'),
('V34714307', 'China', 'Indonesia', 'Diancun', 'Sumurgung', 'Sloan', '15', '38 Spaight Pass'),
('V70783876', 'Libya', 'Japan', 'Tūkrah', 'Iiyama', 'Old Shore', '97', '44641 Kensington Avenue'),
('V46631827', 'Ecuador', 'Brazil', 'Guayaquil', 'Nova Odessa', '6th', '94', '31209 Macpherson Drive'),
('V56118810', 'China', 'Mongolia', 'Taha Man Zu', 'Ulaandel', 'Hauk', '39', '13714 Monica Alley');




-- Estudiantes


-- 33 estudiantes


-- personas

insert  into personas (cedula,p_nombre,s_nombre,p_apellido,s_apellido,fecha_nacimiento,lugar_nacimiento,genero,estado_civil,email,grado_academico) values 
('V34912585','Dagmar','Welbie','Caskey','Spence','2005-11-26','162 Texas Trail','M','','wspence0@economist.com',''),
('V37749936','Rutherford','Mae','Stannering','Ockland','2005-07-18','455 Scoville Crossing','F','','mockland1@networkadvertising.org',''),
('V33245132','Marketa','Kimberlee','Siddens','Triggle','2005-07-10','432 Nevada Point','M','','ktriggle2@cornell.edu',''),
('V34523902','Hastings','Dacey','Kennon','Guislin','2009-11-30','61 Dexter Parkway','F','','dguislin3@cnet.com',''),
('V39710197','Eimile','Waly','MacCaig','Ingolotti','2005-12-02','58522 Autumn Leaf Road','F','','wingolotti4@google.co.uk',''),
('V34168455','Shayne','Bentlee','Condy','McElvine','2005-08-24','8 Trailsway Junction','F','','bmcelvine5@msn.com',''),
('V30676984','Anitra','Clemmie','Thurby','Doudney','2010-01-17','9780 Spaight Alley','M','','cdoudney6@walmart.com',''),
('V30617930','Babara','Lowell','Swetenham','Everwin','2004-05-05','54052 Kropf Court','F','','leverwin7@answers.com',''),
('V32443424','Moise','Ermin','Heberden','Spadari','2006-06-02','99285 Dahle Center','F','','espadari8@ask.com',''),
('V30548966','Amalie','Hertha','Mattielli','Matiashvili','2006-07-22','3310 Elmside Way','F','','hmatiashvili9@weather.com',''),
('V34459825','Frederique','Teodora','Coxwell','Files','2009-12-20','04363 Springview Road','M','','tfilesa@globo.com',''),
('V36684060','Karylin','Maximilien','Kilsby','Hutcheon','2009-07-22','05608 Elgar Center','M','','mhutcheonb@scribd.com',''),
('V32204799','Sonny','Doralyn','Roxburgh','Gainforth','2007-01-26','53 Ridgeview Street','F','','dgainforthc@taobao.com',''),
('V30522071','Lyle','Garnet','Dennehy','Edgar','2006-06-05','6358 Starling Crossing','F','','gedgard@oakley.com',''),
('V34945013','Kiel','Arabel','Meffen','Rosthorn','2005-09-30','03 Oxford Parkway','F','','arosthorne@bluehost.com',''),
('V30439025','Seward','Maryann','Munkley','Bischof','2007-07-19','7044 Stuart Park','M','','mbischoff@blogtalkradio.com',''),
('V31719804','Nefen','Claus','Partkya','Nendick','2007-07-07','6 Meadow Vale Way','F','','cnendickg@indiatimes.com',''),
('V34396526','Ware','Ian','Spivey','Paula','2004-07-30','38 Rowland Way','M','','ipaulah@typepad.com',''),
('V33695137','Berkie','Elnar','Harrow','Leifer','2008-08-04','8966 Twin Pines Lane','F','','eleiferi@webeden.co.uk',''),
('V36533048','Ortensia','Gizela','Sorro','Boliver','2009-11-22','85 Center Crossing','F','','gboliverj@miitbeian.gov.cn',''),
('V39749877','Angie','Melitta','Attlee','Matantsev','2009-03-13','5657 Moulton Plaza','F','','mmatantsevk@livejournal.com',''),
('V36739965','Trudi','Thornie','Andreone','Ibanez','2006-02-22','12 Meadow Vale Alley','F','','tibanezl@woothemes.com',''),
('V31570581','Sidnee','Vicki','Kelledy','Luna','2006-01-01','8 Reindahl Street','M','','vlunam@unc.edu',''),
('V38391590','Stormy','Lay','Piburn','Readmire','2005-07-22','6255 Loftsgordon Lane','F','','lreadmiren@geocities.jp',''),
('V39675679','Car','Valentine','Banasevich','Ygo','2009-12-26','15968 Dawn Center','M','','vygoo@chronoengine.com',''),
('V33815733','Raynell','Doy','Dymick','Lillecrap','2006-12-18','9 Shopko Lane','F','','dlillecrapp@phoca.cz',''),
('V31468288','Jamima','Nathanil','Larrosa','McMillian','2007-08-02','28 Eagle Crest Parkway','F','','nmcmillianq@ted.com',''),
('V33934992','De witt','Johnny','Taile','Mattsson','2007-02-26','38 Warbler Place','F','','jmattssonr@ed.gov',''),
('V34646106','Bren','Kipp','Tuhy','Spencook','2006-04-12','96 Commercial Street','F','','kspencooks@howstuffworks.com',''),
('V33012705','Bamby','Addia','Lempertz','Elt','2007-10-17','4380 Coleman Alley','M','','aeltt@ihg.com',''),
('V37787295','Spense','Devonna','O'' Clovan','Tock','2007-05-19','727 Manley Junction','F','','dtocku@wikimedia.org',''),
('V35130922','Kirstyn','Laureen','Paolino','Stubbe','2009-08-30','1 Corry Trail','F','','lstubbev@cmu.edu',''),
('V35145513','Tedda','Abbey','Wynett','Davley','2007-05-28','988 Commercial Trail','F','','adavleyw@aol.com','');

-- telefonos

insert  into direcciones (cedula_persona,estado,municipio,parroquia,sector,calle,nro_casa,punto_referencia) values 
('V34912585','China','Philippines','Zhongwei','Tiniguiban','Di Loreto','63','01764 Green Circle'),
('V37749936','Serbia','Ukraine','Užice','Drahovo','Elmside','82','66567 Crescent Oaks Drive'),
('V33245132','South Korea','Indonesia','Hwasun','Lokokrangan','Warbler','92','69 Pearson Junction'),
('V34523902','Peru','Brazil','Concordia','Guaçuí','Mesta','23','90960 Buell Road'),
('V39710197','China','Indonesia','Koktokay','Glugur Tengah','Basil','89','2715 Valley Edge Alley'),
('V34168455','United States','Czech Republic','Atlanta','Lochovice','Pepper Wood','61','00444 Hollow Ridge Park'),
('V30676984','Portugal','China','Quintães','Pujiang','Schmedeman','35','7 Brentwood Junction'),
('V30617930','China','Italy','Kunshan','Roma','Mallard','18','8842 Elmside Hill'),
('V32443424','China','Cyprus','Anfeng','Erími','Northwestern','28','2135 Caliangt Terrace'),
('V30548966','Sweden','Portugal','Göteborg','Figueiras','Hoard','22','20 Meadow Valley Junction'),
('V34459825','Philippines','Portugal','Cafe','Fonte do Feto','Redwing','53','1 Farmco Center'),
('V36684060','Bosnia and Herzegovina','Brazil','Rumboci','Caçapava','Sunfield','15','54501 Coolidge Road'),
('V32204799','Brazil','Indonesia','Campos Belos','Juwana','Browning','51','0511 Clove Center'),
('V30522071','Colombia','China','Cunday','Xianyan','Laurel','59','2 Stone Corner Alley'),
('V34945013','Sudan','China','Kassala','Weifen','Fallview','49','08 Carioca Parkway'),
('V30439025','China','Japan','Huajie','Hadano','Crowley','95','5 Barnett Trail'),
('V31719804','Japan','Czech Republic','Fukuchiyama','Zaječí','Florence','20','1765 Sycamore Circle'),
('V34396526','Cyprus','Mexico','Famagusta','Pueblo Nuevo','Menomonie','09','25593 Oneill Drive'),
('V33695137','China','United States','Namling','San Bernardino','Onsgard','16','023 Sachtjen Point'),
('V36533048','Gambia','Bosnia and Herzegovina','Kass Wollof','Živinice','Crownhardt','97','5383 Hagan Park'),
('V39749877','Madagascar','China','Betioky','Jingyu','Grover','36','2727 Moland Junction'),
('V36739965','Russia','Philippines','Ivot','Santa Teresita','Manley','30','50 Springs Trail'),
('V31570581','Malaysia','China','Kuala Lumpur','Qingyuan','Bartelt','96','1949 Doe Crossing Alley'),
('V38391590','Afghanistan','Thailand','Markaz-e Ḩukūmat-e Darwēshān','Khanu Woralaksaburi','Dwight','03','7813 Hayes Park'),
('V39675679','China','Finland','Shangchewan','Viljakkala','Carey','51','1 Jay Trail'),
('V33815733','China','Yemen','Shangmofang','Radā‘','Maple','74','04 Manufacturers Point'),
('V31468288','Indonesia','Mexico','Tegallega','Buenavista','Jenna','28','5589 Roth Place'),
('V33934992','Colombia','Panama','Turbo','La Peña','Carpenter','83','52 Ridgeview Pass'),
('V34646106','Colombia','Vietnam','Mocoa','Haiphong','Badeau','09','06456 Jay Terrace'),
('V33012705','Philippines','Indonesia','San Fernando','Desa Kertasari','Doe Crossing','28','17 Merchant Way'),
('V37787295','Turkmenistan','Jamaica','Farap','New Kingston','Luster','66','3260 Banding Junction'),
('V35130922','China','Philippines','Nanwai','Bacuyangan','Melvin','03','4 Dakota Plaza'),
('V35145513','Brazil','Germany','Dois Vizinhos','München','Florence','49','4 Duke Place');




insert  into telefonos (cedula_persona ,relacion,prefijo,numero) values 
('V34912585','Principal','3351','22462090'),
('V37749936','Principal','6412','81758532'),
('V33245132','Principal','0463','49971945'),
('V34523902','Principal','6348','55854854'),
('V39710197','Principal','5983','34743567'),
('V34168455','Principal','4631','12918025'),
('V30676984','Principal','2472','27691354'),
('V30617930','Principal','8689','49122966'),
('V32443424','Principal','9149','81016601'),
('V30548966','Principal','0242','39921620'),
('V34459825','Principal','5515','77657805'),
('V36684060','Principal','5771','23884956'),
('V32204799','Principal','3795','63210278'),
('V30522071','Principal','1400','92664490'),
('V34945013','Principal','5262','02662614'),
('V30439025','Principal','7107','57961537'),
('V31719804','Principal','4368','05322488'),
('V34396526','Principal','6606','83855624'),
('V33695137','Principal','1499','95051502'),
('V36533048','Principal','2911','10735817'),
('V39749877','Principal','2870','98633291'),
('V36739965','Principal','4841','55956734'),
('V31570581','Principal','7604','71031886'),
('V38391590','Principal','7192','10735329'),
('V39675679','Principal','7666','99208029'),
('V33815733','Principal','4523','64489561'),
('V31468288','Principal','6263','04327301'),
('V33934992','Principal','3814','43886070'),
('V34646106','Principal','7282','46885631'),
('V33012705','Principal','6411','75444587'),
('V37787295','Principal','7183','41408587'),
('V35130922','Principal','3154','40946922'),
('V35145513','Principal','2908','43731688'),
('V34912585','Secundario','7757','13448266'),
('V37749936','Secundario','4365','03183846'),
('V33245132','Secundario','3840','78089158'),
('V34523902','Secundario','5509','74413676'),
('V39710197','Secundario','3609','77683983'),
('V34168455','Secundario','6940','75109300'),
('V30676984','Secundario','8632','70084333'),
('V30617930','Secundario','8641','82756536'),
('V32443424','Secundario','1545','89186910'),
('V30548966','Secundario','6347','27446244'),
('V34459825','Secundario','5300','57102308'),
('V36684060','Secundario','0333','70625793'),
('V32204799','Secundario','8543','42948502'),
('V30522071','Secundario','3095','94158013'),
('V34945013','Secundario','5192','99481211'),
('V30439025','Secundario','4950','44668657'),
('V31719804','Secundario','5966','08850746'),
('V34396526','Secundario','7565','20011279'),
('V33695137','Secundario','3301','21987747'),
('V36533048','Secundario','3840','20498321'),
('V39749877','Secundario','2014','42223343'),
('V36739965','Secundario','3723','30258601'),
('V31570581','Secundario','0534','19572862'),
('V38391590','Secundario','8329','65684650'),
('V39675679','Secundario','8401','81272649'),
('V33815733','Secundario','0010','67487736'),
('V31468288','Secundario','2969','20854306'),
('V33934992','Secundario','2181','62867235'),
('V34646106','Secundario','3537','84956626'),
('V33012705','Secundario','2353','96783221'),
('V37787295','Secundario','0967','53794330'),
('V35130922','Secundario','0696','27637029'),
('V35145513','Secundario','5561','80900371');



-- carnet de la patria

insert  into carnet_patria (cedula_persona,codigo_carnet,serial_carnet) values 
('V34912585','8058117395','2621466408'),
('V37749936','0751437264','0711745037'),
('V33245132','8822653051','8338663066'),
('V34523902','0616485181','4299587396'),
('V39710197','9974556036','4041870937'),
('V34168455','7298392518','7020879119'),
('V30676984','6202841582','6986116708'),
('V30617930','7257541480','7396051291'),
('V32443424','4133117314','5657079295'),
('V30548966','0602196486','7751252015'),
('V34459825','2555679470','3860731203'),
('V36684060','9121849009','1287628724'),
('V32204799','1637545681','8894317939'),
('V30522071','8561881543','5269698423'),
('V34945013','3505261823','4742667595'),
('V30439025','9623243942','3814669295'),
('V31719804','3028569725','2690761612'),
('V34396526','0248896362','4566268035'),
('V33695137','8720001318','7733801647'),
('V36533048','7312020968','5067963347'),
('V39749877','1449205387','2552329804'),
('V36739965','9893616354','1978048678'),
('V31570581','2466490785','7299101421'),
('V38391590','7812315634','4073259528'),
('V39675679','9556003647','8989697568'),
('V33815733','0480867361','5860551208'),
('V31468288','8942533686','2982832300'),
('V33934992','8298209642','5140678196'),
('V34646106','5704186122','0373430990'),
('V33012705','7723690998','9254423725'),
('V37787295','6497616710','2654382089'),
('V35130922','3358594856','2149800512'),
('V35145513','4218714483','7809924568');



-- estudiantes

insert  into estudiantes (cedula_persona,cedula_escolar,plantel_proced,con_quien_vive,relacion_representante,cedula_padre,cedula_madre,cedula_representante) values 
('V34912585','V238729707678','Hahn,Weber and Botsford','ac tellus semper interdum mauris','Tio','V36515502','V87971733','V28278648'),
('V37749936','V439514146382','Turner LLC','tincidunt eget tempus vel pede morbi porttitor','Tio','V14832231','V65612580','V9933359'),
('V33245132','V950745894182','Mitchell and Sons','ante ipsum primis in','Tia','V80920371','V23386453','V31950478'),
('V34523902','V613666747839','Moen-Keebler','magna at','Tia','V27049463','V30926499','V38590950'),
('V39710197','V592249468135','Stamm,Franecki and Fahey','nec condimentum neque sapien placerat ante','Abuelo','V45072650','V10457386','V18526161'),
('V34168455','V141217133025','Schaden,Beier and Gerhold','sit amet justo morbi ut odio cras','Abuelo','V41090241','V04388769','V33118292'),
('V30676984','V083048126448','Lindgren,Blick and Lakin','fusce consequat nulla nisl nunc nisl duis','Tia','V04667374','V60544306','V28302608'),
('V30617930','V656532296434','Ritchie Group','tempus vel pede morbi porttitor','Abuelo','V75137320','V09838593','V18424188'),
('V32443424','V008760180297','Nitzsche Inc','in sapien iaculis congue vivamus metus','Tutor','V24992920','V06594327','V32238738'),
('V30548966','V838531639021','Labadie Inc','et commodo vulputate justo in','Tia','V97836554','V96168440','V16561305'),
('V34459825','V406154688459','Leffler-Okuneva','arcu libero rutrum ac lobortis','Abuelo','V93029260','V69314620','V11046976'),
('V36684060','V848944616189','Effertz-Stamm','odio elementum','Tia','V66483433','V98673367','V20568611'),
('V32204799','V336090437236','Abbott,Morar and Mayert','ac diam cras pellentesque volutpat dui maecenas tristique','Tio','V24055118','V86711817','V27252225'),
('V30522071','V640658186367','Schmeler Group','nulla ultrices aliquet maecenas leo odio condimentum id','Tio','V95165912','V89673979','V22601755'),
('V34945013','V617912720578','Prosacco,Johnson and Balistreri','ut massa quis','Tio','V85321459','V98670740','V33574387'),
('V30439025','V988110868353','Jenkins,Jacobi and Russel','at nulla suspendisse potenti cras in purus','Tia','V99806340','V43206204','V35634816'),
('V31719804','V963887266870','Kemmer-Ledner','amet nunc viverra dapibus nulla','Tutor','V21227139','V43736580','V27717006'),
('V34396526','V393131791582','Nitzsche-Hahn','ornare consequat lectus in est risus auctor sed','Tio','V02286258','V63368952','V31694733'),
('V33695137','V606086476985','Murray,Hoppe and Cummerata','nulla justo aliquam quis turpis eget elit sodales','Tio','V64765176','V32626329','V18905517'),
('V36533048','V782058573103','Stanton and Sons','in hac habitasse','Tio','V77427358','V33854591','V5714261'),
('V39749877','V775253286293','Ortiz,Schamberger and Lowe','ut rhoncus aliquet pulvinar sed nisl nunc','Tutor','V35386169','V48829993','V19987910'),
('V36739965','V584110278744','Rath,Fay and Goyette','in congue etiam justo etiam pretium','Tia','V36756164','V68542148','V4459062'),
('V31570581','V018937849773','Auer LLC','vestibulum ac est lacinia nisi','Abuelo','V02288319','V99570421','V22177376'),
('V38391590','V776736969867','Franecki Inc','sociis natoque penatibus et magnis dis','Tio','V81395335','V62990915','V35208115'),
('V39675679','V503846477317','Schmeler,Reichert and Cole','enim lorem ipsum dolor sit amet consectetuer','Abuelo','V49593189','V11425279','V32113794'),
('V33815733','V457291943682','Wyman,Mohr and Jones','leo odio condimentum id luctus nec','Abuelo','V50117141','V87727632','V36732297'),
('V31468288','V566809967936','Gusikowski,Von and Parker','maecenas pulvinar lobortis est phasellus sit','Tio','V49469440','V55136102','V5344562'),
('V33934992','V091846139327','Emard,Stiedemann and Lemke','integer aliquet massa id lobortis convallis tortor','Tutor','V13336593','V99392868','V25050145'),
('V34646106','V214208437166','Spencer Group','massa tempor convallis nulla neque','Tio','V32952482','V82808667','V30196324'),
('V33012705','V267235192922','Gulgowski-Bosco','eget tincidunt','Tia','V15801593','V34714307','V21412330'),
('V37787295','V713954918545','Cummings Group','in hac habitasse','Tia','V79112540','V70783876','V28798356'),
('V35130922','V274904166371','Walter Inc','dolor vel est donec odio','Abuelo','V53738892','V46631827','V20909176'),
('V35145513','V443801701880','Kassulke,Klocko and Wuckert','imperdiet nullam orci pede','Tio','V80812803','V56118810','V33641397');





-- datos de salud

insert  into datos_salud (cedula_estudiante ,lateralidad,tipo_sangre,medicacion,dieta_especial,padecimiento,impedimento_fisico,necesidad_educativa,condicion_vista,condicion_dental,institucion_medica,carnet_discapacidad) values
('V34912585', 'Ambidextro', 'A+', 'enim lorem ipsum dolor sit amet consectetuer adipiscing', 'convallis eget eleifend luctus ultricies eu nibh', 'amet eros suspendisse accumsan tortor quis turpis sed ante vivamus', 'eleifend pede libero quis orci nullam molestie', 'vel nulla eget eros elementum pellentesque quisque porta', 'Mala', 'Mala', 'non mi integer ac neque duis bibendum morbi non quam nec dui luctus rutrum nulla tellus', '2749022871'),
('V37749936', 'Zurdo', 'B+', 'mauris sit amet eros suspendisse accumsan tortor quis', 'semper est quam pharetra magna ac consequat metus sapien ut', 'quis justo maecenas rhoncus aliquam lacus morbi quis', 'interdum in ante vestibulum ante ipsum', 'nibh in quis justo maecenas rhoncus aliquam', 'Buena', 'Buena', 'tortor quis turpis sed ante vivamus tortor duis mattis egestas metus aenean fermentum donec ut mauris', '3700669992'),
('V33245132', 'Zurdo', 'O-', 'sit amet nunc viverra dapibus nulla suscipit ligula', 'odio odio elementum eu interdum eu tincidunt in leo', 'in felis donec semper sapien', 'diam cras pellentesque volutpat dui maecenas tristique est', 'ipsum integer a nibh in quis justo maecenas rhoncus aliquam', 'Buena', 'Mala', 'massa donec dapibus duis at velit eu est congue elementum in hac habitasse platea dictumst morbi vestibulum', '9166392866'),
('V34523902', 'Diestro', 'A+', 'nulla ac enim in tempor turpis nec euismod', 'congue elementum in hac habitasse platea dictumst', 'ac diam cras pellentesque volutpat dui maecenas', 'ipsum ac tellus semper interdum mauris ullamcorper purus sit', 'elementum eu interdum eu tincidunt in', 'Buena', 'Mala', 'ac enim in tempor turpis nec euismod scelerisque quam turpis adipiscing lorem vitae', '2123916482'),
('V39710197', 'Ambidextro', 'O-', 'vulputate justo in blandit ultrices enim lorem ipsum', 'pretium nisl ut volutpat sapien arcu sed augue aliquam', 'consectetuer adipiscing elit proin interdum mauris non ligula pellentesque ultrices', 'dapibus duis at velit eu', 'mattis nibh ligula nec sem duis', 'Mala', 'Buena', 'libero nullam sit amet turpis elementum ligula vehicula consequat morbi a ipsum integer a', '2612979124'),
('V34168455', 'Diestro', 'A+', 'viverra pede ac diam cras pellentesque', 'sodales sed tincidunt eu felis fusce posuere felis', 'massa volutpat convallis morbi odio odio', 'placerat praesent blandit nam nulla integer', 'vestibulum velit id pretium iaculis', 'Regular', 'Buena', 'ultrices posuere cubilia curae nulla dapibus dolor vel est donec odio justo', '0687071291'),
('V30676984', 'Ambidextro', 'A+', 'ultrices vel augue vestibulum ante ipsum primis in faucibus orci', 'donec ut dolor morbi vel lectus in quam', 'odio in hac habitasse platea dictumst maecenas ut massa', 'amet sapien dignissim vestibulum vestibulum ante ipsum primis in faucibus', 'ultrices posuere cubilia curae donec pharetra', 'Mala', 'Mala', 'dui luctus rutrum nulla tellus in sagittis dui vel nisl duis ac nibh fusce lacus purus', '8027624075'),
('V30617930', 'Zurdo', 'O-', 'suspendisse potenti nullam porttitor lacus', 'vulputate vitae nisl aenean lectus pellentesque eget nunc donec quis', 'in hac habitasse platea dictumst etiam faucibus cursus', 'felis sed lacus morbi sem', 'vel nulla eget eros elementum', 'Buena', 'Mala', 'nibh in hac habitasse platea dictumst aliquam augue quam sollicitudin vitae consectetuer eget rutrum at', '9943261409'),
('V32443424', 'Diestro', 'B-', 'pellentesque eget nunc donec quis orci eget', 'ut mauris eget massa tempor convallis', 'quisque arcu libero rutrum ac lobortis vel dapibus at diam', 'in sagittis dui vel nisl duis ac nibh', 'integer a nibh in quis justo maecenas rhoncus aliquam', 'Buena', 'Regular', 'at turpis a pede posuere nonummy integer non velit donec diam neque', '9769362360'),
('V30548966', 'Diestro', 'AB+', 'vitae quam suspendisse potenti nullam porttitor lacus at', 'consequat metus sapien ut nunc vestibulum ante', 'luctus et ultrices posuere cubilia curae duis', 'ut nulla sed accumsan felis', 'elit proin interdum mauris non', 'Regular', 'Buena', 'nulla facilisi cras non velit nec nisi vulputate nonummy maecenas tincidunt lacus at', '1354686259'),
('V34459825', 'Zurdo', 'NC', 'blandit lacinia erat vestibulum sed', 'sed sagittis nam congue risus', 'accumsan tellus nisi eu orci mauris lacinia sapien', 'in eleifend quam a odio in hac', 'at nulla suspendisse potenti cras', 'Mala', 'Regular', 'amet nunc viverra dapibus nulla suscipit ligula in lacus curabitur at ipsum ac tellus semper interdum mauris ullamcorper purus', '8375165060'),
('V36684060', 'Zurdo', 'O-', 'potenti cras in purus eu magna vulputate', 'aenean auctor gravida sem praesent', 'non sodales sed tincidunt eu felis fusce posuere felis', 'tortor risus dapibus augue vel accumsan tellus', 'donec ut mauris eget massa', 'Regular', 'Mala', 'interdum in ante vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae duis faucibus accumsan odio', '2345195106'),
('V32204799', 'Diestro', 'A-', 'elit proin interdum mauris non ligula pellentesque ultrices phasellus id', 'aenean fermentum donec ut mauris', 'suscipit nulla elit ac nulla sed vel enim sit amet', 'vestibulum ante ipsum primis in', 'maecenas ut massa quis augue', 'Buena', 'Mala', 'urna pretium nisl ut volutpat sapien arcu sed augue aliquam erat volutpat in', '4416704349'),
('V30522071', 'Zurdo', 'O-', 'integer tincidunt ante vel ipsum praesent', 'porttitor id consequat in consequat ut nulla sed accumsan', 'aliquam non mauris morbi non lectus', 'at nunc commodo placerat praesent blandit nam nulla integer pede', 'eros vestibulum ac est lacinia nisi venenatis', 'Buena', 'Mala', 'vel lectus in quam fringilla rhoncus mauris enim leo rhoncus sed vestibulum', '9665431348'),
('V34945013', 'Zurdo', 'O-', 'nibh in quis justo maecenas rhoncus aliquam', 'a ipsum integer a nibh in quis justo maecenas rhoncus', 'elit proin risus praesent lectus vestibulum quam sapien varius ut', 'lectus in est risus auctor sed tristique', 'dapibus nulla suscipit ligula in lacus curabitur at ipsum ac', 'Buena', 'Mala', 'lectus in quam fringilla rhoncus mauris enim leo rhoncus sed vestibulum sit amet cursus', '8613223949'),
('V30439025', 'Diestro', 'AB+', 'at lorem integer tincidunt ante vel ipsum praesent blandit lacinia', 'dui proin leo odio porttitor id consequat', 'tempus vivamus in felis eu sapien cursus', 'at dolor quis odio consequat', 'augue aliquam erat volutpat in', 'Mala', 'Mala', 'vestibulum vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae', '1155580969'),
('V31719804', 'Diestro', 'O+', 'diam neque vestibulum eget vulputate ut ultrices vel', 'sollicitudin mi sit amet lobortis sapien sapien non', 'vulputate elementum nullam varius nulla facilisi cras non', 'a nibh in quis justo maecenas rhoncus aliquam lacus', 'felis sed lacus morbi sem mauris laoreet', 'Regular', 'Regular', 'augue a suscipit nulla elit ac nulla sed vel enim sit amet nunc viverra dapibus nulla', '5852957682'),
('V34396526', 'Zurdo', 'O-', 'proin at turpis a pede posuere nonummy', 'interdum mauris ullamcorper purus sit amet nulla quisque arcu', 'interdum mauris non ligula pellentesque ultrices phasellus id sapien', 'montes nascetur ridiculus mus vivamus vestibulum sagittis sapien cum', 'id nisl venenatis lacinia aenean sit amet justo morbi ut', 'Mala', 'Mala', 'non velit donec diam neque vestibulum eget vulputate ut ultrices vel augue vestibulum ante ipsum primis in faucibus', '6009429013'),
('V33695137', 'Diestro', 'A+', 'id sapien in sapien iaculis congue', 'magna at nunc commodo placerat praesent', 'cursus vestibulum proin eu mi nulla', 'amet cursus id turpis integer aliquet', 'ipsum primis in faucibus orci luctus', 'Regular', 'Regular', 'in tempus sit amet sem fusce consequat nulla nisl nunc nisl duis bibendum felis sed interdum venenatis', '8184393691'),
('V36533048', 'Diestro', 'B+', 'in hac habitasse platea dictumst maecenas ut massa quis augue', 'tellus in sagittis dui vel nisl duis ac nibh fusce', 'consequat morbi a ipsum integer a', 'consequat varius integer ac leo pellentesque ultrices', 'dolor sit amet consectetuer adipiscing elit proin interdum mauris', 'Buena', 'Regular', 'at lorem integer tincidunt ante vel ipsum praesent blandit lacinia erat', '9396770063'),
('V39749877', 'Zurdo', 'B-', 'vulputate vitae nisl aenean lectus pellentesque eget nunc donec', 'cubilia curae donec pharetra magna vestibulum aliquet ultrices', 'congue eget semper rutrum nulla nunc purus phasellus in', 'convallis duis consequat dui nec', 'non sodales sed tincidunt eu', 'Mala', 'Buena', 'vel nulla eget eros elementum pellentesque quisque porta volutpat erat', '8092399098'),
('V36739965', 'Ambidextro', 'B+', 'donec ut dolor morbi vel lectus in', 'duis mattis egestas metus aenean', 'aliquet pulvinar sed nisl nunc rhoncus dui vel sem', 'augue vestibulum ante ipsum primis in faucibus', 'nunc vestibulum ante ipsum primis', 'Regular', 'Regular', 'quam suspendisse potenti nullam porttitor lacus at turpis donec posuere metus vitae ipsum aliquam non mauris morbi', '2734069734'),
('V31570581', 'Zurdo', 'B-', 'magna bibendum imperdiet nullam orci pede', 'volutpat quam pede lobortis ligula sit amet eleifend pede libero', 'pharetra magna vestibulum aliquet ultrices erat tortor', 'tempus semper est quam pharetra magna ac consequat metus sapien', 'sociis natoque penatibus et magnis dis parturient montes', 'Regular', 'Regular', 'in purus eu magna vulputate luctus cum sociis natoque penatibus', '4628822843'),
('V38391590', 'Diestro', 'NC', 'nec dui luctus rutrum nulla tellus in sagittis dui vel', 'vel lectus in quam fringilla rhoncus mauris', 'integer ac neque duis bibendum morbi non quam nec', 'vestibulum rutrum rutrum neque aenean auctor', 'nullam porttitor lacus at turpis donec posuere metus vitae ipsum', 'Regular', 'Mala', 'nunc viverra dapibus nulla suscipit ligula in lacus curabitur at ipsum', '9453781390'),
('V39675679', 'Zurdo', 'AB-', 'ipsum dolor sit amet consectetuer adipiscing elit proin interdum mauris', 'fermentum justo nec condimentum neque sapien placerat ante', 'cum sociis natoque penatibus et magnis dis parturient montes nascetur', 'sem praesent id massa id nisl', 'quam pede lobortis ligula sit amet', 'Buena', 'Mala', 'erat quisque erat eros viverra eget congue eget semper rutrum nulla nunc purus phasellus in felis donec semper sapien a', '3231416343'),
('V33815733', 'Zurdo', 'B+', 'nisl nunc nisl duis bibendum felis sed interdum venenatis turpis', 'vestibulum aliquet ultrices erat tortor sollicitudin mi sit', 'magnis dis parturient montes nascetur', 'tincidunt ante vel ipsum praesent', 'vel enim sit amet nunc viverra dapibus', 'Mala', 'Buena', 'sed vestibulum sit amet cursus id turpis integer aliquet massa id lobortis convallis tortor risus dapibus augue', '8946685396'),
('V31468288', 'Diestro', 'AB+', 'turpis elementum ligula vehicula consequat morbi', 'nulla sed vel enim sit amet nunc viverra', 'pharetra magna vestibulum aliquet ultrices erat tortor', 'nunc rhoncus dui vel sem sed sagittis nam', 'nisi eu orci mauris lacinia', 'Buena', 'Mala', 'amet justo morbi ut odio cras mi pede malesuada in imperdiet', '7425101356'),
('V33934992', 'Zurdo', 'B+', 'amet sapien dignissim vestibulum vestibulum', 'dui proin leo odio porttitor id consequat', 'leo maecenas pulvinar lobortis est phasellus sit amet', 'vel accumsan tellus nisi eu', 'proin risus praesent lectus vestibulum quam', 'Buena', 'Buena', 'nec molestie sed justo pellentesque viverra pede ac diam cras pellentesque volutpat', '1426194409'),
('V34646106', 'Ambidextro', 'AB-', 'ac nibh fusce lacus purus', 'nullam sit amet turpis elementum ligula vehicula consequat morbi', 'amet erat nulla tempus vivamus in felis', 'adipiscing elit proin risus praesent lectus vestibulum quam sapien varius', 'in lacus curabitur at ipsum', 'Mala', 'Regular', 'feugiat non pretium quis lectus suspendisse potenti in eleifend quam a odio in hac habitasse platea dictumst', '6967404579'),
('V33012705', 'Diestro', 'A-', 'eros vestibulum ac est lacinia nisi venenatis tristique fusce', 'consequat in consequat ut nulla sed accumsan felis ut at', 'faucibus orci luctus et ultrices posuere cubilia curae duis', 'at velit eu est congue', 'nisl duis bibendum felis sed interdum venenatis', 'Buena', 'Regular', 'blandit non interdum in ante vestibulum ante ipsum primis in faucibus orci luctus', '3994892286'),
('V37787295', 'Ambidextro', 'NC', 'et commodo vulputate justo in blandit ultrices', 'eu felis fusce posuere felis', 'ultrices posuere cubilia curae nulla dapibus dolor vel est donec', 'vestibulum eget vulputate ut ultrices vel augue', 'vivamus tortor duis mattis egestas metus aenean fermentum donec', 'Mala', 'Buena', 'dignissim vestibulum vestibulum ante ipsum primis in faucibus orci luctus', '9793117979'),
('V35130922', 'Ambidextro', 'O-', 'pede lobortis ligula sit amet eleifend pede libero quis', 'justo in hac habitasse platea dictumst etiam', 'mattis egestas metus aenean fermentum', 'aliquam augue quam sollicitudin vitae consectetuer eget', 'sapien non mi integer ac', 'Buena', 'Buena', 'at turpis donec posuere metus vitae ipsum aliquam non mauris morbi non lectus', '0134703152'),
('V35145513', 'Zurdo', 'A+', 'nam dui proin leo odio porttitor id consequat in', 'vulputate vitae nisl aenean lectus pellentesque eget nunc donec', 'aliquam erat volutpat in congue', 'non mattis pulvinar nulla pede ullamcorper augue a suscipit', 'tellus nisi eu orci mauris lacinia sapien quis libero', 'Regular', 'Buena', 'quam turpis adipiscing lorem vitae mattis nibh ligula nec sem duis aliquam convallis nunc proin at turpis a pede posuere', '8236774791');


insert  into vacunas_est (cedula_estudiante,espec_vacuna,estado_vacuna) values 

('V34912585','vph','Aplicada'),
('V34912585','tdap','No aplicada'),
('V34912585','menacwy','No aplicada'),
('V34912585','hep_a','No aplicada'),
('V34912585','hep_b','No aplicada'),
('V34912585','ipv','No aplicada'),
('V34912585','mmr','No aplicada'),
('V34912585','varicela','Aplicada'),
('V34912585','antiamarilica','No aplicada'),
('V34912585','antigripal','Aplicada'),

('V37749936','vph','Aplicada'),
('V37749936','tdap','Aplicada'),
('V37749936','menacwy','Aplicada'),
('V37749936','hep_a','Aplicada'),
('V37749936','hep_b','Aplicada'),
('V37749936','ipv','No aplicada'),
('V37749936','mmr','Aplicada'),
('V37749936','varicela','No aplicada'),
('V37749936','antiamarilica','Aplicada'),
('V37749936','antigripal','No aplicada'),

('V33245132','vph','Aplicada'),
('V33245132','tdap','Aplicada'),
('V33245132','menacwy','Aplicada'),
('V33245132','hep_a','No aplicada'),
('V33245132','hep_b','Aplicada'),
('V33245132','ipv','No aplicada'),
('V33245132','mmr','No aplicada'),
('V33245132','varicela','Aplicada'),
('V33245132','antiamarilica','No aplicada'),
('V33245132','antigripal','No aplicada'),

('V34523902','vph','No aplicada'),
('V34523902','tdap','No aplicada'),
('V34523902','menacwy','Aplicada'),
('V34523902','hep_a','No aplicada'),
('V34523902','hep_b','No aplicada'),
('V34523902','ipv','Aplicada'),
('V34523902','mmr','Aplicada'),
('V34523902','varicela','No aplicada'),
('V34523902','antiamarilica','No aplicada'),
('V34523902','antigripal','No aplicada'),

('V39710197','vph','No aplicada'),
('V39710197','tdap','No aplicada'),
('V39710197','menacwy','No aplicada'),
('V39710197','hep_a','Aplicada'),
('V39710197','hep_b','No aplicada'),
('V39710197','ipv','No aplicada'),
('V39710197','mmr','No aplicada'),
('V39710197','varicela','Aplicada'),
('V39710197','antiamarilica','Aplicada'),
('V39710197','antigripal','No aplicada'),

('V34168455','vph','No aplicada'),
('V34168455','tdap','Aplicada'),
('V34168455','menacwy','Aplicada'),
('V34168455','hep_a','No aplicada'),
('V34168455','hep_b','Aplicada'),
('V34168455','ipv','No aplicada'),
('V34168455','mmr','Aplicada'),
('V34168455','varicela','Aplicada'),
('V34168455','antiamarilica','No aplicada'),
('V34168455','antigripal','Aplicada'),

('V30676984','vph','No aplicada'),
('V30676984','tdap','No aplicada'),
('V30676984','menacwy','No aplicada'),
('V30676984','hep_a','No aplicada'),
('V30676984','hep_b','Aplicada'),
('V30676984','ipv','Aplicada'),
('V30676984','mmr','No aplicada'),
('V30676984','varicela','Aplicada'),
('V30676984','antiamarilica','No aplicada'),
('V30676984','antigripal','No aplicada'),

('V30617930','vph','Aplicada'),
('V30617930','tdap','Aplicada'),
('V30617930','menacwy','Aplicada'),
('V30617930','hep_a','Aplicada'),
('V30617930','hep_b','Aplicada'),
('V30617930','ipv','Aplicada'),
('V30617930','mmr','Aplicada'),
('V30617930','varicela','No aplicada'),
('V30617930','antiamarilica','Aplicada'),
('V30617930','antigripal','Aplicada'),

('V32443424','vph','No aplicada'),
('V32443424','tdap','Aplicada'),
('V32443424','menacwy','Aplicada'),
('V32443424','hep_a','Aplicada'),
('V32443424','hep_b','Aplicada'),
('V32443424','ipv','Aplicada'),
('V32443424','mmr','Aplicada'),
('V32443424','varicela','Aplicada'),
('V32443424','antiamarilica','Aplicada'),
('V32443424','antigripal','No aplicada'),

('V30548966','vph','Aplicada'),
('V30548966','tdap','Aplicada'),
('V30548966','menacwy','Aplicada'),
('V30548966','hep_a','No aplicada'),
('V30548966','hep_b','Aplicada'),
('V30548966','ipv','No aplicada'),
('V30548966','mmr','Aplicada'),
('V30548966','varicela','Aplicada'),
('V30548966','antiamarilica','No aplicada'),
('V30548966','antigripal','No aplicada'),

('V34459825','vph','No aplicada'),
('V34459825','tdap','Aplicada'),
('V34459825','menacwy','No aplicada'),
('V34459825','hep_a','No aplicada'),
('V34459825','hep_b','No aplicada'),
('V34459825','ipv','No aplicada'),
('V34459825','mmr','Aplicada'),
('V34459825','varicela','No aplicada'),
('V34459825','antiamarilica','Aplicada'),
('V34459825','antigripal','No aplicada'),

('V36684060','vph','Aplicada'),
('V36684060','tdap','Aplicada'),
('V36684060','menacwy','Aplicada'),
('V36684060','hep_a','Aplicada'),
('V36684060','hep_b','No aplicada'),
('V36684060','ipv','Aplicada'),
('V36684060','mmr','No aplicada'),
('V36684060','varicela','No aplicada'),
('V36684060','antiamarilica','No aplicada'),
('V36684060','antigripal','No aplicada'),

('V32204799','vph','Aplicada'),
('V32204799','tdap','No aplicada'),
('V32204799','menacwy','No aplicada'),
('V32204799','hep_a','No aplicada'),
('V32204799','hep_b','Aplicada'),
('V32204799','ipv','Aplicada'),
('V32204799','mmr','Aplicada'),
('V32204799','varicela','No aplicada'),
('V32204799','antiamarilica','No aplicada'),
('V32204799','antigripal','Aplicada'),

('V30522071','vph','Aplicada'),
('V30522071','tdap','No aplicada'),
('V30522071','menacwy','No aplicada'),
('V30522071','hep_a','Aplicada'),
('V30522071','hep_b','Aplicada'),
('V30522071','ipv','No aplicada'),
('V30522071','mmr','Aplicada'),
('V30522071','varicela','No aplicada'),
('V30522071','antiamarilica','No aplicada'),
('V30522071','antigripal','No aplicada'),

('V34945013','vph','Aplicada'),
('V34945013','tdap','Aplicada'),
('V34945013','menacwy','Aplicada'),
('V34945013','hep_a','No aplicada'),
('V34945013','hep_b','Aplicada'),
('V34945013','ipv','No aplicada'),
('V34945013','mmr','No aplicada'),
('V34945013','varicela','No aplicada'),
('V34945013','antiamarilica','No aplicada'),
('V34945013','antigripal','Aplicada'),

('V30439025','vph','No aplicada'),
('V30439025','tdap','No aplicada'),
('V30439025','menacwy','Aplicada'),
('V30439025','hep_a','No aplicada'),
('V30439025','hep_b','No aplicada'),
('V30439025','ipv','Aplicada'),
('V30439025','mmr','No aplicada'),
('V30439025','varicela','Aplicada'),
('V30439025','antiamarilica','Aplicada'),
('V30439025','antigripal','Aplicada'),

('V31719804','vph','No aplicada'),
('V31719804','tdap','No aplicada'),
('V31719804','menacwy','No aplicada'),
('V31719804','hep_a','No aplicada'),
('V31719804','hep_b','Aplicada'),
('V31719804','ipv','Aplicada'),
('V31719804','mmr','No aplicada'),
('V31719804','varicela','Aplicada'),
('V31719804','antiamarilica','No aplicada'),
('V31719804','antigripal','No aplicada'),

('V34396526','vph','No aplicada'),
('V34396526','tdap','Aplicada'),
('V34396526','menacwy','Aplicada'),
('V34396526','hep_a','Aplicada'),
('V34396526','hep_b','No aplicada'),
('V34396526','ipv','No aplicada'),
('V34396526','mmr','Aplicada'),
('V34396526','varicela','Aplicada'),
('V34396526','antiamarilica','Aplicada'),
('V34396526','antigripal','Aplicada'),

('V33695137','vph','No aplicada'),
('V33695137','tdap','No aplicada'),
('V33695137','menacwy','Aplicada'),
('V33695137','hep_a','No aplicada'),
('V33695137','hep_b','Aplicada'),
('V33695137','ipv','No aplicada'),
('V33695137','mmr','Aplicada'),
('V33695137','varicela','Aplicada'),
('V33695137','antiamarilica','No aplicada'),
('V33695137','antigripal','No aplicada'),

('V36533048','vph','Aplicada'),
('V36533048','tdap','Aplicada'),
('V36533048','menacwy','No aplicada'),
('V36533048','hep_a','No aplicada'),
('V36533048','hep_b','No aplicada'),
('V36533048','ipv','No aplicada'),
('V36533048','mmr','No aplicada'),
('V36533048','varicela','No aplicada'),
('V36533048','antiamarilica','No aplicada'),
('V36533048','antigripal','Aplicada'),

('V39749877','vph','No aplicada'),
('V39749877','tdap','No aplicada'),
('V39749877','menacwy','No aplicada'),
('V39749877','hep_a','Aplicada'),
('V39749877','hep_b','No aplicada'),
('V39749877','ipv','Aplicada'),
('V39749877','mmr','Aplicada'),
('V39749877','varicela','No aplicada'),
('V39749877','antiamarilica','No aplicada'),
('V39749877','antigripal','Aplicada'),

('V36739965','vph','No aplicada'),
('V36739965','tdap','Aplicada'),
('V36739965','menacwy','Aplicada'),
('V36739965','hep_a','Aplicada'),
('V36739965','hep_b','Aplicada'),
('V36739965','ipv','No aplicada'),
('V36739965','mmr','Aplicada'),
('V36739965','varicela','No aplicada'),
('V36739965','antiamarilica','Aplicada'),
('V36739965','antigripal','Aplicada'),

('V31570581','vph','Aplicada'),
('V31570581','tdap','Aplicada'),
('V31570581','menacwy','No aplicada'),
('V31570581','hep_a','No aplicada'),
('V31570581','hep_b','Aplicada'),
('V31570581','ipv','Aplicada'),
('V31570581','mmr','No aplicada'),
('V31570581','varicela','Aplicada'),
('V31570581','antiamarilica','Aplicada'),
('V31570581','antigripal','No aplicada'),

('V38391590','vph','Aplicada'),
('V38391590','tdap','Aplicada'),
('V38391590','menacwy','Aplicada'),
('V38391590','hep_a','No aplicada'),
('V38391590','hep_b','No aplicada'),
('V38391590','ipv','Aplicada'),
('V38391590','mmr','Aplicada'),
('V38391590','varicela','Aplicada'),
('V38391590','antiamarilica','Aplicada'),
('V38391590','antigripal','No aplicada'),

('V39675679','vph','Aplicada'),
('V39675679','tdap','Aplicada'),
('V39675679','menacwy','No aplicada'),
('V39675679','hep_a','No aplicada'),
('V39675679','hep_b','No aplicada'),
('V39675679','ipv','No aplicada'),
('V39675679','mmr','Aplicada'),
('V39675679','varicela','Aplicada'),
('V39675679','antiamarilica','No aplicada'),
('V39675679','antigripal','Aplicada'),

('V33815733','vph','Aplicada'),
('V33815733','tdap','No aplicada'),
('V33815733','menacwy','No aplicada'),
('V33815733','hep_a','Aplicada'),
('V33815733','hep_b','No aplicada'),
('V33815733','ipv','Aplicada'),
('V33815733','mmr','Aplicada'),
('V33815733','varicela','Aplicada'),
('V33815733','antiamarilica','No aplicada'),
('V33815733','antigripal','No aplicada'),

('V31468288','vph','No aplicada'),
('V31468288','tdap','No aplicada'),
('V31468288','menacwy','Aplicada'),
('V31468288','hep_a','No aplicada'),
('V31468288','hep_b','No aplicada'),
('V31468288','ipv','No aplicada'),
('V31468288','mmr','No aplicada'),
('V31468288','varicela','No aplicada'),
('V31468288','antiamarilica','Aplicada'),
('V31468288','antigripal','Aplicada'),

('V33934992','vph','Aplicada'),
('V33934992','tdap','Aplicada'),
('V33934992','menacwy','Aplicada'),
('V33934992','hep_a','No aplicada'),
('V33934992','hep_b','No aplicada'),
('V33934992','ipv','Aplicada'),
('V33934992','mmr','No aplicada'),
('V33934992','varicela','No aplicada'),
('V33934992','antiamarilica','No aplicada'),
('V33934992','antigripal','No aplicada'),

('V34646106','vph','Aplicada'),
('V34646106','tdap','Aplicada'),
('V34646106','menacwy','No aplicada'),
('V34646106','hep_a','Aplicada'),
('V34646106','hep_b','Aplicada'),
('V34646106','ipv','No aplicada'),
('V34646106','mmr','No aplicada'),
('V34646106','varicela','Aplicada'),
('V34646106','antiamarilica','Aplicada'),
('V34646106','antigripal','Aplicada'),

('V33012705','vph','Aplicada'),
('V33012705','tdap','Aplicada'),
('V33012705','menacwy','No aplicada'),
('V33012705','hep_a','Aplicada'),
('V33012705','hep_b','No aplicada'),
('V33012705','ipv','Aplicada'),
('V33012705','mmr','Aplicada'),
('V33012705','varicela','No aplicada'),
('V33012705','antiamarilica','No aplicada'),
('V33012705','antigripal','No aplicada'),

('V37787295','vph','No aplicada'),
('V37787295','tdap','Aplicada'),
('V37787295','menacwy','No aplicada'),
('V37787295','hep_a','Aplicada'),
('V37787295','hep_b','No aplicada'),
('V37787295','ipv','Aplicada'),
('V37787295','mmr','Aplicada'),
('V37787295','varicela','Aplicada'),
('V37787295','antiamarilica','No aplicada'),
('V37787295','antigripal','Aplicada'),

('V35130922','vph','No aplicada'),
('V35130922','tdap','Aplicada'),
('V35130922','menacwy','Aplicada'),
('V35130922','hep_a','Aplicada'),
('V35130922','hep_b','No aplicada'),
('V35130922','ipv','Aplicada'),
('V35130922','mmr','Aplicada'),
('V35130922','varicela','Aplicada'),
('V35130922','antiamarilica','Aplicada'),
('V35130922','antigripal','Aplicada'),

('V35145513','vph','Aplicada'),
('V35145513','tdap','No aplicada'),
('V35145513','menacwy','Aplicada'),
('V35145513','hep_a','Aplicada'),
('V35145513','hep_b','Aplicada'),
('V35145513','ipv','No aplicada'),
('V35145513','mmr','Aplicada'),
('V35145513','varicela','Aplicada'),
('V35145513','antiamarilica','No aplicada'),
('V35145513','antigripal','Aplicada');



insert  into vac_covid19_est (cedula_estudiante,vac_aplicada ,dosis,lote) values 
('V34912585','CanSinoBIO',2,'W4611791'),
('V37749936','Janssen',2,'M9987150'),
('V33245132','Novavax',1,'P1510795'),
('V34523902','Pfizer/BioNTech',4,'E4526001'),
('V39710197','AztraZeneca',5,'A1940225'),
('V34168455','Janssen',1,'K7137979'),
('V30676984','Pfizer/BioNTech',2,'S2303184'),
('V30617930','Sinovac',5,'Z0817181'),
('V32443424','Sinopharm',4,'C2256160'),
('V30548966','Novavax',2,'N3277983'),
('V34459825','Novavax',2,'J8320436'),
('V36684060','Sinovac',2,'T7021791'),
('V32204799','Valneva',1,'P5763349'),
('V30522071','Janssen',4,'W2622758'),
('V34945013','Novavax',2,'N4407932'),
('V30439025','Moderna',3,'F0251580'),
('V31719804','CanSinoBIO',2,'M3402445'),
('V34396526','Janssen',4,'F4956592'),
('V33695137','CanSinoBIO',3,'X0136577'),
('V36533048','Bharat',4,'R2996086'),
('V39749877','Valneva',5,'C9114879'),
('V36739965','Bharat',4,'U1526607'),
('V31570581','Sinopharm',4,'T1920567'),
('V38391590','CanSinoBIO',2,'O8498681'),
('V39675679','Janssen',3,'K7742751'),
('V33815733','CanSinoBIO',2,'Y0496943'),
('V31468288','Pfizer/BioNTech',4,'Z4200421'),
('V33934992','Pfizer/BioNTech',2,'U5816380'),
('V34646106','Sinovac',5,'S5240528'),
('V33012705','AztraZeneca',1,'A3067886'),
('V37787295','Novavax',2,'B5522532'),
('V35130922','Sinovac',2,'B2631049'),
('V35145513','AztraZeneca',4,'A6594931');




insert  into tallas_est (cedula_estudiante,camisa,pantalon,calzado) values 
('V34912585','3XL','XS',44),
('V37749936','L','2XL',40),
('V33245132','3XL','S',34),
('V34523902','2XL','XL',39),
('V39710197','M','S',45),
('V34168455','L','S',36),
('V30676984','XS','2XL',34),
('V30617930','2XL','3XL',39),
('V32443424','3XL','M',37),
('V30548966','XS','M',42),
('V34459825','XS','3XL',42),
('V36684060','XL','M',39),
('V32204799','XL','2XL',40),
('V30522071','S','XS',44),
('V34945013','M','XL',36),
('V30439025','XL','2XL',37),
('V31719804','3XL','XL',38),
('V34396526','3XL','S',32),
('V33695137','L','XS',43),
('V36533048','XS','3XL',36),
('V39749877','XL','XL',37),
('V36739965','2XL','XL',38),
('V31570581','M','XS',34),
('V38391590','M','S',43),
('V39675679','2XL','M',45),
('V33815733','S','S',43),
('V31468288','M','S',38),
('V33934992','L','2XL',33),
('V34646106','XS','M',37),
('V33012705','L','M',36),
('V37787295','L','S',44),
('V35130922','XL','XS',34),
('V35145513','3XL','2XL',33);


insert  into antropometria_est (cedula_estudiante,estatura,peso,indice_m_c,circ_braquial) values 
('V34912585',173,24,20,20),
('V37749936',182,36,22,14),
('V33245132',63,45,23,15),
('V34523902',144,73,23,16),
('V39710197',166,84,21,20),
('V34168455',129,69,20,24),
('V30676984',114,73,22,13),
('V30617930',84,55,22,15),
('V32443424',137,41,22,14),
('V30548966',147,99,23,13),
('V34459825',151,84,19,22),
('V36684060',137,44,23,25),
('V32204799',141,87,19,16),
('V30522071',146,86,22,14),
('V34945013',122,24,21,22),
('V30439025',116,23,21,14),
('V31719804',101,31,22,12),
('V34396526',183,79,22,12),
('V33695137',114,81,19,17),
('V36533048',126,23,20,15),
('V39749877',93,34,22,21),
('V36739965',160,49,22,13),
('V31570581',107,52,20,13),
('V38391590',139,28,20,19),
('V39675679',139,60,20,18),
('V33815733',84,41,20,15),
('V31468288',191,81,20,17),
('V33934992',171,74,21,19),
('V34646106',140,44,21,21),
('V33012705',116,38,19,24),
('V37787295',80,74,22,19),
('V35130922',127,69,22,17),
('V35145513',149,61,19,23);


insert  into observaciones_est (cedula_estudiante,social,fisico,personal,familiar,academico,otra) values 
('V34912585','quis orci','nunc nisl duis bibendum felis sed interdum venenatis turpis enim','sit amet eleifend pede libero quis orci nullam','','ac neque duis bibendum morbi non quam nec dui','vitae ipsum aliquam non mauris morbi non'),
('V37749936','amet nunc viverra dapibus nulla suscipit ligula','vestibulum sed magna at nunc commodo placerat praesent','','ut ultrices vel augue vestibulum ante ipsum primis in faucibus','ipsum praesent blandit lacinia erat vestibulum sed magna','erat vestibulum sed magna at nunc commodo placerat praesent blandit'),
('V33245132','enim sit amet nunc viverra dapibus','tellus nisi eu orci mauris lacinia sapien quis','feugiat et eros vestibulum ac est lacinia nisi venenatis tristique','leo pellentesque ultrices mattis odio donec vitae','pede malesuada in imperdiet et','tristique in tempus sit amet sem fusce consequat'),
('V34523902','eu massa donec dapibus duis at velit','integer ac neque duis bibendum morbi non quam','sit','sit','eu massa donec dapibus duis at velit','donec posuere'),
('V39710197','sapien non mi','','maecenas tristique est','id ornare imperdiet sapien urna pretium nisl','libero non mattis pulvinar nulla pede ullamcorper','sem sed sagittis nam congue risus semper'),
('V34168455','eros','non pretium','sed ante vivamus tortor duis mattis','erat quisque erat','turpis elementum ligula','in est risus auctor sed tristique in'),
('V30676984','leo rhoncus sed vestibulum sit','massa donec dapibus duis','non mi integer','mus etiam vel','nibh in lectus pellentesque at nulla suspendisse potenti cras in','dapibus augue vel accumsan tellus nisi'),
('V30617930','vitae mattis nibh ligula nec sem duis aliquam convallis nunc','nulla neque','amet cursus id turpis integer','pharetra magna ac consequat metus sapien ut nunc vestibulum ante','tortor id nulla','nam ultrices libero non mattis pulvinar nulla'),
('V32443424','faucibus cursus urna ut tellus nulla ut erat id mauris','id mauris vulputate elementum','vulputate justo in blandit ultrices enim','justo in hac habitasse platea dictumst etiam faucibus cursus urna','','at ipsum ac tellus semper interdum mauris'),
('V30548966','vestibulum ante ipsum primis','ipsum dolor sit amet','maecenas ut massa quis augue luctus tincidunt nulla','','pellentesque','in tempus sit amet sem fusce'),
('V34459825','lacus purus aliquet at feugiat non pretium quis','convallis morbi','vel enim sit','at','molestie nibh in lectus pellentesque at','scelerisque'),
('V36684060','vel nisl duis','praesent blandit lacinia erat vestibulum sed magna at nunc','potenti nullam porttitor lacus','adipiscing elit proin risus praesent lectus vestibulum','maecenas rhoncus aliquam lacus morbi quis tortor id nulla','sed augue'),
('V32204799','amet cursus id turpis integer aliquet massa','amet sem fusce consequat','nec dui luctus rutrum nulla tellus in sagittis dui','mi in porttitor','pede venenatis non sodales sed',''),
('V30522071','lorem vitae mattis nibh','eros suspendisse accumsan tortor quis','','in hac habitasse platea dictumst etiam faucibus cursus urna ut','ipsum primis in faucibus orci luctus','ipsum praesent blandit lacinia erat vestibulum sed magna'),
('V34945013','','nulla suscipit ligula','nonummy maecenas tincidunt lacus at velit vivamus','euismod scelerisque quam','','at velit eu est congue elementum'),
('V30439025','vel','velit donec diam neque vestibulum eget vulputate ut ultrices','nisl duis bibendum felis sed interdum','in est risus auctor sed tristique in tempus sit amet','sapien varius ut blandit non interdum in','adipiscing elit'),
('V31719804','lacinia aenean sit amet justo morbi','amet consectetuer','','','suscipit nulla elit ac','lacinia sapien quis libero nullam sit amet turpis elementum ligula'),
('V34396526','','ante vivamus tortor duis mattis','parturient montes nascetur','gravida sem praesent id massa id nisl','aliquam quis turpis eget',''),
('V33695137','vel sem sed sagittis nam congue risus','erat tortor sollicitudin mi sit','at','et ultrices posuere cubilia curae nulla dapibus dolor vel','orci luctus et ultrices posuere','volutpat quam pede lobortis ligula'),
('V36533048','at ipsum ac tellus semper interdum','morbi non quam nec dui luctus rutrum','fermentum donec ut','parturient montes nascetur ridiculus mus etiam vel augue vestibulum','','quam sapien varius ut blandit non interdum'),
('V39749877','turpis integer aliquet massa id lobortis convallis','amet erat nulla tempus vivamus','facilisi cras non velit','convallis tortor risus dapibus augue vel accumsan','maecenas','volutpat'),
('V36739965','in','etiam pretium iaculis justo in hac habitasse platea dictumst','elementum pellentesque quisque porta volutpat erat quisque erat','gravida sem praesent id massa id nisl venenatis lacinia','','justo'),
('V31570581','vel sem sed sagittis nam congue risus semper porta','mi pede malesuada in imperdiet et commodo vulputate justo in','nulla eget eros elementum pellentesque quisque porta volutpat erat quisque','hac habitasse platea','','sit'),
('V38391590','viverra diam vitae quam','turpis sed ante vivamus tortor duis mattis egestas metus aenean','nulla elit ac nulla sed vel','','gravida nisi at nibh','ac diam cras pellentesque volutpat dui maecenas'),
('V39675679','suspendisse','ligula sit amet eleifend pede libero quis orci nullam molestie','elementum nullam varius nulla facilisi cras non velit nec','diam neque vestibulum eget vulputate ut ultrices','pede lobortis ligula sit amet eleifend pede libero quis orci',''),
('V33815733','lectus aliquam sit amet diam','tristique','suspendisse potenti in','porttitor','mauris sit amet eros suspendisse accumsan tortor quis','posuere metus vitae ipsum aliquam non mauris morbi non'),
('V31468288','nullam porttitor lacus at','nascetur ridiculus mus vivamus vestibulum sagittis sapien cum sociis natoque','','augue a suscipit nulla elit','est donec','non ligula pellentesque ultrices phasellus id sapien in sapien iaculis'),
('V33934992','','nulla nisl nunc nisl duis bibendum felis sed','sed vestibulum sit amet cursus','molestie sed justo pellentesque viverra pede ac diam cras pellentesque','','blandit non interdum in ante vestibulum'),
('V34646106','iaculis congue vivamus metus arcu','ligula suspendisse ornare consequat lectus in est risus auctor','convallis nulla neque libero convallis eget eleifend','faucibus orci luctus et ultrices','lacus morbi sem mauris laoreet ut rhoncus aliquet pulvinar sed','in sapien iaculis congue vivamus metus arcu adipiscing molestie hendrerit'),
('V33012705','rutrum','libero ut massa volutpat convallis','at velit eu est congue elementum in hac habitasse platea','turpis integer aliquet massa id lobortis convallis tortor','semper porta volutpat quam pede','sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus'),
('V37787295','nunc vestibulum ante ipsum primis in faucibus','diam','aliquet at feugiat non pretium quis','curabitur gravida nisi at nibh in','vestibulum ante ipsum primis in faucibus orci luctus','ante vivamus tortor duis mattis egestas metus aenean fermentum'),
('V35130922','vel lectus','et ultrices posuere','ac','pellentesque ultrices','accumsan felis ut at dolor','vel'),
('V35145513','dis parturient montes nascetur ridiculus mus etiam vel augue vestibulum','ac enim','magna ac consequat metus sapien','etiam faucibus cursus urna ut tellus','blandit nam nulla','felis eu sapien cursus vestibulum proin eu mi nulla ac');




insert  into datos_academicos (cedula_estudiante,a_repetido,materias_repetidas,materias_pendientes) values 
('V34912585','Tercer año','','proin'),
('V37749936','Primer año','',''),
('V33245132','Cuarto año','eget massa tempor','ante ipsum primis in faucibus'),
('V34523902','','','nunc purus phasellus in'),
('V39710197','','','vel sem sed'),
('V34168455','Primer año','id sapien',''),
('V30676984','Tercer año','suscipit ligula','augue vestibulum ante ipsum'),
('V30617930','','turpis integer aliquet massa id',''),
('V32443424','','','maecenas tincidunt'),
('V30548966','Cuarto año','vulputate elementum nullam','vivamus vestibulum sagittis'),
('V34459825','','porta volutpat quam pede lobortis','nunc viverra dapibus nulla suscipit'),
('V36684060','Primer año','odio porttitor','curae'),
('V32204799','Segundo año','vestibulum','sem fusce consequat'),
('V30522071','Segundo año','bibendum felis sed interdum venenatis','sapien a libero'),
('V34945013','','mus vivamus vestibulum sagittis sapien',''),
('V30439025','','','ipsum ac tellus semper interdum'),
('V31719804','Segundo año','sem fusce consequat','curae'),
('V34396526','Tercer año','vivamus in felis eu','consequat'),
('V33695137','Tercer año','vel','tristique in tempus'),
('V36533048','Cuarto año','','dolor sit'),
('V39749877','Quinto año','','non velit nec nisi vulputate'),
('V36739965','Cuarto año','pellentesque',''),
('V31570581','','tincidunt in leo','odio consequat varius integer ac'),
('V38391590','Cuarto año','posuere','nibh ligula nec sem'),
('V39675679','Quinto año','tincidunt ante vel ipsum praesent','est risus auctor sed'),
('V33815733','','consequat morbi','tincidunt lacus'),
('V31468288','Tercer año','justo morbi ut odio cras','dui luctus rutrum'),
('V33934992','Tercer año','amet justo',''),
('V34646106','Tercer año','proin','commodo vulputate justo in'),
('V33012705','Segundo año','dui vel','parturient montes nascetur ridiculus'),
('V37787295','Cuarto año','diam','cras pellentesque volutpat dui maecenas'),
('V35130922','Segundo año','dapibus dolor vel','sapien sapien non mi'),
('V35145513','Segundo año','risus praesent lectus vestibulum quam','tortor id nulla');





insert  into datos_sociales (cedula_estudiante,tiene_canaima,condicion_canaima,acceso_internet) values 
('V34912585','No','','No'),
('V37749936','No','','No'),
('V33245132','No','','Si'),
('V34523902','Si','Mala','No'),
('V39710197','Si','Buena','No'),
('V34168455','No','','Si'),
('V30676984','No','','Si'),
('V30617930','No','','No'),
('V32443424','Si','Buena','No'),
('V30548966','Si','Regular','Si'),
('V34459825','Si','Regular','No'),
('V36684060','No','','Si'),
('V32204799','No','','Si'),
('V30522071','Si','Mala','Si'),
('V34945013','No','','No'),
('V30439025','No','','No'),
('V31719804','No','','Si'),
('V34396526','Si','Mala','No'),
('V33695137','No','','No'),
('V36533048','Si','Regular','Si'),
('V39749877','Si','Mala','Si'),
('V36739965','No','','Si'),
('V31570581','Si','Regular','Si'),
('V38391590','No','','Si'),
('V39675679','No','','Si'),
('V33815733','Si','Regular','Si'),
('V31468288','Si','Regular','No'),
('V33934992','No','','No'),
('V34646106','No','','No'),
('V33012705','Si','Buena','Si'),
('V37787295','Si','Buena','No'),
('V35130922','Si','Buena','Si'),
('V35145513','No','','No');


insert  into grado_a_cursar_est (cedula_estudiante,grado_a_cursar,seccion,id_per_academico) values 
('V34912585', 'Quinto año', 'C', '20222023'),
('V37749936', 'Segundo año', 'C', '20222023'),
('V33245132', 'Primer año', 'A', '20222023'),
('V34523902', 'Segundo año', 'D', '20222023'),
('V39710197', 'Segundo año', 'B', '20222023'),
('V34168455', 'Segundo año', 'A', '20222023'),
('V30676984', 'Tercer año', 'A', '20222023'),
('V30617930', 'Quinto año', 'B', '20222023'),
('V32443424', 'Segundo año', 'A', '20222023'),
('V30548966', 'Tercer año', 'B', '20222023'),
('V34459825', 'Quinto año', 'C', '20222023'),
('V36684060', 'Tercer año', 'C', '20222023'),
('V32204799', 'Primer año', 'D', '20222023'),
('V30522071', 'Primer año', 'B', '20222023'),
('V34945013', 'Cuarto año', 'D', '20222023'),
('V30439025', 'Segundo año', 'A', '20222023'),
('V31719804', 'Segundo año', 'C', '20222023'),
('V34396526', 'Cuarto año', 'B', '20222023'),
('V33695137', 'Quinto año', 'D', '20222023'),
('V36533048', 'Tercer año', 'C', '20222023'),
('V39749877', 'Cuarto año', 'A', '20222023'),
('V36739965', 'Cuarto año', 'C', '20222023'),
('V31570581', 'Primer año', 'A', '20222023'),
('V38391590', 'Tercer año', 'B', '20222023'),
('V39675679', 'Quinto año', 'C', '20222023'),
('V33815733', 'Segundo año', 'C', '20222023'),
('V31468288', 'Primer año', 'B', '20222023'),
('V33934992', 'Cuarto año', 'B', '20222023'),
('V34646106', 'Segundo año', 'B', '20222023'),
('V33012705', 'Quinto año', 'B', '20222023'),
('V37787295', 'Segundo año', 'C', '20222023'),
('V35130922', 'Primer año', 'A', '20222023'),
('V35145513', 'Quinto año', 'B', '20222023');



insert  into condiciones_est (cedula_estudiante, visual, motora, auditiva, escritura, lectura, lenguaje, embarazo) values 
('V34912585', 'VISUAL', '', '', '', 'LECTURA', '', ''),
('V37749936', '', 'MOTORA', '', 'ESCRITURA', '', 'LENGUAJE', ''),
('V33245132', '', '', 'AUDITIVA', '', '', 'LENGUAJE', ''),
('V34523902', 'VISUAL', 'MOTORA', '', '', 'LECTURA', '', 'EMBARAZO'),
('V39710197', 'VISUAL', 'MOTORA', 'AUDITIVA', 'ESCRITURA', '', '', 'EMBARAZO'),
('V34168455', 'VISUAL', 'MOTORA', 'AUDITIVA', '', 'LECTURA', 'LENGUAJE', ''),
('V30676984', '', 'MOTORA', '', 'ESCRITURA', 'LECTURA', '', ''),
('V30617930', 'VISUAL', 'MOTORA', '', 'ESCRITURA', '', '', 'EMBARAZO'),
('V32443424', 'VISUAL', '', 'AUDITIVA', 'ESCRITURA', 'LECTURA', '', ''),
('V30548966', '', 'MOTORA', 'AUDITIVA', 'ESCRITURA', '', 'LENGUAJE', 'EMBARAZO'),
('V34459825', '', 'MOTORA', 'AUDITIVA', 'ESCRITURA', '', 'LENGUAJE', ''),
('V36684060', '', 'MOTORA', 'AUDITIVA', '', '', '', 'EMBARAZO'),
('V32204799', '', '', '', '', '', '', ''),
('V30522071', 'VISUAL', '', '', '', 'LECTURA', '', ''),
('V34945013', 'VISUAL', '', 'AUDITIVA', '', 'LECTURA', '', 'EMBARAZO'),
('V30439025', 'VISUAL', '', 'AUDITIVA', '', 'LECTURA', 'LENGUAJE', ''),
('V31719804', '', 'MOTORA', 'AUDITIVA', 'ESCRITURA', '', '', ''),
('V34396526', 'VISUAL', 'MOTORA', 'AUDITIVA', 'ESCRITURA', '', 'LENGUAJE', 'EMBARAZO'),
('V33695137', 'VISUAL', '', '', 'ESCRITURA', 'LECTURA', 'LENGUAJE', ''),
('V36533048', '', '', 'AUDITIVA', '', 'LECTURA', '', ''),
('V39749877', '', '', 'AUDITIVA', '', '', 'LENGUAJE', 'EMBARAZO'),
('V36739965', 'VISUAL', 'MOTORA', '', '', 'LECTURA', 'LENGUAJE', ''),
('V31570581', 'VISUAL', 'MOTORA', 'AUDITIVA', '', '', '', 'EMBARAZO'),
('V38391590', 'VISUAL', 'MOTORA', 'AUDITIVA', '', 'LECTURA', 'LENGUAJE', 'EMBARAZO'),
('V39675679', '', 'MOTORA', '', 'ESCRITURA', '', '', ''),
('V33815733', '', '', 'AUDITIVA', '', '', 'LENGUAJE', 'EMBARAZO'),
('V31468288', 'VISUAL', 'MOTORA', '', '', 'LECTURA', 'LENGUAJE', ''),
('V33934992', 'VISUAL', '', '', '', 'LECTURA', 'LENGUAJE', 'EMBARAZO'),
('V34646106', '', 'MOTORA', '', '', 'LECTURA', 'LENGUAJE', 'EMBARAZO'),
('V33012705', '', '', '', '', '', 'LENGUAJE', ''),
('V37787295', 'VISUAL', '', 'AUDITIVA', '', 'LECTURA', '', 'EMBARAZO'),
('V35130922', '', '', '', 'ESCRITURA', '', '', ''),
('V35145513', 'VISUAL', 'MOTORA', 'AUDITIVA', '', 'LECTURA', 'LENGUAJE', 'EMBARAZO');

INSERT  INTO `inscripciones`(`id_inscripcion`, `fecha`, `hora`, `cedula_usuario`, `cedula_estudiante`) VALUES 
(null,'2023-02-17','19:47:00','V27919566','V34912585'),
(null,'2023-02-17','19:47:00','V27919566','V37749936'),
(null,'2023-02-17','19:47:00','V27919566','V33245132'),
(null,'2023-02-17','19:47:00','V27919566','V34523902'),
(null,'2023-02-17','19:47:00','V27919566','V39710197'),
(null,'2023-02-17','19:47:00','V27919566','V34168455'),
(null,'2023-02-17','19:47:00','V27919566','V30676984'),
(null,'2023-02-17','19:47:00','V27919566','V30617930'),
(null,'2023-02-17','19:47:00','V27919566','V32443424'),
(null,'2023-02-17','19:47:00','V27919566','V30548966'),
(null,'2023-02-17','19:47:00','V27919566','V34459825'),
(null,'2023-02-17','19:47:00','V27919566','V36684060'),
(null,'2023-02-17','19:47:00','V27919566','V32204799'),
(null,'2023-02-17','19:47:00','V27919566','V30522071'),
(null,'2023-02-17','19:47:00','V27919566','V34945013'),
(null,'2023-02-17','19:47:00','V27919566','V30439025'),
(null,'2023-02-17','19:47:00','V27919566','V31719804'),
(null,'2023-02-17','19:47:00','V27919566','V34396526'),
(null,'2023-02-17','19:47:00','V27919566','V33695137'),
(null,'2023-02-17','19:47:00','V27919566','V36533048'),
(null,'2023-02-17','19:47:00','V27919566','V39749877'),
(null,'2023-02-17','19:47:00','V27919566','V36739965'),
(null,'2023-02-17','19:47:00','V27919566','V31570581'),
(null,'2023-02-17','19:47:00','V27919566','V38391590'),
(null,'2023-02-17','19:47:00','V27919566','V39675679'),
(null,'2023-02-17','19:47:00','V27919566','V33815733'),
(null,'2023-02-17','19:47:00','V27919566','V31468288'),
(null,'2023-02-17','19:47:00','V27919566','V33934992'),
(null,'2023-02-17','19:47:00','V27919566','V34646106'),
(null,'2023-02-17','19:47:00','V27919566','V33012705'),
(null,'2023-02-17','19:47:00','V27919566','V37787295'),
(null,'2023-02-17','19:47:00','V27919566','V35130922'),
(null,'2023-02-17','19:47:00','V27919566','V35145513');



COMMIT;

