-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09/11/2024 às 02:26
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
  `data_upload` datetime NOT NULL,
  `is_capa` tinyint(1) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `arquivos`
--

INSERT INTO `arquivos` (`id`, `livro_id`, `nome`, `path`, `data_upload`, `is_capa`) VALUES
(108, 56, 'stranger_thing_capa.jpg', 'img/672eac3865c2f.jpg', '2024-11-08 21:26:32', 1),
(109, 56, 'stranger_thing_capadeitada.jpg', 'img/672eac386604d.jpg', '2024-11-08 21:26:32', 0),
(110, 56, 'stranger_thing_contracapa.jpg', 'img/672eac38664af.jpg', '2024-11-08 21:26:32', 0),
(107, 56, 'stranger_thing_aberto2.jpg', 'img/672eac38658b6.jpg', '2024-11-08 21:26:32', 0),
(106, 56, 'stranger_thing_aberto.jpg', 'img/672eac386552e.jpg', '2024-11-08 21:26:32', 0),
(105, 55, 'stranger_thing_contracapa.jpg', 'img/672e1242cef6e.jpg', '2024-11-08 10:29:38', 0),
(104, 55, 'stranger_thing_capadeitada.jpg', 'img/672e1242ced05.jpg', '2024-11-08 10:29:38', 0),
(103, 55, 'stranger_thing_capa.jpg', 'img/672e1242ce9bb.jpg', '2024-11-08 10:29:38', 1),
(102, 55, 'stranger_thing_aberto2.jpg', 'img/672e1242ce6a9.jpg', '2024-11-08 10:29:38', 0),
(101, 55, 'stranger_thing_aberto.jpg', 'img/672e1242ce3b8.jpg', '2024-11-08 10:29:38', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `arquivossite`
--

CREATE TABLE `arquivossite` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `path` varchar(255) NOT NULL,
  `data_upload` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `arquivossite`
--

INSERT INTO `arquivossite` (`id`, `nome`, `path`, `data_upload`) VALUES
(1, '66f6e502d3ae7.png', 'img/672eb8e5e9338.png', '2024-11-09 01:20:37'),
(2, '66f6f50f58268.gif', 'img/672eb90b8c6b8.gif', '2024-11-09 01:21:15');


-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacoes`
--

CREATE TABLE `avaliacoes` (
  `id_avaliacao` int(11) NOT NULL,
  `nota` int(11) NOT NULL,
  `texto` text NOT NULL,
  `data_comentario` date NOT NULL,
  `data_modificacao` date NOT NULL,
  `imagem1` varchar(255) NOT NULL,
  `imagem2` varchar(255) NOT NULL,
  `imagem3` varchar(255) NOT NULL,
  `imagem4` varchar(255) NOT NULL,
  `imagem5` varchar(255) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_livro` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `Descricao` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Estrutura para tabela `genero`
--

CREATE TABLE `genero` (
  `id_categoria` int(11) NOT NULL,
  `Genero` varchar(100) NOT NULL,
  `Descricao` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `genero`
--

INSERT INTO `genero` (`id_categoria`, `Genero`, `Descricao`) VALUES
(1, 'Ficção Científica', 'Livros que exploram temas futuristas, avanços tecnológicos e fenômenos científicos.'),
(2, 'Fantasia', 'Livros que incluem elementos mágicos e mundos imaginários, frequentemente com criaturas fantásticas.'),
(3, 'Mistério', 'Livros focados em resolver enigmas, crimes ou situações misteriosas.'),
(4, 'Romance', 'Livros que se concentram em histórias de amor ou relações afetivas.'),
(5, 'Terror', 'Livros que têm o objetivo de assustar e provocar medo no leitor.'),
(6, 'Aventura', 'Livros que envolvem jornadas emocionantes e desafios para os personagens principais.'),
(7, 'Histórico', 'Livros que se baseiam em eventos reais do passado, geralmente retratando figuras históricas ou momentos significativos.'),
(8, 'Biografia', 'Livros que contam a vida de uma pessoa, geralmente figuras públicas ou de relevância histórica.'),
(9, 'Autoajuda', 'Livros com o objetivo de oferecer orientações para melhorar aspectos da vida pessoal ou profissional.'),
(10, 'Poesia', 'Livros que coletam poesias e outros tipos de escrita literária focada no uso de versos e emoções intensas.'),
(11, 'Ficção', 'Gênero literário que envolve a criação de histórias imaginárias, onde os acontecimentos, personagens e cenários não são baseados em fatos reais. A ficção pode abranger diversos subgêneros, como aventura, romance, mistério, entre outros, e permite a exploração da criatividade e imaginação do autor.');

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
  `Sinopse` text NOT NULL,
  `Preco` decimal(10,2) NOT NULL,
  `ISBN` varchar(17) DEFAULT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `livros`
--

INSERT INTO `livros` (`ID_livro`, `Titulo`, `Autor`, `Data_lancamento`, `QntPaginas`, `Sinopse`, `Preco`, `ISBN`, `id_categoria`) VALUES
(55, 'Stranger things: cidade nas trevas: Volume 2 ', 'Adam Christopher', '2024-06-05', 384, 'A terceira temporada de Stranger Things causou grande comoção, e o último episódio deixou os fãs perplexos e ansiosos por respostas. As pistas estão lançadas em Cidade nas trevas, segundo livro oficial da série, que explora o passado de um dos personagens mais queridos do público: o chefe de polícia Jim Hopper.\r\n\r\nEm Hawkins, durante o Natal de 1984, ele mal consegue conter a alegria. É sua primeira comemoração familiar com Eleven, sua chance de aproveitar momentos de tranquilidade com a filha adotiva. Mas a menina tem outros planos. Contra a vontade de Hopper, ela vasculha uma caixa em que está escrito “Nova York”. É aí que começam as perguntas. Por que Hopper foi embora de Hawkins anos atrás? Por que nunca contou sobre Nova York? O que ele está escondendo?\r\n\r\nEmbora prefira enfrentar uma horda de demogorgons a mergulhar em seu passado, Hopper sabe que não pode mais esconder a verdade. Por isso, ele conta a Eleven os detalhes de um dos casos mais avassaladores de sua carreira, o último antes de tudo mudar...\r\n\r\nEm 1977, após retornar da Guerra do Vietnã, ele se muda com a esposa e a filha para Nova York e passa a atuar na divisão de homicídios. A cada dia, se depara com inúmeras tragédias, mas nenhuma se compara a uma série de assassinatos brutais e incompreensíveis. Quando agentes federais assumem o caso, Hopper e sua irreverente parceira, Rosario Delgado, decidem agir por conta própria, e logo o detetive se vê infiltrado entre as perigosas gangues da cidade. No momento em que está prestes a desvendar quem ― ou o quê ― está por trás dos assassinatos, um apagão lança a cidade nas trevas, e Hopper fica frente a frente com uma escuridão que mudará sua vida para sempre.', 24.99, '978-85-5100-629-0', 1),
(56, 'Stranger things: cidade nas trevas: Volume 2 ', 'Adam Christopher', '2024-06-05', 384, 'A terceira temporada de Stranger Things causou grande comoção, e o último episódio deixou os fãs perplexos e ansiosos por respostas. As pistas estão lançadas em Cidade nas trevas, segundo livro oficial da série, que explora o passado de um dos personagens mais queridos do público: o chefe de polícia Jim Hopper.\r\n\r\nEm Hawkins, durante o Natal de 1984, ele mal consegue conter a alegria. É sua primeira comemoração familiar com Eleven, sua chance de aproveitar momentos de tranquilidade com a filha adotiva. Mas a menina tem outros planos. Contra a vontade de Hopper, ela vasculha uma caixa em que está escrito “Nova York”. É aí que começam as perguntas. Por que Hopper foi embora de Hawkins anos atrás? Por que nunca contou sobre Nova York? O que ele está escondendo?\r\n\r\nEmbora prefira enfrentar uma horda de demogorgons a mergulhar em seu passado, Hopper sabe que não pode mais esconder a verdade. Por isso, ele conta a Eleven os detalhes de um dos casos mais avassaladores de sua carreira, o último antes de tudo mudar...\r\n\r\nEm 1977, após retornar da Guerra do Vietnã, ele se muda com a esposa e a filha para Nova York e passa a atuar na divisão de homicídios. A cada dia, se depara com inúmeras tragédias, mas nenhuma se compara a uma série de assassinatos brutais e incompreensíveis. Quando agentes federais assumem o caso, Hopper e sua irreverente parceira, Rosario Delgado, decidem agir por conta própria, e logo o detetive se vê infiltrado entre as perigosas gangues da cidade. No momento em que está prestes a desvendar quem ― ou o quê ― está por trás dos assassinatos, um apagão lança a cidade nas trevas, e Hopper fica frente a frente com uma escuridão que mudará sua vida para sempre.', 24.99, '978-85-5100-629-0', 1);

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
-- Índices de tabela `arquivossite`
--
ALTER TABLE `arquivossite`
  ADD PRIMARY KEY (`id`);

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
-- Índices de tabela `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices de tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`ID_livro`),
  ADD KEY `fk_categoria` (`id_categoria`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `arquivos`
--
ALTER TABLE `arquivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT de tabela `arquivossite`
--
ALTER TABLE `arquivossite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `genero`
--
ALTER TABLE `genero`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `ID_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
