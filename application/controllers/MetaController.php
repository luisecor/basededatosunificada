<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class MetaController extends CI_Controller  {


    public function __constructor(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function jovenes(){
        $this->load->view('index/header');
        $this->load->view('index/navBar/navBar');
        $this->load->view('meta/jovenes_meta');
        $this->load->view('index/footer'); 
    }


}