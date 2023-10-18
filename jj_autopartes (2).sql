-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2023 a las 23:33:44
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
-- Base de datos: `jj_autopartes`
--
CREATE DATABASE IF NOT EXISTS `jj_autopartes` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `jj_autopartes`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `categorias`:
--

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `categoria`) VALUES
(1, 'auto'),
(2, 'moto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `producto` varchar(50) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `precio` double NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `productos`:
--   `id_categoria`
--       `categorias` -> `id_categoria`
--

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`producto`, `descripcion`, `precio`, `id_categoria`, `id_producto`) VALUES
('carburador', 'NO APTO PARA USO CON METANOl\r\nApto Moto 2T y 4T\r\nPWK 28MM Main jet : 120 - Pilot jet : 48 Power Jet (apto motores 125CC a 150cc)\r\nPWK 30MM Main jet : 138 - Pilot jet : 48 Power Jet (apto motores)', 27000, 2, 1),
('computadora programable', 'Estas buscando hacer la mezcla aire, chispa y nafta mas efectiva? o te cansaste de renegar con tu compu original? No te preocupes, por suerte para usted, en JyJ Autopartes tenemos stock', 89000, 1, 2),
('ruedas michellini', 'De tantos kilometros recorridos tus cubiertas necesitan un cambio, o simplemente tu vehiculo no pasa la vtv. No te preocupes, por suerte para usted, en JyJ Autopartes tenemos la solucion', 70000, 1, 3),
('dico de freno', 'Ya no te importa nada y queres ir mas fuerte que nunca o te viste todas las pelis de Rapidos y Furiosos juntas y estas re manija, no te preocupes en JyJ Auntomotores la solucion para frenar', 16000, 2, 4),
('bujias iridium', 'No por nada son las mas vendidas, es un repuesto barato y eficaz.  No te preocupes, por suerte para usted, en JyJ Autopartes tenemos todas las variedades y precios para ofrecerte..\r\n', 7000, 2, 5),
('valvulas de moto', 'El juego de valvulas es el tipico repuesto que vas a tener que comprar si sos de los cabeza de termo que pasan en la avenida tirando cortes a las 3am, por suerte para usted, en JJ tenemos valvulas', 2141, 2, 6),
('radiador de aceite', 'Es una decision muy madura de tu parte cambiar el radiador de aceite de tu moto... o tal vez simplemente se lo rompiste de un piedrazo.  No te preocupes, en jj hay repuesto para todo.', 6890, 2, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nombre` varchar(70) NOT NULL,
  `password` varchar(200) NOT NULL,
  `roll` text NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `usuarios`:
--

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre`, `password`, `roll`, `id_usuario`) VALUES
('webadmin', '$2y$10$jzC5./zxtplk1kbsx6w6cu0sIWhuyPHVfbJSc123IB6.7bSxn09/e', 'admin', 7),
('usuario', '$2y$10$PtydscLZWgpzoILQBroCVuohDxIKL5BIKcAYd5L7tTy7xJX3j3o8e', 'usuario', 8);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`),
  ADD KEY `categoria` (`categoria`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
