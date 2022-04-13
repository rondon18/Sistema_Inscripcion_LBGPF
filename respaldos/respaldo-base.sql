-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-04-2022 a las 00:32:53
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `año-escolar`
--

CREATE TABLE `año-escolar` (
  `idAño-Escolar` int(11) NOT NULL,
  `Inicio_Año_Escolar` varchar(4) COLLATE utf8_bin NOT NULL,
  `Fin_Año_Escolar` varchar(4) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos_auxiliares`
--

CREATE TABLE `contactos_auxiliares` (
  `idContactoAuxiliar` int(11) NOT NULL,
  `Relación` varchar(20) COLLATE utf8_bin NOT NULL,
  `Cédula_Persona` varchar(15) COLLATE utf8_bin NOT NULL,
  `idRepresentante` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos-economicos`
--

CREATE TABLE `datos-economicos` (
  `idDatos-economicos` int(11) NOT NULL,
  `Banco` varchar(45) NOT NULL,
  `Tipo_Cuenta` varchar(45) NOT NULL,
  `Cta_Bancaria` varchar(45) NOT NULL,
  `idRepresentantes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos-laborales`
--

CREATE TABLE `datos-laborales` (
  `idDatos-laborales` int(11) NOT NULL,
  `Empleo` varchar(45) NOT NULL,
  `Lugar_Trabajo` varchar(45) DEFAULT NULL,
  `Remuneración` varchar(45) DEFAULT NULL,
  `Tipo_Remuneración` varchar(45) DEFAULT NULL,
  `idRepresentantes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datos-laborales`
--

INSERT INTO `datos-laborales` (`idDatos-laborales`, `Empleo`, `Lugar_Trabajo`, `Remuneración`, `Tipo_Remuneración`, `idRepresentantes`) VALUES
(4, '', '', '', '', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos-salud`
--

CREATE TABLE `datos-salud` (
  `idDatos-Medicos` int(11) NOT NULL,
  `Estatura` int(11) NOT NULL,
  `Peso` int(11) NOT NULL,
  `Indice` varchar(45) COLLATE utf8_bin NOT NULL,
  `Circ_Braquial` int(11) NOT NULL,
  `Lateralidad` varchar(45) COLLATE utf8_bin NOT NULL,
  `Tipo_Sangre` varchar(45) COLLATE utf8_bin NOT NULL,
  `Medicación` varchar(50) COLLATE utf8_bin NOT NULL,
  `Dieta_Especial` varchar(50) COLLATE utf8_bin NOT NULL,
  `Impedimento_Físico` varchar(60) COLLATE utf8_bin NOT NULL,
  `Alergias` varchar(50) COLLATE utf8_bin NOT NULL,
  `Cond_Vista` varchar(45) COLLATE utf8_bin NOT NULL,
  `Cond_Dental` varchar(45) COLLATE utf8_bin NOT NULL,
  `Institucion_Medica` varchar(50) COLLATE utf8_bin NOT NULL,
  `Carnet_Discapacidad` varchar(20) COLLATE utf8_bin NOT NULL,
  `idEstudiantes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos-sociales`
--

CREATE TABLE `datos-sociales` (
  `idDatos-Sociales` int(11) NOT NULL,
  `Posee_Canaima` char(2) COLLATE utf8_bin NOT NULL,
  `Condicion_Canaima` varchar(45) COLLATE utf8_bin NOT NULL,
  `Posee_Carnet_Patria` char(2) COLLATE utf8_bin NOT NULL,
  `Codigo_Carnet_Patria` varchar(20) COLLATE utf8_bin NOT NULL,
  `Serial_Carnet_Patria` varchar(20) COLLATE utf8_bin NOT NULL,
  `Acceso_Internet` varchar(45) COLLATE utf8_bin NOT NULL,
  `Con_Quien_Vive` varchar(45) COLLATE utf8_bin NOT NULL,
  `idEstudiantes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos-tallas`
--

CREATE TABLE `datos-tallas` (
  `idDatos-Tallas` int(11) NOT NULL,
  `Talla_Camisa` varchar(45) COLLATE utf8_bin NOT NULL,
  `Talla_Pantalón` varchar(45) COLLATE utf8_bin NOT NULL,
  `Talla_Zapatos` varchar(45) COLLATE utf8_bin NOT NULL,
  `idEstudiantes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `idEstudiantes` int(11) NOT NULL,
  `Plantel_Procedencia` text COLLATE utf8_bin NOT NULL,
  `Cedula_Persona` varchar(15) COLLATE utf8_bin NOT NULL,
  `idRepresentante` int(11) NOT NULL,
  `idPadre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes-repitentes`
--

CREATE TABLE `estudiantes-repitentes` (
  `idEstudiante-Repitente` int(11) NOT NULL,
  `Materias_Pendientes` varchar(50) COLLATE utf8_bin NOT NULL,
  `idEstudiante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `idGrado` int(11) NOT NULL,
  `Grado_A_Cursar` varchar(45) COLLATE utf8_bin NOT NULL,
  `idEstudiantes` int(11) NOT NULL,
  `idAño-Escolar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

CREATE TABLE `inscripciones` (
  `idInscripciones` int(11) NOT NULL,
  `Fecha_Inscripcion` varchar(12) COLLATE utf8_bin NOT NULL,
  `Hora_Inscripción` varchar(12) COLLATE utf8_bin NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idEstudiante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padres`
--

CREATE TABLE `padres` (
  `idPadres` int(11) NOT NULL,
  `Parentezco` varchar(45) COLLATE utf8_bin NOT NULL,
  `Cedula_Persona` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `idPersonas` int(11) NOT NULL,
  `Primer_Nombre` varchar(45) COLLATE utf8_bin NOT NULL,
  `Segundo_Nombre` varchar(45) COLLATE utf8_bin NOT NULL,
  `Primer_Apellido` varchar(45) COLLATE utf8_bin NOT NULL,
  `Segundo_Apellido` varchar(45) COLLATE utf8_bin NOT NULL,
  `Cédula` varchar(15) COLLATE utf8_bin NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Lugar_Nacimiento` varchar(100) COLLATE utf8_bin NOT NULL,
  `Género` varchar(45) COLLATE utf8_bin NOT NULL,
  `Correo_Electrónico` varchar(45) COLLATE utf8_bin NOT NULL,
  `Dirección` text COLLATE utf8_bin NOT NULL,
  `Estado_Civil` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`idPersonas`, `Primer_Nombre`, `Segundo_Nombre`, `Primer_Apellido`, `Segundo_Apellido`, `Cédula`, `Fecha_Nacimiento`, `Lugar_Nacimiento`, `Género`, `Correo_Electrónico`, `Dirección`, `Estado_Civil`) VALUES
(5, 'Elber', 'Alonso', 'Rondón', 'Hernández', '27919566', '2001-05-05', 'Mérida', 'M', 'earh_2001@outlook.com', 'La Pedregosa Alta', 'S');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `representantes`
--

CREATE TABLE `representantes` (
  `idRepresentantes` int(11) NOT NULL,
  `Vinculo` varchar(45) COLLATE utf8_bin NOT NULL,
  `Cedula_Persona` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `representantes`
--

INSERT INTO `representantes` (`idRepresentantes`, `Vinculo`, `Cedula_Persona`) VALUES
(3, 'Padre', '27919566');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teléfonos`
--

CREATE TABLE `teléfonos` (
  `idTeléfonos` int(11) NOT NULL,
  `Prefijo` varchar(4) NOT NULL,
  `Número_Telefónico` varchar(10) NOT NULL,
  `Relación_Teléfono` varchar(20) NOT NULL,
  `Cedula_Persona` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `teléfonos`
--

INSERT INTO `teléfonos` (`idTeléfonos`, `Prefijo`, `Número_Telefónico`, `Relación_Teléfono`, `Cedula_Persona`) VALUES
(19, '0416', '12345678', 'Principal', '27919566'),
(20, '0412', '87654321', 'Secundario', '27919566'),
(21, '0274', '12349587', 'Auxiliar', '27919566'),
(22, '0274', '12349587', 'Trabajo', '27919566');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuarios` int(11) NOT NULL,
  `Clave` varchar(45) COLLATE utf8_bin NOT NULL,
  `Privilegios` int(11) NOT NULL,
  `Cedula_Persona` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuarios`, `Clave`, `Privilegios`, `Cedula_Persona`) VALUES
(2, '12345', 2, '27919566');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `año-escolar`
--
ALTER TABLE `año-escolar`
  ADD PRIMARY KEY (`idAño-Escolar`);

--
-- Indices de la tabla `contactos_auxiliares`
--
ALTER TABLE `contactos_auxiliares`
  ADD PRIMARY KEY (`idContactoAuxiliar`,`idRepresentante`),
  ADD KEY `fk_representantes_auxiliares` (`idRepresentante`),
  ADD KEY `fk_personas_auxiliares` (`Cédula_Persona`);

--
-- Indices de la tabla `datos-economicos`
--
ALTER TABLE `datos-economicos`
  ADD PRIMARY KEY (`idDatos-economicos`,`idRepresentantes`),
  ADD KEY `fk_datos-economicos_representantes1_idx` (`idRepresentantes`);

--
-- Indices de la tabla `datos-laborales`
--
ALTER TABLE `datos-laborales`
  ADD PRIMARY KEY (`idDatos-laborales`,`idRepresentantes`),
  ADD KEY `fk_datos-laborales_representantes1_idx` (`idRepresentantes`);

--
-- Indices de la tabla `datos-salud`
--
ALTER TABLE `datos-salud`
  ADD PRIMARY KEY (`idDatos-Medicos`,`idEstudiantes`),
  ADD KEY `idUsuarios_idx` (`idEstudiantes`);

--
-- Indices de la tabla `datos-sociales`
--
ALTER TABLE `datos-sociales`
  ADD PRIMARY KEY (`idDatos-Sociales`,`idEstudiantes`),
  ADD KEY `idEstudiantes_idx` (`idEstudiantes`);

--
-- Indices de la tabla `datos-tallas`
--
ALTER TABLE `datos-tallas`
  ADD PRIMARY KEY (`idDatos-Tallas`,`idEstudiantes`),
  ADD KEY `idEstudiantes_idx` (`idEstudiantes`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`idEstudiantes`,`Cedula_Persona`,`idRepresentante`,`idPadre`),
  ADD KEY `Cedula_Persona_idx` (`Cedula_Persona`),
  ADD KEY `id_Representante_idx` (`idRepresentante`),
  ADD KEY `fk_estudiantes_padres1_idx` (`idPadre`);

--
-- Indices de la tabla `estudiantes-repitentes`
--
ALTER TABLE `estudiantes-repitentes`
  ADD PRIMARY KEY (`idEstudiante-Repitente`,`idEstudiante`),
  ADD KEY `idEstudiantes_idx` (`idEstudiante`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`idGrado`,`idEstudiantes`,`idAño-Escolar`),
  ADD KEY `idEstudiante_idx` (`idEstudiantes`),
  ADD KEY `fk_Año-Escolar_Grado` (`idAño-Escolar`);

--
-- Indices de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD PRIMARY KEY (`idInscripciones`,`idUsuario`,`idEstudiante`),
  ADD KEY `idEstudiante_idx` (`idEstudiante`),
  ADD KEY `idUsuarios_idx` (`idUsuario`);

--
-- Indices de la tabla `padres`
--
ALTER TABLE `padres`
  ADD PRIMARY KEY (`idPadres`,`Cedula_Persona`),
  ADD UNIQUE KEY `Cedula_Persona_UNIQUE` (`Cedula_Persona`),
  ADD KEY `Cedula_Persona_idx` (`Cedula_Persona`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`idPersonas`),
  ADD UNIQUE KEY `Cédula_UNIQUE` (`Cédula`);

--
-- Indices de la tabla `representantes`
--
ALTER TABLE `representantes`
  ADD PRIMARY KEY (`idRepresentantes`),
  ADD KEY `fk_personas_representantes` (`Cedula_Persona`);

--
-- Indices de la tabla `teléfonos`
--
ALTER TABLE `teléfonos`
  ADD PRIMARY KEY (`idTeléfonos`),
  ADD KEY `fk_personas_teléfonos` (`Cedula_Persona`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuarios`),
  ADD KEY `Cedula_Persona_idx` (`Cedula_Persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `año-escolar`
--
ALTER TABLE `año-escolar`
  MODIFY `idAño-Escolar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `contactos_auxiliares`
--
ALTER TABLE `contactos_auxiliares`
  MODIFY `idContactoAuxiliar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `datos-economicos`
--
ALTER TABLE `datos-economicos`
  MODIFY `idDatos-economicos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `datos-laborales`
--
ALTER TABLE `datos-laborales`
  MODIFY `idDatos-laborales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `datos-salud`
--
ALTER TABLE `datos-salud`
  MODIFY `idDatos-Medicos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `datos-sociales`
--
ALTER TABLE `datos-sociales`
  MODIFY `idDatos-Sociales` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `datos-tallas`
--
ALTER TABLE `datos-tallas`
  MODIFY `idDatos-Tallas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `idEstudiantes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estudiantes-repitentes`
--
ALTER TABLE `estudiantes-repitentes`
  MODIFY `idEstudiante-Repitente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `idGrado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `idInscripciones` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `padres`
--
ALTER TABLE `padres`
  MODIFY `idPadres` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `idPersonas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `representantes`
--
ALTER TABLE `representantes`
  MODIFY `idRepresentantes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `teléfonos`
--
ALTER TABLE `teléfonos`
  MODIFY `idTeléfonos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contactos_auxiliares`
--
ALTER TABLE `contactos_auxiliares`
  ADD CONSTRAINT `fk_personas_auxiliares` FOREIGN KEY (`Cédula_Persona`) REFERENCES `personas` (`Cédula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_representantes_auxiliares` FOREIGN KEY (`idRepresentante`) REFERENCES `representantes` (`idRepresentantes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datos-economicos`
--
ALTER TABLE `datos-economicos`
  ADD CONSTRAINT `fk_datos-economicos_representantes1` FOREIGN KEY (`idRepresentantes`) REFERENCES `representantes` (`idRepresentantes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datos-laborales`
--
ALTER TABLE `datos-laborales`
  ADD CONSTRAINT `fk_datos-laborales_representantes1` FOREIGN KEY (`idRepresentantes`) REFERENCES `representantes` (`idRepresentantes`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `datos-salud`
--
ALTER TABLE `datos-salud`
  ADD CONSTRAINT `fk_Estudiantes_Datos-Medicos` FOREIGN KEY (`idEstudiantes`) REFERENCES `estudiantes` (`idEstudiantes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datos-sociales`
--
ALTER TABLE `datos-sociales`
  ADD CONSTRAINT `fk_Estudiantes_Datos-Sociales` FOREIGN KEY (`idEstudiantes`) REFERENCES `estudiantes` (`idEstudiantes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datos-tallas`
--
ALTER TABLE `datos-tallas`
  ADD CONSTRAINT `fk_Estudiantes_Datos-Tallas` FOREIGN KEY (`idEstudiantes`) REFERENCES `estudiantes` (`idEstudiantes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `fk_Personas_Estudiantes` FOREIGN KEY (`Cedula_Persona`) REFERENCES `personas` (`Cédula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Representantes_Estudiantes` FOREIGN KEY (`idRepresentante`) REFERENCES `representantes` (`idRepresentantes`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_estudiantes_padres1` FOREIGN KEY (`idPadre`) REFERENCES `padres` (`idPadres`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `estudiantes-repitentes`
--
ALTER TABLE `estudiantes-repitentes`
  ADD CONSTRAINT `fk_Estudiantes_Materias-Pendientes` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiantes` (`idEstudiantes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `grado`
--
ALTER TABLE `grado`
  ADD CONSTRAINT `fk_Año-Escolar_Grado` FOREIGN KEY (`idAño-Escolar`) REFERENCES `año-escolar` (`idAño-Escolar`),
  ADD CONSTRAINT `fk_Estudiantes_Grado` FOREIGN KEY (`idEstudiantes`) REFERENCES `estudiantes` (`idEstudiantes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD CONSTRAINT `fk_Estudiantes_Inscripciones` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiantes` (`idEstudiantes`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Usuarios_Inscripciones` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuarios`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `padres`
--
ALTER TABLE `padres`
  ADD CONSTRAINT `Cedula_Persona` FOREIGN KEY (`Cedula_Persona`) REFERENCES `personas` (`Cédula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `representantes`
--
ALTER TABLE `representantes`
  ADD CONSTRAINT `fk_personas_representantes` FOREIGN KEY (`Cedula_Persona`) REFERENCES `personas` (`Cédula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `teléfonos`
--
ALTER TABLE `teléfonos`
  ADD CONSTRAINT `fk_personas_teléfonos` FOREIGN KEY (`Cedula_Persona`) REFERENCES `personas` (`Cédula`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_personas_usuarios` FOREIGN KEY (`Cedula_Persona`) REFERENCES `personas` (`Cédula`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
