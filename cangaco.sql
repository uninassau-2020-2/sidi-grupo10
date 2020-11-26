-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26-Nov-2020 às 17:11
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cangaco`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `cpf` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `celular` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cep` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `bairro` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `cpf`, `nome`, `email`, `celular`, `endereco`, `cep`, `bairro`, `cidade`, `estado`, `data`) VALUES
(2, '817.594.610-50', 'Pedro Pedreira', 'pedrolira@gmail.com', '91234-4311', 'Rua Ibiraçu, 9', '29154-485', 'Tabajara', 'Cariacica', 'Espirito Santo', '2020-11-12 06:37:20'),
(4, '836.769.180-61', 'Wuowa', 'wuowa@gmail.com', '97777-0000', 'Rua Florianópolis, 33', '76870-322', 'Setor 03', 'Ariquemes', 'Roraima', '2020-11-12 06:56:29'),
(5, '058.209.584-03', 'Catarina', 'cataliramaria@gmail.com', '81 98877-9090', 'Rua Rio Tefé', '68905-510', 'Perpétuo Socorro', 'Macapá', 'AP', '2020-11-19 20:14:49');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL,
  `Cnpj_Cpf` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Empresa` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Contato` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `TipoContato` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `numContato` varchar(13) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Endereco` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Cep` varchar(9) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Bairro` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Cidade` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Estado` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`status`, `id`, `Cnpj_Cpf`, `Empresa`, `Contato`, `TipoContato`, `numContato`, `Email`, `Endereco`, `Cep`, `Bairro`, `Cidade`, `Estado`, `data`) VALUES
(0, 2, '14.689.243/0001-92', 'QQueijo', 'Karla Maria', 'Empresarial', '95555-2222', 'karlamariasilva@hotmail.com', 'Rua Jociara Telino, 566', '58053-200', 'Jardim São Severino', 'João Pessoa', 'Paraíba-PB', '2020-11-26 05:54:58'),
(1, 5, '971.673.870-61', 'Augusto Ferreira', 'Sr Augusto Ferreira', 'pessoal', '95555-1111', 'augustoferreira@gmail.com', '2ª Travessa Lourival Alves, 90', '40353-517', '2ª Travessa Lourival Alves', 'Salvador', 'Bahia', '2020-11-26 05:54:58');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `referencia` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `volume` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fornecedor` int(255) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `referencia`, `descricao`, `preco`, `volume`, `fornecedor`, `data`) VALUES
(10, 'QJC1KG', 'Queijo Coalho Queijo Bom 1Kg', '25.70', 'BAR', 10001, '2020-11-06 04:40:05'),
(15, 'CCEP700ML', 'Cachaça Cabaré Extra Premium 700ml', '350.00', 'GAR', 10009, '2020-11-12 06:01:31'),
(17, 'ML1L', 'Mel de Engenho 1Litro', '55.60', 'GAR', 10008, '2020-11-26 20:05:57');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `id` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nivelDeAcesso` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`status`, `id`, `nome`, `senha`, `email`, `nivelDeAcesso`, `data`) VALUES
(0, 1002, 'Mario Oliveira', '202cb962ac59075b964b07152d234b70', '', '2', '2020-11-12 19:25:39'),
(1, 1006, 'Camila', '202cb962ac59075b964b07152d234b70', 'camila@gmail.com', '2', '2020-11-16 04:00:47'),
(0, 1007, 'Catarina Maria Lira', '202cb962ac59075b964b07152d234b70', 'catarina.ml@outlook.com', '1', '2020-11-16 04:02:01'),
(1, 1008, 'Maria Valdenice', 'd9b1d7db4cd6e70935368a1efb10e377', 'maria@outlook.com', '1', '2020-11-26 06:45:21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedor`
--

CREATE TABLE `vendedor` (
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL,
  `cpf` varchar(14) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vendedor`
--

INSERT INTO `vendedor` (`status`, `id`, `cpf`, `nome`, `email`, `data`) VALUES
(0, 1, '262.447.990-20', 'Paulo Ricardo Cabral', 'paulo.rc@gmail.com', '2020-11-26 05:33:14'),
(0, 2, '675.728.230-50', 'Diogo Alves Oliveira', 'diogo.dao@gmail.com', '2020-11-26 05:59:06'),
(0, 6, '796.591.120-50', 'Alexandre Marcos dos Anjos', 'alex.ama@gmail.com', '2020-11-26 05:32:15'),
(0, 9, '058.309.584-06', 'Fernando Fernandes Lira', 'fernando.ffl@outlook.com', '2020-11-26 06:02:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1009;

--
-- AUTO_INCREMENT for table `vendedor`
--
ALTER TABLE `vendedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
