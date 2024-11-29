-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29/11/2024 às 15:32
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
  `livro_id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `path` varchar(100) NOT NULL,
  `data_upload` datetime NOT NULL,
  `is_capa` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `arquivos`
--

INSERT INTO `arquivos` (`id`, `livro_id`, `nome`, `path`, `data_upload`, `is_capa`) VALUES
(127, 63, 'dracula_capa.jpg', 'img/672fe04805677.jpg', '2024-11-09 19:20:56', 1),
(128, 63, 'dracula_capa_aberta.jpg', 'img/672fe04805e32.jpg', '2024-11-09 19:20:56', 0),
(129, 63, 'dracula_capa_aberta_detalhes.jpg', 'img/672fe04806885.jpg', '2024-11-09 19:20:56', 0),
(130, 63, 'dracula_capa_aberta2.jpg', 'img/672fe04806f35.jpg', '2024-11-09 19:20:56', 0),
(131, 63, 'dracula_capa_diagonal.jpg', 'img/672fe048075a6.jpg', '2024-11-09 19:20:56', 0),
(132, 63, 'dracula_capa_mao.jpg', 'img/672fe04818f37.jpg', '2024-11-09 19:20:56', 0),
(133, 64, 'assim_capa.jpg', 'img/672ff3e14c67f.jpg', '2024-11-09 20:44:33', 1),
(134, 64, 'assim_que_acaba_contra_aberto.jpg', 'img/672ff3e14cf12.jpg', '2024-11-09 20:44:33', 0),
(135, 64, 'assim_que_acaba_contra_aberto2.jpg', 'img/672ff3e14d74c.jpg', '2024-11-09 20:44:33', 0),
(136, 64, 'assim_que_acaba_contra_capa.jpg', 'img/672ff3e14e078.jpg', '2024-11-09 20:44:33', 0),
(137, 64, 'assim_que_acaba_contra_diagonal.jpg', 'img/672ff3e14e7fc.jpg', '2024-11-09 20:44:33', 0),
(138, 64, 'assim_que_acaba_contra_diagonal2.jpg', 'img/672ff3e14ef6c.jpg', '2024-11-09 20:44:33', 0),
(139, 65, 'assim_capa2.jpg', 'img/672ff462bb0e8.jpg', '2024-11-09 20:46:42', 1),
(140, 65, 'assim_que_acaba_contra_capa2.jpg', 'img/672ff462ccbe1.jpg', '2024-11-09 20:46:42', 0),
(141, 65, 'assim_que_acaba_contra_diagonal3.jpg', 'img/672ff462cd64a.jpg', '2024-11-09 20:46:42', 0),
(142, 65, 'assim_que_acaba_contra_diagonal4.jpg', 'img/672ff462cde13.jpg', '2024-11-09 20:46:42', 0),
(143, 65, 'assim_que_acaba_contra_diagonal5.jpg', 'img/672ff462ce673.jpg', '2024-11-09 20:46:42', 0),
(144, 66, 'assim_capa2.jpg', 'img/672ff4e835dc4.jpg', '2024-11-09 20:48:56', 1),
(145, 66, 'assim_que_acaba_contra_capa2.jpg', 'img/672ff4e8364bd.jpg', '2024-11-09 20:48:56', 0),
(146, 66, 'assim_que_acaba_contra_diagonal3.jpg', 'img/672ff4e836ca7.jpg', '2024-11-09 20:48:56', 0),
(147, 66, 'assim_que_acaba_contra_diagonal4.jpg', 'img/672ff4e837739.jpg', '2024-11-09 20:48:56', 0),
(148, 66, 'assim_que_acaba_contra_diagonal5.jpg', 'img/672ff4e837e1b.jpg', '2024-11-09 20:48:56', 0),
(149, 67, 'sapiens_capa.jpg', 'img/672ff54440559.jpg', '2024-11-09 20:50:28', 1),
(150, 67, 'sapiens_capa_diagonal.jpg', 'img/672ff54440e58.jpg', '2024-11-09 20:50:28', 0),
(151, 67, 'sapiens_contra_capa.jpg', 'img/672ff54441598.jpg', '2024-11-09 20:50:28', 0),
(152, 68, 'saboroso_aberto.jpg', 'img/673027050d2cf.jpg', '2024-11-10 00:22:45', 0),
(153, 68, 'saboroso_aberto2.jpg', 'img/673027050d929.jpg', '2024-11-10 00:22:45', 0),
(154, 68, 'saboroso_aberto3.jpg', 'img/673027050ded4.jpg', '2024-11-10 00:22:45', 0),
(155, 68, 'saboroso_aberto4.jpg', 'img/673027050e4fb.jpg', '2024-11-10 00:22:45', 0),
(156, 68, 'saboroso_capa.jpg', 'img/673027050eae7.jpg', '2024-11-10 00:22:45', 0),
(157, 68, 'saboroso_capa_melhor.jpg', 'img/673027050f2c8.jpg', '2024-11-10 00:22:45', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `arquivossite`
--

CREATE TABLE `arquivossite` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `path` varchar(255) NOT NULL,
  `data_upload` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `arquivossite`
--

INSERT INTO `arquivossite` (`id`, `nome`, `path`, `data_upload`) VALUES
(1, '66f6e502d3ae7.png', 'img/672eb8e5e9338.png', '2024-11-09 01:20:37'),
(2, '66f6f50f58268.gif', 'img/672eb90b8c6b8.gif', '2024-11-09 01:21:15'),
(7, 'carrossel.png', 'img/673651c8aabf5.png', '2024-11-14 16:38:48'),
(9, 'carrossel2.png', 'img/67366f12d3d31.png', '2024-11-14 18:43:46'),
(10, '1.png', 'img/67494302183cd.png', '2024-11-29 04:28:50'),
(11, '2.png', 'img/67494308e7e19.png', '2024-11-29 04:28:56'),
(12, '3.png', 'img/674943120510e.png', '2024-11-29 04:29:06'),
(13, '4.png', 'img/674943227e835.png', '2024-11-29 04:29:22'),
(14, '5.png', 'img/6749433cc4e8c.png', '2024-11-29 04:29:48'),
(15, '6.png', 'img/6749434a2cace.png', '2024-11-29 04:30:02'),
(16, '7.png', 'img/674943536f033.png', '2024-11-29 04:30:11'),
(17, '8.png', 'img/6749435a72da7.png', '2024-11-29 04:30:18'),
(19, '9.png', 'img/674946b2b1e39.png', '2024-11-29 04:44:34'),
(20, '10.png', 'img/674946bdaf253.png', '2024-11-29 04:44:45');

-- --------------------------------------------------------

--
-- Estrutura para tabela `autor`
--

CREATE TABLE `autor` (
  `ID_autor` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `data_nascimento` date NOT NULL,
  `nacionalidade` varchar(100) NOT NULL,
  `bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_usuario` int(11) NOT NULL,
  `nome_completo` varchar(255) DEFAULT NULL,
  `nome_usuario` varchar(255) NOT NULL,
  `sexo` varchar(30) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `CPF` varchar(11) DEFAULT NULL,
  `biografia` text NOT NULL,
  `fotoPerfil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id_usuario`, `nome_completo`, `nome_usuario`, `sexo`, `email`, `senha`, `telefone`, `CPF`, `biografia`, `fotoPerfil`) VALUES
(1, 'teste', 'teste', '', 'teste@gmail.com', '$2y$10$M5QXjNHRJCTvzAnjgEtFFuRo.EGPiF0GJONxCAizovBRK6YlD7rTK', '(12) 31231-3131', '123.123.131', '', ''),
(8, 'Cleyton da Silva Rodrigues', 'fan_rodoviario', '', 'fanrodoviario7721@gmail.com', '$2y$10$MqxW9aAcwhXmFWJ/keGOy.prGyPmLFl2mdCYg.tZsZrHtlMuYyxZa', '(11) 98057-3422', '21312313123', '', ''),
(9, 'DARKSIDE BOOKS', 'joaosilva123', '', 'te', '$2y$10$G8XKX5Iw7PdGMNA4V7W9RuiEKzgXpzn/HFypORUFou4ixHUHwdiRO', '(11) 98765-4321', '123.456.789', '', ''),
(10, 'Maria Oliveira ', 'mariaoliveira456', '', ' maria.santos@example.com', '$2y$10$vxCvqz7tcNYzPe.lvbkEw.bnaIH.BicxXLSmQ2J3ZfUu6S2Uf7vzq', '(21) 99876-5432', '987.654.321', '', ''),
(11, 'Jhonata Alves do nascimento', 'Jhow', '', 'jhonataalvesdonascimento@gmail.com', '$2y$10$iI09lkD4Z75lUqiL5yRX4uuzGTV6Pc5vBs0KJ2rcsPrihGhjLzD1y', '(11) 95444-7644', '444.444.444', '', ''),
(12, 'TESTE', 'TBOESTEOKS', '', 'atendimento@darksidebooks.TSTE', '$2y$10$L1Pn52BBS0LYejDWkpGf9uDvT2fLyMZ0ie4Oxx6kfuikeLUTX9muW', '(11) 11111-1111', '123.123.131', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `editora`
--

CREATE TABLE `editora` (
  `id_editora` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `cnpj` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `editora`
--

INSERT INTO `editora` (`id_editora`, `nome`, `pais`, `email`, `telefone`, `cnpj`) VALUES
(3, 'DARKSIDE BOOKS', 'Brasil', 'atendimento@darksidebooks.com', '1111111111111', ' 35.503.303/0003-7'),
(6, 'Camelot Editora', 'Brasil', 'atendimento@cameloteditora.com', '11111111111', '00.776.574/0006-60'),
(7, 'Bertrand', ' Brasil', 'atendimento@bertrand.com', '11111111111', '61.353.579/0003-22'),
(8, 'Companhia das Letras', 'Brasil', 'atendimento@companhiadasletras.com', '11111111111', '04532-002'),
(9, 'Record', 'Brasil', 'atendimento@record.com', '11111111111', '07.115.047/0001-40'),
(10, 'Editora Arqueiro', 'Brasil', 'atendimento@editoraarqueiro.com', '11111111111', '06.985.027/0001-67'),
(11, 'Todavia', 'Brasil', 'atendimento@todavia.com', '11111111111', '27.137.961/0002-80'),
(12, 'Editora Vélos', 'Brasil', 'atendimento@velos.com', '11111111111', '47.019.084/0002-50'),
(13, 'Intrínseca', 'Brasil', 'atendimento@intrínseca.com', '11111111111', '05.660.045/0001-06'),
(14, 'Excelsior', 'Brasil', 'atendimento@excelsior.com', '11111111111', '42.811.174/0001-84'),
(15, 'Seguinte', 'Brasil', 'atendimento@seguinte.com', '11111111111', '45.192.875/0001-70'),
(16, 'HarperCollins', 'Brasil', 'atendimento@harpercollins.com', '11111111111', '22.016.633/0001-20');

-- --------------------------------------------------------

--
-- Estrutura para tabela `enderecos_cliente`
--

CREATE TABLE `enderecos_cliente` (
  `Cidade_Cli` varchar(100) NOT NULL,
  `Bairrro` varchar(100) NOT NULL,
  `CEP` varchar(10) NOT NULL,
  `Numero` varchar(10) NOT NULL,
  `Rua` varchar(255) NOT NULL,
  `Estado` varchar(100) NOT NULL,
  `Complemento` text NOT NULL,
  `Id_enderecoCli` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `enderecos_cliente`
--

INSERT INTO `enderecos_cliente` (`Cidade_Cli`, `Bairrro`, `CEP`, `Numero`, `Rua`, `Estado`, `Complemento`, `Id_enderecoCli`, `id_usuario`) VALUES
('Itapevi', 'Nova ItapeviASD', '06690-280', '12', 'Estrada da Capela Velha, 46', 'SP', '', 1, 9);

-- --------------------------------------------------------

--
-- Estrutura para tabela `enderecos_editora`
--

CREATE TABLE `enderecos_editora` (
  `id_endereco` int(11) NOT NULL,
  `id_editora` int(11) NOT NULL,
  `tipo_endereco` varchar(50) DEFAULT NULL,
  `endereco_rua` varchar(255) DEFAULT NULL,
  `endereco_numero` varchar(10) DEFAULT NULL,
  `endereco_bairro` varchar(100) DEFAULT NULL,
  `endereco_cep` varchar(10) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `enderecos_editora`
--

INSERT INTO `enderecos_editora` (`id_endereco`, `id_editora`, `tipo_endereco`, `endereco_rua`, `endereco_numero`, `endereco_bairro`, `endereco_cep`, `estado`, `cidade`) VALUES
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
(11, 'Ficção', 'Gênero literário que envolve a criação de histórias imaginárias, onde os acontecimentos, personagens e cenários não são baseados em fatos reais. A ficção pode abranger diversos subgêneros, como aventura, romance, mistério, entre outros, e permite a exploração da criatividade e imaginação do autor.'),
(12, 'Distopia', 'Livros que retratam sociedades opressivas em futuros sombrios, com críticas sociais.'),
(13, 'Thriller Psicológico', 'Livros que exploram a mente humana, com tensão e mistério intensos.'),
(14, 'Suspense', 'Histórias que mantêm o leitor na expectativa, com revelações e reviravoltas surpreendentes.'),
(15, 'Crime', 'Focam em investigações de crimes, detetives e reviravoltas na resolução de casos.'),
(16, 'Drama', 'Explora temas emocionais e complexos sobre as relações humanas e desafios pessoais.'),
(17, 'Infantil', 'Livros voltados para crianças, com temas educativos e histórias encantadoras.'),
(18, 'Jovem Adulto', 'Focados em temas para adolescentes e jovens, como amizade, amor e autoconhecimento.'),
(19, 'Clássicos', 'Obras literárias renomadas, essenciais e atemporais na história da literatura.'),
(20, 'Filosofia', 'Exploram questões existenciais e pensamentos de filósofos sobre a vida, ética e sociedade.'),
(21, 'Policial', 'Histórias de investigação criminal, geralmente protagonizadas por detetives ou policiais.'),
(22, 'Literatura Erótica', 'Focada em histórias de romance e relacionamentos com temas mais íntimos e adultos.'),
(23, 'Espiritualidade', 'Abordam temas de crescimento espiritual e desenvolvimento pessoal em várias crenças.'),
(24, 'Humor', 'Livros com conteúdo humorístico, sátiras e histórias leves e engraçadas.'),
(25, 'Distopias Juvenis', 'Distopias voltadas para o público jovem, com foco em aventura e temas de sobrevivência.'),
(26, 'Ficção Histórica', 'Histórias fictícias que se passam em épocas históricas com eventos reais.'),
(27, 'Ciência e Tecnologia', 'Exploram descobertas científicas, avanços e curiosidades sobre o universo e a tecnologia.'),
(28, 'Psicologia', 'Livros que abordam o estudo da mente humana e o comportamento.'),
(29, 'Esporte', 'Histórias sobre esportes, atletas e competições, com foco no desenvolvimento pessoal.'),
(30, 'Viagem e Turismo', 'Guias e histórias sobre diferentes culturas, viagens e lugares ao redor do mundo.'),
(31, 'Filosofia Oriental', 'Explora pensamentos e tradições filosóficas orientais, como budismo, taoísmo e zen.');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `genero`
--

CREATE TABLE `genero` (
  `id_categoria` int(11) NOT NULL,
  `Genero` varchar(100) NOT NULL,
  `Descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(11, 'Ficção', 'Gênero literário que envolve a criação de histórias imaginárias, onde os acontecimentos, personagens e cenários não são baseados em fatos reais. A ficção pode abranger diversos subgêneros, como aventura, romance, mistério, entre outros, e permite a exploração da criatividade e imaginação do autor.'),
(12, 'Distopia', 'Livros que retratam sociedades opressivas em futuros sombrios, com críticas sociais.'),
(13, 'Thriller Psicológico', 'Livros que exploram a mente humana, com tensão e mistério intensos.'),
(14, 'Suspense', 'Histórias que mantêm o leitor na expectativa, com revelações e reviravoltas surpreendentes.'),
(15, 'Crime', 'Focam em investigações de crimes, detetives e reviravoltas na resolução de casos.'),
(16, 'Drama', 'Explora temas emocionais e complexos sobre as relações humanas e desafios pessoais.'),
(17, 'Infantil', 'Livros voltados para crianças, com temas educativos e histórias encantadoras.'),
(18, 'Jovem Adulto', 'Focados em temas para adolescentes e jovens, como amizade, amor e autoconhecimento.'),
(19, 'Clássicos', 'Obras literárias renomadas, essenciais e atemporais na história da literatura.'),
(20, 'Filosofia', 'Exploram questões existenciais e pensamentos de filósofos sobre a vida, ética e sociedade.'),
(21, 'Policial', 'Histórias de investigação criminal, geralmente protagonizadas por detetives ou policiais.'),
(22, 'Literatura Erótica', 'Focada em histórias de romance e relacionamentos com temas mais íntimos e adultos.'),
(23, 'Espiritualidade', 'Abordam temas de crescimento espiritual e desenvolvimento pessoal em várias crenças.'),
(24, 'Humor', 'Livros com conteúdo humorístico, sátiras e histórias leves e engraçadas.'),
(25, 'Distopias Juvenis', 'Distopias voltadas para o público jovem, com foco em aventura e temas de sobrevivência.'),
(26, 'Ficção Histórica', 'Histórias fictícias que se passam em épocas históricas com eventos reais.'),
(27, 'Ciência e Tecnologia', 'Exploram descobertas científicas, avanços e curiosidades sobre o universo e a tecnologia.'),
(28, 'Psicologia', 'Livros que abordam o estudo da mente humana e o comportamento.'),
(29, 'Esporte', 'Histórias sobre esportes, atletas e competições, com foco no desenvolvimento pessoal.'),
(30, 'Viagem e Turismo', 'Guias e histórias sobre diferentes culturas, viagens e lugares ao redor do mundo.'),
(31, 'Filosofia Oriental', 'Explora pensamentos e tradições filosóficas orientais, como budismo, taoísmo e zen.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagens_editoras`
--

CREATE TABLE `imagens_editoras` (
  `id_imagem` int(11) NOT NULL,
  `id_editora` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `tipo_imagem` varchar(100) NOT NULL,
  `data_upload` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `imagens_editoras`
--

INSERT INTO `imagens_editoras` (`id_imagem`, `id_editora`, `path`, `tipo_imagem`, `data_upload`) VALUES
(1, 5, '../img/67379e3cd310a.png', 'logo', '2024-11-15 19:17:16'),
(2, 6, '../img/674937cfa16d4.png', 'logo', '2024-11-29 03:41:03'),
(3, 7, '../img/67493c8140082.png', 'logo', '2024-11-29 04:01:05'),
(4, 8, '../img/674940426f4a8.jpg', 'logo', '2024-11-29 04:17:06'),
(5, 9, '../img/674947ebb797c.jpg', 'logo', '2024-11-29 04:49:47'),
(6, 10, '../img/67494cf626756.jpg', 'logo', '2024-11-29 05:11:18'),
(7, 11, '../img/67494f4bb3eee.jpg', 'logo', '2024-11-29 05:21:15'),
(8, 12, '../img/674953ce145bf.jpg', 'logo', '2024-11-29 05:40:30'),
(9, 13, '../img/67495b18b9dc8.png', 'logo', '2024-11-29 06:11:36'),
(10, 14, '../img/674961b3f3c57.jpg', 'logo', '2024-11-29 06:39:48'),
(11, 15, '../img/674964f9bbcc2.jpeg', 'logo', '2024-11-29 06:53:45'),
(12, 16, '../img/67496895e7637.png', 'logo', '2024-11-29 07:09:09');


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
  `Estoque` int(11) NOT NULL,
  `Avaliacao` double NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_editora` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `livros`
--


INSERT INTO `livros` (`ID_livro`, `Titulo`, `Autor`, `Data_lancamento`, `QntPaginas`, `Sinopse`, `Preco`, `ISBN`, `id_categoria`, `id_editora`) VALUES
(63, 'Drácula', 'Bram Stoker', '2020-02-20', 580, 'Drácula , um clássico que ainda corre quente na veia de inúmeras gerações de leitores por todo o mundo e a mais celebrada narrativa de vampiros, continua a transcender fronteiras de tempo, espaço, história e memória.\r\n\r\nMais de 120 anos após sua primeira publicação, o romance epistolar mobiliza leitores e estudiosos, confirmando o vigor perene de uma árvore cujas sólidas raízes respondem pela vitalidade de suas ramificações. Embora o famoso conde não tenha sido o primeiro vampiro literário, certamente é o mais popular, sugado e adaptado para inúmeros universos: teatro, cinema, quadrinhos, séries e brinquedos, o semblante é reconhecido até mesmo por aqueles que nunca leram o romance. Ele está em todos os lugares.\r\n\r\nA obra atemporal de Bram Stoker narra, por meio de fragmentos de cartas, diários e notícias de jornal, a história de humanos lutando para sobreviver às investidas do vampiro Drácula. O grupo formado por Jonathan Harker, Mina Harker, dr. Van Helsing e dr. Seward tenta impedir que a vil criatura se alimente de sangue humano na Londres da época vitoriana, no final do século XIX.\r\n\r\nUm clássico absoluto do terror, Bram Stoker define em Drácula a forma como nós entendemos e pensamos os vampiros atualmente. Mais que isso, ele traz esse monstro para o centro do palco da cultura pop do nosso século e eterniza o vilão de modos refinados e comportamento sanguinário.\r\n\r\nNão é de agora que os leitores clamam por uma edição de Drácula feita pela DarkSide® Books para honrar o legado do mestre Bram Stoker. Uma obra tão grandiosa quanto essa será publicada em duas versões, para nenhum vampiro colocar defeito: FIRST EDITION, com a icônica capa amarela da primeira publicação, em 1897, uma edição inédita no mercado brasileiro que eterniza o brilho e o encanto do sol, algo inalcançável diante de toda a dor da eternidade; e a DARK EDITION, dedicada aos leitores trevosos de coração sombrio. Por dentro elas carregam o mesmo conteúdo sangrento; por fora demonstram a vida e a beleza de um clássico imortal.\r\n\r\nPara fazer os leitores se arrepiarem, Marcia Heloisa assina a tradução e introdução de Drácula . E como sangue tem poder, o descendente direto do autor, Dacre Stoker, escreve a preciosa apresentação desta edição.\r\n\r\nCarlos Primati e Marcia Heloisa dão suas contribuições para a perpétua criatura. O leitor encontra textos de apoio que contam as relações entre a verdadeira Transilvânia e a aquela eternizada no livro, bem como a influência dos vampiros na cultura pop mundial. E como a DarkSide® Books sabe o que faz o coração dos vivos leitores da editora bater mais forte, apresenta também o conto “O Hóspede de Drácula ”, que fazia parte do texto de Stoker, mas foi retirado da primeira publicação.\r\n\r\nTodo esse conteúdo, planejado especialmente para os darksiders que sabem que existe uma razão para as coisas serem como são, é ornamentado com as belas e poderosas imagens de Samuel Casal, premiado quadrinista e ilustrador brasileiro, que fez uma releitura deslumbrante de personagens imortais.\r\n\r\nA coleção Medo Clássico da DarkSide® se consolida a cada mestre que entra em sua casa, fazendo uma homenagem aos grandes nomes da literatura que já causaram pesadelos inenarráveis aos leitores, década após década. Para eternizar a experiência, sempre traz ilustradores convidados e tradutores que respiram e conhecem profundamente as obras originais. De fã para fã. Até o fim.', 59.90, '978-85-6663-623-9', 4, 3),
(64, 'É Assim que Acaba: 1 Capa comum ', 'Colleen Hoover', '2018-02-20', 368, 'Em É assim que acaba , Colleen Hoover nos apresenta Lily, uma jovem que se mudou de uma cidadezinha do Maine para Boston, se formou em marketing e abriu a própria floricultura. E é em um dos terraços de Boston que ela conhece Ryle, um neurocirurgião confiante, teimoso e talvez até um pouco arrogante, com uma grande aversão a relacionamentos, mas que se sente muito atraído por ela.\r\n\r\nQuando os dois se apaixonam, Lily se vê no meio de um relacionamento turbulento que não é o que ela esperava. Mas será que ela conseguirá enxergar isso, por mais doloroso que seja?\r\n\r\nÉ assim que acaba é uma narrativa poderosa sobre a força necessária para fazer as escolhas certas nas situações mais difíceis. Considerada a obra mais pessoal de Hoover, o livro aborda sem medo alguns tabus da sociedade para explorar a complexidade das relações tóxicas, e como o amor e o abuso muitas vezes coexistem em uma confusão de sentimentos.\r\n\r\n \r\n\r\n“Um romance corajoso, de partir o coração, que enfia as garras em você e não te solta... Ninguém escreve sobre sentimentos tão bem quanto Colleen Hoover.” -Anna Todd, autora da série After\r\n\r\n“...Você vai sorrir em meio às lágrimas.” - Sarah Pekkanen, autora de Perfect Neighbors\r\n\r\n“Imperdível. Com um drama fascinante e verdades dolorosas, esse livro retrata de maneira poderosa a devastação que o abuso pode causar - e a força de quem sobrevive a ele...” - Kirkus Review', 42.00, '978-85-0111-251-4', 4, 3),
(65, 'É assim que começa (Vol. 2 É assim que acaba)', 'Colleen Hoover', '2024-08-22', 336, 'Preparem os corações. Lily e Atlas estão de volta na aguardada sequência de É assim que acaba . É assim que começa chega para consagrar novamente Colleen Hoover como a autora mais vendida do Brasil.\r\n\r\nColleen é um fenômeno editorial, acumulando não só milhões de visualizações no TikTok, mas também milhões de exemplares vendidos.\r\n\r\n \r\n\r\nLily Bloom continua administrando uma floricultura. Seu ex-marido abusivo, Ryle Kincaid, ainda é um    cirurgião. Mas agora os dois estão oficialmente divorciados e dividem a guarda da filha, Emerson.\r\n\r\nQuando Lily esbarra em Atlas ― com quem não fala há quase dois anos ―, parece que finalmente chegou o momento de retomar o relacionamento da adolescência, já que ele também está solteiro e parece retribuir os sentimentos de Lily. Mas apesar de divorciada, Lily não está exatamente livre de Ryle. Culpando Atlas pelo fim de seu casamento, Ryle não está nada disposto a aceitar o novo relacionamento de Lily, ainda mais com Atlas, o último homem que aceitaria ver perto de sua filha e da ex-esposa.\r\n\r\nAlternando entre os pontos de vista de Atlas e Lily, É assim que começa retoma logo após o epílogo de É assim que acaba . Revelando mais sobre o passado de Atlas e acompanhando a jornada de Lily para abraçar a sua segunda chance, no amor enquanto lida com um ex-marido ciumento, É assim que começa prova que ninguém entrega uma leitura mais emocionante do que Colleen Hoover.', 41.97, '978-65-5981-139-7', 4, 3),
(67, 'Sapiens (Nova edição): Uma breve história da humanidade', 'Yuval Noah Harari', '2022-11-10', 472, 'Na nova edição do livro que conquistou milhões de leitores ao redor do mundo, Yuval Noah Harari questiona tudo o que sabemos sobre a trajetória humana no planeta ao explorar quem somos, como chegamos até aqui e por quais caminhos ainda poderemos seguir.\r\n\r\nO planeta Terra tem cerca de 4,5 bilhões de anos. Numa fração ínfima desse tempo, uma espécie entre incontáveis outras o dominou: nós, humanos. Somos os animais mais evoluídos e mais destrutivos que jamais viveram.\r\nSapiens é a obra-prima de Yuval Noah Harari e o consagrou como um dos pensadores mais brilhantes da atualidade. Num feito surpreendente, que já fez deste livro um clássico contemporâneo, o historiador israelense aplica uma fascinante narrativa histórica a todas as instâncias do percurso humano sobre a Terra. Da Idade da Pedra ao Vale do Silício, temos aqui uma visão ampla e crítica da jornada em que deixamos de ser meros símios para nos tornarmos os governantes do mundo.\r\nHarari se vale de uma abordagem multidisciplinar que preenche as lacunas entre história, biologia, filosofia e economia, e, com uma perspectiva macro e micro, analisa não apenas os grandes acontecimentos, mas também as mudanças mais sutis notadas pelos indivíduos.\r\n\r\n“Interessante e provocador. Nos traz a sensação de quão breve é o tempo em que estamos nesta Terra.” ― Barack Obama\r\n\r\n“Recomendo Sapiens a qualquer pessoa que esteja interessada na história e no futuro de nossa espécie.” ― Bill Gates\r\n\r\n“Uma incrível investigação para compreender o passado, situar o presente e pensar para onde iremos. Num momento de crise civilizatória, a obra de Harari é um convite à reflexão.” ― Djamila Ribeiro\r\n\r\n“ Sapiens não só trata das questões mais importantes da história de nossa espécie como é escrito numa linguagem vívida e inesquecível.” ― Jared Diamond\r\n\r\n“O livro de Yuval Noah Harari é muito bom. Fui surpreendido por pontos de vista que nunca tinha imaginado.” ― Leandro Karnal\r\n\r\n“O modo como Harari narra a história de nós, humanos, e enxerga nosso futuro é arrebatador.” ― Natalie Portman\r\n\r\n“ Sapiens é uma exploração fascinante sobre como aquilo que nos torna humanos é muito mais do que uma biologia notável: é o mundo mental que construímos em conjunto.” ― Suzana Herculano-Houzel', 79.90, '978-85-3593-392-5', 7, 3),
(68, 'Saboroso Cadáver ', 'Agustina Bazterrica', '2022-07-05', 192, 'Diz o antigo ditado que “Você é o que você come”. No romance Saboroso Cadáver, de Agustina Bazterrica, esse ditado é levado às últimas consequências. O livro conta a história de um vírus que se espalha entre os animais de todo o planeta e torna sua carne mortal aos humanos. Impossibilitados de utilizar os animais para a alimentação, a sociedade regulariza a criação e a reprodução de seres humanos como animais de abate, transformando o mundo num lugar cinzento, cínico e inóspito. Nesse romance visceral, grotesco, repleto de descrições vívidas e nauseantes capaz de nos alimentar na medida certa, vamos acompanhar a rotina de Marcos Tejo, funcionário do frigorífico Krieg,, que recebe de presente uma mulher viva, considerada “carne de primeira”. Ironicamente, esse funcionário parece ser o mais humano nesse mundo terrível. Seguindo seus passos, presenciamos o processo metódico da criação de pessoas, abates, experimentos de laboratório, caçadas humanas e suntuosos jantares canibais. Publicado originalmente em 2017, Saboroso Cadáver ganhou o Prêmio Clarín Novela naquele mesmo ano, na Argentina. Três anos depois, a tradução americana do livro recebeu o Ladies of Horror Fiction Award como melhor romance de 2020. Além disso, de acordo com o jornal Washington Post, foi um dos melhores lançamentos de horror, ficção científica e fantasia de 2020, ao lado de Temporada de Caça, de Stephen Graham Jones. Uma das pessoas que participaram da seleção foi ninguém menos que Silvia Moreno-Garcia, autora de Gótico Mexicano (DarkSide® Books, 2021), sucesso entre os darksiders. Bazterrica afirmou que “escrever é uma experiência feroz e minha intenção é tirar o leitor dessa letargia em que vivemos e em que, muitas vezes, a violência é naturalizada”. Distopia arrepiante, Saboroso Cadáver imagina um mundo em que a violência e o canibalismo são de fato naturalizados, embora ainda haja espaço para a compaixão, a solidariedade e o cuidado com os outros, enquanto a batalha pela sobrevivência se torna uma aventura de desfecho incerto. Com seu romance marcante e poderoso, Bazterrica nos coloca dentro de um pesadelo em que o canibalismo se legitima na maior parte do mundo e a sociedade fica dividida entre aqueles que comem e aqueles que são comidos. Haveria caminhos para a humanidade, quando os corpos dos mortos são cremados para evitar que sejam devorados? Quais as relações passíveis de serem forjadas, quando na verdade somos o que comemos? Saboroso Cadáver é um prato raro, uma iguaria literária impiedosa, alegórica e realista, agridoce e suculenta, capaz de alimentar de ternura os corações literários que ainda pulsam diante da beleza do horror.', 45.90, '978-65-5598-188-9', 1, 3),
(72, 'Orgulho e Preconceito', 'Jane Austen', '2021-09-16', 240, 'Orgulho e Preconceito é um dos mais aclamados romances da escritora inglesa Jane Austen. Publicado em 1813, revela como era a sociedade da época, quando os relacionamentos se desenrolavam de maneira mais lenta e romântica, no ritmo das cartas levadas por mensageiros a cavalo. Nesse mundo, o sonho da Sra. Bennet era casar bem suas cinco filhas: Jane, Elizabeth, Mary, Kitty e Lydia. Entre as irmãs, destaca-se Elizabeth, a Lizzy, que se depara com um turbilhão de sentimentos diante do orgulho e preconceito que mascaram a realidade. Trata-se de um clássico que, mesmo após duzentos anos desde a sua primeira publicação, continua a encantar milhões de leitores ao redor do mundo.', 27.50, '978-65-8781-714-9', 4, 6),
(75, 'O velho e o mar (Graphic Novel)', 'Ernest Hemingway', '2017-09-12', 128, 'Havia tempos que Santiago não pescava um só peixe. Sozinho, sem a companhia de seu melhor amigo - um menino que o ajudava e que muito o estima -, o velho pescador rema mar adentro e se vê cercado por água cristalina e animais marinhos. Até que fisga um peixe especial: o peixe que mudaria sua vida.\r\n\r\nDias se passam enquanto a batalha dos dois é travada. Apesar dos sonhos e pensamentos que transcorrem em meio à solidão do alto-mar, o pescador não esmorece. Essa é a história de um homem de mãos calosas cuja crença em si mesmo é a única coisa que importa.\r\n\r\nNessa adaptação do clássico indiscutível de Ernest Hemingway, Thierry Murat propõe uma versão personalíssima de O velho e o mar, em que o despojamento e a contenção de seu estilo combinam admiravelmente com a deriva solitária do velho pescador.\r\n\r\n', 75.00, '978-85-2862-220-1', 4, 7),
(76, '1984 ', 'George Orwell ', '2009-07-21', 416, 'Winston, herói de 1984 , último romance de George Orwell, vive aprisionado na engrenagem totalitária de uma sociedade completamente dominada pelo Estado, onde tudo é feito coletivamente, mas cada qual vive sozinho. Ninguém escapa à vigilância do Grande Irmão, a mais famosa personificação literária de um poder cínico e cruel ao infinito, além de vazio de sentido histórico. De fato, a ideologia do Partido dominante em Oceânia não visa nada de coisa alguma para ninguém, no presente ou no futuro. O\'Brien, hierarca do Partido, é quem explica a Winston que \"só nos interessa o poder em si. Nem riqueza, nem luxo, nem vida longa, nem felicidade: só o poder pelo poder, poder puro\".\r\nQuando foi publicada em 1949, essa assustadora distopia datada de forma arbitrária num futuro perigosamente próximo logo experimentaria um imenso sucesso de público. Seus principais ingredientes - um homem sozinho desafiando uma tremenda ditadura; sexo furtivo e libertador; horrores letais - atraíram leitores de todas as idades, à esquerda e à direita do espectro político, com maior ou menor grau de instrução. À parte isso, a escrita translúcida de George Orwell, os personagens fortes, traçados a carvão por um vigoroso desenhista de personalidades, a trama seca e crua e o tom de sátira sombria garantiram a entrada precoce de 1984 no restrito panteão dos grandes clássicos modernos.', 38.99, '978-85-3591-484-9', 1, 8),
(77, 'A Garota no Trem', 'Paula Hawkins', '2015-07-02', 378, 'Todas as manhãs Rachel pega o trem das 8h04 de Ashbury para Londres. O arrastar trepidante pelos trilhos faz parte de sua rotina. O percurso, que ela conhece de cor, é um hipnotizante passeio por galpões, caixas d\'água, pontes, casebres e aconchegantes casas vitorianas.\r\n\r\nEm determinado trecho, o trem para no sinal vermelho. E é de lá que Rachel observa diariamente a casa de número 15. Obcecada com seus belos habitantes - a quem chama de Jess e Jason -, Rachel é capaz de descrever o que imagina ser a vida perfeita do jovem casal. Até testemunhar uma cena chocante, segundos antes de o trem dar um solavanco e seguir viagem. Poucos dias depois, ela descobre que Jess - na verdade Megan - está desaparecida.\r\n\r\nSem conseguir se manter alheia à situação, ela vai à polícia e conta o que viu. E acaba não só participando diretamente do desenrolar dos acontecimentos, mas também da vida de todos os envolvidos.\r\n\r\nUma narrativa extremamente inteligente e repleta de reviravoltas, A garota no trem é um thriller digno de Hitchcock a ser compulsivamente devorado.', 55.55, '978-85-0110-465-6', 6, 9),
(78, 'Vidas Secas', 'Graciliano Ramos ', '2019-02-04', 176, 'Lançado originalmente em 1938,  Vidas secas  retrata a vida miserável de uma família de retirantes sertanejos obrigada a se deslocar de tempos em tempos para áreas menos castigadas pela seca. O pai, Fabiano, caminha pela paisagem árida da caatinga do Nordeste brasileiro com a sua mulher, Sinha Vitória, e os dois filhos, que não têm nome, sendo chamados apenas de “filho mais velho” e “filho mais novo”. São também acompanhados pela cachorrinha da família, Baleia, cujo nome é irônico, pois a falta de comida a fez muito magra.\r\n\r\nVidas secas  pertence à segunda fase modernista da literatura brasileira, conhecida como “regionalista” ou “romance de 30”. Denuncia fortemente as mazelas do povo brasileiro, principalmente a situação de miséria do sertão nordestino. É o romance em que Graciliano alcança o máximo da expressão que vinha buscando em sua prosa: o que impulsiona os personagens é a seca, áspera e cruel, e paradoxalmente a ligação telúrica, afetiva, que expõe naqueles seres em retirada, à procura de meios de sobrevivência e um futuro.\r\n\r\n', 49.99, '978-85-0111-478-5', 4, 9),
(80, 'A Hipótese do Amor', 'Ali Hazelwood', '2022-07-05', 336, 'Olive Smith, aluna do doutorado em Biologia da Universidade Stanford, acredita na ciência – não em algo incontrolável como o amor.\r\n\r\nDepois de sair algumas vezes com Jeremy, ela percebe que sua melhor amiga gosta dele e decide juntá-los. Para mostrar que está feliz com essa escolha, Olive precisa ser convincente: afinal, cientistas exigem provas.\r\n\r\nSem muitas opções, ela resolve inventar um namoro de mentira e, num momento de pânico, beija o primeiro homem que vê pela frente.\r\n\r\nO problema é que esse homem é Adam Carlsen, um jovem professor de prestígio – conhecido por levar os alunos às lágrimas. Por isso, Olive fica chocada quando o tirano dos laboratórios concorda em levar adiante a farsa e fingir ser seu namorado.\r\n\r\nDe repente, seu pequeno experimento parece perigosamente próximo da combustão e aquela pequena possibilidade científica, que era apenas uma hipótese sobre o amor, transforma-se em algo totalmente inesperado.\r\n\r\n', 48.46, '978-65-5565-330-4', 4, 10),
(82, 'Nove histórias', 'J.D. Salinger', '2019-09-09', 208, 'Neste que é um dos mais célebres e festejados livros da língua inglesa, J. D. Salinger deu a seus leitores nove obras-primas da narrativa curta. Do cultuado “Um dia perfeito para peixes-banana”, em que o leitor tem seu primeiro ― e impactante ― contato com a família Glass, ao emocionante “Para Esmé ― com amor e sordidez”, as histórias aqui reunidas dão a justa medida do talento inesgotável de Salinger. Poucos escritores souberam capturar com tanta maestria uma época, seus temas e anseios. Nestas nove ficções, os Estados Unidos do pós-guerra aparecem com inédito frescor literário conforme acompanhamos os efeitos, às vezes sutis, do conflito na vida de indivíduos e famílias. Mais que isso, Nove histórias traz à tona alguns dos mais marcantes personagens da prosa do século xx, como o misterioso Seymour e a adorável Esmé, bem como pistas importantes para o quebra-cabeça da família Glass, que Salinger continuaria trabalhando em seus próximos livros.', 58.78, '978-65-8030-943-6', 7, 11),
(83, 'O Retrato de Dorian Gray', 'Oscar Wilde', '2021-10-15', 320, 'Londres, 1890. Entre médicos e monstros, assassinatos e mistérios, uma história sobre imortalidade, beleza e criminalidade é criada por uma das mentes mais indomáveis da história da literatura. O Retrato de Dorian Gray, a história da pintura maldita que se degrada com a passagem das décadas, deixando o seu modelo intocado pelo tempo, finalmente adentra a galeria da DarkSide® Books em uma edição feita para agraciar admiradores e arrebatar novos leitores. Único romance de Oscar Wilde, O Retrato de Dorian Gray combina o apuro literário e estético de seu autor com uma trama sombria, pontuada por paixões, crimes e a brilhante e sarcástica verve wildeana. Publicado em 1890 na revista norte-americana Lippincott’s, o romance foi relançado em livro um ano depois em uma edição que censurou diversos trechos da obra. Dorian Gray primeiramente ofendeu uma geração vitoriana que encontrou na relação entre os amigos Dorian, o jovem retratado, Basil, o pintor apaixonado, e Henry, o lorde cínico, “o amor que não ousava dizer o seu nome”. Depois, fascinou leitores, críticos e artistas, que viram no enredo que remete ao mito de Fausto o Evangelho de um decadentismo que acredita em uma vida de arte, prazer e fascínio sensorial. Tudo isso em meio a um fim de século no qual a convenção e a moralidade corroíam qualquer prazer que a existência humana poderia desfrutar. Organizada por Enéias Tavares ― que além de autor da casa, é professor e pesquisador ― a edição especial da DarkSide® Books vem repleta de conteúdos exclusivos. Paulo Cecconi assina a nova tradução, que teve como base a edição original publicada na revista Lippincott’s e sem censura. O pesquisador Luiz Gasparelli Jr., especialista em Wilde, contribui com notas que aprofundam a experiência de leitura, repletas de dados biográficos, referências culturais e apontamentos sobre o processo criativo de seu autor. A edição da Caveira traz ainda o dossiê “Retratos de Oscar Wilde”, com registros fotográficos do autor, as duras resenhas que o romance recebeu, o apimentado debate entre os críticos e o próprio Wilde e um texto de Gasparelli sobre os julgamentos que levaram Wilde à prisão em 1895. A edição inclui ainda seu ensaio “Caneta, Tinta e Veneno” e uma seleção de poemas compilada e traduzida por Tavares, além das ilustrações originais do pintor e impressor Henry Keen, produzidas em 1925 para a edição norte-americana deste clássico. O Retrato de Dorian Gray é um romance sobre a destruição da vida através da perfeição da arte, dos preços que pagamos pelos crimes deixados em segredo, das paixões nominadas e inomináveis que transformam quem somos naquilo que deveríamos ser, não pelos outros e sim por nós mesmos. Com seu romance, Oscar Wilde pede que reinventemos a nós mesmos pela arte, a beleza e a paixão, justamente o que a sociedade e a moralidade desaconselham. Assim como Dorian, você também colocaria a arte, o prazer e o desejo acima de todas as coisas?', 61.58, '978-65-5598-000-4', 3, 3),
(84, 'Café com Deus Pai 2024', 'Júnior Rostirola', '2023-09-04', 424, 'Que tal desfrutar de um momento íntimo com alguém que te ama e tem as respostas para todas as suas aflições?\r\n\r\nEssa é a experiência que você encontra em cada página de Café com Deus Pai. São 366 mensagens que te levarão a uma jornada com devocionais diários ao longo do ano, onde você é convidado a ter um encontro com Deus Pai.\r\n\r\nAs páginas interativas irão envolvê-lo ainda mais nessa jornada, permitindo que você reflita, anote suas inspirações e compartilhe suas experiências. A cada dia, você encontrará uma mensagem única e significativa, especialmente selecionada para nutrir sua alma e fortalecer sua fé.\r\n\r\nPara tornar o seu dia ainda mais especial, frases inspiradoras são destacadas ao longo do livro, proporcionando motivação e encorajamento sempre que precisar. E para aqueles que desejam se aprofundar ainda mais na Palavra de Deus, também é incluso um plano de leitura bíblica, que o guiará por uma jornada de conhecimento e descoberta.\r\n\r\nAlém de proporcionar um novo modo de apreciar uma xícara de café, este livro mostrará como a vida pode ser saboreada.\r\n\r\nSim, Deus Pai deseja tomar café com você.', 79.84, '978-65-9807-880-5', 9, 12),
(85, 'Os dois morrem no final', 'Adam Silvera', '2021-10-04', 416, 'No dia 5 de setembro, pouco depois da meia-noite, Mateo Torrez e Rufus Emeterio recebem uma ligação da Central da Morte. A notícia é devastadora: eles vão morrer naquele mesmo dia.\r\n\r\nOs dois não se conhecem, mas, por motivos diferentes, estão à procura de um amigo com quem compartilhar os últimos momentos, uma conexão verdadeira que ajude a diminuir um pouco a angústia e a solidão que sentem. Por sorte, existe um aplicativo para isso, e é graças a ele que Rufus e Mateo vão se encontrar para uma última grande aventura: viver uma vida inteira em um único dia.\r\n\r\nUma história sensível e emocionante, Os dois morrem no final nos lembra o que significa estar vivo. Com seu olhar único, Adam Silvera mostra que cada segundo importa, e mesmo que não haja vida sem morte, nem amor sem perda, tudo pode mudar em 24 horas.', 37.99, '978-65-5560-302-6', 4, 13),
(86, 'A Sangue Frio ', 'Truman Capote', '2003-09-16', 440, 'Fruto de uma intensa investigação, feita ao longo de meses, A sangue frio é um dos livros que fundaram o jornalismo literário, gênero que combina a objetividade factual e os recursos da narrativa de ficção. O clássico de Truman Capote conta a história da brutal chacina da família Clutter e dos autores do crime, executados em 1965.', 88.74, '978-85-3590-411-6', 8, 8),
(87, 'Tartarugas até lá embaixo', 'John Green', '2017-10-10', 272, 'A história acompanha a jornada de Aza Holmes, uma menina de 16 anos que sai em busca de um bilionário misteriosamente desaparecido – quem encontrá-lo receberá uma polpuda recompensa em dinheiro – enquanto tenta lidar com o próprio transtorno obsessivo-compulsivo (TOC).\r\n\r\nRepleto de referências da vida do autor – entre elas, a tão marcada paixão pela cultura pop e o TOC, distúrbio mental que o afeta desde a infância –, Tartarugas até lá embaixo tem tudo o que fez de John Green um dos mais queridos autores contemporâneos. Um livro incrível, recheado de frases sublinháveis, que fala de amizades duradouras e reencontros inesperados, fan-fics de Star Wars e – por que não? – peculiares répteis neozelandeses.', 48.35, '978-85-5100-200-1', 4, 13),
(88, '1984 ', 'George Orwell ', '2021-01-26', 321, 'Com mais de 30 milhões de exemplares vendidos ao redor do mundo, 1984, uma das mais emblemáticas distopias da história da literatura chega às livrarias em edição luxo! Winston Smith, número 6079, ocupa uma função comum no Departamento de Documentação: “retificar” fatos de acordo com as orientações do Ministério da Verdade. E ele não mede esforços em seu objetivo de erradicar, em todos os níveis, quaisquer elementos que ameacem sua existência. A individualidade, o livre-arbítrio, o pensamento crítico, o amor – todos considerados transgressões inadmissíveis – são punidos com o máximo de rigor e severidade. Nada escapa aos olhos do Grande Irmão, o grande líder do regime, e é por meio de sua vigilância intensiva, cujos “olhos eram capazes de o seguir (…) em moedas, estampas, capas de livros, bandeiras, pôsteres e invólucros de pacotes de cigarro”, que o regime se certifica milimetricamente da soberania de seu poder. Por outro lado, Winston se sente ávido por conhecer algum tipo de liberdade. Assim, pouco a pouco avança em seus atos de resistência em busca de reavivar sua humanidade, obliterada por décadas da repressão política incidente no mais profundo nível de seus pensamentos e lembranças. Entretanto, para realizar seu desejo ele precisará desviar cuidadosamente de um perigoso campo minado sob o escrutínio do Partido e do Grande Irmão. Curiosidades sobre 1984: Publicada em 1949, a obra rendeu grande sucesso de público e crítica a Orwell, tornando-se um dos maiores best-sellers das últimas sete décadas. Ao longo desse período, 1984 influenciou a produção de filmes, obras literárias e até a criação da franquia internacional de reality shows conhecida como Big Brother – ou “Grande Irmão”, em português. Além disso, a fortuna literária do autor inspirou outros grandes artistas, como Pink Floyd, na composição do álbum Animals (1977), e David Bowie, em Diamond Dogs (1974). Curiosidades sobre o autor: • O nome de batismo de George Orwell é, na verdade, Eric Arthur Blair. “George Orwell” foi um pseudônimo usado para a publicação de livros, tendo sido inspirado no rio Orwell, situado no leste da Inglaterra. • O autor escreveu 1984 em sua fazenda na ilha de Jura, na Escócia, a qual ele comprou com proventos dos direitos autorais de A revolução dos bichos. • Aos 34 anos, Orwell sobreviveu a um tiro que lhe perfurou a garganta, ocorrido durante seu período como combatente da ditadura franquista, na Espanha. • O período em que Orwell trabalhou como livreiro é contado na obra Memórias da livraria.', 68.00, '978-65-8743-518-3', 1, 14),
(89, 'A Culpa é das Estrelas', 'John Green', '2013-10-22', 224, 'Mas em todo bom enredo há uma reviravolta, e a de Hazel se chama Augustus Waters, um garoto bonito que certo dia aparece no Grupo de Apoio a Crianças com Câncer. Juntos, os dois vão preencher o pequeno infinito das páginas em branco de suas vidas.\r\n\r\nInspirador, corajoso, irreverente e brutal, A culpa é das estrelas é a obra mais ambiciosa e emocionante de John Green, sobre a alegria e a tragédia que é viver e amar.', 29.99, '978-85-8057-226-1', 4, 13),
(90, 'A Rainha Vermelha', 'Victoria Aveyard', '2015-06-09', 424, 'O mundo de Mare Barrow é dividido pelo sangue: vermelho ou prateado. Mare e sua família são vermelhos: plebeus, humildes, destinados a servir uma elite prateada cujos poderes sobrenaturais os tornam quase deuses. Mare rouba o que pode para ajudar sua família a sobreviver e não tem esperanças de escapar do vilarejo miserável onde mora. Entretanto, numa reviravolta do destino, ela consegue um emprego no palácio real, onde, em frente ao rei e a toda a nobreza, descobre que tem um poder misterioso… Mas como isso seria possível, se seu sangue é vermelho? Em meio às intrigas dos nobres prateados, as ações da garota vão desencadear uma dança violenta e fatal, que colocará príncipe contra príncipe - e Mare contra seu próprio coração.', 110.12, '978-85-6576-569-5', 4, 15),
(92, 'A Biblioteca da Meia-Noite', 'Matt Haig', '2021-09-27', 308, 'Aos 35 anos, Nora Seed é uma mulher cheia de talentos e poucas conquistas. Arrependida das escolhas que fez no passado, ela vive se perguntando o que poderia ter acontecido caso tivesse vivido de maneira diferente. Após ser demitida e seu gato ser atropelado, Nora vê pouco sentido em sua existência e decide colocar um ponto final em tudo. Porém, quando se vê na Biblioteca da Meia-Noite, Nora ganha uma oportunidade única de viver todas as vidas que poderia ter vivido.\r\n\r\nNeste lugar entre a vida e a morte, e graças à ajuda de uma velha amiga, Nora pode, finalmente, se mudar para a Austrália, reatar relacionamentos antigos – ou começar outros –, ser uma estrela do rock, uma glaciologista, uma nadadora olímpica... enfim, as opções são infinitas. Mas será que alguma dessas outras vidas é realmente melhor do que a que ela já tem?\r\n\r\nEm A Biblioteca da Meia-Noite , Nora Seed se vê exatamente na situação pela qual todos gostaríamos de poder passar: voltar no tempo e desfazer algo de que nos arrependemos. Diante dessa possibilidade, Nora faz um mergulho interior viajando pelos livros da Biblioteca da Meia-Noite até entender o que é verdadeiramente importante na vida e o que faz, de fato, com que ela valha a pena ser vivida.', 46.87, '978-65-5838-054-2', 1, 7),
(93, 'O Senhor dos Anéis: A sociedade do anel', 'J.R.R. Tolkien', '2022-07-15', 608, 'Bilbo Bolseiro, cujas peripécias foram contadas em O Hobbit, é um dos poucos hobbits aventureiros da Terra-Média. Ele resolve ir embora do Condado e deixa sua considerável herança nas mãos de seu jovem parente Frodo.\r\nO mais importante legado de Bilbo é o anel mágico que costumava usar para se tornar invisível. No entanto, o objeto é o Um Anel, a raiz do poder demoníaco de Sauron, o Senhor Sombrio, que deseja escravizar todos os povos da Terra-média. A única maneira de eliminar a ameaça de Sauron é destruir o Um Anel nas entranhas da própria montanha de fogo onde foi forjado.\r\nA revelação faz com que Frodo e seus companheiros hobbits Sam, Merry e Pippin deixem a segurança do Condado e iniciem uma perigosa jornada rumo ao leste. Ao lado de representantes dos outros Povos Livres que resistem ao Senhor Sombrio, eles formam a Sociedade do Anel.', 65.50, '978-65-5511-363-1', 2, 16);
-- --------------------------------------------------------

--
-- Estrutura para tabela `moradia`
--

CREATE TABLE `moradia` (
  `Id_EnderecoCli` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL,
  `nome_role` varchar(50) NOT NULL
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
-- Índices de tabela `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`ID_autor`);

--
-- Índices de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD PRIMARY KEY (`id_avaliacao`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `editora`
--
ALTER TABLE `editora`
  ADD PRIMARY KEY (`id_editora`);

--
-- Índices de tabela `enderecos_cliente`
--
ALTER TABLE `enderecos_cliente`
  ADD PRIMARY KEY (`Id_enderecoCli`),
  ADD KEY `fk_endereco_cliente` (`id_usuario`);

--
-- Índices de tabela `enderecos_editora`
--
ALTER TABLE `enderecos_editora`
  ADD PRIMARY KEY (`id_endereco`);

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
-- Índices de tabela `imagens_editoras`
--
ALTER TABLE `imagens_editoras`
  ADD PRIMARY KEY (`id_imagem`),
  ADD KEY `fk_editora_imagem` (`id_editora`);

--
-- Índices de tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`ID_livro`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `fk_editora` (`id_editora`);

--
-- Índices de tabela `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `arquivos`
--
ALTER TABLE `arquivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT de tabela `arquivossite`
--
ALTER TABLE `arquivossite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `autor`
--
ALTER TABLE `autor`
  MODIFY `ID_autor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  MODIFY `id_avaliacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `editora`
--
ALTER TABLE `editora`
  MODIFY `id_editora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `enderecos_cliente`
--
ALTER TABLE `enderecos_cliente`
  MODIFY `Id_enderecoCli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `enderecos_editora`
--
ALTER TABLE `enderecos_editora`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `genero`
--
ALTER TABLE `genero`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `imagens_editoras`
--
ALTER TABLE `imagens_editoras`
  MODIFY `id_imagem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `ID_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de tabela `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `enderecos_cliente`
--
ALTER TABLE `enderecos_cliente`
  ADD CONSTRAINT `fk_endereco_cliente` FOREIGN KEY (`id_usuario`) REFERENCES `clientes` (`id_usuario`) ON DELETE CASCADE;

--
-- Restrições para tabelas `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`id_livro`) REFERENCES `livros` (`ID_livro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `livros`
--
ALTER TABLE `livros`
  ADD CONSTRAINT `fk_editora` FOREIGN KEY (`id_editora`) REFERENCES `editora` (`id_editora`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `livros_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `genero` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
