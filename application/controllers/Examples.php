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
		$this->load->model('tags_model');
		$this->load->model('accionar_tag_mogel');
		
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
		if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
			in_array('AFILIADOS', array_column($this->session->acceso,'nombre')) ){
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
		if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
			in_array('MUJERES LIDERES', array_column($this->session->acceso,'nombre')) ){
				$crud = new grocery_CRUD;
				$crud->set_language('spanish-uy');
				$crud->set_primary_key('cuit','mujeres_lideres_view');
				$crud->set_table('mujeres_lideres_view');
				
				$crud->set_subject('Mujer Lider');

				$this->session->set_flashdata('table','mujeres_lideres');

				//$crud->callback_before_delete(array($this,'action_befor_delete')); !TODO revisar
				//$crud->callback_after_insert(array($this, 'action_befor_insert')); !TODO revisar
				//$crud->callback_before_update(array($this,'action_befor_update')); !TODO revisar
				//$crud->callback_after_update(array($this,'before_update_mujeres_lideres'));
				
				$crud->set_primary_key('id','tags');
				$crud->set_relation_n_n('tags','cuit_tag','tags','cuit','id_tag','nombre');

				$filtro_session	= $this->session->filtro_session;

				//Filtros de SESSION-USUARIO
				if (empty($filtro_session) !== true) {
					foreach($filtro_session as $filtro){
						$crud->where("tag_list LIKE '%{$filtro['nombre']}%'");
	
					}
				}

				$filtro_busqueda = $this->session->filtro_busqueda;

				if (empty($filtro_busqueda) !== true){

					foreach ($filtro_busqueda['filtro'] as $filtro){
											$nombre = $this->tags_model->get_tag_name($filtro);
						$crud->where("tag_list LIKE '%{$nombre[0]['nombre']}%'");
	
					}
				}

				
						
				$crud	//->unset_add()
						->unset_edit()
						->unset_delete()
						->unset_clone()
						->unset_columns('tag_list')
						->add_fields('cuit','edicion')
						;

				 $crud	->add_action(	'Editar Datos Personales',  base_url.'assets/icons/datos_personales.png', 'examples/cambiar_datos_personales')
						->add_action(	'Editar Atributos de Mujer Lider', base_url.'assets/icons/contact_page_FILL0_wght400_GRAD0_opsz24.png','examples/editar_atributos')
						->add_action(	'Ver Registros completo', base_url.'assets/icons/search_FILL0_wght400_GRAD0_opsz24.png','examples/tabla_mujeres_lideres/read','ui-icon-image')
						->add_action(	'Observaciones', base_url.'assets/icons/more.png','examples/ver_observaciones','ui-icon-image')
						// ->callback_insert(array($this,'probando_add'))
						;
									
								
				$output = $crud->render();
				$this->_example_output($output);
			}else {
				$this->acceso_denegado();				
			}
		}
	}

	public function probando_add(){
		redirect('examples/mujeres_lideres/add');
	}



	public function editar_atributos($pk){
		//Es necesario traer el nombre de la tabla de la cual venis para indicarle a cual tabla debe ir
		$tabla = $this->session->flashdata('table');

		if ($tabla !== 'mujeres_lideres')
			$tabla = "tabla_{$tabla}";

		// Obtenemos el CUIT para consultar los accesos de usuario, tablas, tags que puede modificar
		// Y sobre que registros puede accionar
		$cuit_usuario = $this->session->cuit;
		$accesos_usuario = $this->accionar_tag_mogel->get_actioned_tags($cuit_usuario);
		$tags_registro = $this->tags_model->get_tags_by_cuit($pk);

		// Verificar si alguno de los tags son los principales del usuario
		$tiene_acceso = false;
		foreach($tags_registro as $tag_reg)
			foreach ($accesos_usuario as $acc_us)
				if ($tag_reg == $acc_us)
					$tiene_acceso = true;

		if ($tiene_acceso) 
			redirect("examples/{$tabla}/edit/{$pk}");
		else $this->sin_acceso_tag_principal();

	}

	public function mujeres_lideres(){
		if (!$this->verifySession()){
			return $this->debe_iniciar_sesion();
		}
		else {	
		if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
			in_array('MUJERES LIDERES', array_column($this->session->acceso,'nombre')) ){
				$crud = new grocery_CRUD;
				$crud->set_language('spanish-uy');
				$crud->set_primary_key('cuit','mujeres_lideres');
				$crud->set_table('mujeres_lideres');
				$crud->set_subject('Mujer Lider');
				$crud	->fields('edicion')
						->add_fields('cuit','edicion');

				$this->session->set_flashdata('table','mujeres_lideres');

				$crud->callback_before_delete(array($this,'action_befor_delete')); //!TODO revisar
				$crud->callback_after_insert(array($this, 'action_befor_insert')); //!TODO revisar
				$crud->callback_before_update(array($this,'action_befor_update')); //!TODO revisar
				
				//$crud->set_relation_n_n('tags','cuit_tag','tags','cuit','id_tag','nombre');				
				//$crud->unset_add()->unset_edit()->unset_delete();

				$output = $crud->render();
				$this->_example_output($output);
			}else {
				$this->acceso_denegado();				
			}
		}
	}

	public function before_update_mujeres_lideres($pk, $post_array){
		//Al estar manejando una tabla que es una vista y no esta conformada por los id de la tabla base -> error
		var_dump($post_array);
		var_dump($pk);
		
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
					->required_fields('Resuelto')
					->fields('observacion','resuelto')
					->unset_clone()
					->order_by('created_at','desc');

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
		if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
			in_array('GABINETE', array_column($this->session->acceso,'nombre')) ){
				$crud = new grocery_CRUD;
				$crud->set_language('spanish-uy');
				$crud->set_table('gabinete');
				$crud->set_subject('Personal');
				$crud->set_primary_key('cuit','gabinete');
				$crud->set_relation_n_n('tags','cuit_tag','tags','cuit','id_tag','nombre');
				
				$table = "gabinete";
				$table = strtoupper($table);
				$this->session->set_flashdata('table','gabinete');

				$crud
						// ->unset_edit()
						// ->unset_delete()
						// ->unset_clone()
						;

				$crud	
						//->add_action(	'Editar Datos Personales',  base_url.'assets/icons/datos_personales.png', 'examples/cambiar_datos_personales')
						->add_action(	"Editar Atributos de {$table}", base_url.'assets/icons/contact_page_FILL0_wght400_GRAD0_opsz24.png','examples/editar_atributos')
						//->add_action(	'Ver Registros completo', base_url.'assets/icons/search_FILL0_wght400_GRAD0_opsz24.png','examples/tabla_mujeres_lideres/read','ui-icon-image')
						//->add_action(	'Observaciones', base_url.'assets/icons/more.png','examples/ver_observaciones','ui-icon-image')
						//->callback_insert(array($this,'probando_add'))
						;

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
		if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
			in_array('SECRETARIOS', array_column($this->session->acceso,'nombre')) ){
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
		if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
			in_array('SUBSECRETARIOS', array_column($this->session->acceso,'nombre')) ){
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
		if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
			in_array('PTES. COMUNAS', array_column($this->session->acceso,'nombre')) ){
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
		if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
			in_array('LEGISADORES', array_column($this->session->acceso,'nombre')) ){
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
		if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
			in_array('JDG', array_column($this->session->acceso,'nombre')) ){
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
		if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
			in_array('DG', array_column($this->session->acceso,'nombre')) ){
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
		if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
			in_array('GO', array_column($this->session->acceso,'nombre')) ){
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

		
			$vengo = $this->session->flashdata('vengo');
			if ($vengo) $this->session->set_flashdata('vengo','true');

		if (!$this->verifySession()){
			return $this->debe_iniciar_sesion();
		}
		else {	
		if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
			in_array('USUARIOS BADA', array_column($this->session->acceso,'nombre')) ||
			isset($vengo) ){
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

				$crud	->fields(['celular_bada', 'mail', 'calle_bada', 'altura_bada','departamento_bada','provincia_bada', 'barrio_normalizado','comuna','intereses','notificaciones','tags'])
						->field_type('notificaciones','enum',array('Si','No'));
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

				$crud	->unset_texteditor('barrio_normalizado','intereses');
						

				$output = $crud->render();
				$this->_example_output($output);
			} else {
				$this->acceso_denegado();				
			}
		}

	}

	public function cambiar_datos_personales($id){

		$this->session->set_flashdata('vengo','true');

		$query = $this->db->query('SELECT cuit FROM bada_celulares WHERE cuit = '. $id .'');

		if ($query->result()){
			redirect('examples/bada_celulares/edit/'.$id.'');
		} else

		$this->error_("bada_celulares");

	}

	public function cambiar_nombre_apellido($id = null){
		
		$this->session->set_flashdata('vengo','true');

		$query = $this->db->query('SELECT cuit, nombre, apellido FROM sas_activo WHERE cuit = '. $id .'');
		
		if ($query->result()){
			redirect('examples/sas_activos/edit/'.$id.'');
		} else
		$this->error_("sas_activo");
		
				
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

		$vengo = $this->session->flashdata('vengo');

		if (!$this->verifySession()){
			return $this->debe_iniciar_sesion();
		}
		else {	
		if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
			in_array('SAS ACTIVOS', array_column($this->session->acceso,'nombre')) ||
			$vengo ){
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
				
				$crud	->fields(['cuit','tipo_documento','nro_documento','apellido', 'nombre',
								'comuna','fecha_nacimiento_sql',
								'desc_tarea','desc_rep', 'desc_registro','desc_regimen',
								'desc_lvl1','desc_lvl2','tags']);
				
			

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
