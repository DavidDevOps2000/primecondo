<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
//Use os campos txtUsuario txtSenha do formPrincipal
    
	public function index()
	{
        $this->load->view('includes/header');	//Estilização CSS
        $this->load->view('v_login');
        $this->load->view('includes/footer');	//Ajax e JS FUNCTIONS

	}

	public function Logar_ajax()
	{
		$email = $this->input->post('txtEmail');
		$senha = $this->input->post('txtSenha');

		//instancio a model
		$this->load->model('M_login');

		//executo o metodo atribuindo pro $retorno
		$retorno = $this->M_login->validalogin($email, $senha);
		
		//Verifico se a autentificação foi validada
		if($retorno == 1){

			//Atribuo a variavel de sessão, usuario

		$_SESSION['email'] = $email;
		
		}else{
			//caso conrario, destruo a sessão
			unset($_SESSION['email']);
		}
	
		//retorno pra view a respota
		echo $retorno;
	}
}
