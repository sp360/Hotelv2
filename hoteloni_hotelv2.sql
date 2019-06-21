-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 21-06-2019 a las 08:45:36
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hoteloni_hotelv2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `checks`
--

CREATE TABLE `checks` (
  `id_check` int(11) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `id_guest` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `extra`
--

CREATE TABLE `extra` (
  `id_extra` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `costo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `extra`
--

INSERT INTO `extra` (`id_extra`, `nombre`, `costo`) VALUES
(4, 'Almohada', 200),
(5, 'Cama King', 1000),
(6, 'Hamburguesa', 70);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guest`
--

CREATE TABLE `guest` (
  `id_guest` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `address` varchar(300) NOT NULL,
  `genero` varchar(30) NOT NULL,
  `tipoidentificacion` varchar(30) NOT NULL,
  `nidentificacion` int(11) NOT NULL,
  `tel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `guest`
--

INSERT INTO `guest` (`id_guest`, `nombre`, `address`, `genero`, `tipoidentificacion`, `nidentificacion`, `tel`) VALUES
(11, 'sergio pena', 'Ave. Galaxia #99. Parque Industrial Mexicali Mexicali, BC. C.P. 21210.', 'Hombre', 'Pasaporte', 321, '555434421');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guest_extras`
--

CREATE TABLE `guest_extras` (
  `id_guestextras` int(11) NOT NULL,
  `id_guest` int(11) NOT NULL,
  `id_extra` int(11) NOT NULL,
  `pago` int(11) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `guest_extras`
--

INSERT INTO `guest_extras` (`id_guestextras`, `id_guest`, `id_extra`, `pago`, `date`) VALUES
(63, 11, 5, 1, '2019-06-06'),
(64, 11, 4, 1, '2019-06-06'),
(65, 11, 5, 1, '2019-06-05'),
(66, 11, 5, 1, '2019-06-05'),
(67, 11, 5, 1, '2019-06-05'),
(68, 11, 5, 1, '2019-06-05'),
(69, 11, 4, 1, '2019-06-05'),
(70, 11, 5, 1, '2019-06-06'),
(71, 11, 4, 1, '2019-06-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id_pago` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `pagocon` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  `id_guest` int(11) NOT NULL,
  `cambio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roomguest`
--

CREATE TABLE `roomguest` (
  `roomguest_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `id_guest` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `precio` int(11) NOT NULL,
  `estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rooms`
--

INSERT INTO `rooms` (`room_id`, `categoria`, `precio`, `estado`) VALUES
(8, 'Sencilla', 1000, 'Mantenimiento'),
(9, 'Sencilla', 500, 'Disponible'),
(10, 'Deluxe', 1500, 'Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `user` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `checks`
--
ALTER TABLE `checks`
  ADD PRIMARY KEY (`id_check`),
  ADD KEY `id_guest` (`id_guest`);

--
-- Indices de la tabla `extra`
--
ALTER TABLE `extra`
  ADD PRIMARY KEY (`id_extra`);

--
-- Indices de la tabla `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id_guest`);

--
-- Indices de la tabla `guest_extras`
--
ALTER TABLE `guest_extras`
  ADD PRIMARY KEY (`id_guestextras`),
  ADD KEY `id_guest` (`id_guest`),
  ADD KEY `id_extra` (`id_extra`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `id_guest` (`id_guest`);

--
-- Indices de la tabla `roomguest`
--
ALTER TABLE `roomguest`
  ADD PRIMARY KEY (`roomguest_id`),
  ADD KEY `roomid` (`room_id`),
  ADD KEY `idguest` (`id_guest`);

--
-- Indices de la tabla `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `checks`
--
ALTER TABLE `checks`
  MODIFY `id_check` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `extra`
--
ALTER TABLE `extra`
  MODIFY `id_extra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `guest`
--
ALTER TABLE `guest`
  MODIFY `id_guest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `guest_extras`
--
ALTER TABLE `guest_extras`
  MODIFY `id_guestextras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roomguest`
--
ALTER TABLE `roomguest`
  MODIFY `roomguest_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `checks`
--
ALTER TABLE `checks`
  ADD CONSTRAINT `checks_ibfk_1` FOREIGN KEY (`id_guest`) REFERENCES `guest` (`id_guest`);

--
-- Filtros para la tabla `guest_extras`
--
ALTER TABLE `guest_extras`
  ADD CONSTRAINT `guest_extras_ibfk_1` FOREIGN KEY (`id_guest`) REFERENCES `guest` (`id_guest`),
  ADD CONSTRAINT `guest_extras_ibfk_2` FOREIGN KEY (`id_extra`) REFERENCES `extra` (`id_extra`);

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`id_guest`) REFERENCES `guest` (`id_guest`);

--
-- Filtros para la tabla `roomguest`
--
ALTER TABLE `roomguest`
  ADD CONSTRAINT `roomguest_ibfk_1` FOREIGN KEY (`id_guest`) REFERENCES `guest` (`id_guest`),
  ADD CONSTRAINT `roomguest_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
