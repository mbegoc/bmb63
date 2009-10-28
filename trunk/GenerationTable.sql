Create Table ContenuStandard
(
	id varchar(10) Primary Key,
	Titre varchar(50) not null,
	Contenu varchar(2000) not null
)
;
Create Table Equipe
(
	id varchar(10) Primary Key,
	Nom varchar(50) not null,
	Prenom varchar(50) not null,
	Fonction varchar(50) not null,
	Description varchar(500) not null,
	LienPhoto varchar(100) not null
)
;
Create Table Carriere
(
	id varchar(10) Primary Key,
	Intitule varchar(50) not null,
	Description varchar(500),
	DateEmbauche varchar(50) not null
)
;
Create Table Photo
(
	id varchar(10) Primary Key,
	Nom varchar(50) not null,
	Description varchar(100) not null,
	Lien varchar(50) not null
)
;
Create Table Services
(
	id varchar(10) Primary Key,
	Titre varchar(50) not null,
	Description varchar(500) not null
)
;
Create Table Utilisateurs
(
	Id varchar(10) Primary Key,
	Logon varchar(50) not null,
	Password varchar(20) not null
)
;