-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 21-06-2019 a las 08:45:06
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
-- Base de datos: `hoteloni_hotel`
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

--
-- Volcado de datos para la tabla `checks`
--

INSERT INTO `checks` (`id_check`, `checkin`, `checkout`, `id_guest`) VALUES
(1, '2019-06-04', '2019-06-20', 9),
(2, '2019-06-04', '2019-06-06', 3),
(3, '2019-06-05', '2019-06-14', 1),
(1, '2019-06-04', '2019-06-20', 9),
(2, '2019-06-04', '2019-06-06', 3),
(3, '2019-06-05', '2019-06-14', 1);

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
(1, 'Cama King', 1000),
(2, 'cama queen', 500),
(3, 'Almohada', 200),
(1, 'Cama King', 1000),
(2, 'cama queen', 500),
(3, 'Almohada', 200);

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
(1, 'Carlos Martinez', ' Ave. Galaxia #99. Parque Indu', 'Hombre', 'Pasaporte', 12345, '1563789922'),
(2, 'sergio pena', 'Ave. Galaxia #99. Parque Industrial Mexicali Mexicali, BC. C.P. 21210.', '1', '1', 321, '6563590077'),
(3, 'Alfredo Martinez', 'stamadeloro 34', 'Hombre', 'Pasaporte', 2222, '2321234232'),
(4, 'Alejandro Castillo', 'stamadeloro 34', 'Hombre', 'Pasaporte', 33, '231432'),
(5, 'Edgar R.', 'Ave. Galaxia #99. Parque Industrial Mexicali Mexicali, BC. C.P. 21210.', 'Hombre', 'Pasaporte', 321, '6563590077'),
(6, 'fernando m', 'www', 'Hombre', 'Pasaporte', 2, '231'),
(7, 'perla c', 'dasa', 'Hombre', 'Pasaporte', 22, '232'),
(8, 'Sara Castillo', 'puerto de pal', 'Mujer', 'Pasaporte', 321, '43331333'),
(9, 'Paco Gerlo', 'dsadsadsa', 'Hombre', 'Pasaporte', 3411, '322442'),
(10, 'Alma Marla', 'sadw', 'Hombre', 'Pasaporte', 43243, '3213213'),
(1, 'Carlos Martinez', ' Ave. Galaxia #99. Parque Indu', 'Hombre', 'Pasaporte', 12345, '1563789922'),
(2, 'sergio pena', 'Ave. Galaxia #99. Parque Industrial Mexicali Mexicali, BC. C.P. 21210.', '1', '1', 321, '6563590077'),
(3, 'Alfredo Martinez', 'stamadeloro 34', 'Hombre', 'Pasaporte', 2222, '2321234232'),
(4, 'Alejandro Castillo', 'stamadeloro 34', 'Hombre', 'Pasaporte', 33, '231432'),
(5, 'Edgar R.', 'Ave. Galaxia #99. Parque Industrial Mexicali Mexicali, BC. C.P. 21210.', 'Hombre', 'Pasaporte', 321, '6563590077'),
(6, 'fernando m', 'www', 'Hombre', 'Pasaporte', 2, '231'),
(7, 'perla c', 'dasa', 'Hombre', 'Pasaporte', 22, '232'),
(8, 'Sara Castillo', 'puerto de pal', 'Mujer', 'Pasaporte', 321, '43331333'),
(9, 'Paco Gerlo', 'dsadsadsa', 'Hombre', 'Pasaporte', 3411, '322442'),
(10, 'Alma Marla', 'sadw', 'Hombre', 'Pasaporte', 43243, '3213213');

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
(23, 9, 1, 1, '0000-00-00'),
(24, 3, 2, 1, '0000-00-00'),
(30, 9, 2, 1, '0000-00-00'),
(31, 9, 3, 1, '0000-00-00'),
(56, 9, 2, 1, '0000-00-00'),
(57, 9, 3, 1, '0000-00-00');

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

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`id_pago`, `total`, `pagocon`, `fecha`, `id_guest`, `cambio`) VALUES
(1, 4700, '', '2019-06-04', 9, 51),
(2, 9500, '', '2019-06-04', 3, 500),
(3, 3000, '', '2019-06-05', 1, 500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `queri`
--

CREATE TABLE `queri` (
  `qid` int(11) NOT NULL,
  `queri` varchar(535) NOT NULL
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
(1, 'Sencilla', 1000, 'Disponible'),
(2, 'Doble', 3000, 'Disponible'),
(3, 'Deluxe', 5000, 'Disponible'),
(4, 'Sencilla', 1000, 'Disponible'),
(5, 'Doble', 3000, 'Limpiando'),
(6, 'Doble', 3000, 'Disponible'),
(7, 'Sencilla', 500, 'Limpiando');

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
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `user`, `password`, `rol`) VALUES
(2, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1);

--
-- Índices para tablas volcadas
--

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
-- Indices de la tabla `queri`
--
ALTER TABLE `queri`
  ADD PRIMARY KEY (`qid`);

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
-- AUTO_INCREMENT de la tabla `guest_extras`
--
ALTER TABLE `guest_extras`
  MODIFY `id_guestextras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `queri`
--
ALTER TABLE `queri`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roomguest`
--
ALTER TABLE `roomguest`
  MODIFY `roomguest_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
