<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index(){
        $this->load->view('includes/header');
        $this->load->view('v_home');
        $this->load->view('includes/footer');
    }

    public function authAcessoPage(){

        $usuario = $this->input->post('nomeApelido');

        $this->load->model('M_home');

        $retorno = $this->M_home->authAcessoPage($usuario);

        echo json_encode($retorno->result());//Vc só consegue respoder uma requisição do 'json' usando echo_json_encode, e em casos de selects tbm
    }


    
}

?>