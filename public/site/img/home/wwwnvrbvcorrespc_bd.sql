-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 13-Dez-2021 às 15:30
-- Versão do servidor: 10.3.32-MariaDB
-- versão do PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `wwwnvrbvcorrespc_bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `banner`
--

INSERT INTO `banner` (`id`, `title`, `description`, `action`, `url`, `image`) VALUES
(1, 'assessoria financeira', 'AntecipaÃ§Ã£o de Parcelas, Segunda Via de Boleto e QuitaÃ§Ã£o de Contrato', 'CONTATO IMEDIATO', 'http://nvrbv-corresp.com.br/whatsapp', 'public/admin/images/images/2021/10/assessoria-financeira.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `logo` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `brand`
--

INSERT INTO `brand` (`id`, `logo`, `icon`) VALUES
(1, 'public/admin/images/images/2021/10/logo.png', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `minText` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `mission` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `vision` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `virtue` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `company`
--

INSERT INTO `company` (`id`, `title`, `description`, `minText`, `action`, `image`, `mission`, `vision`, `virtue`) VALUES
(1, 'ASSESSORIA FINANCEIRA', '<p>Assessoria financeira especializada em realizar a intermedia&ccedil;&atilde;o entre consumidor final e o Banco de destino. Somos uma empresa parceira e autorizada a realizar servi&ccedil;os dentro da &aacute;rea financeira. Sempre buscamos gerar para voc&ecirc; o pagamento do valor justo no contrato que tenha estabelecido.<br />\r\n<br />\r\nNosso trabalho &eacute; 100% transparente e temos como valores a honestidade, imparcialidade, seguran&ccedil;a e respeito. Entre em contato conosco agora mesmo!</p>\r\n', 'Assessoria financeira especializada em realizar a intermediaÃ§Ã£o entre consumidor final e o Banco de destino. Somos uma empresa parceira e autorizada a realizar serviÃ§os dentro da Ã¡rea financeira. Sempre buscamos gerar para vocÃª o pagamento do valor justo no contrato que tenha estabelecido.<br><br>Nosso trabalho Ã© 100% transparente e temos como valores a honestidade, imparcialidade, seguranÃ§a e respeito. Entre em contato conosco agora mesmo!', 'QUEM SOMOS', 'public/admin/images/images/2021/10/assessoria-financeira-1635385353.png', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `url` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `whatsapp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `iframe` varchar(5000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `config`
--

INSERT INTO `config` (`id`, `url`, `title`, `email`, `phone`, `whatsapp`, `address`, `iframe`) VALUES
(1, '', 'Nerve Correspondente - Bv', 'contato@nvrbv-corresp.com.br', '11 94144-5064', '11 94144-5064', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subtitle` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `contact`
--

INSERT INTO `contact` (`id`, `title`, `subtitle`, `action`, `image`) VALUES
(1, 'Fale Conosco', 'Agora Mesmo', 'Entrar em contato', 'public/admin/images/images/2021/10/fale-conosco.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `google`
--

CREATE TABLE `google` (
  `id` int(11) NOT NULL,
  `manager` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ads` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `analitycs` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `goalsend` int(11) NOT NULL,
  `goalclick` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `google`
--

INSERT INTO `google` (`id`, `manager`, `ads`, `analitycs`, `goalsend`, `goalclick`) VALUES
(1, 'GTM-5TTDJXX', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer` varchar(2000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `service`
--

INSERT INTO `service` (`id`, `title`, `description`, `image`) VALUES
(1, ' 2Âª Via de Boleto', '<p>Precisa emitir a&nbsp;2&ordf;Via de Boleto?</p>\r\n\r\n<p>Aqui, voc&ecirc; pode<strong>&nbsp;Solicitar a segunda via do seu boleto&nbsp;</strong>de forma r&aacute;pida, pr&aacute;tica e sem sair de casa. Basta nos&nbsp;informar seus dados que emitimos seus&nbsp;boletos!&nbsp;</p>\r\n\r\n<p>Somos autorizadas &nbsp;e emitimos 2&ordf;via de boletos, atendimento r&aacute;pido por&nbsp;Whatsapp!&nbsp;</p>\r\n', 'public/admin/images/images/2021/10/2-via-de-boleto.jpg'),
(2, 'QuitaÃ§Ã£o de Contrato', '<p>Quer<strong>&nbsp;quitar</strong>&nbsp;seu&nbsp;<strong>Contrato</strong>?&nbsp;</p>\r\n\r\n<p>N&oacute;s&nbsp;podemos lhe&nbsp;<strong>ajudar!</strong>&nbsp;</p>\r\n\r\n<p>Somos Especialistas em servi&ccedil;os financeiros e podemos lhe conduzir&nbsp;em todos os tr&acirc;mites para que&nbsp;voc&ecirc; possa<strong>&nbsp;Quitar</strong>&nbsp;seu&nbsp;<strong>contrato,</strong>&nbsp;excluindo de vez ,os juros&nbsp;que&nbsp;viriam caso o financiamento fosse levado at&eacute; o fim,&nbsp;lhe ajudamos&nbsp;de forma r&aacute;pida e sem complica&ccedil;&atilde;o!&nbsp;</p>\r\n\r\n<p>Conte com nossos servi&ccedil;os de Assessoria Financeira!</p>\r\n', 'public/admin/images/images/2021/10/quitacao-de-contrato.jpg'),
(3, 'AntecipaÃ§Ã£o de Parcelas', '<p>Antecipa&ccedil;&atilde;o de Parcelas!</p>\r\n\r\n<p>Quer saber o quanto voc&ecirc; pode economizar se&nbsp;<strong>antecipar</strong>&nbsp;as parcelas do seu financiamento?&nbsp;</p>\r\n\r\n<p>&nbsp;Voc&ecirc;&nbsp;pode contar com os nossos servi&ccedil;os&nbsp;de&nbsp;<strong>antecipa&ccedil;&atilde;o</strong>&nbsp;de parcela e diminuir juros!&nbsp;</p>\r\n\r\n<p><strong>Somos Assessoria Financeira</strong>&nbsp;e prestadores de servi&ccedil;os financeiros autorizados &nbsp;oferecemos o&nbsp;<strong>servi&ccedil;o de antecipa&ccedil;&atilde;o de parcela!</strong>&nbsp;</p>\r\n\r\n<p><strong>Entre em Contato Agora Mesmo!</strong></p>\r\n', 'public/admin/images/images/2021/10/antecipacao-de-parcelas.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicead`
--

CREATE TABLE `servicead` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `servicead`
--

INSERT INTO `servicead` (`id`, `title`, `subtitle`, `action`) VALUES
(1, 'ServiÃ§os Financeiros', 'Confira Todos os ServiÃ§os Oferecidos', 'CONFERIR');

-- --------------------------------------------------------

--
-- Estrutura da tabela `simulator`
--

CREATE TABLE `simulator` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `simulator`
--

INSERT INTO `simulator` (`id`, `title`, `action`, `image`) VALUES
(1, '\r\n                                        ASSEssORIA FINAnCEIRA                                    ', 'CONTRATAR AGORA', 'public/admin/images/images/2021/10/assesoria-finaceira.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `social`
--

CREATE TABLE `social` (
  `id` int(11) NOT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `youtube` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `testimony`
--

CREATE TABLE `testimony` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `testimony` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `user`, `password`) VALUES
(1, 'admin', '$2y$10$EHRPOxKz38.2Sgzs4v0PRulw.7LDuCO.xf/bF.WmSc19la5OGgHYi');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `google`
--
ALTER TABLE `google`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `servicead`
--
ALTER TABLE `servicead`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `simulator`
--
ALTER TABLE `simulator`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `testimony`
--
ALTER TABLE `testimony`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `google`
--
ALTER TABLE `google`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `servicead`
--
ALTER TABLE `servicead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `simulator`
--
ALTER TABLE `simulator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `social`
--
ALTER TABLE `social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `testimony`
--
ALTER TABLE `testimony`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
