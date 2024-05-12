CREATE TABLE Socio (
  ID int(50) NOT NULL AUTO_INCREMENT,
  Nome varchar(50) unique NOT NULL,
  DataNascita date NOT NULL,
  Password varchar(50) NOT NULL,
  PRIMARY KEY (ID)
);

CREATE TABLE Campo (
  ID int(50) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (ID)
);

CREATE TABLE Prenotazione (
  ID int(50) NOT NULL AUTO_INCREMENT,
  CodiceSocio varchar(50) NOT NULL,
  CodiceCampo varchar(50) NOT NULL,
  DataPrenotazione datetime NOT NULL, /* format: YYYY-MM-DD HH:MI:SS */
  PRIMARY KEY (ID)
);

/* INSERT INTO Prenotazione */

/*
SELECT Count(CodiceSocio) FROM ... WHERE DataPrenotazione = ... and CodiceCampo = ...
*/

ALTER TABLE Prenotazione
ADD FOREIGN KEY (CodiceSocio) REFERENCES Socio(ID),
ADD FOREIGN KEY (CodiceCampo) REFERENCES Campo(ID);