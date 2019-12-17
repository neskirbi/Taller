-- phpMyAdmin SQL Dump
-- version 5.0.0-alpha1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 16-12-2019 a las 19:11:04
-- Versión del servidor: 8.0.17
-- Versión de PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `taller`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id_administrador` varchar(32) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `user` varchar(20) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL,
  `foto` varchar(1500) DEFAULT 'http://k08.kn3.net/19B804182.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id_administrador`, `nombre`, `user`, `pass`, `foto`) VALUES
('70c79d822d414cf6ac7e5c2286985ace', 'Raul', 'r', 'r', 'http://k08.kn3.net/19B804182.jpg'),
('81f00e7094f84edc90a7c2a938d5e78f', 'Brajan', 'b', 'b', 'http://k08.kn3.net/19B804182.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id_inventario` varchar(32) NOT NULL,
  `id_refaccion` varchar(32) DEFAULT 'not null',
  `precio_entrada` varchar(6) DEFAULT NULL,
  `precio_salida` varchar(6) DEFAULT '0',
  `vendido` int(1) DEFAULT '0',
  `fecha` datetime DEFAULT NULL,
  `fecha_vendido` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id_inventario`, `id_refaccion`, `precio_entrada`, `precio_salida`, `vendido`, `fecha`, `fecha_vendido`) VALUES
('850c591bf19d4b9284e0a70bb16e0ed5', '4e1b989eaa564ec6bb9eef26cecdf8ef', '12', '0', 0, '2019-12-16 19:02:53', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `refacciones`
--

CREATE TABLE `refacciones` (
  `id_refaccion` varchar(32) NOT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `activo` int(1) DEFAULT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `refacciones`
--

INSERT INTO `refacciones` (`id_refaccion`, `codigo`, `descripcion`, `activo`, `modelo`, `fecha`) VALUES
('4e1b989eaa564ec6bb9eef26cecdf8ef', '59A53', 'amarillo', NULL, '2', '2019-12-16 18:20:10');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id_administrador`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id_inventario`);

--
-- Indices de la tabla `refacciones`
--
ALTER TABLE `refacciones`
  ADD PRIMARY KEY (`id_refaccion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

