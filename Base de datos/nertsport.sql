-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2018 a las 14:20:34
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
  `ID_ADMIN` int(11) NOT NULL,
  `NOMBRES` varchar(50) DEFAULT NULL,
  `APELLIDOS` varchar(50) DEFAULT NULL,
  `USUARIO` varchar(50) DEFAULT NULL,
  `CORREO` varchar(255) DEFAULT NULL,
  `PASSWORD` varchar(60) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `ACTIVO` tinyint(1) NOT NULL DEFAULT '1',
  `ADMIN` tinyint(1) NOT NULL DEFAULT '0',
  `CREADO_EN` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`ID_ADMIN`, `NOMBRES`, `APELLIDOS`, `USUARIO`, `CORREO`, `PASSWORD`, `image`, `ACTIVO`, `ADMIN`, `CREADO_EN`) VALUES
(1, 'Administrador', '', NULL, 'admin', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', NULL, 1, 1, '2018-06-04 13:15:19'),
(2, 'Vendedor', 'Nert Sport', 'sellernert', 'SellerNert@gmail.com', '217165d196489592e58ed2f5cd412e9ac4505ad6', NULL, 1, 0, '2018-06-04 13:29:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `ID_CATEGORIA` int(11) NOT NULL,
  `NOMBRE` varchar(50) DEFAULT NULL,
  `NOMBRE_CORTO` varchar(200) DEFAULT NULL,
  `EN_INICIO` tinyint(1) DEFAULT NULL,
  `EN_MENU` tinyint(1) DEFAULT NULL,
  `ACTIVO` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`ID_CATEGORIA`, `NOMBRE`, `NOMBRE_CORTO`, `EN_INICIO`, `EN_MENU`, `ACTIVO`) VALUES
(1, 'Adidas', 'ADS', 0, 0, 1),
(2, 'Puma', 'PMA', 0, 0, 1),
(3, 'Nike', 'NKE', NULL, NULL, 1),
(4, 'Le coq sportfit', 'LQS', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `ID_CLIENTE` int(11) NOT NULL,
  `NOMBRE` varchar(255) DEFAULT NULL,
  `APELLIDO` varchar(50) DEFAULT NULL,
  `CORREO` varchar(50) DEFAULT NULL,
  `TELEFONO` varchar(50) DEFAULT NULL,
  `DIRECCION` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(60) DEFAULT NULL,
  `ACTIVO` tinyint(1) DEFAULT NULL,
  `CREADO_EN` datetime DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`ID_CLIENTE`, `NOMBRE`, `APELLIDO`, `CORREO`, `TELEFONO`, `DIRECCION`, `PASSWORD`, `ACTIVO`, `CREADO_EN`, `avatar`) VALUES
(1, 'Walter Esteban ', 'Montoya lucero', 'waltermontoya47@hotmail.com', '3138053315', 'Cll 44 B N 10A-95 Sur', '$1$E9/NivKr$VK4VOVSQoe.GlC1NPz6H.0', NULL, '2018-06-04 13:23:48', 'Perfiles/1.jpg'),
(2, 'Caramelito', 'De Coco', 'Caramelitodecocohotmail.com', '1234567489', 'La costa', NULL, NULL, '2018-06-04 18:24:31', NULL),
(3, 'Susana', 'Horia', 'Susanahoria47@hotmail.com', '3214567285', 'Lomas Turbas', '$1$bXHOst0P$kN6ZuAk3EjyDpvVQY9JmF.', NULL, '2018-06-04 18:50:22', NULL),
(4, 'Jurany ', 'Gongora ', 'GongoraJu@gmail.com', '3153034889', 'bosa ', '$1$rKoEA1VP$o0JbI3luwMKk.3ZhUKL0k.', NULL, '2018-06-05 06:33:38', NULL),
(5, 'Jurany ', 'Gongora ', 'GongoraJu@gmail.com', '3153034889', 'bosa ', '$1$Y/qykwcH$jwH6RF7GycJ4h88xwxBAi0', NULL, '2018-06-05 06:33:40', 'Perfiles/5.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus`
--

CREATE TABLE `estatus` (
  `ID_ESTATUS` int(11) NOT NULL,
  `NOMBRE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estatus`
--

INSERT INTO `estatus` (`ID_ESTATUS`, `NOMBRE`) VALUES
(1, 'Pendiente'),
(2, 'Pagado'),
(3, 'En Camino'),
(4, 'Entregado'),
(5, 'Cancelado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `ID_GENERO` int(11) NOT NULL,
  `NOMBRE` varchar(50) DEFAULT NULL,
  `NOMBRE_CORTO` varchar(200) DEFAULT NULL,
  `ACTIVO` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`ID_GENERO`, `NOMBRE`, `NOMBRE_CORTO`, `ACTIVO`) VALUES
(1, 'Hombre', 'HOM', 1),
(2, 'Mujer', 'MUJ', 1),
(3, 'Unisex', 'UNI', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operacion`
--

CREATE TABLE `operacion` (
  `ID_OPERACION` int(11) NOT NULL,
  `PRODUCTO_ID` int(11) DEFAULT NULL,
  `CANTIDAD` float DEFAULT NULL,
  `OPERACION_TIPO_ID` int(11) DEFAULT NULL,
  `ESTATUS_ID` int(11) DEFAULT NULL,
  `VENTA_ID` int(11) DEFAULT NULL,
  `CREADO_EN` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `operacion`
--

INSERT INTO `operacion` (`ID_OPERACION`, `PRODUCTO_ID`, `CANTIDAD`, `OPERACION_TIPO_ID`, `ESTATUS_ID`, `VENTA_ID`, `CREADO_EN`) VALUES
(3, 1, 80, 1, 2, 1, '2018-06-04 13:22:03'),
(4, 1, 1, 2, 2, 2, '2018-06-04 13:24:17'),
(5, 1, 1, 2, 2, 3, '2018-06-04 13:30:05'),
(6, 1, 20, 1, 2, 4, '2018-06-04 14:07:05'),
(7, 1, 0, 2, 5, 5, '2018-06-04 15:49:30'),
(8, 2, 120, 1, 2, 6, '2018-06-04 17:28:27'),
(9, 3, 60, 1, 2, 7, '2018-06-04 18:20:04'),
(10, 4, 80, 1, 2, 7, '2018-06-04 18:20:04'),
(11, 5, 135, 1, 2, 7, '2018-06-04 18:20:04'),
(12, 6, 39, 1, 2, 8, '2018-06-04 18:22:22'),
(13, 6, 2, 2, 1, 9, '2018-06-04 18:26:56'),
(14, 5, 3, 2, 1, 9, '2018-06-04 18:26:56'),
(15, 2, 5, 2, 1, 10, '2018-06-05 06:36:20'),
(16, 4, 5, 2, 1, 10, '2018-06-05 06:36:20'),
(17, 6, 5, 2, 1, 10, '2018-06-05 06:36:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operacion_tipo`
--

CREATE TABLE `operacion_tipo` (
  `OPERACION_ID` int(11) NOT NULL,
  `NOMBRE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `operacion_tipo`
--

INSERT INTO `operacion_tipo` (`OPERACION_ID`, `NOMBRE`) VALUES
(1, 'entrada'),
(2, 'salida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ID_PRODUCTO` int(11) NOT NULL,
  `NOMBRE_CORTO` varchar(50) DEFAULT NULL,
  `NOMBRE` varchar(50) DEFAULT NULL,
  `CODIGO` varchar(50) DEFAULT NULL,
  `DESCRIPCION` text,
  `FOTO` varchar(255) DEFAULT NULL,
  `FOTO1` varchar(255) DEFAULT NULL,
  `FOTO2` varchar(255) DEFAULT NULL,
  `ES_DESTACADO` tinyint(1) DEFAULT NULL,
  `ES_PUBLICO` tinyint(1) DEFAULT NULL,
  `EN_EXISTENCIA` tinyint(1) DEFAULT NULL,
  `INVENTARIO_MIN` int(11) DEFAULT '10',
  `CREADO_EN` datetime DEFAULT NULL,
  `ORDENADO_EN` datetime DEFAULT NULL,
  `PRECIO` float DEFAULT NULL,
  `CATEGORIA_ID` int(11) DEFAULT NULL,
  `GENERO_ID` int(11) DEFAULT NULL,
  `ADMIN_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ID_PRODUCTO`, `NOMBRE_CORTO`, `NOMBRE`, `CODIGO`, `DESCRIPCION`, `FOTO`, `FOTO1`, `FOTO2`, `ES_DESTACADO`, `ES_PUBLICO`, `EN_EXISTENCIA`, `INVENTARIO_MIN`, `CREADO_EN`, `ORDENADO_EN`, `PRECIO`, `CATEGORIA_ID`, `GENERO_ID`, `ADMIN_ID`) VALUES
(1, 'Qu5VVUA2ocC', 'Tenis Superstar', 'DSF231FRDS', 'CaracterÃ­sticas de los Tenis Superstar\r\nMarca: Adidas.\r\nModelo: C77124SUPERSTAR.\r\nTipo: urbanos.\r\nGÃ©nero: Hombre.\r\nMaterial: cuero.\r\nMaterial interno: textil.\r\nMaterial de la suela: antideslizante.\r\nTipo de suela: antideslizante.', '1_1.png', '3_2.png', '2_1.png', 1, 1, 1, 10, '2018-06-04 13:21:43', NULL, 150000, 1, 3, NULL),
(2, 'gnRcENcG6Y3', 'Tenis Galaxy 4', 'SD54EDW21', 'CaracterÃ­sticas de los Tenis Galaxy 4 de Adidas\r\nTipo: tenis de running.\r\nGÃ©nero: mujer.\r\nMaterial: textil y sintÃ©tico.\r\nMaterial interior: textil y sintÃ©tico.\r\nMaterial de la suela: goma.', '4_1.png', '5_1.png', '6_1.png', 1, 1, 1, 10, '2018-06-04 17:27:54', NULL, 120000, 1, 2, NULL),
(3, 'idG9k9qZCCE', 'Tenis Flex Experience', 'GH45642SA', 'CaracterÃ­sticas de los Tenis Flex Experience de Nike\r\nTipo: tenis de running.\r\nGÃ©nero: hombre.\r\nMaterial: 84% textil y 16% sintÃ©tico.\r\nMaterial interior: 100% poliÃ©ster.\r\nMaterial de la suela: 90% plÃ¡stico y 10% caucho.', '7.png', '9.png', '8.png', 1, 1, 1, 10, '2018-06-04 18:14:40', NULL, 149990, 3, 2, NULL),
(4, '3DJyKPIsViq', 'Tenis Enzo Strap', '423SA456E', 'CaracterÃ­sticas de los Tenis Enzo Strap de Puma\r\nTipo: tenis moda.\r\nGÃ©nero: hombre.\r\nMaterial: 90% textil y 10% sintÃ©tico.\r\nMaterial interno: 100% textil.\r\nMaterial de la suela: 100% caucho.', '10.png', '11.png', '12.png', 1, 1, 1, 15, '2018-06-04 18:16:52', NULL, 190000, 2, 1, NULL),
(5, 'zttZ7ZfduGL', 'Tenis Airmax Motion', 'HJK342BDS', 'CaracterÃ­sticas de los Tenis Airmax Motion de Nike\r\nTipo: tenis moda.\r\nGÃ©nero: mujer.\r\nMaterial: 69% textil y 31% sintÃ©tico.\r\nMaterial interno: 100% poliÃ©ster.\r\nMaterial de la suela: 60% plÃ¡stico y 40% caucho.', '13.png', '14.png', '15.png', 1, 1, 1, 20, '2018-06-04 18:18:44', NULL, 200000, 3, 2, NULL),
(6, 'GwR_LrtV3eb', 'Tenis Superstar/Negras', 'WSD4567HT', 'CaracterÃ­sticas de los Tenis Superstars Foundation\r\nGÃ©nero: hombre.\r\nTipo: urbanos.\r\nMaterial: Cuero sintÃ©tico.\r\nMaterial interno: textil.\r\nMaterial de la suela: antideslizante.\r\nTipo de cierre: Cordones .', '16.png', '17.png', '18.png', 1, 1, 1, 10, '2018-06-04 18:21:51', NULL, 150000, 1, 3, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_ver`
--

CREATE TABLE `producto_ver` (
  `ID_VER` int(11) NOT NULL,
  `VISTA_ID` int(11) DEFAULT NULL,
  `PRODUCTO_ID` int(11) DEFAULT NULL,
  `CREADO_EN` datetime DEFAULT NULL,
  `REALIP` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto_ver`
--

INSERT INTO `producto_ver` (`ID_VER`, `VISTA_ID`, `PRODUCTO_ID`, `CREADO_EN`, `REALIP`) VALUES
(1, NULL, 1, '2018-06-04 19:40:11', '::1'),
(2, NULL, 3, '2018-06-05 06:29:07', '::1'),
(3, NULL, 4, '2018-06-05 06:29:17', '::1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `ID_VENTA` int(11) NOT NULL,
  `ADMIN_ID` int(11) DEFAULT NULL,
  `CLIENTE_ID` int(11) DEFAULT NULL,
  `OPERACION_TIPO_ID` int(11) DEFAULT '2',
  `TOTAL` double DEFAULT NULL,
  `EFECTIVO` double DEFAULT NULL,
  `DESCUENTO` double DEFAULT NULL,
  `CREADO_EN` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`ID_VENTA`, `ADMIN_ID`, `CLIENTE_ID`, `OPERACION_TIPO_ID`, `TOTAL`, `EFECTIVO`, `DESCUENTO`, `CREADO_EN`) VALUES
(1, 1, NULL, 1, NULL, NULL, NULL, '2018-06-04 13:22:03'),
(2, NULL, 1, 2, NULL, NULL, NULL, '2018-06-04 13:24:17'),
(3, 1, 1, 2, 220000, NULL, 50000, '2018-06-04 13:30:05'),
(4, 1, NULL, 1, NULL, NULL, NULL, '2018-06-04 14:07:04'),
(5, NULL, 1, 2, NULL, NULL, NULL, '2018-06-04 15:49:30'),
(6, 1, NULL, 1, NULL, NULL, NULL, '2018-06-04 17:28:27'),
(7, 1, NULL, 1, NULL, NULL, NULL, '2018-06-04 18:20:04'),
(8, 1, NULL, 1, NULL, NULL, NULL, '2018-06-04 18:22:22'),
(9, NULL, 1, 2, NULL, NULL, NULL, '2018-06-04 18:26:56'),
(10, NULL, 5, 2, NULL, NULL, NULL, '2018-06-05 06:36:20');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`ID_ADMIN`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID_CATEGORIA`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ID_CLIENTE`);

--
-- Indices de la tabla `estatus`
--
ALTER TABLE `estatus`
  ADD PRIMARY KEY (`ID_ESTATUS`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`ID_GENERO`);

--
-- Indices de la tabla `operacion`
--
ALTER TABLE `operacion`
  ADD PRIMARY KEY (`ID_OPERACION`),
  ADD KEY `PRODUCTO_ID` (`PRODUCTO_ID`),
  ADD KEY `OPERACION_TIPO_ID` (`OPERACION_TIPO_ID`),
  ADD KEY `ESTATUS_ID` (`ESTATUS_ID`),
  ADD KEY `VENTA_ID` (`VENTA_ID`);

--
-- Indices de la tabla `operacion_tipo`
--
ALTER TABLE `operacion_tipo`
  ADD PRIMARY KEY (`OPERACION_ID`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID_PRODUCTO`),
  ADD KEY `CATEGORIA_ID` (`CATEGORIA_ID`),
  ADD KEY `ADMIN_ID` (`ADMIN_ID`),
  ADD KEY `GENERO_ID` (`GENERO_ID`);

--
-- Indices de la tabla `producto_ver`
--
ALTER TABLE `producto_ver`
  ADD PRIMARY KEY (`ID_VER`),
  ADD KEY `VISTA_ID` (`VISTA_ID`),
  ADD KEY `PRODUCTO_ID` (`PRODUCTO_ID`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`ID_VENTA`),
  ADD KEY `OPERACION_TIPO_ID` (`OPERACION_TIPO_ID`),
  ADD KEY `CLIENTE_ID` (`CLIENTE_ID`),
  ADD KEY `ADMIN_ID` (`ADMIN_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `ID_ADMIN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID_CATEGORIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `ID_CLIENTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estatus`
--
ALTER TABLE `estatus`
  MODIFY `ID_ESTATUS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `ID_GENERO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `operacion`
--
ALTER TABLE `operacion`
  MODIFY `ID_OPERACION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `operacion_tipo`
--
ALTER TABLE `operacion_tipo`
  MODIFY `OPERACION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ID_PRODUCTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `producto_ver`
--
ALTER TABLE `producto_ver`
  MODIFY `ID_VER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `ID_VENTA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `operacion`
--
ALTER TABLE `operacion`
  ADD CONSTRAINT `operacion_ibfk_1` FOREIGN KEY (`PRODUCTO_ID`) REFERENCES `producto` (`ID_PRODUCTO`),
  ADD CONSTRAINT `operacion_ibfk_2` FOREIGN KEY (`OPERACION_TIPO_ID`) REFERENCES `operacion_tipo` (`OPERACION_ID`),
  ADD CONSTRAINT `operacion_ibfk_3` FOREIGN KEY (`ESTATUS_ID`) REFERENCES `estatus` (`ID_ESTATUS`),
  ADD CONSTRAINT `operacion_ibfk_4` FOREIGN KEY (`VENTA_ID`) REFERENCES `venta` (`ID_VENTA`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`CATEGORIA_ID`) REFERENCES `categoria` (`ID_CATEGORIA`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`ADMIN_ID`) REFERENCES `administrador` (`ID_ADMIN`),
  ADD CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`GENERO_ID`) REFERENCES `genero` (`ID_GENERO`);

--
-- Filtros para la tabla `producto_ver`
--
ALTER TABLE `producto_ver`
  ADD CONSTRAINT `producto_ver_ibfk_1` FOREIGN KEY (`VISTA_ID`) REFERENCES `administrador` (`ID_ADMIN`),
  ADD CONSTRAINT `producto_ver_ibfk_2` FOREIGN KEY (`PRODUCTO_ID`) REFERENCES `producto` (`ID_PRODUCTO`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`OPERACION_TIPO_ID`) REFERENCES `operacion_tipo` (`OPERACION_ID`),
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`CLIENTE_ID`) REFERENCES `cliente` (`ID_CLIENTE`),
  ADD CONSTRAINT `venta_ibfk_3` FOREIGN KEY (`ADMIN_ID`) REFERENCES `administrador` (`ID_ADMIN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
