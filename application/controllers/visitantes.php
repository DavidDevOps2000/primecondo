<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visitantes extends CI_Controller {
    
    public function index(){

        $this->load->view('includes/header');//carregar o cabeçalho
        $this->load->view('v_visitantes');//carrega o corpo da tela
        $this->load->view('includes/footer');//carrega rodapé da tela
    }
}