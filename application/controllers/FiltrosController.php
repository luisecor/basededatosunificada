<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class FiltrosController extends CI_Controller {

    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('tags_model');
        $this->load->model('filtros_model');
    }

    public function traer($tabla = null, $columna=null){
        if ( $tabla){
            echo json_encode ( $this->filtros_model->get_("{$columna}","{$tabla}"));
        } 
        else 
            echo json_encode ( ["NO DATA - Controller"] );
    }

    public function cargar_vista(){

        // $me = $this->filtros_model->get_("ministerio","Jefatura");


        $filtros = $this->tags_model->get_tags_list();

        $data = ['filtros' => $filtros];

        $this->load->view('index/header');
        $this->load->view('index/navBar/navBarGrocery');
        $this->load->view('filtros_tags/filtros_tags',$data);
        $this->load->view('index/footer');
    }

    public function filtros_selected(){
        $valores = $this->input->post();
        
        var_dump($valores);
        $query;
        foreach ($valores['filtro'] as $filtro){
            $nombre = $this->tags_model->get_tag_name($filtro);
           
           if (isset($query))
                $query = $query . " OR tag_list LIKE '%{$nombre[0]['nombre']}%'";
            else
                $query = "tag_list LIKE '%{$nombre[0]['nombre']}%'";

        }

        var_dump($query);
        $_SESSION['filtro_busqueda'] = $valores;
        $_SESSION['filtro_busqueda_query']=$query;
        
   
        $tabla = $this->session->table;


        if ($_SESSION['vista_'])
            redirect("vista/{$_SESSION['vista_']}");
          

     redirect("examples/tabla_{$tabla}");
         
    }

    public function filtros_col_selected(){

        $valores = $this->input->post();
        $query = [];

        foreach($valores as $columna => $valor){
            
           foreach($valor as $filtro){
            if ($columna !== "tag"){
                if (isset($query["{$columna}"]))
                    $query["{$columna}"] = $query["{$columna}"] . " OR {$columna} LIKE '{$filtro}'";
                else
                    $query["{$columna}"] = "{$columna} LIKE '{$filtro}'";
            }
            else {
                if (isset($query["{$columna}"]))
                    $query["{$columna}"] = $query["{$columna}"] . " OR {$columna}_list LIKE '%{$filtro}%'";
                else
                    $query["{$columna}"] = "{$columna}_list LIKE '%{$filtro}%'";
            }
            }
        }

        $concat_query;
        foreach ($query as $fild => $string){
            if (isset($concat_query))
                $concat_query = $concat_query . " AND ({$string})";
            else
                $concat_query = "({$string})";
        }


        $tabla = $this->session->table;

        $_SESSION['filtro_col'] = $concat_query;
        $_SESSION['filtro_col_selected'] = $valores;
        
        if ($_SESSION['vista_'])
            redirect("vista/{$_SESSION['vista_']}");
          

        redirect("examples/tabla_{$tabla}");
            
                
        


    }

 

}

