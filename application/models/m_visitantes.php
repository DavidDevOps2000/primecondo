<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_visitantes extends CI_Model {

   //Visitantes 
    public function cadastrarVisitantes($nomeVisitante, $duracaoDias){

     $retorno = $this->db->query("select * from visi_apt where nome_visi = '$nomeVisitante'");// Aqui, será verificado se retorna algo
        

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
              return 2;
            }
    }

    
    

        public function consultar(){
            //instrução que executa a query no banco de dados
            $retorno = $this->db->query("SELECT usuario, senha, tipo, case estatus when 'D' then 'DESATIVADO' else 'ATIVO' end estatus from usuarios");
            

            //Retorno o resultado do select
            if($retorno->num_rows() > 0){

                return $retorno;
            }
        }
        
        

        public function consalterar($usuario){
            $retorno = $this->db->query("SELECT usuario, senha FROM usuarios WHERE usuario = '$usuario'");
    
            if($retorno->num_rows() > 0){
                return $retorno;
            }
        }

        public function alterar($usuario, $senha, $tipo){
            $retorno = $this->db->query("update usuarios set senha = '$senha', tipo = '$tipo' where usuario = '$usuario'");

            if($this->db->affected_rows() > 0){
                return 1;

            }
            else{
                return 0;
            }
        }
        public function desativar($nomeVisitante){            
                        
        $retorno = $this->db->query("update visi_apt set status_visi = false where nome_visi = '$nomeVisitante'");

        if($this->db->affected_rows()>0){

            return 1;//Alterado com sucesso
        
        }else{

            return 0;//Problema ao alterar
        }
        
        }

        public function verusu($usuario){
            $retorno = $this->db->query("select * from usuarios where usuario = '$usuario'");

            if($this->db->affected_rows() > 0){
                //Atualizado com sucesso
                return 1;
            }
            else{
                return 0;
            }
        }

        public function reativar($usuario){
            //Instrução que a Query no banco
            $retorno = $this->db->query("UPDATE usuarios set estatus='' WHERE usuario = '$usuario'");

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
