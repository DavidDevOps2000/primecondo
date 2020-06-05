<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index(){
        $this->load->view('includes/header');
        $this->load->view('v_home');
        $this->load->view('includes/footer');
    }

    
}