<div class="modal fade data-fill" tabindex="-1" role="dialog" aria-labelledby="label-title" id="modal-form">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="label-title">Detalles del comercio</h4>
            </div>
            <form id="form-data" action="{{url('services/change-status')}}" onsubmit="return false;" enctype="multipart/form-data" method="POST" autocomplete="off" data-ajax-type="ajax-form-modal" data-column="0" data-refresh="content" data-redirect="0" data-table_id="example3" data-container_id="content-container">
                <div class="modal-body">
                    <div class="row text-left hide" id="detail-fields">
                        <div class="col-md-12">
                            <ul class="list-group">
                                <li class="list-group-item active">Datos generales del comercio</li>
                                @if(auth()->user()->role->name == 'Administrador')
                                    <li class="list-group-item fill-container"><span class="label_show">ID: <span class="id"></span></span></li>
                                @endif
                                <li class="list-group-item">
                                    <span class="label_show">Logo: </span>
                                    <img style="max-width: 15%; border-radius: 50%;" src="" class="logo">
                                </li>
                                
                                <li class="list-group-item">
                                    <span class="label_show">Portada: </span>
                                    <img style="max-width: 200px;" src="" class="cover">
                                </li>
                                <li class="list-group-item fill-container"><span class="label_show">Nombre: <span class="name"></span></span></li>
                                <li class="list-group-item fill-container"><span class="label_show">Categoría: <span class="category_name"></span></span></li>
                                <li class="list-group-item fill-container"><span class="label_show">Subcategoría: <span class="subcategory_name"></span></span></li>
                                <li class="list-group-item fill-container"><span class="label_show">Tipo de espacio: <span class="space_type_name"></span></span></li>
                                <li class="list-group-item fill-container"><span class="label_show">Descripción larga: <span class="description_large"></span></span></li>
                                <li class="list-group-item fill-container"><span class="label_show">Descripción corta: <span class="description_short"></span></span></li>
                                <li class="list-group-item fill-container"><span class="label_show">Rango de precios: <span class="range_price"></span></span></li>
                                <li class="list-group-item fill-container"><span class="label_show">Horario: <span class="schedule"></span></span></li>
                                <li class="list-group-item fill-container"><span class="label_show">Dirección: <span class="address"></span></span></li>
                                <li class="list-group-item fill-container"><span class="label_show">Código para cupones: <span class="code"></span></span></li>
                                <li class="list-group-item fill-container"><span class="label_show">Status: <span class="status_name"></span></span></li>
                                <li class="list-group-item fill-container"><span class="label_show">Vistas: <span class="views"></span></span></li>
                            </ul>                        

                            <ul class="list-group">
                                <li class="list-group-item active">Usuario dueño del comercio</li>
                                <li class="list-group-item fill-container"><span class="label_show">Nombre: <span class="user_name"></span></span></li>
                                <li class="list-group-item fill-container"><span class="label_show">Email: <span class="user_email"></span></span></li>
                                <li class="list-group-item fill-container"><span class="label_show">Teléfono: <span class="user_phone"></span></span></li>
                                <li class="list-group-item">
                                    <span class="label_show">Usuario dueño de negocio: </span>
                                    <img style="max-width: 200px; border-radius: 50%;" src="" class="user_img">
                                </li>
                            </ul>

                            <ul class="list-group beer-styles">
                                <li class="list-group-item active">Estilos de cerveza admitidos</li>
                            </ul>

                            <ul class="list-group">
                                <li class="list-group-item active">Ubicación del negocio</li>
                                <li class="list-group-item">
                                    <div class="map-container" style="height: 300px;width: 100%;"></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row text-center" id="load-bar">
                        <div class="row mrg-0 col-md-12">
                            <div class="progress-outer">
                                <span><i style="font-size: 20mm;" class="fa fa-cloud-download" aria-hidden="true"></i></span><br>
                                <span>Cargando información... espere un momento</span>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-info progress-bar-striped active" style="width:100%; box-shadow:-1px 10px 10px rgba(92, 190, 220, 0.5);"></div>
                                </div>
                            </div>
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

<div class="modal fade data-fill" tabindex="-1" role="dialog" aria-labelledby="label-title" id="modal-form-b-options">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="label-title">Opciones de negocio</h4>
            </div>
            <form id="form-b-options" action="{{url('comercios/update')}}" onsubmit="return false;" enctype="multipart/form-data" method="POST" autocomplete="off" data-ajax-type="ajax-form-modal" data-column="0" data-refresh="content" data-redirect="0" data-table_id="" data-container_id="content-container">
                <div class="modal-body">
                    <div class="form-group hide">
                        <label for="id">ID</label>
                        <input type="text" class="form-control" value="" name="id">
                    </div>
                    <div class="form-group">
                        <label for="id">Tipo de espacio en la app</label>
                        <select class="form-control" name="space_type_id" data-msg="Tipo de espacio en la app">
                            <option value="" disabled>Seleccione una opción</option>
                            @foreach($spaces as $space)
                                <option value="{{$space->id}}">{{$space->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary save">Guardar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->