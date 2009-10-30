drop table ContenuStandard;
drop table Equipe;
drop table Carriere;
drop table Photo;
drop table Services;
drop table Utilisateurs;



Create Table ContenuStandard
(
	Id number Primary Key,
	Titre varchar(50) not null,
	Contenu varchar(2000) not null,
	Langue varchar(2) not null
)
;
Create Table Equipe
(
	Id number Primary Key,
	Nom varchar(50) not null,
	Prenom varchar(50) not null,
	Fonction varchar(50) not null,
	Description varchar(800) not null,
	Langue varchar(2) not null,
	LienPhoto varchar(100) not null
	
)
;
Create Table Carriere
(
	Id number Primary Key,
	Intitule varchar(50) not null,
	Description varchar(800),
	Langue varchar(2) not null,
	DateEmbauche varchar(50) not null
)
;
Create Table Photo
(
	Id number Primary Key,
	Nom varchar(50) not null,
	Langue varchar(2) not null,
	Description varchar(100) not null,
	Lien varchar(50) not null
)
;
Create Table Services
(
	Id number Primary Key,
	Titre varchar(50) not null,
	Langue varchar(2) not null,
	Description varchar(800) not null
)
;

Create Table Utilisateurs
(
	Id number Primary Key,
	Logon varchar(50) not null,
	Password varchar(20) not null
)
;
