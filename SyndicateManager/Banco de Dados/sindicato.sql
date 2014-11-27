-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27-Nov-2014 às 05:37
-- Versão do servidor: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sindicato`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `associado`
--

CREATE TABLE IF NOT EXISTS `associado` (
`matricula` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `pai` varchar(255) DEFAULT NULL,
  `mae` varchar(255) DEFAULT NULL,
  `data_nascimento` date NOT NULL,
  `local_trabalho` varchar(255) NOT NULL,
  `nirf` varchar(255) NOT NULL,
  `area_total` varchar(255) NOT NULL,
  `tipo_trabalho` varchar(255) NOT NULL,
  `area_trabalhada` varchar(255) NOT NULL,
  `rg` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `cart_profissional` varchar(255) DEFAULT NULL,
  `serie` varchar(255) DEFAULT NULL,
  `titulo_eleitor` varchar(255) DEFAULT NULL,
  `registro_nascimento` varchar(255) NOT NULL,
  `livro` varchar(255) NOT NULL,
  `Fis` varchar(255) NOT NULL,
  `lider_familiar` varchar(255) DEFAULT NULL,
  `data_admissao` date NOT NULL,
  `data_pagamento` date NOT NULL,
  `escolaridade_id` int(11) NOT NULL,
  `estado_civil_id` int(11) NOT NULL,
  `cidade_id` int(11) NOT NULL,
  `endereco_id` int(11) NOT NULL,
  `cartorio` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE IF NOT EXISTS `cidade` (
`id` int(11) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `uf` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=168 ;

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`id`, `cidade`, `uf`) VALUES
(1, 'Acari', 'RN'),
(2, 'Açu', 'RN'),
(3, 'Afonso Bezerra', 'RN'),
(4, 'Água Nova', 'RN'),
(5, 'Alexandria', 'RN'),
(6, 'Almino Afonso', 'RN'),
(7, 'Alto do Rodrigues', 'RN'),
(8, 'Angicos', 'RN'),
(9, 'Antônio Martins', 'RN'),
(10, 'Apodi', 'RN'),
(11, 'Areia Branca', 'RN'),
(12, 'Arês', 'RN'),
(13, 'Augusto Severo', 'RN'),
(14, 'Baía Formosa', 'RN'),
(15, 'Baraúna', 'RN'),
(16, 'Barcelona', 'RN'),
(17, 'Bento Fernandes', 'RN'),
(18, 'Bodó', 'RN'),
(19, 'Bom Jesus', 'RN'),
(20, 'Brejinho', 'RN'),
(21, 'Caiçara do Norte', 'RN'),
(22, 'Caiçara do Rio do Vento', 'RN'),
(23, 'Caicó', 'RN'),
(24, 'Campo Redondo', 'RN'),
(25, 'Canguaretama', 'RN'),
(26, 'Caraúbas', 'RN'),
(27, 'Carnaúba dos Dantas', 'RN'),
(28, 'Carnaubais', 'RN'),
(29, 'Ceará-Mirim', 'RN'),
(30, 'Cerro Corá', 'RN'),
(31, 'Coronel Ezequiel', 'RN'),
(32, 'Coronel João Pessoa', 'RN'),
(33, 'Cruzeta', 'RN'),
(34, 'Currais Novos', 'RN'),
(35, 'Doutor Severiano', 'RN'),
(36, 'Encanto', 'RN'),
(37, 'Equador', 'RN'),
(38, 'Espírito Santo', 'RN'),
(39, 'Extremoz', 'RN'),
(40, 'Felipe Guerra', 'RN'),
(41, 'Fernando Pedroza', 'RN'),
(42, 'Florânia', 'RN'),
(43, 'Francisco Dantas', 'RN'),
(44, 'Frutuoso Gomes', 'RN'),
(45, 'Galinhos', 'RN'),
(46, 'Goianinha', 'RN'),
(47, 'Governador Dix-Sept Rosado', 'RN'),
(48, 'Grossos', 'RN'),
(49, 'Guamaré', 'RN'),
(50, 'Ielmo Marinho', 'RN'),
(51, 'Ipanguaçu', 'RN'),
(52, 'Ipueira', 'RN'),
(53, 'Itajá', 'RN'),
(54, 'Itaú', 'RN'),
(55, 'Jaçanã', 'RN'),
(56, 'Jandaíra', 'RN'),
(57, 'Janduís', 'RN'),
(58, 'Januário Cicco', 'RN'),
(59, 'Japi', 'RN'),
(60, 'Jardim de Angicos', 'RN'),
(61, 'Jardim de Piranhas', 'RN'),
(62, 'Jardim do Seridó', 'RN'),
(63, 'João Câmara', 'RN'),
(64, 'João Dias', 'RN'),
(65, 'José da Penha', 'RN'),
(66, 'Jucurutu', 'RN'),
(67, 'Jundiá', 'RN'),
(68, 'Lagoa de Pedras', 'RN'),
(69, 'Lagoa de Velhos', 'RN'),
(70, 'Lagoa d`Anta', 'RN'),
(71, 'Lagoa Nova', 'RN'),
(72, 'Lagoa Salgada', 'RN'),
(73, 'Lajes', 'RN'),
(74, 'Lajes Pintadas', 'RN'),
(75, 'Lucrécia', 'RN'),
(76, 'Luís Gomes', 'RN'),
(77, 'Macaíba', 'RN'),
(78, 'Macau', 'RN'),
(79, 'Major Sales', 'RN'),
(80, 'Marcelino Vieira', 'RN'),
(81, 'Martins', 'RN'),
(82, 'Maxaranguape', 'RN'),
(83, 'Messias Targino', 'RN'),
(84, 'Montanhas', 'RN'),
(85, 'Monte Alegre', 'RN'),
(86, 'Monte das Gameleiras', 'RN'),
(87, 'Mossoró', 'RN'),
(88, 'Natal', 'RN'),
(89, 'Nísia Floresta', 'RN'),
(90, 'Nova Cruz', 'RN'),
(91, 'Olho-d`Água do Borges', 'RN'),
(92, 'Ouro Branco', 'RN'),
(93, 'Paraná', 'RN'),
(94, 'Paraú', 'RN'),
(95, 'Parazinho', 'RN'),
(96, 'Parelhas', 'RN'),
(97, 'Parnamirim', 'RN'),
(98, 'Passa e Fica', 'RN'),
(99, 'Passagem', 'RN'),
(100, 'Patu', 'RN'),
(101, 'Pau dos Ferros', 'RN'),
(102, 'Pedra Grande', 'RN'),
(103, 'Pedra Preta', 'RN'),
(104, 'Pedro Avelino', 'RN'),
(105, 'Pedro Velho', 'RN'),
(106, 'Pendências', 'RN'),
(107, 'Pilões', 'RN'),
(108, 'Poço Branco', 'RN'),
(109, 'Portalegre', 'RN'),
(110, 'Porto do Mangue', 'RN'),
(111, 'Pureza', 'RN'),
(112, 'Rafael Fernandes', 'RN'),
(113, 'Rafael Godeiro', 'RN'),
(114, 'Riacho da Cruz', 'RN'),
(115, 'Riacho de Santana', 'RN'),
(116, 'Riachuelo', 'RN'),
(117, 'Rio do Fogo', 'RN'),
(118, 'Rodolfo Fernandes', 'RN'),
(119, 'Ruy Barbosa', 'RN'),
(120, 'Santa Cruz', 'RN'),
(121, 'Santa Maria', 'RN'),
(122, 'Santana do Matos', 'RN'),
(123, 'Santana do Seridó', 'RN'),
(124, 'Santo Antônio', 'RN'),
(125, 'São Bento do Norte', 'RN'),
(126, 'São Bento do Trairí', 'RN'),
(127, 'São Fernando', 'RN'),
(128, 'São Francisco do Oeste', 'RN'),
(129, 'São Gonçalo do Amarante', 'RN'),
(130, 'São João do Sabugi', 'RN'),
(131, 'São José de Mipibu', 'RN'),
(132, 'São José do Campestre', 'RN'),
(133, 'São José do Seridó', 'RN'),
(134, 'São Miguel', 'RN'),
(135, 'São Miguel do Gostoso', 'RN'),
(136, 'São Paulo do Potengi', 'RN'),
(137, 'São Pedro', 'RN'),
(138, 'São Rafael', 'RN'),
(139, 'São Tomé', 'RN'),
(140, 'São Vicente', 'RN'),
(141, 'Senador Elói de Souza', 'RN'),
(142, 'Senador Georgino Avelino', 'RN'),
(143, 'Serra Caiada', 'RN'),
(144, 'Serra de São Bento', 'RN'),
(145, 'Serra do Mel', 'RN'),
(146, 'Serra Negra do Norte', 'RN'),
(147, 'Serrinha', 'RN'),
(148, 'Serrinha dos Pintos', 'RN'),
(149, 'Severiano Melo', 'RN'),
(150, 'Sítio Novo', 'RN'),
(151, 'Taboleiro Grande', 'RN'),
(152, 'Taipu', 'RN'),
(153, 'Tangará', 'RN'),
(154, 'Tenente Ananias', 'RN'),
(155, 'Tenente Laurentino Cruz', 'RN'),
(156, 'Tibau', 'RN'),
(157, 'Tibau do Sul', 'RN'),
(158, 'Timbaúba dos Batistas', 'RN'),
(159, 'Touros', 'RN'),
(160, 'Triunfo Potiguar', 'RN'),
(161, 'Umarizal', 'RN'),
(162, 'Upanema', 'RN'),
(163, 'Várzea', 'RN'),
(164, 'Venha-Ver', 'RN'),
(165, 'Vera Cruz', 'RN'),
(166, 'Viçosa', 'RN'),
(167, 'Vila Flor', 'RN');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE IF NOT EXISTS `endereco` (
`id` int(11) NOT NULL,
  `logradouro` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `cidade_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `escolaridade`
--

CREATE TABLE IF NOT EXISTS `escolaridade` (
`id` int(11) NOT NULL,
  `escolaridade` varchar(45) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `escolaridade`
--

INSERT INTO `escolaridade` (`id`, `escolaridade`) VALUES
(1, 'Nenhum'),
(2, 'Ensino Fundamental Completo'),
(3, 'Ensino Fundamental Incompleto'),
(4, 'Ensino Médio Completo'),
(5, 'Ensino Médio Incompleto'),
(6, 'Ensino Superior Completo'),
(7, 'Ensino Superior Incompleto'),
(8, 'Pós-Graduação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado_civil`
--

CREATE TABLE IF NOT EXISTS `estado_civil` (
`id` int(11) NOT NULL,
  `estado_civil` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `estado_civil`
--

INSERT INTO `estado_civil` (`id`, `estado_civil`) VALUES
(1, 'Solteiro(a)'),
(2, 'Cadasado(a)'),
(3, 'Divorciado(a)'),
(4, 'Viúvo(a)');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `login` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `id_acesso` int(11) NOT NULL DEFAULT '1',
  `associado_matricula` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`login`, `senha`, `id_acesso`, `associado_matricula`) VALUES
('Tec_alfredo', 'af48bd3e6b19d3905b5d499e374c229c7255939e', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `associado`
--
ALTER TABLE `associado`
 ADD PRIMARY KEY (`matricula`), ADD UNIQUE KEY `nirf_UNIQUE` (`nirf`), ADD UNIQUE KEY `rg_UNIQUE` (`rg`), ADD UNIQUE KEY `cpf_UNIQUE` (`cpf`), ADD UNIQUE KEY `titulo_eleitor_UNIQUE` (`titulo_eleitor`), ADD KEY `fk_associado_escolaridade1_idx` (`escolaridade_id`), ADD KEY `fk_associado_estado_civil1_idx` (`estado_civil_id`), ADD KEY `fk_associado_cidade1_idx` (`cidade_id`), ADD KEY `fk_associado_endereco1_idx` (`endereco_id`);

--
-- Indexes for table `cidade`
--
ALTER TABLE `cidade`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_endereco_cidade1_idx` (`cidade_id`);

--
-- Indexes for table `escolaridade`
--
ALTER TABLE `escolaridade`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estado_civil`
--
ALTER TABLE `estado_civil`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`login`), ADD KEY `fk_usuario_associado1_idx` (`associado_matricula`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `associado`
--
ALTER TABLE `associado`
MODIFY `matricula` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cidade`
--
ALTER TABLE `cidade`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=168;
--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `escolaridade`
--
ALTER TABLE `escolaridade`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `estado_civil`
--
ALTER TABLE `estado_civil`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
