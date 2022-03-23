CREATE TABLE `estado` (
  `idE` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `sigla` VARCHAR(45) NULL,
  PRIMARY KEY (`idE`)
)ENGINE = InnoDB

INSERT INTO `sistemaCE`.`estado` (`nome`, `sigla`) VALUES ('Paraná', 'PR');
INSERT INTO `sistemaCE`.`estado` (`nome`, `sigla`) VALUES ('Rio Grande do Sul', 'RS');
INSERT INTO `sistemaCE`.`estado` (`nome`, `sigla`) VALUES ('Santa Catarina', 'SC');
INSERT INTO `sistemaCE`.`estado` (`nome`, `sigla`) VALUES ('São Paulo', 'SP');


CREATE TABLE `cidade` (
  `idC` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `idE` INT NOT NULL,
  PRIMARY KEY (`idC`),
  FOREIGN KEY (`idE`) REFERENCES `estado` (`idE`)
)ENGINE = InnoDB