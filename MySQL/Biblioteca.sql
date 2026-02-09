CREATE DATABASE Biblioteca;

CREATE TABLE Biblioteca.Utente(
	cf int PRIMARY KEY,
    nome varchar(100) NOT NULL,
    cognome varchar(100) NOT NULL,
    email varchar(100) NOT NULL UNIQUE,
    eta int CHECK(eta >= 14)
);

INSERT INTO Biblioteca.Utente values 
(1, 'Miriam', 'Li Destri', 'm.lide@gmail.com',18),
(2, 'Diego', 'Marinsek', 'd.mari@gmail.com', 18),
(3, 'Sara', 'Rossi', 's.rossi@gmail.com', 19),
(4, 'Marco', 'Verdi', 'm.verdi@gmail.com', 35),
(5, 'Emma', 'Neri', 'e.neri@gmail.com', 28);

CREATE TABLE Biblioteca.Libro(
	id int PRIMARY KEY,
    titolo varchar(100) NOT NULL,
    autore varchar(100) NOT NULL,
    isbn varchar(300) UNIQUE,
    anno_pubblicazione int CHECK(anno_pubblicazione >= 1500)
);

INSERT INTO Biblioteca.Libro values 
(1, 'Cè un Cadavere in Biblioteca', 'Agatha Christie', '9780062573292',1942),
(2, 'Dieci piccoli indiani', 'Agatha Christie', '9788804738225', 1939),
(3, 'Il nome della rosa', 'Umberto Eco', '9788845244613', 1980),
(4, '1984', 'George Orwell', '9780451524935', 1949),
(5, 'Il piccolo principe', 'Antoine de Saint-Exupéry', '9780156013987', 1943);

CREATE TABLE Biblioteca.Prestito(
	id_prestito int PRIMARY KEY,
    id_utente int,
    id_libro int,
    
    CONSTRAINT fk_utente
		FOREIGN KEY (id_utente)
		REFERENCES Biblioteca.Utente(cf),
        
    CONSTRAINT fk_libro
		FOREIGN KEY (id_libro)
		REFERENCES Biblioteca.Libro(id),
        
    data_prestito date NOT NULL,
    data_restituzione date CHECK(data_restituzione >= data_prestito)
);

INSERT INTO Biblioteca.Prestito values 
(1, 1, 1, '2025-05-10', '2026-01-18'),
(2, 2, 3, '2025-01-15', '2025-02-15'),
(3, 3, 1, '2025-03-01', '2025-03-20'),
(4, 4, 2, '2025-04-10', '2025-05-10'),
(5, 1, 4, '2025-06-01', NULL);