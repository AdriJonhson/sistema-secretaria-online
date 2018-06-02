/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 100131
Source Host           : localhost:3306
Source Database       : db_secretaria

Target Server Type    : MYSQL
Target Server Version : 50699
File Encoding         : 65001

Date: 2018-06-01 21:51:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for administradores
-- ----------------------------
DROP TABLE IF EXISTS `administradores`;
CREATE TABLE `administradores` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`nome`  varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`login`  varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`email`  varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`senha`  varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=2

;

-- ----------------------------
-- Records of administradores
-- ----------------------------
BEGIN;
INSERT INTO `administradores` VALUES ('1', 'Administrador', 'admin', 'admin@gmail.com', 'admin');
COMMIT;

-- ----------------------------
-- Table structure for alunos
-- ----------------------------
DROP TABLE IF EXISTS `alunos`;
CREATE TABLE `alunos` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`id_curso`  int(11) NOT NULL ,
`nome`  varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`matricula`  varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`num_chamada`  int(2) NOT NULL ,
`data_nascimento`  date NOT NULL ,
`naturalidade`  varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`rg`  varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`cpf`  varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`nis`  varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`cep`  varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`complemento_endereco`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`turno`  varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`data_cadastro`  date NOT NULL ,
`escola_origem`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`opcao_medicamento`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`medicamento`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`telefone`  varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`celular`  varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`comentario`  text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL ,
`login`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`email`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`senha`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`id`),
FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
UNIQUE INDEX `matricula` (`matricula`) USING BTREE ,
INDEX `alunos_fk0` (`id_curso`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=2

;

-- ----------------------------
-- Records of alunos
-- ----------------------------
BEGIN;
INSERT INTO `alunos` VALUES ('1', '1', 'Josefredo José', '1234567', '1', '1985-11-01', 'Brasileiro', '20.055.903-5', '704.136.430-50', '123456', '72926-068', '', 'Integral', '2018-06-01', 'Universidade Infantil', null, null, null, null, null, 'aluno', 'jojo@gmail.com', '123456');
COMMIT;

-- ----------------------------
-- Table structure for comentarios
-- ----------------------------
DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE `comentarios` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`nome`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`email`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`texto`  text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of comentarios
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for coordenadores
-- ----------------------------
DROP TABLE IF EXISTS `coordenadores`;
CREATE TABLE `coordenadores` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`nome`  varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`login`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`email`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`senha`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`cpf`  varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=2

;

-- ----------------------------
-- Records of coordenadores
-- ----------------------------
BEGIN;
INSERT INTO `coordenadores` VALUES ('1', 'Pedro José', 'coordenador', 'pedrojose@gmail.com', '123456', '451.096.570-25');
COMMIT;

-- ----------------------------
-- Table structure for cursos
-- ----------------------------
DROP TABLE IF EXISTS `cursos`;
CREATE TABLE `cursos` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`nome`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=3

;

-- ----------------------------
-- Records of cursos
-- ----------------------------
BEGIN;
INSERT INTO `cursos` VALUES ('1', 'Informática 3'), ('2', 'Enfermagem 3');
COMMIT;

-- ----------------------------
-- Table structure for empresas
-- ----------------------------
DROP TABLE IF EXISTS `empresas`;
CREATE TABLE `empresas` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`intituica`  varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`razao_social`  varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`nome_fantasia`  varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`cnpj`  varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`especificacao`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`email`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`telefone`  varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`nome_supervisor`  varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`email_supervisor`  varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`observacoes`  text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`numero_vagas`  int(11) NOT NULL ,
`escola_beneficiada`  varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`municipio_escola`  varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`id_representante`  int(200) NOT NULL ,
`id_endereco`  int(11) NOT NULL ,
PRIMARY KEY (`id`),
FOREIGN KEY (`id_representante`) REFERENCES `representantes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
FOREIGN KEY (`id_endereco`) REFERENCES `endereco_empresa` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `empresas_fk0` (`id_representante`) USING BTREE ,
INDEX `empresas_fk1` (`id_endereco`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of empresas
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for endereco_empresa
-- ----------------------------
DROP TABLE IF EXISTS `endereco_empresa`;
CREATE TABLE `endereco_empresa` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`cep`  varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`endereco`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`complemento`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`municipio`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`bairro`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`numero`  varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of endereco_empresa
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for notas
-- ----------------------------
DROP TABLE IF EXISTS `notas`;
CREATE TABLE `notas` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`id_curso`  int(11) NOT NULL ,
`media_primeiro_semestre`  double(3,1) NOT NULL ,
`media_segundo_semestre`  double(3,1) NOT NULL ,
`ano_competencial`  int(11) NOT NULL ,
`id_aluno`  int(11) NOT NULL ,
PRIMARY KEY (`id`),
FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
FOREIGN KEY (`id_aluno`) REFERENCES `alunos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `notas_fk0` (`id_curso`) USING BTREE ,
INDEX `notas_fk1` (`id_aluno`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of notas
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for professores
-- ----------------------------
DROP TABLE IF EXISTS `professores`;
CREATE TABLE `professores` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`nome`  varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`materia`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`login`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`email`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`senha`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`cpf`  varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=2

;

-- ----------------------------
-- Records of professores
-- ----------------------------
BEGIN;
INSERT INTO `professores` VALUES ('1', 'Marcos', 'Matemática', 'marcoss', 'marcos@gmail.com', '123456', '009.603.010-03');
COMMIT;

-- ----------------------------
-- Table structure for representantes
-- ----------------------------
DROP TABLE IF EXISTS `representantes`;
CREATE TABLE `representantes` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`nome`  varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`email`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`cpf`  varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`rg`  varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of representantes
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for responsaveis
-- ----------------------------
DROP TABLE IF EXISTS `responsaveis`;
CREATE TABLE `responsaveis` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`nome_pai`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`rg_pai`  varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`cpf_pai`  varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`nome_mae`  varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`rg_mae`  varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`cpf_mae`  varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`login`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`email`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`senha`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=2

;

-- ----------------------------
-- Records of responsaveis
-- ----------------------------
BEGIN;
INSERT INTO `responsaveis` VALUES ('1', 'José', '17.034.620-1', '833.264.950-13', 'Josefina', '17.034.620-1', '720.494.960-95', 'responsavel', 'jojofina@gmail.com', '123456');
COMMIT;

-- ----------------------------
-- Table structure for responsaveis_alunos
-- ----------------------------
DROP TABLE IF EXISTS `responsaveis_alunos`;
CREATE TABLE `responsaveis_alunos` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`id_responsavel`  int(11) NOT NULL ,
`id_aluno`  int(11) NOT NULL ,
PRIMARY KEY (`id`),
FOREIGN KEY (`id_responsavel`) REFERENCES `responsaveis` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
FOREIGN KEY (`id_aluno`) REFERENCES `alunos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `responsaveis_alunos_fk0` (`id_responsavel`) USING BTREE ,
INDEX `responsaveis_alunos_fk1` (`id_aluno`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=2

;

-- ----------------------------
-- Records of responsaveis_alunos
-- ----------------------------
BEGIN;
INSERT INTO `responsaveis_alunos` VALUES ('1', '1', '1');
COMMIT;

-- ----------------------------
-- Auto increment value for administradores
-- ----------------------------
ALTER TABLE `administradores` AUTO_INCREMENT=2;

-- ----------------------------
-- Auto increment value for alunos
-- ----------------------------
ALTER TABLE `alunos` AUTO_INCREMENT=2;

-- ----------------------------
-- Auto increment value for comentarios
-- ----------------------------
ALTER TABLE `comentarios` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for coordenadores
-- ----------------------------
ALTER TABLE `coordenadores` AUTO_INCREMENT=2;

-- ----------------------------
-- Auto increment value for cursos
-- ----------------------------
ALTER TABLE `cursos` AUTO_INCREMENT=3;

-- ----------------------------
-- Auto increment value for empresas
-- ----------------------------
ALTER TABLE `empresas` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for endereco_empresa
-- ----------------------------
ALTER TABLE `endereco_empresa` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for notas
-- ----------------------------
ALTER TABLE `notas` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for professores
-- ----------------------------
ALTER TABLE `professores` AUTO_INCREMENT=2;

-- ----------------------------
-- Auto increment value for representantes
-- ----------------------------
ALTER TABLE `representantes` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for responsaveis
-- ----------------------------
ALTER TABLE `responsaveis` AUTO_INCREMENT=2;

-- ----------------------------
-- Auto increment value for responsaveis_alunos
-- ----------------------------
ALTER TABLE `responsaveis_alunos` AUTO_INCREMENT=2;
