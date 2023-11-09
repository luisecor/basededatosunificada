<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'loginController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['home'] = 'loginController/index';
$route['confirm'] = 'loginController/confirm';
$route['ingreso'] = 'loginController/ingreso';
$route['logout'] = 'loginController/logout';

//Usuarios
$route['registrarUsuario'] = 'loginController/registro';
$route['registroVerificar'] = 'loginController/registroVerificar';

$route['usuario/datos_ingreso'] = 'usuariosController/datos_ingreso';
$route['usuario/verificarCambios'] = 'usuariosController/verificarCambios';

$route['usuarios/session'] = 'sessionFiltroController/cuit_tag_filtro';
$route['usuarios/session/add'] = 'loginController/registro';

$route['usuarios/session/ajax_list_info'] = 'sessionFiltroController/cuit_tag_filtro/$1/ajax_list_info';
$route['usuarios/session/ajax_list'] = 'sessionFiltroController/cuit_tag_filtro/ajax_list';

$route['usuarios/session/edit/(:num)'] = 'sessionFiltroController/cuit_tag_filtro/edit/$id';
$route['usuarios/session/update_validation/(:num)'] = 'sessionFiltroController/cuit_tag_filtro/update_validation/$id';
$route['usuarios/session/update/(:num)'] = 'sessionFiltroController/cuit_tag_filtro/update/$id';
$route['session/delete_multiple/(:any)'] = 'sessionFiltroController/cuit_tag_filtro/delete_multiple/$id';
$route['usuarios/session/(:any)/(:any)'] = 'sessionFiltroController/cuit_tag_filtro/$1/$2';
$route['usuarios/session/(:any)/(:any)/(:any)'] = 'sessionFiltroController/cuit_tag_filtro/$1/$2/$3';

$route['examples/tabla_mujeres_lideres/add'] = 'examples/probando_add';

//Acceso a tablas
$route['tabla/(:any)'] = 'examples/table/$1';
$route['tabla/tags/add'] = 'examples/tags_/add';
$route['tabla/(:any)/add'] = 'examples/materialized_table/add';
$route['tabla/(:any)/insert'] = 'examples/materialized_table/insert';
$route['tabla/(:any)/(:any)'] = 'examples/table/$1/$2';
$route['tabla/(:any)/(:any)/(:any)'] = 'examples/table/$1/$2/$3';

//Acceso a materialized tables
$route['materialized_table'] = 'examples/materialized_table';
$route['materialized_table/(:any)'] = 'examples/materialized_table/$1';
$route['materialized_table/(:any)/(:any)'] = 'examples/materialized_table/$1/$2';
$route['materialized_table/(:any)/(:any)/(:any)'] = 'examples/materialized_table/$1/$2/$3';

//Filtro TAGS -> Version 1
$route['filtro_tags'] = 'filtrosController/filtros_selected';
$route['cargar_vista'] = 'filtrosController/cargar_vista';

//FILROS DE COL
$route['traer/(:any)/(:any)'] = 'filtrosController/traer/$1/$2';
$route['filtro_col'] = 'filtrosController/filtros_col_selected';
                                                // ->tabla/columna/termino
$route['buscar/(:any)/(:any)/(:any)'] = 'filtrosController/buscar/$1/$2/$3';

//CARGA MASIVA
// 'carga_masiva/tabla/importarCSVaDB'
// $route['carga_masiva/tags'] = 'cargaMasivaController/tags_main';
$route['carga_masiva/guia_uso'] = 'cargaMasivaController/index';
$route['carga_masiva/form_tabla'] = 'cargaMasivaController/form_tabla';
$route['carga_masiva/form_tag'] = 'cargaMasivaController/form_tag';
$route['carga_masiva/tabla/importarCSVaDB'] = 'cargaMasivaController/importarCSVaDB';
$route['carga_masiva/tag/importarCSVaDB'] = 'cargaMasivaController/importarTAGCSVaDB';
$route['carga_masiva/datos_personales'] = 'cargaMasivaController/form_datos_personales';
$route['carga_masiva/datosPersonales/importarCSVaDB'] = 'cargaMasivaController/importarDatosPersonalesCSVaDB';

//importarCSVDatosPersonales
//datos_personales



//VISTAS
$route['vista/(:any)'] = 'Examples/vista/$1';
$route['vista/(:any)/add'] = 'examples/nuevo_registro';
$route['vista/(:any)/(:any)'] = 'examples/vista/$1/$2';
$route['vista/(:any)/(:any)/(:any)'] = 'examples/vista/$1/$2/$3';
// $route['vista/(:any)/(:any)/(:any)/(:any)'] = 'examples/vista/$1/$2/$3/$4';

//Acciones
$route['datos_personales/(:any)/(:any)'] = 'Examples/datos_personales/$1/$2';
$route['atributos_/(:any)/(:any)'] = 'Examples/atributos_/$1/$2';
$route['atributos_/(:any)/(:any)/(:any)'] = 'Examples/atributos_/$1/$2/$3';

//TAGS
$route['tags_/(:any)'] = 'examples/tags_/$1';
$route['tags_/(:any)/(:any)'] = 'examples/tags_/$1/$2';
$route['tags_/(:any)/(:any)/(:any)'] = 'examples/tags_/$1/$2/$3';
//TAGS Contacto
$route['tag_contacto/(:any)'] = 'examples/tag_contacto/$1';
$route['tag_contacto/(:any)/(:any)'] = 'examples/tag_contacto/$1/$2';
$route['tag_contacto/(:any)/(:any)/(:any)'] = 'examples/tag_contacto/$1/$2/$3';
$route['tag_contacto/(:any)/(:any)/(:any)/(:any)'] = 'examples/tag_contacto/$1/$2/$3/$4';


//ANALITICS
$route['analiticas/dashboard'] = 'examples/Analitica_dashboard';
$route['analiticas/dashboard/(:any)'] = 'examples/Analitica_dashboard/$1';
$route['analiticas/dashboard/(:any)/(:any)'] = 'examples/Analitica_dashboard/$1/$2';
$route['analiticas/dashboard/(:any)/(:any)/(:any)'] = 'examples/Analitica_dashboard/$1/$2/$3';
$route['analiticas/dashboard/(:any)/(:any)/(:any)/(:any)'] = 'examples/Analitica_dashboard/$1/$2/$3/$4';

//MEta
$route['meta/jovenes'] = 'metacontroller/jovenes';

//meta/jovenes




$route['vista/(:any)/export'] = 'examples/vista/$1/export';


//LOCAL



