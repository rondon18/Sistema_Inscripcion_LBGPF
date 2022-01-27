-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-01-2022 a las 22:11:28
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bd_proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE IF NOT EXISTS `alumnos` (
  `id` int(50) NOT NULL,
  `PrimerNombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `SegundoNombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `PrimerApellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `SegundoApellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Genero` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Cedula` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `TipoCedula` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `CedulaRepresentante` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `Estado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Municipio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Parroquia` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Ciudad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `PuedeIrseSolo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ContactoAuxiliar` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `TelefonoAuxiliar` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `RelacionAuxiliar` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Estatura` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Peso` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `GrupoSanguineo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Medicacion` text COLLATE utf8_spanish_ci NOT NULL,
  `DietaEspecial` text COLLATE utf8_spanish_ci NOT NULL,
  `ImpedimentoFisico` text COLLATE utf8_spanish_ci NOT NULL,
  `Alergias` text COLLATE utf8_spanish_ci NOT NULL,
  `ProblemasVista` text COLLATE utf8_spanish_ci NOT NULL,
  `ProblemasSalud` text COLLATE utf8_spanish_ci NOT NULL,
  `Grado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `TipoInscripcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(50) NOT NULL,
  `Cedula` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `PrimerNombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `SegundoNombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `PrimerApellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `SegundoApellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Genero` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Clave` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `Correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `Cedula`, `PrimerNombre`, `SegundoNombre`, `PrimerApellido`, `SegundoApellido`, `Genero`, `Clave`, `Telefono1`, `Telefono2`, `Direccion`, `Correo`) VALUES
(1, '27919566', 'Elber', 'Alonso', 'Rondón', 'Hernández', 'M', '12345', '04123569252', '04163569245', 'La pedregosa, Merida', 'earh_2001@outlook.com'),
(4, '27919567', 'Elber', 'Alonso', 'RondÃ³n', 'HernÃ¡ndez', 'M', '12345', '04123569252', '04163569245', 'Merida', 'earh_2001@outlook.com'),
(5, '23456789', 'Test', 'Dummy', 'Test', 'Dummy', 'M', '12345', '123456789', '354343561', 'Testing...', 'testing@sandbox.com'),
(6, '34567890', 'Test', 'Dummy', 'Test', 'Dummy', 'M', '12345', '123456789', '354343561', 'Testing...', 'testing@sandbox.com'),
(7, '987654321', 'Test', 'Dummy', 'Test', 'Dummy', 'M', '12345', '123456789', '354343561', 'Testing...', 'testing@sandbox.com'),
(8, '876543210', 'Test', 'Dummy', 'Test', 'Dummy', 'M', '12345', '123456789', '354343561', 'Testing...', 'testing@sandbox.com'),
(9, '1111111', 'Test', 'Dummy', 'Test', 'Dummy', 'M', '12345', '123456789', '354343561', 'Testing...', 'testing@sandbox.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `Cedula` (`Cedula`), ADD UNIQUE KEY `Cedula_2` (`Cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
