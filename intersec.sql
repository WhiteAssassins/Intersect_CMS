-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-06-2022 a las 06:17:36
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `intersec`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `changelog`
--

CREATE TABLE `changelog` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL,
  `title` text NOT NULL,
  `txt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `color1` text NOT NULL,
  `color2` text NOT NULL,
  `mant` int(11) NOT NULL,
  `analytics` text NOT NULL,
  `download` text NOT NULL,
  `legal` text NOT NULL,
  `terms` text NOT NULL,
  `privacity` text NOT NULL,
  `menu1icon` text NOT NULL,
  `menu1header` text NOT NULL,
  `menu1text` text NOT NULL,
  `menuheader` text NOT NULL,
  `menu2icon` text NOT NULL,
  `menu2header` text NOT NULL,
  `menu2text` text NOT NULL,
  `menu3icon` text NOT NULL,
  `menu3header` text NOT NULL,
  `menu3text` text NOT NULL,
  `lang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `config`
--

INSERT INTO `config` (`id`, `color1`, `color2`, `mant`, `analytics`, `download`, `legal`, `terms`, `privacity`, `menu1icon`, `menu1header`, `menu1text`, `menuheader`, `menu2icon`, `menu2header`, `menu2text`, `menu3icon`, `menu3header`, `menu3text`, `lang`) VALUES
(1, '#2d5474', '#107e72', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL,
  `text` text NOT NULL,
  `user` text NOT NULL,
  `admin` text NOT NULL,
  `status` text NOT NULL,
  `url_slug` text NOT NULL,
  `title` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `admin` text NOT NULL,
  `user` text NOT NULL,
  `action` text NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `url_slug` text NOT NULL,
  `title` text NOT NULL,
  `descrip` text NOT NULL,
  `txt` text NOT NULL,
  `img` text NOT NULL,
  `admin` text NOT NULL,
  `date` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payments`
--

CREATE TABLE `payments` (
  `payment_id` text NOT NULL,
  `method` text NOT NULL,
  `transid` text NOT NULL,
  `1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paymentstatus`
--

CREATE TABLE `paymentstatus` (
  `id` int(11) NOT NULL,
  `uuid` text NOT NULL,
  `status` text NOT NULL,
  `user` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `image` text NOT NULL,
  `price` float(10,2) NOT NULL,
  `status` text NOT NULL,
  `url_slug` text NOT NULL,
  `descrip` text NOT NULL,
  `aatk` text NOT NULL,
  `ainterac` text NOT NULL,
  `created` text NOT NULL,
  `ingameid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` text DEFAULT NULL,
  `pass` text DEFAULT NULL,
  `email` text NOT NULL,
  `rol` int(11) NOT NULL,
  `balance` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user`, `pass`, `email`, `rol`, `balance`) VALUES
(1, 'Admin', 'e3afed0047b08059d0fada10f400c1e5', 'admin@admin.admin', 1, 0.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visits`
--

CREATE TABLE `visits` (
  `id` int(11) NOT NULL,
  `january` text NOT NULL,
  `february` text NOT NULL,
  `march` text NOT NULL,
  `april` text NOT NULL,
  `may` text NOT NULL,
  `june` text NOT NULL,
  `july` text NOT NULL,
  `august` text NOT NULL,
  `september` text NOT NULL,
  `october` text NOT NULL,
  `november` text NOT NULL,
  `december` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `visits`
--

INSERT INTO `visits` (`id`, `january`, `february`, `march`, `april`, `may`, `june`, `july`, `august`, `september`, `october`, `november`, `december`) VALUES
(1, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `changelog`
--
ALTER TABLE `changelog`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`1`);

--
-- Indices de la tabla `paymentstatus`
--
ALTER TABLE `paymentstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `changelog`
--
ALTER TABLE `changelog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT de la tabla `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `payments`
--
ALTER TABLE `payments`
  MODIFY `1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `paymentstatus`
--
ALTER TABLE `paymentstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=574;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `visits`
--
ALTER TABLE `visits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
