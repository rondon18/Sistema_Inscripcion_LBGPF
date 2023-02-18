-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema base_proyecto_nueva
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `base_proyecto_nueva` ;

-- -----------------------------------------------------
-- Schema base_proyecto_nueva
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `base_proyecto_nueva` DEFAULT CHARACTER SET utf8 ;
USE `base_proyecto_nueva` ;

-- -----------------------------------------------------
-- Table `base_proyecto_nueva`.`personas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `base_proyecto_nueva`.`personas` ;

CREATE TABLE IF NOT EXISTS `base_proyecto_nueva`.`personas` (
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

CREATE UNIQUE INDEX `cedula_UNIQUE` ON `base_proyecto_nueva`.`personas` (`cedula` ASC);


-- -----------------------------------------------------
-- Table `base_proyecto_nueva`.`direcciones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `base_proyecto_nueva`.`direcciones` ;

CREATE TABLE IF NOT EXISTS `base_proyecto_nueva`.`direcciones` (
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
    REFERENCES `base_proyecto_nueva`.`personas` (`cedula`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `base_proyecto_nueva`.`carnet_patria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `base_proyecto_nueva`.`carnet_patria` ;

CREATE TABLE IF NOT EXISTS `base_proyecto_nueva`.`carnet_patria` (
  `cedula_persona` VARCHAR(45) NOT NULL,
  `codigo_carnet` VARCHAR(45) NOT NULL,
  `serial_carnet` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cedula_persona`),
  CONSTRAINT `fk_carnet_patria_personas1`
    FOREIGN KEY (`cedula_persona`)
    REFERENCES `base_proyecto_nueva`.`personas` (`cedula`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `cedula_persona_UNIQUE` ON `base_proyecto_nueva`.`carnet_patria` (`cedula_persona` ASC);


-- -----------------------------------------------------
-- Table `base_proyecto_nueva`.`telefonos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `base_proyecto_nueva`.`telefonos` ;

CREATE TABLE IF NOT EXISTS `base_proyecto_nueva`.`telefonos` (
  `cedula_persona` VARCHAR(45) NOT NULL,
  `relacion` VARCHAR(45) NOT NULL,
  `prefijo` VARCHAR(45) NOT NULL,
  `numero` VARCHAR(45) NOT NULL,
  CONSTRAINT `fk_telefonos_personas1`
    FOREIGN KEY (`cedula_persona`)
    REFERENCES `base_proyecto_nueva`.`personas` (`cedula`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `base_proyecto_nueva`.`usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `base_proyecto_nueva`.`usuarios` ;

CREATE TABLE IF NOT EXISTS `base_proyecto_nueva`.`usuarios` (
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
    REFERENCES `base_proyecto_nueva`.`personas` (`cedula`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE INDEX `fk_usuarios_personas1_idx` ON `base_proyecto_nueva`.`usuarios` (`cedula_persona` ASC);

CREATE UNIQUE INDEX `cedula_persona_UNIQUE` ON `base_proyecto_nueva`.`usuarios` (`cedula_persona` ASC);


-- -----------------------------------------------------
-- Table `base_proyecto_nueva`.`padres`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `base_proyecto_nueva`.`padres` ;

CREATE TABLE IF NOT EXISTS `base_proyecto_nueva`.`padres` (
  `cedula_persona` VARCHAR(45) NOT NULL,
  `pais_residencia` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cedula_persona`),
  CONSTRAINT `fk_padres_personas1`
    FOREIGN KEY (`cedula_persona`)
    REFERENCES `base_proyecto_nueva`.`personas` (`cedula`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `cedula_persona_UNIQUE` ON `base_proyecto_nueva`.`padres` (`cedula_persona` ASC);


-- -----------------------------------------------------
-- Table `base_proyecto_nueva`.`representantes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `base_proyecto_nueva`.`representantes` ;

CREATE TABLE IF NOT EXISTS `base_proyecto_nueva`.`representantes` (
  `cedula_persona` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cedula_persona`),
  CONSTRAINT `fk_representantes_personas1`
    FOREIGN KEY (`cedula_persona`)
    REFERENCES `base_proyecto_nueva`.`personas` (`cedula`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `cedula_persona_UNIQUE` ON `base_proyecto_nueva`.`representantes` (`cedula_persona` ASC);


-- -----------------------------------------------------
-- Table `base_proyecto_nueva`.`datos_laborales`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `base_proyecto_nueva`.`datos_laborales` ;

CREATE TABLE IF NOT EXISTS `base_proyecto_nueva`.`datos_laborales` (
  `cedula_persona` VARCHAR(45) NOT NULL,
  `empleo` VARCHAR(45) NOT NULL,
  `lugar_trabajo` VARCHAR(45) NOT NULL,
  `remuneracion` VARCHAR(45) NOT NULL,
  `tipo_remuneracion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cedula_persona`),
  CONSTRAINT `fk_datos_laborales_personas1`
    FOREIGN KEY (`cedula_persona`)
    REFERENCES `base_proyecto_nueva`.`personas` (`cedula`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `cedula_persona_UNIQUE` ON `base_proyecto_nueva`.`datos_laborales` (`cedula_persona` ASC);


-- -----------------------------------------------------
-- Table `base_proyecto_nueva`.`datos_vivienda`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `base_proyecto_nueva`.`datos_vivienda` ;

CREATE TABLE IF NOT EXISTS `base_proyecto_nueva`.`datos_vivienda` (
  `cedula_persona` VARCHAR(45) NOT NULL,
  `condicion` VARCHAR(45) NOT NULL,
  `tipo` VARCHAR(45) NOT NULL,
  `tenencia` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cedula_persona`),
  CONSTRAINT `fk_datos_vivienda_personas1`
    FOREIGN KEY (`cedula_persona`)
    REFERENCES `base_proyecto_nueva`.`personas` (`cedula`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `cedula_persona_UNIQUE` ON `base_proyecto_nueva`.`datos_vivienda` (`cedula_persona` ASC);


-- -----------------------------------------------------
-- Table `base_proyecto_nueva`.`datos_economicos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `base_proyecto_nueva`.`datos_economicos` ;

CREATE TABLE IF NOT EXISTS `base_proyecto_nueva`.`datos_economicos` (
  `cedula_representante` VARCHAR(45) NOT NULL,
  `banco` VARCHAR(240) NOT NULL,
  `tipo_cuenta` VARCHAR(45) NOT NULL,
  `nro_cuenta` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cedula_representante`),
  CONSTRAINT `fk_datos_economicos_representantes1`
    FOREIGN KEY (`cedula_representante`)
    REFERENCES `base_proyecto_nueva`.`representantes` (`cedula_persona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `cedula_representante_UNIQUE` ON `base_proyecto_nueva`.`datos_economicos` (`cedula_representante` ASC);


-- -----------------------------------------------------
-- Table `base_proyecto_nueva`.`contactos_aux`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `base_proyecto_nueva`.`contactos_aux` ;

CREATE TABLE IF NOT EXISTS `base_proyecto_nueva`.`contactos_aux` (
  `cedula_representante` VARCHAR(45) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `prefijo_telefono` VARCHAR(45) NOT NULL,
  `nro_telefono` VARCHAR(45) NOT NULL,
  `relacion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cedula_representante`),
  CONSTRAINT `fk_contactos_aux_representantes1`
    FOREIGN KEY (`cedula_representante`)
    REFERENCES `base_proyecto_nueva`.`representantes` (`cedula_persona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `cedula_representante_UNIQUE` ON `base_proyecto_nueva`.`contactos_aux` (`cedula_representante` ASC);


-- -----------------------------------------------------
-- Table `base_proyecto_nueva`.`estudiantes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `base_proyecto_nueva`.`estudiantes` ;

CREATE TABLE IF NOT EXISTS `base_proyecto_nueva`.`estudiantes` (
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
    REFERENCES `base_proyecto_nueva`.`padres` (`cedula_persona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_estudiantes_padres2`
    FOREIGN KEY (`cedula_madre`)
    REFERENCES `base_proyecto_nueva`.`padres` (`cedula_persona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_estudiantes_personas1`
    FOREIGN KEY (`cedula_persona`)
    REFERENCES `base_proyecto_nueva`.`personas` (`cedula`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_estudiantes_representantes1`
    FOREIGN KEY (`cedula_representante`)
    REFERENCES `base_proyecto_nueva`.`representantes` (`cedula_persona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE INDEX `fk_estudiantes_padres1_idx` ON `base_proyecto_nueva`.`estudiantes` (`cedula_padre` ASC);

CREATE INDEX `fk_estudiantes_padres2_idx` ON `base_proyecto_nueva`.`estudiantes` (`cedula_madre` ASC);

CREATE INDEX `fk_estudiantes_personas1_idx` ON `base_proyecto_nueva`.`estudiantes` (`cedula_persona` ASC);

CREATE INDEX `fk_estudiantes_representantes1_idx` ON `base_proyecto_nueva`.`estudiantes` (`cedula_representante` ASC);

CREATE UNIQUE INDEX `cedula_persona_UNIQUE` ON `base_proyecto_nueva`.`estudiantes` (`cedula_persona` ASC);


-- -----------------------------------------------------
-- Table `base_proyecto_nueva`.`observaciones_est`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `base_proyecto_nueva`.`observaciones_est` ;

CREATE TABLE IF NOT EXISTS `base_proyecto_nueva`.`observaciones_est` (
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
    REFERENCES `base_proyecto_nueva`.`estudiantes` (`cedula_persona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `cedula_estudiante_UNIQUE` ON `base_proyecto_nueva`.`observaciones_est` (`cedula_estudiante` ASC);


-- -----------------------------------------------------
-- Table `base_proyecto_nueva`.`datos_sociales`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `base_proyecto_nueva`.`datos_sociales` ;

CREATE TABLE IF NOT EXISTS `base_proyecto_nueva`.`datos_sociales` (
  `cedula_estudiante` VARCHAR(45) NOT NULL,
  `tiene_canaima` VARCHAR(45) NOT NULL,
  `condicion_canaima` VARCHAR(45) NOT NULL,
  `acceso_internet` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cedula_estudiante`),
  CONSTRAINT `fk_datos_sociales_estudiantes1`
    FOREIGN KEY (`cedula_estudiante`)
    REFERENCES `base_proyecto_nueva`.`estudiantes` (`cedula_persona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `cedula_estudiante_UNIQUE` ON `base_proyecto_nueva`.`datos_sociales` (`cedula_estudiante` ASC);


-- -----------------------------------------------------
-- Table `base_proyecto_nueva`.`datos_salud`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `base_proyecto_nueva`.`datos_salud` ;

CREATE TABLE IF NOT EXISTS `base_proyecto_nueva`.`datos_salud` (
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
    REFERENCES `base_proyecto_nueva`.`estudiantes` (`cedula_persona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `base_proyecto_nueva`.`tallas_est`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `base_proyecto_nueva`.`tallas_est` ;

CREATE TABLE IF NOT EXISTS `base_proyecto_nueva`.`tallas_est` (
  `cedula_estudiante` VARCHAR(45) NOT NULL,
  `camisa` VARCHAR(45) NOT NULL,
  `pantalon` VARCHAR(45) NOT NULL,
  `calzado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cedula_estudiante`),
  CONSTRAINT `fk_tallas_est_datos_salud1`
    FOREIGN KEY (`cedula_estudiante`)
    REFERENCES `base_proyecto_nueva`.`datos_salud` (`cedula_estudiante`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `cedula_estudiante_UNIQUE` ON `base_proyecto_nueva`.`tallas_est` (`cedula_estudiante` ASC);


-- -----------------------------------------------------
-- Table `base_proyecto_nueva`.`antropometria_est`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `base_proyecto_nueva`.`antropometria_est` ;

CREATE TABLE IF NOT EXISTS `base_proyecto_nueva`.`antropometria_est` (
  `cedula_estudiante` VARCHAR(45) NOT NULL,
  `estatura` INT NOT NULL,
  `peso` FLOAT NOT NULL,
  `indice_m_c` FLOAT NOT NULL,
  `circ_braquial` FLOAT NOT NULL,
  PRIMARY KEY (`cedula_estudiante`),
  CONSTRAINT `fk_antropometria_est_datos_salud1`
    FOREIGN KEY (`cedula_estudiante`)
    REFERENCES `base_proyecto_nueva`.`datos_salud` (`cedula_estudiante`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `cedula_estudiante_UNIQUE` ON `base_proyecto_nueva`.`antropometria_est` (`cedula_estudiante` ASC);


-- -----------------------------------------------------
-- Table `base_proyecto_nueva`.`vac_covid19_est`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `base_proyecto_nueva`.`vac_covid19_est` ;

CREATE TABLE IF NOT EXISTS `base_proyecto_nueva`.`vac_covid19_est` (
  `cedula_estudiante` VARCHAR(45) NOT NULL,
  `vac_aplicada` TEXT NOT NULL,
  `dosis` INT NOT NULL,
  `lote` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cedula_estudiante`),
  CONSTRAINT `fk_vac_covid19_est_datos_salud1`
    FOREIGN KEY (`cedula_estudiante`)
    REFERENCES `base_proyecto_nueva`.`datos_salud` (`cedula_estudiante`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `cedula_estudiante_UNIQUE` ON `base_proyecto_nueva`.`vac_covid19_est` (`cedula_estudiante` ASC);


-- -----------------------------------------------------
-- Table `base_proyecto_nueva`.`condiciones_est`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `base_proyecto_nueva`.`condiciones_est` ;

CREATE TABLE IF NOT EXISTS `base_proyecto_nueva`.`condiciones_est` (
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
    REFERENCES `base_proyecto_nueva`.`datos_salud` (`cedula_estudiante`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `cedula_estudiante_UNIQUE` ON `base_proyecto_nueva`.`condiciones_est` (`cedula_estudiante` ASC);


-- -----------------------------------------------------
-- Table `base_proyecto_nueva`.`vacunas_est`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `base_proyecto_nueva`.`vacunas_est` ;

CREATE TABLE IF NOT EXISTS `base_proyecto_nueva`.`vacunas_est` (
  `cedula_estudiante` VARCHAR(45) NOT NULL,
  `espec_vacuna` VARCHAR(45) NOT NULL,
  `estado_vacuna` VARCHAR(45) NOT NULL,
  CONSTRAINT `fk_vacunas_est_datos_salud1`
    FOREIGN KEY (`cedula_estudiante`)
    REFERENCES `base_proyecto_nueva`.`datos_salud` (`cedula_estudiante`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `base_proyecto_nueva`.`per_academico`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `base_proyecto_nueva`.`per_academico` ;

CREATE TABLE IF NOT EXISTS `base_proyecto_nueva`.`per_academico` (
  `id_per_academico` VARCHAR(10) NOT NULL,
  `inicio` VARCHAR(45) NOT NULL,
  `fin` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_per_academico`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `base_proyecto_nueva`.`grado_a_cursar_est`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `base_proyecto_nueva`.`grado_a_cursar_est` ;

CREATE TABLE IF NOT EXISTS `base_proyecto_nueva`.`grado_a_cursar_est` (
  `cedula_estudiante` VARCHAR(45) NOT NULL,
  `grado_a_cursar` VARCHAR(45) NOT NULL,
  `id_per_academico` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`cedula_estudiante`, `id_per_academico`),
  CONSTRAINT `fk_grado_a_cursar_est_estudiantes1`
    FOREIGN KEY (`cedula_estudiante`)
    REFERENCES `base_proyecto_nueva`.`estudiantes` (`cedula_persona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_grado_a_cursar_est_per_academico1`
    FOREIGN KEY (`id_per_academico`)
    REFERENCES `base_proyecto_nueva`.`per_academico` (`id_per_academico`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE INDEX `fk_grado_a_cursar_est_per_academico1_idx` ON `base_proyecto_nueva`.`grado_a_cursar_est` (`id_per_academico` ASC);


-- -----------------------------------------------------
-- Table `base_proyecto_nueva`.`inscripciones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `base_proyecto_nueva`.`inscripciones` ;

CREATE TABLE IF NOT EXISTS `base_proyecto_nueva`.`inscripciones` (
  `id_inscripcion` INT NOT NULL AUTO_INCREMENT,
  `fecha` VARCHAR(45) NOT NULL,
  `hora` VARCHAR(45) NOT NULL,
  `cedula_usuario` VARCHAR(45) NOT NULL,
  `cedula_estudiante` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_inscripcion`),
  CONSTRAINT `fk_inscripciones_usuarios1`
    FOREIGN KEY (`cedula_usuario`)
    REFERENCES `base_proyecto_nueva`.`usuarios` (`cedula_persona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_inscripciones_estudiantes1`
    FOREIGN KEY (`cedula_estudiante`)
    REFERENCES `base_proyecto_nueva`.`estudiantes` (`cedula_persona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE INDEX `fk_inscripciones_usuarios1_idx` ON `base_proyecto_nueva`.`inscripciones` (`cedula_usuario` ASC);

CREATE INDEX `fk_inscripciones_estudiantes1_idx` ON `base_proyecto_nueva`.`inscripciones` (`cedula_estudiante` ASC);


-- -----------------------------------------------------
-- Table `base_proyecto_nueva`.`bitacora`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `base_proyecto_nueva`.`bitacora` ;

CREATE TABLE IF NOT EXISTS `base_proyecto_nueva`.`bitacora` (
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
-- Table `base_proyecto_nueva`.`datos_academicos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `base_proyecto_nueva`.`datos_academicos` ;

CREATE TABLE IF NOT EXISTS `base_proyecto_nueva`.`datos_academicos` (
  `cedula_estudiante` VARCHAR(45) NOT NULL,
  `a_repetido` VARCHAR(45) NOT NULL,
  `materias_repetidas` TEXT NOT NULL,
  `materias_pendientes` TEXT NOT NULL,
  PRIMARY KEY (`cedula_estudiante`),
  CONSTRAINT `fk_datos_academicos_estudiantes1`
    FOREIGN KEY (`cedula_estudiante`)
    REFERENCES `base_proyecto_nueva`.`estudiantes` (`cedula_persona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

USE `base_proyecto_nueva` ;

-- -----------------------------------------------------
-- Placeholder table for view `base_proyecto_nueva`.`vista_usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `base_proyecto_nueva`.`vista_usuarios` (`cedula` INT, `p_nombre` INT, `s_nombre` INT, `p_apellido` INT, `s_apellido` INT, `fecha_nacimiento` INT, `lugar_nacimiento` INT, `genero` INT, `estado_civil` INT, `email` INT, `grado_academico` INT, `cedula_persona` INT, `rol` INT, `privilegios` INT, `contraseña` INT, `pregunta_seg_1` INT, `respuesta_1` INT, `pregunta_seg_2` INT, `respuesta_2` INT);

-- -----------------------------------------------------
-- Placeholder table for view `base_proyecto_nueva`.`vista_estudiantes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `base_proyecto_nueva`.`vista_estudiantes` (`cedula` INT, `p_nombre` INT, `s_nombre` INT, `p_apellido` INT, `s_apellido` INT, `fecha_nacimiento` INT, `lugar_nacimiento` INT, `genero` INT, `email` INT, `estado` INT, `municipio` INT, `parroquia` INT, `sector` INT, `calle` INT, `nro_casa` INT, `punto_referencia` INT, `codigo_carnet` INT, `serial_carnet` INT, `cedula_escolar` INT, `plantel_proced` INT, `con_quien_vive` INT, `relacion_representante` INT, `cedula_padre` INT, `cedula_madre` INT, `cedula_representante` INT, `lateralidad` INT, `tipo_sangre` INT, `medicacion` INT, `dieta_especial` INT, `padecimiento` INT, `impedimento_fisico` INT, `necesidad_educativa` INT, `condicion_vista` INT, `condicion_dental` INT, `institucion_medica` INT, `carnet_discapacidad` INT, `vac_aplicada` INT, `dosis` INT, `lote` INT, `camisa` INT, `pantalon` INT, `calzado` INT, `estatura` INT, `peso` INT, `indice_m_c` INT, `circ_braquial` INT, `visual` INT, `motora` INT, `auditiva` INT, `escritura` INT, `lectura` INT, `lenguaje` INT, `embarazo` INT, `social` INT, `fisico` INT, `personal` INT, `familiar` INT, `academico` INT, `otra` INT, `grado_repetido` INT, `materias_repetidas` INT, `materias_pendientes` INT, `tiene_canaima` INT, `condicion_canaima` INT, `acceso_internet` INT, `grado_a_cursar` INT, `id_per_academico` INT);

-- -----------------------------------------------------
-- Placeholder table for view `base_proyecto_nueva`.`vista_representantes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `base_proyecto_nueva`.`vista_representantes` (`cedula` INT, `p_nombre` INT, `s_nombre` INT, `p_apellido` INT, `s_apellido` INT, `fecha_nacimiento` INT, `lugar_nacimiento` INT, `genero` INT, `estado_civil` INT, `email` INT, `grado_academico` INT, `estado` INT, `municipio` INT, `parroquia` INT, `sector` INT, `calle` INT, `nro_casa` INT, `punto_referencia` INT, `codigo_carnet` INT, `serial_carnet` INT, `empleo` INT, `lugar_trabajo` INT, `remuneracion` INT, `tipo_remuneracion` INT, `condicion` INT, `tipo` INT, `tenencia` INT, `banco` INT, `tipo_cuenta` INT, `nro_cuenta` INT, `nombre_aux` INT, `apellido_aux` INT, `pref_aux` INT, `numero_aux` INT, `relacion_aux` INT);

-- -----------------------------------------------------
-- Placeholder table for view `base_proyecto_nueva`.`vista_padres`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `base_proyecto_nueva`.`vista_padres` (`cedula` INT, `p_nombre` INT, `s_nombre` INT, `p_apellido` INT, `s_apellido` INT, `fecha_nacimiento` INT, `lugar_nacimiento` INT, `genero` INT, `estado_civil` INT, `email` INT, `grado_academico` INT, `estado` INT, `municipio` INT, `parroquia` INT, `sector` INT, `calle` INT, `nro_casa` INT, `punto_referencia` INT, `empleo` INT, `lugar_trabajo` INT, `remuneracion` INT, `tipo_remuneracion` INT, `condicion` INT, `tipo` INT, `tenencia` INT, `pais_residencia` INT);

-- -----------------------------------------------------
-- View `base_proyecto_nueva`.`vista_usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `base_proyecto_nueva`.`vista_usuarios`;
DROP VIEW IF EXISTS `base_proyecto_nueva`.`vista_usuarios` ;
USE `base_proyecto_nueva`;
CREATE  OR REPLACE VIEW `vista_usuarios` AS
    SELECT 
        *
    FROM
        `personas`,
        `usuarios`
    WHERE
        `personas`.`cedula` = `usuarios`.`cedula_persona`;

-- -----------------------------------------------------
-- View `base_proyecto_nueva`.`vista_estudiantes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `base_proyecto_nueva`.`vista_estudiantes`;
DROP VIEW IF EXISTS `base_proyecto_nueva`.`vista_estudiantes` ;
USE `base_proyecto_nueva`;
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
-- View `base_proyecto_nueva`.`vista_representantes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `base_proyecto_nueva`.`vista_representantes`;
DROP VIEW IF EXISTS `base_proyecto_nueva`.`vista_representantes` ;
USE `base_proyecto_nueva`;
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
-- View `base_proyecto_nueva`.`vista_padres`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `base_proyecto_nueva`.`vista_padres`;
DROP VIEW IF EXISTS `base_proyecto_nueva`.`vista_padres` ;
USE `base_proyecto_nueva`;
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
-- Data for table `base_proyecto_nueva`.`personas`
-- -----------------------------------------------------
START TRANSACTION;
USE `base_proyecto_nueva`;
INSERT INTO `base_proyecto_nueva`.`personas` (`cedula`, `p_nombre`, `s_nombre`, `p_apellido`, `s_apellido`, `fecha_nacimiento`, `lugar_nacimiento`, `genero`, `estado_civil`, `email`, `grado_academico`) VALUES ('V27919566', 'Elber', 'Alonso', 'Rondón', 'Hernández', '2001-05-05', 'Mérida', 'M', 'Soltero(a)', 'earh_2001@outlook.com', 'Universitario');
INSERT INTO `base_proyecto_nueva`.`personas` (`cedula`, `p_nombre`, `s_nombre`, `p_apellido`, `s_apellido`, `fecha_nacimiento`, `lugar_nacimiento`, `genero`, `estado_civil`, `email`, `grado_academico`) VALUES ('V28636530', 'María', 'Gabriela', 'Ballestero', 'Rodríguez', '2002-05-09', 'Caja seca', 'F', 'Soltero(a)', 'mgba952@gmail.com', 'Universitario');
INSERT INTO `base_proyecto_nueva`.`personas` (`cedula`, `p_nombre`, `s_nombre`, `p_apellido`, `s_apellido`, `fecha_nacimiento`, `lugar_nacimiento`, `genero`, `estado_civil`, `email`, `grado_academico`) VALUES ('V26985572', 'Franklin', 'Darío', 'Contreras', 'Rodríguez', DEFAULT, DEFAULT, 'M', 'Soltero(a)', 'contreras19.franklin@gmail.com', 'Universitario');

COMMIT;


-- -----------------------------------------------------
-- Data for table `base_proyecto_nueva`.`usuarios`
-- -----------------------------------------------------
START TRANSACTION;
USE `base_proyecto_nueva`;
INSERT INTO `base_proyecto_nueva`.`usuarios` (`cedula_persona`, `rol`, `privilegios`, `contraseña`, `pregunta_seg_1`, `respuesta_1`, `pregunta_seg_2`, `respuesta_2`) VALUES ('V27919566', 'Desarrollador', '0', '12345', 'Color favorito', 'Azúl', 'Nombre de mascota', 'Mia');
INSERT INTO `base_proyecto_nueva`.`usuarios` (`cedula_persona`, `rol`, `privilegios`, `contraseña`, `pregunta_seg_1`, `respuesta_1`, `pregunta_seg_2`, `respuesta_2`) VALUES ('V28636530', 'Desarrollador', '0', 'Gab_952', 'Color favorito', 'Azúl', DEFAULT, DEFAULT);
INSERT INTO `base_proyecto_nueva`.`usuarios` (`cedula_persona`, `rol`, `privilegios`, `contraseña`, `pregunta_seg_1`, `respuesta_1`, `pregunta_seg_2`, `respuesta_2`) VALUES ('V26985572', 'Desarrollador', '0', '12345', DEFAULT, DEFAULT, DEFAULT, DEFAULT);

COMMIT;

