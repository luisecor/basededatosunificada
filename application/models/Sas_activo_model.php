<?php

class Sas_activo_model  extends CI_Model {
    
    public function get_all_data_from_cuit($cuit){
        $query = $this->db  ->where('cuit',$cuit)
                            ->get('sas_activo');
        return $query->result();

    }

}


