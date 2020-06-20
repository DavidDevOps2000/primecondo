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

                            




BEGIN;
			# Cadastrando morador e apt ao mesmo tempo EM UM INSERT COM BEGIN TRANSACTION
	INSERT INTO tbl_pessoa		(cpf_pessoa, 			nome_pessoa, 		senha, 			nomeApelido, 		tipo_pessoa) /*Inserindo Moradores*/
	VALUES				  		('',						'', 				'', 			'', 				''		); /* Usuario administrador, senha: admin123 */
        
	INSERT INTO tbl_moradia		(num_ap, 		bloco_ap, 		tbl_pessoa_id_pessoa1, 	num_vaga_car) 
	VALUES 						(1, 				'B', 					  		1,				1),/* Vinculando Moradia Davi da Silva e apt num 1 Bloco 'B'*/

	INSERT INTO tbl_contato		(tel, 		email)
	VALUES						('',			'');

	INSERT INTO tbl_veiculo		(cor_vei, marca_vei, modelo_vei, num_vaga, placa_vei, tbl_moradia_id_moradia)
	VALUES 						('',			'', 		'',		1,			'',						'');

	INSERT INTO tbl_rfid		(reg_tag, data_hora_reg)
	VALUES						('', 			NOW());

INSERT INTO tbl_contatos_pessoa	(tbl_contato_id_contato, tbl_contatos_pessoa)
	VALUES						(1,										    1);

    #INSERT INTO tbl_biometria	(amz_img, 		dt_tp_reg, 				c_img ) #Verifique os campos necessarios
	#VALUES						('',				'',						'')

#INSERT INTO pessoa_biometria	(tbl_pessoa_id_pessoa,	tbl_biometria_id_bio)
#	VALUES						(1,											1);
COMMIT;



use bd_cond;
select * from agen_visi;
select * from visi_apt;        














SHOW  tables;
############################################################################################################################
####


/*

     
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
