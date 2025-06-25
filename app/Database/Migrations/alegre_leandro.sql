-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 25-06-2025 a las 02:58:49
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alegre_leandro`
--
CREATE DATABASE IF NOT EXISTS `alegre_leandro` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `alegre_leandro`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--
-- Creación: 24-06-2025 a las 09:26:56
--

CREATE TABLE `perfiles` (
  `id_perfiles` int(11) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id_perfiles`, `rol`) VALUES
(1, 'admin'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--
-- Creación: 24-06-2025 a las 09:26:59
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `perfil_id` int(11) DEFAULT 2,
  `baja` char(2) DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `apellido`, `nombre`, `usuario`, `email`, `pass`, `perfil_id`, `baja`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@gmail.com', '$2y$10$hFwITu.ONbNI7W78tzrtFuqIAvk8Zeb9vtePMe2SNPdytN6HQWq8a', 1, 'NO'),
(2, 'Messi', 'Lionel', 'messi10', 'lionel.messi@gmail.com', '$2y$10$OjrFw3JMipgxxQQp3JPT..f4Zdb61KGOtNV6wP9Cwwx0ehzW2bNBK', 1, 'NO'),
(3, 'Di María', 'Ángel', 'angelD', 'angel.dimaria@gmail.com', '$2y$10$zXrtLOLruCkk7IxG7HqLlO3dT9BJh1XyiJaaHaQAXf1TZyi/AzIGi', 2, 'SI'),
(4, 'Martinez', 'Lautaro', 'lautaroM', 'lautaro.martinez@gmail.com', '$2y$10$qAEwdvNRHKa4/.cBCw1VAOwZr5wLdSIWy5QyrO599flwqJd9kmbz2', 2, 'SI'),
(5, 'De Paul', 'Rodrigo', 'rodrigodp', 'rodrigo.depaul@gmail.com', '$2y$10$/onIuDwLsOdlkBiv4AOvmen3yELh/zSKW9lnDVeGi4ZPxHa02hTTu', 2, 'SI'),
(6, 'Emiliano', 'Emiliano', 'dibu', 'emiliano.martinez@gmail.com', '$2y$10$gq7bhMgTurtuH79iKWepFut4dSBlGFQMzBGQij3xrdPLqsCJSutD2', 2, 'NO'),
(7, 'Colapinto', 'Franco', 'frank', 'franco.colapinto@gmail.com', '$2y$10$o4mtppV0AulOKjBevpOOW.53mkw2LzuOhtR8fCSb6Vy.uySACNSWK', 2, 'NO'),
(8, 'Verstappen', 'Max', 'max', 'max.verstappen@gmail.com', '$2y$10$Zx746BLt509WoOI1sMaLmeLXvOWy3qNIvCjJP4qNeSg5AC1YmaKY.', 1, 'SI'),
(9, 'hamilton', 'Lewis', 'lewis', 'hamilton@gmail.com', '$2y$10$Px.TRA09Ti3M0JlHFINrw.ruH9CK1u8jahAgOpDI8KNxb/tfe7GM2', 2, 'NO'),
(10, 'cliente', 'cliente2', 'cliente', 'cliente@gmail.com', '$2y$10$NobdQbNcvANM6Sr2Bp8KbOchrnj8LotZqAiFc.SV2SeId85La6P/u', 2, 'NO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id_perfiles`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_perfil` (`perfil_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id_perfiles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_perfil` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id_perfiles`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
