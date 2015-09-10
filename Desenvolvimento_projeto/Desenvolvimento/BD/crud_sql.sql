create database system_pessoal


/* crud básica de congigurações */

CREATE TABLE  configuracoes (
  idConfiguracoes INT NOT NULL AUTO_INCREMENT,
   nome  VARCHAR(45) NOT NULL,
   senha  VARCHAR(45) NOT NULL,
   email  VARCHAR(45) NOT NULL,
  PRIMARY KEY ( idConfiguracoes ))

CREATE TABLE todos_os_generos_filme (
  idtodos_os_generos_filme INT NOT NULL AUTO_INCREMENT,
  nome_genero VARCHAR(45) NOT NULL,
  PRIMARY KEY (idtodos_os_generos_filme, nome_genero))

CREATE TABLE filmes(
 idfilme INT auto_increment,
 nome varchar(200) NOT null unique,
 url_filme varchar(300),
 data_cadastro date NOT null,
 genero_1 VARCHAR(45) NOT null,
 genero_2 varchar(45) not null,
 obs varchar(500),
 primary key(idfilme))

/*alter table filmes ADD foreign key (genero_1) references todos_os_generos_filme (nome_genero)*/

CREATE TABLE filmes_p_baixar(
 idfilme_baixar int,
 filme_baixar varchar(200),
 primary key (idfilidme_baixar)) 

alter table filmes_p_baixar ADD foreign key (idfilme_baixar) references filmes (idfilme)
alter table filmes_p_baixar ADD foreign key (filme_baixar) references filmes (nome)


CREATE TABLE filmes_n_vistos(
  idfilme_visto int,
  filme_visto varchar(200),
 primary key (idfilme_visto))

alter table filmes_n_vistos ADD foreign key (idfilme_visto) references filmes (idfilme)
alter table filmes_n_vistos ADD foreign key (filme_visto) references filmes (nome) 



CREATE TABLE filmes_vistos(
  idfilme_visto int,
  filme_visto varchar(200),
 primary key (idfilme_visto))

alter table filmes_vistos ADD foreign key (idfilme_visto) references filmes (idfilme)
alter table filmes_vistos ADD foreign key (filme_visto) references filmes (nome) 


 CREATE TABLE filmes_baixados(
  idfilme_baixados int,
  filme_baixados varchar(200),
 primary key (idfilme_baixados))

alter table filmes_baixados ADD foreign key (idfilme_baixados) references filmes (idfilme)
alter table filmes_baixados ADD foreign key (filme_baixados) references filmes (nome) 


CREATE TABLE livros(
	idlivros int auto_increment NOT null,
	nome_livro varchar(100) not null unique,
	autor_livro varchar(100),
	data_cadastro date not null,
	obs_lircos varchar(500),
	Primary key(idlivros))

CREATE TABLE livros_lidos(
	idlido int not null,
	nome_livro varchar(100) not null,
	primary key(idlido))


alter table livros_lidos ADD foreign key (idlido) references livros (idlivros)
alter table livros_lidos ADD foreign key (nome_livro) references livros (nome_livro) 

CREATE TABLE cursos(
	idcursos int not null,
	nome_curso varchar(200) unique,
	url_curso varchar(500),
	data_cadastro date not null,
	obs_curso varchar(500),
	primary key(idcursos))

drop table cursos
	
CREATE TABLE aulas_vistas(
	idaula int not null,
	nome_aula varchar(200) not null,
	primary key (idaula))

alter table aulas_vistas ADD foreign key (idaula) references cursos (idcursos) 

CREATE TABLE serie (
	idserie int not null,
	nome_serie varchar(200) unique,
	url_serie varchar(300),
	data_cadastro date not null,
	obs_serie varchar(500),
	primary key(idserie))

CREATE TABLE episodio_visto(
	idserie int not null,
	temporada varchar(200) not null,
	numero_epidosio varchar(200) not null,
	nome_episodio varchar(200),
	primary key(idserie))

alter table episodio_visto ADD foreign key (idserie) references serie (idserie) 

CREATE TABLE episodio_baixados(
	idserie int not null,
	temporada varchar(200) not null,
	numero_episodio varchar(200) not null,
	nome_episodio varchar(500),
	primary key (idserie))
	
alter table episodio_baixados ADD foreign key (idserie) references serie (idserie) 	

show tables


select * from filmes where nome like '%NOE%'
delete from filmes where idfilme=6
insert into todos_os_generos_filme (nome_genero) 
values('AVENTURA'), ('TERROR'), ('ANIMAÇÃO'), ('HISTÓRIAS REAIS'), ('HERÓIS'), ('LUTA'), ('FICÇÃO CIENTÍFICA'),
('DRAMA'), ('ROMÂNTICO'), ('MUSICAIS')

select * from filmes_baixados (idfilme_baixados, filme_baixados)  values(1, 'NOE');

select filmes.idfilme, filmes.nome, filmes.genero_1, filmes.genero_2, filmes.obs from filmes 
join filmes_vistos on filmes_vistos.idfilme_visto=filmes.idfilme where filmes.nome like '%ç%'


select * from filmes_p_baixar

delete from filmes_baixados where idfilme_baixados=1

show tables

select filmes.idfilme, filmes.nome, filmes.genero_1, filmes.genero_2, filmes.obs from filmes 
join filmes_p_baixar on filmes_p_baixar.idfilme_baixar=filmes.idfilme
	