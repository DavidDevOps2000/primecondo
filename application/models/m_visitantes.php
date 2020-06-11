<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_visitantes extends CI_Model {

   //Visitantes 
    public function cadastrarVisitantes($nomeVisitante, $duracaoDias){                  //Cadastro Visitantes

     $retorno = $this->db->query("SELECT * from visi_apt where nome_visi = '$nomeVisitante'");// Aqui, será verificado se retorna algo
        

        if ($retorno->num_rows() == false){ // Aqui será verificado se NÃO existe nenhuma linha, se existir é pq nome é repetido
                
            $this->db->query("insert into visi_apt(nome_visi, diaInicio, diaFim, dt_hr_solicitacao) values('$nomeVisitante', now(), now() + interval $duracaoDias day, now());");
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

    public function consultar(){//Consulta os dados dentro do Banco e Joga na lISTA Visitantes
            
        $retorno = $this->db->query("SELECT nome_visi, status_visi, diaFim, case status_visi when false then 'NÃO' else 'SIM' end status_visi from visi_apt;");
            
            //Retorno o resultado do SELECT
            if($retorno->num_rows() > 0){
                return $retorno;
            }
        }
        
        
    public function desativarVisi($nomeVisitante){    //Não usada        
                        
        $retorno = $this->db->query("UPDATE visi_apt set status_visi = false where nome_visi = '$nomeVisitante'");
            if($this->db->affected_rows()>0){
                return 1;//Alterado com sucesso
            }else{
                return 0;//Problema ao alterar
                }
        }
        
    public function ativarVisi($nomeVisitante){  //Não usada          
                        
        $retorno = $this->db->query("UPDATE visi_apt set status_visi = true where nome_visi = '$nomeVisitante'");
            if($this->db->affected_rows()>0){
                return 1;//Alterado com sucesso
            
            }else{
                return 0;//Problema ao alterar
            }
            
        }

    public function consultVisiToModel($nomeVisitante){// Essa funçao é para jogar os valores dos resultados dentro da Model ao se clicar com o btnEdit
        $retorno = $this->db->query("SELECT nome_visi, status_visi, diaFim, case status_visi when false then 
                                                        'NÃO' else 'SIM' end status_visi from visi_apt where nome_visi = '$nomeVisitante'");
    
            if($retorno->num_rows() > 0){

                return $retorno;
            }
        }


        


    public function diasFaltam($nomeVisitante){// Não usado
        
        $retorno = $this->db->query("SELECT diaFim - date(now())  from visi_apt where nome_visi = '$nomeVisitante';");
        
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
