<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class FiltrosController extends CI_Controller {

    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('tags_model');
    }

    public function cargar_vista(){

        $filtros = $this->tags_model->get_tags_list();

        $data = ['filtros' => $filtros];

        $this->load->view('index/header');
        $this->load->view('index/navBar/navBarGrocery');
        $this->load->view('filtros_tags/filtros_tags',$data);
        $this->load->view('index/footer');
    }

    public function filtros_selected(){
        $valores = $this->input->post();
        // $this->session->set_flashdata('filtro_busqueda',$valores);
        
        $_SESSION['filtro_busqueda'] = $valores;
        $this->session->set_userdata( array (
            'filtro_busqueda' => $valores
        ));

        $tabla = $this->session->table;

     redirect("examples/tabla_{$tabla}");
         
    }

}

