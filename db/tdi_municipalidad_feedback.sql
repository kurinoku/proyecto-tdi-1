-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-12-2021 a las 04:30:25
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tdi_municipalidad_feedback`
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

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`Rut_administrador`, `Nombre_administrador`, `Numero_administrador`, `Correo_administrador`, `Clave_administrador`) VALUES
('18214219', 'Antonio Rodríguez', '406862437', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e');

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

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`Codigo_dep`, `Id_municipalidad`, `Rut_encargado`, `Nombre_dep`) VALUES
('FsJPSudE', '00000001', '18984036', 'Recursos Humanos'),
('hxK20uNV', '00000001', '20943098', 'Contabilidad'),
('rGNZLL5t', '00000001', '20503856', 'Laboral'),
('SLJmU9QI', '00000001', '18326222', 'Salud');

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

--
-- Volcado de datos para la tabla `encargado`
--

INSERT INTO `encargado` (`Rut_encargado`, `Nombre_encargado`, `Numero_encargado`, `Correo_encargado`, `Clave_encargado`) VALUES
('18326222', 'Sebastián Victorian', '587017544', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e'),
('18984036', 'Manuel Yañez', '414287402', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e'),
('20503856', 'Víctor Rodríguez', '997141376', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e'),
('20943098', 'María Gonzales', '832560716', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e');

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

--
-- Volcado de datos para la tabla `municipalidad`
--

INSERT INTO `municipalidad` (`Id_municipalidad`, `Nombre_municipalidad`, `Rut_administrador`, `Direccion_municipalidad`, `Numero_municipalidad`) VALUES
('00000001', 'Municipalidad de Concepción', '18214219', 'Barros Arana 2054', '714961999');

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

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`Rut_persona`, `Id_municipalidad`, `Nombre_persona`, `Numero_persona`, `Correo_persona`, `Clave_persona`) VALUES
('15280778', '00000001', 'Sebastián', '881789608', 'jeansaavedra55@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
('15449703', '00000001', 'Romina Saveedra', '919866955', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e'),
('15681646', '00000001', 'Anaís Saveedra', '156559191', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e'),
('15834503', '00000001', 'María Yañez', '608075596', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e'),
('16011528', '00000001', 'Manuel Pablete', '270574487', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e'),
('16223847', '00000001', 'Víctor Yañez', '896004361', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e'),
('17091463', '00000001', 'Josefina Rodríguez', '901614577', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e'),
('17304294', '00000001', 'Javier Saveedra', '933610849', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e'),
('17363450', '00000001', 'Sebastián Sepulveda', '646464668', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e'),
('17471486', '00000001', 'Anaís Gonzales', '119180156', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e'),
('17859782', '00000001', 'Josefina Gonzales', '252722811', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e'),
('17980287', '00000001', 'Víctor Victorian', '291962521', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e'),
('18497457', '00000001', 'Javier Sepulveda', '801893602', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e'),
('18636634', '00000001', 'Manuel Victorian', '296130383', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e'),
('19053854', '00000001', 'Javier Pablete', '227999363', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e'),
('19420603', '00000001', 'Romina Sepulveda', '412554382', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e'),
('19891318', '00000001', 'Antonio Saveedra', '495748262', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e'),
('19929623', '00000001', 'Antonio Gonzales', '928510083', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e'),
('20650020', '00000001', 'María Rodríguez', '450292870', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e'),
('21635901', '00000001', 'Romina Gonzales', '684670121', 'example@example.com', 'b7f786b67376a62c39cb3673e3beba8e');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restablecer_contrasenas`
--

CREATE TABLE `restablecer_contrasenas` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `token` varchar(200) NOT NULL,
  `codigo` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `restablecer_contrasenas`
--

INSERT INTO `restablecer_contrasenas` (`id`, `email`, `token`, `codigo`, `fecha`) VALUES
(91, 'JEANSAAVEDRA55@gmail.com', 'd3cd167439', 7146, '2021-12-23 02:00:26'),
(92, 'JEANSAAVEDRA55@gmail.com', 'db2b1aef1b', 1904, '2021-12-23 02:04:00'),
(93, 'jeansaavedra55@gmail.com', 'a1805f4b0b', 7897, '2021-12-23 03:28:46');

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
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`Codigo_solicitud`, `Codigo_dep`, `Rut_persona`, `Tipo_solicitud`, `Descripcion_solicitud`, `Estado_solicitud`, `Creada_solicitud`) VALUES
(1, 'FsJPSudE', '17859782', 'Felicitaciones', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Procesando', '2021-02-13'),
(2, 'SLJmU9QI', '19420603', 'Felicitaciones', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Resuelto', '2021-04-20'),
(3, 'rGNZLL5t', '20650020', 'Sugerencia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Nuevo', '2021-01-10'),
(4, 'SLJmU9QI', '19420603', 'Felicitaciones', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Resuelto', '2021-09-21'),
(5, 'SLJmU9QI', '15834503', 'Felicitaciones', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Procesando', '2021-03-01'),
(6, 'rGNZLL5t', '20650020', 'Felicitaciones', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Resuelto', '2021-04-25'),
(7, 'FsJPSudE', '18636634', 'Sugerencia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Resuelto', '2021-01-26'),
(8, 'SLJmU9QI', '19053854', 'Reclamo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Resuelto', '2021-04-03'),
(9, 'rGNZLL5t', '15681646', 'Felicitaciones', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Resuelto', '2021-05-15'),
(10, 'FsJPSudE', '17471486', 'Sugerencia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Resuelto', '2021-03-14'),
(11, 'SLJmU9QI', '17471486', 'Felicitaciones', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Resuelto', '2021-06-11'),
(12, 'FsJPSudE', '15681646', 'Sugerencia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Nuevo', '2021-04-16'),
(13, 'FsJPSudE', '17471486', 'Reclamo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Resuelto', '2021-03-19'),
(14, 'hxK20uNV', '21635901', 'Felicitaciones', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Visto', '2021-04-20'),
(15, 'SLJmU9QI', '17091463', 'Reclamo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Resuelto', '2021-05-22'),
(16, 'rGNZLL5t', '21635901', 'Sugerencia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Resuelto', '2021-08-07'),
(17, 'SLJmU9QI', '17859782', 'Felicitaciones', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Procesando', '2021-07-14'),
(18, 'hxK20uNV', '18497457', 'Reclamo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Visto', '2021-04-21'),
(19, 'FsJPSudE', '15280778', 'Felicitaciones', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Visto', '2021-04-09'),
(20, 'FsJPSudE', '17091463', 'Felicitaciones', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Resuelto', '2021-03-25'),
(21, 'hxK20uNV', '19053854', 'Sugerencia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Procesando', '2021-08-23'),
(22, 'rGNZLL5t', '17980287', 'Reclamo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Procesando', '2021-05-11'),
(23, 'SLJmU9QI', '17304294', 'Reclamo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Resuelto', '2021-09-19'),
(24, 'hxK20uNV', '18497457', 'Reclamo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Resuelto', '2021-05-06'),
(25, 'rGNZLL5t', '15280778', 'Sugerencia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Visto', '2021-07-06'),
(26, 'rGNZLL5t', '19420603', 'Sugerencia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Visto', '2021-04-24'),
(27, 'FsJPSudE', '17304294', 'Reclamo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Procesando', '2021-11-08'),
(28, 'rGNZLL5t', '19053854', 'Sugerencia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Nuevo', '2021-09-15'),
(29, 'SLJmU9QI', '19891318', 'Felicitaciones', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Resuelto', '2021-03-05'),
(30, 'SLJmU9QI', '15681646', 'Felicitaciones', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Resuelto', '2021-10-01'),
(31, 'rGNZLL5t', '19929623', 'Reclamo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Procesando', '2021-06-11'),
(32, 'hxK20uNV', '16223847', 'Sugerencia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Nuevo', '2021-07-06'),
(33, 'FsJPSudE', '19420603', 'Felicitaciones', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Resuelto', '2021-02-15'),
(34, 'rGNZLL5t', '15681646', 'Reclamo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Visto', '2021-07-16'),
(35, 'hxK20uNV', '19891318', 'Felicitaciones', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Visto', '2021-05-07'),
(36, 'SLJmU9QI', '19053854', 'Sugerencia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Nuevo', '2021-03-24'),
(37, 'FsJPSudE', '17471486', 'Felicitaciones', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Visto', '2021-02-25'),
(38, 'FsJPSudE', '19929623', 'Sugerencia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Nuevo', '2021-10-03'),
(39, 'rGNZLL5t', '17980287', 'Reclamo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Nuevo', '2021-06-19'),
(40, 'SLJmU9QI', '15834503', 'Sugerencia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Resuelto', '2021-02-01'),
(41, 'SLJmU9QI', '19929623', 'Reclamo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Procesando', '2021-11-03'),
(42, 'rGNZLL5t', '21635901', 'Felicitaciones', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Visto', '2021-03-03'),
(43, 'rGNZLL5t', '21635901', 'Reclamo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Visto', '2021-03-04'),
(44, 'FsJPSudE', '19891318', 'Sugerencia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Procesando', '2021-05-19'),
(45, 'rGNZLL5t', '19929623', 'Felicitaciones', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Procesando', '2021-04-07'),
(46, 'SLJmU9QI', '19929623', 'Sugerencia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Procesando', '2021-09-12'),
(47, 'hxK20uNV', '15280778', 'Reclamo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Resuelto', '2021-08-08'),
(48, 'hxK20uNV', '16011528', 'Felicitaciones', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Procesando', '2021-02-06'),
(49, 'rGNZLL5t', '20650020', 'Sugerencia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Visto', '2021-04-03'),
(50, 'rGNZLL5t', '19891318', 'Reclamo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Procesando', '2021-08-15'),
(52, 'hxK20uNV', '15280778', 'Reclamo', 'El departamento de contabilidad carece de personal profesional.', 'Nuevo', '2021-12-21');

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
-- Indices de la tabla `restablecer_contrasenas`
--
ALTER TABLE `restablecer_contrasenas`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `Id_foto` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `Id_noticia` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `restablecer_contrasenas`
--
ALTER TABLE `restablecer_contrasenas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `Codigo_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

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
