<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_visitantes extends CI_Model {

    public function cadastrarVisitantes($nomeVisitante, $duracaoDias, $numRg){                  //Cadastro Visitantes
        $idUsuario = $_SESSION['id_usuario'];

        $retorno = $this->db->query("SELECT * FROM tbl_pessoa JOIN agen_visi ON tbl_pessoa.id_pessoa = agen_visi.tbl_pessoa_id_pessoa JOIN 
                                            visi_apt ON agen_visi.visi_apt_id_visi = visi_apt.id_visi WHERE id_pessoa=$idUsuario and nome_visi='$nomeVisitante'");// Aqui, será verificado se retorna algo
                                                                     //Buscando id do Visitante recem cadastrado para jogar tbm agendamento
        
        if($retorno->num_rows() == false){ // Aqui será verificado se NÃO existe nenhuma linha, se existir é pq nome é repetido

                if(is_string($duracaoDias)){//Esse agendamento só será executado se o não tiver dias definidos, ou seja, aqui tera STRINGS
                            $this->db->query("INSERT INTO visi_apt(nome_visi, rg_visi, dt_registro_visi) VALUES('$nomeVisitante', '$numRg', NOW())"); //Inserindo dados de visitantes somente com o nome e RG ou só o nome
                            $retorno = $this->db->query("SELECT id_visi FROM visi_apt WHERE nome_visi='$nomeVisitante' AND rg_visi='$numRg'");//Buscando id do Visitante recem cadastrado para jogar tbm agendamento
                            $arrayVisi = array("id_visi"=>$retorno->row()->id_visi);//Pegando O id  e jogando em um array 
                            $idVisi = $arrayVisi["id_visi"];//jogando o ID valor aqui
                            $this->db->query("INSERT INTO agen_visi(tbl_pessoa_id_pessoa, visi_apt_id_visi) VALUES($idUsuario, $idVisi);");//Cadastrando e vinculando ao usuario e visitante
                
                        
                        }else{//Se o dia não tiver limite, entao vai cair aqui embaixo
                            $this->db->query("INSERT INTO visi_apt(nome_visi, rg_visi, dt_registro_visi) VALUES('$nomeVisitante', '$numRg', NOW())"); //Inserindo dados de visitantes somente com o nome e RG ou só o nome
                            $retorno = $this->db->query("SELECT id_visi FROM visi_apt WHERE nome_visi='$nomeVisitante' AND rg_visi='$numRg'");//Buscando id do Visitante recem cadastrado para jogar tbm agendamento
                            $arrayVisi = array("id_visi"=>$retorno->row()->id_visi);//Pegando O id  e jogando em um array 
                            $idVisi = $arrayVisi["id_visi"];//jogando o ID valor aqui
                            $this->db->query("INSERT INTO agen_visi(tbl_pessoa_id_pessoa, visi_apt_id_visi, data_visi, data_fim_visi) 
                                                                VALUES($idUsuario, $idVisi, now(), now() + interval $duracaoDias day)");//Cadastrando e vinculando ao usuario e visitante
                            }
                
            if($this->db->affected_rows() == true){//verifica a inserção
                    //Inserção com sucesso
                    return 1;
                }else{
                    //problema ao inserir
                    return 0;
                }
        }else{
            return 2;//Se o usuario existir, não vai cadastrar e vai retornar um aviso.
            }
    }
    
    public function consultar(){ //Consulta os dados dentro do Banco e Joga na lISTA Visitantes
        $idUsuario = $_SESSION['id_usuario'];//id do usuario atual

        $retorno = $this->db->query("SELECT nome_visi, data_fim_visi, autorizado, CASE autorizado WHEN FALSE THEN 'NÃO' ELSE 'SIM' END 
                                    autorizado FROM tbl_pessoa JOIN agen_visi ON tbl_pessoa.id_pessoa = agen_visi.tbl_pessoa_id_pessoa 
                                    JOIN visi_apt ON agen_visi.visi_apt_id_visi = visi_apt.id_visi WHERE id_pessoa = $idUsuario;");
            
            //Retorno o resultado do SELECT
            if($retorno->num_rows() > 0){
                return $retorno;
            }
        }
        
    public function consultVisiToModel($nomeVisitante){// Essa funçao é para jogar os valores dos resultados dentro da Model ao se clicar com o btnEdit
        $idUsuario = $_SESSION['id_usuario'];//id do usuario atual

        $retorno = $this->db->query("SELECT nome_visi, data_fim_visi, autorizado, rg_visi, CASE autorizado WHEN FALSE THEN 'NÃO' ELSE 'SIM' END 
                                            autorizado FROM tbl_pessoa JOIN agen_visi ON tbl_pessoa.id_pessoa = agen_visi.tbl_pessoa_id_pessoa 
                                            JOIN visi_apt ON agen_visi.visi_apt_id_visi = visi_apt.id_visi
                                            WHERE nome_visi='$nomeVisitante' and id_pessoa=$idUsuario;");
            if($retorno->num_rows() > 0){
                return $retorno;
            }
        }

    public function alterVisi($nomeVisitante, $duracaoDias, $novoNomeVisitante, $novoStatus, $novoVlrRg){  
            $idUsuario = $_SESSION['id_usuario'];//id do usuario atual

            if(is_string($duracaoDias)){// Se em duração de dias vier a palavra nenhum, que nesse caso é String, fazer isso abaixo

                $this->db->query("UPDATE visi_apt JOIN agen_visi ON visi_apt.id_visi = agen_visi.visi_apt_id_visi 
                                                            JOIN tbl_pessoa ON tbl_pessoa.id_pessoa = agen_visi.tbl_pessoa_id_pessoa 
                                                            SET nome_visi='$novoNomeVisitante',
                                                                rg_visi='$novoVlrRg',
                                                                data_fim_visi = null,/* aqui apagamos o numero de dias pois o usuario usou o Nenhum como opcao */
                                                                autorizado = $novoStatus
                                                                WHERE nome_visi='$nomeVisitante' AND id_pessoa = $idUsuario;");
            }else{//Se vier o numero de dias, vai fazer isso

                $retorno = $this->db->query("SELECT data_fim_visi FROM tbl_pessoa /* Caso venha numero de dias, então faremos uma validação pra saber se o campo dataFim não está vazio, pra evitar update com erro*/
                                                JOIN agen_visi ON tbl_pessoa.id_pessoa = agen_visi.tbl_pessoa_id_pessoa
                                                JOIN visi_apt ON agen_visi.visi_apt_id_visi = visi_apt.id_visi
                                                WHERE nome_visi='$nomeVisitante' and id_pessoa=$idUsuario;");//Verificaremos qual é o campo


                $temVlrNull = array('data_fim_visi'=>$retorno->row()->data_fim_visi);//Verificando se há um valor nulo no campo data Fim

                $temVlrNull = $temVlrNull['data_fim_visi'];//colocando aqui o valor do id do visitante atualizado


                            if($temVlrNull == null){// Se não houver valor null faremos seguinte insert, trocando o campo 'NOW() + INTERVAL $duracaoDias day'
                                $this->db->query("UPDATE visi_apt JOIN agen_visi ON visi_apt.id_visi = agen_visi.visi_apt_id_visi 
                                                            JOIN tbl_pessoa ON tbl_pessoa.id_pessoa = agen_visi.tbl_pessoa_id_pessoa 
                                                            SET nome_visi='$novoNomeVisitante', rg_visi='$novoVlrRg', data_fim_visi = (NOW() + INTERVAL $duracaoDias day)
                                                            WHERE nome_visi='$nomeVisitante' AND id_pessoa = $idUsuario;");/*Aqui será os dias atualizados 2*/

                            }else{
                                
                                $this->db->query("UPDATE visi_apt JOIN agen_visi ON visi_apt.id_visi = agen_visi.visi_apt_id_visi 
                                                            JOIN tbl_pessoa ON tbl_pessoa.id_pessoa = agen_visi.tbl_pessoa_id_pessoa 
                                                            SET nome_visi='$novoNomeVisitante', rg_visi='$novoVlrRg', data_fim_visi = ADDDATE(data_fim_visi, interval $duracaoDias day)
                                                            WHERE nome_visi='$nomeVisitante' AND id_pessoa = $idUsuario;");/*Aqui será os dias atualizados 1 */
                            }
                }

                
            if($this->db->affected_rows() == TRUE){//verifica a inserção
                                
                        return 1;//Inserção com sucesso
                }else{
                        return 0; 
                                
                    } //problema ao inserir
                
        }

    public function delVisi($nomeVisiDel){

        $idUsuario = $_SESSION['id_usuario'];//id do usuario atual

        $retorno = $this->db->query("SELECT id_visi FROM visi_apt LEFT JOIN agen_visi ON visi_apt.id_visi = agen_visi.visi_apt_id_visi /* Se morador e visitante coexitirem será retornado 1 linha*/
                                                    LEFT JOIN tbl_pessoa ON tbl_pessoa.id_pessoa = agen_visi.tbl_pessoa_id_pessoa 
                                                    WHERE nome_visi='$nomeVisiDel' AND id_pessoa = $idUsuario;");

        if($retorno->num_rows() > 0){

            $this->db->query("DELETE FROM visi_apt WHERE nome_visi = '$nomeVisiDel';");

            return 1;//Inserção com sucesso

        }else{            

            return 0; 
                    
        } //problema ao inserir

        }

    }


?>
