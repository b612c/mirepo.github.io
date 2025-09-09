-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-08-2025 a las 00:22:16
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
-- Base de datos: `dbcrud3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dominio`
--

CREATE TABLE `dominio` (
  `domid` bigint(11) NOT NULL,
  `nomdom` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `modid` bigint(11) NOT NULL,
  `modnm` varchar(255) DEFAULT NULL,
  `modimg` varchar(255) DEFAULT NULL,
  `modact` int(1) DEFAULT NULL,
  `pgid` bigint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`modid`, `modnm`, `modimg`, `modact`, `pgid`) VALUES
(1, 'Configuración', 'fa-solid fa-gears', 1, 1010),
(2, 'Registro Usuarios', 'fa-solid fa-book', 1, 2001);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina`
--

CREATE TABLE `pagina` (
  `pgid` bigint(11) NOT NULL,
  `pgnom` varchar(255) DEFAULT NULL,
  `pgarc` varchar(255) DEFAULT NULL,
  `pgmos` int(1) DEFAULT NULL,
  `pgord` int(10) DEFAULT NULL,
  `pgmen` varchar(50) DEFAULT NULL,
  `icono` varchar(255) DEFAULT NULL,
  `modid` bigint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pagina`
--

INSERT INTO `pagina` (`pgid`, `pgnom`, `pgarc`, `pgmos`, `pgord`, `pgmen`, `icono`, `modid`) VALUES
(1010, 'Módulo', 'views/vmod.php', 1, 3, 'home.php', 'fa-solid fa-folder', 1),
(2001, 'Usuarios', 'views/vusu.php', 1, 1, 'home.php', 'fa-solid fa-user', 2),
(2010, 'Perfil', 'views/vpef.php', 1, 2, 'home.php', 'fa-solid fa-address-card', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `pefid` bigint(11) NOT NULL,
  `pefnm` varchar(255) DEFAULT NULL,
  `modid` bigint(11) DEFAULT NULL,
  `pgid` bigint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`pefid`, `pefnm`, `modid`, `pgid`) VALUES
(1, 'Administrador', 1, 1010),
(2, 'Admin - registro', 2, 2001);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pfxus`
--

CREATE TABLE `pfxus` (
  `idusu` bigint(11) DEFAULT NULL,
  `pefid` bigint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pfxus`
--

INSERT INTO `pfxus` (`idusu`, `pefid`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pgxpf`
--

CREATE TABLE `pgxpf` (
  `pgid` bigint(11) DEFAULT NULL,
  `pefid` bigint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pgxpf`
--

INSERT INTO `pgxpf` (`pgid`, `pefid`) VALUES
(2001, 2),
(1010, 1),
(2010, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusu` bigint(11) NOT NULL,
  `ndoc` bigint(10) DEFAULT NULL,
  `tipo_doc` bigint(10) DEFAULT NULL,
  `nomusu` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tel` bigint(10) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `direc` varchar(255) DEFAULT NULL,
  `fecnac` date DEFAULT NULL,
  `actper` int(1) DEFAULT NULL,
  `sexo` varchar(1) DEFAULT NULL,
  `estado` bigint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusu`, `ndoc`, `tipo_doc`, `nomusu`, `email`, `tel`, `pass`, `direc`, `fecnac`, `actper`, `sexo`, `estado`) VALUES
(1, 1075652425, NULL, 'Brayan Andrey Cuevas\nReina', 'brayan004c@gmail.com', 3012678715, 'bba28b79d9a1ad0d0aa2677f9f7d87e7ba76f1b3', 'cl 7a #5-53', '2004-10-13', 1, 'M', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valor`
--

CREATE TABLE `valor` (
  `valid` bigint(11) NOT NULL,
  `nomval` varchar(255) DEFAULT NULL,
  `domid` bigint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dominio`
--
ALTER TABLE `dominio`
  ADD PRIMARY KEY (`domid`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`modid`);

--
-- Indices de la tabla `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`pgid`),
  ADD KEY `fk_pg_modid` (`modid`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`pefid`),
  ADD KEY `fk_pf_modid` (`modid`);

--
-- Indices de la tabla `pfxus`
--
ALTER TABLE `pfxus`
  ADD KEY `fk_pfxus_idusu` (`idusu`),
  ADD KEY `fk_pfxus_pefid` (`pefid`);

--
-- Indices de la tabla `pgxpf`
--
ALTER TABLE `pgxpf`
  ADD KEY `fk_pgxpef_pgid` (`pgid`),
  ADD KEY `fk_pgxpef_pefid` (`pefid`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusu`);

--
-- Indices de la tabla `valor`
--
ALTER TABLE `valor`
  ADD PRIMARY KEY (`valid`),
  ADD KEY `fk_val_domid` (`domid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dominio`
--
ALTER TABLE `dominio`
  MODIFY `domid` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `modid` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `pefid` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusu` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `valor`
--
ALTER TABLE `valor`
  MODIFY `valid` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pagina`
--
ALTER TABLE `pagina`
  ADD CONSTRAINT `fk_pg_modid` FOREIGN KEY (`modid`) REFERENCES `modulo` (`modid`);

--
-- Filtros para la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD CONSTRAINT `fk_pf_modid` FOREIGN KEY (`modid`) REFERENCES `modulo` (`modid`);

--
-- Filtros para la tabla `pfxus`
--
ALTER TABLE `pfxus`
  ADD CONSTRAINT `fk_pfxus_idusu` FOREIGN KEY (`idusu`) REFERENCES `usuario` (`idusu`),
  ADD CONSTRAINT `fk_pfxus_pefid` FOREIGN KEY (`pefid`) REFERENCES `perfil` (`pefid`);

--
-- Filtros para la tabla `pgxpf`
--
ALTER TABLE `pgxpf`
  ADD CONSTRAINT `fk_pgxpef_pefid` FOREIGN KEY (`pefid`) REFERENCES `perfil` (`pefid`),
  ADD CONSTRAINT `fk_pgxpef_pgid` FOREIGN KEY (`pgid`) REFERENCES `pagina` (`pgid`);

--
-- Filtros para la tabla `valor`
--
ALTER TABLE `valor`
  ADD CONSTRAINT `fk_val_domid` FOREIGN KEY (`domid`) REFERENCES `dominio` (`domid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
