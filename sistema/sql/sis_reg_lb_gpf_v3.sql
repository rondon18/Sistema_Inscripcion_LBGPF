CREATE TABLE `antropometria_est` (
  `cedula_estudiante` varchar(45) PRIMARY KEY NOT NULL,
  `estatura` int(11) NOT NULL,
  `peso` float NOT NULL,
  `indice_m_c` float NOT NULL,
  `circ_braquial` float NOT NULL
);

CREATE TABLE `bitacora` (
  `id_bitacora` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `fecha_ingreso` date NOT NULL,
  `fecha_salida` date NOT NULL,
  `hora_ingreso` time NOT NULL,
  `hora_salida` time NOT NULL,
  `acciones_realizadas` text NOT NULL,
  `cedula_usuario` varchar(45) NOT NULL
);

CREATE TABLE `carnet_patria` (
  `cedula_persona` varchar(45) PRIMARY KEY NOT NULL,
  `codigo_carnet` varchar(45) NOT NULL,
  `serial_carnet` varchar(45) NOT NULL
);

CREATE TABLE `condiciones_est` (
  `cedula_estudiante` varchar(45) PRIMARY KEY NOT NULL,
  `visual` char(1) NOT NULL,
  `motora` char(1) NOT NULL,
  `auditiva` char(1) NOT NULL,
  `escritura` char(1) NOT NULL,
  `lectura` char(1) NOT NULL,
  `lenguaje` char(1) NOT NULL,
  `embarazo` char(1) NOT NULL
);

CREATE TABLE `contactos_aux` (
  `cedula_representante` varchar(45) PRIMARY KEY NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `prefijo_telefono` varchar(45) NOT NULL,
  `nro_telefono` varchar(45) NOT NULL,
  `relacion` varchar(45) NOT NULL
);

CREATE TABLE `datos_academicos` (
  `cedula_estudiante` varchar(45) PRIMARY KEY NOT NULL,
  `a_repetido` varchar(45) NOT NULL,
  `materias_repetidas` text NOT NULL,
  `materias_pendientes` text NOT NULL
);

CREATE TABLE `datos_economicos` (
  `cedula_representante` varchar(45) PRIMARY KEY NOT NULL,
  `banco` varchar(240) NOT NULL,
  `tipo_cuenta` varchar(45) NOT NULL,
  `nro_cuenta` varchar(45) NOT NULL
);

CREATE TABLE `datos_laborales` (
  `cedula_persona` varchar(45) PRIMARY KEY NOT NULL,
  `empleo` varchar(45) NOT NULL,
  `lugar_trabajo` varchar(45) NOT NULL,
  `remuneracion` varchar(45) NOT NULL,
  `tipo_remuneracion` varchar(45) NOT NULL
);

CREATE TABLE `datos_salud` (
  `cedula_estudiante` varchar(45) PRIMARY KEY NOT NULL,
  `lateralidad` varchar(45) NOT NULL,
  `tipo_sangre` varchar(45) NOT NULL,
  `medicacion` text NOT NULL,
  `dieta_especial` text NOT NULL,
  `padecimiento` text NOT NULL,
  `impedimento_fisico` text NOT NULL,
  `necesidad_educativa` text NOT NULL,
  `condicion_vista` varchar(45) NOT NULL,
  `condicion_dental` varchar(45) NOT NULL,
  `institucion_medica` varchar(45) NOT NULL,
  `carnet_discapacidad` varchar(45) NOT NULL
);

CREATE TABLE `datos_sociales` (
  `cedula_estudiante` varchar(45) PRIMARY KEY NOT NULL,
  `tiene_canaima` varchar(45) NOT NULL,
  `condicion_canaima` varchar(45) NOT NULL,
  `acceso_internet` varchar(45) NOT NULL
);

CREATE TABLE `datos_vivienda` (
  `cedula_persona` varchar(45) PRIMARY KEY NOT NULL,
  `condicion` varchar(45) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `tenencia` varchar(45) NOT NULL
);

CREATE TABLE `direcciones` (
  `cedula_persona` varchar(45) PRIMARY KEY NOT NULL,
  `estado` varchar(45) NOT NULL,
  `municipio` varchar(45) NOT NULL,
  `parroquia` varchar(45) NOT NULL,
  `sector` varchar(45) NOT NULL,
  `calle` varchar(45) NOT NULL,
  `nro_casa` varchar(45) NOT NULL,
  `punto_referencia` text NOT NULL
);

CREATE TABLE `estudiantes` (
  `cedula_persona` varchar(45) NOT NULL,
  `plantel_proced` text NOT NULL,
  `con_quien_vive` varchar(45) NOT NULL,
  `relacion_representante` varchar(45) NOT NULL,
  `cedula_padre` varchar(45) NOT NULL,
  `cedula_madre` varchar(45) NOT NULL,
  `cedula_representante` varchar(45) NOT NULL,
  `estado` varchar(30) NOT NULL,
  PRIMARY KEY (`cedula_persona`, `cedula_padre`, `cedula_madre`, `cedula_representante`)
);

CREATE TABLE `grado_a_cursar_est` (
  `cedula_estudiante` varchar(45) NOT NULL,
  `grado_a_cursar` varchar(45) NOT NULL,
  `seccion` varchar(50) NOT NULL,
  `id_per_academico` varchar(10) NOT NULL,
  PRIMARY KEY (`cedula_estudiante`, `id_per_academico`)
);

CREATE TABLE `inscripciones` (
  `id_inscripcion` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `fecha` varchar(45) NOT NULL,
  `hora` varchar(45) NOT NULL,
  `cedula_usuario` varchar(45) NOT NULL,
  `cedula_estudiante` varchar(45) NOT NULL
);

CREATE TABLE `observaciones_est` (
  `cedula_estudiante` varchar(45) PRIMARY KEY NOT NULL,
  `social` text NOT NULL,
  `fisico` text NOT NULL,
  `personal` text NOT NULL,
  `familiar` text NOT NULL,
  `academico` text NOT NULL,
  `otra` text NOT NULL
);

CREATE TABLE `padres` (
  `cedula_persona` varchar(45) PRIMARY KEY NOT NULL,
  `pais_residencia` varchar(45) NOT NULL
);

CREATE TABLE `per_academico` (
  `id_per_academico` varchar(10) PRIMARY KEY NOT NULL,
  `inicio` varchar(45) NOT NULL,
  `fin` varchar(45) NOT NULL
);

CREATE TABLE `personas` (
  `cedula` varchar(45) PRIMARY KEY NOT NULL,
  `p_nombre` varchar(45) NOT NULL,
  `s_nombre` varchar(45) NOT NULL,
  `p_apellido` varchar(45) NOT NULL,
  `s_apellido` varchar(45) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `lugar_nacimiento` text NOT NULL,
  `genero` char(2) NOT NULL,
  `estado_civil` varchar(45) NOT NULL,
  `email` varchar(60) NOT NULL,
  `grado_academico` varchar(45) NOT NULL
);

CREATE TABLE `representantes` (
  `cedula_persona` varchar(45) PRIMARY KEY NOT NULL
);

CREATE TABLE `tallas_est` (
  `cedula_estudiante` varchar(45) PRIMARY KEY NOT NULL,
  `camisa` varchar(45) NOT NULL,
  `pantalon` varchar(45) NOT NULL,
  `calzado` varchar(45) NOT NULL
);

CREATE TABLE `telefonos` (
  `cedula_persona` varchar(45) NOT NULL,
  `relacion` varchar(45) NOT NULL,
  `prefijo` varchar(45) NOT NULL,
  `numero` varchar(45) NOT NULL
);

CREATE TABLE `usuarios` (
  `cedula_persona` varchar(45) PRIMARY KEY NOT NULL,
  `rol` varchar(45) NOT NULL,
  `privilegios` varchar(45) NOT NULL,
  `contraseña` varchar(64) NOT NULL,
  `pregunta_seg_1` varchar(45) NOT NULL,
  `respuesta_1` varchar(45) NOT NULL,
  `pregunta_seg_2` varchar(45) NOT NULL,
  `respuesta_2` varchar(45) NOT NULL,
  `estado` varchar(25) NOT NULL
);

CREATE TABLE `vac_covid19_est` (
  `cedula_estudiante` varchar(45) PRIMARY KEY NOT NULL,
  `vac_aplicada` text NOT NULL,
  `dosis` int(11) NOT NULL,
  `lote` varchar(45) NOT NULL
);

CREATE TABLE `vacunas_est` (
  `cedula_estudiante` varchar(45) NOT NULL,
  `espec_vacuna` varchar(45) NOT NULL,
  `estado_vacuna` varchar(45) NOT NULL
);

CREATE UNIQUE INDEX `cedula_estudiante_UNIQUE` ON `antropometria_est` (`cedula_estudiante`);

CREATE UNIQUE INDEX `cedula_persona_UNIQUE` ON `carnet_patria` (`cedula_persona`);

CREATE UNIQUE INDEX `cedula_estudiante_UNIQUE` ON `condiciones_est` (`cedula_estudiante`);

CREATE UNIQUE INDEX `cedula_representante_UNIQUE` ON `contactos_aux` (`cedula_representante`);

CREATE UNIQUE INDEX `cedula_representante_UNIQUE` ON `datos_economicos` (`cedula_representante`);

CREATE UNIQUE INDEX `cedula_persona_UNIQUE` ON `datos_laborales` (`cedula_persona`);

CREATE UNIQUE INDEX `cedula_estudiante_UNIQUE` ON `datos_sociales` (`cedula_estudiante`);

CREATE UNIQUE INDEX `cedula_persona_UNIQUE` ON `datos_vivienda` (`cedula_persona`);

CREATE UNIQUE INDEX `cedula_persona_UNIQUE` ON `estudiantes` (`cedula_persona`);

CREATE INDEX `fk_estudiantes_padres1_idx` ON `estudiantes` (`cedula_padre`);

CREATE INDEX `fk_estudiantes_padres2_idx` ON `estudiantes` (`cedula_madre`);

CREATE INDEX `fk_estudiantes_personas1_idx` ON `estudiantes` (`cedula_persona`);

CREATE INDEX `fk_estudiantes_representantes1_idx` ON `estudiantes` (`cedula_representante`);

CREATE INDEX `fk_grado_a_cursar_est_per_academico1_idx` ON `grado_a_cursar_est` (`id_per_academico`);

CREATE INDEX `fk_inscripciones_usuarios1_idx` ON `inscripciones` (`cedula_usuario`);

CREATE INDEX `fk_inscripciones_estudiantes1_idx` ON `inscripciones` (`cedula_estudiante`);

CREATE UNIQUE INDEX `cedula_estudiante_UNIQUE` ON `observaciones_est` (`cedula_estudiante`);

CREATE UNIQUE INDEX `cedula_persona_UNIQUE` ON `padres` (`cedula_persona`);

CREATE UNIQUE INDEX `cedula_UNIQUE` ON `personas` (`cedula`);

CREATE UNIQUE INDEX `cedula_persona_UNIQUE` ON `representantes` (`cedula_persona`);

CREATE UNIQUE INDEX `cedula_estudiante_UNIQUE` ON `tallas_est` (`cedula_estudiante`);

CREATE INDEX `fk_telefonos_personas1` ON `telefonos` (`cedula_persona`);

CREATE UNIQUE INDEX `cedula_persona_UNIQUE` ON `usuarios` (`cedula_persona`);

CREATE INDEX `fk_usuarios_personas1_idx` ON `usuarios` (`cedula_persona`);

CREATE UNIQUE INDEX `cedula_estudiante_UNIQUE` ON `vac_covid19_est` (`cedula_estudiante`);

CREATE INDEX `fk_vacunas_est_datos_salud1` ON `vacunas_est` (`cedula_estudiante`);

ALTER TABLE `antropometria_est` ADD CONSTRAINT `fk_antropometria_est_datos_salud1` FOREIGN KEY (`cedula_estudiante`) REFERENCES `datos_salud` (`cedula_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `carnet_patria` ADD CONSTRAINT `fk_carnet_patria_personas1` FOREIGN KEY (`cedula_persona`) REFERENCES `personas` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `condiciones_est` ADD CONSTRAINT `fk_condiciones_est_datos_salud1` FOREIGN KEY (`cedula_estudiante`) REFERENCES `datos_salud` (`cedula_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `contactos_aux` ADD CONSTRAINT `fk_contactos_aux_representantes1` FOREIGN KEY (`cedula_representante`) REFERENCES `representantes` (`cedula_persona`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `datos_academicos` ADD CONSTRAINT `fk_datos_academicos_estudiantes1` FOREIGN KEY (`cedula_estudiante`) REFERENCES `estudiantes` (`cedula_persona`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `datos_economicos` ADD CONSTRAINT `fk_datos_economicos_representantes1` FOREIGN KEY (`cedula_representante`) REFERENCES `representantes` (`cedula_persona`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `datos_laborales` ADD CONSTRAINT `fk_datos_laborales_personas1` FOREIGN KEY (`cedula_persona`) REFERENCES `personas` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `datos_salud` ADD CONSTRAINT `fk_datos_salud_estudiantes1` FOREIGN KEY (`cedula_estudiante`) REFERENCES `estudiantes` (`cedula_persona`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `datos_sociales` ADD CONSTRAINT `fk_datos_sociales_estudiantes1` FOREIGN KEY (`cedula_estudiante`) REFERENCES `estudiantes` (`cedula_persona`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `datos_vivienda` ADD CONSTRAINT `fk_datos_vivienda_personas1` FOREIGN KEY (`cedula_persona`) REFERENCES `personas` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `direcciones` ADD CONSTRAINT `fk_direcciones_personas1` FOREIGN KEY (`cedula_persona`) REFERENCES `personas` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `estudiantes` ADD CONSTRAINT `fk_estudiantes_padres1` FOREIGN KEY (`cedula_padre`) REFERENCES `padres` (`cedula_persona`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `estudiantes` ADD CONSTRAINT `fk_estudiantes_padres2` FOREIGN KEY (`cedula_madre`) REFERENCES `padres` (`cedula_persona`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `estudiantes` ADD CONSTRAINT `fk_estudiantes_personas1` FOREIGN KEY (`cedula_persona`) REFERENCES `personas` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `estudiantes` ADD CONSTRAINT `fk_estudiantes_representantes1` FOREIGN KEY (`cedula_representante`) REFERENCES `representantes` (`cedula_persona`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `grado_a_cursar_est` ADD CONSTRAINT `fk_grado_a_cursar_est_estudiantes1` FOREIGN KEY (`cedula_estudiante`) REFERENCES `estudiantes` (`cedula_persona`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `grado_a_cursar_est` ADD CONSTRAINT `fk_grado_a_cursar_est_per_academico1` FOREIGN KEY (`id_per_academico`) REFERENCES `per_academico` (`id_per_academico`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `inscripciones` ADD CONSTRAINT `fk_inscripciones_estudiantes1` FOREIGN KEY (`cedula_estudiante`) REFERENCES `estudiantes` (`cedula_persona`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `inscripciones` ADD CONSTRAINT `fk_inscripciones_usuarios1` FOREIGN KEY (`cedula_usuario`) REFERENCES `usuarios` (`cedula_persona`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `observaciones_est` ADD CONSTRAINT `fk_observaciones_est_estudiantes1` FOREIGN KEY (`cedula_estudiante`) REFERENCES `estudiantes` (`cedula_persona`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `padres` ADD CONSTRAINT `fk_padres_personas1` FOREIGN KEY (`cedula_persona`) REFERENCES `personas` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `representantes` ADD CONSTRAINT `fk_representantes_personas1` FOREIGN KEY (`cedula_persona`) REFERENCES `personas` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `tallas_est` ADD CONSTRAINT `fk_tallas_est_datos_salud1` FOREIGN KEY (`cedula_estudiante`) REFERENCES `datos_salud` (`cedula_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `telefonos` ADD CONSTRAINT `fk_telefonos_personas1` FOREIGN KEY (`cedula_persona`) REFERENCES `personas` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `usuarios` ADD CONSTRAINT `fk_usuarios_personas1` FOREIGN KEY (`cedula_persona`) REFERENCES `personas` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `vac_covid19_est` ADD CONSTRAINT `fk_vac_covid19_est_datos_salud1` FOREIGN KEY (`cedula_estudiante`) REFERENCES `datos_salud` (`cedula_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `vacunas_est` ADD CONSTRAINT `fk_vacunas_est_datos_salud1` FOREIGN KEY (`cedula_estudiante`) REFERENCES `datos_salud` (`cedula_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE;

-- Datos iniciales del sistema. Un usuario base para poder registrar más y realizar funciones, pass por defecto: 12345

INSERT INTO `personas` VALUES ('V11111111','ADMIN','','ADMIN','','2000-01-01','','M','','ADMIN@HOST.COM','');
INSERT INTO `direcciones` VALUES ('V11111111','','','','','','','');
INSERT INTO `usuarios` VALUES ('V11111111','ADMINISTRADOR','1','5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5','Ciudad de tu luna de miel','123','Ciudad donde naciste','345','Activo');
INSERT INTO `per_academico` VALUES ('20222023','2022','2023');