-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 10-Set-2019 às 21:42
-- Versão do servidor: 5.7.26
-- versão do PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdcarros`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carro`
--

DROP TABLE IF EXISTS `carro`;
CREATE TABLE IF NOT EXISTS `carro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `marca_codigo` varchar(50) NOT NULL,
  `preco` double(9,2) NOT NULL,
  `ano` char(4) NOT NULL,
  `foto` varchar(40) NOT NULL,
  `infos_adicionais` varchar(400) NOT NULL,
  `status` char(1) NOT NULL,
  `usuario_id` varchar(11) NOT NULL,
  `usuario_nome` varchar(50) NOT NULL,
  `usuario_tel1` varchar(11) NOT NULL,
  `usuario_tel2` varchar(11) DEFAULT NULL,
  `usuario_endereco` varchar(80) NOT NULL,
  `quilometragem` varchar(80) NOT NULL,
  `cambio` varchar(80) NOT NULL,
  `portas` char(1) NOT NULL,
  `combustivel` varchar(80) NOT NULL,
  `cor` varchar(80) NOT NULL,
  `placa` char(3) NOT NULL,
  `troca` char(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `marca_codigo` (`marca_codigo`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `carro`
--

INSERT INTO `carro` (`id`, `nome`, `marca_codigo`, `preco`, `ano`, `foto`, `infos_adicionais`, `status`, `usuario_id`, `usuario_nome`, `usuario_tel1`, `usuario_tel2`, `usuario_endereco`, `quilometragem`, `cambio`, `portas`, `combustivel`, `cor`, `placa`, `troca`) VALUES
(18, 'uno', '1', 80000.00, '2018', 'uno.jpg', '4 portas', 'A', '9', 'Hugo Teste', '31970707070', '', 'teste mg','20000','manual','4','diesel','preto','XXX','Não'),
(17, 'teste', '3', 100000.00, '2000', 'fundo.jpg', 'gsauhsa', 'A', '9', 'Hugo Teste', '31970707070', '', 'teste mg','20000','manual','4','diesel','preto','XXX','Não'),
(19, 'teste 6', '4', 666666.00, '2000', 'linea.jpg', 'carro incrivel', 'A', '9', 'Hugo Teste', '31970707070', '$detalhes', 'teste mg','20000','manual','4','diesel','preto','XXX','Não'),
(20, 'testÃƒÂ£', '1', 555.00, '2015', 'linea.jpg', '36', 'A', '9', 'Hugo Teste', '31970707070', '', 'teste mg','20000','manual','4','diesel','preto','XXX','Não'),
(21, 'teste', '3', 332.00, '2000', 'logo.png', '4', 'A', '11', 'Bruno', '31970707070', '', 'teste mg','20000','manual','4','diesel','preto','XXX','Não'),
(22, 'teste', '3', 123123.00, '1998', 'hb20.jpg', 'teste novo insert', 'A', '9', 'Hugo Teste', '31970707070', '', 'Sabará MG','20000','manual','4','diesel','preto','XXX','Não'),
(23, 'teste', '3', 123123.00, '1998', 'hb20.jpg', 'teste novo insert', 'A', '9', 'Hugo Teste', '31970707070', '', 'Sabará MG','20000','manual','4','diesel','preto','XXX','Não');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

DROP TABLE IF EXISTS `contato`;
CREATE TABLE IF NOT EXISTS `contato` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `situacao` char(1) NOT NULL,
  `mensagem` varchar(400) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`codigo`, `nome`, `email`, `situacao`, `mensagem`) VALUES
(1, 'teste', 'teste@teste.com', 'A', 'aaaaaa'),
(2, 'teste', 'teste@teste.com', 'A', 'aaaaaa'),
(3, 'teste', 'outrotesrte@tes.com', 'A', '123'),
(4, 'teste', 'a@a.com', 'A', 'teste'),
(5, 'teste123', 'teste@teste.com', 'A', 'msg teste'),
(6, 'teste 5', 'teste@teste.com', 'A', 'msg teste'),
(7, 'Bruno de Viterbo dos Anjos Mazzinghy', 'bmazzinghy@gmail.com', 'A', '1'),
(8, 'sfsnd ', 'bmazzinghy@gmail.com', 'A', 'das'),
(9, '', 'test@test.com', 'A', ''),
(10, '', 'teste@test', 'A', ''),
(11, 'teste', '', 'A', ''),
(12, '', '', 'A', 'test\r\n'),
(13, 'teste', 'test@test.com', 'A', 'aa'),
(14, '', '', 'A', ''),
(15, '', '', 'A', ''),
(16, 'teste', 'test@test.com', 'A', '454');

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

DROP TABLE IF EXISTS `marca`;
CREATE TABLE IF NOT EXISTS `marca` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `marca`
--

INSERT INTO `marca` (`codigo`, `nome`) VALUES
(1, 'Fiat'),
(2, 'Audi'),
(3, 'BMW'),
(4, 'Chevrolet'),
(5, 'Citroen'),
(6, 'Ford'),
(7, 'Honda'),
(8, 'Hyundai'),
(9, 'Jeep'),
(10, 'Mitsubishi'),
(11, 'Peugeot'),
(12, 'Renault'),
(13, 'Suzuki'),
(14, 'Toyota'),
(15, 'Volkswagem'),
(17, 'Outro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelo`
--

DROP TABLE IF EXISTS `modelo`;
CREATE TABLE IF NOT EXISTS `modelo` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `marca_codigo` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `marca_codigo` (`marca_codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `modelo`
--

INSERT INTO `modelo` (`codigo`, `nome`, `marca_codigo`) VALUES
(1, 'teste', '4'),
(2, 'teste 2', '4'),
(3, 'teste 3', '4'),
(4, 'teste 4', '4'),
(5, 'teste 5', '4'),
(6, 'teste 6', '4'),
(7, 'teste', '3'),
(8, 'uno', '1'),
(9, 'testÃ£', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `receber_anuncio`
--

DROP TABLE IF EXISTS `receber_anuncio`;
CREATE TABLE IF NOT EXISTS `receber_anuncio` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `situacao` char(1) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `receber_anuncio`
--

INSERT INTO `receber_anuncio` (`codigo`, `situacao`, `email`) VALUES
(1, 'A', 'teste@teste.com'),
(2, 'A', 'teste@teste.com'),
(3, 'A', 'teste@teste.com'),
(4, 'A', 'teste@teste.cmo123'),
(5, 'A', 'teste@teste.com123'),
(6, 'A', 'teste@teste.com123'),
(7, 'A', 'bmazzinghy@gmail.com'),
(8, 'A', 'bmazzinghy@gmail.com'),
(9, 'A', 'bmazzinghy@gmail.com'),
(10, 'A', 'bmazzinghy@gmail.com'),
(11, 'A', 'bmazzinghy@gmail.com'),
(12, 'A', 'bmazzinghy@gmail.com'),
(13, 'A', 'bmazzinghy@gmail.com'),
(14, 'A', 'bmazzinghy@gmail.com'),
(15, 'A', 'bmazzinghy@gmail.com'),
(16, 'A', 'bmazzinghy@gmail.com'),
(17, 'A', 'bmazzinghy@gmail.com'),
(18, 'A', 'bmazzinghy@gmail.com'),
(19, 'A', 'bmazzinghy@gmail.com'),
(20, 'A', 'bmazzinghy@gmail.com'),
(21, 'A', 'bmazzinghy@gmail.com'),
(22, 'A', 'bmazzinghy@gmail.com'),
(23, 'A', 'bmazzinghy@gmail.com'),
(24, 'A', 'bmazzinghy@gmail.com'),
(25, 'A', 'bmazzinghy@gmail.com'),
(26, 'A', 'bmazzinghy@gmail.com'),
(27, 'A', 'bmazzinghy@gmail.com'),
(28, 'A', 'bmazzinghy@gmail.com'),
(29, 'A', 'bmazzinghy@gmail.com'),
(30, 'A', 'bmazzinghy@gmail.com'),
(31, 'A', 'teste@test.com'),
(32, 'A', 'teste@test.com'),
(33, 'A', 'teste@test.com'),
(34, 'A', 'teste@test.com'),
(35, 'A', 'teste@test.com'),
(36, 'A', '2222@44');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `cpf` char(11) NOT NULL,
  `dt_nascimento` varchar(10) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `telefone2` varchar(11) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `cep` char(8) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `numero_casa` varchar(6) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(40) NOT NULL,
  `estado` char(2) NOT NULL,
  `tipo` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `cpf`, `dt_nascimento`, `telefone`, `telefone2`, `email`, `senha`, `cep`, `rua`, `numero_casa`, `bairro`, `cidade`, `estado`, `tipo`) VALUES
(9, 'Hugo Teste', '11122233344', '03/11/2001', '31970707070', '', 'teste@teste.com', '202cb962ac59075b964b07152d234b70', '34505360', 'Rua Prefeito VÃ­tor Fantini', '30', 'Centro', 'SabarÃ¡', 'MG', 'A'),
(11, 'Bruno', '236632', '14/01/1999', '12222222222', '', 'btest@btest.com', '0e5fb5c76fca16adbee503c9aff393cd', '34505000', '', '1', '', '', '', 'B'),
(12, 'Hugo Teste', '11122233311', 'aa/aa/aaaa', '31970707070', '31970707070', 'testeaaa@teste.com', '202cb962ac59075b964b07152d234b70', '34505360', 'Rua Prefeito VÃ­tor Fantini', '12', 'Centro', 'SabarÃ¡', 'MG', 'B'),
(13, 'Hugo Teste', '11122211112', '03/11/2001', '31970707070', '31970707070', 'testeasda@teste.com', '202cb962ac59075b964b07152d234b70', '34505360', 'Rua Prefeito VÃ­tor Fantini', '12', 'Centro', 'SabarÃ¡', 'MG', 'B');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
