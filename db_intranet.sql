/*
Navicat MySQL Data Transfer

Source Server         : Intranet
Source Server Version : 50721
Source Host           : localhost:3306
Source Database       : db_intranet

Target Server Type    : MYSQL
Target Server Version : 50721
File Encoding         : 65001

Date: 2018-12-14 15:03:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tb_cargo
-- ----------------------------
DROP TABLE IF EXISTS `tb_cargo`;
CREATE TABLE `tb_cargo` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome_cargo` varchar(100) DEFAULT NULL,
  `ativo` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_cargo
-- ----------------------------
INSERT INTO `tb_cargo` VALUES ('1', 'Programador', '1');
INSERT INTO `tb_cargo` VALUES ('2', 'Scrum Master', '1');
INSERT INTO `tb_cargo` VALUES ('3', 'Front End', '1');
INSERT INTO `tb_cargo` VALUES ('4', 'Programador .Net', '1');

-- ----------------------------
-- Table structure for tb_eventos
-- ----------------------------
DROP TABLE IF EXISTS `tb_eventos`;
CREATE TABLE `tb_eventos` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) DEFAULT NULL,
  `horario` varchar(100) DEFAULT NULL,
  `local` varchar(100) DEFAULT NULL,
  `data_evento` date DEFAULT NULL,
  `ativo` tinyint(4) DEFAULT '1',
  `tipoevento` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_eventos
-- ----------------------------
INSERT INTO `tb_eventos` VALUES ('1', 'Espeto Cervejada', '19:30', 'Espeto', '2018-12-12', '1', '1');
INSERT INTO `tb_eventos` VALUES ('2', 'Festa Junina', '09:30', 'Rai', '2018-12-26', '1', '4');
INSERT INTO `tb_eventos` VALUES ('3', 'Tomar até cair', '19:30', 'Keka', '2018-12-18', '1', '2');
INSERT INTO `tb_eventos` VALUES ('4', 'Chá de Bebê Fernanda', '18h00', 'Auditório Rai', '2018-12-20', '1', '3');
INSERT INTO `tb_eventos` VALUES ('5', 'Festa Rai', '09:30', 'Rai', '2018-12-29', '1', '4');
INSERT INTO `tb_eventos` VALUES ('6', 'Festa Rai 3', '09:30', 'Rai', '2018-12-03', '1', '4');

-- ----------------------------
-- Table structure for tb_imagemcliente
-- ----------------------------
DROP TABLE IF EXISTS `tb_imagemcliente`;
CREATE TABLE `tb_imagemcliente` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  `imagem` varchar(200) DEFAULT NULL,
  `ativo` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_imagemcliente
-- ----------------------------
INSERT INTO `tb_imagemcliente` VALUES ('1', 'OR', 'logo-or-cinza.png', '1');
INSERT INTO `tb_imagemcliente` VALUES ('2', 'OR', 'logo-or-cinza.png', '1');
INSERT INTO `tb_imagemcliente` VALUES ('3', 'OR', 'logo-or-cinza.png', '1');
INSERT INTO `tb_imagemcliente` VALUES ('4', 'OR', 'logo-or-cinza.png', '1');
INSERT INTO `tb_imagemcliente` VALUES ('5', 'OR', 'logo-or-cinza.png', '1');
INSERT INTO `tb_imagemcliente` VALUES ('6', 'OR', 'logo-or-cinza.png', '1');
INSERT INTO `tb_imagemcliente` VALUES ('7', 'OR', 'logo-or-cinza.png', '1');
INSERT INTO `tb_imagemcliente` VALUES ('8', 'OR', 'logo-or-cinza.png', '1');

-- ----------------------------
-- Table structure for tb_img_galeria
-- ----------------------------
DROP TABLE IF EXISTS `tb_img_galeria`;
CREATE TABLE `tb_img_galeria` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT CURRENT_TIMESTAMP,
  `ativo` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_img_galeria
-- ----------------------------
INSERT INTO `tb_img_galeria` VALUES ('1', 'HappyHour', 'ceedf52f-279f-4bba-a05f-49c5f45a263f.jpg', '2018-12-07 14:32:59', '1');
INSERT INTO `tb_img_galeria` VALUES ('2', 'HappyHour2', '28b15b0a-f23d-4d3a-b5d1-4d3546da6b79.jpg', '2018-12-07 14:33:51', '1');
INSERT INTO `tb_img_galeria` VALUES ('3', 'HappyHour3', 'c30a4f2c-d668-4438-ad73-b9eaa883a1cc.jpg', '2018-12-07 14:34:04', '1');
INSERT INTO `tb_img_galeria` VALUES ('4', 'HappyHour4', '8e9b41e7-c7fb-42a4-8ba2-0df9c530278e.jpg', '2018-12-07 14:34:35', '1');
INSERT INTO `tb_img_galeria` VALUES ('5', 'HappyHour4', '8e9b41e7-c7fb-42a4-8ba2-0df9c530278e.jpg', '2018-12-07 14:34:35', '0');
INSERT INTO `tb_img_galeria` VALUES ('6', 'HappyHour', 'ceedf52f-279f-4bba-a05f-49c5f45a263f.jpg', '2018-12-07 14:32:59', '1');
INSERT INTO `tb_img_galeria` VALUES ('7', null, 'ex-galeria1.jpg', '2018-12-11 17:47:15', '1');
INSERT INTO `tb_img_galeria` VALUES ('8', null, 'ex-galeria2.jpg', '2018-12-11 17:47:21', '1');
INSERT INTO `tb_img_galeria` VALUES ('9', null, 'ex-galeria3.jpg', '2018-12-11 17:47:33', '1');
INSERT INTO `tb_img_galeria` VALUES ('10', null, 'ex-galeria4.jpg', '2018-12-11 17:47:34', '1');

-- ----------------------------
-- Table structure for tb_reuniao
-- ----------------------------
DROP TABLE IF EXISTS `tb_reuniao`;
CREATE TABLE `tb_reuniao` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `datareuniao` date DEFAULT NULL,
  `ativo` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_reuniao
-- ----------------------------
INSERT INTO `tb_reuniao` VALUES ('1', 'Reunião Scrum', '2018-12-11', '1');
INSERT INTO `tb_reuniao` VALUES ('2', 'Reunião Scrum', '2018-12-12', '1');
INSERT INTO `tb_reuniao` VALUES ('3', 'Reunião Scrum', '2018-12-13', '1');
INSERT INTO `tb_reuniao` VALUES ('4', 'Reunião Scrum', '2018-12-14', '1');
INSERT INTO `tb_reuniao` VALUES ('5', 'Reunião Scrum', '2018-12-15', '1');
INSERT INTO `tb_reuniao` VALUES ('6', 'Reunião Scrum', '2018-12-16', '1');
INSERT INTO `tb_reuniao` VALUES ('7', 'Reunião para alinhamento', '2018-12-14', '1');

-- ----------------------------
-- Table structure for tb_status
-- ----------------------------
DROP TABLE IF EXISTS `tb_status`;
CREATE TABLE `tb_status` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `nomestatus` varchar(100) DEFAULT NULL,
  `ativo` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_status
-- ----------------------------
INSERT INTO `tb_status` VALUES ('1', 'Concluído', '1');
INSERT INTO `tb_status` VALUES ('2', 'Em aprovação', '1');
INSERT INTO `tb_status` VALUES ('3', 'Em fila', '1');
INSERT INTO `tb_status` VALUES ('4', 'Em andamento', '1');

-- ----------------------------
-- Table structure for tb_tarefa
-- ----------------------------
DROP TABLE IF EXISTS `tb_tarefa`;
CREATE TABLE `tb_tarefa` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `cliente` varchar(100) DEFAULT NULL,
  `responsavel` varchar(100) DEFAULT NULL,
  `prazo` date DEFAULT NULL,
  `status` int(20) NOT NULL,
  `ativo` tinyint(4) DEFAULT '1',
  `datacadastro` datetime DEFAULT CURRENT_TIMESTAMP,
  `destaque` tinyint(4) DEFAULT NULL,
  `img_url` varchar(200) DEFAULT 'i-projeto.png',
  PRIMARY KEY (`id`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tb_tarefa
-- ----------------------------
INSERT INTO `tb_tarefa` VALUES ('1', 'Hotsite Programa do Ano', 'Onodera', 'Daniel', '2018-11-07', '1', '1', '2018-11-07 19:37:17', '1', 'i-projeto.png');
INSERT INTO `tb_tarefa` VALUES ('2', 'Sunny  -  Site Atual  Atualização ', 'Sunny', 'Thiago', '2018-11-12', '2', '1', '2018-11-08 10:24:24', null, 'i-projeto.png');
INSERT INTO `tb_tarefa` VALUES ('3', 'Inserção de Peças no Sistema', 'Ultra', 'Paulo', '2018-11-27', '3', '1', '2018-11-08 16:20:42', '1', 'logo-ultragaz.jpg');
INSERT INTO `tb_tarefa` VALUES ('4', 'FrontEnd', 'Novo Site', 'Juliana', '2018-11-25', '4', '1', '2018-11-08 17:19:13', '1', 'i-projeto.png');
INSERT INTO `tb_tarefa` VALUES ('5', 'Inserção de Peças no Sistema', 'KOP', 'Guilherme', '2018-11-28', '3', '1', '2018-11-12 11:47:32', null, 'i-projeto.png');
INSERT INTO `tb_tarefa` VALUES ('6', 'Inserção de Peças no Sistema', 'CBC', 'Paulo', '2018-11-26', '4', '1', '2018-11-12 11:50:02', null, 'i-projeto.png');
INSERT INTO `tb_tarefa` VALUES ('7', 'FrontEnd', 'Novo', 'Juliana', '2018-11-27', '1', '1', '2018-11-12 11:54:00', '1', 'logo-latam.jpg');
INSERT INTO `tb_tarefa` VALUES ('8', 'Caedu  -  Site Atual  Atualização ', 'Caedu', 'Isaac', '2018-11-25', '2', '1', '2018-11-13 18:33:44', null, 'i-projeto.png');
INSERT INTO `tb_tarefa` VALUES ('9', 'Caedu  -  Site Atual   ', 'Caedu', 'Ruan', '2018-11-25', '4', '1', '2018-11-13 18:34:30', null, 'i-projeto.png');
INSERT INTO `tb_tarefa` VALUES ('10', 'Aplicativo Tampinhas Coca-Cola', 'Coca-Cola', 'Ruan', '2018-11-25', '1', '1', '2018-11-28 17:58:13', '1', 'logo-coca.jpg');
INSERT INTO `tb_tarefa` VALUES ('11', 'Peça Diniz', 'Diniz', 'Guilherme', '2019-01-01', '4', '1', '2018-12-14 14:02:22', null, 'i-projeto.png');

-- ----------------------------
-- Table structure for tb_usuarios
-- ----------------------------
DROP TABLE IF EXISTS `tb_usuarios`;
CREATE TABLE `tb_usuarios` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(33) DEFAULT NULL,
  `ativo` tinyint(4) DEFAULT '1',
  `data_cadastro` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_nascimento` date DEFAULT NULL,
  `id_cargo` int(33) NOT NULL,
  `foto` varchar(255) DEFAULT 'default.jpg',
  PRIMARY KEY (`id`,`id_cargo`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_usuarios
-- ----------------------------
INSERT INTO `tb_usuarios` VALUES ('1', 'Paulo Borges', 'paulo@teste.com.br', '202cb962ac59075b964b07152d234b70', '1', '2018-11-07 16:25:07', '1988-12-12', '1', 'default.jpg');
INSERT INTO `tb_usuarios` VALUES ('2', 'Thiago Negro', 'thiago@teste.com', '202cb962ac59075b964b07152d234b70', '1', '2018-11-07 16:25:22', '1988-02-28', '2', 'default.jpg');
INSERT INTO `tb_usuarios` VALUES ('3', 'Ruan Silva', 'ruan@teste.com', '202cb962ac59075b964b07152d234b70', '1', '2018-11-27 16:30:36', '2001-06-05', '1', 'foto-ruan2.png');
INSERT INTO `tb_usuarios` VALUES ('4', 'Juliana Lima', 'juliana@teste.com', '202cb962ac59075b964b07152d234b70', '1', '2018-11-27 18:09:44', '1993-11-26', '3', 'default.jpg');
INSERT INTO `tb_usuarios` VALUES ('6', 'Enzo Quadros Salvadori', 'enzo.salvadori@ordigiweb.com.br', '202cb962ac59075b964b07152d234b70', '1', '2018-12-13 19:01:50', '1998-03-20', '1', 'default.jpg');
INSERT INTO `tb_usuarios` VALUES ('5', 'Antonio Gonzalez', 'antonio@teste.com', '202cb962ac59075b964b07152d234b70', '1', '2018-11-28 14:57:48', '1988-12-12', '4', 'default.jpg');

-- ----------------------------
-- Table structure for tb_vencedores
-- ----------------------------
DROP TABLE IF EXISTS `tb_vencedores`;
CREATE TABLE `tb_vencedores` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `id_usuario` int(33) NOT NULL,
  `comentario` varchar(200) DEFAULT NULL,
  `mes` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_vencedores
-- ----------------------------
INSERT INTO `tb_vencedores` VALUES ('1', '1', 'Nosso lunático do café foi eleito funcionário do mês em Julho. Parabéns, Paulo!', '2018-09-01');
INSERT INTO `tb_vencedores` VALUES ('2', '2', 'Nosso lunático do café foi eleito funcionário do mês em Julho. Parabéns, Thiago!', '2018-12-01');
INSERT INTO `tb_vencedores` VALUES ('3', '3', 'Nosso lunático do café foi eleito funcionário do mês em Julho. Parabéns, Ruan!', '2019-01-01');
INSERT INTO `tb_vencedores` VALUES ('4', '4', 'Nosso lunático do café foi eleito funcionário do mês em Julho. Parabéns, Juliana!', '2018-05-01');
INSERT INTO `tb_vencedores` VALUES ('5', '5', 'Nosso lunático do café foi eleito funcionário do mês em Julho. Parabéns, Toninho!', '2019-02-01');
INSERT INTO `tb_vencedores` VALUES ('6', '1', 'Nosso lunático do café foi eleito funcionário do mês em Julho. Parabéns, Paulo!', '2018-04-01');
INSERT INTO `tb_vencedores` VALUES ('7', '5', 'Nosso lunático do café foi eleito funcionário do mês em Julho. Parabéns, Toninho!', '2018-06-01');
INSERT INTO `tb_vencedores` VALUES ('8', '2', 'Nosso lunático do café foi eleito funcionário do mês em Julho. Parabéns, Thiago!', '2018-07-01');
INSERT INTO `tb_vencedores` VALUES ('9', '4', 'Nosso lunático do café foi eleito funcionário do mês em Julho. Parabéns, Juliana!', '2018-03-01');
INSERT INTO `tb_vencedores` VALUES ('10', '3', 'Nosso lunático do café foi eleito funcionário do mês em Julho. Parabéns, Ruan!', '2018-01-01');
INSERT INTO `tb_vencedores` VALUES ('11', '2', 'Nosso lunático do café foi eleito funcionário do mês em Julho. Parabéns, Thiago!', '2018-02-01');
INSERT INTO `tb_vencedores` VALUES ('12', '4', 'Nosso lunático do café foi eleito funcionário do mês em Julho. Parabéns, Juliana!', '2018-08-01');
INSERT INTO `tb_vencedores` VALUES ('13', '3', 'Nosso lunático do café foi eleito funcionário do mês em Julho. Parabéns, Ruan!', '2018-10-01');
INSERT INTO `tb_vencedores` VALUES ('14', '3', 'Nosso lunático do café foi eleito funcionário do mês em Julho. Parabéns, Ruan!', '2019-03-01');
