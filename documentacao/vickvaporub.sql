-- MySQL Script generated by MySQL Workbench
-- qua 26 fev 2025 08:24:34
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema banco_mercado
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema banco_mercado
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `banco_mercado` ;
USE `banco_mercado` ;

-- -----------------------------------------------------
-- Table `banco_mercado`.`tb_cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `banco_mercado`.`tb_cliente` (
  `idcliente` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(80) NOT NULL,
  `cpf` VARCHAR(14) NOT NULL,
  `endereco` VARCHAR(100) NULL,
  PRIMARY KEY (`idcliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `banco_mercado`.`tb_produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `banco_mercado`.`tb_produto` (
  `idproduto` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(120) NOT NULL,
  `tipo` VARCHAR(45) NOT NULL,
  `preco_compra` DECIMAL(10,2) NOT NULL,
  `preco_venda` DECIMAL(10,2) NULL,
  `margem_lucro` DECIMAL(10,2) NULL,
  `quantidade` DECIMAL(10,3) NOT NULL,
  PRIMARY KEY (`idproduto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `banco_mercado`.`tb_venda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `banco_mercado`.`tb_venda` (
  `idvenda` INT NOT NULL AUTO_INCREMENT,
  `idcliente` INT NOT NULL,
  `idproduto` INT NOT NULL,
  `valor_total` VARCHAR(45) NULL,
  `data` VARCHAR(45) NULL,
  PRIMARY KEY (`idvenda`),
  INDEX `fk_tb_venda_tb_cliente_idx` (`idcliente` ASC) VISIBLE,
  INDEX `fk_tb_venda_tb_produto1_idx` (`idproduto` ASC) VISIBLE,
  CONSTRAINT `fk_tb_venda_tb_cliente`
    FOREIGN KEY (`idcliente`)
    REFERENCES `banco_mercado`.`tb_cliente` (`idcliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_venda_tb_produto1`
    FOREIGN KEY (`idproduto`)
    REFERENCES `banco_mercado`.`tb_produto` (`idproduto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `banco_mercado`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `banco_mercado`.`usuario` (
  `idusuario` INT NOT NULL,
  `nome` VARCHAR(80) NOT NULL,
  `email` VARCHAR(120) NOT NULL,
  `senha` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;