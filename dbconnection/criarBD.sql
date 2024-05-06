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
    AdminUser BOOLEAN
);

INSERT INTO P_R_A_ (NomePRA, EmailPRA, SenhaPRA, AdminUser) VALUES (
    "Admin",
    "adminteste@gmail.com",
    "Admin123@",
    TRUE
);

CREATE TABLE Restaurante (
    IdRestaurante INT PRIMARY KEY auto_increment,
    CNPJRestaurante INT UNIQUE,
    Numero_Restaurante INT,
    EmailRestaurante VARCHAR(200) UNIQUE,
    FotoRestaurante BLOB,
    SiteRestaurante VARCHAR(200) UNIQUE,
    SenhaRestaurante VARCHAR(200),
    NomeRestaurante VARCHAR(200) UNIQUE,
    RuaRestaurante VARCHAR(200),
    CEPRestaurante INT
);

CREATE TABLE Comentario (
    IdComentario INT PRIMARY KEY auto_increment,
    TextoComentario VARCHAR(300),
    DataComentario DATE,
    DenunciadoComentario BOOLEAN,
    NotaComentario FLOAT,
    fk_Restaurante_IdRestaurante INT,
    fk_P_R_A__IdPRA INT
);

CREATE TABLE Prato (
    IdPrato INT PRIMARY KEY auto_increment,
    NomePrato VARCHAR(200),
    DescricaoPrato VARCHAR(400),
    FotoPrato BLOB,
    PrecoPrato FLOAT,
    fk_Restaurante_IdRestaurante INT
);

CREATE TABLE CategoriaRestricao (
    IdCategoria INT PRIMARY KEY auto_increment,
    NomeCategoria VARCHAR(200) UNIQUE,
    DescricaoCategoria VARCHAR(400) UNIQUE
);

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
