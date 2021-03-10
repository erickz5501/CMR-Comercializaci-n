<div class="modal-content">
    <!-- ================================= MODAL TITULO ================================= -->
    {{-- <div class="modal-header">
        <center style="text-align: -webkit-center !important;">
            <h5 class="modal-title" id="exampleModalLabel">Informacion de un modulo</h5>
        </center>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="far fa-times-circle" style="color: red;"></i></span>
        </button>
    </div>

    <!-- ================================= MODAL CUERPO ================================= -->
    <div class="modal-body" > --}}
        {{-- <div class="row ">
            <div class="card-body mb-12 col-12" >
                <ul class="list-unstyled mb-0">
                    <li class="media pt-1 pb-2 border-bottom">
                        <i class="fas fa-signature font-size-lg mt-2 mb-0 text-primary"></i>
                        <div class="media-body pl-3">
                            <span class="font-size-ms text-muted">Nombre:</span>
                            <span class="d-block text-heading font-size-sm">{{ $info_modulo->nombre }}</span>
                        </div>
                    </li>
                    <li class="media pt-1 pb-2 border-bottom">
                        <i class="fas fa-signature font-size-lg mt-2 mb-0 text-primary"></i>
                        <div class="media-body pl-3">
                            <span class="font-size-ms text-muted">Apellido:</span>
                            <span class="d-block text-heading font-size-sm">
                                {{ strip_tags($info_modulo->caracteristicas) }}
                            </span>
                        </div>
                    </li>
                </ul>
            </div>
        </div> --}}
        <div class="card">
            <div class="card-header text-center">                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="far fa-times-circle" style="color: red;"></i></span>
                </button>
                <h5 class="h3 mb-0">{{ $info_modulo->nombre }}</h5>
            </div>
            <div class="card-body">
                <p class="mb-4">
                    {!! $info_modulo->caracteristicas !!}
                </p>
                 
            </div>
        </div>
        <!-- ================================= FIN-CUADRO-BRODER ================================= -->
    {{-- </div>

    <div class="modal-footer"></div> --}}

</div>
