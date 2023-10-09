<?php

class User_model extends CI_Model {



    public function get_access_table($cuit){ 
        $query = $this->db  ->select('nombre')
                            ->from('acceso_tabla')
                            ->where("acceso_tabla.cuit = {$cuit}")
                            ->join('tablas','tablas.id = acceso_tabla.id_tabla')
                            ->get();
        $results = $query->result_array();
        return $results;

    }

    public function get_access_view($cuit){ 
        $query = $this->db  ->select('nombre')
                            ->from('acceso_vista')
                            ->where("acceso_vista.cuit = {$cuit}")
                            ->join('vistas','vistas.id = acceso_vista.id_vista')
                            ->get();
        $results = $query->result_array();
        return $results;

    }

    public function get_permission_user($cuit){
        $query = $this->db  ->select('tipo_usuario')
                            ->from('base_unificada_users')
                            ->where('cuit',$cuit)
                            ->get();
        $results = $query->result_array();
        if (empty($results))
            return null;
        else
            return $results[0]['tipo_usuario'];
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

    public function update_user_data($cuit ,  $password = NULL){
        
        $data = [];
      
        if (isset($password)) $data['password'] = $password;

        $this->db->update('base_unificada_users', $data , "cuit = {$cuit}");
        return $this->db->affected_rows();

    }
}