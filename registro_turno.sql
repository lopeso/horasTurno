-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Dez-2023 às 19:57
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bancohoras`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `registro_turno`
--

CREATE TABLE `registro_turno` (
  `id` int(11) NOT NULL,
  `horaEntrada` time NOT NULL,
  `HoraSaida` time NOT NULL,
  `HorasDiurnas` time NOT NULL,
  `HorasNoturnas` time NOT NULL,
  `TotalTurno` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `registro_turno`
--

INSERT INTO `registro_turno` (`id`, `horaEntrada`, `HoraSaida`, `HorasDiurnas`, `HorasNoturnas`, `TotalTurno`) VALUES
(389, '15:00:00', '23:00:00', '07:00:00', '01:00:00', '08:00:00'),
(390, '19:03:00', '06:59:00', '04:00:00', '07:00:00', '12:04:00'),
(391, '23:59:00', '08:02:00', '03:00:00', '06:00:00', '15:57:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `registro_turno`
--
ALTER TABLE `registro_turno`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `registro_turno`
--
ALTER TABLE `registro_turno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=392;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
