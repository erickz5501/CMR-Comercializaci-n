<!-- ================================= MODAL Registro COTIZACION================================= -->
<div class="modal fade border" id="modal_cotizacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal" role="document">
      <div class="modal-content">
        <!-- ================================= MODAL TITULO ================================= -->
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar cotizacion</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"> <i class="far fa-times-circle" style="color: red;"></i> </span>
            </button>
        </div>

        <!-- ================================= MODAL CUERPO ================================= -->
        <form id="formulario_cotizacion" enctype="multipart/form-data">
            @csrf
            <div class="modal-body" style="padding-top: 0px !important; padding-bottom:0px !important; padding-right: 0px !important">
                {{-- input ID oculto --}}
                <input type="hidden" id="idcotizaciones" name="idcotizaciones"/>
                <div class="row col-12">
                    <div class="card-body mb-12 col-12" style="padding-top: 0px !important; padding-bottom:0px !important; ">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Nombre</label>
                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="nombre_cotizacion" readonly name="nombre_cotizacion" required>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Ruta</label>
                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="ruta_cotizacion" name="ruta_cotizacion" required>
                                </div>
                            </div>
                        </div> --}}

                        <div class="row">
                            <div class="col">
                                <div class="custom-file">
                                    <label class="custom-file-label" for="customFileLang">Select file</label>
                                    <input  type="file" class="custom-file-input" id="ruta_cotizacion" name="ruta_cotizacion" lang="en" >
                                    {{-- onchange="validar_pdf();" --}}
                                    <input  type="hidden" id="doc_cotizacion_antiguo" name="doc_cotizacion_antiguo" >
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            <!-- ================================= FIN-CUADRO-BRODER ================================= -->
            </div>
            <!-- FIN-MODAL-BODY -->

            <!-- MODAL FOOTER -->
            <div class="modal-footer" style="padding-right: 1.5rem !important"">
                <button type="submit" class="btn btn-success"><i class="far fa-save"> </i> Guardar cotizaion</button>
            </div>
        </form>
        <!-- FIN-MODAL-FOOTER -->
      </div>
    </div>
</div>
<!-- FIN-MODAL -->
