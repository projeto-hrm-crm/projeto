use teste;
DROP TABLE IF EXISTS usuario;
CREATE TABLE usuario (
id_usuario int(11) NOT NULL AUTO_INCREMENT,
login varchar(255) NOT NULL,
senha varchar(45) NOT NULL,
PRIMARY KEY (id_usuario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS pais;

CREATE TABLE `pais` (
  `id_pais` int(10) unsigned NOT NULL,
  `nome` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `sigla` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_pais`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `pais` VALUES (4,'AFEGANISTÃO','AFG'),(8,'ALBÂNIA','ALB'),(12,'ARGÉLIA','DZA')

DROP TABLE IF EXISTS `estado`;

CREATE TABLE `estado` (
  `id_estado` int(10) unsigned NOT NULL,
  `uf` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `id_pais` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_estado`),
  KEY `estado_pais_id_foreign` (`id_pais`),
  CONSTRAINT `estado_pais_id_foreign` FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id_pais`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `estado` VALUES (11,'RO','RONDÔNIA',76),(12,'AC','Acre',76),(13,'AM','AMAZONAS',76),(14,'RR','RORAIMA',76),(15,'PA','PARÁ',76),(16,'AP','AMAPÁ',76),(17,'TO','TOCANTINS',76),(21,'MA','MARANHÃO',76),(22,'PI','PIAUÍ',76),(23,'CE','CEARÁ',76),(24,'RN','RIO GRANDE DO NORTE',76),(25,'PB','PARAÍBA',76),(26,'PE','PERNAMBUCO',76),(27,'AL','ALAGOAS',76),(28,'SE','SERGIPE',76),(29,'BA','BAHIA',76),(31,'MG','MINAS GERAIS',76),(32,'ES','ESPÍRITO SANTO',76),(33,'RJ','RIO DE JANEIRO',76),(35,'SP','SÃO PAULO',76),(41,'PR','PARANÁ',76),(42,'SC','SANTA CATARINA',76),(43,'RS','RIO GRANDE DO SUL',76),(50,'MS','MATO GROSSO DO SUL',76),(51,'MT','MATO GROSSO',76),(52,'GO','GOIÁS',76),(53,'DF','DISTRITO FEDERAL',76);


DROP TABLE IF EXISTS `cidade`;

CREATE TABLE `cidade` (
  `id_cidade` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_estado` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_cidade`),
  KEY `cidade_estado_id_foreign` (`id_estado`),
  CONSTRAINT `cidade_estado_id_foreign` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=5571 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `cidade` VALUES (1,'00015','ALTA FLORESTA D\'OESTE',11),(2,'00023','ARIQUEMES',11)

DROP TABLE IF EXISTS `regiao`;

CREATE TABLE `regiao` (
  `id_regiao` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `regiao` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_regiao`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `regiao` VALUES (1,'NORTE'),(2,'CENTRAL'),(3,'SUL');


DROP TABLE IF EXISTS `bairro`;

CREATE TABLE `bairro` (
  `id_bairro` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `id_cidade` int(10) unsigned NOT NULL,
  `id_regiao` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_bairro`),
  KEY `bairro_cidade_id_foreign` (`id_cidade`),
  KEY `bairro_regiao_id_foreign` (`id_regiao`),
  CONSTRAINT `bairro_cidade_id_foreign` FOREIGN KEY (`id_cidade`) REFERENCES `cidade` (`id_cidade`),
  CONSTRAINT `bairro_regiao_id_foreign` FOREIGN KEY (`id_regiao`) REFERENCES `regiao` (`id_regiao`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `bairro` VALUES (1,'ALTO DO GETUBA',3388,1),(2,'BARRANCO ALTO',3388,3),(3,'BENFICA',3388,2)

DROP TABLE IF EXISTS `pessoa`;

CREATE TABLE `pessoa` (
  `id_pessoa` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_pessoa`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `pessoa_fisica`;

CREATE TABLE `pessoa_fisica` (
  `id_pessoa_fisica` int(11) NOT NULL AUTO_INCREMENT,
  `id_pessoa` int(11) NOT NULL,
  `data_nascimento` date NOT NULL,
  `sexo` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_pessoa_fisica`,`id_pessoa`),
  KEY `fk_pessoa_fisica_pessoa1_idx` (`id_pessoa`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `pessoa_juridica`;

CREATE TABLE `pessoa_juridica` (
  `id_pessoa_juridica` int(11) NOT NULL AUTO_INCREMENT,
  `id_pessoa` int(11) NOT NULL,
  `razao_social` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_pessoa_juridica`),
  KEY `fk_pessoa_juridica_pessoa1_idx` (`id_pessoa`),
  CONSTRAINT `fk_pessoa_juridica_pessoa1` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `endereco`;

CREATE TABLE `endereco` (
  `id_endereco` int(11) NOT NULL AUTO_INCREMENT,
  `cep` varchar(11) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `logradouro` varchar(45) NOT NULL,
  `numero` varchar(45) NOT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `id_pessoa` int(11) DEFAULT NULL,
  `id_cidade` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_endereco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `documento`;

CREATE TABLE `documento` (
  `id_documento` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(45) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `id_pessoa` int(11) NOT NULL,
  PRIMARY KEY (`id_documento`),
  KEY `fk_documento_pessoa1_idx` (`id_pessoa`),
  CONSTRAINT `fk_documento_pessoa1` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `telefone`;

CREATE TABLE `telefone` (
  `id_telefone` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(45) NOT NULL,
  `id_pessoa` int(11) NOT NULL,
  PRIMARY KEY (`id_telefone`),
  KEY `fk_telefone_pessoa1_idx` (`id_pessoa`),
  CONSTRAINT `fk_telefone_pessoa1` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `fornecedor`;

CREATE TABLE `fornecedor` (
  `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT,
  `id_pessoa_juridica` int(11) NOT NULL,
  PRIMARY KEY (`id_fornecedor`),
  KEY `fk_fornecedor_pessoa_juridica1_idx` (`id_pessoa_juridica`),
  CONSTRAINT `fk_fornecedor_pessoa_juridica1` FOREIGN KEY (`id_pessoa_juridica`) REFERENCES `pessoa_juridica` (`id_pessoa_juridica`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `produto`;

CREATE TABLE `produto` (
  `id_produto` INT NOT NULL AUTO_INCREMENT,
  `codigo` VARCHAR(100) NOT NULL,
  `nome` VARCHAR(100) NOT NULL,
  `fabricacao` DATE NOT NULL,
  `validade` DATE NOT NULL,
  `lote` VARCHAR(45) NOT NULL,
  `recebimento` DATE NOT NULL,
  PRIMARY KEY (`id_produto`))
ENGINE = InnoDB;


CREATE TABLE `cliente` (
  `id_cliente` INT NOT NULL AUTO_INCREMENT,
  `id_pessoa` INT NOT NULL,
  PRIMARY KEY (`id_cliente`),
  INDEX `fk_cliente_pessoa_fisica1_idx` (`id_pessoa` ASC),
  CONSTRAINT `fk_cliente_pessoa_fisica1`
    FOREIGN KEY (`id_pessoa`)
    REFERENCES `pessoa_fisica` (`id_pessoa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

DROP TABLE IF EXISTS `sac`;

CREATE TABLE `funcionario` (
  `id_funcionario` INT NOT NULL AUTO_INCREMENT,
  `id_pessoa` INT NOT NULL,
  PRIMARY KEY (`id_funcionario`),
  INDEX `fk_funcionario_pessoa_fisica1_idx` (`id_pessoa` ASC),
  CONSTRAINT `fk_funcionario_pessoa_fisica1`
    FOREIGN KEY (`id_pessoa`)
    REFERENCES `pessoa_fisica` (`id_pessoa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

DROP TABLE IF EXISTS `sac`;

CREATE TABLE `sac` (
  `id_sac` INT NOT NULL AUTO_INCREMENT,
  `id_produto` INT NOT NULL,
  `id_cliente` INT NOT NULL,
  `abertura` TIMESTAMP NULL,
  `fechamento` TIMESTAMP NULL,
  `encerrado` TINYINT NULL,
  PRIMARY KEY (`id_sac`),
  INDEX `fk_sac_produto1_idx` (`id_produto` ASC),
  INDEX `fk_sac_cliente1_idx` (`id_cliente` ASC),
  CONSTRAINT `fk_sac_produto1`
    FOREIGN KEY (`id_produto`)
    REFERENCES `produto` (`id_produto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_sac_cliente1`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `cliente` (`id_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

DROP TABLE IF EXISTS `iteracao`;

CREATE TABLE IF NOT EXISTS `iteracao` (
  `id_iteracao` INT NOT NULL AUTO_INCREMENT,
  `mensagem` VARCHAR(45) NOT NULL,
  `data` TIMESTAMP NOT NULL,
  `id_sac` INT NOT NULL,
  `id_funcionario` INT NOT NULL,
  PRIMARY KEY (`id_iteracao`),
  INDEX `fk_iteracao_sac1_idx` (`id_sac` ASC),
  INDEX `fk_iteracao_funcionario1_idx` (`id_funcionario` ASC),
  CONSTRAINT `fk_iteracao_sac1`
    FOREIGN KEY (`id_sac`)
    REFERENCES `sac` (`id_sac`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_iteracao_funcionario1`
    FOREIGN KEY (`id_funcionario`)
    REFERENCES `funcionario` (`id_funcionario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

DROP TABLE IF EXISTS `setor`;

CREATE TABLE IF NOT EXISTS `setor` (
  `id_setor` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_setor`))
ENGINE = InnoDB;
