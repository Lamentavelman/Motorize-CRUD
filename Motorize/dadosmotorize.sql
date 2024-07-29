-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29/07/2024 às 00:08
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdmotorize`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `catalogomotorize`
--

CREATE TABLE `catalogomotorize` (
  `id` int(11) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `ano` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `kmrodado` int(11) NOT NULL,
  `img` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `catalogomotorize`
--

INSERT INTO `catalogomotorize` (`id`, `marca`, `modelo`, `ano`, `valor`, `kmrodado`, `img`) VALUES
(1, 'Honda', 'CG 160 Titan', 2014, 14000, 900, 'cg160.jpg'),
(14, 'Yamaha', 'Yamaha YZF R3', 2019, 57000, 20000, 'Yamaha YZF R3.jpg'),
(15, 'Kawasaki', 'Kawasaki Ninja 400', 2020, 54000, 12000, 'Kawasaki Ninja 400.png'),
(16, 'BMW', 'BMW S1000 RR', 2017, 67000, 11200, 'BMW S1000 RR.png'),
(17, 'Honda', 'Honda CBR 650R', 2012, 27000, 115000, 'Honda CBR 650R.png'),
(18, 'Kawasaki', 'Kawasaki Ninja ZX 6', 2018, 71000, 300, 'Kawasaki Ninja ZX 6.jpg'),
(19, 'Ducati', 'Ducati Panigale V4', 2017, 89000, 37000, 'Ducati Panigale V4.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `catalogomotorize`
--
ALTER TABLE `catalogomotorize`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `catalogomotorize`
--
ALTER TABLE `catalogomotorize`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
