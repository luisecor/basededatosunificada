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

    public function campos_extra($tabla ){
        
        $c_extra = [
                    'mujeres_lideres' 			=> ['campos_extra' 	=> ['edicion']],
					'lideres_gcba'				=> ['campos_extra'	=> ['hacienda','chisme','equivalente','gabinete']],
					'secretarias_particular'	=> ['campos_extra'	=> ['antiguedad','edificio']],
					'embajadores'				=> ['campos_extra'	=> ['lugar_de_trabajo','recidencia','ya_fue_embajador','puesto','tarea_de_contratacion']],
                    'eci'                       =>['campos_extra'   => ['area_de_enlace','lugar_de_trabajo']]
        ];

        if (isset($c_extra[$tabla['importData']]['campos_extra'])) {
             return $c_extra[$tabla['importData']]['campos_extra'];}
        return false;
        
    }

    public function importarCSVaDB(){

        $config['upload_path']          = './assets/uploads/files';
        $config['allowed_types']        = 'csv';
        $config['max_size']             = 2048;


        $this->load->library('upload', $config);


        if ( !$this->upload->do_upload('file'))
                {   
                        // echo "HAY ERRORES";
                        $valueSelected = $this->input->post(array('importData'), TRUE);
                        // var_dump($valueSelected);
                        $data['mensaje'] = $this->upload->display_errors();
                        $data['tabla'] = $valueSelected;
                        // return print_r( $data['error']);
                       
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
                        $data['input'] = $this->upload->data();

                        $columnas_extra = $this->campos_extra($valueSelected);
                        
                        $file = fopen($data['input']['full_path'],"r");

                        $i = 1;             // Comienzo de lectura->fila = 1
                        $csvArr = array();  // Array que contiene datos del archivo leido
                                            // maximo de 1Mill de filas, separado por ,
                        while ( ($filedata = fgetcsv($file , 1000000, ",")) !== FALSE ){
                           

                            if ($i >= 2){
                                                    // Columna 0 -> 1er
                                $csvArr[$i]['cuit'] = $filedata[0];
                                $csvArr[$i]['apellido'] = $filedata[1];
                                $csvArr[$i]['nombre'] = $filedata[2];
                                if (isset($columnas_extra) && $columnas_extra){
                                   foreach ($columnas_extra as $k => $v) {
                                    $csvArr[$i][$v] = $filedata[$k + 3];
                                   }
                                }
                                
                            }
                            $i++;
                        }


                        fclose($file);

                        //$tabla = $this->tablas_model->get_table_name($valueSelected['importData'])[0]->nombre_tabla;
                        $tabla = $this->tablas_model->get_table_name($valueSelected['importData'])[0]->nombre;

                        
                        $existe = false;
                        $models = [
                            'gabinete' => 'gabinete_model' //Tengo que hacer un modelo generico para que funcine para todas las tablas, excepto las que tienen campos especiales
                        
                        ];
                        $existe = $this->tablas_model->existe_tabla_nombre($tabla);


                        

                        if ($existe){
                            $tabla = $valueSelected['importData'];

                           // echo "existe tabla";

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
                                                Registos totales : ' . ($count + $udpdated) . '<br>
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
        $valueSelected = $this->input->get(array('importData'));
       // var_dump($valueSelected);

        if ( !$this->upload->do_upload('file'))                {   
                        //echo "HAY ERRORES";
                        $valueSelected = $this->input->post(array('valueSeleted'), TRUE);
                        
                        $data['error'] = $this->upload->display_errors();
                        $data['tagID'] = $valueSelected['valueSeleted'];
                       
                        $tag_list = $this->tags_model->get_tags_name();
                        $data['tagsList'] = $tag_list;
                        $this->load->view('index/header');
                        $this->load->view('index/navBar/navBarGrocery');
                        $this->load->view('cargaMasiva/cargaMasivaTags',$data);
                        $this->load->view('index/footer');
                }
                else
                {
                    // echo "NO HAY ERRORES";
                    $valueSelected = $this->input->post(array('valueSeleted'), TRUE);
                        $data['tagID'] = $valueSelected['valueSeleted']; //Aca guardo el ID del TAG que va a tener el cuit
                        
                    
                        $data['input'] = $this->upload->data();

                        $file = fopen($data['input']['full_path'],"r");

                        $i = 1;             // Comienzo de lectura->fila = 1
                        $csvArr = array();  // Array que contiene datos del archivo leido
                                            // maximo de 1Mill de filas, separado por ,
                        while ( ($filedata = fgetcsv($file , 1000000, ",")) !== FALSE ){
                           

                            if ($i >= 2){
                                                    // Columna 0 -> 1er
                                $csvArr[$i]['cuit'] = $filedata[0];

                                // Solo necesito el cuit
                            }
                            $i++;
                        }


                        fclose($file);

                  

                      

                            $count = 0;
                            $udpdated = 0;
                            $errors = array();
    
                            foreach($csvArr as $registro){
                                $registroDB = $this->tags_model->get_cuit_by_tagID($registro,$data['tagID']);
                                                               

                                if (isset($registroDB)){
                                   
                                    //El regisstro existe en la tabla -> Se modifica
                                    if ( ($query = $this->tags_model->update($registro))){
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
                                    if ( ($query = $this->tags_model->insert(array( 'cuit' => $registro['cuit'], 'id_tag' => $data['tagID'])))) 
                                        $count++;
                                    else{
                                        $error = $query->error(); // Error al Insertar
                                        array_push($errors, $error);
                                    }
                                }

                            }

                                
                            $data['error'] = 'Registros nuevos : ' . $count . '<br>
                                                Registros actualizados : ' . $udpdated . '<br>
                                                Registos totales : ' . ($count + $udpdated) . '<br>';
                            


                    


                       
                        $tag_list = $this->tags_model->get_tags_name();
                        $data['tagsList'] = $tag_list;
                        $this->load->view('index/header');
                        $this->load->view('index/navBar/navBarGrocery');
                        $this->load->view('cargaMasiva/cargaMasivaTags',$data);
                        $this->load->view('index/footer');
                }


        

    // 
}

    public function tags_main(){
      $tag_list = $this->tags_model->get_tags_list();
     // $this->load->view();

    }

}