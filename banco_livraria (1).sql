-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/11/2024 às 15:02
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

-- --------------------------------------------------------
CREATE DATABASE IF NOT EXISTS `bookersgalaxy` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bookersgalaxy`;

--
-- Estrutura para tabela `avaliacoes`
--

CREATE TABLE `avaliacoes` (
  `id` int(11) NOT NULL,
  `nota` int(11) DEFAULT NULL CHECK (`nota` between 1 and 5),
  `texto` text NOT NULL,
  `data_comentario` date NOT NULL,
  `data_modificacao` date DEFAULT NULL,
  `imagem1` varchar(255) DEFAULT NULL,
  `imagem2` varchar(255) DEFAULT NULL,
  `imagem3` varchar(255) DEFAULT NULL,
  `imagem4` varchar(255) DEFAULT NULL,
  `imagem5` varchar(255) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_livro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `avaliacoes`
--

INSERT INTO `avaliacoes` (`id`, `nota`, `texto`, `data_comentario`, `data_modificacao`, `imagem1`, `imagem2`, `imagem3`, `imagem4`, `imagem5`, `id_usuario`, `id_livro`) VALUES
(3, 5, 'Não estava esperando gostar tanto desse clássico!!! Muito boa a escrita e eu AMO essa edição da Darkside!!!!! <3', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 11, NULL),
(4, 4, 'Não estava esperando gostar tanto desse clássico!!! Muito boa a escrita e eu AMO essa edição da Darkside!!!!! <3', '2024-11-08', NULL, NULL, NULL, NULL, NULL, NULL, 23, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'Ficção'),
(2, 'Romance'),
(3, 'Tecnologia'),
(4, 'História'),
(5, 'Autoajuda');

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_usuario` int(11) NOT NULL,
  `nome_completo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id_usuario`, `nome_completo`, `email`, `senha`, `telefone`, `cpf`, `foto`, `created_at`) VALUES
(1, 'João Siqueira de Oliveira', 'joaosiqueira@gmail.com', '$2y$10$5ZXZ.dL8Dc1K7HLP/KM2x.YV/9e8zCDOxaD7FKDPILKpIsUurnR5K', '11980507929', '555.555.555-55', 'imagem_2024-11-02_003544888.png', '2024-11-02 03:40:24'),
(11, 'Pedro Viana da Silva', 'pedroviana@gmail.com', '$2y$10$EKv9VL4MDPS4rNyhtlU1y./4kLFAw32u34ZboehMyp/pI0ar2/iza', '81980587423', '333.333.333-33', 'imagem_2024-11-02_103210814.png', '2024-11-02 13:32:24'),
(18, 'Felipe Vieira de Oliveira', 'felipe@gmail.com', '$2y$10$YeHBAj0SRO.ipuu5.UFqROngG157MoimswQBJ9VSv8bngw5iF5Lu2', '11980507969', '666.666.666-66', 'uploads/672641ce3f8fa_imagem_2024-11-02_121258146.png', '2024-11-02 15:14:22'),
(19, 'Joao', 'joao@gmail.com', '$2y$10$fT.E0Y5mz/gTocr3oL9y8.JNzOh1bHHy01mvS7.QFpSx5.hDQ.AAu', '(55)98060-2039', '56870657840', '', '2024-11-04 16:40:04'),
(21, 'pedro', 'pedro@gmail.com', '$2y$10$mpCYOJo6KKzUCsZz6luqzeJJRShvXOtLCNOFMZaGnQ60eENgLl6y.', '(55)98060-2039', '568.706.578-40', '', '2024-11-04 16:49:41'),
(22, 'Enzo osta', 'Enzo@gmail.com', '$2y$10$hXXrRr394n2GffIjVvYHmuR1rE2qIvsvXkavPO1qEfZNmUqwLBWm.', '(55)98060-2039', '496.895.998-28', '', '2024-11-04 16:50:13'),
(23, 'Samanta Vieira', 'samanta@gmail.com', '$2y$10$G1kA5D514HzHj7RaEYYlketPJJ8/JxDkxNCwZQq1IunVfldwm0Ndm', '(55)1198060-203', '035.354.074-94', 'uploads/6728fc30b5fb5_imagem_2024-11-04_135407144.png', '2024-11-04 16:54:08');

-- --------------------------------------------------------

--
-- Estrutura para tabela `enderecos`
--

CREATE TABLE `enderecos` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `rua` varchar(100) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `cep` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `enderecos`
--

INSERT INTO `enderecos` (`id`, `cliente_id`, `rua`, `numero`, `bairro`, `cidade`, `estado`, `cep`) VALUES
(1, 1, 'Rua Jararáca do Rio', '758', 'Japiranguá', 'Xique-Xique', 'Bahia', '01000-000'),
(2, 11, 'Rua Jararáca do Rio', '825', 'Japiranguá', 'Xique-Xique', 'Bahia', '01001-000'),
(3, 18, 'Rua Jorge Ogushi', '794', 'Jardim Vila Formosa', 'São Paulo', 'SP', '03471000'),
(4, 19, 'Rua Jorge Ogushi', '794', 'Jardim Vila Formosa', 'São Paulo', 'SP', '03471000'),
(5, 21, 'Rua Jorge Ogushi', '794', 'Jardim Vila Formosa', 'São Paulo', 'SP', '03471000'),
(6, 22, 'Rua Jorge Ogushi', '794', 'Jardim Vila Formosa', 'São Paulo', 'SP', '03471000'),
(7, 23, 'Rua Jorge Ogushi', '794', 'Jardim Vila Formosa', 'São Paulo', 'SP', '03471000');

-- --------------------------------------------------------

--
-- Estrutura para tabela `favoritos`
--

CREATE TABLE `favoritos` (
  `id_favorito` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_livro` int(11) NOT NULL,
  `data_adicao` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `favoritos`
--

INSERT INTO `favoritos` (`id_favorito`, `id_usuario`, `id_livro`, `data_adicao`, `estado`) VALUES
(92, 11, 6, '2024-11-04 21:53:19', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagens`
--

CREATE TABLE `imagens` (
  `id` int(11) NOT NULL,
  `livro_id` int(11) NOT NULL,
  `caminho` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `imagens`
--

INSERT INTO `imagens` (`id`, `livro_id`, `caminho`) VALUES
(7, 4, 'uploads/Capa.jpg'),
(8, 4, 'uploads/Capa_Contra-Capa.png'),
(10, 4, 'uploads/Livro_Aberto.jpg'),
(11, 4, 'uploads/Livro_Aberto_Inicial.jpg'),
(12, 5, 'uploads/cartoes.jpeg'),
(13, 5, 'uploads/jogo.jpeg'),
(14, 5, 'uploads/capa_brindes.jpeg'),
(15, 5, 'uploads/capa_capa_aberta.jpeg'),
(16, 5, 'uploads/capa_diagonal.jpeg'),
(17, 5, 'uploads/capa.jpeg'),
(18, 6, 'uploads/saberes_eternos_da_baba_yaga_loja_2_a.png'),
(19, 6, 'uploads/saberes_eternos_da_baba_yaga_loja_6.png'),
(20, 6, 'uploads/saberes_eternos_da_baba_yaga_loja_5.png'),
(21, 6, 'uploads/saberes_eternos_da_baba_yaga_loja_3.png'),
(22, 6, 'uploads/saberes_eternos_da_baba_yaga_loja_1.png'),
(23, 6, 'uploads/saberes_eternos_da_baba_yaga_loja_4.png'),
(24, 7, 'uploads/sapien.jpg'),
(25, 7, 'uploads/preludio.jpg'),
(26, 7, 'uploads/primeirapginba.jpg'),
(27, 7, 'uploads/final_indies.jpg'),
(28, 7, 'uploads/indices.jpg'),
(29, 7, 'uploads/capa_sapiens.jpg'),
(30, 8, 'uploads/assimquecomeca_diagonal.jpg'),
(31, 8, 'uploads/assimquecomeca_contracapa.jpg'),
(32, 8, 'uploads/assimquecomeca_capa.jpg'),
(33, 9, 'uploads/asanguefrio_contracapa.jpg'),
(34, 9, 'uploads/asanguefrio_capa.jpg'),
(35, 10, 'uploads/diagonal_meditacoes.jpg'),
(36, 10, 'uploads/aberto3_meditacoes.jpg'),
(37, 10, 'uploads/aberto2_meditacoes.jpg'),
(38, 10, 'uploads/aberto_meditacoes.jpg'),
(39, 10, 'uploads/contracapa_meditacoes.jpg'),
(40, 10, 'uploads/capa_meditacoes.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `livro`
--

CREATE TABLE `livro` (
  `id_livro` int(11) NOT NULL,
  `Titulo` varchar(255) NOT NULL,
  `Autor` varchar(255) NOT NULL,
  `Data_lancamento` date NOT NULL DEFAULT current_timestamp(),
  `QntPaginas` int(11) NOT NULL,
  `Genero` varchar(100) NOT NULL,
  `Sinopse` text NOT NULL,
  `Preco` decimal(10,2) NOT NULL,
  `categoria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `livro`
--

INSERT INTO `livro` (`id_livro`, `Titulo`, `Autor`, `Data_lancamento`, `QntPaginas`, `Genero`, `Sinopse`, `Preco`, `categoria_id`) VALUES
(4, 'Dracula', 'Bram-Stoker', '2024-11-02', 448, ' Terror / Ficção Gótica.', 'O romance narra a história do conde Drácula e sua busca por sangue humano. Através de cartas, diários e notícias, a trama revela a luta dos personagens para enfrentar o vampiro que ameaça a Inglaterra. É uma obra que mistura elementos de horror, romance e aventura, sendo um dos maiores clássicos da literatura de terror.', 55.00, NULL),
(5, 'Nosferatu: Sinfonia das Sombras ', '2024-10-17', '2024-11-02', 325, 'Não Ficção', 'Nosferatu (1922), de F. W. Murnau, a primeira adaptação cinematográfica de Drácula, de Bram Stoker, continua sendo um filme de terror poderoso e perturbador. Um dos documentos mais notáveis do lado sombrio da cultura de Weimar, o filme trata de temas como a destrutividade humana, loucura e poluição moral e física, questões que tinham grande relevância para o público da época.', 99.90, NULL),
(6, 'Saberes Eternos da Baba Yaga + Brinde Exclusivo', 'Taisia Kitaiskaia', '2024-11-02', 160, 'Não Ficção', '\"Entre os conselhos sábios de Baba Yaga e sua estética envolvente, este livro encantador conjura uma aura profundamente bruxesca. Eu o recomendaria a todos que curtem releituras contemporâneas de mitos e a qualquer pessoa que esteja enfrentando depressão, luto ou um término doloroso. É perfeito para todos que preferem buscar orientação de uma velha bruxa rabugenta da floresta, em vez de uma figura açucarada e superficial ou a qualquer um que aprecie o que é ao mesmo tempo belo e macabro.\"', 60.90, NULL),
(7, 'Sapiens (Nova edição): Uma breve história da humanidade ', 'Yuval Noah Harari', '2024-11-02', 472, 'História', 'O planeta Terra tem cerca de 4,5 bilhões de anos. Numa fração ínfima desse tempo, uma espécie entre incontáveis outras o dominou: nós, humanos. Somos os animais mais evoluídos e mais destrutivos que jamais viveram.\r\nSapiens é a obra-prima de Yuval Noah Harari e o consagrou como um dos pensadores mais brilhantes da atualidade.', 60.00, NULL),
(8, 'É Assim que Acaba: 1', 'Colleen Hoover ', '2024-11-02', 368, 'Romance', 'Em É assim que acaba , Colleen Hoover nos apresenta Lily, uma jovem que se mudou de uma cidadezinha do Maine para Boston, se formou em marketing e abriu a própria floricultura. E é em um dos terraços de Boston que ela conhece Ryle, um neurocirurgião confiante, teimoso e talvez até um pouco arrogante, com uma grande aversão a relacionamentos, mas que se sente muito atraído por ela.', 55.20, NULL),
(9, 'A sangue frio', 'Truman Capote', '2024-11-02', 440, 'Crimes Reais', 'O americano Truman Capote foi um escritor versátil: produziu textos de qualidade em vários gêneros (contos, peças, reportagens, adaptações para TV e roteiros para filmes). Mas sua grande obra foi o romance-reportagem A sangue frio, que conta a história da morte de toda a família Clutter, em Holcomb, Kansas, e dos autores da chacina. Capote decidiu escrever sobre o assunto ao ler no jornal a notícia do assassinato da família, em 1959.', 70.00, NULL),
(10, 'Meditações de Marco Aurélio - Edição de Luxo Almofadada', 'Marco Aurélio', '2024-11-02', 128, 'Filsofia', 'Uma das obras mais grandiosas da filosofia, “Meditações” reúne uma série de escritos pessoais de Marco Aurélio, o sábio imperador romano admirado pela dedicação e justiça que sustentou em meio às brutais guerras e calamidades desencadeadas em seu reinado. Valendo-se dos princípios morais do estoicismo, suas reflexões abrangem questões de relevância atemporal em defesa de uma vida virtuosa, entre as quais valores de liderança, disciplina, benevolência, integridade e coragem. ', 33.90, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `arquivos`
--

CREATE TABLE `arquivos` (
  `id_arquivo` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `path` varchar(100) NOT NULL,
  `data_upload` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `arquivos`
--

INSERT INTO `arquivos` (`id_arquivo`, `nome`, `path`, `data_upload`) VALUES
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
-- Índices de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_usuario` (`id_usuario`),
  ADD KEY `fk_id_livro` (`id_livro`);

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Índices de tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Índices de tabela `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`id_favorito`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_livro` (`id_livro`);

--
-- Índices de tabela `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `livro_id` (`livro_id`);

--
-- Índices de tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`id_livro`),
  ADD KEY `categoria_id` (`categoria_id`);
  
--
-- Índices de tabela `arquivos`
--
ALTER TABLE `arquivos`
  ADD PRIMARY KEY (`id_arquivo`);


--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id_favorito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `id_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `arquivos`
--
ALTER TABLE `arquivos`
  MODIFY `id_arquivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;
--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD CONSTRAINT `fk_id_livro` FOREIGN KEY (`id_livro`) REFERENCES `livro` (`id_livro`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `clientes` (`id_usuario`) ON DELETE SET NULL;

--
-- Restrições para tabelas `enderecos`
--
ALTER TABLE `enderecos`
  ADD CONSTRAINT `enderecos_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id_usuario`) ON DELETE CASCADE;

--
-- Restrições para tabelas `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `clientes` (`id_usuario`),
  ADD CONSTRAINT `favoritos_ibfk_2` FOREIGN KEY (`id_livro`) REFERENCES `livro` (`id_livro`);

--
-- Restrições para tabelas `imagens`
--
ALTER TABLE `imagens`
  ADD CONSTRAINT `imagens_ibfk_1` FOREIGN KEY (`livro_id`) REFERENCES `livro` (`id_livro`) ON DELETE CASCADE;

--
-- Restrições para tabelas `livro`
--
ALTER TABLE `livro`
  ADD CONSTRAINT `livro_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
