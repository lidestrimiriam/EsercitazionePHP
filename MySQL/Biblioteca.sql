CREATE DATABASE Biblioteca;

CREATE TABLE Biblioteca.Utente(
	cf int PRIMARY KEY,
    nome varchar(100) NOT NULL,
    cognome varchar(100) NOT NULL,
    email varchar(100) NOT NULL UNIQUE,
    eta int CHECK(eta >= 8)
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
(15, 'Niccolo', 'Rossi', 'nicolo.rossi@gigi.com', 8),
(16, 'Francesca', 'Galli', 'francesca.galli@gmail.com', 27),
(17, 'Fabio', 'Morelli', 'fabio.morelli@gmail.com', 32),
(18, 'Federica', 'Martelli', 'f.martelli@gmail.com', 24),
(19, 'Luca', 'Galli', 'luca.galli@gmail.com', 29),
(20, 'Giulia', 'Belli', 'giulia.belli@yahoo.com', 26);

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
(3, 'Il pomeriggio della luna', 'Marco Pozza', '9788854895867', 2016),
(4, 'Il caso Agatha Christie', 'Nina de Gramont', '9780451524935', 2022),
(5, 'Il piccolo principe', 'Antoine de Saint-Exupéry', '9780156013987', 1943),
(6, 'I promessi sposi', 'Alessandro Manzoni', '9788807901862', 1827),
(7, 'Il calice di fuoco', 'J.K. Rowling', '9788845292613', 2005),
(8, 'Dr. Jekyll and Mr. Hyde', 'Robert Louis Stevenson', '9780451524936', 1886),
(9, 'L.isola del tesoro', 'Robert Louis Stevenson', '9780618640157', 1883),
(10, 'Il castello errante di Howl', 'Diana Wynne Jones', '9780743273565', 1986),
(11, 'Assassinio sull’Orient Express', 'Agatha Christie', '9781503280786', 1934),
(12, 'Bianco come il latte rosso come il sangue', 'Alessandro D.Avenia', '9780062073488', 2010),
(13, 'Ciò che inferno non è', 'Alessandro D.Avenia', '9780571056866', 2014),
(14, 'Fino a quando la mia stella brillerà', 'Daniela Palumbo', '9780307474278', 2015),
(15, 'Viaggio al centro della Terra', 'Jules Verne', '9788807881553', 1864),
(16, 'Storia d amore antico', 'Umberto Eco', '9788800000001', 1600),
(17, 'Una storia moderna', 'Paolo Giordano', '9788800000002', 2018),
(18, 'Amore e destino', 'Isabel Allende', '9788800000003', 1995),
(19, 'Manuale di storia medievale', 'Alessandro Barbero', '9788800000004', 1700),
(20, 'Racconti senza tempo', 'Italo Calvino', 'NULL', 1890);

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
(1, 1, 1, '2020-05-10', '2025-01-18'),
(2, 2, 2, '2026-01-15', '2026-02-15'),
(3, 3, 3, '2024-03-01', '2024-03-20'),
(4, 4, 4, '2025-04-10', '2025-05-10'),
(5, 5, 5, '2020-06-01', NULL),
(6, 6, 6, '2024-02-10', '2024-03-01'),
(7, 7, 3, '2025-03-15', '2025-04-10'),
(8, 8, 6, '2026-04-01', '2026-04-20'),
(9, 9, 7, '2024-05-05', '2024-05-25'),
(10, 10, 8, '2025-06-10', NULL),
(11, 11, 9, '2026-01-20', '2026-02-05'),
(12, 12, 10, '2020-02-14', '2024-03-14'),
(13, 13, 3, '2025-03-22', '2025-04-12'),
(14, 14, 11, '2024-05-25', NULL),
(15, 15, 4, '2026-04-18', '2026-05-02'),
(16, 16, 16, '2024-01-10', '2024-02-10'),
(17, 17, 17, '2024-06-15', NULL),
(18, 19, 18, '2025-03-10', '2025-04-10'),
(19, 16, 19, '2024-09-01', '2024-09-20'),
(20, 18, 16, '2026-01-05', NULL);

SELECT * FROM Biblioteca.Utente;
SELECT * FROM Biblioteca.Libro;
SELECT * FROM Biblioteca.Utente WHERE eta <= 18;
SELECT * FROM Biblioteca.Libro WHERE anno_pubblicazione > 2010;
SELECT nome, cognome, eta FROM Biblioteca.Utente WHERE email LIKE '%@gmail%';

SELECT * FROM Biblioteca.Utente WHERE nome LIKE 'B%';
SELECT DISTINCT Libro.titolo FROM Biblioteca.Libro JOIN Biblioteca.Prestito ON libro.id = Prestito.id_libro WHERE Prestito.data_prestito LIKE '2026%';
SELECT * FROM Biblioteca.Libro JOIN Biblioteca.Prestito ON Libro.id = Prestito.id_libro JOIN Biblioteca.Utente ON Prestito.id_utente = Utente.cf WHERE Utente.email = 'nicolo.rossi@gigi.com';
SELECT titolo, autore FROM Biblioteca.Libro JOIN Biblioteca.Prestito ON Libro.id = Prestito.id_libro WHERE Prestito.data_prestito BETWEEN '2021-01-01' AND '2025-12-31';
SELECT DISTINCT Libro.titolo, Libro.autore FROM Biblioteca.Libro JOIN Biblioteca.Prestito ON Libro.id = prestito.id_libro JOIN Biblioteca.Utente ON Prestito.id_utente = Utente.cf WHERE Utente.eta BETWEEN 18 AND 24;
SELECT titolo, autore, Utente.nome, Utente.cognome FROM Biblioteca.Libro JOIN Biblioteca.Prestito ON Libro.id = Prestito.id_libro JOIN Biblioteca.Utente ON Prestito.id_utente = Utente.cf WHERE Prestito.data_prestito LIKE '2020%';

SELECT * FROM Biblioteca.Utente WHERE eta > 25;
SELECT * FROM Biblioteca.Utente WHERE nome LIKE 'F%';
SELECT * FROM Biblioteca.Utente WHERE email LIKE '%gmail%';
SELECT * FROM Biblioteca.Utente WHERE cognome LIKE '%lli';
SELECT * FROM Biblioteca.Utente WHERE Utente.eta BETWEEN 18 AND 30;
SELECT DISTINCT autore FROM Biblioteca.Libro;
SELECT * FROM Biblioteca.Libro WHERE titolo LIKE '%amore%';
SELECT * FROM Biblioteca.Libro WHERE anno_pubblicazione < 1900;
SELECT * FROM Biblioteca.Libro WHERE isbn = 'NULL';
SELECT * FROM Biblioteca.Libro JOIN Biblioteca.Prestito ON Libro.id = Prestito.id_libro WHERE data_restituzione IS NOT NULL;
SELECT * FROM Biblioteca.Libro JOIN Biblioteca.Prestito ON Libro.id = Prestito.id_libro WHERE data_prestito LIKE '2024%';
SELECT nome, cognome, Prestito.data_prestito FROM Biblioteca.Utente JOIN Biblioteca.Prestito ON Utente.cf = Prestito.id_utente;
SELECT titolo, autore FROM Biblioteca.Libro JOIN Biblioteca.Prestito ON Prestito.id_libro = Libro.id; 
SELECT DISTINCT titolo FROM Biblioteca.Libro JOIN Biblioteca.Prestito ON Prestito.id_libro = Libro.id;
SELECT nome, Libro.titolo FROM Biblioteca.Utente JOIN Biblioteca.Prestito ON Prestito.id_utente = Utente.cf JOIN Biblioteca.Libro ON Prestito.id_libro = Libro.id;
SELECT * FROM Biblioteca.Prestito JOIN Biblioteca.Utente ON Prestito.id_utente = Utente.cf WHERE Utente.cognome = 'Galli';
SELECT * FROM Biblioteca.Libro JOIN Biblioteca.Prestito ON Libro.id = Prestito.id_utente WHERE Libro.titolo LIKE '%storia%';
SELECT DISTINCT email FROM Biblioteca.Utente JOIN Biblioteca.Prestito ON Utente.cf = Prestito.id_utente;
SELECT titolo FROM Biblioteca.Libro JOIN Biblioteca.Prestito ON Libro.id = Prestito.id_libro WHERE Libro.anno_pubblicazione BETWEEN 1500 AND 1700;


DROP DATABASE Biblioteca;
CREATE DATABASE Biblioteca;
USE Biblioteca;