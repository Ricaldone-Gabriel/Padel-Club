CREATE TABLE Socio (
  ID int(50) NOT NULL AUTO_INCREMENT,
  Nome varchar(50) NOT NULL,
  Email varchar(30) unique not null,
  DataNascita date NOT NULL,
  Cliente_CF varchar(50),
  PRIMARY KEY (ID)
);

CREATE TABLE Campo (
  Targa varchar(50) NOT NULL,
  Modello varchar(50) DEFAULT NULL,
  Marca varchar(50) DEFAULT NULL,
  Colore varchar(50) DEFAULT NULL,
  Cliente_CF varchar(50),
  PRIMARY KEY (Targa)
);

CREATE TABLE Prenotazione (
  ID int(50) NOT NULL AUTO_INCREMENT,
  Nome varchar(50) DEFAULT NULL,
  Cognome varchar(50) DEFAULT NULL,
  Data_di_nascita date DEFAULT NULL,
  Squadra_ID int(11) DEFAULT NULL,
  RCA_ID varchar(50),
  Automobile_Targa varchar(50),
  PRIMARY KEY (CF)
);

ALTER TABLE Cliente
ADD FOREIGN KEY (RCA_ID) REFERENCES RCA(ID),
ADD FOREIGN KEY (Automobile_Targa) REFERENCES Automobile(Targa);

ALTER TABLE RCA
ADD FOREIGN KEY (Cliente_CF) REFERENCES Cliente(CF);

ALTER TABLE Automobile
ADD FOREIGN KEY (Cliente_CF) REFERENCES Cliente(CF);