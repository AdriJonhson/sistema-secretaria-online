/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 100131
Source Host           : localhost:3306
Source Database       : db_secretaria

Target Server Type    : MYSQL
Target Server Version : 100131
File Encoding         : 65001

Date: 2018-06-18 22:20:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for administradores
-- ----------------------------
DROP TABLE IF EXISTS `administradores`;
CREATE TABLE `administradores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `login` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of administradores
-- ----------------------------
INSERT INTO `administradores` VALUES ('1', 'Administrador', 'admin', 'admin@gmail.com', '$1$dUzG7yvr$xClZ8z96.xcvCQky0Bw/f/');
INSERT INTO `administradores` VALUES ('2', 'teste', 'teste', 'teste@gmail.com', '$1$QSxWm6DX$302/Lix4g3eXTSEHX.m/u/');
INSERT INTO `administradores` VALUES ('3', 'Antônio Farias', 'tonhi', 'tonhi@gmail.com', '$1$OmN9VzNo$sZ2hxxsS.GkQsoZXZcBrb0');

-- ----------------------------
-- Table structure for alunos
-- ----------------------------
DROP TABLE IF EXISTS `alunos`;
CREATE TABLE `alunos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `senha` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `matricula` (`matricula`),
  KEY `alunos_fk0` (`id_curso`),
  CONSTRAINT `alunos_fk0` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of alunos
-- ----------------------------
INSERT INTO `alunos` VALUES ('4', '1', 'Gabriela Silva', '773768', '3', '2000-10-20', 'Brasileiro', '47.449.280-1', '870.326.340-10', '', '06813090', '', 'Integral', '2018-06-17', 'Ailtom Senna', null, 'Nao', '34732222', '', '					', 'gaby', 'gaby@gmail.com', '$1$81lFouMw$sMo5Jf2CKxVjTQkxfU5j/0');

-- ----------------------------
-- Table structure for atividades
-- ----------------------------
DROP TABLE IF EXISTS `atividades`;
CREATE TABLE `atividades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_professor` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `data_entrega` date NOT NULL,
  `conteudo` text NOT NULL,
  `status` enum('Concluída','Andamento') NOT NULL DEFAULT 'Andamento',
  PRIMARY KEY (`id`),
  KEY `id_professor` (`id_professor`),
  KEY `id_curso` (`id_curso`),
  CONSTRAINT `id_curso` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `id_professor` FOREIGN KEY (`id_professor`) REFERENCES `professores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of atividades
-- ----------------------------

-- ----------------------------
-- Table structure for comentarios
-- ----------------------------
DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `texto` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of comentarios
-- ----------------------------

-- ----------------------------
-- Table structure for coordenadores
-- ----------------------------
DROP TABLE IF EXISTS `coordenadores`;
CREATE TABLE `coordenadores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `login` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of coordenadores
-- ----------------------------
INSERT INTO `coordenadores` VALUES ('2', 'Maria Fernanda', 'mariafer', 'mariafer@hotmail.com', '$1$1gH7RE7H$HdaSUy1QNJqPedoATI.wr/', '038.406.930-47');

-- ----------------------------
-- Table structure for cursos
-- ----------------------------
DROP TABLE IF EXISTS `cursos`;
CREATE TABLE `cursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cursos
-- ----------------------------
INSERT INTO `cursos` VALUES ('1', 'Informática 3');
INSERT INTO `cursos` VALUES ('2', 'Enfermagem 3');

-- ----------------------------
-- Table structure for empresas
-- ----------------------------
DROP TABLE IF EXISTS `empresas`;
CREATE TABLE `empresas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `id_endereco` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `empresas_fk0` (`id_representante`),
  KEY `empresas_fk1` (`id_endereco`),
  CONSTRAINT `empresas_fk0` FOREIGN KEY (`id_representante`) REFERENCES `representantes` (`id`),
  CONSTRAINT `empresas_fk1` FOREIGN KEY (`id_endereco`) REFERENCES `endereco_empresa` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of empresas
-- ----------------------------

-- ----------------------------
-- Table structure for endereco_empresa
-- ----------------------------
DROP TABLE IF EXISTS `endereco_empresa`;
CREATE TABLE `endereco_empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cep` varchar(20) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `municipio` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `numero` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of endereco_empresa
-- ----------------------------

-- ----------------------------
-- Table structure for notas
-- ----------------------------
DROP TABLE IF EXISTS `notas`;
CREATE TABLE `notas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_aluno` int(11) NOT NULL,
  `id_professor` int(11) DEFAULT NULL,
  `media_primeiro_semestre` double(3,1) DEFAULT NULL,
  `media_segundo_semestre` double(3,1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notas_fk1` (`id_aluno`),
  KEY `professor_fk` (`id_professor`),
  CONSTRAINT `professor_fk` FOREIGN KEY (`id_professor`) REFERENCES `professores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of notas
-- ----------------------------
INSERT INTO `notas` VALUES ('3', '4', '5', '6.5', null);

-- ----------------------------
-- Table structure for professores
-- ----------------------------
DROP TABLE IF EXISTS `professores`;
CREATE TABLE `professores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `materia` varchar(50) NOT NULL,
  `login` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of professores
-- ----------------------------
INSERT INTO `professores` VALUES ('5', 'Marcelo', 'Química', 'marcello', 'marcelo@gmail.com', '$1$QSxWm6DX$302/Lix4g3eXTSEHX.m/u/', '425.123.940-77');

-- ----------------------------
-- Table structure for representantes
-- ----------------------------
DROP TABLE IF EXISTS `representantes`;
CREATE TABLE `representantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `rg` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of representantes
-- ----------------------------

-- ----------------------------
-- Table structure for responsaveis
-- ----------------------------
DROP TABLE IF EXISTS `responsaveis`;
CREATE TABLE `responsaveis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_pai` varchar(100) DEFAULT NULL,
  `rg_pai` varchar(20) DEFAULT NULL,
  `cpf_pai` varchar(20) DEFAULT NULL,
  `nome_mae` varchar(150) DEFAULT NULL,
  `rg_mae` varchar(20) DEFAULT NULL,
  `cpf_mae` varchar(20) DEFAULT NULL,
  `login` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of responsaveis
-- ----------------------------
INSERT INTO `responsaveis` VALUES ('3', '', '', '', 'Maria Fina', '48.699.706-6', '111.427.420-83', 'mariafina', 'mariafina@gmail.com', '$1$QI.YDP.f$e5nC8w4LZJmtXjcFOFMyx0');

-- ----------------------------
-- Table structure for responsaveis_alunos
-- ----------------------------
DROP TABLE IF EXISTS `responsaveis_alunos`;
CREATE TABLE `responsaveis_alunos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_responsavel` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `responsaveis_alunos_fk0` (`id_responsavel`),
  KEY `responsaveis_alunos_fk1` (`id_aluno`),
  CONSTRAINT `responsaveis_alunos_fk0` FOREIGN KEY (`id_responsavel`) REFERENCES `responsaveis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `responsaveis_alunos_fk1` FOREIGN KEY (`id_aluno`) REFERENCES `alunos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of responsaveis_alunos
-- ----------------------------
INSERT INTO `responsaveis_alunos` VALUES ('5', '3', '4');
