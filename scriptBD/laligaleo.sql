/*
Created		07/06/2018
Modified		07/06/2018
Project		
Model		
Company		
Author		
Version		
Database		mySQL 5 
*/


drop table IF EXISTS Jugadores;
drop table IF EXISTS Equipos;


Create table Equipos (
	Id Bigint NOT NULL AUTO_INCREMENT,
	nombre Varchar(100) NOT NULL,
	UNIQUE (nombre),
 Primary Key (Id)) ENGINE = InnoDB;

Create table Jugadores (
	Id Bigint NOT NULL AUTO_INCREMENT,
	equipos_Id Bigint NOT NULL,
	nombre Varchar(50) NOT NULL,
	apellido Varchar(50) NOT NULL,
 Primary Key (Id)) ENGINE = InnoDB;


Alter table Jugadores add Foreign Key (equipos_Id) references Equipos (Id) on delete cascade on update cascade;


/* Users permissions */


