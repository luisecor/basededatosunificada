<?php

class Filtros_model  extends CI_Model {
    

    public function get_($columna, $tabla){

        $tablas = [
            'mujeres_lideres'   =>  'mujeres_lideres_view',
            'sas_activo'        =>  'sas_activo'
        ];
        

            $tabla_selected = $tablas[$tabla];
            $response = array();
            if (isset($columna)){
                if ($columna !== "tag"){
                    if ($tablas[$tabla] !== "sas_activo"){
                            $query = $this->db
                                                ->distinct()
                                                ->select("{$columna}")
                                                ->where("{$columna} IS NOT NULL")
                                                ->get("{$tabla_selected}");                
                            $records = $query->result();
                    } 
                    else
                    if ($columna == "documento") {
                        $query = $this->db
                                                ->distinct()
                                                ->select("nro_documento AS documento")
                                                ->where("nro_documento IS NOT NULL")
                                                ->limit(100)
                                                ->get("sas_activo");
                        $records = $query->result();
                    } 
                    else{ 
                        if ($columna == "apellido" || $columna == "nombre")
                        { 
                            $query = $this->db
                                                ->distinct()
                                                ->select("{$columna}")
                                                ->where("{$columna} IS NOT NULL")
                                                ->limit(100)
                                                ->get("sas_activo");
                            $records = $query->result();
                         
                        } else {
                            $query = $this->db
                                                    ->distinct()
                                                    ->select("{$columna}")
                                                    ->where("{$columna} IS NOT NULL")
                                                    // ->limit(1000)
                                                    ->get("cuit_reparticion");                
                            $records = $query->result();

                        }
                        
                    }         
            } else {
                $query = $this->db
                                                ->distinct()
                                                ->select("nombre as tag")
                                                ->where("nombre IS NOT NULL")
                                                ->get("tags");                
                            $records = $query->result();

            }
            foreach ($records as $row)
            { 
                $response[] = array($row->$columna);
            }
        }
        else 
            $response = ["NO DATA - Filtro MODEL"];
       
        return $response;

    }

    public function buscar($tabla = null,$columna = null, $term = null){

        $tablas = [
            'mujeres_lideres'   =>  'mujeres_lideres_view',
            'sas_activo'        =>  'sas_activo'
        ];
        

            $tabla_selected = $tablas[$tabla];
            $response = array();
            if (isset($columna)){
                if ($columna !== "tag"){
                    if ($tablas[$tabla] !== "sas_activo"){
                            $query = $this->db
                                                ->distinct()
                                                ->select("{$columna}")
                                                ->where("{$columna} LIKE '%{$term}%'")
                                                ->get("{$tabla_selected}");                
                            $records = $query->result();
                    } 
                    else
                    if ($columna == "documento") {
                        $query = $this->db
                                                ->distinct()
                                                ->select("nro_documento AS documento")
                                                ->where("nro_documento LIKE '%{$term}%'")
                                                ->limit(100)
                                                ->get("sas_activo");
                        $records = $query->result();
                    } 
                    else{ 
                        if ($columna == "apellido" || $columna == "nombre")
                        { 
                            $query = $this->db
                                                ->distinct()
                                                ->select("{$columna}")
                                                ->where("{$columna} LIKE '%{$term}%'")
                                                ->limit(100)
                                                ->get("sas_activo");
                            $records = $query->result();
                         
                        } else {
                            $query = $this->db
                                                    ->distinct()
                                                    ->select("{$columna}")
                                                    ->where("{$columna} LIKE '%{$term}%'")
                                                    // ->limit(1000)
                                                    ->get("cuit_reparticion");                
                            $records = $query->result();

                        }
                        
                    }         
            } else {
                $query = $this->db
                                                ->distinct()
                                                ->select("nombre as tag")
                                                ->where("nombre LIKE '%{$term}%'")
                                                ->get("tags");                
                            $records = $query->result();

            }
            foreach ($records as $row)
            { 
                $response[] = array($row->$columna);
            }
        }
        else 
            $response = ["NO DATA - Filtro MODEL"];
       
        return $response;

    }



    public function get_tag_name($id){

        $query = $this->db
                        ->select('nombre')
                        ->where('id',$id)
                        ->get('tags')
                        ;
        return $query->result_array();
    }

    public function get_tags_by_cuit($cuit){

        $query = $this->db
                        ->select('id_tag')
                        ->from('cuit_tag')
                        ->where('cuit',$cuit)
                        ->get();
        return $query->result_array();
    }


}