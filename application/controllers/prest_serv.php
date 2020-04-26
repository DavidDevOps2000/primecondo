<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class prest_serv extends CI_Controller {
    
    public function index(){

        $this->load->view('includes/header');//carregar o cabeçalho
        $this->load->view('includes/menu');//carregar o menu
        $this->load->view('v_prest_serv');//carrega o corpo da tela
        $this->load->view('includes/footer');//carrega rodapé da tela
    }

    public function listar(){
        //Instancio a Model - m_prest_serv
        $this->load->model('m_prest_serv');

        //Solicito a execução do método consultar
        $retorno = $this->m_prest_serv->consultar();

        echo json_encode($retorno->result());
    }

    public function cadastrar(){
        //carregando as variáveis do que foi mandado via post
        $email = $this->input->post('email');
        $senha = $this->input->post('senha');
        $tipo = $this->input->post('cmb-tipo');


        //Instancio a model m_prest_serv
        $this->load->model('m_prest_serv');

        //solicito a execução do método validalogin passando os
        //atributos necessários, e atribuindo a $retorno
        
        $retorno = $this->m_prest_serv->cadastrar($email, $senha);

        echo $retorno;
    }

    public function consalterar(){/* Verificar essa funcção*/
        $usuario = $this->input->post('usuario');

        $this->load->model('m_prest_serv');

        $retorno = $this->m_prest_serv->consalterar($usuario);

        echo json_encode($retorno->result());
    }

    public function alterar(){
        $usuario = $this->input->post('usuario');
        $senha = $this->input->post('senha');
        $tipo = $this->input->post('tipo');

        $this->load->model('m_usuario');

        $retorno = $this->m_usuario->alterar($usuario, $senha, $tipo);
        echo $retorno;
    }

    public function desativar(){
        $usuario = $this->input->post('usuario');

        $sessao = $this->session->userdata('usuario');

        if($usuario == $sessao){

         echo 2;

        }else{
            $this->load->model('m_usuario');
            $retorno = $this->m_usuario->desativar($usuario,$sessao);

            echo $retorno;
         }

    }

    public function verusu(){
        $usuario = $this->input->post('usuario');

        $this->load->model('m_usuario');

        $retorno = $this->m_usuario->verusu($usuario);
        
        echo $retorno;
    }



    public function reativar(){
        //Carregando a variavél que foi mandada via POST
        $usuario = $this->input->post('usuario');


        //Instancio a Model - m_usuario
        $this->load->model('m_usuario');

        //Solicito a execuçao do método consalterar passando o
        //atributo necessário, e atribuindo a $retorno

        $retorno = $this->m_usuario->reativar($usuario);

        echo $retorno;


    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }
}

?>