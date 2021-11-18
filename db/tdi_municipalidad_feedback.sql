-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 18, 2021 at 01:12 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tdi_municipalidad_feedback`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrador`
--

CREATE TABLE `administrador` (
  `Rut_administrador` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre_administrador` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Numero_administrador` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `Correo_trabajo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Clave_ingreso` varchar(14) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ciudadano`
--

CREATE TABLE `ciudadano` (
  `Rut_persona` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `Id_municipalidad` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre_persona` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Numero_persona` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `Correo_persona` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Clave_persona` varchar(14) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departamento`
--

CREATE TABLE `departamento` (
  `Codigo_dep` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `Id_municipalidad` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `Rut_administrador` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre_dep` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Encargado_departamento` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `municipalidad`
--

CREATE TABLE `municipalidad` (
  `Id_municipalidad` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre_municipalidad` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Direccion_municipalidad` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Numero_municipalidad` varchar(9) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `solicitud`
--

CREATE TABLE `solicitud` (
  `Codigo` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Codigo_dep` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `Rut_persona` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `Tipo_retroalimentacion` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Descripcion` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `Estado_msg` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`Rut_administrador`);

--
-- Indexes for table `ciudadano`
--
ALTER TABLE `ciudadano`
  ADD PRIMARY KEY (`Rut_persona`),
  ADD KEY `fk_ciudadano_municipalidad` (`Id_municipalidad`);

--
-- Indexes for table `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`Codigo_dep`),
  ADD KEY `fk_departamento_rut_administrador` (`Rut_administrador`),
  ADD KEY `fk_departamento_id_municipalidad` (`Id_municipalidad`);

--
-- Indexes for table `municipalidad`
--
ALTER TABLE `municipalidad`
  ADD PRIMARY KEY (`Id_municipalidad`);

--
-- Indexes for table `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `fk_solicitud_codigo_departamento` (`Codigo_dep`),
  ADD KEY `fk_solicitud_rut_ciudadano` (`Rut_persona`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ciudadano`
--
ALTER TABLE `ciudadano`
  ADD CONSTRAINT `fk_ciudadano_municipalidad` FOREIGN KEY (`Id_municipalidad`) REFERENCES `municipalidad` (`Id_municipalidad`);

--
-- Constraints for table `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `fk_departamento_id_municipalidad` FOREIGN KEY (`Id_municipalidad`) REFERENCES `municipalidad` (`Id_municipalidad`),
  ADD CONSTRAINT `fk_departamento_rut_administrador` FOREIGN KEY (`Rut_administrador`) REFERENCES `administrador` (`Rut_administrador`);

--
-- Constraints for table `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `fk_solicitud_codigo_departamento` FOREIGN KEY (`Codigo_dep`) REFERENCES `departamento` (`Codigo_dep`),
  ADD CONSTRAINT `fk_solicitud_rut_ciudadano` FOREIGN KEY (`Rut_persona`) REFERENCES `ciudadano` (`Rut_persona`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
