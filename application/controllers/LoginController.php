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

        $password = $_REQUEST['password'];
        $user_name = $_REQUEST['user_name'];

        if (is_numeric($user_name))
            $result = $this->login_model->get_user($user_name);
        else
        $result = $this->login_model->get_user(null,$user_name);

        if ( isset($result))
            if ($result && password_verify($password,$result->password)){
                $this->session->set_userdata(array(
                    'user_name' => $result->user_name
                ));
                return $this->ingreso();  
            } 
        $data = [ 'error' => 'Verifique usuario, contraseña y vuelva a intentar'];
        $this->load->view('index/header');
        $this->load->view('index/navBar/navBar');
        $this->load->view('login/login',$data);
        $this->load->view('index/footer'); 
        

    }

    public function ingreso(){
        $this->load->view('index/header');
        $this->load->view('index/navBar/navBarGrocery');
        $this->load->view('index/footer'); 
    }

    public function logout(){
        session_destroy();
        return $this->index();
    }

    public function registro() {
        $this->load->view('index/header');
        $this->load->view('index/navBar/navBar');
        $this->load->view('registro/nuevo_usuario');
        $this->load->view('index/footer'); 
    }

    public function registroVerificar(){
        $cuit = str_replace("-", "", $_REQUEST['cuit']);
        $user_name = $_REQUEST['user_name'];
        $password = password_hash( $_REQUEST['password'], PASSWORD_BCRYPT);

        $usuario = [
            'cuit' => $cuit,
            'user_name' => $user_name
        ];


        $existe = $this->login_model->get_user($cuit);
      

        $error = [];
        $tipo = [];

        if (isset($existe)) {
            array_push($error, "El CUIT ingresado ya se encuentra registrado.");
            array_push($tipo, 1);
        }

        $existe = $this->login_model->get_user(null, $user_name);
   

        if (isset($existe)) {
            array_push($error, "El USUARIO ingresado ya se encuentra registrado.");  
            array_push($tipo, 2);          
        }

        if (count($error) > 0){
            $data['error'] = $error;
            $data['usuario'] = $usuario;
            $data['tipo'] = $tipo;
            $this->load->view('index/header');
            $this->load->view('index/navBar/navBar');
            $this->load->view('registro/nuevo_usuario',$data);
            $this->load->view('index/footer');
        } else {
            $result = $this->login_model->insert_new_user($cuit , $user_name, $password);
            if ($result > 0)
                return $this->index();
            else {
                array_push($error, "Hubo un error al registrar usuario. Por favor vuelva a intentarlo mas tarde.");
                array_push($tipo, 3);
                $this->load->view('index/header');
                $this->load->view('index/navBar/navBar');
                $this->load->view('registro/nuevo_usuario',$data);
                $this->load->view('index/footer');

            }
        }



    }
}
