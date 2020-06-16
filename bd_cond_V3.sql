drop DATABASE bd_cond;

CREATE database bd_cond ;
USE bd_cond ;

-- -----------------------------------------------------
-- Table bd_cond.tbl_rfid
-- -----------------------------------------------------
CREATE TABLE tbl_rfid ( 
  id_tag INT(11) NOT NULL AUTO_INCREMENT, #Id da mesma
  reg_tag VARCHAR(50) NOT NULL, #Registro da Tag
  data_hora_reg TIMESTAMP NOT NULL, # Hora do registro da Entrada
  status_tag BOOLEAN DEFAULT TRUE NOT NULL, # Verifica se está ativo ou não
  PRIMARY KEY (id_tag));

-- -----------------------------------------------------
-- Table bd_cond.tbl_pessoa
-- -----------------------------------------------------
CREATE TABLE tbl_pessoa(      #desktop
  id_pessoa INT(11) NOT NULL AUTO_INCREMENT,
  cpf_pessoa VARCHAR(11) UNIQUE NOT NULL, #CPF só os numeros, sem hifens e pontos e não pode duplicar por causa do UNIQUE
  nome_pessoa VARCHAR(50) /*NOT NULL*/,
  senha VARCHAR(20) /*NOT NULL*/,# Para uso do Login
  nomeApelido VARCHAR(20) UNIQUE /*NOT NULL*/,# Para uso do Login SOMENTE MAIORES DE 18 ANOS PODEM fazer o login, tirar essa opção de não moradores e proprietários
  dt_reg DATETIME DEFAULT NOW() NOT NULL, # Dia que a pessoa foi registrada
  status_pess BOOLEAN DEFAULT TRUE NOT NULL,
  tipo_pessoa ENUM('Proprietario', 'Morador', 'Dependente') DEFAULT 'Proprietario' NOT NULL, #TIPOS DE 'MORADORES' se for proprietário ele pode entrar assim como o morador
  tbl_rfid_id_tag INT(11) /*NOT NULL*/,			# Tiramos o funcionario, pois precisamo de mais detalhes
  PRIMARY KEY (id_pessoa),
  INDEX fk_tbl_pessoa_tbl_rfid1_idx (tbl_rfid_id_tag ASC));

-- -----------------------------------------------------
-- Table bd_cond.tbl_pres_servi
-- -----------------------------------------------------
CREATE TABLE tbl_pres_servi (					# DESKTOP
  id_prest INT(11) NOT NULL AUTO_INCREMENT,
  nome_prest VARCHAR(35) NOT NULL,
  cpf_prest VARCHAR(11) NOT NULL UNIQUE, #sem hifens e pontos 
  tel_prest VARCHAR(19) NOT NULL,#sem hifens e pontos
  dt_entr_prest TIMESTAMP NOT NULL,
  fk_id_empre INT(11) NOT NULL,
  PRIMARY KEY (id_prest),
  INDEX fk_id_empre (fk_id_empre ASC) );


-- -----------------------------------------------------
-- Table bd_cond.tbl_empresa
-- -----------------------------------------------------
CREATE TABLE tbl_empresa ( # codigo empre é representação do empresa    #WEB / DESKTOP
  id_empre INT(11) NOT NULL AUTO_INCREMENT,
  cnpj_empre VARCHAR(14) NOT NULL,
  r_social VARCHAR(50) NOT NULL UNIQUE,
  cep VARCHAR(9) NOT NULL,
  endereco_empre VARCHAR(45) NOT NULL,
  numero VARCHAR(5) NOT NULL,
  bairro_empre VARCHAR(20) NOT NULL,
  cidade_empre VARCHAR(15) NOT NULL,
  PRIMARY KEY (id_empre));


-- -----------------------------------------------------
-- Table bd_cond.agen_servi
-- -----------------------------------------------------
CREATE TABLE agen_servi (# Tabela agendamento de  serviço, e agendamento de serviço vai ser chamar de agend_servi 		#WEB / DESKTOP
  id_agend_servi INT(11) NOT NULL,
  tipo_servi ENUM('Encanamento', 'Eletricista', 'Reforma', 'Entrega', 'Outros') default 'Outros' NOT NULL,
  tbl_pessoa_id_pessoa INT(11) NOT NULL,
  tbl_pres_servi_id_prest INT(11) NOT NULL,
  tbl_empresa_id_empre INT(11) NOT NULL,
  data_servico DATE NOT NULL,
  data_fim_servico DATE NOT NULL,
  PRIMARY KEY (id_agend_servi),
  INDEX fk_agen_servi_tbl_pessoa1_idx (tbl_pessoa_id_pessoa ASC),
  INDEX fk_agen_servi_tbl_pres_servi1_idx (tbl_pres_servi_id_prest ASC),
  INDEX fk_agen_servi_tbl_empresa1_idx (tbl_empresa_id_empre ASC));


-- -----------------------------------------------------
-- Table bd_cond.tbl_biometr
-- -----------------------------------------------------
CREATE TABLE tbl_biometr(
  id_bio INT(11) NOT NULL AUTO_INCREMENT,
  amz_img BLOB NOT NULL,
  dt_tp_reg TIMESTAMP NOT NULL,
  c_img VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (id_bio));


-- -----------------------------------------------------
-- Table bd_cond.tbl_contato
-- -----------------------------------------------------
CREATE TABLE tbl_contato (				#DESKTOP
  id_contato INT(11) NOT NULL AUTO_INCREMENT,
  tel VARCHAR(19) NOT NULL,
  email VARCHAR(59), 
 PRIMARY KEY (id_contato));


-- -----------------------------------------------------
-- Table bd_cond.tbl_moradia
-- -----------------------------------------------------
CREATE TABLE tbl_moradia ( # Tabela moradia tem que ter dados inseridos APÓS da tbl_Pessoa para fazer ligação     #DESKTOP
  id_moradia INT(11) NOT NULL AUTO_INCREMENT,
  num_ap INT(11) NOT NULL, # Numero apartamento 
  bloco_ap ENUM('A', 'B', 'C', 'D') NOT NULL, # Numero do Bloco, Mas nesse caso não nomeamos com o numero E LETRA, pois isso vai de cliente a cliente
  tbl_pessoa_id_pessoa1 INT(11) NOT NULL UNIQUE, #Como não pode existir id duplicada de morador, muito menos duplicada, coloquei unique pra evitar isso 
  num_vaga_car INT(11) NOT NULL, #Numero da vaga do Carro, tem que ser o mesmo numero do apt, mas somente para apresentar no tcc
  PRIMARY KEY (id_moradia),
  INDEX fk_tbl_moradia_tbl_pessoa1_idx (tbl_pessoa_id_pessoa1 ASC));


-- -----------------------------------------------------
-- Table bd_cond.tbl_veiculo
-- -----------------------------------------------------
CREATE TABLE tbl_veiculo (
  id_veiculo INT(11) NOT NULL AUTO_INCREMENT,
  placa_vei VARCHAR(7) NOT NULL UNIQUE,
  marca_vei VARCHAR(15) NOT NULL,
  modelo_vei VARCHAR(15) NOT NULL,
  cor_vei VARCHAR(20) NOT NULL,
  tbl_moradia_id_moradia INT(11) NOT NULL,
  num_vaga INT NOT NULL,
  PRIMARY KEY (id_veiculo),
  INDEX fk_tbl_veiculo_tbl_moradia1_idx (tbl_moradia_id_moradia ASC));


-- -----------------------------------------------------
-- Table bd_cond.visi_apt
-- -----------------------------------------------------
CREATE TABLE visi_apt (							#WEB / DESKTOP 
  id_visi INT(11) NOT NULL AUTO_INCREMENT,
  nome_visi VARCHAR(30) NOT NULL,
  dt_registro_visi DATETIME NOT NULL,
  rg_visi VARCHAR(9),# Esse campo só pode ser preenchido opcionalmente pelo Desktop
  PRIMARY KEY (id_visi),
  INDEX rg_visiUNIQUE (rg_visi ASC));
  ALTER TABLE visi_apt ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table bd_cond.contatos_pessoa
-- -----------------------------------------------------
CREATE TABLE contatos_pessoa (# Isso é para que uma pessoa tenha varios numeros e um numero dependendo da situação tenha varias pessoas #DESKTOP
  tbl_contato_id_contato INT(11) NOT NULL,
  tbl_pessoa_id_pessoa INT(11) NOT NULL,
  PRIMARY KEY (tbl_contato_id_contato, tbl_pessoa_id_pessoa),#Nao implementar esse banco sem que tenhamos colocado essas ligações em uma constraint
  INDEX fk_tbl_contato_has_tbl_pessoa_tbl_pessoa1_idx (tbl_pessoa_id_pessoa ASC),
  INDEX fk_tbl_contato_has_tbl_pessoa_tbl_contato_idx (tbl_contato_id_contato ASC));


-- -----------------------------------------------------
-- Table bd_cond.pessoa_biometria
-- -----------------------------------------------------
CREATE TABLE pessoa_biometria ( #DESKTOP
  tbl_pessoa_id_pessoa INT(11) NOT NULL,
  tbl_biometr_id_bio INT(11) NOT NULL,
  PRIMARY KEY (tbl_pessoa_id_pessoa, tbl_biometr_id_bio),#Nao implementar esse banco sem que tenhamos colocado essas ligações em uma constraint
  INDEX fk_tbl_pessoa_has_tbl_biometr_tbl_biometr1_idx (tbl_biometr_id_bio ASC) ,
  INDEX fk_tbl_pessoa_has_tbl_biometr_tbl_pessoa1_idx (tbl_pessoa_id_pessoa ASC));


-- -----------------------------------------------------
-- Table bd_cond.agendamento_visitas
-- -----------------------------------------------------
CREATE TABLE agen_visi(#WEB / DESKTOP
  tbl_pessoa_id_pessoa INT(11) NOT NULL,
  visi_apt_id_visi INT(11) NOT NULL,
  data_visi date,
  data_fim_visi date,
  autorizado BOOLEAN DEFAULT TRUE,
  PRIMARY KEY (tbl_pessoa_id_pessoa, visi_apt_id_visi),#Nao implementar esse banco sem que tenhamos colocado essas ligações em uma constraint
  INDEX fk_tbl_pessoa_has_visi_apt_visi_apt1_idx (visi_apt_id_visi ASC),
  INDEX fk_tbl_pessoa_has_visi_apt_tbl_pessoa1_idx (tbl_pessoa_id_pessoa ASC));
	
    ALTER TABLE agen_visi ENGINE = InnoDB;