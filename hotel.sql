-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2019 at 02:34 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `checks`
--

CREATE TABLE `checks` (
  `id_check` int(11) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `id_guest` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checks`
--

INSERT INTO `checks` (`id_check`, `checkin`, `checkout`, `id_guest`) VALUES
(1, '2019-06-25', '2019-06-30', 11),
(2, '2019-06-25', '2019-06-28', 13);

-- --------------------------------------------------------

--
-- Table structure for table `extra`
--

CREATE TABLE `extra` (
  `id_extra` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `costo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extra`
--

INSERT INTO `extra` (`id_extra`, `nombre`, `costo`) VALUES
(4, 'Almohada', 200),
(5, 'Cama King', 1000),
(6, 'Hamburguesa', 70),
(7, 'x', 555);

-- --------------------------------------------------------

--
-- Table structure for table `guest`
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
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`id_guest`, `nombre`, `address`, `genero`, `tipoidentificacion`, `nidentificacion`, `tel`) VALUES
(11, 'sergio pena', 'Ave. Galaxia #99. Parque Industrial Mexicali Mexicali, BC. C.P. 21210.', 'Hombre', 'Pasaporte', 321, '555434421'),
(13, 'Carlos P.', 'Av. Santa isabel #34', 'Hombre', 'Pasaporte', 32655, '656565656');

-- --------------------------------------------------------

--
-- Table structure for table `guest_extras`
--

CREATE TABLE `guest_extras` (
  `id_guestextras` int(11) NOT NULL,
  `id_guest` int(11) NOT NULL,
  `id_extra` int(11) NOT NULL,
  `pago` int(11) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest_extras`
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
(71, 11, 4, 1, '2019-06-06'),
(72, 11, 4, 1, '2019-06-23'),
(73, 11, 5, 1, '2019-06-23'),
(74, 11, 7, 1, '2019-06-23'),
(78, 11, 5, 1, '2019-06-24'),
(79, 11, 6, 1, '2019-06-24'),
(81, 13, 4, 1, '0000-00-00'),
(82, 11, 5, 0, '0000-00-00'),
(83, 11, 6, 0, '0000-00-00'),
(84, 11, 4, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `pago`
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
-- Dumping data for table `pago`
--

INSERT INTO `pago` (`id_pago`, `total`, `pagocon`, `fecha`, `id_guest`, `cambio`) VALUES
(1, 3570, '', '2019-06-25', 11, 0),
(2, 4700, '', '2019-06-25', 13, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roomguest`
--

CREATE TABLE `roomguest` (
  `roomguest_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `id_guest` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roomguest`
--

INSERT INTO `roomguest` (`roomguest_id`, `room_id`, `id_guest`) VALUES
(1, 9, 11);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `precio` int(11) NOT NULL,
  `estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `categoria`, `precio`, `estado`) VALUES
(8, 'Sencilla', 1000, 'Mantenimiento'),
(9, 'Sencilla', 500, 'Ocupado'),
(10, 'Deluxe', 1500, 'Disponible');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `user` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checks`
--
ALTER TABLE `checks`
  ADD PRIMARY KEY (`id_check`),
  ADD KEY `id_guest` (`id_guest`);

--
-- Indexes for table `extra`
--
ALTER TABLE `extra`
  ADD PRIMARY KEY (`id_extra`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id_guest`);

--
-- Indexes for table `guest_extras`
--
ALTER TABLE `guest_extras`
  ADD PRIMARY KEY (`id_guestextras`),
  ADD KEY `id_guest` (`id_guest`),
  ADD KEY `id_extra` (`id_extra`);

--
-- Indexes for table `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `id_guest` (`id_guest`);

--
-- Indexes for table `roomguest`
--
ALTER TABLE `roomguest`
  ADD PRIMARY KEY (`roomguest_id`),
  ADD KEY `roomid` (`room_id`),
  ADD KEY `idguest` (`id_guest`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checks`
--
ALTER TABLE `checks`
  MODIFY `id_check` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `extra`
--
ALTER TABLE `extra`
  MODIFY `id_extra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `id_guest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `guest_extras`
--
ALTER TABLE `guest_extras`
  MODIFY `id_guestextras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `pago`
--
ALTER TABLE `pago`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roomguest`
--
ALTER TABLE `roomguest`
  MODIFY `roomguest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `checks`
--
ALTER TABLE `checks`
  ADD CONSTRAINT `checks_ibfk_1` FOREIGN KEY (`id_guest`) REFERENCES `guest` (`id_guest`);

--
-- Constraints for table `guest_extras`
--
ALTER TABLE `guest_extras`
  ADD CONSTRAINT `guest_extras_ibfk_1` FOREIGN KEY (`id_guest`) REFERENCES `guest` (`id_guest`),
  ADD CONSTRAINT `guest_extras_ibfk_2` FOREIGN KEY (`id_extra`) REFERENCES `extra` (`id_extra`);

--
-- Constraints for table `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`id_guest`) REFERENCES `guest` (`id_guest`);

--
-- Constraints for table `roomguest`
--
ALTER TABLE `roomguest`
  ADD CONSTRAINT `roomguest_ibfk_1` FOREIGN KEY (`id_guest`) REFERENCES `guest` (`id_guest`),
  ADD CONSTRAINT `roomguest_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
