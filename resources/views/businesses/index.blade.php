@extends('layouts.main')

@section('content')
    @include('businesses.modal')
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
                        @include('businesses.content')
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
                "route"     : baseUrl.concat('/comercios/show-business-info'),
                "callback"  : 'load_modal_content',
                "keepModal" : true,
            }
            $('#load-bar').removeClass('hide');
            $('#detail-fields').addClass('hide');
            $('div#'+config.modal_id).modal();

            ajaxSimple(config);
        });

        //Fill the modal
        function load_modal_content(response, config) {
            fill_text(response, null);
            styles = response.b_beers_style;
            //Only for busines modal
            $('img.logo').attr('src', baseUrl.concat('/'+response.logo));
            $('img.cover').attr('src', baseUrl.concat('/'+response.cover_photo));
            $('img.user_img').attr('src', baseUrl.concat('/'+response.user.photo));
            $( "div.map-container" ).children().remove();
            $( "div.map-container" ).append('<iframe id="i-map" style="width:100%; height:300px; border: none;" src = "https://maps.google.com/maps?q='+response.latitude+','+response.longitude+'&hl=es;z=10&amp;output=embed"></iframe>');
            
            //Fill all types of beer
            $('ul.beer-styles').children('li.dynamic').remove();
            for (var i in styles) {
                console.log(styles)
                $('ul.beer-styles').append('<li class="list-group-item dynamic">'+styles[i].beer_style.title+' ('+styles[i].beer_style.beer.title+') '+'</li>');
            }
        }

        $('body').delegate('.edit-row','click', function() {
            data = $(this).data('content');
            $('div#modal-form-b-options input[name="id"]').val(data.id);
            $('div#modal-form-b-options select[name="space_type_id"]').val(data.space_type_id);
            $('div#modal-form-b-options').modal();
        });
    </script>
@endsection