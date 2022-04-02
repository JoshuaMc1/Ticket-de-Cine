-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-04-2022 a las 23:58:20
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
-- Base de datos: `prb_login`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asientocliente`
--

CREATE TABLE `asientocliente` (
  `idAsiento` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idSala` int(11) NOT NULL,
  `asientoReservado` varchar(5) COLLATE utf8mb4_spanish_ci NOT NULL,
  `idPelicula` int(11) NOT NULL,
  `fechaPelicula` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `asientocliente`
--

INSERT INTO `asientocliente` (`idAsiento`, `idCliente`, `idSala`, `asientoReservado`, `idPelicula`, `fechaPelicula`, `status`) VALUES
(13, 1, 9, '1-2', 3, '2022-04-02', 1),
(14, 1, 9, '4-1', 3, '2022-04-02', 1),
(15, 1, 9, '1-2', 2, '2022-04-02', 1),
(16, 1, 9, '1-3', 2, '2022-04-02', 1),
(17, 1, 9, '1-5', 2, '2022-04-02', 1),
(18, 1, 9, '2-2', 2, '2022-04-02', 1),
(19, 1, 9, '2-4', 2, '2022-04-02', 1),
(22, 3, 9, '1-3', 3, '2022-04-02', 1),
(23, 1, 9, '1-1', 2, '2022-04-05', 1),
(24, 1, 9, '1-2', 2, '2022-04-05', 1),
(25, 3, 9, '3-3', 2, '2022-04-05', 1),
(26, 3, 9, '4-4', 2, '2022-04-05', 1),
(27, 3, 9, '3-4', 2, '2022-04-05', 1),
(28, 3, 9, '1-1', 3, '2022-04-05', 1),
(29, 1, 9, '1-3', 3, '2022-04-05', 1),
(30, 1, 9, '2-4', 3, '2022-04-05', 1),
(31, 3, 10, '2-2', 3, '2022-04-05', 1),
(32, 3, 10, '4-8', 3, '2022-04-05', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificacion`
--

CREATE TABLE `clasificacion` (
  `idClasificacion` int(11) NOT NULL,
  `nombreClasificacion` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clasificacion`
--

INSERT INTO `clasificacion` (`idClasificacion`, `nombreClasificacion`) VALUES
(1, 'PG-13');

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

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idcliente`, `dniCliente`, `nombresCliente`, `apellidosCliente`, `statusCliente`, `edadCliente`, `idGenero`) VALUES
(1, '1807200000854', 'Joshua David', 'Mclean', 1, 22, 1),
(2, '1807200000858', 'Juan Antonio', 'Rodirguez', 1, 30, 1),
(3, '1807200000850', 'Mariela', 'Ochoa', 1, 30, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `idGenero` int(11) NOT NULL,
  `genero` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`idGenero`, `genero`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generopelicula`
--

CREATE TABLE `generopelicula` (
  `idGeneroPel` int(11) NOT NULL,
  `nombreGenero` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `generopelicula`
--

INSERT INTO `generopelicula` (`idGeneroPel`, `nombreGenero`) VALUES
(1, 'Accion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `idPeliculas` int(11) NOT NULL,
  `nombrePelicula` varchar(200) NOT NULL,
  `sinopsisPelicula` text NOT NULL,
  `duracionPelicula` time NOT NULL DEFAULT '02:00:00',
  `fechaIngreso` date NOT NULL,
  `idGeneroPel` int(11) NOT NULL,
  `idClasificacion` int(11) NOT NULL,
  `statusPelicula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`idPeliculas`, `nombrePelicula`, `sinopsisPelicula`, `duracionPelicula`, `fechaIngreso`, `idGeneroPel`, `idClasificacion`, `statusPelicula`) VALUES
(2, 'Spiderman', 'Hombre araña', '02:00:00', '2022-03-10', 1, 1, 1),
(3, 'Hombres de negro 2', 'En esta entrega, los Hombres de Negro, que siempre han protegido la Tierra, deben descubrir un topo dentro de la organización MIB. Para luchar contra unos nuevos malévolos aliens camuflados como humanos utilizarán una gran tecnología.', '02:30:50', '2002-06-03', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculasala`
--

CREATE TABLE `peliculasala` (
  `idPSala` int(11) NOT NULL,
  `idSala` int(11) NOT NULL,
  `idPelicula` int(11) NOT NULL,
  `diaEstreno` date NOT NULL,
  `horaEstreno` time NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `peliculasala`
--

INSERT INTO `peliculasala` (`idPSala`, `idSala`, `idPelicula`, `diaEstreno`, `horaEstreno`, `status`) VALUES
(1, 4, 2, '2022-03-30', '12:30:00', 0),
(2, 1, 2, '2022-03-08', '18:54:00', 0),
(3, 1, 2, '2022-03-31', '19:00:00', 0),
(4, 1, 2, '2022-03-31', '12:30:00', 0),
(5, 4, 2, '2022-03-31', '12:30:00', 0),
(6, 1, 3, '2022-04-01', '12:30:00', 0),
(7, 9, 3, '2022-03-31', '12:30:00', 0),
(8, 9, 2, '2022-03-31', '03:30:00', 0),
(9, 7, 3, '2022-04-01', '12:30:00', 0),
(10, 9, 2, '2022-04-02', '12:30:00', 0),
(11, 9, 3, '2022-04-01', '12:30:00', 0),
(12, 9, 3, '2022-04-01', '19:20:00', 0),
(13, 9, 3, '2022-04-02', '13:20:00', 0),
(14, 9, 2, '2022-04-02', '12:30:00', 0),
(15, 9, 3, '2022-04-03', '13:30:00', 0),
(16, 9, 2, '2022-04-05', '12:30:00', 1),
(17, 9, 2, '2022-04-05', '16:50:00', 0),
(18, 9, 3, '2022-04-05', '16:50:00', 1),
(19, 1, 3, '2022-04-28', '12:30:00', 0),
(20, 10, 3, '2022-04-15', '12:30:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salas`
--

CREATE TABLE `salas` (
  `idSala` int(11) NOT NULL,
  `nombreSala` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `filasSala` int(11) NOT NULL,
  `asientosSala` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `salas`
--

INSERT INTO `salas` (`idSala`, `nombreSala`, `filasSala`, `asientosSala`, `status`) VALUES
(1, 'Sala principal', 10, 12, 0),
(3, 'Sala secundaria', 10, 8, 1),
(4, 'Sala secundaria', 10, 8, 0),
(5, 'Sala secundaria', 10, 8, 0),
(6, 'Sala secundaria', 10, 8, 0),
(7, 'Sala pequeña', 6, 6, 0),
(8, 'Sala grande', 10, 10, 1),
(9, 'Sala pequeña', 5, 5, 1),
(10, 'Sala principal', 10, 9, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `usuario` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `clave` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `usuario`, `clave`, `status`) VALUES
(19, 'Joshua', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1),
(22, 'Juan', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1),
(23, 'ADMIN', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1);

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
-- Indices de la tabla `asientocliente`
--
ALTER TABLE `asientocliente`
  ADD PRIMARY KEY (`idAsiento`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idSala` (`idSala`);

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
-- Indices de la tabla `peliculasala`
--
ALTER TABLE `peliculasala`
  ADD PRIMARY KEY (`idPSala`),
  ADD KEY `idSala` (`idSala`),
  ADD KEY `idPelicula` (`idPelicula`);

--
-- Indices de la tabla `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`idSala`);

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
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idSala` (`idSala`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asientocliente`
--
ALTER TABLE `asientocliente`
  MODIFY `idAsiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `clasificacion`
--
ALTER TABLE `clasificacion`
  MODIFY `idClasificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `idGenero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `generopelicula`
--
ALTER TABLE `generopelicula`
  MODIFY `idGeneroPel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `idPeliculas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `peliculasala`
--
ALTER TABLE `peliculasala`
  MODIFY `idPSala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `salas`
--
ALTER TABLE `salas`
  MODIFY `idSala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asientocliente`
--
ALTER TABLE `asientocliente`
  ADD CONSTRAINT `asientocliente_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`idcliente`),
  ADD CONSTRAINT `asientocliente_ibfk_2` FOREIGN KEY (`idSala`) REFERENCES `salas` (`idSala`);

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
-- Filtros para la tabla `peliculasala`
--
ALTER TABLE `peliculasala`
  ADD CONSTRAINT `peliculasala_ibfk_1` FOREIGN KEY (`idSala`) REFERENCES `salas` (`idSala`),
  ADD CONSTRAINT `peliculasala_ibfk_2` FOREIGN KEY (`idPelicula`) REFERENCES `peliculas` (`idPeliculas`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`idcliente`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`idPelicula`) REFERENCES `peliculas` (`idPeliculas`),
  ADD CONSTRAINT `ventas_ibfk_3` FOREIGN KEY (`idUsuario`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `ventas_ibfk_4` FOREIGN KEY (`idSala`) REFERENCES `salas` (`idSala`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
