-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-05-2022 a las 07:03:29
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

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

--
-- Volcado de datos para la tabla `año-escolar`
--

INSERT INTO `año-escolar` (`idAño-Escolar`, `Inicio_Año_Escolar`, `Fin_Año_Escolar`) VALUES
(12, '2022', '2023');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitácora`
--

CREATE TABLE `bitácora` (
  `idbitácora` int(11) NOT NULL,
  `idUsuarios` int(11) NOT NULL,
  `fechaIniciosesión` date NOT NULL,
  `horaIniciosesión` time NOT NULL,
  `linksVisitados` text NOT NULL,
  `fechaFinalsesión` date DEFAULT NULL,
  `horaFinalsesión` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bitácora`
--

INSERT INTO `bitácora` (`idbitácora`, `idUsuarios`, `fechaIniciosesión`, `horaIniciosesión`, `linksVisitados`, `fechaFinalsesión`, `horaFinalsesión`) VALUES
(1, 2, '2022-04-22', '17:34:06', 'Muchos,ajshdvjasgdvjashdvjh', '2022-04-22', '19:34:06'),
(2, 2, '2022-04-26', '01:51:36', '/proyecto_pst/controladores/login.php', '0000-00-00', '00:00:00'),
(3, 2, '2022-04-26', '01:52:40', 'Inicia Sesión,Visita menú principal,Visita menú principal,Visita menú principal,Visita menú principal,Visita menú principal,Visita menú principal,Visita menú principal,Visita perfil,Visita perfil,Visita perfil', NULL, NULL),
(4, 2, '2022-04-26', '02:18:26', 'Inicia Sesión,Visita menú principal', NULL, NULL),
(5, 4, '2022-04-26', '02:19:36', 'Inicia Sesión,Visita menú principal', NULL, NULL),
(6, 2, '2022-04-26', '04:26:27', 'Inicia Sesión, Visita menú principal, Consulta estudiantes, Visita menú principal, Visita menú principal, Cierra sesión.', '2022-04-26', '04:34:54'),
(7, 2, '2022-04-26', '04:34:59', 'Inicia Sesión, Visita menú principal, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Cierra sesión.', '2022-04-26', '09:08:52'),
(8, 4, '2022-04-26', '09:08:59', 'Inicia Sesión, Visita menú principal', NULL, NULL),
(9, 2, '2022-04-28', '22:22:54', 'Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita perfil', NULL, NULL),
(10, 2, '2022-04-30', '13:41:12', 'Inicia Sesión, Visita menú principal, Visita menú principal, Cierra sesión.', '2022-04-30', '13:42:21'),
(11, 11, '2022-04-30', '14:51:41', 'Inicia Sesión, Visita menú principal, Visita perfil, Visita perfil, Visita perfil, Visita perfil, Visita perfil, Visita perfil, Visita perfil, Visita perfil, Visita menú principal, Cierra sesión.', '2022-04-30', '14:57:15'),
(12, 11, '2022-04-30', '14:57:22', 'Inicia Sesión, Visita menú principal, Visita perfil, Visita perfil, Visita perfil, Visita perfil, Visita perfil, Edita perfil, Visita menú principal, Visita perfil, Visita perfil, Visita perfil, Visita perfil, Visita menú principal, Consulta estudiantes, Visita menú principal, Visita perfil, Visita menú principal, Visita perfil, Visita menú principal, Visita perfil, Visita perfil, Visita perfil, Visita menú principal, Visita perfil, Visita perfil, Visita perfil, Visita menú principal, Visita perfil, Visita perfil, Visita menú principal, Visita perfil, Visita perfil, Visita perfil, Visita perfil, Edita perfil, Edita perfil', NULL, NULL),
(13, 2, '2022-04-30', '15:27:52', 'Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Visita perfil, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita perfil', NULL, NULL),
(14, 2, '2022-04-30', '15:52:39', 'Inicia Sesión, Visita menú principal, Visita menú principal', NULL, NULL),
(15, 11, '2022-04-30', '15:52:50', 'Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Consulta estudiantes, Visita menú principal, Cierra sesión.', '2022-04-30', '16:04:32'),
(16, 11, '2022-04-30', '21:26:16', 'Inicia Sesión, Visita menú principal, Visita perfil', NULL, NULL),
(17, 2, '2022-04-30', '21:26:49', 'Inicia Sesión, Visita menú principal, Visita perfil', NULL, NULL),
(18, 2, '2022-04-30', '21:27:17', 'Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Cierra sesión.', '2022-04-30', '21:33:23'),
(19, 2, '2022-04-30', '21:33:26', 'Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Cierra sesión.', '2022-04-30', '22:35:59'),
(20, 2, '2022-04-30', '23:27:04', 'Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Cierra sesión.', '2022-05-01', '01:50:43'),
(21, 4, '2022-05-01', '01:50:47', 'Inicia Sesión, Visita menú principal', NULL, NULL),
(22, 2, '2022-05-01', '02:38:49', 'Inicia Sesión, Visita menú principal, Consulta estudiantes, Visita menú principal, Cierra sesión.', '2022-05-01', '02:48:25'),
(23, 4, '2022-05-01', '02:48:29', 'Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita perfil, Visita menú principal, Cierra sesión.', '2022-05-01', '05:09:23'),
(24, 4, '2022-05-01', '05:09:28', 'Inicia Sesión, Visita menú principal, Visita perfil', NULL, NULL),
(25, 2, '2022-05-01', '13:32:14', 'Inicia Sesión, Visita menú principal, Consulta estudiantes, Visita menú principal, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita menú principal, Consulta estudiantes, Visita menú principal, Cierra sesión.', '2022-05-01', '15:18:11'),
(26, 4, '2022-05-01', '15:18:15', 'Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita perfil', NULL, NULL),
(27, 4, '2022-05-01', '19:44:49', 'Inicia Sesión, Visita menú principal, Visita menú principal, Visita menú principal, Cierra sesión.', '2022-05-02', '04:33:24'),
(28, 11, '2022-05-02', '01:42:01', 'Inicia Sesión, Visita menú principal', NULL, NULL),
(29, 2, '2022-05-02', '04:34:31', 'Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Cierra sesión.', '2022-05-02', '16:14:13'),
(30, 12, '2022-05-02', '04:40:10', 'Inicia Sesión, Visita menú principal, Visita perfil', NULL, NULL),
(31, 2, '2022-05-02', '04:42:32', 'Inicia Sesión, Visita menú principal, Consulta estudiantes, Visita menú principal, Visita perfil, Visita menú principal, Cierra sesión.', '2022-05-02', '05:24:55'),
(32, 12, '2022-05-02', '05:25:21', 'Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Visita perfil, Visita perfil, Visita menú principal, Cierra sesión.', '2022-05-02', '06:50:03'),
(33, 4, '2022-05-02', '06:50:22', 'Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita menú principal, Visita perfil, Visita menú principal, Consulta estudiantes, Visita menú principal, Visita menú principal, Visita menú principal, Consulta estudiantes, Visita menú principal, Visita perfil, Visita menú principal, Visita menú principal, Consulta estudiantes, Visita menú principal, Visita menú principal', NULL, NULL),
(34, 4, '2022-05-02', '13:56:51', 'Inicia Sesión, Visita menú principal, Consulta estudiantes', NULL, NULL),
(35, 4, '2022-05-02', '16:14:55', 'Inicia Sesión, Visita menú principal', NULL, NULL),
(36, 2, '2022-05-03', '11:56:17', 'Inicia Sesión, Visita menú principal, Visita perfil', NULL, NULL),
(37, 4, '2022-05-03', '12:02:53', 'Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita menú principal, Visita perfil, Visita menú principal, Cierra sesión.', '2022-05-03', '12:14:09'),
(38, 4, '2022-05-03', '13:03:19', 'Inicia Sesión, Visita menú principal, Consulta estudiantes', NULL, NULL),
(39, 2, '2022-05-03', '13:48:26', 'Inicia Sesión, Visita menú principal, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Cierra sesión.', '2022-05-03', '14:06:22'),
(40, 5, '2022-05-03', '14:06:39', 'Inicia Sesión, Visita menú principal, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Cierra sesión.', '2022-05-03', '14:58:41'),
(41, 2, '2022-05-03', '14:58:46', 'Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita perfil, Visita menú principal, Cierra sesión.', '2022-05-03', '15:03:36'),
(42, 2, '2022-05-03', '15:03:42', 'Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita perfil, Visita menú principal, Cierra sesión.', '2022-05-03', '15:06:12'),
(43, 5, '2022-05-03', '15:06:29', 'Inicia Sesión, Visita menú principal, Visita perfil, Visita perfil, Visita perfil, Visita perfil,Se da de baja, Cierra sesión.', '2022-05-03', '15:11:16'),
(44, 2, '2022-05-03', '15:13:04', 'Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Cierra sesión.', '2022-05-03', '15:43:35'),
(45, 4, '2022-05-03', '16:24:51', 'Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal', NULL, NULL),
(46, 4, '2022-05-03', '16:28:32', 'Inicia Sesión, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal', NULL, NULL),
(47, 4, '2022-05-03', '16:43:16', 'Inicia Sesión, Visita menú principal, Consulta estudiantes, Visita menú principal, Cierra sesión.', '2022-05-03', '22:04:02'),
(48, 2, '2022-05-03', '22:17:23', 'Inicia Sesión, Visita menú principal, Cierra sesión.', '2022-05-03', '22:17:26'),
(49, 4, '2022-05-03', '22:17:32', 'Inicia Sesión, Visita menú principal, Cierra sesión.', '2022-05-03', '22:17:35'),
(50, 4, '2022-05-03', '22:17:54', 'Inicia Sesión, Visita menú principal, Cierra sesión.', '2022-05-03', '22:22:30'),
(51, 4, '2022-05-03', '22:22:44', 'Inicia Sesión, Visita menú principal, Cierra sesión.', '2022-05-03', '22:22:52'),
(52, 4, '2022-05-03', '22:23:20', 'Inicia Sesión, Visita menú principal, Cierra sesión.', '2022-05-03', '22:23:30'),
(53, 2, '2022-05-03', '22:23:41', 'Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Visita perfil, Visita menú principal, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita menú principal, Visita menú principal, Consulta estudiantes, Visita menú principal, Consulta estudiantes, Visita menú principal, Cierra sesión.', '2022-05-03', '22:46:27'),
(54, 4, '2022-05-03', '22:46:48', 'Inicia Sesión, Visita menú principal, Visita perfil,Se da de baja, Cierra sesión.', '2022-05-03', '22:47:01'),
(55, 1, '2022-05-03', '22:50:37', 'Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Consulta estudiantes, Visita menú principal, Consulta estudiantes, Visita menú principal, Visita menú principal', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carnet-patria`
--

CREATE TABLE `carnet-patria` (
  `idCarnet` int(11) NOT NULL,
  `Código_Carnet` varchar(10) NOT NULL,
  `Serial_Carnet` varchar(10) NOT NULL,
  `Cédula_Persona` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carnet-patria`
--

INSERT INTO `carnet-patria` (`idCarnet`, `Código_Carnet`, `Serial_Carnet`, `Cédula_Persona`) VALUES
(1, '1234567890', '1234567890', 'V26666666'),
(2, '1234567890', '1234567890', 'V11111111'),
(3, '1111111111', '2222222222', 'V27919566'),
(4, '3333333333', '4444444444', 'V25555555');

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

--
-- Volcado de datos para la tabla `contactos_auxiliares`
--

INSERT INTO `contactos_auxiliares` (`idContactoAuxiliar`, `Relación`, `Cédula_Persona`, `idRepresentante`) VALUES
(7, 'Vecino', 'V27919567', 3),
(10, 'ajshdvjasd', 'V25555555', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos-económicos`
--

CREATE TABLE `datos-económicos` (
  `idDatos-económicos` int(11) NOT NULL,
  `Banco` varchar(45) NOT NULL,
  `Tipo_Cuenta` varchar(45) NOT NULL,
  `Cta_Bancaria` varchar(45) NOT NULL,
  `idRepresentantes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datos-económicos`
--

INSERT INTO `datos-económicos` (`idDatos-económicos`, `Banco`, `Tipo_Cuenta`, `Cta_Bancaria`, `idRepresentantes`) VALUES
(1, 'Banco Provincial, S.A.', 'Corriente', '1351351351384135', 3),
(4, 'Banco Provincial, S.A.', 'Corriente', '11111111111111111111', 7);

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
(4, 'Desempleado', '', '', '', 3),
(7, 'Desempleado', '', '', '', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos-salud`
--

CREATE TABLE `datos-salud` (
  `idDatos-Médicos` int(11) NOT NULL,
  `Estatura` int(11) NOT NULL,
  `Peso` int(11) NOT NULL,
  `Índice` varchar(45) COLLATE utf8_bin NOT NULL,
  `Circ_Braquial` int(11) NOT NULL,
  `Lateralidad` varchar(45) COLLATE utf8_bin NOT NULL,
  `Tipo_Sangre` varchar(45) COLLATE utf8_bin NOT NULL,
  `médicación` varchar(50) COLLATE utf8_bin NOT NULL,
  `Dieta_Especial` varchar(50) COLLATE utf8_bin NOT NULL,
  `Enfermedad` varchar(50) COLLATE utf8_bin NOT NULL,
  `Impedimento_Físico` varchar(60) COLLATE utf8_bin NOT NULL,
  `Alergias` varchar(50) COLLATE utf8_bin NOT NULL,
  `Cond_Vista` varchar(45) COLLATE utf8_bin NOT NULL,
  `Cond_Dental` varchar(45) COLLATE utf8_bin NOT NULL,
  `Institución_médica` varchar(50) COLLATE utf8_bin NOT NULL,
  `Carnet_Discapacidad` varchar(20) COLLATE utf8_bin NOT NULL,
  `idEstudiantes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `datos-salud`
--

INSERT INTO `datos-salud` (`idDatos-Médicos`, `Estatura`, `Peso`, `Índice`, `Circ_Braquial`, `Lateralidad`, `Tipo_Sangre`, `médicación`, `Dieta_Especial`, `Enfermedad`, `Impedimento_Físico`, `Alergias`, `Cond_Vista`, `Cond_Dental`, `Institución_médica`, `Carnet_Discapacidad`, `idEstudiantes`) VALUES
(1, 1, 1, '1', 1, 'Diestro', 'AB-', 'hjgchjgch', 'hgchjgch', '', 'Motora, Escritura, Embarazo', 'cxhchgc', 'Regular', 'Mala', 'vjgcvjgcv', 'hgchgc', 6),
(10, 1, 1, '1', 1, 'Diestro', 'AB-', 'hjgchjgch', 'hgchjgch', '', 'Motora, Escritura, Embarazo', 'cxhchgc', 'Regular', 'Mala', 'vjgcvjgcv', 'hgchgc', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos-sociales`
--

CREATE TABLE `datos-sociales` (
  `idDatos-Sociales` int(11) NOT NULL,
  `Posee_Canaima` char(2) COLLATE utf8_bin NOT NULL,
  `Condición_Canaima` varchar(45) COLLATE utf8_bin NOT NULL,
  `Acceso_Internet` varchar(45) COLLATE utf8_bin NOT NULL,
  `Con_Quién_Vive` varchar(45) COLLATE utf8_bin NOT NULL,
  `idEstudiantes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `datos-sociales`
--

INSERT INTO `datos-sociales` (`idDatos-Sociales`, `Posee_Canaima`, `Condición_Canaima`, `Acceso_Internet`, `Con_Quién_Vive`, `idEstudiantes`) VALUES
(1, 'Si', 'Muy buenas Condiciones', 'Si', '', 6),
(9, 'Si', 'Muy buenas Condiciones', 'Si', '', 1);

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

--
-- Volcado de datos para la tabla `datos-tallas`
--

INSERT INTO `datos-tallas` (`idDatos-Tallas`, `Talla_Camisa`, `Talla_Pantalón`, `Talla_Zapatos`, `idEstudiantes`) VALUES
(1, '1', '1', '11', 6),
(5, '1', '1', '11', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos-vivienda`
--

CREATE TABLE `datos-vivienda` (
  `idDatos-vivienda` int(11) NOT NULL,
  `Condiciones_Vivienda` varchar(25) NOT NULL,
  `Tipo_Vivienda` varchar(25) NOT NULL,
  `Tenencia_Vivienda` varchar(25) NOT NULL,
  `idRepresentante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datos-vivienda`
--

INSERT INTO `datos-vivienda` (`idDatos-vivienda`, `Condiciones_Vivienda`, `Tipo_Vivienda`, `Tenencia_Vivienda`, `idRepresentante`) VALUES
(1, 'Buena', 'Casa', 'Propia', 3),
(2, 'Buena', 'Casa', 'Propia', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `idEstudiantes` int(11) NOT NULL,
  `Plantel_Procedencia` text COLLATE utf8_bin NOT NULL,
  `Con_Quién_Vive` varchar(25) COLLATE utf8_bin NOT NULL,
  `Cédula_Persona` varchar(15) COLLATE utf8_bin NOT NULL,
  `idRepresentante` int(11) NOT NULL,
  `Relación_Representante` varchar(20) COLLATE utf8_bin NOT NULL,
  `idPadre` int(11) NOT NULL,
  `Relación_Padre` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`idEstudiantes`, `Plantel_Procedencia`, `Con_Quién_Vive`, `Cédula_Persona`, `idRepresentante`, `Relación_Representante`, `idPadre`, `Relación_Padre`) VALUES
(1, 'asjbfkajsdbf', 'Solo', 'V26666666', 3, '', 1, ''),
(6, 'ahbsjdhavda', 'vjahsfdhavd', 'V11111111', 3, '', 2, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes-observaciones`
--

CREATE TABLE `estudiantes-observaciones` (
  `idObservaciones` int(11) NOT NULL,
  `Social` text DEFAULT NULL,
  `Físico` text DEFAULT NULL,
  `Personal` text DEFAULT NULL,
  `Familiar` text DEFAULT NULL,
  `Académico` text DEFAULT NULL,
  `Otra` text DEFAULT NULL,
  `idEstudiantes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes-repitentes`
--

CREATE TABLE `estudiantes-repitentes` (
  `idEstudiante-Repitente` int(11) NOT NULL,
  `Materias_Pendientes` varchar(50) COLLATE utf8_bin NOT NULL,
  `Año_Repetido` varchar(20) COLLATE utf8_bin NOT NULL,
  `Que_Materias_Repite` varchar(75) COLLATE utf8_bin NOT NULL,
  `idEstudiante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `estudiantes-repitentes`
--

INSERT INTO `estudiantes-repitentes` (`idEstudiante-Repitente`, `Materias_Pendientes`, `Año_Repetido`, `Que_Materias_Repite`, `idEstudiante`) VALUES
(1, 'Muchas', '', '', 6);

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

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`idGrado`, `Grado_A_Cursar`, `idEstudiantes`, `idAño-Escolar`) VALUES
(1, 'Primer año', 6, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Inscripciones`
--

CREATE TABLE `Inscripciones` (
  `idInscripciones` int(11) NOT NULL,
  `Fecha_Inscripción` varchar(12) COLLATE utf8_bin NOT NULL,
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
  `País_Residencia` varchar(25) COLLATE utf8_bin NOT NULL,
  `Cédula_Persona` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `padres`
--

INSERT INTO `padres` (`idPadres`, `País_Residencia`, `Cédula_Persona`) VALUES
(1, 'Venezuela', 'V25555555'),
(2, 'España', 'V27919566');

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
(5, 'Elber', 'Alonso', 'Rondón', 'Hernández', 'V27919566', '2001-05-05', 'Mérida', 'M', 'earh_2001@outlook.com', 'La Pedregosa Alta', 'Casado(a)'),
(10, 'Elber', 'Alonso', 'Rondón', 'Hernández', 'V27919567', '2001-05-05', 'Mérida', 'M', 'earh_2001@outlook.com', 'La Pedregosa Alta', 'S'),
(12, 'María', 'Gabriela', 'Ballestero', 'Rodríguez', 'V28636530', '2002-05-09', 'Caja Seca', 'F', 'mgbrodriguez952@gmail.com', 'Caja Seca', 'S'),
(13, 'Elber', 'Alonso', 'Rondón', 'Hernándes', 'V27555555', '2001-05-05', 'Mérida', 'M', 'earh_2001@outlook.com', 'La pedregosa', 'Soltero(a)'),
(14, 'Elber', 'Alonso', 'Rondón', 'Hernández', 'V25555555', '2001-05-05', '', 'M', 'ashjfd@sdbf', 'asjdhvadj', ''),
(17, 'Elber', 'Alonso', 'Rondón', 'Hernández', 'V26666666', '0000-00-00', 'Mérida', 'M', 'ashjfd@sdbf', 'asjdhvadj', 'Soltero(a)'),
(18, 'Hermenegildo', 'hgcajshgdcjh', 'gcjhgchjgchjgchj', 'gcjhgchjgc', 'V11111111', '1111-11-11', 'hgfvchgcjgfcx', 'M', 'jcjhg@sajhdfvsj', 'En su casa', 'Soltero(a)'),
(20, 'Elber', 'Alonso', 'Rondón', 'Hernández', 'V27919569', '2001-05-05', '', 'M', 'earh2001@outlook.com', '', ''),
(21, 'Elber', 'Alonso', 'Rondón', 'Hernández', 'E12345678', '2001-05-05', '', 'M', 'elber.alonso16@gmail.com', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `representantes`
--

CREATE TABLE `representantes` (
  `idRepresentantes` int(11) NOT NULL,
  `Grado_Académico` varchar(15) COLLATE utf8_bin NOT NULL,
  `Cédula_Persona` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `representantes`
--

INSERT INTO `representantes` (`idRepresentantes`, `Grado_Académico`, `Cédula_Persona`) VALUES
(3, 'Bachillerato', 'V27919566'),
(7, 'Bachillerato', 'V27555555');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teléfonos`
--

CREATE TABLE `teléfonos` (
  `idTeléfonos` int(11) NOT NULL,
  `Prefijo` varchar(4) DEFAULT NULL,
  `Número_Telefónico` varchar(10) DEFAULT NULL,
  `Relación_Teléfono` varchar(20) NOT NULL,
  `Cédula_Persona` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `teléfonos`
--

INSERT INTO `teléfonos` (`idTeléfonos`, `Prefijo`, `Número_Telefónico`, `Relación_Teléfono`, `Cédula_Persona`) VALUES
(19, '0416', '12345678', 'Principal', 'V27919566'),
(20, '0412', '87654321', 'Secundario', 'V27919566'),
(21, '0274', '12349587', 'Auxiliar', 'V27919566'),
(22, '0274', '12349587', 'Trabajo', 'V27919566'),
(23, '0416', '12345678', 'Principal', 'V27919567'),
(24, '0412', '87654321', 'Secundario', 'V27919567'),
(25, '0274', '12349587', 'Auxiliar', 'V27919567'),
(30, '0426', '8994472', 'Principal', 'V28636530'),
(31, '0412', '0763135', 'Secundario', 'V28636530'),
(32, '0274', '12349587', 'Auxiliar', 'V28636530'),
(33, '0274', '12349587', 'Trabajo', 'V28636530'),
(34, '0412', '3569252', 'Principal', 'V27555555'),
(35, '0416', '3569245', 'Secundario', 'V27555555'),
(36, '', '', 'Auxiliar', 'V27555555'),
(37, '', '', 'Trabajo', 'V27555555'),
(38, '0416', '12345678', 'Principal', 'V25555555'),
(39, '', '', 'Secundario', 'V25555555'),
(40, '0414', '51351123', 'Auxiliar', 'V25555555'),
(53, '0416', '12345678', 'Principal', 'V11111111'),
(54, '0412', '3569252', 'Secundario', 'V11111111'),
(55, '0416', '12345678', 'Principal', 'V26666666'),
(56, '0412', '3569252', 'Secundario', 'V26666666');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuarios` int(11) NOT NULL,
  `Clave` varchar(45) COLLATE utf8_bin NOT NULL,
  `Privilegios` int(11) NOT NULL,
  `Pregunta_Seg_1` text COLLATE utf8_bin NOT NULL,
  `Pregunta_Seg_2` text COLLATE utf8_bin NOT NULL,
  `Respuesta_1` text COLLATE utf8_bin NOT NULL,
  `Respuesta_2` text COLLATE utf8_bin NOT NULL,
  `Cédula_Persona` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuarios`, `Clave`, `Privilegios`, `Pregunta_Seg_1`, `Pregunta_Seg_2`, `Respuesta_1`, `Respuesta_2`, `Cédula_Persona`) VALUES
(1, '12345', 1, '1111111111', '11111111111', '11111111111111', '111111111111111111111', 'V28636530'),
(2, '12345', 2, 'Ciudad donde naciste', 'Color que más te gusta', 'Mérida', 'Azul', 'V27919566'),
(11, 'Clave_01', 2, 'Ciudad donde naciste', 'Color que más te gusta', 'Mérida', 'Azul', 'V27919569'),
(12, 'Clave_02', 2, 'Color que más te gusta', 'Azul', '¿Cuál fue tu primer número de Teléfono?', '04163569245', 'E12345678');

--
-- Índices para tablas volcadas
--

--
-- Índices de la tabla `año-escolar`
--
ALTER TABLE `año-escolar`
  ADD PRIMARY KEY (`idAño-Escolar`);

--
-- Índices de la tabla `bitácora`
--
ALTER TABLE `bitácora`
  ADD PRIMARY KEY (`idbitácora`),
  ADD KEY `fk_usuarios_bitácora` (`idUsuarios`);

--
-- Índices de la tabla `carnet-patria`
--
ALTER TABLE `carnet-patria`
  ADD PRIMARY KEY (`idCarnet`),
  ADD KEY `fk_personas_carnet` (`Cédula_Persona`);

--
-- Índices de la tabla `contactos_auxiliares`
--
ALTER TABLE `contactos_auxiliares`
  ADD PRIMARY KEY (`idContactoAuxiliar`,`idRepresentante`),
  ADD KEY `fk_representantes_auxiliares` (`idRepresentante`),
  ADD KEY `fk_personas_auxiliares` (`Cédula_Persona`);

--
-- Índices de la tabla `datos-económicos`
--
ALTER TABLE `datos-económicos`
  ADD PRIMARY KEY (`idDatos-económicos`,`idRepresentantes`),
  ADD KEY `fk_datos-económicos_representantes1_idx` (`idRepresentantes`);

--
-- Índices de la tabla `datos-laborales`
--
ALTER TABLE `datos-laborales`
  ADD PRIMARY KEY (`idDatos-laborales`,`idRepresentantes`),
  ADD KEY `fk_datos-laborales_representantes1_idx` (`idRepresentantes`);

--
-- Índices de la tabla `datos-salud`
--
ALTER TABLE `datos-salud`
  ADD PRIMARY KEY (`idDatos-Médicos`,`idEstudiantes`),
  ADD KEY `idUsuarios_idx` (`idEstudiantes`);

--
-- Índices de la tabla `datos-sociales`
--
ALTER TABLE `datos-sociales`
  ADD PRIMARY KEY (`idDatos-Sociales`,`idEstudiantes`),
  ADD KEY `idEstudiantes_idx` (`idEstudiantes`);

--
-- Índices de la tabla `datos-tallas`
--
ALTER TABLE `datos-tallas`
  ADD PRIMARY KEY (`idDatos-Tallas`,`idEstudiantes`),
  ADD KEY `idEstudiantes_idx` (`idEstudiantes`);

--
-- Índices de la tabla `datos-vivienda`
--
ALTER TABLE `datos-vivienda`
  ADD PRIMARY KEY (`idDatos-vivienda`),
  ADD KEY `fk_representantes_vivienda` (`idRepresentante`);

--
-- Índices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`idEstudiantes`,`Cédula_Persona`,`idRepresentante`,`idPadre`),
  ADD KEY `Cédula_Persona_idx` (`Cédula_Persona`),
  ADD KEY `id_Representante_idx` (`idRepresentante`),
  ADD KEY `fk_estudiantes_padres1_idx` (`idPadre`);

--
-- Índices de la tabla `estudiantes-observaciones`
--
ALTER TABLE `estudiantes-observaciones`
  ADD PRIMARY KEY (`idObservaciones`),
  ADD KEY `fk_estudiantes_observaciones` (`idEstudiantes`);

--
-- Índices de la tabla `estudiantes-repitentes`
--
ALTER TABLE `estudiantes-repitentes`
  ADD PRIMARY KEY (`idEstudiante-Repitente`,`idEstudiante`),
  ADD KEY `idEstudiantes_idx` (`idEstudiante`);

--
-- Índices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`idGrado`,`idEstudiantes`,`idAño-Escolar`),
  ADD KEY `idEstudiante_idx` (`idEstudiantes`),
  ADD KEY `fk_Año-Escolar_Grado` (`idAño-Escolar`);

--
-- Índices de la tabla `Inscripciones`
--
ALTER TABLE `Inscripciones`
  ADD PRIMARY KEY (`idInscripciones`,`idUsuario`,`idEstudiante`),
  ADD KEY `idEstudiante_idx` (`idEstudiante`),
  ADD KEY `idUsuarios_idx` (`idUsuario`);

--
-- Índices de la tabla `padres`
--
ALTER TABLE `padres`
  ADD PRIMARY KEY (`idPadres`,`Cédula_Persona`),
  ADD UNIQUE KEY `Cédula_Persona_UNIQUE` (`Cédula_Persona`),
  ADD KEY `Cédula_Persona_idx` (`Cédula_Persona`);

--
-- Índices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`idPersonas`),
  ADD UNIQUE KEY `Cédula_UNIQUE` (`Cédula`);

--
-- Índices de la tabla `representantes`
--
ALTER TABLE `representantes`
  ADD PRIMARY KEY (`idRepresentantes`),
  ADD KEY `fk_personas_representantes` (`Cédula_Persona`);

--
-- Índices de la tabla `teléfonos`
--
ALTER TABLE `teléfonos`
  ADD PRIMARY KEY (`idTeléfonos`),
  ADD KEY `fk_personas_teléfonos` (`Cédula_Persona`);

--
-- Índices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuarios`),
  ADD KEY `Cédula_Persona_idx` (`Cédula_Persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `año-escolar`
--
ALTER TABLE `año-escolar`
  MODIFY `idAño-Escolar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `bitácora`
--
ALTER TABLE `bitácora`
  MODIFY `idbitácora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `carnet-patria`
--
ALTER TABLE `carnet-patria`
  MODIFY `idCarnet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `contactos_auxiliares`
--
ALTER TABLE `contactos_auxiliares`
  MODIFY `idContactoAuxiliar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `datos-económicos`
--
ALTER TABLE `datos-económicos`
  MODIFY `idDatos-económicos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `datos-laborales`
--
ALTER TABLE `datos-laborales`
  MODIFY `idDatos-laborales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `datos-salud`
--
ALTER TABLE `datos-salud`
  MODIFY `idDatos-Médicos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `datos-sociales`
--
ALTER TABLE `datos-sociales`
  MODIFY `idDatos-Sociales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `datos-tallas`
--
ALTER TABLE `datos-tallas`
  MODIFY `idDatos-Tallas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `datos-vivienda`
--
ALTER TABLE `datos-vivienda`
  MODIFY `idDatos-vivienda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `idEstudiantes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `estudiantes-observaciones`
--
ALTER TABLE `estudiantes-observaciones`
  MODIFY `idObservaciones` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estudiantes-repitentes`
--
ALTER TABLE `estudiantes-repitentes`
  MODIFY `idEstudiante-Repitente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `idGrado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `Inscripciones`
--
ALTER TABLE `Inscripciones`
  MODIFY `idInscripciones` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `padres`
--
ALTER TABLE `padres`
  MODIFY `idPadres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `idPersonas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `representantes`
--
ALTER TABLE `representantes`
  MODIFY `idRepresentantes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `teléfonos`
--
ALTER TABLE `teléfonos`
  MODIFY `idTeléfonos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carnet-patria`
--
ALTER TABLE `carnet-patria`
  ADD CONSTRAINT `fk_personas_carnet` FOREIGN KEY (`Cédula_Persona`) REFERENCES `personas` (`Cédula`);

--
-- Filtros para la tabla `contactos_auxiliares`
--
ALTER TABLE `contactos_auxiliares`
  ADD CONSTRAINT `fk_personas_auxiliares` FOREIGN KEY (`Cédula_Persona`) REFERENCES `personas` (`Cédula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_representantes_auxiliares` FOREIGN KEY (`idRepresentante`) REFERENCES `representantes` (`idRepresentantes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datos-económicos`
--
ALTER TABLE `datos-económicos`
  ADD CONSTRAINT `fk_datos-económicos_representantes1` FOREIGN KEY (`idRepresentantes`) REFERENCES `representantes` (`idRepresentantes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datos-laborales`
--
ALTER TABLE `datos-laborales`
  ADD CONSTRAINT `fk_datos-laborales_representantes1` FOREIGN KEY (`idRepresentantes`) REFERENCES `representantes` (`idRepresentantes`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `datos-salud`
--
ALTER TABLE `datos-salud`
  ADD CONSTRAINT `fk_Estudiantes_Datos-Médicos` FOREIGN KEY (`idEstudiantes`) REFERENCES `estudiantes` (`idEstudiantes`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Filtros para la tabla `datos-vivienda`
--
ALTER TABLE `datos-vivienda`
  ADD CONSTRAINT `fk_representantes_vivienda` FOREIGN KEY (`idRepresentante`) REFERENCES `representantes` (`idRepresentantes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `fk_Personas_Estudiantes` FOREIGN KEY (`Cédula_Persona`) REFERENCES `personas` (`Cédula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Representantes_Estudiantes` FOREIGN KEY (`idRepresentante`) REFERENCES `representantes` (`idRepresentantes`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_estudiantes_padres1` FOREIGN KEY (`idPadre`) REFERENCES `padres` (`idPadres`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `estudiantes-observaciones`
--
ALTER TABLE `estudiantes-observaciones`
  ADD CONSTRAINT `fk_estudiantes_observaciones` FOREIGN KEY (`idEstudiantes`) REFERENCES `estudiantes` (`idEstudiantes`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Filtros para la tabla `Inscripciones`
--
ALTER TABLE `Inscripciones`
  ADD CONSTRAINT `fk_Estudiantes_Inscripciones` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiantes` (`idEstudiantes`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Usuarios_Inscripciones` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuarios`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `padres`
--
ALTER TABLE `padres`
  ADD CONSTRAINT `Cédula_Persona` FOREIGN KEY (`Cédula_Persona`) REFERENCES `personas` (`Cédula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `representantes`
--
ALTER TABLE `representantes`
  ADD CONSTRAINT `fk_personas_representantes` FOREIGN KEY (`Cédula_Persona`) REFERENCES `personas` (`Cédula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `teléfonos`
--
ALTER TABLE `teléfonos`
  ADD CONSTRAINT `fk_personas_teléfonos` FOREIGN KEY (`Cédula_Persona`) REFERENCES `personas` (`Cédula`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_personas_usuarios` FOREIGN KEY (`Cédula_Persona`) REFERENCES `personas` (`Cédula`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
