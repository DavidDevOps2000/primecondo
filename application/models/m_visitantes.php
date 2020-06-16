<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_visitantes extends CI_Model {

    public function cadastrarVisitantes($nomeVisitante, $duracaoDias, $numRg){                  //Cadastro Visitantes
        $idUsuario = $_SESSION['id_usuario'];
        $retorno = $this->db->query("SELECT * from visi_apt where nome_visi = '$nomeVisitante'");// Aqui, será verificado se retorna algo

        if ($retorno->num_rows() == false){ // Aqui será verificado se NÃO existe nenhuma linha, se existir é pq nome é repetido

            if(is_array($duracaoDias)){
                $this->db->query("INSERT INTO visi_apt(nome_visi, rg_visi, dt_registro_visi) VALUES('$nomeVisitante', '$numRg', NOW());
                              INSERT INTO agen_visi(tbl_pessoa_id_pessoa, visi_apt_id_visi) VALUES($idUsuario, 4");

            }
                
            $this->db->query("INSERT INTO visi_apt(nome_visi, rg_visi, dt_registro_visi) VALUES('$nomeVisitante', '$numRg', NOW());
                              INSERT INTO agen_visi(tbl_pessoa_id_pessoa, visi_apt_id_visi, data_visi, data_fim_visi) VALUES(1, 4, NOW(), NOW() + INTERVAL $duracaoDias day)");
                
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
        $retorno = $this->db->query("SELECT nome_visi, data_fim_visi, autorizado, CASE autorizado WHEN false THEN 'NÃO' ELSE 'SIM' END autorizado FROM tbl_pessoa 
                                    JOIN agen_visi ON tbl_pessoa.id_pessoa = agen_visi.tbl_pessoa_id_pessoa 
                                    JOIN visi_apt ON agen_visi.visi_apt_id_visi = visi_apt.id_visi WHERE nome_visi = '$nomeVisitante' and id_pessoa=1");
    
            if($retorno->num_rows() > 0){

                return $retorno;
            }
        }


        


    public function diasFaltam($nomeVisitante){// Não usado
        
        $retorno = $this->db->query("SELECT diaFim - date(NOW())  from visi_apt where nome_visi = '$nomeVisitante';");
        
        if($nomeVisitante > 0){

                return $returno;

            }else{
                    
                $returno="Data Expirada";
                
                return $returno;
            
            }
        }


        public function alterVisi($nomeVisitante, $duracaoDias, $novoNomeVisitante, $novoStatus) {

            $retorno = $this->db->query("UPDATE visi_apt set diaFim = ADDDATE(diaFim, interval $duracaoDias day), 
                                            status_visi = $novoStatus, nome_visi = '$novoNomeVisitante' where nome_visi = '$nomeVisitante'");
    
                if($this->db->affected_rows() == TRUE){//verifica a inserção
                                
                                return 1;//Inserção com sucesso
    
                            }else{
                     return 0; 
                                } //problema ao inserir
                
        }

}

?>
