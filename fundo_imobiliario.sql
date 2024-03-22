CREATE DATABASE fundo_imobiliario;
USE fundo_imobiliario;

CREATE TABLE fundos (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255) NOT NULL,
  ticker VARCHAR(10) NOT NULL,
  valor DECIMAL(10,2) NOT NULL,
  quantidade INT UNSIGNED NOT NULL,
  data DATE NOT NULL,
  PRIMARY KEY (id)
);