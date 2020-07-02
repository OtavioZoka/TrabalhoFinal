-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Jul-2020 às 23:02
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `event`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE `evento` (
  `id` int(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `decricao` varchar(255) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_final` date NOT NULL,
  `hora_inicio` time(6) NOT NULL,
  `hora_final` time(6) NOT NULL,
  `vagas` int(255) NOT NULL,
  `endereco` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`id`, `nome`, `decricao`, `data_inicio`, `data_final`, `hora_inicio`, `hora_final`, `vagas`, `endereco`) VALUES
(11, 'Axe Brasil', 'teste', '2020-07-04', '2020-07-04', '16:26:00.000000', '17:27:00.000000', 200, 'avenida otavilio negrao de lima'),
(12, 'Axe Brasil', 'teste', '2020-07-04', '2020-07-04', '16:26:00.000000', '17:27:00.000000', 200, 'avenida otavilio negrao de lima'),
(13, 'Planeta Brasil', 'Evento planeta', '2020-07-23', '2020-07-25', '23:00:00.000000', '19:00:00.000000', 250, 'avenida otavilio negrao de lima, 99');

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento_usuario`
--

CREATE TABLE `evento_usuario` (
  `id_evento` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `evento_usuario`
--

INSERT INTO `evento_usuario` (`id_evento`, `id_usuario`) VALUES
(1, 2),
(1, 2),
(1, 2),
(1, 2),
(1211, 742),
(1211, 742),
(1211, 742);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `telefone` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `data_nascimento` date NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `telefone`, `email`, `data_nascimento`, `senha`) VALUES
(5, 'otavio reis viana', 9965236, 'otavioreisv@gmail.com', '1992-06-27', '123456'),
(6, 'Thomas', 32635223, 'thomas@test.com.br', '2002-03-04', '123456');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `evento`
--
ALTER TABLE `evento`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
