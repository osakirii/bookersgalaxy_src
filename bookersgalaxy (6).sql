-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14/11/2024 às 14:44
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
(9, 'carrossel2.png', 'img/67366f12d3d31.png', '2024-11-14 18:43:46');

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

INSERT INTO `clientes` (`id_usuario`, `nome_completo`, `nome_usuario`, `email`, `senha`, `telefone`, `CPF`, `biografia`, `fotoPerfil`) VALUES
(1, 'teste', 'teste', 'teste@gmail.com', '$2y$10$M5QXjNHRJCTvzAnjgEtFFuRo.EGPiF0GJONxCAizovBRK6YlD7rTK', '(12) 31231-3131', '123.123.131', '', ''),
(8, 'Cleyton da Silva Rodrigues', 'fan_rodoviario', 'fanrodoviario7721@gmail.com', '$2y$10$MqxW9aAcwhXmFWJ/keGOy.prGyPmLFl2mdCYg.tZsZrHtlMuYyxZa', '(11) 98057-3422', '21312313123', '', ''),
(9, 'João Pereira da Silva', 'joaosilva123', 'joao.pereira@example.com', '$2y$10$G8XKX5Iw7PdGMNA4V7W9RuiEKzgXpzn/HFypORUFou4ixHUHwdiRO', '(11) 98765-4321', '123.456.789', '', ''),
(10, 'Maria Oliveira ', 'mariaoliveira456', ' maria.santos@example.com', '$2y$10$vxCvqz7tcNYzPe.lvbkEw.bnaIH.BicxXLSmQ2J3ZfUu6S2Uf7vzq', '(21) 99876-5432', '987.654.321', '', '');

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
(3, 'DARKSIDE BOOKS', 'Brasil', 'atendimento@darksidebooks.com', '1111111111111', ' 35.503.303/0003-7');

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
(3, 3, 'principal', 'Estrada da Capela Velha', '46', 'Nova Itapevi', '06690-280', 'SP', 'Itapevi');

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
(68, 'Saboroso Cadáver ', 'Agustina Bazterrica', '2022-07-05', 192, 'Diz o antigo ditado que “Você é o que você come”. No romance Saboroso Cadáver, de Agustina Bazterrica, esse ditado é levado às últimas consequências. O livro conta a história de um vírus que se espalha entre os animais de todo o planeta e torna sua carne mortal aos humanos. Impossibilitados de utilizar os animais para a alimentação, a sociedade regulariza a criação e a reprodução de seres humanos como animais de abate, transformando o mundo num lugar cinzento, cínico e inóspito. Nesse romance visceral, grotesco, repleto de descrições vívidas e nauseantes capaz de nos alimentar na medida certa, vamos acompanhar a rotina de Marcos Tejo, funcionário do frigorífico Krieg,, que recebe de presente uma mulher viva, considerada “carne de primeira”. Ironicamente, esse funcionário parece ser o mais humano nesse mundo terrível. Seguindo seus passos, presenciamos o processo metódico da criação de pessoas, abates, experimentos de laboratório, caçadas humanas e suntuosos jantares canibais. Publicado originalmente em 2017, Saboroso Cadáver ganhou o Prêmio Clarín Novela naquele mesmo ano, na Argentina. Três anos depois, a tradução americana do livro recebeu o Ladies of Horror Fiction Award como melhor romance de 2020. Além disso, de acordo com o jornal Washington Post, foi um dos melhores lançamentos de horror, ficção científica e fantasia de 2020, ao lado de Temporada de Caça, de Stephen Graham Jones. Uma das pessoas que participaram da seleção foi ninguém menos que Silvia Moreno-Garcia, autora de Gótico Mexicano (DarkSide® Books, 2021), sucesso entre os darksiders. Bazterrica afirmou que “escrever é uma experiência feroz e minha intenção é tirar o leitor dessa letargia em que vivemos e em que, muitas vezes, a violência é naturalizada”. Distopia arrepiante, Saboroso Cadáver imagina um mundo em que a violência e o canibalismo são de fato naturalizados, embora ainda haja espaço para a compaixão, a solidariedade e o cuidado com os outros, enquanto a batalha pela sobrevivência se torna uma aventura de desfecho incerto. Com seu romance marcante e poderoso, Bazterrica nos coloca dentro de um pesadelo em que o canibalismo se legitima na maior parte do mundo e a sociedade fica dividida entre aqueles que comem e aqueles que são comidos. Haveria caminhos para a humanidade, quando os corpos dos mortos são cremados para evitar que sejam devorados? Quais as relações passíveis de serem forjadas, quando na verdade somos o que comemos? Saboroso Cadáver é um prato raro, uma iguaria literária impiedosa, alegórica e realista, agridoce e suculenta, capaz de alimentar de ternura os corações literários que ainda pulsam diante da beleza do horror.', 45.90, '978-65-5598-188-9', 1, 3);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `editora`
--
ALTER TABLE `editora`
  MODIFY `id_editora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
