<?php

class Filtros_model  extends CI_Model {
    

    public function get_($columna){
        $query = $this->db
                        ->distinct()
                        ->select("{$columna}")
                        ->order_by("{$columna}",'ASC')
                        ->where("{$columna} IS NOT NULL", NULL, false)
                        ->get('cuit_reparticion')
                        ;
        return $query->result_array();

    }

    public function hola(){
        echo "HOLA";
    }

    public function get_tag_name($id){

        $query = $this->db
                        ->select('nombre')
                        ->where('id',$id)
                        ->get('tags')
                        ;
        return $query->result_array();
    }

    public function get_tags_by_cuit($cuit){

        $query = $this->db
                        ->select('id_tag')
                        ->from('cuit_tag')
                        ->where('cuit',$cuit)
                        ->get();
        return $query->result_array();
    }

}