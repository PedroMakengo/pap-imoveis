-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Maio-2022 às 01:34
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `papimoveis`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `foto` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nome`, `senha`, `email`, `foto`) VALUES
(1, 'Reis 2020', 'd9b1d7db4cd6e70935368a1efb10e377', 'reis2022@gmail.com', 'Captura de Tela (144).png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_arrendador`
--

CREATE TABLE `tb_arrendador` (
  `id_arrendador` int(11) NOT NULL,
  `nome_arrendador` varchar(50) DEFAULT NULL,
  `email_arrendador` varchar(50) DEFAULT NULL,
  `senha_arrendador` varchar(50) DEFAULT NULL,
  `foto_arrendador` varchar(500) DEFAULT NULL,
  `estado_arrendador` int(2) DEFAULT NULL,
  `bi_arrendador` varchar(20) DEFAULT NULL,
  `idade_arrendador` int(2) DEFAULT NULL,
  `genero_arrendador` varchar(50) DEFAULT NULL,
  `tel_arrendador` int(9) DEFAULT NULL,
  `morada_arrendador` varchar(50) DEFAULT NULL,
  `data_registro_arrendador` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_arrendador`
--

INSERT INTO `tb_arrendador` (`id_arrendador`, `nome_arrendador`, `email_arrendador`, `senha_arrendador`, `foto_arrendador`, `estado_arrendador`, `bi_arrendador`, `idade_arrendador`, `genero_arrendador`, `tel_arrendador`, `morada_arrendador`, `data_registro_arrendador`) VALUES
(1, 'Emílio José', 'emiliojose@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', '4.jpg', 0, '0000', 19, 'M', 222, 'Luanda - Cazenga', '2022-05-03 04:01:26'),
(2, 'Manuel Gomes', 'manuelgomes@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'AirPods-3-Feature-Red.jpg', 0, '0', 23, 'M', 999333444, 'Luanda - Viana', '2022-05-03 18:26:27'),
(3, 'Graciete dos Santos', 'gracietedossantos@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'fotoDefault.jpeg', 0, '0', 0, 'F', 999333444, '', '2022-05-03 20:21:11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_compra_renda`
--

CREATE TABLE `tb_compra_renda` (
  `id_compra_renda` int(11) NOT NULL,
  `id_imovel` int(11) DEFAULT NULL,
  `id_arrendador` int(11) DEFAULT NULL,
  `tipo_compra_renda` varchar(20) DEFAULT NULL,
  `estado_compra_renda` int(2) DEFAULT NULL,
  `data_registro_compra` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_compra_renda`
--

INSERT INTO `tb_compra_renda` (`id_compra_renda`, `id_imovel`, `id_arrendador`, `tipo_compra_renda`, `estado_compra_renda`, `data_registro_compra`) VALUES
(6, 5, 1, 'arrenda', 1, '2022-05-03 16:35:37'),
(7, 4, 1, 'arrenda', 1, '2022-05-03 16:43:41'),
(8, 2, 1, 'venda', 1, '2022-05-03 17:03:33'),
(9, 6, 2, 'arrenda', 1, '2022-05-03 18:27:26'),
(10, 3, 2, 'venda', 0, '2022-05-03 19:55:35'),
(11, 1, 2, 'venda', 1, '2022-05-03 20:18:47');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_feedback`
--

CREATE TABLE `tb_feedback` (
  `id_feedback` int(11) NOT NULL,
  `nome_feedback` varchar(50) DEFAULT NULL,
  `contacto_feedback` int(9) DEFAULT NULL,
  `descricao_feedback` text DEFAULT NULL,
  `estado_feedback` int(2) DEFAULT NULL,
  `data_registro_feedback` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_feedback`
--

INSERT INTO `tb_feedback` (`id_feedback`, `nome_feedback`, `contacto_feedback`, `descricao_feedback`, `estado_feedback`, `data_registro_feedback`) VALUES
(1, 'Emílio José', 2147483647, 'Test', 0, '2022-01-03 06:01:01'),
(2, 'Emílio José', 222, 'Testa', 0, '2022-02-03 11:10:48'),
(3, 'João José', 99999, 'Testando tudo', 0, '2022-03-03 11:13:25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_imovel`
--

CREATE TABLE `tb_imovel` (
  `id_imovel` int(11) NOT NULL,
  `id_rendeiro` int(11) DEFAULT NULL,
  `acao_imovel` varchar(20) DEFAULT NULL,
  `tipo_imovel` varchar(50) DEFAULT NULL,
  `preco_imovel` varchar(40) DEFAULT NULL,
  `foto_primario` varchar(500) DEFAULT NULL,
  `foto_secundario` varchar(500) DEFAULT NULL,
  `contacto_imovel` int(9) DEFAULT NULL,
  `descricao_imovel` text DEFAULT NULL,
  `estado_imovel` int(1) DEFAULT NULL,
  `data_registro_imovel` datetime DEFAULT NULL,
  `local_imovel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_imovel`
--

INSERT INTO `tb_imovel` (`id_imovel`, `id_rendeiro`, `acao_imovel`, `tipo_imovel`, `preco_imovel`, `foto_primario`, `foto_secundario`, `contacto_imovel`, `descricao_imovel`, `estado_imovel`, `data_registro_imovel`, `local_imovel`) VALUES
(1, 1, 'venda', 'Casa', '90.000 ', '1246280_16061017110043391702.jpg', 'hotel-r-de-paris.jpg', 9210000, 'Test', 1, '2022-05-03 11:51:54', 'Viana - Luanda'),
(2, 1, 'venda', 'Casa', '60,000', '6a3679ee62aa9ca91adea9f508788447.webp', '1246280_16061017110043391702.jpg', 9210000, 'Testando', 1, '2022-05-03 12:01:44', ''),
(3, 1, 'venda', 'Casa', '100,000', 'hotel-r-de-paris.jpg', 'bgLogin.jpg', 922111333, 'Estamos aqui testando o funcionamento do registro de imóveis', 0, '2022-05-03 12:22:25', ''),
(4, 1, 'arrenda', 'Casa', '15,000', 'fotoDefault.jpeg', 'hotel-r-de-paris.jpg', 9210000, 'Testando o processo de funcionamento.', 1, '2022-05-03 13:46:59', 'Viana - Luanda'),
(5, 1, 'arrenda', 'Casa', '60,000', 'hotel-r-de-paris.jpg', '1246280_16061017110043391702.jpg', 9210000, 'Testando o processo de funcionamento.', 1, '2022-05-03 15:29:01', ''),
(6, 1, 'arrenda', 'Casa', '16,000', 'bgLogin.jpg', 'hotel-r-de-paris.jpg', 9210000, 'É um compartimento adequado para diferentes pessoas e combina muito bem com crianças', 1, '2022-05-03 17:07:22', 'Luanda - Cazenga'),
(7, 4, 'arrenda', 'Casa', '15,000', 'hotel-r-de-paris.jpg', '1246280_16061017110043391702.jpg', 9210000, 'Estamos alugando está casa no valor de 15.000kz tal como referenciado no preçário , para mais informações ligue.', 0, '2022-05-03 20:32:09', 'Luanda');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_rendeiro`
--

CREATE TABLE `tb_rendeiro` (
  `id_rendeiro` int(11) NOT NULL,
  `nome_rendeiro` varchar(50) DEFAULT NULL,
  `email_rendeiro` varchar(50) DEFAULT NULL,
  `senha_rendeiro` varchar(50) DEFAULT NULL,
  `foto_rendeiro` varchar(500) DEFAULT NULL,
  `bi_rendeiro` varchar(20) DEFAULT NULL,
  `idade_rendeiro` int(2) DEFAULT NULL,
  `genero_rendeiro` varchar(50) DEFAULT NULL,
  `tel_rendeiro` int(9) DEFAULT NULL,
  `morada_rendeiro` varchar(50) DEFAULT NULL,
  `estado_rendeiro` int(2) DEFAULT NULL,
  `data_registro_rendeiro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_rendeiro`
--

INSERT INTO `tb_rendeiro` (`id_rendeiro`, `nome_rendeiro`, `email_rendeiro`, `senha_rendeiro`, `foto_rendeiro`, `bi_rendeiro`, `idade_rendeiro`, `genero_rendeiro`, `tel_rendeiro`, `morada_rendeiro`, `estado_rendeiro`, `data_registro_rendeiro`) VALUES
(1, 'João José', 'joaojose@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', '854fa3ad281e96b487bb8eaa4852ebf9.jpg', '000', 19, 'M', 99999, 'Luanda-Viana', 0, '2022-05-03 06:52:22'),
(2, 'Victor Miguel ', 'victormiguel@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'avatar-01.jpg', '0', 0, 'M', 999333444, '', 0, '2022-05-03 18:40:06'),
(3, 'Professora Fernanda', 'pr.fernanda@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'fotoDefault.jpeg', '0', 0, 'F', 999333444, '', 0, '2022-05-03 20:20:32'),
(4, 'Valeriano Messele', 'valerianomessele@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'fotoDefault.jpeg', '0', 0, 'M', 999333444, '', 0, '2022-05-03 20:21:43');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Índices para tabela `tb_arrendador`
--
ALTER TABLE `tb_arrendador`
  ADD PRIMARY KEY (`id_arrendador`);

--
-- Índices para tabela `tb_compra_renda`
--
ALTER TABLE `tb_compra_renda`
  ADD PRIMARY KEY (`id_compra_renda`),
  ADD KEY `id_imovel` (`id_imovel`),
  ADD KEY `id_arrendador` (`id_arrendador`);

--
-- Índices para tabela `tb_feedback`
--
ALTER TABLE `tb_feedback`
  ADD PRIMARY KEY (`id_feedback`);

--
-- Índices para tabela `tb_imovel`
--
ALTER TABLE `tb_imovel`
  ADD PRIMARY KEY (`id_imovel`),
  ADD KEY `id_rendeiro` (`id_rendeiro`);

--
-- Índices para tabela `tb_rendeiro`
--
ALTER TABLE `tb_rendeiro`
  ADD PRIMARY KEY (`id_rendeiro`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_arrendador`
--
ALTER TABLE `tb_arrendador`
  MODIFY `id_arrendador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_compra_renda`
--
ALTER TABLE `tb_compra_renda`
  MODIFY `id_compra_renda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `tb_feedback`
--
ALTER TABLE `tb_feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_imovel`
--
ALTER TABLE `tb_imovel`
  MODIFY `id_imovel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tb_rendeiro`
--
ALTER TABLE `tb_rendeiro`
  MODIFY `id_rendeiro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_compra_renda`
--
ALTER TABLE `tb_compra_renda`
  ADD CONSTRAINT `tb_compra_renda_ibfk_1` FOREIGN KEY (`id_imovel`) REFERENCES `tb_imovel` (`id_imovel`),
  ADD CONSTRAINT `tb_compra_renda_ibfk_2` FOREIGN KEY (`id_arrendador`) REFERENCES `tb_arrendador` (`id_arrendador`);

--
-- Limitadores para a tabela `tb_imovel`
--
ALTER TABLE `tb_imovel`
  ADD CONSTRAINT `tb_imovel_ibfk_1` FOREIGN KEY (`id_rendeiro`) REFERENCES `tb_rendeiro` (`id_rendeiro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
