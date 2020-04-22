-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-04-2020 a las 16:37:40
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(2, 'Tanish', '3000', 'diosito', 'tanish@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, NULL);

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
(1, 2),
(2, 1),
(2, 2);

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
(1, 'Inglés', 'Aprende inglés con nosotros'),
(2, 'Oposiciones abogados', 'Prepárate para las oposiciones'),
(3, 'Streamlabs', 'Aprende a stremear con el tio Herpic');

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
(2, 2),
(3, 8),
(1, 3),
(3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examenes`
--

CREATE TABLE `examenes` (
  `id` int(11) NOT NULL,
  `tema` varchar(50) NOT NULL,
  `temanum` int(3) NOT NULL,
  `publico` tinyint(1) NOT NULL DEFAULT 0,
  `idcurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `examenes`
--

INSERT INTO `examenes` (`id`, `tema`, `temanum`, `publico`, `idcurso`) VALUES
(1, 'Prueba 1', 1, 1, 2),
(2, 'Examen 2', 3, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `idalumno` int(11) NOT NULL,
  `idexamen` int(11) NOT NULL,
  `nota` decimal(10,0) NOT NULL DEFAULT 0,
  `hecho` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`idalumno`, `idexamen`, `nota`, `hecho`) VALUES
(1, 2, '0', 0);

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
(1, 'pregunta 1', 'esta es la buena ', 'esta es mala', 'esta tambien', 'cuidao', 1),
(2, 'Esta es la pregunta', NULL, NULL, NULL, NULL, 1),
(3, 'Otra mas', 'jkadfsgj', 'kjbnlk', 'hjbl', 'hv', 1),
(4, 'mas preguntas', 'kjdfgkj', 'kjhlkjh', 'kjh', 'kjhjkhb', 1),
(5, 'jkfngkjn', 'khjbljhgvgv', 'ljhbvljh', 'jhlvbhj', 'ljkhbljh', 1),
(6, 'fdghdfgh', NULL, NULL, NULL, NULL, 1),
(7, 'dfgsdfhsj', 'dfgsdfgsdfgh', 'dsfgsdfg', 'dafgdsafgh', 'dfhsdfh', 1),
(8, 'sdfgsdfgh', NULL, NULL, NULL, NULL, 1),
(9, 'sfghsdfgh', 'gfdgsdfgsdfh', 'sdfhsdfh', 'sdfhgsdfh', 'dfhsdfgh', 1),
(10, 'sdfhsdfgh', 'dsfhgsfdgh', 'hfgdh', 'dfsgsdfg', 'sdfh', 1),
(23, 'Una pregunta', 'werterty', 'fdgj', 'dgasdf', 'fghdfgh', 2),
(24, 'otra rpegunta', 'hsrght', 'asdffgsd', 'gdhjghkj', 'asdgfadfg', 2),
(25, 'mas preuntas', 'kfhgjk', 'sdaf', 'dfhav', 'bhsfj', 2),
(26, 'Illo no se me cocurre mas y quedan 7', 'fghjfsgj', 'dsfgadfh', 'sfgh', 'sfgjdhfgj', 2),
(27, 'Tu lo sabes?', 'dfghd', 'fhsfgjsfj', 'sfgjdshgj', 'afgadfhg', 2),
(28, 'cualquier pregunta', NULL, NULL, NULL, NULL, 2),
(29, 'mas tio mas', NULL, NULL, NULL, NULL, 2),
(30, 'por qué?', NULL, NULL, NULL, NULL, 2),
(31, 'por qué no?', NULL, NULL, NULL, NULL, 2),
(32, 'ultima pregunta', NULL, NULL, NULL, NULL, 2);

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
(2, 'Antonio', 'Cruz', 'antoniocruz', 'antoniocruz@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(3, 'David', 'Galván', 'Jakl2', 'ksjdhf@kjsdfn.com', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(8, 'Manolito', 'Gafotas', 'ManuGafo', 'manolitos@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(10, 'Juan', 'Morales Lopez', 'juanmi', 'juan@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0);

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
(1, 28, 1, 'Hola buenas'),
(2, 31, 1, 'dfgsdf'),
(3, 29, 1, 'asdfgadfg'),
(4, 30, 1, 'asdfhadfgh'),
(5, 2, 1, 'esto es una respuesta'),
(6, 6, 1, 'dfgafd'),
(7, 8, 1, 'afdsgafdg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `examenes`
--
ALTER TABLE `examenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
