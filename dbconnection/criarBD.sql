DROP DATABASE IF EXISTS SAFEDISH;
CREATE DATABASE SAFEDISH;
USE SAFEDISH;

/* Lógico_SAFEDISH: */

CREATE TABLE P_R_A_ (
    IdPRA INT PRIMARY KEY AUTO_INCREMENT,
    NomePRA VARCHAR(200) NOT NULL UNIQUE,
    EmailPRA VARCHAR(200) NOT NULL UNIQUE,
    SenhaPRA VARCHAR(200) NOT NULL
);

CREATE TABLE Restaurante (
    IdRestaurante INT PRIMARY KEY AUTO_INCREMENT,
    CNPJRestaurante VARCHAR(50) NOT NULL UNIQUE,
    Numero_Restaurante INT NOT NULL,
    EmailRestaurante VARCHAR(200) NOT NULL UNIQUE,
    FotoRestaurante MEDIUMBLOB,
    SiteRestaurante VARCHAR(200),
    SenhaRestaurante VARCHAR(200) NOT NULL,
    NomeRestaurante VARCHAR(200) NOT NULL UNIQUE,
    RuaRestaurante VARCHAR(200) NOT NULL,
    CEPRestaurante VARCHAR(100) NOT NULL
);

CREATE TABLE Comentario (
    IdComentario INT PRIMARY KEY AUTO_INCREMENT,
    TextoComentario VARCHAR(300) NOT NULL,
    DataComentario DATE,
    DenunciadoComentario BOOLEAN,
    NotaComentario FLOAT NOT NULL,
    fk_Restaurante_IdRestaurante INT,
    fk_Admin_IdAdmin INT,
    fk_P_R_A__IdPRA INT
);

CREATE TABLE Admin (
    IdAdmin INT PRIMARY KEY AUTO_INCREMENT,
    NomeAdmin VARCHAR(200) NOT NULL UNIQUE,
    EmailAdmin VARCHAR(200) NOT NULL UNIQUE,
    SenhaAdmin VARCHAR(200) NOT NULL
    );

CREATE TABLE Prato (
    IdPrato INT PRIMARY KEY AUTO_INCREMENT,
    NomePrato VARCHAR(200) NOT NULL,
    DescricaoPrato VARCHAR(400) NOT NULL,
    FotoPrato BLOB NOT NULL,
    PrecoPrato FLOAT NOT NULL,
    fk_Restaurante_IdRestaurante INT
);

CREATE TABLE Categoria (
    IdCategoria INT PRIMARY KEY AUTO_INCREMENT,
    NomeCategoria VARCHAR(200) NOT NULL UNIQUE,
    DescricaoCategoria VARCHAR(400) NOT NULL
);

CREATE TABLE Horario (
    IdHorario INT PRIMARY KEY AUTO_INCREMENT,
    DiadaSemana VARCHAR(50) NOT NULL,
    AbreTime VARCHAR(10) NOT NULL,
    FechaTime VARCHAR(10) NOT NULL,
    fk_Restaurante_IdRestaurante INT
);

CREATE TABLE Prato_Categoria (
	IdPratoCategoria INT PRIMARY KEY AUTO_INCREMENT,
    fk_Categoria_IdCategoria INT,
    fk_Prato_IdPrato INT
);

CREATE TABLE PRA_Categoria (
	IdPRACategoria INT PRIMARY KEY AUTO_INCREMENT,
    fk_Categoria_IdCategoria INT,
    fk_P_R_A__IdPRA INT
);
 
ALTER TABLE Comentario ADD CONSTRAINT FK_Comentario_2
    FOREIGN KEY (fk_Restaurante_IdRestaurante)
    REFERENCES Restaurante (IdRestaurante)
    ON DELETE CASCADE;
 
ALTER TABLE Comentario ADD CONSTRAINT FK_Comentario_3
    FOREIGN KEY (fk_Admin_IdAdmin)
    REFERENCES Admin (IdAdmin)
    ON DELETE CASCADE;
 
ALTER TABLE Comentario ADD CONSTRAINT FK_Comentario_4
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