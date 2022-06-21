<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class LoginController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('login_model');
    }
    

	public function index()
	{
        $this->load->view('index/header');
        $this->load->view('index/navBar/navBar');
        $this->load->view('login/login');
        $this->load->view('index/footer');
        
	}

    public function confirm(){
        // var_dump($_REQUEST['user_name']);
        // var_dump($_REQUEST['password']);
        // var_dump(isset($_REQUEST['sesion_abierta']));

        $password = $_REQUEST['password'];
        $user_name = $_REQUEST['user_name'];
        echo "<br> user name";
        var_dump($user_name);
        $result = $this->login_model->get_user($user_name);
        echo "<br> resultado";
        if ($result){
            var_dump ($this->session->userdata);
            echo    " aca esta el resultado de session <br>";
            var_dump(  password_verify($password,$result->password) );
            $this->session->set_userdata(array(
                'user_name' => $result->user_name
            ));
            
            echo $this->session->user_name;
            session_destroy();
        } else
            echo "<br> NO EXISTE";
        

    }

    public function otra(){
        $this->load->view('index/header');
        // $this->load->view('index/navBar/navBar');
        // $this->load->view('login/login');
        $this->load->view('index/footer'); 
    }
}
