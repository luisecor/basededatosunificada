<?php

class User_model extends CI_Model {



    public function get_access($cuit){ 
        $query = $this->db  ->select('nombre')
                            ->from('acceso_tabla')
                            ->where("acceso_tabla.cuit = {$cuit}")
                            ->join('tablas','tablas.id = acceso_tabla.id_tabla')
                            ->get();
        $results = $query->result_array();
        return $results;

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

    public function update_user_data($cuit , $user_name = NULL, $password = NULL){
        
        $data = [];
        if (isset($user_name)) $data['user_name'] = $user_name;
        if (isset($password)) $data['password'] = $user_name;

        $this->db->update('base_unificada_users', $data , "cuit = {$cuit}");
        return $this->db->affected_rows();

    }
}