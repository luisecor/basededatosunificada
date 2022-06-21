<?php

class Login_model extends CI_Model {

    public $cuit;
    public $user_name;
    public $password;

    public function get_user($cuit = null, $user_name = null){ 
       var_dump($cuit);

    if ($cuit ==  null ){
        // $query = $this->db->query('SELECT cuit, nombre, apellido FROM sas_activo WHERE cuit = '. $id .'');
        $query = $this->db->query('SELECT * FROM base_unificada_users WHERE cuit = 20350716271');
        return $query->row();
    } else{
        $query = $this->db->query('SELECT * FROM base_unificada_users WHERE cuit = '.$cuit.'');
        return $query->row();
    }


    }
}