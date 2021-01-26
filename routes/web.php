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
});
Route::get('/ver/historial/detalle/{idhist}', "historial\HistorialController@DetalleHistorial");


// ........... ::::: LISTAR GIRO DE NEGOCIO :::::...............
Route::get('/dashboard/listas/gironegocio', "GiroNegocioController@index");

// // ........... ::::: LISTAR TIPO PERSONA :::::...............
// Route::get('/dashboard/listas/tipopersona', "GiroNegocioController@index");

// // ........... ::::: LISTAR TIPO DOCUMENTO :::::...............
// Route::get('/dashboard/listas/tipodoc', "GiroNegocioController@index");
