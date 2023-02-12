<?php

class Tablas_model extends CI_Model {



    public function get_table($table){
        
        $this->db   ->select('nombre')
                    ->where('nombre',$table);
        $query = $this->db->get("tablas");
        return $query->result();
    }

    public function get_tables(){
        
        $this->db   ->select('nombre , nombre_tabla');
        $query = $this->db->get("tablas");
        return $query->result_array();
    }

    public function existe_tabla_nombre($nombre){        
        $this->db   ->select('nombre_tabla')
                    ->where('nombre_tabla',$nombre);
        $query = $this->db->get("tablas");
        $result = $query->result_array();
        return isset($result);
    }

}