CREATE TABLE IF NOT EXISTS usuario (
	id INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(45),
    senha VARCHAR(255),
    CONSTRAINT usuario_pk PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS pokemon(
	id INT NOT NULL AUTO_INCREMENT,
	nome VARCHAR(45) NOT NULL,
    altura VARCHAR(8) NOT NULL,
    peso VARCHAR(10) NOT NULL,
    genero VARCHAR(5) NOT NULL,
    tipo VARCHAR(9) NOT NULL,
    id_usuario INT NOT NULL,
    CONSTRAINT pokemon_pk PRIMARY KEY (id),
    CONSTRAINT pokemon_fk FOREIGN KEY (id_usuario) REFERENCES usuario (id)
);