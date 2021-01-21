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

// Route::get('/main', function () {
//     return view('main');
// });

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
Route::get('/dashboard', "DashboardController@index")
            ->name('dashboard.dashboard');

// ........... ::: RUTA LISTAR INTERESADOS :::: .....................
Route::get('/dashboard/listas/interesados', "ClientesController@interesados")
            ->name('listas.lista_interesados');
Route::get('/dashboard/listas/interesados/{id_interesado}', "ClientesController@detalle_interesado");

// .......... ::::: RUTA LISTAR CLIENTES ::: .............
Route::get('/dashboard/listas/clientes', "ClientesController@index")
            ->name('clientes');
Route::get('/dashboard/listas/clientes/lista', "ClientesController@indexLista");
Route::get('/dashboard/listas/clientes/{id_cliente}', "ClientesController@detalle_cliente");

// .......... ::::: RUTA GUARDAR CLIENTES ::: .............
Route::post('/dashboard/guardar/clientes', 'ClientesController@create');

// .......... ::::: RUTA EDITAR CLIENTES ::: .............
Route::get('/dashboard/clientes/editar/{idcliente}', 'ClientesController@editar_cliente');

// ........... ::::: ACTIVAR CLIENTE :::::...............
Route::get('/dashboard/cliente/activar/{idclientes}', "ClientesController@activar");

// ........... ::::: DESACTIVAR CLIENTE :::::...............
Route::get('/dashboard/cliente/desactivar/{idclientes}', "ClientesController@desactivar");

// .......... :::::: LISTAR HISTORIA DEL COMPLETADO :::: ................
Route::get('/dashboard/listas/historial', "HistorialController@index")
            ->name('listas/historial');
// ........... ::::: LISTAR GIRO DE NEGOCIO :::::...............
Route::get('/dashboard/listas/gironegocio', "GiroNegocioController@index");

// // ........... ::::: LISTAR TIPO PERSONA :::::...............
// Route::get('/dashboard/listas/tipopersona', "GiroNegocioController@index");

// // ........... ::::: LISTAR TIPO DOCUMENTO :::::...............
// Route::get('/dashboard/listas/tipodoc', "GiroNegocioController@index");
