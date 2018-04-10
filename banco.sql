SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


DROP SCHEMA IF EXISTS `projeto` ;

CREATE SCHEMA IF NOT EXISTS `projeto` DEFAULT CHARACTER SET utf8 ;
USE `projeto` ;


DROP TABLE IF EXISTS `projeto`.`pessoa_juridica` ;

CREATE TABLE IF NOT EXISTS `projeto`.`pessoa_juridica` (
  `id` SMALLINT(6) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `cnpj` VARCHAR(50) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `cep` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id`))
  ENGINE = InnoDB;


DROP TABLE IF EXISTS `projeto`.`fornecedor` ;

CREATE TABLE IF NOT EXISTS `projeto`.`fornecedor` (
  `id` SMALLINT(6) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `razao_social` VARCHAR(50) NOT NULL,
  `id_pessoa_juridica` SMALLINT(6) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_fornecedor_pessoa_juridica1_idx` (`id_pessoa_juridica` ASC),
  CONSTRAINT `fk_fornecedor_pessoa_juridica1`
      FOREIGN KEY (`id_pessoa_juridica`)
      REFERENCES `projeto`.`pessoa_juridica` (`id`)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION)
ENGINE = InnoDB;


INSERT INTO pessoa_juridica(id, nome, cnpj, email, cep) VALUES (1, 'sabesp', '11665522', 'sabesp@test.com', '11670000');
INSERT INTO pessoa_juridica(id, nome, cnpj, email, cep) VALUES (2, 'cemig', '555444333', 'cemig@test.com', '12365000');

INSERT INTO fornecedor(id, nome, razao_social, id_pessoa_juridica) VALUES(1, "Nikolas", "aihsbdkahsbdaskhbdaksbdaskhbdaskb", 1);
INSERT INTO fornecedor(id, nome, razao_social, id_pessoa_juridica) VALUES(2, "João", "akjdlasdbalsdbasldasljd", 2);
