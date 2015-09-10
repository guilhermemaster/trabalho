create database willianecia

CREATE TABLE  configuracoes (
  idConfiguracoes INT NOT NULL AUTO_INCREMENT,
   nome  VARCHAR(45) NOT NULL,
   senha  VARCHAR(45) NOT NULL,
   email  VARCHAR(45) NOT NULL,
  PRIMARY KEY ( idConfiguracoes ))

insert into configuracoes (nome, senha, email) values('GUILHERME', 'LETICIA', 'GUILHERMEBALI@GMAIL.COM')

SELECT * FROM configuracoes

create table cadastro_cliente(
idcliente bigint auto_increment,
nome varchar(200) not null,
cpf varchar(100) not null,
endereco varchar(200) not null,
cep varchar(100),
data_nascimento date,
uf varchar(50),
data_cadastro date,
estado_civil varchar(100),
rg varchar(100),
municipio varchar(200),
bairro varchar(100),
tipo_pessoa varchar(100),
telefone_1 varchar(50) not null,
telefone_2 varchar(50) not null,
email varchar(200),


/*pessoa para conto*/

nome_pessoa_1 varchar(200),
telefone_pessoa_1 varchar(50),
vinculo_pessoa_1 varchar(150),
primary key (idcliente))

update cadastro_cliente 
set nome=... ,cpf=... ,endereco=... ,cep=.., data_nascimento=..., uf=..., estado_civil=..., rg=..., municipio=..., bairro=..., tipo_pessoa=..., telefone_1=..., 
telefone_2=..., email=..., nome_pessoa_1=.., telefone_pessoa_1=.., vinculo_pessoa_1=... where idcliente=...

select * from cadastro_cliente

create table estados(
idestado int auto_increment,
estado_sigla varchar(50) not null,
primary key(idestado))

insert into estados (estado_sigla) values ('AC'), ('AL'), ('AP'), ('AM'), ('BA'), ('CE'), ('DF'), ('ES'), ('GO'), ('MA'), ('MT'), ('MS'), ('MG'), ('PA'),
('PB'), ('PR'), ('PE'), ('PI'), ('RJ'), ('RN'), ('RS'), ('RO'), ('RR'), ('SC'), ('SP'), ('SE'), ('TO') 


$sql
delete from cadastro_cliente where idcliente=5
insert into cadastro_cliente (nome, cpf, endereco, cep, data_nascimento, uf, data_cadastro, estado_civil, rg, municipio, bairro, tipo_pessoa, telefone_1, telefone_2, email, nome_pessoa_1, telefone_pessoa_1, vinculo_pessoa_1) values('DSAD', '32', 'SADSAD', '32432', '2015-01-13', 'AC', '2015-01-31', 'SOLTEIRO(A)', '324', 'ASDSAD', 'DSADSAD', 'FÍSICA', '343214', '4324', 'DFSAFAFA', 'FDSF', '3245234',
 'REWFSDFSDF')

create table ordem_servico(
idservico bigint auto_increment not null,
id_cliente bigint ,
nome_cliente varchar(200) not null,
endereco varchar(200) not null,
cep varchar(100) not null,
uf varchar(50) not null,
municipio varchar(200) not null,
bairro varchar(100) not null,
tele_1 varchar(50) not null,
tele_2 varchar(50) not null,
data_servico date,
descricao varchar(500),
status_servico char(2),
primary key (idservico))

select * from ordem_servico where status_servico ='1' and idservico=5

select * from cadastro_cliente


update ordem_servico set status_servico='0' where idservico=2

delete from ordem_servico where idservico=

select * from ordem_servico where status_servico ='1'

alter table ordem_servico add column valor double

alter table ordem_servico ADD foreign key (id_cliente) references cadastro_cliente (idcliente) 

insert into ordem_servico (id_cliente, nome_cliente, endereco, cep, uf, municipio, bairro, tele_1, tele_2, data_servico, descricao, status_servico) 
values (6, 'GUILHERME BARBOSA LIMA','AV JOCKEY CLUB', '64852', 'PI', 'TERESINA', 'JOCKEY','8699466964', '8694644294', '2015-02-10', 'dsdsd', '1')

