CREATE DATABASE IF NOT EXISTS db_biblioteca;
USE `db_biblioteca`;

-- -----------------------------------------------------
-- Table `mydb`.`tb_autores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_biblioteca`.`tb_autores` (
  `aut_codigo` INT NOT NULL AUTO_INCREMENT,
  `aut_nome` VARCHAR(50) NULL,
  PRIMARY KEY (`aut_codigo`)
)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`tb_livros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_biblioteca`.`tb_livros` (
  `liv_codigo` INT NULL AUTO_INCREMENT,
  `liv_descricao` VARCHAR(60) NULL,
  `liv_ano_publicacao` INT NULL,
  `liv_titulo` VARCHAR(50) NULL,
  `liv_aut_codigo` INT NOT NULL,
  PRIMARY KEY (`liv_codigo`),
  
	FOREIGN KEY (`liv_aut_codigo`) REFERENCES `db_biblioteca`.`tb_autores` (`aut_codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;