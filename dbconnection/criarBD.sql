DROP DATABASE IF EXISTS SAFEDISH;
CREATE DATABASE SAFEDISH;
USE SAFEDISH;

/* Lógico_SAFEDISH: */

CREATE TABLE P_R_A_ (
    IdPRA INT PRIMARY KEY auto_increment,
    NomePRA VARCHAR(200),
    UsernamePRA VARCHAR(50) UNIQUE,
    EmailPRA VARCHAR(200) UNIQUE,
    SenhaPRA VARCHAR(200),
    FotoPRA MEDIUMBLOB,
    AdminUser BOOLEAN DEFAULT 0 
);


CREATE TABLE Restaurante (
    IdRestaurante INT PRIMARY KEY auto_increment,
    CNPJRestaurante VARCHAR(20) UNIQUE,
    Numero_Restaurante INT,
    EmailRestaurante VARCHAR(200) UNIQUE,
    FotoRestaurante MEDIUMBLOB,
    SiteRestaurante VARCHAR(200),
    SenhaRestaurante VARCHAR(200),
    NomeRestaurante VARCHAR(200) UNIQUE,
    DescricaoRestaurante VARCHAR(400),
    RuaRestaurante VARCHAR(200),
    CEPRestaurante VARCHAR(15)
);

CREATE TABLE Comentario (
    IdComentario INT PRIMARY KEY auto_increment,
    TextoComentario VARCHAR(300),
    DataComentario DATE,
    DenunciadoComentario BOOLEAN DEFAULT 0 ,
    NotaComentario FLOAT,
    fk_Restaurante_IdRestaurante INT,
    fk_P_R_A__IdPRA INT
);

CREATE TABLE Prato (
    IdPrato INT PRIMARY KEY auto_increment,
    NomePrato VARCHAR(200),
    DescricaoPrato VARCHAR(400),
    FotoPrato MEDIUMBLOB,
    PrecoPrato VARCHAR(10),
    fk_Restaurante_IdRestaurante INT
);

CREATE TABLE Categoria (
    IdCategoria INT PRIMARY KEY auto_increment,
    NomeCategoria VARCHAR(200) UNIQUE,
    DescricaoCategoria VARCHAR(400) UNIQUE
);

INSERT INTO Categoria (NomeCategoria, DescricaoCategoria) 
VALUES 
('Vegetariano', 'Pratos que não contêm carne ou produtos de origem animal.'),
('Vegano', 'Pratos que não contêm nenhum ingrediente de origem animal.'),
('Sem Glúten', 'Pratos que não contêm glúten.'),
('Sem Lactose', 'Pratos que não contêm lactose.'),
('Orgânico', 'Pratos feitos com ingredientes cultivados sem o uso de pesticidas ou fertilizantes sintéticos.'),
('Sem Frutos do Mar', 'Pratos que não contêm frutos do mar ou produtos derivados.'),
('Sem Nozes', 'Pratos que não contêm nozes ou produtos derivados.'),
('Kosher', 'Pratos que seguem as leis dietéticas judaicas.'),
('Halal', 'Pratos que seguem as leis dietéticas islâmicas.'),
('Ceto', 'Pratos com baixo teor de carboidratos e alto teor de gorduras saudáveis.'),
('Paleo', 'Pratos que imitam os alimentos consumidos durante a era paleolítica, excluindo alimentos processados e agrícolas.'),
('Baixo teor de gordura', 'Pratos com reduzido teor de gordura.'),
('Baixo teor de açúcar', 'Pratos com reduzido teor de açúcar.'),
('Baixo teor de sódio', 'Pratos com reduzido teor de sódio.');


CREATE TABLE Horario (
    IdHorario INT PRIMARY KEY auto_increment,
    DiadaSemana VARCHAR(30),
    AbreTime VARCHAR(10),
    FechaTime VARCHAR(10),
    fk_Restaurante_IdRestaurante INT
);

CREATE TABLE Prato_Categoria (
	IdPratoCategoria INT PRIMARY KEY auto_increment,
    fk_Categoria_IdCategoria INT,
    fk_Prato_IdPrato INT
);

CREATE TABLE PRA_Categoria (
	IdPRACategoria INT PRIMARY KEY auto_increment,
    fk_Categoria_IdCategoria INT,
    fk_P_R_A__IdPRA INT
);
 
ALTER TABLE Comentario ADD CONSTRAINT FK_Comentario_2
    FOREIGN KEY (fk_Restaurante_IdRestaurante)
    REFERENCES Restaurante (IdRestaurante)
    ON DELETE CASCADE;
 
ALTER TABLE Comentario ADD CONSTRAINT FK_Comentario_3
    FOREIGN KEY (fk_P_R_A__IdPRA)
    REFERENCES P_R_A_ (IdPRA)
    ON DELETE CASCADE;
 
ALTER TABLE Prato ADD CONSTRAINT FK_Prato_2
    FOREIGN KEY (fk_Restaurante_IdRestaurante)
    REFERENCES Restaurante (IdRestaurante)
    ON DELETE RESTRICT;
 
ALTER TABLE Horario ADD CONSTRAINT FK_Horario_2
    FOREIGN KEY (fk_Restaurante_IdRestaurante)
    REFERENCES Restaurante (IdRestaurante)
    ON DELETE RESTRICT;
 
ALTER TABLE Prato_Categoria ADD CONSTRAINT FK_Prato_Categoria_1
    FOREIGN KEY (fk_Categoria_IdCategoria)
    REFERENCES Categoria (IdCategoria)
    ON DELETE RESTRICT;
 
ALTER TABLE Prato_Categoria ADD CONSTRAINT FK_Prato_Categoria_2
    FOREIGN KEY (fk_Prato_IdPrato)
    REFERENCES Prato (IdPrato)
    ON DELETE SET NULL;
 
ALTER TABLE PRA_Categoria ADD CONSTRAINT FK_PRA_Categoria_1
    FOREIGN KEY (fk_Categoria_IdCategoria)
    REFERENCES Categoria (IdCategoria)
    ON DELETE RESTRICT;
 
ALTER TABLE PRA_Categoria ADD CONSTRAINT FK_PRA_Categoria_2
    FOREIGN KEY (fk_P_R_A__IdPRA)
    REFERENCES P_R_A_ (IdPRA)
    ON DELETE SET NULL;
