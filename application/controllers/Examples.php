<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Examples extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		// $this->load->database();
		// $this->load->helper('url');

		// $this->load->library('grocery_CRUD');
	}

	public function _example_output($output = null)
	{
		$this->load->view('index/header');
        $this->load->view('index/navBar/navBarGrocery');
        $this->load->view('example.php',(array)$output);
        $this->load->view('index/footer');
		
	}

	public function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}


	/*<a href='<?php echo site_url('examples/tabla_afiliados')?>'>Afiliados</a> |
			<a href='<?php echo site_url('examples/tabla_mujeres_lideres')?>'>Mujeres Lideres</a> |*/
	
	public function tabla_afiliados(){
		$crud = new grocery_CRUD;
		$crud->set_language('spanish-uy');
		$crud->set_table('afiliados');
		$crud->set_subject('Afiliado');
		$crud->columns(['comuna','barrio','nombre','apellido','sexo','dni','fecha_nacimiento','fecha_afiliacion','ocupacion','direccion']);
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

		$crud->fields(['celular_bada', 'tags']);
		$crud->columns(['virtual','cuit','celular_bada','mail','tags']);
		$crud->unset_add();
		$crud->unset_clone();
		$crud->unset_delete();
		$crud->add_action('Cambiar Nombre o Apellido','https://www.grocerycrud.com/v1.x/assets/uploads/general/smiley.png','examples/cambiar_nombre_apellido');
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
        $crud->columns(['cuit','nombre','apellido','tags']);
		$crud->display_as('cuit', 'CUIT');
        $crud->display_as('nombre','NOMBRE');
        $crud->display_as('apellido','APELLIDO');

		$crud->set_primary_key('cuit','sas_activo');
		$crud->set_relation_n_n('tags','cuit_tag','tags','cuit','id_tag','nombre');
		
		
		$crud->unset_add();
		$crud->unset_clone();
		$crud->unset_delete();
		$output = $crud->render();
		$this->_example_output($output);

	}

}
