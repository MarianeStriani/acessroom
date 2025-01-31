-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31-Jan-2025 às 21:28
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bancolocal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE `reserva` (
  `idreserva` int(11) NOT NULL,
  `idsala` int(11) DEFAULT NULL,
  `periodo` varchar(20) DEFAULT NULL,
  `dtlocacao` datetime DEFAULT NULL,
  `dtdevolucao` datetime DEFAULT NULL,
  `nregistro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `reserva`
--

INSERT INTO `reserva` (`idreserva`, `idsala`, `periodo`, `dtlocacao`, `dtdevolucao`, `nregistro`) VALUES
(63, 14, 'NOITE', '2023-04-04 01:59:46', '2023-04-05 14:05:56', 2513),
(64, 14, 'TARDE', '2023-04-05 15:35:04', '2023-04-05 17:14:42', 8520),
(65, 20, 'TARDE', '2023-04-05 17:11:10', '2023-04-05 17:15:10', 0),
(66, 14, 'TARDE', '2023-04-05 17:16:03', '2023-04-05 17:16:10', 8520),
(67, 17, 'TARDE', '2023-04-05 17:16:21', '2023-04-10 13:58:50', 0),
(68, 20, 'TARDE', '2023-04-05 17:16:37', '2023-04-10 13:58:56', 1234),
(69, 22, 'NOITE', '2023-04-05 20:04:32', '2023-04-10 13:59:04', 1234),
(70, 23, 'NOITE', '2023-04-05 20:04:56', '2023-04-10 13:59:11', 8520),
(71, 14, 'TARDE', '2023-04-06 14:17:02', '2023-04-06 14:18:01', 1234),
(72, 14, 'TARDE', '2023-04-06 14:18:12', '2023-04-06 14:20:22', 2513),
(73, 27, 'TARDE', '2023-04-06 14:19:04', '2023-04-10 13:59:17', 2712),
(74, 14, 'TARDE', '2023-04-06 17:38:01', '2023-04-06 17:38:10', 1234),
(75, 14, 'TARDE', '2023-04-06 17:38:23', '2023-04-06 17:39:15', 1234),
(76, 14, 'TARDE', '2023-04-06 17:42:19', '2023-04-06 17:42:33', 1234),
(77, 22, 'TARDE', '2023-04-10 14:46:29', '0000-00-00 00:00:00', 1234),
(78, 21, 'TARDE', '2023-04-10 14:47:19', '2023-04-11 16:46:14', 2513),
(79, 14, 'NOITE', '2023-04-14 21:35:43', '2023-12-01 03:44:25', 8520),
(80, 17, 'NOITE', '2023-04-14 21:40:21', '2023-04-14 21:40:29', 8520),
(81, 17, 'MANHÃ', '2023-04-28 10:18:47', '2023-04-28 10:19:11', 1234),
(82, 15, 'MANHÃ', '2023-06-07 12:01:47', '2023-06-07 12:03:07', 1234),
(83, 17, 'MANHÃ', '2023-06-07 12:02:42', '0000-00-00 00:00:00', 8520),
(84, 15, 'MANHÃ', '2023-06-07 12:03:17', '2023-12-01 03:44:40', 2513),
(85, 20, 'MANHÃ', '2023-06-07 12:10:00', '2023-06-07 12:10:18', 2513),
(86, 20, 'MANHÃ', '2023-06-07 12:10:35', '0000-00-00 00:00:00', 2513),
(87, 23, 'MANHÃ', '2023-06-07 12:18:01', '0000-00-00 00:00:00', 2513),
(88, 21, 'NOITE', '2023-09-10 19:46:20', '0000-00-00 00:00:00', 1234),
(89, 14, 'NOITE', '2023-12-26 01:31:48', '2023-12-26 01:32:04', 1234),
(90, 14, 'MANHÃƒ', '2024-09-15 11:05:52', '2024-09-15 11:06:03', 1234),
(91, 14, 'MANHÃƒ', '2024-09-15 11:15:46', '0000-00-00 00:00:00', 1234);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sala`
--

CREATE TABLE `sala` (
  `idsala` int(11) NOT NULL,
  `sala` varchar(50) DEFAULT NULL,
  `nsala` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sala`
--

INSERT INTO `sala` (`idsala`, `sala`, `nsala`, `status`) VALUES
(14, 'Administraï¿½ï¿½o', 20, 'LOCADO'),
(15, 'Hadware 2', 30, 'LIVRE'),
(17, 'Hardware 1', 30, 'INATIVO'),
(18, 'Informatica 2', 30, 'INATIVO'),
(20, 'Laboratório de Estetica', 20, 'LOCADO'),
(21, 'Laboratório de Farmácia', 30, 'LOCADO'),
(22, 'Laboratório de Enfermagem', 30, 'LOCADO'),
(23, 'Recursos humanos', 40, 'LOCADO'),
(24, 'Informatica 1', 30, 'LIVRE'),
(25, 'Marketing', 30, 'INATIVO'),
(26, 'Processos Gerenciais', 40, 'LIVRE'),
(27, 'Logistica', 40, 'LIVRE'),
(28, 'Turismo', 30, 'INATIVO'),
(29, 'administração', 30, 'LIVRE'),
(30, 'casa', 10, 'INATIVO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(20) DEFAULT NULL,
  `nregistro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `email`, `senha`, `nregistro`) VALUES
(15, 'Ryan Kozinski', 'ryan@gmail.com', '1234', 2513),
(16, 'Nicolly Olviveira França', 'nick@gmail.com', 'nina', 20),
(17, 'Fabiano Albers', 'fabianoalbers@gmail.com', '12345', 696145),
(18, 'André Luiz Mattos', 'andremattos@hotmail.com', 'andrezao', 1472),
(19, 'André de Carvalho', 'andrecarvalho@hotmail.com', 'andrezinho', 3477),
(20, 'Joaquim ', 'joaquim@yahoo.com', 'quim123', 2712),
(21, 'coca col', 'marianeisabela@gmail.com', 'NANHANAH', 2712);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`idreserva`),
  ADD KEY `FK_reserva_sala` (`idsala`);

--
-- Índices para tabela `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`idsala`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nregistro` (`nregistro`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `reserva`
--
ALTER TABLE `reserva`
  MODIFY `idreserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de tabela `sala`
--
ALTER TABLE `sala`
  MODIFY `idsala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `FK_reserva_sala` FOREIGN KEY (`idsala`) REFERENCES `sala` (`idsala`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
