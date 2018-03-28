-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26-Mar-2018 às 20:06
-- Versão do servidor: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portalnae`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `id` int(11) NOT NULL,
  `matricula` varchar(20) NOT NULL,
  `pessoa_id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  `escolaridade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id`, `matricula`, `pessoa_id`, `curso_id`, `escolaridade_id`) VALUES
(1, '111111web', 1, 1, 1),
(2, '222222web', 2, 2, 2),
(3, '333333web', 3, 3, 3),
(4, '444444web', 4, 4, 4),
(5, '555555web', 5, 5, 5),
(6, '666666web', 6, 6, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `bolsaedital`
--

CREATE TABLE `bolsaedital` (
  `fase_id` int(11) NOT NULL,
  `tipoAuxilio_id` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `bolsaedital`
--

INSERT INTO `bolsaedital` (`fase_id`, `tipoAuxilio_id`, `quantidade`, `valor`) VALUES
(1, 1, 400, '600'),
(2, 2, 400, '600'),
(3, 3, 200, '600');

-- --------------------------------------------------------

--
-- Estrutura da tabela `candidatura`
--

CREATE TABLE `candidatura` (
  `id` int(11) NOT NULL,
  `dataRealizacao` date NOT NULL,
  `dataHomologacao` date NOT NULL,
  `dataCancelamento` date DEFAULT NULL,
  `situacao` varchar(45) NOT NULL,
  `endereco_id` int(11) DEFAULT NULL,
  `contaBancaria_id` int(11) DEFAULT NULL,
  `responsavel_id` int(11) DEFAULT NULL,
  `aluno_id` int(11) DEFAULT NULL,
  `estadoCivil_id` int(11) DEFAULT NULL,
  `classificacao_id` int(11) DEFAULT NULL,
  `tipoAuxilio_id` int(11) DEFAULT NULL,
  `justificativa_id` int(11) DEFAULT NULL,
  `editalselecao_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `candidatura`
--

INSERT INTO `candidatura` (`id`, `dataRealizacao`, `dataHomologacao`, `dataCancelamento`, `situacao`, `endereco_id`, `contaBancaria_id`, `responsavel_id`, `aluno_id`, `estadoCivil_id`, `classificacao_id`, `tipoAuxilio_id`, `justificativa_id`, `editalselecao_id`) VALUES
(1, '2018-03-26', '2018-03-26', NULL, 'Homologado', 1, 1, 1, 1, 1, 1, 1, NULL, 1),
(2, '2018-03-26', '0000-00-00', NULL, 'Em Analise', 2, 2, 2, 2, 2, 2, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `classificacao`
--

CREATE TABLE `classificacao` (
  `id` int(11) NOT NULL,
  `situacao` varchar(45) NOT NULL,
  `dataInicialBolsa` date NOT NULL,
  `dataFinalBolsa` date NOT NULL,
  `tipoAuxilio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `classificacao`
--

INSERT INTO `classificacao` (`id`, `situacao`, `dataInicialBolsa`, `dataFinalBolsa`, `tipoAuxilio_id`) VALUES
(1, '', '0000-00-00', '0000-00-00', 1),
(2, '', '0000-00-00', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contabancaria`
--

CREATE TABLE `contabancaria` (
  `id` int(11) NOT NULL,
  `nomeBanco` varchar(20) NOT NULL,
  `numeroAgencia` varchar(10) NOT NULL,
  `contaCorrente` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contabancaria`
--

INSERT INTO `contabancaria` (`id`, `nomeBanco`, `numeroAgencia`, `contaCorrente`) VALUES
(1, '001 - Banco do Brasi', '1234', '123456'),
(2, '237 - Banco Bradesco', '4321', '876543221');

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `id` int(11) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `unidade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id`, `codigo`, `nome`, `unidade_id`) VALUES
(1, 'MARSUP01', 'Bacharelado em Administração', 1),
(2, 'MARSUP02', 'Bacharelado em Ciência da Computação', 1),
(3, 'MARSUP03', 'Bacharelado em Engenharia Ambiental', 1),
(4, 'MARSUP04', 'Bacharelado em Engenharia Civil', 1),
(5, 'MARSUP05', 'Bacharelado em Engenharia de Controle e Autom', 1),
(6, 'MARSUP06', 'Bacharelado em Engenharia de Produção', 1),
(7, 'MARSUP07', 'Bacharelado em Engenharia de Telecomunicações', 1),
(8, 'MARSUP08', 'Bacharelado em Engenharia Elétrica', 1),
(9, 'MARSUP09', 'Bacharelado em Engenharia Eletrônica', 1),
(10, 'MARSUP10', 'Bacharelado em Engenharia Mecânica', 1),
(11, 'MARSUP11', 'Bacharelado em L E A as Negociacões Intern.', 1),
(12, 'MARSUP12', 'Curso Superior de Tecnologia Ambiental', 1),
(13, 'MARSUP13', 'Curso Superior de Tecnologia em S.I.', 1),
(14, 'ANGSUP01', 'Bacharelado em Engenharia Elétrica', 2),
(15, 'ANGSUP02', 'Bacharelado em Engenharia Mecânica', 2),
(16, 'ANGSUP03', 'Bacharelado em Engenharia Metalúrgica', 2),
(17, 'ITASUP01', 'Bacharelado em Engenharia de Produção', 3),
(18, 'ITASUP02', 'Bacharelado em Engenharia Mecânica', 3),
(19, 'FRISUP01', 'Bacharelado em Engenharia Elétrica', 5),
(20, 'FRISUP02', 'Bacharelado em Sistemas de Informação', 5),
(21, 'FRISUP03', 'Licenciatura em Física', 5),
(22, 'FRISUP04', 'Curso Superior de Tecnologia em G. de Turismo', 5),
(23, 'NIGSUP01', 'Bacharelado em Engenharia de Controle e Auto', 6),
(24, 'NIGSUP02', 'Bacharelado em Engenharia de Produção', 6),
(25, 'NIGSUP03', 'Bacharelado em Engenharia Mecânica', 6),
(26, 'PETSUP01', 'Bacharelado em Engenharia de Computação', 7),
(27, 'PETSUP02', 'Bacharelado em Turismo', 7),
(28, 'PETSUP03', 'Licenciatura em Física', 7),
(29, 'PETSUP04', 'Curso Superior de Tecnologia em G. de Turismo', 7),
(30, 'VALSUP01', 'Bacharelado em Administração', 8),
(31, 'VALSUP02', 'Bacharelado em Engenharia de Produção', 8),
(32, 'MARTEC01', 'Curso Técnico em Administração', 1),
(33, 'MARTEC02', 'Curso Técnico em Edificações', 1),
(34, 'MARTEC03', 'Curso Técnico em Eletrônica', 1),
(35, 'MARTEC04', 'Curso Técnico em Eletrotécnica', 1),
(36, 'MARTEC05', 'Curso Técnico em Estradas', 1),
(37, 'MARTEC06', 'Curso Técnico em Informática', 1),
(38, 'MARTEC07', 'Curso Técnico em Mecânica', 1),
(39, 'MARTEC08', 'Curso Técnico em Meteorologia', 1),
(40, 'MARTEC09', 'Curso Técnico em Segurança do Trabalho', 1),
(41, 'MARTEC10', 'Curso Técnico em Telecomunicações', 1),
(42, 'MARTEC11', 'Curso Técnico em Turismo', 1),
(43, 'ANGTEC01', 'Curso Técnico em Mecânica', 2),
(44, 'ITATEC01', 'Curso Técnico em Mecânica', 3),
(45, 'MGRTEC01', 'Curso Técnico em Automação Industrial', 4),
(46, 'MGRTEC02', 'Curso Técnico em Manutenção Automotiva', 4),
(47, 'MGRTEC03', 'Curso Técnico em Segurança do Trabalho', 4),
(48, 'NFRTEC01', 'Curso Técnico em Informática', 5),
(49, 'NIGTEC01', 'Curso Técnico em Automação Industrial', 6),
(50, 'NIGTEC02', 'Curso Técnico em Enfermagem', 6),
(51, 'NIGT003', 'Curso Técnico em Informática', 6),
(52, 'NIGT004', 'Curso Técnico em Telecomunicações', 6),
(53, 'NIGT005', 'Curso Técnico em Eletromecânica', 6),
(54, 'PETT001', 'Curso Técnico em Telecomunicações', 7),
(55, 'VALT001', 'Curso Técnico em Alimentos', 8),
(56, 'VALT002', 'Curso Técnico em Química', 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `editalselecao`
--

CREATE TABLE `editalselecao` (
  `id` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `edital` varchar(45) DEFAULT NULL,
  `dataInicialEntDocEspecificaPae` date NOT NULL,
  `dataFinalEntDocEspecificaPae` date NOT NULL,
  `dataInicialEntDocEspecificaPaed` date NOT NULL,
  `dataFinalEntDocEspecificaPaed` date NOT NULL,
  `dataInicialEntrevista` date NOT NULL,
  `dataFinalEntrevista` date NOT NULL,
  `dataInicialEntDocEspecificaPaem` date NOT NULL,
  `dataFinalEntDocEspecificaPaem` date NOT NULL,
  `dataInicialEntDadosDirex` date NOT NULL,
  `dataFinalEntDadosDirex` date NOT NULL,
  `dataDivulgResultadoFinalPae` date NOT NULL,
  `dataInicialEntInfoBancaria` date NOT NULL,
  `dataFinalEntInfoBancaria` date NOT NULL,
  `dataInicialEntDeclarMatricula` date NOT NULL,
  `dataFinalEntDaclarMatricula` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='			';

--
-- Extraindo dados da tabela `editalselecao`
--

INSERT INTO `editalselecao` (`id`, `ano`, `edital`, `dataInicialEntDocEspecificaPae`, `dataFinalEntDocEspecificaPae`, `dataInicialEntDocEspecificaPaed`, `dataFinalEntDocEspecificaPaed`, `dataInicialEntrevista`, `dataFinalEntrevista`, `dataInicialEntDocEspecificaPaem`, `dataFinalEntDocEspecificaPaem`, `dataInicialEntDadosDirex`, `dataFinalEntDadosDirex`, `dataDivulgResultadoFinalPae`, `dataInicialEntInfoBancaria`, `dataFinalEntInfoBancaria`, `dataInicialEntDeclarMatricula`, `dataFinalEntDaclarMatricula`) VALUES
(1, 2018, 'Edital 2018', '2018-03-17', '2018-02-01', '2018-02-28', '2018-03-06', '2018-02-28', '2018-02-28', '2018-02-28', '2018-02-28', '2018-02-28', '2018-02-28', '2018-02-28', '2018-02-28', '2018-02-28', '2018-02-28', '2018-02-28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id` int(11) NOT NULL,
  `logradouro` varchar(45) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(15) DEFAULT NULL,
  `bairro` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `cep` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `cep`) VALUES
(1, 'Rua A', 12, 'Casa 02', 'Centro', 'Rio de Janeiro', 'RJ', '25484-859'),
(2, 'Rua C', 34, 'Apt', 'Olinda', 'Nilopolis', 'RJ', '23456-765');

-- --------------------------------------------------------

--
-- Estrutura da tabela `escolaridade`
--

CREATE TABLE `escolaridade` (
  `id` int(11) NOT NULL,
  `periodo` int(11) DEFAULT NULL,
  `vigenciaEstagioInicial` date DEFAULT NULL,
  `vigenciaEstagioFinal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `escolaridade`
--

INSERT INTO `escolaridade` (`id`, `periodo`, `vigenciaEstagioInicial`, `vigenciaEstagioFinal`) VALUES
(1, 6, NULL, NULL),
(2, NULL, '2018-02-01', '2018-12-31'),
(3, 3, NULL, NULL),
(4, NULL, '2108-02-01', '2018-06-30'),
(5, 8, NULL, NULL),
(6, NULL, '2108-03-01', '2018-11-30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estadocivil`
--

CREATE TABLE `estadocivil` (
  `id` int(11) NOT NULL,
  `descritor` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `estadocivil`
--

INSERT INTO `estadocivil` (`id`, `descritor`) VALUES
(1, 'Solteiro(a)'),
(2, 'Casado(a)'),
(3, 'Divorciado(a)'),
(4, 'Viúvo(a)');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fase`
--

CREATE TABLE `fase` (
  `id` int(11) NOT NULL,
  `inicioFase` date NOT NULL,
  `finalFase` date NOT NULL,
  `unidade_id` int(11) NOT NULL,
  `editalSelecao_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fase`
--

INSERT INTO `fase` (`id`, `inicioFase`, `finalFase`, `unidade_id`, `editalSelecao_id`) VALUES
(1, '2018-03-01', '2018-03-31', 1, 1),
(2, '2018-04-01', '2018-04-30', 1, 1),
(3, '2018-05-01', '2018-05-31', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `grauparentesco`
--

CREATE TABLE `grauparentesco` (
  `id` int(11) NOT NULL,
  `parentesco` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `grauparentesco`
--

INSERT INTO `grauparentesco` (`id`, `parentesco`) VALUES
(1, 'Eu'),
(2, 'Pai'),
(3, 'Mãe'),
(4, 'Irmão(ã)'),
(5, 'Avô(ó)'),
(6, 'Bisavô(ó)'),
(7, 'Filho(a)'),
(8, 'Tio(a)'),
(9, 'Primo(a)'),
(10, 'Neto(a)');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itemrenda`
--

CREATE TABLE `itemrenda` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `dataNascimento` date NOT NULL,
  `totalRenda` decimal(10,0) NOT NULL,
  `candidatura_id` int(11) NOT NULL,
  `vinculoTrabalhista_id` int(11) NOT NULL,
  `grauParentesco_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `itemrenda`
--

INSERT INTO `itemrenda` (`id`, `nome`, `dataNascimento`, `totalRenda`, `candidatura_id`, `vinculoTrabalhista_id`, `grauParentesco_id`) VALUES
(1, 'Josué Silva', '1970-01-05', '1500', 1, 16, 2),
(2, 'Paula Marins', '1978-02-05', '1000', 1, 11, 3),
(3, 'Jonnas Sousa', '1960-05-17', '1200', 2, 193, 2),
(4, 'Célia Gomes', '1970-00-19', '900', 2, 168, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `justificativa`
--

CREATE TABLE `justificativa` (
  `id` int(11) NOT NULL,
  `justificativa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `justificativa`
--

INSERT INTO `justificativa` (`id`, `justificativa`) VALUES
(1, 'DOCUMENTAÇÃO APROVADA'),
(2, 'DOCUMENTAÇÃO REPROVADA'),
(3, 'LAUDO APROVADO'),
(4, 'LAUDO REPROVADO'),
(5, 'AVALIAÇÃO SOCIOECONÔMICA ACEITA'),
(6, 'AVALIAÇÃO SOCIOECONÔMICA NEGADA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel_acessos`
--

CREATE TABLE `nivel_acessos` (
  `id` int(11) NOT NULL,
  `nome_nivel` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `nivel_acessos`
--

INSERT INTO `nivel_acessos` (`id`, `nome_nivel`) VALUES
(1, 'administrador'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `id` int(11) NOT NULL,
  `cpf` varchar(22) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `dataNascimento` date DEFAULT NULL,
  `identidade` int(11) DEFAULT NULL,
  `orgaoExpedidor` varchar(10) DEFAULT NULL,
  `sexo` varchar(3) DEFAULT NULL,
  `telefoneResidencial` varchar(15) DEFAULT NULL,
  `telefoneCelular` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`id`, `cpf`, `email`, `nome`, `dataNascimento`, `identidade`, `orgaoExpedidor`, `sexo`, `telefoneResidencial`, `telefoneCelular`) VALUES
(1, '679.411.871-83', 'marcos@gmail.com', 'Marcos Souza', '1980-01-26', 12345678, 'Detran', 'M', '2112345678', '21123456789'),
(2, '337.661.998-03', 'pedro@uol.com.br', 'Pedro Luiz', '1996-04-01', 12345678, 'Detran', 'M', '21123454678', '21123456789'),
(3, '108.181.531-05', 'maria@terra.com.br', 'Maria Silva', '2003-01-31', 12345678, 'Detran', 'F', '2112345678', '21123456789'),
(4, '448.159.202-81', 'joana@gmail.com', 'Joana Gomes', '1998-12-05', 12345678, 'Detran', 'F', '2112345678', '21123456789'),
(5, '278.837.427-52', 'joao@gmail.com', 'João Martins', '2002-06-25', 87654321, 'IFP', 'M', '2187654321', '21987654321'),
(6, '138.921.625-06', 'fabiola@uol.com.br', 'Fabiola Pereira', '1996-04-03', 98765432, 'IFP', 'F', '2187654321', '21987654321');

-- --------------------------------------------------------

--
-- Estrutura da tabela `responsavel`
--

CREATE TABLE `responsavel` (
  `id` int(11) NOT NULL,
  `cpf` varchar(22) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `nome` varchar(45) NOT NULL,
  `identidade` int(11) NOT NULL,
  `orgaoExpedidor` varchar(10) NOT NULL,
  `dataNascimento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `responsavel`
--

INSERT INTO `responsavel` (`id`, `cpf`, `email`, `nome`, `identidade`, `orgaoExpedidor`, `dataNascimento`) VALUES
(1, '679.411.871-83', 'marcos@gmail.com', 'Marcos Souza', 12345678, 'Detran', '1980-01-26'),
(2, '337.661.998-03', 'pedro@uol.com.br', 'Pedro Luiz', 12345678, 'Detran', '1996-04-01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoauxilio`
--

CREATE TABLE `tipoauxilio` (
  `id` int(11) NOT NULL,
  `categoria` varchar(45) NOT NULL,
  `duracaoMin` int(11) NOT NULL,
  `duracaoMax` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipoauxilio`
--

INSERT INTO `tipoauxilio` (`id`, `categoria`, `duracaoMin`, `duracaoMax`) VALUES
(1, 'PAE', 1, 12),
(2, 'PAED', 1, 12),
(3, 'PAEm', 1, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade`
--

CREATE TABLE `unidade` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `unidade`
--

INSERT INTO `unidade` (`id`, `nome`) VALUES
(1, 'Maracanã'),
(2, 'Angra dos Reis'),
(3, 'Itaguaí'),
(4, 'Maria da Graça'),
(5, 'Nova Friburgo'),
(6, 'Nova Iguaçu'),
(7, 'Petropólis'),
(8, 'Valença');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `login` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `nivel_acessos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `login`, `senha`, `nivel_acessos_id`) VALUES
(1, 'admin', 'admin@teste.com.br', 'admin', '123', 1),
(2, 'Coordenação CAE', 'coordenacaocae@cefet-rj.br', 'coordenacao', '123', 1),
(3, 'Sereataria CAE', 'secretariacae@cefet-rj.br', 'secretariacae', '123', 1),
(4, 'DIREX', 'direx@cefet-rj.br', 'direx', '123', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vinculotrabalhista`
--

CREATE TABLE `vinculotrabalhista` (
  `id` int(11) NOT NULL,
  `ocupacao` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `vinculotrabalhista`
--

INSERT INTO `vinculotrabalhista` (`id`, `ocupacao`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'ADMINISTRADOR DE EDIFICIO'),
(3, 'ADMINISTRADOR DE EXPLORACAO AGRICOLA'),
(4, 'ADMINISTRADORES'),
(5, 'ADVOGADO'),
(6, 'ADVOGADO DIREITO DO TRABALHO'),
(7, 'AGENCIADOR DE PROPAGANDA'),
(8, 'AGENTE ADMINISTRATIVO'),
(9, 'AGENTE DE COMPRAS'),
(10, 'AGENTE DE VENDA DE SERVICOS AS EMPRESAS'),
(11, 'AGENTE DE VIAGEM'),
(12, 'AGENTE PUBLICITARIO'),
(13, 'AGENTE TECNICO DE VENDAS'),
(14, 'AGENTES ADMINISTRATIVOS'),
(15, 'AGENTES DE ADMINISTRACAO DE EMPRESAS PUBLICAS'),
(16, 'ALMOXARIFE'),
(17, 'ANALISTA DE CARGOS E SALARIOS'),
(18, 'ANALISTA DE COMERCIALIZACAO'),
(19, 'ANALISTA DE COMUNICACA 8234    ANALISTA DE CR'),
(20, 'ANALISTA DE IMPORTACAO E EXPORTACAO'),
(21, 'ANALISTA DE OCUPACAO'),
(22, 'ANALISTA DE ORGANIZACAO E METODOS'),
(23, 'ANALISTA DE PESQUISA DE MERCADO'),
(24, 'ANALISTA DE RECURSOS HUMANOS'),
(25, 'ANALISTA DE SEGUROS'),
(26, 'ANALISTA DE SISTEMAS'),
(27, 'ANALISTA DE SUPORTE DE SISTEMA'),
(28, 'APONTADOR DE MAO DE OBRA'),
(29, 'APONTADOR DE PRODUCAO'),
(30, 'ARQUITETO'),
(31, 'ARQUIVISTA'),
(32, 'ASSISTENTE ADMINISTRATIVO'),
(33, 'ASSISTENTE DE PATRIMONIO'),
(34, 'ASSISTENTE DE VENDAS FINANCEIRO'),
(35, 'ASSISTENTE SOCIAL'),
(36, 'ATENDETE DE ENFERMAGEM'),
(37, 'ATLETA PROFISSIONAL DE FUTEBOL'),
(38, 'AUDITOR CONTABIL'),
(39, 'AUDITOR GERAL'),
(40, 'AUXILIAR DE ALMOXARIFADO'),
(41, 'AUXILIAR DE BIBLIOTECA'),
(42, 'AUXILIAR DE CONTABILIDADE'),
(43, 'AUXILIAR DE ENFERMAGEM'),
(44, 'AUXILIAR DE ESCRITORIO'),
(45, 'AUXILIAR DE FARMACIA'),
(46, 'AUXILIAR DE IMPORTACAO E EXPORTACAO'),
(47, 'AUXILIAR DE LABORATORIO DE ANALISES CLINICAS'),
(48, 'AUXILIAR DE LABORATORIO DE ANALISES FISICOQUI'),
(49, 'AUXILIAR DE PESSOAL'),
(50, 'AUXILIAR DE SEGUROS'),
(51, 'AUXILIAR DE SERVICOS JURIDICOS'),
(52, 'AUXILIARES DE CONTABILIDADE'),
(53, 'AUXILIARES DE ESCRITORIO'),
(54, 'BABA'),
(55, 'BARMAN'),
(56, 'BIBLIOTECARIO'),
(57, 'BIOLOGISTA'),
(58, 'BIOQUIMICO'),
(59, 'CABELEIREIRO'),
(60, 'CARTEIRO'),
(61, 'CHEFE DE ADMINISTRATIVOS'),
(62, 'CHEFE DE ALMOXARIFADO'),
(63, 'CHEFE DE CONTABILIDADE'),
(64, 'CHEFE DE CONTABILIDADE E FINANCAS'),
(65, 'CHEFE DE CONTAS A PAGAR'),
(66, 'CHEFE DE CONTROLE DE PATRIMONIO'),
(67, 'CHEFE DE ESCRITORIO'),
(68, 'CHEFE DE ESCRITORIO CONTABILIDADE'),
(69, 'CHEFE DE ESCRITORIO CREDITO E COBRANCA'),
(70, 'CHEFE DE ESCRITORIO ORCAMENTO'),
(71, 'CHEFE DE ESCRITORIO PESSOAL'),
(72, 'CHEFE DE ESCRITORIO SERVICOS GERAIS'),
(73, 'CHEFE DE ESCRITORIO TESOURARIA'),
(74, 'CHEFE DE RECEPCAO HOTEL'),
(75, 'CHEFE DE SERVICO DE TRANSPORTE RODOVIARIO'),
(76, 'CHEFE DE SERVICOS DE TELECOMUNICACOES'),
(77, 'CIRURGIAO'),
(78, 'CIRURGIAO DENTISTA'),
(79, 'CODIFICADOR DE DADOS'),
(80, 'COMERCIANTE VAREJISTA'),
(81, 'COMISSARIO DE BORDO AERONAVES'),
(82, 'COMPRADOR COMERCIO ATACADISTA E VAREJISTA'),
(83, 'CONDUTOR DE CAMINHAO BASCULANTE'),
(84, 'CONDUTORES DE AUTOMOVEIS'),
(85, 'CONSULTOR JURIDICO'),
(86, 'CONTADOR'),
(87, 'CONTRAMESTRE DE EMBARCACAO'),
(88, 'CONTRAMESTRE INDUSTRIA TEXTIL'),
(89, 'COORDENADOR DE ENSINO'),
(90, 'CORRESPONDENTE COMERCIAL'),
(91, 'COZINHEIRO CHEFE'),
(92, 'CRONOANALISTA'),
(93, 'DATILOGRAFO'),
(94, 'DEMONSTRADOR'),
(95, 'DESENHISTA'),
(96, 'DESENHISTA PROJETISTA'),
(97, 'DESENHISTA TECNICO'),
(98, 'DESPACHANTE'),
(99, 'DIAGRAMADOR'),
(100, 'DIGITADOR'),
(101, 'DIRETOR DE EMPRESA'),
(102, 'DIRETOR DE EMPRESA DE COMERCIO VAREJISTA'),
(103, 'DIRETOR DE EMPRESA DE COMUNICACOES'),
(104, 'DIRETOR DE EMPRESA DE CONSTRUCAO CIVIL'),
(105, 'DIRETOR DE EMPRESA DE PRESTACAO DE SERVICOS'),
(106, 'DIRETOR DE EMPRESA DE SERVICOS CLINICOS E HOS'),
(107, 'DIRETOR DE EMPRESA FINANCEIRA'),
(108, 'DIRETOR DE EMPRESA MANUFATUREIRA'),
(109, 'DIRETOR DE ESTABELECIMENTO DE ENSINO'),
(110, 'DIRETOR DE ESTABELECIMENTO DE ENSINO SUPERIOR'),
(111, 'DIRETORES DE EMPRESAS'),
(112, 'ECONOMISTA'),
(113, 'ECONOMISTA MERCADOLOGIA'),
(114, 'ECONOMISTA PROGRAMACAO ECONOMICO FINANCEIRA'),
(115, 'ECONOMISTAS'),
(116, 'EDITOR DE LIVROS'),
(117, 'ENCARREGADO DE DIGITACAO E OPERACAO'),
(118, 'ENFERMEIRO'),
(119, 'ENFERMEIRO DO TRABALHO'),
(120, 'ENFERMEIROS'),
(121, 'ENGENHEIRO AERONAUTICO'),
(122, 'ENGENHEIRO AGRONOMO'),
(123, 'ENGENHEIRO CIVIL'),
(124, 'ENGENHEIRO DE CONTROLE DE QUALIDADE'),
(125, 'ENGENHEIRO DE MANUTENCAO ELETRICIDADE E ELETR'),
(126, 'ENGENHEIRO DE MINAS'),
(127, 'ENGENHEIRO DE ORGANIZACAO E METODOS'),
(128, 'ENGENHEIRO DE SEGURANCA DO TRABALHO'),
(129, 'ENGENHEIRO DE TELECOMUNICACOES'),
(130, 'ENGENHEIRO DE TRAFEGO'),
(131, 'ENGENHEIRO ELETRICISTA'),
(132, 'ENGENHEIRO ELETRONICO'),
(133, 'ENGENHEIRO MECANICO'),
(134, 'ENGENHEIRO QUIMICO'),
(135, 'ENGENHEIROS'),
(136, 'ESCRITURARIO'),
(137, 'ESCRIVAO'),
(138, 'ESTATISTICO'),
(139, 'ESTETICISTA'),
(140, 'FARMACEUTICO'),
(141, 'FISIOTERAPEUTA'),
(142, 'FONOAUDIOLOGO'),
(143, 'FUNCIONARIO PUBLICO ESTADUAL SUPERIOR'),
(144, 'FUNCIONARIO PUBLICO FEDERAL SUPERIOR'),
(145, 'FUNCIONARIO PUBLICO MUNICIPAL SUPERIOR'),
(146, 'FUNCIONARIO PUBLICO SUPERIOR'),
(147, 'GEOLOGO'),
(148, 'GERENTE ADMINISTRATIVO'),
(149, 'GERENTE COMERCIAL'),
(150, 'GERENTE DE BANCO'),
(151, 'GERENTE DE BAR'),
(152, 'GERENTE DE COMPRA'),
(153, 'GERENTE DE  EMPRESAS'),
(154, 'GERENTE DE HOTEL'),
(155, 'GERENTE DE INFORMATICA'),
(156, 'GERENTE DE LOJA'),
(157, 'GERENTE DE MARKETING'),
(158, 'GERENTE DE OPERACAO'),
(159, 'GERENTE DE PESQUISA E DESENVOLVIMENTO'),
(160, 'GERENTE DE PESSOAL'),
(161, 'GERENTE DE PLANEJAMENTO'),
(162, 'GERENTE DE POSTAL E TELECOMUNICACOES'),
(163, 'GERENTE DE PRODUCAO'),
(164, 'GERENTE DE PROPAGANDA'),
(165, 'GERENTE DE RESTAURANTE'),
(166, 'GERENTE DE RH'),
(167, 'GERENTE DE TRANSPORTE'),
(168, 'GERENTE DE VENDAS'),
(169, 'GERENTE EXECUTIVO'),
(170, 'GERENTE FINANCEIRO'),
(171, 'GERENTE OPERACIONAL'),
(172, 'INSPETOR DE PRODUCAO'),
(173, 'INSPETOR DE QUALIDADE'),
(174, 'INSPETOR DE	SERVICOS DE TRANSPORTE'),
(175, 'INSPETOR TECNICO DE VENDAS'),
(176, 'INSTRUTOR DE APRENDIZAGEM E TREINAMENTO'),
(177, 'JORNALISTA'),
(178, 'LABORATORISTA ANALISES CLINICAS'),
(179, 'LABORATORISTA INDUSTRIAL'),
(180, 'LOCUTOR'),
(181, 'MAITRE'),
(182, 'MEDICO'),
(183, 'MEDICO ANESTESISTA'),
(184, 'MEDICO CARDIOLOGISTA'),
(185, 'MEDICO DO TRABALHO'),
(186, 'MEDICO GINECOLOGISTA'),
(187, 'MEDICO ORTOPEDISTA'),
(188, 'MEDICO PEDIATRA'),
(189, 'MEDICO PSIQUIATRA'),
(190, 'MEDICO VETERINARIO'),
(191, 'MESTRE CONTRUCAO CIVIL'),
(192, 'MESTRE INDUSTRIAL'),
(193, 'MOTOCICLISTA TRANSPORTE DE MERCADORIAS'),
(194, 'MOTORISTA'),
(195, 'MOTORISTA DE CAMINHAO'),
(196, 'MOTORISTA DE FURGAO OU VEICULO SIMILAR'),
(197, 'MOTORISTA DE ONIBUS'),
(198, 'MOTORISTA DE TAXI'),
(199, 'MUSICO'),
(200, 'NUTRICIONISTA'),
(201, 'OPERADOR DE CAMERA DE TELEVISAO'),
(202, 'OPERADOR DE COMPUTADOR'),
(203, 'OPERADOR DE EQUIPAMENTOS DE ENTRADA DE DADOS'),
(204, 'OPERADOR DE ESTACAO DE RADIO'),
(205, 'OPERADOR DE MAQUINAS E VEICULOS'),
(206, 'OPERADOR DE MICRO'),
(207, 'OPERADOR DE PRODUTOS FINANCEIROS'),
(208, 'OPERADOR DE RAIOS X'),
(209, 'OPERADOR DE TELEMARKETING'),
(210, 'ORIENTADOR EDUCACIONAL'),
(211, 'OURIVES'),
(212, 'PEDAGOGO'),
(213, 'PILOTO'),
(214, 'PINTOR'),
(215, 'PRODUTOR DE RADIO E TELEVISAO'),
(216, 'PROFESSOR DE 1A A 4A SERIE ENSINO DE 1O GRAU'),
(217, 'PROFESSOR DE ADMINISTRACAO ENSINO SUPERIOR'),
(218, 'PROFESSOR DE ALUNOS COM DEFICENCIAS MENTAIS'),
(219, 'PROFESSOR DE BIOLOGIA ENSINO DE 2O GRAU'),
(220, 'PROFESSOR DE CIENCIAS NATURAIS ENSINO DE 1O G'),
(221, 'PROFESSOR DE COMUNICACAO'),
(222, 'PROFESSOR DE CONTABILIDADE ENSINO SUPERIOR'),
(223, 'PROFESSOR DE DIDATICA ENSINO SUPERIOR'),
(224, 'PROFESSOR DE DIREITO'),
(225, 'PROFESSOR DE ECONOMIA'),
(226, 'PROFESSOR DE EDUCACAO FISICA'),
(227, 'PROFESSOR DE ENFERMAGEM'),
(228, 'PROFESSOR DE ENSINO PRE ESCOLAR'),
(229, 'PROFESSOR DE ESTATISTICA'),
(230, 'PROFESSOR DE ESTUDOS SOCIAIS ENSINO DE 1O GRA'),
(231, 'PROFESSOR DE FISICA'),
(232, 'PROFESSOR DE FISIOTERAPIA ENSINO SUPERIOR'),
(233, 'PROFESSOR DE HISTORIA'),
(234, 'PROFESSOR DE INGLES'),
(235, 'PROFESSOR DE LINGUA PORTUGUESA'),
(236, 'PROFESSOR DE LINGUAS ESTRANGEIRAS'),
(237, 'PROFESSOR DE MATEMATICA'),
(238, 'PROFESSOR DE ORIENTACAO EDUCACIONAL ENSINO SU'),
(239, 'PROFESSOR DE PEDAGOGIA'),
(240, 'PROFESSOR DE PORTUGUES E LITERATURA'),
(241, 'PROFESSOR DE PRATICA DE ENSINO ENSINO SUPERIO'),
(242, 'PROFESSOR DE PSICOLOGIA'),
(243, 'PROFESSOR DE QUIMICA'),
(244, 'PROFESSOR DE SOCIOLOGIA'),
(245, 'PROFESSOR DE TECNOLOGIA'),
(246, 'PROFESSORES'),
(247, 'PROFESSORES DE BIOLOGIA'),
(248, 'PROFESSORES DE CIENCIAS HUMANAS'),
(249, 'PROFESSORES DE ENSINO DE 2O GRAU'),
(250, 'PROFESSORES DE ENSINO DE PRIMEIRO GRAU'),
(251, 'PROFESSORES DE ENSINO ESPECIAL'),
(252, 'PROFESSORES DE ENSINO PRE ESCOLAR'),
(253, 'PROFESSORES DE ENSINO SUPERIOR'),
(254, 'PROFESSORES DE PEDAGOGIA'),
(255, 'PROFESSSOR DE GEOGRAFIA'),
(256, 'PROGRAMADOR DE COMPUTADOR'),
(257, 'PROPAGANDISTA DE PRODUTOS DE LABORATORIO'),
(258, 'PSICOLOGO'),
(259, 'QUIMICO'),
(260, 'QUIMICO ANALISTA'),
(261, 'QUIMICO INDUSTRIAL'),
(262, 'RECEPCIONISTA'),
(263, 'REDATOR'),
(264, 'RELACOES PUBLICAS'),
(265, 'REPORTER'),
(266, 'REPRESENTANTE COMERCIAL'),
(267, 'SECRETARIO'),
(268, 'SECRETARIO BILINGUE'),
(269, 'SECRETARIO EXECUTIVO'),
(270, 'SERVENTUARIOS DA JUSTICA'),
(271, 'SOCIOLOGO'),
(272, 'SUPERVISOR DE COMPRAS'),
(273, 'SUPERVISOR DE VENDAS COMERCIO ATACADISTA'),
(274, 'SUPERVISOR DE VENDAS COMERCIO VAREJISTA'),
(275, 'SUPERVISOR EDUCACIONAL'),
(276, 'SUPERVISORES DE COMPRAS E COMPRADORES'),
(277, 'SUPERVISORES DE VENDAS'),
(278, 'TECNICO'),
(279, 'TECNICO AGRICOLA'),
(280, 'TECNICO AGROPECUARIO'),
(281, 'TECNICO DE ADMINISTRACAO'),
(282, 'TECNICO DE CONTABILIDADE'),
(283, 'TECNICO DE ENFERMAGEM'),
(284, 'TECNICO DE LABORATORIO'),
(285, 'TECNICO DE MANUTENCAO ELETRICA'),
(286, 'TECNICO DE MANUTENCAO ELETRONICA'),
(287, 'TECNICO DE OBRAS CIVIS'),
(288, 'TECNICO DE PLANEJAMENTO DE PRODUCAO'),
(289, 'TECNICO DE SEGURANCA DO TRABALHO'),
(290, 'TECNICO DE SEGUROS'),
(291, 'TECNICO DE TELECOMUNICACOES'),
(292, 'TECNICO ELETRONICO'),
(293, 'TECNICO MECANICO'),
(294, 'TECNICO MECANICO MAQUINAS'),
(295, 'TECNICO METALURGICO'),
(296, 'TECNICO QUIMICO'),
(297, 'TECNICOS DE BIOLOGIA '),
(298, 'TECNICOS DE ELETRICIDADE'),
(299, 'TECNICOS DE ENFERMAGEM'),
(300, 'TECNICOS DE OBRAS CIVIS'),
(301, 'TERAPEUTA OCUPACIONAL'),
(302, 'TOPOGRAFO'),
(303, 'TRABALHADORES DAS PROFISSOES CIENTIFICAS'),
(304, 'TRABALHADORES DE COMERCIO'),
(305, 'TRABALHADORES DE SERVICOS ADMINISTRATIVOS'),
(306, 'TRABALHADORES DE SERVICOS DE CONTABILIDADE'),
(307, 'TRABALHADORES DE SERVICOS DE TURISMO'),
(308, 'VENDEDOR A DOMICILIO'),
(309, 'VENDEDOR AMBULANTE'),
(310, 'VENDEDOR DE COMERCIO ATACADISTA'),
(311, 'VENDEDOR DE COMERCIO VAREJISTA'),
(312, 'VENDEDOR PRACISTA'),
(313, 'VENDEDORES DE COMERCIO ATACADISTA E VAREJISTA'),
(314, 'VENDEDORES PRACISTAS'),
(315, 'VEREADOR'),
(316, 'ZOOTECNISTA'),
(317, 'AUTONOMO'),
(318, 'OUTRO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_aluno_pessoa1_idx` (`pessoa_id`),
  ADD KEY `fk_aluno_curso1_idx` (`curso_id`),
  ADD KEY `fk_aluno_escolaridade1_idx` (`escolaridade_id`) USING BTREE;

--
-- Indexes for table `bolsaedital`
--
ALTER TABLE `bolsaedital`
  ADD PRIMARY KEY (`fase_id`,`tipoAuxilio_id`),
  ADD UNIQUE KEY `tipoAuxilio_id_UNIQUE` (`tipoAuxilio_id`),
  ADD KEY `fase_id_UNIQUE` (`fase_id`),
  ADD KEY `fk_fase_has_tipoAuxilio_tipoAuxilio1_idx` (`tipoAuxilio_id`),
  ADD KEY `fk_fase_has_tipoAuxilio_fase1_idx` (`fase_id`);

--
-- Indexes for table `candidatura`
--
ALTER TABLE `candidatura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_candidatura_endereco_idx` (`endereco_id`),
  ADD KEY `fk_candidatura_contabancaria1_idx` (`contaBancaria_id`),
  ADD KEY `fk_candidatura_responsavel1_idx` (`responsavel_id`),
  ADD KEY `fk_candidatura_aluno1_idx` (`aluno_id`),
  ADD KEY `fk_candidatura_estadocivil1_idx` (`estadoCivil_id`),
  ADD KEY `fk_candidatura_classificacao1_idx` (`classificacao_id`),
  ADD KEY `fk_candidatura_tipoauxilio1_idx` (`tipoAuxilio_id`),
  ADD KEY `fk_candidatura_justificativa1_idx` (`justificativa_id`) USING BTREE,
  ADD KEY `fk_candidatura_editalselecao_id` (`editalselecao_id`) USING BTREE;

--
-- Indexes for table `classificacao`
--
ALTER TABLE `classificacao`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_classificacao_tipoauxilio1_idx` (`tipoAuxilio_id`);

--
-- Indexes for table `contabancaria`
--
ALTER TABLE `contabancaria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_curso_unidade1_idx` (`unidade_id`);

--
-- Indexes for table `editalselecao`
--
ALTER TABLE `editalselecao`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `escolaridade`
--
ALTER TABLE `escolaridade`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `estadocivil`
--
ALTER TABLE `estadocivil`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `fase`
--
ALTER TABLE `fase`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_fase_unidade1_idx` (`unidade_id`),
  ADD KEY `fk_fase_editalselecao1_idx` (`editalSelecao_id`);

--
-- Indexes for table `grauparentesco`
--
ALTER TABLE `grauparentesco`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `itemrenda`
--
ALTER TABLE `itemrenda`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_itemrenda_vinculoTrabalhista1_idx` (`vinculoTrabalhista_id`),
  ADD KEY `fk_itemrenda_grauParentesco1_idx` (`grauParentesco_id`);

--
-- Indexes for table `justificativa`
--
ALTER TABLE `justificativa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nivel_acessos`
--
ALTER TABLE `nivel_acessos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `responsavel`
--
ALTER TABLE `responsavel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `tipoauxilio`
--
ALTER TABLE `tipoauxilio`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `unidade`
--
ALTER TABLE `unidade`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_usuarios_nivel_acessos1_idx` (`nivel_acessos_id`);

--
-- Indexes for table `vinculotrabalhista`
--
ALTER TABLE `vinculotrabalhista`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `candidatura`
--
ALTER TABLE `candidatura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `classificacao`
--
ALTER TABLE `classificacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contabancaria`
--
ALTER TABLE `contabancaria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `editalselecao`
--
ALTER TABLE `editalselecao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `escolaridade`
--
ALTER TABLE `escolaridade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `estadocivil`
--
ALTER TABLE `estadocivil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fase`
--
ALTER TABLE `fase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `grauparentesco`
--
ALTER TABLE `grauparentesco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `itemrenda`
--
ALTER TABLE `itemrenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `justificativa`
--
ALTER TABLE `justificativa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nivel_acessos`
--
ALTER TABLE `nivel_acessos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `responsavel`
--
ALTER TABLE `responsavel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tipoauxilio`
--
ALTER TABLE `tipoauxilio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `unidade`
--
ALTER TABLE `unidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vinculotrabalhista`
--
ALTER TABLE `vinculotrabalhista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=319;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `fk_aluno_curso1` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_aluno_escolaridade1` FOREIGN KEY (`escolaridade_id`) REFERENCES `escolaridade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_aluno_pessoa1` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `bolsaedital`
--
ALTER TABLE `bolsaedital`
  ADD CONSTRAINT `fk_fase_has_tipoAuxilio_fase1` FOREIGN KEY (`fase_id`) REFERENCES `fase` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fase_has_tipoAuxilio_tipoAuxilio1` FOREIGN KEY (`tipoAuxilio_id`) REFERENCES `tipoauxilio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `candidatura`
--
ALTER TABLE `candidatura`
  ADD CONSTRAINT `fk_candidatura_aluno1` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_candidatura_classificacao1` FOREIGN KEY (`classificacao_id`) REFERENCES `classificacao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_candidatura_contabancaria1` FOREIGN KEY (`contaBancaria_id`) REFERENCES `contabancaria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_candidatura_editalSelecao1` FOREIGN KEY (`editalselecao_id`) REFERENCES `editalselecao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_candidatura_editalselecao` FOREIGN KEY (`editalselecao_id`) REFERENCES `editalselecao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_candidatura_endereco` FOREIGN KEY (`endereco_id`) REFERENCES `endereco` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_candidatura_estadocivil1` FOREIGN KEY (`estadoCivil_id`) REFERENCES `estadocivil` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_candidatura_justificativa1` FOREIGN KEY (`justificativa_id`) REFERENCES `justificativa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_candidatura_responsavel1` FOREIGN KEY (`responsavel_id`) REFERENCES `responsavel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_candidatura_tipoAuxilio1` FOREIGN KEY (`tipoAuxilio_id`) REFERENCES `tipoauxilio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `classificacao`
--
ALTER TABLE `classificacao`
  ADD CONSTRAINT `fk_classificacao_tipoAuxilio1` FOREIGN KEY (`tipoAuxilio_id`) REFERENCES `tipoauxilio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `fk_curso_unidade1` FOREIGN KEY (`unidade_id`) REFERENCES `unidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `fase`
--
ALTER TABLE `fase`
  ADD CONSTRAINT `fk_fase_editalSelacao1` FOREIGN KEY (`editalSelecao_id`) REFERENCES `editalselecao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fase_unidade1` FOREIGN KEY (`unidade_id`) REFERENCES `unidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `itemrenda`
--
ALTER TABLE `itemrenda`
  ADD CONSTRAINT `fk_itemRenda_grauParentesco1` FOREIGN KEY (`grauParentesco_id`) REFERENCES `grauparentesco` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_itemRenda_vinculoTrabalhista1` FOREIGN KEY (`vinculoTrabalhista_id`) REFERENCES `vinculotrabalhista` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_nivel_acessos1` FOREIGN KEY (`nivel_acessos_id`) REFERENCES `nivel_acessos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
