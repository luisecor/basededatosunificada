<?php

class Logs_model extends CI_Model {



    public function insert_log_ingreso($cuit = null, $user_name = null){ 

        $data = [
            'cuit' => $cuit,
            'user_name' => $user_name
        ];

        $this->db->insert('log_ingresos',$data);
        return $this->db->affected_rows();
    }

    public function insert_log_accion($cuit = null , $tabla = null, $accion = null){

        $data = [
            'cuit' => $cuit,
            'tabla' => $tabla,
            'accion' => $accion
        ];

        $this->db->insert('log_movimiento',$data);
        return $this->db->affected_rows();
    }

    public function insert_new_user($cuit , $user_name, $password){
        $data = [
            'cuit' => $cuit,
            'user_name' => $user_name,
            'password' => $password
        ];
        $this->db->insert('base_unificada_users',$data);
        return $this->db->affected_rows();
    }
}