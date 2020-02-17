CREATE DATABASE testdb;

\c testdb;

CREATE TABLE tipodeproduto (
	id serial PRIMARY KEY,
	descricao VARCHAR(50),
	percentual_imposto DECIMAL NOT NULL
);

CREATE TABLE produto (
	id serial PRIMARY KEY,
    descricao VARCHAR(50) NOT NULL,
	id_tipo_produto INTEGER REFERENCES tipodeproduto(id),
    quantidade INTEGER,
	valor_unitario NUMERIC(10,2) NOT NULL
);

INSERT INTO tipodeproduto (descricao, percentual_imposto) VALUES
    ('eletrodomestico', 0.0),
    ('eletroeletronico', 10.00);

INSERT INTO produto (descricao, id_tipo_produto, quantidade, valor_unitario) VALUES
    ('TV', 2, 3, 2000.00),
    ('PS4', 2, 8, 2000.00),
    ('Batedeira', 1, 10, 1000.00),
    ('Geladeira', 1, 5, 1000.00),
    ('Notebook', 2, 3, 3000.00);