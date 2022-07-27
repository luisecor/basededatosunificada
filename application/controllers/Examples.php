<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once "UsuariosTrait.php";
require_once "LoginController.php";


class Examples extends CI_Controller {

	use UsuariosTrait;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('observaciones_model');
		$this->load->model('mujeres_lideres');
		$this->load->model('sas_activo_model');
		$this->load->model('bada_celulares_model');
		
	}

	public function _example_output($output = null)
	{
		if ($this->verifySession()){
			$this->load->view('index/header');
			$this->load->view('index/navBar/navBarGrocery');
			$this->load->view('example.php',(array)$output);
			$this->load->view('index/footer');}
		else {
			$this->debe_iniciar_sesion();
		}
			
	}

	public function index()
	{
		
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
		
	}

	protected function acceso_denegado(){
		$user_name = strtoupper($this->session->user_name);
				$data['message'] = " {$user_name} no tiene acceso a la tabla solicitada";
				$data['status_code'] = 404;
				$data['heading'] = "ACCESO DENEGADO";

				$this->load->view('index/header');
				$this->load->view('index/navBar/navBarGrocery');
				$this->load->view('errors/html/error_general',$data);
				$this->load->view('index/footer');
	}

	public function tabla_afiliados(){
		if (!$this->verifySession()){
			return $this->debe_iniciar_sesion();
		}
		else {		
		if (in_array('TODAS', array_column($this->session->acceso,'tabla')) || 
			in_array('AFILIADOS', array_column($this->session->acceso,'tabla')) ){
				$crud = new grocery_CRUD;
				$crud->set_language('spanish-uy');
				$crud->set_table('afiliados');
				$crud->set_subject('Afiliado');
				$crud->columns(['comuna','barrio','nombre','apellido','sexo','dni','fecha_nacimiento','fecha_afiliacion','ocupacion','direccion']);
				
				$this->session->set_flashdata('table','afiliados');

				$crud->callback_before_delete(array($this,'action_befor_delete'));
				$crud->callback_after_insert(array($this, 'action_befor_insert'));
				$crud->callback_before_update(array($this,'action_befor_update'));

				$output = $crud->render();
				$this->_example_output($output);
			} else {
				$this->acceso_denegado();				
			}
		}

		
	}
	public function tabla_mujeres_lideres(){
		if (!$this->verifySession()){
			return $this->debe_iniciar_sesion();
		}
		else {	
		if (in_array('TODAS', array_column($this->session->acceso,'tabla')) || 
			in_array('MUJERES LIDERES', array_column($this->session->acceso,'tabla')) ){

				// $crud = new grocery_CRUD();
				// $crud->set_model('custom_query_model');
				// $crud->set_table('mujeres_lideres'); //Change to your table name
				// $crud->basic_model->set_query_str(''); //Query text here
				// $output = $crud->render();

				$crud = new grocery_CRUD;
				$crud->set_language('spanish-uy');
				$crud->set_table('mujeres_lideres');
				$crud->set_subject('Mujer Lider');

				$crud->set_primary_key('cuit','mujeres_lideres');
				$crud->set_relation_n_n('tags','cuit_tag','tags','cuit','id_tag','nombre');

				$crud->columns(	'cuit','tipo','apellido','nombre','sexo','direccion','altura','departamento','provincia','comuna','fecha_nacimiento',
								'desc_reparticion','desc_lvl1','desc_lvl2','desc_tarea','desc_regimen','telfono');
				
				$this->session->set_flashdata('model_reemplazo','sas_activo_model');
				$this->session->set_flashdata('campo','tipo_documento');				
				$crud->callback_column('tipo',array($this,'callback_column'));

				
				$this->session->set_flashdata('model_reemplazo','sas_activo_model');
				$this->session->set_flashdata('campo','apellido');	
				$crud->callback_column('apellido',array($this,'callback_column'));

				// $this->session->set_flashdata('model_reemplazo','bada_celulares_model');
				// $this->session->set_flashdata('campo','nombre');
				// $crud->callback_column('nombre',array($this,'callback_column'));

				// $this->session->set_flashdata('model_reemplazo','bada_celulares_model');
				// $this->session->set_flashdata('campo','domicilio');
				// $crud->callback_column('direccion',array($this,'callback_column'));


				// $this->session->set_flashdata('model_reemplazo','sas_activo_model');
				// $this->session->set_flashdata('campo','sexo');
				// $crud->callback_column('sexo',array($this,'callback_column'));
				
				
				$this->session->set_flashdata('table','mujeres_lideres');

				$crud->callback_before_delete(array($this,'action_befor_delete'));
				$crud->callback_after_insert(array($this, 'action_befor_insert'));
				$crud->callback_before_update(array($this,'action_befor_update'));

				$crud->add_action(	'Observaciones', 'https://www.grocerycrud.com/v1.x/assets/uploads/general/smiley.png', 
									'examples/ver_observaciones','ui-icon-image');
				
				$output = $crud->render();
				$this->_example_output($output);
			}else {
				$this->acceso_denegado();				
			}
		}
	}

	public function callback_column($value , $row){
		
		$model = $this->session->flashdata('model_reemplazo');
		$campo = $this->session->flashdata('campo');
		$data = $this->$model->get_all_data_from_cuit($row->cuit);

		// var_dump($data);
		
		return (isset($data[0]->$campo)) ? $data[0]->$campo : 'No actulizado';

	}


	public function ver_observaciones($primary_key){
		if (!$this->verifySession()){
			return $this->debe_iniciar_sesion();
		}
		else {	
			$this->tabla_observaciones();
		}	
		
	}

	public function tabla_observaciones(){
		if (!$this->verifySession()){
			return $this->debe_iniciar_sesion();
		}
		else {
			
			$tabla = $this->session->flashdata('table'); 	//Recupero del flash -> se borra
			$this->session->set_flashdata('table',$tabla);	//Lo vuelvo a designar de forma global
			$cuit_user = $this->session->cuit;
			$user_name = $this->session->user_name;

			$tabla_ = $tabla;
			$tabla_ = strtoupper(str_replace("_"," ",$tabla_));

			$crud = new grocery_CRUD;
			$crud->set_subject("observacion a {$tabla_}");

			$crud	->where('tabla', $tabla)
					->where('deleted_at =' , null);

			$crud->set_language('spanish-uy');
			$crud->set_table('observaciones');
			
			
			$crud	->columns('created_at','cuit_user','user_name','cuit_tabla','observacion','resuelto')
					->display_as('created_at', 'Creado el')
					->display_as('cuit_user','Observado por')
					->display_as('user_name','User')
					->display_as('cuit_tabla','CUIT')
					->required_fields('Observacion')
					->required_fields('Resuelto');

			$crud->field_type('resuelto','dropdown',array('1' => 'SI' , '0' => 'NO'));

			$cuit_list_model = $this->$tabla->get_cuit_list();
			$cuit_list = [];
			
			foreach ($cuit_list_model as $cuit_model)
				array_push($cuit_list, "{$cuit_model->cuit} - {$cuit_model->apellido_nombre}");
			
			$crud->field_type('cuit_tabla', 'dropdown', array_combine($cuit_list,$cuit_list));


			$crud->fields('cuit_tabla','observacion','resuelto','tabla','cuit_user','user_name');
			$crud->field_type('tabla','hidden',$tabla);
			$crud->field_type('cuit_user','hidden',$this->session->cuit);
			$crud->field_type('user_name','hidden',$this->session->user_name);
			$crud->change_field_type('observacion','string');
			$output = $crud->render();
			$this->_example_output($output);
			
		}		

	}

	public function tabla_gabinete(){
		if (!$this->verifySession()){
			return $this->debe_iniciar_sesion();
		}
		else {	
		if (in_array('TODAS', array_column($this->session->acceso,'tabla')) || 
			in_array('GABINETE', array_column($this->session->acceso,'tabla')) ){
				$crud = new grocery_CRUD;
				$crud->set_language('spanish-uy');
				$crud->set_table('gabinete');
				$crud->set_subject('Personal');
				$crud->set_primary_key('cuit','gabinete');
				$crud->set_relation_n_n('tags','cuit_tag','tags','cuit','id_tag','nombre');
				
				$this->session->set_flashdata('table','gabinete');

				$crud->callback_before_delete(array($this,'action_befor_delete'));
				$crud->callback_after_insert(array($this, 'action_befor_insert'));
				$crud->callback_before_update(array($this,'action_befor_update'));
				
				$output = $crud->render();
				$this->_example_output($output);
			} else {
				$this->acceso_denegado();				
			}
		}
	}

	public function tabla_secretarios(){
		if (!$this->verifySession()){
			return $this->debe_iniciar_sesion();
		}
		else {	
		if (in_array('TODAS', array_column($this->session->acceso,'tabla')) || 
			in_array('SECRETARIOS', array_column($this->session->acceso,'tabla')) ){
				$crud = new grocery_CRUD;
				$crud->set_language('spanish-uy');
				$crud->set_table('secretarios');
				$crud->set_subject('Personal');
				$crud->set_primary_key('cuit','secretarios');
				$crud->set_relation_n_n('tags','cuit_tag','tags','cuit','id_tag','nombre');
				
				$this->session->set_flashdata('table','secretarios');

				$crud->callback_before_delete(array($this,'action_befor_delete'));
				$crud->callback_after_insert(array($this, 'action_befor_insert'));
				$crud->callback_before_update(array($this,'action_befor_update'));
				
				$output = $crud->render();
				$this->_example_output($output);
			} else {
				$this->acceso_denegado();				
			}
		}
	}

	public function tabla_SubSecretarios(){
		if (!$this->verifySession()){
			return $this->debe_iniciar_sesion();
		}
		else {	
		if (in_array('TODAS', array_column($this->session->acceso,'tabla')) || 
			in_array('SUBSECRETARIOS', array_column($this->session->acceso,'tabla')) ){
				$crud = new grocery_CRUD;
				$crud->set_language('spanish-uy');
				$crud->set_table('sub_secretarios');
				$crud->set_subject('Personal');
				$crud->set_primary_key('cuit','sub_secretarios');
				$crud->set_relation_n_n('tags','cuit_tag','tags','cuit','id_tag','nombre');
				
				$this->session->set_flashdata('table','sub_secretarios');

				$crud->callback_before_delete(array($this,'action_befor_delete'));
				$crud->callback_after_insert(array($this, 'action_befor_insert'));
				$crud->callback_before_update(array($this,'action_befor_update'));

				$output = $crud->render();
				$this->_example_output($output);
			} else {
				$this->acceso_denegado();				
			}
		}
	}

	public function tabla_ptesComunas(){
		if (!$this->verifySession()){
			return $this->debe_iniciar_sesion();
		}
		else {	
		if (in_array('TODAS', array_column($this->session->acceso,'tabla')) || 
			in_array('PTES. COMUNAS', array_column($this->session->acceso,'tabla')) ){
				$crud = new grocery_CRUD;
				$crud->set_language('spanish-uy');
				$crud->set_table('ptes_comunas');
				$crud->set_subject('Personal');
				$crud->set_primary_key('cuit','ptes_comunas');
				$crud->set_relation_n_n('tags','cuit_tag','tags','cuit','id_tag','nombre');

				$this->session->set_flashdata('table','ptes_comunas');

				$crud->callback_before_delete(array($this,'action_befor_delete'));
				$crud->callback_after_insert(array($this, 'action_befor_insert'));
				$crud->callback_before_update(array($this,'action_befor_update'));

				$output = $crud->render();
				$this->_example_output($output);
			} else {
				$this->acceso_denegado();				
			}
		}
	}

	public function tabla_Legisladores(){
		if (!$this->verifySession()){
			return $this->debe_iniciar_sesion();
		}
		else {	
		if (in_array('TODAS', array_column($this->session->acceso,'tabla')) || 
			in_array('LEGISADORES', array_column($this->session->acceso,'tabla')) ){
				$crud = new grocery_CRUD;
				$crud->set_language('spanish-uy');
				$crud->set_table('legisladores');
				$crud->set_subject('Personal');
				$crud->set_primary_key('cuit','legisladores');
				$crud->set_relation_n_n('tags','cuit_tag','tags','cuit','id_tag','nombre');

				$this->session->set_flashdata('table','legisladores');

				$crud->callback_before_delete(array($this,'action_befor_delete'));
				$crud->callback_after_insert(array($this, 'action_befor_insert'));
				$crud->callback_before_update(array($this,'action_befor_update'));

				$output = $crud->render();
				$this->_example_output($output);
			} else {
				$this->acceso_denegado();				
			}
		}
	}

	public function tabla_jdg(){
		if (!$this->verifySession()){
			return $this->debe_iniciar_sesion();
		}
		else {	
		if (in_array('TODAS', array_column($this->session->acceso,'tabla')) || 
			in_array('JDG', array_column($this->session->acceso,'tabla')) ){
				$crud = new grocery_CRUD;
				$crud->set_language('spanish-uy');
				$crud->set_table('jdg');
				$crud->set_subject('Personal');
				$crud->set_primary_key('cuit','jdg');
				$crud->set_relation_n_n('tags','cuit_tag','tags','cuit','id_tag','nombre');

				$this->session->set_flashdata('table','jdg');

				$crud->callback_before_delete(array($this,'action_befor_delete'));
				$crud->callback_after_insert(array($this, 'action_befor_insert'));
				$crud->callback_before_update(array($this,'action_befor_update'));

				$output = $crud->render();
				$this->_example_output($output);
			}
		}
	}

	public function tabla_dg(){
		if (!$this->verifySession()){
			return $this->debe_iniciar_sesion();
		}
		else {	
		if (in_array('TODAS', array_column($this->session->acceso,'tabla')) || 
			in_array('DG', array_column($this->session->acceso,'tabla')) ){
				$crud = new grocery_CRUD;
				$crud->set_language('spanish-uy');
				$crud->set_table('dg');
				$crud->set_subject('Personal');
				$crud->set_primary_key('cuit','dg');
				$crud->set_relation_n_n('tags','cuit_tag','tags','cuit','id_tag','nombre');

				$this->session->set_flashdata('table','dg');

				$crud->callback_before_delete(array($this,'action_befor_delete'));
				$crud->callback_after_insert(array($this, 'action_befor_insert'));
				$crud->callback_before_update(array($this,'action_befor_update'));

				$output = $crud->render();
				$this->_example_output($output);
			} else {
				$this->acceso_denegado();				
			}
		}
	}

	public function tabla_go(){
		if (!$this->verifySession()){
			return $this->debe_iniciar_sesion();
		}
		else {	
		if (in_array('TODAS', array_column($this->session->acceso,'tabla')) || 
			in_array('GO', array_column($this->session->acceso,'tabla')) ){
				$crud = new grocery_CRUD;
				$crud->set_language('spanish-uy');
				$crud->set_table('go');
				$crud->set_subject('Personal');
				$crud->set_primary_key('cuit','go');
				$crud->set_relation_n_n('tags','cuit_tag','tags','cuit','id_tag','nombre');

				$this->session->set_flashdata('table','go');

				$crud->callback_before_delete(array($this,'action_befor_delete'));
				$crud->callback_after_insert(array($this, 'action_befor_insert'));
				$crud->callback_before_update(array($this,'action_befor_update'));

				$output = $crud->render();
				$this->_example_output($output);
			} else {
				$this->acceso_denegado();				
			}
		}
	}



	public function bada_celulares(){
		if (!$this->verifySession()){
			return $this->debe_iniciar_sesion();
		}
		else {	
		if (in_array('TODAS', array_column($this->session->acceso,'tabla')) || 
			in_array('USUARIOS BADA', array_column($this->session->acceso,'tabla')) ){
				$crud = new grocery_CRUD;
				$crud->set_language('spanish-uy');
				$crud->set_table('bada_celulares');
				$crud->set_subject('Usuario','Usuarios');
			
				$crud->display_as('virtual', 'Cuit');
				$crud->display_as('cuit', 'Nombre - Apellido');
				$crud->display_as('celular_bada','Telefono');
				$crud->display_as('mail','Email');
				
				$crud->set_primary_key('cuit','sas_activo');
				$crud->set_relation('cuit','sas_activo','{nombre} - {apellido}');

				$crud->set_primary_key('cuit','bada_celulares');
				$crud->set_relation_n_n('tags','cuit_tag','tags','cuit','id_tag','nombre');

				$crud->fields(['celular_bada', 'mail', 'calle_bada', 'altura_bada','departamento_bada','provincia_bada', 'barrio_normalizado','comuna','intereses','notificaciones', 'tags', ]);
				$crud->display_as('calle_bada','Calle');
				$crud->display_as('altura_bada','Altura');

				$crud->columns(['virtual','cuit','celular_bada','mail','tags']);
				$crud->unset_add();
				$crud->unset_clone();
				$crud->unset_delete();
				$crud->add_action('Cambiar Registro','https://www.grocerycrud.com/v1.x/assets/uploads/general/smiley.png',
									'examples/cambiar_nombre_apellido');
				
				$this->session->set_flashdata('table','bada_celulares');

				$crud->callback_before_delete(array($this,'action_befor_delete'));
				$crud->callback_after_insert(array($this, 'action_befor_insert'));
				$crud->callback_before_update(array($this,'action_befor_update'));

				$output = $crud->render();
				$this->_example_output($output);
			} else {
				$this->acceso_denegado();				
			}
		}

	}

	public function cambiar_nombre_apellido($id = null){
		$query = $this->db->query('SELECT cuit, nombre, apellido FROM sas_activo WHERE cuit = '. $id .'');
		
		if ($query->result()){
			redirect('examples/sas_activos/edit/'.$id.'');
		} else
		show_error('El cuit solicitado no se encuentra en la base de datos de SAS ACTIVOS',404,'CUIT no encontrado en la base de datos SAS_ACTIVO');
		
				
	}


	public function tabla_tags(){
		if (!$this->verifySession()){
			return $this->debe_iniciar_sesion();
		}
		else {	
		$crud = new Grocery_CRUD();
		$crud->set_language('spanish-uy');
		$crud->set_table('tags');
		$crud->columns('nombre');
		$crud->fields('nombre');
		$output = $crud->render();
		$this->_example_output($output);
		}
	}

	public function tabla_tag_asignado(){
		if (!$this->verifySession()){
			return $this->debe_iniciar_sesion();
		}
		else {	
		$crud = new Grocery_CRUD();
		$crud->set_language('spanish-uy');
		$crud->set_table('bada_celulares');
		

		$crud->set_primary_key('cuit','sas_activo');
		$crud->set_relation('cuit','sas_activo','{nombre} - {apellido}');
	
		$crud->set_primary_key('cuit','bada_celulares');
		$crud->set_relation_n_n('tags','cuit_tag','tags','cuit','id_tag','nombre');

		$crud->display_as('virtual' , 'Cuit');
		$crud->display_as('cuit' , 'Nombre - Apellido');

		$crud->columns('virtual','cuit','tags');
		$crud->fields('tags');
		$output = $crud->render();
		$this->_example_output($output);
		}
	}




	public function sas_activos(){
		if (!$this->verifySession()){
			return $this->debe_iniciar_sesion();
		}
		else {	
		if (in_array('TODAS', array_column($this->session->acceso,'tabla')) || 
			in_array('SAS ACTIVOS', array_column($this->session->acceso,'tabla')) ){
				$crud = new grocery_CRUD;
				$crud->set_language('spanish-uy');
				$crud->set_table('sas_activo');
				$crud->set_subject('Activo','Activos');
				$crud->columns(['cuit','tipo_documento','nro_documento', 'apellido', 'nombre','sexo',
								'fecha_nacimiento_sql','fecha_inicio', 
								'domicilio','partido','localidad','provincia',
								'desc_tarea','desc_registro','desc_regimen','desc_rep',
								'desc_lvl1','desc_lvl2','tags']);

				$crud->display_as('cuit', 'Cuit');
				$crud->display_as('nombre','Nombre');
				$crud->display_as('tipo_documento','Tipo');
				$crud->display_as('nro_documento','NRO');
				$crud->display_as('fecha_nacimiento_sql','F Nac');
				$crud->display_as('fecha_inicio','F Inicio');
				$crud->display_as('apellido','Apellido');
				$crud->display_as('desc_tarea','Desc Tarea');
				$crud->display_as('desc_rep','Desc Reparticion');
				$crud->display_as('desc_registro','Desc Registro');
				$crud->display_as('desc_regimen','Desc Regimen');
				$crud->display_as('desc_lvl1','Desc Lvl 1');
				$crud->display_as('desc_lvl2','Desc  Lvl 2');
				$this->session->set_flashdata('table','sas_activo');

				$crud->set_primary_key('cuit','sas_activo');
				$crud->set_relation_n_n('tags','cuit_tag','tags','cuit','id_tag','nombre');
				
				$crud->fields([	'cuit','tipo_documento','nro_documento','apellido', 'nombre','domicilio','localidad',
								'comuna','fecha_nacimiento_sql',
								'desc_tarea','cod_rep_rrhh_rep','desc_rep', 'desc_registro','desc_regimen',
								'cod_rep_rrhh_lvl1','desc_lvl1',
								'cod_rep_rrhh_lvl2','desc_lvl2','tags']);
				
			

				$crud->callback_before_delete(array($this,'action_befor_delete'));
				$crud->callback_after_insert(array($this, 'action_befor_insert'));
				$crud->callback_before_update(array($this,'action_befor_update'));
							
				//$crud->unset_add();
				$crud->unset_clone();
				//$crud->unset_delete();


				$output = $crud->render();
				$this->_example_output($output);
			} else {
				$this->acceso_denegado();				
			}
		}

	}



	public function action_befor_update($post_array, $primary_key){

		$data = [
			'cuit_usuario' => $this->session->cuit,
			'accion' => 'UPDATE'
		];
	
		foreach ($post_array as $k=>$v){
			if ($k !== 'tags')
				$data[$k] = $v;
		}


	
		return $this->db->insert('log_'.$this->session->flashdata('table'), $data);


	}

	public function action_befor_insert($post_array, $primary_key)
{

	$data = [
		'cuit_usuario' => $this->session->cuit,
		'accion' => 'INSERT',
	];

	foreach ($post_array as $k=>$v){
		$data[$k] = $v;
	}

    return $this->db->insert('log_'.$this->session->flashdata('table'), $data);
}

public function action_befor_delete($primary_key)
{
	$this->db->where('cuit',$primary_key);
	$registro = $this->db->get($this->session->flashdata('table'),$primary_key)->row();

	if (empty($registro)){
		return false;
	}

	$data = [
		'cuit_usuario' => $this->session->cuit,
		'accion' => 'DELETE'
	];

	foreach ($registro as $k=>$v){
		$data[$k] = $v;
	}

    return $this->db->insert('log_'.$this->session->flashdata('table'), $data);
}
 

}
