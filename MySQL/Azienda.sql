CREATE DATABASE Azienda;
USE Azienda;

CREATE TABLE Azienda.Impiegato(
    matricola int PRIMARY KEY,
    cognome varchar(20) NOT NULL,
    stipendio int NOT NULL,
    dipartimento varchar(5)
);

INSERT INTO Azienda.Impiegato VALUES
(101, 'Sili', 60, 'NO'),
(102, 'Rossi', 40, 'NO'),
(103, 'Neri', 40, 'NO'),
(201, 'Neri', 40, 'SU'),
(202, 'Verdi', 50, 'SU'),
(301, 'Bisi', 70, 'IS');

CREATE TABLE Azienda.Dipartimento(
    codice varchar(5) PRIMARY KEY,
    nome varchar(20) NOT NULL,
    sede varchar(30) NOT NULL,
    direttore int,
    CONSTRAINT fk_direttore 
    FOREIGN KEY (direttore) REFERENCES Azienda.Impiegato(matricola)
);

INSERT INTO Azienda.Dipartimento VALUES
('NO', 'Nord', 'Milano', 101),
('SU', 'Sud', 'Napoli', 201),
('IS', 'Isole', 'Palermo', 301);

CREATE TABLE Azienda.Progetto(
    sigla varchar(20) PRIMARY KEY,
    nome varchar(20) NOT NULL,
    bilancio int NOT NULL,
    responsabile int,
    CONSTRAINT fk_responsabile
    FOREIGN KEY (responsabile) REFERENCES Azienda.Impiegato(matricola)
);

INSERT INTO Azienda.Progetto VALUES
('Alpha', 'Vendite', 30, 202),
('Beta', 'Inventario', 50, 301),
('Gamma', 'Distribuzione', 18, 301);

CREATE TABLE Azienda.Partecipazione(
    impiegato int,
    progetto varchar(20),

    PRIMARY KEY (impiegato, progetto),

    CONSTRAINT fk_impiegato
    FOREIGN KEY (impiegato) REFERENCES Azienda.Impiegato(matricola),

    CONSTRAINT fk_progetto
    FOREIGN KEY (progetto) REFERENCES Azienda.Progetto(sigla)
);

INSERT INTO Azienda.Partecipazione VALUES
(101, 'Alpha'),
(101, 'Beta'),
(103, 'Alpha'),
(103, 'Beta'),
(201, 'Beta'),
(202, 'Beta');

ALTER TABLE Azienda.Impiegato
ADD CONSTRAINT fk_dipartimento 
FOREIGN KEY (dipartimento) REFERENCES Azienda.Dipartimento(codice);

SELECT matricola, cognome FROM Azienda.Impiegato WHERE stipendio > 50;
SELECT cognome, stipendio FROM Azienda.Impiegato JOIN Azienda.Dipartimento ON Impiegato.matricola = Dipartimento.codice WHERE sede LIKE "Roma"; 
SELECT cognome, nome FROM Azienda.Impiegato JOIN Azienda.Dipartimento ON Impiegato.dipartimento = Dipartimento.codice;
SELECT cognome FROM Azienda.Impiegato WHERE Impiegato.matricola IN(SELECT direttore FROM Azienda.Dipartimento); 
SELECT nome, cognome FROM Azienda.Progetto JOIN Azienda.Impiegato ON Progetto.responsabile = Impiegato.matricola;
SELECT nome, cognome FROM Azienda.Partecipazione JOIN Azienda.Progetto ON Progetto.sigla = Partecipazione.progetto JOIN Azienda.Impiegato ON Partecipazione.impiegato = Impiegato.matricola WHERE Progetto.bilancio > 100;
SELECT cognome FROM Azienda.Impiegato JOIN Azienda.Dipartimento ON Impiegato.dipartimento = Dipartimento.codice WHERE stipendio > ALL(SELECT stipendio FROM Azienda.Impiegato WHERE Impiegato.matricola = Dipartimento.direttore);



DROP DATABASE Azienda;
CREATE DATABASE Azienda;
USE Azienda;
