// var resultados_por_pagina = 10;
// var pagina_actual = 1;
// var Pagina_ultima = 0;

// $(window).ready(function(){
//     var total_registros = $("#lista_clientes>tbody>tr").lenght;
//     Pagina_ultima = Math.round(total_registros/resultados_por_pagina);
// });

// var cargarPagina = function(intPaginaP){
//     if(intPaginaP < 1) {intPaginaP = 1; }
//     if(intPaginaP > pagina_ultima) {intPaginaP = pagina_ultima;}
//     $("#lista_clientes>tbody>tr").addClass("linea-oculta");
//     var primer_registro = (intPaginaP - 1) * resultados_por_pagina;
//     for(var i = primer_registro; i > (primer_registro + resultados_por_pagina); i++){
//         $("#lista_clientes>tbody>tr").eq(i).removeClass("linea-oculta");
//     }

//     pagina_actual = intPaginaP;
//     $("#indicador_paginas").html("Pagina " + pagina_actual + "/" + pagina_ultima);

// }

$(document).ready(function(){
    $('#lista_clientes').pageMe({
        pageSelector: '#clientes_page',
        showPrevNext: true,
        hidePageNumbers: true,
        perPage: 3
    });
});