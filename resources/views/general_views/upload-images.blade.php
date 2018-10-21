<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalContentLabel" id="modal-upload-content">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalContentLabel">Cargar imágenes</h4>
            </div>
            <div class="modal-body">
                <div id="rule-container" class="alert alert-info alert-dismissible text-left" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    <strong>Nota: </strong><br>
                    - Solo se permiten subir imágenes con formato jpg, png, jpeg, svg y gif, y estas deben de pesar menos de 5mb. <br>
                    - Sólo se permite subir hasta un máximo de 40 imágenes a la vez, espere a que todas las imágenes aparezcan como cargadas antes de recargar o abandonar la página. <br>
                    - Cerrar el modal al estar subiendo los archivos, interrumpirá la carga de estos. <br>
                    <p id="resize-data" class="hide">- Favor de subir las imágenes de <strong> 430x320</strong> o su equivalente a escala, ya que el sistema redimensionará automáticamente a esas medidas las imagenes subidas.</p>
                </div>
                <form id="dropzone-form" method="POST" action="{{url('admin/system/upload-content')}}" enctype="multipart/form-data" class="dropzone myDropzone">
                    <div class="col-lg-12 hide">
                        <div class="form-group">
                            <input class="form-control" type="text" value="" id="path" name="path">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->