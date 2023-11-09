<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once "UsuariosTrait.php";
require_once "LoginController.php";

$tags_to_delet = [null];

class Examples extends CI_Controller {

	use UsuariosTrait;
	
	public function __construct()	{
		parent::__construct();
		$this->load->model('observaciones_model');
		$this->load->model('mujeres_lideres');
		$this->load->model('sas_activo_model');
		$this->load->model('bada_celulares_model');
		// $this->load->model('tags_model');
		$this->load->model('accionar_tag_mogel');
		$this->load->model('tags_model');
		$this->load->model('tablas_model');
		$this->load->model('user_model');
		$filtros = $this->tags_model->get_tags_list();
		$_SESSION['filtros'] = $filtros;
		
	}

	public function vista($tabla){

		$vistas_disponibles= [
			"mujeres_lideres" 	=> ['tabla_vista' 			=> 'mujeres_lideres_view',
									'tabla_materializada'	=> 'mujeres_lideres',
									'titulo' 				=> 'Mujeres Lideres',
									'tags'					=> ['MUJERES LIDERES'] 
									//SE UTILZA PARA ELIMINER DE LA VISTA
									]
			,
			"jovenes"			=> ['tabla_vista'			=> 'jovenes_bada_celulares_view',
									'tabla_materializada'	=> 'sas_activo',
									'titulo'				=> 'Jovenes',
									'tags'					=> ['SUB 30','SUB 33']
									]
			,
			"coordinacion"		=> ['tabla_vista' 			=> 'coordinacion_planemiento_view',
									'tabla_materializada'	=> 'sas_activo',
									'titulo' 				=> 'Coordinacion y Planeamiento',
									'tags'					=> null
									]
		];

		
		

		if (!$this->verifySession()){
			return $this->debe_iniciar_sesion();
		}
		else {	
			if (isset($vistas_disponibles[$tabla])){
				$_SESSION['vista_']=$tabla;
				if (isset($vistas_disponibles[$tabla])){
					$this->encapsulamiento_(/* view */			$vistas_disponibles[$tabla]['tabla_vista'] ,
											/* materializada*/	$vistas_disponibles[$tabla]['tabla_materializada'],
											/* subject */		$vistas_disponibles[$tabla]['titulo'],
											/* titulo */ 		$vistas_disponibles[$tabla]['titulo'],
											/* filtro_vista */	null,
											/* de dnd venis */	$tabla,
											/* tgs de vista */  $vistas_disponibles[$tabla]['tags']);
				} else
				echo "No existe vista";
					
			}
		 else {
				$this->acceso_denegado();				
			}
		}
		
	}

	public function _example_output($output = null)
	{
		if ($this->verifySession()){
			$this->load->view('index/header');
			$this->load->view('index/styles');
			$this->load->view('index/navBar/navBarGrocery');
			$this->load->view('example.php',(array)$output);
			$this->load->view('index/footer');}
		else {
			$this->debe_iniciar_sesion();
		}
			
	}

	public function index()	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));	
	}

	public function Analitica_dashboard(){
		$crud = $crud = new Grocery_CRUD();						
		$crud->set_language('spanish-uy');
		$crud->set_table('log_uso_tablas');
		$crud->set_subject('Analiticas');
		$output = $crud->render();
		$this->_example_output($output);
        

    }

	public function table($tabla){	

		$tablas_activas = [
			'gabinete' 		=> [	'base' 		=> 'gabinete',
									'vista' 	=> 'gabinete_view',
									'titulo'	=> 'Gabinete',
									'subject'	=> 'Gabinete',
									'tags'					=> ['GABINETE']]
			,
			'secretarios' 	=> [	'base' 		=> 'secretarios',
									'vista' 	=> 'secretarios_view',
									'titulo'	=> 'Secretarios',
									'subject'	=> 'Secretario',
									'tags'					=> ['S']]
			,
			'subsecretarios' => [	'base' 		=> 'sub_secretarios',
									'vista' 	=> 'sub_secretarios_view',
									'titulo'	=> 'Sub Secretarios',
									'subject'	=> 'Sub Secretario',
									'tags'					=> ['SS']]
			,
			'ptes._comunas' => [	'base' 		=> 'ptes_comunas',
									'vista' 	=> 'ptes_comunas_view',
									'titulo'	=> 'Ptes. Comunas',
									'subject'	=> 'Pte. comuna',
									'tags'					=> ['PTES. COMUNAS']]
							,
			'legisladores' 	=> [	'base' 		=> 'legisladores',
									'vista' 	=> 'legisladores_view',
									'titulo'	=> 'Legisladores',
									'subject'	=> 'Legislador',
									'tags'					=> ['LEGISLADORES']]
							,
			'jdg'			 => [	'base' 		=> 'jdg',
									'vista' 	=> 'jdg_view',
									'titulo'	=> 'JDG',
									'subject'	=> 'JDG',
									'tags'					=> ['JDG']]
							,
			'dg' 			=> [	'base' 		=> 'dg',
									'vista' 	=> 'dg_view',
									'titulo'	=> 'DG',
									'subject'	=> 'DG',
									'tags'					=> ['DG']]
							,
			'go' 			=> [	'base' 		=> 'go',
									'vista' 	=> 'go_view',
									'titulo'	=> 'GO',
									'subject'	=> 'GO',
									'tags'					=> ['GO']]
							,
			'sas_activo' 	=> [	'base' 		=> 'sas_activo',
									'vista' 	=> 'sas_activo_view',
									'titulo'	=> 'SAS Activos',
									'subject'	=> 'Personal',
									'tags'					=> null]
							,
			'mujeres_lideres' => [	'base' 		=> 'mujeres_lideres',
									'vista' 	=> 'mujeres_lideres_view',
									'titulo'	=> 'Mujeres Lideres',
									'subject'	=> 'Mujer Lider',
									'tags'		=> ['MUJERES LIDERES'] ]
									//Se utiliza para agregar el tag cuando se crea]								]
									
							,
			'bada_celulares' => [	'base' 		=> 'bada_celulares',
									'vista' 	=> 'bada_celulares_view',
									'titulo'	=> 'Usuarios Bada',
									'subject'	=> 'Usuario Bada',
									'tags'					=> null]
							,
			'lideres_gcba' => 	[	'base' 		=> 'lideres_gcba',
									'vista' 	=> 'lideres_gcba_view',
									'titulo'	=> 'Líderes GCBA',
									'subject'	=> 'Líderes GCBA',
									'tags'					=> null]						
							,
			'lideres_gcba_hacienda' 
							=> 	[	'base' 		=> 'lideres_gcba',
									'vista' 	=> 'lideres_gcba_hacienda_view',
									'titulo'	=> 'Líderes GCBA - Hacienda',
									'subject'	=> 'Líderes GCBA - Hacienda',
									'tags'					=> null]
									,
			'secretarias_particular' 
							=> 	[	'base' 		=> 'secretarias_particular',
									'vista' 	=> 'secretarias_particular_view',
									'titulo'	=> 'Secretarias Particular',
									'subject'	=> 'Secretarias Particular',
									'tags'					=> null]
								
			// lideres_gcba_hacienda
		];

		
		if (!$this->verifySession()){
			return $this->debe_iniciar_sesion();
		}
		else {

			// var_dump($tablas_activas[$tabla]['vista_mat']);
			if (isset($tablas_activas[$tabla])){
				$this->encapsulamiento_($tablas_activas[$tabla]['vista'],  	//1
										$tablas_activas[$tabla]['base'],	//2
										$tablas_activas[$tabla]['subject'],	//3
										$tablas_activas[$tabla]['titulo'],	//4
										null,								//5
										null,								//6
										$tablas_activas[$tabla]['tags']);	//7
										
			}
			

			else {
				
				if ($tabla == 'tags'){
					$this->tags_();
				} elseif($tabla == 'afiliados') 
					$this->outside_table($tabla);
				
			}
		}
	}

	public function outside_table($tabla = 'cuit_tag'){
		

		$crud = $crud = new Grocery_CRUD();						
		$crud->set_language('spanish-uy');
		$crud->set_table($tabla);
		if ($tabla != 'tags' && $tabla != 'afiliados' && $tabla != 'log_uso_tablas_view')
			$crud->set_primary_key('cuit',$tabla);
		else {
			$_SESSION['table'] = $tabla;
			// $crud->set_primary_key('id',$tabla);
		}
		if ($tabla == 'tags') $this->tags_();
		else {
			$crud->set_subject( strtoupper($tabla));
			$output = $crud->render();
			// LOGDE USO
			$data = [
				'cuit' => $this->session->cuit,
				'accion' => 'INGRESO',
				'nombre' => $tabla
			];
			
			 $this->db->insert('log_uso_tablas', $data);


			$this->_example_output($output);
		}
				

	}

	public function tags_(){
		//Tabla materializada TAGS
		$crud = new Grocery_CRUD();

		$data = [
			'cuit' => $this->session->cuit,
			'accion' => 'INGRESO',
			'nombre' => 'TAGS'
		];
		
		 $this->db->insert('log_uso_tablas', $data);
		$crud->set_theme('bootstrap');
		$crud->set_language('spanish-uy');
		$crud->set_table('tags');
		$crud->set_subject( 'TAGS');

		$this->session->set_flashdata('table','tags');
		
		$crud->callback_before_delete(array($this,'action_befor_delete'));
		$crud->callback_after_insert(array($this, 'action_befor_insert'));
		$crud->callback_before_update(array($this,'action_befor_update'));

		$output = $crud->render();
		$this->_example_output($output);

	}

	public function nuevo_registro(){
		$tabla = $_SESSION['table'];
		var_dump($tabla);
	}


									// 1			2					3			4	5						6				7
	public function encapsulamiento_($tabla_view,$tabla_materializada,$subject,$titulo,$filtro_vista = null, $vista_ = null, $tags = null){
			
		$crud = new grocery_CRUD;
		
				$crud->set_theme('bootstrap');
				$crud->set_language('spanish-uy');
				$crud->set_table("{$tabla_view}");
				$crud->set_subject("{$subject}");
				$crud->set_primary_key('cuit',"{$tabla_view}");

				$crud->set_primary_key('id','tags');
				$crud->set_relation_n_n('tags','cuit_tag','tags','cuit','id_tag','nombre',null,array('id',1));
				
				// $crud->where('tags','1');
						
				//Se guarda el nombre de la tabla materializada
				$this->session->set_flashdata('table',"{$tabla_materializada}");
				$_SESSION['tabla'] = "{$tabla_materializada}";
			

				$this->session->set_flashdata('tags_to_delete',$tags);
				
				if (isset($vista_)){
					$_SESSION['vista_'] = $vista_;
					$crud
						->unset_edit()
						->unset_delete()
						->unset_clone()
						->unset_read()
						->unset_add(); 
						
						
				} else 
					$_SESSION['vista_'] = null;
				
				$crud
						->unset_edit()
						->unset_delete()
						->unset_clone()
						->unset_read()
						//->unset_add(); 
						;
					
				

				//Acciones de vista-> desplegables	
				$cuit = $_SESSION['cuit'];
				$permission = $this->user_model->get_permission_user($cuit);
				if ($permission == 'SU' || $permission == "CREATE" ){
					$crud	
						->add_action(	'Editar datos de contacto', '', 'examples/cambiar_datos_personales');
						if ($tabla_materializada != 'sas_activo')
							$crud->add_action(	"Editar atributos de {$titulo}", '' ,'examples/editar_atributos');
						else
							$crud->unset_columns(['virtual']);
						$crud->add_action(	'Ver registro completos', '',"materialized_table/read")
						//->add_action(	'Observaciones', '','examples/ver_observaciones')
						->add_action(	'TAGS', '',"examples/tags")
						->add_action(	'Eliminar', '',"examples/eliminar")
						;
				} else if ($permission == "VIEW"){
					$crud	
						->add_action(	'Ver registros completo', '',"materialized_table/read")
						//->add_action(	'Observaciones', '','examples/ver_observaciones')
						->unset_add()
						;

				} else if ($permission == "UPDATE"){
					$crud	
						->add_action(	'Editar datos de contacto', '', 'examples/cambiar_datos_personales');
						if ($tabla_materializada != 'sas_activo')
							$crud->add_action(	"Editar atributos de {$titulo}", '' ,'examples/editar_atributos');
						else
							$crud->unset_columns(['virtual']);
						$crud->add_action(	'Ver registro completo', '',"materialized_table/read")
						//->add_action(	'Observaciones', '','examples/ver_observaciones')
						->add_action(	'TAGS', '',"examples/tags")
						->unset_add()
						;

				}
				
				$crud->callback_before_delete(array($this,'action_befor_delete'));
				$crud->callback_after_insert(array($this, 'action_befor_insert'));
				$crud->callback_before_update(array($this,'action_befor_update'));

				$campos_extra = [
					'mujeres_lideres' 	=> ['campos_extra' 	=> ['edicion']],
					'lideres_gcba'		=> ['campos_extra'	=> ['hacienda','chisme','equivalente','gabinete']]
				];

				$fields = ['cuit','documento','apellido','nombre','genero','fecha_nacimiento','telefono_particular','mail','provincia','comuna','barrio_normalizado','regimen','tarea','ministerio','secr','ss','dg'];
				
				if (isset($campos_extra[$tabla_materializada])){
					foreach ($campos_extra[$tabla_materializada]['campos_extra'] as $campo_extra){
						array_push($fields, $campo_extra);
					}
				}
				// if ($tabla_view == 'mujeres_lideres_view'){
				// 	array_push($fields, "edicion");
				// }
				array_push($fields,'tags');
				$crud->columns($fields);

				$crud	->display_as('secr', 'SECR')
						->display_as('ss', 'SS')
						->display_as('dg', 'DG')

						
						// AGREGADOS POR MATHI
						->display_as('genero', 'Género')
						->display_as('cuit', 'CUIT')
						->display_as('fecha_nacimiento', 'Fecha de nacimiento')
						->display_as('telefono_particular', 'Teléfono particular')
						->display_as('regimen', 'Régimen')
						
						;
				
				$output = $crud->render();
				// ------
				$data = [
					'cuit' => $this->session->cuit,
					'accion' => 'INGRESO',
					'nombre' => $tabla_materializada
				];
				
				$this->db->insert('log_uso_tablas', $data);
				// --------
				$this->_example_output($output);

	}

	public function crud_to_delete_without_tags(){
		//Se va a utilizar solo para eliminar los registros de las tablas materializadas, para que no se eliminen todos los tags asignados

		$tabla = $_SESSION['tabla'];

		$crud = new grocery_CRUD;
		$crud->set_theme('bootstrap');
		$crud->set_language('spanish-uy');
		$crud->set_table($tabla);
		$crud->set_primary_key('cuit',$tabla);

		$crud->callback_before_delete(array($this,'action_befor_delete'));
		$crud->callback_after_insert(array($this, 'action_befor_insert'));
		$crud->callback_before_update(array($this,'action_befor_update'));

		$output = $crud->render();
		$this->_example_output($output);
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

	// public function tabla_afiliados(){
	// 	// Esta tabla no puede ser filtrada porque esta indexada por DNI
	// 	if (!$this->verifySession()){
	// 		return $this->debe_iniciar_sesion();
	// 	}
	// 	else {		
	// 	if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
	// 		in_array('AFILIADOS', array_column($this->session->acceso,'nombre')) ){
	// 			$crud = new grocery_CRUD;
	// 			$crud->set_theme('bootstrap');
	// 			$crud->set_language('spanish-uy');
	// 			$crud->set_table('afiliados');
	// 			$crud->set_subject('Afiliado');
	// 			$crud->columns(['comuna','barrio','nombre','apellido','sexo','dni','fecha_nacimiento','fecha_afiliacion','ocupacion','direccion']);
				
	// 			$this->session->set_flashdata('table','afiliados');
	// 			$_SESSION['tabla'] = "Afiliados"; // Titulo para el encabezado del crud

	// 			$crud->callback_before_delete(array($this,'action_befor_delete'));
	// 			$crud->callback_after_insert(array($this, 'action_befor_insert'));
	// 			$crud->callback_before_update(array($this,'action_befor_update'));

	// 			$output = $crud->render();
	// 			$this->_example_output($output);
	// 		} else {
	// 			$this->acceso_denegado();				
	// 		}
	// 	}

		
	// }

	// public function tabla_mujeres_lideres(){
	// 	if (!$this->verifySession()){
	// 		return $this->debe_iniciar_sesion();
	// 	}
	// 	else {	
	// 	if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
	// 		in_array('MUJERES LIDERES', array_column($this->session->acceso,'nombre')) ){
	// 			$crud = new grocery_CRUD;
	// 			$crud->set_theme('bootstrap');
	// 			$crud->set_language('spanish-uy');
	// 			$crud->set_primary_key('cuit','mujeres_lideres_view');
	// 			$crud->set_table('mujeres_lideres_view');
	// 			$crud->set_subject('Mujer Lider');

	// 			$this->session->set_flashdata('table','mujeres_lideres');
	// 			$_SESSION['tabla'] = "Mujeres Lideres";

	// 			//$crud->callback_before_delete(array($this,'action_befor_delete')); !TODO revisar
	// 			//$crud->callback_after_insert(array($this, 'action_befor_insert')); !TODO revisar
	// 			//$crud->callback_before_update(array($this,'action_befor_update')); !TODO revisar
	// 			//$crud->callback_after_update(array($this,'before_update_mujeres_lideres'));
				
	// 			$crud->set_primary_key('id','tags');
	// 			$crud->set_relation_n_n('tags','cuit_tag','tags','cuit','id_tag','nombre');

	// 			$filtro_columna = $this->session->filtro_col;

	// 			//Filtros de SESSION-USUARIO
	// 			// Es neceario que la tabla tenga el conjunto listado de todos los tags como atributo "tag_list"
	// 			$filtro_session	= $this->session->filtro_session;
	// 			if (empty($filtro_session) !== true) {
	// 				foreach($filtro_session as $filtro){
	// 					$crud->or_where("tag_list LIKE '%{$filtro['nombre']}%'");
	
	// 				}
	// 			}

	// 			//Filtros de BUSQUEDA por TAG
	// 			//Es neceario que la tabla tenga el conjunto listado de todos los tags como atributo "tag_list"
	// 			$filtro_busqueda = $this->session->filtro_busqueda_query;
	// 			// var_dump($filtro_busqueda);
	// 			// if (isset($filtro_columna)) var_dump($filtro_columna);
	// 			if (isset($filtro_busqueda)){
	// 				if (isset($filtro_columna))
	// 					$crud->where("({$filtro_busqueda}) AND {$filtro_columna}");
	// 				else
	// 					$crud->where($filtro_busqueda);
	// 			} else
	// 				if (isset($filtro_columna))
	// 					$crud->where($filtro_columna);

	// 			//Configuracion de acciones por defecto 
	// 			// -> Si estan si setear no se pueden utilizar de ningna forma	
	// 			$crud	//->unset_add()
	// 					->unset_edit()
	// 					->unset_delete()
	// 					->unset_clone()
	// 					->unset_read()
	// 					->unset_columns('tag_list')
	// 					->add_fields('cuit','edicion')
	// 					;

	// 			$crud	->add_action(	'Editar Datos de Contacto',  base_url.'assets/icons/datos_personales.png', 'examples/cambiar_datos_personales')
	// 					->add_action(	'Editar Atributos de Mujer Lider', base_url.'assets/icons/contact_page_FILL0_wght400_GRAD0_opsz24.png','examples/editar_atributos')
	// 					->add_action(	'Ver Registros completo', base_url.'assets/icons/search_FILL0_wght400_GRAD0_opsz24.png','examples/mujeres_lideres/read')
	// 					->add_action(	'Observaciones', base_url.'assets/icons/more.png','examples/ver_observaciones','ui-icon-image')
	// 					// ->add_action(	'Borrar registro', base_url.'assets/icons/delete_FILL0_wght400_GRAD0_opsz24.png','examples/delete','ui-icon-image')
	// 					// ->callback_insert(array($this,'probando_add'))
	// 					;
				
	// 			$crud	->columns(['cuit','documento','apellido','nombre','genero','fecha_nacimiento','telefono_particular','mail','provincia','comuna','barrio_normalizado','edicion','regimen','tarea','ministerio','secr','tags']);
				
	// 			$crud	->display_as('secr', 'SECR')
	// 					->display_as('ss', 'SS')
	// 					->display_as('dg', 'DG')
	// 					;							
	// 			$output = $crud->render();
	// 			$this->_example_output($output);
	// 		}else {
	// 			$this->acceso_denegado();				
	// 		}
	// 	}
	// }

	// public function probando_add(){
	// 	redirect('examples/mujeres_lideres/add');
	// }

	// public function delete($pk){
	// 	//Es necesario traer el nombre de la tabla de la cual venis para indicarle a cual tabla debe ir
	// 	$tabla = $this->session->flashdata('table');

	// 	if ($tabla !== 'mujeres_lideres'){
	// 		$tabla = "tabla_{$tabla}";
	// 		$volver = $tabla;
	// 	} else{ 
	// 		$volver = "tabla_{$tabla}";
	// 	}
			

		
	// 	// Obtenemos el CUIT para consultar los accesos de usuario, tablas, tags que puede modificar
	// 	// Y sobre que registros puede accionar
	// 	$cuit_usuario = $this->session->cuit;
	// 	$accesos_usuario = $this->accionar_tag_mogel->get_actioned_tags($cuit_usuario);
	// 	$tags_registro = $this->tags_model->get_tags_by_cuit($pk);

	// 	// Verificar si alguno de los tags son los principales del usuario
	// 	$tiene_acceso = false;
	// 	foreach($tags_registro as $tag_reg)
	// 		foreach ($accesos_usuario as $acc_us)
	// 			if ($tag_reg == $acc_us)
	// 				$tiene_acceso = true;

	// 	if ($tiene_acceso) 
	// 		{ 
	// 			echo "EN PROCESO";
	// 			// Hay que hacer un delete desde el modelo
	// 		}
				
				
		
	// 	else $this->sin_acceso_tag_principal();

	// }



	public function tags($pk){
			//Esto es para los tags de contactos
			//NO es para la tabla tags!

		
		//Es necesario traer el nombre de la tabla de la cual venis para indicarle a cual tabla debe ir
		$table = $this->session->flashdata('table');	
		$this->session->set_flashdata('table',"{$table}");
		

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

		$query = $this->db->query('SELECT cuit FROM bada_celulares WHERE cuit = '. $pk .'');

		//Si no existe el registro en bada_celulares lo crea y escribe sobre las columnas duplicadas
		// if (!$query->result()){
		// 	$this->db->query("INSERT INTO `bada_celulares` (`id`, `fecha`, `celular_bada`, `celular_flota`, 
		// 	`mail`, `ok`, `cuit`, `calle_bada`, `altura_bada`, `departamento_bada`, `piso_bada`, `provincia_bada`,
		// 		`edificio_laboral_bada`, `rol_bada`, `barrio`, `localidad`, `seccion`, `barrio_normalizado`, 
		// 		`lat`, `lon`, `comuna`, `created_at`, `updated_at`, `intereses`, `notificaciones`, `provincia_bada_bu`, 
		// 		`comuna_bu`, `calle_bada_bu`, `altura_bada_bu`, `departamento_bada_bu`, `celular_bada_bu`, `mail_bu`, 
		// 		`barrio_normalizado_bu`, `celular_flota_bu`) 
		// 		VALUES (NULL, CURRENT_TIMESTAMP, '', NULL, '', NULL, '{$pk}', NULL, NULL, NULL, NULL, NULL, NULL, NULL,
		// 		NULL, NULL, NULL, NULL, NULL, NULL, NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, NULL, NULL, NULL, NULL,
		// 		NULL, NULL, NULL, NULL, NULL, NULL, NULL) ");
		// }

		

		if ($tiene_acceso) {
			redirect("tag_contacto/edit/{$pk}");
		}
			
		else $this->sin_acceso_tag_principal();


	}

	public function tag_contacto($pk = null) {
		$crud = new grocery_CRUD;
		$crud->set_theme('bootstrap');
		$crud->set_language('spanish-uy');
		// $crud->set_table('tags');

		// $crud->set_relation_n_n('tagsss','cuit_tag','bada_celulares','id_tag','cuit','cuit');
		
		$crud->set_table('bada_celulares');

		$crud->set_primary_key('cuit','bada_celulares');

		$crud->set_primary_key('id','tags');
		$crud->set_relation_n_n('tags','cuit_tag','tags','cuit','id_tag','nombre');

		 $crud->change_field_type('cuit','hidden');

		// $crud->unset_edit_fields('cuit');
		 $crud->edit_fields('cuit','tags');
		//	$crud->unset_edit_fields('cuit'); 
		$output = $crud->render();
		$this->_example_output($output);
	}

	public function tiene_acceso_a_tag($pk){
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

		
		return $tiene_acceso;


	}


	public function editar_atributos($pk){
		
		//Es necesario traer el nombre de la tabla de la cual venis para indicarle a cual tabla debe ir
		$table = $this->session->flashdata('table');	
		$this->session->set_flashdata('table',"{$table}");
		


		if ($this->tiene_acceso_a_tag($pk)) 
			redirect("atributos_/edit/{$pk}");
		else $this->sin_acceso_tag_principal();

	}

	// public function mujeres_lideres(){
	// 	if (!$this->verifySession()){
	// 		return $this->debe_iniciar_sesion();
	// 	}
	// 	else {	
	// 	if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
	// 		in_array('MUJERES LIDERES', array_column($this->session->acceso,'nombre')) ){
	// 			$crud = new grocery_CRUD;
	// 			$crud->set_theme('bootstrap');
	// 			$crud->set_language('spanish-uy');
	// 			$crud->set_primary_key('cuit','mujeres_lideres');
	// 			$crud->set_table('mujeres_lideres');
	// 			$crud->set_subject('Mujer Lider');
	// 			$crud	->fields('edicion')
	// 					->add_fields('cuit','edicion');

	// 			$this->session->set_flashdata('table','mujeres_lideres');
	// 			$_SESSION['tabla'] = "Mujeres Lideres";

	// 			$crud->callback_before_delete(array($this,'action_befor_delete')); //!TODO revisar
	// 			$crud->callback_after_insert(array($this, 'action_befor_insert')); //!TODO revisar
	// 			$crud->callback_before_update(array($this,'action_befor_update')); //!TODO revisar
				
	// 			//$crud->set_relation_n_n('tags','cuit_tag','tags','cuit','id_tag','nombre');				
	// 			//$crud->unset_add()->unset_edit()->unset_delete();

	// 			$output = $crud->render();
	// 			$this->_example_output($output);
	// 		}else {
	// 			$this->acceso_denegado();				
	// 		}
	// 	}
	// }

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

	public function materialized_table(){

		$tags = $this->session->flashdata('tags_to_delete');
		$this->session->set_flashdata('tags_to_delete',$tags);

		$tabla_materializada = $this->session->flashdata('table');	
		$this->session->set_flashdata('table',"{$tabla_materializada}");

		//Se guarda el nombre de la tabla materializada
		$this->session->set_flashdata('table',"{$tabla_materializada}");
		$_SESSION['tabla'] = "{$tabla_materializada}";


	
		$crud = new grocery_CRUD;
				$crud->set_theme('bootstrap');
				$crud->set_language('spanish-uy');
				$crud->set_table("{$tabla_materializada}");
				// $crud->set_subject("{$subject}");
				$crud->set_primary_key('cuit',"{$tabla_materializada}");

				$crud->set_primary_key('id','tags');
				$crud->set_relation_n_n('tags','cuit_tag','tags','cuit','id_tag','nombre');

				

				if ($tabla_materializada == 'sas_activo'){
					$crud->unset_add_fields('tags','virtual','virtual2','virtual3','virtual4');
				}
				else
				
				$crud->unset_add_fields('tags');			
				
				$crud
						// ->unset_edit()
						->unset_clone()
						// ->unset_read()
						;
					
				

				//Acciones de vista-> desplegables	
				$cuit = $_SESSION['cuit'];
				$permission = $this->user_model->get_permission_user($cuit);
				if ($permission == 'SU' || $permission == "CREATE" ){
					$crud	
						->add_action(	'Editar Datos de Contacto', '', 'examples/cambiar_datos_personales')
						->add_action(	"Editar Atributos de {$tabla_materializada}", '' ,'examples/editar_atributos')
						->add_action(	'Ver Registros completo', '',"examples/{$tabla_materializada}/read")
						//->add_action(	'Observaciones', '','examples/ver_observaciones')
						->add_action(	'Eliminar', '',"examples/eliminar")
						;
				} else if ($permission == "VIEW"){
					$crud	
						->add_action(	'Ver Registros completo', '',"examples/{$tabla_materializada}/read")
						//->add_action(	'Observaciones', '','examples/ver_observaciones')
						->unset_add()
						;

				} else if ($permission == "UPDATE"){
					$crud	
						->add_action(	'Editar Datos de Contacto', '', 'examples/cambiar_datos_personales')
						->add_action(	"Editar Atributos de {$tabla_materializada}", '' ,'examples/editar_atributos')
						->add_action(	'Ver Registros completo', '',"examples/{$tabla_materializada}/read")
						//->add_action(	'Observaciones', '','examples/ver_observaciones')
						->unset_add()
						;

				}

				
				
				// $crud->callback_before_delete(array($this,'action_befor_delete'));

				
				
				$crud->callback_after_insert(array($this, 'action_befor_insert'));
				$crud->callback_before_update(array($this,'action_befor_update'));
				

				$fields = ['cuit','documento','apellido','nombre','genero','fecha_nacimiento','telefono_particular','mail','provincia','comuna','barrio_normalizado','regimen','tarea','ministerio','secr'];
				if ($tabla_materializada == 'mujeres_lideres_view'){
					array_push($fields, "edicion");
				}
				array_push($fields,'tags');
				
				$crud->columns($fields);
				$crud->field_type('cuit','integer');

				//Si es hacienda ---> hay que relevar el tipo de datos de cada 
					$crud->field_type('hacienda','string');
					$crud->field_type('chisme','string');
					$crud->field_type('equivalente','string');
					$crud->field_type('gabinete','string');
					$crud->field_type('ministerio','string');
					$crud->field_type('strong','string');
				
								
				$crud	->display_as('secr', 'SECR')
						->display_as('ss', 'SS')
						->display_as('dg', 'DG')
						;
				
				$output = $crud->render();
				$this->_example_output($output);

	}


	public function atributos_(){
		
		$tabla_materializada = $this->session->flashdata('table');		
		$this->session->set_flashdata('table',"{$tabla_materializada}");
		
		
		$crud = new grocery_CRUD;
				$crud->set_theme('bootstrap');
				$crud->set_language('spanish-uy');
				$crud->set_table($tabla_materializada);
				$crud->set_primary_key('cuit',$tabla_materializada);

						
				//Se guarda el nombre de la tabla materializada
				$this->session->set_flashdata('table',$tabla_materializada);
				$_SESSION['tabla'] = $tabla_materializada;
				
				
				$fields = [];

				if ($tabla_materializada == 'mujeres_lideres')
					array_push($fields,'edicion');
				
				$crud->fields($fields);

				$crud->field_type('cuit','integer');

				//Si es hacienda ---> hay que relevar el tipo de datos de cada 
				$crud->field_type('hacienda','string');
				$crud->field_type('chisme','string');
				$crud->field_type('equivalente','string');
				$crud->field_type('gabinete','string');
				$crud->field_type('ministerio','string');
				$crud->field_type('strong','string');
								

				
				$output = $crud->render();
				$this->_example_output($output);
	}

	
	public function eliminar($pk){
		if (!$this->verifySession()){
			return $this->debe_iniciar_sesion();
		}
		else {	

			if ($this->tiene_acceso_a_tag($pk)) {
				$table = $this->session->flashdata('table');	
			$this->session->set_flashdata('table',"{$table}");
			// $this->materialized_table($table,$table,$table);
			//$variable = file_get_contents("materialized_table/delete/{$primary_key}" , true);
			//var_dump(site_url($variable));
			$tags = $this->session->flashdata('tags_to_delete');

			//Tengo que saber si es vista, solo elimino los TAGS
			//Si es tabla materializada -> Eliminar CUIT de la tabla [Materializada y TAGS]
			if (isset( $_SESSION['vista_'])){
				///ES VISTA
				if (!is_null($tags)){
					//echo "aca hay que seguir y enviar a funcion para sacar los tags del cuit" ;
					$this->sacar_tags_del_cuit($pk,$tags);
					redirect('/ingreso');

				}
				else
					{ //echo "NO HAY TAGS";
						redirect('/ingreso'); 
					};

			}
			else{
				///ES MATERIALIZADA
				//$this->eliminar_cuit_de_tags($pk);
				(!is_null($tags)) ? $this->sacar_tags_del_cuit($pk,$tags) : false;
				//Tengo que eliminar el registrod e la materializada
				//Tengo que eliminar solo el tag que le corresponde a la materializada --> Es el script que tengo en el echo
				echo "<script>
					
				async function getData() {
					let url  = 'http://' + window.location.hostname + '/codeigniter3/index.php/ingreso'
					let respuesta = await fetch('http://wamp-viejo/codeigniter3/index.php/examples/crud_to_delete_without_tags/delete/{$pk}')
					let resp = await respuesta.json()
					if (resp.success == true) {
						console.log('fue true')
						window.location.href  = url }
					else {
					 console.log('falso')
				
					};
					
				}
				document.addEventListener('DOMContentLoaded', function(event) {
					getData();
					
						
				})
					
				</script>";

			}

			}
			
		else $this->sin_acceso_tag_principal();
			


			
		}	
	}

	public function sacar_tags_del_cuit($cuit,$tags){
		$this->tags_model->delete_tags_from_cuit($cuit,$tags);
	}

	public function eliminar_cuit_de_tags($cuit){
		$this->tags_model->delete_cuit_from_tags($cuit);
	}
	

	public function tabla_observaciones(){
		if (!$this->verifySession()){
			return $this->debe_iniciar_sesion();
		}
		else {
			
			$tabla = $this->session->flashdata('table'); 	//Recupero del flash -> se borra
			$this->session->set_flashdata('table',$tabla);	//Lo vuelvo a designar de forma global
			$_SESSION['tabla'] = "Observaciones - {$tabla}";
			$cuit_user = $this->session->cuit;
			$user_name = $this->session->user_name;

			
			$titulo = strtoupper(str_replace("_"," ",$tabla));


			$crud = new grocery_CRUD;
			$crud->set_theme('bootstrap');
			$crud->set_subject("observacion a {$titulo}");

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


			// $crud->fields('cuit_tabla','observacion','resuelto','tabla','cuit_user','user_name');
			$crud->field_type('tabla','hidden',$tabla);
			$crud->field_type('cuit_user','hidden',$this->session->cuit);
			$crud->field_type('user_name','hidden',$this->session->user_name);
			$crud->change_field_type('observacion','string');
			$output = $crud->render();
			$this->_example_output($output);
			
		}		

	}


	// //Modificada para el view
	// public function tabla_gabinete(){
	// 	if (!$this->verifySession()){
	// 		return $this->debe_iniciar_sesion();
	// 	}
	// 	else {	
	// 	if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
	// 		in_array('GABINETE', array_column($this->session->acceso,'nombre')) ){
	// 			$this->encapsulamiento_("gabinete_view","gabinete","Personal","Gabinete");
	// 		} else {
	// 			$this->acceso_denegado();				
	// 		}
	// 	}
	// }

	// public function gabinete(){
	// 	if (!$this->verifySession()){
	// 		return $this->debe_iniciar_sesion();
	// 	}
	// 	else {	
	// 	if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
	// 		in_array('GABINETE', array_column($this->session->acceso,'nombre')) ){
	// 			$crud = new grocery_CRUD;
	// 			$crud->set_theme('bootstrap');
	// 			$crud->set_language('spanish-uy');
	// 			$crud->set_table('gabinete');
	// 			$crud->set_subject('Personal');
	// 			$crud->set_primary_key('cuit','gabinete');
	// 			$crud->set_relation_n_n('tags','cuit_tag','tags','cuit','id_tag','nombre');
				
	// 			$table = "gabinete";
	// 			$table = strtoupper($table);
	// 			$this->session->set_flashdata('table','gabinete');
	// 			$_SESSION['tabla'] = "Gabinete";

	// 			$crud
	// 					// ->unset_edit()
	// 					// ->unset_delete()
	// 					// ->unset_clone()
	// 					;

	// 			$crud	
	// 					//->add_action(	'Editar Datos de Contacto',  base_url.'assets/icons/datos_personales.png', 'examples/cambiar_datos_personales')
	// 					->add_action(	"Editar Atributos de {$table}", base_url.'assets/icons/contact_page_FILL0_wght400_GRAD0_opsz24.png','examples/editar_atributos')
	// 					//->add_action(	'Ver Registros completo', base_url.'assets/icons/search_FILL0_wght400_GRAD0_opsz24.png','examples/tabla_mujeres_lideres/read','ui-icon-image')
	// 					->add_action(	'Observaciones', base_url.'assets/icons/more.png','examples/ver_observaciones','ui-icon-image')
	// 					//->callback_insert(array($this,'probando_add'))
	// 					;

	// 			$crud->callback_before_delete(array($this,'action_befor_delete'));
	// 			$crud->callback_after_insert(array($this, 'action_befor_insert'));
	// 			$crud->callback_before_update(array($this,'action_befor_update'));
				
	// 			$output = $crud->render();
	// 			$this->_example_output($output);
	// 		} else {
	// 			$this->acceso_denegado();				
	// 		}
	// 	}
	// }

	// //Modificada para el view
	// public function tabla_secretarios(){
	// 	if (!$this->verifySession()){
	// 		return $this->debe_iniciar_sesion();
	// 	}
	// 	else {	
	// 	if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
	// 		in_array('SECRETARIOS', array_column($this->session->acceso,'nombre')) ){
	// 			$this->encapsulamiento_("secretarios_view","secretarios","Personal","Secretarios");
	// 		} else {
	// 			$this->acceso_denegado();				
	// 		}
	// 	}
	// }

	// public function secretarios(){
	// 	if (!$this->verifySession()){
	// 		return $this->debe_iniciar_sesion();
	// 	}
	// 	else {	
	// 	if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
	// 		in_array('SECRETARIOS', array_column($this->session->acceso,'nombre')) ){
	// 			$crud = new grocery_CRUD;
	// 			$crud->set_theme('bootstrap');
	// 			$crud->set_language('spanish-uy');
	// 			$crud->set_table('secretarios');
	// 			$crud->set_subject('Personal');
	// 			$crud->set_primary_key('cuit','secretarios');
	// 			$crud->set_relation_n_n('tags','cuit_tag','tags','cuit','id_tag','nombre');
				
	// 			$this->session->set_flashdata('table','secretarios');
	// 			$_SESSION['tabla'] = "Secretarios";

	// 			$crud->callback_before_delete(array($this,'action_befor_delete'));
	// 			$crud->callback_after_insert(array($this, 'action_befor_insert'));
	// 			$crud->callback_before_update(array($this,'action_befor_update'));
				
	// 			$output = $crud->render();
	// 			$this->_example_output($output);
	// 		} else {
	// 			$this->acceso_denegado();				
	// 		}
	// 	}
	// }

	// //Modificada para el view
	// public function tabla_SubSecretarios(){
	// 	if (!$this->verifySession()){
	// 		return $this->debe_iniciar_sesion();
	// 	}
	// 	else {	
	// 	if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
	// 		in_array('SUBSECRETARIOS', array_column($this->session->acceso,'nombre')) ){
	// 			$this->encapsulamiento_("sub_secretarios_view","SubSecretarios","Personal","SubSecretarios");
	// 		} else {
	// 			$this->acceso_denegado();				
	// 		}
	// 	}
	// }

	// public function SubSecretarios(){
	// 	if (!$this->verifySession()){
	// 		return $this->debe_iniciar_sesion();
	// 	}
	// 	else {	
	// 	if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
	// 		in_array('SUBSECRETARIOS', array_column($this->session->acceso,'nombre')) ){
	// 			$crud = new grocery_CRUD;
	// 			$crud->set_theme('bootstrap');
	// 			$crud->set_language('spanish-uy');
	// 			$crud->set_table('sub_secretarios');
	// 			$crud->set_subject('Personal');
	// 			$crud->set_primary_key('cuit','sub_secretarios');
	// 			$crud->set_relation_n_n('tags','cuit_tag','tags','cuit','id_tag','nombre');
				
	// 			$this->session->set_flashdata('table','sub_secretarios');
	// 			$_SESSION['tabla'] = "SubSecretarios";

	// 			$crud->callback_before_delete(array($this,'action_befor_delete'));
	// 			$crud->callback_after_insert(array($this, 'action_befor_insert'));
	// 			$crud->callback_before_update(array($this,'action_befor_update'));

	// 			$output = $crud->render();
	// 			$this->_example_output($output);
	// 		} else {
	// 			$this->acceso_denegado();				
	// 		}
	// 	}
	// }

	// //Modificado para el view
	// public function tabla_ptesComunas(){
	// 	if (!$this->verifySession()){
	// 		return $this->debe_iniciar_sesion();
	// 	}
	// 	else {	
	// 	if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
	// 		in_array('PTES. COMUNAS', array_column($this->session->acceso,'nombre')) ){
	// 			$this->encapsulamiento_("ptes_comunas_view","ptesComunas","Personal","Presidentes Comunas");
	// 		} else {
	// 			$this->acceso_denegado();				
	// 		}
	// 	}
	// }

	// public function ptesComunas(){
	// 	if (!$this->verifySession()){
	// 		return $this->debe_iniciar_sesion();
	// 	}
	// 	else {	
	// 	if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
	// 		in_array('PTES. COMUNAS', array_column($this->session->acceso,'nombre')) ){
	// 			$crud = new grocery_CRUD;
	// 			$crud->set_theme('bootstrap');
	// 			$crud->set_language('spanish-uy');
	// 			$crud->set_table('ptes_comunas');
	// 			$crud->set_subject('Personal');
	// 			$crud->set_primary_key('cuit','ptes_comunas');
	// 			$crud->set_relation_n_n('tags','cuit_tag','tags','cuit','id_tag','nombre');

	// 			$this->session->set_flashdata('table','ptes_comunas');
	// 			$_SESSION['tabla'] = "Ptes. Comuna";

	// 			$crud->callback_before_delete(array($this,'action_befor_delete'));
	// 			$crud->callback_after_insert(array($this, 'action_befor_insert'));
	// 			$crud->callback_before_update(array($this,'action_befor_update'));

	// 			$output = $crud->render();
	// 			$this->_example_output($output);
	// 		} else {
	// 			$this->acceso_denegado();				
	// 		}
	// 	}
	// }

	// public function tabla_Legisladores(){
	// 	if (!$this->verifySession()){
	// 		return $this->debe_iniciar_sesion();
	// 	}
	// 	else {	
	// 	if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
	// 		in_array('LEGISLADORES', array_column($this->session->acceso,'nombre')) ){
	// 			$this->encapsulamiento_("legisladores_view","legisladores","Personal","Legisladores");
	// 		} else {
	// 			$this->acceso_denegado();				
	// 		}
	// 	}
	// }

	// public function Legisladores(){
	// 	if (!$this->verifySession()){
	// 		return $this->debe_iniciar_sesion();
	// 	}
	// 	else {	
	// 	if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
	// 		in_array('LEGISLADORES', array_column($this->session->acceso,'nombre')) ){
	// 			$crud = new grocery_CRUD;
	// 			$crud->set_theme('bootstrap');
	// 			$crud->set_language('spanish-uy');
	// 			$crud->set_table('legisladores');
	// 			$crud->set_subject('Personal');
	// 			$crud->set_primary_key('cuit','legisladores');
	// 			$crud->set_relation_n_n('tags','cuit_tag','tags','cuit','id_tag','nombre');

	// 			$this->session->set_flashdata('table','legisladores');
	// 			$_SESSION['tabla'] = "Legisladores";

	// 			$crud->callback_before_delete(array($this,'action_befor_delete'));
	// 			$crud->callback_after_insert(array($this, 'action_befor_insert'));
	// 			$crud->callback_before_update(array($this,'action_befor_update'));

	// 			$output = $crud->render();
	// 			$this->_example_output($output);
	// 		} else {
	// 			$this->acceso_denegado();				
	// 		}
	// 	}
	// }

	// public function tabla_jdg(){
	// 	if (!$this->verifySession()){
	// 		return $this->debe_iniciar_sesion();
	// 	}
	// 	else {	
	// 	if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
	// 		in_array('JDG', array_column($this->session->acceso,'nombre')) ){
	// 			$this->encapsulamiento_("jdg_view","jdg","Personal","JDG");
	// 		}
	// 	}
	// }

	// public function jdg(){
	// 	if (!$this->verifySession()){
	// 		return $this->debe_iniciar_sesion();
	// 	}
	// 	else {	
	// 	if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
	// 		in_array('JDG', array_column($this->session->acceso,'nombre')) ){
	// 			$crud = new grocery_CRUD;
	// 			$crud->set_theme('bootstrap');
	// 			$crud->set_language('spanish-uy');
	// 			$crud->set_table('jdg');
	// 			$crud->set_subject('Personal');
	// 			$crud->set_primary_key('cuit','jdg');
	// 			$crud->set_relation_n_n('tags','cuit_tag','tags','cuit','id_tag','nombre');

	// 			$this->session->set_flashdata('table','jdg');
	// 			$_SESSION['tabla'] = "JDG";

	// 			$crud->callback_before_delete(array($this,'action_befor_delete'));
	// 			$crud->callback_after_insert(array($this, 'action_befor_insert'));
	// 			$crud->callback_before_update(array($this,'action_befor_update'));

	// 			$output = $crud->render();
	// 			$this->_example_output($output);
	// 		}
	// 	}
	// }

	// public function tabla_dg(){
	// 	if (!$this->verifySession()){
	// 		return $this->debe_iniciar_sesion();
	// 	}
	// 	else {	
	// 	if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
	// 		in_array('DG', array_column($this->session->acceso,'nombre')) ){
	// 			$this->encapsulamiento_("dg_view","dg","Personal","DG");
	// 		} else {
	// 			$this->acceso_denegado();				
	// 		}
	// 	}
	// }

	// public function dg(){
	// 	if (!$this->verifySession()){
	// 		return $this->debe_iniciar_sesion();
	// 	}
	// 	else {	
	// 	if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
	// 		in_array('DG', array_column($this->session->acceso,'nombre')) ){
	// 			$crud = new grocery_CRUD;
	// 			$crud->set_theme('bootstrap');
	// 			$crud->set_language('spanish-uy');
	// 			$crud->set_table('dg');
	// 			$crud->set_subject('Personal');
	// 			$crud->set_primary_key('cuit','dg');
	// 			$crud->set_relation_n_n('tags','cuit_tag','tags','cuit','id_tag','nombre');

	// 			$this->session->set_flashdata('table','dg');
	// 			$_SESSION['tabla'] = "DG";

	// 			$crud->callback_before_delete(array($this,'action_befor_delete'));
	// 			$crud->callback_after_insert(array($this, 'action_befor_insert'));
	// 			$crud->callback_before_update(array($this,'action_befor_update'));

	// 			$output = $crud->render();
	// 			$this->_example_output($output);
	// 		} else {
	// 			$this->acceso_denegado();				
	// 		}
	// 	}
	// }

	// public function tabla_go(){
	// 	if (!$this->verifySession()){
	// 		return $this->debe_iniciar_sesion();
	// 	}
	// 	else {	
	// 	if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
	// 		in_array('GO', array_column($this->session->acceso,'nombre')) ){
	// 			$this->encapsulamiento_("go_view","go","Personal","DG");
	// 		} else {
	// 			$this->acceso_denegado();				
	// 		}
	// 	}
	// }

	// public function go(){
	// 	if (!$this->verifySession()){
	// 		return $this->debe_iniciar_sesion();
	// 	}
	// 	else {	
	// 	if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
	// 		in_array('GO', array_column($this->session->acceso,'nombre')) ){
	// 			$crud = new grocery_CRUD;
	// 			$crud->set_theme('bootstrap');
	// 			$crud->set_language('spanish-uy');
	// 			$crud->set_table('go');
	// 			$crud->set_subject('Personal');
	// 			$crud->set_primary_key('cuit','go');
	// 			$crud->set_relation_n_n('tags','cuit_tag','tags','cuit','id_tag','nombre');

	// 			$this->session->set_flashdata('table','go');
	// 			$_SESSION['tabla'] = "GO";

	// 			$crud->callback_before_delete(array($this,'action_befor_delete'));
	// 			$crud->callback_after_insert(array($this, 'action_befor_insert'));
	// 			$crud->callback_before_update(array($this,'action_befor_update'));

	// 			$output = $crud->render();
	// 			$this->_example_output($output);
	// 		} else {
	// 			$this->acceso_denegado();				
	// 		}
	// 	}
	// }


	// public function tabla_bada_celulares(){	

		
	// 	$vengo = $this->session->flashdata('vengo');
	// 	if ($vengo) $this->session->set_flashdata('vengo','true');

	// 	if (!$this->verifySession()){
	// 		return $this->debe_iniciar_sesion();
	// 	}
	// 	else {	
	// 	if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
	// 		in_array('USUARIOS BADA', array_column($this->session->acceso,'nombre')) ||
	// 	isset($vengo) ){
	// 		if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
	// 		in_array('GO', array_column($this->session->acceso,'nombre')) ){
	// 			$this->encapsulamiento_("bada_celulares_view","bada_celulares","Personal","Usuarios Bada");
	// 		} else {
	// 			$this->acceso_denegado();				
	// 		}
	// 	} else {
	// 		$this->acceso_denegado();				
	// 	}
	// 	}

	// }

	// public function bada_celulares(){

		
	// 		$vengo = $this->session->flashdata('vengo');
	// 		if ($vengo) $this->session->set_flashdata('vengo','true');

	// 	if (!$this->verifySession()){
	// 		return $this->debe_iniciar_sesion();
	// 	}
	// 	else {	
	// 	if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
	// 		in_array('USUARIOS BADA', array_column($this->session->acceso,'nombre')) ||
	// 		isset($vengo) ){
	// 			$crud = new grocery_CRUD;
	// 			$crud->set_theme('bootstrap');
	// 			$crud->set_language('spanish-uy');
	// 			$crud->set_table('bada_celulares');
	// 			$crud->set_subject('Usuario','Usuarios');
			
	// 			$crud->display_as('virtual', 'Cuit');
	// 			$crud->display_as('cuit', 'Nombre - Apellido');
	// 			$crud->display_as('celular_bada','Telefono');
	// 			$crud->display_as('mail','Email');
				
	// 			$crud->set_primary_key('cuit','sas_activo');
	// 			$crud->set_relation('cuit','sas_activo','{nombre} - {apellido}');

	// 			$crud->set_primary_key('cuit','bada_celulares');
	// 			$crud->set_relation_n_n('tags','cuit_tag','tags','cuit','id_tag','nombre');

	// 			$crud	->fields(['celular_bada', 'mail', 'calle_bada', 'altura_bada','departamento_bada','provincia_bada', 'barrio_normalizado','comuna','intereses','notificaciones','tags'])
	// 					->field_type('notificaciones','enum',array('Si','No'));
	// 			$crud->display_as('calle_bada','Calle');
	// 			$crud->display_as('altura_bada','Altura');

	// 			$crud->columns(['virtual','cuit','celular_bada','mail','tags']);
	// 			$crud->unset_add();
	// 			$crud->unset_clone();
	// 			$crud->unset_delete();
	// 			// $crud->add_action('Cambiar Registro','https://www.grocerycrud.com/v1.x/assets/uploads/general/smiley.png',
	// 			// 					'examples/cambiar_nombre_apellido');
				
	// 			$this->session->set_flashdata('table','bada_celulares');
	// 			$_SESSION['tabla'] = "Bada Celulares";
				

	// 			$crud->callback_before_delete(array($this,'action_befor_delete'));
	// 			$crud->callback_after_insert(array($this, 'action_befor_insert'));
	// 			$crud->callback_before_update(array($this,'action_befor_update'));

	// 			$crud	->unset_texteditor('barrio_normalizado','intereses');
						

	// 			$output = $crud->render();
	// 			$this->_example_output($output);
	// 		} else {
	// 			$this->acceso_denegado();				
	// 		}
	// 	}

	// }

	public function datos_personales($otro, $pk){
		$crud = new Grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_language('spanish-uy');
		$crud->set_table('bada_celulares');
		$crud->set_primary_key('cuit',"bada_celulares");

		$query = $this->db->query(
			'SELECT * FROM bada_celulares WHERE cuit = ' .$pk.'');
		
		$resultados=[];
		$campos = [];

		($query->result()) ? $resultados  = $query->result()[0]   : null;
		(!is_null($resultados->provincia_bada)) ? array_push($campos , 'provincia_bada') :  array_push($campos , 'provincia_bada_bu') ;
		(!is_null($resultados->comuna)) ? array_push($campos , 'comuna') :  array_push($campos , 'comuna_bu') ;
		(!is_null($resultados->calle_bada)) ? array_push($campos , 'calle_bada') :  array_push($campos , 'calle_bada_bu') ;
		(!is_null($resultados->altura_bada)) ? array_push($campos , 'altura_bada') :  array_push($campos , 'altura_bada_bu') ;
		(!is_null($resultados->departamento_bada)) ? array_push($campos , 'departamento_bada_bu') :  array_push($campos , 'departamento_bada_bu') ;
		(!is_null($resultados->mail)) ? array_push($campos , 'mail') :  array_push($campos , 'mail_bu') ;
		(!is_null($resultados->barrio_normalizado)) ? array_push($campos , 'barrio_normalizado') :  array_push($campos , 'barrio_normalizado_bu') ;
		(!is_null($resultados->celular_flota)) ? array_push($campos , 'celular_flota') :  array_push($campos , 'celular_flota_bu') ;


		//var_dump($campos);

		
		$crud->fields($campos);

		// $crud->fields(['provincia_bada','comuna','calle_bada','altura_bada','departamento_bada','celular_bada','mail','barrio_normalizado','celular_flota']);
		$crud->change_field_type('barrio_normalizado', 'string');		
		$output = $crud->render();
		$this->_example_output($output);
		
		

	}

	public function cambiar_datos_personales($id){

		$this->session->set_flashdata('vengo','true');

			//Es necesario traer el nombre de la tabla de la cual venis para indicarle a cual tabla debe ir
			$table = $this->session->flashdata('table');	
			$this->session->set_flashdata('table',"{$table}");
			
	
			// Obtenemos el CUIT para consultar los accesos de usuario, tablas, tags que puede modificar
			// Y sobre que registros puede accionar
			$cuit_usuario = $this->session->cuit;
			$accesos_usuario = $this->accionar_tag_mogel->get_actioned_tags($cuit_usuario);
			$tags_registro = $this->tags_model->get_tags_by_cuit($id);
	
			// Verificar si alguno de los tags son los principales del usuario
			$tiene_acceso = false;
			foreach($tags_registro as $tag_reg)
				foreach ($accesos_usuario as $acc_us)
					if ($tag_reg == $acc_us)
						$tiene_acceso = true;
	
			$query = $this->db->query('SELECT cuit FROM bada_celulares WHERE cuit = '. $id .'');
	
			//Si no existe el registro en bada_celulares lo crea y escribe sobre las columnas duplicadas
			if (!$query->result()){
				$this->db->query("INSERT INTO `bada_celulares` (`id`, `fecha`, `celular_bada`, `celular_flota`, 
				`mail`, `ok`, `cuit`, `calle_bada`, `altura_bada`, `departamento_bada`, `piso_bada`, `provincia_bada`,
					`edificio_laboral_bada`, `rol_bada`, `barrio`, `localidad`, `seccion`, `barrio_normalizado`, 
					`lat`, `lon`, `comuna`, `created_at`, `updated_at`, `intereses`, `notificaciones`, `provincia_bada_bu`, 
					`comuna_bu`, `calle_bada_bu`, `altura_bada_bu`, `departamento_bada_bu`, `celular_bada_bu`, `mail_bu`, 
					`barrio_normalizado_bu`, `celular_flota_bu`) 
					VALUES (NULL, CURRENT_TIMESTAMP, '', NULL, '', NULL, '{$id}', NULL, NULL, NULL, NULL, NULL, NULL, NULL,
					NULL, NULL, NULL, NULL, NULL, NULL, NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, NULL, NULL, NULL, NULL,
					NULL, NULL, NULL, NULL, NULL, NULL, NULL) ");
			}
	
			
			if ($tiene_acceso) {
				redirect('datos_personales/edit/'.$id.'');
			}
			
				
			else $this->sin_acceso_tag_principal();

		

		

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
		$crud->set_theme('bootstrap');
		$crud->set_language('spanish-uy');
		$crud->set_table('tags');
		$crud->columns('nombre');
		$crud->fields('nombre');
		$_SESSION['tabla'] = "TAGS";
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
		$_SESSION['tabla'] = "Tags Asignados";
		$output = $crud->render();
		$this->_example_output($output);
		}
	}




// public function tabla_sas_activos(){

	// 	if (!$this->verifySession()){
	// 		return $this->debe_iniciar_sesion();
	// 	}
	// 	else {	
	// 	if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
	// 		in_array('SAS ACTIVOS', array_column($this->session->acceso,'nombre')) ){
	// 			$this->sas_activos();
	// 		} else {
	// 			$this->acceso_denegado();				
	// 		}
	// 	}


	// 	// if (!$this->verifySession()){
	// 	// 	return $this->debe_iniciar_sesion();
	// 	// }
	// 	// else {	
	// 	// 	if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
	// 	// 	in_array('SAS ACTIVOS', array_column($this->session->acceso,'nombre'))){
	// 	// 		$this->encapsulamiento_("sas_activo_view","sas_activo","Personal","SAS ACTIVOS");				
	// 	// 	} else {
	// 	// 		$this->acceso_denegado();				
	// 	// 	}

	// 	// 	$this->encapsulamiento_("sas_activo_view","sas_activo","Personal","Jovenes VISTA"
	// 	// }

	// }

	// public function sas_activos(){

	// 	$vengo = $this->session->flashdata('vengo');

	// 	if (!$this->verifySession()){
	// 		return $this->debe_iniciar_sesion();
	// 	}
	// 	else {	
	// 	if (in_array('TODAS', array_column($this->session->acceso,'nombre')) || 
	// 		in_array('SAS ACTIVOS', array_column($this->session->acceso,'nombre')) ||
	// 		$vengo ){
	// 			$crud = new grocery_CRUD;
	// 			$crud->set_theme('bootstrap');
	// 			$crud->set_language('spanish-uy');
	// 			$crud->set_table('bada_celulares_view');
	// 			// $crud->set_subject('Activo','Activos');
	// 			// $crud->columns(['cuit','tipo_documento','nro_documento', 'apellido', 'nombre','sexo',
	// 			// 				'fecha_nacimiento_sql','fecha_inicio', 
	// 			// 				'domicilio','partido','localidad','provincia',
	// 			// 				'desc_tarea','desc_registro','desc_regimen','desc_rep',
	// 			// 				'desc_lvl1','desc_lvl2','tags']);

	// 			// $crud->display_as('cuit', 'Cuit');
	// 			// $crud->display_as('nombre','Nombre');
	// 			// $crud->display_as('tipo_documento','Tipo');
	// 			// $crud->display_as('nro_documento','NRO');
	// 			// $crud->display_as('fecha_nacimiento_sql','F Nac');
	// 			// $crud->display_as('fecha_inicio','F Inicio');
	// 			// $crud->display_as('apellido','Apellido');
	// 			// $crud->display_as('desc_tarea','Desc Tarea');
	// 			// $crud->display_as('desc_rep','Desc Reparticion');
	// 			// $crud->display_as('desc_registro','Desc Registro');
	// 			// $crud->display_as('desc_regimen','Desc Regimen');
	// 			// $crud->display_as('desc_lvl1','Desc Lvl 1');
	// 			// $crud->display_as('desc_lvl2','Desc  Lvl 2');

	// 			// $this->session->set_flashdata('table','sas_activo');
	// 			// $_SESSION['tabla'] = "SAS Activos";

	// 			// $crud->set_primary_key('cuit','sas_activo');
	// 			// $crud->set_relation_n_n('tags','cuit_tag','tags','cuit','id_tag','nombre');
				
	// 			// $crud	->fields(['cuit','tipo_documento','nro_documento','apellido', 'nombre',
	// 			// 				'comuna','fecha_nacimiento_sql',
	// 			// 				'desc_tarea','desc_rep', 'desc_registro','desc_regimen',
	// 			// 				'desc_lvl1','desc_lvl2','tags']);
				
			

	// 			// $crud->callback_before_delete(array($this,'action_befor_delete'));
	// 			// $crud->callback_after_insert(array($this, 'action_befor_insert'));
	// 			// $crud->callback_before_update(array($this,'action_befor_update'));
							
	// 			// //$crud->unset_add();
	// 			// $crud->unset_clone();
	// 			// //$crud->unset_delete();


	// 			$output = $crud->render();
	// 			$this->_example_output($output);
	// 		} else {
	// 			$this->acceso_denegado();				
	// 		}
	// 	}

	// }




public function action_befor_update($post_array, $primary_key){
		$data = [
			'cuit_usuario' => $this->session->cuit,
			'accion' => 'UPDATE'
		];
		foreach ($post_array as $k=>$v){
			if ($k !== 'tags')
				$data[$k] = $v;
		}
		
		try {
			return $this->db->insert('log_'.$this->session->flashdata('table'), $data);
		} catch (\Throwable $th) {
			//throw $th;
		}
		
	}


public function action_befor_insert($post_array, $primary_key){
	$data = [
		'cuit_usuario' => $this->session->cuit,
		'accion' => 'INSERT',
	];

	foreach ($post_array as $k=>$v){
		$data[$k] = $v;
	}

	$tags = $this->session->flashdata('tags_to_delete');
	$cuit = $post_array['cuit'];

	var_dump($cuit);
	var_dump(is_null($tags));
	if (!is_null($tags))
	 $this->tags_model->add_tags_to_cuit($cuit,$tags);

	 try {
		$this->db->insert('log_'.$this->session->flashdata('table'), $data);
	 } catch (\Throwable $th) {
		//throw $th;
	 }
	
 }

public function action_befor_delete($primary_key = null){

	
	$data = [
		'cuit_usuario' => $this->session->cuit,
		'accion' => 'DELETE',
	];

	$this->db->where('cuit', $primary_key);
	$post_array = $this->db->get($_SESSION['tabla'])->row();

	foreach ($post_array as $k=>$v){
		$data[$k] = $v;
	}

    return $this->db->insert('log_'.$this->session->flashdata('table'), $data);
	
}
 

}
