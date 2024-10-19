-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-06-2024 a las 21:39:55
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `terciario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_admin` int(10) NOT NULL,
  `DNI` int(10) DEFAULT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `apellido` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `genero` varchar(10) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `nacionalidad` varchar(20) DEFAULT NULL,
  `direccion` varchar(30) DEFAULT NULL,
  `id_localidad` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `Id_Alumno` int(10) NOT NULL,
  `DNI` int(10) DEFAULT NULL,
  `Nombre` varchar(20) DEFAULT NULL,
  `Apellido` varchar(20) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `Genero` varchar(10) DEFAULT NULL,
  `Fecha_Nac` date DEFAULT NULL,
  `Nacionalidad` varchar(20) DEFAULT NULL,
  `Direccion` varchar(30) DEFAULT NULL,
  `id_localidad` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno_carrera`
--

CREATE TABLE `alumno_carrera` (
  `Id_Alumno` int(10) DEFAULT NULL,
  `Id_Carrera` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno_grado`
--

CREATE TABLE `alumno_grado` (
  `Id_Alumno` int(10) DEFAULT NULL,
  `Id_Grado` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno_plan`
--

CREATE TABLE `alumno_plan` (
  `id_plan` int(10) NOT NULL,
  `id_alumno` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno_uc`
--

CREATE TABLE `alumno_uc` (
  `id_alumno` int(10) DEFAULT NULL,
  `id_uc` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `id_asistencia` int(10) NOT NULL,
  `id_alumno` int(10) DEFAULT NULL,
  `Id_uc` int(10) DEFAULT NULL,
  `asistencia` varchar(50) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aspirante`
--

CREATE TABLE `aspirante` (
  `id_aspirante` int(10) NOT NULL,
  `DNI` int(10) DEFAULT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `apellido` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `genero` varchar(10) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `nacionalidad` varchar(20) DEFAULT NULL,
  `direccion` varchar(30) DEFAULT NULL,
  `id_localidad` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula`
--

CREATE TABLE `aula` (
  `id_aula` int(10) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `capacidad` int(10) DEFAULT NULL,
  `tipo_aula` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bedel`
--

CREATE TABLE `bedel` (
  `id_bedel` int(10) NOT NULL,
  `DNI` int(10) DEFAULT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `apellido` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `genero` varchar(10) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `nacionalidad` varchar(20) DEFAULT NULL,
  `direccion` varchar(30) DEFAULT NULL,
  `id_localidad` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cambio_docente`
--

CREATE TABLE `cambio_docente` (
  `id_cambio` int(10) NOT NULL,
  `id_docente_anterior` int(10) DEFAULT NULL,
  `id_docente_nuevo` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `Id_Carrera` int(10) NOT NULL,
  `Carrera` varchar(70) DEFAULT NULL,
  `Cupo` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera_plan`
--

CREATE TABLE `carrera_plan` (
  `id_plan` int(10) NOT NULL,
  `id_carrera` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera_uc`
--

CREATE TABLE `carrera_uc` (
  `Id_Carrera` int(10) DEFAULT NULL,
  `Id_UC` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correlatividades`
--

CREATE TABLE `correlatividades` (
  `Id_Correlativa` int(10) NOT NULL,
  `Id_UC` int(10) DEFAULT NULL,
  `Correlativa` int(10) DEFAULT NULL,
  `Id_Carrera` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupos`
--

CREATE TABLE `cupos` (
  `Id_Cupos` int(10) NOT NULL,
  `Id_Carrera` int(10) DEFAULT NULL,
  `Ano_Lectivo` year(4) DEFAULT NULL,
  `Cupos_Disp` int(10) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disponibilidad`
--

CREATE TABLE `disponibilidad` (
  `id_disp` int(10) NOT NULL,
  `id_uc` int(10) DEFAULT NULL,
  `id_docente` int(10) DEFAULT NULL,
  `id_h_p_d` int(10) DEFAULT NULL,
  `id_aula` int(10) DEFAULT NULL,
  `id_grado` int(10) DEFAULT NULL,
  `dia` varchar(50) DEFAULT NULL,
  `modulo_inicio` time DEFAULT NULL,
  `modulo_fin` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `id_docente` int(10) NOT NULL,
  `DNI` int(10) DEFAULT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `apellido` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `genero` varchar(10) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `nacionalidad` varchar(20) DEFAULT NULL,
  `direccion` varchar(30) DEFAULT NULL,
  `estudios` varchar(40) NOT NULL,
  `id_localidad` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente_uc`
--

CREATE TABLE `docente_uc` (
  `id_docente` int(10) DEFAULT NULL,
  `id_uc` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentacion`
--

CREATE TABLE `documentacion` (
  `id_documento` int(10) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examenes`
--

CREATE TABLE `examenes` (
  `id_examen` int(10) NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `id_aula` int(10) DEFAULT NULL,
  `id_docente` int(10) DEFAULT NULL,
  `id_uc` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha_evento`
--

CREATE TABLE `fecha_evento` (
  `id_f_evento` int(10) NOT NULL,
  `detalle` varchar(100) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `Id_Grado` int(10) NOT NULL,
  `Grado` int(10) DEFAULT NULL,
  `Division` int(10) DEFAULT NULL,
  `Detalle` varchar(70) DEFAULT NULL,
  `Capacidad` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado_uc`
--

CREATE TABLE `grado_uc` (
  `Id_Grado` int(10) DEFAULT NULL,
  `Id_UC` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id_horario` int(10) NOT NULL,
  `dia` varchar(50) DEFAULT NULL,
  `modulo_inicio` time DEFAULT NULL,
  `modulo_fin` time DEFAULT NULL,
  `modalidad` varchar(50) DEFAULT NULL,
  `id_disp` int(10) DEFAULT NULL,
  `id_uc` int(10) DEFAULT NULL,
  `id_aula` int(10) DEFAULT NULL,
  `id_grado` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_previo_docente`
--

CREATE TABLE `horario_previo_docente` (
  `id_h_p_d` int(10) NOT NULL,
  `id_docente` int(10) DEFAULT NULL,
  `dia` varchar(50) DEFAULT NULL,
  `hora` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `Id_Inscripcion` int(10) NOT NULL,
  `FechaHora` datetime DEFAULT NULL,
  `Id_Alumno` int(10) DEFAULT NULL,
  `Id_Carrera` int(10) DEFAULT NULL,
  `Id_Grado` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion_aspirante`
--

CREATE TABLE `inscripcion_aspirante` (
  `Id_inscripcion` int(10) NOT NULL,
  `FechaHora` datetime DEFAULT NULL,
  `Id_Aspirante` int(10) DEFAULT NULL,
  `Id_Carrera` int(10) DEFAULT NULL,
  `Id_Grado` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion_examen`
--

CREATE TABLE `inscripcion_examen` (
  `id_inscripcion` int(10) NOT NULL,
  `fechaHora` datetime DEFAULT NULL,
  `id_alumno` int(10) DEFAULT NULL,
  `id_examen` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion_uc`
--

CREATE TABLE `inscripcion_uc` (
  `Id_Inscripcion` int(10) DEFAULT NULL,
  `Id_UC` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE `localidad` (
  `id_localidad` int(10) NOT NULL,
  `localidad` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `Id_Nota` int(10) NOT NULL,
  `Id_UC` int(10) DEFAULT NULL,
  `Id_Alumno` int(10) DEFAULT NULL,
  `Id_Carrera` int(10) DEFAULT NULL,
  `Nota` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_estudio`
--

CREATE TABLE `plan_estudio` (
  `id_plan` int(10) NOT NULL,
  `detalle` varchar(50) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_ins_asp`
--

CREATE TABLE `registro_ins_asp` (
  `id_registro` int(10) NOT NULL,
  `id_aspirante` int(10) DEFAULT NULL,
  `id_documento` int(10) DEFAULT NULL,
  `id_turno` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id_solicitud` int(11) NOT NULL,
  `id_alumno` int(11) DEFAULT NULL,
  `id_categoria` int(10) DEFAULT NULL,
  `mensaje` varchar(300) DEFAULT NULL,
  `id_status` int(1) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE `turno` (
  `id_turno` int(10) NOT NULL,
  `id_f_evento` int(10) DEFAULT NULL,
  `hora_turno` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uc_plan`
--

CREATE TABLE `uc_plan` (
  `id_plan` int(10) NOT NULL,
  `id_uc` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_curricular`
--

CREATE TABLE `unidad_curricular` (
  `Id_UC` int(10) NOT NULL,
  `Unidad_Curricular` varchar(60) DEFAULT NULL,
  `Tipo` varchar(20) DEFAULT NULL,
  `HorasSem` int(10) DEFAULT NULL,
  `HorasAnual` int(10) DEFAULT NULL,
  `Formato` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `fk_local` (`id_localidad`);

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`Id_Alumno`),
  ADD KEY `id_localidad` (`id_localidad`);

--
-- Indices de la tabla `alumno_carrera`
--
ALTER TABLE `alumno_carrera`
  ADD KEY `fk_alumno_carrera_alumno` (`Id_Alumno`),
  ADD KEY `fk_alumno_carrera_carrera` (`Id_Carrera`);

--
-- Indices de la tabla `alumno_grado`
--
ALTER TABLE `alumno_grado`
  ADD KEY `fk_alumno_grado_alumno` (`Id_Alumno`),
  ADD KEY `fk_alumno_grado_grado` (`Id_Grado`);

--
-- Indices de la tabla `alumno_plan`
--
ALTER TABLE `alumno_plan`
  ADD PRIMARY KEY (`id_plan`,`id_alumno`),
  ADD KEY `id_alumno` (`id_alumno`);

--
-- Indices de la tabla `alumno_uc`
--
ALTER TABLE `alumno_uc`
  ADD KEY `id_uc` (`id_uc`),
  ADD KEY `id_alumno` (`id_alumno`);

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`id_asistencia`),
  ADD KEY `id_alumno` (`id_alumno`),
  ADD KEY `Id_uc` (`Id_uc`);

--
-- Indices de la tabla `aspirante`
--
ALTER TABLE `aspirante`
  ADD PRIMARY KEY (`id_aspirante`),
  ADD KEY `id_localidad` (`id_localidad`);

--
-- Indices de la tabla `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`id_aula`);

--
-- Indices de la tabla `bedel`
--
ALTER TABLE `bedel`
  ADD PRIMARY KEY (`id_bedel`),
  ADD KEY `id_localidad` (`id_localidad`);

--
-- Indices de la tabla `cambio_docente`
--
ALTER TABLE `cambio_docente`
  ADD PRIMARY KEY (`id_cambio`),
  ADD KEY `id_docente_anterior` (`id_docente_anterior`),
  ADD KEY `id_docente_nuevo` (`id_docente_nuevo`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`Id_Carrera`);

--
-- Indices de la tabla `carrera_plan`
--
ALTER TABLE `carrera_plan`
  ADD PRIMARY KEY (`id_plan`,`id_carrera`),
  ADD KEY `id_carrera` (`id_carrera`);

--
-- Indices de la tabla `carrera_uc`
--
ALTER TABLE `carrera_uc`
  ADD KEY `fk_carrera_uc_uc` (`Id_UC`),
  ADD KEY `fk_carrera_uc_carrera` (`Id_Carrera`);

--
-- Indices de la tabla `correlatividades`
--
ALTER TABLE `correlatividades`
  ADD PRIMARY KEY (`Id_Correlativa`),
  ADD KEY `fk_correlatividades_uc` (`Id_UC`),
  ADD KEY `fk_correlatividades_carrera` (`Id_Carrera`),
  ADD KEY `fk_correlatividades_correlativa` (`Correlativa`);

--
-- Indices de la tabla `cupos`
--
ALTER TABLE `cupos`
  ADD PRIMARY KEY (`Id_Cupos`),
  ADD KEY `fk_cupos_carrera` (`Id_Carrera`);

--
-- Indices de la tabla `disponibilidad`
--
ALTER TABLE `disponibilidad`
  ADD PRIMARY KEY (`id_disp`),
  ADD KEY `id_uc` (`id_uc`),
  ADD KEY `id_docente` (`id_docente`),
  ADD KEY `id_h_p_d` (`id_h_p_d`),
  ADD KEY `id_aula` (`id_aula`),
  ADD KEY `id_grado` (`id_grado`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`id_docente`),
  ADD KEY `id_localidad` (`id_localidad`);

--
-- Indices de la tabla `docente_uc`
--
ALTER TABLE `docente_uc`
  ADD KEY `id_docente` (`id_docente`),
  ADD KEY `id_uc` (`id_uc`);

--
-- Indices de la tabla `documentacion`
--
ALTER TABLE `documentacion`
  ADD PRIMARY KEY (`id_documento`);

--
-- Indices de la tabla `examenes`
--
ALTER TABLE `examenes`
  ADD PRIMARY KEY (`id_examen`),
  ADD KEY `id_uc` (`id_uc`),
  ADD KEY `id_docente` (`id_docente`),
  ADD KEY `id_aula` (`id_aula`);

--
-- Indices de la tabla `fecha_evento`
--
ALTER TABLE `fecha_evento`
  ADD PRIMARY KEY (`id_f_evento`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`Id_Grado`);

--
-- Indices de la tabla `grado_uc`
--
ALTER TABLE `grado_uc`
  ADD KEY `fk_grado_uc_uc` (`Id_UC`),
  ADD KEY `grado_uc_FK` (`Id_Grado`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id_horario`),
  ADD KEY `id_aula` (`id_aula`),
  ADD KEY `id_grado` (`id_grado`),
  ADD KEY `id_uc` (`id_uc`),
  ADD KEY `id_disp` (`id_disp`);

--
-- Indices de la tabla `horario_previo_docente`
--
ALTER TABLE `horario_previo_docente`
  ADD PRIMARY KEY (`id_h_p_d`),
  ADD KEY `id_docente` (`id_docente`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`Id_Inscripcion`),
  ADD KEY `fk_inscripcion_alumno` (`Id_Alumno`),
  ADD KEY `fk_inscripcion_carrera` (`Id_Carrera`),
  ADD KEY `fk_inscripcion_grado` (`Id_Grado`);

--
-- Indices de la tabla `inscripcion_aspirante`
--
ALTER TABLE `inscripcion_aspirante`
  ADD PRIMARY KEY (`Id_inscripcion`),
  ADD KEY `fk_inscripcion_aspirante` (`Id_Aspirante`),
  ADD KEY `fk_inscripcion_carrera2` (`Id_Carrera`),
  ADD KEY `fk_inscripcion_grado2` (`Id_Grado`);

--
-- Indices de la tabla `inscripcion_examen`
--
ALTER TABLE `inscripcion_examen`
  ADD PRIMARY KEY (`id_inscripcion`),
  ADD KEY `id_alumno` (`id_alumno`),
  ADD KEY `id_examen` (`id_examen`);

--
-- Indices de la tabla `inscripcion_uc`
--
ALTER TABLE `inscripcion_uc`
  ADD KEY `Id_Inscripcion` (`Id_Inscripcion`),
  ADD KEY `Id_UC` (`Id_UC`);

--
-- Indices de la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD PRIMARY KEY (`id_localidad`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`Id_Nota`),
  ADD KEY `fk_notas_uc` (`Id_UC`),
  ADD KEY `fk_notas_alumno` (`Id_Alumno`),
  ADD KEY `fk_notas_carrera` (`Id_Carrera`);

--
-- Indices de la tabla `plan_estudio`
--
ALTER TABLE `plan_estudio`
  ADD PRIMARY KEY (`id_plan`);

--
-- Indices de la tabla `registro_ins_asp`
--
ALTER TABLE `registro_ins_asp`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `id_aspirante` (`id_aspirante`),
  ADD KEY `id_documento` (`id_documento`),
  ADD KEY `id_turno` (`id_turno`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id_solicitud`),
  ADD KEY `id_alumno` (`id_alumno`);

--
-- Indices de la tabla `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`id_turno`),
  ADD KEY `id_f_evento` (`id_f_evento`);

--
-- Indices de la tabla `uc_plan`
--
ALTER TABLE `uc_plan`
  ADD PRIMARY KEY (`id_plan`,`id_uc`),
  ADD KEY `id_uc` (`id_uc`);

--
-- Indices de la tabla `unidad_curricular`
--
ALTER TABLE `unidad_curricular`
  ADD PRIMARY KEY (`Id_UC`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `Id_Alumno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id_asistencia` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `aspirante`
--
ALTER TABLE `aspirante`
  MODIFY `id_aspirante` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `aula`
--
ALTER TABLE `aula`
  MODIFY `id_aula` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bedel`
--
ALTER TABLE `bedel`
  MODIFY `id_bedel` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cambio_docente`
--
ALTER TABLE `cambio_docente`
  MODIFY `id_cambio` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `Id_Carrera` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `correlatividades`
--
ALTER TABLE `correlatividades`
  MODIFY `Id_Correlativa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `cupos`
--
ALTER TABLE `cupos`
  MODIFY `Id_Cupos` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `disponibilidad`
--
ALTER TABLE `disponibilidad`
  MODIFY `id_disp` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `id_docente` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `documentacion`
--
ALTER TABLE `documentacion`
  MODIFY `id_documento` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `examenes`
--
ALTER TABLE `examenes`
  MODIFY `id_examen` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fecha_evento`
--
ALTER TABLE `fecha_evento`
  MODIFY `id_f_evento` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `Id_Grado` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id_horario` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horario_previo_docente`
--
ALTER TABLE `horario_previo_docente`
  MODIFY `id_h_p_d` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `Id_Inscripcion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `inscripcion_aspirante`
--
ALTER TABLE `inscripcion_aspirante`
  MODIFY `Id_inscripcion` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inscripcion_examen`
--
ALTER TABLE `inscripcion_examen`
  MODIFY `id_inscripcion` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `localidad`
--
ALTER TABLE `localidad`
  MODIFY `id_localidad` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `Id_Nota` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `plan_estudio`
--
ALTER TABLE `plan_estudio`
  MODIFY `id_plan` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registro_ins_asp`
--
ALTER TABLE `registro_ins_asp`
  MODIFY `id_registro` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `turno`
--
ALTER TABLE `turno`
  MODIFY `id_turno` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `unidad_curricular`
--
ALTER TABLE `unidad_curricular`
  MODIFY `Id_UC` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `fk_local` FOREIGN KEY (`id_localidad`) REFERENCES `localidad` (`id_localidad`);

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`id_localidad`) REFERENCES `localidad` (`id_localidad`);

--
-- Filtros para la tabla `alumno_carrera`
--
ALTER TABLE `alumno_carrera`
  ADD CONSTRAINT `fk_alumno_carrera_alumno` FOREIGN KEY (`Id_Alumno`) REFERENCES `alumno` (`Id_Alumno`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_alumno_carrera_carrera` FOREIGN KEY (`Id_Carrera`) REFERENCES `carrera` (`Id_Carrera`) ON DELETE CASCADE;

--
-- Filtros para la tabla `alumno_grado`
--
ALTER TABLE `alumno_grado`
  ADD CONSTRAINT `fk_alumno_grado_alumno` FOREIGN KEY (`Id_Alumno`) REFERENCES `alumno` (`Id_Alumno`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_alumno_grado_grado` FOREIGN KEY (`Id_Grado`) REFERENCES `grado` (`Id_Grado`) ON DELETE CASCADE;

--
-- Filtros para la tabla `alumno_plan`
--
ALTER TABLE `alumno_plan`
  ADD CONSTRAINT `alumno_plan_ibfk_1` FOREIGN KEY (`id_plan`) REFERENCES `plan_estudio` (`id_plan`),
  ADD CONSTRAINT `alumno_plan_ibfk_2` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`Id_Alumno`);

--
-- Filtros para la tabla `alumno_uc`
--
ALTER TABLE `alumno_uc`
  ADD CONSTRAINT `alumno_uc_ibfk_1` FOREIGN KEY (`id_uc`) REFERENCES `unidad_curricular` (`Id_UC`) ON DELETE CASCADE,
  ADD CONSTRAINT `alumno_uc_ibfk_2` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`Id_Alumno`) ON DELETE CASCADE;

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`Id_Alumno`) ON DELETE CASCADE,
  ADD CONSTRAINT `asistencia_ibfk_2` FOREIGN KEY (`Id_uc`) REFERENCES `unidad_curricular` (`Id_UC`) ON DELETE CASCADE;

--
-- Filtros para la tabla `aspirante`
--
ALTER TABLE `aspirante`
  ADD CONSTRAINT `aspirante_ibfk_1` FOREIGN KEY (`id_localidad`) REFERENCES `localidad` (`id_localidad`);

--
-- Filtros para la tabla `bedel`
--
ALTER TABLE `bedel`
  ADD CONSTRAINT `bedel_ibfk_1` FOREIGN KEY (`id_localidad`) REFERENCES `localidad` (`id_localidad`);

--
-- Filtros para la tabla `cambio_docente`
--
ALTER TABLE `cambio_docente`
  ADD CONSTRAINT `cambio_docente_ibfk_1` FOREIGN KEY (`id_docente_anterior`) REFERENCES `docente` (`id_docente`) ON DELETE CASCADE,
  ADD CONSTRAINT `cambio_docente_ibfk_2` FOREIGN KEY (`id_docente_nuevo`) REFERENCES `docente` (`id_docente`) ON DELETE CASCADE;

--
-- Filtros para la tabla `carrera_plan`
--
ALTER TABLE `carrera_plan`
  ADD CONSTRAINT `carrera_plan_ibfk_1` FOREIGN KEY (`id_plan`) REFERENCES `plan_estudio` (`id_plan`),
  ADD CONSTRAINT `carrera_plan_ibfk_2` FOREIGN KEY (`id_carrera`) REFERENCES `carrera` (`Id_Carrera`);

--
-- Filtros para la tabla `carrera_uc`
--
ALTER TABLE `carrera_uc`
  ADD CONSTRAINT `fk_carrera_uc_carrera` FOREIGN KEY (`Id_Carrera`) REFERENCES `carrera` (`Id_Carrera`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_carrera_uc_uc` FOREIGN KEY (`Id_UC`) REFERENCES `unidad_curricular` (`Id_UC`) ON DELETE CASCADE;

--
-- Filtros para la tabla `correlatividades`
--
ALTER TABLE `correlatividades`
  ADD CONSTRAINT `fk_correlatividades_carrera` FOREIGN KEY (`Id_Carrera`) REFERENCES `carrera` (`Id_Carrera`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_correlatividades_correlativa` FOREIGN KEY (`Correlativa`) REFERENCES `unidad_curricular` (`Id_UC`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_correlatividades_uc` FOREIGN KEY (`Id_UC`) REFERENCES `unidad_curricular` (`Id_UC`) ON DELETE CASCADE;

--
-- Filtros para la tabla `cupos`
--
ALTER TABLE `cupos`
  ADD CONSTRAINT `fk_cupos_carrera` FOREIGN KEY (`Id_Carrera`) REFERENCES `carrera` (`Id_Carrera`) ON DELETE CASCADE;

--
-- Filtros para la tabla `disponibilidad`
--
ALTER TABLE `disponibilidad`
  ADD CONSTRAINT `disponibilidad_ibfk_1` FOREIGN KEY (`id_uc`) REFERENCES `unidad_curricular` (`Id_UC`) ON DELETE CASCADE,
  ADD CONSTRAINT `disponibilidad_ibfk_2` FOREIGN KEY (`id_docente`) REFERENCES `docente` (`id_docente`) ON DELETE CASCADE,
  ADD CONSTRAINT `disponibilidad_ibfk_3` FOREIGN KEY (`id_h_p_d`) REFERENCES `horario_previo_docente` (`id_h_p_d`) ON DELETE CASCADE,
  ADD CONSTRAINT `disponibilidad_ibfk_4` FOREIGN KEY (`id_aula`) REFERENCES `aula` (`id_aula`) ON DELETE CASCADE,
  ADD CONSTRAINT `disponibilidad_ibfk_5` FOREIGN KEY (`id_grado`) REFERENCES `grado` (`Id_Grado`) ON DELETE CASCADE;

--
-- Filtros para la tabla `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `docente_ibfk_1` FOREIGN KEY (`id_localidad`) REFERENCES `localidad` (`id_localidad`);

--
-- Filtros para la tabla `docente_uc`
--
ALTER TABLE `docente_uc`
  ADD CONSTRAINT `docente_uc_ibfk_1` FOREIGN KEY (`id_docente`) REFERENCES `docente` (`id_docente`) ON DELETE CASCADE,
  ADD CONSTRAINT `docente_uc_ibfk_2` FOREIGN KEY (`id_uc`) REFERENCES `unidad_curricular` (`Id_UC`) ON DELETE CASCADE;

--
-- Filtros para la tabla `examenes`
--
ALTER TABLE `examenes`
  ADD CONSTRAINT `examenes_ibfk_1` FOREIGN KEY (`id_uc`) REFERENCES `unidad_curricular` (`Id_UC`) ON DELETE CASCADE,
  ADD CONSTRAINT `examenes_ibfk_2` FOREIGN KEY (`id_docente`) REFERENCES `docente` (`id_docente`) ON DELETE CASCADE,
  ADD CONSTRAINT `examenes_ibfk_3` FOREIGN KEY (`id_aula`) REFERENCES `aula` (`id_aula`) ON DELETE CASCADE;

--
-- Filtros para la tabla `grado_uc`
--
ALTER TABLE `grado_uc`
  ADD CONSTRAINT `fk_grado_uc_uc` FOREIGN KEY (`Id_UC`) REFERENCES `unidad_curricular` (`Id_UC`) ON DELETE CASCADE,
  ADD CONSTRAINT `grado_uc_FK` FOREIGN KEY (`Id_Grado`) REFERENCES `grado` (`Id_Grado`) ON DELETE CASCADE;

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `horario_ibfk_1` FOREIGN KEY (`id_aula`) REFERENCES `aula` (`id_aula`) ON DELETE CASCADE,
  ADD CONSTRAINT `horario_ibfk_2` FOREIGN KEY (`id_grado`) REFERENCES `grado` (`Id_Grado`) ON DELETE CASCADE,
  ADD CONSTRAINT `horario_ibfk_3` FOREIGN KEY (`id_uc`) REFERENCES `unidad_curricular` (`Id_UC`) ON DELETE CASCADE,
  ADD CONSTRAINT `horario_ibfk_4` FOREIGN KEY (`id_disp`) REFERENCES `disponibilidad` (`id_disp`) ON DELETE CASCADE;

--
-- Filtros para la tabla `horario_previo_docente`
--
ALTER TABLE `horario_previo_docente`
  ADD CONSTRAINT `horario_previo_docente_ibfk_1` FOREIGN KEY (`id_docente`) REFERENCES `docente` (`id_docente`) ON DELETE CASCADE;

--
-- Filtros para la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `fk_inscripcion_alumno` FOREIGN KEY (`Id_Alumno`) REFERENCES `alumno` (`Id_Alumno`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_inscripcion_carrera` FOREIGN KEY (`Id_Carrera`) REFERENCES `carrera` (`Id_Carrera`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_inscripcion_grado` FOREIGN KEY (`Id_Grado`) REFERENCES `grado` (`Id_Grado`) ON DELETE CASCADE;

--
-- Filtros para la tabla `inscripcion_aspirante`
--
ALTER TABLE `inscripcion_aspirante`
  ADD CONSTRAINT `fk_inscripcion_aspirante` FOREIGN KEY (`Id_Aspirante`) REFERENCES `aspirante` (`id_aspirante`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_inscripcion_carrera2` FOREIGN KEY (`Id_Carrera`) REFERENCES `carrera` (`Id_Carrera`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_inscripcion_grado2` FOREIGN KEY (`Id_Grado`) REFERENCES `grado` (`Id_Grado`) ON DELETE CASCADE;

--
-- Filtros para la tabla `inscripcion_examen`
--
ALTER TABLE `inscripcion_examen`
  ADD CONSTRAINT `inscripcion_examen_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`Id_Alumno`) ON DELETE CASCADE,
  ADD CONSTRAINT `inscripcion_examen_ibfk_2` FOREIGN KEY (`id_examen`) REFERENCES `examenes` (`id_examen`) ON DELETE CASCADE;

--
-- Filtros para la tabla `inscripcion_uc`
--
ALTER TABLE `inscripcion_uc`
  ADD CONSTRAINT `inscripcion_uc_ibfk_1` FOREIGN KEY (`Id_Inscripcion`) REFERENCES `inscripcion` (`Id_Inscripcion`) ON DELETE CASCADE,
  ADD CONSTRAINT `inscripcion_uc_ibfk_2` FOREIGN KEY (`Id_UC`) REFERENCES `unidad_curricular` (`Id_UC`) ON DELETE CASCADE;

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `fk_notas_alumno` FOREIGN KEY (`Id_Alumno`) REFERENCES `alumno` (`Id_Alumno`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_notas_carrera` FOREIGN KEY (`Id_Carrera`) REFERENCES `carrera` (`Id_Carrera`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_notas_uc` FOREIGN KEY (`Id_UC`) REFERENCES `unidad_curricular` (`Id_UC`) ON DELETE CASCADE;

--
-- Filtros para la tabla `registro_ins_asp`
--
ALTER TABLE `registro_ins_asp`
  ADD CONSTRAINT `registro_ins_asp_ibfk_1` FOREIGN KEY (`id_aspirante`) REFERENCES `aspirante` (`id_aspirante`) ON DELETE CASCADE,
  ADD CONSTRAINT `registro_ins_asp_ibfk_2` FOREIGN KEY (`id_documento`) REFERENCES `documentacion` (`id_documento`) ON DELETE CASCADE,
  ADD CONSTRAINT `registro_ins_asp_ibfk_3` FOREIGN KEY (`id_turno`) REFERENCES `turno` (`id_turno`) ON DELETE CASCADE;

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD CONSTRAINT `solicitudes_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`Id_Alumno`);

--
-- Filtros para la tabla `turno`
--
ALTER TABLE `turno`
  ADD CONSTRAINT `turno_ibfk_1` FOREIGN KEY (`id_f_evento`) REFERENCES `fecha_evento` (`id_f_evento`) ON DELETE CASCADE;

--
-- Filtros para la tabla `uc_plan`
--
ALTER TABLE `uc_plan`
  ADD CONSTRAINT `uc_plan_ibfk_1` FOREIGN KEY (`id_plan`) REFERENCES `plan_estudio` (`id_plan`),
  ADD CONSTRAINT `uc_plan_ibfk_2` FOREIGN KEY (`id_uc`) REFERENCES `unidad_curricular` (`Id_UC`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
