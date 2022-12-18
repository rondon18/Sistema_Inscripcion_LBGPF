-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-07-2022 a las 06:48:03
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `si_lbgpf`
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
  `id_bitacora` int(11) NOT NULL,
  `idUsuarios` int(11) NOT NULL,
  `fechaInicioSesión` date NOT NULL,
  `horaInicioSesión` time NOT NULL,
  `linksVisitados` text NOT NULL,
  `fechaFinalSesión` date DEFAULT NULL,
  `horaFinalSesión` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bitácora`
--

INSERT INTO `bitácora` (`id_bitacora`, `idUsuarios`, `fechaInicioSesión`, `horaInicioSesión`, `linksVisitados`, `fechaFinalSesión`, `horaFinalSesión`) VALUES
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
(35, 4, '2022-05-02', '16:14:55', 'Inicia Sesión, Visita menú principal, Consulta estudiantes, Visita menú principal, Cierra sesión.', '2022-05-04', '01:20:02'),
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
(55, 1, '2022-05-03', '22:50:37', 'Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Consulta estudiantes, Visita menú principal, Consulta estudiantes, Visita menú principal, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita perfil, Visita menú principal, Visita menú principal, Consulta estudiantes, Visita menú principal, Cierra sesión.', '2022-05-08', '00:59:26'),
(56, 2, '2022-05-04', '01:20:06', 'Inicia Sesión, Visita menú principal, Cierra sesión.', '2022-05-04', '01:34:51'),
(57, 1, '2022-05-04', '01:34:55', 'Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes', NULL, NULL),
(58, 1, '2022-05-04', '07:10:27', 'Inicia Sesión, Visita menú principal', NULL, NULL),
(59, 2, '2022-05-04', '08:57:23', 'Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Visita menú principal, Consulta estudiantes', NULL, NULL),
(60, 1, '2022-05-04', '15:46:06', 'Inicia Sesión, Visita menú principal', NULL, NULL),
(61, 1, '2022-05-05', '07:31:24', 'Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Cierra sesión.', '2022-05-05', '08:37:41'),
(62, 12, '2022-05-05', '08:38:20', 'Inicia Sesión, Visita menú principal, Visita perfil, Visita perfil, Visita menú principal, Visita perfil,Se da de baja, Visita perfil, Visita perfil,Se da de baja, Visita perfil, Visita perfil, Visita perfil, Visita perfil, Visita perfil,Se da de baja,Se da de baja, Cierra sesión.', '2022-05-05', '08:43:06'),
(63, 1, '2022-05-05', '08:43:16', 'Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita perfil', NULL, NULL),
(64, 13, '2022-05-05', '18:30:54', 'Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Visita menú principal, Cierra sesión.', '2022-05-05', '18:50:07'),
(65, 13, '2022-05-05', '18:52:19', 'Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Visita perfil, Visita menú principal, Visita perfil, Visita menú principal, Visita perfil', NULL, NULL),
(66, 1, '2022-05-06', '05:53:57', 'Inicia Sesión, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal', NULL, NULL),
(67, 2, '2022-05-06', '20:47:35', 'Inicia Sesión, Visita menú principal, Cierra sesión.', '2022-05-06', '21:57:21'),
(68, 1, '2022-05-06', '21:57:30', 'Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Elimina un usuario, Elimina un usuario, Elimina un usuario, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes', NULL, NULL),
(69, 1, '2022-05-07', '17:50:54', 'Inicia Sesión, Visita menú principal, Visita menú principal', NULL, NULL),
(70, 1, '2022-05-08', '01:08:34', 'Inicia Sesión, Visita menú principal, Consulta estudiantes', NULL, NULL),
(71, 1, '2022-05-08', '01:59:41', 'Inicia Sesión, Visita menú principal, Cierra sesión.', '2022-05-08', '02:00:26'),
(72, 1, '2022-05-08', '02:00:31', 'Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita perfil, Visita menú principal, Cierra Sesión.', '2022-05-08', '02:43:35'),
(73, 1, '2022-05-08', '02:43:40', 'Inicia Sesión, Visita menú principal, Cierra Sesión.', '2022-05-08', '02:46:55'),
(74, 1, '2022-05-08', '19:47:13', 'Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Consulta estudiantes, Visita menú principal, Visita menú principal, Visita menú principal, Consulta estudiantes', NULL, NULL),
(75, 1, '2022-05-09', '12:40:06', 'Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita perfil, Visita menú principal, Visita perfil, Visita perfil', NULL, NULL),
(76, 1, '2022-05-09', '13:03:38', 'Inicia Sesión, Visita menú principal, Visita menú principal, Consulta estudiantes, Visita menú principal, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Consulta estudiantes, Visita menú principal, Visita perfil, Visita perfil, Visita perfil, Visita menú principal, Cierra Sesión.', '2022-05-10', '08:36:42'),
(77, 1, '2022-05-10', '08:36:48', 'Inicia Sesión, Visita menú principal, Consulta estudiantes, Visita menú principal, Consulta estudiantes, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal', NULL, NULL),
(78, 1, '2022-05-10', '19:02:27', 'Inicia Sesión, Visita menú principal, Visita menú principal, Consulta estudiantes, Visita menú principal, Visita menú principal, Consulta estudiantes, Visita menú principal, Visita perfil, Visita menú principal, Visita perfil, Visita menú principal', NULL, NULL),
(79, 1, '2022-05-10', '21:43:07', 'Inicia Sesión, Visita menú principal, Visita perfil, Visita perfil, Visita menú principal, Visita perfil, Visita menú principal', NULL, NULL),
(80, 1, '2022-05-10', '21:50:57', 'Inicia Sesión, Visita menú principal, Visita menú principal, Visita perfil, Visita menú principal, Visita menú principal, Visita menú principal, Visita perfil, Visita menú principal, Visita menú principal, Visita menú principal, Cierra Sesión.', '2022-05-11', '02:49:19'),
(81, 15, '2022-05-11', '02:59:23', 'Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Cierra Sesión.', '2022-05-11', '02:59:32'),
(82, 14, '2022-05-11', '03:00:11', 'Inicia Sesión, Visita menú principal, Visita perfil, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita menú principal, Visita perfil, Visita menú principal, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Visita perfil, Visita perfil', NULL, NULL),
(83, 1, '2022-05-11', '08:37:37', 'Inicia Sesión, Visita menú principal', NULL, NULL),
(84, 1, '2022-05-15', '05:17:17', 'Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes', NULL, NULL),
(85, 1, '2022-05-15', '18:53:17', 'Inicia Sesión, Visita menú principal, Consulta estudiantes', NULL, NULL),
(86, 1, '2022-05-15', '19:19:11', 'Inicia Sesión, Visita menú principal, Consulta estudiantes', NULL, NULL),
(87, 1, '2022-05-15', '23:45:41', 'Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes', NULL, NULL),
(88, 1, '2022-05-16', '07:42:20', 'Inicia Sesión, Visita menú principal', NULL, NULL),
(89, 1, '2022-05-16', '15:40:40', 'Inicia Sesión, Visita menú principal, Consulta estudiantes', NULL, NULL),
(90, 1, '2022-05-16', '19:48:27', 'Inicia Sesión, Visita menú principal, Consulta estudiantes', NULL, NULL),
(91, 1, '2022-05-16', '22:19:35', 'Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes', NULL, NULL),
(92, 1, '2022-05-17', '17:35:29', 'Inicia Sesión, Visita menú principal, Consulta estudiantes', NULL, NULL),
(93, 1, '2022-05-17', '18:36:32', 'Inicia Sesión, Visita menú principal, Consulta estudiantes', NULL, NULL),
(94, 1, '2022-05-18', '22:27:13', 'Inicia Sesión, Visita menú principal, Consulta estudiantes,Registra un estudiante, Consulta estudiantes,Registra un estudiante, Consulta estudiantes, Consulta estudiantes,Registra un estudiante, Consulta estudiantes', NULL, NULL),
(95, 1, '2022-05-19', '16:51:01', 'Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes', NULL, NULL),
(96, 1, '2022-05-19', '18:26:49', 'Inicia Sesión, Visita menú principal', NULL, NULL),
(97, 1, '2022-05-21', '11:05:42', 'Inicia Sesión, Visita menú principal', NULL, NULL),
(98, 1, '2022-06-22', '22:03:38', 'Inicia Sesión, Visita menú principal', NULL, NULL),
(99, 14, '2022-07-14', '12:43:05', 'Inicia Sesión, Visita menú principal, Consulta estudiantes, Visita menú principal, Visita perfil, Visita menú principal, Visita menú principal, Consulta estudiantes, Consulta estudiantes', NULL, NULL),
(100, 14, '2022-07-16', '00:31:56', 'Inicia Sesión, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal', NULL, NULL),
(101, 14, '2022-07-19', '22:26:37', 'Inicia Sesión, Visita menú principal, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Consulta estudiantes, Visita menú principal,Registra un estudiante, Consulta estudiantes, Consulta estudiantes, Visita menú principal, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Consulta estudiantes, Visita menú principal,Registra un estudiante, Consulta estudiantes, Consulta estudiantes', NULL, NULL);

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
(3, '1111111111', '2222222222', 'V27919566'),
(18, '8543654868', '3541854354', 'V27555555'),
(20, '5413584384', '8436685463', 'E45678912'),
(22, '6541358484', '8435438434', 'V54138415'),
(24, '6541358484', '8435438434', 'V54138416'),
(25, '', '', 'V15453234'),
(27, '', '', 'V27888000');

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
(14, 'Vecino', 'V25555555', 16),
(18, 'Sobrina', 'V85413548', 17),
(19, 'Vecino', 'V33333333', 19);

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
(12, 'Banco del Tesoro, C.A.', 'Corriente', '64535435843543846354', 16),
(13, 'Banco Mercantil, C.A', 'Corriente', '41385418435348843584', 17),
(15, 'Banco Plaza C.A.', 'Corriente', '00000000000000000000', 19);

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
(15, 'Electrical Engineer', '4 Mesta Hill', '3', 'Diaria', 16),
(16, 'Desempleado', '', '', '', 17),
(18, 'Chef', 'erffdgdfgdfgfdgdfgdfg', '56', 'Mensual', 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos-laborales-madres`
--

CREATE TABLE `datos-laborales-madres` (
  `idDatos-laboralesMa` int(11) NOT NULL,
  `Empleo` varchar(45) NOT NULL,
  `Lugar_Trabajo` varchar(45) NOT NULL,
  `Remuneración` varchar(45) NOT NULL,
  `Tipo_Remuneración` varchar(45) NOT NULL,
  `idMadre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datos-laborales-madres`
--

INSERT INTO `datos-laborales-madres` (`idDatos-laboralesMa`, `Empleo`, `Lugar_Trabajo`, `Remuneración`, `Tipo_Remuneración`, `idMadre`) VALUES
(1, 'Mesera', 'No se un lugarxd', '99', 'Semanal', 1),
(7, 'Desempleado', '', '', '', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos-laborales-padres`
--

CREATE TABLE `datos-laborales-padres` (
  `idDatos-laboralesPa` int(11) NOT NULL,
  `Empleo` varchar(45) NOT NULL,
  `Lugar_Trabajo` varchar(45) NOT NULL,
  `Remuneración` varchar(45) NOT NULL,
  `Tipo_Remuneración` varchar(45) NOT NULL,
  `idPadre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datos-laborales-padres`
--

INSERT INTO `datos-laborales-padres` (`idDatos-laboralesPa`, `Empleo`, `Lugar_Trabajo`, `Remuneración`, `Tipo_Remuneración`, `idPadre`) VALUES
(1, 'Albañil', 'No se un lugar', '7', 'Diaria', 2),
(2, 'Repartidor', 'Pizza Hut', '8', 'Quincenal', 13),
(4, 'ttttttttttttttttttttttttttttt', 'nkjnljjljkjjlkdlvjlsdkjv', '54', 'Semanal', 16);

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
  `Vacunado` varchar(50) COLLATE utf8_bin NOT NULL,
  `Vacuna` varchar(50) COLLATE utf8_bin NOT NULL,
  `Dosis` int(11) NOT NULL,
  `Lote` varchar(15) COLLATE utf8_bin NOT NULL,
  `Dieta_Especial` varchar(50) COLLATE utf8_bin NOT NULL,
  `Enfermedad` varchar(50) COLLATE utf8_bin NOT NULL,
  `Impedimento_Físico` varchar(90) COLLATE utf8_bin NOT NULL,
  `Necesidad_educativa` varchar(60) COLLATE utf8_bin NOT NULL,
  `Cond_Vista` varchar(45) COLLATE utf8_bin NOT NULL,
  `Cond_Dental` varchar(45) COLLATE utf8_bin NOT NULL,
  `Institución_Médica` varchar(50) COLLATE utf8_bin NOT NULL,
  `Carnet_Discapacidad` varchar(20) COLLATE utf8_bin NOT NULL,
  `idEstudiantes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `datos-salud`
--

INSERT INTO `datos-salud` (`idDatos-Médicos`, `Estatura`, `Peso`, `Índice`, `Circ_Braquial`, `Lateralidad`, `Tipo_Sangre`, `Vacunado`, `Vacuna`, `Dosis`, `Lote`, `Dieta_Especial`, `Enfermedad`, `Impedimento_Físico`, `Necesidad_educativa`, `Cond_Vista`, `Cond_Dental`, `Institución_Médica`, `Carnet_Discapacidad`, `idEstudiantes`) VALUES
(20, 175, 40, '5135', 25, 'Diestro', 'A+', 'Si', 'AstraZeneca', 0, 'D12345678901234', '', '', 'Visual, Motora, Auditiva, Escritura, Lectura, Lenguaje, Embarazo, Educativa especial', 'Motriz', 'Buena', 'Buena', '', '', 15),
(24, 175, 40, '5135', 25, 'Diestro', 'A+', '', '', 0, '', '', '', 'Visual, Motora, Auditiva, Escritura, Lectura, Lenguaje, Embarazo, Educ', '', 'Buena', 'Buena', '', '', 17),
(26, 44, 33, '66', 222, 'Ambidextro', 'A-', 'Si', 'Aztrazeneca', 45, 'D35809348509834', '', '', 'Visual, Motora, Auditiva, Escritura, Lectura, Lenguaje, Embarazo, Educativa especial', 'yyyyyyyyyyyyyyy', 'Regular', 'Regular', '', '', 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos-sociales`
--

CREATE TABLE `datos-sociales` (
  `idDatos-Sociales` int(11) NOT NULL,
  `Posee_Canaima` char(2) COLLATE utf8_bin NOT NULL,
  `Condición_Canaima` varchar(45) COLLATE utf8_bin NOT NULL,
  `Acceso_Internet` varchar(45) COLLATE utf8_bin NOT NULL,
  `idEstudiantes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `datos-sociales`
--

INSERT INTO `datos-sociales` (`idDatos-Sociales`, `Posee_Canaima`, `Condición_Canaima`, `Acceso_Internet`, `idEstudiantes`) VALUES
(17, 'Si', 'Buenas Condiciones', 'Si', 15),
(19, 'No', 'Malas Condiciones', 'Si', 17),
(21, 'Si', 'Muy malas Condiciones', 'No', 19);

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
(13, 'M', '30', '37', 15),
(16, 'M', '30', '37', 17),
(18, '65', '44', '23', 19);

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
(10, 'Regular', 'Rancho', 'Alquilada', 16),
(11, 'Regular', 'Casa', 'Propia', 17),
(12, 'Regular', 'Apartamento', '', 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos-vivienda-madres`
--

CREATE TABLE `datos-vivienda-madres` (
  `idDatos-viviendaMa` int(11) NOT NULL,
  `Condiciones_Vivienda` varchar(25) NOT NULL,
  `Tipo_Vivienda` varchar(25) NOT NULL,
  `Tenencia_Vivienda` varchar(25) NOT NULL,
  `idMadre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datos-vivienda-madres`
--

INSERT INTO `datos-vivienda-madres` (`idDatos-viviendaMa`, `Condiciones_Vivienda`, `Tipo_Vivienda`, `Tenencia_Vivienda`, `idMadre`) VALUES
(1, 'Buena', 'Apartamento', 'Propia', 1),
(2, 'Regular', 'Rancho', 'Otro', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos-vivienda-padres`
--

CREATE TABLE `datos-vivienda-padres` (
  `idDatos-viviendaPa` int(11) NOT NULL,
  `Condiciones_Vivienda` varchar(25) NOT NULL,
  `Tipo_Vivienda` varchar(25) NOT NULL,
  `Tenencia_Vivienda` varchar(25) NOT NULL,
  `idPadre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datos-vivienda-padres`
--

INSERT INTO `datos-vivienda-padres` (`idDatos-viviendaPa`, `Condiciones_Vivienda`, `Tipo_Vivienda`, `Tenencia_Vivienda`, `idPadre`) VALUES
(1, 'Buena', 'Casa', 'Alquilada', 2),
(2, 'Mala', 'Apartamento', 'Alquilada', 13),
(4, 'Buena', 'Apartamento', 'Prestada', 16);

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
  `idMadre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`idEstudiantes`, `Plantel_Procedencia`, `Con_Quién_Vive`, `Cédula_Persona`, `idRepresentante`, `Relación_Representante`, `idPadre`, `idMadre`) VALUES
(15, 'Eastern Connecticut State University', 'Padre', 'V54138415', 17, 'Abuela', 13, 1),
(17, 'Eastern Connecticut State University', 'Padre', 'V54138416', 17, 'Abuela', 13, 1),
(19, 'dkjhvlkzsjhjvhxkjldvhv', 'yyyyyyyy', 'V27888000', 19, 'Tía', 16, 3);

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

--
-- Volcado de datos para la tabla `estudiantes-observaciones`
--

INSERT INTO `estudiantes-observaciones` (`idObservaciones`, `Social`, `Físico`, `Personal`, `Familiar`, `Académico`, `Otra`, `idEstudiantes`) VALUES
(7, 'jdkhfjkjzlxkcnjkzkkjnckldjkfjslnjksndjflbsjdbfjkdskjbjfbjsdjkfadbsjkfbjksbhdfkbabsjdfhabshdfhbhkasbhdfbksfbhbshkjdbfkadsbhfbhasbdhfbjsakbhdfbkjasbjdfk', 'jdkhfjkjzlxkcnjkzkkjnckldjkfjslnjksndjflbsjdbfjkdskjbjfbjsdjkfadbsjkfbjksbhdfkbabsjdfhabshdfhbhkasbhdfbksfbhbshkjdbfkadsbhfbhasbdhfbjsakbhdfbkjasbjdfk', 'jdkhfjkjzlxkcnjkzkkjnckldjkfjslnjksndjflbsjdbfjkdskjbjfbjsdjkfadbsjkfbjksbhdfkbabsjdfhabshdfhbhkasbhdfbksfbhbshkjdbfkadsbhfbhasbdhfbjsakbhdfbkjasbjdfk', 'jdkhfjkjzlxkcnjkzkkjnckldjkfjslnjksndjflbsjdbfjkdskjbjfbjsdjkfadbsjkfbjksbhdfkbabsjdfhabshdfhbhkasbhdfbksfbhbshkjdbfkadsbhfbhasbdhfbjsakbhdfbkjasbjdfk', 'jdkhfjkjzlxkcnjkzkkjnckldjkfjslnjksndjflbsjdbfjkdskjbjfbjsdjkfadbsjkfbjksbhdfkbabsjdfhabshdfhbhkasbhdfbksfbhbshkjdbfkadsbhfbhasbdhfbjsakbhdfbkjasbjdfk', 'jdkhfjkjzlxkcnjkzkkjnckldjkfjslnjksndjflbsjdbfjkdskjbjfbjsdjkfadbsjkfbjksbhdfkbabsjdfhabshdfhbhkasbhdfbksfbhbshkjdbfkadsbhfbhasbdhfbjsakbhdfbkjasbjdfk', 15),
(9, 'No socializa mucho', '', '', '', 'Adelantó un año', 'Deficit de atención', 17),
(11, '', '', '', '', '', '', 19);

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
(10, '', '', '', 15),
(15, 'Inglés y Matematica', 'Segundo año', 'Inglés y Matematica', 17),
(16, '', '', '', 17),
(17, '', '', '', 17),
(18, '', '', '', 17),
(20, '', '', '', 19);

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
(13, 'Cuarto año', 15, 12),
(15, 'Quinto año', 17, 12),
(17, 'Tercer año', 19, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

CREATE TABLE `inscripciones` (
  `idInscripciones` int(11) NOT NULL,
  `Fecha_Inscripción` varchar(12) COLLATE utf8_bin NOT NULL,
  `Hora_Inscripción` varchar(12) COLLATE utf8_bin NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idEstudiante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `inscripciones`
--

INSERT INTO `inscripciones` (`idInscripciones`, `Fecha_Inscripción`, `Hora_Inscripción`, `idUsuario`, `idEstudiante`) VALUES
(2, '2022-07-20', '11:13:26pm', 14, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `madre`
--

CREATE TABLE `madre` (
  `idMadre` int(11) NOT NULL,
  `País_Residencia` varchar(25) COLLATE utf8_bin NOT NULL,
  `Grado_Académico` varchar(15) COLLATE utf8_bin NOT NULL,
  `Cédula_Persona` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `madre`
--

INSERT INTO `madre` (`idMadre`, `País_Residencia`, `Grado_Académico`, `Cédula_Persona`) VALUES
(1, 'Venezuela', '', 'V13456324'),
(3, 'Grecia', '', 'V43434343');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padre`
--

CREATE TABLE `padre` (
  `idPadre` int(11) NOT NULL,
  `País_Residencia` varchar(25) COLLATE utf8_bin NOT NULL,
  `Grado_Académico` varchar(15) COLLATE utf8_bin NOT NULL,
  `Cédula_Persona` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `padre`
--

INSERT INTO `padre` (`idPadre`, `País_Residencia`, `Grado_Académico`, `Cédula_Persona`) VALUES
(2, 'España', '', 'V27919566'),
(9, 'Venezuela', '', 'Cédula_P'),
(13, 'Venezuela', '', 'V87354354'),
(14, 'Venezuela', '', 'V65434684'),
(16, 'Venezuela', 'Primaria', 'V65656565');

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
(12, 'María', 'Gabriela', 'Ballestero', 'Rodríguez', 'V28636530', '2002-05-09', '', 'F', 'mgbrodriguez952@gmail.com', '', ''),
(22, 'Carlos', 'Enrique', 'Goméz', 'Lopez', 'E14635135', '2002-05-05', '', 'M', 'earh2001@outlook.com', '', ''),
(53, 'Alphonse', 'Harlie', 'Stean', 'Hernández', 'V27555555', '1995-11-01', '28888 David Parkway', 'M', 'ffetherstonhaugh0@microsoft.com', '05 Menomonie Plaza', 'Soltero(a)'),
(54, 'Revkah', 'Ferrell', 'Abrey', 'Hernández', 'V25555555', '1995-11-01', '28888 David Parkway', 'M', 'kgratten0@webmd.com', '36696 Petterle Trail', 'Soltero(a)'),
(55, 'Primer_Nombre_R', 'Segundo_Nombre_R', 'Primer_Apellido_R', 'Segundo_Apellido_R', 'Cédula_P', '0000-00-00', 'Lugar_Nacimiento_R', 'Género_R', 'Correo_electrónico_R', 'Dirección_R', 'Estado_Civil_R'),
(57, 'María', 'Elena', 'González', 'González', 'V17341885', '1989-12-21', '', 'F', 'maryg280@gmail.com', '', 'Soltero(a)'),
(58, 'Elsbeth', 'Tressa', 'Housaman', 'Kleiner', 'E12345678', '1973-03-21', '', 'F', 'tkleiner2@odnoklassniki.ru', '', 'Casado(a)'),
(59, 'Amalia', 'Nerita', 'Venable', 'Bygraves', 'E45678912', '1985-11-12', '16817 Nevada Street', 'F', 'nbygraves6@seesaa.net', '16817 Nevada Street', 'Casado(a)'),
(69, 'Tildy', 'Elsbeth', 'Quickenden', 'Allmen', 'V85413548', '1985-11-12', '16817 Nevada Street', 'F', 'tquickenden8@prlog.org', '416 Prairie Rose Hill', 'Casado(a)'),
(70, 'Jordon', 'Emery', 'Peffer', 'Renad', 'V87354354', '1995-01-01', '59 Forest Run Junction', 'M', 'erenadrm@jigsy.com', '59 Forest Run Junction', 'Casado(a)'),
(71, 'Codi', 'Fonsie', 'Scallon', 'Widocks', 'V54138415', '2007-12-01', '83657 Corscot Way', 'M', 'cscallona@slashdot.org', '15213 Elmside Point\r\n', 'Soltero(a)'),
(72, 'Dex', 'Leicester', 'Vinker', 'Lawler', 'V65434684', '1987-02-01', '86341 Vernon Junction', 'M', 'llawlerm@webnode.com', '86341 Vernon Junction', 'Casado(a)'),
(74, 'Codiman', 'Fonsie', 'Scallon', 'Widocks', 'V54138416', '2007-12-01', '83657 Corscot Way', 'M', 'cscallona@slashdot.org', '15213 Elmside Point\r\n', 'Soltero(a)'),
(75, 'Remolia', 'Veneviento', 'Panini', 'Blight', 'V13456324', '1982-02-23', 'San Petersburgo', 'F', 'therollercoasterssucks@gmail.com', 'San Juan de Lagunillas', 'Viudo(a)'),
(76, 'Filomena', 'Martina', 'Blanco', 'Paredes', 'V15453234', '1996-08-08', 'Mérida', 'F', 'richardismylove@gmail.com', 'dkjflkjksdjfsjldfjkldjfjlksdf', 'Soltero(a)'),
(77, 'Juan', 'Roberto', 'Paredes', 'Blanco', 'V33333333', '1996-08-08', 'Mérida', 'M', 'popopopopoop@gmail.com', 'fnkjsdnlfnjsdnkfnksnkjfkn', 'Soltero(a)'),
(81, 'grfghfdh', 'fdghfdhdf', 'rssgfgdfg', 'dfhfdhdfh', 'V43434343', '1979-11-11', 'dsfoshdfhsfgksghdfsjd', 'F', 'gdghjgdhfghdfghidfg@yahoo.com', 'dfsdgsdfgdsgdsg', 'Casado(a)'),
(82, 'uuuuuuuuu', 'oooooooooo', 'yyyyyyyyyyy', 'eeeeeeeee', 'V65656565', '1978-02-22', 'rtrtyfghfhfh', 'F', 'fghfdhghdfghdfh@yahoo.com', 'fdgsfgsdfgdsgdgds', 'Casado(a)'),
(83, 'rrrrrrrrrrrrr', 'ttttttttttttttt', 'eeeeeeeeeeeeee', 'tttttttttttt', 'V27888000', '2007-02-21', 'yyyyyyy', 'F', 'tttttttt@hotmail.com', 'zxnjkvbjzxjvn,jzxmcv', 'Soltero(a)');

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
(16, 'Primaria', 'V27555555'),
(17, 'Bachillerato', 'E45678912'),
(18, 'Universitario', 'V13456324'),
(19, 'Universitario', 'V15453234');

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
(30, '0426', '8994472', 'Principal', 'V28636530'),
(31, '0412', '0763135', 'Secundario', 'V28636530'),
(32, '0274', '12349587', 'Auxiliar', 'V28636530'),
(33, '0274', '12349587', 'Trabajo', 'V28636530'),
(132, '0426', '3569252', 'Principal', 'V27555555'),
(133, '3211', '9810982', 'Secundario', 'V27555555'),
(134, '0412', '8892984', 'Auxiliar', 'V27555555'),
(135, '0275', '7423456', 'Trabajo', 'V27555555'),
(136, '0271', '3513513', 'Principal', 'V25555555'),
(137, '0424', '8546385', 'Secundario', 'V25555555'),
(138, '6211', '6384513', 'Auxiliar', 'V25555555'),
(139, 'Pref', 'Teléfono_P', 'Principal', 'Cédula_P'),
(140, 'Pref', 'Teléfono_S', 'Secundario', 'Cédula_P'),
(141, 'Pref', 'Teléfono_S', 'Auxiliar', 'Cédula_P'),
(145, '7575', '8416846', 'Principal', 'E45678912'),
(146, '4684', '4136541', 'Secundario', 'E45678912'),
(147, '3641', '3154354', 'Auxiliar', 'E45678912'),
(148, '', '', 'Trabajo', 'E45678912'),
(167, '5412', '3415848', 'Principal', 'V85413548'),
(168, '3854', '3854138', 'Secundario', 'V85413548'),
(169, '3841', '4135138', 'Auxiliar', 'V85413548'),
(170, '4384', '8435438', 'Principal', 'V87354354'),
(171, '4354', '4354343', 'Secundario', 'V87354354'),
(172, '8543', '4385434', 'Principal', 'V54138415'),
(173, '4354', '3854854', 'Secundario', 'V54138415'),
(174, '4354', '3854854', 'Auxiliar', 'V54138415'),
(175, '4538', '4384384', 'Principal', 'V65434684'),
(176, '4358', '8435843', 'Secundario', 'V65434684'),
(180, '4354', '3854854', 'Auxiliar', 'V54138416'),
(181, '4354', '3854854', 'Secundario', 'V54138416'),
(182, '4354', '3854854', 'Principal', 'V54138416'),
(183, '0274', '7654321', 'Principal', 'V13456324'),
(184, '0426', '1234567', 'Secundario', 'V13456324'),
(185, '4532', '3434346', 'Auxiliar', 'V87354354'),
(186, '0426', '9999995', 'Trabajo', 'V87354354'),
(187, '0274', '5553334', 'Auxiliar', 'V13456324'),
(188, '0416', '6655443', 'Trabajo', 'V13456324'),
(189, '0275', '3333333', 'Principal', 'V15453234'),
(190, '0274', '2222222', 'Secundario', 'V15453234'),
(191, '0426', '1111111', 'Auxiliar', 'V15453234'),
(192, '0275', '2222222', 'Trabajo', 'V15453234'),
(193, '0271', '4444444', 'Principal', 'V33333333'),
(194, '0412', '2222222', 'Secundario', 'V33333333'),
(195, '0414', '1111111', 'Auxiliar', 'V33333333'),
(201, '0271', '5454645', 'Principal', 'V43434343'),
(202, '0412', '5464565', 'Secundario', 'V43434343'),
(203, '0426', '7777777', 'Principal', 'V65656565'),
(204, '0416', '4444444', 'Secundario', 'V65656565'),
(205, '0426', '6666666', 'Principal', 'V27888000'),
(206, '0426', '3333333', 'Secundario', 'V27888000'),
(207, '0426', '3333333', 'Auxiliar', 'V27888000');

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
(1, 'Clave_01', 1, 'Ciudad donde naciste', 'Color que más te gusta', 'Caja Seca', 'Azul', 'V28636530'),
(2, '12345', 2, 'Ciudad donde naciste', 'Color que más te gusta', 'Mérida', 'Azul', 'V27919566'),
(13, '', 2, 'Ciudad donde naciste', 'Mérida', 'Color que más te gusta', 'Azul', 'E14635135'),
(14, 'Azul==1971', 1, '¿Cuál es tu heroe favorito?', 'Color que más te gusta', 'Gonzalo Picón Febres', 'Verde', 'V17341885'),
(15, 'Clave_01', 2, 'Ciudad donde naciste', 'Fruta favorita', 'Mérida', 'Naranja', 'E12345678');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `año-escolar`
--
ALTER TABLE `año-escolar`
  ADD PRIMARY KEY (`idAño-Escolar`);

--
-- Indices de la tabla `bitácora`
--
ALTER TABLE `bitácora`
  ADD PRIMARY KEY (`id_bitacora`),
  ADD KEY `fk_usuarios_bitacora` (`idUsuarios`);

--
-- Indices de la tabla `carnet-patria`
--
ALTER TABLE `carnet-patria`
  ADD PRIMARY KEY (`idCarnet`),
  ADD KEY `fk_personas_carnet` (`Cédula_Persona`);

--
-- Indices de la tabla `contactos_auxiliares`
--
ALTER TABLE `contactos_auxiliares`
  ADD PRIMARY KEY (`idContactoAuxiliar`,`idRepresentante`),
  ADD KEY `fk_representantes_auxiliares` (`idRepresentante`),
  ADD KEY `fk_personas_auxiliares` (`Cédula_Persona`);

--
-- Indices de la tabla `datos-económicos`
--
ALTER TABLE `datos-económicos`
  ADD PRIMARY KEY (`idDatos-económicos`,`idRepresentantes`),
  ADD KEY `fk_datos-economicos_representantes1_idx` (`idRepresentantes`);

--
-- Indices de la tabla `datos-laborales`
--
ALTER TABLE `datos-laborales`
  ADD PRIMARY KEY (`idDatos-laborales`,`idRepresentantes`);

--
-- Indices de la tabla `datos-laborales-madres`
--
ALTER TABLE `datos-laborales-madres`
  ADD PRIMARY KEY (`idDatos-laboralesMa`),
  ADD KEY `idPadre` (`idMadre`);

--
-- Indices de la tabla `datos-laborales-padres`
--
ALTER TABLE `datos-laborales-padres`
  ADD PRIMARY KEY (`idDatos-laboralesPa`),
  ADD KEY `idPadre` (`idPadre`);

--
-- Indices de la tabla `datos-salud`
--
ALTER TABLE `datos-salud`
  ADD PRIMARY KEY (`idDatos-Médicos`,`idEstudiantes`),
  ADD UNIQUE KEY `idEstudiantes` (`idEstudiantes`),
  ADD KEY `idUsuarios_idx` (`idEstudiantes`);

--
-- Indices de la tabla `datos-sociales`
--
ALTER TABLE `datos-sociales`
  ADD PRIMARY KEY (`idDatos-Sociales`,`idEstudiantes`),
  ADD UNIQUE KEY `idEstudiantes` (`idEstudiantes`),
  ADD KEY `idEstudiantes_idx` (`idEstudiantes`);

--
-- Indices de la tabla `datos-tallas`
--
ALTER TABLE `datos-tallas`
  ADD PRIMARY KEY (`idDatos-Tallas`,`idEstudiantes`),
  ADD UNIQUE KEY `idEstudiantes` (`idEstudiantes`),
  ADD KEY `idEstudiantes_idx` (`idEstudiantes`);

--
-- Indices de la tabla `datos-vivienda`
--
ALTER TABLE `datos-vivienda`
  ADD PRIMARY KEY (`idDatos-vivienda`),
  ADD UNIQUE KEY `idRepresentante` (`idRepresentante`),
  ADD KEY `fk_representantes_vivienda` (`idRepresentante`);

--
-- Indices de la tabla `datos-vivienda-madres`
--
ALTER TABLE `datos-vivienda-madres`
  ADD PRIMARY KEY (`idDatos-viviendaMa`),
  ADD UNIQUE KEY `idRepresentante` (`idMadre`),
  ADD KEY `fk_representantes_vivienda` (`idMadre`);

--
-- Indices de la tabla `datos-vivienda-padres`
--
ALTER TABLE `datos-vivienda-padres`
  ADD PRIMARY KEY (`idDatos-viviendaPa`),
  ADD UNIQUE KEY `idRepresentante` (`idPadre`),
  ADD KEY `fk_representantes_vivienda` (`idPadre`),
  ADD KEY `idPadre` (`idPadre`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`idEstudiantes`,`Cédula_Persona`,`idRepresentante`,`idPadre`),
  ADD KEY `Cedula_Persona_idx` (`Cédula_Persona`),
  ADD KEY `id_Representante_idx` (`idRepresentante`),
  ADD KEY `fk_estudiantes_padres1_idx` (`idPadre`),
  ADD KEY `idMadre` (`idMadre`);

--
-- Indices de la tabla `estudiantes-observaciones`
--
ALTER TABLE `estudiantes-observaciones`
  ADD PRIMARY KEY (`idObservaciones`),
  ADD KEY `fk_estudiantes_observaciones` (`idEstudiantes`);

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
-- Indices de la tabla `madre`
--
ALTER TABLE `madre`
  ADD PRIMARY KEY (`idMadre`,`Cédula_Persona`),
  ADD UNIQUE KEY `Cedula_Persona_UNIQUE` (`Cédula_Persona`),
  ADD KEY `Cedula_Persona_idx` (`Cédula_Persona`);

--
-- Indices de la tabla `padre`
--
ALTER TABLE `padre`
  ADD PRIMARY KEY (`idPadre`,`Cédula_Persona`),
  ADD UNIQUE KEY `Cedula_Persona_UNIQUE` (`Cédula_Persona`),
  ADD KEY `Cedula_Persona_idx` (`Cédula_Persona`);

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
  ADD KEY `fk_personas_representantes` (`Cédula_Persona`);

--
-- Indices de la tabla `teléfonos`
--
ALTER TABLE `teléfonos`
  ADD PRIMARY KEY (`idTeléfonos`),
  ADD KEY `fk_personas_teléfonos` (`Cédula_Persona`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuarios`),
  ADD UNIQUE KEY `Cedula_Persona` (`Cédula_Persona`),
  ADD KEY `Cedula_Persona_idx` (`Cédula_Persona`);

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
  MODIFY `id_bitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT de la tabla `carnet-patria`
--
ALTER TABLE `carnet-patria`
  MODIFY `idCarnet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `contactos_auxiliares`
--
ALTER TABLE `contactos_auxiliares`
  MODIFY `idContactoAuxiliar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `datos-económicos`
--
ALTER TABLE `datos-económicos`
  MODIFY `idDatos-económicos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `datos-laborales`
--
ALTER TABLE `datos-laborales`
  MODIFY `idDatos-laborales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `datos-laborales-madres`
--
ALTER TABLE `datos-laborales-madres`
  MODIFY `idDatos-laboralesMa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `datos-laborales-padres`
--
ALTER TABLE `datos-laborales-padres`
  MODIFY `idDatos-laboralesPa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `datos-salud`
--
ALTER TABLE `datos-salud`
  MODIFY `idDatos-Médicos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `datos-sociales`
--
ALTER TABLE `datos-sociales`
  MODIFY `idDatos-Sociales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `datos-tallas`
--
ALTER TABLE `datos-tallas`
  MODIFY `idDatos-Tallas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `datos-vivienda`
--
ALTER TABLE `datos-vivienda`
  MODIFY `idDatos-vivienda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `datos-vivienda-madres`
--
ALTER TABLE `datos-vivienda-madres`
  MODIFY `idDatos-viviendaMa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `datos-vivienda-padres`
--
ALTER TABLE `datos-vivienda-padres`
  MODIFY `idDatos-viviendaPa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `idEstudiantes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `estudiantes-observaciones`
--
ALTER TABLE `estudiantes-observaciones`
  MODIFY `idObservaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `estudiantes-repitentes`
--
ALTER TABLE `estudiantes-repitentes`
  MODIFY `idEstudiante-Repitente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `idGrado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `idInscripciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `madre`
--
ALTER TABLE `madre`
  MODIFY `idMadre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `padre`
--
ALTER TABLE `padre`
  MODIFY `idPadre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `idPersonas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de la tabla `representantes`
--
ALTER TABLE `representantes`
  MODIFY `idRepresentantes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `teléfonos`
--
ALTER TABLE `teléfonos`
  MODIFY `idTeléfonos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carnet-patria`
--
ALTER TABLE `carnet-patria`
  ADD CONSTRAINT `fk_personas_carnet` FOREIGN KEY (`Cédula_Persona`) REFERENCES `personas` (`Cédula`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `fk_datos-economicos_representantes1` FOREIGN KEY (`idRepresentantes`) REFERENCES `representantes` (`idRepresentantes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datos-laborales`
--
ALTER TABLE `datos-laborales`
  ADD CONSTRAINT `fk_datos-laborales_representantes1` FOREIGN KEY (`idRepresentantes`) REFERENCES `representantes` (`idRepresentantes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datos-laborales-madres`
--
ALTER TABLE `datos-laborales-madres`
  ADD CONSTRAINT `datos-laborales-madres_ibfk_1` FOREIGN KEY (`idMadre`) REFERENCES `madre` (`idMadre`) ON DELETE CASCADE;

--
-- Filtros para la tabla `datos-laborales-padres`
--
ALTER TABLE `datos-laborales-padres`
  ADD CONSTRAINT `datos-laborales-padres_ibfk_1` FOREIGN KEY (`idPadre`) REFERENCES `padre` (`idPadre`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Filtros para la tabla `datos-vivienda`
--
ALTER TABLE `datos-vivienda`
  ADD CONSTRAINT `fk_representantes_vivienda` FOREIGN KEY (`idRepresentante`) REFERENCES `representantes` (`idRepresentantes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datos-vivienda-madres`
--
ALTER TABLE `datos-vivienda-madres`
  ADD CONSTRAINT `datos-vivienda-madres_ibfk_1` FOREIGN KEY (`idMadre`) REFERENCES `madre` (`idMadre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datos-vivienda-padres`
--
ALTER TABLE `datos-vivienda-padres`
  ADD CONSTRAINT `datos-vivienda-padres_ibfk_1` FOREIGN KEY (`idPadre`) REFERENCES `padre` (`idPadre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`idMadre`) REFERENCES `madre` (`idMadre`),
  ADD CONSTRAINT `fk_Personas_Estudiantes` FOREIGN KEY (`Cédula_Persona`) REFERENCES `personas` (`Cédula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Representantes_Estudiantes` FOREIGN KEY (`idRepresentante`) REFERENCES `representantes` (`idRepresentantes`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_estudiantes_padres1` FOREIGN KEY (`idPadre`) REFERENCES `padre` (`idPadre`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Filtros para la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD CONSTRAINT `fk_Estudiantes_Inscripciones` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiantes` (`idEstudiantes`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Usuarios_Inscripciones` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuarios`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `madre`
--
ALTER TABLE `madre`
  ADD CONSTRAINT `madre_ibfk_1` FOREIGN KEY (`Cédula_Persona`) REFERENCES `personas` (`Cédula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `padre`
--
ALTER TABLE `padre`
  ADD CONSTRAINT `Cedula_Persona` FOREIGN KEY (`Cédula_Persona`) REFERENCES `personas` (`Cédula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `representantes`
--
ALTER TABLE `representantes`
  ADD CONSTRAINT `fk_personas_representantes` FOREIGN KEY (`Cédula_Persona`) REFERENCES `personas` (`Cédula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `teléfonos`
--
ALTER TABLE `teléfonos`
  ADD CONSTRAINT `fk_personas_teléfonos` FOREIGN KEY (`Cédula_Persona`) REFERENCES `personas` (`Cédula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_personas_usuarios` FOREIGN KEY (`Cédula_Persona`) REFERENCES `personas` (`Cédula`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
