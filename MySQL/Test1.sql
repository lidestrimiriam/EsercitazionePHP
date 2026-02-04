CREATE DATABASE Prova;

CREATE TABLE Prova.Casa(
	id int PRIMARY KEY,
	nome varchar(20),
	indirizzo varchar(100) NOT NULL
);

CREATE TABLE Prova.NumeroCellulare(
	cod int PRIMARY KEY,
    numero int NOT NULL,
    tipo varchar(100) DEFAULT ("personale")
);

CREATE TABLE Prova.Persona(
	cf varchar(16) PRIMARY KEY,
    nome varchar(10) NOT NULL,
    cognome varchar(10) NOT NULL,
    email varchar(20) UNIQUE
);

CREATE TABLE Prova.Rubrica(
	id int PRIMARY KEY,
    codPersona varchar(10), 
    codCell int,
    
    CONSTRAINT fk_persona
		FOREIGN KEY (codPersona)
		REFERENCES Prova.persona(cf),
        
	 CONSTRAINT fk_NumeroCellulare
		FOREIGN KEY (codCell)
		REFERENCES Prova.NumeroCellulare(id)
        
);