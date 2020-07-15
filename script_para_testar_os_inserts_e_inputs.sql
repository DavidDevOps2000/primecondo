use bd_cond;
select * from agen_visi;
select * from visi_apt;

SELECT * FROM tbl_pessoa;   			
SELECT * FROM tbl_veiculo;

SHOW TABLES;


SELECT id_pessoa, id_moradia FROM tbl_pessoa LEFT JOIN tbl_moradia ON tbl_pessoa.id_pessoa = tbl_moradia.tbl_pessoa_id_pessoa1 WHERE nome_pessoa='' AND cpf_pessoa='111.111.111-11';

################################################################################################################################

/*
UPDATE tbl_pessoa p LEFT JOIN tbl_moradia m ON p.id_pessoa = m.tbl_pessoa_id_pessoa1 LEFT JOIN tbl_veiculo v ON m.id_moradia = v.tbl_moradia_id_moradia LEFT JOIN contatos_pessoa cp ON p.id_pessoa = cp.tbl_pessoa_id_pessoa LEFT JOIN tbl_contato c ON cp.tbl_contato_id_contato = c.id_contato SET data_nascimento ='26/04/1990', num_ap =12, bloco_ap ='A', tipo_pessoa ='Proprietário', tel ='(123) 13454-5464', email ='Brehme.Firmino@gmail.com', nomeApelido ='brehme123', senha ='1', num_vaga_vei= 12, status_pess = True, tipo_vei ='Carro', modelo_vei ='45', cor_vei ='Outros', placa_vei ='4564', nome_pessoa ='Brehme firmino' WHERE nome_pessoa ='Brehme firmino' OR cpf_pessoa='..-';

UPDATE tbl_pessoa p LEFT JOIN tbl_moradia m ON p.id_pessoa = m.tbl_pessoa_id_pessoa1 
LEFT JOIN tbl_veiculo v ON m.id_moradia = v.tbl_moradia_id_moradia 
LEFT JOIN contatos_pessoa cp ON p.id_pessoa = cp.tbl_pessoa_id_pessoa 
LEFT JOIN tbl_contato c ON cp.tbl_contato_id_contato = c.id_contato 
SET data_nascimento ='23/07/1990', num_ap =111, bloco_ap ='A',
 tipo_pessoa ='Proprietário', tel ='(11) 98450-0618', email ='brehme.silva@gmail.com', nomeApelido ='brehme123', senha ='123', num_vaga_vei= 122, 
 status_pess = True, tipo_vei ='Moto', modelo_vei ='honda', cor_vei ='Prata', placa_vei ='fza7789', nome_pessoa ='brehme firmino da silva ' WHERE nome_pessoa ='brehme firmino da silva ' OR cpf_pessoa='123.456.789-01';

SELECT nome_visi, CASE autorizado WHEN FALSE THEN 'NÃO' ELSE 'SIM' END autorizado,num_ap, bloco_ap, 
CASE WHEN data_fim_visi IS NULL THEN 'Sem limite' ELSE data_fim_visi END data_fim_visi, rg_visi, dt_registro_visi 
FROM visi_apt LEFT JOIN agen_visi ON visi_apt.id_visi= agen_visi.visi_apt_id_visi LEFT JOIN tbl_pessoa 
ON agen_visi.tbl_pessoa_id_pessoa = tbl_pessoa.id_pessoa 
LEFT JOIN tbl_moradia ON tbl_pessoa.id_pessoa = tbl_moradia.tbl_pessoa_id_pessoa1 WHERE nome_visi = 'gabriel';
SELECT * FROM tbl_veiculo WHERE  placa_vei = '1';
DELETE tbl_pessoa.*, tbl_moradia.*, tbl_veiculo.*, contatos_pessoa.*, tbl_contato.*,
agen_visi.*, visi_apt.* FROM tbl_pessoa, tbl_moradia, tbl_veiculo, contatos_pessoa, tbl_contato,
agen_visi, visi_apt WHERE id_pessoa=?;

SELECT cpf_pessoa FROM tbl_pessoa WHERE cpf_pessoa = '456.456.464-64' ;
			# Cadastrando morador e apt ao mesmo tempo EM UM INSERT COM BEGIN TRANSACTION
INSERT INTO tbl_pessoa(cpf_pessoa, 			nome_pessoa, 		senha, 			nomeApelido, 			tipo_pessoa) 
VALUES				  ('123.456.789-01',	'Davi da Silva', 	'admin123', 		'administrador', 		'Proprietario'),
					  ('123.456.781-23',	'Jose da Silva', 	'jose123', 				'joseadmin', 		'Proprietario');
INSERT INTO tbl_moradia(num_ap, 		bloco_ap, 		tbl_pessoa_id_pessoa1, 	num_vaga_car) 
VALUES 					(1, 				'B', 					  		1,				1),
						(2, 				'C', 						    2,				2);                          

SELECT * FROM tbl_pessoa WHERE nomeApelido = 'admin'
UPDATE tbl_pessoa LEFT JOIN  tbl_moradia ON tbl_pessoa.id_pessoa = tbl_moradia.tbl_pessoa_id_pessoa1 
LEFT JOIN contatos_pessoa ON tbl_pessoa.id_pessoa = contatos_pessoa.tbl_pessoa_id_pessoa 
LEFT JOIN tbl_contato ON contatos_pessoa.tbl_contato_id_contato = tbl_contato.id_contato 
SET data_nascimento ='26/04/1995', num_ap =9999, bloco_ap ='A', tipo_pessoa ='Proprietário', 
tel ='(999) 99999-9999', email ='umEmail@gmail.com', nomeApelido ='DavidSilva', 
senha ='123', num_vaga_vei= 1, status_pess = True, nome_pessoa ='David ' 
WHERE nome_pessoa ='David Silva' OR cpf_pessoa='999.999.999-99';
use bd_cond;

UPDATE tbl_pessoa p LEFT JOIN tbl_moradia m ON p.id_pessoa = m.tbl_pessoa_id_pessoa1 
LEFT JOIN tbl_veiculo v ON m.id_moradia = v.tbl_moradia_id_moradia 
LEFT JOIN contatos_pessoa cp ON p.id_pessoa = cp.tbl_pessoa_id_pessoa 
LEFT JOIN tbl_contato c ON cp.tbl_contato_id_contato = c.id_contato 
SET data_nascimento ='26/05/', num_ap =54, bloco_ap ='A', tipo_pessoa ='Proprietário', tel ='() -', 
email ='None', nomeApelido ='admin2', senha ='123', num_vaga_vei= 123, status_pess = True, tipo_vei ='Carro', 
modelo_vei ='Meriva', cor_vei ='Prata', 
placa_vei ='12', nome_pessoa ='funcionario ' WHERE nome_pessoa ='funcionario teste' OR cpf_pessoa='489.889.899-89';
	INSERT INTO tbl_rfid		(reg_tag, data_hora_reg)
	VALUES						('', 			NOW());
    INSERT INTO tbl_pessoa(cpf_pessoa, 			nome_pessoa, 		senha, 			nomeApelido, 		tipo_pessoa, data_nascimento, tbl_rfid_id_tag) 
VALUES				  ('1234567001',	'Joao Silva', 	'admin123', 		'joaoAdmin', 		'Proprietario', '26-04-2020', 1);
COMMIT;
  


INSERT INTO tbl_contatos_pessoa (tbl_contato_id_contato, tbl_contatos_pessoa) VALUES(2, 2);

SELECT id_moradia FROM tbl_moradia JOIN tbl_pessoa WHERE id_pessoa = 1 AND num_ap = 1;



BEGIN;
			# Cadastrando morador e apt ao mesmo tempo EM UM INSERT COM BEGIN TRANSACTION
INSERT INTO tbl_pessoa(cpf_pessoa, 			nome_pessoa, 		senha, 			nomeApelido, 			tipo_pessoa) 
VALUES				  ('12345678901',	'Davi da Silva', 	'admin123', 		'administrador', 		'Proprietario'),
					  ('12345678123',	'Jose da Silva', 	'jose123', 				'joseadmin', 		'Proprietario');
INSERT INTO tbl_moradia(num_ap, 		bloco_ap, 		tbl_pessoa_id_pessoa1, 	num_vaga_car) 
VALUES 					(1, 				'B', 					  		1,				1),
						(2, 				'C', 						    2,				2);                          

INSERT INTO tbl_pessoa(cpf_pessoa, 			nome_pessoa, 		senha, 			nomeApelido, 		tipo_pessoa, data_nascimento)
VALUES				  ('1234567001',	'Joao Silva', 	'admin123', 		'joaoAdmin', 		'Proprietario', '26-04-2020');

;

SELECT data_nascimento, num_ap, bloco_ap, tipo_pessoa, tel, email, nomeApelido, 
		senha, num_vaga_vei, status_pess, tipo_vei, modelo_vei, cor_vei, placa_vei
		FROM tbl_pessoa JOIN tbl_moradia ON tbl_pessoa.id_pessoa = tbl_moradia.tbl_pessoa_id_pessoa1
		JOIN tbl_veiculo ON tbl_moradia.id_moradia = tbl_veiculo.id_veiculo
		JOIN contatos_pessoa ON tbl_pessoa.id_pessoa = contatos_pessoa.tbl_pessoa_id_pessoa
		JOIN tbl_contato ON contatos_pessoa.tbl_contato_id_contato = tbl_contato.id_contato
		WHERE nome_pessoa='' OR cpf_pessoa='464.646.464-64';



SELECT data_nascimento, num_ap, bloco_ap, tipo_pessoa, tel, email, nomeApelido, 
		senha, num_vaga_vei, status_pess, tipo_vei, modelo_vei, cor_vei, placa_vei
		FROM tbl_pessoa JOIN tbl_moradia ON tbl_pessoa.id_pessoa = tbl_moradia.tbl_pessoa_id_pessoa1
		JOIN tbl_veiculo ON tbl_moradia.id_moradia = tbl_veiculo.id_veiculo
		JOIN contatos_pessoa ON tbl_pessoa.id_pessoa = contatos_pessoa.tbl_pessoa_id_pessoa
		JOIN tbl_contato ON contatos_pessoa.tbl_contato_id_contato = tbl_contato.id_contato
		WHERE nome_pessoa='' OR cpf_pessoa='464.646.464-64';

 
UPDATE tbl_pessoa JOIN tbl_moradia ON tbl_pessoa.id_pessoa = tbl_moradia.tbl_pessoa_id_pessoa1 
JOIN tbl_veiculo ON tbl_moradia.id_moradia = tbl_veiculo.tbl_moradia_id_moradia 
JOIN contatos_pessoa ON tbl_pessoa.id_pessoa = contatos_pessoa.tbl_pessoa_id_pessoa 
JOIN tbl_contato ON contatos_pessoa.tbl_contato_id_contato = tbl_contato.id_contato 
SET data_nascimento ='15/64/5646', num_ap =4568, bloco_ap ='A', tipo_pessoa ='Proprietário', tel ='() -', 
email ='45644654', nomeApelido ='amins', senha ='123', num_vaga_vei= 123, status_pess = True, tipo_vei ='Carro', 
modelo_vei ='dfsdf', cor_vei ='Outros', placa_vei ='sdfs' WHERE nome_pessoa ='' OR cpf_pessoa='456.464.564-65';

UPDATE tbl_pessoa JOIN tbl_moradia ON tbl_pessoa.id_pessoa = tbl_moradia.tbl_pessoa_id_pessoa1 
JOIN tbl_veiculo ON tbl_moradia.id_moradia = tbl_veiculo.tbl_moradia_id_moradia 
JOIN contatos_pessoa ON tbl_pessoa.id_pessoa = contatos_pessoa.tbl_pessoa_id_pessoa 
JOIN tbl_contato ON contatos_pessoa.tbl_contato_id_contato = tbl_contato.id_contato 
SET data_nascimento ='15/64/5646', num_ap =4568, bloco_ap ='A', tipo_pessoa ='Proprietário', 
tel ='() -', email ='45644654', nomeApelido ='amins', senha ='123', num_vaga_vei= 123, 
status_pess = True, tipo_vei ='Carro', modelo_vei ='dfsdf', cor_vei ='Outros', 
placa_vei ='sdfs' WHERE nome_pessoa ='' OR cpf_pessoa='456.464.564-65';


UPDATE tbl_pessoa JOIN tbl_moradia ON tbl_pessoa.id_pessoa = tbl_moradia.tbl_pessoa_id_pessoa1 
JOIN tbl_veiculo ON tbl_moradia.id_moradia = tbl_veiculo.tbl_moradia_id_moradia 
JOIN contatos_pessoa ON tbl_pessoa.id_pessoa = contatos_pessoa.tbl_pessoa_id_pessoa 
JOIN tbl_contato ON contatos_pessoa.tbl_contato_id_contato = tbl_contato.id_contato 
SET data_nascimento ='15/64/5646', num_ap =4568, bloco_ap ='A', tipo_pessoa ='Proprietário', tel ='() -', 
email ='45644654', nomeApelido ='amins', senha ='123', num_vaga_vei= 123, status_pess = True, tipo_vei ='Carro', 
modelo_vei ='dfsdf', cor_vei ='Outros', placa_vei ='sdfs' WHERE nome_pessoa ='' OR cpf_pessoa='456.464.564-65';

UPDATE tbl_pessoa JOIN tbl_moradia ON tbl_pessoa.id_pessoa = tbl_moradia.tbl_pessoa_id_pessoa1 
JOIN tbl_veiculo ON tbl_moradia.id_moradia = tbl_veiculo.tbl_moradia_id_moradia 
JOIN contatos_pessoa ON tbl_pessoa.id_pessoa = contatos_pessoa.tbl_pessoa_id_pessoa 
JOIN tbl_contato ON contatos_pessoa.tbl_contato_id_contato = tbl_contato.id_contato 
SET data_nascimento ='15/64/5646', num_ap =4568, bloco_ap ='A', tipo_pessoa ='Proprietário', 
tel ='() -', email ='45644654', nomeApelido ='amins', senha ='123', num_vaga_vei= 123, 
status_pess = True, tipo_vei ='Carro', modelo_vei ='dfsdf', cor_vei ='Outros', 
placa_vei ='sdfs' WHERE nome_pessoa ='' OR cpf_pessoa='456.464.564-65';
SELECT * FROM tbl_moradia;
use bd_cond;

UPDATE tbl_pessoa JOIN tbl_moradia ON tbl_pessoa.id_pessoa = tbl_moradia.tbl_pessoa_id_pessoa1 
JOIN tbl_veiculo ON tbl_moradia.id_moradia = tbl_veiculo.tbl_moradia_id_moradia 
JOIN contatos_pessoa ON tbl_pessoa.id_pessoa = contatos_pessoa.tbl_pessoa_id_pessoa 
JOIN tbl_contato ON contatos_pessoa.tbl_contato_id_contato = tbl_contato.id_contato 
SET data_nascimento ='15/64/5646', num_ap =4568, bloco_ap ='A', tipo_pessoa ='Proprietário', 
tel ='() -', email ='45644654', nomeApelido ='amins', senha ='123', num_vaga_vei= 123, 
status_pess = True, tipo_vei ='Carro', modelo_vei ='dfsdf', cor_vei ='Outros', 
placa_vei ='sdfs' WHERE nome_pessoa ='' OR cpf_pessoa='456.464.564-65';
SELECT * FROM tbl_moradia;
use bd_cond;
UPDATE tbl_pessoa JOIN tbl_moradia ON tbl_pessoa.id_pessoa = tbl_moradia.tbl_pessoa_id_pessoa1 
JOIN contatos_pessoa ON tbl_pessoa.id_pessoa = contatos_pessoa.tbl_pessoa_id_pessoa 
JOIN tbl_contato ON contatos_pessoa.tbl_contato_id_contato = tbl_contato.id_contato
SET data_nascimento ='dvdvxcvxb', num_ap =5454, bloco_ap ='A', 
tipo_pessoa ='Proprietário', tel ='(564) 51561-61  ', email ='464564', nomeApelido ='5455', senha ='45546', 
num_vaga_vei =23, status_pess = 0, /*tipo_vei ='Carro',
modelo_vei ='Sei lá', cor_vei ='sadlfjslak', placa_vei ='adfhgk',
nome_pessoa ='Foi', cpf_pessoa ='' WHERE nome_pessoa ='dfgdz' OR cpf_pessoa='';


use bd_cond;
BEGIN;
			# Cadastrando morador e apt ao mesmo tempo EM UM INSERT COM BEGIN TRANSACTION
	INSERT INTO tbl_pessoa		(cpf_pessoa, 			nome_pessoa, 		senha, 			nomeApelido, 		tipo_pessoa) 
	VALUES				  		('',						'', 				'', 			'', 				''		);
	INSERT INTO tbl_moradia		(num_ap, 		bloco_ap, 		tbl_pessoa_id_pessoa1, 	num_vaga_car) 
	VALUES 						(1, 				'B', 					  		1,				1);
	INSERT INTO tbl_contato		(tel, 		email)
	VALUES						('',			'');

	INSERT INTO tbl_veiculo		(cor_vei, marca_vei, modelo_vei, num_vaga, placa_vei, tbl_moradia_id_moradia)
	VALUES 						('',			'', 		'',		1,			'',						'');

BEGIN
UPDATE tbl_pessoa JOIN tbl_moradia ON tbl_pessoa.id_pessoa = tbl_moradia.tbl_pessoa_id_pessoa1 
JOIN contatos_pessoa ON tbl_pessoa.id_pessoa = contatos_pessoa.tbl_pessoa_id_pessoa 
JOIN tbl_contato ON contatos_pessoa.tbl_contato_id_contato = tbl_contato.id_contato
JOIN tbl_veiculo ON tbl_moradia.id_moradia = tbl_veiculo.tbl_moradia_id_moradia 
SET data_nascimento ='', num_ap =1, bloco_ap ='B', tipo_pessoa ='%s', tel ='%s', email ='%s', nomeApelido ='%s', 
senha ='%s', num_vaga_vei= 3, status_pess = 0, tipo_vei ='s', modelo_vei ='%s', cor_vei ='%s', placa_vei ='%s'
 WHERE nome_pessoa ='%s' OR cpf_pessoa='545.454.545-45';

UPDATE tbl_pessoa JOIN tbl_moradia ON tbl_pessoa.id_pessoa = tbl_moradia.tbl_pessoa_id_pessoa1
JOIN contatos_pessoa ON tbl_pessoa.id_pessoa = contatos_pessoa.tbl_pessoa_id_pessoa
JOIN tbl_contato ON contatos_pessoa.tbl_contato_id_contato = tbl_contato.id_contato
SET nome_pessoa ='Fdfgoi', cpf_pessoa ='51545', status_pess = 0, tipo_pessoa ='Proprietário',
data_nascimento ='dvdvxcvxb' WHERE nome_pessoa ='' OR cpf_pessoa='465.465.456-46';




JOIN tbl_veiculo ON tbl_moradia.id_moradia = tbl_veiculo.tbl_moradia_id_moradia
select * from tbl_pessoa;

SET data_nascimento ='5vdvxcv', status_pess = 0, nome_pessoa ='fsdfs', tel ='(564) 51561-61  ', email ='464564' 
WHERE nome_pessoa ='' OR cpf_pessoa='465.465.456-46';


UPDATE tbl_pessoa JOIN tbl_moradia ON tbl_pessoa.id_pessoa = tbl_moradia.tbl_pessoa_id_pessoa1 
JOIN contatos_pessoa ON tbl_pessoa.id_pessoa = contatos_pessoa.tbl_pessoa_id_pessoa 
JOIN tbl_contato ON contatos_pessoa.tbl_contato_id_contato = tbl_contato.id_contato 
SET data_nascimento ='5vdvx', status_pess = 1, nome_pessoa ='fsdfs', tel ='(564) 51561-61  ', email ='4645dfsd64'  
WHERE nome_pessoa ='' OR cpf_pessoa='546.546.546-54';
UPDATE tbl_pessoa JOIN tbl_moradia ON tbl_pessoa.id_pessoa = tbl_moradia.tbl_pessoa_id_pessoa1 
JOIN tbl_veiculo ON tbl_veiculo.tbl_moradia_id_moradia = tbl_moradia.id_moradia SET #

UPDATE tbl_pessoa JOIN contatos_pessoa ON tbl_pessoa.id_pessoa = contatos_pessoa.tbl_pessoa_id_pessoa
JOIN tbl_contato ON contatos_pessoa.tbl_contato_id_contato = tbl_contato.id_contato SET nome_pessoa = 'Davi Souza1' WHERE nome_pessoa='Davi Souza';



/*
SELECT * FROM tbl_moradia;
SELECT nome_pessoa, num_ap, bloco_ap, tipo_pessoa, dt_reg, status_pess FROM tbl_pessoa JOIN tbl_moradia 
ON tbl_pessoa.id_pessoa = tbl_moradia.tbl_pessoa_id_pessoa1 JOIN tbl_veiculo 
ON tbl_veiculo.tbl_moradia_id_moradia = tbl_moradia.id_moradia WHERE nome_pessoa = 'David';


SELECT nome_pessoa, num_ap, bloco_ap, tipo_pessoa, dt_reg, status_pess FROM tbl_pessoa 
JOIN tbl_moradia ON tbl_pessoa.id_pessoa = tbl_moradia.tbl_pessoa_id_pessoa1 WHERE nome_pessoa='Davi da Silva';
SHOW  tables;

	SELECT nome_pessoa, num_ap, bloco_ap, tipo_pessoa, dt_reg, status_pess "\
                "FROM tbl_pessoa JOIN tbl_moradia ON tbl_pessoa.id_pessoa = tbl_moradia.tbl_pessoa_id_pessoa1 "\
                "JOIN tbl_veiculo ON tbl_veiculo.tbl_moradia_id_moradia = tbl_moradia.id_veiculo WHERE %s = '%s';
    #INSERT INTO tbl_biometria	(amz_img, 		dt_tp_reg, 				c_img ) #Verifique os campos necessarios
	#VALUES						('',				'',						'')

#INSERT INTO pessoa_biometria	(tbl_pessoa_id_pessoa,	tbl_biometria_id_bio)
#	VALUES						(1,											1);
COMMIT;

    
SELECT data_hora_reg from tbl_rfid JOIN tbl_pessoa ON tbl_pessoa.tbl_rfid_id_tag = tbl_rfid.id_tag where id_tag=1;#Aqui no id_tag, deve ficar o id do morador
use bd_cond;
select * FROM visi_apt;

SELECT nome_visi, CASE autorizado WHEN FALSE THEN 'NÃO' ELSE 'SIM' END autorizado, 
CASE data_fim_visi WHEN !NULL THEN data_fim_visi ELSE 'Sem limite' END data_fim_visi,bloco_ap, num_ap, rg_visi, 
dt_registro_visi FROM visi_apt JOIN agen_visi ON visi_apt.id_visi= agen_visi.visi_apt_id_visi JOIN tbl_pessoa 
ON agen_visi.tbl_pessoa_id_pessoa = tbl_pessoa.id_pessoa JOIN tbl_moradia ON tbl_pessoa.id_pessoa = tbl_moradia.tbl_pessoa_id_pessoa1 
WHERE nome_visi='Joana Darc';

SELECT nome_visi, CASE autorizado WHEN FALSE THEN 'NÃO' ELSE 'SIM' END autorizado,CASE data_fim_visi WHEN !NULL THEN data_fim_visi ELSE 'Sem limite' END data_fim_visi,bloco_ap, num_ap, rg_visi, dt_registro_visi FROM visi_apt JOIN agen_visi ON visi_apt.id_visi= agen_visi.visi_apt_id_visi JOIN tbl_pessoa ON agen_visi.tbl_pessoa_id_pessoa = tbl_pessoa.id_pessoa JOIN tbl_moradia ON tbl_pessoa.id_pessoa = tbl_moradia.tbl_pessoa_id_pessoa1 WHERE rg_visi= '123456';



SELECT nome_visi, autorizado, data_visi, data_fim_visi, bloco_ap, rg_visi 
FROM visi_apt JOIN agen_visi ON visi_apt.id_visi = agen_visi.visi_apt_id_visi 
JOIN tbl_pessoa ON agen_visi.tbl_pessoa_id_pessoa1 = tbl_pessoa.id_pessoa 
JOIN tbl_moradia ON tbl_pessoa.id_pessoa = tbl_moradia.tbl_pessoa_id_pessoa1 WHERE id_pessoa =1;




SELECT nome_visi, autorizado, data_visi, data_fim_visi, bloco_ap, rg_visi
FROM visi_apt JOIN agen_visi ON visi_apt.id_visi = agen_visi.visi_apt_id_visi
JOIN tbl_pessoa ON agen_visi.tbl_pessoa_id_pessoa = tbl_pessoa.id_pessoa
JOIN tbl_moradia on tbl_pessoa.id_pessoa = tbl_moradia.tbl_pessoa_id_pessoa1 where nome_pessoa='Davi da Silva';

select bloco_ap from tbl_pessoa JOIN tbl_moradia on tbl_pessoa.id_pessoa = tbl_moradia.tbl_pessoa_id_pessoa1 where id_pessoa=1;


SELECT nome_visi, autorizado, data_visi, data_fim_visi, bloco_ap, rg_visi
FROM visi_apt JOIN agen_visi ON visi_apt.id_visi = agen_visi.visi_apt_id_visi
JOIN tbl_pessoa ON agen_visi.tbl_pessoa_id_pessoa = tbl_pessoa.id_pessoa
JOIN tbl_moradia ON tbl_pessoa.id_pessoa = tbl_moradia.tbl_pessoa_id_pessoa1 WHERE nome_pessoa='Davi da Silva';


SELECT nome_visi, autorizado, data_visi, data_fim_visi, bloco_ap, rg_visi, 
CASE autorizado WHEN FALSE THEN 'NÃO' ELSE 'SIM' END autorizado FROM visi_apt 
JOIN agen_visi ON visi_apt.id_visi = agen_visi.visi_apt_id_visi JOIN tbl_pessoa 
ON agen_visi.tbl_pessoa_id_pessoa = tbl_pessoa.id_pessoa 
JOIN tbl_moradia ON tbl_pessoa.id_pessoa = tbl_moradia.tbl_pessoa_id_pessoa1 
WHERE nome_pessoa='Davi da Silva';


SELECT * FROM AGEN_VISI;


SELECT nome_visi, CASE autorizado WHEN FALSE THEN 'NÃO' ELSE 'SIM' END autorizado, dt_registro_visi, CASE data_fim_visi WHEN !NULL THEN data_fim_visi ELSE 'Sem limite' END data_fim_visi, bloco_ap, rg_visi FROM visi_apt JOIN agen_visi ON visi_apt.id_visi = agen_visi.visi_apt_id_visi JOIN tbl_pessoa ON agen_visi.tbl_pessoa_id_pessoa = tbl_pessoa.id_pessoa JOIN tbl_moradia ON tbl_pessoa.id_pessoa = tbl_moradia.tbl_pessoa_id_pessoa1 WHERE nome_pessoa='Davi da Silva';


SELECT nome_visi, data_fim_visi, CASE autorizado WHEN FALSE OR 0 THEN 'NÃO' ELSE 'SIM' END 
                                    autorizado,  FROM tbl_pessoa JOIN agen_visi ON tbl_pessoa.id_pessoa = agen_visi.tbl_pessoa_id_pessoa 
                                    JOIN visi_apt ON agen_visi.visi_apt_id_visi = visi_apt.id_visi WHERE id_pessoa =1;


     
UPDATE visi_apt JOIN agen_visi ON visi_apt.id_visi = agen_visi.visi_apt_id_visi 
JOIN tbl_pessoa ON tbl_pessoa.id_pessoa = agen_visi.tbl_pessoa_id_pessoa 
SET nome_visi='Francisco Saulo', rg_visi='546456456', 
data_fim_visi = now() + INTERVAL 1 day WHERE nome_visi='Francisco Saulo' AND id_pessoa = 1;

SELECT nome_visi from tbl_pessoa JOIN agen_visi ON tbl_pessoa.id_pessoa = agen_visi.tbl_pessoa_id_pessoa 
JOIN visi_apt ON agen_visi.visi_apt_id_visi = visi_apt.id_visi WHERE id_pessoa=1 and id_visi= 4;

UPDATE visi_apt JOIN agen_visi ON visi_apt.id_visi = agen_visi.visi_apt_id_visi JOIN 
tbl_pessoa ON tbl_pessoa.id_pessoa = agen_visi.tbl_pessoa_id_pessoa SET nome_visi='Francisco Funcionou', rg_visi='543453645', data_fim_visi = (NOW() + INTERVAL 2 day) 
WHERE nome_visi='Francisco Saulo' AND id_pessoa = 1;

UPDATE agen_visi JOIN visi_apt ON visi_apt.id_visi = agen_visi.visi_apt_id_visi 
JOIN tbl_pessoa ON tbl_pessoa.id_pessoa = agen_visi.tbl_pessoa_id_pessoa 
SET data_fim_visi=null,
nome_visi="Aqui eu"
WHERE id_visi=1 AND id_pessoa = 1;


SELECT id_visi FROM tbl_pessoa JOIN agen_visi ON tbl_pessoa.id_pessoa = agen_visi.tbl_pessoa_id_pessoa 
                                                                            JOIN visi_apt ON agen_visi.visi_apt_id_visi = visi_apt.id_visi
                                                                            WHERE nome_visi='Larissa Souza' and id_pessoa=2;
                                    
UPDATE visi_apt join agen_visi ON visi_apt.id_visi = agen_visi.visi_apt.id_visi 
JOIN tbl_pessoa ON tbl_pessoa.id_pessoa = agen_visi.tbl_pessoa_id_pessoa set data_fim_visi = ADDDATE(data_fim_visi, interval $duracaoDias day), 
							autorizado = $novoStatus, nome_visi = '$novoNomeVisitante' WHERE nome_visi='$nomeVisitante' and id_pessoa = $idUsuario;
                            
UPDATE visi_apt JOIN agen_visi ON visi_apt.id_visi = agen_visi.visi_apt_id_visi JOIN tbl_pessoa ON tbl_pessoa.id_pessoa = agen_visi.tbl_pessoa_id_pessoa SET nome_visi='Aqui ', rg_visi='',
 data_fim_visi = (NOW() + INTERVAL Nenhum day)/*Aqui será os dias atualizados WHERE nome_visi='Aqui eu' AND id_pessoa = 1;

BEGIN;
INSERT INTO tbl_pessoa(cpf_pessoa, 	nome_pessoa, 				senha, 			nomeApelido, 	tipo_pessoa) 
VALUES				  ('12345674563', 'Maria da Silva', 	'admin123', 		'Maria123', 	'Morador');
INSERT INTO tbl_moradia(num_ap, bloco_ap, tbl_pessoa_id_pessoa1, num_vaga_car) 
VALUES (2, 			'C', 					  3,			1);
commit;
## Temina aqui

#Cadastrando Visitantes para morador 1
BEGIN;
INSERT INTO visi_apt(nome_visi, rg_visi, dt_registro_visi) 
			  VALUES('Darius Mandatte', '183456789', now());
INSERT INTO agen_visi(tbl_pessoa_id_pessoa, visi_apt_id_visi, data_visi, data_fim_visi) 
			 VALUES(1, 1, now(), now() + INTERVAL 2 day);
COMMIT;


BEGIN;
INSERT INTO visi_apt(nome_visi, rg_visi, dt_registro_visi) 
			  VALUES('Frascismaldo Silva', '', now());
INSERT INTO agen_visi(tbl_pessoa_id_pessoa, visi_apt_id_visi, data_visi, data_fim_visi) 
			 VALUES(1, 2, now(), now() + INTERVAL 9 day);
COMMIT;

BEGIN;
INSERT INTO visi_apt(nome_visi, rg_visi, dt_registro_visi) 
			  VALUES('Daiane Silva Ribeiro', '1834584', now());
INSERT INTO agen_visi(tbl_pessoa_id_pessoa, visi_apt_id_visi, data_visi, data_fim_visi) 
			 VALUES(1, 3, now(), now() + INTERVAL 2 day);
COMMIT;

BEGIN;
INSERT INTO visi_apt(nome_visi, rg_visi, dt_registro_visi) 
			  VALUES('Fanbianno Silva Costa', '', now());
INSERT INTO agen_visi(tbl_pessoa_id_pessoa, visi_apt_id_visi, data_visi, data_fim_visi) 
			 VALUES(1, 4, now(), now() + INTERVAL 9 day);
COMMIT;


BEGIN;
INSERT INTO visi_apt(nome_visi, rg_visi, dt_registro_visi) 
			  VALUES('Fanbianno Costa', '', now());
INSERT INTO agen_visi(tbl_pessoa_id_pessoa, visi_apt_id_visi, data_visi, data_fim_visi) 
			 VALUES(1, 5, null, null);
COMMIT;

select * from tbl_pessoa;

tbl_pessoa JOIN agen_visi ON tbl_pessoa.id_pessoa = agen_visi.tbl_pessoa_id_pessoa 
JOIN visi_apt ON agen_visi.visi_apt_id_visi = visi_apt.id_visi

UPDATE visi_apt set data_fim_visi = ADDDATE(data_fim_visi, interval $duracaoDias day),
                                            status_visi = $novoStatus, nome_visi = '$novoNomeVisitante' where id_pessoa = '$nomeVisitante';




#Cadastrando Visitantes para morador 2

############################################################################################################################

####################################### Testes
/*

BEGIN;
INSERT INTO visi_apt(nome_visi, rg_visi, dt_registro_visi) 
			  VALUES('Darius Mandatte', '183456789', now());
INSERT INTO agen_visi(tbl_pessoa_id_pessoa, visi_apt_id_visi, data_visi, data_fim_visi) 
			 VALUES(2, 1, now(), now() + INTERVAL 2 day);
COMMIT;


BEGIN;
INSERT INTO visi_apt(nome_visi, rg_visi, dt_registro_visi) 
			  VALUES('Frascismaldo Silva', '', now());
INSERT INTO agen_visi(tbl_pessoa_id_pessoa, visi_apt_id_visi, data_visi, data_fim_visi) 
			 VALUES(2, 2, now(), now() + INTERVAL 9 day);
COMMIT;


BEGIN;
INSERT INTO visi_apt(nome_visi, rg_visi, dt_registro_visi) 
			  VALUES('Daiane Silva Ribeiro', '1834584', now());
INSERT INTO agen_visi(tbl_pessoa_id_pessoa, visi_apt_id_visi, data_visi, data_fim_visi) 
			 VALUES(2, 3, now(), now() + INTERVAL 2 day);
COMMIT;


BEGIN;
INSERT INTO visi_apt(nome_visi, rg_visi, dt_registro_visi) 
			  VALUES('Fanbianno Silva Costa', '', now());
INSERT INTO agen_visi(tbl_pessoa_id_pessoa, visi_apt_id_visi, data_visi, data_fim_visi) 
			 VALUES(2, 4, now(), now() + INTERVAL 9 day);
COMMIT;
####
INSERT INTO visi_apt(nome_visi, rg_visi, dt_registro_visi) 
			  VALUES('David peira', '', now());
select * from visi_apt;

SELECT nome_visi from tbl_pessoa JOIN agen_visi ON tbl_pessoa.id_pessoa = agen_visi.tbl_pessoa_id_pessoa 
JOIN visi_apt ON agen_visi.visi_apt_id_visi = visi_apt.id_visi WHERE id_pessoa=1 and id_visi= 4;


#rollback;
select * from tbl_pessoa;

SELECT nome_visi FROM tbl_pessoa JOIN agen_visi ON tbl_pessoa.id_pessoa = agen_visi.tbl_pessoa_id_pessoa 
JOIN visi_apt ON agen_visi.visi_apt_id_visi = visi_apt.id_visi WHERE id_pessoa=1 and nome_visi = "Darius Mandatte";

set session sql_mode = 'No_engine_substitution';

select id_visi from visi_apt where nome_visi="Darius Mandatte"; 

SELECT nome_visi FROM tbl_pessoa JOIN agen_visi ON 
                                            tbl_pessoa.id_pessoa = agen_visi.tbl_pessoa_id_pessoa 
                                            JOIN visi_apt ON agen_visi.visi_apt_id_visi = visi_apt.id_visi 
                                            WHERE id_pessoa=1 and nome_visi = 'Darius Mandatte';
SELECT id_visi from visi_apt WHERE nome_visi = 'Darius Mandatte';

select * from visi_apt;
INSERT INTO agen_visi(tbl_pessoa_id_pessoa, visi_apt_id_visi) VALUES(2, 1);
SELECT nome_visi, data_fim_visi, autorizado, CASE autorizado WHEN false THEN 'NÃO' ELSE 'SIM' END 
                                    autorizado FROM tbl_pessoa JOIN agen_visi ON tbl_pessoa.id_pessoa = agen_visi.tbl_pessoa_id_pessoa 
                                    JOIN visi_apt ON agen_visi.visi_apt_id_visi = visi_apt.id_visi WHERE id_pessoa = 1;
INSERT INTO tbl_pessoa(cpf_pessoa, 	nome_pessoa, 	senha, nomeApelido, tipo_pessoa) values
('12345678901','Davi da Silva', 	'admin123', 		'administrador', 	'Proprietario'),

('83374003114','Devon Tynis', 	 	'11f030dd31s', 		'SeiLa', 			'Proprietario'),
('32523535476','Darlin Francisca', 	'd66s423232e', 			'admin', 			'Morador'),

('32523535486','Alan', 		'd66s423232e', 			'admin452', 		'Morador');
 
INSERT INTO tbl_moradia(num_ap, bloco_ap, tbl_pessoa_id_pessoa1, num_vaga_car) 
				VALUES (1, 			'B'	, 					  1,			1),# Simulando uma familia em  um apt
					   (10, 		'B' , 					  2, 			2),
					   (19, 		'B' , 					  3,			3),
					   (8, 			'B' , 					  4, 			4);
*/
############################################
