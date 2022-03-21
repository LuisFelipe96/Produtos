CREATE TABLE Produtos (
    SKU varchar(50) NOT NULL PRIMARY KEY,
    Nome varchar(50),
    Foto varchar(20),
    Descricao varchar(500),
	Estoque int,
	Preco float
);

CREATE TABLE Variacao (
    ID int NOT NULL PRIMARY KEY,
	Nome varchar(50)
);
insert into Variacao (id, Nome) VALUES (0,"Nenhum");
insert into Variacao (id, Nome) VALUES (1,"COR");
insert into Variacao (id, Nome) VALUES (2,"Tamanho");
insert into Variacao (id, Nome) VALUES (3,"Tamanho e Cor");


CREATE TABLE Variacao_Desc (
    SKU varchar(50) NOT NULL PRIMARY KEY,
	Variacao int,
    Desc_Variacao varchar(500)
);

ALTER TABLE Variacao_Desc ADD FOREIGN KEY (SKU) REFERENCES Produtos(SKU);
ALTER TABLE Variacao_Desc ADD FOREIGN KEY (Variacao) REFERENCES Variacao(ID);



------------
CREATE TABLE Produtos (
    SKU varchar(50) NOT NULL PRIMARY KEY,
    Nome varchar(50),
    Foto varchar(20),
    Descricao varchar(500),
	Estoque int,
	Preco float,
	Variacao int,
    Desc_Variacao varchar(500)
);