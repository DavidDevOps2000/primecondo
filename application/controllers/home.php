<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
//Use os campos txtUsuario txtSenha do formPrincipal
    
	public function index()
	{
        $this->load->view('includes/header');	//Estilização CSS
        $this->load->view('v_home');
        $this->load->view('includes/footer');	//Ajax e JS FUNCTIONS

    }
}