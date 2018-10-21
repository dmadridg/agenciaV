<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalExcelLabel" id="modal-excel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalExcelLabel">Importar desde excel</h4>
            </div>
            <form id="form-import" method="POST" action="" onsubmit="return false" enctype="multipart/form-data" autocomplete="off" data-ajax-type="ajax-form-modal" data-column="0" data-refresh="0" data-redirect="0" data-table_id="example3" data-container_id="table-container">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                             <div class="alert alert-info alert-dismissible text-justify" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                                <strong>Instrucciones de uso: </strong><br>
                                Para importar registros a través de Excel, los datos deben estar acomodados como se describe a continuación: <br>
                                Los campos de la primera fila de la hoja de excel deben de ir los campos llamados 
                                <strong id="fields">""</strong>, posteriormente, debajo de cada uno de estos campos deberán de ir los datos correspondientes de los registros.
                                <br><strong>Nota: </strong>
                                <br>- Solo se aceptan archivos con extensión <kbd>xls y xlsx</kbd> {{-- y los registros repetidos en el excel no serán creados. --}}
                                <br>- Esta acción puede llevar varios minutos dependiendo de la cantidad de información, porfavor espere y permanezca en esta ventana hasta que un mensaje sea mostrado en su pantalla.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="excel_file">Archivo Excel</label>
                                <input class="form-control not-empty file excel" type="file" id="excel_file" name="excel_file" data-msg="Archivo Excel">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary save"> Importar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </form>            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->