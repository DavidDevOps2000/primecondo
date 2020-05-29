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
                    // Listo todos os meus Visitantes e jogo na lista do V_Visitantes
        $this->load->model('m_visitantes');

        $retorno = $this->m_visitantes->consultar();

        echo json_encode($retorno->result());
    }

    public function desativarVisi(){

        $nomeVisitante = $this->input->post('nomeVisitante');

        $this->load->model('m_visitantes');

        $retorno = $this->m_visitantes->desativarVisi($nomeVisitante);

        echo $retorno;
    }

    public function ativarVisi(){

        $nomeVisitante = $this->input->post('nomeVisitante');

        $this->load->model('m_visitantes');

        $retorno = $this->m_visitantes->ativarVisi($nomeVisitante);

        echo $retorno;

    }

    


    public function consultVisiToModel(){

        $nomeVisitante = $this->input->post('nomeVisitante');

        $this->load->model('m_visitantes');

        $retorno = $this->m_visitantes->consultVisiToModel($nomeVisitante);

        echo json_encode($retorno->result());
    }


    public function alterVisi(){
        $nomeVisitante = $this->input->post('nomeVisi');
        $duracaoDias = $this->input->post('maisDias');
        $novoNomeVisitante = $this->input->post('nomeNovoVisi');
        $novoStatus = $this->input->post('novoStatus');

        $this->load->model('m_visitantes');

        $retorno = $this->m_visitantes->alterVisi($nomeVisitante, $duracaoDias, $novoNomeVisitante, $novoStatus);

     
    }





    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }
}

?>

