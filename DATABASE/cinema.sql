-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-03-2022 a las 05:15:01
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cinema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificacion`
--

CREATE TABLE `clasificacion` (
  `idClasificacion` int(11) NOT NULL,
  `nombreClasificacion` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idcliente` int(11) NOT NULL,
  `dniCliente` varchar(15) NOT NULL,
  `nombresCliente` varchar(70) NOT NULL,
  `apellidosCliente` varchar(70) NOT NULL,
  `statusCliente` int(11) NOT NULL DEFAULT 1,
  `edadCliente` int(11) NOT NULL,
  `idGenero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `idGenero` int(11) NOT NULL,
  `genero` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generopelicula`
--

CREATE TABLE `generopelicula` (
  `idGeneroPel` int(11) NOT NULL,
  `nombreGenero` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `idPeliculas` int(11) NOT NULL,
  `nombrePelicula` varchar(200) NOT NULL,
  `sinopsisPelicula` text NOT NULL,
  `fechaIngreso` date NOT NULL,
  `idGeneroPel` int(11) NOT NULL,
  `idClasificacion` int(11) NOT NULL,
  `statusPelicula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `usuario` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `clave` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `usuario`, `clave`, `status`) VALUES
(1, 'levin', '123456', 1),
(2, 'Marcela', '$2y$10$DftHna5vxbusiZ5AXt8touJ', 1),
(3, 'Joshua', '$2y$10$cDUvyCSGcJ6AUoQwzrUrgeC', 1),
(4, 'Katy', '$2y$10$l9Dko2FPXXb1N2o1v72Rpe8', 1),
(5, 'Maria', '$2y$10$f/0k65gFUGqbhvqwlYaXZ.n', 1),
(6, 'Rut', '$2y$10$vpLXdi.1sI.GgX472KtCBeg', 1),
(7, 'Carlos', '$2y$10$dJgdR4qYdH3X3Q9Ldsf0.eC', 1),
(8, 'Carlo', '$2y$10$bCbmGvtWCrWuefyZdsNv/e2', 1),
(9, 'Carlo', '$2y$10$V3Ccykmc/MpmgaSkAWEfl.V', 1),
(10, 'Carlo', '$2y$10$QIiA4Jq0fKRIyHzDIbvTNeu', 1),
(11, 'Carlo', '$2y$10$voD21/hxHXYafs0TGDFpsuT', 1),
(12, 'Carlo', '$2y$10$O/7SM4mxN3sLLfs78jygB.X', 1),
(13, 'Zandi', '$2y$10$eYlUsoWeMaOW35509doZBuC', 1),
(14, 'Patricio', '$2y$10$tutOZ0akdpmS7K0SQVoSseW', 1),
(15, 'Juana', '$2y$10$YK769RtOEzPhErzOGgWzLeQ', 1),
(16, 'Manuel', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `idventas` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idPelicula` int(11) NOT NULL,
  `totalVenta` int(11) NOT NULL,
  `cantidadTotal` int(11) NOT NULL,
  `statusPelicula` int(11) NOT NULL,
  `idSala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clasificacion`
--
ALTER TABLE `clasificacion`
  ADD PRIMARY KEY (`idClasificacion`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idcliente`),
  ADD KEY `idGenero` (`idGenero`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`idGenero`);

--
-- Indices de la tabla `generopelicula`
--
ALTER TABLE `generopelicula`
  ADD PRIMARY KEY (`idGeneroPel`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`idPeliculas`),
  ADD KEY `idClasificacion` (`idClasificacion`),
  ADD KEY `idGeneroPel` (`idGeneroPel`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idPelicula` (`idPelicula`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clasificacion`
--
ALTER TABLE `clasificacion`
  MODIFY `idClasificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `idGenero` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `generopelicula`
--
ALTER TABLE `generopelicula`
  MODIFY `idGeneroPel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `idPeliculas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`idGenero`) REFERENCES `genero` (`idGenero`);

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `peliculas_ibfk_1` FOREIGN KEY (`idClasificacion`) REFERENCES `clasificacion` (`idClasificacion`),
  ADD CONSTRAINT `peliculas_ibfk_2` FOREIGN KEY (`idGeneroPel`) REFERENCES `generopelicula` (`idGeneroPel`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`idcliente`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`idPelicula`) REFERENCES `peliculas` (`idPeliculas`),
  ADD CONSTRAINT `ventas_ibfk_3` FOREIGN KEY (`idUsuario`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
