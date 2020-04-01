drop database bd_cond;
create database bd_cond;
use bd_cond;
/*Pode-se mudar os nomes, sem problemas*/
/*não pode faltar o campo tipo*/
/*A ordem de select dos campos tem que seguir a mesma linha da construção da tabela*/
/*Não é necessários estatus no select do model, mas vc irá precisar*/


create table tbl_morador(/*mor é a breviação de morador*/
id_mor			int(5) auto_increment not null primary key,/*Até 99999 registros*/
nome_mor 		varchar (45) not null,
senha_mor 		varchar (30) not null,
ativo_mor 		enum('Sim', 'Não') default 'Sim',
cpf_mor 		varchar (14), /*not null,Cpf com pontos e traços*/
email_mor 		varchar(50),/*Contato*/
tel_mor 		varchar(14), /*not null,Contato*/
apt_mor 		varchar (10), /*not null,Apartamento do Morador*/
bloco_mor 		varchar (10), /*not null,*/
car_mor 		enum('Sim', 'Não') default 'Não',/*Se tiver um carro os campos a seguir serão obrigatorios, mas não funciona se tiver mais de 1 carro*/
car_marca 		varchar (30) default '',
car_cor 		varchar (20) default '',
car_modelo 		varchar (100) default '',
car_placa 		varchar (8) default '',
car_vaga		varchar(3) default '',/**/
tag_rfid_mor 	varchar (11),
biometria 		blob/*Aqui é a Biometria*/
);

insert into tbl_morador(nome_mor, senha_mor, cpf_mor, tel_mor, apt_mor, bloco_mor) values('admin2','admin123','789456123','4585-5682', 'ap 1', '1');

update tbl_morador set ativo_mor='Sim' where id_mor= 1;

select * from tbl_morador where nome_mor='admin2' and senha_mor='admin123' and ativo_mor ='Sim';


alter table tbl_morador 

create table tbl_mor_tag_rfid(/*Tabela de registro de Entrada/Saida do Morador*/
cod_tag_rfid 	int auto_increment primary key,
data_hora_mor 	DATETIME,
fk_tag_rfid_mor INT(5),
constraint foreign key fk_tag_rfid_mor(fk_tag_rfid_mor)
			references tbl_morador(tag_rfid_mor)
);

create table tbl_bio_mor(/*Registro de Biometria de Entrada/Saida do Morador*/
cod_registro 	int auto_increment primary key,
img_bio_mor 	blob,
data_hora_mor 	DATETIME,
fk_biometria_mor INT(5)
);


create table tbl_visitante(/*vis é de visitante*/
id_vis			int(5),
nome_vis		varchar(50),/*Nome do visitante*/
cpf_vis 		varchar(14),/*Cpf com pontos e traços*/
tel_vis 		varchar(14),
ativo_vis 		enum('Sim', 'Não') default 'Sim',
tag_rfid_vis 	varchar(11),
fk_morador 		int(5)
constraint foreign key fk_morador(fk_morador) references tbl_morador(id_mor)/* Vinculo de morador e visitante ou dependente*/
);


create table tbl_sindico(/* sind é de sindico*/
cod_sind int(2),
nome_sind varchar(50),
cpf_sind varchar(11),
tel_sind varchar(14),
senha_sind varchar(20)
);

create table tbl_registro(/*Registro de entrada*/
cod_registro int,
data_hora DATETIME,
fk_morador INT(5)
);



/* 1- fazer as ligações das tbls
 * 2- perguntar para o dono do DOC, como ele enquadraria um visitante e um prestador de serviço
 * 		- como ele desativou o morador do condominio sem que tenha um campo na tabela
 * 		- Se ele pode emprestar os componentes para adicionar na sua maquete
 * 3- ver como criar if e elses dentro da criação da tabela pra evitar campos desnecessários
 * */

