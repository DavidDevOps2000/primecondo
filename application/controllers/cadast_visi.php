<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadast_visi extends CI_Controller {
    
    public function index(){

        $this->load->view('includes/header');//carregar o cabeçalho
        $this->load->view('includes/menu');//carregar o menu
        $this->load->view('v_cadast_visi');//carrega o corpo da tela
        $this->load->view('includes/footer');//carrega rodapé da tela
    }

   
    public function cadastrar(){
        //carregando as variáveis do que foi mandado via post
        $usuario = $this->input->post('usuario');
        $senha = $this->input->post('senha');

        //Instancio a model m_visitantes
        $this->load->model('m_cadast_visi');

        //solicito a execução do método validalogin passando os
        //atributos necessários, e atribuindo a $retorno
        
        $retorno = $this->m_cadast_visi->cadastrar($usuario, $senha);

        echo $retorno;
    }
}

?>