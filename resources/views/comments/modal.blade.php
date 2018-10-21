<div class="modal fade data-fill" tabindex="-1" role="dialog" aria-labelledby="label-title" id="modal-info">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="label-title">Detalles del comentario</h4>
            </div>
            <form id="form-data" action="{{url('comentarios/change-status')}}" onsubmit="return false;" enctype="multipart/form-data" method="POST" autocomplete="off" data-ajax-type="ajax-form-modal" data-column="0" data-refresh="content" data-redirect="0" data-table_id="example3" data-container_id="content-container">
                <div class="modal-body">
                    <div class="row text-left" id="">
                        <div class="col-md-12">
                            <ul class="list-group">
                                <li class="list-group-item active">Información general</li>
                                <li class="list-group-item">
                                    <span class="label_show">Foto de usuario: </span>
                                    <img style="max-width: 20%; border-radius: 50%;" src="" class="user-photo">
                                </li>
                                <li class="list-group-item fill-container"><span class="label_show">Nombre del usuario: <span class="user-fullname"></span></span></li>
                                <li class="list-group-item fill-container"><span class="label_show">Negocio: <span class="business-name"></span></span></li>
                                <li class="list-group-item fill-container"><span class="label_show">Comentario: <span class="comment-data"></span></span></li>
                                <li class="list-group-item fill-container"><span class="label_show">Fecha: <span class="comment-date"></span></span></li>
                                <li class="list-group-item fill-container"><span class="label_show">Estrellas: <span class="comment-rate"></span></span>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="rating">
                                                <i class="color fa fa-star" aria-hidden="true"></i>
                                                <i class="color fa fa-star" aria-hidden="true"></i>
                                                <i class="color fa fa-star" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-primary save">Guardar</button> --}}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->