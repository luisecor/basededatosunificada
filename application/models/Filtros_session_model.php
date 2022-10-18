<?php

class Filtros_session_model  extends CI_Model {
    
    public function get_filters($cuit){
        $query = $this->db  ->select('nombre')
                            ->from('cuit_filtro_tag')
                            ->where("cuit_filtro_tag.cuit = {$cuit}")
                            ->join('tags','tags.id = cuit_filtro_tag.id_tag')
                            ->get();
        $results = $query->result_array();
        return $results;

    }

}