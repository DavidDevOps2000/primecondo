<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

class M_acesso extends CI_Model{

    public function validalogin($email, $senha){
        
        $retorno = $this->db->query("select * from tbl_pessoa where email='$email' and senha='$senha' and status_pess = true;");
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


        public function validacadastro($usuario, $senha){
            $retorno = $this->db->query("select * from usuarios where usuario = '$usuario' and senha = '$senha' and estatus = ''");
            
            if($retorno->num_rows() > 0){       
                
                return 0;

            }else if($retorno->num_rows() == 0){
                $retorno = $this->db->query("Insert into usuarios(usuario, senha) values ('$usuario','$senha')");
                 
                return 1;
            }else{
                return 2;
            }
        }

    }


?>