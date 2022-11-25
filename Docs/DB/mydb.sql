-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 25-11-2022 a las 12:53:06
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas`
--

CREATE TABLE `etiquetas` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `etiquetas`
--

INSERT INTO `etiquetas` (`id`, `name`) VALUES
(1, 'php'),
(2, 'javascript'),
(3, 'html'),
(4, 'python'),
(5, 'docker'),
(6, 'jquery');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id` int NOT NULL,
  `id_usuario` int NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` longtext NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `id_usuario`, `titulo`, `descripcion`, `imagen`, `fecha_creacion`) VALUES
(16, 18, 'this is first question', 'firs tof the first question', 'imagenes/Company Organizational Chart (1).jpg', '2022-11-25 11:48:45'),
(17, 19, 'gorka ', 'puedo ir a mear?????? o comonasxas', 'imagenes/drive.png', '2022-11-25 12:14:57'),
(18, 19, 'this is first question', 'adsf dfhgj ghj ', NULL, '2022-11-25 12:16:39'),
(19, 20, 'holaaa esto es una prueba jhahjda casdfas asd asd fasjhahjda casdfas asd asd fasjhahjda casdfas asd asd fas', 'jhahjda casdfas asd asd fasjhahjda casdfas asd asd fasjhahjda casdfas asd asd fasjhahjda casdfas asd asd fasjhahjda casdfas asd asd fasjhahjda casdfas asd asd fasjhahjda casdfas asd asd fasjhahjda casdfas asd asd fasjhahjda casdfas asd asd fasjhahjda casdfas asd asd fasjhahjda casdfas asd asd fasjhahjda casdfas asd asd fasjhahjda casdfas asd asd fasjhahjda casdfas asd asd fasjhahjda casdfas asd asd fasjhahjda casdfas asd asd fasjhahjda casdfas asd asd fasjhahjda casdfas asd asd fasjhahjda casdfas asd asd fasjhahjda casdfas asd asd fasjhahjda casdfas asd asd fasjhahjda casdfas asd asd fasjhahjda casdfas asd asd fasjhahjda casdfas asd asd fas\r\n\r\njhahjda casdfas asd asd fasjhahjda casdfas asd asd fasjhahjda casdfas asd asd fasjhahjda casdfas asd asd fasjhahjda casdfas asd asd fasjhahjda casdfas asd asd fasjhahjda casdfas asd asd fasjhahjda casdfas asd asd fas', NULL, '2022-11-25 12:38:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas_etiquetas`
--

CREATE TABLE `preguntas_etiquetas` (
  `id` int NOT NULL,
  `id_pregunta` int NOT NULL,
  `id_etiqueta` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `preguntas_etiquetas`
--

INSERT INTO `preguntas_etiquetas` (`id`, `id_pregunta`, `id_etiqueta`) VALUES
(28, 16, 2),
(29, 16, 3),
(30, 17, 2),
(31, 17, 3),
(32, 17, 4),
(33, 19, 1),
(34, 19, 2),
(35, 19, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas_guardadas`
--

CREATE TABLE `preguntas_guardadas` (
  `id` int NOT NULL,
  `id_pregunta` int NOT NULL,
  `id_usuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `preguntas_guardadas`
--

INSERT INTO `preguntas_guardadas` (`id`, `id_pregunta`, `id_usuario`) VALUES
(24, 16, 18),
(26, 16, 20),
(27, 19, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reacciones`
--

CREATE TABLE `reacciones` (
  `id` int NOT NULL,
  `reaccion` int NOT NULL,
  `id_usuario` int NOT NULL,
  `id_respuesta` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `reacciones`
--

INSERT INTO `reacciones` (`id`, `reaccion`, `id_usuario`, `id_respuesta`) VALUES
(32, 1, 18, 15),
(33, -1, 18, 15),
(34, -1, 18, 15),
(35, -1, 18, 15),
(36, -1, 18, 15),
(37, -1, 18, 15),
(38, 1, 18, 15),
(39, 1, 19, 15),
(40, 1, 19, 15),
(41, -1, 19, 15),
(42, 1, 19, 15),
(43, -1, 19, 15),
(44, -1, 19, 15),
(45, -1, 19, 15),
(46, -1, 19, 15),
(47, -1, 19, 15),
(48, 1, 19, 15),
(49, 1, 19, 15),
(50, 1, 19, 15),
(51, 1, 19, 15),
(52, 1, 19, 15),
(53, 1, 19, 15),
(54, 1, 19, 15),
(55, 1, 19, 15),
(56, 1, 19, 15),
(57, 1, 19, 15),
(58, 1, 19, 15),
(59, 1, 19, 15),
(60, 1, 19, 15),
(61, 1, 19, 15),
(62, -1, 19, 15),
(63, -1, 19, 15),
(64, 1, 19, 16),
(65, 1, 19, 16),
(66, 1, 19, 16),
(67, -1, 19, 16),
(68, -1, 19, 16),
(69, -1, 19, 16),
(70, 1, 19, 17),
(71, 1, 19, 17),
(72, -1, 19, 17),
(73, -1, 19, 17),
(74, 1, 20, 16),
(75, 1, 20, 16),
(76, 1, 20, 17),
(77, 1, 20, 17),
(78, 1, 20, 15),
(79, 1, 20, 18),
(80, 1, 20, 18),
(81, 1, 20, 18),
(82, 1, 20, 18),
(83, 1, 20, 18),
(84, 1, 20, 18),
(85, 1, 20, 18),
(86, 1, 20, 18),
(87, 1, 20, 18),
(88, 1, 20, 18),
(89, 1, 20, 18),
(90, 1, 20, 18),
(91, 1, 20, 18),
(92, 1, 20, 18),
(93, 1, 20, 18),
(94, 1, 20, 19),
(95, 1, 20, 19),
(96, 1, 20, 19),
(97, 1, 20, 19),
(98, 1, 20, 19),
(99, 1, 20, 19),
(100, 1, 20, 19),
(101, 1, 20, 19),
(102, 1, 20, 19),
(103, 1, 20, 19),
(104, 1, 20, 19),
(105, 1, 20, 19),
(106, 1, 20, 19),
(107, 1, 20, 19),
(108, -1, 20, 19),
(109, -1, 20, 19),
(110, -1, 20, 19),
(111, -1, 20, 19),
(112, 1, 20, 19),
(113, 1, 20, 19),
(114, 1, 20, 19),
(115, 1, 20, 19),
(116, 1, 20, 19),
(117, 1, 20, 19),
(118, 1, 20, 19),
(119, 1, 20, 19),
(120, -1, 20, 19),
(121, -1, 20, 19),
(122, -1, 20, 19),
(123, -1, 20, 19),
(124, -1, 20, 19),
(125, -1, 20, 19),
(126, -1, 20, 19),
(127, 1, 20, 19),
(128, 1, 20, 19),
(129, 1, 20, 19),
(130, 1, 20, 19),
(131, -1, 20, 19),
(132, -1, 20, 19),
(133, -1, 20, 19),
(134, -1, 20, 19),
(135, -1, 20, 19),
(136, -1, 20, 18),
(137, -1, 20, 18),
(138, -1, 20, 18),
(139, 1, 20, 16),
(140, 1, 20, 17),
(141, 1, 20, 17),
(142, 1, 20, 17),
(143, 1, 20, 17),
(144, -1, 20, 17),
(145, -1, 20, 17),
(146, -1, 20, 17),
(147, -1, 20, 17),
(148, -1, 20, 17),
(149, -1, 20, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `id` int NOT NULL,
  `id_pregunta` int NOT NULL,
  `descripcion` longtext NOT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`id`, `id_pregunta`, `descripcion`, `imagen`) VALUES
(15, 16, 'this is wrong you have to do it the other way', 'imagenes/wp.png'),
(16, 16, 'pero ento qyeee eyeyee', 'imagenes/wp-removebg-preview.png'),
(17, 16, 'another respoe', NULL),
(18, 16, 'holaaa', 'imagenes/drive-removebg-preview.png'),
(19, 19, 'adfass asdf asdfasdf asdf asdf asdffs da\r\nadfass asdf asdfasdf asdf asdf asdffs daadfass asdf asdfasdf asdf asdf asdffs daadfass asdf asdfasdf asdf asdf asdffs daadfass asdf asdfasdf asdf asdf asdffs daadfass asdf asdfasdf asdf asdf asdffs daadfass asdf asdfasdf asdf asdf asdffs da\r\nadfass asdf asdfasdf asdf asdf asdffs daadfass asdf asdfasdf asdf asdf asdffs daadfass asdf asdfasdf asdf asdf asdffs daadfass asdf asdfasdf asdf asdf asdffs daadfass asdf asdfasdf asdf asdf asdffs daadfass asdf asdfasdf asdf asdf asdffs da', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(125) NOT NULL,
  `alias` varchar(40) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `alias`, `email`, `password`, `imagen`) VALUES
(17, 'Inigo', 'Bruk', 'brukk', 'bruk@gmail.com', '$2y$10$QwF54OOKIsQrYlpO0kiUXexm9FbB3qJQkN6H7c16Un3brqF.mybrC', NULL),
(18, 'Ameer test', 'Hamzatest', 'ameer', 'ameer@gmail.com', '$2y$10$boSFoKNOe1BfDpY2oWfInu7SRUMcKnGv.FV6rS.tRlyOwBYaCEi1W', 'imagenes/Paste.png'),
(19, 'brukkk', 'phpppp', 'brukoo', 'qqqbrukuyfuy@gmail.com', '$2y$10$i6.SvyeOF8UZpQsL02Sp5uEQt3zVoPL.nQ5iVsegGG7CunTf4eyjK', 'imagenes/profile.png'),
(20, 'unai', 'gomez', 'gomez01', 'gomez@gmail.com', '$2y$10$Vmo1/s34/7qiLuDEIj0mLeXRKbHiDjLyXNwOOsYRCETxpU6EYdm32', 'imagenes/green-removebg-preview.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_fk` (`id_usuario`);

--
-- Indices de la tabla `preguntas_etiquetas`
--
ALTER TABLE `preguntas_etiquetas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eti_preguntas_fk` (`id_pregunta`),
  ADD KEY `etiquetas_fk` (`id_etiqueta`);

--
-- Indices de la tabla `preguntas_guardadas`
--
ALTER TABLE `preguntas_guardadas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `preguntas_guardadas_fk` (`id_pregunta`),
  ADD KEY `preguntas_guardadas_usuario_fk` (`id_usuario`);

--
-- Indices de la tabla `reacciones`
--
ALTER TABLE `reacciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuarios_res_fk` (`id_usuario`),
  ADD KEY `respuestas_fk` (`id_respuesta`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `preguntas_fk` (`id_pregunta`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `preguntas_etiquetas`
--
ALTER TABLE `preguntas_etiquetas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `preguntas_guardadas`
--
ALTER TABLE `preguntas_guardadas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `reacciones`
--
ALTER TABLE `reacciones`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `usuario_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `preguntas_etiquetas`
--
ALTER TABLE `preguntas_etiquetas`
  ADD CONSTRAINT `eti_preguntas_fk` FOREIGN KEY (`id_pregunta`) REFERENCES `preguntas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `etiquetas_fk` FOREIGN KEY (`id_etiqueta`) REFERENCES `etiquetas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `preguntas_guardadas`
--
ALTER TABLE `preguntas_guardadas`
  ADD CONSTRAINT `preguntas_guardadas_pregunta_fk` FOREIGN KEY (`id_pregunta`) REFERENCES `preguntas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `preguntas_guardadas_usuario_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reacciones`
--
ALTER TABLE `reacciones`
  ADD CONSTRAINT `respuestas_fk` FOREIGN KEY (`id_respuesta`) REFERENCES `respuestas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_res_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `preguntas_fk` FOREIGN KEY (`id_pregunta`) REFERENCES `preguntas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
