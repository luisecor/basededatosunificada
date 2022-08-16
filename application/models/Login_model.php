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

    public function insert_new_user($cuit , $user_name, $password, $acceso_tabla = null, $rol = null){
       
        $data = [
            'cuit' => $cuit,
            'user_name' => $user_name,
            'password' => $password,
           // 'tipo_usuario' => $rol
        ];

        $this->db->insert('base_unificada_users',$data);
        $bienregistrado = $this->db->affected_rows();
        // if ($bienregistrado>0){
        //     if ($this->db   ->where('cuit',$cuit)
        //                     ->get('acceso_tabla')
        //                     ->result()){

        //         $this->db   ->update('acceso_tabla',
        //                     array(  'cuit' => $cuit , 
        //                             'tabla' =>$acceso_tabla));                
        //     }else {
        //         $this->db   ->insert('acceso_tabla',
        //                     array(  'cuit' => $cuit,
        //                             'tabla' => $acceso_tabla));
        //     }
        // }
            
        
            return $bienregistrado;
    }
}