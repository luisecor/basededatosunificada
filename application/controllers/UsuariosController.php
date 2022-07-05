<?php
defined('BASEPATH') OR exit('No direct script access allowed');


trait UsuariosController   {


    public function verifySession(){
        
        return isset($this->session->user_name);
        
    }


}