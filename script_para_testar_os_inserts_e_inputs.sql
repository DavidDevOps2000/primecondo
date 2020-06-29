use bd_cond;


BEGIN;
			# Cadastrando morador e apt ao mesmo tempo EM UM INSERT COM BEGIN TRANSACTION
INSERT INTO tbl_pessoa(cpf_pessoa, 			nome_pessoa, 		senha, 			nomeApelido, 			tipo_pessoa) /*Inserindo Moradores*/
VALUES				  ('12345678901',	'Davi da Silva', 	'admin123', 		'administrador', 		'Proprietario'), /* Usuario administrador, senha: admin123 */
					  ('12345678123',	'Jose da Silva', 	'jose123', 				'joseadmin', 		'Proprietario'); /* Usuario joseAdmin, senha: jose123 */
        
        
        
INSERT INTO tbl_moradia(num_ap, 		bloco_ap, 		tbl_pessoa_id_pessoa1, 	num_vaga_car) 
VALUES 					(1, 				'B', 					  		1,				1),/* Vinculando Moradia Davi da Silva e apt num 1 Bloco 'B'*/
						(2, 				'C', 						    2,				2);/* Vinculando Moradia Jose da Silva e apt num 1 Bloco 'C'*/
COMMIT;

                            

INSERT INTO tbl_pessoa(cpf_pessoa, 			nome_pessoa, 		senha, 			nomeApelido, 		tipo_pessoa, data_nascimento) /*Inserindo Moradores*/
VALUES				  ('1234567001',	'Joao Silva', 	'admin123', 		'joaoAdmin', 		'Proprietario', '26-04-2020');

use bd_cond;
BEGIN;
			# Cadastrando morador e apt ao mesmo tempo EM UM INSERT COM BEGIN TRANSACTION
	INSERT INTO tbl_pessoa		(cpf_pessoa, 			nome_pessoa, 		senha, 			nomeApelido, 		tipo_pessoa) /*Inserindo Moradores*/
	VALUES				  		('',						'', 				'', 			'', 				''		); /* Usuario administrador, senha: admin123 */
        
	INSERT INTO tbl_moradia		(num_ap, 		bloco_ap, 		tbl_pessoa_id_pessoa1, 	num_vaga_car) 
	VALUES 						(1, 				'B', 					  		1,				1);/* Vinculando Moradia Davi da Silva e apt num 1 Bloco 'B'*/

	INSERT INTO tbl_contato		(tel, 		email)
	VALUES						('',			'');

	INSERT INTO tbl_veiculo		(cor_vei, marca_vei, modelo_vei, num_vaga, placa_vei, tbl_moradia_id_moradia)
	VALUES 						('',			'', 		'',		1,			'',						'');

BEGIN;
	INSERT INTO tbl_rfid		(reg_tag, data_hora_reg)
	VALUES						('', 			NOW());
    INSERT INTO tbl_pessoa(cpf_pessoa, 			nome_pessoa, 		senha, 			nomeApelido, 		tipo_pessoa, data_nascimento, tbl_rfid_id_tag) /*Inserindo Moradores*/
VALUES				  ('1234567001',	'Joao Silva', 	'admin123', 		'joaoAdmin', 		'Proprietario', '26-04-2020', 1);
COMMIT;
  


INSERT INTO tbl_contatos_pessoa (tbl_contato_id_contato, tbl_contatos_pessoa) VALUES(2, 2);

SELECT id_moradia FROM tbl_moradia JOIN tbl_pessoa WHERE id_pessoa = 1 AND num_ap = 1;



use bd_cond;
select * from agen_visi;
select * from visi_apt;
SELECT * FROM tbl_pessoa;        


SELECT data_nascimento, num_ap, bloco_ap, tipo_pessoa, tel, email, nomeApelido, 
		senha, num_vaga_vei, status_pess, tipo_vei, modelo_vei, cor_vei, placa_vei
		FROM tbl_pessoa JOIN tbl_moradia ON tbl_pessoa.id_pessoa = tbl_moradia.tbl_pessoa_id_pessoa1
		JOIN tbl_veiculo ON tbl_moradia.id_moradia = tbl_veiculo.id_veiculo
		JOIN contatos_pessoa ON tbl_pessoa.id_pessoa = contatos_pessoa.tbl_pessoa_id_pessoa
		JOIN tbl_contato ON contatos_pessoa.tbl_contato_id_contato = tbl_contato.id_contato
		WHERE nome_pessoa='' OR cpf_pessoa='464.646.464-64';

UPDATE tbl_pessoa JOIN tbl_moradia ON tbl_pessoa.id_pessoa = tbl_moradia.tbl_pessoa_id_pessoa1 JOIN tbl_veiculo ON tbl_moradia.id_moradia = tbl_veiculo.tbl_moradia_id_moradia
		JOIN contatos_pessoa ON tbl_pessoa.id_pessoa = contatos_pessoa.tbl_pessoa_id_pessoa JOIN tbl_contato ON contatos_pessoa.tbl_contato_id_contato = tbl_contato.id_contato 
		SET data_nascimento ='dvdvxcvxb', num_ap =5454, bloco_ap ='A', tipo_pessoa ='Proprietário', tel ='(564) 51561-61  ', email ='464564', nomeApelido ='54552', senha ='45546', 
			num_vaga_vei =23, status_pess = 0, tipo_vei ='Carro',
            modelo_vei ='Sei lá', cor_vei ='sadlfjslak', placa_vei ='adfhgk', nome_pessoa ='Foi', cpf_pessoa ='%s' WHERE nome_pessoa ='dvd' OR cpf_pessoa='465.456.465-45' ;

############################################################################################################################
####


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
