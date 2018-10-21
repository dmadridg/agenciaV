@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="general-info" data-url="{{url("v")}}" data-refresh="table">
            {{-- Div with general info --}}
        </div>
        <div class="col-md-4" id="html-container">
            @include('my-business.card') 
        </div>

        {{-- @include('general_views.photo') --}}

        <div class="col-md-8">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#form_user" data-toggle="tab">Datos de cuenta</a></li>
                    <li><a href="#form_status" data-toggle="tab">Información de mi negocio</a></li>
                    <li><a href="#form_photos" data-toggle="tab">Fotos</a></li>
                    <li><a href="#form_beers" data-toggle="tab">Estilos de cerveza</a></li>
                </ul>
                <div class="tab-content" style="width: 100%;">
                    <div class="active tab-pane" id="form_user">
                        {{-- Modify form ttributes --}}
                        <form id="form-data" class="form-horizontal" action="{{url('mi-comercio/update-user')}}" onsubmit="return false;" enctype="multipart/form-data" method="post" autocomplete="off" data-ajax-type="ajax-form" data-column="0" data-refresh="content" data-redirect="0" data-table_id="example3" data-container_id="html-container">
                            <div class="form-group hide">
                                <label for="id" class="col-sm-2 control-label">ID</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{auth()->user()->id}}" name="id" class="form-control not-empty" data-msg="ID" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fullname" class="col-sm-2 control-label">Nombre completo</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{auth()->user()->fullname}}" name="fullname" class="form-control not-empty" data-msg="Nombre completo" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-sm-2 control-label">Celular</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{auth()->user()->phone}}" name="phone" class="form-control not-empty" data-msg="Celular" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" value="{{auth()->user()->email}}" name="email" class="form-control not-empty email" data-msg="Email" />
                                </div>
                            </div>
                            <div class="form-group hide">
                                <label for="old_email" class="col-sm-2 control-label">Email (actual)</label>
                                <div class="col-sm-10">
                                    <input type="email" value="{{auth()->user()->email}}" name="old_email" class="form-control not-empty email" data-msg="Email" />
                                </div>
                            </div>
                             <div class="form-group">
                                <label for="password" class="col-sm-2 control-label">Contraseña</label>
                                <div class="col-sm-10">
                                    <input type="text" name="password" class="form-control pass-font" data-msg="Contraseña" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="photo" class="col-sm-2 control-label">Foto perfil</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control file image" id="photo" name="photo" data-msg="Imagen">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger save">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="form_status">
                        <form id="form-data-business" class="form-horizontal" action="{{url('mi-comercio/update-business')}}" onsubmit="return false;" enctype="multipart/form-data" method="post" autocomplete="off" data-ajax-type="ajax-form" data-column="0" data-refresh="content" data-redirect="0" data-table_id="example3" data-container_id="html-container">
                            <div class="form-group hide">
                                <label for="id" class="col-sm-2 control-label">ID</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{$comercio->data->id}}" name="id" class="form-control not-empty" data-msg="ID" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Nombre comercio</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{$comercio->data->name}}" name="name" class="form-control not-empty" data-msg="Nombre del comercio" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="category_id" class="col-sm-2 control-label">Categoría</label>
                                <div class="col-sm-10">
                                    <select name="category_id" class="form-control not-empty" data-msg="Categoría">
                                        <option value="0" disabled selected>Seleccione una opción</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{$comercio->data->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="subcategory_id" class="col-sm-2 control-label">Subcategoría</label>
                                <div class="col-sm-10">
                                    <select name="subcategory_id" class="form-control" data-msg="Subcategoría">
                                        <option value="0" disabled selected>Seleccione una opción</option>
                                        @foreach($subcategories as $subcategory)
                                            <option value="{{$subcategory->id}}" {{$comercio->data->subcategory_id == $subcategory->id ? 'selected' : ''}}>{{$subcategory->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description_short" class="col-sm-2 control-label">Descripción corta</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{$comercio->data->description_short}}" name="description_short" class="form-control not-empty" data-msg="Descripción corta" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description_large" class="col-sm-2 control-label">Descripción larga</label>
                                <div class="col-sm-10">
                                    <textarea name="description_large" class="form-control not-empty" data-msg="Descripción larga">{{$comercio->data->description_large}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="range_price" class="col-sm-2 control-label">Rango de precios</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{$comercio->data->range_price}}" name="range_price" class="form-control not-empty" data-msg="Rango de precios" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="schedule" class="col-sm-2 control-label">Horario</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{$comercio->data->schedule}}" name="schedule" class="form-control not-empty" data-msg="Horario" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address" class="col-sm-2 control-label">Dirección descrita del comercio</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{$comercio->data->address}}" name="address" class="form-control not-empty" data-msg="Dirección descrita del comercio" />
                                </div>
                            </div>
                            {{-- MAPS --}}
                            <div id="mapa_detalles" class="form-group">
                                <label for="buscarMapa" class="col-sm-2 control-label">Coordenadas</label>
                                <div class="col-sm-10">
                                    <input type="" class="form-control" name="buscarMapa" id="buscarMapa" placeholder="Buscar en mapa">
                                </div>
                                <div class="col-sm-10 col-sm-offset-2">
                                    <div id="map" class="z-depth-1 center-align valign-wrapper" style="height: 350px;width: 100%">
                                        <i class="fa fa-spin fa-spinner fa-2x valign-wrapper" style="margin: auto;"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="latitude" class="col-sm-2 control-label">Latitud</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{$comercio->data->latitude}}" id="latitude" name="latitude" readonly class="form-control not-empty" data-msg="Latitud" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="longitude" class="col-sm-2 control-label">Longitud</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{$comercio->data->longitude}}" id="longitude" name="longitude" readonly class="form-control not-empty" data-msg="Longitud" />
                                </div>
                            </div>
                         
                            {{-- END MAPS --}}
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="alert alert-primary">
                                        Las medidas del logo deben ser de <strong>240x240 px</strong> o su equivalente a escala, el sistema redimensionará automáticamente la imágen subida.
                                    </div>
                                </div>
                                <label for="logo" class="col-sm-2 control-label">
                                    Logo
                                    @if($comercio)
                                        <a class="document-read" href="{{asset($comercio->data->logo)}}" data-lightbox='preview' data-title='Logo'>(Ver) <i class="fa fa-file-image-o" aria-hidden="true"></i></a>
                                    @endif
                                </label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control file image" id="logo" name="logo" data-msg="Imagen">
                                </div>
                                <div class="col-sm-1">
                                    <a href="{{asset('img/app-sample.jpg')}}" data-toggle="tooltip" data-placement="top" title="Ver como..." data-lightbox='preview-app' data-title='Preview de logo'><label class="control-label pointer"><i class="fa fa-question"></i></label></a>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="alert alert-primary">
                                        Las medidas de la portada deben ser de <strong>750x560 px</strong> o su equivalente a escala, el sistema redimensionará automáticamente la imágen subida.
                                    </div>
                                </div>
                                <label for="cover_photo" class="col-sm-2 control-label">
                                    Portada
                                    @if($comercio)
                                        <a class="document-read" href="{{asset($comercio->data->cover_photo)}}" data-lightbox='preview' data-title='Portada'>(Ver) <i class="fa fa-file-image-o" aria-hidden="true"></i></a>
                                    @endif
                                </label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control file image" id="cover_photo" name="cover_photo" data-msg="Portada">
                                </div>
                                <div class="col-sm-1">
                                    <a href="{{asset('img/app-sample.jpg')}}" data-toggle="tooltip" data-placement="top" title="Ver como..." data-lightbox='preview-app' data-title='Preview de portada'><label class="control-label pointer"><i class="fa fa-question"></i></label></a>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger save">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="form_photos">
                        <form id="form-data-photos" action="{{url('comercios')}}" onsubmit="return false;" enctype="multipart/form-data" method="POST" autocomplete="off" data-ajax-type="ajax-form" data-column="0" data-refresh="0" data-redirect="1" data-table_id="example3" data-container_id="table-container">
                            <div class="form-group">
                                <label for="id">Fotos</label>
                                <input type="text" class="form-control" readonly value="{{$comercio->photos->count()}}" id="id" name="id">
                            </div>
                            <div class="row">
                                <div class="row-fluid dropzone" id="dropzoneDiv">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="form_beers">
                        {{-- Modify form ttributes --}}
                        <form id="form-data-beers" class="form-horizontal" action="{{url('mi-comercio/update-beers')}}" onsubmit="return false;" enctype="multipart/form-data" method="POST" autocomplete="off" data-ajax-type="ajax-form" data-refresh="" data-redirect="0" data-container_id="html-container">
                            {{-- <div class="col-sm-offset-2 col-sm-10"> --}}
                                <div class="alert alert-warning">
                                    Deberá agregar nuevamente los estilos de cerveza al agregar o eliminar una cerveza de su lista.
                                </div>
                            {{-- </div> --}}
                            <div class="form-group hide">
                                <label for="id" class="col-sm-2 control-label">ID</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{$comercio->id}}" name="id" class="form-control not-empty" data-msg="ID" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="beers_ids" class="col-sm-2 control-label">Cervezas</label>
                                <div class="col-sm-10">
                                    <select class="selectpicker form-control not-empty" data-msg="Cerveza" style="width: 100%;" id="beers_ids" name="beers_ids[]" data-live-search="true" multiple>
                                        <option value="0" disabled>Seleccione una opción</option>
                                        @if($comercio->beers->count())
                                            @foreach($beers as $beer)
                                                <option value="{{$beer->id}}" @foreach($comercio->beers as $c_b) {{($c_b->beer_id == $beer->id ? 'selected' : '')}} @endforeach >{{$beer->title}}</option>
                                            @endforeach
                                        @else
                                            @foreach($beers as $beer)
                                                <option value="{{$beer->id}}">{{$beer->title}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="beers_styles_ids" class="col-sm-2 control-label">Estilos</label>
                                <div class="col-sm-10">
                                    <select class="selectpicker form-control not-empty" data-msg="Estilos" style="width: 100%;" name="beers_styles_ids[]" data-live-search="true" multiple>
                                        <option value="0" disabled>Seleccione una opción</option>
                                        @if($comercio->beers_styles->count())
                                            @foreach($styles as $style)
                                                <option value="{{$style->id}}" @foreach($comercio->beers_styles as $c_b_s) {{($c_b_s->beer_style_id == $style->id ? 'selected' : '')}} @endforeach >{{$style->title}}</option>
                                            @endforeach
                                        @else
                                            @foreach($all_styles as $style)
                                                <option value="{{$style->id}}">{{$style->title}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger save">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                <!-- /.tab-pane -->
                </div>
            <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
    </div>
    {{-- Change key --}}
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBj6fY5sVLxsS7FswsQt_n6Oy1XRyTXxdA&callback=initMap&libraries=places"></script>
    <script type="text/javascript">
        $('body').delegate('.sw-dt-data-status, .sw-dt-b-status','click', function() {
            title = content = icon = '';
            if ($(this).hasClass('sw-dt-data-status')){//Data 
                title = '¿Status de información?';
                content = '<p>Refiere a si los datos enviados desde la pestaña "Información de mi negocio" han sido revisados por un administrador, esta puede ser o no rechazada, las razones por las que puede rechazarse son:</p>'+
                            '<ul class="info_list">'+
                                '<li>- Los datos son erróneos.</li>'+
                                '<li>- La ubicación de tu negocio no corresponde a la real.</li>'+
                                '<li>- Se incluyeron faltas de ortografía.</li>'+
                            '</ul>';
                icon = 'info';
            } else if($(this).hasClass('sw-dt-b-status')){//Business
                title = 'Visibilidad de mi comercio';
                content =   '<p>Refiere a si tu comercio será visible desde la aplicación de "Vive chapultepec". Hay varias razones por las que puede estar oculta de la app, por ejemplo:</p>'+
                            '<ul class="info_list">'+
                                '<li>- Acabas de registrarte y necesitas completar información de tu comercio.</li>'+
                                '<li>- Tu comercio no ha sido aprobado por un usuario administrador.</li>'+
                                '<li>- Los datos infringen alguna política de privacidad y/o alguna cláusula de términos y condiciones.</li>'+
                                '<li>- Las fotografías subidas no son visibles o están distorcionadas.</li>'+
                            '</ul>';
                icon = 'info';
            }

            swal({
                title: title,
                icon: icon,
                button: "Entendido",
                /*closeOnEsc: false,
                closeOnClickOutside: false,*/
                content: {
                    element: "div",
                    attributes: {
                        innerHTML:content
                    },
                }
            }).catch(swal.noop);

        });

        $('input#buscarMapa').keydown(function(event) {
            if(event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });

        var map;
        var marker;
        var center;
        function initMap() {

            center = getPosicion();
            var elem = document.getElementById("map");
            if (center == null) {
                center = {lat: 20.676580, lng: -103.34785};
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (pos) {
                        center = {lat: pos.coords.latitude, lng: pos.coords.longitude};
                        drawMap(elem, center);
                        setPosicion(center);
                    }, function () {
                        drawMap(elem, center);
                    });
                } else {
                    drawMap(elem, center);
                }
            } else {
                drawMap(elem, center);
            }
        }

        function drawMap(elem, center) {
            map = new google.maps.Map(elem, {
                center: center,
                zoom: 14
            });
            marker = new google.maps.Marker({
                position: center,
                map: map,
                animation: google.maps.Animation.DROP,
                title: 'Mueve el mapa'
            });
            var searchBox = new google.maps.places.SearchBox(document.getElementById('buscarMapa'));

            google.maps.event.addListener(searchBox, 'places_changed', function(){
                var places = searchBox.getPlaces();
                var bounds = new google.maps.LatLngBounds();
                var i, place;

                for (i=0; place=places[i]; i++) {
                    bounds.extend(place.geometry.location);
                    marker.setPosition(place.geometry.location);
                }

                map.fitBounds(bounds);
                map.setZoom(14);
            })
            map.addListener('center_changed', function () {
                var p = map.getCenter();
                marker.setPosition({lat: p.lat(), lng: p.lng()});
                setPosicion({lat: p.lat(), lng: p.lng()});
            });
        }

        function setPosicion(center) {
            $("#latitude").val(center.lat);
            $("#longitude").val(center.lng);
        }

        function getPosicion() {
            if ($("#latitude").val() != "") {
                return {lat: parseFloat($("#latitude").val()), lng: parseFloat($("#longitude").val())};
            }
            return null;
        }


        {{-- Photo code --}}
        var data = "";
        var comercio = "{{$comercio}}";
        console.log(comercio ? 'dropzone ready': 'dropzone not loaded');

        if ( comercio ){
            data = '<?php echo @$comercio->photos;?>';
            data = JSON.parse(data.replace(/&quot;/g,'"'));
        }

        if ( data ){
            $('div.dz-default.dz-message').remove()
        }

        $(function(){
            styles = <?php echo $all_styles;?>;
            all_subs = <?php echo $all_subs;?>;

            Dropzone.autoDiscover = false;

            if (comercio) {
                var myDropzone = new Dropzone("div#dropzoneDiv", {
                    url: "{{url('mi-comercio/upload-content')}}",
                    addRemoveLinks: true,
                    paramName: 'photo',
                    init: function() {
                        this.on("sending", function(file, xhr, formData){
                            formData.append("_method", "post");
                            formData.append("path", 'img/comercios');
                            formData.append("rename", true);
                            formData.append("business_id", '{{@$comercio->id}}');
                        });
                    },
                    removedfile: function(file) {
                        swal({
                            title: '¿Quieres eliminar este archivo adjunto?',
                            icon: "warning",
                            buttons: ["Cancelar", "Eliminar"],
                            dangerMode: true,
                        }).then((accept) => {
                            if (accept) {
                                $.ajax({
                                    url: "{{url('mi-comercio/delete-content')}}",
                                    method:'post',
                                    type:'post',
                                    data:{
                                        photo_id   : file.photo_id,
                                        photo_name : file.name,
                                    },
                                    success:function(response){
                                        file.previewElement.remove();
                                        if ( response.status ){
                                            swal('Éxito', response.msg, 'success');
                                        } else {
                                            swal('Error', response.msg, 'warning');
                                        }
                                    }
                                })
                            }
                        })
                    }
                });
                if ( data ){
                    $.each(data, function(key, value){
                        var mockFile = { name: value.photo, size: value.size, photo_id: value.id ,comercio_id: "{{@$comercio->id}}"};
                        myDropzone.options.addedfile.call(myDropzone, mockFile);
                        myDropzone.options.thumbnail.call(myDropzone, mockFile, "{{asset('')}}"+value.photo);
                    })
                }
            }
        });

        $("select[name='category_id']").change(function(){//Lets verify if need to reload the select
            cat_id = $(this).val();
            select = $("select[name='subcategory_id']");

            select.children('option').remove();
            select.append("<option value='0' disabled selected>Seleccione una opción</option>");
            for (var key in all_subs) {
                if (all_subs.hasOwnProperty(key)) {
                    if (all_subs[key].category_id == cat_id) {//La subcategoría pertenece a la categoría seleccionada actual
                        select.append("<option value="+all_subs[key].id+">"+all_subs[key].name+"</option>");
                    }
                }
            }
        });

        $("select[name='beers_ids[]']").on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
            select = $("select[name='beers_styles_ids[]']");
            validarSelectSecundario($(this).val(), select);
        });

        function validarSelectSecundario(array, select){
            select.children('option').remove();
            select.append("<option value='0' disabled>Seleccione una opción</option>");
            for (var key in styles) {
                if (styles.hasOwnProperty(key)) {
                    if ($.inArray(styles[key].beer_id.toString(), array) !== -1) {//El item está en el array
                        select.append("<option value="+styles[key].id+">"+styles[key].title+"</option>");
                    }
                }
            }
            select.selectpicker('refresh');
        }
    </script>
@endsection