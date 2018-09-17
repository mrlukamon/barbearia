create database teste;
use teste;
drop database teste;

create table produto(
  id int primary key auto_increment,
  descricao varchar(100),
  preco real
);

create table cliente(
  id int primary key auto_increment,
  nome varchar(100),
  fone varchar(100),
  estado_civil_id integer references estado_civil(id) 
);

create table estado_civil(
  id int primary key auto_increment,
  nome varchar(100)
);

create table usuario(
  id serial primary key,
  username varchar(100) unique,
  password varchar(100)
);

select * from usuario;

  create table curso(
  id serial primary key,
  nome varchar(100) unique,
usuario_id integer references usuario(id) on delete cascade
  );


insert into usuario values (default, 'admin', md5('123'));
insert into usuario values (default, 'aaaa', md5('123'));
insert into usuario values (default, 'admaa', md5('123'));

select cliente.id, cliente.nome as cliente_nome, cliente.fone, estado_civil.nome as estado_civil_nome from cliente join estado_civil on estado_civil.id=cliente.estado_civil_id;