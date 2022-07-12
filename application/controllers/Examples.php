<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once "UsuariosController.php";
require_once "LoginController.php";


class Examples extends CI_Controller {

	use UsuariosController;
	


	public function __construct()
	{
		parent::__construct();
		
	}

	public function _example_output($output = null)
	{
		if ($this->verifySession()){
			$this->load->view('index/header');
			$this->load->view('index/navBar/navBarGrocery');
			$this->load->view('example.php',(array)$output);
			$this->load->view('index/footer');}
		else {
			$data = [ 'error' => 'Debe inicar sesion para poder continuar'];
			$this->load->view('index/header');
			$this->load->view('index/navBar/navBar');
			$this->load->view('login/login', $data);
			$this->load->view('index/footer');

		}
			
	}

	public function index()
	{
		
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
		
	}

	public function tabla_afiliados(){
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
	}
	public function tabla_mujeres_lideres(){
		$crud = new grocery_CRUD;
		$crud->set_language('spanish-uy');
		$crud->set_table('mujeres_lideres');
		$crud->set_subject('Mujer Lider');
		$crud->set_primary_key('cuit','mujeres_lideres');
		$crud->set_relation_n_n('tags','cuit_tag','tags','cuit','id_tag','nombre');
		
		$this->session->set_flashdata('table','mujeres_lideres');

		$crud->callback_before_delete(array($this,'action_befor_delete'));
		$crud->callback_after_insert(array($this, 'action_befor_insert'));
		$crud->callback_before_update(array($this,'action_befor_update'));
		
		$output = $crud->render();
		$this->_example_output($output);
	}

	public function tabla_gabinete(){
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
	}

	public function tabla_secretarios(){
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
	}

	public function tabla_SubSecretarios(){
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
	}

	public function tabla_ptesComunas(){
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
	}

	public function tabla_Legisladores(){
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
	}

	public function tabla_jdg(){
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

	public function tabla_dg(){
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
	}

	public function tabla_go(){
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
	}



	public function bada_celulares(){
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
		$crud->add_action('Cambiar Registro','https://www.grocerycrud.com/v1.x/assets/uploads/general/smiley.png','examples/cambiar_nombre_apellido');
		
		$this->session->set_flashdata('table','bada_celulares');

		$crud->callback_before_delete(array($this,'action_befor_delete'));
		$crud->callback_after_insert(array($this, 'action_befor_insert'));
		$crud->callback_before_update(array($this,'action_befor_update'));

		$output = $crud->render();
		$this->_example_output($output);

	}

	public function cambiar_nombre_apellido($id = null){
		$query = $this->db->query('SELECT cuit, nombre, apellido FROM sas_activo WHERE cuit = '. $id .'');
		
		if ($query->result()){
			redirect('examples/sas_activos/edit/'.$id.'');
		} else
		show_error('El cuit solicitado no se encuentra en la base de datos de SAS ACTIVOS',404,'CUIT no encontrado en la base de datos SAS_ACTIVO');
		
				
	}


	public function tabla_roles(){
		$crud = new Grocery_CRUD();
		$crud->set_language('spanish-uy');
		$crud->set_table('rol');
		$crud->set_subject('Rol','Roles');
		$crud->columns('nombre');
		$crud->display_as('nombre', 'Rol');
		// $crud->fields('rol');
		$output = $crud->render();
		$this->_example_output($output);
	}

	public function taba_rol_acciones(){
		$crud = new Grocery_CRUD();
		$crud->set_language('spanish-uy');
		$crud->set_table('rol');
		$crud->set_relation_n_n('acciones','rol_accion','acciones','id_rol','id_accion','nombre');
		$crud->columns('id','nombre','acciones');

		$crud->fields('nombre','acciones');
		
		$output = $crud->render();
		$this->_example_output($output);

	}

	public function roles_asignados(){
		$crud = new Grocery_CRUD();
		$crud->set_language('spanish-uy');
		$crud->set_table('cuit_rol');
		$crud->set_subject('Usuario->Rol');
		$crud->columns(['cuit','id_rol']);
		$crud->display_as('cuit','Nombre - Apellido');
		$crud->display_as('id_rol','Rol Asignado');
		$crud->set_primary_key('cuit','sas_activo');
		$crud->set_relation('cuit','sas_activo','{nombre} - {apellido}');
		$crud->set_relation('id_rol','rol', '{nombre}');
		$crud->fields(['rol']);
		$output = $crud->render();
		$this->_example_output($output);
		
	}

	public function tabla_tags(){
		$crud = new Grocery_CRUD();
		$crud->set_language('spanish-uy');
		$crud->set_table('tags');
		$crud->columns('nombre');
		$crud->fields('nombre');
		$output = $crud->render();
		$this->_example_output($output);
	}

	public function tabla_tag_asignado(){
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

	public function tabla_tag_asignado2(){
		$crud = new Grocery_CRUD();
		$crud->set_language('spanish-uy');
		$crud->set_table('cuit_tag');

		

	}

	public function tabla_facts(){
		$crud = new Grocery_CRUD();
		$crud->set_language('spanish-uy');
		$crud->set_table('bada_celulares_historico');
		$output = $crud->render();
		$this->_example_output($output);

	}

	public function tabla_acciones(){
		$crud = new Grocery_CRUD();
		$crud->set_language('spanish-uy');
		$crud->set_table('acciones');
		$output = $crud->render();
		$this->_example_output($output);

	}

	public function sas_activos(){
		$crud = new grocery_CRUD;
		$crud->set_language('spanish-uy');
		$crud->set_table('sas_activo');
		$crud->set_subject('Activo','Activos');
        $crud->columns([	'cuit','tipo_documento','nro_documento','apellido', 'nombre','domicilio','localidad',
		'comuna','fecha_nacimiento_sql',
		'desc_tarea','cod_rep_rrhh_rep','desc_rep', 'desc_registro','desc_regimen',
		'cod_rep_rrhh_lvl1','desc_lvl1',
		'cod_rep_rrhh_lvl2','desc_lvl2','tags']);
		$crud->display_as('cuit', 'Cuit');
        $crud->display_as('nombre','Nombre');
        $crud->display_as('apellido','Apellido');

		$crud->set_primary_key('cuit','sas_activo');
		$crud->set_relation_n_n('tags','cuit_tag','tags','cuit','id_tag','nombre');
		
		$crud->fields([	'cuit','tipo_documento','nro_documento','apellido', 'nombre','domicilio','localidad',
						'comuna','fecha_nacimiento_sql',
						'desc_tarea','cod_rep_rrhh_rep','desc_rep', 'desc_registro','desc_regimen',
						'cod_rep_rrhh_lvl1','desc_lvl1',
						'cod_rep_rrhh_lvl2','desc_lvl2','tags']);
		
		$crud->display_as('fecha_nacimiento_sql','Fecha de Nacimiento');
		$crud->display_as('desc_tarea','Descripcion de Tarea');
		$crud->display_as('cod_rep_rrhh_rep','Cod de Reparticion RRHH');
		$crud->display_as('desc_rep','Descripcion de Reparticion');
		$crud->display_as('desc_registro','Descripcion de Registro');
		$crud->display_as('desc_regimen','Descripcion de Regimen');
		$crud->display_as('cod_rep_rrhh_lvl1','Cod Reparticion Lvl 1');
		$crud->display_as('desc_lvl1','Descrip Reparticion Lvl 1');
		$crud->display_as('cod_rep_rrhh_lvl2','Cod Reparticion Lvl 2');
		$crud->display_as('desc_lvl2','Descrip Reparticion Lvl 2');

		$this->session->set_flashdata('table','sas_activo');

		$crud->callback_before_delete(array($this,'action_befor_delete'));
		$crud->callback_after_insert(array($this, 'action_befor_insert'));
		$crud->callback_before_update(array($this,'action_befor_update'));
					
		//$crud->unset_add();
		$crud->unset_clone();
		//$crud->unset_delete();


		$output = $crud->render();
		$this->_example_output($output);

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
