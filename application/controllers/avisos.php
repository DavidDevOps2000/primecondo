<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Avisos extends CI_Controller {

    public function index(){
        if($_SESSION['apelido']){//Se houver algum valor nesse sessão a pagina será contruida        
            $this->load->view('includes/header');
            $this->load->view('includes/menu');
            $this->load->view('v_avisos');
            $this->load->view('includes/footer');
        }else{                  //Senão, ela não sera contruida
            ECHO "POR FAVOR, FAÇA O LOGIN";
        }
    }

    //public function authAcessoPage(){ //Fazendo Verificação se existe o Login/ E pegando o ID tambem
      //  $usuario = $this->input->post('nomeApelido');
        //$this->load->model('M_home');

        //$retorno = $this->M_home->authAcessoPage($usuario);
        //echo json_encode($retorno->result());//Vc só consegue respoder uma requisição do 'json' usando echo_json_encode, e em casos de selects tbm

        //$arrayUsuario = array("id_pessoa"=>$retorno->row()->id_pessoa);
        //$_SESSION['id_usuario'] = $arrayUsuario["id_pessoa"]; //Pegando o id do usuario e jogando na sessao para pegar do outro lado
    //}
    
}

?>