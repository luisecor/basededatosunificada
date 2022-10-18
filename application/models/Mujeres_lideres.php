<?php

class Mujeres_lideres extends CI_Model {

public function get_cuit_list(){
    $this->db   ->select('cuit , apellido_nombre')
                ->order_by('apellido_nombre','ASC');
    $query = $this->db->get('mujeres_lideres');
    return $query->result();
}
   
}