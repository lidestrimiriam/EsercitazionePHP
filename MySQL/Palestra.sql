CREATE DATABASE Palestra;

CREATE TABLE Palestra.iscritto(
	idIscritto int PRIMARY KEY,
    nome varchar(20) NOT NULL,
    cognome varchar(20) NOT NULL,
    data_nascita date NOT NULL,
    email varchar(40) UNIQUE,
    telefono varchar(20)
);

INSERT INTO Palestra.iscritto VALUES
(1, 'miriam', 'li destri', '2007-05-10', 'miriam.lidestri@gmail.com', '3388693340'),
(2, 'diego', 'marinsek', '2008-01-18', 'diego.marinsek@gmail.com', '3477143110'),
(3, 'Francesca', 'Romano', '1998-04-12', 'francesca.romano@gmail.com', '3331111111'),
(4, 'Luca', 'Bianchi', '2003-09-21', 'luca.bianchi@yahoo.com', '3332222227'),
(5, 'Martina', 'Galli', '1995-01-30', 'martina.galli@gmail.com', '3333333333'),
(6, 'Alessio', 'Riva', '1989-07-15', 'alessio.riva@hotmail.com', '3334444444'),
(7, 'Giulia', 'Conti', '2001-11-02', 'giulia.conti@yahoo.com', '3335555555'),
(8, 'Marco', 'Ferrari', '1997-06-18', 'marco.ferrari@gmail.com', '3336666666'),
(9, 'Anna', 'Morelli', '1993-03-10', 'anna.morelli@gmail.com', '3337777777');

CREATE TABLE Palestra.corso(
	idCorso int PRIMARY KEY,
    nomeCorso varchar(40) NOT NULL,
    istruttore varchar(40) NOT NULL,
    durata_mesi int NOT NULL,
    costo double NOT NULL
);

INSERT INTO Palestra.corso VALUES
(1, 'Fitness Base', 'Verdi', 4, 60),
(2, 'Yoga Relax', 'Neri', 6, 45),
(3, 'Crossfit Advanced', 'Verdi', 3, 70),
(4, 'Pilates', 'Rossi', 5, 55),
(5, 'Zumba Fitness', 'Bianchi', 2, 40),
(6, 'Body Building', 'Neri', 8, 80),
(7, 'Cardio Intensivo', 'Verdi', 4, 65),
(8, 'Stretch & Flex', 'Rossi', 3, 50),
(9, 'Power Training', 'Bianchi', 6, 75);

CREATE TABLE Palestra.iscrizione(
	idIscrizione INT PRIMARY KEY,
	id_iscritto INT,
    id_corso INT,
    data_iscrizione DATE NOT NULL,
    stato VARCHAR(10) CHECK(stato = 'attiva' OR stato ='terminata'),
    
    CONSTRAINT fk_iscritto
		FOREIGN KEY (id_iscritto) REFERENCES Palestra.iscritto(idIscritto),
        
	CONSTRAINT fk_corso
		FOREIGN KEY (id_corso) REFERENCES Palestra.corso(idCorso)
);

INSERT INTO Iscrizione VALUES
(1, 1, 1, '2025-01-10', 'attiva'),
(2, 1, 3, '2025-01-15', 'attiva'),
(3, 2, 2, '2024-12-20', 'terminata'),
(4, 3, 1, '2025-01-05', 'attiva'),
(5, 3, 4, '2024-10-01', 'terminata'),
(6, 4, 3, '2025-02-01', 'attiva'),
(7, 5, 5, '2025-01-18', 'attiva'),
(8, 6, 1, '2024-11-11', 'terminata'),
(9, 7, 2, '2025-01-22', 'attiva');

SELECT * FROM Palestra.iscritto WHERE data_nascita < '2000-01-01';
SELECT * FROM Palestra.iscritto WHERE nome LIKE '%a';
SELECT * FROM Palestra.iscritto WHERE email LIKE '%yahoo%';
SELECT * FROM Palestra.corso WHERE nomeCorso LIKE '%fitness%';
SELECT * FROM Palestra.corso WHERE costo > 50;
SELECT * FROM Palestra.corso WHERE durata_mesi BETWEEN 3 AND 6;
SELECT DISTINCT istruttore FROM Palestra.corso;
SELECT * FROM Palestra.iscrizione WHERE stato = 'attiva';
SELECT * FROM Palestra.iscrizione WHERE data_iscrizione BETWEEN '2025-01-01' AND '2025-01-31';
SELECT nome, cognome, corso.nomeCorso FROM Palestra.iscritto JOIN Palestra.iscrizione ON iscritto.idIscritto = iscrizione.id_iscritto JOIN Palestra.corso ON corso.idCorso = iscrizione.id_corso;
SELECT DISTINCT nomeCorso FROM Palestra.corso JOIN Palestra.iscrizione ON corso.idCorso = iscrizione.id_corso;
SELECT DISTINCT nome, corso.istruttore FROM Palestra.iscritto JOIN Palestra.iscrizione ON iscritto.idIscritto = iscrizione.id_iscritto JOIN Palestra.corso ON corso.idCorso = iscrizione.id_corso;
SELECT DISTINCT email FROM Palestra.iscritto JOIN Palestra.iscrizione ON iscritto.idIscritto = iscrizione.id_iscritto WHERE stato = 'attiva';
SELECT * FROM Palestra.corso LEFT JOIN Palestra.iscrizione ON corso.idCorso = iscrizione.id_corso WHERE iscrizione.id_iscritto IS NULL;


