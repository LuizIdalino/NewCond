create database Newcond;

CREATE TABLE loginusuario (
  id INT PRIMARY KEY,
  senha VARCHAR(50)
);

INSERT INTO `loginusuario` (`id`, `senha`) VALUES ('123456', '123456');

CREATE TABLE cadastrocondominio (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(100),
  rg varchar(9),
  cpf varchar(14),
  celular varchar(14),
  bloco CHAR(1),
  numap INT
);

CREATE TABLE cadastrovisita (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(100),
  rg varchar(9),
  placaveiculo VARCHAR(8),
  id_loginusuario INT,
  id_cadastrocondominio INT,
  datahora datetime, 
  datahora_saida datetime,
  FOREIGN KEY (id_cadastrocondominio) REFERENCES cadastrocondominio(id),
  FOREIGN KEY (id_loginusuario) REFERENCES loginusuario(id)
);
