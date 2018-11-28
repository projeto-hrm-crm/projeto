-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20-Out-2018 às 16:46
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projeto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `almoxarifado`
--

CREATE TABLE `almoxarifado` (
  `id_almoxarifado` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `valor` varchar(15) DEFAULT NULL,
  `quantidade` int(11) NOT NULL,
  `recebimento` date NOT NULL,
  `id_unidade_medida` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `andamento`
--

CREATE TABLE `andamento` (
  `id_andamento` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `situacao` enum('AP','PG','AE','EV','ET','CC','RB','ER','PA') NOT NULL DEFAULT 'PA',
  `id_pedido` int(11) NOT NULL,
  `atual` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `id_avaliacao` int(11) NOT NULL,
  `pontualidade` int(11) DEFAULT NULL,
  `comprometimento` int(11) DEFAULT NULL,
  `produtividade` int(11) DEFAULT NULL,
  `relacao_interpessoal` int(11) DEFAULT NULL,
  `proatividade` int(11) DEFAULT NULL,
  `id_funcionario` int(11) DEFAULT NULL,
  `id_avaliador` int(11) DEFAULT NULL,
  `data_avaliacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `candidato`
--

CREATE TABLE `candidato` (
  `id_candidato` int(10) UNSIGNED NOT NULL,
  `id_pessoa` int(11) NOT NULL,
  `curriculum` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(45) NOT NULL,
  `salario` varchar(11) NOT NULL,
  `id_setor` int(11) NOT NULL,
  `carga_horaria_semanal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `id_pessoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `id_pessoa`) VALUES
(2, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `documento`
--

CREATE TABLE `documento` (
  `id_documento` int(11) NOT NULL,
  `numero` varchar(45) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `id_pessoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `documento`
--

INSERT INTO `documento` (`id_documento`, `numero`, `tipo`, `id_pessoa`) VALUES
(3, '454.367.328-01', 'cpf', 6),
(4, '454.367.328-01', 'cpf', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nome`) VALUES
(1, 'empresa do sucesso');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa_modulo`
--

CREATE TABLE `empresa_modulo` (
  `id_empresa` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `empresa_modulo`
--

INSERT INTO `empresa_modulo` (`id_empresa`, `id_modulo`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id_endereco` int(11) NOT NULL,
  `cep` varchar(11) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `logradouro` varchar(45) NOT NULL,
  `numero` varchar(45) NOT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `id_pessoa` int(11) DEFAULT NULL,
  `cidade` varchar(150) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id_endereco`, `cep`, `bairro`, `logradouro`, `numero`, `complemento`, `id_pessoa`, `cidade`, `estado`) VALUES
(3, '11665-320', 'Indaiá', 'Rua Saturnino Mariano Nepomuceno', '652', '', 6, 'Caraguatatuba', 'SP'),
(4, '11665-320', 'Indaiá', 'Rua Saturnino Mariano Nepomuceno', '652', '', 7, 'Caraguatatuba', 'SP');

-- --------------------------------------------------------

--
-- Estrutura da tabela `etapa`
--

CREATE TABLE `etapa` (
  `id_etapa` int(10) UNSIGNED NOT NULL,
  `nome` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descricao` longtext NOT NULL,
  `status` tinyint(4) NOT NULL,
  `id_processo_seletivo` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE `evento` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `inicio` datetime NOT NULL,
  `fim` datetime NOT NULL,
  `cor` varchar(7) NOT NULL,
  `criado_por` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `id_fornecedor` int(11) NOT NULL,
  `id_pessoa_juridica` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id_funcionario` int(11) NOT NULL,
  `id_pessoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo_acesso`
--

CREATE TABLE `grupo_acesso` (
  `id_grupo_acesso` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `grupo_acesso`
--

INSERT INTO `grupo_acesso` (`id_grupo_acesso`, `nome`) VALUES
(1, 'admin'),
(2, 'teste'),
(3, 'fornecedor'),
(4, 'cliente'),
(5, 'candidato'),
(6, 'funcionario');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo_acesso_modulo`
--

CREATE TABLE `grupo_acesso_modulo` (
  `id_grupo_acesso_modulo` int(11) NOT NULL,
  `id_grupo_acesso` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `grupo_acesso_modulo`
--

INSERT INTO `grupo_acesso_modulo` (`id_grupo_acesso_modulo`, `id_grupo_acesso`, `id_modulo`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `iteracao`
--

CREATE TABLE `iteracao` (
  `id_iteracao` int(11) NOT NULL,
  `mensagem` varchar(45) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_sac` int(11) NOT NULL,
  `id_pessoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `log`
--

CREATE TABLE `log` (
  `id_log` int(11) UNSIGNED NOT NULL,
  `id_usuario` varchar(45) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `acao` varchar(45) NOT NULL,
  `descricao` varchar(45) NOT NULL,
  `data` date NOT NULL,
  `tabela` varchar(45) NOT NULL,
  `item_editado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `log`
--

INSERT INTO `log` (`id_log`, `id_usuario`, `tipo`, `acao`, `descricao`, `data`, `tabela`, `item_editado`) VALUES
(43, '2', 'insert', 'Inserir', 'admin Inseriu a pessoa 3', '2018-10-10', 'Pessoa', '3'),
(44, '2', 'insert', 'Inserir', 'admin Inseriu a pessoa 4', '2018-10-10', 'Pessoa', '4'),
(45, '2', 'insert', 'Inserir', 'admin Inseriu a pessoa 5', '2018-10-10', 'Pessoa', '5'),
(46, '2', 'insert', 'Inserir', 'admin Inseriu a pessoa 6', '2018-10-10', 'Pessoa', '6'),
(47, '2', 'insert', 'Inserir', 'admin Inseriu o endereço 3', '2018-10-10', 'Endereco', '3'),
(48, '2', 'insert', 'Inserir', 'admin Inseriu o documento 3', '2018-10-10', 'Documento', '3'),
(49, '2', 'insert', 'Inserir', 'admin Inseriu o telefone 3', '2018-10-10', 'Telefone', '3'),
(50, '2', 'insert', 'Inserir', 'admin Inseriu a pessoa fisica 2', '2018-10-10', 'Pessoa_fisica', '2'),
(51, '2', 'insert', 'Inserir', 'admin Inseriu o cliente 1', '2018-10-10', 'Cliente', '1'),
(52, '2', 'delete', 'Deletar', 'admin Deletou o cliente 1', '2018-10-10', 'Cliente', '1'),
(53, '2', 'insert', 'Inserir', 'admin Inseriu a pessoa 7', '2018-10-10', 'Pessoa', '7'),
(54, '2', 'insert', 'Inserir', 'admin Inseriu o endereço 4', '2018-10-10', 'Endereco', '4'),
(55, '2', 'insert', 'Inserir', 'admin Inseriu o documento 4', '2018-10-10', 'Documento', '4'),
(56, '2', 'insert', 'Inserir', 'admin Inseriu o telefone 4', '2018-10-10', 'Telefone', '4'),
(57, '2', 'insert', 'Inserir', 'admin Inseriu a pessoa fisica 3', '2018-10-10', 'Pessoa_fisica', '3'),
(58, '2', 'insert', 'Inserir', 'admin Inseriu o cliente 2', '2018-10-10', 'Cliente', '2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `id_sub_menu` int(11) NOT NULL,
  `id_sub_modulo` int(11) NOT NULL,
  `link` varchar(100) NOT NULL,
  `icone` varchar(100) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `menu`
--

INSERT INTO `menu` (`id_menu`, `id_sub_menu`, `id_sub_modulo`, `link`, `icone`, `status`) VALUES
(1, 1, 1, 'produto/cadastrar', 'fa fa-plus', 0),
(2, 3, 1, 'produto', 'fa fa-list', 1),
(3, 1, 2, 'cliente/cadastrar', 'fa fa-plus', 0),
(4, 3, 2, 'cliente', 'fa fa-list', 1),
(5, 1, 3, 'candidato/cadastrar', 'fa fa-plus', 0),
(6, 3, 3, 'candidato', 'fa fa-list', 1),
(7, 1, 4, 'fornecedor/cadastrar', 'fa fa-plus', 0),
(8, 3, 4, 'fornecedor', 'fa fa-list', 1),
(9, 1, 5, 'funcionario/cadastrar', 'fa fa-plus', 0),
(10, 3, 5, 'funcionario', 'fa fa-list', 1),
(11, 1, 6, 'cargo/cadastrar', 'fa fa-plus', 0),
(12, 3, 6, 'cargo', 'fa fa-list', 1),
(13, 1, 7, 'setor/cadastrar', 'fa fa-plus', 0),
(14, 3, 7, 'setor', 'fa fa-list', 1),
(15, 1, 8, 'sac/cadastrar', 'fa fa-plus', 0),
(16, 3, 8, 'sac', 'fa fa-list', 1),
(17, 2, 1, 'produto/editar', NULL, 0),
(18, 2, 2, 'cliente/editar', NULL, 0),
(19, 2, 3, 'candidato/editar', NULL, 0),
(20, 2, 4, 'fornecedor/editar', NULL, 0),
(21, 2, 5, 'funcionario/editar', NULL, 0),
(22, 2, 6, 'cargo/editar', NULL, 0),
(23, 2, 7, 'setor/editar', NULL, 0),
(24, 2, 8, 'sac/editar', NULL, 0),
(25, 1, 9, 'vaga/cadastrar', 'fa fa-plus', 0),
(26, 3, 9, 'vaga', 'fa fa-list', 1),
(27, 2, 9, 'vaga/editar', NULL, 0),
(28, 4, 1, 'produto/excluir', NULL, 0),
(29, 4, 2, 'cliente/excluir', NULL, 0),
(30, 4, 3, 'candidato/excluir', NULL, 0),
(31, 4, 4, 'fornecedor/excluir', NULL, 0),
(32, 4, 5, 'funcionario/excluir', NULL, 0),
(33, 4, 6, 'cargo/excluir', NULL, 0),
(34, 4, 7, 'setor/excluir', NULL, 0),
(35, 4, 8, 'sac/excluir', NULL, 0),
(36, 4, 9, 'vaga/excluir', NULL, 0),
(37, 1, 10, 'processo_seletivo/cadastrar', 'fa fa-plus', 0),
(39, 1, 12, 'pedido/cadastrar', 'fa fa-plus', 0),
(40, 3, 10, 'processo_seletivo', 'fa fa-list', 1),
(41, 3, 11, 'candidato_etapa', 'fa fa-list', 1),
(42, 3, 12, 'pedido', 'fa fa-list', 1),
(43, 4, 10, 'processo_seletivo/excluir', NULL, 0),
(44, 4, 11, 'candidato_etapa/excluir', NULL, 0),
(45, 4, 12, 'pedido/excluir', NULL, 0),
(46, 5, 10, 'processo_seletivo/info', 'fa fa-info', 0),
(47, 2, 10, 'processo_seletivo/editar', NULL, 0),
(48, 2, 11, 'candidato_etapa/editar', NULL, 0),
(49, 2, 12, 'pedido/editar', NULL, 0),
(50, 3, 13, 'processo_seletivo/', NULL, 1),
(51, 3, 14, 'sugestao', 'fa fa-list', 1),
(52, 1, 15, 'agenda/cadastrar', 'fa fa-plus', 0),
(53, 3, 15, 'agenda', 'fa fa-list', 1),
(54, 1, 16, 'almoxarifado/cadastrar', 'fa fa-plus', 0),
(55, 3, 16, 'almoxarifado', 'fa fa-list', 1),
(56, 2, 16, 'almoxarifado/editar', NULL, 0),
(57, 4, 16, 'almoxarifado/excluir', NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulo`
--

CREATE TABLE `modulo` (
  `id_modulo` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `modulo`
--

INSERT INTO `modulo` (`id_modulo`, `nome`) VALUES
(1, 'CRM'),
(2, 'HRM');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacao`
--

CREATE TABLE `notificacao` (
  `id_notificacao` int(11) NOT NULL,
  `emissor_id` int(11) DEFAULT NULL,
  `destinatario_id` int(11) NOT NULL,
  `criacao` datetime NOT NULL,
  `view` tinyint(1) NOT NULL,
  `notificacao` longtext NOT NULL,
  `link` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `notificacao`
--

INSERT INTO `notificacao` (`id_notificacao`, `emissor_id`, `destinatario_id`, `criacao`, `view`, `notificacao`, `link`) VALUES
(1, NULL, 2, '2018-10-10 19:53:54', 1, 'Um novo usuário foi inserido', 'http://localhost/projeto/cliente/editar/1'),
(2, NULL, 2, '2018-10-10 20:17:46', 1, 'Um novo usuário foi inserido', 'http://localhost/projeto/cliente/editar/2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_pessoa` int(11) NOT NULL,
  `descricao` varchar(45) NOT NULL,
  `tipo` enum('p','s','ps') NOT NULL,
  `transacao` enum('V','C') NOT NULL DEFAULT 'C'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_produto`
--

CREATE TABLE `pedido_produto` (
  `id_pedido` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissao`
--

CREATE TABLE `permissao` (
  `id_permissao` int(11) NOT NULL,
  `id_grupo_acesso_modulo` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `permissao`
--

INSERT INTO `permissao` (`id_permissao`, `id_grupo_acesso_modulo`, `id_menu`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 5),
(5, 1, 7),
(6, 1, 9),
(7, 1, 11),
(8, 1, 13),
(9, 1, 15),
(10, 1, 25),
(11, 1, 37),
(12, 1, 39),
(13, 1, 52),
(14, 1, 54),
(15, 1, 17),
(16, 1, 18),
(17, 1, 19),
(18, 1, 20),
(19, 1, 21),
(20, 1, 22),
(21, 1, 23),
(22, 1, 24),
(23, 1, 27),
(24, 1, 47),
(25, 1, 48),
(26, 1, 49),
(27, 1, 56),
(28, 1, 28),
(29, 1, 29),
(30, 1, 30),
(31, 1, 31),
(32, 1, 32),
(33, 1, 33),
(34, 1, 34),
(35, 1, 35),
(36, 1, 36),
(37, 1, 43),
(38, 1, 44),
(39, 1, 45),
(40, 1, 57),
(41, 2, 3),
(42, 2, 4),
(43, 2, 6),
(44, 2, 8),
(45, 2, 10),
(46, 2, 12),
(47, 2, 14),
(48, 2, 16),
(49, 2, 26),
(50, 2, 40),
(51, 2, 41),
(52, 2, 42),
(53, 2, 50),
(54, 2, 51),
(55, 2, 53),
(56, 2, 55),
(57, 2, 46);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `id_pessoa` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `data_criacao` date DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`id_pessoa`, `nome`, `email`, `data_criacao`, `imagem`) VALUES
(1, 'admin', 'admin@teste.com', '2018-10-07', NULL),
(2, 'teste', 'teste@teste.com', '2018-10-07', NULL),
(3, 'Frodo Baggins', 'frodobaggins@terramedia.com', '2018-10-10', NULL),
(4, 'Frodo Baggins', 'frodobaggins@terramedia.com', '2018-10-10', NULL),
(5, 'Frodo Baggins', 'frodobaggins@terramedia.com', '2018-10-10', NULL),
(6, 'Frodo Baggins', 'frodobaggins@terramedia.com', '2018-10-10', NULL),
(7, 'Pedro Henrique Guimarães', 'pedroguimaraes.contato@gmail.com', '2018-10-10', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa_fisica`
--

CREATE TABLE `pessoa_fisica` (
  `id_pessoa_fisica` int(11) NOT NULL,
  `id_pessoa` int(11) NOT NULL,
  `data_nascimento` date NOT NULL,
  `sexo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pessoa_fisica`
--

INSERT INTO `pessoa_fisica` (`id_pessoa_fisica`, `id_pessoa`, `data_nascimento`, `sexo`) VALUES
(2, 6, '1996-03-22', 0),
(3, 7, '1996-03-22', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa_juridica`
--

CREATE TABLE `pessoa_juridica` (
  `id_pessoa_juridica` int(11) NOT NULL,
  `id_pessoa` int(11) NOT NULL,
  `razao_social` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `processo_seletivo`
--

CREATE TABLE `processo_seletivo` (
  `id_processo_seletivo` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `descricao` longtext COLLATE utf8_unicode_ci NOT NULL,
  `id_vaga` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `processo_seletivo_candidato`
--

CREATE TABLE `processo_seletivo_candidato` (
  `id_candidato` int(11) UNSIGNED NOT NULL,
  `id_etapa` int(11) UNSIGNED NOT NULL,
  `avaliacao` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `fabricacao` date NOT NULL,
  `validade` date NOT NULL,
  `lote` varchar(45) NOT NULL,
  `recebimento` date NOT NULL,
  `id_fornecedor` int(11) NOT NULL,
  `valor` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `regiao`
--

CREATE TABLE `regiao` (
  `id_regiao` int(10) UNSIGNED NOT NULL,
  `regiao` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sac`
--

CREATE TABLE `sac` (
  `id_sac` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `descricao` longtext NOT NULL,
  `abertura` timestamp NULL DEFAULT NULL,
  `fechamento` timestamp NULL DEFAULT NULL,
  `encerrado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `setor`
--

CREATE TABLE `setor` (
  `id_setor` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sub_menu`
--

CREATE TABLE `sub_menu` (
  `id_sub_menu` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sub_menu`
--

INSERT INTO `sub_menu` (`id_sub_menu`, `nome`) VALUES
(1, 'Cadastrar'),
(2, 'Editar'),
(3, 'Listar'),
(4, 'Excluir');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sub_modulo`
--

CREATE TABLE `sub_modulo` (
  `id_sub_modulo` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `icone` varchar(45) NOT NULL,
  `id_modulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sub_modulo`
--

INSERT INTO `sub_modulo` (`id_sub_modulo`, `nome`, `icone`, `id_modulo`) VALUES
(1, 'Produto', 'fa fa-gift', 1),
(2, 'Cliente', 'fa fa-user', 1),
(3, 'Candidato', 'fa fa-address-book', 2),
(4, 'Fornecedor', 'fa fa-truck', 1),
(5, 'Funcionario', 'fa fa-address-card', 2),
(6, 'Cargo', 'fa fa-briefcase', 2),
(7, 'Setor', 'fa fa-building', 2),
(8, 'SAC', 'fa fa-phone-square', 1),
(9, 'Vaga', 'fa fa-newspaper-o', 2),
(10, 'Processo Seletivo', 'fa fa-address-card', 2),
(11, 'Candidato Etapa', 'fa fa-bars', 2),
(12, 'Pedido', 'fa fa-archive', 1),
(13, 'Processos Seletivos', 'fa fa-newspaper-o', 2),
(14, 'Sugestão', 'fa fa-bullhorn', 1),
(15, 'Agenda', 'fa fa-calendar', 1),
(16, 'Almoxarifado', 'fa fa-shopping-cart', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sugestao`
--

CREATE TABLE `sugestao` (
  `id_sugestao` int(11) NOT NULL,
  `sugestao` text NOT NULL,
  `criacao` datetime NOT NULL,
  `id_pessoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone`
--

CREATE TABLE `telefone` (
  `id_telefone` int(11) NOT NULL,
  `numero` varchar(45) NOT NULL,
  `id_pessoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `telefone`
--

INSERT INTO `telefone` (`id_telefone`, `numero`, `id_pessoa`) VALUES
(3, '(25) 78821-7978', 6),
(4, '(12) 98822-6244', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade_medida`
--

CREATE TABLE `unidade_medida` (
  `id_unidade_medida` int(11) NOT NULL,
  `medida` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `login` varchar(45) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `id_grupo_acesso` int(11) NOT NULL,
  `id_pessoa` int(11) DEFAULT NULL,
  `empresa_id_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `login`, `senha`, `id_grupo_acesso`, `id_pessoa`, `empresa_id_empresa`) VALUES
(2, 'admin@admin.com', '8C6976E5B5410415BDE908BD4DEE15DFB167A9C873FC4BB8A81F6F2AB448A918', 1, 1, 1),
(3, 'teste@teste.com', '46070D4BF934FB0D4B06D9E2C46E346944E322444900A435D7D9A95E6D7435F5', 4, 2, 1),
(24, 'frodobaggins@terramedia.com', '2ebb58b60248d56c3ac1d9d675366ca55ebd920a1a536d2009ead64434051411', 4, 6, 1),
(25, 'pedroguimaraes.contato@gmail.com', 'e4d92076998a7b8a3f3e4aaee8e3b88fbd26497ebc4652dc6562984324a32d36', 4, 7, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vaga`
--

CREATE TABLE `vaga` (
  `id_vaga` int(11) NOT NULL,
  `data_oferta` date NOT NULL,
  `quantidade` int(11) NOT NULL,
  `requisitos` longtext NOT NULL,
  `id_cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `almoxarifado`
--
ALTER TABLE `almoxarifado`
  ADD PRIMARY KEY (`id_almoxarifado`),
  ADD KEY `fk_almoxarifado_unidade_medida_idx` (`id_unidade_medida`);

--
-- Indexes for table `andamento`
--
ALTER TABLE `andamento`
  ADD PRIMARY KEY (`id_andamento`),
  ADD KEY `fk_andamento_pedido1_idx` (`id_pedido`);

--
-- Indexes for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`id_avaliacao`),
  ADD KEY `fk_funcionario` (`id_funcionario`),
  ADD KEY `fk_avaliador` (`id_avaliador`);

--
-- Indexes for table `candidato`
--
ALTER TABLE `candidato`
  ADD PRIMARY KEY (`id_candidato`),
  ADD KEY `fk_candidato_pessoa_fisica1_idx` (`id_pessoa`);

--
-- Indexes for table `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id_cargo`),
  ADD KEY `fk_cargo_setor1_idx` (`id_setor`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `fk_cliente_pessoa_fisica1_idx` (`id_pessoa`);

--
-- Indexes for table `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`id_documento`),
  ADD KEY `fk_documento_pessoa1_idx` (`id_pessoa`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indexes for table `empresa_modulo`
--
ALTER TABLE `empresa_modulo`
  ADD PRIMARY KEY (`id_empresa`,`id_modulo`),
  ADD KEY `fk_empresa_has_modulo_modulo1_idx` (`id_modulo`),
  ADD KEY `fk_empresa_has_modulo_empresa_idx` (`id_empresa`);

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_endereco`);

--
-- Indexes for table `etapa`
--
ALTER TABLE `etapa`
  ADD PRIMARY KEY (`id_etapa`),
  ADD KEY `fk_etapa_processo_seletivo1_idx` (`id_processo_seletivo`);

--
-- Indexes for table `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_evento_has_usuario_idx` (`criado_por`);

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id_fornecedor`),
  ADD KEY `fk_fornecedor_pessoa_juridica1_idx` (`id_pessoa_juridica`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD KEY `fk_funcionario_pessoa_fisica1_idx` (`id_pessoa`);

--
-- Indexes for table `grupo_acesso`
--
ALTER TABLE `grupo_acesso`
  ADD PRIMARY KEY (`id_grupo_acesso`);

--
-- Indexes for table `grupo_acesso_modulo`
--
ALTER TABLE `grupo_acesso_modulo`
  ADD PRIMARY KEY (`id_grupo_acesso_modulo`),
  ADD KEY `fk_grupo_acesso_has_modulo_modulo1_idx` (`id_modulo`),
  ADD KEY `fk_grupo_acesso_has_modulo_grupo_acesso1_idx` (`id_grupo_acesso`);

--
-- Indexes for table `iteracao`
--
ALTER TABLE `iteracao`
  ADD PRIMARY KEY (`id_iteracao`),
  ADD KEY `fk_iteracao_sac1_idx` (`id_sac`),
  ADD KEY `fk_iteracao_pessoa_idx` (`id_pessoa`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `fk_sub_menu_has_modulo_sub_menu1_idx` (`id_sub_menu`),
  ADD KEY `fk_menu_sub_modulo1_idx` (`id_sub_modulo`);

--
-- Indexes for table `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`id_modulo`);

--
-- Indexes for table `notificacao`
--
ALTER TABLE `notificacao`
  ADD PRIMARY KEY (`id_notificacao`),
  ADD KEY `emissor_id_pessoa_idx` (`emissor_id`),
  ADD KEY `destinatario_id_pessoa_idx` (`destinatario_id`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_cliente_idx` (`id_pessoa`);

--
-- Indexes for table `pedido_produto`
--
ALTER TABLE `pedido_produto`
  ADD PRIMARY KEY (`id_pedido`,`id_produto`),
  ADD KEY `fk_pedido_has_produto_produto1_idx` (`id_produto`),
  ADD KEY `fk_pedido_has_produto_pedido1_idx` (`id_pedido`);

--
-- Indexes for table `permissao`
--
ALTER TABLE `permissao`
  ADD PRIMARY KEY (`id_permissao`),
  ADD KEY `fk_grupo_acesso_modulo_has_menu_menu1_idx` (`id_menu`),
  ADD KEY `fk_grupo_acesso_modulo_has_menu_grupo_acesso_modulo1_idx` (`id_grupo_acesso_modulo`);

--
-- Indexes for table `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id_pessoa`);

--
-- Indexes for table `pessoa_fisica`
--
ALTER TABLE `pessoa_fisica`
  ADD PRIMARY KEY (`id_pessoa_fisica`,`id_pessoa`),
  ADD KEY `fk_pessoa_fisica_pessoa1_idx` (`id_pessoa`);

--
-- Indexes for table `pessoa_juridica`
--
ALTER TABLE `pessoa_juridica`
  ADD PRIMARY KEY (`id_pessoa_juridica`),
  ADD KEY `fk_pessoa_juridica_pessoa1_idx` (`id_pessoa`);

--
-- Indexes for table `processo_seletivo`
--
ALTER TABLE `processo_seletivo`
  ADD PRIMARY KEY (`id_processo_seletivo`),
  ADD KEY `fk_processo_seletivo_vaga1_idx` (`id_vaga`),
  ADD KEY `fk_processo_seletivo_usuario1_idx` (`id_usuario`);

--
-- Indexes for table `processo_seletivo_candidato`
--
ALTER TABLE `processo_seletivo_candidato`
  ADD PRIMARY KEY (`id_candidato`,`id_etapa`),
  ADD KEY `fk_processo_seletivo_has_candidato_candidato1_idx` (`id_candidato`),
  ADD KEY `fk_processo_seletivo_candidato_etapa1_idx` (`id_etapa`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `id_fornecedor_idx` (`id_fornecedor`);

--
-- Indexes for table `regiao`
--
ALTER TABLE `regiao`
  ADD PRIMARY KEY (`id_regiao`);

--
-- Indexes for table `sac`
--
ALTER TABLE `sac`
  ADD PRIMARY KEY (`id_sac`),
  ADD KEY `fk_sac_produto1_idx` (`id_produto`),
  ADD KEY `fk_sac_cliente1_idx` (`id_cliente`);

--
-- Indexes for table `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`id_setor`);

--
-- Indexes for table `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`id_sub_menu`);

--
-- Indexes for table `sub_modulo`
--
ALTER TABLE `sub_modulo`
  ADD PRIMARY KEY (`id_sub_modulo`),
  ADD KEY `fk_sub_modulo_modulo1_idx` (`id_modulo`);

--
-- Indexes for table `sugestao`
--
ALTER TABLE `sugestao`
  ADD PRIMARY KEY (`id_sugestao`),
  ADD KEY `sugestao_pessoa_idx` (`id_pessoa`);

--
-- Indexes for table `telefone`
--
ALTER TABLE `telefone`
  ADD PRIMARY KEY (`id_telefone`),
  ADD KEY `fk_telefone_pessoa1_idx` (`id_pessoa`);

--
-- Indexes for table `unidade_medida`
--
ALTER TABLE `unidade_medida`
  ADD PRIMARY KEY (`id_unidade_medida`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_usuario_grupo_acesso1_idx` (`id_grupo_acesso`),
  ADD KEY `fk_usuario_pessoa1_idx` (`id_pessoa`),
  ADD KEY `fk_usuario_empresa1_idx` (`empresa_id_empresa`);

--
-- Indexes for table `vaga`
--
ALTER TABLE `vaga`
  ADD PRIMARY KEY (`id_vaga`),
  ADD KEY `fk_vaga_cargo1_idx` (`id_cargo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `almoxarifado`
--
ALTER TABLE `almoxarifado`
  MODIFY `id_almoxarifado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `andamento`
--
ALTER TABLE `andamento`
  MODIFY `id_andamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `id_avaliacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `candidato`
--
ALTER TABLE `candidato`
  MODIFY `id_candidato` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `documento`
--
ALTER TABLE `documento`
  MODIFY `id_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `etapa`
--
ALTER TABLE `etapa`
  MODIFY `id_etapa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evento`
--
ALTER TABLE `evento`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grupo_acesso`
--
ALTER TABLE `grupo_acesso`
  MODIFY `id_grupo_acesso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `grupo_acesso_modulo`
--
ALTER TABLE `grupo_acesso_modulo`
  MODIFY `id_grupo_acesso_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `iteracao`
--
ALTER TABLE `iteracao`
  MODIFY `id_iteracao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `modulo`
--
ALTER TABLE `modulo`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notificacao`
--
ALTER TABLE `notificacao`
  MODIFY `id_notificacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissao`
--
ALTER TABLE `permissao`
  MODIFY `id_permissao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id_pessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pessoa_fisica`
--
ALTER TABLE `pessoa_fisica`
  MODIFY `id_pessoa_fisica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pessoa_juridica`
--
ALTER TABLE `pessoa_juridica`
  MODIFY `id_pessoa_juridica` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `processo_seletivo`
--
ALTER TABLE `processo_seletivo`
  MODIFY `id_processo_seletivo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regiao`
--
ALTER TABLE `regiao`
  MODIFY `id_regiao` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sac`
--
ALTER TABLE `sac`
  MODIFY `id_sac` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setor`
--
ALTER TABLE `setor`
  MODIFY `id_setor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `id_sub_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_modulo`
--
ALTER TABLE `sub_modulo`
  MODIFY `id_sub_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sugestao`
--
ALTER TABLE `sugestao`
  MODIFY `id_sugestao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `telefone`
--
ALTER TABLE `telefone`
  MODIFY `id_telefone` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `unidade_medida`
--
ALTER TABLE `unidade_medida`
  MODIFY `id_unidade_medida` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `vaga`
--
ALTER TABLE `vaga`
  MODIFY `id_vaga` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `almoxarifado`
--
ALTER TABLE `almoxarifado`
  ADD CONSTRAINT `fk_almoxarifado_unidade_medida` FOREIGN KEY (`id_unidade_medida`) REFERENCES `unidade_medida` (`id_unidade_medida`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `andamento`
--
ALTER TABLE `andamento`
  ADD CONSTRAINT `fk_andamento_pedido1` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `fk_avaliador` FOREIGN KEY (`id_avaliador`) REFERENCES `pessoa` (`id_pessoa`),
  ADD CONSTRAINT `fk_funcionario` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`);

--
-- Limitadores para a tabela `candidato`
--
ALTER TABLE `candidato`
  ADD CONSTRAINT `fk_candidato_pessoa_fisica1` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa_fisica` (`id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `cargo`
--
ALTER TABLE `cargo`
  ADD CONSTRAINT `fk_cargo_setor1` FOREIGN KEY (`id_setor`) REFERENCES `setor` (`id_setor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cliente_pessoa_fisica1` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa_fisica` (`id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `documento`
--
ALTER TABLE `documento`
  ADD CONSTRAINT `fk_documento_pessoa1` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `empresa_modulo`
--
ALTER TABLE `empresa_modulo`
  ADD CONSTRAINT `fk_empresa_has_modulo_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_empresa_has_modulo_modulo1` FOREIGN KEY (`id_modulo`) REFERENCES `modulo` (`id_modulo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `etapa`
--
ALTER TABLE `etapa`
  ADD CONSTRAINT `fk_etapa_processo_seletivo1` FOREIGN KEY (`id_processo_seletivo`) REFERENCES `processo_seletivo` (`id_processo_seletivo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `fk_evento_has_usuario` FOREIGN KEY (`criado_por`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD CONSTRAINT `fk_fornecedor_pessoa_juridica1` FOREIGN KEY (`id_pessoa_juridica`) REFERENCES `pessoa_juridica` (`id_pessoa_juridica`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `fk_funcionario_pessoa_fisica1` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa_fisica` (`id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `grupo_acesso_modulo`
--
ALTER TABLE `grupo_acesso_modulo`
  ADD CONSTRAINT `fk_grupo_acesso_has_modulo_grupo_acesso1` FOREIGN KEY (`id_grupo_acesso`) REFERENCES `grupo_acesso` (`id_grupo_acesso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_grupo_acesso_has_modulo_modulo1` FOREIGN KEY (`id_modulo`) REFERENCES `modulo` (`id_modulo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `iteracao`
--
ALTER TABLE `iteracao`
  ADD CONSTRAINT `fk_iteracao_pessoa` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_iteracao_sac1` FOREIGN KEY (`id_sac`) REFERENCES `sac` (`id_sac`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `fk_menu_sub_modulo1` FOREIGN KEY (`id_sub_modulo`) REFERENCES `sub_modulo` (`id_sub_modulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sub_menu_has_modulo_sub_menu1` FOREIGN KEY (`id_sub_menu`) REFERENCES `sub_menu` (`id_sub_menu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `notificacao`
--
ALTER TABLE `notificacao`
  ADD CONSTRAINT `destinatario_id_pessoa` FOREIGN KEY (`destinatario_id`) REFERENCES `pessoa` (`id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `emissor_id_pessoa` FOREIGN KEY (`emissor_id`) REFERENCES `pessoa` (`id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `id_pessoa` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pedido_produto`
--
ALTER TABLE `pedido_produto`
  ADD CONSTRAINT `fk_pedido_has_produto_pedido1` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedido_has_produto_produto1` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `permissao`
--
ALTER TABLE `permissao`
  ADD CONSTRAINT `fk_grupo_acesso_modulo_has_menu_grupo_acesso_modulo1` FOREIGN KEY (`id_grupo_acesso_modulo`) REFERENCES `grupo_acesso_modulo` (`id_grupo_acesso_modulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_grupo_acesso_modulo_has_menu_menu1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pessoa_juridica`
--
ALTER TABLE `pessoa_juridica`
  ADD CONSTRAINT `fk_pessoa_juridica_pessoa1` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `processo_seletivo`
--
ALTER TABLE `processo_seletivo`
  ADD CONSTRAINT `fk_processo_seletivo_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_processo_seletivo_vaga1` FOREIGN KEY (`id_vaga`) REFERENCES `vaga` (`id_vaga`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `processo_seletivo_candidato`
--
ALTER TABLE `processo_seletivo_candidato`
  ADD CONSTRAINT `fk_processo_seletivo_candidato_etapa1` FOREIGN KEY (`id_etapa`) REFERENCES `etapa` (`id_etapa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_processo_seletivo_has_candidato_candidato1` FOREIGN KEY (`id_candidato`) REFERENCES `candidato` (`id_candidato`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `id_fornecedor` FOREIGN KEY (`id_fornecedor`) REFERENCES `fornecedor` (`id_fornecedor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `sac`
--
ALTER TABLE `sac`
  ADD CONSTRAINT `fk_sac_cliente1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sac_produto1` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `sub_modulo`
--
ALTER TABLE `sub_modulo`
  ADD CONSTRAINT `fk_sub_modulo_modulo1` FOREIGN KEY (`id_modulo`) REFERENCES `modulo` (`id_modulo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `sugestao`
--
ALTER TABLE `sugestao`
  ADD CONSTRAINT `sugestao_pessoa` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `telefone`
--
ALTER TABLE `telefone`
  ADD CONSTRAINT `fk_telefone_pessoa1` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_empresa1` FOREIGN KEY (`empresa_id_empresa`) REFERENCES `empresa` (`id_empresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_grupo_acesso1` FOREIGN KEY (`id_grupo_acesso`) REFERENCES `grupo_acesso` (`id_grupo_acesso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_pessoa1` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `vaga`
--
ALTER TABLE `vaga`
  ADD CONSTRAINT `fk_vaga_cargo1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
