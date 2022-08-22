<?php

class Tags_model  extends CI_Model {
    
    public function get_tags_list(){
        $query = $this->db
                        ->order_by('id','ASC')
                        ->get('tags')
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