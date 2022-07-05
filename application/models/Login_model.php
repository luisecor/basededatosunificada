<?php

class Login_model extends CI_Model {

    public $cuit;
    public $user_name;
    public $password;

    public function get_user($cuit = null, $user_name = null){ 

        if ($cuit ==  null ){
            $query = $this->db->query('SELECT * FROM base_unificada_users WHERE user_name LIKE "' . $user_name . '"');
        } else{
            $query = $this->db->query('SELECT * FROM base_unificada_users WHERE cuit = '.$cuit.'');
        }
        return $query->row();
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