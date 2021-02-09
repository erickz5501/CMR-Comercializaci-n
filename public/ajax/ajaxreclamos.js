function init(){

    lista_reclamos();

    lista_select2('/dashboard/listas/modulos', 'modulos', null);
    lista_select2('/dashboard/listas/medios', 'medios', null);
    lista_select2('/dashboard/listas/personal', 'personal_responsable', null);
    lista_select2('/dashboard/listas/cliente', 'clientes', null);
}

function lista_reclamos(){
    $.get('/dashboard/reclamos/lista', function (data){
        $("#lista_reclamos").html(data);
    });
}


init();