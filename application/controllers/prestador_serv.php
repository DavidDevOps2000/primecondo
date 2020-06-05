<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prestador_serv extends CI_Controller {
    
    public function index(){

        $this->load->view('includes/header');//carregar o cabeçalho
        $this->load->view('includes/menu');
        $this->load->view('v_prestador_serv');//carrega o corpo da tela
        $this->load->view('includes/footer');//carrega rodapé da tela
        
    }


    public function cadastrarPrestadores(){
        //carregando as variáveis do que foi mandado via post
        $nomePrestadores = $this->input->post('valorNomePrestadores');
        $duracaoDias = $this->input->post('valorDuracaoDias');
        
        //Instancio a model m_prestadores
        $this->load->model('m_prestadores');

        //solicito a execução do método validalogin passando os
        //atributos necessários, e atribuindo a $retorno
        
        $retorno = $this->m_prestadores->cadastrarPrestadores($nomePrestadores, $duracaoDias);

        echo $retorno;
    }

    public function listar(){   
                    // Listo todos os meus prestadores e jogo na lista do V_prestadores
        $this->load->model('m_prestadores');

        $retorno = $this->m_prestadores->consultar();

        echo json_encode($retorno->result());
    }


    public function consultPrestToModel(){

        $nomePrestadores = $this->input->post('nomeVisitante');

        $this->load->model('m_prestadores');

        $retorno = $this->m_prestadores->consultPrestadores($nomePrestadores);

        echo json_encode($retorno->result());//Devolvendo os dados via json, para o ajax na view pegar
    }


    public function alterPrest(){

        $nomePrestadores = $this->input->post('nomePrest');
        $duracaoDias = $this->input->post('maisDias');
        $novoNomePrest = $this->input->post('nomeNovoPrest');
        $novoStatus = $this->input->post('novoStatus');

        $this->load->model('m_prestadores');

        $retorno = $this->m_prestadores->alterVisi($nomePrestadores, $duracaoDias, $novoNomePrest, $novoStatus);

        echo $retorno;
    }


 

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }
}

?>

