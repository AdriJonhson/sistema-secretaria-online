-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05-Jun-2018 às 00:52
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
(2, 'teste', 'teste', 'teste@gmail.com', '$1$QSxWm6DX$302/Lix4g3eXTSEHX.m/u/');

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
(1, 1, 'Josefredo José', '1234567', 1, '1985-11-01', 'Brasileiro', '20.055.903-5', '704.136.430-50', '123456', '72926-068', '', 'Integral', '2018-06-01', 'Universidade Infantil', NULL, NULL, NULL, NULL, NULL, 'aluno', 'jojo@gmail.com', '$1$cJhduJBo$z4GFDvboTw0Ngs/2rw5F0/');

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividades`
--

CREATE TABLE `atividades` (
  `id` int(11) NOT NULL,
  `id_professor` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `data_entrega` date NOT NULL,
  `conteudo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Pedro José', 'coordenador', 'pedrojose@gmail.com', '$1$cJhduJBo$z4GFDvboTw0Ngs/2rw5F0/', '451.096.570-25');

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
(2, 'Enfermagem 3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

CREATE TABLE `empresas` (
  `id` int(11) NOT NULL,
  `intituica` varchar(200) NOT NULL,
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
  `id_representante` int(200) NOT NULL,
  `id_endereco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco_empresa`
--

CREATE TABLE `endereco_empresa` (
  `id` int(11) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `municipio` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `numero` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `media_primeiro_semestre` double(3,1) NOT NULL,
  `media_segundo_semestre` double(3,1) NOT NULL,
  `ano_competencial` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(4, 'Roberto', 'MatemÃ¡tica', 'beto', 'roberto@gmail.com', '$1$owAcKCM1$zEHXIIR9cRPVUA5k3BXtm.', '154.279.180-43'),
(5, 'Marcelo', 'QuÃ­mica', 'marcello', 'marcelo@gmail.com', '$1$QSxWm6DX$302/Lix4g3eXTSEHX.m/u/', '425.123.940-77');

-- --------------------------------------------------------

--
-- Estrutura da tabela `representantes`
--

CREATE TABLE `representantes` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `rg` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'José', '17.034.620-1', '833.264.950-13', 'Josefina', '17.034.620-1', '720.494.960-95', 'responsavel', 'jojofina@gmail.com', '$1$cJhduJBo$z4GFDvboTw0Ngs/2rw5F0/');

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
(1, 1, 1);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `empresas_fk0` (`id_representante`),
  ADD KEY `empresas_fk1` (`id_endereco`);

--
-- Indexes for table `endereco_empresa`
--
ALTER TABLE `endereco_empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notas_fk0` (`id_curso`),
  ADD KEY `notas_fk1` (`id_aluno`);

--
-- Indexes for table `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `representantes`
--
ALTER TABLE `representantes`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `atividades`
--
ALTER TABLE `atividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coordenadores`
--
ALTER TABLE `coordenadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `endereco_empresa`
--
ALTER TABLE `endereco_empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `professores`
--
ALTER TABLE `professores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `representantes`
--
ALTER TABLE `representantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `responsaveis`
--
ALTER TABLE `responsaveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `responsaveis_alunos`
--
ALTER TABLE `responsaveis_alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Limitadores para a tabela `empresas`
--
ALTER TABLE `empresas`
  ADD CONSTRAINT `empresas_fk0` FOREIGN KEY (`id_representante`) REFERENCES `representantes` (`id`),
  ADD CONSTRAINT `empresas_fk1` FOREIGN KEY (`id_endereco`) REFERENCES `endereco_empresa` (`id`);

--
-- Limitadores para a tabela `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_fk0` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id`),
  ADD CONSTRAINT `notas_fk1` FOREIGN KEY (`id_aluno`) REFERENCES `alunos` (`id`);

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
