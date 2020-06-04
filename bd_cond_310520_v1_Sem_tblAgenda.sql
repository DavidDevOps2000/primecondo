drop database bd_cond;
create database bd_cond;

use bd_cond;

# Eu troquei interger por int, pois, pelo o que pesquisei, o interger aceita numeros negativos inteiros e o int não. - David

#criação de tabela de cadastro de pessoa
create table tbl_tp_pessoa(
	id_vinc int primary key not null auto_increment,
	nome_tipo enum('morador', 'conjuge', 'funcionario') default 'morador'  
   
);

#criação de tabela de moradia 
create table tbl_moradia(
	cod_moradia int primary key not null auto_increment,
    num_ap int not null,
    bloco_ap varchar(10) not null,
    dep_apt int not null 
);

#criação de tavela de cadastro de contato
create table tbl_contato(
	cod_contato int primary key not null auto_increment,
  	cel varchar(14) not null,  
    tel varchar(14)
);

#criação de tabela de cadastro de veiculos 
create table tbl_veiculo (
	id_veiculo int primary key /*not null*/ auto_increment,
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
	cod_empre int primary key auto_increment,
    cnpj varchar(14) not null,
    r_social varchar (50) not null,
    cep varchar(9) not null, # 9 espaços incluido hifen
    logra_emp varchar(45) not null,
    bairro varchar(20) not null,
    cidade varchar(15) not null
);

#criação de tabela prestador de serviço
create table tbl_pres_servi(
	cod_funci int not null primary key auto_increment,
    nome varchar(35) not null,
	cnpj varchar(14) not null,
    tel_cont bigint not null,
    dt_entr timestamp,
    fk_cod_empre int not null,
    constraint fk_cod_empre foreign key (fk_cod_empre) references tbl_empresa (cod_empre)
);


create table visi_apt(                                                /* Tabela Atualizada - David*/
	id_visi int primary key auto_increment, /*not null*/
    nome_visi varchar(50), /*not null*/
    diaInicio date,/*Data inicio da visita*/
    diaFim date,/* Data Fim*/
    dt_hr_solicitacao timestamp,/*Para sabermos qual foi o dia e a data do agendamento não necessita not null pois no inser e ele vai automaticamente*/ 
    status_visi boolean default true/*not null*/ #estatus do visitantes (ativado / desativado) sempre virá ativado ao cadastrar
   );




create table tbl_pessoa(
	cod_pessoa int primary key /*not null*/ auto_increment,
    nome varchar(50) /*not null*/,
    cpf varchar(14) /*not null*/,
    num_vaga int /*not null*/,
    resp_apt boolean /*/*not null*/,
    email varchar(50),#coloquei 'email' 
    senha varchar(20),
    dt_reg datetime /*/*not null*/,
	status_pess boolean default true,/*/*not null*/ #estatus do morador (ativado / desativado),
    fk_cod_moradia int /*not null*/,
    fk_id_veiculo int /*not null*/,
    fk_id_bio int /*not null*/,
    fk_id_tag int /*not null*/,
    fk_cod_contato int /*not null*/,
    fk_id_visi int /*not null*/
    #constraint fk_id_vinc foreign key (fk_id_vinc) references tbl_tp_pessoa (id_vinc),
    #constraint fk_cod_moradia foreign key(fk_cod_moradia) references tbl_moradia(cod_moradia),
    #constraint fk_id_veiculo foreign key(fk_id_veiculo) references tbl_veiculo(id_veiculo),
    #constraint fk_id_bio foreign key(fk_id_bio) references tbl_biometr(id_bio),
    #constraint fk_id_tag foreign key (fk_id_tag) references tbl_rfid (id_tag), 						/* Eu tirei alguns Not Null*/  #David
    #constraint fk_cod_contato foreign key(fk_cod_contato) references tbl_contato(cod_contato),			/*apenas para testar e para os inserts serem mais simples*/
    #constraint fk_id_visi foreign key (fk_id_visi) references visi_apt(id_visi)						/* mas eles serão colocado na banco final*/
);

insert into tbl_pessoa(cpf, nome, num_vaga, resp_apt, email, senha, dt_reg, status_pess) values /* LOGIN E SENHA PARA TER ACESSO*/
('37658234335','Zelador', 1, true, 'Administrador', 'admin123', '2020-04-26', true);



#criação de tabela de agendamento de serviço
create table tbl_agendar_servi(
	cod_agen int primary key /*not null*/ auto_increment,
    tipo_servi enum ('Entrega', 'Encanamento', 'Reforma', 'Eletricista', 'Outros') /*not null*/, # Campos de Serviços possiveis - David
    observacao varchar(30), # Adicionei esse campo, caso o usuario escolha 'Outros', para ele justificar qual serviço - David
    dt_agendamento timestamp,#CampoNovo, dia que foi solicitado
    dt_termino int default 2, #CampoNovo, numeros de dias para executar uma tarefa, caso não seja preenchida terá 2 dias automaticamente
    fk_cod_emprepragend int not null,
    fk_cod_pessoapragend int not null,
    constraint fk_cod_emprepragend foreign key (fk_cod_emprepragend) references tbl_empresa(cod_empre),#emprepragend = empresa para agendamento
    constraint fk_cod_pessoapragend foreign key(fk_cod_pessoapragend) references tbl_pessoa(cod_pessoa)#pessoapragend =  pessoa para agendamento
);




select id_pessoa from tbl_pessoa where email='administrador' and status_pess = true;


selec