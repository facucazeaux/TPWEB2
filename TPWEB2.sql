-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-09-2024 a las 20:10:36
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
-- Base de datos: `serie`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id_genero` int(45) NOT NULL,
  `genero` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_genero`, `genero`) VALUES
(11, 'Terror'),
(12, 'Romance'),
(13, 'Ciencia Ficcion'),
(14, 'Accion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serie`
--

CREATE TABLE `serie` (
  `id` int(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `temporadas` int(45) NOT NULL,
  `protagonistas` varchar(250) NOT NULL,
  `director` varchar(45) NOT NULL,
  `CalificacionPorEdad` varchar(5) NOT NULL,
  `resumen` text NOT NULL,
  `id_genero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `serie`
--

INSERT INTO `serie` (`id`, `nombre`, `temporadas`, `protagonistas`, `director`, `CalificacionPorEdad`, `resumen`, `id_genero`) VALUES
(1, 'Outer Banks', 3, 'Madelyn Cline , Rudy Pankow, Chase Stokes, Jo', 'Jonas Pate', '+16', 'Outer Banks sigue a un grupo de adolescentes en los Bancos Externos de Carolina del Norte llamados a sí mismos «Pogues» y están decididos a averiguar qué le sucedió al padre desaparecido del cabecilla del grupo, John B. (Chase Stokes). En el camino, descubren un tesoro legendario relacionado con el padre de John B.6​\r\n\r\nPerseguidos por la ley y un grupo rico y superior llamado los «Kook» de Figure Eight, los Pogues buscan superar obstáculos como las drogas, el amor, la lucha, la amistad, el dinero y cómo los ricos siguen ganando para completar el objetivo del padre de John B. en el que había estado trabajando durante 20 años.', 14),
(2, 'The Last of Us', 1, 'Pedro Pascal , Bella Ramsey', '', '+16', 'The Last of Us es una serie de televisión estadounidense postapocalíptica que se estrenó el 15 de enero de 2023 a través de HBO. Basada en el videojuego de 2013 del mismo nombre desarrollado por Naughty Dog. La serie sigue a Joel (Pedro Pascal), un contrabandista encargado de escoltar a la adolescente Ellie (Bella Ramsey) a través de un Estados Unidos postapocalíptico. También cuenta con Tommy (Gabriel Luna), el hermano menor de Joel y exsoldado.', 14),
(3, ' Supernatural', 15, 'Jared Padalecki, Jensen Ackles, Katie Cassidy, Lauren Cohan, Misha Collins, Mark A. Sheppard, Mark Pellegrino, Alexander Calvert', ' Shigeyuki Miya y Atsuko Ishizuka ', '+18', 'Cuando eran niños, Sam y Dean Winchester, perdieron a su madre debido a una misteriosa y demoníaca fuerza supernatural. Posteriormente, su padre los crió para que fueran soldados. Él les enseño sobre el mal que vive en los rincones obscuros y en las carreteras secundarias de América... y también les enseñó como matarlo. Ahora los hermanos Winchester recorren el país en su Chevy Impala del \'67, luchando contra todo tipo de amenaza sobrenatural que encuentran en el camino.', 11),
(4, 'El verano en que me enamoré', 2, 'Lola Tung, Jackie Chung, Rachel Blanchard, Christopher Briney, Gavin Casalegno, Sean Kaufman, Alfredo Narciso, Minnie Mills, Colin Ferguson, Tom Everett Scott, Rain Spencer, JP Lambert, Summer Madison, David Iacono, Sarah Hudson, Rea DeRosa, Al Vicen', 'Jesse Peretz, Jeff Chan, Erica Dunton', '+18', 'Belly Conklin está por cumplir 16 años y va a su lugar favorito en el mundo, la playa de Cousins, para pasar el verano con su familia y los Fisher. Belly ha crecido mucho durante el último año y siente que este verano será diferente a los anteriores. El verano en que me enamoré está basado en el libro de Jenny Han, quien es la creadora y productora ejecutiva.', 12),
(5, 'El hipnotizador ', 2, 'Leonardo Sbaraglia, Chico Díaz, César Troncoso, Marilú Marini, Juliana Didone, Bianca Comparato, Chino Darín, Christiana Ubach y Delfi Galbiati', 'Alex Gabasi y José Eduardo Belmonte', '+16', 'Un hipnotizador condenado a un insomnio eterno que se dedica a adormecer a la gente y desenterrar sus recuerdos perdidos.', 13);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `serie`
--
ALTER TABLE `serie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `serie` (`id_genero`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `serie`
--
ALTER TABLE `serie`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `serie`
--
ALTER TABLE `serie`
  ADD CONSTRAINT `serie` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
