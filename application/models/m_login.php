<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model{
    public function validalogin($email, $senha){
        
        $retorno = $this->db->query("select * from tbl_pessoa where nomeApelido='$email' and senha='$senha' and status_pess = true;");
                //Será verificado a existencias das contas e se está ativa,
                // caso não, será negada a entrada, por moradores não autorizados    
            if($retorno->num_rows() > 0){//Se a Variavel retorno tiver um (1) retornando por ser True
                
                return 1;
                    				//Então será retornado 1 ao executar esse metodo
            }
            else{
                
                return 0;//Caso não ache o dado inserido pelo Usuario, retornará 0 ou nesse caso False
            }
        }
    }
?>