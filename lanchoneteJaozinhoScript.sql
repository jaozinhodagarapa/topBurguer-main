create database lanchoneteDoJaozinho;

use lanchoneteDoJaozinho;

create table produtos (
id int not null auto_increment,
nome varchar(200) not null,
preco decimal(10,2) not null,
ingredientes varchar(500) not null,
imagem blob not null,
primary key(id)
);

create table clientes (
id int not null auto_increment,
foto blob not null,
nome varchar(200) not null,
endereco varchar(120) not null,
telefone varchar(14) not null,
email varchar(120) not null unique,
cpf varchar(11) not null unique,
password varchar(100) not null,
primary key(id)
);