-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2020 a las 23:45:58
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tuclaseenlinea`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `idactividad` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `idmateria` int(11) NOT NULL,
  `semana` varchar(50) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`idactividad`, `titulo`, `idmateria`, `semana`, `descripcion`) VALUES
(1, 'Actividad pagina', 1, 'Semana 1', ' prueba1'),
(2, 'prueba 1', 1, 'Semana 1', ' pruebasss');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE `cuentas` (
  `usuario` varchar(20) NOT NULL,
  `clave` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`usuario`, `clave`) VALUES
('dplopez', '123456'),
('jisalazar', 'admin01'),
('jisalsa', '123456789');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `idmateriacurso` int(11) NOT NULL,
  `materia` varchar(20) NOT NULL,
  `grado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`idmateriacurso`, `materia`, `grado`) VALUES
(1, 'Matematicas', 11),
(2, 'Matematicas', 10),
(3, 'Matematicas', 9),
(4, 'Biologia', 11),
(5, 'Biologia', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notamateria`
--

CREATE TABLE `notamateria` (
  `identificacion` int(11) NOT NULL,
  `idmateria` int(11) NOT NULL,
  `idactividad` int(11) NOT NULL,
  `resolucion` text COLLATE utf8_unicode_ci NOT NULL,
  `nota` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `notamateria`
--

INSERT INTO `notamateria` (`identificacion`, `idmateria`, `idactividad`, `resolucion`, `nota`) VALUES
(123456789, 1, 1, 'prueba nueva', 1),
(123456789, 1, 2, 'prueba', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `identificacion` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `tipo` text NOT NULL,
  `grado` int(2) NOT NULL,
  `nombres` text NOT NULL,
  `apellidos` text NOT NULL,
  `fechanacimiento` date NOT NULL,
  `genero` text NOT NULL,
  `direccion` text NOT NULL,
  `telefono` int(10) NOT NULL,
  `correo` text NOT NULL,
  `nombreColegio` varchar(200) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`identificacion`, `usuario`, `tipo`, `grado`, `nombres`, `apellidos`, `fechanacimiento`, `genero`, `direccion`, `telefono`, `correo`, `nombreColegio`, `estado`) VALUES
(123456789, 'jisalsa', 'Estudiante', 11, 'Johan Ivan', 'Salazar santana', '2020-05-25', 'Masculino', 'cra 25A #1g-10', 2147483647, 'johansal@gmail.com', 'lpsgm', 1),
(987654321, 'dplopez', 'Docente', 11, 'diana paola', 'lopez diaz', '1989-01-01', 'Femenino', 'av falsa # 1 -23', 5557899, 'dianapaola@gmail.com', 'lpsgm', 1),
(1032406515, 'jisalazar', 'Administrador', 11, 'Johan Ivan', 'Salazar santana', '1988-01-24', 'Masculino', 'cra 25A #1g-10', 2147483647, 'johansal@gmail.com', 'lpsgm', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

CREATE TABLE `visitas` (
  `id` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `direccionip` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `direccionip4` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `visitas`
--

INSERT INTO `visitas` (`id`, `fecha`, `direccionip`, `direccionip4`) VALUES
(1, '2020-05-25 16:04:10', '::1', '127.0.0.1'),
(2, '2020-05-25 16:04:35', '::1', '127.0.0.1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`idactividad`),
  ADD KEY `idmateria` (`idmateria`);

--
-- Indices de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`usuario`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`idmateriacurso`);

--
-- Indices de la tabla `notamateria`
--
ALTER TABLE `notamateria`
  ADD KEY `id` (`identificacion`),
  ADD KEY `idactividad` (`idactividad`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`identificacion`),
  ADD UNIQUE KEY `usuariounico` (`usuario`);

--
-- Indices de la tabla `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `idactividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `idmateriacurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `visitas`
--
ALTER TABLE `visitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `actividades_ibfk_1` FOREIGN KEY (`idmateria`) REFERENCES `materias` (`idmateriacurso`);

--
-- Filtros para la tabla `notamateria`
--
ALTER TABLE `notamateria`
  ADD CONSTRAINT `notamateria_ibfk_1` FOREIGN KEY (`identificacion`) REFERENCES `usuarios` (`identificacion`),
  ADD CONSTRAINT `notamateria_ibfk_2` FOREIGN KEY (`idactividad`) REFERENCES `actividades` (`idactividad`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `cuentas` (`usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
