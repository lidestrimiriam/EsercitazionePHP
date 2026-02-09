CREATE DATABASE Biblioteca;

CREATE TABLE Biblioteca.Utente(
	cf int PRIMARY KEY,
    nome varchar(10) NOT NULL,
    cognome varchar(10) NOT NULL,
    email varchar(10) NOT NULL UNIQUE,
    età int CHECK(età >= 14)
);

CREATE TABLE Biblioteca.Libro(
	id int PRIMARY KEY,
    titolo varchar(10) NOT NULL,
    autore varchar(10) NOT NULL,
    isbn varchar(30) UNIQUE,
    anno_pubblicazione int CHECK(anno_pubblicazione >= 1500)
);

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
    data_restituzione date
);
