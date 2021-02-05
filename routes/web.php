<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('main');
});

Route::get('/index', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/main/precios', function () {
    return view('precios');
});

Route::get('/dashboard/perfil', function () {
    return view('users.perfil');
});

Route::redirect('/login', '/main');

//-------Rutas por controlador----------//
Route::get('/dashboard', "DashboardController@index") ->name('dashboard.dashboard');

// ..........:: RUTAS INTERESADOS ::............//
Route::group(['prefix' => 'dashboard', 'as' => 'dashboard'], function(){
    //MUESTRA LA VISTA
    Route::get('/listas/interesados', 'clientes\ClientesController@interesados');
    //MUESTRA LOS DATOS EN UNA TABLA
    Route::get('/listas/interesados/lista', "clientes\ClientesController@indexListaInteresado");
    //MUESTRA DETTALE DE INTERESADO EN UN MODAL
    Route::get('/listas/interesados/{id_interesado}', "clientes\ClientesController@detalle_interesado");
    //CREA UN REGISTRO DE INTERESADO
    Route::post('/guardar/interesados', 'clientes\ClientesController@createInteresados');
    //DESACTIVAR Y ACTIVAR UN INTERESADO
    Route::get('/interesado/desactivar/{idclientes}', "clientes\ClientesController@desactivarInteresado");

    Route::get('/dashboard/interesado/editar', 'clientes\ClientesController@editarCliente');
    // Detalle historial interesado
    Route::get('/interesado/historial', 'clientes\ClientesController@historialInteresado');
});

//........... ::RUTAS CLIENTES:: ............//
Route::group(['prefix' => 'dashboard', 'as' => 'dashboard'], function(){
    // MUESTRA LA VISTA DE CLIENTES
    Route::get('/listas/clientes', "clientes\ClientesController@index");
    // MIESTRA LISTA DE CLIENTES EN UNA TABLA
    Route::get('/listas/clientes/lista', "clientes\ClientesController@indexLista");
    // MUESTRA MODAL DETALLE DE CLIENTE
    Route::get('/listas/clientes/{id_cliente}', "clientes\ClientesController@detalle_cliente");
    // MUESTRA DATOS DE UN CLIENTE PAARA EDITAR
    Route::get('/mostrar/clientes/{id_cliente}', "clientes\ClientesController@detalle_cliente_one");
    // EDITA LOS DATOS DE UN CLIENTE
    Route::post('/editar/clientes', 'clientes\ClientesController@editarCliente');
    //ACTIVA UN CLIENTE
    Route::get('/cliente/activar/{idclientes}', "clientes\ClientesController@activar");
    //DESACTIVA UN CLIENTE
    Route::get('/cliente/desactivar/{idclientes}', "clientes\ClientesController@desactivar");
});

// .......... :::::: RUTAS HISTORIAL DEL COMPLETADO :::: ................
Route::group(['prefix' => 'dashboard', 'as' => 'dashboard'], function(){
    Route::get('/listas/historial', "historial\HistorialController@index");
    Route::get('/listas/historial/lista', "historial\HistorialController@indexLista");    
    Route::post('/guardar/registro', "historial\HistorialController@createHistorial");  
    Route::get('/listas/registro/{idregistro}', "historial\HistorialController@det_Registro"); 
    Route::get('/mostrar/registro/{idregistro}', "historial\HistorialController@det_registro_one"); 
});
Route::get('/ver/historial/detalle/{idhist}', "historial\HistorialController@DetalleHistorial");

// .......... :::::: RUTAS CONFIGURACION DEL COMPLETADO :::: ................
Route::group(['prefix' => 'dashboard', 'as' => 'dashboard'], function(){
    Route::get('/configuracion/eventos', "configuracion\EventosController@index");
    Route::get('/configuracion/eventos/lista', "configuracion\EventosController@indexLista");
    Route::get('/evento/activar/{ideventos}', "configuracion\EventosController@activar");
    Route::get('/evento/desactivar/{ideventos}', "configuracion\EventosController@desactivar");
    Route::post('/evento/guardar', "configuracion\EventosController@createEvento");
    Route::get('/mostrar/evento/{ideventos}', "configuracion\EventosController@DetalleEvento");
    
    Route::get('/configuracion/medios', "configuracion\MediosController@index");
    Route::get('/configuracion/medios/lista', "configuracion\MediosController@indexLista");
    Route::get('/medio/activar/{idmedios}', "configuracion\MediosController@activar");
    Route::get('/medio/desactivar/{idmedios}', "configuracion\MediosController@desactivar");
    Route::post('/medio/guardar', "configuracion\MediosController@createMedio");
    Route::get('/mostrar/medio/{idmedios}', "configuracion\MediosController@DetalleMedio");

    Route::get('/configuracion/personal', "configuracion\PersonalController@index");
    Route::get('/configuracion/personal/lista', "configuracion\PersonalController@indexLista");
    Route::get('/personal/activar/{idpersonal}', "configuracion\PersonalController@activar");
    Route::get('/personal/desactivar/{idpersonal}', "configuracion\PersonalController@desactivar");
    Route::post('/personal/guardar', "configuracion\PersonalController@createPersonal");
    Route::get('/mostrar/personal/{idpersonal}', "configuracion\PersonalController@DetallePersonal");

    Route::get('/configuracion/modulos', "configuracion\ModulosController@index");

    Route::get('/configuracion/users', "configuracion\UsersController@index");
});

// ........... ::::: LISTAR SELECTS :::::...............
Route::get('/dashboard/listas/gironegocio', "GiroNegocioController@index");
Route::get('/dashboard/listas/modulos', "historial\HistorialController@indexModulos");
Route::get('/dashboard/listas/medios', "historial\HistorialController@indexMedios");
Route::get('/dashboard/listas/eventos', "historial\HistorialController@indexEventos");
Route::get('/dashboard/listas/personal', "historial\HistorialController@indexPersonal");

// // ........... ::::: LISTAR TIPO PERSONA :::::...............
// Route::get('/dashboard/listas/tipopersona', "GiroNegocioController@index");

// // ........... ::::: LISTAR TIPO DOCUMENTO :::::...............
// Route::get('/dashboard/listas/tipodoc', "GiroNegocioController@index");
