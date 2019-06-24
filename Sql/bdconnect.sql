
create table Etudiant(
    idEtu INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    matricule VARCHAR(45) UNIQUE,
    nom VARCHAR(50),
    prenom VARCHAR(100),
    mail VARCHAR(100),
    tel INT,
    ddn DATE
);

create TABLE Situation(
    idtype INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(120),
    montant DOUBLE
);

CREATE TABLE Boursier(
    idbour int not null AUTO_INCREMENT,
    idEtu int,
    idtype INT,
    PRIMARY KEY(idbour,idEtu),
    CONSTRAINT fk_etudiantboursier FOREIGN KEY (idEtu) REFERENCES Etudiant(idEtu),
    CONSTRAINT fk_type FOREIGN KEY (idtype) REFERENCES Situation(idtype)
);

CREATE TABLE NonBoursier(
    idnob int not null AUTO_INCREMENT,
    idEtu int,
    PRIMARY KEY(idnob,idEtu),
    CONSTRAINT fk_etudiantnonboursier FOREIGN KEY (idEtu) REFERENCES Etudiant(idEtu)
);

CREATE TABLE Batiment(
    idbat int not null AUTO_INCREMENT PRIMARY KEY,
    numbat int
);

CREATE TABLE Chambre(
    idcham int not null AUTO_INCREMENT PRIMARY KEY,
    numcham int,
    idbat INT,
    CONSTRAINT fk_chambre FOREIGN KEY (idbat) REFERENCES Batiment(idbat)
);

CREATE TABLE Loger(
    idlog int not null AUTO_INCREMENT,
    idbour int not null,
    idEtu int not null,
    idcham int not null,
    PRIMARY KEY(idlog,idEtu,idbour),
    CONSTRAINT fk_Etudiant FOREIGN KEY (idEtu) REFERENCES Etudiant(idEtu),
    CONSTRAINT fk_bourse FOREIGN KEY (idbour) REFERENCES Boursier(idbour),
    CONSTRAINT fk_chambreloger FOREIGN KEY (idcham) REFERENCES Chambre(idcham)
);