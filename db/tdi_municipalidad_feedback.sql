-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-12-2021 a las 20:51:11
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
  `Correo_administrador` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Clave_administrador` char(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `Codigo_dep` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `Id_municipalidad` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `Rut_encargado` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre_dep` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encargado`
--

CREATE TABLE `encargado` (
  `Rut_encargado` varchar(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Nombre_encargado` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Numero_encargado` varchar(9) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Correo_encargado` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Clave_encargado` char(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto`
--

CREATE TABLE `foto` (
  `Id_foto` int(8) NOT NULL,
  `Nombre_foto` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Ruta_foto` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Fecha` date NOT NULL,
  `Codigo_dep` varchar(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipalidad`
--

CREATE TABLE `municipalidad` (
  `Id_municipalidad` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre_municipalidad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Rut_administrador` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `Direccion_municipalidad` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Numero_municipalidad` varchar(9) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE `noticia` (
  `Id_noticia` int(8) NOT NULL,
  `Nombre_noticia` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Cuerpo_noticia` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Ruta_portada` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Ruta_foto` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Fecha` date NOT NULL,
  `Codigo_dep` varchar(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `Rut_persona` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `Id_municipalidad` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre_persona` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Numero_persona` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `Correo_persona` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Clave_persona` char(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `Codigo_solicitud` int(11) NOT NULL,
  `Codigo_dep` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `Rut_persona` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `Tipo_solicitud` enum('Reclamo','Sugerencia','Felicitaciones') COLLATE utf8_unicode_ci NOT NULL,
  `Descripcion_solicitud` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `Estado_solicitud` enum('Nuevo','Visto','Procesando','Resuelto') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Nuevo',
  `Creada_solicitud` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`Rut_administrador`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`Codigo_dep`),
  ADD KEY `fk_departamento_id_municipalidad` (`Id_municipalidad`),
  ADD KEY `fk_departamento_rut_encargado` (`Rut_encargado`);

--
-- Indices de la tabla `encargado`
--
ALTER TABLE `encargado`
  ADD PRIMARY KEY (`Rut_encargado`);

--
-- Indices de la tabla `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`Id_foto`),
  ADD KEY `fk_noticia_codigo_dep_foto` (`Codigo_dep`);

--
-- Indices de la tabla `municipalidad`
--
ALTER TABLE `municipalidad`
  ADD PRIMARY KEY (`Id_municipalidad`),
  ADD KEY `fk_municipalidad_rut_administrador` (`Rut_administrador`);

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`Id_noticia`),
  ADD KEY `fk_noticia_codigo_dep` (`Codigo_dep`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`Rut_persona`),
  ADD KEY `fk_persona_municipalidad` (`Id_municipalidad`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`Codigo_solicitud`),
  ADD KEY `fk_solicitud_codigo_departamento` (`Codigo_dep`),
  ADD KEY `fk_solicitud_rut_persona` (`Rut_persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `foto`
--
ALTER TABLE `foto`
  MODIFY `Id_foto` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `Id_noticia` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `Codigo_solicitud` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `fk_departamento_id_municipalidad` FOREIGN KEY (`Id_municipalidad`) REFERENCES `municipalidad` (`Id_municipalidad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_departamento_rut_encargado` FOREIGN KEY (`Rut_encargado`) REFERENCES `encargado` (`Rut_encargado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `fk_noticia_codigo_dep_foto` FOREIGN KEY (`Codigo_dep`) REFERENCES `departamento` (`Codigo_dep`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `municipalidad`
--
ALTER TABLE `municipalidad`
  ADD CONSTRAINT `fk_municipalidad_rut_administrador` FOREIGN KEY (`Rut_administrador`) REFERENCES `administrador` (`Rut_administrador`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD CONSTRAINT `fk_noticia_codigo_dep` FOREIGN KEY (`Codigo_dep`) REFERENCES `departamento` (`Codigo_dep`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `fk_persona_municipalidad` FOREIGN KEY (`Id_municipalidad`) REFERENCES `municipalidad` (`Id_municipalidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `fk_solicitud_codigo_departamento` FOREIGN KEY (`Codigo_dep`) REFERENCES `departamento` (`Codigo_dep`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_solicitud_rut_persona` FOREIGN KEY (`Rut_persona`) REFERENCES `persona` (`Rut_persona`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
