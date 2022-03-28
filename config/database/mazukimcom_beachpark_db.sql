-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 25-Mar-2022 às 10:42
-- Versão do servidor: 10.3.34-MariaDB
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
-- Banco de dados: `mazukimcom_beachpark_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acomodacao`
--

CREATE TABLE `acomodacao` (
  `id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `subtitle` varchar(2500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `acomodacao`
--

INSERT INTO `acomodacao` (`id`, `title`, `subtitle`, `image`) VALUES
(4, 'Apartamentos', '                                <p>Para até 5 pessoas</p>                                ', 'public/site/imgs/acomodacao/2022/03/estrutura-image-0.jpg'),
(5, 'Testando', '<p>Insira uma observação do seu pacote.</p>', 'public/site/imgs/acomodacao/2022/03/estrutura-image-0-1648059494.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `page` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(2000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `banner`
--

INSERT INTO `banner` (`id`, `page`, `image`) VALUES
(1, 'home', 'public/site/imgs/banner/2022/03/banner-image-0.jpg'),
(2, 'home', 'public/site/imgs/banner/2022/03/banner-image-0-1646778565.jpg'),
(3, 'quemsomos', 'public/site/imgs/banner/2022/03/banner-image-0-1646779678.jpg'),
(4, 'acomodacao', 'public/site/imgs/banner/2022/03/banner-image-0-1647996484.jpg'),
(5, 'politicas', 'public/site/imgs/banner/2022/03/banner-image-0-1648053518.jpg'),
(6, 'tarifas', 'public/site/imgs/banner/2022/03/banner-image-0-1647998192.jpg'),
(8, 'ceara', 'public/site/imgs/banner/2022/03/banner-image-0-1648057773.jpg'),
(9, 'fortaleza', 'public/site/imgs/banner/2022/03/banner-image-0-1648055043.jpg'),
(10, 'reservas', 'public/site/imgs/banner/2022/03/banner-image-0-1647998468.jpg'),
(11, 'acomodacao', 'public/site/imgs/banner/2022/03/banner-image-0-1647998540.jpg'),
(12, 'estrutura', 'public/site/imgs/banner/2022/03/banner-image-0-1647998572.jpg'),
(13, 'servicos', 'public/site/imgs/banner/2022/03/banner-image-0-1648052307.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(800) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `msg` varchar(4000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `contact`
--

INSERT INTO `contact` (`id`, `name`, `tel`, `email`, `msg`) VALUES
(1, 'Nivs', '119748589', 'test@gmail.com', 'Testando.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `depoimento`
--

CREATE TABLE `depoimento` (
  `id` int(11) NOT NULL,
  `name` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `depoimento` varchar(9000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `depoimento`
--

INSERT INTO `depoimento` (`id`, `name`, `depoimento`) VALUES
(1, 'Rita Santos', 'Desde os atendentes às instalações e a limpeza de todo os ambientes, recomendo esse hotel!'),
(2, 'Emerson Amaro', 'Minha segunda vez me hospedando no Golden Beach Hotel com minha família. Funcionários bem atenciosos e educados e um ambiente tranquilo, muito bom pra quem está com a família!'),
(3, 'Paulo Polito', 'Quarto que ficamos foi excelente... Bem acima da expectativa! Uma sacada ampla com vista para o mar...Sensacional! O café da manhã é muito bom, com várias opções de frios, pães e os quentes também bem variados!');

-- --------------------------------------------------------

--
-- Estrutura da tabela `diferenciais`
--

CREATE TABLE `diferenciais` (
  `id` int(11) NOT NULL,
  `title` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(9000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `diferenciais`
--

INSERT INTO `diferenciais` (`id`, `title`, `image`) VALUES
(1, 'Apartamentos com vista para o mar', 'public/site/imgs/diferenciais/2022/03/diferenciais-image-0.jpg'),
(2, 'Estrutura de Lazer', 'public/site/imgs/diferenciais/2022/03/diferenciais-image-0-1646762367.jpg'),
(3, 'Localização Privilegiada', 'public/site/imgs/diferenciais/2022/03/diferenciais-image-0-1646762389.jpg'),
(4, 'Café da Manhã', 'public/site/imgs/diferenciais/2022/03/diferenciais-image-0-1646762431.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_acomodacao`
--

CREATE TABLE `itens_acomodacao` (
  `id` int(11) NOT NULL,
  `acomodacao_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `itens_acomodacao`
--

INSERT INTO `itens_acomodacao` (`id`, `acomodacao_id`, `name`, `description`, `image`) VALUES
(6, 4, 'Lorem Ipsum', '                        \r\n                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi u', 'public/site/imgs/acomodacao/2022/03/acomodacao-image.jpg'),
(7, 4, 'Lorem Ipsum', '                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'public/site/imgs/acomodacao/2022/03/acomodacao-image-1648000078.jpg'),
(8, 4, 'Lorem Ipsum', '                        \r\n                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi u', 'public/site/imgs/acomodacao/2022/03/acomodacao-image-1648000093.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_tarifa`
--

CREATE TABLE `itens_tarifa` (
  `id` int(11) NOT NULL,
  `tarifa_id` int(11) DEFAULT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `itens_tarifa`
--

INSERT INTO `itens_tarifa` (`id`, `tarifa_id`, `title`, `description`, `image`) VALUES
(2, 2, 'Apartamento sem varanda com café da Manhã', '                                    <p>Single // Double // Triple<p/>                                ', 'public/site/imgs/tarifas/2022/03/tarifa-image-1-1646772875.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `maravilhas`
--

CREATE TABLE `maravilhas` (
  `id` int(11) NOT NULL,
  `title` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `section` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(9000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `maravilhas`
--

INSERT INTO `maravilhas` (`id`, `title`, `section`, `image`) VALUES
(1, 'Sem Titulo', 'quartos', 'public/site/imgs/maravilhas/2022/03/maravilhas-image-0.jpg'),
(2, 'Sem Titulo', 'quartos', 'public/site/imgs/maravilhas/2022/03/maravilhas-image-0-1646762593.jpg'),
(3, 'Sem Titulo', 'lazer', 'public/site/imgs/maravilhas/2022/03/maravilhas-image-0-1646762763.jpg'),
(4, 'Sem Titulo', 'lazer', 'public/site/imgs/maravilhas/2022/03/maravilhas-image-0-1646762787.jpg'),
(5, 'Sem Titulo', 'hotel', 'public/site/imgs/maravilhas/2022/03/maravilhas-image-0-1646762803.jpg'),
(6, 'Sem Titulo', 'passeios', 'public/site/imgs/maravilhas/2022/03/maravilhas-image-0-1646764253.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(400) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`) VALUES
(1, 'test@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `politica`
--

CREATE TABLE `politica` (
  `id` int(11) NOT NULL,
  `title` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `politicas` varchar(9000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `politica`
--

INSERT INTO `politica` (`id`, `title`, `politicas`) VALUES
(1, 'Politicas do Hotel', '<h3><strong>CANCELAMENTO DE RESERVAS</strong></h3><p>Cancelamento em até 24 horas da chegada para evitar multa de 1 (uma) noite. Após esse prazo, será cobrada uma diária de multa em caso de cancelamento tardio. Em caso de não comparecimento, será cobrada 1 (uma) diária de multa.</p><h3><strong>INFORMAÇÕES IMPORTANTES</strong></h3><p>Check in a partir de 14h e Check out até 12h.</p><p>Tarifas sujeitas a reajuste sem prévio aviso.</p><p>É proibido fumar dentro dos apartamentos e nos corredores. O Hotel possui área especial para fumantes.</p><p>Permitimos pets de raças pequenas. (consultar regras para pets)</p><p>O Hotel não se responsabiliza por nenhum material ou objeto deixados em nossas dependências ou no cofre, pelo hóspede.</p><p>O Hotel não se responsabiliza por danos causados em decorrência de casos fortuitos ou de força maior.</p><p>O Hotel não se responsabiliza por mudanças na programação da cidade ou estado determinado por leis ou decretos.</p><p>As imagens utilizadas em sites e redes sociais representam a realidade do momento em que foram fotografadas, podendo ocorrer variações de móveis, cores e configuração</p>');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `inicio_data` datetime NOT NULL,
  `fim_data` datetime NOT NULL,
  `noites` int(11) NOT NULL,
  `apartamentos` int(11) NOT NULL,
  `adultos` int(11) NOT NULL,
  `criancas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(2500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `section` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `sections`
--

INSERT INTO `sections` (`id`, `title`, `description`, `section`, `image`) VALUES
(1, 'Recepção', '                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos aut beatae incidunt voluptate rerum, nihil, ad delectus iure recusandae eligendi laborum impedit! Hic ipsa illum eaque officia eius. Sapiente, harum. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente explicabo tempore maiores voluptas quod voluptatibus doloremque delectus aut modi veritatis adipisci repellat autem asperiores, nisi dolores consequatur molestias reprehenderit iste!<p/>                                ', 'estrutura', 'public/site/imgs/estrutura/2022/03/estrutura-image-0.jpg'),
(2, 'Serviço de Quarto', '                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos aut beatae incidunt voluptate rerum, nihil, ad delectus iure recusandae eligendi laborum impedit! Hic ipsa illum eaque officia eius. Sapiente, harum. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente explicabo tempore maiores voluptas quod voluptatibus doloremque delectus aut modi veritatis adipisci repellat autem asperiores, nisi dolores consequatur molestias reprehenderit iste!<p/>                                ', 'estrutura', 'public/site/imgs/estrutura/2022/03/estrutura-image-0-1646765414.jpg'),
(3, 'Viçosa do Ceará', '                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos aut beatae incidunt voluptate rerum, nihil, ad delectus iure recusandae eligendi laborum impedit! Hic ipsa illum eaque officia eius. Sapiente, harum. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente explicabo tempore maiores voluptas quod voluptatibus doloremque delectus aut modi veritatis adipisci repellat autem asperiores, nisi dolores consequatur molestias reprehenderit iste!<p/>                                ', 'ceara', 'public/site/imgs/ceara/2022/03/ceara-image-0.jpg'),
(4, 'Sobral', '                                                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos aut beatae incidunt voluptate rerum, nihil, ad delectus iure recusandae eligendi laborum impedit! Hic ipsa illum eaque officia eius. Sapiente, harum. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente explicabo tempore maiores voluptas quod voluptatibus doloremque delectus aut modi veritatis adipisci repellat autem asperiores, nisi dolores consequatur molestias reprehenderit iste!<p/>                                                                ', 'ceara', 'public/site/imgs/ceara/2022/03/ceara-image-0-1646765561.jpg'),
(5, 'Visite o Centro Dragão do Mar de Arte e Cultura', '                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos aut beatae incidunt voluptate rerum, nihil, ad delectus iure recusandae eligendi laborum impedit! Hic ipsa illum eaque officia eius. Sapiente, harum. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente explicabo tempore maiores voluptas quod voluptatibus doloremque delectus aut modi veritatis adipisci repellat autem asperiores, nisi dolores consequatur molestias reprehenderit iste!<p/>                                ', 'ceara', 'public/site/imgs/ceara/2022/03/ceara-image-0-1646767092.jpg'),
(6, 'Visite o Centro Dragão do Mar de Arte e Cultura', '                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos aut beatae incidunt voluptate rerum, nihil, ad delectus iure recusandae eligendi laborum impedit! Hic ipsa illum eaque officia eius. Sapiente, harum. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente explicabo tempore maiores voluptas quod voluptatibus doloremque delectus aut modi veritatis adipisci repellat autem asperiores, nisi dolores consequatur molestias reprehenderit iste!<p/>                                ', 'fortaleza', 'public/site/imgs/fortaleza/2022/03/fortaleza-image-0-1646767523.jpg'),
(7, 'Test', '                                    <p>Test<p/>                                ', 'fortaleza', 'public/site/imgs/fortaleza/2022/03/fortaleza-image-0-1646778318.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `id` int(11) NOT NULL,
  `description` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(2000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`id`, `description`, `image`) VALUES
(3, '                                    <p>Dê uma breve descrição.<p/>                                ', 'public/site/imgs/servicos/2022/03/servicos-image-0.jpg'),
(5, '                                    <p>Dê uma breve descrição.<p/>                                ', 'public/site/imgs/servicos/2022/03/servicos-image-0-1647997128.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarifa`
--

CREATE TABLE `tarifa` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tarifa`
--

INSERT INTO `tarifa` (`id`, `title`) VALUES
(2, 'Apartamento sem varanda com café da Manhã');

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
(1, 'adm', 'adm123');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `acomodacao`
--
ALTER TABLE `acomodacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `depoimento`
--
ALTER TABLE `depoimento`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `diferenciais`
--
ALTER TABLE `diferenciais`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `itens_acomodacao`
--
ALTER TABLE `itens_acomodacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_85C9D8A04E256984` (`acomodacao_id`);

--
-- Índices para tabela `itens_tarifa`
--
ALTER TABLE `itens_tarifa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6F3B3FD5FE3B76B` (`tarifa_id`);

--
-- Índices para tabela `maravilhas`
--
ALTER TABLE `maravilhas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `politica`
--
ALTER TABLE `politica`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tarifa`
--
ALTER TABLE `tarifa`
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
-- AUTO_INCREMENT de tabela `acomodacao`
--
ALTER TABLE `acomodacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `depoimento`
--
ALTER TABLE `depoimento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `diferenciais`
--
ALTER TABLE `diferenciais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `itens_acomodacao`
--
ALTER TABLE `itens_acomodacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `itens_tarifa`
--
ALTER TABLE `itens_tarifa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `maravilhas`
--
ALTER TABLE `maravilhas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `politica`
--
ALTER TABLE `politica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tarifa`
--
ALTER TABLE `tarifa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `itens_acomodacao`
--
ALTER TABLE `itens_acomodacao`
  ADD CONSTRAINT `FK_85C9D8A04E256984` FOREIGN KEY (`acomodacao_id`) REFERENCES `acomodacao` (`id`);

--
-- Limitadores para a tabela `itens_tarifa`
--
ALTER TABLE `itens_tarifa`
  ADD CONSTRAINT `FK_6F3B3FD5FE3B76B` FOREIGN KEY (`tarifa_id`) REFERENCES `tarifa` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
