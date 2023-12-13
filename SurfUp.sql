-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 17, 2022 at 06:55 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `surfup`
--

-- --------------------------------------------------------

--
-- Table structure for table `ola`
--

CREATE TABLE IF NOT EXISTS `ola` (
  `codigo` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `fecha` varchar(255) NOT NULL,
  `duracion` varchar(255) NOT NULL,
  `juez` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ola`
--

INSERT INTO `ola` (`codigo`, `nombre`, `fecha`, `duracion`, `juez`, `tipo`, `total`) VALUES
('20221196', 'David', '2022-12-05', 'Mas de 100', 'J3', 'Mala', '50'),
('20221737', 'Sofia', '2022-11-29', 'Entre 41 y 100', 'J2', 'Buena', '80'),
('20223053', 'Julian', '2022-12-27', 'Entre 20 y 40', 'J3', 'Excelente', '110'),
('20223369', 'Valeria', '2022-12-06', 'Entre 41 y 100', 'J1', 'Mediocre', '60'),
('20226880', 'Sarah', '2022-11-29', 'Mas de 100', 'J4', 'Excelente', '130');

-- --------------------------------------------------------

--
-- Table structure for table `participante`
--

CREATE TABLE IF NOT EXISTS `participante` (
  `nombre` varchar(255) NOT NULL,
  `cedula` varchar(255) NOT NULL,
  `genero` varchar(255) NOT NULL,
  `edad` varchar(255) NOT NULL,
  `fechaNacimiento` varchar(255) NOT NULL,
  `domicilio` varchar(255) NOT NULL,
  `fechaRegistro` varchar(255) NOT NULL,
  `tipoJugador` varchar(255) NOT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `nombre` varchar(255) NOT NULL,
  `cedula` varchar(255) NOT NULL,
  `puesto` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `antiguedad` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `salario` varchar(255) NOT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`nombre`, `cedula`, `puesto`, `estado`, `antiguedad`, `usuario`, `contrasena`, `salario`) VALUES
('Lin', '115678954', 'coordinador', 'inactivo', '4', 'Lin02', '123', '4480'),
('Sofia', '1183564', 'consultor', 'inactivo', '10', 'Sofi9 ', '123', '5250'),
('Valeria', '118865664', 'consultor', 'activo', '10', 'Val2', '123', '5250'),
('Julian', '18830951', 'coordinador', 'activo', '8', 'Jul', '123', '5460');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
