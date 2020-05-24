<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_visitantes extends CI_Model {

   //Visitantes 
    public function cadastrarVisitantes($nomeVisitante, $duracaoDias){

     $retorno = $this->db->query("SELECT * from visi_apt where nome_visi = '$nomeVisitante'");// Aqui, será verificado se retorna algo
        

        if ($retorno->num_rows() == false){ // Aqui será verificado se NÃO existe nenhuma linha, se existir é pq nome é repetido
                
            $this->db->query("insert into visi_apt(nome_visi, diaInicio, diaFim) values('$nomeVisitante', now(), now() + interval $duracaoDias day);");

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

    
    

        public function consultar(){
            //instrução que executa a query no banco de dados
        $retorno = $this->db->query("SELECT nome_visi, status_visi, diaFim, case status_visi when false then 'NÃO' else 'SIM' end status_visi from visi_apt;");
            

            //Retorno o resultado do SELECT
            if($retorno->num_rows() > 0){

                return $retorno;
            }
        }
        
        

        public function consulAlterVisi($nomeVisitante){
            $retorno = $this->db->query("SELECT nome_visi, status_visi, diaFim FROM visi_apt WHERE nome_visi = '$nomeVisitante';");
    
            if($retorno->num_rows() > 0){
                return $retorno;
            }
        }

        public function alterar($nomeVisitante, $senha, $tipo){

            $retorno = $this->db->query("UPDATE visi_apt set nome_visi '$nomeVisitante', status_visi= '$novoStatus', diaFim='$novaData' where nome_visi='$nomeVisitante';");

            if($this->db->affected_rows() > 0){
                return 1;

            }
            else{
                return 0;
            }
        }
        public function desativar($nomeVisitante){            
                        
        $retorno = $this->db->query("UPDATE visi_apt set status_visi = false where nome_visi = '$nomeVisitante'");

        if($this->db->affected_rows()>0){

            return 1;//Alterado com sucesso
        
        }else{

            return 0;//Problema ao alterar
        }
        
        }

        public function verusu($nomeVisitante){
            $retorno = $this->db->query("SELECT * from usuarios where usuario = '$nomeVisitante'");

            if($this->db->affected_rows() > 0){
                //Atualizado com sucesso
                return 1;
            }
            else{
                return 0;
            }
        }

        public function reativar($nomeVisitante){
            //Instrução que a Query no banco
            $retorno = $this->db->query("UPDATE usuarios set estatus='' WHERE usuario = '$nomeVisitante'");

            if($this->db->affected_rows() > 0){
                //Atualizando com sucesso
                return 1;
            }else{
                //Problema ao alterar
                return 0;
            }
        }


    }
?>
