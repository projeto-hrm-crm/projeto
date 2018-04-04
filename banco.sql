SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `projeto` ;

CREATE SCHEMA IF NOT EXISTS `projeto` DEFAULT CHARACTER SET utf8 ;
USE `projeto` ;

DROP TABLE IF EXISTS `projeto`.`fornecedor` ;

CREATE TABLE IF NOT EXISTS `projeto`.`fornecedor` (
  `id` SMALLINT(6) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `razao_social` VARCHAR(50) NOT NULL,
  `id_pessoa_juridica` SMALLINT(6) NOT NULL,
  `cnpj` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

INSERT INTO fornecedor(id, nome, razao_social, id_pessoa_juridica, cnpj) VALUES(1, "Nikolas", "aihsbdkahsbdaskhbdaksbdaskhbdaskb", 1, "86463168461");
INSERT INTO fornecedor(id, nome, razao_social, id_pessoa_juridica, cnpj) VALUES(2, "João", "akjdlasdbalsdbasldasljd", 2, "384684348");
