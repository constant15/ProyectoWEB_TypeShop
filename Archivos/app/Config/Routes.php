<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.




//Rutas para clientes no logueados 
$routes->get('/', 'Home::index');
$routes->get('/quienes_somos', 'Home::quienes_somos');
$routes->get('/comercializacion', 'Home::comercializacion');
$routes->get('/informacion_de_contacto', 'Home::informacion_de_contacto');
$routes->get('/terminos_y_usos', 'Home::terminos_y_usos');



//Rutas para el registro de usuarios 
$routes->get('/registrarse', 'Usuario_controller::create');
$routes->post('/enviar-form', 'Usuario_controller::formValidation');


//Rutas para el Login
$routes->get('/usuario', 'Home:: login');
$routes->get('/login', 'Login_Controller'); 
$routes->post('/enviarlogin', 'Login_Controller::auth');
$routes->get('/logout', 'Login_controller::logout');
$routes->get('/userlist', 'usuario_crud_controller::index',['filter' => 'auth']);


//Rutas del crud de usuarios
$routes->get('/users-form', 'usuario_crud_controller::create',['filter' => 'auth']);
$routes->post('/enviar', 'usuario_crud_controller::store',['filter' => 'auth']);
$routes->get('/editar/(:num)', 'usuario_crud_controller::singleUser/$1',['filter' => 'auth']);
$routes->post('update', 'usuario_crud_controller::update',['filter' => 'auth']);
$routes->get('/deletelogico/(:num)', 'usuario_crud_controller::deletelogico/$1',['filter' => 'auth']);
$routes->get('/restaurar/(:num)', 'usuario_crud_controller::restaurar/$1',['filter' => 'auth']);


//rutas crud de productos
$routes->get('/crear', 'producto_crud_controller::index');
$routes->get('/agregar', 'producto_crud_controller::index',['filter' => 'auth']);
$routes->get('/produ-form', 'producto_crud_controller::create',['filter' => 'auth']);
$routes->post('/enviar-prod', 'producto_crud_controller::store',['filter' => 'auth']);
$routes->get('/edit/(:num)', 'producto_crud_controller::singleProducto/$1',['filter' => 'auth']);
$routes->post('modifica/(:num)', 'producto_crud_controller::update/$1',['filter' => 'auth']);
$routes->get('/elimin/(:num)', 'producto_crud_controller::deletelogico/$1',['filter' => 'auth']);
$routes->get('/reponer/(:num)', 'producto_crud_controller::reponer/$1',['filter' => 'auth']);


//Rutas Carrito 
$routes->get('/carrito', 'carrito_controller::index');
$routes->get('/todos_p', 'carrito_controller::catalogo',['filter' => 'auth']);
$routes->post('/actualizar', 'carrito_controller::actualizar_carrito',['filter' => 'auth']);
$routes->post('/carrito_agrega', 'carrito_controller::add',['filter' => 'auth']);
$routes->get('/muestro', 'carrito_controller::muestra',['filter' => 'auth']);
$routes->get('/borrar', 'carrito_controller::borrarcarrito',['filter' => 'auth']);
$routes->get("/prodAumentar", "carrito_controller::sumarProd",['filter' => 'auth']);
$routes->get("/prodRestar", "carrito_controller::restarProd",['filter' => 'auth']);

//Rutas Ventas 
$routes->get('/exitoComp', 'ventas_controller::exitoCompra',['filter' => 'auth']);
$routes->get('/compra_rechaz', 'ventas_controller::rechazada_compra',['filter' => 'auth']);
$routes->get('/muestraventa', 'ventas_controller::listar_ventas',['filter' => 'auth']);
$routes->get('/compras_cliente', 'ventas_controller::lista_compras',['filter' => 'auth']);
$routes->get('/listar_detalles', 'ventas_controller::listar_detalles',['filter' => 'auth']);
$routes->get('/eliminar', 'carrito_controller::eliminar_carrito',['filter' => 'auth']); //ruta elimina carrito
$routes->get('/comprar', 'ventas_controller::compra',['filter' => 'auth']); //ruta confirma compra 


// rutas para las consultas
$routes->get('/consulta', 'Consulta_controller::ver_consulta',['filter' => 'auth']);
$routes->post('/enviarcons', 'Consulta_controller::agregar_consulta',['filter' => 'auth']);
$routes->get('/contesta/(:num)', 'Consulta_controller::contestar/$1',['filter' => 'auth']);



//,['filter' => 'auth'] http://localhost/Proyecto_olivos_nicolas/consulta    $routes->get('/contacto', 'Home::contacto'); formato de la ruta
/*00
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
