<?php

class Bada_celulares_model  extends CI_Model {
    
    public function get_all_data_from_cuit($cuit){
        $query = $this->db  ->where('cuit',$cuit)
                            ->get('bada_celulares');
        return $query->result();

    }

}