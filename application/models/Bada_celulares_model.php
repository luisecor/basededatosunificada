<?php

class Bada_celulares_model  extends CI_Model {
    
    public function get_all_data_from_cuit($cuit){
        $query = $this->db  ->where('cuit',$cuit)
                            ->get('bada_celulares');
        return $query->result();

    }

    public function ger_person_by_cuit($cuit){

    }

    public function existe_cuit($cuit) {
        $this->db   ->select('cuit')
                    ->where('cuit',$cuit);
        $query = $this->db->get('bada_celulares');
        $result = $query->result_array();
        return empty( !$result);
    }

    public function update_datos_personales($cuit,$telefono,$mail){

        $array = array(
            'celular_flota_bu' => $telefono,
            'mail_bu' => $mail,
         );
    
        $this->db->where('cuit',$cuit);
        $this->db->update('bada_celulares',$array);

    }


    public function create_datos_personales($cuit,$telefono,$mail){


        $array = array(
            'cuit' => $cuit,
            'celular_bada_bu' => $telefono,
            'mail_bu' => $mail,
         );
    
        $this->db->insert('bada_celulares',$array);
    }

}