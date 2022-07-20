<?php

class Gabinete_model extends CI_Model {

    

    public function get($registro, $tabla){
        $query = $this->db->query("SELECT * FROM {$tabla} WHERE cuit LIKE '{$registro['cuit']}' ");
        return $query->row();
    }

    public function update($registro , $tabla){
        try {
           $returnable = $this->db->update($tabla,$registro, array('cuit' => $registro['cuit']));
        } catch (\Throwable $th) {
           $returnable = $this->db->_error_message();
        }
       return $retornable ;
    }

    public function insert($registro, $tabla){
        try {
            $returnable = $this->db->insert($tabla, $registro);
        } catch (\Throwable $th) {
            $returnable = $this->db->_error_message();
        }
        return $returnable;
    }

    
}