<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\PagesController;

    //  RUTA PARA MANTENIMINETO
    // Route::get('/', "ComercializacionController@mantenimiento");

    // RUTA PRINCIPAL
    Route::get('/', "ComercializacionController@login");

    // LOGUEO
    Route::post('/loguearse', 'Auth\LoginController@LogIn');

    // RUTAS QUE ES ESXTRAIDO DEL MIDDLEWARE
    Route::middleware(['auth'])->group(function () {
        Route::group(['middleware' => ['role:administrador|personal']], function () {

            // ................. .:::::::::::::::::::: -COMERCIALIZACION- :::::::::::::::. .........................
            Route::get('/cmr/comercializacion', "ComercializacionController@index")->name('Inicio');


            // ................. .:::::::::::::::::::: -RUTAS CLIENTE INTERESADO- :::::::::::::::. ......................
            // mostrar vista
            Route::get('/cmr/clientes-interesados', "clientes\ClientesController@index_vista")->name('ClienIntere');
            // mostrar tabla principal
            Route::get('/cmr/clientes-interesados/lista-tabla', "clientes\ClientesController@index_lista_tabla");
            // activar
            Route::get('/cmr/cliente-interesado/activar/{idclientes}', "clientes\ClientesController@activar");
            // desactivar
            Route::get('/cmr/cliente-interesado/desactivar/{idclientes}', "clientes\ClientesController@desactivar");
            // agregar o editar un registro
            Route::post('/cmr/clientes-interesado-agregar-editar', 'clientes\ClientesController@agregar_edit_cliente_interesado');
            // muestra un registro para editar
            Route::get('/cmr/clientes-interesado-mostrar-one/{id_cliente}', "clientes\ClientesController@mostrar_cliente_interesado_one");
            // detalle de un rgistro
            Route::get('/cmr/cliente-interesado-detalle/{id_cliente}', "clientes\ClientesController@detalle_cliente_interesado");




            // ................. .:::::::::::::::::::: -RUTAS CONFIGURACION- :::::::::::::::. ......................
            // ....................................... LISTAR USUARIOS .............................................
            // mostrar vista
            Route::get('/cmr/configuracion/users', "configuracion\UsersController@index")->name('ConfigUsers');
            // mostrar tabla principal
            Route::get('/cmr/configuracion/users/lista-tabla', "configuracion\UsersController@index_lista_tabla");
            // activar
            Route::get('/cmr/configuracion/user-activar/{id}', "configuracion\UsersController@activar");
            // desactivar
            Route::get('/cmr/configuracion/user-desactivar/{id}', "configuracion\UsersController@desactivar");
            // agregar o editar un registro
            Route::post('/cmr/configuracion/user-guardar-editar', "configuracion\UsersController@guardar_editar_user");
            // muestra un registro para editar
            Route::get('/cmr/configuracion/user-mostrar-one/{id}', "configuracion\UsersController@mostrar_one_user");

            // RUTA CERRAR SESION
            Route::post('/cerrar_sesion', 'Auth\LoginController@LogOut')->name('LogOut');
        });
    });

    // .......... :::::: RUTAS HISTORIAL   :::: ................
    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard'], function(){
        Route::get('/listas/historial', "historial\HistorialController@index");
        Route::get('/listas/historial/lista', "historial\HistorialController@indexLista");
        Route::post('/guardar/registro', "historial\HistorialController@createHistorial");
        Route::get('/listas/registro/{idregistro}', "historial\HistorialController@det_Registro");
        Route::get('/mostrar/registro/{idregistro}', "historial\HistorialController@det_registro_one");
    });
    Route::get('/ver/historial/detalle/{idhist}', "historial\HistorialController@DetalleHistorial");

    // .......... :::::: RUTAS CONFIGURACION   :::: ................
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

        // rutas modulos
        Route::get('/configuracion/modulos', "configuracion\ModulosController@index");
        Route::get('/configuracion/modulos/lista', "configuracion\ModulosController@indexLista");
        Route::get('/modulos/activar/{idmodulos}', "configuracion\ModulosController@activar");
        Route::get('/modulos/desactivar/{idmodulos}', "configuracion\ModulosController@desactivar");
        Route::post('/modulos/guardar', "configuracion\ModulosController@createModulos");
        Route::get('/mostrar/modulo/{idmodulos}', "configuracion\ModulosController@DetalleModulo");
        Route::get('/informacio/modulo/{idmodulos}', "configuracion\ModulosController@InformacionModulo");

        // rutas etiquetas
        Route::get('/configuracion/etiquetas', "configuracion\EtiquetaController@index");
        Route::get('/configuracion/etiquetas/lista-tabla', "configuracion\EtiquetaController@tabla_etiqueta");
        Route::post('/configuracion/etiquetas/guardar-editar', "configuracion\EtiquetaController@crear_editar_etiqueta");
        Route::get('/configuracion/etiquetas/mostra-one/{id}', "configuracion\EtiquetaController@mostrar_one_etiqueta");
        Route::get('/configuracion/etiquetas/activar/{idetiquetas}', "configuracion\EtiquetaController@activar");
        Route::get('/configuracion/etiquetas/desactivar/{idetiquetas}', "configuracion\EtiquetaController@desactivar");

    });

    // .......... :::::: RUTAS COMERCIALIZACION   :::: ................
    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard'], function(){
        route::get('/comercializacion', "ComercializacionController@index");
        Route::get('/comercializacion/lista', "ComercializacionController@indexLista");
        Route::post('/comercializacion/guardar', "ComercializacionController@createComercio");
        Route::post('/comercializacion/guardar-registro', "ComercializacionController@createComercioNuevo");
        Route::get('/comercializacion/desactivar/{idcomercializacion}', "ComercializacionController@desactivar");
        Route::get('/comercializacion/activar/{idcomercializacion}', "ComercializacionController@activar");
        Route::get('/mostrar/comercializacion/{idcomercializacion}', "ComercializacionController@mostrar_one_comercializacion");//editar el registro
        Route::get('/lista/comercializacion/{idcomercializacion}', "ComercializacionController@detalle_registro");//para ver el registro
        Route::get('/comercializacion/mostrar-seguimiento/lista/{idcomercializacion}', "ComercializacionController@mostrar_seguimiento"); //mustra toda la vista
        Route::get('/comercializacion/mostrar-seguimiento/recargar-tabla/{idcomercializacion}', "ComercializacionController@recargar_tabla_seguimiento"); //RECARGA LA TABLA

        Route::get('/comercializacion/interesado/ultimo', "ComercializacionController@ultimo_cliente");
        Route::get('/cotizacion/generar', "ComercializacionController@generar_correlativo");
        Route::post('/cotizacion/guardar', "ComercializacionController@createCotizacion");

        Route::get('/comercializacion/ver-docs/{idcomercializacion}', "ComercializacionController@ver_one_documento");

    });

    // .......... :::::: RUTAS  ACTUALIZACIONES   :::: ................
    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard'], function(){
        route::get('/actualizaciones',"ActualizacionesController@index");
        route::get('/actualizaciones/lista',"ActualizacionesController@indexLista");
        Route::post('/actualizacion/guardar', "ActualizacionesController@createActualizacion");
        Route::get('/actualizacion/desactivar/{idactualizacion}', "ActualizacionesController@desactivar");
        Route::get('/actualizacion/activar/{idactualizacion}', "ActualizacionesController@activar");
        Route::get('/lista/actualizacion/{idactualizacion}', "ActualizacionesController@detalle_actualizacion");


    });

    // .......... :::::: RUTAS  COTIZACIONES :::: ................
    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard'], function(){
        route::get('/cotizaciones',"CotizacionController@index");
        route::get('/cotizaciones/lista',"CotizacionController@indexLista");
        Route::get('/cotizaciones/desactivar/{idcotizacion}', "CotizacionController@desactivar");
        Route::get('/cotizaciones/activar/{idcotizacion}', "CotizacionController@activar");
        Route::get('/cotizaciones/mostrar-one/{idcotizacion}', "CotizacionController@detalle_actualizacion");
        Route::post('/cotizacion/crear', "CotizacionController@createCotizacion");
        // CREAR O ACTUALIZAR COTIZACION-COMERCIALIZACION
        Route::post('/cotizacion-comercializacion/crear', "CotizacionComercializacionController@agregar_modificar_cotiza");


    });

    // .......... :::::: RUTAS RECLAMOS :::: ................
    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard'], function(){
        route::get('/reclamos', "ReclamosController@index");
        Route::get('/reclamos/lista-tabla', "ReclamosController@lista_tabla");
        Route::post('/reclamo/guardar-editar', "ReclamosController@crear_editar_reclamo");
        Route::get('/reclamos/estado/pendiente/{idreclamos}', "ReclamosController@pendiente");
        Route::get('/reclamos/estado/en-proceso/{idreclamos}', "ReclamosController@proceso");
        Route::get('/reclamos/estado/terminado/{idreclamos}', "ReclamosController@terminado");
        Route::get('/reclamos/mostrar-one/{idreclamos}', "ReclamosController@ver_one_reclamo");//Para editar el reclamo
        Route::get('/reclamos/ver-detalle/{idreclamos}', "ReclamosController@detalle_reclamo");

    });

    // ........... ::::: LISTAR SELECTS :::::...............

    Route::get('/dashboard/listas/cotizacion', "ComercializacionController@indexCotizacion");
    Route::get('/dashboard/listas/giro_negocio', "GiroNegocioController@indexGiroNegocio");
    Route::get('/dashboard/listas/modulos', "configuracion\ModulosController@indexModulos");
    Route::get('/dashboard/listas/medios', "configuracion\MediosController@indexMedios");
    Route::get('/dashboard/listas/evento', "configuracion\EventosController@indexEventos");
    Route::get('/dashboard/listas/personal', "configuracion\PersonalController@indexPersonal");
    Route::get('/dashboard/listas/clientes', "clientes\ClientesController@lista_select2_clientes");
    Route::get('/dashboard/listas/actividad', "configuracion\ActividadController@indexActvidad");
    Route::get('/dashboard/listas/etiquetas', "configuracion\EtiquetaController@lista_select2_etiqueta");
    Route::get('/dashboard/listas/filtro_etiqueta', "configuracion\EtiquetaController@lista_select2_etiqueta");

    // ........... ::::: RUTA PARA CONSULTAS SUNAT :::::...............
    Route::get('/consultas/dni/{dni}', "consultas\ConsultasController@consultaDNISunat");
    Route::get('/consultas/ruc/{ruc}', "consultas\ConsultasController@consultaRUCSunat");


