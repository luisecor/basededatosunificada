<?php

class Accionar_tag_mogel  extends CI_Model {
    
    public function get_actioned_tags($cuit){
        $query = $this->db  
                            ->select('id_tag')
                            ->where('cuit',$cuit)
                            ->get('accionar_tag');
        return $query->result_array();

    }

}