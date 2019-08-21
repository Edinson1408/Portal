-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-08-2019 a las 07:20:01
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `simonbolivar`
--
CREATE DATABASE IF NOT EXISTS `simonbolivar` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `simonbolivar`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno_tbl`
--

CREATE TABLE `alumno_tbl` (
  `IDALUMNO` int(11) NOT NULL,
  `IDPERSONA` int(11) NOT NULL,
  `AÑO_INGRESO` int(4) NOT NULL,
  `AÑO_EGRESO` int(4) NOT NULL,
  `PERIODO_INGRESO` varchar(10) NOT NULL,
  `PERIODO_EGRESO` varchar(10) NOT NULL,
  `CICLO_RELATIVO` int(2) NOT NULL,
  `IDCARRERA` int(11) NOT NULL,
  `DATE_CREATE` datetime NOT NULL,
  `USER_CREATE` varchar(11) NOT NULL,
  `DATE_UPDATE` datetime NOT NULL,
  `USER_UPDATE` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras_tbl`
--

CREATE TABLE `carreras_tbl` (
  `IDCARRERA` int(11) NOT NULL,
  `DESCR250` varchar(250) NOT NULL,
  `DATE_CREATE` datetime NOT NULL,
  `USER_CREATE` varchar(11) NOT NULL,
  `DATE_UPDATE` datetime DEFAULT NULL,
  `USER_UPDATE` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carreras_tbl`
--

INSERT INTO `carreras_tbl` (`IDCARRERA`, `DESCR250`, `DATE_CREATE`, `USER_CREATE`, `DATE_UPDATE`, `USER_UPDATE`) VALUES
(102, 'Administración de Empresas', '2019-07-28 00:00:00', 'ADMIN', NULL, ''),
(103, 'Tegnología de análisis Químico', '2019-07-28 00:00:00', 'ADMIN', NULL, ''),
(201, 'Contabilidad', '2019-07-28 00:00:00', 'ADMIN', NULL, ''),
(301, 'Electrónica Industrial', '2019-07-28 00:00:00', 'ADMIN', NULL, ''),
(305, 'Electrotecnia Industrial', '2019-07-28 00:00:00', 'ADMIN', NULL, ''),
(403, 'Cocina', '0000-00-00 00:00:00', 'ADMIN', NULL, ''),
(405, 'Enfermería Técnica', '2019-07-28 00:00:00', 'ADMIN', NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos_alumnos`
--

CREATE TABLE `cursos_alumnos` (
  `IDREGISTRO` int(11) NOT NULL,
  `IDALUMNO` int(11) NOT NULL,
  `IDCARRERA` int(11) NOT NULL,
  `IDCURSO` int(11) NOT NULL,
  `PERIODO` year(4) NOT NULL,
  `TIPO_ESTADO` varchar(10) NOT NULL,
  `TIPO_RAZON` varchar(10) NOT NULL,
  `NOTA` varchar(11) NOT NULL,
  `USER_CREATE` varchar(11) NOT NULL,
  `DATE_CREATE` datetime NOT NULL,
  `USER_UPDATE` varchar(11) NOT NULL,
  `DATE_UPDATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos_tbl`
--

CREATE TABLE `cursos_tbl` (
  `IDCURSOS` int(11) NOT NULL,
  `IDCARRERA` int(11) NOT NULL,
  `DESCR250` varchar(250) NOT NULL,
  `NUM_CREDITOS` int(5) NOT NULL,
  `NUM_HORAS` int(5) NOT NULL,
  `CICLO_RELATIVO` varchar(3) NOT NULL,
  `DATE_CREATE` datetime NOT NULL,
  `USER_CREATE` varchar(11) NOT NULL,
  `DATE_UPDATE` datetime DEFAULT NULL,
  `USER_UPDATE` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cursos_tbl`
--

INSERT INTO `cursos_tbl` (`IDCURSOS`, `IDCARRERA`, `DESCR250`, `NUM_CREDITOS`, `NUM_HORAS`, `CICLO_RELATIVO`, `DATE_CREATE`, `USER_CREATE`, `DATE_UPDATE`, `USER_UPDATE`) VALUES
(1000, 101, 'Organización y Administración del Soporte Técnico', 3, 4, '1', '0000-00-00 00:00:00', 'ADMIN', NULL, ''),
(1001, 101, 'Integración de las Tecnologías de Información y Comunicación', 3, 4, '1', '0000-00-00 00:00:00', 'ADMIN', NULL, ''),
(1002, 101, 'Mantenimiento de Equipos de Cómputo', 4, 6, '1', '0000-00-00 00:00:00', 'ADMIN', NULL, ''),
(1003, 101, 'Diseño de Redes de Comunicación', 4, 5, '1', '0000-00-00 00:00:00', 'ADMIN', NULL, ''),
(1004, 101, 'Seguridad Informática', 2, 3, '1', '0000-00-00 00:00:00', 'ADMIN', NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso_docente_tbl`
--

CREATE TABLE `curso_docente_tbl` (
  `IDREGISTRO` int(11) NOT NULL,
  `IDDOCENTE` int(11) NOT NULL,
  `IDCARRERA` int(11) NOT NULL,
  `IDCURSO` int(11) NOT NULL,
  `DESCARRERA` varchar(250) NOT NULL,
  `DESCURSO` varchar(250) NOT NULL,
  `PERIODO` year(4) NOT NULL,
  `CICLO` int(2) NOT NULL,
  `USER_CREATE` varchar(11) DEFAULT NULL,
  `DATE_CREATE` datetime DEFAULT NULL,
  `USER_UPDATE` varchar(11) DEFAULT NULL,
  `DATE_UPDATE` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `curso_docente_tbl`
--

INSERT INTO `curso_docente_tbl` (`IDREGISTRO`, `IDDOCENTE`, `IDCARRERA`, `IDCURSO`, `DESCARRERA`, `DESCURSO`, `PERIODO`, `CICLO`, `USER_CREATE`, `DATE_CREATE`, `USER_UPDATE`, `DATE_UPDATE`) VALUES
(1, 1, 101, 1000, 'Computación e Informática ', 'Organización y Administración del Soporte Técnico', 2019, 1, 'EFLORIAN', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_personales_tbl`
--

CREATE TABLE `datos_personales_tbl` (
  `IDPERSONA` int(11) NOT NULL,
  `NOMBRES` varchar(50) NOT NULL,
  `APELLIDOS` varchar(50) NOT NULL,
  `EDAD` int(2) NOT NULL,
  `IDDOCUMENTO` int(2) NOT NULL,
  `NUM_DOCUMENTO` int(12) NOT NULL,
  `DIRECCION` varchar(250) NOT NULL,
  `PAIS` varchar(20) NOT NULL,
  `PROVINCIA` varchar(20) NOT NULL,
  `DISTRITO` varchar(20) NOT NULL,
  `IDIOMA` varchar(20) NOT NULL,
  `F_NACIMIENTO` text NOT NULL,
  `DATE_CREATE` datetime NOT NULL,
  `USER_CREATE` varchar(11) NOT NULL,
  `DATE:UPDATE` datetime NOT NULL,
  `USER_UPDATE` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datos_personales_tbl`
--

INSERT INTO `datos_personales_tbl` (`IDPERSONA`, `NOMBRES`, `APELLIDOS`, `EDAD`, `IDDOCUMENTO`, `NUM_DOCUMENTO`, `DIRECCION`, `PAIS`, `PROVINCIA`, `DISTRITO`, `IDIOMA`, `F_NACIMIENTO`, `DATE_CREATE`, `USER_CREATE`, `DATE:UPDATE`, `USER_UPDATE`) VALUES
(1, 'Carlos', 'Lozano', 22, 1, 70945456, 'las dalias', 'operu', 'lima', 'lima', 'espaÃ±ol', '2019-08-06', '2019-08-20 07:13:06', 'EFLORIAN', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_malla_tbl`
--

CREATE TABLE `detalle_malla_tbl` (
  `ID_DETALLE_MALLA` int(11) NOT NULL,
  `IDMALLA` int(11) NOT NULL,
  `IDCARRERA` int(11) NOT NULL,
  `IDCURSO` int(11) NOT NULL,
  `DESCURSO` varchar(250) NOT NULL,
  `CICLO` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_malla_tbl`
--

INSERT INTO `detalle_malla_tbl` (`ID_DETALLE_MALLA`, `IDMALLA`, `IDCARRERA`, `IDCURSO`, `DESCURSO`, `CICLO`) VALUES
(15, 1, 101, 1000, 'Organización y Administración del Soporte Técnico', 1),
(16, 1, 101, 1001, 'Integración de las Tecnologías de Información y Comunicación', 1),
(17, 1, 101, 1002, 'Mantenimiento de Equipos de Cómputo', 1),
(18, 1, 101, 1003, 'Diseño de Redes de Comunicación', 1),
(19, 1, 101, 1004, 'Seguridad Informática', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes_tbl`
--

CREATE TABLE `docentes_tbl` (
  `IDDOCENTE` int(11) NOT NULL,
  `IDPERSONA` int(11) NOT NULL,
  `ANO_INGRESO` int(4) NOT NULL,
  `ANO_EGRESO` int(4) NOT NULL,
  `IDCARRERA` int(11) NOT NULL,
  `INSTITUCION_PROCEDENCIA` varchar(200) NOT NULL,
  `CARRERA_PROFESIONAL` varchar(200) NOT NULL,
  `ESTADO` int(2) NOT NULL,
  `DATE_CREATE` datetime NOT NULL,
  `USER_CREATE` varchar(11) NOT NULL,
  `DATE_UPDATE` datetime DEFAULT NULL,
  `USER_UPDATE` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `docentes_tbl`
--

INSERT INTO `docentes_tbl` (`IDDOCENTE`, `IDPERSONA`, `ANO_INGRESO`, `ANO_EGRESO`, `IDCARRERA`, `INSTITUCION_PROCEDENCIA`, `CARRERA_PROFESIONAL`, `ESTADO`, `DATE_CREATE`, `USER_CREATE`, `DATE_UPDATE`, `USER_UPDATE`) VALUES
(1, 1, 2019, 0, 101, 'garcilazo de la vega', 'ingeniria de sistemas', 1, '2019-08-20 07:13:06', 'EFLORIAN', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `malla_tbl`
--

CREATE TABLE `malla_tbl` (
  `IDMALLA` int(11) NOT NULL,
  `DESCR250` varchar(100) NOT NULL,
  `IDCARRERA` int(11) DEFAULT NULL,
  `PERIODO` year(4) NOT NULL,
  `DATE_CREATE` datetime NOT NULL,
  `USER_CREATE` varchar(11) NOT NULL,
  `DATE_UPDATE` datetime NOT NULL,
  `USER_UPDATE` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `malla_tbl`
--

INSERT INTO `malla_tbl` (`IDMALLA`, `DESCR250`, `IDCARRERA`, `PERIODO`, `DATE_CREATE`, `USER_CREATE`, `DATE_UPDATE`, `USER_UPDATE`) VALUES
(1, 'Computo', 101, 2020, '2019-08-08 02:47:55', 'EFLORIAN', '2019-08-08 02:49:42', 'EFLORIAN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_tbl`
--

CREATE TABLE `usuario_tbl` (
  `IDUSUARIO` int(11) NOT NULL,
  `IDPERSONA` int(11) NOT NULL,
  `NOM_USUARIO` varchar(50) NOT NULL,
  `PASS_USUARIO` varchar(50) NOT NULL,
  `TIPO_USUARIO` varchar(20) NOT NULL,
  `DATE_CREATE` datetime NOT NULL,
  `USER_CREATE` varchar(11) NOT NULL,
  `DATE_UPDATE` datetime DEFAULT NULL,
  `USER_UPDATE` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_tbl`
--

INSERT INTO `usuario_tbl` (`IDUSUARIO`, `IDPERSONA`, `NOM_USUARIO`, `PASS_USUARIO`, `TIPO_USUARIO`, `DATE_CREATE`, `USER_CREATE`, `DATE_UPDATE`, `USER_UPDATE`) VALUES
(1, 1, 'CLozan70', '70945456', 'Docente', '2019-08-20 07:13:06', 'EFLORIAN', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno_tbl`
--
ALTER TABLE `alumno_tbl`
  ADD PRIMARY KEY (`IDALUMNO`);

--
-- Indices de la tabla `carreras_tbl`
--
ALTER TABLE `carreras_tbl`
  ADD PRIMARY KEY (`IDCARRERA`);

--
-- Indices de la tabla `cursos_alumnos`
--
ALTER TABLE `cursos_alumnos`
  ADD PRIMARY KEY (`IDREGISTRO`);

--
-- Indices de la tabla `cursos_tbl`
--
ALTER TABLE `cursos_tbl`
  ADD PRIMARY KEY (`IDCURSOS`);

--
-- Indices de la tabla `curso_docente_tbl`
--
ALTER TABLE `curso_docente_tbl`
  ADD PRIMARY KEY (`IDREGISTRO`);

--
-- Indices de la tabla `datos_personales_tbl`
--
ALTER TABLE `datos_personales_tbl`
  ADD PRIMARY KEY (`IDPERSONA`);

--
-- Indices de la tabla `detalle_malla_tbl`
--
ALTER TABLE `detalle_malla_tbl`
  ADD PRIMARY KEY (`ID_DETALLE_MALLA`);

--
-- Indices de la tabla `docentes_tbl`
--
ALTER TABLE `docentes_tbl`
  ADD PRIMARY KEY (`IDDOCENTE`);

--
-- Indices de la tabla `malla_tbl`
--
ALTER TABLE `malla_tbl`
  ADD PRIMARY KEY (`IDMALLA`);

--
-- Indices de la tabla `usuario_tbl`
--
ALTER TABLE `usuario_tbl`
  ADD PRIMARY KEY (`IDUSUARIO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno_tbl`
--
ALTER TABLE `alumno_tbl`
  MODIFY `IDALUMNO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `carreras_tbl`
--
ALTER TABLE `carreras_tbl`
  MODIFY `IDCARRERA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=406;

--
-- AUTO_INCREMENT de la tabla `cursos_alumnos`
--
ALTER TABLE `cursos_alumnos`
  MODIFY `IDREGISTRO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cursos_tbl`
--
ALTER TABLE `cursos_tbl`
  MODIFY `IDCURSOS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1005;

--
-- AUTO_INCREMENT de la tabla `curso_docente_tbl`
--
ALTER TABLE `curso_docente_tbl`
  MODIFY `IDREGISTRO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `datos_personales_tbl`
--
ALTER TABLE `datos_personales_tbl`
  MODIFY `IDPERSONA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalle_malla_tbl`
--
ALTER TABLE `detalle_malla_tbl`
  MODIFY `ID_DETALLE_MALLA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `docentes_tbl`
--
ALTER TABLE `docentes_tbl`
  MODIFY `IDDOCENTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario_tbl`
--
ALTER TABLE `usuario_tbl`
  MODIFY `IDUSUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
