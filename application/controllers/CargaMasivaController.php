<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class CargaMasivaController extends CI_Controller {

    public function __construct()	{
		parent::__construct();
        $this->load->model('tags_model');
    }

    public function index(){
        $this->load->view('index/header');
        $this->load->view('index/navBar/navBarGrocery');
        $this->load->view('cargaMasiva/guia');
        $this->load->view('index/footer');
    }

    public function gabinete(){
        $data['tabla'] = "GABINETE";
        $this->load->view('index/header');
        $this->load->view('index/navBar/navBarGrocery');
        $this->load->view('cargaMasiva/gabinete',$data);
        $this->load->view('index/footer');
    }

    public function importarCSVaDB(){

        $config['upload_path']          = './assets/uploads/files';
        $config['allowed_types']        = 'csv';
        $config['max_size']             = 2048;


        $this->load->library('upload', $config);


        if ( !$this->upload->do_upload('file'))
                {   
                        echo "HAY ERRORES";
                        $data['error'] = $this->upload->display_errors();
                        $data['tabla'] = $_REQUEST['tabla'];
                        return print_r( $data['error']);
                        // $this->load->view('index/header');
                        // $this->load->view('index/navBar/navBarGrocery');
                        // $this->load->view('cargaMasiva/gabinete',$data);
                        // $this->load->view('index/footer');
                }
                else
                {
                    echo "NO HAY ERRORES";
                        $data['tabla'] = $_REQUEST['tabla'];
                        $data['input'] = $this->upload->data();

                        $file = fopen($data['input']['full_path'],"r");

                        $i = 1;             // Comienzo de lectura->fila = 1
                        $csvArr = array();  // Array que contiene datos del archivo leido
                                            // maximo de 1Mill de filas, separado por ,
                        while ( ($filedata = fgetcsv($file , 1000000, ",")) !== FALSE ){
                           

                            if ($i >= 2){
                                                    // Columna 0 -> 1er
                                $csvArr[$i]['cuit'] = $filedata[0];
                                $csvArr[$i]['nombre'] = $filedata[1];
                                $csvArr[$i]['apellido'] = $filedata[2];
                                $csvArr[$i]['direccion'] = $filedata[3];
                            }
                            $i++;
                        }


                        fclose($file);

                        $tabla = strtolower( $_REQUEST['tabla']);
                        $existe = false;
                        $models = [
                            'gabinete' => 'gabinete_model'
                        ];

                        foreach($models as $k=>$v){
                            if ($k === $tabla){
                                $model = $v ; $this->load->model($v);
                                $existe = true;
                                break;
                            }
                        }

                        if ($existe){

                            $count = 0;
                            $udpdated = 0;
                            $errors = array();
    
                            foreach($csvArr as $registro){
                                $registroDB = $this->$model->get($registro , $tabla);
                                echo " Existe?  <br>";
                                var_dump($registroDB);

                                if (isset($registroDB)){
                                    //El regisstro existe en la tabla -> Se modifica
                                    if ( ($query = $this->$model->update($registro, $tabla)))
                                        $udpdated++;
                                    else
                                        $error = $query->error(); // Error al Updatear
                                } else {
                                    //El registro NO EXISTE en la tabla -> se agrega
                                    if ( ($query = $this->$model->insert($registro, $tabla))) 
                                        $count++;
                                    else
                                        $error = $query->error(); // Error al Insertar
                                }

                            }

                            if (isset($errors) && count($errors) > 0){
                                echo "ERROR DE QUERY <br>";
                                foreach ($error as $error) {
                                    echo "{$error} <br>";
                                }
                            }
                                



                        } else {
                            $data['error'] = 'No existe el MODELO para la tabla solicitada.';
                        }

                       



                        // $this->load->view('index/header');
                        // $this->load->view('index/navBar/navBarGrocery');
                        // $this->load->view('cargaMasiva/gabinete',$data);
                        // $this->load->view('index/footer');
                }


        

    }

    public function tags_main(){
      $tag_list = $this->tags_model->get_tags_list();
     // $this->load->view();

    }

}