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

// Route::get('/', function () {
//     return view('main');
// });
Route::get('/', "ComercializacionController@index");

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
    Route::get('/listas/interesados/', 'clientes\ClientesController@interesados');
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

    Route::get('/configuracion/actividad', "configuracion\ActividadController@index");
    Route::get('/configuracion/actividad/lista', "configuracion\ActividadController@indexLista");
    Route::get('/actividad/activar/{idactividad}', "configuracion\ActividadController@activar");
    Route::get('/actividad/desactivar/{idactividad}', "configuracion\ActividadController@desactivar");
    Route::post('/actividad/guardar', "configuracion\ActividadController@createActividad");
    Route::get('/mostrar/actividad/{idactividad}', "configuracion\ActividadController@DetalleActividad");

    Route::get('/configuracion/medios', "configuracion\MediosController@index");
    Route::get('/configuracion/medios/lista', "configuracion\MediosController@indexLista");
    Route::get('/medio/activar/{idmedios}', "configuracion\MediosController@activar");
    Route::get('/medio/desactivar/{idmedios}', "configuracion\MediosController@desactivar");
    Route::post('/medio/guardar', "configuracion\MediosController@createMedio");
    Route::get('/mostrar/medio/{idmedios}', "configuracion\MediosController@DetalleMedio");

    Route::get('/configuracion/gironegocio', "GiroNegocioController@index");
    Route::get('/configuracion/gironegocio/lista', "GiroNegocioController@indexLista");
    Route::get('/gironegocio/activar/{idgiro_negocio}', "GiroNegocioController@activar");
    Route::get('/gironegocio/desactivar/{idgiro_negocio}', "GiroNegocioController@desactivar");
    Route::post('/gironegocio/guardar', "GiroNegocioController@createNegocio");
    Route::get('/mostrar/gironegocio/{idgiro_negocio}', "GiroNegocioController@DetalleNegocio");

    Route::get('/configuracion/personal', "configuracion\PersonalController@index");
    Route::get('/configuracion/personal/lista', "configuracion\PersonalController@indexLista");
    Route::get('/personal/activar/{idpersonal}', "configuracion\PersonalController@activar");
    Route::get('/personal/desactivar/{idpersonal}', "configuracion\PersonalController@desactivar");
    Route::post('/personal/guardar', "configuracion\PersonalController@createPersonal");
    Route::get('/mostrar/personal/{idpersonal}', "configuracion\PersonalController@DetallePersonal");

    Route::get('/configuracion/modulos', "configuracion\ModulosController@index");
    Route::get('/configuracion/modulos/lista', "configuracion\ModulosController@indexLista");
    Route::get('/modulos/activar/{idmodulos}', "configuracion\ModulosController@activar");
    Route::get('/modulos/desactivar/{idmodulos}', "configuracion\ModulosController@desactivar");
    Route::post('/modulos/guardar', "configuracion\ModulosController@createModulos");
    Route::get('/mostrar/modulo/{idmodulos}', "configuracion\ModulosController@DetalleModulo");
    Route::get('/informacio/modulo/{idmodulos}', "configuracion\ModulosController@InformacionModulo");

    Route::get('/configuracion/users', "configuracion\UsersController@index");
    Route::get('/configuracion/users/lista', "configuracion\UsersController@indexLista");
    Route::get('/users/activar/{idusers}', "configuracion\UsersController@activar");
    Route::get('/users/desactivar/{idusers}', "configuracion\UsersController@desactivar");
    Route::post('/users/guardar', "configuracion\UsersController@createUsers");
    Route::get('/mostrar/user/{idusers}', "configuracion\UsersController@DetalleUser");
});

// .......... :::::: RUTAS COMERCIALIZACION DEL COMPLETADO :::: ................
Route::group(['prefix' => 'dashboard', 'as' => 'dashboard'], function(){
    route::get('/comercializacion', "ComercializacionController@index");
    Route::get('/comercializacion/lista', "ComercializacionController@indexLista");
    Route::post('/comercializacion/guardar', "ComercializacionController@createComercio");
    Route::post('/comercializacion/guardar-registro', "ComercializacionController@createComercioNuevo");
    Route::get('/comercializacion/desactivar/{idcomercializacion}', "ComercializacionController@desactivar");
    Route::get('/comercializacion/activar/{idcomercializacion}', "ComercializacionController@activar");
    Route::get('/mostrar/comercializacion/{idcomercializacion}', "ComercializacionController@DetalleRegistro");//editar el registro
    Route::get('/lista/comercializacion/{idcomercializacion}', "ComercializacionController@detalle_registro");//para ver el registro
    Route::get('/comercializacion/detalle/{idcliente}', "ComercializacionController@indexlistaregistro");

    Route::get('/comercializacion/interesado/ultimo', "ComercializacionController@ultimo_cliente");
    Route::get('/cotizacion/generar', "ComercializacionController@generar_correlativo");
    Route::post('/cotizacion/guardar', "ComercializacionController@createCotizacion");

});

// .......... :::::: RUTAS  ACTUALIZACIONES DEL COMPLETADO :::: ................
Route::group(['prefix' => 'dashboard', 'as' => 'dashboard'], function(){
    route::get('/actualizaciones',"ActualizacionesController@index");
    route::get('/actualizaciones/lista',"ActualizacionesController@indexLista");
    Route::post('/actualizacion/guardar', "ActualizacionesController@createActualizacion");
    Route::get('/actualizacion/desactivar/{idactualizacion}', "ActualizacionesController@desactivar");
    Route::get('/actualizacion/activar/{idactualizacion}', "ActualizacionesController@activar");
    Route::get('/lista/actualizacion/{idactualizacion}', "ActualizacionesController@detalle_actualizacion");


});

// .......... :::::: RUTAS  COTIZACIONES DEL COMPLETADO :::: ................
Route::group(['prefix' => 'dashboard', 'as' => 'dashboard'], function(){
    route::get('/cotizaciones',"CotizacionController@index");
    route::get('/cotizaciones/lista',"CotizacionController@indexLista");
    Route::get('/cotizaciones/desactivar/{idcotizacion}', "CotizacionController@desactivar");
    Route::get('/cotizaciones/activar/{idcotizacion}', "CotizacionController@activar");
    Route::get('/lista/cotizaciones/{idcotizacion}', "CotizacionController@detalle_actualizacion");
    Route::post('/cotizacion/crear', "CotizacionController@createCotizacion");


});

// .......... :::::: RUTAS RECLAMOS DEL COMPLETADO :::: ................
Route::group(['prefix' => 'dashboard', 'as' => 'dashboard'], function(){
    route::get('/reclamos', "ReclamosController@index");
    Route::get('/reclamos/lista', "ReclamosController@indexLista");
    Route::post('/reclamo/guardar', "ReclamosController@createReclamo");
    Route::get('/reclamos/desactivar/{idreclamos}', "ReclamosController@desactivar");
    Route::get('/reclamos/activar/{idreclamos}', "ReclamosController@activar");
    Route::get('/mostrar/reclamo/{idreclamos}', "ReclamosController@DetalleReclamo");//Para editar el reclamo
    Route::get('/lista/reclamo/{idreclamos}', "ReclamosController@detalle_reclamo");

});

// ........... ::::: LISTAR SELECTS :::::...............

Route::get('/dashboard/listas/cotizacion', "ComercializacionController@indexCotizacion");
Route::get('/dashboard/listas/giro_negocio', "GiroNegocioController@indexGiroNegocio");
Route::get('/dashboard/listas/modulos', "configuracion\ModulosController@indexModulos");
Route::get('/dashboard/listas/medios', "configuracion\MediosController@indexMedios");
Route::get('/dashboard/listas/evento', "configuracion\EventosController@indexEventos");
Route::get('/dashboard/listas/personal', "configuracion\PersonalController@indexPersonal");
Route::get('/dashboard/listas/clientes', "clientes\ClientesController@indexClientes");
Route::get('/dashboard/listas/interesado', "clientes\ClientesController@indexInteresado");
Route::get('/dashboard/listas/actividad', "configuracion\ActividadController@indexActvidad");
// Route::get('/dashboard/listas/personal', "historial\HistorialController@indexPersonal");

// ........... ::::: RUTA PARA CONSULTAS SUNAT :::::...............
Route::get('/consultas/dni/{dni}', "consultas\ConsultasController@consultaDNISunat");
Route::get('/consultas/ruc/{ruc}', "consultas\ConsultasController@consultaRUCSunat");


// // ........... ::::: LISTAR TIPO PERSONA :::::...............
// Route::get('/dashboard/listas/tipopersona', "GiroNegocioController@index");

// // ........... ::::: LISTAR TIPO DOCUMENTO :::::...............
// Route::get('/dashboard/listas/tipodoc', "GiroNegocioController@index");
