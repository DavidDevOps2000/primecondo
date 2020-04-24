#drop database bd_cond;
create database bd_cond;

use bd_cond;

#criação de tabela de cadastro de pessoa
create table tbl_tp_pessoa(
	id_vinc int primary key not null auto_increment,
	nome_tipo enum('morador', 'conjuge', 'funcionario') default 'morador' not null
);

#criação de tabela de moradia 
create table tbl_moradia(
	cod_moradia int primary key not null auto_increment,
    num_apt int not null,
    bloco_apt varchar(10) not null,
    dep_apt int not null 
);

#criação de tavela de cadastro de contato
create table tbl_contato(
	cod_contato int primary key not null auto_increment,
    tel varchar(14),
    cel varchar(14) not null default '',
    email varchar(30)
);

#criação de tabela de cadastro de veiculos 
create table tbl_veiculo (
	id_veiculo int primary key not null auto_increment,
    placa_vei varchar(7),
    marca_vei varchar(15),
    modelo_vei varchar(15),
    cor_vei varchar(8) 
);


create table tbl_veiculo_visi (
	id_veiculo int primary key not null auto_increment,
    placa_vei varchar(7),
    marca_vei varchar(15),
    modelo_vei varchar(15),
    cor_vei varchar(8)
);

#criação de tabela de cadastro de biometria 
create table tbl_biometr(
	id_bio int primary key not null auto_increment,
    amz_img blob not null,
    dt_tp_reg timestamp not null, 
    c_img varchar(45)  
);

#criação de tabela de cadatro de rfid
create table tbl_rfid(
	id_tag int primary key not null auto_increment,
	reg_tag varchar(50) not null,
    data_hora_reg timestamp not null
);

#criação de tabela empresa prestadorea de serviço
create table tbl_empresa(
	cod_empre int primary key not null auto_increment,
    cnpj bigint not null,
    r_social varchar (50) not null,
    cep int not null,
    logra_emp varchar(45) not null,
    bairro varchar(20)  not null ,
    cidade varchar(15) not null
);

#criação de tabela prestador de serviço
create table tbl_pres_servi(
	cod_funci int not null primary key auto_increment,
    nome varchar(35) not null,
    cpf varchar(14) not null,
    tel_cont bigint not null,
    dt_entr timestamp not null,
    fk_cod_empre integer not null,
    constraint fk_cod_empre foreign key (fk_cod_empre) references tbl_empresa (cod_empre)
);

create table visi_apt(
	id_visi int primary key not null,
    nome_visi varchar(30) not null,
    cpf varchar(14) ,/*Não colocarei esse campo como not null*/
    status_ativo enum('Sim', 'Não') default 'Sim' not null, #estatus do morador (ativado / desativado)
    dt_registro datetime not null 
);

#criação de tabela de pessoa
create table tbl_pessoa(
	cod_pessoa int primary key not null auto_increment,
    cpf varchar(14) not null,
    nome varchar(50) not null,
    num_vaga int not null,
    resp_apt boolean not null, #True e False
    senha varchar(20),#Senha para login
    dt_reg datetime not null,
    status_ativo enum('Sim', 'Não') default 'Sim' not null, #estatus do morador (ativado / desativado)
	fk_id_vinc integer not null,
    fk_cod_moradia integer not null,
    fk_id_veiculo integer not null,
    fk_id_bio integer not null,
    fk_id_tag integer not null,
    fk_cod_contato integer not null,
    fk_id_visi integer not null,
    constraint fk_id_vinc foreign key (fk_id_vinc) references tbl_tp_pessoa (id_vinc),
    constraint fk_cod_moradia foreign key(fk_cod_moradia) references tbl_moradia(cod_moradia),
    constraint fk_id_veiculo foreign key(fk_id_veiculo) references tbl_veiculo(id_veiculo),
    constraint fk_id_bio foreign key(fk_id_bio) references tbl_biometr(id_bio),
    constraint fk_id_tag foreign key (fk_id_tag) references tbl_rfid (id_tag),
    constraint fk_cod_contato foreign key(fk_cod_contato) references tbl_contato(cod_contato),
    constraint fk_id_visi foreign key (fk_id_visi) references visi_apt(id_visi)
);

#criação de tabela de agendamento de serviço
create table agen_servi(
	cod_agen int primary key not null auto_increment,
    tipo_servi varchar(80) not null,
    fk_cod_emprepragend integer not null,
    fk_cod_pessoapragend integer not null,
    constraint fk_cod_emprepragend foreign key (fk_cod_emprepragend) references tbl_empresa(cod_empre),#emprepragend = empresa para agendamento
    constraint fk_cod_pessoapragend foreign key(fk_cod_pessoapragend) references tbl_pessoa(cod_pessoa)#pessoapragend =  pessoa para agendamento
);



