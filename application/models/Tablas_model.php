<?php

class Tablas_model extends CI_Model {



    public function get_table_name($table){
        
        $this->db   ->select('nombre_tabla')
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
                    ->where('nombre',$nombre);
        $query = $this->db->get("tablas");
        $result = $query->result_array();
        return empty( !$result);
    }

    public function get($registro, $tabla){
        $query = $this->db->query("SELECT * FROM {$tabla} WHERE cuit = '{$registro['cuit']}' ");
        return $query->row();
    }

    public function update($registro , $tabla){
        try {
           $returnable = $this->db->update($tabla,$registro, array('cuit' => $registro['cuit']));
        } catch (\Throwable $th) {
           $returnable = $this->db->_error_message();
        }
       return $returnable ;
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