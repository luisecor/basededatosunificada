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

}