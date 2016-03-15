DROP TABLE IF EXISTS Repondre;
DROP TABLE IF EXISTS Theme;
DROP TABLE IF EXISTS FaitPartie;
DROP TABLE IF EXISTS Questionnaire;
DROP TABLE IF EXISTS Question;
DROP TABLE IF EXISTS Compte;

CREATE TABLE Question
(IdQuestion INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
Question TEXT NOT NULL,
DomaineQuestion VARCHAR(42) NOT NULL,
Choix1 VARCHAR(42),
Choix2 VARCHAR(42),
Choix3 VARCHAR(42),
Choix4 VARCHAR(42),
Choix5 VARCHAR(42),
Reponse VARCHAR(42) NOT NULL,
Duree INT);

CREATE TABLE Questionnaire
(IdQuestionnaire INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
NomQuestionnaire VARCHAR(42),
NombreQuestion INT NOT NULL,
DureeQ INT,
DateDerniereEdition DATE,
Domaine VARCHAR(42) NOT NULL);

CREATE TABLE Theme
(Domaine VARCHAR(42) NOT NULL,
DomaineQuestion VARCHAR(42) NOT NULL,
CONSTRAINT KEYTheme PRIMARY KEY (Domaine,DomaineQuestion));

CREATE TABLE FaitPartie
(IdQuestionnaire INT NOT NULL,
IdQuestion INT NOT NULL,
ChoixMultiple INT,
CONSTRAINT KEYFaitPartie PRIMARY KEY (IdQuestionnaire,IdQuestion),
CONSTRAINT FKFaitPartieQuestionnaire FOREIGN KEY (IdQuestionnaire) REFERENCES Questionnaire(IdQuestionnaire),
CONSTRAINT FKFaitPartieQuestion FOREIGN KEY (IdQuestion) REFERENCES Question(IdQuestion));

CREATE TABLE Compte(
NomCompte VARCHAR(42) NOT NULL PRIMARY KEY,
MotDePasse VARCHAR(255) NOT NULL,
Mail VARCHAR(42) NOT NULL,
Nom VARCHAR(42),
Prenom VARCHAR(42),
DateNaissance DATE,
DateInscription DATE,
TypeC VARCHAR(42));

CREATE TABLE Repondre
(IdQuestionnaire INT NOT NULL,
NomCompte VARCHAR(42) NOT NULL,
DateReponse DATETIME,
Resultat INT,
DureeReponse INT,
CONSTRAINT KEYRepondre PRIMARY KEY (IdQuestionnaire,NomCompte,DateReponse),
CONSTRAINT FKRepondreQuestionnaire FOREIGN KEY (IdQuestionnaire) REFERENCES Questionnaire(IdQuestionnaire),
CONSTRAINT FKRepondreCompte FOREIGN KEY (NomCompte) REFERENCES Compte(NomCompte));