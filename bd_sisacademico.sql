-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-02-2017 a las 16:11:59
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bd_sisacademico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE IF NOT EXISTS `asistencia` (
  `asi_id` int(11) NOT NULL AUTO_INCREMENT,
  `asi_fecha` varchar(45) NOT NULL,
  `asi_obs` varchar(45) DEFAULT NULL,
  `asi_idest` int(11) NOT NULL,
  `asi_idfal` int(11) NOT NULL,
  `materia_idmateria` int(11) NOT NULL,
  PRIMARY KEY (`asi_id`),
  KEY `asi_idfal_idx` (`asi_idfal`),
  KEY `fk_asistencia_materia1_idx` (`materia_idmateria`),
  KEY `asi_idest` (`asi_idest`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`asi_id`, `asi_fecha`, `asi_obs`, `asi_idest`, `asi_idfal`, `materia_idmateria`) VALUES
(3, '2017-02-01', 'NINGUNA', 1, 1, 1),
(4, '2017-02-02', 'NINGUNA', 1, 1, 1),
(5, '2017-02-01', 'NINGUNA', 2, 1, 1),
(6, '2017-02-02', 'NINGUNA', 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `cur_id` int(11) NOT NULL AUTO_INCREMENT,
  `cur_grado` int(11) NOT NULL,
  `cur_paralelo` varchar(45) NOT NULL,
  `cur_sigla` varchar(45) NOT NULL,
  `cur_descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`cur_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`cur_id`, `cur_grado`, `cur_paralelo`, `cur_sigla`, `cur_descripcion`) VALUES
(1, 1, 'A', 'PRI-SEC-A', 'PRIMERO DE SECUNDARIA-A'),
(2, 1, 'B', 'PRI-SEC-B', 'PRIMERO DE SECUNDARIA-B'),
(3, 1, 'C', 'PRI-SEC-C', 'PRIMERO DE SECUNDARIA-C'),
(4, 2, 'A', 'SEG-SEC-A', 'SEGUNDO DE SECUNDARIA-A'),
(5, 2, 'B', 'SEG-SEC-B', 'SEGUNDO DE SECUNDARIA-B'),
(6, 2, 'C', 'SEG-SEC-C', 'SEGUNDO DE SECUNDARIA-C'),
(7, 2, 'D', 'SEG-SEC-D', 'SEGUNDO DE SECUNDARIA-D'),
(8, 3, 'A', 'TER-SEC-A', 'TERCERO DE SECUNDARIA-A'),
(9, 3, 'B', 'TER-SEC-B', 'TERCERO DE SECUNDARIA-B'),
(10, 3, 'C', 'TER-SEC-C', 'TERCERO DE SECUNDARIA-C'),
(11, 3, 'D', 'TER-SEC-D', 'TERCERO DE SECUNDARIA-D'),
(12, 4, 'A', 'CUA-SEC-A', 'CUARTO DE SECUNDARIA-A'),
(13, 4, 'B', 'CUA-SEC-B', 'CUARTO DE SECUNDARIA-B'),
(14, 4, 'C', 'CUA-SEC-C', 'CUARTO DE SECUNDARIA-C'),
(15, 4, 'D', 'CUA-SEC-D', 'CUARTO DE SECUNDARIA-D'),
(16, 5, 'A', 'QUI-SEC-A', 'QUINTO DE SECUNDARIA-A'),
(17, 5, 'B', 'QUI-SEC-B', 'QUINTO DE SECUNDARIA-B'),
(18, 5, 'C', 'QUI-SEC-C', 'QUINTO DE SECUNDARIA-C'),
(19, 5, 'D', 'QUI-SEC-D', 'QUINTO DE SECUNDARIA-D'),
(20, 6, 'A', 'SEX-SEC-A', 'SEXTO DE SECUNDARIA-A'),
(21, 6, 'B', 'SEX-SEC-B', 'SEXTO DE SECUNDARIA-B'),
(22, 6, 'C', 'SEX-SEC-C', 'SEXTO DE SECUNDARIA-C'),
(23, 6, 'D', 'SEX-SEC-D', 'SEXTO DE SECUNDARIA-D');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `est_id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`est_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`est_id`, `codigo`, `descripcion`) VALUES
(1, 'A', 'ACTIVO'),
(2, 'I', 'INACTIVO'),
(3, 'E', 'ELIMINADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE IF NOT EXISTS `estudiante` (
  `est_id` int(11) NOT NULL AUTO_INCREMENT,
  `est_nombre` varchar(45) NOT NULL,
  `est_paterno` varchar(45) NOT NULL,
  `est_materno` varchar(45) DEFAULT NULL,
  `est_ci` varchar(45) NOT NULL,
  `est_rude` varchar(45) NOT NULL,
  `est_fechanac` date NOT NULL,
  `est_login` varchar(45) NOT NULL,
  `est_password` varchar(45) NOT NULL,
  `est_ap_nombre` varchar(100) DEFAULT NULL,
  `est_ap_parentesco` varchar(45) DEFAULT NULL,
  `est_direccion` varchar(100) DEFAULT NULL,
  `est_email` varchar(45) DEFAULT NULL,
  `est_telefono` varchar(45) DEFAULT NULL,
  `est_movil` varchar(45) DEFAULT NULL,
  `est_fotoadj` varchar(100) DEFAULT NULL,
  `est_fechareg` date NOT NULL,
  `par_expedido_id` int(11) NOT NULL,
  `par_genero_id` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `estado_id` int(11) NOT NULL,
  `curso_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`est_id`),
  KEY `fk_estudiante_par_genero1_idx` (`par_genero_id`),
  KEY `fk_estudiante_rol1_idx` (`rol_id`),
  KEY `fk_estudiante_estado1_idx` (`estado_id`),
  KEY `fk_estudiante_curso1_idx` (`curso_id`),
  KEY `fk_estudiante_par_expedido_idx` (`par_expedido_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=450 ;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`est_id`, `est_nombre`, `est_paterno`, `est_materno`, `est_ci`, `est_rude`, `est_fechanac`, `est_login`, `est_password`, `est_ap_nombre`, `est_ap_parentesco`, `est_direccion`, `est_email`, `est_telefono`, `est_movil`, `est_fotoadj`, `est_fechareg`, `par_expedido_id`, `par_genero_id`, `rol_id`, `estado_id`, `curso_id`) VALUES
(1, 'WAGNER PABLO', 'ARIAS', 'CHAMBI', '', '807302000000000', '2003-01-16', 'WARIAS', 'Z0NV5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 4),
(2, 'ALBERTO ERLAN', 'CASTILLO', 'VELASCO', '', '8073010000000000', '2003-06-20', 'ACASTILLO', 'F5JX8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 4),
(3, 'JHONNY FRANCO', 'CHAMBI', 'CHILLO', '10084142', '807302000000000', '2002-09-08', 'JCHAMBI', 'J7CD3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 4),
(4, 'JUAN DANIEL', 'CHINO', 'SANCHEZ', '', '407301000000000', '2002-06-14', 'JCHINO', 'T6XM7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 4),
(5, 'ADEMAR RICALDI', 'CONDORI', 'MERMA', '', '807302000000000', '2003-01-25', 'ACONDORI', 'Q0HQ9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 4),
(6, 'EDWIN', 'CORINA', 'CHAMBILLA', '10060829', '807301000000000', '2003-04-12', 'ECORINA', 'L7SU8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 4),
(7, 'CARLOS', 'DELGADO', 'APAZA', '', '80730200000000', '2002-06-11', 'CDELGADO', 'K5CB5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 4),
(8, 'JHOEL CARLOS', 'ESPINOZA', 'ORTEGA', '', '8073020000000000', '2003-02-20', 'JESPINOZA', 'H4UM1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 4),
(9, 'ERICK FRANCISCO', 'FLORES', 'MENDOZA', '9869194', '807306000000000', '2003-05-21', 'EFLORES', 'W6CW7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 4),
(10, 'GABRIEL LORENZO', 'FLORES', 'MERCADO', '9903168', '8073020000000000', '2002-03-24', 'GFLORES', 'X0EF7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 4),
(11, 'CRISTIAN', 'IÑIGUEZ', 'FLORES', '9904181', '807302000000000', '2003-02-21', 'CIÑIGUEZ', 'O4SF1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 4),
(12, 'JOSUE JOEL', 'LARICO', 'CARRASCO', '', '807301000000000', '2003-01-21', 'JLARICO', 'B4EK1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 4),
(13, 'DEYMAR LISANDRO', 'MAMANI', 'BAUTISTA', '', '807302000000000', '2002-07-31', 'DMAMANI', 'J6YT9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 4),
(14, 'BORIS', 'MAMANI', 'SURCO', '', '8073020000000000', '2001-08-29', 'BMAMANI', 'A3HF3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 4),
(15, 'CRISTHIAN ANDRES', 'MARQUEZ', 'QUEVEDO', '', '807302000000000', '2003-03-01', 'CMARQUEZ', 'Y5LH3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 4),
(16, 'JAVIER PABLO', 'MEDRANO', 'HUANCA', '', '8073060000000000', '2002-06-06', 'JMEDRANO', 'O0IR9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 4),
(17, 'RAMIRO ANDRES', 'MOSCOSO', 'PORTUGAL', '10910939', '80730200000000', '2001-07-22', 'RMOSCOSO', 'T6XP7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 4),
(18, 'GIOVANNY NEILSS', 'OCHOA', 'RIVERA', '', '807302000000000', '2003-07-24', 'GOCHOA', 'S0YA7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 4),
(19, 'HERLAN JAVIER', 'POMA', 'CONDORI', '9907485', '807302000000000', '2003-08-11', 'HPOMA', 'D2VV5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 4),
(20, 'ALAN GABRIEL', 'POMA', 'SAAVEDRA', '', '807301000000000', '2002-12-12', 'APOMA', 'R7DK4', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 4),
(21, 'JOSE CARLO', 'POZO', 'QUECAÑA', '', '807302000000000', '2002-05-29', 'JPOZO', 'H0WI2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 4),
(22, 'JOSE LUIS', 'QUIROZ', 'CASILLO', '', '807301000000000', '2002-12-18', 'JQUIROZ', 'M8RP3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 4),
(23, 'LUIS MARIO', 'QUISPE', 'NINA', '', '807302000000000', '2003-05-26', 'LQUISPE', 'R3MG7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 4),
(24, 'EMMANUEL CRISTHIAN', 'RAMIREZ', 'MOLLEDA', '', '807304000000000', '2003-03-12', 'ERAMIREZ', 'U3TY6', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 4),
(25, 'MARCO ANTONIO', 'RIVEROS', 'LARUTA', '', '807303000000000', '2002-07-31', 'MRIVEROS', 'S0FA4', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 4),
(26, 'ZAUL', 'TITO', 'DE LA CRUZ', '6832450', '8073020000000000', '2002-11-10', 'ZTITO', 'M3FB1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 4),
(27, 'ANTONY FABRICIO', 'TORREZ', 'GUTIERREZ', '9883294', '8073010000000000', '2002-10-23', 'ATORREZ', 'F1WH8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 4),
(28, 'PABLO MOISES', 'YUJRA', 'RAMIREZ', '9912097', '807301000000000', '2002-12-27', 'PYUJRA', 'L6HI6', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 4),
(29, 'JASSER ALEXIS', 'ALANOCA', 'BARRIONUEVO', '12827613', '807302000000000', '2002-08-03', 'JALANOCA', 'K4UV6', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 6),
(30, 'LUIS FERNANDO', 'ARI', 'QUISPE', '10084640', '8073020000000000', '2002-08-08', 'LARI', 'Y2PC5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 6),
(31, 'ROGER GABRIEL', 'ARIAS', 'LEDEZMA', '', '807306000000000', '2002-07-05', 'RARIAS', 'N0BV8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 6),
(32, 'LIMBERG CRISTHIAN', 'ARIAS', 'ORIHUELA', '', '807306000000000', '2002-12-07', 'LARIAS', 'X3IM9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 6),
(33, 'BEYMAR CARLOS', 'AVILA', 'CRUZ', '', '807302000000000', '2002-09-01', 'BAVILA', 'A7OE8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 6),
(34, 'ISRAEL LIMBERT', 'CALLATA', 'YANA', '', '8073010000000000', '2002-06-23', 'ICALLATA', 'I6JF7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 6),
(35, 'GERSON', 'CHANA', 'CALISAYA', '', '4073030000000000', '2003-08-01', 'GCHANA', 'D4HO3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 6),
(36, 'JOSE MARIA', 'CHAVEZ', 'FERNANDEZ', '9989145', '807301000000000', '2003-01-08', 'JCHAVEZ', 'T8UE8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 6),
(37, 'JAFET GERARDO', 'COAQUIRA', 'PINTO', '', '80730700000000', '2002-11-19', 'JCOAQUIRA', 'S2BM5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 6),
(38, 'ADALID PABLO', 'CUEVAS', 'LUNA', '', '8073019120097A', '2003-03-12', 'ACUEVAS', 'Z8EH3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 6),
(39, 'ORLANDO ABEL', 'GUZMAN', 'CAMARGO', '', '807302000000000', '2002-09-05', 'OGUZMAN', 'S0CO5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 6),
(40, 'WILFREDO DIEGO', 'HERBAS', 'TACACHIRA', '', '8073020000000000', '2002-12-02', 'WHERBAS', 'K4KU1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 6),
(41, 'BENJAMIN JHOSNEY', 'KAPA', 'HULURI', '', '8073010000000000', '2002-03-28', 'BKAPA', 'R7YS9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 6),
(42, 'JHONATAN DENNIS', 'LAIME', 'HURTADO', '6897533', '8073020000000000', '2003-01-05', 'JLAIME', 'G1RV8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 6),
(43, 'YOJANDEL YAMIL', 'LIMACHI', 'RIVAS', '', '807306000000000', '2003-10-20', 'YLIMACHI', 'Y9BE2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 6),
(44, 'YEFERSON KEVIN', 'MACHICADO', 'LIMACHI', '9911623', '807302000000000', '2002-08-28', 'YMACHICADO', 'K0SJ4', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 6),
(45, 'CHRISTIAN BRAYAN', 'MAMANI', 'CHAUCA', '', '8073010000000000', '2001-03-15', 'CMAMANI', 'C4VH3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 6),
(46, 'GUERY ERIC', 'MAMANI', 'CONDORI', '', '80730200000000', '2003-07-08', 'GMAMANI', 'X9QV7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 6),
(47, 'FABRICIO', 'MIRANDA', 'ALAVIA', '', '81980900000000000', '2002-04-29', 'FMIRANDA', 'F8YW8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 6),
(48, 'JODY MAURICIO', 'ORDONEZ', 'ALIAGA', '', '807301000000000', '2004-02-26', 'JORDONEZ', 'F0DR8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 6),
(49, 'JAVIER ALEXANDER', 'POZO', 'CHOQUE', '', '40730300000000000', '2002-11-21', 'JPOZO', 'Q0JM3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 6),
(50, 'BRUNO RUSSEL', 'QUELCA', 'ALFARO', '9173724', '8073050000000000', '2002-05-25', 'BQUELCA', 'E4BE5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 6),
(51, 'JOSHUA KEANN', 'QUISBERT', 'CAPRILES', '', '807301000000000', '2002-03-04', 'JQUISBERT', 'Y8TS4', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 6),
(52, 'HAROL ADRIAN', 'RAMOS', 'HUAYLLAS', '', '807302000000000', '2001-06-04', 'HRAMOS', 'B2EE9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 6),
(53, 'JHOEL', 'RODRIGUEZ', 'VARGAS', '', '80730500000000', '2003-01-10', 'JRODRIGUEZ', 'C5AA3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 6),
(54, 'ROGHEIRO FABRIZZIO', 'TELLERIA', 'SILVA', '', '807306000000000', '2003-01-26', 'RTELLERIA', 'I1UE8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 6),
(55, 'RAMIRO RODRIGO', 'TINTA', 'CONDORI', '9911533', '807302000000000', '2002-07-04', 'RTINTA', 'Y8WA6', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 6),
(56, 'CHRISTIAN GIOVANNI', 'TROCHE', 'CHUQUIMIA', '9325472', '8090000000000000', '2003-02-17', 'CTROCHE', 'H9HC3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 6),
(57, 'JHONN BRIAN', 'ALVAREZ', 'CHACHAQUI', '9121914', '8073020000000000', '2001-08-11', 'JALVAREZ', 'T2ZG1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 8),
(58, 'RONALD HUMBERTO', 'AMARU', 'MALLEA', '9104535', '8073020000000000', '2002-01-06', 'RAMARU', 'A0EX8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 8),
(59, 'DIEGO ARMANDO', 'APAZA', 'PORCE', '8421962', '807302000000000', '2001-12-03', 'DAPAZA', 'H6GS5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 8),
(60, 'ALAN BENJAMIN', 'ARUQUIPA', 'CHAMBI', '10955705', '807302000000000', '2000-08-30', 'AARUQUIPA', 'X6II9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 8),
(61, 'KAMIL ALEJANDRO', 'AVILA', 'ALBORTA', '6791596', '807302000000000', '2002-08-21', 'KAVILA', 'U9EE8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 8),
(62, 'MAURICIO DENIS', 'AYALA', 'FERNANDEZ', '', '8073020000000000', '2001-10-30', 'MAYALA', 'Z0GM7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 8),
(63, 'DANIEL MARCO', 'BRITO', 'BURGOA', '9134403', '807300000000000', '2002-04-10', 'DBRITO', 'R3NT7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 8),
(64, 'JHOEL MATEO', 'CHOQUE', 'QUISBERT', '6181729', '807306000000000', '2002-02-07', 'JCHOQUE', 'X8BQ9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 8),
(65, 'JUAN BRANDON', 'CHUQUIMIA', 'CRUZ', '', '807302000000000', '2002-08-06', 'JCHUQUIMIA', 'Y2WC9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 8),
(66, 'ERICK FERNANDO', 'CONDORI', 'VALDA', '', '807304000000000', '2002-05-30', 'ECONDORI', 'B2AC6', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 8),
(67, 'BRAYAN JOSE', 'ENDARA', 'MAMANI', '', '8073010000000000', '2002-02-17', 'BENDARA', 'W1OH3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 8),
(68, 'JAMIL KEVIN', 'FLORES', 'GONZALES', '8400347', '8073020000000000', '2002-03-24', 'JFLORES', 'R8VJ7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 8),
(69, 'ALBERT CRISS', 'FLORES', 'MAMANI', '9907517', '807302000000000', '2001-09-11', 'AFLORES', 'T9YY2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 8),
(70, 'JAMIL IVAN', 'FLORES', 'PUSARICO', '9904289', '4073040000000000', '2002-03-25', 'JFLORES', 'X5VA7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 8),
(71, 'AMERICO RUBEN', 'GUTIERREZ', 'MAMANI', '9904282', '8073020000000000', '2002-02-10', 'AGUTIERREZ', 'F8HQ3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 8),
(72, 'JUAN JOEL', 'HUIZA', 'LLOJLLA', '', '807300000000000', '2001-12-23', 'JHUIZA', 'X0XE4', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 8),
(73, 'ALEXANDER DAVID', 'JIMENEZ', 'FELIPEZ', '9903215', '8073020000000000', '2001-12-29', 'AJIMENEZ', 'Z1MK1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 8),
(74, 'GEORGE MARCELO', 'LUNA', 'ZAMORANO', '12829705', '80730100000000', '2001-05-30', 'GLUNA', 'I4FV5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 8),
(75, 'CRISTIAN HAROLD', 'MAMANI', 'MACHACA', '12543974', '807302000000000', '2002-03-23', 'CMAMANI', 'N1ZB2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 8),
(76, 'RONALDO ENRIQUE', 'MAMANI', 'QUISPE', '', '807302000000000', '2002-06-23', 'RMAMANI', 'D0DL8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 8),
(77, 'ALAN JOEL', 'MARCA', 'QUISPE', '9919075', '807301000000000', '2002-03-07', 'AMARCA', 'F7OV8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 8),
(78, 'LUIS FERNANDO', 'MAYTA', 'MAMANI', '9903169', '8073020000000000', '2002-01-19', 'LMAYTA', 'Y8EP7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 8),
(79, 'DANIEL ORLANDO', 'OCHOA', 'GUTIERREZ', '9903157', '807306000000000', '2001-11-05', 'DOCHOA', 'Q5MN9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 8),
(80, 'DILAN', 'PANTOJA', 'MAMANI', '9909640', '807301000000000', '2002-02-23', 'DPANTOJA', 'J5XD5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 8),
(81, 'MAYCOL WILLIAM', 'QUISPE', 'CRUZ', '', '8073020000000000', '2001-10-25', 'MQUISPE', 'V0SK3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 8),
(82, 'ROMARIO ALEJANDRO', 'RAMOS', 'RAMIREZ', '', '8073060000000000', '2002-04-04', 'RRAMOS', 'A7LT9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 8),
(83, 'OSCAR', 'RODRIGUEZ', 'VARGAS', '', '8073050000000000', '2001-03-09', 'ORODRIGUEZ', 'B5TW9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 8),
(84, 'LEON ANGEL', 'SALINAS', 'CASTRO', '9907474', '807302000000000', '2002-04-08', 'LSALINAS', 'Q1GC6', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 8),
(85, 'ADALIT', 'TICONA', 'TORREZ', '12393374', '80730100000000', '2002-02-23', 'ATICONA', 'K9SK7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 8),
(86, 'VINCENT ULISES', 'TITO', 'ATTO', '8337570', '8073020000000000', '2000-05-01', 'VTITO', 'K0UL9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 8),
(87, 'EROS', 'VALLEJOS', 'COPANA', '', '807304000000000', '2002-01-22', 'EVALLEJOS', 'X5GZ7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 8),
(88, 'DANNER PIER', 'VILLASANTE', 'SURCO', '9873816', '407301000000000', '2002-07-07', 'DVILLASANTE', 'D5MU4', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 8),
(89, 'KEVIN ARIEL', 'VISA', 'CASTRO', '', '8073010000000000', '2002-02-09', 'KVISA', 'P8VI1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 8),
(90, 'PAUL ANTONY', 'ALIAGA', 'CHEJO', '9165461', '80730129200816A', '2002-07-03', 'PALIAGA', 'X4RT4', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 9),
(91, 'FABRICIO', 'ANTONIO', 'GARCIA', '', '4073030000000000', '2002-06-07', 'FANTONIO', 'M8YT7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 9),
(92, 'BRAYAN', 'APAZA', 'MAYORGA', '', '407300622007580A', '1999-07-01', 'BAPAZA', 'R7CR3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 9),
(93, 'CRISTHIAN NESTOR', 'APAZA', 'TICACALA', '9919965', '807303000000000', '2002-01-20', 'CAPAZA', 'R4JW6', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 9),
(94, 'ALESSANDRO ADEMIR', 'ARCE', 'RODRIGUEZ', '9903548', '80730203200743A', '2001-08-03', 'AARCE', 'I3MK4', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 9),
(95, 'JOSE LUIS', 'BORDA', 'BERNAL', '11078350', '807304132007489A', '2001-09-05', 'JBORDA', 'M6WI9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 9),
(96, 'JOSUE VADI?O', 'CALCINAS', 'BENAVIDES', '9911786', '8073020000000000', '2001-08-09', 'JCALCINAS', 'E1IX3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 9),
(97, 'DARING ROY', 'CALLISAYA', 'CHAVEZ', '9908986', '807301000000000', '2002-06-25', 'DCALLISAYA', 'X3QG7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 9),
(98, 'JUAN JOSE', 'CASTRO', 'GIL', '10012083', '8073020000000000', '2002-04-30', 'JCASTRO', 'E6VE7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 9),
(99, 'JHOEL ESTEBAN', 'CHAMBI', 'RAMOS', '', '807306000000000', '2001-09-29', 'JCHAMBI', 'S5RX1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 9),
(100, 'JOSE ERICK', 'COPA', 'VELA', '10088909', '80730400000000', '2001-04-08', 'JCOPA', 'D4ET1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 9),
(101, 'JHONATAN', 'CORDERO', 'RAMOS', '', '80730200000000', '2001-07-20', 'JCORDERO', 'V0TP9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 9),
(102, 'WILHEM GERALD', 'CRIALES', 'VILLARTE', '9902992', '80730200000000', '2001-10-20', 'WCRIALES', 'G3LS3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 9),
(103, 'ISRAEL JOSE', 'ERGUETA', 'QUENTA', '', '807302000000000', '2000-06-29', 'IERGUETA', 'U8NK6', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 9),
(104, 'MAURICIO JHOSUE', 'ESCALANTE', 'SARMIENTO', '', '8073000000000000', '2001-09-22', 'MESCALANTE', 'H4KO2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 9),
(105, 'JHONATAN DARIO', 'FIGUEROA', 'LIPA', '10920070', '8073020000000000', '2001-03-24', 'JFIGUEROA', 'R3TW9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 9),
(106, 'MARCOS MICHAEL', 'FLORES', 'MAMANI', '', '807301000000000', '2000-02-14', 'MFLORES', 'Q8NA1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 9),
(107, 'KEVIN ARIEL', 'GARCIA', 'LOVERA', '', '406400000000000', '2001-01-01', 'KGARCIA', 'F0ZR9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 9),
(108, 'ANDRES EDUARDO', 'HERRERA', 'FLORES', '9905131', '807306000000000', '2001-08-02', 'AHERRERA', 'Q5GT6', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 9),
(109, 'BRAYAN KEVIN', 'HUANCA', 'CONDORI', '', '807304102007252A', '2001-05-10', 'BHUANCA', 'U5LG3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 9),
(110, 'DILAN SEBASTIAN', 'MAMANI', 'GUTIERREZ', '', '407301000000000', '2001-11-22', 'DMAMANI', 'M2BL5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 9),
(111, 'JOSUE HAROLD', 'MOLINA', 'RUIZ', '', '8073010000000000', '2001-11-26', 'JMOLINA', 'B9UR2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 9),
(112, 'JORGE ANDRES', 'MONTERO', 'CABALLERO', '9907519', '8073020000000000', '1999-11-30', 'JMONTERO', 'S9MV1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 9),
(113, 'ANTHONY ROBERTH', 'OBLITAS', 'FERNANDEZ', '9900632', '8073040000000000', '2000-05-13', 'AOBLITAS', 'H3IF7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 9),
(114, 'JHON ELLIOT', 'QUINO', 'ROJAS', '', '8073010000000000', '2001-04-11', 'JQUINO', 'L5KL6', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 9),
(115, 'BRAYAN BRANDON', 'QUIROGA', 'ADUVIGES', '', '8073050000000000', '1999-11-21', 'BQUIROGA', 'V3QY3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 9),
(116, 'LUIS FERNANDO', 'RAMOS', 'TARQUI', '8434077', '807306000000000', '2001-09-11', 'LRAMOS', 'E5AH8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 9),
(117, 'BRIAN OSWALDO', 'ROCHA', 'PAZ', '', '807302000000000', '2001-12-29', 'BROCHA', 'X9TL9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 9),
(118, 'ABEL MISAEL', 'TUDELA', 'MANO', '', '8073060000000000', '2002-02-28', 'ATUDELA', 'X3XO5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 9),
(119, 'ANDRES SEBASTIAN', 'VILLALBA', 'PAREDES', '', '8073050000000000', '2001-12-04', 'AVILLALBA', 'J2TQ2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 9),
(120, 'LEONARDO FLAVIO', '', 'PIEROLA', '', '8073009520075A', '2001-06-09', 'L', 'A1YN7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 10),
(121, 'JONAS ABEL', '', 'QUISBERT', '', '8073020000000000', '2002-03-14', 'J', 'J4GU6', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 10),
(122, 'CRISTIAN SERGIO', 'ALIAGA', 'TITIRICO', '9153178', '807300000000000', '2001-05-21', 'CALIAGA', 'W2WY8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 10),
(123, 'JORGE ALEJANDRO', 'ALVAREZ', 'VILLA', '', '8073000000000000', '2001-04-05', 'JALVAREZ', 'S5ED9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 10),
(124, 'CRISTIAN', 'APAZA', 'MAYORGA', '', '4073010000000000', '2001-05-19', 'CAPAZA', 'K2JH1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 10),
(125, 'EDDY ALVARO', 'APAZA', 'QUISPE', '', '807307000000000', '2000-11-20', 'EAPAZA', 'G6NH8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 10),
(126, 'EYELTS JORDAN', 'BLANCO', 'MALDONADO', '9910046', '8073007020076A', '2001-10-11', 'EBLANCO', 'Z1EA3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 10),
(127, 'JHOSTYN GERARDO', 'CALLE', 'MENDEZ', '9903166', '80730400000000', '2002-01-28', 'JCALLE', 'V0UB1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 10),
(128, 'IVAN YOEL', 'CALLISAYA', 'CHOQUE', '9118053', '807306000000000', '2001-11-07', 'ICALLISAYA', 'D9PQ7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 10),
(129, 'NELSON', 'CATARI', 'CHINO', '9124935', '80730106200734A', '2000-10-01', 'NCATARI', 'V1UB6', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 10),
(130, 'RONALD JOEL', 'CATARI', 'VELIZ', '', '40730400000000', '2003-04-04', 'RCATARI', 'J8IN5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 10),
(131, 'JHON JOSUE', 'CHALLCO', 'MACHICADO', '', '807302000000000', '2001-04-02', 'JCHALLCO', 'Y0CH1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 10),
(132, 'DIEGO MOISES', 'CHOQUEHUANCA', 'CHIPANA', '9910085', '807305000000000', '2002-04-12', 'DCHOQUEHUANCA', 'L5NX9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 10),
(133, 'RONALDO', 'ESPINOZA', 'JOSELINO', '12605578', '4073010000000000', '1999-06-21', 'RESPINOZA', 'L6QP2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 10),
(134, 'RAMIRO LUIS', 'GUZMAN', 'CAMARGO', '', '807302000000000', '1999-12-01', 'RGUZMAN', 'M0LZ9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 10),
(135, 'BRAYAN', 'HURTADO', 'QUISBERT', '', '807302000000000', '1999-09-11', 'BHURTADO', 'Q5SS2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 10),
(136, 'BRAYAN SAMUEL', 'LOZA', 'COCA', '9916183', '8073010000000000', '2001-02-22', 'BLOZA', 'G1HN6', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 10),
(137, 'ABAD HENRRY', 'MARCA', 'CACHI', '9981212', '807301000000000', '2002-04-02', 'AMARCA', 'D2LB5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 10),
(138, 'BRAYAN JESUS', 'MIRANDA', 'CALLE', '', '807301000000000', '2001-07-31', 'BMIRANDA', 'K2IR8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 10),
(139, 'RAMIRO GRAIG', 'MUJICA', 'QUIROGA', '9902404', '8073060000000000', '2001-10-01', 'RMUJICA', 'Q3XZ9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 10),
(140, 'GABRIEL GERMAN', 'NINA', 'MURGA', '9157758', '807306000000000', '2001-11-29', 'GNINA', 'L5ON2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 10),
(141, 'DARIO', 'OLIVER', 'ECHAVE', '9105236', '806700000000000', '2000-07-11', 'DOLIVER', 'C1ZH4', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 10),
(142, 'MARLON BRANDOM', 'PACHECO', 'FLORES', '9903345', '8073010000000000', '2002-01-18', 'MPACHECO', 'P8OC9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 10),
(143, 'GIOVANNY JEFERSON', 'PACOSILLO', 'VELASCO', '10909161', '8073010000000000', '1999-05-28', 'GPACOSILLO', 'B2FS1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 10),
(144, 'WALTER', 'QUISPE', 'BARRERA', '9903016', '807302000000000', '2002-01-01', 'WQUISPE', 'K8JZ9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 10),
(145, 'IVAN SANTOS', 'QUISPE', 'MAMANI', '', '80730000000000', '2001-11-01', 'IQUISPE', 'X6QW4', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 10),
(146, 'ALAN DIEGO', 'QUISPE', 'QUENALLATA', '11073420', '8073020000000000', '2002-04-17', 'AQUISPE', 'K8MA8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 10),
(147, 'HAROLD MIHAEL', 'SANCHEZ', 'MEDRANO', '9903236', '807304000000000', '2003-05-14', 'HSANCHEZ', 'Y8YS1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 10),
(148, 'YERKO RODRIGO', 'SORIANO', 'DONOZO', '9165808', '8073020000000000', '2000-09-20', 'YSORIANO', 'Q9TR2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 10),
(149, 'CARLOS JAVIER', 'UCHANI', 'QUISPE', '', '407300000000000', '2002-06-20', 'CUCHANI', 'N9HV5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 10),
(150, 'YAIL JOSUE', 'VASQUEZ', 'CALLISAYA', '10084152', '807302000000000', '2002-01-06', 'YVASQUEZ', 'U4IE3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 10),
(151, 'ERIK DANIEL', 'VERTIZ', 'SAICO', '', '8073060000000000', '2001-10-14', 'EVERTIZ', 'H0EC9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 10),
(152, 'KEVIN DORIAN', 'VILLCA', 'QUISPE', '6791580', '807301000000000', '2002-02-23', 'KVILLCA', 'T3QZ3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 10),
(153, 'DIEDMAR ADRIAN', 'ALARCON', 'ARGUEDAS', '', '8073020000000000', '2001-08-11', 'DALARCON', 'Z7DY7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 12),
(154, 'JERRY', 'ARRATIA', 'CUCICANQUI', '9923477', '807301000000000', '2000-12-06', 'JARRATIA', 'Q0TK7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 12),
(155, 'WILDER MAURICIO', 'ARUQUIPA', 'QUISPE', '9871303', '807302000000000', '2001-02-24', 'WARUQUIPA', 'Z0AC8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 12),
(156, 'CRISTIAN ALEXANDER', 'AVALOS', 'ALVAREZ', '9164657', '8073030000000000', '2001-01-28', 'CAVALOS', 'W1XG5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 12),
(157, 'DANIEL ALEX', 'BRAVO', 'FERNANDEZ', '12543124', '8073020000000000', '2001-08-29', 'DBRAVO', 'D0KY6', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 12),
(158, 'ALVARO UBALDO', 'CALDERON', 'PAYE', '9187458', '807304000000000', '2001-08-19', 'ACALDERON', 'K2IL1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 12),
(159, 'EDGAR EDWIN', 'CAMARGO', 'MAMANI', '8334396', '8073020000000000', '1998-07-19', 'ECAMARGO', 'F2FU3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 12),
(160, 'JAVIER ALEXANDER', 'CA?AVIRI', 'MAMANI', '', '8073000000000000', '2000-12-06', 'JCA?AVIRI', 'N3MB3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 12),
(161, 'GEOVANNY AMILCAR', 'CATUNTA', 'MEJILLONES', '12928471', '807305000000000', '2001-09-11', 'GCATUNTA', 'F8PI8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 12),
(162, 'DANIEL JUNIOR', 'CLAVIJO', 'PALOMINO', '9165994', '807301922007185A', '2001-02-14', 'DCLAVIJO', 'X2ZB1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 12),
(163, 'EZEQUIEL DANILO', 'CORONEL', 'QUISPE', '', '8073020000000000', '2000-09-16', 'ECORONEL', 'V8UL9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 12),
(164, 'RUDDY HEBERT', 'CRUZ', 'CALLISAYA', '9909054', '807300772008351A', '2000-09-23', 'RCRUZ', 'Y9TV7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 12),
(165, 'BRAYAN', 'DELGADO', 'APAZA', '12990860', '807302000000000', '2000-06-04', 'BDELGADO', 'R6VV4', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 12),
(166, 'ADHEMAR LIMBERT', 'ESPINOZA', 'FARFAN', '9903275', '8073040000000000', '2000-10-21', 'AESPINOZA', 'X2IZ1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 12),
(167, 'OSWALDO ABRAHAM', 'FLORES', 'GUTIERREZ', '10060115', '807304000000000', '2000-05-16', 'OFLORES', 'L2YS7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 12),
(168, 'LIMBER', 'HUANCA', 'COLQUE', '', '8073020000000000', '2000-01-29', 'LHUANCA', 'V3SF2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 12),
(169, 'JOSE MARIA', 'LIMA', 'ALTAMIRANO', '9164613', '8073030000000000', '1998-12-03', 'JLIMA', 'O7OG8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 12),
(170, 'ISMAEL MARCELO', 'LIMACO', 'QUENTA', '9165756', '8073020000000000', '2000-09-18', 'ILIMACO', 'L3XW5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 12),
(171, 'ARNOLD MARCELO', 'LOAYZA', 'MENA', '9911794', '807302652007315A', '2000-07-07', 'ALOAYZA', 'Y9QG2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 12),
(172, 'LIONEL ERICK', 'LOZA', 'CHACHAQUI', '', '8073040000000000', '2001-03-27', 'LLOZA', 'E2TN7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 12),
(173, 'DEYMAR OLIVER', 'MAMANI', 'MAMANI', '8371631', '8073020000000000', '1999-08-29', 'DMAMANI', 'C7UQ2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 12),
(174, 'OMAR SEBASTIAN', 'MENDIETA', 'BUSTAMANTE', '8328171', '807302000000000', '2000-10-19', 'OMENDIETA', 'Z9LY6', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 12),
(175, 'ISRAEL DINO', 'MENDOZA', 'ROMERO', '9209172', '8073040000000000', '1999-12-08', 'IMENDOZA', 'Z4XN9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 12),
(176, 'DIEGO WIEMAR', 'MOSCOSO', 'VELEZ', '9900511', '8073060000000000', '2001-03-13', 'DMOSCOSO', 'F5ML1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 12),
(177, 'BRAYAN CESAR', 'PACO', 'RENFIJO', '9907670', '807304000000000', '2000-12-27', 'BPACO', 'B9XI2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 12),
(178, 'JUAN GUSTAVO', 'PAZ', 'PEREDO', '9903270', '8073040000000000', '2000-09-05', 'JPAZ', 'H8JX3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 12),
(179, 'JOEL EDUARDO', 'QUISPE', 'CALAMANI', '9924973', '8073000000000000', '2001-03-30', 'JQUISPE', 'T5CK7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 12),
(180, 'SEBASTIAN EMERSON', 'QUISPE', 'PEREZ', '9919094', '807301000000000', '2000-09-14', 'SQUISPE', 'E6OX9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 12),
(181, 'KEVIN JUAN', 'QUISPE', 'YUJRA', '9904342', '8073020000000000', '2001-03-27', 'KQUISPE', 'M1QJ6', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 12),
(182, 'MAYCOL', 'TARIFA', 'MIRANDA', '', '8073000000000000', '2001-02-27', 'MTARIFA', 'B9LW1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 12),
(183, 'KENNETH ALEXIS', 'VILLAR', 'QUISBERT', '7657483', '822100000000000', '2001-05-29', 'KVILLAR', 'B2RL2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 12),
(184, 'JOSE ARMANDO', 'ZACARIAS', 'DURAN', '9165355', '8073060000000000', '2000-08-12', 'JZACARIAS', 'L1AF8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 12),
(185, 'RODRIGO FRANCO', 'APAZA', 'PEREZ', '', '40730300000000', '2002-07-02', 'RAPAZA', 'W3ER2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 13),
(186, 'JORGE LUIS', 'BLANCO', 'SI?ANI', '9892385', '8073030000000000', '2000-08-05', 'JBLANCO', 'N7QC2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 13),
(187, 'CARLOS HERNAN', 'CACERES', 'PA?O', '10089053', '40730000000000', '2001-06-27', 'CCACERES', 'K4NC3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 13),
(188, 'ANDRES ERICK', 'CASAS', 'MAYTA', '', '80730222200754A', '2001-05-30', 'ACASAS', 'D6SU1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 13),
(189, 'ALDAYR RODRIGO', 'CONDORI', 'RIVERA', '', '8073010000000000', '2001-01-07', 'ACONDORI', 'L1HD6', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 13),
(190, 'PABLO ALEJANDRO', 'CRUZ', 'LIMACHI', '', '807304132007504A', '2000-10-30', 'PCRUZ', 'R2DM6', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 13),
(191, 'ELVIS', 'GIRONDA', 'SILVESTRE', '8400031', '8073060000000000', '2000-12-31', 'EGIRONDA', 'D1TW3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 13),
(192, 'BRANDON DAMIAN', 'GUTIERREZ', 'LAURA', '', '8073020000000000', '2000-01-13', 'BGUTIERREZ', 'P1HI4', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 13),
(193, 'JORGE LUIS', 'GUTIERREZ', 'VELASCO', '8335864', '8073040000000000', '2000-11-03', 'JGUTIERREZ', 'X2FU1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 13),
(194, 'JOAB AIZAR', 'JARANDILLA', 'MAYTA', '', '807301000000000', '2000-10-22', 'JJARANDILLA', 'X7ZT7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 13),
(195, 'CARLOS SAMUEL', 'LAURA', 'MAMANI', '6767994', '8073020000000000', '1999-08-12', 'CLAURA', 'N0XP2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 13),
(196, 'LUIS ANGEL', 'LOPEZ', 'CALLE', '9135078', '8073000000000000', '1998-10-08', 'LLOPEZ', 'N2YV5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 13),
(197, 'WILLIAMS EDDY', 'MAYTA', 'FERNANDEZ', '6942967', '8073010000000000', '2000-08-15', 'WMAYTA', 'N3YV6', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 13),
(198, 'LIMBERG', 'MEDRANO', 'CALLISAYA', '', '4073020000000000', '1999-10-15', 'LMEDRANO', 'V0KK9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 13),
(199, 'MICHEL JHORDAN', 'NINA', 'BLANCO', '', '807302000000000', '2001-03-22', 'MNINA', 'M1CN6', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 13),
(200, 'BRYAN', 'OSCO', 'URUCHI', '', '80730400000000', '2000-12-23', 'BOSCO', 'O7VS5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 13),
(201, 'GEORDAN JEAN', 'PACHECO', 'FLORES', '9903349', '807304132007434A', '1999-12-01', 'GPACHECO', 'G7KB9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 13),
(202, 'LUIS CARLOS', 'PARRAGA', 'MAMANI', '9155903', '807304000000000', '2001-02-09', 'LPARRAGA', 'Y8VN3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 13),
(203, 'OSCAR EDSON', 'QUISPE', 'VELASCO', '', '807301000000000', '2001-01-02', 'OQUISPE', 'M1CY5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 13),
(204, 'ALEJANDRO DELFOR', 'RIOS', 'OSCO', '', '807302000000000', '2000-12-06', 'ARIOS', 'R2RC6', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 13),
(205, 'ABBAD JHOREL', 'ROJAS', 'PABLO', '', '8073020000000000', '2000-12-17', 'AROJAS', 'R6US5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 13),
(206, 'PABLO ADALID', 'SALAZAR', 'ALANES', '9885272', '8073010000000000', '2001-06-29', 'PSALAZAR', 'V8GW1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 13),
(207, 'KEVIN ANGEL', 'SILVA', 'MAMANI', '10015168', '8073000000000000', '2000-10-14', 'KSILVA', 'U5SZ5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 13),
(208, 'DANIEL ANGEL', 'SILVA', 'MEDINA', '', '807304000000000', '2000-06-05', 'DSILVA', 'M5HJ5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 13),
(209, 'MICHAEL', 'VARGAS', 'ALVARADO', '9089002', '807305000000000', '1998-10-26', 'MVARGAS', 'A7ON2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 13),
(210, 'BRAYAM DIEGO', 'YUJRA', 'QUISPE', '9903342', '8073040000000000', '2000-11-01', 'BYUJRA', 'T2BY8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 13),
(211, 'PATRICIO', '', 'ALVARADO', '9903307', '8073040000000000', '2000-11-21', 'P', 'C3FO2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 14),
(212, 'EBERT DANIEL', 'ALI', 'TICONA', '9903316', '8073040000000000', '2000-07-21', 'EALI', 'Z5BE9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 14),
(213, 'RODRIGO ANTONIO', 'APAZA', 'VILLANUEVA', '9903303', '8073040000000000', '2001-05-05', 'RAPAZA', 'A6EX1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 14),
(214, 'ELMER JESUS', 'ARACA', 'CALSINA', '', '8073020000000000', '2000-04-22', 'EARACA', 'Z7LL5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 14),
(215, 'SILVIO IVAN', 'CANQUI', 'CALLE', '', '8073030000000000', '2000-12-24', 'SCANQUI', 'P1CT7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 14),
(216, 'MARCELO ALVARO', 'CHAMBI', 'CHILLO', '9903304', '8073040000000000', '2000-09-24', 'MCHAMBI', 'I5VJ8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 14),
(217, 'CARLOS ALBERTO ELIAS', 'CONTRERAS', 'BUENAVEREZ', '', '807304000000000', '2000-09-28', 'CCONTRERAS', 'W2BN8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 14),
(218, 'FREDDY ALVARO', 'COSME', 'MENDOZA', '', '807302000000000', '2001-11-12', 'FCOSME', 'Y1RC7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 14),
(219, 'JOAN JEREMY', 'GONZALES', 'ACARAPI', '9903347', '8073040000000000', '2000-09-30', 'JGONZALES', 'F7IV7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 14),
(220, 'EDZON BENJAMIN', 'GONZALES', 'MAMANI', '9908647', '8073010000000000', '2001-11-20', 'EGONZALES', 'S1GO7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 14),
(221, 'OSVALDO', 'LAURA', 'CHOQUE', '9904110', '807302000000000', '2001-10-05', 'OLAURA', 'R6CC1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 14),
(222, 'PABLO ABIMAEL', 'LAURA', 'PUSARICO', '9904268', '8073020000000000', '2001-07-20', 'PLAURA', 'F7YO5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 14),
(223, 'DENYLSON WILFREDO', 'PATTY', 'SAIRE', '9903318', '807304132007456A', '2000-07-19', 'DPATTY', 'N0HQ5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 14),
(224, 'LIZANDRO ARIEL', 'PATTY', 'VELASQUEZ', '', '80730100000000', '2001-04-03', 'LPATTY', 'E5ND8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 14),
(225, 'ABEL ELIO', 'PAXI', 'CONDORI', '9903265', '8073040000000000', '2001-01-06', 'APAXI', 'X8VC8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 14),
(226, 'ELVIS ANDY', 'POMA', 'CONDORI', '', '8073020000000000', '2000-03-08', 'EPOMA', 'M0IC1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 14),
(227, 'ALVIN GABRIEL', 'QUISPE', 'ALVARADO', '9903315', '8073040000000000', '2001-05-11', 'AQUISPE', 'Q0CX4', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 14),
(228, 'JESUS REYNALDO', 'QUISPE', 'CONDORI', '11110586', '807302000000000', '2002-03-26', 'JQUISPE', 'G9RQ3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 14),
(229, 'HARED MAHONRY', 'RAMOS', 'HUANCA', '8345675', '8073040000000000', '2001-02-02', 'HRAMOS', 'Q6XK4', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 14),
(230, 'AXEL JOSE ELIAN', 'RAMOS', 'LIMACHI', '9907530', '8073020000000000', '1999-07-05', 'ARAMOS', 'B3HS5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 14),
(231, 'PEDRO MATEO', 'SANCHES', 'ILLANES', '', '80730423200766A', '2000-06-15', 'PSANCHES', 'A3KI4', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 14),
(232, 'CALEB', 'TITO', 'DE LA CRUZ', '6832449', '8073040000000000', '2000-12-19', 'CTITO', 'V3XZ7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 14),
(233, 'LUDWIND ANTONIO', 'TORREZ', 'VILA', '9129741', '407303000000000', '2001-07-07', 'LTORREZ', 'H7AR2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 14),
(234, 'CHRISTIAN ISMAEL', 'UGALDE', 'TICONA', '8467376', '807302000000000', '2001-02-15', 'CUGALDE', 'G4LN9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 14),
(235, 'HANS NICK', 'VALLE', 'PUSARICO', '', '8073020000000000', '1999-12-19', 'HVALLE', 'Q3EG5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 14),
(236, 'ANDRES BERNARDO', 'VENTURA', 'QUIROZ', '8313098', '8073040000000000', '2001-04-29', 'AVENTURA', 'Y7EM5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 14),
(237, 'ALAN MAURICIO', '', 'PACO', '', '8073020000000000', '2000-01-25', 'APACO', 'Y3SX1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 15),
(238, 'ALEJANDRO FERNANDO', 'ARANCIBIA', 'MONTES', '9998260', '8073040000000000', '2000-06-10', 'AARANCIBIA', 'V5XP2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 15),
(239, 'CHRISTIAN JESUS', 'CABEZAS', 'AGUILAR', '10085396', '807304000000000', '2000-01-15', 'CCABEZAS', 'Z1EA2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 15),
(240, 'ERNESTO', 'CADENA', 'CERDANO', '12544662', '8073020000000000', '2000-08-09', 'ECADENA', 'L0JQ1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 15),
(241, 'YERKO', 'CADENA', 'CERDANO', '12544663', '807302000000000', '1999-02-25', 'YCADENA', 'U1QY4', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 15),
(242, 'YOSEPH ALAIN', 'CHALLCO', 'MACHICADO', '', '8073020000000000', '1998-10-28', 'YCHALLCO', 'A3VS2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 15),
(243, 'JHONATAN', 'CHOQUE', 'VARGAS', '', '8073010000000000', '2000-10-12', 'JCHOQUE', 'X3TO8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 15),
(244, 'DIEGO ELIAS', 'CHURQUI', 'MAYTA', '9101781', '407302582007107A', '2000-12-20', 'DCHURQUI', 'Z9FF3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 15),
(245, 'ESTEFANO GERSON', 'CONDE', 'MAMANI', '12767112', '8073020000000000', '2001-09-17', 'ECONDE', 'A4MR9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 15),
(246, 'KEVIN RODRIGO', 'GALLARDO', 'TICONA', '', '807305000000000', '2000-11-18', 'KGALLARDO', 'K5TE2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 15),
(247, 'MIGUEL ANGEL', 'GUTIERREZ', 'QUISBERT', '9200717', '807301000000000', '2000-12-02', 'MGUTIERREZ', 'Q3BJ6', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 15),
(248, 'CHRISTIAN ALEJANDRO', 'MENDOZA', 'HUARAHUARA', '10068416', '807302000000000', '2000-11-24', 'CMENDOZA', 'T9OF4', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 15),
(249, 'OSCAR', 'PACHAGUAYA', 'NINA', '10932187', '4073020000000000', '2000-01-14', 'OPACHAGUAYA', 'R6TA6', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 15),
(250, 'JHONATAN BRAYAN', 'PARRAGA', 'MAMANI', '9155902', '80730442200784A', '2000-03-13', 'JPARRAGA', 'U8XP1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 15),
(251, 'MARCELO', 'POROZO', 'YARARI', '', '806700000000000', '1996-03-26', 'MPOROZO', 'L2OS5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 15),
(252, 'JUAN CARLOS', 'QUISPE', 'NINA', '', '8073020000000000', '2000-12-16', 'JQUISPE', 'A0FS5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 15),
(253, 'RAFAEL EDUARDO', 'SAICO', 'RAMOS', '', '8073000000000000', '2001-03-24', 'RSAICO', 'D8QU3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 15),
(254, 'LEOPOLDO DANTE', 'VILLCA', 'HERRERA', '10098231', '8073030000000000', '2000-02-05', 'LVILLCA', 'O8MV8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 15),
(255, 'WALLACE EFRAIN', 'YAHUINCHA', 'NAVA', '8351631', '807302000000000', '2002-04-11', 'WYAHUINCHA', 'M1BH2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 15),
(256, 'DARWIN WILSON', 'ZAMBRANA', 'CORTEZ', '12926605', '4073000000000000', '1999-01-29', 'DZAMBRANA', 'P6KW9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 15),
(257, 'ALEXANDER SEBASTIAN', 'APAZA', 'MENDOZA', '10015839', '8073020000000000', '1999-10-17', 'AAPAZA', 'M8XW8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 16),
(258, 'CARLOS JOSE', 'AVALOS', 'CALLE', '12395373', '8073000000000000', '2000-09-08', 'CAVALOS', 'S3JD6', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 16),
(259, 'YONATHAN', 'CALLA', 'ESTEBAN', '9911918', '807304000000000', '1999-04-17', 'YCALLA', 'P7FG9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 16),
(260, 'FRANZ MILTON', 'CHINO', 'MAMANI', '9921618', '807302272007286A', '1998-07-14', 'FCHINO', 'H9UT9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 16),
(261, 'RICARDO MAURICIO', 'COLMENA', 'BARRON', '', '807304000000000', '2000-04-27', 'RCOLMENA', 'C2GK3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 16),
(262, 'HANS KEVIN', 'ESCOBAR', 'CUELLAR', '8349441', '8073040000000000', '1998-04-23', 'HESCOBAR', 'X8ZP1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 16),
(263, 'JUNIOR', 'HURTADO', 'QUISBERT', '12605615', '807302000000000', '1997-09-08', 'JHURTADO', 'V1HU5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 16),
(264, 'STIVEN JHOSUE', 'LARREA', 'LEON', '9909431', '8073010000000000', '1999-10-02', 'SLARREA', 'W8LT8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 16),
(265, 'CRISTIAN MANUEL', 'LEDEZMA', 'APARICIO', '9134678', '8073000000000000', '2000-03-15', 'CLEDEZMA', 'W2FW6', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 16),
(266, 'IVAN RODRIGO', 'LOPEZ', 'MAMANI', '9167373', '606100000000000', '1998-11-01', 'ILOPEZ', 'O9QW4', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 16),
(267, 'KEVIN ERLAN', 'LUNA', 'HERRERA', '8377630', '8073060000000000', '1999-05-19', 'KLUNA', 'K4OL4', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 16),
(268, 'ANDRES CRISTIAN', 'MOSCOSO', 'CARVAJAL', '', '807300412007334A', '1999-09-12', 'AMOSCOSO', 'Q1KH2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 16),
(269, 'JHONATAN PABLO', 'NINA', 'BLANCO', '8319082', '8073020000000000', '1999-06-11', 'JNINA', 'G4DE3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 16),
(270, 'AMILCAR DANIEL', 'NINA', 'IRUSTA', '9904177', '8073020000000000', '2000-04-10', 'ANINA', 'E1VQ5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 16),
(271, 'ALVIN', 'PANTOJA', 'MAMANI', '9909639', '8073010000000000', '2000-04-02', 'APANTOJA', 'S4WD5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 16),
(272, 'BRAYAN', 'PAUCARA', 'KENTA', '12766818', '4073030000000000', '2000-08-04', 'BPAUCARA', 'K7BV3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 16),
(273, 'GROVER ANTONIO', 'QUISBERT', 'MAMANI', '', '8073060000000000', '1999-06-12', 'GQUISBERT', 'M4II6', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 16),
(274, 'GUSTAVO EDWIN', 'QUISPE', 'MAMANI', '', '807301022007611A', '1999-08-08', 'GQUISPE', 'T3NB5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 16),
(275, 'DENILSON DANTE', 'RIVAS', 'FLORES', '', '807304232007255A', '1999-08-06', 'DRIVAS', 'N3IA5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 16),
(276, 'RONNY', 'SUZA?O', 'MENDOZA', '12483494', '807302000000000', '1999-06-16', 'RSUZA?O', 'F2SX6', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 16),
(277, 'JESUS ISRRAEL', 'TICONA', 'MAMANI', '12927801', '8073040000000000', '1999-12-13', 'JTICONA', 'D3QL3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 16),
(278, 'BRHAYAN WILLIAM', 'ALANOCA', 'CALIZAYA', '9203792', '8073040000000000', '1998-04-19', 'BALANOCA', 'U2LT9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 17),
(279, 'CESAR MANUEL', 'AMARO', 'LAGUNA', '', '8073020000000000', '1997-12-28', 'CAMARO', 'Y5QO3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 17),
(280, 'EDRIAN WILLIAMS', 'ASTORGA', 'TORO', '12895269', '807305000000000', '1999-08-24', 'EASTORGA', 'K5TS6', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 17),
(281, 'JORGE LUIS', 'CHUQUIMIA', 'CONDORI', '9906813', '8073020000000000', '2000-05-29', 'JCHUQUIMIA', 'C6GJ6', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 17),
(282, 'ALDO ISAIAS', 'CONDORI', 'MIRABAL', '12452976', '4073000000000000', '1998-02-17', 'ACONDORI', 'L1DD1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 17),
(283, 'JHONATHAN JHOAN', 'CUENCA', 'CALLE', '', '80730100000000000', '1999-03-15', 'JCUENCA', 'W5RN1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 17),
(284, 'SIMAEL RONALD', 'FLORES', 'APAZA', '9100274', '8073020000000000', '1999-04-14', 'SFLORES', 'D5LS8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 17),
(285, 'JOSE ALEJANDRO', 'FLORES', 'PIZARROSO', '12767105', '8073020000000000', '2000-05-06', 'JFLORES', 'Z1KZ9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 17),
(286, 'ALVARO YULIAN', 'GUTIERREZ', 'SAAVEDRA', '12481683', '8073010000000000', '1998-07-11', 'AGUTIERREZ', 'O8HZ4', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 17),
(287, 'LUIS MIGUEL', 'HUANCA', 'CALANI', '9909573', '8073010000000000', '2000-03-17', 'LHUANCA', 'U7RN1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 17),
(288, 'ABED ELEAZAR', 'LLUSCO', 'CHUI', '6723826', '8073010000000000', '1996-09-10', 'ALLUSCO', 'Y8QF8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 17),
(289, 'FABRICIO CRISTIAN', 'PE?ALOZA', 'BELLIDO', '9195512', '8073020000000000', '2000-08-14', 'FPE?ALOZA', 'H8OO5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 17),
(290, 'LUIS MARCELO', 'RAMOS', 'SANCHEZ', '10910900', '8073020000000000', '1999-03-07', 'LRAMOS', 'J1WA9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 17),
(291, 'JOSE LUIS', 'TORREZ', 'HUANCA', '10068701', '8073010000000000', '2000-03-26', 'JTORREZ', 'F6FP8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 17),
(292, 'LUIS JOSUE', 'USCAMAYTA', 'QUISBERT', '9090728', '8073010000000000', '2000-05-01', 'LUSCAMAYTA', 'Y1WU9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 17),
(293, 'ANDY MARCO', 'VERA', 'GUTIERREZ', '9202553', '807302000000000', '1999-06-18', 'AVERA', 'T5RN2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 17),
(294, 'BRANDON FRANKLIN', 'VILLA', 'CUTILI', '9900577', '8073060000000000', '1999-09-03', 'BVILLA', 'N2WR3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 17),
(295, 'AR?N NATANAEL', 'VILLARROEL', 'MERUVIA', '6752649', '40730100000000000', '2000-01-05', 'AVILLARROEL', 'P4JX4', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 17),
(296, 'RONALD CRISTHIAN', 'YAVI', 'ESQUIVEL', '9903354', '8073040000000000', '2000-03-28', 'RYAVI', 'P5PG5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 17),
(297, 'ROBERTO JAVIER', 'ZAMBRANA', 'BUSTAMANTE', '9903504', '807304132007423A', '1999-11-22', 'RZAMBRANA', 'F2AB5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 17),
(298, 'JOSE MANUEL', 'CADENA', 'CALLE', '9903360', '8073040000000000', '2000-08-28', 'JCADENA', 'F6WU3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 18),
(299, 'ARIEL GONZALO', 'CALLISAYA', 'PARI', '', '8090000000000000', '1998-09-15', 'ACALLISAYA', 'P7OG9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 18),
(300, 'GABRIEL ALEJANDRO', 'CARVAJAL', 'APUMAYTA', '', '8073020000000000', '2000-06-18', 'GCARVAJAL', 'K9LI5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 18),
(301, 'EFRAIN', 'CHURA', 'CALLIZAYA', '8444269', '8073020000000000', '2000-04-08', 'ECHURA', 'R4JN9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 18),
(302, 'BRYAN BEYMAR', 'CONDE', 'CONDORI', '9985529', '8073020000000000', '1999-06-08', 'BCONDE', 'X8TJ7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 18),
(303, 'RODRIGO', 'CONDORI', 'ASPI', '9903364', '8073040000000000', '2000-05-21', 'RCONDORI', 'O7PT7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 18),
(304, 'CHRISTIAN AYRTON', 'COPA', 'PEREZ', '', '40730100000000', '2000-10-14', 'CCOPA', 'H0TK8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 18),
(305, 'BRIAN RICHARD', 'CRIALES', 'VILLARTE', '9903031', '8073020000000000', '2000-03-19', 'BCRIALES', 'Z1JK9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 18),
(306, 'WILLIAMS ALEXANDER', 'CUBA', 'ROJAS', '', '8073010000000000', '1999-12-04', 'WCUBA', 'R4KL8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 18),
(307, 'FABRICIO JHACEL', 'GRAJEDA', 'RIOS', '', '807301932007317A', '1998-06-01', 'FGRAJEDA', 'W2AH8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 18),
(308, 'BEYMAR DAVID', 'GUTIERREZ', 'COAQUERA', '', '8073020000000000', '2000-01-23', 'BGUTIERREZ', 'A5KJ7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 18);
INSERT INTO `estudiante` (`est_id`, `est_nombre`, `est_paterno`, `est_materno`, `est_ci`, `est_rude`, `est_fechanac`, `est_login`, `est_password`, `est_ap_nombre`, `est_ap_parentesco`, `est_direccion`, `est_email`, `est_telefono`, `est_movil`, `est_fotoadj`, `est_fechareg`, `par_expedido_id`, `par_genero_id`, `rol_id`, `estado_id`, `curso_id`) VALUES
(309, 'BRIAN KEVIN', 'KANTUTA', 'MAMANI', '9168694', '807301000000000', '2001-06-09', 'BKANTUTA', 'I4YR9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 18),
(310, 'BRAYAN HEMER', 'LAURA', 'MANCILLA', '9090238', '8073040000000000', '1999-08-14', 'BLAURA', 'G0FT3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 18),
(311, 'SERGIO JHAMIL', 'MACHICADO', 'MONTA?O', '', '8073000000000000', '2000-01-23', 'SMACHICADO', 'B1KT9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 18),
(312, 'CRISTHIAN', 'MEDRANO', 'CALLISAYA', '', '4073020000000000', '1998-01-10', 'CMEDRANO', 'W1YL5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 18),
(313, 'JHONN ALVARO', 'MENDEZ', 'CONDE', '', '807302000000000', '1999-03-15', 'JMENDEZ', 'D3IP5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 18),
(314, 'GONZALO', 'MENDOZA', 'YUCRA', '9877479', '8073070000000000', '1999-01-09', 'GMENDOZA', 'K6TL6', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 18),
(315, 'MIGUEL ANGEL', 'MIRANDA', 'GUARAYO', '9936523', '8073020000000000', '2000-07-12', 'MMIRANDA', 'J9QR3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 18),
(316, 'HERLAN ADEMAR', 'NAVARRO', 'GUACHALLA', '', '8073020000000000', '1999-12-27', 'HNAVARRO', 'C5JV5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 18),
(317, 'ELVIS GERMAN', 'PERALTA', 'QUISPE', '9900507', '8073060000000000', '1999-05-28', 'EPERALTA', 'M4FV2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 18),
(318, 'JHAMIL KEVIN', 'PEREDO', 'MENDIETA', '', '407304000000000', '2001-02-04', 'JPEREDO', 'N8YE2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 18),
(319, 'ERICK', 'TANTANI', 'GARCIA', '9900546', '8073060000000000', '2000-01-02', 'ETANTANI', 'V4HO2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 18),
(320, 'KEVIN RODRIGO', 'TITO', 'ATTO', '8337571', '8073020000000000', '1998-05-12', 'KTITO', 'M2IY5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 18),
(321, 'CRISTOFER JAIME', 'VARGAS', 'MALDONADO', '', '807302000000000', '2000-04-17', 'CVARGAS', 'S1PY4', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 18),
(322, 'RODRIGO JOSUE', '', 'YANA', '', '8073020000000000', '1999-06-21', 'R', 'J9JM1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 19),
(323, 'RAFAEL', 'AGUILAR', 'PORCEL', '8443019', '8073030000000000', '1998-05-09', 'RAGUILAR', 'M3JJ6', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 19),
(324, 'SAMUEL ELIAS', 'BECERRA', 'AGUILAR', '9115850', '807304000000000', '1999-09-20', 'SBECERRA', 'G2AJ7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 19),
(325, 'GABRIEL EUSEBIO', 'CHOQUE', 'CHUQUIMIA', '6947039', '807305000000000', '1999-08-20', 'GCHOQUE', 'X8VQ4', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 19),
(326, 'JHOSUE RONALD', 'FLORES', 'APAZA', '9100272', '8073020000000000', '1997-10-04', 'JFLORES', 'N3HO7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 19),
(327, 'NILS LEONARDO', 'FLORES', 'QUISPE', '10083844', '8073000000000000', '1999-01-27', 'NFLORES', 'I5HS7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 19),
(328, 'JOSUE EDWIN', 'IRUSTA', 'POMA', '', '8073010000000000', '1998-10-06', 'JIRUSTA', 'M0NC7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 19),
(329, 'ALAM MICHAEL', 'MAMANI', 'CONDORI', '', '8073020000000000', '1998-03-18', 'AMAMANI', 'C9DO7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 19),
(330, 'MANFRED JOSE', 'MANTILLA', 'LLUTA', '', '8073020000000000', '1998-09-27', 'MMANTILLA', 'H9RC5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 19),
(331, 'LUIS FERNANDO', 'MAYTA', 'ARCANI', '', '4073020000000000', '1998-05-13', 'LMAYTA', 'A6HV4', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 19),
(332, 'JOSE FERNANDO', 'POMA', 'FIGUEREDO', '6742515', '8073040000000000', '2000-03-26', 'JPOMA', 'S4YJ3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 19),
(333, 'ERIK JOEL', 'POZO', 'CHOQUE', '', '407300442007245A', '1997-11-15', 'EPOZO', 'D5EP8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 19),
(334, 'BRIAN ALEJANDRO', 'SOLIZ', 'SANCHEZ', '', '807305000000000', '2000-04-28', 'BSOLIZ', 'S3EJ3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 19),
(335, 'JOSE DANIEL', 'TICONA', 'GUTIERREZ', '6945671', '807305000000000', '1999-12-03', 'JTICONA', 'Y8ZA9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 19),
(336, 'JUAN DANIEL', 'TICONA', 'GUTIERREZ', '6945670', '807305000000000', '1999-12-03', 'JTICONA', 'P1GA5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 19),
(337, 'IGNACIO ANTONIO', 'VERA', 'CALLISAYA', '6994949', '8073040000000000', '1997-10-29', 'IVERA', 'J5KN2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 19),
(338, 'LUIS ANDREY', 'VERA', 'CORO', '', '80730200000000000', '1999-10-06', 'LVERA', 'I3QK7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 19),
(339, 'JAIRO ALEJANDRO', 'VIRACA PEREZ', 'NAVIA', '6141194', '8073050000000000', '1999-01-25', 'JVIRACA PEREZ', 'O0ZF1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 19),
(340, 'REYSON RENNY', 'ZEGARRUNDO', 'CALLIZAYA', '', '8073040000000000', '1999-12-21', 'RZEGARRUNDO', 'Y0OH5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 19),
(341, 'JONATHAN YAMIL', 'ZU?AGUA', 'QUISPE', '', '8073020000000000', '2000-02-13', 'JZU?AGUA', 'X6VS5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 19),
(342, 'LEONARDO YAMIL', 'AGUILAR', 'GUTIERREZ', '9910249', '8073050000000000', '1998-04-10', 'LAGUILAR', 'E6LJ4', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 20),
(343, 'CARLOS ERICK', 'AGUILAR', 'MENDOZA', '8306765', '8073040000000000', '1999-04-22', 'CAGUILAR', 'P8VT2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 20),
(344, 'HEBER FRANCO', 'CALLISAYA', 'PACHECO', '9903530', '8073040000000000', '1999-03-03', 'HCALLISAYA', 'H3EF2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 20),
(345, 'MICHAEL KEVIN', 'CHAMBI', 'SUASACA', '9903457', '8073040000000000', '1999-09-10', 'MCHAMBI', 'I5JZ8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 20),
(346, 'RENE JHOVANNY', 'CHAVEZ', 'VALDIVIESO', '6112297', '8073020000000000', '1999-01-13', 'RCHAVEZ', 'Z7GG7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 20),
(347, 'ANDRES JAVIER', 'CLAURE', 'AGUILAR', '12543990', '8073000000000000', '1998-08-06', 'ACLAURE', 'Y3FQ1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 20),
(348, 'JORDY', 'CLAVIJO', 'ZABALA', '9165884', '8073020000000000', '1998-04-15', 'JCLAVIJO', 'H4DH4', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 20),
(349, 'GABRIEL CRISTIAN', 'CUAQUIRA', 'MAMANI', '', '8073020000000000', '1999-04-01', 'GCUAQUIRA', 'R3MR4', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 20),
(350, 'DANIEL MARCELO', 'FLORES', 'CANO', '9164874', '807305000000000', '1998-10-28', 'DFLORES', 'A9SF2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 20),
(351, 'JESSE ALAN', 'FLORES', 'PALMA', '12767339', '8073040000000000', '1999-01-29', 'JFLORES', 'F6UJ2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 20),
(352, 'ERICK ALEJANDRO', 'GUTIERREZ', 'ANGLES', '9903401', '8073040000000000', '1998-08-08', 'EGUTIERREZ', 'O0BT4', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 20),
(353, 'ADOLFO EHUFRAT', 'GUTIERREZ', 'PACHAJAYA', '10924467', '8073000000000000', '1999-08-23', 'AGUTIERREZ', 'S6MJ8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 20),
(354, 'RONALDO', 'HUANCA', 'CONDORI', '', '807304000000000', '1997-08-30', 'RHUANCA', 'Z0YX6', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 20),
(355, 'JOEL ALBERTO BERNABE', 'LARICO', 'CARRASCO', '5950187', '8073010000000000', '1998-09-06', 'JLARICO', 'D2JN2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 20),
(356, 'MIJAIL JUAN DE DIOS', 'LAURA', 'PUSARICO', '9904267', '8073020000000000', '1999-12-19', 'MLAURA', 'B8UV7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 20),
(357, 'VICTOR HUGO', 'MAMANI', 'QUISPE', '9903099', '8073020000000000', '1998-07-26', 'VMAMANI', 'J0RO1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 20),
(358, 'MIGUEL CELSO', 'MAYTA', 'LLAJSI', '12544549', '8073000000000000', '1998-07-28', 'MMAYTA', 'L3NA9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 20),
(359, 'JOSE CRISTHIAN', 'MENDIETA', 'ZAPATA', '10066119', '8073040000000000', '1999-04-28', 'JMENDIETA', 'F1IU3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 20),
(360, 'FAVIO ANGEL', 'QUELCA', 'ALFARO', '9173711', '8073040000000000', '1998-08-30', 'FQUELCA', 'M5KD8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 20),
(361, 'JULIO TRUYANO', 'QUISPE', 'CANO', '9907869', '8073000000000000', '1999-04-10', 'JQUISPE', 'H7KK2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 20),
(362, 'JOSE LIONEL', 'RENGEL', 'MENDOZA', '9155323', '8073030000000000', '1998-12-07', 'JRENGEL', 'G4JU9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 20),
(363, 'GUSTAVO MIGUEL', 'SARMIENTO', 'QUISBERT', '9102199', '8073020000000000', '1997-05-26', 'GSARMIENTO', 'V9IY8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 20),
(364, 'EDILSON ROBERTH', 'SILVA', 'HUAYHUA', '10060252', '8073040000000000', '1998-12-15', 'ESILVA', 'Q9IO5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 20),
(365, 'ISRAEL', 'SILVESTRE', 'CHOQUE', '8377978', '8073020000000000', '1999-05-17', 'ISILVESTRE', 'Q7PA2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 20),
(366, 'ALAN NIELSEN', 'VILLALOBOS', 'ESPEJO', '9982624', '8073020000000000', '1998-06-03', 'AVILLALOBOS', 'L9VJ1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 20),
(367, 'FREDDY ISRAEL', 'VILLANUEVA', 'BARCO', '6786864', '8073020000000000', '1998-06-03', 'FVILLANUEVA', 'E2RC9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 20),
(368, 'LUIS ANDRES', 'VILLARREAL', 'CHURA', '9912124', '8073010000000000', '1996-12-15', 'LVILLARREAL', 'L7AG4', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 20),
(369, 'JOSE JESUS', '', 'MAMANI', '9903187', '8073080000000000', '1999-10-16', 'JMAMANI', 'A8FB5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 21),
(370, 'GABRIEL', 'ALTUZARRA', 'ALARCON', '9903089', '8073020000000000', '1999-05-31', 'GALTUZARRA', 'G1ZE4', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 21),
(371, 'MAURICIO ISRAEL', 'ANTEZANA', 'MIRANDA', '4865945', '8073050000000000', '1997-01-27', 'MANTEZANA', 'E5NF4', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 21),
(372, 'CALEB ISRAEL', 'CALCINA', 'NINA', '8400254', '8073040000000000', '1998-07-22', 'CCALCINA', 'H2YP2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 21),
(373, 'PABLO LUIS', 'CHOQUE', 'MAMANI', '9906817', '8073020000000000', '1998-06-30', 'PCHOQUE', 'P7XN3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 21),
(374, 'TEDDY', 'CRUZ', 'AYALA', '9141021', '8054010000000000', '1999-06-24', 'TCRUZ', 'T9OD9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 21),
(375, 'JORGE LUIS', 'CRUZ', 'ESTEBAN', '9911929', '8073040000000000', '1998-11-30', 'JCRUZ', 'I4TB8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 21),
(376, 'SAUL RICARDO', 'FERNANDEZ', 'SILVA', '6748865', '8073030000000000', '1998-12-10', 'SFERNANDEZ', 'G6XX9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 21),
(377, 'EDWIN IVAN', 'FLORES', 'CHUQUIMIA', '9904136', '8073020000000000', '1996-04-15', 'EFLORES', 'L3YY6', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 21),
(378, 'JUAN JOSE', 'FLORES', 'TINTAYA', '', '8073010000000000', '1999-06-14', 'JFLORES', 'L0UG3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 21),
(379, 'JULIO BEYMAR', 'GUTIERREZ', 'LLANOS', '', '8073040000000000', '1999-02-16', 'JGUTIERREZ', 'M6CL7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 21),
(380, 'JOSUE', 'LARICO', 'CASTA?OS', '9164455', '8073030000000000', '1997-11-24', 'JLARICO', 'G9PO5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 21),
(381, 'DIEGO ALEXANDER', 'LUNA', 'MARQUEZ', '9982152', '8073020000000000', '1998-07-10', 'DLUNA', 'C7XI5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 21),
(382, 'WILLIAM ALEJANDRO', 'MACHICADO', 'CHOQUE', '8400480', '807301572007294A', '1999-08-18', 'WMACHICADO', 'V4MH3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 21),
(383, 'OMAR WILMER', 'MARCANI', 'MAMANI', '', '807304232007277A', '1999-01-20', 'OMARCANI', 'Y5II8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 21),
(384, 'DAVID HENRY', 'MARTINEZ', 'ESPEJO', '9973179', '80730100000000000', '1997-12-23', 'DMARTINEZ', 'A2HL2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 21),
(385, 'DAYNOR AMERICO', 'NINA', 'HUACANI', '', '8073020000000000', '1998-09-18', 'DNINA', 'F7CD3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 21),
(386, 'JHONATAN MICHAEL', 'ORDO?EZ', 'MAMANI', '', '8073010000000000', '1998-05-12', 'JORDO?EZ', 'Q1ML1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 21),
(387, 'MIGUEL ANGEL', 'PEREZ', 'SANTOS', '8548062', '8073040000000000', '2000-02-22', 'MPEREZ', 'J7LS7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 21),
(388, 'JUAN CARLOS', 'PILLCO', 'PINAYA', '9912010', '8073040000000000', '1999-05-04', 'JPILLCO', 'R5JY2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 21),
(389, 'SERGIO PAOLO', 'QUISBERT', 'CASTILLO', '9903713', '8073040000000000', '1998-12-19', 'SQUISBERT', 'X7CE1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 21),
(390, 'GABRIEL RODRIGO', 'QUISPE', 'CALAMANI', '', '8073000000000000', '1999-05-13', 'GQUISPE', 'R9QS4', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 21),
(391, 'JONATHAN LIMBERTH', 'RAMIREZ', 'QUISPE', '7006138', '407300442007473A', '1998-01-02', 'JRAMIREZ', 'U6GQ8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 21),
(392, 'HECTOR DANIEL', 'SIRPA', 'MONTOYA', '8349131', '8073040000000000', '1999-02-20', 'HSIRPA', 'D4WY3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 21),
(393, 'JORGE LUIS', 'TICONA', 'VILLAZANTE', '', '8073010000000000', '1999-01-15', 'JTICONA', 'T1SK2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 21),
(394, 'SERGIO RONALD', 'TIPULA', 'TINTA', '', '807305000000000', '1998-11-28', 'STIPULA', 'U0UF7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 21),
(395, 'FRANZ', 'ALANOCA', 'MARCA', '9921607', '807302000000000', '1999-01-01', 'FALANOCA', 'Q2YG9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 22),
(396, 'IGNACIO', 'ALMANZA', 'MAMANI', '', '8073020000000000', '1997-10-17', 'IALMANZA', 'L4IM2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 22),
(397, 'GARY ALBERTO', 'ALVAREZ', 'VILLA', '9925661', '8073000000000000', '1999-01-29', 'GALVAREZ', 'W8JO5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 22),
(398, 'MISAEL', 'CALLATA', 'QUISPE', '9205567', '807301000000000', '1999-09-20', 'MCALLATA', 'V4TY5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 22),
(399, 'JHERSON', 'CALLISAYA', 'CONDORI', '9885647', '807302272007312A', '1998-11-06', 'JCALLISAYA', 'W7SH6', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 22),
(400, 'ALEXIS PABLO', 'CALZADA', 'LLANQUE', '', '80730500000000', '1996-12-30', 'ACALZADA', 'C0ZB8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 22),
(401, 'ALFREDO RAMIRO', 'CASTRO', 'ORTIZ', '10009052', '8073060000000000', '1999-04-09', 'ACASTRO', 'M8JH8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 22),
(402, 'KEVIN', 'CHOQUE', 'MAMANI', '', '8073000000000000', '1999-05-21', 'KCHOQUE', 'X3VR6', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 22),
(403, 'ALVARO JESUS', 'COLQUE', 'MAMANI', '6940611', '8073020000000000', '1999-04-18', 'ACOLQUE', 'B6JU3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 22),
(404, 'JESUS ANTONIO', 'CONDORI', 'LUNA', '9915180', '8073010000000000', '1999-05-23', 'JCONDORI', 'Y9LJ7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 22),
(405, 'OMAR WILY', 'COPA', 'PEREZ', '', '407301000000000', '1999-08-21', 'OCOPA', 'R8XE1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 22),
(406, 'EDDY WEIMAR', 'CRUZ', 'CALLISAYA', '', '8073060000000000', '1998-10-23', 'ECRUZ', 'Y2JK8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 22),
(407, 'LIMBERT', 'FLORES', 'ENRRIQUEZ', '', '807307000000000', '1998-11-10', 'LFLORES', 'I8IL8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 22),
(408, 'ROGER FELIX', 'GARNICA', 'CONDE', '12896760', '8073020000000000', '1999-03-01', 'RGARNICA', 'W7UI1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 22),
(409, 'LIMBERT DANIEL', 'JACINTO', 'FLORES', '9990626', '8073040000000000', '1999-03-16', 'LJACINTO', 'H1HO7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 22),
(410, 'BENJAMIN FRANKLIN', 'LAURA', 'VERGARA', '', '8073060000000000', '1999-02-22', 'BLAURA', 'F8QV3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 22),
(411, 'CRISTIAN', 'MACHACA', 'NINA', '9936512', '8073020000000000', '1998-12-02', 'CMACHACA', 'E9AW8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 22),
(412, 'JOAN ALEJANDRO', 'MAMANI', 'ESPEJO', '', '8073010000000000', '1999-01-16', 'JMAMANI', 'D5WF2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 22),
(413, 'IVAN', 'MAMANI', 'PACO', '9900434', '8073060000000000', '1998-05-01', 'IMAMANI', 'C2CD2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 22),
(414, 'CLAUDIO ALEJANDRO', 'MENDOZA', 'ROMERO', '9209179', '8073040000000000', '1998-06-29', 'CMENDOZA', 'E2BK4', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 22),
(415, 'ANDRES ALEJANDRO', 'QUIROGA', 'VILLACORTA', '9903395', '8073040000000000', '1999-02-26', 'AQUIROGA', 'V5XM9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 22),
(416, 'DIEGO RICARDO', 'ROMERO', 'CHOQUETARQUI', '9903455', '8073040000000000', '1999-01-13', 'DROMERO', 'L0FP8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 22),
(417, 'RAUL FABRIZIO', 'UNZUETA', 'MIRANDA', '6153709', '8073050000000000', '1998-07-09', 'RUNZUETA', 'R6QH3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 22),
(418, 'DAVID JHONNY', 'APAZA', 'ZUAZO', '', '8073040000000000', '1998-09-13', 'DAPAZA', 'C5EY1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 23),
(419, 'DANNY JOSE', 'APO', 'CHOQUE', '9160223', '8073020000000000', '1998-11-24', 'DAPO', 'D1QG7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 23),
(420, 'MARCO ANTONIO', 'AROA', 'CHAMBI', '', '807304000000000', '1998-03-29', 'MAROA', 'W8JP1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 23),
(421, 'CRISTIAN RODOLFO', 'AYALA', 'FERNANDEZ', '12827757', '8073040000000000', '1999-04-15', 'CAYALA', 'G4RH5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 23),
(422, 'VEYMAR', 'BERNABE', 'CAPAJE?O', '9932368', '8070010000000000', '1999-09-16', 'VBERNABE', 'Y2BF4', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 23),
(423, 'ADEMAR JAMIL', 'CADENA', 'QUISBERT', '', '8073000000000000', '1998-05-07', 'ACADENA', 'A4KJ5', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 23),
(424, 'FERNANDO EDGAR', 'CASAS', 'CHINO', '9907681', '8073040000000000', '1998-11-08', 'FCASAS', 'V8XZ1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 23),
(425, 'JOSUE BEYMAR', 'CHAVEZ', 'CRUZ', '9166030', '807301922007873A', '1998-04-04', 'JCHAVEZ', 'Z3MX8', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 23),
(426, 'WILMER HENRRY', 'CONDORI', 'QUISPE', '6860182', '807306122007217A', '1998-07-31', 'WCONDORI', 'J9BD3', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 23),
(427, 'LUIS HECTOR', 'ESCARZA', 'LIMACHI', '', '7073010000000000', '1998-04-27', 'LESCARZA', 'R0KL2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 23),
(428, 'MAURICIO MILTON', 'FLORES', 'RIOS', '12827981', '8073020000000000', '1997-07-18', 'MFLORES', 'B6OD4', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 23),
(429, 'JORGE LUIS', 'ILLANES', 'HURTADO', '9903408', '8073040000000000', '1999-08-13', 'JILLANES', 'E7BM1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 23),
(430, 'KEVIN MIJAEL', 'MAMANI', 'MAMANI', '', '80730709200784A', '1999-10-30', 'KMAMANI', 'Z6HJ2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 23),
(431, 'ANGEL RODOLFO', 'NINA', 'ARGUATA', '', '8073050000000000', '1999-04-02', 'ANINA', 'C3UP6', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 23),
(432, 'NELSON ALEXANDER', 'OLMOS', 'DURAN', '9164883', '8073040000000000', '1997-10-10', 'NOLMOS', 'D1RQ1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 23),
(433, 'MANUEL ALEJANDRO', 'PINEDO', 'MIRANDA', '', '807304000000000', '1998-08-13', 'MPINEDO', 'V9LN7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 23),
(434, 'DENYLSON KEVIN', 'QUINO', 'VALDEZ', '', '8073070000000000', '1999-07-28', 'DQUINO', 'N2CX9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 23),
(435, 'VLADIMIR PABLO', 'QUISBERT', 'PARI', '', '8073060000000000', '1999-01-14', 'VQUISBERT', 'K5TC7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 23),
(436, 'CRISTHIAN JHERY', 'QUISPE', 'GARCIA', '11096902', '8073050000000000', '1998-09-11', 'CQUISPE', 'P7PF7', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 23),
(437, 'BEYMAR ERICK', 'QUISPE', 'INGALA', '9869799', '8073040000000000', '2000-07-22', 'BQUISPE', 'L1TS2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 23),
(438, 'JORGE RODRIGO', 'ROLLANO', 'HUANCA', '9902247', '8073060000000000', '1998-02-24', 'JROLLANO', 'N3OH2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 23),
(439, 'FRANZ RODRIGO', 'RUIZ', 'ARTEAGA', '9189219', '8073060000000000', '1999-02-20', 'FRUIZ', 'T8JK9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 23),
(440, 'ERLAN MAURICIO', 'SALGADO', 'QUISBERT', '9903540', '8073040000000000', '1999-04-19', 'ESALGADO', 'I9EA9', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 23),
(441, 'ANDY AMMISADDAI', 'SOSSA', 'ALVAREZ', '', '8073050000000000', '1997-01-15', 'ASOSSA', 'Z4NP1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 23),
(442, 'ELMER SEBASTIAN', 'YUJRA', 'DAVIU', '6896314', '8073020000000000', '1997-01-20', 'EYUJRA', 'U8MV2', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 23),
(443, 'GABRIEL ALEXI', 'ZUAZO', 'VEGA', '9124055', '8073040000000000', '1999-12-22', 'GZUAZO', 'K7FO1', '', '', '', '', '', '', '', '2016-01-01', 0, 2, 3, 1, 23),
(448, 'PRUEBA', 'PRUEBA', 'PRUEBA', '6890789', '1234', '1990-01-01', 'FMONTES', '1234', 'AODERADO', 'PADRE', '', '', '', '', NULL, '2016-01-19', 1, 2, 3, 1, NULL),
(449, 'MAGALY NORAH', 'SALAZAR', 'MARTINEZ', '6087357', '8071082000000000', '1990-08-06', 'FMONTES', '1234', '', 'PADRE', '', '', '', '', 'SALAZAR_MAGALY NORAH_449.jpg', '2016-07-23', 1, 1, 3, 3, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE IF NOT EXISTS `horario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `materia_id` int(11) NOT NULL,
  `periodo_id` int(11) NOT NULL,
  `profesor_id` int(11) NOT NULL,
  `dia_id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_horario_materia1_idx` (`materia_id`),
  KEY `fk_horario_periodo1_idx` (`periodo_id`),
  KEY `fk_horario_profesor1_idx` (`profesor_id`),
  KEY `fk_horario_par_dia1_idx` (`dia_id`),
  KEY `fk_horario_curso1_idx` (`curso_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE IF NOT EXISTS `materia` (
  `mat_id` int(11) NOT NULL AUTO_INCREMENT,
  `mat_gestion` varchar(45) DEFAULT NULL,
  `mat_sigla` varchar(45) NOT NULL,
  `mat_descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`mat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`mat_id`, `mat_gestion`, `mat_sigla`, `mat_descripcion`) VALUES
(1, '2015', 'MAT', 'MATEMATICAS'),
(2, '2015', 'SOC', 'CIENCIAS SOCIALES'),
(3, '2015', 'FIS', 'FISICA'),
(4, '2015', 'MUS', 'MUSICA'),
(5, '2015', 'LEN', 'LENGUAJE'),
(6, '2015', 'CIV', 'CIVICA'),
(7, '2015', 'NAT', 'CIENCIAS NATURALES'),
(8, '2015', 'BIO', 'BIOLOGIA'),
(9, '2015', 'NA', 'NO APLICA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

CREATE TABLE IF NOT EXISTS `nota` (
  `not_id` int(11) NOT NULL AUTO_INCREMENT,
  `not_gestion` int(11) NOT NULL,
  `not_1` int(11) DEFAULT NULL,
  `not_2` int(11) DEFAULT NULL,
  `not_3` int(11) DEFAULT NULL,
  `not_4` int(11) DEFAULT NULL,
  `est_id` int(11) NOT NULL,
  `mat_id` int(11) NOT NULL,
  PRIMARY KEY (`not_id`),
  KEY `fk_nota_estudiante_id1_idx` (`est_id`),
  KEY `fk_nota_materia_id1_idx` (`mat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `par_dia`
--

CREATE TABLE IF NOT EXISTS `par_dia` (
  `dia_id` int(11) NOT NULL AUTO_INCREMENT,
  `dia_codigo` varchar(45) NOT NULL,
  `dia_descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`dia_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `par_dia`
--

INSERT INTO `par_dia` (`dia_id`, `dia_codigo`, `dia_descripcion`) VALUES
(1, 'LUN', 'LUNES'),
(2, 'MAR', 'MARTES'),
(3, 'MIER', 'MIERCOLES'),
(4, 'JUE', 'JUEVES'),
(5, 'VIE', 'VIERNES'),
(6, 'SAB', 'SABADO'),
(7, 'DOM', 'DOMINGO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `par_expedido`
--

CREATE TABLE IF NOT EXISTS `par_expedido` (
  `uexp_id` int(11) NOT NULL,
  `uexp_codigo` varchar(5) DEFAULT NULL,
  `uexp_denominacion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`uexp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `par_expedido`
--

INSERT INTO `par_expedido` (`uexp_id`, `uexp_codigo`, `uexp_denominacion`) VALUES
(1, 'LP', 'LA PAZ'),
(2, 'OR', 'ORURO'),
(3, 'PT', 'POTOSI'),
(4, 'CBBA', 'COCHABAMBA'),
(5, 'STC', 'SANTA CRUZ'),
(6, 'CH', 'CHUQUISACA'),
(7, 'TJ', 'TARIJA'),
(8, 'BE', 'BENI'),
(9, 'PA', 'PANDO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `par_genero`
--

CREATE TABLE IF NOT EXISTS `par_genero` (
  `ugn_id` int(11) NOT NULL AUTO_INCREMENT,
  `ugn_codigo` varchar(5) NOT NULL,
  `ugn_descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`ugn_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `par_genero`
--

INSERT INTO `par_genero` (`ugn_id`, `ugn_codigo`, `ugn_descripcion`) VALUES
(1, 'F', 'FEMENINO'),
(2, 'M', 'MASCULINO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `par_tipo_disciplinario`
--

CREATE TABLE IF NOT EXISTS `par_tipo_disciplinario` (
  `ptd_id` int(11) NOT NULL AUTO_INCREMENT,
  `ptd_codigo` varchar(45) NOT NULL,
  `ptd_descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`ptd_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `par_tipo_disciplinario`
--

INSERT INTO `par_tipo_disciplinario` (`ptd_id`, `ptd_codigo`, `ptd_descripcion`) VALUES
(1, 'FRSP', 'Falta de respeto a sus docentes, no cumple ni'),
(2, 'NORPT', 'No respeta a sus compañeros (as)'),
(3, 'INDIS', 'Es indisciplinado (a) e interrumpir en clases'),
(4, 'UNIF', 'Sin el uniforme del colegio'),
(5, 'MAT', 'Sin material de trabajo escolar'),
(6, 'NOTRAB', 'No trabaja en aula'),
(7, 'NOAGE', 'No trae su agenda'),
(8, 'NOTP', 'No presenta tareas o trabajos prácticos'),
(9, 'CEL', 'Uso de celulares, audífonos, juegos electróni'),
(10, 'ALIM', 'Consume alimentos en clase'),
(11, 'FALT', 'Faltas continuas a clases'),
(12, 'VOCA', 'Su vocabulario es inapropiado'),
(13, 'DEST', 'Destrucción del mobiliario, infraestructura y'),
(14, 'ATRA', 'Atraso'),
(15, 'ABAN', 'Abandono de materia'),
(16, 'FUER', 'Fuera del aula sin permiso'),
(17, 'SIRPT', 'Es respetuoso, tolerante y colaborador'),
(18, 'SIRSP', 'Es responsable con sus trabaos ejemplo de bue'),
(19, 'SIREND', 'Es un estudiante con un buen rendimiento acad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `par_tipo_falta`
--

CREATE TABLE IF NOT EXISTS `par_tipo_falta` (
  `ptf_id` int(11) NOT NULL AUTO_INCREMENT,
  `ptf_codigo` varchar(45) NOT NULL,
  `ptf_descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`ptf_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `par_tipo_falta`
--

INSERT INTO `par_tipo_falta` (`ptf_id`, `ptf_codigo`, `ptf_descripcion`) VALUES
(1, 'ATR', 'ATRASO'),
(2, 'FUG', 'FUGA'),
(3, 'FIN', 'FALTA INJUSTIFICADA'),
(4, 'FJU', 'FALTA JUSTIFICADA'),
(5, 'PER', 'PERMISO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE IF NOT EXISTS `periodo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hora_inicio` varchar(10) NOT NULL,
  `hora_fin` varchar(10) NOT NULL,
  `estado_est_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_periodo_estado1_idx` (`estado_est_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `periodo`
--

INSERT INTO `periodo` (`id`, `hora_inicio`, `hora_fin`, `estado_est_id`) VALUES
(1, '08:00', '09:00', 1),
(2, '09:00', '10:00', 1),
(3, '10:00', '11:00', 1),
(4, '11:00', '12:00', 1),
(5, '12:00', '13:00', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE IF NOT EXISTS `profesor` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_gestion` int(11) NOT NULL,
  `pro_nombre` varchar(45) NOT NULL,
  `pro_paterno` varchar(45) NOT NULL,
  `pro_materno` varchar(45) DEFAULT NULL,
  `pro_ci` varchar(45) NOT NULL,
  `pro_direccion` varchar(100) DEFAULT NULL,
  `pro_email` varchar(45) DEFAULT NULL,
  `pro_telefono` varchar(45) DEFAULT NULL,
  `pro_movil` varchar(45) DEFAULT NULL,
  `pro_login` varchar(45) NOT NULL,
  `pro_password` varchar(45) NOT NULL,
  `pro_fechreg` date NOT NULL,
  `par_expedido_id` int(11) NOT NULL,
  `par_genero_id` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `estado_id` int(11) NOT NULL,
  PRIMARY KEY (`pro_id`),
  KEY `fk_profesor_par_genero1_idx` (`par_genero_id`),
  KEY `fk_profesor_rol1_idx` (`rol_id`),
  KEY `fk_profesor_estado1_idx` (`estado_id`),
  KEY `fk_profesor_par_expedido_idx` (`par_expedido_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`pro_id`, `pro_gestion`, `pro_nombre`, `pro_paterno`, `pro_materno`, `pro_ci`, `pro_direccion`, `pro_email`, `pro_telefono`, `pro_movil`, `pro_login`, `pro_password`, `pro_fechreg`, `par_expedido_id`, `par_genero_id`, `rol_id`, `estado_id`) VALUES
(2, 2015, 'EDUARDO', 'SALINAS', 'PIZA', '6052639', 'Z. ACHACHICALA', 'eddy@hotmail.com', '2306739', '73247186', 'ESALINAS', '1234', '2015-11-18', 1, 2, 4, 1),
(3, 2015, 'MAX', 'MONTANA', 'GOMEZ', '5412826', 'Z. MIRAFLORES', 'max@hotmail.com', '2894512', '71245789', 'MAX', '1234', '2015-11-18', 1, 2, 4, 1),
(4, 2015, 'FRANZ', 'CUEVAS', 'BARBAS', '6108554', 'Z. ALTO LIMA', 'franz@hotmail.com', '2784599', '63265987', 'FRANZ', '1234', '2015-11-18', 1, 2, 4, 1),
(5, 2015, 'ALDO', 'VALDEZ', 'FLORES', '5229842', 'Z. LA PORTADA', 'aldo@hotmail.com', '2986512', '70378985', 'AVALDEZ', '1234', '2015-11-18', 1, 2, 4, 1),
(6, 2015, 'ZENON', 'CONDORI', 'RAMOS', '6698204', 'Z. CIUDAD SATELITE', 'zenon@hotmail.com', '2142536', '61548792', 'ZCONDORI', '1234', '2015-11-18', 1, 2, 4, 1),
(7, 2015, 'JUAN', 'PEREZ', 'ZAMBRANA', '5014785', 'Z. GRAN PODER', 'juan@hotmail.com', '2475869', '70791567', 'JUAN', '1234', '2015-11-18', 1, 2, 4, 1),
(8, 2015, 'ANA', 'LOPEZ', 'CORRALES', '4602789', 'Z. MIRAFLORES', 'ana@hotmail.com', '2748596', '70131974', 'ANA', '1234', '2015-11-18', 1, 1, 4, 1),
(9, 2015, 'ROSA', 'FLORES', 'BARRIOS', '5189963', 'Z. ACHACHICALA', 'rosa@hotmail.com', '2976431', '70571829', 'RFLORES', '1234', '2015-11-18', 1, 1, 4, 1),
(10, 2015, 'JESUS', 'CESPEDES', 'ALI', '6328544', 'Z. OBRAJES', 'jesus@hotmail.com', '2194826', '60525694', 'JESUS', '1234', '2015-11-18', 1, 2, 4, 1),
(11, 2015, 'DANIEL', 'RUBIO', 'DELGADO', '6874837', 'Z. ALTO LIMA', 'daniel@hotmail.com', '2642578', '74532875', 'DANIEL', '1234', '2015-11-18', 1, 2, 4, 1),
(12, 2015, 'VICTOR', 'POZO', 'MENDEZ', '6913752', 'Z. NUEVA ZONA', 'victor@hotmail.com', '2946122', '70825193', 'VICTOR', '1234', '2015-11-18', 1, 2, 4, 1),
(13, 2015, 'VIVIAN', 'SANCHEZ', 'MORENO', '5972169', 'EL ALTO', 'vivian@gmail.com', '2457845', '70252520', 'VSANCHEZ', 'amy5972169', '2015-12-31', 1, 1, 4, 1),
(14, 2015, 'VERONICA', 'MARCA', 'PATA', '123456', 'CEJA', 'm@gmail.com', '', '', 'VERONICA', 'mpv123456', '2015-12-31', 5, 1, 4, 1),
(15, 2015, 'RUBEN', 'AGUIRRE', 'PARADO', '321', 'CALLE MEXICO', 'ruben@gmail.com', '2784578', '70569857', 'RAGUIRRE', 'apr321', '2015-12-31', 1, 2, 4, 1),
(16, 2015, 'CARMEN', 'HUANCA', 'MOLLO', '777', 'OBRAJES NRO 123', 'carmen@gmail.com', '2457858', '78585852', 'CHUANCA', 'mmg777', '2015-12-31', 5, 1, 4, 1),
(17, 2015, 'FLORINDA', 'MEZA', 'ZAPATA', '5685856', '', '', '', '78585852', 'FMEZA', 'mzf5685856', '2016-01-03', 1, 1, 4, 1),
(18, 2015, 'WALTER', 'PEREIRA', 'ROBLES', '4258236', 'TERCER ANILLO', '', '', '', 'WPEREIRA', 'prw4258236', '2016-01-03', 5, 2, 4, 1),
(19, 2015, 'MIGUEL', 'COTAÑA', 'MIER', '4787878', 'PUENTE NEGRO', 'miguel@gmail.com', '2457858', '7141414', 'MCOTAñA', 'maa4787878', '2016-01-03', 5, 2, 4, 1),
(20, 2015, 'RAMIRO', 'FLORES', 'ESCOBAR', '5785858', 'CALLE MEXIO NRO 123', 'ramiro@gmail.com', '2457858', '70215425', 'RFLORES', 'ver5785858', '2016-01-06', 3, 2, 4, 1),
(21, 2016, 'POCHOLO', 'MAMANI', 'QUENTA', '555', 'CEJA', '', '', '', 'PMAMANI', 'mqp555', '2016-01-15', 4, 2, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_disciplinario`
--

CREATE TABLE IF NOT EXISTS `registro_disciplinario` (
  `dis_id` int(11) NOT NULL AUTO_INCREMENT,
  `dis_fecha` date NOT NULL,
  `dis_iddisciplinario` int(11) NOT NULL,
  `dis_relacionHecho` text CHARACTER SET latin1,
  `dis_solucion` text CHARACTER SET latin1,
  `dis_estudiante` int(11) NOT NULL,
  PRIMARY KEY (`dis_id`),
  KEY `fk_disciplinario_estudiante_idx` (`dis_estudiante`),
  KEY `fk_disciplinario_tipodisciplina_idx` (`dis_iddisciplinario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `registro_disciplinario`
--

INSERT INTO `registro_disciplinario` (`dis_id`, `dis_fecha`, `dis_iddisciplinario`, `dis_relacionHecho`, `dis_solucion`, `dis_estudiante`) VALUES
(1, '1970-01-01', 1, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `rl_id` int(11) NOT NULL AUTO_INCREMENT,
  `rl_codigo` varchar(45) NOT NULL,
  `rl_denominacion` varchar(45) NOT NULL,
  PRIMARY KEY (`rl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`rl_id`, `rl_codigo`, `rl_denominacion`) VALUES
(1, 'ADM', 'ADMINISTRATIVO'),
(2, 'ROOT', 'SUPER USUARIO'),
(3, 'EST', 'ESTUDIANTE'),
(4, 'DOC', 'DOCENTE');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `asi_idest` FOREIGN KEY (`asi_idest`) REFERENCES `estudiante` (`est_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `asi_idfal` FOREIGN KEY (`asi_idfal`) REFERENCES `par_tipo_falta` (`ptf_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_asistencia_materia1` FOREIGN KEY (`materia_idmateria`) REFERENCES `materia` (`mat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `fk_estudiante_curso1` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`cur_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_estudiante_estado1` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`est_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_estudiante_par_genero1` FOREIGN KEY (`par_genero_id`) REFERENCES `par_genero` (`ugn_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_estudiante_rol1` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`rl_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `fk_horario_curso1` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`cur_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_horario_materia1` FOREIGN KEY (`materia_id`) REFERENCES `materia` (`mat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_horario_par_dia1` FOREIGN KEY (`dia_id`) REFERENCES `par_dia` (`dia_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_horario_periodo1` FOREIGN KEY (`periodo_id`) REFERENCES `periodo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_horario_profesor1` FOREIGN KEY (`profesor_id`) REFERENCES `profesor` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `fk_nota_estudiante_id1` FOREIGN KEY (`est_id`) REFERENCES `estudiante` (`est_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nota_materia_id1` FOREIGN KEY (`mat_id`) REFERENCES `materia` (`mat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `periodo`
--
ALTER TABLE `periodo`
  ADD CONSTRAINT `fk_periodo_estado1` FOREIGN KEY (`estado_est_id`) REFERENCES `estado` (`est_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD CONSTRAINT `fk_profesor_estado1` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`est_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_profesor_par_genero1` FOREIGN KEY (`par_genero_id`) REFERENCES `par_genero` (`ugn_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_profesor_rol1` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`rl_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `registro_disciplinario`
--
ALTER TABLE `registro_disciplinario`
  ADD CONSTRAINT `fk_disciplinario_estudiante` FOREIGN KEY (`dis_estudiante`) REFERENCES `estudiante` (`est_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
