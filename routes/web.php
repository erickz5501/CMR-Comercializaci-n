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

Route::get('/dashboard/listas/interesados', "ClientesController@interesados")
            ->name('listas.lista_interesados');

Route::get('/dashboard/listas/clientes', "ClientesController@index")
            ->name('listas.clientes');

Route::get('/dashboard/listas/historial', "HistorialController@index")
            ->name('listas/historial');