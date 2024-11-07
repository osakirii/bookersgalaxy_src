-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/11/2024 às 15:17
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
CREATE DATABASE IF NOT EXISTS `bookersgalaxy` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bookersgalaxy`;
-- --------------------------------------------------------

--
-- Estrutura para tabela `arquivos`
--

CREATE TABLE `arquivos` (
  `id` int(11) NOT NULL,
  `livro_id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `path` varchar(100) NOT NULL,
  `data_upload` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `arquivos`
--

INSERT INTO `arquivos` (`id`, `livro_id`, `nome`, `path`, `data_upload`) VALUES
(1, 0, 'logo.png', 'img/66f6e502d3ae7.png', '2024-09-27 14:01:54'),
(2, 0, 'book loading.gif', 'img/66f6f50f58268.gif', '2024-09-27 15:10:23'),
(3, 0, 'top1.png', 'img/66f6f6c4cfa05.png', '2024-09-27 15:17:40'),
(4, 0, 'top2.png', 'img/66f6fae0e6a37.png', '2024-09-27 15:35:12'),
(5, 0, 'top3.png', 'img/66f6fae9a4634.png', '2024-09-27 15:35:21'),
(6, 0, 'biblio.jpg', 'img/66f6fafdeb14b.jpg', '2024-09-27 15:35:41'),
(7, 0, 'panini.png', 'img/66f6fb0ca179e.png', '2024-09-27 15:35:56'),
(8, 0, 'seguinte.png', 'img/66f6fb15aff2d.png', '2024-09-27 15:36:05'),
(9, 0, 'todavia.png', 'img/66f6fb1f4efac.png', '2024-09-27 15:36:15'),
(10, 0, 'dracula.jpg', 'img/66f71717d8291.jpg', '2024-09-27 17:35:35'),
(11, 0, 'draculamini.jpg', 'img/66f7171b935d9.jpg', '2024-09-27 17:35:39'),
(12, 0, 'draculaowo.jpg', 'img/66f7172589c8d.jpg', '2024-09-27 17:35:49'),
(13, 0, 'draculainfo.jpg', 'img/66f7172cadb58.jpg', '2024-09-27 17:35:56'),
(14, 0, 'draculamao.jpg', 'img/66f717390b75e.jpg', '2024-09-27 17:36:09'),

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacoes`
--

CREATE TABLE `avaliacoes` (
  `id_avaliacao` int(11) NOT NULL,
  `nota` int(11) NOT NULL,
  `texto` int(11) NOT NULL,
  `data_comentario` int(11) NOT NULL,
  `data_modificacao` int(11) NOT NULL,
  `imagem1` int(11) NOT NULL,
  `imagem2` int(11) NOT NULL,
  `imagem3` int(11) NOT NULL,
  `imagem4` int(11) NOT NULL,
  `imagem5` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_livro` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `favoritos`
--

CREATE TABLE `favoritos` (
  `id_favorito` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_livro` int(11) NOT NULL,
  `data_adicao` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `livros`
--

CREATE TABLE `livros` (
  `ID_livro` int(11) NOT NULL,
  `Titulo` varchar(255) NOT NULL,
  `Autor` varchar(255) NOT NULL,
  `Data_lancamento` date DEFAULT current_timestamp(),
  `QntPaginas` int(11) NOT NULL,
  `Genero` varchar(100) NOT NULL,
  `Sinopse` text NOT NULL,
  `Preco` decimal(10,2) NOT NULL,
  `ISBN` varchar(17) DEFAULT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `livros`
--

INSERT INTO `livros` (`ID_livro`, `Titulo`, `Autor`, `Data_lancamento`, `QntPaginas`, `Genero`, `Sinopse`, `Preco`, `ISBN`, `id_categoria`) VALUES
(33, 'Sapiens (Nova edição): Uma breve história da humanidade', ' Yuval Noah Harari ', '2024-01-11', 472, ' História da Civilização e Cultura', 'O planeta Terra tem cerca de 4,5 bilhões de anos. Numa fração ínfima desse tempo, uma espécie entre incontáveis outras o dominou: nós, humanos. Somos os animais mais evoluídos e mais destrutivos que jamais viveram.\r\nSapiens é a obra-prima de Yuval Noah Harari e o consagrou como um dos pensadores mais brilhantes da atualidade. Num feito surpreendente, que já fez deste livro um clássico contemporâneo, o historiador israelense aplica uma fascinante narrativa histórica a todas as instâncias do percurso humano sobre a Terra.', 52.90, NULL, 0),
(34, 'É assim que acaba (Edição de colecionador): 1', ' Colleen Hoover ', '2024-05-21', 396, 'Romance Jovem', 'Lily nem sempre teve uma vida fácil, mas isso nunca a impediu de trabalhar arduamente para conquistar a vida tão sonhada. Ela percorreu um longo caminho desde a infância, em uma cidadezinha no Maine: se formou em marketing, se mudou para Boston e abriu a própria loja. Então, quando se sente atraída por um lindo neurocirurgião chamado Ryle Kincaid, tudo parece perfeito demais para ser verdade.\r\n\r\nRyle é confiante, obstinado, quem sabe até um pouco arrogante. Mas também é sensível, brilhante e se sente atraído por Lily. Porém, sua grande aversão a relacionamentos é perturbadora.', 82.10, NULL, 0),
(32, 'Saberes Eternos da Baba Yaga + Brinde Exclusivo', 'Taisia Kitaiskaia', '2024-11-12', 160, 'Não Ficção', 'Evocando as três faces da Lua — donzela, mãe e anciã — e ideal para ser compartilhado entre três gerações, Saberes Eternos da Baba Yaga aborda questões existenciais com uma leitura poética sobre a magia de viver. Nele, Baba Yaga, a icônica bruxa do folclore eslavo, oferece respostas sensatas e contundentes para as perguntas que pulsam no coração humano.\r\n\r\n\r\nInspirado pela estrutura dos antigos correios sentimentais, o livro reúne perguntas que exploram temas como relacionamentos, família, trabalho e saúde, todas respondidas pela enigmática bruxa Baba Yaga com franqueza sábia e, por vezes, mordaz. Suas respostas combinam conselhos práticos, humor afiado e a inesgotável magia das palavras, compartilhando com todas as gerações a essência de sua sabedoria ancestral.\r\n\r\n', 60.90, NULL, 0),
(46, 'É assim que começa (Edição de colecionador): 2 ', ' Colleen Hoover ', '2024-11-08', 372, 'Romance Jovem', 'Lily Bloom continua administrado uma floricultura. Seu ex-marido abusivo, Ryle Kincaid, ainda é um cirurgião. Mas agora os dois estão oficialmente divorciados e dividem a guarda da filha, Emerson.\r\n\r\nQuando Lily esbarra em Atlas ― com quem não fala há quase dois anos ―, é inegável que os dois podem retomar o relacionamento da adolescência, já que ele também está solteiro e parece corresponder seus sentimentos. Mas apesar de estar divorciada, Lily não está exatamente livre de Ryle. Culpando Atlas pelo fim de seu casamento, o ex-marido não está nada disposto a aceitar o novo relacionamento de Lily, principalmente no que diz respeito a Atlas, o último homem que aceitaria ver perto de sua filha e da ex-esposa.\r\n\r\nAlternando entre as perspectivas de Altas e Lily, É assim que começa segue o epílogo do fenômeno editorial É assim que acaba . Revelando mais sobre o passado de Atlas e acompanhando Lily abraçar uma segunda chance no amor enquanto lida com um ex-marido ciumento, É assim que começa prova que ninguém entrega uma leitura mais emocionante do que Colleen Hoover.\r\n\r\n \r\n\r\n“Em uma história permeada de tensão com lampejos de esperança, Hoover captura perfeitamente as dores de um coração partido e a felicidade de começar de novo.” ― Kirkus Review\r\n\r\n', 82.80, '978-65-5981-506-7', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_completo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `RG` varchar(255) NOT NULL,
  `is_adm` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `arquivos`
--
ALTER TABLE `arquivos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_livro_id` (`livro_id`);

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`id_favorito`),
  ADD KEY `fk_id_usuario` (`id_usuario`),
  ADD KEY `fk_id_livro` (`id_livro`);

--
-- Índices de tabela `imagens`
--
ALTER TABLE `imagens`
  ADD KEY `livro_id` (`livro_id`);

--
-- Índices de tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`ID_livro`),
  ADD UNIQUE KEY `ISBN` (`ISBN`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `arquivos`
--
ALTER TABLE `arquivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id_favorito` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `ID_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
