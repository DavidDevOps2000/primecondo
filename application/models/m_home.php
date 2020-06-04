<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model{

    public function authAcessoPage($usuario){

     $retorno = $this->db->query("SELECT id_pessoa from tbl_pessoa where email='$usuario' and status_pess = true");
         
        if($retorno->num_rows() > 0){//Se a Variavel retorno tiver acima  1 é pq existe
            
            $arrayRetorno =  array('retornoId'->$retorno->row()->id_pessoa);//Esse Retorno tem que está o valor do campo retornado

        }else{
                
            return 0;// Se não tiver dado, então não foi logado
            }
        }

    }


?>