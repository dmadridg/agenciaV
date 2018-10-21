@extends('layouts.main')

@section('content')
    @include('businesses_validate.modal')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header" style="text-align: center;">
                    <div class="btn-group">
                        <div class="general-info" data-url="{{url("comercios")}}" data-refresh="content">
                            {{-- <a href="{{url('comercios/form')}}" class="btn-top check-all btn bg-success new-row"> <i class="fa fa-plus" aria-hidden="true"></i>Agregar</a> --}}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="content-container" style="display: none;">
                        @include('businesses_validate.content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('body').delegate('.modal-info','click', function() {
            id = $(this).data('row-id');
            var config = {
                "id"        : id,
                "modal_id"  : "modal-form",
                "route"     : baseUrl.concat('/comercios/show-business-data'),
                "callback"  : 'load_modal_content',
                "keepModal" : true,
            }
            $('#load-bar').removeClass('hide');
            $('#detail-fields').addClass('hide');
            $('div#'+config.modal_id).modal();

            ajaxSimple(config);
        });

        $('body').delegate('.validate','click', function() {
            console.log($(this).hasClass('approve'));
            var route = $('div.general-info').data('url')+'/validate-data';
            var refresh = $('div.general-info').data('refresh');
            var b_class = $(this).hasClass('reject') ? 'reject' : 'approve';
            //var ids_array = [];
            var row_id = $(this).hasClass('special-row') ? $(this).data('row-id') : $(this).parent().siblings("td:nth-child(2)").text();
            var change_to = $(this).data('change-to');
            var swal_msg = change_to == 1 ? 'aprobado' : 'rechazado';
            //ids_array.push(row_id);

            swal({
                title: 'Se marcará el registro con el ID '+row_id+' con el status de "'+swal_msg+'" ¿Está seguro de continuar?',
                icon: 'warning',
                buttons:["Cancelar", "Aceptar"],
                dangerMode: true,
            }).then((accept) => {
                if (accept) {
                    if (b_class == 'approve') {
                        config = {
                            'route'     : route,
                            'id'        : row_id,
                            'change_to' : change_to,
                            'refresh'   : refresh,
                        }
                        loadingMessage();
                        ajaxSimple(config);
                    } else {
                        $('div#modal-form-approve input[name="id"]').val(row_id);
                        $('div#modal-form-approve input[name="change_to"]').val(change_to);

                        $('div#modal-form-approve textarea[name="comment"]').val('');
                        $('div.modal').modal('hide');//Close existing modals
                        $('div#modal-form-approve').modal();
                        //Open modal for reject validation
                    }
                }
            }).catch(swal.noop);
        });

        //Fill the modal
        function load_modal_content(response, config) {
            fill_text(response, null);
            

            //Only for approve modal
            $('div.action-buttons button.validate').data('row-id', response.id);
            $('img.logo').attr('src', baseUrl.concat('/'+response.logo));
            $('img.cover').attr('src', baseUrl.concat('/'+response.cover_photo));
            $('img.user_img').attr('src', baseUrl.concat('/'+response.user_img));
            $( "div.map-container" ).children().remove();
            $( "div.map-container" ).append('<iframe id="i-map" style="width:100%; height:300px; border: none;" src = "https://maps.google.com/maps?q='+response.latitude+','+response.longitude+'&hl=es;z=10&amp;output=embed"></iframe>');
        }
    </script>
@endsection