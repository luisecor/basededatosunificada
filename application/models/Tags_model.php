<?php

class Tags_model  extends CI_Model {
    
    public function get_tags_list(){
        $query = $this->db
                        ->order_by('id','ASC')
                        ->get('tags')
                        ;
        return $query->result_array();

    }

    public function hola(){
        echo "HOLA";
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

    public function get_tags_name(){
        $query = $this->db
                        ->select('nombre , id')
                        ->get('tags')
                        ;
        return $query->result_array();
    }

    public function get_id_by_tag_name($name){
        $query = $this->db
                        ->select('id')
                        ->from('tags')
                        ->where('nombre',$name)
                        ->get();
        return $query->result_array();
    }

    public function delete_tags_from_cuit($cuit, $tags){
        foreach ($tags as  $tag){
            $id = $this->get_id_by_tag_name($tag)[0]['id'];
            if(!is_null($id)){
               
                $this->db->delete('cuit_tag', array('cuit' => $cuit, 'id_tag' => $id));
            }
        }
    }

    public function delete_cuit_from_tags($cuit){
        $this->db->delete('cuit_tag',array('cuit' => $cuit));
    }

    public function add_tags_to_cuit($cuit,$tags){
        foreach($tags as $tag){
            var_dump($tag);
            $id = $this->get_id_by_tag_name($tag)[0]['id'];
            if(!is_null($id)){
                $this->db->query("INSERT INTO  `cuit_tag` (`id_relacion`, `cuit`, `id_tag`, `created_at`) VALUES (NULL, '{$cuit}', '{$id}', CURRENT_TIMESTAMP) ");
               
            }
        }
    }

    public function get($registro){
        $this->db
            ->select('cuit, id_tag')
            ->from('cuit_tag')
            ->where('cuit',$registro['cuit']);
        return $this->db->get()->result_array();
    }

    public function get_cuit_by_tagID($registro,$tagID){
        $this->db
            ->select('cuit, id_tag')
            ->from('cuit_tag')
            ->where('cuit',$registro['cuit'])
            ->where('id_tag', $tagID);
        return $this->db->get()->row();
    }

    public function update($registro){
        try {
           $returnable = $this->db->update('cuit_tag',$registro, array('cuit' => $registro['cuit']));
        } catch (\Throwable $th) {
           $returnable = $this->db->_error_message();
        }
       return $returnable ;
    }

    public function insert($registro){
        try {
            $returnable = $this->db->insert('cuit_tag', $registro);
        } catch (\Throwable $th) {
            $returnable = $this->db->_error_message();
        }
        return $returnable;
    }
}