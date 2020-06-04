<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model{

    public function authAcessoPage($email){

        $retorno = $this->db->query("select id_pessoa from tbl_pessoa where email='$email' and status_pess = true;");
         
        
            if($retorno->num_rows() > 0){//Se a Variavel retorno tiver acima de 1 é pq existe

                return $retorno;  //Então será retornado 1 ao executar esse metodo

            }else{
                
                return 0;//Caso não ache o dado inserido pelo Usuario, retornará 0 ou nesse caso False
            }
        }

    }


?>