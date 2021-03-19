<div class="modal-header">
    <center style="text-align: -webkit-center !important;">
        <h4 class="modal-title" id="exampleModalLabel">{{ $info_modulo->nombre }}</h4>
    </center>

    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"><i class="far fa-times-circle" style="color: red;"></i></span>
    </button>
</div>

<div class="modal-body">
    <p class="mb-4">
        {!! $info_modulo->caracteristicas !!}
    </p>
</div>

<div class="modal-footer"></div>
