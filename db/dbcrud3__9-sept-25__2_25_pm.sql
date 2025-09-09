-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-09-2025 a las 21:25:21
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

--
-- Volcado de datos para la tabla `dominio`
--

INSERT INTO `dominio` (`domid`, `nomdom`) VALUES
(1, 'Tipo documento'),
(2, 'Opciones'),
(3, 'Genero'),
(4, 'Estado civil');

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
(1, 'Configuración', 'fa-solid fa-gears', 1, 1001),
(2, 'Registro usuarios', 'fa-solid fa-book', 1, 2001),
(3, 'Información usuario', 'fa-solid fa-user', 1, 20011),
(4, 'Tienda', 'fa-solid fa-shop', 1, 3001),
(5, 'pruebas', 'fa-solid fa-flask-vial', 1, 123),
(6, 'Inventario', 'fa-solid fa-warehouse', 1, 4001);

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
(123, 'Pruebas', 'views/vusu.php', 5, 100, 'home.php', 'fa-solid fa-flask-vial', 5),
(1001, 'Pagina', 'views/vpag.php', 5, 1, 'home.php', 'fa-solid fa-file', 1),
(1010, 'Módulo', 'views/vmod.php', 5, 2, 'home.php', 'fa-solid fa-folder', 1),
(1021, 'Dominio', 'views/vdom.php', 5, 3, 'home.php', 'fa-solid fa-table', 1),
(1022, 'Valor', 'views/vval.php', 5, 4, 'home.php', 'fa-solid fa-dollar-sign', 1),
(2001, 'Usuarios', 'views/vusu.php', 5, 1, 'home.php', 'fa-solid fa-user', 2),
(2010, 'Perfil', 'views/vpef.php', 5, 2, 'home.php', 'fa-solid fa-address-card', 2),
(3001, 'Productos', 'views/vprod.php', 5, 2, 'home.php', 'fa-solid fa-basket-shopping', 4),
(3010, 'Tiendas', 'views/vshop.php', 5, 5, 'home.php', 'fa-solid fa-shop', 1),
(4001, 'Inventario', 'views/vdom.php', 5, 1, 'home.php', 'fa-solid fa-warehouse', 6),
(20011, 'Info de usuario', 'views/usuario.php', 5, 3, 'home.php', 'fa-solid fa-user', 3);

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
(1, 'Administrador', 1, 1001),
(2, 'Admin - registro', 2, 2001),
(5, 'Usuario', 3, 20011),
(7, 'Admin - Tienda', 4, 3001),
(8, 'Pruebas', 5, 123),
(9, 'Jefe de inventario', 6, 4001);

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
(7, 5),
(9, 5),
(1, 1),
(1, 2),
(1, 5),
(1, 7),
(1, 8),
(1, 9);

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
(3001, 7),
(2001, 2),
(2010, 2),
(20011, 5),
(1001, 1),
(1010, 1),
(1021, 1),
(1022, 1),
(3010, 1),
(123, 8),
(4001, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda`
--

CREATE TABLE `tienda` (
  `idshop` bigint(11) NOT NULL,
  `nit` varchar(12) DEFAULT NULL,
  `direc` varchar(100) DEFAULT NULL,
  `razsoc` varchar(50) DEFAULT NULL,
  `tel` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tienda`
--

INSERT INTO `tienda` (`idshop`, `nit`, `direc`, `razsoc`, `tel`) VALUES
(1, '123456', 'CL7a #5-53', 'El barrio', '651561651'),
(2, '02020202', 'USA', 'prueba', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusu` bigint(11) NOT NULL,
  `ndoc` bigint(10) DEFAULT NULL,
  `tipo_doc` bigint(10) DEFAULT NULL,
  `nomusu` varchar(255) DEFAULT NULL,
  `appusu` varchar(100) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tel` bigint(10) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `direc` varchar(255) DEFAULT NULL,
  `fecnac` date DEFAULT NULL,
  `actper` int(1) DEFAULT NULL,
  `sexo` varchar(1) DEFAULT NULL,
  `estado` bigint(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusu`, `ndoc`, `tipo_doc`, `nomusu`, `appusu`, `email`, `tel`, `pass`, `direc`, `fecnac`, `actper`, `sexo`, `estado`, `foto`) VALUES
(1, 1075652425, 1, 'Brayan Andrey', 'Cuevas Reina', 'brayan004c@gmail.com', 3012678715, 'bba28b79d9a1ad0d0aa2677f9f7d87e7ba76f1b3', 'CL7a #5-53', '2004-10-13', 5, '8', 10, 'img\\profile-photos/per_20250907182339.jpg'),
(7, 1234567855, 1, 'Billie Eilish', 'O\'connell', 'billie@eilish.com', 778895955, 'bba28b79d9a1ad0d0aa2677f9f7d87e7ba76f1b3', 'USA', '2001-12-18', 5, '7', 10, 'img\\profile-photos/per_20250829164155.jpg'),
(9, 12357625, 1, 'Pepe ', 'Martínez ', 'elpepe@gmail.com', 836867673, 'bba28b79d9a1ad0d0aa2677f9f7d87e7ba76f1b3', 'Kr 6 #4-34', '2007-10-03', 5, '8', 11, NULL);

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
-- Volcado de datos para la tabla `valor`
--

INSERT INTO `valor` (`valid`, `nomval`, `domid`) VALUES
(1, 'C.C', 1),
(2, 'T.I', 1),
(3, 'C.E', 1),
(4, 'Pasaporte', 1),
(5, 'Si', 2),
(6, 'No', 2),
(7, 'Femenino', 3),
(8, 'Masculino', 3),
(9, 'Otro', 3),
(10, 'Soltero/a', 4),
(11, 'Casado/a', 4),
(12, 'Divorciado/a', 4),
(13, 'Viudo/a', 4),
(14, 'Unión libre', 4),
(15, 'Separado/a', 4);

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
-- Indices de la tabla `tienda`
--
ALTER TABLE `tienda`
  ADD PRIMARY KEY (`idshop`);

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
  MODIFY `domid` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `modid` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `pefid` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tienda`
--
ALTER TABLE `tienda`
  MODIFY `idshop` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusu` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `valor`
--
ALTER TABLE `valor`
  MODIFY `valid` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
