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
(5, 'Emma', 'Neri', 'e.neri@gmail.com', 28),
(6, 'Tommaso', 'Rinaldi', 't.rinaldi@gmail.com', 17),
(7, 'Sofia', 'Caruso', 's.caruso@gmail.com', 16),
(8, 'Gabriele', 'Leone', 'g.leone@gmail.com', 15),
(9, 'Alice', 'Martini', 'a.martini@gmail.com', 14),
(10, 'Riccardo', 'Longo', 'r.longo@gmail.com', 13),
(11, 'Beatrice', 'Gentile', 'b.gentile@gmail.com', 12),
(12, 'Edoardo', 'Serra', 'e.serra@gmail.com', 11),
(13, 'Noemi', 'Villa', 'n.villa@gmail.com', 10),
(14, 'Samuele', 'Ferraro', 's.ferraro@gmail.com', 9),
(15, 'Aurora', 'Fabbri', 'a.fabbri@gmail.com', 8);

CREATE TABLE Biblioteca.Libro(
	id int PRIMARY KEY,
    titolo varchar(100) NOT NULL,
    autore varchar(100) NOT NULL,
    isbn varchar(300) UNIQUE,
    anno_pubblicazione int CHECK(anno_pubblicazione >= 1500)
);

INSERT INTO Biblioteca.Libro values 
(1, 'Cè un Cadavere in Biblioteca', 'Agatha Christie', '9780062573292',1942),
(2, 'Amico ritrovato', 'Fred Uhlman', '9788804738225', 1971),
(3, 'Il pomeriggio della luna', 'Marco Pozza', ' 9788854895867', 2016),
(4, 'Il caso Agatha Christie', 'Nina de Gramont', '9780451524935', 2022),
(5, 'Il piccolo principe', 'Antoine de Saint-Exupéry', '9780156013987', 1943),
(6, 'I promessi sposi', 'Alessandro Manzoni', '9788807901862', 1827),
(7, 'Il calice di fuoco', ' J.K. Rowling', '9788845292613', 2005),
(8, '1984', 'George Orwell', '9780451524936', 1949),
(9, 'Orgoglio e pregiudizio', 'Jane Austen', '9780141439518', 1813),
(10, 'Il grande Gatsby', 'F. Scott Fitzgerald', '9780743273565', 1925),
(11, 'Moby Dick', 'Herman Melville', '9781503280786', 1851),
(12, 'Dieci piccoli indiani', 'Agatha Christie', '9780062073488', 1939),
(13, 'Il signore delle mosche', 'William Golding', '9780571056866', 1954),
(14, 'Il codice Da Vinci', 'Dan Brown', '9780307474278', 2003),
(15, 'La coscienza di Zeno', 'Italo Svevo', '9788807881553', 1923);

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
(5, 1, 4, '2025-06-01', NULL),
(6, 5, 2, '2025-02-10', '2025-03-01'),
(7, 6, 5, '2025-03-15', '2025-04-10'),
(8, 7, 6, '2025-04-01', '2025-04-20'),
(9, 8, 7, '2025-05-05', '2025-05-25'),
(10, 9, 8, '2025-06-10', NULL),
(11, 10, 9, '2025-01-20', '2025-02-05'),
(12, 11, 10, '2025-02-14', '2025-03-14'),
(13, 12, 3, '2025-03-22', '2025-04-12'),
(14, 13, 4, '2025-04-18', '2025-05-02'),
(15, 14, 11, '2025-05-25', NULL);

SELECT * FROM Biblioteca.Utente;
SELECT * FROM Biblioteca.Libro;
SELECT * FROM Biblioteca.Utente WHERE eta <= 18;
SELECT * FROM Biblioteca.Libro WHERE anno_pubblicazione >= 2010;
SELECT * FROM Biblioteca.Utente WHERE email LIKE '%@gmail.com';