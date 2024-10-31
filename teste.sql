CREATE DATABASE projetoHE;
USE projetoHE;

CREATE TABLE categoria(
	id_categoria INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(300) NOT NULL,
    CONSTRAINT PRIMARY KEY(id_categoria)
);

CREATE TABLE descricao(
	id_descricao INT NOT NULL AUTO_INCREMENT,
    descricao VARCHAR(300) NOT NULL,
    CONSTRAINT PRIMARY KEY(id_descricao)
);

CREATE TABLE titulo(
	id_titulo INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(300) NOT NULL,
    id_categoria INT,
    id_descricao INT,
    CONSTRAINT PRIMARY KEY(id_titulo),
    FOREIGN KEY (id_categoria) REFERENCES categoria(id_categoria),
	FOREIGN KEY (id_descricao) REFERENCES descricao(id_descricao)
);

SELECT * FROM categoria;
SELECT * FROM descricao;
SELECT * FROM titulo;

INSERT INTO categoria(nome) VALUE 
('Suporte'),
('Jungle'),
('Mid'),
('Adc');

INSERT INTO descricao(descricao) VALUE 
('Descrição do Suporte'),
('Descrição do Jungle'),
('Descrição do Mid'),
('Descrição do Adc');

INSERT INTO titulo(titulo, id_categoria, id_descricao) VALUE 
('Titulo do Suporte', 1, 1),
('Titulo do jungle', 2, 2),
('Titulo do Mid', 3, 3),
('Titulo do Adc', 4, 4);


SELECT titulo.titulo, descricao.descricao, categoria.nome FROM categoria INNER JOIN titulo ON categoria.id_categoria = titulo.id_categoria INNER JOIN descricao ON descricao.id_descricao = titulo.id_descricao;