CREATE DATABASE testeBuonny;
USE testeBuonny;

CREATE TABLE cliente (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255) NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE pedido (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  cliente_id INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(id),
  INDEX pedido_FKIndex1(cliente_id)
);

CREATE TABLE pedido_item (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  pedido_id INTEGER UNSIGNED NOT NULL,
  produto_id INTEGER UNSIGNED NOT NULL,
  quantidade INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(id),
  INDEX pedido_item_FKIndex1(produto_id),
  INDEX pedido_item_FKIndex2(pedido_id)
);

CREATE TABLE produto (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  descricao VARCHAR(255) NOT NULL,
  preco FLOAT NOT NULL,
  PRIMARY KEY(id)
);

INSERT INTO produto(descricao, preco) values('TV',1500.00);
INSERT INTO produto(descricao, preco) values('Micro-Ondas',400.00);
INSERT INTO produto(descricao, preco) values('DVD Player',150.00);
INSERT INTO produto(descricao, preco) values('Notebook',2000.00);
INSERT INTO produto(descricao, preco) values('All-In-One',1500.00);
INSERT INTO produto(descricao, preco) values('Smartphone',1000.00);
INSERT INTO produto(descricao, preco) values('Micro-System',800.00);

INSERT INTO cliente(nome) values('Lojas Americanas');
INSERT INTO cliente(nome) values('Casas Bahia');
INSERT INTO cliente(nome) values('Fast Shop');
INSERT INTO cliente(nome) values('Nivalmix');
INSERT INTO cliente(nome) values('Mais Valdir');
INSERT INTO cliente(nome) values('Ponto Frio');
INSERT INTO cliente(nome) values('Magazine Luiza');

INSERT INTO pedido(cliente_id) VALUES(1);
INSERT INTO pedido(cliente_id) VALUES(2);

INSERT INTO pedido_item(pedido_id, produto_id, quantidade) values(1,1,10);
INSERT INTO pedido_item(pedido_id, produto_id, quantidade) values(1,4,5);

INSERT INTO pedido_item(pedido_id, produto_id, quantidade) values(2,1,6);
INSERT INTO pedido_item(pedido_id, produto_id, quantidade) values(2,3,10);
INSERT INTO pedido_item(pedido_id, produto_id, quantidade) values(2,6,20);