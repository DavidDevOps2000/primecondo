<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visitantes extends CI_Controller {
    
    public function index(){

        $this->load->view('includes/header');//carregar o cabeçalho
        $this->load->view('v_visitantes');//carrega o corpo da tela
        $this->load->view('includes/footer');//carrega rodapé da tela
    }

    public function cadastrarVisitantes(){
        //carregando as variáveis do que foi mandado via post
        $nomeVisitante = $this->input->post('valorNomeVisitante');
        $duracaoDias = $this->input->post('valorDuracaoDias');


        
        //Instancio a model m_visitantes
        $this->load->model('m_visitantes');

        //solicito a execução do método validalogin passando os
        //atributos necessários, e atribuindo a $retorno
        
        $retorno = $this->m_visitantes->cadastrarVisitantes($nomeVisitante, $duracaoDias);

        echo $retorno;

    }






    public function listar(){
        //Instancio a Model - m_visitantes
        $this->load->model('m_visitantes');

        //Solicito a execução do método consultar
        $retorno = $this->m_visitantes->consultar();

        echo json_encode($retorno->result());
    }


    public function consulAlterVisi(){
        $nomeVisitante = $this->input->post('usuario');

        $this->load->model('m_visitantes');

        $retorno = $this->m_visitantes->consulAlterVisi($nomeVisitante);

        echo json_encode($retorno->result());
    }

    public function alterar(){
        $nomeVisitante = $this->input->post('usuario');
        $senha = $this->input->post('senha');
        $tipo = $this->input->post('tipo');

        $this->load->model('m_visitantes');

        $retorno = $this->m_visitantes->alterar($nomeVisitante, $senha, $tipo);
        echo $retorno;
    }

    public function desativar(){
        $nomeVisitante = $this->input->post('usuario');

        $sessao = $this->session->userdata('usuario');

        if($nomeVisitante == $sessao){

         echo 2;

        }else{
            $this->load->model('m_visitantes');
            $retorno = $this->m_visitantes->desativar($nomeVisitante,$sessao);

            echo $retorno;
         }

    }

    public function verusu(){
        $nomeVisitante = $this->input->post('usuario');

        $this->load->model('m_visitantes');

        $retorno = $this->m_visitantes->verusu($nomeVisitante);
        
        echo $retorno;
    }



    public function reativar(){
        //Carregando a variavél que foi mandada via POST
        $nomeVisitante = $this->input->post('usuario');


        //Instancio a Model - m_visitantes
        $this->load->model('m_visitantes');

        //Solicito a execuçao do método consulAlterVisi passando o
        //atributo necessário, e atribuindo a $retorno

        $retorno = $this->m_visitantes->reativar($nomeVisitante);

        echo $retorno;


    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }
}

?>

