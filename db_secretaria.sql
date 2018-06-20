-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20-Jun-2018 às 03:13
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_secretaria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `login` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `administradores`
--

INSERT INTO `administradores` (`id`, `nome`, `login`, `email`, `senha`) VALUES
(1, 'Administrador', 'admin', 'admin@gmail.com', '$1$dUzG7yvr$xClZ8z96.xcvCQky0Bw/f/'),
(3, 'Keury Guerra', 'keury', 'keury@gmail.com', '$1$iyaQIfW3$TFACZCnZw4GxiYv2BF041/');

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `id` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `matricula` varchar(20) NOT NULL,
  `num_chamada` int(2) NOT NULL,
  `data_nascimento` date NOT NULL,
  `naturalidade` varchar(30) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `complemento_endereco` varchar(50) NOT NULL,
  `turno` varchar(20) NOT NULL,
  `data_cadastro` date NOT NULL,
  `escola_origem` varchar(100) NOT NULL,
  `opcao_medicamento` varchar(50) DEFAULT NULL,
  `medicamento` varchar(50) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `comentario` text,
  `login` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id`, `id_curso`, `nome`, `matricula`, `num_chamada`, `data_nascimento`, `naturalidade`, `rg`, `cpf`, `nis`, `cep`, `complemento_endereco`, `turno`, `data_cadastro`, `escola_origem`, `opcao_medicamento`, `medicamento`, `telefone`, `celular`, `comentario`, `login`, `email`, `senha`) VALUES
(1, 1, 'Josefredo José', '1234567', 1, '1985-11-01', 'Brasileiro', '20.055.903-5', '704.136.430-50', '123456', '72926-068', '', 'Integral', '2018-06-01', 'Universidade Infantil', NULL, NULL, NULL, NULL, NULL, 'aluno', 'jojo@gmail.com', '$1$cJhduJBo$z4GFDvboTw0Ngs/2rw5F0/'),
(2, 2, 'Caio Monteiro', '668113', 1, '1999-08-30', 'Brasileiro', '36.971.570-6', '782.014.310-06', '124566', '13424369', '', 'Integral', '2018-06-20', 'Monteiro Lobato', NULL, 'Nao', '', '859866352147', '							', 'caiob', 'caiobaorboza@gmail.com', '$1$v25m1.D0$BvDBETFfGzyUnb2J7prim.'),
(3, 4, 'Ana Clara Sousa', '818837', 1, '2001-11-05', 'Brasileiro', '11.533.635-7', '428.241.270-40', '', '29701504', '', 'Integral', '2018-06-20', 'Cassimiro', 'Dorflex', 'Sim', '34732222', '85997258045', 'Dores de cabeça frequentes							', 'clara18', 'anaclara2018@gmail.com', '$1$fl73I7e2$fYU94ArQhQ/JaQ/fgwFWh.'),
(4, 2, 'Camila Oliveira', '428463', 2, '2001-04-11', 'Brasileiro', '45.250.123-4', '370.841.950-25', '157963', '88357360', '', 'Integral', '2018-06-20', 'Monteiro Lobato', NULL, 'Nao', '34728654', '', '						', 'camila123', 'kaka18@hotmail.com', '$1$jw4qBked$znu7evMwedvRQzedLll8W.'),
(5, 1, 'Thiago Silveira', '548158', 2, '2000-07-13', 'Brasileiro', '23.340.749-2', '649.361.660-30', '197634', '70275510', '', 'Integral', '2018-06-20', 'Colégio Fragoso', NULL, 'Nao', '34732296', '', '							', 'iago', 'iago@gmail.com', '$1$uytV7imE$QjaMX0kuT1HJAGGNLbrNX.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividades`
--

CREATE TABLE `atividades` (
  `id` int(11) NOT NULL,
  `id_professor` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `data_entrega` date NOT NULL,
  `conteudo` text NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Andamento'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `atividades`
--

INSERT INTO `atividades` (`id`, `id_professor`, `id_curso`, `data_entrega`, `conteudo`, `status`) VALUES
(1, 5, 1, '2018-06-21', 'Teste', 'Andamento'),
(3, 6, 2, '2018-06-21', 'TD de 40 questões valendo 0,5 pontos na parcial.', 'Andamento'),
(4, 6, 1, '2018-06-20', 'TD de 40 questões valendo frequência', 'Andamento');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `texto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `coordenadores`
--

CREATE TABLE `coordenadores` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `login` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `cpf` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `coordenadores`
--

INSERT INTO `coordenadores` (`id`, `nome`, `login`, `email`, `senha`, `cpf`) VALUES
(1, 'Pedro José', 'coordenador', 'pedrojose@gmail.com', '$1$cJhduJBo$z4GFDvboTw0Ngs/2rw5F0/', '451.096.570-25'),
(2, 'Ricardo Guerra', 'ricardo', 'ricardo@gmail.com', '$1$yL.f352W$3BDUIoIAw1PVPmmeW8D0E0', '071.514.560-69'),
(3, 'Maria Ruanita', 'ruaniata', 'ruanita@gmail.com', '$1$PPexoUtk$bxRK0fBEObufE.t0LAJOB.', '813.118.330-05');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id`, `nome`) VALUES
(1, 'Informática 3'),
(2, 'Enfermagem 3'),
(3, 'Finanças 2'),
(4, 'Moda 1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

CREATE TABLE `empresas` (
  `id` int(11) NOT NULL,
  `instituicao` varchar(200) NOT NULL,
  `razao_social` varchar(200) NOT NULL,
  `nome_fantasia` varchar(200) NOT NULL,
  `cnpj` varchar(30) NOT NULL,
  `especificacao` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `nome_supervisor` varchar(200) NOT NULL,
  `email_supervisor` varchar(200) NOT NULL,
  `observacoes` text NOT NULL,
  `numero_vagas` int(11) NOT NULL,
  `escola_beneficiada` varchar(200) NOT NULL,
  `municipio_escola` varchar(200) NOT NULL,
  `nome_representante` varchar(200) NOT NULL,
  `email_representante` varchar(200) NOT NULL,
  `cpf_representante` varchar(200) NOT NULL,
  `rg_representante` varchar(200) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `empresas`
--

INSERT INTO `empresas` (`id`, `instituicao`, `razao_social`, `nome_fantasia`, `cnpj`, `especificacao`, `email`, `telefone`, `nome_supervisor`, `email_supervisor`, `observacoes`, `numero_vagas`, `escola_beneficiada`, `municipio_escola`, `nome_representante`, `email_representante`, `cpf_representante`, `rg_representante`, `cep`, `numero`, `complemento`) VALUES
(1, 'Pública', 'Alter Table Desenvolvimento', 'Alter Table Desenvolvimento', '1234566', 'Web Desenvolvimento', 'contato@altertable.com.br', '40028922', 'Marcones Calisto', 'marcones@altertable.com.br', 'Vazio', 5, 'EEEP. Professor Onélio Porto', 'Fortaleza', 'Mercedes Bento', 'mercedes@altertable.com.br', '741852', '741822', '60766520', 127, 'Vazio'),
(3, 'Particular', 'Hefestus Web Desenvolvimento', 'Hefestus Web Desenvolvimento', '789456123', 'Web Desenvolvimento', 'contato@hefestus.com.br', '34732222', 'Matheus Lemos', 'lemos@hefestus.com.br', 'Vazio', 2, 'EEEP. Professor Onélio Porto', 'Fortaleza', 'Aécio Pereira', 'aeciopereira@hotmail.com', '369258147', '369258147', '60766650', 5200, 'Vazio'),
(4, 'Particular', 'Torteria Quinta-feira', 'Torteria Quinta-feira', '852741963', 'Torteria Caseira', 'contato@torteriaquintafeira.com.br', '34735896', 'Clara Bela', 'bela@torteriaquintafeira.com.br', 'Vazio', 1, 'Escola Técnica de Maracanaú - ETM SOBEM', 'Maracanaú', 'Samia Alcantara', 'samia@etm.edu.br', '789456123', '789456123', '60852369', 250, 'Vazio'),
(5, 'Pública', 'Petrobrasil', 'Petrobrasil', '357159852', 'Extração e Refinamento de petróleo', 'contato@petrobrasil.com.br', '34278895', 'Sergio Estorbelo', 'supervisao@petrobrasil.com', 'Vazio', 250, 'Escola Petrolífera de Petrolina', 'Petrolina', 'Pedro Petrônio', 'estagio@escolapetrolifera.com', '1597536482', '7531598246', '73698521', 0, 'Vazio'),
(6, 'Pública', 'Bitcoit', 'Bitcoit', '6667589', 'Mineradora de Bitcoin', 'estagio@bitcoit.com', '36987415', 'Marcos Bitcoin', 'administracao@bitcoit.com', 'Vazio', 8, 'Leonel de Moura Brizola', 'Fortaleza', 'Estagnário Moura', 'estagiomoura@gmail.com', '85822', '85822', '89632157', 123, 'Vazio');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `id_professor` int(11) NOT NULL,
  `media_primeiro_semestre` double(3,1) NOT NULL,
  `media_segundo_semestre` double(3,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `notas`
--

INSERT INTO `notas` (`id`, `id_aluno`, `id_professor`, `media_primeiro_semestre`, `media_segundo_semestre`) VALUES
(2, 1, 5, 9.0, NULL),
(3, 1, 6, 9.5, 4.5),
(4, 2, 6, 5.5, NULL),
(5, 3, 6, 3.0, NULL),
(6, 4, 6, 9.5, NULL),
(7, 5, 6, 6.5, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE `professores` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `materia` varchar(50) NOT NULL,
  `login` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `cpf` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`id`, `nome`, `materia`, `login`, `email`, `senha`, `cpf`) VALUES
(4, 'Roberto', 'História', 'betoo', 'roberto@gmail.com', '$1$zc/.KKVs$YH0Vm3JXuIxOV6P6Uzplg/', '154.279.180-43'),
(5, 'Marcelo', 'Química', 'marcello', 'marcelo@gmail.com', '$1$ZULMpcfg$pBNseIRFC6/6MBeuFXnrb/', '425.123.940-77'),
(6, 'Jacinto Lemos', 'Matemática', 'jacinto', 'jacinto@gmail.com', '$1$kPgCYDRh$gyOaQfD1oue7WH6xXta24.', '616.409.720-72'),
(7, 'Sthepany Guerra', 'Biologia', 'tety', 'tety@hotmail.com', '$1$q.ZUGMkx$AxuqPkImvJzh2zXIVYwys0', '475.849.820-26'),
(8, 'Silvia Silva', '46.408.348-5', 'silvia', 'silvia@gmail.com', '$1$X.Ti2lmG$HBHUpuWvZfkuOb.Ps2mOW.', '912.984.870-99');

-- --------------------------------------------------------

--
-- Estrutura da tabela `responsaveis`
--

CREATE TABLE `responsaveis` (
  `id` int(11) NOT NULL,
  `nome_pai` varchar(100) DEFAULT NULL,
  `rg_pai` varchar(20) DEFAULT NULL,
  `cpf_pai` varchar(20) DEFAULT NULL,
  `nome_mae` varchar(150) DEFAULT NULL,
  `rg_mae` varchar(20) DEFAULT NULL,
  `cpf_mae` varchar(20) DEFAULT NULL,
  `login` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `responsaveis`
--

INSERT INTO `responsaveis` (`id`, `nome_pai`, `rg_pai`, `cpf_pai`, `nome_mae`, `rg_mae`, `cpf_mae`, `login`, `email`, `senha`) VALUES
(1, 'José', '17.034.620-1', '833.264.950-13', 'Josefina', '17.034.620-1', '720.494.960-95', 'responsavel', 'jojofina@gmail.com', '$1$cJhduJBo$z4GFDvboTw0Ngs/2rw5F0/'),
(2, 'João Silveira', '38.187.401-1', '906.384.230-90', 'Miliane Silveira', '42.025.101-7', '879.540.710-30', 'silveiras', 'familiasilveira@gmail.com', '$1$w2njlIof$d6F6uNGGrweaH.hRhAD01.'),
(3, '', '', '', 'Rochele Silva', '50.623.626-2', '057.647.700-17', 'rochele', 'roch@gmail.com', '$1$OLPqHFcA$pyRYbThR419n3e1kMGeIH.'),
(4, 'Felipe Silva', '37.529.744-3', '041.664.830-48', '', '', '', 'felipe', 'felipe@gmail.com', '$1$gph8IG2U$zdv.4jmcfysCCaz4hrYXl/'),
(5, 'João Paulo Santos', '37.595.527-6', '634.925.440-61', 'Noelia Santos', '14.504.262-5', '756.443.440-61', 'noelia', 'noelia@hotmail.com', '$1$V7hqXdMa$z2ja5zsZbQ6IhXSDzOSNP0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `responsaveis_alunos`
--

CREATE TABLE `responsaveis_alunos` (
  `id` int(11) NOT NULL,
  `id_responsavel` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `responsaveis_alunos`
--

INSERT INTO `responsaveis_alunos` (`id`, `id_responsavel`, `id_aluno`) VALUES
(4, 1, 1),
(5, 2, 2),
(6, 2, 3),
(7, 4, 4),
(8, 5, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `matricula` (`matricula`),
  ADD KEY `alunos_fk0` (`id_curso`);

--
-- Indexes for table `atividades`
--
ALTER TABLE `atividades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_professor` (`id_professor`),
  ADD KEY `id_curso` (`id_curso`);

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coordenadores`
--
ALTER TABLE `coordenadores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aluno_fk` (`id_aluno`),
  ADD KEY `professor_fk` (`id_professor`);

--
-- Indexes for table `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `responsaveis`
--
ALTER TABLE `responsaveis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `responsaveis_alunos`
--
ALTER TABLE `responsaveis_alunos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `responsaveis_alunos_fk0` (`id_responsavel`),
  ADD KEY `responsaveis_alunos_fk1` (`id_aluno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `atividades`
--
ALTER TABLE `atividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coordenadores`
--
ALTER TABLE `coordenadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `professores`
--
ALTER TABLE `professores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `responsaveis`
--
ALTER TABLE `responsaveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `responsaveis_alunos`
--
ALTER TABLE `responsaveis_alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `alunos`
--
ALTER TABLE `alunos`
  ADD CONSTRAINT `alunos_fk0` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id`);

--
-- Limitadores para a tabela `atividades`
--
ALTER TABLE `atividades`
  ADD CONSTRAINT `id_curso` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_professor` FOREIGN KEY (`id_professor`) REFERENCES `professores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `aluno_fk` FOREIGN KEY (`id_aluno`) REFERENCES `alunos` (`id`),
  ADD CONSTRAINT `professor_fk` FOREIGN KEY (`id_professor`) REFERENCES `professores` (`id`);

--
-- Limitadores para a tabela `responsaveis_alunos`
--
ALTER TABLE `responsaveis_alunos`
  ADD CONSTRAINT `responsaveis_alunos_fk0` FOREIGN KEY (`id_responsavel`) REFERENCES `responsaveis` (`id`),
  ADD CONSTRAINT `responsaveis_alunos_fk1` FOREIGN KEY (`id_aluno`) REFERENCES `alunos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
