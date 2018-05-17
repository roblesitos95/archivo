--
-- Base de datos: `bd_documentacion`
--
CREATE DATABASE IF NOT EXISTS `bd_documentacion` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `bd_documentacion`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id_Archivos` int(11) NOT NULL,
  `Tipo_Documento` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date DEFAULT NULL,
  `Descripcion` text COLLATE utf8_spanish_ci,
  `Numero` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Documento` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Placa` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Clase` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Empresa` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Contratista` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `NIT` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Tipo_Factura` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Notaria` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `De` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `A` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Tipo` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Liquidacion` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Pedido` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Ciudad` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Trasferencia` int(11) NOT NULL,
  `balda_am_idbalda_am` int(11) NOT NULL,
  `estado` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `balda`
--

CREATE TABLE `balda` (
  `idBalda` int(11) NOT NULL,
  `Nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `balda`
--

INSERT INTO `balda` (`idBalda`, `Nombre`) VALUES
(1, 'Balda 1'),
(2, 'Balda 2'),
(3, 'Balda 3'),
(4, 'Balda 4'),
(5, 'Balda 5'),
(6, 'Balda 6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `balda_am`
--

CREATE TABLE `balda_am` (
  `idbalda_am` int(11) NOT NULL,
  `estante_balda_idestante_balda` int(11) NOT NULL,
  `am` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cara`
--

CREATE TABLE `cara` (
  `idCara` int(11) NOT NULL,
  `Nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cara`
--

INSERT INTO `cara` (`idCara`, `Nombre`) VALUES
(1, 'A'),
(2, 'B');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estante`
--

CREATE TABLE `estante` (
  `idEstante` int(11) NOT NULL,
  `Nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estante`
--

INSERT INTO `estante` (`idEstante`, `Nombre`) VALUES
(1, 'Estante 1'),
(2, 'Estante 2'),
(3, 'Estante 3'),
(4, 'Estante 4'),
(5, 'Estante 5'),
(6, 'Estante 6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estante_balda`
--

CREATE TABLE `estante_balda` (
  `idestante_balda` int(11) NOT NULL,
  `fila_estante_idfila_estante` int(11) NOT NULL,
  `Balda_idBalda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `filas`
--

CREATE TABLE `filas` (
  `idFilas` int(11) NOT NULL,
  `Nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `filas`
--

INSERT INTO `filas` (`idFilas`, `Nombre`) VALUES
(1, 'Fila 1'),
(2, 'Fila 2'),
(3, 'Fila 3'),
(4, 'Fila 4'),
(5, 'Fila 5'),
(6, 'Fila 6'),
(7, 'Fila 7');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fila_estante`
--

CREATE TABLE `fila_estante` (
  `idfila_estante` int(11) NOT NULL,
  `Estante_idEstante` int(11) NOT NULL,
  `sala_fila_idsala_fila` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `idPrestamos` int(11) NOT NULL,
  `Solicitante` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Documento` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_Envio` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Area` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Destinatario` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Numero_Guia` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Fecha_Reibido` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Recibido_Por` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Observaciones` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Estado` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salas`
--

CREATE TABLE `salas` (
  `idSalas` int(11) NOT NULL,
  `Nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='			';

--
-- Volcado de datos para la tabla `salas`
--

INSERT INTO `salas` (`idSalas`, `Nombre`, `descripcion`, `foto`) VALUES
(1, 'Sala 1', '', '../assets/img/SALA1.JPG'),
(2, 'Sala 2', '', '../assets/img/SALA2.JPG'),
(3, 'Sala 3', '', '../assets/img/SALA3.JPG'),
(4, 'Sala 4', '', '../assets/img/SALA4.JPG'),
(5, 'sala 5', '', '../assets/img/SALA5.JPG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala_fila`
--

CREATE TABLE `sala_fila` (
  `idsala_fila` int(11) NOT NULL,
  `Salas_idSalas` int(11) NOT NULL,
  `Filas_idFilas` int(11) NOT NULL,
  `Cara_idCara` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trasferencia`
--

CREATE TABLE `trasferencia` (
  `idTrasferencia` int(11) NOT NULL,
  `Sede` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Area` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Consecutivo` int(11) NOT NULL,
  `Anho` text COLLATE utf8_spanish_ci NOT NULL,
  `Asunto` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `archivo` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `Nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Apellidos` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Cedula` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Usuario` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Pass` text COLLATE utf8_spanish_ci,
  `foto` text COLLATE utf8_spanish_ci,
  `Pregunta` text COLLATE utf8_spanish_ci,
  `Respuesta` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='		';

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `Nombre`, `Apellidos`, `Cedula`, `Usuario`, `Pass`, `foto`, `Pregunta`, `Respuesta`) VALUES
(1, 'Andres Camilo', 'Escobar Robles', '1052404437', 'roblesitos', 'andrescamilo', '../assets/img/fotos/105240443740044087.jpg', 'LOL', 'LOL');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id_Archivos`,`Trasferencia`,`balda_am_idbalda_am`),
  ADD UNIQUE KEY `Notaria_UNIQUE` (`Notaria`),
  ADD KEY `fk_Archivos_Trasferencia_idx` (`Trasferencia`),
  ADD KEY `fk_Archivos_balda_am1_idx` (`balda_am_idbalda_am`);

--
-- Indices de la tabla `balda`
--
ALTER TABLE `balda`
  ADD PRIMARY KEY (`idBalda`);

--
-- Indices de la tabla `balda_am`
--
ALTER TABLE `balda_am`
  ADD PRIMARY KEY (`idbalda_am`,`estante_balda_idestante_balda`),
  ADD KEY `fk_balda_am_estante_balda1_idx` (`estante_balda_idestante_balda`);

--
-- Indices de la tabla `cara`
--
ALTER TABLE `cara`
  ADD PRIMARY KEY (`idCara`);

--
-- Indices de la tabla `estante`
--
ALTER TABLE `estante`
  ADD PRIMARY KEY (`idEstante`);

--
-- Indices de la tabla `estante_balda`
--
ALTER TABLE `estante_balda`
  ADD PRIMARY KEY (`idestante_balda`,`fila_estante_idfila_estante`,`Balda_idBalda`),
  ADD KEY `fk_estante_balda_fila_estante1_idx` (`fila_estante_idfila_estante`),
  ADD KEY `fk_estante_balda_Balda1_idx` (`Balda_idBalda`);

--
-- Indices de la tabla `filas`
--
ALTER TABLE `filas`
  ADD PRIMARY KEY (`idFilas`);

--
-- Indices de la tabla `fila_estante`
--
ALTER TABLE `fila_estante`
  ADD PRIMARY KEY (`idfila_estante`,`Estante_idEstante`,`sala_fila_idsala_fila`),
  ADD KEY `fk_fila_estante_Estante1_idx` (`Estante_idEstante`),
  ADD KEY `fk_fila_estante_sala_fila1_idx` (`sala_fila_idsala_fila`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`idPrestamos`);

--
-- Indices de la tabla `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`idSalas`);

--
-- Indices de la tabla `sala_fila`
--
ALTER TABLE `sala_fila`
  ADD PRIMARY KEY (`idsala_fila`,`Salas_idSalas`,`Filas_idFilas`,`Cara_idCara`),
  ADD KEY `fk_sala_fila_Salas1_idx` (`Salas_idSalas`),
  ADD KEY `fk_sala_fila_Filas1_idx` (`Filas_idFilas`),
  ADD KEY `fk_sala_fila_Cara1_idx` (`Cara_idCara`);

--
-- Indices de la tabla `trasferencia`
--
ALTER TABLE `trasferencia`
  ADD PRIMARY KEY (`idTrasferencia`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id_Archivos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `balda`
--
ALTER TABLE `balda`
  MODIFY `idBalda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `balda_am`
--
ALTER TABLE `balda_am`
  MODIFY `idbalda_am` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cara`
--
ALTER TABLE `cara`
  MODIFY `idCara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estante`
--
ALTER TABLE `estante`
  MODIFY `idEstante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `estante_balda`
--
ALTER TABLE `estante_balda`
  MODIFY `idestante_balda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `filas`
--
ALTER TABLE `filas`
  MODIFY `idFilas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `fila_estante`
--
ALTER TABLE `fila_estante`
  MODIFY `idfila_estante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `idPrestamos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `salas`
--
ALTER TABLE `salas`
  MODIFY `idSalas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sala_fila`
--
ALTER TABLE `sala_fila`
  MODIFY `idsala_fila` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `trasferencia`
--
ALTER TABLE `trasferencia`
  MODIFY `idTrasferencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD CONSTRAINT `fk_Archivos_Trasferencia` FOREIGN KEY (`Trasferencia`) REFERENCES `trasferencia` (`idTrasferencia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `balda_am`
--
ALTER TABLE `balda_am`
  ADD CONSTRAINT `fk_balda_am_estante_balda1` FOREIGN KEY (`estante_balda_idestante_balda`) REFERENCES `estante_balda` (`idestante_balda`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estante_balda`
--
ALTER TABLE `estante_balda`
  ADD CONSTRAINT `fk_estante_balda_Balda1` FOREIGN KEY (`Balda_idBalda`) REFERENCES `balda` (`idBalda`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_estante_balda_fila_estante1` FOREIGN KEY (`fila_estante_idfila_estante`) REFERENCES `fila_estante` (`idfila_estante`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `fila_estante`
--
ALTER TABLE `fila_estante`
  ADD CONSTRAINT `fk_fila_estante_Estante1` FOREIGN KEY (`Estante_idEstante`) REFERENCES `estante` (`idEstante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fila_estante_sala_fila1` FOREIGN KEY (`sala_fila_idsala_fila`) REFERENCES `sala_fila` (`idsala_fila`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sala_fila`
--
ALTER TABLE `sala_fila`
  ADD CONSTRAINT `fk_sala_fila_Cara1` FOREIGN KEY (`Cara_idCara`) REFERENCES `cara` (`idCara`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sala_fila_Filas1` FOREIGN KEY (`Filas_idFilas`) REFERENCES `filas` (`idFilas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sala_fila_Salas1` FOREIGN KEY (`Salas_idSalas`) REFERENCES `salas` (`idSalas`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

