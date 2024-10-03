-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29/09/2024 às 19:35
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
-- Banco de dados: `bookersgalaxy`
--

CREATE DATABASE `bookersgalaxy`;
USE `bookersgalaxy`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `arquivos`
--

CREATE TABLE `arquivos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `path` varchar(100) NOT NULL,
  `data_upload` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `arquivos`
--

INSERT INTO `arquivos` (`id`, `nome`, `path`, `data_upload`) VALUES
(1, 'logo.png', 'img/66f6e502d3ae7.png', '2024-09-27 14:01:54'),
(2, 'book loading.gif', 'img/66f6f50f58268.gif', '2024-09-27 15:10:23'),
(3, 'top1.png', 'img/66f6f6c4cfa05.png', '2024-09-27 15:17:40'),
(4, 'top2.png', 'img/66f6fae0e6a37.png', '2024-09-27 15:35:12'),
(5, 'top3.png', 'img/66f6fae9a4634.png', '2024-09-27 15:35:21'),
(6, 'biblio.jpg', 'img/66f6fafdeb14b.jpg', '2024-09-27 15:35:41'),
(7, 'panini.png', 'img/66f6fb0ca179e.png', '2024-09-27 15:35:56'),
(8, 'seguinte.png', 'img/66f6fb15aff2d.png', '2024-09-27 15:36:05'),
(9, 'todavia.png', 'img/66f6fb1f4efac.png', '2024-09-27 15:36:15'),
(10, 'dracula.jpg', 'img/66f71717d8291.jpg', '2024-09-27 17:35:35'),
(11, 'draculamini.jpg', 'img/66f7171b935d9.jpg', '2024-09-27 17:35:39'),
(12, 'draculaowo.jpg', 'img/66f7172589c8d.jpg', '2024-09-27 17:35:49'),
(13, 'draculainfo.jpg', 'img/66f7172cadb58.jpg', '2024-09-27 17:35:56'),
(14, 'draculamao.jpg', 'img/66f717390b75e.jpg', '2024-09-27 17:36:09');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `arquivos`
--
ALTER TABLE `arquivos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `arquivos`
--
ALTER TABLE `arquivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
