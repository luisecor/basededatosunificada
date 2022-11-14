<?php

class Tablas_model extends CI_Model {



    public function get_table($table){
        
        $this->db   ->select('nombre')
                    ->where('nombre',$table);
        $query = $this->db->get("tablas");
        return $query->result();
    }

}