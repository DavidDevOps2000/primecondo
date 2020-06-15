use bd_vendas;

BEGIN;			# Cadastrando morador e apt ao mesmo tempo EM UM INSERT COM BEGIN TRANSACTION
INSERT INTO tbl_pessoa(cpf_pessoa, 			nome_pessoa, 		senha, 			nomeApelido, 			tipo_pessoa) 
VALUES				  ('12345678901',	'Davi da Silva', 	'admin123', 		'administrador', 	'Proprietario');
INSERT INTO tbl_moradia(num_ap, bloco_ap, tbl_pessoa_id_pessoa1, num_vaga_car) 
VALUES (1, 			'B', 					  1,			1);
commit;
#SELECT * FROM TBL_PESSOA;
#ROLLBACK;

#Cadastrando um casal
begin;
INSERT INTO tbl_pessoa(cpf_pessoa, 		nome_pessoa, 			senha, 		nomeApelido, 		tipo_pessoa) 
VALUES				  ('12345678123',	'Jose da Silva', 	'jose123', 		'joseadmin', 		'Proprietario');
INSERT INTO tbl_moradia(num_ap, 	bloco_ap, 		tbl_pessoa_id_pessoa1, 	num_vaga_car) 
VALUES 				   (2, 				'C', 						    2,				2);
commit;

BEGIN;
INSERT INTO tbl_pessoa(cpf_pessoa, 	nome_pessoa, 				senha, 			nomeApelido, 	tipo_pessoa) 
VALUES				  ('12345674563', 'Maria da Silva', 	'admin123', 		'Maria123', 	'Morador');
INSERT INTO tbl_moradia(num_ap, bloco_ap, tbl_pessoa_id_pessoa1, num_vaga_car) 
VALUES (2, 			'C', 					  3,			1);
commit;

## Temina aqui


SELECT bloco_ap from tbl_pessoa join tbl_moradia on tbl_pessoa.id_pessoa = tbl_moradia.tbl_pessoa_id_pessoa1 where nome_pessoa='Davi da Silva';

#Cadastrando Visitantes
begin;
insert into visi_apt(nome_visi, rg_visi, dt_registro_visi) values('Darius Mandatte', '183456789', now());
insert into agen_visi(tbl_pessoa_id_pessoa, visi_apt_id_visi, data_visi, data_fim_visi) values(1, 1, now(), now() + interval 2 day );
commit;

select * from visi_apt;
select * from agen_visi;


BEGIN;
insert into visi_apt(nome_visi, rg_visi, dt_registro_visi) values('Santos Silva', '828798523', now());
insert into agen_visi(tbl_pessoa_id_pessoa, visi_apt_id_visi, data_visi, data_fim_visi) values(1, 2, now(), now() + interval 2 day );
commit;


BEGIN;
insert into visi_apt(nome_visi, rg_visi, dt_registro_visi) values('Francisco Silva', '', now());
insert into agen_visi(tbl_pessoa_id_pessoa, visi_apt_id_visi, data_visi, data_fim_visi) values(1, 3, now(), now() + interval 2 day );
commit;



#rollback;
select * from visi_apt;
select * from agen_visi;

SELECT nome_visi, data_fim_visi, autorizado, CASE autorizado WHEN FALSE THEN 'NÃO' ELSE 'SIM' END 
autorizado FROM tbl_pessoa JOIN agen_visi ON tbl_pessoa.id_pessoa = agen_visi.tbl_pessoa_id_pessoa 
JOIN visi_apt ON agen_visi.visi_apt_id_visi = visi_apt.id_visi WHERE id_pessoa='1';

set session sql_mode = 'No_engine_substitution';


SELECT nome_visi, data_fim_visi, autorizado, CASE autorizado WHEN false THEN 'NÃO' ELSE 'SIM' END 
                                    autorizado FROM tbl_pessoa JOIN agen_visi ON tbl_pessoa.id_pessoa = agen_visi.tbl_pessoa_id_pessoa 
                                    JOIN visi_apt ON agen_visi.visi_apt_id_visi = visi_apt.id_visi WHERE id_pessoa = 1;

####################################### Testes
/*INSERT INTO tbl_pessoa(cpf_pessoa, 	nome_pessoa, 	senha, nomeApelido, tipo_pessoa) values
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
