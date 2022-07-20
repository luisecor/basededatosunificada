<?php

class User_model extends CI_Model {



    public function get_access($cuit){ 
        $query = $this->db->select('tabla')->where('cuit' , $cuit)->get('acceso_tabla');

    //    $query = $this->db->get_where('acceso_tabla',array( 'cuit'=> $cuit));
        return $query->result();

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