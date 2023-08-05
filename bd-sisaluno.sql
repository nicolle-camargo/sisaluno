CREATE DATABASE sisaluno;
USE sisaluno; 

CREATE TABLE aluno(
id smallint(6) primary key auto_increment,
nome varchar(100),
idade  int(11),
datanascimento date,
endereco varchar(100),
estatus varchar(2) 
);

CREATE TABLE professor(
id smallint(6) primary key auto_increment,
nome varchar(100),
idade smallint,
datanascimento date,
endereco varchar(100),
estatus char(2) 
);

CREATE TABLE disciplina(
id smallint(6) primary key auto_increment,
nomedisciplina varchar(100),
ch varchar(3),
semestre varchar(5),
idprofessor smallint(11)
);





