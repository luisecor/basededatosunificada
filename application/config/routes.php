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

$route['registrarUsuario'] = 'loginController/registro';
$route['registroVerificar'] = 'loginController/registroVerificar';



$route['usuario/datos_ingreso'] = 'usuariosController/datos_ingreso';
$route['usuario/verificarCambios'] = 'usuariosController/verificarCambios';

$route['usuarios/session'] = 'sessionFiltroController/cuit_tag_filtro';
$route['usuarios/session/add'] = 'sessionFiltroController/cuit_tag_filtro/add';

$route['usuarios/session/edit/(:num)'] = 'sessionFiltroController/cuit_tag_filtro/edit/$id';
$route['usuarios/session/update_validation/(:num)'] = 'sessionFiltroController/cuit_tag_filtro/update_validation/$id';
$route['usuarios/session/update/(:num)'] = 'sessionFiltroController/cuit_tag_filtro/update/$id';

$route['examples/tabla_mujeres_lideres/add'] = 'examples/probando_add';

$route['filtro_tags'] = 'filtrosController/filtros_selected';
$route['cargar_vista'] = 'filtrosController/cargar_vista';

//CARGA MASIVA
$route['carga_masiva/tags'] = 'cargaMasivaController/tags_main';
$route['carga_masiva/guia_uso'] = 'cargaMasivaController/index';
$route['carga_masiva/gabinete'] = 'cargaMasivaController/gabinete';
$route['carga_masiva/gabinete/importarCSVaDB'] = 'cargaMasivaController/importarCSVaDB';







//LOCAL

