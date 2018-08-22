-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-09-2017 a las 13:57:48
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nertsport`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `ADMIN_USERNAME` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `COD_PRODUCTO` varchar(255) NOT NULL,
  `ID_COMPRA` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `ID_COMPRA` int(10) NOT NULL,
  `ADMIN_USERNAME` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles de compra`
--

CREATE TABLE `detalles de compra` (
  `COD_DETALLE_COMPRA` int(10) NOT NULL,
  `FECHA` date NOT NULL,
  `CANTIDAD` int(10) NOT NULL,
  `ESTADO` varchar(255) NOT NULL,
  `VALOR_TOTAL` int(10) NOT NULL,
  `VALOR_UNITARIO` int(10) NOT NULL,
  `COD_PRODUCTO` varchar(255) NOT NULL,
  `ID_COMPRA` int(10) NOT NULL,
  `ADMIN_USERNAME` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dettalles de ventas`
--

CREATE TABLE `dettalles de ventas` (
  `COD_PRODUCTO` varchar(255) NOT NULL,
  `ID_VENTAS` int(10) NOT NULL,
  `COD_DETALLE_VENTAS` int(10) NOT NULL,
  `VALOR_VENTA` int(10) NOT NULL,
  `FECHA_VENTA` int(10) NOT NULL,
  `USERNAME` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `USERNAME` varchar(255) NOT NULL,
  `ADMIN_USERNAME` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medio de pago`
--

CREATE TABLE `medio de pago` (
  `CONTRA_ENTREGA` varchar(255) NOT NULL,
  `GIROS` varchar(255) NOT NULL,
  `COD_DETALLE_VENTAS` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `COD_PRODUCTO` varchar(255) NOT NULL,
  `VALOR` int(10) NOT NULL,
  `REFERENCIA` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `COD__PROVEEDOR` int(10) NOT NULL,
  `COD_PRODUCTO` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `COD_USUARIO` int(30) NOT NULL,
  `NOMBRE` varchar(255) NOT NULL,
  `APELLIDO` varchar(255) NOT NULL,
  `TELEFONO` varchar(255) NOT NULL,
  `CORREO` varchar(255) NOT NULL,
  `DIRECCION` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`COD_USUARIO`, `NOMBRE`, `APELLIDO`, `TELEFONO`, `CORREO`, `DIRECCION`) VALUES
(1, 'SDF', 'HG', 'GRWER', 'FFSSDF@', 'FDSSDFDF'),
(2, 'asffwewef', 'wgwgwg', 'ee', 'grgr', 'gree'),
(3, 'efw', 'few', 'dwq', 'fsd', 'ger'),
(4, 'stiven', 'mochuelo', '3197066134', 'mochuelo@gmail.com', 'calle pepenco'),
(5, 'stiven', 'mochuelo', '3197066134', 'mochuelo@gmail.com', 'calle pepenco'),
(6, 'Yurani', 'Yunari', '12345678', 'gashgasdghj@', '5asd456d4sa56'),
(7, 'Yurani', 'Yunari', '12345678', 'gashgasdghj@', '5asd456d4sa56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `USERNAME` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `ID_VENTAS` int(10) NOT NULL,
  `USERNAME` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`ADMIN_USERNAME`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`ID_COMPRA`);

--
-- Indices de la tabla `detalles de compra`
--
ALTER TABLE `detalles de compra`
  ADD PRIMARY KEY (`COD_DETALLE_COMPRA`);

--
-- Indices de la tabla `dettalles de ventas`
--
ALTER TABLE `dettalles de ventas`
  ADD PRIMARY KEY (`COD_DETALLE_VENTAS`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`COD_PRODUCTO`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`COD__PROVEEDOR`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`COD_USUARIO`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`USERNAME`),
  ADD UNIQUE KEY `PASSWIOR` (`PASSWORD`),
  ADD KEY `USERNAME` (`USERNAME`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`ID_VENTAS`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `COD_USUARIO` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
