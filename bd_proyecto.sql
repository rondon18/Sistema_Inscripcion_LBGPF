-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-03-2022 a las 05:38:24
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
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `idAdministradores` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `idAlumnos` int(11) NOT NULL,
  `Plantel_Procedencia` text COLLATE utf8_bin NOT NULL,
  `Cedula_Persona` varchar(45) COLLATE utf8_bin NOT NULL,
  `idRepresentante` int(11) NOT NULL,
  `idPadre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`idAlumnos`, `Plantel_Procedencia`, `Cedula_Persona`, `idRepresentante`, `idPadre`) VALUES
(27, 'jvjyvjhvjgtfujyvjy', 'jkhvkjhv', 25, 60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `año-escolar`
--

CREATE TABLE `año-escolar` (
  `idAño-Escolar` int(11) NOT NULL,
  `Año_Escolar` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `año-escolar`
--

INSERT INTO `año-escolar` (`idAño-Escolar`, `Año_Escolar`) VALUES
(3, '2022-2023'),
(4, '2023-2024');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos_auxiliares`
--

CREATE TABLE `contactos_auxiliares` (
  `idContactoAuxiliar` int(11) NOT NULL,
  `idRepresentante` int(20) NOT NULL,
  `Relación` varchar(20) COLLATE utf8_bin NOT NULL,
  `Nombre_Aux` varchar(30) COLLATE utf8_bin NOT NULL,
  `Tfl_P_Contacto_Aux` varchar(15) COLLATE utf8_bin NOT NULL,
  `Tfl_S_Contacto_Aux` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `contactos_auxiliares`
--

INSERT INTO `contactos_auxiliares` (`idContactoAuxiliar`, `idRepresentante`, `Relación`, `Nombre_Aux`, `Tfl_P_Contacto_Aux`, `Tfl_S_Contacto_Aux`) VALUES
(5, 34, 'jahsvdjahsv', 'jashdvasd', 'avjshdvasjhdvas', 'vajshdvajshdvaj'),
(6, 35, '-No hay', 'No hay', '04120763135', '04120763135');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos-medicos`
--

CREATE TABLE `datos-medicos` (
  `idDatos-Medicos` int(11) NOT NULL,
  `Estatura` int(11) NOT NULL,
  `Peso` int(11) NOT NULL,
  `Indice` varchar(45) COLLATE utf8_bin NOT NULL,
  `Circ_Braquial` int(11) NOT NULL,
  `Lateralidad` varchar(45) COLLATE utf8_bin NOT NULL,
  `Tipo_Sangre` varchar(45) COLLATE utf8_bin NOT NULL,
  `Medicación` varchar(50) COLLATE utf8_bin NOT NULL,
  `Dieta_Especial` varchar(50) COLLATE utf8_bin NOT NULL,
  `Impedimento_Físico` varchar(50) COLLATE utf8_bin NOT NULL,
  `Alergias` varchar(50) COLLATE utf8_bin NOT NULL,
  `Cond_Vista` varchar(45) COLLATE utf8_bin NOT NULL,
  `Cond_Dental` varchar(45) COLLATE utf8_bin NOT NULL,
  `Institucion_Medica` varchar(50) COLLATE utf8_bin NOT NULL,
  `Carnet_Discapacidad` varchar(20) COLLATE utf8_bin NOT NULL,
  `idAlumnos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `datos-medicos`
--

INSERT INTO `datos-medicos` (`idDatos-Medicos`, `Estatura`, `Peso`, `Indice`, `Circ_Braquial`, `Lateralidad`, `Tipo_Sangre`, `Medicación`, `Dieta_Especial`, `Impedimento_Físico`, `Alergias`, `Cond_Vista`, `Cond_Dental`, `Institucion_Medica`, `Carnet_Discapacidad`, `idAlumnos`) VALUES
(3, 0, 0, 'hcfhuytfcyhutd', 0, 'Ambidextro', 'O+', 'ghcghrxcghjrx', 'fvhgchjchj', 'Visual', 'hgfchjtdcjhgt', 'Mala', 'Regular', 'gvchugchtchct', 'hjcjhtcfjhtc', 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos-sociales`
--

CREATE TABLE `datos-sociales` (
  `idDatos-Sociales` int(11) NOT NULL,
  `Posee_Canaima` char(2) COLLATE utf8_bin NOT NULL,
  `Condicion_Canaima` varchar(45) COLLATE utf8_bin NOT NULL,
  `Posee_Carnet_Patria` char(2) COLLATE utf8_bin NOT NULL,
  `Codigo_Carnet_Patria` varchar(45) COLLATE utf8_bin NOT NULL,
  `Serial_Carnet_Patria` varchar(45) COLLATE utf8_bin NOT NULL,
  `Acceso_Internet` varchar(45) COLLATE utf8_bin NOT NULL,
  `idAlumnos` int(11) NOT NULL
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
  `idAlumnos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `idGrado` int(11) NOT NULL,
  `Grado_A_Cursar` varchar(45) COLLATE utf8_bin NOT NULL,
  `idAlumnos` int(11) NOT NULL,
  `idAño-Escolar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`idGrado`, `Grado_A_Cursar`, `idAlumnos`, `idAño-Escolar`) VALUES
(14, 'Primer año', 27, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

CREATE TABLE `inscripciones` (
  `idInscripciones` int(11) NOT NULL,
  `Fecha_Inscripcion` date NOT NULL,
  `Hora_Inscripción` date NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idAlumno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias-pendientes`
--

CREATE TABLE `materias-pendientes` (
  `idMaterias-Pendientes` int(11) NOT NULL,
  `Tiene_Mat_Pend` char(2) COLLATE utf8_bin NOT NULL,
  `Materias_Pendientes` int(11) NOT NULL,
  `idAlumno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padres`
--

CREATE TABLE `padres` (
  `idPadres` int(11) NOT NULL,
  `Parentezco` varchar(45) COLLATE utf8_bin NOT NULL,
  `Cedula_Persona` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `padres`
--

INSERT INTO `padres` (`idPadres`, `Parentezco`, `Cedula_Persona`) VALUES
(50, 'Padre', '26354273'),
(51, 'Padre', '26354273'),
(52, 'Padre', '26354273'),
(53, 'Padre', '26354273'),
(54, 'Padre', '26354273'),
(55, 'Padre', '26354273'),
(56, 'Padre', '26354273'),
(57, 'Padre', '26354273'),
(58, 'Padre', '26354273'),
(59, 'Padre', '26354273'),
(60, 'Padre', '26354273');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `idPersonas` int(11) NOT NULL,
  `Nombres` varchar(45) COLLATE utf8_bin NOT NULL,
  `Apellidos` varchar(45) COLLATE utf8_bin NOT NULL,
  `Cédula` varchar(45) COLLATE utf8_bin NOT NULL,
  `Fecha_Nacimiento` date DEFAULT NULL,
  `Lugar_Nacimiento` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `Género` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `Correo_Electronico` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `Dirección` text COLLATE utf8_bin DEFAULT NULL,
  `Teléfono_Principal` varchar(15) COLLATE utf8_bin NOT NULL,
  `Teléfono_Auxiliar` varchar(15) COLLATE utf8_bin NOT NULL,
  `Estado_Civil` varchar(15) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`idPersonas`, `Nombres`, `Apellidos`, `Cédula`, `Fecha_Nacimiento`, `Lugar_Nacimiento`, `Género`, `Correo_Electronico`, `Dirección`, `Teléfono_Principal`, `Teléfono_Auxiliar`, `Estado_Civil`) VALUES
(60, 'Elber Alonso', 'Rondón Hernández', '26354273', '0537-02-06', 'gjhdsgfjhsv', 'M', 'jsdhvfjshdv@sajbdfj', 'bjashdvfjhv', 'bajkshbdjah', 'vjgsadvfjgsadv', 'Soltero(a)'),
(76, 'joiupupoiu uyrturi', 'bchgch yrtbiygv', '5647654654', '5466-02-06', '5436nvhnjgcvjhg', 'F', 'ufdsfs@jsdkfb', 'kasjbdadlmlknbkjbasd', '76157238', '1735417342', 'Soltero(a)'),
(77, 'Elber Alonso', 'Rondón Hernández', '27919566', '2001-05-05', 'Merida', 'M', 'earh_2001@outlook.com', 'La pedregosa', '04123569252', '04163569245', 'Soltero(a)'),
(78, 'Elber Alonso', 'Rondón Hernández', '2954631', '4123-05-21', 'kabsdjhv', 'M', 'vjasvd@ahsbdjas', 'jasvdjahsd', 'jkvasd', 'jahsvdj', 'Soltero(a)'),
(82, 'lili lulu', 'lopez millan', '12312312', '2002-07-07', 'valera', 'F', 'maria@gmail.com', 'en la luna', '04120763135', '04120763135', 'Soltero(a)'),
(150, 'sjhvjgv jvjvjh', 'vjkhvjkhv jhvjhv', 'jkhvkjhv', '1111-11-11', 'ucvfhkgcfyh', 'M', 'dcjtcf@jhavsdhvs', 'jyfjyvjyvjhvj', '5413513.51', '4365815413', 'Soltero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `representantes`
--

CREATE TABLE `representantes` (
  `idRepresentantes` int(11) NOT NULL,
  `Vinculo` varchar(45) COLLATE utf8_bin NOT NULL,
  `Banco` varchar(45) COLLATE utf8_bin NOT NULL,
  `Tipo_Cuenta` varchar(45) COLLATE utf8_bin NOT NULL,
  `Cta_Bancaria` int(11) NOT NULL,
  `Grado_Inst` varchar(45) COLLATE utf8_bin NOT NULL,
  `Empleo` varchar(45) COLLATE utf8_bin NOT NULL,
  `Lugar_Trabajo` varchar(50) COLLATE utf8_bin NOT NULL,
  `Teléfono_Trabajo` varchar(11) COLLATE utf8_bin NOT NULL,
  `Remuneracion` int(11) DEFAULT NULL,
  `Tipo_Remuneración` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `id_Usuario` int(11) NOT NULL,
  `Cedula_Persona` varchar(11) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `representantes`
--

INSERT INTO `representantes` (`idRepresentantes`, `Vinculo`, `Banco`, `Tipo_Cuenta`, `Cta_Bancaria`, `Grado_Inst`, `Empleo`, `Lugar_Trabajo`, `Teléfono_Trabajo`, `Remuneracion`, `Tipo_Remuneración`, `id_Usuario`, `Cedula_Persona`) VALUES
(25, 'Madre', 'Banco de Venezuela S.A.', 'Corriente', 423424, 'Bachillerato', 'Desempleado', '', '', 0, '', 44, '26354273'),
(34, 'Padre', 'Bancaribe C.A.', 'Corriente', 2147483647, 'Bachillerato', 'Desempleado', '', '', 0, '', 55, '2954631'),
(35, 'Madre', 'Banco Fondo Común C.A.', 'Ahorro', 2147483647, 'Bachillerato', 'Vendedora', 'Charcuteria', '04120763135', 0, 'Diaria', 57, '12312312');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuarios` int(11) NOT NULL,
  `Clave` varchar(45) COLLATE utf8_bin NOT NULL,
  `Privilegios` int(11) NOT NULL,
  `Cedula_Persona` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuarios`, `Clave`, `Privilegios`, `Cedula_Persona`) VALUES
(44, '1234', 1, '26354273'),
(55, '1234', 1, '2954631'),
(57, '12312312', 1, '12312312');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`idAdministradores`,`idUsuario`),
  ADD KEY `idUsuario_idx` (`idUsuario`);

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`idAlumnos`,`Cedula_Persona`,`idRepresentante`),
  ADD KEY `Cedula_Persona_idx` (`Cedula_Persona`),
  ADD KEY `id_Representante_idx` (`idRepresentante`),
  ADD KEY `fk_Padres_Alumnos` (`idPadre`);

--
-- Indices de la tabla `año-escolar`
--
ALTER TABLE `año-escolar`
  ADD PRIMARY KEY (`idAño-Escolar`),
  ADD UNIQUE KEY `Año_Escolar` (`Año_Escolar`);

--
-- Indices de la tabla `contactos_auxiliares`
--
ALTER TABLE `contactos_auxiliares`
  ADD PRIMARY KEY (`idContactoAuxiliar`),
  ADD KEY `fk_representantes_auxiliares` (`idRepresentante`);

--
-- Indices de la tabla `datos-medicos`
--
ALTER TABLE `datos-medicos`
  ADD PRIMARY KEY (`idDatos-Medicos`,`idAlumnos`),
  ADD KEY `idUsuarios_idx` (`idAlumnos`);

--
-- Indices de la tabla `datos-sociales`
--
ALTER TABLE `datos-sociales`
  ADD PRIMARY KEY (`idDatos-Sociales`,`idAlumnos`),
  ADD KEY `idAlumnos_idx` (`idAlumnos`);

--
-- Indices de la tabla `datos-tallas`
--
ALTER TABLE `datos-tallas`
  ADD PRIMARY KEY (`idDatos-Tallas`,`idAlumnos`),
  ADD KEY `idAlumnos_idx` (`idAlumnos`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`idGrado`,`idAlumnos`),
  ADD KEY `idAlumno_idx` (`idAlumnos`),
  ADD KEY `fk_Año-Escolar_Grado` (`idAño-Escolar`);

--
-- Indices de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD PRIMARY KEY (`idInscripciones`,`idUsuario`,`idAlumno`),
  ADD KEY `idAlumno_idx` (`idAlumno`),
  ADD KEY `idUsuarios_idx` (`idUsuario`);

--
-- Indices de la tabla `materias-pendientes`
--
ALTER TABLE `materias-pendientes`
  ADD PRIMARY KEY (`idMaterias-Pendientes`,`idAlumno`),
  ADD KEY `idAlumnos_idx` (`idAlumno`);

--
-- Indices de la tabla `padres`
--
ALTER TABLE `padres`
  ADD PRIMARY KEY (`idPadres`,`Cedula_Persona`),
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
  ADD PRIMARY KEY (`idRepresentantes`,`id_Usuario`),
  ADD KEY `id_Usuario_idx` (`id_Usuario`),
  ADD KEY `fk_personas_representantes` (`Cedula_Persona`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuarios`,`Cedula_Persona`),
  ADD KEY `Cedula_Persona_idx` (`Cedula_Persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `idAdministradores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `idAlumnos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `año-escolar`
--
ALTER TABLE `año-escolar`
  MODIFY `idAño-Escolar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `contactos_auxiliares`
--
ALTER TABLE `contactos_auxiliares`
  MODIFY `idContactoAuxiliar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `datos-medicos`
--
ALTER TABLE `datos-medicos`
  MODIFY `idDatos-Medicos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `idGrado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `idInscripciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `padres`
--
ALTER TABLE `padres`
  MODIFY `idPadres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `idPersonas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT de la tabla `representantes`
--
ALTER TABLE `representantes`
  MODIFY `idRepresentantes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD CONSTRAINT `fk_Usuarios_Administradores` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuarios`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `fk_Padres_Alumnos` FOREIGN KEY (`idPadre`) REFERENCES `padres` (`idPadres`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Personas_Alumnos` FOREIGN KEY (`Cedula_Persona`) REFERENCES `personas` (`Cédula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Representantes_Alumnos` FOREIGN KEY (`idRepresentante`) REFERENCES `representantes` (`idRepresentantes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `contactos_auxiliares`
--
ALTER TABLE `contactos_auxiliares`
  ADD CONSTRAINT `fk_representantes_auxiliares` FOREIGN KEY (`idRepresentante`) REFERENCES `representantes` (`idRepresentantes`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `datos-medicos`
--
ALTER TABLE `datos-medicos`
  ADD CONSTRAINT `fk_Alumnos_Datos-Medicos` FOREIGN KEY (`idAlumnos`) REFERENCES `alumnos` (`idAlumnos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datos-sociales`
--
ALTER TABLE `datos-sociales`
  ADD CONSTRAINT `fk_Alumnos_Datos-Sociales` FOREIGN KEY (`idAlumnos`) REFERENCES `alumnos` (`idAlumnos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datos-tallas`
--
ALTER TABLE `datos-tallas`
  ADD CONSTRAINT `fk_Alumnos_Datos-Tallas` FOREIGN KEY (`idAlumnos`) REFERENCES `alumnos` (`idAlumnos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `grado`
--
ALTER TABLE `grado`
  ADD CONSTRAINT `fk_Alumnos_Grado` FOREIGN KEY (`idAlumnos`) REFERENCES `alumnos` (`idAlumnos`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Año-Escolar_Grado` FOREIGN KEY (`idAño-Escolar`) REFERENCES `año-escolar` (`idAño-Escolar`);

--
-- Filtros para la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD CONSTRAINT `fk_Alumnos_Inscripciones` FOREIGN KEY (`idAlumno`) REFERENCES `alumnos` (`idAlumnos`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Usuarios_Inscripciones` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuarios`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `materias-pendientes`
--
ALTER TABLE `materias-pendientes`
  ADD CONSTRAINT `fk_Alumnos_Materias-Pendientes` FOREIGN KEY (`idAlumno`) REFERENCES `alumnos` (`idAlumnos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `padres`
--
ALTER TABLE `padres`
  ADD CONSTRAINT `Cedula_Persona` FOREIGN KEY (`Cedula_Persona`) REFERENCES `personas` (`Cédula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `representantes`
--
ALTER TABLE `representantes`
  ADD CONSTRAINT `fk_Usuarios_Representantes` FOREIGN KEY (`id_Usuario`) REFERENCES `usuarios` (`idUsuarios`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_personas_representantes` FOREIGN KEY (`Cedula_Persona`) REFERENCES `personas` (`Cédula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_personas_usuarios` FOREIGN KEY (`Cedula_Persona`) REFERENCES `personas` (`Cédula`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
