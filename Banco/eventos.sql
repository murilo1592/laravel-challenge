-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Fev-2020 às 20:50
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `eventos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE `eventos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `data_inicio` varchar(20) DEFAULT NULL,
  `data_termino` varchar(20) NOT NULL DEFAULT current_timestamp(),
  `hora_inicio` varchar(20) NOT NULL,
  `hora_termino` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `eventos`
--

INSERT INTO `eventos` (`id`, `titulo`, `descricao`, `data_inicio`, `data_termino`, `hora_inicio`, `hora_termino`) VALUES
(7, 'BrazilJS', 'Além da BrazilJS Conf e eventos parceiros, temos a nossa grade de eventos BrazilJS On The Road.', '02/03/2020', '02/03/2020', '12:30 AM', '06:00 PM'),
(8, 'International PHP Conference', 'Com mais de uma década de experiência, a International PHP Conference é o evento obrigatório para desenvolvedores da Web de todo o mundo. Participe de sessões inspiradoras, oficinas aprofundadas exclusivas e se beneficie das informações valiosas de nossos', '02/17/2020', '02/17/2020', '12:30 AM', '12:30 AM'),
(19, 'Startup Commerce', 'Evento teste', '02/19/2020', '02/19/2020', '12:30 AM', '05:30 PM'),
(20, 'Semana da Tecnologia - Manhã', 'Semana de tecnologia Fatec Garça', '05/04/2020', '05/04/2020', '07:00 AM', '11:30 PM'),
(21, 'Apresentação de Trabalhos de Conclusão', 'Apresentação de trabalhos de conclusão de cursos da Fatec Garça 2020.', '02/10/2020', '02/10/2020', '07:00 PM', '10:30 PM'),
(22, 'Feira de Empreendedorismo', '8° Feira de Empreendedorismo da Fatec Garça.', '02/17/2020', '02/17/2020', '08:00 AM', '12:00 PM');

-- --------------------------------------------------------

--
-- Estrutura da tabela `recuperar_senha`
--

CREATE TABLE `recuperar_senha` (
  `usuario_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `data_liberacao` date NOT NULL,
  `data_expiracao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Diego', 'diego@gmail.com', 'd0fec90950a487f755eb51c5d141597f'),
(2, 'Murilo', 'murilomha92@live.com', 'd7efbc6837e9685056ac895654628dc1'),
(3, 'letícia', 'let@gmail.com', 'de302631139880d729b4efe379924ee4'),
(4, 'teste', 'teste@live.com', '698dc19d489c4e4db73e28a713eab07b'),
(5, 'bruno', 'bruno_r2@gmail.com', '202cb962ac59075b964b07152d234b70'),
(6, 'robsom', 'rob_12@gmail.com', '4366dcec49f6b87c1b88da8355649851');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
