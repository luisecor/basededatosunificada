<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class FiltrosController extends CI_Controller {

    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('tags_model');
        $this->load->model('filtros_model');
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

    public function filtros_columnas(){

        $filtro_ = [];
        $columnas = [
            'ministerio' , 'secr', 'ss', 'dg', 'dop', 'gop', 'sgo' , 'dept', 'divi', 'secc'
        ];



        // $collection = $this->filtros_model->get_("ministerio");

        foreach ($columnas as $col){
            
            $collection = $this->filtros_model->get_("{$col}");
            $filtro_[$col] = array();

            foreach($collection as $collect){
                array_push($filtro_[$col], array_values($collect)[0]);
            }

        }
        
        foreach ($filtro_ as $filtro => $valor){
           echo "{$filtro} - > # ". count($valor) ." <br>"  ;
        }
            

        // var_dump( $filtro_);
    }

}

