-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-05-2026 a las 22:07:51
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_estufa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `localidad` varchar(100) DEFAULT NULL,
  `temperatura` int(11) DEFAULT NULL,
  `ideal` int(11) NOT NULL,
  `clima` varchar(100) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id`, `numero`, `localidad`, `temperatura`, `ideal`, `clima`, `fecha`) VALUES
(1, 0, 'tropezon', 23, 0, 'soleado', '2026-05-04 20:10:42'),
(2, 0, 'tropezon', 23, 0, 'soleado', '2026-05-04 20:10:49'),
(3, 0, 'messi', 34, 0, 'nublado', '2026-05-04 20:11:23'),
(4, 0, 'tropezon', 34, 0, 'soleado', '2026-05-05 18:58:15'),
(5, 0, 'tropezon', 32, 0, 'meado', '2026-05-05 18:59:29'),
(6, 0, 'bitti', 67, 0, 'meado', '2026-05-05 18:59:42'),
(7, 0, 'maia tiene ', -424, 0, 'sexo telefonico', '2026-05-05 19:00:04'),
(8, 0, 'maia', -4, 0, 'bitti', '2026-05-05 19:00:15'),
(9, 0, 'tres de febrero', 13, 0, 'soleado', '2026-05-11 19:20:19'),
(10, 0, 'estufini bananini', 123, 0, 'soleado', '2026-05-11 19:22:13'),
(11, 0, 'mi casa', 4, 0, 'mao meno', '2026-05-11 19:25:14'),
(12, 1, 'Sala Principal', 22, 0, 'Calefaccionando', '2026-05-11 19:41:50'),
(13, 1, 'Sala Principal', 22, 0, 'Calefaccionando', '2026-05-11 19:43:14'),
(14, 0, 'localidad67', 67, 0, 'clima67', '2026-05-11 19:56:39'),
(15, 0, '15', 16, 0, 'mediomedio', '2026-05-11 20:02:15'),
(16, 0, '15', 16, 0, 'mediomedio', '2026-05-11 20:04:12'),
(17, 0, '15', 16, 0, 'mediomedio', '2026-05-11 20:05:01'),
(18, 0, '15', 16, 0, 'mediomedio', '2026-05-11 20:05:08'),
(19, 0, '15', 16, 0, 'mediomedio', '2026-05-11 20:05:36'),
(20, 0, '15', 16, 0, 'mediomedio', '2026-05-11 20:05:38'),
(21, 0, '11', 53, 0, 'Zabala con nubes', '2026-05-11 20:06:26');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
