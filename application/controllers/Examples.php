<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Examples extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function _example_output($output = null)
	{
		$this->load->view('example.php',(array)$output);
	}

	// public function offices()
	// {
	// 	$output = $this->grocery_crud->render();

	// 	$this->_example_output($output);
	// }

	public function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

	// public function offices_management()
	// {
	// 	try{
	// 		$crud = new grocery_CRUD();

	// 		$crud->set_theme('datatables');
	// 		$crud->set_table('offices');
	// 		$crud->set_subject('Office');
	// 		$crud->required_fields('city');
	// 		$crud->columns('city','country','phone','addressLine1','postalCode');

	// 		$output = $crud->render();

	// 		$this->_example_output($output);

	// 	}catch(Exception $e){
	// 		show_error($e->getMessage().' --- '.$e->getTraceAsString());
	// 	}
	// }

	// public function employees_management()
	// {
	// 		$crud = new grocery_CRUD();

	// 		$crud->set_theme('datatables');
	// 		$crud->set_table('employees');
	// 		$crud->set_relation('officeCode','offices','city');
	// 		$crud->display_as('officeCode','Office City');
	// 		$crud->set_subject('Employee');

	// 		$crud->required_fields('lastName');

	// 		$crud->set_field_upload('file_url','assets/uploads/files');

	// 		$output = $crud->render();

	// 		$this->_example_output($output);
	// }

	public function bada_celulares(){
		$crud = new grocery_CRUD;
		$crud->set_language('spanish-uy');
		$crud->set_table('bada_celulares_copia');
		$crud->set_subject('Celular','Celulares');
        $crud->columns(['virtual','cuit','celular_bada','mail']);
		$crud->display_as('virtual', 'Cuit');
		$crud->display_as('cuit', 'Nombre - Apellido');
        $crud->display_as('celular_bada','Telefono');
        $crud->display_as('mail','Email');
		$crud->fields(['cuit','celular_bada']);
		$crud->set_primary_key('cuit','sas_activo');
		$crud->set_relation('cuit','sas_activo','{nombre} - {apellido}');
		$crud->unset_add();
		$crud->unset_clone();
		$crud->unset_delete();
		$output = $crud->render();
		$this->_example_output($output);

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
		$crud->fields(['id_rol']);
		$output = $crud->render();
		$this->_example_output($output);
		
	}

	public function tabla_facts(){
		$crud = new Grocery_CRUD();
		$crud->set_language('spanish-uy');
		$crud->set_table('bada_celulares_historico');
		$output = $crud->render();
		$this->_example_output($output);

	}

	public function taba_acciones(){
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
        $crud->columns(['cuit','nombre','apellido']);
		$crud->display_as('cuit', 'CUIT');
        $crud->display_as('nombre','NOMBRE');
        $crud->display_as('apellido','APELLIDO');
		$crud->set_primary_key('cuit');
		
		$crud->unset_add();
		$crud->unset_clone();
		$crud->unset_delete();
		$output = $crud->render();
		$this->_example_output($output);

	}

	// public function customers_management()
	// {
	// 		$crud = new grocery_CRUD();

	// 		$crud->set_table('customers');
	// 		$crud->columns('customerName','contactLastName','phone','city','country','salesRepEmployeeNumber','creditLimit');
	// 		$crud->display_as('salesRepEmployeeNumber','from Employeer')
	// 			 ->display_as('customerName','Name')
	// 			 ->display_as('contactLastName','Last Name');
	// 		$crud->set_subject('Customer');
	// 		$crud->set_relation('salesRepEmployeeNumber','employees','lastName');

	// 		$output = $crud->render();

	// 		$this->_example_output($output);
	// }

	public function orders_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_relation('customerNumber','customers','{contactLastName} {contactFirstName}');
			$crud->display_as('customerNumber','Customer');
			$crud->set_table('orders');
			$crud->set_subject('Order');
			$crud->unset_add();
			$crud->unset_delete();

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function products_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('products');
			$crud->set_subject('Product');
			$crud->unset_columns('productDescription');
			$crud->callback_column('buyPrice',array($this,'valueToEuro'));

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function valueToEuro($value, $row)
	{
		return $value.' &euro;';
	}

	public function film_management()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('film');
		$crud->set_relation_n_n('actors', 'film_actor', 'actor', 'film_id', 'actor_id', 'fullname','priority');
		$crud->set_relation_n_n('category', 'film_category', 'category', 'film_id', 'category_id', 'name');
		$crud->unset_columns('special_features','description','actors');

		$crud->fields('title', 'description', 'actors' ,  'category' ,'release_year', 'rental_duration', 'rental_rate', 'length', 'replacement_cost', 'rating', 'special_features');

		$output = $crud->render();

		$this->_example_output($output);
	}

	public function film_management_twitter_bootstrap()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');
			$crud->set_table('film');
			$crud->set_relation_n_n('actors', 'film_actor', 'actor', 'film_id', 'actor_id', 'fullname','priority');
			$crud->set_relation_n_n('category', 'film_category', 'category', 'film_id', 'category_id', 'name');
			$crud->unset_columns('special_features','description','actors');

			$crud->fields('title', 'description', 'actors' ,  'category' ,'release_year', 'rental_duration', 'rental_rate', 'length', 'replacement_cost', 'rating', 'special_features');

			$output = $crud->render();
			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	// function multigrids()
	// {
	// 	$this->config->load('grocery_crud');
	// 	$this->config->set_item('grocery_crud_dialog_forms',true);
	// 	$this->config->set_item('grocery_crud_default_per_page',10);

	// 	$output1 = $this->offices_management2();

	// 	$output2 = $this->employees_management2();

	// 	$output3 = $this->customers_management2();

	// 	$js_files = $output1->js_files + $output2->js_files + $output3->js_files;
	// 	$css_files = $output1->css_files + $output2->css_files + $output3->css_files;
	// 	$output = "<h1>List 1</h1>".$output1->output."<h1>List 2</h1>".$output2->output."<h1>List 3</h1>".$output3->output;

	// 	$this->_example_output((object)array(
	// 			'js_files' => $js_files,
	// 			'css_files' => $css_files,
	// 			'output'	=> $output
	// 	));
	// }

	public function offices_management2()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('offices');
		$crud->set_subject('Office');

		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
	}

	public function employees_management2()
	{
		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');
		$crud->set_table('employees');
		$crud->set_relation('officeCode','offices','city');
		$crud->display_as('officeCode','Office City');
		$crud->set_subject('Employee');

		$crud->required_fields('lastName');

		$crud->set_field_upload('file_url','assets/uploads/files');

		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
	}

	// public function customers_management2()
	// {
	// 	$crud = new grocery_CRUD();

	// 	$crud->set_table('customers');
	// 	$crud->columns('customerName','contactLastName','phone','city','country','salesRepEmployeeNumber','creditLimit');
	// 	$crud->display_as('salesRepEmployeeNumber','from Employeer')
	// 		 ->display_as('customerName','Name')
	// 		 ->display_as('contactLastName','Last Name');
	// 	$crud->set_subject('Customer');
	// 	$crud->set_relation('salesRepEmployeeNumber','employees','lastName');

	// 	$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

	// 	$output = $crud->render();

	// 	if($crud->getState() != 'list') {
	// 		$this->_example_output($output);
	// 	} else {
	// 		return $output;
	// 	}
	// }

}
