<?php

class Observaciones_model extends CI_Model {


    public function insert($cuit_user, $user_name, $tabla, $cuit_tabla, $observacion){
        $data = [
            'tabla'         => $tabla,
            'cuit_user'     => $cuit_user,
            'user_name'     => $user_name,
            'cuit_tabla'    => $cuit_tabla,
            'observacion'   => $observacion            
        ];
        $this->db->insert('observaciones',$data);
        return $this->db->affected_rows();
    }

    public function get_cuit_list($tabla){
        if ($tabla == "mujeres_lideres"){
            $this->db   ->select('cuit , apellido_nombre')
                    ->order_by('apellido_nombre','ASC');
        } else {
            $this->db   ->select('cuit , apellido, nombre')
                    ->order_by('apellido','ASC');
        }
        
        $query = $this->db->get("{$tabla}");
        return $query->result();
    }

}