-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-03-2019 a las 17:34:11
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `herreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajos`
--

CREATE TABLE `trabajos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `cliente` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `precio` double(10,0) NOT NULL,
  `pago` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `calificacion` int(1) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `trabajos`
--

INSERT INTO `trabajos` (`id`, `titulo`, `fecha`, `cliente`, `foto`, `precio`, `pago`, `calificacion`, `idUsuario`) VALUES
(121, 'Canasto', '2018-03-10', 'Mariano', 'Canasto con tapa.jpg', 2500, 'Si', 3, 3),
(122, 'canasto', '2018-02-13', 'Jose', 'canasto con tapa chico.jpg', 1500, 'No', 2, 3),
(123, 'Estante', '2018-05-07', 'Maria', 'Estante.jpg', 1200, 'Si', 5, 3),
(124, 'SillÃ³n ', '2018-04-01', 'Juan', 'sillon.jpg', 1500, 'Si', 4, 3),
(125, 'Mesa Ratona', '2018-11-18', 'Alejandra', 'mesa ratona artistica.jpg', 1000, 'Si', 5, 3),
(126, 'Reposera', '2018-06-20', 'Julia', 'reposera.jpg', 2000, 'Si', 4, 3),
(127, 'sillones', '2018-02-28', 'Mirta', 'sillones.jpg', 3500, 'Si', 4, 3),
(128, 'SillÃ³n Doble', '2018-09-12', 'Mirta', 'sillon doble.jpg', 2000, 'Si', 3, 3),
(129, 'Reja', '2018-03-22', 'Luis', 'reja.jpg', 20000, 'Si', 5, 3),
(130, 'Perchero', '2018-10-26', 'Jose', 'resized_IMG-20160923-WA0004..jpg', 500, 'No', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `pass`) VALUES
(1, 'administrador', 'admin'),
(3, 'Nico', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `trabajos`
--
ALTER TABLE `trabajos`
  ADD CONSTRAINT `trabajos_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
