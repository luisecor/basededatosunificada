<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class CargaMasivaController extends CI_Controller {

    public function __construct()	{
		parent::__construct();
        $this->load->model('tags_model');
        $this->load->model('tablas_model');
        $this->load->model('tags_model');
    }

    public function index(){
        $this->load->view('index/header');
        $this->load->view('index/navBar/navBarGrocery');
        $this->load->view('cargaMasiva/guia');
        $this->load->view('index/footer');
    }

    public function form_tabla(){
        $tableList = $this->tablas_model->get_tables();
        $data['tableList'] = $tableList;
        $this->load->view('index/header');
        $this->load->view('index/navBar/navBarGrocery');
        $this->load->view('cargaMasiva/tablas',$data);
        $this->load->view('index/footer');
    }

    public function form_tag(){
        $tag_list = $this->tags_model->get_tags_name();
        $data['tagsList'] = $tag_list;
        $this->load->view('index/header');
        $this->load->view('index/navBar/navBarGrocery');
        $this->load->view('cargaMasiva/cargaMasivaTags',$data);
        $this->load->view('index/footer');
    }

    public function importarCSVaDB(){

        $config['upload_path']          = './assets/uploads/files';
        $config['allowed_types']        = 'csv';
        $config['max_size']             = 2048;


        $this->load->library('upload', $config);


        if ( !$this->upload->do_upload('file'))
                {   
                        // echo "HAY ERRORES";
                        $valueSelected = $this->input->get(array('importData'), TRUE);
                        // var_dump($valueSelected);
                        $data['error'] = $this->upload->display_errors();
                        $data['tabla'] = $valueSelected;
                        return print_r( $data['error']);
                        $tableList = $this->tablas_model->get_tables();
                        $data['tableList'] = $tableList;
                        $this->load->view('index/header');
                        $this->load->view('index/navBar/navBarGrocery');
                        $this->load->view('cargaMasiva/tablas',$data);
                        $this->load->view('index/footer');
                }
                else
                {
                    // echo "NO HAY ERRORES";
                    $valueSelected = $this->input->post(array('importData'));
                        $data['tabla'] = $valueSelected;
                        // var_dump($valueSelected['importData']);
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
                                // $csvArr[$i]['direccion'] = $filedata[3];
                            }
                            $i++;
                        }


                        fclose($file);

                        $tabla = $valueSelected['importData'];
                        $existe = false;
                        $models = [
                            'gabinete' => 'gabinete_model'
                        ];
                        $existe = $this->tablas_model->existe_tabla_nombre("Lucho");
                        // var_dump($existe);

                        // foreach($models as $k=>$v){
                        //     if ($k === $tabla){
                        //         $model = $v ; $this->load->model($v);
                        //         $existe = true;
                        //         break;
                        //     }
                        // }

                        if ($existe){

                            $count = 0;
                            $udpdated = 0;
                            $errors = array();
    
                            foreach($csvArr as $registro){
                                $registroDB = $this->tablas_model->get($registro , $tabla);
                               

                                if (isset($registroDB)){
                                    //El regisstro existe en la tabla -> Se modifica
                                    if ( ($query = $this->tablas_model->update($registro, $tabla))){
                                        $udpdated++;
                                        // echo " Existe?  <br>";
                                        // var_dump($registroDB);
                                    }
                                    else{ 
                                        $error = $query->error(); // Error al Updatear
                                        array_push($errors, $error);
                                    }
                                } else {
                                    //El registro NO EXISTE en la tabla -> se agrega
                                    if ( ($query = $this->tablas_model->insert($registro, $tabla))) 
                                        $count++;
                                    else{
                                        $error = $query->error(); // Error al Insertar
                                        array_push($errors, $error);
                                    }
                                }

                            }

                            // if (isset($errors) && count($errors) > 0){
                            //     echo "ERROR DE QUERY <br>";
                            //     foreach ($error as $error) {
                            //         echo "{$error} <br>";
                            //     }
                            //     $data['error'] = "TODO BIEN?";
                            // }
                                
                            $data['mensaje'] = 'Registros nuevos : ' . $count . '<br>
                                                Registros actualizados : ' . $udpdated . '<br>
                                                Registos totales : ' . $count + $udpdated . '<br>
                                                Tabla actualizada : ' .$tabla;


                        } else {
                            $data['mensaje'] = 'No existe la tabla sobra la cual quiere accionar.';
                        }

                       


                        $tableList = $this->tablas_model->get_tables();
                        $data['tableList'] = $tableList;
                        $this->load->view('index/header');
                        $this->load->view('index/navBar/navBarGrocery');
                        $this->load->view('cargaMasiva\tablas.php',$data);
                        $this->load->view('index/footer');
                }


        

    }

    public function importarTAGCSVaDB(){

        $config['upload_path']          = './assets/uploads/files';
        $config['allowed_types']        = 'csv';
        $config['max_size']             = 2048;


        $this->load->library('upload', $config);
        $valueSelected = $this->input->get(array('luchoinput'));
       // var_dump($valueSelected);

        if ( !$this->upload->do_upload('file'))
                {   
                        //echo "HAY ERRORES";
                        $valueSelected = $this->input->get(array('valueSeleted'), TRUE);
                        // var_dump($valueSelected);
                        $data['error'] = $this->upload->display_errors();
                        $data['tagID'] = $valueSelected;
                       // return print_r( $data['error']);
                        $tag_list = $this->tags_model->get_tags_name();
                        $data['tagsList'] = $tag_list;
                        $this->load->view('index/header');
                        $this->load->view('index/navBar/navBarGrocery');
                        $this->load->view('cargaMasiva/cargaMasivaTags',$data);
                        $this->load->view('index/footer');
                }
    //             else
    //             {
    //                 // echo "NO HAY ERRORES";
    //                 $valueSelected = $this->input->post(array('valueSeleted'));
    //                     $data['tabla'] = $valueSelected;
    //                     // var_dump($valueSelected['valueSeleted']);
    //                     $data['input'] = $this->upload->data();

    //                     $file = fopen($data['input']['full_path'],"r");

    //                     $i = 1;             // Comienzo de lectura->fila = 1
    //                     $csvArr = array();  // Array que contiene datos del archivo leido
    //                                         // maximo de 1Mill de filas, separado por ,
    //                     while ( ($filedata = fgetcsv($file , 1000000, ",")) !== FALSE ){
                           

    //                         if ($i >= 2){
    //                                                 // Columna 0 -> 1er
    //                             $csvArr[$i]['cuit'] = $filedata[0];
    //                             $csvArr[$i]['nombre'] = $filedata[1];
    //                             $csvArr[$i]['apellido'] = $filedata[2];
    //                             // $csvArr[$i]['direccion'] = $filedata[3];
    //                         }
    //                         $i++;
    //                     }


    //                     fclose($file);

    //                     $tabla = $valueSelected['importData'];
    //                     $existe = false;
    //                     $models = [
    //                         'gabinete' => 'gabinete_model'
    //                     ];
    //                     $existe = $this->tablas_model->existe_tabla_nombre("Lucho");
    //                     // var_dump($existe);

    //                     // foreach($models as $k=>$v){
    //                     //     if ($k === $tabla){
    //                     //         $model = $v ; $this->load->model($v);
    //                     //         $existe = true;
    //                     //         break;
    //                     //     }
    //                     // }

    //                     if ($existe){

    //                         $count = 0;
    //                         $udpdated = 0;
    //                         $errors = array();
    
    //                         foreach($csvArr as $registro){
    //                             $registroDB = $this->tablas_model->get($registro , $tabla);
                               

    //                             if (isset($registroDB)){
    //                                 //El regisstro existe en la tabla -> Se modifica
    //                                 if ( ($query = $this->tablas_model->update($registro, $tabla))){
    //                                     $udpdated++;
    //                                     // echo " Existe?  <br>";
    //                                     // var_dump($registroDB);
    //                                 }
    //                                 else{ 
    //                                     $error = $query->error(); // Error al Updatear
    //                                     array_push($errors, $error);
    //                                 }
    //                             } else {
    //                                 //El registro NO EXISTE en la tabla -> se agrega
    //                                 if ( ($query = $this->tablas_model->insert($registro, $tabla))) 
    //                                     $count++;
    //                                 else{
    //                                     $error = $query->error(); // Error al Insertar
    //                                     array_push($errors, $error);
    //                                 }
    //                             }

    //                         }

    //                         // if (isset($errors) && count($errors) > 0){
    //                         //     echo "ERROR DE QUERY <br>";
    //                         //     foreach ($error as $error) {
    //                         //         echo "{$error} <br>";
    //                         //     }
    //                         //     $data['error'] = "TODO BIEN?";
    //                         // }
                                
    //                         $data['mensaje'] = 'Registros nuevos : ' . $count . '<br>
    //                                             Registros actualizados : ' . $udpdated . '<br>
    //                                             Registos totales : ' . $count + $udpdated . '<br>
    //                                             Tabla actualizada : ' .$tabla;


    //                     } else {
    //                         $data['mensaje'] = 'No existe la tabla sobra la cual quiere accionar.';
    //                     }

                       


    //                     $tableList = $this->tablas_model->get_tables();
    //                     $data['tableList'] = $tableList;
    //                     $this->load->view('index/header');
    //                     $this->load->view('index/navBar/navBarGrocery');
    //                     $this->load->view('cargaMasiva\tablas.php',$data);
    //                     $this->load->view('index/footer');
    //             }


        

    // 
}

    public function tags_main(){
      $tag_list = $this->tags_model->get_tags_list();
     // $this->load->view();

    }

}