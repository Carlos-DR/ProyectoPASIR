-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-06-2020 a las 17:16:36
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `herpic`
--
CREATE DATABASE IF NOT EXISTS `herpic` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `herpic`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contrasenia` varchar(75) NOT NULL,
  `temp` tinyint(1) NOT NULL DEFAULT 0,
  `psswd` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombre`, `apellidos`, `usuario`, `email`, `contrasenia`, `temp`, `psswd`) VALUES
(1, 'Carlos', 'Domínguez Rastrojo', 'cdomras', 'carlos@ciudadjardin.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, NULL),
(2, 'David', 'Galván Ferrero', 'jakl2', 'david@iesciudadjardin.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, NULL),
(3, 'Victor', 'Gonzalez', 'Linko', 'victor@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos_cursos`
--

CREATE TABLE `alumnos_cursos` (
  `idalumno` int(11) NOT NULL,
  `idcurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumnos_cursos`
--

INSERT INTO `alumnos_cursos` (`idalumno`, `idcurso`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` int(11) NOT NULL,
  `mensaje` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `nombre`, `descripcion`) VALUES
(1, 'IAW', 'Implantación de Aplicaciones Web'),
(2, 'SAD', 'Seguridad y Alta Disponibilidad'),
(3, 'SRI', 'Servicios de Red e Internet');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos_profesores`
--

CREATE TABLE `cursos_profesores` (
  `idcurso` int(11) NOT NULL,
  `idprofesor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cursos_profesores`
--

INSERT INTO `cursos_profesores` (`idcurso`, `idprofesor`) VALUES
(2, 3),
(3, 4),
(1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examenes`
--

CREATE TABLE `examenes` (
  `id` int(11) NOT NULL,
  `tema` varchar(50) NOT NULL,
  `temanum` int(3) NOT NULL,
  `publico` tinyint(1) NOT NULL DEFAULT 0,
  `mixto` tinyint(1) NOT NULL DEFAULT 0,
  `idcurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `examenes`
--

INSERT INTO `examenes` (`id`, `tema`, `temanum`, `publico`, `mixto`, `idcurso`) VALUES
(1, 'PHP', 1, 1, 0, 1),
(2, 'HTML', 2, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `idalumno` int(11) NOT NULL,
  `idexamen` int(11) NOT NULL,
  `nota` decimal(10,0) NOT NULL DEFAULT 0,
  `fallos` decimal(10,0) NOT NULL DEFAULT 0,
  `hecho` tinyint(1) NOT NULL DEFAULT 0,
  `notatest` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `idalumno`, `idexamen`, `nota`, `fallos`, `hecho`, `notatest`) VALUES
(6, 1, 2, '7', '0', 1, '5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id` int(11) NOT NULL,
  `pregunta` varchar(100) NOT NULL,
  `correcta` varchar(50) DEFAULT NULL,
  `incorrecta1` varchar(50) DEFAULT NULL,
  `incorrecta2` varchar(50) DEFAULT NULL,
  `incorrecta3` varchar(50) DEFAULT NULL,
  `idexamen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `pregunta`, `correcta`, `incorrecta1`, `incorrecta2`, `incorrecta3`, `idexamen`) VALUES
(33, 'Pregunta 1', 'Respuesta correcta 1', 'Respuesta incorrecta 1', 'Respuesta incorrecta 2', 'Respuesta incorrecta 3', 1),
(34, 'Pregunta 2', 'Respuesta correcta 2', 'Respuesta incorrecta 4', 'Respuesta incorrecta 5', 'Respuesta incorrecta 6', 1),
(35, 'Pregunta 3', 'Respuesta correcta 3', 'Respuesta incorrecta 7', 'Respuesta incorrecta 8', 'Respuesta incorrecta 9', 1),
(36, 'Pregunta 4', 'Respuesta correcta 4', 'Respuesta incorrecta 10', 'Respuesta incorrecta 11', 'Respuesta incorrecta 12', 1),
(37, 'Pregunta 5', 'Respuesta correcta 5', 'Respuesta incorrecta 13', 'Respuesta incorrecta 14', 'Respuesta incorrecta 15', 1),
(38, 'Pregunta 6', 'Respuesta correcta 6', 'Respuesta incorrecta 16', 'Respuesta incorrecta 17', 'Respuesta incorrecta 18', 1),
(39, 'Pregunta 7', 'Respuesta correcta 7', 'Respuesta incorrecta 19', 'Respuesta incorrecta 20', 'Respuesta incorrecta 21', 1),
(40, 'Pregunta 7', 'Respuesta correcta 7', 'Respuesta incorrecta 19', 'Respuesta incorrecta 20', 'Respuesta incorrecta 21', 1),
(41, 'Pregunta 9', 'Respuesta correcta 9', 'Respuesta incorrecta 22', 'Respuesta incorrecta 23', 'Respuesta incorrecta 24', 1),
(42, 'Pregunta 10', 'Respuesta correcta 10', 'Respuesta incorrecta 25', 'Respuesta incorrecta 26', 'Respuesta incorrecta 27', 1),
(43, 'Pregunta larga 1', NULL, NULL, NULL, NULL, 2),
(44, 'Pregunta Larga 2', NULL, NULL, NULL, NULL, 2),
(45, 'pregunta larga 3', NULL, NULL, NULL, NULL, 2),
(46, 'Pregunta larga 4', NULL, NULL, NULL, NULL, 2),
(47, 'Pregunta larga 5', NULL, NULL, NULL, NULL, 2),
(48, 'Pregunta test 1', 'Respuesta correcta test 1', 'Respuesta incorrecta test 1', 'Respuesta incorrecta test 2', 'Respuesta incorrecta test 3', 2),
(49, 'Pregunta test 2', 'Respuesta correcta test 2', 'Respuesta incorrecta test 4', 'Respuesta incorrecta test 5', 'Respuesta incorrecta test 6', 2),
(50, 'Pregunta test 3', 'Respuesta correcta test 3', 'Respuesta incorrecta test 7', 'Respuesta incorrecta test 8', 'Respuesta incorrecta test 9', 2),
(51, 'Pregunta test 4', 'Respuesta correcta test 4', 'Respuesta incorrecta test 10', 'Respuesta incorrecta test 11', 'Respuesta incorrecta test 12', 2),
(52, 'Pregunta test 5', 'Respuesta correcta test 5', 'Respuesta incorrecta test 13', 'Respuesta incorrecta test 14', 'Respuesta incorrecta test 15', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contrasenia` varchar(75) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id`, `nombre`, `apellidos`, `usuario`, `email`, `contrasenia`, `admin`) VALUES
(1, 'Herpic', '', 'Herpic', 'herpic@gmail.com', '9150a8de9b1304a546f29798de4db840', 1),
(2, 'Antonio', 'Cruz', 'antoniocruz', 'antoniocruz@iesciudadjardin.com', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(3, 'Hugo', 'Fernández', 'hugfer', 'hugofernandez@iesciudadjardin.com', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(4, 'Juan Luis', 'López', 'juanlu', 'juanluislopez@iesciudadjardin.com', '81dc9bdb52d04dc20036dbd8313ed055', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `id` int(11) NOT NULL,
  `idpregunta` int(11) NOT NULL,
  `idalumno` int(11) NOT NULL,
  `respuesta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`id`, `idpregunta`, `idalumno`, `respuesta`) VALUES
(67, 47, 1, 'Respuesta larga 5'),
(68, 46, 1, 'Respuesta larga 4'),
(69, 43, 1, 'Respuesta larga 1'),
(70, 45, 1, 'Respuesta larga 3'),
(71, 44, 1, 'Respuesta larga 2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `alumnos_cursos`
--
ALTER TABLE `alumnos_cursos`
  ADD PRIMARY KEY (`idalumno`,`idcurso`),
  ADD KEY `idalumno` (`idalumno`),
  ADD KEY `idcurso` (`idcurso`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD KEY `descipcion` (`descripcion`);

--
-- Indices de la tabla `cursos_profesores`
--
ALTER TABLE `cursos_profesores`
  ADD KEY `idprofesor` (`idprofesor`),
  ADD KEY `idcurso` (`idcurso`);

--
-- Indices de la tabla `examenes`
--
ALTER TABLE `examenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcurso` (`idcurso`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idalumno` (`idalumno`),
  ADD KEY `idexamen` (`idexamen`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `examenid` (`idexamen`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpregunta` (`idpregunta`),
  ADD KEY `idalumno` (`idalumno`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `examenes`
--
ALTER TABLE `examenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos_cursos`
--
ALTER TABLE `alumnos_cursos`
  ADD CONSTRAINT `alumnos_cursos_ibfk_1` FOREIGN KEY (`idalumno`) REFERENCES `alumnos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alumnos_cursos_ibfk_2` FOREIGN KEY (`idcurso`) REFERENCES `cursos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cursos_profesores`
--
ALTER TABLE `cursos_profesores`
  ADD CONSTRAINT `cursos_profesores_ibfk_1` FOREIGN KEY (`idprofesor`) REFERENCES `profesores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cursos_profesores_ibfk_2` FOREIGN KEY (`idcurso`) REFERENCES `cursos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `examenes`
--
ALTER TABLE `examenes`
  ADD CONSTRAINT `examenes_ibfk_1` FOREIGN KEY (`idcurso`) REFERENCES `cursos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`idalumno`) REFERENCES `alumnos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notas_ibfk_2` FOREIGN KEY (`idexamen`) REFERENCES `examenes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `preguntas_ibfk_1` FOREIGN KEY (`idexamen`) REFERENCES `examenes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`idpregunta`) REFERENCES `preguntas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `respuestas_ibfk_2` FOREIGN KEY (`idalumno`) REFERENCES `alumnos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
