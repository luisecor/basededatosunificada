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

    public function get_user_type($cuit = null){
        $query = $this->db->query("SELECT tipo_usuario FROM base_unificada_users WHERE cuit = {$cuit} ");
        return $query->row();
    }

    public function get_permisson_tables($cuit = null){
        $query = $this->db->query(
            "SELECT tb.nombre 
             FROM acceso_tabla ta 
             INNER JOIN tablas tb on ta.id_tabla=tb.id 
             WHERE cuit = {$cuit}");
        return $query->result_array();
    }

    public function insert_new_user($cuit , $user_name, $password, $acceso_tabla = null, $rol = null){
       
        $data = [
            'cuit' => $cuit,
            'user_name' => $user_name,
            'password' => $password,
        ];
       

        $this->db->insert('base_unificada_users',$data);
        $bienregistrado = $this->db->affected_rows();        
        return $bienregistrado;
    }
}