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

	public function Logar()
	{
		$apelido = $this->input->post('txtApelido');
		$senha = $this->input->post('txtSenha');

		//instancio a model
		$this->load->model('M_login');

		//executo o metodo atribuindo pro $retorno
		$retorno = $this->M_login->validalogin($apelido, $senha);
		
		//Verifico se a autentificação foi validada
		if($retorno == 1){

			//Atribuo a variavel de sessão, usuario

		$_SESSION['apelido'] = $apelido;
		
		}else{
			//caso conrario, destruo a sessão
			unset($_SESSION['apelido']);
		}
	
		//retorno pra view a respota
		echo $retorno;
	}
}
