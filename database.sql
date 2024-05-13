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
  CodiceSocio int(50) NOT NULL,
  CodiceCampo int(50) NOT NULL,
  DataPrenotazione date NOT NULL, /* format: YYYY-MM-DD */
  OraPrenotazione time NOT NULL, /* format: hh:mm:ss */
  PRIMARY KEY (ID)
);

/* INSERT INTO Prenotazione (CodiceSocio, CodiceCampo, DataPrenotazione) VALUES ("","","")*/

/*
SELECT Count(CodiceSocio) FROM ... WHERE DataPrenotazione = ... and CodiceCampo = ...
*/

ALTER TABLE Prenotazione
ADD FOREIGN KEY (CodiceSocio) REFERENCES Socio(ID),
ADD FOREIGN KEY (CodiceCampo) REFERENCES Campo(ID);


INSERT INTO Campo (ID) 
VALUES (1), (2), (3), (4);