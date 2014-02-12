CREATE TABLE IF NOT EXISTS bairros (
  id int(11) NOT NULL AUTO_INCREMENT,
  nome varchar(50) NOT NULL,
  cidade_id int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

alter table pessoas drop column bairro;

alter table pessoas 
add column bairro_id int(11),
add column documento varchar(50),
add column titulo varchar(20),
add column zona varchar(20),
add column secao varchar(10);

CREATE TABLE IF NOT EXISTS agendas (
  id int(11) NOT NULL AUTO_INCREMENT,
  descricao varchar(100) NOT NULL,
  user_id int(11) NOT NULL,
  data Date NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

ALTER TABLE bairros ADD FOREIGN KEY (cidade_id) REFERENCES cidades(id);
ALTER TABLE agendas ADD FOREIGN KEY (user_id) REFERENCES users(id);
ALTER TABLE pessoas ADD FOREIGN KEY (cidade_id) REFERENCES cidades(id);
ALTER TABLE pessoas ADD FOREIGN KEY (bairro_id) REFERENCES bairros(id);
ALTER TABLE pendencias ADD FOREIGN KEY (user_id) REFERENCES users(id);
ALTER TABLE pendencias ADD FOREIGN KEY (situacao_id) REFERENCES situacaos(id);
ALTER TABLE pendencias ADD FOREIGN KEY (grupo_id) REFERENCES grupos(id);
ALTER TABLE pendencias ADD FOREIGN KEY (pessoa_id) REFERENCES pessoas(id);

ALTER TABLE `agendas` CHANGE `data` `data` DATETIME NOT NULL 

alter table cidades add column cep varchar(9);

ALTER TABLE pessoas CHANGE celular celular VARCHAR(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;
ALTER TABLE pessoas CHANGE fone fone VARCHAR(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;
