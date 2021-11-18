-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-11-2021 a las 04:07:23
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `municipalidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `Rut_administrador` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre_administrador` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Numero_administrador` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `Correo_trabajo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Clave_ingreso` varchar(14) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`Rut_administrador`, `Nombre_administrador`, `Numero_administrador`, `Correo_trabajo`, `Clave_ingreso`) VALUES
('33333', 'admin', '234', 'yyy', 'ad23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudadano`
--

CREATE TABLE `ciudadano` (
  `Rut_persona` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `Id_municipalidad` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre_persona` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Numero_persona` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `Correo_persona` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Clave_persona` varchar(14) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ciudadano`
--

INSERT INTO `ciudadano` (`Rut_persona`, `Id_municipalidad`, `Nombre_persona`, `Numero_persona`, `Correo_persona`, `Clave_persona`) VALUES
('12345678', '111', 'aaa', '1234', 'asadad', '4444');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `Codigo_dep` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `Id_municipalidad` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `Rut_administrador` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre_dep` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Encargado_departamento` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`Codigo_dep`, `Id_municipalidad`, `Rut_administrador`, `Nombre_dep`, `Encargado_departamento`) VALUES
('678', '111', '33333', 'afg', 'mmm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipalidad`
--

CREATE TABLE `municipalidad` (
  `Id_municipalidad` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre_municipalidad` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Direccion_municipalidad` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Numero_municipalidad` varchar(9) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `municipalidad`
--

INSERT INTO `municipalidad` (`Id_municipalidad`, `Nombre_municipalidad`, `Direccion_municipalidad`, `Numero_municipalidad`) VALUES
('111', 'aaaa', 'asdf', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `Codigo` int(10) NOT NULL,
  `Codigo_dep` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `Rut_persona` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `Tipo_retroalimentacion` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Descripcion` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `Estado_msg` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`Codigo`, `Codigo_dep`, `Rut_persona`, `Tipo_retroalimentacion`, `Descripcion`, `Estado_msg`) VALUES
(1, '678', '12345678', 'sugerencia', 'asdasddads', 'sss');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`Rut_administrador`);

--
-- Indices de la tabla `ciudadano`
--
ALTER TABLE `ciudadano`
  ADD PRIMARY KEY (`Rut_persona`),
  ADD KEY `fk_ciudadano_municipalidad` (`Id_municipalidad`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`Codigo_dep`),
  ADD KEY `fk_departamento_rut_administrador` (`Rut_administrador`),
  ADD KEY `fk_departamento_id_municipalidad` (`Id_municipalidad`);

--
-- Indices de la tabla `municipalidad`
--
ALTER TABLE `municipalidad`
  ADD PRIMARY KEY (`Id_municipalidad`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `fk_solicitud_codigo_departamento` (`Codigo_dep`),
  ADD KEY `fk_solicitud_rut_ciudadano` (`Rut_persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `Codigo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciudadano`
--
ALTER TABLE `ciudadano`
  ADD CONSTRAINT `fk_ciudadano_municipalidad` FOREIGN KEY (`Id_municipalidad`) REFERENCES `municipalidad` (`Id_municipalidad`);

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `fk_departamento_id_municipalidad` FOREIGN KEY (`Id_municipalidad`) REFERENCES `municipalidad` (`Id_municipalidad`),
  ADD CONSTRAINT `fk_departamento_rut_administrador` FOREIGN KEY (`Rut_administrador`) REFERENCES `administrador` (`Rut_administrador`);

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `fk_solicitud_codigo_departamento` FOREIGN KEY (`Codigo_dep`) REFERENCES `departamento` (`Codigo_dep`),
  ADD CONSTRAINT `fk_solicitud_rut_ciudadano` FOREIGN KEY (`Rut_persona`) REFERENCES `ciudadano` (`Rut_persona`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
