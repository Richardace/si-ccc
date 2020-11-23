-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2020 a las 06:41:22
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `siccc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `clave` text NOT NULL,
  `valor` text NOT NULL,
  `dateCambio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `config`
--

INSERT INTO `config` (`id`, `clave`, `valor`, `dateCambio`) VALUES
(1, 'documentSesion', '[{\"elemento\":\"../documentConfig//SESIONES COMITÉ CURRICULAR CENTRAL VIGENCIA 2020.docx\"}]', '2020-11-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correcciones`
--

CREATE TABLE `correcciones` (
  `id` int(11) NOT NULL,
  `id_document` int(11) NOT NULL,
  `date_correccion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `observaciones` text NOT NULL,
  `documentos` text NOT NULL,
  `folder` text NOT NULL,
  `state` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `correcciones`
--

INSERT INTO `correcciones` (`id`, `id_document`, `date_correccion`, `observaciones`, `documentos`, `folder`, `state`) VALUES
(7, 28, '2020-11-16 16:06:00', 'se encontraron errores en la linea tal', '[{\"elemento\":\"../documentos-correcciones/BCHHMH28wyy/correos.xlsx\"}]', 'BCHHMH28wyy', 'Corregido'),
(8, 28, '2020-11-16 21:16:16', 'esta todo mal', '[{\"elemento\":\"../documentos-correcciones/BCHHMH28wyy/condicionales.PNG\"}]', 'BCHHMH28wyy', 'Pendiente'),
(9, 28, '2020-11-16 21:16:23', 'esta todo mal', '[{\"elemento\":\"../documentos-correcciones/BCHHMH28wyy/condicionales.PNG\"}]', 'BCHHMH28wyy', 'Pendiente'),
(10, 28, '2020-11-16 21:28:13', 'esta todo mal', '[{\"elemento\":\"../documentos-correcciones/BCHHMH28wyy/condicionales.PNG\"}]', 'BCHHMH28wyy', 'Corregido'),
(11, 28, '2020-11-16 21:17:48', 'esta todo mal', '[{\"elemento\":\"../documentos-correcciones/BCHHMH28wyy/condicionales.PNG\"}]', 'BCHHMH28wyy', 'Pendiente'),
(12, 28, '2020-11-16 21:17:56', 'esta todo mal', '[{\"elemento\":\"../documentos-correcciones/BCHHMH28wyy/credencialesBDHostinguer.txt\"}]', 'BCHHMH28wyy', 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correoautorizado`
--

CREATE TABLE `correoautorizado` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `correoautorizado`
--

INSERT INTO `correoautorizado` (`id`, `email`) VALUES
(31, 'richardalexanderar@ufps.edu.co'),
(33, 'elenarm@ufps.edu.co'),
(82, 'marthaalejandracm@ufps.edu.co'),
(84, 'marilymaydeebb@ufps.edu.co'),
(97, 'joseluissm@ufps.edu.co'),
(99, 'richardacevedo98@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE `documento` (
  `id` int(11) NOT NULL,
  `radicado` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `sesion` int(11) NOT NULL,
  `dateRegister` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` text NOT NULL,
  `description` text NOT NULL,
  `files` text NOT NULL,
  `state` varchar(45) NOT NULL,
  `nameFolder` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `documento`
--

INSERT INTO `documento` (`id`, `radicado`, `id_user`, `sesion`, `dateRegister`, `title`, `description`, `files`, `state`, `nameFolder`) VALUES
(28, 7787, 107, 10, '2020-11-16 21:28:13', 'Acreditacion', 'Solicitud de Acreditacion', '[{\"elemento\":\"../documentos/BCHHMH28wyy/controlGoogle (1).php\"}]', 'En Revisión', 'BCHHMH28wyy'),
(29, 9787, 107, 14, '2020-11-19 03:38:23', 'jh', 'jh', '[{\"elemento\":\"../documentos/MHn2nvz8wBz/controlGoogle (1).php\"}]', 'Revisado Por Evaluador', 'MHn2nvz8wBz'),
(30, 0, 107, 0, '2020-11-19 04:48:34', 'asd', 'ads', '[{\"elemento\":\"../documentos/q9n29HpqM0n/documentos (4).zip\"}]', 'Radicado', 'q9n29HpqM0n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento_evaluador`
--

CREATE TABLE `documento_evaluador` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_document` int(11) NOT NULL,
  `dateLimit` date NOT NULL,
  `dateRegister` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `observaciones` text NOT NULL,
  `files` text NOT NULL,
  `key_access` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `documento_evaluador`
--

INSERT INTO `documento_evaluador` (`id`, `id_user`, `id_document`, `dateLimit`, `dateRegister`, `observaciones`, `files`, `key_access`) VALUES
(98, 105, 28, '2020-11-28', '2020-11-19 03:39:17', '', '', 'zBDOzpqq7nzqwM7'),
(99, 112, 28, '2020-11-28', '2020-11-16 15:52:14', 'Los documentos estan perfectos', '', 'zBDOzpqq7nzqwM7'),
(100, 105, 28, '2020-12-02', '2020-11-16 20:53:57', '', '', 'qzBq892Cwwn9BvM'),
(101, 112, 28, '2020-12-02', '2020-11-16 20:53:57', '', '', 'qzBq892Cwwn9BvM'),
(102, 105, 28, '2020-12-03', '2020-11-16 21:00:10', '', '', 'CnqqAx8y09D0889'),
(103, 125, 28, '2020-12-03', '2020-11-19 05:20:34', '', '', 'CnqqAx8y09D0889'),
(104, 112, 29, '2020-12-03', '2020-11-19 03:39:43', 'Los documentos estan bien', '[{\"elemento\":\"../documentos/correcciones-MHn2nvz8wBz/CI-MMT-03 Manual tecnico.docx\"}]', 'zwvDpBHyqAOzA9D');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE `facultad` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `facultad`
--

INSERT INTO `facultad` (`id`, `name`) VALUES
(3, 'FACULTAD DE EDUCACIÓN ARTES Y HUMANIDADES'),
(4, 'FACULTAD DE CIENCIAS EMPRESARIALES'),
(5, 'FACULTAD DE INGENIERÍA'),
(6, 'FACULTAD DE CIENCIAS BÁSICAS'),
(7, 'FACULTAD DE CIENCIAS DE LA SALUD'),
(8, 'FACULTAD DE CIENCIAS AGRARIAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad_user`
--

CREATE TABLE `facultad_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `facultad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id_origin` int(11) NOT NULL,
  `user_id_destiny` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `dateMessage` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `state` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `messages`
--

INSERT INTO `messages` (`id`, `user_id_origin`, `user_id_destiny`, `title`, `description`, `dateMessage`, `state`) VALUES
(3, 0, 107, 'Prueba', 'Esto es una Prueba', '2020-11-19 03:02:06', 'Leido'),
(5, 107, 0, 'Solicitante', 'esto es del solicitante', '2020-11-19 03:09:38', 'Leido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `program`
--

INSERT INTO `program` (`id`, `name`) VALUES
(1, 'PLAN DE ESTUDIO DE INGENIERIA DE SISTEMAS'),
(2, 'PLAN DE ESTUDIO DE INGENIERIA CIVIL'),
(3, 'PLAN DE ESTUDIO DE ENFERMERIA'),
(4, 'PLAN DE ESTUDIO DE COMUNICACIÓN SOCIAL'),
(5, 'PLAN DE ESTUDIO DE TRABAJO SOCIAL'),
(6, 'PLAN DE ESTUDIO DE INGENIERIA ELECTRONICA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `program_user`
--

CREATE TABLE `program_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `program_user`
--

INSERT INTO `program_user` (`id`, `user_id`, `program_id`) VALUES
(15, 105, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `description`) VALUES
(1, 'administrador'),
(2, 'solicitante'),
(3, 'user'),
(4, 'default');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesiones`
--

CREATE TABLE `sesiones` (
  `id` int(11) NOT NULL,
  `fechaSesion` date NOT NULL,
  `fechaLimite` date NOT NULL,
  `semestre` int(11) NOT NULL,
  `anio` int(11) NOT NULL,
  `state` varchar(45) NOT NULL,
  `stateView` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sesiones`
--

INSERT INTO `sesiones` (`id`, `fechaSesion`, `fechaLimite`, `semestre`, `anio`, `state`, `stateView`) VALUES
(10, '2020-03-12', '2020-02-05', 2, 2020, 'Activo', 'Visible'),
(14, '2020-11-26', '2020-11-21', 2, 2020, 'Activo', 'Visible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `state_documents`
--

CREATE TABLE `state_documents` (
  `id` int(11) NOT NULL,
  `id_document` int(11) NOT NULL,
  `date_action` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `state_documents`
--

INSERT INTO `state_documents` (`id`, `id_document`, `date_action`, `description`) VALUES
(1, 28, '2020-11-16 01:39:17', 'Creación de la Solicitud'),
(2, 28, '2020-11-16 15:01:25', 'Se Asignaron Evaluadores al Documento'),
(3, 28, '2020-11-16 15:56:07', 'Revisado por Evaluadores'),
(5, 28, '2020-11-16 16:02:13', 'Se devuelve el documento a la dependencia con correcciones'),
(6, 28, '2020-11-16 16:06:00', 'Documento regresado con correcciones por parte de la dependencia'),
(7, 28, '2020-11-16 16:07:04', 'Se cambio el estado del documento a: Activo'),
(8, 28, '2020-11-16 20:53:57', 'Se Asignaron Evaluadores al Documento'),
(9, 28, '2020-11-16 21:00:10', 'Se Asignaron Evaluadores al Documento'),
(10, 28, '2020-11-16 21:16:16', 'Se devuelve el documento a la dependencia con correcciones'),
(11, 28, '2020-11-16 21:16:23', 'Se devuelve el documento a la dependencia con correcciones'),
(12, 28, '2020-11-16 21:16:36', 'Se devuelve el documento a la dependencia con correcciones'),
(13, 28, '2020-11-16 21:17:48', 'Se devuelve el documento a la dependencia con correcciones'),
(14, 28, '2020-11-16 21:17:56', 'Se devuelve el documento a la dependencia con correcciones'),
(15, 28, '2020-11-16 21:28:13', 'Documento regresado con correcciones por parte de la dependencia'),
(16, 29, '2020-11-19 03:32:54', 'Creación de la Solicitud'),
(17, 29, '2020-11-19 03:36:08', 'Se Asignaron Evaluadores al Documento'),
(18, 29, '2020-11-19 03:38:23', 'Revisado por Evaluadores'),
(19, 29, '2020-11-19 03:39:43', 'Revisado por Evaluadores'),
(20, 30, '2020-11-19 04:48:34', 'Creación de la Solicitud'),
(22, 28, '2020-11-19 05:05:17', 'Se Cambio Evaluador al Documento'),
(23, 28, '2020-11-19 05:12:50', 'Se Cambio Evaluador al Documento'),
(24, 28, '2020-11-19 05:15:45', 'Se Cambio Evaluador al Documento'),
(25, 28, '2020-11-19 05:16:22', 'Se Cambio Evaluador al Documento'),
(26, 28, '2020-11-19 05:17:35', 'Se Cambio Evaluador al Documento'),
(27, 28, '2020-11-19 05:18:57', 'Se Cambio Evaluador al Documento'),
(28, 28, '2020-11-19 05:20:34', 'Se Cambio Evaluador al Documento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `email` text NOT NULL,
  `avatar` text NOT NULL,
  `pass` text NOT NULL,
  `sess` text NOT NULL,
  `state` varchar(45) NOT NULL,
  `idGoogle` text NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `email`, `avatar`, `pass`, `sess`, `state`, `idGoogle`, `rol_id`) VALUES
(34, 'RICHARD ALEXANDER', 'ACEVEDO RAMIREZ', 'richardalexanderar@ufps.edu.co', 'https://lh3.googleusercontent.com/a-/AOh14Ghhj6x56v2woEfoupfS0Vcs3-wpaLK2T9ZyJLrvYw=s96-c', '8702D', 'CzC9y72Czy', 'Activo', '113994634397366122437', 1),
(105, 'Marilym Aydee', 'Bayona Buitrago', 'marilymaydeebb@ufps.edu.co', 'https://lh3.googleusercontent.com/a-/AOh14GgBCmwlAcjguxz258mtm4IWma6gZmABuY5anjGP=s96-c', '89z9C', 'BBC0DyAxzD', 'Activo', '107391479196001137101', 3),
(107, 'MARIA ELENA', 'RAMIREZ', 'elenarm@ufps.edu.co', 'https://lh3.googleusercontent.com/a-/AOh14GhbUyOFzT4YwaC92Gibw3nJb1RIWT21rAE2e72T=s96-c', 'zA0vB', 'z8wv9Bvyz7', 'Activo', '118082641516354265029', 2),
(112, 'Richard', 'Acevedo', 'richardacevedo98@gmail.com', 'https://lh3.googleusercontent.com/a-/AOh14Ggjh-GxxYaJe43FIh8rqDTC2ORNLFJNRJ0LCTDGsw=s96-c', 'z7x0w', '92yzzD0D0z', 'Inactivo', '102956759349957572463', 3),
(125, '', '', 'marthaalejandracm@ufps.edu.co', '', '', '', 'Activo', '', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `correcciones`
--
ALTER TABLE `correcciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `correoautorizado`
--
ALTER TABLE `correoautorizado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `documento_evaluador`
--
ALTER TABLE `documento_evaluador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_document` (`id_document`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `facultad`
--
ALTER TABLE `facultad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `facultad_user`
--
ALTER TABLE `facultad_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `facultad_id` (`facultad_id`);

--
-- Indices de la tabla `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `program_user`
--
ALTER TABLE `program_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `program_id` (`program_id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `state_documents`
--
ALTER TABLE `state_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_document` (`id_document`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol_id` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `correcciones`
--
ALTER TABLE `correcciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `correoautorizado`
--
ALTER TABLE `correoautorizado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de la tabla `documento`
--
ALTER TABLE `documento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `documento_evaluador`
--
ALTER TABLE `documento_evaluador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT de la tabla `facultad`
--
ALTER TABLE `facultad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `facultad_user`
--
ALTER TABLE `facultad_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `program_user`
--
ALTER TABLE `program_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `state_documents`
--
ALTER TABLE `state_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `documento`
--
ALTER TABLE `documento`
  ADD CONSTRAINT `documento_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `documento_evaluador`
--
ALTER TABLE `documento_evaluador`
  ADD CONSTRAINT `documento_evaluador_ibfk_1` FOREIGN KEY (`id_document`) REFERENCES `documento` (`id`),
  ADD CONSTRAINT `documento_evaluador_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `facultad_user`
--
ALTER TABLE `facultad_user`
  ADD CONSTRAINT `facultad_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `facultad_user_ibfk_2` FOREIGN KEY (`facultad_id`) REFERENCES `facultad` (`id`);

--
-- Filtros para la tabla `program_user`
--
ALTER TABLE `program_user`
  ADD CONSTRAINT `program_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `program_user_ibfk_2` FOREIGN KEY (`program_id`) REFERENCES `program` (`id`);

--
-- Filtros para la tabla `state_documents`
--
ALTER TABLE `state_documents`
  ADD CONSTRAINT `state_documents_ibfk_1` FOREIGN KEY (`id_document`) REFERENCES `documento` (`id`);

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
